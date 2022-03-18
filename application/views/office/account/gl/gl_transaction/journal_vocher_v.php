<div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - Journal_vocher</span></h4>
            </div>


          </div>

        </div>

 <form action="<?php echo base_url(); ?>gl_active/addjournal" method="post"> 
        <div class="content">

          <!-- Input group addons -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h3 class="panel-title">Journal_vocher</h3>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="reload"></a></li>
                        </ul>
                      </div>
            </div>

      <div class="panel-body">

            <div class="row">
            <div class="form-group col-sm-3">
            <label for="">Voucher No :</label>
            <input type="text" id="vchno" name="vchno" class="form-control" readonly="true" >
            <input type="hidden" id="chkii" name="chkii" value="" class="form-control" readonly="true" >
            </div>

            <div class="form-group col-sm-3">
            <label for="">Date :</label>
            <input type="date" id="vchdate" name="vchdate" class="form-control daterange-single">
            </div>

            <div class="form-group col-sm-3">
            <label for="">GL Year :</label>
            <input type="text" id="glyear" name="glyear" value="<?php echo date("Y");?>" class="form-control" readonly="true" >
            </div>

             <div class="form-group col-sm-3">
            <label for="">GL Period :</label>
            <input type="text" id="glperiod" name="glperiod" value="<?php echo date("m");?>" class="form-control" readonly="true" >
            </div>
            </div>
            <div class="row">
            <div class="form-group col-sm-2">
            <label for="">Book Account :</label>
            <input type="text" id="bookcode" name="bookcode" class="form-control" readonly="true">
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                  <label for="">&nbsp;&nbsp;&nbsp;</label>
                  <div class="input-group" id="errorcost">
                      <input type="text" id="bookname" name="bookname" readonly="true" class="form-control">
                      <span class="input-group-btn">
                         <a class="book btn btn-primary btn-sm" data-toggle="modal" data-target="#bookn"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                      </span>
                  </div>
              </div>
          </div>
           <div class="form-group col-sm-3">
              <label for="">Referent No. :</label>
              <input type="text" name="refno" id="refno" class="form-control">
          </div>

          <div class="form-group col-sm-3">
              <label for="">Ref Date :</label>
              <input type="date" id="refdate" name="refdate" class="form-control">
          </div>

        </div>

           <div class="row">
             <div class="form-group col-sm-6">
             <label for="">Remark :</label>
             <textarea class="form-control" id="remark" name="remark"></textarea>
             </div>
           </div>

       </div>

          </div>
                   <div class="panel panel-flat">

                    <div class="panel-body">
                        <div class="row">
                          <button type="button" class="btn btn-info" btn-sm data-toggle="modal" data-target="#Account" id="addrows"><i class="icon-list-numbered"></i>  ADD Rows </button>
                        </div>
                        <br>
                        <div class="row" id="table">
                            <div class="table-responsive">
                                <table class="table datatable-basic table-xsm table-bordered">
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

                                        <tr>
                                            <td colspan="14" id="nodata" class="text-center">NO DATA</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="text-right">
                            <a type="button" class="openpr btn btn-default btn-sm" data-toggle="modal" data-target="#archive"><i class="icon-list-numbered"></i>Archive</a>
                            <a onclick="javascript:location.reload();" class="btn btn-default btn-sm"><i class="icon-plus22"></i>New</a>
                            <button type="submit" class="save preload btn btn-info btn-sm"><i class="icon-floppy-disk position-left"></i> Save </button>
                            <a href="#" class="btn btn-default btn-sm"><i class="icon-close2 position-left"></i> Close</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="panel panel-flat"> -->

<!-- content -->

</form>

<div class="modal fade" id="bookn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Book Account</h4>
               </div>
                 <div class="modal-body">
                     <div id="modal_cost"></div>
                 </div>
             </div>
           </div>

         </div>


