<?php
	include('config.php');
	$param=$_REQUEST['param'];
	
  if($param!='feed')
  {	
	
			   if($param=='adpost')
			   {	 
				 $sql="select if (count(1) =0,0,sum(if (active,0,1))) val from soum_product_master";	
			   }
			   else if($param=='sale')
			   {	 
				 $sql="select if (count(1) =0,0,sum(if(status=0,1,0))) val  from 
														soum_order_master, soum_order_details, 
														soum_product_master, soum_prod_subsubcat
													where soum_order_master.order_id= soum_order_details.order_id 
													and soum_order_details.prod_id=soum_product_master.prod_id
													and soum_product_master.modal=soum_prod_subsubcat.prod_subsubcat_id";	
			   }
			   else if($param=='enq')
			   {	 
				 $sql="select if (count(1) =0,0,sum(if(!status,1,0))) val from soum_enquire where status!=2";	
			   }
			   else if($param=='repair')
			   {	 
				 $sql="select if (count(1) =0,0, sum(if(status=0,1,0))) val from soum_phone_repairing where status!=2";	
			   }
			   
			    $result=$db->query($sql);
			    $r='';
				while($row=$result->fetch_assoc())
				{
	    	$r=$row['val'];;

 	}
 	
    echo $_GET['callback'] . '(' .$r. ')';
   }
   else
   {	 
	 $sql="SELECT if (count(1) =0,0,sum(if (enquiry_type='Feedback' && status!=2,1,0))) feedback,
								if (count(1) =0,0,sum(if (enquiry_type='Enquiry' && status!=2,1,0))) enquiry,
								if (count(1) =0,0,sum(if (enquiry_type='Complaint' && status!=2,1,0))) complaint,
								if (count(1) =0,0,sum(if (enquiry_type='PreLaunch' && status!=2,1,0))) PreLaunch

								FROM soum_feedback";
								
		 $result=$db->query($sql);
		    $r=array();
			while($row=$result->fetch_assoc())
			{
			    	$r[]=$row;
		
		 	}
		 	
		 echo $_GET['callback'] . '' . json_encode($r). '';
	
   }		
   
   

?>
