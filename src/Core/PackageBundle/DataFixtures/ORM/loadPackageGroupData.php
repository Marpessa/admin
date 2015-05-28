<?php

namespace Core\PackageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Core\PackageBundle\Entity\PackageGroup;

class LoadPackageGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // PackageGroup 1
        $packageGroup1 = new PackageGroup();
        $packageGroup1->setTitle( 'Contenu' );
        $packageGroup1->setVersion( '0.0.1' );
        $packageGroup1->setCreationUserId( $this->getReference('user1') );
        $packageGroup1->setModificationUserId( $this->getReference('user1') );
        $packageGroup1->setIcon('fa-edit');
        $packageGroup1->setDefaultPosition(3);

        // PackageGroup 2
        $packageGroup2 = new PackageGroup();
        $packageGroup2->setTitle( 'Fichiers' );
        $packageGroup2->setVersion( '0.0.1' );
        $packageGroup2->setCreationUserId( $this->getReference('user1') );
        $packageGroup2->setModificationUserId( $this->getReference('user1') );
        $packageGroup2->setIcon('fa-files-o');
        $packageGroup2->setDefaultPosition(4);

        // PackageGroup 3
        $packageGroup3 = new PackageGroup();
        $packageGroup3->setTitle( 'Apparence' );
        $packageGroup3->setVersion( '0.0.1' );
        $packageGroup3->setCreationUserId( $this->getReference('user1') );
        $packageGroup3->setModificationUserId( $this->getReference('user1') );
        $packageGroup3->setIcon('fa-wrench');
        $packageGroup3->setDefaultPosition(1);

        // PackageGroup 4
        $packageGroup4 = new PackageGroup();
        $packageGroup4->setTitle( 'Configuration' );
        $packageGroup4->setVersion( '0.0.1' );
        $packageGroup4->setCreationUserId( $this->getReference('user1') );
        $packageGroup4->setModificationUserId( $this->getReference('user1') );
        $packageGroup4->setIcon('fa-cogs');
        $packageGroup4->setDefaultPosition(6);

        // PackageGroup 5
        $packageGroup5 = new PackageGroup();
        $packageGroup5->setTitle( 'Personnes' );
        $packageGroup5->setVersion( '0.0.1' );
        $packageGroup5->setCreationUserId( $this->getReference('user1') );
        $packageGroup5->setModificationUserId( $this->getReference('user1') );
        $packageGroup5->setIcon('fa-group');
        $packageGroup5->setDefaultPosition(5);

        // PackageGroup 6
        $packageGroup6 = new PackageGroup();
        $packageGroup6->setTitle( 'Rapport' );
        $packageGroup6->setVersion( '0.0.1' );
        $packageGroup6->setCreationUserId( $this->getReference('user1') );
        $packageGroup6->setModificationUserId( $this->getReference('user1') );
        $packageGroup6->setIcon('fa-bar-chart-o');
        $packageGroup6->setDefaultPosition(7);

        // PackageGroup 7
        $packageGroup7 = new PackageGroup();
        $packageGroup7->setTitle( 'Aide' );
        $packageGroup7->setVersion( '0.0.1' );
        $packageGroup7->setCreationUserId( $this->getReference('user1') );
        $packageGroup7->setModificationUserId( $this->getReference('user1') );
        $packageGroup7->setIcon('fa-question-circle');
        $packageGroup7->setDefaultPosition(8);

        // PackageGroup 8
        $packageGroup8 = new PackageGroup();
        $packageGroup8->setTitle( 'Structure' );
        $packageGroup8->setVersion( '0.0.1' );
        $packageGroup8->setCreationUserId( $this->getReference('user1') );
        $packageGroup8->setModificationUserId( $this->getReference('user1') );
        $packageGroup8->setIcon('fa-sitemap');
        $packageGroup8->setDefaultPosition(2);

        // PackageGroup 9
        $packageGroup9 = new PackageGroup();
        $packageGroup9->setTitle( 'Carte' );
        $packageGroup9->setVersion( '0.0.1' );
        $packageGroup9->setCreationUserId( $this->getReference('user1') );
        $packageGroup9->setModificationUserId( $this->getReference('user1') );
        $packageGroup9->setIcon('fa-picture-o');
        $packageGroup9->setDefaultPosition(9);

        // PackageGroup 10
        $packageGroup10 = new PackageGroup();
        $packageGroup10->setTitle( 'Plateforme' );
        $packageGroup10->setVersion( '0.0.1' );
        $packageGroup10->setCreationUserId( $this->getReference('user1') );
        $packageGroup10->setModificationUserId( $this->getReference('user1') );
        $packageGroup10->setIcon('fa-tasks');
        $packageGroup10->setDefaultPosition(10);

        // PackageGroup 11
        $packageGroup11 = new PackageGroup();
        $packageGroup11->setTitle( 'Utilisateurs' );
        $packageGroup11->setVersion( '0.0.1' );
        $packageGroup11->setCreationUserId( $this->getReference('user1') );
        $packageGroup11->setModificationUserId( $this->getReference('user1') );
        $packageGroup11->setIcon('fa-user');
        $packageGroup11->setDefaultPosition(11);

        $manager->persist($packageGroup1);
        $manager->persist($packageGroup2);
        $manager->persist($packageGroup3);
        $manager->persist($packageGroup4);
        $manager->persist($packageGroup5);
        $manager->persist($packageGroup6);
        $manager->persist($packageGroup7);
        $manager->persist($packageGroup8);
        $manager->persist($packageGroup9);
        $manager->persist($packageGroup10);
        $manager->persist($packageGroup11);

        $manager->flush();

        $this->addReference('packageGroup1', $packageGroup1);
        $this->addReference('packageGroup2', $packageGroup2);
        $this->addReference('packageGroup3', $packageGroup3);
        $this->addReference('packageGroup4', $packageGroup4);
        $this->addReference('packageGroup5', $packageGroup5);
        $this->addReference('packageGroup6', $packageGroup6);
        $this->addReference('packageGroup7', $packageGroup7);
        $this->addReference('packageGroup8', $packageGroup8);
        $this->addReference('packageGroup9', $packageGroup9);
        $this->addReference('packageGroup10', $packageGroup10);
        $this->addReference('packageGroup11', $packageGroup11);
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 4;
    }
}

?>