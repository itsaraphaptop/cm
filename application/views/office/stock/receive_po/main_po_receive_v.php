<div class="row">
  <div class="col-xs-6">
    <div class="panel panel-primary" style="font-size:12px;">
      <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> แผนก </span></div>
        <div class="panel-body">
         <table id="example" class="table table-hover">
              <thead>
              <tr>
                  <th>#</th>
                  <th>แผนก</th>
                  <th>จำนวนใบสั่งซื้อ</th>
                  <th>เปิด</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($getdep as $val) {
                $this->db->select('*');
                $this->db->where('po_department',$val->department_id);
                $query = $this->db->get('po');
                $result = $query->num_rows();
          
                ?>
                      <tr>
                          <td><?php echo $val->department_code;?> </td>
                          <td><?php echo $val->department_title;?></td>
                          <td><?php echo $result;?></td>
                          <td><button class="btn btn-primary btn-block btn-xs" data-pono="<?php echo $val->department_id; ?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button></td>
                      </tr>
              <?php } ?>


          </tbody>
          </table>
        </div>
    </div>
  </div>
  <div class="col-xs-6">
    <div class="panel panel-primary" style="font-size:12px;">
      <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> โครงการ </span></div>
        <div class="panel-body">
        <table id="example" class="table table-hover">
              <thead>
              <tr>
                  <th width="25%;">#</th>
                  <th>โครงการ</th>
                  <th>จำนวนใบสั่งซื้อ</th>
                  <th>เปิด</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($getproj as $val) {
                $this->db->select('');
                $this->db->where('po_project',$val->project_id);
                $query = $this->db->get('po');
                $result = $query->num_rows();
          
                ?>
                      <tr>
                          <td><?php echo $val->project_code;?> </td>
                          <td><?php echo $val->project_name;?></td>
                          <td><?php echo $result;?></td>
                          <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#openpr<?php echo $val->project_code;?>" data-pono="<?php echo $val->project_code; ?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button></td>
                      </tr>
              <?php } ?>


          </tbody>
          </table>
        </div>
    </div>
  </div>
</div>


<script>
	$('.btn').click(function(){
		var pono = $(this).data('pono');
		$('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_po_list'+'/'+pono);
	});
</script>

<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('table.table').DataTable();
// } );
</script>
