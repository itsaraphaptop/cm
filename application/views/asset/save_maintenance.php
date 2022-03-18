

<div class="row">
  <div class="col-md-5">
        <a type="button" data-toggle="modal" data-target="#modaladd" class="modaladd btn bg-teal-400">Add</a>         

                  </div>
</div>

<div class="modal fade" id="modaladd" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">History</h4>
      </div>
        <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>index.php/asset_active/maintenanceass">
        <div class="panel-body">
              <div class="row">

                  <div class="form-group">
                    <div class="col-sm-5">
                    <label class="control-label">Decument No :</label>
                      <input type="text" name="asfa_dec" id="asfa_dec" class="form-control input-xs" style="width: 200px;" readonly="">
                       
                    </div>

                     <div class="col-sm-3">
                    <label class="control-label">Old No.</label>
                      <input type="text" name="asfa_old" id="asfa_old" class="form-control input-xs" readonly="">
                       
                    </div>

                    <div class="col-sm-3">
                    <label class="control-label">Doc. Date.</label>
                      <input type="text" name="asfa_docdate" id="asfa_docdate" class="form-control input-xs" value="<?php echo date("Y-m-d");?>">
                       
                    </div>
                </div>

</div>

<div class="row">

                  <div class="form-group">
                    <div class="col-sm-5">
                    <label class="control-label">&nbsp;</label>

                    </div>

                     <div class="col-sm-3">
                    <label class="control-label">Ref No.</label>
                      <input type="text" name="asfa_refno" id="asfa_refno" class="form-control input-xs">
                       
                    </div>

                    <div class="col-sm-3">
                    <label class="control-label">Ref. Date.</label>
                      <input type="date" name="asfa_refdate" id="asfa_refdate" class="form-control input-xs">
                       
                    </div>
                </div>

</div>

<br>
 <?php 
$this->db->select('*');
$this->db->from('asset');
$this->db->where('fa_assetcode',$id);
$ww=$this->db->get()->result();
foreach ($ww as $keyw) {
$fa_asset = $keyw->fa_asset;
}
?>

<div class="row">
      <div class="col-xs-6">
                            <label for="">Ref. Asset Code</label>
                              <div class="input-group">
                          <input type="text" id="accode<?php echo $id; ?>" name="asfa_asscode"  readonly="true"  class="form-control input-sm" value="<?php echo $id; ?>">
                          <input type="text" id="acname<?php echo $id; ?>" name="asfa_assname" readonly="true"  class="form-control input-sm" value="<?php echo $fa_asset; ?>" required="">
                          <input type="hidden" id="statusass" readonly="true"  class="form-control input-sm">
                                  <span class="input-group-btn" >
                                    <button class="btn btn-info btn-sm" id="refasset<?php echo $id; ?>" data-toggle="modal" data-target="#refass<?php echo $id; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                  </span>
                              </div>
                            </div>
</div>

<div class="row">
                   <div class="form-group col-lg-2">
                    <br>
                    <label class="control-label">Project :</label>
                    <br>
                    <input type="text" class="form-control input-sm" name="fa_projectid" id="projectidd" readonly="">
                    </div>
                    <div class="col-md-4">
                     <br>
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    <input type="text" class="form-control input-sm" name="fa_projectname" id="projectnamee" readonly="">
                    <span class="input-group-btn">
                       <button type="button" data-toggle="modal" data-target="#openproj" class="openproj btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                    </div>

                     <div class="form-group col-lg-2">
                     <br>
                    <label class="control-label">Department :</label>
                    <br>
                    <input type="text" class="form-control input-sm" name="fa_departmentid" id="depid" readonly="">
                    </div>
                    <div class=" col-lg-4">
                    <br>
                    <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    <input type="text" class="form-control input-sm" name="fa_departmentname" id="depname" readonly="">
                     <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                  </div>
        </div>

              <div class="row">
          <div class="col-xs-6">
                           <label for="">รายการต้นทุน</label>
                             <div class="input-group" id="errorcost">
                               <input type="text" id="costnameint" name="asfa_cost" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                               <input type="text" id="codecostcodeint" name="asfa_name" required="" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                 <span class="input-group-btn">
                                   <a class="modalcost btn btn-info btn-sm" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                 </span>
                             </div>
                           </div>

                  <div class="col-lg-2">
                  <div class="input-group">
                    <label class="control-label">Vendor:</label>
                    
                    <input type="text" class="form-control input-sm" name="fa_vender" id="venderid" readonly="" required="true">
                   
                   </div>
                  </div>
                                          <div class="col-lg-4">
                   <label class="control-label">&nbsp;</label> 
      
                 <div class="input-group">
                <input type="text" name="subcontact" value="" placeholder="ชื่อ หรือ บริษัท"  class="form-control input-sm" id="subcontact" required="">
                <div class="input-group-btn">
                  <a type="button" class="openvender btn btn-default btn-sm" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></a>
                </div>
              </div>
              <input type="hidden" name="venderid" id="venderid" value="" >
                  </div>
        </div>

