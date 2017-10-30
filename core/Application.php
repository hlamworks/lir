<?php
/********************************************
	Date: 2017/10/27
	Description: フレームワーク内のクラス管理
*********************************************/
abstract class Application {

	protected $debug = false;
	protected $request;
	protected $response;
	protected $session;
	protected $db_manager;

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
	
	
	//Getter
	public function isDebugMode(){
		return $this -> debug;
	}
	
	public function getRequest(){
		return $this -> request;
	}
	
	public function getResponse(){
		return $this -> response;
	}
	
	public function getSession(){
		return $this -> session;
	}
	
	public function getDbManager(){
		return $this -> db_manager;
	}
	
	public function getControllerDir(){
		return $this -> getRootDir() .'/controllers';
	}
	
	public function getViewDir(){
		return $this -> getRootDir() .'/views';
	}
	
	public function getModelDir(){
		return $this -> getRootDir() .'/models';
	}
	
	public function getWebDir(){
		return $this -> getRootDir() .'/web';
	}
	
	//コントローラの呼び出し
	
}