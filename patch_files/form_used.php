<?php include('config.php');
//$poster_id=$_SESSION['poster_id'];
//$poster_type=$_SESSION['poster_type'];
//$prod_id=$_REQUEST['prod_id'];
$prod_id=mysqli_real_escape_string($db,$_REQUEST['prod_id']);
$poster_id=mysqli_real_escape_string($db,$_SESSION['poster_id']);
$poster_type=mysqli_real_escape_string($db,$_SESSION['poster_type']);

$image1='';
$image2='';
$image3='';
$image4='';
$image5='';
$image6='';

if(isset($prod_id))
{
	/** BOF Security Patch IS-002*/
	$sqld=$db->prepare("select *,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc as model_name,soum_product_master.warranty warr from soum_product_master,soum_prod_subcat,soum_prod_subsubcat where
	soum_product_master.brand=soum_prod_subcat.prod_subcat_id
	and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
	and  prod_id=?
	and prod_cat_id=2");
    $sqld->bind_param('i', $prod_id);
    $sqld->execute();		  
    $resd=$sqld->get_result();
	/** EOF Security Patch IS-002*/
	
	/*$sqld="select *,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc as model_name,soum_product_master.warranty warr from soum_product_master,soum_prod_subcat,soum_prod_subsubcat where
	soum_product_master.brand=soum_prod_subcat.prod_subcat_id
	and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
	and  prod_id=$prod_id
	and prod_cat_id=2";
	$resd=$db->query($sqld);*/

	$rowd=$resd->fetch_assoc();
	$title=$rowd['titile'];
	$brand=$rowd['brand'];
	$modal=$rowd['modal'];
	$brand_name=$rowd['brand_name'];
	$model_name=$rowd['model_name'];
	
	$poster_id=$rowd['poster_id'];
    $poster_type=$rowd['poster_type'];
	
	$other_brand=$rowd['other_brand'];
	$other_model=$rowd['other_model'];
	$desc=$rowd['Constituent'];
	$mrp=$rowd['rate'];
	$eprice=$rowd['appliable_rate'];
	$offerp=$rowd['offer_price'];
	$warranty=$rowd['warr'];
	$year=$rowd['year_purchase'];
	$admin_year=$rowd['yearbyadmin'];
    $cat=$rowd['category'];
	$emi=$rowd['imei_no'];
	$mrom=$rowd['rom'];
	$condi=$rowd['condi'];
	$condi2=$rowd['condi2'];
	$sourceid=$rowd['source_id'];
	$image1=$rowd['images'];
	$image2=$rowd['images1'];
	$image3=$rowd['images2'];
	$image4=$rowd['seller_img'];
	$image5=$rowd['bill_img'];
	$image6=$rowd['add_proof_img'];
	
	

	$lat=$rowd['lat'];
    $lng=$rowd['lng'];
    $pin=$rowd['pincode'];
    $active=$rowd['active'];
	$setp=$rowd['priority'];
}

if($image1=='')
	{ 
	  $image1='no_img.png';
	}
	if($image2=='')
	{ 
	  $image2='no_img.png';
	}
    if($image3=='')
	{ 
	  $image3='no_img.png';
	}
    if($image4=='')
	{ 
	  $image4='no_img.png';
	}
    if($image5=='')
	{ 
	  $image5='no_img.png';
	}
    if($image6=='')
	{ 
	  $image6='no_img.png';
	}
if($poster_type!='')
{
	
	if($poster_type=='Admin')
	{
	 $sql="select * from soum_master_admin where usr_id=1";
	
	}	
	else if($poster_type=='Customer')
	{
	 $sql="select * from soum_master_customer where cust_id=$poster_id";
	
	}
	else if($poster_type=='Dealer')
	{
	 $sql="select * from soum_master_dealer where cust_id=$poster_id";
	
	}


	
	//echo $sql;
	//die();
	$res=$db->query($sql);
	$row=$res->fetch_assoc();
	
	$name=$row['fname'];
	$email=$row['email'];
	$address=$row['address'];
	$city=$row['city'];
	$mobile=$row['mobile'];
	$pincod=$row['pincod'];
}
//echo "<script>alert(".$warranty.");</script>";
//echo $poster_type."a";
     //die();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SOUM | Services Online Used Mobile</title>
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/bootstrap-margin-padding.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet"`>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<link href="css/multi_level_form_css.css" rel="stylesheet" type="text/css"/>
<style>
.table-shopping-cart td {
	border:1px solid#ddd;
	padding:10px;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-top:0px;
    font-weight: 700;
}
.remove-img{
position: absolute;
top: -5px;
right: 0;
z-index: 9999;
background: #303030;
width: 12px;
height: 20px;
border: 1px solid #000;
color: #fff !important;
padding: 0px;
margin: 0px;
}
.select-wrapper {
  /*background: #dcf9ff url('images/plus-icon.png') no-repeat;*/
  background:rgba(220, 249, 255, 0.2) url('images/plus-icon.png') no-repeat;
  background-size:31px 30px;
  background-position:center center;
	display: block;
	position: relative;
	width: 100% !important;
	height: 80px;
	border: 1px dashed#ababab;
	position:relative;
	z-index: 9;
}
#select-img1 {
    background-repeat: no-repeat;
    background-size: auto 100%;
    background-position: center center;
    position: absolute;
	width:100%;
    /*
    width: 50px;
    height: 63px;
    right: 10px;
    top: 8%;*/
    overflow:hidden;
}
.select-img1 {
    background-repeat: no-repeat;
    background-size: auto 100%;
    background-position: center center;
    position: absolute;
	width:100%;
    /*
    width: 50px;
    height: 63px;
    right: 10px;
    top: 8%;*/
    overflow:hidden;
}
#fileToUpload4{
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload5{
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload6{
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload7{
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload8{
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload1 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload2 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload3 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#info-bg{
	color:#FF6600;font-size:34px;	
}
.form-control {
    display: block;
    width: 100%;
    height: 37px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ababab;
    border-radius: 2px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.bg-3{
    background-color: #484848 ;
	border: 2px solid #484848 !important;
	font-size: 15px !important;
	padding: 5px 15px !important;
	text-transform: unset !important;
	float: left inherit !important;
	left: auto;
	right: auto;
	top: auto;
}
.bg-3:hover{
	background-color:#fff !important;
}
.cat-imagebox, .frame-round {
  background: #fff;
  border: 2px solid #000;
  display: inline-block;
  vertical-align: top;
  padding: 10px;
  height: 64px;
  margin-right: .5em;
  margin-bottom: .3em;
	width:91px;
	float: left;
	margin-right:6px;
	margin-bottom: 15px;
	border: 1px solid #b3b3b3;
background: #fff;
box-shadow: 3px 3px 3px -4px;
}
.frame-round {
  border-radius: 50%;
  overflow: hidden;
}
.frame-round .crop {
  border-radius: 50%;
}
.crop {
  height: 100%;
  overflow: hidden;
  position: relative;
}
/*.crop img {
  display: block;
  min-width: 100%;
  min-height: 100%;
  margin: auto;
  position: absolute;
  top: -100%;
  right: -100%;
  bottom: -100%;
  left: -100%;
}*/
.crop img {
    display: block;
    min-width: 100%;
 	min-height: 100%;
    max-width: 100%;
    max-height: 100%;
    margin: auto;
    position: absolute;
    top: -100%;
    right: -100%;
    bottom: -100%;
    left: -100%;
}
.retina .crop img {
  transform: scale(0.5, 0.5);
}
small {
  display: block;
  font-weight: normal;
  opacity: .8;
}
.box-img{
	width:31%;
	float:left;
	margin-right:1%;
	overflow: hidden !important;
	position: relative;

}
.bkg-tab{
    background-color: #fff;
    padding: 6px 14px;
    color: #000;
    border-radius: 5px 5px 0px 0px;
    box-shadow: 3px 3px 3px -4px;
    font-weight: bold;
    margin-right:5px;
}
.check-select{
	float:right;position:relative;display:none;
}
.check-select1{
	float: right;
    position: relative;
    display: block;
    top: 0px;
    margin: 0px;
    position: absolute;
    left: 7px;
    font-size: 18px;
    }
@media(max-width:580px){
	#progressbar li.active::before, #progressbar li.active::after {margin-right:36px !important;}
	.mobile-align{
	text-align: left;
	padding-left: 30px;
	margin-top: -5px;
}
}
</style>
</head>
<script>
 function tab_click(val)
  {
  
  	if(val==1)
  	{
			$("#button"+val).css("background-color","#e92438");
			$("#button"+val).css("color","#fff");
			
			$(".d").hide();$("#d1").show();  	   		
  	
  	}

  
  	if(val==2)
  	{
  	   if(valid1())
  	   {
			$("#button"+val).css("background-color","#e92438");
			$("#button"+val).css("color","#fff");
			$("#st2").addClass("active");
			$(".d").hide();$("#d2").show();
  	   		
  	   }
  	
  	}
	if(val==3)
  	{
  	   if(valid2())
  	   {
  	      $("#button"+val).css("background-color","#e92438");
  	      $("#button"+val).css("color","#fff");
  	      $("#st3").addClass("active");
		 $(".d").hide();$("#d3").show();  
		 $("#used")[0].click();
			location.href = "#";
			location.href = "#used";

         		      
  	   
  	   }
  	
  	}
	if(val==4)
  	{
  	   if(valid3())
  	   {
			$("#button"+val).css("background-color","#e92438");
			$("#button"+val).css("color","#fff");
			$("#st4").addClass("active");
			$(".d").hide();$("#d4").show();  	      
   			location.href = "#";
			location.href = "#used";

  	        }
  	
  	}
  	
  		
  } 
  

</script>

<body>
<div class="page-wrapper" style="background:#f7f7f7">
 	
    <!-- Preloader -->
    <div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
    
 	<header class="header-style-two">
		<?php include('_header.php');?>        
    </header>
    <!-- Main Header -->
    
    <!--End Main Header -->
    
    
    <!--Feature Section-->
<section class="welcome-section" id="bottom-70">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="row">
				
				<div class="column col-md-12 col-sm-12 col-xs-12" id="mobile-title"><a name="used" id="used"></a>
                    <h1 style="line-height: 1;margin-top: 8px;text-align:center;" class="mobile-des1">SELL YOUR <span style="color:#000;font-weight: 800;">USED MOBILE</span> PHONES</h1>
                    <h3 style="font-family: inherit;" class="mobile-des2">IN EASY STEPS</h3>
                    
                    <div id="mobile-des9">
	                  <ul id="progressbar">
						    <li class="active" onclick="tab_click(1)"><span style="margin-right:33px;">Step1</span></li>
						    <li id="st2" onclick="tab_click(2)"><span style="margin-right:15px;">Step2</span></li>
						    <li id="st3" onclick="tab_click(3)"><span style="margin-right:15px;">Step3</span> <a name="used">&nbsp;</a></li>
						    <li id="st4" onclick="tab_click(4)"><span style="margin-right:15px;">Step4</span> <a name="used">&nbsp;</a></li>
					  </ul>
					 </div>
                </div>
                
                 <form name="myForm" onsubmit="return valid4()" method="post" action="submit_ad_save.php">
				   <input name="drpBrand" id="drpBrand" value="<?=$brand;?>" type="hidden" />
                   <input name="drpModel" id="drpModel" value="<?=$modal;?>" type="hidden" />
                   <input name="poster_id" id="poster_id" value="<?=$poster_id;?>" type="hidden" />
                    <input name="poster_type" id="poster_type" value="<?=$poster_type;?>" type="hidden" />
                    <input name="prod_id" id="prod_id" value="<?=$prod_id;?>" type="hidden" />

                 <div class="col-md-12">
                 	<div style="width:100%;float:left;border-bottom: 2px solid #e92438;" id="remove1">
						<input name="Button1"  class="bkg-tab" style="background:#e92438;color:#fff;" type="button" value="Choose Your Brand" id="button1" onclick="tab_click(1)">
						<input name="Button2"  class="bkg-tab" type="button" value="Choose Your Model" id="button2" onclick="tab_click(2)">
						<input name="Button3"  class="bkg-tab" type="button" value="Add Mobile(s)" id="button3" onclick="tab_click(3)">
						<input name="Button4"  class="bkg-tab" type="button" value="Seller Information" id="button4" onclick="tab_click(4)">
					</div>
					<div style="width:100%;float:left;background: #fff;box-shadow: 1px 2px 6px -3px;border-bottom: 1px solid #ddd;min-height: 290px;">			
					<div id="d1" class ="d">
					<div class="clearfix" id="mobile-des6">
									<div class="clearfix">
										<h2 style="margin:0px;padding:0px;font-weight: 500;font-size: 26px;" id="other">Want to Sell Your Used Phone - Choose Your Brand Below</h2>
										<p id="remove1">Selling your used smart phone is just a few clicks away. Just click on the brand you own and select the model to find the best price quote instantly</p>
										<div class="col-md-12" id="mobile-des8">
										
										
										<p id="mobile-des7">Choose Your Brand Below</p>
										<div id="branddiv1">
										<?php
											$sql="select * from soum_prod_subcat order by prod_subcat_id desc";
											$res=$db->query($sql);
											while($row=$res->fetch_assoc())
											{
												$prod_subcat=$row['prod_subcat_desc'];
												$prod_subcat_id=$row['prod_subcat_id'];					
												$img=$row['home_logo'];					
											?>
											<div class="cat-imagebox"  onclick="fill2(<?=$prod_subcat_id;?>);" style="position:relative;">
											<div id="brand<?=$prod_subcat_id;?>" class="check-select"><i class="fa fa-check-square-o" aria-hidden="true" style="right: 0;color: red;font-size: 15px;top: 1px;left: -5px;position: absolute;z-index: 999;"></i></div>
												<div class="crop">
												<img src="upload/c_logo/<?=$img;?>">
												</div>
											</div>
										<?php } ?>
										</div>
																				
									</div>	
									</div>
								</div>
					</div>
					<div id="d2" class ="d" style="display:none">
					
					    <div class="col-md-12" id="mobile-des17">
							<h3 class="modal-title1">Sell Used Mobiles Easily-Choose Your Model*</h3>											
							<div id="model"></div>
							<div id="fbtn" class="col-md-12" style="text-align:center;display:none;margin-top:15px;"><a class="theme-btn btn-style-four btn-sm bg-2" onclick="tab_click(3)" style="font-style: normal;border:2px solid#da200b !Important;float:none;width: 100px;text-align:center;margin:auto;">Next</a></div>
						</div>
					
					</div>					
					<div id="d3" class ="d" style="display:none">
					  <div class="clearfix">
									<div class="col-md-12" style="padding:0px;background-color:#fff;padding-top:15px;">
										<h2 class="main-title">Used Phone Details</h2>
										
										
										
										<div class="col-md-6">
											<div class="col-md-12" style="padding:0px;padding-top:0px;">
												<div class="col-md-12" style="padding:0px;font-size: 20px;color: #e92438;font-weight: bold;">	
												<span id="bmname" class="phone-title_1">Other</span>&nbsp;
												</div>
												
												<?php if($poster_type=='Admin') { ?>
												<div class="col-md-6" style="padding-left:0px;">
												<p style="font-weight:bold;color:#303030;font-size:15px;">How old is your device?*</p>												
												<input type="text" class="form-control" id="admin_year" name="admin_year" value="<?=$admin_year;?>"/>
												</div>												
												<div class="col-md-6">
												<p style="font-weight:bold">Select the category of your device</p>
												 <select name="devicecat" class="form-control">
													<option value="">Select</option>
													<option value="1"  <?php if($cat==1) echo "Selected";?>>Great battery life</option>
													<option value="2" <?php if($cat==2) echo "Selected";?>>4G ready</option>
													<option value="3" <?php if($cat==3) echo "Selected";?>>Selfie phones</option>
													<option value="4" <?php if($cat==4) echo "Selected";?>>High on speed</option>
												</select>
                                                </div>
                                                 <?php } ?>
												<div class="clearfix col-md-12" style="padding:0px;">
															<div class="tab-content">
															<div class="tab-pane active" id="tab-justified-home">
																<div class="clearfix" id="box-color">
																	<h4 style="margin:0px 0px 10px 0px;padding:0px;font-family: inherit;font-weight: bold;font-size: 16px;text-transform: uppercase;">Warranty:*</h4>
																		<div class="col-md-8 msg-line" style="padding:0px;"><span style="width:50%;float:left;margin-bottom:10px;"><label><input name="warranty" class="warranty" id="w1" <?php if($warranty=='1') echo "checked";?>  ch value="1" style="color:#e92438;font-size:15px;margin-right:10px;" onclick="bill(1)" type="radio">Out of warranty </label></span>
																		<span style="width:50%;float:left;margin-bottom:10px;"><label><input name="warranty" id="w2" class="warranty" <?php if($warranty=='2') echo "checked";?> value="2" style="color:#e92438;font-size:15px;margin-right:10px;" onclick="bill(2)" type="radio">Under warranty</label></span></div>
																		<div class="col-md-4 msg-line" style="display:none;padding:0px;float:left;" id="billdate">
																		<div class="input-group date" id="datepickerDemo">
																		<input type="text" name="year" id="year" value="<?=$year;?>" placeholder="Billing Date" onchange="yearwarr(this.value)" class="form-control">
																		<span class="input-group-addon">
																			<i class="ion ion-calendar"></i>
																		</span></div>
																		</div>
																	</div>
															</div>
														</div>
														
														<div class="tab-content">
															<div class="tab-pane active" id="tab-justified-home">
																<div class="clearfix" id="box-color">
																	<h4 style="margin:0px 0px 10px 0px;padding:0px;font-family: inherit;font-weight: bold;font-size: 16px;text-transform: uppercase;">
																	Any Issues:</h4>
																	<?php
																		$sqli="select * from soum_phone_issue order by issue_id";
																		$resi=$db->query($sqli);
																		while($rowi=$resi->fetch_assoc())
																		{
																							
																		?>
																	  <p class="msg-line" style="width:33%;float:left;"><label><input name="condition2[]"
																	  <?php
																	   $condi3=explode(",",$condi2);
																	   foreach($condi3 as $a=>$b)
																	   {
																	      if($rowi['issue_id']==$condi3[$a]){ echo 'Checked';}
																	   }
																	  ?>
																	  value="<?=$rowi['issue_id']?>" type="checkbox" style="color:#e92438;font-size:15px;margin-right:10px;"><?=$rowi['issue']?></label></p>
																	  <?php } ?>
																</div>
															</div>
														</div>
														
														<div class="tab-content">
															<div class="tab-pane active" id="tab-justified-home">
																<div class="clearfix" id="box-color">
																	<h4 style="margin:0px 0px 10px 0px;padding:0px;font-family: inherit;font-weight: bold;font-size: 16px;text-transform: uppercase;">
																	Accessories:</h4>
																	      <?php
																		$sqli="select * from soum_phone_assecc";
																		$resi=$db->query($sqli);
																		while($rowi=$resi->fetch_assoc())
																		{
																							
																		?>
																	  <p class="msg-line" style="width:33%;float:left;"><label><input name="condition[]"
																	  <?php
																	     $condii=explode(",",$condi);
																	   foreach($condii as $a=>$b)
																	   {
																	      if($rowi['access_id']==$condii[$a]){ echo 'Checked';}
																	   }
																	  ?>
																	  value="<?=$rowi['access_id']?>" type="checkbox" style="color:#e92438;font-size:15px;margin-right:10px;"><?=$rowi['access_name']?></label></p>
																	  <?php } ?>
																			</div>
															</div>
														</div>
														<div class="tab-content">
															<div id="romd"></div>
														</div>
														
														<div class="col-md-12" style="padding:0px;width:100%;float:left;">
														
															<p style="margin:10px 0px 0px 0px"><strong>Phone Photos </strong> <span class="red-text">*</span></p>
															<div class="box-img" style="padding-left:0px;overflow: hidden;margin-bottom:10px;"><a id="rmv1" style="display:none" onclick="remove_img(1)" class="remove-img">X</a><span class="select-img1" style="background: rgb(195, 195, 195,0.3);width:100% !important;float: left;cursor:pointer;z-index: 9;height: 80px;text-align:center;background-size:100px auto;background-repeat:no-repeat;background-position:center center;"><img src="upload/thumb/<?=$image1;?>" id="previewing1" style="height:80px;width: auto;margin: auto;float: none;"/></span><span class="select-wrapper"><input name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" class="btn btn-default" type="file" style="margin-bottom:13px;text-align:left;width: 100% !important;height: 80px !important;border: 1px dashed #c5d7b5;height:auto;" ></span></div>
								                            <div class="box-img" style="padding-left:0px;overflow: hidden;margin-bottom:10px;"><a id="rmv2" style="display:none" onclick="remove_img(2)" class="remove-img">X</a><span class="select-img1" style="background: rgb(195, 195, 195,0.3);width:100% !important;float: left;cursor:pointer;z-index: 9;height: 80px;text-align:center;background-size:100px auto;background-repeat:no-repeat;background-position:center center;"><img src="upload/thumb/<?=$image2;?>" id="previewing2" style="height:80px;width: auto;margin: auto;float: none;"/></span><span class="select-wrapper"><input name="fileToUpload2" id="fileToUpload2" onchange="abc(this,2);" class="btn btn-default" type="file" style="margin-bottom:13px;text-align:left;width: 100% !important;height: 80px !important;border: 1px dashed #c5d7b5;height:auto;" ></span></div>
								                            <div class="box-img" style="padding-left:0px;overflow: hidden;margin-bottom:10px;"><a id="rmv3" style="display:none" onclick="remove_img(3)" class="remove-img">X</a><span class="select-img1" style="background: rgb(195, 195, 195,0.3);width:100% !important;float: left;cursor:pointer;z-index: 9;height: 80px;text-align:center;background-size:100px auto;background-repeat:no-repeat;background-position:center center;"><img src="upload/thumb/<?=$image3;?>" id="previewing3" style="height:80px;width: auto;margin: auto;float: none;"/></span><span class="select-wrapper"><input name="fileToUpload3" id="fileToUpload3" onchange="abc(this,3);" class="btn btn-default" type="file" style="margin-bottom:13px;text-align:left;width: 100% !important;height: 80px !important;border: 1px dashed #c5d7b5;height:auto;"></span></div>
								                            
								                           <?php if($poster_type=='Admin') { ?><div style="width:100%;float:left;">
								                            	<div style="width:31%;float:left;margin-right:10px;font-size: 12px;font-weight: bold;"><a href="upload/<?=$image1;?>" target="_blank" style="color:#000;">View</a></div>
								                            	<div style="width:31%;float:left;margin-right:10px;font-size: 12px;font-weight: bold;"><a href="upload/<?=$image2;?>" target="_blank" style="color:#000;">View</a></div>
								                            	<div style="width:31%;float:left;font-size: 12px;font-weight: bold;"><a href="upload/<?=$image3;?>" target="_blank" style="color:#000;">View</a></div>
								                            </div>
								                            <?php } ?>
								                            <p><img src="images/upload-img.png" class="mobile-des13"/></p>
														</div>
														<div class="col-md-12" style="padding:0px;width:100%;float:left;">
														<div class="col-md-6" style="padding-left:0px;">
															<p style="margin:10px 0px 0px 0px;font-weight:600" class="remove1">Expected Price*</p>
															<input type="text" name="expected_price" value="<?=$eprice;?>" id="txt_expected_price" class="form-control fa" Placeholder="&#xf156; 10,000" style="font-size:16px;margin-bottom:10px;"/>
														</div>
														<div class="col-md-6" style="padding-left:0px;">
															<p style="margin:10px 0px 0px 0px;font-weight:600" class="remove1">IMEI No*</p>
															<input type="text" name="imi_no" value="<?=$emi;?>" id="txt_imi_no" class="form-control" Placeholder="353925800980951" style="margin-bottom:10px;"/>
														</div>	
														<div class="col-md-12" style="display:none">
															<p style="margin:10px 0px 0px 0px;font-weight:600;">Description</p>
															<textarea rows="4" name="desc" id="desc" class="form-control"><?=$desc;?></textarea>
														</div>	
														</div>												
														
													</div>
													
											</div>
										</div>
										
										<div class="col-md-6" id="margin-mobile">
											<div class="mobile-des16"><div id="detail"></div></div>
											<p class="tab-check">* Check all details and make sure your phone has got all these features. If not, go back and description do mention this.</p>
										</div>
									</div>
									<div class="col-md-12" style="margin-top:15px;margin-bottom:15px;width: 100%;float: left;">
										<div style="width:50%;float:left;">
											<a class="theme-btn btn-style-four btn-sm bg-3" onclick="tab_click(2)" style="font-style: normal;float:left;width: 100px;text-align:center;background-color: #484848;"><i class="fa fa-angle-double-left" style="font-size:20px;" aria-hidden="true"></i> Back</a>
										</div>
										<div style="width:50%;float:right;">
											<a href="#used" class="theme-btn btn-style-four btn-sm bg-2" onclick="tab_click(4)" style="font-style: normal;border:2px solid#da200b !Important;float:right !important;width: 100px;text-align:center;">Next</a>
										</div>
									</div>
								</div>

					   
					
					
					
					
					</div>					
					<div id="d4" class ="d" style="display:none">
					   <div class="clearfix" style="padding:20px;">
									<div class="col-md-7" style="padding:0px;">
										<h2 class="saller-title">Seller Information </h2>
										<div class="col-md-6" style="margin-bottom:10px;">
											<label id="remove1">Mobile No*</label>
											<input type="text" name="mobile_no" placeholder="Mobile No." id="mobile" value="<?=$mobile;?>" onchange="client(this.value)" class="form-control" />
										</div>
										<div class="col-md-6" style="margin-bottom:10px;">
											<label id="remove1">Email*</label>
											<input name="email" id="email" placeholder="Email" type="text" value="<?=$email;?>" class="form-control" />
										</div>
										<div class="col-md-12" style="margin-bottom:10px;">
											<label id="remove1">Full Name*</label>
											<input name="fname" id="fname" placeholder="Name"  type="text" value="<?=$name;?>" class="form-control" />
										</div>										
										<div class="col-md-12" style="margin-bottom:10px;">
											<label id="remove1">Address*</label>
											<input name="address" id="address" placeholder="Address" type="text" value="<?=$address;?>" class="form-control" />
										</div>
										<div class="col-md-6" style="margin-bottom:10px;">
											<label id="remove1">City*</label>
											<input name="city" id="city" placeholder="City" type="text" value="<?=$city;?>" class="form-control" />
										</div>
										<div class="col-md-6" style="margin-bottom:10px;">
											<label id="remove1">Available at Pincode*</label>
											<input name="pincode" id="pincode" placeholder="Pincode" type="text" value="<?=$pincod;?>" class="form-control" />
										</div>
										
										<div class="col-md-12" style="padding-top:20px;width:100%;float:left;">
										<p style="margin:0px;"><label>Upload Phone/ Identity*</label></p>
										<?php if($poster_type=='Dealer' || $poster_type=='Admin'){ ?>
											<div class="box-img" style="overflow: hidden;margin-bottom:10px;"><a id="rmv4" style="display:none" onclick="remove_img(4)" class="remove-img">X</a>
												<span class="select-img1" id="saler-id" style="background: rgb(195, 195, 195,0.3);width:100% !important;cursor:pointer;float: left;z-index: 9;height: 80px;text-align:center;background-size:100px auto;background-repeat:no-repeat;background-position:center center;"><img src="upload/thumb/<?=$image4;?>" id="previewing4" style="height:80px;width: auto;margin: auto;float: none;"/></span><span class="select-wrapper"><input name="fileToUpload4"  id="fileToUpload4" onchange="abc(this,4);" class="btn btn-default" type="file" style="width:100% !important;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height: 80px !important;" ></span>
												<p style="margin:0px;"><label style="margin-top:0px;font-size:10px;">Seller Photo</label></p>
											</div>
				                            <div class="box-img" style="padding-left:0px;overflow: hidden;margin-bottom:10px;"><a id="rmv5" style="display:none" onclick="remove_img(5)" class="remove-img">X</a>
				                            	<span class="select-img1" id="saler-id" style="background: rgb(195, 195, 195,0.3);width:100% !important;cursor:pointer;float: left;z-index: 9;height: 80px;text-align:center;background-size:100px auto;background-repeat:no-repeat;background-position:center center;"><img src="upload/thumb/<?=$image5;?>" id="previewing5" style="height:80px;width: auto;margin: auto;float: none;"/></span><span class="select-wrapper"><input name="fileToUpload5" id="fileToUpload5" onchange="abc(this,5);" class="btn btn-default" type="file" style="width:100% !important;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height: 80px !important;" ></span>
				                            	<p style="margin:0px;"><label style="margin-top:0px;font-size:10px;">Seller Identity</label></p>
			                            	</div>
			                            	<?php } ?>
				                            <div class="box-img" style="padding-left:0px;overflow: hidden;margin-bottom:10px;"><a id="rmv6" style="display:none" onclick="remove_img(6)" class="remove-img">X</a>
				                            	<span class="select-img1" id="saler-id" style="background: rgb(195, 195, 195,0.3);width:100% !important;cursor:pointer;float: left;z-index: 9;height: 80px;text-align:center;background-size:100px auto;background-repeat:no-repeat;background-position:center center;"><img src="upload/thumb/<?=$image6;?>" id="previewing6" style="height:80px;width: auto;margin: auto;float: none;"/></span><span class="select-wrapper"><input name="fileToUpload6" id="fileToUpload6" onchange="abc(this,6);" class="btn btn-default" type="file" style="width:100% !important;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height: 80px !important;"></span>
				                            	<p style="margin:0px;"><label style="margin-top:0px;font-size:9px;">Copy of Mobile Bill/Sale 
												Letter</label></p>
			                            	</div>
										</div>
									<?php if($poster_type=='Admin') { ?>
										<div style="width:100%;float:left;" class="col-md-12">
			                            	<div style="width:30%;float:left;margin-right:10px;font-size: 12px;font-weight: bold;"><a href="upload/<?=$image4;?>" target="_blank" style="color:#000;">View</a></div>
			                            	<div style="width:30%;float:left;margin-right:10px;font-size: 12px;font-weight: bold;"><a href="upload/<?=$image5;?>" target="_blank" style="color:#000;">View</a></div>
			                            	<div style="width:30%;float:left;font-size: 12px;font-weight: bold;"><a href="upload/<?=$image6;?>" target="_blank" style="color:#000;">View</a></div>
			                            </div>
			                         <?php } ?>
									</div>
									<div class="col-md-5" id="remove1">
										<div style="width:100%;float:left;background-color:#f9f9f9;padding: 20px;padding-top: 0px;">
											<p style="margin:10px 0px 0px 0px;font-weight:bold;font-size:20px;">About Soum</p>
											<p style="font-weight: 500;line-height: 23px;text-align: justify;">SOUM is a brand name of Smart Solutions, Jaipur based company which deals in mobiles and electronics. We are into this field since more than 14+ years by now. In this span of time we have created good name in Jaipur city. With over 20,000 satisfied customers, SOUM is one of the fastest growing mobile and electronics centers of Jaipur.</p>
											<div class="col-md-6" style="padding-left:0px;">
												<div class="tab-about-list"><img src="images/check-icon.png" style="width:41px;height:auto;float:left;"/> <span style="float:left;font-weight:bold;font-size:15px;margin:4px 0px 0px 4px;">Nearby Abailability</span></div>
											</div>
											<div class="col-md-6" style="padding-left:0px;">
												<div class="tab-about-list"><img src="images/check-icon.png" style="width:41px;height:auto;float:left;"/> <span style="float:left;font-weight:bold;font-size:15px;margin:4px 0px 0px 4px;">100% Connectivity</span></div>
											</div>
											<div class="col-md-6" style="padding-left:0px;">
												<div class="tab-about-list"><img src="images/check-icon.png" style="width:41px;height:auto;float:left;"/> <span style="float:left;font-weight:bold;font-size:15px;margin:4px 0px 0px 4px;">Online Repairing</span></div>
											</div>
											<div class="col-md-6" style="padding-left:0px;">
												<div class="tab-about-list"><img src="images/check-icon.png" style="width:41px;height:auto;float:left;"/> <span style="float:left;font-weight:bold;font-size:15px;margin:4px 0px 0px 4px;">100% Trustable</span></div>
											</div>
											<div class="col-md-6" style="padding-left:0px;">
												<div class="tab-about-list"><img src="images/check-icon.png" style="width:41px;height:auto;float:left;"/> <span style="float:left;font-weight:bold;font-size:15px;margin:4px 0px 0px 4px;">Real Buyer</span></div>
											</div>
											<div class="col-md-6" style="padding-left:0px;">
												<div class="tab-about-list"><img src="images/check-icon.png" style="width:41px;height:auto;float:left;"/> <span style="float:left;font-weight:bold;font-size:15px;margin:4px 0px 0px 4px;">100% Connectivity</span></div>
											</div>											
										</div>
										
										<?php if($poster_type=='Admin') { ?>
										<div class="col-md-6" style="padding-left:0px;">
												<div class="tab-about-list"><span style="float:left;font-weight:bold;font-size:15px;margin:4px 0px 0px 4px;"><label><input name="approve" type="checkbox" <?php if($active==1) echo "Checked";?> />&nbsp;Approve</label></span></div>
									    </div>									   
								        <div class="col-md-6" style="padding-left:0px;">
											<div class="tab-about-list"><span style="float:left;font-weight:bold;font-size:15px;margin:4px 0px 0px 4px;"><label><input name="setp" type="checkbox" <?php if($setp==1) echo "Checked";?> />&nbsp; Set Priority</label></span></div>
								        </div>
								        <div class="col-md-12" style="padding-left:0px;">
											<div class="tab-about-list" style="padding: 5px 5px 0px 5px;background: #fff;border:  1px solid#ddd;text-align: center;color: #000;">
											<span style="float:left;width:auto;margin-right:15px;"><label>Rating*</label></span>
										      <span style="float:left;width:auto;margin-top: 4px;"> <input name="star1" type="radio" value="1" class="star"/>
										       <input name="star1" type="radio" value="2" class="star"/>
										       <input name="star1" type="radio" value="3" class="star"/>
										       <input name="star1" type="radio" value="4" class="star"/>
										       <input name="star1" type="radio" value="5" class="star"/></span>
											
											</div>
								        </div>

                                       <?php } ?>
										
									</div>
									<div class="col-md-12" style="padding:0px;margin-top:15px;">
										<div style="width:50%;float:left;">
											<a href="#" class="theme-btn btn-style-four btn-sm bg-3" id="mob-btn" onclick="tab_click(3)" style="font-style: normal;float:left;width: 100px;text-align:center;background-color: #484848;"><i class="fa fa-angle-double-left" style="font-size:20px;" aria-hidden="true"></i> Back</a>
										</div>
										<div style="width:50%;float:right;">
										<?php if($poster_type=='Admin') { ?>
										    <input type="button" class="theme-btn btn-style-four btn-sm bg-2" onclick="approve1(3,<?=$prod_id;?>,<?=$mobile?>)" id="mob-btn" value="Delete" style="font-style: normal;border:2px solid#da200b !Important;float:right;min-width:100px;text-align:center;margin-left:5px;">
                                         <?php } ?>  
											<input type="submit" class="theme-btn btn-style-four btn-sm bg-2" id="mob-btn" value="Submit Your Used Phone" style="font-style: normal;border:2px solid#da200b !Important;float:right;min-width:100px;text-align:center;">
										</div>
									</div>

								</div>

					
					</div>					
					
					</div>
				</div>
                
              <!---------------------canvas upload image start -->
						<div class="col-md-12" style="display:none;">
						 <img id="scream" height="25" width="21">
				 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image1;?></textarea>
				    <textarea id="debugConsole2" name="S2" rows="3" style="width:30%; display:1none"><?=$image2;?></textarea>
					<textarea id="debugConsole3" name="S3" rows="3" style="width:30%; display:1none"><?=$image3;?></textarea>
					<textarea id="debugConsole4" name="S4" rows="3" style="width:30%; display:1none"><?=$image4;?></textarea>
				    <textarea id="debugConsole5" name="S5" rows="3" style="width:30%; display:1none"><?=$image5;?></textarea>
					<textarea id="debugConsole6" name="S6" rows="3" style="width:30%; display:1none"><?=$image6;?></textarea>
                    <textarea id="debugConsole7" name="S7" rows="3" style="width:30%; display:1none"></textarea>
					<textarea id="debugConsole8" name="S8" rows="3" style="width:30%; display:1none"></textarea>
                    <canvas id="myCanvas"  width="auto" style="border:1px solid #d3d3d3;display:1none">YourbrowserdoesnotsupporttheHTML5canvastag.</canvas>
                    <script>
                    function abc1(popid)
                    {
                   
					    var canvas = document.getElementById('myCanvas');
					    var context = canvas.getContext('2d');
					
					    context.closePath();
					    context.lineWidth = 5;
					    context.fillStyle = '#8ED6FF';
					    context.fill();
					    context.strokeStyle = 'blue';
					    context.stroke();
					    var dataURL = canvas.toDataURL("image/jpeg",1);
					    saveImage(dataURL, popid);
					   }
					</script>
                    </div>
                    <!---------------------canvas upload image end -->
						
		   </form>		
			</div>
		</div>
	</div>
</section>
    <!--Sponsors Section-->
<?php include('_footer.php');?>
    <!--Main Footer-->
</div>
<!--End pagewrapper-->
<link href="css/multi_level_form_css.css" rel="stylesheet" type="text/css"/>
<!--Scroll to top-->
<style>
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    counter-reset: step;
    width: 357px;
    margin: auto;
}
#progressbar li {
    list-style-type: none;
    color: #000;
    text-transform: none;
    font-size: 13px;
    width:25%;
    float: left;
    position: relative;
    z-index: 9;
    font-weight: bold;
    font-family: inherit;
}
#progressbar li.active::before, #progressbar li.active::after {
    background: #E92438;
    color: white;
    margin-right:40px;
}
#progressbar li::before {
    content: counter(step);
    counter-increment: step;
    width: 40px;
    line-height: 40px;
    display: block;
    font-size: 19px;
    color: #333;
    background: white;
    margin: 0 auto 5px auto;
    border-radius: 100px;
}
#progressbar li:after {
    content: '';
    width: 100%;
    height: 8px;
    background: #d7d7d7;
    position: absolute;
    left: -45%;
    top: 16px;
    z-index: -1;
}
#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 40px;
    line-height: 40px;
    display: block;
    font-size: 19px;
    color: #333;
    background: #d7d7d7;
    margin: 0 auto 5px auto;
    border-radius: 100px;
}
</style>
<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper"><span class="fa fa-long-arrow-up"></span></div>
	<link rel="stylesheet" href="admin/styles/plugins/bootstrap-datepicker.css">
	<link rel="stylesheet" href="admin/fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="admin/fonts/font-awesome/css/font-awesome.min.css">
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src='js/star/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
 <script src='js/star/jquery.rating.js' type="text/javascript" language="javascript"></script>
 <link href='js/star/jquery.rating.css' type="text/css" rel="stylesheet"/>



