 <table class="table table-bordered table-striped table-hover" style="font-size:12px;">
             <thead>
               <tr>
                 <th>No.</th>
                 <th>รหัสค่าใช้จ่าย</th>
                 <th>ค่าใช้จ่าย</th>
                 <th>ร้านค้า</th>
                 <th>จำนวน</th>
                 <th>ราคาต่อหน่วย</th>
                 <th>หน่วย</th>
                 <th>จำนวนสุทธิ</th>
               <!--   <th colspan="2" width="10">จัดการ</th> -->
               </tr>
             </thead>
             <tbody>
             <?php $unitprice=0; $amoun=0; $tot=0; ?>
                 <?php   $n =1; foreach ($resi as $val) { ?>
               <tr>
                <th scope="row"><?php echo $n;?></th>
                 <td><?php echo substr($val->pettycashi_costcode,10); ?></td>
                 <td><?php echo $val->pettycashi_expens; ?></td>
                 <td><?php echo $val->pettycashi_vender; ?></td>
                 <td><?php echo number_format($val->pettycashi_amount,2);?></td>
                 <td><?php echo $val->pettycashi_unitprice;?></td>
                 <td><?php echo $val->pettycashi_unit;?></td>
                 <td><?php echo number_format($val->pettycashi_netamt,2);?></td>
               <!--   <td>
                   <button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->pettycashi_id; ?>">แก้ไข</button></td>
                   <td><button class="del<?php echo $val->pettycashi_id;?> btn btn-xs btn-block btn-danger">ลบ</button>
                   </td> -->
               </tr>

                 <?php $n++;

                  $unitprice= $unitprice+$val->pettycashi_unitprice;
                        $amoun = $amoun+$val->pettycashi_amount;
                        $tot= $tot+$val->pettycashi_netamt;


                  } ?>
                        <tr>
                          <td colspan="4" align="center">รวม</td>
                          <td><?php echo number_format($amoun,2); ?></td>
                          <td colspan="2"></td>
                          <td><?php echo number_format($tot,2); ?></td>
                         <!--  <td colspan="2"></td> -->
                        </tr>

             </tbody>
           </table>