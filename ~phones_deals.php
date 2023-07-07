<?php
	include('config.php');
    $poster_id=$_SESSION['poster_id'];
    $poster_type=$_SESSION['poster_type'];
	$pht=$_REQUEST['phone'];
	//$phone_type=($_REQUEST['phone']=='used'?2:($_REQUEST['phone']=='new'?1:''));
	$phone_type=2;
	$sort=$_REQUEST['sort_act'];
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SOUM | Services Online Used Mobile</title>
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/bootstrap-margin-padding.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet"`>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<script>
 function sort(val)
  {
    var type='<?=$phone_type;?>';
    var	type1=(type==1?'new':(type==2?'used':''));
    window.location.href="phones.php?phone="+type1+"&sort_act="+val; 
  } 
</script>
</head>
<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"><table style="height:100%;width:100%;"><tr><td style="height:100%;vertical-align:middle;text-align:center"><br/><br/><br/>Please wait, we are fetching your requested details..</td></tr></table></div>
    
 	
    <header class="header-style-two">
		<?php include('_header.php');?>        
    </header>
    
    
    <!--Page Title-->
    
    <!--Recent Projects Section-->
    <section class="recent-projects" style="padding:15px 0px 10px;">
        <div class="auto-container">
            <div class="row clearfix">
            
        		<div class="col-md-12" id='<?php if (ISSET($_REQUEST['Submit1']) || ISSET($_REQUEST['sort_act'])) echo "title-mobile1"; else echo "title-mobile"; ?>'>
               		<div style="width:46%;float:left;"><h2 style="margin:0px;padding:0px;font-size:18px;font-weight:bold;margin-top: 4px;text-align:center;">Buy Used Phone</h2></div>
               		<div style="width:54%;float:left;text-align:center;">
               			<div class="short" style="margin-right:20px;" onclick="myFunction2()">Short By <i class="fa fa-caret-down" aria-hidden="true"></i></div> 
               			<div class="short" onclick="myFunction()">Filter <i class="fa fa-caret-down" aria-hidden="true"></i></div>
               		</div>
               	</div>
				 <div class="remove1" id="myDIV"><?php include('_leftmenu.php');?> <img src="images/filter-top.png" style="position: absolute;top:-18px;right:40px;width: 42px;"></div>
                <div class="column default-featured-column links-column col-md-9" style="padding:0px;">
                <div style="width:100%;float:left;">
            
                <div class="col-md-12" style="margin-bottom:15px;padding:0px;float:left;" id='<?php if (ISSET($_REQUEST['Submit1']) || ISSET($_REQUEST['sort_act'])) echo "mobile-des211"; else echo "mobile-des21"; ?>'><a name="product"></a>
                	<h3 class="inner-title" style="position:relative;text-transform:none;font-weight:300;padding-bottom:0px;padding-left:15px" id="remove1">Used Phone by <span style="font-weight:bold;">Choice</span></h3>
                	<table><tr>
                		<td style="width:25%;min-width:160px;"><div class="col-md-3" id="mobile-des20"><div style="width:100%;float:left;border-radius:5px;margin-bottom:10px;"><a href="phones.php?cat=1"><img src="images/choice-img1.jpg" style="width:100%;border-radius: 5px 5px 0px 0px;"><div class="box-title-1">Great battery life <i class="fa fa-angle-double-right" id="arrow-1" aria-hidden="true"></i></div></a></div></div></td>
	                	<td style="width:25%;min-width:160px;"><div class="col-md-3" id="mobile-des20"><div style="width:100%;float:left;border-radius:5px;margin-bottom:10px;"><a href="phones.php?cat=2"><img src="images/choice-img2.jpg" style="width:100%;border-radius: 5px 5px 0px 0px;"><div class="box-title-1">4G ready <i class="fa fa-angle-double-right" id="arrow-1" aria-hidden="true"></i></div></a></div></div></td>
						<td style="width:25%;min-width:160px;"><div class="col-md-3" id="mobile-des20"><div style="width:100%;float:left;border-radius:5px;margin-bottom:10px;"><a href="phones.php?cat=3"><img src="images/choice-img3.jpg" style="width:100%;border-radius: 5px 5px 0px 0px;"><div class="box-title-1">Selfie phones <i class="fa fa-angle-double-right" id="arrow-1" aria-hidden="true"></i></div></a></div></div></td>
						<td style="width:25%;min-width:160px;"><div class="col-md-3" id="mobile-des20"><div style="width:100%;float:left;border-radius:5px;margin-bottom:10px;"><a href="phones.php?cat=4"><img src="images/choice-img4.jpg" style="width:100%;border-radius: 5px 5px 0px 0px;"><div class="box-title-1">High on speed <i class="fa fa-angle-double-right" id="arrow-1" aria-hidden="true"></i></div></a></div></div></td>
					</tr></table>
                </div>
           
 
                <div class="col-md-9" style="margin-bottom:10px;padding:0px;padding-left:15px" id="remove1">
                <h3 class="inner-title" style="position:relative;text-transform:none;font-weight:300;padding:15px 0px 0px 0px;">Deals on <span style="font-weight:bold;">Used Phone</span><a name="Used">&nbsp;</a></h3>
				</div>
				<div class="col-md-3 remove1" style="margin-bottom:0px;" id="myDIV2">
					<img src="images/filter-top.png" class="arrow-top">
					<h2 style="margin:0px;padding:0px;font-size:18px;font-weight:bold;margin-bottom:10px;text-align:left;" id="remove2">Short By</h2>
					<div style="width:100%;float:right;margin-bottom:10px;">
						<select name="sort_prod" id="sort_prod" onchange="sort(value)" class="form-control">
						<option value='' <?php  if($_REQUEST['sort_act']=='') echo "selected"; ?>>Sort By</option>
						<option value=1 <?php  if($_REQUEST['sort_act']==1) echo "selected"; ?>>Min To Max</option>
						<option value=2 <?php  if($_REQUEST['sort_act']==2) echo "selected"; ?>>Max To Min</option>
						<option value=3 <?php  if($_REQUEST['sort_act']==3) echo "selected"; ?>>Discount</option>
						<option value=4 <?php  if($_REQUEST['sort_act']==4) echo "selected"; ?>>Priority</option>	  		
						</select>
					</div>
				</div>
                
    
                
