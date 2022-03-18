<table class="table table-striped table-xxs datatable-basicunit" >
<thead>
<tr>
<th>No.</th>
<th>Unit Namw</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php $d=1; foreach ($getunit as $valj){ ?>
<tr>
<td><?php echo $m;?></td>
<td><?php echo $valj->unit_name; ?></td>
<td><button class="openunt<?php echo $m;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-vuniticcode<?php echo $m;?>="<?php echo $valj->unit_code;?>"  data-vunit<?php echo $m;?>="<?php echo $valj->unit_name;?>" data-dismiss="modal">SELECT</button></td>
</tr>

<script>
    $(".openunt<?php echo $m;?>").click(function(){
      $("#uniticcode<?php echo $m;?>").val($(this).data('vuniticcode<?php echo $m;?>'));
      $("#truniticcode<?php echo $m;?>").val($(this).data('vuniticcode<?php echo $m;?>'));
      $("#punitic<?php echo $m;?>").val($(this).data('vunit<?php echo $m;?>'));
    });
  </script>

<?php $d++; } ?>
</tbody>

<!-- /core JS files -->
<script>
  $('.datatable-basicunit').DataTable();
</script>
