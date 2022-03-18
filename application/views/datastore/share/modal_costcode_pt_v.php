<div class="row">
    <div id="tabcost1" class="col-xs-6">
        <h4>CostCode 1</h4>
        <input type="text" class="form-control input-sm" id="cost1s" placeholder="ค้นหาโดยรหัส">
        <p></p>
        <select multiple class="form-control" id="cost1" style="height:150px;">
        </select>
    </div>
    <div id="tabcost2" class="col-xs-6">
    <h4>CostCode 2</h4>
    <input type="text" class="form-control input-sm" id="cost2s" placeholder="ค้นหาโดยรหัส">
    <p></p>
    <select multiple class="form-control" id="cost2" style="height:150px;"></select>
</div>
<div id="tabcost3" class="col-xs-6">
    <h4>CostCode 3</h4>
    <input type="text" class="form-control input-sm" id="cost3s" placeholder="ค้นหาโดยรหัส">
    <p></p>
    <select multiple class="form-control" id="cost3" style="height:150px;">
    </select>
</div>
<div id="tabcost4" class="col-xs-6">
    <h4>CostCode 4</h4>
    <input type="text" class="form-control input-sm" id="cost4s" placeholder="ค้นหาโดยรหัส">
    <p></p>
    <select multiple class="form-control" id="cost4" style="height:150px;"></select>
</div>

<div id="tabcost5" class="col-xs-6">
    <h4>CostCode 5</h4>
    <input type="text" class="form-control input-sm" id="cost5s" placeholder="ค้นหาโดยรหัส">
    <p></p>
    <select multiple class="form-control" id="cost5" style="height:150px;"></select>
</div>
<div id="tabcost5" class="col-xs-6">
<label>CostCode</label><input type="text" class="form-control input-sm" readonly name="costcodetext" id="costcodetext">
</div>
<div id="cost-control" class="col-xs-12">
<hr>
<div class="row" style="margin-top:10px;">

    <div class="col-xs-12">
        
        <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostupoo">SELECT</button>
    </div>
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script>
//   $(document).ready(function() {
$(".addboxpri").hide();
$("#editpo").hide();
$("#adddetail").hide();
$(".print").hide();
$('#newmatname').prop('disabled', true);
// $("#taxv").val('0');


    $("#codeup").click(function(){});
     $("#gencodebtn").hide();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();
     $('#cost-control').hide();
     $("#box6").hide();


     $('#gencode').on('hidden.bs.modal', function () {
     $("#type1").show();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();

     $("#gencodebtn").hide();


     });


     $('#box1').load('<?php echo base_url('index.php/materialcode/get_type');?>');
     $( "#box1" ).change(function() {
           var b1 = $('#box1').val();
           $('#box2').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2").show();
          $('#vgencode').html('');
          $("#costcodetext").val(b1);
    });
       $( "#box1" ).click(function() {
           var b1 = $('#box1').val();
           $('#box2').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2").show();
          $('#vgencode').html('');
          $("#costcodetext").val(b1);

    });
    $( "#box2" ).change(function() {
         $("#type1").hide();
         var b1 = $('#box1').val();
         var b2 = $('#box2').val();
         $('#box3').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
         $("#type3").show();
    });
    $( "#box3" ).change(function() {
        var b1 = $('#box1').val();
         var b2 = $('#box2').val();
         var b3 = $('#box3').val();
         $('#box4').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
         //$('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b1+'/'+b2+'/'+b3);


         $("#type4").show();
         $("#type2").hide();
    });
    $( "#box4" ).change(function() {
         //$("#type4").hide();
         $('#type3').hide();
         $("#gencodebtn").show();
         //$("#type5").show();

    });
    $("#box5").change(function() {
       //$("#gencodebtn").show();
       //var b5 = $('#box5').val();
    });

    $('#btngenmatcode').click(function(){
     var b1 = $('#box1').val();
     var b2 = $('#box2').val();
     var b3 = $('#box3').val();
     var b4 = $('#box4').val();
     var b5 = $('#box5').val();

     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6').val(b6gmatcode);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall";
          var dataSet={
            b1: b6gmatcode
            };
            $.post(url,dataSet,function(data){

              $('#matname').val(data);
              $("#list").val(data);
              $('#vgencode').html(data);
            });

    });


    $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1" ).change(function() {

         var c1 = $('#cost1').val();
         $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
         $("#tabcost2").show();
         // $("#tabcost4").hide();
         $("#costcodetext").val(c1);
         $('#cost3').html('');
    });
    $( "#cost2" ).change(function() {
        var c1 = $('#cost1').val();
         var c2 = $('#cost2').val();
        var c3 = $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c1+'/'+c2);
         // // $('#cost4').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
          $("#costcodetext").val(c1+c2);
    });
    $( "#cost3").change(function() {
        var c1 = $('#cost1').val();
        var c2 = $('#cost2').val();
        var c3 = $('#cost3').val();
        var c4 = $('#cost4').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost4/');?>'+'/'+c1+'/'+c2+'/'+c3);
         $("#costcodetext").val(c1+c2+c3);
         $("#cost-control").show();

         $('#cost5').html('');


    });
    $( "#cost4" ).change(function() {
        var c1 = $('#cost1').val();
        var c2 = $('#cost2').val();
        var c3 = $('#cost3').val();
        var c4 = $('#cost4').val();
        var c5 = $('#cost5').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup_cost5/');?>'+'/'+c1+'/'+c2+'/'+c3+'/'+c4);
        $("#costcodetext").val(c1+c2+c3+c4);
        $("#cost-control").show();
    });

    $( "#cost5" ).change(function() {
        var c1 = $('#cost1').val();
        var c2 = $('#cost2').val();
        var c3 = $('#cost3').val();
        var c4 = $('#cost4').val();
        var c5 = $('#cost5').val();
        $("#costcodetext").val(c1+c2+c3+c4+c5);
    });

    $("#btncostupoo").click(function(){
     var c1 = $('#cost1').val();
     var c2 = $('#cost2').val();
     var c3 = $('#cost3').val();
     var c4 = $('#cost4').val();
     var c5 = $('#cost5').val();
     var url="<?php echo base_url(); ?>costcode/getcostcode"+'/'+c1+'/'+c2+'/'+c3+'/'+c4+'/'+c5;
    var dataSet={
      };
      $.post(url,dataSet,function(data){
     var gcostcode = data;
     var codecostcode = c1+''+c2+''+c3+''+c4+''+c5;
     $('#costname<?php echo $rowpt ?>').val(codecostcode);
     $('#vcostcode<?php echo $rowpt ?>').val(gcostcode);
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
            
     $('#subcostcodenamei').val(gcostcode);
     $('#subcostcodei').val(codecostcode);

     $('#subcostcodenamei<?php echo $rowpt; ?>').val(gcostcode);
     $('#subcostcodei<?php echo $rowpt; ?>').val(codecostcode);


     
      });
 
     
    });

    $("#cost3s").keyup(function(event) {
    var b1 = $('#cost3s').val();
    var c1 = $('#cost1').val();
    var c2 = $('#cost2').val();
  
    $("#cost3").load('<?php echo base_url('materialcode/getcostcode3_where');?>'+'/'+c1+'/'+c2+'/'+b1)


});

//   });
</script>
