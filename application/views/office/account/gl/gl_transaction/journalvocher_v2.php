<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">      Dashboard - Journal_vocher</span></h4>
    </div>
  </div>
</div>

 <form name="formglpost"  id="formglpost" method="post" action="<?php echo base_url(); ?>gl_active/addjournal" > 
    <div class="content">
      <!-- Input group addons -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h3 class="panel-title">Journal_vocher</h3>
          <div class="heading-elements">
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
          </div>
        
          <div class="panel-body">

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="">Voucher No :</label>
              <input type="text" id="vchno" name="vchno" class="form-control" readonly="true" >
              <input type="hidden" id="chkii" name="chkii" value="" class="form-control" readonly="true" >
            </div>

            <div class="form-group col-sm-2">
              <label for="">Date :</label>
              <input type="date" id="vchdate" name="vchdate" class="form-control daterange-single">
            </div>

            <div class="form-group col-sm-2">
              <label for="">GL Year :</label>
              <input type="text" id="glyear" name="glyear" value="<?php echo date("Y");?>" class="form-control" readonly="true" >
            </div>

            <div class="form-group col-sm-2">
              <label for="">GL Period :</label>
              <input type="text" id="glperiod" name="glperiod" value="<?php echo date("m");?>" class="form-control" readonly="true" >
            </div>
            <div class="form-group col-sm-3">
              <label for="">Data Type :</label>
              <select name="datatype" class="form-control">
                  <option value="headoffice">Head Office</option>
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
                       <a class="book btn btn-primary btn-sm" data-toggle="modal" data-target="#bookn"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                    </span>
                </div>
              </div>
            </div>
            <div class="form-group col-sm-3">
                <label for="">Referent No. :</label>
                <input type="text" name="refno" id="refno" class="form-control">
            </div>
            <div class="form-group col-sm-3">
                <label for="">Ref Date :</label>
                <input type="date" id="refdate" name="refdate" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-3">
                <label for="">HR No. </label>
                <input type="text" name="hrno" id="hrno" class="form-control" readonly>
            </div>
            <div class="form-group col-sm-3">
                <label for="">#Deprectation</label>
                <input type="text" name="deprec" id="deprec" class="form-control" readonly>
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
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="printform1" id="printform1">
                  <input type="hidden" name="printform" id="printform" value="false">
                  Print Form
                </label>
              </div>
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
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="auto1" id="auto1">
                  <input type="hidden" name="auto" id="auto" value="false">
                  Auto Dept,credit
                </label>
              </div>
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
        </div>
        <div class="panel panel-flat">
          <div class="panel-body">
            <div class="row">
              <button type="button" class="btn btn-info" btn-sm data-toggle="modal" data-target="#Account" id="addrows"><i class="icon-list-numbered"></i>  ADD Rows </button>
              <button type="button" class="btn btn-dafault btn-sm" data-toggle="modal" data-target="#Ins" id="addrows">  Insert Row </button>
            </div>
            <br>
            <div class="row" id="table">
            <div class="table-responsive">
              <table class="table datatable-basic table-xsm table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">A/C</th>
                    <th class="text-center">A/C Name</th>
                    <th class="text-center">Project</th>
                    <th class="text-center">Job</th>
                    <th class="text-center">Job Name</th>
                    <th class="text-center">Dept</th>
                    <th class="text-center">Cost code</th>
                    <th class="text-center">Dr</th>
                    <th class="text-center">Cr.</th>
                    <th class="text-center">Paid/Receive type</th>
                    <th class="text-center">Vendor</th>
                    <th class="text-center">Customer</th>
                    <th class="text-center">Decription</th>
                    <th class="text-center">Ref No.</th>
                    <th class="text-center">Ref.Date</th>
                    <th class="text-center">TAX</th>
                    <th class="text-center">Tax No.</th>
                    <th class="text-center">Tax/WT Date</th>
                    <th class="text-center">Tax Description</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">%</th>
                    <th class="text-center">Tax Amount</th>
                    <th class="text-center">Tax Type</th>
                    <th class="text-center">Tax/Personal ID</th>
                    <th class="text-center">Vendor/Customer</th>
                    <th class="text-center">Address 1</th>
                    <th class="text-center">Address 2</th>
                    <th class="text-center">W/T No.</th>
                    <th class="text-center"></th>
                  </tr>
                </thead>
                <tbody id="body">
                  <tr>
                  </tr>
                </tbody>

                  <tr>
                    <td colspan="8">Total</td>
                    <td><input type="text" id="sffumdr" name="sffumdr" class="form-control" style="width: 200px;" value="0"></td>
                    <td><input type="text" id="sffumcr" name="sffumcr" class="form-control" style="width: 200px;" value="0"></td>
                  </tr>
              </table>
            </div>
          </div>
          <br>
           
          <div class="text-right">
              <a type="button" class="openpr btn btn-default btn-sm" data-toggle="modal" data-target="#archive"><i class="icon-list-numbered"></i>Archive</a>
              <a onclick="javascript:location.reload();" class="btn btn-default btn-sm"><i class="icon-plus22"></i>New</a>
              <button type="button" id="savevocher" class="save preload btn btn-info btn-sm"><i class="icon-floppy-disk position-left"></i> Save </button>
              <a href="#" class="btn btn-default btn-sm"><i class="icon-close2 position-left"></i> Close</a>
              <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-download"></i> Import</a>
          </div>
      </div>
  </div>
