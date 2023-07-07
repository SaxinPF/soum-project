<?php
include('config.php');
$act=$_REQUEST['act'];
$dt=date("Y/m/d");

if($act==2)
{
    $sql="SELECT * FROM soum_pre_launch WHERE date(from_dt)<='$dt' and date(to_dt)>='$dt'";
    $res=$db->query($sql);
    if(mysqli_num_rows($res)>0)
    {

?>
<div class="modal-dialog" role="document">
  <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recent Hot Offers</h5>
        <button type="button" class="close" data-dismiss="modal" onclick="close_2()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body signara">
<?php

    $sql="SELECT * FROM soum_pre_launch WHERE date(from_dt)<='$dt' and date(to_dt)>='$dt'";
          $res=$db->query($sql);
          $row=$res->fetch_assoc();
          $fromdt =$row['from_dt'];
        $start = date("d-m-Y", strtotime($fromdt));
        $todt =$row['to_dt'];
        $end = date("d-m-Y", strtotime($todt));


?>


                <div class="column default-featured-column style-two col-md-12" id="1product-mobile" style="padding:0px!important;">
                       <div class="col-md-12" style="text-align:center;">
                       <img src="upload/pre-launch/<?=$row['img'];?>" style="max-width:100%;height:auto;"/></div>
                          <div class="col-md-12" style="text-align:center;padding:0px;">
                			<h4 style="font-weight:bold;padding:3px;"><?=$row['title'];?></h4>
						     <p style="display:none;">Offer Valid till <?=$end;?><br></p>
						</div>
					    <div class="col-md-12" style="text-align:center;padding:0px;">
							<?=$row['offer'];?>
						</div>
						 <div class="col-md-12" style="text-align:center;padding:0px;">
							<span style="font-size:11px;"><?=$row['feature'];?></span>
						</div>
                </div>


    </div>
	    <div class="modal-footer">
          <a href="contact_preLaunch.php?preid=<?=$row['pre_id'];?>"  class="btn btn-primary">I am Interested</a>
        </div>
</div>
</div>

  <?php }else{  echo '0';   } } ?>
