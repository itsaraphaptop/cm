<table class="table table-hover table-xxs myTable">
	<thead>
		<tr>
			<th>PR No.</th>
			<th>Project/Department Name</th>
			<th>System Type</th>
			<th>Detail</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($rows as $key => $value) { ?>
		<tr>
			<!-- <td colspan="3"><?php //echo '<pre>';print_r($rows);?></td> -->
			<td><a onclick="prde($(this))" pr_no="<?=$value['pr_prno'];?>"><?=$value['pr_prno'];?></a></td>
			<td><?=$value['project_name'];?></td>
			<td><?=$value['systemname'];?></td>
			<td><?=$value['pr_deliplace'];?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<div>
</div>

<script type="text/javascript">
$.extend($.fn.dataTable.defaults, {
			autoWidth: false,
			columnDefs: [{
				orderable: false,
				width: '100px',
				targets: [0]
			}],
			dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
			language: {
				search: '<span>Filter:</span> _INPUT_',
				lengthMenu: '<span>Show:</span> _MENU_',
				paginate: {
					'first': 'First',
					'last': 'Last',
					'next': '&rarr;',
					'previous': '&larr;'
				}
			},
			drawCallback: function() {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
			},
			preDrawCallback: function() {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
			}
		});
	$(".myTable").DataTable();
	function prde(e){
		var _pr_no = e.attr('pr_no');

		$.post('<?php echo base_url(); ?>pr/pr_detail/'+_pr_no, function() {
			
		}).done(function(data){
			$("#detail_pr").html(data);
		});
	}
</script>