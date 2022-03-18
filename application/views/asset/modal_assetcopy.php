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
<table class="table table-xxs table-hover datatable-basicxccopy" >
<thead>
<tr>
<th>No.</th>
<th>User By</th>
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
<th><?php echo $val->fa_lisename; ?></th>
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
    $("#fa_status").val("<?php echo $val->fa_status; ?>");
    $("#fa_assetcode").val("<?php echo $val->fa_assetcode; ?>");
   	$("#fa_ref").val("<?php echo $val->fa_ref; ?>");
   	$("#fa_dtype").val("<?php echo $val->fa_dtype;?>");
   	$("#fa_asset").val('<?php echo $val->fa_asset;?>');
   	$("#fa_group").val("<?php echo $val->fa_group; ?>");
   	if(1=='<?php echo $val->fa_rent; ?>'){
   		$("#fa_rent").prop('checked', true);
   	}

   	$("#fa_refap").val("<?php echo $val->fa_refap; ?>");
   	$("#fa_assdate").val("<?php echo $val->fa_assdate; ?>");
   	$("#fa_refpo").val("<?php echo $val->fa_refpo; ?>");
   	$("#fa_atype").val("<?php echo $val->fa_atype; ?>");
    $("#fa_atypename").val("<?php echo $val->fa_atypename; ?>");
    $("#fa_tax").val("<?php echo $val->fa_tax; ?>");
    $("#fa_gldate").val("<?php echo $val->fa_gldate; ?>");
    $("#fa_year").val("<?php echo $val->fa_year; ?>");
    $("#fa_month").val("<?php echo $val->fa_month; ?>");   
    $("#venderid1").val("<?php echo $val->fa_vender; ?>");
    $("#subcontact").val("<?php echo $val->fa_vendername; ?>");
    $("#fa_sr").val("<?php echo $val->fa_sr; ?>");

    if(1=='<?php echo $val->fa_warantee; ?>'){
    	 $("#fa_warantee1").prop('checked', true);
    }else if(2=='<?php echo $val->fa_warantee; ?>'){
    	 $("#fa_warantee2").prop('checked', true);
    }else if(3=='<?php echo $val->fa_warantee; ?>'){
    	 $("#fa_warantee3").prop('checked', true);
    }
   

  
    $("#fa_waranty").val("<?php echo $val->fa_waranty; ?>");
    $("#fa_warantydate").val("<?php echo $val->fa_warantydate; ?>");
   	$("#fa_amount").val("<?php echo $val->fa_amount; ?>");
    $("#fa_quantity").val("<?php echo $val->fa_quantity; ?>");
    $("#fa_unit1").val("<?php echo $val->fa_unit; ?>");
    $("#fa_state").val("<?php echo $val->fa_state; ?>");

    if(1=='<?php echo $val->fa_depreciation; ?>'){
    	 $("#fa_depreciation1").prop('checked', true);
    }else if(2=='<?php echo $val->fa_depreciation; ?>'){
    	  $("#fa_depreciation2").prop('checked', true);
    	}
    $("#fa_depreciationcode").val("<?php echo $val->fa_depreciationcode; ?>");
    $("#fa_depreciationname").val("<?php echo $val->fa_depreciationname; ?>");
    $("#fa_bf").val("<?php echo $val->fa_bf; ?>");
    $("#fa_asdate").val("<?php echo $val->fa_asdate; ?>");
    $("#fa_yearbf").val("<?php echo $val->fa_yearbf; ?>");
    $("#fa_monthbf").val("<?php echo $val->fa_monthbf; ?>");
    $("#fa_prev").val("<?php echo $val->fa_prev; ?>");
     $("#fa_this").val("<?php echo $val->fa_this; ?>");
    $("#fa_thisdate").val("<?php echo $val->fa_thisdate; ?>");
    $("#fa_yearprev").val("<?php echo $val->fa_yearprev; ?>");
    $("#fa_monthprev").val("<?php echo $val->fa_monthprev; ?>");
    $("#fa_total").val("<?php echo $val->fa_total; ?>");
    $("#fa_residual").val("<?php echo $val->fa_residual; ?>");
    $("#fa_amountbal").val("<?php echo $val->fa_amountbal; ?>");
    $("#fa_locationid").val("<?php echo $val->fa_locationid; ?>");
    $("#fa_locationname").val("<?php echo $val->fa_locationname; ?>");
    $("#fa_projectid").val("<?php echo $val->fa_projectid; ?>");

     if(1=='<?php echo $val->fa_location; ?>'){
    	 $("#fa_location1").prop('checked', true);
    }else if(2=='<?php echo $val->fa_location; ?>'){
    	  $("#fa_location2").prop('checked', true);
    	}
     $("#projectidd").val("<?php echo $val->fa_projectid; ?>");
     $("#projectnamee").val("<?php echo $val->fa_projectname; ?>");
     $("#fa_job").val("<?php echo $val->fa_job; ?>");
     $("#depid").val("<?php echo $val->fa_departmentid; ?>");
     $("#depname").val("<?php echo $val->fa_departmentname; ?>");
     $("#fa_issue").val("<?php echo $val->fa_issue; ?>");
     $("#fa_liseid").val("<?php echo $val->fa_liseid; ?>");
     $("#fa_lisename").val("<?php echo $val->fa_lisename; ?>");
     $("#fa_all1").val('<?php echo $val->fa_all1; ?>');
     $("#fa_all2").val('<?php echo $val->fa_all2; ?>');
     $("#fa_all3").val('<?php echo $val->fa_all3; ?>');
     $("#fa_all3").val('<?php echo $val->fa_all3; ?>');
     $("#fa_all4").val('<?php echo $val->fa_all4; ?>');
     $("#fa_all5").val('<?php echo $val->fa_all5; ?>');

     $("#at_acaid1").val("<?php echo $val->at_acaid; ?>");
     $("#at_aca1").val("<?php echo $val->at_aca; ?>");
     $("#at_acdid2").val("<?php echo $val->at_acdid; ?>");
     $("#at_acd2").val("<?php echo $val->at_acd; ?>");
     $("#at_costid3").val("<?php echo $val->at_costid; ?>");

     $("#at_cost3").val("<?php echo $val->at_cost; ?>");
     $("#at_acaccid4").val("<?php echo $val->at_acaccid; ?>");
     $("#at_acacc4").val("<?php echo $val->at_acacc; ?>");
     $("#chk").val("1");
     $("#id_fa").val("<?php echo $val->fa_no; ?>");


     
  $("#body").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#body").load('<?php echo base_url(); ?>index.php/add_asset/model_detailasset/'+"<?php echo $val->fa_assetcode; ?>");
    $("div#waratyhide").show();
    $("div#dptioncode").show();
    $("div#pjdptall").show();
    $("#jobhide2").hide();
    $("#jobhide1").hide();

    if(1=='<?php echo $val->fa_location; ?>'){
    $("#jobhide2").hide();
    $("#jobhide1").show();
    }else{
       $("#jobhide1").hide();
    $("#jobhide2").show();
    }
    if(3=='<?php echo $val->fa_status; ?>'){
        $("#wfdate").show();
    }
    $("#woffdate").val("<?php echo $val->woffdate; ?>");
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
  $(".datatable-basicxccopy").DataTable();
</script>





