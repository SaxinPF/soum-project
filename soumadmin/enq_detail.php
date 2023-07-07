<?php include("../config2.php");
$enqid=$_REQUEST['enq_id'];
$status=$_REQUEST['status'];
$mob=$_REQUEST['mob'];
$tomsg=$_REQUEST['tomsg'];
$token="ENQ".str_pad ($enqid,4,'0', STR_PAD_LEFT);
$dt=date("Y-m-d H:i:s");
if(isset($_REQUEST['Submit1']))
{
  $sqlupd="update soum_enquire set status='$status' where enq_id='$enqid'";
  $res=$db->query($sqlupd);
  if($res)
  {
    //***************************************************************************************************

       $message = urlencode($tomsg);
       $ret = sms_api($mob,$message);
       $sql="insert into soum_sms_log(smsdt,type,sms_for_id,status,msg)values('$dt','3','$enqid','$status','$tomsg')";
       $res=$db->query($sql);
     //******************************************************************************************************


    echo "<script>window.location.href='enquire_list.php';</script>";
    //header("location:enquire_list.php");

  }
}

if(isset($_REQUEST['delete']))
{
  $sqlupd="delete from soum_enquire where enq_id='$enqid'";
  $res=$db->query($sqlupd);
  if($res)
  {

       $msg='Status for Enquiry Id '.$token.' has been updated to "Delete".  Thank you - Team Soum.';




       $message = urlencode($msg);
       $ret = sms_api($mob,$message);
     //******************************************************************************************************


    echo "<script>window.location.href='enquire_list.php';</script>";
    //header("location:enquire_list.php");

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

.auto-style1 {

	text-align: center;

}

.auto-style2 {

	text-align: left;

}
.table-1 td{
	padding:5px;
	border:1px solid#ddd;
}

</style>
<script>
function status1(val)
{
   var token=$("#token").val();
    var name=$("#cname").val();
   var bm=$("#bmodel").val();

  if(val==0)
  {
   $("#tomsg").val('Dear '+name+', we are sorry to convey that  '+bm+' is just sold out. We will soon contact you  once this model become available. For any further enquiry please contact us on 9828075008/ 9829300040.');
  }
  else if(val==1)
  {
   $("#tomsg").val('Dear '+name+', Thanks for showing your interest in  '+bm+'. Once we receive this model, we will get back to you. For any further enquiry please contact us on 9828075008/9829300040. Thank you - Team Soum');
  }
  else if(val==2)
  {
   $("#tomsg").val('Dear '+name+', Your request for '+bm+'  has been updated to "Resolved".   Please visit  our store at Gaurav Tower,  Malviya Nagar, Jaipur. For any further enquiry please contact us on 9828075008/9829300040. Thank you - Team Soum');
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
				<div class="page-wrap" style="min-height:450px;">

				<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top:0px;">
									Enquiry Details</h3>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> <!-- #end row -->
					<div class="row">
						<div class="col-md-12">
						<div class="auto-style1" style="background: linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6)) !important;padding:50px 0px;width:100%;float:left;">
						<!-- style three -->
						<div class="col-md-8 mb30" style="margin:auto;float:none;">
						<!-- tab style -->
							<div style="width:100%;float:left;background:#fff;padding:10px;box-shadow: 1px 2px 7px 0px;border-radius:3px;">

                             <?php

                                    $i=1;
									  $sql="select soum_enquire.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name from soum_enquire,soum_prod_subcat,soum_prod_subsubcat
										where soum_enquire.brand=soum_prod_subcat.prod_subcat_id
										and soum_enquire.model=soum_prod_subsubcat.prod_subsubcat_id
										and soum_enquire.enq_id=$enqid ";
										//echo $sql;
									  $res=$db->query($sql);
									  $row=$res->fetch_assoc();
									  $brand=$row['brand'];
									    $model=$row['model'];
									    $otherbrand=$row['other_brand'];
									    $othermodel=$row['other_model'];
									    if($brand==0){$brand1=$otherbrand;} else { $brand1=$row['brand_name'];}
									    if($model==0){$model1=$othermodel;} else { $model1=$row['model_name'];}


									?>
									<form method="post">
									<input name="enq_id" type="hidden" value="<?=$enqid;?>"/>
									<input name="mob" type="hidden" value="<?=$row['enq_mob'];?>"/>
									<input name="token" id="token" type="hidden" value="<?=$row['enq_token'];?>">
									<table class="table table-bordered invoice-table mb60" id="list-1" align="center" style="width: 100%">

										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">
											Enq Id</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['enq_token'];?></td>

										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Name</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['enq_name'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Mobile</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['enq_mob'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Email</td>
											<td style="padding: 5px;  word-break: break-all;" class="auto-style2"><?=$row['enq_email'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Phone</td>
											<td style="padding: 5px;" class="auto-style2"><?=$brand1." ".$model1;?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Description</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['enq_desc'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Status</td>
											<td style="padding: 5px;" class="auto-style2">
											<input name="cname" id="cname" type="hidden" value="<?=$row['enq_name'];?>">
							                <input name="bmodel" id="bmodel" type="hidden" value="<?=$brand1." ".$model1;?>"/>

												<select name="status" onclick="status1(this.value)" style="width:100%;padding:10px;border:1px solid#ddd;">
												<option value="">Select</option>
												<option value="0" <?php if($row['status']==0) echo "Selected";?>>Pending</option>
												<option value="1" <?php if($row['status']==1) echo "Selected";?>>Processed</option>
												<option value="2" <?php if($row['status']==2) echo "Selected";?>>Resolved</option>
												</select>
											</td>
										</tr>
										<tr id="sndtxt" style="display:one">
											<td style="padding: 5px;font-weight:bold" class="auto-style2">SMS for status change</td>
											<td><textarea name="tomsg" id="tomsg" class="form-control" style="border:1px solid#ddd" cols="20" rows="3"></textarea></td>
	                                   </tr>
										<tr>
											<td style="padding: 5px;" class="auto-style1" valign="top" colspan="2">
											<button name="Submit1" type="submit" value="Change Status" class="btn btn-primary mr5 waves-effect waves-effect">Update Status</button>
											<button name="delete" type="submit" value="Delete" class="btn btn-primary mr5 waves-effect waves-effect">Delete</button>
											</td>
										</tr>

										</table>
									</form>
							<div class="col-md-12">
							<table style="width:100%;float:left;" class="table-1">
								<tr>
								<td class="auto-style3">#</td>
								<td class="auto-style3">Date</td>
								<td class="auto-style3">Msg</td>
								</tr>
								<?php
								$sql="select * from soum_sms_log where sms_for_id=$enqid and type=3 order by sms_id desc";
								//echo $sql;
								$res=$db->query($sql);
								$i=1;
								while($row=$res->fetch_assoc())
								{

								$originalDate=$row['smsdt'];
                                $dt=date("d-m-Y h:i A", strtotime($originalDate));
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
							<!-- tab style -->
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
    								   var tval = '<?php echo $row['status']; ?>';
									   status1(tval);
									</script>
</body>
</html>
