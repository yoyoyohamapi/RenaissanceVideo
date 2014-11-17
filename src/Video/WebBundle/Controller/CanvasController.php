<?php
namespace Video\WebBundle\Controller;
use Video\WebBundle\Controller\BaseController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CanvasController extends BaseController
{
    public function choiceAction(){
        $form=$this->createFormBuilder();
        $courseREST=$this->get('courseREST');
        $courses=$courseREST->getAllCourses();
        $data=array(
            'courses'=>$courses,
        );
        return $this->render('VideoWebBundle:Canvas:choice.html.twig',$data);
    }
    public function findChaptersAction(){
        $request=$this->getRequest();
        $course_id=$request->query->get('course_id');
        if(!$course_id)
            $chapters = null;
        else{
            $moduldeRest=$this->get('moduleRest');
            $chapters=$moduldeRest->getModulesByCourseId($course_id);
        }
        $data = array(
            'chapters'=>$chapters
        );
        return $this->render('VideoWebBundle:Canvas:moduleList.html.twig',$data);
    }
    public function addExUrlAction()
    {
        $json_data = null;
        $json_status = 0;
        $json_message = "无法添加到canvas";
        $request=$this->getRequest();
        $moduleRest=$this->get('moduleRest');
        $course_id=$request->request->get('course_id');
        $chapter_id=$request->request->get('chapter_id');
        $video_id=$request->request->get('video_id');
        $title=$request->request->get('lesson_name');
        $external_url= $this->container->getParameter('video_external_url').$video_id;
        $module_item=array(
        	'title'=>$title,
        	'type'=>'ExternalUrl',
        	'external_url'=>$external_url,
    	);
        $moduleRest->addModuleItem($course_id,$chapter_id,$module_item);
        $json_status = 1;
        $json_message = "添加成功";
        return $this->createJsonResponse($json_data,$json_status,$json_message);
    }
}
