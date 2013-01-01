<?php
define("APP_PATH",dirname(__FILE__));
define("SP_PATH",dirname(__FILE__).'/SpeedPHP');
$spConfig = array(
	"db" => array(
		'host' => 'localhost',
		'login' => 'php',
		'password' => 'php123',
		'database' => 'php',
		),
	"url" => array(
		'url_path_info' => TRUE,
		'url_path_base' => '/speedphp/index.php',
		),
);
require(SP_PATH."/SpeedPHP.php");
//入口文件全局定义位置－－全局定义、应用及操作
define('MY_PHP_VERSION', '5.4.8_windows-xp-sp3');
spRun();