<?php
    include('../config.php');
function resizeImage($filename,$max_width,$newfilename="",$max_height='',$withSampling=true)
{
    if($newfilename=="")
        $newfilename=$filename;

    list($width, $height) = getimagesize($filename);

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

    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $po=strpos($filename,".")+1;
    $ln=strlen($filename)-$po;
    $ext = strtolower(substr($filename,$po,$ln));



    if($ext=='gif')
        $source = imagecreatefromgif($filename);
        if(($ext=='jpg') or ($ext=='jpeg'))
        $source = imagecreatefromjpeg($filename);
        if($ext=='png')
        $source = imagecreatefrompng($filename);

    if($withSampling)
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    else
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    if($ext=='gif')
        return imagegif($thumb,$newfilename);
    if(($ext=='jpg') or ($ext=='jpeg'))
        return imagejpeg($thumb,$newfilename);
        if($ext=='png')
        return imagepng($thumb,$newfilename);
}

$admin=$_SESSION['poster_type'];
$admin_id=$_SESSION['poster_id'];

$poster_type=$_SESSION['poster_type'];
$poster_id=$_SESSION['poster_id'];

$act=$_REQUEST['act'];

    $prodid=mysqli_real_escape_string($db,$_REQUEST['prod_id']);
    $post_date=date('Y-m-d H:s:i');
	$oldphone=2;

    $titile=mysqli_real_escape_string($db,$_REQUEST['adtitle']);

	 //$fname=mysqli_real_escape_string($db,$_REQUEST['fname']);
//$email=mysqli_real_escape_string($db,$_REQUEST['email']);
//$mobile_no=mysqli_real_escape_string($db,$_REQUEST['mobile_no']);
//$pwd=mysqli_real_escape_string($db,$_REQUEST['pwd']);
//$city=mysqli_real_escape_string($db,$_REQUEST['city']);
//$adress=mysqli_real_escape_string($db,$_REQUEST['address']);
$drpBrand=mysqli_real_escape_string($db,$_REQUEST['drpBrand']);
$drpModel=mysqli_real_escape_string($db,$_REQUEST['drpModel']);


//$warranty=$_REQUEST['warranty'];
//$txt_year=mysqli_real_escape_string($db,$_REQUEST['year']);

//$devicecat=mysqli_real_escape_string($db,$_REQUEST['devicecat']);
$imi_no=mysqli_real_escape_string($db,$_REQUEST['imi_no']);

//$mrp=mysqli_real_escape_string($db,$_REQUEST['mrp']);
$offer_price=mysqli_real_escape_string($db,$_REQUEST['expected_price']);

//$mrom=mysqli_real_escape_string($db,$_REQUEST['mrom']);
//$charger=mysqli_real_escape_string($db,$_REQUEST['charger']);
//$cable=mysqli_real_escape_string($db,$_REQUEST['cable']);
//$box=mysqli_real_escape_string($db,$_REQUEST['box']);
//$sim_type=mysqli_real_escape_string($db,$_REQUEST['sim_type']);
//$pincode=mysqli_real_escape_string($db,$_REQUEST['pincode']);


$imageData1=mysqli_real_escape_string($db,$_REQUEST['S1']);
$imageData2=mysqli_real_escape_string($db,$_REQUEST['S2']);
$imageData3=mysqli_real_escape_string($db,$_REQUEST['S3']);
$imageData4=mysqli_real_escape_string($db,$_REQUEST['S4']);
$imageData5=mysqli_real_escape_string($db,$_REQUEST['S5']);
$imageData6=mysqli_real_escape_string($db,$_REQUEST['S6']);

