<?php 
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
?>
<?php 
$datestring = "Y";
   $mm = "m";
   $dd = "d";

   $this->db->select('*');
   $qu = $this->db->get('master_jobtype');
   $ress = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

   if ($ress==0) {
     $code = "00"."1";
      $apd_item ="1";
   }else{
     $this->db->select('*');
     $this->db->order_by('type_id','desc');
     $this->db->limit('1');
     $q = $this->db->get('master_jobtype');
     $run = $q->result();
     foreach ($run as $valx)
     {
       $x1 = $valx->type_id+1;
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
	<div class="panel panel-flat">
		<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Business job type	<p></p></h6>
			<div class="heading-elements">
				<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>
				<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=jobtype.mrt&comp=<?php echo "$compcode" ?>" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
				<a type="button" data-toggle="modal" data-target="#newjob" class="newjob btn btn-info"><i class="icon-plus-circle2"></i> New</a>
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">
						<div class="dataTables_wrapper no-footer">
		<div class="table-responsive">
	  		<table class="table-striped basic table table-hover table-xxs datatable-basic">
			  	<thead>
				    <tr>
				      	<th>Job Type Code</th>
				      	<th>Job Type Name</th>
				      	<th width="20%">Active</th>
				    </tr>
			  	</thead>
				 <tbody>
				  <?php $n=1; foreach ($res as $val) {?>
				    <tr>
				      	<td><?php echo $val->type_code; ?></td>
				      	<td><?php echo $val->type_name; ?></td>
				      	<td>
					      	<a  type="button" data-toggle="modal" data-target="#edittype<?php echo $val->type_code; ?>"><i class="icon-pencil7"></i></a>
					      	<a href="<?php echo base_url(); ?>datastore_active/del_type/<?php echo $val->type_code; ?>"><i class="icon-trash"></i></a>
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
	</div>

	<div id="newjob" class="modal fade" data-backdrop="false">
		<div class="modal-dialog modal-lg">
		    <div class="modal-content">
			    <div class="modal-header btn-primary">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h5 class="modal-title">Setup Job Type</h5>
			    </div>
			    <form action="<?php echo base_url(); ?>datastore_active/add_jobtype" method="post" id="insert">
				    <div class="modal-body">
				        <div class="form-group">
				          <label class="col-lg-3 control-labelt">รหัสประเภทงาน:</label>
				            <div class="col-lg-9">
				              <input type="text" class="form-control" value="<?php echo $code; ?>" id="type_code" name="type_code" placeholder="รหัสประเภทงาน">
				            </div>
				        </div><br>

				        <div class="form-group">
				          <label class="col-lg-3 control-labelt">ชื่อประเภทงาน :</label>
				            <div class="col-lg-9">
				              <input type="text" class="form-control" id="type_name" name="type_name" placeholder="ชื่อประเภทงาน">
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
	<div id="edittype<?php echo $vv->type_code; ?>" class="modal fade" data-backdrop="false">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header btn-primary">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h5 class="modal-title">Setup Job Type</h5>
	      </div>
	      <form action="<?php echo base_url(); ?>datastore_active/edit_jobtype/<?php echo $vv->type_code; ?>/" method="post" id="edittypes">
	      <div class="modal-body">
	        <div class="form-group">
	          <label class="col-lg-3 control-labelt">รหัสประเภทงาน:</label>
	            <div class="col-lg-9">
	              <input type="text" class="form-control" readonly id="typee_code" name="typee_code" placeholder="รหัสประเภทงาน" value="<?php echo $vv->type_code; ?>" >
	            </div>
	        </div><br>

	        <div class="form-group">
	          <label class="col-lg-3 control-labelt">ชื่อประเภทงาน :</label>
	            <div class="col-lg-9">
	              <input type="text" class="form-control" id="typee_name" name="typee_name" placeholder="ชื่อประเภทงาน" value="<?php echo $vv->type_name; ?>">
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
			       search: '<span>Filter:</span> _INPUT_ ',
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
// alert(555)


if ($('#type_code').val() =="") {
	swal(
		'Please Fill Code Job',
	  ' ',
	  'error'
	)

	return false;
}

if ($('#type_name').val() =="") {
	swal(
	  'Please Fill Name Job',
	  ' ',
	  'error'
	)

	return false;
}

var code = $('#type_code').val();
var name = $('#type_name').val();

	$.get('<?php echo base_url() ?>data_master/chk_job_type/'+code, function(data) {
	}).done(function (data) {
		var chk = jQuery.parseJSON(data);
		if (chk.status == true) {
			swal(
				'Duplicate Code',
				' ',
				'error'
			)
		}else{
			$.post('<?php echo base_url() ?>data_master/insert_job', {type_code: code ,type_name:name }, function(data) {
			}).done(function(data){

				var chk_insert = jQuery.parseJSON(data);
					if(chk_insert.status == true){
                window.location = '<?=base_url()?>data_master/master_job_type';
				}
			});   		
		}

	});
});
  $('.datatable-basic').DataTable();
 	$('#mg').attr('class', 'active');
	$('#mc10').attr('style', 'background-color:#dedbd8');
</script>
