﻿<?php include('../config2.php');?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<meta content="Materia - Admin Template" name="description">
<meta content="materia, webapp, admin, dashboard, template, ui" name="keywords">
<meta content="solutionportal" name="author">
<!-- <base href="/"> -->
<title>Admin Dashboard</title>
<!-- Icons -->
<link href="fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Plugins -->
<link href="styles/plugins/waves.css" rel="stylesheet">
<link href="styles/plugins/perfect-scrollbar.css" rel="stylesheet">
<link href="styles/plugins/select2.css" rel="stylesheet">
<link href="styles/plugins/bootstrap-colorpicker.css" rel="stylesheet">
<link href="styles/plugins/bootstrap-slider.css" rel="stylesheet">
<link href="styles/plugins/bootstrap-datepicker.css" rel="stylesheet">
<link href="styles/plugins/summernote.css" rel="stylesheet">
<!-- Css/Less Stylesheets -->
<link href="styles/bootstrap.min.css" rel="stylesheet">
<link href="styles/main.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel="stylesheet" type="text/css">
<!-- Match Media polyfill for IE9 --><!--[if IE 9]>
<script src="scripts/ie/matchMedia.js"></script>
<![endif]-->
<style>
.form-control {
    border: 1px solid#ddd;
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
	background: url('../images/plus-icon.png') no-repeat;
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

<!-- #Start header --><?php include('_header.php');?>
<!-- #end header -->
<!-- main-container -->
<div class="main-container clearfix">
	<!-- main-navigation --><?php include('_left-menu.php');?>
	<!-- #end main-navigation -->
	<!-- content-here -->
	<div id="content" class="content-container">
		<!-- dashboard page -->
		<div class="page page-dashboard">
			<div class="page-wrap">
				<div class="row">
					<!-- dashboard header -->
					<div class="col-md-12" style="margin-top: 20px;">
						<div class="dash-head clearfix mb20">
							<div class="left">
								<h3 style="margin-top:5px;">Seller Requirement</h3>
							</div>
                            <div>
                                <a href="saler_requirement.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:6px 80px;float:right;">Add new</button></a></tr>
        						</div>
						</div>
					</div>
				</div>
				<!-- #end row --><?php
					$act=$_REQUEST['act'];
					if(isset($_REQUEST['req_id']))
					{
					/*$poster_id=$_REQUEST['dealer'];
					$sql="select * from soum_master_dealer where cust_id=$poster_id";
					$res=$db->query($sql);*/

					/** BOF Security Patch IS-002*/
					$poster_id=mysqli_real_escape_string($db,$_REQUEST['req_id']);
					$dealerM=$db->prepare('select * from soum_sale_requirement where reqs_id=?');
					$dealerM->bind_param('i', $poster_id);
					$dealerM->execute();
					$res=$dealerM->get_result();
					/** EOF Security Patch IS-002*/

					 //$sql="select * from soum_offer where offer_id=$offerid";
					 //$sql="select * from soum_master_customer where cust_id=$poster_id";


					 while($row=$res->fetch_assoc())
					 {
						$name=$row['saler_name'];
					    $mob=$row['saler_mob'];
					    $warr=$row['warr'];
					    $rom=$row['rom'];
					    $email=$row['email'];
					    $color=$row['color'];
					    $price=$row['price'];
					    $brand=$row['brand'];
					    $model=$row['model'];
                        $status=$row['status'];
                        $desc=$row['description'];

                     }
					}
					?><?php if($act=='add' || $act=='edit' || $act=='del'){?>
				<div class="row">
					<div class="col-md-8" style="margin: auto; float: none;">
						<div style="width: 100%; float: left; padding: 15px; background-color: #fff; border: 1px solid#dd; margin-bottom: 20px;">
							<form action="saler_requirement_act.php" method="post" name="myForm" onsubmit="return validateForm()">
								<input name="act" type="hidden" value="<?=$act;?>" />
								<input name="reqs_id" type="hidden" value="<?=$poster_id;?>" />
								<div class="col-md-6" style="margin-bottom:10px;">
									<div style="width: 100%; float: left;">
										<p id="remove1" style="margin: 0px;"><label>Mobile No <span class="red-text">*</span></label></p>
										<input id="mobile" class="form-control" name="enq_mobile" onchange="client(this.value)" placeholder="Mobile No" type="text" value="<?=$mob;?>" />
									</div>
								</div>
								<div class="col-md-6" style="margin-bottom:10px;">
									<div style="width: 100%; float: left;">
										<p id="remove1" style="margin: 0px;"><label>Name <span class="red-text">*</span></label></p>
										<input id="fname" class="form-control" name="enq_name" placeholder="Name" type="text" value="<?=$name;?>" />
									</div>
								</div>
								<div class="col-md-6" style="margin-bottom:10px;">
									<div style="width: 100%; float: left; margin-bottom: 8px;">
										<p id="remove1" style="margin: 0px; width: 100%; float: left;"><label>Brand <span class="red-text">*</span></label></p>
										<select class="form-control" name="drpBrand" onchange="fill2(this.value,'');" style="width: 100%;">
										<option selected="selected" value="">--Select Brand--</option>
										<?php
									  $sql="select * from soum_prod_subcat order by prod_subcat_id desc";
									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									  ?>
									  <option value="<?=$row['prod_subcat_id'];?>" <?php if($row['prod_subcat_id']==$brand) echo "Selected";?>>
									  <?=$row['prod_subcat_desc']?></option>
										<?php }
									?></select> </div>
								</div>
								<div id="modeldiv1" class="col-md-6" style="margin-bottom:10px;">
									<div style="width: 100%; float: left; margin-bottom: 8px;">
										<p id="remove1" style="margin: 0px; width: 100%; float: left;"><label>Model <span class="red-text">*</span></label></p>
										<select id="soum_prod_subsubcat1" class="form-control" name="drpModel" onchange="modal1(this.value);" style="width: 100%;">
										<option selected="selected" value="">--Select Brand--</option>
										</select> </div>
								</div>
								<div class="col-md-6" style="margin-bottom:10px;">
									<div style="width: 100%; float: left; margin-bottom: 8px;">
										<p id="remove1" style="margin: 0px;">
										<label>Warranty <span class="red-text">*</span></label></p>
										<div class="col-md-6">
											<label><input type="radio" name="warranty" value="0" <?php if($warr==0) echo "Checked";?>>
											Out of warranty</label> </div>
										<div class="col-md-6">
											<label><input type="radio" name="warranty" value="1" <?php if($warr==1) echo "Checked";?>>
											Under warranty</label> </div>
									</div>
								</div>
								<div class="col-md-6" style="margin-bottom:10px;">
									<div style="width: 100%; float: left; margin-bottom: 8px;">
										<p id="remove1" style="margin: 0px;">
										<label>Expected Price*
										<span class="red-text"></span></label>
										</p>
										<input id="price-max" class="form-control" name="price" placeholder="Price" type="text" value="<?=$price;?>" />
									</div>
								</div>
									<div class="col-md-6" style="margin-bottom:10px;">
							<div style="width:100%;float:left;">
	                        <p style="margin:0px;width:100%;float:left;"><label>ROM <span class="red-text">*</span></label></p>

								   <select class="form-control" name="rom">
									 <?php
										 $Storage  = array(2,4,8,16,32,64,128,256);
									 foreach($Storage as $value){
										$selected_rom = '';
									 if(isset($rom) && $rom==$value){
										 $selected_rom =  'selected="selected"';
									 } ?>
										  <option value='<?php echo $value ?>' <?php echo $selected_rom; ?> ><?php echo $value ?> GB</option>

									<?php  }  ?>
								  </select>


							</div>
						</div>

						<div class="col-md-6">
							<p style="margin:0px;width:100%;float:left;"><label>Color <span class="red-text">*</span></label></p>
					 		<input name="color" placeholder="Color" value="<?php echo $color; ?>" class="form-control" style="width:100%;"/>
					 	</div>

						<div class="col-md-6">
							<p style="margin:0px;width:100%;float:left;"><label>E-mail Id <span class="red-text">*</span></label></p>
					 		<input name="email" placeholder="E-mail Id" value="<?php echo $email; ?>" class="form-control" style="width:100%;"/>
					 	</div>


								<div class="col-md-12" style="margin-bottom:10px;">
									<div style="width: 100%; float: left;">
										<p id="remove1" style="margin: 0px; width: 100%; float: left;">
										<label>Description
										<span class="red-text">*</span></label></p>
										<textarea id="txt_description" class="form-control" cols="20" name="desc" placeholder="Description" rows="5"><?=$desc;?></textarea><br>
										<br>
										<label>SMS
										<span class="red-text"></span></label></p>

										<textarea class="form-control" cols="20" name="sms2" placeholder="SMS" rows="2">Dear ~n~ , Thanks for choosing us for selling ~m~(~b~). For any further enquiry please contact us on 9828075008/ 9829300040. Team SOUM.</textarea><br>&nbsp;<div id="dtl" style="margin-top: 15px;">
										</div>
									</div>
								</div>
								<div class="col-md-12" style="background: #f1f1f1; padding-top: 10px; margin-top: 10px; padding-bottom: 10px;">
									<div class="col-md-6" style="margin: auto; float: none;">
										<div style="width: 100%; float: left;">
											<div class="col-md-6">
												<label><input type="radio" name="status" value="0" <?php if($status==0) echo "Checked";?>>
												Pending</label> </div>
											<div class="col-md-6">
												<label><input type="radio" name="status" value="1" <?php if($status==1) echo "Checked";?>>
												Disposed</label> </div>
										</div>
									</div>
									<div class="col-md-12">
										<div style="width: 100%; float: left; text-align: center;">
										<?php
							if ($_REQUEST['act']=='del')
								$caption="Confirm Delete!";
							elseif ($_REQUEST['act']=='edit')
								$caption="Update !";
							else
								$caption="Submit";

						?>

											<button id="Button1" class="btn btn-primary mr5 waves-effect waves-effect" name="Button1" type="submit" value="Submit">
											<?=$caption;?></button></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="row">
					<!-- dashboard header -->

<?php
$search=$_REQUEST['search'];
$on=$_REQUEST['searchon'];

if($search!='')
{
 if($on==1)
 {
  //$conds=" where concat(saler_name,saler_mob,price,brand_name,model_name) like '%$search%'";
    $conds=" where UPPER(temp.phone1) like '%$search%'";
 }

 if($on==2)
 {
   $conds="where saler_name like '%$search%'";
 }
 if($on==3)
 {
   $conds="where saler_mob like '%$search%'";
 }

}
?>


					<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height: 450px;">
										<table style="width:auto;float:right;">
                                    	<tr><form method="get"><td style="padding-right:5px;">
									          <select name="searchon" class="form-control" id="searchon" onchange="searchfun(this.value)">
												<option value="1" <?php if($on==1) echo "Selected";?>>Brand & Model</option>
												<option value="2" <?php if($on==2) echo "Selected";?>>Name</option>
												<option value="3" <?php if($on==3) echo "Selected";?>>Mobile</option>
											  </select>
										</td>
										<td style="padding-right:5px;">
										<input name="search" type="text" id="locations" class="form-control searchfield" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td>
										</form></tr>
								</table>
							<div class="clearfix tabs-fill">
								<ul class="nav nav-tabs">
									<li class="active">
									<a data-toggle="tab" href="#tab-flip-tab0-1">
									Pending <span id="acount">&nbsp; ( 0 )</span></a></li>
									<li>
									<a data-toggle="tab" href="#tab-flip-tab0-2">
									Disposed <span id="bcount">&nbsp; ( 0 )</span></a></li>
								</ul>
								<div class="tab-content" style="display: inline-block; width: 100%;">
									<div id="tab-flip-tab0-1" class="tab-pane active col-md-12" style="overflow: hidden">
										<div class="clearfix">
										<div class="col-md-12 table-responsive" style="padding:0px;">
											<table id="list-1" class="table table-bordered invoice-table mb30" style="margin-bottom:15px;">
												<thead>
													<tr style="background: #38b4ee; color: #fff; font-size: 14px;">
														<th style="padding: 2px;">SNo.</th>
														<th style="padding: 2px;">Order No.</th>
														<th style="padding: 2px;">DTTM</th>
														<th style="padding: 2px;">Name</th>
														<th style="padding: 2px;">Phone No.</th>
														<th style="padding: 2px;">Brand Model</th>
														<th style="padding: 2px;">Warranty</th>
														<th style="padding: 2px;text-align:right;">Price</th>
														<th style="padding: 2px; width: 150px;">Action</th>
													</tr>
												</thead>
												<?php

												$num_rec_per_page=25;
												if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; };
												if ($page=='') $page=1;
												$i=1+$start_from = ($page-1) * $num_rec_per_page;



									  $sql="select SQL_CALC_FOUND_ROWS * from
									  (select soum_sale_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_sale_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_sale_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_sale_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_sale_requirement.status=0
										 ) temp ".$conds." ORDER BY temp.reqs_id desc LIMIT $start_from, $num_rec_per_page";
										//echo $sql;
									  $res=$db->query($sql);

									  $sql2="select SQL_CALC_FOUND_ROWS * from
									  (select soum_sale_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_sale_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_sale_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_sale_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_sale_requirement.status=0
										 ) temp ".$conds." ORDER BY temp.reqs_id desc";
										$res22=$db->query($sql2);
									    $acount=mysqli_num_rows($res22);

									 	$i=1;
										$i=$page*25-24;

									  while($row=$res->fetch_assoc())
									  {
									    $name=$row['saler_name'];
									    $mob=$row['saler_mob'];
									    $price=$row['price'];
									    $brand=$row['brand'];
									    $model=$row['model'];
									    $otherbrand=$row['other_brand'];
									    $othermodel=$row['other_model'];
									    if($brand==0){$brand1=$otherbrand;} else { $brand1=$row['brand_name'];}
									    if($model==0){$model1=$othermodel;} else { $model1=$row['model_name'];}




											$originalDate =$row['reqs_dttm'];
											$enq_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));

											?>
												<tr style="font-size: 13px;">
													<td style="width: 19px"><?=$i++;?>
													</td>
													<td><?=$row['reqs_token'];?></td>
													<td><?=$enq_dt;?></td>
													<td><?=$name;?></td>
													<td><?=$mob;?></td>
													<td><?=$brand1." ".$model1;?>
													</td>
													<td></td>
													<td style="text-align:right"><?=$price;?></td>
													<td>
													<a href="saler_requirement.php?req_id=<?=$row['reqs_id']?>&amp;act=edit">
													Edit</a> /
													<a href="saler_requirement.php?req_id=<?=$row['reqs_id']?>&amp;act=del">
													Delete</a></td>
												</tr>
												<?php
												}
												$sql1="select SQL_CALC_FOUND_ROWS * from
											  (select soum_sale_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_sale_requirement,soum_prod_subcat,soum_prod_subsubcat
												where soum_sale_requirement.brand=soum_prod_subcat.prod_subcat_id
												and soum_sale_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
												and soum_sale_requirement.status=0
												 ) temp ".$conds." ORDER BY temp.reqs_id desc";
												//echo $sql;
											  $res1=$db->query($sql1);
											  while($row1=$res1->fetch_assoc())
											  {
		                                         $numb1.=$row1['saler_mob'].",";
		                                      }

											$numb1=substr($numb1,0,(strlen.$numb1-1));
											?>
											</table>
				<button class="btn btn-primary mr5 waves-effect waves-effect waves-effect" name="Button1" type="button" onclick="$('#massms1').toggle();">View Mass SMS</button>
				<a href="user_mass_log.php?type=sell">SMS Log</a>
				<div id="massms1" style="display:none;float:left;margin-top:15px;" class="col-md-12">
				<div class="col-md-3"><input name="mob1" class="form-control" id="mob1" type="text" value="<?=$numb1;?>" style="border:1px solid#ddd;"/></div>
				<div class="col-md-3"><textarea name="sms1" id="sms1" class="form-control" cols="20" rows="5" style="border:1px solid#ddd;"></textarea></div>
				<div class="col-md-3" id="smsload1"><button name="Submit11" type="button" onclick="sms2(1)" class="btn btn-primary mr5 waves-effect waves-effect waves-effect">Send</button></div>
					</div>
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
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='saler_requirement.php?page=1&$params'>".'First'."</a> "; // Goto 1st page
														for ($i=1; $i<=$total_pages; $i++) {
														            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='saler_requirement.php?page=".$i."&".$params."'>".$i."</a> ";
														};
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='saler_requirement.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
														?>
												</div>
											</div>
										</div>
									</div>
									<div id="tab-flip-tab0-2" class="tab-pane col-md-12">
										<div class="clearfix">
											<div class="col-md-12 table-responsive" style="padding:0px;">
											<table id="list-2" class="table table-bordered invoice-table mb30" style="margin-bottom:15px;">
												<thead>
													<tr style="background: #38b4ee; color: #fff; font-size: 14px;">
														<th style="padding: 2px;">SNo.</th>
														<th style="padding: 2px;">Order No.</th>
														<th style="padding: 2px;">DTTM</th>
														<th style="padding: 2px;">Name</th>
														<th style="padding: 2px;">Phone No.</th>
														<th style="padding: 2px;">Brand Model</th>
														<th style="padding: 2px;">Warranty</th>
														<th style="padding: 2px;text-align:right;">Price</th>
														<th style="padding: 2px; width: 150px;">Action
														<a href="saler_requirement.php?act=add">
														<button class="btn btn-primary mr5 waves-effect" style="margin: 0px; padding: 0px 8px; float: right;" type="submit">
														[+]</button></a></th>
													</tr>
												</thead>
												<?php

												$num_rec_per_page=25;
												if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; };
												if ($page=='') $page=1;
												$i=1+$start_from = ($page-1) * $num_rec_per_page;



									  $sql="select SQL_CALC_FOUND_ROWS * from
									  (select soum_sale_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_sale_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_sale_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_sale_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_sale_requirement.status=1
										 ) temp ".$conds." ORDER BY temp.reqs_id desc LIMIT $start_from, $num_rec_per_page";										//echo $sql;
									  $res=$db->query($sql);

									  $sql2="select SQL_CALC_FOUND_ROWS * from
									  (select soum_sale_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_sale_requirement,soum_prod_subcat,soum_prod_subsubcat
										where soum_sale_requirement.brand=soum_prod_subcat.prod_subcat_id
										and soum_sale_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_sale_requirement.status=1
										 ) temp ".$conds." ORDER BY temp.reqs_id desc";
										$res22=$db->query($sql2);
									    $bcount=mysqli_num_rows($res22);

									 	$i=1;
										$i=$page*25-24;

									  while($row=$res->fetch_assoc())
									  {
									    $name=$row['saler_name'];
									    $mob=$row['saler_mob'];
									    $price=$row['price'];
									    $brand=$row['brand'];
									    $model=$row['model'];
									    $otherbrand=$row['other_brand'];
									    $othermodel=$row['other_model'];
									    if($brand==0){$brand1=$otherbrand;} else { $brand1=$row['brand_name'];}
									    if($model==0){$model1=$othermodel;} else { $model1=$row['model_name'];}




											$originalDate =$row['reqs_dttm'];
											$enq_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));

											?>
												<tr style="font-size: 13px;">
													<td style="width: 19px"><?=$i++;?>
													</td>
													<td><?=$row['reqs_token'];?></td>
													<td><?=$enq_dt;?></td>
													<td><?=$name;?></td>
													<td><?=$mob;?></td>
													<td><?=$brand1." ".$model1;?>
													</td>
													<td></td>
													<td style="text-align:right"><?=$price;?></td>
													<td>
													<a href="saler_requirement.php?req_id=<?=$row['reqs_id']?>&amp;act=edit">
													Edit</a> /
													<a href="saler_requirement.php?req_id=<?=$row['reqs_id']?>&amp;act=del">
													Delete</a></td>
												</tr>
												<?php
												}
												?>
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
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='saler_requirement.php?page=1&$params'>".'First'."</a> "; // Goto 1st page
														for ($i=1; $i<=$total_pages; $i++) {
														            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='saler_requirement.php?page=".$i."&".$params."'>".$i."</a> ";
														};
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='saler_requirement.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
														?>
												</div>
											</div> </div>
									</div>
								</div>
							</div>



						</div>
					</div>
				</div>
			</div>
			<!-- #end page-wrap --></div>
		<!-- #end dashboard page --></div>
