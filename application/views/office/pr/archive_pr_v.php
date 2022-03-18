<!-- Main content -->
<?php $flag = $this->uri->segment(4); ?>
<?php $depid = $this->uri->segment(3); ?>
<div class="content-wrapper">
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">PR Archive</h5>
                <div class="heading-elements">
                </div>
            </div>
            <div class="panel-body">
                <label>Filter Status:</label>
                <button class="all label bg-orange"> OVER ALL</button>
                <button class="in label label-info"> In Process</button>
                <button class="apprv label label-success"> Approve</button>
                <!-- <button class="notal label label-danger"> Disapprove</button> -->
                <button class="cancel label bg-danger"> Reject</button>
                <button class="opopen label bg-green"> OPEN PO</button>
            
            <script>
                $(".in").click(function(){
		$(".loadtable").html("<p>กำลังโหลดข้อมูล</p><div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'></div></div>");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/wait');
		});
		$(".apprv").click(function(){
		$(".loadtable").html("<p>กำลังโหลดข้อมูล</p><div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'></div></div>");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/approve');
		});
		$(".notal").click(function(){
		$(".loadtable").html("<p>กำลังโหลดข้อมูล</p><div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'></div></div>");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/disapprove');
		});
		// $(".pm").click(function(){
		// $(".loadtable").html("<p>กำลังโหลดข้อมูล</p><div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'></div></div>");
		// $(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/pmapprove');
		// });
		$(".all").click(function(){
		$(".loadtable").html("<p>กำลังโหลดข้อมูล</p><div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'></div></div>");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>');
		});
		$(".opopen").click(function(){
		$(".loadtable").html("<p>กำลังโหลดข้อมูล</p><div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'></div></div>");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/approve/open');
		});
		$(".cancel").click(function(){
		$(".loadtable").html("<p>กำลังโหลดข้อมูล</p><div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'></div></div>");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/reject');
		});
		</script>
            <div class="loadtable dataTables_wrapper no-footer">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-xxs pr_archive">
                        <thead>
                            <tr>
                                <th width="10%" class="text-center">PR No.</th>
                                <th width="10%" class="text-center">PR Date.</th>
                                <th width="15%" class="text-center">Name</th>
                                <!-- <th width="20%" class="text-center">Project/Department</th> -->
                                <!-- <th width="20%" class="text-center">System</th> -->
                                <!-- <th width="5%" class="text-center">TYPE</th> -->
                                <th width="8%" class="text-center">Type Of PR</th>
                                <!-- <th width="20%" class="text-center">PR QTY</th>
							<th width="20%" class="text-center">PO QTY</th>
							<th width="5%" class="text-center">Pr Outstanding</th> -->
                                <th width="8%" class="text-center">Approval Status</th>
                                <!-- <th width="80%" class="text-center">Detail</th> -->
                                <th width="10%" class="text-center">Status</th>
                                <th width="10%" class="text-center">OPEN PO</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $n=1; foreach($getpr as $val){  ?>
                            <tr>
                                <td>
                                    <?php echo $val->pr_prno; ?>
                                </td>
                                <td>
                                    <?php echo $val->pr_prdate; ?>
                                </td>
                                <td class="text-left">
                                    <?php echo $val->pr_reqname; ?>
                                </td>
                            
                                <td class="text-left"><?php if($val->purchase_type=="1"){echo "<span class='label bg-orange'>PO/WO</span>";}elseif($val->purchase_type=="2"){echo "<span class='label bg-info'>PO ONLY</span>";}elseif($val->purchase_type=="3"){echo "<span class='label bg-purple'>WO ONLY</span>";} ?></td>

                               
                                <td><a data-toggle="modal" data-target="#open<?php echo $val->pr_prno; ?>"><span class="label bg-green">Check</span></a></td>
                                

                                <?php if ($val->pr_approve=="wait"){ ?>
                                <td><span class="label label-info">
                                        <?php if ($val->pr_approve=="wait") {echo "IN Process";} ?></span></td>
                                <?php }else if($val->pr_approve=="approve"){ ?>
                                <td><span class="label label-success">
                                        <?php echo $val->pr_approve; ?></span></td>
                                <?php }elseif($val->pr_approve=="disapprove"){ ?>
                                <td><span class="label label-danger">
                                        <?php if($val->pr_approve=="disapprove"){echo "not allowed";} ?></span></td>
                                <?php }elseif($val->pr_approve=="reject"){ ?>
                                <td><span class="label bg-orange" data-toggle="modal" data-target="#modal_reject<?php echo $val->pr_prno; ?>">
                                        <?php if($val->pr_approve=="reject"){echo "reject";} ?></span></td>
                                <?php }else{ ?>
                                <td><span class="label bg-danger">
                                        <?php if($val->pr_approve=="delete"){echo "Delete";} ?></span></td>
                                <?php } ?>
                                <?php if ($val->po_open=="open" && $val->pr_approve=="approve"){ ?>
                                <td><a data-toggle="modal" data-target="#openstatus<?php echo $val->pr_prno; ?>"><span
                                            class="label bg-green">OPEN</span></a></td>
                                <?php }else if($val->po_open=="no" && $val->pr_approve=="approve"){ ?>
                                <td><i class="label bg-info">In Process</i></td>
                                <?php }else if($val->po_open=="no" && $val->pr_approve=="reject"){?>
                                <td><i class="label bg-danger">PR Reject</i></td>
                                <?php }else if($val->po_open=="no" && $val->pr_approve=="delete"){?>
                                <td><i class="label bg-danger">Delete</i></td>
                                <?php }else{?>
                                <td><i class="label bg-info">In Process</i></td>
                                <?php } ?>
                                <td width="15%">
                                    <ul class="icons-list">
                                        <li><a id="openpo_v" class="preload" href="<?php echo base_url(); ?>pr/openpr/<?php echo $val->pr_prno; ?>/<?php echo $flag; ?>/<?=$projectid;?>"
                                                data-popup="tooltip" title="" data-original-title="Open" target="_blank"><i class="icon-folder-open"></i></a></li>
                                        <?php if ($val->pr_approve=="approve") {?>
                                        <li class="text-slate"><i class="icon-pencil7"></i></li>
                                        <li class="text-slate"><i class="icon-trash"></i></li>
                                        <?php } elseif ($val->pr_approve=="delete") {?>
                                        <li class="text-slate"><i class="icon-pencil7"></i></li>
                                        <li class="text-slate"><i class="icon-trash"></i></li>
                                        <?php } elseif ($val->pr_approve=="reject") { ?>
                                        <li><a class="preload" href="<?php echo base_url(); ?>pr/editpr/<?php echo $val->pr_prno; ?>/<?php echo $flag; ?>/<?=$projectid;?>"
                                                data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></i></li>
                                        <li><a href="<?php echo base_url(); ?>pr/delpr/<?php echo $val->pr_prno; ?>/<?php echo $val->pr_project; ?>/<?php echo $flag; ?>/<?=$projectid;?>"
                                                data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"
                                                    onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"></i></a></li>
                                        <?php }else{ ?>
                                        <li><a class="preload" href="<?php echo base_url(); ?>pr/editpr/<?php echo $val->pr_prno; ?>/<?php echo $flag; ?>/<?=$projectid;?>"
                                                data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
                                        <li><a href="<?php echo base_url(); ?>pr/delpr/<?php echo $val->pr_prno; ?>/<?php echo $val->pr_project; ?>/<?php echo $flag; ?>/<?=$projectid;?>"
                                                data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"
                                                    onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"></i></a></li>
                                        <?php } ?>
                                        <li><a href="<?php echo base_url(); ?>report/viewerload?type=pr&typ=form&var1=<?php echo $val->pr_prid;?>&var2=<?php echo $val->pr_prno;?>&var3=<?php echo $compcode;?>&var4=<?php echo $val->pr_project;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                                        
                                    </ul>
                                </td>
                            </tr>
                            <?php $n++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <!-- /highlighting rows and columns -->
        <!-- Footer -->
        <!-- <div class="footer text-muted">
		© 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
	</div> -->
        <!-- /footer -->
    </div>
    <!-- /content area -->
</div>
<!-- /main content -->
<?php foreach ($getpr as $value) { 
	

	?>
<!-- Custom background color -->
<div id="open<?php echo $value->pr_prno; ?>" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  bg-info ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h5 class="modal-title">PR No.: <?php echo $value->pr_prno; ?></h5> -->
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5 for="">PR No.:</h5>
                            <small>
                                <?php echo $value->pr_prno;?></small>
                            <input type="hidden" class="pr form-control" id="pr" value="<?php echo $value->pr_prno;?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5 for="">PR Date:</h5>
                        <small>
                            <?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5 for="">Name :</h5>
                        <small>
                            <?php echo $value->pr_reqname;?></small>
                    </div>
                    <div class="col-md-6">
                        <h5 for="">Project :</h5>
                        <small>
                            <?php
							if ($flag == "p") {
								echo $val->project_name;
							}else{
								echo $val->department_title;
							}
						?>
                        </small>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-xxs">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Authorize Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reject Date</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   $n =1;
				$this->db->select('*');
				$this->db->where('app_pr', $value->pr_prno);
				$q =  $this->db->get('approve_pr');
				$pr_open = $q->result();
				foreach ($pr_open as $pr){    ?>
                    <tr>
                        <td width="5%">
                            <?php echo $n; ?>
                        </td>
                        <td width="20%">
                            <?php echo $pr->app_midname ?>
                        </td>
                        <td width="10%">
                            <?php echo $pr->app_date ?>
                        </td>
                        <td width="10%">
                            <?php echo (in_array($pr->status,array("yes","approve"))) ? "<span class='label label-success'>Approve</span>" : "<span class='label label-danger'>".($pr->status)."</span>";?>
                        </td>
                        <td width="10%">
                            <?php echo explode(" ", $pr->reject_date)[0]; ?>
                        </td>
                        <td width="30%">
                            <?php echo $pr->reject_remark ?>
                        </td>
                    </tr>
                    <?php $n++; }  ?>
                </tbody>
            </table><br>
            <div class="row">
                <div class="form-group">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="openstatus<?php echo $value->pr_prno; ?>" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

							<?php

							$this->db->select('*');
							$this->db->from('po');
							$this->db->where('po_prno', $value->pr_prno);
							$this->db->join('project', 'project.project_id = po.po_project','left outer');
							$this->db->join('department','department.department_id = po.po_department','left outer');
							$this->db->join('system','system.systemcode = po.po_system','left outer');
							$q =  $this->db->get();
							$res = $q->result();
							foreach ($res as $valp){
							$prno = $valp->po_prno;
							$podate = $valp->po_podate;
							$poproject = $valp->project_name;
							$podepartment = $valp->department_title;
							$posystem = $valp->systemname;
							$povender = $valp->po_vender;

							$potrem = $valp->po_trem;
							$pocontact = $valp->po_contact;
							$pocontactno = $valp->po_contactno;
							$poquono = $valp->po_quono;
							$podeliverydate = $valp->po_deliverydate;
							$poplace = $valp->po_place;
							$poremark = $valp->po_remark;
							$popono = $valp->po_pono;
                            $po_vat = $valp->po_vatper;

							} ?>
				<h5 class="modal-title">Open Detail PO No. : <?php echo $popono; ?></h5>
			</div>

		<div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						<h5 for="">PO No.:</h5>
						<small>&nbsp;&nbsp; <?php echo $popono; ?></small>
						<input type="hidden" class="pr form-control" id="pr" value="<?php echo $value->pr_prno;?>">
					</div>
				</div>
				<div class="col-md-3">
					<h5 for="">PO Date:</h5>
					<small>&nbsp;&nbsp; <?php echo date('d/m/Y' ,strtotime($podate)); ?></small>
				</div>

				<div class="col-md-3">
					<h5 for="">Project/Department:</h5>
					<small>&nbsp;&nbsp; <?php echo $poproject;?><?php echo $podepartment;?></small>
				</div>
				<div class="col-md-3">
					<h5 for="">System :</h5>
					<small>&nbsp;&nbsp; <?php echo $posystem;?></small>
				</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						<h5 for="">Vender :</h5>
						<small>&nbsp;&nbsp; <?php echo $povender; ?></small>
						<input type="hidden" class="pr form-control" id="pr" value="<?php echo $value->pr_prno;?>">
						</div>
					</div>
				<div class="col-md-3">
					<h5 for="">เงื่อนไขชำระ :</h5>
					<small>&nbsp;&nbsp; <?php echo $potrem; ?></small>
				</div>

				<div class="col-md-3">
					<h5 for="">เบอร์ติดต่อ :</h5>
					<small>&nbsp;&nbsp; <?php echo $pocontact;?></small>
				</div>
						<div class="col-md-3">
					<h5 for="">ใบเสนอราคา :</h5>
					<small>&nbsp;&nbsp; <?php echo $pocontactno;?></small>
				</div>
				</div>
				<div class="row">
				<div class="col-md-3">
					<h5 for="">วันที่ส่งมอบ :</h5>
					<small>&nbsp;&nbsp; <?php echo $podeliverydate;?></small>
				</div>
				</div>

				<div class="row">
				<div class="col-md-6">
				<h5 for="">Place Deliverry :</h5>
				<small>&nbsp;&nbsp; <?php echo $poplace;?></small>

				</div>
				<div class="col-md-6">
				<h5 for="">Additional message :</h5>
				<small>&nbsp;&nbsp; <?php echo $poremark;?></small>

				</div>
				</div>

				<br><br>
				<table class="table table-bordered table-striped table-xxs">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Cost Code</th>
							<th class="text-center">Material Name</th>
							<th class="text-center">Qty</th>
							<th class="text-center">Price/Unit</th>
							<th class="text-center">Amount</th>
						</tr>
						<?php $totamt=0;  $n =1; $total=0; $totalamount=0; $vat=0; $totalnetamount=0; $spacialdiscount=0;?>
						<?php
							$this->db->select('*');
							$this->db->from('po_item');
							$this->db->where('poi_ref',$popono);
							$q =  $this->db->get();
							$res = $q->result();
							foreach ($res as $p){ ?>
						<tr>
							<td class="text-center"><?php echo $n; ?></td>
							<td class="text-center"><?php echo $p->poi_costcode; ?></td>
							<td ><?php echo $p->poi_matname; ?></td>
							<td class="text-center"><?php echo $p->poi_qty; ?> <?php echo $p->poi_unit; ?></td>
							<td class="text-right"><?php echo $p->poi_priceunit; ?></td>
							<td class="text-right"><?php echo number_format($p->poi_amount,2); ?></td>

						</tr>
						<?php $n++; 
                             $totalamount=$totalamount+$p->poi_amount;  
                             $vat = $vat+$p->poi_vat; 
                             $totalnetamount=$totalnetamount+$p->poi_netamt; 
                             $spacialdiscount=$spacialdiscount+$p->poi_disce;
                             $total = $total+$p->poi_disamt;
                        } ?>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><b>Total Before Tax</b></td>
                                <td class="text-right"><?php echo number_format($totalamount,2);?></td>
                            </tr> 
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><b>Special Discount</b></td>
                                <td class="text-right"><?php echo number_format($spacialdiscount,2);?></td>
                            </tr>  
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><b>Total</b></td>
                                <td class="text-right"><?php echo number_format($total,2);?></td>
                            </tr>  
                            <tr>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><b>Vat <?php echo $po_vat;?>%</b></td>
                                <td class="text-right"><?php echo number_format($vat,2);?></td>
                            </tr>  
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><b>Total Amount</b></td>
                                <td class="text-right"><b><?php echo number_format($totalnetamount,2);?></b></td>
                            </tr>  
					</thead>
					<tbody>

					</tbody>
				</table><br>

				<div class="row">
					<div class="form-group">
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php } ?>


<?php $n=1; foreach($getpr as $val){?>
<div id="modal_reject<?php echo $val->pr_prno; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Reject No.
                    <?php echo $val->pr_prno; ?>
                </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label>หมายเหตุ</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $val->reject_remark; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" class="btn btn-default"><i class="icon-close2"></i> Close</a>
            </div>
        </div>
    </div>
</div>

<?php } ?>
<script type="text/javascript">
    $('#purchase').attr('class', 'active');
    $('#pr_archive').attr('style', 'background-color:#dedbd8');
    $.extend($.fn.dataTable.defaults, {
        order: [[ 0, "desc" ]],
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: '100px',
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
    $('.pr_archive').DataTable();
</script>