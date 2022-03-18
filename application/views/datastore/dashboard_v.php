<div class="page-header page-header-transparent">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Master </span> - ระบบจัดการข้อมูลหลัก</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a href="/"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/data_master">Master</a></li>
							<li class="active">Dashboard</li>
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
					<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
				</div>

        <div class="content">

					<!-- Info alert -->
					<div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
						<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
						<h6 class="alert-heading text-semibold">Master components</h6>
						ระบบการจัดการข้อมูลเพื่อเพิ่มความสามารถในการจัดเก็บข้อมูลที่มีการเรียกใช้งานบ่อยครั้ง จึงทำให้สามารถเรียกใช้ข้อมูลได้ทันที.
				    </div>
				    <!-- /info alert -->


					<!-- Sidebars overview -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Master Overview</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
						<div class="panel-body">
							<p class="content-group">Sidebar - vertical area that displays onscreen and presents widget components and website navigation menu in a text-based hierarchical form. All sidebars are css-driven - just add one of css classes to the <code>body</code> tag and/or <code>.sidebar</code> container, and sidebar will change its width and color. No js, css only. Although sidebar type is based on css, buttons do their job with jQuery - they switch necessary classes in <code>&lt;body&gt;</code> tag. Below you'll find summarized tables with all available <code>button</code> and sidebar container classes. By default the template includes 6 different sidebar types and combinations:</p>

							<div class="content-group">
								<h6 class="text-semibold">1. Setup Project</h6>
								<p>Default template sidebar has <code>260px</code> width, aligned to the left (to the right in RTL version) and has dark blue background color. All navigation levels are based on accordion <strong>or</strong> collapsible functionality, open on click. Supports 2 versions: static and fixed. Fixed version can be used with native or custom scrollbars.</p>
							</div>

							<div class="content-group">
								<h6 class="text-semibold">2. Setup Material</h6>
								<p>Mini sidebar has <code>56px</code> width, no text in parent level of menu items, aligned to the left (to the right in RTL version) and has dark blue background color. Second navigation level opens on parent level hover, absolute positioned, other children levels are based on accordion or collapsible functionality, open on click. It is <strong>required</strong> to add <code>.sidebar-xs</code> class to the <code>&lt;body&gt;</code> tag. This class is responsible for sidebar width and main navigation. By default all components except main navigation are hidden in mini sidebar.</p>
							</div>

							<div class="content-group">
								<h6 class="text-semibold">3. Setup Vender</h6>
								<p>Main sidebar has <code>260px</code> width or <code>56px</code> (if <code>.sidebar-xs</code> class added). Secondary sidebar has fixed width of <code>260px</code>, which is identical to default and opposite sidebars, so different sidebar components can be placed to all these sidebars. Main and secondary sidebars can contain any content - menu, navigation, buttons, lists, tabs etc. In this type of sidebar only main sidebar is collapsible.</p>
							</div>

							<div class="content-group">
								<h6 class="text-semibold">4. Setup Cost Code</h6>
								<p>Double sidebar includes additional sidebar displayed on the opposite side of the main sidebar. It has a static position, appears as an additional component with 100% height and pushes content left/right. There are 2 different ways of displaying alternative sidebar: first - when it collapses main sidebar from default to mini width and second - when it hides the main sidebar. For these actions are responsible 2 different buttons - <code>.sidebar-opposite-toggle</code> and <code>.sidebar-opposite-fix</code>.</p>
							</div>

							<div class="content-group">
								<h6 class="text-semibold">5. Setup Employee</h6>
								<p>Dual and Double sidebars can be used together, so basically it is a 4 column layout. When opposite sidebar is shown, additional options are available: hide main sidebar, hide secondary sidebar, hide all sidebars or collapse main sidebar width. Since opposite sidebar is hidden by default, by manipulating classes you can display all 4 sidebars at once. Options are accessible via proper button and/or body classes.</p>
							</div>

							<div class="content-group">
								<h6 class="text-semibold">6. Setup Permission</h6>
								<p>Sidebar usually is not a part of content and mainly used for navigation. Limitless allows you to use sidebar outside and inside content area. Detached sidebar isn't based on grid and has the same width as other sidebars, this means all sidebar components can be placed inside detached sidebar. Supports left and right positioning.</p>
							</div>
						</div>
					</div>
					<!-- /sidebars overview -->
<br>
					<!-- Footer -->
					<div class="footer text-muted">
						© 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
