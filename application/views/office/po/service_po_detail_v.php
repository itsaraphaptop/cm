
<div class="panel panel-primary">
	<div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายะเอียดวัสดุ</div>
          <table class="table table-bordered table-striped table-hover" >
             <thead>
               <tr>
                 <th>No.</th>
                 <th width="auto">ชื่อสินค้า</th>
                 <th width="auto">ต้นทุน</th>
                 <th width="5%">ปริมาณ</th>
                 <th width="5%">หน่วย</th>
                 <th width="10%">ราคา/หน่วย</th>
                 <th width="10%">จำนวนเงิน</th>
                 <th width="5%">ส่วนลด</th>

                 <th width="5%">ภาษี</th>
                 <th width="10%">รวมสุทธิ</th>
                 <th colspan="2" width="auto">จัดการ</th>
               </tr>
             </thead>
             <tbody>
               <?php $qt=0; $total = 0; $unitprice = 0; $amount =0; $disamt=0; $vat=0; ?>
                 <?php   $n =1; foreach ($resi as $val) { ?>
               <tr>
                <th scope="row"><?php echo $n;?></th>
                 <td><?php echo $val->poi_matname; ?></td>
                 <td><?php echo $val->poi_costname ?></td>
                 <td><?php echo $val->poi_qty; ?></td>
                 <td><?php echo $val->poi_unit; ?></td>
                 <td><?php echo $val->poi_priceunit; ?></td>
                 <td><?php echo $val->poi_amount; ?></td>
                 <td><?php echo $val->poi_disamt; ?></td>
                 <td><?php echo $val->poi_vat; ?></td>
                 <td><?php echo $val->poi_netamt; ?></td>
                 <td>
                   <button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->poi_id;?>">แก้ไข</button></td>
                   <td><a href="#"><button class="btn btn-xs btn-block btn-danger">ลบ</button></a>
                   </td>
               </tr>
                 <?php
                   $n++;
                   $totq=$qt+$val->poi_qty;
                   $total=$total+$val->poi_netamt;
                   $unitprice=$unitprice+$val->poi_priceunit;
                   $amount=$amount+$val->poi_amount;
                   $vat=$vat+$val->poi_vat;
                   $disamt=$disamt+$val->poi_disamt;
                 } ?>
                 <tr><td colspan="4"><div class='text-center'>รวม</div>  </td>
                   <td><?php echo $totq; ?></td>
                   <td ><?php echo $unitprice; ?></td>
                   <td ><?php echo $amount; ?></td>
                   <td ><?php echo $disamt; ?></td>
                   <td ><?php echo $vat; ?></td>
                   <td ><?php echo $total; ?></td>
                   <td ></td>
                  </tr>
             </tbody>
           </table>
      </div>

