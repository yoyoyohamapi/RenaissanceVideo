<?php
namespace Video\WebBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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


}
