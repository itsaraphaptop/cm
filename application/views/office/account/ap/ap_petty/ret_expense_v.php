<div id="gl" class="table-responsive">
<table class="table table-hover table-bordered table-striped table-xxs">
    <thead>
      <tr>
        <th class="text-center" >No.</th>
        <th class="text-center" width="20%">Expenses Subject</th>
        <th class="text-center">Company/Partnership/Stores/Other</th>
        <th class="text-center">Cost Code</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Vat %</th>
        <th class="text-center">Vat Amount</th>
        <th class="text-center">W/T Amount</th>
        <th class="text-center">Net Amount</th>
        <th class="text-center">Tax No</th>
        <th>Active</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($pe as $ex) {  ?>
      <tr>
      <td><input type="text" readonly="true" style="color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue; text-align: center; width: 30px;" value="<?php echo $i; ?>" name="no" ></td>
      <td><input type="hidden" name="ex_expenscode[]" id="ex_expenscode<?php echo $i;?>" value="<?php echo $ex->pettycashi_expenscode; ?>"><?php echo $ex->pettycashi_expens; ?></td>
      <td>
        <input type="hidden" name="ex_vender[]" id="ex_vender<?php echo $i;?>" value="<?php echo $ex->pettycashi_vender; ?>">
        <input type="hidden" name="ex_venderid[]" id="ex_venderid<?php echo $i;?>" value="<?php echo $ex->ven_id; ?>">
        <a data-toggle="modal" data-target="#open<?php echo $ex->pettycashi_id; ?>" data-popup="tooltip" title="" data-original-title="Open"><?php echo $ex->pettycashi_vender; ?></a>
      </td>
      <div id="open<?php echo $ex->pettycashi_id; ?>" class="modal fade" data-backdrop="false">
        <div class="modal-dialog modal-full">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Petty Cash No.: <?php echo $ex->docno; ?></h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-1">
                  <label>Subject Code:</label>
                  <div class="form-group">
                    <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_expenscode; ?>">
                  </div>
                </div>

                <div class="col-md-3">
                  <label>Subject Code:</label>
                  <div class="form-group">
                    <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_expens; ?>">
                  </div>
                </div> 

                <div class="col-md-2">
                  <label>Cost Code:</label>
                  <div class="form-group">
                    <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_costcode; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Company/Partnership/Stores/Other </label>
                  <div class="form-group">
                    <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_vender; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Address</label>
                  <div class="form-group">
                    <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_addrvender; ?>">
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-md-6">
                  <label>Description</label>
                  <div class="form-group">
                    <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_description; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Invice No.</label>
                    <div class="form-group">
                      <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_dod; ?>">
                    </div>
                </div>
                <div class="col-md-2">
                  <label>Invice Date</label>
                    <div class="form-group">
                      <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_invdate; ?>">
                    </div>
                </div>
                <div class="col-md-2">
                  <label>TAX Invice No</label>
                    <div class="form-group">
                      <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_dod; ?>">
                    </div>
                </div>
              </div>
              <div>
                <div class="col-md-2">
                  <label>Amount</label>
                  <div class="form-group">
                      <input type="text" class="form-control" readonly="" value="<?php echo $ex->pettycashi_unitprice; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Vat %</label>
                    <div class="input-group"> 
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_vatt; ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-icon" type="button">%</button>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Vat Amount</label>
                  <div class="form-group">
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_netamt; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <label>W/T Type</label>
                  <div class="form-group">
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_wh; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>W/T %</label>
                    <div class="input-group"> 
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_wh; ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-icon" type="button">%</button>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <label>W/T Amount</label>
                  <div class="form-group">
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_totwh; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label>Paid No</label>
                  <div class="form-group">
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_paydate; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Paid Date</label>
                  <div class="form-group">
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_paydate; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Vender W/T</label>
                  <div class="form-group">
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_venderwt; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Vender Adress W/T</label>
                  <div class="form-group">
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_addrvenderwt; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Net Amount</label>
                  <div class="form-group">
                      <input type="text" class="form-control" readonly="" placeholder="Department" value="<?php echo $ex->pettycashi_amounttot; ?>">
                  </div>
                </div>
              </div>  
            </div>
            <div class="modal-footer">
              <div class="text-right">
                <a href="<?php echo base_url(); ?>"  class="btn btn-primary"><i class=" icon-printer4"></i> Print</a>
                <button type="submit" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2 position-left"></i> Close</button>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

      <td>
        <input type="text" class="no_border" readonly="true" name="ex_costcode[]" id="ex_costcode<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_costcode; ?>">
        <input type="hidden" class="no_border" readonly="true" name="ex_taxno[]" id="ex_taxno<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_invno; ?>">
        <input type="hidden" class="no_border" readonly="true" name="ex_typetax[]" id="ex_typetax<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_taxtype; ?>">
        <input type="hidden" class="no_border" readonly="true" name="ex_datetax[]" id="ex_datetax<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_invdate; ?>">
        <input type="hidden" class="no_border" readonly="true" name="amt" id="amt<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_unitprice; ?>">
      </td>
      <td>
        <input type="text" class="no_border" readonly="true" name="ex_amt[]" id="ex_amt<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_unitprice; ?>">
      </td>
      <td>
        <input type="text" class="no_border" readonly="true" name="ex_vat[]" id="ex_vat<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_vatt; ?>">
      </td>
      <td>
        <input type="text" class="no_border" readonly="true" name="ex_tovat[]" id="ex_tovat<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_netamt; ?>">
      </td>
      <td>
        <input type="hidden" class="no_border" readonly="true" name="ex_wt[]" id="ex_wt<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_wh; ?>">
        <input type="text" class="no_border" readonly="true" name="ex_towt[]" id="ex_towt<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_totwh; ?>">
      </td>
      <td>
        <input type="text" class="no_border" readonly="true" name="ex_netamt[]" id="ex_netamt<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_amounttot; ?>">
      </td>
      <td>
      <input type="text" class="no_border" readonly="true" name="ex_remark[]" id="ex_remark<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_taxno; ?>">
      </td>
      <td><a data-toggle="modal" data-target="#edit<?php echo $ex->pettycashi_id; ?>" data-popup="tooltip" title="" data-original-title="edit"><i class="icon-pencil7"></i></a></td>

      <div id="edit<?php echo $ex->pettycashi_id; ?>" class="modal fade" data-backdrop="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Edit Petty Cash No.: <?php echo $ex->docno; ?></h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4">
                  <label>TAX No</label>
                  <div class="form-group">
                    <input type="text" class="form-control input-sm"  id="exi_taxno<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_invno; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Tax Date</label>
                  <div class="form-group">
                    <input type="date" class="form-control input-sm " id="exi_datetax<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_invdate; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Vat %</label>
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" id="exi_vat<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_vatt; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Vat Amount</label>
                  <div class="form-group">
                    <input type="text" readonly="" class="form-control input-sm" id="exi_tovat<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pattycashi_totvat; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <label>W/T</label>
                  <div class="form-group">
                    <select class="form-control input-sm" name="tax" id="exi_wt<?php echo $ex->pettycashi_id;?>">
                      <?php if($ex->pettycashi_wh == '0'){ ?><option value="0" selected>ไม่มีหัก</option><?php } else { ?><option value="0">ไม่มีหัก</option><?php }?>
                      <?php if($ex->pettycashi_wh == '3'){ ?><option value="3" selected>ค่าบริการ 3%</option><?php } else { ?><option value="3">ค่าบริการ 3%</option><?php }?>
                      <?php if($ex->pettycashi_wh == '1'){ ?><option value="1" selected>ค่าขนส่ง 1%</option><?php } else { ?><option value="1">ค่าขนส่ง 1%</option><?php }?>
                      <?php if($ex->pettycashi_wh == '5'){ ?><option value="5" selected>ค่าเช่า 5%</option><?php } else { ?><option value="5">ค่าเช่า 5%</option><?php }?>
                      <?php if($ex->pettycashi_wh == '2'){ ?><option value="2" selected>ค่าโฆษณา 2%</option><?php } else { ?><option value="2">ค่าโฆษณา 2%</option><?php }?>
                      <?php if($ex->pettycashi_wh == '15'){ ?><option value="15" selected>ดอกเบี้ยจ่าย 15%</option><?php } else { ?><option value="15">ดอกเบี้ยจ่าย 15%</option><?php }?>
                     </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Total W/T</label>
                  <div class="form-group">
                    <input type="text" class="form-control input-sm" readonly="true" id="exi_towt<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_totwh; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <label>W/T Type</label>
                  <div class="form-group">
                    <select class="form-control input-sm" name="tax" id="exi_typetax<?php echo $ex->pettycashi_id;?>">
                                        <?php if($ex->pettycashi_taxtype == '0'){ ?><option value="0" selected>ไม่มี</option><?php } else { ?><option value="0">ไม่มีหัก</option><?php }?>

                                        <?php if($ex->pettycashi_taxtype == '1'){ ?><option value="1" selected>ภ.ง.ด. 1</option><?php } else { ?><option value="1">ภ.ง.ด. 1</option><?php }?>

                                        <?php if($ex->pettycashi_taxtype == '2'){ ?><option value="2" selected>ภ.ง.ด. 1ก พิเศษ</option><?php } else { ?><option value="2">ภ.ง.ด. 1ก พิเศษ</option><?php }?>

                                        <?php if($ex->pettycashi_taxtype == '3'){ ?><option value="3" selected>ภ.ง.ด.  2</option><?php } else { ?><option value="3">ภ.ง.ด.  2</option><?php }?>

                                        <?php if($ex->pettycashi_taxtype == '4'){ ?><option value="4" selected>ภ.ง.ด. 2ก</option><?php } else { ?><option value="4">ภ.ง.ด. 2ก</option><?php }?>

                                        <?php if($ex->pettycashi_taxtype == '5'){ ?><option value="5" selected>ภ.ง.ด.  3</option><?php } else { ?><option value="5">ภ.ง.ด.  3</option><?php }?>

                                        <?php if($ex->pettycashi_taxtype == '6'){ ?><option value="6" selected>ภ.ง.ด. 3ก</option><?php } else { ?><option value="6">ภ.ง.ด. 3ก</option><?php }?>

                                        <?php if($ex->pettycashi_taxtype == '7'){ ?><option value="7" selected>ภ.ง.ด. 53</option><?php } else { ?><option value="7">ภ.ง.ด. 53</option><?php }?>
                                  </select>
                  </div>

                </div>
                <div class="col-md-4">
                  <label>Total</label>
                  <div class="form-group">
                    <input type="text" readonly="true" class="form-control input-sm text-right" id="ex_totel<?php echo $ex->pettycashi_id;?>" value="<?php echo $ex->pettycashi_amounttot; ?>" >
                  </div>
                </div>
              </div>
            </div>

           <!--  <div class="row">
              <div class="col-md-12 text-center">
                <a id="sum<?php echo $ex->pettycashi_id;?>" class="btn btn-primary">Calculate</a>
              </div>
              
              <br>
            </div> -->
            <div class="modal-footer text-right">
              <button id="sum<?php echo $ex->pettycashi_id;?>" type="button"  class="opdetail btn btn-success">Calculate</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </tr>
      <script>
        $("#sum<?php echo $ex->pettycashi_id;?>").click(function(){
          var taxno<?php echo $ex->pettycashi_id;?> = $("#exi_taxno<?php echo $ex->pettycashi_id;?>").val();
          var taxdate<?php echo $ex->pettycashi_id;?> = $("#exi_datetax<?php echo $ex->pettycashi_id;?>").val();
          var typetax<?php echo $ex->pettycashi_id;?> = $("#exi_typetax<?php echo $ex->pettycashi_id;?>").val();
          var vat<?php echo $ex->pettycashi_id;?> = parseFloat($("#exi_vat<?php echo $ex->pettycashi_id;?>").val());
          var wt<?php echo $ex->pettycashi_id;?> = parseFloat($("#exi_wt<?php echo $ex->pettycashi_id;?>").val());
          var amt<?php echo $ex->pettycashi_id;?> = parseFloat($("#amt<?php echo $ex->pettycashi_id;?>").val());
          var tovat<?php echo $ex->pettycashi_id;?> = amt<?php echo $ex->pettycashi_id;?>*vat<?php echo $ex->pettycashi_id;?>/100;
          var towt<?php echo $ex->pettycashi_id;?> = amt<?php echo $ex->pettycashi_id;?>*wt<?php echo $ex->pettycashi_id;?>/100;
          var tonet<?php echo $ex->pettycashi_id;?> = (amt<?php echo $ex->pettycashi_id;?> + tovat<?php echo $ex->pettycashi_id;?>)- towt<?php echo $ex->pettycashi_id;?>;
          $("#ex_vat<?php echo $ex->pettycashi_id;?>").val(vat<?php echo $ex->pettycashi_id;?>);
          $("#ex_wt<?php echo $ex->pettycashi_id;?>").val(wt<?php echo $ex->pettycashi_id;?>);

          $("#ex_tovat<?php echo $ex->pettycashi_id;?>").val(tovat<?php echo $ex->pettycashi_id;?>);
          $("#ex_towt<?php echo $ex->pettycashi_id;?>").val(towt<?php echo $ex->pettycashi_id;?>);
          $("#exi_towt<?php echo $ex->pettycashi_id;?>").val(towt<?php echo $ex->pettycashi_id;?>);
          $("#exi_tovat<?php echo $ex->pettycashi_id;?>").val(tovat<?php echo $ex->pettycashi_id;?>);
          $("#ex_netamt<?php echo $ex->pettycashi_id;?>").val(tonet<?php echo $ex->pettycashi_id;?>);
          $("#ex_totel<?php echo $ex->pettycashi_id;?>").val(tonet<?php echo $ex->pettycashi_id;?>);
          $("#ex_taxno<?php echo $ex->pettycashi_id;?>").val(taxno<?php echo $ex->pettycashi_id;?>);
          $("#ex_datetax<?php echo $ex->pettycashi_id;?>").val(taxdate<?php echo $ex->pettycashi_id;?>);
          $("#ex_typetax<?php echo $ex->pettycashi_id;?>").val(typetax<?php echo $ex->pettycashi_id;?>);
        } );
      </script>
<?php $i++; } ?>
    </tr>
  </tbody>
</table>
</div>

<script>
  $(document).on('click', 'a#remove', function () {
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
                },
                {
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
</script>