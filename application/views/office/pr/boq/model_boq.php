<table class="table table-xxs table-hover datatable-basicxcboq" >
<thead>
<tr>
<th class="text-center">No.</th>
<th class="text-center">Mat. Code</th>
<th class="text-center">Mat Name</th>
<th class="text-center">type</th>
<th class="text-center">Cost Code</th>
<th class="text-center">Cost Name</th>
<th class="text-center">Qty</th>
<th class="text-center">PR QTY</th>
<th class="text-center">Qty Bal.</th>
<th class="text-center">Unit Name</th>
<th width="5%" class="text-center">จัดการ</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res as $val){ ?>
<?php
  $this->db->select('SUM(pri_qty) as qty');
  $this->db->from('pr_item');
  $this->db->join('pr','pr.pr_prno = pr_item.pri_ref');
  $this->db->where('pr_project',$pj);
  $this->db->where('pri_status !=','delete');
  $this->db->where('boq_type',$val->type);
  $this->db->where('pri_matcode',$val->boq_mcode);
  $pr = $this->db->get()->result(); 
  $qty = 0;
  foreach ($pr as $key) {
    $qty = $key->qty;
  }
?>
<?php if(($val->qty-$qty)<=0){ ?>

<!-- <button class="btn btn-xs btn-danger btn-info">Over Qty</button> -->
<?php }else{ ?>
<tr id="a<?php echo $n; ?>" >
<td class="text-center"><?php echo $n; ?></td>
<th class="text-center"><?php echo $val->boq_mcode; ?></th>
<th class="text-center"><?php echo $val->boq_mname; ?></th>
<th><?php if($val->type==1){ echo "<label class='label label-info'>Material</label>\n";}elseif($val->type==2){echo "<label class='label label-warning'>Labor</label>\n";}else{echo "<label class='label bg-green'>Subcontractor</label>\n";}?></th>


  <th class="text-center"><?php echo $val->costcode; ?></th>
  <th class="text-center"><?php echo $val->costname; ?></th>
  <th class="text-center"><?php echo $val->qty; ?></th>
  <th class="text-center">
    <a data-toggle="modal" data-target="#prboqnon<?php echo $n; ?>"><?php echo number_format($qty,2); ?></a>
  </th>
  <th class="text-center"><?php echo number_format($val->qty-$qty,2); ?></th>
  <th class="text-center"><?php echo $val->unitname; ?></th>
  <th class="text-center">
    
  <button class="insertopen<?php echo $n; ?> btn btn-xs btn-block btn-info">เลือก</button>
<?php } ?>
</th>
</tr>
<script>


  $(".insertopen<?php echo $n; ?>").click(function(){ 
     $('#chkprdetail').val("1");
    var boq_id = '';
    var boq_mcode = '<?php echo $val->boq_mcode; ?>';
    var boq_mname = '<?php echo trim($val->boq_mname); ?>';
    var boq_boqmat = '';
    var boq_costmat = '<?php echo $val->costcode; ?>'; 
    var boq_costmatname = '<?php echo trim($val->costname); ?>';
    var boq_qty = '<?php echo $val->qty; ?>';
    var boq_prqty = '';
    var boq_ucode = '<?php echo $val->unitcode; ?>';
    var boq_uname = '<?php echo $val->unitname; ?>';
    var boq_balance = '<?php echo $val->qty-$qty; ?>';
    var boq_controlstatus = '<?php echo $val->control_qty; ?>';
    var qtybalancee = '';
    var boq_control = '<?php if($val->control_qty=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">'; }else{ echo '<input type="checkbox"  disabled="disabled">'; } ?>';
    var type = '<?=$val->type;?>';
    var boq_type = '<?php if($val->type=='1'){ echo '<label class="label label-success">Material</label>';}elseif($val->type=='2'){echo '<label class="label label-warning">Labor</label>';}else{echo '<label class="label bg-green">Subcontractor</label>';}?>';
    
    var ckkcontrolbg = $('#ckkcontrolbg').val();
                if(ckkcontrolbg=="2"){
                var chk = 'hidden';
                var chk1 = '';
                }else{
                var chk = '';
                var chk1 = 'hidden';
                }

 	$(this).closest('tr').remove();
    
  if(boq_balance!="0"){
     addrowo(boq_mcode,boq_mname,boq_boqmat,boq_costmat,boq_costmatname,boq_qty,boq_prqty,boq_uname,boq_balance,boq_control,boq_controlstatus,boq_id,qtybalancee,type,chk,chk1,boq_type,boq_ucode);
   }else{
    swal({
      title: "Over BOQ.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
   }
       });

  function addrowo(boq_mcode,boq_mname,boq_boqmat,boq_costmat,boq_costmatname,boq_qty,boq_prqty,boq_uname,boq_balance,boq_control,boq_controlstatus,boq_id,qtybalancee,type,chk,chk1,boq_type,boq_ucode)
            {

 $('#delse').closest('tr').remove();
    var row = ($('#body tr').length-0)+1;
 	var tr = '<tr id="'+row+'">'+
     '<td class="hidden-center">'+
                  '<ul class="icons-list">'+
                  '<input type="hidden" id="chkbo" name="chkbo[]" value="PR" />'+
                   '<li><a data-popup="tooltip" data-toggle="modal" data-target="#edit_modal'+row+'" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>'+
                  '<li><a id="deleterow'+row+'" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
                '</ul>'+

              '</td>'+
               '<td id="trq'+row+'">'+row+'<input type="hidden" id="chkbo" name="chkbo[]" value="boq1" /><input type="hidden" id="chkbowhere" name="chkbowhere[]" value="'+boq_id+'" /><input type="hidden" id="pri_boqrow" name="pri_boqrow[]" value="1" /></td>'+
               '<td id="control'+row+'" class="text-center">'+boq_control+'</td>'+
               '<td>'+boq_type+'<input type="hidden" id="boq_type" name="boq_type[]" value="'+type+'" /></td>'+
               '<td id="trmatcode'+row+'">'+boq_mcode+'<input type="hidden" id="trmatcode'+row+'" name="matcodei[]" value="'+boq_mcode+'" /></td>'+
               '<td id="trmatname'+row+'">'+boq_mname+'<input type="hidden" id="trmatname'+row+'" name="matnamei[]" value="'+boq_mname+'" /></td>'+
               '<td id="tdcostcode'+row+'">'+boq_costmat+'<input type="hidden" id="trcostcode'+row+'" name="costcodei[]" value="'+boq_costmat+'" /></td>'+
               '<td id="tdcostname'+row+'">'+boq_costmatname+'<input type="hidden" id="trcostname'+row+'" name="costnamei[]" value="'+boq_costmatname+'" /></td>'+
               '<td id="trqty'+row+'">'+boq_balance+'<input type="hidden" name="qtyi[]" value="'+boq_balance+'" /></td>'+
               '<td id="trunit'+row+'">'+boq_uname+'<input type="hidden" name="uniti[]" value="'+boq_uname+'" /></td>'+
               '<td id="datesends'+row+'"><input type="hidden" name="datesend[]" value="" /><input type="hidden" name="accode[]" value="" /><input type="hidden" name="acname[]" value="" /><input type="hidden" name="statusass[]" value="" /><input type="hidden" name="cpqtyic[]" value="0" /><input type="hidden" name="pqtyic[]" value="0" /><input type="hidden" name="punitic[]" value="0" /><input type="hidden" name="pprice_unit[]" value="0" /><input type="hidden" name="pamount[]" value="0" /><input type="hidden" name="pdiscper1[]" value="0" /><input type="hidden" name="pdiscper2[]" value="0" /><input type="hidden" name="pdiscper3[]" value="0" /><input type="hidden" name="pdiscper4[]" value="0" /><input type="hidden" name="pdiscex[]" value="0" /><input type="hidden" name="pdisamt[]" value="0" /><input type="hidden" name="vatper[]" value="0" /><input type="hidden" name="to_vat[]" value="0" /><input type="hidden" name="pnetamt[]" value="0" /><input type="hidden" name="remarki[]" value="'+boq_boqmat+'" /><input type="hidden" name="type[]" value="'+type+'" /><input type="hidden" name="remark_mat[]" value="" /></td>'+

            

            '</tr>';
      $('#body').append(tr);

      $(document).on('click', 'a#deleterow'+row+'', function () { // <-- changes
                     // Initialize
                      var self = $(this);
                      noty({
                          width: 200,
                          text: "Do you want to Delete?",
                          type: self.data('type'),
                          dismissQueue: true,
                          timeout: 1000,
                          layout: self.data('layout'),
                          buttons: (self.data('type') != 'confirm') ? false : [
                              {
                              addClass: 'btn btn-primary btn-xs',
                              text: 'Ok',
                              onClick: function ($noty) { //this = button element, $noty = $noty element
                                  $noty.close();
                                  self.closest('tr').remove();
                                  var row = ($('#body tr').length-0);
                                  var rows = ($('#body tr').length-0)+1;
                                  $('#trq'+row).text(rows);
                                    noty({
                                      force: true,
                                      text: 'Deleteted',
                                      type: 'success',
                                      layout: self.data('layout'),
                                      timeout: 1000
                                    });
                                  }
                              },
                              {
                                addClass: 'btn btn-danger btn-xs',
                                text: 'Cancel',
                                onClick: function ($noty) {
                                $noty.close();
                                noty({
                                  force: true,
                                  text: 'You clicked "Cancel" button',
                                  type: 'error',
                                  layout: self.data('layout'),
                                  timeout: 1000
                                });
                                }
                              }
                          ] 
                      });
                      return false;
                    });

      var modal = '<div id="edit_modal'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-lg">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">แก้ไขรายการที่ '+row+'</h5>'+
                '</div>'+

                '<div class="modal-body">'+
                        '<div class="row">'+
                          '<div class="col-xs-6">'+
                          '<label for="">รายการซื้อ</label>'+
                            '<div class="input-group">'+
                           
                             <?php $q = $this->db->query("select valuess from master_checking where keyss='pr_material_check'")->result();
                            foreach ($q as $k) {
                              $cck = $k->valuess;
                            }
                            if ($cck=="Y") {
                             ?>
                             '<span class="input-group-addon">'+
                              '<input type="checkbox" id="chke'+row+'" aria-label="กำหนดเอง">'+
                            '</span>'+
                            <?php } ?>
                              '<input type="text" id="newmatname'+row+'" disabled="true" placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="'+boq_mname+'">'+
                              '<input type="text" id="newmatcode'+row+'" readonly="true" placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="'+boq_mcode+'">'+
                               ' <span class="input-group-btn">'+
                               '<a class="openun'+row+' btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmat'+row+'"><i class="icon-search4"></i></a>'+
                               '</span>'+
                               ' <span class="input-group-btn">'+
                               '<a class="poo'+row+' btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmattt'+row+'"><i class="icon-search4"></i></a>'+
                              
                               '</span>'+
                            '</div>'+
                          '</div>'+
                          '<div class="col-xs-6">'+
                            '<label for="">รายการต้นทุน</label>'+
                              '<div class="input-group">'+
                                '<input type="text" id="costname'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="'+boq_costmatname+'">'+
                                '<input type="text" id="codecostcode'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="'+boq_costmat+'">'+
                                  '<input type="hidden" id="type'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="'+type+'">'+
                                  '<span class="input-group-btn" >'+
                                     '<button class="selectcostcode'+row+' btn btn-info btn-sm '+chk1+'" data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span></button>'+
                                    '<a class="btn btn-info btn-sm '+chk+' " id="boqitem'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></a>'+
                                  '</span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                          '<div class="row">'+
                              '<div class="col-xs-6">'+
                                '<div class="form-group">'+
                                  '<label for="qty">รายละเอียดเพิ่มเติม</label>'+
                                  '<input type="text" id="remark_mat'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="">'+
                                '</div>'+
                              '</div>'+
                          '</div>'+  
                          '<div class="row">'+
                            '<div class="col-xs-12">'+
                            '<div class="form-group">'+
                                  '<hr>'+
                                '</div>'+
                             '</div>'+
                          '</div>'+
                          '<div class="row">'+
                            '<div class="col-xs-3">'+
                              '<div class="form-group">'+
                                        '<label for="qty">ปริมาณ</label>'+
                                        '<input type="text" id="qtyf'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="'+boq_balance+'">'+
                              '</div>'+
                            '</div>'+

                            '<div class="col-xs-3">'+
                              '<div class="form-group">'+
                                        '<label for="qty">Qty Control </label>'+
                                        '<input type="text" id="qtybalance'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="'+boq_balance+'" readonly>'+
                                        '<input type="hidden" id="qtybalancee'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="'+qtybalancee+'" readonly>'+
                              '</div>'+
                            '</div>'+

                            '<div class="col-xs-6">'+
                                '<div class="input-group">'+
                                  '<label for="unit">หน่วย</label>'+
                                '<input type="text" id="unitcode'+row+'" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="'+boq_ucode+'">'+
                                '<input type="text" id="unit'+row+'" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="'+boq_uname+'">'+
                                '<span class="input-group-btn" >'+
                                  '<button class="openunmo'+row+' btn btn-info btn-sm" data-toggle="modal" data-target="#openunit'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'+
                                '</span>'+
                              '</div>'+
                            '</div>'+
                        '</div>'+

                '<div class="row">'+
             '<div class="col-md-3">'+
               '<div class="form-group">'+
                        '<label for="qty">แปลงค่า IC</label>'+ 
                         '<input type="number" id="cpqtyic'+row+'" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">'+
               '</div>'+
             '</div>'+
             '<div class="col-md-3">'+
               '<div class="form-group">'+
                         '<label for="qty">ปริมาณ IC</label>'+
                         '<input type="text" id="pqtyic'+row+'" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">'+
               '</div>'+
             '</div>'+
             '<div class="col-xs-6">'+
                               '<div class="input-group">'+
                                 '<label for="unit">หน่วย IC</label>'+
                                 '<input type="text" id="uniticcode'+row+'" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="'+boq_ucode+'">'+
                              '<input type="text" id="punitic'+row+'" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="'+boq_uname+'">'+
                               '<span class="input-group-btn" >'+
                                ' <a class="unitic'+row+' btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
                               '</span>'+
                             '</div>'+
                           '</div>'+
         '</div>'+
          '<div class="row">'+
             '<div class="col-md-6">'+
               '<div class="form-group">'+
                        ' <label for="price_unit">ราคา/หน่วย</label>'+
                         '<input type="text" id="pprice_unit'+row+'"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg" value="0">'+
               '</div>'+
             '</div>'+
            ' <div class="col-md-6">'+
               '<div class="form-group">'+
                         '<label for="amount">จำนวนเงิน</label>'+
                         '<input type="text" id="pamount'+row+'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control" value="0">'+
               '</div>'+
             '</div>'+
         '</div>'+
          '<div class="row">'+
               '<div class="col-md-3">'+
                 '<div class="form-group">'+

                    '<label for="endtproject">ส่วนลด 1 (%)</label>'+
                    '<input type="text" id="pdiscper1'+row+'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control" value="0"/>'+
                 '</div>'+
               '</div>'+

                   '<div class="col-md-3">'+
                     '<div class="form-group">'+
                       ' <label for="endtproject">ส่วนลด 2 (%)</label>'+
                       ' <input type="text "id="pdiscper2'+row+'" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" value="0" />'+
                     '</div>'+
                   '</div>'+

               '<div class="col-md-3">'+
                 '<div class="form-group">'+

                    '<label for="endtproject">ส่วนลด 3 (%)</label>'+
                   ' <input type="text" id="pdiscper3'+row+'" name="discountper3" placeholder="กรอกส่วนลด" class="form-control" value="0"/>'+
                 '</div>'+
              ' </div>'+
                   '<div class="col-md-3">'+
                     '<div class="form-group">'+
                        '<label for="endtproject">ส่วนลด 4 (%)</label>'+
                       ' <input type="text" id="pdiscper4'+row+'" name="discountper4" placeholder="กรอกส่วนลด" class="form-control" value="0" />'+
                    ' </div>'+
                   '</div>'+
         '</div>'+
          ' <div class="row">'+
            ' <div class="col-md-6">'+
                ' <div class="form-group">'+
                  '<label for="endtproject">ส่วนลดพิเศษ</label>'+
                  '<input type="text" id="pdiscex'+row+'" name="discountper2" class="form-control" value="0"/>'+
                 '</div>'+
             '</div>'+
            ' <div class="col-md-4">'+
                   '<div class="form-group">'+
                    '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'+
                    '<input type="text" id="pdisamt'+row+'" name="disamt" class="form-control" value="" readonly="0" />'+
                    '<input type="hidden" id="pvat'+row+'" value="0">'+
                   '</div>'+
            ' </div>'+
  
           '</div>'+
           '<div class="row">'+
           '<div class="col-md-2">'+
                    '<label>VAT:</label>'+
                          '<div class="input-group">'+
                            '<input type="text" class="form-control text-center" id="vatper'+row+'" name="vatper[]" placeholder="7%" value="0" >'+
                            '<span class="input-group-addon">%</span>'+
                         ' </div>'+
                 ' </div>'+
                '<div class="col-md-2">'+
                 '<div class="form-group">'+
                   ' <label for="endtproject">vat</label>'+

                    '<input type="text" id="to_vat'+row+'" name="to_vat" class="form-control" value="0"/>'+
                  '</div>'+
                 '</div>'+
               ' <div class="col-md-2">'+
                 '<div class="form-group">'+
                    '<label for="endtproject">จำนวนเงินสุทธิ</label>'+

                    '<input type="text" id="pnetamt'+row+'" name="netamt" class="form-control" value="0" readonly=""/>'+
                  '</div>'+
                 '</div>'+
                        '<div class="row">'+
                            '<div class="col-xs-6">'+
                              '<div class="input-group">'+
                                '<label for="datesend ">วันที่ส่งของ</label>'+
                                  '<input type="date" id="datesend'+row+'" class="form-control daterange-single" name="datesend" value="">'+
                              '</div>'+
                            '</div>'+
                            
                         
                         '</div>'+

                         '<div class="row">'+
                            '<div class="col-xs-6">'+
                           '<label for="">Ref. Asset Code</label>'+
                              '<div class="input-group">'+
                         '<input type="text" id="accode'+row+'" name="accode"  readonly="true"  class="form-control input-sm">'+
                        '<input type="text" id="acname'+row+'" name="acname" readonly="true"  class="form-control input-sm">'+
                         '<input type="hidden" id="statusass'+row+'" name="statusass" readonly="true"  class="form-control input-sm">'+
                                  '<span class="input-group-btn" >'+
                                    '<button class="btn btn-info btn-sm" id="refasset" data-toggle="modal" data-target="#refass'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'+
                                  '</span>'+
                              '</div>'+
                          '</div>'+
               
                         '<div class="col-xs-6">'+
                              '<div class="form-group">'+
                                 '<label for="endtproject">หมายเหตุ</label>'+
                                     '<input type="text" id="remarkitem'+row+'" class="form-control" value="'+boq_boqmat+'">'+
                                '</div>'+
                              '</div>'+
                         '</div>'+
                '</div>'+

                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                  '<button type="button" id="edittorow'+row+'" data-dismiss="modal" class="btn btn-info">Edit Row</button>'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</div>';
  $('#editrow').append(modal);
        var rowmat = ' <div id="opnewmat'+row+'" class="modal fade">'+
          '<div class="modal-dialog modal-full">'+
            '<div class="modal-content ">'+
              '<div class="modal-header bg-info">'+
                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                '<h5 class="modal-title">เพิ่มรายการ</h5>'+
              '</div>'+
                '<div class="modal-body">'+
                 '<div class="row" id="modal_newmat'+row+'">'+
                  '</div>'+
                '</div>'+
            '</div>'+
          '</div>'+
          '</div>';
          $('.rowmat').append(rowmat);
        var rowmat = '<div id="opnewmattt'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_matt'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';
  $('.rowmat').append(rowmat);
     $(".poo"+row+"").click(function(){
      $('#modal_matt'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_matt"+row+"").load('<?php echo base_url(); ?>index.php/share/getmatcode/'+row);
    }); 
          var rowmat = ' <div id="costcode'+row+'" class="modal fade">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content ">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h5 class="modal-title">เพิ่มรายการ</h5>'+
                '</div>'+
                  '<div class="modal-body">'+
                   '<div class="row" id="modal_cost'+row+'">'+
                    '</div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '</div>';

        $('.selectcostcode'+row).click(function(){
          $('#modal_cost'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_cost"+row).load('<?php echo base_url(); ?>share/costcode_id/'+row);
        });

$('.rowmat').append(rowmat);
var rowmat = '<div class="modal fade" id="refass'+row+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
  '<div class="modal-dialog modal-lg">'+
    '<div class="modal-content">'+
      '<div class="modal-header bg-info">'+
       ' <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>'+
     ' </div>'+
        '<div class="modal-body">'+
            '<div class="row" id="refasscode'+row+'">'+
             '</div>'+

        '</div>'+
    '</div>'+
  '</div>'+
'</div>';
 
 $('.rowmat').append(rowmat);
var rowmat = '<div class="modal fade" id="openunitic'+row+'" data-backdrop="false">'+
        '<div class="modal-dialog">'+
          '<div class="modal-content">'+
            '<div class="modal-header bg-info">'+
              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
            '</div>'+
              '<div class="modal-body">'+
                  '<div id="modal_unitic'+row+'"></div>'+
              '</div>'+
          '</div>'+
        '</div>'+
      '</div>'+

      $(".unitic"+row+"").click(function(){
       $('#modal_unitic'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#modal_unitic"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid2/'+row+'');
     });
$('.rowmat').append(rowmat);
var rowmat = '<div class="modal fade" id="openunit'+row+'" data-backdrop="false">'+
        '<div class="modal-dialog">'+
          '<div class="modal-content">'+
            '<div class="modal-header bg-info">'+
              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
            '</div>'+
              '<div class="modal-body">'+
                  '<div id="modal_unitc'+row+'"></div>'+
              '</div>'+
          '</div>'+
        '</div>'+
      '</div>'+

      $(".openunmo"+row+"").click(function(){
       $('#modal_unitc'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#modal_unitc"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid/'+row+'');
     });
$('.rowmat').append(rowmat);
   var rowmat = '<div class="modal fade" id="boq'+row+'" data-backdrop="false">'+
                      '<div class="modal-dialog modal-lg">'+
                        '<div class="modal-content">'+
                          '<div class="modal-header bg-info">'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<h4 class="modal-title" id="myModalLabel">Cost Code</h4>'+
                          ' </div>'+
                          '<div class="modal-body">'+
                            '<div id="modal_boq'+row+'"></div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>';
                  $('.rowmat').append(rowmat);
                  $('#boqitem'+row+'').click(function(){
                    var system = $('#system').val();
                    $('#modal_boq'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#modal_boq"+row+"").load('<?php echo base_url(); ?>pr/model_costcodeboq_row/<?php echo $boq; ?>/'+system+'/'+row);
                  });
  

                  $('#qtyf'+row+'').keyup(function(){
                  	if(boq_controlstatus=="1"){
                    var qty = $("#qtyf"+row+"").val();
                    var storetotol = $("#qtybalance"+row+"").val();
                    if (parseFloat(storetotol) < parseFloat(qty)) {
                    swal({
                      title: "รายการมากกว่าใน BOQ.",
                      text: "",
                      confirmButtonColor: "#EA1923",
                      type: "error"
                  });

                      $("#qtyf"+row+"").val('0');
                      $("#qtyf"+row+"").select();
                    }
                    }
                  });




          $("#pprice_unit"+row+"").keyup(function(){
                var xqty = parseFloat($("#qtyf"+row+"").val());
                var xprice = parseFloat($("#pprice_unit"+row+"").val());
                var xamount = xqty*xprice;
                var xdiscper1 = parseFloat($("#pdiscper1"+row+"").val());
                var xdiscper2 = parseFloat($("#pdiscper2"+row+"").val());
                var xdiscper3 = parseFloat($("#pdiscper3"+row+"").val());
                var xdiscper4 = parseFloat($("#pdiscper4"+row+"").val());
                var xdiscper5 = parseFloat($("#pdiscex"+row+"").val());
                var xvatt = parseFloat($("#vatper"+row+"").val());
                var xpd1 = xamount - (xamount*xdiscper1)/100;
                var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
                var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
                var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
                var total_di = xamount-xpd4;
                var xvat = parseFloat($("#vatper").val());
                $("#pamount"+row+"").val(xamount);
                $("#too_di"+row+"").val(total_di);
                $("#to_vat"+row+"").val(xpd8);
                $("#tot_vat"+row+"").val(xpd8);
                if(xdiscper5 != 0){
                  vxpd4 = xpd4-xdiscper5;
                    $("#pdisamt"+row+"").val(vxpd4);
                    $("#too_di"+row+"").val(vxpd4);
                    vxpd5 = (xpd4-xdiscper5) + xpd8;
                    $("#pnetamt"+row+"").val(vxpd5);
                  }
                  else if(xdiscper2 != 0){
                         $("#pdisamt"+row+"").val(xpd4);
                         $("#too_di"+row+"").val(xpd4);
                         vxpd2 = xpd4 + xpd8;
                         $("#pnetamt"+row+"").val(vxpd2);
                }
                  else if(xdiscper3 != 0){
                         $("#pdisamt"+row+"").val(xpd4);
                         $("#too_di"+row+"").val(xpd4);
                         vxpd3 = xpd4 + xpd8;
                         $("#pnetamt"+row+"").val(vxpd3);
                }
                else if(xdiscper4 != 0){
                         $("#pdisamt"+row+"").val(xpd4);
                         $("#too_di"+row+"").val(xpd4);
                         vxpd5 = xpd4 + xpd8;
                         $("#pnetamt"+row+"").val(vxpd5);
                }
             
                else
                {
                $("#pdisamt"+row+"").val(xpd1);
                $("#too_di"+row+"").val(xpd1);
                    vxpd1 = xpd4 + xpd8;
                    $("#pnetamt"+row+"").val(vxpd1);
                }
              });





            $('.rowmat').append(rowmat);
            $('#refasset').click(function(){
   			$('#refasscode'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   			$("#refasscode"+row).load('<?php echo base_url(); ?>share/modalshare_asset/'+row);
 			});
        $('.openun'+row).click(function(){
          $('#modal_newmat'+row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_newmat"+row).load('<?php echo base_url(); ?>share/material_id/'+row);
        });
       
        $('#chke'+row).click(function(event) {
          if($('#chke'+row).prop('checked')) {
           $('#newmatname'+row).prop('disabled', false);
        } else {
            $('#newmatname'+row).prop('disabled', true);
        }
        });
        $("#edittorow"+row).click(function(event) {
          $("#trmatcode"+row).html('<td id="trmatcode'+row+'">'+$("#newmatcode"+row).val()+'<input type="hidden" id="trmatcode'+row+'" name="matcodei[]" value="'+$("#newmatcode"+row).val()+'" /></td>');
          $("#trunit"+row).html('<td id="trunit'+row+'">'+$("#unit"+row).val()+'<input type="hidden" id="trunit'+row+'" name="uniti[]" value="'+$("#unit"+row).val()+'" /><input type="hidden" id="trunitcode'+row+'" name="unitiunitcode[]" value="'+$("#unitcode"+row).val()+'" /><input type="hidden" id="truniticcode'+row+'" name="unitiuniticcode[]" value="'+$("#uniticcode"+row).val()+'" /></td>');
          $("#trmatname"+row).html('<td id="trmatname'+row+'">'+$("#newmatname"+row).val()+'<input type="hidden" id="trmatname'+row+'" name="matnamei[]" value="'+$("#newmatname"+row).val()+'" /></td>');
          $("#trqty"+row).html('<td id="trqty'+row+'">'+$("#qtyf"+row).val()+'<input type="hidden" id="trqty'+row+'"" name="qtyi[]" value="'+$("#qtyf"+row).val()+'" /></td>');
          $("#tdcostcode"+row).html('<td id="tdcostcode'+row+'">'+$("#codecostcode"+row).val()+'<input type="hidden" id="trcostcode'+row+'" name="costcodei[]" value="'+$("#codecostcode"+row).val()+'" /></td>');
          $("#tdcostname"+row).html('<td id="tdcostname'+row+'">'+$("#costname"+row).val()+'<input type="hidden" id="trcostname'+row+'" name="costnamei[]" value="'+$("#costname"+row).val()+'" /></td>');
          $("#datesends"+row).html('<td id="datesends'+row+'">'+$("#datesend"+row).val()+'<input type="hidden" id="datesend'+row+'" name="datesend[]" value="'+$("#datesend"+row).val()+'" /><input type="hidden" name="accode[]" value="'+$("#accode"+row).val()+'" /><input type="hidden" name="acname[]" value="'+$("#acname"+row).val()+'" /><input type="hidden" name="statusass[]" value="'+$("#statusass"+row).val()+'" /><input type="hidden" name="cpqtyic[]" value="'+$("#cpqtyic"+row).val()+'" /><input type="hidden" name="pqtyic[]" value="'+$("#pqtyic"+row).val()+'" /><input type="hidden" name="punitic[]" value="'+$("#punitic"+row).val()+'" /><input type="hidden" name="pprice_unit[]" value="'+$("#pprice_unit"+row).val()+'" /><input type="hidden" name="pamount[]" value="'+$("#pamount"+row).val()+'" /><input type="hidden" name="pdiscper1[]" value="'+$("#pdiscper1"+row).val()+'" /><input type="hidden" name="pdiscper2[]" value="'+$("#pdiscper2"+row).val()+'" /><input type="hidden" name="pdiscper3[]" value="'+$("#pdiscper3"+row).val()+'" /><input type="hidden" name="pdiscper4[]" value="'+$("#pdiscper4"+row).val()+'" /><input type="hidden" name="pdiscex[]" value="'+$("#pdiscex"+row).val()+'" /><input type="hidden" name="pdisamt[]" value="0" /><input type="hidden" name="vatper[]" value="'+$("#vatper"+row).val()+'" /><input type="hidden" name="to_vat[]" value="'+$("#to_vat"+row).val()+'" /><input type="hidden" name="pnetamt[]" value="'+$("#pnetamt"+row).val()+'" /><input type="hidden" name="remarki[]" value="'+$("#remarkitem"+row).val()+'" /><input type="hidden" name="qtybalancee[]" value="'+$("#qtybalancee"+row).val()+'" /><input type="hidden" name="type[]" value="'+$("#type"+row).val()+'" /><input type="hidden" name="remark_mat[]" value="'+$("#remark_mat"+row).val()+'" /></td>');
          $("#trremark"+row).val($("#remarkitem"+row).val());
          if ($("#newmatname"+row).val()=="") {
            $("#trmatcode"+row).text("");
            $("#newmatcode"+row).val("");
          }
          var prsum = parseFloat($('#sumpr').val());
          var punit = parseFloat($('#pdisamt'+row+'').val());
          var all = prsum + punit;
          $('#sumpr').val(all);
        });
}

</script>
<?php $n++; } ?>
</tbody>
</table>

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
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxcboq").DataTable();
</script>
