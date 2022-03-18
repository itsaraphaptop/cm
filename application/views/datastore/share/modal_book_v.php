<table class="table table-striped table-xxs datatable-basicunit" >
<thead>
<tr>
<th>No.</th>
<th>Book Name</th>
<th>Active</th>

</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res_book as $valj){ ?>
<tr>
<td><?php echo $valj->bookcode; ?></td>
<td><?php echo $valj->booknamz; ?></td>
<td><button class="openun<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal"  data-vunit<?php echo $n;?>="<?php echo $valj->booknamz;?>" data-code<?php echo $n;?>="<?php echo $valj->bookcode;?>" data-gl_type<?php echo $n;?>="<?php echo $valj->gl_type;?>" data-dismiss="modal">SELECT</button></td>
</tr>

<script>
    $(".openun<?php echo $n;?>").click(function(){
      $("#bookcode").val($(this).data('code<?php echo $n;?>'));
      $("#bookname").val($(this).data('vunit<?php echo $n;?>'));
      $("#typei").val($(this).data('gl_type<?php echo $n;?>'));
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
