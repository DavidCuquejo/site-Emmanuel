<?php

namespace App\Controller;


use App\Entity\Membre;

use App\Form\MembreType; 
use App\Controller\MembreController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MembreController extends AbstractController
{

    /**
	* @Route("inscription/", name="register")
	*
	*/
	public function inscription(Request $request, UserPasswordEncoderInterface $encoder){
		$membre = new Membre; 
		$form = $this -> createForm(MembreType::class, $membre, array(
			'admin' => false
		));
		$form -> handleRequest($request);
		
		if($form -> isSubmitted() && $form -> isValid()){
			
			$em = $this -> getDoctrine() -> getManager();
			$em -> persist($membre);
			$membre -> setRole('ROLE_USER');

			$password = $membre -> getPassword();
			$password_crypte = $encoder -> encodePassword($membre, $password);
			
			$membre -> setPassword($password_crypte);
			
			$em -> flush();

			$this -> addFlash('success', 'Félicitations <b>' . $membre -> getUsername() . '</b>, vous êtes inscris, vous pouvez maintenant vous connecter');
			
			return $this -> redirectToRoute('login');

		} else 
		// {
		// 	$this -> addFlash('errors', 'Désolé <b>' . $membre -> getUsername() . '</b>, vous ne pouvez pas vous inscrire');
		// }	
		$params = array(
			'membreForm' => $form -> createView(),
			'action' => 'inscription'
		);
		return $this -> render('membre/register.html.twig', $params);
	}

}









