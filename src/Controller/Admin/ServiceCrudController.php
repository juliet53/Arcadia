<?php

namespace App\Controller\Admin;

use App\Entity\Service;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }
    
    

   
    public function configureFields(string $pageName): iterable
    {
        yield from parent::configureFields($pageName);
        yield TextareaField::new("imageFile")->setFormType(VichImageType::class)->hideOnindex();
    }
   
}
