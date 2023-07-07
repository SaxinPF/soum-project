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
    var x = document.forms["myForm"]["prod_id"].value;
    if (x == "") {
        alert("Model must be selected");
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
    var x = document.forms["myForm"]["title"].value;
    if (x == "") {
        alert("Pl title must be filled out");
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
									<h4 class="mb5 text-light"><a name="top">Offer Master</a></h4>
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
					 
						$sdt=$row['start_dt'];
						$end=$row['end_dt'];
					  
						$sdt=substr($row['start_dt'],8,2)."/".substr($row['start_dt'],5,2)."/".substr($row['start_dt'],0,4);
						$end=substr($row['end_dt'],8,2)."/".substr($row['end_dt'],5,2)."/".substr($row['end_dt'],0,4);

					  $image=$row['offer_image'];
					  $image2=$row['offer_image'];
					  $title=$row['offer_title'];
					  $desc1=$row['offer_desc1'];
					  $desc2=$row['offer_desc2'];
					  $link=$row['offer_link'];
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
						<form method="post" action="offer_save.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
						<input name="offer_id" type="hidden" value="<?=$offerid?>"/>
						<input name="act" type="hidden" value="<?=$act?>"/>

						<div class="col-md-6" style="margin:auto;float:none;">
							<div class="dash-head clearfix mb20">
							
									<div class="col-md-12">
										<label class="control-label small">Select Device *</label>
										<select class="personSelect" name="prod_id" style="width: 100%;padding:8px;border:1px solid#ddd;" data-placeholder="Select a person">
											<option value="">select</option>
											<?php
											
											 $sqlp="select soum_product_master.*,soum_prod_subcat.prod_subcat_desc breand1,soum_prod_subsubcat.prod_subcat_desc model from soum_product_master,soum_prod_subcat,soum_prod_subsubcat
													where soum_product_master.brand=soum_prod_subcat.prod_subcat_id
													and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id";
											  $resp=$db->query($sqlp);
											 while($rowp=$resp->fetch_assoc())
											 {		
											    if($rowp['prod_cat_id']==1)
											    $type='N';
											    else
											    $type='U';									
											?>
											<option value="<?=$rowp['prod_id'];?>" <?php if($pid==$rowp['prod_id']) echo "Selected";?>><?=$rowp['prod_id']."/".$rowp['brand1']." ".$rowp['model']." (".$type.")";?></option>
											<?php } ?>
										</select>
									</div>


									<div class="col-md-6">
										<label class="control-label small">Satart Date *</label>
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
									
									<div class="col-md-6">
										<label class="control-label small">Offer Title *</label>
										<input class="form-control" type="text" id="title" name="title" value="<?=$title?>">
									</div>
									<div class="col-md-4">
										<label class="control-label small">Image Upload *</label>
										<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
											<img id="previewing1" src="../upload/<?=$image?>" style="height:80px;width:auto;position:absolute;top:0;">
											<span class="select-wrapper"><input type="file" name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;" ></span>
										</div>
										<input type="hidden" id="fileToUpload1a" value="<?=$image2;?>">
									</div>

									<div class="col-md-12">
										<label class="control-label small">Line 1 *</label>
										<input class="form-control resize-v" placeholder="Message here" id="desc1" name="desc1" type="text" value="<?=$desc1?>"/>
									</div>
									
									<div class="col-md-12">
										<label class="control-label small">Line 2 *</label>
										<input type="text" class="form-control resize-v" placeholder="Message here" id="desc2" name="desc2" value="<?=$desc2?>"/></div>
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
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="add" id="btn-add">Save</button>
									 <?php } 
									 else if($act=='edit')
									 { ?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="edit" id="btn-add">Save</button>
									 	<a href="offer_save.php?offer_id=<?=$offerid?>&act=del" class="btn btn-primary mr5 waves-effect">Delete</a>
					 

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
					    var dataURL = canvas.toDataURL("image/jpeg",1);
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
						<div class="dash-head clearfix mb20 table-responsive" style="min-height:450px;">
												
						<div class="col-md-12" style="padding:0px;">																
						<table class="table table-bordered invoice-table mb30" id="list-1">
										<thead>
											<tr style="background: #38b4ee;color: #fff">
											    <th style="padding: 5px;">SNo.</th>
												<th style="padding: 5px;">Product Device</th>
												<th style="padding: 5px;">Start Date</th>
												<th style="padding: 5px;">End Date</th>
												<th style="padding: 5px;">Title</th>
												<th style="padding: 5px;">Image</th>
												<th style="padding: 5px;">Line 1</th>
												<th style="padding: 5px;">Line 2</th>
												<th style="padding: 5px;">Active</th>
												<th style="padding: 5px;width: 150px;">Action <a href="offer_master.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:0px 8px;float:right;">[+]</button></a></th>
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
											<td style="padding: 5px;"><img src="../upload/<?=$row['offer_image'];?>" style="width:50px;height:auto;"></td>
											<td style="padding: 5px;"><?=$row['offer_desc1'];?></td>
											<td style="padding: 5px;"><?=$row['offer_desc2'];?></td>
											<td style="padding: 5px;"><?=$row['active'];?></td>
											<td style="padding: 5px;">
											<a href="offer_master.php?offer=<?=$row['offer_id']?>&act=edit#top" class="link btn-primary">Edit</a>
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