<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\Avis;
use App\Entity\AlimentationJour;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployerDashboardController extends AbstractDashboardController
{
    #[Route('/employer', name: 'app_employer_dashboard')]
    public function index(): Response
    {
        return $this->render("employer/employerdashboard.html.twig");
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Arcadia2024');
    }

    public function configureMenuItems(): iterable
    {
         yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Service', 'fas fa-list', Service::class);
         yield MenuItem::linkToCrud('Avis', 'fas fa-list', Avis::class);
         yield MenuItem::linkToCrud('Alimentation Jour', 'fas fa-list', AlimentationJour::class);
    }
}


