          <?php
                     $prod_id = $brand = $model = $mram = $mrom = $imi_no = $expected_price = '';
                     $img1 = $img2 =  $img3 =  $img4 =  $img5 =  $img6 =  $img7 =  $img8 =  '../images/noimage.png';

        		     $condition =  $yearbyadmin = $color_id = $seller_name = $seller_phone = '';
				     $availability = 'Available'; $approve = $seller_city = $prod_cat_id= $seller_email = $seller_address = ''; 

					 $vari_imei = $vari_color =  $vari_ram = $vari_device_condition = $vari_expected_price =  $is_active_v = '';

					  /* Post section */
					  //echo '<pre>';

		    if(isset($_POST['prod_id'])){		    	

		        $admin 			= $_SESSION['poster_type'];
			    $admin_id 		= $_SESSION['poster_id'];

			    $poster_type 	= $_SESSION['poster_type'];
				$poster_id 		= $_SESSION['poster_id'];

				$prodid=mysqli_real_escape_string($db,$_POST['prod_id']);
                $post_date=date('Y-m-d H:s:i');
	            $oldphone=2;

                $titile =	'';

				$brand = $drpBrand =mysqli_real_escape_string($db,$_POST['drpBrand']);
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
				$prod_cat_id = mysqli_real_escape_string($db,$_POST['prod_cat_id']);
				$availability = mysqli_real_escape_string($db,$_POST['availability']);



				//validations
				$error ='';
				if(empty($brand)){
				  $error .='Brand is required.</br>';
				}
				if(empty($model)){
				  $error .='Model is required.</br>';
				}
				$length = strlen((string) $imi_no);
				if(!empty($imi_no)){
					if($length < 15){
					  $error .='IMEI number must be 15 digits.</br>';
					}
				}
				/*if(empty($imi_no)){
				  $error .='IMEI number is required.</br>';
				}*/
				// if(empty($expected_price)){
				//   $error .='Expected Price is required.</br>';
				// }
				/*if(empty($color_id)){
				  $error .='Please select a colour.</br>';
				}*/



				//Save work
				if(empty($error)){

						if($_POST['act' ] == "add"){


							$active='0';
							$table=(!isset($poster_type)?'soum_product_master_temp':'soum_product_master');
								if($oldphone==2){
								 $s1=1;
								 $s2=1;
									$sql=$db->prepare("insert into $table (post_date,titile,prod_cat_id,brand,modal,imei_no,images,images1,images2,Constituent,poster_type,poster_id,active,appliable_rate,offer_price,rom,ram2,yearbyadmin,condi,color_id,seller_name,seller_email,seller_phone,seller_address,seller_city,opening_stock,current_stock,availability)
									values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									$sql->bind_param("ssssssssssssssssssssssssssss",$post_date,$titile,$prod_cat_id,$drpBrand,$drpModel,$imi_no,$img1,$img2,$img3,$txt_description,$poster_type,$poster_id,$approve,$offer_price,$offer_price,$rom,$ram,$yearbyadmin,$condi,$color_id,$seller_name,$seller_email,$seller_phone,$seller_address,$seller_city,$s1,$s2,$availability);

								}

								   $res=$sql->execute();
								   $enq_id=mysqli_insert_id($db); 
										$variations_data = $_POST['variations'];
										$variations_data = array_values($variations_data);


										
										$variations_count = count($variations_data);
											for ($i = 0; $i < $variations_count; $i++) {

												//echo "$i -".$i;
											   $vari_imei = $variations_data[$i]['imei'];

											   $vari_color = $variations_data[$i]['color'];

											    $vari_colorid = $variations_data[$i]['id'];
											  
											   $vari_ram = $variations_data[$i]['ram'];
											   $vari_device_condition = $variations_data[$i]['device_condition'];
											   $vari_expected_price = $variations_data[$i]['expected_price'];
											   $is_active_v = 1;

											//   echo $vari_expected_price."<br>";
											   if($vari_expected_price !== null && $vari_expected_price !== ''){

											   
											   // insert query here
											   $var_sql = "INSERT INTO product_variation (prod_id, imei_no, color_id, rom, condi, price, is_active) VALUES ('$enq_id', '$vari_imei', '$vari_colorid', '$vari_ram', '$vari_device_condition', '$vari_expected_price', '$is_active_v')";
										//	 echo $var_sql."<br>";

											   $res2 = mysqli_query($db, $var_sql);
											}

										}
							  
							//exit;
										

						                   if($poster_type=='Admin'){
												if($oldphone==1)//kahotoyahoga
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
											if($availability == 'Available'){
												echo '<script>window.location.href="admin_adv.php?req_id='.$enq_id.'&act=add&step=2&admin_adv_s=Please add your images."</script>';
											}else{
												echo '<script>window.location.href="admin_adv.php?admin_adv_s=Ad has been added successfully"</script>';
											}


				      }
					  if($_POST['act' ] == "edit"){


					  	
							$qty =1;
	                        $sql=$db->prepare("update soum_product_master set titile='$titile',brand='$drpBrand',modal='$drpModel',imei_no='$imi_no',prod_cat_id='$prod_cat_id' ,rom='$rom',ram2='$ram',appliable_rate='$offer_price',active=$approve,offer_price='$offer_price',yearbyadmin='$yearbyadmin',condi='$condi',seller_name='$seller_name',seller_email='$seller_email',seller_phone='$seller_phone',color_id='$color_id',seller_address='$seller_address',seller_city='$seller_city',availability='$availability',opening_stock='$qty',current_stock='$qty' where prod_id=$prodid");
						    $res=$sql->execute();
						    $enq_id=$prodid;

						   // echo "ddd".$enq_id;exit;


						    $variations_data_update = $_POST['variations'];
						$variations_count = count($variations_data_update);
						$variations_data_update = array_values($variations_data_update);

					//	echo "<pre>";print_r($variations_data_update);exit;
						    for ($i = 0; $i < $variations_count; $i++) {
										   $vari_imei_updt = $variations_data_update[$i]['imei'];

										   $vari_color_updt = $variations_data_update[$i]['color'];

										    $vari_colorid_updt = $variations_data_update[$i]['id'];
										  
										   $vari_ram_updt = $variations_data_update[$i]['ram'];
										   $vari_device_condition_updt = $variations_data_update[$i]['device_condition'];
										   $vari_expected_price_updt = $variations_data_update[$i]['expected_price'];
										   $is_active_v_updt = 1;
										   $variation_id = $variations_data_update[$i]['var-id'];

										  
										   /*$var_sql_updt = "UPDATE product_variation SET 
										    imei_no = '$vari_imei_updt', 
							                color_id = '$vari_colorid_updt', 
							                rom = '$vari_ram_updt', 
							                condi = '$vari_device_condition_updt', 
							                price = '$vari_expected_price_updt', 
							                is_active = '$is_active_v_updt' 
							            WHERE prod_id = '$enq_id' AND variation_id = '$variation_id'";*/

							            $var_sql_updt = "insert into product_variation (prod_id, variation_id, imei_no, color_id, rom, condi, price, is_active)
VALUES ('$enq_id', '$variation_id', '$vari_imei_updt', '$vari_colorid_updt', '$vari_ram_updt', '$vari_device_condition_updt', '$vari_expected_price_updt', '$is_active_v_updt') ON DUPLICATE KEY UPDATE imei_no = '$vari_imei_updt', color_id = '$vari_colorid_updt',  rom = '$vari_ram_updt',   condi = '$vari_device_condition_updt', price = '$vari_expected_price_updt', 
    is_active = '$is_active_v_updt'";



							           // echo $var_sql_updt;exit;
										
										$res2 = mysqli_query($db, $var_sql_updt);
										}

							   $rating = 5;
							   $rname ='admin';
						       $sqlr="insert into soum_product_review (cust_id,name,cust_type, prod_id, rating)values('$admin_id','$rname','$admin','$enq_id','$rating')";

							   $result=$db->query($sqlr);
							  $_SESSION['admin_adv_s'] = 'Ad has been updated successfully';

							if($availability == 'Available'){
							    echo '<script>window.location.href="admin_adv.php?req_id='.$enq_id.'&act=edit&step=2&admin_adv_s=Please add your images."</script>';
							}else{
							    echo '<script>window.location.href="admin_adv.php?admin_adv_s=Ad has been updated successfully"</script>';
							}


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
							  $cond2 = '';
							  $conds2 ='';

							  $getvariations = array();
							  $sql_editvari = "SELECT * FROM product_variation WHERE prod_id = $prod_id";

							  // echo $sql_editvari;exit;
								$result_variations = mysqli_query($db, $sql_editvari);

								if ($result_variations) {
								    // Loop through all rows
								    while ($row = mysqli_fetch_assoc($result_variations)) {
								        // Access fields using $row['field_name']
								        $getvariations[] = $row;

								    }
								} 
								

							if($type!='')
							{
							 $cond2=" soum_product_master.prod_id='$prod_id' and soum_product_master.poster_type='$type' and soum_product_master.trash!='delete'";
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
																	select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal,soum_product_master.imei_no,soum_product_master.rom,soum_product_master.ram2,soum_product_master.images2,soum_product_master.bill_img,soum_product_master.add_proof_img,soum_product_master.images1,soum_product_master.images,soum_product_master.sell_letter,soum_product_master.swap_letter,soum_product_master.seller_name,soum_product_master.seller_email,soum_product_master.availability,soum_product_master.seller_phone,soum_product_master.color_id,soum_product_master.seller_address,soum_product_master.seller_city,soum_product_master.yearbyadmin,soum_product_master.condi,soum_product_master.active,soum_product_master.seller_img
																	,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where $cond2) prod
																	left outer join soum_prod_subcat
																	on prod.brand=soum_prod_subcat.prod_subcat_id)temp
																	left outer join soum_prod_subsubcat
																	on temp.modal=soum_prod_subsubcat.prod_subsubcat_id
							) temp1
							)tmep2 ".$conds2." order by prod_id desc";

						$res=$db->query($sql);
						//$acount=mysqli_num_rows($res);
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
						    $prod_cat_id  =      $row['prod_cat_id'];
						    $availability  =      $row['availability'];
						    $seller_email  =      $row['seller_email'];
						    $seller_address  =      $row['seller_address'];


						  }
					}
					if(isset($_REQUEST['act'])){
					   $act = $_REQUEST['act'];
				?>

					<div class="row">
						<div class="col-md-12" id="enq" style="margin:auto;float:none;">
							<div class="dash-head clearfix mb20">

							<div style="color:red;"><?php if(isset($error)){
								  echo $error;
							}?></div>
						 <?php if(!isset($_REQUEST['step'])){ ?>
							<form id="uploadimage"  method="post" enctype="multipart/form-data">
								    <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $prod_id ?>">
									<input type="hidden"  id="act" name="act" value="<?php echo $act ?>">
									<input type="hidden" name="mobilecondition" value="1">
										<div class="col-md-12" style="margin-bottom:5px;">
											<label class="control-label">Condition</label>
													<select class="form-control" name="prod_cat_id" id="prod_cat_id">
												 <?php
													 $protypeo  = array(1=>'New',2=>'Used');
												 foreach($protypeo as $key=>$value){
													$selected_o = '';
												 if(isset($prod_cat_id) && $prod_cat_id==$key){
													 $selected_o =  'selected="selected"';
												 } ?>
													  <option value='<?php echo $key ?>' <?php echo $selected_o; ?> ><?php echo $value ?></option>

												<?php  }  ?>
											</select>
									</div>
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
									    <select class="form-control " name="drpModel" id="soum_prod_subsubcat" onchange="get_variations(this.value,'')" >
                                            <option selected="selected" value="">Model Name</option>
										</select>
									</div>

									<div class="col-md-12" id="htmlFieldsContainer" style="margin-top:5px;margin-bottom: 10px;">
									
											
<?php
for ($i=1; $i<= count($getvariations); $i++) {
?>
<div class="row variation-row">

    <div class="col-sm-2" style="padding-top:8px;" data-del="delete<?php echo $i; ?>"><label class="control-label">IMEI <?php echo $i; ?></label>
    	<input type="hidden" name="variations[<?php echo $i; ?>][var-id]" value="<?php echo $getvariations[$i-1]['variation_id'];?> " style="display:none;">
    	<input type="text" name="variations[<?php echo $i; ?>][imei]" value="<?php echo $getvariations[$i-1]['imei_no']; ?>" id="txt_imi_no_<?php echo $i+1; ?>" class="form-control txt-imei" placeholder="IMEI"></div>

    <div class="col-sm-2" style="padding-top:8px;" data-del="delete<?php echo $i; ?>"><label class="control-label">Color <?php echo $i; ?></label>
    	<input type="hidden" name="variations[<?php echo $i; ?>][id]" value="<?php echo $getvariations[$i-1]['color_id'];?> " style="display:none;" class="txt-color"> <!-- Hidden input field to store the ID value -->


    	<?php
    	 $getcolor = "select * from soum_colors where soum_colors.id=".$getvariations[$i-1]['color_id']; 
    	
    	// echo $getcolor;exit;
    	  $ress=$db->query($getcolor);

    	  if ($ress) {
			   
			    $rowc = mysqli_fetch_assoc($ress);
			    $colorname = $rowc['title'];
			}

    	  ?> 
    	<input type="text" name="variations[<?php echo $i; ?>][color]" value="<?php echo $colorname; ?>" id="" class="form-control" placeholder="">
    	
    </div>

    <div class="col-sm-2" style=" padding-top:8px;" data-del="delete<?php echo $i; ?>"><label class="control-label">RAM/ROM <?php echo $i; ?></label><input type="text" style="font-size: 10px;" name="variations[<?php echo $i; ?>][ram]" value="<?php echo $getvariations[$i-1]['rom']; ?>" id="" class="form-control txt-ram" placeholder="3/128,4/256,4/256"></div>

    <?php if($prod_cat_id == 2){ ?>
    <div class="col-sm-2 " style=" padding-top:8px;" data-del="delete<?php echo $i; ?>"><label class="control-label">Condition <?php echo $i; ?></label><input type="text" style="font-size: 13px;" name="variations[<?php echo $i; ?>][device_condition]" value="<?php echo $getvariations[$i-1]['condi']; ?>" id="device_condition_<?php echo $i+1; ?>" class="form-control txt-device-condition" placeholder="Good / Superb"></div>
<?php } ?>
    <div class="col-sm-2" style=" padding-top:8px; " data-del="delete<?php echo $i; ?>"><label class="control-label">Price <?php echo $i; ?></label><input type="text" style="font-size: 13px;" name="variations[<?php echo $i; ?>][expected_price]" value="<?php echo $getvariations[$i-1]['price']; ?>" id="txt_expected_price<?php echo $i+1; ?>" class="form-control txt-expected-price" placeholder=""></div>

    <div class="col-sm-2" style="width:1.666667%; padding-top:35px;"><button type="button" class="btn btn-danger remove-variation" data-variation-index="<?php echo $i; ?>">×</button></div>
</div>

<?php }  ?>
									</div>
									<div class="addnew" style="margin-top:10px;">
								<div class="left">
									
								</div>
                                <div>
                                <a class="btn btn-primary mr5 waves-effect waves-effect" style="margin:0px;padding:6px 80px;float:right;" onclick="get_edit_variations(<?php echo $model;?>);"> Add new variation</a>
                                </div>
							</div>
							<div id="htmlFieldsContaineredit" class="col-md-12"  style="margin-top:5px;margin-bottom: 10px;"></div>
							<div class="col-md-12"  style="margin-top:5px;margin-bottom: 10px;">


										
										
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
									<div class="col-md-6" id="hmold">
											<label class="control-label">How old is your device?</label>
											<input type="text" name="yearbyadmin" value="<?php echo $yearbyadmin ?>" id="yearbyadmin" class="form-control" Placeholder=""/>
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
											<div class="input-group date" id="datepickerDemo112">
											   <input type="text" name="seller_address" value="<?php echo $seller_address ?>" id="seller_address" class="form-control" Placeholder=""/>
											    <span class="input-group-addon">
													<i class=" ion ion-calendar"></i>
												</span>
											</div>
									</div>
									<div class="col-md-6">
										<label class="control-label">Availability</label>
										<select class="form-control minimal" name="availability" id="availability" onchange="availability1(this.value)">

										   <?php
										    $av ='';
										    $unav ='';

										   if($availability == 'Available'){
											   $av ='selected="selected"';
											}else{
											   $unav ='selected="selected"';
											} ?>
											<option value='Available' <?php echo  $av; ?> >Available</option>
											<option value='Unavailable' <?php echo  $unav; ?> >Unavailable</option>
										</select>
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
										<button class="btn btn-primary mr5 waves-effect"  type="button" onclick="savefun()" style="margin:20px;" id="btn-add-extra">Submit</button>
			    					</div>
									</div>
								<?php } ?>

     						</div>
						</div>
					</div>
					<?php } ?>



