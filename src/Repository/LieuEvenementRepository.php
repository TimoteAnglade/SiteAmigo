<?php

namespace App\Repository;

use App\Entity\LieuEvenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LieuEvenement>
 *
 * @method LieuEvenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method LieuEvenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method LieuEvenement[]    findAll()
 * @method LieuEvenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LieuEvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LieuEvenement::class);
    }

//    /**
//     * @return LieuEvenementFixtures[] Returns an array of LieuEvenementFixtures objects
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

//    public function findOneBySomeField($value): ?LieuEvenementFixtures
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
