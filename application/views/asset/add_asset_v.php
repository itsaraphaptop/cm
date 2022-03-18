<form action="<?php echo base_url(); ?>index.php/asset_active/insertasset" id="formasset" method="post" enctype="multipart/form-data">


        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

                <div class="panel-body">
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                      <li class="active"><a href="#bordered-tab1" data-toggle="tab" aria-expanded="true">Asset</a></li>
                      <li class=""><a href="#bordered-tab3" data-toggle="tab" aria-expanded="true">Reference Asset</a></li>
                      <li class=""><a href="#bordered-tab2" data-toggle="tab" aria-expanded="false">Asset Part</a></li>
                      <li class="text-right"><a type="button" data-toggle="modal" data-target="#copy" class="copy" >Copy</a></li>
                    </ul>

                    <div class="tab-content">
                      <div class="tab-pane has-padding active" id="bordered-tab1" >
                      <div class="row">
                        <div class="col-md-offset-11 col-md-1">
                          <a type="button" data-toggle="modal" data-target="#retrieve"  class="retrieve btn bg-teal-400">Archive</a>
                        </div>
                      </div>
                    <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                    <label class="control-label">สถานะของทรัพย์สิน :</label>
                    
                     <select class="form-control input-sm" name="fa_status" id="fa_status"> 
                    <option value=""></option>
                    <option value="1">Normal</option>
                    <option value="2">Repair</option>
                    <option value="3">Write Off</option>
                    <option value="4">Calibration</option>
                    </select>
                    
                  </div>
                  </div>
                  <div id="wfdate">
                   <div class="col-md-2">
                    <div class="form-group">
                     <label class="control-label">Write Off Date :</label>
                     <input type="date" class="form-control input-sm" name="woffdate" id="woffdate">

                  </div>
                  </div>
                  </div>

             <script>
               $("#wfdate").hide();
             </script>
                     <script>
                      $("#fa_status").change(function(event) {
                          if ($("#fa_status").val()=="3") {
                            $("#wfdate").show();
                          }else if($("#fa_status").val()=="2"){
                             $("#wfdate").hide();
                          }else if($("#fa_status").val()=="1"){
                             $("#wfdate").hide();
                          }
                          });
                      </script>
                   <div class="col-md-1">
                    <div class="form-group">
                     <input type="hidden" class="form-control input-sm" name="chk" id="chk" value="1">

                  </div>
                  </div>

                
                  </div>


                  <div class="row">
                  
                    <div class="form-group col-lg-2">
                    <label class="control-label">รหัสของทรัพย์สิน :</label>
                    <input type="text" class="form-control input-sm" name="fa_assetcode" id="fa_assetcode" required="true">
                    </div>



                    <div class="form-group col-lg-4">
                    <label class="control-label">ชื่อทรัพย์สิน :</label>  
                      <input type="text" class="form-control input-sm" name="fa_ref" id="fa_ref">
                    </div>
                    

                    <div class="form-group col-lg-2">
                    <label class="control-label">วันที่ซื้อทรัพย์สิน :</label>
                      <input type="date" class="form-control input-sm" name="fa_dtype" id="fa_dtype">
                    </div>

                  </div> 

                   <div class="row">
                     <div class="form-group col-lg-8">
                    <label class="control-label">ชื่อทรัพย์ :</label>
                    <input type="text" class="form-control input-sm" name="fa_asset" id="fa_asset" required="true">
                    </div>
                    
                    <div class="form-group col-lg-3">
                    <label class="checkbox-inline">
                    <br>&nbsp;
                      <input type="checkbox" id="chkfa_rent">
                      <input type="hidden" name="fa_rent" id="fa_rent">
                      RENT
                    </label>
                    </div>
                   </div>

                  
                  <br>

                   <div class="row">
                   <div class="form-group col-lg-3">
                    <label class="control-label">ซีเรียลนัมเบอร์ทรัพย์สิน :</label>
                    <input type="text" class="form-control input-sm" name="fa_sr" id="fa_sr">
                  </div>

                  
                  <div class="form-group col-lg-5">
                    <label class="display-block text-semibold">การประกันรับของสินค้า :</label>
                    <label class="radio-inline">
                      <input type="radio" name="fa_warantee" id="fa_warantee1" value="1">
                      Yes
                    </label>

                    <label class="radio-inline">
                      <input type="radio" name="fa_warantee" id="fa_warantee2" value="2">
                      No
                    </label>

                      <label class="radio-inline">
                      <input type="radio" name="fa_warantee" id="fa_warantee3" value="3">
                      Life time
                    </label>
                  </div>
                  </div>

                   <div class="row" id="waratyhide">
                    <div class="form-group col-lg-4">
                    <label class="control-label">วัน เดือน ปี ที่เริ่มประกัน :</label>
                    <input type="date" class="form-control input-sm" name="fa_waranty" id="fa_waranty" style="width: 200px;">
                    </div>
                     <div class="form-group col-lg-3">
                    <label class="control-label">วัน เดือน ปี ที่หมดประกัน :</label>
                    <input type="date" class="form-control input-sm" name="fa_warantydate" id="fa_warantydate" style="width: 200px;">
                    </div>
                  </div>

                   <div class="row">
                    <div class="form-group col-lg-3">
                    <label class="control-label">Amount:</label>
                    <input type="text" class="form-control input-sm" name="fa_amount" id="fa_amount" style="text-align: right;" value=".00" required="true">
                  </div>  

                  <div class="form-group col-lg-1">
                    <label class="control-label">Quantity:</label>
                    <input type="text" class="form-control input-sm" name="fa_quantity" id="fa_quantity">
                  </div> 
                  
                  <div class="col-lg-2">
                  <label class="control-label">Unit:</label>
                  <div class="input-group">    
                    <input type="text" class="form-control input-sm" name="fa_unit" id="fa_unit1" readonly="">
                    <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#openunitt" class="openunitt btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                  </div> 
                  </div>
                    
                    <label class="control-label">State:</label>
                   <div class="input-group col-lg-1">
                    <input type="text" class="form-control input-sm" name="fa_state" id="fa_state"
                    value="100.00">
                    <span class="input-group-addon">%</span>
                  </div> 

                  </div>

                   <div class="row">
                    <div class="form-group col-lg-2">
                    <label class="control-label">Depreciation:</label><br>
                     <label class="radio-inline">
                      <input type="radio" name="fa_depreciation" id="fa_depreciation1" value="1">
                      Yes
                    </label>

                    <label class="radio-inline">
                      <input type="radio" name="fa_depreciation" id="fa_depreciation2" value="2">
                      No
                    </label>
                  </div>
                  <div class="form-group col-lg-2">
                   
                  </div>
                  <div id="dptioncode">
                  <div class=" col-lg-2" >
                  <div class="form-group">
                    <label class="control-label">Depreciation Code:</label>
                    <input type="text" class="form-control input-sm" name="fa_depreciationcode" id="fa_depreciationcode" readonly="" required="true">
                  </div>
                  </div>

                  <div class="col-lg-3">
                   <label class="control-label">&nbsp;</label>         
                   <div class="input-group">
                          
                     <input type="text" class="form-control input-sm" name="fa_depreciationname" id="fa_depreciationname" readonly="">
                      <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#depreci" class="depreci btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                  </div>    
                  </div>
                  </div>
