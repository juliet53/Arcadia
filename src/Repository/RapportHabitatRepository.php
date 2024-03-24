<?php

namespace App\Repository;

use App\Entity\RapportHabitat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RapportHabitat>
 *
 * @method RapportHabitat|null find($id, $lockMode = null, $lockVersion = null)
 * @method RapportHabitat|null findOneBy(array $criteria, array $orderBy = null)
 * @method RapportHabitat[]    findAll()
 * @method RapportHabitat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportHabitatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RapportHabitat::class);
    }

    //    /**
    //     * @return RapportHabitat[] Returns an array of RapportHabitat objects
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

    //    public function findOneBySomeField($value): ?RapportHabitat
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
