<?php

namespace Video\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Video\CommonBundle\Entity\Token;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends Controller
{


	/**现在JSON信息回调需要封装三个参数：
	* data:回调数据
	* status:回调状态，标示数据状态正确与否，1为成功，0为败
	* message:回调消息，反映错误原因
	*/
	protected function createJsonResponse($data,$status,$message)
	{			
				$response = array(
					'data'=>$data,
					'status'=>$status,
					'message'=>$message
				);
	        	return new JsonResponse($response);
	}

	//下面是Api回调Response,参照canvas,若获得资源，直接回调资源，否则返回错误信息
	protected function createApiResponse($resource = NULL,$error_message = NULL){
		if(!$resource)
			$response = array('error_message'=>$error_message);
		else
			$response = $resource;
		return new JsonResponse($response);
	}

	//创建token并存入数据库
	public function createTokenAction(){
		$request=$this->getRequest();
		$current_time=date('Y-m-d H:i:s',time());
		$access_token=md5(md5('b1f2t3j7'.$current_time.'1q2w3e4r5t6y'));
		$apply_name=$request->request->get('app_name');
		$limit_time=$request->request->get('limit_time');
		$em=$this->getDoctrine()->getEntityManager();
		$create_time=new \DateTime("now");
		$limit_time=new \DateTime($limit_time);
		$token=new Token();
		$token->setApplyName($apply_name);
		$token->setCreateTime($create_time);
		$token->setAccessToken($access_token);
		$token->setLimitTime($limit_time);
		$data=array(
			'token'=>$token,
			);
		$em->persist($token);
		$em->flush();
			$json_data = $token->getAccessToken();
		$json_status = 1;
		$json_message = " ";
        return $this->createJsonResponse($json_data,$json_status,$json_message);
	}
	//重新生成token
	public function recreateTokenAction(){
		$current_time=date('Y-m-d H:i:s',time());
		$access_token=md5(md5('b1f2t3j7'.$current_time.'1q2w3e4r5t6y'));
		$em=$this->getDoctrine()->getEntityManager();
		$request=$this->getRequest();
		$token_id=$request->request->get('token_id');
		$token=$em->getRepository('VideoCommonBundle:Token')->find($token_id);
		if(!$token){
			throw $this->createNotFoundException(
				'No product found for id '.$token_id
				);
		}
		$limit_time=$token->getLimitTime()->modify('+5 month')->format('Y-m-d H:i:s');
		$token->setLimitTime(new \Datetime($limit_time));
		$token->setAccessToken($access_token);
		$em->flush();
		$json_data = $token->getAccessToken();
		$json_status = 1;
		$json_message = " ";
        return $this->createJsonResponse($json_data,$json_status,$json_message);
	}
	//检查token是否合法
	public function checkToken($access_token){
		$repos=$this->getDoctrine()->getRepository('VideoCommonBundle:Token');
		$current_time=date('Y-m-d H:i:s',time());
		$query=$repos->createQueryBuilder('token')
			->where('token.accessToken= :access_token and token.limitTime>=:current_time')
			->setParameter('access_token',$access_token)
			->setParameter('current_time',$current_time)
			->getQuery();
		$token=$query->getResult();
		if($token==NULL)return false;
		else return true;
	}
	//检查头部是否合法
	public function checkHead($auth_head){
		$video_auth_head=$this->container->getParameter('video_auth_head');
		if($auth_head==$video_auth_head)return true;
		else return false;
	}


}
