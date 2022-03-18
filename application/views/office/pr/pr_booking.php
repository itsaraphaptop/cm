
<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Purchase Requisition Booking</h5>
			</div>
			<div class="panel-body">
				<?php
					// var_dump($data_project);
				?>
				<form method="POST" action="<?= base_url() ?>pr_active/save_booking">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>PR Booking No. </label>
								<input type="text" readonly="true" class="form-control" readonly="readonly" id="pr_booking" name="pb_no" value="<?= $pb_code ?>" >
							</div>
							<div class="form-group">
								<label>Requestor </label>
								<div class="input-group">
									<span class="input-group-btn">
										<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
									</span>
									<input type="text" class="form-control" readonly="readonly" name="memname" id="memname" placeholder="กรอกผู้ขอซื้อ" value="<?php echo $name; ?>">
									<input type="hidden" name="memid" id="memid" value="<?php echo $mid; ?>">
									<div class="input-group-btn">
										<button type="button" class="openmember btn btn-info btn-icon" data-toggle="modal" data-target="#openmember"><i class="icon-search4"></i></button>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label>Project</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="icon-office" ></i></span>
									<input type="text" readonly="true" name="project_name" class="form-control" value="<?= $data_project[0]->project_name ?>">
									<input type="hidden" name="project_id" value="<?= $data_project[0]->project_id?>">
									<input type="hidden" class="form-control" name="c_bk" id="c_bk" value="<?php if ($data_project[0]->c_bk == 0) {echo "approve";} else {echo "wait";}?>">
									<input type="hidden" name="pjcode" value="<?= $data_project[0]->project_code?>">

								</div>
							</div>
							<div class="form-group">
								<label>Department </label>
								<div class="input-group">
									<span class="input-group-btn">
										<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
									</span>
									<input type="text" class="form-control" readonly="readonly" placeholder="แผนก" value="" name="depname" id="depname">
									<div class="input-group-btn">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Remark </label>
								<textarea rows="5" cols="5" id="c" class="form-control" required="required" placeholder="หมายเหตุ" name="remark"></textarea>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Request Date</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="icon-calendar22"></i></span>
									<input type="date" class="form-control" id="pbdate" name="pbdate" value="<?php echo date("Y-m-d");?>" >
								</div>
							</div>
							<div class="form-group">
								<label>Delivery Date</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="icon-calendar22"></i></span>
									<input type="date" class="form-control" id="deliverydate" name="deliverydate">
								</div>
							</div>
							<div class="form-group">
								<label for="code">System </label>
								<select class="form-control" name="system" id="system" required="">
									<option value=""></option>
									<?php foreach ($array_system as $key => $system) { ?>
									<option value="<?=$system["value"]?>"><?=$system["name"]?></option>
									<?php }?>
								</select>
							</div>
							<div class="form-group">
								<label for="code">&nbsp;</label>
								<br/><br/><br/>
							</div>
							<div class="form-group">
								<label>Place/Address  <b style="color: red">* Please Fill Place/Address</b></label>
								<textarea rows="5" cols="5" class="form-control" required="required" placeholder="สถานที่ส่งของ" name="place" id="place"><?= $data_project[0]->project_name ?></textarea>
							</div>
						</div>
					
						<div class="col-lg-12">
							<div class="table-responsive">
							<div hidden>	
							<?php
                          $this->db->select('*');
                          $this->db->from('approve');
                          $this->db->where('approve_project',$data_project[0]->project_code);
                          $this->db->where('type', "BK");
                          $this->db->order_by("approve_sequence", "asc");
                          $app_pj = $this->db->get()->result();
                        foreach ($app_pj as $app) {?>

                        <tr>
                          <td><input type="text" name="approve_sequence[]" value="<?php echo $app->approve_sequence; ?>"></td>
                          <td><input type="text" name="approve_mid[]" value="<?php echo $app->approve_mid; ?>"></td>
                          <td><input type="text" name="approve_mname[]" value="<?php echo $app->approve_mname; ?>"></td>
                          <td><input type="text" name="approve_lock[]" value="<?php echo $app->approve_lock; ?>"></td>
                          <td><input type="text" name="approve_cost[]" value="<?php echo $app->approve_cost; ?>"></td>
                        </tr>
                        <?php }?>
                    </div>
								<table class="table table-bordered table-striped table-xxs" style="overflow-x:100%">
									<thead>
										<tr>
											<th><div style="width: 50px;">Action</div></th>
											<th><div style="width: 20px;">#</div></th>
											<th><div style="width: 250px;">Material Code</div></th>
											<th><div style="width: 250px;">Material Name</div></th>
											<th><div style="width: 250px;">Cost Code</div></th>
											<th><div style="width: 250px;">Cost Name</div></th>
											<th><div style="width: 100px;">Qty</div></th>
											<th><div style="width: 100px;">Unit</div></th>
										</tr>
									</thead>
									<tbody id="body">
									</tbody>
								</table>
							</div><br/>
						</div>
						<div class="col-lg-12">
							<div class="col-lg-11">
								<a id="add_row" class="btn bg-info-400 pull-right" data-toggle="modal" data-target="#store">
									<i class="icon-plus22"></i> Add Row
								</a>
							</div>
							<div class="col-lg-1">
								<button  type="submit" class="btn bg-success-400 pull-right">
									<i class="icon-floppy-disk"></i> Save
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="openmember"  data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Select Employee</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="row" id="modal_member">
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 

<!-- Modal Store -->
<div id="store" class="modal fade" role="dialog" data-backdrop="false">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Store Center</h4>
			</div>
			<div class="modal-body">
				<div id="content_store_v"></div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Store -->
<!-- Modal Cost Code -->
<div class="modal fade" id="boq"  data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
			</div>
			<div class="modal-body">
				<div class="row" id="modal_cost">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Cost Code -->
<script>
	$('#content_store_v').load("<?= base_url(); ?>office/modal_store_center");
	$(".openmember").click(function(){
		$('#modal_member').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
		$("#modal_member").load('<?php echo base_url(); ?>index.php/share/member');
	});

$('#purchase').attr('class', 'active'); 
$('#pr_booking_new').attr('style', 'background-color:#dedbd8');
</script>


