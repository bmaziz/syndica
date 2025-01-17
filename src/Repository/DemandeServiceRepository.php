<?php

namespace App\Repository;

use App\Entity\DemandeService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DemandeService>
 *
 * @method DemandeService|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeService|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeService[]    findAll()
 * @method DemandeService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeService::class);
    }

//    /**
//     * @return DemandeService[] Returns an array of DemandeService objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DemandeService
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
