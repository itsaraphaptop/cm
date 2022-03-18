
<div class="row">
                 <!--  <button type="button" data-toggle="modal" data-target="#newmatone<?php echo $id; ?>" class="newmatone<?php echo $id; ?> btn btn-primary btn-sm" style="display: block;"><i class="icon-plus-circle2"></i> เพิ่มหมวด</button>
                  <button type="button" data-toggle="modal" data-target="#newmattwo<?php echo $id; ?>" class="newmattwo<?php echo $id; ?> btn btn-primary btn-sm" style="display: block;"><i class="icon-plus-circle2"></i> เพิ่มชือวัสดุ</button>
                  <button type="button" data-toggle="modal" data-target="#newmattree<?php echo $id; ?>" class="newmattree<?php echo $id; ?> btn btn-primary btn-sm" style="display: block;"><i class="icon-plus-circle2"></i> เพิ่มขนาดวัสดุ</button>
                  <button type="button" data-toggle="modal" data-target="#newmatfor<?php echo $id; ?>" class="newmatfor<?php echo $id; ?> btn btn-primary btn-sm" style="display: block;"><i class="icon-plus-circle2"></i> เพิ่มหน่วยวัสดุุ</button>
                  <button type="button" data-toggle="modal" data-target="#newmatfive<?php echo $id; ?>" class="newmatfive<?php echo $id; ?> btn btn-primary btn-sm" style="display: block;"><i class="icon-plus-circle2"></i> เพิ่มตรา/ยี่ห้อ</button> -->

    <div id="tabmatone<?php echo $id; ?>" class="col-md-4">
        <h4>TYPE</h4>
         <input type="text" class="form-control input-sm" id=stype placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="matone<?php echo $id; ?>" style="height:150px;"></select>
    </div>
    <div id="tabmattwo<?php echo $id; ?>" class="col-md-4">

         <h4>GROUP</h4>
         <input type="text" class="form-control input-sm" id="sgroup" placeholder="ค้นหาโดยชื่อ">
         <p></p>
         <select multiple class="form-control" class="" id="mattwo<?php echo $id; ?>" style="height:150px;"></select>

    </div>
    <div id="tabmattree<?php echo $id; ?>" class="col-md-4">
         <h4>รายการขนาดวัสดุ</h4>
          <input type="text" class="form-control input-sm">
         <p></p>
        <select multiple class="form-control" id="mattree<?php echo $id; ?>" style="height:150px;"></select>
                       </div>
     <div id="tabmatfor<?php echo $id; ?>" class="col-md-6">
       <h4>รายการหน่วยวัสดุ</h4>
        <!-- <input type="text" class="form-control input-sm"> -->
         <p></p>
        <select multiple class="form-control" id="matfor<?php echo $id; ?>" style="height:150px;"></select>

     </div>
     <div id="tabmatfive<?php echo $id; ?>" class="col-md-6">
       <h4>รายการตรา/ยี่ห้อ/สี</h4>
        <!-- <input type="text" class="form-control input-sm"> -->
         <p></p>
        <select multiple class="form-control" id="matfive<?php echo $id; ?>" style="height:150px;"></select>

     </div>
     <br>
<div class="form-group">


        <hr>
        <div class="col-md-4">
          <input type="text" class="form-control input-sm" readonly name="matcode<?php echo $id; ?>" id="matcode<?php echo $id; ?>">
          <!-- <input type="text" class="form-control input-sm" readonly name="matname<?php echo $id; ?>" id="matname<?php echo $id; ?>"> -->
        </div>
        <div class="col-md-4 col-md-offset-4 text-right">
              <button class="btn btn-primary"  data-dismiss="modal" id="btncostup<?php echo $id; ?>">เลือก</button>
        </div>
</div>
</div>

<!-- modal  หมวด-->
 <div class="modal fade" id="newmatone<?php echo $id; ?>" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-teal-300">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มหมวด Meterial <?php echo $id; ?></h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row">
                  <div class="row">
                        <div class="col-xs-6">
                             <div class="form-group">
                            <label for="typecode">Type Code</label>
                            <input type="text" id="mattype_code<?php echo $id; ?>" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-6">
                             <div class="form-group">
                            <label for="typename">Type Name</label>
                            <input type="text" id="mattype_name<?php echo $id; ?>" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="text-right">
                    <a id="savetype<?php echo $id;?>" data-dismiss="modal" class="btn bg-teal-600">ยืนยันการเพิ่มข้อมูล</a>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#savetype<?php echo $id;?>').click(function(){
     var url="<?php echo base_url(); ?>datastore/addmattype";
      var dataSet={
          mattypecode:  $('#mattype_code<?php echo $id; ?>').val(),
          mattypename:  $('#mattype_name<?php echo $id; ?>').val()
          };
      $.post(url,dataSet,function(data){
              alert(data);
              $('#matone<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_type');?>');

      });
  });