</div>
<!-- #end main-container -->
<!-- theme settings -->
<div class="site-settings clearfix hidden-xs">
	<div class="settings clearfix">
		<div class="trigger ion ion-settings left">
		</div>
		<div class="wrapper left">
			<ul class="list-unstyled other-settings">
				<li class="clearfix mb10">
				<div class="left small">
					av Horizontal</div>
				<div class="md-switch right">
					<label><input id="navHorizontal" type="checkbox"> <span>&nbsp;</span>
					</label></div>
				</li>
				<li class="clearfix mb10">
				<div class="left small">
					Fixed Header</div>
				<div class="md-switch right">
					<label><input id="fixedHeader" type="checkbox"> <span>&nbsp;</span>
					</label></div>
				</li>
				<li class="clearfix mb10">
				<div class="left small">
					av Full</div>
				<div class="md-switch right">
					<label><input id="navFull" type="checkbox"> <span>&nbsp;</span>
					</label></div>
				</li>
			</ul>
			<hr />
			<ul id="themeColor" class="themes list-unstyled">
				<li class="active" data-theme="theme-zero"></li>
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
$("document").ready(function(){
//alert('df');
$('#acount').html("(<?=$acount;?>)");
$('#bcount').html("(<?=$bcount;?>)");
});
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
}

