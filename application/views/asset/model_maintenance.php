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
<th>Date</th>
<th>Project / Department</th>
<th>Asset Code</th>
<th>Asset Name</th>
<th>Amount</th>
<th>Status</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php $n=1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><div style="width: 80px;"><p><?php echo DateThai($val->fa_assdate); ?></p></div></td>
<td><?php echo $val->fa_projectname; ?><?php echo $val->fa_departmentname; ?></td>
<td><?php echo $val->fa_assetcode; ?></td>
<td><?php echo $val->fa_asset; ?></td>
<td><?php echo $val->fa_amount; ?></td>
<td><?php if($val->fa_status==1){
    echo '<span class="label label-info">Normal</span>';
  }else if($val->fa_status==2){
     echo '<span class="label bg-teal help-inline">Repair</span>';
    }else if($val->fa_status==3){
     echo '<span class="label label-danger">Write Off</span>';
    } ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#accode").val("<?php echo $val->fa_assetcode; ?>");
    $("#acname").val('<?php echo $val->fa_asset; ?>');
    $("#emp_code").val('<?php echo $val->fa_liseid; ?>');
    $("#emp_name").val('<?php echo $val->fa_lisename; ?>');
    $("#dpt_no").val('<?php echo $val->fa_departmentid; ?>');
    $("#dpt_name").val('<?php echo $val->fa_departmentname; ?>');
    $("#pro_no").val('<?php echo $val->fa_projectid; ?>');
    $("#pro_name").val('<?php echo $val->fa_projectname; ?>');

  $("#xa").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#xa").load('<?php echo base_url(); ?>index.php/add_asset/save_maintenance/<?php echo $val->fa_assetcode; ?>');

  $("#de").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#de").load('<?php echo base_url(); ?>index.php/add_asset/show_maintenance/<?php echo $val->fa_assetcode; ?>');
	
  $("#print").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#print").load('<?php echo base_url(); ?>index.php/add_asset/maintenance_print/<?php echo $val->fa_assetcode; ?>');
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





