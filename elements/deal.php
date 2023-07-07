  <div class="row" id="Dealzone">
   <div class="col-sm-4 deallft">
   <h2>Deals of the Day</h2>
   <div class="time" id="demo"></div>
  <div class="text-center"><a class="viewmore" href="phones_deals.php" role="button">View More</a></div> 
   
   </div>
    <div class="col-sm-8">
         <div class="owl-carousel owl-theme">
	 <?php
		          
$sql=$db->prepare("select  
*,soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.active=1
and prod_id IN (82,87,86,88,117,118,119)
order by prod_id desc LIMIT 0, 10");
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
		 
		 
		 
            <div class="item">
					 <div onclick="window.location.href='detail.php?prod_id=<?php echo $row['prod_id'];?>'" style="cursor:pointer;">
					 <div class="proimg">
					 <!--<div class="proid">UCN06056  <img src="img/star.png" alt=""/> <img src="img/star.png" alt=""/> <img src="img/star.png" alt=""/> <img src="img/star.png" alt=""/> <img src="img/star.png" alt=""/></div>-->
					 <img src="upload/<?php echo $img_prod;?>" alt=""/></div>
					  <div class="prodtl"> <?php echo $row['brand'];?> <?php echo $row['model'];?> <span>Rs.<?php if($row['appliable_rate']<=$row['offer_price']){echo $row['appliable_rate'];}else{echo $row['offer_price'];}?>/-</span></div>
					 
					 </div>
            </div>
			<?php } ?>
         </div>
	 </div>
   
   </div>
   
   
   <script>
var time = '<?php echo date('M d, Y H:i:s',strtotime('May 29, 2018 18:17:09'));?>';

// Set the date we're counting down to
var countDownDate = new Date(time).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML =  hours + " : "
  + minutes + " : " + seconds + " ";
 
  //document.getElementById("demo").innerHTML = days+"<span>Days </span>"+hours+"<span>Hours</span>"+minutes+"<span>Minutes</span>";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    //document.getElementById("demo").innerHTML = "EXPIRED";
	$('#Dealzone').hide();
  }
}, 1000);
</script>