<?php

namespace App\Controller\Admin;

use App\Entity\ServiceGarage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServiceGarageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceGarage::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
