<style>
.no_border {
  color: #2b2828;
    background-color: rgba(85, 85, 85, 0);
    border: aliceblue;
    text-align: right;

}
</style>
<div id="cost_center" class="table-responsive">
<table class="table table-hover table-bordered table-striped table-xxs">
    <thead>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">Project Name</th>
        <th class="text-center">Cost code</th>
        <th class="text-center">Cost Name</th>
        <th class="text-center">Expense Code</th>        
        <th class="text-center">Amount</th>
        <th class="text-center">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; $to=0; foreach ($pe as $ex) {  ?>
      <tr>
      <td><?php echo $i; ?>
        <?php 
            $subheader = substr($ex->pettycashi_costcode,0,1);

            if ($subheader != "G") {

                $subde = substr($ex->pettycashi_costcode,1,6);

            }else{
                
                $subde = $ex->pettycashi_costcode;    
                
            }
        ?>
            <input type="hidden" name="sub_cost[]" value="<?php echo $subde; ?>">
      </td>
      <td><input type="hidden" name="cost_project[]" value="<?php echo $ex->project; ?>"><?php echo $ex->project_name; ?></td>
      <td><input type="hidden" name="cost_costcode[]" value="<?php echo $ex->pettycashi_costcode; ?>"><?php echo $ex->pettycashi_costcode; ?></td>
      <td><?php echo $ex->pettycashi_costname; ?></td>
      <td><?php echo $ex->pettycashi_expenscode; ?></td>
      <td><?php echo $ex->pettycashi_unitprice; ?></td>
      
     
      <td><input type="hidden" name="cost_amount[]" value="<?php echo $ex->pettycashi_amounttot; ?>"><?php echo $ex->pettycashi_amounttot; ?></td>

      <?php $i++; $to=$to+$ex->pettycashi_amounttot; } ?>
    </tr>
    <tr>
        <td colspan="6"> </td>
        <td><input type="hidden" name="cost_amountto[]" value="<?php echo $to; ?>"><?php echo $to; ?></td>
    </tr>
  </tbody>
</table>
</div>

<script>
  $(document).on('click', 'a#remove', function () {
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
</script>