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

        .size-a4 { width: 8.3in; height: 11.7in; }
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

<?php foreach ($res as $val) {
    $lono = $val->lo_lono;
    $ref_quono = $val->refquono;
    $lo_date = $val->lodate;
    $quo_date = $val->quodate;
    $project_name = $val->status;
    $systems = $val->system;
    $contact_type = $val->contacttype;
    $contact_desc = $val->contactdesc;
    $contact_amount = $val->contactamount;
    $taxall = $val->tax;
    $owner_name = $val->projownername;
    $sub = $val->subcontact;
    $other1 = $val->other;
    $other2 = $val->other_2;
    $other3 = $val->other_3;
    $startcontact = $val->start_contact;
    $stopcontact = $val->stop_contact;
    $co_subcontact = $val->cosubcontact;
    $address_sub = $val->addresssub;
    $telsubcontact = $val->tel_subcontact;
    $faxsubcontact = $val->fax_subcontact;
    $advance_ch = $val->advance;
    $advper = $val->advpercent;
    $otheradvance = $val->other_advance;
    $otheradvance1 = $val->other_advance1;
    $perfines = $val->per_fines;
    $reten = $val->retention;
    $subcontact = $val->subcontact;
    $sys_tem = $val->system;
    $advcount = $val->adv_count;
    $retentionper = $val->retentionper;
    $ref_quono = $val->refquono;

    $otherpr1 = $val->otherpr1;
    $otherpr2 = $val->otherpr2;
    $otherpr3 = $val->otherpr3;
    $otherpr4 = $val->otherpr4;

    $unit = $val->unit;
    $unit1 = $val->unit1;
    $putput = $val->putput;
} ?>

<?php
$this->db->select('*');
$this->db->from('vender');
$this->db->where('vender_id',$subcontact);
$a=$this->db->get()->result();
foreach ($a as $key) {
  $vender = $key->vender_name;
}
?>

 <?php $dddd = $this->db->query("select * from system where systemcode = '$sys_tem'")->result(); 
                  foreach ($dddd as $key) {
                    $name = $key->systemname;
                  }
                  ?>
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
  // echo "ThaiCreate.Com Time now : ".DateThai($strDate);
