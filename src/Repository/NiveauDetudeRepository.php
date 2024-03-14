<?php

namespace App\Repository;

use App\Entity\NiveauDetude;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NiveauDetude>
 *
 * @method NiveauDetude|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauDetude|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauDetude[]    findAll()
 * @method NiveauDetude[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauDetudeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauDetude::class);
    }

//    /**
//     * @return NiveauDetude[] Returns an array of NiveauDetude objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NiveauDetude
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
