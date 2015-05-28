<?php

namespace Core\BlockBundle\Block;

use Sonata\BlockBundle\Block\BaseBlockService;

use Sonata\AdminBundle\Form\FormMapper;
 
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\AdminBundle\Validator\ErrorElement;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlockPartPackageService extends BaseBlockService
{
   protected $name;
   protected $templating;
   protected $em;
   
   /**
     * @param string          $name
     * @param EngineInterface $templating
     */
   public function __construct($name, EngineInterface $templating, \Doctrine\ORM\EntityManager $em)
   {
        $this->em         = $em;
        $this->name       = $name;
        $this->templating = $templating;
   }

	/**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'PartPackage';
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'part_slug' => false,
            'part_package_slug' => false,
            'template'  => 'CoreBlockBundle:Block:block_core_part_package.html.twig',
        ));
    }

	// public function getDefaultSettings()
 //    {
 //        return array();
 //    }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
    }

    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
    }

    public function execute(BlockContextInterface $blockContext, Response $response = NULL)
    {
      	$settings = $blockContext->getSettings();

        $part_package_list = $this->em->getRepository('CorePackageBundle:PartPackage')
                                      ->findByPart( $settings['part_slug'] )
                                      ->getArrayResult();

        return $this->renderResponse( $settings['template'], array(
            'part_package_list' => $part_package_list,
            'part_package_slug'   => !empty( $settings['part_package_slug'] ) ? $settings['part_package_slug'] : FALSE,
            'block'             => $blockContext->getBlock(),
            'settings'          => $settings
            ), $response);
    }
}