<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
	<script src="admin/scripts/plugins/select2.min.js"></script>	
	<script src="admin/scripts/plugins/bootstrap-colorpicker.min.js"></script>
	<script src="admin/scripts/plugins/bootstrap-slider.min.js"></script>
	<script src="admin/scripts/plugins/summernote.min.js"></script>
	<script src="admin/scripts/plugins/bootstrap-datepicker.min.js"></script>
	<script src="admin/scripts/form-elements.init.js"></script>

<script>
var oldb='';
var oldm='';

function approve1(val,pid,mob)
 {
 
   alert
   $.ajax({
          type:"POST",
          url:"admin/approve.php",
          data:"prod_id="+pid+"&act="+val+"&mob="+mob,
          success:function(data)
          { 
          //alert(data);
           
           if(data==3)
            {
              alert("Your add is delete");
            }
            window.location.href="admin/dashboard.php";
          }
   
   });
 }


function yearwarr(val)
{
 
if(this.val1!=val)
{
  this.val1=val;
  	
	var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		
		if(dd<10) {
		    dd = '0'+dd
		} 
		
		if(mm<10) {
		    mm = '0'+mm
		} 
		
		var d2 = mm + '/' + dd + '/' + yyyy;
		
		this.val1=val;
		
		    var d=val.substr(0,2); 
		    var m=val.substr(3,2);
		    var y=val.substr(6,4);
		
		    var d1=m+'/'+d+'/'+y;
		    
		    var date1 = new Date(d1);
			var date2 = new Date(d2);
			var timeDiff = Math.abs(date2.getTime() - date1.getTime());
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
			
			if(diffDays>365)
			{
			 alert("Your warranty is expire");
			 bill(1);
			 $("#w1").attr('checked', 'checked');
			 return false;
			 
			}
 }
}
jQuery(function($){
  
   $("#pincode").mask("9 9 9 9 9 9",{placeholder:"______"});
   $("#mobile").mask("9 9 9 9 9 9 9 9 9 9",{placeholder:"__________"});
   
});
$("#fname").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});

