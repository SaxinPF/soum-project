<?php include('../config2.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- <base href="/"> -->
    <title>Admin Dashboard</title>

    <!-- Icons -->
        <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="styles/plugins/waves.css">
    <link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">
    <link rel="stylesheet" href="styles/plugins/select2.css">
    <link rel="stylesheet" href="styles/plugins/bootstrap-colorpicker.css">
    <link rel="stylesheet" href="styles/plugins/bootstrap-slider.css">
    <link rel="stylesheet" href="styles/plugins/bootstrap-datepicker.css">
    <link rel="stylesheet" href="styles/plugins/summernote.css">

    <!-- Css/Less Stylesheets -->
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/main.min.css">

     <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]-->
	<style>
	.form-control {
	border:1px solid#ddd;
}
.link {
    padding: 5px 8px;
    border-radius: 2px;
    margin-left: 5px;
    background-color: #787878;
    border-color: #898989;
    color: #fff;
}
#list-1 th{
	border:1px solid#ddd;
}
	.auto-style2 {
		border: 1px solid #898989;
	}
	.auto-style4 {
		text-align: left;
		font-size: 13px;
		border:1px solid#ddd;
	}
.select-wrapper {
  background:url('../images/plus-icon.png') no-repeat;
  background-size:25px 25px;
  background-position:center center;
	display: block;
	position: relative;
	width: 100%;
	height: 80px;

	position:relative;
}
#fileToUpload1 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload2 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload3 , #fileToUpload4{
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload5 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload6 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload7 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#fileToUpload8 {
  width: 26px;
  height: 26px;
  opacity: 0;
  filter: alpha(opacity=0); /* IE 5-7 */
}
#previewing7 , #previewing1 , #previewing2 , #previewing3 , #previewing4 , #previewing5 , #previewing6 , #previewing8{
width:auto;
}
.filedivcls {
background: #ffffff;
}

	.auto-style5 {
		border: 1px solid #000000;
	}
	.auto-style6 {
		border-collapse: collapse;
	}
	</style>
		<script src="scripts/jquery.min.js"></script>

</head>
<body id="app" class="app off-canvas">

<?php
$search=$_REQUEST['search'];
$on=$_REQUEST['searchon'];
$cond='';
if($search!='')
{
 if($on==1)
 {
  //$conds="where 1=1 and concat(code,prod_subcat_desc,fname,mobile) like '%$search%'";
    $conds="having UPPER(phone1) like UPPER('%$search%')";
 }
 if($on==2)
 {
  $cond.="and soum_product_master.modal_name like '%$search%'";
 }
 if($on==3)
 {
   $cond.="and soum_product_master.seller_phone like '%$search%'";
 }
}
?>


	<!-- #Start header -->
		<?php include('_header.php');?>
	<!-- #end header -->
	<!-- main-container -->
	<div class="main-container clearfix">
		<!-- main-navigation -->
		<?php include('_left-menu.php');?>
		<!-- #end main-navigation -->
		<!-- content-here -->
		<div class="content-container" id="content">
			<!-- dashboard page -->
			<div class="page page-dashboard">
				<div class="page-wrap">
					<div class="row">
						<!-- dashboard header -->
						<div class="col-md-12" style="margin-top:30px;">
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light"><a name="top">Admin Advertisement(Watches)</a></h4>
								</div>
                                <div>
                                <a class="btn btn-primary mr5 waves-effect" href="admin_adv_watches.php?act=add" style="margin:0px;padding:6px 80px;float:right;">Add new</a>
                                </div>
							</div>
						</div>
					</div>

                  <?php include('admin_adv_ele_watches.php');?>

					<!-- #end row -->
					<div class="row">
						<div class="col-md-12">

					<div class="clearfix tabs-fill">


								<table style="width:auto;float:right;">
								<tr><form method="get"><td style="padding-right:5px;">
									          <select name="searchon" class="form-control" id="searchon" onchange="searchfun(this.value)">
												<option value="1" <?php if($on==1) echo "Selected";?>>Brand</option>
												<option value="2" <?php if($on==2) echo "Selected";?>>Model Name</option>
												<!--<option value="3" <?php if($on==3) echo "Selected";?>>Mobile</option>-->
											  </select>
										</td>
										<td style="padding-right:5px;">
										<input id="locations" class="form-control searchfield" name="search" type="text" value="<?=$search;?>"></td><td><button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect">Search</button></td></form></tr>

								</table>

								<ul class="nav nav-tabs">
									<!--<li ><a href="#tab-flip-one-1" data-toggle="tab">New Ad(Pending) <span id="acount">&nbsp; ( 0 )</span></a></li>-->
									<li class="active" ><a href="#tab-flip-three-1" data-toggle="tab">Approved <span id="dcount">&nbsp; ( 0 )</span></a></li>
								</ul>

								<div class="tab-content table-responsive">
									<div class="tab-pane" id="tab-flip-one-1">
									<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background:#4a9de4;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Token Id</th>
											<th style="padding:5px;">DTTM</th>
											<!--<th style="padding:5px;">Name</th>
											<th style="padding:5px;">Phone No.</th>-->
											<th style="padding:5px;">Brand</th>
											<th style="padding:5px;">Model</th>
											<th style="padding:5px;">Expected Price</th>
											<th style="padding: 5px;width:250px;">
											   <span>Action</span>

											</th>
										</tr>
									</thead>
									<tbody>
									<?php
									//$type=$_REQUEST['type'];
									$type = 'Admin';

									if($type!='')
									{
								    $cond.=" and soum_product_master.poster_type='$type' and soum_product_master.trash!='delete' and soum_product_master.category_type='watches'";
									}

									  $sql="select *,prod_subcat_desc as phone1 from (
