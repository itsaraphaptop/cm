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
			<li class="active">Petty Cash Report</li>
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
		<div class="heading-elements">
			<button type="button" class="btn btn-default heading-btn" name="button" data-toggle="modal" data-target="#cri"><i class="fa fa-search"></i> เลือกเงื่อนไข</button>
			<a href="/" class="btn btn-default heading-btn"><i class="fa fa-close"></i> Close</a>
		</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">
	            <table style="width:100%">
	                <thead>
	                    <tr>
	                        <th colspan="3" valign="bottom"><img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="img img-responsive" style="max-height: 50px;"></th>
	                        <th colspan="10" valign="bottom" style="text-align:center;" class="ng-binding">
		                        บริษัท : <?php echo $companyname; ?><br>
		                        รายงานค้าใช้จ่ายใบเบิกเงินสด ประจำวัน/เดือน/ปี <br>
								ประจำวันที่ <label id="dathone"></label> ถึงวันที่
	                        </th>
	                        <th colspan="4" valign="bottom" style="text-align:right;" class="ng-binding">วันที่ <?php echo DateThai( date('Y-m-d H:i:s')) ?></th>
	                     </tr>
	                </thead>
	            </table>
				<br>
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
			<form id="contactForm1" action="<?php echo base_url(); ?>purchase_report/po_report"  method="post">
				<div class="modal-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th width="15%">#</th>
								<th width="15%">#</th>
								<th width="20%">#</th>
								<th width="15%">Action</th>
								<th width="20%">#</th>
							</tr>
						</thead>
						<tbody id="body">
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
				  	<input type="hidden" name="companyname" value="<?php echo $companyname; ?>">

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
	<div id="modalven">
	</div>
	<div id="modalpo">
	</div>
	<div id="modalsys">
	</div>
	<div id="modaldepart">
	</div>
	<div id="modalcost">
	</div>
	<div id="modalmat">
	</div>
<script>
// var Data = $('#contactForm1').serializeArray();
// // var JSONData = JSON.stringify(convertToJSON(Data));
//
//  $.ajax({
//         url: '<?php echo base_url(); ?>purchase_report/pop_report',
//         type: "POST",
//         // dataType: "json",
//         data: Data,
//         contentType: "application/json; charset=utf-8",
//         success: function (response) {
//
//             if (response.status == 'success') {
//           console.log(response);
//            }
//         },
//         error: function () {
//             var errMsg = "Unexpected Server Error! Please Try again later";
//
//
//         }
//
//     });
</script>
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
	$("#aa").val("project_code");
	//  $("#save").prop('disabled',true);
	$("#datei").hide();
	$(".editproj").show();
	$(".editprreq").hide();
	$(".editven").hide();
	$(".editpo").hide();
	$(".editsystem").hide();
	$(".editdepart").hide();
	$(".editcost").hide();
	$(".editmat").hide();
	$(".edit").hide();
	$("#datone").val("");
	});

