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

	
 $bannerid=$_REQUEST['banner_id'];
 $act=$_REQUEST['act'];

$banner_desc=mysqli_real_escape_string($db,$_REQUEST['banner_desc']);
$title=mysqli_real_escape_string($db,$_REQUEST['title']);
$title2=mysqli_real_escape_string($db,$_REQUEST['title2']);
$link=mysqli_real_escape_string($db,$_REQUEST['link']);

$link2=mysqli_real_escape_string($db,$_REQUEST['link2']);
$active=$_REQUEST['active'];
//$uploadresume1=$_FILES['fileToUpload1']['name'];
//$uploadresume2=$_FILES['fileToUpload2']['name'];
 $imageData1=$_REQUEST['S1'];


//echo $banner_desc;

/*
echo $uploadresume2;
echo "<hr>";
echo "sanjay".($uploadresume2!='')."verma";
die();
*/

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
			$sql=$db->prepare("insert into soum_banner(banner_desc,banner_desc2,banner_link,banner_btn,active)
					values(?,?,?,?,?)");
					$sql->bind_param("sssss",$banner_desc,$title2,$link,$link2,$priority);
			$res=$sql->execute();
			$enq_id=mysqli_insert_id($db);	
			
          //*******************************Image1************************************
						if($imageData1!='')
						{
						   $prodImage1='bannerImg'.$enq_id.'.jpg';
							
							$oldDirectory = "../upload/temp/".$imageData1;
						    $newDirectory = "../upload/banner_img/".$prodImage1;
						    rename($oldDirectory, $newDirectory);
						    
						    
							$update_img1=$db->prepare("update soum_banner set banner_image='$prodImage1' where banner_id=$enq_id");
							$res1=$update_img1->execute();
						}

					//*******************************Image1************************************
						/*if($uploadresume2!='')
						{
							$file_tmp2=$_FILES['fileToUpload2']['tmp_name'];
							$pos2=strpos($uploadresume2,".");
							if($uploadresume2=="")
							{
							$new_file_name2="";
							}
							else
							{
							$new_file_name2="filler".$enq_id.substr($uploadresume2, $pos2,strlen($uploadresume2)-$pos2);
							}
							
							
							if(move_uploaded_file($file_tmp2,"../upload/banner_img/".$new_file_name2))
							{
							
							   	$newfilei2="../upload/banner_img/thumb/".$new_file_name2;
							    resizeImage("../upload/banner_img/".$new_file_name2,135,$newfilei2);
							    $newfilenew="../upload/banner_img/".$new_file_name2;
							    resizeImage("../upload/banner_img/".$new_file_name2,500,$newfilenew2);
							}
							
							$update_img2=$db->prepare("update soum_banner set banner_desc='$new_file_name2' where banner_id=$enq_id");
							//echo $update_img1;
							$res2=$update_img2->execute();
						}*/
						

		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="banner_master.php";				    
				    </script>
				    <?php
				
			        }
			
	    }

		if($act == "edit")
		{
	
	          	$sql=$db->prepare("update soum_banner set banner_desc='$banner_desc', banner_desc2='$title2',banner_link='$link',banner_btn='$link2',active='$priority' where banner_id=$bannerid");
				
			$res=$sql->execute();
			$enq_id=$bannerid;	
			
          //*******************************Image1************************************
						if($imageData1!='')
						{
						   $prodImage1='bannerImg'.$enq_id.'.jpg';
							
							$oldDirectory = "../upload/temp/".$imageData1;
						    $newDirectory = "../upload/banner_img/".$prodImage1;
						    rename($oldDirectory, $newDirectory);
						    
						    
							$update_img1=$db->prepare("update soum_banner set banner_image='$prodImage1' where banner_id=$enq_id");
							$res1=$update_img1->execute();
						}
	
						
						
						
						
						//*******************************Image2************************************
						/*if($uploadresume2!='')
						{
						
							$file_tmp2=$_FILES['fileToUpload2']['tmp_name'];
							$pos2=strpos($uploadresume2,".");
							if($uploadresume2=="")
							{
							$new_file_name2="";
							}
							else
							{
							$new_file_name2="filler".$enq_id.substr($uploadresume2, $pos2,strlen($uploadresume2)-$pos2);
							}
							
							
							if(move_uploaded_file($file_tmp2,"../upload/banner_img/".$new_file_name2))
							{
							
							   	$newfilei2="../upload/banner_img/thumb/".$new_file_name2;
							    resizeImage("../upload/banner_img/".$new_file_name2,135,$newfilei2);
							    $newfilenew="../upload/banner_img/".$new_file_name2;
							    resizeImage("../upload/banner_img/".$new_file_name2,500,$newfilenew2);
							}
							
							$update_img2=$db->prepare("update soum_banner set banner_desc='$new_file_name2' where banner_id=$enq_id");
							//echo $update_img1;
						   $res2=$update_img2->execute();						}
						*/

		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="banner_master.php";				    
				    </script>
				    <?php
				
			        }

            

           
		}
		
		if($act == "del")
		{
			$sql="delete from soum_banner where banner_id=$bannerid";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="banner_master.php";				    
				    </script>
				    <?php
				
			        }

			
		}
		
		
		
	
?>
