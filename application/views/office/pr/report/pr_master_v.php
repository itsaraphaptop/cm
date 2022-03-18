<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Print Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <!-- <link href='https://fonts.googleapis.com/css?family=Itim&subset=thai,latin' rel='stylesheet' type='text/css'> -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">

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
    $pr_project = $val->pr_project;
    $system = $val->pr_system;
    $remark_h = $val->pr_remark;
    $quu = $this->db->query("select m_name from member where m_id='$val->pr_memid'");
    $ree = $quu->result();
    foreach ($ree as $kue) {
      $prname = $kue->m_name;
    }
    $qee = $this->db->query("select sign from member where m_user='$val->pe_approve'");
    $rds = $qee->result();
    foreach ($rds as $ke) {
      $appsign = $ke->sign;
    }
    $qed = $this->db->query("select sign from member where m_user='$val->director_approve'");
    $rdd = $qed->result();
    foreach ($rdd as $ked) {
      $appdirectorsign = $ked->sign;
    }
    $pe_approve = $val->pe_approve;
    $pd_approve = $val->director_approve;
    $approvedate = $val->approve_date;
    $costtype = $val->pr_costtype;
} ?>

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
            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:50px;">
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a onclick="history.go(-1)" type="button" class="btn btn-warning navbar-btn"><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
<br>
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
                            <p  style=" margin-top:-8px; margin-left:10px;">หมายเหตุ : <?php echo $remark_h; ?></p>
                        </div>
                      </div><!-- end col-xs-6 -->
                      <div class="col-xs-6" style="margin-top:10px;">
                        <div class="form-group">
                          <?php if ($pr_project=="") {?>
                            <label class="checkbox-inline">
                              <input type="checkbox" checked id="inlineCheckbox1" value="option1" disabled="disabled"> สั่งจาก Office
                            </label>
                          <?php }else{ ?>
                            <label class="checkbox-inline">
                              <input type="checkbox"  id="inlineCheckbox1" value="option1" disabled="disabled"> สั่งจาก Office
                            </label>
                          <?php } ?>
                          <?php  if ($costtype=="15") {?>
                            <label class="checkbox-inline" style="margin-left:50px;">
                              <input type="checkbox" checked id="inlineCheckbox2" value="option2" disabled="disabled"> วัสดุ : Material
                            </label>
                            <?php }else{ ?>
                              <label class="checkbox-inline" style="margin-left:50px;">
                                <input type="checkbox" id="inlineCheckbox2" value="option2" disabled="disabled"> วัสดุ : Material
                              </label>
                              <?php } ?>
                            <br>
                <?php if ($pr_project==""){ ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="option3" disabled="disabled"> สั่งจาก : Site
                  </label>
                <?php }else{?>
                  <label class="checkbox-inline">
                    <input type="checkbox" checked id="inlineCheckbox3" value="option3" disabled="disabled"> สั่งจาก : Site
                  </label>
                <?php } ?>
                <?php  if ($costtype=="15") {?>
                  <label class="checkbox-inline" style="margin-left:55px;">
                    <input type="checkbox" id="inlineCheckbox4" value="option4" disabled="disabled"> สินทรัwย์ : Asset
                  </label>
                <?php }else{ ?>
                <label class="checkbox-inline" style="margin-left:55px;">
                  <input type="checkbox" checked id="inlineCheckbox4" value="option4" disabled="disabled"> สินทรัwย์ : Asset
                </label>
                <?php } ?>
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
                      <table class="table table-bordered" style="font-size:10px; margin-top: 30px; ">
                        <thead>
                            <tr align="center" >
                <td width="5%;"><p>ลำดับ <br><p>Item<br></p></td>
                                <td width="10%;"><p>รหัสต้นทุน <br><p>cost code<br></p></td>
                                <td><p>รายการ <br><p>Description<br></p></td>
                                <td width="5%;"><p>จำนวน <br><p>Quantity<br></p></td>
                                <td width="5%;"><p>หน่วย <br><p>Unit<br></p></td>
                                <td width="20%;"><p>หมายเหตุxxx</p></td>
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
                                <td  style="font-size:10px;"><?php echo $pval->pri_remark; ?></td>
                            </tr>
                            <?php $n++; } if ($num=="1") {?>
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
                            <?php  } if ($num=="2") {?>
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
                            <?php }elseif($num=="3"){ ?>
                             <?php for ($n=0; $n <5 ; $n++) { ?>
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
                             <?php for ($n=0; $n <4 ; $n++) { ?>
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
                             <?php for ($n=0; $n <3 ; $n++) { ?>
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
                             <?php for ($n=0; $n <2 ; $n++) { ?>
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
                             <?php for ($n=0; $n <1 ; $n++) { ?>
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
                            <?php } ?>

                       </tbody>
                    </table>

                      <table class="table table-bordered " style="margin-top:30px;" >
            <thead>
              <tr>
              <td class="text-center" width="30%"><p><br><?php echo $prname; ?><br></p></td>
              <?php if ($pe_approve=="") {?>
                <td class="text-center" width="40%"><p><br><br></p></td>
              <?php }else{ ?>
              <td class="text-center" width="40%"><p><br><img src="<?php echo base_url(); ?>sign/<?php echo $appsign; ?>" width="30%"/><br></p></td>
              <?php } ?>


              <?php if ($pd_approve=="") {?>
                <td width="30%"></td>
            <?php }else{ ?>
              <td class="text-center" width="40%"><p><br><img src="<?php echo base_url(); ?>sign/<?php echo $appdirectorsign; ?>" width="30%"/><br></p></td>
              <?php } ?>
              </tr>
            </thead>
            <tbody>
               <tr>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt; font-weight:normal;">
                       ผู้ขอซื้อ <br>Entried/Printed by <br><br>Date :<?php echo DateThai($prdate); ?></td>
                <?php if ($approvedate=="") {?>
                  <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                          แผนกจัดการโครงการ/ฝ่าย/แผนก <br>Purchasing Department <br><br>Date :____/____/_____</td>
                <?php  }else{ ?>
                  <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                          แผนกจัดการโครงการ/ฝ่าย/แผนก <br>Purchasing Department <br><br>Date : <?php echo DateThai($approvedate);  ?></td>
                  <?php } ?>
                    <?php if ($approvedate=="") {?>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                       รองกรรมการผู้จัดการ <br>Authorized Signature <br><br>Date :____/____/_____</td>
                       <?php  }else{ ?>
                         <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                                 รองกรรมการผู้จัดการ <br>Authorized Signature <br><br>Date : <?php echo DateThai($approvedate);  ?></td>
                                   <?php } ?>
               </tr>

              </tbody>
            </table>

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

            ?>


          </div>
        </div>
      </div>
      </body>
</html>
