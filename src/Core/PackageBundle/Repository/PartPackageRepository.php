<?php

namespace Core\PackageBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PartPackageRepository extends EntityRepository
{
	public function findByPart( $partSlug ) {

    	$em = $this->getEntityManager();

		$q = $this->createQueryBuilder('part_package')
              ->select('part_package.id, part_package.title, part_package.slug')
              ->addSelect('package.link AS package_link, package.has_unique_part_package AS package_has_unique_part_package')
              ->addSelect('package_group.id AS package_group_id, package_group.icon AS package_group_icon, package_group.title AS package_group_title')

              ->innerJoin('part_package.part_id', 'part')
              ->innerJoin('part_package.package_id', 'package')
              ->innerJoin('package.package_group_id', 'package_group')

              ->where('part.slug = :partSlug')
              ->andWhere('package.is_published = 1')
              ->andWhere('part_package.is_published = 1')

              ->orderBy('package_group.default_position', 'ASC')
              ->addOrderBy('part_package.position', 'ASC')

              ->setParameter('partSlug', $partSlug)
              ->getQuery();

        return $q;
	}
}

?>
