<?php include('../config2.php');
ini_set('max_file_uploads', 12);
ini_set('display_errors',1);
error_reporting(E_ALL);

?>

<?php
//if(isset($_POST['token'])){
   // 
//}
//else{
//Print_r($_POST);
//Print_r($_FILES['fileToUpload1']['size']);die;
$enq_id = $_POST['req_id'];
		       
				$json = array();
				$json['error_f'] = 0;
				if(isset($_FILES['fileToUpload1']) && $_FILES['fileToUpload1']['error']==0){
				     $file_size = $_FILES['fileToUpload1']['size'];
					 $name = 'Image 1';
				}
				if(isset($_FILES['fileToUpload2']) && $_FILES['fileToUpload2']['error']==0){
				     $file_size = $_FILES['fileToUpload2']['size'];
					  $name = 'Image 2';

				}
				if(isset($_FILES['fileToUpload3']) && $_FILES['fileToUpload3']['error']==0){
				      $file_size = $_FILES['fileToUpload3']['size'];
					  $name = 'Image 3';

				}
				 if(isset($file_size)){
						$error = checkSize($file_size,$name);
						  if($error !=null){
							$json['error_f'] = 1;
						  }
				   }else{
				       $json['error_f'] = 1;
					   $error ='The uploaded file exceeds the limit. Please upload less then 12MB.';
				   }

                      if($json['error_f']==0){

				               $table = 'soum_bill_of_supply';
							     //image section
										if(isset($_FILES['fileToUpload1']) && $_FILES['fileToUpload1']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage1-'.$enq_id:'prodImage1-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload1'],'../'.UPLOAD_DIR,$prodImage1);

												if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set images='$fileiag' where id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}

										if(isset($_FILES['fileToUpload2']) && $_FILES['fileToUpload2']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage2-'.$enq_id:'prodImage2-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload2'],'../'.UPLOAD_DIR,$prodImage1);
										         if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set images1='$fileiag' where id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}

										if(isset($_FILES['fileToUpload3']) && $_FILES['fileToUpload3']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage3-'.$enq_id:'prodImage3-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload3'],'../'.UPLOAD_DIR,$prodImage1);
										         if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set images2='$fileiag' where id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}


									   if($image['error']!=null){
									      $json['error_f'] =1;
									       $error =    $image['error'];
									   }else{
									       $json['path']  =  $image['file'];
									   }

								}

							$json['error'] =  $error ;

                            echo json_encode($json);die;






     function __UploadedFile($data,$folder,$image_name= null){
		$path=$directory = '/home/ASe5t678s3/web/soum.co.in/public_html/upload/';
		//$path=$directory = 'E:/xampp/htdocs/soum/www/upload/';//$folder;
        $error = null;
		if(!is_dir($directory)) mkdir($directory);
		if (!is_readable($directory)){
			 $error = "directory is not readable.";
		}
			$image = $data['name'];
			$ext = pathinfo($image, PATHINFO_EXTENSION);
			$file = $image_name.time().".".$ext;

			if(!move_uploaded_file($data['tmp_name'], $directory.$file)){
				 $error = "Failed to move uploaded file:".$data["error"];
			}
		return array('error'=>$error,'file'=>$file);
	}

	function checkSize($size ,$name){
	//echo $size;
	//echo '<br>';
	//echo $size/1024;die;
				if($size/1024 > 12288){
				return	 $name.' : file size should be not exceeds 12MB.';
				}else{
				return null;
				}
	}

 ?>
