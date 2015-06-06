<?php

namespace Core\PackageBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PartPackageRepository extends EntityRepository
{
	public function findByPart( $partSlug ) {

    	$em = $this->getEntityManager();

		$q = $this->createQueryBuilder('part_package')
              ->select('part_package.id, part_package.title, part_package.slug')
              ->addSelect('package.entityName AS package_entity_name')
              ->addSelect('package_group.id AS package_group_id, package_group.icon AS package_group_icon, package_group.title AS package_group_title')

              ->innerJoin('part_package.partId', 'part')
              ->innerJoin('part_package.packageId', 'package')
              ->innerJoin('package.packageGroupId', 'package_group')

              ->where('part.slug = :partSlug')
              ->andWhere('package.isPublished = 1')
              ->andWhere('part_package.isPublished = 1')

              ->orderBy('package_group.defaultPosition', 'ASC')
              ->addOrderBy('part_package.position', 'ASC')

              ->setParameter('partSlug', $partSlug)
              ->getQuery();

        return $q;
	}
}

?>
