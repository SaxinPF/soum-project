<?php include('config.php'); 
$poster_id=mysqli_real_escape_string($db,$_SESSION['poster_id']);
$poster_type=mysqli_real_escape_string($db,$_SESSION['poster_type']);
?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>SOUM | Services Online Used Mobile</title>
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/revolution-slider.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/bootstrap-margin-padding.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<style>
.color-gray {
    color: #000 !important;
    background-color: transparent;
    margin-bottom: 10px;
}
.ipad {
    width: 95%;
    margin: 0 auto;
    padding: 20px 13px 40px 13px;
    overflow: hidden;
    box-shadow: 4px 5px 4px -5px;
}
.main-footer:before {
    background: #262626 url('images/footer-bg1.jpg') !important;
    background-repeat: repeat-x !important;
}
#hover1:hover .news-date {
border: 10px solid rgba(221, 25, 45, 0.5);
}
#hover1:hover h3 a {color: #dd192d;
}
#hover1:hover .text a {
	background: #da200a;
    color: #fff !important;
    border: 2px solid #da200a !important;
}
.frame-square1 {
    background: transparent;
    display: inline-block;
    vertical-align: top;
    width:80px !important;
    height:64px !important;
}
.style1 {
	color:#0094DC;
	font-weight:bold;
}

</style>
<script>
function validateForm()
{
  var mob=$("#mobile").val();
  if(mob=='')
  {
   alert('Mobile number must be'); 
   return false;
  }
  
  
    var m=(mob.substr(0,1))*1;
   
    if(m>=0 && m<=6)
    {    
      alert("Enter valid number");
      return false;

    }    
    
    if(mob.length<10)
    {
      alert("Enter valid number");
      return false;
    }

  
  
  
  var name=$("#fname").val();
  if(name=='')
  {
   alert('Name must be'); 
   return false;
  }
  
  var email=$("#email").val();
  if(email=='')
  {
   alert('Email id must be'); 
   return false;
  }
  
  var pin=$("#pincode").val();
  if(pin=='')
  {
   alert('Pincode must be'); 
   return false;
  }
}
</script>
</head>
<body>
<div class="page-wrapper" style="background: #fff;">
<div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
	<header class="header-style-two">
		<?php include('_header.php');?>        
	</header>
    <!--Main Slider-->
    
	 <!--mboile view start-->   
	<div class="col-md-12" id="remove2" style="background:#f7f7f7;float:left;width:100%;">
   	<a href="phones.php?phone=used" style="color:#25292f">
   	<div class="col-md-12" id="box-home2">
   	<div style="width:55px;float:left;margin-right:3px;"><img src="images/used-icon.jpg"></div>
   	<h2 style="margin:0px;padding:0px;font-size:18px;font-weight:bold;">Trending Used Phone</h2>
   	<p class="ptitle1"> Wide range of used mobile phones. Simple, Elegant and Functional. </p>
   	</div>
   	</a>
   	<a href="form_used.php" style="color:#25292f">
   	<div class="col-md-12" id="box-home3">
   	<div style="width:55px;float:left;margin-right:3px;"><img src="images/sell-icon.jpg"></div>
   	<h2 style="margin:0px;padding:0px;font-size:18px;font-weight:bold;">Easy To Sell</h2>
   	<p class="ptitle1">Selling your used smart phone is just a few clicks away.</p>
   	</div>
   	</a>
   	<a href="repairing.php" style="color:#25292f">
   	<div class="col-md-12" id="box-home1">
   	<div style="width:55px;float:left;margin-right:3px;"><img src="images/service-icon.jpg"></div>
   	<h2 style="margin:0px;padding:0px;font-size:18px;font-weight:bold;">Online Repairing</h2>
   	<p class="ptitle1">Tell Us Issue of your phone. Our experts enable us to provide quick repair.</p>
   	</div>
   	</a>
   	<a href="tell_us.php?phone=used" style="color:#25292f">
   	<div class="col-md-12" id="box-home4">
   	<div style="width:55px;float:left;margin-right:3px;"><img src="images/inquiry-icon.jpg"></div>
   	<h2 style="margin:0px;padding:0px;font-size:18px;font-weight:bold;">Quick Inquiry</h2>
   	<p class="ptitle1">Let our Expert to assist you in finding a best phone at affordable price.</p>
   	</div>    
   	</a>
   </div>
   <div class="col-md-12 btn-box" style="padding:0px;padding-top:13px;background:#f7f7f7;float:left;width:100%;" id="remove2">
	<div class="dropdown1" style="display:inherit;float:left;">
	<a href="form_used.php"> <button onclick="myFunction()" class="dropbtn1" style="padding:16px;position:relative;text-transform:unset;padding-right:70px;border-radius:0px;">
	 Submit Your Used Phone <img src="images/icon-phone-1.png" style="width:60px;height:auto;position:absolute;right:10px;top:0px;"></button></a>
	</div>
   </div>
	 <!--mboile view end-->   
    
    
