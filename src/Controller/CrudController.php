<?php

namespace App\Controller;


use App\Form\CarType;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\HorairesOuvertureRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrudController extends AbstractController
{
    /**
     * Undocumented function
     *
     * @param ProductRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/crud', name: 'app_crud' , methods:['GET'])]
    public function index(ProductRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $products = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), 
            10 
        );
        return $this->render('pages/crud/index.html.twig', [
           'products'=>$products
        ]);
    }

    // Création d'un nouveau Produit
    
    #[Route('/nouveau/car', name:'nouveau_car',methods:['GET','POST'])]
    public function new(Request $request, EntityManagerInterface $manager):Response
    {
        
        $product= new Product();
        $form = $this->createForm(CarType::class, $product);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           $product =$form->getData();

           $manager->persist($product);
           
           $manager->flush();
           $this->addFlash(
            'success',
            'votre voiture a été bien rajouté dans le système',

           );
           return $this->redirectToRoute('app_crud');
         
        }
      
        return $this->render('pages/crud/nouveau_car.html.twig',[
            'form'=>$form->createView(),
           
        ]);
    }

    // Modifier mes produits 
    /**
     * @param Product $product
     * 
     */
    #[Route('/modifier/car/{id}', 'app_modifier', methods:['GET','POST'])]
    public function edit( ProductRepository $repository,int $id ,Request $request, EntityManagerInterface $manager): Response
    {
        $product= $repository->findOneBy(['id'=>$id]);
        $form = $this->createForm(CarType::class, $product);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           $product =$form->getData();
          
           $manager->persist($product);
           
           $manager->flush();
           $this->addFlash(
            'success',
            'votre voiture a été bien modifié dans le système',

           );
           return $this->redirectToRoute('app_crud');
         
        }
        return $this->render('pages/crud/modifier_car.html.twig',[
           'form'=> $form->createView(),
        ]);

       }

       // function delete
       #[Route('/supprimer/car/{id}','app_supprimer', methods:['GET','POST'])]
       public function delete(ProductRepository $repository,int $id , EntityManagerInterface $manager):Response
       {
        $product= $repository->findOneBy(['id'=>$id]);
        $manager->remove($product);
        $manager->flush();
        $this->addFlash(
            'success',
            'votre voiture a été bien supprimé dans le système',

           );
           return $this->redirectToRoute('app_crud');
         
          
        
       
    }
}
    
    
