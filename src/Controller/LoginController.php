<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         
        $error = $authenticationUtils->getLastAuthenticationError();
        
        $lastUsername = $authenticationUtils->getLastUsername();

        
        $form = $this->createForm(LoginType::class, [
            'email' => $lastUsername
        ]);
        
        return $this->render('pages/login/index.html.twig', [
            'form' => $form->createView(),
            'error' => $error
            ]);
            if($error) {
                $this->addFlash('error', 'veuillez rentrer le bon mot de passe' );
                return $this->redirectToRoute('app_login');
            }
            
    }

    
}
