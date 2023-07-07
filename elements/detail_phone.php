<div class="col-md-7 ">
<div class="dtlproname"><h2><?=$prodname1;?>  <span><?=$row['code'];?></span> </h2></div>
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
						$postid=$row['poster_id'];?>
<div style="padding-bottom:20px;" class="desktopa col-md-9 col-6 form-inline">

	<?php

	$prod_cat_id = $row['prod_cat_id'];
	if($prod_cat_id == 1){
		 echo "Cashback &  EMI Offers Available. Click &nbsp <span class='intrest-span' data-toggle='modal' data-target='#intrested' data-color='' data-condition='' data-rom=''><u> I'm interested</u></span> to know more";

	}else{

		if($row['yearbyadmin']!=''){ ?> (<?=$row['yearbyadmin'];?>)
 <?php }
	}

	 ?>
</div>
  <div style="padding-bottom:20px;" class="col-md-12 mobilea">

	<?php

	$prod_cat_id = $row['prod_cat_id'];
	if($prod_cat_id == 1){
		 echo "Cashback &  EMI Offers Available. Click &nbsp <span class='' data-toggle='modal' data-target='#intrested' data-color='' data-condition='' data-rom=''><u> I'm interested</u></span> to know more";

	}else{

		if($row['yearbyadmin']!=''){ ?> (<?=$row['yearbyadmin'];?>)
 <?php }
	}

	 ?>
</div>
<div class="col-md-3 col-6"><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#review">Write Your Review</button>

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
<!-- <div class="col-md-3 col-6"><a class="btn btn-primary btn-sm" href="form_exchange.php?proid=<?php echo $prod_id; ?>">Buy with Exchange</a></div>-->
 <?php


 if($prod_cat_id == 2){?>
 <div class="col-md-3 col-6"><a class="btn btn-primary btn-sm" href="">7 days warranty</a></div>
<?php }else{ ?>
  <div class="col-md-3 col-6"><a class="btn btn-primary btn-sm" href="">1 year warranty</a></div>
<?php } ?>
<div class="col-md-4 col-6">
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
<div class="col-6 col-sm-5 form-inline ">
	<?php //echo $row['availability'];?>
	<span class="dtprsect"><?php if($row['availability']=='Unavailable'){ ?>Starting from <br/><?php } ?>
		<span class="rupiimg"><img src="img/rupees1.png" alt=""/></span>  <span id="pro_price"> <?php echo intval($colorData[0]['prices'][0]); ?> </span> /-</span>
	</div>
<div class="col-6 col-sm-7">
       <?php
                if($user_type!='Dealer'){
               /* if($ptype==1)
                {
                ?>
		   		    <form method="post" action="add_to_cart.php" onsubmit="return valid()">
					  <div style="width:100%;float:left;margin-top:20px;">
						<div class="col-md-12" style="padding-left:0px;">
						<input type="hidden" name="pid[]" value="<?=$prod_id;?>" id="pid"/>
			   		    <input type="hidden" name="qty[]" value="1" id="qty" style="border: 1px solid#ddd;padding:6px;border-radius:2px;width:160px;margin-botom:10px;float:left;margin-right:10px;"/>
			   		    <?php if($cstock>0){?>
			   		    <input type="submit" value="ADD TO CART" class="btn donate-btn btn-primary btn-normal btn-inline" style="margin-bottom:10px;min-width:160px;float:left;margin-botom:5px;color:#fff;background-color:#da200b;border-color: #da200a;"/>
						<?php }else{?>
			   		    <input type="button" value="Out of stock" class="btn donate-btn btn-primary btn-normal btn-inline" style="margin-bottom:10px;min-width:160px;float:left;margin-botom:5px;color:#fff;background-color:#da200b;border-color: #da200a;"/>
						<?php }?>
						<p class="availability" style="width:100%;float:left;margin-top:10px;">Availability : <span class="color" style="color:#fbaf17;font-weight:bold;"> In Stock</span></p>
						</div>

						</div>
					</form>
				<?php
				}
				else
				{*/
				?>
         <?php
           if($postby!=$user_id)
              {
               if($cstock!=0){?>
			 <button id="intrestbut" class="intrestbut" type="button" style="cursor:pointer;"  data-toggle="modal" data-target="#intrested" data-rom="" data-color="" data-condition="">I am interested</button>
			       <?php
				   }else{?>
			   		    <input type="button" value="Out of stock" class="btn bt1 btn-primary btn-normal btn-inline" style="margin-bottom:10px;min-width:160px;margin-top:20px;float:left;margin-botom:5px"/>
				   <?php } } }?>
		       <?php
		          //}
		          ?>





