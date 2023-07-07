<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Materia - Admin Template">
	<meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
	<meta name="author" content="solutionportal">
	<!-- <base href="/"> -->

	<title>Materia - Admin Template</title>
	
	<!-- Icons -->
	<link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="styles/plugins/waves.css">
	<link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">
	
	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/main.min.css">


	 
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>

	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]--> 
	
</head>
<body id="app" class="app off-canvas">
	<!-- #Start header -->
		<?php include('_header.php');?>
	<!-- #end header -->

	<!-- main-container -->
	<div class="main-container clearfix">
		<!-- main-navigation -->
		<?php include('_left-menu.php');?>
		<!-- #end main-navigation -->

		<!-- content-here -->
		<div class="content-container" id="content">
			<div class="page page-ui-tabs">

				<ol class="breadcrumb breadcrumb-small">
					<li>UI Kit</li>
					<li class="active"><a href="tabs.php">Tabs and Accordions</a></li>
				</ol>
				<div class="page-wrap">
					<!-- row -->
					<div class="row">
						<h3 class="text-uppercase small text-bold mb30 ml15">Tab Styles</h3>
						<!-- style one -->
						<div class="col-md-6 mb30">
							<div class="page-tabs-lead mb30">
								<h4 class="text-light">Style One - Default</h4>
							</div>
							<!-- tab style -->
							<div class="clearfix">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-home" data-toggle="tab">Home</a></li>
									<li><a href="#tab-about" data-toggle="tab">About</a></li>
									<li><a href="#tab-portfolio" data-toggle="tab">Portfolio</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-home">

										<div class="clearfix">
											<p>HTML version of tab using bootstrap framework</p>
											<p>
												Bestiarum vero nullum iudicium puto. Tenent mordicus. Nam ista vestra: Si gravis, brevis; Quamquam tu hanc copiosiorem etiam soles dicere. Isto modo, ne si avia <strong>quidem eius</strong> nata non esset.
											</p>
											<button type="button" class="btn btn-xs btn-gplus ion ion-social-googleplus icon"></button>
											<button type="button" class="btn btn-xs btn-github ion ion-social-github icon"></button>
											<button type="button" class="btn btn-xs btn-dribbble ion ion-social-dribbble icon"></button>
											<button type="button" class="btn btn-xs btn-youtube ion ion-social-youtube icon"></button>
										</div>
									</div>
									<div class="tab-pane" id="tab-about">

										<h5 class="mt0">Hye, I'm John Doe</h5>
										<div class="clearfix">
											<p>Cui Tubuli nomen odio non est? Eam stabilem appellas. Sin tantum modo ad indicia veteris memoriae cognoscenda, curiosorum.</p>
											<button class="btn btn-pink btn-sm">See My Portfolio</button>
										</div>
									</div>
									<div class="tab-pane" id="tab-portfolio">

										<p>Philosophi autem in suis lectulis plerumque moriuntur. Non risu potius quam oratione eiciendum? Quid turpius quam sapientis vitam ex insipientium sermone pendere? O magnam vim ingenii causamque iustam, cur nova existeret disciplina! Perge porro.</p>
										<button class="btn btn-pink btn-sm">Go to Tab 2</button>
									</div>
								</div>
							</div>
							<!-- tab style -->
						</div>
						<!-- #end style-one -->


						<!-- style two -->
						<div class="col-md-6 mb30">
							<div class="page-tabs-lead mb30">
								<h4 class="text-light">Style Two - Flip</h4>
							</div>
							<!-- tab style -->
							<div class="clearfix">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-flip-one" data-toggle="tab">Flip One</a></li>
									<li><a href="#tab-flip-two" data-toggle="tab">Flip Two</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-flip-one">
										<div class="clearfix">
											<p>Add <code>tabs-flip</code> class to <code>&lt;tabset&gt;</code> element to create flip tabs.</p>
											<p class="filler w100"></p>
											<p class="filler w90"></p>
											<p class="filler w80"></p>
											<p class="filler w70"></p>
											<button class="btn btn-pink btn-sm" data-toggle="tab" >Call To Action</button>
										</div>
									</div>
									<div class="tab-pane" id="tab-flip-two">

										<h5 class="mt0">Hye, I'm John Doe</h5>
										<address class="mb0">
											<strong>Minty, Pvt Ltd.</strong><br>
											334 - Bahadur Chowk, Near Country Club<br>
											ew Delhi, ND 111001<br>
											<abbr title="Phone">Ph:</abbr> (123) 456-7890
										</address>
									</div>
									
								</div>
							</div>
							<!-- tab style -->
						</div>
						<!-- #end style-two -->

					</div> <!-- #end row -->


					<!-- row -->
					<div class="row">
						<!-- style three -->
						<div class="col-md-6 mb30">
							<div class="page-tabs-lead mb30">
								<h4 class="text-light">Style Three - Fill</h4>
							</div>
							<!-- tab style -->
							<div class="clearfix tabs-fill">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-flip-one-1" data-toggle="tab">Flip One</a></li>
									<li><a href="#tab-flip-two-1" data-toggle="tab">Flip Two</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-flip-one-1">
										<div class="clearfix">
											<p>Add <code>tabs-flip</code> class to <code>&lt;tabset&gt;</code> element to create flip tabs.</p>
											<p class="filler w100"></p>
											<p class="filler w90"></p>
											<p class="filler w80"></p>
											<p class="filler w70"></p>
											<button class="btn btn-pink btn-sm" data-toggle="tab" >Call To Action</button>
										</div>
									</div>
									<div class="tab-pane" id="tab-flip-two-1">

										<h5 class="mt0">Hye, I'm John Doe</h5>
										<address class="mb0">
											<strong>Minty, Pvt Ltd.</strong><br>
											334 - Bahadur Chowk, Near Country Club<br>
											ew Delhi, ND 111001<br>
											<abbr title="Phone">Ph:</abbr> (123) 456-7890
										</address>
									</div>
									
								</div>
							</div>
							<!-- tab style -->
						</div>
						<!-- #end style-three -->

						<!-- style four -->
						<div class="col-md-6 mb30">
							<div class="page-tabs-lead mb30">
								<h4 class="text-light">Style Four - Line Arrow</h4>
							</div>
							<!-- tab style -->
							<div class="clearfix tabs-linearrow">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-linearrow-one" data-toggle="tab">Quote</a></li>
									<li><a href="#tab-linearrow-two" data-toggle="tab">Lorem Ipsum</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-linearrow-one">
										<p>Add <code>tabs-linearrow</code> class to <code>&lt;tabset&gt;</code> element to create line arrow tabs.</p>
										<blockquote>
											<p>Ea nam error audiam, oratio nostrud pro id vulputate.</p>
											<footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
										</blockquote>
									</div>
									<div class="tab-pane" id="tab-linearrow-two">
										<p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
									</div>
								</div>
							</div>
							<!-- tab style -->
						</div>
						<!-- #end style-four -->
					</div>
					<!-- #end row -->

					<hr class="dashed"/>

					<!-- row -->
					<div class="row">
						<h3 class="text-uppercase small text-bold mb30 ml15">Tab Variations</h3>
						<!-- variation one -->
						<div class="col-md-6 mb30">
							<div class="page-tabs-lead mb30">
								<h4 class="text-light">Vertical Tabs</h4>
							</div>
							<!-- tab style -->
							<div class="clearfix tabs-vertical">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-vertical-home" data-toggle="tab">Home</a></li>
									<li><a href="#tab-vertical-about" data-toggle="tab">About</a></li>
									<li><a href="#tab-vertical-portfolio" data-toggle="tab">Portfolio</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-vertical-home">

										<div class="clearfix">
											<p>HTML version of tab using bootstrap framework</p>
											<p>
												Bestiarum vero nullum iudicium puto. Tenent mordicus. Nam ista vestra: Si gravis, brevis; Quamquam tu hanc copiosiorem etiam soles dicere. Isto modo, ne si avia <strong>quidem eius</strong> nata non esset.
											</p>
											<button type="button" class="btn btn-xs btn-gplus ion ion-social-googleplus icon"></button>
											<button type="button" class="btn btn-xs btn-github ion ion-social-github icon"></button>
											<button type="button" class="btn btn-xs btn-dribbble ion ion-social-dribbble icon"></button>
											<button type="button" class="btn btn-xs btn-youtube ion ion-social-youtube icon"></button>
										</div>
									</div>
									<div class="tab-pane" id="tab-vertical-about">

										<h5 class="mt0">Hye, I'm John Doe</h5>
										<div class="clearfix">
											<p>Cui Tubuli nomen odio non est? Eam stabilem appellas. Sin tantum modo ad indicia veteris memoriae cognoscenda, curiosorum.</p>
											<button class="btn btn-pink btn-sm">See My Portfolio</button>
										</div>
									</div>
									<div class="tab-pane" id="tab-vertical-portfolio">

										<p>Philosophi autem in suis lectulis plerumque moriuntur. Non risu potius quam oratione eiciendum? Quid turpius quam sapientis vitam ex insipientium sermone pendere? O magnam vim ingenii causamque iustam, cur nova existeret disciplina! Perge porro.</p>
										<button class="btn btn-pink btn-sm">Go to Tab 2</button>
									</div>
								</div>
							</div>
							<!-- tab style -->
						</div>
						<!-- #end variation one -->

						<!-- variation two -->
						<div class="col-md-6 mb30">
							<div class="page-tabs-lead mb30">
								<h4 class="text-light">Vertical Tabs - Right</h4>
							</div>
							<!-- tab style -->
							<div class="clearfix tabs-vertical-right">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-vertical-tabOne" data-toggle="tab">Tab One</a></li>
									<li><a href="#tab-vertical-tabTwo" data-toggle="tab">Tab Two</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-vertical-tabOne">
										<p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
										<p>Bestiarum vero nullum iudicium puto. Tenent mordicus. Nam ista vestra</p>
									</div>
									<div class="tab-pane" id="tab-vertical-tabTwo">
										<address class="mb0">
											<strong>Minty, Pvt Ltd.</strong><br>
											334 - Bahadur Chowk, Near Country Club<br>
											ew Delhi, ND 111001<br>
											<abbr title="Phone">Ph:</abbr> (123) 456-7890
										</address>
									</div>
								</div>
							</div>
							<!-- tab style -->
						</div>
						<!-- #end variation two -->
					</div>
					<!-- #end row -->

					<!-- row -->
					<div class="row">
						<!-- tabs-right -->
						<div class="col-md-6 mb30">
							<div class="page-tabs-lead mb30">
								<h4 class="text-light">Right Tabs</h4>
							</div>
							<!-- tab style -->
							<div class="clearfix tabs-right">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab-right-home" data-toggle="tab">Home</a></li>
									<li><a href="#tab-right-about" data-toggle="tab">About</a></li>
									<li><a href="#tab-right-portfolio" data-toggle="tab">Portfolio</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-right-home">
										<div class="clearfix">
											<p>HTML version of tab using bootstrap framework</p>
											<p>
												Bestiarum vero nullum iudicium puto. Tenent mordicus. Nam ista vestra: Si gravis, brevis; Quamquam tu hanc copiosiorem etiam soles dicere. Isto modo, ne si avia <strong>quidem eius</strong> nata non esset.
											</p>
											<button type="button" class="btn btn-xs btn-gplus ion ion-social-googleplus icon"></button>
											<button type="button" class="btn btn-xs btn-github ion ion-social-github icon"></button>
											<button type="button" class="btn btn-xs btn-dribbble ion ion-social-dribbble icon"></button>
											<button type="button" class="btn btn-xs btn-youtube ion ion-social-youtube icon"></button>
										</div>
									</div>
									<div class="tab-pane" id="tab-right-about">
										<h5 class="mt0">Hye, I'm John Doe</h5>
										<div class="clearfix">
											<p>Cui Tubuli nomen odio non est? Eam stabilem appellas. Sin tantum modo ad indicia veteris memoriae cognoscenda, curiosorum.</p>
											<button class="btn btn-pink btn-sm">See My Portfolio</button>
										</div>
									</div>
									<div class="tab-pane" id="tab-right-portfolio">
										<p>Philosophi autem in suis lectulis plerumque moriuntur. Non risu potius quam oratione eiciendum? Quid turpius quam sapientis vitam ex insipientium sermone pendere? O magnam vim ingenii causamque iustam, cur nova existeret disciplina! Perge porro.</p>
										<button class="btn btn-pink btn-sm">Go to Tab 2</button>
									</div>
								</div>
							</div>
							<!-- tab style -->
						</div>
						<!-- #end tabs-right -->


						<div class="col-md-6 mb30">
							<div class="page-tabs-lead mb30">
								<h4 class="text-light">Justified Tabs</h4>
							</div>
							<!-- tab style -->
							<div class="clearfix">
								<ul class="nav nav-tabs nav-justified">
									<li class="active"><a href="#tab-justified-home" data-toggle="tab">Home</a></li>
									<li><a href="#tab-justified-about" data-toggle="tab">About</a></li>
									<li><a href="#tab-justified-portfolio" data-toggle="tab">Portfolio</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab-justified-home">
										<div class="clearfix">
											<p>HTML version of tab using bootstrap framework</p>
											<p>
												Bestiarum vero nullum iudicium puto. Tenent mordicus. Nam ista vestra: Si gravis, brevis; Quamquam tu hanc copiosiorem etiam soles dicere. Isto modo, ne si avia <strong>quidem eius</strong> nata non esset.
											</p>
											<button type="button" class="btn btn-xs btn-gplus ion ion-social-googleplus icon"></button>
											<button type="button" class="btn btn-xs btn-github ion ion-social-github icon"></button>
											<button type="button" class="btn btn-xs btn-dribbble ion ion-social-dribbble icon"></button>
											<button type="button" class="btn btn-xs btn-youtube ion ion-social-youtube icon"></button>
										</div>
									</div>
									<div class="tab-pane" id="tab-justified-about">
										<h5 class="mt0">Hye, I'm John Doe</h5>
										<div class="clearfix">
											<p>Cui Tubuli nomen odio non est? Eam stabilem appellas. Sin tantum modo ad indicia veteris memoriae cognoscenda, curiosorum.</p>
											<button class="btn btn-pink btn-sm">See My Portfolio</button>
										</div>
									</div>
									<div class="tab-pane" id="tab-justified-portfolio">
										<p>Philosophi autem in suis lectulis plerumque moriuntur. Non risu potius quam oratione eiciendum? Quid turpius quam sapientis vitam ex insipientium sermone pendere? O magnam vim ingenii causamque iustam, cur nova existeret disciplina! Perge porro.</p>
										<button class="btn btn-pink btn-sm">Go to Tab 2</button>
									</div>
								</div>
							</div>
							<!-- tab style -->
						</div>

					</div>
					<!-- #end row -->


					<!-- row -->
					<div class="row">
						<!-- accordion -->
						<div class="col-sm-6">
							<h3 class="text-uppercase small text-bold mb30">Accordion</h3>
							<div class="panel-group" id="accordionDemo">
								<div class="panel panel-default ng-isolate-scope">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="#collapseOne" data-toggle="collapse" class="accordion-toggle" data-parent="#accordionDemo">Group Item One</a>
										</h4>
									</div>
									<div class="panel-collapse collapse in" id="collapseOne">
										<div class="panel-body">
											<p class="">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt</p>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="#collapseTwo" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo">Group Item Two</a>
										</h4>
									</div>
									<div class="panel-collapse collapse" id="collapseTwo">
										<div class="panel-body">
											<p>The body of the accordion group to fit the contents</p>
											<button type="button" class="btn btn-xs btn-gplus ion ion-social-googleplus icon"></button>
											<button type="button" class="btn btn-xs btn-github ion ion-social-github icon"></button>
											<button type="button" class="btn btn-xs btn-dribbble ion ion-social-dribbble icon"></button>
											<button type="button" class="btn btn-xs btn-youtube ion ion-social-youtube icon"></button>
										</div>
									</div>
								</div>

								<div class="panel-pink panel">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="#collapseThree" class="accordion-toggle" data-toggle="collapse" data-parent="#accordionDemo">
												I can have markup, too!<i class="right mt2 ion small ion-chevron-right"></i>
											</a>
										</h4>
									</div>
									<div class="panel-collapse collapse" id="collapseThree">
										<div class="panel-body">This is just some content to illustrate fancy headings.</div>
									</div>
								</div>
							</div>
							<!-- #end accordion -->
						</div>
					</div>
					<!-- #end row -->

				</div> <!-- #end page-wrap -->
			</div> <!-- #end page -->
		</div> <!-- #end content-container -->

	</div> <!-- #end main-container -->


	<!-- theme settings -->
	<div class="site-settings clearfix hidden-xs">
		<div class="settings clearfix">
			<div class="trigger ion ion-settings left"></div>
			<div class="wrapper left">
				<ul class="list-unstyled other-settings">
					<li class="clearfix mb10">
						<div class="left small">av Horizontal</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox" id="navHorizontal"> 
								<span>&nbsp;</span> 
							</label>
						</div>
						
						
					</li>
					<li class="clearfix mb10">
						<div class="left small">Fixed Header</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="fixedHeader"> 
								<span>&nbsp;</span> 
							</label>
						</div>
					</li>
					<li class="clearfix mb10">
						<div class="left small">av Full</div>
						<div class="md-switch right">
							<label>
								<input type="checkbox"  id="navFull"> 
								<span>&nbsp;</span> 
							</label>
						</div>
					</li>
				</ul>
				<hr/>
				<ul class="themes list-unstyled" id="themeColor">
					<li data-theme="theme-zero" class="active"></li>
					<li data-theme="theme-one"></li>
					<li data-theme="theme-two"></li>
					<li data-theme="theme-three"></li>
					<li data-theme="theme-four"></li>
					<li data-theme="theme-five"></li>
					<li data-theme="theme-six"></li>
					<li data-theme="theme-seven"></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- #end theme settings -->

	

	<!-- Dev only -->
	<!-- Vendors -->
	<script src="scripts/vendors.js"></script>

	<script src="scripts/plugins/screenfull.js"></script>
	<script src="scripts/plugins/perfect-scrollbar.min.js"></script>
	<script src="scripts/plugins/waves.min.js"></script>
	<script src="scripts/app.js"></script>

</body>
</html>