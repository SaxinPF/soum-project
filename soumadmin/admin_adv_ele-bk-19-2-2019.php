          <?php
                     $prod_id = $brand = $model = $mram = $mrom = $imi_no = $expected_price = '';
			         $img1 = $img2 =  $img3 =  $img4 =  $img5 =  $img6 =  $img7 =  $img8 =  '../images/noimage.png';
				     $condition =  $yearbyadmin = $color_id = $seller_name = $seller_phone = '';
				     $approve = $seller_city = $seller_email = $seller_address = '';


		  /* Post section */
		  //echo '<pre>';

		    if(isset($_POST['prod_id'])){

		        $admin = $_SESSION['poster_type'];
			    $admin_id = $_SESSION['poster_id'];

			    $poster_type = $_SESSION['poster_type'];
				$poster_id = $_SESSION['poster_id'];

				$prodid=mysqli_real_escape_string($db,$_POST['prod_id']);
                $post_date=date('Y-m-d H:s:i');
	            $oldphone=2;

                $titile='';

				$brand = $drpBrand=mysqli_real_escape_string($db,$_POST['drpBrand']);
                $model = $drpModel=mysqli_real_escape_string($db,$_POST['drpModel']);

				$imi_no = mysqli_real_escape_string($db,$_POST['imi_no']);
				$expected_price = $offer_price=mysqli_real_escape_string($db,$_POST['expected_price']);
				$txt_description='';

				$mram = $ram= mysqli_real_escape_string($db,$_POST['ram']);
                $mrom = $rom= mysqli_real_escape_string($db,$_POST['rom']);

				$approve = mysqli_real_escape_string($db,$_POST['approve']);
				if($approve==on){ $approve=1;} else { $approve=0; }


				$yearbyadmin = mysqli_real_escape_string($db,$_POST['yearbyadmin']);
                $condition = $_POST['condition'];
					$condi = '';
					if(!empty($condition)){
					$condi = implode(',',$condition);
					$condi = $condi.',';
					}

				$color_id = mysqli_real_escape_string($db,$_POST['color_id']);
				$seller_name = mysqli_real_escape_string($db,$_POST['seller_name']);
				$seller_email = mysqli_real_escape_string($db,$_POST['seller_email']);
				$seller_phone = mysqli_real_escape_string($db,$_POST['seller_phone']);
				$seller_address = mysqli_real_escape_string($db,$_POST['seller_address']);
				$seller_city = mysqli_real_escape_string($db,$_POST['seller_city']);



				//validations
				$error ='';
				if(empty($brand)){
				  $error .='Brand is required.</br>';
				}
				if(empty($model)){
				  $error .='Model is required.</br>';
				}
				$length = strlen((string) $imi_no);
				if($length < 15){
				  $error .='IMEI number must be 15 digits.</br>';
				}
				if(empty($imi_no)){
				  $error .='IMEI number is required.</br>';
				}
				if(empty($expected_price)){
				  $error .='Expected Price is required.</br>';
				}
				if(empty($color_id)){
				  $error .='Please select a colour.</br>';
				}



				//Save work
				if(empty($error)){

						if($_POST['act' ] == "add"){
							$active='0';
							$table=(!isset($poster_type)?'soum_product_master_temp':'soum_product_master');
								if($oldphone==2){
								 $s1=1;
								 $s2=1;
									$sql=$db->prepare("insert into $table (post_date,titile,prod_cat_id,brand,modal,imei_no,images,images1,images2,Constituent,poster_type,poster_id,active,appliable_rate,offer_price,rom,ram2,yearbyadmin,condi,color_id,seller_name,seller_email,seller_phone,seller_address,seller_city,opening_stock,current_stock)
									values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									$sql->bind_param("sssssssssssssssssssssssssss",$post_date,$titile,$oldphone,$drpBrand,$drpModel,$imi_no,$img1,$img2,$img3,$txt_description,$poster_type,$poster_id,$approve,$offer_price,$offer_price,$rom,$ram,$yearbyadmin,$condi,$color_id,$seller_name,$seller_email,$seller_phone,$seller_address,$seller_city,$s1,$s2);

								}

								   $res=$sql->execute();
								   $enq_id=mysqli_insert_id($db);

						                   if($poster_type=='Admin'){
												if($oldphone==1)
												{
												 $token="NSN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
												}
												else
												{
												 $token="USN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
												}

												$ofer="<a href='admin/offer_master.php?prod_id=$enq_id'>Do you want make an offer on this product</a>";
										   }


											$token1=$db->prepare("update $table set code='$token' where prod_id=$enq_id");
											$rest=$token1->execute();

											$rating = 5;
										   $rname ='admin';
										   $sqlr="insert into soum_product_review (cust_id,name,cust_type, prod_id, rating)values('$admin_id','$rname','$admin','$enq_id','$rating')";

										   $result=$db->query($sqlr);

                            // echo '<script>window.location.href="admin_adv.php?admin_adv_s=Ad has been added successfully"</script>';
                             echo '<script>window.location.href="admin_adv.php?req_id='.$enq_id.'&act=add&step=2&admin_adv_s=Please add your images."</script>';
				      }
					  if($_POST['act' ] == "edit"){
							$qty =1;
	                        $sql=$db->prepare("update soum_product_master set titile='$titile',brand='$drpBrand',modal='$drpModel',imei_no='$imi_no',rom='$rom',ram2='$ram',appliable_rate='$offer_price',active=$approve,offer_price='$offer_price',yearbyadmin='$yearbyadmin',condi='$condi',seller_name='$seller_name',seller_email='$seller_email',seller_phone='$seller_phone',color_id='$color_id',seller_address='$seller_address',seller_city='$seller_city',opening_stock='$qty',current_stock='$qty' where prod_id=$prodid");
						    $res=$sql->execute();
						    $enq_id=$prodid;

							   $rating = 5;
							   $rname ='admin';
						       $sqlr="insert into soum_product_review (cust_id,name,cust_type, prod_id, rating)values('$admin_id','$rname','$admin','$enq_id','$rating')";

							   $result=$db->query($sqlr);
							  $_SESSION['admin_adv_s'] = 'Ad has been updated successfully';
			                 //echo '<script>window.location.href="admin_adv.php?admin_adv_s=Ad has been updated successfully"</script>';
		                      echo '<script>window.location.href="admin_adv.php?req_id='.$enq_id.'&act=edit&step=2&admin_adv_s=Please add your images."</script>';
					 }


				}
			}

		  /* Post section */
		  ?>
		  	         <?php if(isset($_REQUEST['admin_adv_s'])){
                              $sjpw =  $_REQUEST['admin_adv_s'];

							?>
		  	        <div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20">

							<div style="color:green;font-size:20px;">
							  <?php echo  $sjpw; ?>
							</div>

							</div></div></div>
							<?php  } ?>






			  <?php
					if(isset($_REQUEST['req_id'])){
					     $prod_id =   $_REQUEST['req_id'];
						      $type = 'Admin';
							  $cond = '';
							  $conds ='';
							if($type!='')
							{
							 $cond=" soum_product_master.prod_id='$prod_id' and soum_product_master.poster_type='$type' and soum_product_master.trash!='delete'";
							}
							$sql="select *,concat(prod_subcat_desc,' ',model_name ) phone1 from (
							select *,
							if(poster_type='Dealer',
									(select fname from soum_master_dealer where cust_id=temp1.poster_id),
									if(poster_type='Customer',(select fname from soum_master_customer where cust_id=temp1.poster_id),'Admin')) fname,

								if(poster_type='Dealer',
									(select mobile from soum_master_dealer where cust_id=temp1.poster_id),
									if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=temp1.poster_id),'Admin')) mobile
							 from (select   temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
																	select * from (
																	select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal,soum_product_master.imei_no,soum_product_master.rom,soum_product_master.ram2,soum_product_master.images2,soum_product_master.bill_img,soum_product_master.add_proof_img,soum_product_master.images1,soum_product_master.images,soum_product_master.sell_letter,soum_product_master.swap_letter,soum_product_master.seller_name,soum_product_master.seller_email,soum_product_master.seller_phone,soum_product_master.color_id,soum_product_master.seller_address,soum_product_master.seller_city,soum_product_master.yearbyadmin,soum_product_master.condi,soum_product_master.active,soum_product_master.seller_img
																	,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where $cond) prod
																	left outer join soum_prod_subcat
																	on prod.brand=soum_prod_subcat.prod_subcat_id)temp
																	left outer join soum_prod_subsubcat
																	on temp.modal=soum_prod_subsubcat.prod_subsubcat_id
							) temp1
							)tmep2 ".$conds." order by prod_id desc";

						$res=$db->query($sql);
						$acount=mysqli_num_rows($res);
						  while($row=$res->fetch_assoc()) {

						    $brand  =      $row['brand'];
						    $model  =      $row['modal'];
						    $mram  =      $row['ram2'];
						    $mrom  =      $row['rom'];
						    $imi_no  =      $row['imei_no'];
						    $expected_price  =      $row['offer_price'];

							if(!empty($row['images']) && file_exists('../upload/'.$row['images'])){
						        $img1  =      '../upload/'.$row['images'];
							}
							if(!empty($row['images1']) && file_exists('../upload/'.$row['images1'])){
						        $img2  =      '../upload/'.$row['images1'];
							}
							if(!empty($row['images2']) && file_exists('../upload/'.$row['images2'])){
						        $img3  =      '../upload/'.$row['images2'];
							}
							if(!empty($row['bill_img']) && file_exists('../upload/'.$row['bill_img'])){
						        $img6  =      '../upload/'.$row['bill_img'];
							}
							if(!empty($row['add_proof_img']) && file_exists('../upload/'.$row['add_proof_img'])){
						        $img5  =      '../upload/'.$row['add_proof_img'];
							}
							if(!empty($row['sell_letter']) && file_exists('../upload/'.$row['sell_letter'])){
						        $img7  =      '../upload/'.$row['sell_letter'];
							}
							if(!empty($row['swap_letter']) && file_exists('../upload/'.$row['swap_letter'])){
						        $img8  =      '../upload/'.$row['swap_letter'];
							}
							if(!empty($row['seller_img']) && file_exists('../upload/'.$row['seller_img'])){
						        $img4  =      '../upload/'.$row['seller_img'];
							}



						    $condition  =      $row['condi'];
						    $yearbyadmin  =      $row['yearbyadmin'];
						    $color_id  =      $row['color_id'];
						    $seller_phone  =      $row['seller_phone'];
						    $seller_name  =      $row['seller_name'];
						    $approve  =      $row['active'];
						    $token  =      $row['code'];
						    $seller_city  =      $row['seller_city'];
						    $seller_email  =      $row['seller_email'];
						    $seller_address  =      $row['seller_address'];


						  }
					}
					if(isset($_REQUEST['act'])){
					   $act = $_REQUEST['act'];
				?>

					<div class="row">
						<div class="col-md-6" id="enq" style="margin:auto;float:none;">
							<div class="dash-head clearfix mb20">

							<div style="color:red;"><?php if(isset($error)){
								  echo $error;
							}?></div>
						 <?php if(!isset($_REQUEST['step'])){ ?>
							<form id="uploadimage"  method="post" enctype="multipart/form-data">
								    <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $prod_id ?>">
									<input type="hidden"  id="act" name="act" value="<?php echo $act ?>">
									<div class="col-md-6">
										<label class="control-label">Company/ Brand* </label>
										<select class="form-control" name="drpBrand" id="soum_prod_subcat" onchange="fill2(this.value,'');" >
						                     <option selected="selected" value="">Select Brand</option>
													<?php
													  $sql="select * from soum_prod_subcat order by prod_subcat_id desc";
													  $res=$db->query($sql);
													  while($row=$res->fetch_assoc())
													  {
													  ?>
														 <?php
													 $brand_sel = '';
													 if(isset($brand) && $brand == $row['prod_subcat_id']){
														$brand_sel =    $selected="selected";
													 } ?>
											 <option <?php echo $brand_sel ?> value="<?=$row['prod_subcat_id'];?>"><?=$row['prod_subcat_desc']?></option>

													 <?php }
													?>

						                 </select>
									</div>

									<div class="col-md-6">
										<label class="control-label">Device Model* </label>
										   <div id="name_loader2"></div>
									    <select class="form-control " name="drpModel" id="soum_prod_subsubcat" onchange="get_color(this.value,'')" >
                                            <option selected="selected" value="">Model Name</option>
										</select>
									</div>

									<div class="col-md-6">
										<label class="control-label">RAM* </label>

									  	   <select class="form-control" name="ram" id="exampleFormControlSelect1ram">
												 <?php
													 $Storageram  = array(1,2,3,4,5,6,7,8,9,10);
												 foreach($Storageram as $val){
													$selected_ram = '';
												 if(isset($mram) && $mram==$val){
													 $selected_ram =  'selected="selected"';
												 } ?>
													  <option value='<?php echo $val ?>' <?php echo $selected_ram; ?> ><?php echo $val ?> GB</option>

												<?php  }  ?>

											</select>
									</div>


										<div class="col-md-6">
										   <label class="control-label">ROM* </label>

											<select class="form-control" name="rom" id="exampleFormControlSelect1">
												 <?php
													 $Storage  = array(2,4,8,16,32,64,128,256,512);
												 foreach($Storage as $value){
													$selected_rom = '';
												 if(isset($mrom) && $mrom==$value){
													 $selected_rom =  'selected="selected"';
												 } ?>
													  <option value='<?php echo $value ?>' <?php echo $selected_rom; ?> ><?php echo $value ?> GB</option>

												<?php  }  ?>
											</select>
									    </div>


										<div class="col-md-6">
											<label class="control-label">IMEI*</label>
											   <input type="text" name="imi_no" value="<?php echo $imi_no ?>" id="txt_imi_no" class="form-control" Placeholder="Enter IMEI number"/>
										</div>

										<div class="col-md-6">
											    <label class="control-label">Price Expected (?)*</label>
											   	<input type="text" name="expected_price" value="<?php echo $expected_price ?>" id="txt_expected_price" class="form-control" Placeholder=""/>
										</div>
      								<div class="col-md-12">
									        <label class="control-label">Accessories</label><br>
													      <?php

														  if(!empty($condition)){
														      $condition = explode(",",$condition);
														  }else{
														      $condition = array();
														  }
														  //print_r($condition);
																		$sqli="select * from soum_phone_assecc";
																		$resi=$db->query($sqli);
																		while($rowi=$resi->fetch_assoc())
																		{
																		   $checked = '';
																		    foreach($condition as $val){
																			  if($val ==$rowi['access_id']){
																		      $checked = 'checked="checked"';
																			  }
																		    }
														   ?>
															 <p class="msg-line" style="float:left;"><label><input name="condition[]"
															  value="<?=$rowi['access_id']?>" <?php echo $checked; ?> type="checkbox" class="condition<?=$rowi['access_id']?>" style="color:#3376bb;font-size:15px;margin-right:10px;"><?=$rowi['access_name']?></label></p>
																 <?php } ?>



									</div>
                                    <div class="clearfix"></div>
									<div class="col-md-6">
											<label class="control-label">How old is your device?</label>
											<input type="text" name="yearbyadmin" value="<?php echo $yearbyadmin ?>" id="yearbyadmin" class="form-control" Placeholder=""/>
									</div>
									<div class="col-md-6">
											<label class="control-label">Colour</label>
											<select class="form-control minimal" name="color_id" id="colour">
												<option value='' >Select</option>

											</select>
									</div>
									<div class="col-md-6">
											<label class="control-label">Seller Name</label>
											<input type="text" name="seller_name" value="<?php echo $seller_name ?>" id="seller_name" class="form-control" Placeholder=""/>
									</div>
									    <div class="col-md-6">
											<label class="control-label">Seller Phone</label>
											<input type="text" name="seller_phone" value="<?php echo $seller_phone ?>" id="seller_phone" class="form-control" Placeholder=""/>
									</div>
                                    <div class="col-md-6">
											<label class="control-label">Invoice Number</label>
											<input type="text" name="seller_email" value="<?php echo $seller_email ?>" id="seller_email" class="form-control" Placeholder=""/>
									</div>
									<div class="col-md-6">
											<label class="control-label">Invoice Date</label>
											<div class="input-group date" id="datepickerDemo1">
											   <input type="text" name="seller_address" value="<?php echo $seller_address ?>" id="seller_address" class="form-control" Placeholder=""/>
											    <span class="input-group-addon">
													<i class=" ion ion-calendar"></i>
												</span>
											</div>
									</div>
									<div class="col-md-12">
											<label class="control-label">Complete Phone Details</label>
											<input type="text" name="seller_city" value="<?php echo $seller_city ?>" id="seller_city" class="form-control" Placeholder=""/>
									</div>
									<div class="col-md-2">
									<?php
									  $check ='';
									if($approve==1){
									  $check = 'checked="checked"';
									} ?>
										    <label class="control-label">Approve </label><br>
											<label><input name="approve" <?php echo $check; ?>type="checkbox" id="approve"  />&nbsp;Approve</label>
									</div>

								    <div class="col-md-12" style="text-align:center;">
										<button class="btn btn-primary mr5 waves-effect"  type="submit" style="margin:20px;" id="btn-add"><?php //echo $act ?>Next</button>
			    					</div>


									</form>
								<?php }else{ ?>

								   <div id="uploadimage">
										<div class="col-md-12">
											    <label class="control-label">Ads with photos</label>
										</div>

									<div class="col-sm-4" style="margin-top:15px;">
										<div class="filedivcls">
											<img src="<?php echo $img1 ?>" id="previewing1" style="height:80px;position:absolute;top:0;"/>
											<span class="select-wrapper"><input name="fileToUpload1" onchange="readURL(this,1);"  id="fileToUpload1" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
										</div>
									</div>
		                            <div class="col-sm-4" style="margin-top:15px;">
			                            <div class="filedivcls">
			                            	<img src="<?php echo $img2 ?>" id="previewing2" style="height:80px;position:absolute;top:0;"/>
			                            	<span class="select-wrapper"><input name="fileToUpload2" id="fileToUpload2" onchange="readURL(this,2);"  type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
			                            </div>
		                            </div>
		                            <div class="col-sm-4" style="margin-top:15px;">
		                            	<div class="filedivcls">
			                            	<img src="<?php echo $img3 ?>" id="previewing3" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload3" id="fileToUpload3" onchange="readURL(this,3);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
		                            </div>

									 <div class="col-sm-4" style="margin-top:15px;">
											<label class="control-label">Bill or Letter head</label>
										<div class="filedivcls">
			                            	<img src="<?php echo $img6 ?>" id="previewing6" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload6" id="fileToUpload6" onchange="readURL(this,6);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									 </div>

									 <div class="col-sm-4" style="margin-top:15px;">
									   <label class="control-label">Seller Identity</label>

										<div class="filedivcls">
			                            	<img src="<?php echo $img5 ?>" id="previewing5" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload5" id="fileToUpload5" onchange="readURL(this,5);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									 </div>

									<div class="col-sm-4" style="margin-top:15px;">
									 <label class="control-label">Sell letter</label>

										<div class="filedivcls">
			                            	<img src="<?php echo $img7 ?>" id="previewing7" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload7" id="fileToUpload7" onchange="readURL(this,7);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									</div>

									<div class="col-sm-4" style="margin-top:15px;">
									 <label class="control-label">Swap letter</label>

										<div class="filedivcls">
			                            	<img src="<?php echo $img8 ?>" id="previewing8" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload8" id="fileToUpload8" onchange="readURL(this,8);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									</div>
                                    <div class="col-sm-4" style="margin-top:15px;">
    								 <label class="control-label">Seller Photo</label>

										<div class="filedivcls">
			                            	<img src="<?php echo $img4 ?>" id="previewing4" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload4" id="fileToUpload4" onchange="readURL(this,4);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
									</div>
									<div class="col-md-12" style="text-align:center;">
										<button class="btn btn-primary mr5 waves-effect"  type="button" onclick="savefun()" style="margin:20px;" id="btn-add">Finish</button>
			    					</div>
									</div>
								<?php } ?>

     						</div>
						</div>
					</div>
					<?php } ?>



