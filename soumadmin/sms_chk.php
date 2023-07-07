<script src="scripts/jquery.min.js"></script>
<?php
$url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=9414245726&sms=hello&senderid=MYSOUM";
?>
	<script>

	   $(document).ready(function(){

	   url1='<?=$url;?>';

		    $.ajax({
		            type:'POST',
		            url:url1,
		            success:function(s)
		            {
		            	alert('yes');
		            },
      error: function(jqXHR, textStatus, errorThrown){
          alert('error');
      }   
		    });
		}); 
	</script>
<?php
?>
