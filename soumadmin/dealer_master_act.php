<?php
    include('../config2.php');
    include('../_mail_fire.php');
	function resizeImage($filename,$max_width,$newfilename="",$max_height='',$withSampling=true)
{
    if($newfilename=="")
        $newfilename=$filename;
    // Get new sizes
    list($width, $height) = getimagesize($filename);
    //-- dont resize if the width of the image is smaller or equal than the new size.
   if($width==$max_width)
        $max_width=$width;
    $percent = $max_width/$width;
    $newwidth = $width * $percent;
    if($max_height=='')
    {
        $newheight = $height * $percent;
    }
    else
        $newheight = $max_height;
    // Load
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $po=strpos($filename,".")+1;
    $ln=strlen($filename)-$po;
    $ext = strtolower(substr($filename,$po,$ln));
    //$ext = strtolower(substr($filename,-3));
	//$ext = strtolower(getExtension($filename));
    if($ext=='gif')
        $source = imagecreatefromgif($filename);
        if(($ext=='jpg') or ($ext=='jpeg'))
        $source = imagecreatefromjpeg($filename);
        if($ext=='png')
        $source = imagecreatefrompng($filename);
    // Resize
    if($withSampling)
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    else
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    // Output
    if($ext=='gif')
        return imagegif($thumb,$newfilename);
    if(($ext=='jpg') or ($ext=='jpeg'))
        return imagejpeg($thumb,$newfilename);
        if($ext=='png')
        return imagepng($thumb,$newfilename);
}

	$poster_id=$_REQUEST['poster_id'];
	$act=$_REQUEST['act'];
	$name=$_REQUEST['name1'];
	$email=$_REQUEST['email'];
	$address=mysqli_real_escape_string($db,$_REQUEST['address']);
	$city=mysqli_real_escape_string($db,$_REQUEST['city']);
	$mobile=$_REQUEST['mobile'];
	$pincod=$_REQUEST['pincod'];
	$pwd=md5($_REQUEST['pwd']);
	 $imageData1=$_REQUEST['S1'];
    $dt=date("Y-m-d H:i:s");
     if($active=='on')
     {
      $priority=1;
     }
     else
     {
     $priority=0;
     }

       if($act == "add")
		{
			 $mob="select * from soum_master_dealer where 1=1 and (mobile='$mobile' or email='$email')";
			 $resm=$db->query($mob);
			 if(mysqli_num_rows($resm)>0)
			 {
			   echo '<script>alert("This Number/Email allready register"); window.location.href="dealer_master.php";</script>';
			   die();
			 }


						$cust_type="Dealer";

								$sql=$db->prepare("insert into soum_master_dealer(cust_dttm,user_type,fname,email,address,city,mobile,pincod,user_pass)
										values(?,?,?,?,?,?,?,?,?)");
										$sql->bind_param("sssssssss",$dt,$cust_type,$name,$email,$address,$city,$mobile,$pincod,$pwd);

								$res=$sql->execute();
								$enq_id=mysqli_insert_id($db);
								$token="DRN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
								$token1=$db->prepare("update soum_master_dealer set reg_id='$token' where cust_id=$enq_id");
								$rest=$token1->execute();
							            if($res)
							            {

							              $msg="Thanks ".$name." for choosing Soum for all kind of your Mobile services.";
						                  $message = urlencode($msg);
					                      sms_api($mobile,$message);




							          /*   $mailtype=1;
										$mailsubject="Dealer Registration";
										$mailtoken=$token;
										$mailto=$email;
										mail_reg($mailto,$mailsubject,$mailtype,$mailtoken); */




							                /***************Image1************************************/
														if($imageData1!='')
														{
														    $prodImage1='Dealer_profile'.$enq_id.'.jpg';
					   										$table='soum_master_dealer';

					   										$oldDirectory = "../upload/temp/".$imageData1;
														    $newDirectory = "../upload/profile/".$prodImage1;
														    rename($oldDirectory, $newDirectory);

														    $newfilei1="../upload/profile/".$prodImage1;
															resizeImage($newDirectory,135,$newfilei1);
					   										$update_img1=$db->prepare("update $table set image='$prodImage1' where cust_id=$enq_id");
															$res1=$update_img1->execute();
														}
							            ?>
									    <script>
									        alert("Data Save successfully");
									        window.location.href="dealer_master.php";
									    </script>
									    <?php

								        }

	    }
		if($act == "edit")
		{

	          	$sql=$db->prepare("update soum_master_dealer set fname='$name',email='$email',address='$address',city='$city',mobile='$mobile',pincod='$pincod' where cust_id=$poster_id");
				$res=$sql->execute();
				$enq_id=$poster_id;

		            if($res)
		            {

		            /***************Image1************************************/
									if($imageData1!='')
									{
									    $prodImage1='Dealer_profile'.$enq_id.'.jpg';
   										$table='soum_master_dealer';

   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/profile/".$prodImage1;
									    rename($oldDirectory, $newDirectory);

									    $newfilei1="../upload/profile/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update $table set image='$prodImage1' where cust_id=$enq_id");
										$res1=$update_img1->execute();
									}

		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="dealer_master.php";
				    </script>
				    <?php

			        }


		}

		if($act == "del")
		{
			$sql="delete from soum_master_dealer where cust_id=$poster_id";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="dealer_master.php";
				    </script>
				    <?php

			        }

		}




?>
