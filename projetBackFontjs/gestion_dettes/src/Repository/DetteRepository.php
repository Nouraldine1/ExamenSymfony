<?php

namespace App\Repository;

use App\Entity\Dette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Dette>
 */
class DetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dette::class);
    }
    public function save(Dette $dette, bool $flush = false): void
    {
        $this->getEntityManager()->persist($dette);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByClient(int $clientId): array
    {
        return $this->createQueryBuilder('d')
            ->where('d.client = :clientId')
            ->setParameter('clientId', $clientId)
            ->getQuery()
            ->getResult();
    }

    
    public function findByStatut(string $statut): array
    {
        return $this->createQueryBuilder('d')
            ->where('d.statut = :statut')
            ->setParameter('statut', $statut)
            ->getQuery()
            ->getResult();
    }

    public function findByArticle(int $articleId): array
    {
        return $this->createQueryBuilder('d')
            ->where('d.article = :articleId')
            ->setParameter('articleId', $articleId)
            ->getQuery()
            ->getResult();
    }

    public function findByMontantMinimum(float $montantMin): array
    {
        return $this->createQueryBuilder('d')
            ->where('d.montant >= :montantMin')
            ->setParameter('montantMin', $montantMin)
            ->getQuery()
            ->getResult();
    }

    public function findByClientAndStatut(int $clientId, string $statut): array
    {
        return $this->createQueryBuilder('d')
            ->where('d.client = :clientId')
            ->andWhere('d.statut = :statut')
            ->setParameter('clientId', $clientId)
            ->setParameter('statut', $statut)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Dette[] Returns an array of Dette objects
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

//    public function findOneBySomeField($value): ?Dette
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
