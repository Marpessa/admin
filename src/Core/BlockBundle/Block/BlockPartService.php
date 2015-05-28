<?php

namespace Core\BlockBundle\Block;

use Sonata\BlockBundle\Block\BaseBlockService;

use Sonata\AdminBundle\Form\FormMapper;
 
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\AdminBundle\Validator\ErrorElement;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class BlockPartService extends BaseBlockService
{
   protected $name;
   protected $templating;
   protected $em;
   protected $session;
   
   /**
     * @param string          $name
     * @param EngineInterface $templating
     */
   public function __construct($name, EngineInterface $templating, \Doctrine\ORM\EntityManager $em, Session $session, Container $container)
   {
        $this->em         = $em;
        $this->name       = $name;
        $this->templating = $templating;
        $this->session    = $session;
        $this->container    = $container;
   }

	/**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Part';
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'part_slug' => false,
            'template'  => 'CoreBlockBundle:Block:block_core_part.html.twig',
        ));
    }

	  // public function getDefaultSettings()
   //  {
   //      return array();
   //  }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
    }

    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        $settings = $blockContext->getSettings();

        // Get Part List
        $part_list = $this->em->getRepository('CorePartBundle:Part')
                              ->findByDomain( $_SERVER["SERVER_NAME"] )
                              ->getArrayResult();

        $current_part_slug = NULL;
        $session = $this->session;

        if( !empty( $settings["part_slug"] ) )
        {
          $current_part_slug = $settings["part_slug"];
        }
        elseif( !empty( $part_list[0]['slug'] ) )
        {
          $current_part_slug = $part_list[0]['slug'];
        }
        $session->set('current_part_slug', $current_part_slug);

        if( !empty( $current_part_slug ) ) {
          // Get Current Part
          $current_part = $this->em->getRepository('CorePartBundle:Part')
                           ->findBySlug( $current_part_slug )
                           ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

          if( empty( $current_part ) ) {
            $session->set('current_part_slug', NULL);
            throw new NotFoundHttpException("Part not found");
          }

          $current_part = $current_part[0];

          $part_admin_slug = $this->container->getParameter('part.admin.slug');

          return $this->renderResponse( $settings['template'], array(
              'part_admin_slug'    => $part_admin_slug,
              'part_list'          => $part_list,
              'current_part'       => $current_part,
              'block'              => $blockContext->getBlock(),
              'settings'           => $settings
              ), $response);

        } else {
          throw new NotFoundHttpException("Part not found - Please contact administrator");
        }
    }
}