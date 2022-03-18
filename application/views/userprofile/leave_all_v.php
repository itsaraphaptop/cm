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

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/data_master">Setup</a></li>
    </div>
  </div>

  <div class="panel panel-flat"> 
                <div class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                <table class="table table-xxs table-bordered table-striped datatable-basic">
                  <thead>
                    <tr>
                    	<th>#</th>
                    	<th>ชื่อ-นามสกุล</th>
                      	<th>วันที่กรอก</th>
						<th>ประเภทการลา</th>
						<th>มีความประสงค์ขอลา</th>
						<th>ลาตั้งแต่วันที่</th>
						<th>ถึงวันที่</th>
						<th>จำนวนวันลา</th>
						<th>จำนวนชั่วโมงลา</th>
						<th>สถานะการลา</th>
						<th></th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
						$n=1; foreach  ($le as $leea) {
					?>
    					<tr style="text-align: center;">
    						<td><?php echo $n; ?></td>
							<td><?php echo $leea->emp_name_t; ?></td>
							<td><?php echo $leea->date_leave; ?></td>
                    		<td><?php echo $leea->name_leave; ?></td>
		                    <td><?php echo $leea->leave_detail; ?></td>
		                    <?php 
		                    if ($leea->start_date == null) {
		                    ?>
		                    	<td colspan="2" align="center">ลาครึ่งวัน</td>
		                    <?php
		                    }
		                    	 else{
		                    ?>
		                    	<td><?php echo $leea->start_date; ?></td>
		                    	<td><?php echo $leea->end_date; ?></td>
		                    <?php 
							}
		                    	$tt =$leea->leave_time/8;
		                    	$num_time = number_format($tt,1);
		                    	$ee = explode(".",$num_time);
		                    	?>
		                    	<td><?php echo $ee[0]; ?></td>
								<?php 
								if ($ee[1] == 0) {
									$toto = 0;
								}else{
									$toto = $ee[1]-1;
									}
								 ?>
								<td><?php echo $toto; ?></td>
		                    	<?php
		                    ?>
							<?php 
							if ($leea->status_approve =="W") {
							?>
								<td >รออนุมัติ</td>
							<?php
							 } elseif ($leea->status_approve == "N") {
							?>
								<td>ไม่อนุมัติ</td>
								<td></td>
							<?php
							 } else{
							?>
							<td>อนุมัติ</td>
							
							<?php
							 }
							 ?>	
							<td><a class="btn bg-info bg-warning" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=leaveall_report_v.mrt&memid=<?php echo $leea->emp_member; ?>"><i class="icon-printer4"></i></i></a></td>
						
    				<?php $n++; } ?></tr>
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
