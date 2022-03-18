<table class="datatable-basic table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Material Code</th>
      <th>Material Name</th>
      <th>Qty</th>
      <th>Unit</th>
      <th>Project</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 1;
    foreach ($data_project as $key => $value) {
  ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $value->store_matcode ?></td>
      <td><?= $value->store_matname ?></td>
      <td id="<?= $value->store_matcode ?>" balance="<?= $value->store_qty ?>"><?= $value->store_qty ?></td>
      <td><?= $value->store_unit ?></td>
      <td><?= $value->project_name ?></td>
      <td>
        <span class="select label label-success" id="select<?= $value->store_matcode ?>" matcode="<?= $value->store_matcode ?>" matname="<?= $value->store_matname ?>" unit="<?= $value->store_unit ?>" wh="<?= $value->wh ?>" project_id="<?= $value->project_id ?>" unitprice="<?= $value->unitprice ?>" style="cursor:pointer" data-dismiss="modal">select</span>
      </td>
    </tr>
  <?php
    }
  ?>
  </tbody>
</table>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
  $('.datatable-basic').DataTable();

  $('.select').click(function(event) {
    var matcode = $(this).attr('matcode');
    var matname = $(this).attr('matname');
    var project_id = $(this).attr('project_id');
    var wh = $(this).attr('wh');
    var qty = $('#'+matcode).attr('balance');
    var unit = $(this).attr('unit');
    var unitprice = $(this).attr('unitprice');
    
    var row = ($('#body tr').length-0)+1;
    var add_row = '<tr>'+
            '<td>'+
            '<a class="del" row="'+row+'"><i class="icon-trash"></i></a>'+
            '</td>'+
            '<td>'+row+'</td>'+
            '<td>'+
            '<input type="hidden" name="wh[]" value="'+wh+'">'+
            '<input readonly="true" class="form-control" id="mat_code'+row+'" name="mat_code[]" type="text" value="'+matcode+'" >'+
            '</div>'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" id="mat_name'+row+'" name="mat_name[]" value="'+matname+'" readonly="true">'+
            '</td>'+
            '<td>'+
            '<div class="input-group">'+
            '<input readonly="true" type="text" id="codecostcodei'+row+'" name="cost_code[]" class="form-control">'+
            '<span style="cursor:pointer" row_num="'+row+'" class="cost_code input-group-addon bg-info" data-toggle="modal" data-target="#boq">'+
            '<i class="icon-search4"></i>'+
            '</span>'+
            '</div>'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" id="costnamei'+row+'" name="cost_name[]" readonly="true">'+
            '</td>'+
            '<td>'+
            '<input type="number" class="qty form-control" num_row="'+row+'" matcode="'+matcode+'" id="qty'+row+'" qty="'+qty+'" name="qty[]" value="0">'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" id="unit" name="unit[]" readonly="true" value="'+unit+'">'+
            '<input type="hidden" id="pj_id" name="pj_id[]" readonly="true" value="'+project_id+'">'+
            '<input type="hidden" id="qty_max" name="qty_max[]" readonly="true" value="'+qty+'">'+
            '<input type="hidden" id="unitprice" name="unitprice[]" readonly="true" value="'+unitprice+'">'+
            '</td>'+
            '</tr>';
    $('#body').append(add_row);

    // $(this).hide();
    $('#select_pj').hide();
    $('.qty').keyup(function(event) {
      var row = $(this).attr('num_row');
      var matcode = $(this).attr('matcode');
      var qty = ($(this).attr('qty')*1);
      var key_qty = ($(this).val()*1);
      if(key_qty > qty) {
        swal('Over Limit','กรอกเกินของใน Store!','error');
        $(this).val('0');
      }
      var _sum = qty-key_qty;
      if (_sum == 0) {
        $('#select'+matcode).attr('style', 'display:none');
      }
      $('#'+matcode).attr('balance',_sum);
      $('#'+matcode).text(_sum);

    });



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
        var qty = $('#qty'+row).val();
        var matcode = $('#qty'+row).attr('matcode');
        $('#'+matcode).attr('balance',qty);
        $('#'+matcode).text(qty);
        $('#qty'+row).parent().parent().remove();
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      });
    });

    $('.cost_code').click(function(){
      var row_p = $(this).attr('row_num');
      $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
      $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode/'+row_p);
    });


  });


</script>