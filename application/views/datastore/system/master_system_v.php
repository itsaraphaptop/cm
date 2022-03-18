<?php 
$datestring = "Y";
   $mm = "m";
   $dd = "d";

   $this->db->select('*');
   $qu = $this->db->get('system');
   $ress = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

   if ($ress==0) {
     $code = "1";
      $apd_item ="1";
   }else{
     $this->db->select('*');
     $this->db->order_by('systemid','desc');
     $this->db->limit('1');
     $q = $this->db->get('system');
     $run = $q->result();
     foreach ($run as $valx)
     {
       $code = $valx->systemid+1;
     }

   }
 ?>

 <!-- Main navbar -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Project Job<p></p></h6>
			<div class="heading-elements">
			<a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
				<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=system.mrt" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
				<a type="button" data-toggle="modal" data-target="#newsystem" class="newsystem btn btn-info"><i class="icon-plus-circle2"></i> New</a>
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">
		
		<div class="table-responsive">
	  		<table class="basic table table-striped table-hover table-xxs datatable-basic">
			  	<thead>
				    <tr>
				      	<th>System Code</th>
				      	<th>System Name</th>
				      	<th>Active</th>
				    </tr>
			  	</thead>
				 <tbody>
				  <?php $n=1; foreach ($res as $val) {?>
				    <tr>
				      	<td><?php echo $val->systemcode; ?></td>
				      	<td><?php echo $val->systemname; ?></td>
				      	<td>
					      	<a  type="button" data-toggle="modal" data-target="#edittype<?php echo $val->systemcode; ?>"><i class="icon-pencil7"></i></a>
					      	<a href="<?php echo base_url(); ?>datastore_active/del_system/<?php echo $val->systemcode; ?>"><i class="icon-trash"></i></a>
				      	</td>
				    </tr>
				    <?php $n++; } ?>
				</tbody>
			</table>
<!-- 			<div class="panel-body">
				<div class="text-right">
						<a href="<?php echo base_url(); ?>datastore" type="button" class="btn bg-danger" name="button"> Close</a>
				</div>
			</div> -->
		</div>
		</div>
	</div>

	<div id="newsystem" class="modal fade" data-backdrop="false">
		<div class="modal-dialog modal-lg">
		    <div class="modal-content">
			    <div class="modal-header bg-primary">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h5 class="modal-title">Setup SYSTEM</h5>
			    </div>
			    <form action="<?php echo base_url(); ?>datastore_active/add_sysytem" method="post" id="insert">
				    <div class="modal-body">
				        <div class="form-group">
				          <label class="col-lg-3 control-labelt">System Code:</label>
				            <div class="col-lg-9">
				              <input type="text"  class="form-control" value="<?php echo $code; ?>" id="systemcode" name="systemcode" placeholder="System Code">
				            </div>
				        </div><br>

				        <div class="form-group">
				          <label class="col-lg-3 control-labelt">System Name :</label>
				            <div class="col-lg-9">
				              <input type="text" class="form-control" id="systemname" name="systemname" placeholder="System Name">
				            </div>
				        </div><br>
				        <div class="modal-footer" style="margin-top:100px;">
				        <button type="button" id="saveadd" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
				          <button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
				        </div>

				    </div>
			    </form>
		    </div>
		</div>
	</div>
	<?php foreach ($res as $vv) {?>
	<div id="edittype<?php echo $vv->systemcode; ?>" class="modal fade" data-backdrop="false">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header bg-primary">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h5 class="modal-title">Setup SYSTEM</h5>
	      </div>
	      <form action="<?php echo base_url(); ?>datastore_active/edit_system/<?php echo $vv->systemcode; ?>/" method="post" id="edittypes">
	      <div class="modal-body">
	        <div class="form-group">
	          <label class="col-lg-3 control-labelt">รหัสระบบ:</label>
	            <div class="col-lg-9">
	              <input type="text" class="form-control" readonly id="systemcodee" name="systemcodee" placeholder="รหัสระบบ" value="<?php echo $vv->systemcode; ?>" >
	            </div>
	        </div><br>

	        <div class="form-group">
	          <label class="col-lg-3 control-labelt">ชื่อระบบ :</label>
	            <div class="col-lg-9">
	              <input type="text" class="form-control" id="systemnamee" name="systemnamee" placeholder="ชื่อระบบ" value="<?php echo $vv->systemname; ?>">
	            </div>
	        </div><br>
	        <div class="modal-footer" style="margin-top:100px;">
	          <button type="submit" id="saveedit" class=" btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
	          <button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
	        </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	<?php } ?>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '200px',
         targets: [ 0 ]
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

 $("#saveadd").click(function(){
  	if ($("#systemcode").val()=="") {
	    swal({
	        title: "Please fill System Code !!.",
	        text: "",
	        confirmButtonColor: "#EA1923",
	        type: "error"
	    });
   	}else if ($("#systemname").val()=="") {
	    swal({
	        title: "Please fill System Name!!.",
	        text: "",
	        confirmButtonColor: "#EA1923",
	        type: "error"
	    });
   	}else{
	    var frm = $('#insert');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                        swal({
                                  title: "Save Completed!!",
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                        setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>data_master/setupsystem";
                        }, 500); 
                    }
                });
                ev.preventDefault();
            });
   		$("#insert").submit();
   	}
});
   $('.basic').DataTable();
   $('#mg').attr('class', 'active');
   $('#mc0').attr('style', 'background-color:#dedbd8');
</script>
<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_systemjobtype');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Project Job</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Project Job and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/Project_job.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Project Job, upload an Excel (.xls) file:</p>
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