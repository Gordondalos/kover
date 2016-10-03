<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class DefaultController extends Controller
{

	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 */
	public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }
}
