<?php foreach ($res as $key) {
  $expcode = $key->expens_code;
  $expname = $key->expens_name;
  $expaaccode = $key->ac_code;
  $acname = $key->act_name;
} ?>
<div class="modal-body">
  <div class="form-group">
    <label class="col-lg-4 control-labelt">Expens Code:</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" id="expcode" name="expcode" value="<?php echo $expcode; ?>" placeholder="Expens Code.">
    </div>
  </div><br>

  <div class="form-group">
    <label class="col-lg-4 control-labelt">Expens Name:</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" id="epxname" name="epxname" value="<?php echo $expname; ?>" placeholder="Expens Name.">
    </div>
  </div><br>
  <div class="form-group">
    <label class="col-lg-4 control-labelt">Account code:</label>
    <div class="col-lg-6">
      <div class="input-group">
      <input type="text" readonly="" class="form-control" id="accno<?php echo $expcode; ?>" name="acccode" value="<?php echo $expaaccode; ?>" placeholder="Enter Account code">
      <input type="text" readonly="" class="form-control" id="accountname<?php echo $expcode; ?>" name="accname" value="<?php echo $acname; ?>" placeholder="Enter Account Name">
      <div class="input-group-btn">
         <button type="button" data-toggle="modal" data-target="#accopen"  class="accopen btn btn-default btn-icon"><i class="icon-search4"></i></button>
      </div>
      </div>
    </div>
  </div><br>
</div>