<?php
$poster_id = (isset($_SESSION['poster_id']))?$_SESSION['poster_id']:'';
$poster_type= (isset($_SESSION['poster_type']))?$_SESSION['poster_type']:'';
?>
<header>
  <div class="navsec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="<?php echo SITEPATH; ?>" class="logosm"><img class="img-fluid" src="../new_img/logo.png" alt="img"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <img src="../new_img/toggleline.svg" alt="img">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Phones</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="new-phone-jaipur">Buy New Phone</a></li>
                    <li><a class="dropdown-item" href="second-hand-phone-jaipur">Buy Used Phone</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Brands</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                    <li><a class="dropdown-item" href="apple-gadgets">APPLE</a></li>
                    <li><a class="dropdown-item" href="samsung-gadgets">SAMSUNG</a></li>
                    <li><a class="dropdown-item" href="google-gadgets">GOOGLE</a></li>
                    <li><a class="dropdown-item" href="vivo-gadgets">VIVO</a></li>
                    <li><a class="dropdown-item" href="mi-gadgets">MI</a></li>
                    <li><a class="dropdown-item" href="one-plus-gadgets">ONE PLUS</a></li>
                    <li><a class="dropdown-item" href="oppo-gadgets">OPPO</a></li>
                    <li><a class="dropdown-item" href="real-me-gadgets">REAL ME</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gadget</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                    <li><a class="dropdown-item" href="tablets.php">Tablets</a></li>
                    <li><a class="dropdown-item" href="laptops.php">Laptops</a></li>
                    <li><a class="dropdown-item" href="watches.php">Smart Watches</a></li>
                    <li><a class="dropdown-item" href="airpod.php">Airpods</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="mobile-repair-shop-jaipur.php">Mobile repair</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">Company</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                    <li><a class="dropdown-item" href="aboutus.php">About Us</a></li>
                    <li><a class="dropdown-item" href="contact.php">Contact Us</a></li>
                    <li><a class="dropdown-item" href="tell_us.php">More</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="headbtns">
              <a href="#" class="whbtn">Contact</a>
              <a href="#" class="bluebtn">Sign in</a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>

<script>
var usertype='<?=$poster_type;?>';

$(document).ready(function () {


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
<script>
jQuery("#fname,#fname1211").on('keyup', function(e) {
    var val = jQuery(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       jQuery(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});
jQuery("#mobile,#mobile1211").on('keyup', function(e) {
    var val = jQuery(this).val();
   if (val.match(/[^0-9]/g)) {
       jQuery(this).val(val.replace(/[^0-9]/g, ''));
   }

   if (val.length>10)
	{
       jQuery(this).val(val.substr(0,10));

   }

});


function client(mob)
{
    var m=(mob.substr(0,1))*1;

    if(m>=0 && m<=6)
    {
      alert("Enter valid number");
      return false;

    }

    if(mob.length<10)
    {
      alert("Enter valid number");
      return false;
    }

$('#fname').hide();
 $('#name_loader').html("<img src='upload/loader.gif' style='width:20px!important;height:20px!important;'>");
   $.getJSON('client.php?callback=?','mob='+mob+'&act=client', function(data){

		if(data)
		{
		  $.each(data,function(i,element){


              if(element.fname!='' || element.fname=='')
              {
               $('#name_loader').html("");
               $('#fname').show();
              }
		      $('#fname').val(element.fname);


          });
        }
        if(data=='')
        {

               $('#name_loader').html("");
               $('#fname').show();
               $('#fname').val('');

        }

     });
}



</script>

