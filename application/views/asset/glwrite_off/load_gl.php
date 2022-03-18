 <table class="table table-hover table-bordered table-striped table-xxs" id="res">
					<thead>
                      <tr>

                               <th style="text-align: center;">Ac Code</th>   
                               <th style="text-align: center;">Account Name</th>
                               <th style="text-align: center;">Cost Code</th>
                               <th style="text-align: center;">Cost Name</th>
                               <th style="text-align: center;">Debit (Dr)</th>
                               <th style="text-align: center;">Credit (Cr)</th>
                              
                               
                      </tr>
                    </thead>
                    <tbody id="bodygl">
<?php foreach ($res as $key) {
$fa_atype = $key->fa_atype;

$at_acaid = $key->at_acaid;
$at_aca = $key->at_aca;

$at_acaccid = $key->at_acaccid;
$at_acacc = $key->at_acacc;
}
?>



<?php 
$this->db->select('*');
$this->db->from('syscode');
$this->db->join('account_total','account_total.act_code = syscode.fa_loss');
$sy=$this->db->get()->result();
?>
<?php $n=1; foreach ($sy as $syc) { 
$act_name = $syc->act_name;
$fa_loss = $syc->fa_loss;

}
?>
<tr id="hidden1">
<td hidden><input type="hidden" name="chki[]" id="chki1" value="Y"><input type="hidden" id="p" value="1" class="form-control input-sm" style="width: 50px;"></td>
<td><input type="text" name="off_apcode[]" id="off_apcode1" value="" class="form-control input-sm" readonly></td>
<td><div class="input-group"><input type="text" name="off_apname[]" id="off_apname1" value="" class="form-control input-sm" readonly><span class="input-group-btn"><button type="button" class="acccost1 btn btn-default btn-xs" data-toggle="modal" data-target="#acctotal1"><i class="icon-search4"></i></button></span></div></td>
<td><input type="text" name="off_costcode[]" id="codecostcodeint1"  class="form-control input-sm" readonly="true"></td>
<td><div class="input-group"><input type="text" id="costnameint1"  name="off_costname[]" class="form-control input-sm" readonly="true"><span class="input-group-btn"><button type="button" class="acc1 btn btn-default btn-xs" data-toggle="modal" data-target="#costcodeacc1"><i class="icon-search4"></i></button></span></div></td>
<td><input type="text" name="off_dr[]" id="off_dr1"  class="drsum form-control input-sm text-right" value="0"></td>
<td><input type="text" name="off_cr[]" id="off_cr1" class="crsum form-control input-sm text-right" value="0"></td>

</tr>

<tr id="hidden2">
<td hidden><input type="hidden" name="chki[]" id="chki2" value="Y"><input type="hidden" id="p" value="2" class="form-control input-sm" style="width: 50px;"></td>
<td><input type="text" name="off_apcode[]" id="off_apcode2" value="<?php echo $at_acaid; ?>" class="form-control input-sm" readonly></td>
<td><div class="input-group"><input type="text" name="off_apname[]" id="off_apname2" value="<?php echo $at_aca; ?>" class="form-control input-sm" readonly><span class="input-group-btn"><button type="button" class="acccost2 btn btn-default btn-xs" data-toggle="modal" data-target="#acctotal2"><i class="icon-search4"></i></button></span></div></td>
<td><input type="text" name="off_costcode[]" id="codecostcodeint2" class="form-control input-sm" readonly="true"></td>
<td><div class="input-group"><input type="text" id="costnameint2" name="off_costname[]" class="form-control input-sm" readonly="true"><span class="input-group-btn"><button type="button" class="acc2 btn btn-default btn-xs" data-toggle="modal" data-target="#costcodeacc2"><i class="icon-search4"></i></button></span></div></td>
<td><input type="text" name="off_dr[]" id="off_dr2"  class="drsum form-control input-sm text-right" value="0"></td>
<td><input type="text" name="off_cr[]" id="off_cr2" class="crsum form-control input-sm text-right" value="0"></td>


</tr>

<tr id="hidden3">
<td hidden><input type="hidden" name="chki[]" id="chki3" value="Y"><input type="hidden" id="p" value="3" class="form-control input-sm" style="width: 50px;"></td>
<td><input type="text" name="off_apcode[]" id="off_apcode3" class="form-control input-sm" value="<?php echo $fa_loss; ?>" readonly></td>
<td><div class="input-group"><input type="text" name="off_apname[]" id="off_apname3" class="form-control input-sm" value="<?php echo $act_name; ?>" readonly><span class="input-group-btn"><button type="button" class="acccost3 btn btn-default btn-xs" data-toggle="modal" data-target="#acctotal3"><i class="icon-search4"></i></button></span></div></td>
<td><input type="text" name="off_costcode[]"  id="codecostcodeint3" class="form-control input-sm"  readonly="true"></td>
<td><div class="input-group"><input type="text" name="off_costname[]" id="costnameint3" class="form-control input-sm" readonly="true"><span class="input-group-btn"><button type="button" class="acc3 btn btn-default btn-xs" data-toggle="modal" data-target="#costcodeacc3"><i class="icon-search4"></i></button></span></div></td>
<td><input type="text" name="off_dr[]" id="off_dr3"  class="drsum form-control input-sm text-right" value="0"></td>
<td><input type="text" name="off_cr[]" id="off_cr3" class="crsum form-control input-sm text-right" value="0"></td>

