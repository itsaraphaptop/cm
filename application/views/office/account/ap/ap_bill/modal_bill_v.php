<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th>No.</th>      
      <th>Seller / Vender</th>
      <th>Type</th>
      <th>Bill No.</th>
      <th>Period No.</th>
      <th>Project Name</th>      
      <th width="5%">Active</th>
    </tr>
  </thead>
  <tbody>
  <?php   $n =1;
  $session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
  ?>
  <?php foreach ($reportaps as $val){
    ?>
    <tr>
      <td scope="row"><?php echo $n;?></td>      
      <td width="25%"><?php echo $val->vender_name; ?></td>
      <td>
        <?php if ($val->ap_bill_type == 1) {
          echo "Progress";
        }elseif ($val->ap_bill_type == 2) {
          echo "Down";
        }else{
          echo "Retention";
        } 
        ?>
      </td>
      <td><?php echo $val->ap_bill_code; ?></td>
      <td><?php echo $val->ap_period; ?></td>
      <td><?php echo $val->project_name; ?></td>
      
      <td><button class="openvensmo<?php echo $n; ?> label label-xs label-primary" data-billcon<?php echo $n; ?>="<?php echo $val->ap_bill_datatype; ?>" data-idcontract<?php echo $n; ?>="<?php echo $val->ap_bill_contractno; ?>" 
      <?php 
        $this->db->select('*');
        $this->db->from('company');
        $com=$this->db->get()->result();
        foreach ($com as $company ) { 
          $company = $company->glrap;
        }

        if($company == "paid"){
          $com_paid = $val->ap_amount+$val->ap_deduct_retper+$val->ap_wtamount;
        }else{
          $com_paid = $val->ap_amount+$val->ap_wtamount;
        } 
        ?>
      data-crterm<?php echo $n; ?>="<?php echo $val->vender_credit; ?>" 
      data-subcon<?php echo $n; ?>="<?php echo $val->vender_name; ?>" 
      data-duedate<?php echo $n; ?>="<?php echo $val->ap_bill_duedate; ?>" 
      data-amt<?php echo $n; ?>="<?php echo $val->ap_pay; ?>" 
      data-ap_wtper<?php echo $n; ?>="<?php echo $val->ap_wtper; ?>"  
      data-wt<?php echo $n; ?>="<?php echo $val->ap_wt; ?>" 
      data-vat<?php echo $n; ?>="<?php echo $val->ap_vat; ?>" 
      data-vatper<?php echo $n; ?>="<?php echo $val->ap_vatper; ?>"
      data-apm<?php echo $n; ?>="<?php echo $com_paid; ?>"
      data-ap_reten<?php echo $n; ?>="<?php echo $val->ap_deduct_retper; ?>"
      data-ap_adv<?php echo $n; ?>="<?php echo $val->ap_redownper; ?>" 
      data-ap_wta<?php echo $n; ?>="<?php echo $val->ap_wtamount; ?>"
      data-subcon2<?php echo $n; ?>="<?php echo $val->ap_bill_vender; ?>"
      data-proj<?php echo $n; ?>="<?php echo $val->project_name; ?>"
      data-valu<?php echo $n; ?>="<?php echo $val->project_id; ?>" 
      data-vendercode<?php echo $n; ?>="<?php echo $val->vender_code; ?>" 
      data-system<?php echo $n; ?>="<?php echo $val->ap_system; ?>" 
      data-type<?php echo $n; ?>="<?php echo $val->ap_bill_type; ?>"
      data-less<?php echo $n; ?>="<?php echo $val->ap_amountdown; ?>"
      data-period<?php echo $n; ?>="<?php echo $val->ap_period; ?>"
      data-lo_lono<?php echo $n; ?>="<?php echo $val->lo_lono; ?>"
      data-bill_id<?=$n;?>="<?=$val->ap_bill_id;?>"
      
      data-apdeduck<?=$n;?>="<?=$val->ap_deduct; ?>"


      data-bill<?php echo $n; ?>="<?php echo $val->ap_bill_code; ?>" data-dismiss="modal">SELECT
      </button>
    </td>


<script>
  $(".openvensmo<?php echo $n; ?>").click(function(event) {
    $(".addrow").prop('disabled', false);
    $(".bsave").prop('disabled', false);
    $("#crterm").val($(this).data('crterm<?php echo $n;?>'));
    $("#datatype").val($(this).data('billcon<?php echo $n;?>'));
    $("#subno").val($(this).data('idcontract<?php echo $n;?>'));
    $("#subconname").val($(this).data('subcon<?php echo $n;?>'));
    $("#duedate").val($(this).data('duedate<?php echo $n;?>'));
    $("#amt").val($(this).data('amt<?php echo $n;?>'));
    $("#ap_wt").val($(this).data('wt<?php echo $n;?>'));
    $("#nameve").val($(this).data('subcon<?php echo $n;?>'));
    $("#vat").val($(this).data('vat<?php echo $n;?>'));

    let amt = $(this).data('vatper<?php echo $n;?>')*1;
    let lo = $(this).data('lo_lono<?php echo $n;?>');
    let money_start = $(this).data('amt<?php echo $n;?>')*1;
    let vatamt = $(this).data('amt<?php echo $n;?>')*1;
    let adv = $(this).data('ap_adv<?php echo $n;?>')*1;
    let vatwt = $(this).data('ap_wtper<?php echo $n;?>')*1;
    var val = $(this).data('apdeduck<?php echo $n;?>');
    let wtamt = (money_start - val - adv) * vatwt/100;
    // alert( `${money_start} - ${val} - ${adv}`);
    $("#invamt").val($(this).data('vatper<?php echo $n;?>'));
    $("#netamt").val(amt + vatamt);
    $("#reten").val($(this).data('ap_reten<?php echo $n;?>'));
    $("#ladv").val($(this).data('ap_adv<?php echo $n;?>'));
    // $("#wtamt").val($(this).data('ap_wta<?php echo $n;?>'));
    $("#wtamt").val(wtamt);
    $("#subcon").val($(this).data('subcon2<?php echo $n;?>'));
    $("#system").val($(this).data('system<?php echo $n;?>'));
    $("#acct_no").val($(this).data('vendercode<?php echo $n;?>'));
    $("#pre_eventname").val($(this).data('proj<?php echo $n;?>'));
    $("#projid").val($(this).data('valu<?php echo $n;?>'));
    $("#billno").val($(this).data('bill<?php echo $n;?>'));
    $("#ap_wtper").val($(this).data('ap_wtper<?php echo $n;?>'));
    $("#wt_vat").val($(this).data('ap_wtper<?php echo $n;?>'));
    $("#type").val($(this).data('type<?php echo $n;?>'));
    $("#period").val($(this).data('period<?php echo $n;?>'));
    $("#lessother").val($(this).data('less<?php echo $n;?>'));
    $("#de_duct").val($(this).data('apdeduck<?php echo $n;?>'));
    $("#bill_id").val($(this).data('bill_id<?php echo $n;?>'));

    $("#m1").load(`<?php echo base_url(); ?>index.php/ap/ret_bill/<?php echo $val->ap_bill_code; ?>/<?php echo $val->ap_bill_type; ?>/${val}`);
    $("#m2").load('<?php echo base_url(); ?>index.php/ap/progress_bill/<?php echo $val->ap_bill_code; ?>');
    $("#m3").load('<?php echo base_url(); ?>index.php/ap/less_bill/<?php echo $val->ap_bill_contractno; ?>');
    $("#m4").load('<?php echo base_url(); ?>index.php/ap/tax_bill/<?php echo $val->ap_bill_code; ?>');  
   });    
</script>

    <?php  $n++; } ?>
     </tr>
  </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>

$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '30px',
         targets: [ 0 ]
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
  $('.basic').DataTable();



</script>


