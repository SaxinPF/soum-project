<?php
include('../config2.php');

$act=$_REQUEST['act'];
$req_id=$_REQUEST['req_id'];
$enq_name=$_REQUEST['enq_name'];
$enq_mobile=$_REQUEST['enq_mobile'];
$enq_email=$_REQUEST['enq_email'];
$drpBrand=$_REQUEST['drpBrand'];
$drpModel=$_REQUEST['drpModel'];
$otherbrand=$_REQUEST['otherbrand'];
$othermodel=$_REQUEST['othermodel'];
$min=mysqli_real_escape_string($db,$_REQUEST['price-min']);
$max=mysqli_real_escape_string($db,$_REQUEST['price-max']);
$ptype=$_REQUEST['ptype'];
$desc=mysqli_real_escape_string($db,$_REQUEST['desc']);
$dt=date("Y-m-d H:i:s");
$status=$_REQUEST['status'];
$tomsg=mysqli_real_escape_string($db,$_REQUEST['tomsg']);

$type='Admin';

    if($act=="add")
	{


	            $ptype1='';
				foreach($ptype as $a=>$b)
				{
				  $ptype1=$ptype1.$ptype[$a].',';
				}


	        	  $sql="insert into soum_phone_repairing(rep_ddtm,type,fname,mobile_no,prob_type,brand,modal,other_brand,other_model,description)
					values('$dt','$type','$enq_name','$enq_mobile','$ptype1','$drpBrand','$drpModel','$otherbrand','$othermodel','$desc')";
					//echo $sql;
					$res=$db->query($sql);
					$enq_id=mysqli_insert_id($db);
					$token="RPN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);

					$token1=$db->prepare("update soum_phone_repairing set token_id='$token' where repairing_id=$enq_id");
					$rest=$token1->execute();

		            if($enq_id!='')
		            {
                        if($status==0){
						  $msg="Thanks ".$enq_name.". We have registered your repair request by token ID #".$token.". Please be in touch with our repairing team for further information."; 
						}else{
						  $msg=$tomsg;
						}
		              
	                  $message = urlencode($msg);
	                  $ret =  sms_api($enq_mobile,$message);

		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="repair_requirement.php";
				    </script>
				    <?php

			        }

	    }
		if($act == "edit")
		{

	          $ptype1='';
				foreach($ptype as $a=>$b)
				{
				  $ptype1=$ptype1.$ptype[$a].',';
				}

	          	$sql="update soum_phone_repairing set fname='$enq_name',mobile_no='$enq_mobile',prob_type='$ptype1',brand='$drpBrand',modal='$drpModel',description='$desc',status='$status' where repairing_id=$req_id";
				//echo $sql;
				$res=$db->query($sql);

		            if($res)
		            {
                      $message = urlencode($tomsg);
	                  $ret =  sms_api($enq_mobile,$message);
		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="repair_requirement.php";
				    </script>
				    <?php

			        }


		}

		if($act == "del")
		{
			$sql="delete from soum_phone_repairing where repairing_id=$req_id";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="repair_requirement.php";
				    </script>
				    <?php

			        }

		}




?>
