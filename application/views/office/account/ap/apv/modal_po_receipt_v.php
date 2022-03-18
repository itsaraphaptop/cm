<script type="text/javascript">
 var array_RC = [];
 var array_sum = [];
 var array_tax = [];
 var vattt_goo = 0;
  function update_po(el){
      var sum = 0;
      var po_pono = el.attr("po_pono");
      var rc = el.attr('rc');
      var amtRow = el.attr('amount')*1;
      var downper = el.attr('downper')*1;
      var taxno = el.attr('taxno');
      var retentionper = el.attr('retentionper')*1;
      var issetTaxno = array_tax.indexOf(taxno);
      var issetRc = array_tax.indexOf(rc);
      var isCheck = el.prop( "checked" );
      // alert(isCheck);
      if (isCheck == true) {
        array_RC.push(rc);
        array_tax.push(taxno);

        array_sum.push(amtRow);
        array_sum.forEach(function(num){sum+=parseFloat(num) || 0;});
        var sumdown = sum*downper/100;
        var sumre = sum*retentionper/100;

        $('#amount').val(sum);
        $('#amount_default').val(sum);
        $("#taxno").val(array_tax);
        $("#select_rc").attr("sum",sum);

        $('#select_rc').attr("down", sumdown);
        $('#select_rc').attr("reten", sumre);
        $('#downper_value').val(sumdown);
        $('#down_default').val(sumdown);
        $('#retention_value').val(sumre);
        $('#reten_default').val(sumre);
        $("#select_rc").attr("po_pono",po_pono);
        $('#po_pono').val(po_pono);
        $('#downper').val(downper);
        $('#retentionper').val(retentionper);
        $("#select_rc").attr("downper",downper);
        
      }else{
        array_RC.pop();
        array_sum.pop();
        array_tax.pop();

        $('#amount').val('');
        $('#amount_default').val('');
        $("#taxno").val('');
        $("#select_rc").removeAttr("sum");
        
        $('#select_rc').removeAttr("down");
        $('#select_rc').removeAttr("reten");
        $('#downper_value').val('');
        $('#down_default').val('');
        $('#retention_value').val('');
        $('#reten_default').val('');
        $("#select_rc").removeAttr("po_pono");
        $('#po_pono').val('');
        $('#downper').val('');
        $('#retentionper').val('');
        $("#select_rc").removeAttr("downper");
        
      }

      //  $("#select_rc").attr("downper",downper);
      //  $("#select_rc").attr("retentionper",retentionper);
       // alert(po_pono);
        $.each($("#body tr[address_tr!='"+po_pono+"']"), function(index, el) {
              $(el).remove()
        }); 
        
  }
