
<!DOCTYPE html>
<html lang="en" ng-app>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NinjaERP Layout</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>dist/css/sidebar.css" rel="stylesheet">


    <![endif]-->
    <script src="<?php echo base_url();?>telerik/js/jquery.min.js"></script>
   <script src="<?php echo base_url();?>dist/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


    <script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
     <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />

  <style>
      .navbar-default{background:#1a1e58; color:#fff;}
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
            color font: #000;
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
            font-size: 12px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }
       .pdf-footer {
            position: relative;


            padding-top: 20px;


        }

        #example{margin-top: 80px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
    </style>



<body>
<?php foreach ($res as $v) {
  $issueno =  $v->is_doccode;
  $isdocdate =  $v->is_docdate;
  $isproject =  $v->project_name;
  $isremark = $v->is_remark;
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
            <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:50px;">
        </div>
        <div id="navbar" class="collapse navbar-collapse">
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
                        <div class="col-xs-3">
                        <form class="form-inline">
                          <div class="form-group">
                          <p style="margin-top:-10px;" > <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:50px;"></p>
                          </div>
                       </form>
                         </div>
                             <div class="col-xs-6">
                                <p style="font-size:16px; margin-top:-10px; margin-left:-30px;">บริษัท เมฆา-เอส จำกัด</p>
                                <p style="font-size:11px; margin-top:-10px; margin-left:-30px;">166 หมู่ 10 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ</p>
                                <p style="font-size:11px; margin-top:-10px; margin-left:-30px;">จ.สมุทรปราการ 10270</p>
                           </div>
                       <div class="row">
                        <div class="col-xs-11">
                            <div class="panel panel-default" style="margin-top:-65px; margin-left: 520px;">
                            <div class="container" style="margin-left:5px; font-size: 12px;" >
                              <br>
                                <p>No. <?php echo $issueno; ?></p>
                                <p>Date : <?php echo $isdocdate; ?></p>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div><!-- end row -->



                        <div class="form-group" style="margin-left: 230px; margin-top: -1px;font-size:20px;">
                        <p>Material Requisition Form</p>
                        </div>

                        <div class="form-group" style="margin-left: 300px; margin-top:-15px;font-size:20px;">
                        <p>ใบเบิกวัสดุ</p>
                        </div>


                <div class="row" style="margin-top:-10px;">
                <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-4">
                               <div class="row" style="font-size: 13px;">
                                <div class="col-xs-12">โครงการ : <?php echo $isproject; ?></div>
                                </div>
                            </div>
                            </div>
                          <br>
                          <div class="row" style="font-size: 12.5px;">
                            <div class="col-xs-3">
                                <div class="col-xs-12"><span class="glyphicon glyphicon-unchecked"></span> ไฟฟ้าและการสื่อสาร</div></div>
                            <div class="col-xs-4">
                                <div class="col-xs-12"><span class="glyphicon glyphicon-unchecked"></span> สุขขาภิบาลและป้องกันอัคคีภัย</div></div>
                            <div class="col-xs-3">
                                <div class="col-xs-12"><span class="glyphicon glyphicon-unchecked"></span> ระบบปรับอากาศ</div>
                            </div>
                            <div class="col-xs-2">
                                <div class="col-xs-12"><span class="glyphicon glyphicon-unchecked"></span> อื่นๆ</div>
                             </div>
                          </div>
                          <br>
                      </div>
                      </div>
                       <!-- </div> -->


                         <table class="table table-bordered"style="font-size:12px;">
                        <thead>
                            <tr align="center" >
                                <td width="5%;">ลำดับ</td>
                                <td>รายการ <br>ชนิด  - ขนาด</td>
                                <td colspan="3" width="20%;">จำนวน <br>เบิก&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp; จ่าย&nbsp;&nbsp;&nbsp;/&nbsp; หน่วยนับ</td></td>
                                <td width="20%;">เพื่อใช้งาน<br>(ระบุพื้นที่ทำงาน)</td>
                                <td width="12%;">Cost Code <br>(รหัสต้นทุน)</td>
                            </tr>
                        </thead>

                    <tbody>
            <?php $i=1; foreach ($resi as $mod) {?>
                            <tr >
                                <td align="center"><?php echo $i; ?></td>
                                <td><?php echo $mod->isi_matname; ?></td>
                                <td align="center" width="7%;"><?php echo $mod->isi_xqty; ?></td><td align="center" width="7%;">  </td><td align="center" width="7%;"> <?php echo $mod->isi_unit; ?> </td></td>
                                <td><?php echo $mod->isi_remark; ?></td>
                                <td align="center" width="12%;"><?php echo $mod->isi_matcode; ?></td>
                            </tr>

                            <?php $i++; } ?>

                       </tbody>
                         </table>
                       <p>หมายเหตุ : <?php echo $isremark; ?></p>

      <div class="footer" >



                         </div>
                         </div>
                         </div>
                         </div>
<div class="page-break"></div>
</body>
</html>
