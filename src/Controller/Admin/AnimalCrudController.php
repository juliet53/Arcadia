<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       yield from parent::configureFields(($pageName)); 
        yield AssociationField::new("Habitat");
    }
    
}
