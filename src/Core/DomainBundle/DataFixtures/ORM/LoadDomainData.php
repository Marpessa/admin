<?php

namespace Core\DomainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Core\DomainBundle\Entity\Domain;

class LoadDomainData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Domain 1
        $domain1 = new Domain();
        $domain1->setUrl( 'admin.cloudwebsport.com' );
        $domain1->setCreationUserId( $this->getReference('user1') );
        $domain1->setModificationUserId( $this->getReference('user1') );

        // Domain 2
        $domain2 = new Domain();
        $domain2->setUrl( 'manu.cloudwebsport.com' );
        $domain2->setCreationUserId( $this->getReference('user1') );
        $domain2->setModificationUserId( $this->getReference('user1') );

        // Domain 3
        $domain3 = new Domain();
        $domain3->setUrl( 'deborah.cloudwebsport.com' );
        $domain3->setCreationUserId( $this->getReference('user1') );
        $domain3->setModificationUserId( $this->getReference('user1') );

        $manager->persist($domain1);
        $manager->persist($domain2);
        $manager->persist($domain3);

        $manager->flush();

        $this->addReference('domain1', $domain1);
        $this->addReference('domain2', $domain2);
        $this->addReference('domain3', $domain3);
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 2;
    }
}

?>