<div class="table-responsive">
  <table class="basic table table-hover table-xxs datatable-basic">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th width="15%">APV No.</th>
        <th width="15%">PO No.</th>
        <th width="10%">APV Date</th>
        <th width="25%">Vender Name</th>
        <th width="25%">Project Name</th>
        <th width="5%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $n=1; foreach ($open as $value) {?>
      <tr>
        <td><?php echo $n; ?></td>
          <td><?php echo $value->apv_code; ?></td>
          <td><?php echo $value->apv_pono; ?></td>
          <td><?php echo $value->apv_gldate; ?></td>
          <td><?php echo $value->vender_name; ?></td>
          <td><?php echo $value->project_name; ?></td>
          <!-- <?php if ($value->apv_status == 'wait') {  ?> -->
          <td>
            <ul class="icons-list">
              <li><a href="<?php echo base_url(); ?>ap/ap_edit_apv/<?php echo $value->apv_code; ?>/<?php echo $value->apv_type; ?>/<?php echo $value->apv_vender; ?>" data-popup="tooltip" title=""><i class="icon-pencil7"></i></a></li>
              <li><i style="color: #bbb;" class="icon-trash"></i></li>
              <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_payvoucher.mrt&no=<?php echo $value->apv_code; ?>&compcode=<?php echo $comppcode;?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
            </ul>
          </td> 
         <!--  <?php }else{ ?>
          <td>
            <ul class="icons-list">
              
            </ul>
          </td>
          <?php } ?> -->
      </tr>
      <?php  $n++; } ?>
    </tbody>
  </table>
</div>
<?php foreach($open as $ee){ ?>
<div id="deleteapv<?php echo $ee->apv_code;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
                  <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">Please fill in the deletion details <?php echo $ee->apv_code; ?></h5>
        </div>
      <div class="modal-body">
        
        <div class="modal-body">
          <input type="text" class="form-control" name="comment" id="comment<?php echo $ee->apv_code;?>">
          <input type="hidden" class="form-control" value="<?php echo $ee->apv_code; ?>" name="apvcode" id="apvcode<?php echo $ee->apv_code;?>">
          <input type="hidden" id="period<?php echo $ee->apv_code;?>" value="<?php echo $ee->apv_glperiod; ?>">
          <input type="hidden" id="reccode<?php echo $ee->apv_code;?>" value="<?php echo $ee->apv_do; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="sapv<?php echo $ee->apv_code;?>"><i class="icon-floppy-disk"></i> Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
        </div>
            </div>
        </div>
    </div>
</div>
<script>
  $("#sapv<?php echo $ee->apv_code;?>").click(function(){
  var url="<?php echo base_url(); ?>ap_active/ap_apvremore";
  var dataSet={
    comment: $('#comment<?php echo $ee->apv_code;?>').val(),
    code: $('#apvcode<?php echo $ee->apv_code;?>').val(),
    period: $('#period<?php echo $ee->apv_code;?>').val(),
    reccode: $('#reccode<?php echo $ee->apv_code;?>').val()
  }
  $.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ap/all_apv";
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


