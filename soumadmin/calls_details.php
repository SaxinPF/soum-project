<?php 
include("../config1.php");
$oid=$_REQUEST['oid'];
$msg=$_REQUEST['tomsg'];
$dt=date("Y-m-d H:i:s");
if(isset($_REQUEST['submit']))
{
	$sql="insert into soum_sms_log(smsdt,type,sms_for_id,status,msg)values('$dt','calls','$oid','','$msg')"; 
	$res=$db->query($sql); 
	//echo $sql;
	if($res)
	{   	     
	    $sql1="update soum_order_master set calls='1' where order_id=$oid";    
        $res1=$db->query($sql1);	
	    //echo $sql1; 
	
	  //header("location:order.php");
     echo "<script>window.location.href='order.php';</script>";
	}
}
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
.box-1 td{
	border:1px solid#ddd;
	padding:5px;
}
.table-1 td{	
	padding:5px;
	border:1px solid#ddd;
}

.auto-style1 {
	background-color: #C0C0C0;
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
						
						<div class="col-md-12" style="margin-top:30px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light"><a name="top">Update calls Status</a></h4>
								</div>
							</div>
						</div>
						
						<div class="col-md-12">		
						<div style="width:100%;float:left;background:#fff;padding:10px;">		
						
						<div class="col-md-6">
						
							<form method="post">
							<table style="width: 100%" class="box-1">
                                   <tr id="sndtxt" style="display:one">
									<td>Status change</td>
									<td><input name="oid" id="oid" type="hidden" value="<?=$oid;?>"><textarea name="tomsg" id="tomsg" class="form-control" style="width: 242px; height: 70px" cols="20" rows="1"></textarea></td>
                                   </tr>                                   
                                   <tr>
									<td colspan="2" style="text-align:center">
										<button type="submit"  value="Change Status" name="submit" class="btn btn-primary mr5 waves-effect waves-effect" style="float: none;margin-right:10px;">Change Status</button>
									</td>
                                   </tr>
								</table>
							 </form>
						</div>
						
						
						<div class="col-md-6">
						                               <div class="col-md-12">
							<table style="width:100%;float:left;" class="table-1">
								<tr>
								<td class="auto-style1">#</td>
								<td class="auto-style1">Dttm</td>
								<td class="auto-style1">Msg</td>
								</tr>
								<?php 
								$sql="select * from soum_sms_log where sms_for_id=$oid and type='calls' order by sms_id desc";
								//echo $sql;
								$res=$db->query($sql);
								$i=1;
								while($row=$res->fetch_assoc())
								{
								$originalDate=$row['smsdt'];
                                $dt=date("d-m-Y h:i A",strtotime($originalDate));
								?>								
								<tr>
								<td><?=$i++;?></td>
								<td><?=$dt;?></td>
								<td><?=$row['msg'];?></td>
								</tr>
								<?php } ?>
							</table>
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
</body>
</html>