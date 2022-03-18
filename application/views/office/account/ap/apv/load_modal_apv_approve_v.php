 <table class="table table-bordered table-xxs">
  <thead>
    <tr>
      <th width="5%">#</th>
      <th>Voucher No</th>
      <th>PO No.</th>
      <th>Due Date</th>
      <th>Amount</th>
      <th>VAT Amount</th>
      <th>TOTAL</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
<?php $n=1; foreach ($res as $k) {
$query = $this->db->query("SELECT Sum(apv_detail.apvi_amount) AS amount,Sum(apv_detail.apvi_vattot) AS vattot,Sum(apv_detail.apvi_netamt) AS netmat FROM apv_detail where apv_detail.apvi_ref='$k->apv_code'");
$resi = $query->result();

  ?>
    <tr>
      <td><?php echo $n; ?></td>
      <td><?php echo $k->apv_code; ?><input type="hidden" id="apvcodei<?php echo  $k->apv_code;?>" name="apvcodei[]" value="<?php echo  $k->apv_code;?>"></td>
      <td><?php echo $k->apv_pono; ?><input type="hidden" id="ponoi<?php echo  $k->apv_code;?>" name="ponoi[]" value="<?php echo  $k->apv_pono;?>"></td>
      <td><?php echo $k->apv_date; ?><input type="hidden" id="datei<?php echo  $k->apv_code;?>" name="datei[]" value="<?php echo  $k->apv_date;?>"></td>
      <?php foreach ($resi as $ve) {?>
      <td><?php echo number_format($ve->amount,2); ?><input type="hidden" id="amounti<?php echo  $k->apv_code;?>" name="amounti[]" value="<?php echo  $ve->amount;?>"></td>
      <td><?php echo number_format($ve->vattot,2); ?><input type="hidden" id="vattot<?php echo  $k->apv_code;?>" name="vattot[]" value="<?php echo  $ve->vattot;?>"></td>
      <td><?php echo number_format($ve->netmat,2); ?><input type="hidden" id="netamti<?php echo  $k->apv_code;?>" name="netamti[]" value="<?php echo  $ve->netmat;?>"></th>
      <?php  } ?>
      <td class="text-center">
        <ul class="icons-list">
          <a class="sel<?php echo $k->apv_code;?> label label-info"> Select</a>
        </ul>
      </td>
    </tr>
    <script>
      $("#a<?php echo $n; ?>").click(function(){
        if ($("#a<?php echo $n; ?>").prop("checked")) {
            $("#chki<?php echo $n;?>").val("Y");
        }else{
            $("#chki<?php echo $n;?>").val("");
        }

      });
      $(".sel<?php echo $k->apv_code;?>").click(function(){
        var row = ($('#tbody tr').length-0)+1;
        var apv_code = $("#apvcodei<?php echo  $k->apv_code;?>").val();
        var pono = $("#ponoi<?php echo  $k->apv_code;?>").val();
        var date = $("#datei<?php echo  $k->apv_code;?>").val();
        var netamt = $("#netamti<?php echo  $k->apv_code;?>").val();
        var amount = $("#amounti<?php echo  $k->apv_code;?>").val();
        var vattot = $("#vattot<?php echo  $k->apv_code;?>").val();
        var pvdate = $("#apodate").val();
        var pvno = $("#pvno").val();
        if (netamt=="") {
            var tnetamt = 0;
        }else{
        var tnetamt = netamt;
        }
          var tr = '<tr id="'+row+'">'+
                   '<td class="text-center">'+row+'</td>'+
                   '<td>'+apv_code+'</td>'+
                   '<td>'+pono+'</td>'+
                   '<td>'+date+'</td>'+
                   '<td class="text-right">'+amount+'</td>'+
                   '<td class="text-right">'+vattot+'</td>'+
                   '<td class="text-right">'+tnetamt+'</td>'+
                   '<td class="text-center"><ul class="icons-list">'+
                   '<li><a id="delete" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
                   '</ul></td>'+
                   '</tr>';
            $("#tbody").append(tr);
              var self = $(this);
              self.closest('tr').remove();
              var tot = parseFloat( $("#totaltxt").val());
              var tt = tot+parseFloat(tnetamt);
              $("#total").html(tt);
              $("#totaltxt").val(tt);

              var url="<?php echo base_url(); ?>index.php/ap_active/editpvvdetail";
              var dataSet={
                ref: pvno,
                apvcode: apv_code,
                pono: pono,
                netamt: netamt,
                date: pvdate,
                };
              $.post(url,dataSet,function(data){
                // alert(data);
              });

      });
    </script>

    <?php $n++; } ?>
</tbody>
</table>
    <script>
    // Initialize multiple switches
   if (Array.prototype.forEach) {
       var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
       elems.forEach(function(html) {
           var switchery = new Switchery(html);
       });
   }
   else {
       var elems = document.querySelectorAll('.switchery');
       for (var i = 0; i < elems.length; i++) {
           var switchery = new Switchery(elems[i]);
       }
   }
    </script>
