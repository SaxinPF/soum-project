<?php
include('../config2.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
//echo $_SESSION['user_name'];
                        $type = 'Dealer';
                      $sql="select if (count(1) =0,0,sum(if (active,0,1))) not_approved_adv , count(1) total_adv from soum_product_master where poster_type='$type' and soum_product_master.trash!='delete'";
                      $res=$db->query($sql);
                      $row=$res->fetch_assoc();
                      ?>
            		<!-- mini boxes -->
						<div class="co-md-12" style="margin-top:-20px;">
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-default mb20 mini-box panel-hovered">
								<a href="dealer_links.php">
								<div class="panel-body">
									<div class="clearfix">
										<div class="info left" >
											<h4 class="mt0 text-primary text-bold" style="font-size: 30px;text-align:center"><?=$row['not_approved_adv'];?></h4>
											<h5 class="text-light mb0" style="font-size:18px;">Dealer</h5>
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
											<h5 class="text-light mb0" style="font-size:18px;">Orders</h5>
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

					</div>
