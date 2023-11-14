<?php

namespace App\Repository;

use App\Entity\ServiceGarage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServiceGarage>
 *
 * @method ServiceGarage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceGarage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceGarage[]    findAll()
 * @method ServiceGarage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceGarageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceGarage::class);
    }

//    /**
//     * @return ServiceGarage[] Returns an array of ServiceGarage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ServiceGarage
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