</div>
                   <div class="row">
                    <div class="form-group col-lg-3">
                    <label class="control-label">BF. Depreciation :</label>
                    <input type="text" class="form-control input-sm" name="fa_bf" id="fa_bf" value='0' placeholder=".00" style="text-align: right;">
                  </div>

                    <div class="form-group col-lg-3">
                    <label class="control-label">As Date:</label>
                    <input type="date" class="form-control input-sm" name="fa_asdate" id="fa_asdate" >
                    </div> 

                     <div class="form-group col-lg-1">
                    <label class="control-label">Year:</label>
                    <input type="text" class="form-control input-sm" name="fa_yearbf" id="fa_yearbf">
                    </div>

                    <div class="form-group col-lg-1">
                    <label class="control-label">Month:</label>
                    <input type="text" class="form-control input-sm" name="fa_monthbf" id="fa_monthbf">
                    </div> 
                  </div>

                   <div class="row">

                    <div class="form-group col-lg-3">
                    <label class="control-label">Prev. Depreciation:</label>
                    <input type="text" class="form-control input-sm" name="fa_prev" id="fa_prev" value="0.00" style="text-align: right;">
                    </div>

                    <div class="form-group col-lg-3">
                    <label class="control-label">This Depreciation:</label>
                    <input type="text" class="form-control input-sm" name="fa_this" id="fa_this" value=".00" style="text-align: right;">
                    </div>

                    <div class="form-group col-lg-2">
                    <label class="control-label">This date:</label>
                    <input type="text" class="form-control input-sm" name="fa_thisdate" id="fa_thisdate">
                    </div> 

                    <div class="form-group col-lg-1">
                    <label class="control-label">Year:</label>
                    <input type="text" class="form-control input-sm" name="fa_yearprev" id="fa_yearprev">
                    </div>

                    <div class="form-group col-lg-1">
                    <label class="control-label">Month:</label>
                    <input type="text" class="form-control input-sm" name="fa_monthprev" id="fa_monthprev">
                    </div>    
                  </div>

                   <div class="row">
                    <div class="form-group col-lg-3">
                    <label class="control-label">Total Depreciation:</label>
                    <input type="text" class="form-control input-sm" name="fa_total" id="fa_total" value="0.00" style="text-align: right;">
                    </div>

                     <div class="form-group col-lg-3">
                    <label class="control-label">Residual Value:</label>
                    <input type="text" class="form-control input-sm" name="fa_residual" id="fa_residual" value="1.00" style="text-align: right;">
                    </div>

                     <div class="form-group col-lg-3">
                    <label class="control-label">Amount Bal:</label>
                    <input type="text" class="form-control input-sm" name="fa_amountbal" id="fa_amountbal" value="0" style="text-align: right;" readonly="">
                    </div>
                  </div>

                  

                   <div class="row">
                   <div class="form-group col-lg-2">
                    <label class="control-label">Project / Department :</label>
                    <input type="text" class="form-control input-sm" name="fa_projectid" id="projectidd" readonly="">
                    </div>
                   
                    <div class="col-md-4">
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    

                    <input type="text" class="form-control input-sm" name="fa_projectname" id="projectnamee" readonly="">
                    <span class="input-group-btn">
                       <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                    </div>

                     <div class="form-group col-lg-1">
                    <label class="control-label">Status :</label>
                    <input type="text" class="form-control input-sm" name="status_pd" id="status_pd" readonly="">
                    </div>
                  </div>

                   <div class="row">
                    <div class="form-group col-lg-4" id="jobsystem">
                      <label class="control-label">Job :</label>
                      <input type="text" class="form-control input-sm" name="fa_job" id="fa_job" readonly="">
                    </div>
                     <div class="form-group col-lg-3">
                        <label class="control-label">Issue Date :</label>
                        <input type="date" class="form-control input-sm" name="fa_issue" id="fa_issue" >
                    </div> 
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-1" hidden>
                    <label class="control-label">Location</label><br>
                   <label class="radio-inline">
                      <input type="radio" checked="checked" name="fa_location" id="fa_location1" value="1">
                      Project
                    </label>
                    </div>
                    <div id="pjdptall">
                    <div class="form-group col-lg-2">
                    <label class="control-label">Location</label>
                    <input type="text" class="form-control input-sm" name="fa_locationid" id="fa_locationid" readonly="" required="true">
                    </div>
                    <div class="col-lg-4">
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    <input type="text" class="form-control input-sm" name="fa_locationname" id="fa_locationname" readonly="">
                      <span class="input-group-btn">
                       <button type="button" data-toggle="modal" data-target="#job" id="jobhide1"  class="job btn btn-default btn-icon btn-sm"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                  </div>
                  </div>
                  </div>
                   <div class="row">
                   <div class="form-group col-lg-1">
                    <label class="control-label">Use by :</label>
                    <input type="text" class="form-control input-sm" name="fa_liseid" id="fa_liseid" readonly="true">
                    </div>
                    <div class="col-lg-4">
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    <input type="text" class="form-control input-sm" name="fa_lisename" id="fa_lisename" readonly="true">
                     <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#member" class="member btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                    </div>

                  </div>

                   <div class="row">
                    <div class="form-group col-lg-5">
                    <label class="control-label">Description:</label>
                     <input type="text" class="form-control input-sm" name="fa_all1" id="fa_all1">
                     <input type="text" class="form-control input-sm" name="fa_all2" id="fa_all2">
                     <input type="text" class="form-control input-sm" name="fa_all3" id="fa_all3">
                     <input type="text" class="form-control input-sm" name="fa_all4" id="fa_all4">
                     <input type="text" class="form-control input-sm" name="fa_all5" id="fa_all5">
                    </div>
                  </div>

                <div class="row"> 
                  <div class="form-group">
                    <div class="col-lg-4">

                    &nbsp;&nbsp;&nbsp;<label class="control-label">Picture:</label>
                    <div id="imgall"><p style="color: red;">&nbsp;&nbsp;&nbsp;No Picture.....</p></div>
                      <input type="file" class="file-styled-primary input-sm" name="fa_pic1">
                      <input type="file" class="file-styled-primary input-sm" name="fa_pic2">
                      <input type="file" class="file-styled-primary input-sm" name="fa_pic3">

                    </div>
                  </div>
                </div>
              </div>

                  <div class="tab-pane has-padding" id="bordered-tab3" >
                    <div class="row">
                     <div class="form-group col-lg-3">
                    <label class="control-label">เอกสารสำคัญจ่าย :</label>
                    <input type="text" class="form-control input-sm" name="fa_refap" id="fa_refap">
                    </div>

                  <div class="form-group col-lg-2" hidden>
                    <label class="control-label">วันที่ซื้อทรัพย์สิน :</label>
                      <input type="date" class="form-control input-sm" name="fa_assdate" id="fa_assdate">
                    </div>

                    <div class="form-group col-lg-3">
                    <label class="control-label">เลขที่ PO:</label>
                    <input type="text" class="form-control input-sm" name="fa_refpo" id="fa_refpo">
                    </div>
                  </div>

                  <script>
                    $('#fa_dtype').change(function(event) {
                      var fa_dtype = $('#fa_dtype').val();
                     $('#fa_assdate').val(fa_dtype);
                    });
                  </script>

                  <div class="row">
                      
                    <div class="form-group col-lg-2">
                    <label class="control-label">กลุ่มทรัพย์สิน :</label>
                     <input type="text" class="form-control input-sm" name="fa_group" id="fa_group" readonly="" required="true">
                    </div>

                     <div class="form-group col-lg-2">
                    <label class="control-label">ประเภททรัพย์สิน :</label>
                     <input type="text" class="form-control input-sm" name="fa_atype" id="fa_atype">
                    </div>

                    <div class="col-lg-4">
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                     <input type="text" class="form-control input-sm" name="fa_atypename" id="fa_atypename"><span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#asset" class="asset btn btn-default btn-icon btn-sm"><i class="icon-search4"></i></button>
                    </span>
                     </div>
                    </div>
                
                   

                  </div>

                   <div class="row">
                  
                     <div class="form-group col-lg-4">
                    <label class="control-label">เลขที่ใบกำกับภาษี :</label>
                     <input class="form-control input-sm" name="fa_tax" id="fa_tax"> 
                    </div>
                
                    <div class="form-group col-lg-2">
                    <label class="control-label">วัน เดือน ปี บันทึกบัญชี:</label>
                    <input type="date" class="form-control input-sm" name="fa_gldate" id="fa_gldate">
                    </div>

                    <div class="form-group col-lg-1">
                    <label class="control-label">ปี :</label>
                    <input type="text" class="form-control input-sm" name="fa_year" id="fa_year">
                    </div>

                    <div class="form-group col-lg-1">
                    <label class="control-label">เดือน :</label>
                    <input type="text" class="form-control input-sm" name="fa_month" id="fa_month">
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-lg-2">
                      <div class="input-group">
                        <label class="control-label">ร้านค้าที่ซื้อของ :</label>
                        <input type="text" class="form-control input-sm" name="fa_vender" id="venderid1" readonly="" required="true">
                      </div>
                    </div> 
                    <div class="col-lg-4">
                      <label class="control-label">&nbsp;</label> 
                        <div class="input-group">            
                          <input type="text" class="form-control input-sm" name="fa_vendername" id="subcontact" readonly="">
                          <span class="input-group-btn">
                            <button type="button" class="openvender btn btn-default btn-sm" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></button>
                          </span>
                        </div>
                    </div>
                  </div>

                <br>
                  <div class="row">
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label>A/C Asset: </label><input type="text" class="form-control input-xs" name="at_acaid" id="at_acaid1" readonly="true">
                        </div>
                      </div>
                    <div class=" col-md-4">
                      <label>&nbsp; </label>
                      <div class="form-group ">
                        <input type="text" class="form-control input-xs" name="at_aca" id="at_aca1"  readonly="true">
                          <span class="input-group-btn" >
                          <!-- <a class="ac btn btn-primary btn-sm" data-toggle="modal" data-target="#ac"><span class="glyphicon glyphicon-search"></a></span> -->
                          </span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>A/C Depreciation: </label><input type="text" class="form-control input-xs" name="at_acdid" id="at_acdid2" readonly="true">
                      </div>
                    </div>
                    <div class=" col-md-4">
                      <label>&nbsp; </label>
                      <div class="form-group ">
                        <input type="text" readonly="true" class="form-control input-xs" name="at_acd" id="at_acd2">
                        <span class="input-group-btn" >
                        <!-- <a class="at btn btn-primary btn-sm" data-toggle="modal" data-target="#at"><span class="glyphicon glyphicon-search"></a></span> -->
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>A/C Cost: </label><input type="text" class="form-control input-xs" name="at_costid" id="at_costid3" readonly="true">
                      </div>
                    </div>
                    <div class=" col-md-4">
                      <label>&nbsp; </label>
                        <div class="form-group ">
                          <input type="text"  readonly="true" class="form-control input-xs" name="at_cost" id="at_cost3">
                            <span class="input-group-btn" >
                             <!-- <a class="costacc btn btn-primary btn-sm" data-toggle="modal" data-target="#costacc"><span class="glyphicon glyphicon-search"></span></a> -->
                            </span>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>A/C Acc Deprecition </label><input type="text" class="form-control input-xs" name="at_acaccid" id="at_acaccid4" readonly="true">
                      </div>
                    </div>
                    <div class=" col-md-4">
                      <label>&nbsp; </label>
                        <div class="form-group ">
                          <input type="text" class="form-control input-xs"  readonly="true" name="at_acacc" id="at_acacc4">
                          <span class="input-group-btn" >
                          <!-- <a class="deacc btn btn-primary btn-sm" data-toggle="modal" data-target="#deacc"><span class="glyphicon glyphicon-search"></span></a> -->
                          </span>
                        </div>
                    </div>
                  </div>
                </div>
              <!-- close tab3 -->

                      <div class="tab-pane has-padding" id="bordered-tab2">
                   <a  data-toggle="modal" data-target="#insertrow" class="addrow btn bg-danger">Add Part</a>

                  <div class="row" id="mat">
                  <div class="col-md-12">
                  <br>
                  <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                      
                               <th style="text-align: center;">Material Code</th>
                               <th style="text-align: center;">Material Name</th>   
                               <th style="text-align: center;">Description</th>
                               <th style="text-align: center;">Price</th>
                               <th style="text-align: center;">Unit</th>
                               <th style="text-align: center;" >QTY</th>
                               <th style="text-align: center;" width="10%">Amount</th>
                               <th style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                    <tbody id="body">
                      <tr>
                      </tr>
                    </tbody>

                     <tr>
                        <th colspan="5" style="text-align: center;">Total</th>
                        <th><a id="allprice" class="btn btn-primary btn-block btn-xs">คำนวนราคา</a></th>
                        <th><input type="text" id="totalresue" name="" class="form-control"></th>
                        
                        <th></th>
                      </tr>
                  </table>
                </div>
              </div>

                    
                  
                  </div>

                  <div class="col-sm-12">
                      <div class="row">

                  <hr>
                  <div class="col-md-5">

        
        <a type="button" onClick="history.go(0)" class="btn bg-teal-400">New</a>
        <button type="submit"  class="btn bg-success">Save</button>
        <input type="hidden" id="id_fa" name="id_fa">
        <a id="fa_delect" class="btn bg-danger">Delect</a>
        

                  </div>
  <script>
           $("#fa_delect").click(function(){
          var id_fa = $("#id_fa").val();
          window.location='<?php echo base_url(); ?>index.php/asset_active/del_assetcode/'+id_fa;
          });
                  </script>

