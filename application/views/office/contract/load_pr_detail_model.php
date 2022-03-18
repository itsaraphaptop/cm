 <div id="table table-responsive">
              <table class="table table-bordered table-striped table-hover table-xxs" >
                           <thead>
                             <tr>
                               <th width="5%" style="text-align: center;">No.</th>
                               
                               <th style="text-align: center;">Cost Name</th>
                               <th style="text-align: center;">Material</th>
                               <th style="text-align: center;">QTY</th>
                               <th style="text-align: center;">Unit</th>
                               <th style="text-align: center;">Amount</th>
                               
                             </tr>
                           </thead>
                           <tbody id="tbody">
                           <?php $n=1; $tot=0;  foreach ($res as $u) {?>
                              <tr id="<?php echo $n;?>">
                                <th style="text-align: center;"><?php echo $n;?><input type="hidden" class="form-control" name="chki[]" id="chki<?php echo $n;?>" check value="" readonly/></th>
                               
                                <th><input type="text" class="form-control" name="costidi[]" value=<?php echo $u->pri_costcode; ?>"" readonly/><input type="text" class="form-control" name="costnamei[]" value="<?php echo $u->pri_costname; ?>" readonly/></th> 
                                <th><input type="text" class="form-control" name="matidi[]" value="<?php echo $u->pri_matcode; ?>" readonly/><input type="text" class="form-control" name="matnamei[]" value="<?php echo $u->pri_matname; ?>" readonly/></th>
                                <th><input type="text" class="form-control" name="qtyi[]" value="<?php echo $u->pri_qty; ?>" readonly/></th>
                                <th><input type="text" class="form-control" name="uniti[]" value="<?php echo $u->pri_unit; ?>" readonly/></th>
                                <th><input type="text" class="form-control" name="amounti[]" id="amounti<?php echo $n;?>" value="<?php echo $u->pri_priceunit; ?>" /></th>
                               
                              </tr>
                              <?php $tot=$tot+$u->pri_priceunit; $n++; } ?>
                        
                      
                   
   </tbody>
      <tr>
                        <th colspan="5" style="text-align: center;">Total</th>
                        <th><input class="form-control" type="text" name="" id="" value="<?php echo $tot; ?>"></th>
                        
                       
                      </tr>
                         </table>
                        </div>

