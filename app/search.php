<?php
include('config.php');
$search=$_REQUEST['search'];
$cond='';


if($search!='')
{
   $cond=" having UPPER(phone1) like upper('%$search%')";
}


    $sql="select soum_prod_subcat.prod_subcat_id brand_id,soum_prod_subcat.prod_subcat_desc brand_name,
    soum_prod_subsubcat.prod_subsubcat_id model_id,soum_prod_subsubcat.prod_subcat_desc model_name,
	concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 
	from soum_prod_subcat,soum_prod_subsubcat
	where soum_prod_subcat.prod_subcat_id=soum_prod_subsubcat.prod_subcat_id ".$cond;
	
	//echo $sql;
    $result=$db->query($sql);
    $r=array();
	while($row=$result->fetch_assoc())
	{
	    	$r[]=$row;

 	}
	
 echo $_GET['callback'] . '' . json_encode($r). '';

?>
