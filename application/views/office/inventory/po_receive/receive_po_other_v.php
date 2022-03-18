<style type="text/css">
  selelct:required {
  box-shadow: 4px 4px 20px rgba(200, 0, 0, 0.85);

}
</style>

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
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Receive Other</a></li>
					</div>
				</div>
				<!-- /page header -->
				<div class="content">
					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat border-top-lg border-top-success">
						<div class="panel-heading">
							<h5 class="panel-title">Receive Other</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-body">
	<form name="contactForm1" id="contactForm1" method="post" action="<?php echo base_url(); ?>inventory_active/ins_receive_other">
							<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่รับสินค้า</label>
						<input type="text" class="form-control" id="poreccode" name="poreccode" placeholder="เลขที่รับสินค้า" readonly="true">
					</div>
				</div>
				<div class="col-md-4">
					 <div class="form-group">
                                <label>วันที่รับของ: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="date" class="form-control" id="porecdate" name="porecdate">
                                </div>
                     </div>
				</div>
				<!-- <div class="col-md-4"> -->
					<!-- <div class="form-group" style="margin-top: 30px;"> -->
						<!-- <label class="display-block text-semibold">Not Stock Control</label> -->
							<!-- <label class="checkbox-inline"> -->
								<!-- <input type="checkbox" class="styled" id="flag"> -->
								<!-- Not Stock Control -->
							<!-- </label> -->
						<!-- </div> -->
						<!-- <input type="hidden" class="styled" id="inputflag" name="flag" value=""> -->
				<!-- </div> -->
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบสั่งซื้อ</label>
						<input type="text" class="form-control" id="pono" name="pono" value="">
					</div>
				</div>
				<div class="col-md-4">
				<label for="">ร้านค้า</label>
					<div class="input-group">
						<input type="text" class="form-control" id="venname" name="venname" readonly="true">
						<div class="input-group-btn">
							<button type="button" class="ven btn btn-default" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></button>
						</div>
					</div>
				</div>
				<!-- <div class="col-md-4">
					<div class="form-group">
															 <label>วันที่สั่งซื้อ: </label>
															 <div class="input-group">
																 <span class="input-group-addon"><i class="icon-calendar22"></i></span>
																 <input type="text" class="form-control" id="podate" name="podate" readonly="readonly" value="">
															 </div>
										</div>
				</div> -->
			</div>
			<div class="row">
				<div class="col-md-4">
				<label for="">โครงการ</label>
					<div class="form-group">
						<input type="text" class="form-control" id="projectname" value="<?php echo $projectname; ?>" readonly="true">
						<input type="hidden" id="projectid" name="projectid" value="<?php echo $id; ?>">
						<input type="hidden" id="projectcode" name="projectcode" value="<?php echo $projectcode; ?>">
						<!-- <div class="input-group-btn">
							<button type="button" class="openproj btn btn-default" data-toggle="modal" data-target="#openproj"><i class="icon-search4"></i></button>
						</div> -->
					</div>
				</div>
				<div class="col-md-4">
					<label for="">แผนก</label>
					<div class="form-group">
						<input type="text" class="form-control" id="depname" value="" readonly="true">
						<input type="hidden" id="departid" name="departid" value="">
						<!-- <div class="input-group-btn">
							<button type="button" class="opendepart btn btn-default" data-toggle="modal" data-target="#opendepart"><i class="icon-search4"></i></button>
						</div> -->
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
							<label for="">ระบบ</label>
								<select class="form-control" name="system" id="system">
									<?php foreach ($item as $key => $value) {
                                    $q = $this->db->query("SELECT * from system where systemcode='$value->projectd_job'")->result();
                                    foreach ($q as $key => $v) {  ?>
                                	<option value="<?php echo $value->projectd_job; ?>"><?php echo $v->systemname; ?></option>
                                	<?php } } ?>
								</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบกำกับ</label>
						<input type="text" class="form-control" id="taxno" name="taxno" placeholder="Please Input Tax Invoice Number">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
                                <label>วันที่ใบกำกับ: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="date" class="form-control"  id="taxdate" name="taxdate">
                                </div>
                     </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
                                <label>วันที่ส่งของ: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="date" class="form-control" id="duedate" name="duedate">
                                </div>
                     </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบส่งของ</label>
						<input type="text" class="form-control" id="docode" name="docode" placeholder="Please Input D/O">
					</div>
				</div>
				<div class="col-md-2">
				<label for="">ประเภท</label>
					<div class="input-group">
						<select class="form-control"  name="type" id="type">
								<!-- <?php if($system == 'RC'){ ?><option value="RC" selected>PO Receive</option><?php } else { ?><option value="RC">PO Receive</option><?php }?>
				              	<?php if($system == 'RI'){ ?><option value="RI" selected>Return from Issue</option><?php } else { ?><option value="RI">Return from Issue</option><?php }?>
				              	<?php if($system == 'RT'){ ?><option value="RT" selected>Return from Transfer</option><?php } else { ?><option value="RT">Return from Transfer</option><?php }?> -->
				              	<?php if($system == 'OH'){ ?><option value="OH" selected>Other</option><?php } else { ?><option value="OH">Other</option><?php }?>
				            </select>
					</div>
				</div>
				<div class="col-md-4">
				<!-- 	<div class="form-group" style="margin-top: 30px;">
							<label class="checkbox-inline">
								<input type="checkbox" class="styled" id="allreceive">
								รับสินค้าทั้งหมด
							</label>
						</div> -->
						<input type="hidden" class="styled" id="inputreceiveall" name="flagall" value="">
				</div>

			</div>
			<div class="form-group">
				<div class="text-left">
					 <a  id=""  class="addrows btn bg-info"><i class="icon-plus2"></i> Add items</a>
				</div>
			</div>
			<div class="form-group">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-xxs">
				<thead>
					<tr>
						<th width="20%">Material Code</th>
						<th width="20%">Material Name</th>
						<th width="10%">Cost Code</th>
						<th width="10%">Warehouse</th>
						<th width="10%">QTY</th>
						<th width="10%">Unit</th>
						<th width="10%">Price/Unit</th>
						<th width="10%">Amount</th>
						<th width="5%">Action</th>
					</tr>
				</thead>
				<tbody id="addtav">
				<tr>
					<td colspan="9" class="text-center">No Data</td>
				</tr>
						<!--  <tr>
			                    <th scope="row">
			                    <div class="input-group">
			                    	<input type="text" readonly class="form-control input-xs" name="matcode[]" value="">
			                    	<div class="input-group-btn">
			                    		<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#"><i class="icon-search4"></i></button>
			                    	</div>
			                    </div>
			                    </th>
				                <td><input type="text" name="matname[]" readonly class="form-control input-sm" value=""></td>
				                <td>
				                <div class="input-group">
				                	<input type="text" name="costcode[]" readonly class="form-control input-xs" value="">
				                	<div class="input-group-btn">
			                    		<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#"><i class="icon-search4"></i></button>
			                    	</div>
				                </td>
				                <td><input type="text" name="costname[]" readonly class="form-control input-sm" value=""></td>
				                <td>
									<select class="form-control input-sm css-require" id="warehouse" name="warehouse[]"  required="required">
											<?php foreach ($getwarehouse as $key => $value) { ?>	
											<option value="<?php echo $value->whcode; ?>"><?php echo $value->whname; ?></option>
											<?php } ?>
									</select>
				                </td>
				                <td><input type="number"  class="form-control input-sm" name="inputreceipt[]" id="inputreceipt" value=""></td>
			                    <td>
			                      	<div id="cc"><button type="button" id="refee" class="label label-block label-danger label-xs" data-toggle="modal" data-target="#modaleditdetail">Delete</button></div>
									<input type="hidden" id="receinput" name="receive[]" value="">
				                    <input type="hidden" name="balance[]"  id="balanceinput" value="">
				                    <input type="hidden" name="unit[]" id="unit" value="">
				                    <input type="hidden" name="priceunit[]" id="priceunit" value="">
				                    <input type="hidden" name="amount[]" id="amount" value="">
				                    <input type="hidden" name="dis1[]" id="dis1" value="">
				                    <input type="hidden" name="dis2[]" id="dis2" value="">
				                    <input type="hidden" name="disamt[]" id="disamt" value="">
				                    <input type="hidden" name="vat[]" id="vat" value="">
				                    <input type="hidden" name="netamt[]" id="netamt" value="">
				                    <input type="hidden" name="disex[]" id="disex" value="">
				                    <input type="hidden" name="poid[]" id="poid" value="">
									
			                   </td>
			               </tr> -->
				</tbody>
				</table>
				</div>
			</div>
				<div class="text-right">
					  <button type="button" id="saveh" disabled="" class="btn bg-success" id=""><i class="icon-floppy-disk"></i> Save</button>
					 <a id="fa_close" href="<?php echo base_url(); ?>inventory/openreceipt/n" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
          			<!-- <button type="button" class="print btn btn-success" name="button">พิมพ์</button> -->
				</div>
		</form>
