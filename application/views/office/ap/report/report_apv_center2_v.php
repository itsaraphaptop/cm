<?php foreach ($res as $v) {
  $apvno = $v->apv_code;
  $payto = $v->apv_vender;
  $apvdate = $v->apv_date;
  $depname = $v->department_title;
  $project_name = $v->project_name;
} ?>
                          <div class="page-container" style="margin-top:10px;">
                    <div class="pdf-page size-a4">
                    <div class="pdf-header">
                 <span class="company-logo">

                    <div class="row">
                        <div class="col-xs-12">
                        <form class="form-inline">
                    <div class="form-group">
                    <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:45px;"></p>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                    <div class="form-group">
                        <p style="font-size:16px; margin-top:-8px; margin-left:10px;">บริษัท เมฆา-เอส จำกัด</p>
                        <p style="font-size:11px; margin-top:-8px; margin-left:10px;">166 หมู่ 10 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ</p>
                        <p style="font-size:11px; margin-top:-8px; margin-left:10px;"> จ.สมุทรปราการ 10270</p>
                    </div>
                        </div><!-- end col-xs-6 -->
                        <div class="col-xs-3"></div>
                        <div class="col-xs-3">
                            <div class="panel panel-default" style="margin-top:-30px;">
                            <div class="container" style="margin-left:30px;">
                              <div class="row">
                              <br>
                                <p>No. <?php echo $apvno; ?></p>
                                <p>Date <?php echo $apvdate; ?></p>
                                <p></p>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div><!-- end row -->

                    </div>
                    </div>

         <legend></legend>
             <p class="ex1" style="font-size:11px; margin-top:-15px; margin-left:10px;">  Contact Office 166
              ม.10 ถ.สุขุมวิท107 ซ.แบริ่ง 30 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ จ.สมุรปราการ 10270</p>


                        <div class="form-group" style="margin-left: 280px; margin-top:-1px;font-size:18px;">
                        <p>Payment Voucher</p>
                        </div>

                        <div class="form-group" style="margin-left: 300px; margin-top:-15px;font-size:18px;">
                        <p>ใบสำคัญจ่าย</p>
                        </div>



                <div class="row" style="margin-top:-10px;">
                <div class="col-xs-12">
                   <!-- <div class="panel panel-default"> -->
                       <!-- <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px; margin-bottom:0px;"> -->
                          <div class="row">
                            <div class="col-xs-4">
                              <div class="row">
                                <div class="col-xs-4">Pay To</div>
                                <div class="col-xs-12" style="margin-top:-15px; margin-left:45px; font-size:10px;"><?php echo $payto; ?></div>
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
                            <div class="col-xs-4">
                               <div class="row">
                                <div class="col-xs-3">Description</div>
                                <div class="col-xs-8"></div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                               <div class="row">
                                <div class="col-xs-2">Project/department</div>
                                <div class="col-xs-6" style="margin-left:65px;"><?php echo $depname; ?><?php echo $project_name; ?></div>
                              </div>
                            </div>
                            <div class="col-xs-4">
                               <div class="row">
                                <div class="col-xs-3">CostCode</div>
                                <div class="col-xs-8"></div>
                              </div>
                            </div>
                          </div>
                          <br>
                       <!-- </div> -->

                      <!-- </div> -->
                  </div>
                </div>

                         <table class="table table-bordered"style="font-size:11px;">
                        <thead>
                            <tr align="center" >
                                <td width="10%;">No</td>
                                <td>Description</td>
                                <td width="5%;">Amount(Baht)</td>
                                <td width="20%;">Remark</td>
                            </tr>
                        </thead>


                    <tbody>
                            <?php $i=25; $total=0; foreach ($resitem as $e) {
                              $this->db->select('*');
                              $this->db->where('poi_ref',$e->poi_ref);
                              $query = $this->db->get('po_recitem');
                              $num = $query->num_rows();
                                $this->db->select('*');
                                $this->db->where('apv_pono',$e->poi_ref);
                                $qu = $this->db->get('apv_header');
                                $red = $qu->result();
                                foreach ($red as $ue) {
                                  $taxno = $ue->apv_inv;
                                  $pono = $ue->apv_pono;
                                  $duedate = $ue->apv_duedate;
                                  $apv_date =  $ue->apv_date;
                                  $apv_dateapprove = $ue->apv_dateapprove;
                                  $apv_useradd = $ue->apv_useradd;
                                }
                              ?>               
                            <tr >
                                <td align="center"><?php echo $i; ?></td>
                                <td><?php echo $e->poi_matname; ?></td>
                                <td class="text-right"><?php echo number_format($e->poi_netamt,2); ?></td>
                                <td><?php echo $e->poi_matcode; ?></td>
                            </tr>
                            <tr >
                                <td align="center"></td>
                                <td> Vat 7% ใบกำกับภาษี <?php echo $taxno; ?> วันที่ <?php echo $duedate; ?> </td>
                                <td class="text-right"><?php echo number_format($e->poi_netamt*7/100,2); ?></td>
                                <td><?php echo $e->poi_ref; ?></td>
                            </tr>
                            <?php $i++; 
                              $total=($total+$e->poi_netamt)+($e->poi_amount*7/100);}?>
                           
                            
                             <tr >
                                <td align="center"></td>
                                <td>ยอดตามใบเสร็จ/Total</td>
                                <td class="text-right"><?php echo number_format($total,2); ?></td>
                                <td class="text-right"></td>
                            </tr>
                            <tr >
                                <td align="center"></td>
                                <td>ภาษีหัก ณ ที่จ่าย/ WHT 3 %</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                            </tr>
                             <tr >
                                <td align="center"></td>
                                <td>ยอดจ่ายสุทธิ/Net</td>
                                <td class="text-right"><?php echo number_format($total,2); ?></td>
                                <td class="text-right"></td>
                            </tr>

                       </tbody>
                         </table>


                                    <div class="footer" style="margin-top:-10px;">

  <div class="pdf-footer">
                         <table class="table table-bordered" >
            <thead>
              <tr>
              <td width="20%" align="middle"><?php echo $apv_useradd; ?></td>
              <td width="20%"></td>
              <td align="middle" width="20%"><img src="<?php echo base_url(); ?>dist/img/sign/itsaraphap.png" class="img-responsive"></td>
              <td width="20%"></td>
              <td width="20%"></td>
              </tr>
            </thead>
            <tbody>
               <tr>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt; font-weight:normal;">
                      Prepareed By <br><br>Date :<?php echo  $apv_date; ?></td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                      Verified By <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                      Approved By NinjaERP <br><br>Date :<?php echo $apv_dateapprove; ?></td>
               <td align="center"><p style=" font-size:8pt;  line-height: 9pt;  font-weight:normal">
                      Received By <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:8pt;  line-height: 9pt;  font-weight:normal">
                      Posted By <br><br>Date :____/____/_____</td>
               </tr>

              </tbody>
       </table>
      </div>





                         </div>
                         </div>
                         </div>
                         </div>

</body>
</html>
