
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
	$title = $val->b_subject;
	$code = $val->b_code;
	$detail = $val->b_detail;
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
         <a href="<?php echo base_url(); ?>index.php/help/list_help"><button class="btn btn-info navbar-btn" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> กลับหน้าหลัก</button></a>
         <button type="button" class="btn btn-warning navbar-btn" onClick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
     <div id="example" >
        <div class="page-container">
            <div class="pdf-page size-a4">
                <div class="pdf-header">
	                <div class="row">
	                	<p><?php echo $code; ?></p>
	                </div>
                	<div class="row">
                		<h4><?php echo $title; ?></h4>
                	</div>
                	<hr>
                	<div class="row">
                		<p><?php echo $detail; ?></p>
                	</div>
                </div>
            </div>
        </div>
    </div>
	</body>
</html>