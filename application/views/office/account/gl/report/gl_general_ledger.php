<div class="content-wrapper">
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
					<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
				</div>
			</div>
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr"></a></li>
		</div>
	</div>
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Report General Ledger</h5>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<form  action="<?php echo base_url(); ?>gl_report/gl_general_report" method="get">
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<div class="col-md-1">
									<div class="form-group">
										<label><input type="radio" id="typelist" name="typelist" checked value="0">ALL</label>
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
										<label><input type="radio" id="typelist" name="typelist" value="1">AP</label>
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
										<label><input type="radio" id="typelist" name="typelist" value="2">AR</label>
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
										<label><input type="radio" id="typelist" name="typelist" value="3">GL</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-lg-4 control-label">Year :</label>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="text" name="year" id="year" class="form-control" value="<?php echo date("Y");?>">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-lg-4 control-label">From Period :</label>
									<div class="col-lg-8">
										<div class="input-group">
											<select class="form-control " id="start" name="pstart">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-lg-4 control-label">To Period :</label>
									<div class="col-lg-8">
										<div class="input-group">
											<select class="form-control " id="end" name="pend">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-2 control-label">From Account :</label>
								<div class="col-lg-8">
									 <select id="f_acc" class="select-border-color border-warning" name="f_acc" >
										<option value="" selected="selected"></option>
										<?php foreach ($aa as $act) {?>
											<option value="<?php echo $act->act_code; ?>"><?php echo $act->act_code; ?> - <?php echo $act->act_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
                		<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-2 control-label">To Account :</label>
								<div class="col-lg-8">
									<select id="t_acc" class="select-border-color border-warning" name="t_acc" >
										<option value="" selected="selected"></option>
										<?php foreach ($aa as $act) {?>
											<option value="<?php echo $act->act_code; ?>"><?php echo $act->act_code; ?> - <?php echo $act->act_name; ?></option>
										<?php } ?>
									</select> 
								</div>
							</div>
              			</div>
              		</div>
              		<br>

              		<?php 
              		foreach ($ff as $f) {
              		 	$pro_f = $f->project_id;
              		}
              		foreach ($tt as $t) {
              		 	$pro_t = $t->project_id;
              		}
              		$cc = $this->db->query("SELECT acc_no
			          FROM (
			          SELECT acc_no FROM ar_account_header  WHERE acc_status != 'D'
			          UNION ALL
			          SELECT cl_no from ar_clear_header WHERE cl_status != 'D'
			          UNION ALL
			          SELECT ap_no FROM ap_pettycash_header WHERE ap_status != 'delete'
			          UNION ALL
			          SELECT apv_code FROM apv_header  WHERE apv_status != 'delete'
			          UNION ALL
			          SELECT aps_code FROM aps_header WHERE aps_status != 'delete' 
			          UNION ALL
			          SELECT apd_code FROM ap_down_header WHERE apd_status != 'delete' 
			          UNION ALL
			          SELECT apr_code FROM ap_ret_header  WHERE apr_status != 'delete'
			          UNION ALL
			          SELECT vchno FROM gl_batch_header
			          )t 
			        ORDER BY acc_no ")->result();

              		$ff = $this->db->query("SELECT acc_no
			          FROM (
			          SELECT acc_no FROM ar_account_header  WHERE acc_status != 'D'
			          UNION ALL
			          SELECT cl_no from ar_clear_header WHERE cl_status != 'D'
			          UNION ALL
			          SELECT ap_no FROM ap_pettycash_header WHERE ap_status != 'delete'
			          UNION ALL
			          SELECT apv_code FROM apv_header  WHERE apv_status != 'delete'
			          UNION ALL
			          SELECT aps_code FROM aps_header WHERE aps_status != 'delete' 
			          UNION ALL
			          SELECT apd_code FROM ap_down_header WHERE apd_status != 'delete' 
			          UNION ALL
			          SELECT apr_code FROM ap_ret_header  WHERE apr_status != 'delete'
			          UNION ALL
			          SELECT vchno FROM gl_batch_header
			          )t 
			        ORDER BY acc_no LIMIT 1 ")->result();

              		$tt = $this->db->query("SELECT acc_no
			          FROM (
			          SELECT acc_no FROM ar_account_header  WHERE acc_status != 'D'
			          UNION ALL
			          SELECT cl_no from ar_clear_header WHERE cl_status != 'D'
			          UNION ALL
			          SELECT ap_no FROM ap_pettycash_header WHERE ap_status != 'delete'
			          UNION ALL
			          SELECT apv_code FROM apv_header  WHERE apv_status != 'delete'
			          UNION ALL
			          SELECT aps_code FROM aps_header WHERE aps_status != 'delete' 
			          UNION ALL
			          SELECT apd_code FROM ap_down_header WHERE apd_status != 'delete' 
			          UNION ALL
			          SELECT apr_code FROM ap_ret_header  WHERE apr_status != 'delete'
			          UNION ALL
			          SELECT vchno FROM gl_batch_header
			          )t 
			        ORDER BY acc_no DESC LIMIT 1 ")->result();
              		foreach ($ff as $fc) {
              			$fcode = $fc->acc_no;
              		}
              		foreach ($tt as $tc) {
              			$tcode = $tc->acc_no;
              		}

              		  ?>
              		<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-2 control-label">From Project :</label>
								<div class="col-lg-8">
									 <select id="f_pro" class="select-border-color border-warning" name="f_pro" >
										<option value="" selected="selected"></option>
										<?php foreach ($pp as $pro) {?>
											<option value="<?php echo $pro->project_id; ?>"><?php echo $pro->project_code; ?> - <?php echo $pro->project_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
                		<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-2 control-label">To Project :</label>
								<div class="col-lg-8">
									<select id="t_pro" class="select-border-color border-warning" name="t_pro" >
										<option value="" selected="selected"></option>
										<?php foreach ($pp as $pro) {?>
											<option value="<?php echo $pro->project_id; ?>"><?php echo $pro->project_code; ?> - <?php echo $pro->project_name; ?></option>
										<?php } ?>
									</select> 
								</div>
							</div>
              			</div>
              		</div>
              		<br>
              		<div class="row" hidden>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-lg-2 control-label">From Voucher No :</label>
								<div class="col-lg-8">
									 <select id="f_code" class="select-border-color border-warning" name="f_code" >
										<option value="" selected="selected"></option>
										<?php foreach ($cc as $code) {?>
											<option value="<?php echo $code->acc_no; ?>"><?php echo $code->acc_no; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
                		<div class="col-md-6" >
							<div class="form-group">
								<label class="col-lg-2 control-label">To Voucher No :</label>
								<div class="col-lg-8">
									<select id="t_code" class="select-border-color border-warning" name="t_code" >
										<option value="" selected="selected"></option>
										<?php foreach ($cc as $code) {?>
											<option value="<?php echo $code->acc_no; ?>"><?php echo $code->acc_no; ?></option>
										<?php } ?>
									</select> 
								</div>
							</div>
              			</div>
              		</div>
              		<br>
              		<div class="modal-footer" style="text-align: right;">
						<div class="col-sm-7"></div>
						<button type="submit" class="btn btn-success">Search</button>
						<button type="reset" class="btn btn-danger">Reset</button>
					</div>
					</form>
