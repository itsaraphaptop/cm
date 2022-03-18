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
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Materials Report Order by Vender<p></p></h6>
        </div>
        <form action="po_by_vender_r" method="get">
            <div class="panel-body">
               <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Vender :</label>
                        <div class="col-sm-4">
                            <select class="form-control input-sm" name="vender" id="vender" onchange="get_project_id()">
                                <option value="">--แสดงทั้งหมด--</option>
                                <?php foreach ($search['vender'] as $value) {?>
                                    <option value="<?php echo $value->vender_name; ?>"><?php echo $value->vender_name; ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>
                </div><br>
                <!-- <div class="row">
                    <div class="col-sm-12" >
                        <label class="control-label col-sm-4" style="text-align: right;">Mat. No :</label>
                        <div class="col-sm-4">
                            <select  class="form-control input-sm" id="materials_select" name="PO" disabled>
                                <option value="">--ทั้งหมด--</option>
                               
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                 <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Mat. Name :</label>
                        <div class="col-sm-4">
                            <select class="form-control input-sm" id="mat_name" name="Materials" disabled>
                                <option value="">--ทั้งหมด--</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br> -->
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
    <!-- <div class="form-group col-sm-2">
      <label for="">JOB :</label>
      <div id="job"></div>
    </div>
    <div class="form-group col-sm-4">
      <label for="">Project Name :</label>
      <div class="input-group" id="errorcost">
      <input type="text" id="pre_eventname" name="pre_eventname" class="form-control" readonly="true">
      <span class="input-group-btn">
        <a class="project btn btn-primary btn-sm" data-toggle="modal" data-target="#project"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
      </span>
      </div>
    </div> -->
<script>

function get_project_id(el){
        var vender = $('#vender').val();
        var url = "<?=base_url()?>pr_report/get_po_vender/"+vender;
        //alert(url)
        $.post(url, function() {
            
        }).done(function(data){
            console.log(data);
            try{
                var json = jQuery.parseJSON(data);
                // $("#materials_select").empty();
                $("#materials_select").html("<option value=''>ทั้งหมด</option>");
                $("#materials_select").removeAttr("disabled");
                $.each(json, function(index, val) {

                $("#materials_select").append("<option value="+val.poi_matcode+">"+val.poi_matcode+"</option>");
                
                });
                
               
              }catch(e){

            }
            //alert(data)
             get_mat_name($("#materials_select").val());

            $("#materials_select").change(function(){
                get_mat_name($(this).val());
            });
        });
          
    }
function get_mat_name(matname){
        var url = "<?=base_url()?>pr_report/get_po_vender_name/"+matname;
        // alert(url);
        $.post(url, function(){

        }).done(function(data){
            console.log(data);
            try{
                var json = jQuery.parseJSON(data);
                $("#mat_name").empty();
                $("#mat_name").html("<option value=''>ทั้งหมด</option>");
                $("#mat_name").removeAttr("disabled");
                $.each(json, function(index, val){
                    $("#mat_name").append("<option value="+val.poi_matname+">"+val.poi_matname+"</option>");
                })
            }catch(e){
              
            }
        })
    }   

   


    $(".openproj").click(function(){
    $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#xxxx").load('<?php echo base_url(); ?>index.php/ap/modal_project');
        
        // function get_project_id(){

        // }

    });
    $('#po_purchase').attr('class', 'active');
    $('#report_po').attr('style', 'background-color:#dedbd8');
    </script>