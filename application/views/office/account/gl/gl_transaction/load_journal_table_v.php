
<table class="table table-hover table-bordered table-striped table-xxs" id="table">
                    <thead>
                        <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Acconut Code</th>
                    <th class="text-center">Acconut Name</th>
                    <th class="text-center">Cost code</th>
                    <th class="text-center">Dr</th>
                    <th class="text-center">Cr</th>
                    <th class="text-center">Paid/Receive type</th>
                    <th class="text-center">Action</th>
                  </tr>
                    </thead>
                     <tbody id="body">
<?php $n=1; foreach ($prd as $u) {?>
      <tr id="<?php echo $n; ?>">
      <td class="text-center"><?php echo $n; ?><input type="hidden" name="chki[]" id="chki<?php echo $n;?>" value="Y"><input type="hidden" name="lineno" value="<?php echo $u->lineno; ?>"></td>
      <td class="text-center" id="ac_codee<?php echo $n; ?>"><?php echo $u->ac_code; ?><input type="hidden" name="ac_codei[]" value="<?php echo $u->ac_code; ?>"></td>
      <td  class="text-center" id="act_namee<?php echo $n; ?>"><?php echo $u->act_name; ?><input type="hidden" name="act_namei[]" value="<?php echo $u->act_name; ?>"></td>
      <td  class="text-center" id="costcodei<?php echo $n; ?>"><?php echo $u->costcode; ?><input type="hidden" name="costcodei[]" value="<?php echo $u->costcode; ?>"></td>
      <td  class="text-center" id="amtdri<?php echo $n; ?>"><?php echo $u->amtdr; ?><input type="hidden" name="amtdri[]" value="<?php echo $u->amtdr; ?>"></td>
      <td  class="text-center" id="amtcri<?php echo $n; ?>"><?php echo $u->amtcr; ?><input type="hidden" name="amtcri[]" value="<?php echo $u->amtcr; ?>"></td>
      <td  class="text-center" id="varchari<?php echo $n; ?>"><?php echo $u->varchar; ?><input type="hidden" name="varchari[]" value="<?php echo $u->varchar; ?>"><input type="hidden" name="pre_eventi[]" value="<?php echo $u->pre_event; ?>"><input type="hidden" name="jobcodei[]" value="<?php echo $u->jobcode; ?>"><input type="hidden" name="systemnamei[]" value="<?php echo $u->systemname; ?>"><input type="hidden" name="acct_noi[]" value="<?php echo $u->acct_no; ?>"><input type="hidden" name="gldesci[]" value="<?php echo $u->gldesc; ?>"><input type="hidden" name="dpt_codei[]" value="<?php echo $u->dpt_code; ?>">
</td>


        <td>
            <ul class="icons-list">
            <li><a data-toggle="modal" data-target="#edit<?php echo $n; ?>" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
            <li><a id="remove<?php echo $n;?>"  data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>
            </ul>
          </td>
    </tr>

 <!-- โมเดลลลลลลลลล -->
  <div id="edit<?php echo $n; ?>" class="modal fade" data-backdrop="false">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Edit : <?php echo $u->act_name; ?></h5>
                  </div>

                      <div class="modal-body">
             
                 <div class="row">
            <div class="form-group col-sm-2">
            <label for="">Account Code :</label>
            <input type="text" id="ac_code<?php echo $n; ?>" name="ac_code" class="form-control" readonly="true" value="<?php echo $u->ac_code; ?>">
            </div>

            <div class="form-group col-xs-5">
                           <label for="">Account Name:</label>
                             <div class="input-group" id="errorcost">
                                 <input type="text" id="act_name<?php echo $n; ?>" name="act_name" class="form-control" readonly="true" value="<?php echo $u->act_name; ?>">
                                 <span class="input-group-btn" >
                                   <a class="acc<?php echo $n; ?> btn btn-primary btn-sm" data-toggle="modal" data-target="#accnc<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                 </span>
                             </div>
                           </div>
        
             </div>

             <div class="row">
              <div class="form-group col-sm-1">
                           <label for="">Project :</label>                           
                                <input type="text" id="pre_event<?php echo $n; ?>" name="pre_event" class="form-control" readonly="true" value="<?php echo $u->pre_event; ?>">
                           </div>

                        <div class="form-group col-xs-6">
                           <label for="">Project Name:</label>
                             <div class="input-group" id="errorcost">
                              <input type="text" id="pre_eventname<?php echo $n; ?>" name="pre_eventname" class="form-control" readonly="true"  value="<?php echo $u->project_name; ?>">
                                 <span class="input-group-btn" >
                                   <a class="projectt<?php echo $n; ?> btn btn-primary btn-sm"  data-toggle="modal"  id="event<?php echo $n; ?>" data-target="#project<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                 </span>
                             </div>
                           </div>
        

             <div class="form-group col-sm-2">
            <label for="">Job Code :</label>
            <input type="text" id="jobcode<?php echo $n; ?>" name="jobcode" class="form-control" readonly="true" value="<?php echo $u->jobcode; ?>">
            </div>

     <div class="form-group col-xs-3">
                           <label for="">Job Name :</label>
                             <div class="input-group" id="errorcost">
                                 <input type="text" id="systemname<?php echo $n; ?>" name="systemname" class="form-control" readonly="true" value="<?php echo $u->systemname; ?>">
                                 <span class="input-group-btn" >
                                   <a class="syy<?php echo $n; ?> btn btn-primary btn-sm" data-toggle="modal" data-target="#system<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                 </span>
                             </div>
                           </div>           
            </div>

               <div class="row">

           <div class="form-group col-sm-3">
            <label for="">Department ID:</label>
            <input type="text" id="dpt_code<?php echo $n; ?>" name="dpt_code" class="form-control" readonly="true" value="<?php echo $u->dpt_code; ?>">
            </div>

            <div class="form-group col-xs-3">
                           <label for="">Department Title:</label>
                             <div class="input-group" id="errorcost">
                                 <input type="text" id="dpt_title<?php echo $n; ?>" name="dpt_title" class="form-control" readonly="true" value="<?php echo $u->department_title; ?>">
                                 <span class="input-group-btn" >
                                   <a class="dptidd<?php echo $n; ?> btn btn-primary btn-sm" id="dptout<?php echo $n; ?>" data-toggle="modal" data-target="#dpt<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span>ค้นหา</a>
                                 </span>
                             </div>
                           </div>   

              <div class="form-group col-sm-3">
            <label for="">Cost Code :</label>
             <input type="text" id="costcode<?php echo $n; ?>" name="costcode" class="form-control" value="<?php echo $u->costcode; ?>">
            </div>

            <div class="form-group col-sm-2">
            <label for="">Dr :</label>
            <input type="text" id="amtdr<?php echo $n; ?>" name="amtdr" class="form-control" value="<?php echo $u->amtdr; ?>">
            </div>

            <div class="form-group col-sm-2">
            <label for="">Cr :</label>
            <input type="text" id="amtcr<?php echo $n; ?>" name="amtcr" class="form-control" value="<?php echo $u->amtcr; ?>">
            </div>
           <div class="form-group col-sm-4">
            <label for="">Paid/Receive type</label>
            <input type="text" id="varchar<?php echo $n; ?>" name="varchar" class="form-control"  value="<?php echo $u->varchar; ?>">
            </div>
          
       
                   <div class="form-group col-xs-2">
                           <label for="">Vendor :</label>
                                   <input type="text" id="acct_no<?php echo $n; ?>" name="acct_no" class="form-control" readonly="true" value="<?php echo $u->acct_no; ?>">
                           </div>

            <div class="form-group col-sm-4">
            <label for="">Vendor Name :</label>
             <div class="input-group" id="errorcost">
            <input type="text" id="namevendor<?php echo $n; ?>" name="namevendor" class="form-control" readonly="true" value="<?php echo $u->vender_name; ?>">
            <span class="input-group-btn" >
                                   <a class="vendorr<?php echo $n; ?> btn btn-primary btn-sm" data-toggle="modal" data-target="#vendor<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                 </span>
                             </div>
            </div>
                    </div>
            <div class="row">
             <div class="form-group col-sm-4">
            <label for="">Description :</label>
            <textarea type="text" id="gldesc<?php echo $n; ?>" name="gldesc" class="form-control"><?php echo $u->gldesc; ?></textarea>
            </div>

            </div>

            <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
                  <a id="insertpodetail<?php echo $n; ?>" type="button" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</a>
                </div>
        </div>
              </div>
            </div>
            </div>

         <div class="modal fade" id="accnc<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Account</h4>
               </div>
                 <div class="modal-body">
                     <div id="acccode<?php echo $n; ?>"></div>
                 </div>
             </div>
           </div>

         </div>
         <div class="modal fade" id="project<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Book Account</h4>
               </div>
                 <div class="modal-body">
                     <div id="projectmeka<?php echo $n; ?>"></div>
                 </div>
             </div>
           </div>

         </div>


<div class="modal fade" id="vendor<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Vendor</h4>
               </div>
                 <div class="modal-body">
                     <div id="vendormodel<?php echo $n; ?>"></div>
                 </div>
             </div>
           </div>

         </div>


  <div class="modal fade" id="system<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">System</h4>
               </div>
                 <div class="modal-body">
                     <div id="systemcn<?php echo $n; ?>"></div>
                 </div>
             </div>
           </div>

         </div>

    <div class="modal fade" id="dpt<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Department</h4>
               </div>
                 <div class="modal-body">
                     <div id="departmentid<?php echo $n; ?>"></div>
                 </div>
             </div>
           </div>

         </div>
 <script>
$(document).on('click', 'a#remove<?php echo $n; ?>', function () { // <-- changes


    // Initialize

        var self = $(this);
        noty({
            width: 200,
            text: "Do you want to Delete?",
            type: self.data('type'),
            dismissQueue: true,
            timeout: 1000,
            layout: self.data('layout'),
            buttons: (self.data('type') != 'confirm') ? false : [
                {
                    addClass: 'btn btn-primary btn-xs',
                    text: 'Ok',
                    onClick: function ($noty) { //this = button element, $noty = $noty element
                        $noty.close();
                        self.closest('tr').remove();
                        noty({
                            force: true,
                            text: 'Deleteted',
                            type: 'success',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });

                    }
                },
                {
                    addClass: 'btn btn-danger btn-xs',
                    text: 'Cancel',
                    onClick: function ($noty) {
                        $noty.close();
                        noty({
                            force: true,
                            text: 'You clicked "Cancel" button',
                            type: 'error',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });
                    }
                }
            ]
        });

        return false;


  });
</script>

 


            <script>  
                  $("#insertpodetail<?php echo $n; ?>").click(function(){
                if ($("#ac_code<?php echo $n; ?>").val()!="") {
                 $("#ac_codee<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#ac_code<?php echo $n; ?>").val()+"</a><input type='hidden' name='ac_codei[]' value="+$("#ac_code<?php echo $n; ?>").val()+">");
                 $("#act_namee<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#act_name<?php echo $n; ?>").val()+"</a><input type='hidden' name='act_namei[]' value="+$("#act_name<?php echo $n; ?>").val()+">");
                 $("#costcodei<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#costcode<?php echo $n; ?>").val()+"</a><input type='hidden' name='costcodei[]' value="+$("#costcode<?php echo $n; ?>").val()+">");
                 $("#amtdri<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#amtdr<?php echo $n; ?>").val()+"</a><input type='hidden' name='amtdri[]' value="+$("#amtdr<?php echo $n; ?>").val()+">");
                 $("#amtcri<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#amtcr<?php echo $n; ?>").val()+"</a><input type='hidden' name='amtcri[]' value="+$("#amtcr<?php echo $n; ?>").val()+">");
                 $("#varchari<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#varchar<?php echo $n; ?>").val()+"</a><input type='hidden' name='varchari[]' value="+$("#varchar<?php echo $n; ?>").val()+"><input type='hidden' name='pre_eventi[]' value="+$("#pre_event<?php echo $n; ?>").val()+"><input type='hidden' name='jobcodei[]'' value="+$("#jobcode<?php echo $n; ?>").val()+"><input type='hidden' name='systemnamei[]' value="+$("#systemname<?php echo $n; ?>").val()+"><input type='hidden' name='acct_noi[]' value="+$("#acct_no<?php echo $n; ?>").val()+"><input type='hidden' name='gldesci[]' value="+$("#gldesc<?php echo $n; ?>").val()+"><input type='hidden' name='dpt_codei[]' value="+$("#dpt_code<?php echo $n; ?>").val()+">");
                $("#edit<?php echo $n; ?> .close").click()
        
                }else{
                  swal({
                      title: "Please Chack!",
                      text: "Material Code Not Found",
                      confirmButtonColor: "#2196F3"
                  });
                   $("#error<?php echo $n;?>").attr("class", "input-group has-error has-feedback");
                  $("#newmatname<?php echo $n;?>").focus();
                }
              });
              $('#chk<?php echo $n; ?>').click(function(event) {
                if($('#chk<?php echo $n; ?>').prop('checked')) {
                 $('#newmatname<?php echo $n; ?>').prop('disabled', false);
              } else {
                  $('#newmatname<?php echo $n; ?>').prop('disabled', true);
              }
              });
            </script>
          

         <script >
         $("#event<?php echo $n; ?>").click(function(){ 
                $("#dpt_code<?php echo $n; ?>").val("");
                $("#dpt_title<?php echo $n; ?>").val("");
              }
            );  
              $("#dptout<?php echo $n; ?>").click(function(){ 
                $("#pre_eventname<?php echo $n; ?>").val("");
                $("#pre_event<?php echo $n; ?>").val("");
              }
            );    
</script>


<script>
         $(".acc<?php echo $n; ?>").click(function(){
             $('#acccode<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#acccode<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/accchart/<?php echo $n; ?>');
           });

   
   
              $(".bookk<?php echo $n; ?>").click(function(){
             $('#modal_cost<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#modal_cost<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/book/<?php echo $n; ?>');
           });

              $(".projectt<?php echo $n; ?>").click(function(){
             $('#projectmeka<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#projectmeka<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/project/<?php echo $n; ?>');
           });

              $(".vendorr<?php echo $n; ?>").click(function(){
             $('#vendormodel<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#vendormodel<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/vender/<?php echo $n; ?>');
           });

       
             $(".syy<?php echo $n; ?>").click(function(){
             $('#systemcn<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#systemcn<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/system/<?php echo $n; ?>');
           });

          $(".dptidd<?php echo $n; ?>").click(function(){
          $('#departmentid<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#departmentid<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/department/<?php echo $n; ?>');
           });

</script>


                      <?php $n++; } ?>

