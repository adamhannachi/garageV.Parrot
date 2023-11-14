<?php

namespace App\Controller;

use App\Entity\HorairesOuverture;
use App\Entity\ServiceGarage;
use App\Form\ServicegarageType;
use App\Repository\NoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ServiceGarageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\HorairesOuvertureRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServiceGarageController extends AbstractController
{
    #[Route('/', name: 'app_accueil',methods:['GET','POST'])]
    public function index(HorairesOuvertureRepository $repository): Response
    {
        $horaire=$repository->findAll();
        return $this->render('pages/service_garage/index.html.twig', [
            'horaire'=> $horaire
        ]);
    }


    #[Route('/gestion/service/garage', name: 'app_service_garage',methods:['GET','POST'])]
    public function service(Request $request, EntityManagerInterface $manager,ServiceGarageRepository $repository): Response
    {

        $service= new ServiceGarage();
        $form = $this->createForm(ServicegarageType::class, $service);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           $service =$form->getData();

           $manager->persist($service);
           
           $manager->flush();
           $this->addFlash(
            'success',
            'votre voiture a été bien rajouté dans le système',

           );
           return $this->redirectToRoute('app_service_garage');
         
        }
        $service=$repository->findAll();
        return $this->render('pages/service_garage/crud_service_garage.html.twig', [
           'form'=>$form->createView(),
           'service'=>$service,
          

        ]);
    }


    #[Route('/affichier/service', name: 'app_afficher_service_garage',methods:['GET','POST'])]
    public function show(ServiceGarageRepository $repository,  NoteRepository $noterepository, HorairesOuvertureRepository $horairerepository): Response
    {
        $service= $repository->findAll();
        $horaire=$horairerepository->findAll();
        $notes=$noterepository->findAll();
        return $this->render('pages/service_garage/service_preparation.html.twig', [
           'service'=>$service,
           'notes'=>$notes,
           'horaire'=> $horaire,
        ]);
    }

       #[Route('/supprimer/service/{id}',name:'supprimer_service', methods:['GET','POST'])]
       public function delete(ServiceGarageRepository $repository,int $id , EntityManagerInterface $manager):Response
       {
        $service= $repository->findOneBy(['id'=>$id]);
        $manager->remove($service);
        $manager->flush();
        $this->addFlash(
            'success',
            'votre service a été bien supprimé dans le système',

           );
           return $this->redirectToRoute('app_service_garage');
         
          
        
       
    }
}
