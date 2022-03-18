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

<!-- Include one of jTable styles. -->
<!-- <link href="/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" /> -->

<!-- Include jTable script file. -->
<script src="/jtable/jquery.jtable.min.js" type="text/javascript"></script>


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
            font-size: 16px;
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
        <a href="<?php echo base_url(); ?>userprofile/selemp " type="button" class="btn btn-warning navbar-btn" ><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onClick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
                  <div id="example" >
                    <div class="page-container">
                    <div class="pdf-page size-a4">
                    <div class="pdf-header">
                 <span class="company-logo">
                   <img src="<?php echo base_url();?>profile/headerweb.png" class="img-responsive" style="height:100px;"><br><br><br>
                       <?php foreach ($getemp as $value) {?>
                       <div class="row">
                         <div class="col-xs-12">
                           <div class="form-group">
                             <h1 class="text-center">ประวัติพนักงาน</h1>
                           <p style="margin-top:-80px;"> <img src="<?php echo base_url();?>profile/<?php echo $value->emp_pic;?>" class="pull-right" style="height:120px;"></p><br>
                           </div>

                         </div>
                       </div>
               <div class="row">
               <div class="col-xs-6">
               <label><b>ชื่อ :</b></label>&nbsp;&nbsp;<label> <?php if ($value->emp_title == "1") { ?>
                             นาย
                          <?php }elseif ($value->emp_title == "2") { ?>
                            นาง
                          <?php }elseif ($value->emp_title == "3") { ?>
                          นางสาว
                          <?php } ?>&nbsp;<?php echo $value->emp_name_t ?></label>&nbsp;&nbsp;
               <label><b>ชื่อเล่น :</b></label>&nbsp;&nbsp;<label><?php echo $value->emp_nickname ?></label>
               </div>

               </div>
               <div class="row">
               <div class="col-xs-6">
               <label><b>Name :</b></label>&nbsp;&nbsp;<label> <?php if ($value->emp_title_e == "1") { ?>
                             Mr.
                          <?php }elseif ($value->emp_title_e == "2") { ?>
                            Ms.
                          <?php }elseif ($value->emp_title_e == "3") { ?>
                           Mrs.
                          <?php } ?>&nbsp;<?php echo $value->emp_name_e ?></label>
               <label><b>เพศ :&nbsp;&nbsp;</b><?php if( $value->emp_title =="1") { echo "ชาย"?>
                <?php } ?>
                <?php if( $value->emp_title =="2" || $value->emp_title =="3") { echo "หญิง"?>
                <?php } ?></label>
                <br><label><b>บัตรปะชาชน :</b></label>&nbsp;&nbsp;<label><?php echo $value->emp_idcityzen ?></label>
             <br> <label><b>วันเกิด :</b></label>&nbsp;&nbsp;<label><?php echo $value->emp_bdate   ?></label>
               <br><label><b>Tel. :</b></label>&nbsp;&nbsp;<label><?php echo $value->emp_tele ?></label>
               <br><label><b>E-mail :</b></label>&nbsp;&nbsp;<label><?php echo $value->emp_email ?></label>
               <br><label><b>ส่วนสูง :</b> <?php echo $value->emp_h ?>&nbsp;เซนติเมตร</label>&nbsp;&nbsp;<label><b>น้ำหนัก :</b> <?php echo $value->emp_w ?>&nbsp;กิโลกรัม</label>
               <br><label><b>สถานะ :</b>&nbsp;<?php echo $value->emp_status ?></label>&nbsp;&nbsp;<label><b>มีบุตร-ธิดา จำนวน : </b>&nbsp;<?php echo $value->emp_child ?>&nbsp;คน</label>
               <br><label><b>เชื้อชาติ :</b>&nbsp;<?php echo $value->emp_race?></label>&nbsp;&nbsp;<label><b>สัญชาติ :</b>&nbsp;<?php echo $value->emp_nation ?></label>&nbsp;&nbsp;<label><b>ศาสนา :</b><?php echo $value->emp_religion ?></label>
               <br><label><b>มีพี่น้องจำนวน : </b>&nbsp;<?php echo $value->emp_brosis ?>&nbsp;คน</label>&nbsp;&nbsp;<label><b>เป็นบุตรคนที่ : </b> <?php echo $value->emp_cno ?></label>
               </div>
               <div class="col-xs-6">

               <label><b><u>ที่อยู่ปัจจุบัน</u></b></label><br>
               <label><?php echo $value->emp_address_now ?></label><br>
               <label><b><u>ที่อยู่ภูมิลำเนา</u></b></label><br>
               <label><?php echo $value->emp_address_book ?></label><br>
               <label><b><u>บุคคลที่สามารถติดต่อได้</u></b></label><br>
               <label><b>ชื่อ :</b>&nbsp;<?php echo $value->emp_cflname ?></label>&nbsp;


               <label><b>อาชีพ : </b>&nbsp;<?php echo $value->emp_cjob ?>&nbsp;&nbsp;<b>เกี่ยวข้องเป็น :</b>&nbsp;<?php echo $value->emp_crela   ?></label><br>
               <label><b>เบอร์ติดต่อ :</b>&nbsp;<?php echo $value->emp_ctele ?></label><br>
               <label><b>ที่อยู่ :</b></label> &nbsp;<?php echo $value->emp_cplace ?></label>
              </div>
                  </div>
                <!-- <div class="row">
                <div class="col-xs-12">
                <hr>
                </div>
                </div> -->

                <div class="row">
                <div class="col-xs-12">

                <label><b><u>การศึกษา</u></b></label><br>
                <table class="table table-bordered">
                <thead>
                <tr>
                <th>ระดับการศึกษา</th>
                <th>ชื่อสถานที่ศึกษา</th>
                <th>สาขา/เอก</th>
                <th>ปีการศึกษา</th>
                </tr>
                </thead>
                 <?php
                  $q = $this->db->query("select * from emp_edu_tb where emp_id='$value->emp_id'");
                  $rese = $q->result();
                  foreach ($rese as $key => $va) {
              ?>
                <tr>
                <td><?php echo $va->edu_level ?></td>
                <td><?php echo $va->edu_name ?></td>
                <td><?php echo $va->edu_major ?></td>
                <td><?php echo $va->edu_yend ?></td>
                </tr>

                <?php } ?>

                </table>

                </div>
                  </div>
                  <br><br>

         <div class="row">
                <div class="col-xs-12">

                <label><b><u>ประวัติการทำงาน</u></b></label><br>
                <table class="table table-bordered">
                <thead>
                <tr>
                <th>ชื่อบริษัท</th>
                <th>ทีอยู่บริษัท</th>
                <th>ตำแหน่งงาน</th>
                <th>ปี</th>
                </tr>
                 <?php
                  $q = $this->db->query("select * from emp_job_tb where emp_id='$value->emp_id'");
                  $rese = $q->result();
                  foreach ($rese as $key => $va) {
              ?>
                <tr>
                <td><?php echo $va->job_name ?></td>
                <td><?php echo $va->job_address ?></td>
                <td><?php echo $va->job_position ?></td>
                <td><?php echo $va->job_years ?></td>
                </tr>
                </thead>
                <?php } ?>
                </table>

                </div>
      </div>
                  <br>
       <div class="row">
          <div class="col-xs-6">
                <label><b><u>ความสามารถต่างๆ</u></b></label><br>
              <table class="table table-bordered">
              <tr>
              <th><b>ภาษา</b></th>
              <th><b>พูด</b></th>
              <th><b>อ่าน</b></th>
              <th><b>เขียน</b></th>
              </tr>

                <?php
                  $q = $this->db->query("select * from emp_skill_tb where emp_id='$value->emp_id'");
                  $rese = $q->result();
                  foreach ($rese as $key => $va) {
                   ?>
              <tr>
              <td id="engchk"><?php echo $va->skill_lang ?></td>
              <td>
                <?php if($value->skill_speak === '0') echo 'ดีมาก' ?>
                <?php if($value->skill_speak === '1') echo 'ดี' ?>
                <?php if($value->skill_speak === '2') echo 'ปานกลาง' ?>
                <?php if($value->skill_speak === '3') echo 'แย่' ?>
                <?php if($value->skill_speak === '4') echo 'แย่มาก' ?>
              </td>
              <td>
                <?php if($value->skill_read === '0') echo 'ดีมาก' ?>
                <?php if($value->skill_read === '1') echo 'ดี' ?>
                <?php if($value->skill_read === '2') echo 'ปานกลาง' ?>
                <?php if($value->skill_read === '3') echo 'แย่' ?>
                <?php if($value->skill_read === '4') echo 'แย่มาก' ?>
              </td>
              <td>
                <?php if($value->skill_write === '0') echo 'ดีมาก' ?>
                <?php if($value->skill_write === '1') echo 'ดี' ?>
                <?php if($value->skill_write === '2') echo 'ปานกลาง' ?>
                <?php if($value->skill_write === '3') echo 'แย่' ?>
                <?php if($value->skill_write === '4') echo 'แย่มาก' ?>
              </td>
              </tr>
              <?php } ?>
              </table>
              </div>

              <div class="col-xs-6">
              <label><b><u>ภาษาอังกฤษ</u></b></label>
              <table class="table table-bordered">
              <thead>
              <tr>
              <th><b>toelf</b></th>
              <th><b>toeic</b></th>
              <th><b>ielts</b></th>
              <th><b>tuget</b></th>
              <th><b>cutep</b></th>
              </tr>
              <tr>
              <td><?php echo $value->e_toelf ?></td>
              <td><?php echo $value->e_toeic ?></td>
              <td><?php echo $value->e_ielts ?></td>
              <td><?php echo $value->e_tuget ?></td>
              <td><?php echo $value->e_cutep ?></td>
              </tr>
              </thead>
              </table>
              </div>
              </div>


      <div class="row">
        <div class="col-xs-12">
          <img src="<?php echo base_url();?>profile/lowerweb.png" class="img-responsive" style="width:auto;">
        </div>
      </div>


  </div>
  </div>
  </div>

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
        <a href="<?php echo base_url(); ?>userprofile/selemp" type="button" class="btn btn-warning navbar-btn" ><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onClick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
                  <div id="example" >
                    <div class="page-container">
                    <div class="pdf-page size-a4">
                    <div class="pdf-header">
                 <span class="company-logo">
                      <img src="<?php echo base_url();?>profile/headerweb.png" class="img-responsive" style="height:100px;">
                      <div class="row">
                      <div class="col-xs-3">
                      <label><b><u>มีความสามารถในการขับขี่ </u></b></label><br>
                      <label><?php if($value->s_car === 'on') echo '- รถยนต์' ?></label>
                      <?php if($value->s_car === 'on') echo '<br>' ?>

                     <label><?php if($value->s_motor === 'on') echo '- รถจักยานยนต์' ?></label>
                     <?php if($value->s_motor === 'on') echo '<br>' ?>

                     <label><?php if($value->s_truck === 'on') echo '- รถบรรทุก' ?></label>
                     <?php if($value->s_truck === 'on') echo '<br>' ?>
                     <label><?php if($value->s_cab === 'on') echo '- รถกระบะ' ?></label>
                     <?php if($value->s_cab === 'on') echo '<br>' ?>
                     <label><?php if($value->s_folk === 'on') echo '- รถฟอร์คลิฟท์' ?></label>
                     <?php if($value->s_folk === 'on') echo '<br>' ?>
                      </div>

                      <div class="col-xs-3">
                  <label><b><u>มีพาหนะเป็นของตัวเอง</u></b></label><br>

                    <label <?php if($value->s_vehicle_car != 'on') echo 'class="hidden"' ?>>- รถยนต์</label>
                    <?php if($value->s_vehicle_car === 'on') echo '<br>' ?>
                    <label><?php if($value->s_vehicle_motor === 'on') echo "- รถจักยานยนต์" ;?> </label>
                    <?php if($value->s_vehicle_motor === 'on') echo '<br>' ?>
                    <label><?php if($value->s_vehicle_truck === 'on') echo "- รถบรรทุก" ?> </label>
                    <?php if($value->s_vehicle_truck === 'on') echo '<br>' ?>
                      </div>
            <div class="col-xs-6">
            <label>สามารถปฎิบัติงานต่างจังหวัด &nbsp;&nbsp;:&nbsp;&nbsp;<?php if($value->emp_province === '1'){ echo " ไปได้";} ?><?php if($value->emp_province==='0') echo "ไปไม่ได้" ?></label><br>
            <label>สามารถปฎิบัติงานต่างประเทษ &nbsp;&nbsp;:&nbsp;&nbsp;<?php if($value->emp_travel === '1'){ echo " ไปได้";} ?><?php if($value->emp_travel === '0'){ echo " ไปไม่ได้";} ?></label><br>
            <label>มีประวัติทางกฎหมายหรือไม่ &nbsp;&nbsp;:&nbsp;&nbsp;<?php if($value->emp_law === '1'){ echo "มี";} ?><?php if($value->emp_law === '0'){ echo "ไม่มี";} ?></label><br>
            <label>ประวัติการดื่มสุรา &nbsp;&nbsp;:&nbsp;&nbsp;<?php if($value->emp_drink === '1'){ echo " ดื่ม";} ?><?php if($value->emp_drink === '0'){ echo "ไม่ดื่ม";} ?> </label><br>
            <label>ประวัติสูบบุหรี่ &nbsp;&nbsp;:&nbsp;&nbsp;<?php if($value->emp_smoke === '1'){ echo " สูบ";}  ?><?php if($value->emp_smoke === '0'){ echo "ไม่สูบ";}  ?></label><br>

            </div>

                      </div>

                  <div class="row">
             <div class="col-xs-12  ">

            <label><b><u>ความสามารถอื่นๆ</u></b></label><br>
            <label>-&nbsp;&nbsp;<?php echo $value->s_skill1; ?></label><br>
            <label>-&nbsp;&nbsp;<?php echo $value->s_skill2; ?></label><br>
            <label>-&nbsp;&nbsp;<?php echo $value->s_skill3; ?></label><br>
            <label>-&nbsp;&nbsp;<?php echo $value->s_skill4; ?></label><br>
            <label>-&nbsp;&nbsp;<?php echo $value->s_skill5; ?></label><br>
<br><br>
            <label><b><u>ประวัติการฝึกอบรม</u></b></label><br>
             <table class="table table-bordered">
              <tr>
              <th><b>เดือน</b></th>
              <th><b>ปี</b></th>
              <th><b>เดือน</b></th>
              <th><b>ปี</b></th>
              <th><b>หลักสูตร</b></th>
              <th><b>ตำแหน่ง</b></th>
              </tr>

                <?php
                  $q = $this->db->query("select * from emp_train_tb where emp_id='$value->emp_id'");
                  $rese = $q->result();
                  foreach ($rese as $key => $va) {
                   ?>
              <tr>
              <td id="engchk"><?php echo $va->skill_start_month ?></td>
              <td><?php echo $va->skill_start_years ?></td>
              <td><?php echo $va->skill_end_month ?></td>
              <td><?php echo $va->skill_end_years ?></td>
              <td><?php echo $va->skill_name ?></td>
              <td><?php echo $va->skill_tpos ?></td>
              </tr>
              <?php } ?>
              </table>
              </div>
            </div>
            <br><br>

            <div class="row">
              <div class="col-xs-6">
                <?php
                  $q = $this->db->query("select * from emp_company_tb where emp_id='$value->emp_id'");
                  $rese = $q->result();
                  foreach ($rese as $key => $va) {
                 ?>
                      <label>ปัจจุบันทำงานอยู่ที่ :</label>&nbsp;&nbsp;<label>บริษัท เมฆา เอส</label><br>
                      <label>ดำรงตำแหน่ง :</label>&nbsp;&nbsp;<label><?php echo $va->emp_position ?></label><br>
                      <label>ประจำอยู่ที่ :</label>&nbsp;&nbsp;<label><?php echo $va->emp_project ?></label><br>
                      <label>เลขที่บัญชี :</label>&nbsp;&nbsp;<label><?php echo $va->emp_bookbank ?></label><br>
                      <label>ธนาคาร :</label>&nbsp;&nbsp;<label><?php echo $va->emp_bank ?></label><br>
                      <label>สาขา :</label>&nbsp;&nbsp;<label><?php echo $va->emp_backmajor ?></label><br>
              </div>
              <div class="col-cs-6">
                      <label>ผู้บังคับบัญชา :&nbsp;&nbsp;<?php echo $va->emp_lead ?></label><br>
                      <label>เริ่มงานวันที่ :&nbsp;&nbsp;<?php echo $va->emp_start ?></label><br>
                      <label>เลขที่ประกันสังคม :&nbsp;&nbsp;<?php echo $va->emp_insuid ?></label><br>
                      <label>โรงพยาบาล :&nbsp;&nbsp;<?php echo $va->emp_insuhos ?></label><br>
              </div>

<?php } ?>
<br><br><br><br><br><br><br>
<img src="<?php echo base_url();?>profile/lowerweb.png" class="img-responsive" style="width:auto;">

            </div>






                  </span>
                  </div>
                  </div>
                  </div>
                  </div>
                   <?php } ?>





</body>
</html>
