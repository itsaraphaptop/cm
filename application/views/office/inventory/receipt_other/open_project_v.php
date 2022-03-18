<div class="content-wrapper">
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
			</div>
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>inventory/receive_transfer_store"></a></li>
		</div>
	</div>
	<div class="content">
		<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Select Project</h5>
							<div class="heading-elements">

		                	</div>
						</div>
						<div class="panel-body">
						</div>
						<table class="table table-bordered table-striped table-xs datatable-basicc">
			            <thead>
			              <tr>
			                  <th width="15%" class="text-center">Project Code</th>
			                  <th>โครงการ</th>
			                  <th>PO View</th>
			                  <th width="10%" class="text-center">เปิด</th>
			              </tr>
			              </thead>
			              <tbody>

			              <?php 
			              foreach ($getproj as $val) {
			                ?>
			                      <tr>
			                          <td class="text-center"><?php echo $val->project_code;?> </td>
			                          <td><?php echo $val->project_name;?></td>
			                          <?php if ($open=='n') {
			                          	?>
			                          	<td>

			                          	</td>

			                          	<td><a href="<?php echo base_url(); ?>index.php/inventory/receive_po_other/<?php echo $val->project_id; ?>/<?php echo $val->project_code; ?>" class="preload label label-primary label-block" data-popup="tooltip" title="" data-original-title="เปิด"><i class="icon-folder-open2"></i> OPEN</a></td>

			                          <?php }elseif($open=='a'){ 
			                          		$this->db->select('');
			                          		$this->db->where('compcode',$compcode);
  							                $this->db->where('project',$val->project_id);
  							                $this->db->where('receive_type',"keyin");
                                			$this->db->where('approve','wait');
  							                $query = $this->db->get('po_receive');
  							                $result = $query->num_rows();
			                          	?>
			                          	<td>
			                          		<button data-toggle="modal" data-target="#receive_a<?php echo $val->project_id; ?>" class="detail_a<?php echo $val->project_id; ?> label label-info"> View</button>
			                          		<span class="count badge bg-warning-400"><?php echo $result; ?></span>
			                          	</td>

			                          <td><a href="<?php echo base_url(); ?>index.php/inventory/archive_receive_ohter/<?php echo $val->project_id; ?>" class="preload label label-primary label-block" data-popup="tooltip" title="" data-original-title="เปิด"><i class="icon-folder-open2"></i> OPEN</a></td>

			                          <?php }elseif($open=='t'){ 
			                          	$this->db->select('');
			                          		$this->db->where('compcode',$compcode);
  							                $this->db->where('project',$val->project_id);
  							                $this->db->where('receive_type',"keyin");
  							                $query = $this->db->get('po_receive');
  							                $result = $query->num_rows(); ?>
			                          	<td>
			                          		<button data-toggle="modal" data-target="#receive<?php echo $val->project_id; ?>" class="detail<?php echo $val->project_id; ?> label label-info"> View</button>
			                          		<span class="count badge bg-warning-400"><?php echo $result; ?></span>
			                          	</td>

			                          	<td><a href="<?php echo base_url(); ?>index.php/inventory/archive_receive_ohter_all/<?php echo $val->project_id; ?>" class="preload label label-primary label-block" data-popup="tooltip" title="" data-original-title="เปิด"><i class="icon-folder-open2"></i> OPEN</a></td>

			                      </tr>
			              <?php } } ?>
			          </tbody>
			          </table>
					</div> 
	</div>
</div>
<?php 
foreach ($getproj as $value) {
 ?>
          <!-- modal  โครงการ-->
           <div class="modal fade" id="receive<?php echo $value->project_id; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Receive Transfer Code #<?php echo $value->project_id; ?></h4>
                </div>
                  <div class="modal-body">
                    <div id="modal_detail<?php echo $value->project_id; ?>">
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end modal -->


           <!-- modal  โครงการ-->
           <div class="modal fade" id="receive_a<?php echo $value->project_id; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Receive Transfer Code #<?php echo $value->project_id; ?></h4>
                </div>
                  <div class="modal-body">
                    <div id="modal_a<?php echo $value->project_id; ?>">
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end modal -->


          <script>
          // ของรับของ po
            $(".detail<?php echo $value->project_id; ?>").click(function(){
              $("#modal_detail<?php echo $value->project_id; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_detail<?php echo $value->project_id; ?>").load('<?php echo base_url(); ?>inventory/view_receiveall/<?php echo $value->project_id; ?>');
            });
           // ขอรับของ IC
            $(".detail_a<?php echo $value->project_id; ?>").click(function(){
              $("#modal_a<?php echo $value->project_id; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_a<?php echo $value->project_id; ?>").load('<?php echo base_url(); ?>inventory/view_receive/<?php echo $value->project_id; ?>');
            });
            
          </script>
<?php  } ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '150px',
         targets: [0 ]
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

