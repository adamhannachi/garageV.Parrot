<?php

namespace App\Controller;

use App\Form\HorairesType;
use App\Entity\HorairesOuverture;
use App\Repository\HorairesOuvertureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HorairesController extends AbstractController
{
    #[Route('/horaires', name: 'app_horaires', methods:['GET','POST'])]
    public function index(Request $request,EntityManagerInterface $manager,HorairesOuvertureRepository $horairerepository ): Response
    {
       
        $horaire= new HorairesOuverture();
        $form= $this->createForm(HorairesType::class, $horaire);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $horaire= $form->getData();
            $manager->persist($horaire);
            $manager->flush();

            return $this->redirectToRoute('app_horaires');
        }

       
        $horaire=$horairerepository->findAll();
        return $this->render('pages/horaires/horaires_tr.html.twig', [
            'form'=>$form->createView(),
            'horaire'=> $horaire
          
    ]);
}


#[Route('/horaires/afficher', name: 'afficher_horaires', methods:['GET','POST'])]
public function horaire(HorairesOuvertureRepository $repository ): Response
{
   
  
    $horaire=$repository->findAll();
    return $this->render('pages/horaires/affichage_horaires.html.twig', [
        'horaire'=> $horaire
     
]);
}


}
    



?>