<div class="page-container">
		<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-body">
      <div class="row">
          <div class="col-md-9">
              <a type="button"  href="<?php echo base_url(); ?>data_master/costcode_report" class="btn bg-warning" target="_blank"><i class="icon-upload4"></i> Export</a>
         <a type="button" data-toggle="modal" data-target="#import_cc" class="btn bg-success-400"><i class="icon-download4" ></i> Import</a>
          </div>
          <div class="col-md-3" style="text-align: right;">
            <!-- <button type="button" data-toggle="modal" data-target="#newmatone" class="newmatone btn btn-primary " ><i class="icon-plus-circle2"></i> ADD COSTCODE</button> -->
            <a data-toggle="modal" id="inst" class="btn btn-primary"><i class="icon-stackoverflow"></i> NEW COSTCODE</a>
            <?php if (isset($newback)!="") {?>
              <a href="<?php echo base_url(); ?>data_master/main" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2" aria-hidden="true"></i> Close</a>
              <?php }else {?>
                <a href="<?php echo base_url(); ?>data_master" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2" aria-hidden="true"></i> Close</a>
            <?php }?>
          </div>

         
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
        <div class="col-md-4">
          <H3>
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
          </H3>
        </div>
      </div>


    <div class="panel panel-body">
    <?php if ($flagcostcode[0]['costlevel']=="1") {?>
      <div id="tabcost1" class="col-xs-4">
        <h4>Cost Type 1</h4>
        <div class="form-group" id="costadd1">
          <button data-toggle="modal" data-target="#addcosttype" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcosttype" class="label label-info">Edit</button>
          <button id="deletecosttype" class="label label-danger">Delete</button>
        </div>
        <input type="text" class="form-control input-sm" id="a" placeholder="">
        <p></p>
        <select multiple class="form-control" id="cost1" style="height:500px;">
        </select>
      </div>
    <?php }elseif($flagcostcode[0]['costlevel']=="2"){ ?>
      <div id="tabcost1" class="col-xs-4">
        <h4>Cost Type 1</h4>
        <div class="form-group" id="costadd1">
          <button data-toggle="modal" data-target="#addcosttype" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcosttype" class="label label-info">Edit</button>
          <button id="deletecosttype" class="label label-danger">Delete</button>
        </div>
        <input type="text" class="form-control input-sm" id="a" placeholder="">
        <p></p>
        <select multiple class="form-control" id="cost1" style="height:500px;">
        </select>
      </div>
      <div id="tabcost2" class="col-xs-4">
        <h4>Cost Group 2</h4>
        <div class="form-group" id="costadd2">
          <button data-toggle="modal" data-target="#addcostgroup" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcostgroup" class="label label-info">Edit</button>
          <button id="deletecostgroup" class="label label-danger">Delete</button>
        </div>
        <input type="text" class="form-control input-sm" id="b" placeholder="">
        <p></p>
        <select multiple class="form-control" id="cost2" style="height:500px;"></select>
      </div>
    <?php }elseif($flagcostcode[0]['costlevel']=="3"){ ?>
      <div id="tabcost1" class="col-xs-4">
        <h4>Cost Type 1</h4>
        <div class="form-group" id="costadd1">
          <button data-toggle="modal" data-target="#addcosttype" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcosttype" class="label label-info">Edit</button>
          <button id="deletecosttype" class="label label-danger">Delete</button>
        </div>
        <input type="text" class="form-control input-sm" id="a" placeholder="">
        <p></p>
        <select multiple class="form-control" id="cost1" style="height:500px;">
        </select>
      </div>
      <div id="tabcost2" class="col-xs-4">
        <h4>Cost Group 2</h4>
        <div class="form-group" id="costadd2">
          <button data-toggle="modal" data-target="#addcostgroup" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcostgroup" class="label label-info">Edit</button>
          <button id="deletecostgroup" class="label label-danger">Delete</button>
        </div>
        <input type="text" class="form-control input-sm" id="b" placeholder="">
        <p></p>
        <select multiple class="form-control" id="cost2" style="height:500px;"></select>
      </div>
      <div id="tabcost3" class="col-xs-4">
        <h4>CostSub Group 3</h4>
        <div class="form-group" id="costadd3">
            <button data-toggle="modal" data-target="#addcostsubgroup" class="label label-primary">Add</button>
            <button data-toggle="modal" data-target="#editcostsubgroup" class="label label-info">Edit</button>
            <button id="deletecostsubgroup" class="label label-danger">Delete</button>
          </div>
        <input type="text" class="form-control input-sm" id="cost3s" placeholder="">
        <p></p>
        <select multiple class="form-control" id="cost3" style="height:500px;">
        </select>
      </div>
    <?php } ?>
  </div>
   <!-- <div class="panel panel-body">
    <div class="col-md-4">
          <div class="icons-list">
           
          </div>
        </div>
        <div class="col-md-4">
          <div class="icons-list">
           
          </div>
        </div>
    </div> -->
  <div class="panel panel-body">
  <?php if($flagcostcode[0]['costlevel']=="4"){?>
    <div id="tabcost1" class="col-xs-4">
      <h4>Cost Type 1</h4>
      <div class="form-group" id="costadd1">
        <button data-toggle="modal" data-target="#addcosttype" class="label label-primary">Add</button>
        <button data-toggle="modal" data-target="#editcosttype" class="label label-info">Edit</button>
        <button id="deletecosttype" class="label label-danger">Delete</button>
      </div>
      <input type="text" class="form-control input-sm" id="a" placeholder="">
      <p></p>
      <select multiple class="form-control" id="cost1" style="height:500px;">
      </select>
    </div>
    <div id="tabcost2" class="col-xs-4">
      <h4>Cost Group 2</h4>
      <div class="form-group" id="costadd2">
        <button data-toggle="modal" data-target="#addcostgroup" class="label label-primary">Add</button>
        <button data-toggle="modal" data-target="#editcostgroup" class="label label-info">Edit</button>
        <button id="deletecostgroup" class="label label-danger">Delete</button>
      </div>
      <input type="text" class="form-control input-sm" id="b" placeholder="">
      <p></p>
      <select multiple class="form-control" id="cost2" style="height:500px;"></select>
    </div>
    <div id="tabcost3" class="col-xs-4">
      <h4>CostSub Group 3</h4>
      <div class="form-group" id="costadd3">
          <button data-toggle="modal" data-target="#addcostsubgroup" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcostsubgroup" class="label label-info">Edit</button>
          <button id="deletecostsubgroup" class="label label-danger">Delete</button>
        </div>
      <input type="text" class="form-control input-sm" id="cost3s" placeholder="">
      <p></p>
      <select multiple class="form-control" id="cost3" style="height:500px;">
      </select>
    </div>
    <div id="tabcost4" class="col-xs-4">
      <h4>Cost Spec 4</h4>
      <div class="form-group" id="costadd4">
          <button data-toggle="modal" data-target="#addcostspec" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcostspec" class="label label-info">Edit</button>
          <button id="deletecostspec" class="label label-danger">Delete</button>
        </div>
      <input type="text" class="form-control input-sm" id="cost4s" placeholder="">
      <p></p>
      <select multiple class="form-control" id="cost4" style="height:500px;">
      </select>
    </div>
  <?php }elseif($flagcostcode[0]['costlevel']=="5"){?>  
    <div id="tabcost1" class="col-xs-4">
      <h4>Cost Type 1</h4>
      <div class="form-group" id="costadd1">
        <button data-toggle="modal" data-target="#addcosttype" class="label label-primary">Add</button>
        <button data-toggle="modal" data-target="#editcosttype" class="label label-info">Edit</button>
        <button id="deletecosttype" class="label label-danger">Delete</button>
      </div>
      <input type="text" class="form-control input-sm" id="a" placeholder="">
      <p></p>
      <select multiple class="form-control" id="cost1" style="height:500px;">
      </select>
    </div>
    <div id="tabcost2" class="col-xs-4">
      <h4>Cost Group 2</h4>
      <div class="form-group" id="costadd2">
        <button data-toggle="modal" data-target="#addcostgroup" class="label label-primary">Add</button>
        <button data-toggle="modal" data-target="#editcostgroup" class="label label-info">Edit</button>
        <button id="deletecostgroup" class="label label-danger">Delete</button>
      </div>
      <input type="text" class="form-control input-sm" id="b" placeholder="">
      <p></p>
      <select multiple class="form-control" id="cost2" style="height:500px;"></select>
    </div>
    <div id="tabcost3" class="col-xs-4">
      <h4>CostSub Group 3</h4>
      <div class="form-group" id="costadd3">
          <button data-toggle="modal" data-target="#addcostsubgroup" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcostsubgroup" class="label label-info">Edit</button>
          <button id="deletecostsubgroup" class="label label-danger">Delete</button>
        </div>
      <input type="text" class="form-control input-sm" id="cost3s" placeholder="">
      <p></p>
      <select multiple class="form-control" id="cost3" style="height:500px;">
      </select>
    </div>
    <div id="tabcost4" class="col-xs-4">
      <h4>Cost Spec 4</h4>
      <div class="form-group" id="costadd4">
          <button data-toggle="modal" data-target="#addcostspec" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcostspec" class="label label-info">Edit</button>
          <button id="deletecostspec" class="label label-danger">Delete</button>
        </div>
      <input type="text" class="form-control input-sm" id="cost4s" placeholder="">
      <p></p>
      <select multiple class="form-control" id="cost4" style="height:500px;">
      </select>
    </div>
    <div id="tabcost5" class="col-xs-4">
      <h4>Cost brand  5</h4>
      <div class="form-group" id="costadd5">
          <button data-toggle="modal" data-target="#addcostbrand" class="label label-primary">Add</button>
          <button data-toggle="modal" data-target="#editcostbrand" class="label label-info">Edit</button>
          <button id="deletecostbrand" class="label label-danger">Delete</button>
        </div>
      <input type="text" class="form-control input-sm" id="cost5s" placeholder="">
      <p></p>
      <select multiple class="form-control" id="cost5" style="height:500px;">
      </select>
    </div>
  <?php } ?>
    <div id="cost-control" class="col-xs-4">
     
      <div class="row">
        <div class="col-xs-4">
          <!-- <b><label>Cost Code</label></b>
          <p></p> -->
          <h4>Cost Code</h4>
          <input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext" style="width: 300px;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <br>
          <a type="button" class="btn bg-primary editcost"><i class="icon-download4" ></i> Edit Costcode</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<!-- modal  Add type-->
