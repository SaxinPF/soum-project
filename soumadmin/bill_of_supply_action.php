<?php
	include('../config2.php');	
ini_set('display_errors',1);
error_reporting(E_ALL);
	
$act = $_REQUEST['act'];
$req_id = $_REQUEST['reqs_id'];	
$party_gst = $_REQUEST['party_gst'];
$party_address = $_REQUEST['party_address'];
$enq_name = $_REQUEST['name'];
$enq_mobile=$_REQUEST['mobile'];
$date_d =  $_REQUEST['date_d'];
$date_d	=   substr($date_d,6,4)."-".substr($date_d,3,2)."-".substr($date_d,0,2);
$date_d  =   strtotime($date_d);
$cn_number  =   $_REQUEST['cn_number'];
$quantity  =   $_REQUEST['quantity'];
$imi_no   =   $_REQUEST['imi_no'];
  $receipt_date =  $_REQUEST['receipt_date'];
 $receipt_date	=   substr($receipt_date,6,4)."-".substr($receipt_date,3,2)."-".substr($receipt_date,0,2);
$receipt_cn_number  =   $_REQUEST['receipt_cn_number'];
$receipt_date  =   strtotime($receipt_date);


$colour=$_REQUEST['colour'];
$brand=$_REQUEST['drpBrand'];
$model=$_REQUEST['drpModel'];


$net_banking = mysqli_real_escape_string($db,$_REQUEST['net_banking']);
$mobile_wallet = mysqli_real_escape_string($db,$_REQUEST['mobile_wallet']);
$cash = mysqli_real_escape_string($db,$_REQUEST['cash']);
$bank_cards = mysqli_real_escape_string($db,$_REQUEST['bank_cards']);
$other_model =  $_REQUEST['other_model'];
  
	              if($act=="add"){
			     								
			                $sql = "insert into soum_bill_of_supply(name,party_gst,party_address,mobile,date_d,cn_number,quantity,brand,model,colour,receipt_cn_no,receipt_date,imi_no,net_banking,mobile_wallet,cash,bank_cards,other_model)values('$enq_name','$party_gst','$party_address','$enq_mobile','$date_d','$cn_number','$quantity','$brand','$model','$colour','$receipt_cn_number','$receipt_date','$imi_no','$net_banking','$mobile_wallet','$cash','$bank_cards','$other_model')";
	      					$res=$db->query($sql);
							$enq_id=mysqli_insert_id($db);
			
			
	  
								if($enq_id!='')
								{
								?>
								<script>  
								    var enq_id = '<?php echo $enq_id; ?>';
									//alert("Data Save successfully");
									window.location.href="bill_of_supply.php?req_id="+enq_id+"&act=edit&step=2";				    
								</script>
								<?php
							
						         }
			
	               }
				if($act == "edit")
				{
				   
	   
					$sql=$db->prepare("update soum_bill_of_supply set name='$enq_name',party_gst='$party_gst',party_address='$party_address',mobile='$enq_mobile',date_d='$date_d',cn_number='$cn_number',quantity='$quantity',brand='$brand',model='$model',colour='$colour',receipt_cn_no='$receipt_cn_number',receipt_date='$receipt_date',imi_no='$imi_no',net_banking='$net_banking',mobile_wallet='$mobile_wallet',cash='$cash',bank_cards='$bank_cards',other_model='$other_model' where id=$req_id");
						$res=$sql->execute();
						
							if($res)
							{
							
							?>
							<script>
								var enq_id = '<?php echo $req_id; ?>';
								//alert("Data Update successfully");
								window.location.href="bill_of_supply.php?req_id="+enq_id+"&act=edit&step=2";				    
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
