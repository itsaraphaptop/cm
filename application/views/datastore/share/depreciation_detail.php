 <div class="col-md-12">
 <br>
 <div id="table table-responsive">
              <table class="table table-bordered table-striped table-hover table-xxs" >
                           <thead>
                             <tr>
                               <th width="5%" style="text-align: center;">Year.</th>
                               
                               <th style="text-align: center;">Operation</th>
                               <th style="text-align: center;">%</th>
                               <th style="text-align: center;">Value</th>
                               <th style="text-align: center;">Remark</th>
          
                               
                             </tr>
                           </thead>
                           <tbody id="tbody">
                           <?php  foreach ($res as $u) {?>
                              <tr>
                                <td><?php echo $u->depreciation_y; ?></td>
                                <td><?php echo $u->depreciation_operation; ?></td>
                                <td><?php echo $u->depreciation_per; ?></td>
                                <td><?php echo $u->depreciation_value; ?></td>
                                <td><?php echo $u->depreciation_remark; ?></td>
                               
                              </tr>
                              <?php  } ?>
                        
                      
                   
   </tbody>
    
                         </table>
                        </div>
                        </div>