$("#txt_imi_no").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9]/g)) {
       $(this).val(val.replace(/[^0-9]/g, ''));
   }
   
    if (val.length>15)
	{
       $(this).val(val.substr(0,15));

    }
    
    
    if (val.length==15)
	{
       $.getJSON('imei.php?callback=?','val='+val, function(data){ 
      	   if(data==1)
      	   {
	      	    alert('This IMEI number already exist');
	      	    $("#txt_imi_no").val('');
	      	    return false;
      	   }
	   });

    }

    

});

var modal='';
var id='';
var warr='';
var type="";
var mrom="";

$("document").ready(function(){

var mob=localStorage.getItem("mobile");
if(mob!=null)
{
	client(mob);
	
}

type="<?=$_SESSION['poster_type'];?>";

  id='<?=$brand;?>';
  modal='<?=$modal;?>';
  warr='<?=$warranty;?>';
   mrom='<?=$mrom;?>';
  bill(warr);
	
	if(type=='Admin')
	{
	   $("#fbtn").show();
	}
	
	
	if(id!=='')
	{
	  fill2(id,modal);	 	 
	  
	}
	
	
	if(modal>='0' && id!='0')
	{
	   model1(modal,0);	 
	  
	}




  
});

function fill2(p,m)
{	
   
   $('#drpBrand').val(p);   
   tab_click(2);
   
     $('#brand'+oldb).removeClass('check-select1');
      oldb=p; 
     $('#brand'+p).addClass('check-select1');
     
      $("#model").html("<img src='upload/loader.gif' width='50px' height='50px'>");
      
      
      if(p==0)
        {
         $("#fbtn").show();
        
           $("#model").html('<div class="col-md-4"><input name="devicebrand" id="devicebrand" value="<?=$other_brand;?>" placeholder="Enter Brand Name" class="form-control" type="text" style="margin-bottom:10px;"/></div> <div class="col-md-4"><input name="devicemodal" id="devicemodal" placeholder="Enter Model Name" value="<?=$other_model;?>" class="form-control" type="text" style="margin-bottom:10px;"/></div>');   
             if(type=='Admin')
             {
               model2();
             }  
             return false;
        }

      if(m==0)
       {
        return false;
       }

      
      
        $.getJSON('fill.php?callback=?','id='+p, function(data){  		

		if(data)
		{ 
		  var tab='';
		  var class1;
		  $.each(data,function(i,element){
		  
		      
		    tab+='<div class="col-md-2 mobile-des40" onclick="model1('+element.prod_subsubcat_id+','+element.price+')">';
			tab+='<div id="mobile-title2" class="'+class1+'"><div id="modeldiv'+element.prod_subsubcat_id+'" class="check-select"><i class="fa fa-check-square-o" aria-hidden="true" style="position:absoulte;top:0;right:0;color:red;"></i></div>';
			tab+='<div style="width:100%;float:left;text-align:center;margin-bottom:10px;" id="mobile-img1"><img src="upload/'+element.p_img1+'" style="max-height:100%;max-width:90%;height:130px;width:auto;"></div>';
			tab+='<div class="mobile-align">'+element.brandName+' '+element.prod_subcat_desc+'</div>';
			tab+='</div></div>';
		    
		  });
		  
		    tab+='<div class="col-md-2" style="padding-left:0px;text-align:center;margin-bottom:10px;cursor:pointer" onclick="model1(0,0)">';
			tab+='<div id="mobile-title2">';
			tab+='<div style="width:100%;float:left;text-align:center;margin-bottom:10px;" id="mobile-img1"><a href="#other"><img src="upload/thumb/b16.jpg" style="max-height:100%;max-width:90%;height:130px;width:auto;"></a></div>';
			tab+='<div class="mobile-align">Other</div>';
			tab+='</div></div>';
		  
		}
		else
		{
		
		}
		
		$("#model").html(tab);
	    if(m!=0 && m!='')
		$('#modeldiv'+m).addClass('check-select1');
	});
	
}
function model1(id,price)
{
   $('#drpModel').val(id);
   
		
            $('#modeldiv'+oldm).removeClass('check-select1');
            oldm=id; 
            $('#modeldiv'+id).addClass('check-select1');
        
       
       
      
      		if(id==0)
      		 {
      		      $("#fbtn").show();    
	              $("#model").html('<div class="col-md-4"><input name="devicemodal" id="devicemodal" placeholder="Enter Model Name" value="<?=$other_model;?>" class="form-control" type="text"/></div>');   
	            
		             if(type=='Admin')
		             {
		               model2();
		              
		             }  
	             
	                 return false;
       		 }
   

       tab_click(3);
     
       $.ajax({
          
           type:"POST",
           url:'prod_detail.php',
           data:"id="+id,
           
           success:function(data)
           {
            $("#detail").html(data);
            $("#detail2").html(data);
            var b=$("#bname").val();            
            var m=$("#mname").val();
            $("#bmname").html(b+" > "+m);
           }
       
       });
       
        $.ajax({
          
           type:"POST",
           url:'rom.php',
           data:"mid="+id+'&mrom='+mrom,
           
           success:function(data)
           {           
            $("#romd").html(data);
           }
       
       });

}
function model2()
{
  //alert(id);
    $.ajax({
          
           type:"POST",
           url:'prod_detail2.php',
           data:"id="+id,
           
           success:function(data)
           {
            $("#detail").html(data);
           }
       
       });
}

