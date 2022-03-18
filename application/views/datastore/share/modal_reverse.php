<table class="table table-xxs table-hover datatable-basicxc345" >
<thead>
<tr>
<th>No.</th>
<th>Voucher</th>
<th>Date</th>
<th>Book</th>
<th>Type</th>
<th>Remark</th>
<th>Ref Doc.</th>
<th>Ref Date</th>
<th class="text-right">Dr</th>
<th class="text-right">Cr</th>
<th>Module</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; 

foreach ($reverse as $val){ 

	?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->vchno; ?></td>
<td><?php echo $val->vchdate; ?></td>
<td><?php echo $val->bookcode; ?></td>
<td><?php echo $val->gl_type; ?></td>
<td><?php echo $val->remark; ?></td>
<td><?php echo $val->docno; ?></td>
<td><?php echo $val->docdate; ?></td>
<?php 
    $this->db->select('*');
    $this->db->from("gl_batch_details");
    $this->db->where("gl_batch_details.vchno",$val->vchno);
    $re_query = $this->db->get()->result();
    $amtdr = 0;
    $amtcr = 0;
    foreach ($re_query as $key) {
     $amtdr = $amtdr+$key->amtdr;
     $amtcr = $amtcr+$key->amtcr;
    }
?>
<td class="text-right"><?php echo number_format($amtdr,2); ?></td>
<td class="text-right"><?php echo number_format($amtcr,2); ?></td>
<td><?php echo $val->module; ?></td>
<td><a class="opendeptorivc<?php echo $n;?> btn btn-xs btn-block btn-primary" data-dismiss="modal">SELECT</a></td>
</tr>

<script>
 $(".opendeptorivc<?php echo $n;?>").click(function(event) {
  $('#vchno').val("");
  $('#vchdate').val("");
  $('#glyear').val("");
  $('#glperiod').val("");
  // $('#bookcode').val("");
  // $('#bookname').val("");
  $('#refnoo').val("");
  $('#refdate').val("");
  $('#hrno').val("");
  $('#deprec').val("");
  $('#woff').val("");
  // $('#module').val("");
  // $('#typei').val("");
  $('#remark').val("");
  
  $('#table').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#table").load('<?php echo base_url(); ?>index.php/share/modal_list_reverse/<?php echo $val->vchno; ?>');
 });
</script>
<?php $n++; } ?>
</tbody>
</table>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc345").DataTable();
</script>