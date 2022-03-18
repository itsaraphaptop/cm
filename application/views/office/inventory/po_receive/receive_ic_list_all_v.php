<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Select PO Receive</a></li>
					</div>
				</div>
				<!-- /page header -->
				<div class="content">
					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat border-top-lg border-top-warning">
						<div class="panel-heading">
							<h5 class="panel-title">Select PO Receive</h5>
							<div class="heading-elements">
									<ul class="icons-list">
									<li><a href="<?php echo base_url(); ?>inventory/receive_po_other/<?php echo $iid; ?>/<?php echo $id; ?>" type="button" class="btn btn-primary"><i class="icon-plus2"></i> Receive Other</a></li>
				                		<li><a href="<?php echo base_url(); ?>index.php/inventory/open" type="button" class="preload btn btn-default"><i class="icon-undo2"></i> Back</a></li>
			                		</ul>
		                	</div>
						</div>
						<div class="panel-body">

						</div>
						<div class="dataTables_wrapper no-footer">
						<div class="table-responsive">
						<table class="table table-bordered table-striped table-xs datatable-basics">
					          <thead>
						          <tr>
						              <th class="text-center">เลขที่ใบสั่งซื้อ</th>
						              <th class="text-center" >ผู้ขอซื้อ</th>
						              <th>ร้านค้า</th>
						              <th class="text-center">รายละเอียดใบสั่งซื้อ</th>
													<!-- <th class="text-center" >ใบรับสินค้า</th> -->
													<th class="text-center">รายการ</th>
						              <th class="text-center" >สถานะ</th>
						              <th class="text-center">เปิด</th>
						          </tr>
					          </thead>
					          <tbody>

					          <?php $n=1; foreach ($res as $val) {?>
											<?php $this->db->select('*');
														$this->db->where('po_pono',$val->po_pono);
														$query = $this->db->get('po_receive');
														$res = $query->num_rows();

														////// นับจำนวนรายนการในใบสั่งซื้อที่ยังไมได้รับของ
														$this->db->select('*');
														$this->db->where('poi_receive',"0");
														$this->db->where('poi_ref',$val->po_pono);
														$qu = $this->db->get('po_item');
														$resu = $qu->num_rows();

											?>

					                  <tr>
					                      <td><?php echo $val->po_pono;?></td>
					                      <td><?php echo $val->po_prname;?></td>
					                      <td><?php echo $val->po_vender; ?></td>
					                      <td><?php echo $val->po_remark;?></td>
					                      <?php if ($val->ic_status=="full") {?>
					                      <!-- <td class="text-center"><a href="<?php echo base_url(); ?>inventory/archive_po_receive_po/<?php echo $val->po_pono;?>/<?php echo $val->po_project; ?>" class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $res; ?> ใบ"><?php echo $res; ?></a></td> -->
																<td class="text-center"><a class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $resu; ?> รายการ"><?php echo $resu; ?></a></td>
																<td><span class="label label-success">รับสินค้าครบแล้ว</span></td>
																<td><a class="label label-default label-block label-xs" disabled="true"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Receive</a> </td>
					                      <?php }else{ ?>
																<!-- <td class="text-center"><a href="<?php echo base_url(); ?>inventory/archive_po_receive_po/<?php echo $val->po_pono;?>/<?php echo $val->po_project; ?>" class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $res; ?> ใบ"><?php echo $res; ?></a></td> -->
																<td class="text-center"><a class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $resu; ?> รายการ"><?php echo $resu; ?></a></td>
																<td><span class="label label-warning">รอรับสินค้า</span></td>
																<td><a href="<?php echo base_url(); ?>index.php/inventory/receive_po_header/<?php echo $val->po_pono; ?>/<?php echo $val->po_project; ?>" class="preload label label-primary label-block label-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Receive</a> </td>

																<?php } ?>
					                  </tr>
					          <?php $n++; } ?>


					      	</tbody>
					      </table>
					    </div>
						</div>
					</div>
					<!-- /highlighting rows and columns -->


				</div>
				<!-- /content area -->
<!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			        <!-- /footer -->
</div>
<!-- /Main content -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
	$('[data-popup="tooltip"]').tooltip();

	$.extend( $.fn.dataTable.defaults, {
       autoWidth: false,
       columnDefs: [{
           orderable: false,
           width: '100px',
           targets: [ 3 ]
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

$('.datatable-basics').DataTable();
</script>
