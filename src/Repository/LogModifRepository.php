<?php

namespace App\Repository;

use App\Entity\LogModif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LogModif>
 *
 * @method LogModif|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogModif|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogModif[]    findAll()
 * @method LogModif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogModifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogModif::class);
    }

//    /**
//     * @return LogModif[] Returns an array of LogModif objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LogModif
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
