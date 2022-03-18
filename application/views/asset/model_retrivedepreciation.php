<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th></th>
<th>Date</th>
<th>Date from</th>
<th>Date to</th>
<th>Vchno</th>
<th>Status</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php $n=1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->de_code; ?></td>
<td><?php echo $val->de_date; ?></td>
<td><?php echo $val->de_datefrom; ?></td>
<td><?php echo $val->de_dateto; ?></td>
<td><?php echo $val->vchno; ?></td>
<td><?php echo $val->status; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
  	 $("#de_code").val("<?php echo $val->de_code; ?>");
  	  $("#de_date").val("<?php echo $val->de_date; ?>");
  	   $("#de_glno").val("<?php echo $val->de_glno; ?>");
  	    $("#de_gldate").val("<?php echo $val->de_gldate; ?>");
  	     $("#de_glyear").val("<?php echo $val->de_glyear; ?>");
  	      $("#de_yearr").val("<?php echo $val->de_yearr; ?>");
  	       $("#de_month").val("<?php echo $val->de_month; ?>");
  	        $("#de_period").val("<?php echo $val->de_period; ?>");
  	         $("#de_datefrom").val("<?php echo $val->de_datefrom; ?>");
              $("#de_dateto").val("<?php echo $val->de_dateto; ?>");
              $("#de_total").val("<?php echo $val->de_total; ?>");
              $("#de_remark").val("<?php echo $val->de_remark; ?>");
              

  $("#body").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#body").load('<?php echo base_url(); ?>index.php/add_asset/retrivedepreciation_detail/'+"<?php echo $val->de_code; ?>");
  $("#delperiod").load('<?php echo base_url(); ?>index.php/add_depreciation/delindex/'+"<?php echo $val->de_code; ?>");

        <?php 
        $this->db->select('*');
        $this->db->where('gl_batch_header.vchno',$val->vchno);
        $this->db->join('gl_batch_header','gl_batch_header.vchno = depreciation.vchno');
        $q = $this->db->get('depreciation');
        $type = $q->result();
        $glyear = "";
        $glperiod = "";
        $vchdate = "";
        foreach ($type as $key) {
          $vchdate = $key->vchdate;
          $glyear = $key->glyear;
          $glperiod = $key->glperiod;
        }
        ?>
        $('#de_glno').val("<?php echo $val->vchno; ?>");
        $('#de_gldate').val("<?php echo $vchdate; ?>");
        $("#de_glyear").val("<?php echo $glyear; ?>");
        $("#de_period").val("<?php echo $glperiod; ?>");
  });
  	</script>

<?php $n++; } ?>

</tbody>
</table>
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc").DataTable();
</script>



