<?php

namespace ClientAdressBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClientAdressBundle:Default:index.html.twig');
    }
}
