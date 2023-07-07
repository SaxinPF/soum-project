<?php include("../config2.php");

$type2=$_REQUEST['type2'];
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
	<link rel="stylesheet" href="styles/plugins/c3.css">
	<link rel="stylesheet" href="styles/plugins/waves.css">
	<link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">

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
				<div class="page-wrap" style="min-height:450px;">

				<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top:0px;">
									<?php if($type2=='PreLaunch'){
									   echo 'Records';
									}else{
									   echo 'Feedback List';
									} ?>
									</h3>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> <!-- #end row -->
					<div class="row">
						<!-- style three -->
						<div class="col-md-12 mb30">
						<!-- tab style -->
						<div class="clearfix tabs-fill">
						<?php
						 if(isset($_REQUEST['Submit1']))
						 {
						   $search=$_REQUEST['search'];

                           $cond=" and concat(dttm,fname,email,subject) like '%$search%'";
						 }
						?>
						         <div style="width:100%;float:left">
									<div class="ui-radio ui-radio-pink">
									<?php if($type2=='PreLaunch'){ ?>
	                                    <label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('PreLaunch');">
											<input name="radioEg" type="radio" <?php if($type2=='PreLaunch') echo "checked";?>>
											<span>PreLaunch</span>
										</label>
									<?php }else{ ?>
										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('Feedback');">
											<input  name="radioEg" type="radio" <?php if($type2=='Feedback') echo "checked";?>>
											<span>Feedback</span>
										</label>
										<label class="ui-radio-inline" style="padding: 10px 0px;font-weight: bold;font-size: 14px;width: auto;" onclick="gopage('Complaint');">
											<input name="radioEg" type="radio" <?php if($type2=='Complaint') echo "checked";?>>
											<span>Complaint</span>
										</label>
									<?php } ?>

									</div>
								</div>


								<table style="width:auto;float:right;">
									<tr><form method="post"><td style="padding-right:5px;"><input name="search" type="text" class="form-control" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr>
								</table>
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">Pending</a></li>
									<li><a href="#tab-flip-two-1" data-toggle="tab">Processed</a></li>



								</ul>
								<div class="tab-content table-responsive">
									<div class="tab-pane active" id="tab-flip-one-1">
								<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
										    <th style="width: 19px">#</th>
											<th>DTTM</th>
											<th>Name</th>
											<th>Email</th>
											<th>Subject</th>
											<th>Details</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$cond1='';
									$type2=$_REQUEST['type2'];
									if($_REQUEST['type2']!='') { $cond1=" and enquiry_type='$type2'"; }


									$i=1;
									  $sql="select * from soum_feedback where status='0' ".$cond." ".$cond1."order by feedback_id desc";
									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {


									$originalDate =$row['dttm'];
									$enq_dt= date("d-m-Y h:i A", strtotime($originalDate));
									$time= date("h:i A", strtotime($originalDate));


									?>
										<tr>
											<td style="width: 19px"><?=$i++;?></td>
											<td><?=$enq_dt;?></td>
											<td><?=$row['fname'];?></td>
											<td><?=$row['email'];?></td>
											<td><?=$row['subject'];?></td>
											<td><a href="feedback_detail.php?fid=<?=$row['feedback_id'];?>">Details</a>
                                             <a class="link btn-danger" onclick="return confirm('Are you sure you want to delete this record ?');" href="feedback_delete.php?feedback_id=<?=$row['feedback_id'];?>&type=<?php echo $type2; ?>">Delete</a>
                                            
                                            </td>
										</tr>
									<?php
									}

									?>
									</tbody>
								</table>
									</div>
									<div class="tab-pane" id="tab-flip-two-1">
											<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
										    <th style="width: 19px">#</th>
											<th>Date</th>
											<th>Name</th>
											<th>Email</th>
											<th>Subject</th>
											<th>Details</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$i=1;
									 $sql="select * from soum_feedback where status=1 ".$cond." ".$cond1."order by feedback_id desc";
										//echo $sql;
									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									    $ptype=$row['prob_type'];
									    $img=$row['image'];

									    $originalDate =$row['dttm'];
									$enq_dt= date("d-m-Y h:i A", strtotime($originalDate));
									$time= date("h:i A", strtotime($originalDate));

									?>
										<tr>
											<td style="width: 19px"><?=$i++;?></td>
											<td><?=$enq_dt;?></td>
											<td><?=$row['fname'];?></td>
											<td><?=$row['email'];?></td>
											<td><?=$row['subject'];?></td>
											<td><a href="feedback_detail.php?fid=<?=$row['feedback_id'];?>">Details</a>
                                             <a class="link btn-danger" onclick="return confirm('Are you sure you want to delete this record ?');" href="feedback_delete.php?feedback_id=<?=$row['feedback_id'];?>&type=<?php echo $type2; ?>">Delete</a>
                                            
                                            </td>
										</tr>
									<?php
									}

									?>
									</tbody>
								</table>
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
						<div class="left small">Nav Horizontal</div>
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
						<div class="left small">Nav Full</div>
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
	<script src="scripts/plugins/d3.min.js"></script>
	<script src="scripts/plugins/c3.min.js"></script>
	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/plugins/jquery.sparkline.min.js"></script>
	<script src="scripts/plugins/jquery.easypiechart.min.js"></script>
	<script src="scripts/plugins/bootstrap-rating.min.js"></script>
	<script src="scripts/app.js"></script>
	<script src="scripts/index.init.js"></script>
<script>
function gopage(val)
{
	 if(val=='Feedback')
	 {
	    window.location.href="feedback_list.php?type2=Feedback";
	 }
	 if(val=='Enquiry')
	 {
	    window.location.href="feedback_list.php?type2=Enquiry";
	 }
	 if(val=='Complaint')
	 {
	    window.location.href="feedback_list.php?type2=Complaint";
	 }
	 if(val=='PreLaunch')
	 {
	    window.location.href="feedback_list.php?type2=PreLaunch";
	 }

}



</script>

</body>
</html>
