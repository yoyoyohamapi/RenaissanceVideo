<?php

namespace Video\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Video\WebBundle\Controller\BaseController;
class CourseController extends BaseController
{
    public function showAction()
    {
    	$request=$this->getRequest();
    	$courseREST=$this->get('courseREST');
    	$courses=$courseREST->getAllCourses();
    	$video_id=$request->query->get('video_id');
    	$data=array(
    		'courses'=>$courses,
    		'video_id'=>$video_id,
    		);
        return $this->render('VideoCommonBundle:Course:show.html.twig',$data);
}
}
