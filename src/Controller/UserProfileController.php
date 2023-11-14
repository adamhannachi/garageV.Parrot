<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\HorairesOuvertureRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserProfileController extends AbstractController
{
    #[Route('/user/profile', name: 'app_user_profile',methods:['GET','POST'])]
    public function index(HorairesOuvertureRepository $horairerepository): Response
    {
        $horaire=$horairerepository->findAll();
        return $this->render('user_profile/index.html.twig', [
            'horaire'=> $horaire
        ]);
    }
}
