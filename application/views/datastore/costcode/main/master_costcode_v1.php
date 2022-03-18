<div class="container-fluid">
  <div class="content">
    <div class="panel panel-body">
      <div class="row">
        <a type="button"  href="<?php echo base_url(); ?>data_master/costcode_report" class="btn bg-warning" target="_blank"><i class="icon-upload4"></i> Export</a>
         <a type="button" data-toggle="modal" data-target="#import_cc" class="btn bg-success-400"><i class="icon-download4" ></i> Import</a>
      </div>

     <div id="import_cc" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Import Cost Code <code>(.xls)</code></h5>
            </div>
            <div class="modal-body">
              <?php $this->load->helper('form'); ?>
              <?php echo form_open_multipart('import_boq/import_costcode');?>
              <div class="form-group">
                <!-- <label class="col-lg-2 control-label text-semibold">Templates modification:</label> -->
                <div class="col-lg-12">
                  <input type="file" class="file-input-advanced"  id="file_upload" name="userfile">
                  <span class="help-block">Support File <code>.xls</code> Only.</span>
                </div>
              </div>
              <button type="submit" id="upload_boq" class="btn btn-primary btn-sm" >Upload</button>
              <!-- <input type="button" id="upload_boq" class="btn btn-primary btn-sm" value="Upload" /> -->
              <?php echo form_close();?>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
              <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4 form-control">
          <label>
            <?php
            if ($subcost) {
            foreach ($subcost as $key ) {
            $chke = $key->cost_status;
            } ?>
            <input type="checkbox" id="chk" checked="checked">
            <?php  }else{
            $chke = "N"; ?>
            <input type="checkbox" id="chk">
            <?php } ?>
            <input type="hidden" id="chkvat" value="<?php echo $chke; ?>" name="chkvat">
            Control Header Budget
          </label>
        </div>
      </div>
      <div class="row">
        <br>
        <div class="col-md-4">
          <ul class="icons-list">
            <li><button type="button" data-toggle="modal" data-target="#newmatone" class="newmatone label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add TYPE</button></li>
            <li><button type="button" data-toggle="modal" data-target="#editmatone" class="newmatone label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit TYPE</button></li>
            <li><button type="button" id="dmattype" class="newmatone label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect TYPE</button></li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="icons-list">
            <li><button type="button" data-toggle="modal" data-target="#newmattwo" class="newmattwo label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add GROUP</button></li>
            <li><button type="button" data-toggle="modal" data-target="#emattwo" class="newmattwo label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit GROUP</button></li></li>
            <li><button type="button" id="dmattwo" class="newmattwo label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect GROUP</button></li>
          </ul>
        </div>
        <div class="col-md-4">
          <div class="icons-list">
            <li><button type="button" data-toggle="modal" data-target="#newmattree" class="newmattree label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add SUB GROUP</button></li>
            <li><button type="button" data-toggle="modal" data-target="#emattree" class="newmattree label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit SUB GROUP</button></li>
            <li><button type="button" id="dmattree" class="newmattree label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect SUB GROUP</button></li>
          </div>
        </div>
      </div>
    </div>

    <div class="panel panel-body">
      <div id="tabcost1" class="col-xs-4">
        <h4>Costcode 1</h4>
        <input type="text" class="form-control input-sm" id="a" placeholder="ค้นหาโดยรหัส">
        <p></p>
        <select multiple class="form-control" id="cost1" style="height:500px;">
        </select>
      </div>
      <div id="tabcost2" class="col-xs-4">
        <h4>Costcode 2</h4>
        <input type="text" class="form-control input-sm" id="b" placeholder="ค้นหาโดยรหัส">
        <p></p>
      <select multiple class="form-control" id="cost2" style="height:500px;"></select>
    </div>
    <div id="tabcost3" class="col-xs-4">
      <h4>Costcode 3</h4>
      <input type="text" class="form-control input-sm" id="cost3s" placeholder="ค้นหาโดยรหัส">
      <p></p>
      <select multiple class="form-control" id="cost3" style="height:500px;">
      </select>
    </div>
  </div>
   <div class="panel panel-body">
    <div class="col-md-4">
          <div class="icons-list">
            <li><button type="button" data-toggle="modal" data-target="#" class="cost4 label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add SUB GROUP</button></li>
            <li><button type="button" data-toggle="modal" data-target="#" class="cost4 label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit SUB GROUP</button></li>
            <li><button type="button" id="dmattree" class="cost4 label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect SUB GROUP</button></li>
          </div>
        </div>
        <div class="col-md-4">
          <div class="icons-list">
            <li><button type="button" data-toggle="modal" data-target="#" class="cost5 label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add SUB GROUP</button></li>
            <li><button type="button" data-toggle="modal" data-target="#" class="cost5 label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit SUB GROUP</button></li>
            <li><button type="button" id="dmattree" class="cost5 label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect SUB GROUP</button></li>
          </div>
        </div>
    </div>
  <div class="panel panel-body">
    <div id="tabcost4" class="col-xs-4">
      <h4>Costcode 4</h4>
      <input type="text" class="form-control input-sm" id="cost4s" placeholder="ค้นหาโดยรหัส">
      <p></p>
      <select multiple class="form-control" id="cost4" style="height:500px;">
      </select>
    </div>
    <div id="tabcost5" class="col-xs-4">
      <h4>Costcode 5</h4>
      <input type="text" class="form-control input-sm" id="cost5s" placeholder="ค้นหาโดยรหัส">
      <p></p>
      <select multiple class="form-control" id="cost5" style="height:500px;">
      </select>
    </div>
    <div id="cost-control" class="col-xs-4">
     
      <div class="row" style="margin-top:10px;">
        <div class="col-xs-4">
          <b><label>Cost Code</label></b>
          <p></p>
          <input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext" style="width: 300px;">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="newmatone" >
