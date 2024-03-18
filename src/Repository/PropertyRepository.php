<?php

namespace App\Repository;

use App\Entity\Property;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Property>
 *
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }

    public function filterPropertyByCategory() : array

    {
        return $this->createQueryBuilder("p")
        ->getQuery()
        ->getResult()
        ;
        
    }

    public function FindPropertyByMenu($subMenu, $id): array
    {
        return $this->createQueryBuilder('p')
            ->join('p.Category', 'm')
            ->andWhere('m.slug = :val')
            ->setParameter('val', $subMenu)
            ->andWhere('m.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()

        ;
    }
}

    
    //    /**
    //     * @return Property[] Returns an array of Property objects
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


