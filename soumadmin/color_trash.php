<?php
include("../config2.php");
$pid=$_REQUEST['prod_id'];
$model_id=$_REQUEST['model_id'];

if($pid !=null && $model_id!=null){
		  $sql="DELETE FROM soum_colors where id=$pid";
		  $res=$db->query($sql);?>
		<script>
		alert('Color has been deleted.');
		window.location.href="colour_options.php?model_id=<?php echo $model_id; ?>";
		</script>
<?php } ?>




