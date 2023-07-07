﻿<?php
	include('config.php');
    $poster_id=$_SESSION['poster_id'];
    $poster_type=$_SESSION['poster_type'];
	$pht=$_REQUEST['phone'];
	//$phone_type=($_REQUEST['phone']=='used'?2:($_REQUEST['phone']=='new'?1:''));
	$phone_type=2;
	$sort=$_REQUEST['sort_act'];

$act=$_REQUEST['act'];
$dt=date("Y/m/d");


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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/bootstrap-margin-padding.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet"`>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<script>
 function sort(val)
  {
    var type='<?=$phone_type;?>';
    var	type1=(type==1?'new':(type==2?'used':''));
    window.location.href="phones.php?phone="+type1+"&sort_act="+val; 
  } 
</script>
<style>
.flash {
    animation-name: flash;
    animation-duration: 1.2s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    animation-play-state: running;
    color:#fe3f3f;
}
.style1 {
    color: #0094DC;
    font-weight: bold;
}
</style>

</head>
<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
    
 	
    <header class="header-style-two">
		<?php include('_header.php');?>        
    </header>
    
    
    <!--Page Title-->
    
    <!--Recent Projects Section-->
    <section class="recent-projects" style="padding:15px 0px 10px;">
        <div class="auto-container">
            <div class="row clearfix">
            
        		<div class="col-md-12" id='<?php if (ISSET($_REQUEST['Submit1']) || ISSET($_REQUEST['sort_act'])) echo "title-mobile1"; else echo "title-mobile"; ?>'>
               		<div style="width:46%;float:left;"><h2 style="margin:0px;padding:0px;font-size:18px;font-weight:bold;margin-top: 4px;text-align:center;">Buy Used Phone</h2></div>
               		<div style="width:54%;float:left;text-align:center;">
               			<div class="short" style="margin-right:20px;" onclick="myFunction2()">Short By <i class="fa fa-caret-down" aria-hidden="true"></i></div> 
               			<div class="short" onclick="myFunction()">Filter <i class="fa fa-caret-down" aria-hidden="true"></i></div>
               		</div>
               	</div>
                <div class="column default-featured-column links-column col-md-12" style="padding:0px;">
                	<div class="col-md-12" style="background:#fff;border:1px solid#ddd;box-shadow: 3px 3px 4px -5px;margin-top:10px;margin-bottom:10px;padding:0px;">
						<div style="width:100%;float:left;"><img src="images/google-pixel-img.jpg" style="width:100%;"/></div>
					</div>
					<div class="col-md-12">
						<h1></h1>
					</div>
					
					
					
					
                
       
                </div>
            
       
		 </div>
            <!-- Styled Pagination -->
            
        </div>
    </section>
	<!--start footer -->
	<?php include('_footer.php');?>
	<!--end footer -->
    
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper"><span class="fa fa-long-arrow-up"></span></div>
<!--Donate Popup-->
<!-- /.modal -->
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>



<script src="js/owl.js"></script>
<script src="js/wow.js"></script>



<script src="js/script.js"></script>
<script>
$("document").ready(function()
{
	//fill('fill2.php','soum_prod_subcat','');
});
function fill2(p)
{
	fill(p);
}
function fill(bid)
{

$('#brand_loader').hide();
 $('#name_loader').html("<img src='upload/loader.gif' width='30' height='30'>");

	$.ajax({
		type:"Post",
		url:"fill3.php",
		data:"param="+bid,
		success:function(html) 
		{
		       $('#name_loader').html(""); 
               $('#brand_loader').show();

			$("#soum_prod_subsubcat").html(html);
		}
	}); 
}

function modal1(item)
{
    var val=item;
     var b=$("#soum_prod_subcat").val();
     //alert("brand="+b+"&model"+val);
       $.ajax({
          
           type:"POST",
           url:"instock.php",
           data:"brand="+b+"&model="+val,
           
           success:function(data)
           {
            $("#dtl").html(data);
           }
       
       });
       
       
}
</script>


<script>

function myFunction2() {
    $("#myDIV").hide();
    $("#myDIV2").toggle();
  	
}

function myFunction() {
	
     $("#myDIV").toggle();
     $("#myDIV2").hide();

}


</script>
</body>
</html>