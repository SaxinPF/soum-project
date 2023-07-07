<style>
  #searchFormn {
  display: none;
}
  </style>
<!doctype html>
<?php include('config.php');
$layout_title = 'New/Used Watches - SOUM';

    $pht=$_REQUEST['phone'];
   // $phone_type=($_REQUEST['phone']=='used'?2:($_REQUEST['phone']=='new'?1:''));
    $phone_type  =  ($_REQUEST['phone']=='used'?2:($_REQUEST['phone']=='new'?1:''));
    //$phone_type  =  2;
    $sort=$_REQUEST['sort_act'];

    $current_url = 'http';
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $current_url .= "s";
    }
    $current_url .= "://";
    if ($_SERVER['SERVER_PORT'] != '80') {
        $current_url .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    } else {
        $current_url .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }

    $watches_condition_value_condition =  '';
    $query_string = parse_url($current_url, PHP_URL_QUERY);
    parse_str($query_string, $query_params);
    if (isset($query_params['watches_condition'])) {
        $watches_condition_value = $query_params['watches_condition'];
      // echo $phone_condition_value;
        $watches_condition_value_condition = 'and soum_product_master.prod_cat_id = '.$watches_condition_value;
    }

?>

<html lang="en">
   <head>
   <title>New/Used Watches - SOUM</title>
    <!-- Required meta tags -->
   <?php include('elements/headcommon.php');?>
<script>
 function sort(val)
  {
    var type='<?=$phone_type;?>';
    var    type1=(type==1?'new':(type==2?'used':''));
    window.location.href="phones.php?phone="+type1+"&sort_act="+val;
  }
</script>

   </head>
   <style>
   .montold figure {
     top: -35px;
     }
   </style>
  <body>
     <?php include('elements/header.php');?>
 <div class="clearfix"></div>
   <?php
    $set_var_modal = 'No';
    $category_type_static ='watches';
   include('elements/leftfilter.php');?>
 <div class="clearfix"></div>

     <form method="get" id="searchFormnnew">
      <div class="mainhead ">
        <div class="filter">
          <div class="container form-inline" >
            <div class="col-sm-12">

                      <select name="watches_condition" id="watches_condition"  style="width: 150px; text-align: center;">
                        <option>Select New/Used</option>
                        <option value="1" <?php if ($watches_condition_value == '1') echo 'selected'; ?>>New</option>
                        <option value="2" <?php if ($watches_condition_value == '2') echo 'selected'; ?>>Used</option>
                      </select>

                      <input name="Submit2" type="submit" value="Search" class="btn btn-info"/>
                  <a href="javascript:void(0)" class="btn btn-info" onclick="window.location.href=window.location.href.split('?')[0]">Clear</a>
                  </div>
            </div>
          </div>
        </div>
   </form>

 <div class="container mt-4 shop">
 <h2>Find a New/ Used Smart Watches</h2>
 <div class="clearfix"></div>
 <div class="row">

<?php
  /*BOF Security Patch IS-002*/
    $bindType = '';
    $searchArray =array();
    $cond='';
    $cond2='';
    $cond1='';

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
      $cond1 .=" and prod_cat_id like '%".$phone_type."%'" ;
      $searchArray[]="%".$phone_type."%";
     }
      //if($_REQUEST['sort_act']==1)
     if($_REQUEST['min']!='')
     {
         $cond=$cond." order by appliable_rate ASC";
     }else{
         $cond=$cond." order by post_date desc";
        //$cond=$cond." order by appliable_rate DESC";
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
      //$cond=$cond." order by post_date desc";
     }

     if($phone_type=='2')
     {
      //$cond2=$cond2." and soum_product_master.deal!=1";
     }



    if(isset($_REQUEST['brand_product_name']) && $_REQUEST['brand_product_name']!=''){
        $brand_product_name = $_REQUEST['brand_product_name'];
        $cond2="having UPPER(phone1) Like UPPER('%$brand_product_name%')";
    }

    if($_REQUEST['watches_condition']){
      $co = $_REQUEST['watches_condition'];
            $searchArray[]=$co;
    }  

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

          if(isset($_REQUEST['assure']) && $_REQUEST['assure']=='on')
     {
       $bindType .= 's' ;
       $cond1 .= ' and soum_product_master.poster_type=?' ;
       $searchArray[]='Admin';
     }





$num_rec_per_page=20;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$i=1+$start_from = ($page-1) * $num_rec_per_page;

$time = time();

$sql="select SQL_CALC_FOUND_ROWS
*,soum_prod_subcat.prod_subcat_desc as brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_product_master.modal_name) phone1,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type,
soum_product_master.category_type as product_category,
soum_product_master.warranty as pro_warranty,
(select avg(rating) from soum_product_review where prod_id=soum_product_master.prod_id) rating
from soum_product_master,soum_prod_subcat where soum_product_master.brand=  soum_prod_subcat.prod_subcat_id
and soum_product_master.category_type = 'watches'
and soum_product_master.active=1 and soum_product_master.trash!='delete' and soum_product_master.dispatched_date >$time and soum_product_master.dealer_del_date >$time and soum_product_master.prod_id!=0 ". $watches_condition_value_condition . $cond1." ".$cond2." ".$cond;  
$sql=$sql." LIMIT $start_from, $num_rec_per_page";

