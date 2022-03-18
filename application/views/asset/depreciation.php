<table class="table table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                      
                               <th style="text-align: center;">No</th>
                               <th style="text-align: center;">Asset Code</th>   
                               <th style="text-align: center;">Asset Name</th>
                               <th style="text-align: center;">Buy Date</th>
                               <th style="text-align: center;">Amount</th>
                               <th style="text-align: center;">Residual</th>
                               <th style="text-align: center;">%</th>
                               <th style="text-align: center;">Dep Bf.</th>
                               <th style="text-align: center;">Date Fr.</th>
                               <th style="text-align: center;">Date to</th>
                               <th style="text-align: center;">Day</th>
                               <th style="text-align: center;">Dep. This Periond</th>
                               <th style="text-align: center;">ProjectNo.</th>
                               <th style="text-align: center;">Job</th>
                               <th style="text-align: center;">Dept.</th>
                               <th style="text-align: center;">Dep. Met.</th>
                               <th style="text-align: center;">Year</th>
                               <th style="text-align: center;">A/C Dr.</th>
                               <th style="text-align: center;">Cost Code</th>
                               <th style="text-align: center;">PO No.</th>
                               <th style="text-align: center;">AP No.</th>
                               <th style="text-align: center;">Action</th>

                      </tr>
                    </thead>
