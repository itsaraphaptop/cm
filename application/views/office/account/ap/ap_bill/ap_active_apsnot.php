<?php
   $session_data = $this->session->userdata('sessed_in');
   $compcode = $session_data['compcode'];
?>
<div class="table-responsive">
  <table class="basic table table-hover table-xxs datatable-basic">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th width="15%">APS No.</th>
        <th width="15%">APS Date</th>
        <th width="30%">Vender Name</th>
        <th width="30%">Project Name</th>
        <th width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $n=1; foreach ($not as $value) {?>
        <tr>
          <td><?php echo $n; ?></td>
          <td><?php echo $value->aps_code; ?></td>
          <td><?php echo $value->createdate; ?></td>
          <td><?php echo $value->vender_name; ?></td>
          <td><?php echo $value->project_name; ?></td>
          <?php if ($value->gl_status == "N") { ?>
            
            <td>
              <ul class="icons-list">
              <li><a href="<?php echo base_url(); ?>ap/ap_edit_aps/<?php echo $value->aps_code; ?>/<?php echo $value->aps_type; ?>" data-popup="tooltip" title=""><i class="icon-pencil7"></i></a></li>
                <li><a data-toggle="modal" data-target="#deleteaps<?php echo $value->aps_code;?>"><i class="icon-trash"></i></a></li>
                <li><a href="<?php echo base_url();?>report/viewerloadgl?module=ap&typ=report&reportname=aps_payvoucher.mrt&no=<?php echo $value->aps_code; ?>&compcode=<?php echo $compcode;?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
              </ul>
            </td>
            <?php }else{ ?>
            
            <td><a href="<?php echo base_url();?>report/viewerloadgl?module=ap&typ=report&reportname=aps_payvoucher.mrt&no=<?php echo $value->aps_code; ?>&compcode=<?php echo $compcode;?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></td>
            <?php } ?>
        </tr>
        <?php  $n++; } ?>
    </tbody>
  </table>
</div>
<?php foreach($not as $ee){ ?>
<div id="deleteaps<?php echo $ee->aps_code;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-body">
                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">Please fill in the deletion details <?php echo $ee->aps_code; ?></h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="comment" id="comment<?php echo $ee->aps_code;?>">

          <input type="hidden" class="form-control" value="<?php echo $ee->aps_code; ?>" name="apvcode" id="apvcode<?php echo $ee->aps_code;?>">
          <input type="hidden" id="period<?php echo $ee->aps_code;?>" value="<?php echo $ee->aps_billperiod; ?>">
          <input type="hidden" id="type<?php echo $ee->aps_code;?>" value="<?php echo $ee->aps_billtype; ?>">
          <input type="hidden" id="billcode<?php echo $ee->aps_code;?>" value="<?php echo $ee->aps_lono; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="saps<?php echo $ee->aps_code;?>"><i class="icon-floppy-disk"></i> Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> close</button>
        </div>
            </div>
        </div>
    </div>
</div>
<script>
  $("#saps<?php echo $ee->aps_code;?>").click(function(){
  var url="<?php echo base_url(); ?>ap_active/ap_apsremore";
  var dataSet={
    comment: $('#comment<?php echo $ee->aps_code;?>').val(),
    code: $('#apvcode<?php echo $ee->aps_code;?>').val(),
    billcode: $('#billcode<?php echo $ee->aps_code;?>').val(),
    period: $('#period<?php echo $ee->aps_code;?>').val(),
    type: $('#type<?php echo $ee->aps_code;?>').val()
  }
  $.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ap/all_bill";
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

