<header class="site-head" id="site-head" style="top: 0;">
    	<ul class="list-unstyled left-elems">
			<!-- nav trigger/collapse -->
			<li>
				<a href="javascript:;" class="nav-trigger ion ion-drag"></a>
			</li>
			<li>
				<div class="site-logo visible-xs">
					<a href="javascript:;" class="text-uppercase h3">
						<span class="text">SOUM</span>
					</a>
				</div>
			</li> <!-- #end site-logo -->
			<!-- fullscreen -->
			<li class="fullscreen hidden-xs">
				<a href="javascript:;"><i class="ion ion-qr-scanner"></i></a>
			</li>	<!-- #end fullscreen -->
			</ul>
		<ul class="list-unstyled right-elems">
			<li class="profile-drop hidden-xs dropdown" style="color:#fff;font-size:15px;margin-left:15px;">

				<a href="javascript:;" data-toggle="dropdown" style="color:#fff !important">
				<i class="nav-trigger ion ion-settings" style="padding: 0px 6px;border: 1px solid#fff !important;border-radius: 100%;"></i>
				<span class="text" style="color:#fff !important">Settings</span></a>
				<ul class="dropdown-menu dropdown-menu-right" style="right:0 !Important">
					<li><a href="update_profile.php"><span class="ion ion-person">&nbsp;&nbsp;</span>Update profile</a></li>
					<li><a href="logout.php"><span class="ion ion-power">&nbsp;&nbsp;</span>Logout</a></li>
				</ul>
			</li>
			<!-- sidebar contact -->
			<li class="floating-sidebar" id="loader_A">
				<a href="javascript:;" style="position:relative" onclick="load()">
					<i class="fa fa-weixin" style="display:none;"></i><span class="notificatoin2" style="display:none;" id="not"></span>

				</a>

			</li>
		</ul>

<script>
/*var auto_refresh = setInterval(
function ()
{
		 $.ajax({
		      	  type:'POST',
			      url:'chat_count.php',
			      data:'act=noti',
			      success:function(data)
			      {

			   		if(data==0)
		             {
		             $("#not").hide();
		             }
		             else
		             {
		            $("#not").html(data);
		      		$("#not").show();
		      		 }


			       }
		  });

		  console.log('load A');
 },1000);

function load()
{
     $("#loader_A").load("chat_loader_A.php");
}
function load1()
{
    clearInterval(auto_refresh1);

     $("#loader_A").html('<a href="javascript:;" style="position:relative" onclick="load()"><i class="fa fa-weixin"></i><span class="notificatoin2" style="display:none;" id="not"></span></a>');
}*/
</script>
	</header>
