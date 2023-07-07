<?php

$test=$_REQUEST['test'];

if($test!='')

{

	$mailtype=5;

	$tokenid='RPN0017';

	mail_reg('sunilnirwan55@gmail.com','test',$mailtype,$tokenid);

  

}

function file_get_contents_curl($url) {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);

    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

    $data = curl_exec($ch);

    curl_close($ch);

    return $data;

}

function mail_reg($to,$subject,$mailtype,$tokenid)

{

	$headers = "MIME-Version: 1.0" . "\r\n";

	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: Soum.in <info@soum.in>' . "\r\n";

	$headers .= 'CC: SOUM <info@soum.in>' . "\r\n";

	

	$url = 'http://soum.in/www/_mail_try2.php?mailtype='.$mailtype.'&tokenid='.$tokenid;	

	

	

	$msg=file_get_contents_curl($url);

	

	

	$result=mail($to,$subject,$msg,$headers);



}

?>