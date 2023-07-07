
<html lang="en">
  <head>
    <?php include('elements/headcommon.php');?>
    <style>
    	
    .mydatatable td {
    		background-color: #f3fbff;
    	}

    	#mobile2::-webkit-input-placeholder {
  background-color: transparent;
}
#mobile2::-moz-placeholder {
  background-color: transparent;
}
#mobile2:-ms-input-placeholder {
  background-color: transparent;
}
#mobile2::placeholder {
  background-color: transparent;
  background-size: 100% 100%;
  background-position: 0 0;
  padding: 0 0.2em; /* to adjust the position of the text within the background */
}
#mobile2:focus::placeholder {
  background-color: #f3fbff;
}

.cls_color_btn.active, .rom-buttons.active {
	border: 1px solid #5e9bb9;
}

 </style>
  </head>
  <body>
  <?php include('elements/header.php');?>

 <script src="js/jquery.maskedinput.js" type="text/javascript"></script>

<script>
$("#name").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z ]/g)) {
       $(this).val(val.replace(/[^a-zA-Z ]/g, ''));
   }
});
jQuery(function($){

  // $("#mobile2").mask("9999999999",{placeholder:"__________"});

});

$("document").ready(function()
{
   var mob=localStorage.getItem("mobile");
    if(mob!=null)
    {
        client2(mob);

    }
});
function validreview(){
        qty=$('#qty').val();
        tot_qty=+qty + 50;
    for(i=0;i<=tot_qty;i=i+50)
    {

        if(i!=tot_qty)
        {
            r=0;
        }
        else
        {
			r=1;
		}
	}
}


/* function bynow()
{
   var log='<?=$user_id;?>';
   var prod_id='<?=$prod_id;?>';

    	if(log!='')
    	{
    	   window.location.href="order_detail2.php?prod_id="+prod_id;
    	}
    	else
    	{

    	  window.location.href="login.php?cart_value=detail&prod_id="+prod_id;

    	}
} */
function client2(mob)
{   $('.loadingDivO').show();
   $.getJSON('client.php?callback=?','mob='+mob+'&act=client', function(data){
		if(data)
		{
		  $.each(data,function(i,element){
		      $('#poster_id').val(element.cust_id);
		      $('#name').val(element.fname);
		      $('#mobile2').val(element.mobile);

          });
        }
     });
	  $('.loadingDivO').hide();
}

function Orderform(){
 	            $("#btorder").html("Please Wait .......<img src='upload/loader.gif' style='width:10px!important;height:10px!important;'>");
				$('.errorMessage233').html('&nbsp;');
				
    var priceElement = document.getElementById("pro_price");
    var hprice = priceElement.innerHTML.trim();

	        var frmData = $("#OrderForm").serialize();

	        
    var frmData = $("#OrderForm").serialize();
    frmData += "&hprice=" + hprice; // add hprice to the form data

			 $.ajax({
					type: "POST",
					url: 'order_detail2.php',
					data: frmData,
					dataType: 'json',
					error: function(a,b,c) {
						alert('Unable to process request. - ' + a);
					},
				   success: function (data){
						 $("#btorder").html('Submit');

						if($.trim(data.error) == "1"){
							$('.errorMessage233').html(data.errorMessage);
						}else{

							  document.getElementById("mobnu").value=data.mobile;
							  document.getElementById("order_id").value=data.order_id;
							  document.getElementById("otp_user").value=data.user_id;
							  document.getElementById("otp_prod_id").value=data.prod_id;

						      $('#gtmobile').html(data.mobile);


						      $('#intrested').hide();
						      var modalq4 = document.getElementById('exampleModal4');
 	                           modalq4.style.display = "block";
	                          $("#exampleModal4").addClass('show');

						}

				    }
				});


}



