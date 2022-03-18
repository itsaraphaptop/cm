<?php foreach ($vender as $key => $venderfor) { ?>
<h1><?php echo $venderfor->vender_name;?></h1>
<span>Quataion No.: <?php echo $venderfor->quovender;?></span>
<div class="table-responsive">
  <table class="table table-hover table-bordered table-xxs">
    <thead>
      <tr>
        <th>No.</th>
        <th>Remark</th>
        <th>Mat. type</th>
        <th>Mat. Name</th>
        <th>Qty</th>
        <th>Unit</th>
        <th width="8%">Price/Unit</th>
        <th width="5%">% Disc.</th>
        <th width="8%">Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $total = 0;
      $res = $this->db->query("select * from pr_compare_header INNER JOIN pr_compare_detail ON pr_compare_header.pr_code = pr_compare_detail.pri_ref where pr_compare_header.pr_code = '$cpcode' and pr_compare_detail.pri_vender = '$venderfor->cpvenderid' and pr_compare_header.compcode = '$compcode' and pr_compare_detail.compcode = '$compcode';")->result();
      $n=1; foreach ($res as $value) { ?>
      <tr>
          <td class="text-center"><?php echo $n;?></td>
          <td><?php echo $value->pri_remark;?></td>
          <td><?php echo $value->pri_matcode;?></td>
          <td width="30%"><?php echo $value->pri_matname;?></td>
          <td class="text-center"><?php echo $value->pri_qty;?></td>
          <td class="text-center"><?php echo $value->pri_unit;?></td>
          <td class="text-right"><?php echo number_format($value->pri_priceunit,2);?></td>
          <td class="text-right"><?php echo number_format($value->pri_disc,2);?></td>
          <td class="text-right"><?php echo number_format($value->pri_amount,2);?></td>
        </tr>
      <?php $n++;  $total = $total+$value->pri_amount; } ?>
        <tr>
        <td colspan="8" class="text-center">Total</td>
        <td class="text-right"><?php echo number_format($total,2);?></td>
        </tr>
    </tbody>
  </table>
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
</script>
