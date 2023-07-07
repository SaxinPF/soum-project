<?php include('config.php');

    $type = 'Admin';
    $cond='';
    $conds='';
	if($type!='')
	{
	 $cond=" soum_product_master.poster_type='$type' and soum_product_master.trash!='delete'";
	}

$sql="select *,concat(prod_subcat_desc,' ',model_name ) phone1 from (
select *,
if(poster_type='Dealer',
		(select fname from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select fname from soum_master_customer where cust_id=temp1.poster_id),'Admin')) fname,

	if(poster_type='Dealer',
		(select mobile from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=temp1.poster_id),'Admin')) mobile
 from (select   temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
										select * from (
										select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal
										,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price,soum_product_master.dealer_del_date from soum_product_master where $cond) prod
										left outer join soum_prod_subcat
										on prod.brand=soum_prod_subcat.prod_subcat_id)temp
										left outer join soum_prod_subsubcat
										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id
) temp1
)tmep2 ".$conds." order by prod_id desc";

	              $res=$db->query($sql);
				  echo  $acount=mysqli_num_rows($res).'counts <br>';
				  while($row=$res->fetch_assoc()){
					$dealer_del_date = '1897410600';

					 $prod_id = $row['prod_id'];
					 $sql1 = "UPDATE soum_product_master SET dealer_del_date=$dealer_del_date WHERE prod_id=$prod_id";
				    // $db->query($sql1);
				  }


?>
