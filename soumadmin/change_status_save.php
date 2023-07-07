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
$status=mysqli_real_escape_string($db,$_REQUEST['status']);
     
       if($act == "add")
		{
			$sql="insert into soum_repair_status_master(status)	values('$status')";
			
			$res=$db->query($sql);
			$enq_id=mysqli_insert_id($db);	
			
        	
						

		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="change_status_master.php";				    
				    </script>
				    <?php
				
			        }
			
	    }

		if($act == "edit")
		{
	
	          	$sql="update soum_repair_status_master set rs_id='$repaire',status='$status' where rs_id=$repaire";

				$res=$db->query($sql);
				$enq_id=$offerid;
				$enq_id=mysqli_insert_id($db);	
	
				
				

		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="change_status_master.php";				    
				    </script>
				    <?php
				
			        }

            

           
		}
		
		if($act == "del")
		{
			$sql="delete from soum_repair_status_master where rs_id=$repaire";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="change_status_master.php";				    
				    </script>
				    <?php
				
			        }
			
		}
?>