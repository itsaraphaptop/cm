<!-- Modal -->
  <div class="modal fade" id="bank" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <h4 class="modal-title">Bank Pay</h4>
        </div>
        <div class="modal-body">
          
            <div class="table-responsive">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Bank:</label>
                        <select multiple="multiple" class="form-control" style="height:200px;">
                            <?php
                                foreach ($banks as $key => $bank) {
                            ?>
                                <option onclick="sel_bank($(this))" bank-code="<?=$bank->bank_code?>" bank-name="<?=$bank->bank_name?>" >[<?=$bank->bank_code?>] - <?=$bank->bank_name?></option>      

                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Branch</label>
                        <select multiple="multiple" class="form-control" style="height:200px;" id="branch_content">

                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Bank Account</label>
                        <select multiple="multiple" class="form-control" style="height:200px;" id="bank_acc_content">
                        </select>
                    </div>
                </div>
                </table>
            </div>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" id="bank_code_sel">
                <input type="hidden" id="bank_name_sel">
                <input type="hidden" id="branch_code_sel">
                <input type="hidden" id="branch_name_sel">
                <input type="hidden" id="ac_code_sel">
                <input type="hidden" id="ac_name_sel">
                <button type="button" id="select_bank" class="btn btn-primary">Select</button>
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
         </div>
    </div>
</div>


<div class="content-wrapper">
	<div class="content">

		<div class="panel panel-flat">
			<div class="panel-heading ">
                <h5 class="panel-title">รหัสเจ้าหนี้ : <?=$vender->vender_code;?> ชื่อเจ้าหนี้ :<?=$vender->vender_name;?> <button type="button" id="btnBank" class="btn btn-default btn-primary pull-right">Select Bank</button></h5>
			</div>
			<div class="panel-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-3">
                        <label for="">Bank Name :</label>
                        <input type="hidden" name="bank_code" id="bank_code" class="form-control" readonly="true">
                        <input type="text" name="bank_code" id="bank_name" class="form-control" readonly="true">
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-3">
                        <label for="">Branch :</label>
                        <input type="hidden" name="branch_code" id="branch_code" class="form-control" readonly="true">
                        <input type="text" name="branch_code" id="branch_name" class="form-control" readonly="true">
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-2">
                        <label for="">A/C</label>
                        <input type="text" name="ac" id="acc_code" class="form-control" readonly="true">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <label for="">&nbsp;</label>
                        <input type="text" id="acc_name" class="form-control" readonly="true">
                    </div>
                </div>
                <div class="row">
                    <div class="panel-heading">
                    <a href="<?=base_url()?>ap/confirm_ap" class="btn btn-default btn-success"><i class="fa fa-mail-reply"></i> Back</a>
 
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover table-xxs" id="apv">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Voucher No</th>
                                    <th>Po No</th>
                                    <th>Tax No</th>
                                    <th>Tax Date</th>
                                    <th>Due Date</th>
                                    <th>type</th>
                                    <th class="text-center">Approve</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($apvs as $key => $apv) {
                            ?>
                                <tr id="apv<?=$apv->apv_id;?>">
                                    <td><?=$key+1;?></td>
                                    <td><?=$apv->apv_code;?></td>
                                    <td><?=$apv->apv_pono;?></td>
                                    <td><?=$apv->taxno_con;?></td>
                                    <td><?=$apv->taxdate_con;?></td>
                                    <td><?=$apv->apv_duedate;?></td>
                                    <td><?=$apv->apv_type;?></td>
                                    <td class="text-center">
                                        <input type="checkbox" class="styled" onclick="approve($(this))" attr-type="apv" attr-id="<?=$apv->apv_id;?>">
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            <?php
                                foreach ($apds as $key => $apd) {
                            ?>
                                <tr id="apd<?=$apd->id;?>">
                                    <td><?=$key+1;?></td>
                                    <td><?=$apd->apd_code;?></td>
                                    <td><?=$apd->ref_po_code;?></td>
                                    <td><?=$apd->taxno_con;?></td>
                                    <td><?=$apd->taxdate_con;?></td>
                                    <td><?=$apd->apd_duedate;?></td>
                                    <td><?=$apd->apd_type;?></td>
                                    <td class="text-center">
                                        <input type="checkbox" class="styled" onclick="approve($(this))" attr-type="apd" attr-id="<?=$apd->id;?>">
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            <?php
                                foreach ($aprs as $key => $apr) {
                            ?>
                                <tr id="apr<?=$apr->id;?>">
                                    <td><?=$key+1;?></td>
                                    <td><?=$apr->apr_code;?></td>
                                    <td><?=$apr->po_code;?></td>
                                    <td><?=$apr->taxno_con;?></td>
                                    <td><?=$apr->taxdate_con;?></td>
                                    <td><?=$apr->apr_duedate;?></td>
                                    <td><?=$apr->apr_type;?></td>
                                    <td class="text-center">
                                        <input type="checkbox" class="styled" onclick="approve($(this))" attr-type="apr" attr-id="<?=$apr->id;?>">
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            <?php
                                foreach ($apos as $key => $apo) {
                            ?>
                                <tr id="apo<?=$apo->ap_id;?>">
                                    <td><?=$key+1;?></td>
                                    <td><?=$apo->ap_no;?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?=$apo->ap_type;?></td>
                                    <td class="text-center">
                                        <input type="checkbox" class="styled" onclick="approve($(this))" attr-type="apo" attr-id="<?=$apo->ap_id;?>">
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            <?php
                                foreach ($apss as $key => $aps) {
                            ?>
                                <tr id="aps<?=$aps->aps_id;?>">
                                    <td><?=$key+1;?></td>
                                    <td><?=$aps->aps_code;?></td>
                                    <td></td>
                                    <td><?=$aps->taxno_con;?></td>
                                    <td><?=$aps->taxdate_con;?></td>
                                    <td><?=$aps->aps_duedate;?></td>
                                    <td>
                                    <!-- <?php 
                                        if ($aps->ap_bill_type == 1) {
                                            # code...
                                        }else if($aps->ap_bill_type == 2) {

                                        }
                                    ?> -->
                                    <?=$aps->aps_type;?>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" class="styled" onclick="approve($(this))" attr-type="aps" attr-id="<?=$aps->aps_id;?>">
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
	$('#apv').DataTable();
	$('#apo').DataTable();
	$('#aps').DataTable();
	$('#bank_pay').DataTable();

    $('#btnBank').click(function() {
        $('#bank').modal('show');
    });

    function approve(el) {
        let type = el.attr('attr-type');
        let id = el.attr('attr-id');
        let bank_code = $('#bank_code').val();
        let branch_code = $('#branch_code').val();
        let acc_code = $('#acc_code').val();
        // alert(`type = ${type} , id = ${id} bank_code =${bank_code} branch_code = ${branch_code} acc_code = ${acc_code}`);
        if (bank_code != '' && branch_code != '' && acc_code != '') {
            $.post("<?=base_url();?>ap/update_approve", 
            { 
                id: id,
                bank_code: bank_code,
                branch_code: branch_code,
                acc_code: acc_code,
                type: type
            }, function () {
    
            }).done(function(data) {
                // alert(data);
                let  json_res = JSON.parse(data);

                if (json_res.status === true) {
                    show_nonti('Success', json_res.message, 'success');
                    $(`#${json_res.id}`).remove();
                }else {
                    show_nonti('Warning', json_res.message, 'error');
                }
            });
        }else{
            el.removeAttr('checked');
            swal('เตือน!!','กรุณาเลือก bank','error');
        }
    }

    function sel_bank(el) {
        // $('#branch_content').empty();
        var bank_code = el.attr('bank-code');
        var bank_name = el.attr('bank-name');
        $('#bank_code_sel').val(bank_code);
        $('#bank_name_sel').val(bank_name);
        $.post(`<?=base_url()?>ap/branch/${bank_code}`, function () {   
        }).done(function(data) {
            $('#branch_content').html(data);
        });
    }


    $('#select_bank').click(function(){
        let bank_code = $('#bank_code_sel').val();
        let bank_name = $('#bank_name_sel').val();
        let branch_code = $('#branch_code_sel').val();
        let branch_name = $('#branch_name_sel').val();
        let acc_code = $('#ac_code_sel').val();
        let acc_name = $('#ac_name_sel').val();

        $('#bank_code').val(bank_code);
        $('#bank_name').val(bank_name);
        $('#branch_code').val(branch_code);
        $('#branch_name').val(branch_name);
        $('#acc_code').val(acc_code);
        $('#acc_name').val(acc_name);
        $('#bank').modal('hide');
    });
</script>
