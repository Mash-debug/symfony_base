<?php

namespace App\Repository;

use App\Entity\ShoesSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ShoesSize>
 *
 * @method ShoesSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShoesSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShoesSize[]    findAll()
 * @method ShoesSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoesSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShoesSize::class);
    }

//    /**
//     * @return ShoesSize[] Returns an array of ShoesSize objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ShoesSize
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
