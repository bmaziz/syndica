<?php

namespace App\Repository;

use App\Entity\Occuption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Occuption>
 *
 * @method Occuption|null find($id, $lockMode = null, $lockVersion = null)
 * @method Occuption|null findOneBy(array $criteria, array $orderBy = null)
 * @method Occuption[]    findAll()
 * @method Occuption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccuptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Occuption::class);
    }

//    /**
//     * @return Occuption[] Returns an array of Occuption objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Occuption
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
