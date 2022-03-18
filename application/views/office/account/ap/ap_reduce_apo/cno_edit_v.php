<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">

  <div class="content">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h6 class="panel-title">Credit Note Petty cash (APO)</h6>

    </div>
    <div class="panel-body">
      <form action="<?php echo base_url(); ?>ap_active/editcno" id="ff" method="post">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="">AP No.</label>             
                <input type="text" class="form-control" readonly="true" id="cnap_no" name="cnap_no" value="<?=$cno_head[0]->ap_code;?>">
                <input type="hidden" name="cno_code" value="<?=$cno_head[0]->cno_code;?>">
                <input type="hidden" name="cno_id" value="<?=$cno_head[0]->cno_id;?>">
                <!-- <input type="hidden" class="form-control" readonly="true" id="excode" name="excode"> -->
                <!-- <input type="hidden" class="form-control" readonly="true" id="cncode" name="cncode"> -->
                <!-- <input type="hidden" class="form-control" readonly="true" id="itemcode" name="itemcode"> -->
            </div>
          </div>
          <div class="col-md-3">
            <label for="">Vender Name</label>             
            <input type="text" class="form-control" readonly="true" placeholder="Vender Name" id="vender" name="vender" value="<?=$cno_head[0]->vender_name;?>">
            <!-- <input type="hidden" class="form-control"  placeholder="ร้านค้า" id="venderid" name="venderid" value=""> -->
          </div>
           <div class="col-md-3">
            <label for="">Project Name</label>
            <input type="text" class="form-control" readonly="true" id="projectname" name="projectname" value="<?=$cno_head[0]->project_name?>">
            <!-- <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid"> -->
          </div>
          
            <div class="col-md-3">
              <label for="">System Type</label>
              <input type="text" class="form-control"readonly="true" id="systemname" name="systemname" value="<?=$cno_head[0]->systemname;?>">
              <!-- <input type="hidden" class="form-control" readonly="true" id="system" name="system">
              <input type="hidden" class="form-control" readonly="true" id="expens" name="expens"> -->
            </div>

           <!--  <div class="col-md-4">
              <div class="form-group">
                <label for="">P/O No.</label>
                <input type="text" class="form-control" value="<?php echo $key->cno_pono ?>" readonly="true" placeholder="เลขที่ใบสั่งซื้อ" id="pono" name="pono">
                <input type="hidden" id="user" value="<?php echo $name; ?>">
              </div>
            </div> -->
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <label for="">Doc Date:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                <input type="text" class="form-control" readonly="true" id="duedate" name="duedate" value="<?=$cno_head[0]->cno_duedate;?>">
              </div>
            </div>     
           
            <div class="form-group col-md-3">
              <label for="">Data Type :</label>
              <select name="datatype" id="datatype" readonly="true" class="form-control">
                <option value="Normal">Normal</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="">Date :</label>
              <input type="date" id="vchdate"readonly="true" name="vchdate" class="form-control daterange-single" value="<?=$cno_head[0]->cno_gldate?>">
            </div>

            <div class="form-group col-md-2">
              <label for="">Year :</label>
              <input type="text" id="glyear" readonly="true"name="glyear" readonly="true"class="form-control" readonly="true" value="<?=$cno_head[0]->cno_glyear?>">
            </div>

            <div class="form-group col-md-2">
              <label for="">Period :</label>
              <input type="text" id="glperiod" readonly="true"name="glperiod" readonly="true"class="form-control" value="<?=$cno_head[0]->cno_glperiod?>">
            </div> 
          </div>
        </div>
        
        <br>
        <div class="tabbable">
          <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> GL</a></li>
            <li><a href="#panel-pill2" data-toggle="tab" aria-expanded="false"><i class="icon-list2 position-left"></i> Detail</a></li>
            
          </ul>
        </div>
        <div class="tab-content">
          <div id="panel-pill1" class="tab-pane has-padding active">
              <div class="table-responsive" id="invreceipt">
                <table class="table table-hover table-bordered table-striped table-xxs">
                  <thead class="bg-info">
                    <tr >
                      <th class="text-center"><div style="width:200px;"></div> Expense Subject</th>                      
                      <th class="text-center"><div style="width:200px;"></div> Company / Partnership / stores / other</th>
                      <th class="text-center"><div style="width:100px;"></div> Cost Code</th>                      
                      <th class="text-center"><div style="width:100px;"></div> Amount</th>              
                      <th class="text-center"><div style="width:100px;"></div> Vat %</th>
                      <th class="text-center"><div style="width:100px;"></div> Vat Amount</th>
                      <th class="text-center"><div style="width:100px;"></div> Net Amount</th>
                      <th class="text-center"><div style="width:100px;"></div> Tax No</th>
                      <th class="text-center"><div style="width:100px;"></div> Tax Date</th>
                      <th class="text-center"><div style="width:100px;"></div> Action</th>
                    </tr>
                  </thead>
                  <tbody id="vat">
                  <?php
                    foreach ($cno_de as $key => $cno) {
                  ?>
                  <tr>
                    <td><?=$cno->cnoi_matname;?></td>
                    <td><?=$cno->cnoi_vendername;?></td>
                    <td><?=$cno->cnoi_costcode;?></td>
                    <td>
                      <input type="hidden" name="cnoi_id[]" value="<?=$cno->cnoi_id;?>">
                      <input type="hidden" id="wt<?=$cno->cnoi_id;?>" value="<?=$cno->cnoi_wt;?>">
                      <input type="text" name="ap_total[]" class="form-control hid<?=$cno->cnoi_id;?>" unique-id="<?=$cno->cnoi_id;?>" id="ap_total<?=$cno->cnoi_id;?>" onkeyup="process($(this))" value="<?=$cno->cnoi_disamt;?>" readonly="true">
                    </td>
                    <td>
                      <input type="text" name="ap_vat[]" class="form-control hid<?=$cno->cnoi_id;?>" unique-id="<?=$cno->cnoi_id;?>" id="ap_vat<?=$cno->cnoi_id;?>" onkeyup="process($(this))" value="<?=$cno->cnoi_vatper;?>" readonly="true">
                    </td>
                    <td>
                      <input type="text" name="cn_vat[]" class="form-control hid<?=$cno->cnoi_id;?>" unique-id="<?=$cno->cnoi_id;?>" id="cn_vat<?=$cno->cnoi_id;?>" onkeyup="process($(this))" value="<?=$cno->cnoi_vat;?>" readonly="true">
                    </td>
                    <td>
                      <input type="text" name="ap_netamt[]" class="form-control hid<?=$cno->cnoi_id;?>" unique-id="<?=$cno->cnoi_id;?>" id="ap_netamt<?=$cno->cnoi_id;?>" onkeyup="process($(this))" value="<?=$cno->cnoi_netamt?>" readonly="true">
                    </td>
                    <td>
                      <input type="text" name="taxno[]" class="form-control hid<?=$cno->cnoi_id;?>" unique-id="<?=$cno->cnoi_id;?>" id="tax<?=$cno->cnoi_id;?>" onkeyup="process($(this))" value="<?=$cno->cnoi_taxno?>" readonly="true">
                    </td>
                    <td>
                      <input type="date" name="tax_date[]" class="form-control hid<?=$cno->cnoi_id;?>" unique-id="<?=$cno->cnoi_id;?>" id="tax_date<?=$cno->cnoi_id;?>" onkeyup="process($(this))" value="date<?=$cno->cnoi_taxdate?>" readonly="true">
                    </td>
                    <td>
                      <button type="button" 
                        class="btn btn-xxs btn-link"
                        style="color:red;cursor:pointer;" 
                        onclick="sw_input($(this))" 
                        unique-id="<?=$cno->cnoi_id;?>"
                        >
                        <i id="icon<?=$cno->cnoi_id;?>" class="icon-pencil"></i>
                        </button>
                      <button type="button" class="btn btn-xxs btn-link"><i class="icon-trash" attr-id="<?=$cno->cnoi_id?>" onclick="del_petty($(this))"></i></button>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>           
            </div>
            <div id="panel-pill2" class="tab-pane has-padding">
            <?php
              foreach ($bun as $key => $row) {
            ?>
              <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-info">
                        <tr>
                            <th class="text-center">Type</th>
                            <th class="text-center">Account Code</th>
                            <th class="text-center">Account Name</th>
                            <th class="text-center">Cost Code</th>
                            <th class="text-center">Dr</th>
                            <th class="text-center">Cr</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      foreach ($row as $key => $value) {
                    ?>            
                        <tr>
                            <td>
                              <input type="hidden" name="id_apgl[]" value="<?=$value->id_apgl;?>">
                              <input type="text" class="form-control input-xs" name="gltype[]" value="<?=$value->gltype;?>" readonly="true">
                            </td>
                            <td>
                              <input type="text" class="form-control input-xs" name="ac_no[]" value="<?=$value->acct_no;?>" readonly="true">
                            </td>
                            <td>
                              <input type="text" class="form-control input-xs" value="<?=$value->act_name;?>" readonly="true">
                            </td>
                            <td>
                              <input type="text" class="form-control input-xs" name="" value="<?=$value->costcode;?>" readonly="true">
                            </td>
                            <td>
                              <input type="text" class="form-control input-xs text-right" name="ap_dr[]" value="<?=$value->amtdr;?>" id="<?=strtolower(str_ireplace('/', '', $value->gltype)).'dr'.$value->ref_pettycashi_id;?>" readonly="true">
                            </td>
                            <td>
                              <input type="text" class="form-control input-xs text-right" name="ap_cr[]" value="<?=$value->amtcr;?>" id="<?=strtolower(str_ireplace('/', '', $value->gltype)).'cr'.$value->ref_pettycashi_id;?>" readonly="true">
                            </td>
                        </tr>
                    <?php
                      }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php 
              }
            ?>
              <div id="petty_i"></div>
            </div>
        </div>
        <br>
        <div class="modal-footer">
         <div class="form-group">
         <a class="btn btn-primary" id="apodetail"><i class="icon-file-plus"></i> Select Item </a>             
            <button type="submit" class="bsave btn btn-success"><i class="icon-floppy-disk position-left"></i>Save</button>
            <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</fieldset>
</div>


<div class="modal fade" data-backdrop="false" id="opendetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Item APO</h4>
      </div>
      <div class="modal-body">
        <div id="modal_recpodetail">
        </div>
      </div>
    </div>
  </div>
</div>





 <script>
function del_petty(el)
{
  swal({
    title: "Are you sure?",
    text: "Your will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(){
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
  });
}

 
// $('#apodetail').click(function(){
//   var cnap_no = $('#cnap_no').val();
//   $('#opendetail').modal('show');
//   $('#modal_recpo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
//   $('#modal_recpo').load('<?php echo base_url(); ?>ap/openapodetail/'+cnap_no);
//   alert(cnap_no)
// });

  $("#vchdate").change(function(event) {
  var de_date = $("#vchdate").val();
  var y = de_date.slice(0,4); 
  var m = de_date.slice(5,7);

  $("#glperiod").val(m);
  $("#glyear").val(y);         

  }); 

var status_v = true;
  function sw_input(el)
  {
      const id = el.attr('unique-id');
      if(status_v) {
          status_v = false;
          $(`.hid${id}`).removeAttr('readonly');
          $(`.hid${id}`).parent().attr('class', 'has-warning');
          $(`.hid${id}`).attr('style', 'background-color:#F4FF81');
          $(`#icon${id}`).attr('class', 'icon-floppy-disk');
          el.attr('style', 'color:green;cursor:pointer;');
      }else{
          $(`.hid${id}`).attr('readonly', 'true');
          $(`.hid${id}`).parent().attr('class', 'has-success');
          $(`.hid${id}`).removeAttr('style', 'background-color:#ffffff');
          $(`#icon${id}`).attr('class', 'icon-pencil');
          el.attr('style', 'color:red;cursor:pointer;');
          status_v = true;
      }
  }

  function process(el)
  {
      const id = el.attr('unique-id');
      var amt = $(`#ap_total${id}`).val()*1;
      var vat = $(`#ap_vat${id}`).val()*1;
      var wt = $(`#wt${id}`).val()*1;
      var vatamt = amt*vat/100;
      console.log(amt);
      console.log(vat);
      console.log(wt);
      console.log(vatamt);
      
      $(`#ap_netamt${id}`).val(amt+vatamt);
      $(`#cn_vat${id}`).val(vatamt);
      
      if(wt > 0) {
          $(`#wtdr${id}`).val(amt*wt/100);
      }

      if(vat > 0) {
          $(`#vatcr${id}`).val(amt*vat/100);
      }
      
      $(`#amountcr${id}`).val(amt);
      
      $(`#venderdr${id}`).val(amt+vatamt-(amt*wt/100));


  }

  $("#scnv").click(function(e){
  var amt = parseFloat($('#amt').val());
  var amtt = parseFloat($('#amttotal').val());
if($("#vchdate").val()==""){
  swal({
      title: "กรุณากรอก Voucher Date !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{
     var frm = $('#ff');
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
                        window.location.href = "<?php echo base_url(); ?>ap/ap_reduce_apo";
                        }, 500);
                       
                    }
                });
                ev.preventDefault();

            });
          $("#ff").submit();
      }
});
</script>


<script>


// $(".opendetail").click(function(){
//   var dt = $('#cnap_no').val();
//   $('#modal_recpodetail').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
//   $('#modal_recpodetail').load('<?php echo base_url(); ?>ap/openapodetail/'+dt);

// });

 $( "#apodetail" ).click(function() {
  $(".bsave").prop("disabled",false);
});

</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/internationalization/i18next.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/internationalization_switch_direct.js"></script>

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

  $('.daterange-single').daterangepicker({
       singleDatePicker: true,
        locale: {
           format: 'YYYY-MM-DD'
       }
   });

</script>

