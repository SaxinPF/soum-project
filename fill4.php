<option value="">Model Name*</option>
<?php
	include('config.php');	
	$param=$_REQUEST['param'];
	$mid=$_REQUEST['mid'];
	$category_type_conditions = '';
	if(isset($_REQUEST['category_type']) && !empty($_REQUEST['category_type'])){
	$category_type_conditions = " where temp.category_type='".$_REQUEST['category_type']."'";
	}
	
	$sql="select temp.*,soum_prod_subcat.prod_subcat_desc brandName from (select * from soum_prod_subsubcat where 1=1 and( prod_subcat_id=".$param." or prod_subcat_id=0 ) order by prod_subcat_id desc) temp
	left outer join soum_prod_subcat
    on temp.prod_subcat_id=soum_prod_subcat.prod_subcat_id".$category_type_conditions;
	//echo $sql;
	$res=$db->query($sql);	
	$j=1;
if(mysqli_num_rows($res)>0){
	while($row=$res->fetch_assoc())
	{
	?>		
		<option value="<?=$row['prod_subsubcat_id'];?>" <?php if($row['prod_subsubcat_id']==$mid) echo "Selected";?>><?=$row['brandName']." ".$row['prod_subcat_desc'];?></option>
	<?php 
	}
}
?>
