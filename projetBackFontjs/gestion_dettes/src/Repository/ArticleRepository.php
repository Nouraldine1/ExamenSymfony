<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }
    public function save(Article $article, bool $flush = false): void
    {
        $this->getEntityManager()->persist($article);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByLowStock(int $threshold = 5): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.quantiteStock < :threshold')
            ->setParameter('threshold', $threshold)
            ->getQuery()
            ->getResult();
    }

    public function findByNom(string $nom): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->getQuery()
            ->getResult();
    }

    public function findByPrixMinimum(float $prixMin): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.prix >= :prixMin')
            ->setParameter('prixMin', $prixMin)
            ->getQuery()
            ->getResult();
    }
//    /**
//     * @return Article[] Returns an array of Article objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Article
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
