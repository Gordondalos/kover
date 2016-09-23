<?php

namespace ProductPropertiesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProductPropertiesBundle:Default:index.html.twig');
    }
}
