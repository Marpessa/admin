<?php

namespace Base\ArticleBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Base\ArticleBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Article 1
        $article1 = new Article();
        $article1->setTitle( "Lorem ipsum dolor sit amet" );
        $article1->setVersion( "0.0.1" );
        $article1->setContent( "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla odio diam, venenatis at ligula non, accumsan laoreet massa. Curabitur aliquet est nec ultrices convallis. Praesent sagittis, turpis quis tempor varius, risus metus pellentesque urna, in venenatis" );
        $article1->setCreationUserId( $this->getReference('user1') );
        $article1->setModificationUserId( $this->getReference('user1') );
        $article1->setPartPackageId( $this->getReference('partPackage-news') );

        // Article 2
        $article2 = new Article();
        $article2->setTitle( "Lorem ipsum dolor sit amet" );
        $article2->setVersion( "0.0.1" );
        $article2->setContent( "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla odio diam, venenatis at ligula non, accumsan laoreet massa. Curabitur aliquet est nec ultrices convallis. Praesent sagittis, turpis quis tempor varius, risus metus pellentesque urna, in venenatis" );
        $article2->setCreationUserId( $this->getReference('user1') );
        $article2->setModificationUserId( $this->getReference('user1') );
        $article2->setPartPackageId( $this->getReference('partPackage-news') );

        $manager->persist($article1);
        $manager->persist($article2);

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