<tbody >
<?php $n=1; $de_ass=0; $de_resi=0;  foreach ($res as $key) {
?>
<?php
$this->db->select('*');
$this->db->from('depreciation_item');
$this->db->where('de_ass',$key->fa_assetcode);
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
$this->db->where('depreciation_codeh',$key->fa_depreciationcode);
$this->db->where('depreciation_y',$totall);
$query=$this->db->get()->result();
?>
<?php
$this->db->select('*');
$this->db->from('depreciation_item');
$this->db->where('de_ass',$key->fa_assetcode);
$amout=$this->db->get()->result();
?>
<?php
$this->db->select('*');
$this->db->from('depreciation_header');
$this->db->where('depreciation_code',$key->fa_depreciationcode);
$aaaa=$this->db->get()->result();
?>
<?php
$this->db->select('*');
$this->db->from('depreciation_item');
$amoutdee=$this->db->get()->result();
?>
<?php
$this->db->select('*');
$this->db->from('depreciation_item');
$dt=$this->db->get();
$que = $dt->num_rows();
?>
<?php  foreach ($query as $e) { ?>
<?php $depbf=$key->fa_bf; $d_day=0;  foreach ($amout as $k ) {
if($total==0){
$depbf = 0;
}else if($total!=0){
$depbf = $depbf+$k->de_periond;
$d_day = $d_day+$k->de_day;
}

}  ?>


<?php  foreach ($aaaa as $b) { ?>
<?php $dep=0; 
foreach ($amoutdee as $mo) {
$dep = $dep+$mo->de_periond;
} ?>
<?php
$depreallyear = $b->depreciation_year*365;
$allyear = number_format(($b->depreciation_year*365)-$d_day);
$alldayall = $d_day;


$de_ass = $de_ass + $key->fa_amount;
$de_resi = $de_resi + $key->fa_residual;
?>

<tr style="background-image:linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%);">
  <td style="text-align: center;"><?php echo $n; ?><input type="hidden" name="chki[]" id="chki<?php echo $n; ?>"></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_ass" name="de_ass[]" value="<?php echo $key->fa_assetcode ;  ?>" style="width: 150px;"></td>
  <td style="text-align: center;">
    <input readonly="true" type="text" class="form-control" id="de_assname" name="de_assname[]" value="<?php echo $key->fa_asset;?>" style="width: 200px;">
  </td>
  <td style="text-align: center;">
    <input readonly="true" type="text" class="form-control" id="de_assdate<?php echo $n; ?>" name="de_assdate[]" value="<?php
    if($key->fa_bf==""){
    $assdate=$key->fa_assdate;
    }else if($key->fa_bf!=""){
    $assdate=$key->fa_assdate;
    }
    $datee = str_replace('-', '', $assdate);
    $y = substr($datee,0,4);
    $m = substr($datee,4,2);
    $d = substr($datee,6,2);
    echo $d .'/';
    echo $m .'/';
    echo $y ;
    ?>" style="width: 120px;">
  </td>
  <td style="text-align: center;">
    <input readonly="true" type="text" class="txt1 form-control text-right" id="de_assamout<?php echo $n; ?>" name="de_assamout[]" value="<?php echo $key->fa_amount;  ?>" style="width: 120px;">
  </td>
  <td style="text-align: center;">
    <input readonly="true" type="text" class="txt2 form-control  text-right" id="de_residual" name="de_residual[]" value="<?php echo $key->fa_residual;  ?>" style="width: 80px;">
  </td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_asspe<?php echo $n; ?>" name="de_assper[]" value="<?php echo $e->depreciation_per;  ?>" style="width: 80px;"></td>
  
  <td style="text-align: center;" style=""><input readonly="true" type="text" class="txt3 form-control" id="de_assbf<?php echo $n; ?>" name="de_assbf[]" value="<?php echo $depbf; ?>" style="width: 150px; text-align: right;"></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="datefr<?php echo $n; ?>" name="de_fr[]" value="" style="width: 100px;"></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="dateto<?php echo $n; ?>" name="de_to[]" value="" style="width: 100px;"></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="day<?php echo $n; ?>" name="de_day[]" value="" style="width: 50px;"></td>
  
  <td style="text-align: center;" class="">
    <input type="text" class="txt countable form-control" id="de_periond<?php echo $n; ?>" name="de_periond[]" value="" style="width: 200px; text-align: right;">
  </td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_pjname" name="de_pjname[]" value="<?php echo $key->fa_projectname;?>" style="width: 200px;"><input readonly="true" type="hidden" class="form-control" id="de_pjid" name="de_pjid[]" value="<?php echo $key->fa_projectid;?>"></td>
  <td style="text-align: center;">
 <?php $system = $this->db->query("select * from system where systemcode = '$key->fa_job'")->result(); ?>
 <?php foreach ($system as $systemb => $systemc) { ?>
 <?php echo $systemc->systemname; ?>
 <?php  }  ?>

    <input readonly="true" type="hidden" name="de_job[]" class="form-control"  value="<?php echo $key->fa_job;?>" style="width: 100px;"></td>
  <td style="text-align: center;">
    <?php if($key->fa_departmentname==""){
    echo '-';
    }else{
    echo '<input readonly="true" type="text" class="form-control" id="de_dpmname" name="de_dpmname[]" value="'.$key->fa_departmentname.'" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_dpmid" name="de_dpmid[]" value="'.$key->fa_departmentid.'" style="width: 100px;">';
  } ?></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_met" name="de_met[]" value="<?php echo $b->depreciation_code;?>" style="width: 100px;"></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_year" name="de_year[]" value="<?php echo $b->depreciation_year;?>" style="width: 100px;"></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_at_acaid" name="de_at_acaid[]" value="<?php echo $key->at_acaid;?>" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_ataca" name="de_ataca[]" value="<?php echo $key->at_aca;?>" style="width: 100px;"></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_acdid" name="de_acdid[]" value="<?php echo $key->at_acdid;?>" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_acd" name="de_acd[]" value="<?php echo $key->at_acd;?>" style="width: 100px;"></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_costid" name="de_costid[]" value="<?php echo $key->at_costid;?>" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_cost" name="de_cost[]" value="<?php echo $key->at_cost;?>" style="width: 100px;"></td>
  <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_acaccid" name="de_acaccid[]" value="<?php echo $key->at_acaccid;?>" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_acacc" name="de_acacc[]" value="<?php echo $key->at_acacc;?>" style="width: 100px;"></td>
  
  <td style="text-align: center;"><a id="remove<?php echo $n; ?>" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>
<input type="hidden" class="form-control input-xs" name="de_ud[]" id="de_ud<?php echo $n; ?>" value="<?php echo $key->status;?>" ></td>
</tr>



<script>
$(document).on('click', 'a#remove<?php echo $n; ?>', function () { // <-- changes
var self = $(this);
noty({
width: 200,
text: "Do you want to Delete?",
type: self.data('type'),
dismissQueue: true,
timeout: 1000,
layout: self.data('layout'),
buttons: (self.data('type') != 'confirm') ? false : [
{
addClass: 'btn btn-primary btn-xs',
text: 'Ok',
onClick: function ($noty) { //this = button element, $noty = $noty element
$noty.close();
self.closest('tr').remove();
noty({
force: true,
text: 'Deleteted',
type: 'success',
layout: self.data('layout'),
timeout: 1000,
});
}
},
{
addClass: 'btn btn-danger btn-xs',
text: 'Cancel',
onClick: function ($noty) {
$noty.close();
noty({
force: true,
text: 'You clicked "Cancel" button',
type: 'error',
layout: self.data('layout'),
timeout: 1000,
});
}
}
]
});
return false;
});
</script>



<script>
var de_datefrom = $("#de_datefrom").val();
var de_dateto = $("#de_dateto").val();
var de_assdate = $("#de_assdate<?php echo $n; ?>").val();
var day = $("#de_total").val();
var de_assamout = $("#de_assamout<?php echo $n; ?>").val();
var de_asspe = $("#de_asspe<?php echo $n; ?>").val();
var buyday = <?php echo $d; ?>;
var fa_residual = <?php echo $key->fa_residual;?>;
var ddc = '<?php echo $d; ?>';
var dd = '<?php echo $d .'/'; ?>';
var mm = '<?php echo $m .'/'; ?>' ;
var yy = '<?php echo $y+$b->depreciation_year; ?>'  ;
if(<?php echo $qtotal; ?>==0){
$("#datefr<?php echo $n; ?>").val(de_assdate);
$("#dateto<?php echo $n; ?>").val(de_dateto);
$("#day<?php echo $n; ?>").val(day-buyday+1);

var dayamout = $("#day<?php echo $n; ?>").val();
var de_assbf = parseFloat($('#de_assbf<?php echo $n; ?>').val());
var periond = parseFloat((((((de_assamout-fa_residual)*de_asspe)/100)/365)*dayamout));
var amoutperiond = parseFloat(periond.toFixed(4));
$("#chki<?php echo $n; ?>").val("Y");
if((de_assamout-fa_residual) > (de_assbf+amoutperiond)){
$("#de_periond<?php echo $n; ?>").val(amoutperiond);
}else if((de_assamout-fa_residual) < (de_assbf+amoutperiond)){
$("#de_periond<?php echo $n; ?>").val((de_assamout-fa_residual)-de_assbf);
$("#de_ud<?php echo $n; ?>").val("2");
}
var de_periond = $("#de_periond<?php echo $n; ?>").val();

}else if(<?php echo $qtotal; ?> < <?php echo $b->depreciation_year;?>){
$("#datefr<?php echo $n; ?>").val(de_datefrom);
$("#dateto<?php echo $n; ?>").val(de_dateto);
$("#day<?php echo $n; ?>").val(day);
var de_assbf = parseFloat($('#de_assbf<?php echo $n; ?>').val());
var dayamout = $("#day<?php echo $n; ?>").val();
var periond = parseFloat((((((de_assamout-fa_residual)*de_asspe)/100)/365)*dayamout));
var amoutperiond = parseFloat(periond.toFixed(4));
$("#chki<?php echo $n; ?>").val("Y");

if((de_assamout-fa_residual) > (de_assbf+amoutperiond)){
$("#de_periond<?php echo $n; ?>").val(amoutperiond);
}else if((de_assamout-fa_residual) < (de_assbf+amoutperiond)){
$("#de_periond<?php echo $n; ?>").val((de_assamout-fa_residual)-de_assbf);
$("#de_ud<?php echo $n; ?>").val("2"); 
}
var de_periond = $("#de_periond<?php echo $n; ?>").val();

}else if(<?php echo $qtotal; ?>==<?php echo $b->depreciation_year; ?>){
$("#chki<?php echo $n; ?>").val("Y");
var de_assamout = $('#de_assamout<?php echo $n; ?>').val();
var de_assbf = $('#de_assbf<?php echo $n; ?>').val();
var total_depre = de_assamout-de_assbf;

$("#datefr<?php echo $n; ?>").val(de_datefrom);
$("#dateto<?php echo $n; ?>").val(dd+mm+yy);
$("#day<?php echo $n; ?>").val(ddc-1);
$("#de_ud<?php echo $n; ?>").val("2");
$("#de_periond<?php echo $n; ?>").val(total_depre);
}






 calculateSum1();
  $(".txt1").on("keydown keyup", function() {
  
  calculateSum1();
  });
  function calculateSum1() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".txt1").each(function() {
  //add only if the value is number
  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
  sum += parseFloat($(this).val().replace(/,/g,""));

  console.log(sum);
  //alert(sum)
  }
  // else if (this.value.length != 0){
  //     $(this).css("background-color", "red");
  // }
  });
  
  $("input#allamt").val(numberWithCommas(sum));
  }



   calculateSum2();
  $(".txt2").on("keydown keyup", function() {
  
  calculateSum2();
  });
  function calculateSum2() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".txt2").each(function() {
  //add only if the value is number
  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
  sum += parseFloat($(this).val().replace(/,/g,""));

  console.log(sum);
  //alert(sum)
  }
  // else if (this.value.length != 0){
  //     $(this).css("background-color", "red");
  // }
  });
  
  $("input#allresidual").val(numberWithCommas(sum));
  }


     calculateSum3();
  $(".txt3").on("keydown keyup", function() {
  
  calculateSum3();
  });
  function calculateSum3() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".txt3").each(function() {
  //add only if the value is number
  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
  sum += parseFloat($(this).val().replace(/,/g,""));

  console.log(sum);
  //alert(sum)
  }
  // else if (this.value.length != 0){
  //     $(this).css("background-color", "red");
  // }
  });
  
  $("input#alldef").val(numberWithCommas(sum));
  }



 calculateSum();
  $(".txt").on("keydown keyup", function() {
  
  calculateSum();
  });
  function calculateSum() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".txt").each(function() {
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
  
  $("input#allprit").val(numberWithCommas(sum));
  }
  


$("#delperiod").remove();
</script>
<?php  } ?>
<?php  } ?>
<?php $n++; } ?>
<tr><th  colspan="22"></th></tr>
<tr>
<td colspan="4" style="text-align: center;" width="10%">Total</td>
<td><input class="form-control" type="text" name="allamt" id="allamt" readonly="true"
style="text-align: right;"></td>
<td><input class="form-control" type="text" name="allresidual" id="allresidual" readonly="true"
style="text-align: right;"></td>
<td></td>
<td><input class="form-control" type="text" name="alldef" id="alldef" readonly="true"
style="text-align: right;"></td>
<td colspan="3" style="text-align: center;"></td>
<td><input class="form-control" type="text" name="allprit" id="allprit" readonly="true"
style="text-align: right;"></td>
<td colspan="10" style="text-align: center;"></td>
</tr>

</tbody>

                  </table>