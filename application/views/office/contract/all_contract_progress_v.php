
<div class="content">
          <div class="panel panel-flat border-top-lg border-top-success" >
				<div class="panel-heading">
							<h5 class="panel-title">รายการใบสั่งจ้าง</h5>
              <h6 class="panel-title">โครงการ : <?=$resproject[0]['project_name'];?></h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
						</div>
     <div class="panel-body">

     
      <div class="dataTables_wrapper no-footer">
			<table class="table table-hover table-xxs datatable-basicc">
          <thead>
          <tr>
              <th>เลขที่ใบจ้างซื้อ</th>
              <th>PR Code</th>
              <th>ผู้รับเหมา</th>
              <th>รายละเอียดใบสั่งจ้าง</th>
              <th class="text-center">Actions</th>
          </tr>
          </thead>
          <tbody>

          <?php foreach ($res as $val) { ?>
                  <tr>
                      <td width="15%"><?php echo $val->lo_lono;?></td>
                      <td width="15%"><?php echo $val->prno;?></td>
                      <td width="25%"><?php echo $val->vender_name; ?> </td>
                      <td width="25%"><?php echo $val->other;?></td>
                      <td width="5%" class="text-center">
                        <a href="<?php echo base_url();?>management/history_progress/<?=$val->projectcode;?>/p/subproject/<?=$val->lo_lono;?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a>
                      </td>
                  </tr>
                  
          <?php } ?>

         </tbody>
      </table>
</div>
</div>
</div>
                <!-- Footer -->
			          <div class="footer text-muted">
			           
			          </div>
			          <!-- /footer -->
</div>


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
      $('[data-popup="tooltip"]').tooltip();
    </script>
 


<script type="text/javascript">
  $('#account_i').attr('class', 'active');
  $('#project_arr').attr('style', 'background-color:#dedbd8');
</script>