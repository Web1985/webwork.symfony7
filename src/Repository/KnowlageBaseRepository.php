<?php

namespace App\Repository;

use App\Entity\KnowlageBase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<KnowlageBase>
 */
class KnowlageBaseRepository extends ServiceEntityRepository
{
    public const KNOWLAGE_BASE_PER_PAGE = 10;
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KnowlageBase::class);
    }

    public function getKnowlageBasePaginator(int $offset): Paginator {
        $query = $this -> createQueryBuilder('k')
        ->setFirstResult($offset)
        ->setMaxResults(self::KNOWLAGE_BASE_PER_PAGE)
        ->getQuery();
        return new Paginator($query);
    }

    public function findAll(): array {

        return $this->findBy([], ['title' => 'ASC']);
    }

    public function showTen(){
      return $this->findBy([], ['title'=> 'ASC'],self::KNOWLAGE_BASE_PER_PAGE);
    }

    //    /**
    //     * @return KnowlageBase[] Returns an array of KnowlageBase objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('k')
    //            ->andWhere('k.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('k.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?KnowlageBase
    //    {
    //        return $this->createQueryBuilder('k')
    //            ->andWhere('k.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
