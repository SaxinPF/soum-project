
<?php

	include('config.php');	
	$count 	=  $_REQUEST['paramquantity'];
	if($_REQUEST['paramquantity'] > 1){

		
		$repeat_ajax_sec = '';
			for ($j = 2; $j <= $count; $j++) {
		 		 
		 		  $repeat_ajax_sec .= '<div id="repeat_sec'.$j.'"><div class="col-md-3" style="margin-bottom:10px;"><div style="width: 100%;margin-bottom: 8px;"><p  style="margin: 0px; width: 100%; float: left;"><label>Brand <span class="red-text">*</span></label></p><select class="form-control" name="drpBrand'.$j.'" onchange="fill2(this.value,\'\','.$j.')" style="width: 100%;" required><option selected="selected" value="">--Select Brand--</option>';
 					$sql="select * from soum_prod_subcat order by prod_subcat_id desc";
						  $res=$db->query($sql);

							  while($row=$res->fetch_assoc())
											  { 
											  
											 $repeat_ajax_sec .= '<option value="'.$row['prod_subcat_id'].'">';
											 
											$repeat_ajax_sec .= $row['prod_subcat_desc'];
											 $repeat_ajax_sec .= '</option>';  	
											  
												 }
		 		$repeat_ajax_sec .=   '</select></div>';

		 $repeat_ajax_sec .= '</div><div id="modeldiv'.$j.'" class="col-md-3" style="margin-bottom:10px;">
											<div style="width: 100%;margin-bottom: 8px;"><p id="remove'.$j.'" style="margin: 0px; width: 100%; float: left;"><label>Model <span class="red-text">*</span></label></p><select id="soum_prod_subsubcat'.$j.'" class="form-control" name="drpModel'.$j.'"  onchange="get_color(this.value,\'\','.$j.')"  style="width: 100%;" required><option selected="selected" value="">--Select Model--</option></select> </div></div>   <div class="col-md-3" id="oomodel'.$j.'" style="margin-bottom:10px;display:none;"><div style="width: 100%;"><p  style="margin: 0px;"><label>Other Model <span class="red-text">*</span></label></p><input id="other_model'.$j.'" class="form-control" name="other_model'.$j.'"  type="text" value=""/></div>	</div>';
											$repeat_ajax_sec .= '<div class="col-md-3"><label class="control-label">Colour</label><select class="form-control minimal" name="colour'.$j.'" id="colour'.$j.'" ><option value="">Select</option>
											</select>
									</div>';

											$repeat_ajax_sec .= ' <div class="col-md-3"><label class="control-label">ROM</label><select class="form-control minimal" name="rom'.$j.'" id="rom'.$j.'"><option value="">--Select ROM--</option><option value="16">16</option><option value="32">32</option><option value="64">64</option><option value="128">128</option><option value="256">256</option><option value="512">512</option></select></div><div class="col-md-12" style="margin-bottom: 10px">	<div style="width: 100%;"><p  style="margin: 0px;"><label>IMEI<span class="red-text">*</span></label></p><input type="text" name="imi_no'.$j.'" value="" id="txt_imi_no'.$j.'" class="form-control" required Placeholder="Enter IMEI number"/></div>';

		 		$repeat_ajax_sec .= '</div></div>';
										
			}
			echo $repeat_ajax_sec;
				

	}
?>
