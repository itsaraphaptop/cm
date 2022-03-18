
   
<?php foreach ($res as $val) {
    $docno = $val->docno;
    $projcode = $val->project_code;
    $project = $val->project_name;
    $dptcode = $val->department_code;
    $department = $val->department_title;
    $empname = $val->vender;
    $pcdate = $val->docdate;
} ?>

    
    <div id="example" >
        <div class="page-container">
            <div class="pdf-page size-a4">
                <div class="pdf-header">
                <span class="company-logo"></span>
                 <div class="row">
                        <div class="col-xs-12">
                        <form class="form-inline">
                    <div class="form-group">
                    <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:45px;"></p>
                    <h3 style="margin-top: -40px; margin-left: 250px;">ใบสำคัญจ่าย</h3>
                    <h4 style="margin-top: -8px; margin-left: 250px;">Payment Voucher</h4>
                    
                    </div>

                                   
                <div class="row" style="margin-top:10px;">
                <div class="col-xs-12">
                   <div class="panel panel-default">
                  
                   <div class="row">
                    <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px; margin-bottom:0px;">
                               <div class="col-xs-4">
                            <p>รหัสโครงการ/แผนก : <?php echo $projcode;?><?php echo $dptcode; ?></p>
                               </div>
                                <div class="col-xs-4">
                            <p>ชื่อโครงการ : <?php echo $project;?><?php echo $department; ?></p>
                               </div>
                                <div class="col-xs-4">
                            <p>เลขที่ : <?php echo $docno;?></p>
                               </div>
                               <div class="col-xs-8">
                            <p>ชื่อที่อยู่ของผู้รับเงิน : <?php echo $empname;?></p>
                               </div>
                               <div class="col-xs-4">
                            <p>วันที่ : <?php echo $pcdate;?></p>
                               </div>
                           </div>
                        </div>
                      </div>
                  </div>
                                                                                                                                                        
                </div>
                            
                    </div>
                    </div>

                 <table class="table table-bordered"style="font-size:11px;">
                        <thead>
                            <tr align="center" >
                                <td width="5%;"><p>ลำดับ <br><p>Item<br></p></td>
                                <td width="10%;"><p>รหัสต้นทุน <br><p>Cost Code<br></p></td>
                                <td width="8%;"><p>อ้างถึง <br><p>Ref.<br></p></td>
                                <td><p>รายการ <br><p>Item<br></p></td>
                                <td width="15%;"><p>จำนวนเงิน <br><p>Amount<br></p></td>
                            </tr>
                        </thead>
                        
                        
                    <tbody>
                        <?php
                            $n = 1;
                            $total = 0;
                            $discount = 0;
                             foreach($resi as $pval){
                              $this->db->select('*');
                              $this->db->where('pettycashi_ref',$pval->pettycashi_ref);
                              $query = $this->db->get('pettycash_item');
                              $num = $query->num_rows();
                              ?>
                            <tr >
                                <td  align="center"><?php echo $n;?></td>
                                <td align="center"><?php echo substr($pval->pettycashi_expenscode,10,5);?></td>
                                <td align="center"><?php echo substr($pval->pettycashi_expenscode, -5);?></td>
                                <td><?php echo $pval->pettycashi_expens;?></td>
                                <td class="text-right"><?php echo number_format((double)$pval->pettycashi_unitprice, 2, '.', ',');?></td>
                            </tr>
                          <?php $n++;  $total=$total+$pval->pettycashi_netamt; } if ($num=="1") {?>
                         <?php for ($n=0; $n <16 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php  } if ($num=="2") {?>
                            <?php for ($n=0; $n <15 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="3"){ ?>
                             <?php for ($n=0; $n <14 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="4"){ ?>
                             <?php for ($n=0; $n <13 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="5"){ ?>
                             <?php for ($n=0; $n <12 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="6"){ ?>
                             <?php for ($n=0; $n <11 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                              <?php }elseif($num=="7"){ ?>
                             <?php for ($n=0; $n <10; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                              <?php }elseif($num=="8"){ ?>
                             <?php for ($n=0; $n <9 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                             <?php }elseif($num=="9"){ ?>
                             <?php for ($n=0; $n <8 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                              <?php }elseif($num=="10"){ ?>
                              <?php for ($n=0; $n <7 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }elseif($num=="11"){ ?>
                              <?php for ($n=0; $n <6 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }elseif($num=="12"){ ?>
                              <?php for ($n=0; $n <5 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }elseif($num=="13"){ ?>
                              <?php for ($n=0; $n <4 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }elseif($num=="14"){ ?>
                              <?php for ($n=0; $n <3 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                            <?php }elseif($num=="15"){ ?>
                              <?php for ($n=0; $n <2 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }else{ ?>
                             
                             <?php } ?>          
                              

                       </tbody>
                          <tr >
                                  
                                  <td colspan="4">xxx</td>
                                  <td></td>
                              </tr>
                    </table>

     <div class="row text-right" style="margin-top:-10px;">
                        <div class="col-xs-2 col-xs-offset-8">
                            <p>
                              <strong>
                                Total : <br>
                              </strong>
                            </p>
                        </div>
                    <div class="col-xs-2">
                      
                              <strong>
                                <?php echo number_format((double)$total, 2, '.', ',');?> บาท<br>
                              </strong>
                    </div>
                 </div>    


<div  style="margin-top: 10px;">
               <table class="table table-bordered " >
                    <thead>
                      <tr>
                       <td align="middle"><p><br><?php echo $user; ?><br></p></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>
                    </thead>
                    <tbody>
                       <tr>
                       <td align="center"><p style=" font-size:8pt; line-height: 9pt; font-weight:normal;">
                                ผู้ออกเอกสาร / Issued By </td>
                       <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                               ผู้อนุมัติ / Approved By</td>
                       <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                               ผู้ตรวจสอบ / Checked By</td>
                       <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                               ผู้รับ / Received By</td>
                       </tr>
                                   
                      </tbody>
                    </table>
                    <p class="text-right" style="font-size:10px; margin-right:40px;"> ต้นฉบับ-บัญชีการเงิน</p>
                    <p class="text-right" style="font-size:10px; "> FM-AC-02, 22/09/2015</p>
           </div>      

                </div>

            </div>

        </div>
    </div>
</body>
</html>