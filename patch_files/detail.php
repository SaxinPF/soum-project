<?php 
	include('config.php');
	$user_id=mysqli_real_escape_string($db,$_SESSION['poster_id']);
	$user_type=mysqli_real_escape_string($db,$_SESSION['poster_type']);
	$prod_id=mysqli_real_escape_string($db,$_REQUEST['prod_id']);
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
<script src="admin/scripts/vendors.js"></script>
 
<style>
#etalage li img{
	width:auto !important;
	float:none !important;
	margin:auto !important;
	display: inherit;
}
.etalage_small_thumbs{
	top:402px !important;
}
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted #c6c6c6;
    opacity: 10;
}
.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}
.tooltip:hover .tooltiptext {
    visibility: visible;
}
.etalage_magnifier div img{
	display:inherit !Important;
}
.color-gray {
    color: #000 !important;
    background-color: transparent;
    margin-bottom: 10px;
}
.ipad {
    width: 95%;
    margin: 0 auto;
    padding: 10px 5px 25px 5px;
    overflow: hidden;
    box-shadow: 4px 5px 4px -5px;
}
.xzoom-container img {
    width: auto !important;
    max-height: 390px;
    max-width: 100%;
    margin: auto;
    float: none;
}
.xzoom-thumbs img{
	width:auto;
	max-width:100% !important;
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
	background:#fff;
}
.flash {
   animation-name: flash;
    animation-duration: 0.3s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    animation-play-state: running;
}
.access{
	width:46%;float:left;padding:5px;margin-right:10px;background-color:#f2f2f2;border:1px solid#ddd;text-align:center;margin-top:10px;
}

@keyframes flash {
    from {color: #e92438;}
    to {color: black;}
}
</style>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.js"></script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>

<script>
$("#name").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});
jQuery(function($){
  
   $("#mobile").mask("9 9 9 9 9 9 9 9 9 9",{placeholder:"__________"});
   
});

$("document").ready(function()
{
   var mob=localStorage.getItem("mobile");
	if(mob!=null)
	{
		client(mob);
		
	}
});
	function valid()
	{
		qty=$('#qty').val();
	tot_qty=+qty + 50;
	for(i=0;i<=tot_qty;i=i+50)
	{

		if(i!=tot_qty)
		{
			r=0;
		}
		else
		{
			r=1;
		}
	}
	}
	
	
