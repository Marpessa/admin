<?php

namespace Core\PartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function displayPartAction($part_slug)
    {
        $session = $this->getRequest()->getSession();
        $session->set('current_part_slug', $part_slug);

        return $this->redirect(
		    $this->generateUrl("sonata_admin_dashboard")
		);
    }
}

?>