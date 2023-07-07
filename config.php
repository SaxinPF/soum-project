<?php
if(end(explode('/',$_SERVER['REQUEST_URI']))=='phones.php?phone=used' || end(explode('/',$_SERVER['REQUEST_URI']))=='phones.php'){
   header("Location: https://www.soum.co.in/second-hand-phone-jaipur");
   exit;
}
error_reporting(E_ERROR | E_PARSE);
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();
date_default_timezone_set('Asia/Kolkata');
define('DIRSEP', DIRECTORY_SEPARATOR);
$local_IP = array('localhost','127.0.0.1','192.168.100.38');
$this_host = $_SERVER['HTTP_HOST'];

include("config_soum.php");
$db = new mysqli(HOST, USER, PASS, DBNAME);

mysqli_set_charset($db,"utf8");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s<br/>", mysqli_connect_error());
}



?>
