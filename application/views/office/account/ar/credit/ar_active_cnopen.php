<div class="table-responsive">
  <table class="basic table table-hover table-xxs datatable-basic">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th width="15%">APV No.</th>
        <th width="15%">APV Date</th>
        <th width="30%">Vender Name</th>
        <th width="30%">Project/Department Name</th>
        <th width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $n=1; foreach ($not as $value) {?>
        <tr>
          <td><?php echo $n; ?></td>
            <td><?php echo $value->apd_code; ?></td>
            <td><?php echo $value->apd_date; ?></td>
            <td><?php echo $value->vender_name; ?></td>
            <td><?php echo $value->project_name; ?></td>
            <?php if ($value->apd_status == "wait") { ?>
            <td>
              <ul class="icons-list">
              <li><a href="<?php echo base_url(); ?>ap/ap_edit_apd/<?php echo $value->apd_code; ?>/<?php echo $value->apd_type; ?>" data-popup="tooltip" title=""><i class="icon-pencil7"></i></a></li>
                <li><a data-toggle="modal" data-target="#deleteapd<?php echo $value->apd_code;?>"><i class="icon-trash"></i></a></li>
                <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apd_payvoucher.mrt&no=<?php echo $value->apd_code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
              </ul>
            </td> 
        <?php }else{ ?>
            <td>
              <ul class="icons-list">
              <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apd_payvoucher.mrt&no=<?php echo $value->apd_code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
              </ul>
            </td>
          <?php } ?>

        </tr>
        <?php  $n++; } ?>
    </tbody>
  </table>
</div>
<?php foreach($not as $ee){ ?>
<div id="deleteapd<?php echo $ee->apd_code;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
                  <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">Please fill in the deletion details <?php echo $ee->apd_code; ?></h5>
        </div>
      <div class="modal-body">
        
        <div class="modal-body">
          <input type="text" class="form-control" name="comment" id="comment<?php echo $ee->apd_code;?>">
          <input type="hidden" class="form-control" value="<?php echo $ee->apd_code; ?>" name="apvcode" id="apvcode<?php echo $ee->apd_code;?>">
          <input type="hidden" id="period<?php echo $ee->apd_code;?>" value="<?php echo $ee->apd_period; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="sapd<?php echo $ee->apd_code;?>"><i class="icon-floppy-disk"></i> Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
        </div>
            </div>
        </div>
    </div>
</div>
<script>
  $("#sapd<?php echo $ee->apd_code;?>").click(function(){
  var url="<?php echo base_url(); ?>ap_active/ap_apdremore";
  var dataSet={
    comment: $('#comment<?php echo $ee->apd_code;?>').val(),
    code: $('#apvcode<?php echo $ee->apd_code;?>').val(),
    period: $('#period<?php echo $ee->apd_code;?>').val(),
  }
  $.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ap/all_apv_down";
        }, 1000);
      });
  } );
</script>
<?php } ?>
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

