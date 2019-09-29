<?php

namespace App\Controller;

use App\Controller\SecurityController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/connexion_dans_backoffice/", name="connexion_dans_backoffice")
     *
     */
    public function connexionBackOffice(AuthenticationUtils $auth) : Response
    {

        $lastUsername = $auth->getLastUsername();
        // Récupère le username saisi 

        $error = $auth->getLastAuthenticationError();
        // Récupère l'erreur s'il y en a une 

        if (!empty($error)) { // est ce que c'est vide ? 
            $this->addFlash('errors', 'Problème d\'identifiant !');
        }

        $params = array(
            'lastUsername' => $lastUsername,
            'error' => $error
        );
        return $this->render('backoffice/connexion_dans_backoffice.html.twig', $params);
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