function bill(val)
{
 warr=val;
  if(val==2)
   {
     $("#billdate").show();
   }
   else
   {
     $("#billdate").hide();
   }
   
}



function valid1()
{ 
    var brand=$("#drpBrand").val();
    if (brand=="")
    {
    	alert("Please select the brand first!");
    	return false;
    }
    else
    {
    	return true;
    }
} 
function valid2()
{
	var model=$("#drpModel").val();
	var brand=$("#drpBrand").val();
    var dbrand=$('#devicebrand').val();
    var dmodel=$('#devicemodal').val();
    
    if(brand=='')
    {
	    if (model=="")
	    {
	    	alert("Please select the model first!");
	    	return false;
	    }
	   
	    	
    }
    else if(brand!=0 && model=='')
    {
	    if (model=="")
	    {
	    	alert("Please select the model first!");
	    	return false;
	    }
	   
	    	
    }
    else if(brand==0)
    {
       if (dbrand=="")
	    {
	    	alert("Please fill the Brand first!");
	    	return false;
	    }
	    if (dmodel=="")
	    {
	    	alert("Please fill the model first!");
	    	return false;
	    }

       
      
    }   
    else if(model==0)
    {
       
	    if (dmodel=="")
	    {
	    	alert("Please fill the model first!");
	    	return false;
	    }

        
      
    }   
return true;

}
function valid3()
{
  var year=$('#year').val();
  var mrom=$('input[name=mrom]:checked').val();
  var debugConsole1=$('#debugConsole1').val();
  var debugConsole2=$('#debugConsole2').val();
  var debugConsole3=$('#debugConsole3').val();
  var price=$('#txt_expected_price').val();
  var imi=$('#txt_imi_no').val();
  var desc=$('#desc').val();
 
 
  
  if(warr=='')
  {  
    alert('warranty must be selected');
    return false;
  }
  
	 if(warr==2)
	 {
		  if(year=='')
		  {  
		    alert('Billing date must be filled');
		    return false;
		  }
	 }
  
  if(mrom==undefined)
  {  
    alert('Rom must be selected');
    return false;
  }
  
  if(debugConsole1=='' || debugConsole1=='no_img.png')
  {  
    alert('first image must be selected');
    return false;
  }
  
  
  
  if(price=='')
  {  
    alert('Expected Price must be fill');
    return false;
  } 
  
  if(imi=='')
  {  
    alert('IMEI number must be fill');
    return false;
   }
  
  if(imi.length<15)
  {  
    alert('IMEI number must be 15 digits');
    return false;
   }

  return true;

} 

