<?php

namespace App\Repository;

use App\Entity\Skills;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Skills>
 *
 * @method Skills|null find($id, $lockMode = null, $lockVersion = null)
 * @method Skills|null findOneBy(array $criteria, array $orderBy = null)
 * @method Skills[]    findAll()
 * @method Skills[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skills::class);
    }
    public function save(Skills $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Skills $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Skills[] Returns an array of Skills objects
     */
    public function delete($value): array
    {
        $dql = 'DELETE FROM App\Entity\Skills s WHERE s.id = :value';
        $query = $this->getEntityManager()->createQuery($dql)
            ->setParameter('value', $value);
        $query->getResult();
        return [];
    }
    /**
     * @return Skills[] Returns an array of Skills objects
     */
    public function selectAll(): array
    {
        $dql = 'SELECT name.id, name.name, name.text FROM App\Entity\Skills name ORDER BY name.id ASC';
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }

//    public function findOneBySomeField($value): ?Skills
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
