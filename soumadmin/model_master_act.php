<?php
	include('../config.php');
	
	 $catid=(isset($_REQUEST['cat_id']))?$_REQUEST['cat_id']:0;
     $act =   (isset($_REQUEST['act']))?$_REQUEST['act']:'';
     $brand=  (isset($_REQUEST['brand']))?$_REQUEST['brand']:''; 
     $modal=  (isset($_REQUEST['modal']))?$_REQUEST['modal']:'';
     $display= (isset($_REQUEST['display']))?$_REQUEST['display']:'';
     $battry= (isset($_REQUEST['battry']))?$_REQUEST['battry']:'';
     $process= (isset($_REQUEST['process']))?$_REQUEST['process']:'';
     $os= (isset($_REQUEST['os']))?$_REQUEST['os']:'';
     $ram= (isset($_REQUEST['ram']))?$_REQUEST['ram']:'';
     $color=(isset($_REQUEST['color']))?$_REQUEST['color']:'';
     $fcame= (isset($_REQUEST['fcame']))?$_REQUEST['fcame']:'';
     $bcame= (isset($_REQUEST['bcame']))?$_REQUEST['bcame']:'';
     $weight= (isset($_REQUEST['weight']))?$_REQUEST['weight']:'';
     $rom= (isset($_REQUEST['rom']))?$_REQUEST['rom']:'';
     $desc= (isset($_REQUEST['desc']))?$_REQUEST['desc']:'';
     $category_type = (isset($_REQUEST['category_type']))?$_REQUEST['category_type']:'';
     
     
 $imageData1=mysqli_real_escape_string($db,$_REQUEST['S1']);
$imageData2=mysqli_real_escape_string($db,$_REQUEST['S2']);
$imageData3=mysqli_real_escape_string($db,$_REQUEST['S3']); 
     
    
     
       if($act == "Add")
		{
			$sql=$db->prepare("insert into soum_prod_subsubcat(prod_subcat_id,prod_subcat_desc,display,battry,os,processor,ram,colour,fcame,bcame,p_weight,p_rom,p_desc,category_type)
			values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$sql->bind_param("ssssssssssssss",$brand,$modal,$display,$battry,$os,$process,$ram,$color,$fcame,$bcame,$weight,$rom,$desc,$category_type);
			$res=$sql->execute();			
			
			$enq_id=mysqli_insert_id($db);
			
			
				/***************Image1************************************/
									if($imageData1!='')
									{
									  $prodImage1='modelImage1-'.$enq_id.'.jpg';
   										
   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/".$prodImage1;
									    rename($oldDirectory, $newDirectory);
									    
									   $thumb = "../upload/thumb/".$prodImage1;
									   rename($oldDirectory, $thumb);
									    $update_img1=$db->prepare("update soum_prod_subsubcat set p_img1='$prodImage1' where prod_subsubcat_id=$enq_id");
										$res1=$update_img1->execute();
									}
					/***************Image2************************************/
									if($imageData2!='')
									{
									  $prodImage2='modelImage2-'.$enq_id.'.jpg';
   										
   										$oldDirectory = "../upload/temp/".$imageData2;
									    $newDirectory = "../upload/".$prodImage2;
									    rename($oldDirectory, $newDirectory);
									    
									     $thumb = "../upload/thumb/".$prodImage2;
									     rename($oldDirectory,$thumb);
   										$update_img2=$db->prepare("update soum_prod_subsubcat set p_img2='$prodImage2' where prod_subsubcat_id=$enq_id");
										$res2=$update_img2->execute();
									}
				
                        /***************Image3************************************/
									if($imageData3!='')
									{
									  $prodImage3='modelImage3-'.$enq_id.'.jpg';
   										
   										$oldDirectory = "../upload/temp/".$imageData3;
									    $newDirectory = "../upload/".$prodImage3;
									    rename($oldDirectory, $newDirectory);
									    
									     $thumb = "../upload/thumb/".$prodImage3;
									   rename($oldDirectory, $thumb);
   										$update_img3=$db->prepare("update soum_prod_subsubcat set p_img3='$prodImage3' where prod_subsubcat_id=$enq_id");
										$res3=$update_img3->execute();
									}
						     
			echo 1;			
	    }
		if($act == "Edit")
		{
	
	       $sql=$db->prepare("update soum_prod_subsubcat set prod_subcat_desc='$modal', prod_subcat_id='$brand', display='$display', battry='$battry', os='$os', processor='$process', ram='$ram', colour='$color', fcame='$fcame', bcame='$bcame',p_desc='$desc',p_weight='$weight',p_rom='$rom'  where prod_subsubcat_id=$catid");
			$res=$sql->execute();
			
			
			$enq_id=$catid;
			
			
			/***************Image1************************************/
									if($imageData1!='')
									{
									  $prodImage1='modelImage1-'.$enq_id.'.jpg';
   										
   										$oldDirectory = "../upload/temp/".$imageData1;
									    $newDirectory = "../upload/".$prodImage1;									    
									    rename($oldDirectory, $newDirectory);
									    
									    $oldDirectory1 = "../upload/temp/".$prodImage1;
									    $thumb = "../upload/thumb/".$prodImage1;
									    rename($oldDirectory1, $thumb);

									    
   										$update_img1=$db->prepare("update soum_prod_subsubcat set p_img1='$prodImage1' where prod_subsubcat_id=$enq_id");
										$res1=$update_img1->execute();
									}
					/***************Image2************************************/
									if($imageData2!='')
									{
									  $prodImage2='modelImage2-'.$enq_id.'.jpg';
   										
   										$oldDirectory = "../upload/temp/".$imageData2;
									    $newDirectory = "../upload/".$prodImage2;
									    rename($oldDirectory, $newDirectory);
									    
									    $thumb = "../upload/thumb/".$prodImage2;
									    rename($oldDirectory, $thumb);
									    
   										$update_img2=$db->prepare("update soum_prod_subsubcat set p_img2='$prodImage2' where prod_subsubcat_id=$enq_id");
										$res2=$update_img2->execute();
									}
				
                        /***************Image3************************************/
									if($imageData3!='')
									{
									  $prodImage3='modelImage3-'.$enq_id.'.jpg';
   										
   										$oldDirectory = "../upload/temp/".$imageData3;
									    $newDirectory = "../upload/".$prodImage3;
									    rename($oldDirectory, $newDirectory);
									    
									    $thumb = "../upload/thumb/".$prodImage3;
									    rename($oldDirectory, $thumb);
									    $update_img3=$db->prepare("update soum_prod_subsubcat set p_img3='$prodImage3' where prod_subsubcat_id=$enq_id");
										$res3=$update_img3->execute();
									}
			
					
			echo 2;
		}
		
		if($act=="Delete")
		{
			$sql="delete from soum_prod_subsubcat where prod_subsubcat_id=$catid";
			$res=$db->query($sql);
			echo 3;
			
		}
	
?>