<!-- Main navbar -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Compnay : <?php echo $gcompname; ?></h5>
						<div class="heading-elements">
							<a type="button" data-toggle="modal" data-target="#newbus" class="newbus btn btn-info"><i class="icon-plus-circle2"></i> New</a>
						</div>
					</div>	
					<div class="panel-body">
						<table class="basic table table-hover table-xxs datatable-basic table-bordered">
							<thead>
								<tr>
									<th>Business Code</th>
									<th>Business Name</th>
									<!-- <th>VAT Type</th> -->
									<th>Active</th>
								</tr>
							</thead>
							<tbody>
								<?php $n=1; foreach ($res as $val) {?>
								<tr>
									<td><?php echo $val->business_code; ?></td>
									<td><?php echo $val->business_name; ?></td>
									<!-- <?php if($val->chkvat == 'Y'){ ?>
									<td>Vat</td>
									<?php }else {?>
									<td>Non</td>
									<?php } ?> -->
									<td>
										<a  type="button" data-toggle="modal" data-target="#editbus<?php echo $val->business_code; ?>"><i class="icon-pencil7"></i></a>
										<a href="<?php echo base_url(); ?>datastore_active/del_business/<?php echo $val->business_code; ?>"><i class="icon-trash"></i></a>
									</td>
								</tr>
								<?php $n++; } ?>
							</tbody>
						</table>

						<div class="text-right">
							<br>
							<!-- <a href="<?php echo base_url(); ?>datastore/archive_company" type="button" class="btn btn-danger" name="button"><i class="icon-close2"></i> Close</a> -->
						</div>
					</div>													
				</div>
			</div>
		</div>
	</div>
	<!-- /dashboard content -->
</div>
<div id="newbus" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header  bg-primary">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h5 class="modal-title">Setup Business</h5>
		    </div>
		    <form action="<?php echo base_url(); ?>datastore_active/add_business/<?php echo $com; ?>" method="post" id="insert">
			    <div class="modal-body">
			        <div class="form-group">
			          <label class="col-lg-3 control-labelt">Business Code :</label>
			            <div class="col-lg-9">
			              <input type="text" class="form-control" id="business_code" name="business_code" placeholder="Business Code">
			            </div>
			        </div><br>

			        <div class="form-group">
			          <label class="col-lg-3 control-labelt">Business Name :</label>
			            <div class="col-lg-9">
			              <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business Name">
			            </div>
			        </div><br>
					<!-- 		<div class="form-group">
			          <label class="col-lg-3 control-labelt">Vat Type :</label>
			            <div class="col-lg-9">
			              <select class="form-control" name="vattype">
			              	<option value="v">VAT</option>
											<option value="n">NonVat</option>
											<option value="nv">Non+Vat</option>
			              </select>
			            </div>
			        </div><br> -->
			        <div class="modal-footer" style="margin-top:100px;">
			          <button type="submit" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
			          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
			        </div>

			    </div>
		    </form>
	    </div>
	</div>
</div>
<?php foreach ($res as $vv) {?>
<div id="editbus<?php echo $vv->business_code; ?>" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Setup Business</h5>
      </div>
      <form action="<?php echo base_url(); ?>datastore_active/edit_business/<?php echo $vv->business_code; ?>/<?php echo $com; ?>" method="post" id="editbuss">
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
				<!-- <div class="form-group">
          <label class="col-lg-3 control-labelt">Vat Type :</label>
            <div class="col-lg-9">
              <select class="form-control" name="evattype">
								<?php if($vv->vat_type == 'v'){ ?><option value="v" selected>Vat</option><?php } else { ?><option value="v">Vat</option><?php }?>
								<?php if($vv->vat_type == 'n'){ ?><option value="n" selected>NonVat</option><?php } else { ?><option value="n">NonVat</option><?php }?>
								<?php if($vv->vat_type == 'nv'){ ?><option value="nv" selected>Non+Vat</option><?php } else { ?><option value="nv">Non+Vat</option><?php }?>
              </select>
            </div>
        </div><br> -->

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
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>-->

<script type=" text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '200px',
         targets: [ 0 ]
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
  $('.basic').DataTable();
      $('#mg').attr('class', 'active');
	$('#mc1').attr('style', 'background-color:#dedbd8');
</script>
