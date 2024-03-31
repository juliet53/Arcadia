<?php

namespace App\Controller\Admin;

use App\Entity\AlimentationJour;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AlimentationJourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AlimentationJour::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       
        
        yield AssociationField::new("animal");
        yield AssociationField::new("user");
        yield TextField::new("nourrituredonne");
        yield TextField::new("quantite");
        yield DateTimeField::new("date");
    }
    
}
