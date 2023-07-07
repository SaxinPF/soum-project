<?php
	include('../config2.php');


	
 $enq_id=$_REQUEST['enqid'];
 $act=$_REQUEST['act'];
 $token=$_REQUEST['token'];
 $sdt=$_REQUEST['start-date'];
      $sy =substr($sdt,6,4);
	  $sd =substr($sdt,3,2);
	  $sm =substr($sdt,0,2);									  
	  $sdt=$sy."/".$sm."/".$sd;

$end=$_REQUEST['end-date'];
	  $ey =substr($end,6,4);
	  $ed =substr($end,3,2);
	  $em =substr($end,0,2);									 
	  $end=$ey."/".$em."/".$ed;

$name=$_REQUEST['name'];
$mob=$_REQUEST['mob'];
$email=$_REQUEST['email'];
$brand=$_REQUEST['brand'];
$modal=$_REQUEST['modal'];
$desc=$_REQUEST['desc'];

     if($active=='on')
     {
      $priority=1;
     }
     else
     {
     $priority=0;
     }
     
       if($act == "add")
		{
			$sql="insert into soum_enquire(enq_token,enq_name,enq_mob,enq_email,brand,model,enq_desc)
					values('$token','$name','$mob','$email','$brand','$modal','$desc')";
			
			
			$res=$db->query($sql);
			$enq_id=mysqli_insert_id($db);	
			
		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="enquiry_master.php";				    
				    </script>
				    <?php
				
			        }
			
	    }

		if($act == "edit")
		{
	
	          	$sql="update soum_enquire set enq_token='$token',enq_name='$name',enq_mob='$mob',enq_email='$email',brand='$brand',model='$modal',enq_desc='$desc' where enq_id=$enq_id";
				
			$res=$db->query($sql);
			//$enq_id=$enqid;	
			
		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="enquiry_master.php";				    
				    </script>
				    <?php
				
			        }

          
		}
		
		if($act == "del")
		{
			$sql="delete from soum_enquire where enq_id=$enq_id";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="enquiry_master.php";				    
				    </script>
				    <?php
				
			        }

			
		}
		
		
		
	
?>
