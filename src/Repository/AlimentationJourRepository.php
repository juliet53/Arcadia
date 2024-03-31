<?php

namespace App\Repository;

use App\Entity\AlimentationJour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlimentationJour>
 *
 * @method AlimentationJour|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlimentationJour|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlimentationJour[]    findAll()
 * @method AlimentationJour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlimentationJourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlimentationJour::class);
    }

    //    /**
    //     * @return AlimentationJour[] Returns an array of AlimentationJour objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AlimentationJour
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