</tr>


<tr id="hidden4">
<td hidden><input type="hidden" name="chki[]" id="chki4" value="Y"><input type="hidden" id="p" value="4" class="form-control input-sm" style="width: 50px;"></td>
<td><input type="text" name="off_apcode[]" id="off_apcode4" value="<?php echo $at_acaccid; ?>" class="form-control input-sm" readonly></td>
<td><div class="input-group"><input type="text" name="off_apname[]" id="off_apname4" value="<?php echo $at_acacc; ?>" class="form-control input-sm" readonly><span class="input-group-btn"><button type="button" class="acccost4 btn btn-default btn-xs" data-toggle="modal" data-target="#acctotal4"><i class="icon-search4"></i></button></span></div></td>
<td><input type="text" name="off_costcode[]" id="codecostcodeint4" class="form-control input-sm" readonly="true"></td>
<td><div class="input-group"><input type="text" name="off_costname[]" id="costnameint4" class="form-control input-sm" readonly="true"><span class="input-group-btn"><button type="button" class="acc4 btn btn-default btn-xs" data-toggle="modal" data-target="#costcodeacc4"><i class="icon-search4"></i></button></span></div></td>
<td><input type="text" name="off_dr[]" id="off_dr4"   class="drsum form-control input-sm text-right" value="0"></td>
<td><input type="text" name="off_cr[]" id="off_cr4"  class="crsum form-control input-sm text-right" value="0"></td>

</tr>


</tbody>

<tr>
	<td colspan="4" class="text-center">Total</td>
	<td><input type="text" name="sumdr[]" id="sumdr" class="form-control input-sm text-right" value="0"></td>
	<td><input type="text" name="sumcr[]" id="sumcr" class="form-control input-sm text-right" value="0"></td>
