<?php
/********************************************
	Date: 2017/11/06
	Description: Session 管理
*********************************************/
class Session {
	protected static $sessionStarted = false;
	protected static $sessionIdRegenerated = false;
	
	public function __construct(){
		if(!self::$sessionStarted){
			session_start();
			
			self::$sessionStarted = true;
		}
	}
	
	public function set($name, $value){
		$_SESSION[$name] = $value;
	}
	
	public function get($name, $default = null){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
		
		return $default;
	}
	
	public function remove($name){
		unset($_SESSION[$name]);
	}
	
	public function clear(){
		$_SESSION = array();
	}
	
	public function setAuthenticated($bool){
		$this -> set('_authenticated',(bool)$bool);
		
		$this -> regenerate();
	}
	
	public function isAuthenticated(){
		return $this -> get('_authenticated', false);
	}
}