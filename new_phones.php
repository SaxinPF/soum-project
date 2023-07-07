<!doctype html>
<?php include('config.php');
$layout_title = 'SOUM | Services Online Used Mobile';

    $pht=$_REQUEST['phone'];

    $phone_type=1;
    $sort=$_REQUEST['sort_act'];
?>

<html lang="en">
   <head>
   <title>Buy New Mobile Phones in Jaipur - SOUM</title>


<meta name="description" content="One stop shop to buy new mobile phones in jaipur. Best Price! Top Brands! Call +91-9828075008 for more queries."/>
<link rel="canonical" href="https://www.soum.co.in/new-phone-jaipur" />
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
  <body>
     <?php include('elements/header.php');?>
 <div class="clearfix"></div>
   <?php
   $set_var_modal = 'Yes';
   $category_type_static ='phone';
   include('elements/leftfilter.php');?>
 <div class="clearfix"></div>
 <div class="container mt-4 shop">
 <h1>New mobile phones</h1>
 <div class="clearfix"></div>
 <div class="row">

<?php
  /*BOF Security Patch IS-002*/
  $bindType = '';
  $searchArray =array();
    $cond='';
    $cond2='';
  $cond1='';
$cond3 = '';

  if(isset($_REQUEST['brand_model_name']) && $_REQUEST['brand_model_name']!=''){
            $brand_model_name = $_REQUEST['brand_model_name'];
           //  $cond2="having UPPER(phone1) Like UPPER('%$brand_model_name%')";
               $cond2 = "AND soum_product_master.brand = ".$brand_model_name ;

    }

    if(isset($_REQUEST['brand_cls_name']) && $_REQUEST['brand_cls_name']!='' && is_numeric($_REQUEST['brand_cls_name'])){
            $brand_cls_name = $_REQUEST['brand_cls_name'];
            // $cond2="having UPPER(phone1) Like UPPER('%$brand_model_name%')";

             $cond3 = "AND soum_product_master.modal = ".$brand_cls_name ;

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

     if($phone_type==1)
     {

      $bindType .= 's' ;
      $cond1 .=" and prod_cat_id like ?" ;
      $searchArray[]="%".$phone_type."%";
     }
      //if($_REQUEST['sort_act']==1)
     if($_REQUEST['min']!='')
     {
         $cond=$cond." order by appliable_rate ASC";
     }else{
         $cond=$cond." order by availability asc , post_date desc";
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




$num_rec_per_page=20;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$i=1+$start_from = ($page-1) * $num_rec_per_page;

$time = time();

/*$sql="select SQL_CALC_FOUND_ROWS
*,soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc) phone1, if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
if (soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) p_rom,
soum_product_master.category_type as product_category,
soum_product_master.warranty as pro_warranty,
(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=  soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.category_type = 'phone'
and soum_product_master.active=1 and soum_product_master.trash!='delete' and soum_product_master.dispatched_date >$time and soum_product_master.dealer_del_date >$time  and soum_product_master.prod_id!=0".$cond1." ".$cond2." ".$cond;*/

$sql = "select SQL_CALC_FOUND_ROWS *,soum_prod_subcat.prod_subcat_desc AS brand,soum_prod_subsubcat.prod_subcat_desc AS model,
  CONCAT(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc) AS phone1,
  IF(priority=0, IF(soum_product_master.poster_type='Admin', 1, IF(soum_product_master.poster_type='Dealer', 2, 3)), 0) AS p_type,
  IF(soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) AS imagesx,
  IF(soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) AS images1x,
  IF(soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) AS images2x,
  IF(soum_product_master.rom='', soum_prod_subsubcat.p_rom, soum_product_master.rom) AS p_rom,
  soum_product_master.category_type AS product_category, soum_product_master.warranty AS pro_warranty,
  (SELECT AVG(rating) FROM soum_product_review where prod_id=soum_product_master.prod_id) AS rating
FROM soum_product_master
JOIN soum_prod_subcat ON soum_product_master.brand = soum_prod_subcat.prod_subcat_id
JOIN soum_prod_subsubcat ON soum_product_master.modal = soum_prod_subsubcat.prod_subsubcat_id
WHERE soum_product_master.category_type = 'phone'
  AND soum_product_master.active = 1
  AND soum_product_master.trash != 'delete'
  AND soum_product_master.dispatched_date > 1680229362
  AND soum_product_master.dealer_del_date > 1680229362
  AND soum_product_master.prod_id != 0
  ".$cond2." ".$cond3." ".$cond1." ". $cond;

$sql=$sql." LIMIT $start_from, $num_rec_per_page";

//echo $sql;


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
    $img_prod=$row["imagesx"];
    else if($fd=="1")
    $img_prod=$row["images1x"];
    else if($fd=="2")
    $img_prod=$row["images2x"];

    $color_id  =  $row['color_id'];
    //echo "color id- ".$color_id;
    if($color_id >0){
    $sql = "select * from soum_colors where soum_colors.id=".$color_id;

              $ress=$db->query($sql);
        $rowww=$ress->fetch_assoc();
        $img_prod=$rowww["image"];
    }




 //echo $clid;



    

//echo $img_prod;


      if($row['appliable_rate']<=$row['offer_price']){ 
        $disc_perc=$row['appliable_rate'];
      }else{
       $disc_perc=$row['offer_price'];}

    if ($row['hot_deal']==1) $offer=1;
    if ($row['hot_deal_rate']>$disc_perc)
    $disc_perc="<del>".$row['hot_deal_rate'] . "</del>  &nbsp;<i class='fa fa-inr' aria-hidden='true' style='font-size:16px;'></i> " .$disc_perc;


$fromstrng = '';
if($disc_perc == 0){

    $newprice = "SELECT MIN(price) AS min_price ,color_id FROM product_variation WHERE prod_id =" . $row['prod_id'];

    $pricee = $db->query($newprice);

    $row_count = mysqli_num_rows($pricee);

    $rowpr      = $pricee->fetch_assoc();
    $disc_perc = intval($rowpr['min_price']); 

    $fromstrng .= 'From ';


    
    $clid = $rowpr['color_id'];
     if(strpos($img_prod, 'modelImage') === 0 || $img_prod == '0' || empty($img_prod)){

      
      $newimage = "SELECT image FROM soum_colors WHERE id =" . $clid;
    //  echo $newimage;
      $newimf = $db->query($newimage);
      $rowimg = $newimf->fetch_assoc();
      $img_prod = $rowimg['image'];


    }


}



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
 <div class="prodcat" onclick="window.open('<?php echo SITEPATH. slugify($row['brand'].'-'.$row['model']).'-'.$row['prod_id'];?>','_blank')" style="cursor:pointer;">

		 <?php if($row['current_stock']<=0) {?>
		 <div class="soldtag"><img src="img/sold.png" alt=""/></div>
		 <?php } ?>
		<?php if($row['hot_deal']){	?><div class="salestag"><img src="img/saletag.png" alt=""/></div> <?php } ?>
		<div class="prothumd"><img src="upload/<?php echo $img_prod; ?>" alt=""/></div>
		<div class="clearfix"></div>
		<div class="prodname" ><?=$row['brand'];?> <?=$row['model'];?></div>
	     <div class="clearfix"></div>
		<div class="prolstdtl"><div class="row">
				<div class="col-sm-12 catpric test"><?php if($row['availability']=='Unavailable'){ ?>Starting from <?php } ?> <?php echo $fromstrng; ?><img src="img/rupees.png" alt=""/>
          <?php echo $disc_perc; ?>/- </div>
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
	 <div class="montold" style="display:none;"><?php if($row['availability']=='Unavailable'){ ?><span class="restock">Restock in 2 days</span><?php } else { ?><span class="instock"><?php if($row['current_stock']<=0){ echo  $row['yearbyadmin'];}else{ echo $row['yearbyadmin'];}?></span> <?php } if($img_logo=="Admin"){?><figure><img src="img/symb.png" alt=""/></figure><?php } ?></div>
	 <div class="catfeat">
	 <ul>
       <?php
       switch($row['product_category']){
        case 'phone':?>
             <li><img src="img/caticon1.jpg" alt=""/>&nbsp;<?= str_replace("MP","",$row['fcame']);?>MP/<?= str_replace("MP","",$row['bcame']);?>MP</li>
	         <li><img src="img/caticon2.jpg" alt=""/><?php echo $row['display'];?>"</li>
	         <li><img src="img/caticon3.jpg" alt=""/><?=str_replace("GB","",$row['ram']);?>GB</li>
	         <li><img src="img/caticon4.jpg" alt=""/><?=str_replace("GB","",$row['p_rom']);?>GB</li>
       <?php break;
       default:?>
                 <li><strong>Warranty  </strong>&nbsp;<br/><?php echo strtoupper($row['pro_warranty']);?></li>
      <?php break;
     } ?>
	 </ul>
	 </div>
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
                      <li><a  class="<?php if($active==1){ $class='active';} else { $class='prev1';} ?>"  href='new-phone-jaipur?page=1&<?=$params;?>'><span class="fa fa-angle-left"></span>&ensp;First</a></li>
 <?php
 $qry="select *,soum_prod_subsubcat.prod_subcat_desc as model,concat(soum_prod_subcat.prod_subcat_desc,' ',soum_prod_subsubcat.prod_subcat_desc) phone1,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
(select avg(rating) from soum_product_review where   prod_id=soum_product_master.prod_id) rating
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.category_type = 'phone'
and soum_product_master.active=1 and soum_product_master.trash!='delete' and soum_product_master.dispatched_date >$time and soum_product_master.dealer_del_date >$time ".$cond1." ".$cond2." ".$cond;
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

									echo "<li><a class=".$class." href='new-phone-jaipur?page=".$i."&".$params1."'>".$i."</a></li>";
                                   }
                                   ?>
                                <li><a class="<?php if($active==$total_pages){ $class='active';} else { $class='next1';} ?>" href='new-phone-jaipur?page=<?=$total_pages."&".$params1;?>'>Last&ensp;<span class="fa fa-angle-right"></span></a></li>
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
