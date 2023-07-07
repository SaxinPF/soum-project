<?php
include('config.php');
//include('_mail_fire.php');
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
$poster_id=$_REQUEST['poster_id'];
$poster_type=$_REQUEST['poster_type'];
$name=$_REQUEST['name1'];
$email=$_REQUEST['email'];
$mobile=$_REQUEST['mobile'];
$address=$_REQUEST['address'];
$city=$_REQUEST['city'];
$pincod=$_REQUEST['pincod'];
 //$imageData1=$_REQUEST['S1'];
 $imageData1=$_REQUEST['file1'];
//echo "update soum_master_customer set fname='$name',email='$email',address='$address',city='$city',pincode='$pincode',mobile='$mobile' where cust_id=$poster_id";
if($poster_type=='Customer')
{					        
$token1=$db->prepare("update soum_master_customer set fname='$name',email='$email',address='$address',city='$city',pincod='$pincod',mobile='$mobile' where cust_id=$poster_id");								
}
else if($poster_type=='Dealer')
{
$token1=$db->prepare("update soum_master_dealer set fname='$name',email='$email',address='$address',city='$city',pincod='$pincod',mobile='$mobile' where cust_id=$poster_id");								
}
$rest=$token1->execute();
	
if($rest)
{
      /*******************************Image1************************************/
      $enq_id=$poster_id;
      
      
                if($imageData1!='')
				{
				    if($poster_type=='Dealer'){ $type='Dealer_profile'; }else{ $type='Customer_profile';}
				    $prodImage1=$type;
					
					$oldDirectory = "upload/".$imageData1;
				    //$newDirectory = "upload/profile/".$prodImage1;
				    $newDirectory = "upload/profile/".$imageData1;
				    rename($oldDirectory, $newDirectory);
				    
				   if($poster_type=='Dealer'){ $table='soum_master_dealer'; }else{ $table='soum_master_customer';}

					$update_img1=$db->prepare("update $table set image='$imageData1' where cust_id=$enq_id");
					$res1=$update_img1->execute();
					
				}

						
    if($poster_type=='Customer')
     {
      echo '<script>alert("Profile successfully update!");</script>'; 
      echo '<script>window.location.href="customer_dashboard.php";</script>';
     }
     else
     {
       echo '<script>alert("Profile successfully update!");</script>';
       echo '<script>window.location.href="customer_dashboard.php";</script>';
     }
}
else
{
	 echo '<script>window.location.href="customer_dashboard.php";</script>';
}	
									
?>
