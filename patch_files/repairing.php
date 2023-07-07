<?php 
include('config.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
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
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/bootstrap-margin-padding.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet"`>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
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
    border: 1px solid #ababab;
    border-radius: 2px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
#msform {
    width:100% !important;
    margin:0px !important;
    text-align: left !important;
    position: relative;
}
.bkg-tab {
    background-color: #fff;
    padding: 6px 14px;
    color: #000;
    border-radius: 5px 5px 0px 0px !important;
    box-shadow: 3px 3px 3px -4px;
    font-weight: bold;
    margin-right: 5px;
    float: left;
    width: auto !important;
    margin-bottom: 0px !important;
    border: 0px solid#ddd !important;
}
</style>
</head>
<script>
 function tab_click(val)
  {
  
  	if(val==1)
  	{
			$("#button"+val).css("background-color","#e92438");
			$("#button"+val).css("color","#fff");
			
			$(".d").hide();$("#d1").show();  	   		
  	
  	}

  
  	if(val==2)
  	{
  	   if(valid1())
  	   {
			$("#button"+val).css("background-color","#e92438");
			$("#button"+val).css("color","#fff");
			$("#st2").addClass("active");
			$(".d").hide();$("#d2").show();
  	   		
  	   }
  	
  	}
	if(val==3)
  	{
  	   if(valid2())
  	   {
  	      $("#button"+val).css("background-color","#e92438");
  	      $("#button"+val).css("color","#fff");
  	      $("#st3").addClass("active");
			$(".d").hide();$("#d3").show();  	      
  	   
  	   }
  	
  	}
 } 	
 </script> 	
