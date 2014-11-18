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
    * <h4>Request Parameters:<br></h4>
    *<table border="3">
    *  <tr>
    *   <th>Parameter</th>
    *   <th>Type</th>
    *  <th>Required</th>
    *</tr>
    *  <tr  >
    *    <td>video_token</td>
    *    <td>String</td>
    *    <td>true</td>
    *  </tr>
    * </table>
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
                $resource=NULL;
                $error_message="you have not authoriated";
                return $this->createApiResponse($resource,$error_message);
             }   
             $access_token=$check_info[1];
             $ispass=$this->checkToken($access_token);
             // 如果TOKEN存在，则不插入，直接回调与成功时相同的操作
             if($ispass){
                    $json_data=$GLOBALS['HTTP_RAW_POST_DATA'];
                    $data=json_decode($json_data);
                    $videoToken=new VideoToken();
                    $video_token=$data->video_token;
                    $videoToken->setVideoToken($video_token);
                    $repos=$this->getDoctrine()->getRepository('VideoCommonBundle:VideoToken');
                    $exist_videoToken=$repos->findOneByVideoToken($video_token);
                if($exist_videoToken==NULL){
                    $em=$this->getDoctrine()->getEntityManager();
                    $em->persist($videoToken);
                    $em->flush();
                    $videoToken=$repos->findOneByVideoToken($video_token);
                    $resource=$videoToken->getId();
                }
                else{
                    $resource=$exist_videoToken->getId();
                }
                $error_message=NULL;
             }
             else{
                    $resource=NULL;
                    $error_message="you have not authoriated";
             }
             // !!!注意，换用了新的创建json方法
             return $this->createApiResponse($resource,$error_message);
             // return $this->createJsonResponse($response_info);
    }
}
