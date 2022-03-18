<table class="table table-hover table-xxs table-responsive">
  <thead>
    <tr>
      <th width="25%">Vender</th>
      <th width="15%">Tax ID</th>
      <th>Branch No :</th>
      <th>Tax Invioce No.</th>
      <th width="10%">Tax Date</th>
      <th class="text-right" width="12%">Amount</th>
      <th class="text-right" width="10%">VAT</th>
    </tr>
  </thead>
  <tbody class="body">
    <?php  foreach ($taxdoc2 as $key) {
      $qev = $this->db->query("select * from vender where vender_code='$key->ap_vender'");
      $rven = $qev->result();
      foreach ($rven as $dd) {
    ?>
              
  	<tr>
      <td name="ap_vendername" id="ap_vendername"><?php echo $dd->vender_name; ?></td>
      <td ><?php echo $dd->vender_tax; ?></td>
      <td><?php echo $dd->vender_tax; ?></td>
  			<td><input type="text" name="taxinv" class="form-control"></td>
  			<td><input type="date" name="taxdate" class="form-control"></td>
  			<td><input type="text" class="form-control text-right" name="ap_amt" id="ap_amt" value="<?php echo $key->api_amt; ?>"></td>
  		<td><input type="text" class="form-control text-right" name="ap_vat" id="ap_vat" value="<?php echo $key->api_vatamt; ?>"></td>
  	</tr>
 		<?php } } ?>
    



<input type="hidden" id="kamt" name="">
              <input type="hidden" id="toamt" name="">
              <input type="hidden" id="namt" name="">
              <input type="hidden" id="nvat" name="">
              <input type="hidden" id="tovat" name="">
              <script>
                    $("#tabletax").hide();
                    $("#toaa").hide();
                    $("#vatper").hide();
                $(".insrows").click(function(){
                  $("#tabletax").show();
                  addrow();
                });
                  function addrow(){
                    var amt = $('#amt').val();
                    var vat = $('#vatt').val();
                    var row = ($('#body tr').length-0)+1;
                    var tr = '<tr>'+
                    '<input type="hidden" name="chki[]" value="i">'+
                    '<td>'+
                      '<input type="text" class="form-control" name="vender_name[]" id="vender_name'+row+'">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="tax_id[]" id="tax_id'+row+'" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="tax_no[]" id="tax_no'+row+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="date" name="tax_date[]" id="tax_date'+row+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="text" readonly="true" id="amount1'+row+'" style="text-align: right;" value="'+amt+'" class="form-control"> '+
                    '<input type="text" name="amount[]" id="amount'+row+'" style="text-align: right;" value="'+amt+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="vatt1[]" readonly="true" id="vatt1'+row+'" style="text-align: right;" value="7" class="form-control"> '+
                    '<input type="text" name="percent[]" id="percent'+row+'" style="text-align: right;" value="7" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    
                    '<input type="text" name="vatt[]" id="vatt'+row+'" style="text-align: right;" readonly="true"  value="'+vat+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<a class="label bg-danger" id="edit'+row+'">edit</a>   <a class="label bg-green" id="save'+row+'">OK</a>'+
                    '</td>'+
                    '</tr>'+

                    '<script>'+
                    '$("#save'+row+'").hide();'+
                    '$("#amount'+row+'").hide();'+
                    '$("#vatt1'+row+'").hide();'+
                    '$("#edit'+row+'").click(function(){'+
                    '$("#amount'+row+'").show();'+
                    '$("#percent'+row+'").show();'+
                    '$("#amount1'+row+'").hide();'+
                    '$("#vatt1'+row+'").hide();'+
                    'var amt'+row+' = parseFloat($("#amount'+row+'").val());'+
                    '$("#namt").val(amt'+row+');'+
                    '$("#edit'+row+'").hide();'+
                    '$("#save'+row+'").show();'+
                    '$("#toaaa").hide();'+
                    '$("#vatperr").hide();'+
                    '$("#toaa").show();'+
                    '$("#vatper").show();'+
                    '});'+

                    '$("#amount'+row+'").keyup(function(){'+
                    'var amt'+row+' = parseFloat($("#amount'+row+'").val());'+
                    'var avat'+row+' = parseFloat($("#vatt'+row+'").val());'+
                    'var vatp'+row+' = parseFloat($("#vatt1'+row+'").val());'+
                    'var nvatt'+row+' = (amt'+row+'*vatp'+row+')/100;'+
                    '$("#vatt'+row+'").val(nvatt'+row+');'+
                    '$("#namt").val(amt'+row+');'+
                    '$("#nvat").val(nvatt'+row+');'+
                    '});'+

                    '$("#save'+row+'").click(function(){'+
                    
                    'var tax_no'+row+' = $("#tax_no'+row+'").val();'+
                    'var tax_date'+row+' = $("#tax_date'+row+'").val();'+
                    'var nvat = parseFloat($("#nvat").val());'+
                    'var kamt = parseFloat($("#kamt").val());'+
                    'var vatper = parseFloat($("#vatper").val());'+
                    'var toaa = parseFloat($("#toaa").val());'+
                    'var toamt = parseFloat($("#toamt").val());'+
                    'var namt = parseFloat($("#namt").val());'+
                    'if (tax_no'+row+'=="") {'+
                    'swal({ title: "กรุณากรอกTax No !!.",text: "",confirmButtonColor: "#EA1923",type: "error"});'+
                    '}else if(tax_date'+row+'==""){'+
                    'swal({ title: "กรุณากรอก TAX Date !!.",text: "",confirmButtonColor: "#EA1923",type: "error"});'+
                    '}else{'+
                    'if (kamt==toamt) {'+
                    'var cheamt = kamt -namt;'+
                    '}else{'+
                    'var cheamt = toamt -namt;'+
                    '}'+
                    '$("#save'+row+'").hide();'+
                    'var toa = toaa+namt;'+
                    'var tov = vatper+nvat;'+
                    '$("#toaa").val(toa);'+
                    '$("#toamt").val(cheamt);'+
                    '$("#vatper").val(tov);'+
                    '$("#amount1'+row+'").val(namt);'+
                    '$("#vatt'+row+'").val(nvat);'+
                    '$("#amount1'+row+'").show();'+
                    '$("#vatt1'+row+'").show();'+
                    '$("#amount'+row+'").hide();'+
                    '$("#percent'+row+'").hide();'+
                    '}'+
                    '});'+

                    '<\/script>';
                    $('#body').append(tr);
                }
              </script> 
    
 
  </tbody>
  <tr>
    <td class="text-center" colspan="5">TOTAL</td>
    <td><input type="text" readonly="true" class="form-control text-right" name="tax_dr" id="tax_dr" ></td>
    <td><input type="text" readonly="true" class="form-control text-right" name="tax_cr" id="tax_cr"></td>
  </tr>
</table>
