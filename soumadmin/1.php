<?php
error_reporting (E_ALL ^ E_NOTICE);
$upload_path = "upload_images/";
$thumb_width = "640";
$thumb_height = "480";
?>
<html>

<head>
<title>Popup div with disabled background</title>
<style>
.ontop {
	z-index: 999;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	display: none;
	position: absolute;
	background-color: #cccccc;
	color: #aaaaaa;

}
#popup {
	width: 700px;
	height: 499px;
	position: absolute;
	color: #000000;
	background-color: #ffffff; /* To align popup window at the center of screen*/;
	top: 25%;
	left:35%;
	margin-top: -100px;
	margin-left: -150px;
}
.p-title{
	width:auto;float:none;font-size:18px;font-weight:bold;text-align:center;background:#f6771a;color:#fff;margin-bottom: 1px
}
.close-btn{
	float: right;
	background: #f6771a;
	color: #2c2c2c;
	border: 1px solid #ddd;
	padding: 9px 14px;
	box-shadow: 0px 2px 4px 0px;
	position: absolute;
	top: -7px;
	border-radius: 100%;
	border: 1px solid #303030;
	right: -16px;
}
</style>
<script type="text/javascript">
			function pop(div) {
				document.getElementById(div).style.display = 'block';
			}
			function hide(div) {

				document.getElementById(div).style.display = 'none';
			}
			//To detect escape button
			document.onkeydown = function(evt) {
				evt = evt || window.event;
				if (evt.keyCode == 27) {
					hide('popDiv');
				}
			};
</script>

<link href="crop/cropimage.css" rel="stylesheet" type="text/css" />
<link href="crop/imgareaselect-default.css" rel="stylesheet" type="text/css"/>
<script src="crop/jquery.min.js" type="text/javascript"></script>
<script src="crop/jquery.form.js" type="text/javascript"></script>
<script src="crop/jquery.imgareaselect.js" type="text/javascript"></script>
<script src="crop/html2canvas.js" type="text/javascript"></script>
 <script>
    function abc1(popid)
    {
   
	    var canvas = document.getElementById('myCanvas');
	    var context = canvas.getContext('2d');
	
	    context.closePath();
	    context.lineWidth = 5;
	    context.fillStyle = '#8ED6FF';
	    context.fill();
	    context.strokeStyle = 'blue';
	    context.stroke();
	    var dataURL = canvas.toDataURL("image/jpeg",1);
	    saveImage(dataURL, popid);
	   }
					   
					   
function saveImage(dataURL, popid)
{
    $('#imageid'+popid).attr('src','../upload/loader.gif');
	$.ajax({
	  type: "POST",
	  url: "script.php",
	  data: { 
	     imgBase64: dataURL,
	     popid: popid
	  }
	}).done(function(o) {
	
	  $('#debugConsole'+popid).val(o); 
	   $('#imageid'+popid).attr('src','../upload/temp/'+o);
	   CloseMySelf(o,popid);
	});
}

					</script>

<script type="text/javascript">
function saveViaAJAX(popid)
{
	abc1(popid);
}

    
function abc(x,popid)
{

 	var file = x.files[0];
    window.URL = window.URL || window.webkitURL;
    var blobURL = window.URL.createObjectURL(file);

$("#popid").val(popid);
$('#thumbviewimage').html('<img id="scream"  src="'+blobURL +'"   style="position: relative;" alt="Thumbnail Preview" />');

$('#viewimage').html('<img class="preview" alt="" src="'+blobURL +'"   id="thumbnail" />');    
$('#filename').val(blobURL);     
$('#thumbnail').imgAreaSelect({  aspectRatio: '640:480', handles: true  , onSelectChange: preview });

}