<script>
  $("#fa_delect").hide();
</script>
                   <div class="col-md-6" id="print">
                  
                   </div>
                  </div>
<br><br>
                  </div>
<div class="modal fade" id="copy" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการบันทึกทรัพย์สิน</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="copyy">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  $(".copy").click(function(){
       $('#copyy').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#copyy").load('<?php echo base_url(); ?>index.php/add_asset/model_copy');
     });
</script>

<div class="modal fade" id="member" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Member</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="memberr">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  $(".member").click(function(){
       $('#memberr').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#memberr").load('<?php echo base_url(); ?>index.php/share/member');
     });
</script>

<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div id="modal_cost"></div>
                 </div>
             </div>
           </div>
         </div>


         <script>
            $(".modalcost").click(function(){
             $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
           });
         </script>

<div class="modal fade" id="ac" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div id="acc"></div>
                 </div>
             </div>
           </div>
         </div>
         <script>
            $(".ac").click(function(){
             $('#acc').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#acc").load('<?php echo base_url(); ?>index.php/share/accchart/1');
           });
         </script>




         <div class="modal fade" id="at" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div id="att"></div>
                 </div>
             </div>
           </div>
         </div>

           <script>
            $(".at").click(function(){
             $('#att').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#att").load('<?php echo base_url(); ?>index.php/share/accchart/2');
           });
         </script>

