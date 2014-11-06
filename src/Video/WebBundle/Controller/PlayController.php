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
            "videos"=>$videos,
            );
        $fileupload=$this->container->getParameter('fileUpload.class');
        return $this->render('VideoWebBundle:Play:index.html.twig', $data); 
    }
    public function showAction($video_id)
    {
        $repos=$this->getDoctrine()->getRepository('VideoCommonBundle:Video');
        $video=$repos->find($video_id);
        $data=array(
            "video"=>$video,
            );
        return $this->render('VideoWebBundle:Play:show.html.twig', $data);
    }
}
