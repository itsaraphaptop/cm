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
<form action="<?php echo base_url(); ?>pr/decrement_true" method="post">
<div class="col-xs-12">

	<div class="form-group text-center">
		<label class="display-block text-semibold"><h1 id="labelsel" class="text-danger">select</h1></label>

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
			<th>Material Name</th>
			<th>QTY</th>
			<th>QTY Balance</th>
			<th>QTY Discounted</th>
			<th>Decrement</th>
			<th>Balance</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($rows as $key => $value) {?>
		<!-- <tr <//?= ($value['balance'] == '0') ? "hidden=''" : "" ;?>> -->
		<tr>
			<td><?=$value['pri_matname'];?></td>
			<td><?=$value['qty']*1;?></td>
			<td class="text-right" id="pri_sumqty<?=$value['pri_id'];?>"><?= ($value['pri_sumqty'] == null || $value['pri_sumqty'] == 0) ? 0:$value['pri_sumqty'];?></td>
			<td>
				<input
				type="number"
				name="qty[]"
				class="form-control input-xs text-right"
				id="qty<?=$value['pr_item_id'];?>"
				value="<?=$value['balance'];?>"
				readonly="true">
			</td>
			<td>
				<input type="number"
				name="decrement[]"
				class="form-control input-xs key_up ball text-right"
				id="decrement<?=$value['pr_item_id'];?>"
				pr_id="<?=$value['pr_item_id'];?>"
				decrement="<?=$value['decrement'];?>"
				qty="<?=$value['qty'];?>"
				pattern="[0-9]"
				value="0">
				<input type="hidden" name="pr_item_id[]" value="<?=$value['pr_item_id'];?>">
			</td>
			<td>
				<input type="number"
				name="balance[]"
				class="form-control input-xs text-right"
				id="balance<?=$value['pr_item_id'];?>"
				readonly="true"
				value="<?=$value['balance']?>">
				<input type="hidden" name="pri_qty[]" id="real<?=$value['pri_id'];?>" value="<?=$value['qty'];?>">
				<input type="hidden" name="return[]" id="return<?=$value['pri_id'];?>" value="<?=$value['pri_qty'] * 1?>">
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
	<button class="btn btn-success" id="submit" >Save</button>
</div>
<?php
$name = $this->session->userdata('sessed_in')['m_name'];
	$compcode = $this->session->userdata('sessed_in')['compcode'];
//echo '<pre>';print_r($this->session->userdata('sessed_in')); ?>
<input type="hidden" name="user_decrement" value="<?=$name?>">
<input type="hidden" name="date_decrement" value="<?php echo date('Y-m-d'); ?>">
<input type="hidden" name="compcode" value="<?=$compcode?>">
<input type="hidden" name="ref_pr" value="<?=$rows[0]['ref_pr']?>">

</form>
<br>
<h2>Decrement PR No. : <?php echo $history[0]['ref_pr'] ?></h2>
<table class="table table-hover table-bordered" id="history">
	<thead>
		<tr>
			<th>Material Name</th>
			<th>QTY</th>
			<th>Decrement</th>
			<th>Balance</th>
			<th>action</th>
			<th>User Edit</th>
			<th>Decrement Date</th>
			<th>ครั้งที่</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($history as $key => $value) {?>
		<tr <?=($value['decrement_status'] == "hide") ? "hidden=''" : "";?>>
			<td><?=$value['pri_matname'];?></td>
			<td><?=$value['qty'];?></td>
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
		swal("", "Please fill  remark", "error");
		return false;
	}
	$(this).submit();
});

