<style type="text/css">
  .Budget{
    /*display:none;*/
  }
</style>

<script type="text/javascript">
   $('#journal').attr('class', 'acvtive');
</script>
 <form name="formglpost"  id="formglpost" method="post" action="<?php echo base_url(); ?>gl_active/addjournal" > 
    <div class="content">
      <!-- Input group addons -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <div class="col-xs-12">
          <h3 class="panel-title">Journal_vocher</h3>
        </div>

          <!-- <div class="heading-elements">
            <ul class="icons-list">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i> <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#" data-toggle="modal" data-target="">FA Depreciation</a></li>
                  <li><a data-toggle="modal" data-target="">FA Write off</a></li>
                  <li><a data-toggle="modal" data-target="">IC</a></li>
                  <li><a data-toggle="modal" data-target="">Copy Voucher</a></li>
                  <li><a data-toggle="modal" data-target="">Reverse Voucher</a></li>
                  <li><a data-toggle="modal" data-target="">Rental</a></li>
                  <li><a data-toggle="modal" data-target="">Real Estate</a></li>
                  <li><a data-toggle="modal" data-target="">RE Cheque</a></li>
                  <li><a data-toggle="modal" data-target="">MA to GL</a></li>
                </ul>
              </li>
            </ul>
          </div> -->
        
          <div class="panel-body">

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Voucher No :</label>
              <input type="text" id="vchno" name="vchno" class="form-control" readonly="true" >
              <input type="hidden" id="chkii" name="chkii" value="" class="form-control" readonly="true" >
              <input type="text" id="chk_i_u" name="chk_i_u" value="I" class="form-control" readonly="true" >
            </div>

            <div class="form-group col-sm-2">
              <label for="">Date :</label>
              <input type="date" id="vchdate" name="vchdate" class="form-control">
            </div>

            <div class="form-group col-sm-2">
              <label for="">GL Year :</label>
              <input type="text" id="glyear" name="glyear" value="" class="form-control" readonly="true" >
            </div>

            <div class="form-group col-sm-2">
              <label for="">GL Period :</label>
              <input type="text" id="glperiod" name="glperiod" value="" class="form-control" readonly="true" >
            </div>
            <div class="form-group col-sm-3">
              <label for="">Data Type :</label>
              <select name="datatype" class="form-control">
                  <option value="1">Normal</option>
                  <option value="2">Head Office</option>
              </select>
            </div>
          </div>          
          <div class="row">
            <div class="form-group col-sm-2">
              <label for="">Book Account :</label>
              <input type="text" id="bookcode" name="bookcode" class="form-control" readonly="true">
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">&nbsp;&nbsp;&nbsp;</label>
                <div class="input-group" id="errorcost">
                    <input type="text" id="bookname" name="bookname" readonly="true" class="form-control">
                    <span class="input-group-btn">
                       <a class="bookn btn btn-primary btn-sm" data-toggle="modal" data-target="#bookn"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                    </span>
                </div>
              </div>
            </div>
            <div class="form-group col-sm-3">
                <label for="">Referent No. :</label>
                <input type="text" name="refnoo" id="refnoo" class="form-control">
            </div>
            <div class="form-group col-sm-3">
                <label for="">Ref Date :</label>
                <input type="date" id="refdate" name="refdate" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-2">
                <label for="">HR No. </label>
                <input type="text" name="hrno" id="hrno" class="form-control" readonly>
            </div>
            <div class="form-group col-sm-2">
                <label for="">#Deprectation</label>
                <input type="text" name="deprec" id="deprec" class="form-control" readonly>
            </div>
            <div class="form-group col-sm-2">
                <label for="">#Write Off</label>
                <input type="text" name="woff" id="woff" class="form-control" readonly>
            </div>
             
            <div class="form-group col-sm-1">
                <label for="">Module</label>
                <input type="text" name="module" id="module" class="form-control" value="GL" readonly>
            </div>

            <div class="form-group col-sm-1">
                <label for="">&nbsp;</label>
                <input type="text" name="type" id="typei" class="form-control" value="GL" readonly>
            </div>

          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="">Remark :</label>
              <textarea class="form-control" id="remark" name="remark"></textarea>
            </div>
            <div class="form-group col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="pucost1" id="pucost1"  >
                  <input type="hidden" name="pucost" id="pucost" value="false">
                    PU Cost
                </label>
              </div>   
              <script>  
              $("#vchdate").change(function(event) {
                var de_date = $("#vchdate").val();
                var y = de_date.slice(0,4); 
                var m = de_date.slice(5,7);

                $("#glperiod").val(m);
                $("#glyear").val(y);         

              });  
                $("#pucost1").click(function(){
                  var check =  $("#pucost1").prop('checked');
                  if(check){
                    $("#pucost").val("true");   
                  }else{
                    $("#pucost").val("false");
                  }                           
                      }
                    ); 
              </script>             
              <!-- <div class="checkbox">
                <label>
                  <input type="checkbox" name="printform1" id="printform1">
                  <input type="hidden" name="printform" id="printform" value="false">
                  Print Form
                </label>
              </div> -->
              <script>   
                $("#printform1").click(function(){
                 var check =  $("#printform1").prop('checked');
                  if(check){
                    $("#printform").val("true"); 
                  }else{
                    $("#printform").val("false");
                  }                           
                      }
                    ); 
              </script> 
              <!-- <div class="checkbox">
                <label>
                  <input type="checkbox" name="auto1" id="auto1">
                  <input type="hidden" name="auto" id="auto" value="false">
                  Auto Dept,credit
                </label>
              </div> -->
              <script>   
                $("#auto1").click(function(){
                 var check =  $("#auto1").prop('checked');
                  if(check){
                   $("#auto").val("true");
                  }else{
                    $("#auto").val("false");
                  }       
                                        
                      }
                    ); 
              </script> 
              <input type="hidden" name="hites" id="hites">
            </div>
          </div>
          <div class="row">
              <div class="form-group col-sm-12">
              <div id="writeoff_h"></div>
            </div>
          </div>
        </div>
        <div class="panel panel-flat">
          <div class="panel-body">
            <div class="row">
            <div class="col-xs-6">
              <button type="button" class="deprecation btn bg-teal btn-sm" data-toggle="modal">FA Deprecation</button>
              <button type="button" class="writoff btn bg-teal btn-sm" data-toggle="modal">FA Write Off</button>
              <button type="button" class="modal_ic btn bg-teal btn-sm" data-toggle="modal">IC</button>
              <button type="button" class="copyvocher btn bg-teal btn-sm" data-toggle="modal">Copy Voucher</button>
              <button type="button" class="reverse btn bg-teal btn-sm" data-toggle="modal">Reverse Voucher</button>
             
            </div>
            <div class="col-xs-6">
              <a class="insrows pull-right btn btn-success"><i class="icon-plus2"></i>เพิ่ม</a>

            </div>
          </div>
            <br>

            <div class="row" id="table">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">A/C</th>
                    <th class="text-center">Project / Department</th>
                    <th class="text-center">System</th>
                    <th class="text-center">Cost code</th>
                    <th class="text-center">Budget Control</th>
                    <th class="text-center">Dr</th>
                    <th class="text-center">Cr.</th>
                    <th class="text-center">Receive type</th>
                    <th class="text-center">Decription</th>
                    <th class="text-center">Ref No.</th>
                    <th class="text-center">Ref.Date</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">%</th>
                    <th class="text-center">Tax Amount</th>
                    <th class="text-center">Vender</th>
                    <th class="text-center">Customer</th>
                    
                    <th class="text-center">TAX</th>
                    <th class="text-center">Tax No.</th>
                    <th class="text-center">Tax/WT Date</th>
                    <th class="text-center">Tax Description</th>
                    <th class="text-center">Tax Type</th>
                    <th class="text-center">Tax/Personal ID</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">W/T No.</th>
                  </tr>
                </thead>
                <tbody id="bodygl">
                  <tr>
                  </tr>
                </tbody>
                    <td colspan="6">Total</td>
                    <td><input type="text" id="damt" style="text-align: right;" readonly="" name="sffumdr" class="form-control" style="width: 150px;" value="0"></td>
                    <td><input type="text" id="camt" style="text-align: right;" readonly="" name="sffumcr" class="form-control" style="width: 150px;" value="0"></td>
                  </tr>
              </table>
            </div>
          </div>
        <br>
           
          <div class="text-right">
              <!-- <a type="button" class="openpr btn btn-default btn-sm" data-toggle="modal" data-target="#archive"><i class="icon-list-numbered"></i>Archive</a> -->
              <a onclick="javascript:location.reload();" class="btn btn-default btn-sm"><i class="icon-plus22"></i>New</a>
              <button type="button" class="loadjournal btn btn-info btn-sm" data-toggle="modal" data-target="#retrive"><i class=" icon-floppy-disk position-left"></i> Retrive </button>
              <button type="button" id="savevocher" class="save btn bg-success"><i class="icon-floppy-disk position-left"></i> Save </button>
              <a id="" href="<?php echo base_url(); ?>" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
              <!-- <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-download"></i> Import</a> -->
          </div>
      </div>
  </div>
