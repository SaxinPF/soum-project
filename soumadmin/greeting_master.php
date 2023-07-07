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
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light">Greetigs Master</h4>
								</div>
							</div>
						</div>
					</div> <!-- #end row -->
					<?php 
					$act=$_REQUEST['act'];
					if(isset($_REQUEST['offer']))
					{
					$offerid=$_REQUEST['offer'];
					 $sql="select * from soum_offer where offer_id=$offerid";
					  $res=$db->query($sql);
					 while($row=$res->fetch_assoc())
					 {
					  $pid=$row['prod_id'];
					  $image=$row['offer_image'];
					  $title=$row['offer_title'];
					  $desc1=$row['offer_desc1'];
					  $desc2=$row['offer_desc2'];
					  $link=$row['offer_link'];
					  $active=$row['active'];

                     }
					}
					?>
					 <?php if($act=='add' || $act=='edit' || $act=='del'){?>

					<div class="row" id="form_offer">
						<!-- dashboard header -->
						<form method="post" action="offer_save.php" enctype="multipart/form-data">
						<input name="offer_id" type="hidden" value="<?=$offerid?>"/>
						<input name="act" type="hidden" value="<?=$act?>"/>

						<div class="col-md-6" style="margin:auto;float:none;">
							<div class="dash-head clearfix mb20">
							
									<div class="col-md-12">
										<label class="control-label small">Select Device</label>
										<select class="personSelect" name="prod_id" style="width: 100%" data-placeholder="Select a person">
											<option value="">select</option>
											<?php
											
											 $sqlp="select soum_product_master.*,soum_prod_subcat.prod_subcat_desc breand1,soum_prod_subsubcat.prod_subcat_desc model from soum_product_master,soum_prod_subcat,soum_prod_subsubcat
													where soum_product_master.brand=soum_prod_subcat.prod_subcat_id
													and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id";
											  $resp=$db->query($sqlp);
											 while($rowp=$resp->fetch_assoc())
											 {											
											?>
											<option value="<?=$rowp['prod_id'];?>" <?php if($pid==$rowp['prod_id']) echo "Selected";?>><?=$rowp['prod_id']."/".$rowp['brand1']." ".$rowp['model'];?></option>
											<?php } ?>
										</select>
									</div>


									<div class="col-md-6">
										<label class="control-label small">Satart Date</label>
										<div class="input-group date" id="datepickerDemo">
											<input type="text" class="form-control" id="start-date" name="start-date" value="<?=$sdt?>"/>
											<span class="input-group-addon">
												<i class=" ion ion-calendar"></i>
											</span>
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label small">End Date</label>
										<div class="input-group date" id="datepickerDemo2">
											<input type="text" class="form-control" id="end-date" name="end-date" value="<?=$end?>"/>
											<span class="input-group-addon">
												<i class=" ion ion-calendar"></i>
											</span>
										</div>
									</div>
									
									<div class="col-md-4">
										<label class="control-label small">Offer Title</label>
										<input class="form-control" type="text" id="title" name="title" value="<?=$title?>">
									</div>
									<div class="col-md-4">
										<label class="control-label small">Image Upload</label>
										<input type="file" name="fileToUpload1"  id="fileToUpload1" style="width:100%;padding:5px;border:1px solid#ddd;" >
									</div>
									<div class="col-md-4">
										<label class="control-label small">Preview</label>
										<img id="previewing" src="../upload/<?=$image?>" style="width:60px;height:60px;">
									</div>

									<div class="col-md-12">
										<label class="control-label small">Offer Description1</label>
										<textarea rows="3" class="form-control resize-v" placeholder="Message here" id="desc1" name="desc1"><?=$desc1?></textarea>	
									</div>
									
									<div class="col-md-12">
										<label class="control-label small">Offer Description2</label>
										<textarea rows="3" class="form-control resize-v" placeholder="Message here" id="desc2" name="desc2"><?=$desc2?></textarea>									</div>
									<div class="col-md-12">
										<div class="ui-checkbox ui-checkbox-primary1" style="margin-top:20px;text-align:center">
										<label class="control-label small">&nbsp;</label>
											<label>
												<input  type="checkbox" id="active" name="active" <?php if($active==1) echo"Checked"?>> 
												<span>Active</span>
											</label>
										</div>
									</div>

									<div class="col-md-12" style="text-align:center;">
									 <?php if($act=='add'){?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="add" id="btn-add">Add</button>
									 <?php } 
									 else if($act=='edit')
									 { ?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="edit" id="btn-add">Edit</button>
									  <?php } 
									 else if($act=='del')
									 { ?>
									<button class="btn btn-primary mr5 waves-effect" type="submit" value="del" id="btn-add">Delete</button>
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
												
						<table class="table table-bordered invoice-table mb30" id="list-1">
										<thead>
											<tr style="background: #38b4ee;color: #fff">
											    <th style="padding: 5px;">SNo.</th>
												<th style="padding: 5px;">Product Device</th>
												<th style="padding: 5px;">Start Date</th>
												<th style="padding: 5px;">End Date</th>
												<th style="padding: 5px;">Title</th>
												<th style="padding: 5px;">Description1</th>
												<th style="padding: 5px;">Description2</th>
												<th style="padding: 5px;">Active</th>
												<th style="padding: 5px;width: 150px;">Action <a href="dealer_master.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:0px 8px;float:right;">[+]</button></a></th>
											</tr>
										</thead>
									<?php
									if(isset($_REQUEST['search']))
									{ 
									$search=$_REQUEST['search'];
									
									$cond="and (soum_prod_subsubcat.prod_subcat_desc like'%$search%' or soum_offer.offer_title like'%$search%' or soum_offer.offer_desc1 like'%$search%' or soum_offer.offer_desc2 like'%$search%')";
									
									}
									$num_rec_per_page=10;
									if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
									$i=1+$start_from = ($page-1) * $num_rec_per_page;

									$sql="select soum_offer.*,soum_prod_subsubcat.prod_subcat_desc from soum_offer,soum_product_master,soum_prod_subsubcat
									where soum_offer.prod_id=soum_product_master.prod_id
									and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id ".$cond." LIMIT $start_from, $num_rec_per_page";
									$res=$db->query($sql);
									$i=1;
									while($row=$res->fetch_assoc())
									{
									?>
										<tr>
											<td style="padding: 5px;"><?=$i++;?></td>
											<td style="padding: 5px;"><?=$row['prod_subcat_desc'];?></td>
											<td style="padding: 5px;"><?=$row['start_dt'];?></td>
											<td style="padding: 5px;"><?=$row['end_dt'];?></td>
											<td style="padding: 5px;"><?=$row['offer_title'];?></td>
											<td style="padding: 5px;"><?=$row['offer_desc1'];?></td>
											<td style="padding: 5px;"><?=$row['offer_desc2'];?></td>
											<td style="padding: 5px;"><?=$row['active'];?></td>
											<td style="padding: 5px;">
											<a href="offer_master.php?offer=<?=$row['offer_id']?>&act=edit" class="link btn-primary">Edit</a>
											<a href="offer_master.php?offer=<?=$row['offer_id']?>&act=del" class="link btn-primary">Delete</a>
											</td>
										</tr>										
									<?php 
									}	
									?>
							</table>
<div style="width:100%;margin:auto;height:auto;position:absolute;bottom:40px;left:45%;">
<?php 
$params = $_SERVER['QUERY_STRING'];
$params=str_replace("page=","",$params);
$sql = "select soum_offer.*,soum_prod_subsubcat.prod_subcat_desc from soum_offer,soum_product_master,soum_prod_subsubcat
									where soum_offer.prod_id=soum_product_master.prod_id
									and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id ".$cond; 
$rs_result =$db->query($sql); //run the query
$total_records = mysqli_num_rows($rs_result);  //count number of records
//echo $total_records;
$total_pages = ceil($total_records / $num_rec_per_page); 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='offer_master.php?page=1&$params'>".'First'."</a> "; // Goto 1st page  
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='offer_master.php?page=".$i."&".$params."'>".$i."</a> "; 
}; 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='offer_master.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
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