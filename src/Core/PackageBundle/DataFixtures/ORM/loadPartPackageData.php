<?php

namespace Core\PackageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Core\PackageBundle\Entity\PartPackage;

class LoadPartPackageData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // PartPackage in all part
        for($i=0; $i<5;$i++) {

            if( in_array( $i, array(1, 2, 3, 4) ) ) {
                $partPackage1[$i] = new PartPackage();
                $partPackage1[$i]->setTitle( 'Actualités' );
                $partPackage1[$i]->setDescription( 'Gestion des actualités' );
                $partPackage1[$i]->setVersion( '0.0.1' );
                $partPackage1[$i]->setIsPublished( 1 );
                $partPackage1[$i]->setPosition( 3 );
                $partPackage1[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage1[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage1[$i]->setPackageId( $this->getReference('package1') );
                $partPackage1[$i]->setPartId( $this->getReference( 'part' . $i ) );
            }

            if( in_array( $i, array(1,2) ) ) {
                $partPackage3[$i] = new PartPackage();
                $partPackage3[$i]->setTitle( 'Evénéments' );
                $partPackage3[$i]->setDescription( 'Permet de gérer les événements du site' );
                $partPackage3[$i]->setVersion( '0.0.1' );
                $partPackage3[$i]->setIsPublished( 1 );
                $partPackage3[$i]->setPosition( 4 );
                $partPackage3[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage3[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage3[$i]->setPackageId( $this->getReference('package3') );
                $partPackage3[$i]->setPartId( $this->getReference( 'part' . $i ) );
            }

            if( in_array( $i, array(1, 2, 3, 4) ) ) {
                $partPackage4[$i] = new PartPackage();
                $partPackage4[$i]->setTitle( 'Thème du site' );
                $partPackage4[$i]->setDescription( 'Permet de choisir le thème (template) du site' );
                $partPackage4[$i]->setVersion( '0.0.1' );
                $partPackage4[$i]->setIsPublished( 1 );
                $partPackage4[$i]->setPosition( 1 );
                $partPackage4[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage4[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage4[$i]->setPackageId( $this->getReference('package4') );
                $partPackage4[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage5[$i] = new PartPackage();
                $partPackage5[$i]->setTitle( 'Widgets' );
                $partPackage5[$i]->setDescription( 'Permet d\activer/désactiver les widgets du site' );
                $partPackage5[$i]->setVersion( '0.0.1' );
                $partPackage5[$i]->setIsPublished( 1 );
                $partPackage5[$i]->setPosition( 2 );
                $partPackage5[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage5[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage5[$i]->setPackageId( $this->getReference('package5') );
                $partPackage5[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage6[$i] = new PartPackage();
                $partPackage6[$i]->setTitle( 'Google Analytics' );
                $partPackage6[$i]->setDescription( 'Permet de configurer le code Google Analytics votre site' );
                $partPackage6[$i]->setVersion( '0.0.1' );
                $partPackage6[$i]->setIsPublished( 1 );
                $partPackage6[$i]->setPosition( 7 );
                $partPackage6[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage6[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage6[$i]->setPackageId( $this->getReference('package6') );
                $partPackage6[$i]->setPartId( $this->getReference( 'part' . $i ) );
            }

            if( in_array( $i, array(1,3) ) ) {
                $partPackage7[$i] = new PartPackage();
                $partPackage7[$i]->setTitle( 'Thèmes des actualités' );
                $partPackage7[$i]->setDescription( 'Permet de gérer les catégories de votre site' );
                $partPackage7[$i]->setVersion( '0.0.1' );
                $partPackage7[$i]->setIsPublished( 1 );
                $partPackage7[$i]->setPosition( 6 );
                $partPackage7[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage7[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage7[$i]->setPackageId( $this->getReference('package7') );
                $partPackage7[$i]->setPartId( $this->getReference( 'part' . $i ) );
            }

            if( in_array( $i, array(1, 2, 3, 4) ) ) {
                $partPackage8[$i] = new PartPackage();
                $partPackage8[$i]->setTitle( 'Menu' );
                $partPackage8[$i]->setDescription( 'Permet de gérer le menu de votre site' );
                $partPackage8[$i]->setVersion( '0.0.1' );
                $partPackage8[$i]->setIsPublished( 1 );
                $partPackage8[$i]->setPosition( 7 );
                $partPackage8[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage8[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage8[$i]->setPackageId( $this->getReference('package7') );
                $partPackage8[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage9[$i] = new PartPackage();
                $partPackage9[$i]->setTitle( 'Pied de page' );
                $partPackage9[$i]->setDescription( 'Permet de gérer le pied de page de votre site' );
                $partPackage9[$i]->setVersion( '0.0.1' );
                $partPackage9[$i]->setIsPublished( 1 );
                $partPackage9[$i]->setPosition( 8 );
                $partPackage9[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage9[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage9[$i]->setPackageId( $this->getReference('package7') );
                $partPackage9[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage10[$i] = new PartPackage();
                $partPackage10[$i]->setTitle( 'Widgets' );
                $partPackage10[$i]->setDescription( 'Permet de gérer les widgets de votre site' );
                $partPackage10[$i]->setVersion( '0.0.1' );
                $partPackage10[$i]->setIsPublished( 1 );
                $partPackage10[$i]->setPosition( 9 );
                $partPackage10[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage10[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage10[$i]->setPackageId( $this->getReference('package10') );
                $partPackage10[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage11[$i] = new PartPackage();
                $partPackage11[$i]->setTitle( 'Version du backend déployée' );
                $partPackage11[$i]->setDescription( 'Rapport sur le backend' );
                $partPackage11[$i]->setVersion( '0.0.1' );
                $partPackage11[$i]->setIsPublished( 1 );
                $partPackage11[$i]->setPosition( 10 );
                $partPackage11[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage11[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage11[$i]->setPackageId( $this->getReference('package11') );
                $partPackage11[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage12[$i] = new PartPackage();
                $partPackage12[$i]->setTitle( 'Editeur WISIWYG' );
                $partPackage12[$i]->setDescription( 'Aide sur l\'éditeur de contenu' );
                $partPackage12[$i]->setVersion( '0.0.1' );
                $partPackage12[$i]->setIsPublished( 1 );
                $partPackage12[$i]->setPosition( 11 );
                $partPackage12[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage12[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage12[$i]->setPackageId( $this->getReference('package12') );
                $partPackage12[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage13[$i] = new PartPackage();
                $partPackage13[$i]->setTitle( 'Arborescence' );
                $partPackage13[$i]->setDescription( 'Permet de gérer la structure globale du site' );
                $partPackage13[$i]->setVersion( '0.0.1' );
                $partPackage13[$i]->setIsPublished( 1 );
                $partPackage13[$i]->setPosition( 2 );
                $partPackage13[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage13[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage13[$i]->setPackageId( $this->getReference('package5') );
                $partPackage13[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage14[$i] = new PartPackage();
                $partPackage14[$i]->setTitle( 'SEO' );
                $partPackage14[$i]->setDescription( 'Permet de gérer le contenu SEO de votre site' );
                $partPackage14[$i]->setVersion( '0.0.1' );
                $partPackage14[$i]->setIsPublished( 1 );
                $partPackage14[$i]->setPosition( 14 );
                $partPackage14[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage14[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage14[$i]->setPackageId( $this->getReference('package6') );
                $partPackage14[$i]->setPartId( $this->getReference( 'part' . $i ) );
            }

            if( in_array( $i, array(2) ) ) {
                $partPackage15[$i] = new PartPackage();
                $partPackage15[$i]->setTitle( 'Tile' );
                $partPackage15[$i]->setDescription( 'Permet de gérer les tuiles liées aux différentes couches de la carte' );
                $partPackage15[$i]->setVersion( '0.0.1' );
                $partPackage15[$i]->setIsPublished( 1 );
                $partPackage15[$i]->setPosition( 15 );
                $partPackage15[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage15[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage15[$i]->setPackageId( $this->getReference('package13') );
                $partPackage15[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage16[$i] = new PartPackage();
                $partPackage16[$i]->setTitle( 'Layer' );
                $partPackage16[$i]->setDescription( 'Permet de gérer les couches de la carte' );
                $partPackage16[$i]->setVersion( '0.0.1' );
                $partPackage16[$i]->setIsPublished( 1 );
                $partPackage16[$i]->setPosition( 16 );
                $partPackage16[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage16[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage16[$i]->setPackageId( $this->getReference('package14') );
                $partPackage16[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage17[$i] = new PartPackage();
                $partPackage17[$i]->setTitle( 'Map' );
                $partPackage17[$i]->setDescription( 'Permet de gérer le carte en globalité' );
                $partPackage17[$i]->setVersion( '0.0.1' );
                $partPackage17[$i]->setIsPublished( 1 );
                $partPackage17[$i]->setPosition( 17 );
                $partPackage17[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage17[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage17[$i]->setPackageId( $this->getReference('package15') );
                $partPackage17[$i]->setPartId( $this->getReference( 'part' . $i ) );
            }

            if( in_array( $i, array(0) ) ) {
                $partPackage23[$i] = new PartPackage();
                $partPackage23[$i]->setTitle( 'Domaines' );
                $partPackage23[$i]->setDescription( 'Permet de gérer les domaines de la plateforme' );
                $partPackage23[$i]->setVersion( '0.0.1' );
                $partPackage23[$i]->setIsPublished( 1 );
                $partPackage23[$i]->setPosition( 18 );
                $partPackage23[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage23[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage23[$i]->setPackageId( $this->getReference('package16') );
                $partPackage23[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage18[$i] = new PartPackage();
                $partPackage18[$i]->setTitle( 'Sites' );
                $partPackage18[$i]->setDescription( 'Permet de gérer les sites de la plateforme' );
                $partPackage18[$i]->setVersion( '0.0.1' );
                $partPackage18[$i]->setIsPublished( 1 );
                $partPackage18[$i]->setPosition( 19 );
                $partPackage18[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage18[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage18[$i]->setPackageId( $this->getReference('package17') );
                $partPackage18[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage19[$i] = new PartPackage();
                $partPackage19[$i]->setTitle( 'Groupes des paquets' );
                $partPackage19[$i]->setDescription( 'Permet de gérer les groupes des paquets' );
                $partPackage19[$i]->setVersion( '0.0.1' );
                $partPackage19[$i]->setIsPublished( 1 );
                $partPackage19[$i]->setPosition( 20 );
                $partPackage19[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage19[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage19[$i]->setPackageId( $this->getReference('package18') );
                $partPackage19[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage20[$i] = new PartPackage();
                $partPackage20[$i]->setTitle( 'Gestion des paquets' );
                $partPackage20[$i]->setDescription( 'Permet de gérer les paquets' );
                $partPackage20[$i]->setVersion( '0.0.1' );
                $partPackage20[$i]->setIsPublished( 1 );
                $partPackage20[$i]->setPosition( 21 );
                $partPackage20[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage20[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage20[$i]->setPackageId( $this->getReference('package19') );
                $partPackage20[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage21[$i] = new PartPackage();
                $partPackage21[$i]->setTitle( 'Groupes d\'utilisateurs' );
                $partPackage21[$i]->setDescription( 'Permet de gérer les groupes d\'utilisateurs' );
                $partPackage21[$i]->setVersion( '0.0.1' );
                $partPackage21[$i]->setIsPublished( 1 );
                $partPackage21[$i]->setPosition( 22 );
                $partPackage21[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage21[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage21[$i]->setPackageId( $this->getReference('package20') );
                $partPackage21[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage22[$i] = new PartPackage();
                $partPackage22[$i]->setTitle( 'Utilisateurs' );
                $partPackage22[$i]->setDescription( 'Permet de gérer les utilisateurs' );
                $partPackage22[$i]->setVersion( '0.0.1' );
                $partPackage22[$i]->setIsPublished( 1 );
                $partPackage22[$i]->setPosition( 23 );
                $partPackage22[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage22[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage22[$i]->setPackageId( $this->getReference('package21') );
                $partPackage22[$i]->setPartId( $this->getReference( 'part' . $i ) );
            }

            if( in_array( $i, array(0, 1, 2, 3, 4) ) ) {
                $partPackage23[$i] = new PartPackage();
                $partPackage23[$i]->setTitle( 'Galerie' );
                $partPackage23[$i]->setDescription( 'Permet de gérer les galeries des médias' );
                $partPackage23[$i]->setVersion( '0.0.1' );
                $partPackage23[$i]->setIsPublished( 1 );
                $partPackage23[$i]->setPosition( 24 );
                $partPackage23[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage23[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage23[$i]->setPackageId( $this->getReference('package22') );
                $partPackage23[$i]->setPartId( $this->getReference( 'part' . $i ) );

                $partPackage2[$i] = new PartPackage();
                $partPackage2[$i]->setTitle( 'Librairie de fichiers' );
                $partPackage2[$i]->setDescription( 'Permet de gérer les différentes médias' );
                $partPackage2[$i]->setVersion( '0.0.1' );
                $partPackage2[$i]->setIsPublished( 1 );
                $partPackage2[$i]->setPosition( 25 );
                $partPackage2[$i]->setCreationUserId( $this->getReference('user1') );
                $partPackage2[$i]->setModificationUserId( $this->getReference('user1') );
                $partPackage2[$i]->setPackageId( $this->getReference('package2') );
                $partPackage2[$i]->setPartId( $this->getReference( 'part' . $i ) );
            }

            if( !empty( $partPackage1[$i] ) ) { $manager->persist($partPackage1[$i]); }
            if( !empty( $partPackage2[$i] ) ) { $manager->persist($partPackage2[$i]); }
            if( !empty( $partPackage3[$i] ) ) { $manager->persist($partPackage3[$i]); }
            if( !empty( $partPackage4[$i] ) ) { $manager->persist($partPackage4[$i]); }
            if( !empty( $partPackage5[$i] ) ) { $manager->persist($partPackage5[$i]); }
            if( !empty( $partPackage6[$i] ) ) { $manager->persist($partPackage6[$i]); }
            if( !empty( $partPackage7[$i] ) ) { $manager->persist($partPackage7[$i]); }
            if( !empty( $partPackage8[$i] ) ) { $manager->persist($partPackage8[$i]); }
            if( !empty( $partPackage9[$i] ) ) { $manager->persist($partPackage9[$i]); }
            if( !empty( $partPackage10[$i] ) ) { $manager->persist($partPackage10[$i]); }
            if( !empty( $partPackage11[$i] ) ) { $manager->persist($partPackage11[$i]); }
            if( !empty( $partPackage12[$i] ) ) { $manager->persist($partPackage12[$i]); }
            if( !empty( $partPackage13[$i] ) ) { $manager->persist($partPackage13[$i]); }
            if( !empty( $partPackage14[$i] ) ) { $manager->persist($partPackage14[$i]); }
            if( !empty( $partPackage15[$i] ) ) { $manager->persist($partPackage15[$i]); }
            if( !empty( $partPackage16[$i] ) ) { $manager->persist($partPackage16[$i]); }
            if( !empty( $partPackage17[$i] ) ) { $manager->persist($partPackage17[$i]); }
            if( !empty( $partPackage18[$i] ) ) { $manager->persist($partPackage18[$i]); }
            if( !empty( $partPackage19[$i] ) ) { $manager->persist($partPackage19[$i]); }
            if( !empty( $partPackage20[$i] ) ) { $manager->persist($partPackage20[$i]); }
            if( !empty( $partPackage21[$i] ) ) { $manager->persist($partPackage21[$i]); }
            if( !empty( $partPackage22[$i] ) ) { $manager->persist($partPackage22[$i]); }
            if( !empty( $partPackage23[$i] ) ) { $manager->persist($partPackage23[$i]); }
        }

        $manager->flush();

        $this->addReference('partPackage-news', $partPackage1[1]);
        $this->addReference('partPackage-template1', $partPackage4[1]);
        $this->addReference('partPackage-menu', $partPackage8[1]);
        $this->addReference('partPackage-footer', $partPackage9[1]);
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 7;
    }
}

?>