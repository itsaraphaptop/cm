
<div class="page-header page-header-transparent">
<div class="page-header-content">
<div class="page-title">
<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span> Summay Contract and Billing by Project/Department  Report</h4>
</div>

<div class="heading-elements">
<div class="heading-btn-group">
<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
</div>
</div>
<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

<div class="breadcrumb-line breadcrumb-line-component">
<ul class="breadcrumb">
<li><a class="preload" href="/"><i class="icon-home2 position-left"></i> Home</a></li>
<li class="active">Summay Contract and Billing by Project/Department  Report</li>
</ul>

<ul class="breadcrumb-elements">
<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon-gear position-left"></i>
Settings
<span class="caret"></span>
</a>

<ul class="dropdown-menu dropdown-menu-right">
<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
<li class="divider"></li>
<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
</ul>
</li>
</ul>
<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
</div>

<div class="content">


<div class="panel panel-flat">
<div class="panel-heading">
<h6 class="panel-title"><i class="icon-cog3 position-left"></i>Summay Contract and Billing by Project/Department  Report<p></p></h6>
<div class="heading-elements">
<button type="button" class="btn btn-default heading-btn" name="button" data-toggle="modal" data-target="#cri"><i class="fa fa-search"></i> เลือกเงื่อนไข</button>
<a href="/" class="btn btn-default heading-btn"><i class="fa fa-close"></i> Close</a>
</div>
<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

<div class="panel-body">
<div id="loadtable">

</div>

</div>

</div>
</div>

<div id="cri" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h5 class="modal-title">เงื่อนไข</h5>
</div>
<form id="contactForm1" action="<?php echo base_url(); ?>lo_report/lo_report_v" method="post">
<div class="modal-body">
<table class="table table-hover">
<thead>
<tr>
<th width="30%">#</th>
<th width="20%">#</th>
<th width="30%">#</th>
<th width="20%">Action</th>
</tr>
</thead>
<tbody id="body">
<tr>
<td>
<select class="form-control input-sm" name="a[]" id="a">
<option value="project">โครงการ</option>
<option value="department">แผนก</option>
<option value="vender">ร้านค้า</option>
<option value="date">วันที่</option>
</select>
<input type="hidden" class="form-control input-sm text-center" readonly name="aa[]" id="aa">
</td>
<td>
<select class="form-control input-sm" name="eqir[]" id="eqir">
<option value="=">=</option>
<option value=">=">&gt;=</option>
<option value="<=">&lt;=</option>
<option value="<>">&lt;&gt;</option>
</select>
</td>
<td><input type="hidden" class="form-control input-sm text-center" name="val[]" id="vati">
<input type="hidden" class="form-control input-sm text-center" name="mem[]" id="memi">
<input type="text" class="form-control input-sm text-center" name="valname[]" id="vatnamei">
<input type="text" class="form-control input-sm text-center daterange-single" name="dat[]" id="datei">
<input type="hidden" class="form-control input-sm text-center" id="texteq" value="=">
</td>
<td>
<ul class="icons-list">
<li><a class="editproj label label-primary" data-toggle="modal" data-target="#editproj"> เลือก</a></li>
<li><a class="editdee label label-primary" data-toggle="modal" data-target="#editdee"> เลือก</a></li>
<li><a class="editprreq label label-primary" data-toggle="modal" data-target="#editprreq"> เลือก</a></li>
<li><a class="edit label label-primary" data-toggle="modal" data-target="#edit"> เลือก</a></li>
<li><a class="label label-danger" id="remove" data-popup="tooltip" title="Remove"> ลบรายการ</a></li>
</ul>
</td>
</tr>
</tbody>
</table>
</div>
<div class="modal-footer">
<input type="hidden" id="cdat" name="cdat" value="0">
<input type="hidden" id="cpro" name="cpro" value="1">
<input type="hidden" id="row" name="row" value="1">
<input type="hidden" id="chk" name="chk" value="">
<input type="hidden" id="pro" name="pro" value="">
<input type="hidden" id="eq" name="eq" value="project">
<input type="hidden" id="and" name="and" value="">
<input type="hidden" id="mm" name="mm" value="">
<input type="hidden" id="da" name="da" value="">
<input type="hidden" id="empty" name="empty">
<input type="hidden" class="form-control"  id="datone" name="datone">
<input type="hidden" class="form-control"  id="daton" name="daton">
<input type="hidden" class="form-control"  id="dattwo" name="dattwo">
<div id="text">

