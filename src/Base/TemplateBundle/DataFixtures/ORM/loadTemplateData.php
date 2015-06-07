<?php

namespace Base\TemplateBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\TemplateBundle\Entity\Template;

class LoadTemplateData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
         // Template 1
        $template1 = new Template();
        $template1->setTitle( "Jessica White" );
        $template1->setVersion( "0.0.1" );
        $template1->setDescription( "Template responsive gratuit" );
        $template1->setCreationUserId( $this->getReference('user1') );
        $template1->setModificationUserId( $this->getReference('user1') );
        $template1->setPartPackageId( $this->getReference('partPackage-template1') );

        // Template 2
        $template2 = new Template();
        $template2->setTitle( "Unify" );
        $template2->setVersion( "0.0.1" );
        $template2->setDescription( "Template responsive payant" );
        $template2->setCreationUserId( $this->getReference('user1') );
        $template2->setModificationUserId( $this->getReference('user1') );
        $template2->setPartPackageId( $this->getReference('partPackage-template1') );

        // Template 3
        $template3 = new Template();
        $template3->setTitle( "Template personnalisé" );
        $template3->setVersion( "0.0.1" );
        $template3->setDescription( "Demandez un template sur mesure" );
        $template3->setCreationUserId( $this->getReference('user1') );
        $template3->setModificationUserId( $this->getReference('user1') );
        $template3->setPartPackageId( $this->getReference('partPackage-template1') );

        $manager->persist($template1);
        $manager->persist($template2);
        $manager->persist($template3);

        $manager->flush();

        $this->addReference('template1', $template1);
        $this->addReference('template2', $template2);
        $this->addReference('template3', $template3);
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