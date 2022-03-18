<?php
  function DateThai($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
  }

  $strDate = date("Y-m-d");
  // echo "ThaiCreate.Com Time now : ".DateThai($strDate);
?>
<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Tender No</th>
<th>Project Name</th>
<th>Date</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->bd_tenid; ?></td>
<th><?php echo $val->bd_pname; ?></th>
<td><?php echo DateThai($val->bd_date); ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
</tr>

<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
  	
  	$("#bd_chk").val("E");
    $("#bd_tenid").val("<?php echo $val->bd_tenid; ?>");
  	$("#bd_type").val("<?php echo $val->bd_type; ?>");

	if('<?php echo $val->bd_type; ?>'==1){
   		$("#bd_type1").prop('checked', true);
   	}else if('<?php echo $val->bd_type; ?>'==2){
   		$("#bd_type2").prop('checked', true);
   	}

  	$("#bd_pno").val("<?php echo $val->bd_pno; ?>");
    $("#bd_status").val("<?php echo $val->bd_status; ?>");
    
  	$("#bd_pname").val("<?php echo $val->bd_pname; ?>");
  	$("#bd_date").val("<?php echo $val->bd_date; ?>");
  	$("#bd_year").val("<?php echo $val->bd_year; ?>");
  	$("#bd_month").val("<?php echo $val->bd_month; ?>");
  	$("#bd_bdstats").val("<?php echo $val->bd_bdstats; ?>");
  	$("#bd_cus").val("<?php echo $val->bd_cus; ?>");
  	$("#bd_cusn").val("<?php echo $val->bd_cusn; ?>");
  	$("#bd_conno").val("<?php echo $val->bd_conno; ?>");
  	$("#bd_conname").val("<?php echo $val->bd_conname; ?>");
  	$("#bd_unit").val("<?php echo $val->bd_unit; ?>");
  	$("#bd_unitname").val("<?php echo $val->bd_unitname; ?>");
  	$("#bd_unitno").val("<?php echo $val->bd_unitno; ?>");
  	$("#bd_gtype").val("<?php echo $val->bd_gtype; ?>");
  	$("#bd_besiness").val("<?php echo $val->bd_besiness; ?>");
  	$("#bd_produce").val("<?php echo $val->bd_produce; ?>");
  	$("#fa_delect").show();

    $("#bd_tenname").val("<?php echo $val->bd_pname; ?>");

  	$("#body").html("<img src='<?php echo base_url();?>assets/images/loading.gif'>Loading...");
  	$("#body").load('<?php echo base_url(); ?>index.php/bd/bdtender_d/'+"<?php echo $val->bd_tenid; ?>");

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
