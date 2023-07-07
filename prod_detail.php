<?php include('config.php');
$id=$_REQUEST['id'];
$sql="select temp.*,soum_product_master.images from (
select soum_prod_subsubcat.*,soum_prod_subcat.prod_subcat_desc brand from soum_prod_subsubcat,soum_prod_subcat where soum_prod_subsubcat.prod_subcat_id=soum_prod_subcat.prod_subcat_id
 and prod_subsubcat_id=$id) temp
left outer join soum_product_master
on temp.prod_subsubcat_id=soum_product_master.modal
group by temp.prod_subsubcat_id";
$res=$db->query($sql);
$row=$res->fetch_assoc();
$display=$row['display'];
$battry=$row['battry'];
$os=$row['os'];
$processor=$row['processor'];
$ram=$row['ram'];
$fcame=$row['fcame'];
$bcame=$row['bcame'];
$colour=$row['colour'];
$img=$row['p_img1'];
$rom=$row['p_rom'];
$brand=$row['brand'];
$model=$row['prod_subcat_desc'];
?>
<input name="Text1" id="bname" type="hidden" value="<?=$brand;?>"/><input name="Text1" id="mname" value="<?=$model;?>" type="hidden" />
        <div class="col-md-12" style="background-color:#f9f9f9;padding:0px 10px 10px 0px;width: 100%;float: left;">
			<div style="padding-right:0px;width:34%;float:right;margin-left:1%;">
				<div class="tab-imgbox" style="min-height:auto !important;">
					<img src="upload/<?=$img;?>" style="max-height:160px;max-width:100%;margin: auto;float: none;">
				</div>
			</div>
            <div style="padding-left:10px;width:65%;float:left;">
				<p style="margin:10px 0px 0px 0px;font-weight:bold;font-size:20px;">ADD MOBILE(S):</p>
				<table style="width:100%;font-weight:600;" class="table-dashed">
					<tr><td style="width:50%">Display:</td><td style="width:50%;"><?=$display;?>"</td></tr>
					<tr><td>Battery:</td><td><?=$battry;?> mAh</td></tr>
					<tr><td>OS:</td><td><?=$os;?></td></tr>
					<tr><td>RAM:</td><td><?=$ram;?> GB</td></tr>
					<tr><td>ROM:</td><td><?=$rom;?> GB</td></tr>
					<tr><td>Front Camera:</td><td><?=$fcame;?> MP</td></tr>
					<tr><td>Rear Camera:</td><td><?=$bcame;?> MP</td></tr>
					</table>
			</div>
		</div>


