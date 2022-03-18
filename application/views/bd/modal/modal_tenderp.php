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
<th>Tender Code</th>
<th>Project Name</th>
<th>Date</th>
<th width="5%">Active</th>
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
<!-- bd_status != ","win -->
<?php 
  if($val->bd_status == "win"){
    $disabled="disabled";
  }else{
    $disabled="";
  }
?>
<td><button <?=$disabled?> class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" data_id="<?php echo $val->bd_tenid; ?>" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>

<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#bd_tenid").val("<?php echo $val->bd_tenid; ?>");
    $("#bd_tenname").val("<?php echo $val->bd_pname; ?>");
    $(".bd_tenid_ed").val("<?php echo $val->bd_tenid; ?>");
    $(".bd_tenname_ed").val("<?php echo $val->bd_pname; ?>");
    $("#projname").val("<?php echo $val->bd_pname; ?>");
    $('#ownercode').val("<?php echo $val->debtor_code; ?>");
    $('#ownername_th').val("<?php echo $val->debtor_name; ?>");
    $('#ownername_en').val("");
    $('#owner_address').val("<?php echo $val->debtor_address; ?>");
    $('#owner_phonenumber').val("<?php echo $val->debtor_tel; ?>");
    $('#owner_fax').val("<?php echo $val->debtor_fax; ?>");
    $('#owner_email').val("<?php echo $val->debtor_fax; ?>");
    $("#tdetailx").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#tdetailx").load('<?php echo base_url(); ?>index.php/management/tender_detail/<?php echo $val->bd_tenid; ?>');  
    $('.insrows').hide();
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
