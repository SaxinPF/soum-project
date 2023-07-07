<?php include('../config2.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

 	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
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
		function edit(prod_id,modal,filterstatus,code,act)
		{
			
			getDescription(prod_id);
			$("#prod_id").val(prod_id);
			$("#model").val(modal);
		    $("#act").val(act);
			$("#code").val(code);
			$("#filterstatus").val(filterstatus);
			
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

		function getDescription(prod_id) {

			$.ajax({
				url: "description_master_act.php", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: {data:prod_id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				success: function(data)   // A function to be called if request succeeds
				{
					$("#namedesc").val(data);
				}
			});
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


	  	if(act_conf=='Edit')
	  	{

			$("#prod_id").val();
			$("#model").val();
		    $("#namedesc").val();
			$("#code").val();
			$("#filterstatus").val();

			if (model=='')
			{
				alert('Modal name must be selected!');
				return false;
			}

			if (namedesc=='')
			{
				alert('Description name must be filled!');
				return false;
			}

			if (filterstatus=='')
			{
				alert('Filter Status must be filled!');
				return false;
			}
		
        }


		$.ajax({
		url: "airpod_master_act.php", // Url to which the request is send
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
	        url: "subsubcat_master_act.php",
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
									<h4 class="mb5 text-light"><a name="top">Watches Model Master</a></h4>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-6" id="enq" style="margin:auto;float:none;display:none">
							<div class="dash-head clearfix mb20">

							<form id="uploadimage"  method="post" enctype="multipart/form-data">
								<input type="hidden" id="prod_id" name="prod_id">
								<input type="hidden" id="act" name="act">
				
									<div class="col-md-6">
										<label class="control-label">Model* </label>
										<input class="form-control" id="model" name="model" type="text" placeholder="Model">
									</div>

									<div class="col-md-6">
										<label class="control-label">Code*</label>
										<input class="form-control" type="text" id="code" name="code" placeholder="">
									</div>


									<div class="col-md-6">
										<label class="control-label">Description*</label>
										<textarea class="form-control" type="text" id="namedesc" name="namedesc" rows="5"></textarea>
									</div>

									
									<div class="col-md-12">
										<label class="control-label">Filter Status</label>
										<select name="filterstatus" id="filterstatus" class="form-control">
											<option value="">Select</option>
											<option value="1">New</option>
											<option value="2">Used</option>
										</select>
									</div>

									<div class="col-md-12" style="text-align:center;">
										<button class="btn btn-primary mr5 waves-effect"  type="submit" style="margin:20px;" id="btn-add">Add</button>
									    <button class="btn btn-primary mr5 waves-effect" style="display:none" id="delete" type="button" onclick="del()" value="Delete">Delete</button>
									</div>
									</form>


				<div class="col-md-12" style="background:#fff;margin-bottom:20px;margin-top:15px;display:none;">
						<div class="panel-group" id="accordionDemo">
							<div class="panel panel-default" style="background:#ddd">
									<div class="panel-heading" style="background:#ddd">
										<h4 class="panel-title">
											<a href="#collapseTwoS" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo"><strong>More</strong> <span style="font-size:18px;float:right;"><strong>+</strong></span></a>
										</h4>
									</div>

									<div class="panel-collapse collapse" id="collapseTwoS">
										<div class="panel-body" style="background:#fff">

												<form method="post" action="new_save.php">
														<input type="hidden" id="brand" name="brand">
														<input type="hidden" id="model" name="model">
													<div class="col-md-6" style="margin-top:15px;">
														<label class="control-label">Quantity</label>
														<input name="qty" type="text" class="form-control"/>
													</div>
													<div class="col-md-6" style="margin-top:15px;">
														<label class="control-label">MRP</label>
														<input name="mrp" type="text" class="form-control"/>
													</div>
													<div class="col-md-6" style="margin-top:15px;">
														<label class="control-label">Price</label>
														<input name="expected_price" type="text" class="form-control" />
													</div>
													<div class="col-md-6" style="margin-top:15px;">
														<label class="control-label">Offer Price</label>
														<input name="offer_price" type="text" class="form-control"/>
													</div>
													<div class="col-md-12" style="text-align:center;margin-top:20px;">
														<button class="btn btn-primary mr5 waves-effect" name="Submit1" type="submit" value="submit">Submit</button>
												    </div>


													</form>
												</div>

										</div>
									</div>
								</div>



							</div>

							</div>
						</div>
					</div>

					<?php
					$cond='';
					$search = '';
						 if(isset($_REQUEST['Submit1']))
						 {
						   $search=$_REQUEST['search'];

                           $cond=" and concat(soum_product_master.modal_name,code,prod_cat_id,description) like '%$search%'";
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
											<th style="padding: 5px;">Name</th>
											<th style="padding: 5px;">Code</th>
											<th style="padding: 5px;">Filter Status</th>
											<th style="padding: 5px;width:150px;">
											<span>Action</span>
										</tr>
									</thead>
									<tbody>
								<?php
								$sql="select soum_product_master.* from soum_product_master where  trash != 'delete' and soum_product_master.category_type='watches' ".$cond;
								// echo $sql;
								// exit;
								$res=$db->query($sql);
								$i=1;
								// echo '<pre>';
								// print($sql);
								// exit;
								while($row=$res->fetch_assoc())
								{
								?>
									<tr>
										<td style="padding: 5px;" class="auto-style4" valign="top"><?=$i++;?></td>
										<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['modal_name'];?></td>
										<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['description'];?></td>
										<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['code'];?></td>
										<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['prod_cat_id'];?></td>
										<td class="auto-style4" style="padding: 5px;text-align:center" valign="top">
										<button class="link btn-primary Edit" type="submit" style="margin:0px;padding: 2px 12px;" onclick="edit('<?=$row['prod_id'];?>','<?=$row['modal_name'];?>','<?=$row['prod_cat_id'];?>','<?=htmlspecialchars($row['code']);?>','Edit')">Edit</button></td>
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
<!-- <script>
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
</script> -->
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
