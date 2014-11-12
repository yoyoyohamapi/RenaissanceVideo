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
        $current_time=date('Y-m-d H:i:s',time());
        foreach ($tokens as $key => $value) {
            $access_token=$value->getAccessToken();
            $value->setAccessToken(substr($access_token, 0,4).'...');
            $limit_time=$value->getLimitTime()->format('Y-m-d H:i:s');
            if($limit_time<$current_time)
                $value->setState('到期');
            else 
                $value->setState('已激活');
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
