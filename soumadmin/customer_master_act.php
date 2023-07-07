<script src="scripts/jquery.min.js"></script>
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
    $dt=date('Y-m-d H:s:i');
    $poster_type=$_SESSION['poster_type'];
    $poster_id=$_REQUEST['poster_id'];
    $act=$_REQUEST['act'];
	$name=$_REQUEST['name1'];
	$email=$_REQUEST['email'];
	$profession=$_REQUEST['profession'];
	$address=mysqli_real_escape_string($db,$_REQUEST['address']);
	$city=mysqli_real_escape_string($db,$_REQUEST['city']);
	$mobile=$_REQUEST['mobile'];
	$pincod=$_REQUEST['pincod'];
	$pwd=$_REQUEST['pwd'];
	$dob=$_REQUEST['ddob']."-".$_REQUEST['mdob']."-2017";
	$doa=$_REQUEST['ddoa']."-".$_REQUEST['mdoa']."-2017";
	$dob = date("Y-m-d", strtotime($dob));
	$doa = date("Y-m-d", strtotime($doa));

	$ohc=$_REQUEST['ohc'];

	$pid=$_REQUEST['prod_id'];
	$pname=$_REQUEST['prod_name'];
	$amt=$_REQUEST['amt'];
	$active=$_REQUEST['active2'];
	$nosms=$_REQUEST['nosms'];
    $exc_name=$_REQUEST['exc_name'];
	$exc_price=$_REQUEST['exc_amt'];
    $ptype=$_REQUEST['isnew'];
    $review=$_REQUEST['review'];
    $imageData1=$_REQUEST['S1'];
    $imageData2=$_REQUEST['S2'];
    $reg_dt=date('Y-m-d H:i:s');

     if($ptype=='on')
     {
	      $oldphone=1;
	      $otype='new';
     }
     else
     {
	      $oldphone=2;
	       $otype='used';
     }

       if($act == "add")
		{
		     $mob="select * from soum_master_customer where mobile='$mobile'";
			 $resm=$db->query($mob);
			 if(mysqli_num_rows($resm)>0)
			 {
			   echo '<script>alert("This number allready register"); window.location.href="customer_master.php";</script>';
			   die();
			 }

        $a = 1;
    	    $cust_type="Customer";
			$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,email,address,city,mobile,pincod,user_pass,dob,doa,user_review,our_happy_client,active)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$sql->bind_param("ssssssssssssss",$reg_dt,$cust_type,$name,$email,$address,$city,$mobile,$pincod,$pwd,$dob,$doa,$review,$ohc,$a);
			//echo $sql;
			//die("hello");

				$res=$sql->execute();
				$enq_id=mysqli_insert_id($db);
				$token="CRN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);

				$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");
				$rest=$token1->execute();
		            if($res)
		            {
		                 $msg="Thanks ".$name." for choosing Soum for all kind of your Mobile requirement.";
						 $message = urlencode($msg);
					      sms_api($mobile,$message);


						        /***************Image1************************************/
									if($imageData1!='')
									{
									    $prodImage1='Customer_profile'.$enq_id.'.jpg';
   										$table='soum_master_customer';

   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/profile/".$prodImage1;
									    rename($oldDirectory, $newDirectory);

									    $newfilei1="../upload/profile/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update $table set image='$prodImage1' where cust_id=$enq_id");
										$res1=$update_img1->execute();
									}

						          /***************Image2************************************/
									if($imageData2!='')
									{
									    $prodImage2='Customer_identity'.$enq_id.'.jpg';
   										$table='soum_master_customer';

   										$oldDirectory = "../upload/temp/".$imageData2;
									    $newDirectory = "../upload/profile/".$prodImage2;
									    rename($oldDirectory, $newDirectory);


   										$update_img1=$db->prepare("update $table set identity='$prodImage2' where cust_id=$enq_id");
										$res1=$update_img1->execute();
									}





		                        $cust_id=$enq_id;
					            if($active=="on")
					            {


					            $qry=$db->prepare("insert into soum_order_master (order_date,order_type,cust_id,cust_type, fname, mail, mobile,shipping_address,active,exc_prod_amt,status)
									  values(?,?,?,?,?,?,?,?,?,?,?,?)");
									  $qry->bind_param("ssssssssssss",$dt,$otype,$cust_id,Customer,$fname, $mail, $mobile, $address,1,$exc_name,$exc_price,3);
								$res=$qry->execute();

								$ord_id=mysqli_insert_id($db);
								$token="ORD".str_pad ($ord_id,4,'0', STR_PAD_LEFT);

								$token1=$db->prepare("update soum_order_master set order_token='$token' where order_id=$ord_id");
								$rest=$token1->execute();

								if($pid!='')
								{

									 $stock="select * from soum_product_master where prod_id=$pid";
									 $ress=$db->query($stock);
									 $rows=$ress->fetch_assoc();
									 $cstock=$rows['current_stock'];

									$totstock=$cstock-$quantity;

									$upd_stock=$db->prepare("update soum_product_master set current_stock=$totstock where prod_id=$pid ");
									$res=$upd_stock->execute();

								}

								$sql=$db->prepare("insert into soum_order_details (order_id,prod_id,prod_name,qty,price)
								 values(?,?,?,?,?)");
								 $sql->bind_param("sssss",$ord_id,$pid,$pname,1,$amt);
								$result=$sql->execute();
								if($result)
								{
								   if($nosms=="on")
					            	{

								        $mailtype=4;
										$mailsubject="SOUM Order Details";
										$mailtoken=$token;
										$mailto=$email;
										mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);
									   $message = urlencode("Thanks for buying from Smart Solutions. We will be updating you for offers. Please visit us at SOUM");
								       $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mobile."&sms=".$message."&senderid=MYSOUM";
								       //$ret = file($url);
								       ?>
									        <script>
										       $(document).ready(function(){
										         url1='<?=$url;?>';
												    $.ajax({
												            type:'POST',
												            url:url1,
												            success:function(s)
												            {

												            },
														      error: function(jqXHR, textStatus, errorThrown){
																	alert("Data Update successfully"); window.location.href="customer_master.php";
														      }
												    });
												});


										    </script>
		                               <?php


									}
									else
									{
									   echo '<script>alert("Data Save successfully"); window.location.href="customer_master.php";</script>';
								    }
								}

					}
					else
					{
					   echo '<script>alert("Data Save successfully"); window.location.href="customer_master.php";</script>';
				    }

			        }

	    }
		if($act == "edit")
		{
			//25/11/1922=>2017-04-17
			//$dob=substr($dob,6,4)."-".substr($dob,3,2)."-".substr($dob,0,2);
			//$doa=substr($doa,6,4)."-".substr($doa,3,2)."-".substr($doa,0,2);
             $mob="select * from soum_master_customer where mobile='$mobile'";
			 $resm=$db->query($mob);
			 if(mysqli_num_rows($resm)>0)
			 {
			   //echo '<script>alert("This number allready register"); window.location.href="customer_master.php";</script>';
			   //die();
			 }

	          	$sql=$db->prepare("update soum_master_customer set fname='$name',email='$email',address='$address',city='$city',mobile='$mobile',pincod='$pincod',user_pass='$pwd',dob='$dob',doa='$doa',user_review='$review',our_happy_client='$ohc',profession ='$profession' where cust_id=$poster_id");
				$res=$sql->execute();

				$enq_id=$poster_id;

		            if($res)
		            {


		               /***************Image1************************************/
									if($imageData1!='')
									{
									    $prodImage1='Customer_profile'.$enq_id.'.jpg';
   										$table='soum_master_customer';

   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/profile/".$prodImage1;
									    rename($oldDirectory, $newDirectory);

									    $newfilei1="../upload/profile/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update $table set image='$prodImage1' where cust_id=$enq_id");
										$res1=$update_img1->execute();

									}

		            /***************Image1************************************/
									if($imageData2!='')
									{
									    $prodImage2='Customer_identity'.$enq_id.'.jpg';
   										$table='soum_master_customer';

   										$oldDirectory = "../upload/temp/".$imageData2;
									    $newDirectory = "../upload/profile/".$prodImage2;
									    rename($oldDirectory, $newDirectory);


   										$update_img1=$db->prepare("update $table set identity='$prodImage2' where cust_id=$enq_id");
										$res1=$update_img1->execute();
									}


					            $cust_id=$poster_id;
                                
                                    		//shoot wala hai
								$mmssg = 'Thanks for being a valuable customer. We go beyond limits to serve you. It would be nice to hear from you. Please click the link below and share your feedback. http://bit.ly/2GQxFZw';
								$messagee2 = urlencode($mmssg);
								$ret = sms_api($mobile,$messagee2);
								//shoot wala hai
                                
					            if($active=="on")
					            {



								            $qry=$db->prepare("insert into soum_order_master (order_date,order_type,cust_id,cust_type, fname, mail, mobile,shipping_address,active,exc_prod,exc_prod_amt,status)
												  values(?,?,?,?,?,?,?,?,?,?,?,?)");
												 $qry->bind_param("ssssssssssss", $dt,$otype,$cust_id,Customer,$fname, $mail, $mobile, $address,1,$exc_name,$exc_price,3);
											$res=$qry->execute();											$ord_id=mysqli_insert_id($db);
											$token="ORD".str_pad ($ord_id,4,'0', STR_PAD_LEFT);
											$token1=$db->prepare("update soum_order_master set order_token='$token' where order_id=$ord_id");
											$rest=$token1->execute();
											if($pid!='')
											{

												 $stock="select * from soum_product_master where prod_id=$pid";
												 $ress=$db->query($stock);
												 $rows=$ress->fetch_assoc();
												 $cstock=$rows['current_stock'];

												$totstock=$cstock-$quantity;

												$upd_stock=$db->prepare("update soum_product_master set current_stock=$totstock where prod_id=$pid ");
												$res=$upd_stock->execute();;

											}

											$sql=$db->prepare("insert into soum_order_details(order_id,prod_id,prod_name,qty,price)
											 values(?,?,?,?,?)");
											$sql->bind_param("sssss", $ord_id,$pid,$pname,1,$amt);
											$result=$sql->execute();

											if($result)
											{
												if($nosms=="on")
					            				{

											        $mailtype=4;
													$mailsubject="SOUM Order Details";
													$mailtoken=$token;
													$mailto=$email;
													mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);

											   $message = urlencode("Thanks for buying from Smart Solutions. We will be updating you for offers. Please visit us at SOUM");
										       $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mobile."&sms=".$message."&senderid=MYSOUM";
										       //echo $url;
										       //$ret = file($url);
										       ?>
										        <script>
											       $(document).ready(function(){
											         url1='<?=$url;?>';
													    $.ajax({
													            type:'POST',
													            url:url1,
													            success:function(s)
													            {

													            },
														      error: function(jqXHR, textStatus, errorThrown){
																	alert("Data Update successfully"); window.location.href="customer_master.php";
														      }
													    });
													});


											    </script>
			                                <?php
											}
											 else
											{
											  echo '<script>alert("Data has been Update & SMS sent successfuly"); window.location.href="customer_master.php";</script>';

											}
										}


									}
	                                else
									{
									  echo '<script>alert("Data has been Update & SMS sent successfuly"); window.location.href="customer_master.php";</script>';
									}

								    //echo '<script>alert("Data Update successfully"); window.location.href="customer_master.php";</script>';


			        }


		}

		if($act == "del")
		{
			$sql="delete from soum_master_customer where cust_id=$poster_id";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="customer_master.php";
				    </script>
				    <?php

			        }

		}




?>
