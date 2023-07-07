<?php
			include('../config.php');
			$prod_id=$_REQUEST['prod_id'];
			$act=$_REQUEST['act'];
			$model=$_REQUEST['model'];
			$namedesc=$_REQUEST['namedesc'];
			$code=$_REQUEST['code'];
			$filterstatus=$_REQUEST['filterstatus'];
     
		if($act == "Edit")
		{
	
	       $sql=$db->prepare("update soum_product_master set description='$namedesc', modal_name='$model', code='$code', prod_cat_id='$filterstatus' where prod_id=$prod_id");
			$res=$sql->execute();
			
			echo 2;
		}
		
		if($act=="Delete")
		{
			$sql="delete from soum_prod_subsubcat where prod_subsubcat_id=$catid";
			$res=$db->query($sql);
			echo 3;
			
		}
	
?>