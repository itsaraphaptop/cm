<?php 
foreach ($pp as $key) {
$project_id = $key->project_id;
$proname = $key->project_name;
$owner = $key->project_mnameth;
$project_code = $key->project_code;
$owner_no = $key->project_mcode;
$vatper = $key->project_vat;
$wt = $key->project_wt;
$less_adv=$key->project_lessadvance;
$less_ref=$key->project_lessretention;
$down = $key->project_advance_1;
$contract_amt = $key->project_value;
 
}

  $this->db->select('COUNT(inv_project) as period');
  $this->db->where('inv_project',$project_id);
  $this->db->from('ar_invretention_header');
  $inv_period = $this->db->get()->result();
  foreach ($inv_period as $per) {
    if ($per->period == 0) {
    $periodd =  1;
    } else {
    $periodd = $per->period+1;  
    }
    $peri = $per->period;
  }
?>
<div class="content-wrapper">
   <div class="content">
    <div class="row">
      <form method="post" id="forminvre" action="<?php echo base_url(); ?>ar_active/add_invretention">
        <div class="panel panel-flats">
          <div class="panel-heading ">
            <h5 class="panel-title">INVOICE RETENTION</h5>
          </div>

          <div class="panel-body">
                        <!-- contant -->
            <fieldset>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Invoice No.:</label>
                  <input type="hidden" name="chk" id="chk" value="N">
                  <input type="text" class="form-control"  name="invono" id="invono" required="" value="">
                </div>

                <div class="form-group">
                  <label>Ref:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button class="cer_noref btn btn-default btn-icon" type="button" data-toggle="modal" data-target="#refcer_no">Ref. Certification No.</button>
                    </span>

                  
                    <input type="text" class="form-control" placeholder="Ref" value="" name="refname" id="refname">

                    </div>
                </div>

                <div class="form-group">
                  <label>Project Name:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                    </span>
                    <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php echo $proname; ?>" name="projectname" id="projectname">
    								<input type="hidden" readonly="true" value="<?php echo $project_id; ?>" class="pproject1 form-control input-sm" name="projectid" id="putprojectid">

                  </div>
                </div>

                <div class="form-group">
                  <label>Owner/Customer:</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                      </span>
                      <input type="text" class="form-control" placeholder="Owner/Customer" readonly   name="owner" id="owner" value="<?php echo $owner; ?>">
        							<input type="hidden" name="venderid" id="venderid" value="<?php echo $owner_no; ?>">
                     <!--  <div class="input-group-btn">
                        <a class="ven btn btn-default btn-icon" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></a>
                      </div> -->
                    </div>
                </div>       
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group" >
                      <label>Invoice Date: </label>
                        <input type="date" class="form-control"  id="invdate" name="invdate">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Ref Date: </label>
                        <input type="date" class="form-control" id="refdate" name="refdate">
                        <input type="hidden" name="type" value="retention">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="display-block text-semibold">Tax. </label>
                      <label class="radio-inline">
                        <input type="radio" name="tax" checked="checked" value="no">
                        NO
                      </label>

                      <label class="radio-inline">
                        <input type="radio" name="tax" value="yes">
                        YES
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>PO/Contract No.:</label>
                      <input type="text" class="form-control"  id="po" name="po" placeholder="PO/Contract No.">
                    </div>
                  </div> 

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Currency.:</label>
                        <select class="form-control" id="currency" name="currency">
                      <option value="0">กรุณาเลือก Currency</option>
                        <?php
                          foreach ($currency as $key => $value) {
                        ?>
                          <option value="<?= $value->currency_id ?>"><?= $value->currency_name_en ?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Exchange.:</label>
                      <input type="text" class="form-control text-right" id="exchange" name="exchange">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label>Due Date: </label>
                      <input type="date" class="form-control" id="duedate" name="duedate" value="<?= date('Y-m-d') ?>" readonly="readonly"> 
                  </div>

                </div>
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Contract Amount.:</label>
                      <input type="text" class="form-control text-center" id="poamt" name="poamt" placeholder="Contract Amount" value="<?php echo $contract_amt; ?>"  readonly="readonly">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label>VAT %:</label>
                    <div class="input-group">
                      <input type="text" class="form-control text-center" id="vatper" name="vatper" placeholder="7%" value="<?php echo $vatper; ?>"  readonly="readonly">
                      <span class="input-group-addon">%</span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                       <label>Retention Amount:</label>
                      <div class="input-group">
                        <input type="text" class="form-control text-center" id="retention" name="retention" value="0.00"  readonly="readonly">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                       <label>Receipt Amount:</label>
                      <div class="input-group">
                        <input type="text" class="form-control text-center" id="receipt" name="receipt" value="0.00"  readonly="readonly">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label>Credit Term:</label>
                  <div class="input-group">
                    <input type="text" class="form-control text-center" id="crterm" name="crterm" placeholder="Credit Term" value="" required>
                    <span class="input-group-addon">Day</span>
                  </div>
                  </div>

                  <div class="col-md-3">
                    <label>Period:</label>
                    <div class="input-group">
                      <input type="text" class="form-control text-center" id="period" name="period" placeholder="Period No." value="<?php echo $periodd; ?>" readonly="readonly">
                        <span class="input-group-addon">%</span>
                    </div>
                  </div>

                </div>
              </div>


            <div class="col-md-12">
              <div class="row">
                <label>Remark. :</label>
                <textarea rows="4" name="remark" class="form-control" placeholder="Remark."></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <label>Description Other. :</label>
                <textarea rows="4" cols="185" class="form-control" placeholder="Description Other."></textarea>
              </div>
            </div>
            </fieldset>

          
            <br>
            <div class="row">
              <div class="table-responsive" id="invretention">
                <table class="table table-hover table-bordered table-striped table-xxs">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">System Type</th>
                      <th class="text-center">Retenton Amount</th>
                      <th class="text-center">VAT</th>
                      <th class="text-center">Net Amount</th>
                      <th class="text-center">Receipt Amount</th>
                      <th class="text-center">Ref. No.</th>
                    </tr>
                  </thead>
                  <tbody ></tbody>

                </table>
              </div>
            </div>
            </div>
            <br>
            <div class="text-right">
              <a href="<?php echo base_url(); ?>ar/invoice_retention/<?php echo $project_id; ?>"  class="btn btn-info"><i class="icon-plus22"></i>New</a>
              <a data-toggle="modal" id="update" data-target="#retrieve_retention" class="btn btn-primary"><i class="icon-stackoverflow"></i>Retrieve</a>
              <!-- <a id="inst" class="b/tn btn-default"><i class="icon-list-numbered"></i> ADD Rows</a> -->
                <button type="button" class="btn btn-success" id="saveinvre"><i class="icon-box-add"></i> Save </button>
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
        </div>
      </form>
    </div>               
  </div>
</div>

<div id="retrieve_retention" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h5 class="modal-title">RETRIEVE INVOICE RETENTION</h5>
      </div>

      <div class="modal-body" id="invoiceretention">

      </div>
     <!--  <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal"><i class="icon-close2 position-left"></i> Close</button>
      </div> -->
    </div>
  </div>
</div>


<div id="my_list" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Retention</h4>
      </div>
      <div class="modal-body" id="content_detail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
    $('#crterm').keyup(function(){
        var day = $(this).val()*1;
        $.get("<?=base_url()?>ar/duedate/"+day, function () {  
        }).done(function(data) {
            $('#duedate').val(data);
        });
    });
            $(window).load(function(){
              $('#invretention').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#invretention").load('<?php echo base_url(); ?>index.php/ar/load_invretention/<?php echo $project_id; ?>/<?php echo $periodd; ?>');
            });

            $("#update").click(function(){
              $("#chk").val('Y');
              $("#invoiceretention").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#invoiceretention").load('<?php echo base_url(); ?>ar/load_ret_invretention/<?php echo $project_id; ?>');
            });
            $("#crterm").change(function(){
              function newDayAdd(inputDate,addDay){
                  var d = new Date(inputDate);
                  d.setDate(d.getDate()+addDay);
                  mkMonth=d.getMonth()+1;
                  mkMonth=new String(mkMonth);
                  if(mkMonth.length==1){
                      mkMonth="0"+mkMonth;
                  }
                  mkDay=d.getDate();
                  mkDay=new String(mkDay);
                  if(mkDay.length==1){
                      mkDay="0"+mkDay;
                  }   
                  mkYear=d.getFullYear();
                  return mkYear+"-"+mkMonth+"-"+mkDay; 
              }
              var dates = new Date();
              var cr = parseFloat($("#crterm").val());
              var duedate=newDayAdd(dates,cr);
              $('#duedate').val(duedate);
            });

$("#saveinvre").click(function(){
  if ($('#currency').val() == '0' ) {
    swal({
        title: "กรุณาเลือก Currency",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
    });
    return false;
  }

  if ($('#exchange').val() == '' ) {
    swal({
        title: "กรุณากรอก Exchange",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
    });
    return false;
  }
    var cr = ($("#crterm").val());
      if (cr == "") {

            swal({
      title: "Please fill Credit Term !!!",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
    }else if ($("#invono").val() == "") {
      swal({
      title: "Please fill Invoice No!!!",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });  
    }else{
      function newDayAdd(inputDate,addDay){
        var d = new Date(inputDate);
        d.setDate(d.getDate()+addDay);
        mkMonth=d.getMonth()+1;
        mkMonth=new String(mkMonth);
        if(mkMonth.length==1){
            mkMonth="0"+mkMonth;
        }
        mkDay=d.getDate();
        mkDay=new String(mkDay);
        if(mkDay.length==1){
            mkDay="0"+mkDay;
        }   
        mkYear=d.getFullYear();
        return mkYear+"-"+mkMonth+"-"+mkDay; 
    }
    var dates = new Date();
    var cr = parseFloat($("#crterm").val());
    var duedate=newDayAdd(dates,cr);
    $('#duedate').val(duedate);

        

       // check ก่อน save
      var sum_amt = 0;
      $("[id^='progressamt']").each(function(index, el) {            
          sum_amt+=$(el).val()*1;
          // alert($(el).val()*1);
      });

      
      if(sum_amt <= 0){
        swal("ผลรวม ไม่ควรติดลบ");
        return false;
       
      }else{
        // return false;   
     
        $("#forminvre").submit();
      }
      // check ก่อน save


       



    }
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
                    addClass: 'btn btn-primary',
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
                    addClass: 'btn btn-danger',
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


<div id="refcer_no" class="modal fade">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">Certification</h5>
                </div>

                <div class="modal-body">
                    <div id="cer_no"></div>
                </div>

                <div class="modal-footer">
                 
                </div>
              </div>
            </div>
          </div>

          <script>
            $('.cer_noref').click(function(event) {
              $('#cer_no').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $('#cer_no').load('<?php echo base_url(); ?>index.php/ar/load_certification/<?php echo $project_code; ?>/retention');
            });
          </script>