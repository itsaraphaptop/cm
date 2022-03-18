<div class="panel-body">
<div class="row" id="table">
        <div class="table-responsive">
            <table class="table datatable-basic table-xxs table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Pre Payment No.</th>
                        <th class="text-center">Due Date</th>
                        <th class="text-center">PO/WO No.</th>
                        <th class="text-center">Tax/Inv. No.</th>
                        <th class="text-center">Paid Net Amount</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">VAT</th>
                        <th class="text-center">W/T Amount</th>
                        <th class="text-center">W/T FR.</th>
                    </tr>
                </thead>
                <tbody id="body">
                <?php $tot=0;
                    $n=1; foreach ($arctable as $u) {?>
                    <tr id="<?php echo $n; ?>">
                        <td>
                            <?php echo $n; ?><input type="hidden" name="opt[]" id="opt<?php echo $n;?>" value="">
                             
                        </td>
                        <td class="text-center" id="runno<?php echo $n; ?>">
                            <?php echo $u->runno; ?><input type="hidden" name="runno[]" value="<?php echo $u->runno; ?>">
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            <?php echo $u->plno; ?>
                            <input type="hidden" name="plno[]" value="<?php echo $u->plno; ?>">
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            
                        </td>
                        <td  class="text-right" id="doci_netmet<?php echo $n; ?>">
                            
                            <input type="text" name="payamt1[]" value="<?php echo $u->payamt ; ?>">
                        </td>
                        <td  class="text-right" id="doci_netmett<?php echo $n; ?>">
                            <input type="text" name="payamt2[]" value="<?php echo $u->payamt ; ?>">
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            
                        </td>
                    </tr>
                    <?php $n++; $tot=$tot+$u->payamt; } ?>

                </tbody>
                   <tr>
                        <td colspan="5"  class="text-right">Total :</td>
                        <td colspan="1"  class="text-center"></td>
                        <td colspan="1"  class="text-center"></td>
                        <td colspan="4"  class="text-center"></td>
                    </tr>
                    <tr>
                        <td colspan="5"  class="text-right">Paid Amount :</td>
                        <td  class="text-right">
                        <input type="hidden" name="paynet" id="paynet" value="<?php echo $tot; ?>">
                        <input type="text" name="" id="" value="<?php echo number_format($tot,2) ; ?>">
                        <input type="hidden" name="chq_status" id="chq_status" value="Y">
                        <input type="hidden" name="irunno" id="runno" value="<?php echo $u->runno; ?>">
                        </td>
                        
                        <td colspan="1"  class="text-center"></td>
                        <td colspan="4"  class="text-center"></td>
                    </tr>
                    <tr>
                    </tr>
            </table>
        </div>
</div>
</div> 

