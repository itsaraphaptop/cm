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
<?php $n=1; $fa_depreciationcode=0; ?>
<?php foreach ($res as $val){ 
  $fa_depreciationcode = $val->fa_depreciationcode;
  ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><div style="width: 100px;"><p><?php echo DateThai($val->fa_assdate); ?></p></div></td>
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

<?php 
$this->db->select('*');
$this->db->from('depreciation_item');
$this->db->where('de_ass',$val->fa_assetcode);
$item=$this->db->get();
$query1 = $item->num_rows()/12;
$total = ceil($query1); 
$qtotal = $query1 ;

if($total=="0"){
      $totall=1;
}else{
      $totall= ceil($query1);

}
?>
<?php 
$this->db->select('*');
$this->db->from('depreciation_item');
$this->db->where('de_ass',$val->fa_assetcode);
$amout=$this->db->get()->result();
?>

  <?php $depbf=$val->fa_bf; $d_day=0;  $fa_this=0; $fa_prev=0; $de_datefig=""; $datee=0; $y=0; $m=0; $d=0; foreach ($amout as $k ) {
if($total==0){
      $depbf = 0;
}else if($total!=0){
      $depbf = $depbf+$k->de_periond; 
      $d_day = $d_day+$k->de_day;    
} 
$fa_prev = $fa_prev+$k->de_periond; 
$fa_this = $k->de_periond;
$de_datefig = $k->de_datefig;

$datee = str_replace('-', '', $de_datefig); 
 $y = substr($datee,0,4);
 $m = substr($datee,4,2);
 $d = substr($datee,6,2);
}  ?>

<?php 
$this->db->select('*');
$this->db->from('depreciation_item');
$this->db->where('de_ass',$val->fa_assetcode);
$item=$this->db->get();
$query1 = $item->num_rows()/12;
$total = ceil($query1); 
$qtotal = $query1 ;

if($total=="0"){
      $totall=1;
}else{
      $totall= ceil($query1);
}
?>

<?php 
$this->db->select('*');
$this->db->from('depreciation_detail');
$this->db->where('depreciation_codeh',$fa_depreciationcode);
$this->db->where('depreciation_y',$totall);
$query=$this->db->get()->result();
?>
<?php  foreach ($query as $e) { ?>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#off_asscode").val("<?php echo $val->fa_assetcode; ?>");
    $("#off_assname").val('<?php echo $val->fa_asset;?>');
    $("#off_assname").val('<?php echo $val->fa_asset;?>');

    $("#off_depre").val("<?php echo $fa_prev; ?>");
    $("#off_depas").val("<?php echo $de_datefig ; ?>");
    $("#off_buyam").val("<?php echo intval($val->fa_amount); ?>");

    $("#off_buycode").val("<?php echo $val->fa_depreciationcode; ?>");
    $("#off_buyd").val("<?php echo $val->fa_dtype;?>");
    $("#off_depdayper").val("<?php echo $e->depreciation_per; ?>");
  });
</script>
<?php  } ?>
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





