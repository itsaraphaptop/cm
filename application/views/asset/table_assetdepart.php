<?php $n=1; foreach ($res as $val){ ?>

<tr id="<?php echo $n; ?>">
        <td><?php echo $n; ?></td>
        <td><?php echo $val->fa_assetcode; ?><input type="hidden" name="transfer_assetcode[]" value="<?php echo $val->fa_assetcode; ?>"><input type="hidden" name="chki[]" value="Y"></td>
        <td><div style="width:200px;"><?php echo $val->fa_asset; ?></div><input type="hidden" name="transfer_assetname[]" value="<?php echo $val->fa_asset; ?>" ></td>
        <td><div  style="width:150px;"><?php echo $val->fa_sr; ?></div><input type="hidden" name="transfer_sr[]" value="<?php echo $val->fa_sr; ?>"></td> 
        <td><?php echo $val->fa_quantity; ?><input type="hidden" name="transfer_quantity[]" value="<?php echo $val->fa_quantity; ?>"></td>
        <td><?php echo $val->fa_liseid; ?><input type="hidden" name="transfer_liseid[]" value="<?php echo $val->fa_liseid; ?>"></td>
        <td><div  style="width:100px;"><?php echo $val->fa_lisename; ?></div><input type="hidden" name="transfer_lisename[]" value="<?php echo $val->fa_lisename; ?>"></td>
        <td><?php echo $val->fa_residual; ?><input type="hidden" name="transfer_residual[]" value="<?php echo $val->fa_residual; ?>"></td>
        <td class="text-center"><input type="checkbox" name="checktranfer[]" id="checktranfer" value="1"></td>
        <td><input type="text" name="transfer_remark[]" class="form-control input-sm"></td>
        <td><a id="remove<?php echo $n; ?>" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
                         
</tr>


<script>
	$(document).on('click', 'a#remove<?php echo $n; ?>', function () { // <-- changes
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


            
</script>
<?php $n++; } ?>