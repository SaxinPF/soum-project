<?php include('../config2.php');
$act=$_REQUEST['act'];
?>
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

#list-1 td {
	padding: 5px;
}

	</style>
<script src="scripts/jquery.min.js"></script>
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
									<h3 style="margin-top:5px;">Buyer Requirement</h3>
								</div>
							</div>
						</div>
					</div> <!-- #end row -->
					<?php 
					$act=$_REQUEST['act'];
					if(isset($_REQUEST['req_id']))
					{
					/*$poster_id=$_REQUEST['dealer'];
					$sql="select * from soum_master_dealer where cust_id=$poster_id";
					$res=$db->query($sql);*/
					 
					/** BOF Security Patch IS-002*/
					$poster_id=mysqli_real_escape_string($db,$_REQUEST['req_id']);
					$dealerM=$db->prepare('select * from soum_buyer_requirement where req_id=?');
					$dealerM->bind_param('i', $poster_id); 
					$dealerM->execute();
					$res=$dealerM->get_result();
					/** EOF Security Patch IS-002*/
					
					 //$sql="select * from soum_offer where offer_id=$offerid";
					 //$sql="select * from soum_master_customer where cust_id=$poster_id";
					 
					 $brand='';
					 while($row=$res->fetch_assoc())
					 {
						$name=$row['req_name']; 
					    $mob=$row['req_mob'];
					    $email=$row['req_email'];									    
					    $pricemin=$row['min_price'];
					    $pricemax=$row['max_price'];	
					    $brand=$row['brand'];
					    $model=$row['model'];
					    $desc=$row['enq_desc'];
					    $status=$row['status'];

                     }
					}	
					//echo $status;				
					?>
					
					
					 <?php if($act=='add' || $act=='edit' || $act=='del'){?>
					 
					<div class="row">
						<div class="col-md-8" style="margin:auto;float:none;">
						<div style="width:100%;float:left;padding:15px;background-color:#fff;border:1px solid#dd;margin-bottom:20px;">
						
						
						<form name="myForm" onsubmit="return validateForm()" method="post" action="buyer_requirement_act2.php" enctype="multipart/form-data">
			            <input name="act" type="hidden" value="<?=$act;?>"/>
			            <input name="req_id" type="hidden" value="<?=$poster_id;?>"/>
			            <div class="col-md-6" style="margin-bottom:10px;">
			            	<div style="width:100%;float:left;">
			                   <p style="margin:0px;" id="remove1"><label>Mobile No <span class="red-text">*</span></label></p>
			                   <input name="enq_mobile" id="mobile" value="<?=$mob;?>" onchange="client(this.value)" class="form-control" type="text" placeholder="Mobile No"/>
		                   </div>
		               </div>
			           <div class="col-md-6" style="margin-bottom:10px;">
			           		<div style="width:100%;float:left;">
			                   <p style="margin:0px;" id="remove1"><label>Name <span class="red-text">*</span></label></p>
			                   <input name="enq_name" id="fname" value="<?=$name;?>" class="form-control" type="text" placeholder="Name"/>
			                </div>
		               </div>
		               
		               <div class="col-md-6" style="margin-bottom:10px;">
			             	<div style="width:100%;float:left;">
				             	<p style="margin:0px;width:100%;float:left;" id="remove1"><label>Brand <span class="red-text">*</span></label></p>
		                        <select name="drpBrand" id="drpBrand" class="form-control" onchange="fill2(this.value,'');" style="width:100%;" >
									<option selected="selected" value="">--Select Brand--</option>
									<?php 
									  $sql="select * from soum_prod_subcat order by prod_subcat_id desc";
									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									  ?>
									  <option value="<?=$row['prod_subcat_id'];?>" <?php if($row['prod_subcat_id']==$brand) echo "Selected";?>><?=$row['prod_subcat_desc']?></option>

									 <?php }
									?>
								</select>
							</div>
						</div>
						
						<div class="col-md-6" id="modeldiv1" style="margin-bottom:10px;">
							<div style="width:100%;float:left;">	
	                        <p style="margin:0px;width:100%;float:left;" id="remove1"><label>Model <span class="red-text">*</span></label></p>
	                        <select name="drpModel" id="soum_prod_subsubcat1" class="form-control" onchange="modal1(this.text);" style="width:100%;" >
	                        	<option selected="selected" value="">--Select Brand--</option>
							</select>
							</div>
						</div>
		              
						<div class="col-md-6" style="margin-bottom:10px;">
							<div style="width:100%;float:left;">
							   <p style="margin:0px;" id="remove1"><label>Price Range <span class="red-text"></span></label></p>
		                	   <input name="price-min" id="price-min" value="<?=$pricemin;?>" placeholder="Min" class="form-control" type="text" style="width:46%;float:left;"/>
		                	   <span style="width:21px;float:left;text-align:center;">To</span>
		                	   <input name="price-max" id="price-max" value="<?=$pricemax;?>" placeholder="Max" class="form-control" type="text" style="width:46%;float:left;"/>
		                	</div>
						</div>
		               <div class="col-md-6" style="margin-bottom:10px;">Note: SMS may containg ~n~ for name, ~b~ for brand and ~m~ for model.</div>

			             
						
						<div class="col-md-6" style="display:none;" id="branddiv">
							<p style="margin:0px;width:100%;float:left;" id="remove1"><label>Brand <span class="red-text">*</span></label></p>
					 		<input name="otherbrand" id="otherbrand" placeholder="Brand Name" class="form-control" style="width:100%;"/>
					 	</div>
					 	
                         <div class="col-md-6" style="display:none;" id="modeldiv2">
                         	<p style="margin:0px;width:100%;float:left;" id="remove1"><label>Model <span class="red-text">*</span></label></p>
					 		<input name="othermodel" id="othermodel" placeholder="Model Name" class="form-control" style="width:100%;"/>
					 	</div>

						<div class="col-md-12" style="margin-bottom:10px;">
							<div class="col-md-6">
							<div style="width:100%;float:left;">
							 <p style="margin:0px;width:100%;float:left;" id="remove1"><label>Description <span class="red-text">*</span></label></p>
							<textarea name="desc" rows="5" cols="20" id="txt_description" class="form-control" placeholder="Description"><?=$desc;?></textarea>
							<div style="margin-top:15px;" id="dtl">	</div>
							</div>
							</div>
							<div class="col-md-6">
							<div style="width:100%;float:left;height:150px;overflow-y:scroll;padding:6px;">
							 <p style="margin:0px;width:100%;float:left;" ><label id="remove1">SMS <span class="red-text">*</span></label></p>
							 <div style="width:100%;float:left;margin-bottom:10px;">
								<input name="Radio1" type="radio" value="1" style="width:10%;float:left;"/>
								<textarea name="sms1" rows="2" cols="20" style="width:90%;float:left;" id="txt_sms" class="form-control" placeholder="SMS">SMS1.</textarea>
							 </div>
							 <div style="width:100%;float:left;margin-bottom:10px;">
								<input name="Radio1" type="radio" value="2" style="width:10%;float:left;"/>
								<textarea name="sms2" rows="2" cols="20" style="width:90%;float:left;" id="txt_sms" class="form-control" placeholder="SMS">SMS2.</textarea>
							 </div>
							 <div style="width:100%;float:left;margin-bottom:10px;">
								<input name="Radio1" type="radio" value="3" style="width:10%;float:left;"/>
								<textarea name="sms3" rows="2" cols="20" style="width:90%;float:left;" id="txt_sms" class="form-control" placeholder="SMS">SMS3.</textarea>
							 </div>
							<div style="margin-top:15px;" id="dtl">	</div>
							</div>
						    </div>
						</div>
					 		                    
		                
                 		<div class="col-md-12" style="background:#f1f1f1;padding-top:10px;margin-top:10px;padding-bottom:10px;">
                 		<div class="col-md-6" style="margin: auto; float: none;">
		               		<div style="width:100%;float:left;">
			                   <div class="col-md-6">
			                   	<label><input type="radio" name="status" value="0" <?php if($status==0) echo "Checked";?>> Pending</label>
			                   </div>
			                   <div class="col-md-6">
			                   	<label><input type="radio" name="status" value="1" <?php if($status==1) echo "Checked";?>> Disposed</label>
			                   </div>
			                </div>
						</div>
						<div class="col-sm-12" style="width:100%;float:left;">       
		                    <div style="width:100%;float:left;text-align:center;"><button name="Button1" value="Submit" id="Button1" class="btn btn-primary mr5 waves-effect waves-effect" type="submit">Submit</button></div>
                 		</div>
                 		</div>
		            </form>
					</div>
				</div>
						
					</div>
					<?php } ?>
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height:450px;">
<?php 
$search=$_REQUEST['search'];						 
$on=$_REQUEST['searchon'];

