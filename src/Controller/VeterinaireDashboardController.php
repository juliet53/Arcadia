<?php

namespace App\Controller;

use App\Entity\RapportHabitat;
use App\Entity\RapportAnimal;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VeterinaireDashboardController extends AbstractDashboardController
{
    #[Route('/veterinaire', name: 'app_veterinaire_dashboard')]
    public function index(): Response
    {
        return $this->render('veterinaire/veterinairedashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Arcadia2024');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Accueil', 'fas fa-home', 'app_home');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Rapport Habitat', 'fas fa-list', RapportHabitat::class);
        yield MenuItem::linkToCrud('Rapport Animal', 'fas fa-list', RapportAnimal::class);
    }
}

