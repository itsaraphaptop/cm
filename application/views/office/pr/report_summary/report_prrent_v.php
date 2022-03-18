<div class="page-header page-header-transparent">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span>Report</h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
			</div>
		</div>
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
	</div>

	<div class="breadcrumb-line breadcrumb-line-component">
		<ul class="breadcrumb">
				<li><a class="preload" href="/"><i class="icon-home2 position-left"></i> Home</a></li>
			<li><a class="preload" href="pr_summary"> รายงานรายการที่ถูกลบ</a></li>
			<li class="active">2.1 รายงานใบเบิกเงินสดย่อย/ใบเบิกที่ไม่มีใบสั่งซื้อ</li>
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
			<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
	</div>
</div>
<div class="content">


<div class="panel panel-flat">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Report	<p></p></h6>
		<div>
						<div class="panel-body">
	            <table style="width:100%">
	                <thead>
	                    <tr>
	                        <th colspan="3" valign="bottom"><img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="img img-responsive" style="max-height: 50px;"></th>
	                        <th colspan="10" valign="bottom" style="text-align:center;" class="ng-binding">
		                        บริษัท : <?php echo $companyname; ?><br>
		                        รายงานเบิกตามหนังสือสั่งจ้างรายงานรายการที่ถูกลบ <br>
	                        </th>
	                        <br><br><br>
	                        <th colspan="4" valign="bottom" style="text-align:right;" class="ng-binding">วันที่ <?php echo DateThai( date('Y-m-d H:i:s')) ?></th>
	                     </tr>
	                </thead>
	            </table>
				<br>
				<div id="loadtable">
				</div>
			</div>
		</div>		
		<div class="heading-elements">
			<button type="button" class="btn btn-default heading-btn" name="button" data-toggle="modal" data-target="#cri"><i class="fa fa-search"></i> เลือกเงื่อนไข</button>
			<a href="/" class="btn btn-default heading-btn"><i class="fa fa-close"></i> Close</a>
		</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>

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
			<form id="contactForm1" action="<?php echo base_url(); ?>pr_report/delete_page_ap" method="post">
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
										<option value="vender">Vender Code</option>
										<option value="docno">Doc.No.</option>
										<option value="date">Doc.Date</option>
										<option value="date">DeleteDate</option>
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
								<td>
									<input type="hidden" class="form-control input-sm text-center" name="val[]" id="vati">
									<input type="hidden" class="form-control input-sm text-center" name="mem[]" id="memi">
									<input type="text" class="form-control input-sm text-center" name="valname[]" id="vatnamei">
									<input type="text" class="form-control input-sm text-center daterange-single" name="dat[]" id="datei">
									<input type="hidden" class="form-control input-sm text-center" id="texteq" value="=">
								</td>
								<td>
									<ul class="icons-list">
										<li>
											<a class="editproj label label-primary" data-toggle="modal" data-target="#editproj"> เลือก</a>
										</li>
										<li>
											<a class="editprreq label label-primary" data-toggle="modal" data-target="#editprreq"> เลือก</a>
										</li>
										<li>
											<a class="edit label label-primary" data-toggle="modal" data-target="#edit"> เลือก</a>
										</li>
										<li>
											<a class="label label-danger" id="remove" data-popup="tooltip" title="Remove"> ลบรายการ</a>
										</li>
									</ul>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
				  	<input type="hidden" name="companyname" value="<?php echo $companyname; ?>">
					<input type="hidden" id="cdat" name="cdat" value="0">
					<input type="hidden" id="cpro" name="cpro" value="1">
					<input type="hidden" id="row" name="row" value="1">
					<input type="hidden" id="chk" name="chk" value="">
					<input type="hidden" id="pro" name="pro" value="">
					<input type="hidden" id="eq" name="eq" value="vender">
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


