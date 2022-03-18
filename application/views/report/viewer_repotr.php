
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
	}?>
	<script type="text/javascript">
		var options = new Stimulsoft.Viewer.StiViewerOptions();
		options.appearance.fullScreenMode = true;
		options.toolbar.showSendEmailButton = true;
		options.toolbar.showSaveButton = false;
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
		report.setVariable('var1',"<?=$var1?>");
		report.setVariable('var2',"<?=$var2?>");
		report.setVariable('var3',"<?=$var3?>");
		report.setVariable('var4',"<?=$var4?>");
		report.setVariable('var9',"<?=$var9?>");
		report.setVariable('var10',"<?=$var10?>");
		report.setVariable('var11',"<?=$var11?>");
		report.setVariable('var12',"<?=$var12?>");
		report.setVariable('start',"<?=$start?>");
		report.setVariable('end',"<?=$end?>");
		report.setVariable('proid',"<?=$proid?>");
		report.setVariable('buyn',"<?=$buyn?>");
		report.setVariable('type',"<?=$type?>");
		report.setVariable('session',"<?=$session?>");
		report.setVariable('wherepr',"<?=$wherepr?>");
		report.setVariable('wherepc',"<?=$wherepc?>");
		report.setVariable('date1',"<?=$date1?>");
		report.setVariable('date2',"<?=$date2?>");
		report.setVariable('compcode',"<?=$compcode?>");
		report.setVariable('get_doc','<?=$get_doc?>');
		report.setVariable('get_date','<?=$get_date?>');
		report.setVariable('st','<?=$st?>');
		report.setVariable('status','<?=$status?>');
		report.setVariable('query','<?=$query?>');
		report.setVariable('where',"<?=$where?>");
		report.setVariable('docs','<?=$docs?>');
		report.setVariable('doce','<?=$doce?>');
		report.setVariable('session_neme','<?=$session_neme?>');
		report.setVariable('date_pc','<?=$date_pc?>');
		report.setVariable('where_name','<?=$where_name?>');
		report.setVariable('limit_where','<?=$limit_where?>');
		report.setVariable('date_po','<?=$date_po?>');
		report.setVariable('date_wo','<?=$date_wo?>');
		report.setVariable('select','<?=$select?>');
		report.setVariable('date','<?=$date?>');
		report.setVariable('project','<?=$project?>');
		report.setVariable('pono','<?=$pono?>');
		report.setVariable('balance','<?=$balance?>');
		report.setVariable('get_dateend','<?=$get_dateend?>');
		
		viewer.report = report;
		viewer.renderHtml("viewerContent");

	</script>
	</head>
<body>
	<div id="viewerContent"></div>
</body>
</html>
