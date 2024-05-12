<?php

namespace App\Repository;

use App\Entity\ManagerResidence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ManagerResidence>
 *
 * @method ManagerResidence|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManagerResidence|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManagerResidence[]    findAll()
 * @method ManagerResidence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManagerResidenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManagerResidence::class);
    }

//    /**
//     * @return ManagerResidence[] Returns an array of ManagerResidence objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ManagerResidence
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
