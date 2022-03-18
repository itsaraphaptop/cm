<div class="row">
    <div id="tabbank" class="col-md-6">
        <h4 id="hbank">Bank</h4>
        <select multiple class="form-control" id="bank" style="height:200px;">
        </select>
    </div>
    <div id="tabcost2" class="col-md-6">

         <h4>Branch</h4>
         <select multiple class="form-control" id="branchm" style="height:200px;"></select>

    </div>
    <div id="tabcost3" class="col-md-12">
         <h4>Bank Account</h4>
        <select multiple class="form-control" id="accountno" style="height:200px;">
            </select>
    </div>
</div>
<br>
<div class="modal-footer">
  <button type="button" id="select" class="btn btn-primary" data-dismiss="modal">SELECT</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>

<script>
// $(document).ready(function() {
  $("#bank").load('<?php echo base_url('data_master/getbank'); ?>');
// });
$("#bank").change(function(){
  var bank = $("#bank").val();
  $("#branchm").load('<?php echo base_url('data_master/getbankbranch'); ?>'+'/'+bank);
});

$("#branchm").change(function(){
  var bank = $("#bank").val();
  var branch = $("#branchm").val();
    $("#accountno").load('<?php echo base_url('data_master/getacconuntno'); ?>'+'/'+bank+'/'+branch);
});
$("#select").click(function(){
  var bankcode = $("#bank").val();
  var branch = $("#branchm").val();
  var accountno = $("#accountno").val();
  var url="<?php echo base_url(); ?>data_master/getbankn/"+bankcode;
		$.post(url,function(data){
      $("#bankid").val(bankcode);
      $("#bankname").val(data);
		});
    var url="<?php echo base_url(); ?>data_master/getbranchn/"+bankcode+"/"+branch;
    $.post(url,function(data){
      $("#branch").val(data);
      $("#branchid").val(branch);
    });
    var url="<?php echo base_url(); ?>data_master/getaccountn/"+bankcode+"/"+branch+"/"+accountno;
    $.post(url,function(data){
      $("#acno").val(data);
      $("#acid").val(accountno);
      $("#acc_code").val(accountno);
      $("#trac").val(accountno);

      
    });

     var url="<?php echo base_url(); ?>data_master/getaccountncode/"+bankcode+"/"+branch+"/"+accountno;
    $.post(url,function(data){
      $(".acid").val(data);
    });

});
</script>