<script>

var prod_cat_id = "<?php echo $prod_cat_id;?>";
console.log(prod_cat_id);
if (prod_cat_id == 2) {
      $('input[name="mobilecondition"]').val(0);
    }


	$(document).on('click', '.remove-variation', function() {
 
 			var variationIndex = $(this).data('variation-index');

 		//	console.log(variationIndex);
 			 var rowToRemove = $('div[data-del="delete'+variationIndex+'"]').parent('.row');
		 	// rowToRemove.remove();

		 	var prod_id = "<?php echo $_REQUEST['req_id']; ?>";	
		 	 var colorId = $('input[name="variations['+variationIndex+'][id]"]').val();
				var storageId = $('input[name="variations['+variationIndex+'][ram]"]').val();
				var price = $('input[name="variations['+variationIndex+'][expected_price]"]').val();
		
		//console.log(price);
		if(price == 0.00) {
				  rowToRemove.remove();
		}else{

			var sitpath = '<?php echo SITEPATH; ?>';
			$.ajax({
			 type: "POST",
			        url: "../delete_variations.php",
			        data: {"colorId": colorId, "storageId": storageId ,"price": price,"prod_id":prod_id},
			        dataType : "json",
			        success: function(response) {

			        	if (response.status === 'success') {
			        	//	console.log('deleted');
						        // If the AJAX call was successful, remove the row from the DOM
						        rowToRemove.remove();
						    }
								            
		         },
		        error: function(xhr, status, error) {
		            console.log(error);
		        }
		    });
		}
			
  }); 


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

