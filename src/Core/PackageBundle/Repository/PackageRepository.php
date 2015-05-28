<?php

namespace Core\PackageBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PackageRepository extends EntityRepository
{
	public function findByPart( $partSlug ) {

    $em = $this->getEntityManager();

		$q = $this->createQueryBuilder('p')
              ->select('p.title, p.slug, p.link')
              ->addSelect('pg.id AS pg_id, pg.icon AS pg_icon, pg.title AS pg_title')
              // ->from('CorePackageBundle:Package', 'p')
              ->innerJoin('p.package_group_id', 'pg')
              //->leftJoin('p.part_id', 'part')

              ->where('p.is_published = 1')
              //->andWhere('d.url = :domain')

              ->orderBy('pg.title', 'ASC')

              //->setParameter('domain', $domain)
              ->getQuery();

        return $q;
	}
}

?>
