<?php
include('config.php');

$poster_id=$_REQUEST['cid'];
$poster_type=$_REQUEST['loginas'];
$pid=$_REQUEST['prodid'];
$post_date=date('Y-m-d H:s:i');
$warr=$_REQUEST['warr'];
$brand=$_REQUEST['brand'];
$model=$_REQUEST['model'];
$rom=$_REQUEST['rom'];
$rate=$_REQUEST['rate'];
$imei=$_REQUEST['imei'];
$img1=$_REQUEST['img1'];
$img2=$_REQUEST['img2'];
$img3=$_REQUEST['img3'];
$oldphone=2;
$active=0;
//$poster_type='Customer';
if($warr=='false'){$warr=1; } else { $warr=2; }
$s1=1;
$s2=2;
	
 

if($pid=='' || $pid=='undefined')   
{    
    $sql=$db->prepare("insert into soum_product_master (post_date,prod_cat_id,brand,modal,imei_no,rom,poster_type,poster_id,active,appliable_rate,offer_price,opening_stock,current_stock,warranty,update1) 
	values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$sql->bind_param("sssssssssssssss",$post_date,$oldphone,$brand,$model,$imei,$rom,$poster_type,$poster_id,$active,$rate,$rate,$s1,$s2,$warr,$post_date); 
									

    
    $res=$sql->execute();
	$enq_id=mysqli_insert_id($db);  
    if($res)
	{
	
	    $token="UCN".str_pad ($enq_id,4,'0', STR_PAD_LEFT);	
		$token1=$db->prepare("update soum_product_master set code='$token' where prod_id=$enq_id");
		$rest=$token1->execute();
	
	
	     /***************Image1************************************/
			if($img1!='' && $img1!='undefined')
			{
					 
			    $prodImage1='prodImage1-'.$enq_id.'.jpg';
			  				
				$oldDirectory = "../upload/temp/".$img1;
			    $newDirectory = "../upload/".$prodImage1;
			    rename($oldDirectory, $newDirectory);
			    
			    $newDirectory1= "../upload/thumb/".$prodImage1;
			    rename($oldDirectory, $newDirectory1);

			    
			    
				$update_img1=$db->prepare("update soum_product_master set images='$prodImage1' where prod_id=$enq_id");
				$res1=$update_img1->execute();
			}
			
			/***************Image2************************************/
			if($img2!='' && $img2!='undefined')
			{
					 
			    $prodImage2='prodImage2-'.$enq_id.'.jpg';
			  				
				$oldDirectory = "../upload/temp/".$img2;
			    $newDirectory = "../upload/".$prodImage2;
			    rename($oldDirectory, $newDirectory);
			    
			    $newDirectory2= "../upload/thumb/".$prodImage2;
			    rename($oldDirectory, $newDirectory2);

			    
			    
				$update_img2=$db->prepare("update soum_product_master set images1='$prodImage2' where prod_id=$enq_id");
				$res2=$update_img2->execute();
			}
			
			/***************Image2************************************/
			if($img3!='' && $img3!='undefined')
			{
					 
			    $prodImage3='prodImage5-'.$enq_id.'.jpg';
			  				
				$oldDirectory = "../upload/temp/".$img3;
			    $newDirectory = "../upload/".$prodImage3;
			    rename($oldDirectory, $newDirectory);
			    
			    $newDirectory3= "../upload/thumb/".$prodImage3;
			    rename($oldDirectory, $newDirectory3);

			    
				$update_img3=$db->prepare("update soum_product_master set add_proof_img='$prodImage3' where prod_id=$enq_id");
				$res2=$update_img3->execute();
			}



	
	
	
       $r=$enq_id;
    
    }
    else
    {
     $r=0;    
    }
}
else
{

       						
    $sql=$db->prepare("update soum_product_master set brand='$brand',modal='$model',imei_no='$imei',rom='$rom',appliable_rate='$rate',offer_price='$rate',warranty='$warr',update1='$post_date' where prod_id=$pid");
    $res=$sql->execute();
	$enq_id=$pid;  
    if($res)
	{
	     /***************Image1************************************/
			if($img1!='' && $img1!='undefined')
			{
					 
			    $prodImage1='prodImage1-'.$enq_id.'.jpg';
			  				
				$oldDirectory = "../upload/temp/".$img1;
			    $newDirectory = "../upload/".$prodImage1;
			    rename($oldDirectory, $newDirectory);
			    
			    
				$update_img1=$db->prepare("update soum_product_master set images='$prodImage1' where prod_id=$enq_id");
				$res1=$update_img1->execute();
			}
			
			/***************Image2************************************/
			if($img2!='' && $img2!='undefined')
			{
					 
			    $prodImage2='prodImage2-'.$enq_id.'.jpg';
			  				
				$oldDirectory = "../upload/temp/".$img2;
			    $newDirectory = "../upload/".$prodImage2;
			    rename($oldDirectory, $newDirectory);
			    
			    
				$update_img2=$db->prepare("update soum_product_master set images1='$prodImage2' where prod_id=$enq_id");
				$res2=$update_img2->execute();
			}


	         /***************Image2************************************/
			if($img3!='' && $img3!='undefined')
			{
					 
			    $prodImage3='prodImage5-'.$enq_id.'.jpg';
			  				
				$oldDirectory = "../upload/temp/".$img3;
			    $newDirectory = "../upload/".$prodImage3;
			    rename($oldDirectory, $newDirectory);
			    
			    
				$update_img3=$db->prepare("update soum_product_master set add_proof_img='$prodImage3' where prod_id=$enq_id");
				$res2=$update_img3->execute();
			}

	
	
       $r=2;
    
    }
    else
    {
     $r=0;    
    }


}    
    
       
 echo $_GET['callback'] . '(' . $r. ')';

?>
