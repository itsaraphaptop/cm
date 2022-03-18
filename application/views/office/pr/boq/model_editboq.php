
<table class="table table-xxs table-hover datatable-basicxcboq" >
<thead>
<tr>

<th class="text-center">Control </th>
<th>Type</th>
<th class="text-center">Mat. Code</th>
<th class="text-center">Mat Name</th>
<th class="text-center">Cost Code</th>
<th class="text-center">Cost Name</th>
<th class="text-center">BOQ</th>
<th class="text-center">PR QTY</th>
<th class="text-center">BOQ Bal.</th>
<th class="text-center">Unit Name</th>
<th width="5%" class="text-center">จัดการ</th>
</tr>
</thead>
<tbody>

<?php $n =1;?>
<?php foreach ($res as $val){ ?>
<?php
  $this->db->select('*');
  $this->db->from('pr_item');
  $this->db->join('pr','pr.pr_prno = pr_item.pri_ref');
  $this->db->where('pr_project',$pj);
  $this->db->where('pri_matcode',$val->boq_mcode);
  $pr = $this->db->get()->result(); 
  $qty = 0;
  foreach ($pr as $key) {
    $qty = $key->pri_qty;
  }
?>
<?php if($val->qty-$qty<=0){ ?>
<!-- <button class="btn btn-xs btn-danger btn-info">Over Qty</button> -->
<?php }else{ ?>
<tr id="a<?php echo $n; ?>" >
<th class="text-center"><?php if($val->control_qty=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">'; }else{ echo '<input type="checkbox"  disabled="disabled">'; } ?> </th>
<th><?php if($val->type=='0'){ echo "<label class='label label-warning'>Not Select BOQ</label>";}elseif($val->type=='1'){echo "<label class='label label-success'>Material</label>";}elseif($val->type=='2'){echo "<label class='label label-warning'>Labor</label>";}?></th>
<th class="text-center"><?php echo $val->boq_mcode; ?></th>
<th class="text-center"><?php echo $val->boq_mname; ?></th>
<th class="text-center"><?php echo $val->costcode; ?></th>
<th class="text-center"><?php echo $val->costname; ?></th>
<th class="text-center"><?php echo $val->qty; ?></th>
<th class="text-center">
  <a data-toggle="modal" data-target="#prboqnon<?php echo $n; ?>"><?php echo number_format($qty); ?></a>
</th>
<th class="text-center"><?php echo number_format($val->qty-$qty,2); ?></th>
<th class="text-center"><?php echo $val->unitname; ?></th>

<th class="text-center">

<button class="btn btn-xs btn-block btn-info" id="boqaddrow" data-toggle="modal" data-target="#boqaddrow<?php echo $val->bd_cost; ?>">เลือก</button>
<?php } ?>
</th>

</tr>

<div id="boqaddrow<?php echo $val->bd_cost; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content ">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">เพิ่มรายการ </h5>
                </div>

                <div class="modal-body">
                <input type="hidden" id="typejob<?php echo $val->bd_cost; ?>" value="<?php echo $val->type;?>">
                        <div class="row">
                          <div class="col-xs-6">
                          <label for="">รายการซื้อ <?php if($val->control_qty=="1"){ echo '<button class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</button>'; }else{ echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</button>'; }
                        ?></label>
                            <div class="input-group">
                            <?php $q = $this->db->query("select valuess from master_checking where keyss='pr_material_check'")->result();
                            foreach ($q as $k) {
                              $cck = $k->valuess;
                            }
                            if ($cck=="Y") {
                             ?>
                            <span class="input-group-addon">
                              <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                            </span>
                            <?php } ?>
                           <input type="text" id="newmatname<?php echo $val->bd_cost; ?>" disabled="true" placeholder="Materail Name" class="form-control input-sm" value="<?php echo $val->boq_mname; ?>">
                           <input type="text" id="newmatcode<?php echo $val->bd_cost; ?>" disabled="true" placeholder="Materail Code" class="form-control input-sm" value="<?php echo $val->boq_mcode; ?>">
                                
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <label for="">รายการต้นทุน</label>
                              <div class="input-group">
                            <input type="text" id="costname<?php echo $val->bd_cost; ?>" readonly="true" placeholder="Cost Name" class="form-control input-sm" value="<?php echo $val->costcode; ?>">
                            <input type="text" id="codecostcode<?php echo $val->bd_cost; ?>" readonly="true" placeholder="Cost Code" class="form-control input-sm" value="<?php echo $val->costname; ?>">
                                  
                              </div>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-xs-6">
                                  <div class="form-group">
                                    <label for="qty">Detail Of Materail</label>
                                    <input type="text" id="remark_mat<?php echo $val->bd_cost; ?>"  class="form-control" value="">
                                  </div>
                                </div>       
                                
                              </div>
                             <div class="row">
                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="qty">ปริมาณ</label>
                                        <input type="text" id="qty<?php echo $val->bd_cost; ?>" placeholder="กรอกปริมาณ" class="form-control" pattern="[0-9]+([\.,][0-9]+)*" value="0">
                              </div>
                            </div>
                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="qty">จำนวนใน BOQ</label>
                                        <input type="text" id="qtybalance<?php echo $val->bd_cost; ?>" placeholder="กรอกปริมาณ" class="form-control" value="<?php echo $val->cost-$qty; ?>"  readonly>
                              </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                  <label for="unit">หน่วย</label>
                                  <input type="text" id="unit<?php echo $val->bd_cost; ?>" readonly="true" placeholder="กรอกหน่วย" class="form-control" value="<?php echo $val->unitname; ?>">
                                <span class="input-group-btn" >
                                  <!-- <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button> -->
                                </span>
                              </div>
                            </div>
                        </div>
                         <div class="row">
             <div class="col-md-3">
               <div class="form-group">
                         <label for="qty">แปลงค่า IC</label>
                         <input type="number" id="cpqtyic<?php echo $val->bd_cost; ?>" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="1">
               </div>
             </div>
             <div class="col-md-3">
               <div class="form-group">
                         <label for="qty">ปริมาณ IC</label>
                         <input type="text" id="pqtyic<?php echo $val->bd_cost; ?>" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="1">
               </div>
             </div>
             <div class="col-xs-6">
                               <div class="input-group">
                                 <label for="unit">หน่วย IC</label>
                                 <input type="text" id="punitic<?php echo $val->bd_cost; ?>" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control text-right input-sm" value="<?php echo $val->unitname; ?>">
                               
                             </div>
                           </div>
         </div>
          <div class="row">
             <div class="col-md-6">
               <div class="form-group">
                         <label for="price_unit">ราคา/หน่วย</label>
                         <input type="text" id="pprice_unit<?php echo $val->bd_cost; ?>"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control text-right border-danger border-lg" value="0">
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                         <label for="amount">จำนวนเงิน</label>
                         <input type="text" id="pamount<?php echo $val->bd_cost; ?>" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="0">
               </div>
             </div>
         </div>
          <div class="row">
               <div class="col-md-3">
                 <div class="form-group">

                    <label for="endtproject">ส่วนลด 1 (%)</label>
                    <input type="text" id="pdiscper1<?php echo $val->bd_cost; ?>" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right" value="0"/>
                 </div>
               </div>
                   <div class="col-md-3">
                     <div class="form-group">
                        <label for="endtproject">ส่วนลด 2 (%)</label>
                        <input type="text" id="pdiscper2<?php echo $val->bd_cost; ?>" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right" value="0" />
                     </div>
                   </div>

               <div class="col-md-3">
                 <div class="form-group">

                    <label for="endtproject">ส่วนลด 3 (%)</label>
                    <input type="text" id="pdiscper3<?php echo $val->bd_cost; ?>" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right" value="0"/>
                 </div>
               </div>
                   <div class="col-md-3">
                     <div class="form-group">
                        <label for="endtproject">ส่วนลด 4 (%)</label>
                        <input type="text" id="pdiscper4<?php echo $val->bd_cost; ?>" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right" value="0" />
                     </div>
                   </div>
         </div>
           <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                  <label for="endtproject">ส่วนลดพิเศษ</label>
                  <input type="number" id="pdiscex<?php echo $val->bd_cost; ?>" name="discountper2" class="form-control text-right" value="0" />
                 </div>
             </div>
             <div class="col-md-4">
                   <div class="form-group">
                    <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                    <input type="text" id="pdisamt<?php echo $val->bd_cost; ?>" name="disamt" class="form-control text-right" value="0" readonly="" />
                    <input type="hidden" id="pvat<?php echo $val->bd_cost; ?>" value="0">
                   </div>
             </div>
             <div class="col-md-2">
         <div class="form-group">
             <a id="chkpriceee<?php echo $val->bd_cost; ?>" class="btn btn-primary" style="margin-top:25px;">ดูราคา</a>
         </div>
       </div>
           </div>
           <div class="row">
           <div class="col-md-2">
                    <label>VAT:</label>
                          <div class="input-group">
                            <input type="text" class="form-control text-right" id="vatper<?php echo $val->bd_cost; ?>" name="vatper[]" placeholder="7%" value="7" >
                            <span class="input-group-addon">%</span>
                          </div>
                  </div>
                <div class="col-md-2">
                 <div class="form-group">
                    <label for="endtproject">vat</label>

                    <input type="text" id="to_vat<?php echo $val->bd_cost; ?>" name="to_vat" value="0" class="form-control text-right" readonly="" />
                  </div>
                 </div>
                <div class="col-md-2">
                 <div class="form-group">
                    <label for="endtproject">จำนวนเงินสุทธิ</label>

                    <input type="text" id="pnetamt<?php echo $val->bd_cost; ?>" name="netamt" class="form-control text-right" value="0" readonly=""/>
                  </div>
                 </div>
                        <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                <label for="datesend ">วันที่ส่งของ</label>
                                  <input type="date" class="form-control" id="datesend<?php echo $val->bd_cost; ?>" name="datesend" 
                                  style="width: 200px">
                              </div>
                            </div>


                  <div class="col-xs-6">
                            <label for="">Ref. Asset Code</label>
                              <div class="input-group">
                          <input type="text" id="accode<?php echo $val->bd_cost; ?>" name="accode"  readonly="true"  class="form-control input-sm">
                          <input type="text" id="acname<?php echo $val->bd_cost; ?>" name="acname" readonly="true"  class="form-control input-sm">
                          <input type="hidden" id="statusass<?php echo $val->bd_cost; ?>" name="statusass" readonly="true"  class="form-control input-sm">
                                  <span class="input-group-btn" >
                                    <button class="btn btn-info btn-sm" id="refassett<?php echo $val->bd_cost; ?>" data-toggle="modal" data-target="#refass<?php echo $val->bd_cost; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                  </span>
                              </div>
                            </div>
               

                         <div class="col-xs-6">
                              <div class="form-group">
                                 <label for="endtproject">หมายเหตุ</label>

                                     <textarea rows="2" cols="30" type="text" id="remarkitem<?php echo $val->bd_cost; ?>" class="form-control" value=""></textarea>

                            </div>
                              </div>
                         </div>
                </div>




                <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="button" id="addtorow<?php echo $val->bd_cost; ?>"  class="btn btn-info">Insert</button>
                 
                </div>

              </div>
            </div>
          </div>


<?php $flag = $this->uri->segment(4); ?>
<script>
   $('#addtorow<?php echo $val->bd_cost; ?>').click(function() {

        var prprcode = $('#prno').val();
        if ($("#newmatname<?php echo $val->bd_cost; ?>").val()=="") {
          alert('กรุณาเลือกวัสดุ');
        }else if ($("#qty<?php echo $val->bd_cost; ?>").val()=="") {
            alert('กรุณาใส่จำนวน');
        }else{
        var url="<?php echo base_url(); ?>index.php/office/add_prdetail/<?php echo $val->bd_cost; ?>";
          var dataSet={
            prcode: prprcode,
            matcode: $("#newmatcode<?php echo $val->bd_cost; ?>").val(),
            matname: $('#newmatname<?php echo $val->bd_cost; ?>').val(),
            costname: $('#codecostcode<?php echo $val->bd_cost; ?>').val(),
            codecostcode: $('#costname<?php echo $val->bd_cost; ?>').val(),
            qty: $("#qty<?php echo $val->bd_cost; ?>").val(),
            unit: $("#unit<?php echo $val->bd_cost; ?>").val(),
            datesend: $("#datesend<?php echo $val->bd_cost; ?>").val(),
            remark: $("#remarkitem<?php echo $val->bd_cost; ?>").val(),
            accode: $("#accode<?php echo $val->bd_cost; ?>").val(),
            acname: $("#acname<?php echo $val->bd_cost; ?>").val(),
            statusass: $("#statusass<?php echo $val->bd_cost; ?>").val(),

            cpqtyic: $("#cpqtyic<?php echo $val->bd_cost; ?>").val(),
            pqtyic: $('#pqtyic<?php echo $val->bd_cost; ?>').val(),
            punitic: $('#punitic<?php echo $val->bd_cost; ?>').val(),
            pprice_unit: $('#pprice_unit<?php echo $val->bd_cost; ?>').val(),
            pamount: $("#pamount<?php echo $val->bd_cost; ?>").val(),
            pdiscper1: $("#pdiscper1<?php echo $val->bd_cost; ?>").val(),
            pdiscper2: $("#pdiscper2<?php echo $val->bd_cost; ?>").val(),
            pdiscper3: $("#pdiscper3<?php echo $val->bd_cost; ?>").val(),
            pdiscper4: $("#pdiscper4<?php echo $val->bd_cost; ?>").val(),
            pdiscex: $("#pdiscex<?php echo $val->bd_cost; ?>").val(),
            pdisamt: $("#pdisamt<?php echo $val->bd_cost; ?>").val(),
            vatper: $("#vatper<?php echo $val->bd_cost; ?>").val(),
            to_vat: $("#to_vat<?php echo $val->bd_cost; ?>").val(),
            pnetamt: $("#pnetamt<?php echo $val->bd_cost; ?>").val(),
            remark_mat : $("#remark_mat<?php echo $val->bd_cost; ?>").val(),
            typejob : $("#typejob<?php echo $val->bd_cost; ?>").val(),
            projectid : '<?=$pj?>',
            };
            $.post(url,dataSet,function(data){
              console.log($.trim(data));
              setTimeout(function() {
                window.location.href = "<?php echo base_url(); ?>index.php/pr/editpr/"+$.trim(data)+"/<?php echo $flag; ?>/<?=$pj?>";
              }, 1000);
            });
          }
 });
</script>

<script>

$("#chkpriceee<?php echo $val->bd_cost; ?>").click(function(){
                var xqty = parseFloat($("#qty<?php echo $val->bd_cost; ?>").val());
                var xprice = parseFloat($("#pprice_unit<?php echo $val->bd_cost; ?>").val());
                var xamount = xqty*xprice;
                var xdiscper1 = parseFloat($("#pdiscper1<?php echo $val->bd_cost; ?>").val());
                var xdiscper2 = parseFloat($("#pdiscper2<?php echo $val->bd_cost; ?>").val());
                var xdiscper3 = parseFloat($("#pdiscper3<?php echo $val->bd_cost; ?>").val());
                var xdiscper4 = parseFloat($("#pdiscper4<?php echo $val->bd_cost; ?>").val());
                var xdiscper5 = parseFloat($("#pdiscex").val());
                var xvatt = parseFloat($("#vatper<?php echo $val->bd_cost; ?>").val());
                var xpd1 = xamount - (xamount*xdiscper1)/100;
                var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
                var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
                var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
                var total_di = xamount-xpd4;
                var xvat = parseFloat($("#vatper<?php echo $val->bd_cost; ?>").val());
                $("#pamount<?php echo $val->bd_cost; ?>").val(xamount);
                $("#too_di<?php echo $val->bd_cost; ?>").val(total_di);
                $("#to_vat<?php echo $val->bd_cost; ?>").val(xpd8);
                $("#tot_vat<?php echo $val->bd_cost; ?>").val(xpd8);
                if(xdiscper5 != 0){
                  vxpd4 = xpd4-xdiscper5;
                    $("#pdisamt<?php echo $val->bd_cost; ?>").val(vxpd4);
                    $("#too_di<?php echo $val->bd_cost; ?>").val(vxpd4);
                    vxpd5 = (xpd4-xdiscper5) + xpd8;
                    $("#pnetamt<?php echo $val->bd_cost; ?>").val(vxpd5);
                  }
                  else if(xdiscper2 != 0){
                         $("#pdisamt<?php echo $val->bd_cost; ?>").val(xpd4);
                         $("#too_di<?php echo $val->bd_cost; ?>").val(xpd4);
                         vxpd2 = xpd4 + xpd8;
                         $("#pnetamt<?php echo $val->bd_cost; ?>").val(vxpd2);
                }
                  else if(xdiscper3 != 0){
                         $("#pdisamt<?php echo $val->bd_cost; ?>").val(xpd4);
                         $("#too_di<?php echo $val->bd_cost; ?>").val(xpd4);
                         vxpd3 = xpd4 + xpd8;
                         $("#pnetamt<?php echo $val->bd_cost; ?>").val(vxpd3);
                }
                else if(xdiscper4 != 0){
                         $("#pdisamt<?php echo $val->bd_cost; ?>").val(xpd4);
                         $("#too_di<?php echo $val->bd_cost; ?>").val(xpd4);
                         vxpd5 = xpd4 + xpd8;
                         $("#pnetamt<?php echo $val->bd_cost; ?>").val(vxpd5);
                }
             
                else
                {
                $("#pdisamt<?php echo $val->bd_cost; ?>").val(xpd1);
                $("#too_di<?php echo $val->bd_cost; ?>").val(xpd1);
                    vxpd1 = xpd4 + xpd8;
                    $("#pnetamt<?php echo $val->bd_cost; ?>").val(vxpd1);
                }
              });

  

  $('#qty<?php echo $val->bd_cost; ?>').blur(function(){
    if("<?php echo $val->control_qty; ?>"=="1"){
    var qty = $("#qty<?php echo $val->bd_cost; ?>").val();
    var storetotol = $("#qtybalance<?php echo $val->bd_cost; ?>").val();
    if (parseFloat(storetotol) < parseFloat(qty)) {
    swal({
      title: "รายการมากกว่าใน BOQ.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });

      $("#qty<?php echo $val->bd_cost; ?>").val('0');
      $("#qty<?php echo $val->bd_cost; ?>").select();
    }
    }
  });  
</script>

<div id="refass<?php echo $val->bd_cost; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content ">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Ref. Asset Code </h5>
                </div>
              <div class="modal-body">
            <div class="row" id="refasscodex<?php echo $val->bd_cost; ?>">
             </div>

        </div>
    </div>
  </div>
</div>

<script>
$('#refassett<?php echo $val->bd_cost; ?>').click(function(){
   $('#refasscodex<?php echo $val->bd_cost; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#refasscodex<?php echo $val->bd_cost; ?>").load('<?php echo base_url(); ?>share/modalshare_asset/'+<?php echo $val->bd_cost; ?>);
 });
</script>


<?php $n++; } ?>


</tbody>
</table>
<!-- Core JS files -->

<?php $n=1; foreach ($res as $val){ ?>
<div id="prboqnon<?php echo $n; ?>" class="modal fade" style="display: none;">
      <div class="modal-dialog modal-full">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h5 class="modal-title">BOQ</h5>
          </div>
          <div class="modal-body">
            
            <table class="table table-bordered table-striped table-xxs">
              <thead>
                <tr>
                  <th>#</th>
                  <th>PR No.</th>
                  <th>Material Code</th>
                  <th>Material Name</th>
                  <th>Cost Code</th>
                  <th>Cost Name</th>
                  <th>Qty</th>
                  <th>Unit</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $this->db->select('*');
                $this->db->from('pr_item');
                $this->db->join('pr','pr.pr_prno = pr_item.pri_ref');
                $this->db->where('pr_project',$pj);
                $this->db->where('pri_matcode',$val->boq_mcode);
                $boq = $this->db->get()->result();
                $c=1;
                foreach ($boq as $b) { ?>
                
                <tr>
                  <td><?php echo $c; ?></td>
                  <td><?php echo $b->pri_ref; ?></td>
                  <td><?php echo $b->pri_matcode; ?></td>
                  <td><?php echo $b->pri_matname; ?></td>
                  <td><?php echo $b->pri_costcode; ?></td>
                  <td><?php echo $b->pri_costname; ?></td>
                  <td><?php echo $b->pri_qty; ?></td>
                  <td><?php echo $b->pri_unit; ?></td>
                  <td><?php echo $b->datesend; ?></td>
                  <td class="text-center"><a target="_blank" class="preload" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $b->pri_ref; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></td>
                </tr>
                
                <?php $c++; } ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<?php $n++; } ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxcboq").DataTable();
</script>
