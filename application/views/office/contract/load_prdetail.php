
<table class="table table-hover table-xxs datatable-basicr">
	<thead>
		<tr>
			<th width="10%">PR NO.</th>
			<th>Pr Req.</th>
			<th>Project</th>
			<th width="10%">Status</th>
			<th width="10%">View</th>
			<th width="10%">Action</th>
		</tr>
	</thead>
	<tbody>
<?php $n=0; foreach  ($pr as $key) { ?>
		<tr>
			<td><?php echo $key->pr_prno; ?></td>
			<td><?php echo $key->pr_reqname; ?></td>
			<td><?php echo $key->project_name; ?></td>
			<td><span class="label label-success">approve</span></td>
			<td><a class="view" id="view<?php echo $n;?>" data-toggle="modal" data-target="#view<?php echo $key->pr_prno; ?>"><span class="label label-success">View</span></td>
			<td><a type="button" id="prno<?php echo $n;?>" class="label bg-teal" name="button" data-dismiss="modal"> Select</a></td>
		</tr>

		<script>
  $("#prno<?php echo $n;?>").click(function(){
    $("#pr_name").val("<?php echo $key->pr_prno; ?>");
    $("#quodate").val("<?php echo $key->pr_prdate; ?>");  
    $("#table").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#table").load('<?php echo base_url(); ?>index.php/contract/load_prd_detail/'+"<?php echo $key->pr_prno; ?>");
  });
</script>
<?php $n++; } ?>
<?php $n=0; foreach  ($pr as $key) { ?>
  <div class="modal fade" id="view<?php echo $key->pr_prno; ?>" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-full">
       <div class="modal-content">
         <div class="modal-header bg-primary">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">ราการใบขอซื้อ : <?php echo $key->pr_prno; ?></h4>
         </div>
           <div class="panel-body">
               <div id="viewno<?php echo $n;?>">

               </div>
           </div>
             <div class="modal-footer">
                  <button type="button" id="close<?php echo $key->pr_prno; ?>" class="btn btn-link" data-dismiss="modal">Close</button>
                  
                </div>
       </div>
     </div>
   </div>

   		<script>
  $("#view<?php echo $n;?>").click(function(){
    $("#viewno<?php echo $n;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#viewno<?php echo $n;?>").load('<?php echo base_url(); ?>index.php/contract/load_prd_detail_model/'+"<?php echo $key->pr_prno; ?>");
  });

</script>


		<?php $n++; } ?>
	</tbody>
</table>

  


    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
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

      $('.datatable-basicr').DataTable();


    </script>
