<?php

namespace Base\TemplateBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\TemplateBundle\Entity\Template;

class updateTemplateData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Template 1
        $template1 = $this->getReference('template1');
        $template1->setPartPackageId( $this->getReference('partPackage-template1') );

        // Template 2
        $template2 = $this->getReference('template2');
        $template2->setPartPackageId( $this->getReference('partPackage-template1') );

        // Template 3
        $template3 = $this->getReference('template3');
        $template3->setPartPackageId( $this->getReference('partPackage-template1') );

        $manager->persist($template1);
        $manager->persist($template2);
        $manager->persist($template3);

        $manager->flush();
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