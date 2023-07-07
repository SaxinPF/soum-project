<?php include('config.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
if(isset($poster_type))
{
if($poster_type=='Admin')
{
$poster_id=$_REQUEST['cust_id'];
$poster_type=$_REQUEST['utype'];
}
if($poster_type=='Dealer')
{
	$sql="select * from soum_master_dealer where cust_id=$poster_id";
	
}
else if($poster_type=='Customer')
{
	$sql="select * from soum_master_customer where cust_id=$poster_id";
	
}
$res=$db->query($sql);
$row=$res->fetch_assoc();
$name=$row['fname'];
$email=$row['email'];
$address=$row['address'];
$city=$row['city'];
$mobile=$row['mobile'];
$pincod=$row['pincod'];
$pwd=$row['user_pass'];
$image=$row['image'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SOUM | Services Online Used Mobile</title>
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/bootstrap-margin-padding.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet"`>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<style>
.form-control {
    box-shadow: none;
    -webkit-transition: 0.2s ease-in-out;
    -o-transition: 0.2s ease-in-out;
    transition: 0.2s ease-in-out;
    border: none;
    border-radius: 0 !important;
    border: 1px solid#e0e0e0;
    position: relative;
    overflow: hidden;
    margin-bottom: 7px;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
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
<script src="js/jquery.min.js"></script>
	
</head>
<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
    
 	<header class="header-style-two">
		<?php include('_header.php');?>        
    </header>
    <!-- Main Header -->
    
    <!--End Main Header -->
    
    
    <!--Default Section-->
    
    
    <!--Feature Section-->
   <section class="default-section pb-0" style="padding: 0px 0px 40px;margin-bottom:30px;">    	
	<div class="col-md-12" style="padding: 50px 15px 30px 15px; min-height: 250px; background-image: url('images/used-phone-bg.jpg'); background-repeat: repeat;">
		<div class="column col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
			<h1 style="line-height: 1; margin-top: 8px; text-align: center; color: #fff;">
			Update <span style="color: #fff; font-weight: 800;">Profile</span></h1>
			</div>
	</div>
	
        <div class="auto-container">
            <div class="row clearfix">
              
              <div class="col-md-12">
				<div class="col-md-9" style="margin: auto; float: none; margin-top: -90px;">
					<div style="width: 100%; float: left; background: #fff; padding: 15px 15px 40px 15px; border: 1px solid#f1f1f1;">
                <!--Cause Column-->
                <div class="col-lg-8 col-md-12" style="margin:auto;float:none;">
                    <div class="row">
               	
                      <div class="col-md-12">
                      <div class="col-md-12" style="padding:0px;background:#fff;">					        
			        <form name="myForm" action="update_profile_save.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" style="width:100%;float:left;margin-top:0px;">
					<input type="hidden" name="poster_id" value="<?=$poster_id;?>"/>
					<input type="hidden" name="poster_type" value="<?=$poster_type;?>"/>
					<div class="col-md-12">
					<!---------------------canvas upload image start -->
						<div class="col-md-12" style="display:none;">
						 <img id="scream" height="25" width="21">
				 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image;?></textarea>				   
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
						<label class="control-label"><span style="font-size:13px;">(Image Dimensions: 100px X 100px)</span></label>
						<label class="control-label">Customer Image *</label>
					</div>									
					<div class="col-md-12" style="padding:0px;margin-bottom:15px;">	
					<div class="col-md-4">
						<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
						<img id="previewing1" src="upload/profile/<?=$image?>" style="height:80px;width:auto;position:absolute;top:0;">
						<span class="select-wrapper"><input type="file" name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"/></span>
						</div>
						<input type="hidden" id="file1" value="<?=$image?>"> 
					</div>
					</div>
					<div class="col-md-12" style="margin-bottom:0px">
						<label class="labelTop">Name: <span class="require">*</span></label>
						<input value="<?=$name;?>" class="form-control" placeholder="Name" name="name1" id="name1" type="text">
					</div>
					<div class="col-md-12" style="margin-bottom:0px">
						<label class="labelTop">Email Id: <span class="require">*</span></label>
						<input value="<?=$email;?>" class="form-control" placeholder="Email" name="email" id="email" type="text">
					</div>
					<div class="col-md-12" style="margin-bottom:0px">
						<label class="labelTop">Address: <span class="require">*</span></label>
						<textarea class="form-control" placeholder="Address" name="address" id="address"><?=$address;?></textarea>
					</div>
					<div class="col-md-6" style="padding-left:0px;">
					<div class="cus_info_wrap" style="margin-bottom:0px;padding: 0px 10px;">
						<label class="labelTop">City: <span class="require">*</span></label>
						<input value="<?=$city;?>" class="form-control" placeholder="City" name="city" id="city" type="text">
					</div>
					</div>
					<div class="col-md-6" style="padding-left:0px;">
					<div class="cus_info_wrap" style="margin-bottom:0px;padding: 0px 10px;">
						<label class="labelTop">Pincod: <span class="require">*</span></label>
						<input value="<?=$pincod;?>" class="form-control" placeholder="Pincod" name="pincod" id="pincod" type="text">
					</div>
					</div>
					<div class="col-md-12" style="margin-bottom:0px">
						<label class="labelTop">Mobile No: <span class="require">*</span></label>
						<input value="<?=$mobile;?>" class="form-control" placeholder="Mobile No" name="mobile" id="mobile" type="text">
					</div>
					
					<div class="botton1" style="text-align:center">
						<input value="Update Profile" class="theme-btn btn-style-four btn-sm" type="submit" style="width:auto !important;">
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
        </div>
    </section>
    <!--Sponsors Section-->
 <?php include('_footer.php');?>
    <!--Main Footer-->
    
    
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper"><span class="fa fa-long-arrow-up"></span></div>
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script>
function track()
{
    track_id=$("#track_id").val();
       $.ajax({      
           type:"POST",
           url:"soumadmin/_ajax_generic-track.php",
           data:"track_id="+track_id,
			
           success:function(data)
           {
           	$('#trackid_dup').html($('#track_id').val());   
            $("#track_dtl").html(data);
           }
       
       });
}
</script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
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
    $('#previewing'+popid).attr('src','upload/loader.gif');
	$.ajax({
	  type: "POST",
	  url: "script.php",
	  data: { 
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	  $('#debugConsole'+popid).val(o); 
	   $('#previewing'+popid).attr('src','upload/'+o);
	});
}
</script>
	
	
</body>
</html>