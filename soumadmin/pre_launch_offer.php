﻿<?php
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
function validateForm() {
    var x = document.forms["myForm"]["drpBrand"].value;
    if (x == "") {
        alert("Brand must be selected");
        return false;
    }

	 var x = document.forms["myForm"]["drpModel"].value;
		if (x == "") {
			alert("Model must be selected");
			return false;
		}

	 var x = document.forms["myForm"]["title"].value;
    if (x == "") {
        alert("Pl title must be filled out");
        return false;
    }

    var x = document.forms["myForm"]["start-date"].value;
    if (x == "") {
        alert("Pl select start date must be fill out");
        return false;
    }
    var x = document.forms["myForm"]["end-date"].value;
    if (x == "") {
        alert("Pl select end date must be fill out");
        return false;
    }

    chk1a=$("#debugConsole1").val();
	if (chk1a=='' || chk1a=='0')
	{
		alert('Image must be selected!');
		return false;
	}
	var x = document.forms["myForm"]["desc1"].value;
    if (x == "") {
        alert("Pl Line 1 must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["desc2"].value;
    if (x == "") {
        alert("Pl Line 2 must be filled out");
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
									<h4 class="mb5 text-light"><a name="top">Pre-launch Creative</a></h4>
								</div>
                                <div>
                                <a href="pre_launch_offer.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:6px 80px;float:right;">Add new</button></a></tr>
    							</div>
							</div>
						</div>
					</div> <!-- #end row -->
					<?php
					$act=$_REQUEST['act'];
					if(isset($_REQUEST['preid']))
					{
					$preid=$_REQUEST['preid'];
					 $sql="select * from soum_pre_launch where pre_id=$preid";
					  $res=$db->query($sql);
					 while($row=$res->fetch_assoc())
					 {
					  $preid=$row['pre_id'];
					  $brand_id=$row['brand_id'];
					  $model_id=$row['model_id'];
					  $model_name=$row['model_name'];

						$sdt=$row['from_dt'];
						$end=$row['to_dt'];

						$sdt=substr($row['from_dt'],8,2)."/".substr($row['from_dt'],5,2)."/".substr($row['from_dt'],0,4);
						$end=substr($row['to_dt'],8,2)."/".substr($row['to_dt'],5,2)."/".substr($row['to_dt'],0,4);

					  $image='../upload/pre-launch/'.$row['img'];
					  $image2=$row['img'];
					  $title=$row['title'];
					  $offer=$row['offer'];
					  $feature=$row['feature'];
					  //$link=$row['offer_link'];
					  $active=$row['active'];
                     }
					}
					else
				  	{
				  		$image="../upload/noimage.png";
				  	}
					?>
					 <?php if($act=='add' || $act=='edit' || $act=='del'){?>

					<div class="row" id="form_offer">
						<!-- dashboard header -->
						<form method="post" action="pre_launch_offer_save.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
						<input name="preid" type="hidden" value="<?=$preid?>"/>
						<input name="act" type="hidden" value="<?=$act?>"/>

						<div class="col-md-6" style="margin:auto;float:none;">
							<div class="dash-head clearfix mb20">

									<div class="col-md-4">
										<label class="control-label small">Image Upload *</label>
										<div class="filedivcls">
											<img id="previewing1" src="<?=$image?>" style="height:80px;width:auto;position:absolute;top:0;">
											<span class="select-wrapper"><input type="file" name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;" ></span>
										</div>
										<input type="hidden" id="fileToUpload1a" value="<?=$image;?>">
									</div>


									<div class="col-md-12">
										<label class="control-label small">Brand*</label>
										   <select name="drpBrand" id="soum_prod_subcat" class="form-contro" style="width:100%;margin-bottom:10px;" onchange="fill(this.value);" >
												<option selected="selected" value="">--Select Brand*--</option>
												<?php
												  $sql="select * from soum_prod_subcat order by prod_subcat_id desc";
												  $res=$db->query($sql);
												  while($row=$res->fetch_assoc())
												  {
												  $sel ='';
												  if($brand_id==$row['prod_subcat_id']){
												    $sel = 'selected="selected"';
												  }

												  ?>
												  <option <?php echo $sel; ?> value="<?=$row['prod_subcat_id'];?>"><?=$row['prod_subcat_desc']?></option>

												 <?php }
												?>
											</select>
									</div>

								<!--<div class="col-md-12">
										<label class="control-label small">Model*</label>
										  <div id="name_loader5"></div>
											<select name="drpModel" id="soum_prod_subsubcat" class="form-contro" style="width:100%;margin-bottom:10px;"  >
												<option selected="selected" value="">--Select Model*--</option>

												<?php /*

															if(isset($brand_id)){
																$param=$brand_id;
																$mid=$model_id;

															$sql="select temp.*,soum_prod_subcat.prod_subcat_desc brandName from (select * from soum_prod_subsubcat where 1=1 and( prod_subcat_id=".$param." or prod_subcat_id=0 ) order by prod_subcat_id desc) temp
															left outer join soum_prod_subcat
															on temp.prod_subcat_id=soum_prod_subcat.prod_subcat_id";
															//echo $sql;
															$res=$db->query($sql);
															$j=1;

														while($row=$res->fetch_assoc())
														{
														?>
															<option value="<?=$row['prod_subsubcat_id'];?>" <?php if($row['prod_subsubcat_id']==$mid) echo "Selected";?>><?=$row['brandName']." ".$row['prod_subcat_desc'];?></option>
														<?php
														}
														}
														 */  ?>



											</select>

									</div>-->

									<div class="col-md-12">
										<label class="control-label small">Model*</label>
										<input class="form-control" type="text" id="m1" name="drpModel" value="<?=$model_name?>">
									</div>

									<div class="col-md-12">
										<label class="control-label small">Title*</label>
										<input class="form-control" type="text" id="title" name="title" value="<?=$title?>">
									</div>


									<div class="col-md-6">
										<label class="control-label small">Start Date *</label>
										<div class="input-group date" id="datepickerDemo">
											<input type="text" class="form-control" id="start-date" name="start-date" value="<?=$sdt?>"/>
											<span class="input-group-addon">
												<i class=" ion ion-calendar"></i>
											</span>
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label small">End Date *</label>
										<div class="input-group date" id="datepickerDemo2">
											<input type="text" class="form-control" id="end-date" name="end-date" value="<?=$end?>"/>
											<span class="input-group-addon">
												<i class=" ion ion-calendar"></i>
											</span>
										</div>
									</div>

									<div class="col-md-12">
										<label class="control-label small">Offer*</label>
										<textarea class="form-control" id="offer" name="offer" rows="5"><?=$offer?></textarea>
									</div>


									<div class="col-md-12">
										<label class="control-label small">Features*</label>
										<textarea class="form-control" id="feature" name="feature" rows="5"><?=$feature?></textarea>
									</div>



									<div class="col-md-12" style="text-align:center;padding-top:10px;">
									 <?php if($act=='add'){?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="add" id="btn-add">Save</button>
									 <?php }
									 else if($act=='edit')
									 { ?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="edit" id="btn-add">Save</button>
									 	<a href="pre_launch_offer_save.php?preid=<?=$preid;?>&act=del" class="btn btn-primary mr5 waves-effect">Delete</a>


									 <?php } ?>

									</div>
									<p>&nbsp;</p>
									<!---------------------canvas upload image start -->
						<div class="col-md-12" style="display:none;">
						 <img id="scream" height="25" width="21">
				 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image2;?></textarea>
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
					    var dataURL = canvas.toDataURL("image/png",1);
					    saveImage(dataURL, popid);
					   }
					</script>
                    </div>
                    <!---------------------canvas upload image end -->

							</div>

						</div>
						</form>
					</div>
					<?php } ?>
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height:450px;">

						<div class="table-responsive">
						<table class="table table-bordered invoice-table mb30" id="list-1">
										<thead>
											<tr style="background: #38b4ee;color: #fff">
											    <th style="padding: 5px;">#</th>
												<th style="padding: 5px;">Image</th>
												<th style="padding: 5px;">Title</th>
												<th style="padding: 5px;">Start Date</th>
												<th style="padding: 5px;">End Date</th>
												<th style="padding: 5px;">Offer</th>
												<th style="padding: 5px;">Feature</th>
												<th style="padding: 5px;width: 150px;">Action</th>
											</tr>
										</thead>
									<?php
									$num_rec_per_page=10;
									if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
									$i=1+$start_from = ($page-1) * $num_rec_per_page;

									$sql="select * from soum_pre_launch";
									$res=$db->query($sql);
									$i=1;
									while($row=$res->fetch_assoc())
									{
									?>
										<tr>
											<td style="padding: 5px;"><?=$i++;?></td>
											<td style="padding: 5px;"><img src="../upload/pre-launch/<?=$row['img'];?>" style="width:50px;height:auto;"></td>
											<td style="padding: 5px;"><?=$row['title'];?></td>
											<td style="padding: 5px;"><?=$row['from_dt'];?></td>
											<td style="padding: 5px;"><?=$row['to_dt'];?></td>
											<td style="padding: 5px;"><?=$row['offer'];?></td>
											<td style="padding: 5px;"><?=$row['feature'];?></td>
											<td style="padding: 5px;">
											<a href="pre_launch_offer.php?preid=<?=$row['pre_id']?>&act=edit#top" class="link btn-primary">Edit</a>
											</td>
										</tr>
									<?php
									}
									?>
							</table>
							</div>
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
		var canvasData = myCanvas.toDataURL("image/png",1);
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
	  url: "script_png.php",
	  data: {
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	  $('#debugConsole'+popid).val(o);
	   $('#previewing'+popid).attr('src','../upload/temp/'+o);
	});
}


function fill(bid)
{

$('#soum_prod_subsubcat').hide();
$('#name_loader').html("<img src='..upload/loader.gif' width='30' height='30'>");
	$.ajax({
		type:"Post",
		url:"../fill3.php",
		data:"param="+bid,
		success:function(html)
		{
		    $('#name_loader').html("");
            $('#soum_prod_subsubcat').show();
			$("#soum_prod_subsubcat").html(html);
		}
	});
}
</script>


</body>
</html>
