<div class="content">
    <div class="panel panel-flat">
        <div class="modal-header">
        <h6 class="panel-title"><i class="icon-cog3 position-left"></i>Stock Cost All Project</h6>
        </div>
        <form action="stock_cost_r" id="fromre" method="get">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Project NO. :</label>
                        <div class="col-sm-4">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="project" tabindex="-1" aria-hidden="true">
                                <option value="">Project Name</option>
                                <?php foreach ($search['project'] as $value) {?>
                                    <option value="<?php echo $value->project_name; ?>"><?php echo $value->project_name; ?></option>
                                <?php	} ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Date :</label>
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