</script>
	<div id="modalproj">
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
	$("#aa").val("vender");
	$("#aa").val("");
	//  $("#save").prop('disabled',true);
	$("#datei").hide();
	$(".editproj").show();
	$(".editprreq").hide();
	$(".edit").hide();
	$("#datone").val("");
	});
	$('#remove').on('click', function() {
	if ($("#aa").val()=="vender") {
	$("#pro").val("");
	$("#chk").val("");

	var row = +$("#row").val() - 1;
	var chk = $("#row").val(row);
	var rowc = +$("#cpro").val() - 1;
	$("#cpro").val(rowc);
	$(this).closest('tr').remove();
	}else if($("#aa").val()=="docno"){
	$("#mm").val("");
	$("#chk").val("");

	var row = +$("#row").val() - 1;
	var chk = $("#row").val(row);
	var rowc = +$("#cpro").val() - 1;
	$("#cpro").val(rowc);
	$(this).closest('tr').remove();

	}

}
);
$("#a").change(function(){
if ($("#a").val()=="vender") {
$("#aa").val("vender");
$("#eq").val("vender");
$("#memi").val("");
$("#mm").val("");
$("#vatnamei").val("");
$("#vatnamei").show();
$("#datei").hide();
$(".editproj").show();
$(".editprreq").hide();
$(".edit").hide();

$("#datone").val("");
}else if($("#a").val()=="docno"){
$("#aa").val("docno");
$("#eq").val("pr_prno");
$("#vati").val("");
$("#pro").val("");
$("#vatnamei").show();
$("#vatnamei").val("");
$("#datei").hide();
$(".editproj").hide();
$(".editprreq").show();
$(".edit").hide();

$("#datone").val("");
}else{
$("#aa").val("date");
$("#vati").val("date");
$("#vatnamei").hide();
$("#datei").show();
$(".editproj").hide();
$(".editprreq").hide();
$(".edit").show();
var rowc = +$("#cpro").val() - 1;
var eqiri= $("#eqiri").val();
var rowa = +$("#cdat").val() + 1;
$("#cdat").val(rowa);
$("#cpro").val(rowc);
$("#eq").val('date');
$("#datone").val("ap_bill_date"+$("#eqir").val()+"'"+$("#datei").val()+"'");
$("#daton").val("ap_bill_date"+$("#eqir").val()+"'"+$("#datei").val()+"'");
$("#chk").val("where");
$("#da").val("and");
}
});



