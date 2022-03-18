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
            foreach ($rows as $key => $row) {
        ?>            
            <tr>
                <td>
                    <input type="hidden" name="ref_pyid[]" value="<?=$row->ref_pettycashi_id;?>">
                    <input type="text" class="form-control input-xs" name="gltype[]" value="<?=$row->gltype;?>" readonly="true">
                </td>
                <td>
                    <input type="text" class="form-control input-xs" name="ac_no[]" value="<?=$row->acct_no;?>" readonly="true">
                </td>
                <td>
                
                    <input type="text" class="form-control input-xs" value="<?=$row->act_name;?>" readonly="true">
                </td>
                <td>
                    <input type="text" class="form-control input-xs" name="costcode[]" value="<?=$row->costcode;?>" readonly="true">
                
                </td>
                <td>
                    <input type="text" class="form-control input-xs text-right" name="ap_dr[]" value="0" id="<?=strtolower(str_ireplace('/', '', $row->gltype)).'dr'.$row->ref_pettycashi_id;?>" readonly="true">
                
                </td>
                <td>
                    <input type="text" class="form-control input-xs text-right" name="ap_cr[]" value="0" id="<?=strtolower(str_ireplace('/', '', $row->gltype)).'cr'.$row->ref_pettycashi_id;?>" readonly="true">
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
