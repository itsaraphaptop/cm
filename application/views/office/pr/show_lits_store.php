<div class="col-lg-3">
    <div class="form-group">
        <label>Project Store Open</label>
        <select class="form-control" id="select_pj">
          <?php
              foreach ($data_project as $key => $data) {
          ?>
              <option value="<?= $data->project_id ?>"><?= $data->project_name ?></option>
          <?php
              }
          ?>
        </select>

    </div>
</div>
<div class="col-lg-3">
  <div class="form-group">
    <label>Qty</label>
    <input type="text" class="form-control" id="qty_store">
  </div>
</div>
<div class="col-lg-3">
  <div class="form-group">
    <label>Ware House</label>
    <input type="text" class="form-control" id="whname" readonly="true">
    <input type="hidden" class="form-control" id="whcode" readonly="true">
  </div>
</div>
<div class="col-lg-3">
  <div class="form-group"><br/><br/>
    <span class="booking_pr label label-danger" style="cursor:pointer">PR Booking</span>
  </div>
</div>


<script type="text/javascript">
  $('#select_pj').click(function(event) {
    var pj = $(this).val();
    var mat = '<?= $mat ?>'
    $.ajax({
      url: '<?= base_url() ?>office/qty_store',
      type: 'POST',
      data: {pj_id: pj, mat_code: mat},
    }).done(function(data) {
        var json = jQuery.parseJSON(data);

        console.log(data);
        $('#qty_store').val(json.qty);
        $('#qty_store').attr('qty_max', json.qty);
        $('#whname').val(json.whname);
        $('#whcode').val(json.whcode);
        
        $('#qty_store').keyup(function(event) {
          
            var qty = $('#qty_store').val();
            var qty_max = $('#qty_store').attr('qty_max');

            if ((qty*1) > (qty_max*1)) {
              // alert(qty_max);
              $('#qty_store').val('');
            }

        });


    });
    

  });

  $('.booking_pr').click(function(event) {
    
      var costname_chk = $('#costname').val()*1;
        if (costname_chk == "") {
        swal('Oops...','กรุณาเลือก Cost Code!','error')
        return false;
      }

      var unit = $('#unit').val();
      var qty_max = $('#qty_store').attr('qty_max');
      var mat_name = $('#newmatname').val();
      var mat_code = $('#newmatcode').val();
      var cost_name = $('#costname').val();
      var cost_code = $('#codecostcode').val();
      var project_name = $('#select_pj option:selected').text();
      var pj = $('#select_pj').val();
      var qty = $('#qty_store').val();
      var whname = $('#whname').val();
      var whcode = $('#whcode').val();
      var price_unit = $('#pprice_unit').val();
      var row = ($('#booking tr').length-0)+1;
      var add_booking = '<tr id="row'+row+'">'+
                        '<td><a class="del" row="'+row+'"><i class="icon-trash"></i></a></td>'+
                        '<td><input type="checkbox" value="'+row+'" class="checkbox_booking"></td>'+
                        '<td>'+
                        '<input type="text" readonly="true" class="mat_code form-control" id="mat_code'+row+'" value="'+mat_code+'" />'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" readonly="true" class="mat_name form-control" id="mat_name'+row+'" value="'+mat_name+'" />'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" readonly="true" class="cost_code form-control" id="cost_code'+row+'" value="'+cost_code+'" />'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" readonly="true" class="cost_name form-control" id="cost_name'+row+'" value="'+cost_name+'" />'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" readonly="true" class="qty form-control" id="qty'+row+'" value="'+qty+'" max_qty="'+qty_max+'" />'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" readonly="true" class="unit form-control" id="unit'+row+'" value="'+unit+'" />'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" readonly="true" class="project_name form-control" id="project_name'+row+'" value="'+project_name+'" />'+
                        '<input type="hidden" readonly="true" class="pj form-control" id="pj'+row+'" value="'+pj+'" />'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" readonly="true" class="whname form-control" id="whname'+row+'" value="'+whname+'" />'+
                        '<input type="hidden" id="whcode'+row+'" class="whcode" value="'+whcode+'" />'+
                        '<input type="hidden" id="price_unit'+row+'" class="price_unit" value="'+price_unit+'" />'+
                        '</td>'+
                        '</tr>';

      $('#booking').append(add_booking);

      $('#newmatname').val('');
      $('#newmatcode').val('');
      $('#select_pj').val('');
      $('#qty_store').val('');
      $('#whname').val('');
      $('#whcode').val('');
      $('#costname').val('');
      $('#codecostcode').val('');
      $('#unit').val('');
      $('#select_pj').val('');
      $('#pprice_unit').val('');
      // alert(mat_name+qty)



      $('.del').click(function(event) {
        var row = $(this).attr('row');
        swal({
          title: "Deleted ?",
          text: "คุณต้องการลบรายการนี้ใช่ไหม!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "ยืนยัน",
          closeOnConfirm: false
        },
        function(){
          $('#row'+row).parent().remove();
          swal("Deleted!", "Your imaginary file has been deleted.", "success");
        });
      });
    
  });



</script>