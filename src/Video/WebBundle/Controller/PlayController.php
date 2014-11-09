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
        $repos=$this->getDoctrine()->getRepository('VideoCommonBundle:Token');
        $tokens=$repos->findAll();
        foreach ($tokens as $key => $value) {
            $access_token=$value->getAccessToken();
            $value->setAccessToken(substr($access_token, 0,4).'...');
        }
        $data=array(
            'videos'=>$videos,
            'tokens'=>$tokens,
            );
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
    public function createTokenAction(){
         return $this->render('VideoWebBundle:Play:create_token.html.twig');
    }
}
