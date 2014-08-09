<?php
//phpinfo();die;
error_reporting(E_ALL);
session_start();
require_once("../system/limon/limonade.php");
require_once("../system/config.php");
require_once("system/core.php");
$redi = new syscore();
$redi->settings();

if(file_exists("install.php")){
	require_once("install.php"); die();
}

dispatch_get("/*", array($redi, 'fetchmenuitem'));

run();
?>