<!-- <div class="panel panel-flat"> -->
<!-- content -->
</form>

<div class="modal fade" id="retrive"  data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Journal Vocher</h4>
      </div>
      <div class="modal-body">
        <div id="loadjournal">

        </div>
      </div>

    </div>
  </div>
</div>

           <script>
            $('.loadjournal').click(function(event) {
              $('#loadjournal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#loadjournal").load('<?php echo base_url(); ?>index.php/share/loadjournal');
            });
          </script>


<script type="text/javascript">
  $("#savevocher").click(function(e){
    var smcr = parseFloat($("#camt").val());
    var smdr = parseFloat($("#damt").val());
    var url="<?php echo base_url(); ?>gl_active/selectdate";
    var chk_i_u = $('#chk_i_u').val();
    var dataSet={
        d: $("#vchdate").val(),
        y: $("#glyear").val(),
        m: $("#glperiod").val()
        };

      $.post(url,dataSet,function(data){
        console.log($.trim(data));
  
      if ($.trim(data)!="Y") {
        
        swal({
          title: "งวดบัญชีผิด กรุณาเลือกวันที่ใหม่ !!.",
          text: "",
          confirmButtonColor: "#EA1923",
          type: "error"
        });
      
      }else if(smdr != smcr){
        swal({
          title: "Credit and Debit Not Balance!",
          confirmButtonColor: "#FF0000",
        });
      }else if(smdr == 0){
        swal({
          title: "Credit and Debit Not Balance!",
          confirmButtonColor: "#FF0000",
        });
      }else if(smcr == 0){
        swal({
          title: "Credit and Debit Not Balance!",
          confirmButtonColor: "#FF0000",
        });
      }else if($("#vchdate").val()==""){
        swal({
            title: "กรุณาเลือกวันที่!!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
             var frm = $('#formglpost');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {

                              console.log(data);
                        swal({
                                  title: data,
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
      
                        setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>gl/journalvocher/";
                        }, 100);
                       
                    }
                });
                ev.preventDefault();

            });
          $("#formglpost").submit(); //Submit  the FORM
      }
  });


        
      });
</script>


