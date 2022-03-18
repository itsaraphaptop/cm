<div id="deletepo" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-body">
                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h5 class="modal-title">กรุณากรอกรายละเอียดการลบ รหัส PO <span id="po_code"></span> </h5>
        </div>
        <div class="modal-body">
        <label>หมายเหตุ :</label>
         <input class="form-control" id="remark" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="save_delete_po">บันทึก</button>
          <button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
        </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	function show_modal(el){
		var po_no = el.attr("po_no");
		var pr_no = el.attr("pr_no");
		//alert(po_no);
		$("#po_code").html(po_no);
		$("#deletepo").modal('show');
		$("#save_delete_po").attr("po_no",po_no);
		$("#save_delete_po").attr("pr_no",pr_no);

	}

	$("#save_delete_po").click(function(event) {
		var po_no = $(this).attr("po_no");
		var pr_no = $(this).attr("pr_no");
		var remark = $("#remark").val();
		var url = '<?=base_url()?>purchase_active/deletepo/'+po_no+"/"+pr_no;
		if(remark!=""){
			// alert(remark);
			// alert(po_no);
			// alert(pr_no);
			 // alert(url)
			$.post( url,{remark:remark},function(data) {
				//alert(data);
				location.reload();
			});
			$("#deletepo").modal('hide');
		}else{
			alert("กรุณากรอก Remark");
		}


	});


</script>
<!-- Main content -->

					<!-- Highlighting rows and columns -->

							<table class="table table-hover table-striped table-xxs basic">
							<thead>
								<tr>
									<th class="text-center">PO No.</th>
					                <th class="text-center">PR No.</th>
					                <th class="text-center">Name</th>
					                <th class="text-center">Project/Department</th>
					                <th class="text-center">Vender</th>
					                <th class="text-center">Date</th>
					                <th class="text-center">Approve</th>
					                <th class="text-center">Status</th>
					                <th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php $n = 1;foreach ( $getpo as $val ) {?>
									<tr>
									<td><?php echo $val->po_pono; ?></td>
									<td><?php echo $val->po_prno; ?></td>
									<td><?php echo $val->po_prname; ?></td>
									<td>
		                				<?php
if ( $open == "p" ) {
 echo $val->project_name;
} else {
 echo $val->department_title;
}
 ?>
		                			</td>
									<td><?php echo $val->po_vender; ?></td>
                					<td><?php echo $val->po_podate; ?></td>
                					<td class="text-center"><button type="button" class="label label-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $val->po_pono; ?>">Tree <i class="icon-play3 position-right"></i></button></td>
                					<?php if ( $val->po_approve == "approve" ) {?>
					                <td class="text-center"><span class="label label-success"><?php echo $val->po_approve; ?></span></td>
					                <?php } elseif ( $val->po_approve == "reject" ) {?>
									<td><span class="label bg-orange" data-toggle="modal" data-target="#modal_reject<?php echo $val->po_pono; ?>"><?php if ( $val->po_approve == "reject" ) {echo "reject";}?></span></td>
					                <?php } else {?>
					                <td class="text-center"><span class="label label-info">IN Process</span></td>
					                <?php }?>
					                <td>
					                  <ul class="icons-list">
					                      <li><a data-toggle="modal" data-target="#open<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
					                    <?php if ( $val->po_approve == "approve" || $status == "open" ) {?>
					                      <li class="text-slate"><i class="icon-pencil7"></i></li>
					                      <li class="text-slate"><i class="icon-trash"></i></li>
					                    <?php } else {?>
					                      <li><a class="preload" href="<?php echo base_url(); ?>index.php/purchase/editpo/<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
					                      <li><a id="remove<?php echo $val->po_pono; ?>" pr_no="<?php echo $val->po_prno; ?>"  po_no="<?php echo $val->po_pono; ?>" onclick="show_modal($(this))" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
					                      <?php }?>
					                      <!-- <li><a href="<?php $base_url = $this->config->item( 'url_report' ); echo $base_url;?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=<?php echo $reporttype; ?>&pp=<?php echo $val->po_id; ?>&pri=<?php echo $val->po_pono; ?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li> -->
										  <li><a href="<?php echo base_url(); ?>report/viewerload?type=po&typ=form&var1=<?php echo $val->po_id;?>&var2=<?php echo $val->po_pono;?>&var3=<?=$compcode;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
					                  </ul>
					                </td>
								</tr>
								<?php $n++;}?>
							</tbody>
						</table>
								<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

								<!-- /core JS files -->
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
								  $('.basic').DataTable();
								</script>
