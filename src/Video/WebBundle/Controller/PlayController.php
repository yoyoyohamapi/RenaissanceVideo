<?php
namespace Video\WebBundle\Controller;
use Video\WebBundle\Controller\BaseController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayController extends BaseController
{
    public function indexAction()
    {
        return $this->render('VideoWebBundle:Play:index.html.twig', array(
                // ...
            ));    }

    public function showAction($video_id)
    {
        return $this->render('VideoWebBundle:Play:show.html.twig', array(
                // ...
            ));    }

}
