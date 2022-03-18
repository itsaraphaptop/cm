<div class="row">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th class="text-left">No.</th>
				<th class="text-right">Job Code</th>
				<th class="text-left">Job Name</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
				foreach ($job as $key => $value) {
			?>
				<tr>
					<td class="text-left"><?= $i++ ?></td>
					<td class="text-right"><?=  $value->bdd_jobno ?></td>
					<td class="text-left"><?=  $value->bdd_jobname ?></td>
				</tr>
			<?php

				}
			?>

			
		</tbody>
	</table>
	<!-- <div class="col-lg-6">
		<label>Job Type</label>
	</div>
	<div class="col-lg-6">
		<label>Job Type</label>
	</div> -->
</div>

<!-- 
object(stdClass)#29 (10) {
  ["bdd_no"]=>
  string(2) "44"
  ["bdd_tenid"]=>
  string(11) "BD201711121"
  ["bdd_jobno"]=>
  string(1) "1"
  ["bdd_jobname"]=>
  string(3) "M&E"
  ["bdd_amount"]=>
  string(10) "2000000.00"
  ["compcode"]=>
  string(3) "001"
  ["useradd"]=>
  string(5) "admin"
  ["createdate"]=>
  string(8) "17-11-12"
  ["useredit"]=>
  NULL
  ["editdate"]=>
  NULL
} -->