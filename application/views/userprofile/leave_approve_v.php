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
	<div class="content">
		<div class="panel panel-flat">
    		<div class="panel-body">
    			<legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> อนุมัติการลา</h4> 
    			<div style="text-align: right;"><button class="openleave btn bg-purple-400 btn-ladda btn-ladda-progress" data-target="#openleave" type="button" data-toggle="modal">ประวัติการอนุมัติ</button></div>
    			</legend>	
    			<div class="row">
		          	<div class="col-md-12">
		          		<div class="dataTables_wrapper no-footer">
                			<div class="table-responsive">
                				<table class="table table-xxs table-bordered table-striped datatable-basic">
				                    <thead>
				                    	<tr align="center">
				                    		<th width="5%">#</th>
				                    		<th width="15%">ชื่อ - นามสกุล</th>
				                    		<th width="10%">ตั้งแต่วันที่</th>
				                    		<th width="10%">ถึงวันที่</th>
				                    		<th width="15%">ประเภทการลา</th>
				                    		<th width="15%">จำนวนวันลา</th>
				                    		<th width="15%">รายละเอียดการลา</th>
				                    		<th width="15%">จัดการ</th>
				                    		
				                    	</tr>
				                    </thead>
				                    <tbody id="body">
				                    <?php $n=1; foreach ($lea as $key) {
				                    	if ($key->status_approve == "W") {
				                    		if ($key->approve1 == $m_id) {
				                    			?>
				                    			<tr>
					                    	<td><?php echo $n; ?></td>
					                    	<td><?php echo $key->emp_name_t; ?></td>
					                    	<?php 
					                    	if ($key->start_date == null) {
					                    	?>
					                    	<td colspan="2" align="center">ลาครึ่งวัน</td>
					                    	<?php
					                    	 }
					                    	 else{
					                    	?>
					                    	<td><?php echo $key->start_date; ?></td>
					                    	<td><?php echo $key->end_date; ?></td>
					                    	<?php
					                    	 	}
					                    	 	$this->db->select('*');
										      	$this->db->from('master_leave');
										      	$this->db->where('le_id',$key->leave_type);
										      	// $this->db->where('emp_member','$m_id');
										      	$query_le = $this->db->get();
										      	$res_le = $query_le->result();
					                    	 	 ?>

				                    		<td><?php echo $key->name_leave; ?></td>
				                    		<?php
					                    		$tt = $key->leave_time/8;
												$num_time = number_format($tt,1);
												$ee = explode(".",$num_time);
											 ?>
											
											<?php 
											if ($ee[1] == 0) {
												$toto = 0;
											}else{
												$toto = $ee[1]-1;
												}
											 ?>
											 <td><?php echo $ee[0]; ?> วัน <?php echo $toto; ?>  ชั่วโมง</td>
					                    	<td><?php echo $key->leave_detail; ?></td>
					                    	<td><a class="btn btn-success" href="<?php echo base_url(); ?>emp_profile/save_approve/<?php echo $key->leave_id; ?>/<?php echo $m_id; ?>">อนุมัติ</a>&nbsp;&nbsp;<a class="btn btn-danger" href="<?php echo base_url(); ?>emp_profile/save_noapprove/<?php echo $key->leave_id; ?>">ไม่อนุมัติ</a></td>
				                    			<?php
				                    		}elseif ($key->approve2 == $m_id) {
				                    		?>
				                    		<tr>
					                    	<td><?php echo $n; ?></td>
					                    	<td><?php echo $key->emp_name_t; ?></td>
					                    	<?php 
					                    	if ($key->start_date == null) {
					                    	?>
					                    	<td colspan="2" align="center">ลาครึ่งวัน</td>
					                    	<?php
					                    	 }
					                    	 else{
					                    	?>
					                    	<td><?php echo $key->start_date; ?></td>
					                    	<td><?php echo $key->end_date; ?></td>
					                    	<?php
					                    	 	}
					                    	 	$this->db->select('*');
										      	$this->db->from('master_leave');
										      	$this->db->where('le_id',$key->leave_type);
										      	// $this->db->where('emp_member','$m_id');
										      	$query_le = $this->db->get();
										      	$res_le = $query_le->result();
					                    	 	 ?>

				                    		<td><?php echo $key->name_leave; ?></td>
				                    		<?php
					                    		$tt = $key->leave_time/8;
												$num_time = number_format($tt,1);
												$ee = explode(".",$num_time);
											 ?>
											
											<?php 
											if ($ee[1] == 0) {
												$toto = 0;
											}else{
												$toto = $ee[1]-1;
												}
											 ?>
											 <td><?php echo $ee[0]; ?> วัน <?php echo $toto; ?>  ชั่วโมง</td>
					                    	<td><?php echo $key->leave_detail; ?></td>
					                    	<td><a class="btn btn-success" href="<?php echo base_url(); ?>emp_profile/save_approve/<?php echo $key->leave_id; ?>/<?php echo $m_id; ?>">อนุมัติ</a>&nbsp;&nbsp;<a class="btn btn-danger" href="<?php echo base_url(); ?>emp_profile/save_noapprove/<?php echo $key->leave_id; ?>">ไม่อนุมัติ</a></td>
				                    		<?php
				                    		}
				                    		?>
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
		</div>
	</div>

<div id="openleave" class="modal fade in" data-backdrop="false">
	<div class="modal-dialog modal-full">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h5 class="modal-title">ประวัติการลา</h5>
	      	</div>
	      	<div class="modal-body">
        		<div class="form-group">
        			<div class="dataTables_wrapper no-footer">
            			<div class="table-responsive">
            				<table class="table table-xxs table-bordered table-striped datatable-basic">
            					<thead>
	            					<tr align="center">
	            						<th>#</th>
	            						<th>วันที่กรอก</th>
	            						<th>ชื่อ -นามสกุล</th>
	            						<th>ประเภทการลา</th>
	            						<th>มีความประสงค์ขอลา</th>
	            						<th>ลาตั้งแต่วันที่</th>
	            						<th>ถึงวันที่</th>
	            						<th>จำนวนวันลา</th>
	            						<th>การจัดการ</th>
	            					</tr>
            					</thead>
            					<tbody id="body">
            						<?php 
            						$query_ee = $this->db->query("SELECT * from emp_leave where approve1=$m_id or approve2=$m_id");
                    	 			$qq = $query_ee->result();
            						$n=1;	foreach ($qq as $leea) {
            						?>
            						<tr align="center">
            							<td><?php echo $n; ?></td>
            							<td><?php echo $leea->date_leave; ?></td>
            							<?php
				                    	 	$this->db->select('*');
									      	$this->db->from('emp_profile_tb');
									      	$this->db->where('emp_member',$leea->emp_member);
									      	$query_ll = $this->db->get();
									      	$res_ll = $query_ll->result();
				                    	?>
				                    	<?php
				                    	foreach ($res_ll as $lll) {
			                    		?>
			                    			<td><?php
			                    			if ($lll->emp_name_t != "") {
			                    				echo $lll->emp_name_t;
			                    			}
			                    			else{
			                    				echo " ";
			                    			}
			                    			?></td>
			                    		<?php
				                    	}
					                    ?>



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
					                    $tt = $leea->leave_time/8;
												$num_time = number_format($tt,1);
												$ee = explode(".",$num_time);
											 ?>
											
											<?php 
											if ($ee[1] == 0) {
												$toto = 0;
											}else{
												$toto = $ee[1]-1;
												}
											 ?>
											 <td><?php echo $ee[0]; ?> วัน <?php echo $toto; ?>  ชั่วโมง</td>
            							<?php 
            							if ($leea->status_approve =="W") {
            							?>
            								<td><button  class="btn btn-info" >รออนุมัติ</button> </td>
            							<?php
            							 } elseif ($leea->status_approve == "N") {
            							?>
            								<td><button class="btn btn-danger">ไม่อนุมัติ</button>&nbsp;&nbsp; <a class="btn bg-orange" href="<?php echo base_url(); ?>emp_profile/return_leave/<?php echo $leea->leave_id; ?>">ยกเลิก</a> </td>
            							<?php
            							 } else{
            							?>
            								<td><button class="btn btn-success" >อนุมัติแล้ว</button>&nbsp;&nbsp; <a class="btn bg-orange" href="<?php echo base_url(); ?>emp_profile/return_leave/<?php echo $leea->leave_id; ?>">ยกเลิก</a></td>
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
	</div>
</div>