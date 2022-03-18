			<div class="content-wrapper">
				<div class="content">

					<form id="formpost" class="form-horizontal" action="<?php echo base_url(); ?>inventory_active/save_booking" method="post">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<div class="form-group">
									<div class="col-lg-8">
										<h5 class="panel-title">Material Booking</h5>
									</div>
									<div class="col-lg-2 text-right">
										<label data-i18n="ic_module.booking.bookingtype">เลือกประเภทการจอง</label>
									</div>
									<div class="col-lg-2">
										<select class="form-control input-sm" name="type_ic">
											<option value="issue" >Issue</option>
											<option value="trading" >Trading</option>
											<option value="transfer" >Transfer</option>
											<option value="other" >Other</option>
										</select>
									</div>
								</div>
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<fieldset>
											<div id="cccc"></div>
											<div class="form-group">
												<label class="col-lg-3 control-label">Booking Code:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="trcode" name="trcode" placeholder="Booking Code AutoRun" readonly="readonly" >
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Project Reserve</label>
												<div class="col-lg-9">
													<select class="form-control" id="fromproject" name="fromproject" readonly>
														<?php foreach ($getproj as $value) {?>
															<option value="<?php echo $value->project_id; ?>"><?php echo $value->project_name; ?></option>
													<?php	} ?>

													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">System</label>
												<div class="col-lg-9">
													<select class="form-control input-sm" name="system" id="list_system">
					                                   <option value="null">กรุณาเลือก</option>
					                                   <?php foreach ($item as $key => $v) {  ?>
					                                  <option value="<?php echo $v->projectd_job; ?>"><?php echo $v->systemname; ?></option>
					                                <?php  } ?>
					                                </select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">User Reserve:</label>
												<div class="col-lg-9">
													<div class="input-group">
														<input type="hidden" name="memid" id="memid" value="<?php echo $mid; ?>">
														<input type="text" class="form-control" readonly="readonly" id="memname" name="name" value="<?php echo $name; ?>">
														<div class="input-group-btn">
	                              							<button type="button" class="openmember btn btn-info btn-icon" data-toggle="modal" data-target="#openmember"><i class="icon-search4"></i></button>
	                              						</div>
	                              					</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Remark:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="remark form-control" id="remark" name="remark" placeholder="Enter your message here"></textarea>
												</div>
											</div>
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset>
	

															<div class="form-group">
																<label class="col-lg-3 control-label">Booking Date: </label>
																<div class="col-lg-9">
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																	<input type="date" class="form-control " id="trdate" name="trdate" value="<?php echo date("Y-m-d");?>">
																</div>
															</div>
															</div>

															<!-- <div class="form-group"> -->
																<!-- <label class="col-lg-3 control-label">To Project</label> -->
																<!-- <div class="col-lg-9"> -->
	
																	
																		<?php foreach ($getproj as $value) {?>
																	<input type="hidden" value="<?php echo $value->project_id; ?>" id="toproject" name="toproject">
																	<?php	} ?>
																<!-- </div> -->
															<!-- </div> -->

															<div class="form-group">
																<label class="col-lg-3 control-label">Delivery Date : </label>
																<div class="col-lg-9">
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																	<input type="date" class="form-control " id="duedate" name="duedate" value="<?php echo date("Y-m-d");?>">
																</div>
															</div>
															</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Address:</label>
												<div class="col-lg-9" id="divplace">
												<?php foreach ($getproj as $dd) {
														$add = $dd->project_maddress;
													}?>
													<input type="text" value="<?php echo $add; ?>" placeholder="Enter your message here" id="place" name="place" class="form-control">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Additional message:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="form-control" id="placeother" name="placeother" placeholder="Enter your message here"></textarea>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
								<div class="container-fluid">
									<div class="row">
										<div class="form-group">
											<!-- <a id="load" class="btn btn-warning ">Load Material</a> -->
											<!-- <a  class="insertrow btn btn-info"><i class=" icon-add-to-list"></i> Add Rows</a> -->
										</div>
									</div>
								</div>
								<div class="text-right">
									<a  id="insertrow"  class="insertrow btn bg-info"><i class="icon-plus2"></i> Add items</a>

								</div>
								<div class="form-group" id="loadtable">
								<br>
										<div class="table-responsive" >
											<table class="aa table table-bordered table-xxs">
												<thead>
													<tr>
														<th width="3%">No.</th>
														<th width="20%">Matterail Code</th>
														<th>Materail Name</th>
														<th width="8%">Qty</th>
														<th width="12%">Booking Qty</th>
														<th width="8%">Unit Name</th>
														<th>Warehouse</th>
														<th width="8%">Action</th>
													</tr>
												</thead>
												<tbody id="body">
													<tr>
														<td colspan="8" class="text-center">Not Data</td>
													</tr>
												</tbody>
											</table>
										</div>
								</div>
								<div id="booking"></div>


								<div class="text-right">
									<a type="button" href="<?php echo base_url(); ?>inventory/booking/<?php echo $id; ?>" class="preload btn btn-info"><i class="icon-plus-circle2"></i> New</a>									 
									<button type="button" disabled class="save btn bg-success"><i class="icon-floppy-disk position-left"></i>Save</button>
									 <a href="<?php echo base_url(); ?>inventory/open" class="btn bg-danger"><i class="icon-close2 position-left"></i> Close</a>
								</div>
							</div>
						</div>
					</form>
					<!-- /highlighting rows and columns -->
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
<div id="matmodal"></div>
<div class="modal fade" id="openmember"  data-backdrop="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Select Employee</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="row" id="modal_member">
              </div>
            </div>
          </div>
        </div>
      </div>
      </div> <!--end modal -->
      <script>
      $(".openmember").click(function(){
      $('#modal_member').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
      $("#modal_member").load('<?php echo base_url(); ?>index.php/share/member');
      });
      </script>

