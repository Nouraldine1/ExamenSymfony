<?php

namespace App\Repository;

use App\Entity\Paiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Paiement>
 */
class PaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paiement::class);
    }
    public function findByDette(int $detteId): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.dette = :detteId')
            ->setParameter('detteId', $detteId)
            ->getQuery()
            ->getResult();
    }

    public function findByDateAfter(\DateTimeInterface $date): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.datePaiement >= :date')
            ->setParameter('date', $date)
            ->getQuery()
            ->getResult();
    }

    public function findByMontantMinimum(float $montantMin): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.montant >= :montantMin')
            ->setParameter('montantMin', $montantMin)
            ->getQuery()
            ->getResult();
    }
    

//    /**
//     * @return Paiement[] Returns an array of Paiement objects
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

//    public function findOneBySomeField($value): ?Paiement
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
