<?php

namespace Plugin\Management42\Repository\Supplier;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Plugin\Management42\Entity\Supplier\SupplierEvent;

/**
 * @extends ServiceEntityRepository<SupplierEvent>
 *
 * @method SupplierEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method SupplierEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method SupplierEvent[]    findAll()
 * @method SupplierEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupplierEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SupplierEvent::class);
    }

    public function add(SupplierEvent $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SupplierEvent $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SupplierEvent[] Returns an array of SupplierEvent objects
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

//    public function findOneBySomeField($value): ?SupplierEvent
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
