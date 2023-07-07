<?php include('config.php');
$layout_title = 'SOUM | Services Online Used Mobile';
?>
<!doctype html>
<html lang="en">
   <head>
    <?php include('elements/headcommon.php');


    ?>
<style>
  .rplg-box {
  margin: 0px !important;
  color: #777 !important;
  border: none !important;
  background-color: #fff !important;
  border-radius: 0px !important;
}
  </style>

</head>

<body>
     <?php include('elements/header.php');


     ?>

 <div class="clearfix"></div>
  <div class="mainhead container">
                <?php
                    $sql=$db->prepare("select * from soum_banner where 1=1 and active order by banner_id desc limit 1");
                    $sql->execute();
                    $res=$sql->get_result();
                    while ($row=$res->fetch_assoc())
                    {
						$banner_image=$row['banner_image'];
						$banner_desc=$row['banner_desc'];
						$banner_desc2=$row['banner_desc2'];
						$banner_link=$row['banner_link'];
						$banner_btn=$row['banner_btn'];
				?>
				<div class="headslog"><h1>One-stop solution to all gadgets. <span>Building trust through genuine products, exceptional service, and unbeatable prices.</span></h1> <a class="seehowmuch" href="<?php echo $banner_link; ?>" role="button"><?php echo $banner_btn; ?></a></div>
				<div class="clearfix"></div>
				<div><img src="upload/banner_img/new-02.jpg" alt=""/></div>
               <?php } ?>
  </div>
         <div class="clearfix"></div>
  <div data-romw-token="jTjgmHUNgkera2QqomZx11DY2s2QadbEd545wHWTrJ40ah8X3y"></div>

		 <!-- TestimonialS Slider - Free Weebly Widget by Baamboo Studio - Style 2 -->
		 <!-- 	<div class="testimonial_slider_2 testimonial">
			 <?php
				$sql = $db->prepare("SELECT * FROM soum_master_customer WHERE user_review!='' order by cust_id desc limit 5");
					$sql->execute();
					$res=$sql->get_result();
					$i = 1;
						while ($row=$res->fetch_assoc())
					    { ?>
						  	<?php if($i==1){ ?>
						      <input type="radio" name="slider_2" id="slide_2_1" checked />
						     <?php }else{ ?>
				              <input type="radio" name="slider_2" id="slide_2_<?php echo $i; ?>" />
						     <?php } ?>

					  <?php  $i++;
					   } ?>
					<div class="boo_inner clearfix">
					   <?php

					   $sql = $db->prepare("SELECT * FROM soum_master_customer WHERE user_review!='' order by cust_id desc limit 5");
					   $sql->execute();
					   $res=$sql->get_result();


					   while ($row=$res->fetch_assoc()) {

							  $image=$row['image'];
							  if($image=='')$image='profile.png';
							  $name=$row['fname'];
							  $msg=$row['user_review'];
						?>

							<div class="slide_content">
								<div class="testimonial_2">
									<div class="content_2">
										<p><?php echo $msg; ?></p>
									</div>
									<div class="author_2">
										<h3><?php echo $name; ?></h3>
										<h4><img src="img/star.png" alt=""/> <img src="img/star.png" alt=""/> <img src="img/star.png" alt=""/> <img src="img/star.png" alt=""/> <img src="img/star.png" alt=""/></h4>
									</div>
								</div>
							</div>
			<?php
			} ?>   </div>
			     <div id="controls">
					<?php

                    $sql = $db->prepare("SELECT * FROM soum_master_customer WHERE user_review!='' order by cust_id desc limit 5");
					$sql->execute();
					$res=$sql->get_result();

					$i = 1;
						while ($row=$res->fetch_assoc())
					    { ?>
					    <label for="slide_2_<?php echo $i; ?>"></label>

					  <?php  $i++; } ?>
			      </div>

		</div>-->
<div class="container tr-widget" data-id="4422" data-view="flash" data-lang=""><a rel="nofollow" href="https://trust.reviews/" style="display: none !important;" class="trcr" target="_blank">Powered by <span>Trust.Reviews</span></a></div><script type="text/javascript" src="https://cdn.trust.reviews/widget/embed.min.js" defer></script>

     <?php include('elements/our_services.php');?>
  <div class="trainding">
  <div class="container">
    <h2>Trending Used Phones</h2>
  <div class="clearfix"></div>
  <div class="trandngara">
  <span>Wide range of used mobile phones. Simple, elegant and fully functional.</span>
      <div class="owl-carousel owl-theme">

	   <?php
$time = time();

