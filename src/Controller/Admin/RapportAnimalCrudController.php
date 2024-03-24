<?php

namespace App\Controller\Admin;

use App\Entity\RapportAnimal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RapportAnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RapportAnimal::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new("etat");
        yield TextField::new("nourriturePropose");
        yield TextField::new("grammageNourriture");
        yield DateTimeField::new("datePassage");
        yield AssociationField::new("user");
        yield AssociationField::new("animal");

    }
    
}
