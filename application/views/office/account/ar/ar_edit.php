<div class="content-wrapper">
    <div class="content">
          <div class="row">
            <form method="post" id="fact" name="fact" action="<?php echo base_url(); ?>ar_active/edit_araccount">
              <div class="panel panel-flat">
                <div class="panel-heading ">
                  <h5 class="panel-title">Account Receivable</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                      <li><a style="color: #fff;" class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select</a></li>
                    </ul>
                  </div>
                </div>
                <?php 
                    foreach ($ar_header as $key => $value) {
                ?> 
                <div class="panel-body">
                  <!-- contant -->
                  <fieldset>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>AR No.:</label>
                       <input type="hidden" value="<?= $value->acc_invtype ?>" name="invtype" />
                      <input type="text" class="form-control"  name="acc_no" readonly="true" id="acc_no" value="<?= $value->acc_no ?>"  >
                    </div>

                     <div class="form-group">
                      <label>Project Name:</label>
                      <div class="input-group">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                    </span>
                      <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?= $value->project_name ?>" name="projectname" id="projectname">
                     <input type="hidden" readonly="true" value="<?= $value->project_id ?>" class="pproject1 form-control input-sm" name="projectid" id="putprojectid">
                    </div>
                    </div>


                    <div class="form-group">
                      <label>Owner/Customer:</label>
                      <div class="input-group">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                    </span>
                    <input type="text" class="form-control" readonly   name="owner" id="owner" value="<?= $value->project_mcode ?>">
                    <input type="hidden" name="venderid" id="venderid" value="<?= $value->project_mnameth ?>">
                  </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Type : </label>
                          <div class="input-group">
                            <input type="text" readonly="" class="form-control" value="" id="inv_type" name="inv_type" value="<?= $value->acc_invtype ?>">
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Bill Date: </label>
                          <div class="input-group">
                            <input readonly="true" type="date" class="form-control" id="billdate" name="billdate" value="<?= $value->acc_ardate ?>" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Invoice Date: </label>
                          <div class="input-group">
                            <input type="hidden" id="duedate" name="duedate">
                            <input readonly="true" type="date" class="form-control" id="invdate" name="invdate" value="<?= $value->acc_due ?>" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Invoice Net Amount:</label>
                          <input type="text" class="form-control"  id="invamt" name="invamt" readonly="true" value="<?= $value->acc_invamt ?>" />

                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Vch Date: </label>
                            <input type="date" class="form-control" id="ardate" readonly="true" name="ardate"  value="<?= $value->acc_ardate ?>">
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Year :</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="inv_year" name="inv_year" value="<?= $value->year ?>" readonly="" >
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label>Credit Term:</label>
                        <div class="input-group">
                          <input type="text" class="form-control text-center" id="crterm" name="crterm" readonly="true" value="<?= $value->acc_credit ?>">
                          <span class="input-group-addon">Day</span>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label>Period:</label>
                        <div class="input-group">
                          <input type="text" readonly="" class="form-control text-center" id="ar_period" name="ar_period"  value="<?= $value->period ?>" >
                        </div>
                      </div>
                    </div>
                <?php
                        }
                ?>

                    <div class="row">
                      <div class="col-md-12">
                        <label>Remark :</label>
                        <div class="">
                          <input type="text" class="form-control text-center" readonly="true" id="remark" name="remark"value="<?= $value->acc_remark ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  </fieldset>
                  <br>
                  <div class="row">
                    <div class="table-responsive" id="invaccount">
                        <table class="table table-hover table-bordered table-striped table-xxs">
                          <thead>
                            <tr>
                              <!-- <th width="ZZ5%">#</th> -->
                              <th width="5%">System Type</th>
                              <th width="20%">Account Code</th>
                              <th width="10%">Account Name</th>
                              <th width="10%">Dr</th>
                              <th width="10%">Cr</th>
                            </tr>
                          </thead>
                              <tbody >
                        <?php
                            $no = 0;
                            foreach ($ar_detail as $k => $data) {
                            $no++;   
                        ?>
                        <tr>
                        <td>
                            <?php echo $data->systemname; ?>
                            <input type="hidden" value="<?= $data->acc_id ?>" name="id_row[]" />
                            <input type="hidden" value="<?= $data->acc_systemcode ?>" name="systemcode[]" />
                        </td>
                        <td><input type="text" class="form-control" id="acc1_code<?= $k ?>" readonly="readonly" value="<?= $data->acc_codeac ?>" name="inv_ac[]" /> </td>
                        <td>
                        <?php
                            $acc_code =  $this->db->query("SELECT act_name from account_total where act_code='$data->acc_codeac' ")->result();
                        ?>
                        <div class="input-group">
                            <input type="text" class="form-control input-xxs" id="acc1_name<?= $k ?>"  readonly="readonly" value="<?= $acc_code[0]->act_name ?>">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $k ?>,'acc1_code','acc1_name')"><i class="icon-search4"></i></button>
                            </div>
                        </div>
                        <!-- <input type="text" class="form-control" readonly="readonly" value="<?= $acc_code[0]->act_name ?>" />  -->
                        </td>
                        <td>
                            <input type="text" class="form-control" name="acc_dr[]" readonly="readonly" value="<?= $data->acc_dr ?>" />
                        </td>
                        <td>
                            <input type="text" class="form-control" name="acc_cr[]" readonly="readonly" value="<?= $data->acc_cr ?>" />
                        </td>
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
                          <button type="submit" id="saveapv" class="btn btn-success" ><i id="icon_save" class="icon-box-add"></i> Save </button>
                          <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
                      </div>
                    </div>
                  </div>
            </form>
          </div>
    </div>
</div>

<div id="myAccount" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select Account</h4>
            </div>
            <div class="modal-body">
               <div id="account_code"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
  function acc(id,row_id,row_name){
    $("#account_code").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#account_code").load(`<?php echo base_url(); ?>ar/account_code_by_rows_name/${id}/${row_id}/${row_name}`);
    $('#myAccount').modal('show');
  }
</script>