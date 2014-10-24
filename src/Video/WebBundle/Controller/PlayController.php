<?php
namespace Video\WebBundle\Controller;
use Video\WebBundle\Controller\BaseController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Video\CommonBundle\Entity\Video;
class PlayController extends BaseController
{
    public function indexAction()
    {
        $repos=$this->getDoctrine()->getRepository('VideoCommonBundle:Video');
        $videos=$repos->findAll();
        $data=array(
            "videos"=>$videos
            );
        return $this->render('VideoWebBundle:Play:index.html.twig', $data); 
    }
    public function createExurlAction(){

    }
    public function showAction($video_id)
    {
        return $this->render('VideoWebBundle:Play:show.html.twig', array(
                // ...
            ));    }
}
