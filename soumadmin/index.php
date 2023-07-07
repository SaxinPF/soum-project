<?php

include('../config.php');
if(isset($_SESSION['poster_type']))
{
echo "<script>window.location.href='dashboard.php';</script>";
}
if(isset($_REQUEST['submit']))
{
$email=$_REQUEST['email'];
$pass=$_REQUEST['pwd'];
$admin_remember=$_REQUEST['admin_remember'];
if($admin_remember=="on")
{
    echo "<script>localStorage.setItem('admin_remember','SessionData');</script>";
    echo "<script>localStorage.setItem('admin_email','$email');</script>";
    echo "<script>localStorage.setItem('admin_pass','$pass');</script>";
}
else
{
    echo "<script>localStorage.removeItem('admin_remember');</script>";
}
$sql= "SELECT * FROM soum_master_admin WHERE user_name='$email' and user_pwd=md5('$pass')";
//echo $sql;
$result=$db->query($sql);
$count=mysqli_num_rows($result);
if($count==1)
    {
          $row=$result->fetch_assoc();

        $_SESSION['poster_type']='Admin';
        $_SESSION['user_type']='Admin';
        $_SESSION['user_name']=$row['fname'];
        $_SESSION['poster_id']= $row['usr_id'];

        echo "<script>window.location.href='dashboard.php'</script>";
    }
    else
    {
		?>
		<script>
			alert("Wrong Username or Password");
			window.location.href="index.php"
		</script>
	<?php
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="solutionportal">
	<!-- <base href="/"> -->
	<title>Admin Login</title>

	<!-- Icons -->
	<link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="css/custom.css" integrity="" crossorigin="">
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
	<!-- Plugins -->
	<link rel="stylesheet" href="styles/plugins/waves.css">
	<link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">

	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/main.min.css">

 	<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'> -->
	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]-->
	<style>
.logo {
    background-image: url('../images/logobkg3.png');
    background-repeat: no-repeat;
    background-size: 100% 100%;
    width: 200px;
    padding: 6px;
}
	</style>
</head>
<body id="app" class="app off-canvas body-full" style="background-color:#fff;">
	<header class="site-head" id="site-head" style="top: 0;width: 100%;margin-left: 0;margin-top:0x;display:block;/*background:#c9c9c9;width:100%;float:left;background: url('../images/h4.png');background-repeat:repeat;background-size: cover;*/">


			<div class="col-md-3">&nbsp;</div>
	</header>
		<div class="main-container clearfix" style="top:30%;">
		<div class="content-container" id="content">
			<div class="page page-auth" style="background-color:#fff;">
				<div class="auth-container">
					<div class="form-head mb20">
						<center><img style="height: 80px;margin-top: 220px;" src="/img/logo.jpg"></center>
                         <h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold" style="font-size: 21px"><a href="index.php">Admin Login</a></h1>
					</div>
					<div class="form-container">
						<form class="form-horizontal" method="post" >
							<div class="md-input-container md-float-label">
								<input type="text" name="email" id="email" class="md-input">
								<label>Email Address</label>
							</div>
							<div class="md-input-container md-float-label">
								<input type="password" name="pwd" id="pwd" class="md-input">
								<label>Password</label>
							</div>
							<div class="clearfix">
								<div class="ui-checkbox ui-checkbox-primary right">
									<input name="admin_remember" id="admin_remember" type="checkbox" /> <span style="font-weight:bold">&nbsp; Remember</span>
								</div>
							</div>
							<div class="clearfix mb15" style="display:none"><a href="forget-pass.html" class="text-success small">Forget your password?</a></div>
							<div class="btn-group btn-group-justified mb15">
								<div class="btn-group">
									<button type="submit" name="submit" class="btn btn-success" style="background:#000000;border:1px solid#000000;">Sign In</button>
								</div>
							</div>
							<div class="clearfix text-center small" style="display:none">
								<p>Don't have an account? <a href="register.php">Create Now</a></p>
							</div>
						</form>
					</div>
				</div> <!-- #end signin-container -->
			</div>
		</div>
		<!-- #end content-container -->
	</div> <!-- #end main-container -->
	<script src="scripts/vendors.js"></script>
	<script>
if (localStorage.getItem("admin_remember") === null)
{
	document.getElementById("admin_remember").checked = false;
	$('#email').val("");
	$('#pwd').val("");

}
else
{
	document.getElementById("admin_remember").checked = true;
	$('#email').val(localStorage.getItem("admin_email"));
	$('#pwd').val(localStorage.getItem("admin_pass"));
}
</script>
</body>
</html>