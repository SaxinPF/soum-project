﻿<?php include('../config2.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<meta content="Materia - Admin Template" name="description">
<meta content="materia, webapp, admin, dashboard, template, ui" name="keywords">
<meta content="solutionportal" name="author">
<!-- <base href="/"> -->
<title>Admin Dashboard</title>
<!-- Icons -->
<link href="fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Plugins -->
<link href="styles/plugins/waves.css" rel="stylesheet">
<link href="styles/plugins/perfect-scrollbar.css" rel="stylesheet">
<link href="styles/plugins/select2.css" rel="stylesheet">
<link href="styles/plugins/bootstrap-colorpicker.css" rel="stylesheet">
<link href="styles/plugins/bootstrap-slider.css" rel="stylesheet">
<link href="styles/plugins/bootstrap-datepicker.css" rel="stylesheet">
<link href="styles/plugins/summernote.css" rel="stylesheet">
<!-- Css/Less Stylesheets -->
<link href="styles/bootstrap.min.css" rel="stylesheet">
<link href="styles/main.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel="stylesheet" type="text/css">
<!-- Match Media polyfill for IE9 --><!--[if IE 9]>
<script src="scripts/ie/matchMedia.js"></script>
<![endif]-->
<style>
.form-control {
    border: 1px solid#ddd;
}
tr{
	height: 63px;
}
.cls-create-btn {
	background-color: #d2caca !important;
 }
.link {
    padding: 5px 8px;
    border-radius: 2px;
    margin-left: 5px;
    background-color: #787878;
    border-color: #898989;
    color: #fff;
}
.select-wrapper {
    background: url('../images/plus-icon.png') no-repeat;
    background-size: 31px 30px;
    background-position: center center;
    display: block;
	position: relative;
	width: 100%;
	height: 80px;
	border: 1px dashed#ddd;
	position: relative;
}
#fileToUpload1 {
	width: 26px;
	height: 26px;
	opacity: 0;
	filter: alpha(opacity=0); /* IE 5-7 */
}
#list-1 td {
	padding: 5px;
}
.cls-hold{
	background-color: #f79859 !important;
	padding: 6px !important;
}


.popup {
    position: fixed;
    top: 25%;
    left: 25%;
    width: 40%;
    height: 40%;
    background-color: rgba(0,0,0,0.5);
    display: none;
    justify-content: center;
    align-items: center;
}

.popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
}
.close-button{

    background-color: #eb530f;
    float: right;
    color: #fff;
    line-height: 27px;
    font-size: 34px;

}

.datepicker table tr {

    height: 5px;

}


</style>
<script src="scripts/jquery.min.js"></script>
</head>

<body id="app" class="app off-canvas">

<!-- #Start header --><?php include('_header.php');?>
<!-- #end header -->
<!-- main-container -->
<div class="main-container clearfix">
	<!-- main-navigation --><?php include('_left-menu.php');?>
	<!-- #end main-navigation -->
	<!-- content-here -->
	<div id="content" class="content-container">
		<!-- dashboard page -->
		<div class="page page-dashboard">
			<div class="page-wrap">
				<div class="row">
					<!-- dashboard header -->
					<div class="col-md-12" style="margin-top: 20px;">
						<div class="dash-head clearfix mb20">
							<div class="left">
								<h3 style="margin-top:5px;">Stock Reports</h3>
							</div>
                            <div>

        					</div>
						</div>
					</div>
				</div>

				<div class="row">
					<!-- dashboard header -->

<?php $conds='';
$conds_two='';
$search = $_REQUEST['search'];
$order_cond = 'ASC, date_d DESC';


$sorting =  $_REQUEST['sorting'];
$on 	 =	$_REQUEST['searchon'];
/*if($search!=''){
    $conds="having UPPER(phone1)=UPPER('$search')";
}*/


if($sorting != ''){


 if($sorting == 'asc'){
 		$order_cond = 'ASC, date_d ASC';
 }
 if($sorting == 'desc'){
 		$order_cond = 'ASC, date_d DESC';
 }
}
if($search!='')
{

   if($on==1)
 {
  // $conds_two="having UPPER(phone1)=UPPER('$search')";
   $conds_two ="having phone1 like '%$search%'";
 }
if($on==2)
 {
   $conds="and imi_no = '$search'";
 }
}