</script>
<table class="table table-hover table-xxs basic">
    <thead>
      <tr>
        <th></th>
        <th>No .</th>
        <th>Receive No.</th>
        <th>Receive Date</th>
        <th>Tax No.</th>
        <th>P/O No.</th>
        <th>downper</th>
        <th>retentionper</th>
        <th>Delivery No.</th>
        <th>Vender Name</th>        
        <th>Amount</th>       
      </tr>
    </thead>
    <tbody id="body">
      
        <?php $n=1; foreach ($openpo as $val) {      
          $de=$this->db->query("SELECT 
            sum(poi_disamt) as poi_amount ,sum(poi_netamt) as dis_netamt from receive_poitem where poi_ref = '$val->po_reccode'")->result();
          foreach ($de as $dd) {  ?>
        <?php 
        $session = $this->session->userdata('sessed_in');
        $this->db->select('retentionper');
        $this->db->from('po');
        $this->db->where('po_pono', $val->po_pono);
        $this->db->where('compcode', $session['compcode']);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if($query->num_rows() > 0) {
          $retentionper = $query->result()[0]->retentionper;

        }

        $this->db->select('downper');
        $this->db->from('po');
        $this->db->where('po_pono', $val->po_pono);
        $this->db->where('compcode', $session['compcode']);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if($query->num_rows() > 0) {
          $downper = $query->result()[0]->downper;

        }
        ?>
          <tr  class="<?=$val->po_pono?>" address_tr="<?=$val->po_pono?>">
        <th>
          <div class="checkbox">
            <label>
              <input type="checkbox" id="a<?php echo $n; ?>" class="" onclick="update_po($(this))"
               po_pono="<?=$val->po_pono?>" 
               rc="<?=$val->po_reccode?>"
               amount="<?=$dd->poi_amount;?>"
               downper="<?=$downper;?>"
               retentionper="<?=$retentionper;?>"
               taxno="<?=$val->taxno;?>"
               >
              <input type="hidden" name="chki[]" id="chki<?php echo $n;?>" value="">
            </label>
          </div>
        </th>
        <th scope="row"><?php echo $n; ?></th>
        <td><?php echo $val->poi_ref; ?></td>
        <td><?php echo $val->po_recdate; ?></td>
        <td><?php echo $val->taxno; ?></td>
        <td name="pono"><?php echo $val->po_pono; ?></td>
        <td><?=$downper;?></td>
        <td><?=$retentionper;?></td>
        <td><?php echo $val->docode; ?></td>
        <td><?php echo $val->vender_name; ?></td>
        <td><?php echo $dd->poi_amount; ?></td>
      </tr>
      <?php   $n++; } } ?>
    </tbody>
   </table>
       <div class="modal-footer">
     <a class=" btn btn-info" type="button" id="select_rc"  data-dismiss="modal">Select</a></div>
     </div>
<script type="text/javascript">

function sumdrcr() {
  sumdr();
  sumcr();
}

function sumdr() {
var sumdr = 0;
  $('.dr').each(function(index, el){
    sumdr += el.value*1;
  });
  // console.log(sumdr);

}

function sumcr() {
var sumcr_arr = [];
var sumtotal = 0;
var total = 0;
var up = 0;
  $('.cr').each(function(index, el){
    sumcr_arr.push(el.value*1);
  });

  sumcr_arr.sort(function(a, b){return b-a});
  up = sumcr_arr.shift();

  for (let index = 0; index < sumcr_arr.length; index++) {
    total += sumcr_arr[index];
    console.log(sumcr_arr[index]);
  }
  sumtotal = up - total;
  // $('#sffumcr').val(sumtotal);

}

  $("#select_rc").click(function(event) {
      var vatamt;
      var po_no = $("#select_rc").attr("po_pono");
      var amountt = $("#select_rc").attr("amount");
      var downn = $("#select_rc").attr("down");
      var retenn = $("#select_rc").attr("reten");
      var amt = $("#select_rc").attr("sum");
      var downper = $("#select_rc").attr("downper");
      var retentionper = $("#select_rc").attr("retentionper");
      // var netvat = (amtRow-sumdown)*vat/100;
      $('#ch_less').click();
      $("#porecx").val(array_RC);
      // $.get(`<?=base_url()?>ap/limit_downreten/${po_no}/${downn}`,
      //   function () {
      //   }
      // ).done(function(data) {
      //   let json_res = JSON.parse(data);
      //   if(json_res.status === true) {
      //     $('#down_default').val(json_res.down);
      //     $('#reten_default').val(json_res.reten);
      //   }
      // });
    $.get('<?=base_url()?>ap/get_po_deatil/'+po_no, function(data) {        
        try{
          var json = jQuery.parseJSON(data);
          console.log(json);
          var downper = $("#select_rc").attr("downper");
          vatamt = (amt-downn)*json[0].poi_vatper/100;
          var netamt = vatamt + amt*1;
          // alert(downper)
          array_RC[0] = $.trim(array_RC[0]);
          $('#meterialr').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#meterialr").load('<?php echo base_url(); ?>ap/load_meterial/'+array_RC[0],{array:array_RC});     
          $("#vat").load('<?php echo base_url(); ?>ap/load_crdr/'+array_RC[0],{array:array_RC,vatamt: vatamt, netamt: netamt, down: downn, reten: retenn});
         
          $("#tax").load('<?php echo base_url(); ?>ap/load_vat/'+array_RC[0]+'/'+downper,{array:array_RC});

          // alert(json[0].project_name);
          $("#projectname").val(json[0].project_name);
          $("#po_no").val(po_no);
          $("#duedate").val(json[0].duedate);
          // $("#taxno").val(json[0].taxno);
          $("#crterm").val(json[0].term);
          // $("#pprice_unit").val(json[0].vat);
          $("#pprice_unit").val(json[0].poi_vatper);
          $("#venderid").val(json[0].vender_code);
          $("#projectid").val(json[0].project_id);
          $("#vender").val(json[0].vendername);
          $("#pono").val(json[0].po_pono);
          $("#system").val(json[0].systemname);
          $("#systemid").val(json[0].systemcode);
          // $("#vchdate").val(json[0].po_recdate);
          $("#pamountt").val(vatamt);
          $("#dr_vat").val(vatamt);
  // alert(vatamt)

          $("#amtt").val(netamt);
          $("#vchdate").val(json[0].taxdate);

          var array_date = json[0].taxdate.split("-");

          $("#glyear").val(array_date[0]);
          $("#glperiod").val(array_date[1]);
          

        }catch(e){

        }
    });

  
  });
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     // pageLength: 1000000,
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

$("#checkAll").change(function(){
      var status = $(this).prop('checked')
      $('input:checkbox').prop('checked',status);

});
</script>
