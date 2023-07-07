<?php include('config.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
$sql="select * from soum_master_customer where cust_id=$poster_id";
$type=1;
$res=$db->query($sql);
$row=$res->fetch_assoc();
$name=$row['fname'];
$email=$row['email'];
$address=$row['address'];
$city=$row['city'];
$mobile=$row['mobile'];
$pincod=$row['pincod'];
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
<link rel="stylesheet" href="soumadmin/fonts/ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="soumadmin/fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="soumadmin/styles/main.min.css">
<style>
.fa {
    line-height: 1.10142857 !important;
    font-size: 13px;
}
.page-dashboard .list-widget ul > li {
    padding: 13px 20px !important;
    border-bottom: 1px solid #eeeeee !important;
    cursor: pointer !important;
}
.td-padding td {
	padding:5px;
	border:1px solid#ddd;
}
.white-box {
    position: relative;
    height: 230px;
    width: 450px;
    background-color: #ffffff;
    box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -o-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -ms-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -moz-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -webkit-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    padding:10px;
    padding-top:20px;
    overflow: hidden;
    background-image: url('images/map-small.png');
    background-repeat: no-repeat;
    background-size: cover;
}
.track-logo {
    position: relative;
    margin: 0px auto;
    height: 120px;
    width: 100%;
    text-align: left;
    margin-bottom: 5px;
}
.box-heading {
    font-size:26px;
    line-height: 30px;
    color: #212121;
    opacity: 0.75;
    margin-bottom: 10px;
    text-align: center;
    text-transform: uppercase;
    width:auto;
}
.box-tagline {
    font-size: 14px;
    text-align: center;
    line-height: 28px;
    margin-bottom: 15px;
    color: #212121;
    opacity: 0.75;
}
.track-form input {
    background-color: transparent;
    border: 0px solid transparent;
    color: #757575;
    position: relative;
    width: 90%;
    font-size: 16px;
    padding: 10px 0;
    border-bottom: 2px solid #757575;
    text-transform: uppercase;
}
.search_btn {
    background: transparent none repeat scroll 0 0;
    border: medium none;
    float: right;
    position: absolute;
    right: 20px;
    top: 20px;
}

ShippingIcon.full.css:1
.icon {
    font-family: 'ShippingIcon';
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
#wrapper1 {
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.8);
}
#wrapper1 #docket {
    text-align: center;
}
#docket .doc-data {
    font-size: 28px;
    font-weight: bold;
    letter-spacing: 2px;
    padding: 20px 0;
}
.doc-data .doc-no {
    color: #f48221;
    padding-left: 10px;
}
.track-bkg{
    min-height: 450px;
    background: rgba(0, 0, 0, 0) url('images/track-bkg.jpg') no-repeat center center / cover;
    border:1px solid#ddd;
/*    background-image: url('images/track-bkg.jpg');
    background-size: cover;*/
}
#lastcenter-detail {
    /*background: #fff none repeat scroll 0 0;
    border: 2px solid #f48221;
    border-radius: 10px;*/
    margin: auto;
    padding: 10px;
    width: 100%;
}
.track-1 td {
	border:1px solid#ddd;
	padding:6px;
	text-align:left;
}
.panel-pink {
    border-color: #eb5310;
}
.panel-pink > .panel-heading {
    color: #ffffff;
    background-color: #eb5310;
    border-color: #eb5310;
}
.panel-pink > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #eb5310;
}
.tabs-fill .nav-tabs > li > a, .tabs-fill .nav-tabs > li > a:hover, .tabs-fill .nav-tabs > li > a:focus {
    box-shadow: none;
    background: transparent;
    border: 1px solid#eb5310;
}
.tabs-fill .nav-tabs > li.active > a:before {
    background: #eb5310;
    height: 100%;
}
.tabs-fill .tab-content {
    border-color: #e91e63;
    border-color: #eb5310;
}
.login-table1 th {
	padding: 4px;

border: 1px solid#ddd;

background-color:#eaeaea;
}
.table-1 td{
	border:1px solid#ddd;
	padding:5px;
}
.tab-content > .active{
	border:none;
}
.notificatoin1 {
    border-radius: 15px;
    background-color: #4caf50;
    color: rgb(255, 255, 255);
    font-size: 10px;
    padding: 4px 3px;
    font-weight: bold;
    text-decoration: none;
    position: absolute;
    left: 120px;
    bottom: 7px;
    display: inline-table;
    width: 20px;
    height: 20px;
    text-align: center;
}
.padding-box{width:100%;float:left;padding:22px;background-color:rgba(255,255,255,0.7);}
@media(max-width:580px){
	.white-box{width:100% !important;}
	.padding-box{padding:0px;}
}
</style>
</head>
<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
    
 	<header class="header-style-two">
		<?php include('_header.php');?>        
    </header>
    <!-- Main Header -->
    
    <!--End Main Header -->
    
    
    <!--Default Section-->
    
    
    <!--Feature Section-->
