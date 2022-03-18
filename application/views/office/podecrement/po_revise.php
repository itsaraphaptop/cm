<?php $flag = $this->uri->segment( 3 );?>
<!-- Main navbar -->
<div class="page-container">
  <!-- Page content -->
  <div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">

      <!-- Content area -->
      <div class="content">

        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">PO Revise</h5>
          </div>
          <div class="panel-body">
            <div class="loadtable dataTables_wrapper no-footer">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-xxs datatable-basic">
                  <thead>
                    <tr>
                      <th class="text-center">PO No.</th>
                      <th>PR No.</th>
                      <th>Name</th>

                      <th>Vender</th>
                      <th>Date</th>

                      <th class="text-center">Status</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody >
                    <?php $n = 1;foreach ( $rows as $val ) {?>
                    <?php
$this->db->select( '*' );
 $this->db->where( 'poi_ref', $val->po_pono );
 $previse = $this->db->get( 'po_item_revise' )->num_rows();
 ?>
                    <tr>
                      <td class="text-center"><a class="in label label-info"><?php echo $val->po_pono; ?>   Revise : <?php echo $previse; ?> </a></td>
                      <td>
                        <?php echo $val->po_prno; ?>
                      </td>
                      <td><?php echo $val->po_prname; ?></td>

                      <td><?php echo $val->po_vender; ?></td>
                      <td><?php echo $val->po_podate; ?></td>

                      <?php if ( $val->po_approve == "approve" ) {?>
                      <td class="text-center"><span class="label label-success"><?php echo $val->po_approve; ?></span></td>
                      <?php } elseif ( $val->po_approve == "reject" ) {?>
                      <td><span class="label bg-orange" data-toggle="modal" data-target="#modal_reject<?php echo $val->po_pono; ?>"><?php if ( $val->po_approve == "reject" ) {echo "reject";}?></span></td>
                      <?php } else {?>
                      <td class="text-center"><span class="label label-warning">IN Processing</span></td>
                      <?php }?>
                      <td class="text-center">
                        <ul class="icons-list">
                          <li><a href="<?php echo base_url(); ?>purchase/editpo/<?php echo $val->po_pono; ?>/revise" ><i class="icon-pencil7"></i></a></li>
                          <li><a data-toggle="modal" data-target="#open<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                          <li><a href="<?php $base_url = $this->config->item( 'url_report' );
 echo $base_url;?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=<?php echo $reporttype; ?>&pp=<?php echo $val->po_id; ?>&pri=<?php echo $val->po_pono; ?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>

                        </ul>
                      </td>
                    </tr>
                    <?php $n++;}?>
                  </tbody>
                </table>
              </div>
            </div>
            <?php foreach ( $rows as $val2 ) {?>
            <div id="open<?php echo $val2->po_pono; ?>" class="modal fade">
              <div class="modal-dialog modal-full">
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
                            <li>Date: <span class="text-semibold"><?php echo $val2->po_podate; ?></span></li>
                            <!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <span class="text-muted">PO No:</span>
                        <ul class="list-condensed list-unstyled">
                          <li><h5><?php echo $val->po_pono; ?></h5></li>
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
                        <span class="text-muted">System:</span>
                        <ul class="list-condensed list-unstyled">
                          <?php
$system = $val->po_system;
 $this->db->select( '*' );
 $this->db->where( 'systemcode', $system );
 $q   = $this->db->get( 'system' );
 $syt = $q->result();
 foreach ( $syt as $sys ) {?>
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
                          <li><h5><?php echo $val2->po_deliverydate; ?></h5></li>
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
 $qty                             = 0;
 $unitprice                       = 0;
 $amouttot                        = 0;
 $vattot                          = 0;
 $whtot                           = 0;
 $netamt                          = 0;
 $this->db->select( '*' );
 $this->db->where( 'poi_ref', $val2->po_pono );
 // $this->db->where('compcode',$val2->compcode);
 $query = $this->db->get( 'po_item' );
 $resi  = $query->result();
 $n     = 1;foreach ( $resi as $va ) {?>
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
  $qty       = $qty + $va->poi_qty;
  $unitprice = $unitprice + $va->poi_priceunit;
  $amouttot  = $amouttot + $va->poi_amount;
  $netamt    = $netamt + $va->poi_netamt;}?>
                      </tbody>
                      <tr>
                      <th colspan="4" class="text-center">Total</th>
                      <th><?php echo number_format( $qty, 2 ); ?></th>
                      <td></td>
                      <th><?php echo number_format( $unitprice, 2 ); ?></th>
                      <th><?php echo number_format( $amouttot, 2 ); ?></th>
                      <th><?php echo number_format( $netamt, 2 ); ?></th>
                      </tr>
                    </table>
                    <br>
                  </div>
                  <div class="modal-footer">
                    <?php if ( $val2->po_approve == "approve" ) {?>
                    <a class="btn btn-default disabled" href="#" ><i class="icon-pencil7"></i> Edit</a>
                    <?php } else {?>
                    <a class="btn btn-default" href="<?php echo base_url(); ?>purchase/editpo/<?php echo $val->po_pono; ?>" ><i class="icon-pencil7"></i> Edit</a>
                    <?php }?>
                    <a class="btn btn-default" target="_blank" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=<?php echo $reporttype; ?>&pp=<?php echo $val2->po_id; ?>" ><i class="icon-printer4"></i> Print</a>
                    <button type="submit" class="btn btn-default" data-dismiss="modal"><i class="icon-close2 position-left"></i> Close</button>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /dashboard content -->
</div>
<script type="text/javascript">
  $('#po_purchase').attr('class', 'active');
  $('#revise_po').attr('style', 'background-color:#dedbd8');
</script>
