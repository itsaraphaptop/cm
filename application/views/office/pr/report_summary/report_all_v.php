
<div class="container-fluid" style="margin-top:30px;">
  <div class="row">

        <div class="col-md-12">

			<!-- Title with left icon -->
			<div class="panel panel-white">
				<div class="panel-body">
				<h3><b>1. Report Purchase</b></h3>
				<ul class="list no-margin-bottom">
					<li><a type="button" id="rpt3" href="<?php echo base_url(); ?>pr_report/pr_request_v" title="Report Purchase Requisition Overviews">1.1 Report Purchase Requisition Overviews</a></li>
					<li><a href="<?php echo base_url(); ?>pr_report/view_vender_re" title="Vender Report">1.2 Vender Report</a></li>
					<!-- <li><a href="<?php echo base_url(); ?>pr_report/report_summary" title="1.1 stock">1.1 Purchase Required Report</a></li> -->
					<!-- <li><a href="<?php echo base_url(); ?>pr_report/pr_report_status" title="Purchase Required Status">1.1 Purchase Required Status</a></li> -->
					<!-- <li><a href="<?php echo base_url(); ?>pr_report/pr_tracking_r" title="1.1 stock">1.3 Tracking Report</a></li> -->
					
					<!-- <li><a href="<?php echo base_url(); ?>pr_report/stock_card_v" title="Stock Card">1.3 Stock Card</a></li>
					<li><a href="<?php echo base_url(); ?>pr_report/stock_cost_view" title="Stock Cost All Project">1.4 Stock Cost All Project</a></li> -->
					<!-- <li><a href="<?php echo base_url(); ?>pr_report/stock_balance_view" title="Stock Balance">1.5 Stock Balance</a></li> -->
					<!-- <li><a href="<?php echo base_url(); ?>pr_report/depreciate_view" title="Depreciation">1.7 Depreciation</a></li> -->
				</ul>
					<h3><b>2. Report Purchase Delect</b></h3>
					<ul class="list no-margin-bottom">
					<!-- <li><a href="<?php echo base_url(); ?>pr_report/report_purchase_requisition" title="รายงานใบเบิกเงินสดย่อย/ใบเบิกที่ไม่มีใบสั่งซื้อ">2.1 รายงานใบเบิกเงินสดย่อย/ใบเบิกที่ไม่มีใบสั่งซื้อ</a></li>
					<li><a href="<?php echo base_url(); ?>pr_report/report_prrent" title="รายงานเบิกตามหนังสือสั่งจ้าง">2.2 รายงานเบิกตามหนังสือสั่งจ้าง</a></li>
					<li><a href="<?php echo base_url(); ?>pr_report/report_pcandnopr" title="purchase requisition">2.3 Purchase Requisition</a></li> -->
					<li><a href="<?php echo base_url(); ?>pr_report/pr_delete_report_v" title="Report Delete Status">2.1 Report Delete Status</a></li>
				</div>
			</div>
			<!-- /title with left icon -->

		</div>

    </div>
  </div>

</div>
<script type="text/javascript">
$('#purchase').attr('class', 'active'); 
$('#pr_repost').attr('style', 'background-color:#dedbd8');
</script>