
  <div class="form-group col-lg-2" id="jobsystem">
                    <label class="control-label">Job :</label>
                                   <div class="form-group">
                          <select class="form-control input-sm" name="fa_job" id="fa_jobcode" style="width: 200px;">
                            <option value=""></option> 
                                   <?php  
                                    $q = $this->db->query("select * from project_item where project_code = '$id'")->result(); ?>
                                   <?php foreach ($q as $key => $v) { ?> 
                                   
                                    <?php $a = $this->db->query("select * from system where systemcode = '$v->projectd_job'")->result(); ?>
                                  
                                  <?php foreach ($a as $key => $b) { ?>

                                  <option value="<?php echo $b->systemcode; ?>"><?php echo $b->systemname; ?></option>
                                 
                                  <?php  }  ?>
                              <?php  }  ?>
                          </select>
                    </div>
               </div>