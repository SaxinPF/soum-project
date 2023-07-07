<?php include('config.php');
$layout_title = 'SOUM | Services Online Used Mobile';
?>
<!doctype html>
<html lang="en">

<head>
    <?php include('elements/newheadcommon.php'); ?>
</head>

<body>
    <!-- Header -->
    <?php include('elements/new_header.php'); ?>

    <!-- Slider -->
    <div class="sliderSec">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="slidercnt">
                            <h3>Swiftly Connected:<br> Your New Phone, <br> Delivered in Just One Day!</h3>
                            <p>Experience Lightning-Fast Delivery and Unmatched Convenience. Upgrade to the Latest Mobile Technology and Outsource Your Old Phone Hassle-Free!</p>
                            <div class="expbtn"><a href="/new-phone-jaipur" class="whbgbtn">Explore products</a></div>
                        </div>
                        <img src="new_img/sliderimg01.webp?gfdg" class="img-fluid" alt="img">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="slidercnt">
                            <h3>Swiftly Connected:<br> Your New Phone, <br> Delivered in Just One Day!</h3>
                            <p>Experience Lightning-Fast Delivery and Unmatched Convenience. Upgrade to the Latest Mobile Technology and Outsource Your Old Phone Hassle-Free!</p>
                            <div class="expbtn"><a href="/new-phone-jaipur" class="whbgbtn">Explore products</a></div>
                        </div>
                        <img src="new_img/sliderimg01.webp?gfdgfdgd" class="img-fluid" alt="img">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="slidercnt">
                            <h3>Swiftly Connected:<br> Your New Phone, <br> Delivered in Just One Day!</h3>
                            <p>Experience Lightning-Fast Delivery and Unmatched Convenience. Upgrade to the Latest Mobile Technology and Outsource Your Old Phone Hassle-Free!</p>
                            <div class="expbtn"><a href="/new-phone-jaipur" class="whbgbtn">Explore products</a></div>
                        </div>
                        <img src="new_img/sliderimg01.webp?gdfgfdg" class="img-fluid" alt="img">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Explore Latest Phone -->

    <div class="explatestphone">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="blackheading">Explore Latest Phones</h2>
                    <div class="btnsviewmore">
                        <div class="btnleft">
                            <a href="javascript:void(0)" id='showNewPhones' class="bluebtn">New Phones</a>
                            <a href="javascript:void(0)" id='showUsedPhones' class="whbtn">Old Phones</a>
                        </div>
                        <a href="#" class="viewmore">View More</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="latestphones">
                        <?php
                      		$time = time();

$sql=$db->prepare("select
*,soum_prod_subcat.prod_subcat_desc as brand,soum_prod_subsubcat.prod_subcat_desc as model,if(priority=0,if(soum_product_master.poster_type='Admin',1,if(soum_product_master.poster_type='Dealer',2,3)),0) p_type, if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images) imagesx,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img2, soum_product_master.images1) images1x,
if (soum_product_master.prod_cat_id=1, soum_prod_subsubcat.p_img1, soum_product_master.images2) images2x,
(select avg(rating) from soum_product_review where prod_id=soum_product_master.prod_id) rating
from soum_product_master,soum_prod_subcat, soum_prod_subsubcat
where soum_product_master.brand=	soum_prod_subcat.prod_subcat_id
and soum_product_master.modal= soum_prod_subsubcat.prod_subsubcat_id
and soum_product_master.active=1
and soum_product_master.category_type='phone'
and soum_product_master.trash!='delete'
and soum_product_master.dispatched_date >$time
and soum_product_master.dealer_del_date >$time
and soum_product_master.prod_cat_id=1 and soum_product_master.deal!=1  order by prod_id desc LIMIT 0, 4");

