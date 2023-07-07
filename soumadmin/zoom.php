<?php 
include('../config1.php');
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
                       	     $type2=$_REQUEST['type'];
                       	     $poster_id=$_REQUEST['poster_id'];
                       	     $prod_id=$_REQUEST['prod_id'];
                       	     $act=$_REQUEST['act'];
                       	     
                       	                           	     
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
			(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
			
			from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
			where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
			and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
			and soum_product_master.prod_id=$prod_id";
							  //echo $sql;
							  $res=$db->query($sql);
							  $row=$res->fetch_assoc();							     
                                
                                $img4=$row['seller_img'];
                                $img5=$row['bill_img'];
                                $img6=$row['add_proof_img'];
                                $active=$row['active'];
                                
                                if($img4!=''){ $img=$img4; } else if($img5!=''){ $img=$img5; } else if($img6!=''){ $img=$img6; }
                                
                                
							?>
					<!-- #end row -->
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								
							
							<div class="col-sm-12" style="min-height:600px;"> 
								 <h3 style="width:100%;background: #38b4ee;color: #fff;padding:8px;">
								 Identity Details</h3>
								 <div style="width:100%;float:left;margin-bottom:20px;margin-top:20px;">
								 <div class="col-md-5">
								 	<div style="width:100%;float:left;background-color:#f2f2f2;padding:10px;">
						<section id="fancy">
					    <div class="row">
					      <div class="large-5 column">
					        <div class="xzoom-container" style="display: inherit;width: 100%;float: left;text-align:center">
					          <img class="xzoom4" id="xzoom-fancy" src="../upload/<?=$img;?>" xoriginal="../upload/<?=$img;?>" style="width:100%"/>
					          <div class="xzoom-thumbs">
					            <?php if($img4!=''){?>
					            <a href="../upload/<?=$img4;?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="../upload/<?=$img4;?>"  xpreview="../upload/<?=$img4;?>"></a>
					            <?php } if($img5!=''){?>
					            <a href="../upload/<?=$img5;?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="../upload/<?=$img5;?>"></a>
					            <?php }  if($img6!=''){?>
					            <a href="../upload/<?=$img6;?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="../upload/<?=$img6;?>"></a>
					          <?php } ?>
					          </div>
					        </div>          
					      </div>
					      <div class="large-7 column"></div>
					    </div>
					    </section>								 
						</div>
						</div></div>
								 
								 			
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
 function approve(val,pid,mob)
 {
   alert
   $.ajax({
          type:"POST",
          url:"approve.php",
          data:"prod_id="+pid+"&act="+val+"&mob="+mob,
          success:function(data)
          { 
          //alert(data);
            if(data==1)
            window.location.href="approv_dis.php?type=<?=$type2;?>";
          }
   
   });
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
<script src="../zoom/setup.js"></script>
<script type="text/javascript" src="../zoom/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="../zoom/xzoom.css" media="all" />
</body>
</html>