<script>
$(window).load(function(){
  $("#cccc").load('<?php echo base_url(); ?>index.php/inventory_active/ic_clear/<?php echo $id; ?>');
});
$(".insertrow").click(function(){
	addrow();
});

  function metcode(el){
      
          var row = el.attr("row");
          //alert(555)
          $('#modal_project'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_project"+row).load('<?php echo base_url(); ?>index.php/share/modal_store_material_v/'+row+'/'+<?php echo $id; ?>);
  }

function delete_row(num,el,rowr){
		
			 $("#d"+rowr).html(rowr);
			  var url="<?php echo base_url(); ?>inventory_active/update_delmat";
              var dataSet={
              storetotol : $("#newmatcode"+num).val(),
              pro : <?php echo $id;?>,
              id : $("#matid"+num).val(),
              };
		
              $.post(url,dataSet,function(){
              	
              }).done(function(data){
              		if(data == "true"){
              			$(el).parent().parent().parent().parent().remove();
              		}else{
              			swal({
				         title: data,
				         // text: "danger",
				         confirmButtonColor: "#FF0000",
				         // type: "success"
				   	});
              		}
              })
}
function addrow()
{
	$('td[class="text-center"]').closest('tr').remove();
	var row = ($('#body tr').length-0)+1;
	var rowr = row-1;
	var tr = '<tr id="'+row+'">'+
					'<td id="d'+row+'">'+row+'</td>'+
					'<td>'+
					'<div class="input-group">'+
					'<input type="text" class="form-control" readonly name="matcodei[]" id="newmatcode'+row+'" value="" />'+
					'<input type="hidden" class="form-control" readonly name="matid[]" id="matid'+row+'" value="" />'+
					'<div class="input-group-btn">'+
					'<button type="button" data-toggle="modal" data-target="#metcode'+row+'"  row="'+row+'"onclick="metcode($(this))" class="metcode'+row+' btn btn-primary"><i class="icon-search4"></i></button>'+
					'</div>'+
					'</div>'+
					'</td>'+
					'<td><input type="text" class="form-control" readonly id="newmatname'+row+'" name="matnamei[]" value="" /></td>'+
					'<td><input type="text" class="form-control" readonly id="storetotol'+row+'" name="qtyistore[]" value="" /></td>'+
					'<td><input type="text" class="bookingii form-control text-right" id="bookingi'+row+'" name="qtyi[]" value="" /></td>'+
					'<td><input type="text" class="form-control" readonly id="unit'+row+'" name="uniti[]" value="" /></td>'+
					'<td><input type="text" class="form-control" readonly id="whname'+row+'" value="" /><input type="hidden" class="form-control" readonly id="whcode'+row+'" name="whi[]" value="" /></td>'+
					'<td class="hidden-center">'+
						'<ul class="icons-list">'+
							// '<li><a href="#" data-popup="tooltip" data-toggle="modal" data-target="#edit_modal" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>'+
						'<li><a id="delete'+row+'" onclick="delete_row('+row+',$(this),'+rowr+')" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
					'</ul>'+

					'<input type="hidden" name="costcodei[]" id="codecostcode'+row+'" value="" />'+
					'<input type="hidden" name="costnamei[]" id="costname'+row+'" value="" />'+
					'<input type="hidden" name="remarki[]" value="" />'+
					'<input type="hidden" name="chki[]" value="Y" />'+
					'<input type="hidden" id="priceunit'+row+'" name="priceunit[]" value="" />'+
				'</td>'+
			'</tr>';
			
	$('#body').append(tr);

	var modal = '<div class="modal fade" id="metcode'+row+'" data-backdrop="false">'+
			  '<div class="modal-dialog modal-lg">'+
			    '<div class="modal-content">'+
			      '<div class="modal-header btn-primary">'+
			        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
			        '<h4 class="modal-title" id="myModalLabel">Select Material Code</h4>'+
			      '</div>'+
			        '<div class="modal-body">'+
			        '<div class="panel-body">'+
			            '<div class="row" id="modal_project'+row+'">'+
			            '</div>'+
			            '</div>'+
			        '</div>'+
			    '</div>'+
			  '</div>'+
			'</div>'+
			'<script>'+

			
			'$("#bookingi'+row+'").keyup(function(){'+
			'if (parseFloat($("#bookingi'+row+'").val()) > parseFloat($("#storetotol'+row+'").val())) {'+
				'swal({'+
					'title: "ไม่สามารถจองวัสดุเกินจากคลัง!!!",'+
					'text: "",'+
					 'confirmButtonColor: "#B50007",'+
					'type: "error"'+
				'});'+
				'$("#bookingi'+row+'").val(0);'+
				'$("#bookingi'+row+'").select();'+
				'$(".save").prop("disabled",true);'+
			'}else{'+
				'$(".save").prop("disabled",false);'+
			'}'+
			'});'+
			'<\/script>';
	$('#matmodal').append(modal);

	
	// '$("#delete'+row+'").click(function(){'+
	// 		 
	// 		'});'+


	//  var url="<?php echo base_url(); ?>inventory_active/update_book";  
 //      var dataSet={
 //      	metcode : $("#metcode"+row).val(),
 //      	pro : <?php echo $id;?>
 //      };
 //      $.post(url,dataSet,function(data){
 //      });

	$(".bookingii").keyup(function(){
		intOnly($(this));
	});
}


$(".save").click(function(){
if($("#place").val()==""){

	$("#place").select();
   swal({
         title: "กรุณากรอกที่อยู่!",
         // text: "danger",
         confirmButtonColor: "#FF0000",
         // type: "success"
   	});
   $("#divplace").html('<input type="text" placeholder="Enter your message here" id="place" name="place" class="form-control border-danger">');
	}else{
					var frm = $('#formpost');
				    frm.submit(function (ev) {
				    	$(".page-container").append('<div class="loading">Loading&#8230;</div>');
				    	 var select = $("#list_system").val();
				 
					    	if(select == "null"){
					    		swal("select system","","error");
					    		$(".loading").remove();
					    		return false;
					    	}
				        $.ajax({
				            type: frm.attr('method'),
				            url: frm.attr('action'),
				            data: frm.serialize(),
				            				success: function (data) {
												console.log(data);
												swal({
											            title: ""+data,
											            text: "Save Completed!!.",
											            // confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
												 setTimeout(function() {
												window.location.href = "<?php echo base_url(); ?>inventory/edibooking/"+$.trim(data);
												}, 500);
				            }
				        });
				        ev.preventDefault();

				    });




	 $("#formpost").submit(); //Submit  the FORM
	}
});

  $('#imp').attr('class', 'active');
      $('#reservation').attr('class', 'active');
      $('#imp_sub5').attr('style', 'background-color:#dedbd8');
</script>