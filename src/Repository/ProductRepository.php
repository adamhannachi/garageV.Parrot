<?php

namespace App\Repository;
use App\Entity\Product;
use App\Data\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;


/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
     
        parent::__construct($registry, Product::class);
      
      $this->paginator = $paginator;
     
    
        
    
    }


    /**
     * recupérer les produit avec une recherche
     * @return PaginationInterface
     */

     public function findSearch(SearchData $search): PaginationInterface
     {
        $query = $this
         
        ->createQueryBuilder('p')
        ->select('c','p')
        ->join('p.category', 'c');

       // bare de recherche 
        if(!empty($search->q)){
            $query =$query
            ->andWhere('p.name LIKE :q')
            ->setParameter('q', "%{$search->q}%");
        }
       // filter prix
        if(!empty($search->pmin)){
            $query =$query
            ->andWhere('p.price >= :pmin')
            ->setParameter('pmin', $search->pmin);
           
        }

        if(!empty($search->pmax)){
            $query =$query
            ->andWhere('p.price <= :pmax')
            ->setParameter('pmax', $search->pmax);
        }

        //filter kilométrage
        if(!empty($search->kmin)){
            $query =$query
            ->andWhere('p.kilometrage >= :kmin')
            ->setParameter('kmin', $search->kmin);
        }

        if(!empty($search->kmax)){
            $query =$query
            ->andWhere('p.kilometrage <= :kmax')
            ->setParameter('kmax', $search->kmax);
        }

        //filter année

        if(!empty($search->amin)){
            $query =$query
            ->andWhere('p.years >= :amin')
            ->setParameter('amin', $search->amin);
        }

        if(!empty($search->amax)){
            $query =$query
            ->andWhere('p.years <= :amax')
            ->setParameter('amax', $search->amax);
        }

        //filter promo
        if(!empty($search->promo)){
            $query =$query
            ->andWhere('p.promo = 1');
           
        }

         // category
    if(!empty($search->Category)){
        $query =$query
        ->andWhere('c.id IN (:Category)')
        ->setParameter('Category', $search->Category);
    }
     
     $query = $query->getQuery();
     return $this->paginator->paginate(
        $query,
        $search->page,
        12,
        
     );
   
       
     }

    

}
