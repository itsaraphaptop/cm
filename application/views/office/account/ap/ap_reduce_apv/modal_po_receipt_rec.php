
<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th>No.</th>
      <th>AP No.</th>
      <th>AP Date</th>
      <th>Tax No.</th>
      <th>Tax Type</th>
      <th>Vender Name</th>
      <th>Project Name</th>
      <th>Year</th>
      <th>Period</th>
      <th width="5%">Active</th>
    </tr>
  </thead>
  <tbody>
   
      <?php $n=1; foreach ($apv as $val) { ?>
      <tr>   
      <td scope="row"><?=$n; ?></td>
      <td><?=$val->apv_code; ?></td>
      <td><?=$val->apv_gldate; ?></td>
      <td><?=$val->apv_inv; ?></td>
      
      <td><?="Normal"; ?></td>
      <td><?=$val->vender_name; ?></td>
      <td><?=$val->project_name; ?></td>
      <td><?=$val->apv_glyear; ?></td>
      <td><?=$val->apv_glperiod; ?></td>
      <td><button class="btnre<?=$n; ?> btn btn-primary btn-xs btn-block" 
        data-type<?=$n; ?>="<?=$val->apv_type;?>" 
        data-code<?=$n; ?>="<?=$val->apv_code; ?>" 
        data-term<?=$n; ?>="<?=$val->apv_crterm; ?>" 
        data-date<?=$n; ?>="<?=$val->apv_gldate; ?>"
        data-pono<?=$n; ?>="<?=$val->apv_pono; ?>" 
        data-glyear<?=$n; ?>="<?=$val->apv_glyear;; ?>" 
        data-glperiod<?=$n; ?>="<?=$val->apv_glperiod; ?>" 
        data-duedate<?=$n; ?>="<?=$val->apv_duedate; ?>" 
        data-inv<?=$n; ?>="<?=$val->apv_inv; ?>" 
        data-do<?=$n; ?>="<?=$val->apv_do; ?>"
        data-vatper<?=$n; ?>="<?=$val->apv_vatper; ?>"
        data-netamt<?=$n; ?>="<?=$val->apv_netamt; ?>"
        data-totamt<?=$n; ?>="<?=$val->apv_totamt; ?>"
        data-apvt<?=$n; ?>="<?=$val->apv_type; ?>"         
        data-system<?=$n; ?>="<?=$val->systemname; ?>" 
        data-systemm<?=$n; ?>="<?=$val->systemcode; ?>" 
        data-vvender<?=$n; ?>="<?=$val->vender_name; ?>"
        data-vvencode<?=$n; ?>="<?=$val->vender_code; ?>"
        data-taxvender<?=$n; ?>="<?=$val->vender_tax; ?>" 
        data-project<?=$n; ?>="<?=$val->project_name; ?>"  
        data-projectid<?=$n; ?>="<?=$val->project_id; ?>" 
        data-downper<?=$n;?>="<?=$val->downper;?>"
        data-retentionper<?=$n;?>="<?=$val->retentionper;?>"
        data-dismiss="modal">SELECT</button>
      </td>
      
      <script>
        $(".btnre<?=$n; ?>").click(function(){
        // $('#meterialr').html("<img src='<?=base_url();?>assets/images/loading.gif'> Loading...");
        // $("#meterialr").load('<?=base_url(); ?>index.php/ap/rec_meterial/<?=$val->apv_code; ?>');
        $("#gl_tab").load('<?=base_url(); ?>index.php/ap/rec_crdr/<?=$val->apv_code; ?>/<?=$val->apv_type; ?>', function(){
          $('#amount').keyup(function() {

            $('#vender_dr1').val($('#amt').val());
          })
        });
        // $("#body_tax").load(`<?=base_url();?>index.php/ap/tax_list/${$(this).data("code<?=$n; ?>")}`);
        
        $('#type_ap').val($(this).data("type<?=$n; ?>"));
        $("#cnap_no").val($(this).data("code<?=$n; ?>"));
        $("#vender").val($(this).data("vvender<?=$n; ?>"));
        $("#venderid").val($(this).data("vvencode<?=$n; ?>"));
        $("#tven").val($(this).data("taxvender<?=$n; ?>"));
        $("#porecx").val($(this).data("reccode<?=$n; ?>"));
        $("#pono").val($(this).data("pono<?=$n; ?>"));
        $("#taxno").val($(this).data("inv<?=$n; ?>"));
        $("#taxiv").val($(this).data("inv<?=$n; ?>"));
        $("#pro").val($(this).data("project<?=$n; ?>"));
        $("#projectid").val($(this).data("projectid<?=$n; ?>"));
        $("#departname").val($(this).data("depname<?=$n; ?>"));
        $("#departid").val($(this).data("depid<?=$n; ?>"));
        $("#system").val($(this).data("systemm<?=$n; ?>"));
        $("#systemname").val($(this).data("system<?=$n; ?>"));
        $("#crterm").val($(this).data('term<?=$n; ?>'));
        $("#porecx").val($(this).data('do<?=$n; ?>'));
        $("#ttype").val($(this).data('apvt<?=$n; ?>'));
        $("#duedate").val($(this).data("duedate<?=$n; ?>"));
        $("#amountt").val($(this).data("netamt<?=$n; ?>"));
        $("#vatt").val($(this).data("vat<?=$n; ?>"));
        $("#vencode").val($(this).data("vencode<?=$n; ?>"));
        $("#pprice_unit").val($(this).data("vatper<?=$n; ?>"));
        $("#amttotal").val($(this).data("totamt<?=$n; ?>"));
        $("#tven").val($(this).data("vvender<?=$n; ?>"));
        // $("#downper").val($(this).data("downper<?=$n; ?>"));
        // $("#reten").val($(this).data("retentionper<?=$n; ?>"));
        });

      </script>
    </tr>
    <?php   $n++; }  ?> 


   
      <?php $m=$n;  foreach ($apd as $val) { 
      ?>
      <tr>
      <td scope="row"><?=$m; ?></td>
      <td><?=$val->apd_code; ?></td>
      <td><?=$val->apd_date; ?></td>
      <td><?=$val->apd_tax_no; ?></td>
     
      <td><?="DOWN"; ?></td>
      <td><?=$val->vender_name; ?></td>
      <td><?=$val->project_name; ?></td>
      <td><?=$val->apd_year; ?></td>
      <td><?=$val->apd_period; ?></td>
      <td><button class="btnred<?=$m; ?> btn btn-primary btn-xs btn-block"  
        data-type<?=$m; ?>="<?=$val->apd_type;?>"
        data-codee<?=$m; ?>="<?=$val->apd_code; ?>" 
        data-date<?=$m; ?>="<?=$val->apd_date; ?>" 
        data-pono<?=$m; ?>="<?=$val->ref_po_code; ?>"
        data-taxn<?=$m; ?>="<?=$val->apd_tax_no; ?>"
        data-vender<?=$m; ?>="<?=$val->vender_name; ?>" 
        data-vencode<?=$m; ?>="<?=$val->vender_code; ?>" 
        data-projname<?=$m; ?>="<?=$val->project_name; ?>" 
        data-year<?=$m; ?>="<?=$val->apd_year; ?>" 
        data-period<?=$m; ?>="<?=$val->apd_period; ?>"
        data-duedate<?=$m; ?>="<?=$val->apd_duedate; ?>" 
        data-apdt<?=$m; ?>="<?=$val->apd_type; ?>" 
        data-netamt<?=$m; ?>="<?=$val->apd_amount; ?>"
        data-vat<?=$m; ?>="<?=$val->apd_totalvat; ?>"
        data-totamt<?=$m; ?>="<?=$val->apd_net_amt; ?>"
        data-vatper<?=$m; ?>="<?=$val->apd_vat; ?>"
        data-system<?=$m; ?>="<?=$val->systemname; ?>" 
        data-systemm<?=$m; ?>="<?=$val->systemcode; ?>" 
        data-project<?=$m; ?>="<?=$val->apd_project; ?>"
        data-projectid<?=$m; ?>="<?=$val->project_id; ?>"
        data-downper<?=$m;?>="<?=$val->downper;?>"
        data-retentionper<?=$m;?>="<?=$val->retentionper;?>"
        data-dismiss="modal">SELECT</button>
      </td>
      
      <script>
        $(".btnred<?=$m; ?>").click(function(){
        // alert($(this).data("systemm<?=$m; ?>"))
        // $('#meterialr').html("<img src='<?=base_url();?>assets/images/loading.gif'> Loading...");
        // $("#meterialr").load('<?=base_url(); ?>index.php/ap/rec_meterial/<?=$val->apd_code; ?>');
        $("#gl_tab").load('<?=base_url(); ?>index.php/ap/rec_crdr/<?=$val->apd_code; ?>/<?=$val->apd_type; ?>', function(){
          $('#amount').keyup(function() {

            $('#vender_dr1').val($('#amt').val());
          })
        });
        // $("#body_tax").load(`<?=base_url();?>index.php/ap/tax_list/${$(this).data("code<?=$n; ?>")}`);
        
        $('#type_ap').val($(this).data("type<?=$m; ?>"));
        $('#pono').val($(this).data("pono<?=$m; ?>"));
        $("#amountt").val($(this).data("netamt<?=$m; ?>")); 
        $("#vatt").val($(this).data("vat<?=$m; ?>"));
        $("#amttotal").val($(this).data("totamt<?=$m; ?>"));
        $("#cnap_no").val($(this).data("codee<?=$m; ?>"));
        $("#ttype").val($(this).data("apdt<?=$m; ?>"));
        $("#vender").val($(this).data("vender<?=$m; ?>"));
        $("#venderid").val($(this).data("vencode<?=$m; ?>"));
        $("#taxno").val($(this).data("taxn<?=$m; ?>"));
        $("#taxiv").val($(this).data("taxn<?=$m; ?>"));
        $("#project").val($(this).data("project<?=$m; ?>"));
        $("#projectid").val($(this).data("projectid<?=$m; ?>"));
        $("#glyear").val($(this).data('year<?=$m; ?>'));
        $("#glperiod").val($(this).data('period<?=$m; ?>'));
        $("#duedate").val($(this).data("duedate<?=$m; ?>"));
        $("#pprice_unit").val($(this).data("vatper<?=$m; ?>"));
        $("#system").val($(this).data("systemm<?=$m; ?>"));
        $("#systemname").val($(this).data("system<?=$m; ?>"));
        // $("#downper").val($(this).data("downper<?=$m; ?>"));
        // $("#reten").val($(this).data("retentionper<?=$m; ?>"));
        });

      </script>
    </tr> 
    <?php $m++; } ?>

    
      <?php $i=$m;  foreach ($apr as $val) { 
      ?>
      <tr>
      <td scope="row"><?=$i; ?></td>
      <td><?=$val->apr_code; ?></td>
      <td><?=$val->apr_date; ?></td>
      <td><?=$val->apr_tax_no; ?></td>
      
      <td><?="RETENTION"; ?></td>
      <td><?=$val->vender_name; ?></td>
      <td><?=$val->project_name; ?></td>
      <td><?=$val->apr_year; ?></td>
      <td><?=$val->apr_period; ?></td>
      <td><button class="btnrer<?=$i; ?> btn btn-primary btn-xs btn-block"
        data-type<?=$i; ?>="<?=$val->apr_type;?>"
        data-pono<?=$i; ?>="<?=$val->po_code; ?>"  
        data-coder<?=$i; ?>="<?=$val->apr_code; ?>" 
        data-rdate<?=$i; ?>="<?=$val->apr_date; ?>" 
        data-taxr<?=$i; ?>="<?=$val->apr_tax_no; ?>"
        data-venr<?=$i; ?>="<?=$val->vender_name; ?>" 
        data-projectid<?=$i; ?>="<?=$val->project_id; ?>" 
        data-project<?=$i; ?>="<?=$val->project_name; ?>" 
        data-ryear<?=$i; ?>="<?=$val->apr_year; ?>" 
        data-rperiod<?=$i; ?>="<?=$val->apr_period;; ?>" 
        data-aprt<?=$i; ?>="<?=$val->apr_type; ?>" 
        data-totamt<?=$i; ?>="<?=$val->apr_net_amt; ?>"
        data-netamt<?=$i; ?>="<?=$val->apr_amount; ?>"
        data-vatt<?=$i; ?>="<?=$val->apr_vat; ?>"
        data-vat<?=$i; ?>="<?=$val->apr_totalvat; ?>"
        data-system<?=$i; ?>="<?=$val->systemname; ?>" 
        data-systemm<?=$i; ?>="<?=$val->systemcode; ?>" 
        data-vencode<?=$i; ?>="<?=$val->vender_code; ?>"
        data-downper<?=$i;?>="<?=$val->downper;?>"
        data-retentionper<?=$i;?>="<?=$val->retentionper;?>"
        data-dismiss="modal">SELECT</button>  
      </td> 
      
      <script>
        $(".btnrer<?=$i; ?>").click(function(){
        // $('#meterialr').html("<img src='<?=base_url();?>assets/images/loading.gif'> Loading...");
        // $("#meterialr").load('<?=base_url(); ?>index.php/ap/rec_meterial/<?=$val->apr_code; ?>');
        $("#gl_tab").load('<?=base_url(); ?>index.php/ap/rec_crdr/<?=$val->apr_code; ?>/<?=$val->apr_type; ?>', function() {
          $('#amount').keyup(function() {
            $('#vender_dr1').val($('#amt').val());
          })
        });
        // $("#body_tax").load(`<?=base_url();?>index.php/ap/tax_list/${$(this).data("code<?=$n; ?>")}`);
        
        $('#type_ap').val($(this).data("type<?=$i; ?>"));
        $("#pono").val($(this).data("pono<?=$i; ?>"));
        $("#amountt").val($(this).data("netamt<?=$i; ?>"));
        $("#cnap_no").val($(this).data("coder<?=$i; ?>"));
        $("#ttype").val($(this).data("aprt<?=$i; ?>"));
        $("#vender").val($(this).data("venr<?=$i; ?>"));       
        $("#taxno").val($(this).data("taxr<?=$i; ?>"));
        $("#taxiv").val($(this).data("taxr<?=$i; ?>"));
        $("#project").val($(this).data("project<?=$i; ?>"));
        $("#projectid").val($(this).data("projectid<?=$i; ?>"));
        $("#glperiod").val($(this).data("rperiod<?=$i; ?>"));
        $("#glyear").val($(this).data("ryear<?=$i; ?>"));
        $("#duedate").val($(this).data("poredate<?=$i; ?>"));
        $("#amttotal").val($(this).data("totamt<?=$i; ?>"));
        $("#pprice_unit").val($(this).data("vatt<?=$i; ?>"));
        $("#system").val($(this).data("systemm<?=$i; ?>"));
        $("#systemname").val($(this).data("system<?=$i; ?>"));
        $("#venderid").val($(this).data("vencode<?=$i; ?>"));
        // $("#downper").val($(this).data("downper<?=$i; ?>"));
        // $("#reten").val($(this).data("retentionper<?=$i; ?>"));
        });

      </script>
    </tr>
    <?php   $i++; }  ?>
  </tbody>
