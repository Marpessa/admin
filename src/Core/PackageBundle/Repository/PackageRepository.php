<?php

namespace Core\PackageBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PackageRepository extends EntityRepository
{
	public function findByPart( $partSlug ) {

    $em = $this->getEntityManager();

		$q = $this->createQueryBuilder('p')
              ->select('p.title, p.slug, p.entityName')
              ->addSelect('pg.id AS pg_id, pg.icon AS pg_icon, pg.title AS pg_title')
              // ->from('CorePackageBundle:Package', 'p')
              ->innerJoin('p.packageGroupId', 'pg')
              //->leftJoin('p.part_id', 'part')

              ->where('p.isPublished = 1')
              //->andWhere('d.url = :domain')

              ->orderBy('pg.title', 'ASC')

              //->setParameter('domain', $domain)
              ->getQuery();

        return $q;
	}
}

?>
