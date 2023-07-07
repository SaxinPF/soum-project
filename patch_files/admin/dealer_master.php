<?php include('../config2.php');?>
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

	.form-control {

	border:1px solid#ddd;

	}

	.link {

    padding: 5px 8px;

    border-radius: 2px;

    margin-left: 5px;

    background-color: #787878;

    border-color: #898989;

    color: #fff;

}
.select-wrapper {
    background:url('../images/plus-icon.png') no-repeat;
    background-size: 31px 30px;
    background-position: center center;
    display: block;
    position: relative;
    width: 100%;
    height: 80px;
    border: 1px dashed#ddd;
    position: relative;
}
#fileToUpload1 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}

	</style>
	<script src="scripts/jquery.min.js"></script>
	<script>
		$(document).ready(function (e) {
// Function to preview image after validation
$(function() {
$("#fileToUpload1").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','../../images/card_img/NoImage.gif');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};
});
</script>
<script>
function validateForm() {
    var x = document.forms["myForm"]["name1"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
    
    var mob=$("#mobile").val();
  if(mob=='')
  {
   alert('Mobile number must be'); 
   return false;
  }
  
  
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

	
	
    var x = document.forms["myForm"]["email"].value;
    if(x!='')
    {
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
    }
    var x = document.forms["myForm"]["address"].value;
    if (x == "") {
        alert("Address must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["city"].value;
    if (x == "") {
        alert("City must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["pincod"].value;
    if (x == "") {
        alert("Pincode must be filled out");
        return false;
    }
        
    
    
	
    var x = document.forms["myForm"]["pwd"].value;
    if (x == "") {
        alert("Password must be filled out");
        return false;
    }
}
</script>
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
									<h4 class="mb5 text-light">Dealer Master</h4>
								</div>
							</div>
						</div>
					</div> <!-- #end row -->
					<?php 
					$act=$_REQUEST['act'];
					if(isset($_REQUEST['dealer']))
					{
					/*$poster_id=$_REQUEST['dealer'];
					$sql="select * from soum_master_dealer where cust_id=$poster_id";
					$res=$db->query($sql);*/
					 
					/** BOF Security Patch IS-002*/
					$poster_id=mysqli_real_escape_string($db,$_REQUEST['dealer']);
					$dealerM=$db->prepare('select * from soum_master_dealer where cust_id=?');
					$dealerM->bind_param('i', $poster_id); 
					$dealerM->execute();
					$res=$dealerM->get_result();
					/** EOF Security Patch IS-002*/
					
					 //$sql="select * from soum_offer where offer_id=$offerid";
					 //$sql="select * from soum_master_customer where cust_id=$poster_id";
					 
					 
					 while($row=$res->fetch_assoc())
					 {
						$name=$row['fname'];
						$email=$row['email'];
						$address=$row['address'];
						$city=$row['city'];
						$mobile=$row['mobile'];
						$pincod=$row['pincod'];
						$pwd=$row['user_pass'];
						$image=$row['image'];

                     }
					}					
					?>
					
					
					 <?php if($act=='add' || $act=='edit' || $act=='del'){?>
					<div class="row" id="form_offer">
						<!-- dashboard header -->
						<form method="post" action="dealer_master_act.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
						<div class="col-md-6" style="margin:auto;float:none;">
							<div class="dash-head clearfix mb20">
							
										<input type="hidden" name="poster_id" value="<?=$poster_id;?>"/>
										<input name="act" type="hidden" value="<?=$act?>"/>
										
									<div class="col-md-6" style="margin-top:10px;">
										<label>Name <span class="require">*</span></label>
										<input value="<?=$name;?>" class="form-control" placeholder="Name" name="name1" id="name1" type="text">
									</div>
									<div class="col-md-6" style="margin-top:10px;">
										<label>Mobile No <span class="require">*</span></label>
										<input value="<?=$mobile;?>" class="form-control" placeholder="Mobile No" name="mobile" id="mobile" type="text">
									</div>
									
									<div class="col-md-12" style="margin-top:10px;">
										<label>Address <span class="require">*</span></label>
										<textarea class="form-control" placeholder="Address" name="address" id="address"><?=$address;?></textarea>
									</div>
									<div class="col-md-6" style="margin-top:10px;">
										<label>City <span class="require">*</span></label>
										<input value="<?=$city;?>" class="form-control" placeholder="City" name="city" id="city" type="text">
									</div>
									<div class="col-md-6" style="margin-top:10px;">
										<label class="labelTop">Pincode <span class="require">*</span></label>
										<input value="<?=$pincod;?>" class="form-control" placeholder="Pincod" name="pincod" id="pincod" type="text">
									</div>
									
									<div class="col-md-6">
										<label>Email Id <span class="require">*</span></label>
										<input value="<?=$email;?>" class="form-control" placeholder="Email" name="email" id="email" type="text">
									</div>
									
									
									 <?php if($act!='edit'){ ?>
									    <div class="col-md-6">
											<label>Password<span class="require">*</span></label>
											<input value=""  class="form-control" placeholder="Password" name="pwd" id="pwd" type="text">
									   </div>	
									<?php } else {?>
										<div class="col-md-6">
										   <a  style="margin-top:25px" class="btn btn-primary mr5 waves-effect" href="update-pwd.php?poster_id=<?=$poster_id;?>&poster_type=Dealer">Change Password</a>
										 </div>
									<?php } ?>
									

									<!---------------------canvas upload image start -->
						<div class="col-md-12" style="display:none;">
						 <img id="scream" height="25" width="21">
				 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image;?></textarea>				   
                    <canvas id="myCanvas"  width="auto" style="border:1px solid #d3d3d3;display:1none">YourbrowserdoesnotsupporttheHTML5canvastag.</canvas>
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
                           <div class="col-md-12" >
							<div class="col-md-4" style="margin-top:10px;">
								<label class="labelTop">Dealer Image <span class="require"></span></label>
								<div style="width:100%;float:left;position:relative;background:#dcf9ff;overflow:hidden;">
								
								<img id="previewing1" src="../upload/profile/<?=$image?>" style="height:80px;width:auto;position:absolute;top:0;left:30px;">
								<span class="select-wrapper"><input type="file" name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"/></span>
								</div>
								<input type="hidden" id="file1" value="<?=$image?>"> 
															
							</div>
							</div>		
									
									
									<div class="col-md-12" style="text-align:center;margin-top:10px;">
									 <?php if($act=='add'){?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="add" id="btn-add">Save</button>
									 <?php } 
									 else if($act=='edit')
									 { ?>
										<button class="btn btn-primary mr5 waves-effect" type="submit" value="edit" id="btn-add">Save</button>
									 
									
									<a href="dealer_master_act.php?poster_id=<?=$poster_id?>&act=del" class="btn btn-primary mr5 waves-effect">Delete</a> 
									 <?php } ?>
									</div>
									
									<p>&nbsp;</p>
							</div>
							
						</div>	
						</form>
					</div>
					<?php } ?>
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height:450px;">
							<?php 
							 $cond="";
						 if($_REQUEST['search']!='')
						 {
						   $search=$_REQUEST['search'];
						   
                           $cond=" and  concat(reg_id,fname,email,address,city,pincod,mobile) like '%$search%'"; 
						 }
						?>
					
												<form method="get"><table style="width:auto;float:right;text-align:right;margin-bottom:10px;"><tr><td><input name="search" value="<?=$_REQUEST['search'];?>" type="text" class="form-control" style="float:right;margin-right:10px;">
												</td><td><button name="Submit1" type="submit" value="Search" class="btn btn-primary mr5 waves-effect" style="float:right;">Search</button></td></tr></table></form>
												
											<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding: 5px;">SNo.</th>
											<th style="padding: 5px;">Date</th>
											<th style="padding: 5px;">Token id</th>
											<th style="padding: 5px;">Name</th>
											<th style="padding: 5px;">Phone No.</th>
											<th style="padding: 5px;">Email Id</th>
											<th style="padding: 5px;">Address</th>
											<th style="padding: 5px;">City</th>
											<th style="padding: 5px;">Pincode</th>
											<th style="padding: 5px;width: 150px;">Action <a href="dealer_master.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:0px 8px;float:right;">[+]</button></a></th>
										</tr>
									</thead>
									<tbody>
									<?php
										
									$num_rec_per_page=10;
									if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
									$i=1+$start_from = ($page-1) * $num_rec_per_page;
									$sql1="select * from soum_master_dealer where 1=1 ".$cond." order by cust_id desc LIMIT $start_from, $num_rec_per_page";
									//echo $sql1;
									$res=$db->query($sql1);
									$i=1;
									while($row1=$res->fetch_assoc())										
									  {
 										$dob_by_chris=$row1['cust_dttm'];
 										
 										 $dtt = date("d-m-Y  h:i:s A", strtotime($dob_by_chris));	
										?>
										<tr>
											<td style="padding: 5px;"><?=$i++;?></td>
											<td style="padding: 5px;"><?=$dtt;?></td>
											<td style="padding: 5px;"><?=$row1['reg_id'];?></td>
											<td style="padding: 5px;"><?=$row1['fname'];?></td>
											<td style="padding: 5px;"><?=$row1['mobile'];?></td>
											<td style="padding: 5px;"><?=$row1['email'];?></td>											
											<td style="padding: 5px;"><?=$row1['address'];?></td>
											<td style="padding: 5px;"><?=$row1['city'];?></td>
											<td style="padding: 5px;"><?=$row1['pincod'];?></td>
											<td style="padding: 5px;">
											<a href="dealer_master.php?dealer=<?=$row1['cust_id']?>&act=edit" class="link btn-primary">Edit</a>
											
											</td>
										</tr>
									
									<?php
									}
								
									?>
									</tbody>
								</table>
	
												
												
		<div style="width:100%;float:left;margin-top:30px;">				
<div style="width:100%;margin:auto;height:auto;position:absolute;bottom:40px;left:45%;">
<?php 
$params = $_SERVER['QUERY_STRING'];
$params=str_replace("page=","",$params);
$sql = "select * from soum_master_dealer where 1=1 ".$cond; 
//echo $sql;
$rs_result =$db->query($sql); //run the query
$total_records = mysqli_num_rows($rs_result);  //count number of records
//echo $total_records;
$total_pages = ceil($total_records / $num_rec_per_page); 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='dealer_master.php?page=1&$params'>".'First'."</a> "; // Goto 1st page  
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='dealer_master.php?page=".$i."&".$params."'>".$i."</a> "; 
}; 
echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='dealer_master.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
?>
</div></div>
							</div>
							
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
	<script>

$("#name1").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});

$("#mobile").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9 ] /g)) {
       $(this).val(val.replace(/[^0-9 ]/g, ''));
   }
   
   if (val.length>10)
	{
       $(this).val(val.substr(0,10));

   }

});

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
    $('#previewing'+popid).attr('src','../upload/loader.gif');
	$.ajax({
	  type: "POST",
	  url: "script.php",
	  data: { 
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	  $('#debugConsole'+popid).val(o); 
	   $('#previewing'+popid).attr('src','../upload/temp/'+o);
	});
}
</script>

</body>
</html>