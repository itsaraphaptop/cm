<?php  foreach ($res as $apo) { 
      ?>
      <table class="table table-hover table-xxs table-responsive">
        <thead>
          <tr>
            <th>#</th>
            <th class="text-center" width="15%"></th>
            <th>Account Code</th>
            <th>Account Name</th>
            <th>Cost Code</th>
            <th class="text-center">Dr</th>
            <th class="text-center">Cr</th>
          </tr> 
        </thead>
        <tbody id="">
          <?php 
            $this->db->select('*');
            $this->db->from('syscode');
            $rest=$this->db->get()->result();
          ?>
          <?php 
            foreach ($rest as $pacrest ) { 
              $ap_pac = $pacrest->pac_vender_inmat;
            }
          ?>

          <?php 
            $this->db->select('*');
            $this->db->from('account_total');
            $this->db->where('act_code',$ap_pac);
            $appac=$this->db->get()->result();
          ?>
          <?php 
            foreach ($appac as $ap_pacv ) { 
              $appacv = $ap_pacv->act_name;
            }
          ?>         
          <?php $m=1;?>
           
         <tr>
            <td><?php echo $m; ?></td>
            <td><input type="text" class="form-control" readonly="true" name="" id="" value="<?php echo "VENDER" ?>"></td> 
            <td><input type="text" readonly="true" class="form-control input-sm" name="ac_no[]" value="<?php echo $pacrest->pac_vender_inmat; ?>"></td>
            <td><input type="text" class="form-control input-sm" value="<?php echo  $ap_pacv->act_name; ?>"></td>
            <td><input type="text" class="form-control input-sm" value=""></td>
            <td><input type="text" class="form-control input-sm text-right" name="dr[]" value="" id="dr<?php echo $m; ?>" ></td>
            <td><input type="text" class="form-control input-sm text-right" name="cr[]" id="cra" value="0" ></td>
          </tr>
          <?php $m++;  ?>
                 
          <?php 
            $this->db->select('*');
            $this->db->from('syscode');
            $query=$this->db->get()->result();
          ?>
          <?php 
            foreach ($query as $mtt ) { 
            $vat =$mtt->pac_taxvat_nodue;
            $yvat =$mtt->pac_taxvat_due;
            }
          ?>
          <?php 
            $this->db->select('*');
            $this->db->from('account_total');
            $this->db->where('act_code',$vat);
            $vatt=$this->db->get()->result();
          ?>
          <?php 
            foreach ($vatt as $svatt ) { 
            $act_name =$svatt->act_name;
            }
          ?>
          <?php 
            $this->db->select('*');
            $this->db->from('account_total');
            $this->db->where('act_code',$yvat);
            $yvatt=$this->db->get()->result();
          ?>
          <?php 
            foreach ($yvatt as $yyvatt ) { 
            $act_namee = $yyvatt->act_name;
            }
          ?>      
              
          <?php $n=$m++;?>
          <?php 
            if ($apo->tax=="") {
          ?>
          <tr>
            <td><?php echo $n; ?></td>
            <td><input type="text" class="form-control" readonly="true" name="" id="" value="<?php echo "VAT" ?>"></td> 
           
            <td><input type="text" readonly="true" class="form-control input-sm" nname="ac_no[]" value="<?php echo $vat; ?>"></td>
            <td><input type="text" readonly="true" class="form-control input-sm" value="<?php echo $act_namee; ?>"></td>
            <td><input type="text" class="form-control input-sm" value=""></td>
            <td><input type="text" class="form-control input-sm text-right" name="dr[]" 
            id="dr" value="0">
            </td>
            <td><input type="text" class="form-control input-sm text-right" name="cr[]"
            id="crv"  value=""></td>
          </tr>
          <?php }else{
          ?>
          <tr>
            <td><?php echo $n; ?></td>
            <td><input type="text" class="form-control" readonly="true" name="" id="" value="<?php echo "VAT" ?>"></td> 
           
            <td><input type="text" readonly="true" class="form-control input-sm" name="ac_no[]" value="<?php echo $yvat; ?>"></td>
            <td><input type="text"  readonly="true" class="form-control input-sm" value="<?php echo $act_namee; ?>"></td>
            <td><input type="text"  class="form-control input-sm" value=""></td>
            <td><input type="text" class="form-control input-sm text-right" name="dr[]" 
            id="dr" value="0">
            </td> 
            <td><input type="text" class="form-control input-sm text-right" name="cr[]"
            id="crv"  value=""></td>
          </tr>
          <?php } $n++;  ?>

          <?php for ($i=3; $i < 4; $i++) { ?>
          <?php 
            $this->db->select('*');
            $this->db->from('syscode');
            $queryy=$this->db->get()->result();
          ?>
          <?php 
            foreach ($queryy as $mtt ) { 
              $prcostt =$mtt->pac_cost_cont;
              }
          ?>
          <?php 
            $this->db->select('*');
            $this->db->from('account_total');
            $this->db->where('act_code',$prcostt);
            $aa=$this->db->get()->result();
          ?>
          <?php 
            foreach ($aa as $st ) { 
            $act_name =$st->act_name;
            }
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><input type="text" class="form-control" readonly="true" name="" id="" value="<?php echo "AMOUNT" ?>"></td> 
            <td><input type="text" readonly="true" class="form-control input-sm" name="ac_no[]" value="<?php echo  $prcostt; ?>"></td>
            <td><input type="text" readonly="true" class="form-control input-sm" value="<?php echo $act_name; ?>"></td>
            <td><input type="text" name="costcode[]" class="form-control input-sm" value="<?php echo $apo->ex_costcode; ?>"></td>
            <td><input type="text" class="form-control input-sm text-right" name="dr[]" 
            id="dr" value="0">
            </td>
            <td><input type="text" class="form-control input-sm text-right" name="cr[]"
            id="crven"  value=""></td>
          </tr>
          <?php }   ?>
        </tbody>
      </table>
      <?php  } ?> 
      </tbody>
    </table>
