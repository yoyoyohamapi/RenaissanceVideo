<?php

namespace Video\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChapterController extends Controller
{
    public function showAction()
    {
        return $this->render('VideoCommonBundle:Chapter:show.html.twig', array(
                // ...
            ));    }

}
