
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
              <li><a href="index.html"><i class="icon-home2 position-left"></i> ระบบบัญชี</a></li>
              <li>บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี (Tax Invoice/Receipt)</li>
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

                  <form method="post" action="<?php echo base_url(); ?>ar_active/add_arreceipt">
                    <div class="panel panel-flat border-top-lg border-top-success">
                      <div class="panel-heading ">
                        <h5 class="panel-title">บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี</h5>
                        <div class="heading-elements">
                          <ul class="icons-list">
                                    <li<a class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select Invoice</a></li>
                                  </ul>
                                </div>
                      </div>

                      <div class="panel-body">
                        <!-- contant -->
                        <fieldset>
                        <div class="col-md-6">
                          <legend class="text-semibold"><i class="icon-reading position-left"></i> Tax Invoice/Receipt</legend>

                          <div class="form-group">
                            <label>Receipt No.:</label>
                            <input type="text" class="form-control" id="re_no"  name="re_no" required="" placeholder="Receipt No.">
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
                            <!-- <div class="col-md-3">
                              <label>Period:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="period" name="period" placeholder="Period No." value="1">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div> -->

                            <!-- <div class="col-md-3">
                              <label>Credit Term:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="crterm" name="crterm" placeholder="Credit Term" value="0">
                                <span class="input-group-addon">Day</span>
                              </div>
                            </div> -->
                          </div>
                        </div>
                         <div class="col-md-6">
                                  <legend class="text-semibold"><i class="icon-truck position-left"></i> </legend>

                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Receipt Date: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="ardate" name="ardate">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>TAX: </label>
                                <select class="form-control" name="tax" id="tax">
                                  <option value="1">Yes</option>
                                  <option value="2" selected>No</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>TAX No: </label>
                                <div class="input-group">
                                <input type="text" class="form-control" disabled id="taxno" name="taxno">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>RV/RL No.:</label>
                                <input type="text" class="form-control"  id="rvrlno" name="rvrlno">
                              </div>
                            </div>
                            <div class="col-md-3">
                                <label>RV/RL Date.:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                <input type="text" class="form-control daterange-single"  id="rvrldate" name="rvrldate">
                              </div>
                            </div>
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
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Voucher No.:</label>
                                <input type="text" class="form-control"  id="vou_no" name="vou_no" placeholder="PO/Contract No.">
                              </div>
                            </div>
                            <div class="col-md-3">
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



                        <div class="tabbable">
                          <ul class="nav nav-tabs nav-tabs-highlight">
                            <li class=""><a href="#panel-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> GL</a></li>
                            <li class="active"><a href="#panel-pill2" data-toggle="tab" aria-expanded="true"><i class=" icon-wrench position-left"></i> Material</a></li>
                          </ul>
                          <div class="tab-content" id="table">
                              <div class="tab-pane has-padding " id="panel-pill1">
                                <div id="vat" class="table-responsive">
                                  <table class="table table-hover table-xxs ">
                                    <thead>
                                      <tr>
                                        <th width="5%">#</th>
                                        <th width="5%"></th>
                                        <th width="20%">Description</th>
                                        <th width="10%">เดบิต</th>
                                        <th width="10%">เครดิต</th>
                                      </tr>
                                    </thead>
                                    <tbody id="glacc">
                                      <?php for ($i=1; $i < 6; $i++) { ?>
                                        <tr>

                                      <td><?php echo $i; ?></td>
                                      <td><input type="text" class="form-control input-sm"></td>
                                      <td><input type="text" class="form-control input-sm"></td>
                                      <td><input type="number" class="form-control input-sm"></td>
                                      <td><input type="number" class="form-control input-sm"></td>

                                    </tr>
                                     <?php } ?>
                                  </tbody>
                                </table>
                                </div>
                              </div>

                              <div class="tab-pane has-padding active" id="panel-pill2">
                                <div id="meterial" class="table-responsive">
                                  <table class="table table-hover table-xxs">
                                       <thead>
                                         <tr>
                                           <th>#</th>
                                           <th>Description</th>
                                           <th>Amount</th>
                                           <th>VAT</th>
                                           <th>Before W/T </th>
                                           <th>Less W/T </th>
                                           <th>ภาษี(%)</th>
                                           <th>Net Amount</th>
                                         </tr>
                                       </thead>
                                       <tbody id="bodymat">
                                         <?php for ($i=1; $i < 6; $i++) { ?>
                                         <tr>
                                           <td><?php echo $i; ?></td>
                                           <td>
                                            <div class="input-group">
                                              <input type="text" class="form-control" name="matcodei[]" id="newmatcode<?php echo $i;?>">
                                              <span class="input-group-btn">
                                              <a data-toggle="modal" data-target="#opnewmat<?php echo $i; ?>" class="openun<?php echo $i;?> btn btn-default btn-icon">
                                              <i class="icon-search4"></i>
                                              </a>
                                              </span>
                                            </div>
                                          </td>
                                           <td>
                                            <input type="text" class="form-control input-sm"  name="matnamei[]" id="newmatname<?php echo $i; ?>">
                                          </td>
                                           <td><input  type="text" class="form-control input-sm text-right" name="downamti[]" id="qty<?php echo $i; ?>" value="0"></td>
                                           <td width="10%"><div class="input-group"><input  type="text" class="form-control" name="uniti[]" id="unit<?php echo $i;?>"><span class="input-group-btn"><a data-toggle="modal" data-target="#modalunit" class="btn btn-default btn-icon"><i class="icon-search4"></i></a></span></div></td>
                                           <td width="10%"><input  type="text" class="form-control input-sm text-right" name="unitpricei[]" id="unitpricei<?php echo $i; ?>" value="0"></td>
                                           <td width="10%"><input  type="text" class="form-control input-sm text-center" name="vati[]" id="vati<?php echo $i; ?>" value="0">
                                           <input type="hidden" class="form-control input-sm text-right" name="beforewti[]" id="beforewti<?php echo $i; ?>" value="0">
                                           <input type="hidden" class="form-control input-sm text-right" name="lesswti[]" id="lesswti<?php echo $i; ?>" value="0"></td>
                                           <td width="10%"><input type="text" class="form-control input-sm text-right" name="netamti[]" id="netamti<?php echo $i; ?>" value="0"></td>
                                           <!-- <td><input type="text" class="form-control input-sm text-center" name="refpaymentnoi[]"></td> -->
                                           <td>
                                             <ul class="icons-list">
                                               <!-- <li><a data-toggle="modal" data-target="#edit" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li> -->
                                               <li><a id="remove<?php echo $i;?>" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>
                                             </ul>
                                           </td>
                                         </tr>
                                           <script>  $('#remove<?php echo $i;?>').on('click', function() {$(this).closest('tr').remove();});</script>
                                           <script>
                                           $("#qty<?php echo $i; ?>").keyup(function(){
                                             var poamt = parseFloat($("#poamt").val());
                                             var down = parseFloat($("#qty<?php echo $i; ?>").val());
                                             var unitprice = parseFloat($("#unitpricei<?php echo $i; ?>").val());
                                             var vat = parseFloat($("#vatper").val());
                                             var downamt = parseFloat((totamt*vat/100)+totamt);
                                             $("#vati<?php echo $i; ?>").val(vatamt);
                                             $("#netamti<?php echo $i; ?>").val(downamt);

                                           });
                                           $("#unitpricei<?php echo $i; ?>").keyup(function(){
                                             var poamt = parseFloat($("#poamt").val());
                                             var down = parseFloat($("#qty<?php echo $i; ?>").val());
                                             var unitprice = parseFloat($("#unitpricei<?php echo $i; ?>").val());
                                             var vat = parseFloat($("#vatper").val());
                                             var totamt = down*unitprice;
                                             var vatamt = (totamt*vat/100);
                                             var downamt = parseFloat((totamt*vat/100)+totamt);
                                             $("#vati<?php echo $i; ?>").val(vatamt);
                                             $("#netamti<?php echo $i; ?>").val(downamt);

                                           });
                                           $("#vatper").keyup(function(){
                                             var poamt = parseFloat($("#poamt").val());
                                             var down = parseFloat($("#qty<?php echo $i; ?>").val());
                                             var unitprice = parseFloat($("#unitpricei<?php echo $i; ?>").val());
                                             var bfper = parseFloat($("#beforewti<?php echo $i; ?>"));
                                             var vat = parseFloat($("#vatper").val());
                                             var vatamt = (unitprice*vat/100);
                                             var downamt = parseFloat((unitprice*vat/100)+unitprice);
                                             $("#vati<?php echo $i; ?>").val(vatamt);
                                             $("#netamti<?php echo $i; ?>").val(downamt);
                                           });
                                           </script>
                                           <!-- modal material -->
                                           <div id="opnewmat<?php echo $i; ?>" class="modal fade">
                                            <div class="modal-dialog modal-full">
                                              <div class="modal-content ">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h5 class="modal-title">เพิ่มรายการ</h5>
                                                </div>
                                                  <div class="modal-body">
                                                      <div class="row" id="modal_mat<?php echo $i; ?>"></div>

                                                  </div>
                                              </div>
                                            </div>
                                            </div>
                                            <script>
                                            $(".openun<?php echo $i; ?>").click(function(){
                                               $('#modal_mat<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                               $("#modal_mat<?php echo $i; ?>").load('<?php echo base_url(); ?>index.php/share/material_id/<?php echo $i; ?>');
                                             });
                                            </script>
                                         <?php } ?>
                                       </tbody>
                                     </table>
                                </div>
                              </div>
                           <div class="text-right">
                                <a href="<?php echo base_url(); ?>ar/ar_down_payment" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
                                <a id="inst" class="btn btn-default"><i class="icon-list-numbered"></i> ADD Rows</a>
                                <button type="submit" class="btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
                                <a href="#" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
                            </div>
                          </div>
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
                 <!-- Full width modal  INV-->
        				 				 <div id="openinv" class="modal fade" data-backdrop="false">
        				 					 <div class="modal-dialog modal-lg">
        				 						 <div class="modal-content">
        				 							 <div class="modal-header">
        				 								 <button type="button" class="close" data-dismiss="modal">&times;</button>
        				 								 <h5 class="modal-title">Select Invoice</h5>
        				 							 </div>

        				 							 <div class="modal-body">
        				 								 <div id="loadinv">

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
          $("#tax").change(function(){
            if ($("#tax").val()=="1") {
              $("#taxno").prop('disabled',false);
            }else{
              $("#taxno").prop('disabled',true);
              $("#taxno").val('');
            }
          });
          $(".openproj").click(function(){
              $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
            });
            $(".openinv").click(function(){
        			$("#loadinv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        			$("#loadinv").load('<?php echo base_url(); ?>ar/load_voucher');
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
                      '<li><a data-toggle="modal" data-target="#edit" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>'+
                      '<li><a id="remove'+row+'" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>'+
                    '</ul>'+
                  '</td>'+
                '</tr>';
                $('#body').append(tr);
            }

          </script>
