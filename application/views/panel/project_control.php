<?php
$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];

?>

<div class="content-wrapper">
	<div class="content">
		<div class="col-md-3">
			<div class="panel panel-body border-top-primary">
				<div class="row">
					<div class="col-md-12">
						<h4>Project Control</h4>
					</div>
					<?php
						$i=1;
						foreach ($project as $key => $value) {
					?>
					<div class="col-md-8">
						<label><?=$i++?>. <?= $value->project_name ?></label>
					</div>
					<div class="col-md-4">
						<a href="<?=base_url();?>management/project_timeline/<?= $value->project_id ?>" class="label label-success"><i class="icon-folder-open"></i> Open</a>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-body border-top-primary"><br/>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Task list</th>
							<th>Resource</th>
							<th>Progress</th>
							<th>Start date</th>
							<th>End date</th>
							<th><i class="fa fa-bell"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
			

		</div>
	</div>
</div>



