<table class="table table-bordered table-xxs datatable-basicunit">
	<thead>
		<tr>
			<th>#</th>
			<th>Matterail Code</th>
			<th>Materail Name</th>
			<th>Qty</th>
			<th>Unit</th>
		</tr>
	</thead>
	<tbody>
	<?php $n=1; foreach ($res as $key => $value) {?>
		<tr>
			<td>
		      <div class="checkbox checkbox-switchery switchery-xs">
		       <label>
		          <input type="checkbox"  id="a<?php echo $n; ?>"  class="switchery">
		          <input type="hidden" name="chki[]" id="chki<?php echo $n;?>">
		        </label>
		      </div>
		    </td>
		    <td><?php echo $value->store_matcode; ?><input type="hidden" name="matcodei[]" value="<?php echo $value->store_matcode; ?>"></td>
		    <td><?php echo $value->store_matname; ?>
		    <input type="hidden" name="matnamei[]" value="<?php echo $value->store_matname; ?>">
			<input type="hidden" name="costcodei[]" value="<?php echo $value->store_costcode; ?>">
			<input type="hidden" name="costnamei[]" value="<?php echo $value->store_costname; ?>">
			<input type="hidden" name="remarki[]" value="">
			<input type="hidden" name="uniti[]" value="<?php echo $value->store_unit ?>">
			<input type="hidden" name="whi[]" value="<?php echo $value->wh?>">
		    </td>
		    <td><input type="text" class="form-control input-xs text-center" id="qty<?php echo $n;?>" name="qtyi[]" value="<?php echo $value->store_qty; ?>"></td>
		    <td><?php echo $value->store_unit; ?></td>
		</tr>
		<script>
			 $("#a<?php echo $n; ?>").click(function(){
		        if ($("#a<?php echo $n; ?>").prop("checked")) {
		            $("#chki<?php echo $n;?>").val("Y");
		        }else{
		            $("#chki<?php echo $n;?>").val("");
		        }
		      });
		</script>
		<?php $n++;}?>
	</tbody>
</table>


<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 3 ]
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
  $('.datatable-basicunit').DataTable();

</script>