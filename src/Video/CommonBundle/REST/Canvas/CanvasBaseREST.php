<?php
namespace Video\CommonBundle\REST\Canvas;
use Video\CommonBundle\REST\BaseREST;

class CanvasBaseREST extends BaseREST{
	public function init(){
		//设定为canvas的api地址、口令、响应头
		$base_url = $this->container->getParameter('canvas_api_url');
		$access_token = $this->container->getParameter('canvas_api_token');
		$auth_head = $this->container->getParameter('canvas_api_auth_head');
		$error_head = $this->container->getParameter('canvas_api_error_head');
		$this->curlHelper->init($base_url,$access_token,$auth_head,$error_head);
	}
}
