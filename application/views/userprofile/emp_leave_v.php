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
<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
		</div>
	</div>
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="http://localhost/mekareport/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
			<li><a href="http://localhost/mekareport/inventory/receive_transfer_store"></a></li>
		</ul>
	</div>
</div>
<?php foreach ($com as $key) {
	$emp_code = $key->emp_code;
	$emp_project = $key->emp_project;
	$emp_position = $key->emp_position;
	$emp_department = $key->emp_department;
	$emp_lead = $key->emp_lead;
	$emp_lead2 = $key->emp_lead2;
	$emp_status = $key->emp_status;
	$emp_member = $key->emp_member;
	$emp_agework = $key->emp_agework;
} 
foreach ($pro as $prof) {
	$emp_name = $prof->emp_name_t;
	$emp_title = $prof->emp_title;
	$emp_email = $prof->emp_email;
}
if ($emp_project == "") {
	$project = "";
}
$pro = $this->db->query("select * from project where project_id='$emp_project'")->result(); 
foreach ($pro as $proj) {
$project = $proj->project_name;
}

if ($emp_department == "") {
	$department ="";
}

$de = $this->db->query("select * from department where department_id='$emp_department'")->result(); 
foreach ($de as $dep) {
$department = $dep->department_title;
}

if ($emp_lead == "") {
	$m_name = "";
	$m_idd = "";
	$m_name2 = "";
	$m_idd2 = "";

}
$le = $this->db->query("select * from member where m_id='$emp_lead'")->result(); 
foreach ($le as $lea) {
$m_name = $lea->m_name;
$m_idd = $lea->m_id;
}
$le2 = $this->db->query("select * from member where m_id='$emp_lead2'")->result(); 
foreach ($le2 as $lea2) {
$m_name2 = $lea2->m_name;
$m_idd2 = $lea2->m_id;
}

