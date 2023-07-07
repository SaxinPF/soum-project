<?php include('config.php'); 
$layout_title = 'Contact Us - SOUM';
?>
<!doctype html>
<html lang="en">
   <head>
    <?php include('elements/headcommon.php');?> 
   </head>
<body>
     <?php include('elements/header.php');?> 
 <div class="clearfix"></div>
  <div class="mainhead container">
  <div class="headslog"><h1>Contact Information <span>SOUM is a brand name of Smart Solutions, Jaipur based company which deals in mobiles and electronics. </span></h1> </div>
  <div class="clearfix"></div>
 <div class="aboutsc">
 <div class="clearfix"></div>
 <div class="row">
 <div class="col-sm-6">
 <h3>Address: </h3>
 <p>Haldiya Tower, 25 Kalyan Colony, Opp. Gaurav<br>

Tover, Malviya Nagar Jaipur (Raj)302017<br>

<h3>Phone No: </h3>
+91-9828075008<br>
<br>
<h3>Email </h3>
info@soum.co.in | sales@soum.co.in<br>

support@soum.co.in</p>
 </div>
  <div class="col-sm-6">
 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1779.7696928715252!2d75.807642!3d26.854599!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf53f665fce9962b!2sSmart+Solution&#39;s+(Second+Hand+Mobile+Phones)!5e0!3m2!1sen!2sin!4v1522049321218" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
 
 </div>
 
 </div>
 
 
 
  </div>
  <div class="clearfix"></div>
  <div class="cont">
  <div class="container">
  <h3>Leave Message</h3> <p>Contact us if you would like more information about our products</p>
  <form method="post" action="SubcribeSave.php" name="myContact" onsubmit="return validateFormContact()">
<div class="row">

<div class="col-sm-6">
<input name="mobile" id="mobile" type="hidden"/>
    <div class="form-group">
       <label for="exampleInputEmail1">Message Type : *</label>
		   <select class="form-control" name="type">						    	    	
				<option>Feedback</option>
				<option>Complaint</option>
			</select>
	</div>


  <div class="form-group">
    <label for="exampleInputEmail1">Your Name : * </label>
    <input type="text" class="form-control" name="name" id="fname" aria-describedby="" placeholder="Your Name  ">
   
  </div>
  <div class="form-group">
    <label for="">Email : *</label>
    <input type="text" class="form-control" id="" name="email" placeholder="Email">
  </div>
   <div class="form-group">
    <label for="">Subject : *</label>
    <input type="text" class="form-control" id="" name="subject" placeholder="Subject">
  </div>
</div>
<div class="col-sm-6">
 <div class="form-group">
    <label for="">Message : *</label>
    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</div>
 

</div>
 </form>


  
  </div>
  </div>
  <?php include('elements/footer.php');?> 
  
  <script>
function validateFormContact() {
	
    var x = document.forms["myContact"]["type"].value;
    if (x == "") {
        alert("Pl select message type must be filled out");
        return false;
    }
    var x = document.forms["myContact"]["fname"].value;
    if (x == "") {
        alert("Pl name must be filled out");
        return false;
    }
    var x = document.forms["myContact"]["email"].value;
    if(x!='')
    {
	    var atpos = x.indexOf("@");
	    var dotpos = x.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        alert("Not a valid e-mail address");
	        return false;
	    }
	}
	    
    var x = document.forms["myContact"]["subject"].value;
    if (x == "") {
        alert("Pl subject must be filled out");
        return false;
    }
    var x = document.forms["myContact"]["msg"].value;
    if (x == "") {
        alert("Pl short description must be filled out");
        return false;
    }
    
}
</script>
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