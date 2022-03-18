<table class="table table-hover">
	<thead>
		<tr>
			<th>ลำดับ</th>
			<th>เลขที่</th>
			<th>ชนิด</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i = 1;
		// start col1
			if ($type == 'col1') {
				if (count($data1) != 0) {
					foreach ($data1 as $key1 => $value1) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value1['apv_code'];?></td>
			<td>APV</td>
		</tr>
		<?php
					$i++;
					}
				}
				
				if (count($data2) != 0) {
					foreach ($data2 as $key2 => $value2) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value2['cnv_code'];?></td>
			<td>CNV</td>
		</tr>
		<?php
					}
				}

				if (count($data3) != 0) {
					foreach ($data3 as $key3 => $value3) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value3['apd_code'];?></td>
			<td>APV</td>
		</tr>
		<?php
					}
				}				

				if (count($data4) != 0) {
					foreach ($data4 as $key4 => $value4) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value4['apr_code'];?></td>
			<td>APV</td>
		</tr>
		<?php
					}
				}
		// end col1

		// start col2
			}else if ($type == 'col2') {
				if (count($data1) != 0) {
					foreach ($data1 as $key1 => $value1) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value1['aps_code'];?></td>
			<td>APS</td>
		</tr>
		<?php
					$i++;
					}
				}
				
				if (count($data2) != 0) {
					foreach ($data2 as $key2 => $value2) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value2['cns_code'];?></td>
			<td>CNS</td>
		</tr>
		<?php
					}
				}
		// end col2

		// start col3
			}else if ($type == 'col3') {
				if (count($data1) != 0) {
					foreach ($data1 as $key1 => $value1) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value1['ap_no'];?></td>
			<td>APO</td>
		</tr>
		<?php
					$i++;
					}
				}
				
				if (count($data2) != 0) {
					foreach ($data2 as $key2 => $value2) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value2['cno_code'];?></td>
			<td>CNO</td>
		</tr>
		<?php
					}
				}
		// end col3

		// start col4
			}else if ($type == 'col4') {
				foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value['ap_code'];?></td>
			<td>Cheque</td>
		</tr>
		<?php
				}
		// end col4
			}else if ($type == 'col5') {
				foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value['ap_code'];?></td>
			<td>Cheque</td>
		</tr>
		<?php
				}
			}else if ($type == 'col6') {
				foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value['acc_no'];?></td>
			<td>AR</td>
		</tr>
		<?php
				}
			}else if ($type == 'col7') {
				foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value['cl_no'];?></td>
			<td>RV</td>
		</tr>
		<?php
				}
			}else if ($type == 'col8') {
				foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value['cl_no'];?></td>
			<td>JV</td>
		</tr>
		<?php
				}
			}else{
		?>
		error
		<?php
			}
		?>
	</tbody>
</table>
