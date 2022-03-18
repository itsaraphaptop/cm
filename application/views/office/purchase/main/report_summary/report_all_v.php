<div class="container-fluid" style="margin-top:30px;">
	<div class="row">
		<div class="col-md-12">
			<!-- Title with left icon -->
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Report</h6>
				</div>
				<div class="panel-body">
					<h3><b>1. รายงานการสั่งซื้อ</b></h3>
					<ul class="list no-margin-bottom">
						<!-- <li><a href="<?php echo base_url(); ?>purchase_report/report_order" title="Purchase Order Report">1.1 Purchase Order Report</a></li>
						<li><a href="<?php echo base_url(); ?>purchase_report/summary_purchase" title="Summary Purchase Order">1.2 Summary Purchase Order</a></li> -->
						<li><a href="<?php echo base_url(); ?>purchase_report/po_puschase_requisition" title="Report Purchase Requisition Overviews">1.1 Report Purchase Order Overviews</a></li>
						
						<li><a href="<?php echo base_url(); ?>purchase_report/po_puschase_check" title="รายงานการตรวจสอบ PO/WO">1.2 รายงานการตรวจสอบ PO/WO</a></li>
						<li><a href="<?php echo base_url(); ?>purchase_report/view_most_amount" title="Most Amount">1.3 Most Amount</a></li>
						<li><a href="<?php echo base_url(); ?>purchase_report/view_vender_re" title="Vender Report">1.4 Vender Report</a></li>
                        <li><a href="<?php echo base_url(); ?>purchase_report/po_list_product" title="แสดงการรับสินค้า และค้างรับสินค้า">1.5 แสดงการรับสินค้า และค้างรับสินค้า</a></li>
                        <li><a href="<?php echo base_url(); ?>purchase_report/po_by_project_v" title="Materials Report Order by Project">1.6 Materials Report Order by Project</a></li>
                        <li><a href="<?php echo base_url(); ?>purchase_report/po_by_vender_v" title="Materials Report Order by Vender<">1.7 Materials Report Order by Vender</a></li>
                    </ul>
					 <!-- <h3><b>2. รายงานหนังสือสั่งจ้าง</b></h3> -->
					 <h3><b>2. รายงานรายการที่ถูกลบ</b></h3>
					<ul class="list no-margin-bottom">
						<!-- <li><a href="<?php echo base_url(); ?>purchase_report/report_ol" title="2.1 stock">2.1 รายงานหนังสือสั่งจ้างตามโครงการ/แผนก</a></li> -->
						<li><a href="<?php echo base_url(); ?>purchase_report/po_delete_report_v" title="Report Delete Status">2.1 Report Delete Status</a></li>
					</ul>
					<h3><b>3. Assessment Report</b></h3>
					<ul class="list no-margin-bottom">
					<li><a href="<?php echo base_url(); ?>purchase_report/assessment_report_v" title="Assessment Order">3.1 Assessment Report</a></li>
					<!--<h3><b>3. Material Report</b></h3>
					<ul class="list no-margin-bottom">
						<li><a href="<?php echo base_url(); ?>purchase_report/po_material_com_v" title="3.1 stock">3.1 Company-Material List</a></li>
						<li><a href="<?php echo base_url(); ?>purchase_report/po_material_pro_v" title="3.1 stock">3.2 Project-Material List</a></li> -->	
				</div>
			</div>
			<!-- /title with left icon -->
		</div>
	</div>

	<script type="text/javascript">
	$('#po_purchase').attr('class', 'active');
	$('#report_po').attr('style', 'background-color:#dedbd8');
</script>
</div>