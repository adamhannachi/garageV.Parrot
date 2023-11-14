<?php

namespace App\Controller;
use App\Form\MarqueType;
use App\Entity\Categories;
use App\Entity\HorairesOuverture;
use App\Repository\CategoriesRepository;
use App\Repository\HorairesOuvertureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoriesController extends AbstractController
{
/**
 * afficher les Marques des voitures 
 * 
 * ajouter des nouvelle voitures
 */

    #[Route('/categories', name: 'app_categories', methods:['GET','POST'])]
    public function new(CategoriesRepository $repository ,Request $request, EntityManagerInterface $manager,
    HorairesOuvertureRepository $horairerepository  ): Response
    {   
      
        $categories= new Categories();
        $form = $this->createForm(MarqueType::class, $categories);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           $categories =$form->getData();
           $manager->persist($categories);
           $manager->flush();
          return $this->redirectToRoute('app_categories');
        }
        $horaire=$horairerepository->findAll();
        $categories= $repository->findAll();
        return $this->render('pages/categories/index.html.twig', [
            'form'=>$form->createView(),
            'categories'=>$categories,
            'horaire'=> $horaire
        ]);
    }

    // function delete

    #[Route('/supprimer/model/{id}','app_supprimer_model', methods:['GET','POST'])]
       public function delete(CategoriesRepository $repository,int $id , EntityManagerInterface $manager):Response
       {
        $categories= $repository->findOneBy(['id'=>$id]);
        $manager->remove($categories);
        $manager->flush();
        $this->addFlash(
            'success',
            'votre voiture a été bien supprimé dans le système',

           );
           return $this->redirectToRoute('app_crud');
         
          
        
       
    }

}
