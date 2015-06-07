<?php

// src/AppBundle/Controller/AdminController.php
namespace App\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use JavierEguiluz\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    protected $part_package_slug;

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

    protected function initialize(Request $request)
    {
        $this->part_package_slug = $request->query->get('part_package_slug');

        return parent::initialize($request);
    }

    protected function listAction()
    {
        return parent::listAction();
    }

    /**
     * Performs a database query to get all the records related to the given
     * entity. It supports pagination and field sorting.
     *
     * @param string      $entityClass
     * @param int         $page
     * @param int         $maxPerPage
     * @param string|null $sortField
     * @param string|null $sortDirection
     *
     * @return Pagerfanta The paginated query results
     */
    protected function findAll($entityClass, $page = 1, $maxPerPage = 15, $sortField = null, $sortDirection = null)
    {
        // Current Part Slug
        $session = $this->get('session');
        $current_part_slug = $session->get('current_part_slug');

        if( $current_part_slug == "administration" ) {

            return parent::findAll( $entityClass, $page, $maxPerPage, $sortField, $sortDirection );

        } else {

            $query = $this->em->createQueryBuilder()
                          ->select('entity')
                          ->from($entityClass, 'entity')
                          ->innerJoin('entity.partPackageId', 'part_package')
                          ->where('part_package.slug = :partPackageSlug')
                          ->setParameter('partPackageSlug', $this->part_package_slug)
            ;
        }

        if (null !== $sortField) {
            if (empty($sortDirection) || !in_array(strtoupper($sortDirection), array('ASC', 'DESC'))) {
                $sortDirection = 'DESC';
            }

            $query->orderBy('entity.'.$sortField, $sortDirection);
        }

        $paginator = new Pagerfanta(new DoctrineORMAdapter($query, false));
        $paginator->setMaxPerPage($maxPerPage);
        $paginator->setCurrentPage($page);

        return $paginator;
    }

    public function partListAction(Request $request)
    {
        $domain = $_SERVER["SERVER_NAME"];
        $domain = 'admin.cloudwebsport.com'; // TODO

        $part_list = $this->getPartList( $domain );

        // Current Part Slug
        $session = $this->get('session');
        $current_part_slug = $session->get('current_part_slug');

        if( empty( $current_part_slug ) && !empty( $part_list[0]['slug'] ) ) {
            $current_part_slug = $part_list[0]['slug'];
            $session->set('current_part_slug', $current_part_slug);
        }

        return $this->render( 'AppAdminBundle:Backend:part_list.html.twig', array( 'current_part_slug' => $current_part_slug,
                                                                                   'part_list' => $part_list ) );
    }

    public function menuAction(Request $request)
    {
        $current_part = "";

        $session = $this->get('session');
        $current_part_slug = $session->get('current_part_slug');

        if( !empty( $current_part_slug ) ) {

            $part_package_list = NULL;

            $part_package_list = $this->getDoctrine()
                                      ->getRepository('CorePackageBundle:PartPackage')
                                      ->findByPart( $current_part_slug )
                                      ->getArrayResult();

            return $this->render( 'AppAdminBundle:Backend:menu.html.twig', array( 'current_part_package_slug' => $request->query->get('part_package_slug'),
                                                                                  'part_package_list' => $part_package_list ) );
        } else {
          throw new NotFoundHttpException("Part not found - Please contact administrator");
        }
    }

    public function changePartAction(Request $request)
    {
        $current_part_slug = $request->query->get('part_slug');

        $session = $this->get('session');
        $session->set('current_part_slug', $current_part_slug);

        return new RedirectResponse($this->container->get('router')->generate('admin_dashboard'));
    }

    public function dashboardAction(Request $request)
    {
        return $this->render('AppAdminBundle:Backend:dashboard.html.twig', array());
    }

    private function getPartList( $domain )
    {
        if ($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN')) {
            $part_list = $this->getDoctrine()
                              ->getRepository('CorePartBundle:Part')
                              ->findAll()
                              ->getArrayResult();
        } else {
            $part_list = $this->getDoctrine()
                              ->getRepository('CorePartBundle:Part')
                              ->findByDomain( $domain )
                              ->getArrayResult();
        }

        return $part_list;
    }
}