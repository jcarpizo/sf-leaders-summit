<?php

namespace Globe\LeadersSummitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LSBundle:Default:index.html.twig');
    }
}
