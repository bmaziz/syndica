<?php

namespace App\Repository;

use App\Entity\OfferService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OfferService>
 *
 * @method OfferService|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfferService|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfferService[]    findAll()
 * @method OfferService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfferService::class);
    }

//    /**
//     * @return OfferService[] Returns an array of OfferService objects
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

//    public function findOneBySomeField($value): ?OfferService
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
