<?php
	include('../config2.php');	

	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	
$act 	= $_REQUEST['act'];
$req_id = $_REQUEST['reqs_id'];	
$enq_name = $_REQUEST['name'];
$enq_mobile=$_REQUEST['mobile'];
$date_d =  $_REQUEST['date_d'];
$date_d	=   substr($date_d,6,4)."-".substr($date_d,3,2)."-".substr($date_d,0,2);
$date_d  =   strtotime($date_d);
$cn_number  =   $_REQUEST['cn_number'];
$entry_number  =   $_REQUEST['entry_number'];
$quantity  =   $_REQUEST['quantity'];
$quantity_number = $_REQUEST['quantity_number'];

$brand 			 =	$_REQUEST['drpBrand'];
	$model  		 =	$_REQUEST['drpModel'];
	$other_model 	 =  $_REQUEST['other_model'];
	$colour 		 =	$_REQUEST['colour'];
	$imi_no  		 =  $_REQUEST['imi_no'];
	$rom 			 =  $_REQUEST['rom'];

$price=mysqli_real_escape_string($db,$_REQUEST['price']);
	
	
			 
	              if($act=="add"){

	              	for ($i=1; $i <= $quantity_number ; $i++) { 

						if($i == 1){

							$brand 			 =	$_REQUEST['drpBrand'];
							$model  		 =	$_REQUEST['drpModel'];
							$other_model 	 =  $_REQUEST['other_model'];
							$colour 		 =	$_REQUEST['colour'];
							$imi_no  		 =  $_REQUEST['imi_no'];
							$rom 			 =  $_REQUEST['rom'];

						}else{

							
							$brand 			 =	$_REQUEST['drpBrand'.$i];
							$model  		 =	$_REQUEST['drpModel'.$i];
							$other_model 	 =  $_REQUEST['other_model'.$i];
							$colour 		 =	$_REQUEST['colour'.$i];
							$imi_no  		 =  $_REQUEST['imi_no'.$i];
							$rom 			 =  $_REQUEST['rom'.$i];

						}
						  $sql = "insert into soum_receipt_note(name,mobile,date_d,cn_number,entry_number,quantity,price,brand,model,colour,imi_no,other_model,rom)values('$enq_name','$enq_mobile','$date_d','$cn_number','$entry_number','1','$price','$brand','$model','$colour','$imi_no','$other_model','$rom')";
							  $res=$db->query($sql);
								$enq_id=mysqli_insert_id($db);						
						
					}	
					if($enq_id!='')
								{
								?>
								<script>
									 var enq_id = '<?php echo $enq_id; ?>';
									//alert("Data Save successfully");
									window.location.href="receipt_note.php?req_id="+enq_id+"&act=edit&step=2";				    
								</script>
								<?php
							
						         }
								
	               }
				if($act == "edit")
				{
					//echo $req_id;exit;
				           

						 $sql = "update soum_receipt_note set name='$enq_name',mobile='$enq_mobile',date_d='$date_d',cn_number='$cn_number',entry_number='$entry_number',quantity='$quantity',price='$price',brand='$brand',model='$model',colour='$colour',imi_no='$imi_no',rom='$rom',other_model='$other_model' where id=$req_id";

						/*$sql=$db->prepare("update soum_receipt_note set name='$enq_name',mobile='$enq_mobile',date_d='$date_d',cn_number='$cn_number',entry_number='$entry_number',quantity='$quantity',price='$price',brand='$brand',model='$model',colour='$colour',imi_no='$imi_no',other_model='$other_model' where id=?");*/
						
						 $res=$db->query($sql);
						//$res=$sql->execute($req_id);
						
							if($res)
							{
															
							?>
							<script>
								var enq_id = '<?php echo $req_id; ?>';
								//alert("Data Update successfully");
								window.location.href="receipt_note.php?req_id="+enq_id+"&act=edit&step=2";				    
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
