<!-- Main content  trans-->
			<div class="content-wrapper">



				<!-- Content area -->
				<div class="content">
          <!-- Highlighting rows and columns -->
					<div class="panel panel-body">
						<div class="panel-heading">
							<h5 class="panel-title">Trading</h5>
							<div class="heading-elements">
								<!-- <ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul> -->
		                	</div>
						</div>

						<div class="table-responsive">
					            <table class="table table-hover table-bordered  table-xxs datatable-basic">
                <thead>
                  <tr>
                    <th>Project Code</th>
                    <th>Project Name</th>
                    <th>View</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ( $getproj as $key => $value ) {
 $this->db->select( '*' );
 $this->db->where( 'from_project', $value->project_id );
 $this->db->where( 'approve', "approve" );
 $this->db->where( 'status', "wait" );
 $this->db->where( 'type_ic', $trading );
 $q      = $this->db->get( 'ic_booking' );
 $result = $q->num_rows();
 ?>
                  <tr>
                    <td><?php echo $value->project_code; ?></td>
                    <td><?php echo $value->project_name; ?></td>
                    	<td>
                  			<button data-toggle="modal" data-target="#booking<?php echo $value->project_id; ?>" class="booking<?php echo $value->project_id; ?> label label-info"> View</button>
                  		<span class="count badge bg-warning-400"><?php echo $result; ?></span>
                  		</td>
                    	<td><a href="<?php echo base_url(); ?>inventory/new_doc_trading/<?php echo $value->project_id; ?>" class="preload label label-primary" data-popup="tooltip" title="" data-original-title="">Select</a></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
<?php foreach ( $getproj as $key ) {?>
     <!-- modal  -->
           <div class="modal fade" id="booking<?php echo $key->project_id; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">View Booking <?php echo $key->project_id; ?></h4>
                </div>
                  <div class="modal-body">
                    <div id="modal_detail<?php echo $key->project_id; ?>">
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end modal -->
    <script>
            $(".booking<?php echo $key->project_id; ?>").click(function(){
              $("#modal_detail<?php echo $key->project_id; ?>").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
              $("#modal_detail<?php echo $key->project_id; ?>").load('<?php echo base_url(); ?>inventory/view_booking/<?php echo $key->project_id; ?>');
            });
    </script>
<?php }?>


					<!-- Highlighting rows and columns -->

					<!-- /highlighting rows and columns -->




				</div>
				<!-- /content area -->

			</div>


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
  $('.datatable-basic').DataTable();

  $('#imp').attr('class', 'active');
  $('#trading').attr('class', 'active');
  $('#imp_trading_7').attr('style', 'background-color:#dedbd8');
</script>