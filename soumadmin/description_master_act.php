<?php
			include('../config.php');
			$prod_id=$_REQUEST['data'];

		if($prod_id =! "")
		{
	
	       $sql="SELECT * FROM soum_product_master where prod_id='".$_REQUEST['data']."'";
		   $res=$db->query($sql);
			while($row=$res->fetch_assoc()) {
				echo $row['description'];
			}

		} 
	
?>