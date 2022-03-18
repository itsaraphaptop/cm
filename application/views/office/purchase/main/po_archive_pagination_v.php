<div class="content-wrapper">
    <div class="content">
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">PO Archive</h5>
          <div class="heading-elements">
          </div>
        </div>
        <div class="panel-body">
          <label>Filter Status:</label>
          <button class="all label bg-purple"> OVER ALL</button>
          <button class="in label label-info"> In Process</button>
          <button class="apprv label label-success"> Approve</button>
          <!-- <button class="cancel label bg-danger"> Cancel</button> -->
          <button class="btnreject label bg-orange"> Reject</button>
          <button class="opopen label bg-green"> OPEN IC</button>
 
        <div class="loadtable dataTables_wrapper no-footer">
          <div class="table-responsive">
            <table class="table table-hover table-striped table-xxs datatable-basic">
              <thead>
                <tr>
                  <th class="text-center" width="10%">PO No.</th>
                  <th class="text-center" width="10%">PR No.</th>
                  <th class="text-center" width="10%">Name</th>
                  <th class="text-center" width="15%">Project</th>
                  <th class="text-center" width="15%">Vender</th>
                  <th class="text-center" width="7%">Date</th>
                  <th class="text-center" width="5%">Check Approve</th>
                  <th class="text-center" width="10%">Status</th>
                  <th class="text-center" width="10%">Actions</th>
                </tr>
              </thead>
              <tbody >
                <?php $n = 1;foreach ( $getpr as $val ) {
                
                  ?>
                <tr>
                          <td class="text-center"><?php echo $val->po_pono; ?></td>
                          <td>
                            <?php echo $val->po_prno; ?>
                          </td>
                          <td><?php echo $val->po_prname; ?></td>
                          <td>
                            <?php
                              if ( $flag == "p" ) {
                              echo $val->project_name;
                              } else {
                              echo $val->department_title;
                              }
                            ?>
                          </td>
                          <td><?php echo $val->po_vender; ?></td>
                          <td><?php echo $val->po_podate; ?></td>
                          <td class="text-center"><button type="button" class="label bg-green" data-toggle="modal" data-target="#modal_theme_primary<?php echo $val->po_pono; ?>">Check</i></button></td>
                        <?php if ( $val->po_approve == "approve" ) {?>
                          <td class="text-center"><span class="label label-success"><?php echo $val->po_approve; ?></span></td>
                        <?php } elseif ( $val->po_approve == "reject" ) {?>
                          <td class="text-center"><button type="button" class="label bg-orange" data-toggle="modal" data-target="#modal_reject<?php echo $val->po_pono; ?>"><?php if ( $val->po_approve == "reject" ) {echo "reject";}?></button></td>
                        <?php } elseif ( $val->po_approve == "wait" ) {?>
                          <td class="text-center"><span class="label label-info">IN Process</span></td>
                        <?php } elseif ( $val->po_approve == "delete" ) {?>
                          <td class="text-center"><span class="label label-danger">Delete</span></td>
                        <?php }?>
                        <td>
                          <ul class="icons-list">
                              <li><a data-toggle="modal" data-target="#open<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                            <?php if ( $val->po_approve == "approve" || $val->ic_status == "open" || $val->po_approve == "delete") {?>
                              <li class="text-slate"><i class="icon-pencil7"></i></li>
                              <li class="text-slate"><i class="icon-trash"></i></li>

                            <?php } else {?>
                              <li><a class="preload" href="<?php echo base_url(); ?>purchase/editpo/<?php echo $val->po_pono; ?>/normal/<?=$projid;?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
                              <li><a><i id="del<?php echo $val->po_pono; ?>" class="icon-trash"></i></a></li>
                              <?php }?>
                              <li><?php   $this->db->select_sum('poi_netamt');
                  $this->db->where('poi_ref',$val->po_pono);
                  $this->db->where('compcode',$compcode);
                  $num2word = $this->db->get('po_item')->result();
                  foreach ($num2word as $key => $value) {
                    $num2 =  number_format($value->poi_netamt,2);
                    $total2word = numwordsthai($value->poi_netamt);
                  }
                  ?><a href="<?php echo base_url(); ?>report/viewerload?type=po&typ=form&var1=<?php echo $val->po_id;?>&var2=<?php echo $val->po_pono;?>&var3=<?=$compcode;?>&var4=<?=$total2word;?>&var5=<?php echo $projid;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>

                          </ul>
                        </td>
                      </tr>

                        <script type="text/javascript">
                                var pono = '<?php echo $val->po_pono; ?>';
                                $('#del'+pono).click(function(event) {

                                    swal({
                                        title: "Are you sure?",
                                        text: "คุณต้องการลบรายการนี้ใช่ไหม!!",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#EF5350",
                                        confirmButtonText: "ยืนยัน",
                                        cancelButtonText: "ยกเลิก",
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                    },
                                    function(isConfirm){
                                        if (isConfirm) {
                                          var pono = '<?php echo $val->po_pono; ?>';
                                          var prno = '<?php echo $val->po_prno; ?>';
                                          var projectid = '<?=$projid;?>';
                                          var projectcode = '<?=$val->project_code;?>';
                                          $.post('<?php echo base_url(); ?>purchase_active/po_del', {pono: pono, prno: prno, projectid: projectid, projectcode: projectcode}, function(data) {
                                          }).done(function(data) {
                                                var pj = '<?php echo $val->po_project; ?>';
                                                var json = $.parseJSON(data);
                                                var status = json.status;
                                                if(status){
                                                  window.location.href = "<?php echo base_url(); ?>purchase/po_archive_pagination/"+pj+"/p";
                                                  // redirect('purchase/po_archive_pagination/'.$ins['bd_tenid']);
                                                }
                                          });


                                        }
                                        else {
                                            swal({
                                                title: "Cancelled",
                                                text: "ยกเลิกการลบรายการนี้ :)",
                                                confirmButtonColor: "#2196F3",
                                                type: "error"
                                            });
                                        }

                                    });





                                });
                              </script>
                <?php $n++;}?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