$("#datei").keyup(function(){
$("#datone").val("ap_bill_date"+$("#eqir").val()+"'"+$("#datei").val()+"'");
$("#daton").val("ap_bill_date"+$("#eqir").val()+"'"+$("#datei").val()+"'");
});
$("#eqir").change(function(){
if ($("#a").val()=="vender") {

}else if($("#a").val()=="docno"){

}else{
$("#datone").val("ap_bill_date"+$("#eqir").val()+"'"+$("#datei").val()+"'");
$("#daton").val("ap_bill_date"+$("#eqir").val()+"'"+$("#datei").val()+"'");
}
});
$("#ins").click(function(){
addrows();
$("#save").prop('disabled',false);
var row = +$("#row").val() + 1;
var chk = $("#row").val(row);
var rowc = +$("#cpro").val() + 1;
$("#cpro").val(rowc);
$("#eq").val("vender");
$("#and").val('and');
});
function addrows()
{
var row = ($('#body tr').length-0)+1;
var tr = '<tr>'+
'<td>'+
'<select class="form-control input-sm" name="a[]" id="a'+row+'">'+
'<option value="vender">Vendor Code</option>'+
'<option value="docno">Doc.No.</option>'+
'<option value="date">Doc.Date</option>'+
'<option value="date">Delete.Date</option>'+
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
'<li><a class="editprreq'+row+' label label-primary" data-toggle="modal" data-target="#editprreq'+row+'"> เลือก</a></li>'+
'<li><a class="edit'+row+' label label-primary" data-toggle="modal" data-target="#edit'+row+'"> เลือก</a></li>'+
'<li><a class="label label-danger" id="remove'+row+'" data-popup="tooltip" title="Remove"> ลบรายการ</a></li>'+
'</ul>'+
'</td>'+
'</tr>';

$('#body').append(tr);

var tex = '<input type="hidden" id="text'+row+'" value="">';
$('#text').append(tex);
$("#aa"+row).val("project");
$("#datei"+row).hide();
$(".editproj"+row).show();
$(".editprreq"+row).hide();
$(".edit"+row).hide();
$("#a"+row).change(function(){

if ($("#a"+row).val()=="vender") {

$("#aa"+row).val("vender");
$("#eq").val("ap_bill_vender");//
$("#mm"+row).val("");
$("#vatnamei"+row).val("");
$("#vatnamei"+row).show();
$("#datei"+row).hide();
$(".editproj"+row).show();
$(".editprreq"+row).hide();
$(".edit"+row).hide();
// var rowc = +$("#cpro").val() + 1;
// $("#cpro").val(rowc);
$("#text"+row).val("");
$("#datone").val("");
}else if($("#a"+row).val()=="docno"){
$("#aa"+row).val("docno");
$("#eq").val("ap_bill_code");
$("#vati"+row).val("");
$("#vatnamei"+row).show();
$("#vatnamei"+row).val("");
$("#datei"+row).hide();
$(".editproj"+row).hide();
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
$(".editprreq"+row).hide();
$(".edit"+row).show();
var rowc = +$("#cdat").val() + 1;
var rowa = +$("#cpro").val() - 1;
$("#cpro").val(rowa);
$("#cdat").val(rowc);
if ($("#cdat").val()>=2) {
$("#and").val("");
$("#da").val("");
$("#dattwo").val("ap_bill_date"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val($("#daton").val()+$("#dattwo").val());
}else{
$("#daton").val("ap_bill_date"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val("ap_bill_date"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
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
// $("#daton").val("pr_prdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#dattwo").val("ap_bill_date"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val($("#daton").val()+$("#dattwo").val());
}else{
$("#daton").val("ap_bill_date"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val("ap_bill_date"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
}
});
$("#eqird"+row).change(function(){
// var rowc = +$("#cdat").val() + 1;
// $("#cdat").val(rowc);
if ($("#cdat").val()>=2) {
$("#da").val("");
$("#dattwo").val("ap_bill_date"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val($("#daton").val()+$("#dattwo").val());
}else{
$("#daton").val("ap_bill_date"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
$("#datone").val("ap_bill_date"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
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
'<th>รหัสร้านค้า</th>'+

'<th width="5%">จัดการ</th>'+
'</tr>'+
'</thead>'+
'<tbody>'+
'<?php   $n =1;?>'+
'<?php foreach ($apbd as $valj){ ?>'+
'<tr>'+
'<th scope="row"><?php echo $n;?></th>'+
'<td><?php echo $valj->ap_bill_vender ?></td>'+

'<td><button class="openproj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid'+row+'="<?php echo $valj->ap_bill_id;?>" data-projname'+row+'="<?php echo $valj->ap_bill_vender;?>" data-dismiss="modal">เลือก</button></td>'+
'</tr>'+
'<?php $n++; } ?>'+
'</tbody>'+
'</table>'+
'</div>'+
'</div>'+
'<div class="modal-footer">'+
'<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>'+
'</div>'+
'</div>'+
'</div>'+
'</div>';
$("#modalproj").append(modalproj);

var modalprreq = '<div id="editprreq'+row+'" class="modal fade">'+
'<div class="modal-dialog modal-lg">'+
'<div class="modal-content">'+
'<div class="modal-header">'+
'<h5 class="modal-title"></h5>'+
'</div>'+
'<div class="modal-body">'+
'<div id="malbody'+row+'">'+
'<table class="table table-xxs table-hover datatable-basics" >'+
'<thead>'+
'<tr>'+
'<th>No.</th>'+
'<th>Doc.No</th>'+
'<th width="5%">จัดการ</th>'+
'</tr>'+
'</thead>'+
'<tbody>'+
'<?php   $n =1;?>'+
'<?php foreach ($apbd as $valj){ ?>'+

'<tr><td><?php echo $n; ?></td><td><?php echo $valj->ap_bill_code; ?></td>'+
'<td><button class="openemp'+row+' btn btn-xs btn-block btn-info" data-toggle="modal"  data-mid'+row+'="<?php echo $valj->ap_bill_id;?>" data-m_name'+row+'="<?php echo $valj->ap_bill_code;?>" data-dismiss="modal">เลือก</button></td></tr>'+
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

$(".openproj"+row).click(function(){
$("#eq").val("ap_bill_vender");//
if ($("#cpro").val()>="2") {
var p2 = " or "+$("#eq").val()+$("#texteq"+row).val()+"'"+$(this).data('projid'+row)+"'";
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
$("#eq").val("ap_bill_code");
$("#memi"+row).val($(this).data('mid'+row));
var q = $("#eq").val();
var f = $("#texteq"+row).val();
var mm = "'"+$(this).data('mid'+row)+"'";
var gg = q+f+mm;
$("#mm").val(gg);
$("#and").val("and");
$("#chk").val("where");
$("#vatnamei"+row).val($(this).data('m_name'+row));
});
$('#remove'+row).on('click', function() {
var rows = +$("#row").val() - 1;
var chk = $("#row").val(rows);
var rowc = +$("#cpro").val() - 1;
$("#cpro").val(rowc);
if ($("#aa"+row).val()=="vender") {

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
}else if($("#aa"+row).val()=="docno"){
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
									<th>Vendor</th>
									
									<th width="5%">จัดการ</th>
								</tr>
							</thead>
							<tbody>
							<?php   $n =1;?>
							<?php foreach ($apbd as $valvd){ ?>
								<tr>
									<th scope="row"><?php echo $n;?></th>
									<td><?php echo $valvd->ap_bill_vender; ?></td>
									<td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid="<?php echo $valvd->ap_bill_id;?>" data-projname="<?php echo $valvd->ap_bill_vender;?>" data-dismiss="modal">เลือก</button></td>
								</tr>
							<?php $n++; } ?>
							</tbody>
						</table>
					</div>
			</div>
			<div class="modal-footer">
				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
			</div>
		<!-- </form> -->
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
								<th>DocNo</th>
								
								<th width="5%">จัดการ</th>
							</tr>
						</thead>
						<tbody>
						<?php   $n =1;?>
						<?php foreach ($apbd as $valj){ ?>
							<tr>
								<th scope="row"><?php echo $n;?></th>
								<td><?php echo $valj->ap_bill_code; ?></td>
								
								<td><button class="openemp btn btn-xs btn-block btn-info" data-toggle="modal"  data-mid="<?php echo $valj->ap_bill_code;?>" data-m_name="<?php echo $valj->ap_bill_code;?>" data-dismiss="modal">เลือก</button></td>
							</tr>
						<?php $n++; } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
			</div>
		<!-- </form> -->
		</div>
	</div>
</div>

<script>
$(".openproj").click(function(){
$("#vati").val($(this).data('projid'));
$("#eq").val("ap_bill_id");//แก้ชื่อที่ส่ง
$("#vatnamei").val($(this).data('projname'));
var q = $("#eq").val();
var f = $("#texteq").val();
var pro = "'"+$(this).data('projid')+"'";
var gg = q+f+pro;
$("#pro").val(gg);
$("#chk").val("where");
});
$(".openemp").click(function(){
$("#eq").val("ap_bill_code");
$("#memi").val($(this).data('m_name'));
var q = $("#eq").val();
var f = $("#texteq").val();
var mm = "'"+$(this).data('m_name')+"'";
var gg = q+f+mm;
$("#mm").val(gg);
$("#chk").val("where");
$("#vatnamei").val($(this).data('m_name'));
});
</script>
