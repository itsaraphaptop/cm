<div class="page-container">
		<div class="content-wrapper">
  <div class="content">
<div class="panel panel-body">
  <div style="text-align: right; ">
    <a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
    <?php if (isset($newback)!="") { ?>
      <a href="<?php echo base_url(); ?>data_master/main" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2" aria-hidden="true"></i> Close</a>
    <?php } else { ?>
        <a href="<?php echo base_url(); ?>data_master" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2" aria-hidden="true"></i> Close</a>
    <?php } ?>
  </div>
  <div class="row">
<div class="col-md-4">
  <ul class="icons-list">
    <li><button type="button" data-toggle="modal" data-target="#newmatone" class="newmatone label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add  TYPE</button></li>
    <li><button type="button" data-toggle="modal" data-target="#editmatone" class="newmatone label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit  TYPE</button></li>
    <li><button type="button" id="dmattype" class="newmatone label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect TYPE</button></li>
  </ul>
</div>

  <!-- <button type="button"  class="relo btn btn-primary btn-sm" style="display: block;"><i class="icon-plus-circle2"></i> Reload</button> -->
<div class="col-md-4">
  <ul class="icons-list">
    <li><button type="button" data-toggle="modal" data-target="#newmattwo" class="newmattwo label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add  GROUP</button></li>
    <li><button type="button" data-toggle="modal" data-target="#emattwo" class="newmattwo label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit  GROUP</button></li></li>
    <li><button type="button" id="dmattwo" class="newmattwo label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect GROUP</button></li>
  </ul>
</div>
<div class="col-md-4">
  <div class="icons-list">
    <li><button type="button" data-toggle="modal" data-target="#newmattree" class="newmattree label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add  SUB GROUP</button></li>
    <li><button type="button" data-toggle="modal" data-target="#emattree" class="newmattree label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit  SUB GROUP</button></li>
    <li><button type="button" id="dmattree" class="newmattree label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect SUB GROUP</button></li>
  </div>
</div>



</div>
<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_material/do_upload');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Material</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Material and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/material.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Material, upload an Excel (.xls) file:</p>
        <div class="form-group">
          <input type="file" class="file-styled" id="file_upload" name="userfile">
        </div>
      </div>
      
      
      <div class="modal-footer">
        <button type="submit" class="uploadfile btn btn-success">Import File</button>
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
      </div>
    <?php echo form_close();?>
    <div id="load"></div>
    </div>
  </div>
</div>
<div class="row">

<script>
$(".uploadfile").click(function(){
    $("#load").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
});
</script>

    <div id="tabmatone" class="col-md-4">
        <h4>TYPE </h4>
        <input type="text" class="form-control input-sm" id=stype placeholder="ค้นหาโดยรหัส">
        <select multiple class="form-control" id="matone" style="height:150px;"></select>
        <input type="hidden" id="ttypename" name="">
    </div>
    <div id="tabmattwo" class="col-md-4">

         <h4>Group</h4>
         <!-- <div class="input-group">
           <input type="text" class="form-control input-sm" placeholder="Filter" name="name" value="">
           <div class="input-group-btn">
             <button type="button" class="btn btn-primary btn-sm"  name="button">Filter</button>
           </div>
         </div> -->
         <input type="text" class="form-control input-sm" id="sgroup" placeholder="ค้นหาโดยชื่อ">
         <select multiple class="form-control" id="mattwo" style="height:150px;"></select>
         <input type="hidden" id="tgroupname" name="">

    </div>
    <div id="tabmattree" class="col-md-4">
         <h4>Sub Group</h4>
         <input type="text" class="form-control input-sm" id="ssubgroup" placeholder="ค้นหาโดยชื่อ">
        <select multiple class="form-control" id="mattree" style="height:150px;"></select>
         <input type="hidden" id="tsubgroupname" name="">
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
  <div class="icons-list">
    <li><button type="button" data-toggle="modal" data-target="#newmatfor" class="newmatfor label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add  P/M</button></li>
    <li><button type="button" data-toggle="modal" data-target="#ematfor" class="newmatfor label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit  P/M</button></li>
    <li><button type="button" id="dmatfor" class="newmatfor label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect P/M</button></li>
  </div>
  </div>
  <div class="col-md-4">
    <div class="icons-list">
      <li><button type="button" data-toggle="modal" data-target="#newmatfive" class="newmatfive label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add  Spec</button></li>
      <li><button type="button" data-toggle="modal" data-target="#ematfive" class="newmatfive label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit  Spec</button></li>
      <li><button type="button" id="dmatfive" class="newmatfive label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect Spec</button></li>
    </div>
  </div>
  <div class="col-md-4">
    <div class="icons-list">
      <li><button type="button" data-toggle="modal" data-target="#newmatsix" class="newmatsix label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add  Brand</button></li>
      <li><button type="button" data-toggle="modal" data-target="#ematsix" class="newmatsix label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit  Brand</button></li>
      <li><button type="button" id="dmatsix" class="newmatsix label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect Brand</button></li>
    </div>
  </div>
</div>



<div class="row">
     <div id="tabmatfor" class="col-md-4">
       <h4>Product/Material</h4>
       <input type="text" class="form-control input-sm" id="sgroupp" placeholder="ค้นหาโดยชื่อ">
        <select multiple class="form-control" id="matfor" style="height:150px;"></select>
         <input type="hidden" id="tproductname" name="">
     </div>
     <div id="tabmatfive" class="col-md-4">
       <h4>Spec</h4>
        <select multiple class="form-control" id="matfive" style="height:150px;"></select>
        <input type="hidden" id="tspecname" name="">
     </div>
     <div id="tabmatfive" class="col-md-4">
       <h4>Brand</h4>
        <select multiple class="form-control" id="matsix" style="height:150px;"></select>
        <input type="hidden" id="tbrandname" name="">
     </div>

</div>
<br>
<div class="row">
<div class="col-md-4">
    <div class="icons-list">
      <li><button type="button" data-toggle="modal" data-target="#newmatseven" class="newmatseven label label-primary label-sm" style="display: block;"><i class="icon-plus-circle2"></i> Add  Unit</button></li>
      <!-- <li><button type="button" data-toggle="modal" data-target="#ematseven" class="newmatseven label label-info label-sm" style="display: block;"><i class="icon-pencil7"></i> Edit  Unit</button></li> -->
      <!-- <li><button type="button" id="dmatseven" class="newmatseven label label-danger label-sm" style="display: block;"><i class="icon-trash"></i> Delect Unit</button></li> -->
    </div>
  </div>

</div>
<div class="row">
   <div id="tabmatseven" class="col-md-4">
       <h4>Unit</h4>
        <select multiple class="form-control" id="matseven" style="height:150px;"></select>
        <input type="hidden" id="tunitname" name="">
     </div>
</div>
     <br>
     <div class="row">
