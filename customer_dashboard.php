<?php include('config.php');
$poster_id=$_SESSION['poster_id'];
$poster_type=$_SESSION['poster_type'];
$sql="select * from soum_master_customer where cust_id=$poster_id";
$type=1;
$res=$db->query($sql);
$row=$res->fetch_assoc();
$name=$row['fname'];
$email=$row['email'];
$address=$row['address'];
$city=$row['city'];
$mobile=$row['mobile'];
$pincod=$row['pincod'];
$image=$row['image'];

$layout_title = 'SOUM | Services Online Used Mobile';
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include('elements/headcommon.php');?>
  </head>
  <body>
  <?php include('elements/header.php');?>

 <div class="clearfix"></div>
  <div class="mainhead detailpage ">
 <div class="clearfix"></div>
 <div class="container mt-4 dashboard">
 <h2>Hello <?=$name;?>,</h2>
 <div class="clearfix"></div>
 <div>
 <ul class="nav nav-tabs" id="myTab" role="tablist">
 <!--   <li class="nav-item">
	  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Submit An Ad</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Posted Ads</a>
   </li> -->
   <li class="nav-item">
    <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Settings</a>
   </li>
 </ul> 
<div class="tab-content" id="myTabContent">
<!--  <div class="tab-pane fade show active subtad" id="home" role="tabpanel" aria-labelledby="home-tab"><img src="img/pin.png" alt=""/>
  <span>Place an ad now!</span>
  <a class="accessbut" href="form_ad.php" style="text-decoration: none;"  >+ Submit a Free Ad</a>
  </div> -->
 <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="text-right"> <a class="seehowmuch" href="form_ad.php" role="button">Submit An Ad</a></div>
  <br>
  <!--  Use Less code -->
				<?php
                     $tot=0;
                     $used=0;
                     $new=0;
                      $sql3="select * from (
							select soum_order_master.order_id,soum_order_master.order_date,soum_order_master.cust_id,soum_order_master.fname,soum_order_master.mail,
							soum_order_master.mobile,soum_order_details.ord_det_id,soum_order_details.prod_id,sum(soum_order_details.price*soum_order_details.qty) tot
							from soum_order_master,soum_order_details
							where soum_order_master.order_id=soum_order_details.order_id
							and soum_order_master.active=1
							group by soum_order_master.order_id)temp
							left outer join soum_product_master
							on temp.prod_id=soum_product_master.prod_id";
                      $res3=$db->query($sql3);
                      while($row3=$res3->fetch_assoc())
                      {
                          $tot++;

                          if($row3['prod_cat_id']==1)
                          {
                            $new++;
                          }
                           if($row3['prod_cat_id']==2)
                           {
                             $used++;
                           }

                      }


                      ?>
	 <!--  Use Less code -->
  <div class="clearfix"></div>
   <div class="table-responsive">
   <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Image</th>
      <th scope="col">Post Date - Time</th>
     <!--  <th scope="col">Token</th> -->
       <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Price</th>
      <th scope="col">Views</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php
															$sql2="select
*,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating,
prod_id p, (select count(1) from soum_view_count where prod_id=p) viewss
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=    soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and prod_cat_id=2 and soum_product_master.poster_type='$poster_type' and soum_product_master.poster_id='$poster_id'
order by soum_product_master.prod_id desc";
															$res2=$db->query($sql2);
															$i=1;
	while($row2=$res2->fetch_assoc())
				{


				?>

					<tr>
					  <th scope="row"><?=$i++;?></th>
					  <td><img src="upload/<?=$row2['imagesx'];?>" alt="" width="135"/></td>
					  <td><?=date("d-m-Y H:s:i", strtotime($row2['post_date']));?></td>
					  <!-- <td><?=$row2['code']?></td> -->
					   <td><?=$row2['brand_name']?></td>
					  <td><?=$row2['model']?></td>
					  <td><?php echo $row2['appliable_rate']; ?></td>
					  <td><?php echo $row2['viewss']; ?></td>
					  <td><?php if($row2['active']==0) { ?>
					       Moderation
					  <?php  }if($row2['active']==1){ ?>
					     Approved
					  <?php } ?>
					  </td>
					  <td>
					    <a href="form_ad.php?prod_id=<?=$row2['prod_id'];?>" class="accessbut" style="text-decoration: none;" >Edit </a>
					  </td>
					</tr>
         <?php } ?>
  </tbody>
</table>

   </div>
  <div class="clearfix"></div>


  </div>


