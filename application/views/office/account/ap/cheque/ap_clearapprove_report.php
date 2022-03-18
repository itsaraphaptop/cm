<div class="content-wrapper">
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> ระบบเจ้าหนี้ (AP)</span></h4>
      </div>
    </div>
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li>รายงานตัดเจ้าหนี้ทั้งหมด (All Clear)</li>
        </ul>
    </div>
  </div>
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">รายงานตัดเจ้าหนี้ทั้งหมด (All Clear)</h5>
        <div class="heading-elements">
          <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li>
          </ul>
        </div>
      </div>

      <div class="dataTables_wrapper no-footer"  id="account">
        <div class="table-responsive">
          <table class="basic table table-hover table-xxs datatable-basic">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="15%">AC No</th>
                <th width="15%">Cheque No</th>
                <th width="15%">Cheque Date</th>
                <th width="15%">AP No.</th>
                <th width="20%">BANK</th>
                <th width="20%">Vender</th>
                <th width="10%">Status</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $n=1; foreach ($all as $value) {?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $value->ap_code; ?></td>
                    <td><?php echo $value->ap_chno; ?></td>
                    <td><?php echo $value->ap_chnodate; ?></td>
                    <td><?php echo $value->api_no; ?></td>
                    <td><?php echo $value->bank_name; ?></td>
                    <td><?php echo $value->vender_name; ?></td>
                    
                    <?php if ($value->gl_status == "N") {
                        ?>
                    <td><button class="open label bg-danger">No Post GL</button></td>
                    <td>
                      <ul class="icons-list">
                        <li class="text-default"><a href="<?php echo base_url();?>ap/delapv/<?php echo $value->ap_code; ?>" title=""><i class="icon-trash"></i></a></li>
                        </ul>
                    </td>
                    <?php }else{ ?>
                    <td><button class="open label bg-green">Post GL</button></td>
                    <td>
                      <ul class="icons-list">
                        <li class="text-default"><i class="icon-trash"></i></li>
                        </ul>
                    </td>
                    <?php } ?>
                    
                </tr>
                <?php  $n++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

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
  $('.basic').DataTable();
</script>