<?php include('../config2.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Digitalheptagon">
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
#fileToUpload5 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload6 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload7 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload8 {
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

		function edit(title,images,p_id,act)
		{
			//alert(desc);
			$("#prod_id").val(p_id);
			$("#act").val(act);

			if(act=='Edit'){
			  $("#txt_title").val(title);

			}
			if(images=="")
			{
				$('#previewing1').attr('src', "../images/no_img.png");
			}
			else
			{
				$('#previewing1').attr('src', "../upload/"+images);
			    $("#debugConsole1").val(images);
			}

			if(act=='Edit'){
			   $("#btn-add").html('Save');
			}
			else
			{
			$("#btn-add").html(act);

            }
            document.location='#top';
		}


$(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();

	var act_conf=document.getElementById("act").value;



	  	if(act_conf=='Edit' || act_conf=='Add')
	  	{
		  	  var debugConsole1=$('#debugConsole1').val();
			  var price=$('#txt_title').val();

			     if(debugConsole1=='' || debugConsole1=='')
				  {
					//alert('Please add the image.');
					//return false;
				  }
				    if(price=='')
					  {
						alert('Color Title must be entered');
						return false;
					  }

        }

		 $('#btn-add').html('<img src="../upload/loader.gif">');
		$.ajax({
		url: "color_save.php", // Url to which the request is send
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
								<?php
                                $model_id  = $_REQUEST['model_id'];
														$sql="select soum_prod_subsubcat.*,soum_prod_subcat.prod_subcat_desc brand from soum_prod_subsubcat,soum_prod_subcat
                                      where soum_prod_subsubcat.prod_subcat_id=soum_prod_subcat.prod_subcat_id and soum_prod_subsubcat.prod_subcat_id!=0 and prod_subsubcat_id=".$model_id;
								//echo $sql;
								$res=$db->query($sql);
								$row=$res->fetch_assoc();
								?>

									<h4 class="mb5 text-light"><a name="top">Ad Colours for <?php echo $row['brand'].' '.$row['prod_subcat_desc']; ?></a></h4>
								</div>
                                <div>
                                  <button class="btn btn-primary mr5 waves-effect" type="submit" id="Add" style="margin:0px;padding:6px 100px;float:right;" onclick="edit('','','','Add')">Add new</button>
                                </div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-6" id="enq" style="margin:auto;float:none;display:none">
							<div class="dash-head clearfix mb20">

							<form id="uploadimage"  method="post" enctype="multipart/form-data">
								<input type="hidden" id="prod_id" name="prod_id">
								<input type="hidden" value="<?php  echo $model_id ?>" id="model_id" name="model_id">
								<input type="hidden"  id="act" name="act">
									   <div class="col-md-6">
											<label class="control-label">Color Title*</label>
											   <input type="text" name="title" value="" id="txt_title" class="form-control" Placeholder="Enter title"/>
										</div>

										<div class="col-md-12">
											    <label class="control-label">Image (optional)</label>
										</div>

									<div class="col-sm-4" style="margin-top:15px;">
										<div class="filedivcls">
											<img src="../images/no_img.png" id="previewing1" style="height:80px;width:auto;position:absolute;top:0;"/>
											<span class="select-wrapper"><input name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
										</div>
										<input type="hidden" id="fileToUpload1a"><input type="hidden" id="fileToUpload2a"><input type="hidden" id="fileToUpload3a">
									</div>
		                    		<div class="col-md-12" style="text-align:center;">
										<button class="btn btn-primary mr5 waves-effect"  type="submit" style="margin:20px;" id="btn-add">Add</button>

									</div>
									 <!---------------------canvas upload image start -->
						<div class="col-md-12" style="display:none;">
						 <img id="scream" height="25" width="21">
				 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image1;?></textarea>

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


					<!-- #end row -->
					<div class="row">
						<div class="col-md-12">

					<div class="clearfix tabs-fill">
								<div class="tab-content table-responsive">
									<div class="tab-pane active" id="tab-flip-one-1">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background:#4a9de4;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Colour Title</th>
											<th style="padding:5px;">Image (optional)</th>
											<th style="padding: 5px;width:250px;">
											   <span>Action</span>

											</th>
										</tr>
									</thead>
									<tbody>
									<?php
									//$type=$_REQUEST['type'];
									$sql="select * from soum_colors where soum_colors.model_id=".$model_id;
								//echo $sql;
									  $res=$db->query($sql);
									  $acount=mysqli_num_rows($res);


									  while($row=$res->fetch_assoc())
									  {
								/* 	  echo '<pre>';
									  print_r($row); */


									?>
										<tr>
											<td><?=$i++;?></td>
											<td><?=$row['title'];?></td>
											<td><?php if(!empty($row['image'])){ ?>
											       <img width="100" src="../upload/<?=$row['image'];?>">
												   <?php } ?></td>
											<td>
											<button class="link btn-primary Edit" type="submit" style="margin:0px;padding: 2px 12px;" onclick="edit('<?=$row['title'];?>','<?=$row['image'];?>','<?=$row['id'];?>','Edit')">Edit</button>
											<a class="link btn-danger" onclick="return confirm('Are you sure you want to delete this colour ?');"href="color_trash.php?prod_id=<?=$row['id'];?>&model_id=<?php echo $model_id; ?>">Delete</a>
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
	  url: "../script.php",
	  data: {
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	  $('#debugConsole'+popid).val(o);
	   $('#previewing'+popid).attr('src','../upload/'+o);
	});
}

$("#txt_imi_no").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9]/g)) {
       $(this).val(val.replace(/[^0-9]/g, ''));
   }

   if (val.length>15)
	{
       $(this).val(val.substr(0,15));

   }

});



</script>
</body>
</html>
