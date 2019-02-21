<?php

namespace App\Repository;

use App\Entity\Booking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Booking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booking[]    findAll()
 * @method Booking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Booking::class);
    }

    // /**
    //  * @return Booking[] Returns an array of Booking objects
    //  */
    /*
     * */

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


    /*
    public function findOneBySomeField($value): ?Booking
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
