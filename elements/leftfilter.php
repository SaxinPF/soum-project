 <?php  $brand_model_name       =   $_REQUEST['brand_model_name'];
        $brand_product_name     =   $_REQUEST['brand_product_name'];
        $brand_cls_name 			 = $_REQUEST['brand_cls_name'];
        //$category_type  =   $_REQUEST['category_type'];

        $url = $_SERVER['REQUEST_URI'];

			if (strpos($url, 'second-hand-phone-jaipur') !== false) {
			    $prod_cat_id = 2;
			} else {
			    $prod_cat_id = 1;
			}
 ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <form method="get" id="searchFormn">
  <div class="mainhead ">
<div class="filter">
  <div class="container form-inline" >
        <div class="col-sm-8">
         <?php if($set_var_modal=='Yes'){ ?>
               <!--    <input name="brand_model_name" style="width:100%!important;" type="text" value="<?php echo $brand_model_name ?>" class="form-control" id="brand_model_name" placeholder="Type your respective brand or product here"> -->

                  <select name="brand_model_name" id="brand_model_name" onchange="fill2(this.value);" style="width: 150px; text-align: center;">
                  	<option>Select Brand</option>
                  	<?php
                  		//	 $sql = "select * from soum_prod_subcat  ";

                  			// $sql = "select * FROM soum_prod_subcat where prod_subcat_id IN (10,14,16,22,29,30,62,63,111)";


  								$sql = "SELECT * FROM soum_prod_subcat WHERE prod_subcat_id IN (SELECT DISTINCT brand FROM soum_product_master WHERE `category_type`='phone' AND `prod_cat_id`='$prod_cat_id' AND modal IN ( SELECT prod_subsubcat_id FROM soum_prod_subsubcat)) ";



    											  $resb=$db->query($sql);
															  while($brandrow = $resb->fetch_assoc())
															  {
															  	?>

															  			<option value="<?php echo $brandrow['prod_subcat_id'];?>" <?php if($brandrow['prod_subcat_id']==$brand_model_name) echo "selected";?>><?php echo $brandrow['prod_subcat_desc'];?></option>
															  	<?php
															  }
                  	?>
                  </select>
                   <select id="soum_prod_subsubcat" name="brand_cls_name" style="margin-left:10px;width: 150px; text-align: center;">

                  	<?php if($brand_cls_name != ''){


                  		/*$getmodl =  "select temp.*,soum_prod_subcat.prod_subcat_desc brandName from (select * from soum_prod_subsubcat where 1=1 and( prod_subsubcat_id=".$brand_cls_name." )) temp
	left outer join soum_prod_subcat
    on temp.prod_subcat_id=soum_prod_subcat.prod_subcat_id"; */


$getmodl = "SELECT * FROM soum_prod_subsubcat WHERE prod_subsubcat_id IN (SELECT DISTINCT modal FROM soum_product_master WHERE `category_type`='phone' AND `prod_cat_id`='$prod_cat_id' AND `brand`='$brand_model_name')";
$getBrand = "SELECT * FROM `soum_prod_subcat` WHERE `prod_subcat_id`='$brand_model_name'";
$getBrandName=$db->query($getBrand);
$getBrandRow = $getBrandName->fetch_assoc();
                      //echo $getmodl;exit;
                  		     		$resbm=$db->query($getmodl);
															  while($brandrowm = $resbm->fetch_assoc())
															  {
															  	?>
															  			<option value="<?php echo $brandrowm['prod_subsubcat_id'];?>" <?php if($brandrowm['prod_subsubcat_id']==$brand_cls_name) echo "selected" ;?> ><?=$getBrandRow['prod_subcat_desc']." ".$brandrowm['prod_subcat_desc'];?></option>
															  	<?php

															  }

                       	}else{?>

                       		<option value=""> Select Model</option>
                       	<?php } ?>

                  </select>

          <?php }else{ ?>
              <input name="brand_product_name" style="width:100%!important;" type="text" value="<?php echo $brand_product_name ?>" class="form-control" id="brand_product_name" placeholder="Type your respective brand or product here ">
    	 <?php   } ?>
</div>
 <div class="col-sm-4">
    	 <input name="Submit2"  type="submit" value="Search" class="btn btn-info"/>

		<!-- <a href="https://www.soum.co.in/second-hand-phone-jaipur" class="btn btn-info">Clear</a> -->
		<a href="javascript:void(0)" class="btn btn-info" onclick="window.location.href=window.location.href.split('?')[0]">Clear</a>

		</div>


	</div>
</div>
<br>
	<div class="filter2">
	      <div class="container form-inline">
		    <div class="form-group">
				  <label for="">Price Range </label>
				  <input  type="text" value="<?=$_REQUEST['min'];?>" class="form-control" id="" placeholder="Mini">
				  <label for="">to</label>
				   <input  value="<?=$_REQUEST['max'];?>" type="text" class="form-control" id="" placeholder="Max">

					  <?php
				   $checked='';
				   if(isset($_REQUEST['assure']) && $_REQUEST['assure']=='on')
				   {
					  $checked='checked="checked"';
				   } ?>

          </div>

		  	 	<input name="Submit1" type="submit" value="Search" id="triggerid" class="btn btn-info"/>

			        <input type="checkbox" style="margin-left:10px;" name="assure" class="assure" <?php echo $checked; ?> onclick="$('#triggerid').trigger('click');"><img style="width: 10%;padding-left:10px;" src="img/approved.png" alt=""/>


        </div>
    </div>

  </div>
</form>

<script>


function fill2(p)
{
	fill(p);
}
function fill(bid)
{


 $('#brand_loader').hide();
 $('#name_loader2').html("<img src='upload/loader.gif' width='30' height='30'>");


var currentUrl = window.location.href;
var phonecondition;

  // Check if the URL contains "new-phone-jaipur"
  if (currentUrl.includes("new-phone-jaipur")) {
    // Set the hidden input value to "new"
    var phonecondition = 1;
  }

   if (currentUrl.includes("second-hand-phone-jaipur")) {
    // Set the hidden input value to "used"
  	 var phonecondition = 2;
  }
  var category_type =  'phone';//document.getElementById("category_type").value;


  	 var url = "fill5.php?param=" + bid +"&phonecondition="+phonecondition + "&category_type=" + category_type + "&timestamp=" + Date.now();

	$.ajax({
		type:"Post",
		 url: url,
		success:function(html)
		{
		       $('#name_loader2').html("");
               $('#brand_loader').show();

			$("#soum_prod_subsubcat").html(html);
		},
		 error: function(xhr, status, error) {
    	console.log("Error: " + error);
    }
	});
}

function modal1(item)
{
    var val=item;
     var b=$("#soum_prod_subcat").val();
     //alert("brand="+b+"&model"+val);
       $.ajax({

           type:"POST",
           url:"instock.php",
           data:"brand="+b+"&model="+val,

           success:function(data)
           {
            $("#dtl").html(data);
           }

       });


}

</script>

