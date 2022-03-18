<div class="panel panel-info">
	<div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> รายงานสรุปยอดสต๊อก</div>
		<div class="panel-body">
		 <div class="row">
		 	<div class="col-xs-3">
					<label for="">เลือกวันรายงานวัสดุ</label>
					<div class="form-group">
						<input type="text" name="dateselect" required="" placeholder="เลือกวันที่เต้องการรายงาน" class="form-control" id="dateselect">
					</div>
			</div>
			<div class="col-xs-3">
					<label for="">ถึงวันที่</label>
					<div class="form-group">
						<input type="text" name="dateselect2" required="" placeholder="เลือกวันที่เต้องการรายงาน" class="form-control" id="dateselect2">
					</div>
			</div>
			<div class="col-xs-3">
			<td><a href="<?php echo base_url(); ?>index.php/report/report_stock" target="blank"><button class="btn btn-warning btn-block btn-xs">พิมพ์</button></a></td>
			</div>
		 </div>


		</div>
</div>


<script>
  $('#printdoc').click(function(){
   var pp = $('#outno').val();
     url = "<?php echo base_url(); ?>index.php/report/report_stock"+"/"+pp;
      $(location).attr("href", url);
  });
</script>


<script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
 <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />
<script>
        // $(document).ready(function() {
            $("#dateselect").kendoDatePicker({
                format : "yyyy-MM-dd"
            });
            $("#dateselect2").kendoDatePicker({
                format : "yyyy-MM-dd"
            });
        // });
</script>