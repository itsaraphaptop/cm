
<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Warehouse<p></p></h6>
			<div class="heading-elements">
				<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>
				<a type="button" data-toggle="modal" data-target="#addwh" class="addwh btn btn-info"><i class="icon-plus-circle2"></i> New</a>
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
    <div class="panel-body">
		<div class="table-responsive">
	  		<table class="basic table table-hover table-striped table-xxs datatable-basic">
			  	<thead>
				    <tr>
								<!-- <th>No</th> -->
				      	<th>WareHouse Code</th>
				      	<th>WareHouse Name</th>
				      	<th>WareHouse Job</th>
								<!-- <th>System name</th> -->
				      	<th>Active</th>
				    </tr>
			  	</thead>
				 <tbody>
				  <?php $n=1; foreach ($getwhdata as $key => $value) {?>
					<tr>
						<!-- <td><?php echo $n; ?></td> -->
						<td><?php echo $value->whcode; ?></td>
						<td><?php echo $value->whname; ?></td>
						<td><?php echo $value->systemname; ?></td>
						<!-- <td><?php if ($value->jobcode=="0"){echo 'Not Select';}elseif($value->jobcode=="1"){echo "OVERHEAD";}elseif($value->jobcode=="2"){echo "AC";}elseif($value->jobcode=="3"){echo "EE";}elseif($value->jobcode=="4"){echo "SN";}elseif($value->jobcode=="5"){echo "CIVIL";}; ?></td> -->
						<th>
							<a data-toggle="modal" data-target="#ewh<?php echo $value->id; ?>"><i class="icon-pencil7"></i></a>
							<a href="<?php echo base_url(); ?>setup_wh/delwh/<?php echo $value->id; ?>/<?php echo $pj ?>/<?= $code;?>"><i class="icon-trash"></i></a>
						</th>
					</tr>

					<?php $n++; } ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
 <?php foreach ($getwhdata as $key => $value) {?>
 	<div class="modal fade" id="ewh<?php echo $value->id; ?>" data-backdrop="false">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="modal-header bg-primary">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel"> Edit WareHouse </h4>
					      </div>
					        <div class="modal-body">
					        <form action="<?php echo base_url(); ?>setup_wh/editwh" method="post">
						        <div class="panel-body">
						        <input type="hidden" name="id" value="<?php echo $value->id; ?>">
						        <input type="hidden" name="projectidewhe" value="<?php echo $pj ?>">
						        <div class="form-group">
						        	<label>WareHouse Code</label>
						        	<input type="text" class="form-control" name="whcodee" value="<?php echo $value->whcode; ?>">
						        </div>
						        <div class="form-group">
						        	<label>WareHouse Name</label>
						        	<input type="text" class="form-control" name="whnamee" value="<?php echo $value->whname ?>">
						        </div>
						        <div class="form-group">
						        	<label>WareHouse Job</label>
						        	<select class="form-control" name="whjobe">
						        		<?php $ss = $this->db->query("SELECT * from system where systemcode = $value->jobcode; ")->result(); 
						        		foreach ($ss as $systemm) {
						        		$sysname = $systemm->systemname;
						        		}
						        		?>
						        	 	<option value="<?php echo $value->jobcode; ?>"><?php echo $sysname; ?></option>
				                        <?php foreach ($system as $sys) { ?>
				                        <option value="<?php echo $sys->systemcode; ?>"><?php echo $sys->systemname; ?></option>
				                        <?php } ?>
					                 </select>
						        </div>
						        </div>
						        <div class="modal-footer">
						        <button type="submit" id="saveedit<?php echo $value->id; ?>" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
				          <button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
						        </div>
						        </form>
					        </div>
					    </div>
					  </div>
					</div>
 <?php } ?>
<div class="modal fade" id="addwh" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> NEW WAREHOUSE </h4>
      </div>
        <div class="modal-body">
        <form id="savenewwh" action="<?php echo base_url(); ?>setup_wh/savewh" method="post">
	        <div class="panel-body">
	        <input type="hidden" name="projectid" value="<?php echo $pj ?>">
	        <input type="hidden" name="projectcode" value="<?php echo $code ?>">
	        <div class="form-group">
	        	<label class="hidden">WareHouse Code</label>
	        	<input type="text" readonly class="form-control hidden" name="whcode">
	        </div>
	        <div class="form-group">
	        	<label>WareHouse Name</label>
	        	<input type="text" class="form-control" name="whname">
	        </div>
	        <div class="form-group">
	        	<label>WareHouse Job</label>
	        	<select class="form-control" id="optionsys" name="whjob">
                        <option value="0">Please Select</option>
                        <?php foreach ($system as $sys) { ?>
                        <option value="<?php echo $sys->systemcode; ?>"><?php echo $sys->systemname; ?></option>
                        <?php } ?>
 						
                 </select>
	        </div>
	        </div>
	        <div class="modal-footer">
						<button type="button" id="saveadd" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
						<button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
	        </div>
	        </form>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

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

  $('#mic').attr('class', 'active');
$('#mic1').attr('style', 'background-color:#dedbd8');

$("#saveadd").click(function(){
	
	if($("#optionsys").val()=="0"){
		console.log('not select option');
		alert('not select option');
	}else{
		// console.log($("#optionsys option:selected").text());
		console.log($("#optionsys option:selected").val());
		$("#savenewwh").submit();
	}
});
</script>
