<style>
.custombadge{
    position: absolute;
    right: -10px;
    top: -2px;
}
</style>
<div class="content-wrapper">
    <div class="content">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-flat">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="active">
                            <a href="#bottom-tab1" data-toggle="tab">INVENTORY OVERVIEW </a>
                        </li>
                    </ul>

                    <div class="panel-body">
                        <div class="row row-condensed">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">รับของจาก PO</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg porec">
                                        <i class="icon-file-download"></i>
                                        <span data-i18n="ic_module.dash.poreceive">รับของจากใบสั่งซื้อ</span>
                                    </button>
                                    <?php 
                                    $q=0; if($menu['count_po']!=0){
                                    echo "<span class='badge bg-danger-400 custombadge'>".$menu['count_po']."</span>";
                                   }else{

                                    } ?>
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">จองวัสดุ</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg booking">
                                        <i class="icon-file-check"></i>
                                        <span data-i18n="ic_module.dash.booking">จองวัสดุ</span>
                                    </button>
                                   
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">โอนย้ายวัสดุ</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg transfer">
                                        <i class="icon-airplane3"></i>
                                        <span data-i18n="ic_module.dash.transfer">โอนย้ายวัสดุ</span>
                                    </button>
                                    <?php
                                     $q=0; if($menu['count_transfer']!=0){
                                        echo "<span class='badge bg-danger-400 custombadge'>".$menu['count_transfer']."</span>";
                                     }else{

                                     }
                                     ?>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">รับของเข้า Stock</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg icrec">
                                        <i class="icon-box-add"></i>
                                        <span data-i18n="ic_module.dash.icrecieve">รับของเข้า Stock</span>
                                    </button>
                                     <?php
                                      $q=0; if($menu['count_receive']!=0){
                                        echo "<span class='badge bg-danger-400 custombadge'>".$menu['count_receive']."</span>";
                                    }else{

                                    } ?>
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">เบิกวัสดุ</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg issue">
                                        <i class="icon-file-upload"></i>
                                        <span data-i18n="ic_module.dash.issue">เบิกวัสดุ</span>
                                    </button>
                                     <?php
                                    if($menu['count_issue']!=0){
                                        echo "<span class='badge bg-danger-400 custombadge'>".$menu['count_issue']."</span>";
                                    }else{

                                        }
                                     ?>
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">รับโอนย้ายวัสดุ</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg rectranfer">
                                        <i class="icon-airplane4"></i>
                                        <span data-i18n="ic_module.dash.receivetrasfer">รับโอนย้ายวัสดุ</span>
                                    </button>
                                    <?php
                                     $q=0; if($menu['count_receive_transfer']!=0){
                                        echo "<span class='badge bg-danger-400 custombadge'>".$menu['count_receive_transfer']."</span>";
                                     }else{

                                     }
                                     ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="panel has-bg-image">
                                <div class="panel-body">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs nav-tabs-component">
                                            <li class="active">
                                                <a class="set1" href="#set1" data-toggle="tab">Setup Alert</a>
                                            </li>
                                            <li>
                                                <!-- <a class="set2" href="#set2" data-toggle="tab">Low Material</a> -->
                                            </li>

                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="set1">
                                            <form id="formpost" class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Minimum Alert:</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control text-right min" name="minper" min="0" max="100" placeholder="ex. 20" value="<?= $panel['min_per'] ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group form-group-material">
                                                    <label class="control-label has-margin">Touchspin spinners</label>
                                                    <input type="text" value="" class="touchspin-basic" placeholder="Touchspin spinners">
                                                </div> -->
                                            </form>
                                            </div>
                                            <div class="tab-pane" id="set2">
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="panel panel-body panel-body-accent border-bottom-xlg border-bottom-warning">
                                    <div class="media no-margin">
                                        <div class="media-left media-middle">
                                            <i class="icon-file-download icon-3x text-warning-400"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h1 class="no-margin text-semibold"><?= $panel['count_po'];?></h1>
                                            <span class="text-uppercase text-size-mini text-muted" data-i18n="ic_module.dash.poreceivetoday">รับของใหม่วันนี้</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-body panel-body-accent border-bottom-xlg border-bottom-purple-300">
                                    <div class="media no-margin">
                                        <div class="media-left media-middle">
                                            <i class="icon-file-check icon-3x text-purple-300"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h1 class="no-margin text-semibold"><?= $panel['count_booking'] ?></h1>
                                            <span class="text-uppercase text-size-mini text-muted" data-i18n="ic_module.dash.bookingtoday">จองวัสดุ ใหม่วันนี้</span>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-body panel-body-accent border-bottom-xlg border-bottom-teal-300">
                                    <div class="media no-margin">
                                        <div class="media-left media-middle">
                                            <i class="icon-file-upload icon-3x text-teal-300"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h1 class="no-margin text-semibold"><?= $panel['count_issue'] ?></h1>
                                            <span class="text-uppercase text-size-mini text-muted" data-i18n="ic_module.dash.issuetoday">เบิกวัสดุ ใหม่วันนี้</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-body panel-body-accent border-bottom-xlg border-bottom-blue-300">
                                    <div class="media no-margin">
                                        <div class="media-left media-middle">
                                            <i class="icon-airplane3 icon-3x text-blue-300"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h1 class="no-margin text-semibold"><?= $panel['count_transfer'] ?></h1>
                                            <span class="text-uppercase text-size-mini text-muted" data-i18n="ic_module.dash.transfertoday">โอนวัสดุ ใหม่วันนี้</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //row -->
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel has-bg-image">
                                    <div class="panel-body">
                                        <div class="tabbable">
                                            <ul class="nav nav-tabs nav-tabs-component">
                                                <li class="active">
                                                    <a class="loadmateril" href="#bottom-tab1" data-toggle="tab">Project Inventory</a>
                                                </li>
                                                <li>
                                                    <a class="loadlowmateril" href="#bottom-tab2" data-toggle="tab">Low Material</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="bottom-tab1">
                                                    <div id="loadmateril">

                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="bottom-tab2">
                                                    <div id="loadlowmateril">

                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //row -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $('.porec').click(function() {
        window.location.href = "<?php echo base_url(); ?>inventory/openreceive/po";
    });
    $('.booking').click(function() {
        window.location.href = "<?php echo base_url(); ?>inventory/open_booking/open";
    });
    $('.transfer').click(function() {
        window.location.href = "<?php echo base_url(); ?>inventory/open_transfer/open";
    });
    $(".icrec").click(function() {
        window.location.href = "<?php echo base_url(); ?>inventory/openreceive/n";
    });
    $(".issue").click(function() {
        window.location.href = "<?php echo base_url(); ?>inventory/main_issue_project";
    });
    $(".rectranfer").click(function() {
        window.location.href = "<?php echo base_url(); ?>inventory/archive_transfer_store";
    });
// $(document).ready(function(){
 $("#loadmateril").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $("#loadmateril").load('<?php echo base_url();?>inventory/load_dash_material');
// });
    $(".loadmateril").click(function(){
        $("#loadmateril").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $("#loadmateril").load('<?php echo base_url();?>inventory/load_dash_material');
    });
    $(".loadlowmateril").click(function(){
        $("#loadlowmateril").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $("#loadlowmateril").load('<?php echo base_url();?>inventory/load_dash_low_material');
    });

$(".min").change(function(){
    var min = $(".min").val();
    if (min>100) {
        swal({
            title: "Maximum Inventory Alert 100%",
            text: "",
            confirmButtonColor: "#FF8A65",
            type: "warning"
        });
    }else{
     var formD = new FormData($('#formpost')[0]);
        $.ajax({
            url: '<?php echo base_url(); ?>inventory/setup_dash',
            type: 'POST',
            method: 'POST',
            data: formD,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(response) {
                show_nonti(response, response,
                    'success');
                // setTimeout(function() {
                //     location.reload();
                // }, 500);
            }
        });
        return false;
    }
});
</script>