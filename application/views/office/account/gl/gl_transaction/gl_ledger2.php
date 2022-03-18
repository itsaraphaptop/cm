<form method="post"  action="<?php echo base_url(); ?>gl_active/post_gl_h">
<div class="table-responsive" id="invaccount">
  <table class="table table-hover table-bordered table-xxs">
    <thead>
      <tr>
        <th>No</th>
        <!-- <th>Datatype</th> -->
        <th>Voucher</th>
        <th>Date</th>
        <th>Y/M</th>
        <th>A/C</th>
        <th>Project  / Department</th>
        <th>Job</th>
        <th>Dr</th>
        <th>Cr</th>
        <th>Remark</th>
      </tr>
    </thead>
      <tbody >

        <?php foreach ($gl_d as $d) { ?>

        <tr>
        <td></td>
        <!-- <td></td> -->
        <td><?php echo $d->vchno; ?></td>
        <td><?php echo $d->vchdate; ?></td>
        <td><?php echo $d->glyear.'/'.$d->glperiod; ?></td>
        <td><?php echo $d->ac_code.' - '.$d->ac_name; ?></td>
        <td><?php echo $d->project_name; ?></td>
        <td><?php echo $d->systemname; ?></td>
        <td><?php echo $d->amtdr; ?></td>
        <td><?php echo $d->amtcr; ?></td>
        <td><?php echo $d->remark; ?></td>
      </tr>
      <?php } ?>
      </tbody>
</table>
</div>
<div class="row">
  <br>        <?php foreach ($gl_h as $h) { ?>
        <input type="hidden"  name="vchno_post[]" value="<?php echo $h->vchno; ?>" >
        <?php }?>
  <div class="col-sm-12" style="text-align: right;">
    <button class="save_gl btn btn-success btn-sm" id="" type="submit"><i class="icon-floppy-disk position-left"></i> POST</button>
    <a class="btn btn-danger" id="closegl"><i class="icon-close2 position-left"></i> Close</a>

  </div> 
</div>
</form>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '150px',
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


  $('#closegl').click(function(event) {
   $('#glpost').empty();
  });
</script>
