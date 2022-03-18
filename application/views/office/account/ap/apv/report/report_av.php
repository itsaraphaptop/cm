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
      <?php foreach ($editapv as $v) {
  $apvcode = $v->apv_code;
  $pono = $v->apv_pono;
  $vender = $v->apv_vender;
  $duedate = $v->apv_duedate;
  $dono = $v->apv_do;
  $term = $v->apv_crterm;
  $apvdate = $v->apv_date;
  $projectname = $v->project_name;
  $project_id = $v->project_id;
  $system = $v->apv_system;
  $invno = $v->apv_inv;
  $depname = $v->department_title;
  $depid = $v->apv_department;
} ?>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:40px;">
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a onclick="history.go(-1)" type="button" class="btn btn-warning navbar-btn"><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>
 
        </div><!--/.nav-collapse -->
      </div>
    </nav>
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
            <img src="https://www.barcodesinc.com/generator/image.php?code=<?php echo $apvcode; ?>&style=197&type=C128A&width=232&height=50&xres=1&font=3" alt="the barcode printer: free barcode generator" border="0">  </div>  <br>   
                    <p style="font-size:7pt; margin-top:-8px; "> AP Voucher No. : <?php echo $apvcode; ?></p>
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
                    <th width="10%" style="text-align: center;"><p style="font-size:9pt;">รหัสต้นทุน<br><b>Cost Code</b></p></th>
                    <th width="40%" style="text-align: center;"><p style="font-size:9pt;">ชื่อบัญชี<br><b>Particular</b></p></th>
                    <th width="5%" style="text-align: center;"><p style="font-size:9pt;" style="text-align: center;">เดบิต<br><b>Debit</b></p></th>
                    <th width="5%" style="text-align: center;"><p style="font-size:9pt;">เครดิต<br><b>Credit</b></p></th>
                  </tr>
                </thead>
                <tbody>
                 <?php $tot="0"; foreach ($apglwhere as $v) { ?>
                  <tr>
                    <td style="text-align: center;"><?php echo $v->acct_no;?></td>
                    <td><?php echo $v->costcode;?></td>
                    <td><?php echo $v->act_name;?></td>
                    <td style="text-align: center;"><?php echo $v->amtdr;?></td>
                    <td style="text-align: center;"><?php echo $v->amtcr;?></td>     
                  </tr>
                  <?php $tot=$tot=$tot+$v->amtdr;  } ?>
                  <tr>
                    
                    <td colspan="3"></td>
                     <td style="text-align: center;"><?php echo $tot; ?></td>
                    <td style="text-align: center;"><?php echo $tot; ?></td>
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
                     
                     <p style="font-size:8pt;"><b>โครงการ/แผนก (Project/Department) :</b>  <?php echo $projectname; ?></p>
                     <p style="font-size:8pt; "><b>เจ้าหนี้ (Supplier) :</b> <?php echo $vender; ?> </p>
                    </div>
                 <div class="col-xs-4">
                     <p style="font-size:8pt;">P/O NO. : <?php echo $pono; ?></p>
                    </div>

                   <div class="col-xs-3">
                     <p style="font-size:8pt;">ครบกำหนด (Due Date) : <?php echo $term; ?></p>
                    </div>

                     <div class="col-xs-3">
                     <p style="font-size:8pt;">Rec NO. : <?php echo $apvcode; ?></p>
                    </div>

                    <div class="col-xs-4">
                     <p style="font-size:8pt;">ใบส่งของ ( DO. NO. ). : <?php echo $dono; ?></p>
                    </div>

                    <div class="col-xs-5">
                     <p style="font-size:8pt;">วันส่งของ ( DO. NO. ). : <?php echo $duedate; ?></p>
                    </div>

                     <div class="col-xs-12">
                     <p style="font-size:8pt;">Tax No. </p>
                    </div>
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
