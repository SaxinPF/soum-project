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
$('#previewing').attr('src','../images/no_img.png');
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
	$("#file1").val(e.target.result);
	$('#previewing').attr('src', e.target.result);
	$('#previewing').attr('width', '250px');
	$('#previewing').attr('height', '230px');
};
});
</script>

<script>
function validateForm() {
	
	chk1a=$("#file1").val();
	if (chk1a=='' || chk1a=='0') 
	{
		alert('Image must be selected!');
		return false;
	}

    var x = document.forms["myForm"]["title"].value;
    if (x == "") {
        alert("Banner title must be fill");
        return false;
    }
    var x = document.forms["myForm"]["title2"].value;
    if (x == "") {
        alert("Banner title second must be fill");
        return false;
    }
    var x = document.forms["myForm"]["link2"].value;
    if (x == "") {
        alert("Banner button name must be fill");
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
									<h4 class="mb5 text-light">Testimonial Master</h4>
								</div>
							</div>
						</div>
					</div> <!-- #end row -->
					<?php 
					$act=$_REQUEST['act'];
					if(isset($_REQUEST['tmid']))
					{
					$tmid=$_REQUEST['tmid'];
					 $sql="select * from soum_testimonial where tmid_id=$tmid";
					  $res=$db->query($sql);
					 while($row=$res->fetch_assoc())
					 {
					  $image=$row['image'];
					  $name=$row['name'];
					  $msg=$row['desc1'];
					  $active=$row['active'];
                     }
					}
					else
				  	{
				  		$image="no_img.png";
				  	}
					?>
					<?php if($act=='add' || $act=='edit' || $act=='del'){?>

					<div class="row" id="form_offer">
						<!-- dashboard header -->
						<div class="col-md-6" style="float:none;margin:auto;">
						<div style="width:100%;float:left;background:#fff;margin-bottom:20px;padding:15px;">
						<form name="myForm" onsubmit="return validateForm()" method="post" action="testimonial_master_act.php" enctype="multipart/form-data">		
									<input name="tmid" type="hidden" value="<?=$tmid?>"/>
									<input name="act" type="hidden" value="<?=$act?>"/>									
										<div class="col-md-12">
											<label class="control-label"><span style="font-size:13px;">(Image Dimensions: 100px X 100px)</span></label>
											<label class="control-label">Customer Image *</label>
										</div>									
									<div class="col-md-12" style="padding:0px;margin-bottom:15px;">	
									<div class="col-md-4">
										<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
										<img id="previewing" src="../upload/banner_img/<?=$image?>" style="height:80px;width:auto;position:absolute;top:0;">
										<span class="select-wrapper"><input type="file" name="fileToUpload1"  id="fileToUpload1" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"/></span>
										</div>
										<input type="hidden" id="file1" value="<?=$image?>"> 
									</div>
									</div>

									
									<div class="col-md-12">
										<label class="control-label">Customer Name*</label>
										<input class="form-control" id="name" name="name" type="text" value="<?=$name?>"/>
									</div>
									<div class="col-md-12">
										<label class="control-label">Message</label>
										<textarea class="form-control" id="msg" name="msg" rows="4"><?=$msg?></textarea>
									</div>

					
									<div class="col-md-12">
										<div class="ui-checkbox ui-checkbox-primary" style="margin-top:20px;text-align:center;">
											<label>
												<input type="checkbox" id="active" name="active" <?php if($active==1) echo"Checked"?>/> 
												<span>Active</span>
											</label>
										</div>
									</div>	
												
									<div class="col-md-12" style="text-align:center;">
									 <?php if($act=='add'){?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="add" id="btn-add">Save</button>
									 <?php } 
									 else if($act=='edit')
									 { ?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="edit" id="btn-add">Save</button>
									   <a href="testimonial_master_act.php?tmid_id=<?=$tmid;?>&act=del" class="btn btn-primary mr5 waves-effect">Delete</a>
										
									 <?php } ?>
									</div>
								</form>
								</div>
								</div>
						</div>
					<?php } ?>
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height:450px;">
												
												<form method="post"><table style="width:auto;float:right;text-align:right;margin-bottom:10px;"><tr><td><input name="search" value="<?=$_REQUEST['search'];?>" type="text" class="form-control" style="float:right;margin-right:10px;">
												</td><td><button name="Submit1" type="submit" value="Search" class="btn btn-primary mr5 waves-effect" style="float:right;">Search</button></td></tr></table></form>
												
							<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
										    <th style="padding: 5px;">SNo.</th>
											<th style="padding: 5px;">Image</th>
											<th style="padding: 5px;width: 180px;">Customer Name</th>
											<th style="padding: 5px;">Message</th>
											<th style="padding: 5px;">Active</th>
											<th style="padding: 5px;width: 100px;">Action <a href="testimonial_master.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:0px 8px;float:right;" name="banner2">[+]</button></a></th>
										</tr>
									</thead>
									<tbody>
									<?php
									if(isset($_REQUEST['search']))
									{ 
									$search=$_REQUEST['search'];
									
									$cond="and (soum_testimonial.name like'%$search%')";
									
									}
									$num_rec_per_page=10;
									if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
									$i=1+$start_from = ($page-1) * $num_rec_per_page;

									$sql="select * from soum_testimonial where 1=1 ".$cond." LIMIT $start_from, $num_rec_per_page";
									
									$res=$db->query($sql);
									$i=1;
									while($row=$res->fetch_assoc())
									{
									?>
										<tr>
											<td style="padding: 5px;"><?=$i++;?></td>
											<td style="padding: 5px;"><img src="../upload/banner_img/<?=$row['image'];?>" style="width:50px;height:auto"></td>
											<td style="padding: 5px;"><?=$row['name'];?></td>
											<td style="padding: 5px;"><?=$row['desc1'];?></td>
											<td style="padding: 5px;"><?=$row['active'];?></td>
											<td style="padding: 5px;">
												<a href="testimonial_master.php?tmid=<?=$row['tmid_id']?>&act=edit" class="link btn-primary">Edit</a>
											</td>
										</tr>
									<?php 
									}	
									?>
									</tbody>
								</table>
						
							

<div style="width:100%;margin:auto;height:auto;position:absolute;bottom:40px;left:45%;">
<?php 
$params = $_SERVER['QUERY_STRING'];
$params=str_replace("page=","",$params);
$sql = "select * from soum_testimonial ".$cond; 
$rs_result =$db->query($sql); //run the query
$total_records = mysqli_num_rows($rs_result);  //count number of records
//echo $total_records;
$total_pages = ceil($total_records / $num_rec_per_page); 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='testimonial_master.php?page=1&$params'>".'First'."</a> "; // Goto 1st page  
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='testimonial_master.php?page=".$i."&".$params."'>".$i."</a> "; 
}; 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='testimonial_master.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
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


</body>
</html>