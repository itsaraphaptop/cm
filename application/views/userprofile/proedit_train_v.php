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
<form action="<?php echo base_url(); ?>emp_profile/proupdate_train/<?php echo $id; ?>" method="post">
<div class="content">
	<div class="panel panel-flat">
    	<div class="panel-heading">
    		<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    		<div class="panel-body">
    			<legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> แก้ไขข้อมูลประวัติการทำงาน</h4></legend>	
    			<div class="row">
		          	<div class="col-md-12">
		              <h1>ประวัติฝึกอบรม</h1>
		                  <?php
		                      $q = $this->db->query("select * from emp_train_tb where emp_member='$id'");
		                      $res = $q->result();
		                  ?>
		                  <table class="table table-bordered table-xxs table-hover">
		                    <thead>
		                      <tr>
		                        <th colspan="2">ระยะเวลา</th>
		                        <th>สถาบัน/หน่วยงาน/บริษัท</th>
		                        <th>หลักสูตร/ตำแหน่ง</th>
		                        <th>&nbsp;</th>
		                      </tr>
		                    </thead>
		                    <tbody id="body">
		                      <tr>
		                      <?php  foreach($res as $roww )  {?>
		                      <input type="hidden" name="chki[]" value="Y">
		                      <input type="hidden" name="train_id[]" value="<?php echo $roww->train_id;?>">
		                        <td>
		                        	ตั้งแต่ เดือน 
		                        		 <select class="form-inline form-control input-sm" id="skill_start_month" name="skill_start_month[]">							                
							                <?php 
							                if($roww->skill_start_month== 'มกราคม'){ ?><option value="มกราคม" selected>มกราคม</option><?php } else { ?><option value="มกราคม">มกราคม</option><?php }?>

							                <?php 
							                if($roww->skill_start_month== 'กุมภาพันธ์'){ ?><option value="กุมภาพันธ์" selected>กุมภาพันธ์</option><?php } else { ?><option value="กุมภาพันธ์">กุมภาพันธ์</option><?php }?>
							                
							                <?php 
							                if($roww->skill_start_month== 'มีนาคม'){ ?><option value="มีนาคม" selected>มีนาคม</option><?php } else { ?><option value="มีนาคม">มีนาคม</option><?php }?>
							                
							                <?php 
							                if($roww->skill_start_month== 'เมษายน'){ ?><option value="เมษายน" selected>เมษายน</option><?php } else { ?><option value="เมษายน">เมษายน</option><?php }?>

							                <?php 
							                if($roww->skill_start_month== 'พฤษภาคม'){ ?><option value="พฤษภาคม" selected>พฤษภาคม</option><?php } else { ?><option value="พฤษภาคม">พฤษภาคม</option><?php }?>

							                <?php 
							                if($roww->skill_start_month== 'มิถุนายน'){ ?><option value="มิถุนายน" selected>มิถุนายน</option><?php } else { ?><option value="มิถุนายน">มิถุนายน</option><?php }?>
							                
							                <?php 
							                if($roww->skill_start_month== '7'){ ?><option value="3" selected>กรกฎาคม</option><?php } else { ?><option value="7">กรกฎาคม</option><?php }?>
							                
							                <?php 
							                if($roww->skill_start_month== 'สิงหาคม'){ ?><option value="สิงหาคม" selected>สิงหาคม</option><?php } else { ?><option value="สิงหาคม">สิงหาคม</option><?php }?>

							                <?php 
							                if($roww->skill_start_month== 'กันยายน'){ ?><option value="กันยายน" selected>กันยายน</option><?php } else { ?><option value="กันยายน">กันยายน</option><?php }?>

							                <?php 
							                if($roww->skill_start_month== 'ตุลาคม'){ ?><option value="ตุลาคม" selected>ตุลาคม</option><?php } else { ?><option value="ตุลาคม">ตุลาคม</option><?php }?>
							                
							                <?php 
							                if($roww->skill_start_month== 'พฤศจิกายน'){ ?><option value="พฤศจิกายน" selected>พฤศจิกายน</option><?php } else { ?><option value="พฤศจิกายน">พฤศจิกายน</option><?php }?>
							                
							                <?php 
							                if($roww->skill_start_month== 'ธันวาคม'){ ?><option value="ธันวาคม" selected>ธันวาคม</option><?php } else { ?><option value="">ธันวาคม</option><?php }?>
							             </select>  ปี
		                        	จนถึง เดือน 
		                        	<input type="text" name="skill_start_years[]" id="skill_start_years<?php echo $roww->train_id;?>" value="<?php echo $roww->skill_start_years; ?>" class="form-control">
		                        </td>
		                        <td>
		                        	ตั้งแต่ เดือน 
		                        	<select class="form-inline form-control input-sm" id="skill_end_month" name="skill_end_month[]">							                
							                <?php 
							                if($roww->skill_end_month== 'มกราคม'){ ?><option value="มกราคม" selected>มกราคม</option><?php } else { ?><option value="มกราคม">มกราคม</option><?php }?>

							                <?php 
							                if($roww->skill_end_month== 'กุมภาพันธ์'){ ?><option value="กุมภาพันธ์" selected>กุมภาพันธ์</option><?php } else { ?><option value="กุมภาพันธ์">กุมภาพันธ์</option><?php }?>
							                
							                <?php 
							                if($roww->skill_end_month== 'มีนาคม'){ ?><option value="มีนาคม" selected>มีนาคม</option><?php } else { ?><option value="มีนาคม">มีนาคม</option><?php }?>
							                
							                <?php 
							                if($roww->skill_end_month== 'เมษายน'){ ?><option value="เมษายน" selected>เมษายน</option><?php } else { ?><option value="เมษายน">เมษายน</option><?php }?>

							                <?php 
							                if($roww->skill_end_month== 'พฤษภาคม'){ ?><option value="พฤษภาคม" selected>พฤษภาคม</option><?php } else { ?><option value="พฤษภาคม">พฤษภาคม</option><?php }?>

							                <?php 
							                if($roww->skill_end_month== 'มิถุนายน'){ ?><option value="มิถุนายน" selected>มิถุนายน</option><?php } else { ?><option value="มิถุนายน">มิถุนายน</option><?php }?>
							                
							                <?php 
							                if($roww->skill_end_month== '7'){ ?><option value="3" selected>กรกฎาคม</option><?php } else { ?><option value="7">กรกฎาคม</option><?php }?>
							                
							                <?php 
							                if($roww->skill_end_month== 'สิงหาคม'){ ?><option value="สิงหาคม" selected>สิงหาคม</option><?php } else { ?><option value="สิงหาคม">สิงหาคม</option><?php }?>

							                <?php 
							                if($roww->skill_end_month== 'กันยายน'){ ?><option value="กันยายน" selected>กันยายน</option><?php } else { ?><option value="กันยายน">กันยายน</option><?php }?>

							                <?php 
							                if($roww->skill_end_month== 'ตุลาคม'){ ?><option value="ตุลาคม" selected>ตุลาคม</option><?php } else { ?><option value="ตุลาคม">ตุลาคม</option><?php }?>
							                
							                <?php 
							                if($roww->skill_end_month== 'พฤศจิกายน'){ ?><option value="พฤศจิกายน" selected>พฤศจิกายน</option><?php } else { ?><option value="พฤศจิกายน">พฤศจิกายน</option><?php }?>
							                
							                <?php 
							                if($roww->skill_end_month== 'ธันวาคม'){ ?><option value="ธันวาคม" selected>ธันวาคม</option><?php } else { ?><option value="">ธันวาคม</option><?php }?>
							             </select>
		                        	  ปี
		                        	จนถึง เดือน <input type="text" name="skill_end_years[]" id="skill_end_years<?php echo $roww->train_id;?>" value="<?php echo $roww->skill_end_years; ?>" class="form-control">
		                        </td>
		                        <td>
		                        	<input class="form-control" type="text" name="skill_code[]" id="skill_code" value="<?php echo $roww->skill_code ;?>">
		                        </td>
		                        <td>
		                        	<input class="form-control" type="text" name="skill_tpos[]" id="skill_tpos" value="<?php echo $roww->skill_tpos ;?>">
		                        </td>
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
			          'ตั้งแต่ เดือน <select class="form-inline form-control input-sm" id="skill_start_month" name="skill_start_month[]">'+
			          '<option value="มกราคม">มกราคม</option>'+
			          '<option value="กุมภาพันธ์">กุมภาพันธ์</option>'+
			          '<option value="มีนาคม">มีนาคม</option>'+
			          '<option value="เมษายน">เมษายน</option>'+
			          '<option value="พฤษภาคม">พฤษภาคม</option>'+
			          '<option value="มิถุนายน">มิถุนายน</option>'+
			          '<option value="กรกฎาคม">กรกฎาคม</option>'+
			          '<option value="สิงหาคม">สิงหาคม</option>'+
			          '<option value="กันยายน">กันยายน</option>'+
			          '<option value="ตุลาคม">ตุลาคม</option>'+
			          '<option value="พฤศจิกายน">พฤศจิกายน</option>'+
			          '<option value="ธันวาคม">ธันวาคม</option>'+
			          '</select> ปี <input type="text" class="form-control" id="skill_start_years" name="skill_start_years[]">'+
			          '</td>'+
			          '<td>'+
			          'ตั้งแต่ เดือน <select class="form-inline form-control input-sm" id="skill_end_month" name="skill_end_month[]">'+
			          '<option value="มกราคม">มกราคม</option>'+
			          '<option value="กุมภาพันธ์">กุมภาพันธ์</option>'+
			          '<option value="มีนาคม">มีนาคม</option>'+
			          '<option value="เมษายน">เมษายน</option>'+
			          '<option value="พฤษภาคม">พฤษภาคม</option>'+
			          '<option value="มิถุนายน">มิถุนายน</option>'+
			          '<option value="กรกฎาคม">กรกฎาคม</option>'+
			          '<option value="สิงหาคม">สิงหาคม</option>'+
			          '<option value="กันยายน">กันยายน</option>'+
			          '<option value="ตุลาคม">ตุลาคม</option>'+
			          '<option value="พฤศจิกายน">พฤศจิกายน</option>'+
			          '<option value="ธันวาคม">ธันวาคม</option>'+
			          '</select> ปี <input type="text" class="form-control" id="skill_end_years" name="skill_end_years[]">'+
			          '</td>'+
			          '<td>'+
			          '<input type="text" name="skill_code[]" id="skill_code'+row+'" class="form-control">'+
			          '</td>'+
			          '<td>'+
			          '<input type="text" name="skill_tpos[]" id="skill_tpos'+row+'" class="form-control">'+
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