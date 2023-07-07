<div class="right">
									<div class="btn-group dropdown" style="position: relative;display: inline-block;">
				                        <button class="btn btn-pink dropdown-toggle ion ion-help-buoy waves-effect" data-toggle="dropdown" aria-expanded="false">&nbsp;<span class="caret"></span></button>
				                      <?php
										if($_SESSION['poster_type']=="Admin")
										{
										?> 
									 	<ul class="dropdown-menu" style="right:0 !important;border: 1px solid#c1134e;margin-left: -120px;">
				                            <li style="border-bottom: 1px solid#c1134e;"><a href="../form_used.php">Ad Used Phone</a></li>
				                            <li style="border-bottom: 1px solid#c1134e;"><a href="../form_new.php">Ad New Phone</a></li>
				                            <li style="border-bottom: 1px solid#c1134e;"><a href="approv_dis.php">Product List</a></li>
				                            <li style="border-bottom: 1px solid#c1134e;"><a href="order.php">Order List</a></li>
				                            <li><a href="customer_master.php">Walkin Customers</a></li>
				                        </ul>
				                        <?php 
				                        }
				                        ?>
				                    </div>
				                </div>