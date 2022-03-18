<?php if ($history != null) {
	?>

<!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/wizards/stepy.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jasny_bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/wizard_stepy.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script>
    <!-- /theme JS files -->
<form action="<?php echo base_url(); ?>wo/decrement_true" method="post">
<div class="col-xs-12">

	<div class="form-group text-center">
		<label class="display-block text-semibold"><h1 id="labelsel" class="text-danger">กรุณาเลือก</h1></label>

		<label class="radio-inline" id="reduce" attr="reduce">
			<input type="radio" class="styled" name="type" value="reduce">
			ลดยอด
		</label>
		<label class="radio-inline" id="return" attr="return">
			<input type="radio" class="styled" name="type" value="return">
			คืนยอด
		</label>
	</div>

</div>
<h2>Decrement</h2>
<table class="table table-hover" id="tb_pr_detail">
	<thead>
		<tr>
			<th>วัสดุ</th>
			<th>เงินทุน</th>
			<th>เงินที่จ่าย</th>
			<th>เงินที่ลดได้</th>
			<th>Decrement</th>
			<th>Balance</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($rows as $key => $value) {?>
		<!-- <tr <//?= ($value['balance'] == '0') ? "hidden=''" : "" ;?>> -->
		<tr>
			<td><?=$value['lo_matname'];?></td>
			<td><?=$value['lo_priceunit']*1;?></td>
			<td class="text-right" id="poi_sumqty<?=$value['wo_item_id'];?>"><?=$value['previousamount'] * 1;?></td>
			<td>
				<input
				type="number"
				name="money_decre[]"
				class="form-control input-xs text-right"
				id="qty<?=$value['wo_item_id'];?>"
				value="<?= $value['lo_priceunit'] - $value['previousamount'];?>"
				readonly="true">
			</td>
			<td>
				<input type="number"
				name="decrement[]"
				class="form-control input-xs key_up ball text-right"
				id="decrement<?=$value['wo_item_id'];?>"
				po_id="<?=$value['wo_item_id'];?>"
				decrement="<?=$value['decrement'];?>"
				qty="<?=$value['money_decre'];?>"
				pattern="[0-9]"
				value="0">
				<input type="hidden" name="wo_item_id[]" value="<?=$value['wo_item_id'];?>">
			</td>
			<td>
				<input type="number"
				name="balance[]"
				class="form-control input-xs text-right"
				id="balance<?=$value['wo_item_id'];?>"
				readonly="true"
				value="<?=$value['balance'];?>">
				<input type="hidden" name="ap_billsucamout[]" id="real<?=$value['wo_item_id'];?>" value="<?=$value['previousamount'];?>">
				<input type="hidden" id="re<?=$value['wo_item_id'];?>" value="<?=$value['previousamount'];?>">
			</td>
		</tr>
	<?php }?>
	</tbody>
</table>

<div class="col-xs-12 form-group">
	<label>Remark:</label>
	<input type="text" name="remark" id="remark" class="form-control input-xs">
</div>
<div class="col-xs-12">
	<button class="btn btn-primary btn-xs" id="submit" >บันทึก</button>
</div>
<?php
$name = $this->session->userdata('sessed_in')['m_name'];
	$compcode = $this->session->userdata('sessed_in')['compcode'];
//echo '<pre>';print_r($this->session->userdata('sessed_in')); ?>
<input type="hidden" name="user_decrement" value="<?=$name?>">
<input type="hidden" name="date_decrement" value="<?php echo date('Y-m-d'); ?>">
<input type="hidden" name="compcode" value="<?=$compcode?>">
<input type="hidden" name="ref_wo" value="<?=$rows[0]['ref_wo'];?>">
<!-- $rows[0]['ref_po'] -->
</form>
<br>
<h2>ประวัติการ Decrement PO เลขที่ : <?php echo $history[0]['ref_wo'] ?></h2>
<table class="table table-hover table-bordered" id="history">
	<thead>
		<tr>
			<th>วัสดุ</th>
			<th>จำนวน</th>
			<th>Decrement</th>
			<th>Balance</th>
			<th>action</th>
			<th>ผู้แก้ไข</th>
			<th>Decrement Date</th>
			<th>ครั้งที่</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($history as $key => $value) {?>
		<tr <?=($value['decrement_status'] == "hide") ? "hidden=''" : "";?>>
			<td><?=$value['lo_matname'];?></td>
			<td><?=$value['lo_priceunit']*1;?></td>
			<td><?=$value['decrement'];?></td>
			<td><?=$value['balance'];?></td>
			<td><?=($value['type'] == "reduce") ? "ลดยอด" : "คืนยอด";?></td>
			<td><?=$value['user_decrement'];?></td>
			<td><?=$value['date_decrement'];?></td>
			<td class="des_no"><?=$value['decrement_no'];?></td>
		</tr>
	<?php }?>
	</tbody>
</table>
<script type="text/javascript">
$("#submit").click(function(event) {
	var remark = $("#remark").val();

	if (remark == "" || remark == null) {
		swal("", "กรุณาระบุ เหตุผลในช่อง remark", "error");
		return false;
	}
	$(this).submit();
});
</script>
<script type="text/javascript">

// var row = $("#tb_pr_detail tbody tr");
function check_decre() {
	var rows_num =0;
	var sum = 0;
	 $('input[id^="decrement"]').each(function(index, el) {
	 	sum += $(el).val()*1;
		// var aa =.val()*1;
		// sa += aa;
		// rows_num++;
	});
	// alert(rows_num);
// });
	if(sum==0){
		$("#submit").attr('disabled', 'disabled');
	}else{
		$("#submit").removeAttr('disabled');
	}
}
check_decre();
	var rows_num =0;
	var sum = 0;
	 $('input[id^="qty"]').each(function(index, el) {
	 	// console.log();
	 	sum += $(el).val()*1;
		// var aa =.val()*1;
		// sa += aa;
		// rows_num++;
	});
	// alert(rows_num);
// });
if(sum==0){
	$("#submit").attr('disabled', 'disabled');
}
var num = 0;
	$("#reduce").click(function(event) {
		/* Act on the event */
		var rows_num =0;
		var sum = 0;
		$('input[id^="qty"]').each(function(index, el) {
		 	// console.log();
		 	sum += $(el).val()*1;
			// var aa =.val()*1;
			// sa += aa;
			// rows_num++;
		});
		 if(sum==0){
			$("#submit").attr('disabled', 'disabled');
		}
		check_decre();
		// $("#submit").removeAttr('disabled');
		$("#labelsel").attr('class', '');

		$(".ball").each(function(index, el) {
			$(el).removeAttr('readonly');
			$(el).val(0);
			var id = $(el).attr('id');
			var attr_prid = $(el).attr('po_id');
			var text_1 = $("#qty"+attr_prid).val();
			// alert(text_1);
			// alert(id);
			$(id).val(text_1);
			$('#balance'+attr_prid).val(text_1);
			// $('#balance'+attr_prid).val();
			// alert(text_3);
			num++;
		});
		$(".key_up").bind("keyup change", function(event) {
			check_decre();
			var po_id = $(this).attr('po_id');
			var decrement = $(this).val();

			var qty = $("#qty"+po_id).val()*1;

			var balance = qty-decrement;

			if(decrement>qty || decrement<0){
				swal({
		            title: "จำนวนที่ลดยอดเกินจำนวนที่มีอยู่ หรือไม่สามารถติดลบได้!!.",
		            text: "",
		            confirmButtonColor: "#EA1923",
		            type: "error"
		        });
				$("#submit").attr('disabled', 'disabled');
				$("#decrement"+po_id).val(0);
				var po_id = $(this).attr('po_id');
				var decrement = $(this).val();

				var qty = $("#qty"+po_id).val()*1;

				// var balance = qty_-decrement;
				// balance = qty-decrement;
				$("#balance"+po_id).val(balance);
			}else{

				$("#balance"+po_id).val(balance);
				// var aa = $("#balance"+po_id).val()*1;
				var aa = $("#decrement"+po_id).val()*1;
				var bb = $("#poi_sumqty"+po_id).html()*1;
				var sum = bb+aa;


				$("#real"+po_id).val(sum);
				// var aa = $("#poi_sumqty"+po_id).html()*1;
				// // var bb = $("#poi_sumqty"+po_id).html()*1;
				// var bb = $("#decrement"+po_id).val()*1;
				// // alert(aa);
				// var sum = aa+bb;
				// var sum1 = aa-bb;
				// // alert(aa+" "+bb);
				// // // console.log($("#pri_sumqty"+po_id).html()*1);
				// // // $('#submit').atttr('disabled');
				// $("#real"+po_id).val(sum);
				// $("#balance"+po_id).val(sum1);

				}

		});
	});

	$("#return").click(function(event) {
	// 	/* Act on the event */
	check_decre();
	// 	// var de = $(".key_up").attr('decrement');
		// $("#submit").removeAttr('disabled');
		$("#labelsel").attr('class', '');
		// alert(555);
		var balance = "";
		var qty = "";
		var num = 0;
		$(".ball").each(function(index, el) {
			$(el).attr('readonly','');
			var decrement = $(el).attr('decrement')*1;
			// alert(decrement);
			// var decrement_id = $(el).attr('id');
			var id =$(el).attr('po_id');


			var text_1 = $("#qty"+id).val()*1;//ค่าช่องจำนวน
			// var real_num = $("#decrement"+id).attr('decrement')*1;
			var real_decre = $("#balance"+id).val()*1;
			// alert(real_num);
			// alert("real_num = "+real_num+" real_decre = "+real_decre);
			// console.log(real_num);
			// console.log(real_decre);
			// return false;
			$("#decrement"+id).val(decrement);
			var aa = $("#re"+id).val()*1;
			var sum = aa - decrement;
			// console.log(aa +"-"+decrement+" = "+sum);
			// $("#balance"+id).val(real_num);
			// var aa = $("#real"+id).val();
			// var bb = $("#decrement"+id).val()
			$("#real"+id).val(sum);
			if ($("#decrement"+id).val() >0) {
				var qty = $("#decrement"+id).attr('qty')*1;
				$("#balance"+id).val(qty);
				// var gg = $("#real"+id).val()*1;
				// var _return = gg + qty;
				// $("#real"+id).val(_return);

			}
			// var sum = aa - real_num;
			// alert(real_num);
			num++;
		});
		check_decre();
	});


</script>
<?php } else {
	?>
<h2>Decrement <span>WO No: <?=$rows[0]['lo_ref'];?></span></h2>
<!-- rows[0]['pri_ref'] -->
<form action="<?php echo base_url(); ?>wo/decrement_true" method="post">
<table class="table table-hover" id="tb_pr_detail">
	<thead>
		<tr>
			<th class="text-center">วัสดุ</th>
			<th class="text-center">เงินทุน</th>
			<th class="text-center">เงินที่จ่ายไป</th>
			<th class="text-center">เงินที่ลดได้</th>
			<th class="text-center">Decrement</th>
			<th class="text-center">Balance</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($rows as $key => $value) {?>
		<tr>
			<td><?=$value['lo_matname'];?></td> <!-- item name -->
			<td><?=$value['lo_priceunit'];?></td> <!-- เงินทุน -->
			<td class="text-right" id="poi_sumqty<?=$value['lo_idd'];?>"><?=$value['previousamount']?></td> <!-- เงินที่จ่ายไป -->
			<td>
				<input
				type="number"
				name="money_decre[]"
				class="form-control input-xs text-right"
				id="qty<?=$value['lo_idd'];?>"
				value="<?= ($value['ap_billsucamout'] == null) ? 0:$value['ap_billsucamout']; ?>"
				readonly="true">
			</td>
			<td>
				<input
				type="number"
				name="decrement[]"
				class="form-control input-xs key_up text-right"
				id="decrement<?=$value['lo_idd'];?>"
				po_id="<?=$value['lo_idd'];?>"
				value="0"
				pattern="[0-9]">
				<input type="hidden" name="wo_item_id[]" value="<?=$value['lo_idd'];?>">
			</td>
			<td>
				<input
				type="number"
				name="balance[]"
				class="form-control input-xs text-right"
				id="balance<?=$value['lo_idd'];?>"
				readonly="true"
				value="<?= $value['lo_priceunit'] - $value['previousamount'];?>">
				<input type="hidden" name="ap_billsucamout[]" id="real<?=$value['lo_idd'];?>" value="<?= $value['previousamount'];?>">
			</td>
		</tr>
	<?php }?>
	</tbody>
</table>

<div class="col-xs-12 form-group">
	<label>Remark:</label>
	<input type="text" name="remark" id="remark" class="form-control input-xs">
</div>
<div class="col-xs-12">
	<button class="btn btn-primary btn-xs" id="submit" >บันทึก</button>
</div>
<?php
$name = $this->session->userdata('sessed_in')['m_name'];
	$compcode = $this->session->userdata('sessed_in')['compcode'];
//echo '<pre>';print_r($this->session->userdata('sessed_in')); ?>
<input type="hidden" name="user_decrement" value="<?=$name?>">
<input type="hidden" name="date_decrement" value="<?php echo date('Y-m-d'); ?>">
<input type="hidden" name="compcode" value="<?=$compcode?>">
<input type="hidden" name="ref_wo" value="<?=$rows[0]['lo_ref'];?>">
<!-- $rows[0]['pri_ref'] -->
<input type="hidden" name="type" value="reduce">
</form>
<script type="text/javascript">

$("#submit").click(function(event) {
	var remark = $("#remark").val();

	if (remark == "" || remark == null) {
		swal("", "กรุณาระบุ เหตุผลในช่อง remark", "error");
		return false;
	}
	$(this).submit();
});
function check_decre() {
	var rows_num =0;
	var sum = 0;
	 $('input[id^="decrement"]').each(function(index, el) {
	 	sum += $(el).val()*1;
	 	// console.log(sum);
		// var aa =.val()*1;
		// sa += aa;
		// rows_num++;
	});
	// alert(rows_num);
// });
	if(sum==0){
		$("#submit").attr('disabled', 'disabled');
	}else{
		$("#submit").removeAttr('disabled');
	}
}
check_decre();
	$(".key_up").bind("keyup change", function(event) {

		check_decre();
		var po_id = $(this).attr('po_id');
		var decrement = $(this).val()*1;

		var qty = $("#qty"+po_id).val();
		// alert(decrement+" > "+qty);
		// console.log(decrement);
		// return false;
		if(decrement>qty || decrement<0){

			swal({
	            title: "จำนวนที่ลดยอดเกินจำนวนที่มีอยู่ หรือไม่สามารถติดลบได้!!.",
	            text: "",
	            confirmButtonColor: "#EA1923",
	            type: "error"
	        });
			$("#submit").attr('disabled', 'disabled');
	        var aa = $("#balance"+po_id).val()*1;
			var bb = $("#poi_sumqty"+po_id).html()*1;
			var sum = aa+bb;
			// console.log($("#pri_sumqty"+po_id).html()*1);
			// $('#submit').atttr('disabled');
			$("#real"+po_id).val(sum);

			$("#decrement"+po_id).val(0);
			var po_id = $(this).attr('po_id');
			var decrement = $(this).val();

			var qty = $("#qty"+po_id).val()*1;
			var balance = qty-decrement;
			// var balance = qty_-decrement;
			// balance = qty-decrement;
			$("#balance"+po_id).val(balance);
		}else{
			var balance = qty-decrement;
			
			// // $("#balance"+po_id).val(balance);
			// // // alert($("#balance"+po_id).val());
			// var aa = $("#re"+po_id).val()*1;
			// // var bb = $("#poi_sumqty"+po_id).html()*1;
			// var decrement_txt = $("#decrement"+po_id).val()*1;
			// var money_decre = $("#qty"+po_id).val()*1;
			// // alert(money_decre);
			// var sum = money_decre - decrement_txt;
			// var sum1 = money_decre + decrement_txt;
			// // var sum1 = aa-bb;
			// // alert(aa+" "+bb);
			// // // console.log($("#pri_sumqty"+po_id).html()*1);
			// // // $('#submit').atttr('disabled');
			// $("#real"+po_id).val(sum1);
			// $("#balance"+po_id).val(sum);
				// var aa = $("#balance"+po_id).val()*1;
				var aa = $("#decrement"+po_id).val()*1;
				var bb = $("#poi_sumqty"+po_id).html()*1;
				var sum = aa+bb;


				$("#real"+po_id).val(sum);
				$("#balance"+po_id).val(balance);
		}

	});
</script>
<?php }?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
