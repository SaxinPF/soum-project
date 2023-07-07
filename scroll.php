<?php include('config.php');

$prod_id=$_REQUEST['prod_id'];

$admin=$_SESSION['poster_type'];

if(isset($prod_id))

{

	$sqld="select *,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc as model_name from soum_product_master,soum_prod_subcat,soum_prod_subsubcat where

	soum_product_master.brand=soum_prod_subcat.prod_subcat_id

	and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id

	and  prod_id=$prod_id

	and prod_cat_id=2";

	$resd=$db->query($sqld);

	$rowd=$resd->fetch_assoc();

	$title=$rowd['titile'];

	$brand=$rowd['brand'];

	$modal=$rowd['modal'];

	$brand_name=$rowd['brand_name'];

	$model_name=$rowd['model_name'];

	

	$poster_id=$rowd['poster_id'];

    $poster_type=$rowd['poster_type'];

	

	$other_brand=$rowd['other_brand'];

	$other_model=$rowd['other_model'];

	$desc=$rowd['Constituent'];

	$mrp=$rowd['rate'];

	$eprice=$rowd['appliable_rate'];

	$offerp=$rowd['offer_price'];

	$year=$rowd['year_purchase'];

	$admin_year=$rowd['yearbyadmin'];

    $cat=$rowd['category'];

	$emi=$rowd['imei_no'];

	$condi=$rowd['condi'];

	$condi2=$rowd['condi2'];

	$sourceid=$rowd['source_id'];

	$image1=$rowd['images'];

	$image2=$rowd['images1'];

	$image3=$rowd['images2'];

	$image4=$rowd['seller_img'];

	$image5=$rowd['bill_img'];

	$image6=$rowd['add_proof_img'];

	

	if($image1=='')

	{ 

	  $image1='no_img.png';

	}

	$lat=$rowd['lat'];

    $lng=$rowd['lng'];

    $pin=$rowd['pincode'];

	

}

if(isset($admin))

{

	

	if($admin=='Admin')

	{

	 $sql="select * from soum_master_admin where usr_id=1";

	

	}

	

	//echo $sql;

	//die();

	$res=$db->query($sql);

	$row=$res->fetch_assoc();

	

	$name=$row['fname'];

	$email=$row['email'];

	$address=$row['address'];

	$city=$row['city'];

	$mobile=$row['mobile'];

	$pincod=$row['pincod'];

}

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

<link href="css/multi_level_form_css.css" rel="stylesheet" type="text/css"/>

<style>

.table-shopping-cart td {

	border:1px solid#ddd;

	padding:10px;

}

label {

    display: inline-block;

    max-width: 100%;

    margin-top: 10px;

    font-weight: 700;

}

.select-wrapper {

  /*background: #dcf9ff url('images/plus-icon.png') no-repeat;*/

  background:rgba(220, 249, 255, 0.2) url('images/plus-icon.png') no-repeat;

  background-size:31px 30px;

  background-position:center center;

	display: block;

	position: relative;

	width: 100%;

	height: 80px;

	border: 1px dashed#ababab;

	position:relative;

	z-index: 9;

}

#select-img1 {

    background-repeat: no-repeat;

    background-size: auto 100%;

    background-position: center center;

    position: absolute;

	width:100%;

    /*

    width: 50px;

    height: 63px;

    right: 10px;

    top: 8%;*/

    overflow:hidden;

}

.select-img1 {

    background-repeat: no-repeat;

    background-size: auto 100%;

    background-position: center center;

    position: absolute;

	width:100%;

    /*

    width: 50px;

    height: 63px;

    right: 10px;

    top: 8%;*/

    overflow:hidden;

}

#fileToUpload4{

  width: 26px;

  height: 26px;

  opacity: 0;

  filter: alpha(opacity=0); /* IE 5-7 */

}

#fileToUpload5{

  width: 26px;

  height: 26px;

  opacity: 0;

  filter: alpha(opacity=0); /* IE 5-7 */

}

#fileToUpload6{

  width: 26px;

  height: 26px;

  opacity: 0;

  filter: alpha(opacity=0); /* IE 5-7 */

}

