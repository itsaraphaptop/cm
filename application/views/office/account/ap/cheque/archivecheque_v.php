<div class="content-wrapper">
      <div class="page-header">
            <div class="page-header-content">
                  <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Archive Cheque</span></h4>
                  </div>
            </div>
            <div class="breadcrumb-line">
                  <ul class="breadcrumb">
                        <li><i class="icon-home2 position-left"></i> Archive Cheque</li>
                  </ul>
            </div>
      </div>
<div class="content">
<div class="panel panel-flat">
      <div class="panel-heading">
            <h5 class="panel-title">Archive Cheque</h5>
            <div class="heading-elements">
                  <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                  </ul>
            </div>
      </div>

      <div class="panel-body">
            <div class="text-right">

            </div>
      </div>

      <div class="dataTables_wrapper no-footer">
            <div class="table-responsive">
                  <table class="table table-hover table-bordered  table-xxs datatable-basic">
                        <thead>
                              <tr>
                                    <th width="20%" class="text-center">Payment No.</th>
                                    <th width="20%" class="text-center">PO/WO No.</th>
                                    <th width="20%" class="text-center">Due Date</th>
                                    <th width="20%" class="text-center">Remark :</th>
                                    <th width="10%" class="text-center">Actions</th>
                              </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($che as $val) { ?> 
                              <tr>
                                    <td>
                                          <?php echo $val->runno; ?>
                                    </td>
                                    <td>
                                          <?php echo $val->plno; ?> 
                                    </td>
                                    <td>
                                          <?php echo $val->chqdate; ?>
                                    </td>
                                    <td>
                                          <?php echo $val->payno; ?>
                                    </td>
                                    <td>
                                          <ul class="icons-list">
                                                <li><a data-toggle="modal" data-target="#open<?php echo $val->payno; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                                                <li><a href="<?php echo base_url(); ?>ap_cheque/report_che/<?php echo $val->payno; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                                          </ul>
                                    </td>
                              </tr>
                              <?php 
                              }
                               ?>
                        </tbody>
                  </table>
            </div>
      </div>
</div>

<?php foreach ($che as $val2) {?>
<div id="open<?php echo $val2->payno; ?>" class="modal fade">
      <div class="modal-dialog modal-full">
            <div class="modal-content ">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  </div>
                  <div class="modal-body">
                        <div class="row">
                              <div class="col-md-4">
                                    <span class="text-muted">Payment No.</span>
                                    <ul class="list-condensed list-unstyled">
                                          <li><?php echo $val2->runno; ?></li>
                                    </ul>
                              </div>
                              <div class="col-md-4">
                                    <span class="text-muted">Vender :</span>
                                    <ul class="list-condensed list-unstyled">
                                          <li><?php echo $val2->vender_code; ?>&nbsp;&nbsp;&nbsp;<?php echo $val2->vender_name; ?></li>
                                    </ul>
                              </div>
                              <div class="col-md-4">
                                    <span class="text-muted">Remark :</span>
                                    <ul class="list-condensed list-unstyled">
                                          <li><?php echo $val2->remark; ?></li>
                                    </ul>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-4">
                                    <span class="text-muted">Bank :</span>
                                    <ul class="list-condensed list-unstyled">
                                          <li><?php echo $val2->bank_name; ?></li>
                                    </ul>
                              </div>
                              <div class="col-md-4">
                                    <span class="text-muted">Branch :</span>
                                    <ul class="list-condensed list-unstyled">
                                          <li><?php echo $val2->branch_name; ?></li>
                                    </ul>
                              </div>
                              <div class="col-md-4">
                                    <span class="text-muted"># :</span>
                                    <ul class="list-condensed list-unstyled">
                                          <li><?php echo $val2->account_code; ?></li>
                                    </ul>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-4">
                                    <span class="text-muted">Cheque No :</span>
                                    <ul class="list-condensed list-unstyled">
                                          <li><?php echo $val2->chqno; ?></li>
                                    </ul>
                              </div>
                              <div class="col-md-4">
                                    <span class="text-muted">Chq.Date :</span>
                                    <ul class="list-condensed list-unstyled">
                                          <li><?php echo $val2->chqdate; ?></li>
                                    </ul>
                              </div>
                        </div>
                        <div class="container-fluid table-responsive">
                              <table class="table table-xxs table-bordered">
                                    <thead>
                                    <tr>

                                          <th class="text-center">Pre Payment No.</th>
                                          <th class="text-center">Due Date</th>
                                          <th class="text-center">PO/WO No.</th>
                                          <th class="text-center">Tax/Inv. No.</th>
                                          <th class="text-center">Paid Net Amount</th>
                                          <th class="text-center">Amount</th>
                                          <th class="text-center">VAT</th>
                                          <th class="text-center">W/T Amount</th>
                                          <th class="text-center">W/T FR.</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                          <td><?php echo $val2->runno; ?></td>
                                          <td></td>
                                          <td><?php echo $val2->plno; ?></td>
                                          <td></td>
                                          <td><?php echo number_format($val2->payamt,2); ?></td>
                                          <td><?php echo number_format($val2->payamt,2); ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                    </tr>

                                    </tbody>
                                    <tfooter>
                                    <th colspan="4" class="text-center">Paid Amount</th>
                                    <th colspan="5"><?php echo number_format($val2->paynet,2); ?></th>
                                    </tfooter>

                              </table>
                              <br>
                              <div class="modal-footer">
                                  <a class="btn btn-default" href="<?php echo base_url(); ?>ap_cheque/report_che/<?php echo $val2->payno; ?>" ><i class="icon-printer4"></i> Print</a>  
                                  <button type="submit" class="btn btn-default" data-dismiss="modal"><i class="icon-close2 position-left"></i> Close</button>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<?php } ?>