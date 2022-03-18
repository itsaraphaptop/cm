<?php 
foreach ($head as $he) {
  $inv_no = $he->inv_no;
  $inv_project = $he->inv_project;
  $inv_owner = $he->inv_owner;
  $inv_date = $he->inv_date;
  $inv_dateref = $he->inv_dateref;
  $inv_duedate = $he->inv_duedate;
  $inv_con = $he->inv_contactamount;
  $inv_wt = $he->inv_wt;
  $inv_credit = $he->inv_credit;
  $inv_vat = $he->inv_vat;
  $inv_lessadv = $he->inv_lessadv;
  $inv_lessref = $he->inv_lessref;
  $inv_credit = $he->inv_credit;
  $inv_period = $he->inv_period;
  $ref_cer = $he->ref_cer;
}
$project = $this->db->query("select * from  project where project_id = '$inv_project' ")->result();
foreach ($project as $pro) {
  $project_name = $pro->project_name;
  $project_mnameth =$pro->project_mnameth;
  $project_advance_1 =$pro->project_advance_1;

}

 ?>
<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <form method="post" id="forminvre" action="<?php echo base_url(); ?>ar_active/edit_invretention">
        <div class="panel panel-flat">
          <div class="panel-heading ">
            <h5 class="panel-title">INVOICE RETENTION</h5>
           </div>

          <div class="panel-body">
            <fieldset>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Invoice No.:</label>
                  <input type="hidden" name="chk" id="chk" value="N">
                  <input type="text" class="form-control"  name="invono" id="invono" readonly="readonly" value="<?php echo $inv_no; ?>">
                  <input type="hidden" name="type" value="retention">
                </div>

                <div class="form-group">
                  <label>Ref:</label>
                    <input type="text" class="form-control" readonly="readonly" placeholder="Ref" value="<?php echo $ref_cer; ?>" name="refname" id="refname">
                </div>

                <div class="form-group">
                  <label>Project Name:</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                    </span>
                    <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php echo $project_name; ?>" name="projectname" id="projectname">
                    <input type="hidden" readonly="true" value="<?php echo $inv_project; ?>" class="pproject1 form-control input-sm" name="projectid" id="putprojectid">
                  </div>
                </div>

                <div class="form-group">
                  <label>Owner/Customer:</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                      </span>
                      <input type="text" class="form-control" placeholder="Owner/Customer" readonly   name="owner" id="owner" value="<?php echo $project_mnameth; ?>">
                      <input type="hidden" name="venderid" id="venderid" value="<?php echo $inv_owner ?>">
                    </div>
                </div>       
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group" >
                      <label>Invoice Date: </label>
                        <input type="date" class="form-control daterange-single" value="<?php echo $inv_date; ?>"  id="invdate" name="invdate">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Ref Date: </label>
                        <input type="date" class="form-control" id="refdate" name="refdate" value="<?php echo $inv_dateref; ?>">
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
                      <input type="text" class="form-control text-center" id="currency" name="currency" value="<?= $he->currency_name_en ?>">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Exchange.:</label>
                      <input type="text" class="form-control text-right" id="exchange" name="exchange" value="<?= $he->exchange ?>">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label>Due Date: </label>
                      <input type="date" class="form-control" id="duedate" name="duedate"  readonly="readonly" value="<?php echo $inv_duedate; ?>">
                  </div>

                </div>
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Contract Amount.:</label>
                      <input type="text" class="form-control text-center" id="poamt" name="poamt" placeholder="Contract Amount" value="<?php echo $inv_con; ?>"  readonly="readonly">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label>VAT %:</label>
                    <div class="input-group">
                      <input type="text" class="form-control text-center" id="vatper" name="vatper" placeholder="7%" value="<?php echo $inv_vat; ?>"  readonly="readonly">
                      <span class="input-group-addon">%</span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                       <label>Retention  Amount:</label>
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
                      <input type="text" class="form-control text-center" id="crterm" name="crterm" placeholder="Credit Term" value="<?php echo $inv_credit; ?>" required>
                      <span class="input-group-addon">Day</span>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label>Period:</label>
                    <div class="input-group">
                      <input type="text" class="form-control text-center" id="period" name="period" placeholder="Period No." value="<?php echo $inv_period; ?>" readonly="readonly">
                        <span class="input-group-addon">%</span>
                    </div>
                  </div>
                </div>
              </div>


            <div class="col-md-12">
              <div class="row">
                <label>Remark :</label>
                <textarea rows="4" cols="185" class="form-control" name="remark" id="remark"></textarea>
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
              <div class="table-responsive" id="invoicedown">
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
                  <tbody>
                    
                    <?php $i=1; foreach ($det as $dee) {
                      ?>
                      <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php $sys = $this->db->query("select * from  system where systemcode = $dee->inv_system")->result(); 
                        foreach ($sys as $kd) {
                      ?>
                      <input type="hidden" name="systemcode[]" id="systemcode<?php echo $i; ?>" value="<?php echo $kd->systemcode; ?>">
                      <?php
                        echo $kd->systemname;
                        }
                      ?>
                      </td>
                      <td>
                        <input type="hidden" name="chk[]" id="chk" value="Y" class="form-control">
                        <input style="text-align: center;width: 100px;" type="text" name="progressamt[]" id="downamti<?php echo $i; ?>" value="<?php echo $dee->inv_retentionamt; ?>" class="form-control">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="vati[]" id="vati<?php echo $i; ?>" value="<?php echo $dee->inv_vatamt; ?>" readonly="readonly">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="netamti[]" id="netamti<?php echo $i; ?>" value="<?php echo $dee->inv_netamt; ?>" readonly="readonly">
                      </td>
                      <td></td>
                      <td></td>
                      <script>
              $("#downamti<?php echo $i; ?>").keyup(function(){
                var down = parseFloat($("#downamti<?php echo $i; ?>").val());
                var vat = parseFloat($("#vatper").val());
                var vatamt = (down*vat/100);
                var downamt = parseFloat((down*vat/100)+down);
                $("#downamti<?php echo $i; ?>").val(down);
                $("#vati<?php echo $i; ?>").val(vatamt);
                $("#netamti<?php echo $i; ?>").val(downamt);

                });
              
            </script>
                      <?php
                    $i++; } ?> 
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            <br>
            <div class="text-right">
                <a href="<?php echo base_url(); ?>ar/invoice_retention/<?php echo $inv_project; ?>"  class="btn btn-info"><i class="icon-plus22"></i>New</a>
                <a id="print" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invretention_report.mrt&id=<?php echo $inv_no; ?>&period=<?php echo $period; ?>" class="btn btn-primary" target="_blank"><i class="icon-printer4"></i>Print</a>
                <button type="button" class="btn btn-success" id="saveinvre"><i class="icon-box-add"></i> Save </button>
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
        </div>
      </form>
    </div>               
  </div>
</div>
           <script>

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
       var cr = ($("#crterm").val());
      if (cr != 0) {
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

    $("#forminvre").submit();
    }else{
alert("กรุณากรอก Credit Term");
      }
  });
$(document).on('click', 'a#remove', function () { // <-- changes


    // Initialize

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