if ($emp_title==1) {
	$title = "นาย";
} elseif ($emp_title==2) {
	$title = "นาง";
}elseif ($emp_title==3) {
	$title = "นางสาว";
}else {
	$title = " " ;
} 
?>
<div class="page-container" style="min-height:314px; ">
	<div class="content">
		<div class="panel panel-flat">
			<div class="content" style="font-size: 16px;">
			
				<div class="row">
					<legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> การลา</h4> 
					<!-- <div style="text-align: right;">
					 	<a href="<?php echo base_url(); ?>userprofile/edit_leave/<?php echo $m_id; ?>">
					 		<button class="openleave btn bg-purple-400 btn-ladda btn-ladda-progress">ประวัติการลา</button>
					 	</a>
					 </div> -->
					</legend>			
				</div>
			<form method="post" action="<?php echo base_url(); ?>emp_profile/leave_date">
				<div class="row">
					<div class="col-xs-4">
					<input type="hidden" value="<?php echo $m_id; ?>" id="m_id" name="m_id">
					<input type="hidden" value="<?php echo $emp_member; ?>" id="emp_member" name="emp_member">
						<b>รหัสพนักงาน :</b> <?php echo $emp_code; ?>
					</div>

					<div class="col-xs-4">
					 	<b>ชื่อ - นามสกุล :</b><?php echo $title; ?>  <?php echo $emp_name; ?>
					</div>
					<div class="col-xs-4">
						<b>วันที่กรอก :</b>  <input type="date" name="date_leave" id="date_leave" value="" class="form-input" required >
					</div>
				</div>

				<div class="row">
					<div class="col-xs-4">
						<b>โครงการ :</b> <?php echo $project; ?>
					</div>
					<div class="col-xs-4">
						<b>แผนก :</b> <?php echo $department; ?>
					</div>
					<div class="col-xs-4">
						<b>ตำแหน่ง :</b> <?php echo $emp_position; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-4">
						<b>เรียน  :  </b><input class="form-input" type="text" name="leave_dear" id="leave_dear" size="40" required >
					</div>
					<div class="col-xs-4">
						<b>ผู้บังคับบัญชาสูงสุด  :  </b><?php echo $m_name; ?> <input type="hidden" name="m_code" id="m_code" value="<?php echo $m_idd; ?>">
					</div>
					<div class="col-xs-4">
						<b>ผู้บังคับบัญชาขั้นต้น  :  </b><?php echo $m_name2; ?> <input type="hidden" name="m_code2" id="m_code2" value="<?php echo $m_idd2; ?>">
					</div>
					
				</div>
				<div class="row">
				<div class="col-xs-4">
					<b>ประเภทการลา  :  </b>
						<select class="form-input" style="width: 150px;" name="leave_master" id="leave_master">
						<?php 
							if ($emp_status==1) {
							foreach ($mas as $mass) {
						?>
						<option value="<?php echo $mass->le_id; ?>"><?php echo $mass->name_leave; ?></option>
						<?php
						}
						}else{
							foreach ($ma as $mss) {
						?>
						<option value="<?php echo $mss->le_id; ?>"><?php echo $mss->name_leave; ?></option>
						<?php
							}
						}	
						 ?>
						</select>
					</div>
					<div class="col-xs-8">
						<b>เหตุผลที่ขอลา </b>&nbsp;<input type="text" id="leave_detail" name="leave_detail" class="form-input" size="100" required >
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2">
						<b class="checkbox-inline"><input name="half_day" id="half_day"  type="checkbox" onclick="leavehalf();" value="0">ลาครึ่งวัน</b>&nbsp;&nbsp; <b>ตั้งแต่วันที่</b> &nbsp;&nbsp;
					</div>
					<div class="col-xs-5">
						<div class="start">
							<input type="date" id="start_date" name="start_date" class="form-input" value="0"> วัน
 						</div>
						
					</div>
					<div class="col-xs-3">
						<div class="end">
							<b>ถึงวันที่</b> &nbsp;&nbsp;                    
	                        <input type="date" id="end_date" name="end_date" class="form-input" value="0"> วัน
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12" align="center">
					<button type="button" class="btn btn-primary" id="answer"  onclick="leavecal();">คำนวน</button> &nbsp;&nbsp;
						<b>รวม</b> <input type="text" id="leave_day" readonly="true" name="leave_day" class="form-input" size="5"> &nbsp; <b>วัน</b> <input type="text" readonly="true" id="leave_time" name="leave_time" class="form-input" size="5"> <b>ชั่วโมง</b>
						<input type="hidden" name="too" id="too"> 
					</div>
				</div>
				<br>
				<div class="row">
				 	<div class="col-xs-4">
				 		<b>กลับมาทำงานวันที่</b> &nbsp; <input type="text" name="leave_work" id="leave_work" class="form-input" required readonly="true">
				 	</div>
				 	<div class="col-xs-8">
				 		<b>มอบหมายงานให้ </b>
				 		<select name="assign_leave" id="assign_leave" class="form-input" >
				 		<?php 
							$mm = $this->db->query("SELECT * from member where m_position='3' ")->result(); 
							foreach ($mm as $mem) {
						?>
							<option value="<?php echo $mem->m_code; ?>"><?php echo $mem->m_name; ?></option>
						<?php
							}
				 		 ?>
				 		</select>
				 	</div>
				</div>
				<br>
