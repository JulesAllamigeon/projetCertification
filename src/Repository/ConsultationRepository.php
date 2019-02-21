<?php

namespace App\Repository;

use App\Entity\Consultation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Consultation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consultation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consultation[]    findAll()
 * @method Consultation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsultationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Consultation::class);
    }

    public function findByDate($filters)
    {
        $qb = $this->createQueryBuilder('b');
        $qb->orderBy('b.date', 'ASC');

        if (!empty($filters['date_de_debut'])) {
            $date = \DateTime::createFromFormat('d/m/Y H:i', $filters['date_de_debut']);
            $qb
                ->andWhere('b.date >= :dateDebut')
                ->setParameter(':dateDebut', $date->format('Y-m-d'))
            ;
        }

        if (!empty($filters['date_de_fin'])) {
            $date = \DateTime::createFromFormat('d/m/Y H:i', $filters['date_de_fin']);
            $qb
                ->andWhere('b.date <= :dateFin')
                ->setParameter(':dateFin', $date->format('Y-m-d'))
            ;
        }

        return $qb->getQuery()->getResult();

    }

    // /**
    //  * @return Consultation[] Returns an array of Consultation objects
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
    public function findOneBySomeField($value): ?Consultation
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