?>

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
        <a href="<?php echo base_url(); ?>index.php/contract/editcontract/<?php echo $lono; ?>" type="button" class="btn btn-warning navbar-btn" ><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
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
					        <div style=" text-align:center; margin-left:10px; font-size:25px; margin-top:-20px;">
					           <p class="double">หนังสือสั่งจ้าง</p>
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

                    <div class="row">
                        <div class="col-xs-12">
                          <div class="row" style="margin-top:-70px;" >
                              <div class="col-xs-6 col-xs-offset-6">
                                <div class="form-group ">
                                <br>
                                    <p style="font-size:14px; margin-top:-8px; margin-left:200px;" >เลขที่ :&nbsp;&nbsp; <?php echo $lono; ?></p>
                                    <p style="font-size:14px; margin-top:-8px; margin-left:200px;" >วันที่ :&nbsp;&nbsp;<?php echo DateThai($lo_date); ?></p>
                                </div>
                              </div><!-- end col-xs-6 -->
                              
                          </div><!-- end row -->
                       </div>
                    </div>
                    <br>
                    <div class="row">
                          <div class="row" style="margin-top:-70px;">
                              <div class="col-xs-12">
                                <div class="form-group">
                                <br><br>
                                    <p style="font-size:18px; margin-top:20px; margin-left:10px;">ข้อตกลงในสัญญา</p>
                                    <p style="font-size:14px; margin-top:-8px; margin-left:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ว่าจ้าง สัญญาว่าจะทำงานตามรายละเอียดที่ระบุไว้ ต่อไปนี้ทั้งหมด โดยรับผิดชอบต่อ บริษัท เมฆา-เอส จำกัด &nbsp;&nbsp;ผู้ว่าจ้าง และอ้างอิงใบเสนอราคาเลขที่&nbsp; <?php echo $ref_quono; ?> &nbsp;ลงวันที่ :&nbsp;&nbsp;<?php echo DateThai($quo_date); ?></p>
                                    <hr>
                                </div>
                              </div><!-- end col-xs-6 -->
                              
                          </div><!-- end row -->
                    </div>          

            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>
                            1. เจ้าของโครงการ</b></p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:14px;"><b><?php echo $owner_name; ?></b></p>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อโครงการฯ</p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;"><?php echo $owner_name; ?></p>
                </div>
            </div>

            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>
                            2. ผู้รับจ้าง</b></p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:14px;"><b><?php echo $vender; ?></b></p>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ลงลายมือชื่อ</p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;">คุณ <?php echo $co_subcontact; ?></p>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ตามหนังสือรับรอง</p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;"><?php echo $address_sub; ?></p>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โทรศัพท์ที่ติดต่อ</p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;">เบอร์โทร :&nbsp;&nbsp;<?php echo $telsubcontact; ?>&nbsp;&nbsp; แฟกซ์ :&nbsp;&nbsp;<?php echo $faxsubcontact; ?></p>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>
                            3. สัญญานี้เป็นสัญญา</b></p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;"><?php if ($contact_type=="1") {
                            echo "ค่าแรง";
                           }elseif ($contact_type=="2") {
                             echo "ค่าของ";
                           }elseif ($contact_type=="3") {
                             echo "ทั้งค่าแรงและค่าของ";
                           }elseif ($contact_type=="4") {
                             echo "ค่าเช่า";
                           }elseif ($contact_type=="5") {
                             echo "ค่าบริการ";
                           } ?></p>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>
                            4. งานระบบ</b></p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;"><?php echo $name; ?></p>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>
                            5. ลักษณะสัญญา</b></p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;"><?php echo $contact_desc; ?></p>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>
                            6. มูลค่าสัญญา (ไม่รวม VAT)</b></p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;"><?php echo number_format($contact_amount,4); ?>&nbsp;&nbsp;บาท </p>
                          <p style="font-size:13px;">หัก ณ ที่จ่าย :&nbsp;&nbsp;<?php if ($taxall=="1") {
                            echo "ไม่มีหัก";
                           }elseif ($taxall=="2") {
                             echo "ค่าบริการ 3 %";
                           }elseif ($taxall=="3") {
                             echo "ค่าขนส่ง 1%";
                           }elseif ($taxall=="4") {
                             echo "ค่าเช่า 5%";
                           }elseif ($taxall=="5") {
                             echo "ค่าเช่าโฆษณา 2%";
                           }elseif ($taxall=="6") {
                             echo "ดอกเบี้ยจ่าย 15%";
                           }elseif ($taxall=="7") {
                             echo "ค่าจ้างเหมา 3%";
                           }elseif ($taxall=="8") {
                             echo "ค่าชดเชย 3%";
                           }elseif ($taxall=="9") {
                             echo "ค่าจ้างแรงงาน 3%";
                           } ?></p>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>
                            7.เงื่อนไขการจ่ายเงิน</b></p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;">เงินล่วงหน้า  &nbsp;&nbsp;<?php echo $advance_ch; ?>&nbsp;&nbsp; %</p>
                          <p style="font-size:13px;"><?php if ($advper=="1") {
                            echo "100% จ่ายตามความก้าวหน้าของงาน ";
                           }elseif ($advper=="2") {
                             echo "100% จ่ายเมื่อติดตั้งแล้วเสร็จ";
                           } ?>&nbsp;จำนวน&nbsp;<?php echo $advcount; ?> ครั้ง</p>
                          <p style="font-size:13px;">อื่นๆ &nbsp;&nbsp;<?php if($otheradvance1==""){
                            echo 'ไม่ระบุ';
                            }else{
                              echo $otheradvance1;
                              } ?></p>
                          
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>
                            8.ระยะเวลาสัญญา</b></p>
              </div>
              <div class="col-xs-8">
                          <p style="font-size:13px;">เริ่มตั้งแต่วันที่&nbsp;&nbsp;<b><?php echo DateThai($startcontact); ?></b> &nbsp;&nbsp;ถึงวันที่&nbsp;&nbsp;<b><?php echo DateThai($stopcontact); ?></b> </p>
                          <p style="font-size:13px;">8.1 เลยกำหนดปรับวันละ&nbsp;&nbsp;<?php if($perfines=='0'){
                            echo '<strike style="color:red;"> 0 </strike>';
                            }else{echo $perfines;} ?> % ของมูลค่างาน </p>
                          <?php if($retentionper==""){
                              echo 'ไม่ระบุ';
                          }else{
                            echo '<p style="font-size:13px;">8.2 ประกันผลงาน&nbsp;&nbsp; '.$retentionper.' % /เดือน</p>';
                          }
                          ?>
                          <p style="font-size:13px;">8.3 ประกันผลงานระยะเวลา <?php echo $reten; ?> <?php if($unit=='1'){
                                    echo "วัน";
                                  }else if($unit=='2'){

                                    echo "เดือน";
                                    }else if($unit=='3'){
                                      echo "ปี";
                                      } ?></p>
                         
                </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>9.อ้างอิงสัญญา</b></p>
              </div>
              <?php if($otherpr1=='Y'){
                 echo '<div class="col-xs-8">
                <div class="col-xs-12">
                - '.$otherpr2.'
                </div>
                <div class="col-xs-12">
                - '.$otherpr3.' 
                </div>
                <div class="col-xs-12">
                - '.$otherpr4.'
                </div>
                </div>';
                }else{
                  echo '&nbsp;&nbsp;&nbsp;ไม่ระบุ';
                  } ?>

            </div>
            <div class="row">
              <div class="col-xs-4">
                <p style="font-size:14px;"><b>
                            10.เงื่อนไขอื่นๆ ระบุเพิ่มเติม</b></p>
              </div>
              <div class="col-xs-8">
              <?php if($other1==""){
                echo 'ไม่ระบุ';
              }else{
                echo '<p style="font-size:13px;">- '.$other1.'</p>
                          <p style="font-size:13px;">- '.$other2.'</p>
                          <p style="font-size:13px;">- '.$other3.'</p>';
              }
              ?>
                          
                </div>
            </div>
            <br>
            <div class="row">

              <div class="col-xs-4">
              </div>
              <div class="col-xs-8">
                </div>
            </div>
                <?php
$this->db->select('*');
$this->db->from('lo_detail');
$this->db->where('lo_ref',$lono);
$cadd=$this->db->get()->result();
?>
<b style="font-size:12px;">Cost Code :&nbsp;&nbsp; 
<?php foreach ($cadd as $aa) { ?>
{<?php echo $aa->lo_costcode;?>},
<?php } ?></b>


        <table class="table table-bordered" >
            <thead>
              <tr>
              <td><br><p style=" font-size:10pt;">
              <br>
              <center>ผู้รับจ้าง_____________________________________________</center>

              </p></td>
              <td><br><p style=" font-size:10pt;">
              <br>
              <center>ผู้ว่าจ้าง_____________________________________________</center></p></td>
              </tr>
            </thead>
            <tbody>
               <tr>
               <td align="center"><p style=" font-size:10pt; align-content: center">บริษัท&nbsp;&nbsp;<?php echo $vender; ?></p></td>
               <td align="center"><p style=" font-size:10pt; align-content: center">(บริษัท เมฆา-เอส จำกัด) </p></td>
               </tr>

              </tbody>
       </table>

  </div>
</body>
</html>