?>
                <div class="col-md-12">
					<div class="dash-head clearfix mb20" style="min-height: 450px;">
								<table style="width:auto;float:right;">

                                    	<tr><form method="get">
                                    		<td>
                                    			 <select name="sorting" class="form-control" id="sorting">
                                    			 <option>Order By Bate</option>
												 <option value="asc" <?php if($order==asc) echo "Selected";?>>Ascending</option>
												<option value="desc" <?php if($order==desc) echo "Selected";?>>descending</option>
                                                </select>
                                    		</td>
                                    		<td style="padding-right:5px;">
									          <select name="searchon" class="form-control" id="searchon">
												<!-- <option value="1" <?php if($on==1) echo "Selected";?>>Brand & Model</option>-->
												 <option value="1" <?php if($on==1) echo "Selected";?>>Brand Name</option>
												<option value="2" <?php if($on==2) echo "Selected";?>>IMEI</option>
                                                </select>
										</td>
										<td style="padding-right:5px;">
										<input name="search" type="text" id="locations" class="form-control searchfield" value="<?=$search;?>"/></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td>
										</form></tr>
								            </table>
							<div class="clearfix tabs-fill">
								<ul class="nav nav-tabs">
									<li class="active">
									<a data-toggle="tab" href="#tab-flip-tab0-1">
									Phone List </a></li>
								</ul>
								<div class="tab-content" style="display: inline-block; width: 100%;">
									<div id="tab-flip-tab0-1" class="tab-pane active col-md-12" style="overflow: hidden">
										<div class="clearfix">
										<div class="col-md-12 table-responsive" style="padding:0px;">
											<table id="list-1" class="table table-bordered invoice-table mb30" style="margin-bottom:15px;">
												<thead>
													<tr style="background: #38b4ee; color: #fff; font-size: 14px;">
														<th style="padding: 2px;">SNo.</th>
													    <th style="padding: 2px;" width="30%;">Brand Model(Color)</th>
														<th style="padding: 2px;text-align:right;">Stock</th>
														<th style="padding: 2px;text-align:right;">IMEI</th>
														<th style="padding: 2px;text-align:right;">Purchase</th>
														<th style="padding: 2px;text-align:right;">Purchase Date</th>
														<th></th>
															<th style="width:10%"></th>
															<th style="padding: 2px;" width="20%">Hold Data</th>
														<!-- <th style="padding: 2px;text-align:right;">Sales</th>
                                                      <th style="padding: 2px;text-align:right;">Profit</th> -->
													</tr>
												</thead>
                                      <?php

									 // $qry = "select	*,sum(soum_receipt_note.quantity)current_stock,sum(soum_receipt_note.price)expenses,soum_receipt_note.colour as color2,soum_prod_subcat.prod_subcat_desc brand_name,soum_prod_subsubcat.prod_subcat_desc model_name,soum_colors.title color_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_receipt_note,soum_prod_subsubcat,soum_prod_subcat,soum_colors
									 //   where soum_receipt_note.model=soum_prod_subsubcat.prod_subsubcat_id
									 //   and soum_receipt_note.brand=soum_prod_subcat.prod_subcat_id
									 //   and soum_receipt_note.colour =soum_colors.id ". $conds."
									 //   group by soum_receipt_note.brand,soum_receipt_note.model,soum_receipt_note.colour ".$conds_two." order by soum_prod_subcat.prod_subcat_desc ".$order_cond;

                                      /* $qry = " select *,soum_receipt_note.quantity as current_stock,soum_receipt_note.price as expenses,soum_receipt_note.colour as color2,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc as model_name,soum_colors.title as color_name,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_receipt_note,soum_prod_subsubcat,soum_prod_subcat,soum_colors
									   where soum_receipt_note.model=soum_prod_subsubcat.prod_subsubcat_id
									   and soum_receipt_note.brand=soum_prod_subcat.prod_subcat_id
									   and soum_receipt_note.colour =soum_colors.id ". $conds."
									   group by soum_receipt_note.brand,soum_receipt_note.model,soum_receipt_note.colour ".$conds_two." order by soum_prod_subcat.prod_subcat_desc ".$order_cond;*/

									   $qry = "select *,soum_receipt_note.quantity as current_stock,soum_receipt_note.price as expenses,soum_receipt_note.colour as color2,soum_prod_subcat.prod_subcat_desc as brand_name,soum_prod_subsubcat.prod_subcat_desc as model_name,soum_colors.title as color_name, concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc ) phone1 from soum_receipt_note,soum_prod_subsubcat,soum_prod_subcat,soum_colors where soum_receipt_note.model=soum_prod_subsubcat.prod_subsubcat_id and soum_receipt_note.brand=soum_prod_subcat.prod_subcat_id and soum_receipt_note.colour =soum_colors.id ". $conds ." ". $conds_two ." order by soum_prod_subcat.prod_subcat_desc ".$order_cond; ".$order_cond ;
									  //  and soum_receipt_note.brand = 30 and soum_receipt_note.model =810;";

									//echo $qry;
									   $res=$db->query($qry);
									   $i=0;
									   $tot=0;
									   $grand_tot=0;
									   while($row=$res->fetch_assoc())
									   {
                                        //echo '<pre>';
										//print_r($row);
										   $i++;

										    /*$qry1 = "select soum_bill_of_supply.quantity as quantity,sum(soum_bill_of_supply.net_banking)net_banking,sum(soum_bill_of_supply.mobile_wallet )mobile_wallet ,sum(soum_bill_of_supply.cash)cash,sum(soum_bill_of_supply.bank_cards)bank_cards from soum_bill_of_supply
										   where soum_bill_of_supply.model=".$row['model']."
										   and soum_bill_of_supply.brand=".$row['brand']."
										   and soum_bill_of_supply.colour=".$row['color2']." and soum_bill_of_supply.r_status = 'no'";*/

										   $qry1 = "select imi_no,quantity from soum_bill_of_supply
										   where soum_bill_of_supply.imi_no=".$row['imi_no']."
										   and soum_bill_of_supply.r_status = 'no'";

											// echo $qry1;exit;
										   $res1=$db->query($qry1);
										   $sub_qty = 0;
										   if(mysqli_num_rows($res1)>0){
											while($row11=$res1->fetch_assoc())
											{
												$pricesale  =  $row11['net_banking']+$row11['bank_cards']+$row11['cash']+$row11['mobile_wallet'];
											     $sub_qty = $row11['quantity'];
											}

										}
											$date_d =$row['date_d'];
											$date_d= date("d-m-Y",$date_d);
									   ?>
											<tr id="raw-<?=$i;?>">
											   <td><?=$i;?></td>
											   <td><?=$row['brand_name'];?> <?=$row['model_name'];?> (<?=$row['color_name'];?>)</td>
											   <td class="auto-style1" style="padding: 2px;text-align:right;"><?=$row['quantity'] - $sub_qty;?><?php //echo $row['current_stock']?><?php //echo $sub_qty; ?></td>
											   <td><?=$row['imi_no'];?></td>
											   <td class="auto-style1" style="padding: 2px;text-align:right;"><?=$row['expenses'];?></td>
											   <td><?=$date_d;?></td>
											   <!-- <td class="auto-style1" style="padding: 2px;text-align:right;"><?php // echo $pricesale;?></td>
                                               <td class="auto-style1" style="padding: 2px;text-align:right;"><?php //echo $pricesale-$row['expenses'];?></td> -->

                                               <td>
                                               	 <?php if($sub_qty == 0 ){?>
                                    <a href="bill_of_supply.php?act=add"><button class="link bill_button btn-primary">Create Bill</button></a>
                                               <?php } ?></td>

                                               <?php

                                               	 $qur4 = "select * from soum_stock_holder_data
										  			 where soum_stock_holder_data.imi_no=".$row['imi_no'];

														 $res4=$db->query($qur4);
													   $sub_qty = 0;

													    if(mysqli_num_rows($res4)>0){

                                                ?>

                                                <td><button class="link hold_button btn-primary">Unhold</button></td>

                                       <?php   }else{
                                       	?>
                                       		 <td><button data-rowid="<?php echo $i;?>" class="link hold_button btn-primary">Hold</button></td>
                                       	<?php
                                       }

											 if(mysqli_num_rows($res4)>0){

											 	while($row44=$res4->fetch_assoc())
											{
										?>
                                                <td id="holdresponse-<?php echo $i;?>">
                                                	Name: <?php echo $row44['name'];?><br>
                                                	Date: <?php echo $row44['date']; ?>
                                                </td>
                                            		<?php } }else{ ?>

                                            			 <td id="holdresponse-<?php echo $i;?>"></td>
                                            		<?php } ?>
											</tr>
								   <?php
								   }?>
								</table>
							</div>
						</div>
									</div>
								</div>
							</div>



						</div>
					</div>
					<div id="hold-popup" class="popup" data-rowid="">
						 <button class="close-button">&times;</button>
						  <div class="popup-content">
						    <h3>Enter hold details:</h3>

						    <form method="post" id="hold-form" action="hold_process.php">
						      <div class="form-group">
						        <label for="stockholdername">Name:</label>
						        <input type="text" id="stockholdername" name="stockholdername" class="form-control" required>
						      </div>
						      <div class="form-group">
						        <label for="stockholderdate">Date:</label>
						        <input type="text" id="datepickerDemo113" name="stockholderdate" class="form-control datepicker" required>
						        <input type="hidden" name="stockholderimei" id="stockholderimei" value="">

						      </div>
						      <button type="submit" class="btn btn-primary">Save Data</button>
						    </form>
						  </div>
					</div>
				</div>
			</div>
			<!-- #end page-wrap --></div>
		<!-- #end dashboard page --></div>
