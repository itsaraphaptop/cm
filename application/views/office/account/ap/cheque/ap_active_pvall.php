<div class="table-responsive">
  <table class="basic table table-hover table-xxs datatable-basic">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th width="15%">AC No</th>
        <th width="15%">Cheque No</th>
        <th width="15%">Cheque Date</th>
        <th width="15%">AP No.</th>
        <th width="20%">BANK</th>
        <th width="20%">Vender Name</th>
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
            <?php if ($value->gl_status == "N") { ?>
            
            <td>
              <ul class="icons-list">
              <?php if ($value->ap_status == "confirm") {
                ?>
                <li><a href="<?php echo base_url(); ?>ap/ap_edit_pv/<?php echo $value->ap_pl; ?>" data-popup="tooltip" title=""><i class="icon-pencil7"></i></a></li>

              <?php } ?>
                <li><a data-toggle="modal" data-target="#deletepv<?php echo $value->ap_pl;?>"><i class="icon-trash"></i></a></li>
                <li><a href="<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cheque_report.mrt&code=<?php echo $value->ap_code; ?>" target="_blank"><i class=" icon-printer4"></i></a></li>
              </ul>

            </td>
            <?php }else{ ?>
            
            <td>
              <a href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cheque_report.mrt&code=<?php echo $value->ap_code; ?>" target="_blank"><i class=" icon-printer4"></i></a>
            </td>
          <?php } ?>
        </tr>
        <?php  $n++; } ?>
    </tbody>
  </table>
</div>
<?php foreach($all as $ee){ ?>
<div id="deletepv<?php echo $ee->ap_pl;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-body">
                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">Please fill in the deletion details <?php echo $ee->ap_pl; ?></h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="comment" id="comment<?php echo $ee->ap_pl;?>">
          <input type="hidden" class="form-control" value="<?php echo $ee->ap_pl; ?>" name="apvcode" id="code<?php echo $ee->ap_pl;?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="sapd<?php echo $ee->ap_pl;?>"><i class="icon-floppy-disk"></i> Save</button>
          <button type="button" class="btn btn-link" data-dismiss="modal"><i class="icon-close2"></i> close</button>
        </div>
            </div>
        </div>
    </div>
</div>
<script>
  $("#sapd<?php echo $ee->ap_pl;?>").click(function(){
  var url="<?php echo base_url(); ?>ap_active/ap_pvremore";
  var dataSet={
    comment: $('#comment<?php echo $ee->ap_pl;?>').val(),
    code: $('#code<?php echo $ee->ap_pl;?>').val(),
  }
  $.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ap/ap_pvapprove_report";
        }, 1000);
      });
  } );
</script>
<?php } ?>
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
         targets: [ 0 ]
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

