<?php
	include('config.php');
	$fname=mysqli_real_escape_string($db,$_REQUEST['fname']);
	$param=mysqli_real_escape_string($db,$_REQUEST['param']);
	$id=$_REQUEST['id'];	
	$sql=$db->prepare("select * from $fname ".$param);
	$sql->execute();
	$tbl=$sql->get_result();
	$j=1;
	
?>
  <?php if($fname=='soum_prod_subcat') { ?>
	<option value="">Brand Name*</option>
	<?php } else { ?>
	<option value="">Model Name*</option>
	<?php } ?>
<?php	
while($row=mysqli_fetch_array($tbl))
{
?>		
	<option value="<?=$row[0];?>" <?php if($row[0]==$id) echo 'Selected';?>><?=$row[1];?></option>
<?php 
}
?>