<div class="modal fade" id="addcosttype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Cost Type</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Type Code</label>
                    <input type="text" id="typecode" placeholder="กรอกรหัสประเภท เช่น A"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Type Name</label>
                    <input type="text" id="typename" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="savetypecost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#savetypecost").click(function(){
    var url="<?php echo base_url(); ?>datastore_active/addctypecode";
    var dataSet={
        typecode: $('#typecode').val(),
        typename: $('#typename').val(),

        };
    $.post(url,dataSet,function(data){
      $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    });
  });
</script>
<!-- modal  edit type-->
<div class="modal fade" id="editcosttype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Cost Type</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Type Code</label>
                    <input type="text" id="edittypecode"  class="form-control" readonly="true">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Type Name</label>
                    <input type="text" id="edittypename" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="saveedittypecost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#saveedittypecost").click(function(){
    var url="<?php echo base_url(); ?>datastore_active/editctypecode";
    var dataSet={
        typecode: $('#edittypecode').val(),
        typename: $('#edittypename').val(),

        };
    $.post(url,dataSet,function(data){
      $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    });
  });
  $("#deletecosttype").click(function(){
    var url="<?php echo base_url(); ?>datastore_active/deletecosttype";
    var dataSet={
        typecode: $('#edittypecode').val()
        };
    $.post(url,dataSet,function(data){
      $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    });
  });
</script>

<!-- modal  Add group-->
<div class="modal fade" id="addcostgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Cost Group</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Group Code</label>
                    <input type="text" id="groupcode" placeholder="กรอกรหัสประเภท เช่น A"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Group Name</label>
                    <input type="text" id="groupname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="savegroupcost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#savegroupcost").click(function(){
    var c1 = $("#edittypecode").val();
    var url="<?php echo base_url(); ?>datastore_active/addcgroupcode";
    var dataSet={
      typecode: $('#edittypecode').val(),
      typename: $('#edittypename').val(),
      groupcode: $('#groupcode').val(),
      groupname: $('#groupname').val(),

        };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
      $('#groupcode').val("");
      $('#groupname').val("");
    });
  });
</script>
<!-- modal  edit group-->
<div class="modal fade" id="editcostgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Cost Group</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Type Code</label>
                    <input type="text" id="editgroupcode"  class="form-control" readonly="true">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Type Name</label>
                    <input type="text" id="editgroupname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="saveeditgroupcost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#saveeditgroupcost").click(function(){
    
    var c1 = $("#edittypecode").val();
    var url="<?php echo base_url(); ?>datastore_active/editcgroupcode";
    var dataSet={
      typecode: $('#edittypecode').val(),
      groupcode: $('#editgroupcode').val(),
      groupname: $('#editgroupname').val(),

      };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
    });
  });
  $("#deletecostgroup").click(function(){
    var c1 = $("#edittypecode").val();
    var url="<?php echo base_url(); ?>datastore_active/deletecostgroup";
    var dataSet={
      typecode: $('#edittypecode').val(),
      groupcode: $('#editgroupcode').val()
    };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
    });
  });
</script>


<!-- modal  Add Subgroup-->
<div class="modal fade" id="addcostsubgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Cost Subgroup</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Subgroup Code</label>
                    <input type="text" id="subgroupcode" placeholder="กรอกรหัสประเภท เช่น A"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Subgroup Name</label>
                    <input type="text" id="subgroupname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="savesubgroupcost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#savesubgroupcost").click(function(){
    var c1 = $("#edittypecode").val();
    var c2 = $('#editgroupcode').val();
    var url="<?php echo base_url(); ?>datastore_active/addcsubgroupcode";
    var dataSet={
      typecode: $('#edittypecode').val(),
      typename: $('#edittypename').val(),
      groupcode: $('#editgroupcode').val(),
      groupname: $('#editgroupname').val(),
      subgroupcode: $("#subgroupcode").val(),
      subgroupname: $("#subgroupname").val()

    };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
      $('#subgroupcode').val("");
      $('#subgroupname').val("");
    });
  });
</script>
<!-- modal  edit Subgroup-->
<div class="modal fade" id="editcostsubgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Cost Subgroup</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Subgroup Code</label>
                    <input type="text" id="editsubgroupcode"  class="form-control" readonly="true">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Subgroup Name</label>
                    <input type="text" id="editsubgroupname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="saveeditsubgroupcost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#saveeditsubgroupcost").click(function(){
    
    var c1 = $("#edittypecode").val();
    var c2 = $('#editgroupcode').val();
    var url="<?php echo base_url(); ?>datastore_active/editcsubgroupcode";
    var dataSet={
      typecode: $('#edittypecode').val(),
      typename: $('#edittypename').val(),
      groupcode: $('#editgroupcode').val(),
      groupname: $('#editgroupname').val(),
      subgroupcode: $("#editsubgroupcode").val(),
      subgroupname: $("#editsubgroupname").val()
      };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
    });
  });
  $("#deletecostsubgroup").click(function(){
    var c1 = $("#edittypecode").val();
    var c2 = $('#editgroupcode').val();
    var url="<?php echo base_url(); ?>datastore_active/deletecostsubgroup";
    var dataSet={
      typecode: $('#edittypecode').val(),
      groupcode: $('#editgroupcode').val(),
      subgroupcode: $("#editsubgroupcode").val(),
    };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
    });
  });
</script>

<!-- modal  Add spec-->
<div class="modal fade" id="addcostspec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Cost Spec</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Spec Code</label>
                    <input type="text" id="speccode" placeholder="กรอกรหัสประเภท เช่น A"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Spec Name</label>
                    <input type="text" id="specname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="savespeccost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#savespeccost").click(function(){
    var c1 = $("#edittypecode").val();
    var c2 = $('#editgroupcode').val();
    var c3 = $("#editsubgroupcode").val();
    var url="<?php echo base_url(); ?>datastore_active/addcspeccode";
    var dataSet={
      typecode: $('#edittypecode').val(),
      typename: $('#edittypename').val(),
      groupcode: $('#editgroupcode').val(),
      groupname: $('#editgroupname').val(),
      subgroupcode: $("#editsubgroupcode").val(),
      subgroupname: $("#editsubgroupname").val(),
      speccode: $("#speccode").val(),
      specname: $("#specname").val(),

    };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost4').load('<?php echo base_url('materialcode/get_cost_subgroup_cost4/');?>'+'/'+c1+'/'+c2+'/'+c3);
      $('#speccode').val("");
      $('#specname').val("");
    });
  });
