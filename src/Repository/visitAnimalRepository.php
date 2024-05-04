<?php

namespace App\Repository;

use App\Document\visitAnimal;
use Doctrine\ODM\MongoDB\DocumentRepository;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository as RepositoryDocumentRepository;

class visitAnimalRepository extends RepositoryDocumentRepository
{
    public function getNom()
    {
        return visitAnimal::class;
    }
}