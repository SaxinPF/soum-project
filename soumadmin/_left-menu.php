<aside class="nav-wrap" id="site-nav" data-perfect-scrollbar>
            <div class="nav-head" style="padding-left:0px;">
        		<!-- site logo -->
				<a href="index.php" class="site-logo text-uppercase">
					<img src="images/logo.png" style="width: 85%;display:none;">
					<img src="../images/soum-mobiles1.png" style="width: 85%;">
				</a>
			</div>
			<!-- Site nav (vertical) -->
			<nav class="site-nav clearfix" role="navigation">
				<div class="profile clearfix mb15" style="display:none;">
					<img src="images/admin.jpg" alt="admin">
					<div class="group">
						<h5 class="name">Robert Smith</h5>
						<small class="desig text-uppercase">UX Designer</small>
					</div>
				</div>
				<!-- navigation -->
				<?php
				if($_SESSION['poster_type']=="Admin")
				{
				?>
				<ul class="list-unstyled clearfix nav-list mb15">
					<li>
						<a href="../index.php">
							<i class="ion ion-home"></i>
							<span class="text">Home</span>
						</a>
					</li>
					<li class="active">
						<a href="dashboard.php">
							<i class="ion ion-monitor"></i>
							<span class="text">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<i class="ion ion-android-options"></i>
							<span class="text">Masters</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
                            <li><a href="subcat_master.php">Company/ Brand Master</a></li>
                            <li><a href="subsubcat_master.php">Phone Model Master</a></li>
							<!-- <li><a href="airpodmodel_master.php">Airpod Model Master</a></li>
							<li><a href="watchesmodel_master.php">Watches Model Master</a></li>
							<li><a href="tabletmodel_master.php">Tablets Model Master</a></li> -->
                            <li><a href="customer_master.php">Customer Master</a></li>
                           <!-- <li><a href="customer_master.php">Add. Customer Master</a></li>
                             <li><a href="offer_master.php">Offer Master</a></li> -->
                            <li><a href="repair_center_master.php">Repair Center Master</a></li>
							  <li><a href="banner_master.php">Banner Master</a></li>
							  <li><a href="change_status_master.php">Change Status Master</a></li>
                               <li style="display:none;"><a href="admin_adv.php">Admin Advertisement</a></li>
						</ul>
					</li>
			<!-- 		<li>
						<a href="javascript:;">
							<i class="ion ion-android-options"></i>
							<span class="text">Other Masters</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">

                            <li style="display:none;"><a href="financer_master.php">Financer Logo Master</a></li>
                          <li><a href="setting_service_master.php">Home Adv Settings</a></li>

                           <li><a href="pre_launch_offer.php">PreLaunch Master</a></li>
						</ul>
					</li> -->
					<li>
						<a href="javascript:;">
							<i class="ion ion-android-options"></i>
							<span class="text">Reports</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
                            <li><a href="report_order_summary.php">Order Summary</a></li>
                            <li><a href="report_order_summary_dtl.php">Order Summary Details</a></li>
                            <li><a href="report_stock.php">Stock</a></li>
							<li><a href="report_stock2.php">Day by Stock</a></li>
							<li><a href="report_activity.php">Activity Report</a></li>
							<li><a href="feedback_list.php?type2=Enquiry">Feedback/ Contact Us</a></li>
						</ul>
					</li>
					<!--<li>
						<a href="javascript:;">
							<i class="ion ion-android-options"></i>
							<span class="text">Phone Requirement</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
                            <li><a href="buyer_requirement.php">Buyer Requirement</a></li>
                            <li><a href="saler_requirement.php">Seller Requirement</a></li>
                            <li><a href="repair_requirement.php">Repair Requirement</a></li>
						</ul>
					</li>-->
				</ul>
				<?php
				}
				else
				{
				?>
				<ul class="list-unstyled clearfix nav-list mb15">
					<li>
						<a href="../index.php">	<i class="ion ion-home"></i><span class="text">Home</span></a>
					</li>
					<li>
						<?php
						if($_SESSION['poster_type']=='Dealer')
						{
						?>
							<a href="../dealer_dashboard.php"><i class="ion ion-monitor"></i><span class="text">Dashboard</span></a>
						<?php
						}
						else
						{
						?>
							<a href="../customer_dashboard.php"><i class="ion ion-monitor"></i><span class="text">Dashboard</span></a>
						<?php
						}
						?>
					</li>
				</ul>
				<?php
				}
				?>


				<!-- #end navigation -->
			</nav>
			<!-- nav-foot -->
			<footer class="nav-foot" style="display:none;">
				<p>2015 &copy; <span>SOUM</span></p>
			</footer>
		</aside>