select *,
if(poster_type='Dealer',
		(select fname from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select fname from soum_master_customer where cust_id=temp1.poster_id),'Admin')) fname,

	if(poster_type='Dealer',
		(select mobile from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=temp1.poster_id),'Admin')) mobile
 from (select   temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
										select * from (
										select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal,soum_product_master.imei_no,soum_product_master.rom,soum_product_master.ram2,soum_product_master.images2,soum_product_master.bill_img,soum_product_master.add_proof_img,soum_product_master.images1,soum_product_master.images,soum_product_master.sell_letter,soum_product_master.swap_letter,soum_product_master.seller_name,soum_product_master.seller_email,soum_product_master.seller_phone,soum_product_master.color_id,soum_product_master.seller_address,soum_product_master.seller_city,soum_product_master.yearbyadmin,soum_product_master.condi,soum_product_master.active,soum_product_master.modal_name
										,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where active=0 $cond) prod
										left outer join soum_prod_subcat
										on prod.brand=soum_prod_subcat.prod_subcat_id)temp
										left outer join soum_prod_subsubcat
										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id
) temp1
)tmep2 ".$conds." order by prod_id desc";
								//	  echo $sql;
								//	  die();
										$i=1;
									  $res=$db->query($sql);
									  $acount=mysqli_num_rows($res);


									  while($row=$res->fetch_assoc())
									  {
								/* 	  echo '<pre>';
									  print_r($row); */


									    $originalDate =$row['post_date'];
										$post_dt= date("d-m-Y h:i A", strtotime($originalDate));
										$time= date("h:i A", strtotime($originalDate));

									?>
										<tr>
											<td><?=$i++;?></td>
											<td><?=$row['code'];?></td>
											<td><?=$post_dt;?></td>
											<!--<td><?=$row['seller_name'];?></td>
											<td><?=$row['seller_phone'];?></td>-->

											<td><?=$row['phone1'];?></td>
											<td><?=$row['modal_name'];?></td>
											<td><?=$row['offer_price'];?></td>
											<td>
											<!--<a class="link btn-primary" href="product_detail.php?prod_id=<?=$row['prod_id'];?>&poster_id=<?=$row['poster_id'];?>&type=<?=$type;?>">Details</a>-->
											<a class="link btn-primary Edit" href="admin_adv_watches.php?req_id=<?=$row['prod_id']?>&amp;act=edit" style="margin:0px;padding: 2px 12px;" >Edit</a>
											<a class="link btn-danger" onclick="return confirm('Are you sure you want to delete this product ?');"href="product_trash.php?prod_id=<?=$row['prod_id'];?>&type=Admin">Delete</a>
											</td>
										</tr>
									<?php

									}
									?>
									</tbody>
								</table>
									</div>

									<div class="tab-pane active" id="tab-flip-three-1">
