<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Business Unit<p></p></h6>
						
					<div class="heading-elements">
									<!-- <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</button>
									<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_remote"><i class="icon-printer4 position-right"></i> Print</button> -->
									<?php if($multicomp=="") {?>
									<?php }else{?>
									<a type="button" href="<?php echo base_url(); ?>data_master/new_bussiness" class="preload btn btn-info"><i class="icon-plus-circle2"></i> New</a>
									<?php } ?>
				          </div>	
						  </div>	
					<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-xxs table-hover datatable-basic">
							<thead>
								<tr>
									<th width="20%">Business Code</th>
									<th width="60%">Business Unit</th>
									<th width="10%">Status</th>
									<th width="10%">Active</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($res as $key => $value) {?>
								<tr>
									<td width="20%"><?php echo $value->business_code;?></td>
									<td width="60%"><?php echo $value->business_name;?></td>
									<td width="10%"><?php if($value->status==1){echo "Active";}else{echo "Inactive";};?></td>
									<td><a type="button" data-toggle="modal" data-target="#editbus<?php echo $value->business_code; ?>"><i class="icon-pencil7"></i></a>
									<a href="<?php echo base_url(); ?>datastore_active/del_business/<?php echo $value->business_code; ?>"><i class="icon-trash"></i></a></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
                        
						<div class="text-right">
							<br>
						</div>
						</div>
					</div>													
				</div>
			</div>
		</div>
	</div>
	<!-- /dashboard content -->
</div><?php foreach ($res as $vv) {?>
<div id="editbus<?php echo $vv->business_code; ?>" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Setup Business</h5>
      </div>
      <form action="<?php echo base_url(); ?>datastore_active/edit_business/<?php echo $vv->business_code; ?>" method="post" id="editbuss">
      <div class="modal-body">
        <div class="form-group">
          <label class="col-lg-3 control-labelt">Business Code:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" readonly id="business_code" name="business_code" placeholder="Business Code" value="<?php echo $vv->business_code; ?>" >
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">Business Name :</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business Name" value="<?php echo $vv->business_name; ?>">
            </div>
        </div><br>
        <div class="form-group">
          <label class="col-lg-3 control-labelt">Status :</label>
            <div class="col-lg-9">
			<select class="form-control input-sm" name="status" id="status">
				<option value="1" <?= ($value->status == 1) ? "selected='sleected'" : "";?> >Active</option>
				<option value="2" <?= ($value->status == 2) ? "selected='selected'" : "";?> >Inactive</option>
			</select>
            </div>
        </div><br>

        <div class="modal-footer" style="margin-top:100px;">
          <button type="submit" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

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
	$('#mc2').attr('style', 'background-color:#dedbd8');
</script>
