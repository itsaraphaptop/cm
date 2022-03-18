<table class="table table-bordered table-responsive table-striped table-hover table-xxs datatable-basicr" >
  <thead>
    <tr>
      <th>No.</th>
      <th>Data_type</th>
      <th>Decument No.</th>
      <th>Date</th>
      <th>Vender</th>
      <th>Project/Department</th>
      <th>Progress Amount</th>
      <th>% Down</th>
      <th>% Retention</th>
      <!-- <th>Retention</th> -->
      <th>Complete</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 

    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
     $n =1; foreach ($prd as $val){ ?>
    <?php
    $this->db->select('*');
    $this->db->from('setupwt');
    $this->db->where('per_wt',$val->tax);
    $data = $this->db->get()->result();
    $wtper = "";
    foreach ($data as $key) {
    $wtper = $key->per_wt;
    }
    ?>
    <?php
    
    $qev = $this->db->query("select * from vender where vender_id='$val->contact'");
    $rvenn1 = $qev->result();
    $sub_contactname = "";
    $creaditterm ="";
    foreach ($rvenn1 as $ue) {
    $sub_contactname = $ue->vender_name;
    $creaditterm = $ue->vender_credit;
    }
    ?>
    <?php
    
    $qev1 = $this->db->query("select * from project where project_id='$val->projectcode'");
    $rvenn2 = $qev1->result();
    $sub_project = "";
    foreach ($rvenn2 as $tt) {
    $sub_project = $tt->project_name;
    }
    ?>
    <?php

    $qev2 = $this->db->query("select * from system where systemcode='$val->system'");
    $rvenn3 = $qev2->result();
    $sub_system = "";
    foreach ($rvenn3 as $ue) {
    $sub_system = $ue->systemname;
    }
    ?>
    <?php
    $qev3 = $this->db->query("select * from ap_billsuc_header where ap_bill_contractno='$val->lo_lono' and ap_bill_type='1' ");
    $rvenn4 = $qev3->result();
    $tot = 0;
    $ss = 0;
    $total= 0;
    foreach ($rvenn4 as $ue) {
    
    if($val->retentionmethod==1){
    $ss = $ss+$ue->ap_deduct_retper;
    }else if($val->retentionmethod==2){
    $ss = $ss+$ue->ap_deduct_retper;
    }
    
    $tot = $tot+$ue->ap_pay;
    $total = ($tot/$val->contactamount)*100;
    
    ?>
    
    
    <?php   } ?>
    <?php
    $qev = $this->db->query("select * from ap_billsuc_header where ap_bill_contractno='$val->lo_lono' and ap_bill_type='2'");
    $zrven1 = $qev->result();
    $tott = 0;
    foreach ($zrven1 as $ue111) {
    $tott = $tott+$ue111->ap_pay;
    }
    ?>
    <?php
    $qev5 = $this->db->query("select * from ap_billsuc_header where ap_bill_type='3' and ap_bill_contractno='$val->lo_lono' ");
    $rven22222 = $qev5->result();
    $xva = 0;
    foreach ($rven22222 as $ue11111111) {
    $xva = $xva+$ue11111111->ap_pay;
    $numrow3 = 1+$qev5->num_rows();
    }
    ?>
    <?php
    $fffff = ($val->contactamount*$val->advance)/100;
    if($val->retentionmethod==1){
    $ccccccc = ($val->contactamount*$val->retentionper)/100;
    }else if($val->retentionmethod==2){
    $a1 = intval($val->contactamount);
    $a2 = intval($val->vat);
    $a3 = intval($val->retentionper);
    $ccccccc = ((($a1*$a2)/100)+$a1)*$a3/100;
    
    }
    
    ?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td>Normal </td>
      <td><?php echo $val->lo_lono; ?></td>
      <td><?php echo $val->lodate;?></td>
      <td><?php echo @$sub_contactname; ?> (<?php echo @$val->contact; ?>)</td>
      <td><?php echo $tt->project_name; ?></td>
      <td><?php echo number_format($val->contactamount,2); ?></td>
     
      <td><?php echo $val->advance; ?></td>
      <td><?php echo $val->retentionper; ?></td>
      <!-- <td><?php echo $val->retentionp; ?></td> -->
       <?php
      if($val->contactamount<=$tot){
      echo '<td><span class="label bg-success-400">Yes</span></td>';
      }else{
      echo '<td><span class="label bg-danger-400">No</span></td>';
      }
      ?>
      <td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" id="opendeptor<?php echo $n;?>" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
    </tr>
    <script>
    $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#ap_advance_bill").val("<?php  echo $tott; ?>");
    $("#ap_bill_contractno").val("<?php echo $val->lo_lono; ?>");
    $("#ap_bill_vendername").val("<?php echo $sub_contactname; ?>");
    $("#ap_bill_vender").val("<?php echo $val->contact; ?>");
    $("#ap_payto").val("<?php echo $val->subcontact; ?>");
    $("#ap_paytoname").val("<?php echo $sub_contactname; ?>");
    $("#ap_bill_crtermheader").val("<?php echo $creaditterm;?>");
    $("#ap_bill_project").val("<?php echo $val->projectcode; ?>");
    $("#ap_contracttype").val('<?php echo $val->contactdesc; ?>');
    $("#ap_contractamount").val("<?php echo $val->contactamount; ?>");
    $("#ap_pay").val("<?php echo $val->contactamount-$tot; ?>");
    $("#ap_advanceper").val("<?php echo $val->advance; ?>");
    $("#ap_bill_projectname").val("<?php echo $val->projownername; ?>");
    $("#ap_advanceamount").val("<?php echo $fffff; ?>");
    $("#ap_retentionper").val("<?php echo $val->retentionper; ?>");
    $("#ap_retentionamount").val("<?php echo $ccccccc; ?>");
    $("#ap_bill_type").prop("disabled",false);
    
    $("#api_remark").val("<?php echo $val->other; ?>");
    $("#api_remark2").val("<?php echo $val->other_2; ?>");
    $("#api_remark3").val("<?php echo $val->other_3; ?>");
    $("#ap_frome").val("<?php if(1==$val->retentionmethod){ echo "Progress"; }else{ echo "Progress + Vat"; } ?>");
    $("#ap_frome1").val("<?php echo $val->retentionmethod; ?>");
    $("#ap_wt").val("<?php echo $val->tax; ?>");

    $("#systemcode").val("<?php echo $val->system; ?>");
    $("#ap_bill_systemcode").val("<?php echo $val->system; ?>");
    $("#systemname").val("<?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$val->system);
                        $tender_d=$this->db->get()->result(); 
                        foreach ($tender_d as $tender_dd) {  
                            echo $tender_dd->systemname; } 
                            ?>");
    $("#ap_bill_systemname").val("<?php
                        $this->db->select('*');
                        $this->db->from('system');
                        $this->db->where('compcode', $compcode);
                        $this->db->where('systemcode',$val->system);
                        $tender_d=$this->db->get()->result(); 
                        foreach ($tender_d as $tender_dd) {  
                            echo $tender_dd->systemname; } 
                            ?>");

    
    $("#table").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#table").load('<?php echo base_url(); ?>aps_active/load_detaillo/'+"<?php echo $val->lo_lono; ?>");
    $("#progress_history").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#progress_history").load('<?php echo base_url(); ?>aps_active/progress_history/'+"<?php echo $val->lo_lono; ?>");
    
    
    $("#ap_bill_type").change(function(event) {
    if ($("#ap_bill_type").val()=="3") {
    $("#ap_pay").val('<?php echo $ss-$xva; ?>');
    var amt = $("#ap_contractamount").val();
    var ap_retentionamount = $("#ap_retentionamount").val();
    var vat = parseFloat($("#ap_pay").val());
    var vattot = (vat*100)/amt;
    var tt = vattot.toFixed(2);
    $("#ap_payper").val(tt);
    
    
    var ap_redown = $("#ap_redown").val();
    var vattotxxxx = (vat*ap_redown)/100;
    var ddxxxx = vattotxxxx.toFixed(2);
    $("#ap_redownper").val(ddxxxx);
    var ap_vat = parseFloat($("#ap_vat").val());
    var ap_frome = $("#ap_frome").val();
    var zz = $("#ap_deduct_ret").val();
    var ap_vatper = parseFloat($("#ap_vatper").val());
    var bobb = vat;
    var bobb1 = (bobb*zz)/100;
    var notttt1 = (((bobb*ap_vat)/100)+bobb)*zz/100;
    var nottttt = notttt1.toFixed(4);
    if ($("#ap_frome1").val()==1) {
    var c =  bobb1;
    }else if ($("#ap_frome1").val()==2){
    var c = notttt1;
    }
    if ($("#ap_frome1").val()==1) {
    $("#ap_deduct_retper").val(bobb1);
    }else if ($("#ap_frome1").val()==2){
    $("#ap_deduct_retper").val(parseFloat(notttt1));
    }
    
    
    var ap_pay = $("#ap_pay").val();
    var ap_redownper = $("#ap_redownper").val();
    var ap_vat = $("#ap_vat").val();
    var vatbob = (ap_pay-ap_redownper)*ap_vat/100;
    var bb = vatbob.toFixed(2);
    $("#ap_vatper").val(bb);
    
    var ap_redownper = $("#ap_redownper").val();
    var ap_wtper = $("#ap_wtper").val();
    var vvvv = (vat-ap_redownper)*ap_wtper/100;
    var xxxx = vvvv.toFixed(2);
    $("#ap_wtamount").val(xxxx);
    
    var ap_amountdown = parseFloat($("#ap_amountdown").val());
    $("#api_thisamounttotal").val();
    $('#ap_amount').val(((((vat-ddxxxx)+vatbob)-c)-vvvv));
    $('#ap_amount2').val((((((vat-ddxxxx)+vatbob)-c)-vvvv)+ap_amountdown));
    $('#ap_contracttype').val('<?php echo $val->lo_lono; ?>');
    $("#ap_bill_typee").val("3");
    $("#progresspayment").show();
    $("#ap_vat").val("0");
    $("#ap_redown").val("0");
    $("#ap_deduct_ret").val("0");
    $("#ap_wtper").val('0');


    $("#delall").show();
    $('#endetail').hide();
    $("#ap_bill_type").prop('disabled', true);
    $("#ap_bill_inv").prop('disabled', false);
    $("#ap_bill_date").prop('disabled', false);
    $("#ap_bill_duedate").prop('disabled', false);
    $("#ap_bill_invdate").prop('disabled', false);
    $("#ap_bill_crterm").prop('disabled', false);
    $("#ap_pay").prop('disabled', false);
    $("#ap_payper").prop('disabled', false);
    $("#ap_redown").prop('disabled', false);
    $("#ap_redownper").prop('disabled', false);
    $("#ap_vat").prop('disabled', false);
    $("#ap_vatper").prop('disabled', false);
    $("#ap_deduct_ret").prop('disabled', false);
    $("#ap_deduct_retper").prop('disabled', false);
    $("#ap_wt").prop('disabled', false);
    $("#ap_wtper").prop('disabled', false);
    $("#ap_wtamount").prop('disabled', false);
    $("#ap_amount").prop('disabled', false);
    $("#ap_remark").prop('disabled', false);
    $("#ap_paydate").prop('disabled', false);

    $("#ap_period").val("<?php
    $this->db->select('*');
    $this->db->from('ap_billsuc_header');
    $this->db->where('ap_bill_type',"3");
    $this->db->where('ap_bill_contractno',$val->lo_lono);
    $query33=$this->db->get();
    echo $query33->num_rows()+1;
    ?>");
    }else if($("#ap_bill_type").val()=="2"){
    $("#ap_period").val("<?php
    $this->db->select('*');
    $this->db->from('ap_billsuc_header');
    $this->db->where('ap_bill_type',"2");
    $this->db->where('ap_bill_contractno',$val->lo_lono);
    $query33=$this->db->get();
    echo $query33->num_rows()+1;
    ?>");

    $("#ap_vat").val("<?php echo $val->vat; ?>");
    $("#ap_redown").val("<?php echo $val->advance1; ?>");
    $("#ap_deduct_ret").val("<?php echo $val->retentionper; ?>");
    $("#ap_wtper").val('<?php echo $wtper;  ?>');

    
    $("#ap_bill_typee").val("2");
    $("#ap_pay").val("<?php echo ($val->contactamount*$val->advance)/100; ?>");
    var amt = $("#ap_contractamount").val();
    var vat = parseFloat($("#ap_pay").val());
    var vattot = (vat*100)/amt;
    var tt = vattot.toFixed(2);
    $("#ap_payper").val(tt);

    var ap_redown = $("#ap_redown").val();
    var vattotxxxx = (vat*ap_redown)/100;
    var ddxxxx = vattotxxxx.toFixed(2);
    $("#ap_redownper").val(ddxxxx);
    var ap_vat = parseFloat($("#ap_vat").val());
    var ap_frome = $("#ap_frome").val();
    var zz = $("#ap_deduct_ret").val();
    var ap_vatper = parseFloat($("#ap_vatper").val());
    var bobb = vat;
    var bobb1 = (bobb*zz)/100;
    var notttt1 = (((bobb*ap_vat)/100)+bobb)*zz/100;
    var nottttt = notttt1.toFixed(4);
    if ($("#ap_frome1").val()==1) {
    var c =  bobb1;
    }else if ($("#ap_frome1").val()==2){
    var c = notttt1;
    }
    if ($("#ap_frome1").val()==1) {
    $("#ap_deduct_retper").val(bobb1);
    }else if ($("#ap_frome1").val()==2){
    $("#ap_deduct_retper").val(parseFloat(notttt1));
    }
    
    
    var ap_pay = $("#ap_pay").val();
    var ap_redownper = $("#ap_redownper").val();
    var ap_vat = $("#ap_vat").val();
    var vatbob = (ap_pay-ap_redownper)*ap_vat/100;
    var bb = vatbob.toFixed(2);
    $("#ap_vatper").val(bb);
    
    var ap_redownper = $("#ap_redownper").val();
    var ap_wtper = $("#ap_wtper").val();
    var vvvv = (vat-ap_redownper)*ap_wtper/100;
    var xxxx = vvvv.toFixed(2);
    $("#ap_wtamount").val(xxxx);
    
    var ap_amountdown = parseFloat($("#ap_amountdown").val());
    $("#api_thisamounttotal").val();
    $('#ap_amount').val(((((vat-ddxxxx)+vatbob)-c)-vvvv));
    $('#ap_amount2').val((((((vat-ddxxxx)+vatbob)-c)-vvvv)+ap_amountdown));

    
    $("#progresspayment").show();
    $("#delall").show();
    $('#endetail').hide();
    $("#ap_bill_type").prop('disabled', true);
    $("#ap_bill_inv").prop('disabled', false);
    $("#ap_bill_date").prop('disabled', false);
    $("#ap_bill_duedate").prop('disabled', false);
    $("#ap_bill_invdate").prop('disabled', false);
    $("#ap_bill_crterm").prop('disabled', false);
    $("#ap_pay").prop('disabled', false);
    $("#ap_payper").prop('disabled', false);
    $("#ap_redown").prop('disabled', false);
    $("#ap_redownper").prop('disabled', false);
    $("#ap_vat").prop('disabled', false);
    $("#ap_vatper").prop('disabled', false);
    $("#ap_deduct_ret").prop('disabled', false);
    $("#ap_deduct_retper").prop('disabled', false);
    $("#ap_wt").prop('disabled', false);
    $("#ap_wtper").prop('disabled', false);
    $("#ap_wtamount").prop('disabled', false);
    $("#ap_amount").prop('disabled', false);
    $("#ap_remark").prop('disabled', false);
    $("#ap_paydate").prop('disabled', false);
    }else if($("#ap_bill_type").val()=="1"){
    $("#table").show();
    $("#ap_bill_typee").val("1");
    $("#ap_redown").val('0');
    $("#progresspayment").show();
    $("#delall").show();
    $("#ap_bill_type").prop('disabled', true);
    var amt = $("#ap_contractamount").val();
    var vat = parseFloat($("#ap_pay").val());
    var vattot = (vat*100)/amt;
    var tt = vattot.toFixed(2);
    $("#ap_payper").val(tt);
    
    $("#ap_vat").val("<?php echo $val->vatper; ?>");
    $("#ap_redown").val("<?php echo $val->advance; ?>");
    $("#ap_deduct_ret").val("<?php echo $val->retentionper; ?>");
    $("#ap_wt").val('<?php echo $wtper;  ?>');
    $("#ap_wtper").val('<?php echo $wtper;  ?>');
    
    var ap_redown = $("#ap_redown").val();
    var vattotxxxx = (vat*ap_redown)/100;
    var ddxxxx = vattotxxxx.toFixed(2);
    $("#ap_redownper").val(ddxxxx);
    var ap_vat = parseFloat($("#ap_vat").val());
    var ap_frome = $("#ap_frome").val();
    var zz = $("#ap_deduct_ret").val();
    var ap_vatper = parseFloat($("#ap_vatper").val());
    var bobb = vat;
    var bobb1 = (bobb*zz)/100;
    var notttt1 = (((bobb*ap_vat)/100)+bobb)*zz/100;
    var nottttt = notttt1.toFixed(4);
    if ($("#ap_frome1").val()==1) {
    var c =  bobb1;
    }else if ($("#ap_frome1").val()==2){
    var c = notttt1;
    }
    if ($("#ap_frome1").val()==1) {
    $("#ap_deduct_retper").val(bobb1);
    }else if ($("#ap_frome1").val()==2){
    $("#ap_deduct_retper").val(parseFloat(notttt1));
    }
    
    
    var ap_pay = $("#ap_pay").val();
    var ap_redownper = $("#ap_redownper").val();
    var ap_vat = $("#ap_vat").val();
    var vatbob = (ap_pay-ap_redownper)*ap_vat/100;
    var bb = vatbob.toFixed(2);
    $("#ap_vatper").val(bb);
    
    var ap_redownper = $("#ap_redownper").val();
    var ap_wtper = $("#ap_wtper").val();
    var vvvv = (vat-ap_redownper)*ap_wtper/100;
    var xxxx = vvvv.toFixed(2);
    $("#ap_wtamount").val(xxxx);
    
    var ap_amountdown = parseFloat($("#ap_amountdown").val());
    $("#api_thisamounttotal").val();
    $('#ap_amount').val(((((vat-ddxxxx)+vatbob)-c)-vvvv));
    $('#ap_amount2').val((((((vat-ddxxxx)+vatbob)-c)-vvvv)+ap_amountdown));
    
    
    $("#ap_period").val("<?php
    $this->db->select('*');
    $this->db->from('ap_billsuc_header');
    $this->db->where('ap_bill_type',"1");
    $this->db->where('ap_bill_contractno',$val->lo_lono);
    $query33=$this->db->get();
    echo $query33->num_rows()+1;
    ?>");
    }
    //   if($("#ap_retention_acc").val() == $("#ap_retention_progress").val()){
    //   $("#ap_bill_inv").prop('disabled', true);
    //    $("#ap_bill_date").prop('disabled', true);
    //    $("#ap_bill_duedate").prop('disabled', true);
    //    $("#ap_bill_invdate").prop('disabled', true);
    //    $("#ap_bill_crterm").prop('disabled', true);
    //    $("#ap_pay").prop('disabled', true);
    //    $("#ap_payper").prop('disabled', true);
    //    $("#ap_redown").prop('disabled', true);
    //    $("#ap_redownper").prop('disabled', true);
    //    $("#ap_vat").prop('disabled', true);
    //    $("#ap_vatper").prop('disabled', true);
    //    $("#ap_deduct_ret").prop('disabled', true);
    //    $("#ap_deduct_retper").prop('disabled', true);
    //    $("#ap_wt").prop('disabled', true);
    //    $("#ap_wtper").prop('disabled', true);
    //    $("#ap_wtamount").prop('disabled', true);
    //    $("#ap_amount").prop('disabled', true);
    //    $("#ap_remark").prop('disabled', true);
    //    $("#ap_paydate").prop('disabled', true);
    
    // }
    
    });
    });
    </script>
    <script>
    $("#opendeptor<?php echo $n;?>").click(function(event) {
    $("#ap_progress_bill").val("<?php echo $tot ; ?>");
    $("#ap_progressamount").val("<?php echo $tot ; ?>");
    $("#ap_progress_billper").val("<?php  echo $total ;   ?>");
    
    
    $("#ap_retention_acc").val("<?php  echo $xva; ?>");
    $("#ap_retention_progress").val("<?php  echo $ss; ?>");
    $("#ap_retention_balance").val("<?php  echo $ss-$xva; ?>");
    
    
    });
    </script>
    <?php $n++; } ?>
  </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
$.extend( $.fn.dataTable.defaults, {
autoWidth: false,
columnDefs: [{
orderable: false,
width: '100px',
targets: [ 3 ]
}],
dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
language: {
search: '<span>Filter:</span> _INPUT_',
lengthMenu: '<span>Show:</span> _MENU_',
paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
},
drawCallback: function () {
$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
},
preDrawCallback: function() {
$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
}
});
$('.datatable-basicr').DataTable();
</script>