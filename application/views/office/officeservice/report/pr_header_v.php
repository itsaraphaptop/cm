
<style>
      .navbar-default{background:#1a1e58; color:#fff;}
</style>
<style>

        body{background: #ddd;}
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


        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
    </style>
        </head>
<?php foreach ($res as $val) {
	$prno = $val->pr_prno;
	$prdate = $val->pr_prdate;
	$project = $val->project_name;
	$department = $val->department_title;
	$delivery = $val->pr_deliplace;
	$pr_delidate = $val->pr_delidate;
    $project_code = $val->project_code;
    $system = $val->pr_system;
} ?>

<body>


    <div id="example" >
	    <div class="page-container">
		    <div class="pdf-page size-a4">
			    <div class="pdf-header">
			    <span class="company-logo"></span>
			    	  <div class="row">
                        <div class="col-xs-12">
                        <form class="form-inline">
                    <div class="form-group">
                    <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>/comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:45px;"></p>
                    <h2 style="margin-top: -40px; margin-left: 300px;">ใบขอซื้อ</h2>
                    <h4 style="margin-top: -9px; margin-left: 250px;">Purchase Requisition Form</h4>
                    <p style="margin-left:550px; margin-top:-25px;">เลขที่ : <?php echo $prno; ?></p>
                    </div>

                    <div class="row" style="margin-top:30px;">
	                    <div class="col-xs-6">
		                    <div class="form-group">
		                        <p style=" margin-top: -10px; margin-left:10px;">วันที่ : <?php echo $prdate; ?></p>
		                        <p style=" margin-top:-8px; margin-left:10px;">โครงการ/ฝ่าย :<?php echo $project_code; ?> - <?php echo $project; ?><?php echo $department; ?></p>
		                        <p style=" margin-top:-8px; margin-left:10px;">ส่งของที่ : <?php echo $delivery; ?></p>
		                        <p style=" margin-top:-8px; margin-left:10px;">วันที่ต้องการของ : <?php echo $pr_delidate; ?></p>
		                    </div>
	                    </div><!-- end col-xs-6 -->
	                    <div class="col-xs-6" style="margin-top:10px;">
	                    	<div class="form-group">
	                    		<label class="checkbox-inline">
								  <input type="checkbox" id="inlineCheckbox1" value="option1"> สั่งจาก Office
								</label>
								<label class="checkbox-inline" style="margin-left:50px;">
								  <input type="checkbox" id="inlineCheckbox2" value="option2"> วัสดุ : Material
								</label>
								<br>
								<label class="checkbox-inline">
								  <input type="checkbox" id="inlineCheckbox3" value="option3"> สั่งจาก : Site
								</label>
								<label class="checkbox-inline" style="margin-left:55px;">
								  <input type="checkbox" id="inlineCheckbox4" value="option4"> สินทรัwย์ : Asset
								</label>
								<br>
                <?php if ($system=="2") {?>
                <label class="checkbox-inline" >
                  <input type="checkbox" checked id="inlineCheckbox5" value="option5" disabled="disabled"> AC
                </label>
                <?php }else{ ?>
                     <label class="checkbox-inline" >
                      <input type="checkbox" id="inlineCheckbox5" value="option5" disabled="disabled"> AC
                    </label>
                <?php } ?>

								<?php if ($system=="3") {?>
                <label class="checkbox-inline" >
                  <input type="checkbox" checked id="inlineCheckbox5" value="option5" disabled="disabled"> EE
                </label>
                <?php }else{ ?>
                     <label class="checkbox-inline" >
                      <input type="checkbox" id="inlineCheckbox5" value="option5" disabled="disabled"> EE
                    </label>
                <?php } ?>
								<?php if ($system=="4") {?>
                <label class="checkbox-inline" >
                  <input type="checkbox" checked id="inlineCheckbox5" value="option5" disabled="disabled"> SN
                </label>
                <?php }else{ ?>
                     <label class="checkbox-inline" >
                      <input type="checkbox" id="inlineCheckbox5" value="option5" disabled="disabled"> SN
                    </label>
                <?php } ?>
								<?php if ($system=="5") {?>
                <label class="checkbox-inline" >
                  <input type="checkbox" checked id="inlineCheckbox5" value="option5" disabled="disabled"> CIVIL
                </label>
                <?php }else{ ?>
                     <label class="checkbox-inline" >
                      <input type="checkbox" id="inlineCheckbox5" value="option5" disabled="disabled"> CIVIL
                    </label>
                <?php } ?>
	                    	</div>
	                    </div>
                    </div><!-- end row -->

                    </div>
                    </div>
                    	<table class="table table-bordered"style="font-size:11px; margin-top: 30px; ">
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
	                    	$n = 1;
		                    $total = 0;
		                    $discount = 0;
		                     foreach($resi as $pval){?>
                         <?php  $this->db->select('*');
                              $this->db->where('pri_ref',$pval->pri_ref);
                              $query = $this->db->get('pr_item');
                              $num = $query->num_rows();
                         ?>
                            <tr >
                            	<th scope="row"><?php echo $n;?></th>
                                <td align="center"><?php echo substr($pval->pri_costcode, -5);?></td>
	                            <?php $sum = $pval->pri_priceunit*$pval->pri_qty;?>
                                <td><?php echo $pval->pri_matname;?></td>

                                <td align="center"><?php echo $pval->pri_qty;?></td>
                                <td align="center"><?php echo $pval->pri_unit;?></td>
                                <td><?php echo $pval->pri_remark; ?></td>
                            </tr>
                            <?php $n++; } if ($num=="1") {?>
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
                            <?php  } if ($num=="2") {?>
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
                            <?php }elseif($num=="3"){ ?>
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
                            <?php }elseif($num=="4"){ ?>
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
                            <?php }elseif($num=="5"){ ?>
                             <?php for ($n=0; $n <11 ; $n++) { ?>
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
                            <?php }elseif($num=="7"){ ?>
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
                             <?php }elseif($num=="8"){ ?>
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
                            <?php }elseif($num=="9"){ ?>
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
                             <?php }elseif($num=="10"){ ?>
                             <?php for ($n=0; $n <6 ; $n++) { ?>
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

                      <table class="table table-bordered " style="margin-top:30px;" >
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
                       ผู้ขอซื้อ <br>Entried/Printed by <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                       แผนกจัดการโครงการ/ฝ่าย/แผนก <br>Purchasing Department <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                       รองกรรมการผู้จัดการ <br>Authorized Signature <br><br>Date :____/____/_____</td>
               </tr>

              </tbody>
            </table>




			    </div>
		    </div>
	    </div>
      </body>
</html>
