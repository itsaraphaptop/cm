
<?php foreach ($res as $val) {
  $prno = $val->pr_prno;
  $project = $val->project_name;
  $department = $val->department_title;
  
} ?>


                    <div class="page-container">
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
	                    <div class="col-xs-6">
                    <div class="form-group ">
                        <p style="font-size:12px; margin-top:-8px; margin-left:50px;" >เลขประจำตัวผู้เสียภาษี : 0-1055056087-92-9</p>
                        <p style="font-size:11px; margin-top:-8px; margin-left:50px;" >Tel : 02-101-2388, 02-136-4379</p>
                        <p style="font-size:11px; margin-top:-8px; margin-left:50px;" >Fax : 02-136-4380</p>
                    </div>
	                    </div><!-- end col-xs-6 -->
                    </div><!-- end row -->
                            
                    </div>
                    </div>
                
         <legend></legend>
            
             
         
                        <div class="form-group" style="margin-left: 270px; margin-top:-1px;font-size:18px;">
                        <p>Purchase requisition</p>
                        </div>
                       
                        <div class="form-group" style="margin-left: 315px; margin-top:-15px;font-size:18px;">
                        <p>ใบขอซื้อ</p>
                        </div>
                                  
                    
                    
                <div class="row" style="margin-top:-10px;">
                <div class="col-xs-6">
                   <div class="panel panel-default">
	                   
	                  
                       
                       <div class="form-group" style="margin-left: 15px; margin-top:15px; font-size:11px;">
	                       <div class="row">
		                       <div class="col-xs-4">
                            <p>ส่ง / To :</p>
		                       </div>
		                       <div class="col-xs-8">
			                       
		                       </div>
		                       
	                       </div>
	                       
	                       <div class="row">
		                       <div class="col-xs-4">
                            <p>เรียน / Attn :</p>
		                       </div>
		                       <div class="col-xs-8">
			                      
		                       </div>
		                       
	                       </div>
	                        <div class="row">
		                       <div class="col-xs-4">
                            <p>โทรศัพท์ / Tel :</p>
		                       </div>
		                       <div class="col-xs-8">
			                      
		                       </div>
		                       
	                       </div>
	                       
                       </div>
                        
                      </div>
                  </div>
                                                                                                                                                              
               <div class="col-xs-6">  
                 <div class="panel panel-default" >
	                  <div class="form-group" style="margin-left: 15px; margin-top:15px; font-size:11px;">
	                 <div class="row">
		                       <div class="col-xs-5">
                            <p>เลขที่ใบขอซื้อ / PR.No.:</p>
		                       </div>
		                       <div class="col-xs-7">
			                       <?php echo $prno; ?>
		                       </div>
		                       
	                       </div>
	                       
	                       <div class="row">
		                       <div class="col-xs-5">
                            <p>โครงการ / Project :</p>
		                       </div>
		                       <div class="col-xs-7">
			                   <?php if ($project != "") {
                            echo $project;
                          }
                          elseif ( $department != "") {
                               echo $department;
                           } ?>  
		                       </div>
		                       
	                       </div>
                               <div class="row">
		                       <div class="col-xs-5">
                            <p>Quotation No. :</p>
		                       </div>
		                       <div class="col-xs-7">
			                      
		                       </div>
		                       
	                       </div>
	                        <div class="row">
		                       <div class="col-xs-5">
                            <p>วันที่ / Date</p>
		                       </div>
		                       <div class="col-xs-7">
			                 
		                       </div>
		                       
	                       </div>
                     
                          </div>
                  </div>
                 </div>
                </div>
           
                  
                        
                 
                     <p class="ex1" style="font-size:11px;">  รายการสินค้าที่สั่งซื้อ/ORFER DETAIL </p>         
                     <p class="ex1" style="font-size:10px;">ผู้ขายจะส่งสินค้าให้เป็นตามเงื่อนไขที่ได้เสนอไว้กับบริษัทฯดังต่อไปนี้/supplier shall 
                         supply the following items in good order and condition as per quotation namely </p>       
                     <table class="table table-bordered"style="font-size:11px;">
                        <thead>
                            <tr align="center" >
                                <td><p>รหัสสินค้า <br><p>item code<br></p></td>
                                <td><p>รายการ <br><p>Description<br></p></td>
                                <td><p>จำนวน <br><p>Quantity<br></p></td>
                                <td><p>หน่วย <br><p>Unit<br></p></td>
                                <td><p>ราคาต่อหน่วย <br><p>Unit Price<br></p></td>
                                <td><p>จำนวนเงิน <br><p>Amount<br></p></td>
                            </tr>
                        </thead>
                        
                        
                    <tbody>
	                    <?php
		                    $total = 0;
		                    $discount = 0;
		                     foreach($pitem as $pval){?>
                            <tr >
	                            <?php $sum = $pval->poi_priceunit*$pval->poi_qty;?>
                                <td align="center"><?php echo substr($pval->poi_costcode, -5);?></td>
                                <td><?php echo $pval->poi_matname;?></td>
                                <td class="text-right"><?php echo $pval->poi_qty;?></td>
                                <td class="text-right"><?php echo $pval->poi_unit?></td>
                                <td class="text-right"><?php echo $pval->poi_discountper1?> %</td>
                                <td class="text-right"><?php echo $pval->poi_discountper2?> %</td>
                                <td class="text-right"><?php echo number_format((double)$pval->poi_priceunit, 2, '.', ',');?></td>
                                <td class="text-right"><?php echo number_format((double)$pval->poi_priceunit*$pval->poi_qty, 2, '.', ',');?></td>
                            </tr>
                          <?php 
	                          $total = $total+$sum;
	                          
	                          $s1 =($pval->poi_priceunit  - (($pval->poi_discountper1 * $pval->poi_priceunit )/ 100))*$pval->poi_qty;
				  $s = $s1- (($pval->poi_discountper2 * $s1 )/ 100);
		           
	                          $discount = $sum - $s;
	                          } ?>
                      

                       </tbody>
                    </table>
                     
                     
                   
                          <div class="col-xs-6">
                         <div class="row text-left" style="margin-top:-10px;">
                            หมายเหตุ :  <br>
                         </div>
                          </div>
                    
                     
                     
                 <div class="row text-right" style="margin-top:-10px;">
                        <div class="col-xs-2 col-xs-offset-8">
                            <p>
                              <strong>
                                Sub Total : <br>
                                
                                Discount : <br>
                                TAX : <br>
                                Total : <br>
                              </strong>
                            </p>
                        </div>
                    <div class="col-xs-2">
	                    <?php 
                            $t = $total-$discount;
                            $tax = ($t*7/100); ?>
                              <strong>
                                <?php echo number_format((double)$total, 2, '.', ',');?> บาท<br>
                                
                                <?php echo number_format((double)$discount, 2, '.', ',');?> บาท<br>
                                <?php echo number_format((double)$tax, 2, '.', ',');?> บาท<br>
                                <?php echo number_format((double)$t+$tax,2, '.', ',');?> บาท<br>
                              </strong>
                    </div>
                 </div>                  
      
             

    
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
                       ผู้ขอซื้อ <br>Entried/Printed by <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                       แผนกจัดการโครงการ/ฝ่าย/แผนก <br>Purchasing Department <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                       รองกรรมการผู้จัดการ <br>Authorized Signature <br><br>Date :____/____/_____</td>
               </tr>
                           
              </tbody>
            </table>
   
    
                     
    

 

    
    
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
        
        .size-a4 { width: 8.3in; height: 11.7in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }
       
       
        #example{margin-top: 80px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
    </style>

</div>

