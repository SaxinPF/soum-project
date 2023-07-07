<?php
	include('config.php');	
	

	
$enq_name=$_REQUEST['name'];
$enq_mobile=$_REQUEST['mobile'];
$enq_email=$_REQUEST['email'];
$drpBrand=$_REQUEST['brand'];
$drpModel=$_REQUEST['model'];
$min=mysqli_real_escape_string($db,$_REQUEST['price_min']);
$max=mysqli_real_escape_string($db,$_REQUEST['price_max']);
$desc=mysqli_real_escape_string($db,$_REQUEST['desc']);
$dt=date("Y-m-d H:i:s"); 
$status=$_REQUEST['status'];
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
									$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,email,mobile,active)values(?,?,?,?,?,?)");
									$sql->bind_param("ssssss",$dt,$utype,$enq_name,$enq_email,$enq_mobile,$a); 									
							    									
										
									$res=$sql->execute();
									$enq_id=mysqli_insert_id($db);
								
									$token=$t."".str_pad ($enq_id,4,'0', STR_PAD_LEFT);						        
									$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");								
									$rest=$token1->execute();
								}	
	
	
	
	
											
			

								
								
			$sql=$db->prepare("insert into soum_buyer_requirement(req_dttm,req_name,req_mob,min_price,max_price,brand,model,enq_desc,status) 
			values(?,?,?,?,?,?,?,?,?)"); 
			$sql->bind_param('sssssssss',$dt,$enq_name,$enq_mobile,$min,$max,$drpBrand,$drpModel,$desc,$status);
	
			$res=$sql->execute();
			$enq_id=mysqli_insert_id($db);
			
				$token="REQB".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
	  
	
				$token1=$db->prepare("update soum_buyer_requirement set req_token='$token' where req_id=$enq_id");
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
         $sql="update soum_buyer_requirement set req_name='$enq_name',req_mob='$enq_mobile',min_price='$min',max_price='$max',brand='$drpBrand',model='$drpModel',enq_desc='$desc',status='$status' where req_id=$sid";
          
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