<!-- <div class="panel panel-flat"> -->
<!-- content -->
</form>

<script type="text/javascript">
   $("#savevocher").click(function(e){
    var smcr = $("#sffumcr").val();
    var smdr = $("#sffumdr").val();
      if(smcr != smdr){
        swal({
         title: "Credit and Debit Not Balance!",
         // text: "danger",
         confirmButtonColor: "#FF0000",
         // type: "success"
    });
      }else{

       var frm = $('#formglpost');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                        swal({
                                  title: data,
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
      
                        setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>gl_tran/edit_journalvocher/"+data;
                        }, 500);
                       
                    }
                });
                ev.preventDefault();

            });
          $("#formglpost").submit(); //Submit  the FORM
      }
        
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
           <input type="text" id="codecostcodeint" readonly="true"class="form-control input-sm">
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
            <input type="text" id="taxno" name="taxno" class="form-control">
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
              <select name="taxtype" id="taxtype" class="form-control">
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
        <h4 class="modal-title" id="myModalLabel"GL</h4>
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
</script>




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


<script>
    $("#vchdate").change(function(event) {
    var de_date = $("#vchdate").val();
    var y = de_date.slice(0,4); 
    var m = de_date.slice(5,7);

    $("#glperiod").val(m);
    $("#glyear").val(y);         

    }); 
            
    $("#addrows").click(function(){
        $("#ac_code").val("");
        $("#act_name").val("");
        $("#pre_event").val("");
        $("#pre_eventname").val("");
        $("#jobcode").val("");
        $("#systemname").val("");
        $("#dpt_code").val("");
        $("#dpt_title").val("");
        $("#costcode").val("");
        $("#amtdr").val("0");
        $("#amtcr").val("0");
        $("#varchar").val("");
        $("#acct_no").val("");
        $("#namevendor").val("");
        $("#namecus").val("");
        $("#gldesc").val("");
      }
    );

   

    $("#insertpodetail").click(function(){
      var ac_code = $("#ac_code").val();
      if(ac_code==""){
        alert("กรุณาเลือก Account Code");
      }else{
        addrow();
        $("#Account .close").click();

      }
        
      }
    );



    function addrow()
    {
      $('#nodata').closest('tr').remove();
      var row = ($('#body tr').length-0);
      var tr =  '<tr id="'+row+'">'+
                '<td>'+row+'<input type="hidden" name="chki[]" id="chki'+row+'" value=""></td>'+
                '<td>'+$("#ac_code").val()+'<input type="hidden" name="ac_codei[]" value="'+$("#ac_code").val()+'"></td>'+
                '<td>'+$("#act_name").val()+'<input type="hidden" name="act_namei[]" value="'+$("#act_name").val()+'"></td>'+
                '<td>'+$("#pre_eventname").val()+'<input type="hidden" name="pre_eventnamei[]" value="'+$("#pre_eventname").val()+'"></td>'+
                '<td>'+$("#jobcode").val()+'<input type="hidden" name="jobcodei[]" value="'+$("#jobcode").val()+'"></td>'+
                '<td>'+$("#systemname").val()+'<input type="hidden" name="systemnamei[]" value="'+$("#systemname").val()+'"></td>'+
                '<td>'+$("#dpt_title").val()+'<input type="hidden" name="dpt_titlei[]" value="'+$("#dpt_title").val()+'"></td>'+
                '<td>'+$("#codecostcodeint").val()+'<input type="hidden" name="costcodei[]" value="'+$("#codecostcodeint").val()+'"></td>'+
                '<td class="combat">'+$("#amtdr").val()+'<input type="hidden" id="atdr'+row+'" name="amtdri[]" value="'+$("#amtdr").val()+'"></td>'+
                '<td>'+$("#amtcr").val()+'<input type="hidden" id="atcr'+row+'" name="amtcri[]" value="'+$("#amtcr").val()+'"></td>'+
                '<td>'+$("#varchar").val()+'<input type="hidden" name="varchari[]" value="'+$("#varchar").val()+'"></td>'+
                '<td>'+$("#namevendor").val()+'<input type="hidden" name="namevendori[]" value="'+$("#namevendor").val()+'"></td>'+
                '<td>'+$("#ownername_th").val()+'<input type="hidden" name="namecusi[]" value="'+$("#ownername_th").val()+'"></td>'+
                '<td>'+$("#gldesc").val()+'<input type="hidden" name="gldesci[]" value="'+$("#gldesc").val()+'"></td>'+
                '<td>'+$("#ftno").val()+'<input type="hidden" name="ftnoi[]" value="'+$("#ftno").val()+'"></td>'+
                '<td>'+$("#refdocdate").val()+'<input type="hidden" name="refdocdatei[]" value="'+$("#refdocdate").val()+'"></td>'+
                '<td>'+$("#tax").val()+'<input type="hidden" name="taxi[]" value="'+$("#tax").val()+'"></td>'+
                '<td>'+$("#taxno").val()+'<input type="hidden" name="taxnoi[]" value="'+$("#taxno").val()+'"></td>'+
                '<td>'+$("#taxdate").val()+'<input type="hidden" name="taxdatei[]" value="'+$("#taxdate").val()+'"></td>'+
                '<td>'+$("#taxdes").val()+'<input type="hidden" name="taxdesi[]" value="'+$("#taxdes").val()+'"></td>'+
                '<td>'+$("#amount").val()+'<input type="hidden" name="amounti[]" value="'+$("#amount").val()+'"></td>'+
                '<td>'+$("#percent").val()+'<input type="hidden" name="percenti[]" value="'+$("#percent").val()+'"></td>'+
                '<td>'+$("#taxamount").val()+'<input type="hidden" name="taxamounti[]" value="'+$("#taxamount").val()+'"></td>'+
                '<td>'+$("#taxtype").val()+'<input type="hidden" name="taxtypei[]" value="'+$("#taxtype").val()+'"></td>'+
                '<td>'+$("#taxper").val()+'<input type="hidden" name="taxperi[]" value="'+$("#taxper").val()+'"></td>'+
                '<td>'+$("#vencust").val()+'<input type="hidden" name="vencusti[]" value="'+$("#vencust").val()+'"></td>'+
                '<td>'+$("#add1").val()+'<input type="hidden" name="add1i[]" value="'+$("#add1").val()+'"></td>'+
                '<td>'+$("#add2").val()+'<input type="hidden" name="add2i[]" value="'+$("#add2").val()+'"></td>'+
                '<td>'+$("#wtno").val()+'<input type="hidden" name="wtnoi[]" value="'+$("#wtno").val()+'"></td>'+  
                '<td>'+
                  '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+  
                '</td>'+
              '</tr>';
                $('#body').append(tr);
                var sumdr = parseFloat($('#sffumdr').val());
                var amdr = parseFloat($('#atdr'+row+'').val());
                var smdr = sumdr+amdr;
                $("#sffumdr").val(smdr);

                var sumcr = parseFloat($('#sffumcr').val());
                var amcr = parseFloat($('#atcr'+row+'').val());
                var smcr = sumcr+amcr;
                $("#sffumcr").val(smcr);
              }

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