<div class="form-group">


        <hr>
        <div class="col-md-4">
          <label for=""> Material Code</label>
          <input type="text" class="form-control input-sm" readonly name="matcode" id="matcode">
        </div>
        <div class="col-md-4">
          <label for=""> Material Name</label>
          <input type="text" class="form-control input-sm" readonly name="matnamed" id="matnamed">
          <input type="text" class="form-control input-sm" readonly name="matnames" id="matnames">
          <input type="text" class="form-control input-sm" readonly name="matnamespecname" id="matnamespecname">
          <input type="text" class="form-control input-sm" readonly name="matnamebrandname" id="matnamebrandname">
        </div>
        <!-- <div class="col-md-4 col-md-offset-4 text-right">
              <button class="btn btn-primary"  data-dismiss="modal" id="btncostup">เลือก</button>
        </div> -->
</div>
</div>
<div class="row">
  <div class="form-group">
        <div class="col-md-4">
          <!-- <label for=""> เปิด PR กำหนด material เอง</label>
          <input type="text" class="form-control input-sm" readonly name="matcode" id="matcode"> -->
                   <!--  <div class="checkbox">
                    <?php $q = $this->db->query("select valuess from master_checking where keyss='pr_material_check'")->result();
foreach ($q as $k) {
	$cck = $k->valuess;
}
if ($cck == "Y") {
	?>
                      <label>
                        <input type="checkbox" class="chkprmat styled" checked>
                         <input type="hidden" value="Y" id="chkprmat">
                        เปิด PR กำหนด material เอง
                      </label>
                      <?php } else {?>
<label>
                        <input type="checkbox" class="chkprmat styled">
                         <input type="hidden" value="" id="chkprmat">
                        เปิด PR กำหนด material เอง
                      </label>
                        <?php }?>

                    </div> -->
        </div>
        <!-- <div class="col-md-4 col-md-offset-4 text-right">
              <button class="btn btn-primary"  data-dismiss="modal" id="btncostup">เลือก</button>
        </div> -->
</div>
</div>
</div>
<!-- <script>
  $(".chkprmat").click(function(){
    if($("#chkprmat").val()=="Y"){
      $("#chkprmat").val("");
    }else{
      $("#chkprmat").val("Y");
    }
     var url="<?php echo base_url(); ?>data_master2/pr_material_check";
      var dataSet={
          chkprmat: $("#chkprmat").val(),
        };
      $.post(url,dataSet,function(data){

      });
    });
</script> -->
</div>
</div>
</div>


<!-- modal  หมวด-->
 <div class="modal fade" id="newmatone" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add  Type </h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row">
                  <div class="row">
                        <div class="col-xs-6">
                             <div class="form-group">
                            <label for="typecode">Type Code</label>
                            <input type="text" id="mattype_code" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-6">
                             <div class="form-group">
                            <label for="typename">Type Name</label>
                            <input type="text" id="mattype_name" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="text-right">
                    <a id="savetype" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#savetype').click(function(){
     var url="<?php echo base_url(); ?>datastore/Addmattype";
      var dataSet={
          mattypecode:  $('#mattype_code').val(),
          mattypename:  $('#mattype_name').val()
          };
      $.post(url,dataSet,function(data){
              // alert(data);
              $('#matone').load('<?php echo base_url('materialcode/get_type'); ?>');

      });
  });
</script>
<!-- modal  หมวด-->
 <div class="modal fade" id="editmatone" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Type </h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row">
                  <div class="row">
                        <div class="col-xs-6">
                             <div class="form-group">
                            <label for="typecode">Type Code</label>
                            <input type="text" id="emattype_code" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
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
                    <a id="esavetype" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#esavetype').click(function(){
     var url="<?php echo base_url(); ?>datastore/editmattype";
      var dataSet={
          mattypecode:  $('#emattype_code').val(),
          mattypename:  $('#emattype_name').val()
          };
      $.post(url,dataSet,function(data){
              // alert(data);
              $('#matone').load('<?php echo base_url('materialcode/get_type'); ?>');

      });
  });
  $('#dmattype').click(function(){
    var url="<?php echo base_url(); ?>datastore/delmattype";
     var dataSet={
         mattypecode:  $('#emattype_code').val(),
         mattypename:  $('#emattype_name').val()
         };
     $.post(url,dataSet,function(data){
             // alert(data);
             $('#matone').load('<?php echo base_url('materialcode/get_type'); ?>');
             $('#mattwo').html('');

     });
  });
</script>
<!-- modal  ชือวัสดุ-->
 <div class="modal fade" id="newmattwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Group</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">Group Code</label>
                    <input type="text" id="matgroup_code" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">Group Name</label>
                    <input type="text" id="matgroup_name" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="mattypecode">
                    <button id="savegroup" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</button>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#savegroup').click(function(){
   var url="<?php echo base_url(); ?>datastore/Addmatgroup";
    var dataSet={
        mattypecode: $('#mattypecode').val(),
        matgroupcode:  $('#matgroup_code').val(),
        matgroupname:  $('#matgroup_name').val()
        };
    $.post(url,dataSet,function(data){
      // alert(data);
      $('#mattwo').load('<?php echo base_url('materialcode/get_group/'); ?>'+'/'+$("#emattypecode").val());
    });
});
</script>
<!-- modal  ชือวัสดุ-->
 <div class="modal fade" id="emattwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Group</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">Group Code</label>
                    <input type="text" id="ematgroup_code" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">Group Name</label>
                    <input type="text" id="ematgroup_name" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="emattypecode">
                    <button id="esavegroup" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</button>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#esavegroup').click(function(){
   var url="<?php echo base_url(); ?>datastore/editmatgroup";
    var dataSet={
        mattypecode: $('#emattypecode').val(),
        matgroupcode:  $('#ematgroup_code').val(),
        matgroupname:  $('#ematgroup_name').val()
        };
    $.post(url,dataSet,function(data){
            // alert(data);
      $('#mattwo').load('<?php echo base_url('materialcode/get_group/'); ?>'+'/'+$("#emattypecode").val());
    });
});
$("#dmattwo").click(function(){
  var url="<?php echo base_url(); ?>datastore/delmatgroup";
   var dataSet={
       mattypecode: $('#emattypecode').val(),
       matgroupcode:  $('#ematgroup_code').val(),
       matgroupname:  $('#ematgroup_name').val()
       };
   $.post(url,dataSet,function(data){
           // alert(data);
     $('#mattwo').load('<?php echo base_url('materialcode/get_group/'); ?>'+'/'+$("#emattypecode").val());
     $('#mattree').html('');
   });
});
</script>
<!-- modal  ขนาดวัสดุ-->
 <div class="modal fade" id="newmattree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header  bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add SubGroup</h4>
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
                <div class="text-right">
                <input type="hidden" id="mattypecodetree">
                <input type="hidden" id="matgroupcodetree">
                    <button id="savesubgroup" data-dismiss="modal" class="btn  bg-success"><i class="icon-floppy-disk"></i> Save</button>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#savesubgroup').click(function(){
   var url="<?php echo base_url(); ?>datastore/Addmatsubgroup";
    var dataSet={
        mattypecode: $('#mattypecodetree').val(),
        matgroupcode:  $('#matgroupcodetree').val(),
        matsubgroupcode:  $('#matsubgroup_code').val(),
        matsubgroupname:  $('#matsubgroup_name').val()
        };
    $.post(url,dataSet,function(data){
            // alert(data);
            $('#mattree').load('<?php echo base_url('materialcode/get_subgroup/'); ?>'+'/'+$("#mattypecodetree").val()+'/'+$("#matgroupcodetree").val());
    });
});
</script>
<!-- modal  ขนาดวัสดุ-->
 <div class="modal fade" id="emattree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header  bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit SubGroup</h4>
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
                <div class="text-right">
                <input type="hidden" id="emattypecodetree">
                <input type="hidden" id="ematgroupcodetree">
                    <button id="esavesubgroup" data-dismiss="modal" class="btn  bg-success"><i class="icon-floppy-disk"></i> Save</button>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#esavesubgroup').click(function(){
   var url="<?php echo base_url(); ?>datastore/editmatsubgroup";
    var dataSet={
        mattypecode: $('#emattypecodetree').val(),
        matgroupcode:  $('#ematgroupcodetree').val(),
        matsubgroupcode:  $('#ematsubgroup_code').val(),
        matsubgroupname:  $('#ematsubgroup_name').val()
        };
    $.post(url,dataSet,function(data){
            // alert(data);
      $('#mattree').load('<?php echo base_url('materialcode/get_subgroup/'); ?>'+'/'+$("#emattypecodetree").val()+'/'+$("#ematgroupcodetree").val());
    });
});
$("#dmattree").click(function(){
  var url="<?php echo base_url(); ?>datastore/delmatsubgroup";
   var dataSet={
       mattypecode: $('#emattypecodetree').val(),
       matgroupcode:  $('#ematgroupcodetree').val(),
       matsubgroupcode:  $('#ematsubgroup_code').val(),
       matsubgroupname:  $('#ematsubgroup_name').val()
       };
   $.post(url,dataSet,function(data){
           // alert(data);
     $('#mattree').load('<?php echo base_url('materialcode/get_subgroup/'); ?>'+'/'+$("#emattypecodetree").val()+'/'+$("#ematgroupcodetree").val());
     $("#matfor").html('');
   });
});
</script>
<!-- modal  หน่วยวัสดุ-->
 <div class="modal fade" id="newmatfor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Produc / Material</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">P/M Code</label>
                    <input type="text" id="matproductcode" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">P/M Name</label>
                    <input type="text" id="matproductname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="mattypecodefor" >
                <input type="hidden" id="matgroupcodefor">
                <input type="hidden" id="matsubgroupcodefor">
                    <button id="saveunit" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</button>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>