<style scoped>
.default-featured-column .image-box img {
    display: block;
    width: auto;
    -webkit-transform: scale(1.05,1.05);
    -ms-transform: scale(1.05,1.05);
    -o-transform: scale(1.05,1.05);
    -moz-transform: scale(1.05,1.05);
    transform: scale(1.05,1.05);
    -webkit-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    transition: all 500ms ease;
    height: 100%;
    height: 150px;
    min-width: auto;
    width: auto;
    max-width: 100%;
}
</style>
<div style="width:100%;float:left;">
<?php


  /*BOF Security Patch IS-002*/
  $bindType = '';
  $searchArray =array();
	$cond='';
	$cond2='';
  $cond1='';
	
	if($_REQUEST['drpBrand']!='' && $_REQUEST['drpBrand']!='0')
     {
       $drpBrand=$_REQUEST['drpBrand'];
       //$cond1=$cond1." and soum_product_master.brand=$drpBrand";
	     $bindType .= 's' ;
       $cond1 .= '  and soum_product_master.brand=?' ; 
       $searchArray[]=$drpBrand;
     }
     
     if($_REQUEST['drpModel']!='')
     {
       $drpModel=$_REQUEST['drpModel'];
      // $cond1=$cond1." and soum_product_master.modal=$drpModel";
	     $bindType .= 's' ;
       $cond1 .= ' and soum_product_master.modal=?' ;
       $searchArray[]=$drpModel; 
     }
	
	if($_REQUEST['min']!='')
     {
       $min=$_REQUEST['min'];
      // $cond1=$cond1." and appliable_rate>=$min";
	     $bindType .= 's' ;
       $cond1 .= ' and appliable_rate>=?' ; 
       $searchArray[]=$min;
     }
     
     if($_REQUEST['max']!='')
     {
       $max=$_REQUEST['max'];
       //$cond1=$cond1." and appliable_rate<=$max";
	     $bindType .= 's' ;
       $cond1 .=' and appliable_rate<=?' ; 
       $searchArray[]=$max;
     }
     
     if($_REQUEST['sim']!='')
     {
       $sim=$_REQUEST['sim'];
      // $cond1=$cond1." and soum_prod_subsubcat.sim_type=$sim";
	     $bindType .= 's' ;
       $cond1 .=' and soum_prod_subsubcat.sim_type=?' ; 
       $searchArray[]=$sim;
     }
     
     if($_REQUEST['cat']!='')
     {      
      $cat=$_REQUEST['cat'];
       //$cond1=$cond1." and soum_product_master.category='$cat'";	
       $bindType .= 's' ;
       $cond1 .= ' and soum_product_master.category=?' ; 
       $searchArray[]=$cat;
     }
    
     
 
     if($_REQUEST['search']!='')
     {
     $sear=strtoupper($_REQUEST['search']);
     	//$cond1=$cond1." and(UPPER(soum_prod_subsubcat.prod_subcat_desc) like '%".$sear."%')";
      $bindType .= 's' ;
      $cond1 .= " and(UPPER(soum_prod_subsubcat.prod_subcat_desc) like ?)" ; 
      $searchArray[]="%".$sear."%";
     }
     if($_REQUEST['brand']!='')
     {
       $brand=$_REQUEST['brand'];
      //$cond1=$cond1." and soum_product_master.brand=$brand";
      $bindType .= 's' ;
      $cond1 .= ' and soum_product_master.brand=?' ; 
      $searchArray[]=$brand;
     } 
     
     if($phone_type==2)
     {
     	//$cond1=$cond." and prod_cat_id like '%$phone_type%'";
      $bindType .= 's' ;
      $cond1 .=" and prod_cat_id like ?" ; 
      $searchArray[]="%".$phone_type."%";
     }   

     if($_REQUEST['sort_act']==1)
     {
     	$cond=$cond." order by appliable_rate ASC";
     }
     if($_REQUEST['sort_act']==2)
     {
     	$cond=$cond." order by appliable_rate DESC";
     }
     if($_REQUEST['sort_act']==3)
     {
     	
     }
     if($_REQUEST['sort_act']==4)
     {
     	$cond=$cond." order by p_type";
     }
     if($_REQUEST['sort_act']=='')
     {
      $cond=$cond." order by prod_id desc";
     }
     
     if($phone_type=='2')
     {
      //$cond2=$cond2." and soum_product_master.deal!=1";
     }
    
