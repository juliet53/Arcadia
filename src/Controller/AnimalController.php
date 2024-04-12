<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimalController extends AbstractController
{
    #[Route('/animal', name: 'app_animal')]
    public function index(AnimalRepository $animalRepository): Response
    {
       $animals = $animalRepository->findBy([], ['id' => 'DESC']);
dump($animals);
        return $this->render('animal/index.html.twig', [
            'animals' => $animals,
        ]);
    }
    #[Route('/animal/{id}', name: 'app_animal_show')]
    public function show(Animal $animal): Response
    {
        
        return $this->render('animal/show.html.twig', [
            'animal' => $animal,
        ]);
    }
}
