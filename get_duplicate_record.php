<?php
include('config.php');





 $sql ="SELECT mobile, COUNT(mobile) FROM soum_master_customer GROUP BY mobile HAVING COUNT(mobile) > 1;";


	

		$result=$db->query($sql);
	  echo $count = mysqli_num_rows($result);
	  echo '<br/>';
		while ($row=$result->fetch_assoc()){
		    echo '<pre>';
		    print_r($row);
			 $mobile =  $row['mobile'];
			$sql= "SELECT * FROM soum_master_customer WHERE mobile='$mobile' order by cust_id asc limit 2";
		    $result2=$db->query($sql);
				while ($row2=$result2->fetch_assoc()){
				   echo '<pre>';
		           print_r($row2);
				
				}
		}

die;
	
?>

