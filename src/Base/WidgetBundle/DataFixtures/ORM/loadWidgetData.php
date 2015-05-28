<?php

namespace Base\WidgetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\WidgetBundle\Entity\Widget;

class LoadWidgetData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Widget 1
        $widget1 = new Widget();
        $widget1->setTitle( "Slides" );
        $widget1->setVersion( "0.0.1" );
        $widget1->setDescription( "Gestion des slides" );
        $widget1->setCreationUserId( $this->getReference('user1') );
        $widget1->setModificationUserId( $this->getReference('user1') );


        // Widget 2
        $widget2 = new Widget();
        $widget2->setTitle( "Actualités" );
        $widget2->setVersion( "0.0.1" );
        $widget2->setDescription( "Gestion des actualités" );
        $widget2->setCreationUserId( $this->getReference('user1') );
        $widget2->setModificationUserId( $this->getReference('user1') );
        $widget2->setPartPackageId( $this->getReference('partPackage-news') );

        // Widget 3
        $widget3 = new Widget();
        $widget3->setTitle( "Connexion" );
        $widget3->setVersion( "0.0.1" );
        $widget3->setDescription( "Widget permettant de gérer les connexions utilisateurs" );
        $widget3->setCreationUserId( $this->getReference('user1') );
        $widget3->setModificationUserId( $this->getReference('user1') );

        // Widget 4
        $widget4 = new Widget();
        $widget4->setTitle( "Menu" );
        $widget4->setVersion( "0.0.1" );
        $widget4->setDescription( "Widget permettant de gérer le menu du site" );
        $widget4->setCreationUserId( $this->getReference('user1') );
        $widget4->setModificationUserId( $this->getReference('user1') );
        $widget4->setPartPackageId( $this->getReference('partPackage-menu') );

        // Widget 5
        $widget5 = new Widget();
        $widget5->setTitle( "Pied de page" );
        $widget5->setVersion( "0.0.1" );
        $widget5->setDescription( "Widget permettant de gérer le pied de page du site" );
        $widget5->setCreationUserId( $this->getReference('user1') );
        $widget5->setModificationUserId( $this->getReference('user1') );
        $widget5->setPartPackageId( $this->getReference('partPackage-footer') );

        $manager->persist($widget1);
        $manager->persist($widget2);
        $manager->persist($widget3);
        $manager->persist($widget4);
        $manager->persist($widget5);

        $manager->flush();

        $this->addReference('widget1', $widget1);
        $this->addReference('widget2', $widget2);
        $this->addReference('widget3', $widget3);
        $this->addReference('widget4', $widget4);
        $this->addReference('widget5', $widget5);
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 8;
    }
}

?>