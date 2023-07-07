<?php
	include('../config2.php');
	function resizeImage($filename,$max_width,$newfilename="",$max_height='',$withSampling=true)
{
    if($newfilename=="")
        $newfilename=$filename;
    // Get new sizes
    list($width, $height) = getimagesize($filename);
    //-- dont resize if the width of the image is smaller or equal than the new size.
   if($width==$max_width)
        $max_width=$width;
    $percent = $max_width/$width;
    $newwidth = $width * $percent;
    if($max_height=='') 
    {
        $newheight = $height * $percent;
    } 
    else
        $newheight = $max_height;
    // Load
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $po=strpos($filename,".")+1;
    $ln=strlen($filename)-$po;
    $ext = strtolower(substr($filename,$po,$ln));
    //$ext = strtolower(substr($filename,-3));
	//$ext = strtolower(getExtension($filename));
    if($ext=='gif') 
        $source = imagecreatefromgif($filename);
        if(($ext=='jpg') or ($ext=='jpeg')) 
        $source = imagecreatefromjpeg($filename);
        if($ext=='png') 
        $source = imagecreatefrompng($filename);
    // Resize
    if($withSampling)
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    else   
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    // Output
    if($ext=='gif')
        return imagegif($thumb,$newfilename);
    if(($ext=='jpg') or ($ext=='jpeg'))
        return imagejpeg($thumb,$newfilename);
        if($ext=='png')
        return imagepng($thumb,$newfilename);
}

	
 $repaire=$_REQUEST['repairid'];
 $act=$_REQUEST['act'];
$person=mysqli_real_escape_string($db,$_REQUEST['person']);
$centername=mysqli_real_escape_string($db,$_REQUEST['centername']);
$mobile=$_REQUEST['mobile'];
$add=mysqli_real_escape_string($db,$_REQUEST['add']);
$active=$_REQUEST['active'];
$uploadresume1=$_FILES['fileToUpload1']['name'];

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
			$sql=$db->prepare("insert into soum_servicecenter(contact_person,service_center_name,address,mobile,active)values(?,?,?,?,?)");
					$sql->bind_param("sssss",$person,$centername,$add,$mobile,$priority);
			
			$res=$sql->execute();
			$enq_id=mysqli_insert_id($db);	
			
          //*******************************Image1************************************
						if($uploadresume1!='')
						{
							$file_tmp1=$_FILES['fileToUpload1']['tmp_name'];

							/*BOF Security Patch IS-001*/
							$check = getimagesize($file_tmp1);
							if($check === false){?>
								<script>
							        alert("Please upload valid file format");	
				        			window.location.href="repair_center_master.php";	 
							    </script>
							<?php }
							/*EOF Security Patch IS-001*/

							$pos1=strpos($uploadresume1,".");
							if($uploadresume1=="")
							{
							$new_file_name1="";
							}
							else
							{
							$new_file_name1="offerImg".$enq_id.substr($uploadresume1, $pos1,strlen($uploadresume1)-$pos1);
							}
							
							
							if(move_uploaded_file($file_tmp1,"../upload/".$new_file_name1))
							{
							
							    $newfilei1="../upload/thumb/".$new_file_name1;
							    resizeImage("../upload/".$new_file_name1,135,$newfilei1);
							    $newfilenew="../upload/".$new_file_name1;
							    resizeImage("../upload/".$new_file_name1,500,$newfilenew1);
							}
							
							$update_img1="update soum_servicecenter set offer_image='$new_file_name1' where offer_id=$enq_id";
							//echo $update_img1;
							$res1=$db->query($update_img1);
						}	
						

		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="repair_center_master.php";				    
				    </script>
				    <?php
				
			        }
			
	    }

		if($act == "edit")
		{
	
	          	$sql=$db->prepare("update soum_servicecenter set sc_id='$repaire',contact_person='$person',service_center_name='$centername',address='$add',mobile='$mobile',active='$priority' where sc_id=$repaire");
			
			
			$res=$sql->execute();
			$enq_id=$offerid;	
			
          //*******************************Image1************************************
						if($uploadresume1!='')
						{
							$file_tmp1=$_FILES['fileToUpload1']['tmp_name'];
							
							/*BOF Security Patch IS-001*/
							$check = getimagesize($file_tmp1);
							if($check === false){?>
								<script>
							        alert("Please upload valid file format");	
				        			window.location.href="repair_center_master.php";	 
							    </script>
							<?php }
							/*EOF Security Patch IS-001*/

							$pos1=strpos($uploadresume1,".");
							if($uploadresume1=="")
							{
							$new_file_name1="";
							}
							else
							{
							$new_file_name1="offerImg".$enq_id.substr($uploadresume1, $pos1,strlen($uploadresume1)-$pos1);
							}
							
							
							if(move_uploaded_file($file_tmp1,"../upload/".$new_file_name1))
							{
							
							    $newfilei1="../upload/thumb/".$new_file_name1;
							    resizeImage("../upload/".$new_file_name1,135,$newfilei1);
							    $newfilenew="../upload/".$new_file_name1;
							    resizeImage("../upload/".$new_file_name1,500,$newfilenew1);
							}
							
							$update_img1=$db->prepare("update soum_servicecenter set offer_image='$new_file_name1' where offer_id=$enq_id");
							//echo $update_img1;
							$res1=$update_img1->execute();
						}	
						

		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="repair_center_master.php";				    
				    </script>
				    <?php
				
			        }

            

           
		}
		
		if($act == "del")
		{
			$sql="delete from soum_servicecenter where sc_id=$repaire";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="repair_center_master.php";				    
				    </script>
				    <?php
				
			        }
			
		}
?>