<div id="Account" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5 class="modal-title">GL</h5>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Account Code :</label>
                        <input type="text" id="ac_code" name="ac_code" class="form-control" readonly="true">
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="">Account Name:</label>
                        <div class="input-group" id="errorcost">
                            <input type="text" id="act_name" name="act_name" class="form-control" readonly="true">
                            <span class="input-group-btn">
                                   <a class="acc btn btn-primary btn-sm" data-toggle="modal" data-target="#accnc"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Project :</label>
                        <input type="text" id="pre_event" name="pre_event" class="form-control" readonly="true">
                    </div>

                    <div class="form-group col-sm-9">
                        <label for="">Project Name:</label>
                        <div class="input-group" id="errorcost">
                            <input type="text" id="pre_eventname" name="pre_eventname" class="form-control" readonly="true">
                            <span class="input-group-btn">
                                   <a class="project btn btn-primary btn-sm" data-toggle="modal" data-target="#project"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Job Code :</label>
                        <input type="text" id="jobcode" name="jobcode" class="form-control" readonly="true">
                    </div>

                    <div class="form-group col-sm-9">
                        <label for="">Job Name :</label>
                        <div class="input-group" id="errorcost">
                            <input type="text" id="systemname" name="systemname" class="form-control" readonly="true">
                            <span class="input-group-btn">
                                   <a class="sy btn btn-primary btn-sm" data-toggle="modal" data-target="#system"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-sm-3">
                        <label for="">Department ID:</label>
                        <input type="text" id="dpt_code" name="dpt_code" class="form-control" readonly="true">
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="">Department Title:</label>
                        <div class="input-group" id="errorcost">
                            <input type="text" id="dpt_title" name="dpt_title" class="form-control" readonly="true">
                            <span class="input-group-btn">
                                   <a class="dptid btn btn-primary btn-sm" data-toggle="modal" data-target="#dpt"><span class="glyphicon glyphicon-search"></span>ค้นหา</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Cost Code :</label>
                        <input type="text" id="costcode" name="costcode" class="form-control">
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="">Dr :</label>
                        <input type="text" id="amtdr" name="amtdr" class="form-control">
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="">Cr :</label>
                        <input type="text" id="amtcr" name="amtcr" class="form-control">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="">Paid/Receive type</label>
                        <input type="text" id="varchar" name="varchar" class="form-control">
                    </div>
                  </div>
                 <div class="row">
                   <div class="form-group col-sm-3">
                        <label for="">Vendor :</label>
                        <input type="text" id="acct_no" name="acct_no" class="form-control" readonly="true">
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="">Vendor Name :</label>
                        <div class="input-group" id="errorcost">
                            <input type="text" id="namevendor" name="namevendor" class="form-control" readonly="true">
                            <span class="input-group-btn">
                                   <a class="vendor btn btn-primary btn-sm" data-toggle="modal" data-target="#vendor"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                            </span>
                        </div>
                    </div>
                 </div>

                <div class="row">
                    <div class="form-group col-sm-9">
                        <label for="">Description :</label>
                        <textarea type="text" id="gldesc" name="gldesc" class="form-control"></textarea>
                    </div>

                </div>
            </div>
            <hr>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">ยกเลิก</button>
                <a id="insertpodetail" type="button" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</a>
            </div>
        </div>
    </div>
</div>


 <div id="archive" class="modal fade" data-backdrop="false">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Archive</h5>
               </div>

               <div class="modal-body">
                 <div id="loadarchive">

                 </div>
               </div>
               <br>
               <div class="modal-footer">
                 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
               </div>
             </div>
           </div>
         </div>

<div class="modal fade" id="project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Book Account</h4>
               </div>
                 <div class="modal-body">
                     <div id="projectmeka"></div>
                 </div>
             </div>
           </div>

         </div>

