<?php
include("../config2.php");
$pid=$_REQUEST['prod_id'];
$type=$_REQUEST['type'];

if($pid !=null && $type=='Dealer'){
		  $sql="update soum_product_master set trash='delete' where prod_id=$pid";
		  $res=$db->query($sql);?>
		<script>
		alert('Product has been deleted.')
		window.location.href="approv_dis.php";
		</script>
<?php } 

if($pid !=null && $type=='Customer'){
		  $sql="update soum_product_master set trash='delete' where prod_id=$pid";
		  $res=$db->query($sql);?>
		<script>
		alert('Product has been deleted.')
		window.location.href="approv_dis_customer.php";
		</script>
<?php } 

if($pid !=null && $type=='Admin'){
		  $sql="update soum_product_master set trash='delete' where prod_id=$pid";
		  $res=$db->query($sql);
		  
		  
		   $sql="select category_type from soum_product_master where prod_id=$pid";
		   $res=$db->query($sql);
		    while($row=$res->fetch_assoc()) {
			
			  switch ($row['category_type']){
				case "phone":
					$url='admin_adv.php';
					break;
				case "tablet":
					$url='admin_adv_tablet.php';
					break;
				case "cable":
					$url='admin_adv_cable.php';
					break;
				case "earphones":
					$url='admin_adv_earphones.php';
					break;
                case "headphone":
					$url='admin_adv_headphone.php';
					break;
                case "airpod":
					$url='admin_adv_airpod.php';
					break;
                case "watches":
					$url='admin_adv_watches.php';
					break;	
                case "charger":
					$url='admin_adv_charger.php';
					break;
                case "aux":
					$url='admin_adv_aux.php';
					break;
                case "speakers":
					$url='admin_adv_speakers.php';
					break;
                case "power_bank":
					$url='admin_adv_power_bank.php';
					break;						
					
               default:
                   $url='admin_adv.php';
              }
			  
			  
			}
		  ?>
		<script>
		  alert('Product has been deleted.')
		  window.location.href="<?php echo $url; ?>";
		</script>
<?php } ?>