<table class="table table-bordered invoice-table mb30" id="list-1">
									<thead>
										<tr style="background: #4a9de4;color: #fff">
											<th style="padding:5px;">#</th>
											<th style="padding:5px;">Token Id</th>
											<th style="padding:5px;">DTTM</th>
											<th style="padding:5px;">Brand</th>
											<th style="padding:5px;">Model</th>
											<th style="padding:5px;">Expected Price</th>
											<th style="padding: 5px;width:250px;">
											   <span>Action</span>

											</th>
										</tr>
									</thead>
									<tbody>
									<?php
									 $sql="select *,prod_subcat_desc as phone1 from (
select *,
if(poster_type='Dealer',
		(select fname from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select fname from soum_master_customer where cust_id=temp1.poster_id),'Admin')) fname,

	if(poster_type='Dealer',
		(select mobile from soum_master_dealer where cust_id=temp1.poster_id),
		if(poster_type='Customer',(select mobile from soum_master_customer where cust_id=temp1.poster_id),'Admin')) mobile
 from (select   temp.*,soum_prod_subsubcat.prod_subcat_desc model_name from(
										select * from (
									   select soum_product_master.prod_id,if(soum_product_master.prod_cat_id=1,'New','Used') prod_type,soum_product_master.prod_cat_id,soum_product_master.rate,soum_product_master.brand,soum_product_master.modal,soum_product_master.imei_no,soum_product_master.rom,soum_product_master.ram2,soum_product_master.images2,soum_product_master.bill_img,soum_product_master.add_proof_img,soum_product_master.images1,soum_product_master.images,soum_product_master.sell_letter,soum_product_master.swap_letter,soum_product_master.seller_name,soum_product_master.seller_email,soum_product_master.seller_phone,soum_product_master.color_id,soum_product_master.seller_address,soum_product_master.seller_city,soum_product_master.yearbyadmin,soum_product_master.condi,soum_product_master.active,soum_product_master.modal_name
										,soum_product_master.poster_id,soum_product_master.poster_type,soum_product_master.post_date,soum_product_master.code,soum_product_master.offer_price from soum_product_master where active=1 $cond) prod
										left outer join soum_prod_subcat
										on prod.brand=soum_prod_subcat.prod_subcat_id)temp
										left outer join soum_prod_subsubcat
										on temp.modal=soum_prod_subsubcat.prod_subsubcat_id
) temp1
)tmep2 ".$conds." order by prod_id desc";
									// echo $sql;
										$i=1;
									  $res=$db->query($sql);
									   $dcount=mysqli_num_rows($res);


									  while($row=$res->fetch_assoc())
									  {
									        $originalDate =$row['post_date'];
											$post_dt= date("d-m-Y h:i A", strtotime($originalDate));
											$time= date("h:i A", strtotime($originalDate));


									?>
										<tr>
											<td><?=$i++;?></td>
											<td><?=$row['code'];?></td>
											<td><?=$post_dt;?></td>
											<td><?=$row['phone1'];?></td>
											<td><?=$row['modal_name'];?></td>
											<td><?=$row['offer_price'];?></td>
											<td>
											<!--<a class="link btn-primary" href="product_detail.php?prod_id=<?=$row['prod_id'];?>&poster_id=<?=$row['prod_id'];?>&type=<?=$type;?>">Details</a>-->
					              		     <a class="link btn-primary Edit" href="admin_adv_watches.php?req_id=<?=$row['prod_id']?>&amp;act=edit" style="margin:0px;padding: 2px 12px;" >Edit</a>
											<a class="link btn-danger" onclick="return confirm('Are you sure you want to delete this product ?');"href="product_trash.php?prod_id=<?=$row['prod_id'];?>&type=Admin">Delete</a>
										</td>
										</tr>
									<?php

									}
									?>
									</tbody>
								</table>
									</div>

								</div>
							</div>



						</div>
					</div>
					<!-- #end row -->

				</div> <!-- #end page-wrap -->
			</div>
			<!-- #end dashboard page -->
		</div>
	</div> <!-- #end main-container -->
	<!-- theme settings -->
	<div class="site-settings clearfix hidden-xs">
		<div class="settings clearfix">
			<div class="trigger ion ion-settings left"></div>
			<div class="wrapper left">
				<ul class="list-unstyled other-settings">
					<li class="clearfix mb10">
						<div class="left small">av Horizontal</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox" id="navHorizontal">
								<span>&nbsp;</span>
							</label>
						</div>


					</li>
					<li class="clearfix mb10">
						<div class="left small">Fixed Header</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="fixedHeader">
								<span>&nbsp;</span>
							</label>
						</div>
					</li>
					<li class="clearfix mb10">
						<div class="left small">av Full</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="navFull">
								<span>&nbsp;</span>
							</label>
						</div>
					</li>
				</ul>
				<hr/>
				<ul class="themes list-unstyled" id="themeColor">
					<li data-theme="theme-zero" class="active"></li>
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
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="scripts/vendors.js"></script>
	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/plugins/select2.min.js"></script>
	<script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
	<script src="scripts/plugins/bootstrap-slider.min.js"></script>
	<script src="scripts/plugins/summernote.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="scripts/plugins/bootstrap-datepicker.min.js"></script>
	<script src="scripts/app.js"></script>
