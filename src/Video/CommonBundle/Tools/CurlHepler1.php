<?php 

namespace Video\CommonBundle\Tools;

class CurlHelper1 {
	protected $token;
	protected $host;
	protected $header;
	protected $authed;
	public function __construct($authed){
		$this->authed = $authed;
		$this->curl_handler = curl_init();
		curl_setopt ( $this->curl_handler, CURLOPT_RETURNTRANSFER, 1 );
    		curl_setopt($this->curl_handler,CURLOPT_SSL_VERIFYPEER,$this->authed);
		curl_setopt($this->curl_handler,CURLOPT_SSL_VERIFYHOST,$this->authed);
		curl_setopt($this->curl_handler, CURLOPT_AUTOREFERER, true); //set referer on redirect
		curl_setopt($this->curl_handler, CURLOPT_CONNECTTIMEOUT, 120); //timeout on connect
		curl_setopt($this->curl_handler, CURLOPT_TIMEOUT, 30); //timeout on response
		curl_setopt($this->curl_handler, CURLOPT_MAXREDIRS, 10); //stop after 10 redirects
	}

	public function __destruct(){
		curl_close($this->curl_handler);
	}
	public function setBaseCurlInfo($token,$host,$header){
		$this->token=$token;
		$this->host=$host;
		$this->header=$header;
	}
	public function curlGet($api){
		$api = $this->host.$api;
		curl_setopt($this->curl_handler,CURLOPT_HTTPHEADER,$this->header);
		curl_setopt($this->curl_handler,CURLOPT_URL,$api);
		return $this->curlExec($this->curl_handler);
	}
	// $type = 'POST'|'PUT'|'DELETE'
	public function curlCustom($api,$post_field,$type){
		$api = $this->host.$api;
		$post_field = json_encode($post_field);
		curl_setopt($this->curl_handler,CURLOPT_URL,$api);
		curl_setopt ( $this->curl_handler, CURLOPT_CUSTOMREQUEST, $type);
    		curl_setopt($this->curl_handler, CURLOPT_HTTPHEADER, $this->header);
		 );  
    		curl_setopt($this->curl_handler,CURLOPT_POSTFIELDS,$post_field);
		return $this->curlExec($this->curl_handler);
	}

	public function curlExec($curl_handler){
		$response =curl_exec($curl_handler);
		$response = json_decode($response);
		if( !empty($response->error_report_id) || $response == false)
			return NULL;
		else
			return $response;
	}
}