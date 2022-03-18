<?php foreach ($res as $val) {
	$prno = $val->pr_prno;
	$prdate = $val->pr_prdate;
	$project = $val->project_name;
	$department = $val->department_title;
	$delivery = $val->pr_deliplace;
	$pr_delidate = $val->pr_delidate;
    $project_code = $val->project_code;
} ?>

<div class="page-container" style="margin-top:20px;">
		    <div class="pdf-page size-a4">
			    <div class="pdf-header">
			    <span class="company-logo"></span>
			    	  <div class="row">
                        <div class="col-xs-12">
                        <form class="form-inline">
                    <div class="form-group">
                    <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:45px;"></p>
                    <h2 style="margin-top: -40px; margin-left: 300px;">ใบขอซื้อ</h2>
                    <h4 style="margin-top: -9px; margin-left: 250px;">Purchase Requisition From</h4>
                    <p style="margin-left:550px; margin-top:-25px;">เลขที่ : <?php echo $prno; ?></p>
                    </div>

                            
                    </div>
                    </div>
                    	<table class="table table-bordered"style="font-size:11px; ">
                        <thead>
                            <tr align="center" >
								<td width="5%;"><p>ลำดับ <br><p>Item<br></p></td>
                                <td width="10%;"><p>รหัสต้นทุน <br><p>cost code<br></p></td>
                                <td><p>รายการ <br><p>Description<br></p></td>
                                <td width="5%;"><p>จำนวน <br><p>Quantity<br></p></td>
                                <td width="5%;"><p>หน่วย <br><p>Unit<br></p></td>
                                <td width="15%;"><p>หมายเหตุ</p></td>
                            </tr>
                        </thead>
                        
                        
                    <tbody>
	                    <?php
	                    	$u = 11;
		                    $total = 0;
		                    $discount = 0;
		                     foreach($resi as $pval){?>
		                 <?php  $this->db->select('*');
                              $this->db->where('pri_ref',$pval->pri_ref);
                              $this->db->limit('10',10);
                              $query = $this->db->get('pr_item');
                              $num = $query->num_rows();
                         ?>
                            <tr >
                            	<th scope="row"><?php echo $u;?></th>
                                <td align="center"><?php echo substr($pval->pri_costcode, -5);?></td>
	                            <?php $sum = $pval->pri_priceunit*$pval->pri_qty;?>
                                <td><?php echo $pval->pri_matname;?></td>
                                
                                <td align="center"><?php echo $pval->pri_qty;?></td>
                                <td align="center"><?php echo $pval->pri_unit;?></td>
                                <td><?php echo $pval->pri_remark; ?></td>
                            </tr>
                            <?php $u++; }  if ($num=="1") {?>
                      			 <?php for ($n=0; $n <17 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php  } if ($num=="2") {?>
                            <?php for ($n=0; $n <16 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="3"){ ?>
                             <?php for ($n=0; $n <15 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="4"){ ?>
                             <?php for ($n=0; $n <14 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="5"){ ?>
                             <?php for ($n=0; $n <13 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="6"){ ?>
                             <?php for ($n=0; $n <12 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="7"){ ?>
                             <?php for ($n=0; $n <10 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
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
                                <td></td>
                            </tr>
                            <?php } ?>
                             <?php } ?>

                       </tbody>
                    </table>

           <div class="footer" style="margin-top:100px;" style="position: relative; bottom:0px;">
           	   <table class="table table-bordered " >
		            <thead>
		              <tr>
		              <td><p><br><br></p></td>
		              <td></td>
		              <td></td>
		              </tr>
		            </thead>
		            <tbody>
		               <tr>
		               <td align="center"><p style=" font-size:8pt; line-height: 9pt; font-weight:normal;">
		                        Requester By <br>ผู้ขอซื้อ <br><br>Date :____/____/_____</td>
		               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
		                       Reviewed By <br>ผู้อำนวยการฝ่าย/แผนกจัดการโครงการ/ฝ่าย/แผนก <br><br>Date :____/____/_____</td>
		               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
		                       Approved By <br>รองกรรมการผู้จัดการ <br><br>Date :____/____/_____</td>
		               </tr>
		                           
		              </tbody>
		            </table>
                    <p class="text-right" style="font-size:10px; margin-right:40px;"> ต้นฉบับ-จัดซื้อ</p>
                    <p class="text-right" style="font-size:10px; "> FM-PU-01, 01/08/2015</p>
           </div>      
         
			    </div>
		    </div>
	    </div>
	     </div>


</body>
</html>