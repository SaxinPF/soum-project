<?php include('config.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
$prod_id=$_REQUEST['prod_id'];
$image1='';
$image2='';
$image3='';
$image4='';
$image5='';
$image6='';
$warranty = 0;
if(isset($prod_id))
{
    $sqld="select *,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc as model_name,soum_product_master.warranty warr from soum_product_master,soum_prod_subcat,soum_prod_subsubcat where
    soum_product_master.brand=soum_prod_subcat.prod_subcat_id
    and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
    and  prod_id=$prod_id
    and prod_cat_id=2";
    $resd=$db->query($sqld);
    $rowd=$resd->fetch_assoc();
    $title=$rowd['titile'];
    $brand=$rowd['brand'];
    $modal=$rowd['modal'];
    $brand_name=$rowd['brand_name'];
	$model_name=$rowd['model_name'];

	$poster_id=$rowd['poster_id'];
    $poster_type=$rowd['poster_type'];

	$other_brand=$rowd['other_brand'];
	$other_model=$rowd['other_model'];
	$desc=$rowd['Constituent'];
	$mrp=$rowd['rate'];
	$eprice=$rowd['appliable_rate'];
	$offerp=$rowd['offer_price'];
	$warranty=$rowd['warr'];
	$year=$rowd['year_purchase'];
	$admin_year=$rowd['yearbyadmin'];
    $cat=$rowd['category'];
	$emi=$rowd['imei_no'];
	$mrom=$rowd['rom'];
    $mram=$rowd['ram2'];
	$condi=$rowd['condi'];
	$condi2=$rowd['condi2'];
	$sourceid=$rowd['source_id'];
	$image1=$rowd['images'];
	$image2=$rowd['images1'];
	$image3=$rowd['images2'];
	$image4=$rowd['seller_img'];
	$image5=$rowd['bill_img'];
	$image6=$rowd['add_proof_img'];
    $cls1='fig-new';
    $cls2='fig-new';
    $cls3='fig-new';
    $cls4='fig-new';
    $cls5='fig-new';
    $cls6='fig-new';


	$lat=$rowd['lat'];
    $lng=$rowd['lng'];
    $pin=$rowd['pincode'];

}

if($image1=='')
	{
	  $image1='no_img.png';
	  $cls1='';
	}
	if($image2=='')
	{
	  $image2='no_img.png';
	   $cls2='';
	}
    if($image3=='')
	{
	  $image3='no_img.png';
	   $cls3='';
	}
    if($image4=='')
	{
	  $image4='no_img.png';
	   $cls4='';
	}
    if($image5=='')
	{
	  $image5='no_img.png';
	   $cls5='';
	}
    if($image6=='')
	{
	  $image6='no_img.png';
	   $cls6='';
	}
if($poster_type!='')
{

	if($poster_type=='Admin')
	{
	 $sql="select * from soum_master_admin where usr_id=1";

	}

	else if($poster_type=='Customer')
	{
	 $sql="select * from soum_master_customer where cust_id=$poster_id";

	}
    else if($poster_type=='Dealer')
	{
	 $sql="select * from soum_master_dealer where cust_id=$poster_id";

	}


	//echo $sql;
	//die();
	$res=$db->query($sql);
	$row=$res->fetch_assoc();

	$name=$row['fname'];
	$email=$row['email'];
	$address=$row['address'];
	$city=$row['city'];
	$mobile=$row['mobile'];
	$pincod=$row['pincod'];
}
//echo "<script>alert(".$warranty.");</script>";
//echo $poster_type."a";
     //die();

	$layout_title = 'SOUM | Services Online Used Mobile';
?>
<style>
.remove-img{display:none;position: absolute;
right: -9px;
z-index: 999999;
top: -16px;}
.remove-img img {height:20px;}
.fileno{padding:20px 5px;border: 1px dashed #c5d7b5;height: 80px !important;position: absolute;left: -30px;top:-4px;opacity: 0;}
.fig-new{top:0!important;right:0!important;left:0!important;}
.fig-new img{height:88px;width:200px;}
</style>


<!doctype html>
<html lang="en">
  <head>
    <?php include('elements/headcommon.php');?>
  </head>
  <body>
  <?php include('elements/header.php');?>
 <div class="clearfix"></div>
  <div class="mainhead detailpage ">
 <div class="clearfix"></div>
 <div class="container mt-4 dashboard">
<div class="submitad">
<h2>Submit a Free Classified Ad</h2>
<div class="pl-3 pr-3">
<div class="row">
<div class="col-sm-8">
				 <form name="myForm" onsubmit="return valid4()" method="post" action="ad_save.php">
				    <input name="poster_id" id="poster_id" value="<?=$poster_id;?>" type="hidden" />
                    <input name="prod_id" id="prod_id" value="<?=$prod_id;?>" type="hidden" />
					<input name="email" type="hidden" value="<?=$email;?>" class="form-control" />

					<div class="row form-group">
						<div class="col-sm-4 sublabel"><label for="">Brand name <span class="astrx">*</span></label></div>
						<div class="col-sm-8">
						<select class="custom-select " name="drpBrand" id="soum_prod_subcat" onchange="fill2(this.value);" >



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
					</div>
					<div class="row form-group">
					   <div class="col-sm-4 sublabel"><label for="">Model name <span class="astrx">*</span></label></div>
					   <div id="name_loader2"></div>
					  <div class="col-sm-8" id="brand_loader">

					    <select class="custom-select " name="drpModel" id="soum_prod_subsubcat" >
                           <option selected="selected" value="">Model Name</option>



						   <?php
							 if(isset($brand)){
									$param= $brand;
									$mid= (isset($modal))?$modal:0;

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
						?>
						</select>
					   </div>
					</div>

                  <div class="row form-group">
    			    <div class="col-sm-4 sublabel"><label for="">RAM <span class="astrx">*</span></label></div>
				       <div class="col-sm-8">
					   <select class="form-control minimal" name="ram">
					     <?php
						     $Storageram  = array(1,2,3,4,5,6,7,8,9,10,11,12);
						 foreach($Storageram as $val){
						    $selected_ram = '';
						 if(isset($mram) && $mram==$val){
						     $selected_ram =  'selected="selected"';
						 } ?>
							  <option value='<?php echo $val ?>' <?php echo $selected_ram; ?> ><?php echo $val ?> GB</option>

						<?php  }  ?>

					</select>
					</div>

				  </div>
				  <div class="row form-group">
    			    <div class="col-sm-4 sublabel"><label for="">ROM <span class="astrx">*</span></label></div>
				       <div class="col-sm-8">
					   <select class="form-control minimal" name="rom" id="exampleFormControlSelect1">
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

				</div>

				<div class="row form-group">
				   <div class="col-sm-4 sublabel"><label for="">IMEI <span class="astrx">*</span></label></div>
					<div class="col-sm-8 form-inline">
					   <input type="text" name="imi_no" value="<?=$emi;?>" id="txt_imi_no" class="form-control" Placeholder="Enter IMEI number"/>
					</div>
				</div>

				<div class="row form-group">
				   <div class="col-sm-4 sublabel"><label for="">How old is your phone? <span class="astrx">*</span></label></div>
					<div class="col-sm-8 form-inline">
					  <span style="float:left;margin-bottom:10px;">
						  <label>
						  <input name="warranty" class="warranty" id="w1" <?php if($warranty=='1') echo "checked";?>  value="1" style="color:#e92438;font-size:15px;margin-right:10px;" onclick="bill(1)" type="radio">
						  Out of warranty
						  </label>
					  </span>
					  <span style="width:50%;float:left;margin-bottom:10px;">
					    <label>
						  <input name="warranty" id="w2" class="warranty" <?php if($warranty=='2') echo "checked";?> value="2" style="color:#e92438;font-size:15px;margin-right:10px;" onclick="bill(2)" type="radio">
						  In warranty
						</label>
					  </span>

					  <select class="form-control minimal" name="admin_year" id="AdminYear" style="<?php if($warranty==2){ echo "display:block";}else{ echo "display:none;";}?>">
					     <?php
						 $admin_year_arr  = array('Less then one month'=>'Less then one month','One month'=>'One month','Two months'=>'Two months','Three months'=>'Three months','Four months'=>'Four months','Five months'=>'Five months','Six months'=>'Six months','Seven months'=>'Seven months','Eight months'=>'Eight months','Nine months'=>'Nine months','Ten months'=>'Ten months','Eleven months'=>'Eleven months');
						 foreach($admin_year_arr as $value){
						    $selected = '';
						 if(isset($admin_year) && $admin_year==$value){
						     $selected =  'selected="selected"';
						 } ?>
							  <option value='<?php echo $value ?>' <?php echo $selected; ?> ><?php echo $value ?></option>

						<?php  }  ?>
					  </select>




					</div>
				</div>




				<div class="row form-group">
				<div class="col-sm-4 sublabel">
				  <label for="">Ads with photos sell faster</label><br>
				  <img src="img/soma.png" alt=""/></div>
				<div class="col-sm-8 mainphoto">
				<ul>
				<li>
				<?php
				 $r1 = '';
				 $img_path1 ='img/ad.png';
				   $cls1='';
				 if(file_exists(UPLOAD_DIR.$image1)){
				             $img_path1 = SITEPATH.'upload/'.$image1;
							 $r1 = 'display:block';
							   $cls1='fig-new';
				 } ?>


				 <a id="rmv1" onclick="remove_img(1)" class="remove-img" style="<?php echo $r1 ?>"><img src="/images/icon.png"></a>
				<figure class="<?php echo $cls1 ;?>"><img src="<?php echo $img_path1 ?>" alt=""  id="previewing1"/>
				<input name="fileToUpload1" id="fileToUpload1" onchange="abc(this,1);" class="btn btn-default fileno" type="file">


				</figure></li>
				<li>
				<?php
				$r2 = '';
				$img_path2 ='img/ad.png';
				 $cls2='';
				if(file_exists(UPLOAD_DIR.$image2)){
				             $img_path2 = SITEPATH.'upload/'.$image2;
							 $r2 = 'display:block';
							   $cls2='fig-new';
				 } ?>


				<a id="rmv2" onclick="remove_img(2)" class="remove-img" style="<?php echo $r2 ?>" ><img src="/images/icon.png"></a>
				<figure class="<?php echo $cls2 ;?>"><img src="<?php echo $img_path2 ?>" alt=""  id="previewing2"/>
				<input name="fileToUpload2" id="fileToUpload2" onchange="abc(this,2);" class="btn btn-default fileno" type="file">

				</figure></li>
				<li>
				<?php
				$r3 = '';
				$img_path3 ='img/ad.png';
				$cls3='';
				 if(file_exists(UPLOAD_DIR.$image3)){
				             $img_path3 = SITEPATH.'upload/'.$image3;
							 $r3 = 'display:block';
							  $cls3='fig-new';
				 } ?>



				<a id="rmv3" onclick="remove_img(3)" class="remove-img"  style="<?php echo $r3 ?>" ><img src="/images/icon.png"></a>
				<figure class="<?php echo $cls3 ;?>" ><img src="<?php echo $img_path3 ?>" alt=""  id="previewing3"/>
				<input name="fileToUpload3" id="fileToUpload3" onchange="abc(this,3);" class="btn btn-default fileno" type="file">
				</figure></li>
				<!-- <li><figure><img src="img/ad.png" alt=""/></figure></li> -->

				</ul>

				</div>

				</div>
				<div class="row form-group">
				<div class="col-sm-4 sublabel"><label for="">Bill or Letter head </label></div>
				<div class="col-sm-8 mainphoto"><ul>
				<li>
				<?php
				$r6 = '';
				$img_path6 ='img/ad.png';
				$cls6='';
				 if(file_exists(UPLOAD_DIR.$image6)){
				             $img_path6 = SITEPATH.'upload/'.$image6;
							 $r6 = 'display:block';
							 $cls6='fig-new';
				 } ?>


				<a id="rmv6" onclick="remove_img(6)" class="remove-img" style="<?php echo $r6 ?>" ><img src="/images/icon.png"></a>
				<figure class="<?php echo $cls6 ;?>">
					<img src="<?php echo $img_path6 ?>" alt=""  id="previewing6"/>
					<input name="fileToUpload6" id="fileToUpload6" onchange="abc(this,6);" class="btn btn-default fileno" type="file">

					</figure></li>
				<!-- <li><figure><img src="img/ad.png" alt=""/></figure></li> -->

				</ul></div>

				</div>

				<div class="row form-group">
				    <div class="col-sm-4 sublabel"><label for="">Seller Identity</label></div>
				    <div class="col-sm-8 mainphoto"><ul>
						<li>
						<?php
						$r5 = '';
						$img_path5 ='img/ad.png';
						$cls5='';
						 if(file_exists(UPLOAD_DIR.$image5)){
									 $img_path5 = SITEPATH.'upload/'.$image5;
									 $r5 = 'display:block';
									 $cls5='fig-new';
						 } ?>


						<a id="rmv5" onclick="remove_img(5)" class="remove-img" style="<?php echo $r5 ?>" ><img src="/images/icon.png"></a>
						<figure class="<?php echo $cls5 ;?>">
							<img src="<?php echo $img_path5 ?>" alt=""  id="previewing5"/>
							<input name="fileToUpload5" id="fileToUpload5" onchange="abc(this,5);" class="btn btn-default fileno" type="file">

							</figure></li>


				</ul></div>

				</div>






				<div class="row form-group">
				<div class="col-sm-4 sublabel"><label for="">Price Expected (₹)<span class="astrx">*</span></label></div>
				<div class="col-sm-8 form-inline">
				<input type="text" name="expected_price" value="<?=$eprice;?>" id="txt_expected_price" class="form-control" Placeholder=""/>
				</div>

				</div>
				<div class="clearfix"></div>
				<div>
				<h3>Your contact details</h3>
				<div class="clearfix"></div>
				<div class="row form-group">
				<div class="col-sm-4 sublabel"><label for="">Name  <span class="astrx">*</span></label></div>
				<div class="col-sm-8">
				<input name="fname" id="fname2"  type="text" value="<?=$name;?>" class="form-control" />
				</div>

				</div>
				<div class="clearfix"></div>
				<div class="row form-group">
				<div class="col-sm-4 sublabel"><label for="">Phone number <span class="astrx">*</span></label></div>
				<div class="col-sm-8">
				<input type="text" name="mobile_no" class="form-control" id="mobile2" value="<?=$mobile;?>" onchange="client(this.value)">

				<small>To change your phone number go to My Account -> Settings</small></div>

				</div>
				<div class="clearfix"></div>
				<div class="row form-group">
				<div class="col-sm-4 sublabel"><label for="">Enter a city <span class="astrx">*</span></label></div>
				<div class="col-sm-8">
				<input name="city" id="city" type="text" value="<?=$city;?>" class="form-control" />
				</div>

				</div>
				<div class="clearfix"></div>
				<div class="row form-group">
				<div class="col-sm-4 sublabel"><label for="">Enter a locality (nearby) <span class="astrx">*</span></label></div>
				<div class="col-sm-8">
				<input name="address" id="address"  type="text" value="<?=$address;?>" class="form-control" />
				<small>By clicking 'Submit' you agree to our Terms of Use & Posting Rules</small></div>

				</div>
				<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-8">
				    <button type="submit" class="seehowmuch">Submit</button>

				</div>

				</div>
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
                    <textarea id="debugConsole7" name="S7" rows="3" style="width:30%; display:1none"></textarea>
					<textarea id="debugConsole8" name="S8" rows="3" style="width:30%; display:1none"></textarea>
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


				</form>




</div>
<div class="col-sm-4"><img src="img/adimg.png" alt="" class="adbord"/></div>


</div>


</div>

</div>



 </div>


  </div>

 <div class="clearfix"></div>
  <?php include('elements/footer.php');?>

<script>
$("#fname2").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});


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



 function fill2(p){
	fill(p);
}
function fill(bid){
 var sitpath = '<?php echo SITEPATH; ?>';
$('#brand_loader').hide();
 $('#name_loader2').html("<img src='"+sitpath+"upload/loader.gif' width='30' height='30'>");

	$.ajax({
		type:"Post",
		url: "fill3.php",
		data:"param="+bid,
		success:function(html)
		{
		       $('#name_loader2').html("");
               $('#brand_loader').show();

			$("#soum_prod_subsubcat").html(html);
		}
	});
}


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
 var sitpath = '<?php echo SITEPATH; ?>';

    $('#previewing'+popid).attr('src', sitpath+'upload/loader.gif');
	$.ajax({
	  type: "POST",
	  url: "script_png.php",
	  data: {
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	   $('#debugConsole'+popid).val(o);
	   $('#previewing'+popid).attr('src',sitpath+'upload/'+o);
	   $("#rmv"+popid).show();


	    $('#previewing'+popid).parent().addClass('fig-new');

	});
}
function remove_img(v)
{

  $('#debugConsole'+v).val("");
  $('#previewing'+v).attr('src','img/ad.png');
  $("#rmv"+v).hide();

  $('#previewing'+v).parent().removeClass('fig-new');

}

var warr = '';
function bill(val)
{
 warr=val;
  if(val==1)
   {
     $("#AdminYear").hide();
   }
   else
   {
      $("#AdminYear").show();
   }

}

function valid4()
{



	var model=$("#soum_prod_subsubcat").val();
	var brand=$("#soum_prod_subcat").val();


		if (brand==""){
	    	alert("Please fill the Brand first!");
	    	return false;
	    }



	    if (model=="")
	    {
	    	alert("Please select the model first!");
	    	return false;
	    }







//var year=$('#year').val();
  //var mrom=$('input[name=mrom]:checked').val();
  var debugConsole1=$('#debugConsole1').val();
  var debugConsole2=$('#debugConsole2').val();
  var debugConsole3=$('#debugConsole3').val();
  var price=$('#txt_expected_price').val();
  var imi=$('#txt_imi_no').val();
 // var desc=$('#desc').val();

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

   if(debugConsole1=='' || debugConsole1=='no_img.png')
  {
    alert('Please add the first image of your Ad');
    return false;
  }

  if(debugConsole2=='' || debugConsole2=='no_img.png')
  {
    alert('Please add the second image');
    return false;
  }

  /*if(debugConsole3=='' || debugConsole3=='no_img.png')
  {
    alert('Please add the third image');
    return false;
  } */
var debugConsole6=$('#debugConsole6').val();
 	if(debugConsole6=='' || debugConsole6=='no_img.png')
	{
		alert('Copy of mobile bill or letter head must be uploaded');
		return false;
	}

  if(price=='')
  {
    alert('Expected Price must be entered');
    return false;
  }

  if(warr==''){
    alert('Please fill warranty field');
    return false;
  }




var mobile=$('#mobile2').val();
var name=$('#fname2').val();
//var email=$('#email').val();
var add=$('#address').val();
var city=$('#city').val();
//var pincod=$('#pincod').val();
//var debugConsole4=$('#debugConsole4').val();
//var debugConsole5=$('#debugConsole5').val();


	  if(mobile=='')
	  {
	    alert('Mobile must be filled');
	    return false;
	  }

	  /*if(email=='')
	  {
	     alert("Enter email address!");
				return false;
	  }*/

	  if(name=='')
	  {
	    alert('Name must be filled');
	    return false;
	  }

  	  if(city=='')
	  {
	    alert('City must be filled');
	    return false;
	  }

	  if(add=='')
	  {
	    alert('Address must be filled');
	    return false;
	  }



    /*if(debugConsole4=='' || debugConsole4=='no_img.png')
	{
		alert('Seller image must be selected');
		return false;
	}

	if(debugConsole5=='' || debugConsole5=='no_img.png')
	{
		alert('Seller identity image must be selected');
		return false;
	}*/




	return true;
}


 </script>
 </body>
</html>
