<div id="loadbox1">
  
</div>
<div class="panel panel-primary">
	<div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายะเอียดวัสดุ</span></div>
          <table class="table table-striped" >
             <thead>
               <tr>
                 <th width="5%">No.</th>
                 <th width="auto">ชื่อสินค้า</th>
                 <th width="auto">ต้นทุน</th>
                 <th width="5%">ปริมาณ</th>
                 <th width="auto">รับแล้ว</th>
                 <th width="auto">คงเหลือ</th>
                 <th width="15%">จัดการ</th>
               </tr>
             </thead>
             <tbody>
                 <?php    $n =1; foreach ($resi as $val) { ?>
               <tr>
                <th scope="row"><?php echo $n;?></th>
                 <td><?php echo $val->poi_matname; ?></td>
                 <td><?php echo $val->poi_costname ?></td>
                 <td><?php echo $val->poi_qty; ?></td>
                 <td><?php if($val->poi_receive == "0"){ echo "0";}else{$num = $val->poi_qty-$val->poi_receive; $numrec = $val->poi_qty-$num; echo $numrec;}?></td>
                 <td><?php if($val->poi_receive == "0"){ echo "0";}else{$num = $val->poi_qty-$val->poi_receive; echo $num;}   ?></td>
                <?php $qty = $val->poi_qty;
                       $rece = $val->poi_receive;
                       $total = $qty-$rece;
                       if ($total=="0") {?>
                        <td><p style="color:#228b22;"><span class="label label-success">รับสินค้าครบแล้ว</span></p></td>
                    <?php }else {?>
                    <td>
                      <button id="refee" class="bnt btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->poi_id;?>">รับสินค้า</button></td>
                   </td>
                  <?php } ?>
               </tr>
                 <?php $n++; } ?>
             </tbody>
           </table>
      </div>

<?php  $n =1; foreach ($resi as $val2) { ?>
<div class="modal fade" id="modaleditdetail<?php echo $val2->poi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background:#00008b; color:#fff;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">รับสินค้ารายการ <?php echo $val2->poi_matname; ?> <?php echo $val2->poi_ref; ?></h4>
            </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <p>Material Name: <?php echo $val2->poi_matname; ?></p>
                      <br>
                      <p>จำนวนที่สั่งซื้อ: <?php echo $val2->poi_qty; ?></p>
                      <p>จำนวนคงค้าง: <?php if($val2->poi_receive == "0"){ echo $val2->poi_qty;}else{$num = $val2->poi_qty-$val2->poi_receive; echo $num;}   ?></p>
                      <p>จำนวนที่รับแล้ว: <?php if($val2->poi_receive == "0"){ echo "0";}else{$num = $val2->poi_qty-$val2->poi_receive; $numrec = $val2->poi_qty-$num; echo $numrec;}?></p>
                    </div>
                  </div>
                   <div class="col-md-6">
                        <strong><p>จำนวนที่รับสินค้า</p></strong>
                        <input type="text" class="on form-control input-sm" id="remark<?php echo $val2->poi_id; ?>">
                        <input type="text" id="id<?php echo $val2->poi_id; ?>" value="<?php echo $val2->poi_id; ?>">
                        <input type="text" id="ref<?php echo $val2->poi_id; ?>" value="<?php echo $val2->poi_ref; ?>">
                        <button id="sitem<?php echo $val2->poi_id;?>" data-dismiss="modal" class="btnsend btn btn-primary btn-xs" style="margin-top:10px;">รับสินค้า</button>
                    </div>
                </div>
              </div>
               <div class="modal-footer">
                  <button type="button" class="btnclose btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
              </div>
          </div>
        </div>
      </div>
       <script>
  $("#sitem<?php echo $val2->poi_id;?>").click(function(){
    if (<?php echo $val2->poi_receive; ?>=="0") {


      if (<?php echo $val2->poi_qty; ?>< $('#remark<?php echo $val2->poi_id; ?>').val()) 
      {
        alert('ไม่สามารถรับสินค้าเกินได้');
      }
      else
      {
        var url="<?php echo base_url(); ?>index.php/office/ins_recevice_poitem";
            var dataSet={
                id:  $('#id<?php echo $val2->poi_id; ?>').val(),
                ref:  $('#ref<?php echo $val2->poi_id; ?>').val(),
                remark: $('#remark<?php echo $val2->poi_id; ?>').val()
                      };
                  $.post(url,dataSet,function(data){
                          var pono = $('#podate').val();
                      $('#loadbox').load('<?php echo base_url();?>index.php/office/service_po_receive_d'+'/'+pono);
                    });
      }
    }
    else
    {
     if((<?php echo $val2->poi_qty; ?>-<?php echo $val2->poi_receive; ?>)<$('#remark<?php echo $val2->poi_id; ?>').val())
     {
      alert('ไม่สามารถรับสินค้าเกินได้');
      }
      else
      {
        var url="<?php echo base_url(); ?>index.php/office/ins_recevice_poitem";
            var dataSet={
                id:  $('#id<?php echo $val2->poi_id; ?>').val(),
                ref:  $('#ref<?php echo $val2->poi_id; ?>').val(),
                remark: $('#remark<?php echo $val2->poi_id; ?>').val()
                      };
                  $.post(url,dataSet,function(data){
                          var pono = $('#podate').val();
                      $('#loadbox').load('<?php echo base_url();?>index.php/office/service_po_receive_d'+'/'+pono);
                    });
     }
    }
  });
  </script>
  <?php $n++; } ?>

 <script>
  // $(document).ready(function() {
    if ($("#poreccode").val()=="") {
       $('.bnt').prop('disabled', true);
     }else
     {
      $('.bnt').prop('disabled', false);
     }
   
  // });
</script>
