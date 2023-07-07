<?php
 include('config.php');
 //include('_mail_fire.php');
 $layout_title = 'SOUM | Services Online Used Mobile';
 if(isset($_SESSION['Order_otp'])){
    unset($_SESSION['Order_otp']);
 }else{
    header('Location: https://soum.co.in');
 }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <?php include('elements/headcommon.php');?>
   </head>
<body>
     <?php include('elements/header.php');?>
 <div class="clearfix"></div>
 <div class="mainhead container">
      <div class="clearfix"></div>
       <div class="row">
                        <div class="col-sm-12" style="text-align:center;padding-top:40px;">
        					<img src="images/thanx.jpg" class="thank-img">
						</div>
						<div class="col-sm-12">
						 <?php
                         $prod_id=$_REQUEST['prod_id'];
                         $ord_id=$_REQUEST['order_id'];
                         $mobile=$_REQUEST['mobile'];
                         $fname=$_REQUEST['name'];

                          $hrom=$_REQUEST['hrom'];
                           $hcolor=$_REQUEST['hcolor'];
                           $hcondition = '';
                           if(isset($_REQUEST['hcondition']) && $_REQUEST['hcondition'] != ''){
                           	$hcondition=$_REQUEST['hcondition'];
                           }
                            



                    $selorder_item="select temp2.*,soum_prod_subsubcat.prod_subcat_desc model from (
									select temp.*,soum_prod_subcat.prod_subcat_desc brand_name from (
									select * from soum_product_master where soum_product_master.prod_id=$prod_id order by soum_product_master.prod_id )temp
									left outer join soum_prod_subcat
									on temp.brand=soum_prod_subcat.prod_subcat_id )temp2
									left outer join soum_prod_subsubcat
									on temp2.modal=soum_prod_subsubcat.prod_subsubcat_id";

					$qry_order_item=$db->query($selorder_item);
					$row_order_item=$qry_order_item->fetch_assoc();

				        if($_REQUEST['category_type']=='phone'){
    			         $phone=$row_order_item['brand_name']." ".$row_order_item['model'];
					}else{
					 $phone=$row_order_item['brand_name']." ".$row_order_item['modal_name'];
					}


					     if($row_order_item['availability']=='Unavailable'){
    					         $msg="Currently, we are out of stock for the $phone. We would try our best to get in 2 days. Thanks SOUM team.";
                           $message = urlencode($msg);
						    sms_api($mobile,$message);
						 }else{
								 $msg="Thanks $fname, For showing your interest for buying a $phone ( $hcolor $hrom $hcondition). Our marketing team would contact to you within 24 working hours. Soum 4 u";
						 $message = urlencode($msg);
						    sms_api($mobile,$message,1407167913872804583);

                         }
									?>



						  <p style="text-align:center;font-size:16px;font-weight:500;margin-top:20px;"><h4 style="text-align:center;font-weight: 500;font-size: 16px;">Thanks <?=$fname;?>, For showing your interest for buying a "<?=$phone;?> ( <?=$hcolor;?> <?=$hrom;?> <?=$hcondition;?>)". Our marketing team would<br/> contact to you within 24 working hours</h4></p>

        <?php  $category_type = $_REQUEST['category_type'];
						if($category_type=='phone'){
						?>

    <p style="text-align:center">
	<div style='text-align:center'>Would you like to buy another phone - <a href='index.php'>Click here</a>
    </div></p>

                     <?php } ?>


						</div>


</div>
</div>

 <?php include('elements/footer.php');?>

</body>
</html>
