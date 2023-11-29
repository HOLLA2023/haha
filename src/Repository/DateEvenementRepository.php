<?php

namespace App\Repository;

use App\Entity\DateEvenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DateEvenement>
 *
 * @method DateEvenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateEvenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateEvenement[]    findAll()
 * @method DateEvenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateEvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateEvenement::class);
    }

//    /**
//     * @return DateEvenement[] Returns an array of DateEvenement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DateEvenement
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