</div>
<a id="ins" class="btn bg-primary">เพิ่มเงื่อนไข</a>
<button type="submit" id="save" class="btn bg-primary-600">แสดงรายงาน</button>
<a id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
</div>
</form>
</div>
</div>
</div>

<script type="text/javascript">
var frm = $('#contactForm1');
frm.submit(function (ev) {
$.ajax({
type: frm.attr('method'),
url: frm.attr('action'),
data: frm.serialize(),
success: function (data) {
$("#loadtable").html(data);
$('#cri').modal('hide');
}
});
ev.preventDefault();

});

</script>
<div id="modalproj">
</div>
<div id="modalde">
</div>
<div id="modalpr">
</div>

<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
}

?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script>
$(window).load(function(){
$('#cri').modal('show');
$("#aa").val("projectcode");
//  $("#save").prop('disabled',true);
$("#datei").hide();
$(".editproj").show();
$(".editdee").hide();
$(".editprreq").hide();
$(".edit").hide();
$("#datone").val("");
});
$('#remove').on('click', function() {
if ($("#aa").val()=="project") {
$("#pro").val("");
$("#chk").val("");
var row = +$("#row").val() - 1;
var chk = $("#row").val(row);
var rowc = +$("#cpro").val() - 1;
$("#cpro").val(rowc);
$(this).closest('tr').remove();
}else if($("#aa").val()=="vender"){
$("#mm").val("");
$("#chk").val("");
var row = +$("#row").val() - 1;
var chk = $("#row").val(row);
var rowc = +$("#cpro").val() - 1;
$("#cpro").val(rowc);
$(this).closest('tr').remove();
}else if($("#aa").val()=="department"){
$("#mm").val("");
$("#chk").val("");
var row = +$("#row").val() - 1;
var chk = $("#row").val(row);
var rowc = +$("#cpro").val() - 1;
$("#cpro").val(rowc);
$(this).closest('tr').remove();

}

});
$("#a").change(function(){
if ($("#a").val()=="project") {
$("#aa").val("projectcode");
$("#eq").val("projectcode");
$("#memi").val("");
$("#mm").val("");
$("#vatnamei").val("");
$("#vatnamei").show();
$("#datei").hide();
$(".editproj").show();
$(".editdee").hide();
$(".editprreq").hide();
$(".edit").hide();
// var rowc = +$("#cpro").val() + 1;
// $("#cpro").val(rowc);
$("#datone").val("");
}else if($("#a").val()=="department"){
$("#aa").val("department");
$("#eq").val("department");
$("#vati").val("");
$("#pro").val("");
$("#vatnamei").show();
$("#vatnamei").val("");
$("#datei").hide();
$(".editproj").hide();
$(".editdee").show();
$(".editprreq").hide();
$(".edit").hide();
// var rowc = +$("#cpro").val() + 1;
// $("#cpro").val(rowc);
$("#datone").val("");
}else if($("#a").val()=="vender"){
$("#aa").val("vender");
$("#eq").val("subcontact");
$("#vati").val("");
$("#pro").val("");
$("#vatnamei").show();
$("#vatnamei").val("");
$("#datei").hide();
$(".editproj").hide();
$(".editdee").hide();
$(".editprreq").show();
$(".edit").hide();
// var rowc = +$("#cpro").val() + 1;
// $("#cpro").val(rowc);
$("#datone").val("");
}else{
$("#aa").val("date");
$("#vati").val("date");
$("#vatnamei").hide();
$("#datei").show();
$(".editproj").hide();
$(".editdee").hide();
$(".editprreq").hide();
$(".edit").show();
var rowc = +$("#cpro").val() - 1;
var eqiri= $("#eqiri").val();
var rowa = +$("#cdat").val() + 1;
$("#cdat").val(rowa);
$("#cpro").val(rowc);
$("#eq").val('date');
$("#datone").val("lodate"+$("#eqir").val()+"'"+$("#datei").val()+"'");
$("#daton").val("lodate"+$("#eqir").val()+"'"+$("#datei").val()+"'");
$("#chk").val("where");
$("#da").val("and");
}
});
$("#datei").keyup(function(){
$("#datone").val("lodate"+$("#eqir").val()+"'"+$("#datei").val()+"'");
$("#daton").val("lodate"+$("#eqir").val()+"'"+$("#datei").val()+"'");
});
$("#eqir").change(function(){
if ($("#a").val()=="projectcodeode") {

}else if($("#a").val()=="department"){
}else if($("#a").val()=="vender"){
}else{
$("#datone").val("lodate"+$("#eqir").val()+"'"+$("#datei").val()+"'");
$("#daton").val("lodate"+$("#eqir").val()+"'"+$("#datei").val()+"'");
}
});
$("#ins").click(function(){
addrows();
$("#save").prop('disabled',false);
var row = +$("#row").val() + 1;
var chk = $("#row").val(row);
var rowc = +$("#cpro").val() + 1;
$("#cpro").val(rowc);
$("#eq").val("projectcode");
$("#and").val('and');
});
function addrows()
{
var row = ($('#body tr').length-0)+1;
var tr = '<tr>'+
'<td>'+
'<select class="form-control input-sm" name="a[]" id="a'+row+'">'+
'<option value="project">โครงการ</option>'+
'<option value="department">แผนก</option>'+
'<option value="vender">ร้านค้า</option>'+
'<option value="date">วันที่</option>'+
'</select>'+
'<input type="hidden" class="form-control input-sm text-center" readonly name="aa[]" id="aa'+row+'">'+
'</td>'+
'<td>'+
'<select class="form-control input-sm" name="eqir[]" id="eqird'+row+'" >'+
'<option value="=">=</option>'+
'<option value=">=">&gt;=</option>'+
'<option value="<=">&lt;=</option>'+
'	<option value="<>">&lt;&gt;</option>'+
'</select>'+
'</td>'+
'<td><input type="hidden" class="form-control input-sm text-center" name="val[]" id="vati'+row+'">'+
'<input type="hidden" class="form-control input-sm text-center" name="mem[]" id="memi'+row+'">'+
'<input type="text" class="form-control input-sm text-center" name="valname[]" id="vatnamei'+row+'">'+
'<input type="text" class="form-control input-sm text-center daterange-single" name="dat[]" id="datei'+row+'">'+
'<input type="hidden" class="form-control input-sm text-center" id="texteq'+row+'" value="=">'+
'</td>'+
'<td>'+
'<ul class="icons-list">'+
'<li><a class="editproj'+row+' label label-primary" data-toggle="modal" data-target="#editproj'+row+'"> เลือก</a></li>'+
'<li><a class="editdee'+row+' label label-primary" data-toggle="modal" data-target="#editdee'+row+'"> เลือก</a></li>'+
'<li><a class="editprreq'+row+' label label-primary" data-toggle="modal" data-target="#editprreq'+row+'"> เลือก</a></li>'+
'<li><a class="edit'+row+' label label-primary" data-toggle="modal" data-target="#edit'+row+'"> เลือก</a></li>'+
'<li><a class="label label-danger" id="remove'+row+'" data-popup="tooltip" title="Remove"> ลบรายการ</a></li>'+
'</ul>'+
'</td>'+
'</tr>';

$('#body').append(tr);

var tex = '<input type="hidden" id="text'+row+'" value="">';
$('#text').append(tex);
$("#aa"+row).val("projectcode");
$("#datei"+row).hide();
$(".editproj"+row).show();
$(".editdee"+row).hide();
$(".editprreq"+row).hide();
$(".edit"+row).hide();
$("#a"+row).change(function(){

if ($("#a"+row).val()=="project") {

$("#aa"+row).val("project");
$("#eq").val("projectcode");
$("#mm"+row).val("");
$("#vatnamei"+row).val("");
$("#vatnamei"+row).show();
$("#datei"+row).hide();
$(".editproj"+row).show();
$(".editdee"+row).hide();
$(".editprreq"+row).hide();
$(".edit"+row).hide();
// var rowc = +$("#cpro").val() + 1;
// $("#cpro").val(rowc);
$("#text"+row).val("");
$("#datone").val("");
}else if($("#a"+row).val()=="department"){
$("#aa"+row).val("department");
$("#eq").val("subcontact");
$("#vati"+row).val("");
$("#vatnamei"+row).show();
$("#vatnamei"+row).val("");
$("#datei"+row).hide();
$(".editproj"+row).hide();
$(".editdee"+row).show();
$(".editprreq"+row).hide();
$(".edit"+row).hide();
var rowc = +$("#cdat").val() - 1;
$("#cdat").val(rowc);
if ($("#cdat").val()<=2) {
$("#dattwo").val("");
}
$("#text"+row).val('memid=');
$("#datone").val("");
}else if($("#a"+row).val()=="vender"){
$("#aa"+row).val("vender");
$("#eq").val("subcontact");
$("#vati"+row).val("");
$("#vatnamei"+row).show();
$("#vatnamei"+row).val("");
$("#datei"+row).hide();
$(".editproj"+row).hide();
$(".editdee"+row).hide();
$(".editprreq"+row).show();
$(".edit"+row).hide();
var rowc = +$("#cdat").val() - 1;
$("#cdat").val(rowc);
if ($("#cdat").val()<=2) {
$("#dattwo").val("");
}
$("#text"+row).val('memid=');
$("#datone").val("");
}else{
$("#aa"+row).val("date");
$("#vati"+row).val("date");
$("#vatnamei"+row).hide();
$("#datei"+row).show();
$(".editproj"+row).hide();
$(".editdee"+row).hide();
$(".editprreq"+row).hide();
$(".edit"+row).show();
var rowc = +$("#cdat").val() + 1;
var rowa = +$("#cpro").val() - 1;
$("#cpro").val(rowa);
$("#cdat").val(rowc);
if ($("#cdat").val()>=2) {
$("#and").val("");
$("#da").val("");
$("#dattwo").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val($("#daton").val()+$("#dattwo").val());
}else{
$("#daton").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
}
$("#chk").val("where");
// $("#da").val("and");
}

});
$("#datei"+row).keyup(function(){
// var rowc = +$("#cdat").val() + 1;
// $("#cdat").val(rowc);
if ($("#cdat").val()>=2) {
$("#da").val("");
// $("#daton").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#dattwo").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val($("#daton").val()+$("#dattwo").val());
}else{
$("#daton").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
}
});
$("#eqird"+row).change(function(){
// var rowc = +$("#cdat").val() + 1;
// $("#cdat").val(rowc);
if ($("#cdat").val()>=2) {
$("#da").val("");
$("#dattwo").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val($("#daton").val()+$("#dattwo").val());
}else{
$("#daton").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val("lodate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
}
});
var modalproj = '<div id="editproj'+row+'" class="modal fade">'+
'<div class="modal-dialog modal-lg">'+
'<div class="modal-content">'+
'<div class="modal-header">'+
'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
'<h5 class="modal-title"></h5>'+
'</div>'+
'<div class="modal-body">'+
'<div id="malbody'+row+'">'+
'<table class="table table-xxs table-hover datatable-basics" >'+
		'<thead>'+
			'<tr>'+
				'<th>No.</th>'+
				'<th>รหัสโครงการ</th>'+
				'<th>ชื่อโครงการ</th>'+
				'<th width="5%">จัดการ</th>'+
			'</tr>'+
		'</thead>'+
		'<tbody>'+
				'<?php   $n =1;?>'+
				'<?php foreach ($getproj as $valj){ ?>'+
			'<tr>'+
			 '<th scope="row"><?php echo $n;?></th>'+
			 '<td><?php echo $valj->project_code; ?></td>'+
				'<td><?php echo $valj->project_name; ?></td>'+
					'<td><button class="openproj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid'+row+'="<?php echo $valj->project_id;?>" data-projname'+row+'="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>'+
			'</tr>'+
				'<?php $n++; } ?>'+
		'</tbody>'+
	'</table>'+
'</div>'+
'</div>'+
'<div class="modal-footer">'+
'<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>'+
'</div>'+
'</form>'+
'</div>'+
'</div>'+
'</div>';
$("#modalproj").append(modalproj);

var modaldepartment = '<div id="editdee'+row+'" class="modal fade">'+
'<div class="modal-dialog modal-lg">'+
'<div class="modal-content">'+
'<div class="modal-header">'+
'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
'<h5 class="modal-title"></h5>'+
'</div>'+
'<div class="modal-body">'+
'<div id="debody'+row+'">'+

'</div>'+
'</div>'+
'<div class="modal-footer">'+
'<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>'+
'</div>'+
'</form>'+
'</div>'+
'</div>'+
'</div>';
$("#modalde").append(modaldepartment);

var modalprreq = '<div id="editprreq'+row+'" class="modal fade">'+
'<div class="modal-dialog modal-lg">'+
'<div class="modal-content">'+
'<div class="modal-header">'+
'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
'<h5 class="modal-title"></h5>'+
'</div>'+
'<div class="modal-body">'+
'<div id="malbody'+row+'">'+
'<table class="table table-xxs table-hover datatable-basics" >'+
		'<thead>'+
			'<tr>'+
				'<th>No.</th>'+
				'<th>รหัสพนักงาน</th>'+
				'<th>ชื่อพนักงาน</th>'+
				'<th width="5%">จัดการ</th>'+
			'</tr>'+
		'</thead>'+
		'<tbody>'+
'<?php   $n =1;?>'+
'<?php foreach ($member as $valj){ ?>'+
'<tr>'+
'<th scope="row"><?php echo $n;?></th>'+
'<td><?php echo $valj->vender_id; ?></td>'+
'<td><?php echo $valj->vender_name; ?></td>'+
'<td><button class="openemp'+row+' btn btn-xs btn-block btn-info" data-toggle="modal"  data-vender_id'+row+'="<?php echo $valj->vender_id;?>" data-vender_code'+row+'="<?php echo $valj->vender_code;?>" data-dismiss="modal">เลือก</button></td>'+
'</tr>'+
'<?php $n++; } ?>'+
'</tbody>'+
'</table>'+
'</div>'+
'</div>'+
'<div class="modal-footer">'+
'<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>'+
'</div>'+
'</form>'+
'</div>'+
'</div>'+
'</div>';
$("#modalpr").append(modalprreq);

$('.editdee'+row).on('click', function() {
		// alert('www');
	$('#debody'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
	$('#debody'+row).load('<?php echo base_url(); ?>lo_report/getdepartment/'+row);
	});

$(".openproj"+row).click(function(){
$("#eq").val("projectcode");
if ($("#cpro").val()>="2") {
var p2 = " and "+$("#eq").val()+$("#texteq"+row).val()+"'"+$(this).data('projid'+row)+"'";
$("#pro").val($("#pro").val()+p2);
$("#vati"+row).val($(this).data('projid'+row));
$("#vatnamei"+row).val($(this).data('projname'+row));
$("#chk").val("where");
$("#text"+row).val(p2);
}else{
$("#vati"+row).val($(this).data('projid'+row));
$("#vatnamei"+row).val($(this).data('projname'+row));
var q = $("#eq").val();
var f = $("#texteq"+row).val();
var pro = "'"+$(this).data('projid'+row)+"'";
var gg = q+f+pro;
$("#pro").val(gg);
// $("#and").val("and");
$("#chk").val("where");
}
});
$(".openemp"+row).click(function(){
$("#eq").val("subcontact");
$("#memi"+row).val($(this).data('vender_id'+row));
var q = $("#eq").val();
var f = $("#texteq"+row).val();
var mm = "'"+$(this).data('vender_id'+row)+"'";
var gg = q+f+mm;
$("#mm").val(gg);
$("#and").val("and");
$("#chk").val("where");
$("#vatnamei"+row).val($(this).data('vender_code'+row));
});

$('#remove'+row).on('click', function() {
var rows = +$("#row").val() - 1;
var chk = $("#row").val(rows);
var rowc = +$("#cpro").val() - 1;
$("#cpro").val(rowc);
if ($("#aa"+row).val()=="project") {

if ($("#row").val()=="0") {
$("#pro").val("");
$("#and").val("");
$("#chk").val("");

$(this).closest('tr').remove();
}else if ($("#row").val()=="1") {
$("#and").val("");
$("#chk").val("where");

$(this).closest('tr').remove();
}else{
$("#and").val("and");
$("#chk").val("where");
$(this).closest('tr').remove();
}
$("#pro").val("");
}else if($("#aa"+row).val()=="member"){
if ($("#row").val()=="0") {
$("#pro").val("");
$("#and").val("");
$("#chk").val("");

$(this).closest('tr').remove();
}else if ($("#row").val()=="1") {
$("#and").val("");
$("#chk").val("where");
$(this).closest('tr').remove();
}else{
$("#and").val("and");
$("#chk").val("where");
$(this).closest('tr').remove();
}
$("#mm").val("");
}
}
);
$('.daterange-single').daterangepicker({
singleDatePicker: true,
locale: {
format: 'YYYY-MM-DD'
}
});
}

</script>
<div id="editproj" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h5 class="modal-title"></h5>
</div>
<div class="modal-body">
<div id="malbody">
<table class="table table-xxs table-hover datatable-basics" >
<thead>
<tr>
<th>No.</th>
<th>รหัสโครงการ</th>
<th>ชื่อโครงการ</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($getproj as $valj){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $valj->project_code; ?></td>
<td><?php echo $valj->project_name; ?></td>
<td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid="<?php echo $valj->project_id;?>" data-projname="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>
</tr>
<?php $n++; } ?>
</tbody>
</table>
</div>
</div>
<div class="modal-footer">
<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
</div>
</form>
</div>
</div>
</div>


<div id="editdee" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h5 class="modal-title"></h5>
</div>
<div class="modal-body">
<div id="malbody">
<table class="table table-xxs table-hover datatable-basics" >
<thead>
<tr>
<th>No.</th>
<th>รหัสแผนก</th>
<th>ชื่อแผนก</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($depart as $valde){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $valde->department_code; ?></td>
<td><?php echo $valde->department_title; ?></td>
<td><button class="opende btn btn-xs btn-block btn-info" data-toggle="modal"  data-deid="<?php echo $valde->department_id;?>" data-dename="<?php echo $valde->department_title;?>" data-dismiss="modal">เลือก</button></td>
</tr>
<?php $n++; } ?>
</tbody>
</table>
</div>
</div>
<div class="modal-footer">
<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
</div>
</form>
</div>
</div>
</div>


<div id="editprreq" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h5 class="modal-title"></h5>
</div>
<div class="modal-body">
	<div id="malbody">
	<table class="table table-xxs table-hover datatable-basics" >
				<thead>
					<tr>
						<th>No.</th>
						<th>รหัสพนักงาน</th>
						<th>ชื่อพนักงาน</th>
						<th width="5%">จัดการ</th>
					</tr>
				</thead>
				<tbody>
	<?php   $n =1;?>
	<?php foreach ($member as $valj){ ?>
<tr>
 <th scope="row"><?php echo $n;?></th>
 <td><?php echo $valj->vender_id; ?></td>
	<td><?php echo $valj->vender_name; ?></td>
		<td><button class="openemp btn btn-xs btn-block btn-info" data-toggle="modal"  data-vender_id="<?php echo $valj->vender_id;?>" data-vender_name="<?php echo $valj->vender_name;?>" data-dismiss="modal">เลือก</button></td>
</tr>
	<?php $n++; } ?>
	</tbody>
</table>
	</div>
</div>
<div class="modal-footer">
	<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
</div>
</form>
</div>
</div>
</div>

<script>
$(".openproj").click(function(){
$("#vati").val($(this).data('projid'));
$("#eq").val("projectcode");
$("#vatnamei").val($(this).data('projname'));
var q = $("#eq").val();
var f = $("#texteq").val();
var pro = "'"+$(this).data('projid')+"'";
var gg = q+f+pro;
$("#pro").val(gg);
$("#chk").val("where");
});
$(".opende").click(function(){
$("#vati").val($(this).data('deid'));
$("#eq").val("department");
$("#vatnamei").val($(this).data('dename'));
var q = $("#eq").val();
var f = $("#texteq").val();
var pro = "'"+$(this).data('deid')+"'";
var gg = q+f+pro;
$("#pro").val(gg);
$("#chk").val("where");
});
$(".openemp").click(function(){
$("#eq").val("subcontact");
$("#memi").val($(this).data('vender_id'));
var q = $("#eq").val();
var f = $("#texteq").val();
var mm = "'"+$(this).data('vender_id')+"'";
var gg = q+f+mm;
$("#mm").val(gg);
$("#chk").val("where");
$("#vatnamei").val($(this).data('vender_name'));
});
</script>
<script type="text/javascript">
	
		$("[data-pinterest-extension-installed]").removeClass('sidebar-secondary-hidden');
	
</script>