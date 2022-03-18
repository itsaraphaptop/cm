<table class="table table-striped table-xxs datatable-basicunit" >
<thead>
<tr>
<th>Less_name</th>
<th>act_name</th>
<th>Cost Code</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php foreach ($getlo as $valj){ ?>
<tr>
<td><?php echo $valj->less_name;?></td>
<td><?php echo $valj->less_ac; ?></td>
<td><?php echo $valj->less_costcode; ?></td>
<td><button class="openunt<?php echo $m;?> btn btn-xs btn-block btn-primary" data-toggle="modal"  data-lo<?php echo $m;?>="<?php echo $valj->less_name;?>" data-ac<?php echo $m;?>="<?php echo $valj->less_ac;?>" data-dismiss="modal">SELECT</button></td>
</tr>

<script>
    $(".openunt<?php echo $m;?>").click(function(){
      $("#bd_jobno<?php echo $m;?>").val($(this).data('lo<?php echo $m;?>'));
      $("#ac<?php echo $m;?>").val($(this).data('ac<?php echo $m;?>'));
      
    });
</script>

<?php } ?>
</tbody>
</table>
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $('.datatable-basicunit').DataTable();
</script>
