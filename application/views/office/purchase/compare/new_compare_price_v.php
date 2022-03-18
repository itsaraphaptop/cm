<?php foreach ($getpo as $pro) {
	$project_id = $pro->project_id;
	$project_name = $pro->project_name;
	$project_mcode = $pro->project_mcode;
	$debtor_name = $pro->project_mnameth;
} ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<form method="post" id="savepost" name="savepost" action="<?php echo base_url(); ?>purchase_active/addrowcompare">
				<div class="panel panel-flat border-top-lg border-top-success">
					<div class="panel-heading ">
						<h5 class="panel-title">เปรียบเทียบราคาสินค้า</h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select</a></li>
							</ul>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>No.:</label>
									<input type="text" class="form-control"  name="no" readonly="true" id="no" placeholder="No."  >
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>PR No.:</label>
									<input type="text" class="form-control"  name="prno" readonly="true" id="prno" placeholder="PR No."  >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Project:</label>
									<div class="input-group">
										<span class="input-group-btn">
											<button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
										</span>
										<input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php echo $project_name; ?>" name="projectname" id="projectname">
										<input type="hidden" readonly="true" value="<?php echo $project_id; ?>" class="pproject1 form-control input-sm" name="projectid" id="putprojectid">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Owner/Customer:</label>
									<div class="input-group">
										<span class="input-group-btn">
											<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
										</span>
										<input type="text" class="form-control" placeholder="Owner/Customer" readonly   name="owner" id="owner" value="<?php echo $debtor_name; ?>">
										<input type="hidden" name="venderid" id="venderid" value="<?php echo $project_mcode; ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Remark :</label>
									<input type="date" class="form-control"  name="docdate" readonly="true" id="docdate">
									<input type="hidden" class="form-control"  name="vender" readonly="true" id="vender">
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>สถานที่ส่งของ :</label>
									<textarea class="form-control" id="place" name="place" readonly=""></textarea>
								</div>
							</div>
						</div>
						<input type="hidden" id="check" value="N" name="">
						<input type="hidden" id="check2" value="N" name="">
						
						<div class="row">
							<div class="tabable">
								<ul class="nav nav-tabs nav-tabs-component">
			                      <li class="active"><a href="#p1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i>Vender</a></li>
			                    </ul>
								<div class="tab-content">
									<div class="tab-pane has-padding active" id="p1">
										<div id="venderload" class="row table-responsive">
											<table class="table table-bordered table-striped table-hover table-xxs">
												<thead>
													<tr id="tr1">
														<th width="5%">No.</th>
														<th>Vender Name</th>
														<th width="10%">Disc (%) </th>
														<th width="15%">CR (Day) (%) </th>
														<th width="15%">Date</th>
														<th width="15%">Quataion No.</th>
													</tr>
												</thead>
												<tbody id="body">
													<tr>
														<td colspan="6" class="text-center">No DATA</td>
													</tr>
												</tbody>
											</table>
										</div>
										<br>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="tabbable">
			                    <ul class="nav nav-tabs nav-tabs-component">
			                      <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="true"><i class=" icon-list-unordered position-left"></i>Material Detail</a></li>
			                    </ul>
			                    <div class="tab-content">
			                      

				                    <div class="tab-pane has-padding active" id="panel-pill1">
				                    	<!-- <div class="row">
			                      			<div class="pull-right">
			                      				<a  id="insertrow2"  class="insertrow2 btn bg-info btn-xs"><i class="icon-plus2"></i> Add items</a>
			                      			</div>
			                      		</div>
			                      		<br> -->
				                      	<div id="invoice">
										  <div class="table-responsive">
				                        	<table class="table table-bordered table-striped table-hover table-xxs">
				                             	<thead>
				                          			<tr>
				                          				<th class="text-center">Material Code</th>
				                          				<th class="text-center">Material Name</th>
				                          				<th class="text-center">Qty</th>
				                          				<th class="text-center">Unit </th>
				                          				<th class="text-center">Price </th>
				                          				<th class="text-center">Disc (%)</th>
				                          				<th class="text-center">Cr (Day)</th>
				                          				<th class="text-center">Amount</th>
				                          				<th class="text-center">Remark</th>
				                          				<th class="text-center">Active</th>
				                          			</tr>
				                          		</thead>
				                            	<tbody id="pritem">
													<tr>
														<td colspan="10" class="text-center tr0">No DATA</td>
													</tr>
				                            	</tbody>
				                           	</table>
										  </div>
				                      	</div>
				                    </div>
			                  	</div>
							</div>
							<div class="modal-footer">
								<div class="form-group">
								<button type="button" id="saveh" class="saveh btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
								<button type="button" data-toggle="modal" data-target="#comparebtn" class="comparebtn btn btn-primary btn-xs"><i class="icon-git-compare position-left"></i> Compare Price</button>
								<a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
							</div>
						</div>
						</form>	
		</div>
	</div>