<div class="modal fade" id="costacc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div id="costaccc"></div>
                 </div>
             </div>
           </div>
         </div>
         <script>
            $(".costacc").click(function(){
             $('#costaccc').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#costaccc").load('<?php echo base_url(); ?>index.php/share/accchart/3');
           });
         </script>

<div class="modal fade" id="deacc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div id="deaccc"></div>
                 </div>
             </div>
           </div>
         </div>
         <script>
            $(".deacc").click(function(){
             $('#deaccc').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#deaccc").load('<?php echo base_url(); ?>index.php/share/accchart/4');
           });
         </script>

<div class="modal fade" id="retrieve" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการบันทึกทรัพย์สิน</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="retrievee">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  $(".retrieve").click(function(){
       $('#retrievee').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#retrievee").load('<?php echo base_url(); ?>index.php/add_asset/model_addasset');
     });
</script>    
                   <div id="insertrow" class="modal fade" data-backdrop="false">
             <div class="modal-dialog modal-lg">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h5 class="modal-title">Insert Asset Detail</h5>
                 </div>

                 <div class="modal-body">

         <div class="row">
             <div class="col-xs-6">
               <label for="">รายการซื้อ</label>
                             <div class="input-group" id="error">
                             <span class="input-group-addon">
                               <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                             </span>
                               <input type="text" id="newmatname"  placeholder="เลือกรายการซื้อ" class="form-control input-sm" disabled>
                               <input type="text" id="newmatcode"  placeholder="Material Code" class="form-control input-sm" disabled>
                                 <span class="input-group-btn" >
                                   <!-- <a class="insertnewmat btn btn-primary" data-toggle="modal" data-target="#insertmatnew"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</a> -->
                                   <a class="openun btn btn-primary" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> เพิ่ม</a>
                                   <a class="openun btn btn-primary" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                 </span>
                             </div>
             </div>

         </div>
         <br>
         <div class="row">
             <div class="col-md-6">
               <div class="form-group">
                         <label for="qty">ปริมาณ</label>
                         <input type="number" id="pqty" name="qty"  placeholder="กรอกปริมาณ" class="form-control" value="1">
               </div>
             </div>
             <div class="col-xs-6">
                               <div class="input-group">
                                 <label for="unit">หน่วย</label>
                                 <input type="text" id="punit" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm">
                               <span class="input-group-btn" >
                                 <a class="openun btn btn-primary btn-sm" data-toggle="modal" id="modalunit" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                               </span>
                             </div>
                           </div>
         </div>

          <div class="row">
             <div class="col-md-6">
               <div class="form-group">
                         <label for="price_unit">ราคา/หน่วย</label>
                         <input type="text" id="pprice_unit"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control" value="0">
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                         <label for="amount">จำนวนเงิน</label>
                         <input type="text" id="pamount" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control" value="0">
               </div>
             </div>
         </div>
          <div class="row">
               <div class="col-md-6">
                 <div class="form-group">

                    <label for="endtproject">ส่วนลด 1 (%)</label>
                    <input type='text' id="pdiscper1" name="discountper1" placeholder="กรอกส่วนลด" class="form-control" value="0"/>
                 </div>
               </div>
                   <div class="col-md-6">
                     <div class="form-group">
                        <label for="endtproject">ส่วนลด 2 (%)</label>
                        <input type='text' id="pdiscper2" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" value="0" />
                     </div>
                   </div>

         </div>
           <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                  <label for="endtproject">ส่วนลดพิเศษ</label>
                  <input type='text' id="pdiscex" name="discountper2" class="form-control" value="0"/>
                 </div>
             </div>
             <div class="col-md-4">
                   <div class="form-group">
                    <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                    <input type='text' id="pdisamt" name="disamt" class="form-control" value="0"/>
                    <input type="hidden" id="pvat" value="0">
                   </div>
             </div>
             <div class="col-md-2">
         <div class="form-group">
             <a id="chkprice" class="btn btn-primary" style="margin-top:25px;">ดูราคา</a>
         </div>
       </div>
           </div>
           <div class="row">
 
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="endtproject">จำนวนเงินสุทธิ</label>

                    <input type='text' id="pnetamt" name="netamt" class="form-control" value="0"/>
                  </div>
                 </div>

           <div class="col-md-8">
                 <div class="form-group">
                    <label for="endtproject">Description</label>

                    <input type='text' id="premark" name="remark" class="form-control"/>
                 </div>
           </div>
         </div>

          <div class="row">
             <div class="col-md-6">
                   <input type="hidden" name="poid" value="">
                   <a id="insertpodetail" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</a>
                   <button class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
             </div>
         </div>
                 </div>
                 <div class="modal-footer">
                   <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                   <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
                 </div>
               </div>
             </div>
           </div>
           <script>
           $("#cpqtyic").keydown(function(){
             $("#pqtyic").val($("#qty").val()*$("#cpqtyic").val());
           });
            $('#chkprice').click(function(){
              var xqty = parseFloat($('#pqty').val());
              var xprice = parseFloat($('#pprice_unit').val());
              var xamount = xqty*xprice;
              var xdiscper1 = parseFloat($('#pdiscper1').val());
              var xdiscper2 = parseFloat($('#pdiscper2').val());
              var xdiscper3 = parseFloat($('#pdiscex').val());
              var xvatt = parseFloat($('#vatper').val());
              var xpd1 = xamount - (xamount*xdiscper1)/100;
              var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
              var xpd3 = xpd2 - (xpd1*xdiscper3)/100;
              var xpd4 = (xamount *xvatt)/100;
              var xvat = parseFloat($('#pvat').val());

              $('#pamount').val(xamount);
              $('#to_vat').val(xpd4);
              $('#po_vat').val(xpd4);

              if(xdiscper3 != 0){
                vxpd3 = xpd2-xdiscper3;
                  $('#pdisamt').val(vxpd3);

                  $('#pnetamt').val(vxpd3);
                }
              else if(xdiscper2 != 0){

                       $('#pdisamt').val(xpd2);
                       vxpd2 = xpd2 - (xpd2*xvat)/100;
                       $('#pnetamt').val(vxpd2);
              }
              else
              {
              $('#pdisamt').val(xpd1);
                  vxpd1 = xpd1 - (xpd1*xvat)/100;
                  $('#pnetamt').val(vxpd1);
              }
            });
            $("#insertpodetail").click(function(){
              if ($("#newmatcode").val()=="") {
                     swal({
                         title: "Please Chack!",
                         text: "Material Code Not Found",
                         confirmButtonColor: "#2196F3"
                     });
                      $("#error").attr("class", "input-group has-error has-feedback");
                     $("#newmatname").focus();
              }else if ($("#codecostcodeint").val()=="") {
                  swal({
                      title: "Please Chack!",
                      text: "Code Code Not Found",
                      confirmButtonColor: "#2196F3"
                  });
                    $("#errorcost").attr("class", "input-group has-error has-feedback");
                  $("#costnameint").focus();
              }else{
                addrow();
                $("#newmatname").val("");
                $("#newmatcode").val("");
                $("#costnameint").val("");
                $("#codecostcodeint").val("");
                $("#error").attr("class", "input-group");
                $("#errorcost").attr("class", "input-group");
                $("#insertrow .close").click()
              }

            });
            $('#chk').click(function(event) {
              if($('#chk').prop('checked')) {
               $('#newmatname').prop('disabled', false);
            } else {
                $('#newmatname').prop('disabled', true);
            }
            });
            function addrow()
            {
              $('td[class="text-center"]').closest('tr').remove();
              var row = ($('#body tr').length-0)+1;
              var newmatname = $("#newmatname").val();
              var newmatcode = $("#newmatcode").val();
              var tr = '<tr id="'+row+'">'+
                      
                       '<td>'+$("#newmatcode").val()+'<input type="hidden" name="matidi[]" value="'+$("#newmatcode").val()+'"><input type="hidden" name="chki[]" id="chki'+row+'" value="Y"></td>'+

                      '<td>'+$("#newmatname").val()+'<input type="hidden" name="matnamei[]" value="'+$("#newmatname").val()+'"></td>'+

                      '<td>'+$("#premark").val()+'<input type="hidden" name="remark[]" value="'+$("#premark").val()+'"></td>'+

                      
                        '<td>'+$("#pprice_unit").val()+'<input type="hidden" name="price_unit[]" value="'+$("#pprice_unit").val()+'"></td>'+
                       
                       '<td>'+$("#punit").val()+'<input type="hidden" name="uniti[]" value="'+$("#punit").val()+'">'+'<input type="hidden"  name="amounti[]" value="'+$("#pnetamt").val()+'">'+'</td>'+

                       '<td>'+$("#pqty").val()+'<input type="hidden" name="qtyi[]" value="'+$("#pqty").val()+'"></td>'+

                      '<td class="countable">'+$("#pnetamt").val()+'</td>'+
                       
                         
                       '<td>'+
                              '<a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                          
                       '</td>'+
                       '</tr>';
              $('#body').append(tr);

            }
           </script>
                   </form>   
                </div>
              </div>
            </div>


            </div>

