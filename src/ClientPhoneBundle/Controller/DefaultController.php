<?php

namespace ClientPhoneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClientPhoneBundle:Default:index.html.twig');
    }
}
