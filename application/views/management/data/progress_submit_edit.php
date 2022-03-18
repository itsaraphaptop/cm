<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-body">
        <form method="post" id="formpost" action="<?php echo base_url(); ?>management_active/progress_submit_add" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-3">
              <div class="form-group">
                <label>Referrent Document No :</label>
                <input type="text" name="refferent" id="refdoc" class="form-control input-xs" value="<?php echo $res[0]['submit_no'];?>" readonly>
                <input type="hidden" name="submit_no" value="" id="submit_no">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Date :</label>
                <input type="date" name="date" id="date" class="form-control input-xs" id="date" value="<?php echo $res[0]['date'];?>" required="required">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Year :</label>
                <input type="text" name="year" id="year" class="form-control input-xs" id="year" value="<?php echo $res[0]['year'];?>" readonly="true">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Month :</label>
                <input type="text" name="month" id="month" class="form-control input-xs" id="month" value="<?php echo $res[0]['month'];?>" readonly="true">
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label>Payment Type :</label>
                <select type="date" name="payment_type" id="payment_type" class="form-control input-xs" required="required" >
                  <option value="progress">Progress Payment</option>
                  <option value="down">Down Payment</option>
                  <option value="retention">Retention Payment</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Site No F2 :</label>
                <input type="text" name="site_no" id="site_no" class="form-control input-xs" value="<?php echo $res[0]['site_no'];?>" readonly="true">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                  <input type="text" name="after_site_no" id="pjname" class="form-control input-xs" value="<?php echo $res[0]['after_site_no'];?>" readonly="true">
                  <span class="input-group-addon bg-primary pointer" id="btn_project" data-toggle="modal" data-target="#modal_project"><i class="glyphicon glyphicon-search"></i></span>
                </div>
              </div>
            </div>
            
            <div class="col-xs-2">
              <div class="form-group">
                <label>Customer F2 :</label>
                <input type="text" name="customer" class="form-control input-xs" value="<?php echo $res[0]['customer'];?>" id="cus_id" readonly="true">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                  <input type="text" name="after_customer" id="cus_name" class="form-control input-xs" value="<?php echo $res[0]['after_customer'];?>" readonly="true">
                  <span class="input-group-addon bg-primary pointer" id="btn_customer" data-toggle="modal" data-target="#modal_customer"><i class="glyphicon glyphicon-search"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label>Subject Remark :</label>
                <input type="text" name="subject_remark" id="subject" value="<?php echo $res[0]['subject_remark'];?>" class="form-control input-xs">
              </div>
            </div>
            
            <div class="col-xs-1">
              <div class="form-group">
                <label>Period :</label>
                <input type="text" name="period" id="period" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['period'];?>">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Amount Submit :</label>
                <input type="text" name="amount_submit" id="sumjob_amount" class="formatnum form-control input-xs" readonly="true" value="<?php echo $res[0]['amount_submit'];?>">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Amount Certificate :</label>
                <input type="text" name="amount_certificate" id="sumjob_sumcer"  class="formatnum form-control input-xs" readonly="true" value="<?php echo $res[0]['amount_certificate'];?>">
              </div>
            </div>
            <div class="col-xs-2" class="ccdate">
              <div class="form-group">
                <label style="">Certification Date</label>
                <input type="date" name="cdate" id="cdate" class="form-control input-xs" id="date" value="<?php echo $res[0]['date_certificate'];?>">
                <input type="hidden" name="cstatus" id="cstatus"  class="form-control input-xs"  value="N">
                <input type="hidden" name="chkdel" id="chkdel"  class="form-control input-xs"  >
              </div>
            </div>
          </div>

          <script>
            $('#cdate').change(function(event) {
              $('#cstatus').val('W')
            });
          </script>
          
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Down :</label>
                <div class="input-group">
                  <input type="text" name="avance" id="avance" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['avance'];?>" required="required" readonly="true">
                  <span class="input-group-addon">%</span>
                </div>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" name="after_avance" id="after_avance" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['after_avance'];?>" required="required"  readonly="true">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>VAT :</label>
                <div class="input-group">
                  <input type="text" name="vat" id="vat" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['vat'];?>" required="required" readonly="true">
                  <span class="input-group-addon">%</span>
                </div>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" name="after_vat" id="after_vat" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['after_vat'];?>" required="required"  readonly="true">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Currency :</label>
                <select class="formatnum form-control text-right input-xs" name="currency" id="currency">
                  <?php foreach ($c as $cc) { ?>
                  <option value="<?php echo $cc->currency_id; ?>"><?php echo $cc->currency_name_en; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Exchang :</label>
                <div class="input-group">
                  <input type="text" name="exchang" id="exchang" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['exchang'];?>" required="required">
                  <span class="input-group-addon">Baht</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label>Retention :</label>
                <div class="input-group">
                  <input type="text" name="retention" id="retention" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['retention'];?>" required="required" readonly="true">
                  <span class="input-group-addon">%</span>
                </div>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" name="after_retention" id="after_retention" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['after_retention'];?>" required="required"  readonly="true">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>W/T :</label>
                <input type="text" name="wt" id="wt" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['wt'];?>" required="required" readonly="true">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" name="after_wt" id="after_wt" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['after_wt'];?>" readonly="true"  readonly="true">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Net Amount :</label>
                <input type="text" name="net_amount" id="net_amount" class="formatnum form-control text-right input-xs" value="<?php echo $res[0]['net_amount'];?>" required="required" readonly="true">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <br>
                <input type="checkbox" id="pr" input="printletter">
                <label>
                  Print Letter
                </label>
                <input type="hidden" name="printletter" id="printletter" value="0">
                <input type="hidden" name="event_type" value="edit" id="event_type">
              </div>
            </div>
          </div>
          <div class="row ccdate">
            <div class="col-xs-2">
              <a type="button" id="s_cer" class="diehidden btn btn-danger btn-rounded btn-xs center-block">Submit Certificate</a>
            </div>
          </div>
          <br>
          <!-- <script>
            $('.ccdate').hide();
          </script> -->
          <div class="row">
            <div class="tabbable tab-content-bordered">
              <ul class="nav nav-tabs nav-tabs-component">
                <li class="active"><a href="#job" data-toggle="tab"><i class="icon-menu7 position-left"></i> Job</a></li>
                <!--  <li><a href="#costcode" data-toggle="tab"><i class="icon-mention position-left"></i> Cost Code</a></li>
                <li><a href="#boq" data-toggle="tab"><i class="icon-mention position-left"></i> BOQ</a></li> -->
                <li><a href="#picture" data-toggle="tab"><i class="glyphicon glyphicon-paperclip"></i> Attachment File</a></li>
                <!-- <li><a href="#letter" data-toggle="tab"><i class="icon-file-zip2"></i> Letter</a></li> -->
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="job">
                  <div class="table-responsive">
                    <div class="panel-body">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Code</th>
                            <th><div style="width: 300px;">Job Name</div></th>
                            <th>Amount Submit</th>
                            <th>Amount Certificate</th>
                            <!-- <th>Import</th> -->
                          </tr>
                        </thead>
                        <tfoot>
                        <tr>
                          <th colspan="2" class="text-center">Total</th>
                          <th class="text-right"><input type="text" class="form-control" id="total_job_amount" readonly></th>
                          <th class="text-right"><input type="text" class="form-control" readonly id="total_job_sumcer"></th>
                          <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="content_tbjob">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="costcode">
                  Cost Code
                </div>
                <div class="tab-pane" id="boq">
                  <div class="table-responsive">
                    <div class="panel-body">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th rowspan="2" class="text-center">No</th>
                            <th rowspan="2" class="text-center">Job</th>
                            <th class="text-center">Mat.CodeF2</th>
                            <th rowspan="2" class="text-center">Mat.Name</th>
                            <th class="text-center">Mat.CodeF2</th>
                            <th rowspan="2" class="text-center">Mat.Name(Lab/Sub.)</th>
                            <th class="text-center">CostC.F2</th>
                            <th class="text-center">CostC.F2</th>
                            <th rowspan="2" class="text-center">Mat.BOQ</th>
                            <th rowspan="2" class="text-center">BOMF2</th>
                            <th rowspan="2" class="text-center">UnitC.F2</th>
                            <th rowspan="2" class="text-center">Unit</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Mat.Price</th>
                            <th class="text-center">Mat.Amount</th>
                            <th class="text-center">Lab.Price</th>
                            <th class="text-center">Lab.Amount</th>
                            <th class="text-center">TotalAmount</th>
                            <th rowspan="2" class="text-center">Bom Date</th>
                          </tr>
                          <tr>
                            <th class="text-center">Material</th>
                            <th class="text-center">Labor/Subc.</th>
                            <th class="text-center">Material</th>
                            <th class="text-center">Labor/Subc.</th>
                            <th class="text-center">(BOQ)</th>
                            <th class="text-center">(BOQ)</th>
                            <th class="text-center">(BOQ)</th>
                            <th class="text-center">(BOQ)</th>
                            <th class="text-center">(BOQ)</th>
                            <th class="text-center">(BOQ)</th>
                          </tr>
                        </thead>
                        <tbody id="content_tbboq">
                          
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
                <div class="tab-pane" id="picture">
                  <div class="container-fluid">
                    <div class="col-sm-3">
                      <br>
                      <a type="button" class="btn btn-info" id="s"><i class="glyphicon glyphicon-plus"></i>Add</a>
                    </div>
                    <div class="col-sm-12">
                      <br>
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <td class="text-center">No.</td>
                            <td>File</td>
                            <td class="text-center">Action</td>
                          </tr>
                        </thead>
                        <tbody id="img">
                          <tr>
                            <td colspan="3" class="text-center">No Data</td>
                          </tr>
                        </tbody>
                      </table>
                      <br/>
                    </div>
                  </div>
                </div>
                <script>
                
                $("#s").click(function(){
                abc();
                });
                function abc()
                {
                var row = ($('#img tr').length)-0+1;
                var tr = '<tr id="'+row+'">'+
                  '<td class="text-center">'+row+'</td>'+
                  '<td><input type="file" name="userfile" class="form-control"></td>'+
                  '<td class="text-center">'+
                    '<a id="close'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                  '</td>'+
                '</tr>';
                
                $('#img').append(tr);
                $(document).on('click', 'a#close'+row+'', function () { // <-- changes
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
                onClick: function ($save) {
                $save.close();
                save({
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
                }
                </script>
                <div class="tab-pane" id="letter">
                  <div class="row">
                    <div class="col-sm-3">
                      <br>
                      <a type="button" class="btn btn-info" id="si"><i class="glyphicon glyphicon-plus"></i>Add</a>
                    </div>
                    <div class="col-sm-12">
                      <br>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <td class="text-center">No.</td>
                            <td>Remark</td>
                            <td class="text-center">Action</td>
                          </tr>
                        </thead>
                        <tbody id="letteri">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <script>
                
                $("#si").click(function(){
                letter_add();
                });
                function letter_add()
                {
                var row = ($('#letteri tr').length)-0+1;
                var tr = '<tr id="'+row+'">'+
                  '<td class="text-center">'+row+'</td>'+
                  '<td><input type="text" class="form-control input-sm"></td>'+
                  '<td class="text-center">'+
                    '<a id="closei'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
                  '</td>'+
                '</tr>';
                
                $('#letteri').append(tr);
                $(document).on('click', 'a#closei'+row+'', function () { // <-- changes
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
                onClick: function ($save) {
                $save.close();
                save({
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
                }
                </script>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="col-xs-6">
              <div class="form-group">
                <button class="btn btn-primary" type="button" id="btn_retrieve" data-toggle="modal" data-target="#modal_retrieve">Retrieve</button>
                <button class="btn btn-info" type="button">New</button>
                <button type="submit" id="saveproj" class="btn btn-success diehidden">Save</button>
                <button class="btn btn-danger diehidden" type="button" id="deleteii">Delete</button>
                <!--               <button class="btn btn-danger" type="button">Close</button>
                <button class="btn btn-primary" type="button">Descrtption</button>
                <button class="btn btn-primary" type="button">Print Letter</button>
                <button class="btn btn-primary" type="button">Coppy Letter</button> -->
                
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <script>
    $('#deleteii').click(function(event) {
      var submit_no = $('#submit_no').val();
      window.location.href = '<?php echo base_url(); ?>management_active/del_submit/'+submit_no;
    });
  </script>
  <!--Modal Project-->
  <div id="modal_project" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Project</h5>
        </div>
        <div class="modal-body">
          <div id="projectt">
            
          </div>
        </div>
        <div class="modal-footer">
          <!--  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
  <script>
  </script>
  <!--Modal Project-->
  <!--Modal Customer-->
  <div id="modal_customer" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Modal Customer</h5>
        </div>
        <div class="modal-body">
          <div id="customer"></div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
  <!--Modal Customer-->
  <!--Modal Retrieve-->
  <div id="modal_retrieve" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Retrieve modal</h5>
        </div>
        <div class="modal-body">
          <div id="retrievee"></div>
        </div>
        
      </div>
    </div>
  </div>
  <!--Modal Retrieve-->
  <script type="text/javascript">
  // jQuery(document).ready(function($) {
  //Script load modal Customer
  $('#content_tbjob').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        // alert(submit_no);
        var submit_no = '<?php echo $code;?>';
        $("#content_tbjob").load('<?php echo base_url(); ?>share_ball/content_tojob/'+submit_no);
  $('#btn_customer').click(function(){
  $('#customer').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#customer").load('<?php echo base_url(); ?>share/debtor');
  });
  //Script load modal Customer
  //Script load modal retrieve
  $('#btn_retrieve').click(function(){
  $('#retrievee').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#retrievee").load('<?php echo base_url(); ?>share_ball/modal_retrieve');
  });
  //Script load modal retrieve
  //Script load modal Project
  $('#btn_project').click(function(){
  $('#projectt').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#projectt").load('<?php echo base_url(); ?>share/project');
  });
  //Script load modal Project
  $('.pointer').css('cursor', 'pointer');
  
  //Script add date to input
  $('#date').change(function(event) {
  var date = $(this).val();
  var year = date.substr(0, 4);
  var month = date.substr(5, 2);
  $('#year').val(year);
  $('#month').val(month);
  
  });
  //Script add date to input
  //Script checkbox printletter
  $('#pr').click(function(event) {
  var attr = $(this).attr('input');
  var id = $('#'+attr).val();
  if (id == 0) {
  $('#'+attr).val('1');
  }else if(id == 1){
  $('#'+attr).val('0');
  }
  });
  //Script checkbox printletter
  //Script process header
  $('#after_avance').keyup(function(event) {
  var after_avance = $(this).val();
  var amount_submit = $('#sumjob_amount').val();
  var wt = $('#wt').val();
  
  var after_wt = ((amount_submit-after_avance)*(wt/100)*1);
  $('#after_wt').val(after_wt);
  });
  
  $('#after_avance, #after_retention, #after_vat').keyup(function(event) {
  var sumjob_amount = $('#sumjob_amount').val();
  var after_avance = $('#after_avance').val();
  var after_retention = $('#after_retention').val();
  var after_wt = $('#after_wt').val();
  var after_vat = $('#after_vat').val();
  var sum = ((sumjob_amount-after_avance-after_retention-after_wt)+after_vat*1);
  $('#net_amount').val(sum);
  });
  
  //Script process header
  // });
  $('#tra').attr('class', 'active');
  $('#tra_sub2').attr('style', 'background-color:#dedbd8');
  $("#saveproj").click(function(){
    
    if ($("#refdoc")=="") {
      swal({
        title: "Referrent Document No.",
        text: "Plaese input Referrent Document No.!!.",
        // confirmButtonColor: "#66BB6A",
        type: "warning"
      });
    }else{
      swal({
        title: "บันทึกสำเร็จ",
        text: "Save Completed!!.",
        // confirmButtonColor: "#66BB6A",
        type: "success"
      });
      $("#formpost").submit()
    }
  });
  $('#project_h').attr('class', 'active');
	$('#project_arr').attr('style', 'background-color:#dedbd8');
  </script>