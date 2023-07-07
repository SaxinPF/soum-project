<?php 
include('config.php');
$ref=$_SERVER['HTTP_REFERER'];
$pageadd=$_REQUEST['pageid'];
$po=strripos($ref,"/")+1;
$ln=strlen($ref);
$reffer1=substr($ref,$po,$ln);
if(isset($pageadd))
{
$reffer1=$pageadd."&source=temp";
}
$_SESSION['reffer']=$reffer1;
$reffer=$_SESSION['reffer'];
if (!empty($_POST)) {
	$user_id=$_REQUEST['user_id'];
	$utype=$_REQUEST['utype'];
	
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	
	$prod_id=$_SESSION['prod_id'];
	$ref_page1=$_REQUEST['ref_page1'];
	$ref_page2=$_REQUEST['ref_page2'];	
	
	
	//Dealer Remember
	if ($utype=="Dealer")
	{
		$dealer_remember=$_REQUEST['dealer_remember'];
		if($dealer_remember=="on")
		{
			echo "<script>localStorage.setItem('dealer_remember','SessionData');</script>";
			echo "<script>localStorage.setItem('dealer_email','$email');</script>";
			echo "<script>localStorage.setItem('dealer_pass','$pass');</script>";
		}			
		else
			echo "<script>localStorage.removeItem('dealer_remember');</script>";
	
	$sql= "SELECT * FROM soum_master_dealer WHERE email='$email' and user_pass=md5($pass)";
	$poster_type="Dealer";
					
	}
	//Customer Remember
	if ($utype=="Customer")
	{
		$customer_remember=$_REQUEST['customer_remember'];
		if($customer_remember=="on")
		{
			echo "<script>localStorage.setItem('customer_remember','SessionData');</script>";
			echo "<script>localStorage.setItem('customer_email','$email');</script>";
			echo "<script>localStorage.setItem('customer_pass','$pass');</script>";
		}			
		else
			echo "<script>localStorage.removeItem('customer_remember');</script>";
			
	$sql= "SELECT * FROM soum_master_customer WHERE email='$email' and user_pass='$pass'";
	$poster_type="Customer";
	}
	$result=$db->query($sql);
	$count=mysqli_num_rows($result);
	
	//echo $count;
	if($count==1)
	{
	
	        $row=$result->fetch_assoc();
			$_SESSION['poster_type']=$poster_type;
			$_SESSION['user_type']=$poster_type;
			$_SESSION['user_name']=$row['fname']; 
			$_SESSION['poster_id']= $row['cust_id'];
            $custid=$row['cust_id'];
            $dt=date('Y-m-d H:s:i');
	  //echo "<script>alert('$ref_page1');</script>";
		if ($utype=="Dealer")
		{	
		    $log="insert into soum_login_log(login_date,login_type,login_by)values('$dt','$poster_type','$custid')";
		    $db->query($log);
		    
		
			if ($ref_page1=="" || $ref_page1==null || $ref_page1=="login.php" || $ref_page1=="index.php")
			{
				echo "<script>window.location = 'dealer_dashboard.php';</script>";
			}
			else
			{
				echo "<script>window.location='$ref_page1';</script>";
			}			
			
		}		
		else
		{
		    $log="insert into soum_login_log(login_date,login_type,login_by)values('$dt','$poster_type','$custid')";
		    $db->query($log);
		    
		  
		    if ($ref_page2=="" || $ref_page2==null || $ref_page2=="login.php" || $ref_page2=="index.php")
			{
				echo "<script>window.location ='customer_dashboard.php';</script>";
			}
			else
			{
				echo "<script>window.location='$ref_page2';</script>";
			}	
		}
		
		
		
		
		
	}
	else
	{
		echo "<script>alert('Wrong Username or Password');</script>";
        echo "<script>window.location ='$reffer';</script>";
	}
}?>
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
<script>
$(document).ready(function() {
	var str =  document.referrer;
		var n = str.substr(str.lastIndexOf("/")+1,str.length);
	
});
	function valid1()
	{
		
		var user_id=$('#email1').val();		
		var pass=$('#pass1').val();
				
		
		if(user_id=="")
		{
			alert("Please Fill Your User/ Mail Id");
			return false;
		}
		
		var x=user_id;
	    var atpos = x.indexOf("@");
	    var dotpos = x.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        alert("Not a valid e-mail address");
	        return false;
	    }
		if(pass=="")
		{
			alert("Please Fill Your Password");
			return false;
		}
	}
	
	function valid2()
	{
		var user_id=$('#email2').val();		
		var pass=$('#pass2').val();
				
		
		if(user_id=="")
		{
			alert("Please Fill Your User/ Mail Id");
			return false;
		}
		
		var x=user_id;
	    var atpos = x.indexOf("@");
	    var dotpos = x.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        alert("Not a valid e-mail address");
	        return false;
	    }
	    
		if(pass=="")
		{
			alert("Please Fill Your Password");
			return false;
		}
	}
