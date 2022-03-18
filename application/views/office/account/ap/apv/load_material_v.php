<div class="table table-responsive">
<table class="table table-xxs">
     <thead>
      <tr>
         <th width="5%" class="text-center">#</th>
         <th width="15%">รหัสสินค้า</th>
         <th width="20%">ชื่อสินค้า</th>
         <th class="text-center" width="10%">ปริมาณ</th>
         <th class="text-center" width="10%">หน่วย</th>
         <th class="text-center" width="10%">ราคา/หน่วย</th>
         <th class="text-center" width="5%">ส่วนลด1(%)</th>
         <th class="text-center" width="5%">ส่วนลด2(%)</th>
         <th class="text-center" width="5%">ส่วนลดพิเศษ(Amt.)</th>
         <th class="text-center" width="5%">ภาษี</th>
         <th class="text-center" width="10%">จำนวนเงิน</th>
       </tr>
     </thead>
     <tbody>
       <?php $n=1; foreach ($poitem as $v) {?>
       <?php
         $this->db->select("*");
         $this->db->from('po_receive');
         $this->db->join("po_recitem","po_recitem.poi_ref=po_receive.po_reccode");
         $this->db->where('po_pono',$v->po_pono);
         $this->db->group_by("po_reccode");
         $g=$this->db->get()->result();

         ?>
       <tr>
         <th class="text-center"><?php echo $n; ?></th>
         <th><div class="input-group"><input type="text" class="form-control input-sm" id="newmatcode<?php echo $n; ?>" name="matcodei[]" value="<?php echo $g->poi_matcode; ?>">
         <div class="input-group-btn"><button type="button" class="openmat<?php echo $n;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#openmat<?php echo $n; ?>"><i class="icon-search4"></i></button></div></div></th>
         <td>
           <input type="hidden" name="costcodei[]" value="<?php echo $v->poi_costcode; ?>">
           <input type="hidden" name="costnamei[]" value="<?php echo $v->poi_costname; ?>">
           <!-- <input type="text" name="matcodei[]" id="newmatcode<?php echo $n; ?>" value="<?php echo $v->poi_matcode; ?>">  -->
           <input type="text" class="form-control input-sm" name="matnamei[]" readonly id="newmatname<?php echo $n;?>" value="<?php echo $g->poi_matname; ?>">
         </td>
         <td class="text-center">
           <input type="text"  class="form-control input-sm" id="qtyi<?php echo $n; ?>" name="qtyi[]" value="<?php echo $v->poi_qty; ?>">
         </td>
         <td>
           <div class="input-group"><input type="text" class="form-control input-sm" id="uniti<?php echo $n; ?>" name="uniti[]" value="<?php echo $v->poi_unit; ?>"><div class="input-group-btn"><button type="button" class="gunit<?php echo $n; ?> btn btn-default btn-sm" data-toggle="modal" data-target="#gunit<?php echo $n; ?>"><i class="icon-search4"></i></button></div></div>
         </td>

         <td class="text-center">
           <input type="text"  class="form-control input-sm" name="priceuniti[]" value="<?php echo $v->poi_priceunit; ?>">
         </td>
         <td class="text-center">
           <input type="text" class="form-control input-sm" name="discount1i[]" value="<?php echo $v->poi_discountper1; ?>">
         </td>
         <td class="text-center">
           <input type="text" class="form-control input-sm" name="discount2i[]" value="<?php echo $v->poi_discountper2; ?>">
         </td>
         <td class="text-center">
           <input type="text" class="form-control input-sm" name="disexi[]" value="<?php echo $v->po_disex; ?>">
         </td>
         <td  class="text-center">
           <input type="text" class="form-control input-sm" name="vatamti[]" value="<?php echo ($v->poi_amount*$v->poi_vat/100); ?>">
           <input type="hidden" name="vatperi[]" value="<?php echo ($v->poi_vat); ?>">
         </td>
         <td class="text-center">
           <input type="text" class="form-control input-sm" readonly name="amounti[]" value="<?php echo $v->poi_netamt; ?>">
         </td>
         <!-- <td>#</td> -->
       </tr>
                <div id="openmat<?php echo $n;?>" class="modal fade" data-backdrop="false">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Select Material</h5>
                      </div>

                      <div class="modal-body">
                        <div class="loadmat<?php echo $n;?>">

                        </div>
                      </div>
                      <div class="modal-footer">
                        <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  $(".openmat<?php echo $n;?>").click(function(){
                    $(".loadmat<?php echo $n;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                    $(".loadmat<?php echo $n;?>").load('<?php echo base_url(); ?>share/material_id/<?php echo $n; ?>');
                  });
                </script>


       <?php $n++;
       $priceunit = $priceunit+$v->poi_priceunit;
        $vat=$vat+($v->poi_amount*$v->poi_vat/100);
        $total=($total+$v->poi_netamt)+($v->poi_amount*$v->poi_vat/100);
        $disamt1 = $disamt1+(($v->poi_amount*$v->poi_discountper1)/100);
        $disamt1tot = $disamt1tot+($v->poi_amount-$disamt1);
        $disamt2 = $disamt2+($disamt1tot*$v->poi_discountper2)/100;
        $disamt2tot = $disamt2tot+($disamt1tot-$disamt2);
        $disamtex = $disamtex+($disamt2tot-$v->po_disex);
       $totamt = $totamt+$v->poi_amount;
       $totnetamt = $totnetamt+$v->poi_netamt;
      } ?>
       <tr>
         <th colspan="10" class="text-center"> Total</th>
         <!-- <th class="text-center"><?php echo number_format($priceunit,2); ?></th>
         <th class="text-center" ><?php echo number_format($vat,2); ?></th> -->
         <!-- <th class="text-center" ><input type="text" class="form-control input-sm" name="totmat" id="totmat" readonly value="<?php echo ($totnetamt); ?>"></th> -->
       </tr>
     </tbody>
   </table>
</div>
