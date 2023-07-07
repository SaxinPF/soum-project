<?php
	include('config.php');
	$brand=$_REQUEST['brand'];
	$model=$_REQUEST['model'];
		
	$sql="select *,count(1) tot from soum_product_master, soum_prod_subsubcat 
where soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id and  brand='$brand' and modal='$model' and current_stock!=0 group by soum_product_master.modal";

	
	$tbl=$db->query($sql);
	if(mysqli_num_rows($tbl)>0)
	{
	$row=$tbl->fetch_assoc();
	$img=$row['p_img1'];
?>
	<a href="phones.php?drpBrand=<?=$brand;?>&drpModel=<?=$model;?>">
	<img src="upload/<?=$img?>" style="width:auto;height:50px;float:left;text-align:left;margin-right:10px;">
	<?=$row['tot'];?> product is available In Stock </br>
	Click here to view detail.</a>
	
	<?php } 
	else
	{ ?>
		At present, this product is not available in stock. We will inform you as and when it become available. 
<?php	}
	?>