</script>
<!-- modal  edit spec-->
<div class="modal fade" id="editcostspec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Cost Spec</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Spec Code</label>
                    <input type="text" id="editspeccode"  class="form-control" readonly="true">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Spec Name</label>
                    <input type="text" id="editspecname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="saveeditspeccost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#saveeditspeccost").click(function(){
    
    var c1 = $("#edittypecode").val();
    var c2 = $('#editgroupcode').val();
    var c3 = $("#editsubgroupcode").val();
    var url="<?php echo base_url(); ?>datastore_active/editcspeccode";
    var dataSet={
      typecode: $('#edittypecode').val(),
      typename: $('#edittypename').val(),
      groupcode: $('#editgroupcode').val(),
      groupname: $('#editgroupname').val(),
      subgroupcode: $("#editsubgroupcode").val(),
      subgroupname: $("#editsubgroupname").val(),
      speccode: $("#editspeccode").val(),
      specname: $("#editspecname").val()
      };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost4').load('<?php echo base_url('materialcode/get_cost_subgroup_cost4/');?>'+'/'+c1+'/'+c2+'/'+c3);
    });
  });
  $("#deletecostspec").click(function(){
    var c1 = $("#edittypecode").val();
    var c2 = $('#editgroupcode').val();
    var c3 = $("#editsubgroupcode").val();
    var url="<?php echo base_url(); ?>datastore_active/deletecostspec";
    var dataSet={
      typecode: $('#edittypecode').val(),
      groupcode: $('#editgroupcode').val(),
      subgroupcode: $("#editsubgroupcode").val(),
      speccode: $("#editspeccode").val(),
    };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost4').load('<?php echo base_url('materialcode/get_cost_subgroup_cost4/');?>'+'/'+c1+'/'+c2+'/'+c3);
    });
  });
</script>

<!-- modal  Add spec-->
<div class="modal fade" id="addcostbrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Cost Brand</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Brand Code</label>
                    <input type="text" id="brandcode" placeholder="กรอกรหัสประเภท เช่น A"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Spec Name</label>
                    <input type="text" id="brandname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="savebrandcost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#savebrandcost").click(function(){
    var c1 = $("#edittypecode").val();
    var c2 = $('#editgroupcode').val();
    var c3 = $("#editsubgroupcode").val();
    var c4 = $("#editspeccode").val();
    var url="<?php echo base_url(); ?>datastore_active/addcbrandcode";
    var dataSet={
      typecode: $('#edittypecode').val(),
      typename: $('#edittypename').val(),
      groupcode: $('#editgroupcode').val(),
      groupname: $('#editgroupname').val(),
      subgroupcode: $("#editsubgroupcode").val(),
      subgroupname: $("#editsubgroupname").val(),
      speccode: $("#editspeccode").val(),
      specname: $("#editspecname").val(),
      brandcode: $("#brandcode").val(),
      brandname: $("#brandname").val()

    };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost5').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost5/');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+c4);
      $('#brandcode').val("");
      $('#brandname').val("");
    });
  });
</script>
<!-- modal  edit spec-->
<div class="modal fade" id="editcostbrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Cost Brand</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecodel">Brand Code</label>
                    <input type="text" id="editbrandcode"  class="form-control" readonly="true">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typenamel">Brand Name</label>
                    <input type="text" id="editbrandname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                    <a id="saveeditbrandcost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $("#saveeditbrandcost").click(function(){
    
    var c1 = $("#edittypecode").val();
    var c2 = $('#editgroupcode').val();
    var c3 = $("#editsubgroupcode").val();
    var c4 = $("#editspeccode").val();
    var url="<?php echo base_url(); ?>datastore_active/editcbrandcode";
    var dataSet={
      typecode: $('#edittypecode').val(),
      typename: $('#edittypename').val(),
      groupcode: $('#editgroupcode').val(),
      groupname: $('#editgroupname').val(),
      subgroupcode: $("#editsubgroupcode").val(),
      subgroupname: $("#editsubgroupname").val(),
      speccode: $("#editspeccode").val(),
      specname: $("#editspecname").val(),
      brandcode: $("#editbrandcode").val(),
      brandname: $("#editbrandname").val()
      };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost5').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost5/');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+c4);
    });
  });
  $("#deletecostbrand").click(function(){
    var c1 = $("#edittypecode").val();
    var c2 = $('#editgroupcode').val();
    var c3 = $("#editsubgroupcode").val();
    var c4 = $("#editspeccode").val();
    var url="<?php echo base_url(); ?>datastore_active/deletecostbrand";
    var dataSet={
      typecode: $('#edittypecode').val(),
      groupcode: $('#editgroupcode').val(),
      subgroupcode: $("#editsubgroupcode").val(),
      speccode: $("#editspeccode").val(),
      brandcode: $("#editbrandcode").val(),
    };
    $.post(url,dataSet,function(data){
      console.log(data);
      $('#cost5').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost5/');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+c4);
    });
  });
</script>