function client(mob)
{
   $.getJSON('../client.php?callback=?','mob='+mob+'&act=client', function(data){
		if(data)
		{
		  $.each(data,function(i,element){

		      $('#fname').val(element.fname);
		      $('#mobile_no').val(element.mobile);
			  $('#email').val(element.email);


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

function sms2(v)
{

  var mob=$("#mob"+v).val();
  var sms=$("#sms"+v).val();
  $("#smsload"+v).html("<img src='images/viewloading.gif'/>");
   $.ajax({

		type:'POST',
		 url:'send_sms.php',
		data:'mob='+mob+'&sms='+sms+'&type=sell',
		success:function(html)
		{
           if(html==1)
           {
            alert("SMS sent successfuly");
             $("#smsload"+v).html("<button name='Submit11' type='button' onclick='sms2(1)' class='btn btn-primary mr5 waves-effect waves-effect waves-effect'>Send</button>");

            $("#massms"+v).hide();
           }
        }
   });

}

</script>
<?php
	$new_sql = "SELECT concat(soum_prod_subcat.prod_subcat_desc,' ',A.prod_subcat_desc) phone1
    FROM soum_prod_subcat
    LEFT JOIN soum_prod_subsubcat AS A
        ON soum_prod_subcat.prod_subcat_id = A.prod_subcat_id";
         $res=$db->query($new_sql);
         $allRows =array();
			while($rowss=$res->fetch_assoc()){
	          $allRows[]=$rowss['phone1'];
		    }
	if(empty($on)){
	    $onn=1;
	}else{
	 $onn=$on;
	}
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
    var locationsz = ["<?php echo  implode('","',$allRows); ?>"];
	var url     =  'search_auto.php';
	searchfun(<?php echo $onn ?>);


function searchfun(search_id){

	if(search_id==1){
     $('.searchfield').attr('id','locations');

	 	var availableTags = locationsz;
			$( "#locations" ).autocomplete({
			  minLength: 3,
			  source: availableTags
			});

	}else{
	 $('.searchfield').attr('id','searchkeword');
	 	  $("#searchkeword").autocomplete({
					minLength: 2,
					delay : 200,
					source: function(request, response) {

						$.ajax({
						   url: 	 url,
						   data:  {
									term : request.term,
									table   : 'seller_r',
									field   : document.getElementById('searchon').value
							},
						   dataType: "json",

						   success: function(data) 	{
								//alert(data);
							 response(data);
						  }

						})
				   },

					  select:  function(e, ui) {
						  // e.preventDefault();
							//document.getElementById('searchkeword').value = ui.item.label;

					  }
				});

	}

}

</script>

</body>

</html>
