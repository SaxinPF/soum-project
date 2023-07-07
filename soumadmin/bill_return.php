<?php include('../config2.php');
ini_set('max_file_uploads', 12);
ini_set('display_errors',1);
error_reporting(E_ALL);
?>

<?php

$enq_id = $_GET['id'];
$type = $_GET['type'];
		       
$update_img1 = $db->prepare("update soum_bill_of_supply set r_status='$type' where id=$enq_id");
$res1=$update_img1->execute();
if($res1){ ?>
<script>  
alert("Return status saved.");
  window.location.href="bill_of_supply.php";				    
</script>


 <?php } ?>