</script>
<script type="text/javascript">

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
		 	sum += $(el).val()*1;
			// var aa =.val()*1;
			// sa += aa;
			// rows_num++;
		});
		 if(sum==0){
			$("#submit").attr('disabled', 'disabled');
		}
		// $("#submit").removeAttr('disabled');
		$("#labelsel").attr('class', '');

		$(".ball").each(function(index, el) {
			$(el).removeAttr('readonly');
			$(el).val(0);
			var id = $(el).attr('id');
			var attr_prid = $(el).attr('pr_id');
			var text_1 = $("#qty"+attr_prid).val();
			// alert(text_1);
			// alert(id);
			$(id).val(text_1);
			$('#balance'+attr_prid).val(text_1);

			var qty = $("#qty"+attr_prid).val()*1;
			var _return = (qty + $('#pri_sumqty'+attr_prid).html()*1);
			$("#return"+attr_prid).val(_return);
			var text_3 =$('#balance'+attr_prid).val();
			// alert(text_3);
			num++;
		});
		$(".key_up").bind("keyup change", function(event) {
			check_decre();
			var pr_id = $(this).attr('pr_id');
			var decrement = $(this).val();

			var qty = $("#qty"+pr_id).val()*1;

			var balance = qty-decrement;

			if(decrement>qty || decrement<0){
				swal({
		            title: "จำนวนที่ลดยอดเกินจำนวนที่มีอยู่ หรือไม่สามารถติดลบได้!!.",
		            text: "",
		            confirmButtonColor: "#EA1923",
		            type: "error"
		        });
				$("#submit").attr('disabled', 'disabled');
				$("#decrement"+pr_id).val(0);
				var pr_id = $(this).attr('pr_id');
				var decrement = $(this).val();

				var qty = $("#qty"+pr_id).val()*1;

				// var balance = qty_-decrement;
				// balance = qty-decrement;
				$("#balance"+pr_id).val(balance);
			}else{

				$("#balance"+pr_id).val(balance);
				var aa = $("#balance"+pr_id).val()*1;
				var bb = $("#pri_sumqty"+pr_id).html()*1;
				var sum = aa+bb;
				var _return = ((qty - $("#decrement"+pr_id).val() *1) + bb);
				$("#return"+pr_id).val(_return);

				$("#real"+pr_id).val(sum);

			}

		});
	});

	$("#return").click(function(event) {
		/* Act on the event */
		// var de = $(".key_up").attr('decrement');
		$("#submit").removeAttr('disabled');
		$("#labelsel").attr('class', '');
		var balance = "";
		var qty = "";
		var num = 0;
		$(".ball").each(function(index, el) {
			$(el).attr('readonly','');
			var decrement = $(el).attr('decrement')*1;
			// alert(decrement);
			var decrement_id = $(el).attr('id');
			var id =$(el).attr('pr_id');
			// console.log(id);
			// console.log(decrement_id);

			var text_1 = $("#qty"+id).val()*1;//ค่าช่องจำนวน
			var real_num = $("#decrement"+id).attr('qty')*1;
			var real_decre = $("#balance"+id).val()*1;

			// alert("real_num = "+real_num+" real_decre = "+real_decre);
			// console.log(real_num);
			// console.log(real_decre);
			if(real_decre > real_num) {
				// alert(real_num+" > "+real_decre);

				alert("ไม่สามารถคืนยอดได้");
				$("#submit").attr('disabled', 'disabled');
				// break;

			}else{
				var return_ = real_num - real_decre;
				// alert(return_);
				// alert(555);
				if(return_ != 0){
					$("#decrement"+id).val(return_);
					$("#balance"+id).val(real_num);

				}
				var aa = $("#balance"+id).val()*1;
				var bb = $("#pri_sumqty"+id).html()*1;
				var sum = aa+bb;
				// console.log($("#pri_sumqty"+id).html()*1);
				// $('#submit').atttr('disabled');
				var _return = ((text_1 + $("#decrement"+id).val() *1) + bb);
				$("#real"+id).val(sum);
				$("#return"+id).val(_return);
				// alert(return_);
			}

			num++;
		});

	});


