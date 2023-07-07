<?php include('../config2.php');?>
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
#list-1 th{
	border:1px solid#ddd;
}
	.auto-style2 {
		border: 1px solid #898989;
	}
	.auto-style4 {
		text-align: left;
		font-size: 13px;
		border:1px solid#ddd;
	}
.select-wrapper {
  background:url('../images/plus-icon.png') no-repeat;
  background-size:31px 30px;
  background-position:center center;
	display: block;
	position: relative;
	width: 100%;
	height: 80px;
	border: 1px dashed#eb5310;
	position:relative;
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
	.auto-style5 {
		border: 1px solid #000000;
	}
	.auto-style6 {
		border-collapse: collapse;
	}
	</style>
		<script src="scripts/jquery.min.js"></script>
	<script>
		function edit(cat_id,model,brand,type,cable_type,connector_1,connector_2,cable,color,compatible,length,img1,img2,img3,desc,act)
		{
			//alert(desc);
			$("#cat_id").val(cat_id);
			$("#model").val(cat_id);
		    $("#act").val(act);
		    $("#subcat1").val(brand);

			$("#soum_prod_subcat").val(brand);

			$("#brand").val(brand);
			$("#type").val(type);
			$("#modal").val(model);
			$("#cable_type").val(cable_type);
			$("#connector_1").val(connector_1);
			$("#connector_2").val(connector_2);
			$("#cable").val(cable);
			//$("#color").val(color);
			$("#compatible").val(compatible);
			$("#length").val(length);
			$("#fileToUpload1a").val(img1);
			$("#fileToUpload2a").val(img2);
			$("#fileToUpload3a").val(img3);
		if(img1==""||img2==""||img3=="")
			{
			$('#previewing1').attr('src', "../images/no_img.png");
			$('#previewing2').attr('src', "../images/no_img.png");
			$('#previewing3').attr('src', "../images/no_img.png");
			}
			else
			{
			$('#previewing1').attr('src', "../upload/"+img1);
			$('#previewing2').attr('src', "../upload/"+img2);
			$('#previewing3').attr('src', "../upload/"+img3);

			$("#debugConsole1").val(img1);
			$("#debugConsole2").val(img2);
			$("#debugConsole3").val(img3);



			}
			$("#desc").val(desc);

			if(act=='Edit')
			{
			$("#btn-add").html('Save');
			$("#delete").show();
			}
			else
			{
			$("#btn-add").html(act);
			$("#delete").hide();
            }
            document.location='#top';
		}


$(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();





	var act_conf=document.getElementById("act").value;

		if(act_conf=='Delete')
		{
			var txt;
			var r = confirm("Are you sure you want to delete!");
			if (r != true)
			{
				return false;
			}
		}


	  	if(act_conf=='Edit' || act_conf=='Add')
	  	{
		  	subcat=$("#subcat1").val();
			subsubcat=$("#modal").val();

			//type=$("#type").val();
			//cable_type=$("#cable_type").val();
			connector_1=$("#connector_1").val();
			connector_2=$("#connector_2").val();
			cable=$("#cable").val();
			//compatible=$("#compatible").val();
			length=$("#length").val();




			img1=$("#debugConsole1").val();
			img2=$("#debugConsole2").val();
			img3=$("#debugConsole3").val();

			if (subcat=='')
			{
				alert('Brand name must be selected!');
				return false;
			}

			if (subsubcat=='')
			{
				alert('Model name must be filled!');
				return false;
			}

			/*if (type=='')
			{
				alert('Type must be filled!');
				return false;
			}
			if (cable_type=='')
			{
				alert('Cable type must be filled!');
				return false;
			}*/
			if (connector_1=='')
			{
				alert('Connector 1 must be filled!');
				return false;
			}
			if (connector_2=='')
			{
				alert('Connector 2 must be filled!');
				return false;
			}
			if (cable=='')
			{
				alert('Cable must be filled!');
				return false;
			}
			/*if (compatible=='')
			{
				alert('Compatible must be filled!');
				return false;
			}*/
			if (length=='')
			{
				alert('Length must be filled!');
				return false;
			}



			/*if (img1=='')
			{
				alert('First image must  be selected!');
				return false;
			}

			if (img2=='')
			{
				alert('Second image must  be selected!');
				return false;
			}

			if (img3=='')
			{
				alert('Third image must  be selected!');
				return false;
			}*/
        }


		$.ajax({
		url: "cable_model_master_act.php", // Url to which the request is send
		type: "POST",             // Type of request to be send, called as method
		data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false,       // The content type used when sending data to the server.
		cache: false,             // To unable request pages to be cached
		processData:false,
        // To send DOMDocument or non processed data file it is set to false
		success: function(data)   // A function to be called if request succeeds
		{
		//alert(data);

				if (data==1)
				{
					alert('Record is saved');
					window.location.reload();

				}
				if(data==2)
				{
					alert('Record is Updated');
					window.location.reload();
				}
				if(data==3 && r == true)
				{
					alert('Record is Delete');
					window.location.reload();
				}


		}
		});
}));
});
function del()
{
   	var cat=$("#cat_id").val();

	//alert('cat_id='+cat+'&act=Delete');

	$.ajax({
	        type:'POST',
	        url: "cable_model_master_act.php",
	        data:'cat_id='+cat+'&act=Delete',

	        success:function(data)
	        {
	            if(data==3)
				{
					alert('Record is Delete');
					window.location.reload();
				}
	        }
	});

}
</script>
<script>
$(document).ready(function(){
  $("#s1").click(function(){
    $("#enq").hide();
  });
  $("#Add").click(function(){
    $("#enq").show();

  });
   $(".Edit").click(function(){
    $("#enq").show();

  });
 $(".Del").click(function(){
    $("#enq").show();

  });
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
						<div class="col-md-12" style="margin-top:30px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light"><a name="top">Cable Model Master</a></h4>
								</div>
								<div>
                                    <a href="javascript:void(0)"><button class="btn btn-primary mr5 waves-effect" type="submit" id="Add" style="margin:0px;padding:6px 100px;float:right;" onclick="edit('','','','','','','','','','','','','','','','Add')">Add new</button></a>
        						</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-6" id="enq" style="margin:auto;float:none;display:none">
							<div class="dash-head clearfix mb20">

							<form id="uploadimage"  method="post" enctype="multipart/form-data">
								<input type="hidden" id="cat_id" name="cat_id">
									<input type="hidden"  id="act" name="act">
									<input type="hidden" value="cable" id="category_type" name="category_type">
									<div class="col-md-6">
										<label class="control-label">Company/ Brand* </label>
										<select name="brand" id="subcat1" class="form-control">
										<option value="">Select Brand</option >
										<?php
										$sql="select * from soum_prod_subcat";
										$res=$db->query($sql);
										$i=1;
										while($row=$res->fetch_assoc())
										{
										?>
		                                <option value="<?=$row['prod_subcat_id'];?>"><?=$row['prod_subcat_desc'];?></option>
										<?php } ?>

 								</select>
									</div>

									<div class="col-md-6">
										<label class="control-label">Model* </label>
										<input class="form-control" id="modal" name="modal" type="text" placeholder="Model">
									</div>

									<!--<div class="col-md-6">
										<label class="control-label">Type*</label>
										<input class="form-control" type="text" id="type" name="type" placeholder="Type">
									</div>

									<div class="col-md-6">
										<label class="control-label">Cable type*</label>
										<input type="text" class="form-control" id="cable_type" name="cable_type" placeholder="Cable type">
									</div>-->

									<div class="col-md-6">
										<label class="control-label">Connector 1*</label>
										<input class="form-control" type="text" id="connector_1" name="connector_1" placeholder="">
									</div>
									<div class="col-md-6">
										<label class="control-label">Connector 2*</label>
										<input class="form-control" type="text" id="connector_2" name="connector_2" placeholder="">
									</div>
									<div class="col-md-6">
										<label class="control-label">Cable*</label>
										<input type="text" class="form-control" id="cable" name="cable" placeholder="">
									</div>
 									<!--<div class="col-md-6">
										<label class="control-label">Color</label>
										<input class="form-control" type="text" id="color" name="color" placeholder="Color">
									</div>
									<div class="col-md-6">
										<label class="control-label">Compatible*</label>
										<input type="text" class="form-control" id="compatible" name="compatible" placeholder="">
									</div>-->
									<div class="col-md-6">
										<label class="control-label">Length*</label>
										<input class="form-control" type="text" id="length" name="length" placeholder="">
									</div>

									<!--<div class="col-sm-4" style="margin-top:15px;">
										<div class="filedivcls">
											<img src="../images/no_img.png" id="previewing1" style="height:80px;width:auto;position:absolute;top:0;"/>
											<span class="select-wrapper"><input name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
										</div>
										<input type="hidden" id="fileToUpload1a"><input type="hidden" id="fileToUpload2a"><input type="hidden" id="fileToUpload3a">
									</div>
		                            <div class="col-sm-4" style="margin-top:15px;">
			                            <div class="filedivcls">
			                            	<img src="../images/no_img.png" id="previewing2" style="height:80px;width:auto;position:absolute;top:0;"/>
			                            	<span class="select-wrapper"><input name="fileToUpload2" id="fileToUpload2" onchange="abc(this,2);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
			                            </div>
		                            </div>
		                            <div class="col-sm-4" style="margin-top:15px;">
		                            	<div class="filedivcls">
			                            	<img src="../images/no_img.png" id="previewing3" style="height:80px;width:auto;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload3" id="fileToUpload3" onchange="abc(this,3);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
		                            </div>-->
									<div class="col-md-12">
										<label class="control-label">Description</label>
										<textarea class="form-control" type="text" id="desc" name="desc" rows="5"></textarea>
									</div>

									<div class="col-md-12" style="text-align:center;">
										<button class="btn btn-primary mr5 waves-effect"  type="submit" style="margin:20px;" id="btn-add">Add</button>
									    <button class="btn btn-primary mr5 waves-effect" style="display:none" id="delete" type="button" onclick="del()" value="Delete">Delete</button>
									</div>
									 <!---------------------canvas upload image start -->
						<div class="col-md-12" style="display:none;">
						 <img id="scream" height="25" width="21">
				 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image1;?></textarea>
				    <textarea id="debugConsole2" name="S2" rows="3" style="width:30%; display:1none"><?=$image2;?></textarea>
				    <textarea id="debugConsole3" name="S3" rows="3" style="width:30%; display:1none"><?=$image3;?></textarea>
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
					</form>
						</div>
						</div>
					</div>

					<?php
						 if(isset($_REQUEST['Submit1']))
						 {
						   $search=$_REQUEST['search'];

                           $cond=" and  concat(soum_prod_subsubcat.prod_subcat_desc,soum_prod_subcat.prod_subcat_desc) like '%$search%'";
						 }
						?>
					<!-- #end row -->
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20 table-responsive">
								 <table style="width:auto;float:right;">
										<tr><form method="post"><td style="padding-right:5px;"><input name="search" type="text" id="locations" class="form-control searchfield" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr>
									</table>
								<div style="background-color:#fff;width:100%;" >

								<table class="auto-style2" id="list-1" style="width: 100%;font-size:13px !important">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
										    <th style="padding: 5px;">SNo.</th>
											<th style="padding: 5px;">Model</th>
											<!--<th style="padding: 5px;">Type</th>
											<th style="padding: 5px;">Cable type</th>-->
											<th style="padding: 5px;">Connector 1</th>
											<th style="padding: 5px;">Connector 2</th>
											<th style="padding: 5px;">Cable</th>
											<!--<th style="padding: 5px;">Color</th>-->
											<th style="padding: 5px;">Length</th>
											<th style="padding: 5px;width:150px;">
											   <span>Action</span>
											</th>
										</tr>
									</thead>
									<tbody>
								<?php
								$sql="select soum_prod_subsubcat.*,soum_prod_subcat.prod_subcat_desc brand from soum_prod_subsubcat,soum_prod_subcat
                                      where soum_prod_subsubcat.prod_subcat_id=soum_prod_subcat.prod_subcat_id and soum_prod_subsubcat.prod_subcat_id!=0 and soum_prod_subsubcat.category_type='cable' ".$cond;
								//echo $sql;
								$res=$db->query($sql);
								$i=1;
								while($row=$res->fetch_assoc())
								{
								?>
										<tr>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$i++;?>


									    	<!--<table class="auto-style6" style="width: 100%">
												<tr>
													<td class="auto-style5"><img src="../upload/<?=$row['p_img1'];?>" height="20" width="18"></td>
													<td class="auto-style5"><img src="../upload/<?=$row['p_img2'];?>" height="20" width="18"></td>
													<td class="auto-style5"><img src="../upload/<?=$row['p_img3'];?>" height="20" width="18"></td>
												</tr>
											</table>-->

											</td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['brand']." ".$row['prod_subcat_desc'];?></td>
											<!--<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['type'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['cable_type'];?></td>-->
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['connector_1'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['connector_2'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['cable'];?></td>
											<!--<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['colour'];?></td>-->
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['length'];?></td>
											<td class="auto-style4" style="padding: 5px;text-align:center" valign="top">
												<button class="link btn-primary Edit" type="submit" style="margin:0px;padding: 2px 12px;" onclick="edit('<?=$row['prod_subsubcat_id'];?>','<?=$row['prod_subcat_desc'];?>','<?=$row['prod_subcat_id'];?>','<?=htmlspecialchars($row['type']);?>','<?=$row['cable_type'];?>','<?=htmlspecialchars($row['connector_1']);?>','<?=htmlspecialchars($row['connector_2']);?>','<?=$row['cable'];?>','<?=$row['colour'];?>','<?=$row['compatible'];?>','<?=$row['length'];?>','<?=$row['p_img1'];?>','<?=$row['p_img2'];?>','<?=$row['p_img3'];?>','<?=htmlspecialchars($row['p_desc']);?>','Edit')">Edit</button>
											   <a class="link btn-primary" href="colour_options.php?model_id=<?=$row['prod_subsubcat_id'];?>" >Colour</a>
											</td>
										</tr>
								<?php
								}
								?>

									</tbody>
								</table>
									</div>
							</div>
						</div>
					</div>
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
<script>
$("document").ready(function()
{
	fill('../fill.php','soum_prod_subcat','');
});
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
</script>
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


<?php
/*     $new_sql = "SELECT concat(soum_prod_subcat.prod_subcat_desc,' ',A.prod_subcat_desc) phone1
    FROM soum_prod_subcat
    LEFT JOIN soum_prod_subsubcat AS A
        ON soum_prod_subcat.prod_subcat_id = A.prod_subcat_id"; */

	$new_sql = "SELECT concat(soum_prod_subcat.prod_subcat_desc) phone1
    FROM soum_prod_subcat";

         $res=$db->query($new_sql);
         $allRows =array();
			while($rowss=$res->fetch_assoc()){
	          $allRows[]=$rowss['phone1'];
		    }
	if(empty($on)){
	    $onn=1;
	}else{
	 $onn=$on;
	}
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
    var locationsz = ["<?php echo  implode('","',$allRows); ?>"];
	var url     =  'search_auto.php';
	searchfun(<?php echo $onn ?>);


function searchfun(search_id){

	if(search_id==1){
     $('.searchfield').attr('id','locations');

	 	var availableTags = locationsz;
			$( "#locations" ).autocomplete({
			  minLength: 2,
			  source: availableTags
			});

	}else{
	 $('.searchfield').attr('id','searchkeword');
	 	  $("#searchkeword").autocomplete({
					minLength: 2,
					delay : 200,
					source: function(request, response) {

						$.ajax({
						   url: 	 url,
						   data:  {
									term : request.term,
									table   : 'order',
									field   : document.getElementById('searchon').value
							},
						   dataType: "json",

						   success: function(data) 	{
								//alert(data);
							 response(data);
						  }

						})
				   },

					  select:  function(e, ui) {
						   e.preventDefault();
							document.getElementById('searchkeword').value = ui.item.label;

					  }
				});

	}

}

  </script>


</body>
</html>
