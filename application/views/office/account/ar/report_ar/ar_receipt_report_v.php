<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Print Document</title>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<style>
        .navbar-default{background:#1a1e58; color:#fff;}
        body{background: #ddd;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;;
        }
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

        .size-a4 { width: 8.3in; height: 11.6929in; }
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
.legend_custom {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 19.5px;
    line-height: inherit;
    color: #333333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px 15px;
    line-height: 1.5384616;
    vertical-align: top;
    border-top: 0px solid 
  }
    </style>


</head>


<body>
<?php $n=0; foreach ($compimg as $v) {
  $vou_no = $v->vou_no;
  // $inv_date = $v->vou_desc;
  $debtor_name = $v->debtor_name;
  $debtor_tax = $v->debtor_tax;
  $debtor_address = $v->debtor_address;
  $inv_no = $v->vou_no;
  $project_name = $v->project_name;
  $apvdate = $v->vou_date;
  $inv_credit = $v->vou_credit;
  // $vou_desc = $v->vou_desc;
  $debtor_name = $v->debtor_name;
  $vou_period = $v->vou_period;
  // $inv_downamt = $v->vou_downamt;
  // $inv_vatper = $v->vou_vatper;
  // $inv_vatamt = $v->vou_vatamt;
  // $inv_lesswt = $v->vou_lesswt;
  // $inv_netamt = $v->vou_netamt; 
  $vou_contact = $v->vou_contact; 
$n++; } ?>
<div id="example" >
    <div class="page-container">
        <div class="pdf-page size-a4">
            <div class="pdf-header">
            <span class="company-logo"></span>
             <div class="row">
             <div class="col-xs-3">
             <div class="form-group">
             <br><br>
                    <p style="margin-top:-40px;"> <img src="http://cloudmeka.com/comp/comp_2016-11-09_1497.jpg" class="img-responsive " width="100%"></p>
                    
              </div>
              </div>
              <div class="col-xs-6">
                    <div class="form-group">
                       <center> <b><p style="font-size:20px; margin-top:-8px;">บริษัท เมฆา-เอส จำกัด</p></b>
                        <b><p style="font-size:12pt; margin-top:-8px;">ใบสำคัญเจ้าหนี้การค้า</p></b>
                        <b><p style="font-size:12pt; margin-top:-8px;">Account Payble Voucher</p></b></center>
                    </div>
                        </div>

                           <div class="col-xs-3">
                    <div class="form-group">
                    <div style="margin-left: -50px;">
            <img src="https://www.barcodesinc.com/generator/image.php?code=<?php echo $vou_no; ?>&style=197&type=C128A&width=232&height=50&xres=1&font=3" alt="the barcode printer: free barcode generator" border="0">  </div>  <br>   
                    <p style="font-size:7pt; margin-top:-8px; "> AP Voucher No. : <?php echo $vou_no; ?></p>
                    </div>
                        </div>
             </div>
           <script>
      $("#siteloader").load('http://www.somesitehere.com');
    </script>
    <div class="row">
             <div class="col-xs-9">
             <div class="input-group">
                    <p style="font-size:10pt;">Date :&nbsp;&nbsp; <?php echo $apvdate; ?>&nbsp;&nbsp; Year : &nbsp;&nbsp;<?php echo date("Y"); ?> &nbsp;&nbsp; Period : &nbsp;&nbsp;<?php echo date("m"); ?></p>
                                  
                    </div>
                        </div>
             
                           
                    <div class="form-group">
                    <div class="col-xs-3">
                    <p style="font-size:10pt; text-align: right;">P/O</p>
                      
                    </div>
                      <div class="col-xs-12"  style="margin-top:-25px;">
                    <hr>
                    </div>
                        </div>
                        
                             </div>
                 <div class="row">
             <div class="form-group">
              <div class="table-responsive" style="margin-top:-10px;">
              <table class="table" >
                <thead>
                  <tr> 
                    <th width="15%" style="text-align: center;"><p style="font-size:9pt;">รหัสบัญชี<br><b>A/C CODE</b></p></th>
                    <th width="40%" style="text-align: center;"><p style="font-size:9pt;">ชื่อบัญชี<br><b>Particular</b></p></th>
                    <th width="5%" style="text-align: center;"><p style="font-size:9pt;" style="text-align: center;">เดบิต<br><b>Debit</b></p></th>
                    <th width="5%" style="text-align: center;"><p style="font-size:9pt;">เครดิต<br><b>Credit</b></p></th>
                  </tr>
                </thead>
                <tbody>
                 <?php $tot="0"; foreach ($vhono as $key) {  
                  ?>
                  <tr>
                    <td><?php echo $key->acct_no;?></td>
                    <td><?php echo $key->act_name;?></td>
                    <td style="text-align: right;"><?php echo number_format($key->amtdr,2);?></td>
                    <td style="text-align: right;"><?php echo number_format($key->amtcr,2);?></td>     
                  </tr>
                  <?php
                   $tot=$tot=$tot+$key->amtdr; 
                 } 
                   ?>
                  <tr>
                    
                    <td colspan="2"></td>
                     <td style="text-align: right;"><?php echo number_format($tot,2); ?></td>
                    <td style="text-align: right;"><?php echo number_format($tot,2); ?></td>
                  </tr>
                  <tr>
                </tbody>

              </table>

            </div>
             <div div class="col-xs-12"  style="margin-top:-10px;">
              <hr style="border:1px;border-bottom:1px dashed #000"/>
              </div>
      <div class="row">         
             <div class="form-group">
       
             <div class="col-xs-12">
                     
                     <p style="font-size:8pt;"><b>โครงการ/แผนก (Project/Department) :</b>  <?php echo $project_name; ?></p>
                     <p style="font-size:8pt; "><b>เจ้าหนี้ (Supplier) :</b> <?php echo $debtor_name; ?> </p>
                    </div>
                 <div class="col-xs-4">
                     <p style="font-size:8pt;">P/O NO. : <?php echo $vou_contact; ?></p>
                    </div>
                     <div class="col-xs-3">
                     <p style="font-size:8pt;">Rec NO. : <?php echo $vou_no; ?></p>
                    </div>                
             </div>
             <br>
                                      
    <table class="table table-bordered table-xxs">
            <thead>
              <tr>
              <td align="middle" width="20%"><p><br>Administrator<br></p></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
            </thead>
            <tbody>
               <tr>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt; font-weight:normal;">
                       ผู้จัดทำ <br>Entried/Printed by <br><br>Date :2016-07-07</p></td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                       ผู้ตรวจสอบ <br>Checked by <br><br>Date :____/____/_____</p></td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                       ผู้อนุมัติ <br>Approved by <br><br>Date :____/____/_____</p></td>
               <td align="center"><p style=" font-size:8pt;  line-height: 9pt;  font-weight:normal">
                       ผู้บันทึกบัญชี <br>Posted by<br><br>Date :____/____/_____</p></td>
                <td align="center"><p style=" font-size:8pt;  line-height: 9pt;  font-weight:normal">
                       ผู้อนุมัติจ่าย <br>Authorized by<br><br>Date :____/____/_____</p></td>
               </tr>

              </tbody>
       </table>                 
</body>
</html>