<button type="submit" class="btn btn-primary btn-xs" id="save" data-toggle="modal" data-target="#mdsave"><i class="fa fa-floppy-o" aria-hidden="true" style="text-align: center;"></i> บันทึก</button>
				</form>
				<div class="row">
					<div class="col-xs-12">
						<table border="1" class="table table-bordered table-xxs table-hover">
							<thead>
							
								<tr>
									<th>#</th>
									<th>ประเภทการลา</th>
									<th>วันลายกมา</th>
									<th>วันลาปีนี้</th>
									<th>รวมวันลาได้</th>
									<th>จำนวนวัน</th>
									<th>ชั่วโมง</th>
								</tr>
							</thead>
							<tbody>
							<?php
							if ($emp_status ==2) {	
                    	 $n=1; foreach ($ma as $key) {
                    	 $B1 = $this->db->query("select sum(leave_time) as totime from emp_leave where type_master=$key->le_id and emp_member='$emp_member' ");
                    	 	$bb1 = $B1->result();					      	
							 	?>
							<tr>
								<td></td>
								<td><?php echo $key->name_leave; ?></td>
								<td></td>
								<td><?php echo $key->day_leave; ?></td>
								<td><?php echo $key->day_leave; ?></td>
								<?php 
								foreach ($bb1 as $cc) {
									$tt = $cc->totime/8;
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
								<?php  } ?>
								<?php $n++; } ?>

							</tr>
							
							<?php	
							} else{
							 $n=1; foreach ($ma as $v2) {
							 	$B2 = $this->db->query("select sum(leave_time) as totime from emp_leave where type_master=$v2->le_id and emp_member='$emp_member' ");
                    	 	$bb2 = $B2->result();
							 	?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $v2->name_leave; ?></td>
								<td></td>
								<td><?php echo $v2->day_leave; ?></td>
								<td><?php echo $v2->day_leave; ?></td>
								<?php 
								foreach ($bb2 as $cc) {
									$tt = $cc->totime/8;
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
								<?php  } ?>
								<?php $n++; } ?>
							</tr>
							<tr>
							<?php
							$bb = $this->db->query("select * from master_leave where type_leave = '3'")->result();
								foreach ($bb as $vv) {
								$name_leave=$vv->name_leave;
								$day_leave=$vv->day_leave;
								if ($emp_agework<=3) {
									$lday=$day_leave;
								}elseif ($emp_agework >=3 && $emp_agework<=6) {
									$lday=$day_leave+1;
								}elseif ($emp_agework >=6 && $emp_agework<=10) {
									$lday=$day_leave+2;
								}else{
									$lday=$day_leave+3;
								}
								$leaveid = $vv->le_id;
							}
							 $e = $this->db->query("SELECT sum(leave_time) as totime from emp_leave where type_master=$leaveid and emp_member='$emp_member' ")->result();
							 ?>
								<td><?php echo $n; ?></td>
								<td><?php echo $name_leave; ?></td>
								<td></td>
								<td><?php echo $lday; ?></td>
								<td><?php echo $lday; ?></td>
								<?php 
								foreach ($e as $p) {
									$tt = $p->totime/8;
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
								<?php  } ?>
							</tr>
							<?php
							}	
							?>				
						</table>
					</div>
				</div>
							
			</div>
		</div>
	</div>
</div>
<script>
function leavecal(){
	var DateDiff = {
 
    inDays: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000));
    },
 
    inWeeks: function(d1) {
        var t1 = d1.getTime();
 
        return parseInt((t1)/(24*3600*1000*7));
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
 
var end_date = ($('#end_date').val());
var start_date = ($('#start_date').val());
var start_time = ($('#start_time').val());
var end_time = ($('#end_time').val());
var leave_day = ($('#leave_day').val());
var d1 = new Date(start_date);
var d2 = new Date(end_date);

var today = (DateDiff.inDays(d1, d2))+1;
var too = (today*8);
$('#leave_day').val(today);
$('#leave_time').val(0);
$('#too').val(too);

var year =end_date.substring(0,4);
var month =end_date.substring(7,5);
var dd =end_date.substring(8,11);
var ddd = parseInt(dd)+1;
$('#leave_work').val(month+"/"+ddd+"/"+year);
}

function leavehalf(){
	$(".end").hide();
	$("#answer").hide();
$('#leave_day').val(0);
$('#leave_time').val(4);
$('#too').val(4);
$("#start_date").change(function(){
		var start = ($('#start_date').val());
		var year =start.substring(0,4);
      	var month =start.substring(7,5);
		var dd =start.substring(8,11);
		var ddd = parseInt(dd)+1;
		$('#leave_work').val(month+"/"+ddd+"/"+year);
	} );
	}
</script>


