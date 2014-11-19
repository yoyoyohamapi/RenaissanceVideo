<?php 

namespace Video\CommonBundle\Tools;

class CurlHelper {
	protected $access_token;
	protected $error_head;
	protected $base_url;
	protected $authed;
	protected $get_header_opt;
	public function __construct($authed){
		$this->authed = $authed;
		$this->curl_handler = curl_init();
	}

	public function __destruct(){
		curl_close($this->curl_handler);
	}

	//通过初试化方法设定api地址、口令、响应头 
	public function init($base_url,$access_token,$auth_head,$error_head){
		$this->access_token = $access_token;
		$this->error_head = $error_head;
		$this->base_url = $base_url;
		$this->get_header_opt  = 'Authorization:'.$auth_head.' '.$this->access_token;
		curl_setopt($this->curl_handler, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($this->curl_handler,CURLOPT_SSL_VERIFYPEER,$this->authed);
		curl_setopt($this->curl_handler,CURLOPT_SSL_VERIFYHOST,$this->authed);
		curl_setopt($this->curl_handler, CURLOPT_AUTOREFERER, true); //set referer on redirect
		curl_setopt($this->curl_handler, CURLOPT_CONNECTTIMEOUT, 120); //timeout on connect
		curl_setopt($this->curl_handler, CURLOPT_TIMEOUT, 30); //timeout on response
		curl_setopt($this->curl_handler, CURLOPT_MAXREDIRS, 10); //stop after 10 redirects
	}

	public function curlGet($api){
		$api = $this->base_url.$api;
		curl_setopt($this->curl_handler,CURLOPT_HTTPHEADER,array($this->get_header_opt));
		curl_setopt($this->curl_handler,CURLOPT_URL,$api);
		return $this->curlExec($this->curl_handler);
	}
	// $type = 'POST'|'PUT'|'DELETE'
	public function curlCustom($api,$post_field,$type){
		$api = $this->base_url.$api;
		$post_field = json_encode($post_field);
		curl_setopt($this->curl_handler,CURLOPT_URL,$api);
		curl_setopt ( $this->curl_handler, CURLOPT_CUSTOMREQUEST, $type);
    		curl_setopt($this->curl_handler, CURLOPT_HTTPHEADER, array(  
		            'Content-Type: application/json; charset=utf-8',  
		            'Content-Length: ' . strlen($post_field),
		            $this->get_header_opt
		            ) 			
		 );  
    		curl_setopt($this->curl_handler,CURLOPT_POSTFIELDS,$post_field);
		return $this->curlExec($this->curl_handler);
	}

	public function curlExec($curl_handler){
		$response =curl_exec($curl_handler);
		$response = json_decode($response);
		if(empty($response))
			return NULL;
		$error = array_key_exists($this->error_head, $response);
		if( $error )
			return NULL;
		else
			return $response;
	}
}