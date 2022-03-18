<table class="table table-hover table-bordered table-xxs basic">
  <thead>
    <tr>
      <th width="10%">Invoice No.</th>
      <th width="10%">Invoice Date</th>
      <th width="10%">Invoice Type</th>
      <th width="10%">Period</th>
      <th width="20%">Project Name</th>
      <th width="20%">Owner/Customer</th>
      <th width="20%">Voucher No</th>
      <th width="10%">Action</th>
    </tr>
  </thead> 
  <tbody>
<?php
  $i=0;
  foreach ($ar_down as $key => $value) {
    $i++;
?>
    <tr>
      <td><?= $value->acc_invno ?></td>
      <td><?= $value->acc_invdate ?></td>
      <td><span class="label bg-success-400"><?= $value->acc_invtype ?></span></td>
      <td><?= $value->acc_period ?></td>
      <td><?= $value->project_name ?></td>
      <td><?= $value->debtor_name ?></td>
      <td><?= $value->acc_no ?></td>
      <td>
          <a class="add label bg-blue" 
          cus_name="<?= $value->debtor_name ?>" 
          cus_code="<?= $value->project_mcode ?>" 
          period="<?= $value->acc_period ?>" 
          invperiod="<?= $value->acc_invperiod ?>" 
          ar_type="<?= $value->acc_invtype ?>" 
          acc_year="<?= $value->acc_year ?>" 
          ar_no="<?= $value->acc_no ?>" 
          acc_invno="<?= $value->acc_invno ?>" 
          onclick="inv_detail('<?= $value->acc_invno ?>','<?= $value->acc_invtype ?>',$(this));" 
          data-dismiss="modal">
          Select
          </a>
      </td>
    </tr>
<?php
  }

  // foreach ($ar_cn as $cn_key => $cn_date) {
?>
    <!-- <tr>
      <td><?= $cn_date->inv_no ?></td>
      <td><?= $cn_date->inv_date ?></td>
      <td><span class="label bg-success-400"><?= $cn_date->inv_type ?></span></td>
      <td><?= $cn_date->inv_period ?></td>
      <td><?= $cn_date->project_name ?></td>
      <td><?= $cn_date->debtor_name ?></td>
      <td><?= $cn_date->inv_acccode ?></td>
      <td>
          <a class="add label bg-blue" 
          onclick="inv_cn('<?= $cn_date->inv_no ?>',$(this))" 
          data-dismiss="modal">
          Select
          </a>
      </td>
    </tr> -->
<?php
  // }
?>
  

  </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>

$('.add').click(function(event) {
  var cus_name = $(this).attr('cus_name');
  var cus_code = $(this).attr('cus_code');
  var period = $(this).attr('acc_period');
  var invperiod = $(this).attr('invperiod');
  var ar_type = $(this).attr('ar_type');
  var acc_year = $(this).attr('acc_year');
  var ar_no = $(this).attr('ar_no');
  var acc_invno = $(this).attr('acc_invno');
  $('#owner').val(cus_name);
  $('#cus_code').val(cus_code);
  $('#acc_period').val(period);
  $('#acc_invperiod').val(invperiod);
  $('#ar_type').val(ar_type);
  $('#acc_year').val(acc_year);
  $('#ar_no').val(ar_no);
  $('#invno').val(acc_invno);
});

function inv_detail(inv_no,inv_type,el) {
  $.get('<?= base_url(); ?>ar/inv_detail/'+inv_no+'/'+inv_type, function(data) {
  }).done(function (data) {
    $('#inv_detail').html(data);
    
    el.remove();
    hide_row();
  });
 
}

function inv_cn(inv_no,el) {

  $.get('<?= base_url(); ?>ar/inv_cn/'+inv_no, function(data) {
  }).done(function (data) {
    $('#inv_detail').append(data);
    el.remove()
  });

  // $('#inv_detail').append('Some text')
}


$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
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