<?php foreach ($res as $val) {
	$pono = $val->po_pono;
	$vender = $val->po_vender;
	$po_venderid = $val->po_venderid;
	$porijectid = $val->project_id;
	$projcode = $val->project_code;
	$project_name = $val->project_name;
	$depid = $val->po_department;
	// $depname = $val->department_title;
	$systemname = $val->systemname;
	$crterm = $val->po_trem;
	$deli = $val->po_deliverydate;
} ?>
<?php foreach ($po_rec as  $value) {
	$poreceiveno = $value->po_reccode;
	$taxno = $value->taxno;
	$taxdate = $value->taxdate;
	$duedate = $value->duedate;
	$docode = $value->docode;
	$flag = $value->flag_control;
} ?>
<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->

				<!-- /page header -->
				<div class="content">
					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
	
						<div class="panel-body">
	<form id="return" name="return" method="post" action="<?php echo base_url(); ?>index.php/inventory_active/return_po">
							<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Receive No.</label>
						<input type="text" class="form-control" id="poreccode" name="poreccode" value="<?php echo $poreceiveno; ?>" placeholder="Receive No." readonly="true">
					</div>
				</div>
				<div class="col-md-3">
					 <div class="form-group">
                                <label>Receive Date: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="porecdate" name="porecdate">
                                </div>
                     </div>
				</div>
				<div class="col-md-3">
					<div class="form-group" style="margin-top: 30px;">
						<!-- <label class="display-block text-semibold">Not Stock Control</label> -->
							<label class="checkbox-inline">
							<?php if ($flag==""){ ?>
								<input type="checkbox" class="styled" id="flag" disabled="true">
							<?php }else {?>
								<input type="checkbox" checked class="styled" id="flag" disabled="true">
							<?php } ?>
								
								Not Stock Control
							</label>
						</div>
						<input type="hidden" class="styled" id="inputflag" name="flag" value="">
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>retrun No.</label>
						<input type="text" class="form-control" readonly id="rtcode">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">PO No.</label>
						<input type="text" class="form-control" id="podate" name="podate" value="<?php echo $pono; ?>" readonly="true">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Seller / Vender</label>
						<input type="text" class="form-control" name="vendername" id="vendername" value="<?php echo $vender; ?>" readonly="true">
						<input type="hidden" id="venderid" name="venderid" value="<?php echo $po_venderid; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Project Name</label>
						<input type="text" class="form-control" id="project" name="project" value="<?php echo $project_name; ?>" readonly="true">
						<input type="hidden" id="projectid" name="projectid" value="<?php echo $porijectid; ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<!-- <label for="">Dapartment Name</label> -->
						<!-- <input type="text" class="form-control" id="departnam" name="departnam" value="<?php echo $depname; ?>" readonly="true"> -->
						<!-- <input type="hidden" id="departid" name="departid" value="<?php echo $depid; ?>"> -->
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">System Type</label>
						<input type="text" class="form-control" id="system" name="system" value="<?php echo $systemname; ?>" readonly="true">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Invoice No.</label>
						<input type="text" class="form-control" id="taxno" name="taxno" value="<?php echo $taxno ?>" placeholder="Please Input Tax Invoice Number">
					</div>
				</div>
				<div class="col-md-3">
						<label for="">Invoice Date</label>
					<div class="form-group">
						<input type="text" class="form-control" readonly  placeholder="กรอก Tax Invoice Date" value="<?php echo $taxdate; ?>" id="taxdate" name="taxdate">
					</div>
				</div>
				<div class="col-md-3">
						<label for="">Delivery Date</label>
					<div class="form-group">
						<input type="text" class="form-control" value="<?php echo $duedate; ?>" readonly="true" placeholder="Please Input DueDate" id="duedate" name="duedate">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Delivery No.</label>
						<input type="text" class="form-control" readonly id="docode" name="docode" value="<?php echo $docode; ?>" placeholder="Please Input D/O">
					</div>
				</div>
				<div class="col-md-2">
				<label for="">Credit Term</label>
					<div class="input-group">
						<input type="text" class="form-control" id="term" name="term" readonly="true" value="<?php echo $crterm; ?>" placeholder="Please Input Term">
						<span class="input-group-addon">วัน</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group" style="margin-top: 25px;">
						<button type="button" id="returenall" class="btn btn-warning">Return All</button>
					</div>
				</div>

			</div>
			<div class="form-group">
				<table class="table table-bordered table-striped table-xxs">
				<thead>
					<tr>
					<th width="2%">No.</th>
						<th width="15%">Material Code</th>
						<th width="20%">Material Name</th>
						<th width="10%"> Cost Code</th>
						<!-- <th width="20%">Cost Name</th> -->
						<!-- <th width="15%">Warehouse</th> -->
						<!-- <th width="5%">QTY</th> -->
						<th width="10%">Receive QTY</th>
						<th width="10%">Return QTY</th>
						<!-- <th width="5%">Action</th> -->
					</tr>
				</thead>
				<tbody>
					<?php $n=1; foreach($resi as $val){
						
						if ($val->ic_warehouse=="DEPOVERHEAD") {
							$whname = "OVERHEAD";
						}else{
							$q = $this->db->query("select whname from ic_proj_warehouse where whcode='$val->ic_warehouse'")->result();
							foreach ($q as $vale) {
								$whname = $vale->whname;
							}
						}


						 
					?>
						 <tr>

			                <?php $qty = $val->poi_qty;
			                $rece = $val->poi_receive;
			                $total = $qty-$rece;?>
			                <th><?php echo $n; ?></th>
												<th scope="row"><?php echo $val->poi_matcode;?><input type="hidden" name="matcode[]" value="<?php echo $val->poi_matcode;?>"></th>
											 <td><?php echo $val->poi_matname; ?><input type="hidden" name="matname[]" value="<?php echo $val->poi_matname; ?>"></td>
											 <td><?php echo $val->poi_costcode; ?><input type="hidden" name="costcode[]" value="<?php echo $val->poi_costcode; ?>"><input type="hidden" name="costname[]" value="<?php echo $val->poi_costname ?>"></td>
											 <!-- <td><?php echo $val->poi_costname ?><input type="hidden" name="costname[]" value="<?php echo $val->poi_costname ?>"></td> -->
											 <!-- <td><?php echo $whname; ?></td> -->
											 <!-- <td><?php echo $val->poi_qty; ?><input type="hidden" id="qtylist<?php echo $val->poi_id;?>" name="qty[]" value="<?php echo $val->poi_qty; ?>"></td> -->
											 <td id="rece<?php echo $val->poi_id;?>"><?php echo $val->poi_receive; ?></td>

											 <td id="balance<?php echo $val->poi_id;?>"><input type="number" class="form-control input-sm" id="returni<?php echo $n;?>" name="returni[]" value="0"></td>
												<!-- <td>
													<a id="refee" class="label label-block label-default label-xs">รับสินค้าแล้ว</a> -->
													<input type="hidden" id="receinput<?php echo $val->poi_id;?>" name="receive[]" value="<?php if($val->poi_receive == "0"){ echo "0";}else{$num = $val->poi_qty-$val->poi_receive; $numrec = $val->poi_qty-$num; echo $numrec;}?>">
											<input type="hidden" id="qtylist<?php echo $val->poi_id;?>" name="qty[]" value="<?php echo $val->poi_qty; ?>">
											 <input type="hidden" id="balanceinput<?php echo $val->poi_id;?>" name="balance[]" value="<?php echo $val->poi_receivetot; ?>">
											 <input type="hidden" name="unit[]" id="unit<?php echo $val->poi_id;?>" value="<?php echo $val->poi_unit; ?>">
											 <input type="hidden" name="priceunit[]" id="priceunit<?php echo $val->poi_id;?>" value="<?php echo $val->poi_priceunit;?>">
											 <input type="hidden" name="amount[]" id="amount<?php echo $val->poi_id;?>" value="<?php echo $val->poi_amount;?>">
											 <input type="hidden" name="dis1[]" id="dis1<?php echo $val->poi_id;?>" value="<?php echo $val->poi_discountper1;?>">
											 <input type="hidden" name="dis2[]" id="dis2<?php echo $val->poi_id;?>" value="<?php echo $val->poi_discountper2;?>">
											 <input type="hidden" name="disamt[]" id="disamt<?php echo $val->poi_id;?>" value="<?php echo $val->poi_disamt;?>">
											 <input type="hidden" name="vat[]" id="vat<?php echo $val->poi_id;?>" value="<?php echo $val->poi_vat;?>">
											 <input type="hidden" name="netamt[]" id="netamt<?php echo $val->poi_id;?>" value="<?php echo $val->poi_netamt;?>">
											 <input type="hidden" name="disex[]" id="disex<?php echo $val->poi_id;?>" value="<?php echo $val->po_disex;?>">
											 <input type="hidden" name="poid[]" id="poid<?php echo $val->poi_id;?>" value="<?php echo $val->poi_id;?>">
											 <input type="hidden" name="revpoid[]" id="revpoid<?php echo $val->poi_id;?>" value="<?php echo $val->poi_item;?>">

											 <!-- </td> -->
			               </tr>
			    <script>
			    	$("#returenall").click(function(){
			    		$("#returni<?php echo $n;?>").val("<?php if($val->poi_receive == "0"){ echo "0";}else{$num = $val->poi_qty-$val->poi_receive; $numrec = $val->poi_qty-$num; echo $numrec;}?>");
			    	});
			    </script>

					<?php $n++; } ?>
				</tbody>
				</table>
			</div>
				<div class="text-right">
				<?php if($saveedit=="e"){ ?>
						<button type="button" class="btn btn-success" id="savee"><i class="icon-floppy-disk"></i> Save</button>
					<?php } ?>
					 <!-- <a href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=receipt.mrt&doccode=<?php echo $poreceiveno; ?>&pono=<?php echo $pono; ?>" class="preload btn btn-primary" name="button"><i class="icon-printer4"></i> Print</a> -->
					 <a href="<?php echo base_url();?>report/viewerload?type=ic&typ=ic_return&var1=<?php echo $poreceiveno; ?>&var2=<?php echo $pono; ?>&var3=<?=$compcode;?>" class="preload btn btn-primary" name="button"><i class="icon-printer4"></i> Print</a>
	
					  <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $pono; ?>/<?php echo $porijectid; ?>" class="preload btn btn-danger" name="button"><i class="icon-close2"></i> Close</a>
          			<!-- <button type="button" class="print btn btn-success" name="button">พิมพ์</button> -->
				</div>
				<div id="log"></div>
		</form>
