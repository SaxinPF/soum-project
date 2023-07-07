<!doctype html>

<?php
    include('config.php');
    $user_id=mysqli_real_escape_string($db,$_SESSION['poster_id']);
    $user_type=mysqli_real_escape_string($db,$_SESSION['poster_type']);
    $prod_id=mysqli_real_escape_string($db,$_REQUEST['prod_id']);
    $prod_array =  explode('-',$prod_id);
    $_REQUEST['prod_id'] = $prod_id = end($prod_array);
    $layout_title = 'SOUM | Services Online Used Mobile';

     if((int)$prod_id<1){
      header("Location: https://www.soum.co.in/404.php");exit();
	 }

    	$sql=$db->prepare("select
			*,soum_prod_subcat.prod_subcat_desc as brand1,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=3, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
			if (soum_product_master.prod_cat_id=3, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
			if (soum_product_master.prod_cat_id=3, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
			if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,
			soum_product_master.category_type as product_category,
            soum_product_master.warranty as pro_warranty,
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

	   if($res->num_rows<1){

		$sql=$db->prepare("select
		*,soum_prod_subcat.prod_subcat_desc as brand1,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type,
        soum_product_master.category_type as product_category,
		soum_product_master.warranty as pro_warranty,
		(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating

		from soum_product_master,soum_prod_subcat
		where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
	    and soum_product_master.prod_id=?
		and soum_product_master.active=1");

	/** BOF Security Patch IS-002*/
          $sql->bind_param('i', $prod_id);
          $sql->execute();
          $res=$sql->get_result();

		  if($res->num_rows<1){
            header("Location: https://www.soum.co.in/404.php");exit();
		  }else{
			include('detail_b.php');
		  }
	   }else{
		 include('detail_a.php');
	   }



?>
