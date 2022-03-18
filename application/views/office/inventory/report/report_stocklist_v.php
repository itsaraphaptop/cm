
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
        }
       .pdf-footer {
            position: relative;
            padding-bottom: 100px;


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
                                <p style="font-size:20px; margin-top:-10px; margin-left:50px;">สรุปยอดสต๊อก สโตร์กลาง 2558</p>
                                <p style="font-size:15px; margin-top:-10px; margin-left:100px;">บริษัท เมฆา-เอส จำกัด</p>
                                <p style="font-size:15px; margin-top:-10px; margin-left:100px;">ณ วันที่......................</p>
                           </div>
                  </div><!-- end row -->


                <div class="row" style="margin-top:-10px;">
                      </div>
                       <!-- </div> -->


                         <table class="table table-bordered"style="font-size:12px;">
                        <thead>
                            <tr align="center" >
                                <td width="5%;">ลำดับ</td>
                                <td width="13%;">Cost Code</td>
                                <td>รายการ</td>
                                <td width="5%;">จำนวน</td>
                                <td width="7%;">หน่วย</td>
                                <td width="12%;">ราคา/หน่วย</td>
                                <td width="12%;">ราคารวม</td>
                            </tr>

                        </thead>

                    <tbody>
                    <?php for ($i=1; $i <29 ; $i++) { ?>
                      <tr align="center" id="tablerow" >
                                <td><?php echo $i; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td ></td>
                                <td></td>
                                <td ></td>
                            </tr>
                      <?php } ?>


          <!--   <?php $i=1; foreach ($resi as $mod) {?>
                            <tr >
                                <td align="center"><?php echo $i; ?></td>
                                <td><?php echo $mod->isi_matname; ?></td>
                                <td align="center" width="7%;"> </td>
                                <td><?php echo $mod->isi_remark; ?></td>
                                <td><?php echo $mod->isi_matcode; ?></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <?php $i++; } ?> -->

                       </tbody>
                         </table>


      <div class="footer" >
          <div class="pdf-footer">
      </div>



                         </div>
                         </div>
                         </div>
                         </div>
<div class="page-break"></div>
</body>
</html>