</table>

<!-- <script type="text/javascript" src="<?=base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script> -->

<!-- <script type="text/javascript" src="<?=base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script> -->

<!-- /core JS files -->
<script>
function process_cal() {

    // if(delayID){ clearTimeout(delayID);} 

    // delayID=setTimeout(function(){

      // let downper = $('#downper').val()*1;
      // let retenper = $('#reten').val()*1;
      let vat = $('#pprice_unit').val()*1;
      let vatamt = $('#pamount').val()*1;
      let netamt = $('#amt').val()*1;
      let amount = $('#amount').val()*1;
      // let down_val = (amount*downper)/100;
      // let reten_val = (amount*retenper)/100;
      let vatamt_new = amount * vat/100;
      let jownee = amount + vatamt_new;
      // alert(jownee)
      $('#amt').val(jownee);
      $('#pamount').val(vatamt_new);
      // $('#down_val').val(down_val);
      // $('#reten_val').val(reten_val);
      // $('#reten_val').val(reten_val);
      // console.log(jownee);
      
      $('#verder_dr1').val(jownee);
      $('#vat_cr2').val(vatamt_new);
      $('#amt_cr3').val(amount);
      cal_process();
    //   delayID=null;
    // },500);   
}

function cal_process() {
  var amt = 0;
  var vatamt = 0;
  var vat = $('#pprice_unit').val()*1;

  $('.amt_tax').each(function(index, el) {
    amt += el.value*1;
    // let down = $('#reten_val').val()*1;
    let netamt_tax = el.value * vat/100;
    $(`#netamt_tax${index+1}`).val(netamt_tax);
    // alert(index+1)
    // console.log(amt);
  $('#sum_amt').html(amt);
  });

  $('.netamt').each(function(index, el) {
    vatamt += el.value*1;

    // console.log(vatamt);
  $('#sum_vatamt').html(vatamt);
  });



}
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