<script type="text/javascript">
$("#txt_imi_no").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^0-9]/g)) {
       $(this).val(val.replace(/[^0-9]/g, ''));
   }

   if (val.length>15)
	{
       $(this).val(val.substr(0,15));

   }

});


$("document").ready(function(){
//alert('df');
$('#acount').html("(<?=$acount;?>)");
$('#pcount').html("(<?=$pcount;?>)");
$('#dcount').html("(<?=$dcount;?>)");

$("#datepickerDemo1").datepicker({autoclose:!0});
});
</script>



<?php
	$new_sql = "SELECT soum_prod_subcat.prod_subcat_desc as phone1
    FROM soum_prod_subcat";
         $res=$db->query($new_sql);
         $allRows =array();
			while($rowss=$res->fetch_assoc()){
	          $allRows[]=$rowss['phone1'];
		    }
	if(empty($on)){
	    $onn=1;
	}else{
	 $onn=$on;
	}
?>

  <script>
    var locationsz = ["<?php echo  implode('","',$allRows); ?>"];
	var url     =  'search_auto.php';
	searchfun(<?php echo $onn ?>);


function searchfun(search_id){

	if(search_id==1){
     $('.searchfield').attr('id','locations');

	 	var availableTags = locationsz;
			$( "#locations" ).autocomplete({
			  minLength: 3,
			  source: availableTags
			});

	}else{
	 //$('.searchfield').attr('id','searchkeword');
	 	  /* $("#searchkeword").autocomplete({
					minLength: 2,
					delay : 200,
					source: function(request, response) {

						$.ajax({
						   url: 	 url,
						   data:  {
									term : request.term,
									table   : 'customer',
									field   : document.getElementById('searchon').value
							},
						   dataType: "json",

						   success: function(data) 	{
								//alert(data);
							 response(data);
						  }

						})
				   },

					  select:  function(e, ui) {
						  // e.preventDefault();
							//document.getElementById('searchkeword').value = ui.item.label;

					  }
				}); */

	}

}

  </script>

</body>
</html>