// echo $sql;
// exit;

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

    /*$sql="select
    *,soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
    if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
    if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
    if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,
    (select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating
    from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
    where soum_product_master.brand=  soum_prod_subcat.prod_subcat_id
    and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
    and soum_product_master.active=1 and soum_product_master.prod_id!=0".$cond1." ".$cond2." ".$cond;
    $sql=$sql." LIMIT $start_from, $num_rec_per_page";*/

      //$res=$db->query($sql);
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
	$img_prod=$row["images"];
    else if($fd=="1")
	$img_prod=$row["images1"];
    else if($fd=="2")
	$img_prod=$row["images2"];


    $color_id  =  $row['color_id'];
    if($color_id >0){
    $sql = "select * from soum_colors where soum_colors.id=".$color_id;
        	  $ress=$db->query($sql);
    	$rowww=$ress->fetch_assoc();
    	$img_prod=$rowww["image"];
    }



  	if($row['appliable_rate']<=$row['offer_price']){ $disc_perc=$row['appliable_rate'];}else{ $disc_perc=$row['offer_price'];}

	if ($row['hot_deal']==1) $offer=1;
	if ($row['hot_deal_rate']>$disc_perc)
	$disc_perc="<del>".$row['hot_deal_rate'] . "</del>  &nbsp;<i class='fa fa-inr' aria-hidden='true' style='font-size:16px;'></i> " .$disc_perc;

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



if($row['product_category']!='phone'){
      $row['model'] = $row['modal_name'];
}

  ?>



<div class="col-lg-3">
 <div class="prodcat" onclick="window.location.href='<?php echo SITEPATH. slugify($row['brand'].'-'.$row['model']).'-'.$row['prod_id'];?>'" style="cursor:pointer;">

		 <?php if($row['current_stock']<=0) {?>
		 <div class="soldtag"><img src="img/sold.png" alt=""/></div>
		 <?php } ?>
		<?php if($row['hot_deal']){	?><div class="salestag"><img src="img/saletag.png" alt=""/></div> <?php } ?>
		<div class="prothumd"><img src="upload/<?=$img_prod;?>" alt=""/></div>
		<div class="clearfix"></div>
		<div class="prodname" ><?=$row['brand'];?> <?=$row['model'];?></div>
	     <div class="clearfix"></div>
		<div class="prolstdtl"><div class="row">
				<div class="col-sm-12 catpric"><img src="img/rupees.png" alt=""/><?=$disc_perc;?>/- </div>
				 <div class="col-sm-12 starplus" >
				 <?php
							$avg_rat=$row['rating'];;
							$avg_rat=round($avg_rat);
							$rem_rat=5-$avg_rat;
							for($r=0;$r<$avg_rat;$r++){	?>
								<img src="img/star.png" alt=""/>
							<?php }
								for($r=0;$r<$rem_rat;$r++)
								{
								?>
									<img src="img/star-gray.png" alt=""/>
								<?php
								}
							?>
				</div>

		</div></div>

	 <div class="clearfix"></div>
	 <div class="montold"><span><?php echo strtoupper($row['pro_warranty']);?></span> <?php if($img_logo=="Admin"){?><figure><img src="img/symb.png" alt=""/></figure><?php } ?></div>
 </div>
</div>
<?php }	?>
 <?php if($res->num_rows==0){ ?>
<div class="col-lg-12" style="bottom-padding:20px;">
<h4 style="padding-bottom:50px;">Currently, we are out of stock for your selection. <span style="color:#5390fa;">We might refill your selection soon.</span> For more updates please call us at +91-9828075008</h4>
</div>
<?php } ?>
 </div>
 <?php if($res->num_rows>0){ ?>
<div class="text-center"> <?php
                        	$params1 = $_SERVER['QUERY_STRING'];
							$params1=str_replace("page=","",$params1);
							$active=substr($params1,0,1);
                        ?>
       		<div class="styled-pagination margin-bott-40">
                <ul>
                      <li><a  class="<?php if($active==1){ $class='active';} else { $class='prev1';} ?>"  href='watches.php?page=1&<?=$params;?>'><span class="fa fa-angle-left"></span>&ensp;First</a></li>
 <?php
 $qry="select SQL_CALC_FOUND_ROWS
*,soum_prod_subcat.prod_subcat_desc as brand,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_product_master.modal_name) phone1,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type,
soum_product_master.category_type as product_category,
soum_product_master.warranty as pro_warranty,
(select avg(rating) from soum_product_review where prod_id=soum_product_master.prod_id) rating
from soum_product_master,soum_prod_subcat where soum_product_master.brand=  soum_prod_subcat.prod_subcat_id
and soum_product_master.category_type = 'watches'
and soum_product_master.active=1 and soum_product_master.trash!='delete' and soum_product_master.dispatched_date >$time and soum_product_master.dealer_del_date >$time and soum_product_master.prod_id!=0 ". $watches_condition_value_condition . $cond1." ".$cond2." ".$cond;  
  
  
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

									echo "<li><a class=".$class." href='watches.php?page=".$i."&".$params1."'>".$i."</a></li>";
                                   }
                                   ?>
                                <li><a class="<?php if($active==$total_pages){ $class='active';} else { $class='next1';} ?>" href='watches.php?page=<?=$total_pages."&".$params1;?>'>Last&ensp;<span class="fa fa-angle-right"></span></a></li>
                            </ul>
            </div> </div>

            <?php } ?>

            </div>


<?php include('elements/footer.php');?>
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
