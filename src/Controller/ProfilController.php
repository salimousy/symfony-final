<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil', methods: ['GET'])]
    function profile(Request $req, UtilisateurRepository $repo)
    {
        if (!$this->isGranted("IS_AUTHENTICATED_FULLY")){
            return $this->redirectToRoute('app_inscription');
        }
        return $this->render('pages/profile/index.html.twig');
    }
}