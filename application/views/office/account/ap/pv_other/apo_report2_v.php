
      <?php foreach ($editapo as $v) {
        $apono = $v->apo_code;
        $payto = $v->m_name;
        $apodate = $v->apo_date;
        $depname = $v->department_title;
        $project_name = $v->project_name;
        $aporemark = $v->apo_remark;
      } ?>

        <div id="example" style="font-size: 11px;">
            <div class="page-container">
                <div class="pdf-page size-a4">
                    <div class="pdf-header">
                    <span class="company-logo"></span>
                     <div class="row">
                            <div class="col-xs-12">
                            <form class="form-inline">
                        <div class="form-group">
                          <br><br><br><br>
                        <p style="margin-top:-50px;"> <img src="<?php echo base_url();?>comp/<?php echo $compimg; ?>" class="img-responsive" width="10%;"></p>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                        <div class="form-group">
                            <p style="font-size:16px; margin-top:-8px; margin-left:10px;">บริษัท เมฆา-เอส จำกัด</p>
                            <p style="font-size:11px; margin-top:-8px; margin-left:10px;">2082 หมู่ 2 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ</p>
                            <p style="font-size:11px; margin-top:-8px; margin-left:10px;"> จ.สมุทรปราการ 10270</p>
                        </div>
                            </div><!-- end col-xs-6 -->
                            <div class="col-xs-3"></div>
                            <div class="col-xs-3">
                                <div class="panel panel-default" style="margin-top:-30px;">
                                <div style="margin-left:30px;">
                                  <div class="row">
                                  <br>
                                    <p>No. <?php echo $apono; ?></p>
                                    <p>Date <?php echo  DateThai($apodate); ?></p>
                                    <p></p>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div><!-- end row -->

                        </div>
                        </div>
                            <!-- <p class="ex1" style="font-size:11px; margin-top:-5px; margin-left:10px;">  Contact Office 166
                             ม.10 ถ.สุขุมวิท107 ซ.แบริ่ง 30 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ จ.สมุรปราการ 10270</p> -->

