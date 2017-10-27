<?php
/********************************************
	Date: 2017/10/27
	Description: フレームワーク内のクラス管理
*********************************************/
abstract class Application {

	public function __construct($debug = false){
		$this -> setDebugMode($debug);
		$this -> initialize();
		$this -> configure();
	}

	protected function setDebugMode($debug){
		if($debug){
			$this -> debug = true;
			ini_set('display_errors',1);
			
			//すべてのPHPエラーを表示
			error_reporting(E_ALL);
		}else{
			$this -> debug = false;
			ini_set('display_errors',0);
		}
	}
	
	protected function initialize(){
		$this -> request = new Request();
		$this -> response = new Response();
		$this -> session = new Session();
		$this -> db_manager = new DbManager();
		$this -> router = new Router($this -> registerRoutes());
	}
	
	abstract protected function configure();
	abstract public function getRootDir();
	abstract protected function registerRoute();
	
}