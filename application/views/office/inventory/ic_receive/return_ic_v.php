<?php
 foreach ($ss as  $value) {
$procode = $value->project_code;
$proname = $value->project_name;
}
$datestring = "Y";
   $mm = "m";
   $dd = "d";

   $this->db->select('*');
   $qu = $this->db->get('ic_return_h');
   $res = $qu->num_rows();

   if ($res==0) {
     $apdcode = "RC".date($datestring).date($mm)."000"."1";
      $apd_item ="1";
   }else{
     $this->db->select('*');
     $this->db->order_by('is_id','desc');
     $this->db->limit('1');
     $q = $this->db->get('ic_return_h');
     $run = $q->result();
     foreach ($run as $valx)
     {
       $x1 = $valx->is_id+1;
     }

     if ($x1<=9) {
        $apdcode = "RC".date($datestring).date($mm)."000".$x1;
        $apd_item = $x1;
     }
     elseif ($x1<=99) {
       $apdcode = "RC".date($datestring).date($mm)."00".$x1;
       $apd_item = $x1;
     }
     elseif ($x1<=999) {
       $apdcode = "RC".date($datestring).date($mm)."0".$x1;
       $apd_item = $x1;
     }
   }
?> 
<div class="content-wrapper">
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
			</div>
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>inventory/receive_transfer_store"></a></li>
			</ul>
		</div>
	</div>
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Return Archive Project</h5>
  					<h4>(<?php echo $procode; ?>) <?php echo $proname; ?></h4>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
              	<table class="table table-hover table-bordered  table-xxs datatable-basic">
	                <thead>
	                  <tr>
	                    <th class="text-center" width="10%">Booking Code</th>
	                    <th class="text-center" width="20%">Remark</th>
						<th class="text-center" width="20%">Place</th>
	                    <th class="text-center" width="20%">Action</th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <?php 
	                  foreach ($getproj as  $value) {
	                  	?>
		                 <tr>
		                    <td><?php echo $value->is_doccode; ?></td>
		                    <td><?php echo $value->is_remark; ?></td>
							<td><?php echo $value->is_place; ?></td>
							<td>
			                    <button class="openreture btn btn-warning btn-xs" id="cvendor<?php echo $value->is_doccode; ?>" data-toggle="modal" data-target="#openreture<?php echo $value->is_doccode; ?>"><i class="icon-file-plus"></i>Reverse</button>
			                </td>
		                 </tr>
		                 <?php } ?>
	                </tbody>
              	</table>
              	</div>
            </div>
		</div>
	</div>
</div>
<?php foreach ($getproj as  $key) { ?>
<form id="" action="<?php echo base_url(); ?>inventory_active/save_return_ic/<?php echo $key->is_doccode; ?>" method="post">
	<div class="modal fade" id="openreture<?php echo $key->is_doccode; ?>" tabindex="-1" role="dialog" 
		aria-labelledby="myModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          <h4 class="modal-title" id="myModalLabel">Reverse Material<?php echo $key->is_doccode; ?></h4>
		        </div>
		        <div class="modal-body">
		          	<div class="row">
		          		<div class="col-sm-6">
		          			<div class="col-sm-4">Booking Code:</div>
		          			<div class="col-sm-6"><?php echo $apdcode; ?><input type="hidden" value="<?php echo $apdcode; ?>" name="is_coderef"></div>
		          		</div>
		          		<div class="col-sm-6">
		          			<div class="col-sm-4">Issue Code:</div>
		          			<div class="col-sm-7"><?php echo $key->is_doccode; ?><input type="hidden" value="<?php echo $key->is_doccode; ?>" name="is_doccode"></div>
		          		</div>
		          		<div class="col-sm-6">
		          			<div class="col-sm-3">Date Issue:</div>
		          			<div class="col-sm-7"><?php echo $key->is_bookdate; ?><input type="hidden" value="<?php echo $key->is_bookdate; ?>" name="is_bookdate"></div>
		          		</div>

		          		<div class="col-sm-6">
		          			<div class="col-sm-4">Project:</div>
		          			<div class="col-sm-7"><?php echo $key->project_name; ?><input type="hidden" value="<?php echo $key->project_id; ?>" name="project_id"></div>
		          		</div>
		          		<div class="col-sm-6">
		          			<div class="col-sm-3">User Name:</div>
		          			<div class="col-sm-7"><?php echo $key->is_reqname; ?><input type="hidden" value="<?php echo $key->is_reqname; ?>" name="is_reqname"></div>
		          		</div>
		          		
		          		<div class="col-sm-12">
		          			<div class="col-sm-3">remark:</div>
		          			<div class="col-sm-9"><?php echo $key->is_remark; ?><input type="hidden" value="<?php echo $key->is_remark; ?>" name="is_remark"></div>
		          		</div>
		          		<div class="col-sm-12">
		          			<div class="col-sm-3">Place :</div>
		          			<div class="col-sm-9"><?php echo $key->is_place; ?><input type="hidden" value="<?php echo $key->is_place; ?>" name="is_place"></div>
		          		</div>
		          	</div>

		          	<div class="row">
		          		<div class="col-sm-12">
		          			<div class="table-responsive">
                              <table class="table table-bordered table-hover table-xxs">
                              <tr>
                              	<th>#</th>
                              	<th>Materail Code</th>
                              	<th>Materail Name</th>
                              	<th>Unit</th>
                              	<th>warehouse</th>
                              </tr>
                              <?php 
                              	$this->db->select('*');
								$this->db->where('isi_doccode',$key->is_doccode);
								$query = $this->db->get('ic_issue_d');
								$resi = $query->result(); ?>
                              <tr>
                               <?php $ii = 1; foreach ($resi as $de) { ?>
                               <td><?php echo $ii; ?></td>
                              	<td><?php echo $de->isi_matcode; ?><input type="hidden" value="<?php echo $de->isi_matcode; ?>" name="isi_matcode[]"></td>
                              	<td><?php echo $de->isi_matname; ?><input type="hidden" value="<?php echo $de->isi_matname; ?>" name="isi_matname[]"></td>
                              	<td><input type="number" class="form-control" value="<?php echo $de->isi_xqty; ?>" name="isi_xqty[]"  max="<?=$de->isi_xqty ?>"></td>
                              	<td><?php echo $de->isi_unit; ?><input type="hidden" value="<?php echo $de->isi_unit; ?>" name="isi_unit[]"></td>
                              	<input type="hidden" value="<?php echo $de->isi_priceunit; ?>" name="isi_priceunit[]">
                              	<input type="hidden" value="<?php echo $de->isi_whcode; ?>" name="isi_whcode[]">
                              </tr>
                              <?php $ii++; } ?>
                              </table>
                            </div>
		          		</div>
		          	</div>
		          	<div class="row">
			          	<div class="col-sm-12" >
			          	<br>
			          		<button type="submit" id="save" class="btn btn-danger">Reverse</button>
			          	</div>
		          		
		          	</div>
		        </div>
		    </div>
	    </div>
	</div>
</form>
<?php } ?>



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
</script>