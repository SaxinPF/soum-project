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
            
        		
				
                <div class="column default-featured-column links-column col-md-10" style="padding:0px;margin:auto;float:none;">
                <div style="width:100%;float:left;">

                <h3 class="inner-title" style="position:relative;text-transform:none;font-weight:300;padding:15px 0px 0px 0px;margin-bottom:15px;padding-left:10px;">Happy <span style="font-weight:bold;">Clients</span><a name="Used">&nbsp;</a></h3>
				
                
    
                
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
<div style="width:100%;float:left;margin-bottom:30px;">


 				
               




 <?php
					$sql=$db->prepare("SELECT * FROM soum_master_customer WHERE our_happy_client='on'");
					$sql->execute();
					$res=$sql->get_result();
					while ($row=$res->fetch_assoc())
					{
					
					  $image=$row['image'];
					  if($image=='')$image='profile.png';
					  $name=$row['fname'];
					  $msg=$row['user_review'];
			
  ?>
                <div class="column default-featured-column style-two col-md-3" id="product-mobile" >
           		<div id="box-hover" class="inner-box" style="position:relative;">
						
	                   <article class="inner-box" style="position:relative;background:#ffca00;cursor: auto;">
	                   	<div style="width:100%;float:left;text-align:center;margin-bottom:6px;cursor: auto;">
	                   	&nbsp;
                        	<div class="Under_star" style="width:105px;margin: auto;cursor: auto;">
                                    <?php
										$avg_rat=$row['rating'];;
										$avg_rat=round($avg_rat);
										$rem_rat=5-$avg_rat;
										for($r=0;$r<$avg_rat;$r++)
										{
										?>
											<i class="fa fa-smile-o" aria-hidden="true" style="font-size:18px;float:left;margin-right:5px;color:#f00"></i>
										<?php
										}
										for($r=0;$r<$rem_rat;$r++)
										{
										?>
											<i class="fa fa-smile-o" aria-hidden="true" style="font-size:18px;float:left;margin-right:5px;color:#f00"></i>
										<?php
										}
									?>
							 </div>
                        </div>
                        <figure class="image-box" style="cursor: auto;">
								<div class="product_img_hold" style="background:#ffca00;cursor: auto;">
							  		<img src="upload/profile/<?=$image;?>"/ style="border:2px solid #000;padding: 3px;cursor: auto;">
						  		</div>
                        </figure>
                        <div class="content-box">
                            <div class="column-info" style="margin-bottom:13px;font-size:15px;text-align:center"><span class="raised-amount" style="color:#000;font-weight:bold;font-size:15px;margin-right:0px;text-transform:uppercase;"><?=$name;?></span></div>
                        </div>
                    </article>
                    </div>
                </div>
                
                <?php
				}
				?>
      
                
                </div>
            </div></div>
            
       		
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