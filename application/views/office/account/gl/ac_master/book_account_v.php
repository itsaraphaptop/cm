<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Account Book
							<p></p>
						</h5>
						<div class="heading-elements">
							<a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
							<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
								<i class="icon-arrow-left13"></i> Back</a>
							<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=gl_book.mrt"
							 class="preload btn btn-info">
								<i class="icon-printer4"></i> Print </a>
							<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addrow">
								<i class="icon-plus-circle2"></i> New</button>
						</div>
					</div>
					<div class="panel-body">
						<table class="table table-hover table-striped table-xxs basic">
							<thead>
								<tr>
									<th class="text-center">Book Account Code</th>
									<th class="text-center">Book Account Name </th>
									<th class="text-center">Book Account Type</th>
									<th class="text-center">Status</th>
									<th class="text-center">Active</th>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php foreach ($bb as $book){ ?>
								<tr>
									<td>
										<?php echo $book->bookcode; ?>
									</td>
									<td>
										<?php echo $book->booknamz; ?>
									</td>
									<td>
										<?php echo $book->gl_type; ?>
									</td>
									<td>
										<?php
          if ($book->active == "N") {
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
										<a type="button" data-toggle="modal" data-target="#modal_edit<?php echo $book->bookcode; ?>">
											<i class="icon-pencil7"></i>
										</a>
										<a href="<?php echo base_url(); ?>gl_active/deletebook/<?php echo $book->bookcode; ?>">
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

<div id="addrow" class="modal fade">
	<form action="<?php echo base_url();?>gl_active/addbookaccount" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">NEW BOOK ACCOUNT</h6>
				</div>

				<div class="modal-body">
					<label for="">Book Account Code</label>
					<input class="form-control" type="text" name="e_code" value="">
					<label for="">Book Account Name</label>
					<input class="form-control" type="text" name="e_name" value="">
					<label for="">Book Account Type</label>
					<input type="text" class="form-control" name="e_type">
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
<?php foreach ($bb as $ebook){ ?>


<form action="<?php echo base_url();?>gl_active/editbookaccount/<?php echo $ebook->bookcode; ?>"
 method="post">
	<div id="modal_edit<?php echo $ebook->bookcode; ?>" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">EDIT BOOK ACCOUNT</h6>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6">
							<label for="">Book Account Code</label>
							<input class="form-control" type="text" name="e_code" value="<?php echo $ebook->bookcode; ?>">
						</div>
						<div class="col-xs-6">
							<label for="">Book Account Name</label>
							<input class="form-control" type="text" name="e_name" value="<?php echo $ebook->booknamz; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<label for="">Book Account Type</label>
							<input class="form-control" type="text" name="e_type" value="<?php echo $ebook->gl_type; ?>">
						</div>
						<div class="col-xs-6">
							<label for="">Type</label>
							<select class="form-control" name="act_status">
								<?php if($ebook->gl_type == 'Y'){ ?>
								<option value="Y" selected>open</option>
								<?php } else { ?>
								<option value="Y">open</option>
								<?php }?>
								<?php if($ebook->gl_type == 'N'){ ?>
								<option value="N" selected>close</option>
								<?php } else { ?>
								<option value="N">close</option>
								<?php }?>
							</select>
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
	</div>
</form>
<?php } ?>



<script>
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '200px',
			targets: [0]
		}],
		dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		language: {
			search: '<span>Filter:</span> _INPUT_',
			lengthMenu: '<span>Show:</span> _MENU_',
			paginate: {
				'first': 'First',
				'last': 'Last',
				'next': '&rarr;',
				'previous': '&larr;'
			}
		},
		drawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
		},
		preDrawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
		}
	});
	$('.basic').DataTable();
	$('#ma').attr('class', 'active');
	$('#ma10').attr('style', 'background-color:#dedbd8');
</script>

<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_acctbank');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import GL Book</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing GL Book and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/less_other.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import GL Book, upload an Excel (.xls) file:</p>
        <div class="form-group">
          <input type="file" class="file-styled" id="file_upload" name="userfile">
        </div>
      </div>
      
      
      <div class="modal-footer">
        <button type="submit" class="uploadfile btn btn-success">Import File</button>
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
      </div>
    <?php echo form_close();?>
    <div id="load"></div>
    </div>
  </div>
</div>
<script>
  $(".uploadfile").click(function(){
      $("#load").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
  });
</script>