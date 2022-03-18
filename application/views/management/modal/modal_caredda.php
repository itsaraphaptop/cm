<?php echo $type; ?>
	<?php
	if($type=="income"){
      $this->db->select('*');
      $this->db->where('inv_duedate',$duedate);
      $this->db->where('inv_status',"Y");
      $this->db->join('ar_invprogress_detail','ar_invprogress_detail.inv_ref = ar_invprogress_header.inv_no');
      $qqq = $this->db->get('ar_invprogress_header')->result();

  }
      ?>
<?php if($type=="income"){ ?>


<div class="table-responsive" id="invoicedown">
                <table class="table table-hover table-bordered table-striped table-xxs">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Job</th>
                      <th class="text-center">Progress Amount</th>
                      <th class="text-center">Less Adv</th>
                      <th class="text-center">VAT</th>
                      <th class="text-center">Less Ref</th>
                      <th class="text-center">Less W/T</th>
                      <th class="text-center">Receipt Net Amount</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php $n=1; 
                        $inv_progressamt = 0; 
                        $inv_lessadvance = 0;
                        $inv_vatamt = 0;
                        $inv_lessretention = 0;
                        $inv_lesswt = 0;
                        $inv_netamt = 0;
                        foreach ($qqq as $key) { 
                   $inv_progressamt = $inv_progressamt+$key->inv_progressamt;
                   $inv_lessadvance = $inv_lessadvance+$key->inv_lessadvance;
                   $inv_vatamt = $inv_vatamt+$key->inv_vatamt;
                   $inv_lessretention = $inv_lessretention+$key->inv_lessretention;
                   $inv_lesswt = $inv_lesswt+$key->inv_lesswt;
                   $inv_netamt = $inv_netamt+$key->inv_netamt;
                    ?>
                  
                  <tr>
                    <td class="text-center"><?php echo $n; ?></td>
                    <td class="text-center"><?php  if($key->inv_system=="1"){
                      echo "OVERHEAD";
                      }else if($key->inv_system=="2"){
                       echo "AC";
                        }else if($key->inv_system=="3"){
                         echo "EE";
                        }else if($key->inv_system=="4"){
                           echo "SN";
                        }else if($key->inv_system=="5"){
                           echo "CIVIL";
                        } ?></td>
                    <td class="text-right"><?php echo number_format($key->inv_progressamt,2); ?></td>
                    <td class="text-right"><?php echo number_format($key->inv_lessadvance,2); ?></td>
                    <td class="text-right"><?php echo number_format($key->inv_vatamt,2); ?></td>
                    <td class="text-right"><?php echo number_format($key->inv_lessretention,2); ?></td>
                    <td class="text-right"><?php echo number_format($key->inv_lesswt,2); ?></td>
                    <td class="text-right"><?php echo number_format($key->inv_netamt,2); ?></td>

                  </tr>
                   <?php $n++; } ?> 
                    
                      <tr style="color: red;">
                    <td class="text-center" colspan="2"><b>TOTAL</b></td>
                    <td class="text-right"><b><?php echo number_format($inv_progressamt,2); ?></b></td>
                    <td class="text-right"><b><?php echo number_format($inv_lessadvance,2); ?></b></td>
                    <td class="text-right"><b><?php echo number_format($inv_vatamt,2); ?></b></td>
                    <td class="text-right"><b><?php echo number_format($inv_lessretention,2); ?></b></td>
                    <td class="text-right"><b><?php echo number_format($inv_lesswt,2); ?></b></td>
                    <td class="text-right"><b><?php echo number_format($inv_netamt,2); ?></b></td>

                    
                  </tr>       
                  </tbody>
                </table>
              </div>


<?php } ?>
<?php
        $this->db->select('*');
      $this->db->where('apv_duedate',$duedate);
      $this->db->join('apv_detail','apv_header.apv_code = apv_detail.apvi_ref');
      $cc = $this->db->get('apv_header')->result();

?>

<?php if($type=="expen"){   ?>

<div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped table-xxs">
                          <thead>
                            <tr>
                              <th width="5%"></th>   
                              <th width="5%">JOB</th>
                              <th width="5%">Material Code</th>
                              <th width="10%">Material Name</th>
                              <th width="5%">Cost Code</th>
                              <th width="10%">amount</th>
                              
                            </tr>
                          </thead>
                          <?php 
                          $apvi_amount = 0;
                          foreach ($cc as $keycc) { 
                            $apvi_amount = $apvi_amount+$keycc->apvi_amount;

                           
                            ?>
                          <tr>
                            <td><?php echo $keycc->apvi_ref; ?></td>
                            <td><?php echo $keycc->apvi_system; ?></td>
                            <td><?php echo $keycc->apvi_matcode; ?></td>
                            <td><?php echo $keycc->apvi_matname; ?></td>
                            <td><?php echo $keycc->apvi_costcode; ?></td>
                            <td align="right"><?php echo $keycc->apvi_amount; ?></td>
                          </tr>
                          <?php } ?>
                              <tbody>
                                <tr>
                                  <td colspan="5" align="center">summary</td>
                                  <td align="right"><?php echo number_format($apvi_amount,2); ?></td>
                                
                                </tr>
                              </tbody>
                        </table>
                      </div>
<?php } ?>