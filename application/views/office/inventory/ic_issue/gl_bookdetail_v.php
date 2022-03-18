<br>
<br>
<div class="col-md-12">
                      <div class="tablex">
                        <div class="row">
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover table-xxs">
                                <tbody>
<?php
$ee = $this->db->query("SELECT * from project where project_id='$projid'")->result();
  foreach ($ee as $primary) {
  foreach ($item as $value) {
  $ee = $this->db->query("SELECT unitprice,store_total from store where store_matcode='$value->mat_code' and store_project='$projid'")->result();

  ?>
  <tr>
    <?php foreach ($ee as $key => $eq) {?>
 <td><input type="text" value="<?php echo $primary->acc_secondary; ?>" name="acc_no[]"></td>
  <td><input type="text" name="dr[]" value="<?php echo $eq->unitprice*$value->qty; ?>" /></td>
  <td><input type="text" name="cr[]" value="0" /></td>

</tr>
 <?php } ?>
<tr> 
    <?php foreach ($ee as $key => $eq) {?>
  <td><input type="text" value="<?php echo $primary->acc_primary; ?>" name="acc_no[]"></td>
  <td><input type="text" name="dr[]" value="0" /></td>
  <td><input type="text" name="cr[]" value="<?php echo $eq->unitprice*$value->qty; ?>" /></td>
</tr>
<?php }  }   }
?>
                              </table>
                            </div>
                          </div>
                        </div>