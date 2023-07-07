<?php
 include('config.php');
 include('_mail_fire.php');
 $layout_title = 'SOUM | Services Online Used Mobile';
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
			        	<p style="text-align:justify;margin-top:10px;">
			        	<?php
			        	$preid=mysqli_real_escape_string($db,$_REQUEST['preid']);
			        	$email=mysqli_real_escape_string($db,$_REQUEST['email']);
			        	$name=mysqli_real_escape_string($db,$_REQUEST['name']);
						$email=mysqli_real_escape_string($db,$_REQUEST['email']);
						$msg=mysqli_real_escape_string($db,$_REQUEST['message']);
						$subject=mysqli_real_escape_string($db,$_REQUEST['subject']);
						$mobile=mysqli_real_escape_string($db,$_REQUEST['mobile']);
						$dt=date('Y-m-d H:s:i');
						$type=mysqli_real_escape_string($db,$_REQUEST['type']);

						if($type=='subcribe')
	                    {
							$sql11="select * from soum_master_customer where email='$email'";
							$res11=$db->query($sql11);
							if(mysqli_num_rows($res11)<=0)
							{
							 $a=1;
							 $sub='yes';
							      $sql12=$db->prepare("insert into soum_master_customer(email,type,subscribe,active)values(?,?,?,?)");
							      $sql12->bind_param("ssss",$email,$type,$sub,$a);
							       $sql12->execute();


							       echo "<div style='text-align:center'><h4>You have been successfully subscribe</h4></br><a href='index.php' class='theme-btn btn-style-four' style='color:#fff;margin:0px 5px;font-size:20px;padding:5px 15px;'>Go To Home</a></div>";


							}
							else
							{
							 echo"<script>alert('This email is already Subscribe'); window.location.href='index.php'</script>";
							}

						}
                       if($type=='Feedback' || $type=='Enquiry' || $type=='Complaint')
                        {

								 $sql13=$db->prepare("insert into soum_feedback(dttm,enquiry_type,fname,email,msg,subject,preid,mobile)values(?,?,?,?,?,?,?,?)");
								 $sql13->bind_param("ssssssss",$dt,$type,$name,$email,$msg,$subject,$preid,$mobile);
								 $res=$sql13->execute();
								 $enq_id=mysqli_insert_id($db);
									$token="FBN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);

									$token1=$db->prepare("update soum_feedback set token_id='$token' where feedback_id=$enq_id");
									$rest=$token1->execute();
								    $mailtype=10;
									$mailsubject="SOUM feedback & ContactUs";
									$mailtoken=$token;
									$mailto=$email;
								//	mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);

							 $msg="Thank you for contacting Soum for enquiry/ feedback.";
							 $message = urlencode($msg);
						      sms_api($mobile,$message);

								 if($res)
								 echo "<div style='text-align:center'><h4>Thank you for contacting Soum for enquiry/ feedback.</h4></br></br><a href='index.php' class='theme-btn btn-style-four' style='color:#fff;margin:0px 5px;font-size:20px;padding:5px 15px;'>Go To Home</a></div>";
		                         else
								 echo "<div style='text-align:center'>Something wrong</br><a href='index.php' class='theme-btn btn-style-four' style='color:#fff;margin:0px 5px;font-size:20px;padding:5px 15px;'>Go To Home</a></div>";

                        }

                        if($type=='PreLaunch')
                        {

						            $brand_id=mysqli_real_escape_string($db,$_REQUEST['brand_id']);
						            $model_name=mysqli_real_escape_string($db,$_REQUEST['model_name']);

							  $sqlb="select * from soum_prod_subcat where prod_subcat_id=$brand_id";
							  $resb=$db->query($sqlb);
							  $rowb=$resb->fetch_assoc();
							  $brand=$rowb['prod_subcat_desc'];


								 $sql13=$db->prepare("insert into soum_feedback(dttm,enquiry_type,fname,email,msg,subject,preid,mobile,brand_id,model_name)values(?,?,?,?,?,?,?,?,?,?)");
								 $sql13->bind_param("ssssssssss",$dt,$type,$name,$email,$msg,$subject,$preid,$mobile,$brand_id,$model_name);
								 $res=$sql13->execute();
								 $enq_id=mysqli_insert_id($db);
									$token="FBN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);

									$token1=$db->prepare("update soum_feedback set token_id='$token' where feedback_id=$enq_id");
									$rest=$token1->execute();
								    $mailtype=10;
									$mailsubject="SOUM feedback & ContactUs";
									$mailtoken=$token;
									$mailto=$email;
								//	mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);

							 $msg = "Thanks for your interest in ".$brand." ".$model_name.". If you are interested in purchasing the mobile, you have to pay advance of Rs 1000.Please click the link for payment: http://p-y.tm/zdlvMtTul";
							 $message = urlencode($msg);
						      sms_api($mobile,$message);

								 if($res)
								 echo "<div style='text-align:center'><h4>Thanks for your interest in $brand $model_name. If you are interested in purchasing the mobile, you have to pay advance of Rs 1000.
			                           Please click the link for payment: <a href='http://p-y.tm/G-s39IY'>http://p-y.tm/zdlvMtTul</a></h4></br></br><a href='index.php' class='theme-btn btn-style-four' style='color:#fff;margin:0px 5px;font-size:20px;padding:5px 15px;'>Go To Home</a></div>";
		                         else
								 echo "<div style='text-align:center'>Something wrong</br><a href='index.php' class='theme-btn btn-style-four' style='color:#fff;margin:0px 5px;font-size:20px;padding:5px 15px;'>Go To Home</a></div>";

                        }


					 ?>

			        	</p>
						</div>


</div>
</div>

 <?php include('elements/footer.php');?>

</body>
</html>
