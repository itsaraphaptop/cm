<div class="row">

    <div id="tabcost1<?php echo $n;?>" class="col-xs-6">
        <h4>Costcode 1 </h4>
        <input type="text" class="form-control input-sm" id="cost1s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="cost11<?php echo $n;?>" style="height:150px;">
        </select>
    </div>
    <div id="tabcost2<?php echo $n;?>" class="col-xs-6">

         <h4>Costcode 2</h4>
         <input type="text" class="form-control input-sm" id="cost2s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
          <p></p>
         <select multiple class="form-control" id="cost22<?php echo $n;?>" style="height:150px;"></select>

    </div>
    <div id="tabcost3<?php echo $n;?>" class="col-xs-6">
         <h4>Costcode 3</h4>
       
          <input type="text" class="form-control input-sm" id="cost3s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="cost33<?php echo $n;?>" style="height:150px;">
            </select>
    </div>

    <div id="tabcost4<?php echo $n;?>" class="col-xs-6">
         <h4>Costcode 4</h4>
         <input type="text" class="form-control input-sm" id="cost4s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="cost44<?php echo $n;?>" style="height:150px;">
        </select>

    </div>

    <div id="tabcost5<?php echo $n;?>" class="col-xs-6">
         <h4>Costcode 5</h4>
         <input type="text" class="form-control input-sm" id="cost5s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="cost55<?php echo $n;?>" style="height:150px;">
        </select>

     </div>

    <div id="tabcost4<?php echo $n;?>" class="col-xs-4">
         <h4>Costcode</h4>
        <p></p>
      <input type="text" class="form-control input-sm" readonly name="costcodetext<?php echo $n; ?>" id="costcodetextt<?php echo $n; ?>">
    </div>


    <div id="cost-control<?php echo $n;?>" class="col-xs-12">
        <hr>

            <div class="row" style="margin-top:10px;">
                <div class="col-xs-12">
               
            <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostuppppe<?php echo $n;?>">SELECT</button>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script>
  // $(document).ready(function() {
