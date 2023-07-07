<?php include("../config2.php");?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Materia - Admin Template">
	<meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
	<meta name="author" content="solutionportal">
	<!-- <base href="/"> -->

	<title>Admin Dashboard</title>
	
	<!-- Icons -->
	<link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="styles/plugins/waves.css">
	<link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">
	<link rel="stylesheet" href="styles/plugins/select2.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-slider.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-datepicker.css">
	<link rel="stylesheet" href="styles/plugins/summernote.css">
	
	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/main.min.css">


	 
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>

	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]--> 

	
<style>
.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  list-style: none;
  font-size: 14px;
  text-align: left;
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border: 1px solid #eeeeee;
  border-radius: 2px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  background-clip: padding-box;
}

.table > tbody > tr > td {
	padding-left:6px;
	padding-right:6px;
}
.form-control {
    box-shadow: none;
    -webkit-transition: 0.2s ease-in-out;
    -o-transition: 0.2s ease-in-out;
    transition: 0.2s ease-in-out;
    border: none;
    border-radius: 0 !important;
    border: 1px solid#e0e0e0;
    position: relative;
    overflow: hidden;
    margin-bottom: 7px;
}
.btn_1 {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    -webkit-transition: 0.2s;
    -o-transition: 0.2s;
    transition: 0.2s;
    position: relative;

    color: #ffffff;
    background-color: #3f51b5;
    border-color: #3e4fb1;

    display: inline-block;
    margin-bottom: 0;
    font-weight: normal;
    text-align: center;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 6px 15px;
    font-size: 14px;
    line-height: 1.57142857;
    border-radius: 2px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
</style>
	
</head>
<body id="app" class="app off-canvas">
	<!-- #Start header -->
		<?php include('_header.php');?>
	<!-- #end header -->

	<!-- main-container -->
	<div class="main-container clearfix">
		<!-- main-navigation -->
		<?php include('_left-menu.php');?>
		<!-- #end main-navigation -->

		<!-- content-here -->
		<div class="content-container" id="content">
			<!-- dashboard page -->
			<div class="page page-dashboard">

				<div class="page-wrap">
				
				<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12" style="margin-top:20px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top:0px;">Customer Add</h3>
								</div>
							</div>
						</div>
					</div> <!-- #end row -->


					<div class="row">
						<!-- style three -->
						<div class="col-md-12 mb30">
						<!-- tab style -->
							

							<div class="col-md-6" style="margin:auto;float:none">
							<div style="width:100%;float:left;background:#fff;padding:10px;">
							<div style="width:100%;float:left;background:#fff;padding:0px 10px;">
							<form name="myForm" action="walking_save.php" method="post" onsubmit="return validateForm()" style="width:100%;float:left;margin-top:20px;">
					<input type="hidden" name="cid" id="cid" />
					
					
					<div class="col-md-6" style="margin-bottom:0px">
						<label class="labelTop">ame: <span class="require">*</span></label>
						<input value="<?=$name;?>" class="form-control" placeholder="Name" name="name1" id="name1" type="text">
					</div>
					<div class="col-md-6" style="margin-bottom:0px">
						<label class="labelTop">Email Id: <span class="require">
						*</span></label>
						<input value="<?=$email;?>" class="form-control" placeholder="Email" name="email" id="email" type="text">
					</div>
					<div class="clearfix"></div>
				    <div class="col-md-6" style="margin-bottom:0px">
						<label class="labelTop">Mobile No: <span class="require">*</span></label>
						<input value="<?=$mobile;?>" onchange="mainInfo(this.value);" class="form-control" placeholder="Mobile No" name="mobile" id="mobile" type="text">
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12" style="margin-bottom:0px">
						<label class="labelTop">Address: <span class="require">*</span></label>
						<textarea class="form-control" placeholder="Address" name="address" id="address"><?=$address;?></textarea>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-6" style="padding:0px;">
					<div class="cus_info_wrap" style="margin-bottom:0px;padding: 0px 10px;">
						<label class="labelTop">City: <span class="require">*</span></label>
						<input value="<?=$city;?>" class="form-control" placeholder="City" name="city" id="city" type="text">
					</div>
					</div>
					<div class="col-md-6" style="padding:0px;">
					<div class="cus_info_wrap" style="margin-bottom:0px;padding: 0px 10px;">
						<label class="labelTop">Pincod: <span class="require">*</span></label>
						<input value="<?=$pincod;?>" class="form-control" placeholder="Pincod" name="pincod" id="pincod" type="text">
					</div>
					</div>
					
					
					<div class="col-md-6" style="padding:0px;">
					<div class="cus_info_wrap" style="margin-bottom:0px;padding: 0px 10px;">
						<label class="labelTop">DOB: <span class="require">*</span></label>
						<div class="input-group date" id="datepickerDemo">
							<input value="<?=$dob;?>" class="form-control" placeholder="DOB" name="dob" id="dob" type="text"/>
							<span class="input-group-addon">
								<i class=" ion ion-calendar"></i>
							</span>
						</div>

					</div>
					</div>
					<div class="col-md-6" style="padding:0px;">
					<div class="cus_info_wrap" style="margin-bottom:0px;padding: 0px 10px;">
						<label class="labelTop">DOA: <span class="require">*</span></label>
						<div class="input-group date" id="datepickerDemo1">
							<input value="<?=$doa;?>" class="form-control" placeholder="DOA" name="doa" id="doa" type="text">
							<span class="input-group-addon">
								<i class=" ion ion-calendar"></i>
							</span>
						</div>
					</div>
					</div>


					
					<div class="col-md-6" style="padding:0px;">
					<div class="cus_info_wrap" style="margin-bottom:0px;padding: 0px 10px;">
						<label class="labelTop">Product: <span class="require">*</span></label>
						<div style="width:100%;float:left;margin-bottom:10px;">
						
	                        <select class="personSelect" onchange="other(this.value);" name="prod_id" id="prod_id" style="width: 100%;padding:8px;border:1px solid#ddd;" data-placeholder="Select a person">
									<option value="">select</option>
									<?php
									
									 $sqlp="select soum_product_master.*,soum_prod_subcat.prod_subcat_desc breand1,soum_prod_subsubcat.prod_subcat_desc model from soum_product_master,soum_prod_subcat,soum_prod_subsubcat
											where soum_product_master.brand=soum_prod_subcat.prod_subcat_id
											and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id";
									  $resp=$db->query($sqlp);
									 while($rowp=$resp->fetch_assoc())
									 {											
									?>
									<option value="<?=$rowp['prod_id'];?>" <?php if($pid==$rowp['prod_id']) echo "Selected";?>><?=$rowp['prod_id']."/".$rowp['brand1']." ".$rowp['model'];?></option>
									<?php } ?>
									<option value="0">other</option>
							</select>
								
							</div>					
							<div  style="width:100%;float:left;margin-bottom:10px;" id="other"></div>
						</div>
					</div>
					
                    <div class="col-md-6" style="padding:0px;">
						<div class="cus_info_wrap" style="margin-bottom:0px;padding: 0px 10px;">
							<label class="labelTop">Amount <span class="require">*</span></label>
							<input  class="form-control" placeholder="Amount" name="amt" id="amt" type="text">
						</div>
					</div>
				
					<div class="col-md-12" style="padding:0px;">
						<div id="external-cart"></div>									
					</div>
					
					<div class="col-md-12" style="padding:0px;">
						<div style="text-align:center">
							<button value="Submit" class="btn btn-primary mr5 waves-effect waves-effect" type="submit" style="width:auto !important;">Submit</button>
						</div>
					</div>
					</form>
								</div>
								</div>
							</div>
							<!-- tab style -->
							
					
						</div>
		
				

					
        

					</div>


				</div> <!-- #end page-wrap -->
			</div>
			<!-- #end dashboard page -->
		</div>

	</div> <!-- #end main-container -->

	<!-- theme settings -->
	<div class="site-settings clearfix hidden-xs">
		<div class="settings clearfix">
			<div class="trigger ion ion-settings left"></div>
			<div class="wrapper left">
				<ul class="list-unstyled other-settings">
					<li class="clearfix mb10">
						<div class="left small">av Horizontal</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox" id="navHorizontal"> 
								<span>&nbsp;</span> 
							</label>
						</div>
						
						
					</li>
					<li class="clearfix mb10">
						<div class="left small">Fixed Header</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="fixedHeader"> 
								<span>&nbsp;</span> 
							</label>
						</div>
					</li>
					<li class="clearfix mb10">
						<div class="left small">av Full</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="navFull"> 
								<span>&nbsp;</span> 
							</label>
						</div>
					</li>
				</ul>
				<hr/>
				<ul class="themes list-unstyled" id="themeColor">
					<li data-theme="theme-zero" class="active"></li>
					<li data-theme="theme-one"></li>
					<li data-theme="theme-two"></li>
					<li data-theme="theme-three"></li>
					<li data-theme="theme-four"></li>
					<li data-theme="theme-five"></li>
					<li data-theme="theme-six"></li>
					<li data-theme="theme-seven"></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- #end theme settings -->

<script src="scripts/jquery.min.js"></script>

<script>

function other(val)
{

   if(val==0 && val!="")
   {
		$("#other").html("<input type='text' name='prod_name' class='form-control' placeholder='Enter Product Name'>");   
   }
   else
   {
   		$("#other").html("");
   }
}


function addtocart()
{	
	       
	   var pid=$("#prod_id").val();	   
	   var qty=$("#qty").val();
	   if(pid=='')
	   {
	      alert('Please select Product');
	      return false;
	   }
	   
	   if(qty=='')
	   {
	      alert('Please fill quantity');
	      return false;
	   }    
	   //alert("pid="+pid+"&qty="+qty);
       $.ajax({
          
           type:"POST",
           url:"../add_to_cart.php",
           data:"pid[]="+pid+"&qty[]="+qty,
           
           success:function(data)
           {
            loadexternalcart();
           }
       
       });

	
}
function loadexternalcart()
{
$.ajax({
    url:"external_cart.php",  
    success:function(data) {
      $('#external-cart').html(data);
    }
  });


}

function remove_item1(i)
{
		

		
		$.getJSON('../remove_item.php?callback=?',"product_id="+i, function(data){ 
			
		if(data==1)
		{
			
			loadexternalcart();
		}	  
			 		
		});
}

function mainInfo(item)
{
   
       $.getJSON('user_info.php?callback=?',"mobile="+item, function(data){ 
       
              $.each(data,function(i,element){
 
               $('#cid').val(element.cust_id);     
               $('#name1').val(element.fname);
               $('#email').val(element.email);
               $('#address').val(element.address);
               $('#city').val(element.city);
               $('#pincod').val(element.pincod);
               
               var db=element.dob;
               var dby= db.substr(0,4);
               var dbm= db.substr(5,2);
               var dbd= db.substr(8,2);
               var dob=dbd+"-"+dbm+"-"+dby;
               
               var da=element.doa;               
               var day= da.substr(0,4);
               var dam= da.substr(5,2);
               var dad= da.substr(8,2);
               var doa=dad+"-"+dam+"-"+day;

               
               $('#dob').val(dob);
               $('#doa').val(doa);
              
              });
       });
       
}
</script>

	

	<!-- Dev only -->
	<!-- Vendors -->
	<script src="scripts/vendors.js"></script>
	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/plugins/select2.min.js"></script>
	<script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
	<script src="scripts/plugins/bootstrap-slider.min.js"></script>
	<script src="scripts/plugins/summernote.min.js"></script>
	<script src="scripts/plugins/bootstrap-datepicker.min.js"></script>
	<script src="scripts/app.js"></script>
	<script src="scripts/form-elements.init.js"></script>



</body>
</html>