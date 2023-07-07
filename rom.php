<?php
	include('config.php');
	
	$mid=mysqli_real_escape_string($db,$_REQUEST['mid']);
	$mrom=mysqli_real_escape_string($db,$_REQUEST['mrom']);

 
 
$sqli="select * from soum_prod_subsubcat where prod_subsubcat_id=$mid";
$resi=$db->query($sqli);
$rowi=$resi->fetch_assoc();
$prom=$rowi['p_rom'];
$c=substr_count($prom,"/");
$rom=explode("/",$prom);

if($c!='0')
{
	echo "<p>ROM</p>";
	foreach($rom as $a=>$b)
	{
	
	?>
	
	<p class="msg-line" style="width:25%;float:left;">
	<label style="width:auto;float:left">
	<input name="mrom" class="mrom"  id="mrom" value="<?=$rom[$a];?>" <?php if($rom[$a]==$mrom) echo "Checked";?> type="radio" style="color:#e92438;font-size:15px;margin-right:10px;"><?=$rom[$a];?></label></p>
	<?php
	 }
 } 
 else
 {
	 echo "<p style='display:none'>ROM</p>";
	foreach($rom as $a=>$b)
	{
	
	?>
	
	<p class="msg-line" style="width:25%;float:left;display:none;">
	<label style="width:auto;float:left;"><input name="mrom" class="mrom"  id="mrom" value="<?=$rom[$a];?>" Checked="Checked" type="radio" style="color:#e92438;font-size:15px;margin-right:10px;"><?=$rom[$a];?></label></p>
	<?php
	 }
 }
 ?>