<?php
include('config.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
if($poster_type=='Dealer')
{
    $sql="select * from soum_master_dealer where cust_id=$poster_id";
$res=$db->query($sql);
$row=$res->fetch_assoc();
$name=$row['fname'];
$email=$row['email'];
$address=$row['address'];
$city=$row['city'];
$mobile=$row['mobile'];
$pincod=$row['pincod'];
}
$layout_title = 'Enquiry - SOUM';
?>



<!doctype html>
<html lang="en">
   <head>
    <?php include('elements/headcommon.php');?>
   </head>
<body>
     <?php include('elements/header.php');?>
 <div class="clearfix"></div>

  <div class="cont">



  <div class="container">
  <h3>Looking for something else? No problem.</h3> <p style="padding-bottom:30px;">Drop a enquiry by filling the form below and our expert would assist you in the best possible way.</p>
  <form name="myForm5" onsubmit="return validateFormEqu()" method="post" action="enquiry_save.php" enctype="multipart/form-data">

<div class="row">

<div class="col-sm-6">

  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number * </label>
    <input name="enq_mobile" id="mobile_no" value="<?=$mobile;?>" onchange="client3(this.value)" class="form-control" type="text" placeholder="Enter your mobile number"/>
  </div>
  <div class="form-group">
    <label for="">Name *</label>
      <input name="enq_name" id="fname3" value="<?=$name;?>" class="form-control" type="text" placeholder="Enter your name"/>
  </div>
   <div class="form-group">
    <label for="">Email Address *</label>
    <input name="enq_email" id="email" value="<?=$email;?>" class="form-control" type="text" placeholder="Enter your e-mail address"/>
  </div>
     <div class="form-group">
       <label for="">Price Range</label>
        <div style="clear:both;"></div>
                 <input name="price-min" id="price-min" placeholder="Min" class="form-control" type="text" style="width:49%;float:left;margin-right: 1%;"/>
    	       <input name="price-max" id="price-max" placeholder="Max" class="form-control" type="text" style="width:49%;float:left;margin-left: 1%;"/>
    </div>
</div>
<div class="col-sm-6">

	   <div class="form-group">
		  <label for="">Device Brand *</label>

			<select name="drpBrand" id="soum_prod_subcat" class="form-control" onchange="fill2(this.value);" style="width:100%;" >
				<option selected="selected" value="">--Select your brand--</option>
				<?php
				  $sql="select * from soum_prod_subcat order by prod_subcat_id desc";
				  $res=$db->query($sql);
				  while($row=$res->fetch_assoc())
				  {
				  ?>
				  <option value="<?=$row['prod_subcat_id'];?>"><?=$row['prod_subcat_desc']?></option>

				 <?php }
				?>

			</select>
		</div>
				<div class="form-group">
				   <label for="">Device Model *</label>

						<div id="name_loader5"></div>
						<select name="drpModel" id="soum_prod_subsubcat" class="form-control" onchange="modal1(this.value);" style="width:100%;" >
							<option selected="selected" value="">--Select your model--</option>
						</select>
				</div>

				  <div class="form-group">
						<label for="">Description *</label>
						<textarea name="desc" rows="5" cols="20" id="txt_description" class="form-control" placeholder="Description"></textarea>
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

     var x = document.forms["myForm5"]["enq_name"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }

    if( document.myForm5.enq_mobile.value == ""  )
	{
	alert( "Please enter valid mobile no");
	document.myForm5.enq_mobile.focus() ;
	return false;
	}

    var x = document.forms["myForm5"]["enq_email"].value;

    if(x=='')
   {
      alert("Please email must be filled out");
	    return false;
   }

    if(x!='' )
    {
	    var atpos = x.indexOf("@");
	    var dotpos = x.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        alert("Not a valid e-mail address");
	        return false;
	    }
	}



    var brand=$("#soum_prod_subcat").val();
	var model=$("#soum_prod_subsubcat").val();

	var otherbrnad=$("#otherbrand").val();
	var othermodel=$("#othermodel").val();


	var desc=$("#txt_description").val();

	 if(brand=='')
	 {
	   alert("Brand must be selected");
	   return false;
	 }


	 if(brand!='0')
	 {
		 if(model=='')
		 {
		   alert("Model must be selected");
		   return false;
		 }
	 }
	 else if(brand=='0')
	 {
	    if(otherbrnad=='')
		 {
		   alert("Brand must be filled");
		   return false;
		 }

         if(othermodel=='')
		 {
		   alert("Model must be filled");
		   return false;
		 }

     }
     else if(model==0)
	 {

        if(othermodel=='')
		 {
		   alert("Model must be filled");
		   return false;
		 }

     }

	 if(desc=='')
	 {
	   alert("Description must be fill");
	   return false;
	 }
}




</script>
<script>
$("#fname3").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});



jQuery(function($){

   $("#mobile_no").mask("9999999999",{placeholder:"__________"});


});

$("document").ready(function()
{
    var mob=localStorage.getItem("mobile");
	if(mob!=null)
	{
		client3(mob);

	}

});
function fill2(p)
{
	if(p==0)
    {
     $("#branddiv").show();
     $("#modeldiv2").show();
     $("#modeldiv1").hide();
     $("#othermodel").val('');

    }
    else
    {
      $("#branddiv").hide();
      $("#modeldiv2").hide();
      $("#modeldiv1").show();
      $("#otherbrand").val('');
    }


	fill(p);
}
function fill(bid)
{
$('#soum_prod_subsubcat').hide();
 $('#name_loader5').html("<img src='upload/loader.gif' width='30' height='30'>");
	$.ajax({
		type:"Post",
		url:"fill3.php",
		data:"param="+bid,
		success:function(html)
		{
		       $('#name_loader5').html("");
               $('#soum_prod_subsubcat').show();

			$("#soum_prod_subsubcat").html(html);
		}
	});
}

function modal1(item)
{

/*
    var val=item;

       if(val==0)
       {
       $("#modeldiv2").show();
       }
       else
       {
	       $("#modeldiv2").hide();
	       $("#othermodel").val('');
       }

     var b=$("#soum_prod_subcat").val();

       $.ajax({

           type:"POST",
           url:"instock.php",
           data:"brand="+b+"&model="+val,

           success:function(data)
           {

            $("#dtl").html(data);
           }

       }); */


}
 function client3(mob){
   $.getJSON('client.php?callback=?','mob='+mob+'&act=client', function(data){
		if(data)
		{
		  $.each(data,function(i,element){

		      $('#fname3').val(element.fname);
		      $('#mobile_no').val(element.mobile);
			  $('#email').val(element.email);


          });
        }
     });
}
</script>
</body>
</html>
