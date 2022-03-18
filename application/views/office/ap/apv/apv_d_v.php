<div class="panel panel-primary" style="margin-top:10px;">
  <div class="panel-heading">รายการ</div>
  <div class="panel-body">
	  <div class="container-fluid">
	  		<div class="row">
				<ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#mat" aria-controls="mat" id="sgmat" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-king" aria-hidden="true"></span> วัสดุ</a></li>
				    <!-- <li role="presentation"><a href="#cost" aria-controls="cost" id="scost" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span> Cost</a></li> -->
				    <li role="presentation"><a href="#vat" aria-controls="vat" id="avat" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> ภาษี</a></li>
				</ul>
				<div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="mat">
			    	<div id="dmat">
			    	
			    	</div>
			    </div>
			 <!--    <div role="tabpanel" class="tab-pane" id="cost">
			    	<div id="dcost"></div>
			    </div> -->
			    <div role="tabpanel" class="tab-pane" id="vat">
			    	<div id="dvat"></div>
			    </div>
			  </div>
			</div>
	  </div>	
  </div>
  <div class="panel-footer">
  	<button class="saveh btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
    <button class="edith btn btn-info"><span class="glyphicon glyphicon-edit"></span> แก้ไข</button>
   	<button class="print btn btn-warning" target="blank"><span class="glyphicon glyphicon-print"></span> พิมพ์</button>
  </div>
</div>

<script>
	// $(document).ready(function() {
		$('.edith').prop('disabled', true);
		$('.print').prop('disabled', true);
		$('#dmat').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
		$("#dmat").load('<?php echo base_url(); ?>index.php/acc/load_apv_d_mat/'+$("#pono").val());
	// });
	// $("#scost").click(function(event) {
	// 	$('#dcost').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
	// 	$('#dcost').load('<?php echo base_url(); ?>index.php/acc/load_apv_d_cost/'+$("#pono").val());
	// });
	$("#sgmat").click(function(event) {
		$('#dmat').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
		$("#dmat").load('<?php echo base_url(); ?>index.php/acc/load_apv_d_mat/'+$("#pono").val());
	});
	$("#avat").click(function(event) {
		$('#dvat').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
		$("#dvat").load('<?php echo base_url(); ?>index.php/acc/load_apv_d_vat/'+$("#pono").val());
	});
</script>

<script>
  $(".saveh").click(function(event) {
   var url="<?php echo base_url(); ?>index.php/acc_active/add_apv_h";
   var dataSet={
   	porecx: $("#porecx").val(),
   	ven: $("#vender").val(),
   	pono: $("#pono").val(),
   	apvno: $("#apvno").val(),
   	invo: $("#invno").val(),
   	cterm: $("#cterm").val(),
   	duedate: $("#duedate").val(),
   	projectid: $("#projectid").val(),
   	system: $("#system").val(),
   	departid: $("#departid").val(),
   	amount: $("#amount").val(),
   	tax: $("#tax").val(),
   	totamount: $("#totamount").val(),
   	user: $("#user").val(),
   	apvdate: $("#apvdate").val()
    };
  $.post(url,dataSet,function(data){
  	alert(data);
  	$("#apvno").val(data);
  	$('.edith').prop('disabled', false);
	$('.print').prop('disabled', false);
	$('.saveh').prop('disabled', true);
  });
});
</script>

  <script>
  $('.print').click(function(){
   var pp = $('#apvno').val();
   var po = $("#pono").val();
     url = "<?php echo base_url(); ?>index.php/report/apv"+"/"+pp+"/"+po;
      $(location).attr("href", url);
  });
</script>