<div class="modal fade" id="vendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Book Account</h4>
               </div>
                 <div class="modal-body">
                     <div id="vendormodel"></div>
                 </div>
             </div>
           </div>

         </div>

         <div class="modal fade" id="accnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Book Account</h4>
               </div>
                 <div class="modal-body">
                     <div id="acccode"></div>
                 </div>
             </div>
           </div>

         </div>

  <div class="modal fade" id="system" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Book Account</h4>
               </div>
                 <div class="modal-body">
                     <div id="systemcn"></div>
                 </div>
             </div>
           </div>

         </div>

         <div class="modal fade" id="dpt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Book Account</h4>
               </div>
                 <div class="modal-body">
                     <div id="departmentid"></div>
                 </div>
             </div>
           </div>

         </div>


        <script>
            $("#addrows").click(function(){
                $("#ac_code").val("");
                $("#act_name").val("");
                $("#pre_event").val("");
                $("#pre_eventname").val("");
                $("#jobcode").val("");
                $("#systemname").val("");
                $("#dpt_code").val("");
                $("#dpt_title").val("");
                $("#costcode").val("");
                $("#amtdr").val("");
                $("#amtcr").val("");
                $("#varchar").val("");
                $("#acct_no").val("");
                $("#namevendor").val("");
                $("#gldesc").val("");
              }
            );

            $("#insertpodetail").click(function(){
                addrow();
                $("#Account .close").click()
              }
            );

            function addrow()
            {
              $('#nodata').closest('tr').remove();
              var row = ($('#body tr').length-0)+1;
              var tr = '<tr id="'+row+'">'+
                       '<td>'+row+'<input type="hidden" name="chki[]" id="chki'+row+'" value=""></td>'+
                       '<td>'+$("#ac_code").val()+'<input type="hidden" name="ac_codei[]" value="'+$("#ac_code").val()+'"></td>'+
                       '<td>'+$("#act_name").val()+'<input type="hidden" name="act_namei[]" value="'+$("#act_name").val()+'"></td>'+
                       '<td>'+$("#costcode").val()+'<input type="hidden" name="costcodei[]" value="'+$("#costcode").val()+'"></td>'+
                       '<td>'+$("#amtdr").val()+'<input type="hidden" name="amtdri[]" value="'+$("#amtdr").val()+'"></td>'+
                       '<td>'+$("#amtcr").val()+'<input type="hidden" name="amtcri[]" value="'+$("#amtcr").val()+'"></td>'+
                       '<td>'+$("#varchar").val()+'<input type="hidden" name="varchari[]" value="'+$("#varchar").val()+'"><input type="hidden" name="pre_eventi[]" value="'+$("#pre_event").val()+'"><input type="hidden" name="jobcodei[]" value="'+$("#jobcode").val()+'"><input type="hidden" name="systemnamei[]" value="'+$("#systemname").val()+'"><input type="hidden" name="acct_noi[]" value="'+$("#acct_no").val()+'"><input type="hidden" name="gldesci[]" value="'+$("#gldesc").val()+'"><input type="hidden" name="dpt_codei[]" value="'+$("#dpt_code").val()+'"></td>'+
                       '<td>'+
                        '<ul class="icons-list">'+
                              '<li><a href="#" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>'+
                            '</ul>'+
                       '</td>'+
                       '</tr>';
                        $('#body').append(tr);
            }

</script>

<script>

             $(".book").click(function(){
             $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/book');
              });

            $(".project").click(function(){
             $('#projectmeka').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#projectmeka").load('<?php echo base_url(); ?>index.php/share/project');
              });

             $(".vendor").click(function(){
             $('#vendormodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#vendormodel").load('<?php echo base_url(); ?>index.php/share/vender');
              });

             $(".acc").click(function(){
             $('#acccode').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#acccode").load('<?php echo base_url(); ?>index.php/share/accchart');
              });

             $(".sy").click(function(){
             $('#systemcn').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#systemcn").load('<?php echo base_url(); ?>index.php/share/system');
              });

             $(".dptid").click(function(){
             $('#departmentid').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#departmentid").load('<?php echo base_url(); ?>index.php/share/department');
             });

             $(".openpr").click(function(){
             $('#loadarchive').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#loadarchive").load('<?php echo base_url(); ?>gl_active/load_journal');
               })
</script>
