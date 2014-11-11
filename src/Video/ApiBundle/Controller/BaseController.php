<?php

namespace Video\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Video\CommonBundle\Entity\Token;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends Controller
{
	//创建token并存入数据库
	public function createTokenAction(){
		$request=$this->getRequest();
		$current_time=date('Y-m-d H:i:s',time());
		$limit_time=$request->request->get('limit_time');
		$access_token=md5(md5('b1f2t3j7'.$current_time.'1q2w3e4r5t6y'));
		$em=$this->getDoctrine()->getEntityManager();
		$create_time=new \DateTime("now");
		$limit_time=new \DateTime($limit_time);
		$token=new Token();
		$token->setCreateTime($create_time);
		$token->setAccessToken($access_token);
		$token->setLimitTime($limit_time);
		$data=array(
			'token'=>$token,
			);
		$em->persist($token);
		$em->flush();
		return $this->createJsonResponse('success');
	}
	//检查token是否合法
	public function checkToken($access_token){
		$repos=$this->getDoctrine()->getRepository('VideoCommonBundle:Token');
		$access_token=$repos->findOneByAccessToken($access_token);
		if($access_token==NULL)return false;
		else return true;
	}
	//检查头部是否合法
	public function checkHead($auth_head){
		$video_auth_head=$this->container->getParameter('video_auth_head');
		if($auth_head==$video_auth_head)return true;
		else return false;
	}

	protected function createJsonResponse($data)
	{
	        	return new JsonResponse($data);
	}

}
