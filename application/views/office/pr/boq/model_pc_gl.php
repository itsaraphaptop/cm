      <?php
    $this->db->select('*');       
    $this->db->where('boq_id',$id);
    $priboqid = $this->db->get('boq_item')->result();
    foreach ($priboqid as $key) {
    $boq_budget_total =	$key->boq_budget_total;
    	$controlcost  = $key->controlcost;
    		
			  $chkcontroll = $key->chkcontroll;
			  $boq_id = $key->boq_id;
    }
    ?>


<div class="col-xs-2" id="eve">
	<div class="form-group">
        <label>Budget Control</label>
        	<input type="hidden" id="chkcontroll" value="<?php echo $chkcontroll; ?>">
        	<input type="hidden" id="boq_id" name="boq_id" value="<?php echo $boq_id; ?>">
           <input type="text" id="costcontrol" name="xpd1" placeholder="กรอกจำนวน" class="text-right form-control" value="0" readonly style="border-color: red;">
        </div>
</div>

<script>

var boq_id = $('#boq_id').val();
var costbg = parseFloat($('#costbg'+boq_id+'').val());
$('#costcontrol').val(costbg);
$('#unitprice').keyup(function(){
	    var ckkcontrolbg = $('#ckkcontrolbg').val();
	    var chkcontroll = $('#chkcontroll').val();
	    var boq_id = $('#boq_id').val();
	    var unitprice = $('#unitprice').val();
	    var xpd1 = $('#costcontrol').val();
	    var costbg = parseFloat($('#costbg'+boq_id+'').val());
        if(ckkcontrolbg=="2"){
                if(chkcontroll=="1"){
                
                 $('#costcontrol').val(costbg-unitprice);

                 var totalcost = parseFloat($('#costcontrol').val().replace(/,/g,""));
                     if (parseFloat(totalcost) < parseFloat("0")) {

                              swal({
                                title: "รายการมากกว่าใน Budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                            });

                        $("#unitprice").val('0');
                        $("#costcontrol").val(costbg);
                        $("#amttot").val('0');


                          }
                    }// if
        }
    });
</script>



<script>

var boq_id = $('#boq_id').val();
var costbg = parseFloat($('#costbg'+boq_id+'').val());
$('#costcontrol').val(costbg);
$('#pqty ,#pprice_unit ,#pdiscper1 ,#pdiscper2 ,#pdiscper3 ,#pdiscper4 ,#pdiscex').keyup(function(){
	    var ckkcontrolbg = $('#ckkcontrolbg').val();
	    var chkcontroll = $('#chkcontroll').val();
	    var boq_id = $('#boq_id').val();
	    var pprice_unit = parseFloat($('#pdisamt').val().replace(/,/g,"")*1);
	    var xpd1 = $('#costcontrol').val();
	    var costbg = parseFloat($('#costbg'+boq_id+'').val().replace(/,/g,"")*1);
        if(ckkcontrolbg=="2"){
                if(chkcontroll=="1"){
                
                 $('#costcontrol').val((costbg-pprice_unit));
               
                 var totalcost = parseFloat($('#costcontrol').val().replace(/,/g,""));
                     if (parseFloat(totalcost) < parseFloat("0")) {

                              swal({
                                title: "รายการมากกว่าใน Budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                            });

                        $("#pprice_unit").val('0');
                        $("#costcontrol").val(costbg);
                        $("#pdisamt").val('0');
                        $("#pnetamt").val('0');
                        $("#to_vat").val('0');
                        $("#pamount").val('0');
                        


                          }
                    }// if
        }
    });
</script>

<script>

var boq_id = $('#boq_id').val();
var costbg = parseFloat($('#costbg'+boq_id+'').val());
$('#costcontrol').val(costbg);
$('#pqty<?php echo $n; ?> ,#pprice_unit<?php echo $n; ?> ,#pdiscper1<?php echo $n; ?> ,#pdiscper2<?php echo $n; ?> ,#pdiscper3<?php echo $n; ?> ,#pdiscper4<?php echo $n; ?> ,#pdiscex<?php echo $n; ?>').keyup(function(){
      var ckkcontrolbg = $('#ckkcontrolbg').val();
      var chkcontroll = $('#chkcontroll').val();
      var boq_id = $('#boq_id').val();
      var pprice_unit = parseFloat($('#pdisamt').val().replace(/,/g,"")*1);
      var xpd1 = $('#costcontrol').val();
      var costbg = parseFloat($('#costbg'+boq_id+'').val().replace(/,/g,"")*1);
        if(ckkcontrolbg=="2"){
                if(chkcontroll=="1"){
                
                 $('#costcontrol').val((costbg-pprice_unit));
               
                 var totalcost = parseFloat($('#costcontrol').val().replace(/,/g,""));
                     if (parseFloat(totalcost) < parseFloat("0")) {

                              swal({
                                title: "รายการมากกว่าใน Budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                            });

                        $("#pprice_unit").val('0');
                        $("#costcontrol").val(costbg);
                        $("#pdisamt").val('0');
                        $("#pnetamt").val('0');
                        $("#to_vat").val('0');
                        $("#pamount").val('0');
                        


                          }
                    }// if
        }
    });
</script>