<?php foreach ( $getpr as $val2 ) {
  $po_vat = $val2->po_vatper;?>
    <div id="open<?php echo $val2->po_pono; ?>" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title"> #<?php echo $val2->po_pono; ?></h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 content-group">
                <img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="content-group mt-10" alt="" style="width: 120px;" data-pin-nopin="true">
                <!-- <ul class="list-condensed list-unstyled">
                  <li>2269 Elba Lane</li>
                  <li>Paris, France</li>
                  <li>888-555-2311</li>
                </ul> -->
              </div>

              <div class="col-md-6 content-group">
                <div class="invoice-details">
                  <h5 class="text-uppercase text-semibold"> #<?php echo $val2->po_pono; ?></h5>
                  <ul class="list-condensed list-unstyled">
                    <li>Date: <span class="text-semibold"><?php echo date('d/m/Y',strtotime($val2->po_podate)); ?></span></li>
                    <!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
                  </ul>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                  <span class="text-muted">PO No:</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5><?php echo $val2->po_pono; ?></h5></li>
                  </ul>
              </div>

              <div class="col-md-4">
                <span class="text-muted">PR Requsition:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_prname; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">PR No.:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_prno; ?></h5></li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <span class="text-muted">Project/Department:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php
if ( $flag == "p" ) {
 echo $val->project_name;
} else {
 echo $val->department_title;
}
 ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">System:</span>
                <ul class="list-condensed list-unstyled">
                <?php
$system = $val->po_system;
 $this->db->select( '*' );
 $this->db->where( 'systemcode', $system );
 $q   = $this->db->get( 'system' );
 $syt = $q->result();
 foreach ( $syt as $sys ) {
   ?>
					<li><?php echo $sys->systemname; ?></li>
					<?php }?>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <span class="text-muted">Vender:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_vender; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Credit term:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_trem; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Vender Tel:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_contact; ?></h5></li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <span class="text-muted">Contact No:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_contactno; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Quotation:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_quono; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Delivery Day:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo date('d/m/Y',strtotime($val2->po_deliverydate)); ?></h5></li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <span class="text-muted">Delivery Place:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_place; ?></h5></li>
                </ul>
              </div>
              <div class="col-md-4">
                <span class="text-muted">Remark:</span>
                <ul class="list-condensed list-unstyled">
                  <li><h5><?php echo $val2->po_remark; ?></h5></li>
                </ul>
              </div>
            </div>
            <legend class="text-muted"> Detail</legend>
          </div>
          <div class="container-fluid table-responsive">
            <table class="table table-xxs table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cost Code</th>
                  <th>Cost name</th>
                  <th>Material Name</th>
                  <th>Qty</th>
                  <th>Unit</th>
                  <th>Unit Price</th>
                  <th>Amount</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $n = 1;
 $qty= 0;
 $unitprice= 0;
 $amouttot= 0;
 $vattot= 0;
 $whtot= 0;
 $netamt= 0;
 $this->db->select( '*' );
 $this->db->where( 'poi_ref', $val2->po_pono );
 $this->db->where('poi_project',$projid);
 $this->db->where('compcode',$compcode);
 $query = $this->db->get( 'po_item' );
 $resi  = $query->result();
 $n= 1; $n =1; $total=0; $totalamount=0; $vat=0; $totalnetamount=0; $spacialdiscount=0;
 foreach ( $resi as $va ) {
  ?>
                   <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $va->poi_costcode; ?></td>
                    <td><?php echo $va->poi_costname; ?></td>
                    <td><?php echo $va->poi_matname; ?></td>
                    <td><?php echo number_format( $va->poi_qty, 2 ); ?></td>
                    <td><?php echo $va->poi_unit; ?></td>
                    <td><?php echo number_format( $va->poi_priceunit, 2 ); ?></td>
                    <td><?php echo number_format( $va->poi_amount, 2 ); ?></td>
                    <td><?php echo number_format( $va->poi_netamt, 2 ); ?></td>
                  </tr>
                <?php $n++;
 $totalamount=$totalamount+$va->poi_amount;  
 $vat = $vat+$va->poi_vat; 
 $totalnetamount=$totalnetamount+$va->poi_netamt; 
 $spacialdiscount=$spacialdiscount+$va->poi_disce;
 $total = $total+$va->poi_disamt;}?>

              </tbody>
              <tr>
                                <td colspan="7"></td>
                                <td class="text-right"><b>Total Before Tax</b></td>
                                <td class="text-right"><?php echo number_format($totalamount,2);?></td>
                            </tr> 
                            <tr>
                                <td colspan="7"></td>
                                <td class="text-right"><b>Special Discount</b></td>
                                <td class="text-right"><?php echo number_format($spacialdiscount,2);?></td>
                            </tr>  
                            <tr>
                                <td colspan="7"></td>
                                <td class="text-right"><b>Total</b></td>
                                <td class="text-right"><?php echo number_format($total,2);?></td>
                            </tr>  
                            <tr>
                            <tr>
                                <td colspan="7"></td>
                                <td class="text-right"><b>Vat <?php echo $po_vat;?>%</b></td>
                                <td class="text-right"><?php echo number_format($vat,2);?></td>
                            </tr>  
                            <tr>
                                <td colspan="7"></td>
                                <td class="text-right"><b>Total Amount</b></td>
                                <td class="text-right"><b><?php echo number_format($totalnetamount,2);?></b></td>
                            </tr>  
            </table>
            <br>
          </div>
          <div class="modal-footer">
            <?php if ( $val2->po_approve == "approve" ) {?>
              <a class="btn btn-default disabled" href="#" ><i class="icon-pencil7"></i> Edit</a>
            <?php } else {?>
              <a class="btn btn-default" href="<?php echo base_url(); ?>purchase/editpo/<?php echo $val2->po_pono; ?>/normal/<?=$projid;?>" ><i class="icon-pencil7"></i> Edit</a>
            <?php }?>
            <!-- <a class="btn btn-default" href="<?php echo base_url(); ?>report/viewerload?type=po&var1=<?php echo $val2->po_id;?>&var2=<?php echo $val2->po_pono;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i> Print</a> -->
            <button type="submit" class="btn btn-default" data-dismiss="modal"><i class="icon-close2 position-left"></i> Close</button>
          </div>
        </div>
      </div>
    </div>
<?php }?>
<?php foreach ( $getpr as $val2 ) {?>
    <div id="modal_reject<?php echo $val2->po_pono; ?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Reject No. <?php echo $val2->po_pono; ?></h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="form-group">
				<label>หมายเหตุ</label>
				<input type="text" class="form-control" readonly="true" value="<?php echo $val2->reject_remark; ?>">
			</div>
            </div>
        </div>
          <div class="modal-footer">
            <a data-dismiss="modal" class="btn btn-default"><i class="icon-close2"></i> Close</a>
          </div>
        </div>
      </div>
    </div>
    <div id="modal_theme_primary<?php echo $val2->po_pono; ?>" class="modal fade">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header  bg-info ">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <!-- <h5 class="modal-title">PR No.: <?php echo $val2->po_pono; ?></h5> -->
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <h5 for="">PR No.:</h5>
                              <small>
                                  <?php echo $val2->po_pono;?></small>
                              <input type="hidden" class="pr form-control" id="pr" val2="<?php echo $val2->po_pono;?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <h5 for="">PR Date:</h5>
                          <small>
                              <?php echo date('d/m/Y' ,strtotime($val2->po_podate)); ?></small>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <h5 for="">Name :</h5>
                          <small>
                              <?php echo $val2->po_prname;?></small>
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
                        $this->db->where('app_pr', $val2->po_pono);
                        $this->db->where('app_project',$val2->po_project);
                        $q =  $this->db->get('approve_po');
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
<?php }?>
<script type="text/javascript">
  $('#po_purchase').attr('class', 'active');
  $('#archive_po').attr('style', 'background-color:#dedbd8');
</script>