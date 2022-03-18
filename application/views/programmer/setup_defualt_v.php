
    <div class="row">
        <div class="col-md-6">

            <!-- Basic layout-->
            <form id="formsent" method="post" class="form-horizontal">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Defualt Setup</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Site URL:</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="site_url" id="site_url" placeholder="<?php echo base_url();?>" value="<?php echo $site_url;?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Multi Company:</label>
                                <div class="col-lg-9">
                                    <?php if ($multicomp[0]['multicomp']=="Y") {?>
                                        <input type="checkbox" id="chkmlcomp" checked="checked">
                                    <?php }else{?>
                                        <input type="checkbox" id="chkmlcomp">
                                    <?php } ?>
                                        <input type="hidden" id="chkmulticomp" value="<?php echo $multicomp[0]['multicomp']; ?>" name="chkmulticomp">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Line OA Alert:</label>
                                <div class="col-lg-9">
                                  
                                        <input type="text" class="form-control" id="chkmultilineapi" value="<?php echo $line_api[0]['line_api']; ?>" name="chkmultilineapi">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Print Form Default:</label>
                                <div class="col-lg-9">
                                    <?php if ($print_defualt[0]['print_defualt']=="Y") {?>
                                        <input type="checkbox" id="chkprint" checked="checked">
                                    <?php }else{?>
                                        <input type="checkbox" id="chkprint">
                                    <?php } ?>
                                        <input type="hidden" id="chkprintinput" value="<?php echo $print_defualt[0]['print_defualt']; ?>" name="chkprintinput">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Cost Code Level:</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="costlevel" id="costlevel">
                                        <!-- <?php if($multicomp[0]['costlevel']=="1"){ ?><option value="1" selected>Level 1</option><?php } else { ?><option value="1">Level 1</option><?php }?>
                                        <?php if($multicomp[0]['costlevel']=="2"){ ?><option value="2" selected>Level 2</option><?php } else { ?><option value="2">Level 2</option><?php }?> -->
                                        <?php if($multicomp[0]['costlevel']=="3"){ ?><option value="3" selected>Level 3</option><?php } else { ?><option value="3">Level 3</option><?php }?>
                                        <?php if($multicomp[0]['costlevel']=="4"){ ?><option value="4" selected>Level 4</option><?php } else { ?><option value="4">Level 4</option><?php }?>
                                        <?php if($multicomp[0]['costlevel']=="5"){ ?><option value="5" selected>Level 5</option><?php } else { ?><option value="5">Level 5</option><?php }?>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">ปิดปุ่ม Select PR ใน PO:</label>
                                <div class="col-lg-9">
                                    <?php if ($multicomp[0]['close_btn_pr_to_po']=="Y") {?>
                                        <input type="checkbox" id="chkpr_po" checked="checked">
                                    <?php }else{?>
                                        <input type="checkbox" id="chkpr_po">
                                    <?php } ?>
                                        <input type="hidden" id="chkpr_po_input" value="<?php echo $multicomp[0]['close_btn_pr_to_po']; ?>" name="chkpr_po_input">
                                </div>
                        </div>
                       
                    </div>
                </div>
            </form>
            <!-- /basic layout -->

        </div>
        <div class="col-md-6">

            <!-- Basic layout-->
            <!-- <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"></h5>
                </div>

                <div class="panel-body">
                    
                </div>
            </div> -->
            <!-- /basic layout -->

        </div>
    </div>
<script>
$("#site_url").change(function(){
     var formD = new FormData($('#formsent')[0]);
        $.ajax({
            url: '<?php echo base_url(); ?>data_structure/updatesiteurl',
            type: 'POST',
            method: 'POST',
            data: formD,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(response) {
                show_nonti('Success!!!', response,
                    'success');
                // setTimeout(function() {
                //     location.reload();
                // }, 500);
            }
        });
        return false;
});
$('#chkmlcomp').change(function(event) {
     if ($("#chkmlcomp").prop("checked")) {
            $("#chkmulticomp").val("Y");
        }else{
            $("#chkmulticomp").val("");
        }
    var formD = new FormData($('#formsent')[0]);
        $.ajax({
            url: '<?php echo base_url(); ?>data_structure/updmlcomp',
            type: 'POST',
            method: 'POST',
            data: formD,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(response) {
                show_nonti('Success!!!'+response, 'Upload File Successful',
                    'success');
                // setTimeout(function() {
                //     location.reload();
                // }, 500);
            }
        });
        return false;

});
$('#chkmultilineapi').change(function(event) {
     
    var formD = new FormData($('#formsent')[0]);
        $.ajax({
            url: '<?php echo base_url(); ?>data_structure/updlineoa',
            type: 'POST',
            method: 'POST',
            data: formD,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(response) {
                show_nonti('Success!!!'+response, 'Upload File Successful',
                    'success');
                // setTimeout(function() {
                //     location.reload();
                // }, 500);
            }
        });
        return false;

});
$("#costlevel").on('change',function(){
    var formD = new FormData($('#formsent')[0]);
        $.ajax({
            url: '<?php echo base_url(); ?>data_structure/updcostlevel',
            type: 'POST',
            method: 'POST',
            data: formD,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(response) {
                show_nonti('Success!!!', response,
                    'success');
                // setTimeout(function() {
                //     location.reload();
                // }, 500);
            }
        });
        return false;
});
$('#chkprint').change(function(event) {
     if ($("#chkprint").prop("checked")) {
            $("#chkprintinput").val("Y");
        }else{
            $("#chkprintinput").val("");
        }
    var formD = new FormData($('#formsent')[0]);
        $.ajax({
            url: '<?php echo base_url(); ?>data_structure/udpprint',
            type: 'POST',
            method: 'POST',
            data: formD,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(response) {
                show_nonti('Success!!!'+response, 'Upload File Successful',
                    'success');
                // setTimeout(function() {
                //     location.reload();
                // }, 500);
            }
        });
        return false;

});
$('#chkpr_po').change(function(event) {
     if ($("#chkpr_po").prop("checked")) {
            $("#chkpr_po_input").val("Y");
        }else{
            $("#chkpr_po_input").val("N");
        }
    var formD = new FormData($('#formsent')[0]);
        $.ajax({
            url: '<?php echo base_url(); ?>data_structure/udppr_to_po',
            type: 'POST',
            method: 'POST',
            data: formD,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(response) {
                show_nonti('Success!!!'+response, 'Upload File Successful',
                    'success');
                // setTimeout(function() {
                //     location.reload();
                // }, 500);
            }
        });
        return false;

});
</script>