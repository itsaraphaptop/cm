<div class="row">
    <div id="tabcost1<?php echo $n_code['code'] ;?>" class="col-xs-12">
        <h4>Costcode 1</h4>
        <select multiple class="form-control" id="cost1<?php echo $n_code['code'];?>" style="height:150px;">
        </select>
    </div>
    <div id="tabcost2<?php echo $n_code['code'];?>" class="col-xs-6">

         <h4>Costcode 2</h4>
         <select multiple class="form-control" id="cost2<?php echo $n_code['code'];?>" style="height:150px;"></select>

    </div>
    <div id="tabcost3<?php echo $n_code['code'];?>" class="col-xs-6">
         <h4>Costcode 3</h4>
       
          <input type="text" class="form-control input-sm" id="cost3s<?php echo $n_code['code'];?>" placeholder="ค้นหาโดยรหัส">
         <p></p>
        <select multiple class="form-control" id="cost3<?php echo $n_code['code'];?>" style="height:150px;">
            </select>
                       </div>
     <div id="tabcost4<?php echo $n_code['code'];?>" class="col-xs-6">
        <select multiple class="form-control" id="cost4<?php echo $n_code['code'];?>" style="height:150px;"></select>

     </div>
      <input type="text" class="form-control input-sm" readonly name="costcodetext<?php echo $n_code['code']; ?>" id="costcodetext<?php echo $n_code['code']; ?>">


    <div id="cost-control<?php echo $n_code['code'];?>" class="col-xs-12">
        <hr>

            <div class="row" style="margin-top:10px;">
                <div class="col-xs-12">
               
            <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostupppp<?php echo $n_code['code'];?>">SELECT</button>
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
     $("#cost4<?php echo $n_code['code'];?>").hide();
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


    $('#cost1<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1<?php echo $n_code['code'];?>" ).change(function() {

         var c1 = $('#cost1<?php echo $n_code['code'];?>').val();
         $('#cost2<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
     $("#tabcost2<?php echo $n_code['code'];?>").show();
         $("#tabcost4<?php echo $n_code['code'];?>").hide();
         $("#costcodetext<?php echo $n_code['code'];?>").val(c1);
         $('#cost3<?php echo $n_code['code'];?>').html('');
    });
    $( "#cost2<?php echo $n_code['code'];?>" ).change(function() {
        var c1 = $('#cost1<?php echo $n_code['code'];?>').val();
         var c2 = $('#cost2<?php echo $n_code['code'];?>').val();
        var c3 = $('#cost3<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
         // // $('#cost4<?php echo $n_code['code'];?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
          $("#costcodetext<?php echo $n_code['code'];?>").val(c1+c2);
    });
    $( "#cost3<?php echo $n_code['code'];?>").change(function() {
        var c1 = $('#cost1<?php echo $n_code['code'];?>').val();
        var c2 = $('#cost2<?php echo $n_code['code'];?>').val();
        var c3 = $('#cost3<?php echo $n_code['code'];?>').val();
         $("#costcodetext<?php echo $n_code['code'];?>").val(c1+c2+c3);
         $("#cost-control<?php echo $n_code['code'];?>").show();


    });
    $( "#cost4<?php echo $n_code['code'];?>" ).change(function() {
         $("#cost-control<?php echo $n_code['code'];?>").show();
    });
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
     $('#vcostcode_ls<?php echo $n_code['code'];?>').val(codecostcode);
     $('#list_ls<?php echo $n_code['code'];?>').val(gcostcode);
     $('#gcostcode_ls<?php echo $n_code['code'];?>').html(gcostcode);
     $('#costcode_ls<?php echo $n_code['code'];?>').modal('hide');
     $("#tabcost4_ls<?php echo $n_code['code'];?>").hide();
     $("#costnameint_ls<?php echo $n_code['code']; ?>").val(gcostcode);
     $("#subcostcode<?php echo $n;?>").val(codecostcode);
     $("#subcostcodename<?php echo $n;?>").val(gcostcode);
     $("#codecostcodeint_ls<?php echo $n_code['code']; ?>").val(codecostcode);
     $("#costname_ls<?php echo $pr_id;?>").val(gcostcode);
     $("#codecostcode_ls<?php echo $pr_id; ?>").val(codecostcode);
     $("#costname_ls<?php echo $n_code['code'];?>").val(gcostcode);
     $("#codecostcode_ls<?php echo $n_code['code']; ?>").val(codecostcode);
     $("#code_type_2_bom_<?php echo $n_code['code']; ?>").val(c1);
     $("#costname").val(gcostcode);

      $('#lo_costname<?php echo $n_code['code']; ?>').val(gcostcode);
     $('#lo_costcode<?php echo $n_code['code']; ?>').val(codecostcode);

     $('#eee').val(codecostcodee);
     $('#ddd').val(gcostcodee);
     // alert(gcostcode);
      });

     
    });

    $("#cost3s<?php echo $n_code['code'];?>").keyup(function(event) {
    var b1 = $('#cost3s').val();
    var c1 = $('#cost1<?php echo $n_code['code'];?>').val();
    var c2 = $('#cost2<?php echo $n_code['code'];?>').val();
  $("#cost3<?php echo $n_code['code'];?>").load('<?php echo base_url('materialcode/getcostcode3_where');?>'+'/'+c1+'/'+c2+'/'+b1);
   
});


  // });
</script>
