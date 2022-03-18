<div class="table-responsive">
  <table class="basic table table-hover table-xxs datatable-basic">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th width="15%">CNO No.</th>
        <th width="15%">CNO Date</th>
        <th width="30%">Vender Name</th>
        <th width="30%">Project Name</th>
        <th width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $n=1; foreach ($all as $value) {?>
        <tr>
          <td><?php echo $n; ?></td>
          <td><?php echo $value->cno_code; ?></td>
          <td><?php echo $value->cno_duedate; ?></td>
          <td><?php echo $value->vender_name; ?></td>
          <td><?php echo $value->project_name; ?></td>
          <td>
              <ul class="icons-list">
                <?php if ($value->cno_status == 'wait') {  ?>
              <li><a href="<?php echo base_url(); ?>ap/cno_edit_reduce/<?php echo $value->cno_code; ?>/<?php echo $value->type; ?>" data-popup="tooltip" title=""><i class="icon-pencil7"></i></a></li>
              <!-- <li><a href="<?php echo base_url(); ?>ap/cno_open_reduce/<?php echo $value->cno_code; ?>/<?php echo $value->type; ?>" data-popup="tooltip" title=""><i class="icon-folder-open"></i></a></li> -->

              <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apo_payvoucher.mrt&no=<?php echo $value->cno_code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
               <li><a data-toggle="modal" data-target="#deletecno<?php echo $value->cno_code;?>"><i class="icon-trash"></i></a></li> 
              <!-- <li><a data-toggle="modal" data-target="#deletecnv<?php echo $value->cno_code;?>"><i class="icon-trash"></i></a></li> -->
              
          
        <?php  }else if ($value->cno_status == 'paid') { ?>
              <li><a href="<?php echo base_url(); ?>ap/cno_open_reduce/<?php echo $value->cno_code; ?>" data-popup="tooltip" title=""><i class="icon-folder-open"></i></a></li>
              </ul>
        <?php  } ?>
        </td>
        </tr>
        <?php  $n++; } ?>
    </tbody>
  </table>
</div>
<?php foreach($all as $ee){ ?>
<div id="deletecno<?php echo $ee->cno_code;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-body">
                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">Please fill in the deletion details <?php echo $ee->cno_code; ?></h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="comment" id="comment<?php echo $ee->cno_code;?>">

          <input type="hidden" class="form-control" value="<?php echo $ee->cno_code; ?>" name="apocode" id="apocode<?php echo $ee->cno_code;?>">
          <input type="hidden" class="form-control" value="<?php echo $ee->cno_type; ?>" name="cno_type" id="cno_type<?php echo $ee->cno_type;?>">
        </div>
        <div class="modal-footer">
           <button type="button" class="btn bg-success" id="saps<?php echo $ee->cno_code;?>"><i class="icon-floppy-disk"></i> Save</button>
          <a id="fa_close" href="<?php echo base_url(); ?>" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
        </div>
            </div>
        </div>
    </div>
</div>
<script>
  $("#saps<?php echo $ee->cno_code;?>").click(function(){
  var url="<?php echo base_url(); ?>ap_active/cnv_reduce";
  var dataSet={
    comment: $('#comment<?php echo $ee->cno_code;?>').val(),
    code: $('#apvcode<?php echo $ee->cno_code;?>').val(),
    type: $('#cnv_type<?php echo $ee->cno_type;?>').val(),
  }
  $.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ap/reduce_apv_report";
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