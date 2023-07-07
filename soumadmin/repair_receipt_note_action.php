<?php
	include('../config2.php');	
	//ini_set('display_errors',1);
//error_reporting(E_ALL);
	
$act = $_REQUEST['act'];
$req_id = $_REQUEST['reqs_id'];	
$enq_name = $_REQUEST['name'];
$enq_mobile=$_REQUEST['mobile'];
$date_d =  $_REQUEST['date_d'];
$date_d	=   substr($date_d,6,4)."-".substr($date_d,3,2)."-".substr($date_d,0,2);
$date_d  =   strtotime($date_d);
$t_number  =   $_REQUEST['t_number'];
$entry_number  =   'none';//$_REQUEST['entry_number'];
$quantity  =   $_REQUEST['quantity'];
$imi_no   =   $_REQUEST['imi_no'];

$colour=$_REQUEST['colour'];
if(empty($colour)){
$colour=0;
}
$brand=$_REQUEST['drpBrand'];
$model=$_REQUEST['drpModel'];
$other_model =  $_REQUEST['other_model'];

$price=mysqli_real_escape_string($db,$_REQUEST['price']);
  
	              if($act=="add"){
			     								
			                $sql = "insert into soum_repair_receipt_note(name,mobile,date_d,t_number,entry_number,quantity,price,brand,model,colour,imi_no,other_model)values('$enq_name','$enq_mobile','$date_d','$t_number','$entry_number','$quantity','$price','$brand','$model','$colour','$imi_no','$other_model')";
	      					$res=$db->query($sql);
							$enq_id=mysqli_insert_id($db);
			
			
	  
								if($enq_id!='')
								{
								?>
								<script>
									alert("Data Save successfully");
									window.location.href="repair_receipt_note.php";				    
								</script>
								<?php
							
						         }
			
	               }
				if($act == "edit")
				{
				           
						$sql=$db->prepare("update soum_repair_receipt_note set name='$enq_name',mobile='$enq_mobile',date_d='$date_d',t_number='$t_number',entry_number='$entry_number',quantity='$quantity',price='$price',brand='$brand',model='$model',colour='$colour',imi_no='$imi_no',other_model='$other_model' where id=$req_id");
						$res=$sql->execute();
						
							if($res)
							{
							
							?>
							<script>
								alert("Data Update successfully");
								window.location.href="repair_receipt_note.php";				    
							</script>
							<?php
						
							}
					
				   
				}
		
		/*if($act == "del")
		{
			$sql="delete from soum_sale_requirement where reqs_id=$req_id";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="saler_requirement.php";				    
				    </script>
				    <?php
				
			        }
			
		}*/
		
		
		
	
?>