function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 

	$('#thumbviewimage > img').css({
		width: Math.round(scaleX * img.width) + 'px', 
		height: Math.round(scaleY * img.height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	
	var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
	var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
	var x2 = Math.round(x1+selection.width);
	var y2 = Math.round(y1+selection.height);
	
	$('#x1').val(x1);
	$('#y1').val(y1);
	$('#x2').val(x2);
	$('#y2').val(y2);	
	
	$('#w').val(Math.round((img.naturalWidth/img.width)*selection.width));
	$('#h').val(Math.round((img.naturalHeight/img.height)*selection.height));
	$('#wr').val(150/$('#w').val());
	
	sanjay();

} 


$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		
		var filename = $('#filename').val();
		alert(filename);
		
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("Please Make a Selection First");
			return false;
		}else{
			return true;
		}

	});
	
	
    $("#clk").click(function(){
   		 
	$(".imgareaselect-outer").css("display", "none"); 
	$(".imgareaselect-selection").css("display", "none"); 
   	$(".imgareaselect-border1").css("display", "none"); 	
   	$(".imgareaselect-border2").css("display", "none"); 	
   	$(".imgareaselect-border3").css("display", "none"); 	
   	$(".imgareaselect-border4").css("display", "none"); 	   	
   	$(".imgareaselect-handle").css("display", "none"); 	 
   	
$('*').filter(function() {
   		return $(this).css('z-index') == 1001;
		}).each(function() {
		$(this).css("display", "none");
	});
  		hide('popDiv');	 
    });
	
}); 


function sanjay()
{


    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    var img = document.getElementById("scream");
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		var scale=$('#wr').val();

    
//drawImage(image,clipX,clipY,clipWidth,clipHeight,0,0,clipWidth,clipHeight);
//ctx.drawImage(img, 0,0,220,220,   0,0, 220,220);


ctx.clearRect(0, 0, w*scale*2, h*scale*2);
ctx.drawImage(img,x1,y1,w,h,0,0,w*scale*4.266666666666667,h*scale*4.266666666666667);
	
}

</script>
<style type="text/css">
.auto-style3 {
	border: 1px solid #ddd;
}
.auto-style4 {
	border: 1px solid #ddd;
	text-align: center;
}
.auto-style5 {
	border-style: solid;
	border-width: 1px;
}
body{padding:20px;background-color:#ddd;}
</style>
<script type="text/javascript">
function performClick(elemId) {
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
      var evt = document.createEvent("MouseEvents");
      evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
   }
}

function CloseMySelf(sender,pid) {
    try {
        window.opener.HandlePopupResult(sender,pid);
    }
    catch (err) {}
    window.close();
    return false;
}

</script>
</head>
<body onload="performClick('fileInput_1')">

<!---->
<div>

	<table  class="auto-style5" style="position:relative;" align="center">	
	<tr>
		<td class="auto-style3" style="width:440px; height:300px;vertical-align:top;">
		<p class="p-title">Crop Image</p>
		<input id="popid" name="Text1" type="hidden">
		<div id="viewimage" class="crop_preview_box_big"><div class="imgareaselect-outer"></div></div>
		</td>
		<td class="auto-style3" style="height:480px;width:640px;vertical-align:top;display:none">
		<canvas id="myCanvas" height="480" style="float: left;" width="640"></canvas></td>
	</tr>
	<tr>
		<td class="auto-style4" colspan="2" style="background:#000; height: 31px;">
		<div class="auto-style2" style="float:center">

	<button onclick="saveViaAJAX($('#popid').val())">Ok</button>
	<div style="display:none">
		
	<div class="crop_preview_right" style="display:none">
		<div id="thumbviewimage" class="crop_preview_box_small" style="position: relative; overflow: hidden;width:338px;height:499px;">
			<img id="scream" style="display: hidden"> </div>
		<input id="x1" name="x1" type="text" value="" />
		<input id="y1" name="y1" type="text" value="" />
		<input id="x2" name="x2" type="text" value="" />
		<input id="y2" name="y2" type="text" value="" />
		<input id="w" name="w" type="text" value="" />
		<input id="h" name="h" type="text" value="" />
		<input id="wr" name="wr" type="text" value="" /> </div></div><span style="display:none;"><input id="fileInput_1" onchange="abc(this,'<?=$_REQUEST['id']?>');pop('popDiv')" type="file" /></span></div>
</td>
	</tr>
</table>


</div>

&nbsp;
</body>

</html>
