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
<form action="<?php echo base_url(); ?>emp_profile/update_edu/<?php echo $id; ?>" method="post">
<div class="content">
	<div class="panel panel-flat">
    	<div class="panel-heading">
    		<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    		<div class="panel-body">
    			<legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> แก้ไขข้อมูลประวัติการศึกษา <?php echo $id; ?> </h4></legend>	
    			<div class="row">
		          	<div class="col-md-12">
		              <h1>ประวัติการศึกษา</h1>
		                  <?php
		                      $q = $this->db->query("select * from emp_edu_tb where emp_member='$id'");
		                      $res = $q->result();
		                  ?>
		                  <table class="table table-bordered table-xxs table-hover">
		                    <thead>
		                      <tr>
		                        <th>ระดับการศึกษา</th>
		                        <th>ชื่อสถาศึกษา</th>
		                        <th>สาขาวิชา</th>
		                        <th>ตั้งแต่ปี</th>
		                        <th>&nbsp;</th>
		                      </tr>
		                    </thead>
		                    <tbody id="body">
		                      <tr>
		                      <?php  foreach($res as $roww )  {?>
		                      <input type="hidden" name="chki[]" value="Y">
		                      <input type="hidden" name="edu_id[]" value="<?php echo $roww->edu_id;?>">
		                        <td>
		                        	<div class="input-group">
			          					<input type="text" class="form-control" readonly   name="edu_level[]" id="edu_level<?php echo $roww->edu_id;?>" value="<?php echo $roww->edu_level; ?>">
			          					<input type="hidden" name="groedu_code" id="groedu_code<?php echo $roww->edu_id;?>">
			          					<div class='input-group-btn'>
			          						<a class="btn btn-default btn-icon" data-toggle="modal" data-target="#open_groedu<?php echo $roww->edu_id;?>"><i class="icon-search4"></i></a>
			          					</div>
			          				</div>
		                        </td>
		                        <td>
		                        	<div class="input-group">
			          					<input type="text" class="form-control" readonly   name="edu_name[]" id="edu_name<?php echo $roww->edu_id;?>" value="<?php echo $roww->edu_name; ?>">
			          					<input type="hidden" name="edu_code" id="edu_code<?php echo $roww->edu_id;?>">
			          					<div class='input-group-btn'>
			          						<a class="btn btn-default btn-icon" data-toggle="modal" data-target="#open_eduu<?php echo $roww->edu_id;?>"><i class="icon-search4"></i></a>
			          					</div>
			          				</div>
		                        </td>
		                        <td>
		                        	<input type="text" name="edu_major[]" id="edu_major<?php echo $roww->edu_id;?>" value="<?php echo $roww->edu_major; ?>" class="form-control">
		                        </td>
		                        <td><input type="text" name="edu_yend[]" id="edu_yend" value="<?php echo $roww->edu_yend;?>" class="form-control"> </td>
		                        <td>
		                          <!-- <a href="<?php echo base_url(); ?>emp_profile/update_edu/<?php echo $id; ?>" title="update" class="label label-success"></a> -->
		                          
		                          <a href="<?php echo base_url(); ?>userprofile/edit_edu/<?php echo $id; ?>" title="Delete" class="label label-danger">ลบ</a></td>
		                      </tr>
		                      <?php } ?>
		                    </tbody>
		                  </table>
		                  <br>
		              <a class="insrows pull-right btn btn-success"><i class="icon-plus2"></i>เพิ่ม</a>
		              <a id='delete_row<?php echo $roww->id; ?>' class="pull-right btn btn-danger">ลบแถว</a><br>
		          	</div>
        		</div>
        		<div id="modaledu">
    			</div>

    			<div id="modaledu_ins">
    			</div>
    			<?php  foreach($res as $rowww)  {?>
    			<div id="open_groedu<?php echo $rowww->edu_id;?>" class="modal fade" data-backdrop="false"  >
		      		<div class='modal-dialog modal-lg'>
				      	<div class='modal-content'>
					      <div class='modal-header'>
					      	<button type='button' class='close' data-dismiss='modal'>&times;</button>
					      	<h5 class='modal-title'>เลือกระดับการศึกษา <?php echo $rowww->edu_id;?></h5>
					      </div>
					      	<div class='modal-body'>
							    <div>
								    <table class='table table-xxs table-hover datatable-basicxc' >
								      	<thead>
										    <tr>
											    <th>รหัสระดับการศึกษา</th>
											    <th>ระดับการศึกษา</th>
											    <th>จัดการ</th>
										    </tr>
										   </thead>
										   <tbody>
										    <?php foreach ($edu as $val){ ?>
										    <tr>
										    	<td><?php echo $val->groedu_code; ?></td>
										    	<td><?php echo $val->groedu_name; ?></td>
										    	<td><button class="openeducationall<?php echo $rowww->edu_id;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-code="<?php echo $val->groedu_code; ?>" data-name="<?php echo $val->groedu_name; ?>" data-dismiss="modal">เลือก</button></td>
										    </tr>
									    	<?php } ?>
									    </tbody>
								    </table>
							    </div>
			      			</div>
			      		</div>
			      	</div>
			    </div>
			    <script>
			    $(".openeducationall<?php echo $rowww->edu_id;?>").click(function(event) {
			      $("#edu_level<?php echo $rowww->edu_id;?>").val($(this).data('name'));
			      $("#groedu_name<?php echo $rowww->edu_id;?>").val($(this).data('code'));
			      });
			    </script>

			    <div id="open_eduu<?php echo $rowww->edu_id;?>" class="modal fade" data-backdrop="false"  >
		      		<div class='modal-dialog modal-lg'>
				      	<div class='modal-content'>
					      <div class='modal-header'>
					      	<button type='button' class='close' data-dismiss='modal'>&times;</button>
					      	<h5 class='modal-title'>เลือกระดับการศึกษา <?php echo $rowww->edu_id;?></h5>
					      </div>
					      	<div class='modal-body'>
							    <div>
								    <table class='table table-xxs table-hover datatable-basicxc' >
								      	<thead>
										    <tr>
											    <th>รหัสสถาบันการศึกษา</th>
											    <th>ชื่อสถาบันการศึกษา</th>
											    <th>สาขาวิชา</th>
											    <th>จัดการ</th>
										    </tr>
										   </thead>
										   <tbody>
										    <?php foreach ($eduu as $val){ ?>
										    <tr>
										    	<td><?php echo $val->edu_code; ?></td>
										    	<td><?php echo $val->edu_name; ?></td>
										    	<td><?php echo $val->edu_major; ?></td>
										    	<td><button class="openeduc<?php echo $rowww->edu_id;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-code="<?php echo $val->edu_major; ?>" data-name="<?php echo $val->edu_name; ?>" data-dismiss="modal">เลือก</button></td>
										    </tr>
									    	<?php } ?>
									    </tbody>
								    </table>
							    </div>
			      			</div>
			      		</div>
			      	</div>
			    </div>

			    <script>
			    $(".openeduc<?php echo $rowww->edu_id;?>").click(function(event) {
			      $("#edu_name<?php echo $rowww->edu_id;?>").val($(this).data('name'));
			      $("#edu_major<?php echo $rowww->edu_id;?>").val($(this).data('code'));
			      });
			    </script>
				<?php } ?>
    			

			    <script>
			      $(".insrows").click(function(){
			        addrow();
			      });
			        function addrow(){
			          var row = ($('#body tr').length-0)+1;
			          var tr = '<tr>'+
			          '<input type="hidden" name="chki[]" value="i">'+
			          '<td>'+
			          '<div class="input-group">'+
			          '<input type="text" class="form-control" readonly   name="edu_level[]" id="groedu_name'+row+'">'+
			          '<input type="hidden" name="groedu_code[]" id="groedu_code'+row+'">'+
			          "<div class='input-group-btn'>"+
			          '<a class="btn btn-default btn-icon" data-toggle="modal" data-target="#open_groedu'+row+'"><i class="icon-search4"></i></a>'+
			          '</div>'+
			          '</div>'+
			          '</td>'+
			          '<td>'+
			          '<div class="input-group">'+
			          '<input type="text" class="form-control" readonly   name="edu_name[]" id="edu_name'+row+'">'+
			          '<input type="hidden" name="edu_code[]" id="edu_code'+row+'">'+
			          "<div class='input-group-btn'>"+
			          '<a class="btn btn-default btn-icon" data-toggle="modal" data-target="#open_edu'+row+'"><i class="icon-search4"></i></a>'+
			          '</div>'+
			          '</div>'+
			          '</td>'+
			          '<td>'+
			          '<input type="text" name="edu_major[]" id="edu_major'+row+'" class="form-control">'+
			          '</td>'+
			          '<td>'+
			          '<input type="text" name="edu_yend[]" id="edu_year'+row+'" class="form-control">'+
			          '</td>'+
			          '</tr>';
			          $('#body').append(tr);

			      var modaleduu = '<div id="open_groedu'+row+'" class="modal fade" data-backdrop="false">'+
			      " <div class='modal-dialog modal-lg'>"+
			      "<div class='modal-content'>"+
			      "<div class='modal-header'>"+
			      "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
			      "<h5 class='modal-title'>เลือกระดับการศึกษา</h5>"+
			      "</div>"+
			      "<div class='modal-body'>"+
			      "<div>"+
			      "<table class='table table-xxs table-hover datatable-basicxc' >"+
			      "<thead>"+
			      "<tr>"+
			      "<th>รหัสระดับการศึกษา</th>"+
			      "<th>ระดับการศึกษา</th>"+
			      "<th>จัดการ</th>"+
			      "</tr>"+
			      "</thead>"+
			      "<tbody>"+
			      "<?php foreach ($edu as $val){ ?>"+
			      "<tr>"+
			      "<td><?php echo $val->groedu_code; ?></td>"+
			      "<td><?php echo $val->groedu_name; ?></td>"+
			      '<td><button class="open1'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-code="<?php echo $val->groedu_code; ?>" data-name="<?php echo $val->groedu_name; ?>" data-dismiss="modal">เลือก</button></td>'+
			      "</tr>"+
			      "<?php } ?>"+
			      "</tbody>"+
			      "</table>"+
			      "</div>"+
			      "</div>";
			      $("#modaledu").append(modaleduu);

			      var madaleduca = '<div id="open_edu'+row+'" class="modal fade" data-backdrop="false">'+
			      " <div class='modal-dialog modal-lg'>"+
			      "<div class='modal-content'>"+
			      "<div class='modal-header'>"+
			      "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
			      "<h5 class='modal-title'>เลือกระดับการศึกษา</h5>"+
			      "</div>"+
			      "<div class='modal-body'>"+
			      "<div>"+
			      "<table class='table table-xxs table-hover datatable-basicxc' >"+
			      "<thead>"+
			      "<tr>"+
			      "<th>รหัสสถาบันการศึกษา</th>"+
			      "<th>ชื่อสถาบันการศึกษา</th>"+
			      "<th>สาขาวิชา</th>"+
			      "<th></th>"+
			      "</tr>"+
			      "</thead>"+
			      "<tbody>"+
			      "<?php foreach ($eduu as $val){ ?>"+
			      "<tr>"+
			      "<td><?php echo $val->edu_code; ?></td>"+
			      "<td><?php echo $val->edu_name; ?></td>"+
			      "<td><?php echo $val->edu_major; ?></td>"+
			      '<td><button class="open2'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-code="<?php echo $val->edu_code; ?>" data-name="<?php echo $val->edu_name; ?>" data-major="<?php echo $val->edu_major; ?>" data-dismiss="modal">เลือก</button></td>'+
			      "</tr>"+
			      "<?php } ?>"+
			      "</tbody>"+
			      "</table>"+
			      "</div>"+
			      "</div>";
			      $("#modaledu_ins").append(madaleduca);

			      $(".open1"+row).click(function(event) {
			      $("#groedu_code"+row).val($(this).data('code'));
			      $("#groedu_name"+row).val($(this).data('name'));
			      });

			      $(".open2"+row).click(function(event) {
			      $("#edu_name"+row).val($(this).data('name'));
			      $("#edu_major"+row).val($(this).data('major'));
			      });
			      }
			    </script>
				<button type="submit" class="btn btn-primary btn-xs" id="save" data-toggle="modal" data-target="#mdsave"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
				<br>
    		</div>
    	</div>
    </div>
</div>

</from>