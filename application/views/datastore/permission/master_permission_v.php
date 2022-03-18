<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Master </span> - Setup Master Permission</h4>
		</div>
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
	</div>

	<div class="content">

		<span id="notification" style="display:none;"></span>
		<div class="breadcrumb-line breadcrumb-line-component">
			<ul class="breadcrumb">
				<li><a class="preload" href="/"><i class="icon-home2 position-left"></i> Home</a></li>
				<li><a class="preload" href="http://localhost/cloudmeka/index.php/data_master">Master</a></li>
				<li class="active">Setup Master Permission</li>
			</ul>
			<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
		</div>

	<!-- ///////////////// -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Master Permission</h6>
				<div class="heading-elements">
				
				</div>
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a>
					<div> 
						<div style="height: 20px;"></div>
						<table class="table table-bordered">
								<thead> 
										<td>master code</td>
										<td>Master Permission Name</td>
										<td style="width: 5%;"><a id="new_permis" href="#" class="btn btn-info"><i class="icon-plus-circle2"></i> New Master permission</a></td>
								</thead>
								<tbody>
									<?php foreach ($master_permission as $key => $permission_name) { ?>
										<tr>
											<td><?=$permission_name['permis_id'] ?></td>
											<td><?=$permission_name['permis_name'] ?></td>
											<td></td>
										</tr>
									<?php }?>
								</tbody> 
						</table>
					</div>				
			</div>						
		</div>
	<!-- ///////////////// -->
	</div>

	<!-- Large modal -->
	<!-- <div id="modal_new_master" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button  type="button" class="close" data-dismiss="modal">X</button>
					<h5 class="modal-title">New Master permission</h5>
					<div class="row">
						<div style="height: 30px;"></div>
						<label class="control-label col-lg-2">Name Permission</label>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Right icon">
							<span class="input-group-addon"><i class="icon-user"></i></span>
						</div>
					</div>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div> -->
	<!-- /large modal -->



<!-- Modal -->
<div id="modal_new_master" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">New master permission</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontalr">
					<div class="form-group">
						
					</div>
					<div class="form-group">
						<div class="has-feedback has-feedback-left">
							<label class="control-label col-lg-2">Name Permission :</label>
							<input type="text" class="form-control input-xlg" id="textnn" placeholder="Filter By Material Name">
							<div class="form-control-feedback">
								
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$("#new_permis").click(function(event) {
			$("#modal_new_master").modal('show');
		});
	});
</script>			

</body>
</html>