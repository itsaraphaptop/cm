<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายารใบสั่งซื้อทั้งหมด</div>
    <div class="panel-body">
      <table id="example" class="table table-striped">
          <thead>
          <tr>
              <th>เลขที่ใบสั่งซื้อ</th>
              <th>โครงการ</th>
              <th>รายละเอียดใบสั่งซื้อ</th>
              <th>สถานะ</th>
              <th>เปิด</th>
          </tr>
          </thead>
          <tbody>

          <?php foreach ($res as $val) {?>

                  <tr>
                      <td><?php echo $val->po_pono;?></td>
                      <td><?php echo $val->project_name;?><?php echo $val->department_title; ?></td>
                      <td><?php echo $val->po_remark;?></td>
                      <?php if ($val->ic_status=="full") {?>
                      <td><span class="label label-success">รับสินค้าครบแล้ว</span></td>
                      <td></td>
                      <?php }else{ ?>
                      <td><span class="label label-warning">รอรับสินค้า</span></td>
                      <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#openpo<?php echo $val->po_pono;?>" data-pono="<?php echo $val->po_pono; ?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> รับสินค้า</button> </td>
                      <?php } ?>
                  </tr>
          <?php } ?>


      </tbody>
      </table>
    </div>
</div>


<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#example').DataTable();
// } );
</script>
<script>
    $('.btn').click(function(){
    var pono = $(this).data('pono');
    // $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/po_receive'+'/'+pono);
    $('#loaddata').load('<?php echo base_url(); ?>index.php/office/service_po_receive_h'+'/'+pono);
  });
</script>