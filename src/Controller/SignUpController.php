<?php

namespace App\Controller;

use SignUpUserCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SignUpController extends AbstractController
{
    /**
     * @Route("/sign/up", name="sign_up")
     */
    public function index(Request $request)
    {
        $bus -> dispatch(new SignUpUserCommand($email, $password));

        // recuperer les infos entrées au du niveau du form

        // Valider les infos 

        // Enregistrement de l'user

        // Envoyer un mail de bienvenue

        // Incrémenter le nombre d'utilisateur pour les stats

        return $this->render('sign_up/index.html.twig', [
            'controller_name' => 'SignUpController',
        ]);
    }
}
