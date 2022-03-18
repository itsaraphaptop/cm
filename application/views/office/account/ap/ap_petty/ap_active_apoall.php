<div class="table-responsive">
  <table class="basic table table-hover table-xxs datatable-basic">
    <thead>
      <tr>
        <th width="5%">No.</th>
                <th width="15%">APO No.</th>
                <th width="15%">APO Date</th>
                <th width="30%">Vender Name</th>
                <th width="30%">Project/Department Name</th>
                <th width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $n=1; foreach ($all as $value) {?>
      <tr>
        <td><?php echo $n; ?></td>
          <td><?php echo $value->ap_no; ?></td>
          <td><?php echo $value->doc_date; ?></td>
          <td><?php echo $value->vender_name; ?></td>
          <td><?php echo $value->project_name; ?></td>
          <?php if ($value->ap_status == "wait") { ?>
            
          <td>
            <ul class="icons-list">
              <?php if ($value->ap_status == 'wait') {  ?>
            <li><a href="<?php echo base_url(); ?>ap/ap_edit_apo/<?php echo $value->ap_no; ?>/<?php echo $value->ap_type; ?>" data-popup="tooltip" title=""><i class="icon-pencil7"></i></a></li>
           <?php } ?>
              <li><a data-toggle="modal" data-target="#deleteapo<?php echo $value->ap_no;?>"><i class="icon-trash"></i></a></li>
              <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apo_payvoucher.mrt&no=<?php echo $value->ap_no; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
            </ul>
          </td>
          <?php }else{ ?>
          
            <td>
              <ul class="icons-list">
            <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apo_payvoucher.mrt&no=<?php echo $value->ap_no; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
            </ul>
          </td>
        <?php } ?>
      </tr>
      <?php  $n++; } ?>
    </tbody>
  </table>
</div>
<?php foreach($all as $ee){ ?>
<div id="deleteapo<?php echo $ee->ap_no;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-body">
                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">Please fill in the deletion details <?php echo $ee->ap_no; ?></h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="comment" id="comment<?php echo $ee->ap_no;?>">
          <input type="hidden" class="form-control" value="<?php echo $ee->ap_no; ?>" name="apvcode" id="apocode<?php echo $ee->ap_no;?>">
          <input type="hidden" id="aptyycode<?php echo $ee->ap_no;?>" value="<?php echo $ee->doc_no; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="sapd<?php echo $ee->ap_no;?>">บันทึก</button>
          <button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
        </div>
            </div>
        </div>
    </div>
</div>
<script>
  $("#sapd<?php echo $ee->ap_no;?>").click(function(){
  var url="<?php echo base_url(); ?>ap_active/ap_aporemore";
  var dataSet={
    comment: $('#comment<?php echo $ee->ap_no;?>').val(),
    code: $('#apvcode<?php echo $ee->ap_no;?>').val(),
    pcode: $('#aptyycode<?php echo $ee->ap_no;?>').val(),
  }
  $.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ap_petty/ap_pettycash_all";
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