</div>
<!-- #end main-container -->
<!-- theme settings -->
<div class="site-settings clearfix hidden-xs">
	<div class="settings clearfix">
		<div class="trigger ion ion-settings left">
		</div>
		<div class="wrapper left">
			<ul class="list-unstyled other-settings">
				<li class="clearfix mb10">
				<div class="left small">
					av Horizontal</div>
				<div class="md-switch right">
					<label><input id="navHorizontal" type="checkbox"> <span>&nbsp;</span>
					</label></div>
				</li>
				<li class="clearfix mb10">
				<div class="left small">
					Fixed Header</div>
				<div class="md-switch right">
					<label><input id="fixedHeader" type="checkbox"> <span>&nbsp;</span>
					</label></div>
				</li>
				<li class="clearfix mb10">
				<div class="left small">
					av Full</div>
				<div class="md-switch right">
					<label><input id="navFull" type="checkbox"> <span>&nbsp;</span>
					</label></div>
				</li>
			</ul>
			<hr />
			<ul id="themeColor" class="themes list-unstyled">
				<li class="active" data-theme="theme-zero"></li>
				<li data-theme="theme-one"></li>
				<li data-theme="theme-two"></li>
				<li data-theme="theme-three"></li>
				<li data-theme="theme-four"></li>
				<li data-theme="theme-five"></li>
				<li data-theme="theme-six"></li>
				<li data-theme="theme-seven"></li>
			</ul>
		</div>
	</div>
