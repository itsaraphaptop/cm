    <!-- <?php echo "<pre>"; var_dump($getproj) ?> -->
    <table class="table table-xxs table-hover" id="project_table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Project Code</th>
          <th>Project Name</th>
          <th width="5%">Active</th>
        </tr>
      </thead>
      <tbody>
        <?php   $sub =1;?>
        <?php foreach ($getproj as $key => $value) {
          
         ?>
        <tr>
          <td><?=$key+1;?></td>
          <td><?=$value->project_code;?></td>
          <td><?=$value->project_name;?></td>
          <td><button idpro="<?=$value->project_id;?>" codep="<?=$value->project_code;?>" namep="<?=$value->project_name;?>" coded="<?=$value->project_mcode;?>" named="<?=$value->project_mnameth;?>" class="select btn btn-xs btn-info" data-dismiss="modal">SELECT</button></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

    <script type="text/javascript">
        $('.select').click(function() {
          var proid = $(this).attr('idpro');
          var procode = $(this).attr('codep');
          var proname = $(this).attr('namep');
          var dcode = $(this).attr('coded');
          var dname = $(this).attr('named');

          $('#projectid').val(proid);
          $('#project_id').val(proid);
          $('#projectcode1').val(procode);
          $('#projectname1').val(proname);
          $('.projectcode2').val(dcode);
          $('.projectname2').val(dname);
        });

        $('#project_table').DataTable({
        "pageLength": 10
        });
    </script>