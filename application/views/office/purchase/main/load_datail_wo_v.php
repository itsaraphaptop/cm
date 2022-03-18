<div class="modal-header bg-info">
  <button type="button" class="close" id="delclo" data-dismiss="modal">&times;</button>
  <h2><?php echo $id; ?></h2>
</div>
<div class="modal-body">
  <div class="col-md-12 text-right">
    <a type="button" class="label bg-danger" id="selectallpr">Select All</a>
    <br>
  </div>
  <table class="table table-hover table-bordered table-striped table-xxs">
    <thead>
      <tr>
        <th>No.</th>
        <th>Material Code</th>
        <th width="10000">Material</th>
        <th>Cost Code</th>
        <th>Qty</th>
        <th>Unit</th>
        <th>Price/Unit</th>
        <th>Amount</th>
        <th>Disc.Amt</th>
        <th>Total Disc</th>
        <th>Total Vat</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="body">
      <?php $n = 1;foreach ($pr as $u) { ?>




     <tr id="chk<?php echo $u->pri_id; ?>">
        <td><?php echo $n; ?></td>
        <td><?php echo $u->pri_matcode; ?></td>
        <td><?php echo $u->pri_matname; ?></td>
        <td><?php echo $u->pri_costcode; ?></td>
        <td class="text-right"><?php echo number_format($u->pri_qty - $u->pri_sumqty, 2); ?></td>
        <td class="text-right"><?php echo $u->pri_unitcode; ?></td>
        <td class="text-right"><?php echo number_format($u->pri_priceunit, 2); ?></td>
        <td class="text-right"><?php echo number_format($u->pri_amount, 2); ?></td>
        <td class="text-right"><?php echo number_format($u->pri_pdiscex, 2); ?></td>
        <td class="text-right"><?php echo number_format($u->pri_disamt, 2); ?></td>
        <td class="text-right"><?php echo $u->pri_tovat; ?></td>
        <td class="text-right"><?php echo number_format($u->pri_netamt, 2); ?>
          <input type="hidden"  id="sumpu<?php echo $n; ?>" value="<?php echo $u->pri_priceunit; ?>">
          <input type="hidden"  id="sumpu2<?php echo $n; ?>" value="<?php echo $u->pri_amount; ?>">
          <input type="hidden"  id="sumpu3<?php echo $n; ?>" value="<?php echo $u->pri_discountper1 + $u->pri_discountper2 + $u->pri_discountper3 + $u->pri_discountper4; ?>">
          <input type="hidden"  id="sumpu4<?php echo $n; ?>" value="<?php echo $u->pri_pdiscex; ?>">
          <input type="hidden"  id="sumpu5<?php echo $n; ?>" value="<?php echo $u->pri_disamt; ?>">
          <input type="hidden"  id="sumpu6<?php echo $n; ?>" value="<?php echo $u->pri_tovat; ?>">
          <input type="hidden"  id="sumpu7<?php echo $n; ?>" value="<?php echo $u->pri_netamt; ?>">
        </td>
        <td><a type="button" id="add<?php echo $n; ?>"  class="label bg-teal" >Select</a></td>
      </tr>




      <script >
         $("#delclo").click(function(){
      $(".se<?php echo $id; ?>").hide();
      });
      $("#add<?php echo $n; ?>").click(function(){
      $('#selectallpr').hide();
      var pri_id = '<?php echo $u->pri_id; ?>';
      var pri_matname = '<?php echo $u->pri_matname; ?>';
      var pri_matcode = '<?php echo $u->pri_matcode; ?>';
      var pri_ref = '<?php echo $u->pri_ref; ?>';
      var pri_costcode = '<?php echo $u->pri_costcode; ?>';
      var pri_costcodee = '<?php echo substr($u->pri_costcode, 0, 1); ?>';
      var pri_costname = '<?php echo $u->pri_costname; ?>';
      var pri_qty = '<?php echo $u->pri_qty - $u->pri_sumqty; ?>';
      var pri_sumqty = '<?php echo $u->pri_sumqty; ?>';
      var pri_unit = '<?php echo $u->pri_unit; ?>';
      var pri_priceunit = '<?php echo $u->pri_priceunit; ?>';
      var pri_amount = '<?php echo $u->pri_amount; ?>';
      var pri_discountper1 = '<?php echo $u->pri_discountper1; ?>';
      var pri_discountper2 = '<?php echo $u->pri_discountper2; ?>';
      var pri_discountper3 = '<?php echo $u->pri_discountper3; ?>';
      var pri_discountper4 = '<?php echo $u->pri_discountper4; ?>';
      var allpri = '<?php echo $u->pri_discountper1 + $u->pri_discountper2 + $u->pri_discountper3 + $u->pri_discountper4; ?>';
      var pri_disamt = '<?php echo $u->pri_disamt; ?>';
      var pri_vat = '<?php echo $u->pri_vat; ?>';
      var pri_remark = '<?php echo $u->pri_remark; ?>';
      var pri_netamt = '<?php echo $u->pri_netamt; ?>';
      var datesend = '<?php echo $u->datesend; ?>';
      var pri_status = '<?php echo $u->pri_status; ?>';
      var pri_pono = '<?php echo $u->pri_pono; ?>';
      var pri_count = '<?php echo $u->pri_count; ?>';
      var pr_asset = '<?php echo $u->pr_asset; ?>';
      var pr_assetid = '<?php echo $u->pr_assetid; ?>';
      var pr_assetname = '<?php echo $u->pr_assetname; ?>';
      var poi_qty = '<?php echo $u->poi_qty; ?>';
      var pri_cpqtyic = '<?php echo $u->pri_cpqtyic; ?>';
      var pri_pqtyic = '<?php echo ($u->pri_qty - $u->pri_sumqty) * $u->pri_cpqtyic; ?>';
      var pri_punitic = '<?php echo $u->pri_punitic; ?>';
      var pri_pdiscex = '<?php echo $u->pri_pdiscex; ?>';
      var pri_tovat = '<?php echo $u->pri_tovat; ?>';
      var pri_boqid = '<?php echo $u->pri_boqid; ?>';
      var pri_boqrow = '<?php echo $u->pri_boqrow; ?>';
      var type = '<?php echo $u->cost_type; ?>';
      var remark_mat = '<?php echo $u->remark_mat; ?>';
      var datesend = '<?php echo $u->datesend; ?>';
      var ckkcontrolbg = $('#ckkcontrolbg').val();

      if(ckkcontrolbg=="2"){
      var chk = 'hidden';
      var chk1 = '';
      }else{
      var chk = '';
      var chk1 = 'hidden';
      }

      addrow(pri_id,pri_matname,pri_matcode,pri_ref,pri_costcode,pri_costcodee,pri_costname,pri_qty,pri_sumqty,pri_unit,pri_priceunit,pri_amount,pri_discountper1,pri_discountper2,pri_discountper3,pri_discountper4,allpri,pri_disamt,pri_vat,pri_remark,pri_netamt,datesend,pri_status,pri_pono,pri_count,pr_asset,pr_assetid,pr_assetname,poi_qty,pri_cpqtyic,pri_pqtyic,pri_punitic,pri_pdiscex,pri_tovat,pri_boqid,pri_boqrow,type,remark_mat,chk,chk1,datesend);
      $("#chk<?php echo $u->pri_id; ?>").hide();
       function addrow(pri_id,pri_matname,pri_matcode,pri_ref,pri_costcode,pri_costcodee,pri_costname,pri_qty,pri_sumqty,pri_unit,pri_priceunit,pri_amount,pri_discountper1,pri_discountper2,pri_discountper3,pri_discountper4,allpri,pri_disamt,pri_vat,pri_remark,pri_netamt,datesend,pri_status,pri_pono,pri_count,pr_asset,pr_assetid,pr_assetname,poi_qty,pri_cpqtyic,pri_pqtyic,pri_punitic,pri_pdiscex,pri_tovat,pri_boqid,pri_boqrow,type,remark_mat,chk,chk1,datesend)
      {

      var row = ($('#detail_wo tr').length-0)+1;
      var tr = '<tr id="'+row+'">'+
        '<td>'+row+' </td>'+
        '<td>'+
          '<div class="checkbox checkbox-switchery switchery-xs">'+
            '<label>'+
              '<input type="checkbox"  id="a'+row+'" checked class="switchery">'+
              '<input type="hidden" name="chki[]" id="chki'+row+'" value="Y">'+
              '<input type="hidden" name="priidi[]" value="'+pri_id+'">'+
            '</label>'+
          '</div>'+
        '</td>'+
        ' <td id="smatcode'+row+'" width="10%"><div class="input-group"><input type="text" class="form-control" name="matcodei[]" id="matcodei" required  value="'+pri_matcode+'"><span class="input-group-btn"><a data-toggle="modal" data-target="#edit'+row+'" data-popup="tooltip" title="Edit" id="editfa'+row+'"   class="btn btn-default btn-icon"><i class="icon-search4"></i></a><a class="btn btn-default btn-icon" id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></i></a></span></div></td>'+
        '<td class="text-right" id="smatname'+row+'">'+pri_matname+'<input type="hidden" name="matnamei[]" id="matnametext'+row+'" value="'+pri_matname+'"></td>'+
        '<td class="text-right" id="scostcode'+row+'">'+pri_costcode+'<input type="hidden" name="costcodei[]" value="'+pri_costcode+'"><input type="hidden" name="costnamei[]" value="'+pri_costname+'"></td>'+
        '<td class="text-right" id="sqtyi'+row+'">'+numberWithCommas(pri_qty)+'<input type="hidden" name="qtyi[]" value="'+pri_qty+'"></td>'+
        '<td class="text-right" id="sunit'+row+'">'+numberWithCommas(pri_unit)+'<input type="hidden" name="uniti[]" value="'+pri_unit+'"></td>'+
        '<td class="text-right" id="spriceunit'+row+'">'+numberWithCommas(pri_priceunit)+'<input type="hidden" id="txt6 priceuniti'+row+'" name="priceuniti[]" value="'+pri_priceunit+'"></td>'+
        '<td class="text-right" id="samount'+row+'">'+numberWithCommas(pri_amount)+'<input type="hidden" name="amounti[]" id="amounti'+row+'" value="'+pri_amount+'"></td>'+
        '<td class="text-right" id="sdisone'+row+'">'+numberWithCommas(allpri)+'<input type="hidden" name="disci1[]" value="'+pri_discountper1+'"><input type="hidden" name="disci2[]" value="'+pri_discountper2+'"><input type="hidden" name="disci3[]" value="'+pri_discountper3+'"><input type="hidden" name="disci4[]" value="'+pri_discountper4+'"></td>'+
        '<td class="text-right" id="sdisamt'+row+'">'+numberWithCommas(pri_pdiscex)+'<input type="hidden" name="disamti[]" value="'+pri_pdiscex+'">'+
      '</td>'+
      '<td  class="text-right" id="tto_di'+row+'">'+numberWithCommas(pri_disamt)+'<input type="hidden" name="too_di[]" value="'+pri_disamt+'">'+
      '<td class="text-right" id="total_vat'+row+'">'+numberWithCommas(pri_tovat)+'<input type="hidden" name="to_vat[]" value="'+pri_tovat+'">'+
      '<td class="text-right" id="snetamt'+row+'">'+numberWithCommas(pri_netamt)+'<input type="hidden" id="zum4" name="netamti[]" value="'+pri_netamt+'">'+
      '<input type="hidden" name="remarki[]" id="sremark'+row+'" value="'+pri_remark+'">'+
      '<input type="hidden" name="accode[]" value="'+pr_assetid+'">'+
      '<input type="hidden" name="acname[]" value="'+pr_assetname+'">'+
      '<input type="hidden" name="statusass[]" value="'+pr_asset+'">'+
      '<input type="hidden" name="refprno[]" value="'+pri_ref+'">'+
      '<input type="hidden" name="type[]" value="'+type+'">'+
      '<input type="hidden" name="cqtyic[]" value="'+pri_cpqtyic+'">'+
      '<input type="hidden" name="pqtyic[]" value="'+pri_pqtyic+'">'+
      '<input type="hidden" name="punitic[]" value="'+pri_punitic+'">'+
      '<input type="hidden" name="reamrki[]" value="'+pri_remark+'">'+
      '<input type="hidden" name="remark_mat[]" value="'+remark_mat+'">'+
      '<input type="hidden" name="datesend[]" value="'+datesend+'">'+
      '<input type="hidden" class="type_cost"  name="type_cost[]">'+
      
    '</td>'+
    '<td style="color:#BEBEBE;">'+row+'</td>'+
  '</tr>';


    $('#detail_wo').append(tr);

    var rowmat = '<div id="edit'+row+'" class="modal fade" data-backdrop="false">'+
    '<div class="modal-dialog modal-lg">'+
      '<div class="modal-content">'+
        '<div class="modal-header">'+
          '<h5 class="modal-title">Edit '+pri_matname+'</h5>'+
        '</div>'+
        '<div class="modal-body">'+
          '<div class="row">'+
            '<div class="col-xs-6">'+
              '<label for="">รายการซื้อ  <button id="compareu'+row+'" data-toggle="modal" data-target="#compare'+row+'" class="label bg-warning-400">History Price <i class="icon-balance"></i></button> </label>'+
              '<div class="form-group" id="error'+row+'">'+
                '<input type="text" id="newmatname'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control " value="'+pri_matname+'" readonly="">'+
                '<input type="text" id="newmatcode'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control " value="'+pri_matcode+'" disabled>'+
              '</div>'+
            '</div>'+
            '<div class="col-xs-6">'+
              '<label for="">รายการต้นทุน </label>'+
              '<div class="input-group">'+
                '<input type="text" id="costnameint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+pri_costname+'">'+
                '<input type="text" id="codecostcodeint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+pri_costcode+'">'+
                '<input type="hidden" id="chkhidden'+row+'" readonly="true" placeholder="" class="form-control " value="'+pri_boqid+'">'+
                '<input type="hidden" id="costmatsub'+row+'" readonly="true" placeholder="" class="form-control " value="'+pri_costcodee+'">'+
                '<input type="hidden" id="type'+row+'" value="'+type+'">'+
                '<span class="input-group-btn '+chk1+'" ><button class="btn btn-primary" id="selectcostcodeboq'+row+'" data-toggle="modal" data-target="#boq'+row+'"><span class="glyphicon glyphicon-search"></span></button></span>'+
                '<span class="input-group-btn '+chk+'" ><a class="costcode'+row+' btn btn-primary" data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span> </a></span>'+
              '</div>'+
            '</div>'+
          '</div>'+
          '<div class="row">'+
            '<div class="col-md-6">'+
              '<div class="form-group">'+
                '<label for="qty">รายละเอียดเพิ่มเติม</label>'+
                '<input type="text" id="remark_mat'+row+'" name="remark_mat"  class="form-control text-right" value="'+remark_mat+'">'+
              '</div>'+
             '</div>'+

              '<div class="col-md-3">'+
                 '<div class="form-group">'+
                  '<label for="type_cost'+row+'">Type of Cost</label>'+
                  '<select id="type_cost'+row+'" class="form-control">'+
                  '<option value=""></option>'+
                      '<option value="1">MATERIAL</option>'+
                      '<option value="2">LABOR.</option>'+
                      '<option value="3">SUB CON</option>'+
                    '</select>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-12">'+
                '<hr>'+
              '</div>'+
            '</div>'+

            '<div id="closebg'+row+'">'+
            '<div class="row">'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="qty">ปริมาณ</label>'+
                  '<input type="text" id="pqty'+row+'" name="qty"  placeholder="กรอกปริมาณ" class="form-control text-right" value="'+pri_qty+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="qty">คงเหลือ</label>'+
                  '<input type="text"   placeholder="กรอกปริมาณ" class="form-control text-right" value="'+pri_qty+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-xs-6">'+
                '<div class="input-group">'+
                  '<label for="unit">หน่วย</label>'+
                  '<input type="text" id="punit'+row+'" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control  text-right" value="'+pri_unit+'">'+
                  '<span class="input-group-btn" >'+
                    '<a class="unit'+row+' btn btn-primary" data-toggle="modal" data-target="#openunit'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> </a>'+
                  '</span>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="qty">แปลงค่า IC</label>'+
                  '<input type="text" id="cpqtyic'+row+'" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="'+pri_cpqtyic+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="qty">ปริมาณ IC</label>'+
                  '<input type="text" id="pqtyic'+row+'" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="'+pri_pqtyic+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-6">'+
                '<div class="input-group">'+
                  '<label for="unit">หน่วย IC</label>'+
                  '<input type="text" id="punitic'+row+'" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control text-right " value="'+pri_punitic+'">'+
                  '<span class="input-group-btn" >'+
                  '<a class="unitic'+row+' btn btn-primary" data-toggle="modal" data-target="#openunitic'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> </a>'+
                    '</span>'+
                '</div>'+
              '</div>'+
            '</div>'+
            ' <div class="row">'+
              '<div class="col-md-6">'+
                ' <div class="form-group">'+
                  '<label for="price_unit">ราคา/หน่วย</label>'+
                  '<input type="number" id="pprice_unit'+row+'"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg text-right" value="'+pri_priceunit+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-6">'+
                ' <div class="form-group">'+
                  '<label for="amount">จำนวนเงิน</label>'+
                  '<input type="text" id="pamount'+row+'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="'+pri_amount+'">'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  ' <label for="endtproject">ส่วนลด 1 (%)</label>'+
                  '<input type="number" id="pdiscper1'+row+'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper1+'" />'+
                '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="endtproject">ส่วนลด 2 (%)</label>'+
                  ' <input type="number" id="pdiscper2'+row+'" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper2+'" />'+
                '</div>'+
              '</div>'+
              ' <div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="endtproject">ส่วนลด 3 (%)</label>'+
                  '<input type="number" id="pdiscper3'+row+'" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper3+'" />'+
                '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="endtproject">ส่วนลด 4 (%)</label>'+
                  '<input type="number" id="pdiscper4'+row+'" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper4+'" />'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-6">'+
                ' <div class="form-group">'+
                  '<label for="endtproject">ส่วนลดพิเศษ</label>'+
                  '<input type="number" id="pdiscex'+row+'" name="discountper2" class="form-control text-right" value="'+pri_pdiscex+'"/>'+
                '</div>'+
              '</div>'+
              '<div class="col-md-4">'+
                '<div class="form-group">'+
                  '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'+
                  '<input type="text" id="pdisamt'+row+'" name="disamt" class="form-control text-right" value="'+pri_disamt+'" readonly="true"/>'+
                  '<input type="hidden" name="too_di" id="too_di'+row+'" value="0">'+
                  '<input type="hidden" name="tot_vat[]" id="tot_vat'+row+'" value="0">'+
                '</div>'+
              ' </div>'+
             
            '</div>'+
            '<div class="row" '+chk1+' id="removecost">'+
              '<div class="col-xs-3">'+
                '<div class="form-group">'+
                  '<label>Budget Control</label>'+
                  '<input class="form-control text-right border-danger" type="text" name="totalcost[]" id="totalcost'+row+'"   readonly="">'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-2">'+
                '<div class="form-group">'+
                  '<label for="endtproject">vat</label>'+
                  '<input type="text" id="to_vats'+row+'" name="to_vat" class="form-control text-right" value="'+pri_tovat+'" readonly="true"/>'+
                '</div>'+
              '</div>'+
              '<div class="col-md-2">'+
                '<div class="form-group">'+
                  '<label for="endtproject">จำนวนเงินสุทธิ</label>'+
                  '<input type="text" id="pnetamt'+row+'" name="netamt" class="form-control text-right" value="'+pri_netamt+'" readonly="true"/>'+
                '</div>'+
              ' </div>'+
              '<div class="col-md-8">'+
                '<div class="form-group">'+
                  '<label for="endtproject">หมายเหตุ</label>'+
                  '<input type="text" id="premark'+row+'" name="remark" class="form-control" value="'+pri_remark+'"/>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-6">'+
                ' <input type="hidden" name="poid" value="">'+
              ' </div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-xs-6">'+
                ' <label for="">Ref. Asset Code</label>'+
                '<div class="input-group">'+
                  '<input type="hidden" id="accode'+row+'" name="accode"  readonly="true"  class="form-control " value="'+pr_assetid+'">'+
                  '<input type="text" id="acname'+row+'" name="acname" readonly="true"  class="form-control " value="'+pr_assetname+'">'+
                  '<input type="hidden" id="statusass'+row+'" name="statusass" readonly="true"  class="form-control " value="'+pr_asset+'">'+
                  '<input type="hidden" id="refprno'+row+'" name="refprno[]" value="'+pri_ref+'">'+
                  '<span class="input-group-btn" >'+
                    '<a class="btn btn-info" id="refasset'+row+'" data-toggle="modal" data-target="#refass'+row+'"><span class="glyphicon glyphicon-search"></span> </a>'+
                  '</span>'+
                '</div>'+
              '</div>'+
                 '<div class="col-xs-6">'+
                    '<div class="form-group">'+
                        '<label for="datesend ">Delivery Date</label>'+
                       ' <input type="date" class="form-control" id="datesend'+row+'" name="datesend" value="'+datesend+'" style="width: 200px">'+
                      '</div>'+
                  '</div>'+
            '</div>'+
         

          '<div class="modal-footer">'+
            '<a id="insertpodetail'+row+'" class="btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</a>'+
          '</div>'+
           '</div>'+
          '</div>'+
        '</div>'+
      ' </div>'+
    '</div>';
    $('.rowmat').append(rowmat);

     
     $('#closebg'+row+'').hide();
     $("#type_cost"+row+"").change(function(){
      var codecostcodeint = $('#codecostcodeint'+row+'').val();
      var type_cost = $("#type_cost"+row+"").val();
      if(type_cost==1){
        $("#closebg"+row+"").show();
        if(ckkcontrolbg==2){
        
        var costcodecc = $('#costbgmat'+codecostcodeint+'').val();
        $("#totalcost"+row+"").val(costcodecc);
        var costbgm = $('#costbgmat'+codecostcodeint+'').val();
        if(isNaN(costbgm)){
                      $('#totalcost'+row+'').val(0);
                         swal({
                        title: "Over budget.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                      });
                      $("#closebg"+row+"").hide();
                      $("#pprice_unit"+row+"").val('0');
                      $("#pdisamt"+row+"").val('0');
                      $("#pamount"+row+"").val('0');
                      $("#to_vat"+row+"").val('0');
                      $("#pnetamt"+row+"").val('0');
                                              
                      }
        var controlmat = $('#controlmat'+codecostcodeint+'').val();
        if(controlmat=="1"){

        if (parseFloat(costbgm) < parseFloat(pri_disamt)) {
        swal({
        title: "Over budget.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#pprice_unit"+row+"").val('0');
        $("#pdisamt"+row+"").val('0');
        $("#pamount"+row+"").val('0');
        $("#to_vat"+row+"").val('0');
        $("#pnetamt"+row+"").val('0');
        }
      }


    }
      }else if(type_cost==2){
        $("#closebg"+row+"").show();
        if(ckkcontrolbg==2){
  
        var costcodecc = $('#costbglebour'+codecostcodeint+'').val();
        $("#totalcost"+row+"").val(costcodecc);
        var costbgl = $('#costbglebour'+codecostcodeint+'').val();

        if(isNaN(costbgl)){
                      $('#totalcost'+row+'').val(0);
                         swal({
                        title: "Over budget.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                      });
                      $("#closebg"+row+"").hide();
                      $("#pprice_unit"+row+"").val('0');
                      $("#pdisamt"+row+"").val('0');
                      $("#pamount"+row+"").val('0');
                      $("#to_vat"+row+"").val('0');
                      $("#pnetamt"+row+"").val('0');
                                              
                      }

        var controllebour = $('#controllebour'+codecostcodeint+'').val();
        if(controllebour=="1"){
        if (parseFloat(costbgl) < parseFloat(pri_disamt)) {
        swal({
        title: "Over budget.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#pprice_unit"+row+"").val('0');
        $("#pdisamt"+row+"").val('0');
        $("#pamount"+row+"").val('0');
        $("#to_vat"+row+"").val('0');
        $("#pnetamt"+row+"").val('0');
        }
      }
    }
        
      }else if(type_cost==3){
        $("#closebg"+row+"").show();
        if(ckkcontrolbg==2){
  
        var costcodecc = $('#costbgsub'+codecostcodeint+'').val();
        $("#totalcost"+row+"").val(costcodecc);
        var costbgl = $('#costbgsub'+codecostcodeint+'').val();

        if(isNaN(costbgl)){
                      $('#totalcost'+row+'').val(0);
                         swal({
                        title: "Over budget.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                      });
                      $("#closebg"+row+"").hide();
                      $("#pprice_unit"+row+"").val('0');
                      $("#pdisamt"+row+"").val('0');
                      $("#pamount"+row+"").val('0');
                      $("#to_vat"+row+"").val('0');
                      $("#pnetamt"+row+"").val('0');
                                              
                      }

        var controlsub = $('#controlsub'+codecostcodeint+'').val();
        if(controlsub=="1"){
        if (parseFloat(costbgl) < parseFloat(pri_disamt)) {
        swal({
        title: "Over budget.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#pprice_unit"+row+"").val('0');
        $("#pdisamt"+row+"").val('0');
        $("#pamount"+row+"").val('0');
        $("#to_vat"+row+"").val('0');
        $("#pnetamt"+row+"").val('0');
        }
      }
    }
      }else if(type_cost==""){
        $("#closebg"+row+"").hide();
      }


    });


     $('#pprice_unit'+row+',#pqty'+row+', #pdiscex'+row+",#pdiscper1"+row+",#pdiscper2"+row +",#pdiscper3"+row+",#pdiscper4"+row).keyup(function(){

  var xqty = parseFloat($('#pqty'+row+'').val().replace(/,/g,"")*1);
  var xprice = parseFloat($('#pprice_unit'+row+'').val().replace(/,/g,"")*1);
  var xamount = xqty*xprice;
  var xdiscper1 = parseFloat($('#pdiscper1'+row+'').val().replace(/,/g,"")*1);
  var xdiscper2 = parseFloat($('#pdiscper2'+row+'').val().replace(/,/g,"")*1);
  var xdiscper3 = parseFloat($('#pdiscper3'+row+'').val().replace(/,/g,"")*1);
  var xdiscper4 = parseFloat($('#pdiscper4'+row+'').val().replace(/,/g,"")*1);
  var xdiscper5 = parseFloat($('#pdiscex'+row+'').val().replace(/,/g,"")*1);
  var xvatt = parseFloat($('#vatper').val().replace(/,/g,"")*1);
  var xpd1 = xamount - (xamount*xdiscper1)/100;
  var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
  var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
  var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
  var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
  var total_di = xamount-xpd4;
  var xvat = parseFloat($('#vatper').val().replace(/,/g,"")*1);
  var chkhidden = parseFloat($('#chkhidden'+row+'').val().replace(/,/g,"")*1);
  $('#pamount'+row+'').val(numberWithCommas(xamount));
  $('#too_di'+row+'').val(total_di);
  //                 //alert(xpd8)
  $('#to_vats'+row+'').val(numberWithCommas(xpd8));
  //$("[name='^to_vat']").val(xvatt)
  //$('#to_vats'+row+'').val(xpd8);
  // $("")
  $('#tot_vat'+row+'').val(xvatt);
  // error
  if(xdiscper5 != 0){
  vxpd4 = xpd4-xdiscper5;
  $('#pdisamt'+row+'').val(numberWithCommas(vxpd4));
  $('#too_di'+row+'').val(numberWithCommas(vxpd4));
  vxpd5 = (xpd4-xdiscper5) + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd5));
  }
  else if(xdiscper2 != 0){
  $('#pdisamt'+row+'').val(numberWithCommas(xpd4));
  $('#too_di'+row+'').val(numberWithCommas(xpd4));
  vxpd2 = xpd4 + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd2));
  }
  else if(xdiscper3 != 0){
  $('#pdisamt'+row+'').val(numberWithCommas(xpd4));
  $('#too_di'+row+'').val(numberWithCommas(xpd4));
  vxpd3 = xpd4 + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd3));
  }
  else if(xdiscper4 != 0){
  $('#pdisamt'+row+'').val(numberWithCommas(xpd4));
  $('#too_di'+row+'').val(numberWithCommas(xpd4));
  vxpd5 = xpd4 + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd5));
  }
  else
  {
  $('#pdisamt'+row+'').val(numberWithCommas(xpd1));
  $('#too_di'+row+'').val(numberWithCommas(xpd1));
  vxpd1 = xpd4 + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd1));
  }
  var ckkcontrolbg = $('#ckkcontrolbg').val();
  //alert(ckkcontrolbg);
  if(ckkcontrolbg=="2"){
  //alert(ckkcontrolbg);
  var type_cost = $("#type_cost"+row+"").val();

  var codecostcodeint = $('#codecostcodeint'+row+'').val();
  if(type_cost==1){
  var controlmat = $('#controlmat'+codecostcodeint+'').val();
  if(controlmat=="1"){
  var costbg = $('#costbgmat'+codecostcodeint+'').val();
  $('#totalcost'+row+'').val(costbg-xpd1);
  //alert(totalcost);
  var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
  var costcodecc = $('#costbgmat'+codecostcodeint+'').val();
  if (parseFloat(totalcost) < parseFloat("0")) {
  swal({
  title: "Over budget.",
  text: "",
  confirmButtonColor: "#EA1923",
  type: "error"
  });
  $("#pprice_unit"+row+"").val('0');
  $("#pdisamt"+row+"").val('0');
  $("#pamount"+row+"").val('0');
  $("#totalcost"+row+"").val(costcodecc);
  $("#to_vats"+row+"").val('0');
  $("#pnetamt"+row+"").val('0');
  }
  }
  }else if(type_cost==2){
  var controllebour = $('#controllebour'+codecostcodeint+'').val();
        if(controllebour=="1"){
  var costbg = parseFloat($('#costbglebour'+codecostcodeint+'').val().replace(/,/g,""));
  $('#totalcost'+row+'').val(costbg-xpd1);
  //alert(totalcost);
  var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
  var costcodecc = $('#costbglebour'+codecostcodeint+'').val();
  if (parseFloat(totalcost) < parseFloat("0")) {
  swal({
  title: "Over budget.",
  text: "",
  confirmButtonColor: "#EA1923",
  type: "error"
  });
  $("#pprice_unit"+row+"").val('0');
  $("#pdisamt"+row+"").val('0');
  $("#pamount"+row+"").val('0');
  $("#totalcost"+row+"").val(costcodecc);
  $("#to_vats"+row+"").val('0');
  $("#pnetamt"+row+"").val('0');
  }


}

  }else if(type_cost==3){
  var controlsub = $('#controlsub'+codecostcodeint+'').val();
        if(controlsub=="1"){
  var costbg = parseFloat($('#costbgsub'+codecostcodeint+'').val().replace(/,/g,""));
  $('#totalcost'+row+'').val(costbg-xpd1);
  //alert(totalcost);
  var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
  var costcodecc = $('#costbglebour'+codecostcodeint+'').val();
  if (parseFloat(totalcost) < parseFloat("0")) {
  swal({
  title: "Over budget.",
  text: "",
  confirmButtonColor: "#EA1923",
  type: "error"
  });
  $("#pprice_unit"+row+"").val('0');
  $("#pdisamt"+row+"").val('0');
  $("#pamount"+row+"").val('0');
  $("#totalcost"+row+"").val(costcodecc);
  $("#to_vats"+row+"").val('0');
  $("#pnetamt"+row+"").val('0');
  }


}

  }  //if parseFloa

  }// if ckkcontrolbg
  });

      $("#insertpodetail"+row+"").click(function(){
    var xdiscper1 = parseFloat($('#pdiscper1'+row+'').val());
    var xdiscper2 = parseFloat($('#pdiscper2'+row+'').val());
    var xdiscper3 = parseFloat($('#pdiscper3'+row+'').val());
    var xdiscper4 = parseFloat($('#pdiscper4'+row+'').val());
    var sumxdic = xdiscper1+xdiscper2+xdiscper3+xdiscper4;
    if ($("#newmatcode"+row+"").val()!="") {
    $("#smatcode"+row+"").html("<div class='input-group'><input type='text' class='form-control ' name='matcodei[]' id='matcodei' required  value="+$("#newmatcode"+row+"").val()+"><span class='input-group-btn'><a data-toggle='modal' data-target='#edit"+row+"' id='editcost"+row+"' class='btn btn-default btn-icon'><i class='icon-search4'></i><a class='btn btn-default btn-icon' id='remove"+row+"' data-popup='tooltip' title='' data-original-title='Remove' data-layout='bottomRight' data-type='confirm'><i class='icon-trash'></i></a></a></span><input type='hidden' name='chkbgadd[]' id='chkbgadd' value='1'></div>");
    $("#matnametext"+row+"").val($('#newmatname'+row+'').val());
    $("#scostcode"+row+"").html('<a class="editable editable-clicks">'+$("#codecostcodeint"+row+"").val()+'</a><input type="hidden" name="costcodei[]" value='+$("#codecostcodeint"+row+"").val()+'><input type="hidden" name="costnamei[]" value='+$("#costnameint"+row+"").val()+'><input type="hidden" name="chkhidden[]" value='+$("#chkhidden"+row+"").val()+'><input type="hidden" name="costmatsub[]" value='+$("#costmatsub"+row+"").val()+'>');
    $("#scostname"+row+"").html('<a class="editable editable-clicks">'+$("#costnameint"+row+"").val()+'</a>');
    $("#sqtyi"+row+"").html("<a class='editable editable-clicks'>"+$("#pqty"+row+"").val()+"</a><input type='hidden' name='qtyi[]' id='qtyi"+row+"' value="+$("#pqty"+row+"").val()+"><input type='hidden' name='cqtyic[]' value="+$("#cpqtyic"+row+"").val()+"><input type='hidden' name='pqtyic[]' value="+$("#pqtyic"+row+"").val()+">");
    $("#spriceunit"+row+"").html("<input type='text' name='priceuniti[]' value="+$("#pprice_unit"+row+"").val()+"   class='txt form-control input-sm text-right' readonly><input type='hidden' name='punitic[]' value="+$("#punitic"+row+"").val()+">");
    $("#sunit"+row+"").html("<a class='editable editable-clicks'>"+$("#punit"+row+"").val()+"</a><input type='hidden' name='uniti[]' value="+$("#punit"+row+"").val()+">");
    $("#samount"+row+"").html("<input class='txt1 form-control input-sm text-right' type='text' id='amounti"+row+"' name='amounti[]' value="+$("#pamount"+row+"").val()+" readonly>");
    $("#sdisone"+row+"").html("<input class='form-control input-sm text-right' type='text' id='disall"+row+"'  value="+sumxdic+" readonly><input class='form-control input-sm' type='hidden' name='disci1[]' id='disci1"+row+"' value="+$("#pdiscper1"+row+"").val()+" readonly><input class='form-control input-sm' type='hidden' name='disci2[]' id='disci2"+row+"' value="+$("#pdiscper2"+row+"").val()+" readonly><input class='form-control input-sm' type='hidden' name='disci3[]' id='disci3"+row+"' value="+$("#pdiscper3"+row+"").val()+" readonly><input  class='form-control input-sm' type='hidden' name='disci4[]' id='disci4"+row+"' value="+$("#pdiscper4"+row+"").val()+" readonly>");
    $("#sdisamt"+row+"").html("<input type='text' class='txt2 form-control input-sm text-right' name='disamti[]'  id='zum1"+row+"' value="+$("#pdiscex"+row+"").val()+" readonly>");
    $("#tto_di"+row+"").html("<input type='text' class='txt3 form-control input-sm text-right' name='too_di[]' id='zum2"+row+"' value="+$("#pdisamt"+row+"").val()+" readonly>");
    $("#total_vat"+row+"").html("<input type='text' class='txt4 form-control input-sm text-right' name='to_vat[]' id='zum3"+row+"' value="+$("#to_vats"+row+"").val()+" readonly><input type='hidden' class='txt4 form-control input-sm text-right' name='type_cost[]'  value="+$("#type_cost"+row+"").val()+" readonly><input type='hidden' class=' form-control input-sm text-right' name='datesend[]'  value="+$("#datesend"+row+"").val()+" readonly>");
    $("#snetamt"+row+"").html("<input type='text' class='txt5 form-control input-sm text-right' name='netamti[]' id='zum4' value="+$("#pnetamt"+row+"").val()+" readonly><input type='hidden' name='reamrki[]' value="+$("#premark"+row+"").val()+"><input type='hidden' name='accode[]' value="+$("#accode"+row+"").val()+"><input type='hidden' name='acname[]' value="+$("#acname"+row+"").val()+"><input type='hidden' name='statusass[]' value="+$("#statusass"+row+"").val()+"><input type='hidden' name='type[]' value="+$("#type"+row+"").val()+"><input type='hidden' name='remark_mat[]' value="+$("#remark_mat"+row+"").val()+">");
    
    
    var type_cost = $("#type_cost"+row+"").val();

    // $("#costbgmat"+costcode+"").val(totalcost);
    if(type_cost==1){
    var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
    var costcode = $('#codecostcodeint'+row+'').val();
    var pamount = parseFloat($('#pamount'+row+'').val().replace(/,/g,""));
    var costbgmat = parseFloat($('#costbgmat'+costcode+'').val().replace(/,/g,""));
    $("#costbgmat"+costcode+"").val(costbgmat-pamount);
    }else if(type_cost==2){
    var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
    var costcode = $('#codecostcodeint'+row+'').val();
    var pamount = parseFloat($('#pamount'+row+'').val().replace(/,/g,""));
    var costbglebour = parseFloat($('#costbglebour'+costcode+'').val().replace(/,/g,""));
    $("#costbglebour"+costcode+"").val(costbglebour-pamount);
    }else if(type_cost==3){
    var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
    var costcode = $('#codecostcodeint'+row+'').val();
    var pamount = parseFloat($('#pamount'+row+'').val().replace(/,/g,""));
    var costbgsub = parseFloat($('#costbgsub'+costcode+'').val().replace(/,/g,""));
    $("#costbgsub"+costcode+"").val(costbgsub-pamount);
    }

   $("#editcost"+row+"").click(function() {
    var rowsum_di = parseFloat($("#amounti"+row+"").val().replace(/,/g,""));

    var type_cost = $("#type_cost"+row+"").val();
    var costcodetype = $("#codecostcodeint"+row+"").val();
    if(type_cost==1){
    var costbg = parseFloat($('#costbgmat'+$("#codecostcodeint"+row+"").val()+'').val());
    $('#costbgmat'+costcodetype+'').val(costbg+rowsum_di);
    $('#totalcost'+row+'').val(costbg+rowsum_di);
    }else if(type_cost==2){
    var costbg = parseFloat($('#costbglebour'+$("#codecostcodeint"+row+"").val()+'').val());
    $('#costbglebour'+costcodetype+'').val(costbg+rowsum_di);
    $('#totalcost'+row+'').val(costbg+rowsum_di);
    }else if(type_cost==3){
    var costbg = parseFloat($('#costbgsub'+$("#codecostcodeint"+row+"").val()+'').val());
    $('#costbgsub'+costcodetype+'').val(costbg+rowsum_di);
    $('#totalcost'+row+'').val(costbg+rowsum_di);
    }
    // alert(''+$("#codecostcodeint"+row+"").val()+'');
    });


    
    

    

    
    }else{
    swal({
    title: "Please Chack!",
    text: "Material Code Not Found",
    confirmButtonColor: "#2196F3"
    });
    $("#error"+row+"").attr("class", "input-group has-error has-feedback");
    $("#newmatname"+row+"").focus();
    }
    if ( parseFloat($("#pprice_unit"+row+"").val().replace(/,/g,"")) != 0 ) {
    }else{
    swal({
    title: "Unit Price Not Found!",
    text: "Unit Price Not Found",
    confirmButtonColor: "#2196F3"
    });
    }
    });
    $('#chk'+row+'').click(function(event) {
    if($('#chk'+row+'').prop('checked')) {
    $('#newmatname'+row+'').prop('disabled', false);
    } else {
    $('#newmatname'+row+'').prop('disabled', true);
    }
    });


var cost =  '<div class="modal fade" id="costcode'+row+'" data-backdrop="false">'+
    '<div class="modal-dialog modal-full">'+
      '<div class="modal-content">'+
        '<div class="modal-header bg-info">'+
          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>'+
        '</div>'+
        '<div class="modal-body">'+
          '<div id="modal_cost'+row+'"></div>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</div>';
  
  $(".costcode"+row+"").click(function(){
  $('#modal_cost'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#modal_cost"+row+"").load('<?php echo base_url(); ?>index.php/share/costcode_id/'+row);
  });
  $('.cost').append(cost);
  
  var cost = '<div class="modal fade" id="openunit'+row+'" data-backdrop="false">'+
    '<div class="modal-dialog">'+
      '<div class="modal-content">'+
        '<div class="modal-header bg-info">'+
          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
        '</div>'+
        '<div class="modal-body">'+
          '<div id="modal_unit'+row+'"></div>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</div>';
  
  $(".unit"+row+"").click(function(){
  $('#modal_unit'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#modal_unit"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid/'+row);
  });
  $('.cost').append(cost);
  var cost =  '<div class="modal fade" id="openunitic'+row+'" data-backdrop="false">'+
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
  '</div>';
  
  $(".unitic"+row+"").click(function(){
  $('#modal_unitic'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#modal_unitic"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid2/'+row);
  });
  $('.cost').append(cost);
  var cost =  '<div class="modal fade" id="refass'+row+'" data-backdrop="false">'+
    '<div class="modal-dialog modal-lg">'+
      '<div class="modal-content">'+
        '<div class="modal-header bg-info">'+
          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>'+
        ' </div>'+
        '<div class="modal-body">'+
          '<div id="refasscode'+row+'"></div>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</div>';
 
  $('#refasset'+row+'').click(function(){
  $('#refasscode'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#refasscode"+row+"").load('<?php echo base_url(); ?>share/modalshare_asset/'+row);
  });
   $('.cost').append(cost);

  var cost =  '<div class="modal fade" id="boq'+row+'" data-backdrop="false">'+
    '<div class="modal-dialog modal-lg">'+
      '<div class="modal-content">'+
        '<div class="modal-header bg-info">'+
          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<h4 class="modal-title" id="myModalLabel">Cost Code <?php echo $tid; ?></h4>'+
        ' </div>'+
        '<div class="modal-body">'+
          '<div id="modal_boq'+row+'"></div>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</div>';
  
  $('#selectcostcodeboq'+row+'').click(function(){
     $('#closebg'+row+'').hide();
     $('#type_cost'+row+'').val("");
  var system = $('#system').val();
  $('#modal_boq'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#modal_boq"+row+"").load('<?php echo base_url(); ?>pr/model_costcodeboq_row/<?php echo $tid; ?>/'+system+'/'+row);
  });
  $('.cost').append(cost);
  var cost =  '<div class="modal fade" id="compare'+row+'" data-backdrop="false">'+
      '<div class="modal-dialog modal-full">'+
        '<div class="modal-content">'+
          '<div class="modal-header bg-info">'+
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<h4 class="modal-title" id="myModalLabel">History Price '+pri_matcode+'</h4>'+
          ' </div>'+
          '<div class="modal-body">'+
            '<div id="comparei'+row+'"></div>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>';
    
    $('#compareu'+row+'').click(function(){
    $('#comparei'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#comparei"+row+"").load('<?php echo base_url(); ?>share/compare_price/'+pri_matcode);
    });
    $('.cost').append(cost);


  $(document).on('click', 'a#remove'+row+'', function () { // <-- changes
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
  noty({
  force: true,
  text: 'Deleteted',
  type: 'success',
  layout: self.data('layout'),
  timeout: 1000,
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
  timeout: 1000,
  });
  }
  }
  ]
  });
  return false;
  });
    }
    


    });


$(".delclo2").click(function(){
$(".se<?php echo $id; ?>").hide();
});

$("#selectallpr").click(function(){
  $('#selectallpr').hide();
       var pri_id = '<?php echo $u->pri_id; ?>';
      var pri_matname = '<?php echo $u->pri_matname; ?>';
      var pri_matcode = '<?php echo $u->pri_matcode; ?>';
      var pri_ref = '<?php echo $u->pri_ref; ?>';
      var pri_costcode = '<?php echo $u->pri_costcode; ?>';
      var pri_costcodee = '<?php echo substr($u->pri_costcode, 0, 1); ?>';
      var pri_costname = '<?php echo $u->pri_costname; ?>';
      var pri_qty = '<?php echo $u->pri_qty - $u->pri_sumqty; ?>';
      var pri_sumqty = '<?php echo $u->pri_sumqty; ?>';
      var pri_unit = '<?php echo $u->pri_unit; ?>';
      var pri_priceunit = '<?php echo $u->pri_priceunit; ?>';
      var pri_amount = '<?php echo $u->pri_amount; ?>';
      var pri_discountper1 = '<?php echo $u->pri_discountper1; ?>';
      var pri_discountper2 = '<?php echo $u->pri_discountper2; ?>';
      var pri_discountper3 = '<?php echo $u->pri_discountper3; ?>';
      var pri_discountper4 = '<?php echo $u->pri_discountper4; ?>';
      var allpri = '<?php echo $u->pri_discountper1 + $u->pri_discountper2 + $u->pri_discountper3 + $u->pri_discountper4; ?>';
      var pri_disamt = '<?php echo $u->pri_disamt; ?>';
      var pri_vat = '<?php echo $u->pri_vat; ?>';
      var pri_remark = '<?php echo $u->pri_remark; ?>';
      var pri_netamt = '<?php echo $u->pri_netamt; ?>';
      var datesend = '<?php echo $u->datesend; ?>';
      var pri_status = '<?php echo $u->pri_status; ?>';
      var pri_pono = '<?php echo $u->pri_pono; ?>';
      var pri_count = '<?php echo $u->pri_count; ?>';
      var pr_asset = '<?php echo $u->pr_asset; ?>';
      var pr_assetid = '<?php echo $u->pr_assetid; ?>';
      var pr_assetname = '<?php echo $u->pr_assetname; ?>';
      var poi_qty = '<?php echo $u->poi_qty; ?>';
      var pri_cpqtyic = '<?php echo $u->pri_cpqtyic; ?>';
      var pri_pqtyic = '<?php echo ($u->pri_qty - $u->pri_sumqty) * $u->pri_cpqtyic; ?>';
      var pri_punitic = '<?php echo $u->pri_punitic; ?>';
      var pri_pdiscex = '<?php echo $u->pri_pdiscex; ?>';
      var pri_tovat = '<?php echo $u->pri_tovat; ?>';
      var pri_boqid = '<?php echo $u->pri_boqid; ?>';
      var pri_boqrow = '<?php echo $u->pri_boqrow; ?>';
      var type = '<?php echo $u->cost_type; ?>';
      var remark_mat = '<?php echo $u->remark_mat; ?>';
      var datesend = '<?php echo $u->datesend; ?>';

      var ckkcontrolbg = $('#ckkcontrolbg').val();

      if(ckkcontrolbg=="2"){
      var chk = 'hidden';
      var chk1 = '';
      }else{
      var chk = '';
      var chk1 = 'hidden';
      }

      addrow(pri_id,pri_matname,pri_matcode,pri_ref,pri_costcode,pri_costcodee,pri_costname,pri_qty,pri_sumqty,pri_unit,pri_priceunit,pri_amount,pri_discountper1,pri_discountper2,pri_discountper3,pri_discountper4,allpri,pri_disamt,pri_vat,pri_remark,pri_netamt,datesend,pri_status,pri_pono,pri_count,pr_asset,pr_assetid,pr_assetname,poi_qty,pri_cpqtyic,pri_pqtyic,pri_punitic,pri_pdiscex,pri_tovat,pri_boqid,pri_boqrow,type,remark_mat,chk,chk1,datesend);
      $("#chk<?php echo $u->pri_id; ?>").hide();
       function addrow(pri_id,pri_matname,pri_matcode,pri_ref,pri_costcode,pri_costcodee,pri_costname,pri_qty,pri_sumqty,pri_unit,pri_priceunit,pri_amount,pri_discountper1,pri_discountper2,pri_discountper3,pri_discountper4,allpri,pri_disamt,pri_vat,pri_remark,pri_netamt,datesend,pri_status,pri_pono,pri_count,pr_asset,pr_assetid,pr_assetname,poi_qty,pri_cpqtyic,pri_pqtyic,pri_punitic,pri_pdiscex,pri_tovat,pri_boqid,pri_boqrow,type,remark_mat,chk,chk1,datesend)
      {

      var row = ($('#detail_wo tr').length-0)+1;
      var tr = '<tr id="'+row+'">'+
        '<td>'+row+' </td>'+
        '<td>'+
          '<div class="checkbox checkbox-switchery switchery-xs">'+
            '<label>'+
              '<input type="checkbox"  id="a'+row+'" checked class="switchery">'+
              '<input type="hidden" name="chki[]" id="chki'+row+'" value="Y">'+
              '<input type="hidden" name="priidi[]" value="'+pri_id+'">'+
            '</label>'+
          '</div>'+
        '</td>'+
        ' <td id="smatcode'+row+'" width="10%"><div class="input-group"><input type="text" class="form-control" name="matcodei[]" id="matcodei" required  value="'+pri_matcode+'"><span class="input-group-btn"><a data-toggle="modal" data-target="#edit'+row+'" data-popup="tooltip" title="Edit" id="editfa'+row+'"   class="btn btn-default btn-icon"><i class="icon-search4"></i></a><a class="btn btn-default btn-icon" id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></i></a></span></div></td>'+
        '<td class="text-right" id="smatname'+row+'">'+pri_matname+'<input type="hidden" name="matnamei[]" id="matnametext'+row+'" value="'+pri_matname+'"></td>'+
        '<td class="text-right" id="scostcode'+row+'">'+pri_costcode+'<input type="hidden" name="costcodei[]" value="'+pri_costcode+'"><input type="hidden" name="costnamei[]" value="'+pri_costname+'"></td>'+
        '<td class="text-right" id="sqtyi'+row+'">'+numberWithCommas(pri_qty)+'<input type="hidden" name="qtyi[]" value="'+pri_qty+'"></td>'+
        '<td class="text-right" id="sunit'+row+'">'+numberWithCommas(pri_unit)+'<input type="hidden" name="uniti[]" value="'+pri_unit+'"></td>'+
        '<td class="text-right" id="spriceunit'+row+'">'+numberWithCommas(pri_priceunit)+'<input type="hidden" id="txt6 priceuniti'+row+'" name="priceuniti[]" value="'+pri_priceunit+'"></td>'+
        '<td class="text-right" id="samount'+row+'">'+numberWithCommas(pri_amount)+'<input type="hidden" name="amounti[]" id="amounti'+row+'" value="'+pri_amount+'"></td>'+
        '<td class="text-right" id="sdisone'+row+'">'+numberWithCommas(allpri)+'<input type="hidden" name="disci1[]" value="'+pri_discountper1+'"><input type="hidden" name="disci2[]" value="'+pri_discountper2+'"><input type="hidden" name="disci3[]" value="'+pri_discountper3+'"><input type="hidden" name="disci4[]" value="'+pri_discountper4+'"></td>'+
        '<td class="text-right" id="sdisamt'+row+'">'+numberWithCommas(pri_pdiscex)+'<input type="hidden" name="disamti[]" value="'+pri_pdiscex+'">'+
      '</td>'+
      '<td  class="text-right" id="tto_di'+row+'">'+numberWithCommas(pri_disamt)+'<input type="hidden" name="too_di[]" value="'+pri_disamt+'">'+
      '<td class="text-right" id="total_vat'+row+'">'+numberWithCommas(pri_tovat)+'<input type="hidden" name="to_vat[]" value="'+pri_tovat+'">'+
      '<td class="text-right" id="snetamt'+row+'">'+numberWithCommas(pri_netamt)+'<input type="hidden" name="netamti[]" id="zum4" value="'+pri_netamt+'">'+
      '<input type="hidden" name="remarki[]" id="sremark'+row+'" value="'+pri_remark+'">'+
      '<input type="hidden" name="accode[]" value="'+pr_assetid+'">'+
      '<input type="hidden" name="acname[]" value="'+pr_assetname+'">'+
      '<input type="hidden" name="statusass[]" value="'+pr_asset+'">'+
      '<input type="hidden" name="refprno[]" value="'+pri_ref+'">'+
      '<input type="hidden" name="type[]" value="'+type+'">'+
      '<input type="hidden" name="cqtyic[]" value="'+pri_cpqtyic+'">'+
      '<input type="hidden" name="pqtyic[]" value="'+pri_pqtyic+'">'+
      '<input type="hidden" name="punitic[]" value="'+pri_punitic+'">'+
      '<input type="hidden" name="reamrki[]" value="'+pri_remark+'">'+
      '<input type="hidden" name="remark_mat[]" value="'+remark_mat+'">'+
      '<input type="hidden" name="datesend[]" value="'+datesend+'">'+
      '<input type="hidden" class="type_cost"  name="type_cost[]">'+
      
    '</td>'+
    '<td style="color:#BEBEBE;">'+row+'</td>'+
  '</tr>';


    $('#detail_wo').append(tr);

    var rowmat = '<div id="edit'+row+'" class="modal fade" data-backdrop="false">'+
    '<div class="modal-dialog modal-lg">'+
      '<div class="modal-content">'+
        '<div class="modal-header">'+
          '<h5 class="modal-title">Edit '+pri_matname+'</h5>'+
        '</div>'+
        '<div class="modal-body">'+
          '<div class="row">'+
            '<div class="col-xs-6">'+
              '<label for="">รายการซื้อ  <button id="compareu'+row+'" data-toggle="modal" data-target="#compare'+row+'" class="label bg-warning-400">History Price <i class="icon-balance"></i></button> </label>'+
              '<div class="form-group" id="error'+row+'">'+
                '<input type="text" id="newmatname'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control " value="'+pri_matname+'" readonly="">'+
                '<input type="text" id="newmatcode'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control " value="'+pri_matcode+'" disabled>'+
              '</div>'+
            '</div>'+
            '<div class="col-xs-6">'+
              '<label for="">รายการต้นทุน </label>'+
              '<div class="input-group">'+
                '<input type="text" id="costnameint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+pri_costname+'">'+
                '<input type="text" id="codecostcodeint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+pri_costcode+'">'+
                '<input type="hidden" id="chkhidden'+row+'" readonly="true" placeholder="" class="form-control " value="'+pri_boqid+'">'+
                '<input type="hidden" id="costmatsub'+row+'" readonly="true" placeholder="" class="form-control " value="'+pri_costcodee+'">'+
                '<input type="hidden" id="type'+row+'" value="'+type+'">'+
                '<span class="input-group-btn '+chk1+'" ><button class="btn btn-primary" id="selectcostcodeboqi'+row+'" data-toggle="modal" data-target="#boqi'+row+'"><span class="glyphicon glyphicon-search"></span></button></span>'+
                '<span class="input-group-btn '+chk+'" ><a class="costcode'+row+' btn btn-primary" data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span> </a></span>'+
              '</div>'+
            '</div>'+
          '</div>'+
          '<div class="row">'+
            '<div class="col-md-6">'+
              '<div class="form-group">'+
                '<label for="qty">รายละเอียดเพิ่มเติม</label>'+
                '<input type="text" id="remark_mat'+row+'" name="remark_mat"  class="form-control text-right" value="'+remark_mat+'">'+
              '</div>'+
             '</div>'+

              '<div class="col-md-3">'+
                 '<div class="form-group">'+
                  '<label for="type_cost'+row+'">Type of Cost</label>'+
                  '<select id="type_cost'+row+'" class="form-control">'+
                  '<option value=""></option>'+
                      '<option value="1">MATERIAL</option>'+
                      '<option value="2">LABOR.</option>'+
                      '<option value="3">SUB CON</option>'+
                    '</select>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-12">'+
                '<hr>'+
              '</div>'+
            '</div>'+

            '<div id="closebg'+row+'">'+
            '<div class="row">'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="qty">ปริมาณ</label>'+
                  '<input type="text" id="pqty'+row+'" name="qty"  placeholder="กรอกปริมาณ" class="form-control text-right" value="'+pri_qty+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="qty">คงเหลือ</label>'+
                  '<input type="text"   placeholder="กรอกปริมาณ" class="form-control text-right" value="'+pri_qty+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-xs-6">'+
                '<div class="input-group">'+
                  '<label for="unit">หน่วย</label>'+
                  '<input type="text" id="punit'+row+'" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control  text-right" value="'+pri_unit+'">'+
                  '<span class="input-group-btn" >'+
                    '<a class="unit'+row+' btn btn-primary" data-toggle="modal" data-target="#openunit'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> </a>'+
                  '</span>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="qty">แปลงค่า IC</label>'+
                  '<input type="text" id="cpqtyic'+row+'" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="'+pri_cpqtyic+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="qty">ปริมาณ IC</label>'+
                  '<input type="text" id="pqtyic'+row+'" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="'+pri_pqtyic+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-6">'+
                '<div class="input-group">'+
                  '<label for="unit">หน่วย IC</label>'+
                  '<input type="text" id="punitic'+row+'" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control text-right " value="'+pri_punitic+'">'+
                  '<span class="input-group-btn" >'+
                  '<a class="unitic'+row+' btn btn-primary" data-toggle="modal" data-target="#openunitic'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> </a>'+
                  '</span>'+
                '</div>'+
              '</div>'+
            '</div>'+
            ' <div class="row">'+
              '<div class="col-md-6">'+
                ' <div class="form-group">'+
                  '<label for="price_unit">ราคา/หน่วย</label>'+
                  '<input type="number" id="pprice_unit'+row+'"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg text-right" value="'+pri_priceunit+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-6">'+
                ' <div class="form-group">'+
                  '<label for="amount">จำนวนเงิน</label>'+
                  '<input type="text" id="pamount'+row+'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="'+pri_amount+'">'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  ' <label for="endtproject">ส่วนลด 1 (%)</label>'+
                  '<input type="number" id="pdiscper1'+row+'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper1+'" />'+
                '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="endtproject">ส่วนลด 2 (%)</label>'+
                  ' <input type="number" id="pdiscper2'+row+'" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper2+'" />'+
                '</div>'+
              '</div>'+
              ' <div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="endtproject">ส่วนลด 3 (%)</label>'+
                  '<input type="number" id="pdiscper3'+row+'" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper3+'" />'+
                '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<label for="endtproject">ส่วนลด 4 (%)</label>'+
                  '<input type="number" id="pdiscper4'+row+'" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper4+'" />'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-6">'+
                ' <div class="form-group">'+
                  '<label for="endtproject">ส่วนลดพิเศษ</label>'+
                  '<input type="number" id="pdiscex'+row+'" name="discountper2" class="form-control text-right" value="'+pri_pdiscex+'"/>'+
                '</div>'+
              '</div>'+
              '<div class="col-md-4">'+
                '<div class="form-group">'+
                  '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'+
                  '<input type="text" id="pdisamt'+row+'" name="disamt" class="form-control text-right" value="'+pri_disamt+'" readonly="true"/>'+
                  '<input type="hidden" name="too_di" id="too_di'+row+'" value="0">'+
                  '<input type="hidden" name="tot_vat[]" id="tot_vat'+row+'" value="0">'+
                '</div>'+
              ' </div>'+
             
            '</div>'+
            '<div class="row" '+chk1+' id="removecost">'+
              '<div class="col-xs-3">'+
                '<div class="form-group">'+
                  '<label>Budget Control</label>'+
                  '<input class="form-control text-right border-danger" type="text" name="totalcost[]" id="totalcost'+row+'"  readonly="">'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-2">'+
                '<div class="form-group">'+
                  '<label for="endtproject">vat</label>'+
                  '<input type="text" id="to_vats'+row+'" name="to_vat" class="form-control text-right" value="'+pri_tovat+'" readonly="true"/>'+
                '</div>'+
              '</div>'+
              '<div class="col-md-2">'+
                '<div class="form-group">'+
                  '<label for="endtproject">จำนวนเงินสุทธิ</label>'+
                  '<input type="text" id="pnetamt'+row+'" name="netamt" class="form-control text-right" value="'+pri_netamt+'" readonly="true"/>'+
                '</div>'+
              ' </div>'+
              '<div class="col-md-8">'+
                '<div class="form-group">'+
                  '<label for="endtproject">หมายเหตุ</label>'+
                  '<input type="text" id="premark'+row+'" name="remark" class="form-control" value="'+pri_remark+'"/>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-md-6">'+
                ' <input type="hidden" name="poid" value="">'+
              ' </div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-xs-6">'+
                ' <label for="">Ref. Asset Code</label>'+
                '<div class="input-group">'+
                  '<input type="text" id="accode'+row+'" name="accode"  readonly="true"  class="form-control " value="'+pr_assetid+'">'+
                  '<input type="text" id="acname'+row+'" name="acname" readonly="true"  class="form-control " value="'+pr_assetname+'">'+
                  '<input type="hidden" id="statusass'+row+'" name="statusass" readonly="true"  class="form-control " value="'+pr_asset+'">'+
                  '<input type="hidden" id="refprno'+row+'" name="refprno[]" value="'+pri_ref+'">'+
                  '<span class="input-group-btn" >'+
                    '<a class="btn btn-info" id="refasset'+row+'" data-toggle="modal" data-target="#refass'+row+'"><span class="glyphicon glyphicon-search"></span> </a>'+
                  '</span>'+
                '</div>'+
              '</div>'+
                '<div class="col-xs-6">'+
                    '<div class="form-group">'+
                        '<label for="datesend ">Delivery Date</label>'+
                       ' <input type="date" class="form-control" id="datesend'+row+'" name="datesend" value="'+datesend+'" style="width: 200px">'+
                      '</div>'+
                  '</div>'+
            '</div>'+
          

          '<div class="modal-footer">'+
            '<a id="insertpodetail'+row+'" class="btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</a>'+
          '</div>'+
          '</div>'+
          '</div>'+
        '</div>'+
      ' </div>'+
    '</div>';
    $('.rowmat').append(rowmat);

     $('#closebg'+row+'').hide();
          $('#closebg'+row+'').hide();
     $("#type_cost"+row+"").change(function(){
      var codecostcodeint = $('#codecostcodeint'+row+'').val();
      var type_cost = $("#type_cost"+row+"").val();
      if(type_cost==1){
        $("#closebg"+row+"").show();
        if(ckkcontrolbg==2){
        
        var costcodecc = $('#costbgmat'+codecostcodeint+'').val();
        $("#totalcost"+row+"").val(costcodecc);
        var costbgm = $('#costbgmat'+codecostcodeint+'').val();
        if(isNaN(costbgm)){
                      $('#totalcost'+row+'').val(0);
                         swal({
                        title: "Over budget.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                      });
                      $("#closebg"+row+"").hide();
                      $("#pprice_unit"+row+"").val('0');
                      $("#pdisamt"+row+"").val('0');
                      $("#pamount"+row+"").val('0');
                      $("#to_vat"+row+"").val('0');
                      $("#pnetamt"+row+"").val('0');
                                              
                      }
        var controlmat = $('#controlmat'+codecostcodeint+'').val();
        if(controlmat=="1"){

        if (parseFloat(costbgm) < parseFloat(pri_disamt)) {
        swal({
        title: "Over budget.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#pprice_unit"+row+"").val('0');
        $("#pdisamt"+row+"").val('0');
        $("#pamount"+row+"").val('0');
        $("#to_vat"+row+"").val('0');
        $("#pnetamt"+row+"").val('0');
        }
      }


    }
      }else if(type_cost==2){
        $("#closebg"+row+"").show();
        if(ckkcontrolbg==2){
  
        var costcodecc = $('#costbglebour'+codecostcodeint+'').val();
        $("#totalcost"+row+"").val(costcodecc);
        var costbgl = $('#costbglebour'+codecostcodeint+'').val();

        if(isNaN(costbgl)){
                      $('#totalcost'+row+'').val(0);
                         swal({
                        title: "Over budget.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                      });
                      $("#closebg"+row+"").hide();
                      $("#pprice_unit"+row+"").val('0');
                      $("#pdisamt"+row+"").val('0');
                      $("#pamount"+row+"").val('0');
                      $("#to_vat"+row+"").val('0');
                      $("#pnetamt"+row+"").val('0');
                                              
                      }

        var controllebour = $('#controllebour'+codecostcodeint+'').val();
        if(controllebour=="1"){
        if (parseFloat(costbgl) < parseFloat(pri_disamt)) {
        swal({
        title: "Over budget.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#pprice_unit"+row+"").val('0');
        $("#pdisamt"+row+"").val('0');
        $("#pamount"+row+"").val('0');
        $("#to_vat"+row+"").val('0');
        $("#pnetamt"+row+"").val('0');
        }
      }
    }
        
      }else if(type_cost==3){
        $("#closebg"+row+"").show();
        if(ckkcontrolbg==2){
  
        var costcodecc = $('#costbgsub'+codecostcodeint+'').val();
        $("#totalcost"+row+"").val(costcodecc);
        var costbgl = $('#costbgsub'+codecostcodeint+'').val();

        if(isNaN(costbgl)){
                      $('#totalcost'+row+'').val(0);
                         swal({
                        title: "Over budget.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                      });
                      $("#closebg"+row+"").hide();
                      $("#pprice_unit"+row+"").val('0');
                      $("#pdisamt"+row+"").val('0');
                      $("#pamount"+row+"").val('0');
                      $("#to_vat"+row+"").val('0');
                      $("#pnetamt"+row+"").val('0');
                                              
                      }

        var controlsub = $('#controlsub'+codecostcodeint+'').val();
        if(controlsub=="1"){
        if (parseFloat(costbgl) < parseFloat(pri_disamt)) {
        swal({
        title: "Over budget.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
        });
        $("#pprice_unit"+row+"").val('0');
        $("#pdisamt"+row+"").val('0');
        $("#pamount"+row+"").val('0');
        $("#to_vat"+row+"").val('0');
        $("#pnetamt"+row+"").val('0');
        }
      }
    }
      }else if(type_cost==""){
        $("#closebg"+row+"").hide();
      }


    });

     $('#pprice_unit'+row+',#pqty'+row+', #pdiscex'+row+",#pdiscper1"+row+",#pdiscper2"+row +",#pdiscper3"+row+",#pdiscper4"+row).keyup(function(){
  //    var ckkcontrolbg = $('#ckkcontrolbg').val();
  //     if(ckkcontrolbg==2){
  //    if(isNaN(totalcost)) {
  //     $("#closebg"+row+"").hide();
  //     $('#type_costhide').hide();
  //     $("#type_cost"+row+"").val("");
  //     $("#costnameint"+row+"").val("");
  //     $("#codecostcodeint"+row+"").val("");
  //     $("#pprice_unit"+row+"").val("");
      

  //     swal({
  //     title: "ไม่มีรายการ Budget",
  //     text: "",
  //     confirmButtonColor: "#EA1923",
  //     type: "error"
  //     });
  //   }
  // }
  var xqty = parseFloat($('#pqty'+row+'').val().replace(/,/g,"")*1);
  var xprice = parseFloat($('#pprice_unit'+row+'').val().replace(/,/g,"")*1);
  var xamount = xqty*xprice;
  var xdiscper1 = parseFloat($('#pdiscper1'+row+'').val().replace(/,/g,"")*1);
  var xdiscper2 = parseFloat($('#pdiscper2'+row+'').val().replace(/,/g,"")*1);
  var xdiscper3 = parseFloat($('#pdiscper3'+row+'').val().replace(/,/g,"")*1);
  var xdiscper4 = parseFloat($('#pdiscper4'+row+'').val().replace(/,/g,"")*1);
  var xdiscper5 = parseFloat($('#pdiscex'+row+'').val().replace(/,/g,"")*1);
  var xvatt = parseFloat($('#vatper').val().replace(/,/g,"")*1);
  var xpd1 = xamount - (xamount*xdiscper1)/100;
  var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
  var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
  var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
  var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
  var total_di = xamount-xpd4;
  var xvat = parseFloat($('#vatper').val().replace(/,/g,"")*1);
  var chkhidden = parseFloat($('#chkhidden'+row+'').val().replace(/,/g,"")*1);
  $('#pamount'+row+'').val(numberWithCommas(xamount));
  $('#too_di'+row+'').val(total_di);
  //                 //alert(xpd8)
  $('#to_vats'+row+'').val(numberWithCommas(xpd8));
  //$("[name='^to_vat']").val(xvatt)
  //$('#to_vats'+row+'').val(xpd8);
  // $("")
  $('#tot_vat'+row+'').val(xvatt);
  // error
  if(xdiscper5 != 0){
  vxpd4 = xpd4-xdiscper5;
  $('#pdisamt'+row+'').val(numberWithCommas(vxpd4));
  $('#too_di'+row+'').val(numberWithCommas(vxpd4));
  vxpd5 = (xpd4-xdiscper5) + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd5));
  }
  else if(xdiscper2 != 0){
  $('#pdisamt'+row+'').val(numberWithCommas(xpd4));
  $('#too_di'+row+'').val(numberWithCommas(xpd4));
  vxpd2 = xpd4 + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd2));
  }
  else if(xdiscper3 != 0){
  $('#pdisamt'+row+'').val(numberWithCommas(xpd4));
  $('#too_di'+row+'').val(numberWithCommas(xpd4));
  vxpd3 = xpd4 + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd3));
  }
  else if(xdiscper4 != 0){
  $('#pdisamt'+row+'').val(numberWithCommas(xpd4));
  $('#too_di'+row+'').val(numberWithCommas(xpd4));
  vxpd5 = xpd4 + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd5));
  }
  else
  {
  $('#pdisamt'+row+'').val(numberWithCommas(xpd1));
  $('#too_di'+row+'').val(numberWithCommas(xpd1));
  vxpd1 = xpd4 + xpd8;
  $('#pnetamt'+row+'').val(numberWithCommas(vxpd1));
  }
  var ckkcontrolbg = $('#ckkcontrolbg').val();
  //alert(ckkcontrolbg);
  if(ckkcontrolbg=="2"){
  //alert(ckkcontrolbg);
  var type_cost = $("#type_cost"+row+"").val();

  var codecostcodeint = $('#codecostcodeint'+row+'').val();
  if(type_cost==1){
  var controlmat = $('#controlmat'+codecostcodeint+'').val();
  if(controlmat=="1"){
  var costbg = $('#costbgmat'+codecostcodeint+'').val();
  $('#totalcost'+row+'').val(costbg-xpd1);
  //alert(totalcost);
  var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
  var costcodecc = $('#costbgmat'+codecostcodeint+'').val();
  if (parseFloat(totalcost) < parseFloat("0")) {
  swal({
  title: "Over budget.",
  text: "",
  confirmButtonColor: "#EA1923",
  type: "error"
  });
  $("#pprice_unit"+row+"").val('0');
  $("#pdisamt"+row+"").val('0');
  $("#pamount"+row+"").val('0');
  $("#totalcost"+row+"").val(costcodecc);
  $("#to_vats"+row+"").val('0');
  $("#pnetamt"+row+"").val('0');
  }
  }
  }else if(type_cost==2){
  var controllebour = $('#controllebour'+codecostcodeint+'').val();
        if(controllebour=="1"){
  var costbg = parseFloat($('#costbglebour'+codecostcodeint+'').val().replace(/,/g,""));
  $('#totalcost'+row+'').val(costbg-xpd1);
  //alert(totalcost);
  var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
  var costcodecc = $('#costbglebour'+codecostcodeint+'').val();
  if (parseFloat(totalcost) < parseFloat("0")) {
  swal({
  title: "Over budget.",
  text: "",
  confirmButtonColor: "#EA1923",
  type: "error"
  });
  $("#pprice_unit"+row+"").val('0');
  $("#pdisamt"+row+"").val('0');
  $("#pamount"+row+"").val('0');
  $("#totalcost"+row+"").val(costcodecc);
  $("#to_vats"+row+"").val('0');
  $("#pnetamt"+row+"").val('0');
  }
}

  }else if(type_cost==3){
  var controlsub = $('#controlsub'+codecostcodeint+'').val();
        if(controlsub=="1"){
  var costbg = parseFloat($('#costbgsub'+codecostcodeint+'').val().replace(/,/g,""));
  $('#totalcost'+row+'').val(costbg-xpd1);
  //alert(totalcost);
  var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
  var costcodecc = $('#costbgsub'+codecostcodeint+'').val();
  if (parseFloat(totalcost) < parseFloat("0")) {
  swal({
  title: "Over budget.",
  text: "",
  confirmButtonColor: "#EA1923",
  type: "error"
  });
  $("#pprice_unit"+row+"").val('0');
  $("#pdisamt"+row+"").val('0');
  $("#pamount"+row+"").val('0');
  $("#totalcost"+row+"").val(costcodecc);
  $("#to_vats"+row+"").val('0');
  $("#pnetamt"+row+"").val('0');
  }
}

  }  //if parseFloa
  }// if ckkcontrolbg
  });

      $("#insertpodetail"+row+"").click(function(){
    var xdiscper1 = parseFloat($('#pdiscper1'+row+'').val());
    var xdiscper2 = parseFloat($('#pdiscper2'+row+'').val());
    var xdiscper3 = parseFloat($('#pdiscper3'+row+'').val());
    var xdiscper4 = parseFloat($('#pdiscper4'+row+'').val());
    var sumxdic = xdiscper1+xdiscper2+xdiscper3+xdiscper4;
    if ($("#newmatcode"+row+"").val()!="") {
    $("#smatcode"+row+"").html("<div class='input-group'><input type='text' class='form-control ' name='matcodei[]' id='matcodei' required  value="+$("#newmatcode"+row+"").val()+"><span class='input-group-btn'><a data-toggle='modal' data-target='#edit"+row+"' id='editcost"+row+"' class='btn btn-default btn-icon'><i class='icon-search4'></i><a class='btn btn-default btn-icon' id='remove"+row+"' data-popup='tooltip' title='' data-original-title='Remove' data-layout='bottomRight' data-type='confirm'><i class='icon-trash'></i></a></a></span><input type='hidden' name='chkbgadd[]' id='chkbgadd' value='1'></div>");
    $("#matnametext"+row+"").val($('#newmatname'+row+'').val());
    $("#scostcode"+row+"").html('<a class="editable editable-clicks">'+$("#codecostcodeint"+row+"").val()+'</a><input type="hidden" name="costcodei[]" value='+$("#codecostcodeint"+row+"").val()+'><input type="hidden" name="costnamei[]" value='+$("#costnameint"+row+"").val()+'><input type="hidden" name="chkhidden[]" value='+$("#chkhidden"+row+"").val()+'><input type="hidden" name="costmatsub[]" value='+$("#costmatsub"+row+"").val()+'>');
    $("#scostname"+row+"").html('<a class="editable editable-clicks">'+$("#costnameint"+row+"").val()+'</a>');
    $("#sqtyi"+row+"").html("<a class='editable editable-clicks'>"+$("#pqty"+row+"").val()+"</a><input type='hidden' name='qtyi[]' id='qtyi"+row+"' value="+$("#pqty"+row+"").val()+"><input type='hidden' name='cqtyic[]' value="+$("#cpqtyic"+row+"").val()+"><input type='hidden' name='pqtyic[]' value="+$("#pqtyic"+row+"").val()+">");
    $("#spriceunit"+row+"").html("<input type='text' name='priceuniti[]' value="+$("#pprice_unit"+row+"").val()+"   class='txt form-control input-sm text-right' readonly><input type='hidden' name='punitic[]' value="+$("#punitic"+row+"").val()+">");
    $("#sunit"+row+"").html("<a class='editable editable-clicks'>"+$("#punit"+row+"").val()+"</a><input type='hidden' name='uniti[]' value="+$("#punit"+row+"").val()+">");
    $("#samount"+row+"").html("<input class='txt1 form-control input-sm text-right' type='text' id='amounti"+row+"' name='amounti[]' value="+$("#pamount"+row+"").val()+" readonly>");
    $("#sdisone"+row+"").html("<input class='form-control input-sm text-right' type='text' id='disall"+row+"'  value="+sumxdic+" readonly><input class='form-control input-sm' type='hidden' name='disci1[]' id='disci1"+row+"' value="+$("#pdiscper1"+row+"").val()+" readonly><input class='form-control input-sm' type='hidden' name='disci2[]' id='disci2"+row+"' value="+$("#pdiscper2"+row+"").val()+" readonly><input class='form-control input-sm' type='hidden' name='disci3[]' id='disci3"+row+"' value="+$("#pdiscper3"+row+"").val()+" readonly><input  class='form-control input-sm' type='hidden' name='disci4[]' id='disci4"+row+"' value="+$("#pdiscper4"+row+"").val()+" readonly>");
    $("#sdisamt"+row+"").html("<input type='text' class='txt2 form-control input-sm text-right' name='disamti[]'  id='zum1"+row+"' value="+$("#pdiscex"+row+"").val()+" readonly>");
    $("#tto_di"+row+"").html("<input type='text' class='txt3 form-control input-sm text-right' name='too_di[]' id='zum2"+row+"' value="+$("#pdisamt"+row+"").val()+" readonly>");
    $("#total_vat"+row+"").html("<input type='text' class='txt4 form-control input-sm text-right' name='to_vat[]' id='zum3"+row+"' value="+$("#to_vats"+row+"").val()+" readonly><input type='hidden' class='form-control input-sm text-right' name='type_cost[]'  value="+$("#type_cost"+row+"").val()+" readonly><input type='hidden' class=' form-control input-sm text-right' name='datesend[]'  value="+$("#datesend"+row+"").val()+" readonly>");
    $("#snetamt"+row+"").html("<input type='text' class='txt5 form-control input-sm text-right' name='netamti[]' id='zum4' value="+$("#pnetamt"+row+"").val()+" readonly><input type='hidden' name='reamrki[]' value="+$("#premark"+row+"").val()+"><input type='hidden' name='accode[]' value="+$("#accode"+row+"").val()+"><input type='hidden' name='acname[]' value="+$("#acname"+row+"").val()+"><input type='hidden' name='statusass[]' value="+$("#statusass"+row+"").val()+"><input type='hidden' name='type[]' value="+$("#type"+row+"").val()+"><input type='hidden' name='remark_mat[]' value="+$("#remark_mat"+row+"").val()+">");
    
    
    var type_cost = $("#type_cost"+row+"").val();

    // $("#costbgmat"+costcode+"").val(totalcost);
    if(type_cost==1){
    var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
    var costcode = $('#codecostcodeint'+row+'').val();
    var pamount = parseFloat($('#pamount'+row+'').val().replace(/,/g,""));
    var costbgmat = parseFloat($('#costbgmat'+costcode+'').val().replace(/,/g,""));
    $("#costbgmat"+costcode+"").val(costbgmat-pamount);
    }else if(type_cost==2){
    var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
    var costcode = $('#codecostcodeint'+row+'').val();
    var pamount = parseFloat($('#pamount'+row+'').val().replace(/,/g,""));
    var costbglebour = parseFloat($('#costbglebour'+costcode+'').val().replace(/,/g,""));
    $("#costbglebour"+costcode+"").val(costbglebour-pamount);
    }else if(type_cost==3){
    var totalcost = parseFloat($('#totalcost'+row+'').val().replace(/,/g,""));
    var costcode = $('#codecostcodeint'+row+'').val();
    var pamount = parseFloat($('#pamount'+row+'').val().replace(/,/g,""));
    var costbgsub = parseFloat($('#costbgsub'+costcode+'').val().replace(/,/g,""));
    $("#costbgsub"+costcode+"").val(costbgsub-pamount);
    }


    
    

    
    $("#editcost"+row+"").click(function() {
    var rowsum_di = parseFloat($("#amounti"+row+"").val().replace(/,/g,""));

    var type_cost = $("#type_cost"+row+"").val();
    var costcodetype = $("#codecostcodeint"+row+"").val();
    if(type_cost==1){
    var costbg = parseFloat($('#costbgmat'+$("#codecostcodeint"+row+"").val()+'').val().replace(/,/g,""));
    $('#costbgmat'+costcodetype+'').val(costbg+rowsum_di);
    $('#totalcost'+row+'').val(costbg+rowsum_di);
    }else if(type_cost==2){
    var costbg = parseFloat($('#costbglebour'+$("#codecostcodeint"+row+"").val()+'').val().replace(/,/g,""));
    $('#costbglebour'+costcodetype+'').val(costbg+rowsum_di);
    $('#totalcost'+row+'').val(costbg+rowsum_di);
    }else if(type_cost==3){
    var costbg = parseFloat($('#costbgsub'+$("#codecostcodeint"+row+"").val()+'').val().replace(/,/g,""));
    $('#costbgsub'+costcodetype+'').val(costbg+rowsum_di);
    $('#totalcost'+row+'').val(costbg+rowsum_di);
    }
    // alert(''+$("#codecostcodeint"+row+"").val()+'');
    });
    
    }else{
    swal({
    title: "Please Chack!",
    text: "Material Code Not Found",
    confirmButtonColor: "#2196F3"
    });
    $("#error"+row+"").attr("class", "input-group has-error has-feedback");
    $("#newmatname"+row+"").focus();
    }
    if ( parseFloat($("#pprice_unit"+row+"").val().replace(/,/g,"")) != 0 ) {
    }else{
    swal({
    title: "Unit Price Not Found!",
    text: "Unit Price Not Found",
    confirmButtonColor: "#2196F3"
    });
    }
    });
    $('#chk'+row+'').click(function(event) {
    if($('#chk'+row+'').prop('checked')) {
    $('#newmatname'+row+'').prop('disabled', false);
    } else {
    $('#newmatname'+row+'').prop('disabled', true);
    }
    });


var cost =  '<div class="modal fade" id="costcode'+row+'" data-backdrop="false">'+
    '<div class="modal-dialog modal-full">'+
      '<div class="modal-content">'+
        '<div class="modal-header bg-info">'+
          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>'+
        '</div>'+
        '<div class="modal-body">'+
          '<div id="modal_cost'+row+'"></div>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</div>';
  
  $(".costcode"+row+"").click(function(){
  $('#modal_cost'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#modal_cost"+row+"").load('<?php echo base_url(); ?>index.php/share/costcode_id/'+row);
  });
  $('.cost').append(cost);
  var cost = '<div class="modal fade" id="openunit'+row+'" data-backdrop="false">'+
    '<div class="modal-dialog">'+
      '<div class="modal-content">'+
        '<div class="modal-header bg-info">'+
          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
        '</div>'+
        '<div class="modal-body">'+
          '<div id="modal_unit'+row+'"></div>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</div>';
 
  $(".unit"+row+"").click(function(){
  $('#modal_unit'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#modal_unit"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid/'+row);
  });
   $('.cost').append(cost);
  var cost =  '<div class="modal fade" id="openunitic'+row+'" data-backdrop="false">'+
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
  '</div>';
  
  $(".unitic"+row+"").click(function(){
  $('#modal_unitic'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#modal_unitic"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid2/'+row);
  });
  $('.cost').append(cost);
  var cost =  '<div class="modal fade" id="refass'+row+'" data-backdrop="false">'+
    '<div class="modal-dialog modal-lg">'+
      '<div class="modal-content">'+
        '<div class="modal-header bg-info">'+
          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>'+
        ' </div>'+
        '<div class="modal-body">'+
          '<div id="refasscode'+row+'"></div>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</div>';
 
  $('#refasset'+row+'').click(function(){
  $('#refasscode'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
  $("#refasscode"+row+"").load('<?php echo base_url(); ?>share/modalshare_asset/'+row);
  });
   $('.cost').append(cost);
  var cost =  '<div class="modal fade" id="boqi'+row+'" data-backdrop="false">'+
    '<div class="modal-dialog modal-lg">'+
      '<div class="modal-content">'+
        '<div class="modal-header bg-info">'+
          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<h4 class="modal-title" id="myModalLabel">Cost Code <?php echo $tid; ?></h4>'+
        ' </div>'+
        '<div class="modal-body">'+
          '<div id="modal_boqi'+row+'"></div>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</div>';
  
  
  $('#selectcostcodeboqi'+row+'').click(function(){
    var system = $('#system').val();
    $('#closebg'+row+'').hide();
    $('#type_cost'+row+'').val("");
    $('#modal_boqi'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_boqi"+row+"").load('<?php echo base_url(); ?>pr/model_costcodeboq_row/<?php echo $tid; ?>/'+system+'/'+row);
    });
  $('.cost').append(cost);

  var cost =  '<div class="modal fade" id="compare'+row+'" data-backdrop="false">'+
      '<div class="modal-dialog modal-full">'+
        '<div class="modal-content">'+
          '<div class="modal-header bg-info">'+
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<h4 class="modal-title" id="myModalLabel">History Price '+pri_matcode+'</h4>'+
          ' </div>'+
          '<div class="modal-body">'+
            '<div id="comparei'+row+'"></div>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>';
    
    $('#compareu'+row+'').click(function(){
    $('#comparei'+row+'').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#comparei"+row+"").load('<?php echo base_url(); ?>share/compare_price/'+pri_matcode);
    });

    $('.cost').append(cost);


  $(document).on('click', 'a#remove'+row+'', function () { // <-- changes
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
  noty({
  force: true,
  text: 'Deleteted',
  type: 'success',
  layout: self.data('layout'),
  timeout: 1000,
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
  timeout: 1000,
  });
  }
  }
  ]
  });
  return false;
  });
    }
});

      </script>
      <?php $n++; } ?>