<?php

namespace App\Controller;


use App\Entity\Note;
use App\Form\NoteType;
use App\Data\SearchData;
use App\Form\SearchForm;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\NoteRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CommentaireRepository;
use App\Repository\HorairesOuvertureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    /**
     * Undocumented function
     *
     * @param ProductRepository $repository
     * @param Request $request
     * @return Response
     */
    #[Route('/voiture/occasion', name: 'app_product', methods:['GET','POST'])]
    public function index(ProductRepository $repository ,Request $request,
    EntityManagerInterface $manager, CommentaireRepository $commentairerepository, NoteRepository $noterepository, HorairesOuvertureRepository $horairerepository): Response
    {
         //horaires
        // notes 
      
        $notes= new Note();
        $formnote= $this->createForm(NoteType::class, $notes);
        $formnote->handleRequest($request);
       
        if($formnote->isSubmitted() && $formnote->isValid()){
           $notes=$formnote->getData();

           $manager->persist($notes);
           
           $manager->flush();
          
           return $this->redirectToRoute('app_product');
         
        }

       //  filter voiture 
        $data = new SearchData();
        $data->page = $request->get('page',1);
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $products = $repository->findSearch($data);
        

         $commentaire= new Commentaire();
         $formcommentaire = $this->createForm(CommentaireType::class, $commentaire);
         $formcommentaire->handleRequest($request);
         
         if($formcommentaire->isSubmitted() && $formcommentaire->isValid()){
          
            $commentaire =$formcommentaire->getData();
           
            $manager->persist($commentaire);
          
            $manager->flush();

            return $this->redirectToRoute('app_product');
          
         }
         $horaire=$horairerepository->findAll();
         $notes=$noterepository->findAll();
         $commentaire= $commentairerepository->findAll();
         return $this->render('product/index.html.twig',[ 
            'products'=>$products,
            'form'=>$form->createView(),
            'formcommentaire'=> $formcommentaire->createView(),
            'commentaire'=> $commentaire,
            'formnote'=>$formnote->createView(),
            'notes'=>$notes,
            'horaire'=> $horaire
           
        ]);
    
    }
    
    #[Route('/supprime/commentaire/{id}','supprimer_commentaire', methods:['GET','POST'])]
    public function deleteEmail(CommentaireRepository $commentairerepository,int $id , EntityManagerInterface $manager):Response
    {
     $commentaire= $commentairerepository->findOneBy(['id'=>$id]);
     $manager->remove($commentaire);
     $manager->flush();
   
        return $this->redirectToRoute('app_product');
   
    }
}
    