<?php  $n =1; foreach ($resi as $val2) { ?>
<div class="modal fade" id="modaleditdetail<?php echo $val2->poi_id;?>" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">รับสินค้ารายการ <?php echo $val2->poi_matname; ?> <?php echo $val2->poi_ref; ?></h4>
            </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <!-- <div class="form-group">
                      <p>Material Name: <?php echo $val2->poi_matname; ?></p>
                      <br>
                      <p>จำนวนที่สั่งซื้อ: <?php echo $val2->poi_qty; ?></p>
                      <p>จำนวนคงค้าง: <?php if($val2->poi_receive == "0"){ echo $val2->poi_qty;}else{$num = $val2->poi_qty-$val2->poi_receive; echo $num;}   ?></p>
                      <p>จำนวนที่รับแล้ว: <?php if($val2->poi_receive == "0"){ echo "0";}else{$num = $val2->poi_qty-$val2->poi_receive; $numrec = $val2->poi_qty-$num; echo $numrec;}?></p>
                    </div> -->
										<div class="col-md-12">
											<div class="content-group">
												<h5 class="h5qty<?php echo $val2->poi_id;?> text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> <?php echo $val2->poi_qty; ?></h5>
												<span class="text-muted text-size-small">จำนวนที่สั่งซื้อ</span>
												<input type="hidden" id="textqty<?php echo $val2->poi_id;?>" value="<?php echo $val2->poi_qty; ?>">
											</div>
										</div>

										<div class="col-md-12">
											<div class="content-group">
												<h5 class="h5bal<?php echo $val2->poi_id;?> text-semibold no-margin"><i class="icon-calendar52 position-left text-slate"></i> <?php if($val2->poi_receive == "0"){ echo $val2->poi_qty;}else{$num = $val2->poi_qty-$val2->poi_receive; echo $num;}   ?></h5>
												<span class="text-muted text-size-small">จำนวนคงค้าง</span>
												<input type="hidden" id="textbal<?php echo $val2->poi_id;?>" value="<?php if($val2->poi_receive == "0"){ echo $val2->poi_qty;}else{$num = $val2->poi_qty-$val2->poi_receive; echo $num;}   ?>">
											</div>
										</div>

										<div class="col-md-12">
											<div class="content-group">
												<h5 class="h5rec<?php echo $val2->poi_id;?> text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> <?php if($val2->poi_receive == "0"){ echo "0";}else{$num = $val2->poi_qty-$val2->poi_receive; $numrec = $val2->poi_qty-$num; echo $numrec;}?></h5>
												<span class="text-muted text-size-small">จำนวนที่รับแล้ว</span>
												<input type="hidden" id="textrecevi<?php echo $val2->poi_id;?>" value="<?php if($val2->poi_receive == "0"){ echo "0";}else{$num = $val2->poi_qty-$val2->poi_receive; $numrec = $val2->poi_qty-$num; echo $numrec;}?>">
											</div>
										</div>
                    <!--  -->
                  </div>
                   <div class="col-md-6">
                        <strong><p>จำนวนที่รับสินค้า</p></strong>
                        <input type="number" class="on form-control" id="remark<?php echo $val2->poi_id; ?>">
                        <input type="hidden" id="id<?php echo $val2->poi_id; ?>" value="<?php echo $val2->poi_id; ?>">
                        <input type="hidden" id="ref<?php echo $val2->poi_id; ?>" value="<?php echo $val2->poi_ref; ?>">
                        <input type="hidden" id="pqty<?php echo $val2->poi_id; ?>" value="<?php echo $val2->poi_qty; ?>">
                        <button id="sitem<?php echo $val2->poi_id;?>" class="btnsend btn btn-primary btn-xs" style="margin-top:10px;">รับสินค้า</button>
                    </div>
                </div>
              </div>
               <div class="modal-footer">
                  <button type="button" class="btnclose btn btn-default" data-dismiss="modal">ปิด</button>

                </div>
              </div>
          </div>
        </div>
      </div>
       <script>
       $("#remark<?php echo $val2->poi_id; ?>").keyup(function() {
       	if (<?php echo $val2->poi_qty; ?>< $('#remark<?php echo $val2->poi_id; ?>').val())
      {
        alert('ไม่สามารถรับสินค้าเกินได้');
        $("#remark<?php echo $val2->poi_id; ?>").val(0);
       	$(".h5bal<?php echo $val2->poi_id;?>").text(<?php if($val2->poi_receive == "0"){ echo $val2->poi_qty;}else{$num = $val2->poi_qty-$val2->poi_receive; echo $num;}   ?>);
       	$(".h5rec<?php echo $val2->poi_id;?>").text(<?php if($val2->poi_receive == "0"){ echo "0";}else{$num = $val2->poi_qty-$val2->poi_receive; $numrec = $val2->poi_qty-$num; echo $numrec;}?>);
      }else if($("#textrecevi<?php echo $val2->poi_id;?>").val()!="0"){

      	 var modalqty  = parseInt($("#textqty<?php echo $val2->poi_id;?>").val());
       	 var modalbalan = parseInt($("#textbal<?php echo $val2->poi_id;?>").val());
       	 var inputmodal = parseInt($("#remark<?php echo $val2->poi_id; ?>").val());
       	 var receive = parseInt($("#textrecevi<?php echo $val2->poi_id;?>").val());
       	 var totqty =  parseInt(modalbalan-inputmodal);
       	 var totreceive = parseInt(receive+inputmodal);
       	$(".h5bal<?php echo $val2->poi_id;?>").text(totqty);
       	$(".h5rec<?php echo $val2->poi_id;?>").text(totreceive);
      }
      else if($("#textrecevi<?php echo $val2->poi_id;?>").val()=="0"){

       	 var modalqty  = parseInt($("#textqty<?php echo $val2->poi_id;?>").val());
       	 var modalbalan = parseInt($("#textbal<?php echo $val2->poi_id;?>").val());
       	 var inputmodal = parseInt($("#remark<?php echo $val2->poi_id; ?>").val());
       	 var receive = parseInt($("#textrecevi<?php echo $val2->poi_id;?>").val());
       	 var totqty =  parseInt(modalqty-inputmodal);
       	 var totreceive = parseInt(receive+inputmodal);
       	$(".h5bal<?php echo $val2->poi_id;?>").text(totqty);
       	$(".h5rec<?php echo $val2->poi_id;?>").text(totreceive);
       }
       });
  $("#sitem<?php echo $val2->poi_id;?>").click(function(){
  	if ($("#remark<?php echo $val2->poi_id;?>").val()=="0") {
  		$("#receinput<?php echo $val->poi_id;?>").val("0");
  		$("#rece<?php echo $val2->poi_id;?>").text("0");
  		$("#balanceinput<?php echo $val2->poi_id;?>").val("0");
		$("#balance<?php echo $val2->poi_id;?>").text("0");
		$('#modaleditdetail<?php echo $val2->poi_id;?>').modal('toggle');
  	}else if (<?php echo $val2->poi_receive; ?>=="0") {
      if (<?php echo $val2->poi_qty; ?>< $('#remark<?php echo $val2->poi_id; ?>').val())
      {
        alert('ไม่สามารถรับสินค้าเกินได้');
      }else if($('#remark<?php echo $val2->poi_id; ?>').val()=="0"){
      	$("#balance<?php echo $val2->poi_id;?>").text("0");
      	$('#modaleditdetail<?php echo $val2->poi_id;?>').modal('toggle');
      }else
      {

      	var qty = parseInt($("#pqty<?php echo $val2->poi_id; ?>").val());
      	var inputmodal = parseInt($("#remark<?php echo $val2->poi_id; ?>").val());
      	var tot = parseInt(qty-inputmodal);
      	$("#receinput<?php echo $val2->poi_id;?>").val(inputmodal);
      	$("#balanceinput<?php echo $val2->poi_id;?>").val(tot);
      	$("#rece<?php echo $val2->poi_id;?>").text(inputmodal);
      	$("#balance<?php echo $val2->poi_id;?>").text(tot);
      	$('#modaleditdetail<?php echo $val2->poi_id;?>').modal('toggle');

      }
    }
    else
    {
     if((<?php echo $val2->poi_qty; ?>-<?php echo $val2->poi_receive; ?>)<$('#remark<?php echo $val2->poi_id; ?>').val())
     {
      alert('ไม่สามารถรับสินค้าเกินได้');
      }
      else
      {

      	var inputmodal = parseInt($("#remark<?php echo $val2->poi_id; ?>").val());
      	var balance = parseInt($("#balanceinput<?php echo $val2->poi_id;?>").val());
      	var receive = parseInt($("#receinput<?php echo $val2->poi_id;?>").val());
      	var tot = parseInt(balance-inputmodal);
      	var receivettot = parseInt(receive+inputmodal);
      	$("#receinput<?php echo $val2->poi_id;?>").val(receivettot);
      	$("#balanceinput<?php echo $val2->poi_id;?>").val(tot);
      	$("#rece<?php echo $val2->poi_id;?>").text(receivettot);
      	$("#balance<?php echo $val2->poi_id;?>").text(tot);
      	$('#modaleditdetail<?php echo $val2->poi_id;?>').modal('toggle');
     }
    }
  });
  </script>
  <?php $n++; } ?>

						</div>

					</div>
					<!-- /highlighting rows and columns -->
				</div>
				<!-- /content area -->
</div>
<script>
// $(document).ready(function() {
// 	// alert('fff');
// });
	$(".styled, .multiselect-container input").uniform({
        radioClass: 'choice'
    });
     $("#flag").click(function(){
        if ($("#flag").prop("checked")) {
            $("#inputflag").val("Y");
        }else{
            $("#inputflag").val("");
        }

      });
</script>

 <script>
    	$("#savee").click(function(e){

					var frm = $('#return');
				    frm.submit(function (ev) {
				        $.ajax({
				            type: frm.attr('method'),
				            url: frm.attr('action'),
				            data: frm.serialize(),
				            				success: function (data) {
												swal({
											            title: "RETURN "+data,
											            text: "Save Completed!!.",
											            // confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
												$("#rtcode").val(data);
												$("#savee").prop('disabled',true);
												//  setTimeout(function() {
												// window.location.href = "<?php echo base_url(); ?>inventory/edit_receive_po_header/"+data+"/"+$("#pono").val();
												// }, 500);
				            }
				        });
				        ev.preventDefault();

				    });




	 $("#return").submit(); //Submit  the FORM
});
    </script>