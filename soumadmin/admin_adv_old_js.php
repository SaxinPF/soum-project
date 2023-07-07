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
  background-size:25px 25px;
  background-position:center center;
	display: block;
	position: relative;
	width: 100%;
	height: 80px;

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
#fileToUpload3 , #fileToUpload4{
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
#previewing7 , #previewing1 , #previewing2 , #previewing3 , #previewing4 , #previewing5 , #previewing6 , #previewing8{
width:auto;
}
.filedivcls {
background: #ffffff;
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

		function edit(brand,model,emi,rom,ram2,images,images1,images2,bill_img,add_proof_img,offer_price,sell_letter,swap_letter,s_photo,seller_name,seller_email,seller_phone,colour,seller_address,seller_city,yearbyadmin,condi,active,p_id,act)
		{
			//alert(desc);
			$("#prod_id").val(p_id);
			$("#act").val(act);

			if(act=='Edit'){
			fill2(brand,model);
			get_color(model,colour);
			$("#soum_prod_subcat").val(brand);

			$("#txt_imi_no").val(emi);
			$("#exampleFormControlSelect1").val(rom);
			$("#exampleFormControlSelect1ram").val(ram2);
			$("#txt_expected_price").val(offer_price);
			$("#seller_name").val(seller_name);
			$("#seller_email").val(seller_email);
			$("#seller_phone").val(seller_phone);
			//$("#colour").val(colour);
			$("#seller_address").val(seller_address);
			$("#seller_city").val(seller_city);


			var keywordsArr = condi.split( ',' );
			    if(keywordsArr[0]){
				 $( '.condition'+keywordsArr[0] ).prop( "checked",true );
				}
				if(keywordsArr[1]){
				 $( '.condition'+keywordsArr[1] ).prop( "checked",true );
				}
				if(keywordsArr[2]){
				 $( '.condition'+keywordsArr[2] ).prop( "checked",true );
				}
				if(keywordsArr[3]){
				 $( '.condition'+keywordsArr[3] ).prop( "checked",true );
				}

			$("#yearbyadmin").val(yearbyadmin);

			if(active ==1){
			   $( '#approve' ).prop( "checked",true );
			}

			}
			if(images=="")
			{
				$('#previewing1').attr('src', "../images/noimage.png");
			}
			else
			{
				$('#previewing1').attr('src', "../upload/"+images);
				$("#debugConsole1").val(images);
			}

			if(images1=="")
			{
				$('#previewing2').attr('src', "../images/noimage.png");
			}
			else
			{
				$('#previewing2').attr('src', "../upload/"+images1);
			    $("#debugConsole2").val(images1);
			}
			if(images2=="")
			{
				$('#previewing3').attr('src', "../images/noimage.png");
			}
			else
			{
				$('#previewing3').attr('src', "../upload/"+images2);
			    $("#debugConsole3").val(images2);
			}

			if(add_proof_img=="")
			{
				$('#previewing6').attr('src', "../images/noimage.png");
			}
			else
			{
				$('#previewing6').attr('src', "../upload/"+add_proof_img);
			    $("#debugConsole6").val(add_proof_img);
			}

			if(bill_img=="")
			{
				$('#previewing5').attr('src', "../images/noimage.png");
			}
			else
			{
				$('#previewing5').attr('src', "../upload/"+bill_img);
			    $("#debugConsole5").val(bill_img);
			}

			if(sell_letter=="")
			{
				$('#previewing7').attr('src', "../images/noimage.png");
			}
			else
			{
				$('#previewing7').attr('src', "../upload/"+sell_letter);
			    $("#debugConsole7").val(sell_letter);
			}

			if(swap_letter=="")
			{
				$('#previewing8').attr('src', "../images/noimage.png");
			}
			else
			{
				$('#previewing8').attr('src', "../upload/"+swap_letter);
			    $("#debugConsole8").val(swap_letter);
			}

			if(s_photo=="")
			{
				$('#previewing4').attr('src', "../images/noimage.png");
			}
			else
			{
				$('#previewing4').attr('src', "../upload/"+s_photo);
			    $("#debugConsole4").val(s_photo);
			}


			if(act=='Edit')
			{
			$("#btn-add").html('Save');
			//$("#delete").show();
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
		  		var model=$("#soum_prod_subsubcat").val();
	            var brand=$("#soum_prod_subcat").val();

				  var debugConsole1=$('#debugConsole1').val();
				  var debugConsole2=$('#debugConsole2').val();
				  var debugConsole3=$('#debugConsole3').val();
				  var price=$('#txt_expected_price').val();
				  var imi=$('#txt_imi_no').val();

                  var color_d=$('#colour').val();

					if (brand==""){
						alert("Please fill the Brand first!");
						return false;
					}
					if (model=="")
					{
						alert("Please select the model first!");
						return false;
					}
				    if(imi=='')
					  {
						alert('IMEI number must be filled');
						return false;
					  }
				  if(imi.length<15)
					  {
						alert('IMEI number must be 15 digits');
						return false;
					   }

				   if(debugConsole1=='' || debugConsole1=='')
				  {
					alert('Please add the first image of your Ad');
					return false;
				  }

				  if(debugConsole2=='' || debugConsole2=='')
				  {
					alert('Please add the second image');
					return false;
				  }

				    if(price=='')
					  {
						alert('Expected Price must be entered');
						return false;
					  }

					  if(color_d==''){
						alert('Please select a colour.');
						return false;
					   }






        }

		 $('#btn-add').html('Please Wait...');
		$.ajax({
		url: "admin_adv_save.php", // Url to which the request is send
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
									<h4 class="mb5 text-light"><a name="top">Admin Advertisement</a></h4>
								</div>
                                <div>
                                <button class="btn btn-primary mr5 waves-effect" type="submit" id="Add" style="margin:0px;padding:6px 100px;float:right;" onclick="edit('','','','','','','','','','','','','','','','','','','','','','','','','Add')">Add new</button>
                                </div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-6" id="enq" style="margin:auto;float:none;display:none">
							<div class="dash-head clearfix mb20">

							<form id="uploadimage"  method="post" enctype="multipart/form-data">
								<input type="hidden" id="prod_id" name="prod_id">
									<input type="hidden"  id="act" name="act">
									<div class="col-md-6">
										<label class="control-label">Company/ Brand* </label>
										<select class="form-control" name="drpBrand" id="soum_prod_subcat" onchange="fill2(this.value,'');" >
						                     <option selected="selected" value="">Select Brand</option>
													<?php
													  $sql="select * from soum_prod_subcat order by prod_subcat_id desc";
													  $res=$db->query($sql);
													  while($row=$res->fetch_assoc())
													  {
													  ?>
														 <?php
													 $brand_sel = '';
													 if(isset($brand) && $brand == $row['prod_subcat_id']){
														$brand_sel =    $selected="selected";
													 } ?>
											 <option <?php echo $brand_sel ?> value="<?=$row['prod_subcat_id'];?>"><?=$row['prod_subcat_desc']?></option>

										 <?php }
										?>

						                 </select>
									</div>

									<div class="col-md-6">
										<label class="control-label">Device Model* </label>
										   <div id="name_loader2"></div>
									    <select class="form-control " name="drpModel" id="soum_prod_subsubcat" onchange="get_color(this.value,'')" >
                                            <option selected="selected" value="">Model Name</option>
										</select>
									</div>

									<div class="col-md-6">
										<label class="control-label">RAM* </label>

									  	   <select class="form-control" name="ram" id="exampleFormControlSelect1ram">
												 <?php
													 $Storageram  = array(1,2,3,4,5,6,7,8,9,10);
												 foreach($Storageram as $val){
													$selected_ram = '';
												 if(isset($mram) && $mram==$val){
													 $selected_ram =  'selected="selected"';
												 } ?>
													  <option value='<?php echo $val ?>' <?php echo $selected_ram; ?> ><?php echo $val ?> GB</option>

												<?php  }  ?>

											</select>
									</div>


										<div class="col-md-6">
										   <label class="control-label">ROM* </label>

											<select class="form-control" name="rom" id="exampleFormControlSelect1">
												 <?php
													 $Storage  = array(2,4,8,16,32,64,128,256);
												 foreach($Storage as $value){
													$selected_rom = '';
												 if(isset($mrom) && $mrom==$value){
													 $selected_rom =  'selected="selected"';
												 } ?>
													  <option value='<?php echo $value ?>' <?php echo $selected_rom; ?> ><?php echo $value ?> GB</option>

												<?php  }  ?>
											</select>
									    </div>


										<div class="col-md-6">
											<label class="control-label">IMEI*</label>
											   <input type="text" name="imi_no" value="" id="txt_imi_no" class="form-control" Placeholder="Enter IMEI number"/>
										</div>

										<div class="col-md-6">
											    <label class="control-label">Price Expected (₹)*</label>
											   	<input type="text" name="expected_price" value="" id="txt_expected_price" class="form-control" Placeholder=""/>
										</div>

										<div class="col-md-12">
											    <label class="control-label">Ads with photos</label>
										</div>

									<div class="col-sm-4" style="margin-top:15px;">
										<div class="filedivcls">
											<img src="../images/noimage.png" id="previewing1" style="height:80px;position:absolute;top:0;"/>
											<span class="select-wrapper"><input name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
										</div>
										<input type="hidden" id="fileToUpload1a"><input type="hidden" id="fileToUpload2a"><input type="hidden" id="fileToUpload3a">
									</div>
		                            <div class="col-sm-4" style="margin-top:15px;">
			                            <div class="filedivcls">
			                            	<img src="../images/noimage.png" id="previewing2" style="height:80px;position:absolute;top:0;"/>
			                            	<span class="select-wrapper"><input name="fileToUpload2" id="fileToUpload2" onchange="abc(this,2);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
			                            </div>
		                            </div>
		                            <div class="col-sm-4" style="margin-top:15px;">
		                            	<div class="filedivcls">
			                            	<img src="../images/noimage.png" id="previewing3" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload3" id="fileToUpload3" onchange="abc(this,3);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
		                            </div>

									 <div class="col-sm-4" style="margin-top:15px;">
											<label class="control-label">Bill or Letter head</label>
										<div class="filedivcls">
			                            	<img src="../images/noimage.png" id="previewing6" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload6" id="fileToUpload6" onchange="abc(this,6);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									</div>

									 <div class="col-sm-4" style="margin-top:15px;">
									 <label class="control-label">Seller Identity</label>

										<div class="filedivcls">
			                            	<img src="../images/noimage.png" id="previewing5" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload5" id="fileToUpload5" onchange="abc(this,5);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									</div>

									<div class="col-sm-4" style="margin-top:15px;">
									 <label class="control-label">Sell letter</label>

										<div class="filedivcls">
			                            	<img src="../images/noimage.png" id="previewing7" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload7" id="fileToUpload7" onchange="abc(this,7);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									</div>

									<div class="col-sm-4" style="margin-top:15px;">
									 <label class="control-label">Swap letter</label>

										<div class="filedivcls">
			                            	<img src="../images/noimage.png" id="previewing8" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload8" id="fileToUpload8" onchange="abc(this,8);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									</div>
                                    <div class="col-sm-4" style="margin-top:15px;">
    								 <label class="control-label">Seller Photo</label>

										<div class="filedivcls">
			                            	<img src="../images/noimage.png" id="previewing4" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload4" id="fileToUpload4" onchange="abc(this,4);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									</div>
									<div class="col-md-12">
									        <label class="control-label">Accessories</label><br>
													      <?php
																		$sqli="select * from soum_phone_assecc";
																		$resi=$db->query($sqli);
																		while($rowi=$resi->fetch_assoc())
																		{
														   ?>
															 <p class="msg-line" style="float:left;"><label><input name="condition[]"
															  value="<?=$rowi['access_id']?>" type="checkbox" class="condition<?=$rowi['access_id']?>" style="color:#3376bb;font-size:15px;margin-right:10px;"><?=$rowi['access_name']?></label></p>
																 <?php } ?>



									</div>
                                    <div class="clearfix"></div>
									<div class="col-md-6">
											<label class="control-label">How old is your device?</label>
											<input type="text" name="yearbyadmin" value="" id="yearbyadmin" class="form-control" Placeholder=""/>
									</div>
									<div class="col-md-6">
											<label class="control-label">Colour</label>
											<select class="form-control minimal" name="color_id" id="colour">
												<option value='' >Select</option>

											</select>
									</div>
									<div class="col-md-6">
											<label class="control-label">Seller Name</label>
											<input type="text" name="seller_name" value="" id="seller_name" class="form-control" Placeholder=""/>
									</div>
									    <div class="col-md-6">
											<label class="control-label">Seller Phone</label>
											<input type="text" name="seller_phone" value="" id="seller_phone" class="form-control" Placeholder=""/>
									</div>
                                    <div class="col-md-6">
											<label class="control-label">Invoice Number</label>
											<input type="text" name="seller_email" value="" id="seller_email" class="form-control" Placeholder=""/>
									</div>
									<div class="col-md-6">
											<label class="control-label">Invoice Date</label>
											<input type="text" name="seller_address" value="" id="seller_address" class="form-control" Placeholder=""/>
									</div>
									<div class="col-md-12">
											<label class="control-label">Complete Phone Details</label>
											<input type="text" name="seller_city" value="" id="seller_city" class="form-control" Placeholder=""/>
									</div>
									<div class="col-md-2">
										   <label class="control-label">Approve </label><br>
											<label><input name="approve" type="checkbox" id="approve"  />&nbsp;Approve</label>
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
					<textarea id="debugConsole4" name="S4" rows="3" style="width:30%; display:1none"><?=$image4;?></textarea>
				    <textarea id="debugConsole5" name="S5" rows="3" style="width:30%; display:1none"><?=$image5;?></textarea>
					<textarea id="debugConsole6" name="S6" rows="3" style="width:30%; display:1none"><?=$image6;?></textarea>
					<textarea id="debugConsole7" name="S7" rows="3" style="width:30%; display:1none"><?=$image7;?></textarea>
					<textarea id="debugConsole8" name="S8" rows="3" style="width:30%; display:1none"><?=$image8;?></textarea>

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
									</form>




							</div>
						</div>
					</div>


					<!-- #end row -->
					<div class="row">
						<div class="col-md-12">

					<div class="clearfix tabs-fill">


								<table style="width:auto;float:right;">
									<tr>

									<form method="get"><td style="padding-right:5px;">
										<select name="searchon" class="form-control">
										<option value="0" <?php if($on==0) echo "Selected";?>>All</option>
										<option value="1" <?php if($on==1) echo "Selected";?>>Brand & Model</option>
										</select>
										</td>
										<td style="padding-right:5px;">
										<input class="form-control" name="search" type="text" value="<?=$search;?>"></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr>
								</table>

								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">New Ad(Pending) <span id="acount">&nbsp; ( 0 )</span></a></li>
									<!--<li><a href="#tab-flip-two-1" data-toggle="tab">Pending <span id="pcount">&nbsp; ( 0 )</span></a></li>-->
									<li><a href="#tab-flip-three-1" data-toggle="tab">Approved <span id="dcount">&nbsp; ( 0 )</span></a></li>

								</ul>

								<div class="tab-content table-responsive">
									<div class="tab-pane active" id="tab-flip-one-1">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background:#4a9de4;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Token Id</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>
											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Expected Price</th>
											<th style="padding: 5px;width:250px;">
											   <span>Action</span>

											</th>
										</tr>
									</thead>
									<tbody>
									<?php
									//$type=$_REQUEST['type'];
									$type = 'Admin';
									$cond='';
									if($type!='')
									{
								    $cond=" and soum_product_master.poster_type='$type' and soum_product_master.trash!='delete'";
									}

									  $sql="select *,concat(prod_subcat_desc,' ',model_name ) phone1 from (
select *,
if(poster_type='Dealer',
		(select fname from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select fname from soum_master_customer where cust_id=temp1.poster_id),'Admin')) fname,

	if(poster_type='Dealer',
		(select mobile from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=temp1.poster_id),'Admin')) mobile
 from (select   temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
										select * from (
										select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal,soum_product_master.imei_no,soum_product_master.rom,soum_product_master.ram2,soum_product_master.images2,soum_product_master.bill_img,soum_product_master.add_proof_img,soum_product_master.images1,soum_product_master.images,soum_product_master.sell_letter,soum_product_master.swap_letter,soum_product_master.seller_name,soum_product_master.seller_email,soum_product_master.seller_phone,soum_product_master.color_id,soum_product_master.seller_address,soum_product_master.seller_city,soum_product_master.yearbyadmin,soum_product_master.condi,soum_product_master.active,soum_product_master.seller_img
										,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where active=0 $cond) prod
										left outer join soum_prod_subcat
										on prod.brand=soum_prod_subcat.prod_subcat_id)temp
										left outer join soum_prod_subsubcat
										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id
) temp1
)tmep2 ".$conds." order by prod_id desc";
									  //echo $sql;
									  //die();
										$i=1;
									  $res=$db->query($sql);
									  $acount=mysqli_num_rows($res);


									  while($row=$res->fetch_assoc())
									  {
								/* 	  echo '<pre>';
									  print_r($row); */


									    $originalDate =$row['post_date'];
										$post_dt= date("d-m-Y h:i A", strtotime($originalDate));
										$time= date("h:i A", strtotime($originalDate));

									?>
										<tr>
											<td><?=$i++;?></td>
											<td><?=$row['code'];?></td>
											<td><?=$post_dt;?></td>
											<td><?=$row['seller_name'];?></td>
											<td><?=$row['seller_phone'];?></td>

											<td><?=$row['phone1'];?></td>
											<td><?=$row['offer_price'];?></td>
											<td><a class="link btn-primary" href="phone_detail.php?prod_id=<?=$row['prod_id'];?>&poster_id=<?=$row['poster_id'];?>&type=<?=$type;?>">Details</a>
											<button class="link btn-primary Edit" type="submit" style="margin:0px;padding: 2px 12px;" onclick="edit('<?=$row['brand'];?>','<?=$row['modal'];?>','<?=$row['imei_no'];?>','<?=$row['rom'];?>','<?=$row['ram2'];?>','<?=$row['images'];?>','<?=$row['images1'];?>','<?=$row['images2'];?>','<?=$row['bill_img'];?>','<?=$row['add_proof_img'];?>','<?=$row['offer_price'];?>','<?=$row['sell_letter'];?>','<?=$row['swap_letter'];?>','<?=$row['seller_img'];?>','<?=$row['seller_name'];?>','<?=$row['seller_email'];?>','<?=$row['seller_phone'];?>','<?=$row['color_id'];?>','<?=$row['seller_address'];?>','<?=$row['seller_city'];?>','<?=$row['yearbyadmin'];?>','<?=$row['condi'];?>','<?=$row['active'];?>','<?=$row['prod_id'];?>','Edit')">Edit</button>
											<a class="link btn-danger" onclick="return confirm('Are you sure you want to delete this product ?');"href="product_trash.php?prod_id=<?=$row['prod_id'];?>&type=Admin">Delete</a>
</td>
										</tr>
									<?php

									}
									?>
									</tbody>
								</table>
									</div>
									<div class="tab-pane" id="tab-flip-two-1">
