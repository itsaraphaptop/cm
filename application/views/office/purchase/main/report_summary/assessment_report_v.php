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
            <li class="active"></li>
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
                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
            </li>
        </ul>
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
    </div>
</div>


<div class="content">
    <div class="panel panel-flat">
        <div class="modal-header">
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Assessment Report<p></p></h6>
        </div>
        <form action="assessment_report_r" method="get">
            <div class="panel-body">
               <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Vender :</label>
                        <div class="col-sm-4">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="vender" id="vender" onchange="get_vender()">
                                <option value="">--แสดงทั้งหมด--</option>
                                <?php foreach ($search['vender'] as $value) {?>
                                    <option value="<?php echo $value->vender_id; ?>"><?php echo $value->vender_name; ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>
                </div><br>
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
                <button type="submit" class="btn btn-success">Search</button>
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

<script type="text/javascript">
    $("#submit").click(function(){
        $("#form_").submit();
    })
</script>

<script>

function get_vender(el){
        var vender = $('#vender').val();
        var url = "<?=base_url()?>datastore_m/vender_name_assesment/"+vender;
        //alert(url)
        $.post(url, function() {
            
        }).done(function(data){
            console.log(data);
            try{
                var json = jQuery.parseJSON(data);
                // $("#materials_select").empty();
                $("#vender").html("<option value=''>ทั้งหมด</option>");
                $("#vender").removeAttr("disabled");
                $.each(json, function(index, val) {

                $("#vender").append("<option value="+val.po_prno+">"+val.po_prno+"</option>");
                
                });
                
              }catch(e){

            }
            //alert(data)
             get_vender($("#vender").val());

            $("#vender").change(function(){
                get_vender($(this).val());
            });
        });
          
    }

    $(".openproj").click(function(){
    $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#xxxx").load('<?php echo base_url(); ?>index.php/ap/modal_project');
        
        // function get_project_id(){

        // }

    });

    </script>