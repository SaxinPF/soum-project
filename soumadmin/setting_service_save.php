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

	
$sett=$_REQUEST['setting'];
$act=$_REQUEST['act'];
//$uploadresume1=$_FILES['fileToUpload1']['name'];
//$uploadresume2=$_FILES['fileToUpload2']['name'];
//$uploadresume3=$_FILES['fileToUpload3']['name'];

$imageData1=mysqli_real_escape_string($db,$_REQUEST['S1']);
$imageData2=mysqli_real_escape_string($db,$_REQUEST['S2']);
$imageData3=mysqli_real_escape_string($db,$_REQUEST['S3']);

     
       

		if($act == "edit")
		{
	
	      $enq_id=1;    
			
				
				/***************Image1************************************/
									if($imageData1!='')
									{
									  $prodImage1='repairing1'.$enq_id.'.jpg';
   										
   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/brand_logo/".$prodImage1;
									    rename($oldDirectory, $newDirectory);
									    
									  
									    $update_img1=$db->prepare("update soum_settings set Img_Online_Repairing='$prodImage1' where sett_id=$enq_id");
									    
										$res1=$update_img1->execute();
									}
					/***************Image2************************************/
									if($imageData2!='')
									{
									  $prodImage2='repairing2'.$enq_id.'.jpg';
   										
   										$oldDirectory = "../upload/temp/".$imageData2;
									    $newDirectory = "../upload/brand_logo/".$prodImage2;
									    rename($oldDirectory, $newDirectory);
									    
   										$update_img2=$db->prepare("update soum_settings set img_used_phone='$prodImage2' where sett_id=$enq_id");
										$res2=$update_img2->execute();
									}
				
                        /***************Image3************************************/
									if($imageData3!='')
									{
									  $prodImage3='repairing3'.$enq_id.'.jpg';
   										
   										$oldDirectory = "../upload/temp/".$imageData3;
									    $newDirectory = "../upload/brand_logo/".$prodImage3;
									    rename($oldDirectory, $newDirectory);
									    
									    
   										$update_img3=$db->prepare("update soum_settings set img_Buy_Enquire='$prodImage3' where sett_id=$enq_id");
										$res3=$update_img3->execute();
									}
				
				
						
						
		            if($res1)
		            {
		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="setting_service_master.php";				    
				    </script>
				    <?php
				
			        }
				}
		?>