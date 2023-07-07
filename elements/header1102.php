<?php
$poster_id = (isset($_SESSION['poster_id']))?$_SESSION['poster_id']:'';
$poster_type= (isset($_SESSION['poster_type']))?$_SESSION['poster_type']:'';
?>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light ">
 <a class="navbar-brand" href="<?php echo SITEPATH; ?>"><img src="img/logo.jpg" style="height: 60px;" alt="Services Online Used Mobile"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav ml-auto mr-auto">


      <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>

    </ul>
    <ul class="navbar-nav mr-0 usrnav">
    <?php if($poster_id==''){ ?>
        <li class="nav-item active">
         <a class="nav-link" href="#" id="LoginLinkId" data-toggle="modal" data-target="#exampleModal"><img src="img/signin.svg" alt=""/>Sign In</a>
        </li>

      <?php }else{
             if($poster_type=='Admin'){ ?>
            <li class="nav-item active">
              <a href="soumadmin/dashboard.php" class="nav-link">Admin</a>
            </li>
            <li class="nav-item" style="margin:0;">
             <a href="logout.php" class="nav-link" >Logout </a>
             </li>
        	<?php }
			 elseif($poster_type=='Dealer'){ ?>
			 <li class="nav-item active">
			  <a href="dealer_dashboard.php" class="nav-link">Dealer</a>
			 </li>
			 <li class="nav-item" style="margin:0;">
			 <a href="logout.php" class="nav-link" >Logout </a>
			 </li>

			<?php }else{ ?>
			<li class="nav-item active" id="lnamediv">
			  <a href="customer_dashboard.php" class="nav-link" id="lname" ></a>
			 </li>
			 <li class="nav-item" style="margin:0;">
			 <a href="logout.php" class="nav-link" >Logout </a>
			 </li>

			<?php } ?>
		<?php } ?>


        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="support" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="img/support.svg" alt=""/>  Support
        </a>
        <div class="dropdown-menu" aria-labelledby="support">
          <a class="dropdown-item" href="tel:+91-9829300040"><img src="img/sup2.png" alt=""/>+91-9829300040</a>
          <a class="dropdown-item" href="tel:+91-7062606260"><img src="img/sup2.png" alt=""/>+91-7062606260</a>
          <a class="dropdown-item" href="mailto:info@soum.co.in"><img src="img/sup.png" alt=""/>info@soum.co.in</a>
        </div>
      </li>


    </ul>
  </div>
</nav>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form name="myForm"  method="post" id="LoginForm" action="javascript:void(0);" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log in to your account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body signara">
        <img src="img/logo.jpg" alt=""/>
        <h4>Your details</h4>
        <div class="errorMessage2" style="color:red;"></div>
    		<div class="form-group">
			  <input name="mobile" id="mobile" onchange="client(this.value)" class="form-control" type="text" placeholder="Mobile No."/>
			</div>
			<div class="form-group">
			   <div id="name_loader" ></div>
			   <input name="fname" id="fname" class="form-control" type="text" placeholder="Name"/>
			</div>



        </div>
      <div class="modal-footer">
	     <div class="loadingDivReg" style="display:none;"><img src='upload/loader.gif' style='width:30px!important;height:30px!important;'></div>
         <button type="button" onclick="Loginform()" id="btlogin" class="btn btn-primary">Login</button>
      </div>
    </div>
	 </form>
  </div>
</div>
<script>
var usertype='<?=$poster_type;?>';

$(document).ready(function () {





/*
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
} */
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
$("#fname,#fname1211").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});
$("#mobile,#mobile1211").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9]/g)) {
       $(this).val(val.replace(/[^0-9]/g, ''));
   }

   if (val.length>10)
	{
       $(this).val(val.substr(0,10));

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