function bynow()
{
   var log='<?=$user_id;?>';
   var prod_id='<?=$prod_id;?>';
    	
    	if(log!='')
    	{
    	   window.location.href="order_detail2.php?prod_id="+prod_id;
    	}
    	else
    	{
    	  
    	  window.location.href="login.php?cart_value=detail&prod_id="+prod_id;
    	  
    	}	
}	
function client(mob)
{
   $.getJSON('client.php?callback=?','mob='+mob+'&act=client', function(data){
		if(data)
		{ 		  
		  $.each(data,function(i,element){
		      $('#poster_id').val(element.cust_id);
		      $('#name').val(element.fname);
		      $('#mobile').val(element.mobile);
			        
          });
        } 
     });    
}
</script>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>
<body style="padding:0px;">
<div class="page-wrapper" style="background:#f7f7f7;">
 	
    <!-- Preloader -->
    <div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
    
 	<header class="header-style-two">
	 	<?php include('_header.php');?>
 	</header>
    <!-- Main Header -->
    <!--Team Section-->
    
    <section class="member-details" style="padding-top:30px;"> 
        <div class="auto-container">
        	
            <!--Column-->
            <article class="column team-member">
                <div class="inner-box">
                	<div class="row clearfix">
                    	<div class="col-md-12" style="width:100%;background-color:#f7f7f7;">
	<?php	
		$dtm=date('Y-m-d H:i:s');
		$sql1=$db->prepare("insert into soum_view_count(date,prod_id,user_id,user_type) values(?,?,?,?)");
		$sql1->bind_param("ssss",$dtm,$prod_id,$user_id,$user_type);
		$sql1->execute();
	   
		$sql=$db->prepare("select  
			*,soum_prod_subcat.prod_subcat_desc as brand1,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
			if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
			if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
			if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,
			(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
			
			from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
			where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
			and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
			and soum_product_master.prod_id=?
			and soum_product_master.active=1");

		/** BOF Security Patch IS-002*/
	   $sql->bind_param('i', $prod_id); 
	   $sql->execute();		  
	   $res=$sql->get_result();
	   /** BOF Security Patch IS-002*/
	   $real_rate=0;
	   $disc_perc=0;
	   $row=$res->fetch_assoc();
	   
	   $real_rate=$row['appliable_rate'];
  	   $img_logo=$row['poster_type'];
  	if($row['dis_type']==1)
  	{  	
  		$disc_perc1=round(($row['discount']*$real_rate)/100);
  		$disc_perc=$real_rate-$disc_perc1;
  		$dis=$row['discount']." %";
  	}
  	else if($row['dis_type']==2)
  	{
  	   $disc_perc=$real_rate-$row['discount'];
       $dis=$row['discount']." flat";
  	}
  	else
  	{
  	   $disc_perc=$row['appliable_rate'];
       $dis='0%';
  	}
	   $image_string=($row['images']=='0'?"":$row['imagesx']);
	   $image_string.=($row['images1']=='0'?"":",".$row['images1x']);	   
	   $image_string.=($row['images2']=='0'?"":",".$row['images2x']);	   
	   $image_string.=($row['images']=='0'?"":",".$row['imagesx']);	   	   	   
	   $image_array=explode(",",$image_string);
	   $ptype=$row['prod_cat_id'];
	   $uid=$row['poster_id'];
   		
   	if($row['appliable_rate']<=$row['offer_price']){ $disc_perc=$row['appliable_rate'];}else{ $disc_perc=$row['offer_price'];}	
   	if ($row['hot_deal']==1) $offer=1;
	if ($row['hot_deal_rate']>$disc_perc)
	$disc_perc="<del>".$row['hot_deal_rate'] . "</del>  &nbsp;<i class='fa fa-inr' aria-hidden='true' style='font-size:22px;'></i> " .$disc_perc;

   		
  	$d=date('Y-m-d');
  	/** BOF Security Patch IS-002*/
  	$offer=$db->prepare("select * from soum_offer where prod_id=? and start_dt<='$d' and end_dt>='$d' and active=1");
  	$offer->bind_param('i', $prod_id); 
  	$offer->execute();
  	$ores=$offer->get_result();
  	/** BOF Security Patch IS-002*/
  	$rowo=$ores->fetch_assoc();
  	$offid=$rowo['offer_id'];
  	$offimg=$rowo['offer_image'];
    $offtitile=$rowo['offer_title'];
	$offdesc=$rowo['offer_desc1'];
	$postby=$row['poster_id'];
	$posttype=$row['poster_type'];
    $view=$row['review'];
    $active=$row['active'];
    $priority=$row['priority'];
    $Status=$row['deal'];
    $cstock=$row['current_stock'];
	$modal=$row['modal'];
	
	$acc=$row['condi'];
    $gaur=$row['soum_gaur'];

	$prodname1=$row['brand1']." ".$row['model'];
	$offerPrice=$row['offer_price'];
		
$avg_rat=$row['rating'];
$avg_rat=round($avg_rat);
$rem_rat=5-$avg_rat;
?>
		<div class="col-md-12" id="padding-remove">
				<div class="column image-column col-lg-5 col-md-5 col-sm-5 col-xs-12" style="padding-left:0px;min-height:270px;" id="remove1">
					<div style="width:100%;float:left;background:#fff;box-shadow: 3px 3px 3px -4px;padding: 0px 18px 0px 20px;">
					<section id="fancy">
					    <div class="row">
					      <div class="large-5 column">
					        <div class="xzoom-container" style="display: inherit;width: 100%;float: left;text-align:center">
					          <img class="xzoom4" id="xzoom-fancy" src="upload/<?=$row['imagesx'];?>" xoriginal="upload/<?=$row['imagesx'];?>" style="width:100%"/>
					          <div class="xzoom-thumbs">
					            <a href="upload/<?=$row['imagesx'];?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="upload/<?=$row['imagesx'];?>"  xpreview="upload/<?=$row['imagesx'];?>"></a>
					            <?php if($row['images1x']!=''){?>
					            <a href="upload/<?=$row['images1x'];?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="upload/<?=$row['images1x'];?>"></a>
					             <?php } 
					             if($row['images2x']!=''){?>
					            <a href="upload/<?=$row['images2x'];?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="upload/<?=$row['images2x'];?>"></a>
					         <?php } ?>
							 </div>
					        </div>          
					      </div>
					      <div class="large-7 column"></div>
					    </div>
					    </section>
					</div>
			  	</div> 
			  	
				<div class="col-lg-4 col-md-4" id="padding-remove">
				  <div class="desc1" style="width:100%;float:left;">
				  	<div class="col-md-12" style="padding:0px;">
						<div class="icon-product" id="remove2">
							<img src="upload/<?=$row['imagesx'];?>" style="width:100%;float:left;text-align:left;height:auto;">
						</div>
						<div class="icon-product2">
						<h3 class="proDetail" style="margin-right: 25px;width:100%;float:left;" id="font-mobile"><?=$prodname1;?> <span style="margin-left:5px;font-size:14px;" id="remove1"><?=$row['code'];?></span></h3>
						<p style="font-size:14px;font-weight:bold;margin:0px;margin-top:5px;text-align:left;float:left;width:100%" id="remove2"><?=$row['code'];?></p>
						<p class="cutPrice" style="color:#da200a;font-size:22px;margin-bottom:0px;font-weight:bold;font-family: inherit inherit;float:left;width:100%;min-width:175px;" id="remove2">Rs. <?=$disc_perc;?>/-</p>
						</div>
					</div>
				  	<div style="width:100%;float:left;">
				  		<div class="Under_star" style="width:auto;float:left;margin-top:9px;">
							  	<?php
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
						<div class="reviewbtn"><a class="btn bt1 btn-primary btn-normal btn-inline" id="myBtn_1" style="background: #da200a;border-color: #da200a;padding: 2px 11px;">Write Your Review</a> </div>
						</div>
		
			<div class="product-information" style="padding-top: 10px;min-height:335px;float:left;width: 100%;">
			<div style="width:100%;float:left;">
			<hr style="margin-top:3px;margin-bottom:3px;">
			                <div style="width:100%;float:left;"> 
									<span class="proPrice">
									<?php if($ptype==1) { ?>
								    <span>
								    <h2 class="proPrice">								    
								    	<p class="cutPrice" style="color: #d61f85;height: auto;font-size:21px;margin-bottom:0px;font-weight:500;font-family: inherit inherit;">MRP: <strike>Rs. <?=$row['rate'];?></strike>/-</p>	
								    	<p style="color: green;font-weight: 500;height: auto;font-size: 22px;margin-bottom:0px;font-family: inherit inherit;">Offer Price: Rs. <?php if($row['appliable_rate']<=$row['offer_price']){echo $row['appliable_rate'];}else{echo $row['offer_price'];}?>/-</p>
									</h2>
									</span>
									<?php } else { ?>
									<span>
									<h2 class="proPrice">								    
								    	<p class="cutPrice" style="color:#da200a;font-size:22px;margin-bottom:0px;font-weight:bold;font-family: inherit inherit;float:left;width:auto;min-width:175px;" id="remove1"><i class='fa fa-inr' aria-hidden='true' style='font-size:22px;'></i> <?=$disc_perc;?>/-</p>
								    	<?php if($row['yearbyadmin']!=''){?><p class="oldbg"><span class="flash">(<?=$row['yearbyadmin'];?>)</span></p><?php }?>
								    </h2>
								    
								    </span>
									<?php } ?>
                                     </span>
                                     
                             	<?php if($row['hot_deal']){	?>
                         		<div class="col-md-12" style="padding:0px;">
                             	<div style="width:100%;float:left;background-color:#f99b29;color:#000;padding:4px 10px;padding-left: 55px;position: relative;">
                         		<img src='images/sale-1.gif' style="width: 15%;height: auto;float:left;margin-right:10px;text-align:left;position: absolute;left: -9px;top: -10px;">
				  					<?php 				  				
				  					if($row['hot_deal_message']=='' || $row['hot_deal_message']=='0'){ echo "Today's Deal";} else{echo $row['hot_deal_message'];}?>
				  				</div>
				  				</div>
								<?php }?>	  			
							  		            </div>
                              <table style="width:100%;float:left;" class="list-detail">
                                <tr class="list-tr"><td style="width:40%"><b>Display:</b></td><td style="width:60%"><?=$row['display'];?> inch</td></tr>
                                <tr><td><b>Battery:</b></td><td><?=$row['battry'];?> mAh</td></tr>
                                <tr class="list-tr"><td><b>OS: </b> </td><td><?=$row['os'];?></td></tr>
                                <tr><td><b>Processor:</b> </td><td><?=$row['processor'];?></td></tr>
                                <tr class="list-tr"><td><b>RAM: </b></td><td><?=$row['ram'];?></td></tr>
                                <tr><td><b>Rom :</b></td> <td> <?=$row['p_rom'];?>GB</td></tr>
                                <tr class="list-tr"><td><b>Front Camera:</b></td><td> <?=$row['fcame'];?>MP</td></tr>
                                <tr><td><b>Back Camera:</b></td><td> <?=$row['bcame'];?>MP</td></tr>
                                <tr class="list-tr"><td><b>Colors :</b></td> <td> <?=$row['colour'];?></td></tr>                                
								<tr><td><b>Weight :</b></td> <td> <?=$row['p_weight'];?>gm</td></tr>
			
                                </table>
							</div>
							
                <?php 
                if($user_type!='Dealer'){
                if($ptype==1)
                {
                ?>				
		   		    <form method="post" action="add_to_cart.php" onsubmit="return valid()">	   		    
					  <div style="width:100%;float:left;margin-top:20px;">
						<div class="col-md-12" style="padding-left:0px;">
						<input type="hidden" name="pid[]" value="<?=$prod_id;?>" id="pid"/>
			   		    <input type="hidden" name="qty[]" value="1" id="qty" style="border: 1px solid#ddd;padding:6px;border-radius:2px;width:160px;margin-botom:10px;float:left;margin-right:10px;"/>
			   		    <?php if($cstock>0){?>
			   		    <input type="submit" value="ADD TO CART" class="btn donate-btn btn-primary btn-normal btn-inline" style="margin-bottom:10px;min-width:160px;float:left;margin-botom:5px;color:#fff;background-color:#da200b;border-color: #da200a;"/>
						<?php }else{?>
			   		    <input type="button" value="Out of stock" class="btn donate-btn btn-primary btn-normal btn-inline" style="margin-bottom:10px;min-width:160px;float:left;margin-botom:5px;color:#fff;background-color:#da200b;border-color: #da200a;"/>
						<?php }?>
						<p class="availability" style="width:100%;float:left;margin-top:10px;">Availability : <span class="color" style="color:#fbaf17;font-weight:bold;"> In Stock</span></p>
						</div>
					
						</div>
					</form>	
				<?php 
				}
				else 
				{ 
				?>
                    <?php  
                    if($postby!=$user_id)
                    {
                    if($cstock!=0){?>
                   <input type="button" id="myBtn" value="I am intrested" onclick="bynow()" class="btn bt1 btn-primary btn-normal btn-inline mobil-btn" style="margin-bottom:10px;min-width:160px;margin-top:20px;float:left;margin-botom:5px"/>
			       <?php }else{?>
			   		    <input type="button" value="Out of stock" class="btn bt1 btn-primary btn-normal btn-inline" style="margin-bottom:10px;min-width:160px;margin-top:20px;float:left;margin-botom:5px"/>
				   <?php } } }?>
		       <?php 
		          } 
		          ?>
		       
			</div>
			</div>
		    
						</div>
			
			<div class="col-md-3" style="position:relative">
			     <?php 
			     if($img_logo=="Admin" ) {?>
				  <img src="images/original.png" style="width:auto;float:left;">
				<?php 
				}
				else if($gaur==1)
				{
				?>
				<img src="images/original.png" style="width:auto;float:left;">
				<?php }
				
				if($acc!='')
				{
				$access=substr($acc,0,strlen($acc)-1);
				$access=explode(",",$access);
				?>
				<div style="width:100%;float:left;margin-top:10px;margin-bottom:10px;">
				<h3 style="width:100%;float:left;margin-bottom:5px;">Accessories</h3>
				<?php
				foreach($access as $a=>$b)
                 {
                   $sqla="select * from soum_phone_assecc where access_id=$b";
                   $resa=$db->query($sqla);
                   $row=$resa->fetch_assoc();
                   
                   echo "<div class='access'>".$row['access_name']."</div>";
                 }
                 ?>
					
				</div>
			    <?php } ?>	
			</div>
			
            	 
                <!--Column-->
           <div class="column col-md-12 col-sm-12 col-xs-12" style="margin-top:50px;">
           <h1 style="line-height: 1;margin-top: 8px;text-align:center;" class="mobile-des1">Related <span style="color:#000;font-weight: 800;">Used Phone</span></h1>
   	<div class="device">
		<div class="course_demo" style="background:transparent;padding-top:0px;">
			<ul id="flexiselDemo3">	
	          <?php
				$sql=$db->prepare("select  
				*,soum_prod_subcat.prod_subcat_desc as brand1,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
				if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
				if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
				(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
				from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
				where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
				and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
				and soum_product_master.active=1
				and soum_product_master.prod_cat_id=2 and soum_product_master.deal!=1  order by p_type LIMIT 0, 10");
				$sql->execute();
				$res=$sql->get_result();
					
					while($row=$res->fetch_assoc())
					{
						$disc_perc=0;
						//$img_prod=$row['imagesx'];	
						$img_logo=$row['poster_type'];					
						
						
					$product_id=$row['prod_id'];
  					$d=date('Y-m-d');
  					/** BOF Security Patch IS-002*/
				  	$offer=$db->prepare("select * from soum_offer where prod_id=? and start_dt<='$d' and end_dt>='$d'");
				  	$offer->bind_param('i', $product_id);
  				  	$offer->execute();
  				  	$ores=$offer->get_result();
  				  	/** EOF Security Patch IS-002*/
  				  	$rowo=$ores->fetch_assoc();
				  	$offid=$rowo['offer_id'];
					if($row['prod_cat_id']==2)
					 $type="Used";
					else if($row['prod_cat_id']==1)
					 $type="New"; 
						
 
					$gaur=$row['soum_gaur'];
					/******pawan**********/
					$fd=$row['prime_image'];
				  	if($fd=="0" || $fd=="")
					$img_prod=$row["imagesx"];
				    else if($fd=="1")
					$img_prod=$row["images1x"];
				    else if($fd=="2")
					$img_prod=$row["images2x"]; 
				  			
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
	                    	<div style="width:auto;float:right;position:absolute;bottom:5px;right: 6px;"><img src="images/admin-icon.png" style="width:auto;height:30px;z-index: 99;background-color:#fff;"></div>
	                    	<?php
	                    	}
                        	?>
							<a href="detail.php?prod_id=<?=$row['prod_id'];?>" style="text-decoration:none;"><img src="upload/<?=$img_prod;?>" alt="" />
							<h4 style="margin-top:0px;text-decoration:none;"><?=$row['brand1']." ".$row['model'];?></h4></a>
								<div style="width:100%;float:left;text-align:center;margin:5px 0px;">
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
							
							<h3 style="text-decoration:none;color:#da200b;font-size: 16px;margin-bottom:10px;width:100%;text-align:center;">Rs.<?php if($row['appliable_rate']<=$row['offer_price']){echo $row['appliable_rate'];}else{echo $row['offer_price'];}?>/-</h3>
							
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
	  </div>
	  			
	</div>
            
			          </div>
			          
					</div>
				</div>        
			</div>
		</article>
	</div>
</section>
    <!--Main Features-->
    
    
    <!--start footer -->
	<?php include('_footer.php');?>
	<!--end footer -->
    
</div>
<!--End pagewrapper-->
<div id="myModal2" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" style="position:relative">
      <span class="close" onclick="close_2()">&times;</span>
      <h2 style="text-align:center;font-size:24px;">One Step Away From <strong>Your Phone</strong></h2>
      <p style="margin:0px;padding:0px;text-align:center;line-height: 15px;">Fill below details and let our executive to contact you.</p>
      <img src="images/shadow.jpg" style="width:100%;float:left;position: absolute;bottom: -16px;left: 0;">
    </div>
    <div class="modal-body">
    <form method="post" action="order_detail2.php">
       <input name="prod_id" value="<?=$prod_id?>" type="hidden" />
       <input name="poster_id" id="poster_id"  type="hidden" />
      <p><input type="text" name="name" id="name" placeholder="Name" style="padding:5px;border:1px solid#ababab;border-radius:2px;width: 100%;"></p>
      <p><input type="text" mobile="mobile" id="mobile" onchange="client(this.value)" placeholder="Mobile No." style="padding:5px;border:1px solid#ababab;border-radius:2px;width: 100%;"></p>
      <p><textarea style="padding:5px;border:1px solid#ababab;border-radius:2px;width: 100%;" name="desc" rows="4" >Hello Soum Team, I wish to buy "<?=$prodname1;?>", and would like to discuss about its price. I have shared my phone number so you could call me anytime. I am ready to buy this phone in your specified budget of "<?=$offerPrice;?>"</textarea></p>   
      <p style="text-align:center"><input type="submit" class="theme-btn btn-style-four btn-sl bg-2" style="font-style: normal;background-color: #e92438;border: 2px solid #e92438 !important;" value="Submit"/></p>   
 </form>
      </div>
  </div>
</div>
<!-- review poup-->
<div id="myModal_1" class="modal">
  <!-- Modal content -->
  <div class="modal-content" style="width: 53%;">
    <div class="modal-header" style="position:relative">
      <span class="close" onclick="close1()">&times;</span>
      <h2 style="text-align:center;font-size: 25px;">Product <strong>Review </strong></h2>
      <p style="margin:0px;padding:0px;text-align:center;">Your feedback is live in terms of Star Ratings, please contribute</p>
      <img src="images/shadow.jpg" style="width:100%;float:left;position: absolute;bottom: -16px;left: 0;">
    </div>
    <div class="modal-body" style="width:100%;float:left;background-color:#fff;">
		    <div class="col-md-12" style="padding:0px;">  
					<?php
						/** BOF Security Patch IS-002*/
						$prod_id=mysqli_real_escape_string($db,$_REQUEST['prod_id']);
						$sql=$db->prepare("select  
						*,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
						if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
						if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
						(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
						
						from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
						where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
						and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
						and soum_product_master.active=1 and prod_id=?");
						$sql->bind_param('i', $prod_id); 
						$sql->execute();
						$res=$sql->get_result();
						$row=$res->fetch_assoc();
						/** EOF Security Patch IS-002*/
						$img=$row['imagesx'];
						$postid=$row['poster_id'];
					?>
					<form method="post" action="review_act.php" onsubmit="return valid()" name="radioForm">
				   <div class="col-md-6">
				   
				   	<input name="custid" type="hidden" value="<?=$postid;?>">
				   	<div class="col-md-6" style="padding:0px;">
						<div style="width:100%;float:left;background-color:#fff;text-align:center;"><img style="max-height:190px;width:auto;float:none;margin:auto;max-width:100%;" src="upload/<?=$img?>"/></div>
						<div style="width:100%;float:left;text-align:center;margin-top:8px;background-color:#fff;padding:8px;"><?=$row['code'];?></div>
					   </div>
					
					<div class="col-md-6">
						<?php 
							/** BOF Security Patch IS-002*/
							$sql_ord=$db->prepare("select * from soum_order_details where prod_id=?");
							$sql_ord->bind_param('i', $prod_id); 
							$sql_ord->execute();
							$res_ord=$sql_ord->get_result();
							$tot_orders=mysqli_num_rows($res_ord); 
							/** EOF Security Patch IS-002*/
						?>
							<div style="margin:5px;padding:10px;border:1px solid#ddd;width:100%;float:left;"><?=$tot_orders;?> : Orders</div>
					
						<?php 
							/** BOF Security Patch IS-002*/
							$qry=$db->prepare("select * from soum_product_review where prod_id=?");
							$qry->bind_param('i', $prod_id); 
							$qry->execute();
							$result=$qry->get_result();
							$tot_reviews=mysqli_num_rows($result);
							/** EOF Security Patch IS-002*/
							$tot_rat='';
							$avg_rat='';
							while($rec=$result->fetch_assoc()) 
							{
								$rating=$rec['rating'];
								$tot_rat=$tot_rat + $rating;
							}
							$avg_rat=$tot_rat/$tot_reviews;
							
							if($avg_rat=='')
							{
								$avg_rat=0;
							}
						?>
						
							<div style="margin:5px;padding:10px;border:1px solid#ddd;width:100%;float:left;"><?=$tot_reviews;?> : Total Reviews</div>
							<div style="margin:5px;padding:10px;border:1px solid#ddd;width:100%;float:left;"><?=$avg_rat;?> : Average Rating</div>
					</div>
				</div>
				   
				   <div div class="col-md-6" style="float:left;">
				   <h4 style="padding:10px;background-color:#ddd;margin:0px;font-size:16px;float:left;width: 100%;margin-bottom: 20px;">What Do You Think About This Product</h4>
				   <hr/>
				   <table style="width: 100%">
					<tr>
						<td class="review_td"><label>Short Comment</label> <input type="text" name="comment" id="short_cmnt" style="width:100%;float:left;padding:5px;border:1px solid#ddd;margin-bottom:10px;"/></td>
					</tr>
					<tr>
						<td class="review_td" valign="top" width="180"> 
						<span style="float:left;width:auto;margin-right:15px;"><label>Rating*</label></span>
		      <span style="float:left;width:auto;"> <input name="star1" type="radio" value="1" class="star"/>
		       <input name="star1" type="radio" value="2" class="star"/>
		       <input name="star1" type="radio" value="3" class="star"/>
		       <input name="star1" type="radio" value="4" class="star"/>
		       <input name="star1" type="radio" value="5" class="star"/></span>
		      </td>
					</tr>
					<tr>
						<td class="review_td">
						<label>Description* Max Characters Length 500</label>
						<textarea name="desc" id="desc" style="width:100%;float:left;padding:5px;border:1px solid#ddd;"></textarea></td>
					</tr>
					<tr>
						<td class="style2" style="padding-top:15px;"><input type="submit" name="save_review" value="submit" class="theme-btn btn-style-four btn-sl" style="padding: 5px 20px;"></td>
					</tr>
								<input type="hidden" name="prod_id" value="<?=$prod_id;?>"/>
					</table>			
				   </div>
				   </form>
		
		
		</div>
   
 </div>
  </div>
</div>
<!--Scroll to top-->
<!--Donate Popup-->
<!-- /.modal -->
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css1/flexslider.css" type="text/css" media="screen" />
<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo3").flexisel({
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
				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	<script src='js/star/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
 <script src='js/star/jquery.rating.js' type="text/javascript" language="javascript"></script>
 <link href='js/star/jquery.rating.css' type="text/css" rel="stylesheet"/>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/jqzoom.js"></script>
<script src="js/script.js"></script>
<script>

var modal1 = document.getElementById('myModal_1');
var btn1 = document.getElementById("myBtn_1");
var span1 = document.getElementsByClassName("close")[0];
btn1.onclick = function() {
    modal1.style.display = "block";
}
span1.onclick = function() {
    modal1.style.display = "none";
}
function close1()
{
	$('#myModal_1').hide();
}
</script>
<script>
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
<script type="text/javascript" src="zoom/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="zoom/xzoom.css" media="all" />
    <script src="zoom/setup.js"></script>
</body>
</html>