$('#saveunit').click(function(){
   var url="<?php echo base_url(); ?>datastore/Addmatproduct";
    var dataSet={
        mattypecode: $('#mattypecodefor').val(),
        matgroupcode:  $('#matgroupcodefor').val(),
        matsubgroupcode:  $('#matsubgroupcodefor').val(),
        matproductcode:  $('#matproductcode').val(),
        matproductname:  $('#matproductname').val()
        };
    $.post(url,dataSet,function(data){
      $('#matfor').load('<?php echo base_url('materialcode/get_product/'); ?>'+'/'+$("#mattypecodefor").val()+'/'+$("#matgroupcodefor").val()+'/'+$("#matsubgroupcodefor").val());
    });
});
</script>
<!-- modal  หน่วยวัสดุ-->
 <div class="modal fade" id="ematfor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit  Product / Material</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">P/M Code</label>
                    <input type="text" id="ematproductcode" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">P/M Name</label>
                    <input type="text" id="ematproductname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="emattypecodefor" >
                <input type="hidden" id="ematgroupcodefor">
                <input type="hidden" id="ematsubgroupcodefor">
                    <button id="esaveunit" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</button>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#esaveunit').click(function(){
   var url="<?php echo base_url(); ?>datastore/editmatproduct";
    var dataSet={
        mattypecode: $('#emattypecodefor').val(),
        matgroupcode:  $('#ematgroupcodefor').val(),
        matsubgroupcode:  $('#ematsubgroupcodefor').val(),
        matproductcode:  $('#ematproductcode').val(),
        matproductname:  $('#ematproductname').val()
        };
    $.post(url,dataSet,function(data){
      $('#matfor').load('<?php echo base_url('materialcode/get_product/'); ?>'+'/'+$("#emattypecodefor").val()+'/'+$("#ematgroupcodefor").val()+'/'+$("#ematsubgroupcodefor").val());
    });
});
$("#dmatfor").click(function(){
  var url="<?php echo base_url(); ?>datastore/delmatproduct";
   var dataSet={
       mattypecode: $('#emattypecodefor').val(),
       matgroupcode:  $('#ematgroupcodefor').val(),
       matsubgroupcode:  $('#ematsubgroupcodefor').val(),
       matproductcode:  $('#ematproductcode').val(),
       matproductname:  $('#ematproductname').val()
       };
   $.post(url,dataSet,function(data){
     $('#matfor').load('<?php echo base_url('materialcode/get_product/'); ?>'+'/'+$("#emattypecodefor").val()+'/'+$("#ematgroupcodefor").val()+'/'+$("#ematsubgroupcodefor").val());
     $("#matfive").html('');
   });
});
</script>
<!-- modal  Add ตรา/ยี่ห้อ-->
 <div class="modal fade" id="newmatfive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add  SPEC</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">Spec Code</label>
                    <input type="text" id="matspeccode" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">Spec Name</label>
                    <input type="text" id="matspecname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="mattypecodefive" >
                <input type="hidden" id="matgroupcodefive">
                <input type="hidden" id="matsubgroupcodefive">
                <input type="hidden" id="matproductcodefive">
                    <a id="savespec" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#savespec').click(function(){
   var url="<?php echo base_url(); ?>datastore/Addmatspec";
    var dataSet={
        mattypecode: $('#mattypecodefive').val(),
        matgroupcode:  $('#matgroupcodefive').val(),
        matsubgroupcode:  $('#matsubgroupcodefive').val(),
        matproductcode:  $('#matproductcodefive').val(),
        matspeccode:  $('#matspeccode').val(),
        matspecname:  $('#matspecname').val()
        };
    $.post(url,dataSet,function(data){
      $('#matfive').load('<?php echo base_url('materialcode/get_spec'); ?>'+'/'+$("#mattypecodefive").val()+'/'+$("#matgroupcodefive").val()+'/'+$("#matsubgroupcodefive").val()+'/'+$("#matproductcodefive").val());
    });
});
</script>
<!-- modal  Add ตรา/ยี่ห้อ-->
 <div class="modal fade" id="newmatsix" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Brand</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">Brand Code</label>
                    <input type="text" id="matbrandcode" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">Brand Name</label>
                    <input type="text" id="matbrandname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                <input type="hidden" id="mattypecodesix" >
                <input type="hidden" id="matgroupcodesix">
                <input type="hidden" id="matsubgroupcodesix">
                <input type="hidden" id="matproductcodesix">
                <input type="hidden" id="matspeccodesix">
                    <a id="savebrand" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<!-- modal  Add ตรา/ยี่ห้อ-->
 <div class="modal fade" id="newmatseven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Unit</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">

            <!-- <legend class="text-muted"> Unit </legend> -->
            <div class="row">
              <div class="col-md-4">
                <label>Unit code.</label>
                <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-default btn-icon" type="button"><i class="icon-design"></i></button>
                </span>
                <input type="text" class="form-control" placeholder="" readonly  name="unitcode" id="unitcode" value="">

                <div class="input-group-btn">
                <button type="button" class="unitv btn btn-default btn-icon" data-toggle="modal" data-target="#unitsel"><i class="icon-search4"></i></button>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <label for="">Unit Name</label>
              <div class="form-group">
                <input type="text" class="form-control" readonly name="unitname" id="unit" value="">
              </div>
            </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="mattypecodesixu" >
                <input type="hidden" id="matgroupcodesixu">
                <input type="hidden" id="matsubgroupcodesixu">
                <input type="hidden" id="matproductcodesixu">
                <input type="hidden" id="matspeccodesixu">
                <input type="hidden" id="matbrandcodesixu">
                <input type="hidden" id="matunitcodue">
                <input type="hidden" id="matunitnameu">
                    <a id="saveunitname" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                    <script>

    $('#saveunitname').click(function(){
   var url="<?php echo base_url(); ?>datastore/Addmatunit";
    var dataSet={
        mattypecodeu: $('#mattypecodesixu').val(),
        matgroupcodeu:  $('#matgroupcodesixu').val(),
        matsubgroupcodeu:  $('#matsubgroupcodesixu').val(),
        matproductcodeu:  $('#matproductcodesixu').val(),
        matspeccodesixu: $('#matspeccodesixu').val(),
        matbrandcodeu:  $('#matbrandcodesixu').val(),
        matbrandnameu:  $('#matbrandname').val(),
        matunitu:  $('#unitcode').val(),
        matunitenameu:  $('#unit').val(),
        matterialname: $('#matnames').val(),
        matnamespecname: $("#matnamespecname").val(),
        materialbrandname: $("#matnamebrandname").val(),

        };
    $.post(url,dataSet,function(data){
        $('#matseven').load('<?php echo base_url('materialcode/get_unite'); ?>'+'/'+$("#mattypecodesixu").val()+'/'+$("#matgroupcodesixu").val()+'/'+$("#matsubgroupcodesixu").val()+'/'+$("#matproductcodesixu").val()+'/'+$("#matspeccodesixu").val()+'/'+$('#matbrandcodesixu').val()+'/'+$('#ematunitcodue').val());
    });
});
                    </script>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<div id="unitsel" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Unit</h5>
      </div>

      <div class="modal-body">
        <div class="loadunit">
          <table class="table table-striped table-xxs datatable-basicunit" >
          <thead>
          <tr>
          <th>Unit Code</th>
          <th>Unit Name</th>
          <th width="5%">จัดการ</th>
          </tr>
          </thead>
          <tbody>

          <?php $n = 1;?>
          <?php foreach ($getunit as $valj) {?>
          <tr>
          <th><?php echo $valj->unit_code; ?></th>
          <td><?php echo $valj->unit_name; ?></td>
          <td><button class="openun<?php echo $n; ?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-vunit<?php echo $n; ?>="<?php echo $valj->unit_name; ?>" data-unit_code<?php echo $n; ?>="<?php echo $valj->unit_code; ?>" data-dismiss="modal">Select</button></td>
          </tr>

          <script>
              $(".openun<?php echo $n; ?>").click(function(){
              $("#unitcode").val($(this).data('unit_code<?php echo $n; ?>'));
                $("#unit").val($(this).data('vunit<?php echo $n; ?>'));

               var bb =  $("#unitcode").val();
               var aa = $("#unit").val();


              });

            </script>

          <?php $n++;}?>
          </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิด</a>
      </div>
    </div>
  </div>