#fileToUpload7{

  width: 26px;

  height: 26px;

  opacity: 0;

  filter: alpha(opacity=0); /* IE 5-7 */

}

#fileToUpload8{

  width: 26px;

  height: 26px;

  opacity: 0;

  filter: alpha(opacity=0); /* IE 5-7 */

}

#fileToUpload1 {

  width: 26px;

  height: 26px;

  opacity: 0;

  filter: alpha(opacity=0); /* IE 5-7 */

}

#fileToUpload2 {

  width: 26px;

  height: 26px;

  opacity: 0;

  filter: alpha(opacity=0); /* IE 5-7 */

}

#fileToUpload3 {

  width: 26px;

  height: 26px;

  opacity: 0;

  filter: alpha(opacity=0); /* IE 5-7 */

}

#info-bg{

	color:#FF6600;font-size:34px;	

}

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

.bg-3{

    background-color: #484848 ;

	border: 2px solid #484848 !important;

	font-size: 15px !important;

	padding: 5px 15px !important;

	text-transform: unset !important;

	float: left inherit !important;

	left: auto;

	right: auto;

	top: auto;

}

.bg-3:hover{

	background-color:#fff !important;

}





.cat-imagebox, .frame-round {

  background: #fff;

  border: 2px solid #000;

  display: inline-block;

  vertical-align: top;

  padding: 10px;

  height: 64px;

  margin-right: .5em;

  margin-bottom: .3em;

	width:91px;

	float: left;

	margin-right: 1%;

	margin-bottom: 15px;

	border: 1px solid #b3b3b3;

background: #fff;

box-shadow: 3px 3px 3px -4px;

}



.frame-round {

  border-radius: 50%;

  overflow: hidden;

}

.frame-round .crop {

  border-radius: 50%;

}



.crop {

  height: 100%;

  overflow: hidden;

  position: relative;

}

/*.crop img {

  display: block;

  min-width: 100%;

  min-height: 100%;

  margin: auto;

  position: absolute;

  top: -100%;

  right: -100%;

  bottom: -100%;

  left: -100%;

}*/

.crop img {

    display: block;

    min-width: 100%;

 	min-height: 100%;

    max-width: 100%;

    max-height: 100%;

    margin: auto;

    position: absolute;

    top: -100%;

    right: -100%;

    bottom: -100%;

    left: -100%;

}





.retina .crop img {

  transform: scale(0.5, 0.5);

}



small {

  display: block;

  font-weight: normal;

  opacity: .8;

}





</style>

</head>

<body>

<div class="page-wrapper" style="background:#f7f7f7">

 	

    <!-- Preloader -->

    <div class="preloader"></div>

    

 	<header class="header-style-two">

		<?php include('_header.php');?>        

    </header>

    <!-- Main Header -->

    

    <!--End Main Header -->

    

    

    <!--Feature Section-->

