﻿﻿<?php include('../config2.php');?>
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
#fileToUpload2 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload3 , #fileToUpload4{
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload5 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload6 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload7 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload8 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#previewing7 , #previewing1 , #previewing2 , #previewing3 , #previewing4 , #previewing5 , #previewing6 , #previewing8{
width:auto;
}
.filedivcls {
background: #ffffff;
}
#list-1 td {
	padding: 5px;
}
</style>
<script src="scripts/jquery.min.js"></script>


<script>
function validate2() {




    var x = document.forms["myForm"]["name"].value;
    if (x == "") {
        alert("Name is required.");
        return false;
    }

    var mob=$("#mobile").val();
	  if(mob=='')
	  {
	   alert('Mobile number is required.');
	   return false;
	  }


    /*var m=(mob.substr(0,1))*1;

    if(m>=0 && m<=6)
    {
      alert("Enter valid number");
      return false;

    }*/

    if(mob.length<10)
    {
      alert("Enter valid number");
      return false;
    }

    var x = document.forms["myForm"]["date_d"].value;
    if (x == "") {
        alert("Date is required.");
        return false;
    }

	 //var x = document.forms["myForm"]["cn_number"].value;
    //if (x == "") {
       // alert("Entry number is required.");
        //return false;
    //}


	var x = document.forms["myForm"]["drpBrand"].value;
    if (x == "") {
        alert("Brand is required.");
        return false;
    }
    var x = document.forms["myForm"]["quantity"].value;
    if (x == "") {
        alert("Quantity is required.");
        return false;
    }

	var x = document.forms["myForm"]["drpModel"].value;
    if (x == "") {
        alert("Model is required.");
        return false;
    }

	var x = document.forms["myForm"]["price"].value;
    if (x == "") {
        alert("Price is required.");
        return false;
    }

	/*var x = document.forms["myForm"]["colour"].value;
    if (x == "") {
        alert("Colour is required.");
        return false;
    }*/
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
								<h3 style="margin-top:5px;">Purchase</h3>
							</div>
                            <div>
                                <a href="receipt_note.php?act=add"><button class="btn btn-primary mr5 waves-effect" type="submit" style="margin:0px;padding:6px 85px;float:right;">Add new</button></a>
        					</div>
						</div>
					</div>
				</div>
				<?php $img1 = $img2 =  $img3 =  '../images/noimage.png';?>
				<!-- #end row --><?php
					$act = (isset($_REQUEST['act']))?$_REQUEST['act']:'';
					if(isset($_REQUEST['req_id']))
					{
					/** BOF Security Patch IS-002*/
					$poster_id=mysqli_real_escape_string($db,$_REQUEST['req_id']);
					$dealerM=$db->prepare('select * from soum_receipt_note where id=?');
					$dealerM->bind_param('i', $poster_id);
					$dealerM->execute();
					$res=$dealerM->get_result();
					/** EOF Security Patch IS-002*/
         			 while($row=$res->fetch_assoc())
					 {
						$name=$row['name'];
					    $mob=$row['mobile'];

					    $cn_number=$row['cn_number'];
					    $entry_number = $row['entry_number'];


					    $color=$row['colour'];
					    $price=$row['price'];
					    $brand=$row['brand'];
					    $model=$row['model'];
					    $quantity=$row['quantity'];
					    $imi_no = $row['imi_no'];
					    $rom = $row['rom'];
                        $other_model = $row['other_model'];


						$date_d = $row['date_d'];
						$date_d= date("d/m/Y",$date_d);

						if(!empty($row['images']) && file_exists('../upload/'.$row['images'])){
							$img1  =      '../upload/'.$row['images'];
						}
						if(!empty($row['images1']) && file_exists('../upload/'.$row['images1'])){
							$img2  =      '../upload/'.$row['images1'];
						}
						if(!empty($row['images2']) && file_exists('../upload/'.$row['images2'])){
							$img3  =      '../upload/'.$row['images2'];
						}
                     }
				}
			?><?php if($act=='add' || $act=='edit' || $act=='del'){?>
				<div class="row">
					<div class="col-md-8" style="margin: auto; float: none;">
					   <?php if(!isset($_REQUEST['step'])){ ?>
							<form action="receipt_note_action.php" method="post" name="myForm" onsubmit="return validate2()">
								<input name="act" type="hidden" value="<?=$act;?>" />
								<input type="hidden" name="quantity_number" id="quantity_number" value="">
								<input name="reqs_id" type="hidden" value="<?=$poster_id;?>" />
								<div class="col-md-4" style="margin-bottom:10px;">
									<div style="width: 100%;">
										<p  style="margin: 0px;"><label>Party Name <span class="red-text">*</span></label></p>
										<input id="name1" class="form-control" name="name" placeholder="Name" type="text" value="<?=$name;?>" />
									</div>
								</div>
								<div class="col-md-4" style="margin-bottom:10px;">
									<div style="width: 100%;">
										<p  style="margin: 0px;"><label>Mobile No <span class="red-text">*</span></label></p>
										<input id="mobile" class="form-control" name="mobile" placeholder="Mobile No" type="text" value="<?=$mob;?>" />
									</div>
								</div>
								<div class="col-md-4" style="margin-bottom:10px;display:none;">
									<div style="width: 100%;">
										<p  style="margin: 0px;"><label>Entry Number <span class="red-text">*</span></label></p>
										<input id="entry_number" class="form-control" name="entry_number" placeholder="Entry Number" type="text" value="<?=$entry_number;?>" />
									</div>
								</div>
								<div class="col-md-4" style="margin-bottom:10px;display:none;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Entry Number <span class="red-text">*</span></label></p>
											<input id="cn_number" class="form-control" name="cn_number" placeholder="Entry Number" type="text" value="<?=$cn_number;?>" />
										</div>
									</div>
								<!--<div class="col-md-6" style="margin-bottom:10px;"></div>-->

									<div class="col-md-4">
											<label class="control-label">Date</label>
											<div class="input-group date" id="datepickerDemo1">
											   <input type="text" id="date_d" name="date_d" value="<?php echo $date_d ?>" class="form-control" Placeholder=""/>
											    <span class="input-group-addon">
													<i class=" ion ion-calendar"></i>
												</span>
											</div>
									</div>

                              	<div class="col-md-6" style="margin-bottom:10px;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Price of item <span class="red-text">*</span></label></p>
											<input id="price" class="form-control" name="price"  type="text" value="<?=$price;?>" />
										</div>
									</div>
                              	    <div class="col-md-6">
											<label class="control-label">Payment Mode</label>
											<select class="form-control minimal" name="cn_number">
                                              <?php  $mode_arr = array('Net banking','Cash','Wallets','Cards','Exchange');
                                              foreach($mode_arr as $value){
                                                 $sel ='';
                                                if($value == $cn_number){
                                                  $sel ='selected';
                                                }
                                              ?>
												<option value='<?php echo $value; ?>' <?php echo $sel; ?> ><?php echo $value; ?></option>
                                              <?php  } ?>


											</select>
									</div>
	                                <div class="col-md-12" style="margin-bottom:10px;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Quantity <span class="red-text">*</span></label></p>
											<input id="quantity" class="form-control" name="quantity"  type="number" value="<?=$quantity;?>" />
										</div>
									</div>

							<div id="repeat_sec">
								<div class="col-md-3" style="margin-bottom:10px;">
									<div style="width: 100%;margin-bottom: 8px;">
										<p  style="margin: 0px; width: 100%; float: left;"><label>Brand <span class="red-text">*</span></label></p>
										<select class="form-control" name="drpBrand" onchange="fill2(this.value,'',1);" style="width: 100%;">
										<option value="">--Select Brand--</option>
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
								<div id="modeldiv1" class="col-md-3" style="margin-bottom:10px;">
									<div style="width: 100%;margin-bottom: 8px;">
										<p id="remove1" style="margin: 0px; width: 100%; float: left;"><label>Model <span class="red-text">*</span></label></p>
										<select id="soum_prod_subsubcat1" class="form-control" name="drpModel" onchange="get_color(this.value,'',1)" style="width: 100%;">
											<option value="">--Select Model--</option>
												<?php
												$where = '';
												if($brand){
													$where = 'where prod_subcat_id ='.$brand;
												}

									  $sqlb="select * from soum_prod_subsubcat ".$where." order by prod_subsubcat_id desc";

									  $resb=$db->query($sqlb);
									  while($rowb=$resb->fetch_assoc())
									  {
									  ?>
									  <option value="<?=$rowb['prod_subsubcat_id'];?>" <?php if($rowb['prod_subsubcat_id']==$model) echo "Selected";?>>
									  <?=$rowb['prod_subcat_desc']?></option>
										<?php }
									?>
										
										</select> </div>
								</div>
								   <div class="col-md-3" id="oomodel1" style="margin-bottom:10px;display:none;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>Other Model <span class="red-text">*</span></label></p>
											<input id="other_model" class="form-control" name="other_model"  type="text" value="<?=$other_model;?>" />
										</div>
									</div>

								    <div class="col-md-3">
											<label class="control-label">Colour</label>
											<select class="form-control minimal" name="colour" id="colour">
												<option value='' >Select</option>

											</select>
									</div>
                              <div class="col-md-3">
											<label class="control-label">ROM</label>
											<select class="form-control minimal" name="rom" id="rom">
												<option value="">--Select ROM--</option>
												<option value="16" <?php if($rom == 16) echo "Selected";?>>16</option>
												<option value="32" <?php if($rom ==  32) echo "Selected";?>>32</option>
												<option value="64" <?php if($rom ==  64) echo "Selected";?>>64</option>
												<option value="128" <?php if($rom == 128 ) echo "Selected";?>>128</option>
												<option value="256" <?php if($rom ==  256) echo "Selected";?>>256</option>
												<option value="512" <?php if($rom ==  512) echo "Selected";?>>512</option>
											</select>

									</div>
                              			<div class="col-md-12" style="margin-bottom: 10px;">
										<div style="width: 100%;">
											<p  style="margin: 0px;"><label>IMEI<span class="red-text">*</span></label></p>
											<input type="text" name="imi_no" required value="<?php echo $imi_no ?>" id="txt_imi_no" class="form-control" Placeholder="Enter IMEI number"/>
										</div>
									</div>
								</div>
								<div id="repeat_sec_two"></div>




								<div class="col-md-12" style="background: #f1f1f1;margin-top:10px;">

									<div class="col-md-12">
										<div style="width: 100%;text-align: center;">
										<?php
											if ($_REQUEST['act']=='del')
												$caption="Confirm Delete!";
											elseif ($_REQUEST['act']=='edit')
												$caption="Update !";
											else
												$caption="Save & Next";

											?>

											<button id="Button1" class="btn btn-primary mr5 waves-effect waves-effect" name="Button1" type="submit" value="Submit">
											<?=$caption;?></button></div>
									</div>
								</div>
							</form>
							<?php }else{ ?>

								<div id="uploadimage">
										<div class="col-md-12">
											    <label class="control-label">Upload Documents</label>
										</div>

									<div class="col-sm-4" style="margin-top:15px;">
										<div class="filedivcls">
											<img src="<?php echo $img1 ?>" id="previewing1" style="height:80px;position:absolute;top:0;"/>
											<span class="select-wrapper"><input name="fileToUpload1" onchange="readURL(this,1);"  id="fileToUpload1" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
										</div>
									</div>
		                            <div class="col-sm-4" style="margin-top:15px;">
			                            <div class="filedivcls">
			                            	<img src="<?php echo $img2 ?>" id="previewing2" style="height:80px;position:absolute;top:0;"/>
			                            	<span class="select-wrapper"><input name="fileToUpload2" id="fileToUpload2" onchange="readURL(this,2);"  type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
			                            </div>
		                            </div>
		                            <div class="col-sm-4" style="margin-top:15px;">
		                            	<div class="filedivcls">
			                            	<img src="<?php echo $img3 ?>" id="previewing3" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload3" id="fileToUpload3" onchange="readURL(this,3);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
		                            </div>


							        <div class="col-md-12" style="text-align:center;">
										<button class="btn btn-primary mr5 waves-effect"  type="button" onclick="savefun(<?php echo $mob; ?>)" style="margin:20px;" id="btn-add-extra">Submit</button>
			    					</div>
								</div>
						<?php } ?>

					</div>
				</div>
				<?php } ?>
				<div class="row">
					<!-- dashboard header -->

<?php $conds='';
$search=$_REQUEST['search'];
$on=$_REQUEST['searchon'];

if($search!='')
{
 if($on==1)
 {
   $conds="where mobile like '%$search%'";
 }
   if($on==2)
 {
   $conds="where imi_no like '%$search%'";
 }
   if($on==3)
 {
  // $conds_two="having UPPER(phone1)=UPPER('$search')";
   $conds ="having phone1 like '%$search%'"; 
 }
}
?>					<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height: 450px;">
										<table style="width:auto;float:right;">
                                    	<tr><form method="get"><td style="padding-right:5px;">
									          <select name="searchon" class="form-control" id="searchon">
											  	<option value="3" <?php if($on==3) echo "Selected";?>>Brand Model</option>
                                                <option value="2" <?php if($on==2) echo "Selected";?>>IMEI</option>
												<option value="1" <?php if($on==1) echo "Selected";?>>Mobile</option> 
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
									Receipt List </a></li>

								</ul>
								<div class="tab-content" style="display: inline-block; width: 100%;">
									<div id="tab-flip-tab0-1" class="tab-pane active col-md-12" style="overflow: hidden">
										<div class="clearfix">
										<div class="col-md-12 table-responsive" style="padding:0px;">
											<table id="list-1" class="table table-bordered invoice-table mb30" style="margin-bottom:15px;">
												<thead>
													<tr style="background: #38b4ee; color: #fff; font-size: 14px;">
														<th style="padding: 2px;">SNo.</th>
														<th style="padding: 2px;">Name</th>
														<th style="padding: 2px;">Mobile</th>
														<th style="padding: 2px;">Date</th>
														<th style="padding: 2px;">Payment Mode</th>
                                                        <th style="padding: 2px;">Entry Number</th>

														<th style="padding: 2px;">Brand Model</th>
														<th style="padding: 2px;text-align:right;">Price</th>
														<th style="padding: 2px;text-align:right;">IMEI </th>
                                                      <th style="padding: 2px;text-align:right;">Doc Links </th>


														<th style="padding: 2px; width: 150px;">Action</th>
													</tr>
												</thead>
												<?php

												$num_rec_per_page=25;
												if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; };
												if ($page=='') $page=1;
												$i=1+$start_from = ($page-1) * $num_rec_per_page;



									  $sql="select SQL_CALC_FOUND_ROWS * from
									  (select soum_receipt_note.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_receipt_note,soum_prod_subcat,soum_prod_subsubcat
										where soum_receipt_note.brand=soum_prod_subcat.prod_subcat_id
										and soum_receipt_note.model=soum_prod_subsubcat.prod_subsubcat_id

										 ) temp ".$conds." ORDER BY temp.id desc LIMIT $start_from, $num_rec_per_page";
									//	echo $sql;exit;
									  $res=$db->query($sql);

									 	$i=1;
										$i=$page*25-24;

									  while($row=$res->fetch_assoc())
									  {
									    $name=$row['name'];
									    $mob=$row['mobile'];
									    $price=$row['price'];
									    $brand1=$row['phone1'];
									    $model1=$row['model'];

                                        if($row['model']==0){
										  $brand1 = $row['brand_name'].' '.$row['other_model'];
										}
									    $cn_number=$row['cn_number'];

											$date_d =$row['date_d'];
											$date_d= date("d-m-Y",$date_d);
                                            $imi_no =$row['imi_no'];


											?>
												<tr style="font-size: 13px;">
													<td style="width: 19px"><?=$i++;?>
													</td>
													<td><?=$name;?></td>
													<td><?=$mob;?></td>
													<td><?php echo $date_d; ?></td>
													<td><?php echo $cn_number; ?></td>
                                                    <td><?php echo $row['id']; ?></td>
													<td><?=$brand1;?></td>
													<td style="text-align:right"><?=$price;?></td>
	                                                <td style="text-align:right"><?= $imi_no; ?></td>
                                                  	<td style="text-align:right"><?php if(!empty($row['images'])){
														echo '<a href="https://www.soum.co.in/upload/'.$row['images'].'" target="_blank">Doc 1 </a><br/>';
													}
													if(!empty($row['images1'])){
														echo '<a href="https://www.soum.co.in/upload/'.$row['images1'].'" target="_blank">Doc 2 </a><br/>';
													}
													if(!empty($row['images2'])){
														echo '<a href="https://www.soum.co.in/upload/'.$row['images2'].'" target="_blank">Doc 3 </a>';
													}


													?></td>
													<td>
													<a href="receipt_note.php?req_id=<?=$row['id']?>&amp;act=edit">Edit</a>
													<a href="receipt_note_print.php?req_id=<?=$row['id']?>">Print</a>
													<a href="bill_and_recipte_delete.php?id=<?=$row['id']?>&type=receipt">
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
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='receipt_note.php?page=1&$params'>".'First'."</a> "; // Goto 1st page
														for ($i=1; $i<=$total_pages; $i++) {
														            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='receipt_note.php?page=".$i."&".$params."'>".$i."</a> ";
														};
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='receipt_note.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
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
<!--<script src="scripts/form-elements.init.js"></script>-->
<script>
/*$("#txt_imi_no").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9]/g)) {
       $(this).val(val.replace(/[^0-9]/g, ''));
   }

   if (val.length>15)
	{
       $(this).val(val.substr(0,15));

   }

});*/
$(document).ready(function(){

   var b='<?=$brand;?>';

    var color_id = '<?php echo  $color ?>';
    var m = '<?php echo  $model ?>';
	//alert(m);
	//alert(color_id);
      get_color(m,color_id);

   if(b!='')
   fill2('<?=$brand;?>','<?=$model;?>');

   $("#datepickerDemo1").datepicker({autoclose:!0});
   $("#datepickerDemo2").datepicker({autoclose:!0});

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

function fill2(bid,mid,div)
{

$('#soum_prod_subsubcat'+div).hide();
 $('#name_loader').html("<img src='../upload/loader.gif' width='30' height='30'>");
	$.ajax({
		type:"Post",
		url:"../fill3.php",
		data:"param="+bid+"&mid="+mid,
		success:function(html)
		{

		       $('#name_loader').html("");
               $('#soum_prod_subsubcat'+div).show();

			$("#soum_prod_subsubcat"+div).html(html);
		}
	});
}
function get_color(m_id,cid,div){
if(m_id=='0'){
  $('#oomodel'+div).show();
}else{
  $('#oomodel'+div).hide();
}


 var sitpath = '<?php echo SITEPATH; ?>';
	$.ajax({
		type:"Post",
		url: "../get_color.php",
		data:{"param":m_id,'mid':cid},
		success:function(html)
		{
		  if(div > 1){
		     $("#colour"+div).html(html);
			}else
			{
				$("#colour").html(html);
			}
		}
	});
}


function readURL(input,id){
		     var req_id =   '<?php echo (isset($_REQUEST['req_id']))?$_REQUEST['req_id']:0; ?> '
		     $('#previewing'+id).attr('src','../upload/loader.gif');

				if (input.files && input.files[0]) {
					var selectedFile = input.files[0];
					//console.warn(selectedFile);
					   fd = new FormData();
					   fd.append('req_id',req_id);
					   fd.append('fileToUpload'+id,selectedFile,selectedFile.name);
						$.ajax({
							  type: "POST",
							  async: false,
							  url: "receipt_note_upload.php",
							  processData: false,
				              contentType: false,
							  data: fd,
							  dataType: 'json',
							}).done(function(o) {
							   if(o.error_f==1){
							     alert(o.error);
								 $('#previewing'+id).attr('src','../images/noimage.png');
							   }else{
								    $('#previewing'+id).attr('src','../upload/'+o.path);
							   }
							});
				}
        }

function savefun(mobile){

	//$.ajax({
		//type:"Post",
		//url: "bill_of_supply_message.php",
		//data:{"mobile":mobile,'mobile':mobile},
		//success:function(html)
		//{
			alert("Data Update successfully");
            window.location.href="receipt_note.php";
		//}
	//});


}

</script>

<?php
	/* $new_sql = "SELECT concat(soum_prod_subcat.prod_subcat_desc,' ',A.prod_subcat_desc) phone1
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
	}  */
	/*
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
<?php */ ?>
<script>
        $('#quantity').on('keydown, keyup mouseup', function () {


                   var texInputValue = $('#quantity').val();
                    var count = texInputValue;
                    	console.log(count);
                    	if(count > 10){
                    		alert(' Please Select Quantity Below 10');

                    	}else{
		                    $('#quantity_number').val(count);

		                     $.ajax({
							            type:'POST',
							            url:'../add-repeat-sec.php',
							            data:'paramquantity='+count,
							            success: function(data){
							                $('#repeat_sec_two').html(data);
							            }
							        });
		                 }
					  
                         
});
</script>

</body>

</html>