<br>
  <div class="row">

                     <div class="col-lg-2">
                     <label class="control-label">Qty :</label>
                      <div class="input-group">
                      <input type="text" name="asfa_qty" id="asfa_qty" value="" class="form-control input-sm" style="width: 100px;">
                      </div>
                     </div>

                      <div class="col-lg-3">
                     <label class="control-label">Next Date:</label>
                      <div class="input-group">
                      <input type="date" name="asfa_nextdate" id="asfa_nextdate" value="" class="form-control input-sm">
                      </div>
                     </div>

                       <div class="col-lg-3">
                     <label class="control-label">Mile Cuurent :</label>
                      <div class="input-group">
                      <input type="text" name="asfa_milk" id="asfa_milk" value="" class="form-control input-sm">
                      </div>
                     </div>

                      <div class="col-lg-3">
                     <label class="control-label">Next Mile:</label>
                      <div class="input-group">
                      <input type="text" name="asfa_nextm" id="asfa_nextm" value="" class="form-control input-sm">
                      </div>
                     </div>
                  </div>

                     <div class="row">
                      <div class="col-lg-2">
                     <label class="control-label">Amount :</label>
                      <div class="input-group">
                      <input type="text" name="asfa_amount" id="asfa_amount" value="0" class="form-control input-sm" >
                      </div>
                     </div>

                      <div class="col-lg-1">
                     <label class="control-label">vat :</label>
                      <div class="input-group">
                      <input type="text" name="asfa_vat" id="asfa_vat" value="7" class="form-control input-sm" value="7">
                      </div>
                     </div>

                     <div class="col-lg-3">
                     <label class="control-label">&nbsp;</label>
                      <div class="input-group">
                      <input type="text" name="asfa_vatb" id="asfa_vatb" value="0" class="form-control input-sm">
                      </div>
                     </div>

                      <div class="col-lg-1">
                     <label class="control-label">wh :</label>
                      <div class="input-group">
                      <input type="text" name="asfa_wh" id="asfa_wh" value="0" class="form-control input-sm">
                      </div>
                     </div>

                     <div class="col-lg-3">
                     <label class="control-label">&nbsp;</label>
                      <div class="input-group">
                      <input type="text" name="asfa_whb" id="asfa_whb" value="0" class="form-control input-sm">
                      </div>
                     </div>
                  </div>
<br>
                  <div class="row">
                     <div class="col-lg-4">
                     <label class="control-label">Net amount :</label>
                      <div class="input-group">
                      <input type="text" name="asfa_netam" id="asfa_netam" value="0" class="form-control input-sm">
                      </div>
                     </div>

                       <div class="col-lg-6">
                     <label class="control-label">Descrition :</label>
                      <div class="input-group">
                      <input type="text" name="asfa_des1" id="asfa_des1" value="" class="form-control input-sm" style="width: 500px;">
                       <input type="text" name="asfa_des2" id="asfa_des2" value="" class="form-control input-sm" style="width: 500px;">
                        <input type="text" name="asfa_des3" id="asfa_des3" value="" class="form-control input-sm" style="width: 500px;">
                         <input type="text" name="asfa_des4" id="asfa_des4" value="" class="form-control input-sm" style="width: 500px;">
                          <input type="text" name="asfa_des5" id="asfa_des5" value="" class="form-control input-sm" style="width: 500px;">
                      </div>
                     </div>
                  </div>
<br>
                  <div class="modal-footer">
                   <a id="new" class="btn btn-primary">New</a>
                   <button type="submit" class="btn bg-danger">Save</button>
                   <button class="btn btn-default" data-dismiss="modal">Close</button>
                   </form>
                 </div>
        </div>

        </div>
    </div>
  </div>
