
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
		// viewer.onEmailReport = function (event) {
		// 	<?php StiHelper::createHandler(); ?>
		// }
		
		// Load and show report
		var report = new Stimulsoft.Report.StiReport();
		report.loadFile('../stimulsoft/JS/reports/<?=$report1?>');
         report.setVariable('var1',"<?=$var1?>");
         report.setVariable('var2',"<?=$var2?>");
         report.setVariable('var3',"<?=$var3?>");
         report.setVariable('var4',"<?=$var4?>");
         report.setVariable('var5',"<?=$var5?>");
         report.setVariable('var6',"<?=$var6?>");
         report.setVariable('var7',"<?=$var7?>");
         report.setVariable('var8',"<?=$var8?>");
         report.setVariable('var9',"<?=$var9?>");
         report.setVariable('var10',"<?=$var10?>");
         report.setVariable('data',0);
         report.setVariable('data2',0);
         report.setVariable('sumall_qty',0);
         report.setVariable('sumall_amt',0);
		var variables = new Stimulsoft.Report.Dictionary.StiVariable();
		variables.name = "compcode";
		variables.alias = "compcode";
		variables.Type = Stimulsoft.System.StimulsoftType;
		variables.requestFromUser = false;
		variables.value = "<?=$var1?>";
		report.dictionary.variables.add(variables);
        
		viewer.report = report;
		viewer.renderHtml("viewerContent");
	</script>
	</head>
<body>
	<div id="viewerContent"></div>
</body>
</html>