<section class="welcome-section pb-70" style="padding-top: 20px">

	<div class="auto-container">

		<div class="row clearfix">

			<div class="row">

				

				<div class="column col-md-12 col-sm-12 col-xs-12" style="text-align:center;margin-bottom:20px;">

                    <h1 style="line-height: 1;margin-top: 8px;text-align:center;">SALE YOUR <span style="color:#000;font-weight: 800;">USED MOBILE</span> PHONES</h1>

                    <h3 style="font-family: inherit;">IN 3 EASY STEPS</h3>

                    

                    <div style="width:100%;float:left;padding:30px 15px;">

	                  <ul id="progressbar">

						    <li class="active"><span style="margin-right:33px;">Step1</span></li>

						    <li id="st2">Step2</li>

						    <li id="st3">Step3 <a name="used">&nbsp;</a></li>

					  </ul>

					 </div>

                </div>

                   

				<div class="col-md-12">

				 <form name="myForm" onsubmit="return validateForm()" method="post" action="submit_ad_save.php">

				   <input name="drpBrand" id="drpBrand" value="<?=$brand;?>" type="hidden" />

                   <input name="drpModel" id="drpModel" value="<?=$modal;?>" type="hidden" />

                   <input name="poster_id" id="poster_id" value="<?=$poster_id;?>" type="hidden" />

                    <input name="prod_id" id="prod_id" value="<?=$prod_id;?>" type="hidden" />

                     <input name="price" id="price"  type="hidden" />

					<div class="clearfix">

					   <ul class="nav nav-tabs" style="display:none">

							<li class="active"><a href="#tab-flip-one" onclick="$('#cl1').addClass('active');$('#cl2').removeClass('active');$('#cl3').removeClass('active'); $('#st2').removeClass('active'); $('#st3').removeClass('active');" data-toggle="tab"><span id="one"></span>Choose Your Phone</a></li>

							<li><a href="#tab-flip-two" onclick="$('#cl2').addClass('active');$('#cl1').removeClass('active');$('#cl3').removeClass('active'); $('#st2').addClass('active'); $('#st3').removeClass('active');;" data-toggle="tab"><span id="two"></span>Add Mobile(s) </a></li>

							<li><a href="#tab-flip-three" onclick=" $('#cl3').addClass('active');$('#cl2').removeClass('active'); $('#st3').addClass('active');" data-toggle="tab"><span id="three"></span>Saller Information</a></li>

						</ul> 

						<ul class="nav nav-tabs">

							<li class="active" id="cl1"><a href="#tab-flip-one1"  data-toggle="tab"><span id="one1"></span>Choose Your Phone</a></li>

							<li id="cl2"><a href="#tab-flip-two1" onclick="second()" data-toggle="tab"><span id="two1"></span>Add Mobile(s)</a></li>

							<li id="cl3"><a href="#tab-flip-three1" onclick="third()"  data-toggle="tab"><span id="three1"></span>Seller Information</a></li>

						</ul>

                      

						<div class="tab-content" style="background:#fff;box-shadow: 1px 2px 6px -3px;border-bottom: 1px solid #ddd;">

							

							<div class="tab-pane active" id="tab-flip-one">

								<div class="clearfix" style="padding:20px;">

									<div class="clearfix">

										

										<div class="col-md-12" style="padding:13px;float:left;width:100%;background: #ddd;">

										

										<div id="branddiv1">

										<?php

											$sql="select * from soum_prod_subcat order by prod_subcat_id desc";

											$res=$db->query($sql);

											while($row=$res->fetch_assoc())

											{

												$prod_subcat=$row['prod_subcat_desc'];

												$prod_subcat_id=$row['prod_subcat_id'];					

												$img=$row['home_logo'];					

											?>

											<div class="cat-imagebox" id="brand<?=$prod_subcat_id;?>" onclick="fill2(<?=$prod_subcat_id;?>);">

												<div class="crop">

												<img src="upload/c_logo/<?=$img;?>">

												</div>

											</div>

										<?php } ?>

										</div>

								

										

										

									</div>	

									</div>

									

									

								</div>

							</div>

							

							

							

						

						<!---------------------canvas upload image start -->

						

                    <script>

                    function abc1(popid)

                    {

                   

					    var canvas = document.getElementById('myCanvas');

					    var context = canvas.getContext('2d');

					

					   

					   

					

					  

					    context.closePath();

					    context.lineWidth = 5;

					    context.fillStyle = '#8ED6FF';

					    context.fill();

					    context.strokeStyle = 'blue';

					    context.stroke();

					    var dataURL = canvas.toDataURL("image/jpeg",1);

					    saveImage(dataURL, popid);

					   }

					</script>

                    </div>

                    <!---------------------canvas upload image end -->

						 

						

						</div>	

										

					</div>

					</form>	

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

<link href="css/multi_level_form_css.css" rel="stylesheet" type="text/css"/>

<!--Scroll to top-->

<style>

#progressbar {

    margin-bottom: 30px;

    overflow: hidden;

    counter-reset: step;

    width: 399px;

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

    font-weight: bold;

    font-family: inherit;

}

#progressbar li.active::before, #progressbar li.active::after {

    background: #E92438;

    color: white;

    margin-right:63px;

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

    left: -47%;

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

</style>

<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper"><span class="fa fa-long-arrow-up"></span></div>

<script src="js/jquery.js"></script> 

<script src="js/bootstrap.min.js"></script>







<script src="js/owl.js"></script>

<script src="js/wow.js"></script>

<script src="js/script.js"></script>

<script src="js/jquery.min.js" type="text/javascript"></script>

