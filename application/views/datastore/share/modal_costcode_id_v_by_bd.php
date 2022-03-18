<div class="row">

    <div id="tabcost1<?php echo $n;?>" class="col-xs-6">
        <h4>Costcode 1 <?php echo $n;?></h4>
        <input type="text" class="form-control input-sm" id="cost1s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="cost1<?php echo $n;?>" style="height:150px;">
        </select>
    </div>
    <div id="tabcost2<?php echo $n;?>" class="col-xs-6">

         <h4>Costcode 2</h4>
         <input type="text" class="form-control input-sm" id="cost2s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
          <p></p>
         <select multiple class="form-control" id="cost2<?php echo $n;?>" style="height:150px;"></select>

    </div>
    <div id="tabcost3<?php echo $n;?>" class="col-xs-6">
         <h4>Costcode 3</h4>
       
          <input type="text" class="form-control input-sm" id="cost3s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="cost3<?php echo $n;?>" style="height:150px;">
            </select>
    </div>

    <div id="tabcost4<?php echo $n;?>" class="col-xs-6">
         <h4>Costcode 4</h4>
         <input type="text" class="form-control input-sm" id="cost4s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="cost4<?php echo $n;?>" style="height:150px;">
        </select>

    </div>

    <div id="tabcost5<?php echo $n;?>" class="col-xs-6">
         <h4>Costcode 5</h4>
         <input type="text" class="form-control input-sm" id="cost5s<?php echo $n;?>" placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="cost5<?php echo $n;?>" style="height:150px;">
        </select>

     </div>

    <div id="tabcost4<?php echo $n;?>" class="col-xs-4">
         <h4>Costcode</h4>
        <p></p>
      <input type="text" class="form-control input-sm" readonly name="costcodetext<?php echo $n; ?>" id="costcodetext<?php echo $n; ?>">
    </div>


    <div id="cost-control<?php echo $n;?>" class="col-xs-12">
        <hr>

            <div class="row" style="margin-top:10px;">
                <div class="col-xs-12">
               
            <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostupppp<?php echo $n;?>">SELECT</button>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script>
  // $(document).ready(function() {
