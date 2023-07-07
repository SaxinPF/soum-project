<?php
	include('config.php');
	$sql="select SQL_CALC_FOUND_ROWS *, soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x, if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom, (select avg(rating) from soum_product_review where prod_id=soum_product_master.prod_id) rating from soum_product_master,soum_prod_subcat, soum_prod_subsubcat where soum_product_master.brand= soum_prod_subcat.prod_subcat_id and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id and soum_product_master.active=1 and soum_product_master.prod_id!=0 order by prod_id desc LIMIT 0, 20";
	echo $sql;
    $res = $db->query($sql);
  	while($row=$res->fetch_assoc())
  	{
		echo "sanjay ";
	}
				
				

$sql = "SELECT FOUND_ROWS() AS found_rows";
$rs_result =$db->query($sql); //run the query
$row=$rs_result->fetch_assoc();
$total_records = $row['found_rows'];
echo "sanjay".$total_records."verma";
?>