<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Master - NinjaERP Business Intelligence</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js">
    </script>
    <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js">
    </script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/ui/prism.min.js">
    </script>

    <script type="text/javascript" src="assets/js/core/app.js">
    </script>
    <script type="text/javascript" src="assets/js/pages/sidebar_detached_sticky_native.js">
    </script>
    <!-- /theme JS files -->

</head>

<body data-spy="scroll" data-target=".sidebar-detached" class="has-detached-right">

    <!-- Main navbar -->
    <div class="navbar navbar-default navbar-lg header-highlight">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>comp/<?php echo $compimg;?>"
                    alt=""></a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                <li><a class="sidebar-mobile-detached-toggle"><i class="icon-grid7"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-hide hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
                <li><a class="sidebar-control sidebar-detached-hide hidden-xs"><i class="icon-drag-right"></i></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url(); ?>history_update">Master <span class="label label-inline bg-warning-400 position-right">v.
                            1.0</span></a></li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-main">
                <div class="sidebar-content">

                    <!-- Support -->
                    <div class="sidebar-category no-margin">
                        <div class="category-title">
                            <span>Have questions?</span>
                            <i class="icon-help text-muted pull-right"></i>
                        </div>

                        <div class="category-content">
                            <a href="http://master.in.th" class="btn bg-success-400 btn-block" target="_blank"><i class="icon-lifebuoy position-left"></i>
                                Master support</a>
                        </div>
                    </div>
                    <!-- /support -->


                    <!-- Main navigation -->
                    <div class="sidebar-category">
                        <div class="category-title">
                            <span>Navigation</span>
                            <i class="icon-menu7 text-muted pull-right"></i>
                        </div>

                        <div class="category-content no-padding">
                            <ul class="navigation navigation-main navigation-accordion">

                                <!-- Main -->
                                <li class="navigation-header">Main</li>
                                <li><a href="<?php echo base_url(); ?>">Introduction</a></li>

                                <li><a href=" #">Sources
                                        and credits</a></li>
                                <li class="active"><a href="<?php echo base_url(); ?>">Changelog <span class="label bg-warning-400">version
                                            1.0</span></a></li>
                                <!-- /main -->

                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Master</span>
                                - Changelog</h4>
                        </div>

                        <div class="heading-elements">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo base_url();?>"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li class="active">Changelog</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Detached content -->
                    <div class="container-detached">
                        <div class="content-detached">

                            <!-- Version 1.0 -->
                            <div class="panel panel-flat" id="v_1_0">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Version 1.0</h5>
                                    <div class="heading-elements">
                                        <span class="text-muted heading-text">October 21, 2015</span>
                                        <span class="label bg-blue heading-text">v. 1.0</span>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="content-group-lg">
                                        <p class="content-group">First update is the most simplified and includes
                                            urgent bug fixes of core components, plugins and libraries. Also version
                                            1.0 includes updates of some components to the latest stable versions. The
                                            only new thing here is RTL version of all 4 layouts, that support almost
                                            all available components and layout features. Below you can find general
                                            list of all changes and details about upgrading.</p>

                                        <pre class="language-javascript"><code>// Newly added
[new] RTL layout for all 4 main layout variations
[new] bootbox.less - new LESS file for extended Bootstrap modal dialogs

// Updated components
[updated] CKEditor - latest version
[updated] Select2 - latest 3.5.x version, 4.0 is coming
[updated] Bootstrap Multiselect - latest version
[updated] Datatables - latest version

// Core fixes
[fixed] Sidebar - side border overlaped content in light sidebar (layout 1 and 2)
[fixed] Breadcrumbs - in colored version links had wrong background color on hover/active
[fixed] Breadcrumbs - dropdown menu didn't have borders in breadcrumb line component
[fixed] Labels - striped labels didn't have right border variation as supposed to
[fixed] Navbars - unnecessary dropdown menu re-position in navbar component
[fixed] Button groups - extra space between buttons in toolbar
[fixed] Tables - extra border in framed table in responsive table container

