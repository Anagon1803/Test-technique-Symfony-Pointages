<?php

namespace App\Repository;

use App\Entity\ProjectClocking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProjectClocking>
 *
 * @method ProjectClocking|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectClocking|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectClocking[]    findAll()
 * @method ProjectClocking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectClockingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectClocking::class);
    }

//    /**
//     * @return ProjectClocking[] Returns an array of ProjectClocking objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProjectClocking
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