</div>
    
  <div class="modal fade" id="refass<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
      </div>
        <div class="modal-body">
            <div class="row" id="refasscode<?php echo $id; ?>">
             </div>

        </div>
    </div>
  </div>
</div>

<script>
$('#refasset<?php echo $id; ?>').click(function(){
   $('#refasscode<?php echo $id; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#refasscode<?php echo $id; ?>").load('<?php echo base_url(); ?>share/modalshare_asset/<?php echo $id; ?>');
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
<script>
  $(".openproj").click(function(){
    $('#xxxx').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#xxxx").load('<?php echo base_url(); ?>index.php/share/project');
    });
</script>



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

   $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });
    </script>

  <div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div id="modal_cost"></div>
                 </div>
             </div>
           </div>
         </div>
 <div class="modal fade" id="openvender">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
                          </div>
                            <div class="modal-body">
                                <div id="tablevender">

                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
  <script>
       $(".modalcost").click(function(){
             $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
           });

           $(".openvender").click(function(event) {
    $("#tablevender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#tablevender").load('<?php echo base_url(); ?>share/vender_f')
    });


  </script>

  <script>
     $('#asfa_amount').keyup(function(){
      var asfa_amount = parseFloat($('#asfa_amount').val());
      var asfa_vat = parseFloat($('#asfa_vat').val());
      var asfa_wh = parseFloat($('#asfa_wh').val());

      var amountvat = parseFloat((asfa_amount*asfa_vat)/100);
      var amountwh = parseFloat((asfa_amount*asfa_wh)/100);
      var allvatwh = parseFloat((asfa_amount+amountvat)-amountwh);

      $('#asfa_vatb').val(amountvat);
      $('#asfa_whb').val(amountwh);
      $('#asfa_netam').val(allvatwh);
      });

      $('#asfa_vat').keyup(function(){
      var asfa_amount = parseFloat($('#asfa_amount').val());
      var asfa_vat = parseFloat($('#asfa_vat').val());
      var asfa_wh = parseFloat($('#asfa_wh').val());

      var amountvat = parseFloat((asfa_amount*asfa_vat)/100);
      var amountwh = parseFloat((asfa_amount*asfa_wh)/100);
      var allvatwh = parseFloat((asfa_amount+amountvat)-amountwh);

      $('#asfa_vatb').val(amountvat);
      $('#asfa_whb').val(amountwh);
      $('#asfa_netam').val(allvatwh);
      });

      $('#asfa_wh').keyup(function(){
      var asfa_amount = parseFloat($('#asfa_amount').val());
      var asfa_vat = parseFloat($('#asfa_vat').val());
      var asfa_wh = parseFloat($('#asfa_wh').val());

      var amountvat = parseFloat((asfa_amount*asfa_vat)/100);
      var amountwh = parseFloat((asfa_amount*asfa_wh)/100);
      var allvatwh = parseFloat((asfa_amount+amountvat)-amountwh);

      $('#asfa_vatb').val(amountvat);
      $('#asfa_whb').val(amountwh);
      $('#asfa_netam').val(allvatwh);


      });
  </script>

  <script>
     $('#new').click(function(){
      $('#asfa_dec').val("");
      $('#asfa_old').val("");
      $('#asfa_refno').val("");
      $('#asfa_refdate').val("");
      $('#asfa_asscode').val("");
      $('#asfa_assname').val("");
      $('#fa_projectid').val("");
      $('#fa_projectname').val("");
      $('#fa_departmentid').val("");
      $('#fa_departmentname').val("");
      $('#asfa_cost').val("");
      $('#asfa_name').val("");
      $('#fa_vender').val("");
      $('#subcontact').val("");
      $('#venderid').val("");
      $('#asfa_qty').val("");
      $('#asfa_nextdate').val("");
      $('#asfa_milk').val("");
      $('#asfa_nextm').val("");
      $('#asfa_amount').val("");
      $('#asfa_vat').val("");
      $('#asfa_vatb').val("");
      $('#asfa_wh').val("");
      $('#asfa_whb').val("");
      $('#asfa_netam').val("");
      $('#asfa_des1').val("");
      $('#asfa_des2').val("");
      $('#asfa_des3').val("");
      $('#asfa_des4').val("");
      $('#asfa_des5').val("");
     });
  </script>