</div>
<div id="iii"></div>
<div class="modal fade" id="openinv" data-backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="select">Select Receipt</h4>
			</div>
			<div class="modal-body">
				<div class="row" id="modal_pr">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="comparebtn" data-backdrop="true">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
				<h4 class="modal-title" id="select">Compare Price</h4>
			</div>
			<div class="modal-body">
				<h5><?php echo $project_name; ?></h5>
				<div><span id="cpcodein"></span></div>
				<div class="row">
					<div class="col-md-4"><h6 id="prc"></h6></div>
					<div class="col-md-4">Date: <?php echo date('Y-m-d',now());?></div>
					<div class="col-md-4"></div>
					<div class="col-md-4"></div>
				</div>
				<div class="row">
					<div class="col-md-4">Remark : <span id="prcplace"></span></div>
					<div class="col-md-4"></div>
					<div class="col-md-4"></div>
					<div class="col-md-4"></div>
				</div>
				<div class="row" id="modalcompare">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div id="matvender"></div>
<div id="matmodal"></div>
<div id="unitmodal"></div>
<script>
	$(".openinv").click(function(){
		$('#modal_pr').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$("#modal_pr").load('<?php echo base_url(); ?>index.php/purchase/load_new_compare/<?php echo $prjid; ?>');
		$("#saveh").hide();
		$(".comparebtn").hide();
	});
	$(".comparebtn").click(function(){
		var cpcode = $("#no").val();
		var vendercode = $("#vender").val();
		console.log(cpcode);
		$('#modalcompare').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$("#modalcompare").load('<?php echo base_url(); ?>index.php/purchase/load_print_compare/'+cpcode+'/'+vendercode);
	});
$(".openinv").click(function(){
	// $(".openinv").hide();
	$("#check2").val("Y");
});

$(".insertrow").click(function(){
	addrow();
});

