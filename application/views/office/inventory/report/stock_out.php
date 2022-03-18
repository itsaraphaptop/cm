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
        <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Stock OUT<p></p></h6>
    </div>
    <form action="<?=base_url() ?>inventory_report/stock_out_r" method="get" id="form_">
    <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-12">  
                    <label class="control-label col-sm-4" style="text-align: right;">Project :</label>
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
           <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Warehouse :</label>
                        <div class="col-sm-4">
                            <select class="form-control input-sm" id="fromproject" name="wh" disabled >
                                <option value="">--ทั้งหมด--</option>
                                <?php foreach ($search['stock_wh'] as $value) {?>
                                    <option value="<?php echo $value->wh; ?>"><?php echo $value->wh; ?></option>
                                <?php   } ?>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                
                <div class="row">
                    <div class="col-sm-12" >
                        <label class="control-label col-sm-4" style="text-align: right;">Mat. No :</label>
                        <div class="col-sm-4">
                            <select  class="form-control input-sm" id="materials_select" name="PO" disabled  >
                                <option value="">--ทั้งหมด--</option>
                                <?php foreach ($search['stock_matcode'] as $value) {?>
                                    <option value="<?php echo $value->stock_matcode; ?>"><?php echo $value->stock_matcode; ?></option>
                                <?php   } ?>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                 <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Mat. Name :</label>
                        <div class="col-sm-4">
                            <select class="form-control input-sm" id="mat_name" name="Materials" disabled >
                                <option value="">--ทั้งหมด--</option>
                                <?php foreach ($search['stock_name'] as $value) {?>
                                    <option value="<?php echo $value->stock_matname; ?>"><?php echo $value->stock_matname; ?></option>
                                <?php   } ?>
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
                 <?php if($permission["Inventory Management"][157]["read"] == 1){?>
                <div class="col-sm-12">
                        <label class="control-label col-sm-4" style="text-align: right;">Amount :</label>
                        <div class="form-group col-sm-2">
                            <select name="amount" class="form-control input-sm">
                                <option value="Y">Yes</option>
                                <option value="N">No</option>                        
                            </select>
                        </div>
                    </div>
                    <?php } ?>
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
        var url = "<?=base_url()?>pr_report/get_stock_no_out/"+wh;
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
        var url = "<?=base_url()?>pr_report/get_mat_code_by_stock_on_out/"+matname;
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
        var url = "<?=base_url()?>pr_report/get_wh_out/"+project_id;
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