</script>
  	<?php
		$dtm=date('Y-m-d H:i:s');
		$sql1=$db->prepare("insert into soum_view_count(date,prod_id,user_id,user_type) values(?,?,?,?)");
		$sql1->bind_param("ssss",$dtm,$prod_id,$user_id,$user_type);
		$sql1->execute();

		/*$sql=$db->prepare("select
			*,soum_prod_subcat.prod_subcat_desc as brand1,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
			if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
			if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
			if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,
			soum_product_master.category_type as product_category,
            soum_product_master.warranty as pro_warranty,
			(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating

			from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
			where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
			and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
			and soum_product_master.prod_id=?
			and soum_product_master.active=1");


	   $sql->bind_param('i', $prod_id);
	   $sql->execute();
	   $res=$sql->get_result();*/

	  // echo $sql;

	   $real_rate=0;
	   $disc_perc=0;
	   $row=$res->fetch_assoc();
	 //  echo "<pre>";print_r($row);

	   $finl_productid = $row['prod_id'];

	   $real_rate=$row['appliable_rate'];
  	   $img_logo=$row['poster_type'];
  	
  	if($row['dis_type']==1)
  	{
  		$disc_perc1=round(($row['discount']*$real_rate)/100);
  		$disc_perc=$real_rate-$disc_perc1;
  		$dis=$row['discount']." %";
  	}
  	else if($row['dis_type']==2)
  	{
  	   $disc_perc=$real_rate-$row['discount'];
       $dis=$row['discount']." flat";
  	}
  	else
  	{
  	   $disc_perc=$row['appliable_rate'];
       $dis='0%';
  	}
	   $image_string=($row['images']=='0'?"":$row['imagesx']);
	   $image_string.=($row['images1']=='0'?"":",".$row['images1x']);
	   $image_string.=($row['images2']=='0'?"":",".$row['images2x']);
	   $image_string.=($row['images']=='0'?"":",".$row['imagesx']);
	   $image_array=explode(",",$image_string);
	   $ptype=$row['prod_cat_id'];
	   $uid=$row['poster_id'];

   	if($row['appliable_rate']<=$row['offer_price']){ $disc_perc=$row['appliable_rate'];}else{ $disc_perc=$row['offer_price'];}
   	if ($row['hot_deal']==1) $offer=1;
	if ($row['hot_deal_rate']>$disc_perc)
	$disc_perc="<del>".$row['hot_deal_rate'] . "</del>  &nbsp;<i class='fa fa-inr' aria-hidden='true' style='font-size:22px;'></i> " .$disc_perc;


  	$d=date('Y-m-d');
  	/** BOF Security Patch IS-002*/
  	$offer=$db->prepare("select * from soum_offer where prod_id=? and start_dt<='$d' and end_dt>='$d' and active=1");
  	
  	$offer->bind_param('i', $prod_id);
  	$offer->execute();
  	$ores=$offer->get_result();
  	/** BOF Security Patch IS-002*/
  	$rowo=$ores->fetch_assoc();
  	$offid=$rowo['offer_id'];
  	$offimg=$rowo['offer_image'];
    $offtitile=$rowo['offer_title'];
	$offdesc=$rowo['offer_desc1'];
	$postby=$row['poster_id'];
	$posttype=$row['poster_type'];
    $view=$row['review'];
    $active=$row['active'];
    $priority=$row['priority'];
    $Status=$row['deal'];
    $cstock=$row['current_stock'];
	$modal=$row['modal'];

	$acc=$row['condi'];
    $gaur=$row['soum_gaur'];

	$prodname1=$row['brand1']." ".$row['model'];
	$offerPrice=$row['offer_price'];

$avg_rat=$row['rating'];
$avg_rat=round($avg_rat);
$rem_rat=5-$avg_rat;
?>


 <div class="clearfix"></div>
<div class="mainhead detailpage">
<div class="container">
<div class="row">
<div class="col-md-5">
<!-- <div><img src="img/largimagwe.jpg" alt="" class="prolargimg"/></div>
<div class="clearfix"></div>
<div><img src="img/thumb.png" alt="" class="prolargimg"/> <img src="img/thumb.png" alt="" class="prolargimg"/> <img src="img/thumb.png" alt="" class="prolargimg"/> <img src="img/thumb.png" alt="" class="prolargimg"/></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=363022447930591&autoLogAppEvents=1"></script>
<div class="fb-like" data-href="https://www.facebook.com/soumofficial/" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>

<div class="clearfix"></div> -->
<?php 
				$sqln 	 = "select * from soum_prod_subsubcat where prod_subcat_desc like '".$row['model']. "' and prod_subcat_id =".$row['brand'];

						//echo $sqln;
						$resss = $db->query($sqln);
							if ($resss->num_rows > 0) {

							
							    // Loop through each row
							    while($rowww = $resss->fetch_assoc()) {
							        $midd = $rowww["prod_subsubcat_id"];
							    }
							} 

		//	$sqlclr = "select * from soum_colors WHERE model_id = ".$midd ."inner join ";

			$sqlclr = "select sc.* FROM soum_colors sc JOIN product_variation pv ON pv.color_id = sc.id
