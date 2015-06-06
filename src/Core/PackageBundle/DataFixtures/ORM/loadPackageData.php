<?php

namespace Core\PackageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Core\PackageBundle\Entity\Package;

class LoadPackageData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Package 1
        $package1 = new Package();
        $package1->setTitle( 'Articles' );
        $package1->setDescription( 'Permet de gérer le contenu des articles du site' );
        $package1->setEntityName( 'Article' );
        $package1->setVersion( '0.0.1' );
        $package1->setIsPublished( 1 );
        $package1->setCreationUserId( $this->getReference('user1') );
        $package1->setModificationUserId( $this->getReference('user1') );
        $package1->setPackageGroupId( $this->getReference('packageGroup1') );

        // Package 2
        $package2 = new Package();
        $package2->setTitle( 'Librairie de fichiers' );
        $package2->setDescription( 'Permet de gérer les différentes médias' );
        $package2->setEntityName( 'Media' );
        $package2->setVersion( '0.0.1' );
        $package2->setIsPublished( 1 );
        $package2->setCreationUserId( $this->getReference('user1') );
        $package2->setModificationUserId( $this->getReference('user1') );
        $package2->setPackageGroupId( $this->getReference('packageGroup2') );

        // Package 3
        $package3 = new Package();
        $package3->setTitle( 'Evénéments' );
        $package3->setDescription( 'Permet de gérer les événements du site' );
        $package3->setEntityName( 'Event' );
        $package3->setVersion( '0.0.1' );
        $package3->setIsPublished( 1 );
        $package3->setCreationUserId( $this->getReference('user1') );
        $package3->setModificationUserId( $this->getReference('user1') );
        $package3->setPackageGroupId( $this->getReference('packageGroup1') );

        // Package 4
        $package4 = new Package();
        $package4->setTitle( 'Template' );
        $package4->setDescription( 'Permet de gérer le template du site' );
        $package4->setEntityName( 'Template' );
        $package4->setVersion( '0.0.1' );
        $package4->setIsPublished( 1 );
        $package4->setCreationUserId( $this->getReference('user1') );
        $package4->setModificationUserId( $this->getReference('user1') );
        $package4->setPackageGroupId( $this->getReference('packageGroup3') );

        // Package 5
        $package5 = new Package();
        $package5->setTitle( 'Widgets' );
        $package5->setDescription( 'Permet de gérer les widgets du site' );
        $package5->setEntityName( 'Widget' );
        $package5->setVersion( '0.0.1' );
        $package5->setIsPublished( 1 );
        $package5->setCreationUserId( $this->getReference('user1') );
        $package5->setModificationUserId( $this->getReference('user1') );
        $package5->setPackageGroupId( $this->getReference('packageGroup8') );

        // Package 6
        $package6 = new Package();
        $package6->setTitle( 'SEO' );
        $package6->setDescription( 'Permet de gérer le contenu SEO de votre site' );
        $package6->setEntityName( 'Seo' );
        $package6->setVersion( '0.0.1' );
        $package6->setIsPublished( 1 );
        $package6->setCreationUserId( $this->getReference('user1') );
        $package6->setModificationUserId( $this->getReference('user1') );
        $package6->setPackageGroupId( $this->getReference('packageGroup4') );

        // Package 7
        $package7 = new Package();
        $package7->setTitle( 'Catégories' );
        $package7->setDescription( 'Permet de gérer les catégories de votre site' );
        $package7->setEntityName( 'Category' );
        $package7->setVersion( '0.0.1' );
        $package7->setIsPublished( 1 );
        $package7->setCreationUserId( $this->getReference('user1') );
        $package7->setModificationUserId( $this->getReference('user1') );
        $package7->setPackageGroupId( $this->getReference('packageGroup1') );

        // Package 8
        $package8 = new Package();
        $package8->setTitle( 'Groupes' );
        $package8->setDescription( 'Permet de gérer les groupes d\'utilisateurs de votre site' );
        $package8->setEntityName( 'Group' );
        $package8->setVersion( '0.0.1' );
        $package8->setIsPublished( 1 );
        $package8->setCreationUserId( $this->getReference('user1') );
        $package8->setModificationUserId( $this->getReference('user1') );
        $package8->setPackageGroupId( $this->getReference('packageGroup5') );

        // Package 9
        $package9 = new Package();
        $package9->setTitle( 'Utilisateurs' );
        $package9->setDescription( 'Permet de gérer les utilisateurs de votre site' );
        $package9->setEntityName( 'User' );
        $package9->setVersion( '0.0.1' );
        $package9->setIsPublished( 1 );
        $package9->setCreationUserId( $this->getReference('user1') );
        $package9->setModificationUserId( $this->getReference('user1') );
        $package9->setPackageGroupId( $this->getReference('packageGroup5') );

        // Package 10
        $package10 = new Package();
        $package10->setTitle( 'Blocs' );
        $package10->setDescription( 'Aide sur les blocs' );
        $package10->setEntityName( '#' );
        $package10->setVersion( '0.0.1' );
        $package10->setIsPublished( 1 );
        $package10->setCreationUserId( $this->getReference('user1') );
        $package10->setModificationUserId( $this->getReference('user1') );
        $package10->setPackageGroupId( $this->getReference('packageGroup7') );

        // Package 11
        $package11 = new Package();
        $package11->setTitle( 'Version du backend déployée' );
        $package11->setDescription( 'Rapport sur le backend' );
        $package11->setEntityName( '#' );
        $package11->setVersion( '0.0.1' );
        $package11->setIsPublished( 1 );
        $package11->setCreationUserId( $this->getReference('user1') );
        $package11->setModificationUserId( $this->getReference('user1') );
        $package11->setPackageGroupId( $this->getReference('packageGroup6') );

        // Package 12
        $package12 = new Package();
        $package12->setTitle( 'Editeur WISIWYG' );
        $package12->setDescription( 'Aide sur l\'éditeur de contenu' );
        $package12->setEntityName( '#' );
        $package12->setVersion( '0.0.1' );
        $package12->setIsPublished( 1 );
        $package12->setCreationUserId( $this->getReference('user1') );
        $package12->setModificationUserId( $this->getReference('user1') );
        $package12->setPackageGroupId( $this->getReference('packageGroup7') );

        // Package 13
        $package13 = new Package();
        $package13->setTitle( 'Tile' );
        $package13->setDescription( 'Gestion des tuiles' );
        $package13->setEntityName( '#' );
        $package13->setVersion( '0.0.1' );
        $package13->setIsPublished( 1 );
        $package13->setCreationUserId( $this->getReference('user1') );
        $package13->setModificationUserId( $this->getReference('user1') );
        $package13->setPackageGroupId( $this->getReference('packageGroup9') );

        // Package 14
        $package14 = new Package();
        $package14->setTitle( 'Layer' );
        $package14->setDescription( 'Gestion des couches' );
        $package14->setEntityName( '#' );
        $package14->setVersion( '0.0.1' );
        $package14->setIsPublished( 1 );
        $package14->setCreationUserId( $this->getReference('user1') );
        $package14->setModificationUserId( $this->getReference('user1') );
        $package14->setPackageGroupId( $this->getReference('packageGroup9') );

        // Package 15
        $package15 = new Package();
        $package15->setTitle( 'Map' );
        $package15->setDescription( 'Gestion de la carte' );
        $package15->setEntityName( '#' );
        $package15->setVersion( '0.0.1' );
        $package15->setIsPublished( 1 );
        $package15->setCreationUserId( $this->getReference('user1') );
        $package15->setModificationUserId( $this->getReference('user1') );
        $package15->setPackageGroupId( $this->getReference('packageGroup9') );

        // Package 16
        $package16 = new Package();
        $package16->setTitle( 'Domaines' );
        $package16->setDescription( 'Gestion des domaines' );
        $package16->setEntityName( 'Domain' );
        $package16->setVersion( '0.0.1' );
        $package16->setIsPublished( 1 );
        $package16->setCreationUserId( $this->getReference('user1') );
        $package16->setModificationUserId( $this->getReference('user1') );
        $package16->setPackageGroupId( $this->getReference('packageGroup10') );

        // Package 17
        $package17 = new Package();
        $package17->setTitle( 'Sites' );
        $package17->setDescription( 'Gestion des sites' );
        $package17->setEntityName( 'Part' );
        $package17->setVersion( '0.0.1' );
        $package17->setIsPublished( 1 );
        $package17->setCreationUserId( $this->getReference('user1') );
        $package17->setModificationUserId( $this->getReference('user1') );
        $package17->setPackageGroupId( $this->getReference('packageGroup10') );

        // Package 18
        $package18 = new Package();
        $package18->setTitle( 'Gestion des groupes de paquets' );
        $package18->setDescription( 'Gestion des groupes des paquets' );
        $package18->setEntityName( 'PackageGroup' );
        $package18->setVersion( '0.0.1' );
        $package18->setIsPublished( 1 );
        $package18->setCreationUserId( $this->getReference('user1') );
        $package18->setModificationUserId( $this->getReference('user1') );
        $package18->setPackageGroupId( $this->getReference('packageGroup10') );

        // Package 19
        $package19 = new Package();
        $package19->setTitle( 'Gestion des paquets' );
        $package19->setDescription( 'Gestion des paquets' );
        $package19->setEntityName( 'Package' );
        $package19->setVersion( '0.0.1' );
        $package19->setIsPublished( 1 );
        $package19->setCreationUserId( $this->getReference('user1') );
        $package19->setModificationUserId( $this->getReference('user1') );
        $package19->setPackageGroupId( $this->getReference('packageGroup10') );

        // Package 20
        $package20 = new Package();
        $package20->setTitle( 'Groupes utilisateurs' );
        $package20->setDescription( 'Gestion des groupes d\utilisateurs' );
        $package20->setEntityName( 'UserGroup' );
        $package20->setVersion( '0.0.1' );
        $package20->setIsPublished( 1 );
        $package20->setCreationUserId( $this->getReference('user1') );
        $package20->setModificationUserId( $this->getReference('user1') );
        $package20->setPackageGroupId( $this->getReference('packageGroup11') );

        // Package 22
        $package22 = new Package();
        $package22->setTitle( 'Galerie' );
        $package22->setDescription( 'Gestion de la galerie' );
        $package22->setEntityName( 'Gallery' );
        $package22->setVersion( '0.0.1' );
        $package22->setIsPublished( 1 );
        $package22->setCreationUserId( $this->getReference('user1') );
        $package22->setModificationUserId( $this->getReference('user1') );
        $package22->setPackageGroupId( $this->getReference('packageGroup2') );

        $manager->persist($package1);
        $manager->persist($package2);
        $manager->persist($package3);
        $manager->persist($package4);
        $manager->persist($package5);
        $manager->persist($package6);
        $manager->persist($package7);
        $manager->persist($package8);
        $manager->persist($package9);
        $manager->persist($package10);
        $manager->persist($package11);
        $manager->persist($package12);
        $manager->persist($package13);
        $manager->persist($package14);
        $manager->persist($package15);
        $manager->persist($package16);
        $manager->persist($package17);
        $manager->persist($package18);
        $manager->persist($package19);
        $manager->persist($package20);
        $manager->persist($package22);

        $manager->flush();

        $this->addReference('package1', $package1);
        $this->addReference('package2', $package2);
        $this->addReference('package3', $package3);
        $this->addReference('package4', $package4);
        $this->addReference('package5', $package5);
        $this->addReference('package6', $package6);
        $this->addReference('package7', $package7);
        $this->addReference('package8', $package8);
        $this->addReference('package9', $package9);
        $this->addReference('package10', $package10);
        $this->addReference('package11', $package11);
        $this->addReference('package12', $package12);
        $this->addReference('package13', $package13);
        $this->addReference('package14', $package14);
        $this->addReference('package15', $package15);
        $this->addReference('package16', $package16);
        $this->addReference('package17', $package17);
        $this->addReference('package18', $package18);
        $this->addReference('package19', $package19);
        $this->addReference('package20', $package20);
        $this->addReference('package22', $package22);
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 5;
    }
}

?>