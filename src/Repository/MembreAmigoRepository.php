<?php

namespace App\Repository;

use App\Entity\MembreAmigo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MembreAmigo>
 *
 * @method MembreAmigo|null find($id, $lockMode = null, $lockVersion = null)
 * @method MembreAmigo|null findOneBy(array $criteria, array $orderBy = null)
 * @method MembreAmigo[]    findAll()
 * @method MembreAmigo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MembreAmigoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MembreAmigo::class);
    }

//    /**
//     * @return MembreAmigo[] Returns an array of MembreAmigo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MembreAmigo
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