WHERE sc.model_id = ".$midd." AND pv.prod_id =". $finl_productid;
			
			$ressscl = $db->query($sqlclr);

			//echo $sqlclr;

	        $colorData = array();
	        $priceData = array();
						$romData = array();
						$conditionData = array(); // initialize the array outside the loop



			if ($ressscl->num_rows > 0) {
			         while($rowwwclr = $ressscl->fetch_assoc()) {
			                $colorId = $rowwwclr["id"];

			           $sqlprice = "SELECT * FROM product_variation WHERE color_id = ".$colorId ." AND prod_id = ". $finl_productid;

			        //   echo $sqlprice."<br>";
			           $resprice = $db->query($sqlprice);
				       
						if ($resprice->num_rows > 0 ) {

						    while ($rowprice = $resprice->fetch_assoc()) { 

						        $clrname 	= $rowwwclr["title"];
						        $clrimage 	= $rowwwclr["image"];
						        $colorId 	= $rowwwclr["id"];

						        if ($rowprice["price"] != '') {

						            $priceData[] = $rowprice["price"];
						            $romData[] = $rowprice["rom"];
						            $conditionData[] = $rowprice['condi']; // add data to the initialized array
						        }

						       // echo $clrname."<br>";
						    }
						}		
						//exit();	                
			                // add color name and image url to array
			                $colorData[] = array(
			                    'name' => $clrname,
			                    'rom' => $romData,
			                    'condition' => $conditionData,
			                    'image' => $clrimage,
			                     'prices' => $priceData,
			                     'id'=> $colorId
			                );			               
			     }

			    //echo "<pre>";print_r($colorData);
			 }
			 	// Assuming your array is named $products
for ($i = 0; $i < count($colorData); $i++) {
    for ($j = $i + 1; $j < count($colorData); $j++) {
        if ($colorData[$i]['name'] === $colorData[$j]['name'] && $colorData[$i]['image'] === $colorData[$j]['image']) {
            unset($colorData[$i]);
             $colorData = array_values($colorData);
             $i--; // re-index the loop variable
            break;
        }
    }
}

// Assuming your array is named $products
$colorData = array_values($colorData);


		// echo "<pre>";print_r($colorData);

?>
<div class="xzoom-container-new">
    <div class="woocommerce-product-gallery__wrapper">
        <figure class="woocommerce-product-gallery__image">
            <img src="upload/<?php echo $colorData[0]['image']; ?>" alt="">
        </figure>
    </div>
</div>

	<div class="test">
	    <?php
	    foreach ($colorData as $color) {
	        ?>
	        <img class="thumbnail-image xzoom-gallery4" width="80" src="upload/<?php echo $color['image']; ?>" alt="">
	        <?php
	    }
	    ?>
	</div>
</div>


     <?php   $category_type  =  $row['product_category'];
		if($category_type =='phone'){
		  include('elements/detail_'.$category_type.'.php');
		}else{
		   include('elements/detail_cable.php');
		}
	 ?>

<!-- </div> -->
<div class="row"> 

	<div class="acessbox table-responsive test">
<table class="table mydatatable">

  <tbody>
    <tr>
      <td scope="row">Display</td>
      <td><?=$row['display'];?> inch</td>
       <td>Weight</td>
      <td><?=$row['p_weight'];?>gm</td>
       <td scope="row">Processor</td>
      <td><?=$row['processor'];?></td>
      
    </tr>
    <tr>
      <td scope="row">Battery</td>
      <td><?=$row['battry'];?></td>
      <td>Front Camera</td>
      <td><?=$row['fcame'];?>MP</td>
        <td>Back Camera</td>
      <td><?=$row['bcame'];?>MP</td>
    </tr>
  

    
  </tbody>
</table>

</div>

