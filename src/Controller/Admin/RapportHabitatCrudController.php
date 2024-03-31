<?php

namespace App\Controller\Admin;

use App\Entity\RapportHabitat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RapportHabitatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RapportHabitat::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new("user");
        yield DateTimeField::new("date");
        yield TextareaField::new("etat");
        yield AssociationField::new("Habitat");
    }
    
}
