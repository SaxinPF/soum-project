<div class="col-md-7">
<?php $pro_warranty = $row['pro_warranty']; ?>
  <?php $description = $row['description']; ?>
  <?php $color_name = $row['color_name']; ?>
  <div class="dtlproname"><h2><?php echo $gadgets = $row['brand1']." ".$row['modal_name'];?>  <span><?=$row['code'];?></span> </h2></div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-3">
    <?php    for($r=0;$r<$avg_rat;$r++)
    		{
			?>
			<img src="img/star.png" alt=""/>
			<?php
			}
			for($r=0;$r<$rem_rat;$r++)
			{
			?>
			<img src="img/star-gray.png" alt=""/>
			<?php
			}
		   ?>


	</div>
	<div class="col-md-3 col-6 form-inline" style="display:none;">
	<?php if($row['yearbyadmin']!=''){
	 ?> (<?=$row['yearbyadmin'];?>)
	 <?php } ?>
	</div>
<div class="col-md-4 col-6"><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#review">Write Your Review</button>

<div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="reviewModel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
	 <form method="post" action="review_act.php" onsubmit="return validreview()" name="radioForm">
      <div class="modal-header">
        <h5 class="modal-title" id="reviewModel">Product Review </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body signara">
        <p>Your feedback is live in terms of Star Ratings, please contribute</p>

			        <?php
						/** BOF Security Patch IS-002*/
						$prod_id=mysqli_real_escape_string($db,$_REQUEST['prod_id']);
						$sql=$db->prepare("select
						*,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
						if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
						if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
						(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating

						from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
						where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
						and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
						and soum_product_master.active=1 and prod_id=?");
						$sql->bind_param('i', $prod_id);
						$sql->execute();
						$res=$sql->get_result();
						$row=$res->fetch_assoc();
						/** EOF Security Patch IS-002*/
						$img=$row['imagesx'];
						$postid=$row['poster_id'];
					?>



     <div class="row text-left">
     <div class="col-sm-6">
     <div class="row">
       <div class="col-sm-7"><img src="upload/<?=$img?>" style="max-height:190px;" alt=""/><center><?=$row['code'];?></center></div>
       <div class="col-sm-5">
			 <button class="accessbut" type="button">	<?php
							/** BOF Security Patch IS-002*/
							$sql_ord=$db->prepare("select * from soum_order_details where prod_id=?");
							$sql_ord->bind_param('i', $prod_id);
							$sql_ord->execute();
							$res_ord=$sql_ord->get_result();
						echo $tot_orders=mysqli_num_rows($res_ord);
							/** EOF Security Patch IS-002*/
						?><br>
								Orders</button><br>
			<?php
							/** BOF Security Patch IS-002*/
							$qry=$db->prepare("select * from soum_product_review where prod_id=?");
							$qry->bind_param('i', $prod_id);
							$qry->execute();
							$result=$qry->get_result();
							$tot_reviews=mysqli_num_rows($result);
							/** EOF Security Patch IS-002*/
							$tot_rat='';
							$avg_rat='';
							while($rec=$result->fetch_assoc())
							{
								$rating=$rec['rating'];
								$tot_rat=$tot_rat + $rating;
							}
							$avg_rat=$tot_rat/$tot_reviews;

							if($avg_rat=='')
							{
								$avg_rat=0;
							}
						?>

		<button class="accessbut" type="button"><?=$tot_reviews;?><br>
		Total Reviews</button><br>
		<button class="accessbut" type="button"><?=$avg_rat;?> <br>
		Average Rating</button><br>


     </div>

     </div>
     </div>

        <div class="col-sm-6 prodreview">

           <h3>What Do You Think About This Product</h3>
		   	<input name="custid" type="hidden" value="<?=$postid;?>">
          <div class="form-group">
            <label for="">Short Comment</label>
            <input type="text" name="comment" id="short_cmnt" class="form-control" id="" aria-describedby="" placeholder="">

         </div>
        <div class="form-group form-inline">
        <label for="">Rating*</label>
		       <input name="star1" type="radio" value="1" class="star"/>
		       <input name="star1" type="radio" value="2" class="star"/>
		       <input name="star1" type="radio" value="3" class="star"/>
		       <input name="star1" type="radio" value="4" class="star"/>
		       <input name="star1" type="radio" value="5" class="star"/>
            </div>
		  <div class="form-group">
			<label for="">Description* Max Characters Length 500</label>
		     <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>

		  </div>

          </div>



     </div>





        </div>
      <div class="modal-footer">
      <input type="submit" name="save_review" value="submit" class="btn btn-secondary"/>
	  <input type="hidden" name="prod_id" value="<?=$prod_id;?>"/>
      </div>
	   </form>
    </div>
  </div>
</div>

</div>
<div class="col-md-5 col-6">
		 <?php
		 if($img_logo=="Admin") { ?>
			<img src="img/gaurantee.jpg" alt=""/>
		<?php
		 }else if($gaur==1){
		?>
		   <img src="img/gaurantee.jpg" alt=""/>
		<?php } ?>
</div>

</div>
<div class="clearfix"></div>
<div class="dtlpric">
<div class="row">
<div class="col-6 col-sm-5 form-inline "><span class="dtprsect"><img src="img/rupees1.png" alt=""/>  <?=$disc_perc;?>/-</span></div>
<div class="col-6 col-sm-7">
       <?php
           if($user_type!='Dealer'){
        ?>
            <?php
           if($postby!=$user_id){
                   if($cstock!=0){?>
				 	    <button class="intrestbut" type="button" style="cursor:pointer;"  data-toggle="modal" data-target="#intrested">I am interested</button>
			       <?php
				   }else{?>
			   		    <input type="button" value="Out of stock" class="btn bt1 btn-primary btn-normal btn-inline" style="margin-bottom:10px;min-width:160px;margin-top:20px;float:left;margin-botom:5px"/>
				   <?php }
			 } ?>
		       <?php
		   }
		?>
</div>
<div class="modal fade" id="intrested" tabindex="-1" role="dialog" aria-labelledby="intrestedmodel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	  <form method="post" id="OrderForm" action="javascript:void(0);" >
      <div class="modal-header">
        <h5 class="modal-title" id="intrestedmodel">One Step Away From Your Gadgets</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	       <div class="errorMessage233" style="color:red;"></div>
			  <div class="form-group">
				<label for="">Mobile No</label>
				<input type="text" name="mobile" id="mobile2" onchange="client2(this.value)" class="form-control"  placeholder="">
			  </div>
			<div class="form-group">
			   <input name="prod_id" value="<?=$prod_id?>" type="hidden" />
			   <input name="category_type" value="<?=$category_type?>" type="hidden" />
				<label for="">Name <div class="loadingDivO" style="display:none;"><img src='upload/loader.gif' style='width:20px!important;height:20px!important;'></div></label>
				<input type="text" name="name" id="name" class="form-control"  aria-describedby="emailHelp" placeholder="">
			</div>
           <!--<div class="form-group">
		      <label for="">Delivery Address</label>
			  <textarea class="form-control" name="delivery_address" rows="3"></textarea>-->
			  <input type="hidden" name="delivery_address" value="Delivery Address"/>
		   <!--</div>-->
		   <div class="form-group">
			 <textarea class="form-control" name="desc" rows="3">Hello SOUM Team, I wish to buy "<?php echo $gadgets ; ?>", and would like to discuss about its price. I have shared my phone number so you could call me anytime. </textarea>
		   </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" onclick="Orderformothers()" id="btorder" class="btn btn-primary">Submit</button>
      </div>
	 </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validate OTP(One Time Passcode)</h5>
<!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body signara">
        <img src="img/logo.jpg" alt=""/>
		<p>A OTP has been sent to <span id="gtmobile"></span>.</p>
		<p>Please enter the OTP to verify your mobile number.</p>
        <h4>Enter Your OTP</h4>
      	 	<div class="form-group">
			   <input  class="form-control" id="otp_box" type="text" placeholder="Enter your OTP number"/>
			    <br/>
				 <div class="errorMessage234" style="color:red;"></div>
                <input id="mobnu" type="hidden" value="">
                <input id="order_id" type="hidden" value="">
                <input id="otp_user" type="hidden" value="">
                <input id="otp_prod_id" type="hidden" value="">
			</div>
    	<!-- 	<small id="emailHelp" class="form-text text-muted">
			    <p>If you have not received the OTP please click below Re-Send OTP Link. </p>
	            <a class="nav-link" href="javascript:void(0);" onclick="reSend()">Re-Send OTP</a>
		    </small> -->


        </div>
      <div class="modal-footer">
	    <button type="button" onclick="ValidateOTPButton()" id="btotp" class="btn btn-primary">Validate OTP</button>
      </div>
    </div>

  </div>
</div>



</div>

</div>
<div class="clearfix"></div>
<div class="acessbox table-responsive">
<table class="table">

  <tbody>
   <tr>
      <td width="15%">Color :</td>
      <td><?=$color_name;?></td>
      <td scope="row"></td>
      <td></td>
	 
    </tr>



  </tbody>
</table>

</div>
<?php //} ?>
  <div class="clearfix"></div>
  <?php if(!empty($description)){ ?>
  <p><strong>Description :  </strong><?php echo nl2br($description);?></p>
  <?php } ?>
</div>
</div>