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
          <div class="panel-body" align="right">
          		<a class="btn bg-info bg-warning" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=leave_report_v.mrt&memid=<?php echo $m_id; ?>"><i class="icon-printer4"></i></i></a> 
                </div>
                <div class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                <table class="table table-xxs table-bordered table-striped datatable-basic">
                  <thead>
                    <tr>
                    	<th>#</th>
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
						$query_ee = $this->db->query("select * from emp_leave where emp_leave.emp_id=$m_id");
        	 			$qq = $query_ee->result();	
							$n=1; foreach  ($qq as $leea) {
					?>
    					<tr style="text-align: center;">
    						<td><?php echo $n; ?></td>
							<td><?php echo $leea->date_leave; ?></td>
							<?php
	                    	 	$this->db->select('*');
						      	$this->db->from('master_leave');
						      	$this->db->where('le_id',$leea->type_master);
						      	$query_le = $this->db->get();
						      	$res_le = $query_le->result();
	                    	 	 ?>
	                    	<?php
	                    	foreach ($res_le as $lee) {
                    		?>
                    			<td><?php echo $lee->name_leave; ?></td>
                    		<?php
	                    	}
		                    ?>
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
								<td class="btn btn-info" >รออนุมัติ</td>
								<td>
	                        		<ul class="icons-list">
	                            		<li class="text-teal-600" type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#modal_leave<?php echo $leea->leave_id; ?>"><a href="#"><i class="icon-cog7"></i></a>
	                            		</li>
		                            	<li>
		                            		<a href="<?php echo base_url(); ?>index.php/emp_profile/del_leave/<?php echo $leea->leave_id; ?>"><i class="icon-trash"></i></a>
		                            	</li>
	                        		</ul>
                      			</td>
							<?php
							 } elseif ($leea->status_approve == "N") {
							?>
								<td class="btn btn-danger" >ไม่อนุมัติ</td>
								<td></td>
							<?php
							 } else{
							?>
							<td class="btn btn-success" >อนุมัติ</td>
							<td></td>
							<?php
							 }
							 ?>	
							
						</tr>
    				<?php $n++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
    </div>
  </div>
</div>