<script>



function bill(val)

{

  if(val==2)

   {

     $("#billdate").show();

   }

   else

   {

     $("#billdate").hide();

   }



   

}



var modal='';

var id='';

var type="<?=$_SESSION['poster_type'];?>";

$("document").ready(function(){

 id='<?=$brand;?>';

 modal='<?=$modal;?>';

	

	if(type=='Admin')

	{

	   $("#fbtn").show();

	}

	

	

	if(id!=='')

	{

	  fill2(id,modal);	 	 

	  

	}

	

	

	if(modal>='0' && id!='0')

	{

	   model1(modal,0);	 

	  

	}

	

	

var mob=localStorage.getItem("mobile");

if(mob!=null)

{

	client(mob);

	

}

});

function chk(val)

{

    if(val==1)

    {

      $("#r1").prop("checked", true);

      $("#r2").prop("checked", false);

       $("#r3").prop("checked", false);    

    }

    if(val==2)

    {

      $("#r2").prop("checked", true);

      $("#r1").prop("checked", false);

       $("#r3").prop("checked", false);    

    }

    if(val==3)

    {

      $("#r3").prop("checked", true);

      $("#r2").prop("checked", false);

       $("#r1").prop("checked", false);    

    }

}

function exp_price(date)

{

    var val;

    var price=$("#price").val(); 

    if(date<=6)

    {

      val=price*20/100;

    }

    else if(date>6 && date<=12)

    {

      val=price*40/100;

    }

    else if(date>12 && date<2)

    {

      val=price*60/100;

    }

    else if(date>2)

    {

      val=price*80/100;

    }

 

    

    $('#expprice').html("Rs. "+(price-val));

}

function fill2(p,m)

{	

   //alert(p+"="+m);

   $("#branddiv1").hide();

   $("#branddiv2").show();

   $('#drpBrand').val(p);

   $('#drpModel').val(m);

   

     $('#brand1'+p).addClass('cat-imagebox1');

    

        if(p==0)

        {

         $("#fbtn").show();

        

           $("#model").html('<div class="col-md-4"><input name="devicebrand" id="devicebrand" value="<?=$other_brand;?>" placeholder="Enter Brand Name" class="form-control" type="text"/></div> <div class="col-md-4"><input name="devicemodal" id="devicemodal" placeholder="Enter Model Name" value="<?=$other_model;?>" class="form-control" type="text"/></div>');   

             if(type=='Admin')

             {

               model2();

             }  

             return false;

        }

       if(m==0)

       {

        return false;

       }

      

    

    $.getJSON('fill.php?callback=?','id='+p, function(data){

   

		if(data)

		{ 

		  var tab='';

		  var class1;

		  $.each(data,function(i,element){

		  

		    if(element.prod_subsubcat_id==m)

		    {

		     class1='cat-imagebox1';

		    }

		      

		    tab+='<div class="col-md-2" style="padding-left:0px;text-align:center;margin-bottom:10px" onclick="model1('+element.prod_subsubcat_id+','+element.price+')">';

			tab+='<div style="width:100%;float:left;background-color:#fff;box-shadow: 3px 3px 3px -3px;border-radius: 3px;height:210px;padding: 15px 0px;font-size: 12px;border: 1px solid #fff;" class="'+class1+'">';

			tab+='<div style="width:100%;float:left;text-align:center;margin-bottom:10px;"><img src="upload/thumb/'+element.p_img1+'" style="max-height:100%;max-width:90%;height:130px;width:auto;"></div>';

			tab+='<div style="width:100%;float:left;text-align:center;font-weight:bold;">'+element.prod_subcat_desc+'</div>';

			tab+='</div></div>';

		    

		  });

		  

		    tab+='<div class="col-md-2" style="padding-left:0px;text-align:center;margin-bottom:10px" onclick="model1(0,0)">';

			tab+='<div style="width:100%;float:left;background-color:#fff;box-shadow: 3px 3px 3px -3px;border-radius: 3px;height:210px;padding: 15px 0px;font-size: 12px;border: 1px solid #fff;">';

			tab+='<div style="width:100%;float:left;text-align:center;margin-bottom:10px;"><img src="upload/thumb/b16.jpg" style="max-height:100%;max-width:90%;height:130px;width:auto;"></div>';

			tab+='<div style="width:100%;float:left;text-align:center;font-weight:bold;">Other</div>';

			tab+='</div></div>';

		  

		}

		else

		{

		

		}

		

		$("#model").html(tab);

	

	});

	

}

