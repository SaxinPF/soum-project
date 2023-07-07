<?php
	
	define('UPLOAD_DIR', '../upload/temp/');
	$img = $_POST['imgBase64'];
	$popid= $_POST['popid'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file2=uniqid() .'-'.$popid. '.png';
	$file = UPLOAD_DIR . $file2;
	$success = file_put_contents($file, $data);
	print $success ? $file2 : 'Unable to save the file.';
?>