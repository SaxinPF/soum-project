<?php
	include('../config.php');
function resizeImage($filename,$max_width,$newfilename="",$max_height='',$withSampling=true)
{
    if($newfilename=="")
        $newfilename=$filename;
    
    list($width, $height) = getimagesize($filename);
   
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
   
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $po=strpos($filename,".")+1;
    $ln=strlen($filename)-$po;
    $ext = strtolower(substr($filename,$po,$ln));
   
	
	
    if($ext=='gif') 
        $source = imagecreatefromgif($filename);
        if(($ext=='jpg') or ($ext=='jpeg')) 
        $source = imagecreatefromjpeg($filename);
        if($ext=='png') 
        $source = imagecreatefrompng($filename);

    if($withSampling)
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    else   
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
   
    if($ext=='gif')
        return imagegif($thumb,$newfilename);
    if(($ext=='jpg') or ($ext=='jpeg'))
        return imagejpeg($thumb,$newfilename);
        if($ext=='png')
        return imagepng($thumb,$newfilename);
}

$act=$_REQUEST['act'];
	
	$prodid=mysqli_real_escape_string($db,$_REQUEST['prod_id']);
	$model_id=mysqli_real_escape_string($db,$_REQUEST['model_id']);
    $post_date=date('Y-m-d H:s:i');

    $title=mysqli_real_escape_string($db,$_REQUEST['title']);	


$imageData1=mysqli_real_escape_string($db,$_REQUEST['S1']);


$uploadresume1=mysqli_real_escape_string($db,$_FILES['fileToUpload1']['name']);


    
       if($act == "Add"){
			
			    $table='soum_colors';
							
									$sql=$db->prepare("insert into $table (title,model_id)
									values(?,?)");
									$sql->bind_param("ss",$title,$model_id);

							
										
				   		       $res=$sql->execute();
    						   $enq_id=mysqli_insert_id($db);
							   
									
								
										/***************Image1************************************/
									if($imageData1!='')
									{
									  $prodImage1='t-prodImageC-'.$enq_id.'.jpg';

   										$oldDirectory = '../'.UPLOAD_DIR.$imageData1;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage1;
									    rename($oldDirectory, $newDirectory);

									    $newfilei1  =  '../'.UPLOAD_DIR."thumb/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update $table set image='$prodImage1' where id=$enq_id");
										$res1=$update_img1->execute();
									}
		            		echo 1;			
	    }
		if($act == "Edit")
		{
						
	                        $sql=$db->prepare("update soum_colors set title='$title' where id=$prodid");
						    $res=$sql->execute();
						    $enq_id=$prodid;
						/***************Image1************************************/
									if($imageData1!='')
									{
									   $prodImage1='t-prodImageC-'.$enq_id.'.jpg';

   										$oldDirectory = '../'.UPLOAD_DIR.$imageData1;
									    $newDirectory = '../'.UPLOAD_DIR.$prodImage1;
									    rename($oldDirectory, $newDirectory);

									    $newfilei1= '../'.UPLOAD_DIR."thumb/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update soum_colors set image='$prodImage1' where id=$enq_id");
										$res1=$update_img1->execute();
									}
								echo 2;
		}
		

	
?>