</tr>
</table>
<script>
	$("#hidden1").hide();
	$("#hidden2").hide();
	$("#hidden3").hide();
	$("#hidden4").hide();
	var textradio = parseFloat($("#textradio").val());
	if(textradio=="1"){


	var off_buyam = parseFloat($('#off_buyam').val());
	var off_thiam = parseFloat($('#off_thiam').val());

	var off_amt = parseFloat($('#off_amt').val());

	if((off_buyam-off_thiam)==off_amt){
	$("#hidden1").show();
	$("#hidden2").show();
	$("#hidden3").remove();
	$("#hidden4").show();

	var off_buyam = parseFloat($('#off_buyam').val());
	var off_depre = parseFloat($('#off_depre').val());
	var off_thiam = parseFloat($('#off_thiam').val());
	var off_buyam = parseFloat($('#off_buyam').val());
	var total_amt = (off_buyam-off_depre)-off_thiam;
	var total_depre = off_depre+off_thiam;


	$('#off_dr1').val(total_amt.toFixed(4));
	$('#off_cr1').val();

	$('#off_dr2').val(total_depre.toFixed(4));
	$('#off_cr2').val();

	$('#off_dr3').val();
	$('#off_cr3').val();

	$('#off_dr4').val();
	$('#off_cr4').val(off_buyam.toFixed(4));

	}else if((off_buyam-off_thiam)<off_amt){
	$("#hidden1").show();
	$("#hidden2").show();
	$("#hidden3").show();
	$("#hidden4").show();

	var total_amt = ((off_buyam-off_depre)-off_thiam)+(off_amt - (off_buyam-off_thiam));
	var total_depre = off_depre+off_thiam;

	var	total_del = off_amt - (off_buyam-off_thiam);

	$('#off_dr1').val(total_amt.toFixed(4));
	$('#off_cr1').val();

	$('#off_dr2').val(total_depre.toFixed(4));
	$('#off_cr2').val();

	$('#off_dr3').val();
	$('#off_cr3').val(total_del.toFixed(4));

	$('#off_dr4').val();
	$('#off_cr4').val(off_buyam.toFixed(4));

	}else if((off_buyam-off_thiam)>off_amt){
	$("#hidden1").show();
	$("#hidden2").show();
	$("#hidden3").show();
	$("#hidden4").show();

	var total_amt = ((off_buyam-off_depre)-off_thiam)-((off_buyam-off_thiam)-off_amt);
	var total_depre = off_depre+off_thiam;

	var	total_del = (off_buyam-off_thiam)-off_amt;

	$('#off_dr1').val(total_amt.toFixed(4));
	$('#off_cr1').val();

	$('#off_dr2').val(total_depre.toFixed(4));
	$('#off_cr2').val();

	$('#off_dr3').val(total_del.toFixed(4));
	$('#off_cr3').val();

	$('#off_dr4').val();
	$('#off_cr4').val(off_buyam.toFixed(4));	
	}


  
	}else if(textradio=="2"){
	
	$("#hidden1").show();
	$("#hidden2").show();
	$("#hidden3").remove();
	$("#hidden4").show();

	var off_buyam = parseFloat($('#off_buyam').val());
	var off_depre = parseFloat($('#off_depre').val());
	var off_thiam = parseFloat($('#off_thiam').val());
	var off_buyam = parseFloat($('#off_buyam').val());
	var total_amt = (off_buyam-off_depre)-off_thiam;
	var total_depre = off_depre+off_thiam;


	$('#off_dr1').val(total_amt.toFixed(4));
	$('#off_cr1').val();

	$('#off_dr2').val(total_depre.toFixed(4));
	$('#off_cr2').val();

	$('#off_dr3').val();
	$('#off_cr3').val();

	$('#off_dr4').val();
	$('#off_cr4').val(off_buyam.toFixed(4));

	}else if(textradio=="3"){
	
	$("#hidden1").show();
	$("#hidden2").show();
	$("#hidden3").remove();
	$("#hidden4").show();

	var off_buyam = parseFloat($('#off_buyam').val());
	var off_depre = parseFloat($('#off_depre').val());
	var off_thiam = parseFloat($('#off_thiam').val());
	var off_buyam = parseFloat($('#off_buyam').val());
	var total_amt = (off_buyam-off_depre)-off_thiam;
	var total_depre = off_depre+off_thiam;


	$('#off_dr1').val(total_amt.toFixed(4));
	$('#off_cr1').val();

	$('#off_dr2').val(total_depre.toFixed(4));
	$('#off_cr2').val();

	$('#off_dr3').val();
	$('#off_cr3').val();

	$('#off_dr4').val();
	$('#off_cr4').val(off_buyam.toFixed(4));

	
	}

		calculateSum1();
  		$(".drsum").on("keydown keyup", function() {
  
		  calculateSum1();
		  });
		  function calculateSum1() {
		  var sum = 0;
		  //iterate through each textboxes and add the values
		  $(".drsum").each(function() {
		  //add only if the value is number
		  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
		  sum += parseFloat($(this).val().replace(/,/g,""));
		  $(this).css("background-color", "#FEFFB0");
		  console.log(sum);
		  //alert(sum)
		  }
		  // else if (this.value.length != 0){
		  //     $(this).css("background-color", "red");
		  // }
		  });
		  
		  $("input#sumdr").val(numberWithCommas(sum));
		  }

		  		calculateSum();
  		$(".crsum").on("keydown keyup", function() {
  
		  calculateSum();
		  });
		  function calculateSum() {
		  var sum = 0;
		  //iterate through each textboxes and add the values
		  $(".crsum").each(function() {
		  //add only if the value is number
		  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
		  sum += parseFloat($(this).val().replace(/,/g,""));
		  $(this).css("background-color", "#FEFFB0");
		  console.log(sum);
		  //alert(sum)
		  }
		  // else if (this.value.length != 0){
		  //     $(this).css("background-color", "red");
		  // }
		  });
		  
		  $("input#sumcr").val(numberWithCommas(sum));
		  }	
</script>

<?php 
for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    } ?>
 <div class="modal fade" id="costcodeacc<?php  echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div id="modal_cost<?php  echo $i; ?>"></div>
                 </div>
             </div>
           </div>
         </div>
<script>
  $(".acc<?php  echo $i; ?>").click(function(){
    $('#modal_cost<?php  echo $i; ?>').html("<img src='<?php echo base_url(); ?>/assets/images/loading.gif'> Loading...");
    $("#modal_cost<?php  echo $i; ?>").load('<?php echo base_url(); ?>/index.php/share/costcode/<?php  echo $i; ?>');
  });
</script>


 <div class="modal fade" id="acctotal<?php  echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Account</h4>
               </div>
                 <div class="modal-body">
                     <div id="acctotal_total<?php  echo $i; ?>"></div>
                 </div>
             </div>
           </div>
         </div>
<script>
  $(".acccost<?php  echo $i; ?>").click(function(){
    $('#acctotal_total<?php  echo $i; ?>').html("<img src='<?php echo base_url(); ?>/assets/images/loading.gif'> Loading...");
    $("#acctotal_total<?php  echo $i; ?>").load('<?php echo base_url(); ?>/index.php/share/accchart/<?php  echo $i; ?>');
  });
</script>
<?php 
}
?>