<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #4a9de4;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Token Id</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>

											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Expected Price</th>
											<th style="padding: 5px;width:250px;">
											   <span>Action</span>

											</th>
										</tr>
									</thead>
									<tbody>
									<?php
									 $sql="select *,concat(prod_subcat_desc,' ',model_name ) phone1 from (
select *,
if(poster_type='Dealer',
		(select fname from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select fname from soum_master_customer where cust_id=temp1.poster_id),'Admin')) fname,

	if(poster_type='Dealer',
		(select mobile from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=temp1.poster_id),'Admin')) mobile
 from (select   temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
										select * from (
										select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal
										,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where active=2 $cond) prod
										left outer join soum_prod_subcat
										on prod.brand=soum_prod_subcat.prod_subcat_id)temp
										left outer join soum_prod_subsubcat
										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id
) temp1
)tmep2 ".$conds." order by prod_id desc";
									 //echo $sql;
										$i=1;
									  $res=$db->query($sql);
									   $pcount=mysqli_num_rows($res);


									  while($row=$res->fetch_assoc())
									  {
									        $originalDate =$row['post_date'];
											$post_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));


									?>
										<tr>
											<td><?=$i++;?></td>
											<td><?=$row['code'];?></td>
											<td><?=$post_dt;?></td>
												<td><?=$row['seller_name'];?></td>
											<td><?=$row['seller_phone'];?></td>

											<td><?=$row['phone1'];?></td>
											<td><?=$row['offer_price'];?></td>
											<td><a class="link btn-primary" href="phone_detail.php?prod_id=<?=$row['prod_id'];?>&poster_id=<?=$row['prod_id'];?>&type=<?=$type;?>">Details</a>
                                            	<button class="link btn-primary Edit" type="submit" style="margin:0px;padding: 2px 12px;" onclick="edit('<?=$row['brand'];?>','<?=$row['modal'];?>','<?=$row['imei_no'];?>','<?=$row['rom'];?>','<?=$row['ram2'];?>','<?=$row['images'];?>','<?=$row['images1'];?>','<?=$row['images2'];?>','<?=$row['bill_img'];?>','<?=$row['add_proof_img'];?>','<?=$row['offer_price'];?>','','','','','','<?=$row['prod_id'];?>','Edit')">Edit</button>
											<a class="link btn-danger" onclick="return confirm('Are you sure you want to delete this product ?');"href="product_trash.php?prod_id=<?=$row['prod_id'];?>&type=Admin">Delete</a>
