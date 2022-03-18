


            <div class="panel panel-flat">
            <div class="panel-heading">
            <div class="panel-body">
            <!-- <button class="pull-right" type="button" hidden name="btn_tranfer" value="y" id="btn_tranfer">TRANFER</button> -->
            <form  action="<?php echo base_url(); ?>gl_active/updateGL" method="post">
              <input type="hidden" name="btn_tranfer" id="btn_tranfer" value="submit">
              <table class="table table-bordered">
  							<thead>
  								<tr>
  									<th >No.</th>
  									<th >A/C</th>
  									<th >#Dept.</th>
  									<th >#Project</th>
  									<th >#Job</th>
  									<th class="text-center">Cost Code</th>
                    <th >Dr</th>
                    <th >Cr</th>
  								</tr>
  							</thead>
  							<tbody>
<?php $i=1; foreach ($res as $value): ?>
  								<tr>
  									<td><?php echo $i; ?><input type="hidden" name="row" id="row" value="<?php echo $i; ?>"><input type="hidden" name="idapgl[]" value="<?php echo $value->id_apgl ;?>"><input type="hidden" name="ansy[]" value="Y"></td>
  									<td><?php echo $value->acct_no ; ?><input type="hidden" id="accno" name="accno" value="<?php echo $value->acct_no ; ?>"></td>
  									<td><?php echo $value->dptid ; ?><input type="hidden" name="dptid" value="<?php echo $value->dptid ; ?>"></td>
  									<td><?php echo $value->project_id; ?><input type="hidden" name="project_id" value="<?php echo $value->project_id ; ?>"></td>
  									<td><?php echo $value->systemcode; ?><input type="hidden" name="systemcode" value="<?php echo $value->systemcode ; ?>"></td>
  									<td class="text-center"><?php echo $value->costcode; ?><input type="hidden" name="costcode" value="<?php echo $value->costcode ; ?>"></td>
                    <td><?php echo $value->amtdr ; ?><input type="hidden" name="amtdr" value="<?php echo $value->amtdr ; ?>"></td>
                    <td><?php echo $value->amtcr ; ?><input type="hidden" name="amtcr" value="<?php echo $value->amtcr ; ?>"></td>
  								</tr>

<?php $i++; endforeach; ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>total</td>
          <?php foreach ($sum as $key =>$plus): ?>
        <?php $ansdr = $plus->total_amtdr ?>
        <?php $anscr = $plus->total_amtcr ?>
          <td><?php echo $ansdr ?></td>
          <td><?php echo $anscr ?></td>
          <?php endforeach; ?>
        </tr>
        </form>


              </tbody>
            </table>


            </div>
            </div>

            </div>
            <script>
            // $('#btn_tranfer').prop('type','hidden');
            var ansdr = <?php echo $ansdr ?>;
            var anscr = <?php echo $anscr ?>;



                if (ansdr==anscr) {
                  $('#btn_tranfer').prop('type','submit');
                }
              
            </script>
