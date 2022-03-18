<div class="content-wrapper">
  <div class="content">
  <form id="clap" action="<?php echo base_url(); ?>ap_cheque/confirm_vender" method="post">
    <div claass="content">
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Clear Account Payable</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li style="color: #ffffff"><a class="openinv btn btn-info" data-toggle="modal" data-target="#openinv"><i class=" icon-file-plus"></i> Select</a></li>
            </ul>
          </div>        
        </div>
        <div class="panel-body">           
          <div class="col-md-12">
            <div class="row">
              <div class="form-group col-sm-2">
                <label for="">AP Date :</label>
                <input type="date" id="vchdate" name="ded_vchdate" class="form-control">
                <input type="hidden" id="cl_date" name="cl_date" class="form-control">
              </div>
              <div class="form-group col-sm-2">
                <label for="">Year :</label>
                <input type="text" id="glyear" name="ded_glyear" value="" class="form-control" readonly="true">
              </div>
              <div class="form-group col-sm-2">
                <label for="">Period :</label>
                <input type="text" id="glperiod" readonly="true" name="ded_glperiod" value="" class="form-control">
              </div>
            </div>
          </div>        
          <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
              <li class="active"><a data-toggle="tab" href="#menu1"><i class=" icon-coins position-left"></i>GL</a></li>
              <li><a data-toggle="tab" href="#menu2"><i class="icon-wrench position-left"></i>AP No</a></li>
              <li><a href="#menu3" data-toggle="tab"><i class="icon-price-tag position-left"></i> TAX</a></li>
            </ul>
          </div>           
            <input type="hidden" name="apino" id="apino">
            <!-- <input type="text" name="apitype" id="apitype">
            <input type="text" name="apid" id="apid">
            <input type="text" name="apipl" id="apipl"> -->
            <input type="hidden" id="cr" name="cr">
          <div class="tab-content">
            <div id="menu1" class="tab-pane fade in active">
              <div id="m1">            
              </div>
            </div>
            <div id="menu2" class="tab-pane fade">
              <div id="m2">
              </div>
            </div>
            <div id="menu3" class="tab-pane fade">
              <div id="m3">
              </div>
            </div>
          </div>
          <div class="text-right">        
            <button type="button" id="saveapp" class="btn btn-success"><i class="icon-box-add"></i> Save </button> 
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
          </div>            
        </div>
      </div>
    </div>
 </form>
</div>
<div class="modal fade" id="openinv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full" role="document">
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
$(".openinv").click(function(){
    $('#openallmodal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#openallmodal").load('<?php echo base_url(); ?>ap_cheque/openclear');
});
</script>

<!-- /main content -->


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
 $("#vchdate").change(function(event) {
  var de_date = $("#vchdate").val();
  var y = de_date.slice(0,4); 
  var m = de_date.slice(5,7);

  $("#glperiod").val(m);
  $("#glyear").val(y);         

  }); 

$.extend( $.fn.dataTable.defaults, {
     
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.datatable-basic').DataTable();
</script>

<script>
  $("#saveapp").click(function(e){
    var url="<?php echo base_url(); ?>ap_active/selectdate";
        var dataSet={
        d: $("#vchdate").val(),
        y: $("#glyear").val(),
        m: $("#glperiod").val()
        };
      $.post(url,dataSet,function(data){
// if (data!="Y") {
//   swal({
//       title: "งวดบัญชีผิด กรุณาเลือกวันที่ใหม่!!.",
//       text: "",
//       confirmButtonColor: "#EA1923",
//       type: "error"
//   });
// }else{
     var frm = $('#clap');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                            var json_res = jQuery.parseJSON(data);
                            try{
                                  if(json_res.status){
                                      swal({
                                          title: "Save Completed!!.",
                                          text: "Save Completed!!.",
                                          // confirmButtonColor: "#66BB6A",
                                          type: "success"
                                      });

                                      setTimeout(()=>{
                                          window.location.href = "<?php echo base_url(); ?>index.php/ap_cheque/clear_ap";
                                      },800)

                                  }else{
                                      swal({
                                          title: "Save Error!!.",
                                          text: "Save Error!!.",
                                          // confirmButtonColor: "#66BB6A",
                                          type: "error"
                                      });
                                  }
                              
                            }catch(e){
                                console.log(data);
                            }
                    }
                });
                ev.preventDefault();

            });
          $("#clap").submit();
      // }
});
      });
</script>