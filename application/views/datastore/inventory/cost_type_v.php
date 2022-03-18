<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Cost Type
							<p></p>
						</h6>
						<div class="heading-elements">
							<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=costtype.mrt"
							 class="preload btn btn-info">
								<i class="icon-printer4"></i> Print </a>
							<a type="button" class="addcosttype btn btn-info" data-toggle="modal" data-target="#addcosttype">
								<i class="icon-plus22"></i>New </a>
							<!-- <div style="text-align: right;"><a href="<?php echo base_url(); ?>data_master" type="button" class="btn bg-danger" name="button">
							<i class="icon-close2"></i> Close</a>
						</div> -->

					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-striped  table-xxs datatable-basic">
							<thead>
								<tr>
									<th width="20%">Code</th>
									<th width="60%">Cost Type</th>
									<th width="20%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($gettype as $value) { ?>
								<tr>
									<td class="text-left">
										<p id="showcode<?php echo $i;?>">
											<?php echo $value->costtype_code; ?>
										</p>
									</td>
									<td class="text-left">
										<p id="showcode<?php echo $i;?>">
											<?php echo $value->costype_name; ?>
										</p>
									</td>
									<td>
										<?php if($value->costtype_status == "Y") {
                          if($value->status_open != "open") { ?>
										<a type="button" class="editcosttype" data-toggle="modal" data-target="#editcosttype<?php echo $value->costtype_code; ?>">
											<i class="icon-pencil7"></i>
										</a>
										<a type="button" class="delcosttype" data-toggle="modal" data-target="#delcosttype<?php echo $value->costtype_code; ?>">
											<i class="icon-trash"></i>
										</a>
										<?php } } ?>
									</td>
								</tr>
								<?php $i++;  }  ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- add -->
<div class="modal fade" id="addcosttype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">New Cost Type</h5>
			</div>
			<div class="modal-body">
				<div class="modal-body">
					<label>Code</label>
					<input type="text" name="code" id="code" class="form-control">
					<br>
					<label>Cost Type</label>
					<input type="text" class="form-control" name="name_type" id="name_type">
					<br>
					<label>Contruction</label>
					<div class="input-group">
						<input type="text" class="form-control" readonly="true" name="new_acname1" id="new_acname1">
						<input type="text" class="form-control" readonly="true" name="new_accode1" id="new_accode1">
						<span class="input-group-btn">
							<button type="button" class="acc_new1 btn btn-info btn-icon" data-toggle="modal" data-target="#acc_new1">
								<i class="icon-search4"></i>
							</button>
						</span>
					</div>

				</div>

				<div class="modal-footer">
					<a type="button" class="btn btn-success" id="acosttype">
						<i class="icon-floppy-disk"></i> Save</a>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="icon-close2"></i> Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="acc_new1" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Account </h5>
			</div>
			<div class="modal-body">
				<div class="loadaccchart_new1">
				</div>
			</div>
		</div>
	</div>
</div>
<div id="acc_new2" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Account </h5>
			</div>
			<div class="modal-body">
				<div class="loadaccchart_new2">
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(".acc_new1").click(function() {
		$('.loadaccchart_new1').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$(".loadaccchart_new1").load('<?php echo base_url(); ?>share/accchartall');
	});

	$(".acc_new2").click(function() {
		$('.loadaccchart_new2').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$(".loadaccchart_new2").load(
			'<?php echo base_url(); ?>share/accchart_acc');
	});
