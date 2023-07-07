<?php
	include('config.php');
	
	$id=mysqli_real_escape_string($db,$_REQUEST['id']);	
	$sql=$db->prepare("select temp.*,soum_prod_subcat.prod_subcat_desc brandName from (select soum_prod_subsubcat.prod_subsubcat_id,soum_prod_subsubcat.prod_subcat_desc,soum_prod_subsubcat.prod_subcat_id
	,soum_prod_subsubcat.price,soum_prod_subsubcat.display,soum_prod_subsubcat.battry,soum_prod_subsubcat.os,soum_prod_subsubcat.processor,soum_prod_subsubcat.ram
	,soum_prod_subsubcat.fcame,soum_prod_subsubcat.bcame,soum_prod_subsubcat.colour,soum_prod_subsubcat.warranty
	,soum_prod_subsubcat.p_weight,soum_prod_subsubcat.p_rom,soum_prod_subsubcat.p_img1,soum_prod_subsubcat.p_img2,soum_prod_subsubcat.p_img3,soum_prod_subsubcat.p_desc from soum_prod_subsubcat where prod_subcat_id=$id) temp
	left outer join soum_prod_subcat
    on temp.prod_subcat_id=soum_prod_subcat.prod_subcat_id");
	$sql->execute();
	$tbl=$sql->get_result();
	
	$r=array();
	while($row=mysqli_fetch_array($tbl))
	{
	  $r[]=$row;
	}
echo $_GET['callback'] . '(' . json_encode($r). ')';
?>
