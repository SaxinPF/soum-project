<?php include("../config2.php");?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Materia - Admin Template">
	<meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
	<meta name="author" content="solutionportal">
	<!-- <base href="/"> -->

	<title>Soum</title>
	
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
	<!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]--> <style>
.report td {
    border: 1px solid#ddd;
    padding: 5px;
}
.form-control {
	border:1px solid#ddd !important;
}
.auto-style1 {
	border: 1px solid #ddd;
	font-weight: bold;
	padding:5px;
}
</style>

</head>
<body id="app" class="app off-canvas">

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

					<div class="row" style="margin-top:30px;">
						<!-- dashboard header -->
						<div class="col-md-12" >
							<div class="dash-head clearfix mb20">
								<div class="left">
									<h4 class="mb5 text-light">Day By Stock</h4>
								</div>
								<?php include('_right_menu.php');?>
							</div>
						</div>
					</div> 
					<!-- #end row -->
					<!-- mini boxes -->
					<?php
	
	$dt=date("d/m/Y");
	
	
	$d=substr($dt,0,2);
	$m=substr($dt,3,2);
	$y=substr($dt,6,4);	
	$edt=($d-5)."/".$m."/".$y;

	$b=$_REQUEST['tdt'];	
	

	
	$a=$_REQUEST['fdt'];
	
	$from_dt1	=isset($a)?$a:$edt;	
	$to_dt1		=isset($b)?$b:$dt;	
	
	//echo $from_dt1."<br>";
	//$from_dt1=substr($from_dt1,8,2)."/".substr($from_dt1,5,2)."/".substr($from_dt1,0,4);
	//echo $from_dt1."<br>";	






		$from_dt	=substr($from_dt1,0,2)."/".substr($from_dt1,3,2)."/".substr($from_dt1,6,4);
		$to_dt		=substr($to_dt1,0,2)."/".substr($to_dt1,3,2)."/".substr($to_dt1,6,4);
	
	    $from_dt1	=substr($from_dt1,6,4)."/".substr($from_dt1,3,2)."/".substr($from_dt1,0,2);
		$to_dt1		=substr($to_dt1,6,4)."/".substr($to_dt1,3,2)."/".substr($to_dt1,0,2);


	//$to_dt	=date("Y-m-d", strtotime($to_dt1));
					
					
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="dash-head clearfix mb20 table-responsive" style="min-height:400px;position:relative;">
							<div class="col-md-12">
								<div class="col-md-8" style="margin:auto;float:none">
										<form method="post">
										<div class="col-md-5">
										<div class="form-group">
											<label class="control-label small">From</label>
											<div class="input-group date" id="datepickerDemo">
												<input name="fdt" class="form-control" type="text" value="<?=$from_dt;?>"/>
												<span class="input-group-addon">
													<i class=" ion ion-calendar"></i>
												</span>
											</div>
										</div>
										</div>
										<div class="col-md-5">
										<div class="form-group">
											<label class="control-label small">To</label>
											<div class="input-group date" id="datepickerDemo1">
												<input name="tdt" class="form-control" type="text" value="<?=$to_dt;?>"/>
												<span class="input-group-addon">
													<i class=" ion ion-calendar"></i>
												</span>
											</div>
										</div>
										</div>
										<div class="col-md-2">
										<button name="Submit1" type="submit" value="submit" class="btn btn-primary mr5 waves-effect waves-effect" style="margin-top:28px;">Search</button>
										</div>
										</form>
									</div>
								</div>
							<?php				
	
     
     //echo $from_dt."=".$to_dt;
	
	$sql="select temp2.*,soum_prod_subsubcat.prod_subcat_desc from(
	select dt, modal, sum(if(what,qt,0)) plus, sum(if(!what,qt,0)) minus
 from (select date(post_date) dt, modal, sum(opening_stock) qt, 1 what
from soum_product_master
where date(post_date)>='$from_dt1' and date(post_date)<='$to_dt1'
group by date(post_date),modal

union
select date(order_date) dt,  soum_product_master.modal, sum(qty) qt, 0 what
from soum_order_master, soum_order_details, soum_product_master
where date(order_date)>='$from_dt1' and date(order_date)<='$to_dt1'

and soum_order_master.order_id= soum_order_details.order_id
and soum_order_details.prod_id=soum_product_master.prod_id
group by date(order_date),modal) temp 
group by date(dt),modal
order by dt,modal*1 ) temp2
left outer join soum_prod_subsubcat
on temp2.modal=soum_prod_subsubcat.prod_subsubcat_id";
//echo $sql;
	$res=$db->query($sql);


	$d=0;	
	$array  = array();
	$arraydt  = array();
	$plus[] = array();
	$minus[]= array();
	
	$flag=($row=$res->fetch_assoc());
	while($flag)
	{
		$dt=$row['dt'];
		$arraydt[]=date("d-m-Y", strtotime($dt)); 
		//echo "<h2>$dt</h2>";
		while ($dt==$row['dt'])
		{
				$mili=null;
				for ($i=0;$i<sizeof($array);$i++)
				{
					if ($array[$i]==$row['prod_subcat_desc'])
						$mili=$i;
				}
				if(is_null($mili))
				{
					$array[sizeof($array)]=$row['prod_subcat_desc'];
					$mili=sizeof($array)-1;
				}
				
				$plus[$mili][$d]	=$row['plus'];
				$minus[$mili][$d]	=$row['minus'];
			
			
			
			
			$flag=($row=$res->fetch_assoc());
		}	
		$d++;
	} 
	
	
?>

<table class="auto-style2" align="center" style="width: 100%;border:1px solid#ddd;" class="report">
<tr style="font-weight:bold;background-color:#f2f2f2;">
	<td class='auto-style1'><strong>Model</strong></td>
<?php 	for ($mili=0;$mili<=sizeof($arraydt)-1;$mili++) {?>
	<td class="auto-style1"><strong><?=$arraydt[$mili];?></strong></td>
<?php } ?>


</tr>
<?php

	for ($mili=0;$mili<=sizeof($array)-1;$mili++)
	{
		echo "<tr>";
		echo "<td class='auto-style1'>".$array[$mili]."</td>";
		$initialnet=0;		
		
		for($d=0;$d<=1;$d++)
		{


			echo "<td class='auto-style1'>$initialnet+".(is_null($plus[$mili][$d])?0:$plus[$mili][$d])."-".(is_null($minus[$mili][$d])?0:$minus[$mili][$d]);
			$initialnet=$initialnet+$plus[$mili][$d]-$minus[$mili][$d];						
			echo "=$initialnet</td>";
		}
		echo "</tr>";

	}

?>
</table>
							

							</div>
						</div>
					</div> <!-- #end row -->


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
	<script src="scripts/form-elements.init.js"></script>

</body>
</html>