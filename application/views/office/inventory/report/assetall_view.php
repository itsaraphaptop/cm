<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 4;
$username = $session_data["username"];
$this->db->select('*');
$this->db->from('module_detail');
$this->db->join('module_header', 'module_detail.ref_module = module_header.module_id');
$this->db->where("ref_module",$id_module);
$query = $this->db->get();
$res_modules = $query->result_array();
//var_dump($res_modules);

        $array_module = array();
        $permission = array();
        
          $sub_modules =  $res_modules;
          foreach ($sub_modules as $key => $sub_module) {

                      //get read and write by user name
                      $this->db->select(
                        ["read","write"]
                      );
                      $where_array = array(
                        "ref_username" => $username,
                        "ref_module_id" => $id_module,
                         "ref_sub_module" => $sub_module["sub_module_id"]
                      );
                      $this->db->where($where_array);
                      $query = $this->db->get("member_permission");
                      $res_data = $query->result_array();
                      $read = (isset($res_data[0]["read"]) == true) ? $res_data[0]["read"] : "N/A";
                      $write = (isset($res_data[0]["write"]) == true) ? $res_data[0]["write"] : "N/A";
                      
                      $permission[$sub_module["module_name"]][$sub_module["sub_module_id"]] =  array(
                        //"ref_module_id" => $sub_module["ref_module"],
                  //"sub_module_id" => $sub_module["sub_module_id"],
                  "read" => $read ,
                  "write" =>$write

                      );

              }// loop 1.1  

?>


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
            <li class="active">FA</li>
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
        <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Asset All<p></p></h6>
    </div>
    <form action="<?=base_url() ?>add_asset/asset_all_r" method="get" id="form_">
    <div class="panel-body">
           <div class="row">
                  <div class="col-sm-12">
                   <label class="control-label col-sm-3" style="text-align: right;">Select Asset Type :</label>  
                    <div class="form-group col-sm-1">
                    <label class="control-label">Group :</label>
                     <input type="text" class="form-control input-sm" name="fa_group" id="fa_group" readonly="true">
                    </div>

                     <div class="form-group col-sm-1">
                    <label class="control-label">Asset Type :</label>
                     <input type="text" class="form-control input-sm" name="fa_atype" id="fa_atype" readonly="true">
                    </div>

                    <div class="col-sm-2">
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                     <input type="text" class="form-control input-sm" name="fa_atypename" id="fa_atypename" readonly="true"><span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#asset" class="asset btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                     </div>
                    </div> 
                  </div>
                </div>

           <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3" style="text-align: right;">Asset Name :</label>
                        <div class="col-sm-4">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="asset_name" tabindex="-1" aria-hidden="true">
                                <option value="">ชื่ออุปกรณ์</option>
                                <?php foreach ($search['assetname'] as $value) {?>
                                    <option value="<?php echo $value->fa_asset; ?>"><?php echo $value->fa_asset; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3" style="text-align: right;">Location Project :</label>
                        <div class="col-sm-4">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="lo_pro" tabindex="-1" aria-hidden="true">
                                <option value="">Project Name</option>
                                <?php foreach ($search['assetproject'] as $value) {?>
                                    <option value="<?php echo $value->fa_projectname; ?>"><?php echo $value->fa_projectname; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3" style="text-align: right;">Location Department :</label>
                        <div class="col-sm-4">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="lo_dep" tabindex="-1" aria-hidden="true">
                                <option value="">Department Name</option>
                                <?php foreach ($search['assetdepartment'] as $value) {?>
                                    <option value="<?php echo $value->fa_departmentname; ?>"><?php echo $value->fa_departmentname; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3" style="text-align: right;">Use by :</label>
                        <div class="col-sm-4">
                            <select class="select-border-color border-warning select2-hidden-accessible" name="use_name" tabindex="-1" aria-hidden="true">
                                <option value="">Name User By</option>
                                <?php foreach ($search['assetuser'] as $value) {?>
                                    <option value="<?php echo $value->fa_lisename; ?>"><?php echo $value->fa_lisename; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-sm-12">  
                    <label class="control-label col-sm-3" style="text-align: right;">Status :</label>
                    <div class="form-group col-sm-2">
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

    function get_po_no(wh){
        var url = "<?=base_url()?>pr_report/get_stock_no/"+wh;
        // alert(url);
        $.post(url, function(){

        }).done(function(data){
            console.log(data);
            try{
                var json = jQuery.parseJSON(data);
                $("#materials_select").empty();
                $("#materials_select").html("<option value=''>ทั้งหมด</option>");
                $("#materials_select").removeAttr("disabled");
                $.each(json, function(index, val){
                    $("#materials_select").append("<option value="+val.stock_matcode+">"+val.stock_matcode+"</option>");
                })
            }catch(e){
               
            }
             get_mat_name($("#materials_select").val());

            $("#materials_select").change(function(){
                get_mat_name($(this).val());
            });
        })
    }
    function get_mat_name(matname){
        var url = "<?=base_url()?>pr_report/get_mat_code_by_stock_on/"+matname;
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
                    $("#mat_name").append("<option value="+val.stock_matcode+">"+val.stock_matname+"</option>");
                })
            }catch(e){
              
            }
        })
    }   
    function get_project_id(el){
        var project_id = $(el).attr("proj_id");
        var url = "<?=base_url()?>pr_report/get_wh/"+project_id;
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
                
                get_po_no($("#fromproject").val());

                $("#fromproject").change(function(event) {
                    get_po_no($(this).val());
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
    <div class="modal fade" id="asset" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Asset Type</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="type">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>

        <script>
      $(".asset").click(function(){
       $('#type').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#type").load('<?php echo base_url(); ?>index.php/share/codeasst');
     });

      $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });

      </script>
