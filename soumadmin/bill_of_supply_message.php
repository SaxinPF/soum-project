<?php include('../config2.php');
ini_set('max_file_uploads', 12);
ini_set('display_errors',1);
error_reporting(E_ALL);


$mobile = $_POST['mobile'];

$msg2="Thanks for purchasing mobile from SOUM. Please provide us review here: https://reviewthis.biz/soum-reviews ";
$message2 = urlencode($msg2);
  sms_api($mobile,$message2,'1407166367618364390');       



?>
