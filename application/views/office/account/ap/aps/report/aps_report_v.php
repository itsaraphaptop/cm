
<style>

        body{background: #ddd; font-size: 12px;}
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
        }
        .pdf-header {
            position: absolute;
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 8.3in; height: 11.5in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }
        .center{
          margin-left: -110px;
        }
  .fsize{
    font-size: 9px;
  }

        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
    </style>
    <body>
    <?php foreach ($editaps as $v) {
      $con  = $this->db->query("select project_code,project_name from project where project_id='$v->aps_project'");
      $rcon = $con->result();
    foreach ($rcon as $key => $value) {
      $projectcode = $value->project_code;
      $projectnam = $value->project_name;
    }
    $sys = $this->db->query("select systemname from system where systemcode='$v->aps_system'");
    $rsys = $sys->result();
    foreach ($rsys as $key => $vsys) {
      $system = $vsys->systemname;
    }
    $qcon = $this->db->query("select vender_name from vender where vender_id='$v->aps_contact'");
    $rven = $qcon->result();
    foreach ($rven as $kue) {
      $vendername = $kue->vender_name;
    }
      $apsno = $v->aps_code;
      $payto = $v->aps_contact;
      $apsdate = $v->aps_date;
      $depname = $v->department_title;
      $project_name = $v->project_name;
      $invcode = $v->aps_invno;
      $duedateh = $v->aps_date;
      $remark = $v->aps_remark;
      $vat = $v->aps_vatper;
      
    } ?>

    <div id="example" >
        <div class="page-container">
            <div class="pdf-page size-a4">
                <div class="pdf-header">
                <span class="company-logo"></span>
                 <div class="row">
                        <div class="col-xs-12">
                    <div class="form-group">
                        <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>comp/<?php echo $compimg; ?>" class="img-responsive" style="height:45px;"></p>
                    </div>
                    <div class="form-group" style="margin-left: 200px; margin-top:-80px;font-size:18px;">
                           เอกสารประกอบการเบิกงวดงาน ผู้รับเหมา
                    </div>

                        </div>
                        </div>
                            

                            



                    <div class="row" style="margin-top:20px;">
                    <div class="col-xs-9">
                       <!-- <div class="panel panel-default"> -->
                           <!-- <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px; margin-bottom:0px;"> -->
                              <div class="row">
                                <div class="col-xs-4">
                                  <div class="row">
                                    <div class="col-xs-12">Project code: <?php echo $projectcode; ?></div>
                                  </div>
                                </div>
                                <div class="col-xs-4">
                                </div>
                                <div class="col-xs-4">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-xs-12">
                                   <div class="row">
                                    <div class="col-xs-12">Project/department: <?php echo $projectnam; ?></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-xs-12">
                                   <div class="row">
                                    <div class="col-xs-12">System : <?php echo $system; ?></div>
                                  </div>
                                </div>
                              </div>
                              <br>
                           <!-- </div> -->

                          <!-- </div> -->
                      </div>
                      <div class="col-xs-3" style="margin-top:-20px;">
                      <div class="form-group">
                        <div class="col-xs-10 center text-right">Date:</div>
                        <div class="col-xs-10">
                                <?php echo date("Y/m/d") ?>
                        </div>
                      </div>
                               
                            </div>
                            <div class="col-xs-3">
                      <div class="form-group">
                        <div class="col-xs-10 center text-right">Duration of works:</div>
                        <div class="col-xs-10">
                                <?php echo date("Y/m/d") ?>
                        </div>
                      </div>
                               
                            </div>
                            <div class="col-xs-3">
                      <div class="form-group">
                        <div class="col-xs-10 center text-right">Progress Start:</div>
                        <div class="col-xs-10">
                                <?php echo date("Y/m/d") ?>
                        </div>
                      </div>
                               
                            </div>
                            <div class="col-xs-3">
                      <div class="form-group">
                        <div class="col-xs-10 center text-right">Progress cut date:</div>
                        <div class="col-xs-10">
                                <?php echo date("Y/m/d") ?>
                        </div>
                      </div>
                               
                            </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-3">
                        Payment No.: 1
                      </div>
                      <div class="col-xs-3">
                        LOI.NO : LO2016050001
                      </div>
                      <!-- <div class="col-xs-6">
                        Vender : <?php echo $vendername; ?>
                      </div> -->
                    </div>

                    <div class="row fsize">
                      <table class="table table-bordered table-xxs">
                        <thead>
                          <tr>
                            <th class="text-center"><?php echo $company; ?></th>
                            <th class="text-center"><?php echo $vendername; ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-group">
                                <div class="col-xs-9">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-9"><small>Only The System</small></div>
                                <div class="col-xs-3"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-9">Progress Payment Approve</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-9"><small>for this month</small></div>
                                <div class="col-xs-3"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-9"><small>Progress Payment</small></div>
                                <div class="col-xs-3"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-9">Accumlate</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                               <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-group">
                                <div class="col-xs-9"><small>Other Deduction</small></div>
                                <div class="col-xs-3"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-9">...............................</div>
                                <div class="col-xs-3"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-9">...............................</div>
                                <div class="col-xs-3"></div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-9">...............................</div>
                                <div class="col-xs-3"></div>
                              </div>
                               <div class="form-group">
                                <div class="col-xs-9"><small>Total</small></div>
                                <div class="col-xs-3"></div>
                              </div>
                            </td>
                            <td>
                               <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                               <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-3">aaaa</div>
                                <div class="col-xs-6">Price by Contact BOQ</div>
                                <div class="col-xs-3">aaaa</div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-bordered table-xxs">
                        <thead>
                          <tr class="bg-grey-300">
                            <th colspan="8" class="text-center">Summary</th>
                          </tr>
                          <tr style="font-size:8px;">
                           <td>Sub-contract <br><small style="margin-left:40px;">dddd</small></td>
                           <td>Accumlate <br><small style="margin-left:40px;">dddd</small></td>
                           <td class="text-center">% <br><small>dddd</small></td>
                           <td class="text-center">TAX 3% <br><small>dddd</small></td>
                           <td class="text-center">VAT 7% <br><small>dddd</small></td>
                           <td>Retention <br><small style="margin-left:40px;">dddd</small></td>
                           <td>Deduction <br><small style="margin-left:40px;">dddd</small></td>
                           <td>Total <br><small style="margin-left:40px;">dddd</small></td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php for ($i=1; $i < 13 ; $i++) { ?>
                          <tr>
                            <td>Payment No. <?php echo $i;?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table><br>
                      <div class="form-group">
                        <div class="col-xs-4 col-xs-offset-8">
                          <div class="col-xs-6">Date for Paid:</div>
                          <div class="col-xs-6"><?php echo date("Y/m/d") ?></div>
                        </div>
                      </div>
                    </div>







                             <!-- </div> -->
                             </div> <!-- /pdf-header -->
                             </div> <!-- /pdf-page size-a4 -->
                             </div> <!-- /page-container -->
                             </div> <!-- /div example -->

    </body>
    </html>
