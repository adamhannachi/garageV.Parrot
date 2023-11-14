<?php

namespace App\Controller\Admin;

use App\Entity\ContactAnnonce;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactAnnonceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactAnnonce::class;
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
