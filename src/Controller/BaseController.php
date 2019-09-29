<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    // /** 
	// * @Route("/", name="index")
	// */
	// public function HomePage(){
	// 	return $this -> render('backoffice/pageAccueil_backoffice.html.twig');
	// }

	/**
	* @Route("/contact/", name="contact")
	*
	*/
	// public function Contact(Request $request, \Swift_Mailer $mailer){

	// 	$form = $this -> createForm(ContactFormType::class , NULL);
	// 	$form -> handleRequest($request);

	// 	if($form -> isSubmitted() && $form -> isValid())
	// 	{
	// 		$data = $form -> getData();

	// 		if($this -> sendEmail($data , $mailer))
	// 		{
	// 			$this -> addFlash('success' , 'Votre email a été envoyé');

	// 		}
	// 		else{
	// 			$this -> addFlash('errors' , 'Erreur dans l\'envoie de l\'email');
	// 		}
	// 		return $this -> redirectToRoute('index');
	// 	}
		

	// 	$params = array(
	// 		'contactForm' => $form -> createView()
	// 	);

	// 	return $this -> render('base/contact.html.twig', $params);
	// }

	/**
	 * @Route("/contact_mail" , name="contact_mail")
	 */
	// public function sendEmail($data, \Swift_Mailer $mailer)
	// {
	// 	// On crée l'email ( en précisant l'objet )
	// 	$mail = new \Swift_Message('Mon site :' . $data['objet']);

	// 	// On configure l'email ( Qui , pour qui , quoi , comment )

	// 	$mail 
	// 		-> setFrom($data['email'])
	// 		-> setTo('nathalie@monsite.com')
	// 		-> setBody(
	// 			$this -> renderView('mail/contact_mail.html.twig' , array('data' => $data)) , 'text/html'
	// 		);

	// 	// On demande au mailer d'envoyer l'email

	// 	if(!$mailer -> send($mail))
	// 	{
	// 		return false;
	// 	}
	// 	return true;
	// }
}
