<?php
	include('config.php');	
	
$enq_name=$_REQUEST['name'];
$enq_mobile=$_REQUEST['mobile'];
$warr=$_REQUEST['warranty'];
$drpBrand=$_REQUEST['brand'];
$drpModel=$_REQUEST['model'];
$price=mysqli_real_escape_string($db,$_REQUEST['price']);
$dt=date("Y-m-d H:i:s"); 
$status=$_REQUEST['status'];
$desc=$_REQUEST['desc'];
$sid=$_REQUEST['sid'];
  
if($sid=='' || $sid=='undefined')  
{
			                   
			                   $stmt=$db->prepare("select * from soum_master_customer where mobile=?");
								$stmt->bind_param('i', $enq_mobile); 
								$stmt->execute();
								$res1=$stmt->get_result();
								/** EOF Security Patch IS-002*/
								if(mysqli_num_rows($res1)>0)
								{
									
								     
								}
							    else
							    {
							    
							        
							        $a=1;   
									$utype='Customer';									
									$t="CRN";
									$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,mobile,active)values(?,?,?,?,?)");
									$sql->bind_param("sssss",$dt,$utype,$enq_name,$enq_mobile,$a); 									
							    									
										
									$res=$sql->execute();
									$enq_id=mysqli_insert_id($db);
								
									$token=$t."".str_pad ($enq_id,4,'0', STR_PAD_LEFT);						        
									$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");								
									$rest=$token1->execute();
								}	
			

								
								
			$sql="insert into soum_sale_requirement(reqs_dttm,saler_name,saler_mob,warr,price,brand,model,description,status)values('$dt','$enq_name','$enq_mobile','$warr','$price','$drpBrand','$drpModel','$desc','$status')";
	        //echo $sql;
			$res=$db->query($sql);
			$enq_id=mysqli_insert_id($db);
			
				$token="REQS".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
	  
	
				$token1=$db->prepare("update soum_sale_requirement set reqs_token='$token' where reqs_id=$enq_id");
				$rest=$token1->execute();
				
				if($res)
	            {		            
	               $r=1;
		        }
		        else
		        {
		           $r=0;
		        }
			        
}
else
{
           $sql="update soum_sale_requirement set saler_name='$enq_name',saler_mob='$enq_mobile',warr='$warr',price='$price',brand='$drpBrand',model='$drpModel',description='$desc',status='$status' where reqs_id=$sid";
          
	        //echo $sql;
			$res=$db->query($sql);
			if($res)
            {		            
               $r=2;
	        }
	        else
	        {
	           $r=0;
	        }


}				
		            
			
		
	echo $_GET['callback'] . '' .$r. '';
?>