<div id="Account" class="modal fade">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h5 class="modal-title">GL</h5>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="form-group col-sm-1">
              <label for="">Account Code :</label>
              <input type="text" id="ac_code" name="ac_code" class="form-control" readonly="true">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Account Name:</label>
            <div class="input-group" id="errorcost">
              <input type="text" id="act_name" name="act_name" class="form-control" readonly="true">
              <span class="input-group-btn">
                     <a class="acc btn btn-primary btn-sm" data-toggle="modal" data-target="#accnc"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
              </span>
            </div>
          </div>
          <div class="form-group col-sm-1">
            <label for="">Project :</label>
            <input type="text" id="pre_event" name="pre_event" class="form-control" readonly="true">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Project Name:</label>
            <div class="input-group" id="errorcost">
              <input type="text" id="pre_eventname" name="pre_eventname" class="form-control" readonly="true">
              <span class="input-group-btn">
                <a class="project btn btn-primary btn-sm" data-toggle="modal" data-target="#project"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
              </span>
            </div>
          </div>
        
          <div class="form-group col-sm-1">
            <label for="">Job Code :</label>
            <input type="text" id="jobcode" name="jobcode" class="form-control" readonly="true">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Job Name :</label>
            <div class="input-group" id="errorcost">
              <input type="text" id="systemname" name="systemname" class="form-control" readonly="true">
              <span class="input-group-btn">
                <a class="sy btn btn-primary btn-sm" data-toggle="modal" data-target="#system"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
              </span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-1">
            <label for="">Department ID:</label>
            <input type="text" id="dpt_code" name="dpt_code" class="form-control" readonly="true">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Department Title:</label>
            <div class="input-group" id="errorcost">
              <input type="text" id="dpt_title" name="dpt_title" class="form-control" readonly="true">
              <span class="input-group-btn">
                <a class="dptid btn btn-primary btn-sm" data-toggle="modal" data-target="#dpt"><span class="glyphicon glyphicon-search"></span>ค้นหา</a>
              </span>
            </div>
          </div>
          <div class="form-group col-sm-2">
            <label for="">Dr :</label>
            <input type="text" id="amtdr" name="amtdr" class="form-control" value="0">
          </div>
          <div class="form-group col-sm-2">
            <label for="">Cr :</label>
            <input type="text" id="amtcr" name="amtcr" class="form-control" value="0">
          </div>
          <div class="form-group col-sm-4">
            <label for="">Cost Code :</label>
              <div class="input-group" id="errorcost">
           <input type="text" id="costnameint" readonly="true"  class="form-control input-sm">
           <input type="text" id="codecostcodeint" readonly="true" class="form-control input-sm">
             <span class="input-group-btn" >
               <a class="modalcost btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
             </span>
         </div>
          </div>
        </div>
        <div class="row">  
          <div class="form-group col-sm-2">
            <label for="">Paid/Receive type</label>
            <input type="text" id="varchar" name="varchar" class="form-control">
          </div>
        
          <div class="form-group col-sm-1">
            <label for="">Vendor :</label>
            <input type="text" id="acct_no" name="acct_no" class="form-control" readonly="true">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Vendor Name :</label>
              <div class="input-group" id="errorcost">
              <input type="text" id="namevendor" name="namevendor" class="form-control" readonly="true">
              <span class="input-group-btn">
                <a class="vendor btn btn-primary btn-sm" data-toggle="modal" data-target="#vendor"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
              </span>
            </div>
          </div>
          <div class="form-group col-sm-3">
            <label for="">Customer Name :</label>
            <div class="input-group" id="errorcost">
              <input type="text" id="ownername_th" name="namecus" class="form-control" readonly="true">
              <span class="input-group-btn">
                <a class="namecus btn btn-primary btn-sm" data-toggle="modal" data-target="#namecustomer"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
              </span>
            </div>
          </div>
          <div class="form-group col-sm-3">
            <label for="">Description :</label>
            <textarea type="text" id="gldesc" name="gldesc" class="form-control"></textarea>
        </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-3">
            <label for="">Ref.no :</label>
              <input type="text" id="ftno" name="ftno" class="form-control">            
          </div>
          <div class="form-group col-sm-3">
            <label for="">Ref.Date :</label>
            <input type="date" id="refdocdate" name="refdocdate" class="form-control daterange-single">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Tax :</label>
              <div class="form-group">
                <select name="tax" id="taxx" class="form-control">
                  <option value=""></option>
                  <option value="wt">W/T</option>
                  <option value="vat">VAT</option>
                </select>
              </div>            
          </div>
          <div class="form-group col-sm-3">
            <label for="">Tax No.</label>
            <input type="text" id="taxnoo" name="taxnoo" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-3">
            <label for="">Tax/WT Date</label>
              <input type="date" id="taxdate" name="taxdate" class="form-control daterange-single">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Tax Description</label>
            <div class="form-group">
              <select name="taxdes" id="taxdes" class="form-control">
                <option value="0">ไม่มี</option>
                <option value="1">ค่าบริการ</option>
                <option value="2">ค่าขนส่ง</option>
                <option value="3">ค่าเช่า</option>
                <option value="4">ค่าโฆษณา</option>
              </select>
            </div> 
          </div>
          <div class="form-group col-sm-3">
            <label for="">Amount</label>
              <input type="text" id="amount" name="amount" class="form-control">
          </div>
          <div class="form-group col-sm-3">
            <label for="">%</label>
            <input type="text" id="percent" name="percent" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-3">
            <label for="">Tax Amount</label>
              <input type="text" id="taxamount" name="taxamount" class="form-control">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Tax Type</label>
            <div class="form-group">
              <select name="taxtypes" id="taxtype" class="form-control">
                <option value="1">ภ.ง.ด. 1</option>
                <option value="2">ภ.ง.ด. 2</option>
                <option value="3">ภ.ง.ด. 3</option>
                <option value="53">ภ.ง.ด. 53</option>
                <option value="54">ภ.ง.ด. 54</option>
              </select>
            </div> 
          </div>
          <div class="form-group col-sm-3">
            <label for="">Tax/Personal ID</label>
              <input type="text" id="taxper" name="taxper" class="form-control">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Vendor/Customer</label>
            <input type="text" id="vencust" name="vencust" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-3">
            <label for="">Address 1</label>
              <input type="text" id="add1" name="add1" class="form-control">
          </div>
          <div class="form-group col-sm-3">
            <label for="">Address 2</label>
            <input type="text" id="add2" name="add2" class="form-control">
          </div>
          <div class="form-group col-sm-3">
            <label for="">W/T No.</label>
              <input type="text" id="wtno" name="wtno" class="form-control">
          </div>
        </div>
      <!-- <hr> -->
      <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
          <a id="insertpodetail" type="button" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</a>
      </div>
      </div>
    </div>
  </div>
