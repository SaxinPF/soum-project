<html lang="en">
  <head>
    <?php include('elements/headcommon.php');?>
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

   $("#mobile2").mask("9999999999",{placeholder:"__________"});

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
	        var frmData = $("#OrderForm").serialize();
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

		

	   $real_rate=0;
	   $disc_perc=0;
	   $row=$res->fetch_assoc();

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
                            <div class="xzoom-container">
                              <img class="xzoom4" id="xzoom-fancy" src="upload/<?=$row['images'];?>" xoriginal="upload/<?=$row['images'];?>" style="width:100%"/>
					        
                          <?php if($row['availability']=='Available'){ ?>
                              <div class="xzoom-thumbs">
							  <?php if($row['product_category']=='phone'){ ?>
                             <!-- <p style="text-align:left;text-transform:uppercase;">More colours of the variant</p>-->
							  <?php } ?>
					            <a href="upload/<?=$row['images'];?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="upload/<?=$row['images'];?>"  xpreview="upload/<?=$row['images'];?>"></a>
					            <?php if($row['images1']!=''){?>
					            <a href="upload/<?=$row['images1'];?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="upload/<?=$row['images1'];?>"></a>
					             <?php }
					            if($row['images2']!='' && file_exists('upload/'.$row['images2'])){?>
					            <a href="upload/<?=$row['images2'];?>" class="thumbs-1"><img class="xzoom-gallery4" width="80" src="upload/<?=$row['images2'];?>"></a>
					         <?php } ?>
							 </div>
                             <?php } ?>
					        </div>

</div>


     <?php   $category_type  =  $row['product_category'];
		if($category_type =='phone'){
		  include('elements/detail_'.$category_type.'.php');
		}else{
		   include('elements/detail_cable.php');
		}
	 ?>

</div>
<div class="clearfix"></div>
<div class="related ">
<?php $categories = get_category_types();?>
<h2>More <?php echo (isset($categories[$category_type]))?$categories[$category_type]:''; ?></h2>
<div class="clearfix"></div>
<div class="owl-carousel owl-theme">
            <?php
				$sql=$db->prepare("select
				*,soum_prod_subcat.prod_subcat_desc as brand1,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type,
                 (select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating
				from soum_product_master,soum_prod_subcat
				where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
				
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
					$img_prod=$row["images"];
				    else if($fd=="1")
					$img_prod=$row["images1"];
				    else if($fd=="2")
					$img_prod=$row["images2"];



				   ?>

	         <div class="item" >
				 <div onclick="window.location.href='<?php echo SITEPATH. slugify($row['brand1'].'-'.$row['model']).'-'.$row['prod_id'];?>'" style="cursor:pointer;">
				     <div class="prodetailimg">
	    			 <img src="upload/<?php echo $img_prod;?>" alt=""/>
					 </div>
				     <div class="prodtl"><?php echo $row['brand1'];?> <?php echo $row['model'];?> <span style="margin-bottom:0px;">Rs.<?php if($row['appliable_rate']<=$row['offer_price']){echo $row['appliable_rate'];}else{echo $row['offer_price'];}?>/-</span></div>
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

						   window.location.href= 'order_success.php?mobile='+mob+'&prod_id='+otp_prod_id+'&order_id='+order_id+'&name='+otp_user+'&category_type=<?php echo $category_type; ?>';
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
</body>
</html>