</script>
<!-- modal  ชือวัสดุ-->
 <div class="modal fade" id="newmattwo<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-teal-300">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มชือวัสดุ</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">Group Code</label>
                    <input type="text" id="matgroup_code<?php echo $id; ?>" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">Group Name</label>
                    <input type="text" id="matgroup_name<?php echo $id; ?>" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="mattypecode<?php echo $id; ?>">
                    <button id="savegroup<?php echo $id; ?>" data-dismiss="modal" class="btn bg-teal-600">ยืนยันการเพิ่มข้อมูล</button>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#savegroup<?php echo $id; ?>').click(function(){
   var url="<?php echo base_url(); ?>datastore/addmatgroup";
    var dataSet={
        mattypecode: $('#mattypecode<?php echo $id; ?>').val(),
        matgroupcode:  $('#matgroup_code<?php echo $id; ?>').val(),
        matgroupname:  $('#matgroup_name<?php echo $id; ?>').val()
        };
    $.post(url,dataSet,function(data){
            alert(data);
    });
});
</script>
<!-- modal  ขนาดวัสดุ-->
 <div class="modal fade" id="newmattree<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content  bg-teal-300">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มขนาดวัสดุ</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">SubGroup Code</label>
                    <input type="text" id="matsubgroup_code<?php echo $id; ?>" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">SubGroup Name</label>
                    <input type="text" id="matsubgroup_name<?php echo $id; ?>" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="mattypecodetree<?php echo $id; ?>">
                <input type="hidden" id="matgroupcodetree<?php echo $id; ?>">
                    <button id="savesubgroup<?php echo $id; ?>" data-dismiss="modal" class="btn  bg-teal-600">ยืนยันการเพิ่มข้อมูล</button>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#savesubgroup<?php echo $id; ?>').click(function(){
   var url="<?php echo base_url(); ?>datastore/addmatsubgroup";
    var dataSet={
        mattypecode: $('#mattypecodetree<?php echo $id; ?>').val(),
        matgroupcode:  $('#matgroupcodetree<?php echo $id; ?>').val(),
        matsubgroupcode:  $('#matsubgroup_code<?php echo $id; ?>').val(),
        matsubgroupname:  $('#matsubgroup_name<?php echo $id; ?>').val()
        };
    $.post(url,dataSet,function(data){
            alert(data);
    });
});
</script>
<!-- modal  หน่วยวัสดุ-->
 <div class="modal fade" id="newmatfor<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-teal-300">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">หน่วยวัสดุ</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">Unit Code</label>
                    <input type="text" id="matproductcode<?php echo $id; ?>" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">Unit Name</label>
                    <input type="text" id="matproductname<?php echo $id; ?>" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="mattypecodefor<?php echo $id; ?>" >
                <input type="hidden" id="matgroupcodefor<?php echo $id; ?>">
                <input type="hidden" id="matsubgroupcodefor<?php echo $id; ?>">
                    <button id="saveunit<?php echo $id; ?>" data-dismiss="modal" class="btn bg-teal-600">ยืนยันการเพิ่มข้อมูล</button>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#saveunit<?php echo $id; ?>').click(function(){
   var url="<?php echo base_url(); ?>datastore/addmatproduct";
    var dataSet={
        mattypecode: $('#mattypecodefor<?php echo $id; ?>').val(),
        matgroupcode:  $('#matgroupcodefor<?php echo $id; ?>').val(),
        matsubgroupcode:  $('#matsubgroupcodefor<?php echo $id; ?>').val(),
        matproductcode:  $('#matproductcode<?php echo $id; ?>').val(),
        matproductname:  $('#matproductname<?php echo $id; ?>').val()
        };
    $.post(url,dataSet,function(data){
    });
});
</script>
<!-- modal  เพิ่มตรา/ยี่ห้อ-->
 <div class="modal fade" id="newmatfive<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-teal-300">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มตรา/ยี่ห้อ</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typecode">SubGroup Code</label>
                    <input type="text" id="matspeccode<?php echo $id; ?>" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-6">
                     <div class="form-group">
                    <label for="typename">SubGroup Name</label>
                    <input type="text" id="matspecname<?php echo $id; ?>" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right">
                <input type="hidden" id="mattypecodefive<?php echo $id; ?>" >
                <input type="hidden" id="matgroupcodefive<?php echo $id; ?>">
                <input type="hidden" id="matsubgroupcodefive<?php echo $id; ?>">
                <input type="hidden" id="matproductcodefive<?php echo $id; ?>">
                    <a id="savespec<?php echo $id; ?>" data-dismiss="modal" class="btn bg-teal-600">ยืนยันการเพิ่มข้อมูล</a>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$('#savespec<?php echo $id; ?>').click(function(){
   var url="<?php echo base_url(); ?>datastore/addmatspec";
    var dataSet={
        mattypecode: $('#mattypecodefive<?php echo $id; ?>').val(),
        matgroupcode:  $('#matgroupcodefive<?php echo $id; ?>').val(),
        matsubgroupcode:  $('#matsubgroupcodefive<?php echo $id; ?>').val(),
        matproductcode:  $('#matproductcodefive<?php echo $id; ?>').val(),
        matspeccode:  $('#matspeccode<?php echo $id; ?>').val(),
        matspecname:  $('#matspecname<?php echo $id; ?>').val()
        };
    $.post(url,dataSet,function(data){
    });
});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script>

