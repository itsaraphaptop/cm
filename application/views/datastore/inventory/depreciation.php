<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">

<div class="content">
 	<form method="post" action="<?php echo base_url(); ?>index.php/asset_active/depreciation">
		<!-- Input group addons -->
		<div class="panel panel-flat">
			<div class="panel-heading">
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Depreciation<p></p></h6>
				<div class="heading-elements">
        <a href="<?php echo base_url(); ?>data_master" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>
        <a type="button" href="<?php echo base_url(); ?>inventory_area/new_depre" class="preload btn btn-info"><i class="icon-plus-circle2"></i> New</a>
      </div>
			</div>

			<div class="panel-body">
				<table class="table table-hover table-striped table-xxs datatable-basic">
          <thead>
            <tr>
              <th class="text-center" width="20%">Depreciation Code</th>
              <th class="text-center" width="40%">Depreciation Method</th>
							<th class="text-center" width="30%">Depreciation Year</th>  
              <th class="text-center" width="10%">Action</th>
            </tr>
          </thead>
          <tbody>
           	<?php $i=1; foreach ($depre as $value) { ?>
        		<tr>
        			<td><?php echo $value->depreciation_code ?></td>
         			<td><?php echo $value->depreciation_method ?></td>
         			<td><?php echo $value->depreciation_year ?></td>
         			<td class="text-center">
                <a  type="button" href="<?php echo base_url(); ?>inventory_area/open_depre/<?php echo $value->depreciation_code; ?>"><i class="icon-pencil7"></i></a>
                  <a id="del<?php echo $value->depreciation_code ?>" code="<?php echo $value->depreciation_code ?>"><i class="icon-trash"></i></a>
         		</tr>
            <script type="text/javascript">
            $('#del<?php echo $value->depreciation_code ?>').click(function(event) {
              
              var code = $(this).attr('code');

              swal({
                title: "ต้องการลบรายการนี้?",
                text: "คุณต้องการลบรายการนี้ใช่ไหม!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm) {
                if (isConfirm) {
                  swal("ยืนยัน", "ลบรายการนี้เรียบร้อยแล้ว", "success");
                    $.post('<?php echo base_url(); ?>asset_active/del_dep', {code: code}, function(data) {
                    });

                  $('#del<?php echo $value->depreciation_code ?>').parent().parent().remove();


                } else {
                  swal("ยกเลิก", "ได้ยกเลิกการลบเรียบร้อยแล้ว", "error");
                }
              });

            });
          </script>


            <?php $i++;	} ?> 
          </tbody>
        </table>
			</div>
		</div>
	</form>
</div>
</div>
</div>
</div>



<script>
$("#insertpodetail").click(function(){
	 addrow();
	});
	 function addrow()
            {
              $('td[class="text-center"]').closest('tr').remove();
              var row = ($('#body tr').length+0);
              var tr = '<tr id="'+row+'">'+
                                       

            '<td><input type="text" name="depreciation_y[]" id="depreciation_y" class="form-control input-sm" value="'+row+'" readonly="true"></td>'+
            '<td><input type="text" name="depreciation_operation[]" id="depreciation_operation" class="form-control input-sm"></td>'+
            '<td><input type="text" name="depreciation_per[]" id="depreciation_per" class="form-control input-sm"></td>'+
            '<td><input type="text" name="depreciation_value[]" id="depreciation_value" class="form-control input-sm"></td>'+  		
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


<script>
   $(".de").click(function(){
   $('#depre').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#depre").load('<?php echo base_url(); ?>index.php/share/modal_depreciation');
   });
</script>

<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
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
  $('.datatable-basic').DataTable();
  $.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
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
  $('.datatable-basic2').DataTable();
  $('#mfa').attr('class', 'active');
  $('#mfa1').attr('style', 'background-color:#dedbd8');
</script>
