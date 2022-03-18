<style>
#open{cursor: pointer;}
</style>
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> รายการคลังสินค้า</div>
		<div class="panel-body">
		<div class="table-responsive">
			<table id="datasource"class="table table-hover">
				<thead>
					<tr>
						<th width="20%">รหัสสินค้า</th>
						<th>รายการสินค้า</th>
						<th width="15%">คงเหลือ</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($res as $val) {?>
					<tr>
						<td><?php echo $val->store_matcode; ?></td>
						<td><a data-toggle="modal" id="open" data-target="#mat<?php echo $val->store_id; ?>"><?php echo $val->store_matname; ?></a></td>
						<td><?php echo $val->store_qty; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		</div>
</div>
<?php foreach ($res as $val2) {?>
	<!-- Modal -->
				<div class="modal fade" id="mat<?php echo $val2->store_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">รายการสั่งซื้อ <?php echo $val2->store_matname; ?></h4>
				      </div>
				      <div class="modal-body">
				       	<table class="table table-hover">
				       		<thead>
				       			<tr>
					       			<th>#</th>
					       			<th>เลขที่ใบสั่งซื้อ</th>
					       			<th>ร้านค้า</th>
					       			<th>จำนวนซื้อ</th>
				       			</tr>
				       		</thead>
				       		<tbody>
				       		<?php 
				       				$this->db->select('*');
				       				$this->db->from('po');
				       				$this->db->join('po_item','po_item.poi_ref = po.po_pono','left outer');
				       				$this->db->where('poi_matcode',$val2->store_matcode);
				       				$q = $this->db->get();
				       				$re = $q->result();
				       		 ?>
				       		 <?php $n=1; foreach ($re as $key) {?>
				       			<tr>
					       			<td><?php echo $n; ?></td>
					       			<td><?php echo $key->po_pono; ?></td>
					       			<td><?php echo $key->po_vender; ?></td>
					       			<td><?php echo $key->poi_qty; ?></td>
				       			</tr>
				       			<?php $n++; } ?>
				       		</tbody>
				       	</table>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary">Save changes</button>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- end modal -->
<?php } ?>
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
//   $(document).ready(function() {
    $('#datasource').DataTable();
// } );
  
</script>
