<?php 
           include('config.php');
		   $cs_json = array();
		   
	if($_GET['table']=='brand'){   
		   $search =  $_GET['term'];
		   $category_type_static =  $_GET['categroy_type'];
		  
		   $sql="SELECT soum_prod_subcat.*
                  FROM soum_prod_subcat
                  INNER JOIN categroy_brands ON soum_prod_subcat.prod_subcat_id=categroy_brands.brand_id
				  where soum_prod_subcat.prod_subcat_desc like '%$search%' AND categroy_brands.categroy_type='".$category_type_static."' limit 1";
		    $res=$db->query($sql);
		    if($res->num_rows>0){	
				while($row=$res->fetch_assoc()){
				   $cs_json[] = array(
					  'label'=>$row['prod_subcat_desc'],
					  'value'=>$row['prod_subcat_desc'],
					);
				}
			}
			$cond2 = "having UPPER(phone1) Like UPPER('%$search%')";
			$new_sql = "SELECT concat(soum_prod_subcat.prod_subcat_desc,' ',A.prod_subcat_desc) phone1
                  FROM soum_prod_subcat
                  LEFT JOIN soum_prod_subsubcat AS A
                  ON soum_prod_subcat.prod_subcat_id = A.prod_subcat_id ".$cond2." limit 5";
                   $res=$db->query($new_sql);
					if($res->num_rows>0){
						while($rowss=$res->fetch_assoc()){
						  $cs_json[] = array(
							  'label'=>$rowss['phone1'],
							  'value'=>$rowss['phone1'],
							);
						
						 
						}	
			        }
	}


     if($_GET['table']=='product'){
       	   $search =  $_GET['term'];
		   $category_type_static =  $_GET['categroy_type'];
		  
		   $sql="SELECT soum_prod_subcat.*
                  FROM soum_prod_subcat
                  INNER JOIN categroy_brands ON soum_prod_subcat.prod_subcat_id=categroy_brands.brand_id
				  where soum_prod_subcat.prod_subcat_desc like '%$search%' AND categroy_brands.categroy_type='".$category_type_static."' limit 1";
		    $res=$db->query($sql);
		   if($res->num_rows>0){	
				while($row=$res->fetch_assoc()){
				   $cs_json[] = array(
					  'label'=>$row['prod_subcat_desc'],
					  'value'=>$row['prod_subcat_desc'],
					);
				}
	       }
	   
			$time = time();
			
			
			$cond2 = "having UPPER(phone1) Like UPPER('%$search%')";
		    $new_sql = "SELECT concat(soum_prod_subcat.prod_subcat_desc,' ',A.modal_name) phone1
                  FROM soum_prod_subcat
                  LEFT JOIN soum_product_master AS A
                  ON soum_prod_subcat.prod_subcat_id = A.brand where A.active=1 and A.category_type = '$category_type_static' and A.trash!='delete' and A.dispatched_date >$time ".$cond2." limit 5";
                   $res=$db->query($new_sql);
					if($res->num_rows>0){
						while($rowss=$res->fetch_assoc()){
						  $cs_json[] = array(
							  'label'=>$rowss['phone1'],
							  'value'=>$rowss['phone1'],
							);
						
						 
						}	
			       }
			
	
	
	} 	
	
	echo json_encode($cs_json);
    die;
		  
 ?>