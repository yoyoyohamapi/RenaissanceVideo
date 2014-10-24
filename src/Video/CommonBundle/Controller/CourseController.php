<?php

namespace Video\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CourseController extends Controller
{
    public function showAction()
    {
        return $this->render('VideoCommonBundle:Course:show.html.twig', array(
                // ...
            ));    }

}
