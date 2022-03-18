<style>
.no_border {
 width: 85px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;
} 
</style>
<?php 
foreach ($pp as $key) {
 $proname = $key->project_name;
 $procode = $key->project_id;
 $owcode = $key->project_mcode;
$owname = $key->debtor_name;
}
  
 ?>
<div class="content-wrapper">
  <div class="page-header">
    <div class="content">
      <div class="row">
        <form method="post" action="<?php echo base_url(); ?>ar_active/add_receipt">
          <div class="panel panel-flat">
            <div class="panel-heading ">
              <h5 class="panel-title">Account Rceivable Receipt</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                  <li><a style="color: #fff;" class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select</a></li>
                </ul>
              </div>
            </div>

            <div class="panel-body">
              <!-- contant -->
              <fieldset>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Receipt No.:</label>
                  <input type="text" class="form-control" id="re_no"  name="re_no" readonly="" placeholder="Receipt No.">
                </div>

                <div class="form-group">
                  <label>Project Name:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                    </span>
                      <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php echo $proname; ?>" name="projectname" id="projectname">
  									 <input type="hidden" readonly="true" value="<?php echo $procode; ?>" class="pproject1 form-control input-sm" name="projectid" id="putprojectid">
                  </div>
                </div>


                <div class="form-group">
                  <label>Owner/Customer:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                    </span>
                    <input type="text" class="form-control" placeholder="Owner/Customer" readonly   name="owner" id="owner" value="<?php echo $owname; ?>">
  									<input type="hidden" name="venderid" id="venderid" value="<?php echo $owcode; ?>">
                  </div>
                </div>
              </div>
               <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Receipt Date: </label>
                        <input type="date" class="form-control" id="ardate" name="ardate" value="<?= date('Y-m-d'); ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>TAX: </label>
                      <select class="form-control" name="tax" id="tax">
                        <option value="1">Yes</option>
                        <option value="2" selected>No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <input type="hidden" name="cus_code" id="cus_code" value="0">
                    <input type="hidden" name="ar_type" id="ar_type" value="0">
                    <input type="hidden" name="ar_no" id="ar_no" value="0">
                    <input type="hidden" name="vat" id="vat" value="0">
                    <input type="hidden" name="wt" id="wt" value="0">
                    <input type="hidden" name="net" id="net" value="0">
                    <input type="hidden" name="amtadv" id="amtadv" value="0">
                    <input type="hidden" name="amtret" id="amtret" value="0">
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>RV/RL No.:</label>
                      <input type="text" class="form-control"  id="arno" name="arno" readonly="">
                    </div>
                  </div>  

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Voucher No.:</label>
                      <input type="text" class="form-control"  id="invno" name="invno" placeholder="Voucher No." readonly="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Period:</label>
                      <input type="text" class="form-control text-center" id="acc_invperiod" name="acc_invperiod" readonly="">
                      <input type="hidden" class="form-control text-center" id="acc_year" name="acc_year" readonly="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Remark.:</label>
                      <input type="text" class="form-control text-center" id="remark" name="remark" placeholder="Remark">
                    </div>
                  </div>
                </div>
              </div>
              </fieldset>
              <br>
          
              <div class="rhiddenow">
              <div class="table-responsive" id="invreceipt">
                <table class="table table-hover table-bordered table-striped table-xxs">
                  <thead>
                    <tr >
                      <th class="text-center">Invoice No</th>
                      <th class="text-center">Invoice Type</th>
                      <th class="text-center">Period</th>
                      <th class="text-center">Remark</th>
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
                  </tbody>
                </table>
              </div>
            </div>
            <br>
            <div class="text-right">
              <a href="<?php echo base_url(); ?>ar/ar_receipt/<?php echo $procode; ?>" class="preload btn btn-info"><i class="icon-plus22"></i> New</a>
              <!-- <a id="inst" class="btn btn-default"><i class="icon-list-numbered"></i>  Append Row</a> -->
              <button type="submit" class="btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
          </div>
        </form>
      </div>
      <div id="openinv" class="modal fade" data-backdrop="false">
        <div class="modal-full modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Select Invoice</h5>
            </div>

            <div class="modal-body">
              <div class="loadinv">

              </div>
            </div>
            <br>
            <div class="modal-footer">
              <!-- <a type="button" class="btn btn-danger" data-dismiss="modal">Close</a> -->
             <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
            </div>
          </div>
        </div>
      </div>

<script>
  function model_ar(){
    $(".loadinv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $(".loadinv").load('<?php echo base_url(); ?>ar/load_modal_append/<?= $procode; ?>');
  }
  model_ar()

  function hide_row(){
      
      $("[amt]").each(function(index, el) {
        // $(el).remove();
            var value_amt = $(el).val()*1;
            console.log(index);
            if(value_amt==0){
              $(el).parent().parent().hide();
            }
      });
  }
</script>
