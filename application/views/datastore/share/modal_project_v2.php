    <!-- <?php echo "<pre>"; var_dump($getproj) ?> -->
    <table class="table table-xxs table-hover" id="project_table2">
      <thead>
        <tr>
          <th>No.</th>
          <th>Owner Code</th>
          <th>Owner Name (TH)</th>
          <th width="5%">Active</th>
        </tr>
      </thead>
      <tbody>
        <?php   $sub =1;?>
        <?php foreach ($getproj as $key => $value) {
          
         ?>
        <tr>
          <td><?=$key+1;?></td>
          <td><?=$value->project_mcode;?></td>
          <td><?=$value->project_mnameth;?></td>
          <td><button onclick="select($(this))" codep="<?=$value->project_mcode;?>" namep="<?=$value->project_mnameth;?>" class="select btn btn-xs btn-info" data-dismiss="modal">SELECT</button></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript">
        function select (el){
          
            var procode = $(el).attr('codep');
            var proname = $(el).attr('namep');

            $('#projectcode2').val(procode);
            $('#projectname2').val(proname);
        }
        $('#project_table2').DataTable({
        "pageLength": 10
        });
    </script>