$uploadresume1=mysqli_real_escape_string($db,$_FILES['fileToUpload1']['name']);
$uploadresume2=mysqli_real_escape_string($db,$_FILES['fileToUpload2']['name']);
$uploadresume3=mysqli_real_escape_string($db,$_FILES['fileToUpload3']['name']);
$FileUpload2=mysqli_real_escape_string($db,$_REQUEST['FileUpload2']);
$FileUpload3=mysqli_real_escape_string($db,$_REQUEST['FileUpload3']);
$txt_description=mysqli_real_escape_string($db,$_REQUEST['desc']);
//$display=mysqli_real_escape_string($db,$_REQUEST['display']);
//$battry=mysqli_real_escape_string($db,$_REQUEST['battry']);
//$os=mysqli_real_escape_string($db,$_REQUEST['os']);
//$process=mysqli_real_escape_string($db,$_REQUEST['process']);
$ram=mysqli_real_escape_string($db,$_REQUEST['ram']);
$rom=mysqli_real_escape_string($db,$_REQUEST['rom']);
//$fcame=mysqli_real_escape_string($db,$_REQUEST['fcame']);
//$bcame=mysqli_real_escape_string($db,$_REQUEST['bcame']);
//$color=mysqli_real_escape_string($db,$_REQUEST['color']);
//$source=mysqli_real_escape_string($db,$_REQUEST['source']);
//$source_id=mysqli_real_escape_string($db,$_REQUEST['source_name']);
//$qty=mysqli_real_escape_string($db,$_REQUEST['qty']);
$img1=mysqli_real_escape_string($db,$_REQUEST['img1']);
$img2=mysqli_real_escape_string($db,$_REQUEST['img2']);
$img3=mysqli_real_escape_string($db,$_REQUEST['img3']);
$devicebrand=mysqli_real_escape_string($db,$_REQUEST['devicebrand']);
$devicemodal=mysqli_real_escape_string($db,$_REQUEST['devicemodal']);

$approve=mysqli_real_escape_string($db,$_REQUEST['approve']);
$setp=mysqli_real_escape_string($db,$_REQUEST['setp']);
$rating=$_REQUEST['star1'];

if($approve==on){ $approve=1;} else { $approve=0; }
if($setp==on){ $setp=1;} else { $setp=0; }

