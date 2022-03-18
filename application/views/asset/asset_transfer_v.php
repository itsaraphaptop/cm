<div class="page-header">

        </div>

   <form method="post" action="<?php echo base_url(); ?>index.php/asset_active/transferasset">     
         <div class="col-md-12">
            <div class="panel panel-flat">
             <div class="panel-heading">

          <div class="row">

                  <div class="form-group">
                    <div class="col-sm-2">
                    <label class="control-label">No :</label>
                      <input type="text" class="form-control input-xs" name="transfer_code" id="transfer_code" readonly="">
                       <input type="hidden" class="form-control input-xs" name="fa_location" id="fa_location" style="width: 200px;" readonly="" >
                    </div>

                    <div class="col-sm-2">
                    <label class="control-label">Date :</label>
                      <input type="text" class="form-control input-xs" name="transfer_date" id="transfer_date" value="<?php echo date("Y-m-d"); ?>" readonly="">
                    </div>
  
                       <div class="col-sm-2">
                    <label class="control-label">Time :</label>
                      <input type="text" class="form-control input-xs" name="transfer_time" id="transfer_time" value="<?php echo date("h:i:sa"); ?>" readonly="" >
                    </div>

                     <div class="col-sm-3">
                    <label class="control-label">Ref. Document :</label>
                      <input type="text" class="form-control input-xs" name="transfer_document" id="transfer_document">
                    </div>
                  </div>

                  </div> 

<br>
                  <!-- <div class="row">
                     <div class="form-group col-lg-1">
                    <label class="control-label">Department</label>
                    <input type="text" class="form-control input-sm" name="fa_departmentid" id="depid" readonly="">
                    </div>
                    <div class=" col-lg-4">
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    <input type="text" class="form-control input-sm" name="fa_departmentname" id="depname" readonly="">
                     <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                    </div>

                  </div>  -->

                  <div class="row">
                   <div class="form-group col-lg-2">
                    <label class="control-label">Project / Department:</label>
                    <input type="text" class="form-control input-sm" name="fa_projectid" id="projectidd" readonly="">
                    </div>
                    <div class="col-md-4">
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    

                    <input type="text" class="form-control input-sm" name="fa_projectname" id="projectnamee" readonly="">
                    <span class="input-group-btn">
                       <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                    </div>
                    <div id="jobsystem"></div>
                  </div> 

                  
                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-4">
                    <label class="control-label">Description :</label>
                      <input type="text" class="form-control input-xs" name="transfer_de" id="transfer_de" required="">
                    </div>
                    <div class="col-sm-2">
                    <label class="control-label">Receive Asset Date :</label>
                      <input type="date" class="form-control input-xs" name="transfer_assdate" id="transfer_assdate">
                    </div>
                  </div>
                </div>  
                <br>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-4">
                      <label class="control-label">Driver :</label>
                        <input type="text" class="form-control input-xs" name="transfer_driver" id="transfer_driver">
                      </div>
                      <div class="col-sm-3">
                      <label class="control-label">Vehicle Registration :</label>
                        <input type="text" class="form-control input-xs" name="transfer_registration" id="transfer_registration">
                      </div>
                    </div>
                  </div>  
                  <br>
                  <div class="row">
                    <div class="col-sm-4">
                    <label class="control-label">Carrier by :</label>
                      <input type="text" class="form-control input-xs" name="transfer_carrier" id="transfer_carrier">
                    </div>
                  </div>     
        </div>
</div>
</div>

<div class="col-md-12">
            <div class="panel panel-flat">
             <div class="panel-heading">
             <div class="row">
               <div id="print" class="col-md-5 input-group">
              <a  data-toggle="modal" data-target="#insertrow"  class="insertrow btn bg-teal-400">Insert Row</a>
            
                  </div>
             </div><br>
             <div class="row">
             <div class="col-sm-12">
             <div class="table-responsive">
               <table class="table table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                      
                               <th style="text-align: center;">No</th>
                               <th style="text-align: center;">Asset Code</th>   
                               <th style="text-align: center;">Asset Name</th>
                               <th style="text-align: center;">Serial No.</th>
                               <th style="text-align: center;">Frome Project</th>
                               <th style="text-align: center;">Frome Job</th>
                               <th style="text-align: center;">Frome Dpt. Code</th>
                               <th style="text-align: center;">User by</th>
                               <th style="text-align: center;">User Name</th>
                               <th style="text-align: center;">% Availablity</th>
                               <th style="text-align: center;">Emp. Code To.</th>
                               <th style="text-align: center;">Employee Name</th>
                               <th style="text-align: center;">Location Code</th>
                               <th style="text-align: center;">Location Name</th>
                               <th style="text-align: center;">Retremark</th>
                               <th></th>
                               <th style="text-align: center;">Action</th>
                               
                      </tr>
                    </thead>
                    <tbody id="body">
                      <tr>

                      </tr>
                    </tbody>

                  </table>
                  </div>
             </div>
             </div>
<br>
             <div class="row">
               <div class="col-md-12 text-right" >
        <a type="button" data-toggle="modal" data-target="#retrieve" class="retrieve btn bg-teal-400">Retrieve</a>
        <a type="button" onclick="history.go(0)" class="btn bg-teal-400">New</a>
        <button type="submit" id="savetranfer" class="btn bg-danger">Save</button>
        <br>
        <br>
                  </div>
             </div>
</div>
</div>
</div>
  </form>
<div class="modal fade" id="insertrow" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Asset</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            
            <div id="addretrive"></div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script>

   $(".insertrow").click(function(){
    var depid = $("#depid").val();
    var projectidd = $("#projectidd").val();
      if(depid=="" && projectidd==""){
        $('#insertrow').modal('toggle');
        alert('กรุณาทำการเลือก Department หรือ Project ก่อนทำการกด Insert Row');  
        location.reload(); 
      }else{
       $('#addretrive').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#addretrive").load('<?php echo base_url(); ?>index.php/add_asset/model_addre');
      }
     });

</script>   
<div class="modal fade" id="openproj" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header  bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Project</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="xxxx">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="opendepart" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Department</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_department">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  
  $(".openproj").click(function(){
    $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#xxxx").load('<?php echo base_url(); ?>index.php/share/project');
    });

   $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });
</script>


<div class="modal fade" id="retrieve" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการโอนทรัพย์สิน</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="retrievee">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
   $(".retrieve").click(function(){
      $('#retrievee').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#retrievee").load('<?php echo base_url(); ?>index.php/add_asset/transfer_retrive');
    });


   $('#transfer_asset').attr('class', 'active');
</script>