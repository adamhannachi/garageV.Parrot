<?php

namespace App\Controller\Admin;

use App\Entity\Note;
use App\Entity\User;
use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\Categories;
use App\Entity\Commentaire;
use App\Entity\ServiceGarage;
use App\Entity\ContactAnnonce;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin',methods:['GET','POST'])]
    public function index(): Response
    {
        return $this->render('admin/administrateur.html.twig');

        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V.Parrot')

            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilistauer', 'fa-solid fa-users',User::class);
        yield MenuItem::linkToCrud('Caractéristique car', 'fa-solid fa-car',Product::class);
        yield MenuItem::linkToCrud('Catégories car', 'fa-solid fa-car',Categories::class);
        yield MenuItem::linkToCrud('Annonce', 'fa-solid fa-file-signature',ContactAnnonce::class);
        yield MenuItem::linkToCrud('Email', 'fa-solid fa-at',Contact::class);
        yield MenuItem::linkToCrud('Commentaire', 'fa-regular fa-comment',Commentaire::class);
        yield MenuItem::linkToCrud('Notes', 'fa-regular fa-clipboard',Note::class);
        yield MenuItem::linkToCrud('Service Garage', 'fa-solid fa-warehouse',ServiceGarage::class);
      
       
       
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
