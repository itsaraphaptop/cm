<style>
.no_border {
text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;
}
</style>
<div class="page-container" style="min-height:314px">
  <div class="page-content">
    <div class="content-wrapper">
        <div class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="tab-content">
                <div class="panel panel-flat">
                  <div class="panel-heading">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-12">
                          <legend><h4> POST TO GL SYSTEM </h4></legend>
                            <div class="container-fluid">
                              <form class="" action="<?php echo base_url(); ?>ap_active/ap_addpost_gl" method="post">
                                <div class="row">
                                  <div class="col-xs-3">
                                    <label for="">Years :</label>
                                    <input class="form-control" type="text" value="<?php echo date("Y");?>" id="yearsel" name="yearsel" value="">
                                  </div>
                                  <div class="col-xs-3">
                                    <label for="">Datatype :</label>
                                    <select class="form-control" name="typedata" id="typedata">
                                      <option value="all">All</option>
                                      <option value="apv">AP (P/O)</option>
                                      <option value="aps">AP (Subcontructor)</option>
                                      <option value="apo">AP (Other)</option>
                                      <option value="pl">PV/PL</option>
                                    </select>
                                  </div>
                                  <div class="col-xs-3">
                                    <label for="">Period :</label>
                                    <select class="form-control" id="glperiod" name="glperiod">
                                      
                                      <?php for ($i=1; $i < 13 ; $i++) { ?>
                                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                      <?php } ?>
                                      </select>
                                  </div>
                                  <div class="col-xs-3">
                                    <button type="button" class="btn bg-green" name="button" id="btnretrieve">Retrieve</button>
                                    <button type="submit" class="btn btn-info" name="button" id="transfer">Transfer</button>
                                  </div>
                                </div>
                                <hr>
                                <table class="table table-hover table-bordered table-xxs basic">
                                  <thead>
                                    <tr >
                                      <th class="text-center" width="10%">No</th>
                                      <th class="text-center" width="20%">Account_name</th>
                                      <th class="text-center" width="20%">Project Name</th>
                                      <th class="text-center" width="10%">System Type</th>
                                      <th class="text-center" width="15%">DR</th>
                                      <th class="text-center" width="15%">CR</th>
                                    </tr>
                                  </thead>
                                  <tbody id="gll">
                                  </tbody>
                                  <tr>
                                    <td colspan="4">Summary</td>
                                    <td style="padding: 1px 2px;text-align: right;"><input type="text" class="no_border" readonly="" name="ar_dramt" id="ar_dramt" value="0"></td>
                                    <td style="padding: 1px 2px;text-align: right;"><input type="text" class="no_border" readonly="" name="ar_cramt" id="ar_cramt" value="0"></td>
                                  </tr>
                                </table> 
                              </form>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
              </div>
           </div>
          </div>
        </div>
    </div>
  </div>
</div>

<script>
$("#transfer").hide();

$('#btnretrieve').click(function() {
  var yearsel = $('#yearsel').val();
  var glperiod = $('#glperiod').val();
  var typedata = $('#typedata').val();
  var vs = $('#vstart').val();
  var ve = $('#vend').val();
  var ds = $('#dstart').val();
  var de = $('#dend').val();
  $("#transfer").show();
  // alert(yearsel);
  var url="<?php echo base_url(); ?>ap_active/ap_getpost_gl";
          var dataSet={
              year : yearsel,
              period : glperiod,
              type : typedata
              };
              $.post(url,dataSet,function(data){
                $("#gll").html(data);
              }); 
  });



$("#vall").change(function() {
    if(this.checked) {
      $('#vstart').prop('disabled',true);
      $('#vend').prop('disabled',true);
      $('#dstart').prop('disabled',true);
      $('#dend').prop('disabled',true);

      $('#vatxt').val("y");
    }else{
      $('#vstart').prop('disabled',false);
      $('#vend').prop('disabled',false);
      $('#dstart').prop('disabled',false);
      $('#dend').prop('disabled',false);
      $('#vatxt').val("n");

    }

});
</script>