<section class="main-slider revolution-slider" id="remove1">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                <?php
					$sql=$db->prepare("select * from soum_banner where 1=1 and active order by banner_id desc");
					$sql->execute();
					$res=$sql->get_result();
					while ($row=$res->fetch_assoc())
					{
					
						$banner_image=$row['banner_image'];
						$banner_desc=$row['banner_desc'];			
						$banner_link=$row['banner_link'];						
				?>
                
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="upload/banner_img/<?=$banner_image;?>"  data-saveperformance="off"  data-title="Services @ SOUM" style="background:url('upload/banner_img/<?=$banner_desc;?>')">
                   <a href="<?=$row['banner_link'];?>"> <img src="upload/banner_img/<?=$banner_image;?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"></a>
                    </li>
                    
                   <?php } ?>
                </ul>
                
            </div>
        </div>
    </section>
    
    <!--Events Section-->
	
	<section class="recent-projects" style="padding-top:50px;" id="remove1">
        <div class="auto-container">
            
           <?php 
	          	$sql_1=$db->prepare("select * from soum_settings");
	          	$sql_1->execute();
	          	$res_1=$sql_1->get_result();
				$row=$res_1->fetch_assoc();
				?>
            <div class="row clearfix">
                <div class="column col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                    <h1 style="line-height: 1;margin-top: 8px;text-align:center;">Our <span style="color:#000;font-weight: 800;">Services</span></h1>
                </div>
                <!--Default Featured Column-->
                <div class="column default-featured-column style-two col-md-4 col-sm-4 col-xs-12" id="hover-round" style="text-align:center !important;">
                    <article class="inner-box wow fadeInLeft" style="position:relative;text-align: center !important;margin:auto;float:none;background: transparent;border-right:0px solid#ddd;">
                    	<div class="frame-round" style="text-align:center;margin: auto;float: none;">
						  	<div class="crop">
								<a href="phones.php?phone=used"><img src="upload/brand_logo/<?=$row['img_Buy_Enquire'];?>" alt="" style="border-bottom: 6px solid #fff;margin: auto;float:none;"/></a>
                            	<div class="news-date" id="text1"><span class="border-out"><i class="fa fa-mobile" aria-hidden="true" style="font-size:50px"></i></span></div>
							</div>
						</div>
                        <div class="content-box" style="padding-bottom:12px;">
                            <h3 style="text-align:center"><a href="phones.php?phone=used" id="text2">Do you wish to BUY used Phone?</a></h3>
                            <div class="text" style="border:none;background:transparent;padding: 0px 18px;line-height: 20px;">
								An online platform to buy mobile phone your 
								choice available nearby to your location. Buying 
								new and used phone was never so simple.</div>
							<div class="text" style="border:none;background:transparent;">
							<a href="phones.php?phone=used" class="theme-btn btn-style-four btn-sm" id="text3" style="font-style: normal;">Buy Now!</a>  
							</div>                        
                          </div>
                    </article>
                </div>
                
                <!--Default Featured Column-->
                <div class="column default-featured-column style-two col-md-4 col-sm-4 col-xs-12" id="hover-round" style="text-align:center !important;">
                    <article class="inner-box wow fadeInLeft" style="position:relative;text-align: center !important;margin:auto;float:none;background: transparent;border-right:0px solid#ddd;">
                    	<div class="frame-round" style="text-align:center;margin: auto;float: none;">
						  	<div class="crop">
								<a href="form_used.php"><img src="upload/brand_logo/<?=$row['img_used_phone'];?>" alt="" style="border-bottom: 6px solid #fff;margin: auto;float: none;"/></a>
                        		<div class="news-date" id="text-1"><span class="border-out" style="padding-top:6px;"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size:35px"></i></span></div> 
							</div>
						</div>
                        <div class="content-box" style="padding-bottom:12px;">
                            <h3 style="text-align:center"><a href="form_used.php" id="text-2">Do you wish to SELL used Phone?</a></h3>
                            <div class="text" style="border:none;background:transparent;padding: 0px 18px;line-height: 20px;">
								Our website is just an effort to make buyer and 
								seller, once you decide you choice, we directly 
								connect with the product owner.</div>
							 <div class="text" style="border:none;background:transparent;">
							<a href="form_used.php" class="theme-btn btn-style-four btn-sm bg-1" id="text4" style="font-style: normal;">
								Sell Now! </a>  
							</div>                      
                            </div>
                    </article>
                </div>
                
                <!--Default Featured Column-->
                <div class="column default-featured-column style-two col-md-4 col-sm-4 col-xs-12" id="hover-round" style="text-align:center !important;">
                    <article class="inner-box wow fadeInLeft" style="position:relative;text-align: center !important;margin:auto;float:none;background: transparent;">
                    	<div class="frame-round" style="text-align:center;margin: auto;float: none;">
						  	<div class="crop">
								<a href="repairing.php"><img src="upload/brand_logo/<?=$row['Img_Online_Repairing'];?>" style="border-bottom: 6px solid #fff;margin: auto;float: none;"/></a>
                           		<div class="news-date" id="text_1"><span class="border-out" style="padding-top:6px;"><i class="fa fa-wrench" aria-hidden="true" style="font-size:40px"></i></span></div> 
							</div>
						</div>
                        <div class="content-box" style="padding-bottom:12px;">
                            <h3 style="text-align:center"><a href="repairing.php" id="text_2">Do you wish to REPAIR your Phone?</a></h3>
                            <div class="text" style="border:none;background:transparent;padding: 0px 18px;line-height: 20px;"> 
								Tell Us Issue of your phone. Our experts enable 
								us to provide quick repair on reasonable cost in 
								minimal time.</div>
							<div class="text" style="border:none;background:transparent;">
							<a href="repairing.php" class="theme-btn btn-style-four btn-sm" id="text5" style="font-style: normal;">
								Submit Requirement</a>  
							</div>                        
						</div>
                    </article>
                </div>
                
            </div>
        </div>
    </section>
	
    <section style="background: #e9e9e9;padding-top:30px;" id="remove1">
    	   <div class="auto-container">
            <div class="row clearfix">
            	 <div class="column col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                    <h1 style="line-height: 1;margin-top: 8px;text-align:center;">Trending <span style="color:#000;font-weight: 800;">Used Phone</span></h1>
                    <strong>Wide range of used mobile phones. Simple, Elegant and Functional.</strong>                
                  </div>
                <!--Column-->
                <div class="column col-md-12 col-sm-12 col-xs-12">
             
                
                	<div class="device">
		<div class="course_demo" style="background: #e9e9e9;padding-top:0px;">
			
				<ul id="flexiselDemo2">	
		          <?php
		          
