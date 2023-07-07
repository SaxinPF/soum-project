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
