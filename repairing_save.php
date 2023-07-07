<?php

include('config.php');

include('_mail_fire.php');

function genverification()
{
    $length =4;
    $characters = "0123456789";
    for ($p = 0; $p < $length; $p++)
    {$string .= $characters[mt_rand(0, strlen($characters)-1)];}
    return $string;
}
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

function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}


$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
$fname=mysqli_real_escape_string($db,$_REQUEST['fname']);
$email=mysqli_real_escape_string($db,$_REQUEST['email']);
$mobile_no=mysqli_real_escape_string($db,$_REQUEST['mobile_no']);
$state=mysqli_real_escape_string($db,$_REQUEST['state']);
//$city=mysqli_real_escape_string($db,$_REQUEST['city']);
$adress=mysqli_real_escape_string($db,$_REQUEST['adress']);
$ptype=$_REQUEST['ptype'];
$drpBrand=mysqli_real_escape_string($db,$_REQUEST['drpBrand']);
$drpModel=mysqli_real_escape_string($db,$_REQUEST['drpModel1']);


if($drpModel == ''){
	$drpModel=mysqli_real_escape_string($db,$_REQUEST['drpModel2']);

}
if($drpModel == ''){
	$drpModel=mysqli_real_escape_string($db,$_REQUEST['drpModel3']);


}
if($drpModel == ''){
	$drpModel=mysqli_real_escape_string($db,$_REQUEST['drpModel4']);

}
if($drpModel == ''){
	$drpModel=mysqli_real_escape_string($db,$_REQUEST['drpModel5']);

}

if($drpModel == ''){
	$drpModel=mysqli_real_escape_string($db,$_REQUEST['drpModel6']);

}


$otherbrand='';//mysqli_real_escape_string($db,$_REQUEST['otherbrand']);
$othermodel='';//mysqli_real_escape_string($db,$_REQUEST['othermodel']);


$txt_description=mysqli_real_escape_string($db,$_REQUEST['description']);
$devicemodal=mysqli_real_escape_string($db,$_REQUEST['devicemodal']);
$uploadresume1=mysqli_real_escape_string($db,$_FILES['fileToUpload1']['name']);
$dt=date("Y-m-d H:i:s");

if($fname=='')
{
  die("Sorry! Something went wrong");
}


if(validate_mobile($mobile_no)==0)
{
  die("Sorry! Something went wrong");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Sorry! Something went wrong");
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include('elements/headcommon.php');?>
</head>
<body>



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
								$sql11=$db->prepare("update soum_master_dealer set email='$email',address='$adress' where cust_id=$poster_id");
								$res2=$sql11->execute();
							}
							if($poster_type=='Customer')
							{
								$sql11=$db->prepare("update soum_master_customer set email='$email',address='$adress' where cust_id=$poster_id");
								$res2=$sql11->execute();

							}


							if($otherbrand!='')
							 $drpBrand=0;

							if($othermodel!='')
							 $drpModel=0;

						$ptype1='';
						foreach($ptype as $a=>$b)
						{

						  $ptype1=$ptype1.$ptype[$a].',';
						}

						//echo "176-".$drpModel;


						$sql = "INSERT INTO soum_phone_repairing (rep_ddtm,fname,email,mobile_no,state,adress,prob_type,brand,modal,other_brand,other_model,description) 
        VALUES ('$dt', '$fname', '$email', '$mobile_no', '$state', '$adress', '$ptype1', '$drpBrand', '$drpModel', '$otherbrand', '$othermodel', '$txt_description')";

     //   echo $sql;
$res = mysqli_query($db, $sql);
$enq_id = mysqli_insert_id($db);



			    //     	  $sql=$db->prepare("insert into soum_phone_repairing(rep_ddtm,fname,email,mobile_no,state,adress,prob_type,brand,modal,other_brand,other_model,description)
							// values(?,?,?,?,?,?,?,?,?,?,?,?)");
							// $sql->bind_param("ssssssssssss",$dt,$fname,$email,$mobile_no,$state,$adress,$ptype1,$drpBrand,$drpModel,$otherbrand,$othermodel,$txt_description);
							// //echo $sql;							
							// $res=$sql->execute();
							// $enq_id=mysqli_insert_id($db);
							$token="RPN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);

							$token1=$db->prepare("update soum_phone_repairing set token_id='$token' where repairing_id=$enq_id");
							$rest=$token1->execute();

							  $sqlb		= "select * from soum_prod_subcat where prod_subcat_id=$drpBrand";
							  $resb 	= $db->query($sqlb);
							  $rowb 	= $resb->fetch_assoc();
							  $brand 	= $rowb['prod_subcat_desc'];
							//  $brand = $drpBrand;


							  // $sqlm="select * from soum_prod_subsubcat where prod_subsubcat_id=$drpModel";
							  // $resm=$db->query($sqlm);
							  // $rowm=$resm->fetch_assoc();
							  // $model=$rowm['prod_subcat_desc']; 

							  $model = $drpModel;


							  if($otherbrand!='') $brand=$otherbrand;
							  if($othermodel!='') $model=$othermodel;


							        $mailtype=5;
									$mailsubject="SOUM Repair Enquiry";
									$mailtoken=$token;
									$mailto=$email;
									mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);

									 $msg="Thank you $fname, for showing your interest for Repairing a '".$model. "' .Our technical team would contact you within 24 working hours. Regards SOUM";
									 $message = urlencode($msg);
								     sms_api($mobile_no,$message,1407163016183339614);

								         $msg2="Dear Admin Soum portal has received repairing request of ".$brand." ".$model;
										 $message2 = urlencode($msg2);
									    sms_api(AdminMob,$message2,1407163016173274274);

								     echo "<p style='text-align:center;font-size:16px;font-weight:500;margin-top:20px;'>$msg</br><a href='index.php' class='theme-btn btn-style-four btn-sm'>Go to Home</a></p>";
							?>
	</div>
</div>
</div>
 <div class="clearfix"></div>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <?php include('elements/footer.php');?>





</body>
</html>
