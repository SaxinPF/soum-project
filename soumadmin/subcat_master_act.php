<?php


    include('../config2.php');


	 $catid=$_REQUEST['cat_id'];
     $act=$_REQUEST['act'];
     $catename=$_REQUEST['catname'];

     $imageData1=$_REQUEST['S1'];
     $imageData2=$_REQUEST['S2'];

	 $active=$_REQUEST['active'];
     if($active=='on')
     {
      $priority=1;
     }
     else
     {
     $priority=0;
     }

       if($act == "Add")
		{
			$sql=$db->prepare("insert into soum_prod_subcat(prod_subcat_desc,priority1)
					values(?,?)");
					$sql->bind_param("ss",$catename,$priority);
			$res=$sql->execute();
			$prod_id=mysqli_insert_id($db);
	        $enq_id=$prod_id;

            foreach($_POST['categories'] as $valeu){
	          	   $sql=$db->prepare("insert into categroy_brands(categroy_type,brand_id)
					values(?,?)");
					$sql->bind_param("ss",$valeu,$enq_id);
			        $res=$sql->execute();
			}
	        

		     /***************Image1************************************/
			if($imageData1!='')
			{
			   $prodImage1='cat-'.$enq_id.'.jpg';

				$oldDirectory = "../upload/temp/".$imageData1;
			    $newDirectory = "../upload/c_logo/".$prodImage1;
			    rename($oldDirectory, $newDirectory);


				$update_img1=$db->prepare("update soum_prod_subcat set logo='$prodImage1' where prod_subcat_id=$enq_id");
				$res1=$update_img1->execute();
			}

             /***************Image2************************************/
			if($imageData2!='')
			{
			   $prodImage2='brand-'.$enq_id.'.jpg';

				$oldDirectory = "../upload/temp/".$imageData2;
			    $newDirectory = "../upload/c_logo/".$prodImage2;
			    rename($oldDirectory, $newDirectory);


				$update_img1=$db->prepare("update soum_prod_subcat set home_logo='$prodImage2' where prod_subcat_id=$enq_id");
				$res1=$update_img1->execute();
			}




			echo 1;

	    }

		if($act == "Edit")
		{

	       $sql=$db->prepare("update soum_prod_subcat set prod_subcat_desc='$catename', priority1='$priority' where prod_subcat_id=$catid");
			$res=$sql->execute();


			$prod_id=$catid;
			$enq_id=$prod_id;
            
                	      $sql=$db->prepare("DELETE FROM `categroy_brands` WHERE `brand_id` = $enq_id");
			      $res=$sql->execute();
			 foreach($_POST['categories'] as $valeu){
	          	   $sql=$db->prepare("insert into categroy_brands(categroy_type,brand_id)
					values(?,?)");
					$sql->bind_param("ss",$valeu,$enq_id);
			        $res=$sql->execute();
			}
            
            



		     /***************Image1************************************/
			if($imageData1!='')
			{
			   $prodImage1='cat-'.$enq_id.'.jpg';

				$oldDirectory = "../upload/temp/".$imageData1;
			    $newDirectory = "../upload/c_logo/".$prodImage1;
			    rename($oldDirectory, $newDirectory);


				$update_img1=$db->prepare("update soum_prod_subcat set logo='$prodImage1' where prod_subcat_id=$enq_id");
				$res1=$update_img1->execute();
			}

             /***************Image2************************************/
			if($imageData2!='')
			{
			   $prodImage2='brand-'.$enq_id.'.jpg';

				$oldDirectory = "../upload/temp/".$imageData2;
			    $newDirectory = "../upload/c_logo/".$prodImage2;
			    rename($oldDirectory, $newDirectory);


				$update_img1=$db->prepare("update soum_prod_subcat set home_logo='$prodImage2' where prod_subcat_id=$enq_id");
				$res1=$update_img1->execute();
			}


			echo 2;
		}

		if($act == "Delete")
		{
			$sql="delete from soum_prod_subcat where prod_subcat_id=$catid";
			$res=$db->query($sql);
			echo 3;

		}




?>
