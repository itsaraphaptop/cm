<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Company<p></p></h6>
						
					<div class="heading-elements">
									<!-- <a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=company.mrt" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a> -->
									<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</button>
									<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_remote"><i class="icon-printer4 position-right"></i> Print</button>
									<?php if($multicomp=="") {?>
									<?php }else{?>
									<a type="button" href="<?php echo base_url(); ?>datastore/newcompany" class="preload btn btn-info"><i class="icon-plus-circle2"></i> New</a>
									<?php } ?>
				          </div>	
						  </div>	
					<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-xxs table-hover datatable-basic">
							<thead>
								<tr>
									<th width="20%">Company Code</th>
									<th width="60%">Company Name</th>
									<!-- <th width="30%">Business Unit</th> -->
									<th width="20%">Active</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($res as $key => $value) { ?>
								<tr>
									<td class="text-center"><?php echo $value->compcode; ?></td>
									<td><?php if($value->company_name==''){echo $value->company_nameth;}else{echo $value->company_name;}  ?></td>
									<!-- <td><a href="<?php echo base_url(); ?>data_master/vender_business/<?php echo $value->compcode; ?>" class="label label-primary label-block"> Add</a></td> -->
									<!-- <td><a href="#" class="label label-warning label-block"> Picture</a></td> -->
									<td>
										<a href="<?php echo base_url(); ?>datastore/company/<?php echo $value->compcode; ?>"><i class="icon-pencil7"></i></a>
										<!-- <a href="<?php echo base_url(); ?>datastore_active/mark_delcomp/<?php echo $value->company_id; ?>"><i class="icon-trash"></i></a> -->
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
                        
						<div class="text-right">
							<br>
							<!-- <a href="<?php echo base_url(); ?>data_master" type="button" class="btn btn-default" name="button"> Close</a> -->
							<!-- <a id="fa_close" href="<?php echo base_url(); ?>data_master" class="btn bg-danger"><i class="icon-close2"></i> Close</a> -->
						</div>
						</div>
					</div>													
				</div>
			</div>
		</div>
	</div>
	<!-- /dashboard content -->
</div>
<style>
.modal-bodys {
 height: 650px;
}
</style>
 <!-- Remote source -->
	<div id="modal_remote" class="modal">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Print Form</h5>
				</div>

				<div class="modal-bodys"><div id="printshow"></div></div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div id="import" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
			<?php $this->load->helper('form'); ?>
			<?php echo form_open_multipart('import_company/do_upload');?>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Import Company</h5>
				</div>

				<div class="modal-body">
					<p>To see the required Excel format for importing companys and view some examples, choose a sample to download: </p>
					<div class="form-group">
						<a href="<?php echo base_url();?>sample/company.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
					</div>
					<p>To import companys, upload an Excel (.xls) file:</p>
					<div class="form-group">
						<input type="file" class="file-styled" id="file_upload" name="userfile">
					</div>
				</div>
				
				
				<div class="modal-footer">
					<button type="submit" class="uploadfile btn btn-success">Import File</button>
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				</div>
			<?php echo form_close();?>
			<div id="load"></div>
			</div>
		</div>
	</div>
<!-- /remote source -->

    <!-- /core JS files -->
    <script>
	$(".uploadfile").click(function(){
        $("#load").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
    });
	$("#printshow").load('<?php echo base_url();?>datastore/printcompany', function() {

            // Init Select2 when loaded
            $('.select').select2({
                minimumResultsForSearch: Infinity
            });
        });
    $.extend( $.fn.dataTable.defaults, {
         autoWidth: false,
         columnDefs: [{
             orderable: false,
             width: '100px',
             targets: [ 2 ]
         }],
         dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
         language: {
             search: '<span>Filter:</span> _INPUT_ ',
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
    $('#mg').attr('class', 'active');
	$('#mc1').attr('style', 'background-color:#dedbd8');
</script>
