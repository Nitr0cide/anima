<?php

namespace App\Repository;

use App\Entity\UserAnimeList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserAnimeList|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAnimeList|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAnimeList[]    findAll()
 * @method UserAnimeList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserAnimeListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserAnimeList::class);
    }

    // /**
    //  * @return UserAnimeList[] Returns an array of UserAnimeList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserAnimeList
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
