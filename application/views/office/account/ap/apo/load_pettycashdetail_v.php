<table class="table table-bordered table-striped table-hover table-xxs">
            <thead>
              <tr>
                <th>No.</th>
                <th>Expenses Code</th>
                <th>Expenses</th>
                <th>Vender</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Unit</th>
                <th>Amount</th>
                <th>VAT</th>
                <th>TAX</th>
                <th>Net Amount</th>
              <!--   <th colspan="2" width="10">จัดการ</th> -->
              </tr>
            </thead>
            <tbody>
            <?php $unitprice=0; $amoun=0; $tot=0; $vattot=0; $whtot=0; $totnetamt=0; ?>
                <?php   $n =1; foreach ($resi as $val) { ?>
              <tr>
               <th scope="row"><?php echo $n;?></th>
                <td><?php echo substr($val->pettycashi_costcode,10); ?> - <?php echo $val->pettycashi_costname; ?>
                  <input type="hidden" name="costcodei[]" value="<?php echo $val->pettycashi_costcode; ?>">
                  <input type="hidden" name="costnamei[]" value="<?php echo $val->pettycashi_costname; ?>">
                </td>
                <td><?php echo $val->pettycashi_expenscode; ?> - <?php echo $val->pettycashi_expens; ?>
                  <input type="hidden" name="matcodei[]" value="<?php echo $val->pettycashi_expenscode; ?>">
                  <input type="hidden" name="matnamei[]" value="<?php echo $val->pettycashi_expens; ?>">
                </td>
                <td><?php echo $val->pettycashi_vender; ?>
                  <input type="hidden" name="venderi[]" value="<?php echo $val->pettycashi_vender; ?>">
                  <input type="hidden" name="apovenaddri[]" value="<?php echo $val->pettycashi_addrvender; ?>">
                  <input type="hidden" name="aopinvip[]" value="<?php echo $val->pettycashi_invno; ?>">
                  <input type="hidden" name="apoinvdatei[]" value="<?php echo $val->pettycashi_invdate; ?>">
                  <input type="hidden" name="apovatflagi[]" value="<?php echo $val->pettycashi_vatflag; ?>">
                  <input type="hidden" name="apoaxflagi[]" value="<?php echo $val->pettycashi_taxflag; ?>">
                  <input type="hidden" name="apotaxnoi[]" value="<?php echo $val->pettycashi_taxno; ?>">
                  <input type="hidden" name="apotaxdatei[]" value="<?php echo $val->pettycashi_taxdate; ?>">
                </td>
                <td><?php echo number_format($val->pettycashi_amount,2);?>
                  <input type="hidden" name="amounti[]" value="<?php echo $val->pettycashi_amount;?>">
                </td>
                <td><?php echo number_format($val->pettycashi_unitprice,2);?>
                  <input type="hidden" name="unitpricei[]" value="<?php echo $val->pettycashi_unitprice;?>">
                </td>
                <td><?php echo $val->pettycashi_unit;?>
                  <input type="hidden" name="uniti[]" value="<?php echo $val->pettycashi_unit;?>">
                </td>
                <td><?php echo number_format($val->pettycashi_amounttot,2);?>
                  <input type="hidden" name="amounttoti[]" value="<?php echo $val->pettycashi_amounttot;?>">
                </td>
                <td><?php echo number_format($val->pattycashi_totvat,2); ?>
                  <input type="hidden" name="totvati[]" value="<?php echo $val->pattycashi_totvat;?>">
                </td>
                <td><?php echo number_format($val->pettycashi_totwh,2); ?>
                  <input type="hidden" name="totwhi[]" value="<?php echo $val->pettycashi_totwh;?>">
                </td>
                <td><?php echo number_format($val->pettycashi_netamt,2); ?>
                  <input type="hidden" name="netamti[]" value="<?php echo $val->pettycashi_netamt;?>">
                  <input type="hidden" name="vati[]" value="<?php echo $val->pettycashi_vat; ?>">
                </td>
              <!--   <td>
                  <button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->pettycashi_id; ?>">แก้ไข</button></td>
                  <td><button class="del<?php echo $val->pettycashi_id;?> btn btn-xs btn-block btn-danger">ลบ</button>
                  </td> -->
              </tr>

                <?php $n++;

                 $unitprice= $unitprice+$val->pettycashi_unitprice;
                       $amoun = $amoun+$val->pettycashi_amount;
                       $tot= $tot+$val->pettycashi_netamt;
                       $vattot = $vattot+$val->pattycashi_totvat;
                       $whtot = $whtot+$val->pettycashi_totwh;
                       $totnetamt = $totnetamt+$val->pettycashi_netamt;

                 } ?>
                       <tr>
                         <th colspan="5" class="text-center"> Total</th>
                         <th><?php echo number_format($amoun,2); ?></th>
                         <th></th>
                         <th><?php echo number_format($tot,2); ?></th>
                         <th><?php echo number_format($vattot,2); ?></th>
                         <th><?php echo number_format($whtot,2); ?></th>
                         <th><?php echo number_format($totnetamt,2); ?></th>
                        <!--  <td colspan="2"></td> -->
                       </tr>

            </tbody>
          </table>