<div class="modal-dialog modal-lg">
  <div class="modal-content bg-teal-300">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Add Type</h4>
    </div>
    <div class="modal-body">
      <div class="panel-body">
        <div class="row">
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="typecode">Type Code</label>
                <input type="text" id="type_code" placeholder="กรอกรหัสประเภท"  class="form-control">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="typename">Type Name</label>
                <input type="text" id="type_name" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="text-right">
            <a id="savetype" data-dismiss="modal" class="btn bg-teal-600">ยืนยันการAddข้อมูล</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div> <!--end modal -->
<script>
$("#chk").click(function(){
if ($("#chk").prop("checked")) {
$("#chkvat").val("Y");
}else{
$("#chkvat").val("N");
}
var url="<?php echo base_url(); ?>datastore_active/update_showheader";
var dataSet={
chkvat:  $('#chkvat').val()
};
$.post(url,dataSet,function(data){
// alert(data);
swal({
title: "Save Completed!!.",
text: "",
confirmButtonColor: "#66BB6A",
type: "success"
});
});
});


$('#savetype').click(function(){
var url="<?php echo base_url(); ?>datastore_active/addcosttype_new";
var dataSet={
type_code:  $('#type_code').val(),
type_name:  $('#type_name').val()
};
$.post(url,dataSet,function(data){
var json =jQuery.parseJSON(data);
if (json.status = true) {
swal({
title: "Save Completed!!.",
text: "",
confirmButtonColor: "#66BB6A",
type: "success"
});
$('#cost1').load('<?php echo base_url('materialcode/get_cost_type');?>');
$("#type_code").val('');
$("#type_name").val('');

}else{
console.log(json.message);
}

});
});
</script>
<div class="modal fade" id="editmatone" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-teal-300">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editหมวด </h4>
      </div>
      <div class="modal-body">
        <div class="panel-body">
          <div class="row">
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="typecode">Type Code</label>
                  <input type="text" id="emattype_code" readonly placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="typename">Type Name</label>
                  <input type="text" id="emattype_name" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="text-right">
              <a id="esavetype" data-dismiss="modal" class="btn bg-teal-600">ยืนยันการAddข้อมูล</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div> <!--end modal -->
  <script>
  $('#esavetype').click(function(){
  var url="<?php echo base_url(); ?>datastore/editctype";
  var dataSet={
  typecode:  $('#emattype_code').val(),
  typename:  $('#emattype_name').val()
  };
  $.post(url,dataSet,function(data){
  // alert(data);
  swal({
  title: "Change Completed!!.",
  text: "",
  confirmButtonColor: "#66BB6A",
  type: "success"
  });
  $('#cost1').load('<?php echo base_url('materialcode/get_cost_type');?>');
  });
  });
  $('#dmattype').click(function(){
  var url="<?php echo base_url(); ?>datastore/delctype";
  var dataSet={
  typecode:  $('#emattype_code').val(),
  typename:  $('#emattype_name').val()
  };
  $.post(url,dataSet,function(data){
  // alert(data);
  swal({
  title: "Are you sure?",
  text: "Delete Completed!!.",
  confirmButtonColor: "#ff0000",
  type: "error",
  });
  $('#cost1').load('<?php echo base_url('materialcode/get_cost_type');?>');
  $('#cost2').html('');
  });
  });
  </script>
  <div class="modal fade" id="newmattwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-teal-300">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add GROUP</h4>
        </div>
        <div class="modal-body">
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="typecode">Group Code</label>
                  <input type="text" id="group_code" placeholder=""  class="form-control">
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="typename">Group Name</label>
                  <input type="text" id="group_name" placeholder="" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="text-right">
                <input type="hidden" class="form-control" id="mattypecode">
                <button id="savegroup" data-dismiss="modal" class="btn bg-teal-600">ยืนยันการAddข้อมูล</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div> <!--end modal -->
    <script>
    $('#savegroup').click(function(){
    var url="<?php echo base_url(); ?>datastore/addcgroup";
    var dataSet={
    mattypecode: $('#mattypecode').val(),
    matgroupcode:  $('#group_code').val(),
    matgroupname:  $('#group_name').val()
    };
    $.post(url,dataSet,function(data){
    // alert(data);
    swal({
    title: "Save Completed!!.",
    text: "",
    confirmButtonColor: "#66BB6A",
    type: "success"
    });
    $('#cost2').load('<?php echo base_url('materialcode/get_cost_group/');?>'+'/'+$("#emattype_code").val());
    $('#group_code').val(''),
    $('#group_name').val('')
    });
    });
    </script>
    </script>
    <!-- modal  ชือวัสดุ-->
    <div class="modal fade" id="emattwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content bg-teal-300">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit GROUP</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="typecode">Group Code</label>
                    <input type="text" id="ematgroup_code" readonly placeholder=""  class="form-control">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="typename">Group Name</label>
                    <input type="text" id="ematgroup_name" placeholder="" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="text-right">
                  <input type="hidden" class="form-control" id="emattypecode">
                  <button id="esavegroup" data-dismiss="modal" class="btn bg-teal-600">ยืนยันการAddข้อมูล</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div> <!--end modal -->
      <script>
      $('#esavegroup').click(function(){
      var url="<?php echo base_url(); ?>datastore/editcgroup";
      var dataSet={
      mattypecode: $('#emattypecode').val(),
      matgroupcode:  $('#ematgroup_code').val(),
      matgroupname:  $('#ematgroup_name').val()
      };
      $.post(url,dataSet,function(data){
      // alert(data);
      swal({
      title: "Save Completed!!.",
      text: data,
      confirmButtonColor: "#66BB6A",
      type: "success"
      });
      $('#cost2').load('<?php echo base_url('materialcode/get_cost_group/');?>'+'/'+$("#emattypecode").val());
      });
      });
      $("#dmattwo").click(function(){
      var url="<?php echo base_url(); ?>datastore/delcgroup";
      var dataSet={
      mattypecode: $('#emattypecode').val(),
      matgroupcode:  $('#ematgroup_code').val(),
      matgroupname:  $('#ematgroup_name').val()
      };
      $.post(url,dataSet,function(data){
      // alert(data);
      swal({
      title: "Are you sure?",
      text: "Delete Completed!!.",
      confirmButtonColor: "#ff0000",
      type: "error",
      });
      $('#cost2').load('<?php echo base_url('materialcode/get_cost_group/');?>'+'/'+$("#emattypecode").val());
      $('#cost3').html('');
      });
      });
      </script>
      <!-- modal  ขนาดวัสดุ-->
      <div class="modal fade" id="newmattree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content  bg-teal-300">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add SUBGROUP</h4>
            </div>
            <div class="modal-body">
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="typecode">SubGroup Code</label>
                      <input type="text" id="matsubgroup_code" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="typename">SubGroup Name</label>
                      <input type="text" id="matsubgroup_name" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Type</label>
                      <select class="form-control" name="subtype" id="subtype">
                        <option value="H">HEADER</option>
                        <option value="D">DETAIL</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="text-right">
                    <input type="hidden" class="form-control" id="mattypecodetree">
                    <input type="hidden" class="form-control" id="matgroupcodetree">
                    <button id="savesubgroup" data-dismiss="modal" class="btn  bg-teal-600">ยืนยันการAddข้อมูล</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div> <!--end modal -->
        <script>
        $('#savesubgroup').click(function(){
        var url="<?php echo base_url(); ?>datastore/addcsubgroup";
        var dataSet={
        mattypecode: $('#mattypecodetree').val(),
        matgroupcode:  $('#matgroupcodetree').val(),
        matsubgroupcode:  $('#matsubgroup_code').val(),
        matsubgroupname:  $('#matsubgroup_name').val(),
        type: $("#subtype").val(),
        };
        $.post(url,dataSet,function(data){
        // alert(data);
        swal({
        title: "Save Completed!!.",
        text: data,
        confirmButtonColor: "#66BB6A",
        type: "success"
        });
        $('#cost3').load('<?php echo base_url('materialcode/get_cost_subgroup/');?>'+'/'+$("#mattypecodetree").val()+'/'+$("#matgroupcodetree").val());
        $("#matsubgroup_code").val('');
        $("#matsubgroup_name").val('');
        });
        });
        </script>
        <div class="modal fade" id="emattree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content  bg-teal-300">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit SUBGROUP</h4>
              </div>
              <div class="modal-body">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="form-group">
                        <label for="typecode">SubGroup Code</label>
                        <input type="text" id="ematsubgroup_code" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="form-group">
                        <label for="typename">SubGroup Name</label>
                        <input type="text" id="ematsubgroup_name" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="esubtype" id="esubtype">
                          <option value="H">HEADER</option>
                          <option value="D">DETAIL</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="text-right">
                      <input type="hidden" class="form-control" id="emattypecodetree">
                      <input type="hidden" class="form-control" id="ematgroupcodetree">
                      <button id="esavesubgroup" data-dismiss="modal" class="btn  bg-teal-600">ยืนยันการAddข้อมูล</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div> <!--end modal -->
          <script>
          $('#esavesubgroup').click(function(){
          var url="<?php echo base_url(); ?>datastore/editcsubgroup";
          var dataSet={
          mattypecode: $('#emattypecodetree').val(),
          matgroupcode:  $('#ematgroupcodetree').val(),
          matsubgroupcode:  $('#ematsubgroup_code').val(),
          matsubgroupname:  $('#ematsubgroup_name').val(),
          type: $("#esubtype").val(),
          };
          $.post(url,dataSet,function(data){
          // alert(data);
          swal({
          title: "Save Completed!!.",
          text: data,
          confirmButtonColor: "#66BB6A",
          type: "success"
          });
          $('#cost3').load('<?php echo base_url('materialcode/get_cost_subgroup/');?>'+'/'+$("#emattypecodetree").val()+'/'+$("#ematgroupcodetree").val());
          });
          });
          $("#dmattree").click(function(){
          var url="<?php echo base_url(); ?>datastore/delcsubgroup";
          var dataSet={
          mattypecode: $('#emattypecodetree').val(),
          matgroupcode:  $('#ematgroupcodetree').val(),
          matsubgroupcode:  $('#ematsubgroup_code').val(),
          matsubgroupname:  $('#ematsubgroup_name').val()
          };
          $.post(url,dataSet,function(data){
          // alert(data);
          swal({
          title: "Are you sure?",
          text: "Delete Completed!!.",
          confirmButtonColor: "#ff0000",
          type: "error",
          });
          $('#cost3').load('<?php echo base_url('materialcode/get_cost_subgroup/');?>'+'/'+$("#emattypecodetree").val()+'/'+$("#ematgroupcodetree").val());
          
          });
          });
          </script>
          <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
          <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
          <script>
          // $(document).ready(function() {
          $(".addboxpri").hide();
          $("#editpo").hide();
          $("#adddetail").hide();
          $(".print").hide();
          $('#newmatname').prop('disabled', true);
          // $("#taxv").val('0');
          $(".newmattwo").hide();
          $(".newmattree").hide();
          $(".cost4").hide();
          $(".cost5").hide();

          $("#a").prop('readonly',false);
          $("#b").prop('readonly',true);
          $("#cost3s").prop('readonly',true);
          $("#codeup").click(function(){});
          $("#gencodebtn").hide();
          $("#type2").hide();
          $("#type3").hide();
          $("#type4").hide();
          $("#type5").hide();
          $('#cost-control').show();
          
          $("#box6").hide();
          $('#gencode').on('hidden.bs.modal', function () {
          $("#type1").show();
          $("#type2").hide();
          $("#type3").hide();
          $("#type4").hide();
          $("#type5").hide();
          $("#gencodebtn").hide();
          });
          $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
          $( "#cost1" ).change(function() {  
          var c1 = $('#cost1').val();
          $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
          $("#tabcost2").show();
          
          $("#costcodetext").val(c1);
          $("#emattype_code").val(c1);
          $('#cost3').html('');
          $('#cost4').html('');
          $('#cost5').html('');
          $(".newmattwo").show();
          $(".newmattree").hide();
          $(".cost4").hide();
          $("#b").prop('readonly',false);
          $("#cost3s").prop('readonly',true);
          var url="<?php echo base_url(); ?>materialcode/getctypename"+'/'+c1;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          $("#emattype_name").val(data);
          $("#emattype_code").val(c1);
          $("#mattypecode").val(c1);
          });
          });


          $( "#cost2" ).change(function() {
          var c1 = $('#cost1').val();
          var c2 = $('#cost2').val();
          var c3 = $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
          $("#costcodetext").val(c1+c2);
          var url="<?php echo base_url(); ?>materialcode/getcgroupname"+'/'+c1+'/'+c2;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          $("#emattypecode").val(c1);
          $("#ematgroup_code").val(c2);
          $("#ematgroup_name").val(data);
          });
          
          $(".newmattree").show();
          $(".cost4").hide();
          $(".cost5").hide();
          $('#cost4').html('');
          $('#cost5').html('');
          $("#b").prop('readonly',false);
          $("#cost3s").prop('readonly',false);
          $("#mattypecodetree").val(c1);
          $("#matgroupcodetree").val(c2);
          
          });

          $( "#cost3").change(function() {
          var c1 = $('#cost1').val();
          var c2 = $('#cost2').val();
          var c3 = $('#cost3').val();
          var c4 = $('#cost4').load('<?php echo base_url('materialcode/get_cost_subgroup_cost4/');?>'+'/'+$("#cost1").val()+'/'+$("#cost2").val()+'/'+$("#cost3").val());

          $("#costcodetext").val(c1+c2+c3);
          $("#cost-control").show();
          $(".cost4").show();
          $(".cost5").hide();
          $('#cost5').html('');
          $("#cost3s").prop('readonly',false);
          $("#mattypecodetree").val(c1);
          $("#matgroupcodetree").val(c2);
          $("#emattypecodetree").val(c1);
          $("#ematgroupcodetree").val(c2);
          $("#ematsubgroup_code").val(c3);
          var url="<?php echo base_url(); ?>materialcode/getcsubgroupname"+'/'+c1+'/'+c2+'/'+c3;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          $("#ematsubgroup_name").val(data);
          });
          });

          $( "#cost4").change(function() {
          var c1 = $('#cost1').val();
          var c2 = $('#cost2').val();
          var c3 = $('#cost3').val();
          var c4 = $('#cost4').val();
          var c5 = $('#cost5').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost5/');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+c4);

          $("#costcodetext").val(c1+c2+c3+c4);
          $("#cost-control").show();
          $("#cost3s").prop('readonly',false);
          $(".cost5").show();
          $("#mattypecodetree").val(c1);
          $("#matgroupcodetree").val(c2);
          $("#emattypecodetree").val(c1);
          $("#ematgroupcodetree").val(c2);
          $("#ematsubgroup_code").val(c3);
          var url="<?php echo base_url(); ?>materialcode/getcsubgroupname"+'/'+c1+'/'+c2+'/'+c3;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          $("#ematsubgroup_name").val(data);
          });
          });


          $( "#cost5").change(function() {
          var c1 = $('#cost1').val();
          var c2 = $('#cost2').val();
          var c3 = $('#cost3').val();
          var c4 = $('#cost4').val();
          var c5 = $('#cost5').val();

          $("#costcodetext").val(c1+c2+c3+c4+c5);
          $("#cost-control").show();
          $("#cost3s").prop('readonly',false);
          $("#mattypecodetree").val(c1);
          $("#matgroupcodetree").val(c2);
          $("#emattypecodetree").val(c1);
          $("#ematgroupcodetree").val(c2);
          $("#ematsubgroup_code").val(c3);
          var url="<?php echo base_url(); ?>materialcode/getcsubgroupname"+'/'+c1+'/'+c2+'/'+c3;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          $("#ematsubgroup_name").val(data);
          });
          });


          $("#btncostup").click(function(){
          var c1 = $('#cost1').val();
          var c2 = $('#cost2').val();
          var c3 = $('#cost3').val();
          var c4 = $('#cost4').val();
          var url="<?php echo base_url(); ?>costcode/getcostcode"+'/'+c1+'/'+c2+'/'+c3;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          var gcostcode = data;
          var codecostcode = c1+''+c2+''+c3;
          $('#vcostcode').val(codecostcode);
          $('#list').val(gcostcode);
          $('#gcostcode').html(gcostcode);
          $('#costcode').modal('hide');
          $("#tabcost4").hide();
          $("#costnameint").val(gcostcode);
          $("#codecostcodeint").val(codecostcode);
          $("#costname").val(gcostcode);
          $("#codecostcode").val(codecostcode);
          $("#costname").val(gcostcode);
          $("#codecostcode").val(codecostcode);
          $('#lo_costname').val(gcostcode);
          $('#lo_costcode').val(codecostcode);
          });
          
          
          });
          $("#a").keyup(function(){
          $("#cost1").load('<?php echo base_url('materialcode/getctype_where'); ?>'+'/'+$("#a").val());
          });
          $("#b").keyup(function(){
          var c1 = $('#cost1').val();
          $("#cost2").load('<?php echo base_url('materialcode/getcsubgroup_where'); ?>'+'/'+c1+'/'+$("#b").val());
          });
          $("#cost3s").keyup(function(event) {
          var b1 = $('#cost3s').val();
          var c1 = $('#cost1').val();
          var c2 = $('#cost2').val();
          
          $("#cost3").load('<?php echo base_url('materialcode/getcostcode3_where');?>'+'/'+c1+'/'+c2+'/'+b1);
          });

          $("#cost4s").keyup(function(event) {
          var b1 = $('#cost4s').val();
          var c1 = $('#cost1').val();
          var c2 = $('#cost2').val();
          var c3 = $('#cost3').val();
          
          $("#cost4").load('<?php echo base_url('materialcode/getcostcode4_where');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+b1);
          });


          $("#cost5s").keyup(function(event) {
          var b1 = $('#cost5s').val();
          var c1 = $('#cost1').val();
          var c2 = $('#cost2').val();
          var c3 = $('#cost3').val();
          var c4 = $('#cost4').val();

          $("#cost5").load('<?php echo base_url('materialcode/getcostcode5_where');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+c4+'/'+b1);
          });


          // });
  $('#mcc').attr('class', 'active');
  $('#mcc1').attr('style', 'background-color:#dedbd8');
          </script>