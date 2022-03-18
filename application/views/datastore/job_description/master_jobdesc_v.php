<?php
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
 ?>
<?php 
$datestring = "Y";
   $mm = "m";
   $dd = "d";

   $this->db->select('*');
   $qu = $this->db->get('master_jobdesc');
   $ress = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

   if ($ress==0) {
     $code = "00"."1";
      $apd_item ="1";
   }else{
     $this->db->select('*');
     $this->db->order_by('job_id','desc');
     $this->db->limit('1');
     $q = $this->db->get('master_jobdesc');
     $run = $q->result();
     foreach ($run as $valx)
     {
       $x1 = $valx->job_id+1;
     }

     if ($x1<=9) {
        $code = "00".$x1;
        $apd_item = $x1;
     }
     elseif ($x1<=99) {
       $code = "".date($datestring).date($mm)."0".$x1;
       $apd_item = $x1;
     }

   }
 ?>

<div class="content">
<div class="panel panel-body">
		<div class="panel-heading">
			<div class="heading-elements">
				<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>
				<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=job.mrt&comp=<?php echo "$compcode" ?>" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
				<a type="button" data-toggle="modal" data-target="#newjob" class="newjob btn btn-info"><i class="icon-plus-circle2"></i> New</a>
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">
		</div>
		<div class="table-responsive">
	  		<table class="basic table table-hover table-xxs datatable-basic">
			  	<thead>
				    <tr>
				      	<th>Job Description Code</th>
				      	<th>Job Description Name</th>
				      	<th>Active</th>
				    </tr>
			  	</thead>
				 <tbody>
				  <?php $n=1; foreach ($res as $val) {?>
				    <tr>
				      	<td><?php echo $val->job_code; ?></td>
				      	<td><?php echo $val->job_name; ?></td>
				      	<td>
					      	<a  type="button" data-toggle="modal" data-target="#editjob<?php echo $val->job_code; ?>"><i class="icon-pencil7"></i></a>
					      	<?php if ($val->job_open == "open") {					      		
					        }else{ ?>
					      	<a href="<?php echo base_url(); ?>datastore_active/del_jobdesc/<?php echo $val->job_code; ?>"><i class="icon-trash"></i></a>
					      	<?php } ?>
				      	</td>
				    </tr>
				    <?php $n++; } ?>
				</tbody>
			</table>
			<!-- <div class="panel-body">
				<div class="text-right">
						<a href="<?php echo base_url(); ?>datastore" type="button" class="btn bg-danger" name="button"> Close</a>
				</div>
			</div> -->
		</div>
	

	<div id="newjob" class="modal fade" data-backdrop="false">
		<div class="modal-dialog modal-lg">
		    <div class="modal-content">
			    <div class="modal-header btn-primary">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h5 class="modal-title">Setup Job Description</h5>
			    </div>
			    <form action="<?php echo base_url(); ?>datastore_active/add_jobdesc" method="post" id="insert">
				    <div class="modal-body">
				        <div class="form-group">
				          <label class="col-lg-3 control-labelt">Job Description Code:</label>
				            <div class="col-lg-9">
				              <input type="text" readonly="" value="<?php echo $code; ?>" class="form-control" id="job_code" name="job_code" placeholder="รหัสลักษณะงาน">
				            </div>
				        </div><br>

				        <div class="form-group">
				          <label class="col-lg-3 control-labelt">Job Description Name :</label>
				            <div class="col-lg-9">
				              <input type="text" class="form-control" id="job_name" name="job_name" placeholder="ชื่อลักษณะงาน">
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
	<div id="editjob<?php echo $vv->job_code; ?>" class="modal fade" data-backdrop="false">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header btn-primary">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h5 class="modal-title">Setup Job Description</h5>
	      </div>
	      <form action="<?php echo base_url(); ?>datastore_active/edit_jobdesc/<?php echo $vv->job_code; ?>/" method="post" id="editjobs">
	      <div class="modal-body">
	        <div class="form-group">
	          <label class="col-lg-3 control-labelt">รหัสลักษณะงาน:</label>
	            <div class="col-lg-9">
	              <input type="text" class="form-control" readonly id="jobe_code" name="jobe_code" placeholder="Business Code" value="<?php echo $vv->job_code; ?>" >
	            </div>
	        </div><br>

	        <div class="form-group">
	          <label class="col-lg-3 control-labelt">ชื่อลักษณะงาน :</label>
	            <div class="col-lg-9">
	              <input type="text" class="form-control" id="jobe_name" name="jobe_name" placeholder="Business Name" value="<?php echo $vv->job_name; ?>">
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
	</div>
	<?php } ?>
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
  	if ($("#job_code").val()=="") {
	    swal({
	        title: "กรุณากรอกรหัสลักษณะงาน!!.",
	        text: "",
	        confirmButtonColor: "#EA1923",
	        type: "error"
	    });
   	}else if ($("#job_name").val()=="") {
	    swal({
	        title: "กรุณากรอกชื่อลักษณะงาน!!.",
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
                        window.location.href = "<?php echo base_url(); ?>data_master/master_job_desc";
                        }, 500); 
                    }
                });
                ev.preventDefault();
            });
   		$("#insert").submit();
   	}
});
	$('#mg').attr('class', 'active');
	$('#mc7').attr('style', 'background-color:#dedbd8');
</script>
