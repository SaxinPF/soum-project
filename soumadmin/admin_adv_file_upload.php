<?php include('../config2.php');
ini_set('max_file_uploads', 12);
//ini_set('display_errors',1);
//error_reporting(E_ALL);

?>

<?php
//message trigger
  if(isset($_POST['token'])){
         $token =    $_POST['token'];
         $drpBrand =    $_POST['brand'];
         $drpModel =    $_POST['model'];
         $seller_name =    $_POST['seller'];
         $seller_phone =    $_POST['phone'];
         $approve =    $_POST['approve'];

          $sqlb="select * from soum_prod_subcat where prod_subcat_id=$drpBrand";
          $resb=$db->query($sqlb);
    	  $rowb=$resb->fetch_assoc();
		  $brand=$rowb['prod_subcat_desc'];


	   $sqlm="select * from soum_prod_subsubcat where prod_subsubcat_id=$drpModel";
		  $resm=$db->query($sqlm);
		  $rowm=$resm->fetch_assoc();
		  $model=$rowm['prod_subcat_desc'];

	if($approve==0){
		$msg="Thanks $seller_name, for showing your interest for selling '".$brand." ".$model."' . Currently, your add is in moderation.";
		$message = urlencode($msg);
	}else{
	   $msg='Status for Token Id '.$token.' has been updated to "Approved".  Thank you - Team SOUM.';
	   $message = urlencode($msg);
	}


	 sms_api($seller_phone,$message);

	 $json['status'] =  1 ;
     echo json_encode($json);die;

}
else{
//Print_r($_POST);
//Print_r($_FILES['fileToUpload1']['size']);die;
$enq_id = $_POST['req_id' ];
		        /* if($_POST['act' ] == 'add'){
					if($_FILES['fileToUpload1']['error']!=0){
					  $error .='Please add the first image of your Ad.</br>';
					}
					if($_FILES['fileToUpload2']['error']!=0){
					  $error .='Please add the second image.</br>';
					}
				} */
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
				if(isset($_FILES['fileToUpload6']) && $_FILES['fileToUpload6']['error']==0){
				     $file_size = $_FILES['fileToUpload6']['size'];
					 $name = 'Bill or Letter head';

				}
				if(isset($_FILES['fileToUpload5']) && $_FILES['fileToUpload5']['error']==0){
				     $file_size = $_FILES['fileToUpload5']['size'];
					 $name = 'Seller Identity';

				}
				if(isset($_FILES['fileToUpload7']) && $_FILES['fileToUpload7']['error']==0){
				     $file_size = $_FILES['fileToUpload7']['size'];
					 $name = 'Sell letter';

				}
				if(isset($_FILES['fileToUpload8']) && $_FILES['fileToUpload8']['error']==0){
				     $file_size = $_FILES['fileToUpload8']['size'];
					 $name = 'Swap letter';

				}
				if(isset($_FILES['fileToUpload4']) &&$_FILES['fileToUpload4']['error']==0){
				     $file_size = $_FILES['fileToUpload4']['size'];
					 $name = 'Seller Photo';

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

				               $table = 'soum_product_master';
							     //image section
										if(isset($_FILES['fileToUpload1']) && $_FILES['fileToUpload1']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage1-'.$enq_id:'prodImage1-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload1'],'../'.UPLOAD_DIR,$prodImage1);

												if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set images='$fileiag' where prod_id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}

										if(isset($_FILES['fileToUpload2']) && $_FILES['fileToUpload2']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage2-'.$enq_id:'prodImage2-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload2'],'../'.UPLOAD_DIR,$prodImage1);
										         if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set images1='$fileiag' where prod_id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}

										if(isset($_FILES['fileToUpload3']) && $_FILES['fileToUpload3']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage3-'.$enq_id:'prodImage3-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload3'],'../'.UPLOAD_DIR,$prodImage1);
										         if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set images2='$fileiag' where prod_id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}


										if(isset($_FILES['fileToUpload4']) && $_FILES['fileToUpload4']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage4-'.$enq_id:'prodImage4-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload4'],'../'.UPLOAD_DIR,$prodImage1);
										         if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set seller_img='$fileiag' where prod_id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}

										if(isset($_FILES['fileToUpload5']) && $_FILES['fileToUpload5']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage5-'.$enq_id:'prodImage5-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload5'],'../'.UPLOAD_DIR,$prodImage1);
										         if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set add_proof_img='$fileiag' where prod_id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}

										if(isset($_FILES['fileToUpload6']) && $_FILES['fileToUpload6']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage6-'.$enq_id:'prodImage6-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload6'],'../'.UPLOAD_DIR,$prodImage1);
										         if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set bill_img='$fileiag' where prod_id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}

										if(isset($_FILES['fileToUpload7']) && $_FILES['fileToUpload7']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage7-'.$enq_id:'prodImage7-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload7'],'../'.UPLOAD_DIR,$prodImage1);
										         if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set sell_letter='$fileiag' where prod_id=$enq_id");
													$res1=$update_img1->execute();
												 }

										}

										if( isset($_FILES['fileToUpload8']) && $_FILES['fileToUpload8']['error']==0){
										   $prodImage1 = (!isset($poster_type)?'t-prodImage8-'.$enq_id:'prodImage8-'.$enq_id);
										    $image  = __UploadedFile($_FILES['fileToUpload8'],'../'.UPLOAD_DIR,$prodImage1);
										         if($image['error']==null){
												    $fileiag =  $image['file'];
												 	$update_img1 = $db->prepare("update $table set swap_letter='$fileiag' where prod_id=$enq_id");
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
}





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
