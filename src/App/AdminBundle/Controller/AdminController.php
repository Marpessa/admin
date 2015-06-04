<?php

// src/AppBundle/Controller/AdminController.php
namespace App\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
	/**
     * @Route("/", name="admin")
     */
    public function indexAction(Request $request)
    {
        // if the URL doesn't include the entity name, this is the index page
        if (null === $request->query->get('entity')) {
            // define this route in any of your own controllers
            return $this->redirectToRoute('admin_dashboard');
        }

        // don't forget to add this line to serve the regular backend pages
        return parent::indexAction($request);
    }

    public function dashboardAction(Request $request)
    {
    	return $this->render('AppAdminBundle:Backend:dashboard.html.twig', array());
    }

    public function menuAction(Request $request)
    {
        $domain = $_SERVER["SERVER_NAME"];

        $part_list = $this->getDoctrine()
                          ->getRepository('CorePartBundle:Part')
                          ->findByDomain( $_SERVER["SERVER_NAME"] )
                          ->getArrayResult();


        $current_part_slug = NULL;

        $session = $this->get('session');

        if( !empty( $settings["part_slug"] ) ) {
          $current_part_slug = $settings["part_slug"];
        } elseif( !empty( $part_list[0]['slug'] ) ) {
          $current_part_slug = $part_list[0]['slug'];
        }
        $session->set( 'current_part_slug', $current_part_slug) ;

        /*if( !empty( $current_part_slug ) ) {
            // Get Current Part
            $current_part = $this->em->getRepository('CorePartBundle:Part')
                           ->findBySlug( $current_part_slug )
                           ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

            if( empty( $current_part ) ) {
                $session->set('current_part_slug', NULL);
                throw new NotFoundHttpException("Part not found");
            }

            $current_part = $current_part[0];

            return $this->render( 'AppAdminBundle:Backend:menu.html.twig', array( 'part_list' => $part_list,
                                                                                  'current_part' => $current_part ) );
        } else {
          throw new NotFoundHttpException("Part not found - Please contact administrator");
        }*/
    }
}