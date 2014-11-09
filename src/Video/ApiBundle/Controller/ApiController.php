<?php

namespace Video\ApiBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Video\ApiBundle\Controller\BaseController;
use Video\CommonBundle\Entity\VideoToken;
class ApiController extends BaseController
{
    public function indexAction($name)
    {
        return $this->render('VideoApiBundle:Api:index.html.twig', array('name' => $name));
    }

   /**
     * This the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  description="存储客户购买课程的Token",
     * )
     */
    public function saveVideoTokenAction(){
             $request=$this->getRequest();
             $headers = array();
             foreach ($_SERVER as $key => $value) {
             $headers[str_replace('_', '-', substr($key, 5))] = $value;
             }
             $check_info=explode(' ', $headers['AUTHORIZATION']);
             $auth_head=$check_info[0];
             $ispass=$this->checkHead($auth_head);
             if(!$ispass)
             {
                $response_info=array(
                    'fail'=>'the auth_head is not right!!'
                    );
             $response=new Response(json_encode($auth_head));
             return $response;
             }   
             $access_token=$check_info[1];
             $ispass=$this->checkToken($access_token);
             if($ispass){
                $json_data=$GLOBALS['HTTP_RAW_POST_DATA'];
                $data=json_decode($json_data);
                $videoToken=new VideoToken();
                $videoToken->setVideoToken($data->video_token);
                $em=$this->getDoctrine()->getEntityManager();
                $em->persist($videoToken);
                $em->flush();
                $response_info=array(
                    'success'=>'insert video_token success!!'
                    );
             }
             else{
                   $response_info=array(
                    'fail'=>'you have not authoriated'
                    );
             }
             $response=new Response(json_encode($response_info));
             return $response;
    }
}
