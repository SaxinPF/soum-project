<?php include("../config2.php");
$rid=$_REQUEST['rid'];
$status=$_REQUEST['status'];
$service=$_REQUEST['service'];
$mob=$_REQUEST['mob'];
$tomsg=$_REQUEST['tomsg'];
$token="REP".str_pad ($rid,4,'0', STR_PAD_LEFT);
$dt=date("Y-m-d H:i:s");

if(isset($_REQUEST['Submit1']))
{
  $sqlupd="update soum_phone_repairing set status='$status',service_center_id='$service' where repairing_id='$rid'";
  $res=$db->query($sqlupd);
  if($res)
  {
     //***************************************************************************************************

       $message = urlencode($tomsg);
       $ret =  sms_api($mob,$message);

       $sql="insert into soum_sms_log(smsdt,type,sms_for_id,status,msg)values('$dt','4','$rid','$status','$tomsg')";
       $res=$db->query($sql);
     //******************************************************************************************************



     echo "<script>window.location.href='repair_list.php';</script>";
    //header("location:repair_list.php");

  }
}


if(isset($_REQUEST['delete']))
{
  $sqlupd="delete from soum_phone_repairing where repairing_id='$rid'";
  $res=$db->query($sqlupd);
  if($res)
  {

       $msg='Status for Repairing Id '.$token.' has been updated to "Delete".  Thank you - Team Soum.';


       $message = urlencode($msg);
        $ret =  sms_api($mob,$message);
     //******************************************************************************************************


    echo "<script>window.location.href='repair_list.php';</script>";

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
<?php
	            $sql122="select * from soum_servicecenter";
				$res122=$db->query($sql122);
				$add1 ='';
				$add2 ='';
				while($row122=$res122->fetch_assoc())
				{
				    if($row122['sc_id']==1){
						$add1 =$row122['address'];
					}
					 if($row122['sc_id']==2){
						$add2 =$row122['address'];
					}
				}

 ?>
<script>
 var add1=  '<?php echo $add1;  ?>';
 var add2=  '<?php echo $add2;  ?>';
function status1(Add_Id)
{
   var token=$("#token").val();
   var status=$('#stus :selected').text();
   var name=$("#cname").val();
   var bm=$("#bmodel").val();
   var val = $("#stus").val();
   var Add_Id = $("#Add_Id").val();
   Address ='';
   if(Add_Id==1){
    Address =add1;
   }
   if(Add_Id==2){
    Address =add2;
   }

   if(val==3)
   {
    $("#tomsg").val('Thanks for showing interest in all kind of mobile services. Please drop your mobile at '+Address+' Thank you SOUM Team.');
   }
   else if(val==1)
   {
     $("#tomsg").val('Your phone is repaired. Please visit our service center, '+Address+'. Thank you SOUM Team.');
   }
   else if(val==2)
   {
     $("#tomsg").val('Dear  '+name+', Status your phone '+bm+' has been updated to "'+status+'". Please visit our service center  to pick-up your device  at  A39 Ganpati Plaza, MI Road, Jaipur Phone: 7877777117.  Thank you - Team Soum.');
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
									<h3 class="mb5 text-light" style="margin-top:0px;">Repairing Details</h3>
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

                                 /*$upd="update soum_phone_repairing set visiable='1' where repairing_id=$rid";
                       	      $resp=$db->query($upd);*/
									$i=1;
									  $sql="select *,soum_prod_subsubcat.prod_subcat_desc model1 from (
										select temp.*,soum_prod_subcat.prod_subcat_desc brand1 from (
										select * from soum_phone_repairing where repairing_id=$rid)temp
										left outer join soum_prod_subcat
										on temp.brand=soum_prod_subcat.prod_subcat_id)temp2
										left outer join soum_prod_subsubcat
										on temp2.modal=soum_prod_subsubcat.prod_subsubcat_id";
										//echo $sql;
									   $res=$db->query($sql);
									   $row=$res->fetch_assoc();
									   $img=$row['image'];

									    $acc=$row['prob_type'];
                                        $access=substr($acc,0,strlen($acc)-1);
                                        //echo $access;
                                        if($access!='')
                                        {
										     $access1=explode(",",$access);
			                                 $access2='';
			                                 foreach($access1 as $a=>$b)
			                                 {
			                                   $sqla="select * from soum_phone_issue where issue_id=$b";
			                                   $resa=$db->query($sqla);
			                                   $row1=$resa->fetch_assoc();
			                                   $access2.=$row1['issue'].",";

			                                 }
		                                 }

									?>
									<form method="post">
									<input name="rid" type="hidden" value="<?=$rid;?>"/>
									<input name="mob" type="hidden" value="<?=$row['mobile_no'];?>"/>
                                    <input name="token" id="token" type="hidden" value="<?=$row['token_id'];?>">
                                    <div class="table-responsive">
									<table class="table table-bordered invoice-table mb60" id="list-1" align="center" style="width: 100%">

										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Token Id</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['token_id'];?></td>
											<td style="padding: 5px;" rowspan="10">Attached Image
											<img src="../upload/repair/<?php if($row['image']=='') echo 'no_img.png'; else echo $row['image'];?>" style="width:100px;height:auto;"></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">											Name</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['fname'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Mobile</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['mobile_no'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Email</td>
											<td style="padding: 5px; word-break: break-all;" class="auto-style2"><?=$row['email'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Address</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['adress'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">
											Phone</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['brand1']." ".$row['model1'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Problem</td>
											<td style="padding: 5px;" class="auto-style2"><?=$access2;?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Description</td>
											<td style="padding: 5px;" class="auto-style2"><?=$row['description'];?></td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Status</td>
											<td style="padding: 5px;" class="auto-style2">
											<input name="cname" id="cname" type="hidden" value="<?=$row['fname'];?>">
							                <input name="bmodel" id="bmodel" type="hidden" value="<?=$row['brand1']." ".$row['model1'];?>"/>

												<select name="status" id="stus"  onclick="status1(0)"  style="width:100%;padding:10px;border:1px solid#ddd;">
												<option value="">Select</option>
												<?php
												$sql2="select * from soum_repair_status_master order by rs_id desc";
												$res2=$db->query($sql2);
												while($row2=$res2->fetch_assoc())
												{ $status1 = $row['status'];
												?>
												<option value="<?=$row2['rs_id'];?>"
                                                <?php if($row['status']==$row2['rs_id']) echo 'Selected';?> class="auto-style2">
                                                <?=$row2['status'];?></option>
												<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td style="padding: 5px;font-weight:bold" class="auto-style2">Service Center</td>
											<td style="padding: 5px;" class="auto-style2">
												<select name="service" id="Add_Id" onclick="status1(this.value)" style="width:100%;padding:10px;border:1px solid#ddd;">
												<option value="">Select</option>
												<?php
												$sql1="select * from soum_servicecenter";
												$res1=$db->query($sql1);
												while($row1=$res1->fetch_assoc())
												{
												?>
												<option value="<?=$row1['sc_id'];?>"  <?php if($row['service_center_id']==$row1['sc_id']) echo 'Selected';?> class="auto-style2"><?=$row1['service_center_name'];?></option>
												<?php } ?>
												</select>
											</td>
										</tr>
										<tr id="sndtxt" style="display:one">
											<td style="padding: 5px;font-weight:bold" class="auto-style2">SMS for status change</td>
											<td><textarea name="tomsg" id="tomsg" class="form-control" style="border:1px solid#ddd" cols="20" rows="3"></textarea></td>
	                                   </tr>

										<tr>
											<td colspan="3" style="padding: 5px;" class="auto-style1" valign="top">
											<button name="Submit1" type="submit" value="Change Status" class="btn btn-primary mr5 waves-effect waves-effect">Update Status</button>
											<button name="delete" type="submit" value="Delete" class="btn btn-primary mr5 waves-effect waves-effect">Delete</button>
											</td>
										</tr>
									</table>
									</div>
									</form>

									<div class="col-md-12">
							<table style="width:100%;float:left;" class="table-1">
								<tr>
								<td class="auto-style3">#</td>
								<td class="auto-style3">Date</td>
								<td class="auto-style3">Msg</td>
								</tr>
								<?php
								$sql="select * from soum_sms_log where sms_for_id=$rid and type=4 order by sms_id desc";
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
				   var tval = '<?php echo $status1; ?>';
				   status1(tval);
				</script>
</body>
</html>
