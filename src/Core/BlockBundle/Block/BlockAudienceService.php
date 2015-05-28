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

class BlockAudienceService extends BaseBlockService
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
        return 'Audience';
    }

	public function getDefaultSettings()
    {
        return array();
    }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
    }

    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
    	$settings = $blockContext->getSettings();
    	
        return $this->renderResponse('CoreBlockBundle:Block:block_core_audience.html.twig', array(
            'block'     => $blockContext->getBlock(),
            'settings'  => $settings
            ), $response);
    }
}