</div>
<div class="clearfix"></div>
<div class="related ">
<?php $categories = get_category_types();?>
<h2>More <?php echo (isset($categories[$category_type]))?$categories[$category_type]:''; ?></h2>
<div class="clearfix"></div>
<div class="owl-carousel owl-theme">
            <?php
				$sql=$db->prepare("select
				*,soum_prod_subcat.prod_subcat_desc as brand1,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
				if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
				if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
				(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating
				from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
				where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
				and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
				and soum_product_master.active=1
				and soum_product_master.category_type='". $category_type."'
                and soum_product_master.trash!='delete'
				and soum_product_master.prod_cat_id=2 and soum_product_master.deal!=1  order by p_type LIMIT 0, 10");
				$sql->execute();
				$res=$sql->get_result();

					while($row=$res->fetch_assoc())
					{
						$disc_perc=0;
						//$img_prod=$row['imagesx'];
						$img_logo=$row['poster_type'];


					$product_id=$row['prod_id'];
  					$d=date('Y-m-d');
  					/** BOF Security Patch IS-002*/
				  	$offer=$db->prepare("select * from soum_offer where prod_id=? and start_dt<='$d' and end_dt>='$d'");
				  	$offer->bind_param('i', $product_id);
  				  	$offer->execute();
  				  	$ores=$offer->get_result();
  				  	/** EOF Security Patch IS-002*/
  				  	$rowo=$ores->fetch_assoc();
				  	$offid=$rowo['offer_id'];
					if($row['prod_cat_id']==2)
					 $type="Used";
					else if($row['prod_cat_id']==1)
					 $type="New";


					$gaur=$row['soum_gaur'];
					/******pawan**********/
					$fd=$row['prime_image'];
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


if($row['offer_price'] == 0){

	//echo "473-";

    $newprice = "SELECT MIN(price) AS min_price ,color_id FROM product_variation WHERE prod_id =" . $row['prod_id'];

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
				   ?>

	         <div class="item" >
				 <div onclick="window.location.href='<?php echo SITEPATH. slugify($row['brand1'].'-'.$row['model']).'-'.$row['prod_id'];?>'" style="cursor:pointer;">
				     <div class="prodetailimg">
	    			 <img src="upload/<?php echo $img_prod;?>" alt=""/>
					 </div>
				     <div class="prodtl"><?php echo $row['brand1'];?> <?php echo $row['model'];?> <span style="margin-bottom:0px;"> From Rs.<?php echo $relatedprice;?>/-</span></div>
						<div class="prodtl"><?php
                                $avg_rat=$row['rating'];
								$avg_rat=round($avg_rat);
								$rem_rat=5-$avg_rat;
								for($r=0;$r<$avg_rat;$r++)
									{
										?>
											<img style="padding-bottom: 10px;" src="img/star.png" alt=""/>
										<?php
									}
									for($r=0;$r<$rem_rat;$r++)
									{
										?>
											<img style="padding-bottom: 10px;" src="img/star-gray.png" alt=""/>
										<?php
									}

                       ?>
                       <span><?php if($row['current_stock']<=0){ echo 'Out of Stock';}else{ echo $row['code'];}?></span>
					   </div>
				 </div>
             </div>
	        <?php	}	?>

          </div>
</div>


</div>
</div>
<?php include('elements/footer.php');?>
<script>

    // update main image when color button is clicked
    var colorButtons = document.querySelectorAll('.color-button');
    var mainImage = document.querySelector('.woocommerce-product-gallery__image img');

    colorButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var image = button.getAttribute('data-image');
            mainImage.setAttribute('src', image);
        });
    });

    var thumbnailImages = document.querySelectorAll('.thumbnail-image');
		thumbnailImages.forEach(function(thumbnail) {
    thumbnail.addEventListener('click', function() {
        var image = thumbnail.getAttribute('src');
        mainImage.setAttribute('src', image);
    });
});

// add click event listener to each color button
var colorButtons = document.querySelectorAll('.color-button');
for (var i = 0; i < colorButtons.length; i++) {
    colorButtons[i].addEventListener('click', function() {
        // get the index of the clicked color button
        var index = Array.prototype.indexOf.call(colorButtons, this);
        
        // update the price div with the price for the selected color variation
        var priceData = <?php echo json_encode($colorData); ?>;
        var selectedColorPrices = priceData[index].prices;
        if (selectedColorPrices.length > 0) {
            var selectedPrice = selectedColorPrices[0];

            document.getElementById('pro_price').textContent = Math.floor(selectedPrice);
        }
    });
}

