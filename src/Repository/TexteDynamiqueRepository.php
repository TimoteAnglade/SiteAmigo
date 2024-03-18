<?php

namespace App\Repository;

use App\Entity\TexteDynamique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TexteDynamique>
 *
 * @method TexteDynamique|null find($id, $lockMode = null, $lockVersion = null)
 * @method TexteDynamique|null findOneBy(array $criteria, array $orderBy = null)
 * @method TexteDynamique[]    findAll()
 * @method TexteDynamique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TexteDynamiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TexteDynamique::class);
    }

//    /**
//     * @return TexteDynamique[] Returns an array of TexteDynamique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TexteDynamique
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
