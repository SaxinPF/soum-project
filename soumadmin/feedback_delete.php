<?php
include("../config2.php");
$pid=$_REQUEST['feedback_id'];
$type=$_REQUEST['type'];

if($pid !=null){
		 $sql="delete from soum_feedback where feedback_id=$pid";
		  $res=$db->query($sql);?>
		<script>
		alert('Data has been deleted.')
		window.location.href="feedback_list.php?type2=<?php echo $type; ?>";
		</script>
<?php } ?>