</div>

<script>

$('#savebrand').click(function(){
  var b8 = $('#unitcode').val();

   var url="<?php echo base_url(); ?>datastore/Addmatbrand";
    var dataSet={
        mattypecode: $('#mattypecodesix').val(),
        matgroupcode:  $('#matgroupcodesix').val(),
        matsubgroupcode:  $('#matsubgroupcodesix').val(),
        matproductcode:  $('#matproductcodesix').val(),
        matspeccodesix: $("#matspeccodesix").val(),
        matbrandcode:  $('#matbrandcode').val(),
        matbrandname:  $('#matbrandname').val(),
        matunit:  $('#unitcode').val()

        };
    $.post(url,dataSet,function(data){
        $('#matsix').load('<?php echo base_url('materialcode/get_brand'); ?>'+'/'+$("#mattypecodesix").val()+'/'+$("#matgroupcodesix").val()+'/'+$("#matsubgroupcodesix").val()+'/'+$("#matproductcodesix").val()+'/'+$("#matspeccodesix").val());
    });
});

</script>
<!-- modal  Add ตรา/ยี่ห้อ-->
 <div class="modal fade" id="ematfive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit  SPEC</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">Spec Code</label>
                    <input type="text" id="ematspeccode" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">Spec Name</label>
                    <input type="text" id="ematspecname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="emattypecodefive" >
                <input type="hidden" id="ematgroupcodefive">
                <input type="hidden" id="ematsubgroupcodefive">
                <input type="hidden" id="ematproductcodefive">
                    <a id="esavespec" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>

