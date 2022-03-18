<table class="table table-striped table-xxs datatable-basicunit" >
<thead>
<tr>
<th>No.</th>
<th>Unit Namw</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($getunit as $valj){ ?>
<tr>
<td><?php echo $n;?></td>
<td><?php echo $valj->unit_name; ?></td>
<td><button class="openun<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal"  data-vunit<?php echo $n;?>="<?php echo $valj->unit_name;?>" data-dismiss="modal">SELECT</button></td>
</tr>

<script>
    $(".openun<?php echo $n;?>").click(function(){
      $("#poi_unitic").val($(this).data('vunit<?php echo $n;?>'));
      
    });
  </script>

<?php $n++; } ?>
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
