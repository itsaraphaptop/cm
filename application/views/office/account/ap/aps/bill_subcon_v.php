<div class="content">
  <div class="row">
    <form id="wopost" method="post" action="<?php echo base_url(); ?>aps_active/description_aps">
    <div class="col-md-9">
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"></h5>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
          <div class="panel-body">
            <div class="row">

             <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Work Order</label>
                    <div class="input-group input-group-sm">
                      <span class="input-group-btn">
                        <a class="openlo btn btn-info btn-sm" data-toggle="modal" data-target="#openlo"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Work Order No.</a>
                      </span>
                      <input type="text" class="form-control input-sm" readonly="readonly" id="ap_bill_contractno" name="ap_bill_contractno" placeholder="เลขที่หนังสือสั่งจ้าง">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                    <label>Subcontractor</label>
                    <input type="text" class="form-control input-sm"  readonly="readonly" id="ap_bill_vendername" name="ap_bill_vendername" >
                    <input type="hidden" class="form-control input-sm"  readonly="readonly" id="ap_bill_vender" name="ap_bill_vender" >
                 </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Project Name</label>
                    <input type="text" class="form-control input-sm" readonly="readonly" id="ap_bill_projectname" name="ap_bill_projectname" >
                    <input type="hidden" class="form-control input-sm" readonly="readonly" id="ap_bill_project" name="ap_bill_project" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Description </label>
                    <input type="text" class="form-control input-sm" readonly="readonly"  id="ap_contracttype" name="ap_contracttype">
                  </div>
                </div>
              </div>
              <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label>system</label>
                    <input type="text" class="form-control input-sm" readonly="readonly" id="ap_bill_systemname" name="ap_bill_systemname" >
                    <input type="hidden" class="form-control input-sm" readonly="readonly" id="ap_bill_systemcode" name="ap_bill_systemcode" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                  <label>Type Of Billing</label>
                    <select class="form-control input-sm"   id="ap_bill_type" name="ap_bill_type">
                      <option value="0"></option>
                      <option value="1">Progress Payment</option>
                      <option value="2">Down</option>
                      <option value="3">Retention</option>
                    </select>
                  <input type="hidden" class="form-control input-sm" readonly="readonly"   id="ap_bill_typee" name="ap_bill_typee">
                  </div>
                </div>
                <div class="col-md-3">
                  <label>&nbsp;</label>
                  <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                      <a class="detailreten btn btn-info btn-sm" data-toggle="modal" data-target="#detailreten"><span class="icon-folder-open" aria-hidden="true"></span> History Payment</a>
                    </span>&nbsp;&nbsp;
                    <span class="input-group-btn">
                      <a class="alllo btn btn-primary btn-sm" data-toggle="modal" data-target="#printlo"><span class="icon-printer4" aria-hidden="true"></span> Print</a>
                    </span>
                  </div>
                </div>
              </div>
              <div id="progress_history"></div>
              <div id="progresspayment">
              <hr>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Period </label>
                      <input type="text" class="form-control input-sm text-center" readonly="readonly"   id="ap_period" name="ap_period" ><!-- จากแต่ละงวด -->
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Billing No.</label>
                      <input type="text" class="form-control input-sm"  id="ap_bill_code" name="ap_bill_code" value="" readonly="true">
                    </div><!-- code gen -->
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Billing Date</label>
                      <input type="date" class="form-control input-sm"  id="ap_bill_date" name="ap_bill_date" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Delivery Date</label>
                      <input type="date" class="form-control input-sm"  id="ap_bill_duedate" name="ap_bill_duedate" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Invoice No:</label>
                      <input type="text" class="form-control input-sm"  id="ap_bill_inv" name="ap_bill_inv" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="checkbox">
                      <br>
                      <label><input type="checkbox" name="ap_bill_tax" id="ap_bill_tax" value="0" >Tax No</label>
                      <input type="hidden" name="ap_bill_taxin" id="ap_bill_taxin" value="N" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Invoice Date</label>
                      <input type="text" class="form-control input-sm daterange-single"  id="ap_bill_invdate" name="ap_bill_invdate" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Cradit Term</label>
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control input-sm"  id="ap_bill_crtermheader" name="ap_bill_crterm" >
                      <span class="input-group-addon bg-primary">Days</span>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label>Pay to</label>
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control input-sm" readonly="readonly" id="ap_paytoname" name="ap_paytoname" >
                      <input type="hidden" class="form-control input-sm" readonly="readonly" id="ap_payto" name="ap_payto" >
                      <span class="input-group-btn">
                        <button type="button" data-toggle="modal" data-target="#payto"  class="payto btn btn-info btn-icon "><i class="icon-search4"></i></button>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Progress This Period</label>
                        <input type="text" class="form-control input-sm text-right"  id="ap_pay" name="ap_pay"  value="0" style="border: 2px solid red; border-radius: 4px;">
                      </div><!-- เงินงวดนี้ที่ต้องจ่าย -->
                    </div>
                    <div class="col-md-2">
                      <label>&nbsp;</label>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control input-sm text-right"  id="ap_payper" name="ap_payper" value="0">
                        <span class="input-group-addon bg-info">%</span>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Deduct Materal</label>
                          <input type="text" class="form-control input-sm text-right" readonly  id="ap_deduct" name="ap_deduct"  value="0" >
                        </div><!-- เงินงวดนี้ที่ต้องจ่าย -->
                    </div>
                </div>
                 <div class="row">
                    <div class="form-group">
                      <a type="button" class="label label-primary dropdown-toggle" id="otherbymat">Less Material P/O</a>
                      <a type="button" class="label label-primary dropdown-toggle" id="otherby">Less Other</a>
                      <a id="chkprice" class="label label-primary dropdown-toggle">Calculate</a>       
                    </div>
                  </div>
              </div>

         




              <div class="row table-responsive text-size-mini" id="lessmat">
                  <div class="col-md-12">
                    <div class="form-group">
                      <table class="table table-bordered table-striped table-xxs">
                        <thead>
                          <tr>
                            <th><div style="width: 100px;">P/O No.</div></th>
                            <th><div style="width: 100px;">Material</div></th>
                            <th><div style="width: 100px;">Receive Qty</div></th>
                            <th><div style="width: 100px;">Price Qty</div></th>
                            <th><div style="width: 150px;">Type</div></th>
                            <th><div style="width: 80px;">Deduct Qty</div></th>
                            <th><div style="width: 100px;">Price Sub</div></th>
                            <th><div style="width: 100px;">Amount</div></th>
                            <th>Remark</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="detailpo">
                        </tbody>
                        <tr>
                          <td colspan="3">TOTAL</td>
                          <td><input type="text" readonly class="total form-control input-sm text-right" id="sumpriceqty"  value="" /></td>
                          <td></td>
                          <td><input type="text" id="deductqty" readonly class="total form-control input-sm text-right"  value="" /></td>
                          <td><input type="text" id="pricesum" readonly class="total form-control input-sm text-right"  value="" /></td>
                          <td><input type="text" id="deduct_amountsum" readonly class="total form-control input-sm text-right"  value="" /></td>
                          
                          <td colspan="2"></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="col-sm-6" >
                    <div class="form-group">
                      <a type="button" id="rtmodal" class="label label-info dropdown-toggle" data-toggle="modal" data-target="#rtpo">Retrive</a>
                       <a type="button" id="deduct_type_button" class="label label-success dropdown-toggle">Calculate Deduct Material/Less Other</a>
                        <a type="button" id="refrest_deduct_type_button" class="label label-danger dropdown-toggle">Refrest</a>
                    </div>
                  </div>
                 
              </div>

              <div id="rtpo" class="modal fade">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <button type="button" class="close" data-dismiss="modal">×</button>
                      <h6 class="modal-title">Ref. PO</h6>
                    </div>
                    <div class="modal-body">
                      <div id="refpomodal"></div>
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>
              <script>
                $('#rtmodal').click(function(event) {
                  var ref = $('#ap_bill_contractno').val();

                  $('#refpomodal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                  $('#refpomodal').load('<?php echo base_url(); ?>share/modalrefpo/'+ref);
                });
              </script>
              <div id="loadwo" class="modal fade">
                <div class="modal-dialog modal-full">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <button type="button" class="close" data-dismiss="modal">×</button>
                      <h6 class="modal-title">Ref. PO</h6>
                    </div>

                    <div class="modal-body">
                      <div id="detail_po"></div>
                    </div>

                    <div class="modal-footer">
      
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row" id="lessot">
                <div class="col-md-12">
                  <div class="form-group">
                    <table class="table table-bordered text-size-mini table-striped table-xxs">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th><div style="width: 200px;">Less Other</div></th>
                          <th>Amount</th>
                          <th>Remark</th>
                          <th>Ref. Item</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="body">
                      </tbody>
                      <tr>
                        <td colspan="2">TOTAL</td>
                        <td ><input type="text" readonly class="total form-control input-sm" id="sumtotal" value="" /></td>
                        <td colspan="3"></td>
                      </tr>
                    </table>
                    <!-- <a type="button" class="btn btn-primary btn-block btn-icon btn-rounded  dropdown-toggle" id="sumlessother" onclick="tt()">Total</a> -->
                    <div class="rowmat">
                    </div>
                  </div>
                </div>
                <div class="col-sm-2" id="lessot2">
                  <a type="button" class="label label-primary dropdown-toggle" id="insless">Add Row</a>
                  
                </div>
              </div>
                <div id="table" hidden="">
                      <div class="col-md-12">
                        <div class="row">
                          <br><br><br>
                          <div class="table-responsive">
                            <table class="table table-bordered table-striped table-xxs">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Material Code</th>
                                  <th>Material Name</th>
                                  <th>Cost Code</th>
                                  <th>Cost Name</th>
                                  <th>Description</th>
                                  <th>Remark 1</th>
                                  <th>Asset Code</th>
                                  <th>Qty</th>
                                  <th>Unit</th>
                                  <th>Price</th>
                                  <th>Amount</th>
                                  <th>Balance</th>
                                  <th>This Qty</th>
                                  <th>This Amout</th>
                                  <th>Previous Qty</th>
                                  <th>Previous Amount</th>
                                  <th>Remark 2</th>
                                  <th>Remark 3</th>
                                </tr>
                              </thead>
                              <tbody id="body">
                                <tr id="nodata">
                                  <td colspan="21" class="text-center">No Data</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
            </div><!-- end -->
            <br>
            <div class="col-xs-12 text-right">
                   <button type="button" name="checkboxaverage" id="checkboxaverage" class="btn btn-primary">Enter Detail</button>
                  <button type="button" id="savepost" class="btn btn-success"><i class="icon-box-add"></i> Save </button>
                </div>
              
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">

							<div class="panel-group panel-group-control panel-group-control-right content-group-lg" id="accordion-control-right">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
                      <a class="collapse" data-toggle="collapse" data-parent="#accordion-control-right" href="#accordion-control-right-group1">Work Order Detail</a>
										</h6>
									</div>
									<div id="accordion-control-right-group1" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Data Type</label>
                              <input type="text" class="form-control input-sm" readonly="readonly" id="ap_bill_datatype" name="ap_bill_datatype" value="Normal">
                            </div>
                          </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contract Amount</label>
                            <input type="text" class="form-control input-sm" readonly="readonly"  id="ap_contractamount" name="ap_contractamount" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Progress Amount</label>
                            <input type="text" class="form-control input-sm" readonly="readonly"  id="ap_progressamount" name="ap_progressamount" value="0"><!-- ราคาที่จ่ายไปแล้ว -->
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Advance</label>
                          <div class="input-group input-group-sm">
                            <input type="text" class="form-control input-sm" readonly="readonly"  id="ap_advanceper" name="ap_advanceper" >
                            <span class="input-group-addon">%</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Adv. Amount</label>
                              <input type="text" class="form-control input-sm" readonly="readonly"  id="ap_advanceamount" name="ap_advanceamount" >
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Retention</label>
                          <div class="input-group input-group-sm">
                            <input type="text" class="form-control input-sm" readonly="readonly"  id="ap_retentionper" name="ap_retentionper" >
                            <span class="input-group-addon">%</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>&nbsp;</label>
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" readonly="readonly"  id="ap_retentionamount" name="ap_retentionamount" >
                          </div>
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label>From</label>
                          <div class="form-group">
                            <input type="text" class="form-control" readonly="readonly"  id="ap_frome" name="ap_frome" >
                            <input type="hidden" class="form-control" readonly="readonly"  id="ap_frome1" name="ap_frome1" >
                          </div>
                        </div>
                      </div>
                    </div>
									</div>
								</div>

								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion-control-right" href="#accordion-control-right-group2">Progress Detail</a>
										</h6>
									</div>
									<div id="accordion-control-right-group2" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Progress (Bill)</label>
                            <input type="text" class="form-control input-sm" readonly="readonly"   id="ap_progress_bill" name="ap_progress_bill" ><!-- ราคาที่จ่ายไปแล้ว -->
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>&nbsp;</label>
                          <div class="input-group input-group-sm">
                            <input type="text" class="form-control input-sm" readonly="readonly"   id="ap_progress_billper" name="ap_progress_billper" >
                            <span class="input-group-addon bg-info">%</span><!-- ราคาที่จ่ายไปแล้วกี่เปอร์เซ็น -->
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Advance (Bill)</label>
                            <input type="text" class="form-control input-sm" readonly="readonly"   id="ap_advance_bill" name="ap_advance_bill" ><!-- รวมจาก ประเภทรับวางบิล Down-->
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Retention(Progress)</label>
                              <input type="text" class="form-control input-sm" readonly="readonly"   id="ap_retention_progress" name="ap_retention_progress" value="0"><!-- รวมจาก หักเงิน Rat. -->
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Retention (ACC)</label>
                            <input type="text" class="form-control input-sm" readonly="readonly"  id="ap_retention_acc" name="ap_retention_acc" ><!-- Restention จ่ายคืน -->
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Ret. (Balance)</label>
                            <input type="text" class="form-control input-sm" readonly="readonly"  id="ap_retention_balance" name="ap_retention_balance" > <!-- Restention (Progress) ลบ Restention (ACC) -->
                          </div>
                        </div>
                      </div>
                    </div>
									</div>
								</div>

								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordion-control-right" href="#accordion-control-right-group3">Summary Detail</a>
										</h6>
									</div>
                  <div id="accordion-control-right-group3" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div id="delall">
                          <div class="row">
                            <div class="col-md-6">
                              <label>Down</label>
                              <div class="input-group input-group-sm">
                                <input type="text" class="form-control input-sm"  id="ap_redown" name="ap_redown" value="0">
                                <span class="input-group-addon bg-info">%</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>&nbsp;</label>
                                <input type="text" class="form-control input-sm"  id="ap_redownper" name="ap_redownper" value="0">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                <label>Vat</label>
                                <div class="input-group input-group-sm">
                                  <input type="text" class="form-control input-sm"  id="ap_vat" name="ap_vat" value="0">
                                  <span class="input-group-addon bg-info">%</span>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label>&nbsp;</label>
                                <div class="form-group">
                                  <input type="text" class="form-control input-sm"  id="ap_vatper" name="ap_vatper" value="0">
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label>Retention.</label>
                              <div class="input-group input-group-sm">
                                <input type="text" class="form-control input-sm"  id="ap_deduct_ret" name="ap_deduct_ret" value="0">
                                <span class="input-group-addon bg-info">%</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>&nbsp;</label>
                                <input type="text" class="form-control input-sm" id="ap_deduct_retper" name="ap_deduct_retper" value="0">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>W/T</label>
                                <select class="form-control input-sm" id="ap_wt" name="ap_wt">
                                  <?php
                                  $this->db->select('*');
                                  $this->db->from('setupwt');
                                  $data = $this->db->get()->result();
                                  foreach ($data as $key => $datawt) {
                                  
                                  ?>
                                  <option value="<?= $datawt->per_wt; ?>"><?= $datawt->name_wt ?></option>

                                    <script>
                                    $('#ap_wt').change(function(event) {
                                      var ap_wt = $('#wtper').val();
                                      $('#ap_wtper').val('<?= $datawt->per_wt; ?>');
                                      $('#ap_wtamount').val("0");
                                    });
                                  </script>
                                  <?php } ?> 


                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label>&nbsp;</label>
                              <div class="input-group input-group-sm">
                                <input type="text" class="form-control input-sm"  id="ap_wtper" name="ap_wtper" value="0">
                                <span class="input-group-addon bg-info">%</span>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label>&nbsp;</label>
                              <div class="form-group">
                                <input type="text" class="form-control input-sm"  id="ap_wtamount" name="ap_wtamount" value="0">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label>Amount</label>
                              <div class="input-group input-group-sm">
                                <input type="text" class="form-control text-right"  id="ap_amount" name="ap_amount" value="" readonly="readonly">
                              </div>
                              <br>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label>Less Other<a type="button" href="<?php echo base_url(); ?>ap/lessother" class="label bg-success heading-text"  target="_blank">Setup</a></label>
                              <div class="input-group input-group-sm">
                                <input type="text" class="form-control text-right"  id="ap_amountdown" name="ap_amountdown" value="0" readonly="readonly">
                              </div>
                              <br>
                            </div>
                            <div class="col-md-6">
                              <label>Net Amount</label>
                              <div class="input-group input-group-sm">
                                <input type="text" class="form-control text-right"  id="ap_amount2" name="ap_amount2" value="0" readonly="readonly">
                              </div>
                              <br>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="form-group">
                              <a type="button" class="label label-primary dropdown-toggle" id="otherbymat">Less Material P/O</a>
                              <a type="button" class="label label-primary dropdown-toggle" id="otherby">Less Other</a>
                              <a id="chkprice" class="label label-primary dropdown-toggle">Calculate</a>       
                            </div>
                          </div>
                        </div>
                          <script>
                            $('#lessot').hide();
                            $('#otherby').click(function(){
                              $('#lessot').show();
                            });
                            $('#lessmat').hide();
                            $('#otherbymat').click(function(){
                              $('#lessmat').show();
                            });
                            </script>
                            <div class="row">
                                    <div class="col-md-12">
                                      <label>Detail :</label>
                                      <div class="input-group">
                                        <textarea class="form-control input-sm"  id="ap_remark" name="ap_remark" cols="150"></textarea>
                                      </div>
                                      <br>
                                    </div>
                                    
                                    <div id="endetail">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label>Pay Date</label>
                                            <input type="date" class="form-control input-sm"  id="ap_paydate" name="ap_paydate" value="<?=date("Y-m-d");?>">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <label>&nbsp;</label>
                                          <div class="form-group">
                                            <input type="text" class="form-control input-sm" readonly="readonly"  id="" name="" value="Average Amout/Qty">
                                            <input type="hidden" class="form-control input-sm" id="numlodetail" name="numlodetail">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <a name="checkboxaverage" id="checkboxaverage" class="btn btn-primary btn-block"  style="margin-top:25px;" >Enter Detail</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                  </div>
                                



                        </div>
                    </div>
									</div>
								</div>
							</div>

      <!--  -->
    </div>

  
    
      
    </form>
  </div>
</div>
        <!-- Full width modal -->
        <div id="openlo" class="modal fade" data-backdrop="false">
          <div class="modal-dialog modal-full">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Select Bill</h5>
              </div>
              <div class="modal-body">
                <div id="loadlo">
                </div>
              </div>
              <br>
              <div class="modal-footer">
                <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="payto">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Vender</h4>
              </div>
              <div class="modal-body">
                <div id="open_payto">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end modal -->
        <script>
        $(".openlo").click(function(){
        $('#loadlo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#loadlo").load('<?php echo base_url(); ?>aps_active/load_bill_subcon_v');
        });
        $(".payto").click(function(event) {
        $("#open_payto").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#open_payto").load('<?php echo base_url(); ?>share/vender')
        });
        </script>
        <script>
        $('#ap_bill_tax').click(function(){
        if($('#ap_bill_tax').prop('checked')) {
        $("#ap_bill_taxin").val('Y');
        }else{
        $("#ap_bill_taxin").val('N');
        }
        });
        </script>

        <script>
        $("#ap_pay,#ap_deduct,#ap_deduct_ret,#ap_vat,#ap_redown,#ap_wtper").keyup(function(event) {
        
        var amt = $("#ap_contractamount").val();
        var vat = parseFloat($("#ap_pay").val());
        var ap_deduct = parseFloat($("#ap_deduct").val());
        var ap_pay = parseFloat($("#ap_pay").val());
        var ap_progressamount = parseFloat($("#ap_progressamount").val());
        var ap_progress_bill = parseFloat($("#ap_progress_bill").val());
        var totalamt = amt-ap_progress_bill;
        var vattot = (vat*100)/amt;
        var tt = vattot.toFixed(2);
        $("#ap_payper").val(tt);
        console.log(tt);
        var ap_deduct = $('#ap_deduct').val();
        var appay_deduct = ap_pay;
        var ap_redown = $("#ap_redown").val();
        var vattotxxxx = (appay_deduct*ap_redown)/100;
        var ddxxxx = vattotxxxx.toFixed(2);
        $("#ap_redownper").val(ddxxxx);

        var ap_vat = parseFloat($("#ap_vat").val());
        var ap_frome = $("#ap_frome").val();
        var zz = $("#ap_deduct_ret").val();
        var ap_vatper = parseFloat($("#ap_vatper").val());
        var bobb = appay_deduct;
        var bobb1 = (bobb*zz)/100;
        var notttt1 = (((bobb*ap_vat)/100)+bobb)*zz/100;
        var nottttt = notttt1.toFixed(4);
        if ($("#ap_frome1").val()==1) {
        var c =  bobb1;
        }else if ($("#ap_frome1").val()==2){
        var c = notttt1;
        }


        if ($("#ap_frome1").val()==1) {
        $("#ap_deduct_retper").val(bobb1);
        }else if ($("#ap_frome1").val()==2){
        $("#ap_deduct_retper").val(parseFloat(notttt1));
        }
        
        
        var ap_pay = $("#ap_pay").val();
        var ap_redownper = $("#ap_redownper").val();
        var ap_vat = $("#ap_vat").val();
        var vatbob = (ap_pay-ap_redownper)*ap_vat/100;
        var bb = vatbob.toFixed(2);
        $("#ap_vatper").val(bb);
        
        var ap_redownper = $("#ap_redownper").val();
        var ap_wtper = $("#ap_wtper").val();
        var vvvv = (appay_deduct-ap_redownper)*ap_wtper/100;
        var xxxx = vvvv.toFixed(2);
        $("#ap_wtamount").val(xxxx);
        
        var ap_amountdown = parseFloat($("#ap_amountdown").val());

        $('#ap_amount').val(((((appay_deduct-ddxxxx)+vatbob)-c)-vvvv));
        $('#ap_amount2').val((((((appay_deduct-ddxxxx)+vatbob)-c)-vvvv)-ap_amountdown));

        var ap_retention_progress = parseFloat($('#ap_retention_progress').val());
        var ap_retention_acc = parseFloat($('#ap_retention_acc').val());
        var total_re = ap_retention_progress-ap_retention_acc;
        var ap_bill_typee = parseFloat($('#ap_bill_typee').val());

       if(ap_bill_typee=="1"){
        if (vat>totalamt){
        swal({
        title: "ยอดเงินเกิน กรุณาทำรายการใหม่ !",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#ap_pay").val(0);
        $("#ap_payper").val(0);
        $("#ap_redownper").val(0);
        $("#ap_vatper").val(0);
        $("#ap_deduct_retper").val(0);
        $("#ap_wtamount").val(0);
        $("#ap_amount").val(0);
        $("#ap_amount2").val(0);
        }

        }
      


       if(ap_bill_typee=="3"){
        if (vat>total_re){
        swal({
        title: "ยอดเงินเกิน กรุณาทำรายการใหม่ !",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#ap_pay").val(0);
        $("#ap_payper").val(0);
        $("#ap_redownper").val(0);
        $("#ap_vatper").val(0);
        $("#ap_deduct_retper").val(0);
        $("#ap_wtamount").val(0);
        $("#ap_amount").val(0);
        $("#ap_amount2").val(0);
        }
      }
      
        
        });
        
        $("#ap_payper,#ap_redownper,#ap_vatper,#ap_deduct_retper,#ap_wtamount").keyup(function(event) {
          var ap_pay = parseFloat($("#ap_pay").val());
          var ap_deduct = parseFloat($('#ap_deduct').val());
          var appay_deduct = ap_pay-ap_deduct;

          var ap_contractamount = parseFloat($('#ap_contractamount').val());
          var ap_progress_bill = parseFloat($("#ap_progress_bill").val());
          var totalamt = ap_contractamount-ap_progress_bill;

          var ap_payper = parseFloat($('#ap_payper').val());
          var totalper = ((ap_contractamount*ap_payper)/100).toFixed(2);
          $('#ap_pay').val(totalper);

          var ap_redownper = parseFloat($('#ap_redownper').val());
          var ap_redown = ((ap_redownper*100)/appay_deduct).toFixed(2);  
          $('#ap_redown').val(ap_redown);

          var ap_vatper =  parseFloat($('#ap_vatper').val());    
          var ap_vatb = ((ap_vatper*100)/appay_deduct).toFixed(2);
          $('#ap_vat').val(ap_vatb);

          var ap_deduct_retper = parseFloat($('#ap_deduct_retper').val());    
          var ap_deduct_retperb = ((ap_deduct_retper*100)/appay_deduct).toFixed(2);
          $('#ap_deduct_ret').val(ap_deduct_retperb);

          var ap_wtamount = parseFloat($('#ap_wtamount').val());
          var ap_wtamountb = ((ap_wtamount-ap_redownper*100)/appay_deduct).toFixed(2);
          $('#ap_wtper').val(ap_wtamountb);
        });
        </script>
        <script>
        $("#progresspayment").hide();
        </script>
<script type="text/javascript">
$('#account_i').attr('class', 'active'); 
$('#prograss').attr('style', 'background-color:#dedbd8');
</script>
 <script>
  $('#refrest_deduct_type_button').hide();

  $('#refrest_deduct_type_button').click(function(event) {
  $('#deduct_type_button').show();
  $('#rtmodal').show();
  $('#refrest_deduct_type_button').hide();

  $('#ap_amountdown').val("0");
  $('#ap_deduct').val("0");
  });
</script>
  <script type="text/javascript" >
              $(document).on("change", ".ttotal", function() {
                var sum = 0;
                $(".ttotal").each(function(){
                  sum += +parseFloat($(this).val());
                });
                $(".total").val(sum);
                $('#ap_amountdown').val(sum);
              });
              </script>
              <script>
                $("#insless").click(function(){
                  addrow();
                });
                function addrow() {
                  var row = ($('#body tr').length)-0+1;
                  var tr = '<tr id="'+row+'">'+
                    '<td class="text-center">'+row+'<input type="hidden" name="xor[]" id="xor" class="form-control input-sm" readonly="true" value="" request><input type="hidden" name="ac[]" id="ac'+row+'" class="form-control input-sm" readonly="true" value="" request></td>'+
                    '<td width="20%"><div class="input-group input-group-sm"><input type="text" name="bd_jobno[]" id="bd_jobno'+row+'" class="form-control input-sm" readonly="true"><span class="input-group-btn"><a class="unitic'+row+' btn btn-info btn-sm" data-toggle="modal" data-target="#openunit'+row+'"><span class="glyphicon glyphicon-search"></span> </a></span></div></td>'+
                    '<td><input type="text" name="bd_amount[]" id="bd_amount" class="ttotal form-control input-sm" style="text-align:right;"></td>'+
                    '<td width="20%"><input type="text" name="bd_remark[]" id="bd_remark'+row+'" class="form-control input-sm"></td>'+
                    '<td width="20%"><input type="text" name="bd_refitem[]" id="bd_refitem'+row+'" class="form-control input-sm"></td>'+
                    '<td>'+
                      '<a id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                    '</td>'+
                  '</tr>';
                  $('#body').append(tr);
                  var rowmat = '<div class="modal fade" id="openunit'+row+'" data-backdrop="false">'+
                    '<div class="modal-dialog">'+
                      '<div class="modal-content">'+
                        '<div class="modal-header bg-info">'+
                          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                          '<h4 class="modal-title" id="myModalLabel">Less Other</h4>'+
                        '</div>'+
                        '<div class="modal-body">'+
                          '<div id="modal_unitic'+row+'"></div>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>';
                  $('.rowmat').append(rowmat);
                  $(".unitic"+row+"").click(function(){
                    $('#modal_unitic'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                    $("#modal_unitic"+row+"").load('<?php echo base_url(); ?>share/modallessother/'+row+'');
                  });

                  $(document).on('click', 'a#remove'+row+'', function () { // <-- changes
                      var self = $(this);
                      noty({
                        width: 200,
                        text: "Do you want to Delete?",
                        type: self.data('type'),
                        dismissQueue: true,
                        timeout: 1000,
                        layout: self.data('layout'),
                        buttons: (self.data('type') != 'confirm') ? false : [
                          {
                          addClass: 'btn btn-primary btn-xs',
                          text: 'Ok',
                          onClick: function ($noty) { //this = button element, $noty = $noty element
                            $noty.close();
                            self.closest('tr').remove();
                            noty({
                              force: true,
                              text: 'Deleteted',
                              type: 'success',
                              layout: self.data('layout'),
                              timeout: 1000,
                            });
                          }
                        },{
                        addClass: 'btn btn-danger btn-xs',
                        text: 'Cancel',
                          onClick: function ($noty) {
                            $noty.close();
                            noty({
                              force: true,
                              text: 'You clicked "Cancel" button',
                              type: 'error',
                              layout: self.data('layout'),
                              timeout: 1000,
                            });
                          }
                        }
                        ]
                      });
                      return false;
                  });

                  calculateSum();
                  $(".txt").on("keydown keyup", function() {
                    calculateSum();
                  });
                  function calculateSum() {
                    var sum = 0;
                    //iterate through each textboxes and add the values
                    $(".txt").each(function() {
                      //add only if the value is number
                      if (!isNaN(this.value) && this.value.length != 0) {
                        sum += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                      }else if (this.value.length != 0){
                        $(this).css("background-color", "red");
                      }
                    });
                    $("input#totalresue").val(sum.toFixed(2));
                  }
                }
                
                $("#savepost").click(function(){
                  var ap_bill_date = $("#ap_bill_date").val();
                  var ap_bill_duedate = $("#ap_bill_duedate").val();
                  var ap_paydate = $("ap_paydate").val();
                  if(ap_bill_date==""){
                    swal({
                        title: "Please Check",
                        text: "Billing Date",
                        // confirmButtonColor: "#66BB6A",
                        type: "warning"
                    });
                    $("#ap_bill_date").focus();
                  }else if(ap_bill_duedate==""){
                    swal({
                         title: "Please Check",
                        text: "Delivery Date",
                        // confirmButtonColor: "#66BB6A",
                        type: "warning"
                    });
                    $("#ap_bill_duedate").focus();
                  }else if(ap_paydate==""){
                     swal({
                         title: "Please Check",
                        text: "AP Paydate",
                        // confirmButtonColor: "#66BB6A",
                        type: "warning"
                    });
                    $("#ap_paydate").focus();
                  }else{
                    $("#wopost").submit();
                  }

                });
              //  $(document).ready(function(){
                 $("#ap_bill_type").prop('disabled',true);
              //  });
              </script>