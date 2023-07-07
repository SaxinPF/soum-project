<?php
	include('config.php');
	$param=$_REQUEST['param'];
	$cid=$_REQUEST['cid'];
	$pid=$_REQUEST['prodid'];
	$brand=$_REQUEST['brand'];
	$model=$_REQUEST['model'];
	$minp=$_REQUEST['minp'];
    $maxp=$_REQUEST['maxp'];
    $mob=$_REQUEST['mob'];
    $page=$_REQUEST['limit'];
    $deal=$_REQUEST['deal'];
    $ctype=$_REQUEST['ctype'];
     $type=$_REQUEST['type'];
     $search=$_REQUEST['search'];
     $dt=date("Y/m/d");
     
    if($deal=='false' || $deal=='' || $deal=='undefined'){ $deal1=0;}else{ $deal1=1;}
     
	
   if($param=='brand')
   {	 
	 $sql="select * from soum_prod_subcat where prod_subcat_id!=0 order by prod_subcat_desc";	
   }
   else if($param=='model')
   {	 
	 $sql="select * from soum_prod_subsubcat where prod_subcat_id='$brand' order by prod_subcat_desc";	
   }	
   else if($param=='phone')
   {
     $cond='';
     if($brand!='' && $brand!='undefined')
     {
      $cond.=" and soum_product_master.brand='$brand'";
     }
     
     if($model!='' && $model!='undefined')
     {
      $cond.=" and soum_product_master.modal='$model'";
     }   
     
     if($minp!='' && $minp!='undefined')
     {
      $cond.=" and soum_product_master.offer_price>='$minp'";
     } 
     
     if($maxp!='' && $maxp!='undefined')
     {
      $cond.=" and soum_product_master.offer_price<='$maxp'";
     }
     
     if($deal1==1)
     {
      $cond.=" and soum_product_master.hot_deal='$deal1'";
     }

     

     $perPage = 18;
     $start = ($page-1)*$perPage;
     if($start <=0) $start = 0;  
	 
	$sql="select soum_product_master.*,soum_prod_subcat.prod_subcat_desc brand1,soum_prod_subsubcat.prod_subcat_desc model1
    from soum_product_master,soum_prod_subcat,soum_prod_subsubcat 
	where soum_product_master.brand=soum_prod_subcat.prod_subcat_id
	and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id  and soum_product_master.active=1 ".$cond." order by prod_id desc limit $start ,$perPage";	
	//echo $sql;
   }
   else if($param=='phone_with_filter')
   {
     $cond='';
     if($brand!='' && $brand!='undefined')
     {
      $cond.=" and soum_product_master.brand='$brand'";
     }
     
     if($model!='' && $model!='undefined')
     {
      $cond.=" and soum_product_master.modal='$model'";
     }   
     
     if($minp!='' && $minp!='undefined')
     {
      $cond.=" and soum_product_master.offer_price>='$minp'";
     } 
     
     if($maxp!='' && $maxp!='undefined')
     {
      $cond.=" and soum_product_master.offer_price<='$maxp'";
     } 
     
     if($deal1==1)
     {
      $cond.=" and soum_product_master.hot_deal='$deal1'";
     }
     
     if($search!='')
	 {
		 $cond=" having UPPER(phone1) like upper('%$search%')";
	 }

      
	 
	$sql="select soum_product_master.*,soum_prod_subcat.prod_subcat_desc brand1,soum_prod_subsubcat.prod_subcat_desc model1,
	concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1
    from soum_product_master,soum_prod_subcat,soum_prod_subsubcat 
	where soum_product_master.brand=soum_prod_subcat.prod_subcat_id
	and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id  and soum_product_master.active=1 ".$cond." order by prod_id desc";	
	//echo $sql;
   }
   else if($param=='client_phone')
   {
     
     
     if($cid!='' && $cid!='undefined')
     {
      $cond.=" and soum_product_master.poster_id='$cid' and soum_product_master.poster_type='Customer'";
     }


	 
	$sql="select soum_product_master.*,soum_prod_subcat.prod_subcat_desc brand1,soum_prod_subsubcat.prod_subcat_desc model1
    from soum_product_master,soum_prod_subcat,soum_prod_subsubcat 
	where soum_product_master.brand=soum_prod_subcat.prod_subcat_id
	and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id ".$cond ." order by prod_id desc";	
   }
   else if($param=='phone_detail')
   {
     
     
     if($pid!='' && $pid!='undefined')
     {
      $cond.=" and soum_product_master.prod_id='$pid'";
     }


	 
	$sql="select soum_product_master.*,soum_prod_subcat.prod_subcat_desc brand1,soum_prod_subsubcat.*,soum_product_master.warranty warr
     ,(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating
    from soum_product_master,soum_prod_subcat,soum_prod_subsubcat 
	where soum_product_master.brand=soum_prod_subcat.prod_subcat_id
	and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id ".$cond ;	
   }
   else if($param=='repair_dtl')
   {
      $sql="SELECT soum_phone_repairing.*, 
			if(soum_phone_repairing.brand='',soum_phone_repairing.other_brand,soum_prod_subcat.prod_subcat_desc) brand1,
			if(soum_phone_repairing.modal='',soum_phone_repairing.other_model,soum_prod_subsubcat.prod_subcat_desc) model
			FROM soum_phone_repairing,soum_prod_subcat,soum_prod_subsubcat 
			WHERE soum_phone_repairing.brand=soum_prod_subcat.prod_subcat_id
			and soum_phone_repairing.modal=soum_prod_subsubcat.prod_subsubcat_id
			and soum_phone_repairing.mobile_no='$mob'";
   
   }
   else if($param=='chatlist')
   {
     $cond="";
     if($ctype=='buy')
     {
       $cond="where temp2.invite_by=$cid and temp2.invite_by_type='$type'";
     }
     else
     {
        $cond="where temp2.not_to=$cid and temp2.not_to_type='$type'";
     }
   
   
   
   
      $sql="select temp2.*,soum_prod_subsubcat.prod_subcat_desc model,
        (select count(1) from emp_chat where active=0 and prod_id=temp2.prod_id and not_to=$cid)msg
       from (
		select temp1.*,soum_prod_subcat.prod_subcat_desc brand1 from (
		select emp_chat.*,soum_product_master.brand,soum_product_master.modal,soum_product_master.poster_type,soum_product_master.poster_id,soum_product_master.images,soum_product_master.update1
		from emp_chat,soum_product_master
		where emp_chat.prod_id=soum_product_master.prod_id
		group by emp_chat.prod_id) temp1
		left outer join soum_prod_subcat
		on temp1.brand=soum_prod_subcat.prod_subcat_id) temp2
		left outer join soum_prod_subsubcat
		on temp2.modal=soum_prod_subsubcat.prod_subsubcat_id ".$cond;
      
   }
   else if($param=='profile')
   {
      if($type=='Customer')
      {
      $sql="select * from soum_master_customer where cust_id='$cid'";
      }
      else if($type=='Dealer')
      {
      $sql="select * from soum_master_dealer where cust_id='$cid'";
      }
      else if($type=='Admin')
      {
      $sql="select * from soum_master_admin where usr_id='$cid'";
      }   
   }
   else if($param=='today_deal')
   {
      $sql="select *,soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
		if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
		if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
		if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,soum_product_master.hot_deal_date,
		(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
		from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
		where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
		and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
    	and soum_product_master.active=1 and soum_product_master.hot_deal=1
		ORDER BY hot_deal_date desc LIMIT 1";   
   }
   else if($param=='pre_launch')
   {
     $sql="SELECT * FROM soum_pre_launch WHERE date(from_dt)<='$dt' and date(to_dt)>='$dt'";
      
   }

   else if($param=='saller_dtl')
   { 
     $cond="";
     $sid=$_REQUEST['sid'];
     if($sid!='')
     {
      $cond=" and soum_sale_requirement.reqs_id=$sid";
     }
   
     $sql="select soum_sale_requirement.*,soum_prod_subcat.prod_subcat_desc brand1,soum_prod_subsubcat.prod_subcat_desc model1
		from soum_sale_requirement,soum_prod_subcat,soum_prod_subsubcat
		where soum_sale_requirement.brand=soum_prod_subcat.prod_subcat_id
		and soum_sale_requirement.model=soum_prod_subsubcat.prod_subsubcat_id ".$cond;
      
   }
   else if($param=='buyer_dtl')
   {
     $cond="";
     $bid=$_REQUEST['bid'];
     if($bid!='')
     {
       $cond=" and soum_buyer_requirement.req_id=$bid";
     }

     $sql="select soum_buyer_requirement.*,soum_prod_subcat.prod_subcat_desc brand1,soum_prod_subsubcat.prod_subcat_desc model1
	 from soum_buyer_requirement,soum_prod_subcat,soum_prod_subsubcat
	 where soum_buyer_requirement.brand=soum_prod_subcat.prod_subcat_id
	 and soum_buyer_requirement.model=soum_prod_subsubcat.prod_subsubcat_id ".$cond;
      
   }

   else
   {
     $sql="select * from soum_product_master where poster_id=$cid";
   }
    $result=$db->query($sql);
    $r=array();
	while($row=$result->fetch_assoc())
	{
	    	$r[]=$row;

 	}
 	
 echo $_GET['callback'] . '' . json_encode($r). '';

?>