<div class="modal fade" id="job" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Location Project</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="jobb">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  $(".job").click(function(){
       $('#jobb').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#jobb").load('<?php echo base_url(); ?>index.php/share/asslocation');
     });
</script>

<div class="modal fade" id="job1" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Location Department</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="jobb1">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  $(".job1").click(function(){
       $('#jobb1').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#jobb1").load('<?php echo base_url(); ?>index.php/share/asslocation2');
     });
</script>


 <div class="modal fade" id="opendepart" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Department</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_department">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<div class="modal fade" id="asset" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Asset Type</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="type">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>

        <script>
      $(".asset").click(function(){
       $('#type').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#type").load('<?php echo base_url(); ?>index.php/share/codeasst');
     });

      $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });

      </script>
  

<div class="modal fade" id="depreci" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Depreciation Code:</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">

            <div class="row" id="adddepreci">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
         $(".depreci").click(function(){
          $('#adddepreci').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#adddepreci").load('<?php echo base_url(); ?>index.php/share/modal_depreciation');
        });
      </script>
 <div class="modal fade" id="openunitt" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog modal-lg">
               <div class="modal-content">
                 <div class="modal-header bg-primary">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
                 </div>
                   <div class="panel-body">
                       <div id="modal_unitt">

                       </div>
                   </div>
               </div>
             </div>
           </div>
        <script>
      $(".openunitt").click(function(){
       $('#modal_unitt').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#modal_unitt").load('<?php echo base_url(); ?>index.php/share/unit/1');
     });

         $("#modalunit").click(function(){
          $('#modal_unit').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_unit").load('<?php echo base_url(); ?>index.php/share/unit');
        });
      </script>
