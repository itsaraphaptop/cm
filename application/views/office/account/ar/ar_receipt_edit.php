<div class="content-wrapper">
  <div class="page-header">
    <div class="content">
      <div class="row">
        <form method="post" action="<?php echo base_url(); ?>ar_active/edit_receipt">
          <div class="panel panel-flat">
            <div class="panel-heading ">
              <h5 class="panel-title">Account Rceivable Receipt</h5>
            </div>

            <div class="panel-body">
              <!-- contant -->
            <?php
                foreach ($re_header as $key => $value) {
            ?>
              <fieldset>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Receipt No.:</label>
                  <input type="text" class="form-control" id="re_no"  name="re_no" readonly="" value="<?= $value->vou_no ?>">
                </div>

                <div class="form-group">
                  <label>Project Name:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                    </span>
                      <input type="text" class="form-control" readonly="readonly" value="<?= $value->project_name ?>" name="projectname" id="projectname">
                  </div>
                </div>


                <div class="form-group">
                  <label>Owner/Customer:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                    </span>
                    <input type="text" class="form-control" readonly="true"   name="owner" id="owner" value="<?= $value->debtor_name ?>">
                  </div>
                </div>
              </div>
               <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Receipt Date: </label>
                        <input type="date" class="form-control" id="ardate" name="ardate" readonly="ture" value="<?= $value->vou_date ?>">
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>RV/RL No.:</label>
                      <input type="text" class="form-control"  id="arno" name="arno" readonly="true" value="<?= $value->vou_rlno ?>">
                    </div>
                  </div>  

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Voucher No.:</label>
                      <input type="text" class="form-control"  id="invno" name="invno"  readonly="" value="<?= $value->vou_arno ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Period:</label>
                      <input type="text" class="form-control text-center" id="acc_invperiod" name="acc_invperiod" value="<?= $value->vou_period ?>" readonly="ture">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Year:</label>
                      <input type="text" class="form-control text-center" id="acc_year" name="acc_year" readonly="ture"  value="<?= $value->vou_year ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Remark.:</label>
                      <input type="text" class="form-control text-center" id="remark" name="remark" value="<?= $value->vou_remark ?>">
                    </div>
                  </div>
                </div>
              </div>
              </fieldset>
             <?php
                }
            ?>
              <br>
          
              <div class="rhiddenow">
              <div class="table-responsive" id="invreceipt">
                <table class="table table-hover table-bordered table-striped table-xxs">
                  <thead>
                    <tr >
                      <th class="text-center">Invoice No</th>
                      <th class="text-center">Invoice Type</th>
                      <th class="text-center">Period</th>
                      <th class="text-center">System Type</th>
                      <th class="text-center">Amount</th>
                      <th class="text-center">Advance %</th>
                      <th class="text-center">Advance Amount</th>
                      <th class="text-center">W/T  %</th>
                      <th class="text-center">W/T Amount</th>
                      <th class="text-center">Retention %</th>
                      <th class="text-center">Retention Amount</th>
                      <th class="text-center">Vat %</th>
                      <th class="text-center">Vat Amount</th>
                      <th class="text-center">Net Amount</th>
                    </tr>
                  </thead>
                  <tbody id="inv_detail">
                <?php
                    foreach ($re_detail as $i => $data) {
                ?>
                    <tr>
                        <td>
                            <?= $data->vou_invno ?>
                            <input type="hidden" name="vou_id[]" value="<?= $data->vou_id ?>" />
                        </td>
                        <td><?= $data->vou_type ?></td>
                        <td><?= $value->vou_period ?></td>
                        <td><?= $data->systemname ?></td>
                        <td><input class="payment form-control text-right" id="vou_downamt<?= $data->vou_id ?>" row="<?= $data->vou_id ?>" name="vou_downamt[]" value="<?= $data->vou_downamt ?>" /></td>
                        <td><input class="form-control text-right" id="vou_adv<?= $data->vou_id ?>" name="vou_adv[]" value="<?= $data->vou_adv ?>" ></td>
                        <td><input class="form-control text-right" id="vou_advamt<?= $data->vou_id ?>" name="vou_advamt[]" value="<?= $data->vou_advamt ?>"></td>
                        <td><input class="form-control text-right" id="vou_wtper<?= $data->vou_id ?>" name="vou_wtper[]" value="<?= $data->vou_wtper ?>" /></td>
                        <td><input class="form-control text-right" id="vou_lesswt<?= $data->vou_id ?>" name="vou_lesswt[]" value="<?= $data->vou_lesswt ?>" /></td>
                        <td><input class="form-control text-right" id="vou_ret<?= $data->vou_id ?>" name="vou_ret[]" value="<?= $data->vou_ret ?>" /></td>
                        <td><input class="form-control text-right" id="vou_retamt<?= $data->vou_id ?>" name="vou_retamt[]" value="<?= $data->vou_retamt ?>" /></td>
                        <td><input class="form-control text-right" id="vou_vatper<?= $data->vou_id ?>" name="vou_vatper[]" value="<?= $data->vou_vatper ?>" /></td>
                        <td><input class="form-control text-right" id="vou_vatamt<?= $data->vou_id ?>" name="vou_vatamt[]" value="<?= $data->vou_vatamt ?>" /></td>
                        <td><input class="form-control text-right" id="vou_netamt<?= $data->vou_id ?>" name="vou_netamt[]" value="<?= $data->vou_netamt ?>" /></td>
                    </tr>
                <?php
                    }
                ?>
                  </tbody>
                </table>
              </div>
            </div>
            <br>
            <div class="text-right">
              <button type="submit" class="btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>
</div>
</div>

<script>
    $('.payment').keyup(function(event) {
      var amt = $(this).val();
      var row = $(this).attr('row');
      var adv = $('#vou_adv'+row).val();
      var advamt = amt*(adv/100); // amt adv
      var amt_diff = amt-advamt;
      var vat = $('#vou_vatper'+row).val();
      var vatamt = amt_diff*(vat/100); // amt vat
      var wt = $('#vou_wtper'+row).val();
      var wtamt = amt_diff*(wt/100); // amt at
      var ret = $('#vou_ret'+row).val();
      var retamt = amt_diff*(ret/100); // amt ret 
      var netamt = (amt_diff+vatamt)-(retamt+wtamt);
      var amt_vat = amt_diff-vatamt;
      if (adv == 0) {
        $('#vou_adv'+row).val(0);
      }else{
        $('#vou_adv'+row).val(amt_diff);
      }

      if (ret == 0) {
        $('#vou_ret'+row).val(0);
      }else{
        $('#vou_ret'+row).val(retamt);
      }

      if (wt == 0) {
        $('#vou_lesswt'+row).val(0);
      }else{
        $('#vou_lesswt'+row).val(wtamt);
      }
      $('#vou_vatamt'+row).val(amt_vat)
      $('#vou_netamt'+row).val(netamt);
      // alert(netamt);
    });
</script>
