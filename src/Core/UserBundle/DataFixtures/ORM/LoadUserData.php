<?php

namespace Application\Sonata\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Core\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // User 1
        $user1 = new User();
        
        $user1->setLastName( 'superadmin' );
        $user1->setFirstName( 'superadmin' );
        $user1->setEmail( 'superadmin@admin.fr' );
        $user1->setUsername( 'superadmin' );
        
        $user1->setPlainPassword( 'admin' );

        $user1->setEnabled( 1 );

        $user1->setRoles(array('ROLE_SUPER_ADMIN'));
       
        $manager->persist($user1);

        // User 2
        $user2 = new User();
        
        $user2->setLastName( 'admin' );
        $user2->setFirstName( 'admin' );
        $user2->setEmail( 'admin@admin.fr' );
        $user2->setUsername( 'admin' );
        
        $user2->setPlainPassword( 'admin' );

        $user2->setEnabled( 1 );

        $user2->setRoles(array('ROLE_ADMIN'));
       
        $manager->persist($user2);

        //$userManager->updateUser($user);
        $manager->flush();

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 1;
    }
}

?>