<?php

namespace App\Repository;

use App\Entity\Exposition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Exposition>
 *
 * @method Exposition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Exposition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Exposition[]    findAll()
 * @method Exposition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exposition::class);
    }

    public function add(Exposition $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Exposition $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAfterNow(bool $actif): array
    {
        $now = new \DateTime('now');
        return $this->createQueryBuilder('e')
            ->where('e.dateFin >= :date')
            ->andWhere('e.actif LIKE :actif')
            ->orderBy('e.dateDebut', 'ASC')
            ->setParameter('actif', $actif)
            ->setParameter('date', $now->format('Y-m-d'))
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Exposition[] Returns an array of Exposition objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Exposition
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