function valid4()
{
var mobile=$('#mobile').val();
var name=$('#fname').val();
var email=$('#email').val();
var add=$('#address').val();
var city=$('#city').val();
var pincod=$('#pincod').val();
var debugConsole4=$('#debugConsole4').val();
var debugConsole5=$('#debugConsole5').val();
var debugConsole6=$('#debugConsole6').val();

	  if(mobile=='')
	  {  
	    alert('Mobile must be filled');
	    return false;
	  } 
   
	  if(email=='')
	  {
	     alert("Enter email address!");			  
				return false; 
	  }
  
	  if(name=='')
	  {  
	    alert('Name must be filled');
	    return false;
	  }
  
  
	  if(add=='')
	  {  
	    alert('Address must be filled');
	    return false;
	  }
  
	  if(city=='')
	  {  
	    alert('City must be filled');
	    return false;
	  }
  
  
	if(debugConsole6=='' || debugConsole6=='no_img.png')
	{  
		alert('Copy of Mobile Bill must be selected');
		return false;
	}

	return true;
} 


</script>
<script type="text/javascript">    
function abc(x,popid)
{
 	var file = x.files[0];
    window.URL = window.URL || window.webkitURL;
    var blobURL = window.URL.createObjectURL(file);
	$("#popid").val(popid);
	 
	$("#scream").one("load", function() {
	
		var img = document.getElementById("scream");
		var c_width 	= img.clientWidth;
		var c_height 	= img.clientHeight;
		var n_width 	= img.naturalWidth;
		var n_height 	= img.naturalHeight;
	    var c = document.getElementById("myCanvas");
	    var ctx = c.getContext("2d");
	    c.height = 480;
	    diff_per=480/n_height*100;
	    c.width=n_width*diff_per/100;
	    ctx.drawImage(img, 0, 0,n_width, n_height,0,0,c.width,c.height);
		var myCanvas = document.getElementById("myCanvas");
		var canvasData = myCanvas.toDataURL("image/jpeg",1);
		var debugConsole= document.getElementById("debugConsole"+popid);
		//alert(popid);
	    abc1(popid);
    }).attr("src", blobURL);
    
    
}
function saveImage(dataURL, popid)
{
    $('#previewing'+popid).attr('src','upload/loader.gif');
	$.ajax({
	  type: "POST",
	  url: "script.php",
	  data: { 
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	   $('#debugConsole'+popid).val(o); 
	   $('#previewing'+popid).attr('src','upload/'+o);
	   $("#rmv"+popid).show();
	});
}

function remove_img(v)
{
  
  $('#debugConsole'+v).val(""); 
  $('#previewing'+v).attr('src','');
  $("#rmv"+v).hide(); 

}
</script>
</body>
</html>