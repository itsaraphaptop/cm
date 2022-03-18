<table class="table table-hover table-xxs basicc">
  <thead>
    <tr>
      <th>No.</th>
      <th>AP No.</th>
      <th>AP Date</th>
      <th>Expense</th>
      <th width="5%">Active</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($apo as $key => $val) { 
      ?>
      <th scope="row"><?= $key+1; ?></th>
      <td><?= $val->ex_ref; ?></td>
      <td><?= $val->ap_date; ?></td>
      <td><?= $val->expens_name; ?></td>
      <td>
        <button class="btnre btn btn-primary btn-xs btn-block"
                data-code="<?= $val->ap_no; ?>"
                data-ref="<?= $val->ex_ref; ?>"
                data-excode="<?= $val->ex_id; ?>" 
                data-date="<?= $val->ap_date; ?>"
                data-pono="<?= $val->doc_no; ?>" 
                data-vender="<?= $val->vender_name; ?>"
                data-vencode="<?= $val->vender_code; ?>"  
                data-glyear="<?= $val->ap_year;; ?>" 
                data-glperiod="<?= $val->ap_period; ?>" 
                data-duedate="<?= $val->doc_date; ?>" 
                data-inv="<?= $val->tax; ?>" 
                data-netamt="<?= $val->ex_amt; ?>"
                data-vat="<?= $val->ex_tovat; ?>"
                data-totamt="<?= $val->ex_netamt; ?>"
                data-expens="<?= $val->ex_expenscode; ?>"
                data-dismiss="modal">SELECT</button>
      </td> 
    </tr>
    <?php }  ?>
  </tbody>
</table>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
// $.extend( $.fn.dataTable.defaults, {
//      autoWidth: false,
//      columnDefs: [{
//          orderable: false,
//          width: '100px',
//          targets: [ 2 ]
//      }],
//      dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
//      language: {
//          search: '<span>Filter:</span> _INPUT_',
//          lengthMenu: '<span>Show:</span> _MENU_',
//          paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
//      },
//      drawCallback: function () {
//          $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
//      },
//      preDrawCallback: function() {
//          $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
//      }
//  });
  $('.basicc').DataTable();
</script>
<script>
  $(".btnre").click(function() {
    $(this).parent().parent().remove();
    var code_val = $(this).data('excode')*1;
    var ref_val = $(this).data('ref');
    var expens_val = $(this).data('expens');
    var vender_val = $(this).data('vencode');
    
    var url="<?= base_url(); ?>ap_active/gl_recapo";

          //     alert(`code = ${code_val}, ref = ${ref_val}, expens = ${expens_val}, vender = ${vender_val}`);
          // $.post(url,{ code: code_val, expens: expens_val, vender: vender_val },function(data){
          //        $("#vat").append(data);
          //       //  console.log(data);
                  
          // });
      
    // tab gl
    $.post(`<?=base_url();?>ap/petty_gl/${ref_val}/${code_val}`,
      function () { 
      }
    ).done(function(data) {
      $('#petty_i').append(data);
    });
    // tab gl

    // alert(`code = ${code} expens = ${expens} vender = ${vender}`);
    // 
      $.post(`<?=base_url();?>ap_active/detail_cno/${code_val}/${expens_val}/${vender_val}`,
        function () {
        }
      ).done(function(data) {
        $("#vat").append(data);
      }); 
    // 
  });
</script>
