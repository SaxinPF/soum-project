<?php
include('../config.php');
$type2=$_REQUEST['type'];
$poster_id=$_REQUEST['poster_id'];
$prod_id=$_REQUEST['prod_id'];
$act=$_REQUEST['act'];
$dt=date("Y-m-d H:i:s");
if(isset($_REQUEST['set']))
{
  $pid=$_REQUEST['pid'];
  $pri=$_REQUEST['pri'];
  $gaur=$_REQUEST['gaur'];
  $hotdeal=$_REQUEST['hotdeal'];
  $offer=$_REQUEST['offer_rate'];
  $rate=$_REQUEST['deal_rate'];
  $msg=$_REQUEST['deal_msg'];


  if($gaur==on){ $gaur=1; }else{ $gaur=0;}
  if($hotdeal==on){ $hotdeal=1; }else{ $hotdeal=0;}

  $sql="update soum_product_master set prime_image='$pri',soum_gaur='$gaur',hot_deal='$hotdeal',hot_deal_rate='$rate',hot_deal_message='$msg',appliable_rate='$offer',offer_price='$offer',hot_deal_date='$dt' where prod_id=$pid";
 // echo $sql;
  $res=$db->query($sql);
  if($res)
  {
   header("location:phone_detail.php?prod_id=$pid");
  }
}

if(isset($_REQUEST['sms']))
{
  $mob=$_REQUEST['sms_mob'];
  $desc=$_REQUEST['sms_desc'];
  $pid=$_REQUEST['prod_id1'];
  $ptype=$_REQUEST['ptype'];

       $message = urlencode($desc);
       $ret = sms_api($mob,$message);

  if($ret)
  {
       //$sql="update soum_product_master set active='2' where prod_id=$pid";
       //$res=$db->query($sql);

       $sql="insert into soum_sms_log(smsdt,type,sms_for_id,status,msg)values('$dt','1','$pid','$ptype','$desc')";
       $res=$db->query($sql);

   echo "<script>alert('SMS sent successfully!')</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Materia - Admin Template">
    <meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
    <meta name="author" content="solutionportal">
    <!-- <base href="/"> -->
    <title>Admin Dashboard</title>

    <!-- Icons -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
    <!-- Plugins -->
	<link rel="stylesheet" href="styles/plugins/c3.css">
	<link rel="stylesheet" href="styles/plugins/waves.css">
	<link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">

	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/main.min.css">

 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>
	 <script src="scripts/jquery-1.11.1.min.js"></script>  <![endif]-->
		<link rel="stylesheet" href="../css/etalage.css">
<style>
.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  list-style: none;
  font-size: 14px;
  text-align: left;
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border: 1px solid #eeeeee;
  border-radius: 2px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  background-clip: padding-box;
}
#etalage li img{
	width:auto !important;
}
li img .etalage_small_thumb{
	width:100px !important;
}
.xzoom-container img {
    width: auto !important;
    max-height: 390px;
    max-width: 100%;
    margin: auto;
    float: none;
}
.xzoom-thumbs img{
	width: 100% !important;
	margin: auto;
	float: none;
	max-width: 80px;
	max-height: 80px;
	height: 100%;
}
.xzoom-thumbs {
    text-align: center;
    margin-top: 20px;
    position: absolute;
}
.thumbs-1{
	width: 60px;
	height: 60px;
	float: left;
	padding: 3px;
	border: 2px solid;
	margin-right: 10px;
}
.table-1 td{
	padding:5px;
	border:1px solid#ddd;
}
.auto-style3 {
	background-color: #C0C0C0;
}
</style>

