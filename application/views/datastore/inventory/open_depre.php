<?php foreach ($depre_h as  $v) {
	$depreciation_code = $v->depreciation_code;
} ?>

<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
<div class="content">
	<form method="post" action="<?php echo base_url(); ?>index.php/asset_active/depreciation_edit" id="chk_depre">
		<!-- Input group addons -->
		<div class="panel panel-flat">
			<!-- <div class="panel-heading">
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
			</div> -->
			<div class="panel-body">
				<div class="row">
					<div class="form-group">
						<div class="col-sm-2">
							<label class="control-label">Depreciation Code :</label>
							<input type="text" readonly="" class="form-control input-xs" value="<?php echo $v->depreciation_code ?>" name="depreciation_code_update" id="depreciation_code">
							<input type="hidden" name="id_row" value="<?php echo $v->depreciation_id ?>">
						</div>
						<div class="col-sm-3">
							<label class="control-label">Depreciation Method :</label>
							<input type="text" class="form-control input-xs" id="depreciation_method" value="<?php echo $v->depreciation_method ?>" name="depreciation_method_update">
						</div>
						<div class="col-sm-2">
							<label class="control-label">Depreciation Year :</label>
							<input type="text" class="form-control input-xs" value="<?php echo $v->depreciation_year ?>" name="depreciation_year_update" id="depreciation_year">
						</div>
					</div>
				</div>
				
				<br>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-12 text-right">
							<a class="addrow btn bg-info" id="insertpodetail"><i class="icon-plus2"></i> Add Item</a>
						</div>
					</div>
				</div><br>
					<div class="row" id="table">
						<div class="col-md-12">
							
							<table class="table table-hover table-striped table-xxs" id="res">
								<thead>
									<tr>
										<th width="10%" style="text-align: center;">Year.</th>
										<th class="text-center">Depreciation Name</th>
										<th width="10%"  style="text-align: center;">%</th>
										<!-- <th width="10%"  style="text-align: center;">Value</th>                    -->
										<th style="text-align: center;">Remark</th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $n=1; foreach ($depre_det as $value) { ?>
									<tr>
										<td>
											<input type="hidden" name="chkup[]" class="form-control input-xs" value="update">
											<input type="hidden" name="id_detail[]" class="form-control input-xs" value="<?php echo $value->id_d ?>">
											<input type="number" name="depreciation_y[]" class="form-control input-xs" readonly="true" value="<?php echo $value->depreciation_y ?>">
										</td>
										<td>
											<input type="text" name="depreciation_operation[]" class="form-control input-xs" value="<?php echo $value->depreciation_operation ?>">
										</td>
										<td>
											<input type="text" name="depreciation_per[]" class="txt form-control input-xs text-right" value="<?php echo $value->depreciation_per ?>">
										</td>
										<td>
											<input type="text" name="depreciation_remark[]" class="form-control input-xs" value="<?php echo $value->depreciation_remark ?>">
										</td>
										<td class="text-center">
											<a  id="remove<?php echo $n; ?>" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>
										</td>
									</tr>
									<script>
										$(document).on('click', 'a#remove<?php echo $n; ?>', function () { // <-- changes
									var self = $(this);
									noty({
									width: 200,
									text: "Do you want to Delete?",
									type: self.data('type'),
									dismissQueue: true,
									timeout: 1000,
									layout: self.data('layout'),
									buttons: (self.data('type') != 'confirm') ? false : [
									{
									addClass: 'btn btn-primary btn-xs',
									text: 'Ok',
									onClick: function ($noty) { //this = button element, $noty = $noty element
									$noty.close();
									self.closest('tr').remove();
									noty({
									force: true,
									text: 'Deleteted',
									type: 'success',
									layout: self.data('layout'),
									timeout: 1000,
									});
									location.href = '<?php echo base_url(); ?>index.php/asset_active/del_depre/<?php echo $value->id_d ?>/<?php echo $value->depreciation_codeh ?>';
									}
									},
									{
									addClass: 'btn btn-danger btn-xs',
									text: 'Cancel',
									onClick: function ($save) {
									$save.close();
									save({
									force: true,
									text: 'You clicked "Cancel" button',
									type: 'error',
									layout: self.data('layout'),
									timeout: 1000,
									});
									}
									}
									]
									});
									return false;
									});
									</script>
									<?php $n++;  } ?>
									<tr>
									</tr>
								</tbody>
								<tr>
									<td colspan="2" class="text-center">TOTAL</td>
									<td><input type="text" id="sumdepre" class="form-control input-xs text-right" readonly=""></td>
									<td colspan="2"></td>
								</tr>
							</table>
							<div class="row">
								<br>
								<div class="text-right">
									<button type="button" id="saveepx" class="btn btn-success"><i class="icon-floppy-disk position-left"></i>Save</button>
									<a href="<?php echo base_url(); ?>index.php/inventory_area/depreciation" type="button" class="btn btn-danger" data-dismiss="modal" id="closeacc"><i class="icon-close2"></i> Close</a>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</form>
