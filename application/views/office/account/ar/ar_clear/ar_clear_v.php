<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
        <div class="content">
          <div class="row">
            <form method="post" id="fclear" action="<?php echo base_url(); ?>ar_active/add_clear">
              <div class="panel panel-flat">
                <div class="panel-heading ">
                  <h5 class="panel-title">Clear A/R</h5>
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
                      <label>Voucher RL/RV No.:</label>
                      <input type="text" class="form-control"  name="re_no" id="re_no" readonly="trun" value="">
                      <input type="hidden" id="accno" name="accno">
                    </div>

                    <div class="form-group">
                      <label>Project Name:</label>
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
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Receipt No: </label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="arno" name="arno" readonly="trun" >
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group" >
                          <label>Receipt Date: </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                            <input type="text" class="form-control daterange-single"  id="ardate" name="ardate">
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="bankcode" id="bankcode">
                      <input type="hidden" name="branchcode" id="branchcode">
                      <!-- <div class="col-md-3">
                        <div class="form-group">
                          <label>Receipt No: </label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="invno" name="invno" readonly="trun" >
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group" >
                          <label>Receipt Date: </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                            <input type="text" class="form-control daterange-single"  id="invdate" name="invdate" readonly="">
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Date  Type:</label>
                          <input type="text" class="form-control text-center" id="artype" name="artype" placeholder="Rept Amount." readonly="">
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
                          <label>Currency.:</label>
                            <input type="text" class="form-control text-center" id="currency" name="currency" placeholder="Contract Amount" value="" readonly="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Exchange :</label>
                          <input type="text" class="form-control text-center" id="exchange" name="exchange" placeholder="Exchange Rale">
                        </div>
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group" >
                          <label>Voucher Date: </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                            <input type="text" class="form-control daterange-single"  id="cleardate" name="cleardate" readonly="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Year : </label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="c_year" name="c_year" placeholder="Year" value="<?= date('Y'); ?>" readonly="true">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label>Period:</label>
                          <input type="text" class="form-control text-center" id="period" name="period" placeholder="Period No." value="<?= date('m'); ?>" readonly="true">
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
                  </fieldset>
                  <br>
                  <div class="row">
                    <div class="table-responsive" id="invoice">
                        <table class="table table-hover table-bordered table-striped table-xxs">
                          <thead>
                            <tr>
                              <th width="5%">System Type</th>
                              <th width="20%">Account Code</th>
                              <th width="10%">Account Name</th>
                              <th width="10%">Dr</th>
                              <th width="10%">Cr</th>
                            </tr>
                          </thead>
                              <tbody >
                                <tr>
                                  <td colspan="7" align="center">summary</td>
                                </tr>
                              </tbody>
                        </table>
                    </div>
                  </div>
                    <br>
                  <div class="text-right">
                    <a href="<?php echo base_url(); ?>ar/ar_clear" class="preload btn btn-info"><i class="icon-plus22"></i> New</a>
                    <button type="button" class="btn btn-success" id="savec"><i class="icon-box-add"></i> Save </button>
                    <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
                  </div>
            </form>
          </div>
          <div id="openinv" class="modal fade" data-backdrop="false">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-primary">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Select Clear</h5>
               </div>

               <div class="modal-body">
                 <div id="loadinv">

                 </div>
               </div>
               <br>
               <div class="modal-footer">
                 <!-- <a type="button" class="btn btn-link" data-dismiss="modal">Close</a> -->
               </div>
             </div>
           </div>
          </div>
          <script>
            $(".openinv").click(function(){
              $("#loadinv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#loadinv").load('<?php echo base_url(); ?>ar/load_clear');
            });                       
          </script>
<script>
  $("#cleardate").change(function(){
     var dates = ($("#cleardate").val());
     var year =dates.substring(0,4);
    var month =dates.substring(7,5);
     $('#c_year').val(year);
     $('#period').val(month);
  });

  $("#savec").click(function(){
    var url="<?php echo base_url(); ?>ar_active/selectdate";
    var dataSet={
    d: $("#cleardate").val(),
    y: $("#c_year").val(),
    m: $("#period").val()
    };
    $.post(url,dataSet,function(data){
      if (data=="Y") {
        var frm = $('#fclear');
         $("#fclear").submit();
      }else{
          if (data=="Y") {
              swal({
                title: "Please fill Period GL!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
              });
          }else{
                $("#fclear").submit();
          }
    }
      });
  });
</script>
           <script>
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