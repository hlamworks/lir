﻿<?php
/********************************************
	Date: 2017/10/30
	Description: Httpヘッダの情報管理
*********************************************/

class Response {
	protected $content;
	protected $status_code = 200;
	protected $status_text = 'OK';
	protected $http_headers = array();
	
	public function send(){
		header('HTTP/1.1'. $this -> status_code .' '. $this -> status_text);
		
		foreach($this -> http_heders as $name => $val){
			header($name .':'. $val);
		}
		
		echo $this -> content;
	}
	
	public function setContent($content){
		$this -> content = $content;
	}
	
	public function setStatusCode($status_code, $status_text=''){
		$this -> status_code = $status_code;
		$this -> status_text = $status_text;
	}
	
	public function setHttpHeader($name, $value){
		$this -> http_headers[$name] = $value;
	}
}