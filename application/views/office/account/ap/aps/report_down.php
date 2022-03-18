<?php
       function DateThai($strDate)
       {
         $strYear = date("Y",strtotime($strDate))+543;
         $strMonth= date("n",strtotime($strDate));
         $strDay= date("j",strtotime($strDate));
         $strHour= date("H",strtotime($strDate));
         $strMinute= date("i",strtotime($strDate));
         $strSeconds= date("s",strtotime($strDate));
         $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
         $strMonthThai=$strMonthCut[$strMonth];
         return "$strDay $strMonthThai $strYear";
       }

       $strDate = date("Y-m-d");
       // echo "Time now : ".DateThai($strDate);
     ?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NinjaERP Business Intelligence</title>

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
<?php
$this->db->select('*');
$this->db->from('ap_billsuc_header');
$this->db->where('ap_bill_type',1);
$this->db->where('ap_bill_contractno',$id);
$query=$this->db->get();
$query1 = $query->num_rows();
?>
                <?php
$this->db->select('*');
$this->db->from('lo');
$this->db->where('lo_lono',$id);
$query=$this->db->get()->result();
?>
<?php foreach ($query as $key) {
 $lo_id = $key->lo_id;
 $po = $key->lo_lono;
 $projownername = $key->projownername;
 $department= $key->department;
 $subcontact= $key->subcontact;
 $contactamount= $key->contactamount;
 $tax = $key->tax;
 $vat = $key->vat;
 $retentionper = $key->retentionper;
 $advance1 = $key->advance1;
 $contact = $key->contact;
}

?>

                <?php
$this->db->select('*');
$this->db->from('vender');
$this->db->where('vender_id',$contact);
$vender=$this->db->get()->result();
?>
<?php foreach ($vender as $v) {
 $vender_name = $v->vender_name;
 $vender_address = $v->vender_address;
}

?>

                <?php
$this->db->select('*');
$this->db->from('ap_billsuc_header');
$this->db->where('ap_bill_contractno',$id);
$this->db->where('ap_period',$period);
$this->db->where('ap_bill_type',$type);
$contractno=$this->db->get()->result();
?>
<?php $downall=0; foreach ($contractno as $c) {
 $ap_pay = $c->ap_pay;
 $ap_payper = $c->ap_payper;
 $ap_frome = $c->ap_frome;
 $downall = $downall+$c->ap_pay;

}
?>

