
<?php 
$datestring = "Y";
   $mm = "m";
   $dd = "d";

   $this->db->select('*');
   $qu = $this->db->get('ic_typearea');
   $ress = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

   if ($ress==0) {
     $code = "00"."1";
      $apd_item ="1";
   }else{
     $this->db->select('*');
     $this->db->order_by('typearea_id','desc');
     $this->db->limit('1');
     $q = $this->db->get('ic_typearea');
     $run = $q->result();
     foreach ($run as $valx)
     {
       $x1 = $valx->typearea_id+1;
     }

     if ($x1<=9) {
        $code = "00".$x1;
        $apd_item = $x1;
     }
     elseif ($x1<=99) {
       $code = "".date($datestring).date($mm)."0".$x1;
       $apd_item = $x1;
     }

   }
 ?>




<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
		<div class="content">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-cog3 position-left"></i>SETUP TYPE<p></p></h6>
					<div class="heading-elements">
						<a href="<?php echo base_url(); ?>data_master/select_project_type" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>
						
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addtype"><i class="icon-plus-circle2"></i> New</button>
					</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover table-xxs table-striped datatable-basic">
								<thead>
									<tr>
										<th>No</th>
										<th>Type Code</th>
										<th>Type Name</th>
										<th width="20%">Active</th>
									</tr>
								</thead>
								<tbody>
									<?php $n=1; foreach ($res as $key => $value) {?>
									<tr>
										<td><?php echo $n; ?></td>
										<td><?php echo $value->type_code; ?></td>
										<td><?php echo $value->type_name; ?></td>
										<td>
											<a data-toggle="modal" data-target="#ewh<?php echo $value->typearea_id; ?>"><i class="icon-pencil7"></i></a>
											<a href="<?php echo base_url(); ?>setup_wh/deltype/<?php echo $value->typearea_id; ?>/<?php echo $pj ?>"><i class="icon-trash"></i></a>
										</td>
									</tr>
									<?php $n++; } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>
				</div>
				</div>
				</div>


<?php foreach ($res as $key => $value) {?>
<div class="modal fade" id="ewh<?php echo $value->typearea_id; ?>" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header btn-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"> Edit Type </h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url(); ?>setup_wh/edittype" method="post">
					<div class="panel-body">
						<input type="hidden" name="id" value="<?php echo $value->typearea_id; ?>">
						<input type="hidden" name="projectidewhe" value="<?php echo $pj ?>">
						<div class="form-group">
							<label>Type Code</label>
							<input type="text" class="form-control" readonly="" name="whcodee" value="<?php echo $value->type_code; ?>">
						</div>
						<div class="form-group">
							<label>Type Name</label>
							<input type="text" class="form-control" name="whnamee" value="<?php echo $value->type_name ?>">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
						<button data-dismiss="modal" class="btn btn-danger"><i class="icon-close2"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- modal  -->
<div class="modal fade" id="addtype" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header btn-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"> New Type </h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url(); ?>setup_wh/savetype" method="post">
					<div class="panel-body">
						<input type="hidden" name="projectid" value="<?php echo $pj ?>">
						<div class="form-group">
							<label>Type Code</label>
							<input type="text" readonly="" class="form-control" name="whcode" value="<?php echo $code; ?>">
						</div>
						<div class="form-group">
							<label>Type Name</label>
							<input type="text" class="form-control" name="whname">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
						<button data-dismiss="modal" class="btn btn-danger"><i class="icon-close2"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> <!--end modal -->
			</div>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
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
			$('.datatable-basic').DataTable();
			$('[data-popup="tooltip"]').tooltip();

			$('#mic').attr('class', 'active');
  			$('#mic2').attr('style', 'background-color:#dedbd8');
			</script>