</style>
<div class="row" style="margin-top:-140px;">
	
			<div class="col-xs-12">
				<h1>Account Payable System</h1>
				<h3>ระบบจัดการบัญชีเจ้าหนี้</h3>
				<hr>
			</div>
</div>
<div class="row">
	<ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#home" aria-controls="home" id="shome" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> เจ้าหนี้การค้า</a></li>
	    <li role="presentation"><a href="#profile" aria-controls="profile" id="sgmtab" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-king" aria-hidden="true"></span> เจ้าหนี้ผู้รับเหมา</a></li>
	    <li role="presentation"><a href="#messages" aria-controls="messages" id="areatab" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> เจ้าหนี้อื่นๆ</a></li>
	</ul>
	<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	<div id="apv"></div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
    	<div id="aps"></div>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
    	<div id="apo"></div>
    </div>
  </div>
</div>

<script>
	// $(document).ready(function() {
		$('#apv').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
		$('#apv').load('<?php echo base_url(); ?>index.php/acc/apv_all');
	// });
	$("#shome").click(function (e) {
		$('#apv').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
		$('#apv').load('<?php echo base_url(); ?>index.php/acc/apv_all');
		
	});
	$("#sgmtab").click(function (e) {
		$('#aps').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
	});
	$("#areatab").click(function (e) {
		$('#apo').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
		$('#apo').load('<?php echo base_url(); ?>index.php/acc/apo_all');
		
	});
</script>