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
            <li class="active">PO</li>

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
        <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Most Amount<p></p></h6>
        </div>
        <form action="../report/most_amount" id="fromre" method="get">
            <div class="panel-body">
            <!-- <?php echo print_r($search); ?> -->
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Name Vender :</label>
                        <div class="col-sm-4">
                           <select class="select-border-color border-warning select2-hidden-accessible" name="name" tabindex="-1" aria-hidden="true">
                                <option value="">Name Vender</option>
                                <?php foreach ($search['vender'] as $value) {?>
                                    <option value="<?php echo $value->vender_name; ?>"><?php echo $value->vender_name; ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Document Date :</label>
                        <div class="form-group col-sm-2">
                            <input type="date" name="date_start" id="date_start" class="form-control input-sm" >
                            <!-- <input type="hidden" value="" name="datestr" id="datestr" class="form-control input-sm"> -->
                        </div>
                        <label class="control-label">&nbsp;</label>
                        <div class="form-group col-sm-2">
                            <input type="date" name="date_stop" id="date_stop" class="form-control input-sm"  value="<?=date('Y-m-d')?>">
                            <!-- <input type="hidden" value="0" name="dateend" id="dateend" class="form-control input-sm"> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">จำนวนที่ต้องการแสดง :</label>
                        <div class="form-group col-sm-2">
                            <input type="number" min="0" class="form-control input-sm" name="limit">
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Document Type :</label>
                        <div class="form-group col-sm-2">
                            <select name="type" class="form-control input-sm">
                                <!-- <option value="0">--เลือกทั้งหมด--</option> -->
                                <option value="PO">PO Only</option>
                                <!-- <option value="WO">WO Only</option> -->
                                <!-- <option value="PC">PC Only</option> -->
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



 var frm = $('#fromre');
 $("#fromre").submit();
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
    $('#po_purchase').attr('class', 'active');
    $('#report_po').attr('style', 'background-color:#dedbd8');
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