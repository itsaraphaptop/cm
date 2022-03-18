<table class="table table-bordered table-striped table-hover table-xxs datatable-basicr">
	<thead>
		<tr>
			<th>LOI No.</th>
			<th>Project</th>
			<th>Subcontractor</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=1; foreach ($loadloi as $e) {
			$query = $this->db->query("select * from aps_header where aps_lono='$e->lo_lono'");
			$rlo = $query->result();
			$qev = $this->db->query("select * from vender where vender_id='$e->subcontact'");
			$rven = $qev->result();
		?>
		<tr>
			<td><?php echo $e->lo_lono; ?></td>
			<td><?php echo $e->project_name; ?></td>
			<?php foreach ($rven as $value) {?>
				<th><?php echo $value->vender_name; ?></th>
			<?php } ?>
			
			<td><a class="bn<?php echo $n; ?> label label-xs label-primary" data-subname<?php echo $n;?>="<?php echo $value->vender_name; ?>" data-subcon<?php echo $n; ?>="<?php echo $e->subcontact; ?>" data-lono<?php echo $n; ?>="<?php echo $e->lo_lono; ?>" data-projcode<?php echo $n;?>="<?php echo $e->projectcode; ?>" data-projname<?php echo $n;?>="<?php echo $e->project_name; ?>" data-depid<?php echo $n;?>="<?php echo $e->department; ?>" data-depname<?php echo $n;?>="<?php echo $e->department_title; ?>" data-amt<?php echo $n;?>="<?php echo $e->period_amt; ?>" data-camount<?php echo $n; ?>="<?php echo $e->contactamount;?>" data-period<?php echo $n;?>="<?php echo $e->period; ?>" data-remark<?php echo $n;?>="<?php echo $e->contactdesc; ?>" data-dismiss="modal"> Select</a></td>
		</tr>
		<?php

        ?>
		<script>
			$(".bn<?php echo $n; ?>").click(function(event) {
				var camt = parseFloat($(this).data("camount<?php echo $n; ?>"));
			var pamtuu = camt.toFixed(2);
			$("#camt").val(formatNumber(pamtuu)) ||0;
			
				$(".addrow").prop('disabled', false);
				$(".bsave").prop('disabled', false);
			$("#period").val($(this).data('period<?php echo $n;?>'));
      		$("#loino").val($(this).data('lono<?php echo $n; ?>'));
      		$("#subcon").val($(this).data('subcon<?php echo $n; ?>'));
      		$("#subconname").val($(this).data('subname<?php echo $n; ?>'));
      		$("#projid").val($(this).data('projcode<?php echo $n; ?>'));
      		$("#projname").val($(this).data('projname<?php echo $n; ?>'));
      		$("#depname").val($(this).data('depname<?php echo $n;?>'));
			$("#depid").val($(this).data('depid<?php echo $n;?>'));
			$("#remark").val($(this).data('remark<?php echo $n;?>'));
			$("#table").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      		$("#table").load('<?php echo base_url(); ?>aps_active/load_apstable/'+"<?php echo $e->lo_lono; ?>");
      		$("#glacc").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      		$("#glacc").load('<?php echo base_url(); ?>aps_active/load_apstableGL/'+"<?php echo $e->lo_lono; ?>/<?php echo $e->subcontact; ?>");
			
			var amt = parseFloat($(this).data('amt<?php echo $n;?>'));
			var amt2 = amt.toFixed(2);
			$("#amt").val(formatNumber(amt2));

			$("#amth").val(amt) || 0;
			
			var vat = parseFloat($("#vat").val()) || 0;
			var vattot = amt*vat/100;
			var netamt = amt2-vattot;
			var ntamt = netamt.toFixed(2);
			var vtto = vattot.toFixed(2);
			$("#invamt").val(formatNumber(vtto)) || 0;
			$("#invamth").val(vattot) || 0;
			$("#netamt").val(formatNumber(ntamt)) || 0;
			$("#netamth").val(netamt)||0;
			$("#netamteh").val(netamt)||0;
			var camount = parseFloat($(this).data("camount<?php echo $n; ?>"));
			var percen = amt/camount*100;
			var pper = percen+"%";
			$("#perc").text(pper);

			$("#tbody").load('<?php echo base_url(); ?>ap/load_aps_period/'+$(this).data('lono<?php echo $n; ?>'));
      });
			function formatNumber (num) {
    			return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
			}
			
		</script>
		<?php $n++; } ?>
	</tbody>
</table>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script>
    $.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 3 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });

      $('.datatable-basicr').DataTable();


    </script>
