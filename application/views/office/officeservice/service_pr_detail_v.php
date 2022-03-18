<div class="panel panel-primary">
	<div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายละเอียดรายการขอซื้อ</div>

          <table class="table table-bordered table-striped table-hover" >

             <thead>
               <tr>
                 <th>No.</th>
                 <th width="60%">ชื่อสินค้า</th>
                 <th width="auto">ปริมาณ</th>
                 <th width="auto">หน่วย</th>
                 <th colspan="2" width="10">จัดการ</th>
               </tr>
             </thead>
             <tbody>
                 <?php   $n =1; foreach ($resi as $val) { ?>
               <tr>
                <th scope="row"><?php echo $n;?></th>
                 <td><?php echo $val->pri_matname; ?></td>
                 <td><?php echo $val->pri_qty; ?></td>
                 <td><?php echo $val->pri_unit; ?></td>
                 <td>
                   <button class="nn btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->pri_id;?>">แก้ไข</button></td>
                   <td><button class="btn btn-xs btn-block btn-danger" id="del<?php echo $val->pri_id;?>">ลบ</button>
                   </td>
               </tr>


<div class="modal fade" id="modaleditdetail<?php echo $val->pri_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการวัสดุ <?php echo $val->pri_ref; ?>-<?php echo $val->pri_id; ?></h4>
      </div>
      <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                            <label for="matname">รายการซื้อ</label><Br>
                              <div class="input-group">
                                  
                                  <input type="text" readonly="true" id="matname<?php echo $val->pri_id;?>" name="matname" value="<?php echo $val->pri_matname; ?>" placeholder="กรอกรายการซื้อ" class="form-control">
                                  <span class="input-group-btn">
                                    <button data-toggle="modal"   data-target="#gencode1<?php echo $val->pri_id;?>"  class="btn  btn-primary">เลือก</button>
                                  </span>
                              </div>
                                  <input type="hidden" id="matcodeb6<?php echo $val->pri_id;?>" name="matcode" value="<?php echo $val->pri_matcode; ?>" placeholder="กรอกรายการซื้อ" class="form-control">
                            </div>
                         <!--   <div class="col-xs-6">
                              <div class="form-group">
                                  <label for="costname">รายการต้นทุน</label><br>
                                  <a data-toggle="modal" name="costcode1"  data-target="#costcode1<?php echo $val->pri_id;?>" id="gcostcode1<?php echo $val->pri_id;?>" class="btn  btn-primary">เลือก</a>-->
                                  <input type="hidden" id="codecostcode<?php echo $val->pri_id;?>"  name="costcode" value="<?php echo $val->pri_costcode; ?>" placeholder="กรอกรายการต้นทุน" class="form-control">
                                  <input type="hidden" id="costname<?php echo $val->pri_id;?>"  name="costname" value="<?php echo $val->pri_costname; ?>" placeholder="กรอกรายการต้นทุน" class="form-control">
                              <!-- </div>
                            </div>-->
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                        <label for="qty">ปริมาณ</label>
                                        <input type="text" id="qty<?php echo $val->pri_id;?>" placeholder="กรอกปริมาณ" value="<?php echo $val->pri_qty; ?>" class="form-control">
                              </div>
                            </div>
                            <div class="col-xs-6">
                               <div class="form-group">
                                  <label for="unit">หน่วย</label>
                                <input type="text" id="unity<?php echo $val->pri_id;?>" value="<?php echo $val->pri_unit; ?>"  name="unit" placeholder="กรอกหน่วย"  class="punit form-control input-sm">
                              <!--  <span class="input-group-btn" >
                                  <button class="btn btn-primary btn-sm" data-toggle="modal" readonly="true"  data-target="#openunit3" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>-->
                              </div>
                            </div>
                        </div>

                         <div class="row">
                         <div class="col-xs-12">
                              <div class="form-group">
                                 <label for="endtproject">หมายเหตุ</label>

                                     <textarea rows="4" cols="50" type='text' id="remark<?php echo $val->pri_id;?>" class="form-control" ><?php echo $val->pri_remark; ?></textarea>

                            </div>
                              </div>
                         </div>

                         <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <input type="hidden" id="prcode<?php echo $val->pri_id;?>" value="<?php echo $val->pri_ref; ?>">
                                  <input type="hidden" id="pdrd<?php echo $val->pri_id;?>" value="<?php echo $val->pri_id; ?>">
                                  <button type="submit" class="opdetaile<?php echo $val->pri_id;?> btn btn-primary"  data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</button>
                              </div>
                            </div>
                        </div>
      </div>
    </div>
  </div>
</div>  <!--  end model รายการ -->
  <!-- matcode and costcode -->
<!--  modal gen matcode and costcode -->
<div class="modal fade" id="gencode1<?php echo $val->pri_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายการวัสดุ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="type1<?php echo $val->pri_id;?>" class="col-xs-6">
                    <h4>รายการประเภทสินค้า 1</h4>
                    <select multiple class="form-control" id="box1<?php echo $val->pri_id;?>" style="height:350px;">
                    </select>
                </div>
                <div id="type2<?php echo $val->pri_id;?>" class="col-xs-6">

                     <h4>รายการประเภทสินค้า 2</h4>
                     <select multiple class="form-control" id="box2<?php echo $val->pri_id;?>" style="height:350px;">

</select>

                </div>
                <div id="type3<?php echo $val->pri_id;?>" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 3</h4>
                    <select multiple class="form-control" id="box3<?php echo $val->pri_id;?>" style="height:350px;">

</select>
                </div>
                <div id="type4<?php echo $val->pri_id;?>" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 4</h4>
                    <select multiple class="form-control" id="box4<?php echo $val->pri_id;?>" style="height:350px;">

</select>
                </div>
                <div id="type5<?php echo $val->pri_id;?>" class="col-xs-6">
                  <h4>รายการประเภทสินค้า 5</h4>
                     <select multiple class="form-control" id="box5<?php echo $val->pri_id;?>" style="height:350px;"/>
                </select>
                     <select multiple class="form-control" id="box6<?php echo $val->pri_id;?>" style="height:350px;"/>
</select>
                </div>

                <div class="col-xs-12" id="gencodebtn<?php echo $val->pri_id;?>">
                    <hr>
                    <button class="btn btn-primary" id="btngenmatcode<?php echo $val->pri_id;?>" data-dismiss="modal" style="float: right;">สร้าง MatCode</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="costcode1<?php echo $val->pri_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายการต้นทุน</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="tabcost1<?php echo $val->pri_id;?>" class="col-xs-12">
                    <h4>รายการประเภทต้นทุน 1</h4>
                    <select multiple class="form-control" id="cost1<?php echo $val->pri_id;?>" style="height:150px;">
                    </select>
                </div>
                <div id="tabcost2<?php echo $val->pri_id;?>" class="col-xs-6">

                     <h4>รายการประเภทต้นทุน 2</h4>
                     <select multiple class="form-control" id="cost2<?php echo $val->pri_id;?>" style="height:150px;">

</select>

                </div>
                <div id="tabcost3<?php echo $val->pri_id;?>" class="col-xs-6">
                     <h4>รายการประเภทต้นทุน 3</h4>
                    <select multiple class="form-control" id="cost3<?php echo $val->pri_id;?>" style="height:150px;">
                        </select>
                                   </div>
                 <div id="tabcost4<?php echo $val->pri_id;?>" class="col-xs-6">
                   <h4>รายการประเภทต้นทุน 4</h4>
                    <select multiple class="form-control" id="cost4<?php echo $val->pri_id;?>" style="height:150px;">

</select>

                 </div>


                <div id="cost-control<?php echo $val->pri_id;?>" class="col-xs-12">
                    <hr>

                        <div class="row" style="margin-top:10px;">
                            <div class="col-xs-12">
                        <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostup<?php echo $val->pri_id;?>">สร้าง CostCode</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->
  <!-- end matcode and costcode-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
      $("#del<?php echo $val->pri_id;?>").click(function(){
        var url="<?php echo base_url(); ?>index.php/office/delprdetail/<?php echo $val->pri_ref;?>";
          var dataSet={
            id: <?php echo $val->pri_id;?>
            };
            $.post(url,dataSet,function(data){

              $('#loaddatadetail').load('<?php echo base_url(); ?>index.php/office/service_pr_detail'+'/'+data);

            });
      });
  </script>
<script>
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $("#codeup<?php echo $val->pri_id;?>").click(function(){});
     $("#gencodebtn<?php echo $val->pri_id;?>").hide();
     $("#type2<?php echo $val->pri_id;?>").hide();
     $("#type3<?php echo $val->pri_id;?>").hide();
     $("#type4<?php echo $val->pri_id;?>").hide();
     $("#type5<?php echo $val->pri_id;?>").hide();
     $('#cost-control<?php echo $val->pri_id;?>').hide();
     $("#cost4<?php echo $val->pri_id;?>").hide();
     $("#box6<?php echo $val->pri_id;?>").hide();


     $('#gencode<?php echo $val->pri_id;?>').on('hidden.bs.modal', function () {
     $("#type1<?php echo $val->pri_id;?>").show();
     $("#type2<?php echo $val->pri_id;?>").hide();
     $("#type3<?php echo $val->pri_id;?>").hide();
     $("#type4<?php echo $val->pri_id;?>").hide();
     $("#type5<?php echo $val->pri_id;?>").hide();

     $("#gencodebtn<?php echo $val->pri_id;?>").hide();


     });


     $('#box1<?php echo $val->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_type');?>');
     $( "#box1<?php echo $val->pri_id;?>" ).change(function() {
           var b1 = $('#box1<?php echo $val->pri_id;?>').val();
           $('#box2<?php echo $val->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2<?php echo $val->pri_id;?>").show();
          $('#vgencode1<?php echo $val->pri_id;?>').html('');

    });
    $( "#box2<?php echo $val->pri_id;?>" ).change(function() {
         $("#type1<?php echo $val->pri_id;?>").hide();
         var b1 = $('#box1<?php echo $val->pri_id;?>').val();
         var b2 = $('#box2<?php echo $val->pri_id;?>').val();
         $('#box3<?php echo $val->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
         $("#type3<?php echo $val->pri_id;?>").show();
    });
    $( "#box3<?php echo $val->pri_id;?>" ).change(function() {
        var b1 = $('#box1<?php echo $val->pri_id;?>').val();
         var b2 = $('#box2<?php echo $val->pri_id;?>').val();
         var b3 = $('#box3<?php echo $val->pri_id;?>').val();
         $('#box4<?php echo $val->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
         //$('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b1+'/'+b2+'/'+b3);


         $("#type4<?php echo $val->pri_id;?>").show();
         $("#type2<?php echo $val->pri_id;?>").hide();
    });
    $( "#box4<?php echo $val->pri_id;?>" ).change(function() {
         //$("#type4").hide();
         $('#type3<?php echo $val->pri_id;?>').hide();
         $("#gencodebtn<?php echo $val->pri_id;?>").show();
         //$("#type5").show();

    });
    $("#box5<?php echo $val->pri_id;?>").change(function() {
       //$("#gencodebtn").show();
       //var b5 = $('#box5').val();
    });

    $('#btngenmatcode<?php echo $val->pri_id;?>').click(function(){
     var b1 = $('#box1<?php echo $val->pri_id;?>').val();
     var b2 = $('#box2<?php echo $val->pri_id;?>').val();
     var b3 = $('#box3<?php echo $val->pri_id;?>').val();
     var b4 = $('#box4<?php echo $val->pri_id;?>').val();
     var b5 = $('#box5<?php echo $val->pri_id;?>').val();

     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6<?php echo $val->pri_id;?>').val(b6gmatcode);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall";
          var dataSet={
            b1: b6gmatcode
            };
            $.post(url,dataSet,function(data){
              $('#matname<?php echo $val->pri_id;?>').val(data);
              //$('#vgencode1<?php echo $val->pri_id;?>').html(data);
            });

    });


    $('#cost1<?php echo $val->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1<?php echo $val->pri_id;?>" ).change(function() {

         var c1 = $('#cost1<?php echo $val->pri_id;?>').val();
         $('#cost2<?php echo $val->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
     $("#tabcost2<?php echo $val->pri_id;?>").show();
         $("#tabcost4<?php echo $val->pri_id;?>").hide();
    });
    $( "#cost2<?php echo $val->pri_id;?>" ).change(function() {

         var c2 = $('#cost2<?php echo $val->pri_id;?>').val();
         $('#cost3<?php echo $val->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c2);
          $('#cost4<?php echo $val->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
    });
    $( "#cost3").change(function() {
         $("#tabcost2<?php echo $val->pri_id;?>").hide();
         $("#tabcost4<?php echo $val->pri_id;?>").show();
         $("#cost4<?php echo $val->pri_id;?>").show();

    });
    $( "#cost4<?php echo $val->pri_id;?>" ).change(function() {
         $("#cost-control<?php echo $val->pri_id;?>").show();
    });
    $("#btncostup<?php echo $val->pri_id;?>").click(function(){
       var c1 = $('#cost1<?php echo $val->pri_id;?>').val();
     var c2 = $('#cost2<?php echo $val->pri_id;?>').val();
     var c3 = $('#cost3<?php echo $val->pri_id;?>').val();
     var c4 = $('#cost4<?php echo $val->pri_id;?>').val();

     var gcostcode1 = c4 ;
     var codecostcode1 = c1+''+c2+''+c3;
     $('#codecostcode<?php echo $val->pri_id;?>').val(codecostcode1);
     $('#costname<?php echo $val->pri_id;?>').val(gcostcode1);
     $('#gcostcode1<?php echo $val->pri_id;?>').html(gcostcode1);
     $('#costcode<?php echo $val->pri_id;?>').modal('hide');
     $("#tabcost4<?php echo $val->pri_id;?>").hide();

    });



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
</script>
<script>
  $('.opdetaile<?php echo $val->pri_id;?>').click(function() {
        var url="<?php echo base_url(); ?>index.php/office/edt_prdetail";
          var dataSet={
            prcode: $("#prcode<?php echo $val->pri_id;?>").val(),
            prid: $("#pdrd<?php echo $val->pri_id;?>").val(),
            matcode: $("#matcodeb6<?php echo $val->pri_id;?>").val(),
            matname: $('#matname<?php echo $val->pri_id;?>').val(),
            qty: $("#qty<?php echo $val->pri_id;?>").val(),
            unit: $("#unity<?php echo $val->pri_id;?>").val(),
            remark: $("#remark<?php echo $val->pri_id;?>").val()
            };
            $.post(url,dataSet,function(data){
              alert(data);
              $('#loaddatadetail').load('<?php echo base_url(); ?>index.php/office/service_pr_detail'+'/'+data);
            });
    });
</script>

                 <?php $n++; } ?>
             </tbody>
           </table>
      </div>

<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table class="table table-bordered table-striped table-hover" >
      <thead>
        <tr>
          <th>No.</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getunit as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $valj->unit_name; ?></td>
            <td><button class="openuny btn btn-xs btn-block btn-info" data-toggle="modal"  data-unitr="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
         <script>
    $(".openuny").click(function(){
      $(".punity").val($(this).data('unitr'));
    });
  </script>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->


