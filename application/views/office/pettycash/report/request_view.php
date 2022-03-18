<div class="page-header page-header-transparent">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span>Report</h4>
        </div>

        <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
    </div>
    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a class="preload" href="<?php echo base_url(); ?>office/openblank"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Petty Cash</li>

        </ul>
        <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Settings
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-gear"></i> All <se></se>ttings</a></li>
                </ul>
            </li>
        </ul>
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
    </div>
</div>
<div class="content">
    <div class="panel panel-flat">
        <div class="modal-header">
        <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Request Report Petty Cash<p></p></h6>
        </div>
        <form action="<?php echo base_url();?>petty_cash/report_vat" id="fromre" method="post">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Project Name :</label>
                        <div class="form-group col-sm-1">
                            <input type="text" class="form-control input-sm" name="pr_projectid" id="projectidd" readonly="">
                        </div>
                        <label class="control-label">&nbsp;</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control input-sm" name="pr_projectname" id="projectnamee" readonly="">
                                <span class="input-group-btn">
                       <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Document NO. :</label>
                        <div class="col-sm-2">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="docstr" tabindex="-1" aria-hidden="true">
                                <option value="">จาก</option>
                                <?php foreach ($search['pr'] as $value) {?>
                                    <option value="<?php echo $value->pr_prno; ?>"><?php echo $value->pr_prno; ?></option>
                                <?php	} ?>
                                <?php foreach ($search['pc'] as $value) {?>
                                    <option value="<?php echo $value->docno; ?>"><?php echo $value->docno; ?></option>
                                <?php	} ?>
                            </select>
                        </div>
                        <label class="control-label">&nbsp;</label>
                        <div class="col-sm-2">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="docend" tabindex="-1" aria-hidden="true">
                                <option value="">ถึง</option>
                                <?php foreach ($search['pr'] as $value) {?>
                                    <option value="<?php echo $value->pr_prno; ?>"><?php echo $value->pr_prno; ?></option>
                                <?php	} ?>
                                <?php foreach ($search['pc'] as $value) {?>
                                    <option value="<?php echo $value->docno; ?>"><?php echo $value->docno; ?></option>
                                <?php	} ?>

                            </select>
                        </div>
                    </div>
                </div> -->



                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Document Date :</label>
                        <div class="form-group col-sm-2">
                            <input type="date" name="datestr" id="datec" class="form-control input-sm" >
                            <!-- <input type="hidden" value="" name="datestr" id="datestr" class="form-control input-sm"> -->
                        </div>
                        <label class="control-label">&nbsp;</label>
                        <div class="form-group col-sm-2">
                            <input type="date" name="dateend" id="dated" class="form-control input-sm"  value="<?=date('Y-m-d')?>">
                            <!-- <input type="hidden" value="0" name="dateend" id="dateend" class="form-control input-sm"> -->
                        </div>
                    </div>
                </div>
                
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Buyer Name :</label>
                        <div class="form-group col-sm-4">
                            <input type="text" class="form-control input-sm" name="buyname" id="buyname">
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Document Type :</label>
                        <div class="form-group col-sm-2">
                            <select name="doct" class="form-control input-sm">
                                <option value="0">PR & PC</option>
                                <option value="1">PR Only</option>
                                <option value="2">PC Only</option>
                            </select>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">VAT :</label>
                        <div class="form-group col-sm-2">
                            <select name="status" class="form-control input-sm">
                                <option value="vat">มี VAT</option>
                                <option value="nonvat">ไม่มี VAT</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-2"></div>
                <button type="button" id="seaechre" class="btn btn-success">Search</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="openproj" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Project</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row" id="xxxx">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="opendocs" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Document</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row" id="docs">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$("#seaechre").click(function(e){
    if($("#doc_start").val()==""){
  $doc_start = 0;
}


// if($("#projectidd").val()==""){
//     swal({
//         title: "โครงการ",
//         text: "กรุณาเลือกโครงการ!!.",
//         type: "error"
//     });
// }else{

 var frm = $('#fromre');
 $("#fromre").submit();
// }
});
    $(".openproj").click(function(){
        $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#xxxx").load('<?php echo base_url(); ?>index.php/share/project');
    });
    $(".opendoce , .opendocs").click(function(){
        $('#docs').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        var terget = $(this).attr("my_target");
        $("#docs").load('<?php echo base_url(); ?>index.php/share/doct',{"target":terget});
    });
</script>

<script>
    $("#doc_start").keyup(function(){
        var word = $(this).val();
        $.post("<?=base_url() ?>pr_report/pr_search",{data:word},function () {

        }).done(function(data){
            try{
                var json = jQuery.parseJSON( data );
                //alert(json);
                //console.log(json[0].pr);
                $("#livesearch1").empty();
                $.each(json[0].pr,function( index, value ) {
                    // console.log( index + ": " + value.pr_prno );
                    $("#livesearch1").append("<p><a href='#' class='word'>"+value.pr_prno+"</a></p>");
                    $("#livesearch1").css({border:'1px solid #A5ACB2'})


                });
                $.each(json[0].pc,function( index, value ) {
                    // console.log( index + ": " + value.pr_prno );
                    $("#livesearch1").append("<p><a href='#' class='word'>" + value.docno + "</a></p>");
                    $("#livesearch1").css({border: '1px solid #A5ACB2'})
                });
                $("#livesearch1").show();
                $('.word').click(function(){

                    $("#doc_start").val($(this).text());
                    $("#livesearch1").hide();

                });
            }catch(e){
                alert(e);
            }

        });
        //alert(44)
    });
</script>
<script>
    $("#doc_stop").keyup(function(){
        var word = $(this).val();
        $.post("<?=base_url() ?>pr_report/pr_search",{data:word},function () {

        }).done(function(data){
            try{
                var json = jQuery.parseJSON( data );
                //alert(json);
                //console.log(json[0].pr);
                $("#livesearch2").empty();
                $.each(json[0].pr,function( index, value ) {
                    // console.log( index + ": " + value.pr_prno );
                    $("#livesearch2").append("<p><a href='#' class='word'>"+value.pr_prno+"</a></p>");
                    $("#livesearch2").css({border:'1px solid #A5ACB2'})

                });
                $.each(json[0].pc,function( index, value ) {
                    // console.log( index + ": " + value.pr_prno );
                    $("#livesearch2").append("<p><a href='#' class='word'>" + value.docno + "</a></p>");
                    $("#livesearch2").css({border: '1px solid #A5ACB2'})
                });
                $("#livesearch2").show();
                $('.word').click(function(){

                    $("#doc_stop").val($(this).text());
                    $("#livesearch2").hide();

                });
            }catch(e){
                alert(e);
            }

        });
        //alert(44)
    });
</script>