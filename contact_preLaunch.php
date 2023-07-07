<?php
include('config.php');
$preid=$_REQUEST['preid'];
$layout_title = 'Pre Launch Enquiry - SOUM';
?>
<!doctype html>
<html lang="en">
   <head>
    <?php include('elements/headcommon.php');?>
   </head>
<body>
     <?php include('elements/header.php');?>

           <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
      <script>
      jQuery(function($){
			$("#mobilee").mask("9999999999",{placeholder:"__________"});
		});
     </script>


 <div class="clearfix"></div>

  <div class="cont">

  <div class="container">
  <h3>Pre Launch Enquiry</h3> <p style="padding-bottom:30px;">Contact us if you would like more information about our products</p>
   <form method="post" action="SubcribeSave.php" name="myForm5" onsubmit="return validateFormEqu()">
    <?php
                    $brand_id = 0;
        		    $model_id = 0;
					$sql="select * from soum_pre_launch where pre_id=$preid";
				  $res=$db->query($sql);
				  while($row=$res->fetch_assoc())
				  {
				    $brand_id = $row['brand_id'];
				    $model_id = $row['model_id'];
				    $model_name = $row['model_name'];

				  }
				?>


     <input type="hidden" name="brand_id" value="<?=$brand_id;?>"/>
     <input type="hidden" name="model_name" value="<?=$model_name;?>"/>
     <!-- <input type="hidden" name="model_id" value="<?=$model_id;?>"/> -->
     <input type="hidden" name="preid" value="<?=$preid;?>"/>
     <input type="hidden" name="type" value="PreLaunch"/>
   <div class="row">

       <div class="col-sm-6">


	      <div class="form-group">
			<label for="">Name *</label>
			   <input type="text" placeholder="Your Name" name="name" id="fname3" class="form-control"/>
     	  </div>

		  <div class="form-group">
			<label for="">Email Address *</label>
			 <input type="text" placeholder="Email" name="email" id="email2" class="form-control"/>
		  </div>

		  <div class="form-group">
			<label for="exampleInputEmail1">Mobile Number * </label>
			   <input type="text" placeholder="Phone No." id="mobilee" name="mobile"  class="form-control"/>

		  </div>

	 </div>
	<div class="col-sm-6">

					  <div class="form-group">
							<label for="">Description *</label>
							<textarea name="message" placeholder="Message" rows="5" cols="20" class="form-control">Hello SOUM Team, I wish to buy this product, and would like to discuss its price. I have shared my phone number so you could call me anytime.</textarea>

					  </div>

		   <button type="submit" name="Button1" class="btn btn-primary">Submit</button>
	</div>


</div>
 </form>



  </div>
  </div>
  <?php include('elements/footer.php');?>
  <script src="js-old/jquery.maskedinput.js" type="text/javascript"></script>
<script>
function validateFormEqu() {


    var x = document.forms["myForm5"]["name"].value;
    if (x == "") {
        alert("Name must be entered");
        return false;
    }
    var x = $("#email2").val();
    if(x!='')
    {
	    var atpos = x.indexOf("@");
	    var dotpos = x.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        alert("Email entered is invalid");
	        return false;
	    }
	}

     var x = document.forms["myForm5"]["mobile"].value;
    if (x == "") {
        alert("Mobile number must be entered");
        return false;
    }


    var x = document.forms["myForm5"]["message"].value;
    if (x == "") {
        alert("Description must be filled out");
        return false;
    }


}
$("#mobilee").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9]/g)) {
       $(this).val(val.replace(/[^0-9]/g, ''));
   }

   if (val.length>10)
	{
       $(this).val(val.substr(0,10));

   }

});


</script>
<script>
$("document").ready(function()
{
    var mob=localStorage.getItem("mobile");
    var name=localStorage.getItem("name");
	if(mob!=null)
	{

		$('#mobilee').val(mob);
		$('#fname3').val(name);
	}

});
$("#fname3").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});
</script>
</body>
</html>
