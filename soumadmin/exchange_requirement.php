﻿<?php include('../config2.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
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
									<h3 style="margin-top:5px;">Exchange Requirement</h3>
								</div>
                          	</div>
						</div>
					</div> <!-- #end row -->
	

					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
						<div class="dash-head clearfix mb20" style="min-height:450px;">
<?php
$search = $_REQUEST['search'];
$on  = $_REQUEST['searchon'];
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

						<!-- 		<table style="width:auto;float:right;">
                                        <tr><form method="get"><td style="padding-right:5px;"><select name="searchon" class="form-control">
										<option value="0" <?php if($on==0) echo "Selected";?>>All</option>
										<option value="1" <?php if($on==1) echo "Selected";?>>Brand & Model</option>
										</select>
										</td>
										<td style="padding-right:5px;">
										<input name="search" type="text" class="form-control" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr>
								</table> -->

							<div class="clearfix tabs-fill">
						
							<div class="tab-content" style="display: inline-block;width: 100%;">

								<div class="tab-pane active col-md-12" id="tab-flip-tab0-0" style="overflow:hidden">

									<div class="clearfix">
									<div class="col-md-12 table-responsive" style="padding:0px;">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff;font-size:14px;">
											<th style="padding:2px;">SNo.</th>
											<th style="padding:2px;">Order No</th>
											<th style="padding:2px;">DTTM</th>
											<th style="padding:2px;">Name</th>
											<th style="padding:2px;">Phone No.</th>
											<th style="padding:2px;">Brand Model</th>
											<th style="padding:2px;">Description</th>
										    <th style="padding:2px;width: 150px;">Action </th>
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
										where soum_buyer_requirement.exchange_brand=soum_prod_subcat.prod_subcat_id
										and soum_buyer_requirement.exchange_model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_buyer_requirement.enq_exchange=1
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
									    $brand=$row['brand_name'];
									    $model=$row['model_name'];
									    $exchange_desc = $row['exchange_desc'];
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
											<td><?=$brand." ".$model;?></td>
											<td style="text-align:right"><?=$exchange_desc;?></td>
											<td><a href="buyer_requirement.php?req_id=<?=$row['req_id']?>&act=edit">Edit</a></td>
										</tr>
									<?php } ?>

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
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='exchange_requirement.php?page=1&$params'>".'First'."</a> "; // Goto 1st page
														for ($i=1; $i<=$total_pages; $i++) {
														            echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='exchange_requirement.php?page=".$i."&".$params."'>".$i."</a> ";
														};
														echo "<a style='background-color: rgb(255, 45, 0);color:#fff;padding: 1px 4px;' href='exchange_requirement.php?page=$total_pages&$params'>".'Last'."</a> "; // Goto last page
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


</body>
</html>
