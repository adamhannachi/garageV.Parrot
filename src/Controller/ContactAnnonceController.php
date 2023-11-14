<?php

namespace App\Controller;



use App\Form\CarType;
use App\Entity\ContactAnnonce;
use App\Form\ContactAnnonceType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ContactAnnonceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactAnnonceController extends AbstractController
{
    #[Route('/contact/annonce/{id}', name:'app_ContactAnnonce',methods:['GET','POST'])]
  
    public function infoVoiture(ProductRepository $repository,Request $request, EntityManagerInterface $manager,int $id): Response
    {
        
        $product= $repository->findOneBy(['id'=>$id]);
       
        $contact= $repository->findOneBy(['id'=>$id]);
        $contact= new ContactAnnonce();
        $form = $this->createForm(ContactAnnonceType::class, $contact);
        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid()){
           $contact =$form->getData();

           $manager->persist($contact);
           
           $manager->flush();
           $this->addFlash(
            'success',
            'votre message a été bien transmis dans le système',

           );
           return $this->redirectToRoute('app_product');
        }
        
        return $this->render('pages/contact/contact_Annonce.html.twig',[
            'form'=> $form->createView(),
             'product'=>$product
          
          
        ]);

       } 





         //boite de message Annonce

         #[Route('/boite/annonce', name:'app_boite_Contact', methods:['GET'])]
         public function boitecontact(ContactAnnonceRepository $repository,PaginatorInterface $paginator, Request $request):Response
         {
  
               
               $contactAnnonce = $paginator->paginate(
                  $repository->findAll(),
                  $request->query->getInt('page', 1), 
                  10 
              );
            
                return $this->render('pages/contact/boite_contactAnnonce.html.twig',[
                  'contactAnnonce'=> $contactAnnonce 
                ]);
          }
  
          // delete message Annonce clients
  
          #[Route('/boite/annonce/{id}','supprimer_Message_Annonce', methods:['GET','POST'])]
          public function deleteContact(ContactAnnonceRepository $repository,int $id , EntityManagerInterface $manager):Response
          {
           $contactAnnonce= $repository->findOneBy(['id'=>$id]);
           $manager->remove($contactAnnonce);
           $manager->flush();
           $this->addFlash(
               'success',
               'le message d\'annonce a été bien supprimé dans le système',
      
              );
              return $this->redirectToRoute('app_boite_Contact');
            
             
           
          
       }
    

     
    }

       