<script>
 var p = '<?php echo  $brand ?>';
 var m = '<?php echo  $model ?>';
 var color_id = '<?php echo  $color_id ?>';
get_color(m,color_id);
fill2(p,m);
function fill2(p,m){
	fill(p,m);
}
function fill(bid,m){
 var sitpath = '<?php echo SITEPATH; ?>';
$('#soum_prod_subsubcat').hide();
 $('#name_loader2').html("<img src='../upload/loader.gif' width='30' height='30'>");

	$.ajax({
		type:"Post",
	    url: "../fill4.php",
		data:{"param":bid,'mid':m,'category_type':'phone'},
		success:function(html)
		{
		       $('#name_loader2').html("");
               $('#soum_prod_subsubcat').show();

			$("#soum_prod_subsubcat").html(html);
		}
	});
}

function get_color(m_id,cid){
 var sitpath = '<?php echo SITEPATH; ?>';
	$.ajax({
		type:"Post",
		url: "../get_color.php",
		data:{"param":m_id,'mid':cid},
		success:function(html)
		{
		  $("#colour").html(html);
		}
	});
}
        /*function readURL(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
				//alert(e.target.result);
                    $('#previewing'+id)
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }*/

		function readURL(input,id){
		     var req_id =   '<?php echo (isset($_REQUEST['req_id']))?$_REQUEST['req_id']:0; ?> '
		     $('#previewing'+id).attr('src','../upload/loader.gif');

				if (input.files && input.files[0]) {
					var selectedFile = input.files[0];
					//console.warn(selectedFile);
					   fd = new FormData();
					   fd.append('req_id',req_id);
					   fd.append('fileToUpload'+id,selectedFile,selectedFile.name);
						$.ajax({
							  type: "POST",
							  async: false,
							  url: "admin_adv_file_upload.php",
							  processData: false,
				              contentType: false,
							  data: fd,
							  dataType: 'json',
							}).done(function(o) {
							   if(o.error_f==1){
							     alert(o.error);
								 $('#previewing'+id).attr('src','../images/noimage.png');
							   }else{
								    $('#previewing'+id).attr('src','../upload/'+o.path);
							   }
							});
				}
        }

		function savefun(){
		    var act = '<?php echo $act ?>';
			var p = '<?php echo  $brand ?>';
			var m = '<?php echo  $model ?>';
			var approve = '<?php echo  $approve ?>';
			var seller = '<?php echo  $seller_name ?>';
			var phone = '<?php echo  $seller_phone ?>';
			var token = '<?php echo  $token ?>';
			$.ajax({
				type:"Post",
				url: "admin_adv_file_upload.php",
				data:{"brand":p,'model':m,'approve':approve,'seller':seller,'token':token,'phone':phone},
				dataType: 'json',
				success:function(res){
					if(res.status==1){
					   window.location.href="admin_adv.php?admin_adv_s=Ad has been updated successfully";
					}
				}
			});


		}

</script>




