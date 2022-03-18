			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<div class="heading-elements">
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">PR Status</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->

				<div class="content">
					<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">PR Status</h5>
								<div class="heading-elements">
			                	</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
											<label class="checkbox-inline">
											<input type="checkbox" class="styled" id="prpending" checked="checked">
											<input type="hidden" id="prpendingy" value="Y">
											PR Pending
										</label>

										<label class="checkbox-inline">
											<input type="checkbox" class="styled" id="prapprove">
											<input type="hidden" id="prapprovey" >
											PR Approve
										</label>
									</div>
									<div class="col-md-6">
										
									</div>
								</div>
								<!-- <div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label class="radio-inline">
												<input type="radio" name="radio-inline-left" id="matrd1" class="styled" checked>
												PR.NO.
											</label>
											<label class="radio-inline">
												<input type="radio" name="radio-inline-left" id="matrd2" class="styled" >
												Department
											</label>
											<label class="radio-inline">
												<input type="radio" name="radio-inline-left" id="matrd3" class="styled">
												Project
											</label>
											<label class="radio-inline">
											<div class="input-group">
												<input type="text" name="" id="matrd3" class="form-control">
												<div class="input-group-btn">
													<button class="btn btn-default"><i class="icon-search4"></i> ค้นหา</button>
												</div>
											</div>
												
											</label>
										</div>
									</div>
									<div class="col-md-4">
									</div>
								</div> -->
<!-- <style>
	.tablecontainer { width: auto; overflow; hidden;}
tr {display: block; }
th, td { width: 300px; }
tbody { display: block; height: 500px; overflow: auto;}
</style> -->
								<style type="text/css">
									.tablew {
											  width: 200%;
											  max-width: 500%;
											}
								</style>
								<div class="row">
									<div class="load">
										<table class="table table-bordered table-hover table-xxs" id="example">
											<thead>
												<tr>
													<th>PR. No.</th>
													<th>PR Date</th>
													<th>Project/Depertment</th>
													<th>Type</th>
													<th>For</th>
													<th>Remark</th>
													<th>Refernce By</th>
													<th>Project Place</th>
													<th>Approve</th>
													<th>OPEN PO</th>
												</tr>
											</thead>
											<tbody>
											<?php foreach ($res as $key => $value) {
												$type = $this->db->query("select costype_name from master_costtype where costtype_id='$value->pr_costtype'")->result();
											?>
											<?php if ($value->po_open=="open") { ?>
												<tr class="text-success">
													<td><?php echo $value->pr_prno; ?></td>
													<td><?php echo $value->pr_prdate; ?></td>
													<td><?php echo $value->project_name; ?><?php echo $value->department_title; ?></td>
													<?php foreach ($type as $key => $vcosttype) {?>
													<td><?php echo $vcosttype->costype_name; ?></td>
													<?php } ?>
													<td><?php if ($value->purchase_type=="1") { echo "PO AND WO";}elseif($value->purchase_type=="2"){echo "PO ONLY";}else{echo "WO ONLY";} ?></td>
													<td><?php echo $value->pr_remark; ?></td>
													<td><?php echo $value->pr_reqname; ?></td>
													<td><?php echo $value->pr_deliplace; ?></td>
													<td>
														<?php if($value->pr_approve=="wait"){echo "<label class='label label-info'>In Process</label> <label class='label label-default'>Approve</label> <label class='label label-default'>PM Approve</label> <label class='label label-default'>NOT ALLOWED</label> <label class='label label-default'>Delete</label>";} ?>
														<?php if($value->pr_approve=="pmapprove"){echo "<label class='label label-default'>In Process</label> <label class='label label-default'>Approve</label> <label class='label bg-violet'>PM Approve</label> <label class='label label-default'>NOT ALLOWED</label> <label class='label label-default'>Delete</label>";} ?>
														<?php if($value->pr_approve=="approve"){echo "<label class='label label-default'>In Process</label> <label class='label label-success'>Approve</label> <label class='label label-default'>PM Approve</label> <label class='label label-default'>NOT ALLOWED</label> <label class='label label-default'>Delete</label>";} ?>
														<?php if($value->pr_approve=="disapprove"){echo "<label class='label label-default'>In Process</label> <label class='label label-default'>Approve</label> <label class='label label-default'>PM Approve</label> <label class='label label-danger'>NOT ALLOWED</label> <label class='label label-default'>Delete</label>";} ?>
														<?php if($value->pr_approve=="delete"){echo "<label class='label label-default'>In Process</label> <label class='label label-default'>Approve</label> <label class='label label-default'>PM Approve</label> <label class='label label-default'>NOT ALLOWED</label> <label class='label label-danger'>Delete</label>";} ?>
													</td>
													<td>
														<?php if($value->po_open=="open"){echo "<label class='label label-success'>Open</label> <label class='label label-default'>NO</label>";} ?>
														<?php if($value->po_open=="no"){echo "<label class='label label-default'>Open</label> <label class='label label-warning'>NO</label>";} ?>
													</td>
												</tr>
												<?php }else{ ?>
													<tr>
														<td><?php echo $value->pr_prno; ?></td>
														<td><?php echo $value->pr_prdate; ?></td>
														<td><?php echo $value->project_name; ?><?php echo $value->department_title; ?></td>
														<?php foreach ($type as $key => $vcosttype) {?>
														<td><?php echo $vcosttype->costype_name; ?></td>
														<?php } ?>
														<td><?php if ($value->purchase_type=="1") { echo "PO AND WO";}elseif($value->purchase_type=="2"){echo "PO ONLY";}else{echo "WO ONLY";} ?></td>
														<td><?php echo $value->pr_remark; ?></td>
														<td><?php echo $value->pr_reqname; ?></td>
														<td><?php echo $value->pr_deliplace; ?></td>
														<td>
															<?php if($value->pr_approve=="wait"){echo "<label class='label label-info'>In Process</label> <label class='label label-default'>Approve</label> <label class='label label-default'>PM Approve</label> <label class='label label-default'>NOT ALLOWED</label> <label class='label label-default'>Delete</label>";} ?>
															<?php if($value->pr_approve=="pmapprove"){echo "<label class='label label-default'>In Process</label> <label class='label label-default'>Approve</label> <label class='label bg-violet'>PM Approve</label> <label class='label label-default'>NOT ALLOWED</label> <label class='label label-default'>Delete</label>";} ?>
															<?php if($value->pr_approve=="approve"){echo "<label class='label label-default'>In Process</label> <label class='label label-success'>Approve</label> <label class='label label-default'>PM Approve</label> <label class='label label-default'>NOT ALLOWED</label> <label class='label label-default'>Delete</label>";} ?>
															<?php if($value->pr_approve=="disapprove"){echo "<label class='label label-default'>In Process</label> <label class='label label-default'>Approve</label> <label class='label label-default'>PM Approve</label> <label class='label label-danger'>NOT ALLOWED</label> <label class='label label-default'>Delete</label>";} ?>
															<?php if($value->pr_approve=="delete"){echo "<label class='label label-default'>In Process</label> <label class='label label-default'>Approve</label> <label class='label label-default'>PM Approve</label> <label class='label label-default'>NOT ALLOWED</label> <label class='label label-danger'>Delete</label>";} ?>
														</td>
														<td>
															<?php if($value->po_open=="open"){echo "<label class='label label-success'>Open</label> <label class='label label-default'>NO</label>";} ?>
															<?php if($value->po_open=="no"){echo "<label class='label label-default'>Open</label> <label class='label label-warning'>NO</label>";} ?>
														</td>
													</tr>
												<?php } ?>
											<?php } ?>
											</tbody>
										</table>
										
									</div>
									<h4>PR Detail</h4>
									<div id="detail">
											
													<tr>
														<th colspan="7"></th>
													</tr>
										</div>
								</div>
							</div>
					</div>
				</div>
			</div>
	<script>