<section class="default-section pb-0" style="padding: 0px 0px 40px;margin-bottom:30px;">
    	<div class="col-md-12" style="padding:50px 15px 30px 15px;min-height:250px;background-image:url('images/used-phone-bg.jpg');background-repeat:repeat;">
    		<div class="column col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                <h1 style="line-height: 1;margin-top: 8px;text-align:center;color:#fff;">Customer <span style="color:#fff;font-weight: 800;">Dashboard</span></h1>
             </div>
    	</div>
        <div class="auto-container">
            <div class="row clearfix">
                
                <div class="col-md-12">
                      <div class="col-md-10" style="margin:auto;float:none;margin-top:-90px;">
                	<div style="width:100%;float:left;background:#fff;padding:20px 20px 40px 20px;border:1px solid#f1f1f1;">
                    <div class="row">
	                    <div class="column default-text-column with-margin col-md-12 col-sm-12 col-xs-12" style="margin-bottom:20px;">
		                   	<h2 class="inner-title fs-32 double-line line-left">
							 Hello, <span class="theme_color roboto-font"><?=$name;?></span> </h2>
	                    </div>
                	
                	
                     	
					
					<!-- mini boxes -->
					<?php
                      $sql="select if (count(1) =0,0,sum(if (active,0,1))) not_approved_adv , count(1) total_adv from soum_product_master where prod_cat_id=2 and poster_type='$poster_type'  and poster_id='$poster_id'";
                      $res=$db->query($sql);
                      $row=$res->fetch_assoc();                      
                      ?>
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" style="width:70%;text-align:center;">
											<h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center"><?=$row['not_approved_adv'];?></h4>
											<h5 class="text-light mb0" style="font-size:18px;">Phone(Adv)</h5>
										</div>
										<div class="right ion ion-ios-person-outline icon" style="font-size: 45px;"></div>
									</div>
								</div>
								
								<div class="panel-footer clearfix panel-footer-sm panel-footer-primary">
									<p class="mt0 mb0 left">View Details</p>
								</div>
							</div>
						</div>
                        <?php
                      $sqlo="select count(1) order1 from soum_order_master 
                      where  cust_id='$poster_id'";
                      $reso=$db->query($sqlo);
                      $rowo=$reso->fetch_assoc();                      
                      
                      ?>
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
									<div class="panel-body">
									<div class="clearfix">
										<div class="info left" style="width:70%;text-align:center;">
											<h4 class="mt0 text-success text-bold" style="font-size: 30px;text-align:center"><?=$rowo['order1'];?></h4>
											<h5 class="text-light mb0" style="font-size:18px;"> &nbsp; &nbsp; &nbsp; Order &nbsp; &nbsp; &nbsp;</h5>
										</div>
										<div class="right ion ion-ios-people-outline icon" style="font-size: 45px;"></div>
									</div>
								</div>
								
								<div class="panel-footer clearfix panel-footer-sm panel-footer-success">
									<p class="mt0 mb0 left">View Details</p>
								</div>
							</div>
						</div>
						<?php
                      $sql1="select count(1) views from soum_view_count where user_type='$poster_type'  and user_id='$poster_id'";
                      $res1=$db->query($sql1);
                      $row1=$res1->fetch_assoc();                      
                      
                      ?>
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
									<div class="panel-body">
									<div class="clearfix">
										<div class="info left" style="width:70%;text-align:center;">
											<h4 class="mt0 text-info text-bold" style="font-size: 30px;text-align:center"><?=$row1['views'];?></h4>
											<h5 class="text-light mb0" style="font-size:18px;">Product Views</h5>
										</div>
										<div class="right ion ion-ios-albums-outline icon" style="font-size: 45px;"></div>
									</div>
								</div>
								
								<div class="panel-footer clearfix panel-footer-sm panel-footer-info">
									<p class="mt0 mb0 left">View Details</p>
								</div>
							</div>
						</div>
                        <?php
                        $sql1="select count(1) repair1 from soum_phone_repairing where email='$email'";
                      $res1=$db->query($sql1);
                      $row1=$res1->fetch_assoc();
                        ?>
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" style="width:70%;text-align:center;">
											<h4 class="mt0 text-pink text-bold" style="font-size: 30px;text-align:center"><?=$row1['repair1'];?></h4>
											<h5 class="text-light mb0" style="font-size:18px;"> &nbsp; &nbsp; &nbsp; Repair &nbsp; &nbsp; &nbsp;</h5>
										</div>
										<div class="right ion ion-ios-gear-outline icon" style="font-size: 45px;"></div>
									</div>
								</div>
								<div class="panel-footer clearfix panel-footer-sm panel-footer-pink">
									<p class="mt0 mb0 left">View Details</p>
								</div>
							</div>
						</div>
						<!-- #end mini boxes -->
					</div>
					
					<div class="row">
						<div class="col-md-12 col-sm-12">
						
							 <div class="panel-group" id="accordionDemo">
								<div class="panel-pink panel">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="#collapseTwo1" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo" id="mybutt">
											My Advertisement(s) <i class="right mt2 ion small ion-chevron-right"></i>
											</a>
										</h4>
									</div>
									<div class="panel-collapse collapse in" id="collapseTwo1">
										<div class="panel-body">
											<div class="auto-style1" style="float:right">
										<a href="form_used.php">SUBMIT AN AD</a>
											</div>
											<table style="border:1px solid#c5c5c5;width:100%;">
												<tr class="login-table1">
													<th scope="col">#</th>
													<th scope="col">Post Date-Time</th>
													<th scope="col">Token</th>
													<th scope="col" class="remove1">Brand</th>
													<th scope="col" class="remove1">Model</th>
													<th scope="col" class="remove1">Image</th>
													<th scope="col" class="remove1">Price</th>
													<th scope="col">Details</th>
												</tr>
												<?php 
												$sql2="select temp4.*,soum_prod_subsubcat.prod_subcat_desc model from ( select temp3.*,soum_prod_subcat.prod_subcat_desc brand_name from ( 
												select * from soum_product_master where poster_id=$poster_id and poster_type='Customer' and prod_cat_id=2
												)temp3 left outer join soum_prod_subcat on temp3.brand=soum_prod_subcat.prod_subcat_id )temp4 left outer join soum_prod_subsubcat on temp4.modal=soum_prod_subsubcat.prod_subsubcat_id";
												$res2=$db->query($sql2);
												$i=1;
													while($row2=$res2->fetch_assoc())
													{
													?>
													<tr class="login-table">
													<td><?=$i++;?></td>
													<td><?=date("d-m-Y", strtotime($row2['post_date']));?> : <?=date("H:s:i", strtotime($row2['post_date']));?></td>
													<td><?=$row2['code']?></td>
													<td class="remove1"><?=$row2['brand_name']?></td>
													<td class="remove1"><?=$row2['model']?></td>
													<td class="remove1"><img src="upload/<?=$row2['images'];?>" style="width:auto;height:50px;float:left;"></td>
													<td class="remove1"><?=$row2['appliable_rate']?></td>
													<td>
													<?php if($row2['active']==1){?>
													<a class="link" href="detail.php?prod_id=<?=$row2['prod_id'];?>">Details</a>
													<?php } else {
													 if($row2['prod_cat_id']==1){?> 
													<a class="link" href="form_new.php?prod_id=<?=$row2['prod_id'];?>">EDIT</a>
													<?php } else {?>
													<a class="link" href="form_used.php?prod_id=<?=$row2['prod_id'];?>">EDIT</a>
													<?php } }?></td>
													</tr>
													<?php
													}
													?>
												
											</table>
										
										</div>
									</div>
								</div>
								
								<div class="panel-pink panel">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="#collapseTwo2" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo">
												Track Order <i class="right mt2 ion small ion-chevron-right"></i>
											</a>
										</h4>
									</div>
									<div class="panel-collapse collapse" id="collapseTwo2">
										
										<div class="panel-body track-bkg" style="padding:0px;min-height:auto;width:100%;">
										<div class="padding-box">
											<div class="col-md-6">
												<div class="white-box"> 
													<div class="track-order"> <div class="track-logo transition"> <img src="images/barcod-icon.png" style="float:left;" class="remove1"><h3 class="box-heading">Track Your Package</h3>
													<p class="box-tagline">Enter Your Token Number</p>
													</div> 
														<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0"> 
											        		<div class="track-form"> 
												        		<input name="awb" id="track_id" placeholder="1234567890" required="" type="text"> 
												        		<button type="submit" class="icon icon-magnify fa fa-search" style="position: absolute;top: 20px;background: transparent;border: none;font-size: 18px;" onclick="track()"></button> 
											        		</div>
										        		</div>
									        		</div>
									        	</div>
								        	</div>
											
											<div class="col-md-6" >
										        <div id="lastcenter-detail">
								                    <div class="white-box" style="padding:8px;width:90%;height:auto;margin:auto;float:none">
								                        <div id="track_dtl"><h3 style="margin:0px;text-align:center;">Order Status</h3></div>
								                        <p style="padding-top: 0px;margin: 0px;font-size: 20px;display:none;" align="center">Token No. : <span id="trackid_dup" style="color: #f48221;padding-left: 10px;font-weight:bold;">NDR0001</span></p>
								                    </div>
								                    
									              </div>
									        </div>
											
											
											</div>
								
										
										
										</div>
										
									</div>
								</div>
																
								<div class="panel-pink panel">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="#collapseTwo3" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo">
												My Orders <i class="right mt2 ion small ion-chevron-right"></i>
											</a>
										</h4>
									</div>
									<div class="panel-collapse collapse" id="collapseTwo3">
										<div class="panel-body">
										
											<table style="border:1px solid#c5c5c5;width:100%;">
												<tr class="login-table1">
													<th scope="col">#</th>
													<th scope="col">Order Date</th>
													<th scope="col">Order Token</th>
													<th scope="col" class="remove1">Order Total</th>
													<th scope="col" class="remove1">Order Status</th>
													<th scope="col">Details</th>
												</tr>
												<?php 
												$sql1="select soum_order_master.*,soum_order_details.ord_det_id,soum_order_details.prod_id,
												soum_order_details.qty,sum(soum_order_details.price*soum_order_details.qty) price from soum_order_master,soum_order_details 
												where soum_order_master.order_id=soum_order_details.order_id 
												and soum_order_master.cust_id='$poster_id'
												and soum_order_master.cust_type='$poster_type'
												and soum_order_master.active=1
												group by soum_order_master.order_id";
												$res=$db->query($sql1);
												$i=1;
													while($row1=$res->fetch_assoc())
													{
													?>
													<tr class="login-table">
													<td><?=$i++;?></td>
													<td><?=date("d-m-Y", strtotime($row1['order_date']));?></td>
													<td><?=$row1['order_token']?></td>
													<td class="remove1"><?=$row1['price']?></td>
													<td class="remove1"><?php if($row1['status']=='0')echo 'Order Given'; else echo 'In Progres';?></td>
													<td><a href="soumadmin/order_details.php?order_id=<?=$row1['order_id']?>&type=2">Details</a></td>
													</tr>
													<?php
													}
													?>
												
											</table>
										
										</div>
									</div>
								</div>
								
								<div class="panel-pink panel">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="#collapseTwo4" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo">
												My Profile <i class="right mt2 ion small ion-chevron-right"></i>
											</a>
										</h4>
									</div>
									<div class="panel-collapse collapse" id="collapseTwo4">
										<div class="panel-body">
										
											<div class="col-md-6" style="padding:0px;">
											<div style="width:100%;float:left;background:#fff;">
			                                 <table style="width:100%;float:left;" class="td-padding">
												<tbody>
													<tr><td style="width:30%;">Name:</td><td style="width:70%;"><?=$name;?></td></tr>
			                                        <tr><td>Address:</td><td><?=$address;?></td></tr>
			                                        <tr><td>City:</td><td><?=$city;?></td></tr>
			                                        <tr><td>Postal Code:</td><td><?=$pincod;?></td></tr>
			                                        <tr><td>Mobile:</td><td><?=$mobile;?></td></tr>
			                                     </tbody>
			                                  </table>
			                                  </div>
			                                  <div style="width:100%;float:left;">
												<div style="width:30%;float:left;margin-top:20px;margin-left:10px;min-width:200px;"><a class="btn btn-primary mybutton" href="update-profile.php">Update Profile</a></div>
											   	<div style="width:30%;float:left;margin-top:20px;margin-left:10px;min-width:200px;"><a class="btn btn-primary mybutton" href="update-pwd.php">Change Password</a></div>
											</div>
			                            	</div>
										
										</div>
									</div>
								</div>
								
								
							</div>
													
						</div>
						
						
					</div>
					<!-- #end row -->
					
                        
                    </div>
                </div>
                </div>
               </div>
            </div>
        </div>
    </section>
