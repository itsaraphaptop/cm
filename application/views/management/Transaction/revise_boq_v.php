<style type="text/css">
    .fixed {
        position: fixed;
        /*background: #fff;*/
        z-index: 10;
        width: 90%;
    }

    .content-wrapper {
        padding-top: 20px;
    }
</style>
<!-- Rounded basic tabs -->
<div class="container-fluid content-wrapper">
    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <i class="icon-folder4"></i> Revise Project Budget
                    <p></p>
                    <?=$tender;?>
                    
                </h5>
            </div>
            <div class="panel-body">
                <div class="tabbable tab-content-bordered">
                    <ul class="nav nav-tabs nav-tabs-highlight nav-tabs-component">
                        <li class="active"><a href="#tab1" id="tab1c" data-toggle="tab">Revise</a></li>
                        <li><a href="#tab2" id="tab2v" data-toggle="tab">View Revise</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane has-padding active" id="tab1">
                         
                           <div class="loadboq"></div>
                        </div>

                        <div class="tab-pane has-padding" id="tab2">
                            <div class="row">
                                <!-- <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-group">
                                            <table class="table table-bordered table-xxs table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Select</th>
                                                        <th>Revise. No.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1; foreach ($count_revise as $key => $value) {?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="" id="chkcount<?=$i;?>" >
                                                            <input type="text" id="txtchk<?=$i;?>" value="N">
                                                            <span id="mid<?=$i;?>"></span>
                                                        </td>
                                                        <td><label for="">Revise : <?php echo $value->revise_boq;?></label></td>
                                                    </tr>
                                                    <script>
                                                       $("#chkcount<?=$i;?>").on('click',function() {
                                                            if ($("#chkcount<?=$i;?>").prop("checked")) {
                                                                $("#txtchk<?=$i;?>").prop('checked',true);
                                                                $("#txtchk<?=$i;?>").val("Y");
                                                                $('#mid<?=$i;?>').html('<input type="text" id="txtreviseno<?=$i;?>" name="txtreviseno[]" value="">');
                                                                $("#txtreviseno<?=$i;?>").val('<?php echo $value->revise_boq;?>');
                                                            }else{
                                                                $("#txtchk<?=$i;?>").val("N");
                                                                $('#mid<?=$i;?>').empty();
                                                            }
                                                        });
                                                    </script>
                                                    <?php $i++; } ?>
                                                </tbody>
                                            </table>
                                            <?php ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="viewdata" class="btn btn-primary btn-sm">View Data</button>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="loadreviseno">
                                        <table class="table table-bordered table-striped table-xxs" id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>boq_id</th>
                                                    <th>newmatcode</th>
                                                    <th>newmatnamee</th>
                                                    <th>qty_bg</th>
                                                    <th>matpricebg</th>
                                                    <th>matamtbg</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>boq_id</th>
                                                    <th>newmatcode</th>
                                                    <th>newmatnamee</th>
                                                    <th>qty_bg</th>
                                                    <th>matpricebg</th>
                                                    <th>matamtbg</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 
    $(".loadboq").html("<div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' style='width: 100%'><span class='sr-only'>100% Complete (info)</span></div></div>");
        $(".loadboq").load('<?php echo base_url();?>management/load_revise_boq/<?php echo $tender;?>');
    $("#tab1c").on("click",function(){
        $(".loadboq").html("<div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' style='width: 100%'><span class='sr-only'>100% Complete (info)</span></div></div>");
        $(".loadboq").load('<?php echo base_url();?>management/load_revise_boq/<?php echo $tender;?>');
    });
    $("#tab2v").on("click",function(){
        $('.loadreviseno').empty();
        var revise = {
           'revise' : $("input[name='txtreviseno[]']").map(function(){
                 return $(this).val(); 
            }).get(),
       };
       $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>management/load_revise_archive/<?php echo $tender;?>',
            data: revise,
            success: function(resp){
            $(".loadreviseno").html(resp);
        }
        });
        console.log(revise);
        // $(".loadreviseno").load('<?php echo base_url();?>management/load_revise_archive/<?php echo $tender;?>');
    });
</script>