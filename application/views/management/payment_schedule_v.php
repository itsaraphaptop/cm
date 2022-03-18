
		<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Payment Schedule</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="extension_fullcalendar_formats.html">Payment Schedule</a></li>
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
<div class="row">
	<div class="col-md-9">
					<!-- Internationalization -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Payment Schedule</h5>
							<div class="heading-elements">
								<form class="heading-form" action="#">
									<div class="form-group">
										<select id="lang-selector" class="select" data-placeholder="Select language"></select>
									</div>
								</form>
		                	</div>
						</div>

						<div class="panel-body">

							<div class="fullcalendar-languages"></div>
						</div>
					</div>
					<!-- /internationalization -->
	</div>
	<div class="col-xs-3">
		<div class="panel panel-flat bg-blue-400">
								<div class="panel-heading">
									<h6 class="panel-title"><i class=" icon-cash position-left"></i> Cash Flow</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">

								    <ul class="timer mb-10">
								        <li>
								        	200,000,000 <span>บาท</span>
								        </li>

								    </ul>
							    </div>

						    	<div class="panel-footer">


									<ul class="pull-right">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Open <span class="caret"></span></a>
											<ul class="dropdown-menu dropdown-menu-right active">
												<li class="active"><a href="#">Open</a></li>
												<li><a href="#">On hold</a></li>
												<li><a href="#">Resolved</a></li>
												<li><a href="#">Closed</a></li>
												<li class="divider"></li>
												<li><a href="#">Dublicate</a></li>
												<li><a href="#">Invalid</a></li>
												<li><a href="#">Wontfix</a></li>
											</ul>
										</li>
									</ul>
								</div>
		</div>

		<div class="panel panel-flat bg-pink-400">
								<div class="panel-heading">
									<h6 class="panel-title"><i class=" icon-cash position-left"></i> Payment Overhead</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
<?php foreach ($sumnetamt as $n) {
	$sumnet = $n->netamt;
} ?>
								<div class="panel-body">
								    <ul class="timer mb-10">
								        <li>
								        	<?php echo number_format($sumnet,2); ?> <span>บาท</span>
								        </li>
								    </ul>

							    </div>

						    	<div class="panel-footer">


									<ul class="pull-right">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Open <span class="caret"></span></a>
											<ul class="dropdown-menu dropdown-menu-right active">
												<li class="active"><a href="#">Open</a></li>
												<li><a href="#">On hold</a></li>
												<li><a href="#">Resolved</a></li>
												<li><a href="#">Closed</a></li>
												<li class="divider"></li>
												<li><a href="#">Dublicate</a></li>
												<li><a href="#">Invalid</a></li>
												<li><a href="#">Wontfix</a></li>
											</ul>
										</li>
									</ul>
								</div>
		</div>

		<div class="panel panel-flat bg-orange-400">
								<div class="panel-heading">
									<h6 class="panel-title"><i class=" icon-cash position-left"></i> Receive </h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">
								    <ul class="timer mb-10">
								        <li>
								        	5,000,000 <span>บาท</span>
								        </li>
								    </ul>
								    <div id="server-load"></div>
							    </div>

						    	<div class="panel-footer">


									<ul class="pull-right">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Open <span class="caret"></span></a>
											<ul class="dropdown-menu dropdown-menu-right active">
												<li class="active"><a href="#">Open</a></li>
												<li><a href="#">On hold</a></li>
												<li><a href="#">Resolved</a></li>
												<li><a href="#">Closed</a></li>
												<li class="divider"></li>
												<li><a href="#">Dublicate</a></li>
												<li><a href="#">Invalid</a></li>
												<li><a href="#">Wontfix</a></li>
											</ul>
										</li>
									</ul>
								</div>
		</div>

		<div class="panel invoice-grid">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-6">
											<h6 class="text-semibold no-margin-top">Leonardo Fellini</h6>
											<ul class="list list-unstyled">
												<li>Invoice #: &nbsp;0028</li>
												<li>Issued on: <span class="text-semibold">2015/01/25</span></li>
											</ul>
										</div>

										<div class="col-sm-6">
											<h6 class="text-semibold text-right no-margin-top">$8,750</h6>
											<ul class="list list-unstyled text-right">
												<li>Method: <span class="text-semibold">SWIFT</span></li>
												<li class="dropdown">
													Status: &nbsp;
													<a href="#" class="label bg-danger-400 dropdown-toggle" data-toggle="dropdown">Overdue <span class="caret"></span></a>
													<ul class="dropdown-menu dropdown-menu-right active">
														<li class="active"><a href="#"><i class="icon-alert"></i> Overdue</a></li>
														<li><a href="#"><i class="icon-alarm"></i> Pending</a></li>
														<li><a href="#"><i class="icon-checkmark3"></i> Paid</a></li>
														<li class="divider"></li>
														<li><a href="#"><i class="icon-spinner2 spinner"></i> On hold</a></li>
														<li><a href="#"><i class="icon-cross2"></i> Canceled</a></li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="panel-footer">
									<ul>
										<li><span class="status-mark border-danger position-left"></span> Due: <span class="text-semibold">2015/02/25</span></li>
									</ul>

									<ul class="pull-right">
										<li><a href="#" data-toggle="modal" data-target="#invoice"><i class="icon-eye8"></i></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="#"><i class="icon-printer"></i> Print invoice</a></li>
												<li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
												<li class="divider"></li>
												<li><a href="#"><i class="icon-file-plus"></i> Edit invoice</a></li>
												<li><a href="#"><i class="icon-cross2"></i> Remove invoice</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
	</div>