<div class="col-md-12" style="display:none">
									
<?php if(isset($_SESSION['poster_type'])) { ?>   
							<div class="shout_box" style="overflow:hidden;">
									<div class="cht_1">Chat With Soum <span class="notificatoin1" style="display:none;" id="not"></span> <div class="close_btn">&nbsp;</div></div>
									  <div class="toggle_chat" style="display:none">
									  <div class="message_box">
									<?php include('chat_client.php');?>
									   			<div class="chat_text" style="width: 100%;float: left;border: 1px solid rgb(221, 221, 221);position:absolute;bottom:0;background-color:#fff;">
										        <div style="width:83%;float:left;"><input name="uid" id="uid<?=$type?>" value="0" type="hidden" /><input type="text" name="wage" id="msg<?=$type?>" value="" placeholder="Type a Message" style="width:100%;border:none;"></div>
										        <div style="float:right;width:16%;"><input value="Submit" id="send1" type="button" class='icon_1' style="background-color: transparent;border: none;" onclick='send("0",<?=$type?>);count1("0",<?=$type?>)'></div>
									        </div> 				    
									        </div>
									    </div>
									</div>  
							<?php } ?>
						
</div>
						
    <!--Sponsors Section-->
 <?php include('_footer.php');?>
    <!--Main Footer-->
    
    
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper"><span class="fa fa-long-arrow-up"></span></div>
<script src="soumadmin/scripts/vendors.js"></script>
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('shout.php', load_data,  function(data) {
		$('.message_box').html(data);		$('.message_box').scrollTop(scrolltoh);
		var scrolltoh = $('.message_box')[0].scrollHeight;
	 });
	}, 1000);
	

	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
				post_data = {'username':iusername, 'message':imessage};
			 	

				$.post('shout.php', post_data, function(data) {
					

					$(data).hide().appendTo('.message_box').fadeIn();
	

					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					

					$('#shout_message').val('');
					
				}).fail(function(err) { 
				

				alert(err.statusText); 
				});
			}
	});
	

	$(".close_btn").click(function (e) {

		var toggleState = $('.toggle_chat').css('display');
		

		$('.toggle_chat').slideToggle();
		

		if(toggleState == 'block')
		{
			$(".cht_1 div").attr('class', 'open_btn');
			
            
		}else{
			$(".cht_1 div").attr('class', 'close_btn');
			
		}
		 
		 
	});
});

function load()
{      

     var val = $('.toggle_chat').css('display');
     alert(val);
    		      
}
</script>
<script>

function track()
{
    track_id=$("#track_id").val();
    
    if(track_id=='')
    {
      alert('Please enter a valid token id');
      return false;
    }
       $.ajax({         
           type:"POST",
           url:"soumadmin/_ajax_generic-track.php",
           data:"track_id="+track_id,
           
           success:function(data)
           {
           	$('#trackid_dup').html($('#track_id').val());
            $("#track_dtl").html(data);
           }
       
       });
}

/*var auto_refresh = setInterval(

function ()
{

var val = $('.toggle_chat').css('display');

if(val=='none')
{

var t='<?=$type?>';

		 $.getJSON('soumadmin/chat_count.php?callback=?','uid=0&typ='+t, function(data){

                 if(data==0)
                 {
                 	$("#not").hide();
                 }
                 else
                 {
	                $("#not").html(data);
	          		$("#not").show();
          		 }
         	});
         	console.log('load a'+chk);
}		  
		
 
 },1000);*/
 
</script>



<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
	
	
</body>
</html>