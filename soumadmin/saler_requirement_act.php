<?php
    include('../config2.php');

$act=$_REQUEST['act'];
$req_id=$_REQUEST['reqs_id'];
$enq_name=$_REQUEST['enq_name'];
$enq_mobile=$_REQUEST['enq_mobile'];
$warr=$_REQUEST['warranty'];
$rom=$_REQUEST['rom'];
$email=$_REQUEST['email'];
$color=$_REQUEST['color'];
$drpBrand=$_REQUEST['drpBrand'];
$drpModel=$_REQUEST['drpModel'];
$otherbrand=$_REQUEST['otherbrand'];
$othermodel=$_REQUEST['othermodel'];
$price=mysqli_real_escape_string($db,$_REQUEST['price']);
$dt=date("Y-m-d H:i:s");
$status=$_REQUEST['status'];
$desc=$_REQUEST['desc'];
$msg=$_REQUEST['sms2'];

	if($act=="add")
	{
			                   $stmt=$db->prepare("select * from soum_master_customer where mobile=?");
								$stmt->bind_param('i', $enq_mobile);
								$stmt->execute();
								$res1=$stmt->get_result();
								/** EOF Security Patch IS-002*/
								if(mysqli_num_rows($res1)>0)
								{


								}
							    else
							    {


							        $a=1;
									$utype='Customer';
									$t="CRN";
									$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,mobile,active)values(?,?,?,?,?)");
									$sql->bind_param("sssss",$dt,$utype,$enq_name,$enq_mobile,$a);


									$res=$sql->execute();
									$enq_id=mysqli_insert_id($db);

									$token=$t."".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
									$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");
									$rest=$token1->execute();
								}

			if($otherbrand!='')
			   $drpBrand=0;

			if($othermodel!='')
			 $drpModel=0;



			$sql="insert into soum_sale_requirement(reqs_dttm,saler_name,saler_mob,warr,price,brand,model,other_brand,other_model,description,status,rom,email,color)values('$dt','$enq_name','$enq_mobile','$warr','$price','$drpBrand','$drpModel','$otherbrand','$othermodel','$desc','$status','$rom','$email','$color')";
	        //echo $sql;
			$res=$db->query($sql);
			$enq_id=mysqli_insert_id($db);

				$token="ENQ".str_pad ($enq_id,4,'0', STR_PAD_LEFT);


				$token1=$db->prepare("update soum_sale_requirement set reqs_token='$token' where reqs_id=$enq_id");
				$rest=$token1->execute();
		            if($enq_id!='')
		            {

		               $sqlb="select * from soum_prod_subcat where prod_subcat_id=$drpBrand";
							  $resb=$db->query($sqlb);
							  $rowb=$resb->fetch_assoc();
							  $brand=$rowb['prod_subcat_desc'];


							  $sqlm="select * from soum_prod_subsubcat where prod_subsubcat_id=$drpModel";
							  $resm=$db->query($sqlm);
							  $rowm=$resm->fetch_assoc();
							  $model=$rowm['prod_subcat_desc'];


							  if($otherbrand!='') $brand=$otherbrand;
							  if($othermodel!='') $model=$othermodel;



		              $msg= str_replace('~n~',$enq_name,$msg);
		              $msg= str_replace('~b~',$brand,$msg);
		              $msg= str_replace('~m~',$model,$msg);

		              //$msg="Thanks ".$enq_name." for choosing Soum for all kind of your Mobile services.";
	                  $message = urlencode($msg);
	                     $ret =  sms_api($enq_mobile,$message);

		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="saler_requirement.php";
				    </script>
				    <?php

			        }

	    }
		if($act == "edit")
		{

	            $stmt=$db->prepare("select * from soum_master_customer where mobile=?");
								$stmt->bind_param('i', $enq_mobile);
								$stmt->execute();
								$res1=$stmt->get_result();
								/** EOF Security Patch IS-002*/
								if(mysqli_num_rows($res1)>0)
								{


								}
							    else
							    {


							        $a=1;
									$utype='Customer';
									$t="CRN";
									$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,mobile,active)values(?,?,?,?,?)");
									$sql->bind_param("sssss",$dt,$utype,$enq_name,$enq_mobile,$a);


									$res=$sql->execute();
									$enq_id=mysqli_insert_id($db);

									$token=$t."".str_pad ($enq_id,4,'0', STR_PAD_LEFT);
									$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");
									$rest=$token1->execute();
								}

	          	$sql=$db->prepare("update soum_sale_requirement set saler_name='$enq_name',saler_mob='$enq_mobile',warr='$warr',price='$price',brand='$drpBrand',model='$drpModel',description='$desc',rom='$rom',email='$email',color='$color',status='$status' where reqs_id=$req_id");
				$res=$sql->execute();

		            if($res)
		            {

		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="saler_requirement.php";
				    </script>
				    <?php

			        }


		}

		if($act == "del")
		{
			$sql="delete from soum_sale_requirement where reqs_id=$req_id";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="saler_requirement.php";
				    </script>
				    <?php

			        }

		}




?>
