<?php
 $session_data = $this->session->userdata('sessed_in');
 $compcode = $session_data['compcode'];
foreach ($po_rec as  $value) {
	$poreceiveno = $value->po_reccode;
	$pono = $value->po_pono;
	$vender = $value->venderid;
	$porijectid = $value->project;
	$pp = $this->db->query("select project_name from project where project_id='$value->project'")->result();
	foreach ($pp as $key => $ppj) {
		$project_name = $ppj->project_name;
	}
	if ($value->department=="") {
		$depname = "";
		$depid = "";
	}else{
		$depid = $value->department;
		$dd = $this->db->query("select department_title from department where department_id='$value->department'")->result();
		foreach ($dd as $key => $ddm) {
			$depname = $ddm->department_title;
		}
	}
	$systemname = $value->system;
	$taxno = $value->taxno;
	$taxdate = $value->taxdate;
	$duedate = $value->duedate;
	$docode = $value->docode;
	$flag = $value->flag_control;
} ?>
<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Receive</a></li>
					</div>
				</div>
				<!-- /page header -->
				<div class="content">
					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat border-top-lg border-top-success">
						<div class="panel-heading">
							<h5 class="panel-title">Receive</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-body">
	<form method="post" action="<?php echo base_url(); ?>index.php/inventory_active/insert_po_receive">
							<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่รับสินค้า</label>
						<input type="text" class="form-control input-sm" id="poreccode" value="<?php echo $poreceiveno; ?>" placeholder="เลขที่รับสินค้า" readonly="true">
					</div>
				</div>
				<div class="col-md-4">
					 <div class="form-group">
                                <label>วันที่รับของ: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" readonly="" class="form-control daterange-single" id="porecdate" name="porecdate">
                                </div>
                     </div>
				</div>
				<!-- <div class="col-md-4">
					<div class="form-group" style="margin-top: 30px;"> -->
						<!-- <label class="display-block text-semibold">Not Stock Control</label> -->
						<!-- 	<label class="checkbox-inline">
							<?php if ($flag==""){ ?>
								<input type="checkbox" class="styled" id="flag">
							<?php }else {?>
								<input type="checkbox" checked class="styled" id="flag">
							<?php } ?>
								
								Not Stock Control
							</label>
						</div>
						
				</div> -->
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบสั่งซื้อ</label>
						<input type="text" class="form-control input-sm" id="podate" value="<?php echo $pono; ?>" readonly="true">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">ร้านค้า</label>
						<input type="text" class="form-control input-sm" id="vendername" value="<?php echo $vender; ?>" readonly="true">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">โครงการ</label>
						<input type="text" class="form-control input-sm" id="project" value="<?php echo $project_name; ?>" readonly="true">
						<input type="hidden" id="projectid" value="<?php echo $porijectid; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">แผนก</label>
						<input type="text" class="form-control input-sm" id="departnam" value="<?php echo $depname; ?>" readonly="true">
						<input type="hidden" id="departid" value="<?php echo $depid; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">ระบบ</label>
						<input type="text" class="form-control input-sm" id="system" value="<?php echo $systemname; ?>" readonly="true">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบกำกับ</label>
						<input type="text" class="form-control input-sm" id="taxno" value="<?php echo $taxno ?>" placeholder="Please Input Tax Invoice Number" readonly="true">
					</div>
				</div>
				<div class="col-md-4">
						<label for="">วันที่ใบกำกับ</label>
					<div class="form-group">
						<input type="text" class="form-control input-sm"  placeholder="กรอก Tax Invoice Date" value="<?php echo $taxdate; ?>" id="taxdate" readonly="true">
					</div>
				</div>
				<div class="col-md-4">
						<label for="">วันที่ส่งของ</label>
					<div class="form-group">
						<input type="text" class="form-control input-sm" value="<?php echo $duedate; ?>" readonly="true" placeholder="Please Input DueDate" id="duedate" readonly="true">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบส่งของ</label>
						<input type="text" class="form-control input-sm" id="docode" value="<?php echo $docode; ?>" placeholder="Please Input D/O" readonly="true">
					</div>
				</div>
				<div class="col-md-2">
				<label for="">ประเภท</label>
					<div class="input-group">
						<select class="form-control"  name="type" id="type">
				              	<?php if($system == 'OH'){ ?><option value="OH" selected>Other</option><?php } else { ?><option value="OH">Other</option><?php }?>
				            </select>
					</div>
				</div>
				<!--<div class="col-md-4">
						<label for="">D/O Date</label>
					<div class="form-group">
						<input type="text" class="form-control input-sm"  placeholder="กรอก D/O Invoice Date" id="dodate">
					</div>
				</div>-->

			</div>
			<div class="form-group">
				<table class="table table-bordered table-striped table-xxs">
				<thead>
					<tr>
						<th width="15%">Material Code</th>
						<th width="20%">Material Name</th>
						<th width="10%"> Cost Code</th>
						<th width="20%">Cost Name</th>
						<th width="15%">Warehouse</th>
						<th width="5%">QTY</th>
						<th width="5%">Receive</th>
						<th width="5%">Balance</th>
						<th width="5%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $n=1; foreach($resi as $val){
						$q = $this->db->query("select whname from ic_proj_warehouse where whcode='$val->ic_warehouse'")->result();
						 foreach ($q as $vale) {
						$whname = $vale->whname;
						}
					?>
						 <tr>

			                <?php $qty = $val->poi_qty;
			                $rece = $val->poi_receive;
			                $total = $qty-$rece;?>
												<th scope="row"><?php echo $val->poi_matcode;?><input type="hidden" name="matcode[]" value="<?php echo $val->poi_matcode;?>"></th>
											 <td><?php echo $val->poi_matname; ?><input type="hidden" name="matname[]" value="<?php echo $val->poi_matname; ?>"></td>
											 <td><?php echo $val->poi_costcode; ?><input type="hidden" name="costcode[]" value="<?php echo $val->poi_costcode; ?>"></td>
											 <td><?php echo $val->poi_costname ?><input type="hidden" name="costname[]" value="<?php echo $val->poi_costname ?>"></td>
											 <td><?php echo $whname; ?></td>
											 <td><?php echo $val->poi_qty; ?><input type="hidden" id="qtylist<?php echo $val->poi_id;?>" name="qty[]" value="<?php echo $val->poi_qty; ?>"></td>
											 <td id="rece<?php echo $val->poi_id;?>"><?php if($val->poi_receive == "0"){ echo "0";}else{$num = $val->poi_qty-$val->poi_receive; $numrec = $val->poi_qty-$num; echo $numrec;}?></td>

											 <td id="balance<?php echo $val->poi_id;?>"><?php if($val->poi_receive == "0"){ echo "0";}else{$num = $val->poi_qty-$val->poi_receive; echo $val->poi_receivetot;}   ?></td>
												<td>
													<a id="refee" class="label label-block label-default label-xs">รออนุมัติ</a>
													<input type="hidden" id="receinput<?php echo $val->poi_id;?>" name="receive[]" value="<?php if($val->poi_receive == "0"){ echo "0";}else{$num = $val->poi_qty-$val->poi_receive; $numrec = $val->poi_qty-$num; echo $numrec;}?>">
											 <input type="hidden" id="balanceinput<?php echo $val->poi_id;?>" name="balance[]" value="<?php if($val->poi_receive == "0"){ echo "0";}else{$num = $val->poi_qty-$val->poi_receive; echo $num;}   ?>">
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

											 </td>
			               </tr>
					<?php $n++; } ?>
				</tbody>
				</table>
			</div>
				<div class="text-right">
				<!-- <?php if($saveedit=="e"){ ?>
						<button type="button" class="btn btn-success" id="savee"> Save</button>
					<?php } ?> -->
					 <!-- <a href="<?php echo base_url(); ?>inventory/print_inventory/<?php echo $poreceiveno; ?>/<?php echo $pono; ?>" class="preload btn btn-danger" name="button"><i class="icon-shredder"></i> Print</a> -->
					<!-- <a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&amp;stimulsoft_report_key=receipt_ic.mrt&amp;doccode=<?php echo $poreceiveno; ?>" target="_blank" class="btn btn-info" name="button"><i class=" icon-printer2"></i> พิมพ์</a> -->
					<a href="<?php echo base_url();?>report/viewerloadpo?module=ic&typ=receipt_ot&reportname=receipt_ic_other.mrt&get_doc=<?php echo $poreceiveno; ?>&compcode=<?=$compcode;?>" target="_blank" class="btn btn-info" name="button"><i class=" icon-printer2"></i> พิมพ์</a>
					<a id="fa_close" href="<?php echo base_url(); ?>inventory/openreceipt/n" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
          			
				</div>
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
                        <input type="number" class="on form-control input-sm" id="remark<?php echo $val2->poi_id; ?>">
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