$('#esavespec').click(function(){
   var url="<?php echo base_url(); ?>datastore/editmatspec";
    var dataSet={
        mattypecode: $('#emattypecodefive').val(),
        matgroupcode:  $('#ematgroupcodefive').val(),
        matsubgroupcode:  $('#ematsubgroupcodefive').val(),
        matproductcode:  $('#ematproductcodefive').val(),
        matspeccode:  $('#ematspeccode').val(),
        matspecname:  $('#ematspecname').val()
        };
    $.post(url,dataSet,function(data){
      $('#matfive').load('<?php echo base_url('materialcode/get_spec'); ?>'+'/'+$("#emattypecodefive").val()+'/'+$("#ematgroupcodefive").val()+'/'+$("#ematsubgroupcodefive").val()+'/'+$("#ematproductcodefive").val());
    });
});
$("#dmatfive").click(function(){
  var url="<?php echo base_url(); ?>datastore/delmatspec";
   var dataSet={
       mattypecode: $('#emattypecodefive').val(),
       matgroupcode:  $('#ematgroupcodefive').val(),
       matsubgroupcode:  $('#ematsubgroupcodefive').val(),
       matproductcode:  $('#ematproductcodefive').val(),
       matspeccode:  $('#ematspeccode').val(),
       matspecname:  $('#ematspecname').val()
       };
   $.post(url,dataSet,function(data){
     $('#matfive').load('<?php echo base_url('materialcode/get_spec'); ?>'+'/'+$("#emattypecodefive").val()+'/'+$("#ematgroupcodefive").val()+'/'+$("#ematsubgroupcodefive").val()+'/'+$("#ematproductcodefive").val());

   });
});
</script>
<!-- modal  Add ตรา/ยี่ห้อ-->
<div class="modal fade" id="ematsix" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Brand</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">Brand Code</label>
                    <input type="text" id="ematbrandcode" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">Brand Name</label>
                    <input type="text" id="ematbrandname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <legend class="text-muted"> Unit </legend> -->

            <div class="row">
                <div class="text-right">
                <input type="hidden" id="emattypecodesix" >
                <input type="hidden" id="ematgroupcodesix">
                <input type="hidden" id="ematsubgroupcodesix">
                <input type="hidden" id="ematproductcodesix">
                <input type="hidden" id="ematspeccodesix">
                    <a id="esavebrand" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<!-- modal  Add ตรา/ยี่ห้อ-->
 <div class="modal fade" id="ematseven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Unit</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">

            <!-- <legend class="text-muted"> Unit </legend> -->
            <div class="row">
              <div class="col-md-4">
                <label>Unit code.</label>
                <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-default btn-icon" type="button"><i class="icon-design"></i></button>
                </span>
                <input type="text" class="form-control" placeholder="" readonly  name="eunitcode" id="eunitcode" value="">

                <div class="input-group-btn">
                <button type="button" class="unitv btn btn-info btn-icon" data-toggle="modal" data-target="#unitsel2"><i class="icon-search4"></i></button>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <label for="">Unit Name</label>
              <div class="form-group">
                <input type="text" class="form-control" readonly name="eunitname" id="eunit" value="">
              </div>
            </div>
            </div>
            <div class="row">
                <div class="text-right">

                <input type="hidden" id="emattypecodesixu" >
                <input type="hidden" id="ematgroupcodesixu">
                <input type="hidden" id="ematsubgroupcodesixu">
                <input type="hidden" id="ematproductcodesixu">
                <input type="hidden" id="ematspeccodesixu">
                <input type="hidden" id="ematbrandcodesixu">
                <input type="hidden" id="ematunitcodue">
                <input type="hidden" id="ematunitnameu">
                <input type="hidden" id="ematunitidue" >
                    <a id="esaveunitname" data-dismiss="modal" class="btn bg-success"><i class="icon-floppy-disk"></i> Save</a>
                    <script>
    $('#esaveunitname').click(function(){
   var url="<?php echo base_url(); ?>datastore/editmatunit";
    var dataSet={
      ematunitidue: $('#ematunitidue').val(),
        emattypecodeu: $('#emattypecodesixu').val(),
        ematgroupcodeu:  $('#ematgroupcodesixu').val(),
        ematsubgroupcodeu:  $('#ematsubgroupcodesixu').val(),
        ematproductcodeu:  $('#ematproductcodesixu').val(),
        ematspeccodesixu: $('#ematspeccodesixu').val(),
        ematbrandcodeu:  $('#ematbrandcodesixu').val(),

        ematunitu:  $('#eunitcode').val(),
        ematunitenameu:  $('#eunit').val(),
        matterialname: $('#matnames').val(),

        };
    $.post(url,dataSet,function(data){
        $('#matseven').load('<?php echo base_url('materialcode/get_unite'); ?>'+'/'+$("#mattypecodesixu").val()+'/'+$("#matgroupcodesixu").val()+'/'+$("#matsubgroupcodesixu").val()+'/'+$("#matproductcodesixu").val()+'/'+$("#matspeccodesixu").val()+'/'+$('#matbrandcodesixu').val()+'/'+$('#ematunitcodue').val());
    });
});

    $("#dmatseven").click(function(){
      var url="<?php echo base_url(); ?>datastore/delditmatunit";
      var dataSet={
      ematunitidue: $('#ematunitidue').val(),
        emattypecodeu: $('#emattypecodesixu').val(),
        ematgroupcodeu:  $('#ematgroupcodesixu').val(),
        ematsubgroupcodeu:  $('#ematsubgroupcodesixu').val(),
        ematproductcodeu:  $('#ematproductcodesixu').val(),
        ematspeccodesixu: $('#ematspeccodesixu').val(),
        ematbrandcodeu:  $('#ematbrandcodesixu').val(),

        };
    $.post(url,dataSet,function(data){
        $('#matseven').load('<?php echo base_url('materialcode/get_unite'); ?>'+'/'+$("#mattypecodesixu").val()+'/'+$("#matgroupcodesixu").val()+'/'+$("#matsubgroupcodesixu").val()+'/'+$("#matproductcodesixu").val()+'/'+$("#matspeccodesixu").val()+'/'+$('#matbrandcodesixu').val()+'/'+$('#ematunitcodue').val());
    });
    });
                    </script>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<div id="unitsel2" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">unit</h5>
      </div>

      <div class="modal-body">
        <div class="loadunit">
          <table class="table table-striped table-xxs datatable-basicunit" >
          <thead>
          <tr>
          <th>Unit Code.</th>
          <th>Unit Name</th>
          <th width="5%">จัดการ</th>
          </tr>
          </thead>
          <tbody>

          <?php $n = 1;?>
          <?php foreach ($getunit as $valj) {?>
          <tr>
          <td><?php echo $valj->unit_code; ?></td>
          <td><?php echo $valj->unit_name; ?></td>
          <td><button class="openun<?php echo $n; ?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-vunit<?php echo $n; ?>="<?php echo $valj->unit_name; ?>" data-unit_code<?php echo $n; ?>="<?php echo $valj->unit_code; ?>" data-dismiss="modal">เลือก</button></td>
          </tr>

          <script>
              $(".openun<?php echo $n; ?>").click(function(){
              $("#eunitcode").val($(this).data('unit_code<?php echo $n; ?>'));
                $("#eunit").val($(this).data('vunit<?php echo $n; ?>'));
              });

            </script>

          <?php $n++;}?>
          </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <a type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิด</a>
      </div>
    </div>
  </div>
