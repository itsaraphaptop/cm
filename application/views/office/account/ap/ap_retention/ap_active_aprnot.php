<div class="table-responsive">
  <table class="basic table table-hover table-xxs datatable-basic">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th width="15%">APV No.</th>
        <th width="15%">APV Date</th>
        <th width="30%">Vender Name</th>
        <th width="30%">Project Name</th>
        <th width="10%">Action</th>
      </tr>
    </thead>
    <tbody >
        <?php 
         $session_data = $this->session->userdata('sessed_in');
         $compcode = $session_data['compcode'];
        $n=1; foreach ($not as $value) {?>
        <tr>
          <td><?php echo $n; ?></td>
            <td><?php echo $value->apr_code; ?></td>
            <td><?php echo $value->apr_date; ?></td>
            <td><?php echo $value->vender_name; ?></td>
            <td><?php echo $value->project_name; ?></td>
            <?php if ($value->gl_status == "N") { ?>
            
            <td>
              <ul class="icons-list">
              <li><a href="<?php echo base_url(); ?>ap/ap_edit_apr/<?php echo $value->apr_code; ?>/<?php echo $value->apr_type; ?>" data-popup="tooltip" title=""><i class="icon-pencil7"></i></a></li>
                <li><a data-toggle="modal" data-target="#deleteapr<?php echo $value->apr_code;?>"><i class="icon-trash"></i></a></li>
                <li><a href="<?php echo base_url();?>report/viewerloadgl?module=ap&typ=report&reportname=apr_payvoucher.mrt&no=<?php echo $value->apr_code; ?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
              </ul>
            </td>
            <?php }else{ ?>
            
            <td>
              <ul class="icons-list">
                <li><a href="<?php echo base_url();?>report/viewerloadgl?module=ap&typ=report&reportname=apr_payvoucher.mrt&no=<?php echo $value->apr_code; ?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
                <li><i style="color: #bbb;" class="icon-trash"></i></li>
              </ul>
            </td>
            <?php } ?>
        </tr>
        <?php  $n++; } ?>
    </tbody>
  </table>
</div>
<?php foreach($not as $ee){ ?>
<div id="deleteapr<?php echo $ee->apr_code;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-body">
                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">Please fill in the deletion details <?php echo $ee->apr_code; ?></h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="comment" id="comment<?php echo $ee->apr_code;?>">
          <input type="hidden" class="form-control" value="<?php echo $ee->apr_code; ?>" name="apvcode" id="apvcode<?php echo $ee->apr_code;?>">
          <input type="hidden" id="period<?php echo $ee->apr_code;?>" value="<?php echo $ee->apr_period; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="sapr<?php echo $ee->apr_code;?>"><i class="icon-floppy-disk"></i> Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i>  close</button>
        </div>
            </div>
        </div>
    </div>
</div>
<script>
  $("#sapr<?php echo $ee->apr_code;?>").click(function(){
  var url="<?php echo base_url(); ?>ap_active/ap_aprremore";
  var dataSet={
    comment: $('#comment<?php echo $ee->apr_code;?>').val(),
    code: $('#apvcode<?php echo $ee->apr_code;?>').val(),
    period: $('#period<?php echo $ee->apr_code;?>').val(),
  }
  $.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ap/all_apv_reten";
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

