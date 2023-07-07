<?php
include('../config2.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
//echo $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Admin Template">
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
.report td {
    border: 1px solid#ddd;
    padding: 5px;
}
.form-control {
    border:1px solid#ddd;
}
.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 180px;
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
.auto-style3 {
    border: 1px solid #000000;
}
.track-1 td {
    border:1px solid#ddd;
    padding:5px;
}
.white-box {
    position: relative;
    height: 230px;
    width: 450px;
    background-color: #ffffff;
    box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -o-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -ms-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -moz-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    -webkit-box-shadow: 0 4px 18px rgba(33, 33, 33, .3);
    padding:10px;
    padding-top:20px;
    overflow: hidden;
    background-image: url('../images/map-small.png');
    background-repeat: no-repeat;
    background-size: cover;
}
.track-logo {
    position: relative;
    margin: 0px auto;
    height: 120px;
    width: 100%;
    text-align: left;
    margin-bottom: 5px;
}
.box-heading {
    font-size:26px;
    line-height: 30px;
    color: #212121;
    opacity: 0.75;
    margin-bottom: 10px;
    text-align: center;
    text-transform: uppercase;
    width:auto;float:right;
}
.box-tagline {
    font-size: 14px;
    text-align: center;
    line-height: 28px;
    margin-bottom: 15px;
    color: #212121;
    opacity: 0.75;

}
.track-form input {
    background-color: transparent;
    border: 0px solid transparent;
    color: #757575;
    position: relative;
    width: 100%;
    font-size: 16px;
    padding: 10px 0;
    border-bottom: 2px solid #757575;
    text-transform: uppercase;
}
.search_btn {
    background: transparent none repeat scroll 0 0;
    border: medium none;
    float: right;
    position: absolute;
    right: 20px;
    top: 20px;
}
ShippingIcon.full.css:1
.icon {
    font-family: 'ShippingIcon';
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
#wrapper1 {
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.8);
}
#wrapper1 #docket {
    text-align: center;
}
#docket .doc-data {
    font-size: 28px;
    font-weight: bold;
    letter-spacing: 2px;
    padding: 20px 0;
}
.doc-data .doc-no {
    color: #f48221;
    padding-left: 10px;
}
.track-bkg{
    min-height: 450px;
    background: rgba(0, 0, 0, 0) url('../images/track-bkg.jpg') no-repeat center center / cover;
    border:1px solid#ddd;
/*    background-image: url('images/track-bkg.jpg');
    background-size: cover;*/
}
#lastcenter-detail {
    /*background: #fff none repeat scroll 0 0;
    border: 2px solid #f48221;
    border-radius: 10px;*/
    margin: auto;
    padding: 10px;
    width: 100%;

}
.track-1 td {
    border:1px solid#ddd;
    padding:6px;
    text-align:left;
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
						<div class="col-md-12" style="margin-top:20px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h3 class="mb5 text-light" style="margin-top: 0px;">Admin Dashboard</h3>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> <!-- #end row -->
                      <?php
					  $type = 'Dealer';
                      $sql="select if (count(1) =0,0,sum(if (active,0,1))) not_approved_adv , count(1) total_adv from soum_product_master where poster_type='$type' and soum_product_master.trash!='delete'";
                      $res=$db->query($sql);
                      $row=$res->fetch_assoc();
                      ?>
					<!-- mini boxes -->
					<div id="box-new" class="col-md-12">
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="dealer_links.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" >
										    <h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center"><?=$row['not_approved_adv'];?></h4>
    										<h5 class="text-light mb0" style="font-size:18px;">Dealers</h5>
										</div>
										<div class="right ion ion-ios-person-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-primary">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>
                      <?php
                      $sql="select if (count(1) =0,0,sum(if(status=0 && archive=0,1,0))) pending_order, count(1) total_orders  from
											soum_order_master, soum_order_details,
											soum_product_master, soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id	";
                      $res=$db->query($sql);
                      $row=$res->fetch_assoc();


                          				              $sql="select if (count(1) =0,0,sum(if(status=6 && archive=0,1,0))) pre_order, count(1) total_orders  from
											soum_order_master, soum_order_details,
											soum_product_master, soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id	";
                      $res_pre=$db->query($sql);
                      $row_pre=$res_pre->fetch_assoc();



                      ?>

						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="order.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
                                            <h4 class="mt0 text-success text-bold" style="font-size: 30px;text-align:center"><?=$row['pending_order'].' + '.$row_pre['pre_order'];?></h4>
											<h5 class="text-light mb0" style="font-size:18px;">Orders(Phones)</h5>
										</div>
										<div class="right ion ion-ios-people-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-success">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>
                     <?php
                      $sql	=	"select if (count(1) =0,0,sum(if(!status,1,0))) enq_pending, count(1) tot_enq from soum_enquire where status!=2";
                      $res	=	$db->query($sql);
                      $row	=	$res->fetch_assoc();
                      ?>

						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="enquire_list.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
                                        <h4 class="mt0 text-info text-bold" style="font-size: 30px;text-align:center"><?=$row['enq_pending'];?></h4>
											<h5 class="text-light mb0" style="font-size:18px;">Enquiries</h5>
										</div>
										<div class="right ion ion-ios-albums-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-info">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>
                        <?php
                        $sql1="select if (count(1) =0,0, sum(if(status=0,1,0))) repairuv, count(1) repair from soum_phone_repairing where status!=2";
                      $res1=$db->query($sql1);
                      $row1=$res1->fetch_assoc();

                        ?>
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="repair_list.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
                                            <h4 class="mt0 text-pink text-bold" style="font-size: 30px;text-align:center"><?=$row1['repairuv'];?></h4>
											<h5 class="text-light mb0" style="font-size:18px;">Repairs</h5>
										</div>
										<div class="right ion ion-ios-gear-outline icon"></div>
									</div>
								</div>
								<div class="panel-footer clearfix panel-footer-sm panel-footer-pink">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>
						<!-- #end mini boxes -->
					</div> <!-- #end row -->
		        	<?php
                        $sql1="SELECT if (count(1) =0,0,sum(if (enquiry_type='Feedback' && status=0,1,0))) feedback,
								if (count(1) =0,0,sum(if (enquiry_type='Enquiry' && status!=2,1,0))) enquiry,
								if (count(1) =0,0,sum(if (enquiry_type='Complaint' && status=0,1,0))) complaint,
								if (count(1) =0,0,sum(if (enquiry_type='PreLaunch' && status=0,1,0))) PreLaunch

								FROM soum_feedback";

                      $res1=$db->query($sql1);
                      $row1=$res1->fetch_assoc();

                    ?>

					    <div class="col-md-12" style="margin-top:20px;">
                           <?php
                      $sql="select if (count(1) =0,0,sum(if(status=0 && archive=0,1,0))) pending_order, count(1) total_orders  from
											soum_order_master, soum_order_details,
											soum_product_master
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
										and soum_order_master.category_type!='phone'	";
                      $res=$db->query($sql);
                      $rowg=$res->fetch_assoc();
                    ?>
  <div class="col-md-3 col-sm-6">
    						<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="order2.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" >
                                     	       <h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center"><?=$rowg['pending_order'];?></h4>
        								<h5 class="text-light mb0" style="font-size:18px;">Orders(Gadgets)</h5>
										</div>
										<div class="right ion ion-ios-person-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-primary">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>

                        <div style="display:none;" class="col-md-3 col-sm-6">
    						<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="feedback_list.php?type2=Feedback">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" >
                                     	       <h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center"><?php echo $row1['feedback']+$row1['complaint'] ?></h4>
        								<h5 class="text-light mb0" style="font-size:18px;">Contact</h5>
										</div>
										<div class="right ion ion-ios-person-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-primary">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="pre_launch_main.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" >
                                       <h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center"><?php echo $row1['PreLaunch'] ?></h4>
											<h5 class="text-light mb0" style="font-size:18px;">Pre-Launch</h5>
										</div>
										<div class="right ion ion-ios-person-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-pink">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>

                            	<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="requirement_list.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
                                        <p></p>
                                        <br>
											<h5 class="text-light mb0" style="font-size:18px;">Phone Requirement</h5>
										</div>
										<div class="right ion ion-ios-gear-outline icon"></div>
									</div>
								</div>
								<div class="panel-footer clearfix panel-footer-sm panel-footer-success">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>

					  <?php
					  $type = 'Customer';
                      $sql="select if (count(1) =0,0,sum(if (active,0,1))) not_approved_adv , count(1) total_adv from soum_product_master where poster_type='$type' and soum_product_master.trash!='delete'";
                      $res=$db->query($sql);
                      $row=$res->fetch_assoc();
                      ?>

                        <div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="approv_dis_customer.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
                                     	<h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center"><?=$row['not_approved_adv'];?></h4>
        									<h5 class="text-light mb0" style="font-size:18px;">Interested in selling</h5>
										</div>
										<div class="right ion ion-ios-albums-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-info">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>
 <?php
    				  $type = 'Admin';
                      $sql="select if (count(1) =0,0,sum(if (active,0,1))) not_approved_adv , count(1) total_adv from soum_product_master where poster_type='$type' and soum_product_master.trash!='delete'";
                      $res=$db->query($sql);
                      $row=$res->fetch_assoc();
                      ?>

            <div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="products.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">
<h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center">&nbsp;&nbsp;</h4>
            							<h5 class="text-light mb0" style="font-size:18px;">Products</h5>
										</div>
										<div class="right ion ion-ios-gear-outline icon"></div>
									</div>
								</div>
								<div class="panel-footer clearfix panel-footer-sm panel-footer-success">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>


<div class="col-md-3 col-sm-6">
        					<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="customer_master.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" >
    <h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center">&nbsp;&nbsp;</h4>
        								<h5 class="text-light mb0" style="font-size:18px;">Customer</h5>
										</div>
										<div class="right ion ion-ios-person-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-primary">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>

    <div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="finance_list.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left">

                                         <h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center">&nbsp;&nbsp;</h4>

											<h5 class="text-light mb0" style="font-size:18px;">Finance</h5>
										</div>
										<div class="right ion ion-ios-gear-outline icon"></div>
									</div>
								</div>
								<div class="panel-footer clearfix panel-footer-sm panel-footer-success">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>


                        <div class="col-md-3 col-sm-6">
    						<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" >
                                            <h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center">&nbsp;&nbsp;</h4>

                                        	<h5 class="text-light mb0" style="font-size:18px;">Accounts</h5>
										</div>
										<div class="right ion ion-ios-person-outline icon"></div>
									</div>
								</div>

								<div class="panel-footer clearfix panel-footer-sm panel-footer-pink">
									<p class="mt0 mb0 left">View Details</p>
								</div></a>
							</div>
						</div>



						</div>
						<div class="col-md-12" style="margin-top:20px;">
							<div class="dash-head clearfix mb20">
								<div class="left" style="display:one">
								<form method="get" action="imei_wise_report.php">
								Enter IMEI No.
								<input name="imei" type="text" />
								<input name="Submit1" type="submit" value="submit" />
                                </form>
								</div>
							</div>
						</div>


                     <?php
                     $tot=0;
                     $used=0;
                     $new=0;
                      $sql3="select * from (
							select soum_order_master.order_id,soum_order_master.order_date,soum_order_master.cust_id,soum_order_master.fname,soum_order_master.mail,
							soum_order_master.mobile,soum_order_details.ord_det_id,soum_order_details.prod_id,sum(soum_order_details.price*soum_order_details.qty) tot
							from soum_order_master,soum_order_details
							where soum_order_master.order_id=soum_order_details.order_id
							and soum_order_master.active=1
							group by soum_order_master.order_id)temp
							left outer join soum_product_master
							on temp.prod_id=soum_product_master.prod_id";
                      $res3=$db->query($sql3);
                      while($row3=$res3->fetch_assoc())
                      {
                          $tot++;

                          if($row3['prod_cat_id']==1)
                          {
                            $new++;
                          }
                           if($row3['prod_cat_id']==2)
                           {
                             $used++;
                           }

                      }


                      ?>



						<!-- row -->

					<!-- #end row -->
					<div class="row" style="display:1one">
						<div class="col-md-12">
						<div class="panel-group" id="accordionDemo">
								<div class="panel-pink panel" style="display:none;">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="#collapseTwo5" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo">
												Track Order <i class="right mt2 ion small ion-chevron-right"></i>
											</a>
										</h4>
									</div>
									<div class="panel-collapse collapse in" id="collapseTwo5">
										<div class="panel-body track-bkg" style="padding:0px;min-height:auto;width:100%;">
										<div style="width:100%;float:left;padding:22px;background-color:rgba(255,255,255,0.7);">
											<div class="col-md-6">
												<div class="white-box-del">
													<div class="track-order">
													<div class="track-logo transition"> <img src="../images/barcod-icon.png" style="float:left;" ><h3 class="box-heading" style="float:left;">Track Your Package</h3>


													</div>
													<p class="box-tagline">Enter Your Token Number</p>
														<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0" style="float:none;">

															<div class="track-form">

												        		<input name="awb" id="track_id" placeholder="1234567890" required="" type="text">
												        		<button type="submit" class="icon icon-magnify fa fa-search" style="position: absolute;top: 20px;background: transparent;border: none;font-size: 18px;right:0;" onclick="track()"></button>
											        		</div>
										        		</div>
									        		</div>
									        	</div>
								        	</div>

											<div class="col-md-6" >
										        <div id="lastcenter-detail">
								                    <div class="white-box-del" style="padding:8px;width:90%;height:auto;margin:auto;float:none;padding-top:0px;">
								                        <div id="track_dtl"><h3 style="margin:0px;text-align:center;padding-top:8px;">Order Status</h3></div>
								                        <p style="padding-top: 0px;margin: 0px;font-size: 20px;display:none;" align="center">Token No. : <span id="trackid_dup" style="color: #f48221;padding-left: 10px;font-weight:bold;">NDR0001</span></p>
								                    </div>

									              </div>
									        </div>


											</div>



										</div>
									</div>
								</div>

								<div class="panel-pink panel" style="display:none;">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="#collapseTwo1" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo" id="mybutt">
											Quick Summary<i class="right mt2 ion small ion-chevron-right"></i>
											</a>
										</h4>
									</div>
									<div class="panel-collapse collapse" id="collapseTwo1">
										<div class="panel-body">

											<div class="clearfix tabs-fill">
												<ul class="nav nav-tabs">
													<li class="active"><a href="#tab-flip-tab0-1" data-toggle="tab">Recent Orders</a></li>
													<li><a href="#tab-flip-tab0-2" data-toggle="tab">Users Activity</a></li>
												</ul>
													<div class="tab-content" style="display: inline-block;width: 100%;">
														<div class="tab-pane active col-md-12" id="tab-flip-tab0-1" style="overflow:hidden">

													<div class="clearfix table-responsive">
										<table style="width:auto;float:right;margin-bottom:10px;">
									<tr><form method="post"><td style="padding-right:5px;"><input name="search" class="form-control" type="text" value="<?=$search;?>" /></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr></table>
						&nbsp;<table style="width: 100%;border:1px solid#ddd;" class="report">
						<tbody>
							<tr style="font-weight:bold;background-color:#f2f2f2;">
								<td>Sr No (Entry No)</td>
								<td>Model No</td>
								<td>Date</td>
								<td>Purchaed From</td>
								<td>Attachment</td>
								<td>Purc Price</td>
								<td>Sold to</td>
								<td>Sold Price</td>
							</tr>
							<?php
								$search=$_REQUEST['search'];
								if($search!='')
								{
								$conds="and (soum_prod_subcat.prod_subcat_desc like '%$search%' or soum_prod_subsubcat.prod_subcat_desc like '%$search%' or soum_order_master.status_upd_dt like '%$search%')";
								}

							$num_rec_per_page=5;
							if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
							$i=1+$start_from = ($page-1) * $num_rec_per_page;

									 $sql="select
										soum_order_master.order_id, soum_order_master.status_upd_dt,soum_prod_subcat.prod_subcat_desc, soum_prod_subsubcat.prod_subcat_desc as model,
										'Sale Date', poster_type, poster_id, source_id, soum_order_master.cust_id,soum_order_master.cust_type, soum_order_details.price, soum_order_master.`status`,
										soum_order_master.active, soum_order_master.deal
										from soum_order_master, soum_order_details, soum_product_master, soum_prod_subcat, soum_prod_subsubcat
										where
										soum_order_master.order_id=soum_order_details.order_id
										and soum_order_details.prod_id= soum_product_master.prod_id
										and soum_product_master.brand= soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id ".$conds ."  order by soum_order_master.status_upd_dt desc LIMIT $start_from, $num_rec_per_page";
									 //echo $sql;

									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									  $dd=$row['status_upd_dt'];
									  $y =substr($dd,0,4);
									  $m =substr($dd,5,2);
									  $d =substr($dd,8,2);
									  $t =substr($dd,11,8);
									  $dd=$d."/".$m."/".$y." ".$t;
									   ?>
								<tr>
								<td><?="ORD".$row['order_id'];?></td>
								<td><?=$row['prod_subcat_desc']." ".$row['model'] ;?></td>
								<td><?=$dd;?></td>
								<td><?=$row['poster_id'];?></td>
								<td><?=$row['Price'];?></td>
								<td><?=$row['price'];?></td>
								<td><?=$row['cust_id'];?></td>
								<td><?=$row['price'];?></td>
							</tr>
							<?php } ?>
						</tbody>
						</table>
						</div>

														</div>
														<div class="tab-pane col-md-12" id="tab-flip-tab0-2">

														<div class="clearfix table-responsive">
															<table style="width: 100%;border:1px solid#ddd;" class="report">
																<tr style="font-weight:bold;background-color:#f2f2f2;">
																	<td scope="col">UserName</td>
																	<td scope="col">Phone No</td>
																	<td scope="col">LastIpAddress</td>
																	<td scope="col">LastLoginDate</td>
																</tr>
																<tr>
																	<td>admin </td>
																	<td>9413748317 </td>
																	<td>103.218.252.84 </td>
																	<td>3/23/2017 10:08:42 AM </td>
																</tr>
																<tr>
																	<td>vivek </td>
																	<td></td>
																	<td>117.222.222.206 </td>
																	<td>3/20/2017 2:08:34 AM </td>
																</tr>
																<tr>
																	<td>swinn </td>
																	<td></td>
																	<td>103.218.252.101 </td>
																	<td>2/18/2017 7:17:26 AM </td>
																</tr>
																<tr>
																	<td>sanjay </td>
																	<td></td>
																	<td>117.197.0.229 </td>
																	<td>2/10/2017 4:48:09 AM </td>
																</tr>
																<tr>
																	<td>harsha </td>
																	<td></td>
																	<td>115.252.121.80 </td>
																	<td>1/25/2017 7:48:21 AM </td>
																</tr>
															</table>
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
					<!-- row -->
					 <!-- #end row -->

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


function track()
{
    track_id=$("#track_id").val();
       $.ajax({
           type:"POST",
           url:"_ajax_generic-track.php",
           data:"track_id="+track_id,

           success:function(data)
           {
           	$('#trackid_dup').html($('#track_id').val());
            $("#track_dtl").html(data);

           }

       });
}
setInterval(function(){
$(function(){
    // don't cache ajax or content won't be fresh
    $.ajaxSetup ({
        cache: false
    });
    //var ajax_load = "<img src='http://automobiles.honda.com/images/current-offers/small-loading.gif' alt='loading...' />";

    // load() functions
    var loadUrl = "dashboard2.php";
   //alert(loadUrl);
        $("#box-new").load(loadUrl);


// end
});
 }, 10000);

</script>

</body>
</html>
