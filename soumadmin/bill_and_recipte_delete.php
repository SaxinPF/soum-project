<?php
include("../config2.php");
$pid=$_REQUEST['id'];
$type=$_REQUEST['type'];

if($pid !=null){

  if($type=='bill'){
          $sql="delete from soum_bill_of_supply where id=$pid";
		  $res=$db->query($sql);
		  $url = 'bill_of_supply.php';
  }elseif($type=='repair_receipt'){
          $sql="delete from soum_repair_receipt_note where id=$pid";
		  $res=$db->query($sql);
          $url = 'repair_receipt_note.php';
  }else{
          $sql="delete from soum_receipt_note where id=$pid";
		  $res=$db->query($sql);
          $url = 'receipt_note.php';
  }
		?>
		<script>
		 alert('Data has been deleted.')
		 window.location.href="<?php  echo $url; ?>";
		</script>
<?php } ?>



