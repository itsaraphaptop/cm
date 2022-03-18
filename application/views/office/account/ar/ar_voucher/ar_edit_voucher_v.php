
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
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="index.html"><i class="icon-home2 position-left"></i> ระบบบัญชี</a></li>
              <li>บันทึกตั้งลูกหนี้ (AR Voucher)</li>
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
          <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

          <div class="row">
<?php 
foreach ($savegl as $save) {
$inv_ref = $save->vou_no;
$inv_date = $save->vou_date;
$inv_duedate = $save->vou_invdate;
$project_name = $save->project_name;
$inv_project = $save->vou_project;
$debtor_name = $save->debtor_name;
$inv_owner = $save->vou_owner;
$inv_contact = $save->vou_contact;
$inv_contactamount = $save->vou_contactamount;
$inv_period = $save->vou_period;

$inv_credit = $save->vou_credit;
$inv_vat = $save->vou_vat;
$inv_wt = $save->vou_wt;
$inv_desc = $save->vou_desc;
$inv_downamt = $save->vou_downamt;
$inv_netamt = $save->vou_netamt;
}

 ?>
                  <form method="post" action="<?php echo base_url(); ?>ar_active/edit_arvoucher">
                  <!-- <input type="hidden" name="vati" id="vati"> -->
                  <input type="hidden" name="chki" id="chki" value="s">
                    <div class="panel panel-flat border-top-lg border-top-success" >
                      <div class="panel-heading ">
                        <h5 class="panel-title">AR Voucher</h5>
                        <div class="heading-elements">
                          <ul class="icons-list">
                                    <!-- <li<a class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select Invoice</a></li> -->
                                  </ul>
                                </div>
                      <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

                      <div class="panel-body">
                        <!-- contant -->
                        <fieldset>
                        <div class="col-md-6">
                          <legend class="text-semibold"><i class="icon-reading position-left"></i> AR Voucher</legend>

                          <div class="form-group">
                            <label>AR No.:</label>
                            <input type="text" class="form-control" name="arno" readonly="" placeholder="Voucher No." value="<?php echo $inv_ref;?>">
                          </div>

                           <div class="form-group">
                            <label>Project:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php echo $project_name; ?>" name="projectname" id="projectname">
                            <input type="hidden" readonly="true" value="<?php echo $inv_project; ?>" class="pproject1 form-control input-sm" name="projectid" id="putprojectid">
                            <div class="input-group-btn">
                              <button type="button" data-toggle="modal" data-target="#openproj" class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button>
                              
                            </div>
                          </div>
                          </div>


                          <div class="form-group">
                            <label>Owner/Customer:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                            </span>
                            <input type="text" class="form-control" placeholder="Owner/Customer" readonly="" name="owner" id="owner" value="<?php echo $debtor_name; ?>">
                            <input type="hidden" name="venderid" id="venderid" value="<?php echo $inv_owner; ?>">
                            <div class="input-group-btn">
                              <a class="ven btn btn-default btn-icon" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></a>
                              
                            </div>
                          </div>
                          </div>

                          <div class="row">
                            <div class="col-md-3">
                              <label>Period:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="period" name="period" placeholder="Period No." value="<?php echo $inv_period; ?>">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div>

                            <div class="col-md-3">
                              <label>Credit Term:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="crterm" name="crterm" placeholder="Credit Term" value="<?php echo $inv_credit; ?>">
                                <span class="input-group-addon">Day</span>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                                  <legend class="text-semibold"><i class="icon-truck position-left"></i> AR Voucher</legend>

                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>AR Date: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="ardate" name="ardate" value="<?php echo $inv_date; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Due Date: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="duedate" name="duedate" value="<?php echo $inv_duedate; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Inv Type: </label>
                                <div class="input-group">
                                  <select class="form-control input-sm" id="type" name="type">
                                    <option value="down" selected="">Down</option>                                    <option value="progress">Progress</option>                                    <option value="retention">Retention</option>                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Inv No.:</label>
                                <input type="text" class="form-control" id="invno" name="invno" placeholder="inv no." value="<?php echo $inv_ref; ?>">
                              </div>
                            </div>
                            <div class="col-md-3">
                                <label>Inv Date.:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                <input type="text" class="form-control daterange-single" id="invdate" name="invdate" value="2016-12-22">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>PO/Contract No.:</label>
                                <input type="text" class="form-control" id="po" name="po" placeholder="PO/Contract No." value="<?php echo $inv_contact; ?>">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Contract Amount.:</label>
                                <input type="text" class="form-control text-center" id="poamt" name="poamt" placeholder="Contract Amount" value="<?php echo $inv_contactamount; ?>">
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
                                <input type="text" class="form-control text-center" id="vatper" name="vatper" placeholder="7%" value="<?php echo $inv_vat ?>">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label>W/T:</label>
                              <div class="input-group">
                                <input type="text" class="form-control text-center" id="wh" name="wh" placeholder="W/T" value="<?php echo $inv_wt; ?>">
                                <span class="input-group-addon">%</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        </fieldset>
                        <br>
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
                                  $this->db->where('vchno',$val->vou_no);
                                  $this->db->where('itemno',$nn);
                                  $this->db->where('gl_type','AMOUNT');
                                  $this->db->join('account_total','account_total.act_code=ar_gl.acct_no');
                                  $query = $this->db->get('ar_gl');
                                  $res = $query->result();

                                foreach ($res as $value) {
                                  ?>
                                  <th>
                                  <div class="input-group">
                                  <input type="hidden" name="chki" value="ss" id="chki"><input type="hidden" name="vati"  id="vati">
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
                                            $this->db->where('vchno',$val->vou_no);
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
                                        <?php $total = 0;$n =1;
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


                                         <?php $n++; $total= $total+$v->vou_netamt;
                                         
                                        } ?>
                                         <tr>
                                           <th colspan="6" class="text-center"> Total</th>

                                           <th class="text-center" ><input type="text" class="form-control input-sm" name="totmat" id="totmat" readonly value="<?php echo number_format($total,2); ?>"></th>
                                         </tr>
                                       </tbody>
                                     </table>
                                  </div>
                              </div>
                              <div class="text-right">
                                <a href="<?php echo base_url(); ?>ar/ar_down_payment" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
                                <a id="inst" class="btn btn-default"><i class="icon-list-numbered"></i> ADD Rows</a>
                                <button type="submit" class="preload btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
                                <a href="<?php echo base_url(); ?>ar_report/report_voucher/<?php echo $inv_ref; ?>" class="preload btn btn-default"></i>Print</a>
                                <a href="#" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
                              </div>
                            </div>
                    </form>
                  </div>
                  
          </div>
          <!-- modal  โครงการ-->


           <div class="modal fade" id="openproj" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
                         <button type="button" class="close" data-dismiss="modal">×</button>
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
                                 <button type="button" class="close" data-dismiss="modal">×</button>
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
          $(".openproj").click(function(){
              $('#modal_project').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
              $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
            });
            $(".openinv").click(function(){
              $("#loadinv").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
              $("#loadinv").load('<?php echo base_url(); ?>ar/load_inv');
            });
            $(".ven").click(function(){
              $("#loaddebtor").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
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
                  '<td><input type="text" class="form-control input-sm" name="descrepi[]"><input type="hidden" name="chki[]" id="chki'+row+'" value="I"></td>'+
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
<div class="navbar navbar-default navbar-sm navbar-fixed-bottom">
            <ul class="nav navbar-nav no-border visible-xs-block">
              <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
            </ul>

            <div class="navbar-collapse collapse" id="navbar-second">
              <!-- <div class="navbar-text">
                © 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
              </div> -->

              <div class="navbar-right">
                <ul class="nav navbar-nav">
                  <li><a href="#">Page rendered in <strong>0.0332</strong> seconds.</a> </li>
                  <!-- <li><a href="#">Policy</a></li>
                  <li><a href="#" class="text-semibold">Upgrade your account</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-cog3"></i>
                      <span class="visible-xs-inline-block position-right">Settings</span>
                      <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="#"><i class="icon-dribbble3"></i> Dribbble</a></li>
                      <li><a href="#"><i class="icon-pinterest2"></i> Pinterest</a></li>
                      <li><a href="#"><i class="icon-github"></i> Github</a></li>
                      <li><a href="#"><i class="icon-stackoverflow"></i> Stack Overflow</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
            </div>
          </div>
          