$sql=$db->prepare("select  
*,soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.active=1
and soum_product_master.prod_cat_id=2 and soum_product_master.deal!=1  order by prod_id desc LIMIT 0, 10");
$sql->execute();
$res=$sql->get_result();
					
					  	
					while($row=$res->fetch_assoc())
					{
						$disc_perc=0;
						//$img_prod=$row['imagesx'];	
						$img_logo=$row['poster_type'];
						$gaur=$row['soum_gaur'];
						$fd=$row['prime_image'];
						/******pawan**********/
					  	if($fd=="0" || $fd=="")
						$img_prod=$row["imagesx"];
					    else if($fd=="1")
						$img_prod=$row["images1x"];
					    else if($fd=="2")
						$img_prod=$row["images2x"];
						
						
					$product_id=$row['prod_id'];
  					$d=date('Y-m-d');
				  	$offer=$db->prepare("select * from soum_offer where prod_id=$product_id and start_dt<='$d' and end_dt>='$d'");
				  	$offer->execute();
  				  	$ores=$offer->get_result();
  				  	$rowo=$ores->fetch_assoc();
				  	$offid=$rowo['offer_id'];
					if($row['prod_cat_id']==2)
						$type="Used";
					else if($row['prod_cat_id']==1)
						$type="New";   
				  			
				   ?>
					<li>
						<div class="ipad text-center" style="position:relative;background: #fff;">
 <?php if($row['current_stock']<=0) {?>
<div style="position:absolute;top:0;left:0;width:100%;height:316px;background-color:rgba(0,0,0,0.1);overflow:hidden;z-index: 999;">
</div><?php } ?>
						
						<?php if($offid!=''){?><div class="sale-box1"><span class="on_sale1 title_shop">
								Offer</span></div><?php } ?>
							<?php     
	                    	if($img_logo=="Admin")
	                    	{
	                    	?>
	                    	<div style="width:auto;float:right;position:absolute;bottom:5px;right: 6px;"><img src="images/admin-icon.png" style="height:30px;z-index: 99;background-color:#fff;"></div>
                        	<?php
                        	}
                        	?>
							<a href="detail.php?prod_id=<?=$row['prod_id'];?>#detail" style="text-decoration:none;"><img src="upload/<?=$img_prod;?>" alt="" />
							<h4 style="margin-top:0px;text-decoration:none;"><?=$row['brand'];?> <?=$row['model'];?></h4></a>
								<div style="width:100%;float:left;text-align:center;margin-bottom:5px;margin-top:5px;">
                                	<div class="Under_star" style="width:100px;margin: auto;">
											 <?php
                                	  
                                	   
										$avg_rat=$row['rating'];
										$avg_rat=round($avg_rat);
										$rem_rat=5-$avg_rat;																		
										for($r=0;$r<$avg_rat;$r++)
										{
										?>
											<span class="rating1"></span>
										<?php
										}
										for($r=0;$r<$rem_rat;$r++)
										{
										?>
											<span class="rating"></span>
										<?php
										}
                                	   
                                	   ?>
												
											</div>
	                                   </div>
							
							<h3 style="text-decoration:none;color:#da200b;">Rs.<?php if($row['appliable_rate']<=$row['offer_price']){echo $row['appliable_rate'];}else{echo $row['offer_price'];}?>/-</h3>
							
							<span class="font16 color-gray dis">
								 <?php if($row['current_stock']<=0){ echo 'Out of Stock';}else{ echo $row['code'];}?>
							</span>
						</div>
					</li>
<?php
}
?>					
				</ul>
			
					          
		</div>
			<div class="col-md-12" style="text-align:center;margin-bottom: 40px;"><a href="phones.php?phone=used" class="theme-btn btn-style-four btn-sm bg-2" style="font-style: normal;border:2px solid#da200b !Important;">View All </a></div>
	  </div>
	  			
	</div>
            </div>
            </div>
    </section>
    
   
    
    
        
    
<section style="background:#fff;padding:30px 0px;box-shadow: 2px 0px 24px -13px;" id="remove1">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="sec-title text-center">
                <h1 style="line-height: 1;margin-top: 8px;text-align:center;">How easy to sell on <span style="color:#000;font-weight: 800;">SOUM</span></h1>
            </div>
			<div class="row clearfix">
                
                <!--Default Icon Column-->
                <div class="default-icon-column col-lg-3 col-md-6 col-xs-12">
                    <article class="inner-box text-center" style="position:relative;">
                        <div class="icon-box center" id="bg-icon">
                        	<span class="border-box"></span>
                            <div class="icon"><img src="images/icon-1.jpg" style="width:59px;height:auto;margin: 16px 14px 0px 0px;"></div>
                        </div>
                        <h3>Get the Best Price</h3>
                        <div class="text">We at SOUM select popular working phone and brings the best price phone is value for money.</div>
                    </article>
                </div>
                
                <!--Default Icon Column-->
                <div class="default-icon-column col-lg-3 col-md-6 col-xs-12">
                    <article class="inner-box text-center" style="position:relative;">
                        <div class="icon-box center" id="bg-icon">
                        	<span class="border-box"></span>
                            <div class="icon"><img src="images/icon-2.jpg" style="width:59px;height:auto;margin: 16px 14px 0px 0px;"></div>
                        </div>
                        <h3>Sell Instantly</h3>
                        <div class="text">At SOUM we have pool of great phones along with reliable
 customers enables instant sale.</div>
                    </article>
                </div>
                
                <!--Default Icon Column-->
                <div class="default-icon-column col-lg-3 col-md-6 col-xs-12">
                    <article class="inner-box text-center" style="position:relative;">
                        <div class="icon-box center" id="bg-icon">
                        	<span class="border-box"></span>
                            <div class="icon"><img src="images/icon-3.jpg" style="width:59px;height:auto;margin: 16px 14px 0px 0px;"></div>
                        </div>
                        <h3>No Call From Buyers</h3>
                        <div class="text">We don't share any confidential 
information of our clients and you get no unnecessary calls on deal.</div>
                    </article>
                </div>
                
                <!--Default Icon Column-->
                <div class="default-icon-column col-lg-3 col-md-6 col-xs-12">
                    <article class="inner-box text-center">
                        <div class="icon-box center" id="bg-icon">
                            <div class="icon"><img src="images/icon-4.jpg" style="width:59px;height:auto;margin: 16px 14px 0px 0px;"></div>
                        </div>
                        <h3>Free Home Pickups</h3>
                        <div class="text">To facilitate quick disposal SOUM offers Free Home Pickups for your saleable phone.</div>
                    </article>
                </div>
                
             
                
            </div>
		</div>
	</div>
</section>       
<section class="testimonials-section" data-bac="#f4f5fa" id="remove1">
        <div class="auto-container">
            <div class="sec-title text-center" style="margin-bottom: 15px;">
                <h1 style="line-height: 1;margin-top: 8px;text-align:center;">Our <span style="color:#000;font-weight: 800;">Happy Client</span></h1>
                <div class="text black_color" style="font-weight: 600;font-size: 15px;">Actions speaks louder than words, here are what client says</div>
            </div>
            
            <!--Slider-->      
            <div class="testimonials-slider testimonials-carousel">
                
                
                <!--Slide-->
                <?php
					$sql=$db->prepare("SELECT * FROM soum_master_customer WHERE user_review!='' order by cust_id desc limit 5");
					$sql->execute();
					$res=$sql->get_result();
					while ($row=$res->fetch_assoc())
					{
					
					  $image=$row['image'];
					  if($image=='')$image='profile.png';
					  $name=$row['fname'];
					  $msg=$row['user_review'];
				?>
                <article class="slide-item" style="min-height: 240px;height: 240px;">
                    <div class="info-box">
                        <figure class="image-box"><img src="upload/profile/<?=$image;?>" alt="" style="width:100px;height:100px;"></figure>
                        <h3><?=$name;?></h3>
                        <p class="designation">&nbsp;</p>
                    </div>
                    <div class="slide-text">
                        <p style="line-height:20px;"><?=$msg;?></p>
                    </div>
                </article>
                <?php } ?>
                


            </div>
            
	<div class="col-md-12" style="text-align:center;">
<a href="happy_clients.php" class="theme-btn btn-style-four btn-sm bg-2" style="font-style: normal;border:2px solid#da200b !Important;">View All </a>
</div>


        </div>    
    </section>
       
	<section class="sponsors-section" style="background-color:#fff;" id="remove1">
        <div class="auto-container">
            <div class="slider-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-slider">
                	<?php
					$sql=$db->prepare("select * from soum_prod_subcat where prod_subcat_id!=0");
					$sql->execute();
					$res=$sql->get_result();
					while($row=$res->fetch_assoc())
					{
						$prod_subcat=$row['prod_subcat_desc'];
						$prod_subcat_id=$row['prod_subcat_id'];					
						$img=$row['logo'];					
						
					?>
                    <li style="width:80px;margin:0px;">
                		<div class="frame-square1">
							<div class="crop">
								<img src="upload/c_logo/<?=$img;?>" alt="" style="border-radius:3px;width:80px;height:64px;"/>
							</div>
						</div>						
					</li>
					<?php
					}
					?>
                </ul>
            </div>            
        </div>
    </section>
    
    
    
    <?php include('_footer.php');?>
    



<div class="col-md-12">
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	load_data = {'fetch':1};
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
	
	$("#deal_box2").click(function (e) {
		$("#deal_box").hide();

		 
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

</script>

		<div class="shout_box" style="overflow:hidden;display:none;z-index: 999;" id="deal_box">

			<div class="cht_1">Today's Deal <div class="close_btn" id="close_btn" style="display:none">&nbsp;</div> <span id="deal_box2" style="float: right;padding: 3px;border: 1px solid #ddd;margin-top: -5px;width: 26px;height: 26px;text-align: center;border-radius: 20px;background: #fff;color: #000;padding-top:3px;font-size: 15px;">X</span></div>
				<div class="toggle_chat" style="display:none">
					<div class="message_box" style="height:320px;">
						<?php $sql="select  
*,soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,soum_product_master.hot_deal_date,
(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.active=1 and soum_product_master.hot_deal=1
ORDER BY hot_deal_date desc";
	//echo $sql;
	//die();
  	$res=$db->query($sql);
  	
  	$real_rate=0;
  	$disc_perc=0;
  $row=$res->fetch_assoc();
  	
  	$real_rate=$row['appliable_rate'];
  	$oprice=$row['offer_price'];
  	$rate=$row['rate'];
  	$img_logo=$row['poster_type'];

  	$per=100-round(($oprice/$rate*100));
  	$gaur=$row['soum_gaur'];
  	//$fd='images'.($row['prime_image']=='0'?'':$row['prime_image']).'x'; 
  	
    $fd=$row['prime_image'];
  	if($fd=="0" || $fd=="")
	$img_prod=$row["imagesx"];
    else if($fd=="1")
	$img_prod=$row["images1x"];
    else if($fd=="2")
	$img_prod=$row["images2x"];
 	
  	
  	
  	if($row['appliable_rate']<=$row['offer_price']){ $disc_perc=$row['appliable_rate'];}else{ $disc_perc=$row['offer_price'];}

	if ($row['hot_deal']==1) $offer=1;
	if ($row['hot_deal_rate']>$disc_perc)
	$disc_perc="<del>".$row['hot_deal_rate'] . "</del>  &nbsp;<i class='fa fa-inr' aria-hidden='true' style='font-size:16px;'></i> " .$disc_perc;

  	$product_id=$row['prod_id'];
  	
  	$d=date('Y-m-d');
  	$offer="select * from soum_offer where prod_id=$product_id and start_dt<='$d' and end_dt>='$d'";
  	
  	$ores=$db->query($offer);
  	$rowo=$ores->fetch_assoc();
  	$offid=$rowo['offer_id'];
  
	if($row['prod_cat_id']==2)
  		{
		$type="Used";
		$boxcolor="background:#fee7f4";
		}
	else if($row['prod_cat_id']==1)
		{
		$type="New";
		$boxcolor="background:#ecffe6";  	
		}
  	
  	
  ?>
				
					<!--offer Deals start-->
						<div class="column default-featured-column style-two col-md-12" id="1product-mobile" >
           		<div id="box-hover" class="inner-box" style="position:relative;">
						           		<?php if($offid!=''){?><span class="product_list_sprite offer_product_label"></span><?php } ?>
						<?php if($row['current_stock']<=0) {?>
						<div style="position:absolute;top:0;left:0;width:100%;height:343px;overflow:hidden;background-color:rgba(0, 0, 0, 0.09);z-index:99;">&nbsp;</div>
						<span class="product_list_sprite sold_product_label"></span>
						<?php } ?>
						
						
	                   <article class="inner-box" style="position:relative">
                        <figure class="image-box">
								<div class="product_img_hold">
							  		<a href="detail.php?prod_id=<?=$row['prod_id'];?>" style="z-index:1"><img src="upload/<?=$img_prod;?>"/></a>
						  		</div>
						  		<?php if($row['hot_deal']){	?>
							  		<img src='images/sale-1.gif' style='width: 20%;height: auto;position: absolute;top: 140px;left: 4px;z-index: 99999;'>
							  	<?php }?>
						  		<a href="detail.php?prod_id=<?=$row['prod_id'];?>" style="z-index:1">
                            <?php if($row['prod_cat_id']==1) { ?>
                            <div class="offer" style="font-size:9px;"><?=$per;?>% off</div>
                            <?php }?></a>
                        </figure>
                        <div class="content-box">
                        	<a href="detail.php?prod_id=<?=$row['prod_id'];?>" style="z-index:1;color:#303030;">
                            <h3 style="height:20px;text-align:center"><?=$row['brand'];?> <?=$row['model'];?></h3>
                            <div style="width:100%;float:left;text-align:center;margin-bottom:6px;">
                                            	<div class="Under_star" style="width:100px;margin: auto;">
                                                        <?php
															$avg_rat=$row['rating'];;
															$avg_rat=round($avg_rat);
															$rem_rat=5-$avg_rat;
															for($r=0;$r<$avg_rat;$r++)
															{
															?>
																<span class="rating1"></span>
															<?php
															}
															for($r=0;$r<$rem_rat;$r++)
															{
															?>
																<span class="rating"></span>
															<?php
															}
														?>
												 </div>
                                            </div>
                            <div class="column-info" style="margin-bottom:3px;font-size:15px;text-align:center"><span class="raised-amount" style="color:#da2009;font-weight:bold;font-size:15px;margin-right:0px;"><i class="fa fa-inr" aria-hidden="true" style="font-size:16px;"></i> <?=$disc_perc;?>/-
                            </span>
                           	<?php if($row['prod_cat_id']==1) { ?> <span class="old_price" style="color: #303030;font-weight:bold;font-size:15px;"><i class="fa fa-inr" aria-hidden="true" style="font-size:16px;"></i> <?=$row['rate'];?></span> <?php }?> </div>
							
                        </div>
                    </article>
                    </div>
                </div>
                
                <!--offer Deals end-->
                <div style="width:100%;float:left;margin-top:15px;">
               		<a href="phones_deals.php" class="theme-btn btn-style-four btn-sm bg-2" style="font-style: normal;border:2px solid#da200b !Important;width:90%;margin:auto;text-align: center;float: none;margin-left: 15px;">More Deals</a>
				</div>
				    
				</div>
			</div>
		</div>  
	</div>




<script>
var b=0;
window.onload = setTimeout(function(){
	if(b==0)
	{
	$("#deal_box").show();
	document.getElementById("close_btn").click();
	b=1;
	}
}, 10000);
//$('.close_btn').click();
</script>


    
    
<!--*************Popup Start**********-->
<div id="myModal1" class="modal" style="z-index:99999;">
  <!-- Modal content -->
  <div class="modal-content2">
  <div class="col-md-12" style="padding:0px;float:left;background-color:#fff;margin:0px;">
    <div class="modal-header" style="position:relative">
     
      <h2 style="text-align:center;font-weight:normal;font-size: 25px;">Need <strong>Used Phone</strong> at affordable prices</h2>
      <p style="margin:0px;padding:0px;text-align:center;">Let our Expert to assist you in finding a best phone at affordable price.</p>
      <img src="images/shadow.jpg" style="width:100%;float:left;position: absolute;bottom: -17px;left: 0;">
    </div>
    <div class="modal-body" style="padding: 10px;padding-top: 20px;width:100%;float:left;">
      <form name="myForm" onsubmit="return validateForm()" method="post" action="register_save.php" enctype="multipart/form-data">
           
           <div class="col-md-6">
               <p style="margin:0px;"><label>Mobile No <span class="red-text">*</span></label></p>
               <input name="mobile" id="mobile" onchange="client(this.value)" class="form-control" type="text" placeholder="Mobile No."/>
           </div>
           <div class="col-md-6" >
               <p style="margin:0px;"><label>Name <span class="red-text">*</span></label></p>
                <div id="name_loader"></div>
                <input name="fname" id="fname" class="form-control" type="text" placeholder="Name"/>
           </div>
           
           <div class="col-md-6" style="display:none;">
               <p style="margin:0px;"><label>Email Address <span class="red-text">*</span></label></p>
               <input name="email" id="email1" class="form-control" type="text" />
			</div>
			 <div class="col-md-6" style="display:none;">
               <p style="margin:0px;"><label>Pin Code <span class="red-text">*</span></label></p>
               <input name="pincode" id="pincode1" class="form-control" type="text" />
			</div>
		 		                    
            <div class="col-sm-12" style="width:100%;float:left;">       
                <div style="width:100%;float:left;text-align:center;margin-top:20px;"><input name="Button1" value="Submit" id="Button1" class="theme-btn btn-style-two btn-sm mr-10 bg-2" type="submit"></div>
     		</div>
        </form>
   	</div>
    </div>
  </div>
</div>
<!--*************popup End**********-->
   
   
<!-- *******************popup pre launch offer****************-->
<div id="myModal2" class="modal" style="padding-top:50px;">
  <!-- Modal content -->
  
</div>
<!--*******************end popup pre launch**************-->

   
   
   
   
   
   
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper"><span class="fa fa-long-arrow-up"></span></div>
<!--Donate Popup-->
<!-- /.modal -->
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
				<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
			    	responsiveBreakpoints: { 
			    		portrait: { 
			    			changePoint:480,
			    			visibleItems: 1
			    		}, 
			    		landscape: { 
			    			changePoint:640,
			    			visibleItems: 2
			    		},
			    		tablet: { 
			    			changePoint:768,
			    			visibleItems: 3
			    		}
			    	}
			    });
			    
			});
		</script>
		<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo2").flexisel({
					visibleItems: 5,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
			    	responsiveBreakpoints: { 
			    		portrait: { 
			    			changePoint:480,
			    			visibleItems: 1
			    		}, 
			    		landscape: { 
			    			changePoint:640,
			    			visibleItems: 2
			    		},
			    		tablet: { 
			    			changePoint:768,
			    			visibleItems: 3
			    		}
			    	}
			    });
			    
			});
		</script>
		
