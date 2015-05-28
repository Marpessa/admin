<?php

namespace Core\PartBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PartRepository extends EntityRepository
{
	public function findByDomain( $domain ) {
		$q = $this->createQueryBuilder('p')
                  ->select('p.title, p.slug')
                  ->addSelect('d.id AS d_id')

                  ->innerJoin('p.domain_id', 'd')

                  ->where('p.is_published = 1')
                  ->andWhere('d.url = :domain')

                  ->orderBy('p.title', 'ASC')

                  ->setParameter('domain', $domain)

                  ->getQuery();

        return $q;
	}

  public function findBySlug( $slug ) {
    $q = $this->createQueryBuilder('p')
                  ->select('p.title, p.slug')

                  ->where('p.is_published = 1')
                  ->andWhere('p.slug = :slug')

                  ->orderBy('p.title', 'ASC')

                  ->setParameter('slug', $slug)

                  ->getQuery();

        return $q;
  }
}

?>