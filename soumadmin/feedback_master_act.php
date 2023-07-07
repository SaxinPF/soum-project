<?php
	include('../config2.php');

	
	$feedback=$_REQUEST['feedback'];
	$act=$_REQUEST['act'];
	$enq=$_REQUEST['enq_typ'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$sub=$_REQUEST['sub'];
	$msg=$_REQUEST['msg'];
	
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

       if($act == "add")
		{
			$sql="insert into soum_feedback(dttm,enquiry_type,fname,email,subject,msg)
					values('$sdt','$enq','$name','$email','$sub','$msg')";
					
			
					
			$res=$db->query($sql);
			$enq_id=mysqli_insert_id($db);	
			

		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="feedback_master.php";				    
				    </script>
				    <?php
				
			        }
			
	    }

		if($act == "edit")
		{
	
	          	$sql="update soum_feedback set enquiry_type='$enq',fname='$name',email='$email',subject='$sub',msg='$msg' where feedback_id=$feedback";
				
			$res=$db->query($sql);
			$enq_id=$offerid;	
			
					

		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="feedback_master.php";				    
				    </script>
				    <?php
				
			        }

            

           
		}
		
		if($act == "del")
		{
			$sql="delete from soum_feedback where feedback_id=$feedback";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="feedback_master.php";				    
				    </script>
				    <?php
				
			        }

			
		}
		
		
		
	
?>
