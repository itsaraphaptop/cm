<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Master</span> - Userlog <?php echo php_uname ('n');?></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>data_master/main_index"><i class="icon-home2 position-left"></i>
                        Master</a></li>
                <li><a href="<?php echo base_url();?>data_structure/forprogrammer">Programmer</a></li>
                <li class="active">Userlog <?php echo gethostbyaddr($_SERVER['REMOTE_ADDR']);?></li>
            </ul>


        </div>
    </div>
    <!-- /page header -->

    <div class="content">

        <!-- Detached content -->
        <div class="container-detached">
            <div class="content-detached">

                <!-- Version 2.0 -->
                <div class="panel panel-flat" id="v_2_0">


                    <div class="panel-body">


                        <pre class="language-javascript"><code>// # List of Event stuff
// ------------------------------
<?php foreach ($res as $key => $value) { ?>
[<?php echo $value->menu;?>] [<?php echo $value->logindate;?>] <?php echo $value->user;?>  (<?php echo $value->ipaddress;?>) (<?php echo "Computer Name :" . $value->hostname;?>) [latitude: <?php echo $value->latitude;?>] [Longitude: <?php echo $value->longitude;?>]
<?php } ?>

</code></pre>
                    </div>
                </div>
                <!-- /version 2.0 -->
            </div>
        </div>