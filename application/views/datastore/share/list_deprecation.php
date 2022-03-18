<table class="table table-bordered datatable-basic" >
<thead>
<tr>
<th width="5%"  class="text-center">No.</th>
<th width="15%" class="text-center">Date</th>
<th width="10%" class="text-center">Year</th>
<th width="10%" class="text-center">Month</th>
<th class="text-center">Remark</th>

<th width="10%" class="text-center" width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res as $val){ ?>
<tr>
<td class="text-center"><?php echo $val->de_code;?></td>
<td class="text-center"><?php echo $val->de_date;?></td>
<td class="text-center"><?php echo $val->de_yearr;?></td>
<td class="text-center"><?php echo $val->de_month;?></td>
<td class="text-center"><?php echo $val->de_remark;?></td>

<td class="text-center"><button class="opendeptora<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opendeptora<?php echo $n;?>").click(function(event) {
  	 $('#deprec').val("<?php echo $val->de_code;?>");

  	 $('#table').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
     $("#table").load('<?php echo base_url(); ?>index.php/share/modal_list_deprecation/<?php echo $val->de_code;?>');
   	  $('#writeoff_h').empty();
  	  $('#woff').val("");
      $('#typei').val("J");
  });
</script>
<?php $n++; } ?>
</tbody>
</table>
