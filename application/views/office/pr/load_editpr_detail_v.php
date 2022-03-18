<?php $flag = $this->uri->segment(4);?>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-xxs">
    <thead>
      <tr>
        <th class="text-center">Action</th>
        <th class="text-center">#</th>
        <th class="text-center">Control</th>
        <th class="text-center">Type</th>
        <th class="text-center">Material Code</th>
        <th class="text-center">Material Name</th>
        <th class="text-center">Cost Code</th>
        <th class="text-center">Cost Name</th>
        <th class="text-center">Qty</th>
        <th class="text-center">Unit</th>
        <th class="text-center">Date</th>
       
      </tr>
    </thead>
    <tbody id="body">

      <?php $n=1; foreach ($resi as $vai) {?>
      <?php $boqq = $this->db->query("select * from boq_cost where boq_code='$tdn' and boq_mcode='$vai->pri_matcode'")->result();
      $qty = 0;
      $control_qty = 0;
      foreach ($boqq as $q) {
      $control_qty = $q->control_qty;
      $qty = $qty+$q->qty;
      }
      ?>
      <tr>
          <td class="text-center">
          <ul class="icons-list">
            <li><a data-popup="tooltip" data-toggle="modal" data-target="#Edit_modal<?php echo $vai->pri_id;?>" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
            <li><a id="delete<?php echo $vai->pri_id;?>" class="preload" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
          </ul>
        </td>
        <td><?php echo $n; ?> </td>
        <td class="text-center">
          <?php
          if($control_qty==0){
          echo '<input type="checkbox"  disabled="disabled" value="0">';
          }else if($control_qty==1){
          echo '<input type="checkbox" checked="checked" disabled="disabled" value="1">';
          }
          ?>
        </td>
        <td><?php if($vai->boq_type=='0'){ echo "<label class='label label-warning'>Not Select BOQ</label>";}elseif($vai->boq_type=='1'){echo "<label class='label label-success'>Material</label>";}elseif($vai->boq_type=='2'){echo "<label class='label label-warning'>Labor</label>";}?></td>
        <td><?php echo $vai->pri_matcode; ?><input type="hidden" name="matcodei[]" value="<?php echo $vai->pri_matcode; ?>" /></td>
        <td><?php echo $vai->pri_matname; ?><input type="hidden" name="matnamei[]" value="<?php echo $vai->pri_matname; ?>" /></td>
        <td><?php echo $vai->pri_costcode; ?><input type="hidden" name="costcodei[]" value="<?php echo $vai->pri_costcode; ?>" /></td>
        <td><?php echo $vai->pri_costname; ?><input type="hidden" name="costnamei[]" value="<?php echo $vai->pri_costname; ?>" /></td>
        <td class="text-right"><?php echo number_format($vai->pri_qty,2); ?><input type="hidden" name="qtyi[]" value="<?php echo number_format($vai->pri_qty,2); ?>" /></td>
        <td class="text-right"><?php echo $vai->pri_unit; ?><input type="hidden" name="uniti[]" value="<?php echo $vai->pri_unit; ?>" /><input type="hidden" name="uniticode[]" value="<?php echo $vai->pri_unitcode; ?>" /></td>
        <td><?php echo $vai->datesend; ?><input type="hidden" name="datesend[]" value="<?php echo $vai->datesend; ?>" /> </td>
      
      </tr>

      <div id="Edit_modal<?php echo $vai->pri_id;?>" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div class="modal-header bg-info">
              <span class="close" data-dismiss="modal">&times;</span>
              <h5 class="modal-title">Edit Item: <?php echo $vai->pri_id;?> - <?php echo $vai->pri_matname; ?></h5>
            </div>
           <!--  modal -->
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-6"><!-- col-xs-6 -->
                  <label for="">รายการซื้อ  <?php
          if($control_qty==0){
          echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</button>';
          }else if($control_qty==1){
          echo '<button class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</button>';
          }
          ?>
                    
                  </label>
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
                    <input type="text" id="newmatname<?php echo $vai->pri_id;?>" disabled="true" placeholder="เลือกรายการซื้อ" class="matname<?php echo $n;?> form-control" value="<?php echo $vai->pri_matname; ?>">
                    <input type="text" id="newmatcode<?php echo $vai->pri_id;?>" disabled="true" placeholder="เลือกรายการซื้อ" class="form-control" value="<?php echo $vai->pri_matcode; ?>">
                      <span class="input-group-btn" >
                        <button type="button" class="openun<?php echo $vai->pri_id;?> btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#opnewmat<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                        <button type="button" class="openuns btn btn-primary" data-toggle="modal" data-target="#ppoen<?php echo $vai->pri_id; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                      </span>
                    </div>
                </div><!-- col-xs-6 -->

                  <script>
                  $('#chk<?php echo $n;?>').click(function(event) {
                    if($('#chk<?php echo $n;?>').prop('checked')) {
                        $('.matname<?php echo $n;?>').prop('disabled', false);
                    } else {
                        $('.matname<?php echo $n;?>').prop('disabled', true);
                    }
                  });
                  </script>
                  <div class="col-xs-6">
                    <label for="">รายการต้นทุน</label>
                    <div class="input-group">
                      <input type="text" id="costname<?php echo $vai->pri_id;?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="<?php echo $vai->pri_costname; ?>">
                      <input type="text" id="codecostcode<?php echo $vai->pri_id;?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="<?php echo $vai->pri_costcode; ?>">
                      <span class="input-group-btn" >
                        <button class="costbtn<?php echo $vai->pri_id;?> btn btn-info btn-sm" id="selectcostcode<?php echo $vai->pri_id;?>" data-toggle="modal" data-target="#costcode<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                      </span>
                    </div>
                  </div>
                </div><!-- row -->
                <div class="row">
                 <div class="col-xs-6">
                    <div class="form-group">
                      <label for="qty">Remark mat</label>
                      <input type="text" id="remark_mat<?php echo $vai->pri_id;?>"  class="form-control text-right"  value="<?php echo $vai->remark_mat; ?>">
                      
                    </div>
                  </div>
                 
                  </div>
                     <div class="row">
                      <hr>
                     </div>
                  <div class="row">
                     <div class="col-xs-3">
                    <div class="form-group">
                      <label for="qty">ปริมาณ</label>
                      <input type="number" id="qtyf<?php echo $vai->pri_id;?>" placeholder="กรอกปริมาณ" class="form-control text-right"  value="<?php echo $vai->pri_qty; ?>">
                      <input type="hidden" id="sumqtyf<?php echo $vai->pri_id;?>" placeholder="กรอกปริมาณ" class="form-control"  value="<?php echo $vai->pri_qty; ?>">
                    </div>
                  </div>

                  <?php
                    $this->db->select('*,SUM(pri_qty) as qtyi');
                    $this->db->from('pr_item');
                    $this->db->join('pr','pr.pr_prno = pr_item.pri_ref');
                    $this->db->where('pr_project',$pj);
                    $this->db->where('pri_matcode',$vai->pri_matcode);
                    $pr = $this->db->get()->result(); 
                    $qtyi = 0;
                    foreach ($pr as $key) {
                      $qtyi = $key->qtyi;
                    }
                    ?>
                  <div class="col-xs-3" >
                    <div class="form-group">
                      <label for="qty">Qty Control 
                        <button class="in label label-info">Qty Used : <?php echo number_format($qtyi,2); ?></button></label>
                      <input type="number" id="qtybalance<?php echo $vai->pri_id;?>" placeholder="ไม่มีใน BOQ" class="form-control text-right"  
                      value="<?php echo $qty-$qtyi; ?>" readonly />
                    </div>
                  </div>

                </div>


                 
                <!-- row -->
                <div class="row">
                 <div class="col-xs-3">
                    <label for="unit">หน่วย</label>
                    <div class="form-group">
                      
                      <input type="hidden" id="unitcode<?php echo $vai->pri_id;?>" readonly="true" placeholder="กรอกหน่วย" class="form-control" value="<?php echo $vai->pri_unitcode; ?>">
                      <input type="text" id="unit<?php echo $vai->pri_id;?>" readonly="true" placeholder="กรอกหน่วย" class="form-control" value="<?php echo $vai->pri_unit; ?>">
                        <span class="input-group-btn" >
                        <button class="openunit<?php echo $vai->pri_id;?> btn btn-info btn-sm" data-toggle="modal" data-target="#openunit<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="qty">แปลงค่า IC</label>
                      <input type="number" id="cpqtyic<?php echo $vai->pri_id;?>" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="<?php echo $vai->pri_cpqtyic; ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="qty">ปริมาณ IC</label>
                      <input type="number" id="pqtyic<?php echo $vai->pri_id;?>" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="<?php echo $vai->pri_pqtyic; ?>">
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="input-group">
                      <label for="unit">หน่วย IC</label>
                      <input type="hidden" id="puniticcode<?php echo $vai->pri_id;?>" name="puniticcode" readonly="true"  class="form-control " value="<?php echo $vai->pri_uniticcode; ?>">
                      <input type="text" id="punitic<?php echo $vai->pri_id;?>" name="punitic" readonly="true"  class="form-control " value="<?php echo $vai->pri_punitic; ?>">
                      
                    </div>
                  </div>
                </div><!-- row -->
              
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="price_unit">ราคา/หน่วย</label>
                      <input type="text" id="pprice_unit<?php echo $vai->pri_id;?>"  name="pri_priceunit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg text-right" value="<?php echo $vai->pri_priceunit; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="amount">จำนวนเงิน</label>
                      <input type="text" id="pamount<?php echo $vai->pri_id;?>" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="<?php echo $vai->pri_amount; ?>">
                    </div>
                  </div>
                </div><!-- row -->


                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="endtproject">ส่วนลด 1 (%)</label>
                      <input type="text" id="pdiscper1<?php echo $vai->pri_id;?>" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right" value="<?php echo $vai->pri_discountper1; ?>"/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="endtproject">ส่วนลด 2 (%)</label>
                      <input type="text" id="pdiscper2<?php echo $vai->pri_id;?>" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right" value="<?php echo $vai->pri_discountper2; ?>" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="endtproject">ส่วนลด 3 (%)</label>
                      <input type="text" id="pdiscper3<?php echo $vai->pri_id;?>" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right" value="<?php echo $vai->pri_discountper3; ?>"/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="endtproject">ส่วนลด 4 (%)</label>
                      <input type="text" id="pdiscper4<?php echo $vai->pri_id;?>" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right" value="<?php echo $vai->pri_discountper4; ?>" />
                    </div>
                  </div>
                </div> <!-- row -->


                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="endtproject">ส่วนลดพิเศษ</label>
                      <input type="text" id="pdiscex<?php echo $vai->pri_id;?>" name="discountper2" class="form-control text-right" value="<?php echo $vai->pri_pdiscex; ?>"/>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                      <input type="text" id="pdisamt<?php echo $vai->pri_id;?>" name="disamt" class="form-control text-right" value="<?php echo number_format($vai->pri_disamt,2); ?>"/>
                      <input type="hidden" id="pvat<?php echo $vai->pri_id;?>" value="0">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <a id="chkprice<?php echo $vai->pri_id;?>" class="btn btn-primary" style="margin-top:25px;">ดูราคา</a> -->
                    </div>
                  </div>
                </div> <!-- row -->


                <div class="row">
                  <div class="col-md-2">
                    <label>VAT:</label>
                    <div class="input-group">
                      <input type="text" class="form-control text-center" id="vatper<?php echo $vai->pri_id;?>" name="vatper" placeholder="7%" value="<?php echo number_format($vai->pri_vat); ?>">
                      <span class="input-group-addon">%</span>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="endtproject">vat</label>
                      <input type="text" id="to_vat<?php echo $vai->pri_id;?>" name="to_vat" class="form-control" value="<?php echo number_format($vai->pri_tovat,2);?>"/>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="endtproject">จำนวนเงินสุทธิ</label>
                      <input type="text" id="pnetamt<?php echo $vai->pri_id;?>" name="netamt" class="form-control" value="<?php echo number_format($vai->pri_netamt,2); ?>"/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="form-group">
                        <label for="qty">วันที่ส่ง</label>
                        <input type="date" id="datesend<?php echo $vai->pri_id;?>"  class="form-control"  value="<?php echo $vai->datesend; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-6">
                      <label for="">Ref. Asset Code</label>
                      <div class="input-group">
                        <input type="text" id="accode<?php echo $vai->pri_id;?>" name="accode"  readonly="true"  class="form-control input-sm" value="<?php echo $vai->pr_assetid;?>">
                        <input type="text" id="acname<?php echo $vai->pri_id;?>" name="acname" readonly="true"  class="form-control input-sm" value='<?php echo $vai->pr_assetname;?>'>
                        <input type="hidden" id="statusass" name="statusass" readonly="true"  class="form-control input-sm" value="<?php echo $vai->pr_asset;?>">
                        <span class="input-group-btn" >
                          <button class="refassett<?php echo $vai->pri_id;?> btn btn-info btn-sm"  data-toggle="modal" data-target="#refass<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                        </span>
                      </div>
                    </div>                  
                    <div class="col-xs-6">
                      <div class="form-group">
                        <label for="endtproject">หมายเหตุ</label>
                        <input type="text" id="remarkite<?php echo $vai->pri_id;?>" class="form-control" value="<?php echo $vai->pri_remark; ?>"/>
                      </div>
                    </div>
                  </div>
                </div><!-- row -->


                <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="button"  id="edittorow<?php echo $vai->pri_id;?>" class="boxmessage btn btn-info">Edit Row</button>
                </div>
              </div>
            </div>
          </div>
          </div>
           <!-- modal เลือกหน่วย -->
            <div class="modal fade" id="openunit<?php echo $vai->pri_id;?>"  data-backdrop="false">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เลือกหน่วย<?php echo $vai->pri_id;?></h4>
                  </div>
                  <div class="panel-body">
                    <div id="getunit<?php echo $vai->pri_id;?>" class="row">
                    
                    </div>
                  </div>
                </div>
              </div>
            </div> <!--end modal -->
            <script>
            $('.openunit<?php echo $vai->pri_id;?>').click(function(){
                $('#getunit<?php echo $vai->pri_id;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                $("#getunit<?php echo $vai->pri_id;?>").load('<?php echo base_url(); ?>pr/getloadunit/'+<?php echo $vai->pri_id;?>);
            });
          </script>

         <!--  modal  -->
          <div class="modal fade" id="refass<?php echo $vai->pri_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
                </div>
                <div class="modal-body">
                  <div class="row" id="refasscodex<?php echo $vai->pri_id;?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  modal  -->
          <script>
            $('.refassett<?php echo $vai->pri_id;?>').click(function(){
                $('#refasscodex<?php echo $vai->pri_id;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                $("#refasscodex<?php echo $vai->pri_id;?>").load('<?php echo base_url(); ?>share/modalshare_asset/'+<?php echo $vai->pri_id;?>);
            });
          </script>

            <div id="opnewmat<?php echo $vai->pri_id;?>" class="modal fade">
              <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                  <div class="modal-header bg-info">
                    <span  class="close" data-dismiss="modal"  Mymodal="opnewmat<?php echo $vai->pri_id;?>" >&times;</span>
                    <h5 class="modal-title">เพิ่มรายการ</h5>
                  </div>
                  <div class="modal-body">
                    <div class="matcodeta<?php echo $vai->pri_id;?>"></div>
                  </div>
                </div>
              </div> <!-- matcode-->
            </div>
 
            <script>
            $(".openun<?php echo $vai->pri_id;?>").click(function(){
                $(".matcodeta<?php echo $vai->pri_id;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            // $(".matcodeta<?php echo $vai->pri_id;?>").load("<?php echo base_url();?>share/getmatcode/<?php echo $vai->pri_id;?>");
                $(".matcodeta<?php echo $vai->pri_id;?>").load('<?php echo base_url(); ?>index.php/share/material_id/'+<?php echo $vai->pri_id;?>);
            });
            </script>
            
            <div id="costcode<?php echo $vai->pri_id;?>" class="modal fade">
              <div class="modal-dialog modal-full">
                <div class="modal-content ">
                  <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">เพิ่มรายการ</h5>
                  </div>
                  <div class="modal-body">
                    <div class="costcodeta<?php echo $vai->pri_id;?>">
                    </div>
                  </div>
                </div>
              </div> <!-- matcode-->
            </div>
              <script>
                  $(".costbtn<?php echo $vai->pri_id;?>").click(function(){
                      $(".costcodeta<?php echo $vai->pri_id;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                      $(".costcodeta<?php echo $vai->pri_id;?>").load('<?php echo base_url(); ?>index.php/share/costcode_id/<?php echo $n; ?>/<?php echo $vai->pri_id;?>');
                  });
              </script>
               


              <script>
              $(document).on('click', '#delete<?php echo $vai->pri_id;?>', function () { // <-- changes
              var url="<?php echo base_url(); ?>index.php/office/delprdetail/<?php echo $vai->pri_ref;?>/<?=$pj;?>";
              var dataSet={
              id: <?php echo $vai->pri_id;?>,
              pri_boqid : "<?php echo $vai->pri_boqid;?>",
              pri_qty : "<?php echo $vai->pri_qty; ?>",
              pri_boqrow : "<?php echo $vai->pri_boqrow; ?>",
              allboq : "",
              };
              $.post(url,dataSet,function(data){
                console.log($.trim(data));
              setTimeout(function() {
              window.location.href = "<?php echo base_url(); ?>index.php/pr/editpr/"+$.trim(data)+"/<?php echo $flag; ?>/<?=$pj;?>";
              }, 1000);
              });
              });
              </script>
              <script>
              $('#edittorow<?php echo $vai->pri_id;?>').click(function(event) {
              if ($("#cpqtyic<?php echo $vai->pri_id;?>").val()=="") {
              swal({
              title: "กรุณากรอกแปลงค่า IC!!.",
              text: "",
              confirmButtonColor: "#EA1923",
              type: "error"
              });
              }else{
                
              var url="<?php echo base_url(); ?>index.php/pr_active/edt_prdetail/<?php echo $vai->pri_id;?>";
              var dataSet={
              id: <?php echo $vai->pri_id;?>,
              ref: "<?php echo $vai->pri_ref; ?>",
              pjid: "<?=$pj;?>",
              matcode: $("#newmatcode<?php echo $vai->pri_id;?>").val(),
              matname: $('#newmatname<?php echo $vai->pri_id;?>').val(),
              cname:  $('#costname<?php echo $vai->pri_id;?>').val(),
              ccode:  $('#codecostcode<?php echo $vai->pri_id;?>').val(),
              qty: $("#qtyf<?php echo $vai->pri_id;?>").val(),
              unit: $("#unit<?php echo $vai->pri_id;?>").val(),
              unitcode: $("#unitcode<?php echo $vai->pri_id;?>").val(),
              uniticcode: $("#puniticcode<?php echo $vai->pri_id;?>").val(),
              datesend: $("#datesend<?php echo $vai->pri_id;?>").val(),
              remark: $("#remarkite<?php echo $vai->pri_id;?>").val(),
              accode: $("#accode<?php echo $vai->pri_id;?>").val(),
              acname: $("#acname<?php echo $vai->pri_id;?>").val(),
              statusass: $("#statusass<?php echo $vai->pri_id;?>").val(),
              cpqtyic: $("#cpqtyic<?php echo $vai->pri_id;?>").val(),
              pqtyic: $('#pqtyic<?php echo $vai->pri_id;?>').val(),
              punitic: $('#punitic<?php echo $vai->pri_id;?>').val(),
              pprice_unit: $('#pprice_unit<?php echo $vai->pri_id;?>').val(),
              pamount: $("#pamount<?php echo $vai->pri_id;?>").val(),
              pdiscper1: $("#pdiscper1<?php echo $vai->pri_id;?>").val(),
              pdiscper2: $("#pdiscper2<?php echo $vai->pri_id;?>").val(),
              pdiscper3: $("#pdiscper3<?php echo $vai->pri_id;?>").val(),
              pdiscper4: $("#pdiscper4<?php echo $vai->pri_id;?>").val(),
              pdiscex: $("#pdiscex<?php echo $vai->pri_id;?>").val(),
              pdisamt: $("#pdisamt<?php echo $vai->pri_id;?>").val(),
              vatper: $("#vatper<?php echo $vai->pri_id;?>").val(),
              to_vat: $("#to_vat<?php echo $vai->pri_id;?>").val(),
              pnetamt: $("#pnetamt<?php echo $vai->pri_id;?>").val(),
              pri_boqid: "<?php echo $vai->pri_boqid; ?>",
              pri_boqrow: "<?php echo $vai->pri_boqrow; ?>",
              sumqtyf: $("#sumqtyf<?php echo $vai->pri_id;?>").val(),
              qtybalancee: $("#qtybalancee<?php echo $vai->pri_id;?>").val(),
              remark_mat : $("#remark_mat<?php echo $vai->pri_id;?>").val(),
              
              };
              $.post(url,dataSet,function(data){
                console.log($.trim(data));
              setTimeout(function() {
              window.location.href = "<?php echo base_url(); ?>index.php/pr/editpr/"+$.trim(data)+"/<?php echo $flag; ?>/<?=$pj;?>";
              }, 1000);
              });
              }
              });


              $("#qtyf<?php echo $vai->pri_id; ?>, #cpqtyic<?php echo $vai->pri_id; ?>,#price_unit<?php echo $vai->pri_id; ?>,#pprice_unit<?php echo $vai->pri_id; ?>,#pdiscper1<?php echo $vai->pri_id; ?>,#pdiscper2<?php echo $vai->pri_id; ?>,#pdiscper3<?php echo $vai->pri_id; ?>,#pdiscper4<?php echo $vai->pri_id; ?>,#pdiscex<?php echo $vai->pri_id; ?>").keyup(function(){
              
              var xqty = ($("#qtyf<?php echo $vai->pri_id; ?>").val().replace(/,/g,"")*1);
              var xprice = ($("#pprice_unit<?php echo $vai->pri_id; ?>").val().replace(/,/g,"")*1);
              var xamount = xqty*xprice;
              
              var xdiscper1 = ($("#pdiscper1<?php echo $vai->pri_id; ?>").val().replace(/,/g,"")*1);
              var xdiscper2 = ($("#pdiscper2<?php echo $vai->pri_id; ?>").val().replace(/,/g,"")*1);
              var xdiscper3 = ($("#pdiscper3<?php echo $vai->pri_id; ?>").val().replace(/,/g,"")*1);
              var xdiscper4 = ($("#pdiscper4<?php echo $vai->pri_id; ?>").val().replace(/,/g,"")*1);
              var xdiscper5 = ($("#pdiscex<?php echo $vai->pri_id; ?>").val().replace(/,/g,"")*1);
              var xvatt = parseFloat($("#vatper<?php echo $vai->pri_id; ?>").val());
              var xpd1 = xamount - (xamount*xdiscper1)/100;
              var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
              var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
              var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
              var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
              var total_di = xamount-xpd4;
              var xvat = parseFloat($("#vatper<?php echo $vai->pri_id; ?>").val().replace(/,/g,"")*1);
              $("#pamount<?php echo $vai->pri_id; ?>").val(numberWithCommas(xamount));
              $("#too_di<?php echo $vai->pri_id; ?>").val(total_di);
              $("#to_vat<?php echo $vai->pri_id; ?>").val(numberWithCommas(xpd8));
              $("#tot_vat<?php echo $vai->pri_id; ?>").val(numberWithCommas(xpd8));
              if(xdiscper5 != 0){
              vxpd4 = xpd4-xdiscper5;
              $("#pdisamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(vxpd4));
              $("#too_di<?php echo $vai->pri_id; ?>").val(vxpd4);
              vxpd5 = (xpd4-xdiscper5) + xpd8;
              $("#pnetamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(vxpd5));
              }
              else if(xdiscper2 != 0){
              $("#pdisamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(xpd4));
              $("#too_di<?php echo $vai->pri_id; ?>").val(xpd4);
              vxpd2 = xpd4 + xpd8;
              $("#pnetamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(vxpd2));
              }
              else if(xdiscper3 != 0){
              $("#pdisamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(xpd4));
              $("#too_di<?php echo $vai->pri_id; ?>").val(xpd4);
              vxpd3 = xpd4 + xpd8;
              $("#pnetamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(vxpd3));
              }
              else if(xdiscper4 != 0){
              $("#pdisamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(xpd4));
              $("#too_di<?php echo $vai->pri_id; ?>").val(xpd4);
              vxpd5 = xpd4 + xpd8;
              $("#pnetamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(vxpd5));
              }
              else{
              $("#pdisamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(xpd1));
              $("#too_di<?php echo $vai->pri_id; ?>").val(xpd1);
              vxpd1 = xpd4 + xpd8;
              $("#pnetamt<?php echo $vai->pri_id; ?>").val(numberWithCommas(vxpd1));
              }
              });
              


              </script>

               <script>
                $('#qtyf<?php echo $vai->pri_id; ?>').keyup(function(){
                  var control_qty = "<?php echo $control_qty; ?>";
                  if(control_qty=="1"){
                  var qty = $("#qtyf<?php echo $vai->pri_id; ?>").val();
                  var storetotol = $("#qtybalance<?php echo $vai->pri_id; ?>").val();
                  if (parseFloat(storetotol) < parseFloat(qty)) {
                  swal({
                    title: "รายการมากกว่าใน BOQ.",
                    text: "",
                    confirmButtonColor: "#EA1923",
                    type: "error"
                });
                    
                    $("#qtyf<?php echo $vai->pri_id; ?>").val('<?php echo $vai->pri_qty; ?>');
                    $("#qtyf<?php echo $vai->pri_id; ?>").select();
                    
                  }
                  }
                });
                </script>

              <div id="ppoen<?php echo $vai->pri_id; ?>" class="modal fade">
                <div class="modal-dialog modal-full">
                  <div class="modal-content ">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h5 class="modal-title">เพิ่มรายการd</h5>
                    </div>
                    <div class="modal-body">
                      <div class="row" id="modal_mats"></div>
                    </div>
                  </div>
                </div>
              </div>

              <script>
              $(".openuns").click(function(){
              var row = ($('#body tr').length-0)+1;
              $("#modal_mats").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_mats").load('<?php echo base_url(); ?>share/getmatcode/'+<?php echo $vai->pri_id; ?>);
              });
              </script>
              

              <?php $n++; } ?>
            </tbody>
          </table>
                </div>
       

        <script>
        $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: '150px',
            targets: [0]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {
                'first': 'First',
                'last': 'Last',
                'next': '&rarr;',
                'previous': '&larr;'
            }
        },
        drawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });
    $('.datatable-basic').DataTable();
        </script>


       