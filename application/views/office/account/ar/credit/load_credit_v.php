<?php
if ($type == 'down'){
    $no=1;
    foreach ($down as $key ) {
        ?>
        <tr>

            <td><?php echo $no; ?></td>
            <td ><?php echo $key->systemname; ?></td>
            <td><input type="number" style="text-align: center;width: 100px;"  name="inv_downamt[]" id="inv_downamt<?php echo $key->invi_id; ?>" class="form-control text-center" value="<?=$key->inv_downamt ?>" max="<?=$key->inv_downamt ?>"></td>
            <td><input type="text" style="text-align: center;width: 100px; color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;"  readonly="" name="inv_adv[]" value="<?php echo number_format($key->inv_adv,2); ?>"></td>

            <td><input type="text" style="text-align: center;width: 100px; color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;"  readonly="" id="vati<?php echo $key->invi_id; ?>" name="inv_vatper[]" value="<?php echo $key->inv_vatamt; ?>"></td>
            <td><input type="text" style="text-align: center;width: 100px;color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;"  readonly="" name="acc_retamt[]" value="<?php echo $key->acc_retamt; ?>"></td>
            <td><input type="text" style="text-align: center;width: 100px;color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;" id="inv_lesswt<?php echo $key->invi_id; ?>" readonly="" name="inv_lesswt[]" value="<?php echo $key->inv_lesswt; ?>"></td>
            <td><input type="text" style="text-align: center;width: 100px;color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;" id="toamt<?php echo $key->invi_id; ?>" readonly="" name="inv_netamt[]" value="<?php echo $key->inv_netamt; ?>"></td>
            <td></td>
            <td><?php echo $key->createdate; ?> </td>
        </tr>
        <input type="hidden" name="createdate[]" value="<?php echo $key->createdate; ?>">
        <input type="hidden" name="inv_system[]" value="<?php echo $key->inv_system; ?>">
        <input type="hidden" name="inv_period[]" value="<?php echo $key->inv_period; ?>">

        <script>
              $("#inv_downamt<?php echo $key->invi_id; ?>").keyup(function(){
                var down = parseFloat($("#inv_downamt<?php echo $key->invi_id; ?>").val());
                var wt = parseFloat($("#project_wt").val());
                var vat = parseFloat($("#project_vat").val());
                var vatamt = (down*vat/100);
                var lesswt = (down*wt/100);
                var toamt = parseFloat((down+vatamt)-lesswt);
    
                $("#inv_downamt<?php echo $key->invi_id; ?>").val(down);
                $("#vati<?php echo $key->invi_id; ?>").val(vatamt);
                $("#inv_lesswt<?php echo $key->invi_id; ?>").val(lesswt);
                $("#toamt<?php echo $key->invi_id; ?>").val(toamt);
                });
              
            </script>

        <?php $no ++ ; }} ?>
<?php
if ($type == 'progress'){
    $no=1;
    foreach ($pro as $value ) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td ><?php echo $value->inv_system; ?></td>
            <td><input type="number" style="text-align: center;width: 100px;"  name="inv_downamt[]" id="inv_downamt<?php echo $value->invi_id; ?>" class="form-control text-center" value="<?=$value->inv_progressamt ?>" max="<?=$value->inv_progressamt ?>"></td>
            <td><input type="text" style="text-align: center;width: 100px; color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;"  readonly="" name="inv_adv[]" value="<?php echo number_format($value->inv_lessadvance,2); ?>"></td>

            <td><input type="text" style="text-align: center;width: 100px; color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;"  readonly="" id="vati<?php echo $value->invi_id; ?>" name="inv_vatper[]" value="<?php echo $value->inv_vatamt; ?>"></td>
            <td><input type="text" style="text-align: center;width: 100px;color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;"  readonly="" name="acc_retamt[]" value="<?php echo $value->acc_retamt; ?>"></td>
            <td><input type="text" style="text-align: center;width: 100px;color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;" id="inv_lesswt<?php echo $value->invi_id; ?>" readonly="" name="inv_lesswt[]" value="<?php echo $value->inv_lesswt; ?>"></td>
            <td><input type="text" style="text-align: center;width: 100px;color: #2b2828; background-color: rgba(85, 85, 85, 0); border: aliceblue;" id="toamt<?php echo $value->invi_id; ?>" readonly="" name="inv_netamt[]" value="<?php echo $value->inv_netamt; ?>"></td>
            <td></td>
            <td><?php echo $value->createdate; ?> </td>
        </tr>
        <input type="hidden" name="createdate[]" value="<?php echo $value->createdate; ?>">
        <input type="hidden" name="inv_system[]" value="<?php echo $value->inv_system; ?>">
        <input type="hidden" name="inv_period[]" value="<?php echo $value->inv_period; ?>">

        <script>
              $("#inv_downamt<?php echo $value->invi_id; ?>").keyup(function(){
                var down = parseFloat($("#inv_downamt<?php echo $value->invi_id; ?>").val());
                var wt = parseFloat($("#project_wt").val());
                var vat = parseFloat($("#project_vat").val());
                var vatamt = (down*vat/100);
                var lesswt = (down*wt/100);
                var toamt = parseFloat((down+vatamt)-lesswt);
    
                $("#inv_downamt<?php echo $value->invi_id; ?>").val(down);
                $("#vati<?php echo $value->invi_id; ?>").val(vatamt);
                $("#inv_lesswt<?php echo $value->invi_id; ?>").val(lesswt);
                $("#toamt<?php echo $value->invi_id; ?>").val(toamt);
                });
              
            </script>
        <?php $no ++ ; }} ?>

<?php
if ($type == 'retention'){
    $no=1;
    foreach ($ren as $key ) {
        ?>
        <tr>

            <td><?php echo $no; ?></td>
            <td><?php echo $key->inv_system;; ?></td>
            <td><input type="number" name="inv_downamt[]" class="form-control text-center" value="<?=$key->inv_retentionamt ?>" max="<?=$key->inv_retentionamt ?>"></td>
            <td><?php echo $key->inv_adv; ?></td>
            <td><?php echo $key->inv_vat; ?>%</td>
            <td><?php echo $key->acc_retamt; ?></td>
            <td><?php echo $key->inv_lesswt; ?></td>
            <td><?php echo $key->inv_netamt; ?></td>
            <td></td>
            <td><?php echo $key->createdate; ?></td>
<!--            <td>--><?php //echo print_r($ren); ?><!--</td>-->
        </tr>
        <input type="hidden" name="createdate" value="<?php echo $key->createdate; ?>">
        <input type="hidden" name="inv_netamt" value="<?php echo $key->inv_netamt; ?>">
        <input type="hidden" name="inv_lesswt" value="<?php echo $key->inv_lesswt; ?>">
        <input type="hidden" name="acc_retamt" value="<?php echo $key->acc_retamt; ?>">
        <input type="hidden" name="inv_vatper" value="<?php echo $key->inv_vat; ?>">
        <input type="hidden" name="inv_adv" value="<?php echo $key->inv_lessadvance; ?>">
<!--        <input type="hidden" name="inv_downamt" value="--><?php //echo $key->inv_retentionamt; ?><!--">-->
        <input type="hidden" name="inv_system" value="<?php echo $key->inv_system; ?>">
        <input type="hidden" name="inv_ref" value="<?php echo $key->inv_ref; ?>">
        <input type="hidden" name="inv_period" value="<?php echo $key->inv_period; ?>">
        <?php $no ++ ; }} ?>
