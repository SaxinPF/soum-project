<?php
include("../config1.php");
include("../_mail_fire.php");
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
$type=$_REQUEST['type'];
if(isset($_REQUEST['delete']))
{
    $order=$_REQUEST['order'];
    $pid=$_REQUEST['pid'];
    $stock="select * from soum_product_master where prod_id=$pid";
     $ress=$db->query($stock);
     $rows=$ress->fetch_assoc();
     $cstock=$rows['current_stock'];

    $sql="delete from soum_order_master  where order_id=$order";
    $res=$db->query($sql);
    if($res)
    {

          $sqld="delete from soum_order_details where order_id=$order";
	      $resd=$db->query($sqld);



        	$ord="SELECT * FROM soum_order_master,soum_order_details
					WHERE soum_order_master.order_id=soum_order_details.order_id
					and soum_order_details.prod_id=$pid
					and soum_order_master.status=3";
            $reso=$db->query($ord);
            if(mysqli_num_rows($reso)<=0)
            {

			    $totstock=$cstock+1;
				$upd_stock="update soum_product_master set current_stock=$totstock,deal='0' where prod_id=$pid ";
				$db->query($upd_stock);
	         }


	  //header("location:order.php");
      echo "<script>window.location.href='order2.php';</script>";
	}
}
if(isset($_REQUEST['archive']))
{
	$order=$_REQUEST['aorder'];


	$sql="update soum_order_master set archive='1' where order_id=$order";
	$res=$db->query($sql);
	if($res)
	{
	  //header("location:order.php");
      echo "<script>window.location.href='order2.php';</script>";
	}
}



