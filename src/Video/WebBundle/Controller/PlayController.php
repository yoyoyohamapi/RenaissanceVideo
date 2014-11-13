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
        $request=$this->getRequest();
        $video_token=$request->request->get('video_token');
        $repos=$this->getDoctrine()->getRepository('VideoCommonBundle:Video');
        $video=$repos->find($video_id);
        // var_dump($video_token);
        $repos=$this->getDoctrine()->getRepository('VideoCommonBundle:VideoToken');
        $video_token=$repos->findOneByVideoToken($video_token);
        if($video_token==NULL){
            return $this->render('VideoWebBundle:Error:404.html.twig', array("error_msg"=>"你尚未购买该课程!!"));
        }
        $data=array(
            "video"=>$video,
            );
        return $this->render('VideoWebBundle:Play:show.html.twig', $data);
    }
    public function createTokenAction(){
         return $this->render('VideoWebBundle:Play:create_token.html.twig');
    }
}