$num_rec_per_page=12;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$i=1+$start_from = ($page-1) * $num_rec_per_page;
				
$sql="select  
*,soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,
(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.active=1 and soum_product_master.hot_deal=1 and  soum_product_master.prod_id!=0".$cond1." ".$cond2." ".$cond;				
$sql=$sql." LIMIT $start_from, $num_rec_per_page";
	########################Main Patch BEGIN##############################
    $stmt = $db->prepare($sql);
    $bindTypeStringArray =array() ;
    $bindTypeStringArray[] = $bindType; 
    $params = array_merge($bindTypeStringArray,$searchArray) ; 
    $tmp = array();
    foreach($params as $key => $value) $tmp[$key] = &$params[$key];
    call_user_func_array(array($stmt, 'bind_param'), $tmp);
    $stmt->execute();
    $res=$stmt->get_result();
    ########################Main Patch END##############################
  /*EOF Security Patch IS-002*/
  	
  	$real_rate=0;
  	$disc_perc=0;
  	while($row=$res->fetch_assoc())
  	{
  	$real_rate=$row['appliable_rate'];
  	$oprice=$row['offer_price'];
  	$rate=$row['rate'];
  	$img_logo=$row['poster_type'];

  	$per=100-round(($oprice/$rate*100));
  	$gaur=$row['soum_gaur'];
  	//$fd='images'.($row['prime_image']=='0'?'':$row['prime_image']).'x'; 
  	
    $fd=$row['prime_image'];
  	if($fd=="0" || $fd=="")
	$img_prod=$row["imagesx"];
    else if($fd=="1")
	$img_prod=$row["images1x"];
    else if($fd=="2")
	$img_prod=$row["images2x"];
 	
  	
  	
  	if($row['appliable_rate']<=$row['offer_price']){ $disc_perc=$row['appliable_rate'];}else{ $disc_perc=$row['offer_price'];}


if ($row['hot_deal']==1) $offer=1;
if ($row['hot_deal_rate']>$disc_perc)
	$disc_perc="<del>".$row['hot_deal_rate'] . "</del> &nbsp;<i class='fa fa-inr' aria-hidden='true' style='font-size:16px;'></i> " .$disc_perc;


	
  
  	$product_id=$row['prod_id'];
  	
  	$d=date('Y-m-d');
  	$offer="select * from soum_offer where prod_id=$product_id and start_dt<='$d' and end_dt>='$d'";
  	
  	$ores=$db->query($offer);
  	$rowo=$ores->fetch_assoc();
  	$offid=$rowo['offer_id'];
  
	if($row['prod_cat_id']==2)
  		{
		$type="Used";
		$boxcolor="background:#fee7f4";
		}
	else if($row['prod_cat_id']==1)
		{
		$type="New";
		$boxcolor="background:#ecffe6";  	
		}
  	
  	
  ?>
                <div class="column default-featured-column style-two col-md-3" id="product-mobile" >
           		<div id="box-hover" class="inner-box" style="position:relative;height:343px;">
						           		<?php if($offid!=''){?><span class="product_list_sprite offer_product_label"></span><?php } ?>
						<?php if($row['current_stock']<=0) {?>
						<div style="position:absolute;top:0;left:0;width:100%;height:343px;overflow:hidden;background-color:rgba(0, 0, 0, 0.09);z-index:99;">&nbsp;</div>
						<span class="product_list_sprite sold_product_label"></span>
						<?php } ?>
						
						
	                   <article class="inner-box" style="position:relative">
                        <figure class="image-box">
								<div class="product_img_hold">
							  		<a href="detail.php?prod_id=<?=$row['prod_id'];?>" style="z-index:1"><img src="upload/<?=$img_prod;?>"/></a>
						  		</div>
						  		<?php if($row['hot_deal']){	?>
							  		<img src='images/sale-1.gif' style='width: 20%;height: auto;position: absolute;top: 140px;left: 4px;z-index: 99999;'>
							  	<?php }?>

						  		<a href="detail.php?prod_id=<?=$row['prod_id'];?>" style="z-index:1">
                            <?php if($row['prod_cat_id']==1) { ?>
                            <div class="offer" style="font-size:9px;"><?=$per;?>% off</div>
                            <?php }?></a>
                        </figure>
                        <div class="content-box">
                        	<a href="detail.php?prod_id=<?=$row['prod_id'];?>" style="z-index:1;color:#303030;">
                            <h3 style="height:20px;text-align:center"><?=$row['brand'];?> <?=$row['model'];?></h3>
                            <div style="width:100%;float:left;text-align:center;margin-bottom:6px;">
                                            	<div class="Under_star" style="width:100px;margin: auto;">
                                                        <?php
															$avg_rat=$row['rating'];;
															$avg_rat=round($avg_rat);
															$rem_rat=5-$avg_rat;
															for($r=0;$r<$avg_rat;$r++)
															{
															?>
																<span class="rating1"></span>
															<?php
															}
															for($r=0;$r<$rem_rat;$r++)
															{
															?>
																<span class="rating"></span>
															<?php
															}
														?>
												 </div>
                                            </div>
                            <div class="column-info" style="margin-bottom:3px;font-size:15px;text-align:center"><span class="raised-amount" style="color:#da2009;font-weight:bold;font-size:15px;margin-right:0px;"><i class="fa fa-inr" aria-hidden="true" style="font-size:16px;"></i> <?=$disc_perc;?>/-
                                                        	

                            </span>
                           	<?php if($row['prod_cat_id']==1) { ?> <span class="old_price" style="color: #303030;font-weight:bold;font-size:15px;"><i class="fa fa-inr" aria-hidden="true" style="font-size:16px;"></i> <?=$row['rate'];?></span> <?php }?> </div>
                           <div class="text" style="font-weight: 600;font-size: 14px;"><?php if($row['current_stock']<=0){ echo  $row['code'];}else{ echo $row['code'];}?> <?php if($img_logo=="Admin"){?><span class="logoname" ><img src="images/admin-icon.png" style="width:auto;height:30px;"></span><?php } ?></div>
                           <div class="spec_hold hidden-xs hidden-sm" style="padding:0px;">
								<ul style="height:auto;">
									<li style="padding-top:8px;"><span class="camera_pixels"><div class="icon-1"></div><p style="height:16px;overflow:hidden;font-size:10px;font-weight:bold;"> &nbsp;<?=$row['fcame'];?>MP/<?=$row['bcame'];?>MP</p></span></li>
									<li style="padding-top:8px;"><div class="icon-2"></div><p style="margin-bottom:3px;font-size:11px;font-weight:bold;"><?=$row['display'];?>"</p></li>
									<li style="padding-top:8px;"><div class="icon-3"></div><p style="margin-bottom:3px;font-size:11px;font-weight:bold;"><?=$row['ram'];?>GB</p></li>
									<li style="padding-top:8px;border-right: none !important;"><div class="icon-4"></div><p style="margin-bottom:3px;font-size:11px;font-weight:bold;"><?=$row['p_rom'];?>GB</p></li>
								</ul>
							</div>
							</a>
                        </div>
                    </article>
                    </div>
                </div>
                
                <?php
				}
				?>
      
                
                </div>
            </div></div>
             <?php
                        	$params = $_SERVER['QUERY_STRING'];
							$params=str_replace("page=","",$params);
							$active=substr($params,0,1);
                        ?>
       		<div class="styled-pagination margin-bott-40" style="float:right">
                <ul>
                      <li><a  class="<?php if($active==1){ $class='active';} else { $class='prev1';} ?>"  href='phones.php?page=1&<?=$params;?>'><span class="fa fa-angle-left"></span>&ensp;First</a></li>
<?php
$qry="select *,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating 
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.active=1 and soum_product_master.hot_deal=1 and  soum_product_master.prod_id!=0".$cond1." ".$cond2." ".$cond;				
								//echo $qry;
								$stmt = $db->prepare($qry);
							    $bindTypeStringArray =array() ;
							    $bindTypeStringArray[] = $bindType; 
							    $params = array_merge($bindTypeStringArray,$searchArray) ; 
							    $tmp = array();
							    foreach($params as $key => $value) $tmp[$key] = &$params[$key];
							    call_user_func_array(array($stmt, 'bind_param'), $tmp);
							    $stmt->execute();
							    $res_result=$stmt->get_result();
								$total_records=mysqli_num_rows($res_result);
								$total_pages = ceil($total_records / $num_rec_per_page);                                     
                                   for ($i=1; $i<=$total_pages; $i++)
                                    {
										if($i==$active)
										$class='active';
										else
										$class='active1'; 
										
									echo "<li><a class=".$class." href='phones_deals.php?page=".$i."&".$params."'>".$i."</a></li>";                                    
                                   }
                                   ?>                                
                                <li><a class="<?php if($active==$total_pages){ $class='active';} else { $class='next1';} ?>" href='phones_deals.php?page=<?=$total_pages."&".$params;?>'>Last&ensp;<span class="fa fa-angle-right"></span></a></li>
                            </ul>
            </div>
		 </div>
            <!-- Styled Pagination -->
            
        </div>
    </section>
	<!--start footer -->
	<?php include('_footer.php');?>
	<!--end footer -->
    
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".page-wrapper"><span class="fa fa-long-arrow-up"></span></div>
<!--Donate Popup-->
<!-- /.modal -->
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>



<script src="js/owl.js"></script>
<script src="js/wow.js"></script>



<script src="js/script.js"></script>
<script>
$("document").ready(function()
{
	//fill('fill2.php','soum_prod_subcat','');
});
function fill2(p)
{
	fill(p);
}
function fill(bid)
{

$('#brand_loader').hide();
 $('#name_loader').html("<img src='upload/loader.gif' width='30' height='30'>");

	$.ajax({
		type:"Post",
		url:"fill3.php",
		data:"param="+bid,
		success:function(html) 
		{
		       $('#name_loader').html(""); 
               $('#brand_loader').show();

			$("#soum_prod_subsubcat").html(html);
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


<script>

function myFunction2() {
    $("#myDIV").hide();
    $("#myDIV2").toggle();
  	
}

function myFunction() {
	
     $("#myDIV").toggle();
     $("#myDIV2").hide();

}


</script>
</body>
</html>