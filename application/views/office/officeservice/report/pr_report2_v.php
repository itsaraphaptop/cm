
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NinjaERP Layout</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>dist/css/sidebar.css" rel="stylesheet">

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
       
       
        #example{margin-top: 80px;}
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
    $system = $val->pr_system;
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
			    <span class="company-logo"></span>
			    	  <div class="row">
                        <div class="col-xs-12">
                        <form class="form-inline">
                    <div class="form-group">
                    <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:45px;"></p>
                    <h2 style="margin-top: -40px; margin-left: 300px;">ใบขอซื้อ</h2>
                    <h4 style="margin-top: -9px; margin-left: 250px;">Purchase Requisition From</h4>
                    <p style="margin-left:550px; margin-top:-25px;">เลขที่ : <?php echo $prno; ?></p>
                    </div>

                    <div class="row" style="margin-top:30px;">
	                    <div class="col-xs-6">
		                    <div class="form-group">
		                        <p style=" margin-top: -10px; margin-left:10px;">วันที่ : <?php echo $prdate; ?></p>
		                        <p style=" margin-top:-8px; margin-left:10px;">โครงการ/ฝ่าย :<?php echo $project_code; ?> - <?php echo $project; ?><?php echo $department; ?></p>
		                        <p style=" margin-top:-8px; margin-left:10px;">ส่งของที่ : <?php echo $delivery; ?></p>
		                        <p style=" margin-top:-8px; margin-left:10px;">วันที่ต้องการของ : <?php echo $pr_delidate; ?></p>
		                    </div>
	                    </div><!-- end col-xs-6 -->
	                    <div class="col-xs-6" style="margin-top:10px;">
	                    	<div class="form-group">
	                    		<label class="checkbox-inline">
								  <input type="checkbox" id="inlineCheckbox1" value="option1"> สั่งจาก Office
								</label>
								<label class="checkbox-inline" style="margin-left:50px;">
								  <input type="checkbox" id="inlineCheckbox2" value="option2"> วัสดุ : Material
								</label>
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
                    	<table class="table table-bordered"style="font-size:11px; margin-top: 30px; ">
                        <thead>
                            <tr align="center" >
								<td width="5%;"><p>ลำดับ <br><p>Item<br></p></td>
                                <td width="10%;"><p>รหัสต้นทุน <br><p>cost code<br></p></td>
                                <td><p>รายการ <br><p>Description<br></p></td>
                                <td width="5%;"><p>จำนวน <br><p>Quantity<br></p></td>
                                <td width="5%;"><p>หน่วย <br><p>Unit<br></p></td>
                                <td width="15%;"><p>หมายเหตุ</p></td>
                            </tr>
                        </thead>
                        
                        
                    <tbody>
	                    <?php
	                    	$n = 1;
		                    $total = 0;
		                    $discount = 0;
		                     foreach($resi as $pval){?>
                            <tr >
                            	<th scope="row"><?php echo $n;?></th>
                                <td align="center"><?php echo substr($pval->pri_costcode, -5);?></td>
	                            <?php $sum = $pval->pri_priceunit*$pval->pri_qty;?>
                                <td><?php echo $pval->pri_matname;?></td>
                                
                                <td align="center"><?php echo $pval->pri_qty;?></td>
                                <td align="center"><?php echo $pval->pri_unit;?></td>
                                <td><?php echo $pval->pri_remark; ?></td>
                            </tr>
                            <?php $n++; } ?>
                      

                       </tbody>
                    </table>

           <div class="footer">
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
		                        Requester By <br>ผู้ขอซื้อ <br><br>Date :____/____/_____</td>
		               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
		                       Reviewed By <br>ผู้อำนวยการฝ่าย/แผนกจัดการโครงการ/ฝ่าย/แผนก <br><br>Date :____/____/_____</td>
		               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
		                       Approved By <br>รองกรรมการผู้จัดการ <br><br>Date :____/____/_____</td>
		               </tr>
		                           
		              </tbody>
		            </table>
                    <p class="text-right" style="font-size:10px; margin-right:40px;"> ต้นฉบับ-จัดซื้อ</p>
                    <p class="text-right" style="font-size:10px; "> FM-PU-01, 01/08/2015</p>
           </div>      
         
			    </div>
		    </div>
	    </div>
    </div>


</body>
</html>
