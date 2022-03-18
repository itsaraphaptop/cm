<div>
    <table class="table table-striped table-bordered">
        <thead> 
            <tr>
                <th>Invoice No.</th>
                <th>Date</th>
                <th>Type</th>
                <th>Tax</th>
                <th>Project/Department</th>
                <th>System</th>
                <th>Customer</th>
                <th>Due Date</th>
                <th>Net Amount</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($receipt as $key => $data) {
                $tax = $data->ot_tax;
                if ($tax == "yes") {
                    $this->db->select('ar_ov');
                    $this->db->from('syscode');
                    $this->db->where('sys_code',$compcode);
                    $query = $this->db->get();
                    $res = $query->result();
                    $code_net = $res[0]->ar_ov;
                     
                }else{
                    $this->db->select('ar_sov');
                    $this->db->from('syscode');
                    $this->db->where('sys_code',$compcode);
                    $query = $this->db->get();
                    $res = $query->result();
                    $code_net = $res[0]->ar_sov;
                }
                    $this->db->select('act_code,act_name');
                    $this->db->from('account_total');
                    $this->db->where('act_code',$code_net);
                    $this->db->where('compcode',$compcode);
                    $query_net = $this->db->get();
                    $res_net = $query_net->result();
                    

          
                    foreach ($res_net as $key_am_net => $date_am_net) {
                        $am_net_code = $date_am_net->act_code;
                        $am_net_name = $date_am_net->act_name;
                    }

            ?>
                <tr>
                    <td><?= $data->ot_code ?></td>
                    <td><?= $data->ot_date ?></td>
                    <td><?= $data->ot_type ?></td>
                    <td><?= $data->ot_tax ?></td>
                    <td><?= $data->ot_pro_name ?></td>
                    <td><?= $data->ot_sys_name ?></td>
                    <td><?= $data->ot_cus_name ?></td>
                    <td><?= $data->ot_duedate ?></td>
                    <td class="text-right"><?= number_format(($data->amount*1)+($data->vat_total*1),2) ?></td>
                    <td><button class="select_receipt btn btn-primary" 
                        r_id="<?= $data->ot_id ?>" 
                        r_date="<?= $data->ot_date ?>" 
                        r_code="<?= $data->ot_code ?>" 
                        r_type="<?= $data->ot_type ?>" 
                        r_tax="<?= $data->ot_tax ?>" 
                        r_pro_id="<?= $data->ot_pro_id ?>" 
                        r_pro_name="<?= $data->ot_pro_name ?>" 
                        r_pro_code="<?= $data->ot_pro_code ?>" 
                        r_gl="<?= $data->ot_gl ?>"
                        r_cus_id="<?= $data->ot_cus_id ?>" 
                        r_cus_code="<?= $data->ot_cus_code ?>" 
                        r_ot_cus_name="<?= $data->ot_cus_name ?>" 
                        r_department_id="<?= $data->ot_department_id ?>" 
                        r_department_name="<?= $data->ot_depart_name ?>" 
                        r_department_code="<?= $data->ot_depart_code ?>" 
                        r_ref="<?= $data->ot_ref_date ?>"
                        r_income_id="<?= $data->ot_type_income_id ?>" 
                        r_income_name="<?= $data->income_name ?>"  
                        r_income_code="<?= $data->income_code ?>" 
                        r_system_id="<?= $data->ot_system_id ?>" 
                        r_system_name="<?= $data->ot_sys_name ?>" 
                        r_system_code="<?= $data->system_code ?>" 
                        r_crterm="<?= $data->ot_crterm ?>" 
                        r_duedate="<?= $data->ot_duedate ?>" 
                        r_wt="<?= $data->ot_wt ?>" 
                        r_vat="<?= $data->ot_vat ?>" 
                        r_currency_id="<?= $data->ot_currency_id ?>" 
                        r_exchangrate="<?= $data->ot_exchangrate ?>" 
                        r_remark="<?= $data->ot_remark ?>"  
                        am_net_code="<?= $am_net_code ?>"  
                        am_net_name="<?= $am_net_name ?>"  
                        vat_total="<?= $data->vat_total ?>" 
                        amount="<?= $data->amount ?>"  
                        currency_name="<?= $data->currency_name_en ?>"  
                        project_id="<?= $data->project_id ?>"  
                        system_code_id="<?= $data->systemcode ?>"  
                        data-dismiss="modal">Select</button></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
        
    </table>
</div>

<script type="text/javascript">
    $('.select_receipt').click(function(event) {
        var _net_code = '<?= $net_code ?>';
        var _net_name = '<?= $net_name ?>';
        var _amount = $(this).attr('amount');
        var _vat_total = $(this).attr('vat_total');
        var _id = $(this).attr('r_code');
        var _date = $(this).attr('r_date');
        var _type = $(this).attr('r_type');
        var _tax = $(this).attr('r_tax');
        var _gl = $(this).attr('r_gl');
        var _department_code = $(this).attr('r_department_code');
        var _department_name = $(this).attr('r_department_name');
        var _department_id = $(this).attr('r_department_id');
        var _pro_name = $(this).attr('r_pro_name');
        var _pro_code = $(this).attr('r_pro_code');
        var _pro_id = $(this).attr('r_pro_id');
        var _ref_date = $(this).attr('r_ref');
        var _income_id = $(this).attr('r_income_id');
        var _income_name = $(this).attr('r_income_name');
        var _system_id = $(this).attr('r_system_id');
        var _system_name = $(this).attr('r_system_name');
        var _system_code = $(this).attr('r_system_code');
        var _cus_code = $(this).attr('r_cus_code');
        var _cus_name = $(this).attr('r_ot_cus_name');
        var _cus_id = $(this).attr('r_cus_id');
        var _cus_id = $(this).attr('r_crterm');
        var _crterm = $(this).attr('r_crterm');
        var _due_date = $(this).attr('r_duedate');
        var _wt = $(this).attr('r_wt');
        var _vat = $(this).attr('r_vat');
        var _currency_name = $(this).attr('currency_name');
        var _currency_id = $(this).attr('r_currency_id');
        var _exchangrate = $(this).attr('r_exchangrate');
        var _remark = $(this).attr('r_remark');
        var _income_code = $(this).attr('r_income_code');
        var _netamount = $(this).attr('r_netamount');
        var _am_net_code = $(this).attr('am_net_code');
        var _am_net_name = $(this).attr('am_net_name');
        var _project_id = $(this).attr('project_id');
        var _system_code_id = $(this).attr('system_code_id');
        $('#ot_code').val(_id);
        $('#ot_date').val(_date);
        $('#depart_code').val(_department_code);
        $('#depart_name').val(_department_name);
        $('#depart_id').val(_department_id);
        $('#pro_name').val(_pro_name);
        $('#pro_code').val(_pro_code);
        $('#pro_id').val(_pro_id);
        $('#ot_ref_date').val(_ref_date);
        $('#income_id').val(_income_id);
        $('#income_name').val(_income_name);
        $('#sys_head_name').val(_system_name);
        $('#sys_head_id').val(_system_id);
        $('#sys_head_code').val(_system_code);
        $('#cus_code').val(_cus_code);
        $('#cus_name').val(_cus_name);
        $('#cus_id').val(_cus_id);
        $('#cr_term').val(_crterm);
        $('#ot_wt').val(_wt);
        $('#ot_vat').val(_vat);
        $('#currency').val(_currency_name);
        $('#currency_id').val(_currency_id);
        $('#ot_exchangrate').val(_exchangrate);
        $('#ot_remark').val(_remark);
        $('#duedate').val(_due_date);


        if (_type == "service") {
            $('#service').attr('checked', true);
        }else{
            $('#trading').attr('checked', true);
        }

        if (_tax == "no") {
            $('#tax_no').attr('checked', true);
        }else{
            $('#tax_yes').attr('checked', true);
        }

        if (_gl == "true") {
            $('#ch_gl').attr('checked', true);
        }
         
        
        var tr = `  <tr>
                        <td>1</td>
                        <td>
                            <input type="hidden" name="amt_total" value="${_amount}">
                            ${_system_name}
                            <input type="hidden" class="form-control" name="system_name[]" readonly="readonly" value="${_system_name}">
                            <input type="hidden" class="form-control" name="system_id[]" readonly="readonly" value="${_system_id}">
                            <input type="hidden" class="form-control" name="system_code[]" readonly="readonly" value="${_system_code_id}">
                            <input type="hidden" class="form-control" name="project_id[]" readonly="readonly" value="${_project_id}">
                        </td>
                        <td>
                            <input type="text" name="acc_code[]" id="acc_code1" class="form-control" value="${_net_code}" readonly="readonly" >
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control" name="acc_name[]" id="acc_name1" readonly="readonly" value="${_net_name}">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="acc('1')"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="cost_code[]" readonly="" id="cost_code_1" class="form-control">
                                <div class="input-group-btn">
                                    <a class="btn btn-info btn-icon selectcostcode" row="1"><i class="icon-search4"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right">
                            ${(_amount*1)+(_vat_total*1)}
                            <input type="hidden" name="debit[]" id="debit_1" readonly="readonly" value="${(_amount*1)+(_vat_total*1)}">
                            <input type="hidden" name="net_amt" value="${(_amount*1)+(_vat_total*1)}">
                            <input type="hidden" name="amt" value="${(_amount*1)}">
                        </td>
                        <td class="text-right"><input type="hidden" name="credit[]" value="0"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            ${_system_name}
                            <input type="hidden" class="form-control" name="system_name[]"  readonly="readonly" value="${_system_name}">
                            <input type="hidden" class="form-control" name="system_id[]" readonly="readonly" value="${_system_id}">
                            <input type="hidden" class="form-control" name="system_code[]" readonly="readonly" value="${_system_code_id}">
                            <input type="hidden" class="form-control" name="project_id[]" readonly="readonly" value="${_project_id}">
                        </td>
                        <td>
                            <input type="text" name="acc_code[]" id="acc_code2" class="form-control" value="${_am_net_code}" readonly="readonly" >
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control" name="acc_name[]" id="acc_name2" readonly="readonly" value="${_am_net_name}">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="acc('2')"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="cost_code[]" readonly="" id="cost_code_2" class=" form-control">
                                <div class="input-group-btn">
                                    <a class="btn btn-info btn-icon selectcostcode" row="2"><i class="icon-search4"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right"><input type="hidden" name="debit[]" value="0"></td>
                        <td class="text-right">
                            ${_vat_total}
                            <input type="hidden" class="form-control" name="credit[]" id="credit_2" readonly="readonly" value="${_vat_total}">
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            ${_system_name}
                            <input type="hidden" class="form-control" name="system_name[]" readonly="readonly" value="${_system_name}">
                            <input type="hidden" class="form-control" name="system_id[]" readonly="readonly" value="${_system_id}">
                            <input type="hidden" class="form-control" name="system_code[]" readonly="readonly" value="${_system_code_id}">
                            <input type="hidden" class="form-control" name="project_id[]" readonly="readonly" value="${_project_id}">
                        </td>
                        <td>
                            <input type="text" name="acc_code[]" id="acc_code3" class="form-control" value="${_income_code}" readonly="readonly" >
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control" name="acc_name[]" id="acc_name3" readonly="readonly" value="${_income_name}">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="acc('3')"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="cost_code[]" readonly="" id="cost_code_3" class="form-control">
                                <div class="input-group-btn">
                                    <a class="btn btn-info btn-icon selectcostcode" row="3"><i class="icon-search4"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right"><input type="hidden" name="debit[]" value="0"></td>
                        <td class="text-right">
                            ${_amount}
                            <input type="hidden" class="form-control" name="credit[]" id="credit_3" readonly="readonly" value="${_amount}">
                        </td>
                   </tr>`;
        $('#other_tr').html(tr);
        


        $(".selectcostcode").click(function(event) {
            var _row = $(this).attr('row');
            $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#modal_cost").load('<?php echo base_url(); ?>share/costcode_id/'+_row);
            $('#modal_cost_code').modal('show');
        });
                   
        $('#select_receipt').remove();
        

    });

   function acc(id){
        $("#account_code").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#account_code").load(`<?php echo base_url(); ?>ar/account_code_by_rows/${id}`);
        $('#myAccount').modal('show');
    }
</script>