</div>
<script>
$('#esavebrand').click(function(){
   var url="<?php echo base_url(); ?>datastore/editmatbrand";
    var dataSet={
        mattypecode: $('#emattypecodesix').val(),
        matgroupcode:  $('#ematgroupcodesix').val(),
        matsubgroupcode:  $('#ematsubgroupcodesix').val(),
        matproductcode:  $('#ematproductcodesix').val(),
        matspeccode: $("#ematspeccodesix").val(),
        matbrandcode:  $('#ematbrandcode').val(),
        matbrandname:  $('#ematbrandname').val(),
        matunit:  $('#eunitcode').val()
        };
    $.post(url,dataSet,function(data){
      $('#matsix').load('<?php echo base_url('materialcode/get_brand'); ?>'+'/'+$("#emattypecodesix").val()+'/'+$("#ematgroupcodesix").val()+'/'+$("#ematsubgroupcodesix").val()+'/'+$("#ematproductcodesix").val()+'/'+$("#ematspeccodesix").val());
    });
});
$("#dmatsix").click(function(){
  var url="<?php echo base_url(); ?>datastore/delmatbrand";
   var dataSet={
     mattypecode: $('#emattypecodesix').val(),
     matgroupcode:  $('#ematgroupcodesix').val(),
     matsubgroupcode:  $('#ematsubgroupcodesix').val(),
     matproductcode:  $('#ematproductcodesix').val(),
     matspeccode: $("#ematspeccodesix").val(),
     matbrandcode:  $('#ematbrandcode').val(),
     matbrandname:  $('#ematbrandname').val()
       };
   $.post(url,dataSet,function(data){
     $('#matsix').load('<?php echo base_url('materialcode/get_brand'); ?>'+'/'+$("#emattypecodesix").val()+'/'+$("#ematgroupcodesix").val()+'/'+$("#ematsubgroupcodesix").val()+'/'+$("#ematproductcodesix").val()+'/'+$("#ematspeccodesix").val());

   });
});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script>

