
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

                  <form method="post" action="<?php echo base_url(); ?>ar_active/edit_arreceipt">
                    <div class="panel panel-flat border-top-lg border-top-success">
                      <div class="panel-heading ">
                        <h5 class="panel-title">บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี</h5>
                        <div class="heading-elements">
                          <ul class="icons-list">
                                    <!-- <li<a class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select Invoice</a></li> -->
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
                            <input type="text" class="form-control"  name="arno"  placeholder="Receipt No." value="<?php echo $arno; ?>">
                          </div>

                           <div class="form-group">
                            <label>Project:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php echo $projname; ?>" name="projectname" id="projectname">
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
                            <input type="text" class="form-control" placeholder="Owner/Customer" readonly   name="owner" id="owner" value="<?php echo $debname; ?>">
      											<input type="hidden" name="venderid" id="venderid" value="<?php echo $vowner; ?>">
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
                                  <input type="text" class="form-control daterange-single" id="ardate" name="ardate" value="<?php echo $ardate; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>TAX: </label>
                                <select class="form-control" name="tax" id="tax">
                                  <?php if($taxtype=='1'){ ?><option value="1" selected>Yes</option><?php }else{ ?> <option value="1">Yes</option><?php } ?>
                                  <?php if($taxtype=='2'){ ?><option value="2" selected>No</option><?php }else{ ?> <option value="2">No</option><?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>TAX No: </label>
                                <div class="input-group">
                                <input type="text" class="form-control" id="taxno" name="taxno" value="<?php echo $taxno; ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>RV/RL No.:</label>
                                <input type="text" class="form-control"  id="rvrlno" name="rvrlno" value="<?php echo $invno; ?>">
                              </div>
                            </div>
                            <div class="col-md-3">
                                <label>RV/RL Date.:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                <input type="text" class="form-control daterange-single"  id="rvrldate" name="rvrldate" value="<?php echo $invdate; ?>">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label>VAT:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="vatper" name="vatper" placeholder="7%" value="<?php echo $vatper; ?>">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label>W/T:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="wh" name="wh" placeholder="W/T" value="<?php echo $wtper; ?>">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Voucher No.:</label>
                                <input type="text" class="form-control"  id="po" name="po" placeholder="PO/Contract No." value="<?php echo $contact; ?>">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Contract Amount.:</label>
                                <input type="text" class="form-control text-center" id="poamt" name="poamt" placeholder="Contract Amount" value="<?php echo $contamt; ?>">
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
                            <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="true"><i class=" icon-coins position-left"></i> GL</a></li>
                            <li class=""><a href="#panel-pill2" data-toggle="tab" aria-expanded="false"><i class=" icon-wrench position-left"></i> Material</a></li>
                          </ul>
                          <div class="tab-content" id="table">
                             <div class="tab-pane has-padding active" id="panel-pill1">
                              <table class="table table-xxs">
                              <thead>
                                <tr>
                                  <th width="5%">#</th>
                                  <th width="5%"></th>
                                  <th width="10%">Account Code</th>
                                  <th width="20%">Account Name</th>
                                  <th width="auto">Material</th>
                                  <th width="10%">Dr</th>
                                  <th width="10%">Cr</th>
                                </tr>
                              </thead>
                              <tbody id="body"> 
                              <?php $nn=1; $tot = 0;
                                foreach ($resi as $val) {                           
                              ?>  
                              <tr>
                                <th scope="row"><?php echo $nn;?></th>
                                <th>AMOUNT</th>
                                <?php 
                                  // $query = $this->db->query("select * from account_total where act_code=$val->acct_no ");
                                  // $res = $query->result();
                                  $this->db->select('*');
                                  $this->db->where('vchno',$val->vou_ref);
                                  $this->db->where('itemno',$nn);
                                  $this->db->where('gl_type','AMOUNT');
                                  $this->db->join('account_total','account_total.act_code=ar_gl.acct_no');
                                  $query = $this->db->get('ar_gl');
                                  $res = $query->result();

                                foreach ($res as $value) {
                                  ?>
                                  <th>
                                  <div class="input-group">
                                  <input type="hidden" name="chki" value="ss" id="chki"><input type="hidden" name="vati"  id="vati" value="11">
                                  <input type="hidden" name="gl_id[]" id="gl_id" value="<?php echo $val->vou_id; ?>">
                                  <input type="hidden" name="vati"  id="vati">
                                  <input type="hidden" name="gl_idd[]" id="gl_idd" value="<?php echo $value->id_gl; ?>">
                                  <input type="text" class="form-control input-sm" name="accno_gl[]" id="accno_gl<?php echo $nn; ?>" value="<?php echo $value->act_code; ?>" >
                                  <div class="input-group-btn"><button type="button" class="accopen<?php echo $nn;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#accopen<?php echo $nn; ?>"><i class="icon-search4"></i></button></div></div></th>
                                  <td><input type="text" class="form-control input-sm" readonly id="accountname<?php echo $nn; ?>" name="accountname_gl[]" value="<?php echo $value->act_name; ?>"/></td>
                                  <?php 
                                } 
                                  ?>
                                  <td>
                                    <input type="text" class="form-control input-sm"  name="descrepi[]" id="descrepi<?php echo $nn;?>" value="<?php echo $val->vou_desc; ?>"/>

                                 </td>
                                  <td><input type="text" class="form-control input-sm"  name="vou_netamt[]" id="vou_netamt<?php echo $nn;?>" value="<?php echo $val->vou_netamt; ?>"/>
                                  </td>
                                  <td><input type="text" class="form-control input-sm"  name="amtcr" id="" value="0.00"/>
                                  </td>
                                  <div id="accopen<?php echo $nn;?>" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">Account <?php echo $nn; ?></h5>
                                        </div>

                                        <div class="modal-body">
                                          <div class="loadaccchart<?php echo $nn;?>">

                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
                                          <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
                                        </div>
                                      </div>
                                    </div>
                                   </div> 
                                   <script>
                                     $(".accopen<?php echo $nn;?>").click(function(){
                                     $('.loadaccchart<?php echo $nn;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                     $(".loadaccchart<?php echo $nn;?>").load('<?php echo base_url(); ?>share/accchart/<?php echo $nn; ?>');
                                     });
                                     </script>
                                       <?php $nn++; $ii=$nn; $tot=$tot+$val->vou_netamt; } ?>
                                       <tr>
                                          <th><?php echo $ii; ?></th>
                                           <th>VENDER</th>
                                           <?php 
                                            $this->db->select('*');
                                            $this->db->where('vchno',$val->vou_ref);
                                            $this->db->where('itemno',$ii);
                                            $this->db->where('gl_type','VENDER');
                                            $this->db->join('account_total','account_total.act_code=ar_gl.acct_no');
                                            $query = $this->db->get('ar_gl');
                                            $res_v = $query->result();
                                            foreach ($res_v as $value_v) {
                                            ?>
                                           <th>
                                        <div class="input-group">
                                        <input type="text" class="form-control input-sm" name="accno_gl[]" id="accno<?php echo $ii; ?>" value="<?php echo $value_v->act_code; ?>">
                                        <div class="input-group-btn"><button type="button" class="accopen2<?php echo $ii;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#accopen2<?php echo $ii; ?>"><i class="icon-search4"></i></button></div></div></th>
                                        <td><input type="text" class="form-control input-sm" readonly id="accountname<?php echo $ii; ?>" name="accountname_gl[]" value="<?php echo $value_v->act_name; ?>"/></td>
                                        <?php 
                                          }
                                         ?>
                                        <td>
                                          <input type="text" class="form-control input-sm" readonly id="" name="" value=""/>
                                        </td>
                                        <td class="text-right">
                                          <input type="text" class="form-control input-sm" readonly id="" name="" value="0.00"/>
                                        </td>
                                        <td class="text-right">
                                          <input type="text" class="form-control input-sm" readonly id="" name="" value="<?php echo number_format($tot,2); ?>"/>
                                        </td>

                                       </tr>
                                       <tr >
                                         <th colspan="5" >Total</th>
                                         <th class="text-right"><?php echo number_format($tot,2); ?></th>
                                         <th class="text-right"><?php echo number_format($tot,2); ?></th>
                                       </tr>

                                   </tbody>
                                </table>  
                                <div id="accopen2<?php echo $nn;?>" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">Account <?php echo $nn; ?></h5>
                                        </div>

                                        <div class="modal-body">
                                          <div class="loadaccchart<?php echo $nn;?>">

                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
                                          <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
                                        </div>
                                      </div>
                                    </div>
                                   </div> 
                                        <script>
                                     $(".accopen2<?php echo $ii;?>").click(function(){
                                     $('.loadaccchart<?php echo $ii;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                     $(".loadaccchart<?php echo $ii;?>").load('<?php echo base_url(); ?>share/accchart/<?php echo $ii; ?>');
                                     });
                                     </script>                       
                            </div>
                            <div class="tab-pane has-padding" id="panel-pill2">
                              <div class="table table-responsive">
                                <table class="table table-xxs">
                                  <thead>
                                    <tr>
                                      <th class="text-center">#</th>
                                      <th class="text-center" width="30%">Description</th>
                                      <th class="text-center">Amount</th>
                                      <th class="text-center">VAT</th>
                                      <th class="text-center">Before W/T</th>
                                      <th class="text-center">Less W/T</th>
                                      <th class="text-center">Net Amount</th>
                                    </tr>
                                  </thead>
                                  <tbody >
                                    <?php 
                                    $total = 0;$n =1;
                                    foreach ($resi as $v) { 
                                    ?>
                                   <tr>
                                     <th class="text-center"><?php echo $n; ?></th>
                                     <td class="text-center">
                                       <input type="text"  class="form-control input-sm" id="descrepi<?php echo $n; ?>" name="descrepi[]" value="<?php echo $v->vou_desc; ?>">
                                     </td>
                                    <td class="text-center">
                                       <input type="text"  class="form-control input-sm" name="vati[]" id="vati" value="<?php echo $v->vou_downamt; ?>">
                                     </td>
                                     <td class="text-center">
                                       <input type="text" class="form-control input-sm" name="vou_vatamt[]" id="vou_vatamt" value="<?php echo $v->vou_vatamt; ?>">
                                     </td>
                                     <td class="text-center">
                                       <input type="text" class="form-control input-sm" name="vou_beforewt[]" id="vou_beforewt" value="<?php echo $v->vou_beforewt; ?>">
                                     </td>
                                     <td class="text-center">
                                       <input type="text" class="form-control input-sm" name="vou_lesswt[]" id="vou_lesswt" value="<?php echo $v->vou_lesswt; ?>">
                                     </td>
                                     
                                     <td class="text-center">
                                       <input type="text" class="form-control input-sm" readonly name="vou_netamt[]" id="vou_netamt" value="<?php echo $v->vou_netamt; ?>">
                                     </td>
                                   <!-- <td>#</td> -->
                                    </tr>
                                      <div id="openmat<?php echo $n;?>" class="modal fade" data-backdrop="false">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h5 class="modal-title">Select Material</h5>
                                            </div>

                                            <div class="modal-body">
                                              <div class="loadmat<?php echo $n;?>">

                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                          <script>
                                            $(".openmat<?php echo $n;?>").click(function(){
                                              $(".loadmat<?php echo $n;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                              $(".loadmat<?php echo $n;?>").load('<?php echo base_url(); ?>share/material_id/<?php echo $n; ?>');
                                            });
                                          </script>


                                     <?php 
                                     $n++; $total= $total+$v->vou_netamt; 
                                   } 
                                     ?>
                                     <tr>
                                       <th colspan="6" class="text-center"> Total</th>

                                       <th class="text-center" ><input type="text" class="form-control input-sm" name="totmat" id="totmat" readonly value="<?php echo number_format($total,2); ?>"></th>
                                     </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                      </div>
                    <!-- </div> -->
                  </form>
                  <div class="text-right">
                    <a href="<?php echo base_url(); ?>ar/ar_down_payment" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
                    <a id="inst" class="btn btn-default"><i class="icon-list-numbered"></i> ADD Rows</a>
                    <button type="submit" class="preload btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
                    <a href="<?php echo base_url(); ?>ar_report/report_receipt/<?php echo $arno; ?>" class="preload btn btn-default"></i>Print</a>
                    <a href="#" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
                  </div>
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
        			$("#loadinv").load('<?php echo base_url(); ?>ar/load_inv');
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
