
<?php
require_once 'stimulsoft/helper.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Report Viewer</title>

	<!-- Report Office2013 style -->
	<link href="<?php echo base_url();?>stimulsoft/JS/css/stimulsoft.viewer.office2013.whiteteal.css" rel="stylesheet">

	<!-- Stimusloft Reports.JS -->
	<script src="<?php echo base_url();?>stimulsoft/JS/scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>stimulsoft/JS/scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	
	<?php StiHelper::initialize(); ?>
	<?php foreach ($report as $key => $value) {
		$report1 = $value->report1;
	}
	?>
	<script type="text/javascript">
		var options = new Stimulsoft.Viewer.StiViewerOptions();
		options.appearance.fullScreenMode = true;
		options.toolbar.showSendEmailButton = false;
		options.toolbar.showSaveButton = true;
		options.toolbar.showAboutButton = false;
		options.toolbar.zoom = 100;
		
		var viewer = new Stimulsoft.Viewer.StiViewer(options, "StiViewer", false);
		
		// Process SQL data source
		viewer.onBeginProcessData = function (event, callback) {
			<?php StiHelper::createHandler(); ?>
		}
		
		viewer.onBeginExportReport = function (args) {
			args.fileName = "MyReportName";
		}

	
		
		// Send exported report to server side
		/*viewer.onEndExportReport = function (event) {
			event.preventDefault = true; // Prevent client default event handler (save the exported report as a file)
			<?php StiHelper::createHandler(); ?>
		}*/
		
		// Send exported report to Email
		viewer.onEmailReport = function (event) {
			<?php StiHelper::createHandler(); ?>
		}
		
		// Load and show report
		var report = new Stimulsoft.Report.StiReport();
		report.loadFile('../stimulsoft/JS/reports/<?=$report1?>');
         report.setVariable('glyear',"<?=$glyear?>");
         report.setVariable('glperiodstart',"<?=$glperiodstart?>");
         report.setVariable('glperiodstop',"<?=$glperiodstop?>");
         report.setVariable('gl_type',"<?=$gl_type?>");
         report.setVariable('ac_codestart',"<?=$ac_codestart?>");
         report.setVariable('ac_codestop',"<?=$ac_codestop?>");
         report.setVariable('projectstart',"<?=$projectstart?>");
         report.setVariable('projectstop',"<?=$projectstop?>");
         report.setVariable('companycode',"<?=$companycode?>");
         report.setVariable('no',"<?=$no?>");
         report.setVariable('compcode',"<?=$compcode?>");
		 
		viewer.report = report;
		viewer.renderHtml("viewerContent");
	</script>
	</head>
<body>
	<div id="viewerContent"></div>
</body>
</html>