</td>
										</tr>
									<?php

									}
									?>
									</tbody>
								</table>
									</div>
									<div class="tab-pane" id="tab-flip-three-1">
<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #4a9de4;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Token Id</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>

											<th style="padding:5px;">Brand Model</th>
											<th style="padding:5px;">Expected Price</th>
											<th style="padding: 5px;width:250px;">
											   <span>Action</span>

											</th>
										</tr>
									</thead>
									<tbody>
									<?php
									 $sql="select *,concat(prod_subcat_desc,' ',model_name ) phone1 from (
select *,
if(poster_type='Dealer',
		(select fname from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select fname from soum_master_customer where cust_id=temp1.poster_id),'Admin')) fname,

	if(poster_type='Dealer',
		(select mobile from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=temp1.poster_id),'Admin')) mobile
 from (select   temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
										select * from (
									   select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal,soum_product_master.imei_no,soum_product_master.rom,soum_product_master.ram2,soum_product_master.images2,soum_product_master.bill_img,soum_product_master.add_proof_img,soum_product_master.images1,soum_product_master.images,soum_product_master.sell_letter,soum_product_master.swap_letter,soum_product_master.seller_name,soum_product_master.seller_email,soum_product_master.seller_phone,soum_product_master.color_id,soum_product_master.seller_address,soum_product_master.seller_city,soum_product_master.yearbyadmin,soum_product_master.condi,soum_product_master.active,soum_product_master.seller_img
										,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where active=1 $cond) prod
										left outer join soum_prod_subcat
										on prod.brand=soum_prod_subcat.prod_subcat_id)temp
										left outer join soum_prod_subsubcat
										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id
) temp1
)tmep2 ".$conds." order by prod_id desc";
									 //echo $sql;
										$i=1;
									  $res=$db->query($sql);
									   $dcount=mysqli_num_rows($res);


									  while($row=$res->fetch_assoc())
									  {
									        $originalDate =$row['post_date'];
											$post_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));


									?>
										<tr>
											<td><?=$i++;?></td>
											<td><?=$row['code'];?></td>
											<td><?=$post_dt;?></td>
											<td><?=$row['seller_name'];?></td>
											<td><?=$row['seller_phone'];?></td>

											<td><?=$row['phone1'];?></td>
											<td><?=$row['offer_price'];?></td>
											<td><a class="link btn-primary" href="phone_detail.php?prod_id=<?=$row['prod_id'];?>&poster_id=<?=$row['prod_id'];?>&type=<?=$type;?>">Details</a>
					                         <button class="link btn-primary Edit" type="submit" style="margin:0px;padding: 2px 12px;" onclick="edit('<?=$row['brand'];?>','<?=$row['modal'];?>','<?=$row['imei_no'];?>','<?=$row['rom'];?>','<?=$row['ram2'];?>','<?=$row['images'];?>','<?=$row['images1'];?>','<?=$row['images2'];?>','<?=$row['bill_img'];?>','<?=$row['add_proof_img'];?>','<?=$row['offer_price'];?>','<?=$row['sell_letter'];?>','<?=$row['swap_letter'];?>','<?=$row['seller_img'];?>','<?=$row['seller_name'];?>','<?=$row['seller_email'];?>','<?=$row['seller_phone'];?>','<?=$row['color_id'];?>','<?=$row['seller_address'];?>','<?=$row['seller_city'];?>','<?=$row['yearbyadmin'];?>','<?=$row['condi'];?>','<?=$row['active'];?>','<?=$row['prod_id'];?>','Edit')">Edit</button>
											<a class="link btn-danger" onclick="return confirm('Are you sure you want to delete this product ?');"href="product_trash.php?prod_id=<?=$row['prod_id'];?>&type=Admin">Delete</a>
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
<script>

 function fill2(p,m){
	fill(p,m);
}
function fill(bid,m){
 var sitpath = '<?php echo SITEPATH; ?>';
$('#soum_prod_subsubcat').hide();
 $('#name_loader2').html("<img src='../upload/loader.gif' width='30' height='30'>");

	$.ajax({
		type:"Post",
		url: "../fill3.php",
		data:{"param":bid,'mid':m},
		success:function(html)
		{
		       $('#name_loader2').html("");
               $('#soum_prod_subsubcat').show();

			$("#soum_prod_subsubcat").html(html);
		}
	});
}

function get_color(m_id,cid){
 var sitpath = '<?php echo SITEPATH; ?>';
	$.ajax({
		type:"Post",
		url: "../get_color.php",
		data:{"param":m_id,'mid':cid},
		success:function(html)
		{
		  $("#colour").html(html);
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
	  url: "../script_png.php",
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


$("document").ready(function(){
//alert('df');
$('#acount').html("(<?=$acount;?>)");
$('#pcount').html("(<?=$pcount;?>)");
$('#dcount').html("(<?=$dcount;?>)");
});
</script>
</body>
</html>
