<?php

namespace Video\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VideoWebBundle:Default:index.html.twig', array('name' => $name));
    }
}
