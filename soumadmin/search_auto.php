	  <?php  
	    $local_IP = array('localhost','127.0.0.1','192.168.100.38');
		$this_host = $_SERVER['HTTP_HOST'];
		if (in_array ($this_host, $local_IP)) 
		{
			define('HOST', 'localhost');
			define('USER', 'root');
			define('PASS', '');
			define('DBNAME', 'soum_new');
		}
		else
		{
		  define('HOST', 'localhost');
    define('USER', 'ASe5t678s3_soum1');
    define('PASS', 'zDEyFw6Tgi');
    define('DBNAME', 'ASe5t678s3_soum1');
		}
$db = new mysqli(HOST, USER, PASS, DBNAME);
	  $cs_json = array();
	    $search =  $_GET['term'];
	    $table =  $_GET['table'];
	    $on =  $_GET['field'];
  if($table =='order'){		
		 if($on==2){
			$conds=" and fname like '%$search%'";
		 }
		 if($on==3){
			$conds=" and mobile like '%$search%'";
		 }
		$cond ='';
		$cond1 ='';
	                $qry="select *,soum_order_details.price price1,soum_prod_subcat.prod_subcat_desc brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from
										soum_order_master, soum_order_details,
										soum_product_master,soum_prod_subcat,soum_prod_subsubcat
										where soum_order_master.order_id= soum_order_details.order_id
										and soum_order_details.prod_id=soum_product_master.prod_id
                                        and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
										and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
										and soum_order_master.archive=0".$cond." ".$cond1." ".$conds."
										ORDER BY soum_order_master.order_id desc LIMIT 20";	
	   
	   
	                                   $res=$db->query($qry);
										
										$i=0;
									
										while($row=$res->fetch_assoc())
										{
										 if($on==3){
										  $cs_json[$i]['label'] = $row['mobile']; 
			                              $cs_json[$i]['value'] = $row['mobile']; 
										 }else{
										  $cs_json[$i]['label'] = $row['fname']; 
			                              $cs_json[$i]['value'] = $row['fname']; 
										 
										 }
											$i++;
										}
        
	}
	
	
	if($table =='buyer_requiement'){		
		 if($on==2){
			 $conds=" where req_name like '%$search%'";
		 }
		 if($on==3){
			 $conds=" where req_mob like '%$search%'";
		 }
	
	       $sql="select SQL_CALC_FOUND_ROWS* from
			  (select soum_buyer_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_buyer_requirement,soum_prod_subcat,soum_prod_subsubcat
				where soum_buyer_requirement.brand=soum_prod_subcat.prod_subcat_id
				and soum_buyer_requirement.model=soum_prod_subsubcat.prod_subsubcat_id) temp ".$conds." ORDER BY temp.req_id desc LIMIT 20";
				//echo $sql;
	   
	   
	                                   $res=$db->query($sql);
										
										$i=0;
									
										while($row=$res->fetch_assoc())
										{
										 if($on==3){
										  $cs_json[$i]['label'] = $row['req_mob']; 
			                              $cs_json[$i]['value'] = $row['req_mob']; 
										 }else{
										  $cs_json[$i]['label'] = $row['req_name']; 
			                              $cs_json[$i]['value'] = $row['req_name']; 
										 
										 }
											$i++;
										}
        
	}
	
	
	if($table =='customer'){		
		 if($on==2){
			 $conds="where fname like '%$search%'";
		 }
		 if($on==3){
			 $conds="where mobile like '%$search%'";
		 }
	
	    	$type = 'Customer';
			$cond='';
			if($type!='')
			{
			  $cond="soum_product_master.poster_type='$type' and soum_product_master.trash!='delete'";
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
										,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where $cond) prod
										left outer join soum_prod_subcat
										on prod.brand=soum_prod_subcat.prod_subcat_id)temp
										left outer join soum_prod_subsubcat
										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id
) temp1
)tmep2 ".$conds." order by prod_id desc LIMIT 20";
	   
	   
	                                   $res=$db->query($sql);
										
										$i=0;
									
										while($row=$res->fetch_assoc())
										{
										 if($on==3){
										  $cs_json[$i]['label'] = $row['mobile']; 
			                              $cs_json[$i]['value'] = $row['mobile']; 
										 }else{
										  $cs_json[$i]['label'] = $row['fname']; 
			                              $cs_json[$i]['value'] = $row['fname']; 
										 
										 }
											$i++;
										}
        
	}
	
	if($table =='seller_r'){		
		 if($on==2){
			 $conds=" where saler_name like '%$search%'";
		 }
		 if($on==3){
			 $conds=" where saler_mob like '%$search%'";
		 }
	
	       	  $sql="select SQL_CALC_FOUND_ROWS * from
					  (select soum_sale_requirement.*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_sale_requirement,soum_prod_subcat,soum_prod_subsubcat
						where soum_sale_requirement.brand=soum_prod_subcat.prod_subcat_id
						and soum_sale_requirement.model=soum_prod_subsubcat.prod_subsubcat_id
						) temp ".$conds." ORDER BY temp.reqs_id desc LIMIT 20";
	   
	   
	                                   $res=$db->query($sql);
										
										$i=0;
									
										while($row=$res->fetch_assoc())
										{
										 if($on==3){
										  $cs_json[$i]['label'] = $row['saler_mob']; 
			                              $cs_json[$i]['value'] = $row['saler_mob']; 
										 }else{
										  $cs_json[$i]['label'] = $row['saler_name']; 
			                              $cs_json[$i]['value'] = $row['saler_name']; 
										 
										 }
											$i++;
										}
        
	}
	

		echo json_encode($cs_json);
        die;
		?>