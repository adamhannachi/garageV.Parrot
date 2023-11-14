<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\NoteType;
use App\Repository\NoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NoteController extends AbstractController
{
    #[Route('/note', name: 'app_note',methods:['GET','POST'])]
    public function note(NoteRepository $repository,Request $request, EntityManagerInterface $manager,int $id): Response
    {
      
       
       
        return $this->render('product/index.html.twig',[
            
        ]);
           
    }
}