</div>


<!-- ikool009 -->
<div class="modal fade" id="costcode_controll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">เพิ่มรายการต้นทุน</h4>
      </div>
      <div class="modal-body">
        <div id="costcode_controll_content"></div>
      </div>
    </div>
  </div>
</div>
<!-- ikool009 -->

<div class="modal fade" id="bookn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Book Account</h4>
      </div>
      <div class="modal-body">
        <div id="modal_cost"></div>
      </div>
    </div>
  </div>
</div>
<script>
  $(".bookn").click(function(){
         $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
         $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/book');
      });
</script>
<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>GL</h4>
      </div>
      <div class="modal-body">
        <div id="modal_costcode"></div>
      </div>
    </div>
  </div>
</div>

<div id="archive" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Archive</h5>
      </div>
      <div class="modal-body">
        <div id="loadarchive">
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

<div class="modal fade" id="project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="projectmeka"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="vendormodel"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="namecustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="namecusmodel"></div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="accnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="acccode"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="system" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="systemcn"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="dpt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">GL</h4>
      </div>
      <div class="modal-body">
        <div id="departmentid"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="boq"  data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
      </div>
      <div class="modal-body">
        <div class="row" id="modal_boq">
        </div>
      </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->
<script>

</script>


<div id="modalbank"></div>
        <div id="modalaccountcode"></div>
        <div id="modalproj"></div>
        <div id="modalj"></div>
        <div id="modaldepart"></div>
        <div id="modalvender"></div>
        <div id="modalcustomer"></div>
<script>
  $("#amount").keyup(function(event) {
    var am = parseFloat($("#amount").val());
    var per = parseFloat($("#percent").val());
    var sumper = (am*per)/100;
    $("#taxamount").val(sumper);
  });
</script>

<script>   
    $("#taxx").change(function(event) {
      if ($("#taxx").val()=='wt') {
        $("#hites").val('wt');
      }
    });

    
    // function vender(el) {
    //   var row_id = el.attr('attr-id');
    //   var code = el.attr('code');
    //   var v_name = el.attr('v_name');
    //   alert('row_id ='+row_id +' code ='+code+' v_name ='+v_name);
    //   // $('')
    //   // attr-id code
    //   // ven_code ven_name
    //   $('#ven_code'+row_id).val(code);
    //   $('#ven_name'+row_id).val(v_name);
    // }
</script>


<!-- ikool009 -->

<script type="text/javascript">
    function set_data_el(el){
       var cost_code = el.attr("cost_code");
       var row = el.attr("row");
       var boq_id = el.attr("boq_id");
       var tender_id = el.attr("tender_id");
       var total_bg = el.attr("total"); 
       //alert(row);
       $(".costcodetext"+row).val(cost_code);
       $("#boq_id"+row).val(boq_id);
       $("#bd_tender"+row).val(tender_id);
       $("#Budget"+row).html('<input type="text" boq_id="'+boq_id+'" style="width: 100px;" readonly class="form-control boq_id'+boq_id+'" id="bg_controll'+row+'"/>');
       $("#dr"+row).attr("boq_id",boq_id);
       $("#dr"+row).attr("onkeyup","cut_bg($(this))");
       $("#bg_controll"+row).val(total_bg);
        //alert(cost_code);

    }
</script>
<!-- ikool009 -->

<!-- ikool009 -->
<script type="text/javascript">
    function get_modal_costcode(bd_tenid,system_code,content_modal,row){

      //alert(content_modal);
      var url_get_modal = "<?=base_url()?>gl/get_modal_costcode";
         $.post(url_get_modal, {bd_tenid: bd_tenid ,system_code:system_code,row:row}, function() {
           
         }).done(function(data){

            content_modal.html(data);

         });
    }
</script>
<!-- ikool009 -->

<!-- ikool009 -->
<script type="text/javascript">
    function click_show_modal(el){
      //alert(555)

          var bd_tenid = el.attr("bd_tenid");
          var system = el.attr("system");
          var row = el.attr("row");
         
          get_modal_costcode(bd_tenid,system,$("#costcode_controll_content"),row);
    }
</script>
<!-- ikool009 -->

<!-- ikool009 -->
<script type="text/javascript">
    var hide_Budget = 0;
    // $(".Budget").hide();

    // function_ice ikoool009
    function get_Budget_by_project(proj_id = null,system_code = null , row){

        


       var my_costcode_not_controll =  ''+
              '<div class="input-group">'+
                '<input type="text" style="width: 100px;"  class="form-control" readonly="readonly" placeholder="Costcode" value="" name="costcode[]" id="costcodetext'+row+'">'+

                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencost'+row+'"  class="opencost btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '';

      
        if(proj_id != null && system_code != null && system_code != ""){
          var url_ajax = "<?=base_url()?>gl/get_tenid_by_project";

          $.post(url_ajax, {project_id: proj_id , system_code:system_code }, function() {
            
          }).done(function(data){
            var json = jQuery.parseJSON(data);

              try{
               
                  if(json[0].controlbg == 2){
                      
                                          
                       var my_modal_costcode = ''+
                        '<div class="input-group" id="control_cost"'+row+'">'+
                          '<input type="text" style="width: 100px;"  class="form-control costcodetext'+row+'" readonly="readonly" placeholder="Costcode controll" value="" name="costcode[]" id="costcodetext'+row+'">'+

                          '<div class="input-group-btn">'+
                            '<button type="button" bd_tenid="'+json[0].bd_tenid+'"  system="'+system_code+'" data-toggle="modal" data-target="#costcode_controll" onclick="click_show_modal($(this))" row="'+row+'"  class="opencost btn btn-default btn-icon" ><i class="icon-search4"></i></button>'+
                          '</div>'+
                        '</div>'+
                      '';


                      
                      // $("#origin"+row).remove();
                      // $("#Costcode"+row).html(my_modal_costcode);
                      // $("#Costcode"+row).show();

                    

                  }else{
                    // $("#Costcode"+row).remove();
                    // $("#origin"+row).show();
                 
                  }
              }catch(e){

              }              
          
          });
          
        }
       
        


       
    }

