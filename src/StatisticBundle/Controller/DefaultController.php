<?php

namespace StatisticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StatisticBundle:Default:index.html.twig');
    }
}
