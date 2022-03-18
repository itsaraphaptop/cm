<?php 

 ?>

<table class="table table-hove table-bordered table-xxs basic">
  <thead>
    <tr>
      <th width="10%">Invoice No.</th>
      <th width="10%">Type</th>
      <th width="10%">Period</th>
      <th width="35%">Project Name</th>
      <th width="35%">Owner/Customer</th>
      <th width="10%">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach ($down as $e) {?>
    <tr>
      <td><?php echo $e->inv_no; ?></td>
      <td><span class="label label-success"><?php echo $e->inv_type; ?></apan></td>
      <td><?php echo $e->inv_period; ?></td>
       <td><?php echo $e->project_name; ?></td>
      <?php
      $de = $this->db->query("SELECT sum(inv_downamt) as amt,sum(inv_netamt) as netamt,sum(inv_vatamt) as vat, sum(inv_lesswt) as wt from ar_invdown_detail where inv_ref = '$e->inv_no' and inv_period = $e->inv_period")->result();
      foreach ($de as $net) {
        $amt = $net->amt;
        $netamt = $net->netamt;
        $vatamt = $net->vat;
        $wtamt = $net->wt;
      }
       ?>
      <td><?php echo $e->debtor_name; ?></td>
      <td>
        <a class="seldo<?php echo $i; ?> label label-info" data-dismiss="modal"
           data-projname<?php echo $i;?>="<?php echo $e->project_name;?>"
           data-projid<?php echo $i;?>="<?php echo $e->project_id;?>"
           data-owner<?php echo $i;?>="<?php echo $e->project_mnameth;?>"
           data-idowner<?php echo $i;?>="<?php echo $e->project_mcode;?>"
           data-cr<?php echo $i;?>="<?php echo $e->inv_credit; ?>"
           data-invdate<?php echo $i;?>="<?php echo $e->inv_date; ?>"
           data-period<?php echo $i;?>="<?php echo $e->inv_period; ?>">Select</a>
      </td>

    </tr>
    <script>
      $(".seldo<?php echo $i; ?>").click(function(){
        var dates = ($(this).data('invdate<?php echo $i;?>'));
        var year =dates.substring(0,4);
        var month =dates.substring(7,5);
        $('#invyear').val(year);
        $('#invperiod').val(month);
        $("#invamt").val("<?php echo $netamt; ?>");
        $("#vatamt").val("<?php echo $vatamt; ?>");
        $("#wtamt").val("<?php echo $wtamt; ?>");
        $("#ret").val(0);
        $("#adv").val(0);
        $("#current").val("<?php echo (strtotime(Date("Y-m-d")) - strtotime($e->inv_duedate))/( 60 * 60 * 24 ); ?>");
        $("#cusamt").val("<?php echo $amt; ?>");
        $("#vat").val("<?php echo $e->inv_vat; ?>");
        $("#wt").val("<?php echo $e->inv_wt; ?>");
        $("#duedate").val("<?php echo $e->inv_duedate; ?>");
        $("#inv_type").val("<?php echo $e->inv_type; ?>");
        $("#putprojectid").val($(this).data('projid<?php echo $i;?>'));
        $("#projectname").val($(this).data('projname<?php echo $i;?>'));
        $("#venderid").val($(this).data('idowner<?php echo $i;?>'));
        $("#owner").val($(this).data('owner<?php echo $i;?>'));
        $("#crterm").val($(this).data('cr<?php echo $i;?>'));
        $("#period").val($(this).data('period<?php echo $i;?>'));
        $("#invdate").val($(this).data('invdate<?php echo $i;?>'));
        $("#invaccount").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#invaccount").load('<?php echo base_url(); ?>ar/load_inv_account/<?php echo $e->inv_no; ?>/<?php echo $e->inv_period; ?>/<?php echo $e->inv_type; ?>');

      });
    </script>
    <?php $i++; } ?>


    <?php $p=1; foreach ($pro as $proo) {?>
    <tr>
      <td><?php echo $proo->inv_no; ?></td>
      <td><span class="label label-success"><?php echo $proo->inv_type; ?></apan></td>
      <td><?php echo $proo->inv_period; ?></td>
      <?php 
      $pp = $this->db->query("SELECT * from  project where project_id = '$proo->inv_project' ")->result();
      foreach ($pp as $ppp) {
        $name_pro = $ppp->project_name;
      }
      ?>
      <td><?php echo $name_pro; ?></td>
      <?php 
      $ow_p = $this->db->query("SELECT * from debtor where debtor_code = '$proo->inv_owner'")->result();
      foreach ($ow_p as $ow_pp) {
        $ow_pr = $ow_pp->debtor_name;
      }
       ?>
      <?php 
      $ppo = $this->db->query("SELECT sum(inv_progressamt) as amt,sum(inv_lessretention) as retamt,sum(inv_lessadvance) as advamt,sum(inv_netamt) as netamt,sum(inv_vatamt) as vatamt,sum(inv_lesswt) as wtamt  from ar_invprogress_detail where inv_ref = '$proo->inv_no' and inv_period = $proo->inv_period")->result();
      foreach ($ppo as $net) {
        $toamt = $net->netamt;
        $vatamt = $net->vatamt;
        $wtamt = $net->wtamt;
        $advamt = $net->advamt;
        $retamt = $net->retamt;
        $amt = $net->amt;
      }
       ?>
      <td><?php echo $ow_pr; ?></td>
      <td>
        <a class="selpro<?php echo $p; ?> label label-info" data-dismiss="modal"
           data-projname<?php echo $p;?>="<?php echo $ppp->project_name;?>"
           data-projid<?php echo $p;?>="<?php echo $ppp->project_id;?>"
           data-owner<?php echo $p;?>="<?php echo $ppp->project_mnameth;?>"
           data-idowner<?php echo $p;?>="<?php echo $ppp->project_mcode;?>"
           data-cr<?php echo $p;?>="<?php echo $proo->inv_credit; ?>"
           data-invdate<?php echo $p;?>="<?php echo $proo->inv_date; ?>"
           data-period<?php echo $p;?>="<?php echo $proo->inv_period; ?>"> Select</a>
      </td>

    </tr>
    <script>
      $(".selpro<?php echo $p; ?>").click(function(){
        var dates = ($(this).data('invdate<?php echo $p;?>'));
        var year =dates.substring(0,4);
        var month =dates.substring(7,5);
        $('#invyear').val(year);
        $('#invperiod').val(month);
        $("#invamt").val("<?php echo $toamt; ?>");
        $("#wtamt").val("<?php echo $wtamt; ?>");
        $("#vatamt").val("<?php echo $vatamt; ?>");
        $("#current").val("<?php echo (strtotime(Date("Y-m-d")) - strtotime($proo->inv_duedate))/( 60 * 60 * 24 ); ?>");
        $("#vat").val("<?php echo $proo->inv_vat; ?>");
        $("#wt").val("<?php echo $proo->inv_wt; ?>");
        $("#ret").val("<?php echo $proo->inv_lessref; ?>");
        $("#adv").val("<?php echo $proo->inv_lessadv; ?>");
        $("#cusamt").val("<?php echo $amt; ?>");
        $("#advamt").val("<?php echo $advamt; ?>");
        $("#retamt").val("<?php echo $retamt; ?>");
        $("#duedate").val("<?php echo $proo->inv_duedate; ?>");
        $("#inv_type").val("<?php echo $proo->inv_type; ?>");
        $("#putprojectid").val($(this).data('projid<?php echo $p;?>'));
        $("#projectname").val($(this).data('projname<?php echo $p;?>'));
        $("#venderid").val($(this).data('idowner<?php echo $p;?>'));
        $("#owner").val($(this).data('owner<?php echo $p;?>'));
        $("#period").val($(this).data('period<?php echo $p;?>'));
        $("#crterm").val($(this).data('cr<?php echo $p;?>'));
        $("#projectname").val($(this).data('projname<?php echo $p;?>'));
        $("#invdate").val($(this).data('invdate<?php echo $p;?>'));
        $("#invaccount").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#invaccount").load('<?php echo base_url(); ?>ar/load_inv_account/<?php echo $proo->inv_no; ?>/<?php echo $proo->inv_period; ?>/<?php echo $proo->inv_type; ?>');

      });
    </script>
    <?php $p++; } ?>

    <?php $r=1; foreach ($reten as $re) {?>
    <tr>
      <td><?php echo $re->inv_no; ?></td>
      <td><span class="label label-success"><?php echo $re->inv_type; ?></apan></td>
      <td><?php echo $re->inv_period; ?></td>
      <?php 
      $rr = $this->db->query("select * from  project where project_id = '$re->inv_project' ")->result();
      foreach ($rr as $rrr) {
        $name_re = $rrr->project_name;
      }
      ?>
      <td><?php echo $name_re; ?></td>
      <?php 
      $ow_r = $this->db->query("select * from debtor where debtor_code = '$re->inv_owner'")->result();
      foreach ($ow_r as $ow_rr) {
        $owre = $ow_rr->debtor_name;
      }
       ?>
      <?php 
      $ree = $this->db->query("SELECT sum(inv_retentionamt) as amt,sum(inv_netamt) as netamt  from ar_invretention_detail where inv_ref = '$re->inv_no' and inv_period = $re->inv_period")->result();
      foreach ($ree as $net) {
        $toamt = $net->netamt;
        $amt = $net->amt;
      }
       ?>
      <td><?php echo $owre; ?></td>>
      <td>
        <a class="selreten<?php echo $r; ?> label label-info" data-dismiss="modal" data-projname<?php echo $r;?>="<?php echo $rrr->project_name;?>" data-projid<?php echo $r;?>="<?php echo $rrr->project_id;?>" data-owner<?php echo $r;?>="<?php echo $rrr->project_mnameth;?>" data-idowner<?php echo $r;?>="<?php echo $rrr->project_mcode;?>" data-cr<?php echo $r;?>="<?php echo $re->inv_credit; ?>" 
        data-invdate<?php echo $r;?>="<?php echo $re->inv_date; ?>" data-period<?php echo $r;?>="<?php echo $re->inv_period; ?>"> Select</a>
      </td>

    </tr>
    <script>
      $(".selreten<?php echo $r; ?>").click(function(){
        var dates = ($(this).data('invdate<?php echo $r;?>'));
        var year =dates.substring(0,4);
        var month =dates.substring(7,5);
        $('#invyear').val(year);
        $('#invperiod').val(month);
        $("#invamt").val("<?php echo $toamt; ?>");
        $("#duedate").val("<?php echo $re->inv_duedate; ?>");
        $("#inv_type").val("<?php echo $re->inv_type; ?>");
        $("#current").val("<?php echo (strtotime(Date("Y-m-d")) - strtotime($re->inv_duedate))/( 60 * 60 * 24 ); ?>");
        $("#cusamt").val("<?php echo $amt; ?>");
        $("#vat").val("<?php echo $re->inv_vat; ?>");
        $("#wt").val(0);
        $("#ret").val(0);
        $("#adv").val(0);
        $("#putprojectid").val($(this).data('projid<?php echo $r;?>'));
        $("#projectname").val($(this).data('projname<?php echo $r;?>'));
        $("#venderid").val($(this).data('idowner<?php echo $r;?>'));
        $("#owner").val($(this).data('owner<?php echo $r;?>'));
        $("#crterm").val($(this).data('cr<?php echo $r;?>'));
        $("#period").val($(this).data('period<?php echo $r;?>'));
        $("#projectname").val($(this).data('projname<?php echo $r;?>'));
        $("#invdate").val($(this).data('invdate<?php echo $r;?>'));
        $("#invaccount").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#invaccount").load('<?php echo base_url(); ?>ar/load_inv_account/<?php echo $re->inv_no; ?>/<?php echo $re->inv_period; ?>/<?php echo $re->inv_type; ?>');

      });
    </script>
    <?php $r++; } ?>
  </tbody>
</table>



<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
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
