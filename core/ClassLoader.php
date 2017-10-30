<?php
/********************************************
	Date: 2017/10/27
	Description: クラスのオートロード処理
*********************************************/
class ClassLoader {

	protected $dirs;

	public function register(){
		//指定した関数を __autoload() の実装
		spl_autoload_register(array($this, 'loadClass'));
	}
	
	//読み込みを行うディレクトリの登録
	public function registerDir($dir){
		$this -> $dirs[] = $dir;
	}
	
	//オートロード実装のコールバック
	public function loadClass(){
		foreach($this -> dirs as $dir){
			$file = $dir. '/' .$class. '.php';

			//ファイルが存在・読み込み可能チェック
			if(is_readable($file)){
				require $file;

				return;
			}
		}
	}

}