</div>
<div class="modal fade" id="intrested" tabindex="-1" role="dialog" aria-labelledby="intrestedmodel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	  <form method="post" id="OrderForm" action="javascript:void(0);" >
	  	<input type="hidden" name="hcolor" id="hcolor" value="">
	  	<input type="hidden" name="hrom" id="hrom" value="">
	  	<input type="hidden" name="hcondition" id="hcondition" value="">
      <div class="modal-header">
        <h5 class="modal-title" id="intrestedmodel">One Step Away From Your Phone</h5>
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
				<label for="">Name <div class="loadingDivO" style="display:none;"><img src='upload/loader.gif' style='width:20px!important;height:20px!important;'></div></label>
				<input type="text" name="name" id="name" class="form-control"  aria-describedby="emailHelp" placeholder="">
			</div>

		   <div class="form-group">
			 <textarea id="order-desc" class="form-control" name="desc" rows="3">Hello SOUM Team, I wish to buy "<?=$prodname1;?>", and would like to discuss about its price. I have shared my phone number so you could call me anytime. </textarea>
		   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" onclick="Orderform()" id="btorder" class="btn btn-primary">Submit</button>
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
<p><?php if($row['availability']=='Unavailable'){ ?>Tentative delivery time is 2 days. <?php } ?></p>
<div class="clearfix"></div>
	<?php if($acc!='')
				{
				$access=substr($acc,0,strlen($acc)-1);
				$access=explode(",",$access); ?>
<h2>Accessories</h2>
<div class="clearfix"></div>
	         <?php
				foreach($access as $a=>$b)
                 {
                   $sqla="select * from soum_phone_assecc where access_id=$b";
                   $resa=$db->query($sqla);
                   $accrow=$resa->fetch_assoc();

                   echo '<button class="accessbut" type="submit">'.$accrow['access_name'].'</button>';
                 }
                 ?>
<?php } ?>
<div class="acessbox table-responsive test">

<div class="clone">
<h6> Color</h6>
<?php


$c= 1;

$displayedColors = array();

   foreach ($colorData as $color) {

   	   if (!in_array($color['name'], $displayedColors)) {
			    ?>
			    <button class="color-button cls_color_btn <?php echo ($c == 1 ) ? 'active' : ''; ?>" data-color-id="<?php echo $color['id']; ?>" data-cname="<?php echo $color['name'];?>" data-image="upload/<?php echo $color['image']; ?>"><?php echo $color['name']; ?></button>
			    <?php
			    			$displayedColors[] = $color['name'];
			    $c++;
			  }
			}
			?></div>

<?php if($prod_cat_id != 1){?>

<div>
<h6> Condition</h6>

<?php


$conditionData = array_unique($conditionData);
$f=1;
foreach ($conditionData as $condition) {

	?>
			<button class="condition-buttons <?php echo ($f== 1 ) ? 'active' : ''; ?>" data-condition="<?php echo $condition; ?>"><?php echo $condition; ?></button>

	<?php $f++;
}?>
 </div>
<?php  } ?>

<div>
<h6> Ram/Rom</h6>

<?php
$romData = array_unique($romData);

/*echo "<pre>";
print_r($romData);*/
$d=1;
foreach ($romData as $rom) {


	?>
<button class="rom-buttons <?php echo ($d ==1) ? 'active' : '';?>" data-rom-size="<?php echo $rom;?>"><?php echo $rom; ?></button>
<?php  $d++;} ?></div>
</div>

</div>
</div>