<script>
var usertype='<?=$_SESSION["poster_type"];?>';
$(document).ready(function () {
if(usertype!='Admin' && usertype!='Dealer')
{
$('#myModal1').show();
}
var mob=localStorage.getItem("mobile");
if(mob!=null)
{
	client(mob);
	close1();
}
});
function close1()
{
    $('#myModal1').hide();
}
</script>
<script>
$("document").ready(function()
{
	fill('fill2.php','soum_prod_subcat','');
	
	
	//*******************popup********************************
	
    $.ajax({
		type:"Post",
		url:"prelaunch_popup.php",
		data:"act=2",
		success:function(html) 
		{
		  if(html!=0){ popup();}	
		  $("#myModal2").html(html);
		}
	}); 

	
});
function fill2(p)
{
	pr=' where prod_subcat_id='+p;
	fill('fill2.php','soum_prod_subsubcat',pr);	
}
function fill(f,fname,param)
{
	$.ajax({
		type:"Post",
		url:f+"?fname="+fname+param,
		success:function(html) 
		{
		  
			$("#"+fname).html(html);
		}
	}); 
}
function modal1(item)
{
    var val=item;
     var b=$("#soum_prod_subcat").val();
     //alert("brand="+b+"&model"+val);
       $.ajax({
          
           type:"POST",
           url:"instock.php",
           data:"brand="+b+"&model="+val,
           
           success:function(data)
           {
            $("#dtl").html(data);
           }
       
       });
}
function client(mob)
{
    var m=(mob.substr(0,1))*1;
   
    if(m>=0 && m<=6)
    {    
      alert("Enter valid number");
      return false;

    }    
    
    if(mob.length<10)
    {
      alert("Enter valid number");
      return false;
    }

$('#fname').hide();
 $('#name_loader').html("<img src='upload/loader.gif' width='50' height='50'>");
   $.getJSON('client.php?callback=?','mob='+mob+'&act=client', function(data){
   
		if(data)
		{ 		  
		  $.each(data,function(i,element){
 
		     
              if(element.fname!='' || element.fname=='')
              {
               $('#name_loader').html(""); 
               $('#fname').show();
              }
		      $('#fname').val(element.fname);
           
		                  
          });
        }
        if(data=='')
        {
          
               $('#name_loader').html(""); 
               $('#fname').show(); 
               $('#fname').val('');            
		      
        }           
  
     });    
}
</script>
		
		
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script src="js/revolution.min.js"></script>
<script src="js/owl.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/wow.js"></script>