</div>



					 <!-- Footer -->
				          <div class="footer text-muted">
				            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
				          </div>
          			<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

<script>
var events = [

		{
				title: 'Long Event',
				start: '2014-11-07',
				end: '2014-11-10'
		},
		{
				id: 999,
				title: 'Repeating Event',
				start: '2014-11-09T16:00:00'
		},
		{
				id: 999,
				title: 'Repeating Event',
				start: '2014-11-16T16:00:00'
		},
		{
				title: 'Conference',
				start: '2014-11-11',
				end: '2014-11-13'
		},
		{
				title: 'Meeting',
				start: '2014-11-12T10:30:00',
				end: '2014-11-12T12:30:00'
		},
		{
				title: 'Lunch',
				start: '2014-11-12T12:00:00'
		},
		{
				title: 'Meeting',
				start: '2014-11-12T14:30:00'
		},
		{
				title: 'Happy Hour',
				start: '2014-11-12T17:30:00'
		},
		{
				title: 'Dinner',
				start: '2014-11-12T20:00:00'
		},
		{
				title: 'Birthday Party',
				start: '2014-11-13T07:00:00'
		},
		{
				title: 'Click for Google',
				url: 'http://google.com/',
				start: '2014-11-28'
		}
];



// Date formats
// ------------------------------

$('.fullcalendar-formats').fullCalendar({
		header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
		},
		titleFormat: {
				month: 'LL', // September 2009
				week: "MMM Do YY", // Sep 13 2009
				day: 'dddd'  // September 8
		},
		columnFormat: {
				month: 'dddd', // January
				week: 'ddd D', // Mon 7
				day: 'dddd' // Monday
		},
		timeFormat: 'h(:mm) a', // uppercase H for 24-hour clock
		defaultDate: '2014-11-12',
		editable: true,
		events: events
});



// Internationalization
// ------------------------------

// Set default language
var currentLangCode = 'en';


// Build the language selector's options
$.each($.fullCalendar.langs, function(langCode) {
		$('#lang-selector').append(
				$('<option/>')
				.attr('value', langCode)
				.prop('selected', langCode == currentLangCode)
				.text(langCode)
		);
});


// Re-render the calendar when the selected option changes
$('#lang-selector').on('change', function() {
		if (this.value) {
				currentLangCode = this.value;
				$('.fullcalendar-languages').fullCalendar('destroy');
				renderCalendar();
		}
});


// Render calendar
renderCalendar();
function renderCalendar() {
		$('.fullcalendar-languages').fullCalendar({
				header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
				},
				defaultDate: new Date(),
				lang: currentLangCode,
				buttonIcons: false, // show the prev/next text
				weekNumbers: true,
				editable: true,
				events: '<?php echo base_url(); ?>management/testdata'
		});
}

</script>
