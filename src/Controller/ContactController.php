<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\HorairesOuvertureRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/boite/email', name: 'app_email' , methods:['GET','POST'])]
    public function index(ContactRepository $repository, PaginatorInterface $paginator, Request $request,): Response
    {
        
        $contact = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), 
            10 
        );
        
        return $this->render('pages/contact/index.html.twig', [
           'contact'=>$contact,
           
        ]);
    }

    #[Route('/contact/clientels', name: 'app_contact',methods:['GET','POST'])]
    public function send( Request $request, EntityManagerInterface $manager): Response
    {

        $contact= new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           $contact =$form->getData();

           $manager->persist($contact);
           
           $manager->flush();
           $this->addFlash(
            'success',
            'votre messagea été bien envoyé',

           );
           return $this->redirectToRoute('app_product');
         
        }
      
        return $this->render('pages/contact/contacts.html.twig', [
            'form'=>$form->createView()
        ]);
    }


    // delete message clients

    #[Route('/supprimer/email/{id}','supprimer_email', methods:['GET','POST'])]
    public function deleteEmail(ContactRepository  $repository,int $id , EntityManagerInterface $manager):Response
    {
     $contact= $repository->findOneBy(['id'=>$id]);
     $manager->remove($contact);
     $manager->flush();
     $this->addFlash(
         'success',
         'le message a été bien supprimé dans le système',

        );
        return $this->redirectToRoute('app_email');
      
       
     
    
 }

}
