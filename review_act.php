<?php
include('config.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];

$layout_title = 'SOUM';
?>

<!doctype html>
<html lang="en">
   <head>



<meta name="description" content=""/>
<link rel="canonical" href="" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include('elements/headcommon.php');?>

   </head>
<body>
     <?php include('elements/header.php');?>
 <div class="clearfix"></div>
<div class="container" style="min-height: 300px;">
<h2 style="text-align: center;padding-top: 100px;">Your rating has been successfully saved</h2></div>
  <?php include('elements/footer.php');?>



</body>
</html>
























/*

<?php
include('config.php');
$cust_id=$_SESSION['poster_id'];
$user_type=$_SESSION['poster_type'];
$cust_id=$_REQUEST['custid'];
$sql1="select * from soum_master_customer where cust_id=$cust_id";

$res=$db->query($sql1);
$row=$res->fetch_assoc();
$name=$row['fname'];
$prod_id=$_REQUEST['prod_id'];
$rating=$_REQUEST['star1'];
$comment=$_REQUEST['comment'];
$desc=$_REQUEST['desc'];
//echo $prod_id."=".$rating."=".$comment."=".$desc;
//echo die();
    $sql=$db->prepare("insert into soum_product_review (cust_id,name,cust_type, prod_id, rating, cmnt, description)values(?,?,?,?,?,?,?)");
	$sql->bind_param("sssssss",$cust_id,$name,$user_type,$prod_id,$rating,$comment,$desc);

	$result=$sql->execute();
	if($result)
	{

            $sql=$db->prepare("select
			*,soum_prod_subcat.prod_subcat_desc as brand1,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
			if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
			if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
			if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,
			(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating

			from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
			where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
			and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
			and soum_product_master.prod_id=?
			and soum_product_master.active=1");

		/** BOF Security Patch IS-002*/
	   $sql->bind_param('i', $prod_id);
	   $sql->execute();
	   $res=$sql->get_result();
	   $row=$res->fetch_assoc();
	   $url_path = SITEPATH. slugify($row['brand'].'-'.$row['model']).'-'.$row['prod_id'];

 	     echo '<script>alert("Your rating has been successfully saved");</script>';
         echo "<script>window.location.href='$url_path';</script>";
		//header('location:detail.php?prod_id='.$prod_id);


 	}
 	else
 	{
 		$r="not added";
 	}
?>
*/