
<div class="container">
<h3>Advance Email Options</h3>
<div class="row">
<div class="col-md-6">
	<form id="sentform" action="<?php echo base_url(); ?>email/save_change" method="post">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="">From Email</label>
					<?php if ($count==0){ ?>
						<input type="text" class="form-control" name="femal" value="">
					<?php }else{?>
						<input type="text" class="form-control" name="femal" value="<?php echo $res[0]['email_from']; ?>">
					<?php } ?>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="">From Name</label>
					<?php if ($count==0){ ?>
						<input type="text" class="form-control" name="fname" value="">
					<?php }else{?>
						<input type="text" class="form-control" name="fname" value="<?php echo $res[0]['from_name']; ?>">
					<?php } ?>
					
				</div>
			</div>
		</div>
		<h5>SMTP Options</h5>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">SMTP Host</label>
					<?php if ($count==0){ ?>
						<input type="text" class="form-control" name="smtphost" placeholder="ssl://smtp.googlemail.com" value="">
					<?php }else{?>
						<input type="text" class="form-control" name="smtphost" placeholder="ssl://smtp.googlemail.com" value="<?php echo $res[0]['smtp_host']; ?>">
					<?php } ?>
					
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">SMTP Port</label>
					<?php if ($count==0){ ?>
						<input type="text" class="form-control" name="smtpport" placeholder="465" value="">
					<?php }else{ ?>
						<input type="text" class="form-control" name="smtpport" placeholder="465" value="<?php echo $res[0]['smtp_port']; ?>">
					<?php } ?>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="">User Name</label>
					<?php if ($count==0){ ?>
						<input type="text" class="form-control" placeholder="Email" name="emailuser" value="">
					<?php }else{?>
						<input type="text" class="form-control" placeholder="Email" name="emailuser" value="<?php echo $res[0]['smtp_user']; ?>">
					<?php } ?>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="">Password</label>
					<?php if ($count==0){ ?>
						<input type="password" class="form-control" placeholder="Password" name="emailpass" value="">
					<?php }else{?>
						<input type="password" class="form-control" placeholder="Password" name="emailpass" value="<?php echo $res[0]['smtp_password']; ?>">
					<?php } ?>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="modal-footer">
				<button type="button" id="no-message" class="testing btn btn-primary"> Test Connection</button>
				<button type="button" id="savechange" class="savechange btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
				<a id="fa_close" href="<?php echo base_url(); ?>data_master/main_index/1" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
			</div>
		</div>
	</form>
</div>
<div class="col-md-6">
	<pre class="language-markup mb-0"><code><div class="print"></div></code></pre>
</div>
</div>
<script>
	$(".savechange").click(function(){
		var frm = $('#sentform');
		frm.submit(function (ev) {
			$.ajax({
				type: frm.attr('method'),
				url: frm.attr('action'),
				data: frm.serialize(),
				success: function (data) {
					swal({
						title: "Save Completed!!.",
						text: "",
						// confirmButtonColor: "#66BB6A",
						type: "success"
					});			 
				}
			});
		ev.preventDefault();
	});

	 $("#sentform").submit(); //Submit  the FORM
	 });
	 $(".testing").on('click',function(){
		var formD = new FormData($('#sentform')[0]);
			$.ajax({
				url: '<?php echo base_url() ?>email/testsendmail',
				type: 'POST',
				method: 'POST',
				data: formD,
				async: false,
				cache: false,
				contentType: false,
				enctype: 'multipart/form-data',
				processData: false,
				success: function(response) {
					$(".print").html(response);
					
			
				}
			});
			return false;
	});
</script>