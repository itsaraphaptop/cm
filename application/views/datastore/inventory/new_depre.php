<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">

<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
			</div>
			<div class="panel-body">
        <form method="post" id="formsub" action="<?php echo base_url(); ?>index.php/asset_active/depreciation">
				<div class="row">
					<div class="form-group">
						<div class="col-sm-2">
							<label class="control-label">Depreciation Code :</label>
							<input type="text" class="form-control input-xs" name="depreciation_code" id="depreciation_code">
						</div>
						
						<div class="col-sm-2">
							<label class="control-label">Depreciation Method :</label>
							<input type="text" class="form-control input-xs" id="depreciation_method" name="depreciation_method">
						</div>
						<div class="col-sm-2">
							<label class="control-label">Depreciation Year :</label>
							<input type="text" class="form-control input-xs" name="depreciation_year" id="depreciation_year">
						</div>
					</div>
				</div>
				
				<br>
				<div class="row">
					<div class="form-group">									
						<div class="col-sm-12 text-right">
							<a class="addrow btn bg-info" id="insertpodetail"><i class="icon-plus2"></i> Add Item</a>
						</div>
					</div>
				</div><br>
          <div class="row" id="table">
            <div class="col-md-12">
              <table class="table table-hover table-striped table-xxs" id="res">
                <thead>
                  <tr>
              	   	<th width="10%" style="text-align: center;">Year.</th>
                   	<th class="text-center">Depreciation Name</th>
                   	<th width="10%"  style="text-align: center;"> %</th>
                   	<!-- <th width="10%"  style="text-align: center;">Value</th>   -->                 
                   	<th style="text-align: center;">Remark</th>
                   	<th>Active</th>
                   	
                  </tr>
                </thead>
                <tbody id="body">
                </tbody>
              </table>
				<div class="row">
			             <br>
                  <div class="text-right">
                  <button type="button" id="saveepx" class="btn btn-success"><i class="icon-floppy-disk position-left"></i>Save</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal" id="closeacc"><i class="icon-close2"></i> Close</button>
									
							</div>
                      		</div>					
            </div>
					</div>
          </form>
				</div>
			</div>
		</div>
  </div>
	</div>
	</div>



<script>
$("#saveepx").click(function() {
  var sum = 0;
  $('.sumper').each(function(index, el) {
    sum += el.value*1;
  });

  if (sum==100) {
    $('#formsub').submit();
  }else{
    swal("ERROR!", "กรุณากรอก % รวมเท่ากับ 100% !!", "error")
  }
  
});
$("#insertpodetail").click(function(){
	 addrow();
	});
	 function addrow()
            {
              $('td[class="text-center"]').closest('tr').remove();
              var row = ($('#body tr').length+1);
              var tr = '<tr id="'+row+'">'+
                                       

            '<td><input type="text" name="depreciation_y[]" id="depreciation_y" class="form-control input-sm row" value="'+row+'" readonly="true"></td><input type="hidden" name="chk[]" class="form-control" value="insert">'+
            '<td><input type="text" name="depreciation_operation[]" id="depreciation_operation" class="form-control input-sm"></td>'+
            '<td><input type="text" name="depreciation_per[]" id="depreciation_per'+row+'" class="form-control input-sm sumper"><input type="hidden" name="depreciation_value[]" id="depreciation_value" class="form-control input-sm"></td>'+ 		
            '<td><input type="text" name="depreciation_remark[]" id="depreciation_remark" class="form-control input-sm"></td>'+		                        
           '<td>'+
                  '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
              
           '</td>'+
           '</tr>';
              $('#body').append(tr);

            }


            $(document).on('click', 'a#remove', function () { // <-- changes

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
              $('#mfa').attr('class', 'active');
  $('#mfa1').attr('style', 'background-color:#dedbd8');
           </script>

<div id="depreciation" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Depreciation Method</h6>
			</div>
			<div class="modal-body">
				<div id="depre"></div>
			</div>
		</div>
	</div>
</div>
