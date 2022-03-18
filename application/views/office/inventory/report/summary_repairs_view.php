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
            <li class="active">IC</li>
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
        <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Store Report<p></p></h6>
    </div>
    <form action="<?=base_url() ?>add_asset/summary_repairs_r" method="get" id="form_">
    <div class="panel-body">
            
            <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Project :</label>
                        <div class="col-sm-3">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="project" tabindex="-1" aria-hidden="true">
                                <option value="">Project Name</option>
                                <?php foreach ($search['project_name'] as $value) {?>
                                    <option value="<?php echo $value->project_name; ?>"><?php echo $value->project_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Department :</label>
                        <div class="col-sm-3">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="department" tabindex="-1" aria-hidden="true">
                                <option value="">Department Name</option>
                                <?php foreach ($search['department_name'] as $value) {?>
                                    <option value="<?php echo $value->department_name; ?>"><?php echo $value->department_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Date :</label>
                        <div class="col-sm-1">
                            <select class="form-control input-sm" name="year">
                                <?php for ($i=date("Y"); $i>=2014;$i--){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <!-- <select class="form-control input-sm" name="month">
                                <?php for ($i=1; $i>=12;$i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select> -->
                            <select class="form-control input-sm" name="month">
                                <option value="01">มกราคม</option>
                                <option value="02">กุมภาพันธ์</option>
                                <option value="03">มีนาคม</option>
                                <option value="04">เมษายน</option>
                                <option value="05">พฤษภาคม</option>
                                <option value="06">มิถุนายน</option>
                                <option value="07">กรกฎาคม</option>
                                <option value="08">สิงหาคม</option>
                                <option value="09">กันยายน</option>
                                <option value="10">ตุลาคม</option>
                                <option value="11">พฤษจิกายน</option>
                                <option value="12">ธันวาคม</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Status :</label>
                        <div class="form-group col-sm-2">
                            <!-- <input type="date" name="datestr" id="datec" class="form-control input-sm" > -->
                            <select class="form-control input-sm" name="status">
                                <option value="">--เลือกทั้งหมด--</option>
                                <option value="1">Normal</option>
                                <option value="2">Repair</option>
                                <option value="3">Write Off</option>
                            </select>
                        </div>
                    </div>
                </div>
    </div>
    <div class="modal-footer" style="text-align: right;">
        <div class="col-sm-7"></div>
        <a  id="submit" class="btn btn-success">Search</a>
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
        var project_id = $(el).attr("proj_id");
        var url = "<?=base_url()?>pr_report/get_wh_store/"+project_id;
        // alert(url)
        $.post(url, function() {
            
        }).done(function(data){
            console.log(data);
            try{
                var json = jQuery.parseJSON(data);
                $("#fromproject").empty();
                $("#fromproject").html("<option value=''>ทั้งหมด</option>");
                $("#fromproject").removeAttr("disabled");
                $.each(json, function(index, val) {

                    $("#fromproject").append("<option value="+val.wh+">"+val.wh+"</option>");
                });
               
              }catch(e){

            }
            //alert(data)
        });
          
    }

    $(".openproj").click(function(){
    $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#xxxx").load('<?php echo base_url(); ?>index.php/ap/modal_project');
        
        // function get_project_id(){

        // }

    });

    </script>
