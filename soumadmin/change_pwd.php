<?php 
include('config.php');

$poster_id=$_REQUEST['poster_id'];

if(isset($_REQUEST['Submit']))
{
 $new=$_REQUEST['new'];
 
   $sql="update soum_master_dealer set user_pass=md5($new) where cust_id=$poster_id";
  $res=$db->query($sql);
  if($res)
  {
  
   
       $_SESSION['poster_type']='Dealer';
       $_SESSION['poster_id']=$poster_id;
        echo "<script>alert('Password Changed Successfully');</script>";
    
    	echo "<script>window.location.href='dealer_dashboard.php';</script>";
    
  }
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"><script src="js/jquery.min.js"></script>
<script>
function validateForm()
{
  
  var new1=$("#new").val();   
  var rep=$("#rep").val();
  
  
  
  
  if(new1=='')
  {
    alert("Enter new password");
    return false;
  }
  
  if(rep=='')
  {
    alert("Enter repeat new password");
    return false;
  }
  
  if(new1!=rep)
  {
    alert("Enter new and repeat password same");
    return false;
  }
  
}
</script>
</head>
<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
    
 	<header class="header-style-two">
		<?php include('_header1.php');?>        
    </header>
    <!-- Main Header -->
    
    <!--End Main Header -->
    
    
    <!--Default Section-->
    
    
    <!--Feature Section-->
   <section class="default-section pb-0" style="padding: 0px 0px 40px;margin-bottom:30px;">    	
	<div class="col-md-12" style="padding: 50px 15px 30px 15px; min-height: 250px; background-image: url('images/used-phone-bg.jpg'); background-repeat: repeat;">
		<div class="column col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
			<h1 style="line-height: 1; margin-top: 8px; text-align: center; color: #fff;">
			Reset <span style="color: #fff; font-weight: 800;">Password</span></h1>
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
			        <form name="myForm"  method="post" onsubmit="return validateForm()" style="width:100%;float:left;margin-top:0px;">
					<input type="hidden" name="poster_id" value="<?=$poster_id;?>"/>
					
									
					
					
					<div class="col-md-12" style="margin-bottom:0px">
						<label class="labelTop">New Pass: <span class="require">*</span></label>
						<input  class="form-control"  name="new" id="new" type="password">
					</div>
					<div class="col-md-12" style="margin-bottom:0px">
						<label class="labelTop">Repeat Pass: <span class="require">*</span></label>
						<input  class="form-control"  name="rep" id="rep" type="password">
					</div>
					
					
					<div class="botton1" style="text-align:center">
						<input value="Reset Password" class="theme-btn btn-style-four btn-sm" name="Submit" type="submit" style="width:auto !important;">
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
	
	
</body>
</html>