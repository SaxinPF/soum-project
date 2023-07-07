<?php
include("../config2.php");
include("../_mail_fire.php");
$ordid=$_REQUEST['ordid'];
$status=$_REQUEST['status'];
$msg=$_REQUEST['msg'];
$mob=$_REQUEST['mob'];
$advance=$_REQUEST['advance'];
$ref=$_REQUEST['ref'];
$type=$_REQUEST['type'];
$dt=date('Y-m-d H:s:i');
$token="ORD".str_pad ($ordid,4,'0', STR_PAD_LEFT);

	if($status==3)
	{
	 $deal=1;
	}
	else
	{
	 $deal=0;
	}

  if($status==0 || $status==4 || $status==5 || $status==8)
  {
    $sql="update soum_order_master set status='$status',status_upd_dt='$dt' where order_id=$ordid";

     //***************************************************************************************************
      if($status==0 || $status==4 || $status==8){ // For Non responsive..
	   $message = urlencode($msg);
       $ret = sms_api($mob,$message,'1407167992789780401');
      }
     //******************************************************************************************************

            $sqlupd="select soum_order_details.prod_id from soum_order_master,soum_order_details,soum_product_master
			where soum_order_master.order_id=soum_order_details.order_id
			and soum_order_details.prod_id=soum_product_master.prod_id
			and soum_order_master.order_id=$ordid";
	        $res1=$db->query($sqlupd);
	        while($row1=$res1->fetch_assoc())
	        {
	                $prodid=$row1['prod_id'];
			        $sql2="update soum_product_master set current_stock='1',deal='0' where prod_id=$prodid";
			        $db->query($sql2);

	        }


  }
  else if($status==1)
  {
     $sql="update soum_order_master set status='$status',status_upd_dt='$dt' where order_id=$ordid";

     //***************************************************************************************************
       //$msg=$msg.". Thank you - Team Soum.";
       $message = urlencode($msg);
       $ret = sms_api($mob,$message,'1407167992721617850');
     //******************************************************************************************************
      $sqlupd="select soum_order_details.prod_id from soum_order_master,soum_order_details,soum_product_master
			where soum_order_master.order_id=soum_order_details.order_id
			and soum_order_details.prod_id=soum_product_master.prod_id
			and soum_order_master.order_id=$ordid";
	        $res1=$db->query($sqlupd);
	        while($row1=$res1->fetch_assoc())
	        {
	            $prodid=$row1['prod_id'];
		        $sql2="update soum_product_master set current_stock='1',deal='0' where prod_id=$prodid";
		        $db->query($sql2);


	        }





  }
  else if($status==2)
  {
     $sql="update soum_order_master set status='$status',advance_dtm='$dt',advance_amt='$advance',advance_ref='$ref' where order_id=$ordid";

       //***************************************************************************************************

       $message = urlencode($msg);
       $ret = sms_api($mob,$message,'1407167992744920729');
     //******************************************************************************************************
      $sqlupd="select soum_order_details.prod_id from soum_order_master,soum_order_details,soum_product_master
			where soum_order_master.order_id=soum_order_details.order_id
			and soum_order_details.prod_id=soum_product_master.prod_id
			and soum_order_master.order_id=$ordid";
	        $res1=$db->query($sqlupd);
	        while($row1=$res1->fetch_assoc())
	        {


			        $sql2="update soum_product_master set current_stock='1',deal='0' where prod_id=$prodid";
			        $db->query($sql2);

	        }

  }
  else if($status==3)
  {
     $sql="update soum_order_master set status='$status',status_upd_dt='$dt',deal='$deal' where order_id=$ordid";
       $message = urlencode($msg);
       $ret = sms_api($mob,$message,'1407167992757619668');
      //***************************************************************************************************
       //$message = urlencode($msg);
      // $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mob."&sms=".$message."&senderid=MYSOUM";
      // $ret = file($url);


     //******************************************************************************************************

     if($type==2)
     {
	        $sqlupd="select soum_order_details.prod_id from soum_order_master,soum_order_details,soum_product_master
			where soum_order_master.order_id=soum_order_details.order_id
			and soum_order_details.prod_id=soum_product_master.prod_id
			and soum_order_master.order_id=$ordid";
	        $res1=$db->query($sqlupd);
	        while($row1=$res1->fetch_assoc())
	        {
			 $ddate = strtotime(date("Y-m-d", strtotime("+15 day")));

	            $prodid=$row1['prod_id'];
		        $sql2="update soum_product_master set current_stock='0',deal='1',dispatched_date='$ddate' where prod_id=$prodid";
		        $db->query($sql2);


	        }
     }
  }else if($status==7){
     $sql="update soum_order_master set status='$status',status_upd_dt='$dt' where order_id=$ordid";

     //***************************************************************************************************
       $message = urlencode($msg);
       $ret = sms_api($mob,$message);
	   $msg = 'Phone transfer(Customer Msg): '.$msg;



     //******************************************************************************************************
      $sqlupd="select soum_order_details.prod_id from soum_order_master,soum_order_details,soum_product_master
			where soum_order_master.order_id=soum_order_details.order_id
			and soum_order_details.prod_id=soum_product_master.prod_id
			and soum_order_master.order_id=$ordid";
	        $res1=$db->query($sqlupd);
	        while($row1=$res1->fetch_assoc())
	        {
	            $prodid=$row1['prod_id'];
		        $sql2="update soum_product_master set current_stock='1',deal='0',transfer='1' where prod_id=$prodid";
		        $db->query($sql2);

			   	/* Message to seller of phone customer and dealer both are seller */


				              $pid=$prodid;
						       $qry1="select * from soum_product_master where prod_id=$pid";
								//echo $qry;
								$res1s=$db->query($qry1);
								$row1s=$res1s->fetch_assoc();
								$utype=$row1s['poster_type'];
								$cid=$row1s['poster_id'];
								$cstock=$row1s['current_stock'];

								//echo $utype."/".$cid;

								if($utype=='Customer')
								{
								$qry2="select * from soum_master_customer where cust_id=$cid";
								}
								else if($utype=='Dealer')
								{
								$qry2="select * from soum_master_dealer where cust_id=$cid";
								}
								else if($utype=='Admin')
								{
								$qry2="select * from soum_master_admin where usr_id=$cid";
								}

								$res2=$db->query($qry2);
								$row2=$res2->fetch_assoc();
								$token2=$row2['reg_id'];
								$nameseller = $row2['fname'];
								$mobseller  = $row2['mobile'];


								$buyer_name = $_REQUEST['buyer_name'];
								$bam = $_REQUEST['bam'];


								$mes_seller_msg ='Hi, Mr. '.$nameseller.' we have shared your contact details with Mr '.$buyer_name.' ('.$mob.') who is interested in purchasing '.$bam.' from you. For any further inquiries please contact at 9828075008/9829300040. Thank you - Team SOUM.';
			                    $mes_seller = urlencode($mes_seller_msg);
                                $ret = sms_api($mobseller,$mes_seller);

								$ms = 'Phone transfer (Seller Msg): '.$mes_seller_msg;
								$sqllog="insert into soum_sms_log(smsdt,type,sms_for_id,status,msg)values('$dt','2','$ordid','','$ms')";
	                            $db->query($sqllog);

	        }
  }
  //echo $sql;
   $res=$db->query($sql);
     if($res)
     {
        $sql="insert into soum_sms_log(smsdt,type,sms_for_id,status,msg)values('$dt','2','$ordid','','$msg')";
	    $db->query($sql);

        $mailtype=6;
		$mailsubject="Status Update";

        $sql="select * from soum_order_master where order_id=$ordid";
		$res1=$db->query($sql);
		$row=$res1->fetch_assoc();
		$mailtoken=$row['order_token'];
		$mailto=$row['mail'];

		//mail_reg($mailto,$mailsubject,$mailtype,$mailtoken);



     echo 1;
     }
     else
     {
     echo 0;
     }
?>