if($search!='')
{
 if($on==0)
 {
  $conds=" where concat(req_name,req_mob,min_price,brand_name,model_name) like '%$search%'";
 }
 else
 { 
  $conds="having UPPER(temp.phone1) like '%$search%'";
 } 
}

						?>
						
												<table style="width:auto;float:right;">
									<tr><form method="get"><td style="padding-right:5px;"><select name="searchon" class="form-control">
										<option value="0" <?php if($on==0) echo "Selected";?>>All</option>
										<option value="1" <?php if($on==1) echo "Selected";?>>Brand & Model</option>
										</select>
										</td>
										<td style="padding-right:5px;">
										<input name="search" type="text" class="form-control" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr>
								</table>
												
							<div class="clearfix tabs-fill">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-flip-tab0-1" data-toggle="tab">Pending</a></li>
									<li><a href="#tab-flip-tab0-2" data-toggle="tab">Disposed</a></li>
								</ul>
									<div class="tab-content" style="display: inline-block;width: 100%;">
										<div class="tab-pane active col-md-12" id="tab-flip-tab0-1" style="overflow:hidden">
											
									<div class="clearfix">		
									<div class="col-md-12" style="padding:0px;">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff;font-size:14px;">
											<th style="padding:2px;">SNo.</th>
											<th style="padding:2px;">Order No</th>
											<th style="padding:2px;">DTTM</th>
											<th style="padding:2px;">Name</th>
											<th style="padding:2px;">Phone No.</th>
											<th style="padding:2px;">Brand Model</th>
											<th style="padding:2px;text-align:right;">Price Range</th>											
											<th style="padding:2px;width: 150px;">Action <a href="buyer_requirement_sanjay.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:0px 8px;float:right;">[+]</button></a></th>
										</tr>
									</thead>
									<tbody>
									<?php
									
									$num_rec_per_page=25;
									if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; }; 
									if ($page=='') $page=1; 
									$i=1+$start_from = ($page-1) * $num_rec_per_page;
									
									  $sql="select SQL_CALC_FOUND_ROWS* from 
									  (select soum_buyer_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_buyer_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_buyer_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_buyer_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_buyer_requirement.status=0
										 ) temp ".$conds." ORDER BY temp.req_id desc LIMIT $start_from, $num_rec_per_page";
										//echo $sql;
									  $res=$db->query($sql);
									  $pcount=mysqli_num_rows($res);
									  
									  $i=1;
									  $i=$page*25-24;
									  while($row=$res->fetch_assoc())
									  {
									    $name=$row['req_name']; 
									    $mob=$row['req_mob'];
									    $email=$row['req_email'];									    
									    $price=$row['min_price']."-".$row['max_price'];	
									    $brand=$row['brand'];
									    $model=$row['model'];								    
									    $otherbrand=$row['other_brand'];
									    $othermodel=$row['other_model'];									    
									    if($brand==0){$brand1=$otherbrand;} else { $brand1=$row['brand_name'];}
									    if($model==0){$model1=$othermodel;} else { $model1=$row['model_name'];}

                                       
									       
											
											$originalDate =$row['req_dttm'];
											$enq_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));
									    
									?>
										<tr style="font-size:13px;">
											<td style="width: 19px"><?=$i++;?></td>											
											<td><?=$row['req_token'];?></td>
											<td><?=$enq_dt;?></td>											
											<td><?=$name;?></td>
											<td><?=$mob;?></td>
											<td><?=$brand1." ".$model1;?></td>
											<td style="text-align:right"><?=$price;?></td>											
											<td><a href="buyer_requirement_sanjay.php?req_id=<?=$row['req_id']?>&act=edit">Edit</a> / <a href="buyer_requirement_sanjay.php?req_id=<?=$row['req_id']?>&act=del">Delete</a></td>
										</tr>
									<?php
									}	
									 $sql1="select SQL_CALC_FOUND_ROWS* from 
									  (select soum_buyer_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_buyer_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_buyer_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_buyer_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_buyer_requirement.status=0
										 ) temp ".$conds." ORDER BY temp.req_id desc ";
										//echo $sql;
									  $res1=$db->query($sql1);
									  while($row1=$res1->fetch_assoc())
									  {
                                        $numb1.=$row1['req_mob'].",";
                                      }  

									 $numb1=substr($numb1,0,(strlen.$numb1-1));
									 								
									?>				
																
									</tbody>
								</table>
								<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button1" type="button" onclick="$('#massms1').toggle();">View Mass SMS</button>
				<a href="user_mass_log.php?type=buy">SMS Log</a>
				<div id="massms1" style="display:none;float:left;margin-top:15px;" class="col-md-12">
				<div class="col-md-3"><input name="mob1" class="form-control" id="mob1" type="text" value="<?=$numb1;?>" style="border:1px solid#ddd;"/></div>
				<div class="col-md-3"><textarea name="sms1" id="sms1" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"></textarea></div>
				<div class="col-md-3" id="smsload1"><button name="Submit1" type="button" onclick="sms(1)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div></div>
							
								</div>

								
								<div class="col-md-12" style="text-align:center;">
												<div style="width:100%;">
												<?php 
														$params = $_SERVER['QUERY_STRING'];
														$params=str_replace("page=","",$params);
														
														$sql = "SELECT FOUND_ROWS() AS found_rows";
														$rs_result =$db->query($sql); //run the query
														$row=$rs_result->fetch_assoc();
														$total_records = $row['found_rows'];
														
														$total_pages = ceil($total_records / $num_rec_per_page); 
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='buyer_requirement_sanjay.php?page=1&$params'>".'First'."</a> "; // Goto 1st page  
														for ($i=1; $i<=$total_pages; $i++) { 
														            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='buyer_requirement_sanjay.php?page=".$i."&".$params."'>".$i."</a> "; 
														}; 
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='buyer_requirement_sanjay.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
														?>
												</div>
											</div>
									</div>
		
										</div>
										<div class="tab-pane col-md-12" id="tab-flip-tab0-2">
											
										<div class="clearfix">
											<div class="col-md-12" style="padding:0px;">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff;font-size:14px;">
											<th style="padding:2px;">SNo.</th>
											<th style="padding:2px;">Order No</th>
											<th style="padding:2px;">DTTM</th>
											<th style="padding:2px;">Name</th>
											<th style="padding:2px;">Phone No.</th>
											<th style="padding:2px;">Brand Model</th>
											<th style="padding:2px;text-align:right;">Price Range</th>											
											<th style="padding:2px;width: 150px;">Action <a href="buyer_requirement_sanjay.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:0px 8px;float:right;">[+]</button></a></th>
										</tr>
									</thead>
									<tbody>
									<?php
									
									$num_rec_per_page=25;
									if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; }; 
									if ($page=='') $page=1; 
									$i=1+$start_from = ($page-1) * $num_rec_per_page;
									
									  $sql="select SQL_CALC_FOUND_ROWS* from 
									  (select soum_buyer_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_buyer_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_buyer_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_buyer_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_buyer_requirement.status=1
										 ) temp ".$conds." ORDER BY temp.req_id desc LIMIT $start_from, $num_rec_per_page";
										//echo $sql;
									  $res=$db->query($sql);
									  $pcount=mysqli_num_rows($res);
									  
									  $i=1;
									  $i=$page*25-24;
									  while($row=$res->fetch_assoc())
									  {
									   
									    $name=$row['req_name']; 
									    $mob=$row['req_mob'];
									    $email=$row['req_email'];									    
									    $price=$row['min_price']."-".$row['max_price'];	
									    $brand=$row['brand'];
									    $model=$row['model'];								    
									    $otherbrand=$row['other_brand'];
									    $othermodel=$row['other_model'];									    
									    if($brand==0){$brand1=$otherbrand;} else { $brand1=$row['brand_name'];}
									    if($model==0){$model1=$othermodel;} else { $model1=$row['model_name'];}


									       
											
											$originalDate =$row['req_dttm'];
											$enq_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));
									    
									?>
										<tr style="font-size:13px;">
											<td style="width: 19px"><?=$i++;?></td>											
											<td><?=$row['req_token'];?></td>
											<td><?=$enq_dt;?></td>											
											<td><?=$name;?></td>
											<td><?=$mob;?></td>
											<td><?=$brand1." ".$model1;?></td>
											<td style="text-align:right"><?=$price;?></td>											
											<td><a href="buyer_requirement_sanjay.php?req_id=<?=$row['req_id']?>&act=edit">Edit</a> / <a href="buyer_requirement_sanjay.php?req_id=<?=$row['req_id']?>&act=del">Delete</a></td>
										</tr>
									<?php
									}	
									 
								
									?>				
																
									</tbody>
								</table>
								</div>

								
								<div class="col-md-12" style="text-align:center;">
												<div style="width:100%;">
												<?php 
														$params = $_SERVER['QUERY_STRING'];
														$params=str_replace("page=","",$params);
														
														$sql = "SELECT FOUND_ROWS() AS found_rows";
														$rs_result =$db->query($sql); //run the query
														$row=$rs_result->fetch_assoc();
														$total_records = $row['found_rows'];
														
														$total_pages = ceil($total_records / $num_rec_per_page); 
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='buyer_requirement_sanjay.php?page=1&$params'>".'First'."</a> "; // Goto 1st page  
														for ($i=1; $i<=$total_pages; $i++) { 
														            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='buyer_requirement_sanjay.php?page=".$i."&".$params."'>".$i."</a> "; 
														}; 
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='buyer_requirement_sanjay.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
														?>
												</div>
											</div>
										</div>
											
										</div>
									</div>
								</div>			
	
												
												
		
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
	
	
$(document).ready(function(){
 
 var b='<?=$brand;?>';
   
   if(b!='') 
   fill2('<?=$brand;?>','<?=$model;?>');

});	

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

