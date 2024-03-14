<?php

namespace App\Repository;

use App\Entity\TypeRequete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeRequete>
 *
 * @method TypeRequete|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeRequete|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeRequete[]    findAll()
 * @method TypeRequete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeRequeteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeRequete::class);
    }

//    /**
//     * @return TypeRequete[] Returns an array of TypeRequete objects
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

//    public function findOneBySomeField($value): ?TypeRequete
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