//$data=getLatLong($pincode);
//$lat=$data["latitude"];
//$lng=$data["longitude"];
$yearbyadmin=mysqli_real_escape_string($db,$_REQUEST['yearbyadmin']);
$condition= $_REQUEST['condition'];
$condi = '';
if(!empty($condition)){
$condi = implode(',',$condition);
$condi = $condi.',';
}
$imageData7=mysqli_real_escape_string($db,$_REQUEST['S7']);
$imageData8=mysqli_real_escape_string($db,$_REQUEST['S8']);
$color_id=mysqli_real_escape_string($db,$_REQUEST['color_id']);
$seller_name = mysqli_real_escape_string($db,$_REQUEST['seller_name']);
$seller_email = mysqli_real_escape_string($db,$_REQUEST['seller_email']);
$seller_phone = mysqli_real_escape_string($db,$_REQUEST['seller_phone']);
$seller_address = mysqli_real_escape_string($db,$_REQUEST['seller_address']);
$seller_city = mysqli_real_escape_string($db,$_REQUEST['seller_city']);

       if($act == "Add"){
			    $active='0';
			    $table=(!isset($poster_type)?'soum_product_master_temp':'soum_product_master');
								if($oldphone==2)
								{
								 $s1=1;
								 $s2=1;
									$sql=$db->prepare("insert into $table (post_date,titile,prod_cat_id,brand,modal,imei_no,images,images1,images2,Constituent,poster_type,poster_id,active,appliable_rate,offer_price,rom,ram2,yearbyadmin,condi,color_id,seller_name,seller_email,seller_phone,seller_address,seller_city,opening_stock,current_stock)
									values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									$sql->bind_param("sssssssssssssssssssssssssss",$post_date,$titile,$oldphone,$drpBrand,$drpModel,$imi_no,$img1,$img2,$img3,$txt_description,$poster_type,$poster_id,$approve,$offer_price,$offer_price,$rom,$ram,$yearbyadmin,$condi,$color_id,$seller_name,$seller_email,$seller_phone,$seller_address,$seller_city,$s1,$s2);

								}

				   		       $res=$sql->execute();
    						   $enq_id=mysqli_insert_id($db);



								if($poster_type=='Customer')
								{
								  $token="UCN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
								}
								else if($poster_type=='Dealer')
								{
								    if($oldphone==1)
								    {
									 $token="NDN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
								    }
								    else
								    {
								     $token="UDN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
								    }
								}
								else if($poster_type=='Admin')
								{
								    if($oldphone==1)
								    {
									 $token="NSN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
								    }
								    else
								    {
								     $token="USN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
								    }

								    $ofer="<a href='admin/offer_master.php?prod_id=$enq_id'>Do you want make an offer on this product</a>";
								}


								$token1=$db->prepare("update $table set code='$token' where prod_id=$enq_id");
								$rest=$token1->execute();


										/***************Image1************************************/
									if($imageData1!='')
									{
									  $prodImage1=(!isset($poster_type)?'t-prodImage1-'.$enq_id.'.jpg':'prodImage1-'.$enq_id.'.jpg');

   										$oldDirectory = '../'.UPLOAD_DIR.$imageData1;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage1;
									    rename($oldDirectory, $newDirectory);

									    $newfilei1  =  '../'.UPLOAD_DIR."thumb/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update $table set images='$prodImage1' where prod_id=$enq_id");
										$res1=$update_img1->execute();
									}
									/*********************Image2*************************************************/
									if($imageData2!='')
									{
									 $prodImage2=(!isset($poster_type)?'t-prodImage2-'.$enq_id.'.jpg':'prodImage2-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData2;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage2;
									    rename($oldDirectory, $newDirectory);
									     $newfilei2= '../'.UPLOAD_DIR."thumb/".$prodImage2;
										resizeImage($newDirectory,135,$newfilei2);
										$update_img2=$db->prepare("update $table set images1='$prodImage2' where prod_id=$enq_id");

										$res2=$update_img2->execute();
									}
									/**********Image3*************************************************************************/
									if($imageData3!='')
									{
									   $prodImage3=(!isset($poster_type)?'t-prodImage3-'.$enq_id.'.jpg':'prodImage3-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData3;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage3;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei3= '../'.UPLOAD_DIR."thumb/".$prodImage3;
										resizeImage($newDirectory,135,$newfilei3);
										$update_img3=$db->prepare("update $table set images2='$prodImage3' where prod_id=$enq_id");

										$res3=$update_img3->execute();
									}
									/**********Image4*************************************************************************/
								 	if($imageData4!='')
									{
									   $prodImage4=(!isset($poster_type)?'t-prodImage4-'.$enq_id.'.jpg':'prodImage4-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData4;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage4;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei4=   '../'.UPLOAD_DIR."thumb/".$prodImage4;
										resizeImage($newDirectory,135,$newfilei4);
										$update_img4=$db->prepare("update $table set seller_img='$prodImage4' where prod_id=$enq_id");

										$res3=$update_img4->execute();
									} 
									/**********Image5*************************************************************************/
									if($imageData5!='')
									{

									   $prodImage5=(!isset($poster_type)?'t-prodImage5-'.$enq_id.'.jpg':'prodImage5-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData5;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage5;
									    rename($oldDirectory, $newDirectory);
									     $newfilei5= '../'.UPLOAD_DIR."thumb/".$prodImage5;
										resizeImage($newDirectory,135,$newfilei5);
										$update_img5=$db->prepare("update $table set bill_img='$prodImage5' where prod_id=$enq_id");

										$res3=$update_img5->execute();

									}
									/**********Image6*************************************************************************/
									if($imageData6!='')
									{
										$prodImage6=(!isset($poster_type)?'t-prodImage6-'.$enq_id.'.jpg':'prodImage6-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData6;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage6;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei6   =  '../'.UPLOAD_DIR."thumb/".$prodImage6;
										resizeImage($newDirectory,135,$newfilei6);
										$update_img6=$db->prepare("update $table set add_proof_img='$prodImage6' where prod_id=$enq_id");

										$res3=$update_img6->execute();

									}
									if($imageData7!='')
									{
										$prodImage7=(!isset($poster_type)?'t-prodImage7-'.$enq_id.'.jpg':'prodImage7-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData7;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage7;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei7   =  '../'.UPLOAD_DIR."thumb/".$prodImage7;
										resizeImage($newDirectory,135,$newfilei7);
										$update_img7=$db->prepare("update $table set sell_letter='$prodImage7' where prod_id=$enq_id");

										$res3=$update_img7->execute();

									}
									if($imageData8!='')
									{
									$prodImage8=(!isset($poster_type)?'t-prodImage8-'.$enq_id.'.jpg':'prodImage8-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData8;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage8;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei8   =  '../'.UPLOAD_DIR."thumb/".$prodImage8;
										resizeImage($newDirectory,135,$newfilei8);
										$update_img8=$db->prepare("update $table set swap_letter='$prodImage8' where prod_id=$enq_id");

										$res3=$update_img8->execute();

									}

								  if($res){
											 $sqlb="select * from soum_prod_subcat where prod_subcat_id=$drpBrand";
											  $resb=$db->query($sqlb);
											  $rowb=$resb->fetch_assoc();
											  $brand=$rowb['prod_subcat_desc'];
											  if($brand=='')
											  $brand=$devicebrand;


										   $sqlm="select * from soum_prod_subsubcat where prod_subsubcat_id=$drpModel";
											  $resm=$db->query($sqlm);
											  $rowm=$resm->fetch_assoc();
											  $model=$rowm['prod_subcat_desc'];
											 if($model=='')
											 $model=$devicemodal;
										if($approve==0){
										    $msg="Thanks $seller_name, for showing your interest for selling '".$brand." ".$model."' . Currently, your add is in moderation.";
										    $message = urlencode($msg);
										}else{
										   $msg='Status for Token Id '.$token.' has been updated to "Approved".  Thank you - Team Soum.';
										   $message = urlencode($msg);
										}


									     sms_api($seller_phone,$message);

/* 										 $admin_mobile ='9829300040';


										 $admin_msg = "$fname, : Customer has added an Ad for selling '".$brand." ".$model."' . Kindly, check backend and do the necessary.";
										 $admin_message = urlencode($admin_msg);
									     $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$admin_mobile."&sms=".$admin_message."&senderid=MYSOUM";
									     $ret = file($url); */
									}

                               $rating = 5;
							   $rname ='admin';
						       $sqlr="insert into soum_product_review (cust_id,name,cust_type, prod_id, rating)values('$admin_id','$rname','$admin','$enq_id','$rating')";

							   $result=$db->query($sqlr);


			echo 1;
	    }
		if($act == "Edit")
		{
							$qty =1;
	                        $sql=$db->prepare("update soum_product_master set titile='$titile',brand='$drpBrand',modal='$drpModel',imei_no='$imi_no',rom='$rom',ram2='$ram',appliable_rate='$offer_price',active=$approve,offer_price='$offer_price',yearbyadmin='$yearbyadmin',condi='$condi',seller_name='$seller_name',seller_email='$seller_email',seller_phone='$seller_phone',color_id='$color_id',seller_address='$seller_address',seller_city='$seller_city',opening_stock='$qty',current_stock='$qty' where prod_id=$prodid");
						    $res=$sql->execute();
						    $enq_id=$prodid;
						/***************Image1************************************/
									if($imageData1!='')
									{
									  $prodImage1=(!isset($poster_type)?'t-prodImage1-'.$enq_id.'.jpg':'prodImage1-'.$enq_id.'.jpg');

   										$oldDirectory = '../'.UPLOAD_DIR.$imageData1;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage1;
									    rename($oldDirectory, $newDirectory);

									    $newfilei1= '../'.UPLOAD_DIR."thumb/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update soum_product_master set images='$prodImage1' where prod_id=$enq_id");
										$res1=$update_img1->execute();
									}
									/*********************Image2*************************************************/
									if($imageData2!='')
									{
									 $prodImage2=(!isset($poster_type)?'t-prodImage2-'.$enq_id.'.jpg':'prodImage2-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData2;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage2;
									    rename($oldDirectory, $newDirectory);
									     $newfilei2= '../'.UPLOAD_DIR."thumb/".$prodImage2;
										resizeImage($newDirectory,135,$newfilei2);
										$update_img2=$db->prepare("update soum_product_master set images1='$prodImage2' where prod_id=$enq_id");

										$res2=$update_img2->execute();									}
									/**********Image3*************************************************************************/
									if($imageData3!='')
									{
									   $prodImage3=(!isset($poster_type)?'t-prodImage3-'.$enq_id.'.jpg':'prodImage3-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData3;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage3;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei3= '../'.UPLOAD_DIR."thumb/".$prodImage3;
										resizeImage($newDirectory,135,$newfilei3);
										$update_img3=$db->prepare("update soum_product_master set images2='$prodImage3' where prod_id=$enq_id");

										$res3=$update_img3->execute();
									}
									/**********Image4*************************************************************************/
						 			if($imageData4!='')
									{
									   $prodImage4=(!isset($poster_type)?'t-prodImage4-'.$enq_id.'.jpg':'prodImage4-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData4;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage4;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei4=   '../'.UPLOAD_DIR."thumb/".$prodImage4;
										resizeImage($newDirectory,135,$newfilei4);
										$update_img4=$db->prepare("update soum_product_master set seller_img='$prodImage4' where prod_id=$enq_id");

										$res3=$update_img4->execute();
									} 
									/**********Image5*************************************************************************/
									if($imageData5!='')
									{

									   $prodImage5=(!isset($poster_type)?'t-prodImage5-'.$enq_id.'.jpg':'prodImage5-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData5;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage5;
									    rename($oldDirectory, $newDirectory);
									     $newfilei5= '../'.UPLOAD_DIR."thumb/".$prodImage5;
										resizeImage($newDirectory,135,$newfilei5);
										$update_img5=$db->prepare("update soum_product_master set bill_img='$prodImage5' where prod_id=$enq_id");

										$res3=$update_img5->execute();
									}
									/**********Image6*************************************************************************/
									if($imageData6!='')
									{
										$prodImage6=(!isset($poster_type)?'t-prodImage6-'.$enq_id.'.jpg':'prodImage6-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData6;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage6;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei6= '../'.UPLOAD_DIR."thumb/".$prodImage6;
										resizeImage($newDirectory,135,$newfilei6);
										$update_img6=$db->prepare("update soum_product_master set add_proof_img='$prodImage6' where prod_id=$enq_id");

										$res3=$update_img6->execute();

									}
									if($imageData7!='')
									{
										$prodImage7=(!isset($poster_type)?'t-prodImage7-'.$enq_id.'.jpg':'prodImage7-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData7;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage7;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei7   =  '../'.UPLOAD_DIR."thumb/".$prodImage7;
										resizeImage($newDirectory,135,$newfilei7);
										$update_img7=$db->prepare("update soum_product_master set sell_letter='$prodImage7' where prod_id=$enq_id");

										$res3=$update_img7->execute();

									}
									if($imageData8!='')
									{
									$prodImage8=(!isset($poster_type)?'t-prodImage8-'.$enq_id.'.jpg':'prodImage8-'.$enq_id.'.jpg');
										$oldDirectory = '../'.UPLOAD_DIR.$imageData8;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage8;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei8   =  '../'.UPLOAD_DIR."thumb/".$prodImage8;
										resizeImage($newDirectory,135,$newfilei8);
										$update_img8=$db->prepare("update soum_product_master set swap_letter='$prodImage8' where prod_id=$enq_id");

										$res3=$update_img8->execute();

									}

 	                              if($res)
									{


									   $sqlb="select * from soum_prod_subcat where prod_subcat_id=$drpBrand";
										  $resb=$db->query($sqlb);
										  $rowb=$resb->fetch_assoc();
										  $brand=$rowb['prod_subcat_desc'];
										  if($brand=='')
										  $brand=$devicebrand;


									   $sqlm="select * from soum_prod_subsubcat where prod_subsubcat_id=$drpModel";
										  $resm=$db->query($sqlm);
										  $rowm=$resm->fetch_assoc();
										  $model=$rowm['prod_subcat_desc'];
										 if($model=='')
										 $model=$devicemodal;

										if($approve==0){
										    $msg="Thanks $seller_name, for showing your interest for selling '".$brand." ".$model."' . Currently, your add is in moderation.";
										    $message = urlencode($msg);
										}else{
										   $msg='Status for Token Id '.$token.' has been updated to "Approved".  Thank you - Team Soum.';
										   $message = urlencode($msg);
										}


									     sms_api($seller_phone,$message);

						/* 				 $admin_mobile ='9829300040';

										 $admin_msg = "$fname, : Customer has added an Ad for selling '".$brand." ".$model."' . Kindly, check backend and do the necessary.";
										 $admin_message = urlencode($admin_msg);
									     $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$admin_mobile."&sms=".$admin_message."&senderid=MYSOUM";
									     $ret = file($url); */



										}

                               $rating = 5;
							   $rname ='admin';
						       $sqlr="insert into soum_product_review (cust_id,name,cust_type, prod_id, rating)values('$admin_id','$rname','$admin','$enq_id','$rating')";

							$result=$db->query($sqlr);

			echo 2;
		}

	/* 	if($act=="Delete")
		{
			$sql="delete from soum_prod_subsubcat where prod_subsubcat_id=$catid";
			$res=$db->query($sql);
			echo 3;

		} */

?>
