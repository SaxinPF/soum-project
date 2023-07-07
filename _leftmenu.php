<div class="column default-featured-column links-column col-lg-3 col-md-12" style="float:left;padding:25px;padding-top: 5px;">
					<div class="col-md-12" style="background:#fff;float:left;padding:0px;box-shadow: 0px 2px 2px -2px;">
					<div style="widows:100%;float:left;">
                    <h4 class="inner-title" style="padding: 10px;margin-bottom:10px;text-transform:none;border-bottom:1px solid#ddd;font-size: 18px !important;font-weight: bold !important;">Filter</h4>
								<form method="get"  style="width:100%;float:left;">
								<div style="width:100%;padding:10px 15px;">
									<p style="font-weight: 500;">Search For Mobile Phones</p>
									
									<select name="drpBrand" id="soum_prod_subcat" class="form-control" onchange="fill2(this.value);" style="width:100%;margin-bottom:15px;" >
								<option selected="selected" value="">--Select Brand--</option>
									<?php 
									  $sql="select * from soum_prod_subcat order by prod_subcat_id desc";
									  $res=$db->query($sql);
									  while($row=$res->fetch_assoc())
									  {
									  ?>
									  <option value="<?=$row['prod_subcat_id'];?>"><?=$row['prod_subcat_desc']?></option>

									 <?php }
									?>
							</select>
							<div id="name_loader"></div>
							<div id="brand_loader">
							<select name="drpModel" id="soum_prod_subsubcat" class="form-control" onchange="modal1(this.value);" style="width:100%;" >
	                        	<option selected="selected" value="">Model Name</option>
							</select>	
							</div>								
								</div>
						
						<p style="border-top:1px solid#ddd;width:100%;float:left;margin-top:20px;"></p>
						<div style="width:100%;padding:10px 15px;margin-top:20px;">
							<p style="width:100%;float:left;font-weight: 500;">Price Range</p>
							
							<div class="col-md-5" style="padding:0px;width: 43%;float: left;"><input name="min" type="text" value="<?=$_REQUEST['min'];?>" class="form-control" placeholder="Mini"/></div>
							<div class="col-md-2" style="text-align:center;padding:0px;width:12%;float: left;">To</div>
							<div class="col-md-5" style="padding:0px;width: 43%;float: left;"><input name="max" value="<?=$_REQUEST['max'];?>" type="text" class="form-control" placeholder="Max"/></div>
							
							<p style="border-top:1px solid#ddd;width:100%;float:left;margin-top:20px;"></p>
							<div style="width:100%;padding:10px 15px;margin-top:20px;">
								<p style="width:100%;float:left;font-weight: 500;">Sim Type</p>
								<span style="width:100%;float:left;color:#787878;font-weight:normal"><label><input type="radio" name="sim" <?php if($_REQUEST[sim]=='2') echo 'Checked';?> value="2" style="width:auto;float:left">&nbsp; &nbsp; <span style="font-weight:500;">Dual Sim</span></label></span>
								<span style="width:100%;float:left;color:#787878;font-weight:normal"><label><input type="radio" name="sim" <?php if($_REQUEST[sim]=='1') echo 'Checked';?> value="1" style="width:auto;float:left">&nbsp; &nbsp; <span style="font-weight:500;">Single Sim</span></label></span>
								<span style="width:100%;float:left;color:#787878;font-weight:normal"><label><input type="radio" name="sim" <?php if($_REQUEST[sim]=='') echo 'Checked';?> value="" style="width:auto;float:left">&nbsp; &nbsp; <span style="font-weight:500;">Both</span></label></span>
							</div>
							<p style="text-align:center;margin-top:15px;width:100%;float:left">
							<input name="Submit1" type="submit" value="Search" class="theme-btn btn-style-four btn-sm"/>
							</p>
						
						</div>
						</form>
					</div>	
				</div>
                </div>