function get_edit_variations(m_id) {        
    var sitpath = '<?php echo SITEPATH; ?>';
    $.ajax({
        type: "POST",
        url: "../get_edit_variations.php",
        data: {"param": m_id},
        dataType : "json",
        success: function(response) {
            
            var colors = response.colors;


            var hiddenVal = $('input[name="mobilecondition"]').val();
              for (var i = 0; i < colors.length; i++) {
                var color = colors[i];
               // console.log("Color name: " + color.name + ", ID: " + color.id);
            }

             var existingVariations = []; 
               // Get the existing variations
             $('.variation-row').each(function() {
                var imei = $(this).find('.txt-imei').val();
                var color = $(this).find('.txt-color').val();
                var ram = $(this).find('.txt-ram').val();
                var device_condition = $(this).find('.txt-device-condition').val();
                var expected_price = $(this).find('.txt-expected-price').val();

                if(hiddenVal == 0){

                	 var variation =  color + '-' + ram + '-' + device_condition;
                }else{
                		 var variation =  color + '-' + ram;
                }
               // var variation = imei + '-' + color + '-' + ram + '-' + device_condition + '-' + expected_price;
                existingVariations.push(variation);
            });

		//	console.log(existingVariations);
             var storage = [64,128,256,512,1024];
             var condition   = ['Good','Superb'];

             if(hiddenVal == 0){
             		 var variations = colors.length * 5 * 2;
             }else{
             		 var variations = colors.length * 5;
             }
            
             var existingVariationsSize = existingVariations.length;
             var newcont =  existingVariationsSize + 1;


             var htmlFields = '';
				var j = newcont;
               		for (var i = 1; i <= variations; i++) {

               		
                var variation_index = i - 1;

                // Calculate the index for color, storage, and condition arrays
                if(hiddenVal == 0){
                    var color_index = Math.floor(variation_index / (5 * 2)) % colors.length;

                  //  console.log(color_index);
                    var storage_index = Math.floor(variation_index / 2) % 5;
                    var condition_index = variation_index % 2;
                } else { 
                    var color_index = Math.floor(variation_index / (5)) % colors.length;
                   // console.log('colr index- '+color_index);
                    var storage_index = Math.floor(variation_index) % 5;
                   // console.log('storage in- '+storage_index);
                }

                var colr = colors[color_index];
                var imei = '';
                var color = colr.name;
                var color_id = colr.id;
                var ram = storage[storage_index];
                var device_condition = '';
                var expected_price = '';

                
                
                // Check if the variation already exists
                if(hiddenVal == 0){ 
                	 var variation =  color_id + ' -' + ram ;
                }else{
                	 var variation = color_id + ' -' + ram ;

                }

         
               
                if(existingVariations.includes(variation)) {
                 
                    continue;
                }

                 htmlFields += '<div class="row"><div class="col-sm-2" style="padding-top:8px;" data-del="delete'+j+'"><label class="control-label">IMEI ' + j + '</label>';
                htmlFields += '<input type="text" name="variations['+j+'][imei]" value="" id="txt_imi_no_'+j+'" class="form-control" Placeholder="IMEI"/></div>';
                	

                htmlFields += '<div class="col-sm-2" style="padding-top:8px;" data-del="delete'+j+'"><label class="control-label">Color ' + j + '</label>';
                htmlFields += '<input type="text" name="variations['+j+'][color]" value="' + colr.name + '" class="form-control" Placeholder=""/><input type="hidden" name="variations['+j+'][id]" value="'+colr.id+'" style="display:none;"></div>';  

                 htmlFields += '<div class="col-sm-2" style="padding-top:8px;" data-del="delete'+j+'"><label class="control-label">RAM/ROM ' + j + '</label>';
                htmlFields += '<input type="text"  style="font-size: 10px;"   name="variations['+j+'][ram]" value="" id="" class="form-control" Placeholder="3/128,4/256,4/256"/></div>';
   if(hiddenVal == 0){
                  htmlFields += '<div class="col-sm-2" style=" padding-top:8px; data-del="delete'+j+'""><label class="control-label">Condition ' + j + '</label>';
                                
                	htmlFields += '<input type="text"  style="font-size: 13px;" name="variations['+j+'][device_condition]" value="' + condition[condition_index] + '" id="device_condition_'+j+'" class="form-control" Placeholder="Good / Superb"/></div>';
           		 }
                   htmlFields += '<div class="col-sm-2" style="padding-top:8px; "data-del="delete'+j+'"><label class="control-label">Price ' + j + '</label>';
                 htmlFields += '<input type="text"  style="font-size: 13px;" name="variations['+j+'][expected_price]" value="" id="txt_expected_price'+j+'" class="form-control" Placeholder=""/></div>';

                  htmlFields += '<div class="col-sm-2" style="padding-top:35px;"><button type="button" class="btn btn-danger remove-variation" data-variation-index="' + j + '">&times;</button></div>';


      		 htmlFields += '</div>';
            
          
            // Append the HTML fields to the container element
            $('#htmlFieldsContaineredit').html(htmlFields); 
            j++;
        }

        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
        }
    });
}
function get_variations(m_id) {        

    var sitpath = '<?php echo SITEPATH; ?>';
    $.ajax({
        type: "POST",
        url: "../get_variations.php",
        data: {"param": m_id},
        dataType : "json",
        success: function(response) {
            
            var colors = response.colors;

              for (var i = 0; i < colors.length; i++) {
                var color = colors[i];
              //  console.log("Color name: " + color.name + ", ID: " + color.id);
            }

            
             var storage = [64,128,256,512,1024];
             var condition   = ['Good','Superb'];
             var hiddenVal = $('input[name="mobilecondition"]').val();
             if(hiddenVal == 0){
             		 var variations = colors.length * 5 * 2;
             }else{
             		 var variations = colors.length * 5;
             }
           //  var variations = colors.length * 5 * 2;
             var htmlFields = '';

              
            //  console.log(hiddenVal);

            for (var i = 1; i <= variations; i++) {

            	 var variation_index = i - 1;

            	 // Calculate the index for color, storage, and condition arrays
  			if(hiddenVal == 0){
  				var color_index = Math.floor(variation_index / (5 * 2)) % colors.length;
				  var storage_index = Math.floor(variation_index / 2) % 5;
				  var condition_index = variation_index % 2;
				}else{ 

				  var color_index = Math.floor(variation_index / (5)) % colors.length;
  				  var storage_index = Math.floor(variation_index) % 5;
  				}

				  var colr =  colors[color_index];
            	htmlFields += '<div class="row variation-row"><div class="col-sm-2" style="padding-top:8px;" data-del="delete'+i+'"><label class="control-label">IMEI ' + i + '</label>';
                htmlFields += '<input type="text" name="variations['+i+'][imei]" value="" id="txt_imi_no_'+i+'" class="form-control" Placeholder="IMEI"/></div>';
                	

                htmlFields += '<div class="col-sm-2" style="padding-top:8px;" data-del="delete'+i+'"><label class="control-label">Color ' + i + '</label>';
                htmlFields += '<input type="text" name="variations['+i+'][color]" value="' + colr.name + '" class="form-control" Placeholder=""/><input type="hidden" name="variations['+i+'][id]" value="'+colr.id+'" style="display:none;"></div>';  

                 htmlFields += '<div class="col-sm-2" style="padding-top:8px;" data-del="delete'+i+'"><label class="control-label">RAM/ROM ' + i + '</label>';
                htmlFields += '<input type="text"  style="font-size: 10px;"   name="variations['+i+'][ram]" value="" id="" class="form-control" Placeholder="3/128,4/256,4/256"/></div>';
   if(hiddenVal == 0){
                  htmlFields += '<div class="col-sm-2" style="padding-top:8px; data-del="delete'+i+'""><label class="control-label">Condition ' + i + '</label>';
               

                  
                	htmlFields += '<input type="text"  style="font-size: 13px;" name="variations['+i+'][device_condition]" value="' + condition[condition_index] + '" id="device_condition_'+i+'" class="form-control" Placeholder="Good / Superb"/></div>';
           		 }
                   htmlFields += '<div class="col-sm-2" style="padding-top:8px; "data-del="delete'+i+'"><label class="control-label">Price ' + i + '</label>';
                 htmlFields += '<input type="text"  style="font-size: 13px;" name="variations['+i+'][expected_price]" value="" id="txt_expected_price'+i+'" class="form-control" Placeholder=""/></div>';
                 

                  // Add the close button with an onclick function that removes the variation
   

     htmlFields += '<div class="col-sm-2" style="width:1.666667%; padding-top:35px;"><button type="button" class="btn btn-danger remove-variation" data-variation-index="' + i + '">&times;</button></div>';


       htmlFields += '</div>';
            }
          
            // Append the HTML fields to the container element
            $('#htmlFieldsContainer').html(htmlFields);



        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
        }
    });
}



$('#prod_cat_id').change(function() {
    // Get the selected option value


    var selectedVal = $(this).val();
    // If the selected value is 2 (Used), change the hidden input value to 0
    if (selectedVal == 2) {
      $('input[name="mobilecondition"]').val(0);
    }
  }); 


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


		function availability1(value){
		//alert(value);
		   if(value=='Unavailable'){
		      $('#Imeidiv').hide();
		      $('#hmold').hide();
		      $('#btn-add').text('Save');
		   }else{
		      $('#Imeidiv').show();
		      $('#hmold').show();
			   $('#btn-add').text('Next');
		   }

		}
        availability1('<?php echo $availability; ?>');
</script>




