
<table class="table table-xxs">
                    <thead>
                        <tr>
                    <th class="text-center" width="5%">No.</th>
                    <th class="text-center" width="15%">รหัสสินค้า</th>
                    <th class="text-center" width="20%">ชื่อสินค้า</th>
                    <th class="text-center" width="10%">ปริมาณ</th>
                    <th class="text-center" width="10%">หน่วย</th>
                   
                    <th class="text-center" width="15%">จำนวนเงิน </th>
                  
                    
                  </tr> 
                    </thead>
                     <tbody id="tbody">
                <?php $i=1; $tot=0; foreach ($prd as $u) {?>

                            <tr id="<?php echo $i; ?>">
      
                               <th><?php echo $i; ?><input type="hidden" name="chki[]" id="chki" value="Y">
                               <input type="hidden" name="loidd[]" id="lo_idd" value="<?php echo $u->lo_idd; ?>">
                               <input type="hidden" name="periodd[]" id="period<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $i; ?>">
                               </th>

                               <th><input type="text" name="matidi[]" id="lo_matcode<?php echo $i; ?>" readonly="true" class="form-control btn-xs" value="<?php echo $u->lo_matcode; ?>"></th>
                                  <th><input type="text" readonly="true" name="matnamei[]" id="lo_matname<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->lo_matname; ?>"></th>

                               <th><input type="text" name="qtyi[]" id="lo_qty<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->lo_qty; ?>"></th>
                               
                               <th><div class="input-group"><input  readonly="true" type="text" name="uniti[]" id="lo_unit<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->lo_unit; ?>"></div></th>
                               
                             

                               <th><input type="text" name="amounti[]" id="lo_priceunit<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->lo_priceunit; ?>"></th>
                                 
                         
                               
</tr>


                            <?php $i++; $ii=$i; $tot=$tot+$u->lo_priceunit; } ?>
                                
               

                    <tr>
                  <th class="text-center btn-xs" colspan="5">Total.</th>
                  <th class="text-center"><input type="text" name="" id="" class="form-control btn-xs" value="<?php echo $tot; ?>"></th>
   
                  
                    
                  </tr> 
                                 </tbody>
                                 </table>

  <?php $i=1; foreach ($prd as $u) {?>
<div id="opnewmat<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-full">
                            <div class="modal-content ">
                                <div class="modal-header bg-info">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">เพิ่มรายการ</h5>
                                </div>
                                    <div class="modal-body">
                                            <div class="row" id="modal_mat<?php echo $i; ?>"></div>

                                    </div>
                            </div>
                        </div>
                        </div>
          <!-- material -->


    <div class="modal fade" id="openunit<?php echo $i; ?>" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
         </div>
           <div class="panel-body">
               <div id="modal_unit<?php echo $i; ?>">

               </div>
           </div>
       </div>
     </div>
   </div>



   
    <script>
    $(".openun<?php echo $i; ?>").click(function(){
    $("#modal_mat<?php echo $i; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_mat<?php echo $i; ?>").load('<?php echo base_url(); ?>share/getmatcode/<?php echo $i; ?>');
    });
    $("#modalunit<?php echo $i; ?>").click(function(){
    $('#modal_unit<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_unit<?php echo $i; ?>").load('<?php echo base_url(); ?>index.php/share/unit/<?php echo $i; ?>');
   });
    </script>
 <?php $i++; } ?>