$('.color-button').on('click', function() {
	 $(this).addClass('active').siblings().removeClass('active');
  	var colorId = $(this).data('color-id');
  		var cname = $(this).data('cname');
  		var romSize = $('.rom-buttons.active').data('rom-size');
  		var conditionId = $('.condition-buttons.active').data('rom-size');
 $('#intrestbut').attr('data-color', cname);
 $('.intrest-span').attr('data-color', cname);

  updateProductDetails(colorId, romSize,conditionId);
});

// Event listener for the RAM/ROM button click event.
$('.rom-buttons').on('click', function() {
  $(this).addClass('active').siblings().removeClass('active');
  var colorId = $('.color-button.active').data('color-id');
  var romSize = $(this).data('rom-size');
  var conditionId = $('.condition-buttons.active').data('rom-size');
 $('#intrestbut').attr('data-rom', romSize);
 $('.intrest-span').attr('data-rom', romSize);
  updateProductDetails(colorId, romSize,conditionId);
});

$('.condition-buttons').on('click', function() {
  $(this).addClass('active').siblings().removeClass('active');
  var colorId = $('.color-button.active').data('color-id');
  var conditionId = $(this).data('condition');
  var romSize = $('.rom-buttons.active').data('rom-size');
 $('#intrestbut').attr('data-condition', conditionId);
 $('.intrest-span').attr('data-condition', conditionId);
  updateProductDetails(colorId, romSize,conditionId);
});


function updateProductDetails(colorId, romSize ,conditionId) {
	//console.log(colorId);
 $.ajax({
    url: 'get_var_details.php',
    type: 'POST',
    data: {
        'color_id': colorId,
        'rom_size': romSize,
        'conditionId' : conditionId,
        'product_id' : '<?php echo $finl_productid;?>'
    },
    dataType: 'json',
    success: function(data) {


    	 if (typeof data.price === 'number') {
        var price = Math.floor(data.price);
    } else if (typeof data.price === 'string') {
        price = data.price.replace(/\.00$/, ''); // remove .00 from end of string
    } else {
        price = data.price;
    }

        $('#pro_price').text(price);

        if (price === "Out of Stock") {
                $('.rupiimg').hide();
            } else {
                $('.rupiimg').show();
            }
     
    },
    error: function(xhr, textStatus, errorThrown) {
        console.log('Error: ' + textStatus);
    }
});

}


</script>


<script>
function Orderformothers(){
                 $("#btorder").html("Please Wait .......<img src='upload/loader.gif' style='width:10px!important;height:10px!important;'>");
				$('.errorMessage233').html('&nbsp;');


	        var frmData = $("#OrderForm").serialize();
			 $.ajax({
					type: "POST",
					url: 'order_detail2_others.php',
					data: frmData,
					dataType: 'json',
					error: function(a,b,c) {
						alert('Unable to process request. - ' + a);
					},
				   success: function (data){
						 $("#btorder").html('Submit');

						if($.trim(data.error) == "1"){
							$('.errorMessage233').html(data.errorMessage);
						}else{

							  document.getElementById("mobnu").value=data.mobile;
							  document.getElementById("order_id").value=data.order_id;
							  document.getElementById("otp_user").value=data.user_id;
							  document.getElementById("otp_prod_id").value=data.prod_id;
						      $('#gtmobile').html(data.mobile);


						      $('#intrested').hide();
						      var modalq4 = document.getElementById('exampleModal4');
 	                           modalq4.style.display = "block";
	                          $("#exampleModal4").addClass('show');

						}

				    }
				});


}


function ValidateOTPButton(){
  var mob=$("#mobnu").val();
  var order_id=$("#order_id").val();
  var otp_user=$("#otp_user").val();
  var otp_prod_id=$("#otp_prod_id").val();
  var otp=$("#otp_box").val();

  var hcolor = $("#hcolor").val();
var hrom = $("#hrom").val();
var hcondition = $("#hcondition").val();
var priceElement = document.getElementById("pro_price");
var hprice = priceElement.innerHTML.trim();



                  $("#btotp").html("Please Wait .......<img src='upload/loader.gif' style='width:10px!important;height:10px!important;'>");
				$('.errorMessage234').html('&nbsp;');
	        var frmData = 'mobile='+mob+'&otp='+otp+'&order_id='+order_id;
			 $.ajax({
					type: "POST",
					url: 'otp_order_validate.php',
					data: frmData,
					dataType: 'json',
					error: function(a,b,c) {
						alert('Unable to process request. - ' + a);
					},
				   success: function (data){
						 $("#btotp").html('Validate OTP');

						if($.trim(data.error) == "1"){
							$('.errorMessage234').html(data.errorMessage);
						}else{

						   window.location.href= 'order_success.php?mobile='+mob+'&prod_id='+otp_prod_id+'&order_id='+order_id+'&name='+otp_user+'&category_type=<?php echo $category_type; ?>'+'&hcolor='+hcolor+'&hrom='+hrom+'&hcondition='+hcondition;
						}

				    }
				});


}
</script>