$(".addboxpri<?php echo $n_code['code'];?>").hide();
$("#editpo<?php echo $n_code['code'];?>").hide();
$("#adddetail<?php echo $n_code['code'];?>").hide();
$(".print<?php echo $n_code['code'];?>").hide();
$('#newmatname<?php echo $n_code['code'];?>').prop('disabled', true);
// $("#taxv<?php echo $n_code['code'];?>").val('0');



    $("#codeup<?php echo $n_code['code'];?>").click(function(){});
     $("#gencodebtn<?php echo $n_code['code'];?>").hide();
     $("#type2<?php echo $n_code['code'];?>").hide();
     $("#type3<?php echo $n_code['code'];?>").hide();
     $("#type4<?php echo $n_code['code'];?>").hide();
     $("#type5<?php echo $n_code['code'];?>").hide();
     $('#cost-control<?php echo $n_code['code'];?>').hide();
     // $("#cost4<?php echo $n_code['code'];?>").hide();
     $("#box6<?php echo $n_code['code'];?>").hide();


     $('#gencode<?php echo $n_code['code'];?>').on('hidden.bs.modal', function () {
     $("#type1<?php echo $n_code['code'];?>").show();
     $("#type2<?php echo $n_code['code'];?>").hide();
     $("#type3<?php echo $n_code['code'];?>").hide();
     $("#type4<?php echo $n_code['code'];?>").hide();
     $("#type5<?php echo $n_code['code'];?>").hide();

     $("#gencodebtn<?php echo $n_code['code'];?>").hide();

     });


     $('#box1<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_type');?>');
     $( "#box1<?php echo $n_code['code'];?>" ).change(function() {
           var b1 = $('#box1<?php echo $n_code['code'];?>').val();
           $('#box2<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2<?php echo $n_code['code'];?>").show();
          $('#vgencode<?php echo $n_code['code'];?>').html('');
          $("#costcodetext<?php echo $n_code['code']; ?>").val(b1);
    });
       $( "#box1<?php echo $n_code['code'];?>" ).click(function() {
           var b1 = $('#box1<?php echo $n_code['code'];?>').val();
           $('#box2<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2<?php echo $n_code['code'];?>").show();
          $('#vgencode<?php echo $n_code['code'];?>').html('');
          $("#costcodetext<?php echo $n_code['code']; ?>").val(b1);

    });
    $( "#box2<?php echo $n_code['code'];?>" ).change(function() {
         $("#type1").hide();
         var b1 = $('#box1<?php echo $n_code['code'];?>').val();
         var b2 = $('#box2<?php echo $n_code['code'];?>').val();
         $('#box3<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
         $("#type3<?php echo $n_code['code'];?>").show();
    });
    $( "#box3<?php echo $n_code['code'];?>" ).change(function() {
        var b1 = $('#box1<?php echo $n_code['code'];?>').val();
         var b2 = $('#box2<?php echo $n_code['code'];?>').val();
         var b3 = $('#box3<?php echo $n_code['code'];?>').val();
         $('#box4<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
         //$('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b1+'/'+b2+'/'+b3);


         $("#type4<?php echo $n_code['code'];?>").show();
         $("#type2<?php echo $n_code['code'];?>").hide();
    });
    $( "#box4<?php echo $n_code['code'];?>" ).change(function() {
         //$("#type4").hide();
         $('#type3<?php echo $n_code['code'];?>').hide();
         $("#gencodebtn<?php echo $n_code['code'];?>").show();
         //$("#type5").show();

    });
    $("#box5<?php echo $n_code['code'];?>").change(function() {
       //$("#gencodebtn").show();
       //var b5 = $('#box5').val();
    });

    $('#btngenmatcode<?php echo $n_code['code'];?>').click(function(){
     var b1 = $('#box1<?php echo $n_code['code'];?>').val();
     var b2 = $('#box2<?php echo $n_code['code'];?>').val();
     var b3 = $('#box3<?php echo $n_code['code'];?>').val();
     var b4 = $('#box4<?php echo $n_code['code'];?>').val();
     var b5 = $('#box5<?php echo $n_code['code'];?>').val();

     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6<?php echo $n_code['code'];?>').val(b6gmatcode);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall";
          var dataSet={
            b1: b6gmatcode
            };
            $.post(url,dataSet,function(data){

              $('#matname<?php echo $n_code['code'];?>').val(data);
              $("#list<?php echo $n_code['code'];?>").val(data);
              $('#vgencode<?php echo $n_code['code'];?>').html(data);
            });

    });


    // $('#cost1<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    // $( "#cost1<?php echo $n_code['code'];?>" ).change(function() {

    //      var c1 = $('#cost1<?php echo $n_code['code'];?>').val();
    //      $('#cost2<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
    //  $("#tabcost2<?php echo $n_code['code'];?>").show();
    //      $("#tabcost4<?php echo $n_code['code'];?>").hide();
    //      $("#costcodetext<?php echo $n_code['code'];?>").val(c1);
    //      $('#cost3<?php echo $n_code['code'];?>').html('');
    // });
    // $( "#cost2<?php echo $n_code['code'];?>" ).change(function() {
    //     var c1 = $('#cost1<?php echo $n_code['code'];?>').val();
    //      var c2 = $('#cost2<?php echo $n_code['code'];?>').val();
    //     var c3 = $('#cost3<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
    //      // // $('#cost4<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
    //       $("#costcodetext<?php echo $n_code['code'];?>").val(c1+c2);
    // });
    // $( "#cost3<?php echo $n_code['code'];?>").change(function() {
    //     var c1 = $('#cost1<?php echo $n_code['code'];?>').val();
    //     var c2 = $('#cost2<?php echo $n_code['code'];?>').val();
    //     var c3 = $('#cost3<?php echo $n_code['code'];?>').val();
    //      $("#costcodetext<?php echo $n_code['code'];?>").val(c1+c2+c3);
    //      $("#cost-control<?php echo $n_code['code'];?>").show();


    // });
    // $( "#cost4<?php echo $n_code['code'];?>" ).change(function() {
    //      $("#cost-control<?php echo $n_code['code'];?>").show();
    // });


     $("#cost1s<?php echo $n;?>").keyup(function(event) {
    var b1 = $('#cost1s').val();
    $("#cost1<?php echo $n;?>").load('<?php echo base_url('materialcode/getctype_where');?>'+'/'+b1);
   
    });


    $("#cost2s<?php echo $n;?>").keyup(function(event) {
    var c1 = $('#cost1<?php echo $n;?>').val();
    var b2 = $('#cost2s<?php echo $n;?>').val();
    $("#cost2<?php echo $n;?>").load('<?php echo base_url('materialcode/getcsubgroup_where');?>'+'/'+c1+'/'+b2);
    });

    $("#cost3s<?php echo $n;?>").keyup(function(event) {
    var c1 = $('#cost1<?php echo $n;?>').val();
    var c2 = $('#cost2<?php echo $n;?>').val();
    var b3 = $('#cost3s').val();
    $("#cost3<?php echo $n;?>").load('<?php echo base_url('materialcode/getcostcode3_where');?>'+'/'+c1+'/'+c2+'/'+b3);
    });

    $("#cost4s<?php echo $n;?>").keyup(function(event) {
    var c1 = $('#cost1<?php echo $n;?>').val();
    var c2 = $('#cost2<?php echo $n;?>').val();
    var c3 = $('#cost3<?php echo $n;?>').val();
    var b4 = $('#cost4s').val();
    $("#cost4<?php echo $n;?>").load('<?php echo base_url('materialcode/getcostcode4_where');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+b4);
    });

    $("#cost5s<?php echo $n;?>").keyup(function(event) {
    var c1 = $('#cost1<?php echo $n;?>').val();
    var c2 = $('#cost2<?php echo $n;?>').val();
    var c3 = $('#cost3<?php echo $n;?>').val();
    var c4 = $('#cost4<?php echo $n;?>').val();
    var b5 = $('#cost5s').val();
    $("#cost5<?php echo $n;?>").load('<?php echo base_url('materialcode/getcostcode5_where');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+c4+'/'+b5);
    });

  // });
    
    $("#btncostupppp<?php echo $n_code['code'];?>").click(function(){
       var c1 = $('#cost1<?php echo $n_code['code'];?>').val();
     var c2 = $('#cost2<?php echo $n_code['code'];?>').val();
     var c3 = $('#cost3<?php echo $n_code['code'];?>').val();
     var c4 = $('#cost4<?php echo $n_code['code'];?>').val();
     var url="<?php echo base_url(); ?>costcode/getcostcode"+'/'+c1+'/'+c2+'/'+c3;
    var dataSet={
      };
      $.post(url,dataSet,function(data){
       var gcostcode = data;
     var codecostcode = c1+''+c2+''+c3;
     $('#vcostcode<?php echo $n_code['code'];?>').val(codecostcode);
     $('#list<?php echo $n_code['code'];?>').val(gcostcode);
     $('#gcostcode<?php echo $n_code['code'];?>').html(gcostcode);
     $('#costcode<?php echo $n_code['code'];?>').modal('hide');
     $("#tabcost4<?php echo $n_code['code'];?>").hide();
     $("#costnameint<?php echo $n_code['code']; ?>").val(gcostcode);
     $("#codecostcodeint<?php echo $n_code['code']; ?>").val(codecostcode);
     $("#costname<?php echo $pr_id;?>").val(gcostcode);
     $("#codecostcode<?php echo $pr_id; ?>").val(codecostcode);
     $("#costname_bom<?php echo $n_code['code'];?>").val(gcostcode);
     $("#codecostcode_bom<?php echo $n_code['code']; ?>").val(codecostcode);
     $("#code_type_1_bom_<?php echo $n_code['code']; ?>").val(c1);
     $("#costname").val(gcostcode);

      $('#lo_costname<?php echo $n_code['code']; ?>').val(gcostcode);
     $('#lo_costcode<?php echo $n_code['code']; ?>').val(codecostcode);
     // alert(gcostcode);
      });

     
    });

    $("#cost3s<?php echo $n_code['code'];?>").keyup(function(event) {
    var b1 = $('#cost3s').val();
    var c1 = $('#cost1<?php echo $n_code['code'];?>').val();
    var c2 = $('#cost2<?php echo $n_code['code'];?>').val();
  $("#cost3<?php echo $n_code['code'];?>").load('<?php echo base_url('materialcode/getcostcode3_where');?>'+'/'+c1+'/'+c2+'/'+b1);
   
});


  });
</script>

