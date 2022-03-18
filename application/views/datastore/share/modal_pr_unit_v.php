
    <table class="table table-hover table-bordered table-striped table-xxs" >
    <thead>
        <tr>
            <th width="5%">Active</th>
            <th>No.</th>
            <th>Unit code</th>
            <th>Unit Name</th>
        </tr>
    </thead>
    <tbody id="trrow">
    <?php   $n =1;?>
    <?php foreach ($res as $valj){ ?>
        <tr>
            <td></td>
            <td><?php echo $n;?></td>
            <td><input class="form-control input-xs" type="text" name="upcode[]" value="<?php echo $valj->unit_code?>"></td>
            <td>
                <input class="form-control input-xs" type="text" name="projectunitname[]" value="<?php echo $valj->unit_name; ?>">
                <input class="form-control input-xs" type="hidden" name="projectcode[]" value="<?php echo $projectcode; ?>">
            </td>
        </tr>

    <?php $n++; } ?>
    </tbody>
    </table>

