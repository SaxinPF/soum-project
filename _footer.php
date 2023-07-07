<?php
$poster_id=mysqli_real_escape_string($db,$_SESSION['poster_id']);
$poster_type=mysqli_real_escape_string($db,$_SESSION['poster_type']);
if(isset($_SESSION['poster_type']))
{
	if($poster_type=='Dealer')
	{
		$stmt=$db->prepare("select * from soum_master_dealer where cust_id=?");
		
	}
	else if($poster_type=='Customer')
	{
		$stmt=$db->prepare("select * from soum_master_customer where cust_id=?");
        
	
	}
	else if($poster_type=='Admin')
	{
	 $stmt=$db->prepare("select * from soum_master_admin where usr_id=?");
     
	}
    $stmt->bind_param('i',$poster_id);
	
    $stmt->execute();
	$result = $stmt->get_result();
	$row=$result ->fetch_assoc();
	
	$name=$row['fname'];
	$email=$row['email'];
	$address=$row['address'];
	$city=$row['city'];
	$mobile=$row['mobile'];
}
?>
    <!--Main Footer-->
  

    <footer class="main-footer">
    	
        <!--Footer Upper-->        
        <div class="footer-upper" style="padding-top:0px;">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-3 col-sm-6 col-xs-12 column mb-xs-50" style="background-color: #e6e6fe;padding: 30px;color: #000;height: 315px;">
                        <div class="footer-widget about-widget">
                            <h2 style="color:#000;text-transform:none;font-weight:bold;margin-bottom: 15px;">Connect with us!</h2>
                            <div style="width:100%;float:left;">
                            <ul class="contact-info" style="margin-bottom:0px;">
                            	<li style="line-height:18px;"><span class="icon fa fa-map-marker"></span>Haldiya Tower, 25 Kalyan Colony, Opp. Gaurav Tower, Malviya Nagar Jaipur (Raj.) 302017</li>
                                <li style="line-height:22px;"><span class="icon fa fa-phone" style="line-height:22px;"></span><strong> +91-9828075008</strong></li>
                            </ul>
                            </div>
                            <h2 style="color:#000;text-transform:none;font-weight:bold;margin:0px;margin-bottom:9px;font-size: 16px;">Authorised Service Center</h2>
                            <div style="width:100%;float:left;">
                            <ul class="contact-info">
                            	<li style="line-height:18px;"><span class="icon fa fa-map-marker"></span>Soum - A39 Lower Shopping, Ganpati Plaza, Jaipur</li>
                                <li style="line-height:22px;"><span class="icon fa fa-phone" style="line-height:22px;"></span><strong> +91-7877777117</strong></li>
                                <li style="line-height:22px;"><span class="icon fa fa-envelope-o" style="line-height:22px;"></span><strong> <a href="mailto:info@soum.in" style="color:#000;">info@soum.in</a></strong></li>
                            </ul>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!--Footer Column-->
                    <div class="col-lg-5 col-sm-6 col-xs-12 column" style="background:#f1eff0;padding:30px;color:#303030;min-height: 315px;">
                        <h2 style="color:#000;text-transform:none;font-weight:bold;margin-bottom: 20px;">Quick Links</h2>
                        <div class="col-md-6" style="padding-left:0px;">
	                        <div class="footer-widget links-widget">
	                            <ul>
	                                <li><i class="fa fa-angle-double-right" aria-hidden="true" id="arrow-left1"></i> <a href="index.php" style="color:#000;">Home </a></li>
									<li><i class="fa fa-angle-double-right" aria-hidden="true" id="arrow-left1"></i><a href="phones.php?phone=used" style="color:#000;">Buy Used Phones</a></li>
									<li><i class="fa fa-angle-double-right" aria-hidden="true" id="arrow-left1"></i><a href="form_used.php" style="color:#000;">Sale Used Phones</a></li>
									<li><i class="fa fa-angle-double-right" aria-hidden="true" id="arrow-left1"></i><a href="repairing.php" style="color:#000;">Online Repairing</a></li>
									<li><i class="fa fa-angle-double-right" aria-hidden="true" id="arrow-left1"></i><a href="tell_us.php" style="color:#000;">Enquiry</a></li>
									<li><i class="fa fa-angle-double-right" aria-hidden="true" id="arrow-left1"></i><a href="aboutus.php" style="color:#000;">About Us</a></li>
	                            </ul>
							</div>
                        </div>
                        <div class="col-md-6" style="padding-left:0px;">
                        	<div class="footer-widget links-widget">
	                            <ul>
									<li><i class="fa fa-angle-double-right" aria-hidden="true" id="arrow-left1"></i><a href="track_order.php" style="color:#000;">Track Order</a></li>
									<li><i class="fa fa-angle-double-right" aria-hidden="true" id="arrow-left1"></i><a href="contact.php" style="color:#000;">Contact Us </a></li>
									<li><i class="fa fa-angle-double-right" aria-hidden="true" id="arrow-left1"></i><a href="terms_conditions.php" style="color:#000;">Terms & Conditions</a></li>
	                            </ul>
							</div>
                        </div>
                    </div>
            		<!--Footer Column-->
                	
                    
                    <!--Footer Column-->
                    <div class="col-lg-4 col-sm-6 col-xs-12 column" style="background-color: #e6e6fe;padding:23px;color: #000;height: 315px;">
                        <div class="footer-widget contact-widget">
                        	<h2 style="color:#000;text-transform:none;font-weight:bold;margin-bottom:10px;">Contact Form</h2>
                        	<form method="post" class="contact-form" action="SubcribeSave.php">
                        	<input name="mobile" id="mobile1" type="hidden"/>
                            <input name="type" type="hidden" value="Feedback"/>
							<div style="width:100%;float:left;">
                           	<label style="width:auto;float:left;margin-right:15px;"><input type="radio" value="Feedback" name="type" style="width:auto;float:left;height:auto;"> &nbsp;  FEEDBACK</label> 
                           	<label style="width:auto;float:left;margin-right:15px;"><input type="radio" value="Complaint" name="type" style="width:auto;float:left;height:auto;"> &nbsp;  COMPLAINT</label>
                           	</div>
                           	<div style="width:100%;float:left;">
                               <input type="text" name="name" id="name1"  placeholder="Full Name" class="form-control" style="height: auto;color: #787878;padding: 9px 20px;background-color:#fff;">
                                <input type="text" name="email" placeholder="Email Address" class="form-control" style="height: auto;color: #787878;padding: 9px 20px;background-color:#fff;">
                                <textarea name="message" row="2" placeholder="Your Message" class="form-control" style="height: auto;color: #787878;padding: 9px 20px;background-color:#fff;"></textarea>
                                <input type="submit" name="submit3" class="theme-btn btn-style-four btn-sm" style="width:auto;background-color:#e3111c;border:2px solid#e3111c !important;padding:5px 25px;letter-spacing:0px;margin-top: 5px;margin-bottom: 0px;height: auto;color: #fff !important;text-transform:none;" value="Send">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                   
					<div class="col-md-12" style="padding:0px;">
						<div class="col-md-12" id="news-latter">
						<form method="post" class="contact-form" action="SubcribeSave.php">
						
							<div class="col-md-3"><h2 style="margin:0px;padding:0px;font-weight:500;color:#303030;font-family: inherit;font-size: 34px;" id="news-latter2">Newsletters</h2></div>
							<div class="col-md-6">
								<input name="type" type="hidden" value="subcribe"/>
								<input class="form-control" id="news-latter2" name="email" type="text" value="" placeholder="Enter your email to get latest update onto used phones" style="border: 1px solid #ddd;margin: 0px;padding: 12px;height: auto;color: #787878;border-radius: 5px !important;">
							</div>
							<div class="col-md-3">
								<input name="submit2" id="news-latter2" type="submit" value="Submit" class="theme-btn btn-style-two" style="width:auto;color: #fff !important;text-transform: none;width:150px;background-color:#e3111c;border:2px solid#e3111c !important;padding:8px 25px">
							</div>
						</form>
						</div>
					</div>
 
                </div>
                
            </div>
        </div>
        
        <!--Footer Bottom-->
    	<div class="footer-bottom">
            <div class="auto-container clearfix">
                <!--Copyright-->
                <div class="copyright text-center">V 1.1 Copyright 2016 &copy; <a href="#" style="color:#808080">SOUM</a> Design by <a href="http://swinnovations.in" target="_blank" style="color:#356bb3;">Software Innovations</a></div>
                
                <div class="copyright text-center"><p style="width:auto;margin:0px;border-top:1px solid rgba(255,255,255,0.10);">Visitor Count</p>
                      <p style="margin:0px;padding:0px;"><script type="text/javascript" src="http://widget.supercounters.com/hit.js"></script><script type="text/javascript">sc_hit(1414631,6,6);</script></p>
                </div>
            </div>
        </div>
        
    </footer> 
    





<div id="footer_icon_box" style="display:none !important">
	<div class="icon-box1"><a href="mailto:info@soum.in"><img src="images/foot-icon4.jpg"/></a></div>
	<div class="icon-box2"><a href="sms:9887363205"><i class="fa fa-file-text" aria-hidden="true" style="font-size: 26px;color: green;"></i></a></div>
	<div class="icon-box3"><a href="tel:9828075008"><img src="images/foot-icon2.jpg"/></a></div>
	<div class="icon-box4"><a href="https://api.whatsapp.com/send?phone=+919828075008"><img src="images/foot-icon1.jpg"/></a></div>
</div>
    
