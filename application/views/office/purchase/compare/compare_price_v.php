<?php foreach ($getpo as $pro) {
	$project_id = $pro->project_id;
	$project_name = $pro->project_name;
	$project_mcode = $pro->project_mcode;
	$debtor_name = $pro->project_mnameth;
} ?>
<div class="content-wrapper">

	<div class="content">
		<div class="row">
			<form method="post" id="savepost" name="savepost" action="<?php echo base_url(); ?>purchase_active/add_comprice">
				<div class="panel panel-flat border-top-lg border-top-success">
					<div class="panel-heading ">
						<h5 class="panel-title">การทำใบขอราคา</h5>
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
							<div class="col-md-5">
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
							<div class="col-md-5">
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
									<label>วันที่ส่งของ :</label>
									<input type="date" class="form-control"  name="docdate" readonly="true" id="docdate">
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
							<div class="tabbable">
			                    <ul class="nav nav-tabs nav-tabs-component">
			                      <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="true"><i class=" icon-list-unordered position-left"></i>Material Detail</a></li>
			                      <li class=""><a href="#panel-pill2" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i>Vender</a></li>
			                    </ul>
			                    <div class="tab-content">
			                      

				                    <div class="tab-pane has-padding active" id="panel-pill1">
				                    	<div class="row">
			                      			<div class="pull-right">
			                      				<a  id="insertrow2"  class="insertrow2 btn bg-info btn-xs"><i class="icon-plus2"></i> Add items</a>
			                      			</div>
			                      		</div>
			                      		<br>
				                      	<div id="invoice" class="table-responsive">
				                        	<table class="table table-bordered table-striped table-hover table-xxs">
				                             	<thead>
				                          			<tr>
				                          				<th>Material Code</th>
				                          				<th>Material Name</th>
				                          				<th>Qty</th>
				                          				<th>Unit </th>
				                          				<th>Price </th>
				                          				<th>remark</th>
				                          				<th>Active</th>
				                          			</tr>
				                          		</thead>
				                            	<tbody  class="pritem">
														<tr>
															<td colspan="7" class="text-center tr0">No DATA</td>
														</tr>
				                            	</tbody>
				                           	</table>
				                      	</div>
				                    </div>

									<div class="tab-pane has-padding " id="panel-pill2">
										<div class="row">
											<div class="pull-right">
												<a  id="insertrow"  class="insertrow btn bg-info btn-xs"><i class="icon-plus2"></i> Add items</a>
											</div>

										</div>
										<br>
										<div id="paird" class="table-responsive">
											<table class="table table-bordered table-striped table-hover table-xxs">
												<thead>
													<tr id="tr1">
														<th>No.</th>
														<th>Vender Code</th>
														<th>Vender Name</th>
														<th>Cr Team</th>
														<th>Tel </th>
														<th>Fax </th>
													</tr>
												</thead>
												<tbody id="body">
													<tr>
														<td colspan="6" class="text-center">No DATA</td>
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
							<button type="button" id="saveher" class="saveher btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
							<a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
						</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="iii"></div>
<div class="modal fade" id="openinv" data-backdrop="false">
	<div class="modal-dialog modal-lg">
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
<div id="matvender"></div>
<div id="matmodal"></div>
<div id="unitmodal"></div>
<script>
	$(".openinv").click(function(){
              $('#modal_pr').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_pr").load('<?php echo base_url(); ?>index.php/purchase/load_compare/<?php echo $prjid; ?>');
            });
$(".openinv").click(function(){
	$(".openinv").hide();
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

$("#saveher").click(function(e){
	if ($("#check").val()=="N") {
	  swal({
	      title: "กรุณาเลือก Vender !!.",
	      text: "",
	      confirmButtonColor: "#EA1923",
	      type: "error"
	  });
	}else if ($("#check2").val()=="N") {
	  swal({
	      title: "กรุณาเลือกรายการ PO หรือ เพิ่มรายการ !!.",
	      text: "",
	      confirmButtonColor: "#EA1923",
	      type: "error"
	  });
	}else{
		var frm = $('#savepost');
		frm.submit(function (ev) {
			$.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
			success: function (data) {
				swal({
			            title: "Save Completed!!.",
			            text: "Save Completed!!.",
			            // confirmButtonColor: "#66BB6A",
			            type: "success"
			        });
					 setTimeout(function() {
						window.location.href = "<?php echo base_url();?>purchase/compare_price_v/"+data
					}, 500);
			}
		});
		ev.preventDefault();
		});
	 $("#savepost").submit(); //Submit  the FORM
    }
});
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
</script>
<script type="text/javascript">
  $('#compare').attr('class', 'active');
  $('#new_rq').attr('style', 'background-color:#dedbd8');
</script>