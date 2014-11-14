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
		return $this->createJsonResponse(array('token'=>$token->getAccessToken()));
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
		return $this->createJsonResponse(array('token'=>$token->getAccessToken()));
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
	protected function createJsonResponse($data)
	{
	        	return new JsonResponse($data);
	}

}
