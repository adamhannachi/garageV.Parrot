<?php

namespace App\Repository;

use App\Entity\ContactAnnonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContactAnnonce>
 *
 * @method ContactAnnonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactAnnonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactAnnonce[]    findAll()
 * @method ContactAnnonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactAnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactAnnonce::class);
    }

//    /**
//     * @return ContactAnnonce[] Returns an array of ContactAnnonce objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ContactAnnonce
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
