<?php
	
	define('UPLOAD_DIR', '../upload/temp/');
	$img = $_POST['imgBase64'];
	$popid= $_POST['popid'];
	
	$f = finfo_open(); 
	$mime_type = finfo_buffer($f, $img, FILEINFO_MIME_TYPE);
	
	$img = str_replace('data:image/jpeg;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file2=uniqid() .'-'.$popid. '.jpg';
	$file = UPLOAD_DIR . $file2;
	$success = file_put_contents($file, $data);
	print $success ? $file2."|".$mime_type : 'Unable to save the file.';
?>