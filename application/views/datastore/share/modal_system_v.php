<table class="table table-xxs table-hover datatable-basic" >
<thead>
<tr>
<th>No.</th>
<th>name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res as $val){ ?>
<tr>
<td scope="row"><?php echo $n;?></td>
<td><?=$val->systemname?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
  	
    $("#jobcode").val("<?php echo $val->systemcode; ?>");
    $("#systemname").val("<?php echo $val->systemname; ?>");

    $("#jobcode<?php echo $id; ?>").val("<?php echo $val->systemcode; ?>");
    $("#systemname<?php echo $id; ?>").val("<?php echo $val->systemname; ?>");


    $("#bd_jobno<?php echo $id; ?>").val("<?php echo $val->systemcode; ?>");
    $("#bd_jobname<?php echo $id; ?>").val("<?php echo $val->systemname; ?>");

    $("#jobcodei<?php echo $id; ?>").val("<?php echo $val->systemcode; ?>");
    $("#jobname<?php echo $id; ?>").val("<?php echo $val->systemname; ?>");
  });
</script>
<?php $n++; } ?>
</tbody>
</table>
