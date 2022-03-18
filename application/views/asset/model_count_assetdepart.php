<table class="table table-xxs table-hover datatable-basicxctop" >

<thead>
<tr>
<th>No.</th>
<th>Date</th>
<th>Project / Department</th>
<th>Asset Code</th>
<th>Asset Name</th>
<th>Amount</th>
<th>User By</th>
<th>Status</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>

<?php $n=1;?>
<?php foreach ($res as $val){ ?>
<tr id="chk<?php echo $n;?>">
<th scope="row"><?php echo $n;?></th>
<td><div style="width: 150px;"><?php echo $val->fa_assdate; ?></div></td>
<td><?php echo $val->fa_projectname; ?><?php echo $val->fa_departmentname; ?></td>
<td><?php echo $val->fa_assetcode; ?></td>
<td><?php echo $val->fa_asset; ?></td>
<td><?php echo $val->fa_amount; ?></td>
<td><?php echo $val->fa_lisename; ?></td>
<td><?php if($val->fa_status==1){
    echo '<span class="label label-info">Normal</span>';
  }else if($val->fa_status==2){
     echo '<span class="label bg-teal help-inline">Repair</span>';
    }else if($val->fa_status==3){
     echo '<span class="label label-danger">Write Off</span>';
    } ?></td>
<td><a id="insertpodetail<?php echo $n; ?>" class="btn btn-primary">เลือก</a></td>
</tr>



<script>

  $("#insertpodetail<?php echo $n; ?>").click(function(){  
  
    var assetcode = '<?php echo $val->fa_assetcode; ?>';
    var assetname = '<?php echo $val->fa_asset; ?>';
    var fa_sr = '<?php echo $val->fa_sr; ?>';
    var fa_lisename = '<?php echo $val->fa_lisename; ?>';
    var fa_liseid = '<?php echo $val->fa_liseid; ?>';
    var fa_quantity = '<?php echo $val->fa_quantity; ?>'
    var fa_residual = '<?php echo $val->fa_residual; ?>'

    

     addrow(assetcode,assetname,fa_sr,fa_liseid,fa_lisename,fa_quantity,fa_residual);

      $("#chk<?php echo $n;?>").hide();   

 });

 function addrow(assetcode,assetname,fa_sr,fa_liseid,fa_lisename,fa_quantity,fa_residual)
            {
             
              var row = ($('#body tr').length-0);
              
              var tr = '<tr id="'+row+'">'+
                      '<td>'+row+'</td>'+
                        '<td>'+assetcode+'<input type="hidden" name="transfer_assetcode[]" value="'+assetcode+'"><input type="hidden" name="chki[]" value="Y"></td>'+
                        '<td><div style="width:200px;">'+assetname+'</div><input type="hidden" name="transfer_assetname[]" value="'+assetname+'" ></td>'+
                        '<td><div  style="width:150px;">'+fa_sr+'</div><input type="hidden" name="transfer_sr[]" value="'+fa_sr+'"></td>'+       
                        '<td>'+fa_quantity+'<input type="hidden" name="transfer_quantity[]" value="'+fa_quantity+'"></td>'+
                        '<td>'+fa_liseid+'<input type="hidden" name="transfer_liseid[]" value="'+fa_liseid+'"></td>'+
                        '<td><div  style="width:100px;">'+fa_lisename+'</div><input type="hidden" name="transfer_lisename[]" value="'+fa_lisename+'"></td>'+
                        '<td>'+fa_residual+'<input type="hidden" name="transfer_residual[]" value="'+fa_residual+'"></td>'+
                        '<td class="text-center"><input type="checkbox" name="checktranfer[]" id="checktranfer" value="1"></td>'+
                        '<td><input type="text" name="transfer_remark[]" class="form-control input-sm"></td>'+
                        '<td><a id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>'+
                         
'</tr>';

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
 
      $('#body').append(tr);


            }

     
</script>
  
<?php $n++; } ?>
</tbody>

</table>

<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxctop").DataTable();

  
</script>





