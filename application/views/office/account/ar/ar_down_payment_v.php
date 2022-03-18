
<div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Dashboard</span> - ภาพรวมระบบ</h4>
            </div>

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="index.html"><i class="icon-home2 position-left"></i> ระบบจัดการในสำนักงาน</a></li>
              <li>บันทึกใบแจ้งหนี้ (INVOICE)</li>
            </ul>

            <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-gear position-left"></i>
                  Settings
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
              </li>
            </ul>
          <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

          <div class="row">

                  <form method="post" action="<?php echo base_url(); ?>ar_active/add_downpayment">
                    <div class="panel panel-flat border-top-lg border-top-success">
                      <div class="panel-heading ">
                        <h5 class="panel-title">INVOICE</h5>
                        <div class="heading-elements">
                          <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                  </ul>
                                </div>
                      </div>

                      <div class="panel-body">
                        <!-- contant -->
                        <fieldset>
                        <div class="col-md-6">
                          <legend class="text-semibold"><i class="icon-reading position-left"></i> INVOICE</legend>

                          <div class="form-group">
                            <label>Invoice No.:</label>
                            <input type="text" class="form-control"  name="invono" required="" placeholder="Invoice No.">
                          </div>

                           <div class="form-group">
                            <label>Project:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php echo $project; ?>" name="projectname" id="projectname">
    												<input type="hidden" readonly="true" value="<?php echo $projid; ?>" class="pproject1 form-control input-sm" name="projectid" id="putprojectid">
                            <div class="input-group-btn">
                              <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button>
                              </ul>
                            </div>
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
                            <div class="input-group-btn">
                              <a class="ven btn btn-default btn-icon" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></a>
                              </ul>
                            </div>
                          </div>
                          </div>

                          <div class="row">
                            <div class="col-md-3">
                              <label>Period:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="period" name="period" placeholder="Period No." value="1">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <label>Credit Term:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="crterm" name="crterm" placeholder="Credit Term" value="0">
                                <span class="input-group-addon">Day</span>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                                  <legend class="text-semibold"><i class="icon-truck position-left"></i> INVOICE</legend>

                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group" >
                                <label>Invoice Date: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single"  id="invdate" name="invdate">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Due Date: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="duedate" name="duedate">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Inv Type: </label>
                                <div class="input-group">
                                  <select class="form-control input-sm" name="type">
                                    <option value="down">Down</option>
                                    <option value="down">Progress</option>
                                    <option value="down">Retention</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>PO/Contract No.:</label>
                                <input type="text" class="form-control"  id="po" name="po" placeholder="PO/Contract No.">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Contract Amount.:</label>
                                <input type="text" class="form-control text-center" id="poamt" name="poamt" placeholder="Contract Amount" value="0">
                              </div>
                            </div>
                          </div>
                          <!-- <div class="row">
                            <div class="col-md-6">
                              <label>Down:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="down" placeholder="Down" value="0">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Down Amount.:</label>
                                <input type="text" class="form-control text-center" id="downamt" placeholder="Down Amount" value="0">
                              </div>
                            </div>
                          </div> -->
                          <div class="row">
                            <div class="col-md-3">
                              <label>VAT:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="vatper" name="vatper" placeholder="7%" value="0">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label>W/T:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="wh" name="wh" placeholder="W/T" value="0">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div>
                            <!-- <div class="col-md-6">
                              <div class="form-group">
                                <label>Receipt Amount.:</label>
                                <input type="text" class="form-control text-center" id="receiptamt" placeholder="Receipt Amount" value="0">
                              </div>
                            </div> -->
                          </div>
                        </div>
                        </fieldset>
                        <br>
                        <!-- </div> -->



                        <div class="row">
                            <div class="table-responsive">
                              <table class="table table-xxs table-bordered">
                                <thead>
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center" width="30%">Description</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">VAT</th>
                                    <th class="text-center">Before W/T</th>
                                    <th class="text-center">Less W/T</th>
                                    <th class="text-center">Net Amount</th>
                                    <th class="text-center">Ref. Payment No.</th>
                                    <th class="text-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody id="body">
                                  <?php for ($i=1; $i <2; $i++) { ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><input type="text" class="form-control input-sm" name="descrepi[]"></td>
                                    <td><input type="text" class="form-control input-sm text-right" name="downamti[]" id="downamti<?php echo $i; ?>" value="0"></td>
                                    <td><input type="text" class="form-control input-sm text-center" name="vati[]" id="vati<?php echo $i; ?>" value="0"></td>
                                    <td><input type="text" class="form-control input-sm text-right" name="beforewti[]" id="beforewti<?php echo $i; ?>" value="0"></td>
                                    <td><input type="text" class="form-control input-sm text-right" name="lesswti[]" id="lesswti<?php echo $i; ?>" value="0"></td>
                                    <td><input type="text" class="form-control input-sm text-right" name="netamti[]" id="netamti<?php echo $i; ?>" value="0"></td>
                                    <td><input type="text" class="form-control input-sm text-center" name="refpaymentnoi[]"></td>
                                    <td>
                                      <ul class="icons-list">
              											 		<li><!-- <a id="remove<?php echo $i;?>"  data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a> --></li>
              											 	</ul>
                                    </td>
                                  </tr>
                                  <script>
$(document).on('click', 'a#remove<?php echo $i;?>', function () { // <-- changes


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
                                    $("#downamti<?php echo $i; ?>").keyup(function(){

                                      var poamt = parseFloat($("#poamt").val());
                                      var down = parseFloat($("#downamti<?php echo $i; ?>").val());
                                      var wt = parseFloat($("#wh").val());
                                      var vat = parseFloat($("#vatper").val());
                                      var vatamt = (down*vat/100);
                                      var downamt = parseFloat((down*vat/100)+down);
                                      var lesswt = (down*wt/100);
                                      var tot = downamt-lesswt;
                                      $("#vati<?php echo $i; ?>").val(vatamt);
                                      $("#beforewti<?php echo $i; ?>").val(downamt);
                                      $("#lesswti<?php echo $i; ?>").val(lesswt);
                                      $("#netamti<?php echo $i; ?>").val(tot);

                                    });
                                    $("#vatper").keyup(function(){
                                      var poamt = parseFloat($("#poamt").val());
                                      var down = parseFloat($("#downamti<?php echo $i; ?>").val());
                                      var bfper = parseFloat($("#beforewti<?php echo $i; ?>"));
                                      var wt = parseFloat($("#wh").val());
                                      var vat = parseFloat($("#vatper").val());
                                      var vatamt = (down*vat/100);
                                      var downamt = parseFloat((down*vat/100)+down);
                                      var lesswt = (down*wt/100);
                                      var tot = downamt-lesswt;
                                      $("#vati<?php echo $i; ?>").val(vatamt);
                                      $("#beforewti<?php echo $i; ?>").val(downamt);
                                      $("#lesswti<?php echo $i; ?>").val(lesswt);
                                      $("#netamti<?php echo $i; ?>").val(tot);
                                    });
                                    $("#wh").keyup(function(){
                                      var poamt = parseFloat($("#poamt").val());
                                      var down = parseFloat($("#downamti<?php echo $i; ?>").val());
                                      var bfper = parseFloat($("#beforewti<?php echo $i; ?>"));
                                      var wt = parseFloat($("#wh").val());
                                      var vat = parseFloat($("#vatper").val());
                                      var vatamt = (down*vat/100);
                                      var downamt = parseFloat((down*vat/100)+down);
                                      var lesswt = (down*wt/100);
                                      var tot = downamt-lesswt;
                                      $("#vati<?php echo $i; ?>").val(vatamt);
                                      $("#beforewti<?php echo $i; ?>").val(downamt);
                                      $("#lesswti<?php echo $i; ?>").val(lesswt);
                                      $("#netamti<?php echo $i; ?>").val(tot);
                                    });
                                    </script>
                                   <?php } ?>
                                </tbody>
                              </table>

                            </div>
                        </div>
                        <br>
                         <div class="text-right">
                        <a href="<?php echo base_url(); ?>ar/ar_down_payment" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
                         <a id="inst" class="btn btn-default"><i class="icon-list-numbered"></i> ADD Rows</a>
                          <button type="submit" class="btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
                          <a href="#" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
                        </div>

                      </div>
                    </div>
                  </form>
          </div>
          <!-- modal  โครงการ-->
           <div class="modal fade" id="openproj" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Select Project</h4>
                </div>
                  <div class="modal-body">
                  <div class="panel-body">
                      <div class="row" id="modal_project">

                      </div>
                      </div>
                  </div>
              </div>
            </div>
          </div> <!--end modal -->
          <!-- Full width modal -->
 				 				 <div id="openvender" class="modal fade" data-backdrop="false">
 				 					 <div class="modal-dialog modal-lg">
 				 						 <div class="modal-content">
 				 							 <div class="modal-header">
 				 								 <button type="button" class="close" data-dismiss="modal">&times;</button>
 				 								 <h5 class="modal-title">Select Debtor</h5>
 				 							 </div>

 				 							 <div class="modal-body">
 				 								 <div id="loaddebtor">

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
 				 				 <!-- /full width modal -->

          <script>
          $(".openproj").click(function(){
              $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
            });
            $(".ven").click(function(){
        			$("#loaddebtor").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        			$("#loaddebtor").load('<?php echo base_url(); ?>share/debtor');
        		});
            $("#inst").click(function(){
              addrow();
            });
            function addrow()
            {
              var row = ($('#body tr').length-0)+1;
              	var tr = '<tr>'+
                  '<td>'+row+'</td>'+
                  '<td><input type="text" class="form-control input-sm" name="descrepi[]"></td>'+
                  '<td><input type="text" class="form-control input-sm text-right" name="downamti[]" id="downamti'+row+'" value="0"></td>'+
                  '<td><input type="text" class="form-control input-sm text-center" name="vati[]" id="vati'+row+'" value="0"></td>'+
                  '<td><input type="text" class="form-control input-sm text-right" name="beforewti[]" id="beforewti'+row+'" value="0"></td>'+
                  '<td><input type="text" class="form-control input-sm text-right" name="lesswti[]" id="lesswti'+row+'" value="0"></td>'+
                  '<td><input type="text" class="form-control input-sm text-right" name="netamti[]" id="netamti'+row+'" value="0"></td>'+
                  '<td><input type="text" class="form-control input-sm text-center" name="refpaymentnoi[]"></td>'+
                  '<td>'+
                    '<ul class="icons-list">'+
                      '<li><a id="remove" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
                    '</ul>'+
                  '</td>'+
                '</tr>';
                $('#body').append(tr);

                $("#downamti"+row).keyup(function(){

                  var poamt = parseFloat($("#poamt").val());
                  var down = parseFloat($("#downamti"+row).val());
                  var wt = parseFloat($("#wh").val());
                  var vat = parseFloat($("#vatper").val());
                  var vatamt = (down*vat/100);
                  var downamt = parseFloat((down*vat/100)+down);
                  var lesswt = (down*wt/100);
                  var tot = downamt-lesswt;
                  $("#vati"+row).val(vatamt);
                  $("#beforewti"+row).val(downamt);
                  $("#lesswti"+row).val(lesswt);
                  $("#netamti"+row).val(tot);

                });
                $("#vatper").keyup(function(){
                  var poamt = parseFloat($("#poamt").val());
                  var down = parseFloat($("#downamti"+row).val());
                  var bfper = parseFloat($("#beforewti"+row));
                  var wt = parseFloat($("#wh").val());
                  var vat = parseFloat($("#vatper").val());
                  var vatamt = (down*vat/100);
                  var downamt = parseFloat((down*vat/100)+down);
                  var lesswt = (down*wt/100);
                  var tot = downamt-lesswt;
                  $("#vati"+row).val(vatamt);
                  $("#beforewti"+row).val(downamt);
                  $("#lesswti"+row).val(lesswt);
                  $("#netamti"+row).val(tot);
                });
                $("#wh").keyup(function(){
                  var poamt = parseFloat($("#poamt").val());
                  var down = parseFloat($("#downamti"+row).val());
                  var bfper = parseFloat($("#beforewti"+row));
                  var wt = parseFloat($("#wh").val());
                  var vat = parseFloat($("#vatper").val());
                  var vatamt = (down*vat/100);
                  var downamt = parseFloat((down*vat/100)+down);
                  var lesswt = (down*wt/100);
                  var tot = downamt-lesswt;
                  $("#vati"+row).val(vatamt);
                  $("#beforewti"+row).val(downamt);
                  $("#lesswti"+row).val(lesswt);
                  $("#netamti"+row).val(tot);
                });

            }

          </script>

           <script>


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
