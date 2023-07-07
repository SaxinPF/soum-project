<head>


<style>


.notificatoin2 {


    border-radius: 15px;


    background-color: black;


    color: rgb(255, 255, 255);


    font-size: 10px;


    padding: 2px;


    font-weight: bold;


    text-decoration: none;


    position: absolute;


    left: 25px;


    bottom: 2px;


    display: inline-table;


    width: 20px;


    height: 20px;


    text-align:center;


}


.chat_detail1 {


    text-align: right;


    background-color:#fff;


    margin: 0px 0px 4px;


    margin-bottom: 4px;


    font-size: 12px;


    padding: 2px 5px;


    width: auto;


    min-width: 40%;


    float:right;


    border-radius:8px 0px 8px 0px;


}


.chat_detail2 {


    text-align: left;


    background-color:#cfd8dc;


    margin: 0px 0px 4px;


    margin-bottom: 4px;


    font-size: 12px;


    padding:2px 5px;


    width: auto;


    min-width: 40%;


    float:left;


    border-radius:0px 8px 0px 8px;


    padding-left:5px;


}


</style>


<meta content="text/html; charset=utf-8" http-equiv="Content-Type">


</head>


<div style="width:100%;float:left;"><div id="tab-flip-01-1"></div></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<script>


var type=<?=$type?>;


var id1=<?=$poster_id?>;


$("document").ready(function(){


		$.ajax({


		      	  type:'POST',


			      url:'soumadmin/chate2.php',


			      data:'type='+type,


			      success:function(data)


			      {


			   $("#tab-flip-01-1").html(data);


			       }


	      });


	      


	   


});


function send(id,t)


{


       


		var msg=$("#msg"+t).val();





        


		$.ajax({


		      type:'POST',


			      url:'soumadmin/chat_save.php',


			      data:'user_id='+id+'&msg='+msg+'&type='+t,


			      success:function(data)


			      {





			     $("#chat_msg"+t).animate({scrollTop: $("#chat_msg"+t).prop("scrollHeight")}, 1000);


			 }


      });


   $("#msg"+t).val('');


}


var auto_refresh1 = setInterval(


function ()


{


var val = $('.toggle_chat').css('display');


if(val=='block')


{


   var id=$("#e_id").val();


   var uid=$("#uid"+type).val();




							


       $.getJSON('soumadmin/chat_details.php?callback=?','uid='+uid+'&type='+type,function(data){





			   if(data)


				{             


		             var tab="<div>";  


		           	 $.each(data,function(i,element){


		           	 


						  if(element.invite_by==id1)


			           		 tab+='<p style="margin:0px;width:100%;float:left;"><span class="chat_detail1">'+element.text+'</span></p>' 


			           	  	else


			           		 tab+='<p style="margin:0px;width:100%;float:left;"><span class="chat_detail2">'+element.text+'</span></p>'


			           	


		           	 });


		           	 tab+="</div>";


   				} 




									


		$("#chat_msg"+type).html(tab);


		$("#chat_msg"+type).animate({scrollTop: $("#chat_msg"+type).prop("scrollHeight")}, 1000);


	});


		  


		  console.log('load b');


}


 },1000);	      


</script>