</script>
<?php } else {
	?>

<?php //echo '<pre>';print_r($rows); ?>
<h2>Decrement <span>PR No: <?=$rows[0]['pri_ref'];?></span></h2>
<!-- rows[0]['pri_ref'] -->
<form action="<?php echo base_url(); ?>pr/decrement_true" method="post">
<table class="table table-hover" id="tb_pr_detail">
	<thead>
		<tr>
			<th class="text-center">Material Name</th>
			<th class="text-center">Total QTY</th>
			<th class="text-center">Qty Balance</th>
			<th class="text-center">QTY Discounted</th>
			<th class="text-center">Decrement</th>
			<th class="text-center">Balance</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($rows as $key => $value) {?>
		<tr>
			<td><?=$value['pri_matname'];?></td>
			<td><?=$value['pri_qty']*1?></td>
			<td class="text-right" id="pri_sumqty<?=$value['pri_id'];?>"><?=$value['pri_sumqty'] * 1?></td>
			<td>
				<input
				type="number"
				name="qty[]"
				class="form-control input-xs text-right"
				id="qty<?=$value['pri_id'];?>"
				value="<?=$value['pri_qty'] - $value['pri_sumqty'] * 1;?>"
				readonly="true">
			</td>
			<td>
				<input
				type="number"
				name="decrement[]"
				class="form-control input-xs key_up text-right"
				id="decrement<?=$value['pri_id'];?>"
				pr_id="<?=$value['pri_id'];?>"
				value="0"
				pattern="[0-9]">
				<input type="hidden" name="pr_item_id[]" value="<?=$value['pri_id'];?>">
			</td>
			<td>
				<input
				type="number"
				name="balance[]"
				class="form-control input-xs text-right"
				id="balance<?=$value['pri_id'];?>"
				readonly="true"
				value="<?=$value['pri_qty'] - $value['pri_sumqty'] * 1;?>">
				<input type="hidden" name="pri_qty[]" id="real<?=$value['pri_id'];?>" value="<?=$value['pri_qty']?>">
				<input type="hidden" name="return[]" id="return<?=$value['pri_id'];?>" value="<?=$value['pri_qty'] * 1?>">
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
	<button class="btn btn-success" id="submit" >save</button>
</div>
<?php
$name = $this->session->userdata('sessed_in')['m_name'];
	$compcode = $this->session->userdata('sessed_in')['compcode'];
//echo '<pre>';print_r($this->session->userdata('sessed_in')); ?>
<input type="hidden" name="user_decrement" value="<?=$name?>">
<input type="hidden" name="date_decrement" value="<?php echo date('Y-m-d'); ?>">
<input type="hidden" name="compcode" value="<?=$compcode?>">
<input type="hidden" name="ref_pr" value="<?=$rows[0]['pri_ref'];?>">
<!-- $rows[0]['pri_ref'] -->
<input type="hidden" name="type" value="reduce">
</form>
<script type="text/javascript">
// if (true) {}
$("#submit").click(function(event) {
	var remark = $("#remark").val();

	if (remark == "" || remark == null) {
		swal("", "Please fill remark", "error");
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
		var pr_id = $(this).attr('pr_id');
		var decrement = $(this).val();

		var qty = $("#qty"+pr_id).val()*1;


		// alert(qty);
		// if () {}
		if(decrement>qty || decrement<0){

			swal({
	            title: "จำนวนที่ลดยอดเกินจำนวนที่มีอยู่ หรือไม่สามารถติดลบได้!!.",
	            text: "",
	            confirmButtonColor: "#EA1923",
	            type: "error"
	        });
			$("#submit").attr('disabled', 'disabled');
	        var aa = $("#balance"+pr_id).val()*1;
			var bb = $("#pri_sumqty"+pr_id).html()*1;
			var sum = aa+bb;
			// console.log($("#pri_sumqty"+pr_id).html()*1);
			// $('#submit').atttr('disabled');
			$("#real"+pr_id).val(sum);

			$("#decrement"+pr_id).val(0);
			var pr_id = $(this).attr('pr_id');
			var decrement = $(this).val();

			var qty = $("#qty"+pr_id).val()*1;
			var balance = qty-decrement;
			// var balance = qty_-decrement;
			// balance = qty-decrement;
			$("#balance"+pr_id).val(balance);
		}else{
			var balance = qty-decrement;
			$("#balance"+pr_id).val(balance);
			// alert($("#balance"+pr_id).val());
			var aa = $("#balance"+pr_id).val()*1;
			var bb = $("#pri_sumqty"+pr_id).html()*1;
			var sum = aa+bb;
			var _return = ((qty - $("#decrement"+pr_id).val() *1) + bb);
			// console.log($("#pri_sumqty"+pr_id).html()*1);
			// $('#submit').atttr('disabled');
			$("#real"+pr_id).val(sum);
			$("#return"+pr_id).val(_return);
		}

	});
</script>
<?php }?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
