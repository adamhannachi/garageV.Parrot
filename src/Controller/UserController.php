<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CarType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    /**
     * Undocumented function
     *
     * @param UserRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/user', name: 'app_user', methods:['GET'])]
    public function index(UserRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {

        $users = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), 
            10 
        );
        
        return $this->render('pages/user/index.html.twig', [
            'users'=> $users
        ]);
    }

    #[Route('/nouveau/personnel', name:'nouveau_personnel',methods:['GET','POST'])]
    public function new(Request $request, EntityManagerInterface $manager,UserPasswordHasherInterface $hasher):Response
    {

        $user= new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $hasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $manager->persist($user);
            $manager->flush();

           $this->addFlash(
            'success',
            'votre Utlisateur a été bien créée dans le système',

           );
           return $this->redirectToRoute('app_user');
        }

        return $this->render('pages/user/nouveau_personnel.html.twig',[
            'form'=>$form->createView()

        ]);
    }
     // Modifier mes produits 
    /**
     * @param Product $product
     * 
     */
    #[Route('/modifier/user/{id}', 'personnel_modifier', methods:['GET','POST'])]
    public function edit( UserRepository $repository,int $id ,Request $request, EntityManagerInterface $manager): Response
    {
        $user= $repository->findOneBy(['id'=>$id]);
        $form = $this->createForm(UserType::class, $user);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           $user =$form->getData();
          
           $manager->persist($user);
           
           $manager->flush();
           $this->addFlash(
            'success',
            'votre utilisateur a été bien modifié dans le système',

           );
           return $this->redirectToRoute('app_user');
         
        }
        return $this->render('pages/user/modifier_personnel.html.twig',[
           'form'=> $form->createView(),
        ]);

       }
       #[Route('/supprimer/personnel/{id}','personnel_supprimer', methods:['GET','POST'])]
       public function delete(UserRepository $repository,int $id , EntityManagerInterface $manager):Response
       {
        $user= $repository->findOneBy(['id'=>$id]);
        $manager->remove($user);
        $manager->flush();
        $this->addFlash(
            'success',
            'votre utilisateur a été bien supprimé dans le système',

           );
           return $this->redirectToRoute('app_user');
         
          
        
       
    }
}
