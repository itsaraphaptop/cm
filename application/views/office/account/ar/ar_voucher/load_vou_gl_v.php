<table class="table table-xxs">
  <thead>
    <tr>
      <th width="5%">#</th>
      <th width="5%"></th>
      <th width="10%">Account Code</th>
      <th width="20%">Account Name</th>
      <th width="auto">Material</th>
      <th width="10%">Dr</th>
      <th width="10%">Cr</th>
    </tr>
  </thead>
  <tbody>
               <?php $qt=0; $total = 0; ?>
                 <?php   $n =1; foreach ($gl_r as $val) {  
               ?>
               <tr>
                <th scope="row"><?php echo $n;?><input type="hidden" name="itemno[]" id="itemno" value="<?php echo $n; ?>"></th>
                <th>AMOUNT <input type="hidden" name="gl_type" id="gl_type" value="AMOUNT"></th>
                  <th>
                  <div class="input-group">
                  <input type="text" class="form-control input-sm" name="accno_gl[]" id="accno<?php echo $n; ?>" value="" required>
                  <div class="input-group-btn"><button type="button" class="accopen<?php echo $n;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#accopen<?php echo $n; ?>"><i class="icon-search4"></i></button></div></div></th>
                  <td><input type="text" class="form-control input-sm" readonly id="accountname<?php echo $n; ?>" name="accountname_gl[]" value=""/></td>
                 <td><input type="text" class="form-control input-sm"  name="descrepi[]" id="descrepi<?php echo $n;?>" value="<?php echo $val->vou_desc; ?>"/>
                 </td>
                  <td><input type="text" class="form-control input-sm"  name="vatii[]" id="vatii<?php echo $n;?>" value="<?php echo $val->vou_netamt; ?>"/>
                  </td>
                  <td><input type="text" class="form-control input-sm"  name="amtcr" id="" value="0.00"/>
                  </td>
               </tr>
               <div id="accopen<?php echo $n;?>" class="modal fade">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h5 class="modal-title">Account <?php echo $n; ?></h5>
                    </div>

                    <div class="modal-body">
                      <div class="loadaccchart<?php echo $n;?>">

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
               $(".accopen<?php echo $n;?>").click(function(){
               $('.loadaccchart<?php echo $n;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
               $(".loadaccchart<?php echo $n;?>").load('<?php echo base_url(); ?>share/accchart/<?php echo $n; ?>');
               });
               </script>
                 <?php $n++;$i=$n; $total=$total+$val->vou_netamt; } ?>
                 <tr>
                    <th><?php echo $i; ?><input type="hidden" name="itemno_v" id="itemno_v" value="<?php echo $i; ?>"></th>
                     <th>VENDER<input type="hidden" name="gl_type_v" id="gl_type_v" value="VENDER"></th>
                     <th>
                  <div class="input-group">
                  <input type="text" class="form-control input-sm" name="accno_gll" id="accno<?php echo $n; ?>" value="" required>
                  <div class="input-group-btn"><button type="button" class="accopen<?php echo $n;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#accopen<?php echo $n; ?>"><i class="icon-search4"></i></button></div></div></th>
                  <td><input type="text" class="form-control input-sm" readonly id="accountname<?php echo $n; ?>" name="accountname_gl" value=""/></td>
                  <td>
                    <input type="text" class="form-control input-sm" readonly id="" name="" value=""/>
                  </td>
                  <td class="text-right">
                    <input type="text" class="form-control input-sm" readonly id="amtdr_v" name="amtdr_v" value="0.00"/>
                  </td>
                  <td class="text-right">
                    <input type="text" class="form-control input-sm" readonly id="" name="" value="<?php echo number_format($total,2); ?>"/>
                    <input type="hidden" name="amtcr_v" id="amtcr_v" value="<?php echo $total; ?>">
                  </td>

                 </tr>
                 <tr >
                   <th colspan="5" >Total</th>
                   <th class="text-right"><?php echo number_format($total,2); ?></th>
                   <th class="text-right"><?php echo number_format($total,2); ?>
                   </th>
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