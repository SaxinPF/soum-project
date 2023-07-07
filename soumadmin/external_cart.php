<?php include('../config.php');
$user_id=$_SESSION['poster_id'];
$user_type=$_SESSION['poster_type'];
?>
<div class="col-md-12">
	<div id="div79" class="col75 floatleft paddingBottom15" style="width: 100%; padding-top: 20px;">
		<div>
			<div class="row">
				<div class="col-md-9">
				<?php
				
					
					$ord_id=$_SESSION['order_id'];
					
					foreach($_SESSION['cart'] as $product_id =>$quantity) 
					{ 
					$sno=$sno+1;
					$tot_qty;
					$selorder_item="select  
*,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type,
 if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 

from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.active=1 and soum_product_master.prod_id=$product_id";
						 					
					//echo $selorder_item;			
							
					$qry_order_item=$db->query($selorder_item);
					$row_order_item=$qry_order_item->fetch_assoc();
					
					$weight=round(($quantity*$row_order_item['Weight'])/1000);
					
					
					
					$real_rate=$row_order_item['appliable_rate'];
					if($row_order_item['dis_type']==1)
					  	{  	
					  		$disc_perc1=round(($row_order_item['discount']*$real_rate)/100);
					  		$disc_perc=$real_rate-$disc_perc1;
					  		$dis=$row_order_item['discount']." %";
					  	}
					  	else if($row_order_item['dis_type']==2)
					  	{
					  	   $disc_perc=$real_rate-$row_order_item['discount'];
					       $dis=$row_order_item['discount']." flat";
					  	}
					  	else
					  	{
					  	   $disc_perc=$row_order_item['appliable_rate'];
					       $dis='';
					
					  	}
					  	
					  	$tot_qty=$tot_qty+$quantity;
					  	
					  	$tol=$quantity*$disc_perc;
					    $grand_tot=$grand_tot+$tol;
					    
					?>
															<div style="background-color: #ddd; margin-bottom: 10px; padding: 10px; position: relative; float: left; width: 100%;">
																<div class="col-md-3" style="background-color: #fff; text-align: center">
																	<img src="../upload/<?=$row_order_item['imagesx'];?>" style="height: 138px; width: auto">
																</div>
																<div class="col-md-9">
																	<div id="item-cod" class="col-md-12">
																		<strong>
																		<?=$row_order_item['model'];?>
																		</strong>
																	</div>
																	<div class="col-md-4">
																		<div id="view-cart" class="col-md-12" style="padding: 0px;">
																			Items</div>
																		<div class="col-md-12" style="padding: 0px;text-align:left;">
																			<span style="font-size: 12px;">
																			<i style="color: #0015ff; font-weight: bold;"><?=$row_order_item['brand_name'];?>
																			</i>
																			<strong>
																			Colors</strong> 
																			: <?=$row_order_item['colour'];?>
																			<br>
																			Back 
																			Camera: <?=$row_order_item['bcame'];?>
																			,<br>
																			Front 
																			Camera: <?=$row_order_item['fcame'];?>
																			</span>
																		</div>
																	</div>
																	<div class="col-md-2">
																		<div id="view-cart0" class="col-md-12" style="padding: 0px;">
																			Qty</div>
																			<?=$quantity;?>
																		<div class="col-md-12" style="padding: 0px;display:none">
																			<input id="prod_qty<?=$product_id;?>" name="p_qty[]" style="width: 100%; border: 1px solid; text-align: center;" type="text" value="<?=$quantity;?>">
																			<input id="qty_act" class="btn bt1 btn-primary btn-normal btn-inline" name="qty_act" onclick="change_qty('<?=$product_id;?>')" style="width: 100%; padding: 5px; font-size: 10px; margin-top: 4px;" type="button" value="Update">
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div id="view-cart1" class="col-md-12" style="padding: 0px;">
																			Price</div>
																		<div class="col-md-12" style="padding: 0px;text-align:left;">
																			<span style="font-size: 12px; color: green">
																			<span style="color: red;">
																			MRP:
																			<strike><?=$real_rate;?>
																			</strike>
																			</span>
																			<br>
																			Offer 
																			Price: 
																			Rs <?=$disc_perc;?> 
																			(<?=$dis;?> 
																			Off)</span></div>
																	</div>
																	<div class="col-md-3">
																		<div id="view-cart2" class="col-md-12" style="padding: 0px;">
																			Sub 
																			Total</div>
																		<div class="col-md-12" style="padding: 0px;">
																			<span style="font-size: 18px;">
																			Rs.<?=$tol;?></span></div>
																	</div>
																	<div class="col-md-12" style="color: #787878; margin-top: 5px; padding-top: 7px; border-top: 1px solid#fff; width: 100%; text-align: right;">
																		Delivered 
																		in 3-5 
																		bussiness 
																		days
																	</div>
																</div>
																<input type="button" value="X" class="btn bt1 btn-primary btn-normal btn-inline " onclick="remove_item1('<?=$product_id;?>')" style="padding: 4px 10px; border-radius: 0px; position: absolute; right: 0; top: 0;" target="_self"/>
																</div>
															<?php } 
					
					
				
					$sql="select * from soum_master_customer where cust_id='$user_id'";
							
					$res=$db->query($sql);
					$row=$res->fetch_assoc();
					
					$name=$row['fname'];
					$email=$row['email'];
					$address=$row['address'];
					$city=$row['city'];
				    $mobile=$row['mobile'];					
					
					?></div>
				<div id="sam-res0" class="col-md-3">
					<div style="width: 100%; float: left;">
						<div style="width: 100%; float: left; margin-bottom: 10px;">
							<span style="font-weight: bold; float: left;">Price Details</span></div>
						<div style="width: 100%; float: left; margin-bottom: 10px; padding-right: 20px;">
							<span style="width: auto; float: left;">Discount :</span>
							<span id="coup_disc" style="width: auto; float: right;">---</span></div>
						<div style="width: 100%; float: left; margin-bottom: 10px; padding-right: 20px;">
							<span style="width: auto; float: left;">Tax :</span>
							<span id="tax_amt" style="width: auto; float: right;">0 </span></div>
						<div style="width: 100%; float: left; margin-bottom: 10px; padding-right: 20px;">
							<span style="width: auto; float: left;">Sub Total :</span>
							<span style="width: auto; float: right;"><?=$grand_tot;?></span>
						</div>
						<div style="width: 100%; float: left; margin-bottom: 10px; padding-right: 20px; display: none;">
							<span style="width: auto; float: left;">Shipping Mode :</span>
							<span style="width: auto; float: right;">
							<select id="ship_mode" name="ship_mode" onchange="ship(value)">
							<option value="35">By Road</option>
							<option value="100">By Air</option>
							</select></span></div>
						<div style="width: 100%; float: left; margin-bottom: 10px; padding-right: 20px; display: none;">
							<span style="width: auto; float: left;">Total Weight :</span> 
							<span style="width: auto; float: right;"><?=$tot_weight;?> gms</span></div>
						<div style="width: 100%; float: left; margin-bottom: 10px; padding-right: 20px;">
							<span style="width: auto; float: left;">Approx Shipping :</span>
							<span style="width: auto; float: right;">
							<span id="ship_chrg"></span></span></div>
						<div style="width: 100%; float: left; margin: 10px 0px; font-size: 16px; border-top: 1px solid#000; padding-top: 10px; font-weight: bold; padding-right: 20px;">
							<span style="width: auto; float: left; font-size: 20px;">TOTAL : </span>
							<span style="width: auto; float: right;">
							<span id="net_amt"></span><?=$grand_tot;?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

$_SESSION['qty_tot']=$tot_qty;
$_SESSION['grand_tot']=$grand_tot;

?>