<?php

namespace App\Repository;

use App\Entity\ClothesSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClothesSize>
 *
 * @method ClothesSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClothesSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClothesSize[]    findAll()
 * @method ClothesSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClothesSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClothesSize::class);
    }

//    /**
//     * @return ClothesSize[] Returns an array of ClothesSize objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClothesSize
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