function model1(id,price)

{

   $('#drpModel').val(id);

   $('#price').val(price);

   

           

           if(id!=0)

           {

             second();  

           }

      		if(id==0)

      		 {

      		      $("#fbtn").show();    

	              $("#model").html('<div class="col-md-4"><input name="devicemodal" id="devicemodal" placeholder="Enter Model Name" value="<?=$other_model;?>" class="form-control" type="text"/></div>');   

	            

		             if(type=='Admin')

		             {

		               model2();

		              

		             }  

	             

	                 return false;

       		 }

   

   

  

    $.ajax({

          

           type:"POST",

           url:'prod_detail.php',

           data:"id="+id,

           

           success:function(data)

           {

            $("#detail").html(data);

            var b=$("#bname").val();            

            var m=$("#mname").val();

            $("#bmname").html(b+" > "+m);



           }

       

       });

}

function model2()

{

  //alert(id);

    $.ajax({

          

           type:"POST",

           url:'prod_detail2.php',

           data:"id="+id,

           

           success:function(data)

           {

            $("#detail").html(data);

           }

       

       });

}

function client(mob)

{

   $.getJSON('client.php?callback=?','mob='+mob+'&act=client', function(data){

		if(data)

		{ 		  

		  $.each(data,function(i,element){

		      $('#poster_id').val(element.cust_id);

		      $('#fname').val(element.fname);

		      $('#mobile').val(element.mobile);

			  $('#email').val(element.email);

              $('#address').val(element.address);

              $('#city').val(element.city);

              $('#pincode').val(element.pincod);

	

       

          });

        } 

     });    

}

function second()

{

 var brand=$('#drpBrand').val();

  var model=$('#drpModel').val();

  var dbrand=$('#devicebrand').val();

   var dmodel=$('#devicemodal').val();

   

   

   if(brand=='0' && (model=='' || model=='0'))

   {

   

     if(dbrand=='')

	  {

	   alert('Brand name must be fill');

	   return false;

	  }   

	  

	   if(dmodel=='')

	  {

	   alert('Modal name must be fill');

	   return false;

	  }

   }

   else if(brand>'0' && model=='0')

   {

    

      

		        if(dmodel=='')

	            {

		           alert('Modal name must be fill');

			   		return false;

		         }

		        

	  

   }

   else if(brand=='' || model=='')

   {

	  if(brand=='')

	  {

	   alert('Brand must be selected');

	   return false;

	  }

	  

	  if(model==0)

	  {

	   alert('Modal must be selected');

	   return false;

	  }

   }

 

   $('#two').trigger('click');

   $('#st2').addClass('active');

  

}

function third()

{

  var year=$('#year').val();

  var debugConsole1=$('#debugConsole1').val();

  var debugConsole2=$('#debugConsole2').val();

  var debugConsole3=$('#debugConsole3').val();

  var price=$('#txt_expected_price').val();

  var imi=$('#txt_imi_no').val();

  var desc=$('#desc').val();

 

 

  if(year=='')

  {  

    //alert('How old is your device must be filled');

    //return false;

  }

  

  if(debugConsole1=='')

  {  

    alert('first image must be selected');

    return false;

  }

  

  if(debugConsole2=='')

  {  

    alert('Second image must be selected');

    return false;

  }

  

  

  if(debugConsole3=='')

  {  

    alert('Third image must be selected');

    return false;

  }

  

  if(price=='')

  {  

    alert('Expected Price must be fill');

    return false;

  } 

  

  $('#three').trigger('click');

  $('#st3').addClass('active');

}

function validateForm()

