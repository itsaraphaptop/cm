<div class="page-header">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3>บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี จากใบแจ้งหนี้อื่นๆ (Receipt Other)</h3>
            </div>
        </div>
        <form id="bill_form" action="#" method="post">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Receipt No. :</label>
                    <input type="text" class="form-control" name="v_no" placeholder="Receipt No" value="<?= $s_no ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Date :</label>
                    <input type="date" class="form-control" name="date" readonly="true" value="<?= date('Y-m-d') ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Tax :</label>
                    <label class="radio-inline">
                        <input type="radio" class="styled" name="tax" checked="checked" value="no">
                        No
                    </label>
                    <label class="radio-inline">
                        <input type="radio" class="styled" name="tax" value="yes">
                        Yes
                    </label>
                </div>
            </div>
            
            
        </div>
        <div class="row">
        <?php
            foreach ($getproject as $project_key => $project) {
        ?>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Project Code :</label>
                    <input type="text" class="form-control" id="project_code" name="project_code" readonly="true" value="<?= $project->project_code ?>">
                    <input type="hidden" class="form-control" name="project_id" readonly="true" value="<?= $project->project_id ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Project Name :</label>
                    <input type="text" class="form-control" name="project_name" readonly="true" value="<?= $project->project_name ?>">
                </div>
            </div>
        
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Customer Code :</label>
                    <input type="text" class="form-control" name="customer_name" id="cus_code" readonly="true" value="<?= $project->project_mcode ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label>Customer Name:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="cus_name" id="cus_name" readonly="readonly" value="<?= $project->project_mnameth ?>">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-info btn-icon" onclick="customer()"><i class="icon-search4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label>Remark :</label>
                    <textarea name="remark" id="remark" class="form-control" rows="4"></textarea>
                </div>
            </div>
        </div>

         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:20px;">
                <div class="form-group">
                    <a class="btn btn-primary pull-right" id="select_ar">
                        <i class="icon-file-plus"></i> Select
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">

                <table class="table table-bordered table-xs" width="200%" >
                    <thead>
                        <tr>
                            <th class="text-center"><div style="width:150px;"></div>Invoice No.</th>
                            <th class="text-center"><div style="width:100px;"></div>Descriptiom</th>
                            <th class="text-center"><div style="width:150px;"></div>Amount</th>
                            <th class="text-center"><div style="width:10px;"></div>%VAT</th>
                            <th class="text-center"><div style="width:150px;"></div>VAT</th>
                            <th class="text-center"><div style="width:10px;"></div>%W/T</th>
                            <th class="text-center"><div style="width:150px;"></div>W/T</th>
                            <th class="text-center"><div style="width:150px;"></div>Net Amount</th>
                            <th class="text-center"><div style="width:150px;"></div>Net Amount (Inv.)</th>
                            <th class="text-center"><div style="width:150px;"></div>Receipt Amount (Net)</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="other_tr">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div>
             <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:20px;">
                <div class="form-group">
                    <a class="btn btn-success pull-right" id="save_bill">
                        <i id="icon_save" class="icon-floppy-disk"></i> Save
                    </a>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- Modal customer -->
<div id="modal" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="modal-title"></h5>
            </div>

            <div class="modal-body">
                <div id="content_modal">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal customer -->

<div id="arModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select AR</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <div class="form-group">
                            <label>System : </label>
                            <select class="form-control" id="system">
                                <option value="ex"> -- กรุณาเลือกระบบ -- </option>
                                <?php
                                foreach ($system as $key_system => $value_system) {
                                ?>
                                <option value="<?= $value_system->systemid ?>"><?= $value_system->systemname ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
               <div id="content_ar"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //customer modal
    function customer() {
        $('#modal-title').html('Select customer');
        $("#content_modal").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_modal").load('<?php echo base_url(); ?>ar/custommer_modal');
        $('#modal').modal('show');
    }
    //customer modal


    $('#select_ar').click(function(event) {
        var project_code = $('#project_code').val();
        $("#content_ar").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_ar").load('<?php echo base_url(); ?>ar/ar_modal/'+project_code);
        $('#arModal').modal('show');
    });


    $('.amt').keyup(function(event) {
        alert(555);
    });
        
$(function(){
    $("#save_bill").click(function(){

    $('#save_bill').attr('class', 'btn btn-success disabled pull-right');
    $('#icon_save').attr('class', 'icon-spinner2 spinner');

       if ($('#remark').val() == "") {
        swal("Warning!", "กรุณากรอกรายละเอียด", "warning");
        return false;
       } 
       var formData = new FormData($("#bill_form")[0]); 
       console.log(formData);

      $.ajax({
            url: '<?= base_url() ?>acc_active/add_bill',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {

              try{
                 console.log(data);

                 var json = jQuery.parseJSON(data);
                 if(json.status == true){

                    swal({ 
                        title: "Success",
                        text: json.message,
                        type: "success" 
                    },
                    function(){
                        window.location.href = '<?= base_url() ?>ar/open_proreceipt_other/';
                    });
                    
                 }else{
                  
                    $.simplyToast(json.message, 'danger');
                 }
              }catch(e){
                    $.simplyToast(e, 'danger');
              }
          },
          cache: false,
          contentType: false,
          processData: false
      });
    });
});

</script>