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
	<link rel="stylesheet" href="styles/plugins/select2.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-slider.css">
	<link rel="stylesheet" href="styles/plugins/bootstrap-datepicker.css">
	<link rel="stylesheet" href="styles/plugins/summernote.css">
	
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
			<div class="page page-forms-elements">

				<div class="page-wrap">
					<!-- row -->
					<div class="row">
				
						<!-- col-left -->
						<div class="col-sm-12 col-md-6">
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">ative Controls</div>
								<div class="panel-body">
									<form role="form" class="form-horizontal" action="javascript:;"> <!-- form horizontal acts as a row -->
										<!-- normal control -->
										<div class="form-group">
											<label class="col-md-3 control-label">ormal Control</label>
											<div class="col-md-9">
												<input type="text" class="form-control">
											</div>
										</div>

										<!-- with hint -->
										<div class="form-group">
											<label class="col-md-3 control-label">With Hint</label>
											<div class="col-md-9">
												<input type="text" class="form-control" placeholder="Hint Text">
												<p class="text-danger text-right xsmall">hint description</p>
											</div>
										</div>
										
										<!-- passowrd control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Password</label>
											<div class="col-md-9">
												<input type="password" class="form-control" placeholder="Password Text">
											</div>
										</div>

										<!-- Disabled control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Disabled</label>
											<div class="col-md-9">
												<input type="text" class="form-control" placeholder="Input is disabled" disabled>
											</div>
										</div>
										
										<!-- textarea control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Textarea</label>
											<div class="col-md-9">
												<textarea rows="5" class="form-control resize-v" placeholder="Message here"></textarea>
											</div>
										</div>
										
										<!-- native select -->
										<div class="form-group">
											<label class="col-md-3 control-label">ative Select</label>
											<div class="col-md-9">
												<select class="form-control">
													<option value="0" selected disabled>Select a fruit</option>
													<option value="1">Apple</option>
													<option value="2">Orange</option>
													<option value="3">Grapes</option>
													<option value="4">Pineapple</option>
													<option value="5">Cherry</option>
												</select>
											</div>
										</div>
										
										<!-- success control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Success Control</label>
											<div class="col-md-9">
												<div class="has-success">
													<input type="text" class="form-control">
												</div>
											</div>
										</div>

										<!-- warning control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Warning Control</label>
											<div class="col-md-9">
												<div class="has-warning">
													<input type="text" class="form-control">
												</div>
											</div>
										</div>
										
										<!-- error control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Error Control</label>
											<div class="col-md-9">
												<div class="has-error">
													<input type="text" class="form-control">
												</div>
											</div>
										</div>

										<!-- prepend control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Prepend</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon ion ion-person"></span>
													<input type="text" class="form-control" placeholder="Full Name">
												</div>
											</div>
										</div>

										<!-- append control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Append</label>
											<div class="col-md-9">
												<div class="input-group">
													<input type="email" class="form-control" placeholder="Email Address">
													<span class="input-group-addon ion ion-email-unread"></span>
												</div>
											</div>
										</div>

										<!-- both control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Both Addon</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">$</span>
													<input type="email" class="form-control" placeholder="Both Addon">
													<span class="input-group-addon">0.0</span>
												</div>
											</div>
										</div>

										<!-- dropdown control -->
										<div class="form-group">
											<label class="col-md-3 control-label">Dropdown</label>
											<div class="col-md-9">
												<div class="input-group">
													<div class="input-group-btn">
														<div class="dropdown" dropdown>
															<button class="btn btn-pink dropdown-toggle" dropdown-toggle 
															type="button">Click Me<span class="caret"></span></button>
															<ul class="dropdown-menu">
																<li><a href="javascript:;">Action</a></li>
																<li><a href="javascript:;">Another action</a></li>
																<li><a href="javascript:;">Something else here</a></li>
																<li class="divider"></li>
																<li><a href="javascript:;">Separated link</a></li>
															</ul>
														</div>
													</div>
													<input type="text" class="form-control" placeholder="Dropdown button addon">
												</div>
											</div>
										</div>

										<!-- button addon -->
										<div class="form-group">
											<label class="col-md-3 control-label">Button Addon</label>
											<div class="col-md-9">
												<div class="input-group">
													<div class="input-group-btn">
														<button class="btn btn-default ion ion-paper-airplane"></button>
													</div>
													<input type="text" class="form-control" placeholder="Button Addon">
												</div>
											</div>	
										</div>
										
										<div class="clearfix right">
											<button class="btn btn-primary mr5" type="submit">Submit</button>
											<button class="btn btn-default">Cancel</button>
										</div>
									</form>
								</div>
							</div>
						</div> <!-- #end col-left -->


						<!-- col-right -->
						<div class="col-sm-12 col-md-6">
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">Sizes</div>
								<div class="panel-body">
									<form role="form" action="javascript:;">
										<div class="form-group form-group-sm">
											<label class="control-label small">Small - Using <code>.form-group-sm</code> class.</label>
											<input type="text" class="form-control" placeholder="or .input-sm">
										</div>

										<div class="form-group">
											<label class="control-label small">Medium - Default</label>
											<input type="text" class="form-control" placeholder="No extra class">
										</div>

										<div class="form-group form-group-lg">
											<label class="control-label small">Large - Using <code>.form-group-lg</code> class.</label>
											<input type="text" class="form-control" placeholder="or .input-lg">
										</div>
									</form>
								</div>
							</div>
						</div>
						
						<!-- Selects -->
						<div class="col-sm-12 col-md-6">
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">Selects</div>
								<div class="panel-body">
									<form role="form">
										<div>
											<!-- Single Select -->
											<div class="form-group">
												<label class="control-label small">Single Select - default</label>
												<select id="personSelect" style="width: 100%" data-placeholder="Select a person">
													<option></option>	<!-- empty, for placeholder -->
													<option value="1">Adam</option>
													<option value="2">Amalie</option>
													<option value="3">icolas</option>
													<option value="4">Wladimir</option>
													<option value="5">Johnson</option>
													<option value="6">Samantha</option>
													<option value="7">Estefania</option>
													<option value="8">atasha</option>
													<option value="9">icole</option>
													<option value="10">Adrian</option>
												</select>
											</div>

											<!-- single select - with optgroup -->
											<div class="form-group">
												<label class="control-label small">Single Select - with optgroup</label>
												<select id="stateSelect" data-placeholder="Select a state (optgroup)" style="width: 100%">
													<option></option> 	<!-- blank for placeholder -->
													<optgroup label="Alaskan/Hawaiian Time Zone">
														<option value="AK">Alaska</option>
														<option value="HI">Hawaii</option>
													</optgroup>
													<optgroup label="Pacific Time Zone">
														<option value="CA">California</option>
														<option value="NV">evada</option>
														<option value="OR">Oregon</option>
														<option value="WA">Washington</option>
													</optgroup>
													<optgroup label="Mountain Time Zone">
														<option value="AZ">Arizona</option>
														<option value="CO">Colorado</option>
														<option value="ID">Idaho</option>
														<option value="MT">Montana</option>
														<option value="NE">ebraska</option>
														<option value="NM">ew Mexico</option>
														<option value="ND">orth Dakota</option>
														<option value="UT">Utah</option>
														<option value="WY">Wyoming</option>
													</optgroup>
													<optgroup label="Central Time Zone">
														<option value="AL">Alabama</option>
														<option value="AR">Arkansas</option>
														<option value="IL">Illinois</option>
														<option value="IA">Iowa</option>
														<option value="KS">Kansas</option>
														<option value="KY">Kentucky</option>
														<option value="LA">Louisiana</option>
														<option value="MN">Minnesota</option>
														<option value="MS">Mississippi</option>
														<option value="MO">Missouri</option>
														<option value="OK">Oklahoma</option>
														<option value="SD">South Dakota</option>
														<option value="TX">Texas</option>
														<option value="TN">Tennessee</option>
														<option value="WI">Wisconsin</option>
													</optgroup>
													<optgroup label="Eastern Time Zone">
														<option value="CT">Connecticut</option>
														<option value="DE">Delaware</option>
														<option value="FL">Florida</option>
														<option value="GA">Georgia</option>
														<option value="IN">Indiana</option>
														<option value="ME">Maine</option>
														<option value="MD">Maryland</option>
														<option value="MA">Massachusetts</option>
														<option value="MI">Michigan</option>
														<option value="NH">ew Hampshire</option>
														<option value="NJ">ew Jersey</option>
														<option value="NY">ew York</option>
														<option value="NC">orth Carolina</option>
														<option value="OH">Ohio</option>
														<option value="PA">Pennsylvania</option>
														<option value="RI">Rhode Island</option>
														<option value="SC">South Carolina</option>
														<option value="VT">Vermont</option>
														<option value="VA">Virginia</option>
														<option value="WV">West Virginia</option>
													</optgroup>
												</select>
											</div>

											<!-- Multi Select -->
											<div class="form-group">
												<label class="control-label small">Multi Select</label>
												<select id="multiSelect" style="width: 100%" data-tags="true" multiple="multiple">
													<option selected="selected">Blue</option>
													<option selected="selected">Red</option>
													<option>Green</option>
													<option>Magneto</option>
													<option>Orange</option>
													<option>Pink</option>
													<option>White</option>
												</select>
											</div>	

											<!-- Templating Select -->
											<div class="form-group">
												<label class="control-label small">Templating</label>
												<select id="templatingSelect" style="width: 100%">
													<option value="AK">Alaska</option>
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="CA">California</option>
													<option value="DE">Delaware</option>
													<option value="FL">Florida</option>
												</select>
												
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
						<!-- #end col-right -->

						<!-- Color Picker -->
						<div class="col-sm-12 col-md-6">
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">Color Picker</div>
								<div class="panel-body">
									<form role="form">
										<div class="form-group">
											<input type="text"  id="colorpickerDemo" class="form-control" value="#5367ce"/>
										</div>
										<div class="form-group">
											<div class="input-group" id="colorpickerDemo1">
												<input type="text" class="form-control" value="rgba(37, 30,130,1)">
												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</form>
									
								</div>
							</div>
						</div>

					</div>
					<!-- #end row -->


					<!-- row -->
					<!-- checkboxes -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">Checkboxes (No Plugin)</div>
								<div class="panel-body">
									<div class="row">
										
										<div class="col-md-4">
											<p class="small text-warning text-uppercase text-normal">Colors</p>
											<p class="small mb15">Wrap label inside <code>ui-checkbox</code> class to create custom checkbox. Support standard colors via <code>ui-checkbox-primary</code> etc.</p>
											<div class="clearfix">
												<div class="ui-checkbox">
													<label>
														<input type="checkbox" checked> 
														<span>Default</span>
													</label>
												</div>

												<div class="ui-checkbox ui-checkbox-primary">
													<label>
														<input type="checkbox" checked> 
														<span>Primary</span>
													</label>
												</div>

												<div class="ui-checkbox ui-checkbox-pink">
													<label>
														<input type="checkbox" checked> 
														<span>Pink</span>
													</label>
												</div>

												<div class="ui-checkbox ui-checkbox-success">
													<label>
														<input type="checkbox"> 
														<span>Success</span>
													</label>
												</div>

												<div class="ui-checkbox ui-checkbox-info">
													<label>
														<input type="checkbox" checked> 
														<span>Info</span>
													</label>
												</div>

												<div class="ui-checkbox ui-checkbox-warning">
													<label>
														<input type="checkbox"> 
														<span>Warning</span>
													</label>
												</div>

												<div class="ui-checkbox ui-checkbox-danger">
													<label>
														<input type="checkbox" checked> 
														<span>Danger</span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<p class="small text-warning text-uppercase text-normal">Variations</p>
											<p class="small mb15">Circle and Inline variation of checkbox attained with <code>ui-checkbox-circle</code> and <code>ui-checkbox-inline</code> respectively. Note that <code>ui-checkbox-inline</code> must be added to &lt;label&gt; element.</p>

											<div class="ui-checkbox ui-checkbox-primary">
												<label class="ui-checkbox-inline">
													<input type="checkbox" checked> 
													<span>One</span>
												</label>
												<label class="ui-checkbox-inline">
													<input type="checkbox"> 
													<span>Two</span>
												</label>
												<label class="ui-checkbox-inline">
													<input type="checkbox" checked> 
													<span>Three</span>
												</label>
											</div>

											<div class="ui-checkbox ui-checkbox-success ui-checkbox-circle">
												<label>
													<input type="checkbox" checked> 
													<span>Circle</span>
												</label>
											</div>


											<div class="ui-checkbox ui-checkbox-warning ui-checkbox-circle">
												<label>
													<input type="checkbox" checked> 
													<span>Another One</span>
												</label>
											</div>

										</div>

										<div class="col-md-4">
											<p class="small text-warning text-uppercase text-normal">Disabled</p>
											<p class="small mb15">Disabled states in different colors. Just add <code>disabled</code> attribute to input element.</p>
											<div class="ui-checkbox ui-checkbox-danger">
												<label>
													<input type="checkbox" disabled> 
													<span>No, don't check me</span>
												</label>
											</div>

											<div class="ui-checkbox ui-checkbox-danger">
												<label>
													<input type="checkbox" checked disabled> 
													<span>Already checked</span>
												</label>
											</div>

											<div class="ui-checkbox ui-checkbox-info ui-checkbox-circle">
												<label>
													<input type="checkbox" checked disabled> 
													<span>Circle One</span>
												</label>
											</div>
										</div>

									</div><!-- #end inner row -->
								</div> <!-- #end panel body -->
							</div> <!-- #end panel -->
						</div>
						
					</div>
					<!-- #end row -->


					<!-- row -->
					<!-- radio and toggles -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">Radios and Toggles</div>
								<div class="panel-body">
									<div class="row">

										<div class="col-md-4">
											<p class="small text-warning text-uppercase text-normal">Colors</p>
											<p class="small mb15">Similar to checkbox, radio can be customized by <code>ui-radio</code> class with respective color classes (<code>ui-radio-primary</code> etc.) </p>
											
											<div class="ui-radio ui-radio-pink">
												<label class="ui-radio-inline">
													<input type="radio" checked name="radioEg"> 
													<span>One</span>
												</label>
												<label class="ui-radio-inline">
													<input type="radio" name="radioEg"> 
													<span>Two</span>
												</label>

												<label class="ui-radio-inline">
													<input type="radio" name="radioEg"> 
													<span>Three</span>
												</label>
											</div>

											<div class="ui-radio ui-radio-danger">
												<label>
													<input type="radio"> 
													<span>Don't click me</span>
												</label>
											</div>

											<div class="ui-radio ui-radio-primary">
												<label>
													<input type="radio" checked> 
													<span>Primary</span>
												</label>
											</div>
										</div>

										<div class="col-md-4">
											<p class="small text-warning text-uppercase text-normal">Disabled</p>
											<p class="small mb15">Disabled states in different colors. Just add <code>disabled</code> attribute to input element.</p>

											<div class="ui-radio">
												<label>
													<input type="radio" disabled> 
													<span>Untoggled</span>
												</label>
											</div>

											<div class="ui-radio ui-radio-success">
												<label>
													<input type="radio" checked disabled> 
													<span>Toggled</span>
												</label>
											</div>
										</div>


										<div class="col-md-4">
											<p class="small text-warning text-uppercase text-normal">Switches</p>
											<p class="small mb15">Custom iOS like switches made with no external plugin. Replacement for radios. Just add class
											<code>ui-toggle</code> to the wrapped element.</p>
											
											<!-- small toggle -->
											<div class="ui-toggle ui-toggle-sm ui-toggle-pink mb10">
												<label class="ui-toggle-inline">
													<input type="checkbox"> 
													<span></span>
												</label>
												<label class="ui-toggle-inline">
													<input type="checkbox" checked> 
													<span></span>
												</label>
											</div>

											<!-- default toggle -->
											<div class="ui-toggle ui-toggle-primary">
												<label class="ui-toggle-inline">
													<input type="radio" name="toggleEg"> 
													<span></span>
												</label>

												<label class="ui-toggle-inline">
													<input type="radio" checked name="toggleEg"> 
													<span></span>
												</label>

												<label class="ui-toggle-inline">
													<input type="checkbox" checked disabled> 
													<span></span>
												</label>
											</div>

										</div>

									</div><!-- #end inner row -->
								</div> <!-- #end panel body -->
							</div> <!-- #end panel -->
						</div>

					</div>
					<!-- #end row -->


					<!-- row -->
					<!-- inline form -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">Inline Form</div>
								<div class="panel-body">
									<form class="form-inline" role="form">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon ion ion-email"></span>
												<input type="email" class="form-control" placeholder="Enter email here...">
											</div>
											<div class="input-group">
												<span class="input-group-addon ion ion-locked"></span>
												<input type="password" class="form-control" placeholder="Enter password here...">
											</div>
											<button type="submit" class="btn btn-primary">Login</button>
											<button type="button" class="btn btn-default">Register Now</button>
										</div>
									</form>
								</div> <!-- #end panel body -->
							</div> <!-- #end panel -->
						</div>

					</div>
					<!-- row -->


					<!-- row -->
					<div class="row">

						<div class="col-sm-12 col-md-6">
							
							<!-- date picker -->
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">Datepicker</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label small">Popup Picker</label>
										<div class="input-group date" id="datepickerDemo">
											<input type="text" class="form-control"/>
											<span class="input-group-addon">
												<i class=" ion ion-calendar"></i>
											</span>
										</div>
									</div>

									<!-- Inline Date picker-->
									<div class="form-group">
										<label class="control-label small">Inline Picker</label>
										<div class="clearfix">
											<div id="datepickerDemo1"></div>
										</div>
									</div>


								</div>
							</div>
						</div>
						

						<!-- Range Slider -->
						<div class="col-sm-12 col-md-6">
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">Sliders</div>
								<div class="panel-body">
									<p class="text-bold small mb20">Horizontal</p>
									<div class="form-group">
										<div class="left xsmall">0</div>
										<div class="right xsmall">200</div>
										<input id="sliderEx1" type="text" data-slider-min="0" data-slider-max="200" data-slider-step="1" data-slider-value="20">
									</div>

									<div class="form-group">
										<div class="left xsmall">0</div>
										<div class="right xsmall">20</div>
										<input id="sliderEx2" type="text" data-slider-enabled="false"
										data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="10">
									</div>

									<div class="form-group">
										<div class="left xsmall">0</div>
										<div class="right xsmall">20</div>
										<input id="sliderEx3" type="text" data-slider-handle="square"
										data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="5">
									</div>

									<div class="form-group">
										<div class="left xsmall">0</div>
										<div class="right xsmall">1000</div>
										<input id="sliderEx4" type="text" data-slider-min="10" data-slider-max="1000" data-slider-step="3"  data-slider-value="[250,650]">
									</div>
									<!-- vertical slider -->
									<p class="text-bold small mb20">Vertical</p>
									<div class="col-xs-2">
										<input  type="text" id="sliderEx5" data-slider-reversed="true" data-slider-min="-5" 
										data-slider-max="20" data-slider-step="1" data-slider-value="4" data-slider-orientation="vertical">
									</div>
									<div class="col-xs-2">
										<input  type="text" id="sliderEx6" data-slider-min="0" data-slider-max="20" 
										data-slider-step="1" data-slider-value="4" data-slider-orientation="vertical">
									</div>

									<div class="col-xs-2">
										<input  type="text" id="sliderEx7" data-slider-min="0" data-slider-max="40" 
										data-slider-step="2" data-slider-value="[5, 20]" data-slider-orientation="vertical">
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- #end row -->


					<!-- row -->
					<div class="row">
						<!-- text editor -->
						<div class="col-md-12">
							<div class="panel panel-default panel-hovered panel-stacked mb30">
								<div class="panel-heading">Text Editor</div>
								<div class="panel-body">
									<div id="textEditorDemo"></div>
								</div>
							</div>
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
	<script src="scripts/plugins/select2.min.js"></script>
	<script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
	<script src="scripts/plugins/bootstrap-slider.min.js"></script>
	<script src="scripts/plugins/summernote.min.js"></script>
	<script src="scripts/plugins/bootstrap-datepicker.min.js"></script>
	<script src="scripts/app.js"></script>
	<script src="scripts/form-elements.init.js"></script>


</body>
</html>