<div style="margin-top:-80px; z-index: 3; position: absolute;">
                                       <div class="form-group" style="margin-left: 280px; margin-top:-1px;font-size:18px;">
                                       <p>Payment Voucher</p>
                                       </div>

                                       <div class="form-group" style="margin-left: 300px; margin-top:-15px;font-size:18px;">
                                       <p>ใบสำคัญจ่าย</p>
                                       </div>
                                       </div>
                                       <div class="row" style="margin-top:-10px;">
                                       <div class="col-xs-12">
                                          <!-- <div class="panel panel-default"> -->
                                              <!-- <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px; margin-bottom:0px;"> -->
                                                 <div class="row">
                                                   <div class="col-xs-4">
                                                     <div class="row">
                                                       <div class="col-xs-4">Pay To</div>
                                                       <div class="col-xs-12" style="margin-top:-16px; margin-left:45px; font-size:12px;"><?php echo $payto; ?></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-6"><span class="glyphicon glyphicon-unchecked"></span></div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-6"><span class="glyphicon glyphicon-unchecked"></span> Transfer Bank</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                      <div class="row">
                                                       <div class="col-xs-6"><span class="glyphicon glyphicon-unchecked"></span> By Cash</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                   </div>
                                                   <div class="col-xs-4">
                                                     <div class="row">
                                                       <div class="col-xs-6">Creditor Code</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-6">Bank</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-6">A/C No.</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                   </div>
                                                   <div class="col-xs-4">
                                                     <div class="row">
                                                       <div class="col-xs-4">AC</div>
                                                       <div class="col-xs-8"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-4">Chq.Date</div>
                                                       <div class="col-xs-8"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-4">Name</div>
                                                       <div class="col-xs-8"></div>
                                                     </div>
                                                   </div>
                                                 </div>
                                                 <br>
                                                 <div class="row">
                                                   <div class="col-xs-6">
                                                      <div class="row">
                                                       <div class="col-xs-2">Project/department</div>
                                                       <div class="col-xs-6" style="margin-left:65px;"><?php echo $depname; ?><?php echo $project_name; ?></div>
                                                     </div>
                                                   </div>
                                                 </div>
                                                 <div class="row">
                                                   <div class="col-xs-6">
                                                      <div class="row">
                                                       <div class="col-xs-3">Description</div>
                                                       <div class="col-xs-8"><?php echo $aporemark; ?></div>
                                                     </div>
                                                   </div>


                                                 </div>
                                                 <br>
                                              <!-- </div> -->

                                             <!-- </div> -->
                                         </div>
                                       </div>
                                       <table class="table table-bordered table-xxs">


                                       <tbody style="font-size: 10px;">
                                         <tr align="center" >
                                             <td width="10%;">No</td>
                                             <td>Description</td>
                                             <td width="5%;">Amount(Baht)</td>
                                             <td width="20%;">Cost Code</td>
                                         </tr>
                                           <?php $n=11; $total=0;
                                            foreach ($apoitem as $k) {
                                              $this->db->select('*');
                                              $this->db->where('doci_ref',$k->doci_ref);
                                              $query = $this->db->get('pv_apo_detail');
                                              $num = $query->num_rows();
                                              ?>
                                              <?php $p_totvat=0; $p_amount=0;
                                            $qe = $this->db->query("select * from pettycash_item where pettycashi_ref = '$k->doci_pcno'");
                                            $resu = $qe->result();
                                                  foreach ($resu as $ke) {
                                                    $p_vat = $ke->pettycashi_vat;
                                                    $p_wh = $ke->pettycashi_wh;
                                                    $p_totwh = $ke->pettycashi_totwh;
                                                    $p_amount += $ke->pettycashi_amounttot;
                                                   $p_totvat += $ke->pattycashi_totvat;
                                                   $p_invno = $ke->pettycashi_invno;
                                                   $p_invdate = $ke->pettycashi_invdate;
                                                   $p_costcode = $ke->pettycashi_costcode;
                                                  }
                                             ?>
                                            <tr>
                                              <td class="text-center"><?php echo $n; ?></td>
                                              <td>(<?php echo $k->doci_pcno; ?>) - <?php echo $k->doci_remark; ?></td>
                                              <td class="text-right"><?php echo number_format($p_amount,2); ?></td>
                                              <td class="text-center"><?php echo substr($p_costcode, 10);?></td>
                                            </tr>

                                             <?php if ($p_vat!=0) {?>
                                               <tr>
                                                <td></td>
                                                <td> Vat <?php echo $p_vat; ?>% ใบกำกับภาษี <?php echo $p_invno; ?> วันที่ <?php echo $p_invdate; ?> </td>
                                                <td class="text-right"><?php echo $p_totvat; ?></td>
                                                <td></td>
                                              </tr>
                                            <?php }else{} ?>
                                            <?php if ($p_wh!=0) {?>
                                               <tr>
                                                <td></td>
                                                <td> ภาษีหัก ณ ที่จ่าย WH/Tax <?php echo $p_wh; ?>%  </td>
                                                <td class="text-right">(<?php echo $p_totwh; ?>)</td>
                                                <td></td>
                                              </tr>
                                           <?php } ?>
                                          <?php $n++;
                                                $total= $total+$k->doci_netamt;
                                          } if ($num=="1"){?>
                                          <?php for ($n=0; $n <8 ; $n++) { ?>
                                           <tr >
                                              <td align="center"></td>
                                              <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                              <td class="text-right"></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <?php } ?>
                                          <?php  } if ($num=="2") {?>
                                          <?php for ($n=0; $n <7 ; $n++) { ?>
                                            <tr >
                                              <td align="center"></td>
                                              <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                              <td class="text-right"></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <?php } ?>
                                           <?php }elseif($num=="3"){ ?>
                                           <?php for ($n=0; $n <6 ; $n++) { ?>
                                            <tr >
                                              <td align="center"></td>
                                              <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                              <td class="text-right"></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <?php } ?>
                                           <?php } ?>
                                           <?php if ($dat<=20) {?>
                                             <tr>
                                               <tr >
                                               <td align="center"></td>
                                               <td>ยอดจ่ายสุทธิ/Net</td>
                                               <td class="text-right"><?php echo number_format($total2,2); ?></td>
                                               <td class="text-right"></td>
                                           </tr>
                                             </tr>
                                           <?php } ?>

                                       </tbody>
                                       </table>


<?php if ($dat<=20) {?>
  <table class="table table-bordered table-xxs">
  <tbody>
     <tr>
      <td align="center"> <strong><?php echo Convert($total2); ?></strong> </td>
    </tr>
  </tbody>
  </table>




     <div class="pdf-footer">
     <table class="table table-bordered" >
     <thead>
     <tr>
     <!-- <td width="20%" align="middle"><p><br><?php echo $payto; ?><br></p></td>  ผึ้งขอเปลี่ยน-->
     <td width="20%" align="middle"><p><br><?php echo $user; ?><br></p></td>
     <td width="20%"></td>
     <td align="middle" width="20%"></td>
     <td width="20%"></td>
     <td width="20%"></td>
     </tr>
     </thead>
     <tbody>
     <tr>
     <td align="center"><p style=" font-size:8pt; line-height: 9pt; font-weight:normal;">
     Prepareed By <br><br><?php echo DateThai(date("Y-m-d")); ?></td>
     <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
     Verified By <br><br>Date :____/____/_____</td>
     <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
     Approved By NinjaERP <br><br>Date :____/____/_____</td>
     <td align="center"><p style=" font-size:8pt;  line-height: 9pt;  font-weight:normal">
     Received By <br><br>Date :____/____/_____</td>
     <td align="center"><p style=" font-size:8pt;  line-height: 9pt;  font-weight:normal">
     Posted By <br><br>Date :____/____/_____</td>
     </tr>

     </tbody>
     </table>
     </div>

<?php } ?>

                    </div>

                </div>

            </div>
        </div>

    </body>
    </html>