<div class="modal fade" id="openproj" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Project</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="xxxx">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="openvender">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header Select Project">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
                          </div>
                            <div class="modal-body">
                                <div id="tablevender">

                                </div>
                            </div>
                        </div>
                      </div>
                    </div>



           <!--  -->
           <div id="opnewmat" class="modal fade">
            <div class="modal-dialog modal-full">
              <div class="modal-content ">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">เพิ่มรายการ</h5>
                </div>
                  <div class="modal-body">
                      <div class="row" id="modal_mat"></div>

                  </div>
              </div>
            </div>
            </div>
            <script>
             $(".openun").click(function(){
                     var row = ($('#body tr').length-0)+1;
                     $("#modal_mat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                     $("#modal_mat").load('<?php echo base_url(); ?>share/getmatcode/'+row);
                    });
            </script>
              <div class="modal fade" id="openunit" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog modal-lg">
               <div class="modal-content">
                 <div class="modal-header bg-primary">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
                 </div>
                   <div class="panel-body">
                       <div id="modal_unit">

                       </div>
                   </div>
               </div>
             </div>
           </div> <!--end modal -->
           <div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div id="modal_cost"></div>
                 </div>
             </div>
           </div>
         </div><!-- end modal matcode and costcode -->
           <!-- /full width modal -->
           <div class="modal fade" id="insertmatnew" data-backdrop="false">
            <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header bg-primary">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">New Material</h4>
               </div>
                 <div class="modal-body">
                 <div class="panel-body">
                     <div class="row" id="modal_newmat">

                     </div>
                     </div>
                 </div>
             </div>
            </div>
           </div> <!--end modal -->

    <div class="modal fade" id="openunitic" data-backdrop="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">หน่วย</h4>
            </div>
              <div class="modal-body">
                  <div id="modal_unitic"></div>
              </div>
          </div>
        </div>
      </div><!-- end modal matcode and costcode -->
      <script>
      $(".unitic").click(function(){
       $('#modal_unitic').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#modal_unitic").load('<?php echo base_url(); ?>index.php/share/unitid2');
     });
      </script>

        <script>
          $("#modalunit").click(function(){
          $('#modal_unit').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_unit").load('<?php echo base_url(); ?>index.php/share/unit');
          });
          $(".insertnewmat").click(function(){
          $("#modal_newmat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_newmat").load('<?php echo base_url(); ?>share/getmatcode_new');
          });
          $(".modalcost").click(function(){
          $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
          });
        </script>


<script>
   $('#allprice').click(function(){
    var cls = document.getElementById("res").getElementsByTagName("td");
    var sum = 0;
    for (var i = 0; i < cls.length; i++){
        if(cls[i].className == "countable"){
            sum += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
        }
    }
     $("#totalresue").val(sum); 
     $("#contactamount").val(sum);  
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

    <script>
    $('#checkdoc1').click(function(){
    if($('#checkdoc1').prop('checked')) {
    $("#checkdoc_1").val('1');
    }else{
    $("#checkdoc_1").val('0');
    }
    });

    $("#checkdoc2").click(function(){
    if ($("#checkdoc2").prop('checked')){
    $("#checkdoc_2").val('1');
    }else{
    $("#checkdoc_2").val('0');
    }
    });
    </script>
<
    <script>
    $(".openproj").click(function(){
    $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#xxxx").load('<?php echo base_url(); ?>index.php/share/project');
    });

    $(".openvender").click(function(event) {
    $("#tablevender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#tablevender").load('<?php echo base_url(); ?>share/vender_f')
    });

    $(".openun").click(function(){
    var row = ($('#body tr').length-0)+1;
    $("#modal_mat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_mat").load('<?php echo base_url(); ?>share/getmatcode/'+row);
    });
    $(".modalcost").click(function(){
    $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
   });
    $("#modalunit").click(function(){
    $('#modal_unit').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_unit").load('<?php echo base_url(); ?>index.php/share/unit');
   });

    $("#fa_iccode").prop('readonly', true);


   
    $("#fa_prev").prop('readonly', true);
    $("#fa_this").prop('readonly', true);
    $("#fa_total").prop('readonly', true);
    $("#fa_thisdate").prop('readonly', true);
    $("#fa_yearprev").prop('readonly', true);
    $("#fa_monthprev").prop('readonly', true);
    
    </script>
  

<script>

$("div#waratyhide").hide();
$("div#dptioncode").hide();
// $("div#pjdptall").hide();

   $("#fa_gldate").change(function(event) {
            var de_date = $("#fa_gldate").val();
            var y = de_date.slice(0,4); 
            var d = de_date.slice(8,11);
            var m = de_date.slice(5,7);
            $("#fa_year").val(y);
            $("#fa_month").val(m);
            
    }); 

   $("#fa_asdate").change(function(event) {
            var de_date = $("#fa_asdate").val();
            var y = de_date.slice(0,4); 
            var d = de_date.slice(8,11);
            var m = de_date.slice(5,7);
            $("#fa_yearbf").val(y);
            $("#fa_monthbf").val(m);
            
    }); 

   $("#fa_warantee1").click(function(event) {
    $("div#waratyhide").show();
    }); 
     $("#fa_warantee2").click(function(event) {
    $("div#waratyhide").hide();
    });
    $("#fa_warantee3").click(function(event) {
    $("div#waratyhide").hide();
    });

    $("#fa_depreciation1").click(function(event) {
    $("div#dptioncode").show();
    });
    $("#fa_depreciation2").click(function(event) {
    $("div#dptioncode").hide();
    });

    $("#fa_location1").click(function(event) {
    $("div#pjdptall").show();
    $("#jobhide2").hide();
    $("#jobhide1").show();
    });

    $("#fa_location2").click(function(event) {
    $("div#pjdptall").show();
    $("#jobhide1").hide();
    $("#jobhide2").show();
    });

$("#chkfa_rent").on('click',function(){
  if ($("#chkfa_rent").prop("checked")) {
            $("#fa_rent").val("Y");
        }else{
            $("#fa_rent").val("");
        }
});

$('#add_asset').attr('class', 'active');

</script>


   