// $(document).ready(function(){
  $(".newmattwo<?php echo $id; ?>").hide();
  $(".newmattree<?php echo $id; ?>").hide();
  $(".newmatfive<?php echo $id; ?>").hide();
  $(".newmatfor<?php echo $id; ?>").hide();
  $("#btncostup<?php echo $id; ?>").hide();
  $("#sgroup").prop('disabled', true);
  $('#matone<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_type');?>');
  // });

    $( "#matone<?php echo $id; ?>" ).change(function() {
          var b1 = $('#matone<?php echo $id; ?>').val();
          $('#mattwo<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_group/');?>'+'/'+b1);
          $(".newmattree<?php echo $id; ?>").hide();
          $(".newmattwo<?php echo $id; ?>").hide();
          $(".newmatone<?php echo $id; ?>").show();
          $('#mattree<?php echo $id; ?>').html('');
          $('#matfor<?php echo $id; ?>').html('');
          $("#matcode<?php echo $id; ?>").val(b1);
          $("#btncostup<?php echo $id; ?>").hide();
          $("#mattypecode<?php echo $id; ?>").val(b1);
        var newmatn = $("#newmatname<?php echo $id; ?>").val();
        $("#matgroup_name<?php echo $id; ?>").val(newmatn);

   });
   $( "#matone<?php echo $id; ?>" ).click(function() {
       var b1 = $('#matone<?php echo $id; ?>').val();
       $('#mattwo<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_group/');?>'+'/'+b1);
       $(".newmatfive<?php echo $id; ?>").hide();
       $(".newmatfor<?php echo $id; ?>").hide();
       $(".newmattree<?php echo $id; ?>").hide();
       $(".newmattwo<?php echo $id; ?>").hide();
       $(".newmatone<?php echo $id; ?>").show();
       $('#mattree<?php echo $id; ?>').html('');
       $('#matfor<?php echo $id; ?>').html('');
       $('#matfive<?php echo $id; ?>').html('');
       $("#matcode<?php echo $id; ?>").val(b1);
       $("#btncostup<?php echo $id; ?>").hide();
       $("#sgroup").prop('disabled', false);

  });
   $( "#mattwo<?php echo $id; ?>" ).change(function() {
        $(".newmatfive<?php echo $id; ?>").hide();
        $(".newmatfor<?php echo $id; ?>").hide();
        $(".newmattree<?php echo $id; ?>").hide();
        $(".newmattwo<?php echo $id; ?>").show();
        $(".newmatone<?php echo $id; ?>").hide();

        var b1 = $('#matone<?php echo $id; ?>').val();
        var b2 = $('#mattwo<?php echo $id; ?>').val();
        $('#mattree<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
        $('#matfor<?php echo $id; ?>').html('');
        $("#matcode<?php echo $id; ?>").val(b1+b2);
        $("#btncostup<?php echo $id; ?>").hide();
        $("#mattypecodetree<?php echo $id; ?>").val(b1);
        $("#matgroupcodetree<?php echo $id; ?>").val(b2);
  });
  $( "#mattwo<?php echo $id; ?>" ).click(function() {
       $(".newmatfive<?php echo $id; ?>").hide();
       $(".newmatfor<?php echo $id; ?>").hide();
       $(".newmattree<?php echo $id; ?>").hide();
       $(".newmattwo<?php echo $id; ?>").show();
       $(".newmatone<?php echo $id; ?>").hide();

       var b1 = $('#matone<?php echo $id; ?>').val();
       var b2 = $('#mattwo<?php echo $id; ?>').val();
       $('#mattree<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
       $('#matfor<?php echo $id; ?>').html('');
       $('#matfive<?php echo $id; ?>').html('');
       $("#matcode<?php echo $id; ?>").val(b1+b2);
       $("#btncostup<?php echo $id; ?>").hide();
 });
  $( "#mattree<?php echo $id; ?>" ).change(function() {
      var b1 = $('#matone<?php echo $id; ?>').val();
       var b2 = $('#mattwo<?php echo $id; ?>').val();
       var b3 = $('#mattree<?php echo $id; ?>').val();
       $('#matfor<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
       $(".newmatfive<?php echo $id; ?>").hide();
       $(".newmatfor<?php echo $id; ?>").hide();
       $(".newmattree<?php echo $id; ?>").show();
       $(".newmattwo<?php echo $id; ?>").hide();
       $(".newmatone<?php echo $id; ?>").hide();
       $("#matcode<?php echo $id; ?>").val(b1+b2+b3);
       $("#btncostup<?php echo $id; ?>").hide();
  });
  $( "#mattree<?php echo $id; ?>" ).click(function() {
      var b1 = $('#matone<?php echo $id; ?>').val();
       var b2 = $('#mattwo<?php echo $id; ?>').val();
       var b3 = $('#mattree<?php echo $id; ?>').val();
       $('#matfor<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
       $(".newmatfive<?php echo $id; ?>").hide();
       $(".newmatfor<?php echo $id; ?>").hide();
       $(".newmattree<?php echo $id; ?>").show();
       $(".newmattwo<?php echo $id; ?>").hide();
       $(".newmatone<?php echo $id; ?>").hide();
       $('#matfive<?php echo $id; ?>').html('');
       $("#matcode<?php echo $id; ?>").val(b1+b2+b3);
       $("#btncostup<?php echo $id; ?>").hide();
       $("#mattypecodefor<?php echo $id; ?>").val(b1);
       $("#matgroupcodefor<?php echo $id; ?>").val(b2);
       $("#matsubgroupcodefor<?php echo $id; ?>").val(b3);
  });
  $( "#matfor<?php echo $id; ?>" ).change(function() {
      var b1 = $('#matone<?php echo $id; ?>').val();
      var b2 = $('#mattwo<?php echo $id; ?>').val();
      var b3 = $('#mattree<?php echo $id; ?>').val();
      var b4 = $('#matfor<?php echo $id; ?>').val();
        $('#matfive<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_spec');?>'+'/'+b1+'/'+b2+'/'+b3+'/'+b4);
        $(".newmatfive<?php echo $id; ?>").hide();
        $(".newmatfor<?php echo $id; ?>").show();
        $(".newmattree<?php echo $id; ?>").hide();
        $(".newmattwo<?php echo $id; ?>").hide();
        $(".newmatone<?php echo $id; ?>").hide();
        $("#matcode<?php echo $id; ?>").val(b1+b2+b3+b4);
        $("#btncostup<?php echo $id; ?>").hide();
        $("#mattypecodefive<?php echo $id; ?>").val(b1);
        $("#matgroupcodefive<?php echo $id; ?>").val(b2);
        $("#matsubgroupcodefive<?php echo $id; ?>").val(b3);
        $("#matproductcodefive<?php echo $id; ?>").val(b4);
  });
  $( "#matfor<?php echo $id; ?>" ).click(function() {
      var b1 = $('#matone<?php echo $id; ?>').val();
      var b2 = $('#mattwo<?php echo $id; ?>').val();
      var b3 = $('#mattree<?php echo $id; ?>').val();
      var b4 = $('#matfor<?php echo $id; ?>').val();
        $('#matfive<?php echo $id; ?>').load('<?php echo base_url('materialcode/get_spec');?>'+'/'+b1+'/'+b2+'/'+b3+'/'+b4);
        $(".newmatfive<?php echo $id; ?>").hide();
        $(".newmatfor<?php echo $id; ?>").show();
        $(".newmattree<?php echo $id; ?>").hide();
        $(".newmattwo<?php echo $id; ?>").hide();
        $(".newmatone<?php echo $id; ?>").hide();
        $("#matcode<?php echo $id; ?>").val(b1+b2+b3+b4);
        $("#btncostup<?php echo $id; ?>").hide();
  });
  $( "#matfive<?php echo $id; ?>" ).change(function() {
      var b1 = $('#matone<?php echo $id; ?>').val();
      var b2 = $('#mattwo<?php echo $id; ?>').val();
      var b3 = $('#mattree<?php echo $id; ?>').val();
      var b4 = $('#matfor<?php echo $id; ?>').val();
      var b5 = $('#matfive<?php echo $id; ?>').val();
        $(".newmatfive<?php echo $id; ?>").show();
        $(".newmatfor<?php echo $id; ?>").hide();
        $(".newmattree<?php echo $id; ?>").hide();
        $(".newmattwo<?php echo $id; ?>").hide();
        $(".newmatone<?php echo $id; ?>").hide();
        $("#matcode<?php echo $id; ?>").val(b1+b2+b3+b4+b5);
        $("#btncostup<?php echo $id; ?>").show();
  });
  $( "#matfive<?php echo $id; ?>" ).click(function() {
      var b1 = $('#matone<?php echo $id; ?>').val();
      var b2 = $('#mattwo<?php echo $id; ?>').val();
      var b3 = $('#mattree<?php echo $id; ?>').val();
      var b4 = $('#matfor<?php echo $id; ?>').val();
      var b5 = $('#matfive<?php echo $id; ?>').val();
        $(".newmatfive<?php echo $id; ?>").show();
        $(".newmatfor<?php echo $id; ?>").hide();
        $(".newmattree<?php echo $id; ?>").hide();
        $(".newmattwo<?php echo $id; ?>").hide();
        $(".newmatone<?php echo $id; ?>").hide();
        $("#matcode<?php echo $id; ?>").val(b1+b2+b3+b4+b5);
        $("#btncostup<?php echo $id; ?>").show();
  });
  $("#btncostup<?php echo $id; ?>").click(function(){
    var b1 = $('#matone<?php echo $id; ?>').val();
    var b2 = $('#mattwo<?php echo $id; ?>').val();
    var b3 = $('#mattree<?php echo $id; ?>').val();
    var b4 = $('#matfor<?php echo $id; ?>').val();
    var b5 = $('#matfive<?php echo $id; ?>').val();
    var url="<?php echo base_url(); ?>materialcode/getname"+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5;
    var dataSet={
      };
      $.post(url,dataSet,function(data){
        $("#newmatname").val(data);
        $("#newmatcode").val(b1+b2+b3+b4+b5);
        $("#newmatname<?php echo $id; ?>").val(data);
        $("#newmatcode<?php echo $id; ?>").val(b1+b2+b3+b4+b5);
        $("#ilo_matname<?php echo $id; ?>").val(data);
        $("#ilo_matcode<?php echo $id; ?>").val(b1+b2+b3+b4+b5);
        $("#error<?php echo $id;?>").attr("class", "input-group has-success has-feedback");
        var url="<?php echo base_url(); ?>materialcode/getunitname"+'/'+b1+'/'+b2+'/'+b3+'/'+b4+'/'+b5;
        var dataSet={
          };
          $.post(url,dataSet,function(data){
            $("#unit").val(data);
          });
        });
  });

$("#stype").keyup(function(event) {
   var b1 = $('#stype').val();
  $("#matone<?php echo $id; ?>").load('<?php echo base_url('materialcode/getmattype_where');?>'+'/'+b1);
});
$("#sgroup").keyup(function(event) {

var url="<?php echo base_url(); ?>materialcode/getmatgroup_where";
  var dataSet={
      name : $('#sgroup').val()
    };
  $.post(url,dataSet,function(data){
  $("#mattwo<?php echo $id; ?>").html(data);
  //alert(data);
});
});
</script>
