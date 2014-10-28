<?php

namespace Video\WebBundle\Controller;
use Video\WebBundle\Controller\BaseController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChapterController extends BaseController
{

    public function showAction($course_id)
    {
        $request=$this->getRequest();
        $moduldeRest=$this->get('ModuldeRest');
        $video_id=$request->query->get('video_id');
        $chapters=$moduldeRest->getModulesByCourseId($course_id);
        $data=array(
        	'video_id'=>$video_id,
        	'course_id'=>$course_id,
        	'chapters'=>$chapters,
         );
        return $this->render('VideoCommonBundle:Chapter:show.html.twig', $data);

}
}