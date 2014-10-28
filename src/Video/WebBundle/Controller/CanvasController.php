<?php
namespace Video\WebBundle\Controller;
use Video\WebBundle\Controller\BaseController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CanvasController extends BaseController
{
    public function choiceAction($video_id){
        $form=$this->createFormBuilder();
        $courseREST=$this->get('courseREST');
        $courses=$courseREST->getAllCourses();
        $data=array(
            'courses'=>$courses,
            'video_id'=>$video_id,
            );
        return $this->render('VideoWebBundle:Canvas:choice.html.twig',$data);
    }
    public function findChaptersAction(){
        $request=$this->getRequest();
        $course_id=$request->query->get('course_id');
        $moduldeRest=$this->get('moduleRest');
        $chapters=$moduldeRest->getModulesByCourseId($course_id);
        if($chapters==NULL){
            $data=array(
                'isNull'=>true,
                'chapters'=>'此课程无章节'
                );
        }
        else
        {
                       $data=array(
                        'isNull'=>false,
                      'chapters'=>$chapters
            );
      }
           $response=new Response(json_encode($data));
           return $response;
    }
    public function addExUrlAction()
    {
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
    	       return $this->redirect($this->generateUrl('index'));
    }
}