<?php foreach ($resi as $val2) {?>
      <!--  MOdal po detail -->
     <div class="modal fade" id="modaleditdetail<?php echo $val2->poi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header" style="background:#00008b; color:#fff;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title" id="myModalLabel">แก้ไขรายการวัสดุ <?php echo $val2->poi_matname; ?></h4>
	</div>
	<div class="modal-body">
		<form action="<?php echo base_url(); ?>office/edit" method="post">
			<!-- <div class="row">
                   <div class="col-xs-6">
                     <div class="form-group">
                         <label for="matname">รายการซื้อ</label><Br>
                         <a data-toggle="modal"    data-target="#gencode" id="vgencode" class="btn  btn-primary">Material Name : <?php echo $val2->poi_matname; ?></a>
                         <input type="hidden" id="matcodeb6" name="matcodeb6e" value="<?php echo $val2->poi_matcode; ?>" placeholder="กรอกรายการซื้อ" class="matcodeb6e form-control">
                         <input type="hidden" id="matname" name="matnamee" placeholder="กรอกรายการซื้อ" value="<?php echo $val2->poi_matname; ?>" class="matnamee form-control">
               </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                         <label for="costname">รายการต้นทุน</label><br>
                         <a data-toggle="modal"  data-target="#costcode" id="gcostcode" class="btn  btn-primary">CostCode : <?php echo $val2->poi_costname; ?></a>
                         <input type="hidden" id="codecostcode" name="codecostcodee" value="<?php echo $val2->poi_costcode; ?>"  placeholder="กรอกรายการต้นทุน" readonly="true" class="codecostcodee form-control">
                         <input type="hidden" id="costname" name="costnamee" value="<?php echo $val2->poi_costname; ?>" placeholder="กรอกรายการต้นทุน" readonly="true" class="costnamee form-control">

                     </div>
                   </div>
               </div> -->
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="qty">ปริมาณ</label>
						<input type="text" id="pqty" name="qtye" value="<?php echo $val2->poi_qty; ?>" placeholder="กรอกปริมาณ" class="qtye form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<label for="unit">หน่วย</label>
						<input type="text" id="punit" name="punite" value="<?php echo $val2->poi_unit; ?>" placeholder="กรอกหน่วย" class="punite form-control input-sm">
						<span class="input-group-btn">
                         <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
						</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="price_unit">ราคา/หน่วย</label>
						<input type="text" id="pprice_unit" name="pprice_unite" value="<?php echo $val2->poi_priceunit; ?>" placeholder="กรอกราคา/หน่วย" class="pprice_unite form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="amount">จำนวนเงิน</label>
						<input type="text" id="pamount" readonly="true" name="pamounte" value="<?php echo $val2->poi_amount; ?>" placeholder="กรอกจำนวนเงิน" class="pamounte form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">

						<label for="endtproject">ส่วนลด 1 (%)</label>
						<input type='text' id="pdiscper1" name="pdiscper1e" value="<?php echo $val2->poi_discountper1; ?>" placeholder="กรอกส่วนลด" class="pdiscper1e form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="endtproject">ส่วนลด 2 (%)</label>
						<input type='text' id="pdiscper2" name="pdiscper2e" value="<?php echo $val2->poi_discountper2; ?>" placeholder="กรอกส่วนลด" class="pdiscper2e form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="endtproject">ส่วนลดพิเศษ</label>
						<input type='text' id="pdiscex" value="<?php echo $val2->po_disex; ?>" name="pdiscexe" class="pdiscexe form-control" />
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
						<input type='text' id="pdisamt" name="pdisamte" value="<?php echo $val2->poi_disamt; ?>" class="pdisamte form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="endtproject">VAT</label>
						<select class="form-control" id="ccvat" name="cvat">
							<?php if($system=='1' ){ ?>
							<option value="1" selected>Include VAT</option>
							<?php } else { ?>
							<option value="1">Include VAT</option>
							<?php }?>
							<?php if($system=='2' ){ ?>
							<option value="2" selected>Exclude VAT</option>
							<?php } else { ?>
							<option value="2">Exclude VAT</option>
							<?php }?>
							<?php if($system=='3' ){ ?>
							<option value="3" selected>Not VAT</option>
							<?php } else { ?>
							<option value="3">Not VAT</option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="endtproject">VAT</label>
						<input type='text' id="pvat" name="pvate" value="<?php echo $val2->poi_vat; ?>" class="pvate form-control" />
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="endtproject">จำนวนเงินสุทธิ</label>

						<input type='text' id="pnetamt" name="pnetamte" value="<?php echo $val2->poi_netamt; ?>" class="pnetamte form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="endtproject">หมายเหตุ</label>

						<input type='text' id="premark" name="premarke" value="<?php echo $val2->poi_remark; ?>" class="premarke form-control" />
					</div>
				</div>
			</div>
<php></php>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="poid form-control" name="poid" value="<?php echo $val2->poi_id; ?>">
						<input type="text" class="pocode form-control" name="pocode" value="<?php echo $val2->poi_ref; ?>">
						<button type="submit" class="btn btn-primary">ยืนยันการแก้ไขข้อมูล</button>
					</div>
				</div>
			</div>


		</form>
	</div>
	<!-- panal body -->
</div>
</div>
</div>
<!-- end modal PO Detail -->
<?php } ?>