// $(document).ready(function(){
  $(".newmatseven").click(function(){
  $("#unitcode").val('');
  $("#unit").val("");
});

  $(".newmattwo").hide();
  $(".newmattree").hide();
  $(".newmatfive").hide();
  $(".newmatfor").hide();
  $(".newmatsix").hide();
  $(".newmatseven").hide();
  $("#btncostup").hide();
  $('#matone').load('<?php echo base_url('materialcode/get_type'); ?>');

    $( "#matone" ).change(function() {
          var b1 = $('#matone').val();
          $('#mattwo').load('<?php echo base_url('materialcode/get_group/'); ?>'+'/'+b1);
          $(".newmattree").hide();
          $(".newmattwo").hide();
          $(".newmatone").show();
          $('#mattree').html('');
          $('#matfor').html('');
          $("#matcode").val(b1);
          $("#btncostup").hide();
          $("#mattypecode").val(b1);
        var newmatn = $("#newmatname").val();
        $("#matgroup_name").val(newmatn);

   });
   $( "#matone" ).click(function() {
       var b1 = $('#matone').val();
       var newmatn = $("#newmatname").val();
       $('#mattwo').load('<?php echo base_url('materialcode/get_group/'); ?>'+'/'+b1);
       $(".newmatsix").hide();
       $(".newmatfive").hide();
       $(".newmatfor").hide();
       $(".newmattree").hide();
       $(".newmattwo").hide();
       $(".newmatone").show();
       $(".newmatseven").hide();
       $('#mattree').html('');
       $('#matfor').html('');
       $('#matfive').html('');
       $('#matsix').html('');
       $('#matseven').html('');
       $("#matcode").val(b1);
       $("#btncostup").hide();
       $("#emattype_code").val(b1);
       var b1 = $('#matone').val();
       var url="<?php echo base_url(); ?>materialcode/gettypename"+'/'+b1;
       var dataSet={
         };
         $.post(url,dataSet,function(data){
           $("#emattype_name").val(data);
           $("#emattype_code").val(b1);
           $("#ttypename").val(data);
           $("#matnamed").val(data);
            $("#tgroupname").val("");
           });
  });
   $( "#mattwo" ).change(function() {
     $(".newmatsix").hide();
        $(".newmatfive").hide();
        $(".newmatfor").hide();
        $(".newmattree").hide();
        $(".newmattwo").show();
        $(".newmatone").hide();
        $(".newmatseven").hide();
        var b1 = $('#matone').val();
        var b2 = $('#mattwo').val();

        $('#mattree').load('<?php echo base_url('materialcode/get_subgroup/'); ?>'+'/'+b1+'/'+b2);
        $('#matfor').html('');
        $("#matcode").val(b1+b2);
        $("#tgroupname").val();
        $("#btncostup").hide();
        $("#mattypecodetree").val(b1);
        $("#matgroupcodetree").val(b2);

  });
  $( "#mattwo" ).click(function() {
    $(".newmatsix").hide();
       $(".newmatfive").hide();
       $(".newmatfor").hide();
       $(".newmattree").hide();
       $(".newmattwo").show();
       $(".newmatone").hide();
       $(".newmatseven").hide();
       var b1 = $('#matone').val();
       var b2 = $('#mattwo').val();
       var t1 = $("#ttypename").val();
       $('#mattree').load('<?php echo base_url('materialcode/get_subgroup/'); ?>'+'/'+b1+'/'+b2);
       $('#matfor').html('');
       $('#matfive').html('');
       $('#matsix').html('');
       $('#matseven').html('');
       $("#matcode").val(b1+b2);
       $("#btncostup").hide();
       var url="<?php echo base_url(); ?>materialcode/getgroupname"+'/'+b1+'/'+b2;
       var dataSet={
         };
         $.post(url,dataSet,function(data){
           $("#ematgroup_name").val(data);
           $("#ematgroup_code").val(b2);
           $("#emattypecode").val(b1);
           $("#tgroupname").val(data);
           $("#matnamed").val(t1+' -> '+data);

           });
 });
  $( "#mattree" ).change(function() {
      var b1 = $('#matone').val();
       var b2 = $('#mattwo').val();
       var b3 = $('#mattree').val();
       $('#matfor').load('<?php echo base_url('materialcode/get_product/'); ?>'+'/'+b1+'/'+b2+'/'+b3);
       $(".newmatsix").hide();
       $(".newmatseven").hide();
       $(".newmatfive").hide();
       $(".newmatfor").hide();
       $(".newmattree").show();
       $(".newmattwo").hide();
       $(".newmatone").hide();
       $("#matcode").val(b1+b2+b3);
       $("#btncostup").hide();
  });
  $( "#mattree" ).click(function() {
      var b1 = $('#matone').val();
       var b2 = $('#mattwo').val();
       var b3 = $('#mattree').val();
       var t1 = $("#ttypename").val();
       var t2 = $("#tgroupname").val();
       $('#matfor').load('<?php echo base_url('materialcode/get_product/'); ?>'+'/'+b1+'/'+b2+'/'+b3);
       $(".newmatsix").hide();
       $(".newmatfive").hide();
       $(".newmatfor").hide();
       $(".newmattree").show();
       $(".newmatseven").hide();
       $(".newmattwo").hide();
       $(".newmatone").hide();
       $('#matfive').html('');
       $('#matsix').html('');
       $('#matseven').html('');
       $("#matcode").val(b1+b2+b3);
       $("#btncostup").hide();
       $("#mattypecodefor").val(b1);
       $("#matgroupcodefor").val(b2);
       $("#matsubgroupcodefor").val(b3);
       var url="<?php echo base_url(); ?>materialcode/getproductname"+'/'+b1+'/'+b2+'/'+b3;
       var dataSet={
         };
         $.post(url,dataSet,function(data){
           $("#ematsubgroup_name").val(data);
           $("#ematsubgroup_code").val(b3);
           $("#emattypecodetree").val(b1);
           $("#ematgroupcodetree").val(b2);
           $("#tsubgroupname").val(data);
           $("#matnamed").val(t1+' -> '+t2+' -> '+data);
           });
  });
  $( "#matfor" ).change(function() {
      var b1 = $('#matone').val();
      var b2 = $('#mattwo').val();
      var b3 = $('#mattree').val();
      var b4 = $('#matfor').val();
        $('#matfive').load('<?php echo base_url('materialcode/get_spec'); ?>'+'/'+b1+'/'+b2+'/'+b3+'/'+b4);
        $(".newmatsix").hide();
        $(".newmatfive").hide();
        $(".newmatfor").show();
        $(".newmatseven").hide();
        $(".newmattree").hide();
        $(".newmattwo").hide();
        $(".newmatone").hide();
        $("#matcode").val(b1+b2+b3+b4);
        $("#btncostup").hide();
        $("#mattypecodefive").val(b1);
        $("#matgroupcodefive").val(b2);
        $("#matsubgroupcodefive").val(b3);
        $("#matproductcodefive").val(b4);
  });
  $( "#matfor" ).click(function() {
      var b1 = $('#matone').val();
      var b2 = $('#mattwo').val();
      var b3 = $('#mattree').val();
      var b4 = $('#matfor').val();
      var t1 = $("#ttypename").val();
       var t2 = $("#tgroupname").val();
       var t3 = $("#tsubgroupname").val();
        $('#matfive').load('<?php echo base_url('materialcode/get_spec'); ?>'+'/'+b1+'/'+b2+'/'+b3+'/'+b4);
        $(".newmatsix").hide();
        $(".newmatfive").hide();
        $(".newmatseven").hide();
        $(".newmatfor").show();
        $(".newmattree").hide();
        $(".newmattwo").hide();
        $(".newmatone").hide();
        $('#matsix').html('');
        $('#matseven').html('');
        $("#matcode").val(b1+b2+b3+b4);
        $("#btncostup").hide();
        var url="<?php echo base_url(); ?>materialcode/getunitnamen"+'/'+b1+'/'+b2+'/'+b3+'/'+b4;
        var dataSet={
          };
          $.post(url,dataSet,function(data){
            $("#ematproductname").val(data);
            $("#ematproductcode").val(b4);
            $("#emattypecodefor").val(b1);
            $("#ematgroupcodefor").val(b2);
            $("#ematsubgroupcodefor").val(b3);
            $("#tproductname").val(data);
            $("#matnamed").val(t1+' -> '+t2+' -> '+t3+' -> '+data);
            $("#matnames").val(data);
            });
  });
  $( "#matfive" ).change(function() {
      var b1 = $('#matone').val();
      var b2 = $('#mattwo').val();
      var b3 = $('#mattree').val();
      var b4 = $('#matfor').val();
      var b5 = $('#matfive').val();
      $(".newmatsix").hide();
        $(".newmatfive").show();
        $(".newmatfor").hide();
        $(".newmatseven").hide();
        $(".newmattree").hide();
        $(".newmattwo").hide();
        $(".newmatone").hide();
        $("#matcode").val(b1+b2+b3+b4+b5);
        $("#mattypecodesix").val(b1);
        $("#matgroupcodesix").val(b2);
        $("#matsubgroupcodesix").val(b3);
        $("#matproductcodesix").val(b4);
        $("#matspeccodesix").val(b5);

        // $("#btncostup").show();
  });
  $( "#matfive" ).click(function() {
      var b1 = $('#matone').val();
      var b2 = $('#mattwo').val();
      var b3 = $('#mattree').val();
      var b4 = $('#matfor').val();
      var b5 = $('#matfive').val();
      var t1 = $("#ttypename").val();
       var t2 = $("#tgroupname").val();
       var t3 = $("#tsubgroupname").val();
       var t4 = $("#tproductname").val();
        $('#matsix').load('<?php echo base_url('materialcode/get_brand'); ?>'+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5);
      $(".newmatsix").hide();
      $(".newmatseven").hide();
        $(".newmatfive").show();
        $(".newmatfor").hide();
        $(".newmattree").hide();
        $(".newmattwo").hide();
        $(".newmatone").hide();
        $("#matcode").val(b1+b2+b3+b4+b5);
        // $("#btncostup").show();
        $("#matseven").html('');
        var url="<?php echo base_url(); ?>materialcode/getbranname"+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5;
        var dataSet={
          };
          $.post(url,dataSet,function(data){
            $("#ematspecname").val(data);
            $("#ematspeccode").val(b5);
            $("#emattypecodefive").val(b1);
            $("#ematgroupcodefive").val(b2);
            $("#ematsubgroupcodefive").val(b3);
            $("#ematproductcodefive").val(b4);
            $("#tspecname").val(data);
            $("#matnamed").val(t1+' -> '+t2+' -> '+t3+' -> '+t4+' -> '+data);
            $("#matnames").val(t4);
            $("#matnamespecname").val(data);
            });
  });

  $( "#matsix" ).change(function() {
      var b1 = $('#matone').val();
      var b2 = $('#mattwo').val();
      var b3 = $('#mattree').val();
      var b4 = $('#matfor').val();
      var b5 = $('#matfive').val();
      var b6 = $('#matsix').val();
      $(".newmatsix").show();
        $(".newmatfive").hide();
        $(".newmatfor").hide();
        $(".newmatseven").hide();
        $(".newmattree").hide();
        $(".newmattwo").hide();
        $(".newmatone").hide();
        $("#matcode").val(b1+b2+b3+b4+b5+b6);
        $("#mattypecodesix").val(b1);
        $("#matgroupcodesix").val(b2);
        $("#matsubgroupcodesix").val(b3);
        $("#matproductcodesix").val(b4);
        $("#matspeccodesix").val(b5);
        $("#matbrandcodesix").val(b6);

        // $("#btncostup").show();
  });
  $( "#matsix" ).click(function() {
      var b1 = $('#matone').val();
      var b2 = $('#mattwo').val();
      var b3 = $('#mattree').val();
      var b4 = $('#matfor').val();
      var b5 = $('#matfive').val();
      var b6 = $('#matsix').val();
      var t1 = $("#ttypename").val();
       var t2 = $("#tgroupname").val();
       var t3 = $("#tsubgroupname").val();
       var t4 = $("#tproductname").val();
       var t5 = $("#tspecname").val();
        $('#matseven').load('<?php echo base_url('materialcode/get_unite'); ?>'+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5+'/'+b6);
      $(".newmatsix").show();
      $(".newmatseven").hide();
        $(".newmatfive").hide();
        $(".newmatfor").hide();
        $(".newmattree").hide();
        $(".newmattwo").hide();
        $(".newmatone").hide();
        $("#matcode").val(b1+b2+b3+b4+b5+b6);

        // $("#btncostup").show();
      var url="<?php echo base_url(); ?>materialcode/getbrannamesix"+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5+'/'+b6;
        var url2="<?php echo base_url(); ?>materialcode/getbranunitsix"+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5+'/'+b6;

        var dataSet={
          };
          $.post(url,dataSet,function(data){
            $("#ematbrandname").val(data);
            $("#tbrandname").val(data);
            $('#matnamed').val(t1+' -> '+t2+' -> '+t3+' -> '+t4+' -> '+t5+' -> '+data);
            $("#matnames").val(t4);
            $("#matnamespecname").val(t5);
            $("#matnamebrandname").val(data);

            });
            $.post(url2,dataSet,function(data2){
              $("#eunitcode").val(data2);
              var url3="<?php echo base_url(); ?>materialcode/getunit_name"+'/'+data2;
              var dataSet={
            };
              $.post(url3,dataSet,function(data3){
                $("#eunitname").val(data3);

                $("#ematbrandcode").val(b6);
                $("#emattypecodesix").val(b1);
                $("#ematgroupcodesix").val(b2);
                $("#ematsubgroupcodesix").val(b3);
                $("#ematproductcodesix").val(b4);
                $("#ematspeccodesix").val(b5);
                });

            });
  });

 $("#savebrand").click(function(){
    $("#matbrandcode").val(" ");
    $("#matbrandname").val(" ");
    $("#unitcode").val(" ");
    $("#unit").val(" ");
    });

