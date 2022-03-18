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
                    $n=1; foreach ($loadtable as $u) {?>
                    <tr id="<?php echo $n; ?>">
                        <td>
                            <?php echo $n; ?><input type="hidden" name="opt[]" id="opt<?php echo $n;?>" value="Y">
                             
                        </td>
                        <td class="text-center" id="doci_refe<?php echo $n; ?>">
                            <?php echo $u->doci_ref; ?><input type="hidden" name="doci_refi[]" value="<?php echo $u->doci_ref; ?>">
                        </td>
                        <td  class="text-center" id="doci_date<?php echo $n; ?>">
                            <?php echo $u->doci_date; ?>
                            <input type="hidden" name="doci_date[]" value="<?php echo $u->doci_date; ?>">
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            <?php echo $u->doci_pono; ?>
                            <input type="hidden" name="doci_pono[]" value="<?php echo $u->doci_pono; ?>">
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            
                        </td>
                        <td  class="text-right" id="doci_netmet<?php echo $n; ?>">
                            <?php echo $u->doci_netamt; ?>
                            <input type="hidden" name="doci_netamt[]" value="<?php echo $u->doci_netamt; ?>">
                        </td>
                        <td  class="text-right" id="doci_netmet<?php echo $n; ?>">
                            <?php echo $u->doci_netamt; ?>
                            <input type="hidden" name="doci_netamtt[]" value="<?php echo $u->doci_netamt; ?>">
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            
                        </td>
                        <td  class="text-center" id="<?php echo $n; ?>">
                            
                        </td>

                    </tr>
                    <?php $n++; $tot=$tot+$u->doci_netamt; } ?>

                </tbody>
                    <tr>
                        <td colspan="5"  class="text-right">Total :</td>
                        <td colspan="1"  class="text-center"></td>
                        <td colspan="1"  class="text-center"></td>
                        <td colspan="4"  class="text-center"></td>
                    </tr>
                    <tr>
                        <td colspan="5"  class="text-right">Paid Amount :</td>
                        <td  class="text-right"><?php echo number_format($tot,2); ?>
                        <input type="hidden" name="paynet" id="paynet" value="<?php echo $tot; ?>">
                        <input type="hidden" name="chq_status" id="chq_status" value="Y">
                        <input type="hidden" name="ivender" id="ivender" value="<?php echo $u->apo_vender; ?>">
                        </td>
                        
                        <td colspan="1"  class="text-center"></td>
                        <td colspan="4"  class="text-center"></td>
                    </tr>
            </table>
        </div>
</div>
</div> 