{

 var brand=$('#drpBrand').val();

  var model=$('#drpModel').val();

  var dbrand=$('#devicebrand').val();

   var dmodel=$('#devicemodal').val();

   

   

   if(brand=='0' && (model=='' || model=='0'))

   {

   

     if(dbrand=='')

	  {

	   alert('Brand name must be fill');

	   return false;

	  }   

	  

	   if(dmodel=='')

	  {

	   alert('Modal name must be fill');

	   return false;

	  }

   }

   else if(brand>'0' && model=='0')

   {



      

		        if(dmodel=='')

	            {

		           alert('Modal name must be fill');

			   		return false;

		         }

		        

	  

   }

   else if(brand=='' && model=='')

   {

	  if(brand=='')

	  {

	   alert('Brand must be selected');

	   return false;

	  }

	  

	  if(model==0)

	  {

	   alert('Modal must be selected');

	   return false;

	  }

   }

 



var year=$('#year').val();

  var debugConsole1=$('#debugConsole1').val();

  var debugConsole2=$('#debugConsole2').val();

  var debugConsole3=$('#debugConsole3').val();

  var price=$('#txt_expected_price').val();

  var imi=$('#txt_imi_no').val();

  var desc=$('#desc').val();

 

 

  if(year=='')

  {  

    //alert('How old is your device must be filled');

    //return false;

  }

  

  if(debugConsole1=='')

  {  

    alert('first image must be selected');

    return false;

  }

  

  if(debugConsole2=='')

  {  

    alert('Second image must be selected');

    return false;

  }

  

  

  if(debugConsole3=='')

  {  

    alert('Third image must be selected');

    return false;

  }

  

  if(price=='')

  {  

    alert('Expected Price must be fill');

    return false;

  } 



var mobile=$('#mobile').val();

var name=$('#fname').val();

var email=$('#email').val();

var add=$('#address').val();

var city=$('#city').val();

var pincod=$('#pincod').val();

var debugConsole4=$('#debugConsole4').val();

  var debugConsole5=$('#debugConsole5').val();

  var debugConsole6=$('#debugConsole6').val();

if(mobile=='')

  {  

    alert('Mobile must be filled');

    return false;

  }

  

if(name=='')

  {  

    alert('Name must be filled');

    return false;

  }

  if(email=='')

  {  

    alert('Email must be filled');

    return false;

  }

  

  

  if(add=='')

  {  

    alert('Address must be filled');

    return false;

  }

if(city=='')

  {  

    alert('City must be filled');

    return false;

  }

if(pincode=='')

  {  

    alert('Pincode must be filled');

    return false;

  }

  

  

  if(debugConsole4=='')

  {  

    alert('Seller Photo must be selected');

    return false;

  }

  

  if(debugConsole5=='')

  {  

    alert('Seller Identity must be selected');

    return false;

  }

  

  

  if(debugConsole6=='')

  {  

    alert('Copy of Mobile Bill must be selected');

    return false;

  }

}

</script>

<script type="text/javascript">    

function abc(x,popid)

{

 	var file = x.files[0];

    window.URL = window.URL || window.webkitURL;

    var blobURL = window.URL.createObjectURL(file);

	$("#popid").val(popid);

	$("#scream").one("load", function() {

	

		var img = document.getElementById("scream");

		var c_width 	= img.clientWidth;

		var c_height 	= img.clientHeight;

		var n_width 	= img.naturalWidth;

		var n_height 	= img.naturalHeight;

	    var c = document.getElementById("myCanvas");

	    var ctx = c.getContext("2d");

	    c.height = 480;

	    diff_per=480/n_height*100;

	    c.width=n_width*diff_per/100;

	    ctx.drawImage(img, 0, 0,n_width, n_height,0,0,c.width,c.height);

		var myCanvas = document.getElementById("myCanvas");

		var canvasData = myCanvas.toDataURL("image/jpeg",1);

		var debugConsole= document.getElementById("debugConsole"+popid);

		//alert(popid);

	    abc1(popid);

    }).attr("src", blobURL);

    

    

}

function saveImage(dataURL, popid)

{

    $('#previewing'+popid).attr('src','upload/loader.gif');

	$.ajax({

	  type: "POST",

	  url: "script.php",

	  data: { 

	     imgBase64: dataURL,

	     popid: popid

	  }

	}).done(function(o) {

	  $('#debugConsole'+popid).val(o); 

	   $('#previewing'+popid).attr('src','upload/'+o);

	});

}

</script>

</body>

</html>