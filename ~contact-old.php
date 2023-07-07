<?php include('config.php');?>
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
<link href="css/responsive.css" rel="stylesheet">
<script src="js/jquery.js"></script> 
<script>
function validateForm() {
	
    var x = document.forms["myForm"]["type"].value;
    if (x == "") {
        alert("Pl select message type must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Pl name must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["email"].value;
    if(x!='')
    {
	    var atpos = x.indexOf("@");
	    var dotpos = x.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        alert("Not a valid e-mail address");
	        return false;
	    }
	}
	    
    var x = document.forms["myForm"]["subject"].value;
    if (x == "") {
        alert("Pl subject must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["msg"].value;
    if (x == "") {
        alert("Pl short description must be filled out");
        return false;
    }
    
}
</script>
<style>
.form-control {
    display: block;
    width: 100%;
    height: 37px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border:1px solid#ada8a8 !important;
    border-radius: 2px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.main-footer:before {
    background: #262626 url('images/contact-bottom.jpg') !important;
    background-repeat: repeat-x !important;
}
</style>
</head>
<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
    
 	
    <!-- Main Header -->
        <header class="header-style-two">
			<?php include('_header.php');?>        
	    </header>
    <!--End Main Header -->
    
    
    <!--Page Title-->
    
    
    
    <!--Default Section / Other Info-->
    <section class="default-section other-info" style="background:url('images/contac-bg.jpg');background-repeat:no-repeat;background-position:left bottom;padding-top:40px;background-size:100%;">
    	<div class="auto-container">
        
        	<div class="row clearfix" >
        		<div class="column col-md-12 col-sm-12 col-xs-12" id="mobile-des25">
	                <h2 class="cont-title" id="remove1">Contact <span style="color:#303030;font-weight: 800;">Information</span></h2>
	                <h2 class="cont-title" id="remove2" style="text-align:left;float:left;"><span style="color:#303030;font-weight: 800;text-transform: uppercase;">Contact Information</span></h2>
	                <p class="tag-line">SOUM is a brand name of Smart Solutions, Jaipur based company which deals in mobiles and electronics.</p>                
		        </div>
		        
		        <div class="col-md-4" id="map-add">
		        	<div class="contact-box">
			        	<h4 class="map-title">SOUM (A Unit Smart Solutions)</h4>
			        	<p class="map-msg">Haldiya Tower, 25 Kalyan Colony, Opp. Gaurav <br/>Tover, Malviya Nagar Jaipur (Raj)302017</p>
			        	<span style="position:absolute;bottom:-63px;left: 140px;" id="remove1"><img src="images/dot-add1.png"></span>
					</div>
				</div>
				<div class="col-md-4" id="map-add">
		        	<div class="contact-box">
			        	<h4 class="map-title">Phone</h4>
			        	<p class="map-msg">+91-9828075008</p>
			        	<span style="position:absolute;bottom:-63px;left: 140px;" id="remove1"><img src="images/dot-add1.png"></span>
					</div>
				</div>
				<div class="col-md-4" id="map-add">
		        	<div class="contact-box">
			        	<h4 class="map-title">Email Addresses</h4>
			        	<p class="map-msg"><a href="mailto:info@soum.co.in" style="color:#606060">info@soum.co.in</a> | <a href="mailto:sales@soum.co.in" style="color:#606060">sales@soum.co.in</a> <br/><a href="mailto:support@soum.co.in" style="color:#606060">support@soum.co.in</a></p>
			        	<span style="position:absolute;bottom:-63px;left: 140px;" id="remove1"><img src="images/dot-add1.png"></span>
					</div>
				</div>
				
				<div class="col-md-12" style="width:100%;float:left;margin-top:10px;margin-bottom:50px;" id="remove1">
					<article class="inner-box" style="width:100%;float:left;box-shadow: 3px 3px 9px -4px;">
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d889.8848464357626!2d75.807642!3d26.854599!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf53f665fce9962b!2sSmart+Solution&#39;s!5e0!3m2!1sen!2sin!4v1500471020363" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </article>
				</div>
				<div class="col-md-12" id="mobile-des26">
        		               
                <div class="column form-column col-md-8 col-sm-12 col-xs-12" style="margin:auto;float:none;" id="mobile-des27">
                	<div class="mobile-des28">
                		<div id="remove2" style="margin-top:15px;">
                			<h2 style="color:#000;text-align:left;font-size:18px;font-weight:500;">Leave Message</h2>
                			<p style="text-align:left;font-size:15px;color:#787878;line-height:18px;">Contact us if you would like more information about our products</p>
                		</div>
                	
                		<div class="col-md-11" style="margin:auto;float:none;margin-top:-25px;" id="remove1">
                		<div class="msg-box">
                			<h2 style="color:#fff;text-align:center;font-size: 32px;font-weight: 400;">Leave Message</h2>
                			<p style="text-align:center;font-size:16px;color:#fff;">Contact us if you would like more information about our products</p>
                		</div>
                		</div>
                	<!--COntact Form-->
                	<div class="inner-box contact-form" style="width:100%;float:left;margin-top:20px;">
                		<form method="post" action="SubcribeSave.php" name="myForm" onsubmit="return validateForm()">
                		<input name="mobile" id="mobile" type="hidden"/>
				  	        	<div class="form-group col-md-6 col-xs-12" style="margin-bottom:0px">  	    
						    	    <p class="comment-form-author"><label for="author">Message Type : <span class="red-text">*</span></label>
						    	    	<select class="form-control" name="type">						    	    	
						    	    	<option>Feedback</option>
						    	    	<option>Complaint</option>
						    	    	</select>
							    	</p>
						    	</div>
						    	
					  			<div class="form-group col-md-6 col-xs-12" style="margin-bottom:0px">  	    
						    	    <p class="comment-form-author"><label for="author">Your Name : <span class="red-text">*</span></label>
						    	    	<input type="text" placeholder="Your Name" name="name" id="fname" class="form-control"/>
							    	</p>
						    	</div>
						    	<div class="form-group col-md-6 col-xs-12" style="margin-bottom:0px">
							        <p class="comment-form-author"><label for="author">Email : <span class="red-text">*</span></label>
							     	   <input type="text" placeholder="Email" name="email"  class="form-control"/>
							        </p>
						        </div>
						        <div class="form-group col-md-6 col-xs-12" style="margin-bottom:0px">
							        <p class="comment-form-author"><label for="author">Subject : <span class="red-text">*</span></label>
								    	<input type="text" placeholder="Subject" name="subject" class="form-control"/>
								    </p>
							   </div>
							   <div class="form-group col-md-12 col-xs-12">
							        <p class="comment-form-author"><label for="author">Message : <span class="red-text">*</span></label>
							    	  <textarea name="message" placeholder="Message" style="height:120px;" rows="3" class="form-control"></textarea>
							        </p>
						        <button name="submit" type="submit" id="submit" value="Submit" class="theme-btn btn-style-two bg-2">Send</button>
						        </div>
					        </form>
						</div>	
                    </div><!--COntact Form-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--Contact Section-->
    
    <!--Main Features-->
    <section class="main-features parallax-section theme-overlay overlay-deep-white" style="padding:40px 0px;">
        <div class="auto-container">
            <div class="title-box text-center mb-0">
                <h5 class="fs-36" style="color:#fff;margin:0px;font-size: 26px !important;font-weight: 400;">Assure You</h5>
                <h2 style="text-transform:none;color:#fff;font-weight: 300;margin:0px;">Quick Response and <strong>High Availability</strong> of</h2>
                <div class="text" style="color:#fff;margin:20px;font-size:24px;">Mobile Phones @ Value for Money</div>
                <div class="">
                    <a class="theme-btn btn-style-four bg-2" href="contact.php" style="background:#fff;color:#000 !Important;padding: 10px 30px;border-radius: 4px;font-size: 16px;">Be in Touch</a>
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
<!--Donate Popup-->
<!-- /.modal -->
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.js"></script>
<script src="js/validate.js"></script>
<script src="js/wow.js"></script>
<script src="js/map-script.js"></script>
<script src="js/script.js"></script>
<script>
$("document").ready(function()
{  
    var mob=localStorage.getItem("mobile");
    var name=localStorage.getItem("name");
	if(mob!=null)
	{
		
		$('#mobile').val(mob);
		$('#fname').val(name);
	}
	
});
$("#fname").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});
</script>
</body>
</html>