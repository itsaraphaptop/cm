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
            <?php if ($value->ap_status == "wait") { ?>
            <td><button class="label bg-danger">NO</button></td>
            <td>
              <ul class="icons-list">
                <li><a href="<?php echo base_url(); ?>ap/ap_edit_chq/<?php echo $value->ap_code; ?>" data-popup="tooltip" title=""><i class="icon-pencil7"></i></a></li>
              </ul>

            </td>
            <?php }else{ ?>
            <td>
              <ul class="icons-list">
              <li><a href="<?php echo base_url(); ?>ap/showap_approve/<?php echo $value->ap_code; ?>" data-popup="tooltip" title=""><i class="icon-folder-open"></i></a></li>
              </ul>
            </td>
          <?php } ?>
        </tr>
        <?php  $n++; } ?>
    </tbody>
  </table>
</div>
<?php foreach($all as $ee){ ?>
<div id="deleteclear<?php echo $ee->ap_code;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-body">
                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">Please fill in the deletion details <?php echo $ee->ap_code; ?></h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="comment" id="comment<?php echo $ee->ap_code;?>">
          <input type="hidden" class="form-control" value="<?php echo $ee->ap_code; ?>" name="apvcode" id="code<?php echo $ee->ap_code;?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="sapd<?php echo $ee->ap_code;?>"><i class="icon-floppy-disk"></i> Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> close</button>
        </div>
            </div>
        </div>
    </div>
</div>
<script>
  $("#sapd<?php echo $ee->ap_code;?>").click(function(){
  var url="<?php echo base_url(); ?>ap_active/ap_chqueremore";
  var dataSet={
    comment: $('#comment<?php echo $ee->ap_code;?>').val(),
    code: $('#code<?php echo $ee->ap_code;?>').val(),
  }
  $.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ap/ap_approve_report";
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

