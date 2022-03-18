<table class="table table-xxs table-hover datatable-basic" >
<thead>
<tr>
<th>No.</th>
<th>Code</th>
<th>Depreciation Method</th>
<th>Depreciation Year</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->depreciation_code; ?></td>
<td><?php echo $val->depreciation_method; ?></td>
<td><?php echo $val->depreciation_year; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#depreciation_code").val("<?php echo $val->depreciation_code; ?>");
    $("#depreciation_method").val("<?php echo $val->depreciation_method; ?>");
    $("#depreciation_year").val("<?php echo $val->depreciation_year; ?>");

    $("#depreciation_code").prop('disabled', true);
    $("#depreciation_method").prop('disabled', true);
    $("#depreciation_year").prop('disabled', true);

    $("#table").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#table").load('<?php echo base_url(); ?>index.php/share/depreciation_detail/'+"<?php echo $val->depreciation_code; ?>");

     $("#depreciation_code").val("<?php echo $val->depreciation_code; ?>");
    $("#depreciation_method").val("<?php echo $val->depreciation_method; ?>");
    $("#depreciation_year").val("<?php echo $val->depreciation_year; ?>");
    

     $("#fa_depreciationcode").val("<?php echo $val->depreciation_code; ?>");
    $("#fa_depreciationname").val("<?php echo $val->depreciation_method; ?>");
    

    
  });
</script>
<?php $n++; } ?>
</tbody>
</table>