<script>


     $(".book").click(function(){
     $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
     $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/book');
   });

     $(".project").click(function(){
     $('#projectmeka').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
     $("#projectmeka").load('<?php echo base_url(); ?>index.php/share/project');
   });

     $(".vendor").click(function(){
     $('#vendormodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
     $("#vendormodel").load('<?php echo base_url(); ?>index.php/share/vender');
   });

     $(".namecus").click(function(){
     $('#namecusmodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
     $("#namecusmodel").load('<?php echo base_url(); ?>index.php/share/debtor');
   });

     $(".modalcost").click(function(){
             $('#modal_costcode').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#modal_costcode").load('<?php echo base_url(); ?>index.php/share/costcode');
           });

     $(".acc").click(function(){
     $('#acccode').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
     $("#acccode").load('<?php echo base_url(); ?>index.php/share/accchart');
   });

     $(".sy").click(function(){
     $('#systemcn').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
     $("#systemcn").load('<?php echo base_url(); ?>index.php/share/system');
   });

  $(".dptid").click(function(){
  $('#departmentid').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#departmentid").load('<?php echo base_url(); ?>index.php/share/department');
   });

  $(".openpr").click(function(){
  $('#loadarchive').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#loadarchive").load('<?php echo base_url(); ?>gl_active/load_journal');
    })
</script>