$sql=$db->prepare("select
*,soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
(select avg(rating) from soum_product_review where prod_id=soum_product_master.prod_id) rating
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.active=1
and soum_product_master.category_type='phone'
and soum_product_master.trash!='delete'
and soum_product_master.dispatched_date >$time
and soum_product_master.dealer_del_date >$time
and soum_product_master.prod_cat_id=2 and soum_product_master.deal!=1  order by prod_id desc LIMIT 0, 10");

$sql->execute();
$res=$sql->get_result();


					while($row=$res->fetch_assoc())
					{
						$disc_perc=0;
						//$img_prod=$row['imagesx'];
						$img_logo=$row['poster_type'];
						$gaur=$row['soum_gaur'];
						$fd=$row['prime_image'];
						/******pawan**********/
					  	if($fd=="0" || $fd=="")
						$img_prod=$row["imagesx"];
					    else if($fd=="1")
						$img_prod=$row["images1x"];
					    else if($fd=="2")
						$img_prod=$row["images2x"];



                    if($row['color_id']>0){
						$color_id  =  $row['color_id'];
						$sql = "select * from soum_colors where soum_colors.id=".$color_id;

								  $ress=$db->query($sql);
							$rowww=$ress->fetch_assoc();
							$img_prod=$rowww["image"];

                    }

$fromstrng = '';
if($row['offer_price'] == 0){



    $newprice = "SELECT MIN(price) AS min_price ,color_id FROM product_variation WHERE prod_id =" . $row['prod_id'];

//echo $newprice;
    $pricee = $db->query($newprice);

    $row_count = mysqli_num_rows($pricee);

    $rowpr      = $pricee->fetch_assoc();
    $relatedprice = intval($rowpr['min_price']);



    $fromstrng .= 'From ';

    //echo $img_prod;
    $clid = $rowpr['color_id'];
     if(strpos($img_prod, 'modelImage') === 0 || $img_prod == '0' || empty($img_prod) || $img_prod == '../images/noimage.png'){


      $newimage = "SELECT image FROM soum_colors WHERE id =" . $clid;
    //  echo $newimage;
      $newimf = $db->query($newimage);
      $rowimg = $newimf->fetch_assoc();
      $img_prod = $rowimg['image'];


    }


}


					$product_id=$row['prod_id'];
  					$d=date('Y-m-d');
				  	$offer=$db->prepare("select * from soum_offer where prod_id=$product_id and start_dt<='$d' and end_dt>='$d'");
				  	$offer->execute();
  				  	$ores=$offer->get_result();
  				  	$rowo=$ores->fetch_assoc();
				  	$offid=$rowo['offer_id'];
					if($row['prod_cat_id']==2)
						$type="Used";
					else if($row['prod_cat_id']==1)
						$type="New";

				   ?>
            <div class="homephones item" >
				 <div onclick="window.location.href='<?php echo SITEPATH. slugify($row['brand'].'-'.$row['model']).'-'.$row['prod_id'];?>'" style="cursor:pointer;">
				     <div class="proimg">
	    			 <img src="upload/<?php echo $img_prod;?>" alt=""/>
					 </div>
				     <div class="prodtl"><?php echo $row['brand'];?> <?php echo $row['model'];?> <span style="margin-bottom:0px;"><?php echo "From"; ?> ₹ <?php echo $relatedprice; ?>/-</span></div>
						<div class="prodtl"><?php
                                $avg_rat=$row['rating'];
								$avg_rat=round($avg_rat);
								$rem_rat=5-$avg_rat;
								for($r=0;$r<$avg_rat;$r++)
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
                       <span><?php if($row['current_stock']<=0){ echo 'Out of Stock';}else{ echo $row['code'];}?></span>
					   </div>
				 </div>
            </div>
			<?php } ?>
      </div>
      <div class="text-center"><a class="viewmore" href="phones.php?phone=used" role="button">View More</a></div>
  </div>
  </div>
  </div>
  <?php include('elements/static_images.php');?>
   <div class="dealoftheday">
   <div class="container">
    <?php include('elements/deal.php');?>
   <div class="clearfix"></div>

   <div class="featara">
   <h2>Featured Brands</h2>
   <div class="clearfix"></div>
   <div class="row">
       	<?php
					$sql=$db->prepare("select * from soum_prod_subcat where prod_subcat_id!=0 ORDER BY prod_subcat_id DESC;");
					$sql->execute();
					$res=$sql->get_result();
					while($row=$res->fetch_assoc())
					{
						$prod_subcat=$row['prod_subcat_desc'];
						$prod_subcat_id=$row['prod_subcat_id'];
						$img=$row['logo'];

						  $sql="SELECT categroy_type FROM categroy_brands WHERE categroy_type='phone' AND brand_id=$prod_subcat_id";
		                  $res_cat = $db->query($sql);

						if($res_cat->num_rows>0){



					?>
        <div class="col-sm-2 col-6"><a href="<?php echo SITEPATH.slugify($prod_subcat).'-gadgets';?>"><img src="upload/c_logo/<?=$img;?>" alt=""/></a></div>
		                <?php } ?>
			  <?php } ?>
  </div>

   </div>
   </div>
   </div>
 <?php  include('elements/footer.php');?>
 <script>
  $("document").ready(function(){

	 $.ajax({
		type:"Post",
		url:"prelaunch_popup.php",
		data:"act=2",
		success:function(html)
		{
		  if(html!=0){ popup();}
		  $("#myModal2").html(html);
		}
	});


});

$(document).ready(function(){
		pagenum = 1;
		function AutoRotate() {
		   var myele = null;
		   var allElements = document.getElementsByTagName('label');
		   for (var i = 0, n = allElements.length; i < n; i++) {
			   var myfor = allElements[i].getAttribute('for');
			   if ((myfor !== null) && (myfor == ('slide_2_' + pagenum))) {
				   allElements[i].click();
				   break;
			   }
		   }
		   if (pagenum == 5) {
			   pagenum = 1;
		   } else {
			   pagenum++;
		   }
		}
		setInterval(AutoRotate, 2000);
	});
 </script>
</body>
</html>