$("#prpending").click(function(){
	if ($("#prpending").prop("checked")) {
		$("#prpendingy").val("Y");
	}else{
		$("#prpendingy").val("");
	}
});
$("#prapprove").click(function(){
	if ($("#prapprove").prop("checked")) {
		$("#prapprovey").val("Y");
	}else{
		$("#prapprovey").val("");
	}
});


		$("#prpending").click(function(){
			if($("#prpendingy").val()=="Y" && $("#prapprovey").val()!="Y"){
				$(".load").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$(".load").load('<?php echo base_url(); ?>pr_report/loadprstatuspending/pending');
			}else if($("#prpendingy").val()!="Y" && $("#prapprovey").val()!="Y"){
				$(".load").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$(".load").load('<?php echo base_url(); ?>pr_report/loadprstatuspending/all');
			}else if($("#prpendingy").val()!="Y" && $("#prapprovey").val()=="Y"){
				$(".load").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$(".load").load('<?php echo base_url(); ?>pr_report/loadprstatuspending/approve');
			}else{
				$(".load").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$(".load").load('<?php echo base_url(); ?>pr_report/loadprstatuspending/wap');
			}
		});
		$("#prapprove").click(function(){
			if($("#prapprovey").val()=="Y" && $("#prpendingy").val()=="Y"){
				$(".load").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$(".load").load('<?php echo base_url(); ?>pr_report/loadprstatuspending/wap');
			}else if($("#prpendingy").val()!="Y" && $("#prapprovey").val()!="Y"){
				$(".load").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$(".load").load('<?php echo base_url(); ?>pr_report/loadprstatuspending/all');
			}else if ($("#prapprovey").val()=="Y" && $("#prpendingy").val()!="Y") {
				$(".load").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$(".load").load('<?php echo base_url(); ?>pr_report/loadprstatuspending/approve');
			}else{
				$(".load").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$(".load").load('<?php echo base_url(); ?>pr_report/loadprstatuspending/disapp');
			}
		});
	</script>
	<script>
	   $.extend( $.fn.dataTable.defaults, {
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });
		    $('.datatable-fixed-complex').DataTable({
        columnDefs: [
            { 
                orderable: false,
                targets: [5]
            },
            { 
                width: "250px",
                targets: [0]
            },
            { 
                width: "250px",
                targets: [1]
            },
            { 
                width: "200px",
                targets: [5, 6]
            },
            { 
                width: "100px",
                targets: [4]
            }
        ],
        scrollX: true,
        scrollY: '350px',
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 1,
            rightColumns: 0
        }
    });


var table = $('#example').DataTable();
     
    $('#example tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        // alert( 'You clicked on '+data[1]+'\'s row' );
        $("#detail").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#detail").load('<?php echo base_url(); ?>pr_report/load_pr_status_detail/'+data[0]+'/'+data[1]);

    } );	
</script>
	
