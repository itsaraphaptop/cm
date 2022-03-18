<div class="page-header">

        </div>

         <div class="col-md-12">
      <div class="panel panel-flat">
           <div class="panel-heading">
       <div class="row">

                  <div class="form-group">
                    <div class="col-sm-2">
                    <label class="control-label">Asset Code :</label>
                      <input type="text" class="form-control input-xs" name="accode" id="accode" readonly="true">
                       
                    </div>

                     <div class="col-sm-4">
                    <label class="control-label">&nbsp;</label>
                      <input type="text" class="form-control input-xs" name="acname" id="acname"  readonly="true">
                       
                    </div>
                </div>

</div>
<br>
  <div class="row">

                  <div class="form-group">
                    <div class="col-sm-2">
                    <label class="control-label">Employee :</label>
                      <input type="text" class="form-control input-xs" name="emp_code" id="emp_code" readonly="true">
                       
                    </div>

                     <div class="col-sm-4">
                    <label class="control-label">&nbsp;</label>
                      <input type="text" class="form-control input-xs" name="emp_name" id="emp_name"  readonly="true">
                       
                    </div>
                </div>

</div>
<br>
  <div class="row">

                  <div class="form-group">
                    <div class="col-sm-2">
                    <label class="control-label">Project/Department NO. :</label>
                      <input type="text" class="form-control input-xs" name="pro_no" id="pro_no" readonly="true">
                       
                    </div>

                     <div class="col-sm-4">
                    <label class="control-label">&nbsp;</label>
                      <input type="text" class="form-control input-xs" name="pro_name" id="pro_name"  readonly="true">
                       
                    </div>
                </div>

</div>
<br><br>

<div id="xa"></div>
</div>
</div>
</div>

         <div class="col-md-12">
      <div class="panel panel-flat">
           <div class="panel-heading">


			             <div class="row">
             <div class="col-sm-12">
             <div class="table-responsive">
               <table class="table table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                      
                               <th style="text-align: center;">No</th>
                               <th style="text-align: center;">Cost Code</th>   
                               <th style="text-align: center;">Maintenance Name</th>
                               <th style="text-align: center;">Doc Date</th>
                               <th style="text-align: center;">Module</th>
                               <th style="text-align: center;">Project Name / Dpt Name</th>
                               <th style="text-align: center;">Doc No</th>
                               <th style="text-align: center;">Next Date</th>
                               <th style="text-align: center;">Qty</th>
                               <th style="text-align: center;">Cerent Mile</th>
                               <th style="text-align: center;">Amount</th>
                               <th style="text-align: center;">Item Name(IC)</th>
                               <th style="text-align: center;">Remark</th>
                             
                      </tr>
                    </thead>
                    <tbody id="de">
                      <tr>
                    
                      </tr>
                    </tbody>

                  </table>
                  </div>
             </div>
             </div>
</div>
</div>
</div>

        <div class="col-md-12">
      <div class="panel panel-flat">
           <div class="panel-heading">
<div class="row">
<div id="print" class="col-sm-2"></div>
  <div class="col-md-10 text-right">
        <a type="button" data-toggle="modal" data-target="#retrievemodaladd" class="modaladd btn bg-teal-400">Retrive</a> 
        
          
  </div>

  <br><br>  <br>
</div>




<div class="modal fade" id="retrievemodaladd" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">History</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
        <div id="modaladdx"></div>
        </div>
        </div>
        </div>
    </div>
  </div>

  <script>
  $(".modaladd").click(function(){
       $('#modaladdx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#modaladdx").load('<?php echo base_url(); ?>index.php/add_asset/model_maintenance');
     });


  $('#maintenance').attr('class', 'active');
</script>

