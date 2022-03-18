
<table class="table table-xxs">
                    <thead>
                        <tr>
                           <th>#</th>
                      <th width="auto"></th>
                      <th width="auto">Account Code</th>
                      <th width="auto">Account Name</th>
                      <th width="auto">Cost Code</th>
                      <th width="auto">Material</th>
                      <th width="auto">Dr</th>
                      <th width="auto">Cr</th>                   
                  </tr> 
                    </thead>
                     <tbody id="tbody">
                <?php $i=1; $tott=0; foreach ($prd as $u) {
                $costcode = substr($u->lo_costcode,10,5);
                $query = $this->db->query("select accno,accname from cost_subgroup where csubgroup_code='$costcode'");
                $res = $query->result();

                $queven = $this->db->query("select accno,accname from vender where vender_id='$vendid'");
                $resven = $queven->result();
                ?>
                            <tr id="<?php echo $i; ?>">
                  
                               
                               <th><?php echo $i; ?></th>
                               <th>AMOUNT</th>
                  <?php foreach ($res as $value) {?>
                  <th><div class="input-group"><input type="text" class="form-control input-sm" name="accno_gl[]" id="accno<?php echo $i; ?>" value="<?php echo $value->accno; ?>" ><div class="input-group-btn"><button type="button" class="accopen<?php echo $i;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button></div></div></th>
                  <td><input type="text" class="form-control input-sm" readonly id="accountname<?php echo $i; ?>" name="accountname_gl[]" value="<?php echo $value->accname; ?>"/></td>
                 <?php } ?>

                               <th><div class="input-group"><input type="text" name="costidi_gl[]" id="lo_costcode<?php echo $i; ?>" class="form-control btn-xs" readonly="true" value="<?php echo $u->lo_costcode; ?>"><input type="text" name="costnamei_gl[]" id="lo_costname<?php echo $i; ?>" class="form-control btn-xs" readonly="true" value="<?php echo $u->lo_costname; ?>"></div></th>
                               <th><div class="input-group"><input type="text" name="matidi_gl[]" id="lo_matcode<?php echo $i; ?>" readonly="true" class="form-control btn-xs" value="<?php echo $u->lo_matcode; ?>"><input type="text" readonly="true" name="matnamei_gl[]" id="lo_matname<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->lo_matname; ?>"></th>
                        <th><input type="text" name="dr_gl[]" id="dr_gl<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->lo_priceunit; ?>"></th>
                        <th><input type="text" name="cr_gl[]" id="cr_gl<?php echo $i; ?>" class="form-control btn-xs"  value="0.00"></th>
                                 
                         
                               
                    </tr>
                

<div id="accopen<?php echo $i;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Account <?php echo $i; ?></h5>
      </div>

      <div class="modal-body">
        <div class="loadaccchart<?php echo $i; ?>">

        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
        <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
<script>
$(".accopen<?php echo $i;?>").click(function(){
$('.loadaccchart<?php echo $i;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
$(".loadaccchart<?php echo $i;?>").load('<?php echo base_url(); ?>share/accchart/<?php echo $i; ?>');
});
</script>

                            
                                  <?php $i++; $ii=$i; $tott=$tott+$u->lo_priceunit; } ?>

                                               <tr id="<?php echo $i; ?>">
      
                               
                               <th><?php echo $i; ?></th>
                               <th>VENDER</th>
                                <?php foreach ($res as $value) {?>
                  <th><div class="input-group"><input type="text" class="form-control input-sm" name="accno_gl[]" id="accno<?php echo $i; ?>" value="<?php echo $value->accno; ?>"><div class="input-group-btn"><button type="button" class="accopen<?php echo $i;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button></div></div></th>
                  <td><input type="text" class="form-control input-sm" readonly id="accountname<?php echo $i; ?>" name="accountname_gl[]" value="<?php echo $value->accname; ?>"/></td>
                 <?php } ?>
  <th><input type="text" name="" id="" readonly="true" class="form-control btn-xs" value=""></th>
  <th><input type="text" name="" id="" readonly="true" class="form-control btn-xs" value=""></th>
  <th><input type="text" name="dr_gl[]" id="dr_gl<?php echo $i; ?>" class="form-control btn-xs"   value="0.00"></th>
  <th><input type="text" name="cr_gl[]" id="cr_gl<?php echo $i; ?>" class="form-control btn-xs"  value="<?php echo $tott; ?>"></th>
                                 
                         

                               
                    </tr>   

                                          <tr>
                    <th class="text-center btn-xs" colspan="6">Total.</th>
      <th class="text-center"><?php echo $tott; ?></th>
      <th class="text-center"><?php echo $tott; ?></th>
   
                  
                    
                  </tr> 
                                 </tbody>
                                 </table>
                                 
<div id="accopen<?php echo $i;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Account <?php echo $i; ?></h5>
      </div>

      <div class="modal-body">
        <div class="loadaccchart<?php echo $i; ?>">

        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
        <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
<script>
$(".accopen<?php echo $i;?>").click(function(){
$('.loadaccchart<?php echo $i;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
$(".loadaccchart<?php echo $i;?>").load('<?php echo base_url(); ?>share/accchart/<?php echo $i; ?>');
});
</script>