$(".insertrow2").click(function(){
	addrow2();
});
function vender(el){
          var row = el.attr("row");
          //alert(555)
          $('#modal_vender'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_vender"+row).load('<?php echo base_url(); ?>index.php/share/vender2/'+row);
  }
  
    function unit(el){
          var roww = el.attr("row");
          // alert(565)
          $('#modal_unit'+roww).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_unit"+roww).load('<?php echo base_url(); ?>index.php/share/unit/'+roww);
  }
function mat_name(el){
          var roww = el.attr("row");
          // alert(555);
          $('#modal_mat'+roww).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_mat"+roww).load('<?php echo base_url(); ?>index.php/share/getmatcode/'+roww);
  }

function addrow()
{
	$('td[class="text-center"]').closest('tr').remove();
	var row = ($('#body tr').length-0)+1;
	var rowr = row-1;
	var tr = '<tr id="'+row+'">'+
					'<td id="d'+row+'">'+row+'</td>'+
					'<td>'+
					'<input type="text" class="form-control" readonly name="vendercode[]" id="vendercode'+row+'" value="" />'+
					'</td>'+
					'<td>'+
					'<div class="input-group">'+
					'<input type="text" class="form-control" readonly name="venname[]" id="venname'+row+'" value="" />'+
					
					'<div class="input-group-btn">'+
					'<button type="button" data-toggle="modal" data-target="#vender'+row+'"  row="'+row+'"onclick="vender($(this))" class="vender'+row+' btn btn-primary"><i class="icon-search4"></i></button>'+
					'</div>'+
					'</div>'+
					'</td>'+
					'<td>'+
					'<input type="text" class="form-control" readonly name="vencr[]" id="vencr'+row+'" value="" />'+
					'</td>'+
					'<td>'+
					'<input type="text" class="form-control" readonly name="ventel[]" id="ventel'+row+'" value="" />'+
					'</td>'+
					'<td>'+
					'<input type="text" class="form-control" readonly name="venfax[]" id="venfax'+row+'" value="" />'+
					'</td>'+
			'</tr>';
	$('#body').append(tr);

	var modal = '<div class="modal fade" id="vender'+row+'" data-backdrop="false">'+
			  '<div class="modal-dialog modal-lg">'+
			    '<div class="modal-content">'+
			      '<div class="modal-header">'+
			        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
			        '<h4 class="modal-title" id="">Select Vender'+row+'</h4>'+
			      '</div>'+
			        '<div class="modal-body">'+
			        '<div class="panel-body">'+
			            '<div class="row" id="modal_vender'+row+'">'+
			            '</div>'+
			            '</div>'+
			        '</div>'+
			    '</div>'+
			  '</div>'+
			'</div>';
	$('#matvender').append(modal);
}

function addrow2()
{
	$('td[class="text-center tr0"]').closest('tr').remove();
	var row = ($('#pritem tr').length-0)+1;
	var rowr = row-1;
	var tr = '<tr id="'+row+'">'+
					'<td>'+
					'<input type="text" class="form-control" readonly name="matcode[]" id="matcode'+row+'" value="" />'+
					'</td>'+
					'<td>'+
					'<div class="input-group">'+
					'<input type="text" class="form-control" readonly name="pri_matname[]" id="newmatname'+row+'" value="" />'+
					
					'<div class="input-group-btn">'+
					'<button type="button" data-toggle="modal" data-target="#matname'+row+'"  row="'+row+'"onclick="mat_name($(this))" class="matname'+row+' btn btn-primary"><i class="icon-search4"></i></button>'+
					'</div>'+
					'</div>'+
					'</td>'+
					'<td>'+
					'<input type="text" class="form-control" required="" name="pri_qty[]" id="pri_qty'+row+'" value="" />'+
					'</td>'+
					'<td>'+
					'<div class="input-group">'+
					'<input type="text" class="form-control" readonly name="prii_unit[]" id="unitname'+row+'" value="" />'+
					'<div class="input-group-btn">'+
					'<button type="button" data-toggle="modal" data-target="#unit'+row+'"  row="'+row+'"onclick="unit($(this))" class="unit'+row+' btn btn-primary"><i class="icon-search4"></i></button>'+
					'</div>'+
					'</div>'+
					'</td>'+
					'<td>'+
					'<input type="text" class="form-control" required="" name="priceunit[]" id="priceunit'+row+'" value="" />'+
					'</td>'+
					'<td>'+
					'<input type="text" class="form-control" required="" name="remark[]" id="remark'+row+'" value="" />'+
					'</td>'+
					'<td>'+
					'</td>'+
			'</tr>';
	$('#pritem').append(tr);

	var modal = '<div class="modal fade" id="matname'+row+'" data-backdrop="false">'+
			  '<div class="modal-dialog modal-lg">'+
			    '<div class="modal-content">'+
			      '<div class="modal-header">'+
			        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
			        '<h4 class="modal-title" id="">Select Material'+row+'</h4>'+
			      '</div>'+
			        '<div class="modal-body">'+
			        '<div class="panel-body">'+
			            '<div class="row" id="modal_mat'+row+'">'+
			            '</div>'+
			            '</div>'+
			        '</div>'+
			    '</div>'+
			  '</div>'+
			'</div>';
	$('#matmodal').append(modal);

	var modal = '<div class="modal fade" id="unit'+row+'" data-backdrop="false">'+
			  '<div class="modal-dialog modal-lg">'+
			    '<div class="modal-content">'+
			      '<div class="modal-header">'+
			        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
			        '<h4 class="modal-title" id="">Select Unit'+row+'</h4>'+
			      '</div>'+
			        '<div class="modal-body">'+
			        '<div class="panel-body">'+
			            '<div class="row" id="modal_unit'+row+'">'+
			            '</div>'+
			            '</div>'+
			        '</div>'+
			    '</div>'+
			  '</div>'+
			'</div>';
	$('#unitmodal').append(modal);
}

</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '150px',
         targets: [ 0 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.datatable-basicc').DataTable();
  $("#saveh").hide();
  $(".comparebtn").hide();
</script>
<script type="text/javascript">
  $('#compare').attr('class', 'active');
  $('#new_compare').attr('style', 'background-color:#dedbd8');
</script>