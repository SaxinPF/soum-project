<?php
		include('config.php');
	    $headers  = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
     	$headers .= 'From: Soum.in <info@soum.in>' . "\r\n";
       // mail('cj400.01@gmail.com','Cron Soum','hi',$headers);


		$qry_order = "SELECT * from	soum_order_master, soum_order_details,
			   soum_product_master,soum_prod_subcat,soum_prod_subsubcat
			   where soum_order_master.order_id= soum_order_details.order_id
				and soum_order_details.prod_id=soum_product_master.prod_id
				 and soum_product_master.brand=soum_prod_subcat.prod_subcat_id
				 and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id
				 and soum_order_master.archive=0
				 and soum_order_master.status=3";
		$res_order = $db->query($qry_order);
		$customer_list	 = array();
		while($row_order=$res_order->fetch_assoc()){
			$customer_list[] =  $row_order['cust_id'];
		}
		$customer_list = implode(',',$customer_list);

		$todaysmonth = date("m",time());
		$todaysday   = date("d",time());
			//DOB
		$sql1="select *,(SELECT count(1) FROM soum_login_log where login_type='Customer' and login_by=soum_master_customer.cust_id  group by login_by)count1
			   from soum_master_customer where 1=1 and dob LIKE '%-$todaysmonth-$todaysday' and cust_id IN (".$customer_list.")";
		$res=$db->query($sql1);


	    $reg_dt=date('Y-m-d H:i:s');
	    $msg ='';
				while($row1=$res->fetch_assoc()){
					 $mobile = $row1['mobile'];
					 $cust_id = $row1['cust_id'];
					 $msg="Wishing You A Very Happy Birthday! - Team SOUM";
					 $message = urlencode($msg);
					 sms_api($mobile,$message);

					$sql=$db->prepare("insert into customer_msg(cust_id,date,msg)values(?,?,?)");
					$sql->bind_param("sss",$cust_id,$reg_dt,$msg);
					$sql->execute();
				}


			//DOA
			$sql12 = "select *,(SELECT count(1) FROM soum_login_log where login_type='Customer' and login_by=soum_master_customer.cust_id  group by login_by)count1
					   from soum_master_customer where 1=1 and doa LIKE '%-$todaysmonth-$todaysday' and cust_id IN (".$customer_list.")";

			$res12 = $db->query($sql12);
			while($row12=$res12->fetch_assoc()){
				  $mobile = $row12['mobile'];
				  $cust_id = $row12['cust_id'];

					 $msg="Wishing you both a very happy anniversary! - Team SOUM ";
					 $message = urlencode($msg);
					 sms_api($mobile,$message);

					$sql=$db->prepare("insert into customer_msg(cust_id,date,msg)values(?,?,?)");
					$sql->bind_param("sss",$cust_id,$reg_dt,$msg);
					$sql->execute();
			}

?>

