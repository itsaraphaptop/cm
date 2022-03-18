<?php
$pro = $this->db->query("SELECT * from project where project_id = '$no' ")->result();
  foreach ($pro as $gg) {
    $projectname = $gg->project_name;
  }
?>
<div class="page-header">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">Status Cheque </h6>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
          </div>
          <form id="fapp" action="<?php echo base_url(); ?>ap_active/ap_approve_cheque" method="post">
            <div class="panel-body">
              
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-2">
                    <label for="">Project Code :</label><div id="cccc"></div>
                    <input type="text" id="project_id" name="project_id" class="form-control" value="<?php echo $no; ?>" readonly="true">
                  </div>     
                  <div class="form-group col-sm-3">               
                   <label for="">Project Name :</label><div id="cccc"></div>    
                    <input type="text" id="project_name" name="project_name" class="form-control" value="<?php echo $projectname; ?>" readonly="true">
                  </div>                           
                </div>
              </div>
             
              <div class="col-md-12">
                <div class="row">
                  <div class="table-responsive" id="invoicedown">
                    <table class="table table-hover table-bordered table-striped table-xxs">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Cheque Bank Status</th>
                            <th>Bank Date</th>
                            <th>Chq. No.</th>
                            <th>Chq. Amount</th>
                            <th>Post Date Chq.</th>
                            <th>Pay to</th>
                            <th>PV Amount</th>
                            <th>Bank Account No.</th>
                            <th>Bank Code</th>
                            <th>Bank</th>
                            <th>Paid No.</th>
                            <th>Clear No.</th>
                          </tr>
                        </thead>
                        <tbody id="all" >
                        <?php $n=1; foreach ($status as $val) { 
                          $apcode = $val->ap_code;
                          $bb = $this->db->query("SELECT * from bank where bank_code = '$val->ap_bank_id' ")->result();
                          foreach ($bb as $bank) {
                            $bankname = $bank->bank_name;
                          }

                          ?>
                           <tr>
                            <th><?php echo $n; ?></th>
                            <th>
                              <div class="checkbox checkbox-switchery switchery-xs">
                                <label class="display-block">
                                  <input type="checkbox" id="cheque"  name="cheq" value="1"> Yes<br>
                                  <input type="checkbox" id="whchktax" name="cheq" value="2"> Return<br>
                                  <input type="checkbox" id="chedi" name="cheq" checked="checked" value="3"> NULL
                                </label>
                              </div>
                            </th>
                            <th><input type="date" class="form-control"></th>
                            <th><?php echo $val->ap_chno; ?></th>
                            <th><?php echo $val->api_netamt; ?></th>
                            <th><?php echo $val->createdate; ?></th>
                            <th><?php echo $val->ap_paidto; ?></th>
                            <th><?php echo $val->api_netamt; ?></th>
                            <th><?php echo $val->acc_code; ?></th>
                            <th><?php echo $val->ap_bank_id; ?></th>
                            <th><?php echo $bankname; ?></th>
                            <th><?php echo $val->ap_pl; ?></th>
                            <?php if ($val->ap_status != "wait") { ?>
                              <th><?php echo $val->ap_pl; ?></th>
                            <?php  }else{  ?>
                            <th> </th>
                            <?php } ?>
                          </tr>
                          <?php $n++; }  ?>

                        </tbody>

                        
                    </table>
                  </div>
                </div> 
              </div>
              <br>
              <div class="text-right">  
              <br>       
                  <button type="button" id="saveapp" class="btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
                <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
              </div> 

            </div>
          </form>                      
        </div>
      </div>
    </div>
  </div>
</div>  <!-- /content area -->

<div  id="openbank" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Bank</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_bank">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 


<div class="modal fade" id="openinv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Select</h4>
      </div>
      <div class="modal-body">
        <div id="openallmodal"></div>
      </div>
    </div>
  </div>
</div>






<script>

   $(".openbank").click(function(event){
    if ($("#chkk").val()=="") {
      swal({
          title: "กรุณาเลือก Add Row!!.",
          text: "",
          confirmButtonColor: "#EA1923",
          type: "error"
      });
    }else{
      $('#openbank').modal('show');
      $(".openinv").hide();
      $('#modal_bank').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_bank").load('<?php echo base_url(); ?>index.php/share/bank');     
    }
  });            

   $(".openinv").click(function(){
   $('#openallmodal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#openallmodal").load('<?php echo base_url(); ?>ap/openallmodal/<?php echo $no; ?>');
   });

$("#saveapp").click(function(e){
if ($("#chno").val()=="") {
  swal({
      title: "กรุณาเลือก Cheque  No  !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if($("#bank_id").val()==""){
  swal({
      title: "กรุณาเลือก Bank !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
  }else if($("#chnodate").val()==""){
  swal({
      title: "กรุณากรอกวันที่ Cheque !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
  }else if($("#paidtype").val()==""){
swal({
    title: "กรุณาเลือก Paid Type !!.",
    text: "",
    confirmButtonColor: "#EA1923",
    type: "error"
});
}else if($("#bankid").val()==""){
swal({
    title: "กรุณาเลือกธนาคาร !!!.",
    text: "",
    confirmButtonColor: "#EA1923",
    type: "error"
});
}else if($(".acid").val()==""){
swal({
    title: "กรุณาเพิ่มฝังบัญชีธนาคาร !!!.",
    text: "",
    confirmButtonColor: "#EA1923",
    type: "error"
});
}else{
     var frm = $('#fapp');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                        swal({
                                  title: "Save Completed!!.",
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
      
                        setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>ap/showap_approve/<?php echo $apcode; ?>";
                        }, 500);
                       
                    }
                });
                ev.preventDefault();

            });
          $("#fapp").submit();
      }
});
</script>


    <!-- /core JS files -->
<script>
  $.extend( $.fn.dataTable.defaults, {  
   
    drawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function() {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
 });

</script>
s