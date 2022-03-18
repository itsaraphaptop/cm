<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
            <th width="auto">ชื่อสินค้า</th>
            <th width="5%">ปริมาณ</th>
            <th width="5%">หน่วย</th>
            <th width="10%">ราคา/หน่วย</th>
            <th width="10%">จำนวนเงิน</th>
            <th width="5%">ภาษี</th>
            <th width="10%">รวมสุทธิ</th>
		</tr>
	</thead>
	<tbody>
               <?php $qt=0; $total = 0; $unitprice = 0; $amount =0; $disamt=0; $vat=0; ?>
                 <?php   $n =1; foreach ($resi as $val) { ?>
               <tr>
                <th scope="row"><?php echo $n;?></th>
                 <td><?php echo $val->poi_matname; ?></td>
                 <td><?php echo $val->poi_qty; ?></td>
                 <td><?php echo $val->poi_unit; ?></td>
                 <td><?php echo number_format($val->poi_priceunit,2); ?></td>
                 <td><?php echo number_format($val->poi_amount,2); ?></td>
                 <td><?php echo number_format(($val->poi_amount*7/100),2); ?></td>
                 <td><?php echo number_format(($val->poi_amount*7/100)+$val->poi_netamt,2); ?></td>
               </tr>
                 <?php
                   $n++;
                   $totq=$qt+$val->poi_qty;
                   
                   $unitprice=$unitprice+$val->poi_priceunit;
                   $amount=$amount+$val->poi_amount;
                   //$vat=($amount*7/100);
                   $vat=$vat+($val->poi_amount*7/100);
                   // $disamt=$disamt+$val->poi_disamt;
                    $total=($total+$val->poi_netamt)+($val->poi_amount*7/100);
                 } ?>
                 <tr class="success" style="color:#009900"><td colspan="2"><div class='text-center'>รวม</div>  </td>                 
                   <td><?php echo $totq; ?></td>
                   <td></td>
                   <td ><?php echo number_format($unitprice,2); ?></td>
                   <td ><?php echo number_format($amount,2); ?></td>
                   <td ><?php echo number_format($vat,2); ?></td>
                   <td ><?php echo number_format($total,2); ?></td>
                  </tr>
             </tbody>
</table>