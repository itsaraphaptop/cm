<div class="table-responsive pre-scrollable">
    <table class="table table-bordered table-hover table-xxs table-striped">
        <thead>
            <tr class="active">
                <th class="text-center">Delete</th>
                <th>BOQ Type</th>
                <!-- <th>No.</th> -->
                <th><div style="width: 150px;">Costcode</div></th>
                <th><div style="width: 150px;"> Mat. Code</th>
                <th><div style="width: 250px;">Material Name</th>
                <!-- <th><div style="width: 150px;">Asset Code</th> -->
                <th><div style="width: 100px;">QTY</th>
                <th><div style="width: 100px;">Unit Code</th>
                <th><div style="width: 100px;">Unit Name</th>
                <th><div style="width: 100px;">Price/Unit</th>
                <th><div style="width: 100px;">Budget</th>
                <th><div style="width: 100px;">Amount Before</th>
                <th><div style="width: 100px;">% Disc. 1</th>
                <th><div style="width: 100px;">Disc. amt 1</th>
                <th><div style="width: 100px;">% Disc. 2</th>
                <th><div style="width: 100px;">Disc. amt 2</th>
                <th><div style="width: 150px;">Special Discount</th>
                <th><div style="width: 100px;">Amount</th>
                <th><div style="width: 100px;">Peroid</th>
                <th><div style="width: 150px;">PR No,.</th>
                <th><div style="width: 250px;">Discription</th>
            </tr>
        </thead>
        <tbody id="trrowt">
            <?php $totalamt=0; $i=1; foreach ($pr_detail as $key => $value) {
                $disamt1 = ($value->pri_amount*$value->pri_discountper1)/100;
                $disamt2 = ($disamt1*$value->pri_discountper2)/100;
                $netamt = (($value->pri_amount-$disamt1)-$disamt2)-$value->pri_disamt;
            ?>
            <tr id="<?= $i;?>">
                <td class="text-center">
                    <ul class="icons-list">
                        <li><a id="remove"><i class="icon-trash"></i></a></li>
                    </ul>
                </td>
                <td><?php if($value->boq_type=='2'){echo '<label class="label label-warning">Labor</label>';}elseif($value->boq_type=='0'){echo '<label class="label label-warning">Not Select BOQ</label>';}; ?>
                    <input type="hidden" name="boq_type[]" id="boq_type<?=$i;?>" value="<?php echo $value->boq_type;?>">
                </td>
                <!-- <td><?= $i; ?></td> -->
                <td>
                    <div class="input-group input-group-xs">
                        <input class="form-control input-xs" type="text" name="costcode[]" id="codecostcode<?=$i;?>" value="<?=$value->pri_costcode;?>">
                        <span class="input-group-btn">
                            <button type="button" class="costcode<?=$i;?> btn btn-default" data-toggle="modal" data-target="#costcode<?=$i;?>"><i class="icon-search4"></i></button>
                        </span>
                    </div>
                </td>
                <td>
                    <div class="input-group input-group-xs">
                        <input class="form-control input-xs" type="text" name="matcode[]" id="newmatcode<?=$i;?>" value="<?=$value->pri_matcode;?>" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="openund<?=$i;?> btn btn-default" data-toggle="modal" data-target="#opnewmattt<?=$i;?>"><i class="icon-search4"></i></button>
                        </span>
                    </div>
                </td>
                <td>
                    <input class="form-control input-xs" type="text" name="matname[]" id="newmatname<?=$i;?>" value="<?=$value->pri_matname;?>" readonly>
                </td>
                <td>
                    <input class="form-control input-xs text-right qty" type="text" name="qty[]" id="qty<?=$i;?>" value="<?=$value->pri_qty;?>" readonly>
                </td>
                <td>
                    <input class="form-control input-xs text-center unitcode" type="text" name="unitcode[]" id="newunitcode<?=$i;?>" value="<?=$value->pri_unitcode;?>" readonly>
                </td>
                <td>
                    <input class="form-control input-xs text-right unit" type="text" name="unit[]" id="unit<?=$i;?>" value="<?=$value->pri_unit;?>" readonly>
                </td>
                <td>
                    <input class="form-control input-xs text-right priceunit border-danger" type="text" name="priceunit[]" id="priceunit<?=$i;?>" value="<?=$value->pri_priceunit;?>">
                </td>
                <td>
                    <?php $res = $this->db->query("select `cost` as costallowance from boq_cost where type='2' and compcode='$compcode' and boq_mcode='$value->pri_matcode' and project_code='$project_id';")->result_array();?>
                    <?php $reswo = $this->db->query("select sum(total_nat_amount) as total_nat_amount from lo INNER JOIN lo_detail ON lo.lo_lono = lo_detail.lo_ref where lo_matcode='$value->pri_matcode' and lo.projectcode='$project_id' and  lo.compcode='$compcode'")->result_array();?>
                    <?php $sumbud = 0; $sumbud = parse_num($res[0]['costallowance']-$reswo[0]['total_nat_amount']);?>
                    <input class="form-control input-xs text-right" type="text" readonly name="costallowance[]" id="costallowance<?=$i;?>" value="<?=$sumbud;?>">
                </td>
                <td>
                    <input class="form-control input-xs text-right amtbefor" type="text" name="amtbefor[]" id="amtbefor<?=$i;?>" value="<?=$value->pri_amount;?>" readonly>
                </td>
                <td>
                    <input class="form-control input-xs text-right disone" type="text" name="disone[]" id="disone<?=$i;?>" value="<?=$value->pri_discountper1;?>">
                </td>
                <td>
                    <input class="form-control input-xs text-right disoneamt" type="text" name="disoneamt[]" id="disoneamt<?=$i;?>" value="<?= $disamt1;?>" readonly>
                </td>
                <td>
                    <input class="form-control input-xs text-right distwo" type="text" name="distwo[]" id="distwo<?=$i;?>" value="<?= $value->pri_discountper2;?>">
                </td>
                <td>
                    <input class="form-control input-xs text-right distwoamt" type="text" name="distwoamt[]" id="distwoamt<?=$i;?>" value="<?= $disamt2;?>" readonly>
                </td>
                <td>
                    <input class="form-control input-xs text-right spedist" type="text" name="spedist[]" id="spedist<?=$i;?>" value="<?= $value->pri_disamt;?>">
                </td>
                <td>
                    <input class="form-control input-xs text-right amt" type="text" name="amt[]" id="amt<?=$i;?>" value="<?= $netamt;?>" readonly>
                </td>
                <td>
                    <input class="form-control input-xs text-right period" type="number" name="perioditem[]" id="period<?=$i;?>" value="1">
                </td>
                <td>
                    <input class="form-control input-xs text-right pri_ref" type="text" name="pri_ref[]" id="pri_ref<?=$i;?>" value="<?= $value->pri_ref;?>" readonly>
                </td>
                <td>
                    <input class="form-control input-xs pri_remark" type="text" name="pri_remark[]" id="pri_remark<?=$i;?>" value="<?= $value->pri_remark;?>">
                    <input class="form-control input-xs prid" type="hidden" name="prid[]" id="prid<?=$i;?>" value="<?= $value->pri_id;?>">
                </td>
            </tr>
            <script>
                    $("#qty<?=$i;?>").keyup(function(){
                    var q = $("#qty<?=$i;?>").val();
                    var w = $("#priceunit<?=$i;?>").val();
                    var e = $("#disone<?=$i;?>").val();
                    var ew = $("#distwo<?=$i;?>").val();
                    var tw = $("#spedist<?=$i;?>").val();
                    var r = ((q*w)*e)/100;
                    var y = (q*w)-r;
                    var rw = (r*ew)/100;
                    var yrw = y-rw;
                    var tq = yrw-tw;
                    $("#amt<?=$i;?>").val(tq);
                    $("#contactamount").val(tq);
                    $("#amtbefor<?=$i;?>").val(q*w);
                    $("#disoneamt<?=$i;?>").val(r);
                    $("#distwoamt<?=$i;?>").val(rw);
                    $("#contactamount").val(tq);
                    $(".totsummary").val(tq);
                    var sumcer = 0; var amt = 0;
                    $('.amt').each(function() {
                            sumcer += ($(this).val()*1);
                    });
                    $("#contactamount").val(sumcer);
                    $(".totsummary").val(sumcer);
                    _retencout();
                });
                $("#priceunit<?=$i;?>").keyup(function(){
                    var q = $("#qty<?=$i;?>").val();
                    var w = $("#priceunit<?=$i;?>").val();
                    var cost = $("#costallowance<?=$i;?>").val();
                    var e = $("#disone<?=$i;?>").val();
                    var ew = $("#distwo<?=$i;?>").val();
                    var tw = $("#spedist<?=$i;?>").val();
                    var r = ((q*w)*e)/100;
                    var y = (q*w)-r;
                    var rw = (r*ew)/100;
                    var yrw = y-rw;
                    var tq = yrw-tw;
                    var boq = $("#boq_type<?=$i;?>").val();

                    $("#amt<?=$i;?>").val(tq);
                    if (boq!=0){

                        if (tq>cost) {
                            alert('Over Budget');
                            $("#priceunit<?=$i;?>").val(0);
                        }
                    }
                    $("#contactamount").val(tq);
                    $("#amtbefor<?=$i;?>").val(q*w);
                    $("#disoneamt<?=$i;?>").val(r);
                    $("#distwoamt<?=$i;?>").val(rw);
                    $("#contactamount").val(tq);
                    $(".totsummary").val(tq);
                    var sumcer = 0; var amt = 0;
                    $('.amt').each(function() {
                            sumcer += ($(this).val()*1);
                    });
                    $("#contactamount").val(sumcer);
                    $(".totsummary").val(sumcer);
                    _retencout();
                });
                $("#disone<?=$i;?>").keyup(function(){
                    var q = $("#qty<?=$i;?>").val();
                    var w = $("#priceunit<?=$i;?>").val();
                    var e = $("#disone<?=$i;?>").val();
                    var ew = $("#distwo<?=$i;?>").val();
                    var tw = $("#spedist<?=$i;?>").val();
                    var r = ((q*w)*e)/100;
                    var y = (q*w)-r;
                    var rw = (r*ew)/100;
                    var yrw = y-rw;
                    var tq = yrw-tw;
                    $("#amt<?=$i;?>").val(tq);
                    $("#contactamount").val(tq);
                    $("#amtbefor<?=$i;?>").val(q*w);
                    $("#disoneamt<?=$i;?>").val(r);
                    $("#distwoamt<?=$i;?>").val(rw);
                    $("#contactamount").val(tq);
                    $(".totsummary").val(tq);
                    var sumcer = 0; var amt = 0;
                    $('.amt').each(function() {
                            sumcer += ($(this).val()*1);
                    });
                    $("#contactamount").val(sumcer);
                    $(".totsummary").val(sumcer);
                });
                $("#distwo<?=$i;?>").keyup(function(){
                    var q = $("#qty<?=$i;?>").val();
                    var w = $("#priceunit<?=$i;?>").val();
                    var e = $("#disone<?=$i;?>").val();
                    var ew = $("#distwo<?=$i;?>").val();
                    var tw = $("#spedist<?=$i;?>").val();
                    var r = ((q*w)*e)/100;
                    var y = (q*w)-r;
                    var rw = (r*ew)/100;
                    var yrw = y-rw;
                    var tq = yrw-tw;
                    $("#amt<?=$i;?>").val(tq);
                    $("#contactamount").val(tq);
                    $("#amtbefor<?=$i;?>").val(q*w);
                    $("#disoneamt<?=$i;?>").val(r);
                    $("#distwoamt<?=$i;?>").val(rw);
                    $("#contactamount").val(tq);
                    $(".totsummary").val(tq);
                    var sumcer = 0; var amt = 0;
                    $('.amt').each(function() {
                            sumcer += ($(this).val()*1);
                    });
                    $("#contactamount").val(sumcer);
                    $(".totsummary").val(sumcer);
                });
                $("#spedist<?=$i;?>").keyup(function(){
                    var q = $("#qty<?=$i;?>").val();
                    var w = $("#priceunit<?=$i;?>").val();
                    var e = $("#disone<?=$i;?>").val();
                    var ew = $("#distwo<?=$i;?>").val();
                    var tw = $("#spedist<?=$i;?>").val();
                    var r = ((q*w)*e)/100;
                    var y = (q*w)-r;
                    var rw = (r*ew)/100;
                    var yrw = y-rw;
                    var tq = yrw-tw;
                    $("#amt<?=$i;?>").val(tq);
                    $("#contactamount").val(tq);
                    $("#amtbefor<?=$i;?>").val(q*w);
                    $("#disoneamt<?=$i;?>").val(r);
                    $("#distwoamt<?=$i;?>").val(rw);
                    $("#contactamount").val(tq);
                    $(".totsummary").val(tq);
                    var sumcer = 0; var amt = 0;
                    $('.amt').each(function() {
                            sumcer += ($(this).val()*1);
                    });
                    $("#contactamount").val(sumcer);
                    $(".totsummary").val(sumcer);
                });
            </script>
            <?php  $i++; $totalamt+=$netamt; } ?>
        </tbody>
        <tbody>
            <tr>
                <td colspan="16" class="text-center">Total Summary</td>
                <td class="text-right"><input type="text" class="form-control input-xs text-right totsummary" readonly value="<?=number_format($totalamt,4);?>"></td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
// $(document).ready(function(){
 $('#contactamount').val(<?php echo number_format($totalamt,4);?>);
// });
$(document).on('click', 'a#remove', function() { // <-- changes
            var self = $(this);
            self.closest('tr').remove();
           
        });
</script>