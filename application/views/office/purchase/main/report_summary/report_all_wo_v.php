<div class="container-fluid" style="margin-top:30px;">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Report</h6>
				</div>
				<div class="panel-body">
					<h3><b>1. รายงานการสั่งจ้าง</b></h3>
					<ul class="list no-margin-bottom">
						<li><a href="<?php echo base_url(); ?>purchase_report/wo_puschase_requisition" title="Report Purchase Requisition Overviews">1.1 Report Sub Contractor Overviews</a></li>
						
						<li><a href="<?php echo base_url(); ?>purchase_report/wo_puschase_check" title="รายงานการตรวจสอบ PO/WO">1.2 รายงานการตรวจสอบ WO</a></li>
						<li><a href="<?php echo base_url(); ?>purchase_report/view_most_amount_wo" title="Most Amount">1.3 Most Amount</a></li>
						<li><a href="<?php echo base_url(); ?>purchase_report/view_vender_re_wo" title="Vender Report">1.4 Sub Contractor Report</a></li>
                    </ul>
					 <h3><b>2. รายงานรายการที่ถูกลบ</b></h3>
					<ul class="list no-margin-bottom">
						<li><a href="<?php echo base_url(); ?>purchase_report/po_delete_report_wo_v" title="Report Delete Status">2.1 Report Delete Status</a></li>
					</ul>
					<h3><b>3. Assessment Report</b></h3>
					<ul class="list no-margin-bottom">
					<li><a href="<?php echo base_url(); ?>purchase_report/assessment_report_v" title="Assessment Order">3.1 Assessment Report</a></li>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	$('#po_purchase').attr('class', 'active');
	$('#report_po').attr('style', 'background-color:#dedbd8');
</script>
</div>