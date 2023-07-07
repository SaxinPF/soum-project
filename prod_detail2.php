<?php 
include('config.php');
$id=$_REQUEST['id'];
?>
<div class="col-sm-4">
	<p>Display:</p>
</div>
<div class="col-sm-8">
    <input name="display" id="display" class="form-control"  type="text">
</div>
<div class="col-sm-4">
	<p>Processor:</p>
</div>
<div class="col-sm-8">
    <input name="process" id="process" class="form-control"  type="text">
</div>
<div class="col-sm-4">
    <p>Battery:</p>
</div>
<div class="col-sm-8">
    <input name="battry" id="battry" class="form-control"  type="text">
</div>
<div class="col-sm-4">
	<p>OS:</p>
</div>
<div class="col-sm-8">
    <input name="os" id="os" class="form-control"  type="text">
</div>
<div class="col-sm-4">
	<p>ROM:</p>
</div>
<div class="col-sm-8">
    <input name="rom" id="rom" class="form-control"  type="text">
</div>
<div class="col-sm-4">
	<p>RAM:</p>
</div>
<div class="col-sm-8">
    <input name="ram" id="ram" class="form-control"  type="text">
</div>
<div class="col-sm-4">
	<p>Front Camera:</p>
</div>
<div class="col-sm-8">
    <input name="fcame" id="fcame" class="form-control"  type="text">
</div>
<div class="col-sm-4">
	<p>Back Camera:</p>
</div>
<div class="col-sm-8">
    <input name="bcame" id="bcame"  class="form-control"  type="text">
</div>
<div class="col-sm-4">
	<p>Colors :</p>
</div>
<div class="col-sm-8">
    <input name="color" id="color" class="form-control"  type="text">
</div>
<div class="col-sm-4">
	<p>Sim Type :</p>
</div>
<div class="col-sm-8">
    <select name="sim_type" class="form-control" >
	<option value="1">Single</option>
	<option value="2">Duel</option>
	</select>
</div>
<?php
$sqlb="select * from soum_prod_subcat where prod_subcat_id=$id";
$resb=$db->query($sqlb);
$rowb=$resb->fetch_assoc();
$logo=$rowb['logo'];
if($id<1)
{
?>
<div class="col-md-4" style="padding-left:0px;overflow: hidden;margin-bottom:10px;">
	<span class="select-img1" style="background: rgb(195, 195, 195,0.3);width:200px;float: left;z-index: 9;height: 80px;text-align:center;background-size:100px auto;background-repeat:no-repeat;background-position:center center;"><img src="upload/thumb/no_img.png" id="previewing7" style="height:80px;width: auto;margin: auto;float: none;"/></span><span class="select-wrapper"><input name="fileToUpload7" id="fileToUpload7" onchange="abc(this,7);" class="btn btn-default" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;"></span>
	<p style="margin:0px;text-align:center;"><label style="margin-top:0px;">Brand</label></p>
</div>
<?php } ?>
<div class="col-md-4" style="padding-left:0px;overflow: hidden;margin-bottom:10px;">
	<span class="select-img1" style="background: rgb(195, 195, 195,0.3);width:200px;float: left;z-index: 9;height: 80px;text-align:center;background-size:100px auto;background-repeat:no-repeat;background-position:center center;"><img src="upload/thumb/no_img.png" id="previewing8" style="height:80px;width: auto;margin: auto;float: none;"/></span><span class="select-wrapper"><input name="fileToUpload8" id="fileToUpload8" onchange="abc(this,8);" class="btn btn-default" type="file" style="width:100%;margin-bottom:13px;text-align:left;padding:20px 5px;border: 1px dashed #c5d7b5;height:auto;"></span>
	<p style="margin:0px;text-align:center;"><label style="margin-top:0px;">Model</label></p>
</div>
	                            
	                        