<script src="js/script.js"></script>

<script>

function popup()
{

window.onload = setTimeout(function(){
modal.style.display = "block";
}, 10000);
}

var modal = document.getElementById('myModal2');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}

function close_2()
{
	$('#myModal2').hide();
}

</script>



<script>
$("#fname").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});
$("#mobile").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9]/g)) {
       $(this).val(val.replace(/[^0-9]/g, ''));
   }
   
   if (val.length>10)
	{
       $(this).val(val.substr(0,10));

   }

});
</script>

<script>
$(function() {
 $('#text3').hover(function() {
   $('#text1').css('border', '10px solid rgba(221, 25, 45, 0.5)');
   $('#text2').css('color', '#dd192d');
 }, function() {
  
   $('#text1').css('border', '');
   $('#text2').css('color', '');
 });
 $('#text4').hover(function() {
   $('#text-1').css('border', '10px solid rgba(221, 25, 45, 0.5)');
   $('#text-2').css('color', '#dd192d');
 }, function() {
  
   $('#text-1').css('border', '');
   $('#text-2').css('color', '');
 });
 $('#text5').hover(function() {
   $('#text_1').css('border', '10px solid rgba(221, 25, 45, 0.5)');
   $('#text_2').css('color', '#dd192d');
 }, function() {
  
   $('#text_1').css('border', '');
   $('#text_2').css('color', '');
 });
});
</script>
<?php
if (ISSET($_SESSION['poster_id'])) echo "<script>$(document).ready(function(){ close1(); });</script>";
	
?>
</body>
</html>
