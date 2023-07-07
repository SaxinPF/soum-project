<?php
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
?>
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
<style>
.last {color: #fff;background: #3498db;border-radius: 50%;padding: 3px 10px;font-size: 16px;font-weight: 400;font-family: 'Open Sans', sans-serif;}
   .header-style-two {
    position: relative;
    left: 0px;
    top: 0px;
    background: #fff;
    z-index: 999;
    width: 100%;}
    .header-style-two .header-top .info-box strong {color:#677c91;}
    
    .header-style-two .lower-part .outer-box .btn-box:before {
    content: '';
    position: absolute;
    left: -20px;
    top: 0px;
    width: 50px;
    height: 100%;
    background: #da200a;
    -webkit-transform: skewX(-20deg);
    -ms-transform: skewX(-20deg);
    -o-transform: skewX(-20deg);
    -moz-transform: skewX(-20deg);
    transform: skewX(-20deg);
	}
	.header-style-two .lower-part .outer-box .btn-box {
    position: absolute;
    right: 0px;
    top: 0px;
    width: 210px;
    text-align: center;
    background: #da200a;
    z-index: 20;
	}
	.dropbtn1 {
    background-color: #e92438;
    color: #000;
    padding: 5px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    color: #fff !important;
	}
	.dropbtn1:hover, .dropbtn1:focus {
    background-color: #ff5466;
	}
	.header-style-two .header-top .info-box strong {
    color: #000;
	}
	.header-style-two .header-top .info-box a {
    position: relative;
    color: #000;
    font-weight: 600;
}
img.grayscale{
	width: 110px !important;	
}

.frame-square1 {
    background: transparent;
    display: inline-block;
    vertical-align: top;
    width: 110px;
    height: 82px;
}

</style>    
    <?php $cart_val1=0;
	foreach($_SESSION['cart'] as $product_id =>$quantity) 
	{
	  $cart_val1=$cart_val1+1;
	}
?>

<div class="header-top" style="background:#f1f1f1;padding:0px;" id="mobile-des10">
	<div class="auto-container clearfix" >
		<div class="col-md-5" style="padding:0px;">
		    <div class="info-box" style="padding-left:0px;width:auto;margin-left:0px;margin-top:5px;margin-right:10px;">
		        <div style="width:auto;float:left;color:#000;font-size:15px;"><span style="float:left;"><i class="fa fa-phone" aria-hidden="true" style="color:red;font-size:16px;margin-right:10px;"></i></span><span style="float:left;color:#000"><strong style="font-size: 14px;"> +91-9828075008</strong></span> &nbsp; | &nbsp; </div> 
		     	<div style="width:auto;float:left;color:#000;font-size:15px;"><span style="float:left;"><i class="fa fa-clock-o" aria-hidden="true" style="color:red;font-size:16px;margin-right:10px;"></i></span><span style="float:left;color:#000"><strong style="font-size: 14px;">11:00 AM to 7:00 PM</strong></span> &nbsp; | &nbsp; </div>
		       <div style="width:auto;float:left;color:#000"><span style="float:left;"><i class="fa fa-envelope-o" aria-hidden="true" style="color:red;font-size:16px;text-transform: none;margin-right:5px;"></i></span><span style="float:left;color:#000;"><strong><a href="mailto:info@soum.co.in" style="text-transform: none;font-size:15px;">
					 info@soum.co.in</a></strong></span></div>
			</div>				
		</div>
    	
    	<div class="col-md-7" style="padding-right:0px;" id="top-mob">
    				
    				<div  style="padding:0px;text-align:right;float:right;width:auto;">
    				<div class="info-box" style="width:auto;margin:0px;padding:5px;background-color:#e5e5e5;float:right;">
    				<?php 

                         if($poster_type=='Admin')
						 {
						 ?>
	                        <div style="width:auto;float:left;"><a href="soumadmin/dashboard.php" style="color:#000"><span style="float:left;"><i class="fa fa-user" aria-hidden="true" style="color:#eb540f;font-size:15px;margin-right:10px;"></i></span><span style="float:left;"><strong>Admin</strong></span></a> <span style="float:left;"> | <i class="fa fa-power-off" aria-hidden="true" style="color:#eb540f;font-size:16px;margin-right:5px;"></i></span><span style="float:left;"><a href="logout.php">Logout </a></span></div>
		                 <?php
		                 } 
		                 else if($poster_type=='Dealer')
						 {
						 ?>
	                     <div style="width:auto;float:left;"><a href="dealer_dashboard.php" style="color:#000"><span style="float:left;"><i class="fa fa-user" aria-hidden="true" style="color:#eb540f;font-size:15px;margin-right:10px;"></i></span><span style="float:left;"><strong>Dealer</strong></span></a> <span style="float:left;"> | <i class="fa fa-power-off" aria-hidden="true" style="color:#eb540f;font-size:16px;margin-right:5px;"></i></span><span style="float:left;"><a href="logout.php">Logout </a></span></div>
		                 <?php 
		                 } 		                             	
              		     else
	              		 {
						 ?>  
                       <div id="lnamediv" style="width:auto;float:left;"><a href="customer_dashboard.php" style="color:#000"><span style="float:left;"><i class="fa fa-user" aria-hidden="true" style="color:#eb540f;font-size:15px;margin-right:10px;"></i></span><span style="float:left;" id="lname"><strong></strong></span></a> <span style="float:left;"> | <i class="fa fa-power-off" aria-hidden="true" style="color:#eb540f;font-size:16px;margin-right:5px;"></i></span><span style="float:left;"><a href="logout.php">Logout </a></span></div>
	                 <?php }?>   
              		</div>
              		</div>
              		<div class="col-md-7" style="padding:0px;float:right;">
    					<ul class="navigation" style="float:right">
                            <li style="margin:0px;float:left;padding:4px;font-size: 13px;"><a href="aboutus.php" style="padding: 0px 7px;border-right: 1px solid #000;color:#000;font-weight: 500;font-size: 14px;font-family: 'Roboto', sans-serif;">About Us</a></li>
                            <li style="margin:0px;float:left;padding:4px;font-size: 13px;"><a href="tell_us.php" style="padding: 0px 7px;border-right: 1px solid #000;color:#000;font-weight: 500;font-size: 14px;font-family: 'Roboto', sans-serif;">Enquiry</a></li>
                            <li style="margin:0px;float:left;padding:4px;font-size: 13px;"><a href="contact.php" style="padding: 0px 7px;color:#000;font-weight: 500;font-size: 14px;font-family: 'Roboto', sans-serif;">Contact Us</a></li>
                        </ul>
    				</div>
    	</div>
   </div>
</div>
		
		<nav class="main-menu" id="mobile-menu1">
			<div class="navbar-header" style="float:left;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="width:auto;margin-bottom:-12px;border-radius:0px;margin-top:0px;padding: 13px 5px 13px 10px;border: 1px solid #e92438;background: #e92438;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="width:auto;float:right;margin-top: 5px;margin-right: 15px;">
                	<?php 

                         if($poster_type=='Admin')
						 {
						 ?>
	                        <div style="width:auto;float:left;"><a href="soumadmin/dashboard.php" style="color:#fff"><span style="float:left;"><i class="fa fa-user" aria-hidden="true" style="color:#fff;font-size:15px;margin-right:10px;"></i></span><span style="float:left;"><strong>Admin</strong></span></a> <span style="float:left;">  |  <a href="logout.php"><i class="fa fa-power-off" aria-hidden="true" style="color:#fff;font-size:16px;margin-right:5px;margin-left: 6px;"></i></a></span></div>
		                 <?php
		                 } 
		                 else if($poster_type=='Dealer')
						 {
						 ?>
	                     <div style="width:auto;float:left;"><a href="dealer_dashboard.php" style="color:#fff"><span style="float:left;"><i class="fa fa-user" aria-hidden="true" style="color:#fff;font-size:15px;margin-right:10px;"></i></span><span style="float:left;"><strong>Dealer</strong></span></a> <span style="float:left;">  |  <a href="logout.php"><i class="fa fa-power-off" aria-hidden="true" style="color:#fff;font-size:16px;margin-right:5px;margin-left: 6px;"></i></a></span></div>
		                 <?php 
		                 } 		                             	
              		     else
	              		 {
						 ?>  
                       <div id="lnamediv" style="width:auto;float:left;"><a href="customer_dashboard.php" style="color:#fff"><span style="float:left;"><i class="fa fa-user" aria-hidden="true" style="color:#fff;font-size:15px;margin-right:10px;"></i></span><span style="float:left;" id="lname"><strong></strong></span></a> <span style="float:left;">  |  <a href="logout.php"><i class="fa fa-power-off" aria-hidden="true" style="color:#fff;font-size:16px;margin-right:5px;margin-left: 6px;"></i></a></span></div>
	                 <?php }?> 
                </div>
            </div>
            	 <div class="navbar-collapse collapse clearfix" style="margin-top:5px;">
    			<ul class="navigation">
                        <li class="current"><a href="index.php">Home</a></li>
                       	<li id="moble-view1"><a href="aboutus.php">About Us</a></li>
                        <li><a href="phones.php?phone=used#product">Buy Used Phone</a></li>
                        <li><a href="phones_deals.php">Today's Deal</a></li>
                     	<li><a href="repairing.php">Online Repairing</a></li>
                     	<li id="moble-view1"><a href="tell_us.php">Enquiry</a></li>
                     	<li id="moble-view1"><a href="track_order.php">Track Order</a></li>
                     	<li id="moble-view1"><a href="contact.php">Contact Us</a></li>
                    </ul>
				</div>
            </nav>

<div class="header-top" style="background: #fff;padding:15px;border-bottom: 1px solid #ababab;">
	
	<div class="auto-container clearfix" id="logo-1">
		<div class="col-md-3" style="padding:0px;">
			<div class="logo">
				<a href="index.php"><img src="images/logo_black.png" alt="Greenture" style="width: 240px;"></a>
			</div>
		</div>
	
		<div class="col-md-9" style="padding:0px;margin-top: 6px;">
						<div class="btn-box" style="float:right;min-width: 210px;">
                          <div class="dropdown1">
							 <a href="form_used.php"> <button onclick="myFunction()" class="dropbtn1" style="padding:13px;position:relative;text-transform:unset;padding-right:70px;">
							  Submit Your Used Phone <img src="images/icon-phone-1.png" style="width:60px;height:auto;position:absolute;right:10px;top:0px;"></button></a>
						</div>
                    </div>
			<nav class="main-menu">
			<div class="navbar-header" style="float:left;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            	 <div class="navbar-collapse collapse clearfix" style="margin-top:5px;">
    			<ul class="navigation">
                        <li class="current"><a href="index.php">Home</a></li>
                       	<li id="moble-view1"><a href="aboutus.php">About Us</a></li>
                        <li><a href="phones.php?phone=used#product">Buy Used Phone</a></li>
			<li><a href="phones_deals.php" style="color: #e92438;font-weight: 600">Today's Deal</a></li>
                     	<li><a href="repairing.php#repair">Online Repairing</a></li>
                     	<li id="moble-view1"><a href="tell_us.php">Enquiry</a></li>
                     	<li id="moble-view1"><a href="track_order.php">Track Order</a></li>
                     	<li id="moble-view1"><a href="contact.php">Contact Us</a></li>
                    </ul>
				</div>
            </nav>
		</div>
	</div>
</div>
<!-- Header Top End -->
        
        <!-- Lower Part -->
        <!-- Lower Part End-->
            
<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn1')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script src="js/plugins.js"></script>
<script src="js/circletype.js"></script>
<script src="js/jquery.js"></script> 
<script>
    $('#simple_arc').circleType({radius:135});
    $('#reversed_arc').circleType({radius:55, dir:-1});
    $('#auto_radius').circleType();
</script>
<script>
var usertype='<?=$poster_type;?>';

$(document).ready(function () {

var mobile=localStorage.getItem("mobile");
var name=localStorage.getItem("name");

if((usertype==null  || usertype=='' ) && mobile!=null)
{
   window.location.href='register_save.php?mobile='+mobile+'&fname='+name;
}

if(mobile!=null)
	{
		
		$('#mobile1').val(mobile);
		$('#name1').val(name);
	}
var path= window.location.pathname;
pathname=path.substr((path.length-9),9);

if(mobile==null && pathname!='index.php' && pathname!='login.php' && usertype!='Admin' && usertype!='Dealer')
{
 window.location.href='index.php';
}
var lname=localStorage.getItem("name");
if(lname!=null && lname!="")
{
   $('#lname').html(lname);
}
else
{
	$('#lnamediv').hide();
}
});
</script>
