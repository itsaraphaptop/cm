<div class="table-responsive">
								<div class="row" id="table">
									<div class="col-md-12 text-right">
								    <a type="button" class="label bg-danger" id="selectallpo">Select All</a>
								    <br>
								  </div>
								<table class="table table-hover table-bordered table-striped table-xxs" id="gg">
										<thead>
											<tr>
												<th>No.</th>
												<th><div style="width: 200px;">Material Code</div></th>
												<th><div style="width: 200px;">Material</div></th>
												<th>Cost Code</th>
												<th>Qty</th>
												<th>Unit</th>
												<th>Price/Unit</th>
												<th>Amount</th>
												<th>Disc.(%)</th>
												<th>Disc.Amt</th>
												<th>Total Disc</th>
												<th>Total Vat</th>
												<th>Total</th>
												<th class="text-center">Select</th>
											</tr>
										</thead>
										<tbody>
											<?php $n=1;
												  $poi_priceunit = 0; 
												  $poi_amount = 0;
												  $poi_discountper = 0;
												  $poi_disce = 0;
												  $poi_disamt = 0;
												  $poi_vat = 0;
												  $poi_netamt = 0;

											foreach ($res as $key) { 
												$poi_priceunit = $poi_priceunit+$key->poi_priceunit;
												$poi_amount = $poi_amount+$key->poi_amount;
												$poi_discountper = $poi_discountper+($key->poi_discountper1+$key->poi_discountper2+$key->poi_discountper3+$key->poi_discountper4);
												$poi_disce = $poi_disce+$key->poi_disce;
												$poi_disamt = $poi_disamt+$key->poi_disamt;
												$poi_vat = $poi_vat+$key->poi_vat;
												$poi_netamt = $poi_netamt+$key->poi_netamt;
												?>
											<tr id="chk<?php echo $key->poi_id; ?>">
												<td><?php echo $n; ?></td>
												<td><?php echo $key->poi_matcode; ?></td>
												<td><?php echo $key->poi_matname; ?></td>
												<td><?php echo $key->poi_costcode; ?> || <?php echo $key->poi_costname; ?></td>
												<td class="text-right"><?php echo $key->poi_qty; ?></td>
												<td class="text-right"><?php echo $key->poi_unit; ?></td>
												<td class="text-right"><?php echo $key->poi_priceunit; ?></td>
												<td class="text-right"><?php echo $key->poi_amount; ?></td>
												<td class="text-right"><?php echo $key->poi_discountper1+$key->poi_discountper2+$key->poi_discountper3+$key->poi_discountper4; ?></td>
												<td class="text-right"><?php echo $key->poi_disce; ?></td>
												<td class="text-right"><?php echo $key->poi_disamt; ?></td>

												<td class="text-right"><?php echo $key->poi_vat; ?></td>
												<td class="text-right"><?php echo $key->poi_netamt; ?></td>
												<td class="text-center"><a type="button" id="add<?php echo $n; ?>"  class="label bg-teal" >Select</a></td>
										
											</tr>

	<script >

      $("#add<?php echo $n; ?>").click(function(){
      	var poi_id = "<?php echo $key->poi_id; ?>";
      	var poi_matcode = "<?php echo $key->poi_matcode; ?>";
		var poi_matname = "<?php echo $key->poi_matname; ?>";
		var poi_costcode = "<?php echo $key->poi_costcode; ?>";
		var poi_costname = "<?php echo $key->poi_costname; ?>";
		var poi_qty = "<?php echo $key->poi_qty; ?>";
		var poi_unit = "<?php echo $key->poi_unit; ?>";
		var poi_priceunit = "<?php echo $key->poi_priceunit; ?>";
		var poi_amount = "<?php echo $key->poi_amount; ?>";
		var poi_discountper1 = "<?php echo $key->poi_discountper1; ?>";
		var poi_discountper2 = "<?php echo $key->poi_discountper2; ?>";
		var poi_discountper3 = "<?php echo $key->poi_discountper3; ?>";
		var poi_discountper4 = "<?php echo $key->poi_discountper4; ?>";
		var poi_disce = "<?php echo $key->poi_disce; ?>";
		var poi_disamt = "<?php echo $key->poi_disamt-$key->poi_sumdeduct; ?>";
		var poi_vat = "<?php echo $key->poi_vat; ?>";
		var poi_netamt = "<?php echo $key->poi_netamt; ?>";
		var poi_ref = "<?php echo $key->poi_ref; ?>";

		addrow(poi_id,poi_matcode,poi_matname,poi_costcode,poi_costname,poi_qty,poi_unit,poi_priceunit,poi_amount,poi_discountper1,poi_discountper2,poi_discountper3,poi_discountper4,poi_disce,poi_disamt,poi_vat,poi_netamt,poi_ref);
		$("#chk<?php echo $key->poi_id; ?>").hide();

		function addrow(poi_id,poi_matcode,poi_matname,poi_costcode,poi_costname,poi_qty,poi_unit,poi_priceunit,poi_amount,poi_discountper1,poi_discountper2,poi_discountper3,poi_discountper4,poi_disce,poi_disamt,poi_vat,poi_netamt,poi_ref){
			var row = ($('#detailpo tr').length-0)+1;
      		var tr = '<tr id="'+row+'">'+
	        '<td>'+row+'<input type="hidden" name="deduct_poi_id[]" value="'+poi_id+'"><input type="hidden" name="deduct_poi_ref[]" value="'+poi_ref+'"></td>'+
	        '<td>'+poi_matcode+'<input type="hidden" class="form-control input-sm text-right" name="deduct_poi_matcode[]" value="'+poi_matcode+'"></td>'+
	        '<td class="text-right">'+poi_qty+'<input type="hidden" class="form-control input-sm text-right" name="deduct_poi_qty[]" value="'+poi_qty+'"></td>'+
	        '<td class="text-right">'+poi_priceunit+'<input type="hidden" class="poi_deprice form-control input-sm text-right" name="deduct_poi_priceunit[]" value="'+poi_priceunit+'" ></td>'+
	        '<td>'+
	        '<select id="deduct_type'+row+'" class="form-control" required="" name="deduct_type[]">'+
	        '<option value=""></option>'+
			'<option value="1">Less Other</option>'+
			'<option value="2">Material Deduct</option>'+
			'</select>'+
			'</td>'+
	        '<td><input type="number" class="deduct_qty form-control input-sm text-right" name="deduct_qty[]" id="deduct_qty'+row+'" value="'+poi_qty+'" readonly></td>'+
	        '<td><input type="number" class="deduct_pricesub form-control input-sm text-right" name="deduct_pricesub[]" id="deduct_pricesub'+row+'" value="'+poi_priceunit+'"></td>'+
	        '<td><input type="number" class="deduct_amount form-control input-sm text-right" name="deduct_amount[]" id="deduct_amount'+row+'" value="'+poi_disamt+'"></td>'+
	        '<td><input type="text" class="form-control input-sm text-right" name="deduct_remark[]"></td>'+
	        '<td>'+
            '<a id="removedetailpo'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
          	'</td>'+
			'</tr>';

			

			 $('#detailpo').append(tr);

			 	$('#deduct_qty'+row+',#deduct_pricesub'+row+'').keyup(function(event) {
			 		var deduct_qty = parseFloat($('#deduct_qty'+row+'').val()); 
			 		var deduct_pricesub = parseFloat($('#deduct_pricesub'+row+'').val());
			 		var deduct_totalamount = deduct_qty+deduct_pricesub;
			 		$('#deduct_amount'+row+'').val(deduct_totalamount);
				 });

			 	$('#deduct_type_button').click(function(event) {
			 		$('#deduct_type_button').hide();
			 		$('#rtmodal').hide();
			 		$('#refrest_deduct_type_button').show();
			 	   	var deduct_type = parseFloat($('#deduct_type'+row+'').val());
			 	   	if(deduct_type=="1"){
			 	   		var ap_amountdown = parseFloat($('#ap_amountdown').val());
			 	   		var deduct_pricesub = parseFloat($('#deduct_pricesub'+row+'').val());
			 	   		var deduct_amount = parseFloat($('#deduct_amount'+row+'').val());
			 	   		var sumtypeone = ap_amountdown+deduct_amount;
			 	   		$('#ap_amountdown').val(sumtypeone);
			 	   	}else if(deduct_type=="2"){
			 	   		var ap_deduct = parseFloat($('#ap_deduct').val());
			 	   		var deduct_pricesub = parseFloat($('#deduct_pricesub'+row+'').val());
			 	   		var deduct_amount = parseFloat($('#deduct_amount'+row+'').val());
						var sumtypetwo = ap_deduct+deduct_amount;
						console.log(sumtypetwo);
			 	   		$('#ap_deduct').val(sumtypetwo);
			 	   	}

			 	   	var amt = $("#ap_contractamount").val();
			        var vat = parseFloat($("#ap_pay").val());
			        var ap_deduct = parseFloat($("#ap_deduct").val());
			        var ap_pay = parseFloat($("#ap_pay").val());
			        var ap_progressamount = parseFloat($("#ap_progressamount").val());
			        var ap_progress_bill = parseFloat($("#ap_progress_bill").val());
			        var totalamt = amt-ap_progress_bill;
			        var vattot = (vat*100)/amt;
			        var tt = vattot.toFixed(2);
			        $("#ap_payper").val(tt);
			        
			        var ap_deduct = $('#ap_deduct').val();
			        var appay_deduct = ap_pay-ap_deduct;
			        var ap_redown = $("#ap_redown").val();
			        var vattotxxxx = (appay_deduct*ap_redown)/100;
			        var ddxxxx = vattotxxxx.toFixed(2);
			        $("#ap_redownper").val(ddxxxx);

			        var ap_vat = parseFloat($("#ap_vat").val());
			        var ap_frome = $("#ap_frome").val();
			        var zz = $("#ap_deduct_ret").val();
			        var ap_vatper = parseFloat($("#ap_vatper").val());
			        var bobb = appay_deduct;
			        var bobb1 = (bobb*zz)/100;
			        var notttt1 = (((bobb*ap_vat)/100)+bobb)*zz/100;
			        var nottttt = notttt1.toFixed(4);
			        if ($("#ap_frome1").val()==1) {
			        var c =  bobb1;
			        }else if ($("#ap_frome1").val()==2){
			        var c = notttt1;
			        }


			        if ($("#ap_frome1").val()==1) {
			        $("#ap_deduct_retper").val(bobb1);
			        }else if ($("#ap_frome1").val()==2){
			        $("#ap_deduct_retper").val(parseFloat(notttt1));
			        }
			        
			        
			        var ap_pay = $("#ap_pay").val();
			        var ap_redownper = $("#ap_redownper").val();
			        var ap_vat = $("#ap_vat").val();
			        var vatbob = (ap_pay-ap_redownper)*ap_vat/100;
			        var bb = vatbob.toFixed(2);
			        $("#ap_vatper").val(bb);
			        
			        var ap_redownper = $("#ap_redownper").val();
			        var ap_wtper = $("#ap_wtper").val();
			        var vvvv = (appay_deduct-ap_redownper)*ap_wtper/100;
			        var xxxx = vvvv.toFixed(2);
			        $("#ap_wtamount").val(xxxx);
			        
			        var ap_amountdown = parseFloat($("#ap_amountdown").val());

			        $('#ap_amount').val(((((appay_deduct-ddxxxx)+vatbob)-c)-vvvv));
			        $('#ap_amount2').val((((((appay_deduct-ddxxxx)+vatbob)-c)-vvvv)-ap_amountdown));

			        var ap_retention_progress = parseFloat($('#ap_retention_progress').val());
			        var ap_retention_acc = parseFloat($('#ap_retention_acc').val());
			        var total_re = ap_retention_progress-ap_retention_acc;
			        var ap_bill_typee = parseFloat($('#ap_bill_typee').val());

			       if(ap_bill_typee=="1"){
			        if (vat>totalamt){
			        swal({
			        title: "ยอดเงินเกิน กรุณาทำรายการใหม่ !",
			        text: "",
			        confirmButtonColor: "#EA1923",
			        type: "error"
			        });
			        $("#ap_pay").val(0);
			        $("#ap_payper").val(0);
			        $("#ap_redownper").val(0);
			        $("#ap_vatper").val(0);
			        $("#ap_deduct_retper").val(0);
			        $("#ap_wtamount").val(0);
			        $("#ap_amount").val(0);
			        $("#ap_amount2").val(0);
			        }

        }
      


       if(ap_bill_typee=="3"){
        if (vat>total_re){
        swal({
        title: "ยอดเงินเกิน กรุณาทำรายการใหม่ !",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#ap_pay").val(0);
        $("#ap_payper").val(0);
        $("#ap_redownper").val(0);
        $("#ap_vatper").val(0);
        $("#ap_deduct_retper").val(0);
        $("#ap_wtamount").val(0);
        $("#ap_amount").val(0);
        $("#ap_amount2").val(0);
        }
      }
			 	   });

			 	   
			       $(document).on('click', 'a#removedetailpo'+row+'', function () { 
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

			       calculateSum();
			       calculateSum1();
			       calculateSum2();
			       calculateSum3();

			       $(".poi_deprice,.deduct_qty,.deduct_pricesub,.deduct_amount").on("keydown keyup", function() {
                      calculateSum();
                      });
			       function calculateSum() {
                      var sum = 0;
                      //iterate through each textboxes and add the values
                      $(".poi_deprice").each(function() {
                      //add only if the value is number
                      if (!isNaN(this.value) && this.value.length != 0) {
                      sum += parseFloat(this.value);
                      $(this).css("background-color", "#FEFFB0");
                      }
                      else if (this.value.length != 0){
                      $(this).css("background-color", "red");
                      }
                      });
                      
                      $("input#sumpriceqty").val(sum.toFixed(2));
                      }

                      $(".deduct_qty").on("keydown keyup", function() {
                      calculateSum1();
                      });
                      function calculateSum1() {
                      var sum1 = 0;
                      //iterate through each textboxes and add the values
                      $(".deduct_qty").each(function() {
                      //add only if the value is number
                      if (!isNaN(this.value) && this.value.length != 0) {
                      sum1 += parseFloat(this.value);
                      $(this).css("background-color", "#FEFFB0");
                      }
                      else if (this.value.length != 0){
                      $(this).css("background-color", "red");
                      }
                      });
                      
                      $("input#deductqty").val(sum1.toFixed(2));
                      }

                      $(".deduct_pricesub").on("keydown keyup", function() {
                      calculateSum2();
                      });
                      function calculateSum2() {
                      var sum2 = 0;
                      //iterate through each textboxes and add the values
                      $(".deduct_pricesub").each(function() {
                      //add only if the value is number
                      if (!isNaN(this.value) && this.value.length != 0) {
                      sum2 += parseFloat(this.value);
                      $(this).css("background-color", "#FEFFB0");
                      }
                      else if (this.value.length != 0){
                      $(this).css("background-color", "red");
                      }
                      });
                      
                      $("input#pricesum").val(sum2.toFixed(2));
                      }

                      $(".deduct_amount").on("keydown keyup", function() {
                      calculateSum3();
                      });
                      function calculateSum3() {
                      var sum3 = 0;
                      //iterate through each textboxes and add the values
                      $(".deduct_amount").each(function() {
                      //add only if the value is number
                      if (!isNaN(this.value) && this.value.length != 0) {
                      sum3 += parseFloat(this.value);
                      $(this).css("background-color", "#FEFFB0");
                      }
                      else if (this.value.length != 0){
                      $(this).css("background-color", "red");
                      }
                      });
                      
                      $("input#deduct_amountsum").val(sum3.toFixed(2));
                      }

                      

		}
      });


$("#selectallpo").click(function(){
      	var poi_id = "<?php echo $key->poi_id; ?>";
      	var poi_matcode = "<?php echo $key->poi_matcode; ?>";
		var poi_matname = "<?php echo $key->poi_matname; ?>";
		var poi_costcode = "<?php echo $key->poi_costcode; ?>";
		var poi_costname = "<?php echo $key->poi_costname; ?>";
		var poi_qty = "<?php echo $key->poi_qty; ?>";
		var poi_unit = "<?php echo $key->poi_unit; ?>";
		var poi_priceunit = "<?php echo $key->poi_priceunit; ?>";
		var poi_amount = "<?php echo $key->poi_amount; ?>";
		var poi_discountper1 = "<?php echo $key->poi_discountper1; ?>";
		var poi_discountper2 = "<?php echo $key->poi_discountper2; ?>";
		var poi_discountper3 = "<?php echo $key->poi_discountper3; ?>";
		var poi_discountper4 = "<?php echo $key->poi_discountper4; ?>";
		var poi_disce = "<?php echo $key->poi_disce; ?>";
		var poi_disamt = "<?php echo $key->poi_disamt; ?>";
		var poi_vat = "<?php echo $key->poi_vat; ?>";
		var poi_netamt = "<?php echo $key->poi_netamt; ?>";
		var poi_ref = "<?php echo $key->poi_ref; ?>";

		addrow(poi_id,poi_matcode,poi_matname,poi_costcode,poi_costname,poi_qty,poi_unit,poi_priceunit,poi_amount,poi_discountper1,poi_discountper2,poi_discountper3,poi_discountper4,poi_disce,poi_disamt,poi_vat,poi_netamt,poi_ref);
		$("#chk<?php echo $key->poi_id; ?>").hide();

		function addrow(poi_id,poi_matcode,poi_matname,poi_costcode,poi_costname,poi_qty,poi_unit,poi_priceunit,poi_amount,poi_discountper1,poi_discountper2,poi_discountper3,poi_discountper4,poi_disce,poi_disamt,poi_vat,poi_netamt,poi_ref){
			var row = ($('#detailpo tr').length-0)+1;
      		var tr = '<tr id="'+row+'">'+
	        '<td>'+row+'<input type="hidden" name="deduct_poi_id[]" value="'+poi_id+'"><input type="hidden" name="deduct_poi_ref[]" value="'+poi_ref+'"></td>'+
	        '<td>'+poi_matcode+'<input type="hidden" class="form-control input-sm text-right" name="deduct_poi_matcode[]" value="'+poi_matcode+'"></td>'+
	        '<td class="text-right">'+poi_qty+'<input type="hidden" class="form-control input-sm text-right" name="deduct_poi_qty[]" value="'+poi_qty+'"></td>'+
	        '<td class="text-right">'+poi_priceunit+'<input type="hidden" class="poi_deprice form-control input-sm text-right" name="deduct_poi_priceunit[]" value="'+poi_priceunit+'" ></td>'+
	        '<td>'+
	        '<select id="deduct_type'+row+'" class="form-control" required="" name="deduct_type[]">'+
	        '<option value=""></option>'+
			'<option value="1">Less Other</option>'+
			'<option value="2">Material Deduct</option>'+
			'</select>'+
			'</td>'+
	        '<td><input type="number" class="deduct_qty form-control input-sm text-right" name="deduct_qty[]" id="deduct_qty'+row+'" value="'+poi_qty+'" readonly></td>'+
	        '<td><input type="number" class="deduct_pricesub form-control input-sm text-right" name="deduct_pricesub[]" id="deduct_pricesub'+row+'" value="'+poi_priceunit+'"></td>'+
	        '<td><input type="number" class="deduct_amount form-control input-sm text-right" name="deduct_amount[]" id="deduct_amount'+row+'" value="'+poi_disamt+'"></td>'+
	        '<td><input type="text" class="form-control input-sm text-right" name="deduct_remark[]"></td>'+
	        '<td>'+
            '<a id="removedetailpo'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
          	'</td>'+
			'</tr>';

			

			 $('#detailpo').append(tr);

			 	$('#deduct_type_button').click(function(event) {
					
			 		$('#deduct_type_button').hide();
			 		$('#rtmodal').hide();
			 		$('#refrest_deduct_type_button').show();
					var deduct_type = parseFloat($('#deduct_type'+row+'').val());
					// alert(deduct_type);
			 	   	if(deduct_type=="1"){
			 	   		var ap_amountdown = parseFloat($('#ap_amountdown').val());
						var deduct_pricesub = parseFloat($('#deduct_pricesub'+row+'').val());
						var deduct_amount = parseFloat($('#deduct_amount'+row+'').val());
			 	   		var sumtypeone = ap_amountdown+deduct_amount;
			 	   		$('#ap_amountdown').val(sumtypeone);
			 	   	}else if(deduct_type=="2"){
			 	   		var ap_deduct = parseFloat($('#ap_deduct').val());
						var deduct_pricesub = parseFloat($('#deduct_pricesub'+row+'').val());
						var deduct_amount = parseFloat($('#deduct_amount'+row+'').val());
			 	   		var sumtypetwo = ap_deduct+deduct_amount;
			 	   		$('#ap_deduct').val(sumtypetwo);
			 	   	}

			 	   	var amt = $("#ap_contractamount").val();
			        var vat = parseFloat($("#ap_pay").val());
			        var ap_deduct = parseFloat($("#ap_deduct").val());
			        var ap_pay = parseFloat($("#ap_pay").val());
			        var ap_progressamount = parseFloat($("#ap_progressamount").val());
			        var ap_progress_bill = parseFloat($("#ap_progress_bill").val());
			        var totalamt = amt-ap_progress_bill;
			        var vattot = (vat*100)/amt;
			        var tt = vattot.toFixed(2);
			        $("#ap_payper").val(tt);
			        
			        var ap_deduct = $('#ap_deduct').val();
			        var appay_deduct = ap_pay-ap_deduct;
			        var ap_redown = $("#ap_redown").val();
			        var vattotxxxx = (appay_deduct*ap_redown)/100;
			        var ddxxxx = vattotxxxx.toFixed(2);
			        $("#ap_redownper").val(ddxxxx);

			        var ap_vat = parseFloat($("#ap_vat").val());
			        var ap_frome = $("#ap_frome").val();
			        var zz = $("#ap_deduct_ret").val();
			        var ap_vatper = parseFloat($("#ap_vatper").val());
			        var bobb = appay_deduct;
			        var bobb1 = (bobb*zz)/100;
			        var notttt1 = (((bobb*ap_vat)/100)+bobb)*zz/100;
			        var nottttt = notttt1.toFixed(4);
			        if ($("#ap_frome1").val()==1) {
			        var c =  bobb1;
			        }else if ($("#ap_frome1").val()==2){
			        var c = notttt1;
			        }


			        if ($("#ap_frome1").val()==1) {
			        $("#ap_deduct_retper").val(bobb1);
			        }else if ($("#ap_frome1").val()==2){
			        $("#ap_deduct_retper").val(parseFloat(notttt1));
			        }
			        
			        
			        var ap_pay = $("#ap_pay").val();
			        var ap_redownper = $("#ap_redownper").val();
			        var ap_vat = $("#ap_vat").val();
			        var vatbob = (ap_pay-ap_redownper)*ap_vat/100;
			        var bb = vatbob.toFixed(2);
			        $("#ap_vatper").val(bb);
			        
			        var ap_redownper = $("#ap_redownper").val();
			        var ap_wtper = $("#ap_wtper").val();
			        var vvvv = (appay_deduct-ap_redownper)*ap_wtper/100;
			        var xxxx = vvvv.toFixed(2);
			        $("#ap_wtamount").val(xxxx);
			        
			        var ap_amountdown = parseFloat($("#ap_amountdown").val());
					ap_amountto = ((((appay_deduct-ddxxxx)+vatbob)-c)-vvvv).toFixed(2); 
					ap_amountto2 = (((((appay_deduct-ddxxxx)+vatbob)-c)-vvvv)-ap_amountdown).toFixed(2);
			        $('#ap_amount').val(ap_amountto);
			        $('#ap_amount2').val(ap_amountto2);

			        var ap_retention_progress = parseFloat($('#ap_retention_progress').val());
			        var ap_retention_acc = parseFloat($('#ap_retention_acc').val());
			        var total_re = ap_retention_progress-ap_retention_acc;
			        var ap_bill_typee = parseFloat($('#ap_bill_typee').val());

			       if(ap_bill_typee=="1"){
			        if (vat>totalamt){
			        swal({
			        title: "ยอดเงินเกิน กรุณาทำรายการใหม่ !",
			        text: "",
			        confirmButtonColor: "#EA1923",
			        type: "error"
			        });
			        $("#ap_pay").val(0);
			        $("#ap_payper").val(0);
			        $("#ap_redownper").val(0);
			        $("#ap_vatper").val(0);
			        $("#ap_deduct_retper").val(0);
			        $("#ap_wtamount").val(0);
			        $("#ap_amount").val(0);
			        $("#ap_amount2").val(0);
			        }

        }
      


       if(ap_bill_typee=="3"){
        if (vat>total_re){
        swal({
        title: "ยอดเงินเกิน กรุณาทำรายการใหม่ !",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#ap_pay").val(0);
        $("#ap_payper").val(0);
        $("#ap_redownper").val(0);
        $("#ap_vatper").val(0);
        $("#ap_deduct_retper").val(0);
        $("#ap_wtamount").val(0);
        $("#ap_amount").val(0);
        $("#ap_amount2").val(0);
        }
      }
			 	   });

			 	   
			       $(document).on('click', 'a#removedetailpo'+row+'', function () { 
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

			       calculateSum();
			       calculateSum1();
			       calculateSum2();
			       calculateSum3();

			       $(".poi_deprice,.deduct_qty,.deduct_pricesub,.deduct_amount").on("keydown keyup", function() {
                      calculateSum();
                      calculateSum1();
			       	  calculateSum2();
			          calculateSum3();
                      });
			       function calculateSum() {
                      var sum = 0;
                      //iterate through each textboxes and add the values
                      $(".poi_deprice").each(function() {
                      //add only if the value is number
                      if (!isNaN(this.value) && this.value.length != 0) {
                      sum += parseFloat(this.value);
                      $(this).css("background-color", "#FEFFB0");
                      }
                      else if (this.value.length != 0){
                      $(this).css("background-color", "red");
                      }
                      });
                      
                      $("input#sumpriceqty").val(sum.toFixed(2));
                      }

                      $(".deduct_qty").on("keydown keyup", function() {
                      calculateSum1();
                      });
                      function calculateSum1() {
                      var sum1 = 0;
                      //iterate through each textboxes and add the values
                      $(".deduct_qty").each(function() {
                      //add only if the value is number
                      if (!isNaN(this.value) && this.value.length != 0) {
                      sum1 += parseFloat(this.value);
                      $(this).css("background-color", "#FEFFB0");
                      }
                      else if (this.value.length != 0){
                      $(this).css("background-color", "red");
                      }
                      });
                      
                      $("input#deductqty").val(sum1.toFixed(2));
                      }

                      $(".deduct_pricesub").on("keydown keyup", function() {
                      calculateSum2();
                      });
                      function calculateSum2() {
                      var sum2 = 0;
                      //iterate through each textboxes and add the values
                      $(".deduct_pricesub").each(function() {
                      //add only if the value is number
                      if (!isNaN(this.value) && this.value.length != 0) {
                      sum2 += parseFloat(this.value);
                      $(this).css("background-color", "#FEFFB0");
                      }
                      else if (this.value.length != 0){
                      $(this).css("background-color", "red");
                      }
                      });
                      
                      $("input#pricesum").val(sum2.toFixed(2));
                      }

                      $(".deduct_amount").on("keydown keyup", function() {
                      calculateSum3();
                      });
                      function calculateSum3() {
                      var sum3 = 0;
                      //iterate through each textboxes and add the values
                      $(".deduct_amount").each(function() {
                      //add only if the value is number
                      if (!isNaN(this.value) && this.value.length != 0) {
                      sum3 += parseFloat(this.value);
                      $(this).css("background-color", "#FEFFB0");
                      }
                      else if (this.value.length != 0){
                      $(this).css("background-color", "red");
                      }
                      });
                      
                      $("input#deduct_amountsum").val(sum3.toFixed(2));
                      }

                      

		}
      });





  </script>
											<?php $n++; } ?>
										</tbody>
										<!-- <tr>
											<td colspan="6" class="text-center">Summary</td>
											
											
											<td><div style="width: 100px;"><input type="text" readonly="" class="form-control input-sm text-right" id="summaryunit" name="summaryunit" value="<?php echo $poi_priceunit; ?>"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly="" class="form-control input-sm text-right" id="summaryamt" name="summaryamt" value="<?php echo $poi_amount; ?>"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly="" class="form-control input-sm text-right" id="summaryd1" name="summaryd1" value="<?php echo $poi_discountper; ?>"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly="" class="form-control input-sm text-right" id="summarydis" name="summarydis" value="<?php echo $poi_disce; ?>"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly="" class="form-control input-sm text-right" id="summarydi" name="summarydi" value="<?php echo $poi_disamt; ?>"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly="" class="form-control input-sm text-right" id="summaryvat" name="summaryvat" value="<?php echo $poi_vat; ?>"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly="" class="form-control input-sm text-right" id="summarytot" name="summarytot" value="<?php echo $poi_netamt; ?>"></div></td>
											<td></td>
											
											
										</tr> -->

								</div>
							</div>