</div>
</div>
</div>
</div>

<script>
$("#saveepx").click(function(e){
var sumdepre = $('#sumdepre').val();


if(sumdepre!="100"){
swal({
title: "กรุณากรอกให้ครบ 100 %",
text: "",
type: "error"
});
}else{
var depreciation_code = $('#depreciation_code').val();
var frm = $('#chk_depre');
frm.submit(function (ev) {
$.ajax({
type: frm.attr('method'),
url: frm.attr('action'),
data: frm.serialize(),
success: function (data) {
swal({
title: "",
text: "Save Completed!!.",
// confirmButtonColor: "#66BB6A",
type: "success"
});
setTimeout(function() {
window.location.href = "<?php echo base_url(); ?>inventory_area/open_depre/"+depreciation_code;
}, 500);
}
});
ev.preventDefault();
});
$("#chk_depre").submit(); //Submit  the FORM
}
});
calculateSum();
$(".txt").on("keydown keyup", function() {

calculateSum();
});
function calculateSum() {
var sum = 0;
//iterate through each textboxes and add the values
$(".txt").each(function() {
//add only if the value is number
if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
sum += parseFloat($(this).val().replace(/,/g,""));
$(this).css("background-color", "#FEFFB0");
console.log(sum);
//alert(sum)
}
// else if (this.value.length != 0){
//     $(this).css("background-color", "red");
// }
});

if (parseFloat(100) < parseFloat(sum)) {
swal({
title: "เกินจำนวนที่กำหนด",
text: "",
confirmButtonColor: "#EA1923",
type: "error"
});
$("input#sumdepre").val(0);
$("input.txt").val(0);
}else{
$("input#sumdepre").val(numberWithCommas(sum));
}

}

</script>
<div id="depreciation" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Depreciation Method</h6>
			</div>
			<div class="modal-body">
				<div id="depre"></div>
			</div>
		</div>
	</div>
</div>
<script>
$('#insertpodetail').click(function(event) {
	var num = ($('#body tr').length)++;
	var add_tr = '<tr>'+
						'<td>'+
								'<input type="hidden" name="chkedit[]" class="form-control text-right" value="insertedit">'+
		'<input type="number" name="depreciation_y_edit[]" class="form-control text-right" value="'+num+'">'+'<input type="hidden" name="depreciation_codeh_edit[]" class="form-control text-right" value="<?php $depreciation_code; ?>">'+
	'</td>'+
	'<td>'+
		'<input type="text" name="depreciation_operation_edit[]" class="form-control text-right" value="">'+
	'</td>'+
	'<td>'+
		'<input type="text" name="depreciation_per_edit[]" class="txt form-control text-right" value="">'+
	'</td>'+
	'<td>'+
		'<input type="text" name="depreciation_remark_edit[]" class="form-control text-right" value="">'+
	'</td>'+
	'<td class="text-center">'+
		'<a  id="removei'+num+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
	'</td>'+
'</tr>';
$('#body').append(add_tr);

calculateSum();
$(".txt").on("keydown keyup", function() {

calculateSum();
});
function calculateSum() {
var sum = 0;
//iterate through each textboxes and add the values
$(".txt").each(function() {
//add only if the value is number
if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
sum += parseFloat($(this).val().replace(/,/g,""));
$(this).css("background-color", "#FEFFB0");
console.log(sum);
//alert(sum)
}
// else if (this.value.length != 0){
//     $(this).css("background-color", "red");
// }
});

if (parseFloat(100) < parseFloat(sum)) {
swal({
title: "เกินจำนวนที่กำหนด",
text: "",
confirmButtonColor: "#EA1923",
type: "error"
});
$("input#sumdepre").val(0);
$("input.txt").val(0);
}else{
$("input#sumdepre").val(numberWithCommas(sum));
}

}

$(document).on('click', 'a#removei'+num+'', function () { // <-- changes
var self = $(this);
noty({
width: 200,
text: "Do you want to Delete?",
type: self.data('type'),
dismissQueue: true,
timeout: 1000,
layout: self.data('layout'),
buttons: (self.data('type') != 'confirm') ? false : [
{
addClass: 'btn btn-primary btn-xs',
text: 'Ok',
onClick: function ($noty) { //this = button element, $noty = $noty element
$noty.close();
self.closest('tr').remove();
noty({
force: true,
text: 'Deleteted',
type: 'success',
layout: self.data('layout'),
timeout: 1000,
});
}
},
{
addClass: 'btn btn-danger btn-xs',
text: 'Cancel',
onClick: function ($save) {
$save.close();
save({
force: true,
text: 'You clicked "Cancel" button',
type: 'error',
layout: self.data('layout'),
timeout: 1000,
});
}
}
]
});
return false;
});
});
$(".de").click(function(){
$('#depre').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
$("#depre").load('<?php echo base_url(); ?>index.php/share/modal_depreciation');
});
$('#mfa').attr('class', 'active');
$('#mfa1').attr('style', 'background-color:#dedbd8');
</script>