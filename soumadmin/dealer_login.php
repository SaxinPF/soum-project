<?php
include("../config2.php");

$dealer = base64_decode($_REQUEST['dealer']);


		$poster_id=mysqli_real_escape_string($db,$dealer);
		$dealerM=$db->prepare('select * from soum_master_dealer where cust_id=?');
		$dealerM->bind_param('i', $poster_id);
		$dealerM->execute();
		$res=$dealerM->get_result();
		
		$poster_type="Dealer";

	               while($row=$res->fetch_assoc())
					 {
							$_SESSION['poster_type']=$poster_type;
							$_SESSION['user_type']=$poster_type;
							$_SESSION['user_name']=$row['fname'];
							$_SESSION['poster_id']= $row['cust_id'];
                            echo "<script>window.location.href='https://www.soum.in'</script>";
                     }