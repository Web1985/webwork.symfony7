<?php

namespace App\Controller\Admin;

use App\Entity\KnowlageBase;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class KnowlageBaseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return KnowlageBase::class;
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
