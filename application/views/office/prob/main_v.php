<div class="content">
	<div class="panel panel-flat border-top-info border-bottom-info">
		<div class="panel-heading">
			<h6 class="panel-title">Problems Report</h6><p></p>
			<a href="problems/new_prob" class="label border-left-info label-striped "><i class="icon-file-plus"></i> New</a> &nbsp;
		</div>
		<div class="panel-body">
			Filter : <button class="wait label label-warning">In Process</button> <button class="compl label label-info">Complete</button> <button class="appr label label-success">Approve</button> <button class="canc label label-danger">Cancel</button>
			
			<div id="load">
				 <div class="panel-body"><p>Loading....</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>
			</div>
		</div>
	</div>
</div>
<script>
	// $(document).ready(function(){
		$("#load").load('http://cmservice.kudosinnovation.com/base_customer/loadstatuscompcode/1/<?php echo $compcode;?>/<?php echo $username;?>');
	// });
	$(".wait").click(function(){
		$("#load").html('<div class="panel-body"><p>Loading....</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
		$("#load").load('http://cmservice.kudosinnovation.com/base_customer/loadstatuscompcode/1/<?php echo $compcode;?>/<?php echo $username;?>');
	});
	$(".compl").click(function(){
		$("#load").html('<div class="panel-body"><p>Loading....</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
		$("#load").load('http://cmservice.kudosinnovation.com/base_customer/loadstatuscompcode/2/<?php echo $compcode;?>/<?php echo $username;?>');
	});
	$(".appr").click(function(){
		$("#load").html('<div class="panel-body"><p>Loading....</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
		$("#load").load('http://cmservice.kudosinnovation.com/base_customer/loadstatuscompcode/3/<?php echo $compcode;?>/<?php echo $username;?>');
	});
	$(".canc").click(function(){
		$("#load").html('<div class="panel-body"><p>Loading....</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
		$("#load").load('http://cmservice.kudosinnovation.com/base_customer/loadstatuscompcode/4/<?php echo $compcode;?>/<?php echo $username;?>');
	});
</script>