function fill2(bid,mid)
{
 
var brand1=$("#drpBrand option:selected").text();
//alert(brand1);
 var sms=$("#txt_sms").val();
 
  
$('#soum_prod_subsubcat1').hide();
 $('#name_loader').html("<img src='../upload/loader.gif' width='30' height='30'>");
	$.ajax({
		type:"Post",
		url:"../fill3.php",
		data:"param="+bid+"&mid="+mid,
		success:function(html) 
		{
		 
		       $('#name_loader').html(""); 
               $('#soum_prod_subsubcat1').show();

			$("#soum_prod_subsubcat1").html(html);
		}
	}); 
	
	var res = sms.replace("~b~",brand1); 
              $('#txt_sms').val(res);


}

function modal1(model)
{ 
   var model=$("#soum_prod_subsubcat1 option:selected").text();
   var sms=$('#txt_sms').val();
   var res = sms.replace("~m~",model); 
              $('#txt_sms').val(res);

}

function client(mob)
{
 var sms=$("#txt_sms").val();
 
   $.getJSON('../client.php?callback=?','mob='+mob+'&act=client', function(data){
		if(data)
		{ 		  
		  $.each(data,function(i,element){
		     
		      $('#fname').val(element.fname);
		      $('#mobile_no').val(element.mobile);
			  $('#email').val(element.email);           
	
              var res = sms.replace("~n~",element.fname); 
              $('#txt_sms').val(res);
   
          });
        } 
     });    
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

function sms(v)
{
  var mob=$("#mob"+v).val();
  var sms=$("#sms"+v).val();
  $("#smsload"+v).html("<img src='images/viewloading.gif'/>");
   $.ajax({
           
		type:'POST',
		 url:'send_sms.php',
		data:'mob='+mob+'&sms='+sms+'&type=buy',
		success:function(html)
		{
           if(html==1)
           {
            alert("SMS sent successfuly");
            $("#smsload"+v).html('<button name="Submit1" type="button" onclick="sms(1)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button>');

            $("#massms"+v).hide();
           }
        }
   });
  
}	

</script>

</body>
</html>