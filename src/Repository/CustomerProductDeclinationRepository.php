<?php

namespace App\Repository;

use App\Entity\CustomerProductDeclination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CustomerProductDeclination>
 *
 * @method CustomerProductDeclination|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerProductDeclination|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerProductDeclination[]    findAll()
 * @method CustomerProductDeclination[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerProductDeclinationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerProductDeclination::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CustomerProductDeclination $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(CustomerProductDeclination $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CustomerProductDeclination[] Returns an array of CustomerProductDeclination objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CustomerProductDeclination
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
