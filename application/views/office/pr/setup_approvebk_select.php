<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
$strDate = date("Y-m-d");
// echo "ThaiCreate.Com Time now : ".DateThai($strDate);
?>
<!-- Main content  trans-->
<div class="content-wrapper">

		<!-- Content area -->
		<div class="content">
			<!-- Highlighting rows and columns -->
			<div class="col-sm-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Booking</h5>
						<div class="heading-elements">
							<div style="text-align: right;">
							<a href="<?php echo base_url(); ?>data_master" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2" aria-hidden="true"></i> Close</a>
						</div>
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								<li><a data-action="reload"></a></li>
								<li><a data-action="close"></a></li>
							</ul>
						</div>
					</div>
					<div class="panel-body">
						<div class="tabbable">
							<ul class="nav nav-tabs nav-tabs-bottom">
								<li class="active"><a href="#bottom-tab1" data-toggle="tab">Project</a></li>
								<li><a href="#bottom-tab2" data-toggle="tab">Department</a></li>
								
							</ul>
							<div class="tab-content">
													
								<div class="tab-pane active" id="bottom-tab1">
									<table class="table table-hover table-bordered table-xxs datatable-basicc">
										<thead>
											<tr>
												<th>Project Code</th>
												<th>Project Name</th>
												<th class="text-center">Control BOQ</th>
												<th class="text-center">Control Budget</th>
												<th>Project Sub</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($getproj as $key => $value) {?>
											<tr>
												<td><?php echo $value->project_code; ?></td>
												<td><?php echo $value->project_name; ?></td>
												<td class="text-center"><?php  if($value->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
												<td class="text-center"><?php  if($value->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
												<td><a class="label label-warning" data-toggle="modal" data-target="#sub<?php echo $value->project_code;?>">Sub Project</a></td>
												<td><a href="<?php echo base_url(); ?>datastore/set_approve_select/<?php echo $value->project_code; ?>/p" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="bottom-tab2">
									<table class="table table-hover table-bordered table-xxs datatable-basicc" >
										<thead>
											<tr>
												<th>Department Code</th>
												<th>Department Name</th>
												<th class="text-center">Control BOQ</th>
												<th width="110px" class="text-center">Control Budget</th>
												
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
									<?php
										foreach ($getdep as $key => $data_dep) {
									?>
											<tr>
												<td><?= $data_dep->department_code ?></td>
												<td><?= $data_dep->department_title ?></td>
												<td class="text-center">
													<?php
														if ($data_dep->control_bqq != 0) {		
													?>		
														<input type="checkbox" checked="checked" disabled="disabled">
													<?php
														}else{
													?>
														<input type="checkbox" disabled="disabled">
													<?php
														}
														
													?>
												</td>
												<td class="text-center">
													<?php
														if ($data_dep->control_bg != 1) {		
													?>		
														<input type="checkbox" checked="checked" disabled="disabled">
													<?php
														}else{
													?>
														<input type="checkbox" disabled="disabled">
													<?php
														}
														
													?>
												</td>
												
												<td class="text-center">
													<a href="<?php echo base_url(); ?>datastore/set_approve_select/<?php echo $data_dep->department_id; ?>/d" class="label label-primary"><i class="icon-folder-open"></i> Select</a>
												</td>
											</tr>

									<?php
										}
									?>
										</tbody>
									</table>

								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- Highlighting rows and columns -->
			<!-- /highlighting rows and columns -->
		</div>
		<!-- /content area -->
	</div>
	<!-- /main content -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.datatable-basic').DataTable();

  $.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.datatable-basicc').DataTable();
</script>
<script type="text/javascript">
	$('#mpr').attr('class', 'active');
	$('#mpr').attr('style', 'background-color:#dedbd8');
</script>