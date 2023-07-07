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


$act=$_REQUEST['act'];
$preid=$_REQUEST['preid'];
$brand_id=$_REQUEST['drpBrand'];
$model_id=$_REQUEST['drpModel'];

$sdt=$_REQUEST['start-date'];   
$end=$_REQUEST['end-date'];

$title=mysqli_real_escape_string($db,$_REQUEST['title']);
$offer=mysqli_real_escape_string($db,$_REQUEST['offer']);
$feature=mysqli_real_escape_string($db,$_REQUEST['feature']);
$active=$_REQUEST['active'];
$imageData1=$_REQUEST['S1'];

//echo $title." | ".$offer." | ".$feature." | ".$sdt." | ".$end." | ".$active;


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
		    $sdt=substr($sdt,6,4)."-".substr($sdt,3,2)."-".substr($sdt,0,2);
			$end=substr($end,6,4)."-".substr($end,3,2)."-".substr($end,0,2);

			$sql=$db->prepare("insert into soum_pre_launch(title,from_dt,to_dt,offer,feature,brand_id,model_name)
					values(?,?,?,?,?,?,?)");
					$sql->bind_param("sssssss",$title,$sdt,$end,$offer,$feature,$brand_id,$model_id);
			$res=$sql->execute();
			$enq_id=mysqli_insert_id($db);	
			
			
						        /***************Image1************************************/
									if($imageData1!='')
									{
									    $prodImage1='offerImg'.$enq_id.'.jpg';   										
   										
   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/pre-launch/".$prodImage1;
									    rename($oldDirectory, $newDirectory);
   										$update_img1=$db->prepare("update soum_pre_launch set img='$prodImage1' where pre_id=$enq_id");
										$res1=$update_img1->execute();
									}
		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="pre_launch_offer.php";				    
				    </script>
				    <?php
				
			        }
			
		    }
		    if($act == "edit")
			{
			   
			   
					
				$sdt=substr($sdt,6,4)."-".substr($sdt,3,2)."-".substr($sdt,0,2);
				$end=substr($end,6,4)."-".substr($end,3,2)."-".substr($end,0,2);
				
				
	          	$sql=$db->prepare("update soum_pre_launch set title='$title',from_dt='$sdt',to_dt='$end',offer='$offer',feature='$feature',brand_id='$brand_id',model_name='$model_id' where pre_id=$preid");
				$res=$sql->execute();
				$enq_id=$preid;	
			
         					 	/***************Image1************************************/
									if($imageData1!='')
									{
									    $prodImage1='offerImg'.$enq_id.'.jpg';   										
   										
   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/pre-launch/".$prodImage1;
									    rename($oldDirectory, $newDirectory);
   										$update_img1=$db->prepare("update soum_pre_launch set img='$prodImage1' where pre_id=$enq_id");
										$res1=$update_img1->execute();
										
									}
									
									
						
		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="pre_launch_offer.php";				    
				    </script>
				    <?php
				
			        }
            
           
		}
		
		if($act=="del")
		{
			$sql="delete from soum_pre_launch where pre_id=$preid";
			$res=$db->query($sql);
			if($res)
            {
            ?>
		    <script>
		        alert("Data delete successfully");
		        window.location.href="pre_launch_offer.php";				    
		    </script>
		    <?php
		
	        }
			
		}


	
?>
