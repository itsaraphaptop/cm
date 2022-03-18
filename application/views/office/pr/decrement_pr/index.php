<!-- Main content -->
<div class="content-wrapper">
	<div class="content">

		<!-- Highlighting rows and columns -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">PR Decrement</h5>
			</div>
			<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 form-group" id="head_pr">

				</div>
				<div class="col-xs-12 form-group" >
					<div id="detail_pr"></div>
				</div>

			</div>
				<!-- <table>
					<thead>
						<tr>
							<th></th>
						</tr>
					</thead>
				</table> -->
			</div>
		</div>
		<!-- /content area -->
	</div>
	<!-- Content area -->
</div>
<!-- /main content -->
<script type="text/javascript">
	$.post('<?php echo base_url(); ?>pr/pr_table', function() {

	}).done(function(data){
		// alert(data);
		$("#head_pr").html(data);
	});
</script>
<script type="text/javascript">
$('#purchase').attr('class', 'active'); 
$('#pr_decrement').attr('style', 'background-color:#dedbd8');
</script>
