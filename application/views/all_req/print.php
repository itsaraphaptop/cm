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
<link href="/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />

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

<!-- <?php foreach ($res as $val) {
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
} ?> -->
<!-- <?php
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
?> -->

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
         <div id="navbar" class="collapse navbar-collapse">
           <?php foreach ($getuser as $value): ?>

           <?php if($value->uid =='22') { ?>
           <?php echo "<a href='" ?><?php echo base_url(); ?><?php echo "License/admin_page' type='button' class='btn btn-warning navbar-btn' ><i class='fa fa-arrow-left'></i> กลับหน้าหลัก</a>" ?>

           <?php }else{ ?>
             <?php echo "<a href='"?><?php echo base_url(); ?><?php echo "License' type='button' class='btn btn-warning navbar-btn' ><i class='fa fa-arrow-left'></i> กลับหน้าหลัก</a>" ?>
             <?php } ?>
           <?php endforeach; ?>
        <!-- <a href="<?php echo base_url(); ?>License/admin_page" type="button" class="btn btn-warning navbar-btn" ><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a> -->
         <button type="button" class="btn btn-primary navbar-btn" onClick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

                  <div id="example" >

                    <div class="page-container">
                    <div class="pdf-page size-a4">

                    <div class="pdf-header">
  <?php $i=1; foreach ($getapp as $app):  ?>


  <img src="<?php echo base_url();?>images/head_report.png" alt="" width="730">
<hr>

<div class="modal-body">
<?php if($app->req_type =='SOFTWARE'){ ?>
<?php  echo'<label class="checkbox-inline"><input type="checkbox" checked="checked">SOFTWARE</label><label class="checkbox-inline"><input type="checkbox" value="">HARDWARE</label>' ?>
<?php } ?>
<?php if($app->req_type =='HARDWARE'){ ?>
<?php  echo'<label class="checkbox-inline"><input type="checkbox"  >SOFTWARE</label><label class="checkbox-inline"><input type="checkbox" checked="checked">HARDWARE</label>' ?>
<?php } ?>
<hr>
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">USER DETAIL</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-xs-6">
          <label for="">ชื่อ - นามสกุล :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_name; ?></label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_lastname; ?></label><br>
          <label for="">แผนก :</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <label for="">
            <?php $this->db->select('department_title');
            $this->db->from('department');
            $this->db->where('department_id',$app->req_department);
            $query = $this->db->get();
            $res = $query->result()
            ?>
            <?php foreach ($res as $showdp): ?>
              <?php echo $showdp->department_title;?>
            <?php  endforeach; ?></label>
        </div>
        <div class="col-xs-6">
          <label for="">วันที :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_startdate; ?></label><br>
          <label for="">โครงการ :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for="">
            <?php $this->db->select('project_name') ;
                  $this->db->from('project');
                  $this->db->where('project_id',$app->req_project);
                  $query = $this->db->get();
                  $res = $query->result()?>
                  <?php foreach ($res as $pj): ?>
                    <?php echo $pj->project_name ?>
                  <?php endforeach; ?>

          </label><br>
          <label for="">ตำแหน่ง :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_posi ; ?></label>
        </div>
      </div>
      </div>

  </div>
  <!-- /.box-body -->
  <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">รายละเอียดของปัญหา</h3>
      </div>
  <div class="box-body">
    <div class="row">
      <div class="col-xs-6">
        <?php echo $app->req_description; ?><br><br>
        <label for="">วันที่เสร็จ :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_datecom; ?></label>

      </div>
    </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">ความคิดเห็นของเจ้าหน้าที่</h3>
      </div>
  <div class="box-body">
    <div class="row">
      <div class="col-xs-12">
        <?php echo $app->req_cancel; ?><br><br>


          <?php $this->db->select('*');
          $this->db->from('user');
          $this->db->where('uid',$app->req_nameadmin);
          $query = $this->db->get();
          $ad= $query->result()
           ?>
          <?php foreach ($ad as $valad): ?>
            <p class="pull-right">ลงชื่อผู้ดำเนินการแก้ไข :<?php echo $valad->uname ?>&nbsp;&nbsp;&nbsp;<?php echo $valad->usurname ?>
          <?php endforeach; ?>

        </p>
      </div>

    </div>
    </div>
  </div>

  <!-- /.box-body -->
  <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">ลงชื่อรับการแก้ไขปัญหา : <u><?php echo $app->req_name ; ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $app->req_lastname; ?></u><br><br>  วันที่ได้รับการแก้ไข : <u><?php echo $app->req_dateapp; ?></u></h3>
      </div>

  </div>
  <div class="row">

      <br><br><br><br><br><br><br><br><br><br>
    <p class="pull-right">FM-IT-01,25/08/16</p>

  </div>
  <!-- /.box-body -->
</div>













  <?php $i++; endforeach; ?>

  </div>

  </div>
  </div>


                  </div>

                  <!-- </div>
                  </div> -->






</body>
</html>
