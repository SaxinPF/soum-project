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
		function edit(cat_id,model,brand,display,battry,process,os,ram,color,fcame,bcame,weight,rom,img1,img2,img3,desc,act)
		{
			//alert(desc);
			$("#cat_id").val(cat_id);
			$("#model").val(cat_id);
		    $("#act").val(act);
		    $("#subcat1").val(brand);

			$("#soum_prod_subcat").val(brand);
			
			$("#brand").val(brand);
			$("#display").val(display);	
			$("#modal").val(model);
			$("#battry").val(battry);
			$("#process").val(process);
			$("#os").val(os);
			$("#ram").val(ram);
			$("#color").val(color);
			$("#fcame").val(fcame);
			$("#bcame").val(bcame);
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
			$("#weight").val(weight);
			$("#rom").val(rom);
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
			
			display=$("#display").val();
			battry=$("#battry").val();
			process=$("#process").val();
			os=$("#os").val();
			ram=$("#ram").val();
			fcame=$("#fcame").val();
			bcame=$("#bcame").val();
			weight=$("#weight").val();
			rom=$("#rom").val();
			
			
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
			
			if (display=='') 
			{
				alert('Phone Display must be filled!');
				return false;
			}
			if (battry=='') 
			{
				alert('Phone Battry must be filled!');
				return false;
			}
			if (process=='') 
			{
				alert('Phone Process must be filled!');
				return false;
			}
			if (os=='') 
			{
				alert('OS must be filled!');
				return false;
			}
			if (ram=='') 
			{
				alert('RAM must be filled!');
				return false;
			}
			if (fcame=='') 
			{
				alert('Front Camera must be filled!');
				return false;
			}
			if (bcame=='') 
			{
				alert('Back Camera must be filled!');
				return false;
			}
			if (weight=='') 
			{
				alert('Phone Weight must be filled!');
				return false;
			}
			if (rom=='') 
			{
				alert('ROM must be filled!');
				return false;
			}
			
			if (img1=='') 
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
			}
        }
		
		
		$.ajax({
		url: "subsubcat_master_act.php", // Url to which the request is send
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

<script>
function HandlePopupResult(result,pid) {
    //alert("result of popup is: " + result);
    
    $('#previewing'+pid).attr('src','../upload/temp/'+result);
    $('#debugConsole'+pid).val(result);
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
									<h4 class="mb5 text-light"><a name="top">Phone Model Master</a></h4>
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
										<label class="control-label">Device Model* </label>
										<input class="form-control" id="modal" name="modal" type="text" placeholder="Device Model">
									</div>
											
									<div class="col-md-6">
										<label class="control-label">Phone Display*</label>
										<input class="form-control" type="text" id="display" name="display" placeholder="5.5">
									</div>
									
									<div class="col-md-6">
										<label class="control-label">Battery*</label>
										<input type="text" class="form-control" id="battry" name="battry" placeholder="2350">
									</div>
									
									<div class="col-md-6">
										<label class="control-label">Processor*</label>
										<input class="form-control" type="text" id="process" name="process" placeholder="2GHz octa-core">
									</div>
									<div class="col-md-6">
										<label class="control-label">OS*</label>
										<input class="form-control" type="text" id="os" name="os" placeholder="OS">
									</div>
									<div class="col-md-6">
										<label class="control-label">RAM*</label>
										<input type="text" class="form-control" id="ram" name="ram" placeholder="MB/GB">
									</div>
 									<div class="col-md-6">
										<label class="control-label">Color</label>
										<input class="form-control" type="text" id="color" name="color" placeholder="Color">
									</div>
									<div class="col-md-6">
										<label class="control-label">Front Camera*</label>
										<input type="text" class="form-control" id="fcame" name="fcame" placeholder="12">
									</div>
									<div class="col-md-6">
										<label class="control-label">Back Camera*</label>
										<input class="form-control" type="text" id="bcame" name="bcame" placeholder="16">
									</div>
									<div class="col-md-6">
										<label class="control-label">Weight*</label>
										<input type="text" class="form-control" id="weight" name="weight" placeholder="180">
									</div>
									<div class="col-md-6">
										<label class="control-label">ROM*</label>
										<input class="form-control" type="text" id="rom" name="rom" placeholder="MB/GB">
									</div>
									<div class="col-sm-4" style="margin-top:15px;">
										<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;" onclick="window.open('1.php?id=1', '_blank', 'location=yes,height=450,width=520,scrollbars=yes,status=yes');">
											<img src="../images/no_img.png" id="previewing1" style="height:80px;width:auto;position:absolute;top:0;"/>
											<span class="select-wrapper"></span>
										</div>
										<input type="hidden" id="fileToUpload1a"><input type="hidden" id="fileToUpload2a"><input type="hidden" id="fileToUpload3a">
									</div>
		                            <div class="col-sm-4" style="margin-top:15px;">
			                            <div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;" onclick="window.open('1.php?id=2', '_blank', 'location=yes,height=450,width=520,scrollbars=yes,status=yes');">
			                            	<img src="../images/no_img.png" id="previewing2" style="height:80px;width:auto;position:absolute;top:0;"/>
			                            	<span class="select-wrapper"></span>
			                            </div>
		                            </div>
		                            <div class="col-sm-4" style="margin-top:15px;">
		                            	<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;" onclick="window.open('1.php?id=3', '_blank', 'location=yes,height=450,width=520,scrollbars=yes,status=yes');">
			                            	<img src="../images/no_img.png" id="previewing3" style="height:80px;width:auto;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"></span>
		                            	</div>
		                            </div>
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
									
									
				<div class="col-md-12" style="background:#fff;margin-bottom:20px;margin-top:15px;">
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
						 if(isset($_REQUEST['Submit1']))
						 {
						   $search=$_REQUEST['search'];
						   
                           $cond=" where  concat(prod_subcat_desc,display,battry,os,processor,ram,colour,p_rom) like '%$search%'"; 
						 }
						?>
					<!-- #end row -->
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								 <table style="width:auto;float:right;">
										<tr><form method="post"><td style="padding-right:5px;"><input name="search" type="text" class="form-control" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr>
									</table>
								<div style="background-color:#fff;width:100%;">
								
								<table class="auto-style2" id="list-1" style="width: 100%;font-size:13px !important">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
										    <th style="padding: 5px;">SNo.</th>
											<th style="padding: 5px;">Model</th>
											<th style="padding: 5px;">Display</th>
											<th style="padding: 5px;">Battery</th>
											<th style="padding: 5px;">Processor</th>
											<th style="padding: 5px;">OS</th>
											<th style="padding: 5px;">RAM</th>
											<th style="padding: 5px;">Color</th>
											<th style="padding: 5px;">ROM</th>
											<th style="padding: 5px;width:100px;">
											<span>Action</span> 
											<button class="btn btn-primary mr5 waves-effect" type="submit" id="Add" style="margin:0px;padding:0px 8px;float:right;" onclick="edit('','','','','','','','','','','','','','','','','','Add')">[+]</button></th>
										</tr>
									</thead>
									<tbody>
								<?php 
								$sql="select * from soum_prod_subsubcat".$cond;
								$res=$db->query($sql);
								$i=1;
								while($row=$res->fetch_assoc())
								{
								?>
										<tr>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$i++;?>
											
																							
											<table class="auto-style6" style="width: 100%">
												<tr>
													<td class="auto-style5"><img src="../upload/<?=$row['p_img1'];?>" height="20" width="18"></td>
													<td class="auto-style5"><img src="../upload/<?=$row['p_img2'];?>" height="20" width="18"></td>
													<td class="auto-style5"><img src="../upload/<?=$row['p_img3'];?>" height="20" width="18"></td>
												</tr>
											</table>
											
											</td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['prod_subcat_desc'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['display'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['battry'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['processor'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['os'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['ram'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['colour'];?></td>
											<td style="padding: 5px;" class="auto-style4" valign="top"><?=$row['p_rom'];?></td>
											<td class="auto-style4" style="padding: 5px;text-align:center" valign="top">
												<button class="link btn-primary Edit" type="submit" style="margin:0px;padding: 2px 12px;" onclick="edit('<?=$row['prod_subsubcat_id'];?>','<?=$row['prod_subcat_desc'];?>','<?=$row['prod_subcat_id'];?>','<?=htmlspecialchars($row['display']);?>','<?=$row['battry'];?>','<?=htmlspecialchars($row['processor']);?>','<?=htmlspecialchars($row['os']);?>','<?=$row['ram'];?>','<?=$row['colour'];?>','<?=$row['fcame'];?>','<?=$row['bcame'];?>','<?=$row['p_weight'];?>','<?=$row['p_rom'];?>','<?=$row['p_img1'];?>','<?=$row['p_img2'];?>','<?=$row['p_img3'];?>','<?=htmlspecialchars($row['p_desc']);?>','Edit')">Edit</button>
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

</body>
</html>