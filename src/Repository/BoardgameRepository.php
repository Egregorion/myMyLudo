<?php

namespace App\Repository;

use App\Entity\Boardgame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<Boardgame>
 */
class BoardgameRepository extends ServiceEntityRepository
{

    public const BOARDGAMES_PER_PAGE = 2;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boardgame::class);
    }

    public function getBoardgamePaginator(int $offset): Paginator
    {
        $query = $this->createQueryBuilder('b')
            ->orderBy('b.id', 'ASC')
            ->setFirstResult($offset)
            ->setMaxResults(self::BOARDGAMES_PER_PAGE)
            ->getQuery();

        return new Paginator($query);
    }

    //    /**
    //     * @return Boardgame[] Returns an array of Boardgame objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Boardgame
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
