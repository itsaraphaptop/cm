<style type="text/css">
#insForm .has-error .control-label,
#insForm .has-error .help-block,
#insForm .has-error .form-control-feedback {
    color: #f39c12;
}

#insForm .has-success .control-label,
#insForm .has-success .help-block,
#insForm .has-success .form-control-feedback {
    color: #18bc9c;
}
.borderless td, .borderless th {
    border: none;
}
</style>
<meta charset="utf-8">
<form action="<?php echo base_url(); ?>emp_profile/update_job/<?php echo $id; ?>" method="post">
<div class="content">
	<div class="panel panel-flat">
    	<div class="panel-heading">
    		<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    		<div class="panel-body">
    			<legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> แก้ไขข้อมูลประวัติการทำงาน</h4></legend>	
    			<div class="row">
		          	<div class="col-md-12">
		              <h1>ประวัติการทำงาน</h1>
		                  <?php
		                      $q = $this->db->query("select * from emp_job_tb where emp_member='$id'");
		                      $res = $q->result();
		                  ?>
		                  <table class="table table-bordered table-xxs table-hover">
		                    <thead>
		                      <tr>
		                        <th>ชื่อบริษัท</th>
		                        <th>ที่อยู่บริษัท</th>
		                        <th>ตำแห่นง</th>
		                        <th>ระยะเวลากี่ปี</th>
		                        <th>&nbsp;</th>
		                      </tr>
		                    </thead>
		                    <tbody id="body">
		                      <tr>
		                      <?php  foreach($res as $roww )  {?>
		                      <input type="hidden" name="chki[]" value="Y">
		                      <input type="hidden" name="job_id[]" value="<?php echo $roww->job_id;?>">
		                        <td>
		                        	<input type="text" name="job_name[]" id="job_name<?php echo $roww->job_id;?>" value="<?php echo $roww->job_name; ?>" class="form-control">
		                        </td>
		                        <td>
		                        	<input type="text" name="job_address[]" id="job_address<?php echo $roww->job_id;?>" value="<?php echo $roww->job_address; ?>" class="form-control">
		                        </td>
		                        <td>
		                        	<input type="text" name="job_position[]" id="job_position<?php echo $roww->job_id;?>" value="<?php echo $roww->job_position; ?>" class="form-control">
		                        </td>
		                        <td>ตั้งแต่ปี <input type="text" name="job_start[]" id="job_start" value="<?php echo $roww->job_start;?>" class="form-control"> ถึง <input type="text" name="job_end[]" id="job_end" value="<?php echo $roww->job_end;?>" class="form-control"> ปี </td>
		                        <td>
		                          <!-- <a href="<?php echo base_url(); ?>emp_profile/update_edu/<?php echo $id; ?>" title="update" class="label label-success"></a> -->
		                          
		                          <a href="<?php echo base_url(); ?>userprofile/edit_job/<?php echo $id; ?>" title="Delete" class="label label-danger">ลบ</a></td>
		                      </tr>
		                      <?php } ?>
		                    </tbody>
		                  </table>
		                  <br>
		              <a class="insrows pull-right btn btn-success"><i class="icon-plus2"></i>เพิ่ม</a>
		              <a id='delete_row<?php echo $roww->id; ?>' class="pull-right btn btn-danger">ลบแถว</a><br>
		          	</div>
        		</div>
    			</div>
			    <script>
			      $(".insrows").click(function(){
			        addrow();
			      });
			        function addrow(){
			          var row = ($('#body tr').length-0)+1;
			          var tr = '<tr>'+
			          '<input type="hidden" name="chki[]" value="i">'+
			          '<td>'+
			          '<input type="text" name="job_name[]" id="job_name'+row+'" class="form-control">'+
			          '</td>'+
			          '<td>'+
			          '<input type="text" name="job_address[]" id="job_address'+row+'" class="form-control">'+
			          '</td>'+
			          '<td>'+
			          '<input type="text" name="job_position[]" id="job_position'+row+'" class="form-control">'+
			          '</td>'+
			          '<td>'+
			          'ตั้งแต่ปี <input type="text" name="job_start[]" id="job_start'+row+'" class="form-control"> ถึง <input type="text" name="job_end[]" id="job_end'+row+'" class="form-control"> ปี'+
			          '</td>'+
			          '</tr>';
			          $('#body').append(tr);
			      }
			    </script>
				<button type="submit" class="btn btn-primary btn-xs" id="save" data-toggle="modal" data-target="#mdsave"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
				<br>
    		</div>
    	</div>
    </div>
</div>

</from>