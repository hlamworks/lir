<?php
/********************************************
	Date: 2017/10/27
	Description: クラスのオートロード登録
*********************************************/
require './core/ClassLoader.php';

//クラスローダーインスタンス
$loader = new ClassLoader();

//coreディレクトリとmodelsディレクトリ内のClassの読み込み
$loader -> registerDir(dirname(__FILE__).'/core');
$loader -> registerDir(dirname(__FILE__).'/models');

$loader -> register();