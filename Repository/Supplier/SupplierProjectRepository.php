<?php

namespace Plugin\Management42\Repository\Supplier;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Plugin\Management42\Entity\Supplier\SupplierProject;

/**
 * @extends ServiceEntityRepository<SupplierProject>
 *
 * @method SupplierProject|null find($id, $lockMode = null, $lockVersion = null)
 * @method SupplierProject|null findOneBy(array $criteria, array $orderBy = null)
 * @method SupplierProject[]    findAll()
 * @method SupplierProject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupplierProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SupplierProject::class);
    }

    public function add(SupplierProject $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SupplierProject $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SupplierProject[] Returns an array of SupplierProject objects
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

//    public function findOneBySomeField($value): ?SupplierProject
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
