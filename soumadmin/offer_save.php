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
	
 $offerid=$_REQUEST['offer_id'];
 $act=$_REQUEST['act'];
 $prod_id=$_REQUEST['prod_id'];
 
	$sdt=$_REQUEST['start-date'];   
	$end=$_REQUEST['end-date'];
		
		
$title=mysqli_real_escape_string($db,$_REQUEST['title']);
$desc1=mysqli_real_escape_string($db,$_REQUEST['desc1']);
$desc2=mysqli_real_escape_string($db,$_REQUEST['desc2']);
$active=$_REQUEST['active'];
$imageData1=$_REQUEST['S1'];

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

			$sql=$db->prepare("insert into soum_offer(prod_id,start_dt,end_dt,offer_title,offer_desc1,offer_desc2,active)
					values(?,?,?,?,?,?,?)";
					$sql->bind_param("sssssss",$prod_id,$sdt,$end,$title,$desc1,$desc2,$priority);
			$res=$sql->execute();
			$enq_id=mysqli_insert_id($db);	
			
			
						        /***************Image1************************************/
									if($imageData1!='')
									{
									    $prodImage1='offerImg'.$enq_id.'.jpg';   										
   										
   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/".$prodImage1;
									    rename($oldDirectory, $newDirectory);
									    
									    $newfilei1="../upload/profile/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update soum_offer set offer_image='$prodImage1' where offer_id=$enq_id");
										$res1=$update_img1->execute();
									}

			
         				
						
						
						
		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Save successfully");
				        window.location.href="offer_master.php";				    
				    </script>
				    <?php
				
			        }
			
	    }
		if($act == "edit")
		{
					
		//25/11/1922=>2017-04-17
				$sdt=substr($sdt,6,4)."-".substr($sdt,3,2)."-".substr($sdt,0,2);
				$end=substr($end,6,4)."-".substr($end,3,2)."-".substr($end,0,2);
	          	$sql=$db->prepare("update soum_offer set prod_id='$prod_id',start_dt='$sdt',end_dt='$end',offer_title='$title',offer_desc1='$desc1',offer_desc2='$desc2',active='$priority' where offer_id=$offerid");
				
			$res=$sql->execute();
			$enq_id=$offerid;	
			
          /***************Image1************************************/
									if($imageData1!='')
									{
									    $prodImage1='offerImg'.$enq_id.'.jpg';   										
   										
   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/".$prodImage1;
									    rename($oldDirectory, $newDirectory);
									    
									    $newfilei1="../upload/profile/".$prodImage1;
										resizeImage($newDirectory,135,$newfilei1);
   										$update_img1=$db->prepare("update soum_offer set offer_image='$prodImage1' where offer_id=$enq_id");
										$res1=$update_img1->execute();
									}

						
		            if($res)
		            {
		            ?>
				    <script>
				        alert("Data Update successfully");
				        window.location.href="offer_master.php";				    
				    </script>
				    <?php
				
			        }
            
           
		}
		
		if($act == "del")
		{
			$sql="delete from soum_offer where offer_id=$offerid";
			$res=$db->query($sql);
			if($res)
		            {
		            ?>
				    <script>
				        alert("Data delete successfully");
				        window.location.href="offer_master.php";				    
				    </script>
				    <?php
				
			        }
			
		}
		
		
		
	
?>
