<?php
include('config.php');
include('_mail_fire.php');
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
function getLatLong($address){
    if(!empty($address)){
        $formattedAddr = str_replace(' ','+',$address);
        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false');
        $output = json_decode($geocodeFromAddr);
        $data['latitude']  = $output->results[0]->geometry->location->lat;
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
$admin=$_SESSION['poster_type'];
$admin_id=$_SESSION['poster_id'];

$poster_type=$_REQUEST['poster_type'];
$poster_id=$_REQUEST['poster_id'];


$prodid=mysqli_real_escape_string($db,$_REQUEST['prod_id']);
$post_date=date('Y-m-d H:s:i');
$oldphone=2;
$titile=mysqli_real_escape_string($db,$_REQUEST['adtitle']);
$fname=mysqli_real_escape_string($db,$_REQUEST['fname']);
$email=mysqli_real_escape_string($db,$_REQUEST['email']);
$mobile_no=mysqli_real_escape_string($db,$_REQUEST['mobile_no']);
$pwd=mysqli_real_escape_string($db,$_REQUEST['pwd']);
$city=mysqli_real_escape_string($db,$_REQUEST['city']);
$adress=mysqli_real_escape_string($db,$_REQUEST['address']);
$drpBrand=mysqli_real_escape_string($db,$_REQUEST['drpBrand']);
$drpModel=mysqli_real_escape_string($db,$_REQUEST['drpModel']);
if($drpModel=='')
$drpModel=0;
$warranty=$_REQUEST['warranty'];
$txt_year=mysqli_real_escape_string($db,$_REQUEST['year']);
$admin_year=mysqli_real_escape_string($db,$_REQUEST['admin_year']);
$devicecat=mysqli_real_escape_string($db,$_REQUEST['devicecat']);
$imi_no=mysqli_real_escape_string($db,$_REQUEST['imi_no']);
$condition=$_REQUEST['condition'];
$condition2=$_REQUEST['condition2'];
$mrp=mysqli_real_escape_string($db,$_REQUEST['mrp']);
$offer_price=mysqli_real_escape_string($db,$_REQUEST['expected_price']);

$mrom=mysqli_real_escape_string($db,$_REQUEST['mrom']);

$charger=mysqli_real_escape_string($db,$_REQUEST['charger']);
$cable=mysqli_real_escape_string($db,$_REQUEST['cable']);
$box=mysqli_real_escape_string($db,$_REQUEST['box']);
$sim_type=mysqli_real_escape_string($db,$_REQUEST['sim_type']);
$pincode=mysqli_real_escape_string($db,$_REQUEST['pincode']);
$imageData1=mysqli_real_escape_string($db,$_REQUEST['S1']);
$imageData2=mysqli_real_escape_string($db,$_REQUEST['S2']);
$imageData3=mysqli_real_escape_string($db,$_REQUEST['S3']);
$imageData4=mysqli_real_escape_string($db,$_REQUEST['S4']);
$imageData5=mysqli_real_escape_string($db,$_REQUEST['S5']);
$imageData6=mysqli_real_escape_string($db,$_REQUEST['S6']);
$imageData7=mysqli_real_escape_string($db,$_REQUEST['S7']);
$imageData8=mysqli_real_escape_string($db,$_REQUEST['S8']);
$uploadresume1=mysqli_real_escape_string($db,$_FILES['fileToUpload1']['name']);
$uploadresume2=mysqli_real_escape_string($db,$_FILES['fileToUpload2']['name']);
$uploadresume3=mysqli_real_escape_string($db,$_FILES['fileToUpload3']['name']);
$FileUpload2=mysqli_real_escape_string($db,$_REQUEST['FileUpload2']);
$FileUpload3=mysqli_real_escape_string($db,$_REQUEST['FileUpload3']);
$txt_description=mysqli_real_escape_string($db,$_REQUEST['desc']);
$display=mysqli_real_escape_string($db,$_REQUEST['display']);
$battry=mysqli_real_escape_string($db,$_REQUEST['battry']);
$os=mysqli_real_escape_string($db,$_REQUEST['os']);
$process=mysqli_real_escape_string($db,$_REQUEST['process']);
$ram=mysqli_real_escape_string($db,$_REQUEST['ram']);
$rom=mysqli_real_escape_string($db,$_REQUEST['rom']);
$fcame=mysqli_real_escape_string($db,$_REQUEST['fcame']);
$bcame=mysqli_real_escape_string($db,$_REQUEST['bcame']);
$color=mysqli_real_escape_string($db,$_REQUEST['color']);
$source=mysqli_real_escape_string($db,$_REQUEST['source']);
$source_id=mysqli_real_escape_string($db,$_REQUEST['source_name']);
$qty=mysqli_real_escape_string($db,$_REQUEST['qty']);
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

$data=getLatLong($pincode);
$lat=$data["latitude"];
$lng=$data["longitude"];
if(isset($poster_type))
{
   if($poster_type=='Dealer')
    {
		$sql="select * from soum_master_dealer where cust_id=$poster_id";
	}
	else if($poster_type=='Customer')
	{
		$sql="select * from soum_master_customer where cust_id=$poster_id";

	}
	else if($poster_type=='Admin')
	{
	 $sql="select * from soum_master_admin where usr_id=$poster_id";

	}


	$res=$db->query($sql);
	$row=$res->fetch_assoc();
	$rname=$row['fname'];

}






?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include('elements/headcommon.php');?>
</head>
<body>

    <!-- Preloader -->
    <div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>

   <?php include('elements/header.php');?>
  <div class="clearfix"></div>
   <div class="mainhead container">
 	 <div class="clearfix"></div>
       <div class="row">
		<div class="col-sm-12" style="text-align:center;padding-top:40px;">
			<img src="images/thanx.jpg" class="thank-img">
		</div>
						<div class="col-sm-12">
	<?php

                            if($poster_type=='Dealer')
							{
								$sql11=$db->prepare("update soum_master_dealer set email='$email',city='$city',address='$adress' where cust_id='$poster_id'");
								$res2=$sql11->execute();
							}
							if($poster_type=='Customer')
							{
								$sql11=$db->prepare("update soum_master_customer set email='$email',city='$city',address='$adress' where cust_id='$poster_id'");
								$res2=$sql11->execute();

							}

  if($admin=='Admin')
  {
	   if($drpBrand=='' || $drpBrand==0)
	   {
	      $p=1;
		   $sub=$db->prepare("INSERT INTO soum_prod_subcat(prod_subcat_desc,priority1)VALUES (?,?)");
		   $sub->bind_param("si",$devicebrand,$p);
		   $subres=$sub->execute();
		   $drpBrand=mysqli_insert_id($db);

		   /*************************Image7*************************************************************************/
				if($imageData7!='')
				{
					$prodImage7=(!isset($poster_type)?'t-prodImage7-'.$drpBrand.'.jpg':'prodImage7-'.$drpBrand.'.jpg');
					$oldDirectory = "upload/".$imageData7;
				    $newDirectory = "upload/".$prodImage7;
				    rename($oldDirectory, $newDirectory);
                     $newfilei7="upload/c_logo/".$prodImage7;
					resizeImage($newDirectory,135,$newfilei7);
					$update_img7=$db->prepare("update soum_prod_subcat set home_logo='$prodImage7',logo='$prodImage7' where prod_subcat_id=$drpBrand");

					$res3=$update_img7->execute();
				}


	  }

	   if($drpModel=='' || $drpModel=='0')
	   {
		   $ssub=$db->prepare("INSERT INTO soum_prod_subsubcat(prod_subcat_id,prod_subcat_desc,display,battry,os,ram,p_rom,fcame,bcame,colour,sim_type)
		   VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		   $ssub->bind_param("sssssssssss",$drpBrand,$devicemodal,$display,$battry,$os,$ram,$rom,$fcame,$bcame,$color,$sim_type);
		   $ssubres=$ssub->execute();
		   $drpModel=mysqli_insert_id($db);

		   /**********Image8*************************************************************************/
				if($imageData8!='')
				{
					$prodImage8=(!isset($poster_type)?'t-prodImage8-'.$drpBrand.'.jpg':'prodImage8-'.$drpBrand.'.jpg');
					$oldDirectory = "upload/".$imageData8;
				    $newDirectory = "upload/".$prodImage8;
				    rename($oldDirectory, $newDirectory);
                     $newfilei8="upload/thumb/".$prodImage8;
					resizeImage($newDirectory,135,$newfilei8);
					$update_img8=$db->prepare("update soum_prod_subsubcat set p_img1='$prodImage8' where prod_subsubcat_id=$drpModel");
					$res3=$update_img8->execute();
				}

	   }
	 $devicebrand='';
     $devicemodal='';

  }




			        	if($prodid=='')
			        	{


			        	   /*if($admin=='Admin')
							{

									$sql=$db->prepare("insert into soum_product_review (cust_id,name,cust_type, prod_id, rating)values(?,?,?,?,?)");
									$sql->bind_param("sssss",$poster_id,$rname,$poster_type,$prodid,$rating);
									$result=$sql->execute();

							}*/




							 $active=$approve;

							    $condi2='';
								foreach($condition2 as $a=>$b)
								{

								  $condi2=$condi2.$condition2[$a].',';
								}

							   $condi1='';
								foreach($condition as $a=>$b)
								{

								  $condi1=$condi1.$condition[$a].',';
								}

							    $table=(!isset($poster_type)?'soum_product_master_temp':'soum_product_master');
								if($oldphone==2)
								{
								 $s1=1;
								 $s2=1;
									$sql=$db->prepare("insert into $table (post_date,titile,prod_cat_id,rate,brand,modal,other_brand,other_model,year_purchase,yearbyadmin,category,condi,condi2,imei_no,rom,images,images1,images2,Constituent,poster_type,poster_id,active,appliable_rate,offer_price,source,source_id,opening_stock,current_stock,pincode,lat,lng,warranty)
									values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									$sql->bind_param("ssssssssssssssssssssssssssssssss",$post_date,$titile,$oldphone,$mrp,$drpBrand,$drpModel,$devicebrand,$devicemodal,$txt_year,$admin_year,$devicecat,$condi1,$condi2,$imi_no,$mrom,$img1,$img2,$img3,$txt_description,$poster_type,$poster_id,$active,$offer_price,$offer_price,$source,$source_id,$s1,$s2,$pincode,$lat,$lng,$warranty);

								}
								else
								{
									$sql="insert into $table (post_date,titile,prod_cat_id,rate,brand,modal,other_brand,other_model,year_purchase,imei_no,images,images1,images2,Constituent,poster_type,poster_id,active,appliable_rate,offer_price,source,source_id,opening_stock,current_stock,pincode,lat,lng)
									values('$post_date','$titile','$oldphone','$mrp','$drpBrand','$drpModel','$devicebrand','$devicemodal','$txt_year','$imi_no','$FileUpload1','$FileUpload2','$FileUpload3','$txt_description','$poster_type','$poster_id','$active','$offer_price','$offer_price','$source','$source_id','$qty','$qty','$pincode','$lat','$lng')";

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

								    $ofer="<a href='soumadmin/offer_master.php?prod_id=$enq_id'>Do you want make an offer on this product</a>";
								}


								$token1=$db->prepare("update $table set code='$token' where prod_id=$enq_id");
								$rest=$token1->execute();

									/***************Image1************************************/
									if($imageData1!='' && $imageData1!='no_img.png')
									{
									  $prodImage1=(!isset($poster_type)?'t-prodImage1-'.$enq_id.'.jpg':'prodImage1-'.$enq_id.'.jpg');

   										$oldDirectory = "upload/".$imageData1;
									    $newDirectory = "upload/".$prodImage1;
									    rename($oldDirectory, $newDirectory);

									    $newfilei1="upload/thumb/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update $table set images='$prodImage1' where prod_id=$enq_id");
										$res1=$update_img1->execute();
									}
									/*********************Image2*************************************************/
									if($imageData2!='' && $imageData2!='no_img.png')
									{
									 $prodImage2=(!isset($poster_type)?'t-prodImage2-'.$enq_id.'.jpg':'prodImage2-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData2;
									    $newDirectory = "upload/".$prodImage2;
									    rename($oldDirectory, $newDirectory);
									     $newfilei2="upload/thumb/".$prodImage2;
										resizeImage($newDirectory,135,$newfilei2);
										$update_img2=$db->prepare("update $table set images1='$prodImage2' where prod_id=$enq_id");

										$res2=$update_img2->execute();
									}
									/**********Image3*************************************************************************/
									if($imageData3!='' && $imageData3!='no_img.png')
									{
									   $prodImage3=(!isset($poster_type)?'t-prodImage3-'.$enq_id.'.jpg':'prodImage3-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData3;
									    $newDirectory = "upload/".$prodImage3;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei3="upload/thumb/".$prodImage3;
										resizeImage($newDirectory,135,$newfilei3);
										$update_img3=$db->prepare("update $table set images2='$prodImage3' where prod_id=$enq_id");

										$res3=$update_img3->execute();
									}
									/**********Image4*************************************************************************/
									if($imageData4!='' && $imageData4!='no_img.png')
									{
									   $prodImage4=(!isset($poster_type)?'t-prodImage4-'.$enq_id.'.jpg':'prodImage4-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData4;
									    $newDirectory = "upload/".$prodImage4;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei4="upload/thumb/".$prodImage4;
										resizeImage($newDirectory,135,$newfilei4);
										$update_img4=$db->prepare("update $table set seller_img='$prodImage4' where prod_id=$enq_id");

										$res3=$update_img4->execute();
									}
									/**********Image5*************************************************************************/
									if($imageData5!='' && $imageData5!='no_img.png')
									{

									   $prodImage5=(!isset($poster_type)?'t-prodImage5-'.$enq_id.'.jpg':'prodImage5-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData5;
									    $newDirectory = "upload/".$prodImage5;
									    rename($oldDirectory, $newDirectory);
									     $newfilei5="upload/thumb/".$prodImage5;
										resizeImage($newDirectory,135,$newfilei5);
										$update_img5=$db->prepare("update $table set bill_img='$prodImage5' where prod_id=$enq_id");

										$res3=$update_img5->execute();

									}
									/**********Image6*************************************************************************/
									if($imageData6!='' && $imageData6!='no_img.png')
									{
										$prodImage6=(!isset($poster_type)?'t-prodImage6-'.$enq_id.'.jpg':'prodImage6-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData6;
									    $newDirectory = "upload/".$prodImage6;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei6="upload/thumb/".$prodImage6;
										resizeImage($newDirectory,135,$newfilei6);
										$update_img6=$db->prepare("update $table set add_proof_img='$prodImage6' where prod_id=$enq_id");

										$res3=$update_img6->execute();

									}



			                        if(!isset($poster_type))
									{

									   echo "<script>window.location.href='login.php?pageid=form_used.php?prod_id=$enq_id'</script>";


									die();
									}

									if($res)
									{
									    $mailtype=2;
										$mailsubject="SOUM Phone Advertisment";
										$mailtoken=$token;
										$mailto=$email;
										mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);



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

										 $msg="Thanks $fname, for showing your interest for Selling a '".$brand." ".$model."' .Our sales team would contact you within 24 working hours.";
										 $message = urlencode($msg);
									      sms_api($mobile_no,$message);

									     $msg2="Soum portal has received sale request for ".$brand." ".$model;
										 $message2 = urlencode($msg2);
									         sms_api(AdminMob,$message2);


									    echo "<p style='text-align:center;font-size:16px;font-weight:500;margin-top:20px;'>$msg</br></br><a href='index.php' class='theme-btn btn-style-four' style='text-decoration:none;font-size:20px;padding:5px 15px;'>Go to Home</a>";

										}
										else
										{
										?>
										<script>
										alert("Data save faild");
										window.history.back();
									    </script>
										<?php
										}
						}
						else
						{

				    		$sqlr="insert into soum_product_review (cust_id,name,cust_type, prod_id, rating)values('$admin_id','$rname','$admin','$prodid','$rating')";

							$result=$db->query($sqlr);






						       if($oldphone==2)
							  {
							   $qty=1;
							  }
							  else
							  {
							    $qty=$qty;
							  }


							  $condi2='';
							foreach($condition2 as $a=>$b)
							{

							  $condi2=$condi2.$condition2[$a].',';
							}

							$condi1='';
								foreach($condition as $a=>$b)
								{

								  $condi1=$condi1.$condition[$a].',';
								}

							$sql=$db->prepare("update soum_product_master set post_date='$post_date',titile='$titile',rate='$mrp',brand='$drpBrand',modal='$drpModel',year_purchase='$txt_year',imei_no='$imi_no',rom='$mrom',ram2='$ram',Constituent='$txt_description',appliable_rate='$offer_price',offer_price='$offer_price',source='$source',source_id='$source_id',pincode='$pincode',lat='$lat',lng='$lng',opening_stock='$qty',current_stock='$qty',yearbyadmin='$admin_year',category='$devicecat',condi='$condi1',condi2='$condi2',warranty='$warranty',active='$approve',priority='$setp' where prod_id=$prodid");
						    $res=$sql->execute();
						    $enq_id=$prodid;
						/***************Image1************************************/
									if($imageData1!='' && $imageData1!='no_img.png')
									{
									  $prodImage1=(!isset($poster_type)?'t-prodImage1-'.$enq_id.'.jpg':'prodImage1-'.$enq_id.'.jpg');

   										$oldDirectory = "upload/".$imageData1;
									    $newDirectory = "upload/".$prodImage1;
									    rename($oldDirectory, $newDirectory);

									    $newfilei1="upload/thumb/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update soum_product_master set images='$prodImage1' where prod_id=$enq_id");
										$res1=$update_img1->execute();
									}
									/*********************Image2*************************************************/
									if($imageData2!='' && $imageData2!='no_img.png')
									{
									 $prodImage2=(!isset($poster_type)?'t-prodImage2-'.$enq_id.'.jpg':'prodImage2-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData2;
									    $newDirectory = "upload/".$prodImage2;
									    rename($oldDirectory, $newDirectory);
									     $newfilei2="upload/thumb/".$prodImage2;
										resizeImage($newDirectory,135,$newfilei2);
										$update_img2=$db->prepare("update soum_product_master set images1='$prodImage2' where prod_id=$enq_id");

										$res2=$update_img2->execute();									}
									/**********Image3*************************************************************************/
									if($imageData3!='' && $imageData3!='no_img.png')
									{
									   $prodImage3=(!isset($poster_type)?'t-prodImage3-'.$enq_id.'.jpg':'prodImage3-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData3;
									    $newDirectory = "upload/".$prodImage3;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei3="upload/thumb/".$prodImage3;
										resizeImage($newDirectory,135,$newfilei3);
										$update_img3=$db->prepare("update soum_product_master set images2='$prodImage3' where prod_id=$enq_id");

										$res3=$update_img3->execute();
									}
									/**********Image4*************************************************************************/
									if($imageData4!='' && $imageData4!='no_img.png')
									{
									   $prodImage4=(!isset($poster_type)?'t-prodImage4-'.$enq_id.'.jpg':'prodImage4-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData4;
									    $newDirectory = "upload/".$prodImage4;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei4="upload/thumb/".$prodImage4;
										resizeImage($newDirectory,135,$newfilei4);
										$update_img4=$db->prepare("update soum_product_master set seller_img='$prodImage4' where prod_id=$enq_id");

										$res3=$update_img4->execute();
									}
									/**********Image5*************************************************************************/
									if($imageData5!='' && $imageData5!='no_img.png')
									{

									   $prodImage5=(!isset($poster_type)?'t-prodImage5-'.$enq_id.'.jpg':'prodImage5-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData5;
									    $newDirectory = "upload/".$prodImage5;
									    rename($oldDirectory, $newDirectory);
									     $newfilei5="upload/thumb/".$prodImage5;
										resizeImage($newDirectory,135,$newfilei5);
										$update_img5=$db->prepare("update soum_product_master set bill_img='$prodImage5' where prod_id=$enq_id");

										$res3=$update_img5->execute();
									}
									/**********Image6*************************************************************************/
									if($imageData6!='' && $imageData6!='no_img.png')
									{
										$prodImage6=(!isset($poster_type)?'t-prodImage6-'.$enq_id.'.jpg':'prodImage6-'.$enq_id.'.jpg');
										$oldDirectory = "upload/".$imageData6;
									    $newDirectory = "upload/".$prodImage6;
									    rename($oldDirectory, $newDirectory);
                                         $newfilei6="upload/thumb/".$prodImage6;
										resizeImage($newDirectory,135,$newfilei6);
										$update_img6=$db->prepare("update soum_product_master set add_proof_img='$prodImage6' where prod_id=$enq_id");

										$res3=$update_img6->execute();

									}


						    if($res)
						    {
						       if($approve==1)
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

										 $msg="Your '".$brand." ".$model."' is made live on soum. We will update you as soon as we get query for your product.";
										 $message = urlencode($msg);
									     sms_api($mobile_no,$message);


						               // echo $url;


						       }





						         echo '<script>alert("Data update successfully");</script>';

							    if($poster_type=='Customer')
								{
									echo '<script>window.location.href="customer_dashboard.php";</script>';
								}
								else if($poster_type=='Dealer')
								{

						         echo '<script>window.location.href="dealer_dashboard.php";</script>';
								}
                                else if($poster_type=='Admin')
								{

						         echo '<script>window.location.href="soumadmin/dashboard.php";</script>';
								}

						    }



						}
						?>


</div>
</div>
</div>
 <div class="clearfix"></div>
 <?php include('elements/footer.php');?>





</body>
</html>
