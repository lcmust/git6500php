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
);
require(SP_PATH."/SpeedPHP.php");
spRun();