<div id="modalmat"></div>
<div id="modalcost"></div>
 <div class="modal fade" id="openproj" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Project</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_project">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<!-- modal  แผนก-->
 <div class="modal fade" id="opendepart" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Department</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_department">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<div id="openvender" class="modal fade" data-backdrop="false">
				 					 <div class="modal-dialog modal-lg">
				 						 <div class="modal-content">
				 							 <div class="modal-header">
				 								 <button type="button" class="close" data-dismiss="modal">&times;</button>
				 								 <h5 class="modal-title">Select Vender</h5>
				 							 </div>

				 							 <div class="modal-body">
				 								 <div id="loadvender">

				 								 </div>
				 							 </div>
				 							 <br>
				 							 <div class="modal-footer">
				 								 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
				 								 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
				 							 </div>
				 						 </div>
				 					 </div>
				 				 </div>
				 				 <!-- /full width modal -->
<script type="text/javascript">
		$(".openproj").click(function(){
      $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
    });
    $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });
    $(".ven").click(function(){
			$("#loadvender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
		});
</script>

<script type="text/javascript">
	$(".addrows").click(function(){
		addrow();
	});
	function addrow(){
		$('td[class="text-center"]').closest('tr').remove();
		var row = ($('#addtav tr').length-0)+1;
		var tr =	'<tr>'+
			                    '<th scope="row">'+
			                    '<div class="input-group">'+
			                    	'<input type="text" readonly class="form-control input-xs" id="matcode'+row+'" name="matcode[]" value="">'+
			                    	'<div class="input-group-btn">'+
			                    		'<button type="button" class="openmat btn btn-default btn-xs" data-toggle="modal" data-target="#openmat"><i class="icon-search4"></i></button>'+
			                    	'</div>'+
			                    '</div>'+
			                    '</th>'+
				                '<td><input type="text" name="matname[]" readonly class="form-control" id="matnameadd'+row+'" input-sm" value=""></td>'+
				                '<td>'+
				                '<div class="input-group">'+
				                	'<input type="text" name="costcode[]" readonly id="codecostcode'+row+'" class="form-control input-xs" value="">'+
				                	'<div class="input-group-btn">'+
			                    		'<button type="button" class="opencost btn btn-default btn-xs" data-toggle="modal" data-target="#opencost"><i class="icon-search4"></i></button>'+
			                    	'</div>'+
				                '</td>'+
				                '<td>'+
									'<select class="form-control input-sm css-require" id="warehouse" name="warehouse[]"  required="required">'+
											<?php foreach ($getwarehouse as $key => $value) { ?>
											'<option value="<?php echo $value->whcode; ?>"><?php echo $value->whname; ?></option>'+
											<?php } ?>
									'</select>'+
				                '</td>'+
				                '<td><input type="text"  class="form-control input-sm" name="inputreceipt[]" id="inputreceipt'+row+'" value="0"></td>'+
				                '<td><input type="text" class="form-control input-sm" name="unit[]" id="unit'+row+'" readonly value=""></td>'+
				                '<td><input type="text" class="form-control input-sm" name="priceunit[]" id="priceunit'+row+'" value="0"></td>'+
				                '<td><input type="text" class="form-control input-sm" readonly name="netamt[]" id="netamt'+row+'" value=""></td>'+
			                    '<td>'+
			                      	'<div id="cc"><button type="button" id="refee'+row+'" class="label label-block label-danger label-xs" data-toggle="modal" data-target="#modaleditdetail">Delete</button></div>'+
									'<input type="hidden" id="receinput" name="receive[]" value="0">'+
				                    '<input type="hidden" name="balance[]"  id="balanceinput" value="0">'+
				                    '<input type="hidden" name="amount[]" id="amount'+row+'" value="">'+
				                    '<input type="hidden" name="dis1[]" id="dis1" value="0">'+
				                    '<input type="hidden" name="dis2[]" id="dis2" value="0">'+
				                    '<input type="hidden" name="disamt[]" id="disamt" value="0">'+
				                    '<input type="hidden" name="vat[]" id="vat" value="0">'+
				                    // '<input type="hidden" name="netamt[]" id="netamt'+row+'" value="">'+
				                    '<input type="hidden" name="disex[]" id="disex" value="0">'+
				                    '<input type="hidden" name="poid[]" id="poid" value="">'+
				                    '<input type="hidden" name="costname[]" id="costname'+row+'" readonly class="form-control input-sm" value="">'+
			                   '</td>'+
			               '</tr>';
      $('#addtav').append(tr);
      	var modalmat = '<div id="openmat" class="modal fade">'+
								'<div class="modal-dialog modal-lg">'+
									'<div class="modal-content">'+
										'<div class="modal-header">'+
											'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
											'<h5 class="modal-title">Select Material</h5>'+
										'</div>'+
										'<div class="modal-body">'+
											'<div id="loadmat"></div>'+
										'</div>'+
										'<div class="modal-footer">'+
											'<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<script>'+
							'$(".openmat").click(function(){'+
								'$("#loadmat").load("<?php echo base_url(); ?>index.php/share/material_id/'+row+'");'+
							'});'+
							'<\/script>';
		$('#modalmat').append(modalmat);
		var modalcost = '<div id="opencost" class="modal fade">'+
								'<div class="modal-dialog modal-lg">'+
									'<div class="modal-content">'+
										'<div class="modal-header">'+
											'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
											'<h5 class="modal-title">Select Costcode</h5>'+
										'</div>'+
										'<div class="modal-body">'+
											'<div id="loadcost"></div>'+
										'</div>'+
										'<div class="modal-footer">'+
											'<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<script>'+
							'$(".opencost").click(function(){'+
								'$("#loadcost").load("<?php echo base_url(); ?>index.php/share/costcode_id/'+row+'");'+
							'});'+
							'<\/script>';
		$('#modalcost').append(modalcost);		

		$("#inputreceipt"+row).change(function(){
			$("#saveh").prop('disabled',false);
			var qty = $("#inputreceipt"+row).val();
			var priceunit = $("#priceunit"+row).val();
			var tot = qty*priceunit;
			$("#amount"+row).val(tot);
			$("#netamt"+row).val(tot);
		});		
		$("#priceunit"+row).change(function(){
			$("#saveh").prop('disabled',false);
			var qty = $("#inputreceipt"+row).val();
			var priceunit = $("#priceunit"+row).val();
			var tot = qty*priceunit;
			$("#amount"+row).val(tot);
			$("#netamt"+row).val(tot);
		});		
		$("#refee"+row).click(function(){
			$(this).closest('tr').remove();
		});	
	}
	$("#flag").click(function(){
        if ($("#flag").prop("checked")) {
            $("#inputflag").val("Y");
        }else{
            $("#inputflag").val("");
        }

      });

</script>
<script type="text/javascript">
	$("#saveh").click(function(e){
		var wh = document.getElementById("warehouse");
    // alert(wh.value);
		// if(wh.value == ""){
		// 	alert("not wh");
		// }else{
		// 	alert("wh");
		// }
		if ($("#porecdate").val()=="") {
			swal({
			title: "กรุณากรอกวันที่รับของ !!.",
			text: "",
			confirmButtonColor: "#EA1923",
			type: "error"
			});
        }else{
					var frm = $('#contactForm1');
				    frm.submit(function (ev) {
				        $.ajax({
				            type: frm.attr('method'),
				            url: frm.attr('action'),
				            data: frm.serialize(),
				            				success: function (data) {
												swal({
											            title: "Save Completed!!",
											            text: "Save Completed!!",
											            // confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
							setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>inventory/edit_receive_po_other/"+$.trim(data);
                        }, 500);
				            }
				        });
				        ev.preventDefault();
				    });
					$("#contactForm1").submit(); //Submit  the FORM
		}
});
</script>