<div class="modal fade" id="newmatone" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">NEW COSTCODE</h4>
      </div>
        <div class="modal-body">
          <div class="panel-body">
            <div class="row">
              <div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                    <div class="form-group">

                        <label class="display-block text-semibold"><input type="checkbox" checked id="chkk" class="styled">New Create Type</label>
                        <input type="hidden" id="create"  value="Y" name="create">
                      </div>
                  </div>
                </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label for="typecode">Type Code</label>
                      <input type="text" id="type_code" placeholder="Type Code"  class="form-control type_new" maxlength="2">
                      
                      <select class="form-control type_old" name="" id="costtype">
                        <option value=""></option>
                        <?php foreach ($costtype as $key => $type) {?>
                        <option value="<?php echo $type->ctype_code."-".$type->ctype_name; ?>"><?php echo $type->ctype_code."-".$type->ctype_name; ?></option>
                        <?php } ?>
                      </select>
                      <div id="show_type_code" class="form-group"></div>
                    </div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">Type Name</label>
                      <input type="text" id="type_name" placeholder="Type Name" class="form-control type_new">
                      <input type="hidden" id="type_code2" placeholder="Type Name" class="form-control">
                      <input type="text" id="type_name2" placeholder="Type Name" class="form-control type_old" readonly="">
                      <div id="show_type" class="form-group"></div>
                    </div>
                  </div>
                </div>

              <div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="display-block text-semibold"><input type="checkbox" checked id="chkgroup" class="styled">New Create Group</label>
                        <input type="hidden" id="textgroup"  value="Y" name="textgroup">
                      </div>
                  </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group">
                      <label for="typecode">Group Code</label>
                      <input type="text" id="group_code" placeholder="Group Code"  class="form-control group_new"  maxlength="2">
                      <select class="form-control group_old" name="" id="costgroup">
                        <option value=""></option>
                        <?php foreach ($costgroup as $key => $group) {?>
                        <option value="<?php echo $group->cgroup_code."-".$group->cgroup_name; ?>"><?php echo $group->cgroup_code."-".$group->cgroup_name; ?></option>
                        <?php } ?>
                      </select>
                      <div id="group_code_show" class="form-group"></div>
                    </div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">Group Name</label>
                      <input type="text" id="group_name" placeholder="Group Name" class="form-control group_new">
                      <input type="hidden" id="group_code2" placeholder="Group Name" class="form-control">
                      <input type="text" id="group_name2" placeholder="Group Name" class="form-control group_old" readonly="">
                      <div id="group_name_show" class="form-group"></div>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="display-block text-semibold"><input type="checkbox" checked id="chksubgroup" class="styled">New Create Sub Group</label>
                        <input type="hidden" id="textsubgroup"  value="Y" name="textsubgroup">
                      </div>
                  </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group">
                      <label for="typecode">Sub Group Code</label>
                      <input type="text" id="subgroup_code" placeholder="Sub Group Code"  class="form-control subgroup_new" maxlength="2">
                      <select class="form-control subgroup_old" name="" id="costsubgroup">
                        <option value=""></option>
                        <?php foreach ($costsubgroup as $key => $sub) {?>
                        <option value="<?php echo $sub->csubgroup_code."-".$sub->csubgroup_name; ?>"><?php echo $sub->csubgroup_code."-".$sub->csubgroup_name; ?></option>
                        <?php } ?>
                      </select>
                      <div id="subgroup_code_show" class="form-group"></div>
                    </div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">Sub Group Name</label>
                      <input type="text" id="subgroup_name" placeholder="Sub Group Name" class="form-control subgroup_new">
                      <input type="hidden" id="subgroup_code2" placeholder="Sub Group Name" class="form-control">
                      <input type="text" id="subgroup_name2" placeholder="Sub Group Name" class="form-control subgroup_old" readonly="">
                      <div id="subgroup_name_show" class="form-group"></div>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="display-block text-semibold"><input type="checkbox" checked id="chkspec" class="styled">New Create Spec Code</label>
                        <input type="hidden" id="textspec"  value="Y" name="textspec">
                      </div>
                  </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group">
                      <label for="typecode">Spec Code</label>
                      <input type="text" id="spec_code" placeholder="Spec Code"  class="form-control spec_new" maxlength="2">
                      <select class="form-control spec_old" name="" id="costspec">
                        <option value=""></option>
                        <?php foreach ($costspec as $key => $spec) {?>
                        <option value="<?php echo $spec->cgroup_code4."-".$spec->cgroup_name4; ?>"><?php echo $spec->cgroup_code4."-".$spec->cgroup_name4; ?></option>
                        <?php } ?>
                      </select>
                      <div id="spec_code_show" class="form-group"></div>
                    </div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">Spec Name</label>
                      <input type="text" id="spec_name" placeholder="Spec Name" class="form-control spec_new">
                      <input type="hidden" id="spec_code2" placeholder="Spec Name" class="form-control">
                      <input type="text" id="spec_name2" placeholder="Spec Name" class="form-control spec_old" readonly="">
                      <div id="spec_name_show" class="form-group"></div>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-xs-3">
                 
                </div>

                <div class="col-xs-3">
                    <div class="form-group">
                      <label for="typecode">Brand Code</label>
                      <input type="text" id="brand_code" placeholder="Brand Code"  class="form-control brand_new" maxlength="2">
                    </div>
                    <div id="brand_code_show"></div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">Brand Name</label>
                      <input type="text" id="brand_name" placeholder="Brand Name" class="form-control brand_new">
                      <div id="brand_name_show"></div>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-xs-3">
                 
                </div>
                <div class="col-xs-3">
                  <div class="form-group">
                    <label for="typecode">A/C Cost (Construction) </label>
                    <input type="text" readonly="readonly" class="form-control" readonly="readonly"" value="" name="accno" id="accno">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="typename">&nbsp;</label>
                    <div class="input-group">
                         <input type="text" class="form-control" readonly="readonly" value="" name="codename" id="codename">
                        <div class="input-group-btn">
                          <button type="button" data-toggle="modal" data-target="#construction" class="construction btn btn-info"><i class="icon-search4"></i></button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-3">
                 
                </div>
                <div class="col-xs-3">
                  <div class="form-group">
                    <label for="typecode">A/C Cost (Realestate)</label>
                    <input type="text" readonly="readonly" class="form-control" readonly="readonly" value="" name="accno2" id="accno2">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="typename">&nbsp;</label>
                    <div class="input-group">
                         <input type="text" class="form-control" readonly="readonly" value="" name="actname" id="codename2">
                        <div class="input-group-btn">
                          <button type="button" data-toggle="modal" data-target="#realestate" class="realestate btn btn-info"><i class="icon-search4"></i></button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <input type="text" class="form-control" id="ct" name="">
                  <input type="text" class="form-control" id="cg" name="">
                  <input type="text" class="form-control" id="cs" name="">
                  <input type="text" class="form-control" id="csp" name="">
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                      <label for="typecode">Type</label>
                      <select class="form-control" name="" id="typecost" name="typecost">
                        <option value="H">Header</option>
                        <option value="D">Detail</option>
                      </select>
                    </div>
                  </div>
              </div>

            </div>
            <div class="row">
              <div class="text-right">
                <!-- <a id="savetypecost" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a> -->

                <button type="button" id="addtorow" class="btn btn-primary"><i class="glyphicon glyphicon-ok"> Insert</i></button>
                <!-- <a type="button" id="close" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</a> -->
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<div class="modal fade" id="edit_costcode" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">EDIT COSTCODE</h4>
      </div>
        <div class="modal-body">
          <div class="panel-body">
            <div class="row">
              <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                    <div class="form-group">

                        <label class="display-block text-semibold"><input type="checkbox" checked id="chkk_upd" class="styled">New Create Type</label>
                        <input type="hidden" id="create_upd"  value="Y" name="create">
                      </div>
                  </div>
                </div>
                  <div class="col-xs-4 ">
                    <div class="form-group">
                      <label for="typecode">Type Code</label>
                      <input type="text" id="type_code_upd" placeholder="Type Code"  class="form-control type_new">
                      <select class="form-control type_old" name="" id="costtype_upd">
                        <option value=""></option>
                        <?php foreach ($costtype as $key => $type) {?>
                        <option value="<?php echo $type->ctype_code."-".$type->ctype_name; ?>"><?php echo $type->ctype_code."-".$type->ctype_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">Type Name</label>
                      <input type="text" id="type_name_upd" placeholder="Type Name" class="form-control type_new">
                      <input type="hidden" id="type_code2_upd" placeholder="Type Name" class="form-control">
                      <input type="text" id="type_name2_upd" placeholder="Type Name" class="form-control type_old" readonly="">
                    </div>
                  </div>
                </div>

              <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="display-block text-semibold"><input type="checkbox" checked id="chkgroup_upd" class="styled">New Create Group</label>
                        <input type="hidden" id="textgroup_upd"  value="Y" name="textgroup">
                      </div>
                  </div>
                </div>

                <div class="col-xs-4 ">
                    <div class="form-group">
                      <label for="typecode">Group Code</label>
                      <input type="text" id="group_code_upd" placeholder="Type Code"  class="form-control group_new">
                      <select class="form-control group_old" name="" id="costgroup_upd">
                        <option value=""></option>
                        <?php foreach ($costgroup as $key => $group) {?>
                        <option value="<?php echo $group->cgroup_code."-".$group->cgroup_name; ?>"><?php echo $group->cgroup_code."-".$group->cgroup_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">Group Name</label>
                      <input type="text" id="group_name_upd" placeholder="group Name" class="form-control group_new">
                      <input type="hidden" id="group_code2_upd" placeholder="group Name" class="form-control">
                      <input type="text" id="group_name2_upd" placeholder="group Name" class="form-control group_old" readonly="">
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="display-block text-semibold"><input type="checkbox" checked id="chksubgroup" class="styled">New Create Sub Group</label>
                        <input type="hidden" id="textsubgroup_upd"  value="Y" name="textsubgroup">
                      </div>
                  </div>
                </div>

                <div class="col-xs-4 ">
                    <div class="form-group">
                      <label for="typecode">Sub Group Code</label>
                      <input type="text" id="subgroup_code_upd" placeholder="Type Code"  class="form-control subgroup_new">
                      <select class="form-control subgroup_old" name="" id="costsubgroup_upd">
                        <option value=""></option>
                        <?php foreach ($costsubgroup as $key => $sub) {?>
                        <option value="<?php echo $sub->csubgroup_code."-".$sub->csubgroup_name; ?>"><?php echo $sub->csubgroup_code."-".$sub->csubgroup_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">Sub Group Name</label>
                      <input type="text" id="subgroup_name_upd" placeholder="group Name" class="form-control subgroup_new">
                      <input type="hidden" id="subgroup_code2_upd" placeholder="group Name" class="form-control">
                      <input type="text" id="subgroup_name2_upd" placeholder="group Name" class="form-control subgroup_old" readonly="">
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                    <div class="form-group">
                        <label class="display-block text-semibold"><input type="checkbox" checked id="chkspec_upd" class="styled">New Create Spec Code</label>
                        <input type="hidden" id="textspec_upd"  value="Y" name="textspec">
                      </div>
                  </div>
                </div>

                <div class="col-xs-4 ">
                    <div class="form-group">
                      <label for="typecode">Spec Code</label>
                      <input type="text" id="spec_code_upd" placeholder="Type Code"  class="form-control spec_new">
                      <select class="form-control spec_old" name="" id="costspec_upd">
                        <option value=""></option>
                        <?php foreach ($costspec as $key => $spec) {?>
                        <option value="<?php echo $spec->cgroup_code4."-".$spec->cgroup_name4; ?>"><?php echo $spec->cgroup_code4."-".$spec->cgroup_name4; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">Spec Name</label>
                      <input type="text" id="spec_name_upd" placeholder="group Name" class="form-control spec_new">
                      <input type="hidden" id="spec_code2_upd" placeholder="group Name" class="form-control">
                      <input type="text" id="spec_name2_upd" placeholder="group Name" class="form-control spec_old" readonly="">
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-xs-2">
                 
                </div>

                <div class="col-xs-4 ">
                    <div class="form-group">
                      <label for="typecode">brand Code</label>
                      <input type="text" id="brand_code_upd" placeholder="Type Code"  class="form-control brand_new">
                    </div>
                  </div>
                  <div class="col-xs-6 ">
                    <div class="form-group">
                      <label for="typename">brand Name</label>
                      <input type="text" id="brand_name_upd" placeholder="group Name" class="form-control brand_new">
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-xs-2">
                 
                </div>
                <div class="col-xs-4">
                  <div class="form-group">
                    <label for="typecode">A/C Cost (Construction) </label>
                    <input type="text" readonly="readonly"" class="form-control" readonly="readonly"" value="" name="accno" id="accno_upd">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="typename">&nbsp;</label>
                    <div class="input-group">
                         <input type="text" class="form-control" readonly="readonly"" value="" name="codename" id="codename_upd">
                        <div class="input-group-btn">
                          <button type="button" data-toggle="modal" data-target="#construction" class="construction btn btn-info"><i class="icon-search4"></i></button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-2">
                 
                </div>
                <div class="col-xs-4">
                  <div class="form-group">
                    <label for="typecode">A/C Cost (Realestate)</label>
                    <input type="text" readonly="readonly"" class="form-control" readonly="readonly"" value="" name="accno2" id="accno2_upd">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="typename">&nbsp;</label>
                    <div class="input-group">
                         <input type="text" class="form-control" readonly="readonly"" value="" name="actname" id="codename2_upd">
                        <div class="input-group-btn">
                          <button type="button" data-toggle="modal" data-target="#realestate" class="realestate btn btn-info"><i class="icon-search4"></i></button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <input type="text" class="form-control" id="ct_upd" name="">
                  <input type="text" class="form-control" id="cg_upd" name="">
                  <input type="text" class="form-control" id="cs_upd" name="">
                  <input type="text" class="form-control" id="csp_upd" name="">
                </div>
                <div class="col-xs-4 ">
                    <div class="form-group">
                      <label for="typecode">Type</label>
                      <select class="form-control" name="" id="typecost_upd" name="typecost">
                        <option value="H">Header</option>
                        <option value="D">Detail</option>
                      </select>
                    </div>
                  </div>
              </div>

            </div>
            <div class="row">
              <div class="text-right">
                 <button type="button" id="addtorow_upd" class="btn btn-primary"><i class="glyphicon glyphicon-ok"> Update</i></button>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<div>
<input type="hidden" id="ctype_old">
<input type="hidden" id="cgroup_old">
<input type="hidden" id="csubgroup_old">
<input type="hidden" id="cgroup4_old">
<input type="hidden" id="cgroup5_old">

<input type="hidden" id="codetype">
<input type="hidden" id="nametype">
<input type="hidden" id="codegroup">
<input type="hidden" id="namegroup">
<input type="hidden" id="codesubgroup">
<input type="hidden" id="namesubgroup">
<input type="hidden" id="codegroup4">
<input type="hidden" id="namegroup4">
<input type="hidden" id="codegroup5">
<input type="hidden" id="namegroup5">
</div>
<br><br><br>
<script>
$('#cost1').click(function() {
  var code = $(this).val();
  $('#codetype').val(code);
  $('#ctype_old').val(code);
  var name = $(this).find(":selected").attr('attr-name');
  $('#nametype').val(name);
  $("#costadd1").show();
  $("#costadd2").hide();
  $("#costadd3").hide();
  $("#costadd4").hide();
  $("#costadd5").hide();
  // alert(code+name);
});
$('#cost2').click(function() {
 
            
  var code = $(this).val();
  $('#codegroup').val(code);
  $('#cgroup_old').val(code);
  var name = $(this).find(":selected").attr('attr-name');
  $('#namegroup').val(name);
  $("#costadd1").hide();
  $("#costadd2").show();
  $("#costadd3").hide();
  $("#costadd4").hide();
  $("#costadd5").hide();
  // alert(code+name);
});
$('#cost3').click(function() {
  var code = $(this).val();
  $('#codesubgroup').val(code);
  $('#csubgroup_old').val(code);
  var name = $(this).find(":selected").attr('attr-name');
  $('#namesubgroup').val(name);
  $("#costadd1").hide();
  $("#costadd2").hide();
  $("#costadd3").show();
  $("#costadd4").hide();
  $("#costadd5").hide();
  // alert(code+name);
});
$('#cost4').click(function() {
  var code = $(this).val();
  $('#codegroup4').val(code);
  $('#cgroup4_old').val(code);
  var name = $(this).find(":selected").attr('attr-name');
  $('#namegroup4').val(name);
  $("#costadd1").hide();
  $("#costadd2").hide();
  $("#costadd3").hide();
  $("#costadd4").show();
  $("#costadd5").hide();
  // alert(code+name);
});
$('#cost5').click(function() {
  $("#costadd1").hide();
  $("#costadd2").hide();
  $("#costadd3").hide();
  $("#costadd4").hide();
  $("#costadd5").show();
  var code = $(this).val();
  $('#codegroup5').val(code);
  $('#cgroup5_old').val(code);
  var name = $(this).find(":selected").attr('attr-name');
  $('#namegroup5').val(name);
  // alert(code+name);
});
$("#inst").click(function(){
  $("#newmatone").modal('show');
  var cost1 = $('#codetype').val();
  $('#type_code').val(cost1);
  var name1 = $('#nametype').val();
  $('#type_name').val(name1);
  var cost2 = $('#codegroup').val();
  $('#group_code').val(cost2);
  var name2 = $('#namegroup').val();
  $('#group_name').val(name2);
  var cost3 = $('#codesubgroup').val();
  $('#subgroup_code').val(cost3);
  var name3 = $('#namesubgroup').val();
  $('#subgroup_name').val(name3);
  var cost4 = $('#codegroup4').val();
  $('#spec_code').val(cost4);
  var name4 = $('#namegroup4').val();
  $('#spec_name').val(name4);
  var cost5 = $('#codegroup5').val();
  $('#brand_code').val(cost5);
  var name5 = $('#namegroup5').val();
  $('#brand_name').val(name5);
});

$("#type_code").keyup(function(){
  if ($('#create').val() == "Y") {
    var ct1 = $('#type_code').val();
    $("#ct").val(ct1);
  }
});
$("#costtype").click(function(){
  if ($('#create').val() == "N") {
    var ct1 = $('#type_code2').val();
    $("#ct").val(ct1);
  }
});

$("#group_code").keyup(function(){
  if ($('#textgroup').val() == "Y") {
    var ct1 = $('#group_code').val();
    $("#cg").val(ct1);
  }
});
$("#costgroup").click(function(){
  if ($('#textgroup').val() == "N") {
    var ct1 = $('#group_code2').val();
    $("#cg").val(ct1);
  }
});

$("#subgroup_code").keyup(function(){
  if ($('#textsubgroup').val() == "Y") {
    var ct1 = $('#subgroup_code').val();
    $("#cs").val(ct1);
  }
});
$("#costsubgroup").click(function(){
  if ($('#textsubgroup').val() == "N") {
    var ct1 = $('#subgroup_code2').val();
    $("#cs").val(ct1);
  }
});

$("#spec_code").keyup(function(){
  if ($('#textspec').val() == "Y") {
    var ct1 = $('#spec_code').val();
    $("#csp").val(ct1);
  }
});
$("#costspec").click(function(){
  if ($('#textspec').val() == "N") {
    var ct1 = $('#spec_code2').val();
    $("#csp").val(ct1);
  }else{
    $("#csp").val("ct1");
  }
});

$(".editcost").hide();
$(".type_old").hide();
$(".group_old").hide();
$(".subgroup_old").hide();
$(".spec_old").hide();
$("#costtype").change(function(){
  var title = $('#costtype').val();
  var substr = title.split('-');
  var s0 = (substr[0]);
  var s1 = (substr[1]);

  $("#type_code2").val(s0);
  $("#type_name2").val(s1);

});

$("#costgroup").change(function(){
  var title = $('#costgroup').val();
  var substr = title.split('-');
  var s0 = (substr[0]);
  var s1 = (substr[1]);

  $("#group_code2").val(s0);
  $("#group_name2").val(s1);
});

$("#costsubgroup").change(function(){
  var title = $('#costsubgroup').val();
  var substr = title.split('-');
  var s0 = (substr[0]);
  var s1 = (substr[1]);

  $("#subgroup_code2").val(s0);
  $("#subgroup_name2").val(s1);
});

$("#costspec").change(function(){
  var title = $('#costspec').val();
  var substr = title.split('-');
  var s0 = (substr[0]);
  var s1 = (substr[1]);

  $("#spec_code2").val(s0);
  $("#spec_name2").val(s1);
});

$("#chkk").click(function(){
  if ($("#chkk").prop("checked")) {
    $(".type_old").hide();
    $(".type_new").show();
    $("#create").val("Y");
    $("#type_code2").val("");
    $("#type_name2").val("");
  }else{
    $(".type_new").hide();
    $(".type_old").show();
    $("#create").val("N");
    $("#type_code").val("");
    $("#type_name").val("");
  }
  $("#ct").val("");
});

$("#chkgroup").click(function(){
  if ($("#chkgroup").prop("checked")) {
    $(".group_old").hide();
    $(".group_new").show();
    $("#textgroup").val("Y");
    $("#group_code2").val("");
    $("#group_name2").val("");
  }else{
    $(".group_new").hide();
    $(".group_old").show();
    $("#textgroup").val("N");
    $("#group_code").val("");
    $("#group_name").val("");
  }
  $("#cg").val("");
});

$("#chksubgroup").click(function(){
  if ($("#chksubgroup").prop("checked")) {
    $(".subgroup_old").hide();
    $(".subgroup_new").show();
    $("#textsubgroup").val("Y");
    $("#subgroup_code2").val("");
    $("#subgroup_code2").val("");
  }else{
    $(".subgroup_new").hide();
    $(".subgroup_old").show();
    $("#textsubgroup").val("N");
    $("#subgroup_code").val("");
    $("#subgroup_code").val("");
  }
  $("#cs").val("");
});

$("#chkspec").click(function(){
  if ($("#chkspec").prop("checked")) {
    $(".spec_old").hide();
    $(".spec_new").show();
    $("#textspec").val("Y");
    $("#spec_code2").val("");
    $("#spec_code2").val("");
  }else{
    $(".spec_new").hide();
    $(".spec_old").show();
    $("#textspec").val("N");
    $("#spec_code").val("");
    $("#spec_code").val("");
  }
  $("#csp").val("");
});

</script>
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


$('#addtorow').click(function(event){

if ($("#type_code").val()=="" && $("#type_code2").val()=="") {
  swal({
      title: "Please fill Type Code  !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
  
}else if ($("#type_name").val()=="" && $("#type_name2").val()=="" &&$("#type_name2").val()!="" ){
 
  swal({
      title: "Please fill Type Name  !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if ($("#group_code").val()=="" && $("#group_code2").val()==""){
 
  swal({
      title: "Please fill Group Code !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if ($("#group_name").val()=="" && $("#group_name2").val()==""  &&$("#group_name2").val()!="" ){
 
  swal({
      title: "Please fill Group Name !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if ($("#subgroup_code").val()=="" && $("#subgroup_code2").val()==""){
 
  swal({
      title: "Please fill Sub Group Code !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if ($("#subgroup_name").val()=="" && $("#subgroup_name2").val()==""  &&$("#subgroup_name2").val()!="" ){
 
  swal({
      title: "Please fill Sub Group Name !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if ($("#spec_code").val()=="" && $("#spec_code2").val()==""){
 
  swal({
      title: "Please fill Spec Code !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if ($("#spec_name").val()=="" && $("#spec_name2").val()==""  &&$("#spec_name2").val()!="" ){
 
  swal({
      title: "Please fill Spec Name !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if ($("#brand_code").val()==""){
 
  swal({
      title: "Please fill Brand Code !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if ($("#brand_name").val()==""){
  swal({
      title: "Please fill Brand Name !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{
  $("#newmatone").modal('hide');
  var url="<?php echo base_url(); ?>datastore_active/addcostcode";

  var dataSet={
  create:  $('#create').val(),
  group:  $('#textgroup').val(),
  subgroup:  $('#textsubgroup').val(),
  spec:  $('#textspec').val(),
  type_code:  $('#type_code').val(),
  type_name:  $('#type_name').val(),
  type_code2:  $('#type_code2').val(),
  type_name2:  $('#type_name2').val(),
  group_code:  $('#group_code').val(),
  group_name:  $('#group_name').val(),
  group_code2:  $('#group_code2').val(),
  group_name2:  $('#group_name2').val(),
  subgroup_code:  $('#subgroup_code').val(),
  subgroup_name:  $('#subgroup_name').val(),
  subgroup_code2:  $('#subgroup_code2').val(),
  subgroup_name2:  $('#subgroup_name2').val(),
  spec_code:  $('#spec_code').val(),
  spec_name:  $('#spec_name').val(),
  spec_code2:  $('#spec_code2').val(),
  spec_new2:  $('#spec_new2').val(),
  brand_code:  $('#brand_code').val(),
  brand_name:  $('#brand_name').val(),
  typecost:  $('#typecost').val(),
  accno:  $('#accno').val(),
  codename:  $('#codename').val(),
  accno2:  $('#accno2').val(),
  codename2:  $('#codename2').val(),
  costcode:  $('#ct').val()+$('#cg').val()+$('#cs').val()+$('#csp').val()+$('#brand_code').val(),
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

  
$(".type_old").hide();
$(".group_old").hide();
$(".subgroup_old").hide();
$(".spec_old").hide();

$(".type_new").show();
$(".group_new").show();
$(".subgroup_new").show();
$(".spec_new").show();

$('#chkk').prop('checked', true);
$("#create").val("Y");
$('#chkgroup').prop('checked', true);
$("#textgroup").val("Y");
$('#chksubgroup').prop('checked', true);
$("#textsubgroup").val("Y");
$('#chkspec').prop('checked', true);
$("#textspec").val("Y");

$("#type_code").val("");
$("#type_code2").val("");
$("#type_name").val("");
$("#type_name2").val("");

$("#group_code").val("");
$("#group_code2").val("");
$("#group_name").val("");
$("#group_name2").val("");

$("#subgroup_code").val("");
$("#subgroup_code2").val("");
$("#subgroup_name").val("");
$("#subgroup_name2").val("");

$("#spec_code").val("");
$("#spec_code2").val("");
$("#spec_name").val("");
$("#spec_name2").val("");

$("#brand_code").val("");
$("#brand_name").val("");
$("#accno").val("");
$("#accno2").val("");
$("#codename2").val("");
$("#codename").val("");
}
  
});

$(".editcost").click(function(){
  
  $("#edit_costcode").modal('show');

  var cost1 = $('#codetype').val();
  $('#type_code_upd').val(cost1);
  var name1 = $('#nametype').val();
  $('#type_name_upd').val(name1);
  var cost2 = $('#codegroup').val();
  $('#group_code_upd').val(cost2);
  var name2 = $('#namegroup').val();
  $('#group_name_upd').val(name2);
  var cost3 = $('#codesubgroup').val();
  $('#subgroup_code_upd').val(cost3);
  var name3 = $('#namesubgroup').val();
  $('#subgroup_name_upd').val(name3);
  var cost4 = $('#codegroup4').val();
  $('#spec_code_upd').val(cost4);
  var name4 = $('#namegroup4').val();
  $('#spec_name_upd').val(name4);
  var cost5 = $('#codegroup5').val();
  $('#brand_code_upd').val(cost5);
  var name5 = $('#namegroup5').val();
  $('#brand_name_upd').val(name5);
  $('#addtorow_upd').click(function(event) {
    $("#edit_costcode").modal('hide');
      var url="<?php echo base_url(); ?>datastore_active/updcostcode";
      id="ctype_old"
      id="cgroup_old"
      id="csubgroup_old"
      id="cgroup4_old"
      id="cgroup5_old"
      var dataSet={
      codee : $('#costcodetext').val(),
      ctype_old: $('#ctype_old').val(),
      cgroup_old: $('#cgroup_old').val(),
      csubgroup_old: $('#csubgroup_old').val(),
      cgroup4_old: $('#cgroup4_old').val(),
      cgroup5_old: $('#cgroup5_old').val(),
      create:  $('#create_upd').val(),
      group:  $('#textgroup_upd').val(),
      subgroup:  $('#textsubgroup_upd').val(),
      spec:  $('#textspec_upd').val(),
      type_code:  $('#type_code_upd').val(),
      type_name:  $('#type_name_upd').val(),
      type_code2:  $('#type_code2_upd').val(),
      type_name2:  $('#type_name2_upd').val(),
      group_code:  $('#group_code_upd').val(),
      group_name:  $('#group_name_upd').val(),
      group_code2:  $('#group_code2_upd').val(),
      group_name2:  $('#group_name2_upd').val(),
      subgroup_code:  $('#subgroup_code_upd').val(),
      subgroup_name:  $('#subgroup_name_upd').val(),
      subgroup_code2:  $('#subgroup_code2_upd').val(),
      subgroup_name2:  $('#subgroup_name2_upd').val(),
      spec_code:  $('#spec_code_upd').val(),
      spec_name:  $('#spec_name_upd').val(),
      spec_code2:  $('#spec_code2_upd').val(),
      spec_new2:  $('#spec_new2_upd').val(),
      brand_code:  $('#brand_code_upd').val(),
      brand_name:  $('#brand_name_upd').val(),
      typecost:  $('#typecost_upd').val(),
      accno:  $('#accno_upd').val(),
      codename:  $('#codename_upd').val(),
      accno2:  $('#accno2_upd').val(),
      codename2:  $('#codename2_upd').val(),
      costcode:  $('#ct_upd').val()+$('#cg_upd').val()+$('#cs_upd').val()+$('#csp_upd').val()+$('#brand_code_upd').val(),
      };
    $.post(url,dataSet, function() {
      // console.log(data);
    }).done(function(data){
      // var json = jQuery.parseJSON(data);
      // console.log(data);
      var json =jQuery.parseJSON(data);
      if (json.status = true) {
      swal({
      title: "Save Completed!!.",
      text: "",
      confirmButtonColor: "#66BB6A",
      type: "success"
      });

      // // $('#cost1').load('<?php echo base_url('materialcode/get_cost_type');?>');
      // // $("#type_code").val('');
      // // $("#type_name").val('');

      }else{
      console.log(json.message);
      }
    });
  });
  
});


</script>
<div class="modal fade" id="editmatone" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-teal-300">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editหมวด </h4>
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
              <a id="esavetypecost" data-dismiss="modal" class="btn bg-teal-600">ยืนยันการAddข้อมูล</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div> <!--end modal -->
  <script>
  $('#esavetypecost').click(function(){
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
            $("#costadd2").hide();
            $("#costadd3").hide();
            $("#costadd4").hide();
            $("#costadd5").hide();
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
            $("#costadd1").show();
            $("#costadd2").hide();
            $("#costadd3").hide();
            $("#costadd4").hide();
            $("#costadd5").hide();
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
          var url="<?php echo base_url(); ?>materialcode/getctypename_u"+'/'+c1;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          $("#emattype_name").val(data);
          $("#emattype_code").val(c1);
          $("#mattypecode").val(c1);
          $("#edittypename").val(data);
          $("#edittypecode").val(c1);
          });
          });


          $( "#cost2" ).change(function() {
            $("#costadd1").hide();
            $("#costadd2").show();
            $("#costadd3").hide();
            $("#costadd4").hide();
            $("#costadd5").hide();
            
          var c1 = $('#cost1').val();
          console.log(c1);
          var c2 = $('#cost2').val();
          var c3 = $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
          $("#costcodetext").val(c1+c2);
          var url="<?php echo base_url(); ?>materialcode/getcgroupname_u"+'/'+c1+'/'+c2;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          $("#emattypecode").val(c1);
          $("#ematgroup_code").val(c2);
          $("#ematgroup_name").val(data);
          $("#editgroupcode").val(c2);
          $("#editgroupname").val(data);
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

          $("#cost3").change(function() {
            $("#costadd1").hide();
            $("#costadd2").hide();
            $("#costadd3").show();
            $("#costadd4").hide();
            $("#costadd5").hide();
          var c1 = $('#cost1').val();
          var c2 = $('#cost2').val();
          var c3 = $('#cost3').val();
          var c4 = $('#cost4').load('<?php echo base_url('materialcode/get_cost_subgroup_cost4/');?>'+'/'+c1+'/'+c2+'/'+c3);
          // var c4 = $('#cost4').load('<?php echo base_url('materialcode/get_cost_subgroup_cost4/');?>'+'/'+$("#cost1").val()+'/'+$("#cost2").val()+'/'+$("#cost3").val());

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
          $("#editsubgroupcode").val(c3);
          var url="<?php echo base_url(); ?>materialcode/getcsubgroupname"+'/'+c1+'/'+c2+'/'+c3;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          $("#ematsubgroup_name").val(data);
          $("#editsubgroupname").val(data);
          });
          });

          $( "#cost4").change(function() {
            $("#costadd1").hide();
            $("#costadd2").hide();
            $("#costadd3").hide();
            $("#costadd4").show();
            $("#costadd5").hide();
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
          var url="<?php echo base_url(); ?>materialcode/getcspecname"+'/'+c1+'/'+c2+'/'+c3+'/'+c4;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
          $("#editspeccode").val(c4);
          $("#editspecname").val(data);
          $("#ematsubgroup_name").val(data);
          });
          });


          $( "#cost5").change(function() {
            $("#costadd1").hide();
            $("#costadd2").hide();
            $("#costadd3").hide();
            $("#costadd4").hide();
            $("#costadd5").show();
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
          var url="<?php echo base_url(); ?>materialcode/getcbrandname"+'/'+c1+'/'+c2+'/'+c3+'/'+c4+'/'+c5;
          var dataSet={
          };
          $.post(url,dataSet,function(data){
            $("#editbrandcode").val(c5);
            $("#editbrandname").val(data);
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
  
  var code = $('#costcodetext').val();
  $("#cost5").click(function(event) {
    $(".editcost").show();
  });
          </script>

<div class="modal fade" id="construction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Select</h4>
      </div>
      <div class="modal-body">
        <div id="constructionmodal"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="realestate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Select</h4>
      </div>
      <div class="modal-body">
        <div id="realestatemodal"></div>
      </div>
    </div>
  </div>
</div>
<script>

   $(".construction").click(function(){
   $('#constructionmodal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#constructionmodal").load('<?php echo base_url(); ?>share/accchart_h');
   });

   $(".realestate").click(function(){
   $('#realestatemodal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#realestatemodal").load('<?php echo base_url(); ?>share/accchart_h2');
   });
</script>

<script type="text/javascript">
  $('#type_code').keyup(function(event) {
    $('#show_type_code').empty();
     var name = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/costcode_tae',
        type: 'POST',
        data: {name: name},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_type_code label label-flat border-primary text-primary-600" data_name="'+data.ctype_code+'">'+data.ctype_code+'</a>&nbsp;';
        $('#show_type_code').append(data);        
        }); 

        $('.select_type_code').click(function(event) {
          $('#show_type').empty();
            var data_type = $(this).attr('data_name');
            $('#type_code').val(data_type);
            $('#show_type_code').empty();
            $.ajax({
              url: '<?= base_url() ?>data_master/get_costcode',
              type: 'POST',
              data: {code: data_type},
            }).done(function(data) {
              var json = jQuery.parseJSON(data);
              $.each(json, function(key, data) {
              var data = '<a href="#" class="select_type label label-flat border-primary text-primary-600" data_name="'+data.ctype_name+'">'+data.ctype_name+'</a>&nbsp;';
              $('#show_type').append(data);
              });

              $('.select_type').click(function(event) {
                  var data_type = $(this).attr('data_name');
                  $('#type_name').val(data_type);
                  $('#show_type').empty();
              });

            });
        });
      });  
  });


  $('#type_name').keyup(function(event) {
      $('#show_type').empty();
      var name = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/costtype_tae',
        type: 'POST',
        data: {name: name},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_type label label-flat border-primary text-primary-600" data_name="'+data.ctype_name+'">'+data.ctype_name+'</a>&nbsp;';
        $('#show_type').append(data);        
        }); 

        $('.select_type').click(function(event) {
            var data_type = $(this).attr('data_name');
            $('#type_name').val(data_type);
            $('#show_type').empty();
        });
      });  
  });


  $('#group_code').keyup(function(event) {
      $('#group_code_show').empty();
      var code = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/group_code',
        type: 'POST',
        data: {code: code},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_group_code label label-flat border-success text-success-600" data_name="'+data.cgroup_code+'">'+data.cgroup_code+'</a>&nbsp;';
        $('#group_code_show').append(data);        
        }); 

        $('.select_group_code').click(function(event) {
          $('#group_name_show').empty();
            var data_type = $(this).attr('data_name');
            $('#group_code').val(data_type);
            $('#group_code_show').empty();
            $.ajax({
              url: '<?= base_url() ?>data_master/get_costcode_group',
              type: 'POST',
              data: {code: data_type},
            }).done(function(data) {
              var json = jQuery.parseJSON(data);
              $.each(json, function(key, data) {
              var data = '<a href="#" class="select_group label label-flat border-success text-success-600" data_name="'+data.cgroup_name+'">'+data.cgroup_name+'</a>&nbsp;';
              $('#group_name_show').append(data);
              });

              $('.select_group').click(function(event) {
                  var data_type = $(this).attr('data_name');
                  $('#group_name').val(data_type);
                  $('#group_name_show').empty();
              });

            });
        });
      });
  });


  $('#group_name').keyup(function(event) {
      $('#group_name_show').empty();
      var name = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/group_name',
        type: 'POST',
        data: {name: name},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_group_name label label-flat border-success text-success-600" data_name="'+data.cgroup_name+'">'+data.cgroup_name+'</a>&nbsp;';
        $('#group_name_show').append(data);        
        }); 

        $('.select_group_name').click(function(event) {
            var data_type = $(this).attr('data_name');
            $('#group_name').val(data_type);
            $('#group_name_show').empty();
        });
      });  
  });


  $('#subgroup_code').keyup(function(event) {
    $('#subgroup_code_show').empty();
      var code = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/subgroup_code',
        type: 'POST',
        data: {code: code},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_subgroup_code label label-flat border-danger text-danger-600" data_name="'+data.csubgroup_code+'">'+data.csubgroup_code+'</a>&nbsp;';
        $('#subgroup_code_show').append(data);        
        }); 

        $('.select_subgroup_code').click(function(event) {
          $('#subgroup_name_show').empty();
            var data_type = $(this).attr('data_name');
            $('#subgroup_code').val(data_type);
            $('#subgroup_code_show').empty();
            $.ajax({
              url: '<?= base_url() ?>data_master/get_subgroup_code',
              type: 'POST',
              data: {code: data_type},
            }).done(function(data) {
              var json = jQuery.parseJSON(data);
              $.each(json, function(key, data) {
              var data = '<a href="#" class="select_subgroup label label-flat border-danger text-danger-600" data_name="'+data.csubgroup_name+'">'+data.csubgroup_name+'</a>&nbsp;';
              $('#subgroup_name_show').append(data);
              });

              $('.select_subgroup').click(function(event) {
                  var data_type = $(this).attr('data_name');
                  $('#subgroup_name').val(data_type);
                  $('#subgroup_name_show').empty();
              });

            });
        });
      });
    
  });


  $('#subgroup_name').keyup(function(event) {
      $('#subgroup_name_show').empty();
      var name = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/subgroup_name',
        type: 'POST',
        data: {name: name},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_group_name label label-flat border-danger text-danger-600" data_name="'+data.csubgroup_name+'">'+data.csubgroup_name+'</a>&nbsp;';
        $('#subgroup_name_show').append(data);        
        }); 

        $('.select_group_name').click(function(event) {
            var data_type = $(this).attr('data_name');
            $('#subgroup_name').val(data_type);
            $('#subgroup_name_show').empty();
        });
      });  
  });


  $('#spec_code').keyup(function(event) {

    $('#spec_code_show').empty();
      var code = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/spec_code',
        type: 'POST',
        data: {code: code},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_spec_code label label-flat border-pink text-pink-600" data_name="'+data.cgroup_code4+'">'+data.cgroup_code4+'</a>&nbsp;';
        $('#spec_code_show').append(data);        
        }); 

        $('.select_spec_code').click(function(event) {
          $('#spec_name_show').empty();
            var data_type = $(this).attr('data_name');
            $('#spec_code').val(data_type);
            $('#spec_code_show').empty();
            $.ajax({
              url: '<?= base_url() ?>data_master/get_spec_code',
              type: 'POST',
              data: {code: data_type},
            }).done(function(data) {
              var json = jQuery.parseJSON(data);
              $.each(json, function(key, data) {
              var data = '<a href="#" class="select_spec label label-flat border-pink text-pink-600" data_name="'+data.cgroup_name4+'">'+data.cgroup_name4+'</a>&nbsp;';
              $('#spec_name_show').append(data);
              });

              $('.select_spec').click(function(event) {
                  var data_type = $(this).attr('data_name');
                  $('#spec_name').val(data_type);
                  $('#spec_name_show').empty();
              });

            });
        });
      });
  });

  $('#spec_name').keyup(function(event) {
      $('#spec_name_show').empty();
      var name = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/spec_name',
        type: 'POST',
        data: {name: name},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_group_name label label-flat border-pink text-pink-600" data_name="'+data.cgroup_name4+'">'+data.cgroup_name4+'</a>&nbsp;';
        $('#spec_name_show').append(data);        
        }); 

        $('.select_group_name').click(function(event) {
            var data_type = $(this).attr('data_name');
            $('#spec_name').val(data_type);
            $('#spec_name_show').empty();
        });
      });  
  });


  $('#brand_code').keyup(function(event) {

    $('#brand_code_show').empty();
      var code = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/brand_code',
        type: 'POST',
        data: {code: code},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_brand_code label label-flat border-grey text-grey-600" data_name="'+data.cgroup_code5+'">'+data.cgroup_code5+'</a>&nbsp;';
        $('#brand_code_show').append(data);        
        }); 

        $('.select_brand_code').click(function(event) {
          $('#brand_name_show').empty();
            var data_type = $(this).attr('data_name');
            $('#brand_code').val(data_type);
            $('#brand_code_show').empty();
            $.ajax({
              url: '<?= base_url() ?>data_master/get_brand_code',
              type: 'POST',
              data: {code: data_type},
            }).done(function(data) {
              var json = jQuery.parseJSON(data);
              $.each(json, function(key, data) {
              var data = '<a href="#" class="select_brand label label-flat border-grey text-grey-600" data_name="'+data.cgroup_name5+'">'+data.cgroup_name5+'</a>&nbsp;';
              $('#brand_name_show').append(data);
              });

              $('.select_brand').click(function(event) {
                  var data_type = $(this).attr('data_name');
                  $('#brand_name').val(data_type);
                  $('#brand_name_show').empty();
              });

            });
        });
      });
    
  });


    $('#brand_name').keyup(function(event) {
      $('#brand_name_show').empty();
      var name = $(this).val();
      $.ajax({
        url: '<?= base_url() ?>data_master/brand_name',
        type: 'POST',
        data: {name: name},
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $.each(json, function(key, data) {
        var data = '<a href="#" class="select_brand_name label label-flat border-grey text-grey-600" data_name="'+data.cgroup_name5+'">'+data.cgroup_name5+'</a>&nbsp;';
        $('#brand_name_show').append(data);        
        }); 

        $('.select_brand_name').click(function(event) {
            var data_type = $(this).attr('data_name');
            $('#brand_name').val(data_type);
            $('#brand_name_show').empty();
        });
      });  
  });

  // $('#type_code').blur(function(event) {
  //   $('#show_type_code').empty();
  // });

  // $('#type_name').blur(function(event) {
  //   $('#show_type').empty();
  // }); 

  // $('#group_code').blur(function(event) {
  //   $('#group_code_show').empty();
  // });

  // $('#group_name').blur(function(event) {
  //   $('#group_name_show').empty();
  // }); 

  // $('#subgroup_code').blur(function(event) {
  //   $('#subgroup_code_show').empty();
  // });

  // $('#subgroup_name').blur(function(event) {
  //   $('#subgroup_name_show').empty();
  // });

  // $('#spec_code').blur(function(event) {
  //   $('#spec_code_show').empty();
  // });

  // $('#spec_name').blur(function(event) {
  //   $('#spec_name_show').empty();
  // });

  // $('#brand_name').blur(function(event) {
  //   $('#brand_name_show').empty();
  // });

  

</script>