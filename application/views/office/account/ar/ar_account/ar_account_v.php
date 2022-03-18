<?php $date = date("mdY");
$yy = substr($date, 4, 4);
$dd = substr($date, 0, 2);
foreach ($pro as $key) {
 $proname = $key->project_name;
 $procode = $key->project_code;
 $owcode = $key->project_mcode;
$owname = $key->debtor_name;
}
  ?>
<script type="text/javascript">
  
    $(".navbar-top").removeClass('sidebar-secondary-hidden');
  
</script>
<div class="content-wrapper">
       <div class="content">
          <div class="row">
            <form method="post" id="fact" name="fact" action="<?php echo base_url(); ?>ar_active/add_araccount">
              <div class="panel panel-flat">
                <div class="panel-heading ">
                  <h5 class="panel-title">Account Receivable</h5>
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
                      <label>AR No.:</label>
                      <input type="text" class="form-control"  name="acc_no" readonly="true" id="acc_no" placeholder="Voucher No."  >
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
                          <label>Type : </label>
                          <div class="input-group">
                            <!-- <select class="form-control" id="types">
                              <option value="1">Down</option>
                              <option value="2">Progress</option>
                              <option value="3">Retention</option>
                            </select> -->
                            <input type="text" readonly="" class="form-control" value="" id="inv_type" name="inv_type">
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Bill Date: </label>
                          <div class="input-group">
                            <input readonly="true" type="date" class="form-control" id="billdate" name="billdate" value="<?php echo date('Y-m-d'); ?>" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Invoice Date: </label>
                          <div class="input-group">
                            <input type="hidden" id="duedate" name="duedate">
                            <input readonly="true" type="date" class="form-control" id="invdate" name="invdate" value="" />
                            <input type="hidden" id="invperiod" name="invperiod">
                            <input type="hidden" id="invyear" name="invyear">
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-3">
                        <div class="form-group">
                          <label>Invoice Date: </label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                            <input type="hidden" id="duedate" name="duedate">
                            <input type="date" style="padding: 0px;" readonly="" class="form-control" id="invdate" name="invdate"  value="">
                            <input type="hidden" id="invperiod" name="invperiod">
                            <input type="hidden" id="invyear" name="invyear">
                          </div>
                        </div>
                      </div> -->
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Invoice Net Amount:</label>
                          <input type="text" class="form-control"  id="invamt" name="invamt" placeholder="Inv Net Amount:" readonly="true">
                          <input type="hidden" class="form-control" id="vatamt" name="vatamt">
                          <input type="hidden" class="form-control" id="wtamt" name="wtamt">

                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Vch Date: </label>
                            <input type="date" class="form-control" id="ardate" name="ardate"  value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Year :</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="inv_year" name="inv_year" placeholder="Year" value="<?php echo date('Y'); ?>" readonly="" >
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label>Credit Term:</label>
                        <div class="input-group">
                          <input type="text" class="form-control text-center" id="crterm" name="crterm" readonly="true" placeholder="Credit Term" value="0">
                          <span class="input-group-addon">Day</span>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label>Period:</label>
                        <div class="input-group">
                          <input type="text" readonly="" class="form-control text-center" id="ar_period" name="ar_period" placeholder="Period No." value="<?php echo $dd; ?>" >
                          <input type="hidden" id="period" name="inv_period">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      
                      <div class="col-md-12">
                        <label>Remark :</label>
                        <div class="">
                          <input type="text" class="form-control text-center" id="remark" name="remark" placeholder="Remark">
                          <input type="hidden" id="current" name="current" value="0">
                          <input type="hidden" id="cusamt" name="cusamt" value="0">
                          <input type="hidden" id="advamt" name="advamt" value="0">
                          <input type="hidden" id="retamt" name="retamt" value="0">
                          <input type="hidden" id="vat" name="vat" value="0">
                          <input type="hidden" id="wt" name="wt" value="0">
                          <input type="hidden" id="ret" name="ret" value="0">
                          <input type="hidden" id="adv" name="adv" value="0">
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
                                <tr>
                                  <td colspan="7" align="center">summary</td>
                                </tr>
                              </tbody>
                        </table>
                      </div>
                    </div>
                    <br>
                     <div class="text-right">
                          <a href="<?php echo base_url(); ?>ar/ar_account/<?php echo $proo; ?>" class="preload btn btn-info"><i class="icon-plus22"></i> New</a>
                          <!-- <a id="inst" class="btn btn-default"><i class="icon-list-numbered"></i> ADD Rows</a> disabled="true"-->
                          <button type="button" id="saveapv" class="btn btn-success" ><i id="icon_save" class="icon-box-add"></i> Save </button>
                          <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
                      </div>
                    </div>
                  </div>
            </form>
          </div>
          <div id="openinv" class="modal fade" data-backdrop="false">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-primary">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Select Invoice </h5>
               </div>

               <div class="modal-body">
                 <div id="loadinv">

                 </div>
               </div>
               <br>
               <div class="modal-footer">
                 <a type="button"  class="btn btn-link " data-dismiss="modal">Close </a>
               </div>
             </div>
           </div>
          </div>


          <script>
          $(".openinv").click(function(){
                        $("#loadinv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");

                        $("#loadinv").load('<?php echo base_url(); ?>ar/load_invaccunt/<?php echo $proo; ?>');
                       });                       
           
          </script>
  <script>
    $("#ardate").change(function(){
       var dates = ($("#ardate").val());
       var year =dates.substring(0,4);
      var month =dates.substring(7,5);
       $('#inv_year').val(year);
       $('#ar_period').val(month);
    });
</script>
<script>
$("#saveapv").click(function(){
  $('#saveapv').attr('class', 'btn btn-success disabled');
  $('#icon_save').attr('class', 'icon-spinner2 spinner');
    var d = $("#ardate").val();
    var y = $("#inv_year").val();
    var m = $("#ar_period").val();
    $.get(`<?= base_url(); ?>data_master/check_period/${y}/${m}`, function(data) {
    }).done(function(data){
        console.log(data);
        var json = jQuery.parseJSON(data);
        if(json.status == false){
          swal({
                title: "Please fill Period GL!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
              });
        }else{
           $("#fact").submit();
        }
    });
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