</head>
<body id="app" class="app off-canvas">
	<!-- #Start header -->
		<?php include('_header.php');?>
	<!-- #end header -->
	<!-- main-container -->
	<div class="main-container clearfix">
		<!-- main-navigation -->
		<?php include('_left-menu.php');?>
		<!-- #end main-navigation -->
		<!-- content-here -->
		<div class="content-container" id="content">
			<!-- dashboard page -->
			<div class="page page-dashboard">
				<div class="page-wrap">
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12" style="margin-top:30px;">
							<div class="dash-head clearfix mb20" >
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top:0px;">Phone Details</h3>
									<small>Requested Used Phone Details Approved </small>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> <!-- #end row -->
                       	<?php



							  /*$sql="select temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
								select * from (
								select * from soum_product_master where  prod_id='$poster_id') prod
								left outer join soum_prod_subcat
								on prod.brand=soum_prod_subcat.prod_subcat_id)temp
								left outer join soum_prod_subsubcat
								on temp.modal=soum_prod_subsubcat.prod_subsubcat_id";*/
								$sql="select
			*,soum_prod_subcat.prod_subcat_desc as brand1,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
			if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
			if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
			if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,
			(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating

			from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
			where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
			and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
			and soum_product_master.prod_id=$prod_id";
							  //echo $sql;
							  $res=$db->query($sql);
							  $row=$res->fetch_assoc();

							     $pid=$row['poster_id'];
								$poster_type =  $row['poster_type'];
							      if($row['poster_type']=='Customer')
							      {
								  	$sql1="select * from soum_master_customer where cust_id=$pid";
								  }
								  else if($row['poster_type']=='Dealer')
								  {
								   $sql1="select * from soum_master_dealer where cust_id=$pid";
								  }
								  else
								  {
								     $sql1="select * from soum_master_admin where usr_id=$pid";
								  }
								  //echo $sql1;
								  $res1=$db->query($sql1);
								  $row1=$res1->fetch_assoc();
                                  //echo '<pre>';
								 // print_r($row);

								$name=$row1['fname'];
								$email=$row1['email'];
								$address=$row1['address'];
								$city=$row1['city'];
								$mobile=$row1['mobile'];

								if($row['poster_type']=='Admin'){
								  $name = $row['seller_name'];
								  $email = $row['seller_email'];
								  $address = $row['seller_address'];
								  $city = $row['seller_city'];
								  $mobile = $row['seller_phone'];
								}


								$brand=$row['brand1'];
								$model=$row['prod_subcat_desc'];

								$b=$row['brand'];
								$m=$row['modal'];

								$obrand=$row['other_brand'];
								$omodel=$row['other_model'];

                                $code=$row['code'];

								$rate=$row['offer_price'];
								$cat=$row['prod_cat_id'];
								if($cat==1){ $type='New'; }else{ $type='Used'; }
								$year=$row['yearbyadmin'];
								$acc=$row['condi'];
                                $access=substr($acc,0,strlen($acc)-1);



                                if($row['charger']=='on') $acce=$acce."Charger,";
                                if($row['data_cable']=='on') $acce=$acce."Data cable,";
                                if($row['box']=='on') $acce=$acce."Box,";
                                if($row['bill']=='on') $acce=$acce."Bill";
                                $img1=$row['imagesx'];
                                $img2=$row['images1x'];
                                $img3=$row['images2x'];
                                $rom=$row['p_rom'];
                                $ram=$row['ram2'];

                                $img4=$row['seller_img'];
                                $img5=$row['bill_img'];
                                $img6=$row['add_proof_img'];
                                  $img7=$row['sell_letter'];
                                $img8=$row['swap_letter'];
                                $active=$row['active'];


								if($img1=='' || !file_exists('../upload/'.$img1))
                                 $img1="noimage.png";


								if($img2=='' || !file_exists('../upload/'.$img2))
                                 $img2="noimage.png";

								if($img3=='' || !file_exists('../upload/'.$img3))
                                 $img3="noimage.png";

                                if($img4=='' || !file_exists('../upload/'.$img4))
                                 $img4="noimage.png";

                                 if($img5=='' || !file_exists('../upload/'.$img5))
                                 $img5="noimage.png";

                                 if($img6=='' ||  !file_exists('../upload/'.$img6))
                                 $img6="noimage.png";

                                   if($img7=='' ||  !file_exists('../upload/'.$img7))
                                 $img7="noimage.png";

								   if($img8=='' ||  !file_exists('../upload/'.$img8))
                                 $img8="noimage.png";


                                 $imei=$row['imei_no'];
                                 $prime=$row['prime_image'];
                                 $gaur=$row['soum_gaur'];
                                 $hotdeal=$row['hot_deal'];
                                 $deal_rate=$row['hot_deal_rate'];
                                 $deal_msg=$row['hot_deal_message'];


                                if($access!='')
                                {
	                                 $access=explode(",",$access);
	                                 $access2='';
	                               foreach($access as $a=>$b)
	                                 {
	                                   $sqla="select * from soum_phone_assecc where access_id=$b";
	                                   $resa=$db->query($sqla);
	                                   $row=$resa->fetch_assoc();
	                                   $access2.=$row['access_name'].",";

	                                 }
                                 }



							?>
					<!-- #end row -->
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								<div class="col-sm-6">
		                            <h3 style="width:100%;background: #38b4ee;color: #fff;padding:8px;">Personal Details</h3>
		                            <table style="width:100%;" class="pr-dtl">
		                            	<tr><td style="width:40%">P/O Name</td><td style="width:60%"><?=$name;?></td></tr>
		                            	<tr><td>Email Address</td><td><?=$email;?></td></tr>
		                            	<tr><td>Phone Number</td><td><?=$mobile;?></td></tr>
		                            	<tr><td>Address</td><td><?=$address;?></td></tr>
		                            	<tr><td>City</td><td><?=$city;?></td></tr>
		                            </table>

		                         <?php if($poster_type=='Admin'){ ?>
									 <div class="col-md-3">
		                                <p><small>Bill or Letter head</small></p>
		                            	<a href="zoom.php?prod_id=<?=$prod_id;?>"><img src="../upload/<?=$img6;?>" style="width:100px;height:100px;"></a>
		                            </div>
									<div class="col-md-3">
			                            <p>Seller Identity</p>
			                           <a href="zoom.php?prod_id=<?=$prod_id;?>"><img src="../upload/<?=$img5;?>" style="width:100px;height:100px;"></a>
		                            </div>
									<div class="col-md-3">
			                            <p>Sell letter</p>
			                           <a href="zoom.php?prod_id=<?=$prod_id;?>"><img src="../upload/<?=$img7;?>" style="width:100px;height:100px;"></a>
		                            </div>
									<div class="col-md-3">
			                            <p>Swap letter</p>
			                           <a href="zoom.php?prod_id=<?=$prod_id;?>"><img src="../upload/<?=$img8;?>" style="width:100px;height:100px;"></a>
		                            </div>
                                    <div class="col-md-4">
		                            	<p>Seller Photo</p>
		                            	<a href="zoom.php?prod_id=<?=$prod_id;?>"><img src="../upload/<?=$img4;?>" style="width:100px;height:100px;"></a>
		                            </div>
                                    
									<?php }else{?>
		                            <div class="col-md-4">
		                            	<p>Seller Photo</p>
		                            	<a href="zoom.php?prod_id=<?=$prod_id;?>"><img src="../upload/<?=$img4;?>" style="width:100px;height:100px;"></a>
		                            </div>
		                            <div class="col-md-4">
			                            <p>Seller Identity</p>
			                           <a href="zoom.php?prod_id=<?=$prod_id;?>"><img src="../upload/<?=$img5;?>" style="width:100px;height:100px;"></a>
		                            </div>
		                            <div class="col-md-4">
			                            <p>Copy of Mobile Bill</p>
			                            <a href="zoom.php?prod_id=<?=$prod_id;?>"><img src="../upload/<?=$img6;?>" style="width:100px;height:100px;"></a>
		                            </div>
									<?php } ?>

		                         </div>

		                         <div class="col-sm-6">
		                            <h3 style="width:100%;background: #38b4ee;color: #fff;padding:8px;">Phone Details</h3>
		                            <table style="width:100%;" class="pr-dtl">
		                            	<tr><td style="width:50%">Brand</td><td style="width:50%"><?=$brand;?> <?php if($b==0) { ?>(<?=$obrand;?>)<?php } ?></td></tr>
		                            	<tr><td>Model</td><td><?=$model;?><?php if($m==0) { ?>(<?=$omodel;?>)<?php } ?></td></tr>
		                            	<tr><td>Rom</td><td><?=$rom;?>GB</td></tr>
		                            	<tr><td>Ram</td><td><?=$ram;?>GB</td></tr>
		                            	<tr><td>Expected Price</td><td><?=$rate;?></td></tr>
		                            	<tr><td>IMEI no.</td><td><?=$imei;?></td></tr>
		                            	<tr><td>Purchasing date</td><td><?=$year;?></td></tr>
		                            	<tr><td>Accessories with phone</td><td><?=$access2;?></td></tr>
		                            </table>

		                            </div>


							<div class="col-sm-12" style="min-height:600px; padding-top: 30px;">


						   <?php
						   if($poster_type!='Admin'){
						   if($row['prod_type']=='New'){?>
    									<a class="link" style="width: 100%;background: #000;color: #fff;padding: 10px 49% 10px 48.5%;" href="../form_new.php?prod_id=<?=$prod_id;?>">EDIT</a>
										<?php } else {?>
										<a class="link" style="width: 100%;background: #000;color: #fff;padding: 10px 49% 10px 48.5%;" href="../form_used.php?prod_id=<?=$prod_id;?>">EDIT</a>
										<?php }
						  } ?>

								 <h3 style="width:100%;background: #38b4ee;color: #fff;padding:8px;">Other Details</h3>
								 <div style="width:100%;float:left;margin-bottom:20px;margin-top:20px;">
								 <div class="col-md-5">
								 	<div style="width:100%;float:left;background-color:#f2f2f2;padding:10px;">
						<section id="fancy">
					    <div class="row">
					      <div class="large-5 column">
					        <div class="xzoom-container" style="display: inherit;width: 100%;float: left;text-align:center">
					          <img class="xzoom4" id="xzoom-fancy" src="../upload/<?=$img1;?>" xoriginal="../upload/<?=$img1;?>" style="width:100%"/>
					          <div class="xzoom-thumbs">
					            <a href="../upload/<?=$img1;?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="../upload/<?=$img1;?>"  xpreview="../upload/<?=$img1;?>"></a>
								&nbsp;<?php if($img2!=''){?>
								<a href="../upload/<?=$img2;?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="../upload/<?=$img2;?>"></a>
					            <?php }  if($img3!=''){?>
					            <a href="../upload/<?=$img3;?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="../upload/<?=$img3;?>"></a>&nbsp;
					          <?php } ?>
					          </div>
					        </div>
					      </div>
					      <div class="large-7 column">

					      </div>
					    </div>
					    </section>
						</div>
						</div>
						<div class="col-md-7">
						<button name="Submit1" type="submit" class="btn btn-primary mr5 waves-effect waves-effect" style="float:right;" onclick="$('#sms_div').toggle();">Send SMS</button>
						<div style="display:none;width:100%;float:left;background:#f2f2f2;padding-bottom:10px;" id="sms_div">
						  <div class="col-md-8" style="margin:auto;float:none;">
						   <form method="post">
						   <input name="prod_id1" type="hidden" value="<?=$prod_id;?>"/>
								<div class="col-md-12" style="margin-top:15px;"><input name="sms_mob" value="<?=$mobile;?>" class="form-control" style="border:1px solid#ddd;" type="text"></div>
								<div class="col-md-12" style="margin-top:15px;"><select class="form-control" name="ptype" onchange="prob_type1(this.value)"><option value="0">Bill Copy</option><option value="1">Image not clear</option></select></div>
								<div class="col-md-12" style="margin-top:15px;"><textarea name="sms_desc" id="sms_desc" class="form-control" rows="6" style="border:1px solid#ddd;"></textarea></div>
								<div class="col-md-12" style="margin-top:15px;"><input style="width: 90px;height: 38px;background-color: #eb5310;color: #fff;" name="sms" type="submit" value="Send"></div>
						  </form>
						  </div>
						</div>
						<form method="post" onsubmit="return validateForm()">
						<input name="pid" value="<?=$prod_id;?>" type="hidden"/>
						<div class="col-md-9">
						<h2 style="font-size: 20px;font-weight: bold">Set Priority</h2>
						    <?php if($img1!=''){ ?>
							<div style="width:120px;height:auto;float:left;overflow:hidden;margin-right:15px;text-align:center;">
								<img src="../upload/<?=$img1;?>" style="width:100px;min-height:80px;border:2px solid#ddd;max-height:80px;"><br/>
								<input type="radio" name="pri" value="0" <?php if($prime==0) echo "Checked";?>/>
							</div>
							<?php }
							if($img2!=''){?>
							<div style="width:120px;height:auto;float:left;overflow:hidden;margin-right:15px;text-align:center;">
								<img src="../upload/<?=$img2;?>" style="width:100%;min-height:80px;border:2px solid#ddd;max-height:80px;"><br/>
								<input type="radio" name="pri" value="1" <?php if($prime==1) echo "Checked";?>/>
							</div>
							<?php }
							if($img3!=''){?>
							<div style="width:120px;height:auto;float:left;overflow:hidden;margin-right:15px;text-align:center;">
								<img src="../upload/<?=$img3;?>" style="width:100%;min-height:80px;border:2px solid#ddd;max-height:80px;"><br/>
								<input type="radio" name="pri" value="2" <?php if($prime==2) echo "Checked";?>/>
							</div>
							<?php } ?>
						<div class="col-md-12">
							<label><input type="checkbox" name="gaur" <?php if($gaur==1)echo "Checked";?>/> Check for SOUM Guarantee</label>
						</div>
						<div class="col-md-12">
							<label><input type="checkbox" onclick="ischk()" name="hotdeal" id="hotdeal" <?php if($hotdeal==1)echo "Checked";?>/> Is this phone on deal</label>
						</div>

						</div>
						<div class="col-md-12" id="dealdiv" style="display:none">
                        <div class="col-md-12">
							<label>Offer Rate: </label>
							<input name="offer_rate" id="offer_rate" class="form-control" type="text" value="<?=$rate;?>" style="border:1px solid#ddd;"/>
						</div>
						<div class="col-md-12">
							<label>Higher Rate: </label>
							<input name="deal_rate" id="deal_rate" class="form-control" type="text" value="<?php if($deal_rate=='' || $deal_rate=='0'){ echo $rate;} else{ echo $deal_rate;}?>" style="border:1px solid#ddd;"/>
						</div>
						<div class="col-md-12">
							<label>Offer Text: </label><textarea name="deal_msg"  class="form-control" rows="4" style="border:1px solid#ddd;margin-bottom:15px;"><?=$deal_msg;?></textarea>
						</div>
                        </div>
                        <div class="col-md-12">
                        <input style="width: 90px;height: 38px;background-color: #eb5310;color: #fff;" name="set" value="Set" type="submit"/>
                        </div>
						</form>


						<div class="col-md-12">
							<table style="width:100%;float:left;margin-top: 15px;" class="table-1">
								<tr>
								<td class="auto-style3">#</td>
								<td class="auto-style3">Date</td>
								<td class="auto-style3">Msg</td>
								</tr>
								<?php
								$sql="select * from soum_sms_log where sms_for_id=$prod_id and type=1 order by sms_id desc";
								//echo $sql;
								$res=$db->query($sql);
								$i=1;
								while($row=$res->fetch_assoc())
								{

								$originalDate=$row['smsdt'];
                                $dt=date("d-m-Y h:i A", strtotime($originalDate));
								?>
								<tr>
								<td><?=$i++;?></td>
								<td><?=$dt;?></td>
								<td><?=$row['msg'];?></td>
								</tr>
								<?php } ?>
							</table>
						</div>

						</div>

						</div>

								 <!--<div class="clearfix left col-md-12" style="margin-top:100px;float:left;display:one">
								 <a href="http://www.soum.co.in/form_used.php?prod_id=<?=$prod_id;?>"><button class="btn btn-primary mr5 waves-effect" type="button" >Edit</button></a>
								</div>-->
							</div>


							</div>
						</div>
					</div>
					<!-- row -->
					 <!-- #end row -->
				</div> <!-- #end page-wrap -->
			</div>
			<!-- #end dashboard page -->
		</div>
	</div> <!-- #end main-container -->
	<!-- theme settings -->
	<div class="site-settings clearfix hidden-xs">
		<div class="settings clearfix">
			<div class="trigger ion ion-settings left"></div>
			<div class="wrapper left">
				<ul class="list-unstyled other-settings">
					<li class="clearfix mb10">
						<div class="left small">av Horizontal</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox" id="navHorizontal">
								<span>&nbsp;</span>
							</label>
						</div>


					</li>
					<li class="clearfix mb10">
						<div class="left small">Fixed Header</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="fixedHeader">
								<span>&nbsp;</span>
							</label>
						</div>
					</li>
					<li class="clearfix mb10">
						<div class="left small">av Full</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="navFull">
								<span>&nbsp;</span>
							</label>
						</div>
					</li>
				</ul>
				<hr/>
				<ul class="themes list-unstyled" id="themeColor">
					<li data-theme="theme-zero" class="active"></li>
					<li data-theme="theme-one"></li>
					<li data-theme="theme-two"></li>
					<li data-theme="theme-three"></li>
					<li data-theme="theme-four"></li>
					<li data-theme="theme-five"></li>
					<li data-theme="theme-six"></li>
					<li data-theme="theme-seven"></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- #end theme settings -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script>

 $(document).ready(function(){

  var hd="<?=$hotdeal;?>";

    if(hd==1)
    {
    $('#dealdiv').show();
    }
 });

 function validateForm()
 {
   var offer=$("#offer_rate").val();
   var deal=$("#deal_rate").val();
   //alert(offer+"|"+deal);
   if(deal<=offer)
   {
    //alert('Higher rate must be higher offer rate');
    /return false;
   }

 }





 </script>

	<!-- Dev only -->
	<!-- Vendors -->
	<script type="text/javascript" src="../js/megamenu.js"></script>
	<script src="scripts/vendors.js"></script>
	<script src="scripts/plugins/d3.min.js"></script>
	<script src="scripts/plugins/c3.min.js"></script>
	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/plugins/jquery.sparkline.min.js"></script>
	<script src="scripts/plugins/jquery.easypiechart.min.js"></script>
	<script src="scripts/plugins/bootstrap-rating.min.js"></script>
	<script src="scripts/app.js"></script>
	<script src="scripts/index.init.js"></script>
	<script src="../js/jquery.etalage.min.js"></script>
<script>
	jQuery(document).ready(function($){
		$('#etalage').etalage({
			thumb_image_width: 320,
			thumb_image_height: 280,
			source_image_width: 700,
			source_image_height: 600,
			show_hint: true,
			click_callback: function(image_anchor, instance_id){
				alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
			}
		});
	});
</script>
<script>
function prob_type1(val)
 {
 // alert(val);
   var name='<?=$name;?>';
   if(val==0)
   {
    $("#sms_desc").val('Dear '+name+', pls upload original bill copy of your phone or whatapp us on 9829300040. For any further enquiry please contact us on 9828075008.');
   }
   else
   {
     $("#sms_desc").val('Dear '+name+',  the image of your phone  seems not real /clear. Therefore please provide actual /clear images of your device or whatapp us on 9829300040. For any further enquiry please contact us on 9828075008.');
   }

 }
function ischk(val)
{

  if ($('#hotdeal').is(':checked'))
    {
       $('#dealdiv').show();
    }
    else
    {
       $('#dealdiv').hide();
    }

}
</script>

<script src="../zoom/setup.js"></script>
<script type="text/javascript" src="../zoom/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="../zoom/xzoom.css" media="all" />
</body>
</html>