<body>
<div class="page-wrapper" style="background-color:#f7f7f7">
 	
    <!-- Preloader -->
    <div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
    
 	<header class="header-style-two">
		<?php include('_header.php');?>        
    </header>
     
    <!--Feature Section-->
    <section class="welcome-section pb-70" style="padding-top: 20px" id="p-bottom">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Cause Column-->
              
                <div class="col-md-12">
                    <div class="row">
                    <div class="column col-md-12 col-sm-12 col-xs-12" style="text-align:center;margin-bottom:20px;background-color:#f7f7f7"><a name="repair"></a>
                    <h1 style="line-height: 1;margin-top: 8px;text-align:center;" class="mobile-des1">GET YOUR <span style="color:#000;font-weight: 800;">PHONE REPAIRED </span> ONLINE</h1>
                    <h3 style="font-family: inherit;" class="mobile-des2">IN 3 EASY STEPS</h3>
                    
                    <div style="width:100%;float:left;padding:30px 0px;">
	                  <ul id="progressbar">
						    <li class="active">Step1</li>
						    <li id="st2">Step2</li>
						    <li id="st3">Step3</li>
					  </ul>
					 </div>
                </div>
                <div class="col-md-12" id="mobile-des23">
                	<div class="col-md-7" style="margin:auto;float:none;">
					<div style="width:100%;float:left;">
					<form method="post" action="repairing_save.php" enctype="multipart/form-data" id="msform" name="myForm" onsubmit="return valid3()">
					<div class="col-md-12">
                 	<div style="width:100%;float:left;border-bottom: 2px solid #e92438;" id="remove1">
						<input name="Button1"  class="bkg-tab" style="background:#e92438;color:#fff;" type="button" value="Account Setup" id="button1" onclick="tab_click(1)">
						<input name="Button2"  class="bkg-tab" type="button" value="Contact Information" id="button2" onclick="tab_click(2)">
						<input name="Button3"  class="bkg-tab" type="button" value="Repairing Detail" id="button3" onclick="tab_click(3)">
					</div>
					<div id="box-shadow">			
					<div id="d1" class="d">
					
								<div class="clearfix" id="padding-form">
									<p style="margin:0px;text-transform: uppercase;font-size: 18px;" id="remove2"><label>Account Setup</label></p>
									<h2 id="mobile-des24">Your Information</h2>
									<div class="col-md-12" style="padding:0px;">
										<p style="margin:0px;" id="remove1"><label>Full Name*</label></p>
					                    <input name="fname" id="fname" value="<?=$name;?>" class="form-control" type="text" />
				                    </div>
				                    <div class="col-md-12" style="padding:0px;">
										<p style="margin:0px;" id="remove1"><label>Email Address*</label></p>
					                    <input name="email" id="email" value="<?=$email;?>" class="form-control" type="Email"/>
					                </div> 
					                <div class="col-md-12" style="padding:0px;">
										<p style="margin:0px;" id="remove1"><label>Mobile No*</label></p>   
				                    	<input name="mobile_no" id="mobile_no" value="<?=$mobile;?>" class="form-control" type="text"/>
				                    </div>
									<div class="col-md-12" style="padding:0px;margin-top:15px;">
			    						<div class="col-md-6" style="padding:0px;float:right;">
											<a href="#tab-flip-two" data-toggle="tab"  onclick="tab_click(2)" class="theme-btn btn-style-four btn-sm bg-2 next" style="font-style: normal;border:2px solid#da200b !Important;float:right;width: 100px;text-align:center;"> 
											Next</a>
										</div>
									</div>
  								</div>

					</div>
					<div id="d2" class ="d" style="display:none">
					
					   <div class="clearfix" id="padding-form">
									<p style="margin:0px;text-transform: uppercase;font-size: 18px;" id="remove2"><label>Contact Information</label></p>
							    	<h2 id="mobile-des24">Your Contact Information</h2>
								    	<div class="col-md-12" style="padding:0px;">
											<p style="margin:0px;" id="remove1"><label>Address*</label></p>		
											<input type="text" name="adress" id="adress" class="form-control" placeholder="Address*" value="<?=$address;?>"/>
										</div>
										<div class="col-md-12" style="padding:0px">
												<p style="margin:0px;" id="remove1"><label>State*</label></p>
							                    <select name="state" id="state" class="form-control" >
							               			<option selected="selected" value="">--Select State*--</option>
							               			<option value="Rajasthan">Rajasthan</option>
							               		</select>
							               	</div>
										<div class="col-md-12" style="padding:0px;margin-top:10px;">
											<p style="margin:0px;" id="remove1"><label>City*</label></p>
											<select name="city" id="city" class="form-control" style="width:100%;" >
													<option value="">--Select City*--</option>
													<option value="Jaipur">Jaipur</option>
													<option value="Jodhpur">Jodhpur</option>
													<option value="Kota">Kota</option>
													<option value="Bikaner">Bikaner</option>
													<option value="Ajmer">Ajmer</option>
													<option value="Udaipur">Udaipur</option>
													<option value="Bhilwara">Bhilwara</option>
													<option value="Alwar">Alwar</option>
													<option value="Bharatpur">Bharatpur</option>
													<option value="Ganganagar">Ganganagar</option>
													<option value="Sikar">Sikar</option>
													<option value="Pali">Pali</option>
													<option value="Tonk">Tonk</option>
													<option value="Kishangarh">Kishangarh</option>
													<option value="Beawar">Beawar</option>
													<option value="Hanumangarh">Hanumangarh</option>
													<option value="Dhaulpur">Dhaulpur</option>
													<option value="Gangapur City">Gangapur City</option>
													<option value="Sawai Madhopur">Sawai Madhopur</option>
													<option value="Churu">Churu</option>
													<option value="Jhunjhunu">Jhunjhunu</option>
													<option value="Baran">Baran</option>
													<option value="Chittaurgarh">Chittaurgarh</option>
													<option value="Makrana">Makrana</option>
													<option value="Nagaur">agaur</option>
												</select>
											</div>
											
							               		
									<div class="col-md-12" style="padding:0px;margin-top:15px;">
										<div class="col-md-6" style="padding:0px;">
											<a href="#" class="theme-btn btn-style-four btn-sm bg-2" onclick="tab_click(1)" style="font-style: normal;border:2px solid#da200b !Important;float:left;min-width: 100px;text-align:center;">Previous</a>
										</div>
										<div class="col-md-6" style="padding:0px;">
											<a href="#" class="theme-btn btn-style-four btn-sm bg-2 next"  onclick="tab_click(3)" style="font-style: normal;border:2px solid#da200b !Important;float:right;width: 100px;text-align:center;">
											Next</a>
										</div>
									</div>
								</div>
					
					</div>					
					<div id="d3" class ="d" style="display:none">
					  <div class="clearfix" id="padding-form">
										
										<p style="margin:0px;text-transform: uppercase;font-size: 18px;" id="remove2"><label>Repairing Detail</label></p>
										<h2 id="mobile-des24">Your Phone Repairing Detail</h2>
				    							<div class="col-md-12" style="padding:0px;">
				    								<p style="margin:0px;margin-top:10px;" id="remove1"><label>Device Brand*</label></p>
							                        <select name="drpBrand" id="soum_prod_subcat" class="form-control" style="width:100%;margin-bottom:10px;" onchange="fill2(this.value);" >
														<option selected="selected" value="">--Select Brand*--</option>
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
												<div class="col-md-12" style="padding:0px;margin-top:20px;display:none" id="branddiv">
											 	<input name="otherbrand" id="otherbrand" placeholder="Brand Name" class="form-control" style="margin-bottom:10px;"/>
											 	</div>

												<div class="col-md-12" style="padding:0px;" id="modeldiv1">
													<p style="margin:0px;margin-top:10px;" id="remove1"><label>Device Model*</label></p>
													<div id="name_loader"></div>
							                        <select name="drpModel" id="soum_prod_subsubcat" class="form-control" style="width:100%;margin-bottom:10px;" onchange="modal(this);" >
							                        	<option selected="selected" value="">--Select Model*--</option>
													</select>
												</div>
												<div class="col-md-12" style="padding:0px;margin-top:20px;display:none" id="modeldiv2">
											 	<input name="othermodel" id="othermodel" placeholder="Model Name" class="form-control"/>
											 	</div>

												<div class="col-md-12" style="padding:0px;width:100%;float:left;">
													<p style="margin:0px;margin-top:10px;" id="remove1"><label>Select Problem*</label></p>
													<div style="width:100%;float:left;">
														<label style="margin-right: 10px;font-weight: 500;color: #6b6969;"><input type="checkbox" name="ptype[]" value="1" style="width:auto;">&nbsp; Network</label>
														<label style="margin-right: 10px;font-weight: 500;color: #6b6969;"><input type="checkbox" name="ptype[]" value="2" style="width:auto;">&nbsp; Display</label>
														<label style="margin-right: 10px;font-weight: 500;color: #6b6969;"><input type="checkbox" name="ptype[]" value="3" style="width:auto;">&nbsp; Display Break</label>
														<label style="margin-right: 10px;font-weight: 500;color: #6b6969;"><input type="checkbox" name="ptype[]" value="4" style="width:auto;">&nbsp; Speeker</label>
														<label style="margin-right: 10px;font-weight: 500;color: #6b6969;"><input type="checkbox" name="ptype[]" value="5" style="width:auto;">&nbsp; Charging</label>
														<label style="margin-right: 10px;font-weight: 500;color: #6b6969;"><input type="checkbox" name="ptype[]" value="6" style="width:auto;">&nbsp; Touch</label>
													</div>
												</div>
										
												<div class="col-md-12" style="padding:0px;display:none" id="pic">
													 <p style="margin-top:10px;text-align:left;" id="remove1">Upload Image of Mobile<span class="red-text">*</span></p>
													 <input type="file" name="fileToUpload1" style="border: 1px solid#ddd;width: 100%;padding: 7px;"/>
											 	</div>
											 	
											 	<div class="col-md-12" style="padding:0px;margin-top:20px;width:100%;float:left;">
											 	<textarea name="description" rows="3" cols="20" id="desc" placeholder="Here you could explain specific issue of your phone or anything which you would like to share" class="form-control"></textarea>
											 	</div>
										
									<div class="col-md-12" style="padding:0px;margin-top:15px;">
										<div class="col-md-6" style="padding:0px;">
											<a href="#" class="theme-btn btn-style-four btn-sm bg-2" onclick="tab_click(2)" style="font-style: normal;border:2px solid#da200b !Important;float:left;min-width: 100px;text-align:center;">Previous</a>
										</div>
										<div class="col-md-6" style="padding:0px;">
											<input type="submit" value="Submit" class="theme-btn btn-style-four btn-sm bg-2" style="font-style: normal;border:2px solid#da200b !Important;float:right;width: 100px;text-align:center;">
										</div>
									</div>
									
								</div>
					</div>
					</div>
				</div>
					</form>
					</div>
					</div>
				</div>
                
                	
                	
                      
                        
                    </div>
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
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
$("#fname").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});

