<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading ">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Period Account
							<p></p>
						</h5>
						<div class="heading-elements">
							<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
								<i class="icon-arrow-left13"></i> Back</a>
							<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gl_period.mrt"
							 class="preload btn btn-info">
								<i class="icon-printer4"></i> Print </a>
							<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addrow">
								<i class="icon-plus-circle2"></i> New</button>
							<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addauto">
								<i class="icon-plus-circle2"></i> Automatic Value</button>
						</div>
					</div>

					<div class="panel-body">
						<table class="table table-hover table-striped table-xxs datatable-basic">
							<thead>
								<tr>
									<th class="text-center">Year</th>
									<th class="text-center">period</th>
									<th class="text-center">Start Date</th>
									<th class="text-center">End Date</th>
									<th class="text-center">Status</th>
									<th class="text-center">Active</th>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php foreach ($acc as $per){ ?>
								<tr>
									<td>
										<?php echo $per->glyear; ?>
									</td>
									<td>
										<?php echo $per->glperiod; ?>
									</td>
									<td>
										<?php echo date("d/m/Y",strtotime($per->begdate)); ?>
									</td>
									</td>
									<td>
										<?php echo date("d/m/Y",strtotime($per->enddate)); ?>
									</td>
									<td>
										<?php
          if ($per->active == "N") {
            ?>
										<p style="color: red">
											<?php echo "Close"; ?>
										</p>
										<?php
           }else{
              echo "Open";
            } ?>
									</td>
									<td>
										<a type="button" data-toggle="modal" data-target="#edit<?php echo $per->gl_id;  ?>">
											<i class="icon-pencil7"></i>
										</a>
										<a href="<?php echo base_url(); ?>gl_active/gl_accperiod_de/<?php echo $per->gl_id;  ?>">
											<i class="icon-trash"></i>
										</a>
									</td>


								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>


<div id="addrow" class="modal fade" data-backdrop="false">
	<form action="<?php echo base_url();?>gl_active/addaccountperod" method="post">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header btn-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">NEW ACCOUNT PERIOD</h6>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6">
							<label for="">Year</label>
							<input type="text" name="gl_year" class="form-control" maxlength="4" onkeypress="return Numbers(event)" />
						</div>
						<div class="col-xs-6">
							<label for="">Period</label>
							<select class="form-control" name="gl_period">
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="">Start Date</label>
							<input type="date" class="form-control" name="s_dates">
						</div>
						<div class="col-xs-6">
							<label for="">End Date</label>
							<input type="date" class="form-control" name="e_dates">
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-success">
						<i class="icon-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="icon-close2"></i> Close</button>


				</div>
			</div>
		</div>
	</form>
</div>

<div id="addauto" class="modal fade" data-backdrop="false">
	<form id="fauto" action="<?php echo base_url();?>gl_active/autoaccountperod"
	 method="post">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header btn-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">Automatic Value</h6>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<label for="">Year</label>
							<input type="text" name="act_year" id="act_year" class="form-control" maxlength="4" onkeypress="return Numbers(event)" />
						</div>
					</div>
				</div>
				<!-- 1 -->
				<input type="hidden" id="m_jan" name="act_period[]" value="01">
				<input type="hidden" id="f_jan" name="s_date[]">
				<input type="hidden" id="l_jan" name="e_date[]">
				<!-- 2 -->
				<input type="hidden" id="m_feb" name="act_period[]" value="02">
				<input type="hidden" id="f_feb" name="s_date[]">
				<input type="hidden" id="l_feb" name="e_date[]">
				<!-- 3 -->
				<input type="hidden" id="m_mar" name="act_period[]" value="03">
				<input type="hidden" id="f_mar" name="s_date[]">
				<input type="hidden" id="l_mar" name="e_date[]">
				<!-- 4 -->
				<input type="hidden" id="m_apr" name="act_period[]" value="04">
				<input type="hidden" id="f_apr" name="s_date[]">
				<input type="hidden" id="l_apr" name="e_date[]">
				<!-- 5 -->
				<input type="hidden" id="m_may" name="act_period[]" value="05">
				<input type="hidden" id="f_may" name="s_date[]">
				<input type="hidden" id="l_may" name="e_date[]">
				<!-- 6 -->
				<input type="hidden" id="m_jun" name="act_period[]" value="06">
				<input type="hidden" id="f_jun" name="s_date[]">
				<input type="hidden" id="l_jun" name="e_date[]">
				<!-- 7 -->
				<input type="hidden" id="m_jul" name="act_period[]" value="07">
				<input type="hidden" id="f_jul" name="s_date[]">
				<input type="hidden" id="l_jul" name="e_date[]">
				<!-- 8 -->
				<input type="hidden" id="m_aug" name="act_period[]" value="08">
				<input type="hidden" id="f_aug" name="s_date[]">
				<input type="hidden" id="l_aug" name="e_date[]">
				<!-- 9 -->
				<input type="hidden" id="m_sep" name="act_period[]" value="09">
				<input type="hidden" id="f_sep" name="s_date[]">
				<input type="hidden" id="l_sep" name="e_date[]">
				<!-- 10 -->
				<input type="hidden" id="m_oct" name="act_period[]" value="10">
				<input type="hidden" id="f_oct" name="s_date[]">
				<input type="hidden" id="l_oct" name="e_date[]">
				<!-- 11 -->
				<input type="hidden" id="m_nov" name="act_period[]" value="11">
				<input type="hidden" id="f_nov" name="s_date[]">
				<input type="hidden" id="l_nov" name="e_date[]">
				<!-- 12 -->
				<input type="hidden" id="m_dec" name="act_period[]" value="12">
				<input type="hidden" id="f_dec" name="s_date[]">
				<input type="hidden" id="l_dec" name="e_date[]">

				<div class="modal-footer">
					<button type="button" id="sauto" class="btn btn-success">
						<i class="icon-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="icon-close2"></i> Close</button>

				</div>
			</div>
		</div>
	</form>
</div>
<script>
	$("#sauto").click(function() {
		var y = $('#act_year').val();
		if (y == "") {
			swal({
				title: "กรุณากรอก Year !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else {
			//1 
			var f1 = (new Date(y, 0, 2)).toISOString().slice(0, 10);
			var l1 = (new Date(y, 0 + 1, 1)).toISOString().slice(0, 10);
			$("#f_jan").val(f1);
			$("#l_jan").val(l1);

			//2
			var f2 = (new Date(y, 1, 2)).toISOString().slice(0, 10);
			var l2 = (new Date(y, 1 + 1, 1)).toISOString().slice(0, 10);
			$("#f_feb").val(f2);
			$("#l_feb").val(l2);

			//3
			var f3 = (new Date(y, 2, 2)).toISOString().slice(0, 10);
			var l3 = (new Date(y, 2 + 1, 1)).toISOString().slice(0, 10);
			$("#f_mar").val(f3);
			$("#l_mar").val(l3);

			//4
			var f4 = (new Date(y, 3, 2)).toISOString().slice(0, 10);
			var l4 = (new Date(y, 3 + 1, 1)).toISOString().slice(0, 10);
			$("#f_apr").val(f4);
			$("#l_apr").val(l4);

			//5
			var f5 = (new Date(y, 4, 2)).toISOString().slice(0, 10);
			var l5 = (new Date(y, 4 + 1, 1)).toISOString().slice(0, 10);
			$("#f_may").val(f5);
			$("#l_may").val(l5);

			//6
			var f6 = (new Date(y, 5, 2)).toISOString().slice(0, 10);
			var l6 = (new Date(y, 5 + 1, 1)).toISOString().slice(0, 10);
			$("#f_jun").val(f6);
			$("#l_jun").val(l6);

			//7
			var f7 = (new Date(y, 6, 2)).toISOString().slice(0, 10);
			var l7 = (new Date(y, 6 + 1, 1)).toISOString().slice(0, 10);
			$("#f_jul").val(f7);
			$("#l_jul").val(l7);

			//8
			var f8 = (new Date(y, 7, 2)).toISOString().slice(0, 10);
			var l8 = (new Date(y, 7 + 1, 1)).toISOString().slice(0, 10);
			$("#f_aug").val(f8);
			$("#l_aug").val(l8);

			//9
			var f9 = (new Date(y, 8, 2)).toISOString().slice(0, 10);
			var l9 = (new Date(y, 8 + 1, 1)).toISOString().slice(0, 10);
			$("#f_sep").val(f9);
			$("#l_sep").val(l9);

			//10
			var f10 = (new Date(y, 9, 2)).toISOString().slice(0, 10);
			var l10 = (new Date(y, 9 + 1, 1)).toISOString().slice(0, 10);
			$("#f_oct").val(f10);
			$("#l_oct").val(l10);

			//11
			var f11 = (new Date(y, 10, 2)).toISOString().slice(0, 10);
			var l11 = (new Date(y, 10 + 1, 1)).toISOString().slice(0, 10);
			$("#f_nov").val(f11);
			$("#l_nov").val(l11);

			//12
			var f12 = (new Date(y, 11, 2)).toISOString().slice(0, 10);
			var l12 = (new Date(y, 11 + 1, 1)).toISOString().slice(0, 10);
			$("#f_dec").val(f12);
			$("#l_dec").val(l12);
			$("#fauto").submit();
		}
	});
</script>

<?php foreach ($acc as $key => $pp){ ?>
<form action="<?php echo base_url();?>gl_active/editaccperiod/<?php echo $pp->gl_id; ?>"
 method="post">
	<div id="edit<?php echo $pp->gl_id; ?>" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">EDIT ACCOUNT PERIOD</h6>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6">
							<label for="">Year</label>
							<input type="text" name="gl_year" class="form-control" maxlength="4" value="<?php echo $pp->glyear; ?>"
							 onkeypress="return Numbers(event)" />
						</div>
						<div class="col-xs-6">
							<label for="">Period</label>
							<select class="form-control" name="gl_period">
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="">Start Date</label>
							<input type="date" class="form-control" name="s_date" value="<?php echo $pp->begdate; ?>">
						</div>
						<div class="col-xs-6">
							<label for="">End Date</label>
							<input type="date" class="form-control" name="e_date" value="<?php echo $pp->enddate; ?>">
						</div>
						<div class="col-xs-6">
							<label for="">Status</label>
							<select class="form-control" name="act_status">
								<?php if($pp->active == 'Y'){ ?>
								<option value="Y" selected>open</option>
								<?php } else { ?>
								<option value="Y">open</option>
								<?php }?>
								<?php if($pp->active == 'N'){ ?>
								<option value="N" selected>close</option>
								<?php } else { ?>
								<option value="N">close</option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" id="sauto<?=$key?>" class="btn btn-success">
						<i class="icon-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="icon-close2"></i> Close</button>
				</div>
			</div>
		</div>
	</div>
</form>
<?php } ?> 


<script type="text/javascript"> 
function Numbers(e) 
{ 
var keynum; 
var keychar; 
var numcheck; 
if(window.event) // IE    
{ 
  
keynum = e.keyCode;   
} 
else if(e.which) // Netscape/Firefox/Opera    
{ 
 
keynum = e.which; 
  
} 
keychar = String.fromCharCode(keynum); 
numcheck = /\d/; 
return numcheck.test(keychar); 
} 
</script> 
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 5 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.basic').DataTable();
$('#ma').attr('class', 'active');
$('#ma11').attr('style', 'background-color:#dedbd8');
</script>