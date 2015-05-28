<?php

namespace Core\PartBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Core\PartBundle\Entity\Part;

class LoadPartData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Part 0
        $part0 = new Part();
        $part0->setTitle( 'Administration' );
        $part0->setDescription( 'Administration de la plateforme' );
        $part0->setIsPublished( 1 );
        $part0->setVersion( '0.0.1' );
        $part0->setCreationUserId( $this->getReference('user1') );
        $part0->setModificationUserId( $this->getReference('user1') );
        // $part0->setDomainId( $this->getReference('domain1') );
        // $part0->setTemplateId( $this->getReference('template1') );

        // Part 1
        $part1 = new Part();
        $part1->setTitle( 'CPF AIZENAY' );
        $part1->setDescription( 'Site de tennis de table d\'Aizenay' );
        $part1->setIsPublished( 1 );
        $part1->setVersion( '1.0.0' );
        $part1->setCreationUserId( $this->getReference('user1') );
        $part1->setModificationUserId( $this->getReference('user1') );
        $part1->setDomainId( $this->getReference('domain1') );
        $part1->setTemplateId( $this->getReference('template1') );

        // Part 2
        $part2 = new Part();
        $part2->setTitle( 'Jeu de rôle (Scool)' );
        $part2->setDescription( 'Jeu en cours de réflexion' );
        $part2->setIsPublished( 1 );
        $part2->setVersion( '0.0.1' );
        $part2->setCreationUserId( $this->getReference('user1') );
        $part2->setModificationUserId( $this->getReference('user1') );
        $part2->setDomainId( $this->getReference('domain1') );
        $part2->setTemplateId( $this->getReference('template1') );

        // Part 3
        $part3 = new Part();
        $part3->setTitle( 'Blog pour fille' );
        $part3->setDescription( 'Blog sous Wordpress' );
        $part3->setIsPublished( 1 );
        $part3->setVersion( '0.0.1' );
        $part3->setCreationUserId( $this->getReference('user1') );
        $part3->setModificationUserId( $this->getReference('user1') );
        $part3->setDomainId( $this->getReference('domain2') );
        $part3->setTemplateId( $this->getReference('template1') );

        // Part 4
        $part4 = new Part();
        $part4->setTitle( 'Votre site ecommerce' );
        $part4->setDescription( 'Site sous Prestashop' );
        $part4->setIsPublished( 1 );
        $part4->setVersion( '0.0.1' );
        $part4->setCreationUserId( $this->getReference('user1') );
        $part4->setModificationUserId( $this->getReference('user1') );
        $part4->setDomainId( $this->getReference('domain1') );
        $part4->setTemplateId( $this->getReference('template1') );

        // Part 5
        $part5 = new Part();
        $part5->setTitle( 'Votre site drupal' );
        $part5->setDescription( 'Site sous Drupal' );
        $part5->setIsPublished( 1 );
        $part5->setVersion( '0.0.1' );
        $part5->setCreationUserId( $this->getReference('user1') );
        $part5->setModificationUserId( $this->getReference('user1') );
        $part5->setDomainId( $this->getReference('domain1') );
        $part5->setTemplateId( $this->getReference('template1') );

        $manager->persist($part0);
        $manager->persist($part1);
        $manager->persist($part2);
        $manager->persist($part3);
        $manager->persist($part4);
        $manager->persist($part5);

        $this->addReference('part0', $part0);
        $this->addReference('part1', $part1);
        $this->addReference('part2', $part2);
        $this->addReference('part3', $part3);
        $this->addReference('part4', $part4);
        $this->addReference('part5', $part5);

        $manager->flush();
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 3;
    }
}

?>