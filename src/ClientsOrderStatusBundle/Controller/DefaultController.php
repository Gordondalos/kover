<?php

namespace ClientsOrderStatusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClientsOrderStatusBundle:Default:index.html.twig');
    }
}
