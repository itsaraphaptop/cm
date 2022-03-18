<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
        <div class="content">
          <div class="row">
            <form method="post" action="<?php echo base_url(); ?>ar_active/add_receiving">
              <div class="panel panel-flat">
                <div class="panel-heading ">
                  <h5 class="panel-title">AR Receiving</h5>
                  <div class="heading-elements">
                    <ul class="icons-list">
                      <li><a style="color: #fff;" class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Select</a></li>
                    </ul>
                  </div>
                </div>
                <div class="panel-body">
                  <fieldset>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Receipt No.:</label>
                      <input type="text" class="form-control"  name="re_no" id="re_no" readonly="trun" value="">
                    </div>

                    <div class="form-group">
                      <label>Project:</label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                        </span>
                        <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="" name="projectname" id="projectname">
                        <input type="hidden" readonly="true" value="" class="pproject form-control input-sm" name="projectid" id="putprojectid">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Owner/Customer:</label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                        </span>
                        <input type="text" class="form-control" placeholder="Owner/Customer" readonly   name="owner" id="owner" >
                        <input type="hidden" name="venderid" id="venderid">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Bank:</label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                        </span>
                        <input type="text" class="form-control" readonly="readonly" placeholder="Bank" value="" name="bankname" id="bankname" required="true">

                        <input type="hidden" readonly="true" value="" class=" form-control input-sm" name="bankid" id="bankid">

                        <input type="text" class="form-control" readonly="readonly" placeholder="branch" value="" name="branch" id="branch">

                        <input type="hidden" readonly="true" value="" class=" form-control input-sm" name="branchd" id="branchid">

                        <div class="input-group-btn">
                          <button type="button" data-toggle="modal" data-target="#openbank"  class="openbank btn btn-info btn-icon"><i class="icon-search4"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group" >
                          <label>Option Type : </label>
                            <select id="optiontype" name="optiontype" class="form-control text-center">
                            <option value="0"></option>
                            <?php $option=$this->db->query("SELECT * from option_type")->result();
                            foreach ($option as $op) {
                            ?>
                              <option value="<?php echo $op->op_id; ?>"><?php echo $op->op_name; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Date: </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                            <input type="date" class="form-control" id="ardate" name="ardate" readonly="true" >
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Voucher No.:</label>
                          <input type="text" class="form-control"  id="vou_no" name="vou_no" placeholder="Voucher No." readonly="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Rept Amount.:</label>
                          <input type="text" class="form-control text-center" id="reamot" name="reamot" placeholder="Rept Amount." readonly="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Less Other.:</label>
                          <input type="text" class="form-control text-center" id="reamot" name="reamot" placeholder="Rept Amount." value="0">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Remark.:</label>
                          <input type="text" class="form-control text-center" id="remark" name="remark" placeholder="Remark">
                          <input type="hidden" name="artype" id="artype">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Voucher Date:</label>
                          <input type="date" class="form-control text-center" id="vou_date" name="vou_date" placeholder="Voucher Date:">
                        </div>
                      </div> 
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>P/L Exchange:</label>
                          <input type="text" class="form-control text-center" id="n_exchange" name="n_exchange" placeholder="P/L Exchange" value="0">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label>Voucher RL/RV : </label>
                          <input type="text" class="form-control" id="rlno" name="rlno" readonly="true">
                        </div>
                      </div>
                    </div>
                  </div>
                  </fieldset>
                  <br>
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                      <li class=""><a href="#panel-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i>Paid</a></li>
                      <li class="active"><a href="#panel-pill2" data-toggle="tab" aria-expanded="true"><i class=" icon-list-unordered position-left"></i>Invoice</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane has-padding " id="panel-pill1">
                        <div id="paird" class="table-responsive">
                          <table class="table table-hover table-xxs ">
                            <tbody>
                              
                            </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="tab-pane has-padding active" id="panel-pill2">
                      <div id="invoice" class="table-responsive">
                        <!-- <table class="table table-hover table-xxs">
                             <thead>
                             <tbody>
                             
                             </tbody>
                           </table> -->
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="text-right">
                    <a href="<?php echo base_url(); ?>ar/ar_receiving" class="preload btn btn-info"><i class="icon-plus22"></i> New</a>
                    <button type="button" class="btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
                    <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
                  </div>
            </form>
      </div>
           <div class="modal fade" id="openbank" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Select Bank</h4>
                </div>
                  <div class="modal-body">
                  <div class="panel-body">
                      <div class="row" id="modal_bank">

                      </div>
                      </div>
                  </div>
              </div>
            </div>
          </div> 

          <div class="modal fade" id="openinv" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Select Receipt</h4>
                </div>
                  <div class="modal-body">
                    <div class="row" id="modal_receipt">

                    </div>
                  </div>
              </div>
            </div>
          </div> 

          <script>
          $(".openbank").click(function(){
              $('#modal_bank').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_bank").load('<?php echo base_url(); ?>index.php/share/bank');
            });

          $(".openinv").click(function(){
              $('#modal_receipt').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_receipt").load('<?php echo base_url(); ?>index.php/ar/load_receipt');
            });
          </script>
<script>
$('#sweet_success').click(function(event) {
 var optiontype =   $('#optiontype').val();
  if (optiontype == 0) {
    swal(
      'Option Type?',
      null,
      'error'
    );
    return false;
  }

  if ($('#chqdate').val() == "") {
    swal(
      'Chq.Date?',
      null,
      'error'
    );
    return false;
  }

  $("form").submit();
});

$(document).on('click', 'a#remove', function () { // <-- changes
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