$(".addboxpri<?php echo $n;?>").hide();
$("#editpo<?php echo $n;?>").hide();
$("#adddetail<?php echo $n;?>").hide();
$(".print<?php echo $n;?>").hide();
$('#newmatname<?php echo $n;?>').prop('disabled', true);
// $("#taxv<?php echo $n;?>").val('0');


    $("#codeup<?php echo $n;?>").click(function(){});
     $("#gencodebtn<?php echo $n;?>").hide();
     $("#type2<?php echo $n;?>").hide();
     $("#type3<?php echo $n;?>").hide();
     $("#type4<?php echo $n;?>").hide();
     $("#type5<?php echo $n;?>").hide();
     $('#cost-control<?php echo $n;?>').hide();
     // $("#cost4<?php echo $n;?>").hide();
     $("#box6<?php echo $n;?>").hide();


     $('#gencode<?php echo $n;?>').on('hidden.bs.modal', function () {
     $("#type1<?php echo $n;?>").show();
     $("#type2<?php echo $n;?>").hide();
     $("#type3<?php echo $n;?>").hide();
     $("#type4<?php echo $n;?>").hide();
     $("#type5<?php echo $n;?>").hide();

     $("#gencodebtn<?php echo $n;?>").hide();


     });


     $('#box1<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_type');?>');
     $( "#box1<?php echo $n;?>" ).change(function() {
           var b1 = $('#box1<?php echo $n;?>').val();
           $('#box2<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2<?php echo $n;?>").show();
         $('#vgencode<?php echo $n;?>').html('');
         $("#costcodetextt<?php echo $n; ?>").val(b1);
    });
    $( "#box1<?php echo $n;?>" ).click(function() {
           var b1 = $('#box1<?php echo $n;?>').val();
           $('#box2<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2<?php echo $n;?>").show();
          $('#vgencode<?php echo $n;?>').html('');
          $("#costcodetextt<?php echo $n; ?>").val(b1);

    });
    $( "#box2<?php echo $n;?>" ).change(function() {
         $("#type1").hide();
         var b1 = $('#box1<?php echo $n;?>').val();
         var b2 = $('#box2<?php echo $n;?>').val();
         $('#box3<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
         $("#type3<?php echo $n;?>").show();
    });
    $( "#box3<?php echo $n;?>" ).change(function() {
        var b1 = $('#box1<?php echo $n;?>').val();
         var b2 = $('#box2<?php echo $n;?>').val();
         var b3 = $('#box3<?php echo $n;?>').val();
         $('#box4<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
         //$('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b1+'/'+b2+'/'+b3);


         $("#type4<?php echo $n;?>").show();
         $("#type2<?php echo $n;?>").hide();
    });
    $( "#box4<?php echo $n;?>" ).change(function() {
         //$("#type4").hide();
         $('#type3<?php echo $n;?>').hide();
         $("#gencodebtn<?php echo $n;?>").show();
         //$("#type5").show();

    });
    $("#box5<?php echo $n;?>").change(function() {
       //$("#gencodebtn").show();
       //var b5 = $('#box5').val();
    });

    $('#btngenmatcode<?php echo $n;?>').click(function(){
     var b1 = $('#box1<?php echo $n;?>').val();
     var b2 = $('#box2<?php echo $n;?>').val();
     var b3 = $('#box3<?php echo $n;?>').val();
     var b4 = $('#box4<?php echo $n;?>').val();
     var b5 = $('#box5<?php echo $n;?>').val();

     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6<?php echo $n;?>').val(b6gmatcode);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall";
          var dataSet={
            b1: b6gmatcode
            };
            $.post(url,dataSet,function(data){

              $('#matname<?php echo $n;?>').val(data);
              $("#list<?php echo $n;?>").val(data);
              $('#vgencode<?php echo $n;?>').html(data);
            });

    });


    $('#cost11<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost11<?php echo $n;?>" ).change(function() {

         var c1 = $('#cost11<?php echo $n;?>').val();
         $('#cost22<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
         $("#tabcost2<?php echo $n;?>").show();
       
         $("#costcodetextt<?php echo $n;?>").val(c1);
         $('#cost33<?php echo $n;?>').html('');
         $('#cost44<?php echo $n;?>').html('');
         $('#cost55<?php echo $n;?>').html('');
    });
    $( "#cost22<?php echo $n;?>" ).change(function() {
        var c1 = $('#cost11<?php echo $n;?>').val();
        var c2 = $('#cost22<?php echo $n;?>').val();
        var c3 = $('#cost33<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
         // // $('#cost4<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
         $("#costcodetextt<?php echo $n;?>").val(c1+c2);
         $('#cost44<?php echo $n;?>').html('');
         $('#cost55<?php echo $n;?>').html('');
    });
    $( "#cost33<?php echo $n;?>").change(function() {
        var c1 = $('#cost11<?php echo $n;?>').val();
        var c2 = $('#cost22<?php echo $n;?>').val();
        var c3 = $('#cost33<?php echo $n;?>').val();
        var c4 = $('#cost44<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost4/');?>'+'/'+c1+'/'+c2+'/'+c3);
         $("#costcodetextt<?php echo $n;?>").val(c1+c2+c3);
         $("#cost-control<?php echo $n;?>").show();

         $('#cost5<?php echo $n;?>').html('');


    });
    $( "#cost44<?php echo $n;?>" ).change(function() {
        var c1 = $('#cost11<?php echo $n;?>').val();
        var c2 = $('#cost22<?php echo $n;?>').val();
        var c3 = $('#cost33<?php echo $n;?>').val();
        var c4 = $('#cost44<?php echo $n;?>').val();
        var c5 = $('#cost55<?php echo $n;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost5/');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+c4);
        $("#costcodetextt<?php echo $n;?>").val(c1+c2+c3+c4);
        $("#cost-control<?php echo $n;?>").show();
    });

    $( "#cost55<?php echo $n;?>" ).change(function() {
        var c1 = $('#cost11<?php echo $n;?>').val();
        var c2 = $('#cost22<?php echo $n;?>').val();
        var c3 = $('#cost33<?php echo $n;?>').val();
        var c4 = $('#cost44<?php echo $n;?>').val();
        var c5 = $('#cost55<?php echo $n;?>').val();
        $("#costcodetextt<?php echo $n;?>").val(c1+c2+c3+c4+c5);
    });


    $("#btncostuppppe<?php echo $n;?>").click(function(){
     var c1 = $('#cost11<?php echo $n;?>').val();
     var c2 = $('#cost22<?php echo $n;?>').val();
     var c3 = $('#cost33<?php echo $n;?>').val();
     var c4 = $('#cost44<?php echo $n;?>').val();
     var c5 = $('#cost55<?php echo $n;?>').val();
     var url="<?php echo base_url(); ?>costcode/getcostcode"+'/'+c1+'/'+c2+'/'+c3+'/'+c4+'/'+c5;
    var dataSet={
      };
      $.post(url,dataSet,function(data){
     var gcostcodee = data;
     var codecostcodee = c1+''+c2+''+c3+''+c4+''+c5;
     var type = c1;
     var group = +c2+''+c3+''+c4+''+c5;
     
     $('#eee').val(codecostcodee);
     $('#ddd').val(gcostcodee);

     $('#vcostcode<?php echo $n;?>').val(codecostcodee);
     $('#list<?php echo $n;?>').val(gcostcodee);
     $('#gcostcode<?php echo $n;?>').html(gcostcodee);
     $('#costcode<?php echo $n;?>').modal('hide');
     $("#tabcostl4<?php echo $n;?>").hide();
     $("#costnameint<?php echo $n; ?>").val(gcostcodee);
     $("#codecostcodeint<?php echo $n; ?>").val(codecostcodee);
     $("#costname<?php echo $pr_id;?>").val(gcostcodee);
     $("#codecostcodee<?php echo $pr_id; ?>").val(codecostcodee);
     $("#costname<?php echo $n;?>").val(gcostcodee);
     $("#codecostcodee<?php echo $n; ?>").val(codecostcodee);
     $("#codecostnamee<?php echo $n; ?>").val(gcostcodee);
     $("#codecostnamee").val(gcostcodee);
     $('#lo_costname<?php echo $n; ?>').val(gcostcodee);
     $('#lo_costcode<?php echo $n; ?>').val(codecostcodee);;
     $("#code_type_2_<?php echo $n; ?>").val(c1);
     $("#code_group_2_<?php echo $n; ?>").val(c2);
     $("#code_subgroup_2_<?php echo $n; ?>").val(c3);
     $('#code_type_2').val(type)
     $('#code_group_2').val(group)

     $("#eee<?php echo $n; ?>").val(codecostcodee);
     $("#ddd<?php echo $n; ?>").val(gcostcodee);
     $('#code_type_2<?php echo $n; ?>').val(type)
     $('#code_group_2<?php echo $n; ?>').val(group)

   

    var subcostcode = codecostcodee.substring(0,1);
     
     if(subcostcode!="G"){
             $('#gbboqq<?php echo $n; ?>').val(codecostcodee.substring(1,10));
         }else{
             $('#gbboqq<?php echo $n; ?>').val(codecostcodee.substring(0,10));
         }

      });

     
    });

    $("#costl3s<?php echo $n;?>").keyup(function(event) {
    var b1 = $('#costl3s').val();
    var c1 = $('#costl1<?php echo $n;?>').val();
    var c2 = $('#costl2<?php echo $n;?>').val();
  $("#costl3<?php echo $n;?>").load('<?php echo base_url('materialcode/getcostcode3_where');?>'+'/'+c1+'/'+c2+'/'+b1);
   
});


  // });
</script>
