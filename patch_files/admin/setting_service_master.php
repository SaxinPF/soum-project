<?php 
include('../config2.php');
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
		<link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="styles/plugins/waves.css">
	<link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">
	<link rel="stylesheet" href="styles/plugins/select2.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-slider.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-datepicker.css">
	<link rel="stylesheet" href="styles/plugins/summernote.css">
	
	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/main.min.css">


	 
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>

	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]--> 
	<style>
.form-control {
	border:1px solid#ddd;
}
	.link {
    padding: 5px 8px;
    border-radius: 2px;
    margin-left: 5px;
    background-color: #787878;
    border-color: #898989;
    color: #fff;
}
.select-wrapper {
 /*   background: #dcf9ff url('../images/plus-icon.png') no-repeat;*/
    background:url('../images/plus-icon.png') no-repeat;
    background-size: 31px 30px;
    background-position: center center;
    display: block;
    position: relative;
    width: 100%;
    height: 80px;
    border: 1px dashed#ddd;
    position: relative;
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
	</style>
	<script src="scripts/jquery.min.js"></script>
<script>
function validateForm() {
	
	chk1a=$("#file1").val();
	chk2a=$("#file2").val();
	chk3a=$("#file3").val();
	if ((chk1a=='' || chk1a=='0') ||  (chk2a=='' || chk2a=='0') || (chk3a=='' || chk3a=='0') )
	{
		alert('Image must be selected!');
		return false;
	}
}
</script>
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
						<div class="col-md-12">
							<div class="dash-head clearfix mb20" style="margin-top:30px;">
								<div class="left">
									<h4 class="mb5 text-light">Home Adv Master</h4>
								</div>
							</div>
						</div>
					</div> <!-- #end row -->
					<?php 
					$act=$_REQUEST['act'];
					if(isset($_REQUEST['setting']))
					{
				 	/*$setting=$_REQUEST['setting'];
				 	$sql="select * from soum_settings where sett_id=$setting";
				  	$res=$db->query($sql);*/
				  	/** BOF Security Patch IS-002*/
				  	$setting=mysqli_real_escape_string($db,$_REQUEST['setting']); 	
					$setService=$db->prepare('select * from soum_settings where sett_id=?');
					$setService->bind_param('i', $setting); 
					$setService->execute();
					$res=$setService->get_result();
					/** EOF Security Patch IS-002*/
					 while($row=$res->fetch_assoc())
					 {
					  $image=$row['Img_Online_Repairing'];
					  $image1=$row['img_used_phone'];
					  $image2=$row['img_Buy_Enquire'];
                     }
					}
					else
				  	{
				  		$image="no_img.png";
				  		$image1="no_img.png";
				  		$image2="no_img.png";
				  	}
					?>
					 <?php if($act=='add' || $act=='edit' || $act=='del'){?>

					<div class="row" id="form_offer">
						<!-- dashboard header -->
						<form name="myForm" onsubmit="return validateForm()" method="post" action="setting_service_save.php" enctype="multipart/form-data">
						<input name="setting" type="hidden" value="<?=$setting?>"/>
						<input name="act" type="hidden" value="<?=$act?>"/>

						<div class="col-md-6" style="margin:auto;float:none;">
							<div class="dash-head clearfix mb20">
							
									
									<p style="text-align:center;font-weight:bold;">Image Dimensions Upload Only 264px X 263px</p>
									<div class="col-md-4" style="padding-top:15px;">
										<label class="control-label small">Online Repairing *</label>										
									</div>
									<div class="col-md-4" style="padding-top:15px;">
										<label class="control-label small">Used Phone *</label>
									</div>
									<div class="col-md-4" style="padding-top:15px;">
										<label class="control-label small">Buy Enquiry *</label>										
									</div>
									
									<div class="col-md-4">
										<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
										<img id="previewing1" src="../upload/brand_logo/<?=$image;?>" style="height:80px;width:100%;position:absolute;top:0;">
										<span class="select-wrapper"><input type="file" name="fileToUpload1" id="fileToUpload1" onchange="abc(this,1);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
										</div>
									</div>
									<div class="col-md-4">
										<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
										<img id="previewing2" src="../upload/brand_logo/<?=$image1;?>" style="height:80px;width:100%;position:absolute;top:0;">
										<span class="select-wrapper"><input type="file" name="fileToUpload2" id="fileToUpload2" onchange="abc(this,2);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;" ></span>
										</div>
									</div>
									<div class="col-md-4">
										<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
										<img id="previewing3" src="../upload/brand_logo/<?=$image2;?>" style="height:80px;width:100%;position:absolute;top:0;">
										<span class="select-wrapper"><input type="file" name="fileToUpload3" id="fileToUpload3" onchange="abc(this,3);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
										</div>
									</div>
									
									

									<div class="col-md-12" style="text-align:center;margin-top:20px;">
									<?php if($act=='edit'){?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="edit" id="btn-edit">Save</button>
									<?php 
									} 
									?>
									

									</div>
									<p>&nbsp;</p>
							</div>
							
						</div>
						
						<div class="col-md-12" style="display:none;">
						 	<img id="scream" height="25" width="21">
						 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image?></textarea>
						 	<textarea id="debugConsole2" name="S2" rows="3" style="width:30%; display:1none"><?=$image1?></textarea>
						 	<textarea id="debugConsole3" name="S3" rows="3" style="width:30%; display:1none"><?=$image2?></textarea>
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


	
						</form>
					</div>
					<?php } ?>
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height:450px;">
											
						<table class="table table-bordered invoice-table mb30" id="list-1">
										<thead>
											<tr style="background: #38b4ee;color: #fff">
											    <th style="padding: 5px;">SNo.</th>
												<th style="padding: 5px;">Online Repairing</th>
												<th style="padding: 5px;">Used Phone</th>
												<th style="padding: 5px;">Buy Enquiry</th>
												<th style="padding: 5px;width: 150px;">Action </th>
											</tr>
										</thead>
										<?php
										$sql="select * from soum_settings";
										$res=$db->query($sql);
										$i=1;
										while($row=$res->fetch_assoc())
										{
										?>
										<tr>
											<td style="padding: 5px;"><?=$i++;?></td>
											<td style="padding: 5px;"><img src="../upload/brand_logo/<?=$row['Img_Online_Repairing'];?>" style="width:150px;height:auto;"></td>
											<td style="padding: 5px;"><img src="../upload/brand_logo/<?=$row['img_used_phone'];?>" style="width:150px;height:auto;"></td>											
											<td style="padding: 5px;"><img src="../upload/brand_logo/<?=$row['img_Buy_Enquire'];?>" style="width:150px;height:auto;"></td>						
											<td style="padding: 5px;">
											<a href="setting_service_master.php?setting=<?=$row['sett_id']?>&act=edit" class="link btn-primary">Edit</a>
											</td>
										</tr>										
										<?php 
										}	
										?>
							</table>
							</div>
							
						</div>
					</div>					
				
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


	

	<!-- Dev only -->
	<!-- Vendors -->
		<script src="scripts/vendors.js"></script>
	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/plugins/select2.min.js"></script>
	<script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
	<script src="scripts/plugins/bootstrap-slider.min.js"></script>
	<script src="scripts/plugins/summernote.min.js"></script>
	<script src="scripts/plugins/bootstrap-datepicker.min.js"></script>
	<script src="scripts/app.js"></script>
	<script src="scripts/form-elements.init.js"></script>

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
	    c.height = 263;
	    //diff_per=480/n_height*100;
	    //c.width=n_width*diff_per/100;
	    c.width=264;
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
    $('#previewing'+popid).attr('src','../upload/loader.gif');
	$.ajax({
	  type: "POST",
	  url: "script.php",
	  data: { 
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	  $('#debugConsole'+popid).val(o); 
	   $('#previewing'+popid).attr('src','../upload/temp/'+o);
	});
}
</script>
 
</body>
</html>