<?php

namespace ProductProducerPriceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProductProducerPriceBundle:Default:index.html.twig');
    }
}
