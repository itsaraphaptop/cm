<style type="text/css">
	.form-input {
	padding: 5px;
    font-size: 13px;
    line-height: 1.5384616;
    color: #333333;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ddd;
    border-radius: 3px;
    margin: 2px;
	}
	div {
	    margin: 3px 0px 0px 0px;
	}
</style>
<div class="content-wrapper">
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
      </div>
    </div>
  </div>
<h3>รายชื่อพนักงานที่ลาออก</h3>
  <div class="panel panel-flat" > 
                <div class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                <table class="table table-xxs table-bordered table-striped datatable-basic">
                  <thead>
                    <tr>
                    	<th>#</th>
                      	<th>ชื่อ-นามกสุล</th>
                      	<th>รหัสพนักงาน</th>
            						<th>โครงการ/แผนก</th>
            						<th>ตำแหน่ง</th>
            						<th>วันที่เริ่มงาน</th>
                        <th>action</th>
                    </tr>
                  </thead>
                  	<tbody>
                  		<?php $i =1; foreach ($de as $key) {
                  		?>
                  		<tr>
                  		<td><?php echo $i; ?></td>
                  		<td><?php echo $key->emp_member; ?></td>
                  		<td><?php echo $key->emp_name_t; ?></td> 
                  		<td><?php echo $key->project_name; ?><?php echo $key->department_title; ?></td>                 			
                  		<td><?php echo $key->p_name; ?></td>
                  		<td><?php echo $key->emp_start; ?></td>
                      <td><a class="label label-warning" id="<?php echo $i; ?>" data-toggle="modal" href="<?php echo base_url(); ?>userprofile/edit_empp/<?php echo $key->emp_member;?>">ดูประวัติ
                          </a></td>
                  		<?php
                  		$i++; } ?>
                  		</tr>
                  	</tbody>
                </table>
              </div>
            </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script>
        $.extend( $.fn.dataTable.defaults, {
             autoWidth: false,
             columnDefs: [{
                 orderable: false,
                 width: '100px',
                 targets: [ 5 ]
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
          $('[data-popup="tooltip"]').tooltip();
        </script>

