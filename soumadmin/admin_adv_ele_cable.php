       <style>  
       .remove-img{
			position: absolute;
			top: -7px;
			right: 2px;
			z-index: 99999999;
			cursor:pointer;
		}
       </style>  


		 <?php
                     $description = $prod_id = $brand = $model = $imi_no = $expected_price = '';
			         $img1 = $img2 =  $img3 =  ''; $img11 =  $img21 =  $img31 =  $img7 =  $img8 =  '../images/noimage.png';
				     $condition =  $warranty = $color_name = $seller_name = $seller_phone = '';
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
                $modal_name = $model = $drpModel=mysqli_real_escape_string($db,$_POST['modal_name']);
				$description  =  mysqli_real_escape_string($db,$_POST['description']);

				//$imi_no = mysqli_real_escape_string($db,$_POST['imi_no']);
				$expected_price = $offer_price=mysqli_real_escape_string($db,$_POST['expected_price']);




				$approve = 1;



				$warranty = mysqli_real_escape_string($db,$_POST['warranty']);


				$color_name = mysqli_real_escape_string($db,$_POST['color_name']);
				$seller_name = mysqli_real_escape_string($db,$_POST['seller_name']);
				$seller_email = mysqli_real_escape_string($db,$_POST['seller_email']);
				$seller_phone = mysqli_real_escape_string($db,$_POST['seller_phone']);
				$seller_address = mysqli_real_escape_string($db,$_POST['seller_address']);
				$seller_city = mysqli_real_escape_string($db,$_POST['seller_city']);

				if(!empty($_POST['image1'])){
				 $image1 = $img1 = $_POST['image1'];
				    $img11  =      '../upload/'.$image1;
				}
				if(!empty($_POST['image2'])){
				 $image2 =  $img2 = $_POST['image2'];
				  $img21  =      '../upload/'.$image2;
				}

				if(!empty($_POST['image3'])){
				 $image3 =  $img3 = $_POST['image3'];
				  $img31  =      '../upload/'.$image3;
				}



				//validations
				$error ='';
				if(empty($brand)){
				  $error .='Brand is required.</br>';
				}
				if(empty($model)){
				  $error .='Model is required.</br>';
				}
				/*$length = strlen((string) $imi_no);
				if($length < 15){
				  $error .='IMEI number must be 15 digits.</br>';
				}
				if(empty($imi_no)){
				  $error .='IMEI number is required.</br>';
				}*/
				if(empty($expected_price)){
				  $error .='Expected Price is required.</br>';
				}
				if(empty($color_name)){
				  $error .='Colour is required.</br>';
				}
				if(empty($_POST['image1'])){
				  $error .='First Image is required.</br>';
				}


				//Save work
				if(empty($error)){

						if($_POST['act' ] == "add"){
							$active='0';
							$table=(!isset($poster_type)?'soum_product_master_temp':'soum_product_master');
								if($oldphone==2){
								$moda ='Null';
								 $s1=1;
								 $s2=1;
								 $s3='cable';
									$sql=$db->prepare("insert into $table (post_date,titile,prod_cat_id,brand,modal,modal_name,imei_no,images,images1,images2,description,poster_type,poster_id,active,appliable_rate,offer_price,warranty,color_name,seller_name,seller_email,seller_phone,seller_address,seller_city,opening_stock,current_stock,category_type)
									values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
									$sql->bind_param("ssssssssssssssssssssssssss",$post_date,$titile,$oldphone,$drpBrand,$moda,$drpModel,$imi_no,$img1,$img2,$img3,$description,$poster_type,$poster_id,$approve,$offer_price,$offer_price,$warranty,$color_name,$seller_name,$seller_email,$seller_phone,$seller_address,$seller_city,$s1,$s2,$s3);

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
                            // echo '<script>window.location.href="admin_adv_cable.php?req_id='.$enq_id.'&act=add&step=2&admin_adv_s=Please add your images."</script>';
                             echo '<script>window.location.href="admin_adv_cable.php?admin_adv_s=Ad has been updated successfully"</script>';
				      }
					  if($_POST['act' ] == "edit"){
							$qty =1;
	                        $sql=$db->prepare("update soum_product_master set titile='$titile',brand='$drpBrand',modal_name='$drpModel',images='$img1',images1='$img2',images2='$img3',imei_no='$imi_no',appliable_rate='$offer_price',active=$approve,offer_price='$offer_price',warranty='$warranty',seller_name='$seller_name',seller_email='$seller_email',seller_phone='$seller_phone',color_name='$color_name',seller_address='$seller_address',seller_city='$seller_city',opening_stock='$qty',current_stock='$qty',description='$description' where prod_id=$prodid");
						    $res=$sql->execute();
						    $enq_id=$prodid;

							   $rating = 5;
							   $rname ='admin';
						       $sqlr="insert into soum_product_review (cust_id,name,cust_type, prod_id, rating)values('$admin_id','$rname','$admin','$enq_id','$rating')";

							   $result=$db->query($sqlr);
							  $_SESSION['admin_adv_s'] = 'Ad has been updated successfully';
			                 //echo '<script>window.location.href="admin_adv.php?admin_adv_s=Ad has been updated successfully"</script>';
		                      //echo '<script>window.location.href="admin_adv_cable.php?req_id='.$enq_id.'&act=edit&step=2&admin_adv_s=Please add your images."</script>';
					          echo '<script>window.location.href="admin_adv_cable.php?admin_adv_s=Ad has been updated successfully"</script>';
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
																	select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal,soum_product_master.imei_no,soum_product_master.rom,soum_product_master.ram2,soum_product_master.images2,soum_product_master.bill_img,soum_product_master.add_proof_img,soum_product_master.images1,soum_product_master.images,soum_product_master.sell_letter,soum_product_master.swap_letter,soum_product_master.seller_name,soum_product_master.seller_email,soum_product_master.seller_phone,soum_product_master.color_name,soum_product_master.description,soum_product_master.seller_city,soum_product_master.warranty,soum_product_master.condi,soum_product_master.active,soum_product_master.modal_name
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
						    $modal_name  =      $row['modal_name'];

						    //$imi_no  =      $row['imei_no'];
						    $expected_price  =      $row['offer_price'];

							if(!empty($row['images']) && file_exists('../upload/'.$row['images'])){
						        $img11  =      '../upload/'.$row['images'];
							}
							if(!empty($row['images1']) && file_exists('../upload/'.$row['images1'])){
						        $img21  =      '../upload/'.$row['images1'];
							}
							if(!empty($row['images2']) && file_exists('../upload/'.$row['images2'])){
						        $img31  =      '../upload/'.$row['images2'];
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




						    $warranty  =      $row['warranty'];
						    $color_name  =      $row['color_name'];
						    $seller_phone  =      $row['seller_phone'];
						    $seller_name  =      $row['seller_name'];
						    $approve  =      $row['active'];
						    $token  =      $row['code'];
						    $seller_city  =      $row['seller_city'];
						    $seller_email  =      $row['seller_email'];
						    $description  =      $row['description'];
							$image1           = $row['images'];
							$image2           = $row['images1'];
							$image3           = $row['images2'];


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
						 <?php //if(!isset($_REQUEST['step'])){ ?>
							<form id="uploadimage"  method="post" enctype="multipart/form-data">
								    <input type="hidden" id="prod_id" name="prod_id" value="<?php echo $prod_id ?>">
									<input type="hidden"  id="act" name="act" value="<?php echo $act ?>">
									<div class="col-md-6">
										<label class="control-label">Company/ Brand* </label>
										<select class="form-control" name="drpBrand" id="soum_prod_subcat" >
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
										  <input type="text" name="modal_name" value="<?php echo $modal_name ?>"  class="form-control" Placeholder="Model Name"/>
     								</div>
									<div class="col-md-6">
										<label class="control-label">Price Expected (?)*</label>
										<input type="text" name="expected_price" value="<?php echo $expected_price ?>" id="txt_expected_price" class="form-control" Placeholder=""/>
									</div>

									<div class="col-md-6">
											<label class="control-label">Warranty</label>
											<input type="text" name="warranty" value="<?php echo $warranty ?>" id="warranty" class="form-control" Placeholder=""/>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-6">
											<label class="control-label">Colour</label>
							                <input type="text" name="color_name" value="<?php echo $color_name ?>" id="color_name" class="form-control" Placeholder=""/>
									</div>
									<div class="col-md-12">
										<label class="control-label">Description</label>
										<textarea class="form-control"  id="description" name="description" rows="5"><?php echo $description ?></textarea>
									</div>


								<?php //}else{ ?>

								<div id="uploadimage">
										<div class="col-md-12">
											    <label class="control-label">Ads with photos</label>
										</div>

									<div class="col-sm-4" style="margin-top:15px;">
									
									
									<?php
									 $r1 = 'display:none;';
									 if(!empty($image1)){
										 $r1 = 'display:block;';
									 } ?>
										<div class="filedivcls">
											 <a id="rmv1" onclick="remove_img(1)" class="remove-img" style="<?php echo $r1 ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
										    <input type="hidden"  id="imagesave1" name="image1" value="<?php echo $image1; ?>">
											<img src="<?php echo $img11 ?>" id="previewing1" style="height:80px;position:absolute;top:0;"/>
											<span class="select-wrapper"><input name="fileToUpload1" onchange="readURL(this,1);"  id="fileToUpload1" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
										</div>
									</div>
		                            <div class="col-sm-4" style="margin-top:15px;">
										<?php
									 $r1 = 'display:none;';
									 if(!empty($image2)){
										 $r1 = 'display:block;';
									 } ?>
			                            <div class="filedivcls">
										 <a id="rmv2" onclick="remove_img(2)" class="remove-img" style="<?php echo $r1 ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
										   <input type="hidden"  id="imagesave2" name="image2" value="<?php echo $image2; ?>">
			                            	<img src="<?php echo $img21 ?>" id="previewing2" style="height:80px;position:absolute;top:0;"/>
			                            	<span class="select-wrapper"><input name="fileToUpload2" id="fileToUpload2" onchange="readURL(this,2);"  type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
			                            </div>
		                            </div>
		                            <div class="col-sm-4" style="margin-top:15px;">
										<?php
									 $r1 = 'display:none;';
									 if(!empty($image3)){
										 $r1 = 'display:block;';
									 } ?>
		                            	<div class="filedivcls">
										    <a id="rmv3" onclick="remove_img(3)" class="remove-img" style="<?php echo $r1 ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
										    <input type="hidden"  id="imagesave3" name="image3" value="<?php echo $image3; ?>">
			                            	<img src="<?php echo $img31 ?>" id="previewing3" style="height:80px;position:absolute;top:0;"/>
		                            		<span class="select-wrapper"><input name="fileToUpload3" id="fileToUpload3" onchange="readURL(this,3);" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;background-color:#dcf9ff;"></span>
		                            	</div>
		                            </div>

									<div class="col-md-12" style="text-align:center;">
										<button class="btn btn-primary mr5 waves-effect"  type="submit" style="margin:20px;" id="btn-add"><?php echo $act ?></button>
			    					</div>
								</form>

						    	</div>
							<?php //} ?>

     						</div>
						</div>
					</div>
					<?php } ?>



<script>
		function readURL(input,id){
		      $('#previewing'+id).attr('src','../upload/loader.gif');

				if (input.files && input.files[0]) {
					var selectedFile = input.files[0];
					//console.warn(selectedFile);
					    fd = new FormData();
					    fd.append('fileToUpload'+id,selectedFile,selectedFile.name);
						$.ajax({
							  type: "POST",
							  async: false,
							  url: "admin_adv_file_upload2.php",
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
									document.getElementById("imagesave"+id).value = o.path;
									 $("#rmv"+id).show();
							   }
							});
				}
        }
		
function remove_img(v){
  $('#imagesave'+v).val("");
  $('#previewing'+v).attr('src','../images/noimage.png');
  $("#rmv"+v).hide();
}	
		

</script>