</script>
<!-- ikool009 -->




<script>   
    $("#taxdes").change(function(event) {
      if ($("#taxdes").val()==0) {
        $("#percent").val(0);
      }else if($("#taxdes").val()==1){
         $("#percent").val(3);
      }else if($("#taxdes").val()==2){
         $("#percent").val(1);
      }else if($("#taxdes").val()==3){
         $("#percent").val(5);
         $("#taxtype").val(3);
      }else if($("#taxdes").val()==4){
         $("#percent").val(2);
      }

    var vat = $("#percent").val();
    var amount = $("#amount").val();
    var vvvv = vat*amount/100;
    var xxxx = vvvv.toFixed(2);
     $("#taxamount").val(xxxx);  
    });
</script>
<script type="text/javascript">
  //ikool009
  function openacc(el){
      
          var row = el.attr("row");
          //alert(555)
          $('#acc'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#acc"+row).load('<?php echo base_url(); ?>index.php/share/accchart/'+row);
  }
  //ikool009
</script>


<script>
  $(".deprecation").click(function(){
    if ($("#bookcode").val()==0) {
        swal({
            title: "กรุณาเลือก Book Account !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
        $('#fa_deprecation').modal('show');
      }
 });


    $(".writoff").click(function(){
    if ($("#bookcode").val()==0) {
        swal({
            title: "กรุณาเลือก Book Account !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
        $('#writoff').modal('show');
      }


 });


        $('.modal_ic').click(function(event) {
      if ($("#bookcode").val()==0) {
        swal({
            title: "กรุณาเลือก Book Account !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
        $('#modal_ic').modal('show');
      }
    });

        


    $('.copyvocher').click(function(event) {
      if ($("#bookcode").val()==0) {
        swal({
            title: "กรุณาเลือก Book Account !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
        $('#copyvocher').modal('show');
      }
    });

    $('.reverse').click(function(event) {
      if ($("#bookcode").val()==0) {
        swal({
            title: "กรุณาเลือก Book Account !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
        $('#reverse').modal('show');
      }
    });

    $('.rental').click(function(event) {
      if ($("#bookcode").val()==0) {
        swal({
            title: "กรุณาเลือก Book Account !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
        $('#rental').modal('show');
      }
    });
    $("#vchdate").change(function(event) {
    var de_date = $("#vchdate").val();
    var y = de_date.slice(0,4); 
    var m = de_date.slice(5,7);

    $("#glperiod").val(m);
    $("#glyear").val(y);         

    }); 
            
  $(".insrows").click(function(){
    if ($("#bookcode").val()==0) {
        swal({
            title: "กรุณาเลือก Book Account !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }else{
        addrow();


      }


         $(".openacc").click(function(){
        
        });
  });
  function costmat(el) {
    var id = el.attr('attr-id');
    var control = el.attr('control');
    var sys = el.attr('sys');
    var tender = el.attr('tender');

    // if(control === undefined || sys === undefined) {
    //     swal({
    //       title: "กรุณาเลือก project และ system !!.",
    //       text: "",
    //       confirmButtonColor: "#EA1923",
    //       type: "error"
    //     });
    // }else{

      if (control == 2) {
        // alert(tender +'  '+sys);
        $('#boq').modal('show');
        $('#modal_boq').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_boq").load('<?php echo base_url(); ?>pr/model_costcodeboq/'+tender+'/'+sys+'/'+id);
      }else{
        // alert('modal notcontrol' +id);
        $('#boq').modal('show');
        $('#modal_boq').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_boq").load('<?php echo base_url(); ?>index.php/share/costcode/'+id);
      }
    // }
    // control 1 notcontrol 2 control

    // alert('id :'+id+' control: '+control +tender);
  }



   function addrow(){
        var row = ($('#bodygl tr').length-1)+1;

        var tr = '<tr>'+
            '<td>'+row+'<input type="hidden" value="'+row+'" id="chki'+row+'" name="chki[]"><input type="hidden" value="" id="chkitype'+row+'" name="chkitype[]"><input type="hidden" value="" id="ref'+row+'" name="ref[]"></td>'+
            '<td>'+
              '<div class="input-group">'+
                '<input _ice_ type="text" readonly="true" value="" class="form-control input-sm" name="acc_code[]" id="acc_code'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control input-sm" readonly="readonly"  value="" name="acc_name[]" id="act_name'+row+'">'+
                
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openacc'+row+'" row="'+row+'" onclick="openacc($(this))"  class="openacc btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //account code
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control input-sm" readonly="readonly" placeholder="Project Name " value="" name="pro_name[]" id="pro_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="" class="form-control input-sm" name="pro_code[]" id="pro_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openpro'+row+'"  class="openpro btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //project
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 150px;"  class="form-control input-sm" readonly="readonly" placeholder="System Name " value="" name="sys_name[]" id="sys_name'+row+'">'+
                '<input type="hidden" _ice_ readonly="true" value="" class="form-control input-sm" name="sys_code[]" id="sys_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opensys'+row+'"  class="opensys btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //system
            
            '<td >'+
              '<div class="input-group" id="origin'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control input-sm" readonly="readonly" placeholder="Costcode" value="" name="costcode[]" id="costcodetext'+row+'">'+
                '<input type="text" style="width: 200px;"  class="form-control input-sm" readonly="readonly" placeholder="Cost Name" name="costname[]" id="costnamei'+row+'">'+
                  '<span class="input-group-btn" >'+
                   '<a class="costmat btn btn-info btn-sm " onclick="costmat($(this))" id="btncost'+row+'" attr-id='+row+' data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                    // '<a class="btn btn-info btn-sm  " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                '</span>'+
              '<div id="Costcode'+row+'"></div>'+

            '</td>'+
            //costcode

            // //Budget Control
            '<td  class="text-center">'+
            '<div id="Budget'+row+'" >-</div>'+

            '<input value="" type="hidden" id="total_bal'+row+'" name=total_bal[] type="text" />'+
            '<input value="" type="hidden" id="boq_id'+row+'" name=boq_id[] type="text" />'+
            '<input value="" type="hidden" id="bd_tender'+row+'"  name=bd_tenid[] type="text" />'+
           
            '</td>'+
            // //Budget Control
            '<td>'+
              '<input type="text" style="width: 100px;" value="0"  class="dr form-control text-right" value="" name="dr[]" id="dr'+row+'" ac="#cr'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;" value="0" class="cr form-control text-right" value="" name="cr[]" id="cr'+row+'" ac="#dr'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control input-sm" name="paid[]" id="paid'+row+'" style="width: 100px;">'+
              '<option class="1">Bank(Chq.)</option>'+
              '<option class="2">Cash</option>'+
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;"  class="form-control input-sm" value="" name="description[]" id="description'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="refno[]" id="refno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 150px;"  class="form-control input-sm" value="" name="refdates[]" id="refdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="amt[]" id="amt'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 50px;"  class="form-control input-sm" value="" name="vat[]" id="vat'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="taxamt[]" id="taxamt'+row+'">'+
            '</td>'+

            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control input-sm" readonly="readonly" placeholder="Department Name " value="" name="ven_name[]" id="ven_name'+row+'">'+
                '<input type="hidden" readonly="true" class="form-control input-sm" name="ven_code[]" id="ven_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#openven'+row+'"  class="openven btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //vender
            '<td>'+
              '<div class="input-group">'+
                '<input type="text" style="width: 200px;"  class="form-control input-sm" readonly="readonly" placeholder="Vender Name " value="" name="cus_name[]" id="cus_name'+row+'">'+
                '<input type="hidden" readonly="true" value="" class="form-control input-sm" name="cus_code[]" id="cus_code'+row+'">'+
                '<div class="input-group-btn">'+
                  '<button type="button" data-toggle="modal" data-target="#opencus'+row+'"  class="opencus btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
                '</div>'+
              '</div>'+
            '</td>'+
            //customer
            '<td>'+
              '<select class="form-control input-sm"  id="tax'+row+'" attr-id="'+row+'" style="width: 100px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_tax as $st1) { ?>
              '<option value="<?php echo $st1->id_tax; ?>"><?php echo $st1->tax_name; ?></option>'+
              <?php } ?>
              
              
              '</select>'+
              '<input type="hidden" style="width: 100px;" readonly="true" class="form-control input-sm" value="" name="tax[]" id="taxs'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="taxnos[]" id="taxno'+row+'">'+
            '</td>'+

            '<td>'+
              '<input type="date" style="width: 140px;" class="form-control input-sm" value="" name="taxdates[]" id="taxdate'+row+'">'+
            '</td>'+

            '<td>'+
              '<select class="form-control input-sm" name="taxdesc[]"  id="taxdes'+row+'" style="width: 120px;">'+
              '<option class=""></option>'+
              <?php foreach ($setup_taxdes as $st2) { ?>      
              '<option value="<?php echo $st2->id_taxdes; ?>"><?php echo $st2->tax_desname; ?></option>'+
               <?php } ?>
              '</select>'+
            '</td>'+
            '<td>'+
              '<select class="form-control input-sm" name="taxtype[]"  id="taxtype'+row+'" style="width: 100px;">'+
              '<option value=""></option>'+
              <?php foreach ($taxtype as $s3) { ?>
            '<option value="<?php echo $s3->id_taxtype; ?>"><?php echo $s3->taxtype_name; ?></option>'+
              <?php } ?>
              
              '</select>'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="taxid[]" id="taxid'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 250px;"  class="form-control input-sm" value="" name="address[]" id="address'+row+'">'+
            '</td>'+
            '<td>'+
              '<input type="text" style="width: 100px;"  class="form-control input-sm" value="" name="wt[]" id="wt'+row+'">'+
            '</td>'+

            '</tr>';


            $('#bodygl').append(tr);
            

            var modalbank = '<div class="modal fade" id="opencost'+row+'" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                  '<div class="modal-content">'+
                '<div class="row">'+
                    '<div id="tabbank" class="col-md-6">'+
                        '<h4 id="hbank">xxx</h4>'+
                        '<select multiple class="form-control" id="cost1'+row+'" style="height:200px;">'+
                        '</select>'+
                    '</div>'+
                    '<div id="tabcost2" class="col-md-6">'+
                    '<h4>Branch</h4>'+
                        '<select multiple class="form-control" id="cost2'+row+'" style="height:200px;"></select>'+
                    '</div>'+
                    '<div id="tabcost3" class="col-md-12">'+
                        '<h4>Bank Account</h4>'+
                        '<select multiple class="form-control" id="cost3'+row+'" style="height:200px;">'+
                          '</select>'+
                    '</div>'+
                    '<div id="tabcost4" class="col-md-12">'+
                        '<input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext'+row+'">'+
                    '</div>'+
                '</div>'+
                '<br>'+
                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                  '<button type="button" id="select'+row+'" class="btn btn-primary" data-dismiss="modal">SELECT</button>'+
                '</div>'+
                  '</div>'+
                '</div>'+
              '</div>';
            $("#modalbank").append(modalbank);

            var modalaccount = '<div class="modal fade" id="openacc'+row+'" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>"+
                "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
                "<h5 class='modal-title'>Book Account</h5>"+
                "</div>"+
                "<div class='modal-body'>"+
                '<div id="acc'+row+'">'+

                "</div>"+
              '</div>';
            $("#modalaccountcode").append(modalaccount);

            var modalpro = '<div id="openpro'+row+'" class="modal fade" data-backdrop="false">'+
              " <div class='modal-dialog modal-lg'>"+
              "<div class='modal-content'>"+
              "<div class='modal-header'>"+
              "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
              "<h5 class='modal-title'>Project </h5>"+
              "</div>"+
              "<div class='modal-body'>"+
              "<div>"+
              "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
              "<thead>"+
              "<tr>"+
              "<th>รหัสโครงการ</th>"+
              "<th>ชื่อโครงการ</th>"+
              "<th>เลือก</th>"+
              "</tr>"+
              "</thead>"+
              "<tbody>"+
              "<?php foreach ($proj as $pro){ ?>"+
              "<tr>"+
              "<td><?php echo $pro->project_code; ?></td>"+
              "<td><?php echo $pro->project_name; ?></td>"+
              '<td><button class="proj'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-control="<?=$pro->controlbg?>" data-procode="<?php echo $pro->project_id; ?>" data-proname="<?php echo $pro->project_name; ?>" data-tender="<?=$pro->bd_tenid;?>" data-dismiss="modal">เลือก</button></td>'+
              "</tr>"+
              "<?php } ?>"+
              "</tbody>"+
              "</table>"+
              "</div>"+
              "</div>";
          $("#modalproj").append(modalpro);

          var modaljob = '<div id="opensys'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>System</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสระบบ</th>"+
            "<th>ชื่อระบบ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($system as $sys){ ?>"+
            "<tr>"+
            "<td><?php echo $sys->systemcode; ?></td>"+
            "<td><?php echo $sys->systemname; ?></td>"+
            '<td><button class="sys'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-syscode="<?php echo $sys->systemcode; ?>" data-sysname="<?php echo $sys->systemname; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalj").append(modaljob);

          var modaldep = '<div id="opendep'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Department</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสแผนก</th>"+
            "<th>ชื่อแผนก</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($depart as $dep){ ?>"+
            "<tr>"+
            "<td><?php echo $dep->department_code; ?></td>"+
            "<td><?php echo $dep->department_title; ?></td>"+
            '<td><button class="dep'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-depcode="<?php echo $dep->department_code; ?>" data-depname="<?php echo $dep->department_title; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modaldepart").append(modaldep);

          var modalven = '<div id="openven'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Vender</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>รหัสอร้านค้า</th>"+
            "<th>ชื่อร้านค้า</th>"+
            "<th>ที่อยู่ร้านค้า</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($vender as $ven){ ?>"+
            "<tr>"+
            "<td><?php echo $ven->vender_code; ?></td>"+

            "<td><?php echo $ven->vender_name; ?></td>"+
            "<td><?php echo $ven->vender_address; ?></td>"+
            '<td><button type="button" data-vencode="<?=$ven->vender_code;?>" data-venname="<?=$ven->vender_name;?>" data-venaddress="<?=$ven->vender_address;?>" class="ven'+row+' btn btn-xs btn-block btn-info" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalvender").append(modalven);
          
          var modalcus = '<div id="opencus'+row+'" class="modal fade" data-backdrop="false">'+
            " <div class='modal-dialog modal-lg'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
            "<button type='button' class='close' data-dismiss='modal'>&times;</button>"+
            "<h5 class='modal-title'>Customer</h5>"+
            "</div>"+
            "<div class='modal-body'>"+
            "<div>"+
            "<table class='table table-striped table-bordered table-xxs table-hover datatable-basic' >"+
            "<thead>"+
            "<tr>"+
            "<th>ชื่อลูกค้า</th>"+
            "<th>แผนก/โครงการ</th>"+
            "<th>เลือก</th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<?php foreach ($customer as $cus){ ?>"+
            "<tr>"+
            "<td><?php echo $cus->m_code; ?></td>"+
            "<td><?php echo $cus->m_name; ?></td>"+
            '<td><button class="cus'+row+' btn btn-xs btn-block btn-info" data-toggle="modal" data-cuscode="<?php echo $cus->m_code; ?>" data-cusaddress="<?php echo $cus->emp_address_now; ?>" data-cusname="<?php echo $cus->m_name; ?>" data-dismiss="modal">เลือก</button></td>'+
            "</tr>"+
            "<?php } ?>"+
            "</tbody>"+
            "</table>"+
            "</div>"+
            "</div>";
          $("#modalcustomer").append(modalcus);
          // event click dr id#

          var damt = 0;
          var camt = 0;



          $("input[id^='dr'] , input[id^='cr']").keyup(function(event) {
              
             
            var el_ac = $(this).attr('ac');
              $(el_ac).val(0);
            
              damt = 0;

              $("input[id^='dr']").each(function(index, el) {


                
                 damt = damt + $(el).val().replace(/,/g,"")*1; 
              });
              $("#damt").val(numberWithCommas(damt));

              camt = 0;

              $("input[id^='cr']").each(function(index, el) {
                
                 camt = camt + $(el).val().replace(/,/g,"")*1; 
              });
            $("#camt").val(numberWithCommas(camt));
          });


$("#tax"+row).change(function(event) {
      var tax = $("#tax"+row);
      if (tax != '1' ) {
         $("#taxno"+row).prop('readonly', false);
         $("#taxdate"+row).prop('readonly', false);
         $("#taxdes"+row).prop('readonly', false);
         $("#taxtype"+row).prop('readonly', false);
         $("#taxid"+row).prop('readonly', false);
         $("#address"+row).prop('readonly', false);
      }else{
        $("#taxno"+row).prop('readonly', true);
         $("#taxdate"+row).prop('readonly', true);
         $("#taxdes"+row).prop('readonly', true);
         $("#taxtype"+row).prop('readonly', true);
         $("#taxid"+row).prop('readonly', true);
         $("#address"+row).prop('readonly', true);
         $("#taxs"+row).val(tax);
      }
});
$("#tax"+row).change(function(event) {

    $("#tax"+row).prop('readonly', true);

});  

$(".sys"+row).click(function(event) {


    if($("#pro_code"+row).val() == ""){
        swal({
            title: "กรุณาเลือก Project !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    }else{
      $("#sys_code"+row).val($(this).data('syscode'));        
      $("#sys_name"+row).val($(this).data('sysname'));
      $("#btncost"+row).attr('sys', $(this).data('syscode'));

      get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);
    }
    //get_Budget_by_project()
});

        $(".books"+row).click(function(event) {
          $("#acc_code"+row).val($(this).data('bookcode'));
          $("#acc_name"+row).val($(this).data('bookname'));
          });

        $(".proj"+row).click(function(event) {
            $("#pro_code"+row).val($(this).data('procode'));
            $("#pro_name"+row).val($(this).data('proname'));
            $("#btncost"+row).attr('control', $(this).data('control'));
            $("#btncost"+row).attr('tender', $(this).data('tender'));
            get_Budget_by_project( $("#pro_code"+row).val() , $("#sys_code"+row).val() , row);

            $("#dep_code"+row).val('');
            $("#dep_name"+row).val('');
          });

        $(".dep"+row).click(function(event) {
          $("#dep_code"+row).val($(this).data('depcode'));
          $("#dep_name"+row).val($(this).data('depname'));
          $("#pro_code"+row).val('');
          $("#pro_name"+row).val('');
          $("#sys_code"+row).val('');
          $("#sys_name"+row).val('');
          });

        $(".ven"+row).click(function(event) {
          $("#ven_code"+row).val($(this).data('vencode'));
          $("#ven_name"+row).val($(this).data('venname'));
          $("#taxid"+row).val($(this).data('ventax'));
          $("#address"+row).val($(this).data('venaddress'));
          $("#taxtype"+row).val($(this).data('ventaxtype'));
          $("#vat"+row).val($(this).data('vat'));
          });

        $(".cus"+row).click(function(event) {
          $("#cus_code"+row).val($(this).data('cuscode'));
          $("#cus_name"+row).val($(this).data('cusname'));
          $("#address"+row).val($(this).data('cusaddress'));
          });
        $(".opencost").click(function(event) {

          // alert("fff");
          $('#cost1'+row).load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
          $( "#cost1"+row ).change(function() {

            var c1 = $('#cost1'+row).val();
            $('#cost2'+row).load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
            $("#tabcost2"+row).show();
            $("#costcodetext"+row).val(c1);
            $('#cost3'+row).html('');
          });
        
          $( "#cost2"+row ).change(function() {
          var c1 = $('#cost1'+row).val();
           var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
            $("#costcodetext"+row).val(c1+c2);
          });

          $( "#cost3"+row).change(function() {
          var c1 = $('#cost1'+row).val();
          var c2 = $('#cost2'+row).val();
          var c3 = $('#cost3'+row).val();
           $("#costcodetext"+row).val(c1+c2+c3);
           $("#cost-control"+row).show();
          });
        });

          // load
              va = 0;
              $("input[id^='dr']").each(function(index, el) {
                //$(el).val();
                
                 va = va + $(el).val()*1;
                
              });
            $("#damt").val(va);
            // load
  }// end function add row
  
      


       

          // $('.costmat').click(function(){
          //   // alert()
          //   var id = $(this).attr('attr-id');
          //   alert(id);
          // })
       
      
        </script>


<div id="fa_deprecation" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">List Deprecation</h5>
                </div>

                <div class="modal-body">
                    <div id="list_deprecation"></div>
                </div>

               
              </div>
            </div>
          </div>

          <script>
            $('.bookn').click(function(event) {
              $('#list_deprecation').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#list_deprecation").load('<?php echo base_url(); ?>index.php/share/modal_deprecation');
            });
          </script>


          <div id="writoff" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">List Write Off</h5>
                </div>

                <div class="modal-body">
                    <div id="list_writoff"></div>
                </div>

               
              </div>
            </div>
          </div>

          <script>
            $('.bookn').click(function(event) {
              $('#list_writoff').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#list_writoff").load('<?php echo base_url(); ?>index.php/share/modal_writoff');
            });
          </script>

          <div id="modal_ic" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">List IC</h5>
                </div>

                <div class="modal-body">
                    <div id="list_ic"></div>
                </div>

               
              </div>
            </div>
          </div>

          <script>
            $('.bookn').click(function(event) {
              $('#list_ic').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#list_ic").load('<?php echo base_url(); ?>index.php/share/modal_ictranfer');
            });
          </script>



         <div id="copyvocher" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">List Copyvocher</h5>
                </div>

                <div class="modal-body">
                    <div id="list_copyvocher"></div>
                </div>

               
              </div>
            </div>
          </div>

          <script>
            $('.copyvocher').click(function(event) {
              $('#list_copyvocher').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#list_copyvocher").load('<?php echo base_url(); ?>index.php/share/copy_gl');
            });
          </script>


          <div id="reverse" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">List Reverse</h5>
                </div>

                <div class="modal-body">
                    <div id="list_reverse"></div>
                </div>

               
              </div>
            </div>
          </div>


           <script>
            $('.reverse').click(function(event) {
              $('#list_reverse').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#list_reverse").load('<?php echo base_url(); ?>index.php/share/reverse');
            });
          </script>



           

