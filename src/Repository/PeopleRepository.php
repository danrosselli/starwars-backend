<?php

namespace App\Repository;

use App\Entity\People;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method People|null find($id, $lockMode = null, $lockVersion = null)
 * @method People|null findOneBy(array $criteria, array $orderBy = null)
 * @method People[]    findAll()
 * @method People[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeopleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, People::class);
    }

    public function findByIdx($value): ?People
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.idx = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
    public function update(People $people): People
    {
		
		$entityManager = $this->getEntityManager();
		
		// tell Doctrine you want to (eventually) save the Product
        $entityManager->persist($people);

        // executes the queries
        $entityManager->flush();
        
        return $people;
        
	}
	
	public function remove(People $people)
    {
		
		$entityManager = $this->getEntityManager();
		
		// tell Doctrine you want to (eventually) remove the Product
        $entityManager->remove($people);

        // executes the queries
        $entityManager->flush();
        
        return $people;
        
	}
    
}
