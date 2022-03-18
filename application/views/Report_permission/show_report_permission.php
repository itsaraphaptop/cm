<?php
function delete_key($array) {
	return "";
}
?>

<style type="text/css">
	 
</style>
<meta charset="utf-8">
<div class="page-header page-header-transparent">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Report </span> - Permission</h4>
		</div>
		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
			</div>
		</div>
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
	</div>
	<div class="breadcrumb-line breadcrumb-line-component">
		<ul class="breadcrumb">
			<li><a class="preload" href="/"><i class="icon-home2 position-left"></i> Home</a></li>
			<li><a class="preload" href="<?php echo base_url(); ?>index.php/data_master">Master</a></li>
			<li class="active">Report Permission</li>
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
		<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
	</div>
</div>

<div class="">
	<!-- column 1 -->
	<div class="col-md-12">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<!-- <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Employee</h6> -->
				<div class="heading-elements">
					<ul class="icons-list">
					</ul>
				</div>
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
				<div class="panel-body wrapper" >
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<fieldset class="fieldset-info">
									<legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> SHOW module</h4></legend>
									<div class="container-fluid">
										<div class="row" style="overflow: scroll;">
													<table class="table table-hover" id="mytable" >
														<thead>
														<tr>
															<td class="headcol">Module</td>
															<?php echo "<td class='long'>" . implode("</td><td class='long'>", $user_array) . "</td>"; ?>
															<?php $null_col = array_map("delete_key", $user_array);?>
														</tr>
														</thead>
														<tbody>
														<?php foreach ($all_data as $Module_Name => $sub_module) {?>
														<tr style="background-color: #a3d194;color: #FFFFFF ;">
															<td class="headcol"><?=$Module_Name?></td>
															<?php //echo "<td>" . implode("</td><td>", $null_col) . "</td>"; ?>
															<?php echo "<td class='long'>" . implode("</td><td >", $user_array) . "</td>"; ?>
														</tr>
														<?php foreach ($sub_module as $sub_item => $read) {?>
														<tr>
															<td class="headcol" style="text-indent: 35px;"><?=$sub_item?></td>
															<?php echo "<td class='long'>" . implode("</td><td class='long'>", $read['read']) . "</td>"; ?>
														</tr>
														<?php }?>
														<?php }?>
														</tbody>
													</table>
												
										</div>
									</div>
								</fieldset>
								<br>
							</div>
						</div>
					</fieldset>
					<button id="btnExport">Export to xls</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">



var date = "<?=date("YmdHis") ?>";
// $(document).ready(function() {
	$("#btnExport").click(function(e) {
		e.preventDefault();
		//getting data from our table
		var data_type = 'data:application/vnd.ms-excel';
		var table_div = document.getElementById('table_wrapper');
		var table_html = table_div.outerHTML.replace(/ /g, '%20');
		var a = document.createElement('a');
		a.href = data_type + ', ' + table_html;
		a.download = 'report_permission' + date + '.xls';
		a.click();
	});
// });
</script>