$sql->execute();
$res=$sql->get_result();


					while($row=$res->fetch_assoc())
					{
						$disc_perc=0;
						//$img_prod=$row['imagesx'];
						$img_logo=$row['poster_type'];
						$gaur=$row['soum_gaur'];
						$fd=$row['prime_image'];
					  	if($fd=="0" || $fd=="")
						$img_prod=$row["imagesx"];
					    else if($fd=="1")
						$img_prod=$row["images1x"];
					    else if($fd=="2")
						$img_prod=$row["images2x"];



                    if($row['color_id']>0){
						$color_id  =  $row['color_id'];
						$sql = "select * from soum_colors where soum_colors.id=".$color_id;

								  $ress=$db->query($sql);
							$rowww=$ress->fetch_assoc();
							$img_prod=$rowww["image"];

                    }

$fromstrng = '';
if($row['offer_price'] == 0){



    $newprice = "SELECT MIN(price) AS min_price ,color_id FROM product_variation WHERE prod_id =" . $row['prod_id'];

//echo $newprice;
    $pricee = $db->query($newprice);

    $row_count = mysqli_num_rows($pricee);

    $rowpr      = $pricee->fetch_assoc();
    $relatedprice = intval($rowpr['min_price']);



    $fromstrng .= 'From ';

    //echo $img_prod;
    $clid = $rowpr['color_id'];
     if(strpos($img_prod, 'modelImage') === 0 || $img_prod == '0' || empty($img_prod) || $img_prod == '../images/noimage.png'){


      $newimage = "SELECT image FROM soum_colors WHERE id =" . $clid;
    //  echo $newimage;
      $newimf = $db->query($newimage);
      $rowimg = $newimf->fetch_assoc();
      $img_prod = $rowimg['image'];


    }


}


					$product_id=$row['prod_id'];
  					$d=date('Y-m-d');
				  	$offer=$db->prepare("select * from soum_offer where prod_id=$product_id and start_dt<='$d' and end_dt>='$d'");
				  	$offer->execute();
  				  	$ores=$offer->get_result();
  				  	$rowo=$ores->fetch_assoc();
				  	$offid=$rowo['offer_id'];
					if($row['prod_cat_id']==2)
						$type="Used";
					else if($row['prod_cat_id']==1)
						$type="New";  
                      
                      
                        ?>



                            <li>
                                <div class="latestphoneimg"><a href="#"><img class="img-fluid" src="upload/<?php echo $img_prod;?>" alt="img"></a></div>
                                <h2><?php echo $row['brand'];?> <?php echo $row['model'];?></h2>
                                <div class="rankes">
                                    <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                    <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                    <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                    <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                    <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                </div>
                                <h3>From ₹ <?php echo $relatedprice; ?>/-</h3>
                                <div class="interested">
                                    <a href="#" class="interestedbtn">I’m Interested</a>
                                    <a href="#" class="interestlink"><img src="new_img/arrowicon.png?fdsfsd" alt="img"></a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="hotedealSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="blackheading">Hot Deals</h2>
                    <div class="btnsviewmore">
                        <div class="btnleft">
                            <a href="#" class="bluebtn">New Phones</a>
                            <a href="#" class="whbtn">Old Phones </a>
                        </div>
                        <a href="#" class="viewmore">View More</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="hotedeals">
                        <li>
                            <h2>SAMSUNG Note Ultra</h2>
                            <h3>From ₹ 39900/-</h3>
                            <div class="dealdetail">
                                <p>RAm/ROM
                                    <strong>8GB/128GB</strong>
                                </p>
                                <p>Condition
                                    <strong>Good</strong>
                                </p>
                                <a href="#" class="interestbtn">Interested</a>
                            </div>
                            <div class="dealimg"><img class="img-fluid" src="new_img/hotimg01.webp?fdsfdsf" alt="img"></div>
                        </li>

                        <li>
                            <h2>One Plus 10R 5g</h2>
                            <h3>From ₹ 39900/-</h3>
                            <div class="dealdetail">
                                <p>RAm/ROM
                                    <strong>8GB/128GB</strong>
                                </p>
                                <p>Condition
                                    <strong>Good</strong>
                                </p>
                                <a href="#" class="interestbtn">Interested</a>
                            </div>
                            <div class="dealimg"><img class="img-fluid" src="new_img/hotimg02.webp?fsdfdsf" alt="img"></div>
                        </li>

                        <li>
                            <h2>Iphone 12 pro max</h2>
                            <h3>From ₹ 56900/-</h3>
                            <div class="dealdetail">
                                <p>RAm/ROM
                                    <strong>8GB/128GB</strong>
                                </p>
                                <p>Condition
                                    <strong>Good</strong>
                                </p>
                                <a href="#" class="interestbtn">Interested</a>
                            </div>
                            <div class="dealimg"><img class="img-fluid" src="new_img/hotimg03.webp?fdsf" alt="img"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Buy Latest -->
    <div class="buylatestSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="buylatestbox">
                        <div class="buyphone">
                            <h2>Buy Latest Phones</h2>
                            <p>Experience Fastest Delivery of your Latest Phones right at your doorstep, Usually we provide phones in few hours</p>
                            <a href="/new-phone-jaipur" class="whbgbtn">Explore products</a>
                            <div class="buyphoneimg"><img class="img-fluid" src="new_img/buyphoneimg01.webp?fdsfd" alt="img"></div>
                        </div>

                        <div class="usesRepairphones">
                            <div class="buyphone usedphone">
                                <h2>Buy used Phones</h2>
                                <p>We provide best Quality Used phones from best source, explore for more</p>
                                <a href="phones.php?phone=used" class="whbgbtn">Explore products</a>
                                <div class="buyphoneimg"><img class="img-fluid" src="new_img/usedponeimg01.webp?fsdf" alt="img"></div>
                            </div>

                            <div class="buyphone mobilerepair">
                                <h2>Mobile Repair</h2>
                                <p>Tell us issue of your phone. Our experts will provide you quick repair service at reasonable cost in minimal time.</p>
                                <a href="mobile-repair-shop-jaipur.php#myForm5" class="whbgbtn">Drop a query</a>
                                <div class="buyphoneimg"><img class="img-fluid" src="new_img/mobilerepaire.webp?fsdfsdf" alt="img"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Explore By Category -->
    <div class="expbycateSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="blackheading">Explore By Categories</h2>
                    <div class="expcategories">
                        <div class="expcate">
                            <a href="laptops.php">
                                <img src="new_img/expcateimg01.webp?fdsfdsf" alt="img" class="img-fluid">
                                <span class="expcategorytitle">laptops</span>
                            </a>
                        </div>

                        <div class="expcate">
                            <a href="watches.php">
                                <img src="new_img/expcateimg02.webp?fdsfdsf" alt="img" class="img-fluid">
                                <span class="expcategorytitle">Smart Watches</span>
                            </a>
                        </div>

                        <div class="expcate">
                            <a href="airpod.php">
                                <img src="new_img/expcateimg03.webp?fdsdf" alt="img" class="img-fluid">
                                <span class="expcategorytitle">Airpods</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Read Story of Happy Clients  -->
    <div class="readstory">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="blackheading">Read Story of Happy Clients </h2>
                    <div class="testimonial slider">
                        <div>
                            <div class="storyauthhead">
                                <div class="authdetail">
                                    <div class="authimg"><img src="new_img/authimg01.png" alt="img"></div>
                                    <div class="authname">
                                        <h3>Manish Kumar Bhagora</h3>
                                        <h4>2 months ago</h4>
                                    </div>
                                </div>
                                <div class="authgmail"><img src="new_img/gmailicon.png" alt="img"></div>
                            </div>
                            <div class="authstar">
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                            </div>
                            <div class="authreview">
                                <p>Very nice experience. I insist you to go to shop if you are looking for used iPhone. Very polite behaviour. It’s been 8 months I am using 12 pro. Working very nice. Hope to see you soon to purchase one more.. thank you so much for wonderful experience..!!😍</p>
                            </div>

                        </div>

                        <div>
                            <div class="storyauthhead">
                                <div class="authdetail">
                                    <div class="authimg"><img src="new_img/authimg02.png" alt="img"></div>
                                    <div class="authname">
                                        <h3>Neeti Lekha</h3>
                                        <h4>3 weeks ago</h4>
                                    </div>
                                </div>
                                <div class="authgmail"><img src="inew_mg/gmailicon.png" alt="img"></div>
                            </div>
                            <div class="authstar">
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                            </div>
                            <div class="authreview">
                                <p>Very nice experience. I insist you to go to shop if you are looking for used iPhone. Very polite behaviour. It’s been 8 months I am using 12 pro. Working very nice. Hope to see you soon to purchase one more.. thank you so much for wonderful experience..!!😍</p>
                            </div>

                        </div>

                        <div>
                            <div class="storyauthhead">
                                <div class="authdetail">
                                    <div class="authimg"><img src="new_img/authimg03.png" alt="img"></div>
                                    <div class="authname">
                                        <h3>Gurpreet Singh</h3>
                                        <h4>2 weeks ago</h4>
                                    </div>
                                </div>
                                <div class="authgmail"><img src="new_img/gmailicon.png" alt="img"></div>
                            </div>
                            <div class="authstar">
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                            </div>
                            <div class="authreview">
                                <p>Very nice experience. I insist you to go to shop if you are looking for used iPhone. Very polite behaviour. It’s been 8 months I am using 12 pro. Working very nice. Hope to see you soon to purchase one more.. thank you so much for wonderful experience..!!😍</p>
                            </div>
                        </div>
                        <div>
                            <div class="storyauthhead">
                                <div class="authdetail">
                                    <div class="authimg"><img src="new_img/authimg01.png" alt="img"></div>
                                    <div class="authname">
                                        <h3>Manish Kumar Bhagora</h3>
                                        <h4>2 months ago</h4>
                                    </div>
                                </div>
                                <div class="authgmail"><img src="new_img/gmailicon.png" alt="img"></div>
                            </div>
                            <div class="authstar">
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                            </div>
                            <div class="authreview">
                                <p>Very nice experience. I insist you to go to shop if you are looking for used iPhone. Very polite behaviour. It’s been 8 months I am using 12 pro. Working very nice. Hope to see you soon to purchase one more.. thank you so much for wonderful experience..!!😍</p>
                            </div>

                        </div>

                        <div>
                            <div class="storyauthhead">
                                <div class="authdetail">
                                    <div class="authimg"><img src="new_img/authimg02.png" alt="img"></div>
                                    <div class="authname">
                                        <h3>Neeti Lekha</h3>
                                        <h4>3 weeks ago</h4>
                                    </div>
                                </div>
                                <div class="authgmail"><img src="new_img/gmailicon.png" alt="img"></div>
                            </div>
                            <div class="authstar">
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                            </div>
                            <div class="authreview">
                                <p>Very nice experience. I insist you to go to shop if you are looking for used iPhone. Very polite behaviour. It’s been 8 months I am using 12 pro. Working very nice. Hope to see you soon to purchase one more.. thank you so much for wonderful experience..!!😍</p>
                            </div>

                        </div>

                        <div>
                            <div class="storyauthhead">
                                <div class="authdetail">
                                    <div class="authimg"><img src="new_img/authimg03.png" alt="img"></div>
                                    <div class="authname">
                                        <h3>Gurpreet Singh</h3>
                                        <h4>2 weeks ago</h4>
                                    </div>
                                </div>
                                <div class="authgmail"><img src="new_img/gmailicon.png" alt="img"></div>
                            </div>
                            <div class="authstar">
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                                <a href="#"><img src="new_img/staricon.png" alt="img"></a>
                            </div>
                            <div class="authreview">
                                <p>Very nice experience. I insist you to go to shop if you are looking for used iPhone. Very polite behaviour. It’s been 8 months I am using 12 pro. Working very nice. Hope to see you soon to purchase one more.. thank you so much for wonderful experience..!!😍</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Brands -->
    <div class="featurebrands">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="blackheading">Feature Brands</h2>
                    <ul>
                        <?php
                        $sql = $db->prepare("select * from soum_prod_subcat where prod_subcat_id!=0 ORDER BY prod_subcat_id DESC;");
                        $sql->execute();
                        $res = $sql->get_result();
                        while ($row = $res->fetch_assoc()) {
                            $prod_subcat = $row['prod_subcat_desc'];
                            $prod_subcat_id = $row['prod_subcat_id'];
                            $img = $row['logo'];

                            $sql = "SELECT categroy_type FROM categroy_brands WHERE categroy_type='phone' AND brand_id=$prod_subcat_id";
                            $res_cat = $db->query($sql);

                            if ($res_cat->num_rows > 0) {



                        ?>
                                <li><a href="<?php echo SITEPATH . slugify($prod_subcat) . '-gadgets'; ?>"><img src="upload/c_logo/<?= $img; ?>" alt="img" class="img-fluid"></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Looking for Brand New iPhone -->
    <div class="lookingbrand">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="lookingbox">
                        <div class="lookingbr">
                            <h2>Looking for Brand New iPhone</h2>
                            <p>Get Latest iPhone deliver to you within a day, Our express delivery ensure that you get quality product as soon as possible </p>
                            <a href="apple-gadgets?phone_condition=1" class="whbgbtn">Explore products</a>
                        </div>
                        <div class="lookingbrand">
                            <div class="brandimg"><img src="new_img/iphoneimg.png" alt="img" class="img-fluid"></div>
                            <div class="brandimg"><img src="new_img/iphonemobile.webp?ere" alt="img" class="img-fluid"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include('elements/new_footer.php');
    ?>
    <script type="text/javascript">
        $('.testimonial').slick({
            dots: false,
            arrows: false,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $(document).on('click', '#showUsedPhones', function(e) {
            $.ajax({
                type: "GET",
                url: "backend-script.php",
                dataType: "html",
                success: function(data) {
                    $("#table-container").html(data);

                }
            });
        });
        $(document).on('click', '#showNewPhones', function(e) {
            $.ajax({
                type: "GET",
                url: "backend-script.php",
                dataType: "html",
                success: function(data) {
                    $("#table-container").html(data);

                }
            });
        });
    </script>
</body>

</html>