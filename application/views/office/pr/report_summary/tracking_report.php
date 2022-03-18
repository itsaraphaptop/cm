<?php
	$pr = $this->db->query("SELECT
pr.pr_prno,
pr.pr_approve,
pr_item.pri_matcode,
pr_item.pri_matname,
pr_item.pri_qty,
pr_item.pri_unit,
pr_item.pri_priceunit,
pr_item.pri_amount,
pr.pr_delidate,
po.po_approve,
po.po_pono,
po.po_podate,
po_item.poi_matcode,
po_item.poi_matname,
po_item.poi_qty,
po_item.poi_unit,
po_item.poi_priceunit,
po_item.poi_amount,
lo.status,
lo.lo_lono,
lo.lodate,
lo_detail.lo_matcode,
lo_detail.lo_matname,
lo_detail.lo_qty,
lo_detail.lo_unit,
lo_detail.lo_priceunit,
lo.amount,
po_receive.taxno,
po_receive.taxdate,
po_receive.duedate,
po_receive.term,
po_receive.docode,
po_receive.dodate
FROM
pr
INNER JOIN pr_item ON pr.pr_prno = pr_item.pri_ref ,
po
INNER JOIN po_item ON po.po_pono = po_item.poi_ref ,
lo
INNER JOIN lo_detail ON lo.lo_lono = lo_detail.lo_ref ,
po_receive Limit 1000")->result();
?>
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
								<h5 class="panel-title"><i class="icon-cog3 position-left"></i>Tracking Report</h5>
								<div class="heading-elements">
			                	</div>
							</div>
							<div class="panel-body">
							
		
								<style type="text/css">
									.tablew {
											  width: 200%;
											  max-width: 500%;
											}
								</style>
								<div class="row">
									<div class="load">
										<table class="table table-bordered table-hover table-xxs datatable-fixed-complex" id="example">
											<thead>
												<tr>
												<!-- PR -->
													<th>NO.</th>
													<th>PR Approve</th>
													<th style="background-color: #E0FFFF;">PR NO.</th>
													<th>PR Date</th>
													<th>Materials Code</th>
													<th>Materials Name</th>
													<th>QTY</th>
													<th>Unit</th>
													<th>Price/Unit</th>
													<th>Amount</th>
												<!-- PO/WO -->
													<th>PO/WO Approve</th>
													<th style="background-color: #E0FFFF;">PO/WO No.</th>
													<th>PO/WO Date</th>
													<th>Materials Code</th>
													<th>Materials Name</th>
													<th>QTY</th>
													<th>Unit</th>
													<th>Price/Unit</th>
													<th>Amount</th>
												<!-- Receive DO -->
													<th>Receive QTY</th>
													<th style="background-color: #E0FFFF;">Receive No.</th>
													<th>Receive Date</th>
													<th style="background-color: #E0FFFF;">Tax No.</th>
													<th>Tax Date</th>
													<th>Do No.</th>
													<th>Do Date</th>
													<th>Cr. Term</th>
													<th>Due date</th>
												<!-- Bill -->
													<th style="background-color: #E0FFFF;">Bill No.</th>
													<th>Type</th>
													<th>Bill Date</th>
													<th>Warehouse</th>
													<th>WO Amount</th>
													<th>Down</th>
													<th>Retension</th>
													<th>Vat</th>
													<th>W/T</th>
												<!-- AP -->
													<th>AP Date</th>
													<th style="background-color: #E0FFFF;">AP No.</th>
													<th>Cheque Date</th>
													<th>Cheque No.</th>
													<th>Amount</th>
													<th>PV Date.</th>
													<th style="background-color: #E0FFFF;">PV No.</th>
													<th>Clear Status</th>
												</tr>
											</thead>
											<?php $i=1;
											foreach ($pr as $spr) {
											?>
												<tr>
												<!-- PR -->
													<td><?php echo $i; ?></td>
													<td><?php echo $spr->pr_approve; ?></td>
													<td style="background-color: #E0FFFF;"><?php echo $spr->pr_prno; ?></td>
													<td><?php echo $spr->pr_delidate; ?></td>
													<td><?php echo $spr->pri_matcode; ?></td>
													<td><?php echo $spr->pri_matname; ?></td>
													<td><?php echo $spr->pri_qty; ?></td>
													<td><?php echo $spr->pri_unit; ?></td>
													<td><?php echo $spr->pri_priceunit; ?></td>
													<td><?php echo $spr->pri_amount; ?></td>
												<!-- PO/WO -->
													<td><?php echo $spr->po_approve; ?></td>
													<td style="background-color: #E0FFFF;"><?php echo $spr->po_pono; ?></td>
													<td><?php echo $spr->po_podate; ?></td>
													<td><?php echo $spr->poi_matcode; ?></td>
													<td><?php echo $spr->poi_matname; ?></td>
													<td><?php echo $spr->poi_qty; ?></td>
													<td><?php echo $spr->poi_unit; ?></td>
													<td><?php echo $spr->poi_priceunit; ?></td>
													<td><?php echo $spr->poi_amount; ?></td>
												<!-- Receive DO -->
													<!-- <td><?php echo $spr->status; ?></td>
													<td style="background-color: #E0FFFF;"><?php echo $spr->lo_lono; ?></td>
													<td><?php echo $spr->lodate; ?></td>
													<td style="background-color: #E0FFFF;"><?php echo $spr->lo_matcode; ?></td>
													<td><?php echo $spr->lo_matname; ?></td>
													<td><?php echo $spr->lo_qty; ?></td>
													<td><?php echo $spr->lo_unit; ?></td>
													<td><?php echo $spr->lo_priceunit; ?></td>
													<td><?php echo $spr->amount; ?></td> -->
													<td></td>
													<td style="background-color: #E0FFFF;"></td>
													<td></td>
													<td style="background-color: #E0FFFF;"><?php echo $spr->taxno; ?></td>
													<td><?php echo $spr->taxdate; ?></td>
													<td><?php echo $spr->docode; ?></td>
													<td><?php echo $spr->dodate; ?></td>
													<td><?php echo $spr->term; ?></td>
													<td><?php echo $spr->duedate; ?></td>
												<!-- Bill -->
													<td style="background-color: #E0FFFF;"></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												<!-- AP -->
													<td></td>
													<td style="background-color: #E0FFFF;"></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td style="background-color: #E0FFFF;"></td>
													<td></td>
												</tr>
											<?php $i++;}  ?>
										</table>
										
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>

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
                width: "30px",
                targets: [0]
            },
            { 
                width: "30px",
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
        scrollY: '600px',
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
	
