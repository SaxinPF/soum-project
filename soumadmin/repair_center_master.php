<?php 
include('../config2.php');
if(isset($_REQUEST['prod_id']))
{
$pid=$_REQUEST['prod_id'];
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
	</style>
	<script src="scripts/jquery.min.js"></script>
	<script>
		$(document).ready(function (e) {
// Function to preview image after validation
$(function() {
$("#fileToUpload1").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','../../images/card_img/NoImage.gif');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};
});
</script>
<script>
function validateForm() {
    var x = document.forms["myForm"]["person"].value;
    if (x == "") {
        alert("Pl contact person must be fill out");
        return false;
    }
    var x = document.forms["myForm"]["centername"].value;
    if (x == "") {
        alert("Pl service center name must be fill out");
        return false;
    }
    var z = document.forms["myForm"]["mobile"].value;
    if (z.match(/^\d+/) && z.length<10 && z.length>10) 
    	{ 
    	alert("Please enter valid mobile no");
    	return false; 
    	}
    if( document.myForm.mobile.value == "" ||
	isNaN( document.myForm.mobile.value) ||
	document.myForm.mobile.value.length != 10 )
	{
	alert( "Please enter valid mobile no" );
	document.myForm.mobile.focus() ;
	return false;
	}
	
    var x = document.forms["myForm"]["add"].value;
    if (x == "") {
        alert("Pl address must be filled out");
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
						<div class="col-md-12" style="margin-top:30px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light">Repair Center Master</h4>
								</div>
							</div>
						</div>
					</div> <!-- #end row -->
					<?php 
					$act=$_REQUEST['act'];
					if(isset($_REQUEST['repair']))
					{
					$repairingid=$_REQUEST['repair'];
					 $sql="select * from soum_servicecenter where sc_id=$repairingid";
					// echo $sql;
					// die();
					  $res=$db->query($sql);
					 while($row=$res->fetch_assoc())
					 {
					  $person=$row['contact_person'];
					  $centername=$row['service_center_name'];
					  $mobile=$row['mobile'];
					  $add=$row['address'];
					  $active=$row['active'];
                     }
					}
					?>
					 <?php if($act=='add' || $act=='edit' || $act=='del'){?>
					<div class="row" id="form_offer">
						<!-- dashboard header -->
						<form method="post" action="repair_center_master_save.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
						<input name="repairid" type="hidden" value="<?=$repairingid?>"/>
						<input name="act" type="hidden" value="<?=$act?>"/>
						<div class="col-md-6" style="margin:auto;float:none;">
							<div class="dash-head clearfix mb20">
									<div class="col-md-6">
										<label class="control-label small">Contact Person *</label>
										<input class="form-control" type="text" id="person" name="person" value="<?=$person?>">
									</div>
									<div class="col-md-6">
										<label class="control-label small">Service Center Name *</label>
										<input class="form-control" type="text" id="centername" name="centername" value="<?=$centername?>">
									</div>
									<div class="col-md-6">
										<label class="control-label small">Mobile No *</label>
										<input class="form-control" type="text" id="mobile" name="mobile" value="<?=$mobile?>">
									</div>
									<div class="col-md-6">
										<label class="control-label small">Address *</label>
										<textarea class="form-control" type="text" id="add" name="add" rows="3"><?=$add?></textarea>
									</div>
									<div class="col-md-12">
										<div class="ui-checkbox ui-checkbox-primary1" style="margin-top:20px;text-align:center">
										<label class="control-label small">&nbsp;</label>
											<label>
												<input  type="checkbox" id="active" name="active" <?php if($active==1) echo"Checked";?>> 
												<span>Active</span>
											</label>
										</div>
									</div>
									<div class="col-md-12" style="text-align:center;margin-top:20px;">
									 <?php if($act=='add'){?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="add" id="btn-add">Save</button>
									 <?php } 
									 else if($act=='edit')
									 { ?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="edit" id="btn-add">Save</button>
									  	<a href="repair_center_master_save.php?repairid=<?=$repairingid?>&act=del" class="btn btn-primary mr5 waves-effect">Delete</a>
									 <?php } ?>
									</div>
									<p>&nbsp;</p>
							</div>
							
						</div>	
						</form>
					</div>
					<?php } ?>
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height:450px;">
												
												<form method="post"><table style="width:auto;float:right;text-align:right;margin-bottom:10px;"><tr><td><input name="search" value="<?=$_REQUEST['search'];?>" type="text" class="form-control" style="float:right;margin-right:10px;">
												</td><td><button name="Submit1" type="submit" value="Search" class="btn btn-primary mr5 waves-effect" style="float:right;">Search</button></td></tr></table></form>
							<div class="col-md-12 table-responsive" style="padding:0px;">					
						<table class="table table-bordered invoice-table mb30" id="list-1">
										<thead>
											<tr style="background: #38b4ee;color: #fff">
											    <th style="padding: 5px;">SNo.</th>
											    <th style="padding: 5px;">Contact Person</th>
												<th style="padding: 5px;">Name of Service Center</th>
												<th style="padding: 5px;">Address</th>
												<th style="padding: 5px;">Mobile No.</th>
												<th style="padding: 5px;">Active</th>
												<th style="padding: 5px;width:150px;">Action <a href="repair_center_master.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:0px 8px;float:right;">[+]</button></a></th>
											</tr>
										</thead>
									<?php
									if(isset($_REQUEST['search']))
									{ 
									$search=$_REQUEST['search'];
									$cond="and (soum_servicecenter.prod_subcat_desc like'%$search%' or soum_servicecenter.offer_title like'%$search%' or soum_servicecenter.offer_desc1 like'%$search%' or soum_servicecenter.offer_desc2 like'%$search%')";
									}
									$num_rec_per_page=10;
									if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
									$i=1+$start_from = ($page-1) * $num_rec_per_page;
									$sql="select * from soum_servicecenter where 1=1 ".$cond." LIMIT $start_from, $num_rec_per_page";
									$res=$db->query($sql);
									$i=1;
									while($row=$res->fetch_assoc())
									{
									?>
										<tr>
											<td style="padding: 5px;"><?=$i++;?></td>
											<td style="padding: 5px;"><?=$row['contact_person'];?></td>
											<td style="padding: 5px;"><?=$row['service_center_name'];?></td>
											<td style="padding: 5px;"><?=$row['address'];?></td>
											<td style="padding: 5px;"><?=$row['mobile'];?></td>
											<td style="padding: 5px;"><?=$row['active'];?></td>
											<td style="padding: 5px;">
											<a href="repair_center_master.php?repair=<?=$row['sc_id']?>&act=edit" class="link btn-primary">Edit</a>
											
											</td>
										</tr>										
									<?php 
									}	
									?>
							</table>
							</div>
<div class="col-md-12" style="width:100%;text-align:center;margin-top:20px;margin-bottom:20px;">
<?php 
$params = $_SERVER['QUERY_STRING'];
$params=str_replace("page=","",$params);
$sql = "select * from soum_servicecenter where 1=1 ".$cond; 
$rs_result =$db->query($sql); //run the query
$total_records = mysqli_num_rows($rs_result);  //count number of records
//echo $total_records;
$total_pages = ceil($total_records / $num_rec_per_page); 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='repair_center_master.php?page=1&$params'>".'First'."</a> "; // Goto 1st page  
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='repair_center_master.php?page=".$i."&".$params."'>".$i."</a> "; 
}; 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='repair_center_master.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
?>
</div>
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
						<div class="left small">Nav Horizontal</div>
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
						<div class="left small">Nav Full</div>
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
</body>
</html>