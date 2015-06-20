<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Extensions
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),

            // Front
            new App\HomeFrontendBundle\AppHomeFrontendBundle(),

            // Admin
            new JavierEguiluz\Bundle\EasyAdminBundle\EasyAdminBundle(),
            new App\AdminBundle\AppAdminBundle(),

            // User
            new FOS\UserBundle\FOSUserBundle(),

            // Core
            new Core\UserBundle\CoreUserBundle(),
            new Core\DomainBundle\CoreDomainBundle(),
            new Core\PartBundle\CorePartBundle(),
            new Core\PackageBundle\CorePackageBundle(),
            //new Core\BlockBundle\CoreBlockBundle(),

            // Base
            new Base\TemplateBundle\BaseTemplateBundle(),
            new Base\WidgetBundle\BaseWidgetBundle(),
            new Base\CategoryBundle\BaseCategoryBundle(),
            new Base\ArticleBundle\BaseArticleBundle(),

            // Emailing
            new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            // DataFixtures
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
