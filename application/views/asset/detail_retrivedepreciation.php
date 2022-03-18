<table>
  <table class="table table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                      
                               <th style="text-align: center;">No</th>
                               <th style="text-align: center;">Asset Code</th>   
                               <th style="text-align: center;">Asset Name</th>
                               <th style="text-align: center;">Buy Date</th>
                               <th style="text-align: center;">Amount</th>
                               <th style="text-align: center;">Residual</th>
                               <th style="text-align: center;">%</th>
                               <th style="text-align: center;">Dep Bf.</th>
                               <th style="text-align: center;">Date Fr.</th>
                               <th style="text-align: center;">Date to</th>
                               <th style="text-align: center;">Day</th>
                               <th style="text-align: center;">Dep. This Periond</th>
                               <th style="text-align: center;">ProjectNo.</th>
                               <th style="text-align: center;">Job</th>
                               <th style="text-align: center;">Dept.</th>
                               <th style="text-align: center;">Dep. Met.</th>
                               <th style="text-align: center;">Year</th>
                               <th style="text-align: center;">A/C Dr.</th>
                               <th style="text-align: center;">Cost Code</th>
                               <th style="text-align: center;">PO No.</th>
                               <th style="text-align: center;">AP No.</th>
                               <th style="text-align: center;">Action</th>

                      </tr>
   
<?php $n=1; $assamout=0; $residual=0; $assper=0; $periond=0; foreach ($res as $key){ 
$assamout = number_format($assamout+$key->de_assamout);
$residual = number_format($residual+$key->de_residual);
$assper = number_format($assper+$key->de_assbf);
$periond = number_format($periond+$key->de_periond);
	?>
<tr>            

                              <td style="text-align: center;"><?php echo $n; ?><input type="hidden" name="chki[]" id="chki<?php echo $n; ?>"></td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_ass" name="de_ass[]" value="<?php echo $key->de_ass ;  ?>" style="width: 150px;"></td>   
                               <td style="text-align: center;">
                              <input readonly="true" type="text" class="form-control" id="de_assname" name="de_assname[]" value="<?php echo $key->de_assname;?>" style="width: 200px;">
                               </td>
                               <td style="text-align: center;">
                                <input readonly="true" type="text" class="form-control" id="de_assdate<?php echo $n; ?>" name="de_assdate[]" value="<?php  echo $key->de_assdate; ?>" style="width: 120px;">
                               </td>
                               <td style="text-align: center;">
                                      <input readonly="true" type="text" class="form-control" id="de_assamout<?php echo $n; ?>" name="de_assamout[]" value="<?php echo $key->de_assamout;  ?>" style="width: 120px;">
                               </td>
                               <td style="text-align: center;">
                              <input readonly="true" type="text" class="form-control" id="de_residual" name="de_residual[]" value="<?php echo $key->de_residual;  ?>" style="width: 80px;">
                               </td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_asspe<?php echo $n; ?>" name="de_assper[]" value="<?php echo $key->de_assper;  ?>" style="width: 80px;"></td>
                              
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_assbf" name="de_assbf[]" value="<?php echo $key->de_assbf; ?>" style="width: 150px; text-align: right;"></td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="datefr<?php echo $n; ?>" name="de_fr[]" value="<?php echo $key->de_fr; ?>" style="width: 100px;"></td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="dateto<?php echo $n; ?>" name="de_to[]" value="<?php echo $key->de_to; ?>" style="width: 100px;"></td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="day<?php echo $n; ?>" name="de_day[]" value="<?php echo $key->de_day; ?>" style="width: 50px;"></td>
                               <td style="text-align: center;">
            <input type="text" class="form-control" id="de_periond<?php echo $n; ?>" name="de_periond[]" value="<?php echo $key->de_periond; ?>" style="width: 200px; text-align: right;" >
                               </td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_pjname" name="de_pjname[]" value="<?php echo $key->de_pjname;?>" style="width: 200px;"><input readonly="true" type="hidden" class="form-control" id="de_pjid" name="de_pjid[]" value="<?php echo $key->de_pjid;?>"></td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_job" name="de_job[]" value="<?php echo $key->de_job;?>" style="width: 100px;"></td>

                               <td style="text-align: center;">
                               <?php if($key->de_dpmname==""){
                                    echo '-';
                               }else{
                                    echo '<input readonly="true" type="text" class="form-control" id="de_dpmname" name="de_dpmname[]" value="'.$key->de_dpmname.'" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_dpmid" name="de_dpmid[]" value="'.$key->de_dpmid.'" style="width: 100px;">';
                                    } ?></td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_met" name="de_met[]" value="<?php echo $key->de_met;?>" style="width: 100px;"></td>    
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_year" name="de_year[]" value="<?php echo $key->de_year;?>" style="width: 100px;"></td>    
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_at_acaid" name="de_at_acaid[]" value="<?php echo $key->de_at_acaid;?>" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_ataca" name="de_ataca[]" value="<?php echo $key->de_ataca;?>" style="width: 100px;"></td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_acdid" name="de_acdid[]" value="<?php echo $key->de_acdid;?>" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_acd" name="de_acd[]" value="<?php echo $key->de_acd;?>" style="width: 100px;"></td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_costid" name="de_costid[]" value="<?php echo $key->de_costid;?>" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_cost" name="de_cost[]" value="<?php echo $key->de_cost;?>" style="width: 100px;"></td>
                               <td style="text-align: center;"><input readonly="true" type="text" class="form-control" id="de_acaccid" name="de_acaccid[]" value="<?php echo $key->de_acaccid;?>" style="width: 100px;"><input readonly="true" type="hidden" class="form-control" id="de_acacc" name="de_acacc[]" value="<?php echo $key->de_acacc;?>" style="width: 100px;"></td>
                               
                               <td style="text-align: center;"><a id="remove<?php echo $n; ?>" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>
                                
                               </td>
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


                    </script>

                      <?php $n++; } ?>

                                         <tr><th  colspan="22"></th></tr>
<tr>
      <td colspan="4" style="text-align: center;" width="10%">Total</td>
      <td><p align="center"><?php echo $assamout; ?></p></td>
      <td><p align="center"><?php echo $residual; ?></p></td>
      <td></td>
      <td><p align="center"><?php echo $assper;?></p></td>
      <td colspan="3" style="text-align: center;"></td>
      <td><p align="center"><?php echo $periond; ?></p></td>
      <td colspan="10" style="text-align: center;"></td>
</tr>

</table>