if(isset($_REQUEST['submit']))
{

 $oid=$_REQUEST['oid'];
$msg=$_REQUEST['tomsg'];
$dt=date("Y-m-d H:i:s");

	$sql="insert into soum_sms_log(smsdt,type,sms_for_id,status,msg)values('$dt','calls','$oid','','$msg')";
	$res=$db->query($sql);
	//echo $sql;
	if($res)
	{
	    $sql1="update soum_order_master set calls='1' where order_id=$oid";
        $res1=$db->query($sql1);
	    //echo $sql1;

	  //header("location:order.php");
     echo "<script>window.location.href='order2.php';</script>";
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
<script>
function status(val)
{
   var token=$("#token").val();
   var name=$("#cname").val();
   var bm=$("#bmodel").val();
   var sellername = $("#sellername").text();
   var sellermob = $("#sellermob").text();

  if(val==0)
  {
    $("#tomsg").val('Thanks for choosing SOUM for all kind of mobile services.');
  }
  else if(val==1)
  {
   $("#tomsg").val("Dear "+name+", Thanks for showing your interest in "+bm+". Please visit our Store at Gaurav Tower, Jaipur. For any enquiry contact us at 9828075008/9829300040. Soum 4 u");
  }
  else if(val==2)
  {
  $("#tomsg").val('We tried to make a contact with you but somehow it went no answer. If you are still interested in purchasing '+bm+' please contact us on 9828075008/9829300040. Soum 4 u');

  }
  else if(val==3)
  {
    $("#tomsg").val("Welcome to SOUM family! Congratulations for your "+bm+" . For any further queries, call us at 9828075008/9829300040. Thanks Soum 4 u");

  }
  else if(val==4)
  {
    $("#tomsg").val("Dear "+name+", we are sorry to convey that  "+bm+" is sold out. We will soon contact you once it is available. For any enquiry contact us on 9828075008/9829300040. Soum 4 u");

  }
  else if(val==5)
  {
    $("#tomsg").val("");
  }
   else if(val==7)
  {
    $("#tomsg").val("Dear "+name+", Thanks for showing your interest in "+bm+" . Contact Mr. "+sellername+" on "+sellermob+" for this device. For any further inquiries please contact at 9828075008/9829300040. Thank you - Team SOUM.");
  }
  else if(val==8){
      $("#tomsg").val("Thanks for reaching us out. Soum team.");
  }
 }
function change_status()
{
  var ordid='<?=$_REQUEST['order_id']?>';
  var status=$("#status").val();
  var msg=$("#tomsg").val();
  var mob=$("#tomob").val();
  var advance=$("#advance").val();
  var ref=$("#advance_ref").val();
  var cstock=$("#cstock").val();
  var buyer_name=$("#cname").val();
  var bam=$("#bmodel").val();
  var type=2;

  if(cstock==0 && status==3)
  {
   alert("Quantity is not available");
   return false;
  }

  $.ajax({

        type:'POST',
        url:'change_status.php',
        data:'status='+status+'&msg='+msg+'&mob='+mob+'&advance='+advance+'&ref='+ref+'&ordid='+ordid+'&type='+type+'&buyer_name='+buyer_name+'&bam='+bam,

        success:function(data)
        {
          if(data)
          window.location.href="order2.php";
        }

  });

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
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top:0px;">Order Details</h3>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
						<!-- style three -->
						<div class="col-md-12 mb30" style="background:#fff;padding:20px;">
						<!-- tab style -->
						<?php
							   $order_id=$_REQUEST['order_id'];
							   $pid=$_REQUEST['pid'];
						       $qry1="select * from soum_order_master,soum_master_customer
								where soum_order_master.cust_id=soum_master_customer.cust_id
								and soum_order_master.order_id=$order_id";
								//echo $qry;
								$res1=$db->query($qry1);
								$row1=$res1->fetch_assoc();
								$token=$row1['order_token'];

								 $dob_by_chris=$row1['order_date'];
											$b_y=substr($dob_by_chris,0,4);
											$b_m=substr($dob_by_chris,5,2);
											$b_d=substr($dob_by_chris,8,2);
											$b_t=substr($dob_by_chris,11,8);
											$order_dt=$b_d."-".$b_m."-".$b_y." ".$b_t;
								$name=$row1['fname'];
								$cname=$row1['fname'];
								$mail=$row1['mail'];
								$mob=$row1['mobile'];
								$add=$row1['shipping_address'];
                                $status=$row1['status'];
                               $desc=$row1['description'];


                        ?>
						<div class="col-md-6">
							<h3>Client Information</h3>
							<table class="box-1" style="width:100%;">
								<tr style="background:#ddd">
									<td style="width: 36%">Token ID</td>
									<td><?=$token;?></td>
								</tr>
								<tr>
									<td style="width: 36%">Order_date</td>
									<td><?=$order_dt;?></td>
								</tr>
								<tr style="background:#ddd">
									<td style="width: 36%">Name</td>
									<td><?=$name;?></td>
								</tr>
								<tr>
									<td style="width: 36%">Contact email</td>
									<td><?=$mail;?></td>
								</tr>
								<tr style="background:#ddd">
									<td style="width: 36%">Contact number </td>
									<td><?=$mob;?></td>
								</tr>
								<tr >
									<td style="width: 36%">Shipping address</td>
									<td><?=$add;?></td>
								</tr>
								</table>
						</div>

						<?php

							   $pid=$_REQUEST['pid'];
						       $qry1="select * from soum_product_master where prod_id=$pid";
								//echo $qry;
								$res1=$db->query($qry1);
								$row1=$res1->fetch_assoc();
								$utype=$row1['poster_type'];
								$cid=$row1['poster_id'];
								$cstock=$row1['current_stock'];

								//echo $utype."/".$cid;

								if($utype=='Customer')
								{
								$qry2="select * from soum_master_customer where cust_id=$cid";
								}
								else if($utype=='Dealer')
								{
								$qry2="select * from soum_master_dealer where cust_id=$cid";
								}
								else if($utype=='Admin')
								{
								$qry2="select * from soum_master_admin where usr_id=$cid";
								}

								$res2=$db->query($qry2);
								$row2=$res2->fetch_assoc();
								$token2=$row2['reg_id'];
								$name=$row2['fname'];
								$mail=$row2['mail'];
								$mob=$row2['mobile'];


                        ?>

						<div class="col-md-6">
						<input name="cstock" id="cstock" value="<?=$cstock;?>" type="hidden" />
						<h3>Seller Information</h3>
						<?php if($pid==0){ echo "Walkin"; }else{ ?>
							<table class="box-1" style="width:100%;">
								<tr style="background:#ddd">
									<td>Token ID</td>
									<td><?=$token2;?></td>
								</tr>
								<tr>
									<td>Name</td>
									<td id="sellername"><?=$name;?></td>
								</tr>
								<tr  style="background:#ddd">
									<td>Contact email</td>
									<td><?=$mail;?></td>
								</tr>
								<tr>
									<td>Contact number </td>
									<td id="sellermob"><?=$mob;?></td>
								</tr>
								</table>
								<?php } ?>

						</div>


							<div class="col-md-12">
							<h3>List of products under this order</h3>

						    <div class="table-responsive">
							<table class="table table-bordered invoice-table mb30" id="list-1" style="width: 100%">
									<thead>
										<tr style="background: #38b4ee;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Image</th>
											<th style="padding:5px;">Brand</th>
											<th style="padding:5px;">Model</th>
											<th style="padding:5px;">Price (in Rs.)</th>
											<th style="padding:5px; width:60%;">Description</th>

										</tr>
									</thead>
									<tbody>
									<?php
									 $order_id=$_REQUEST['order_id'];
									 $prod_id=$_REQUEST['pid'];
									 if($prod_id!=0)
                                     {
                     			       $qry="select temp4.*,soum_prod_subsubcat.prod_subcat_desc model,
                                       if (temp4.order_type='new', soum_prod_subsubcat.p_img1, temp4.images) imagesx
										 from (
										select temp3.*,soum_prod_subcat.prod_subcat_desc brand_name from (
										select temp2.*,code,images,brand,modal,modal_name from
										(select temp.*,prod_id,qty,price from
										(select * from soum_order_master where order_id=$order_id ) temp
										left outer join soum_order_details
										on temp.order_id=soum_order_details.order_id) temp2
										left outer join soum_product_master
										on soum_product_master.prod_id=temp2.prod_id	 )temp3
										left outer join soum_prod_subcat
										on temp3.brand=soum_prod_subcat.prod_subcat_id )temp4
										left outer join soum_prod_subsubcat
										on temp4.modal=soum_prod_subsubcat.prod_subsubcat_id";
									}
									else
									{
									 $qry="select temp.*,soum_product_master.images imagesx,
									if(soum_product_master.brand='0' || isnull(soum_product_master.brand),'other',soum_product_master.brand) brand_name,
									if(soum_product_master.modal='0' || isnull(soum_product_master.modal),temp.prod_name,soum_product_master.modal) model
									from( select soum_order_master.order_id,soum_order_master.order_date,soum_order_master.order_type,soum_order_master.status,soum_order_master.exc_prod,soum_order_master.exc_prod_amt,
									soum_order_details.prod_id,soum_order_details.prod_name,soum_order_details.qty	,soum_order_details.price
									from  soum_order_master,soum_order_details
									where soum_order_master.order_id=soum_order_details.order_id and soum_order_master.order_id=$order_id) temp
									left outer join soum_product_master
									on temp.prod_id=soum_product_master.prod_id";

									}
										//echo $qry;
										$res=$db->query($qry);
										$i=0;
										$tot=0;
										$grand_tot=0;
										while($row=$res->fetch_assoc())
										{
											$i++;
											$dob_by_chris=$row['order_date'];
											$b_y=substr($dob_by_chris,0,4);
											$b_m=substr($dob_by_chris,5,2);
											$b_d=substr($dob_by_chris,8,2);
											$ord_dt=$b_d."-".$b_m."-".$b_y;

											$price=$row['price'];
											$mob=$row['mobile'];
											$qty=$row['qty'];
											$amt=$price*$qty;
											$tot= $tot+$amt;
											$status=$row['status'];
											$exc_prod=$row['exc_prod'];
                                            $exc_amt=$row['exc_prod_amt'];

											if($row['category_type']=='phone'){
                                                $bm = $row['brand_name']." ".$row['model'];
											    $modal_name =     $row['model'];
											}else{
											    $bm = $row['brand_name']." ".$row['modal_name'];
												$modal_name =     $row['modal_name'];
											}

										?>
										     <tr>
											 <td><?=$i;?></td>
										     <td><img src="../upload/<?=$row['imagesx'];?>" title="Image Title" style="width:auto;height:50px;"/></td>
										     <td><?=$row['brand_name'];?></td>
										     <td><?php echo $modal_name;?></td>
										     <td style="text-align:right"><?=$price;?></td>
										     <td style="text-align:left; width:60%;"><?=$desc;?></td>

										</tr>
									<?php
									}

									?>
						</table>
						</div>
						<div class="col-md-12" style="text-align:right;margin-top: -25px;margin-bottom: 20px;"><a href="phone_detail.php?prod_id=<?=$prod_id;?>&poster_id=<?=$prod_id;?>&type=">Phone Details</a></div>


						<?php
						if($poster_type=='Admin')
						{
						?>
						<div class="col-md-6">
							<h3 style="margin-top: -10px;">Update Status</h3>
							<input name="cname" id="cname" type="hidden" value="<?=$cname;?>">
							<input name="bmodel" id="bmodel" type="hidden" value="<?=$bm;?>">
							<div class="clearfix tabs-fill">
							<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">Change Status</a></li>
									<li><a href="#tab-flip-two-1" data-toggle="tab">Reply on Phone</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-flip-one-1">
									<table style="width: 100%" class="box-1">
                                   <tr>
									<td style="width:50%;">Status Type:</td>
									<td style="width:50%;"><select name="status" id="status" onchange="status(this.value)" class="form-control">
												<option value="0" <?php if($status==0) echo 'Selected';?>>Pending</option>
												<option value="1" <?php if($status==1) echo 'Selected';?>>Available</option>
												<option value="2" <?php if($status==2) echo 'Selected';?>>Waiting</option>
												<option value="3" <?php if($status==3) echo 'Selected';?>>Dispatched</option>
												<option value="4" <?php if($status==4) echo 'Selected';?>>Sold Out</option>
											    <!-- <option value="5" <?php if($status==5) echo 'Selected';?>>Non-Responsive</option> -->
											    <!-- <option value="7" <?php if($status==7) echo 'Selected';?>>Phone Transfer</option> -->
											    <!--<option value="8" <?php if($status==8) echo 'Selected';?>>Unavailable</option> -->
												</select></td>
                                   </tr>
                                   <tr id="sndtxt" style="display:one">
									<td style="width:50%;">SMS for status change</td>
									<td style="width:50%;"><input name="token" id="token" type="hidden" value="<?=$token;?>"><input name="tomob" class="form-control" id="tomob" type="text" value="<?=$mob;?>"><textarea name="tomsg" id="tomsg" style="height:150px" class="form-control" rows="1"></textarea></td>
                                   </tr>
                                   <tr>
									<td colspan="2" style="text-align:center">
										<button type="button" onclick="change_status()" value="Change Status" name="submit" class="btn btn-primary mr5 waves-effect waves-effect" style="float: none;margin-right:10px;">Change Status</button>
									</td>
                                   </tr>
								</table>									</div>
									<div class="tab-pane" id="tab-flip-two-1">

									<form method="post">
									<table style="width: 100%" class="box-1">
		                                   <tr id="sndtxt" style="display:one">
											<td>Status change</td>
											<td><input name="oid" id="oid" type="hidden" value="<?=$order_id;?>"><textarea name="tomsg" id="tomsg" class="form-control"  rows="7"></textarea></td>
		                                   </tr>
		                                   <tr>
											<td colspan="2" style="text-align:center">
												<button type="submit"  value="Change Status" name="submit" class="btn btn-primary mr5 waves-effect waves-effect" style="float: none;margin-right:10px;">Change Status</button>
											</td>
		                                   </tr>
								</table>
							 </form>
                                    </div>
                                   </div>
                                </div>

						</div>
						<?php } ?>

						<div class="col-md-6">
						<?php
									if($exc_prod!='')
									{
									echo "Exchange product ".$exc_prod." @ Rs.".$exc_amt."";
									}
									if($poster_type=='Admin')
									{
									?>

								  <form method="post">
											<button style="display:none;" type="submit" value="Archive Order" name="archive" class="btn btn-primary mr5 waves-effect waves-effect" style="float: right;margin-right:10px;">Archive O
											rder</button>
									        <input type="hidden" name="aorder" value="<?=$order_id;?>">

                                  </form>
		                         <?php } ?>
									<form method="post">
									<input name="pid" type="hidden" value="<?=$pid;?>"/>
											<button type="submit" value="Order Cancel" name="delete" class="btn btn-primary mr5 waves-effect waves-effect" style="float: right;margin-right:10px;">Cancel Order </button>
									        <input type="hidden" name="order" value="<?=$order_id;?>">

                                   </form>
                                   <div class="col-md-12">
							<table style="width:100%;float:left;" class="table-1">
								<tr>
								<td class="auto-style1">#</td>
								<td class="auto-style1">Dttm</td>
								<td class="auto-style1">SMS(green)Reply(red)</td>
								</tr>
								<?php
								$sql="select * from soum_sms_log where sms_for_id=$order_id and ( type=2 or type='calls') order by sms_id desc";
								//echo $sql;
								$res=$db->query($sql);
								$i=1;
								while($row=$res->fetch_assoc())
								{
								$originalDate=$row['smsdt'];
                                $dt=date("d-m-Y h:i A",strtotime($originalDate));

                                if($row['type']=='calls'){ $color='Red'; }else{ $color='Green'; }
								?>
								<tr>
								<td><?=$i++;?></td>
								<td><?=$dt;?></td>
								<td style="font-weight:bold;color:<?=$color;?>"><?=$row['msg'];?></td>
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
                                    <script>
    								   var tval = '<?php echo $status; ?>';
									   status(tval);
									</script>
</body>
</html>