<?php
$this->db->select('*');
$this->db->from('ap_billsuc_header');
$this->db->where('ap_bill_contractno',$id);
$this->db->where('ap_period <',$period);
$this->db->where('ap_bill_type',$type);
$contract=$this->db->get()->result();
?>
<?php $dap_payper=0; foreach ($contract as $d) {
      $dap_payper = $dap_payper+$d->ap_pay;
      $dap_payperr = number_format($dap_payper+$d->ap_pay);
}
?>
  <style>
      .navbar-default{background:#28343A; color:#fff;}
            </style>

        </head>
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

        .size-a4 { width: 9in; height: 11.7in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }
       .pdf-footer {
            position: relative;
            bottom: .2in;


            padding-top: 20px;


        }

        #example{margin-top: 80px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
    </style>

  <style>
p.double {border-style: double; padding: 6px 16px;}
</style>
                  


<body>


    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="<?php echo base_url();?>/comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:50px;">
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a href="<?php echo base_url(); ?>index.php/ap/open_billsubc" type="button" class="btn btn-warning navbar-btn" ><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onClick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>
 
        </div><!--/.nav-collapse -->
      </div>
    </nav>

                  <div id="example" >
                    <div class="page-container">
                    <div class="pdf-page size-a4">
                    <div class="pdf-header">
                 <span class="company-logo">

          <div class="row">

            <div class="col-xs-6 col-xs-offset-3">

                  <div style=" text-align:center; margin-left:10px; font-size:20px;">

                     <p class="double">เอกสารของเบิกค่าแรงผู้รับเหมาช่วง</p>
                  </div>
            </div>
          </div>
          <tr> 
                  

                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                        <p style="margin-top:-60px;"><img src="<?php echo base_url();?>/comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:45px;"></p>
                        </div>

                      </div>
                    </div>

                  
                    <br>
                    <br>
                    <div class="row">
                          <div class="row" style="margin-top:-50px;">
                              <div class="col-xs-8">
                                <div class="form-group">
                                    <p style="font-size:14px; margin-top:20px; margin-left:10px;">Project : <?php echo $projownername;?></p>
                                    <p style="font-size:14px; margin-top:-8px; margin-left:10px;">สัญญาว่าจ้างเลขที่ : <?php echo $key->lo_lono; ?></p>
                                    <p style="font-size:14px; margin-top:-8px; margin-left:10px;">ชื่อผู้รับเหมา : <?php echo $vender_name ; ?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vender_address;?></p>
                                      <p style="font-size:14px; margin-top:-8px; margin-left:10px;">รายการ : งวดที่ <?php echo $period;?></p>
                                </div>
                            </div><!-- end col-xs-6 -->
                              <div class="col-xs-4">
                                <div class="form-group" align="right">
                                    <p style="font-size:14px; margin-top:20px; margin-left:10px;">No : F-<?php echo date("dmY"); ?><?php echo $lo_id; ?></p>
                                    <p style="font-size:14px; margin-top:-8px; margin-left:10px;">วันที่ : <?php echo DateThai($strDate); ?></p>
                                    <p style="font-size:14px; margin-top:-8px; margin-left:10px;"><?php if($type==2){echo " Down ";}else if($type==1){
      echo " Prograss Payment ";}else if($type==3){ echo " Retention "; } ?>เบิกครั้งที่ : <?php echo $period;?></p>
                                </div>
                              </div><!-- end col-xs-6 -->
                              
                          </div><!-- end row -->
                    </div>
                    


            <div class="row">
              <div class="col-xs-12">
                <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="3" style="text-align: center;">ยอดเงินเบิกครั้งที่แล้ว</th>
                    <th colspan="3" style="text-align: center;">ยอดเงินเบิกครั้งนี้</th>
                    <th colspan="3" style="text-align: center;">รวมเงินเบิก</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="2" style="text-align: center;">% งานที่ได้ทำจริง</td>
                    <td rowspan="2" style="text-align: center;">จำนวนเงิน</td>
                    <td colspan="2" style="text-align: center;">% งานที่ได้ทำจริง</td>
                    <td rowspan="2" style="text-align: center;">จำนวนเงิน</td>
                    <td colspan="2" style="text-align: center;">% งานที่ได้ทำจริง</td>
                    <td rowspan="2" style="text-align: center;">จำนวนเงิน</td>
                 
                  </tr>
                  <tr>
                    <td style="text-align: center;">บริษัท</td>
                    <td style="text-align: center;">SUB</td>
                    <td style="text-align: center;">บริษัท</td>
                    <td style="text-align: center;">SUB</td>
                    <td style="text-align: center;">บริษัท</td>
                    <td style="text-align: center;">SUB</td>
                
                  </tr>
                  <tr>
                  <?php $dbuy= number_format($dap_payper/$contactamount*100); $dap= number_format($dap_payper,2);  
                  if($period=='1'){
                    echo '<td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>';
                  }else{
                    echo '<td style="text-align: center;"></td>
                    <td style="text-align: center;">'.$dbuy.'</td>
                    <td style="text-align: center;">'.$dap_payperr.'</td>';
                  }
                    ?>

                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"><?php echo number_format($advance1); ?></td>
                    <td style="text-align: center;"><?php echo number_format($ap_pay,2); ?></td> 

               <?php 
               $dappay = number_format($dap_payper+$ap_pay,2); 
               $allprint = number_format((($dap_payper+$ap_pay)/$contactamount)*100); 
               
                echo '<td style="text-align: center;"></td>
                    <td style="text-align: center;">'.number_format($advance1).'</td>
                    <td style="text-align: center;">'.number_format($ap_pay,2).'</td>';
               
                  ?>
                                
                  </tr>



                  <tr>
                  <td colspan="3" style="height: 8px;">
                  <div class="col-md-6"><p style="text-align: left;">รายการหัก</p></div>
                  <div class="col-md-6"><p style="text-align: right;">จำนวนเงิน</p></div>
                  </td>
                  <td colspan="3" rowspan="2">
                  <p style="text-align: center;">ยอดเงินเบิกครั้งนี้</p>
                  <div class="col-md-12">
                  
                  <p style="text-align: left;">หัก ADVANCE <?php echo $advance1 ;?> %&nbsp;&nbsp;&nbsp;&nbsp;  x <a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">1</a></p>
                  <p style="text-align: left;">คงเหลือ &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">1</a> - <a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">2</a></p>    
                  <p style="text-align: left;">บวก VAT <?php echo $vat; ?> %  </p>
                  <p style="text-align: left;">หัก RETENTION <?php echo $retentionper; ?> % &nbsp;&nbsp;&nbsp;&nbsp; x <a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">1</a></p>
                  <p style="text-align: left;">หัก ภาษี ณ  ที่จ่าย <?php if($tax==0){
                              echo "0 %";
                          }else if($tax==1){
                              echo "3 %";
                          }else if($tax==2){
                              echo "1 %";
                          }else if($tax==3){
                              echo "5 %";
                          }else if($tax==4){
                              echo "2 %";
                          }else if($tax==5){
                              echo "15 %";
                          }else if($tax==6){
                              echo "3 %";
                          }else if($tax==7){
                              echo "3 %";
                          }else if($tax==8){
                              echo "3 %";
                          } ?>&nbsp;&nbsp;&nbsp;&nbsp; x <a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">3</a></p>
                  </div>
                  </td>
                  <td colspan="3" rowspan="2" style="text-align: right;">
                   <?php if($tax==1){
                    $totalav = 'ไม่มีหัก';
                    }else if($tax==2){
                    $totalav = '3';
                    }else if($tax==3){
                    $totalav = '1';
                    }else if($tax==4){
                    $totalav = '5';
                    }else if($tax==5){
                    $totalav = '2';
                    }else if($tax==6){
                    $totalav = '15';
                    }else if($tax==7){
                    $totalav = '3';
                    }else if($tax==8){
                    $totalav = '3';
                    }else if($tax==9){
                    $totalav = '3';
                    } ?>
                    <p><?php $a=0; $b=0; $c=0; $d=0; $e=0; echo number_format($ap_pay,2); ?> &nbsp;<a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">1</a></p>
                    <p>&nbsp;<a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">2</a></p>
                    <p><?php $a=0; $b=0; $c=0; $d=0; $e=0; echo number_format($ap_pay,2); ?> &nbsp;<a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">3</a></p>
                    <p> &nbsp;<a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">4</a></p>
                    <p> &nbsp;<a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">5</a></p>
                    <p> &nbsp;<a class="btn border-success text-success  btn-rounded btn-icon btn-xs" style="font-size: 6px;">6</a></p>
                    
                  </td>
                  </tr>

                    <tr>
                  <td colspan="3"></td>
                
              
                 
                  </tr>
                  
                  <tr>
                  <td colspan="3" style="text-align: center;"></td>
                  <td colspan="3" ><p style="text-align: center;">คงเหลือจ่ายสุทธิ</p></td>
                  <td colspan="3"  style="text-align: right;"><?php echo number_format($downall);?>
                  </td>
                  </tr>

                   <tr>
                  <td colspan="5">
                  <div class="col-md-12">
                    <p align="left">ยอดเงินในสัญญา(ไม่รวม Vat)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($contactamount,2);?></p>
                    <p>ยอดเงินในสัญญาเพิ่มเติม</p>
                    <p>ยอดเงินเบิกงานที่แล้ว - ถึงงวดนี้</p>
                    <p>ยอดเงินคงเหลือในสัญญา</p>
                  </div>
                 
                  </td>
                  <td colspan="5">
                    <p>หมาเหตุ</p><br><br><br>
                    <p style="text-align: center;">วันที่จ่าย : <?php echo DateThai($strDate); ?></p>
                      
                  </td>
                  </tr>
                   
                  <tr>
                    <td colspan="10">จ่าย : <?php echo $projownername;?></td>
                  </tr>
                 
                 <tr>
                    <td colspan="2">
                    <br><br><br><br>
                      <p style="text-align: center;">___________________</p>
                      <p style="text-align: center;">ผู้จัดทำ</p>
                      <p>วันที่</p>
                    </td>
                    <td colspan="2">
                    <br><br><br><br>
                       <p style="text-align: center;">___________________</p>
                       <p style="text-align: center;">วิศวกรหัวหน้าฝ่าย</p>
                      <p>วันที่</p>
                    </td>
                    <td colspan="2">
                    <br><br><br><br>
                       <p style="text-align: center;">___________________</p>
                       <p style="text-align: center;">บัญชีตรวจสอบ</p>
                      <p>วันที่</p>
                    </td>
                    <td colspan="2">
                    <br><br><br><br>
                       <p style="text-align: center;">___________________</p>
                       <p style="text-align: center;">ผู้อนุมัติ</p>
                      <p>วันที่</p>
                    </td>
                    <td colspan="2">
                    <br><br><br><br>
                       <p style="text-align: center;">___________________</p>
                       <p style="text-align: center;">ผู้จ่ายเงิน</p>
                      <p>วันที่</p>
                    </td>
                  </tr>
                </tbody>


              </table>
            </div>
            </div>
            </div>





</body>
</html>

