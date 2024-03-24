<?php

namespace App\Repository;

use App\Entity\RapportAnimal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RapportAnimal>
 *
 * @method RapportAnimal|null find($id, $lockMode = null, $lockVersion = null)
 * @method RapportAnimal|null findOneBy(array $criteria, array $orderBy = null)
 * @method RapportAnimal[]    findAll()
 * @method RapportAnimal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportAnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RapportAnimal::class);
    }

    //    /**
    //     * @return RapportAnimal[] Returns an array of RapportAnimal objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RapportAnimal
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