<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
	          <form name="myForm" action="update_profile_save.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm4()">
                   <input type="hidden" name="poster_id" value="<?=$poster_id;?>"/>
                    <input type="hidden" name="poster_type" value="<?=$poster_type;?>"/>
  <div class="row">
  <div class="col-md-12">
                    <!---------------------canvas upload image start -->
                		<div class="col-md-12" style="display:none;">
						 <img id="scream" height="25" width="21">
				 	<textarea id="debugConsole1" name="S1" rows="3" style="width:30%; display:1none"><?=$image;?></textarea>
                    <canvas id="myCanvas"  width="auto" style="border:1px solid #d3d3d3;display:1none">YourbrowserdoesnotsupporttheHTML5canvastag.</canvas>
                    <script>
                    function abc1(popid)
                    {

					    var canvas = document.getElementById('myCanvas');
					    var context = canvas.getContext('2d');

					    context.closePath();
					    context.lineWidth = 5;
					    context.fillStyle = '#8ED6FF';
					    context.fill();
					    context.strokeStyle = 'blue';
					    context.stroke();
					    var dataURL = canvas.toDataURL("image/jpeg",1);
					    saveImage(dataURL, popid);
					   }
					</script>
                    </div>
                    <!---------------------canvas upload image end -->

					</div>
					<div class="col-md-12" style="padding:0px;margin-bottom:15px;">
                
					<div class="col-md-4">
<label class="control-label">Customer Image *</label>
						<div style="width:100%;float:left;position:relative;overflow:hidden;">
						<?php
						$image_ah  = $image;
						if(empty($image)){
						 $image_ah  = 'profile.png';
						} ?>

						<img id="previewing1" src="upload/profile/<?=$image_ah?>" style="height:80px;width:auto;position:relative;top:0;">
						</div>
						<input type="hidden" id="file1" name="file1" value="<?=$image?>">
                        <span class="select-wrapper"><input type="file" name="fileToUpload1"  id="fileToUpload1" onchange="abc(this,1);" style="padding-top:10px;"/></span>

                        <label class="control-label"><span style="font-size:13px;">(Image Dimensions: 80px X 80px)</span></label>
					</div>
					</div>



  <div class="col-sm-6">
  <div class="form-group">
    <label for="">Name</label>
	<input value="<?=$name;?>" class="form-control" placeholder="Name" name="name1" id="name4" type="text">

  </div>


  </div>
  <div class="col-sm-6"><div class="form-group">
    <label for="">Address</label>
    <textarea class="form-control" placeholder="Address" rows="1" name="address" id="address"><?=$address;?></textarea>

  </div>
  </div>
  <div class="col-sm-6">
   <div class="form-group">
    <label for="">City</label>
    <input value="<?=$city;?>" class="form-control" placeholder="City" name="city" id="city" type="text">

  </div>


  </div>
  <div class="col-sm-6">
    <div class="form-group">
    <label for="">Postal Code</label>
    <input value="<?=$pincod;?>" class="form-control" placeholder="Pincod" name="pincod" id="pincod" type="text">

  </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
    <label for="">Mobile</label>
    <input value="<?=$mobile;?>" class="form-control" placeholder="Mobile No" name="mobile" id="mobile4" type="text">


  </div>

  </div>
  <div class="col-sm-6">
    <div class="form-group">
    <label for="">Email</label>
    <input value="<?=$email;?>" class="form-control" placeholder="Email" name="email" id="email4" type="text">

  </div>

  </div>

  </div>
  <div class="clearfix"></div>
     <div class="mt-4 text-center"> <button class="accessbut" type="submit" >Update Now</button></div>
	  </form>
  </div>

</div>

 </div>
</div>

  </div>

 <div class="clearfix"></div>



 <?php include('elements/footer.php');?>

 <script type="text/javascript">
function abc(x,popid)
{
 	var file = x.files[0];
    window.URL = window.URL || window.webkitURL;
    var blobURL = window.URL.createObjectURL(file);
	$("#popid").val(popid);

	$("#scream").one("load", function() {

		var img = document.getElementById("scream");
		var c_width 	= img.clientWidth;
		var c_height 	= img.clientHeight;
		var n_width 	= img.naturalWidth;
		var n_height 	= img.naturalHeight;
	    var c = document.getElementById("myCanvas");
	    var ctx = c.getContext("2d");
	    c.height = 480;
	    diff_per=480/n_height*100;
	    c.width=n_width*diff_per/100;
	    ctx.drawImage(img, 0, 0,n_width, n_height,0,0,c.width,c.height);
		var myCanvas = document.getElementById("myCanvas");
		var canvasData = myCanvas.toDataURL("image/jpeg",1);
		var debugConsole= document.getElementById("debugConsole"+popid);
		//alert(popid);
	    abc1(popid);
    }).attr("src", blobURL);


}
function saveImage(dataURL, popid)
{
    $('#previewing'+popid).attr('src','upload/loader.gif');
	$.ajax({
	  type: "POST",
	  url: "script.php",
	  data: {
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	  $('#file1').val(o);
	   $('#previewing'+popid).attr('src','upload/'+o);
	});
}

function validateForm4(){
  var mob=$("#mobile4").val();
  if(mob=='')
  {
   alert('Mobile number must be');
   return false;
  }


    var m=(mob.substr(0,1))*1;

    if(m>=0 && m<=6)
    {
      alert("Enter valid number");
      return false;

    }

    if(mob.length<10)
    {
      alert("Enter valid number");
      return false;
    }


  var name=$("#name4").val();
  if(name=='')
  {
   alert('Name must be');
   return false;
  }

/*   var email=$("#email").val();
  if(email=='')
  {
   alert('Email id must be');
   return false;
  } */


}
</script>

</body>
</html>
