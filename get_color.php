<option value='' >Select</option>
<?php
	include('config.php');	
	$modal=$_REQUEST['param'];
	$color_id=$_REQUEST['mid'];

	$sql = "select * from soum_colors where soum_colors.model_id=".$modal;

	  $ress=$db->query($sql);
	   while($row=$ress->fetch_assoc()){

			$selected_c = '';
		 if(isset($row['id']) && $row['id']==$color_id){
			 $selected_c =  'selected="selected"';
		 } ?>
	  <option value='<?php echo $row['id'] ?>' <?php echo $selected_c; ?> ><?php echo $row['title']; ?></option>

<?php  }  ?>