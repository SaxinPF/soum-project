<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include('elements/headcommon.php');?>
</head>
<body>
  <?php include('elements/header.php');?>
  <div class="clearfix"></div>
   <div class="mainhead container">
      <div class="clearfix"></div>
       <div class="row">
		<div class="col-sm-12" style="text-align:center;padding-top:40px;">
			<img src="images/amiri.gif" class="thank-img">
		</div>
						 <div class="col-sm-12">
							<?php
							if(isset($_REQUEST['op_id'])){
								   $ord_id = $_REQUEST['op_id'];
								   $sql_upd=$db->prepare("update soum_order_master set status=6 where order_id=$ord_id");
								   $result1=$sql_upd->execute();
								   echo "<script>window.location.href='http://p-y.tm/G-s39IY'</script>";
							}
							?>

	                     </div>
</div>
</div>
 <div class="clearfix"></div>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <?php include('elements/footer.php');?>
</body>
</html>
