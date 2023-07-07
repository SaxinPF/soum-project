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
						<a href="repairing_dashboard.php">
							<i class="ion ion-monitor"></i>
							<span class="text">Dashboard</span>
						</a>
					</li>
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