// Components fixes
[fixed] Bootstrap Select - wrong rounded corners inside input group
[fixed] Bootstrap Select - no styling of dropdown menu
[fixed] SelectBox - wrong rounded corners inside input group
[fixed] Tags Input - input field didn't have bottom spacing
[fixed] Typeahead - small menu width if text options are too short
[fixed] Sweet alerts - title was too big for motification size
[fixed] Anytime picker - wrong title margin and unnecessary close button
[fixed] jQuery UI Datepicker - extra RTL-related code in less file
[fixed] Fullcalendar - extra RTL-related code in less file
[fixed] Chats - wrong variables in LESS file
[fixed] Dropzone Uploader - success/error markers moved down in thumbnails is name is visible
[fixed] Colors - default BS styles overrided text hover state
[fixed] SelectBox page - extra panel control buttons
</code></pre>
                                    </div>

                                    <h6 class="text-semibold">Updated plugins and libraries</h6>
                                    This section displays a list of components, that have been updated to the latest
                                    stable versions. Includes file or directory name and descriptions with details. To
                                    keep your version up-to-date, i strongly recommend to replace your current copies
                                    to the updated ones, because all future updates of main and related files will be
                                    based on latest versions of these files.
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-3">What</th>
                                                <th>File</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>CKEditor</td>
                                                <td><code>ckeditor/</code></td>
                                                <td>Updated to the latest version and added additional languages with
                                                    new configuration file</td>
                                            </tr>
                                            <tr>
                                                <td>Select2</td>
                                                <td><code>select2.min.js</code></td>
                                                <td>Updated to the latest 3.5.x version. Version 4.0 will be added in
                                                    the next update</td>
                                            </tr>
                                            <tr>
                                                <td>Bootstrap Multiselect</td>
                                                <td><code>bootstrap_multiselect.js</code></td>
                                                <td>Updated to the latest version, also updated related <code>form_multiselect.js</code>
                                                    file</td>
                                            </tr>
                                            <tr>
                                                <td>Datatables</td>
                                                <td><code>datatables.min.js</code></td>
                                                <td>Updated to the latest version (1.00.9)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="panel-body">
                                    <h6 class="text-semibold">LESS files to update</h6>
                                    This section displays a list of updated LESS files. Includes file name, path to
                                    this file and general description about changes. All list items are grouped in
                                    categories. Groups along with file paths allow you to quickly find and replace
                                    necessary files. Please keep your copies of LESS files always up-to-date to avoid
                                    upgrading issues.
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 320px;">File</th>
                                                <th style="width: 320px;">Location</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th colspan="3" class="active">Core files</th>
                                            </tr>
                                            <tr>
                                                <td><code>type.less</code></td>
                                                <td>/less/bootstrap-Master/</td>
                                                <td>Blockquote styling improvement, variables instead of values in page
                                                    title and mark</td>
                                            </tr>
                                            <tr>
                                                <td><code>navs.less</code></td>
                                                <td>/less/bootstrap-Master/</td>
                                                <td>Fixed extra bottom space in justified tabs and pills</td>
                                            </tr>
                                            <tr>
                                                <td><code>breadcrumbs.less</code></td>
                                                <td>/less/bootstrap-Master/</td>
                                                <td>Fixed link hover state background in colored breadcrumb line, added
                                                    border to dropdown menu in breadcrumb line component in 1st layout</td>
                                            </tr>
                                            <tr>
                                                <td><code>labels.less</code></td>
                                                <td>/less/bootstrap-Master/</td>
                                                <td>Added missed right border option in striped labels</td>
                                            </tr>
                                            <tr>
                                                <td><code>navbar.less</code></td>
                                                <td>/less/bootstrap-Master/</td>
                                                <td>Removed extra dropdown menu positioning in navbar component</td>
                                            </tr>
                                            <tr>
                                                <td><code>button-groups.less</code></td>
                                                <td>/less/bootstrap-Master/</td>
                                                <td>Removed extra spacing between buttons in button toolbar</td>
                                            </tr>
                                            <tr>
                                                <td><code>tables.less</code></td>
                                                <td>/less/bootstrap-Master/</td>
                                                <td>Removed border in framed table on mobile, if used inside BS's
                                                    responsive table container</td>
                                            </tr>
                                            <tr class="border-solid">
                                                <td><code>colors.less</code></td>
                                                <td>/less/core/colors/</td>
                                                <td>Fixed BS overrides of text color if used in label/badges or links
                                                    on hover</td>
                                            </tr>
                                            <tr>
                                                <td><code>sidebar.less</code></td>
                                                <td>/less/core/layout/</td>
                                                <td>Fixed fixed light sidebar issue, when content overlapped the border
                                                    in 1st and 2nd layouts; removed extra border from tabs inside
                                                    sidebar on mobile; improved dropdown position in justified tabs
                                                    used in sidebar</td>
                                            </tr>

                                            <tr>
                                                <th colspan="3" class="active">Forms</th>
                                            </tr>
                                            <tr>
                                                <td><code>bootstrap-select.less</code></td>
                                                <td>/less/components/plugins/forms/menus/</td>
                                                <td>Fixed wrong round corners if used inside input group; added styles
                                                    for menu header</td>
                                            </tr>
                                            <tr>
                                                <td><code>select2.less</code></td>
                                                <td>/less/components/plugins/forms/menus/</td>
                                                <td>Removed unnecessary RTL-related code; fixed text color in search
                                                    field (menu with custom color)</td>
                                            </tr>
                                            <tr>
                                                <td><code>selectbox.less</code></td>
                                                <td>/less/components/plugins/forms/menus/</td>
                                                <td>Removed extra border radius from main container; fixed wrong round
                                                    corners if used inside input group</td>
                                            </tr>
                                            <tr>
                                                <td><code>bootstrap-switch.less</code></td>
                                                <td>/less/components/plugins/forms/checkboxes/</td>
                                                <td>Variables instead of values</td>
                                            </tr>
                                            <tr>
                                                <td><code>tags-input.less</code></td>
                                                <td>/less/components/plugins/forms/tags/</td>
                                                <td>Fixed issue when empty input had smaller height</td>
                                            </tr>
                                            <tr>
                                                <td><code>typeahead.less</code></td>
                                                <td>/less/components/plugins/forms/extensions/</td>
                                                <td>Added minimum width to menu, so it won't be too narrow if option
                                                    text is short</td>
                                            </tr>

                                            <tr>
                                                <th colspan="3" class="active">Pickers</th>
                                            </tr>
                                            <tr>
                                                <td><code>daterange.less</code></td>
                                                <td>/less/components/plugins/pickers/</td>
                                                <td>Minor improvements</td>
                                            </tr>
                                            <tr>
                                                <td><code>bootstrap-datepicker.less</code></td>
                                                <td>/less/components/plugins/pickers/</td>
                                                <td>Minor improvements</td>
                                            </tr>
                                            <tr>
                                                <td><code>anytime.less</code></td>
                                                <td>/less/components/plugins/pickers/</td>
                                                <td>Removed close button and improved visibility of title</td>
                                            </tr>
                                            <tr>
                                                <td><code>datepicker.less</code></td>
                                                <td>/less/components/extensions/jquery_ui/</td>
                                                <td>Fixed trigger image appearance; added correct spacing between year
                                                    and month; fixed inline picker width if used inside popover</td>
                                            </tr>

                                            <tr>
                                                <th colspan="3" class="active">Other</th>
                                            </tr>
                                            <tr>
                                                <td><code>sweet-alert.less</code></td>
                                                <td>/less/components/plugins/notifications/</td>
                                                <td>Improved notification title</td>
                                            </tr>
                                            <tr>
                                                <td><code>fullcalendar.less</code></td>
                                                <td>/less/components/plugins/ui/</td>
                                                <td>Removed RTL-related code, which has its own version in RTL layout
                                                    version</td>
                                            </tr>
                                            <tr>
                                                <td><code>dropzone.less</code></td>
                                                <td>/less/components/plugins/uploaders/</td>
                                                <td>Fixed success/error marks position, when thumbnail name is visible</td>
                                            </tr>
                                            <tr>
                                                <td><code>chats.less</code></td>
                                                <td>/less/components/pages/</td>
                                                <td>Fixed wrong variables in chats list</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="panel-body">
                                    <h6 class="text-semibold">HTML files to update</h6>
                                    List of updated HTML files. . Since static HTML files aren't used much in the end
                                    product, this list isn't really a mandatory thing and isn't as important as LESS or
                                    JS files updates, this is more for information about changes in features and
                                    content. Keeping HTML files isn't required, but recommended.
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 320px;">File</th>
                                                <th style="width: 320px;">Location</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th colspan="3" class="active">HTML files</th>
                                            </tr>
                                            <tr>
                                                <td><code>extension_velocity_basic.html</code></td>
                                                <td>/</td>
                                                <td>Removed unnecessary <code>.bg-sky</code> class from markup</td>
                                            </tr>
                                            <tr>
                                                <td><code>form_validation.html</code></td>
                                                <td>/</td>
                                                <td>Added validation of input field with icons</td>
                                            </tr>
                                            <tr>
                                                <td><code>form_select_box_it.html</code></td>
                                                <td>/</td>
                                                <td>Removed extra icons from panel control buttons in 1 panel</td>
                                            </tr>
                                            <tr>
                                                <td><code>navigation_horizontal_disabled.html</code></td>
                                                <td>/</td>
                                                <td>Removed unnecesssary <code>.border-left-lg</code> from syntax
                                                    highlighter</td>
                                            </tr>
                                            <tr>
                                                <td><code>components_sliders.html</code></td>
                                                <td>/</td>
                                                <td>Removed repeated path to <code>touch punch</code> extension</td>
                                            </tr>
                                            <tr>
                                                <td><code>tables_responsive.html</code></td>
                                                <td>/</td>
                                                <td>Fixed table header issue in <strong>Header groups</strong> table</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="panel-body">
                                    <h6 class="text-semibold">JS files to update</h6>
                                    These are all JS files that have been changed during update process. It can be a
                                    library, plugin or a sample JS file with charts or specific page configuration -
                                    everything matters. Also includes file name, path to the file and brief description
                                    about changes made. Since JS files are responsible for template's functionality, it
                                    is required to keep the up-to-date.
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 320px;">File</th>
                                                <th style="width: 320px;">Location</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th colspan="3" class="active">To update</th>
                                            </tr>
                                            <tr>
                                                <td><code>form_multiselect.js</code></td>
                                                <td>/js/pages/</td>
                                                <td>Removed unnecessary <code>.bg-sky</code> class from markup</td>
                                            </tr>
                                            <tr>
                                                <td><code>form_validation.js</code></td>
                                                <td>/js/pages/</td>
                                                <td>Added additional error placement rule for input with icon
                                                    validation</td>
                                            </tr>
                                            <tr>
                                                <td><code>touch_punch.min.js</code></td>
                                                <td>/js/plugins/sliders/</td>
                                                <td>Removed from the folder as a repeated file</td>
                                            </tr>
                                            <tr>
                                                <td><code>sidebar-components.js</code></td>
                                                <td>/js/pages/</td>
                                                <td>Removed extra jQuery UI slider configuration</td>
                                            </tr>
                                            <tr>
                                                <td><code>app.js</code></td>
                                                <td>/js/core</td>
                                                <td>Excluded language selection dropdown menu from dynamically added
                                                    <code>.active</code> class</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /version 1.0 -->


                            <!-- Initial release -->
                            <div class="panel panel-flat" id="release">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Initial release</h5>
                                    <div class="heading-elements">
                                        <span class="heading-text text-muted">October 1, 2015</span>
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    Master is in active development. All updates will be properly documented and
                                    explained, to make your upgrade process as easy as possible. In all new updates
                                    will be included: bug fixing, new functionality, plugins version control and code
                                    improvement. Feel free to contact me if you have any suggestions or requests!
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-3">What</th>
                                                <th>Quantity</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th colspan="3" class="active">Core files</th>
                                            </tr>
                                            <tr>
                                                <td>Folders</td>
                                                <td>268</td>
                                                <td>Folders with files, excluding CKEditor and Starter kit folders</td>
                                            </tr>
                                            <tr>
                                                <td>HTML files</td>
                                                <td>249</td>
                                                <td>Depending on layout, around 249 main HTML files in each layout</td>
                                            </tr>
                                            <tr>
                                                <td>CSS files</td>
                                                <td>7</td>
                                                <td>4 main CSS files, 2 CSS for icon fonts and 1 <code>animate.min.css</code>
                                                    animation library</td>
                                            </tr>
                                            <tr>
                                                <td>LESS files</td>
                                                <td>203</td>
                                                <td>All LESS files, including Bootstrap core</td>
                                            </tr>
                                            <tr>
                                                <td>JS files</td>
                                                <td>896</td>
                                                <td>All JS files, excluding starter kit and CKEditor folders</td>
                                            </tr>
                                            <tr>
                                                <td>Image files</td>
                                                <td>256</td>
                                                <td>Logos, flag icons and notification icons</td>
                                            </tr>
                                            <tr>
                                                <th colspan="3" class="active">Other files</th>
                                            </tr>
                                            <tr>
                                                <td>JSON files</td>
                                                <td>23</td>
                                                <td>Different demo data sources. For demo purposes</td>
                                            </tr>
                                            <tr>
                                                <td>CSV files</td>
                                                <td>11</td>
                                                <td>Mainly for charts based on <code>D3.js</code> library. For demo
                                                    purposes</td>
                                            </tr>
                                            <tr>
                                                <td>TSV files</td>
                                                <td>13</td>
                                                <td>Mainly for charts based on <code>D3.js</code> library. For demo
                                                    purposes</td>
                                            </tr>
                                            <tr>
                                                <td>SWF files</td>
                                                <td>3</td>
                                                <td>Additional files for datatables TableTools extension and Plupload
                                                    file uploader</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /initial release -->

                        </div>
                    </div>
                    <!-- /detached content -->


                    <!-- Detached sidebar -->
                    <div class="sidebar-detached">
                        <div class="sidebar sidebar-default">
                            <div class="sidebar-content">

                                <!-- Contact author -->
                                <div class="sidebar-category no-margin">
                                    <div class="category-title">
                                        <span>Page navigation</span>
                                        <i class="icon-menu7 text-muted pull-right"></i>
                                    </div>

                                    <div class="category-content">
                                        <a href="http://master.in.th" class="btn bg-blue btn-block" target="_blank"><i
                                                class="icon-reading position-left"></i> Contact author</a>
                                    </div>
                                </div>
                                <!-- /contact author -->


                                <!-- Navigation -->
                                <div class="sidebar-category">
                                    <div class="category-content no-padding">
                                        <ul class="nav navigation no-padding-top">
                                            <li class="navigation-header"><i class="icon-history pull-right"></i>
                                                Version history</li>
                                            <li><a href="#v_1_0">Version 1.0 <span class="text-muted text-regular pull-right">20.08.2018</span></a></li>
                                            <li><a href="#release">Initial release <span class="text-muted text-regular pull-right">20.08.2018</span></a></li>
                                            <li><a href="#roadmap">Roadmap</a></li>
                                            <li class="navigation-divider"></li>
                                            <li><a href="#">Go to top <i class="icon-circle-up2 pull-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /navigation -->

                            </div>
                        </div>
                    </div>
                    <!-- /detached sidebar -->


                    <!-- Footer -->
                    <div class="footer text-muted">
                        &copy; 2018. <a href="#">Master NinjaERP Business Intelligence App</a> by <a href="http://master.in.th"
                            target="_blank">Master Development</a>
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>

</html>