<script src='js/star/jquery.rating.js' type="text/javascript" language="javascript"></script>
<link href='js/star/jquery.rating.css' type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="zoom/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="zoom/xzoom.css" media="all" />
<script src="zoom/setup.js"></script>

<script>
	/*$(document).ready(function() {

 	 $('#intrestbut').on('click', function () {    
 	 	console.log(this);
      $('#intrested').find('#order-desc').val('');
		$(document).find('#mobile2').val('');
		$(document).find('#name').val('');
		
    	var rom =  $(this).data('rom');   
		var color = $(this).data('color');		
		var condition = $(this).data('condition');	

		console.log(rom+color+condition);	
		$('#order-desc').val('Hello SOUM Team, I wish to buy " <?php echo $prodname1;?> (' + color + ' ' + rom + ' ' + condition + '), and would like to discuss about its price. I have shared my phone number so you could call me anytime.');
		  });
		});*/
		$(document).ready(function() {
			  $('#intrestbut').on('click', function () {    
			    			   
			    $('#intrested').find('#order-desc').val('');
			    $(document).find('#mobile2').val('');
			    $(document).find('#name').val('');

			   
			   var rom = $(this).attr('data-rom');   
    			var color = $(this).attr('data-color');     
   				 var condition = $(this).attr('data-condition');   

   				 $('#hcolor').val(color);
   				 $('#hrom').val(rom);
   				 $('#hcondition').val(condition);
				

			    // Use rom, color, and condition to update order description
			    $('#order-desc').val('Hello SOUM Team, I wish to buy "<?php echo $prodname1;?> (' + color + ' ' + rom + ' ' + condition  + '), and would like to discuss about its price. I have shared my phone number so you could call me anytime.');
			  });

			  	  $('.intrest-span').on('click', function () {    
			    
			  	 	$('#intrested').find('#order-desc').val('');
					    $(document).find('#mobile2').val('');
					    $(document).find('#name').val('');

					    // Get rom, color, and condition from clicked button
					   var rom = $(this).attr('data-rom');   
		    			var color = $(this).attr('data-color');     
		   				 var condition = $(this).attr('data-condition');   
		   				 $('#hcolor').val(color);
   				 			$('#hrom').val(rom);
   				 			$('#hcondition').val(condition);

					    // Use rom, color, and condition to update order description
					    $('#order-desc').val('Hello SOUM Team, I wish to buy "<?php echo $prodname1;?> (' + color + ' ' + rom + ' ' + condition  + '), and would like to discuss about its price. I have shared my phone number so you could call me anytime.');

			   	  });
	
			});


	$(document).ready(function() {
	
    
	    var activeColor = document.querySelector('.color-button.active');
	    var activeRom = document.querySelector('.rom-buttons.active');
	  
    	 <?php if($prod_cat_id == 2): ?>
	    		  var activecondition = document.querySelector('.condition-buttons.active');
	    		 // console.log(activecondition.dataset.condition+'ss');
	     <?php endif; ?>

	    // set the data-color and data-rom values of the intrestbut button
	    var intrestBut = document.getElementById('intrestbut');
	    intrestBut.dataset.color = activeColor.dataset.cname;
	    intrestBut.dataset.rom = activeRom.dataset.romSize;
	    intrestBut.dataset.condition = activecondition.dataset.condition;

	   const intrestSpan = document.querySelector('.intrest-span');
   		 intrestSpan.dataset.color = activeColor.dataset.cname;
   		   intrestSpan.dataset.rom = activeRom.dataset.romSize;

  		   <?php if($prod_cat_id == 2): ?>
  		   
	     	intrestSpan.dataset.condition = activecondition.dataset.condition; 
	       <?php endif; ?>

	});

</script>
</body>
</html>