jQuery(function($){

   $("#mobile_no").mask("9 9 9 9 9 9 9 9 9 9",{placeholder:"__________"});
   

});


</script>
<script>
$("document").ready(function()
{
   var mob=localStorage.getItem("mobile");
	if(mob!=null)
	{
		client(mob);
		
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
$('#name_loader').html("<img src='upload/loader.gif' width='30' height='30'>");
	$.ajax({
		type:"Post",
		url:"fill3.php",
		data:"param="+bid,
		success:function(html) 
		{
		    $('#name_loader').html(""); 
            $('#soum_prod_subsubcat').show();
			$("#soum_prod_subsubcat").html(html);
		}
	}); 
}
function modal(item)
{
       var val=item.value;
       if(val==0)
       {
       $("#modeldiv2").show();
       }
       else
       {
       $("#modeldiv2").hide();
       $("#othermodel").val('');
       }
       
       $.ajax({
          
           type:"POST",
           url:"prod_detail.php",
           data:"id="+val,
           
           success:function(data)
           {
            $("#prod_specf").html(data);
           }
       
       });
       
}
function problem(val)
{
 if(val==2 || val==3 || val==6)
  {
    $("#pic").show();
  }
  else
  {
  	$("#pic").hide();
  }
}
function client(mob)
{
   $.getJSON('client.php?callback=?','mob='+mob+'&act=client', function(data){
		if(data)
		{ 		  
		  $.each(data,function(i,element){
		     
		      $('#fname').val(element.fname);
		      $('#mobile_no').val(element.mobile);
			  $('#email').val(element.email);           
	         $('#adress').val(element.address);
	         $('#city').val(element.city);
	         $('#state').val(element.state);
       
          });
        } 
     });    
}

function valid1()
{

   var name=$("#fname").val();
   var email=$("#email").val();
   var mob=$("#mobile_no").val();
   
   if(name=='')
   {
      alert("Please Name must be filled");	   
	  return false;
   }
   
   if(email=='')
   {
      alert("Please email must be filled");      
	  return false;
   }   
   
   if(mob=='')
   {
      alert("Please Mobile must be filled");
	  return false;
   }
  return true;
}

function valid2()
{
   var state=$("#state").val();
   var city=$("#city").val();
   var adress=$("#adress").val();
   
   if(adress=='')
   {
      alert("Please Address must be filled");	  
	  return false;
   }
   if(state=='')
   {
      alert("Please State must be filled");	   
	  return false;
   }
    if(city=='')
   {
      alert("Please City must be filled");	    
	  return false;
   }

  return true;
}

function valid3()
{
    var brand=$("#soum_prod_subcat").val();
	var model=$("#soum_prod_subsubcat").val();
	
	var otherbrnad=$("#otherbrand").val();
	var othermodel=$("#othermodel").val();
	
	var ptype=$("#drpBrand").val();
	var desc=$("#desc").val();
	
	 if(brand=='')
    {
	    if (model=="")
	    {
	    	alert("Please select the model first!");
	    	return false;
	    }
	   
	    	
    }
    else if(brand!=0 && model=='')
    {
	    if (model=="")
	    {
	    	alert("Please select the model first!");
	    	return false;
	    }
	   
	    	
    }
    else if(brand==0)
    {
       if (otherbrnad=="")
	    {
	    	alert("Please fill the Brand first!");
	    	return false;
	    }
	    if (othermodel=="")
	    {
	    	alert("Please fill the model first!");
	    	return false;
	    }

       
      
    }   
    else if(model==0)
    {
       
	    if (othermodel=="")
	    {
	    	alert("Please fill the model first!");
	    	return false;
	    }

        
      
    } 
     
     
     
	 if(ptype=='')
	 {
	   alert("Problem type must be selected");
	   return false;
	 }
	if(desc=='')
	 {
	   alert("Description must be fill");
	   return false;
	 }

  return true;
}

</script>



<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
<link href="css/multi_level_form_css.css" rel="stylesheet" type="text/css"/>
	<script src="admin/scripts/plugins/select2.min.js"></script>
	<script src="aadmin/scripts/form-elements.init.js"></script>
	
<style>
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    counter-reset: step;
    width: 360px;
    margin: auto;
}
#progressbar li {
    list-style-type: none;
    color: #000;
    text-transform: none;
    font-size: 13px;
    width: 33.33%;
    float: left;
    position: relative;
    z-index: 9;
	font-weight: 600;
	font-family: 'Robto', sans-serif;
}
#progressbar li.active::before, #progressbar li.active::after {
    background: #E92438;
    color: white;
    margin-right:43px;
}
#progressbar li::before {
    content: counter(step);
    counter-increment: step;
    width: 40px;
    line-height: 40px;
    display: block;
    font-size: 19px;
    color: #333;
    background: white;
    margin: 0 auto 5px auto;
    border-radius: 100px;
}
#progressbar li:after {
    content: '';
    width: 100%;
    height: 8px;
    background: #d7d7d7;
    position: absolute;
    left: -36%;
    top: 16px;
    z-index: -1;
}
#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 40px;
    line-height: 40px;
    display: block;
    font-size: 19px;
    color: #333;
    background: #d7d7d7;
    margin: 0 auto 5px auto;
    border-radius: 100px;
}
@media(max-width:650px){
	#progressbar li.active::before, #progressbar li.active::after { margin-right: 38px !important;}
}

</style>	
</body>
</html>