$( "#matseven" ).change(function() {
      var b1 = $('#matone').val();
      var b2 = $('#mattwo').val();
      var b3 = $('#mattree').val();
      var b4 = $('#matfor').val();
      var b5 = $('#matfive').val();
      var b6 = $('#matsix').val();
      var b7 = $('#matseven').val();
      $(".newmatsix").hide();
        $(".newmatfive").hide();
        $(".newmatfor").hide();
        $(".newmatseven").show();
        $(".newmattree").hide();
        $(".newmattwo").hide();
        $(".newmatone").hide();

        $("#matcode").val(b1+b2+b3+b4+b5+b6);

        $("#btncostup").show();
  });
 $("#saveunitename").click(function(){
    $("#matbrandcodeu").val(" ");
    $("#matbrandnameu").val(" ");
    $("#unitcodeu").val(" ");
    $("#unit").val(" ");
    });

  $( "#matseven" ).click(function() {

      var b1 = $('#matone').val();
      var b2 = $('#mattwo').val();
      var b3 = $('#mattree').val();
      var b4 = $('#matfor').val();
      var b5 = $('#matfive').val();
      var b6 = $('#matsix').val();
      var b9 = $('#matseven').val();
      var b7 = $("#unitcode").val();
      var b8 = $("#unit").val();
var t1 = $("#ttypename").val();
       var t2 = $("#tgroupname").val();
       var t3 = $("#tsubgroupname").val();
       var t4 = $("#tproductname").val();
       var t5 = $("#tspecname").val();
       var t6 = $("#tunitname").val();


       $("#mattypecodesixu").val(b1);
        $("#matgroupcodesixu").val(b2);
        $("#matsubgroupcodesixu").val(b3);
        $("#matproductcodesixu").val(b4);
        $("#matspeccodesixu").val(b5);
        $("#matbrandcodesixu").val(b6);
        $("#matunitcodue").val(b7);
        $("#matunitnameu").val(b8);
        $("#eunitcode").val(b9);

        $(".newmatsix").hide();
        $(".newmatfive").hide();
        $(".newmatseven").show();
        $(".newmatfor").hide();
        $(".newmattree").hide();
        $(".newmattwo").hide();
        $("#matcode").val(b1+b2+b3+b4+b5+b6+b9);

        $("#btncostup").show();

        var url="<?php echo base_url(); ?>materialcode/getunitcodeseven"+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5+'/'+b6+'/'+b9;
        var url2="<?php echo base_url(); ?>materialcode/getunitcodesevenid"+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5+'/'+b6+'/'+b9;

        var dataSet={
          };
          $.post(url,dataSet,function(data){
            $("#eunit").val(data);
            $("#ematbrandcodesixu").val(b6);
                $("#emattypecodesixu").val(b1);
                $("#ematgroupcodesixu").val(b2);
                $("#ematsubgroupcodesixu").val(b3);
                $("#ematproductcodesixu").val(b4);
                $("#ematspeccodesixu").val(b5);
                $("#tunitname").val(data);
                $("#matnamed").val(t1+' -> '+t2+' -> '+t3+' -> '+t4+' -> '+t5+' -> '+t6+' -> '+data);
            });
            $.post(url2,dataSet,function(data2){
              $("#ematunitidue").val(data2);
            });

  });

  $("#btncostup").click(function(){
    var b1 = $('#matone').val();
    var b2 = $('#mattwo').val();
    var b3 = $('#mattree').val();
    var b4 = $('#matfor').val();
    var b5 = $('#matfive').val();
    var b6 = $('#matsix').val();
    var b7 = $('#matseven').val();
    var url="<?php echo base_url(); ?>materialcode/getname"+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5+'/'+b6;
    var dataSet={
      };
      $.post(url,dataSet,function(data){
        $("#newmatname").val(data);
        $("#newmatcode").val(b1+b2+b3+b4+b5+b6);
        $("#error").attr("class", "input-group has-success has-feedback");
        var url="<?php echo base_url(); ?>materialcode/getunitname"+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5+'/'+b6;
        var dataSet={
          };
          $.post(url,dataSet,function(data){
            $("#punit").val(data);
          });
        });
  });

// });
$("#stype").keyup(function(event) {
   var b1 = $('#stype').val();
  $("#matone").load('<?php echo base_url('materialcode/getmattype_where'); ?>'+'/'+b1);
});
$("#sgroup").keyup(function(event) {

var url="<?php echo base_url(); ?>materialcode/getmatgroup_where";
  var dataSet={
      name : $('#sgroup').val()
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////
  $("#mattwo").html(data);
  //alert(data);
});
});
$("#ssubgroup").keyup(function(event) {
var b1 = $('#matone').val();
var b2 = $('#mattwo').val();
var url="<?php echo base_url(); ?>materialcode/getmatsubgroup_where"+'/'+b1+'/'+b2;
  var dataSet={
      name : $('#ssubgroup').val()
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////
  $("#mattree").html(data);
  //alert(data);
});
});
$("#sgroupp").keyup(function(event) {
console.log($("#sgroupp").val());
var b1 = $('#matone').val();
console.log(b1);
var b2 = $('#mattwo').val();
console.log(b2);
var b3 = $('#mattree').val();
console.log(b3);
var url="<?php echo base_url(); ?>materialcode/getproductgroup_where"+'/'+b1+'/'+b2+'/'+b3;
  var dataSet={
      name : $('#sgroupp').val()
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////
  $("#matfor").html(data);
  //alert(data);
});
});

</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script type="text/javascript">
  $("input").keyup(function(){
     checkText($(this));
  });
</script>
<script>
  $('.datatable-basicunit').DataTable();
  $('#mpo').attr('class', 'active');
  $('#mpo1').attr('style', 'background-color:#dedbd8');
</script>