</script>
<script>
function validateForm() {
    var x = document.forms["myForm"]["utype"].value;
    if (x == "") {
        alert("Please Select User");
        return false;
    }
    var x = document.forms["myForm"]["name1"].value;
    if (x == "") {
        alert("Please Fill Your Name");
        return false;
    }
    var x = document.forms["myForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
    var x = document.forms["myForm"]["pwd"].value;
    if (x == "") {
        alert("Please Fill Your Password");
        return false;
    }
    var x = document.forms["myForm"]["address"].value;
    if (x == "") {
        alert("Please Fill Your Address");
        return false;
    }
    var x = document.forms["myForm"]["pincod"].value;
    if (x == "") {
        alert("Please Fill Your Pincod");
        return false;
    }
    var x = document.forms["myForm"]["city"].value;
    if (x == "") {
        alert("Please Fill Your City");
        return false;
    }
    if( document.myForm.mobile.value == "" ||
		isNaN( document.myForm.mobile.value) ||
		document.myForm.mobile.value.length != 10 )
		{
		alert( "Please enter valid mobile no" );
		document.myForm.mobile.focus() ;
		return false;
		}
		
}
</script>
<script>
	function valid_regt()
	{
		utype=$('#utype').val();
		name1=$('#name1').val();
		email=$('#email').val();
		var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		pwd=$('#pwd').val();
		pwdrept=$('#pwdrept').val();
		address=$('#address').val();
		city=$('#city').val();
		pincod=$('#pincod').val();
		mob=$('#mob').val();
		
		
		if(utype=="")
		{
			alert("Please Select User");
			return false;
		}
		if(name1=="")
		{
			alert("Please Fill Your Name");
			return false;
		}
		if(email=="")
		{
			alert("Please Fill Your Email Id");
			return false;
		}
		if (!filter.test(email)) 
		{
			alert("Invalid Email Id");
			return false;
		}
		if(pwd=="")
		{
			alert("Please Fill Your Password");
			return false;
		}
		if(pwdrept=="")
		{
			alert("Please Fill Your Confirm Password");
			return false;
		}
		if(pwd!=pwdrept)
		{
			alert("Password And Confirm Password Does not match");
			return false;
		}
		if(address=="")
		{
			alert("Please Fill Your Address");
			return false;
		}
		if(city=="")
		{
			alert("Please Fill Your City");
			return false;
		}
		if(pincod=="")
		{
			alert("Please Fill Your Pincode");
			return false;
		}
		if(mob=="")
		{
			alert("Please Fill Your Mobile Number");
			return false;
		}
		if(isNaN(mob))
		{
			alert("Mobile Number contains illegal characters");
			return false;	
		}
		if(!(mob.length==10))
		{
			alert("Mobile Number must contain 10 digit number");
			return false;	
		}
	}	
	
function guest()
{
	var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	var guest_name=document.getElementById('gname').value;
	var guest_mail=document.getElementById('gmail').value;
  	var guest_mobile=document.getElementById('gmobile').value;
  	var guest_address=document.getElementById('gaddress').value;
  	
  	if(guest_name=='')
	{
	alert("First Name is required");
	return false;
	}
	if(guest_mail=='')
	{
	alert("Email is required");
	return false;
	}
	if (!filter.test(guest_mail)) 
	{
		alert("Invalid Email");
		return false;
	}
	if(guest_mobile=='')
	{
	alert("Mobile is required");
	return false;
	}
	if(guest_mobile.length<10)
	{
	alert("Mobile number must contain 10 characters");
	return false;
	}
	if(guest_address=='')
	{
	alert("Address is required");
	return false;
	}
}
function forget()
{
 
var mail=$("#forget_mail").val();
  alert(mail);
  if(mail=='')
  {
   alert('Pl enter register email address!');     
   return false;
  }
  
  $.ajax({
  
      type:'POST',
      url:'forget_pwd.php',
      data:'email='+mail,
      
      success:function(data)
      {
        if(data==1)
        alert("Password send successfully");
      }
  });
}	
</script>
<style>
.text-field {
    padding: 7px !important;
    width: 100% !important;
    margin-bottom: 5px;
    border: 1px solid#ddd;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom:0px;
    font-weight: 700;
    text-align: left;
    float: left;
}
.form-control {
    display: block;
    width: 100%;
    height: 40px;
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
</style>
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
    
    
    <!--Page Title-->
    
    
    <!--Default Section-->
    
    
    <!--Feature Section-->
   <section class="default-section pb-0" style="padding: 0px 0px 40px;margin-bottom:30px;">    	
	<div class="col-md-12" style="padding: 50px 15px 30px 15px; min-height: 250px; background-image: url('images/used-phone-bg.jpg'); background-repeat: repeat;">
		<div class="column col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
			<h1 style="line-height: 1; margin-top: 8px; text-align: center; color: #fff;">Login / <span style="color: #fff; font-weight: 800;">Sign Up</span></h1>
	</div>
	</div>
	
        <div class="auto-container">
            <div class="row clearfix">
                      	<div class="col-md-12">
              	
                  <div class="col-md-9" style="margin: auto; float: none; margin-top: -90px;">
					<div style="width: 100%; float: left; background: #fff; padding:50px 15px 40px 15px; border: 1px solid#f1f1f1;">
						<div class="login-signup-form" style="width:100%;float:left;">
				<div class="col-md-6 login text-center" style="text-align:left;margin:auto;float:none;height:auto;">
				<div style="width:100%;float:left;height:auto;background-color:#fb7034;">
					<h4 style="color:#fff;text-align:center;font-weight:bold">Login</h4>
					
					<div style="width: 100%; float: left; padding: 10px; margin-top: 20px;">
					<form name="dealer_form" method="post" onsubmit="return valid1()" style="width:90%;float:none;margin:auto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
				<div class="cus_info_wrap" style="margin-top:20px;">
					<div class="spacing">
						<input type="hidden" value="Dealer" name="utype">
					</div>
				</div>
				<div class="cus_info_wrap">
					<label class="labelTop" style="margin-bottom:10px;color:#fff;">Dealer E-mail Id <span class="require">
					*</span></label>
					<div class="spacing"><input placeholder="User/ Mail Id" name="email" id="email1" tabindex="2" class="form-control" type="text">
					<input id="ref_page1" type="hidden" name="ref_page1" value="<?=$reffer;?>"></div>
				</div>
				<div class="cus_info_wrap">
					<label class="labelTop" style="margin-bottom:10px;margin-top:15px;color:#fff;">Dealer Password</label>
					<div class="spacing"><input placeholder="Password" id="pass1" name="pass" tabindex="3"  type="password" class="form-control"></div>
				</div>
				<div class="cus_info_wrap">
				<div class="spacing" style="margin-top: 15px;">
						<input name="dealer_remember" id="dealer_remember" type="checkbox" /> <span style="font-weight:bold;color:#fff;">&nbsp; Remember</span> 
				 </div>
				</div>						
				<div class="botton1" style="width: 100%;float: left;text-align: center;margin-top:15px;">
					<input value="Login" type="submit" name="login" class="theme-btn btn-style-four" tabindex="4" style="padding:5px 15px;">
				</div>
				
				</form>
				<div class="col-md-12" style="padding-bottom:40px;margin-top:30px;">
					<label class="labelTop" style="margin-bottom:10px;margin-left:15px;color:#fff;">Forgot your password?</label>
					<div class="col-md-8">
						<input class="form-control" value="" id="forget_mail" placeholder="Enter email to reset it" type="text" style="float:left;margin-right:10px;">
					</div>
					<div class="col-md-4">
						<input value="SUBMIT" class="theme-btn btn-style-four" type="button" onclick="forget()" style="padding:5px 15px;float:left;">
					</div>
				</div>
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
    <!--start footer -->
	
	<!--end footer -->
    
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper"><span class="fa fa-long-arrow-up"></span></div>
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
	 	 <script src="soumadmin/scripts/vendors.js"></script>
<script>
//dealer_remember
if (localStorage.getItem("dealer_remember") === null)
{
	document.getElementById("dealer_remember").checked = false;
	$('#email1').val("");
	$('#pass1').val("");
	
}
else
{
	document.getElementById("dealer_remember").checked = true;
	$('#email1').val(localStorage.getItem("dealer_email"));
	$('#pass1').val(localStorage.getItem("dealer_pass"));
}
//customer_remember
if (localStorage.getItem("customer_remember") === null)
{
	document.getElementById("customer_remember").checked = false;
	$('#email2').val("");
	$('#pass2').val("");
	
}
else
{
	document.getElementById("customer_remember").checked = true;
	$('#email2').val(localStorage.getItem("customer_email"));
	$('#pass2').val(localStorage.getItem("customer_pass"));
	
	
}


function forget()
{
 
var mail=$("#forget_mail").val();
  
  if(mail=='')
  {
   alert('Pl enter register email address!');     
   return false;
  }
  
  $.ajax({
  
      type:'POST',
      url:'forget_pwd.php',
      data:'email='+mail,
      
      success:function(data)
      {
        if(data==1)
        alert("Sent a link on your email for reset your password");
      }
  });
}	

</script>



<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
	
	
</body>
</html>