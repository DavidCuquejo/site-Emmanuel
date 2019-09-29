<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Form\MembreType;
use App\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{   
    // **************** CRUD MEMBRE ********************* // 

	/**
	* @Route("/admin/g_admin", name="g_admin")
	*
	*/
	public function GestionAdmin(){

		$repo = $this->getDoctrine()->getRepository(Membre::class);
		$membres = $repo->findAll();

		return $this->render('backoffice/g_admin.html.twig', [
			'membres' => $membres
		]);
	}


  	/**
	* @Route("/admin/membre/", name="g_membre")
	*
	*/
	public function GestionMembre(){
		 // Je récupère les données à afficher (SELECT * FROM)
		 $repo = $this->getDoctrine()->getRepository(Membre::class);
		 $membres = $repo->findAll();
 
		 return $this->render('backoffice/g_membre.html.twig', [
			 'membres' => $membres
		 ]);
	}


	/**
	* @Route("/admin/g_admin/add", name="g_admin_add")
	*
	*/
	public function GestionMembreAdd(){

		
		return $this -> render('backoffice/g_membre.html.twig');
	}


 	/**
	* @Route("/admin/membreupdate", name="membre_update")
	*
	*/
	public function GestionMembreUpdate(Request $request, UserPasswordEncoderInterface $encoder)
	{

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

		$params = array(
			'membreForm' => $form -> createView() 
		);
		return $this -> render('backoffice/membreupdate.html.twig', $params);
	}
}

	/**
	* @Route("/admin/membrespace", name="membre_space")
	*
	*/
	public function GestionMembreSpace(){
		return $this -> render('backoffice/membrespace.html.twig');
	}

	/** 
	* @Route("/admin/membredelete/{id}", name="membre_delete")
	*
	*/
	public function adminMembreDelete($id){
		// 1: Récupérer le membre à supprimer 
		$em = $this -> getDoctrine() -> getManager();
		$membre = $em -> find(Membre::class, $id);
		
		
		// 2: Le supprimer de la BDD 
		$em -> remove($membre);
		$em -> flush();
		
		// 3: Rediriger 
 		$this -> addFlash('success', 'Le membre ' . $id . ' a été correctement supprimé !');
		return $this -> redirectToRoute('g_membre');
	}



    /**
	* @Route("/admin/echange/", name="echange")
	*
	*/
	public function Echange(){
		return $this -> render('echange/echange.html.twig');
	}








    /**
     * @Route("/", name="homepage")
     */
    public function homePage()
    {
        return $this->render('home/pageAccueil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/particular", name="particular")
     */
    public function particularPage()
    {
        return $this->render('home/pageParticulier.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/professional", name="professionnal")
     */
    public function professionalPage()
    {
        return $this->render('home/pageProfessionnelle.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/whoIam", name="whoIam")
     */
    public function whoIamPage()
    {
        return $this->render('home/pageQuisuisje.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
    * @Route("/contact", name="contact")
    */
    public function contact()
    {
        return $this->render('home/pageContact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }




    //  ************************* BACK OFFICE ****************************



    /**
    * @Route("/connexion_backoffice", name="connexion_au_backoffice")
    */
    public function connexionAuBackOffice()
    {
        return $this->render('backoffice/connexion_au_backoffice.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
    * @Route("/pageAccueil_backoffice", name="pageAccueil_backoffice")
    */
    public function pageAccueilBackOffice()
    {
        return $this->render('backoffice/pageAccueil_backoffice.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
    * @Route("/deconnexion/", name="deconnexion")
    *
    */
    public function deconnexion()
    {}


    /**
    * @Route("/login_check/", name="login_check")
    *
    */
    public function connexionCheck()
    {}
}