<?php foreach ($qq as $vvv) {	?>
<div id="modal_leave<?php echo $vvv->leave_id; ?>" class="modal fade" data-backdrop="false">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h5 class="modal-title">แก้ไขประวัติการลา<?php echo $vvv->leave_id; ?></h5>
        		<?php 
						if ($vvv->leave_time == 4) {
						?>
							<input type="hidden" name="check" class="check<?php echo $vvv->leave_id; ?>" value="times">
						<?php
						} else{
						?>
							<input type="hidden" name="check" class="check<?php echo $vvv->leave_id; ?>" value="dates">
						<?php
						}
					?>
      		</div>
      		<form action="<?php echo base_url(); ?>index.php/emp_profile/upd_leave/<?php echo $vvv->leave_id; ?>" method="post" id="upd_leave">
      			<div class="modal-body">
        			<div class="form-group">
          				<label class="col-lg-2 control-labelt">เรียน :</label>
            			<div class="col-lg-4">
              				<input type="text" class="form-control" id="leave_dear" name="leave_dear"  value="<?php echo $vvv->leave_dear; ?>" >
            			</div>

          				<label class="col-lg-2 control-labelt">มีความประสงค์ขอลา :</label>
            			<div class="col-lg-4">
              				<input type="text" class="form-control" id="leave_detail" name="leave_detail"  value="<?php echo $vvv->leave_detail; ?>" >
            			</div>
        			</div><br>

        			<div class="form-group">
          				<label class="col-lg-2 control-labelt">กลับมาทำงานวันที่ :</label>
            			<div class="col-lg-4">
              				<input type="date" class="form-control" id="leave_work" name="leave_work"  value="<?php echo $vvv->leave_work; ?>" >
            			</div>

          				<label class="col-lg-2 control-labelt">ประเภทการลา :</label>
            			<div class="col-lg-4">
	                    	<select id="type_master" name="type_master" class="form-control" >
	                    	<?php
	                    	foreach ($mas as $lee) {
		                    ?>
		                  <option value="<?php echo $lee->le_id; ?>"><?php echo $lee->name_leave;  ?></option> 
		                  <?php } ?>
              				</select>	
            			</div>
        			</div><br>
        			
						<div class="form-group" id="totime<?php echo $vvv->leave_id; ?>" class="totime">
	          				<label class="col-lg-3 control-labelt">ลาครึ่งวัน (จำนวนเวลาที่ลา) :</label>
	            			<div class="col-lg-2">
	              				<input type="text" class="form-control" id="leave_time<?php echo $vvv->leave_id; ?>" name="leave_time"  value="<?php echo $vvv->leave_time; ?>" readonly > 
	            			</div> ชั่วโมง
        				</div><br>
<input type="hidden" name="too" id="too<?php echo $vvv->leave_id; ?>" value="<?php echo $vvv->leave_time; ?>">
        				<div class="form-group" id="today<?php echo $vvv->leave_id; ?>" class="today">
	          				<label class="col-lg-2 control-labelt">ลาตั้งแต่วันที่  :</label>
	            			<div class="col-lg-4">
	              				<input type="date" class="form-control" id="start_date<?php echo $vvv->leave_id; ?>" name="start_date"  value="<?php echo $vvv->start_date; ?>" >
	            			</div>
	            		</div>
	            		<div class="form-group" id="today<?php echo $vvv->leave_id; ?>" class="tootime">
	          				<label class="col-lg-2 control-labelt">ถึงวันที่ :</label>
	            			<div class="col-lg-4">
	            			<input type="date" class="form-control" id="end_date<?php echo $vvv->leave_id; ?>" name="end_date"  value="<?php echo $vvv->end_date; ?>" >
	            			</div>
        				</div><br>

        				<div class="form-group" id="anss<?php echo $vvv->leave_id; ?>" >
        					<div class="col-lg-12" align="center">

        						<button type="button" class="btn btn-primary" id="answer<?php echo $vvv->leave_id; ?>"  onclick="leavecal<?php echo $vvv->leave_id; ?>();">คำนวน</button> &nbsp;&nbsp;
								<b>รวม</b> 
								<?php 
									$tt =$vvv->leave_time/8;
		                    	$num_time = number_format($tt,1);
		                    	$ee = explode(".",$num_time);
		                    	$leave_day = $ee[0];
								if ($ee[1] == 0) {
									$toto = 0;
								}else{
									$toto = $ee[1]-1;
									}
								 ?>
								<input type="text" value="<?php echo $leave_day ?>" id="leave_day<?php echo $vvv->leave_id; ?>" readonly="true" name="leave_day"  class="form-input" size="5" style="background: #eceaea;border-color: #cdb8b8;"> &nbsp; <b>วัน
        					</div>
        				</div>

        				<div class="form-group">
        					<div class="col-lg-12">
        					<label class="col-lg-2 control-labelt">เลือกวันลาใหม่ :</label>
        						<div id="checktime<?php echo $vvv->leave_id; ?>"><input name=""  type="checkbox" onclick="leavehalf<?php echo $vvv->leave_id; ?>();" value="0">ลาครึ่งวัน</div>
        						<div id="checkday<?php echo $vvv->leave_id; ?>"><input name=""  type="checkbox" onclick="leaveday<?php echo $vvv->leave_id; ?>();" value="0">ลารายวัน</div>
        						
        					</div>
        				</div>
        				<div class="form-group">
        					<label class="col-lg-2 control-labelt">มอบหมายงานให้ :</label>
	            			<div class="col-lg-4">
		                  		<select id="assign_leave" name="assign_leave" class="form-control" >
		                    	<?php
		                    	$dd = $this->db->query("select * from member where m_code='$vvv->assign_leave' ")->result(); 
								foreach ($dd as $lea) {
								$m_name = $lea->m_name;
								$m_idd = $lea->m_code;
								}
								?>
								<option value="<?php echo $m_idd; ?>"><?php echo $m_name;  ?></option> 
								<?php
		                    	$leee = $this->db->query("select * from member")->result(); 
		                    	foreach ($leee as $lea) {
		                		?>
			                   		<option value="<?php echo $lea->m_id; ?>"><?php echo $lea->m_name; ?></option>
		                		<?php
		                    	}
			                    ?>
			                    </select>
	            			</div>
        				</div>

        				<div class="modal-footer" style="margin-top:50px;">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save</button>
                  </div>    			
        		</div>
        	</form>
      	</div>
    </div>
</div>

<script>
$(window).load(function(){
	if ($(".check<?php echo $vvv->leave_id; ?>").val()=="dates") {
	 $("#today<?php echo $vvv->leave_id; ?>").show();
	 $("#tootime<?php echo $vvv->leave_id; ?>").show();
	 $("#anss<?php echo $vvv->leave_id; ?>").show();
	 $("#totime<?php echo $vvv->leave_id; ?>").hide();
	 $("#checktime<?php echo $vvv->leave_id; ?>").show();
	$("#checkday<?php echo $vvv->leave_id; ?>").hide();
	}else{
	$("#anss<?php echo $vvv->leave_id; ?>").hide();
	$("#today<?php echo $vvv->leave_id; ?>").hide();
	$("#tootime<?php echo $vvv->leave_id; ?>").hide();
	$("#totime<?php echo $vvv->leave_id; ?>").show();
	$("#checktime<?php echo $vvv->leave_id; ?>").hide();
	$("#checkday<?php echo $vvv->leave_id; ?>").show();
	}
});
function leavehalf<?php echo $vvv->leave_id; ?>(){
	// alert(<?php echo $vvv->leave_id; ?>);
	$("#totime<?php echo $vvv->leave_id; ?>").show();
	$("#today<?php echo $vvv->leave_id; ?>").hide();
	$("#anss<?php echo $vvv->leave_id; ?>").hide();
	$("#checktime<?php echo $vvv->leave_id; ?>").hide();
	$("#checkday<?php echo $vvv->leave_id; ?>").show();
	$('#start_date<?php echo $vvv->leave_id; ?>').val(" ");
	$('#end_date<?php echo $vvv->leave_id; ?>').val(" ");
	$('#leave_day<?php echo $vvv->leave_id; ?>').val(" ");
	$('#leave_time<?php echo $vvv->leave_id; ?>').val(4);
	$('#too<?php echo $vvv->leave_id; ?>').val(4);
	$('input[type="checkbox"]').prop('checked' , false);
};
function leaveday<?php echo $vvv->leave_id; ?>(){
	// alert(<?php echo $vvv->leave_id; ?>);
	$("#totime<?php echo $vvv->leave_id; ?>").hide();
	$("#today<?php echo $vvv->leave_id; ?>").show();
	$("#anss<?php echo $vvv->leave_id; ?>").show();
	$("#checktime<?php echo $vvv->leave_id; ?>").show();
	$("#checkday<?php echo $vvv->leave_id; ?>").hide();
	$('#start_date<?php echo $vvv->leave_id; ?>').val(" ");
	$('#end_date<?php echo $vvv->leave_id; ?>').val(" ");
	$('#leave_day<?php echo $vvv->leave_id; ?>').val(" ");
	$('input[type="checkbox"]').prop('checked' , false);
};
function leavecal<?php echo $vvv->leave_id; ?>(){
	var DateDiff = {
 
    inDays: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000));
    },
 
    inWeeks: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000*7));
    },
 
    inMonths: function(d1, d2) {
        var d1Y = d1.getFullYear();
        var d2Y = d2.getFullYear();
        var d1M = d1.getMonth();
        var d2M = d2.getMonth();
 
        return (d2M+12*d2Y)-(d1M+12*d1Y);
    },
 
    inYears: function(d1, d2) {
        return d2.getFullYear()-d1.getFullYear();
    }
}
 
var end_date = ($('#end_date<?php echo $vvv->leave_id; ?>').val());
var start_date = ($('#start_date<?php echo $vvv->leave_id; ?>').val());
var leave_time = ($('#leave_time<?php echo $vvv->leave_id; ?>').val());
var leave_day = ($('#leave_day<?php echo $vvv->leave_id; ?>').val());
var d1 = new Date(start_date);
var d2 = new Date(end_date);

	// alert(end_date);
	// alert(start_date);
var today = (DateDiff.inDays(d1, d2))+1;
var too = (today*8);
$('#leave_day<?php echo $vvv->leave_id; ?>').val(today);
$('#leave_time<?php echo $vvv->leave_id; ?>').val(0);
$('#too<?php echo $vvv->leave_id; ?>').val(too);
}
</script>
<?php } ?>





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
