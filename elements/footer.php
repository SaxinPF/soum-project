<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-5 col-lg-5">
        <div class="footcnt">
          <h2>Connect with us</h2>
          <ul class="footaddres">
            
            <li>
              <img src="new_img/phoneicon.png" alt="img">
              <strong><a href="tel:+919829300040">+91-9829300040</a></strong>
            </li>
            <li>
              <img src="new_img/envelopicon.png" alt="img">
              <strong><a href="mailto:info@soum.in">support@soum.co.in</a></strong>
            </li>
            <li>
              <img src="new_img/mapicon.png" alt="img">
              <strong>Haldiya Tower, 25 Kalyan Colony, Opp. Gaurav <br> Tower, Malviya Nagar, Jaipur (Raj.) 302017</strong>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-sm-4 col-md-5 col-lg-5">
        <div class="footcnt">
          <h2>Connect with us</h2>
          <ul class="footaddres">
            <li>
              <img src="new_img/phoneicon.png" alt="img">
              <strong><a href="tel:+919829300040">+91-9829300040</a></strong>
            </li>
            <li>
              <img src="new_img/envelopicon.png" alt="img">
              <strong><a href="mailto:info@soum.in">support@soum.co.in</a></strong>
            </li>
            <li>
              <img src="new_img/mapicon.png" alt="img">
              <strong>Haldiya Tower, 25 Kalyan Colony, Opp. Gaurav <br> Tower, Malviya Nagar, Jaipur (Raj.) 302017</strong>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-4 col-md-2 col-lg-2">
        <div class="quicklink">
          <h2>Quick Links</h2>
          <ul>
            <li><a href="<?php echo SITEPATH; ?>">Home</a></li>
            <li><a href="mobile-repair-shop-jaipur.php">Repair a phone</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="/second-hand-phone-jaipur">Used Phones</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="footlast">
          <div class="copyright">&copy; Copyright 2023 SOUM.</div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div id="elevator_item"><a id="elevator" onclick="return false;" title="Back To Top"></a></div>
<!-- Optional JavaScript -->

  <script src="js/popper.min.js" integrity=" " crossorigin=" "></script>
  <script src=" js/bootstrap.min.js" integrity=" " crossorigin=" "></script>
   <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
      <script src="assets/vendors/highlight.js"></script>
    <script src="assets/js/app.js"></script>
     <script>
     	var $j = jQuery.noConflict();
            $j(document).ready(function() {
              $j('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 4,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
              })
            })
          </script>



 <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 </div>


 <script>

function popup(){
  var modal = document.getElementById('myModal2');
	window.onload = setTimeout(function(){
	modal.style.display = "block";
	 $("#myModal2").addClass('show');
	}, 500);
}

function close_2(){
	$('#myModal2').hide();
}

function call_prebook(){

	$.ajax({
		type:"Post",
		url:"prelaunch_popup.php",
		data:"act=2",
		success:function(html)
		{
		  if(html==0){

            var html ='<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Recent Hot Offers</h5><button type="button" class="close" data-dismiss="modal" onclick="close_2()" aria-label="Close"><span aria-hidden="true">&times;</span>';
                html +='</button></div><div class="modal-body signara">	 <div class="col-md-12" style="text-align:center;padding:0px;">	<h4 class="style1">No offers available</h4></div></div>';
		  }
 //alert(html);
		  popup();
		  $("#myModal2").html(html);
		}
	});



}

 </script>


<script>
function Loginform(){
  var mob=$("#mobile").val();
  if(mob=='')
  {
   alert('Mobile number is required');
   return false;
  }
   var m=(mob.substr(0,1))*1;

    if(m>=0 && m<=6)
    {
      alert("Enter valid number");
      return false;

    }

    if(mob.length<10)
    {
      alert("Enter valid number");
      return false;
    }




                  $(".loadingDivReg").show();
				$("#btlogin").hide();
				$('.errorMessage2').html('&nbsp;');
	        var frmData = $("#LoginForm").serialize();
			 $.ajax({
					type: "POST",
					url: 'register_ajax.php',
					data: frmData,
					dataType: 'json',
					error: function(a,b,c) {
						alert('Unable to process request. - ' + a);
					},
				   success: function (data){
						$(".loadingDivReg").hide();
                        $("#btlogin").show();
						if($.trim(data.error) == "1"){
							$('.errorMessage2').html(data.errorMessage);
						}else{
							localStorage.setItem("mobile",data.mobile);
							localStorage.setItem("name",data.name);
						  window.location.href= data.redirect;
						}

				    }
				});
}

</script>

<!--
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
<script>
jquery("document").ready(function(){

	        jquery("#brand_model_name").autocomplete({
					minLength: 2,
					delay : 200,
					source: function(request, response) {

						jquery.ajax({
						   url: 	 'auto_brand.php',
						   data:  {
									term : request.term,
									categroy_type   : '<?php echo jquerycategory_type_static; ?>',
									table :'brand'

							},
						   dataType: "json",

						   success: function(data) 	{
								//alert(data);
							 response(data);
						  }

						})
				   },

					  select:  function(e, ui) {
						    //e.preventDefault();
							//document.getElementById('soum_prod_subcat').value = ui.item.value;


					  }
				});




	     jquery("#brand_product_name").autocomplete({
					minLength: 2,
					delay : 200,
					source: function(request, response) {

						jquery.ajax({
						   url: 	 'auto_brand.php',
						   data:  {
									term : request.term,
									table :'product',
									categroy_type   : '<?php echo jquerycategory_type_static; ?>'

							},
						   dataType: "json",

						   success: function(data) 	{
								//alert(data);
							     response(data);
						  }

						})
				   },

					  select:  function(e, ui) {
						    //e.preventDefault();
							//document.getElementById('soum_product_id').value = ui.item.value;
							//document.getElementById('product_name').value = ui.item.label;

					  }
		});



});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="new_js/jquery-3.7.0.min.js?dsfdf"></script>
<script src="new_js/bootstrap.bundle.min.js"></script>
<script src="new_js/app.js"></script>
<script src="new_js/slick.js?sdfsf"></script>