</div>


<!-- #end theme settings -->
<!-- Dev only -->
<!-- Vendors -->
<script src="scripts/vendors.js"></script>
<script src="scripts/plugins/screenfull.js"></script>
<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
<script src="scripts/plugins/waves.min.js"></script>
<script src="scripts/plugins/select2.min.js"></script>
<script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
<script src="scripts/plugins/bootstrap-slider.min.js"></script>
<script src="scripts/plugins/summernote.min.js"></script>
<script src="scripts/plugins/bootstrap-datepicker.min.js"></script>
<script src="scripts/app.js"></script>
<!--<script src="scripts/form-elements.init.js"></script>-->
<script>
$(document).ready(function(){
var name ='';
var date ='';
	$(document).ready(function() {
  // Submit the form using AJAX
  $('#hold-form').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission
    var rowId = $('#hold-popup').data('rowid');
    $.ajax({
      url: 'hold_process.php', // URL of the PHP script that handles the form submission
      method: 'POST', // HTTP method
       dataType:'JSON',
      data: $('#hold-form').serialize(), // Form data
      success: function(response) {

      //	console.log(response.name);
        // Handle the successful AJAX request

         console.log(response.name);
      name = response.name;
 		date = response.date;

        $('#hold-popup').hide();
          $('#holdresponse-' + rowId ).html('Name: ' + name + '<br>Date: ' + date);
           $('#hold-popup').attr('data-rowid', '');

      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle the AJAX request error
        console.log(textStatus + ': ' + errorThrown); // Log the error to the console
      }
    });
  });
});


    jQuery('.bill_button').hover(function()
    {
      jQuery(this).closest('tr').addClass('cls-create-btn');
    },
    function()
    {
      jQuery(this).closest('tr').removeClass('cls-create-btn');
    }
    );
});


$(document).ready(function(){

    jQuery('.hold_button').click(function()
    {

    	 var imei = $(this).closest('tr').find('td:eq(3)').text();

    	 var rowId = $(this).data('rowid');
	   		 if ($(this).text() === "Hold") {
	   		 $('#hold-popup').data('rowid', rowId);
		  		  $('#hold-popup').show();
		  		}else{
		  			  var lsttt = $(this).closest('tr').find('td:last');
    					lsttt.html(''); // Clear the HTML content of the last td element
		  				 $.ajax({
						        url: 'delete_hold_data.php',
						        method: 'POST',
						        data: { imei: imei },
						        success: function(response) {
						          // Handle the successful AJAX request
						          console.log(response);
						        },
						        error: function(jqXHR, textStatus, errorThrown) {
						          // Handle the AJAX request error
						          console.log(textStatus + ': ' + errorThrown);
						        }
						      });


		  		}
		     // jQuery(this).closest('tr').toggleClass('cls-hold');
		       jQuery(this).text(function(i, text){
		          return text === "Hold" ? "Unhold" : "Hold";
		      });

		        var lastTd = jQuery(this).closest('tr').find('td:last');
		  		lastTd.toggleClass('clslasttd');

		  		 var imei = $(this).closest('tr').find('td:eq(3)').text();
		  		 $('#stockholderimei').val(imei);


	});
	 $('#hold-popup .close-button').click(function() {

    	$('#hold-popup').hide();
  });

	  $('#datepickerDemo113').datepicker({
  		  dateFormat: 'dd/mm/yy'
  		});
});
</script>
</body>
</html>