$("#ins").click(function(){
	// alert('was');
		addrows();
		$("#save").prop('disabled',false);
		var row = +$("#row").val() + 1;
		var chk = $("#row").val(row);
		var rowc = +$("#cpro").val() + 1;

});
function addrows()
{
	var row = ($('#body tr').length-0)+1;
		var tr = '<tr>'+
		'<td>'+
		'<select class="form-control input-sm" name="a[]" id="a'+row+'">'+
		'<option value="project_code">โครงการ</option>'+
		'<option value="m_id">ผู้ขอซื้อ</option>'+
		'<option value="vender_id">ร้านค้า</option>'+
		'<option value="po_pono">เลขที่ PO</option>'+
		'<option value="systemid">system</option>'+
		'<option value="depertment_id">แผนก</option>'+
		'<option value="cost">cost code</option>'+
		'<option value="mat">matcode</option>'+
		'<option value="date">วันที่</option>'+
		'</select>'+
		'<input type="text" class="form-control input-sm text-center" readonly name="aa[]" id="aa'+row+'">'+
		'<input type="text" class="form-control input-sm text-center" readonly name="roww[]" id="roww" value="'+row+'">'+
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
		'<select class="form-control input-sm" name="type[]" id="type">'+
		'<option value=" ">&nbsp;</option>'+
		'<option value="and">and</option>'+
		'<option value="or">or</option>'+
		'</select>'+
		'</td>'+
		'<td>'+
		'<ul class="icons-list">'+
		'<li><a class="editproj'+row+' label label-primary" data-toggle="modal" data-target="#editproj'+row+'">เลือก</a></li>'+
		'<li><a class="editprreq'+row+' label label-primary" data-toggle="modal" data-target="#editprreq'+row+'">เลือก</a></li>'+
		'<li><a class="editven'+row+' label label-primary" data-toggle="modal" data-target="#editven'+row+'">เลือก</a></li>'+
		'<li><a class="editpo'+row+' label label-primary" data-toggle="modal" data-target="#editpo'+row+'">เลือก</a></li>'+
		'<li><a class="editsystem'+row+' label label-primary" data-toggle="modal" data-target="#editsystem'+row+'">เลือก</a></li>'+
		'<li><a class="editdepart'+row+' label label-primary" data-toggle="modal" data-target="#editdepart'+row+'">เลือก</a></li>'+
		'<li><a class="editcost'+row+' label label-primary" data-toggle="modal" data-target="#editcost'+row+'">เลือก</a></li>'+
		'<li><a class="editmat'+row+' label label-primary" data-toggle="modal" data-target="#editmat'+row+'">เลือก</a></li>'+
		'<li><a class="edit'+row+' label label-primary" data-toggle="modal" data-target="#edit'+row+'">เลือก</a></li>'+
		'<li><a class="label label-danger" id="remove'+row+'" data-popup="tooltip" title="Remove">ลบรายการ</a></li>'+
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
	$(".editven"+row).hide();
	$(".editpo"+row).hide();
	$(".editsystem"+row).hide();
	$(".editdepart"+row).hide();
	$(".editcost"+row).hide();
	$(".editmat"+row).hide();
	$(".edit"+row).hide();
	$("#a"+row).change(function(){

	if ($("#a"+row).val()=="project_code") {
	$("#aa"+row).val("project_code");
	$("#eq").val("project");//
	$("#mm"+row).val("");
	$("#vatnamei"+row).val("");
	$("#vatnamei"+row).show();
	$("#datei"+row).hide();
	$(".editproj"+row).show();
	$(".editprreq"+row).hide();
	$(".editven"+row).hide();
	$(".editpo"+row).hide();
	$(".editsystem"+row).hide();
	$(".editdepart"+row).hide();
	$(".editcost"+row).hide();
	$(".editmat"+row).hide();
	$(".edit"+row).hide();
	// var rowc = +$("#cpro").val() + 1;
	// $("#cpro").val(rowc);
	$("#text"+row).val("");
	$("#datone").val("");
}else if($("#a"+row).val()=="m_id"){
	$("#aa"+row).val("member");
	$("#eq").val("po_memid");
	$("#vati"+row).val("");
	$("#vatnamei"+row).show();
	$("#vatnamei"+row).val("");
	$("#datei"+row).hide();
	$(".editproj"+row).hide();
	$(".editprreq"+row).show();
	$(".editven"+row).hide();
	$(".editpo"+row).hide();
	$(".editsystem"+row).hide();
	$(".editdepart"+row).hide();
	$(".editcost"+row).hide();
	$(".editmat"+row).hide();
	$(".edit"+row).hide();
	var rowc = +$("#cdat").val() - 1;
	$("#cdat").val(rowc);
	if ($("#cdat").val()<=2) {
	$("#dattwo").val("");
	}
	$("#text"+row).val('memid=');
	$("#datone").val("");
}else if($("#a"+row).val()=="vender_id"){
	$("#aa"+row).val("vender");
	$("#eq").val("po_venderid");
	$("#vati"+row).val("");
	$("#vatnamei"+row).show();
	$("#vatnamei"+row).val("");
	$("#datei"+row).hide();
	$(".editproj"+row).hide();
	$(".editprreq"+row).hide();
	$(".editven"+row).show();
	$(".editpo"+row).hide();
	$(".editsystem"+row).hide();
	$(".editdepart"+row).hide();
	$(".editcost"+row).hide();
	$(".editmat"+row).hide();
	$(".edit"+row).hide();
	var rowc = +$("#cdat").val() - 1;
	$("#cdat").val(rowc);
	if ($("#cdat").val()<=2) {
	$("#dattwo").val("");
	}
	$("#text"+row).val('memid=');
	$("#datone").val("");
}else if($("#a"+row).val()=="po_pono"){
	$("#aa"+row).val("po");
	$("#eq").val("po_venderid");
	$("#vati"+row).val("");
	$("#vatnamei"+row).show();
	$("#vatnamei"+row).val("");
	$("#datei"+row).hide();
	$(".editproj"+row).hide();
	$(".editprreq"+row).hide();
	$(".editven"+row).hide();
	$(".editpo"+row).show();
	$(".editdepart"+row).hide();
	$(".editsystem"+row).hide();
	$(".editcost"+row).hide();
	$(".editmat"+row).hide();
	$(".edit"+row).hide();
	var rowc = +$("#cdat").val() - 1;
	$("#cdat").val(rowc);
	if ($("#cdat").val()<=2) {
	$("#dattwo").val("");
	}
	$("#text"+row).val('memid=');
	$("#datone").val("");
}else if($("#a"+row).val()=="systemid"){
	$("#aa"+row).val("system");
	$("#eq").val("po_system");
	$("#vati"+row).val("");
	$("#vatnamei"+row).show();
	$("#vatnamei"+row).val("");
	$("#datei"+row).hide();
	$(".editproj"+row).hide();
	$(".editprreq"+row).hide();
	$(".editven"+row).hide();
	$(".editpo"+row).hide();
	$(".editdepart"+row).hide();
	$(".editsystem"+row).show();
	$(".editcost"+row).hide();
	$(".editmat"+row).hide();
	$(".edit"+row).hide();
	var rowc = +$("#cdat").val() - 1;
	$("#cdat").val(rowc);
	if ($("#cdat").val()<=2) {
	$("#dattwo").val("");
	}
	$("#text"+row).val('memid=');
	$("#datone").val("");
}else if($("#a"+row).val()=="department_id"){
	$("#aa"+row).val("department");
	$("#eq").val("po_department_code");
	$("#vati"+row).val("");
	$("#vatnamei"+row).show();
	$("#vatnamei"+row).val("");
	$("#datei"+row).hide();
	$(".editproj"+row).hide();
	$(".editprreq"+row).hide();
	$(".editven"+row).hide();
	$(".editpo"+row).hide();
	$(".editsystem"+row).hide();
	$(".editdepart"+row).show();
	$(".editcost"+row).hide();
	$(".editmat"+row).hide();
	$(".edit"+row).hide();
	var rowc = +$("#cdat").val() - 1;
	$("#cdat").val(rowc);
	if ($("#cdat").val()<=2) {
	$("#dattwo").val("");
	}
	$("#text"+row).val('memid=');
	$("#datone").val("");
	}else if($("#a"+row).val()=="cost"){
	$("#aa"+row).val("cost");
	$("#eq").val("poi_costcode");
	$("#vati"+row).val("");
	$("#vatnamei"+row).show();
	$("#vatnamei"+row).val("");
	$("#datei"+row).hide();
	$(".editproj"+row).hide();
	$(".editprreq"+row).hide();
	$(".editven"+row).hide();
	$(".editpo"+row).hide();
	$(".editsystem"+row).hide();
	$(".editdepart"+row).hide();
	$(".editcost"+row).show();
	$(".editmat"+row).hide();
	$(".edit"+row).hide();
	var rowc = +$("#cdat").val() - 1;
	$("#cdat").val(rowc);
	if ($("#cdat").val()<=2) {
	$("#dattwo").val("");
	}
	$("#text"+row).val('memid=');
	$("#datone").val("");
	}else if($("#a"+row).val()=="mat"){
	$("#aa"+row).val("mat");
	$("#eq").val("poi_matcode");
	$("#vati"+row).val("");
	$("#vatnamei"+row).show();
	$("#vatnamei"+row).val("");
	$("#datei"+row).hide();
	$(".editproj"+row).hide();
	$(".editprreq"+row).hide();
	$(".editven"+row).hide();
	$(".editpo"+row).hide();
	$(".editsystem"+row).hide();
	$(".editdepart"+row).hide();
	$(".editcost"+row).hide();
	$(".editmat"+row).show();
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
	$(".editven"+row).hide();
	$(".editpo"+row).hide();
	$(".editsystem"+row).hide();
	$(".editdepart"+row).hide();
	$(".editcost"+row).hide();
	$(".editmat"+row).hide();
	$(".edit"+row).show();
	var rowc = +$("#cdat").val() + 1;
	var rowa = +$("#cpro").val() - 1;
	$("#cpro").val(rowa);
	$("#cdat").val(rowc);
	if ($("#cdat").val()>=2) {
	$("#and").val("");
	$("#da").val("");
	$("#dattwo").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
	$("#datone").val($("#daton").val()+$("#dattwo").val());
	}else{
	$("#daton").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
	$("#datone").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
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
	// $("#daton").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
	$("#dattwo").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
	$("#datone").val($("#daton").val()+$("#dattwo").val());
	}else{
	$("#daton").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
	$("#datone").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
	}
	});
	$("#eqird"+row).change(function(){
	// var rowc = +$("#cdat").val() + 1;
	// $("#cdat").val(rowc);
	if ($("#cdat").val()>=2) {
	$("#da").val("");
	$("#dattwo").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
	$("#datone").val($("#daton").val()+$("#dattwo").val());
	}else{
	$("#daton").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
	$("#datone").val("docdate"+$("#eqird"+row).val()+"'"+$("#datei"+row).val()+"'");
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
		'<td><button class="openproj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid'+row+'="<?php echo $valj->project_id;?>" data-projcode'+row+'="<?php echo $valj->project_code;?>" data-dismiss="modal">เลือก</button></td>'+
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
		'<td><?php echo $valj->m_code; ?></td>'+
		'<td><?php echo $valj->m_name; ?></td>'+
		'<td><button class="openemp'+row+' btn btn-xs btn-block btn-info" data-toggle="modal"  data-mid'+row+'="<?php echo $valj->m_id;?>" data-m_name'+row+'="<?php echo $valj->m_name;?>" data-dismiss="modal">เลือก</button></td>'+
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

	var modalvender = '<div id="editven'+row+'" class="modal fade">'+
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
		'<th>ชื่อร้านค้า</th>'+
		'<th width="5%">จัดการ</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>'+
		'<?php   $n =1;?>'+
		'<?php foreach ($vender as $valv){ ?>'+
		'<tr>'+
		'<th scope="row"><?php echo $n;?></th>'+
		'<td><?php echo $valv->vender_code; ?></td>'+
		'<td><?php echo $valv->vender_name; ?></td>'+
		'<td><button class="openven'+row+' btn btn-xs btn-block btn-info" data-toggle="modal"  data-ven_id'+row+'="<?php echo $valv->vender_id;?>" data-ven_code'+row+'="<?php echo $valv->vender_code;?>" data-dismiss="modal">เลือก</button></td>'+
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
	$("#modalven").append(modalvender);

	var modalpono = '<div id="editpo'+row+'" class="modal fade">'+
		'<div class="modal-dialog modal-lg">'+
		'<div class="modal-content">'+
		'<div class="modal-header">'+
		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
		'<h5 class="modal-title"></h5>'+
		'</div>'+
		'<div class="modal-body">'+
		'<div id="ponobody'+row+'">'+

		'</div>'+
		'</div>'+
		'<div class="modal-footer">'+
		'<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>'+
		'</div>'+
		'</form>'+
		'</div>'+
		'</div>'+
		'</div>';
	$("#modalpo").append(modalpono);

	var modalsystem = '<div id="editsystem'+row+'" class="modal fade">'+
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
		'<th>รหัส system</th>'+
		'<th>ชื่อ system</th>'+
		'<th width="5%">จัดการ</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>'+
		'<?php   $n =1;?>'+
		'<?php foreach ($sys as $valsys){ ?>'+
		'<tr>'+
		'<th scope="row"><?php echo $n;?></th>'+
		'<td><?php echo $valsys->systemcode; ?></td>'+
		'<td><?php echo $valsys->systemname; ?></td>'+
		'<td><button class="opensys'+row+' btn btn-xs btn-block btn-info" data-toggle="modal"  data-system_id'+row+'="<?php echo $valsys->systemid;?>" data-system_code'+row+'="<?php echo $valsys->systemcode;?>" data-dismiss="modal">เลือก</button></td>'+
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
	$("#modalsys").append(modalsystem);

	var modaldepartment = '<div id="editdepart'+row+'" class="modal fade">'+
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
		'<th>รหัส department</th>'+
		'<th>ชื่อ department</th>'+
		'<th width="5%">จัดการ</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>'+
		'<?php   $n =1;?>'+
		'<?php foreach ($de as $valde){ ?>'+
		'<tr>'+
		'<th scope="row"><?php echo $n;?></th>'+
		'<td><?php echo $valde->department_code; ?></td>'+
		'<td><?php echo $valde->department_title; ?></td>'+
		'<td><button class="opendepart'+row+' btn btn-xs btn-block btn-info" data-toggle="modal"  data-de_id'+row+'="<?php echo $valde->department_id;?>" data-de_code'+row+'="<?php echo $valde->department_code;?>" data-dismiss="modal">เลือก</button></td>'+
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
	$("#modaldepart").append(modaldepartment);


	var modalcostcode = '<div id="editcost'+row+'" class="modal fade">'+
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
		'<th>รหัส department</th>'+
		'<th>ชื่อ department</th>'+
		'<th width="5%">จัดการ</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>'+

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
	$("#modalcost").append(modalcostcode);

	var modalmatcode = '<div id="editmat'+row+'" class="modal fade">'+
		'<div class="modal-dialog modal-lg">'+
		'<div class="modal-content">'+
		'<div class="modal-header">'+
		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
		'<h5 class="modal-title">'+row+'</h5>'+
		'</div>'+
		'<div class="modal-body">'+
		'<div id="matbody'+row+'">'+

		'</div>'+
		'</div>'+
		'<div class="modal-footer">'+
		'<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>'+
		'</div>'+
		'</form>'+
		'</div>'+
		'</div>'+
		'</div>';
	$("#modalmat").append(modalmatcode);

	$('.editmat'+row).on('click', function() {
		// alert('www');
	$('#matbody'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
	$('#matbody'+row).load('<?php echo base_url(); ?>share/getmatcode_popr/'+row);
	});

	$('.editpo'+row).on('click', function() {
		// alert('www');
	$('#ponobody'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
	$('#ponobody'+row).load('<?php echo base_url(); ?>share/getpono/'+row);
	});

	$(".openproj"+row).click(function(){
	$("#eq").val("project_code");//
	if ($("#cpro").val()>="2") {
	var p2 = " or "+$("#eq").val()+$("#texteq"+row).val()+"'"+$(this).data('projid'+row)+"'";
	$("#pro").val($("#pro").val()+p2);
	$("#vati"+row).val($(this).data('projid'+row));
	$("#vatnamei"+row).val($(this).data('projcode'+row));
	$("#chk").val("where");
	$("#text"+row).val(p2);
	}else{
	$("#vati"+row).val($(this).data('projid'+row));
	$("#vatnamei"+row).val($(this).data('projcode'+row));
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
	$("#eq").val("po_memid");
	$("#memi"+row).val($(this).data('mid'+row));
	var q = $("#eq").val();
	var f = $("#texteq"+row).val();
	var mm = "'"+$(this).data('mid'+row)+"'";
	var gg = q+f+mm;
	$("#mm").val(gg);
	$("#and").val("and");
	$("#chk").val("where");
	$("#vatnamei"+row).val($(this).data('mid'+row));
	});

	$(".openven"+row).click(function(){
	$("#eq").val("po_venderid");
	$("#memi"+row).val($(this).data('ven_id'+row));
	var q = $("#eq").val();
	var f = $("#texteq"+row).val();
	var mm = "'"+$(this).data('ven_id'+row)+"'";
	var gg = q+f+mm;
	$("#mm").val(gg);
	$("#and").val("and");
	$("#chk").val("where");
	$("#vatnamei"+row).val($(this).data('ven_id'+row));
	});

	$(".openpo"+row).click(function(){
	$("#eq").val("po_venderid");
	$("#memi"+row).val($(this).data('po_no'+row));
	var q = $("#eq").val();
	var f = $("#texteq"+row).val();
	var mm = "'"+$(this).data('po_no'+row)+"'";
	var gg = q+f+mm;
	$("#mm").val(gg);
	$("#and").val("and");
	$("#chk").val("where");
	$("#vatnamei"+row).val($(this).data('po_no'+row));
	});

	$(".opensys"+row).click(function(){
	$("#eq").val("po_system");
	$("#memi"+row).val($(this).data('system_id'+row));
	var q = $("#eq").val();
	var f = $("#texteq"+row).val();
	var mm = "'"+$(this).data('system_id'+row)+"'";
	var gg = q+f+mm;
	$("#mm").val(gg);
	$("#and").val("and");
	$("#chk").val("where");
	$("#vatnamei"+row).val($(this).data('system_id'+row));
	});

	$(".opendepart"+row).click(function(){
	$("#eq").val("po_department");
	$("#memi"+row).val($(this).data('de_id'+row));
	var q = $("#eq").val();
	var f = $("#texteq"+row).val();
	var mm = "'"+$(this).data('de_id'+row)+"'";
	var gg = q+f+mm;
	$("#mm").val(gg);
	$("#and").val("and");
	$("#chk").val("where");
	$("#vatnamei"+row).val($(this).data('de_id'+row));
	});

	$(".opencost"+row).click(function(){
	$("#eq").val("poi_code");
	$("#memi"+row).val($(this).data('cost_code'+row));
	var q = $("#eq").val();
	var f = $("#texteq"+row).val();
	var mm = "'"+$(this).data('cost_code'+row)+"'";
	var gg = q+f+mm;
	$("#mm").val(gg);
	$("#and").val("and");
	$("#chk").val("where");
	$("#vatnamei"+row).val($(this).data('cost_code'+row));
	});

	$(".openmat"+row).click(function(){
	$("#eq").val("poi_matcode");
	$("#memi"+row).val($(this).data('mat_code'+row));
	var q = $("#eq").val();
	var f = $("#texteq"+row).val();
	var mm = "'"+$(this).data('mat_code'+row)+"'";
	var gg = q+f+mm;
	$("#mm").val(gg);
	$("#and").val("and");
	$("#chk").val("where");
	$("#vatnamei"+row).val($(this).data('mat_code'+row));
	});

	$('#remove'+row).on('click', function() {
	var rows = +$("#row").val() - 1;
	var chk = $("#row").val(rows);
	var rowc = +$("#cpro").val() - 1;
	$("#cpro").val(rowc);
	if ($("#aa"+row).val()=="project_code") {

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
	}else if($("#aa"+row).val()=="po_memid"){
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
	}else if($("#aa"+row).val()=="po_venderid"){
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

	}else if($("#aa"+row).val()=="po"){
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

	}else if($("#aa"+row).val()=="po_system"){
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

	}else if($("#aa"+row).val()=="po_department"){
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
	}else if($("#aa"+row).val()=="cost"){
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
									<td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid="<?php echo $valj->project_id;?>" data-projcode="<?php echo $valj->project_code;?>" data-dismiss="modal">เลือก</button></td>
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
								<td><?php echo $valj->m_code; ?></td>
								<td><?php echo $valj->m_name; ?></td>
								<td><button class="openemp btn btn-xs btn-block btn-info" data-toggle="modal"  data-mid="<?php echo $valj->m_id;?>" data-m_code="<?php echo $valj->m_code;?>" data-dismiss="modal">เลือก</button></td>
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

<div id="editven" class="modal fade">
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
								<th>รหัสร้านค้า</th>
								<th>ชื่อร้านค้า</th>
								<th width="5%">จัดการ</th>
							</tr>
						</thead>
						<tbody>
						<?php   $n =1;?>
						<?php foreach ($vender as $valv){ ?>
							<tr>
								<th scope="row"><?php echo $n;?></th>
								<td><?php echo $valv->vender_code; ?></td>
								<td><?php echo $valv->vender_name; ?></td>
								<td><button class="openven btn btn-xs btn-block btn-info" data-toggle="modal"  data-venid="<?php echo $valv->vender_id;?>" data-ven_code="<?php echo $valv->vender_code;?>" data-dismiss="modal">เลือก</button></td>
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
<div id="editpo" class="modal fade">
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
								<th>รหัส po</th>
								<th>ชื่อ po</th>
								<th width="5%">จัดการ</th>
							</tr>
						</thead>
						<tbody>
						<?php   $n =1;?>
						<?php foreach ($popo as $valpo){ ?>
							<tr>
								<th scope="row"><?php echo $n;?></th>
								<td><?php echo $valpo->po_pono; ?></td>
								<td><?php echo $valpo->po_pono; ?></td>
								<td><button class="openpo btn btn-xs btn-block btn-info" data-toggle="modal"  data-po_id="<?php echo $valpo->po_pono;?>" data-po_code="<?php echo $valpo->po_pono;?>" data-dismiss="modal">เลือก</button></td>
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
<div id="editsystem" class="modal fade">
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
								<th>รหัส system</th>
								<th>ชื่อ system</th>
								<th width="5%">จัดการ</th>
							</tr>
						</thead>
						<tbody>
						<?php   $n =1;?>
						<?php foreach ($sys as $valsys){ ?>
							<tr>
								<th scope="row"><?php echo $n;?></th>
								<td><?php echo $valsys->systemcode; ?></td>
								<td><?php echo $valsys->systemname; ?></td>
								<td><button class="opensys btn btn-xs btn-block btn-info" data-toggle="modal"  data-sys_id="<?php echo $valsys->systemid;?>" data-sys_code="<?php echo $valsys->systemcode;?>" data-dismiss="modal">เลือก</button></td>
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

<div id="editdepart" class="modal fade">
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
								<th>รหัส system</th>
								<th>ชื่อ system</th>
								<th width="5%">จัดการ</th>
							</tr>
						</thead>
						<tbody>
						<?php   $n =1;?>
						<?php foreach ($de as $valdep){ ?>
							<tr>
								<th scope="row"><?php echo $n;?></th>
								<td><?php echo $valdep->department_code; ?></td>
								<td><?php echo $valdep->department_title; ?></td>
								<td><button class="opendepart btn btn-xs btn-block btn-info" data-toggle="modal"  data-de_id="<?php echo $valdep->department_id;?>" data-de_code="<?php echo $valdep->department_code;?>" data-dismiss="modal">เลือก</button></td>
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
<div id="editcost" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title"></h5>
			</div>
			<div class="modal-body">
				<div id="costbody">

				</div>
			</div>
			<div class="modal-footer">
				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</a>
			</div>
		<!-- </form> -->
		</div>
	</div>
</div>
<div id="editmat" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title"></h5>
			</div>
			<div class="modal-body">
				<div id="matbody">
<!-- 					<table class="table table-xxs table-hover datatable-basics" >
						<thead>
							<tr>
								<th>No.</th>
								<th>รหัส mat</th>
								<th>ชื่อ mat</th>
								<th width="5%">จัดการ</th>
							</tr>
						</thead>
						<tbody>
						<?php   $n =1;?>
						<?php foreach ($mat as $valco){ ?>
							<tr>
								<th scope="row"><?php echo $n;?></th>
								<td><?php echo $valco->poi_matcode; ?></td>
								<td><button class="openmat btn btn-xs btn-block btn-info" data-toggle="modal"  data-mat_code="<?php echo $valco->poi_matcode;?>" data-dismiss="modal">เลือก</button></td>
							</tr>
						<?php $n++; } ?>
						</tbody>
					</table>
					 -->
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
$("#eq").val("project_code");//แก้ชื่อที่ส่ง
$("#vatnamei").val($(this).data('projcode'));
var q = $("#eq").val();
var f = $("#texteq").val();
var pro = "'"+$(this).data('projid')+"'";
var gg = q+f+pro;
$("#pro").val(gg);
$("#chk").val("where");
});
$(".openemp").click(function(){
$("#eq").val("po_memid");
$("#memi").val($(this).data('mid'));
var q = $("#eq").val();
var f = $("#texteq").val();
var mm = "'"+$(this).data('mid')+"'";
var gg = q+f+mm;
$("#mm").val(gg);
$("#chk").val("where");
$("#vatnamei").val($(this).data('mid'));
});
$(".openven").click(function(){
$("#eq").val("po_venderid");
$("#memi").val($(this).data('venid'));
var q = $("#eq").val();
var f = $("#texteq").val();
var vv = "'"+$(this).data('venid')+"'";
var gg = q+f+vv;
$("#mm").val(gg);
$("#chk").val("where");
$("#vatnamei").val($(this).data('venid'));
});
$(".openpo").click(function(){
$("#eq").val("po_pono");
$("#memi").val($(this).data('po_id'));
var q = $("#eq").val();
var f = $("#texteq").val();
var vv = "'"+$(this).data('po_id')+"'";
var gg = q+f+vv;
$("#mm").val(gg);
$("#chk").val("where");
$("#vatnamei").val($(this).data('po_code'));
});
$(".opensys").click(function(){
$("#eq").val("po_system");
$("#memi").val($(this).data('sys_code'));
var q = $("#eq").val();
var f = $("#texteq").val();
var vv = "'"+$(this).data('sys_code')+"'";
var gg = q+f+vv;
$("#mm").val(gg);
$("#chk").val("where");
$("#vatnamei").val($(this).data('sys_code'));
});
$(".opendepart").click(function(){
$("#eq").val("po_department");
$("#memi").val($(this).data('de_id'));
var q = $("#eq").val();
var f = $("#texteq").val();
var vv = "'"+$(this).data('de_id')+"'";
var gg = q+f+vv;
$("#mm").val(gg);
$("#chk").val("where");
$("#vatnamei").val($(this).data('de_id'));
});
$(".opencost").click(function(){
$("#eq").val("poi_costcode");
$("#memii").val($(this).data('cost_code'));
var q = $("#eq").val();
var f = $("#texteq").val();
var vv = "'"+$(this).data('cost_code')+"'";
var gg = q+f+vv;
$("#mm").val(gg);
$("#chk").val("where");
$("#vatnamei").val($(this).data('cost_code'));
});

</script>
<script>
$(".editmat").click(function(){
  $('#matbody').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#matbody").load('<?php echo base_url(); ?>share/getmatcode_popr');
});
$(".editcost").click(function(){
  $('#costbody').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#costbody").load('<?php echo base_url(); ?>share/costcode_popr');
});
</script>