</script>
<!-- end add -->
<?php  foreach ($gettype as $v) {
  $this->db->select('*');
  $this->db->from('account_total');
  $this->db->where('act_code',$v->acc_code1);
  $code1=$this->db->get()->result();

  $this->db->select('*');
  $this->db->from('account_total');
  $this->db->where('act_code',$v->acc_code2);
  $code2=$this->db->get()->result();  
 ?>
<!-- edit -->
<div class="modal fade" id="editcosttype<?php echo $v->costtype_code; ?>" tabindex="-1"
 role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Edit Cost Type</h5>
			</div>
			<div class="modal-body">
				<div class="modal-body">
					<label>Code</label>
					<input type="text" readonly="true" name="code" id="code<?php echo $v->costtype_code; ?>"
					 class="form-control" value="<?php echo $v->costtype_code; ?>">
					<br>
					<label>Cost Type</label>
					<input type="text" value="<?php echo $v->costype_name; ?>" class="form-control"
					 name="type_name" id="type_name<?php echo $v->costtype_code; ?>">
					<br>
					<label>Contruction</label>
					<div class="input-group">
						<input type="text" class="form-control" readonly="true" name="no" id="acc_no<?php echo $v->costtype_code; ?>"
						 value="<?php echo $v->acc_code1; ?>">
						<?php 
                if ($code1) { 
                 foreach ($code1 as $st ) {  ?>
						<input type="text" class="form-control" readonly="true" name="namee" id="acc_name<?php echo $v->costtype_code; ?>"
						 value="<?php echo $st->act_name; ?>">
						<?php } 
                }else{ ?>
						<input type="text" class="form-control" readonly="true" name="namee" id="acc_name<?php echo $v->costtype_code; ?>"
						 value="">
						<?php } ?>
						<span class="input-group-btn">
							<button type="button" class="accopen<?php echo $v->costtype_code; ?> btn btn-info btn-icon"
							 data-toggle="modal" data-target="#accopen<?php echo $v->costtype_code; ?>">
								<i class="icon-search4"></i>
							</button>
						</span>
					</div>

				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success" id="ecosttype<?php echo $v->costtype_code;?>">
						<i class="icon-floppy-disk"></i> Save</a>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="icon-close2"></i> Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="accopen<?php echo $v->costtype_code; ?>" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Account </h5>
			</div>
			<div class="modal-body">
				<div class="loadaccchart">
				</div>
			</div>
		</div>
	</div>
</div>
<div id="accopen2<?php echo $v->costtype_code; ?>" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Account </h5>
			</div>
			<div class="modal-body">
				<div class="loadaccchart2">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end edit -->

<!-- del -->
<div class="modal fade" id="delcosttype<?php echo $v->costtype_code; ?>" tabindex="-1"
 role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Please fill in the Deletion
					<?php echo $v->costtype_code; ?>
				</h5>
			</div>
			<div class="modal-body">
				<div class="modal-body">
					<input type="text" class="form-control" name="comment" id="comment<?php echo $v->costtype_code; ?>">
					<br>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success" id="dcosttype<?php echo $v->costtype_code;?>">
						<i class="icon-floppy-disk"></i> Save</a>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="icon-close2"></i> Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end del -->


<script>
	$("#ecosttype<?php echo $v->costtype_code;?>").click(function() {
		var url = "<?php echo base_url(); ?>datastore/edit_costtype";
		var dataSet = {
			type_name: $('#type_name<?php echo $v->costtype_code; ?>').val(),
			code: $('#code<?php echo $v->costtype_code; ?>').val(),
			acc_no: $('#acc_no<?php echo $v->costtype_code; ?>').val(),
			acc_no2: $('#acc_no2<?php echo $v->costtype_code; ?>').val(),
		}
		$.post(url, dataSet, function(data) {
			setTimeout(function() {
				window.location.href =
					"<?php echo base_url(); ?>index.php/data_master/cost_type";
			}, 1000);
		});
	});

	$("#dcosttype<?php echo $v->costtype_code;?>").click(function() {
		var url = "<?php echo base_url(); ?>datastore/del_costtype";
		var dataSet = {
			comment: $('#comment<?php echo $v->costtype_code; ?>').val(),
			code: $('#code<?php echo $v->costtype_code; ?>').val(),
		}
		$.post(url, dataSet, function(data) {
			setTimeout(function() {
				window.location.href =
					"<?php echo base_url(); ?>index.php/data_master/cost_type";
			}, 1000);
		});
	});

	$(".accopen<?php echo $v->costtype_code; ?>").click(function() {
		$('.loadaccchart').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$(".loadaccchart").load(
			'<?php echo base_url(); ?>share/accchartall/<?php echo $v->costtype_code; ?>'
		);
	});

	$(".accopen2<?php echo $v->costtype_code; ?>").click(function() {
		$('.loadaccchart2').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$(".loadaccchart2").load(
			'<?php echo base_url(); ?>share/acc_chart2/<?php echo $v->costtype_code; ?>'
		);
	});
</script>
<?php } ?>

<script type="text/javascript">  
  $("#acosttype").click(function(){
    var url="<?php echo base_url(); ?>datastore/add_costtype";
    var dataSet={
    name_type: $('#name_type').val(),
    code: $('#code').val(),
    new_acname1:  $('#new_acname1').val(),
    new_acname2: $('#new_acname2').val(),
    }
    $.post(url,dataSet,function(data){
      setTimeout(function() {
        window.location.href = "<?php echo base_url(); ?>index.php/data_master/cost_type";
      }, 1000);
    });
  } );  
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script>
  $.extend( $.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
    orderable: false,
    width: '100px',
    targets: [ 2 ]
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
  $('.datatable-basic').DataTable();
  $.extend( $.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
    orderable: false,
    width: '100px',
    targets: [ 2 ]
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
  $('.datatable-basic2').DataTable();
  $('#mg').attr('class', 'active');
  $('#mc11').attr('style', 'background-color:#dedbd8');
</script>