<table class="table table-hover table-xxs table-responsive">
  <thead>
    <tr>
      <th width="5%">#</th>
      <th width="15%">Cost Code</th>
      <th width="15%">A/C</th>
      <th width="25%">A/C Name</th>
      <th >Dr</th>
      <th >Cr</th>
    </tr>
  </thead>
	<tbody id="">

 				<?php  foreach ($taxgl as $val) {  					
 				 $i=1; 
            $this->db->select('*');
            $this->db->from('syscode');
            $queryy=$this->db->get()->result();
            
              foreach ($queryy as $mtt ) { 
              $yvat =$mtt->pac_taxvat_due;
              }
            
            $this->db->select('*');
            $this->db->from('account_total');
            $this->db->where('act_code',$yvat);
            $yy=$this->db->get()->result();
            
              foreach ($yy as $yst ) { 
              $yact_name =$yst->act_name;
              }
            ?>  
					<tr>
 			      <td><?php echo "VAT"; ?></td>
 			      <td><input type="text" class="form-control input-sm" name="" id="" ></td>
           <td id="yesvat1"><input type="text" class="form-control input-sm" name="ac_no[]" id="ac_no<?php echo $i; ?>" value="<?php echo $yvat; ?>"></td>
            <td id="yesvat2"><input type="text" class="form-control input-sm" readonly="true" name="act_name" value="<?php echo $yact_name; ?>" ></td>
 						<td><input type="text" name="drvat" id="drvat<?php echo $i;?>"  value="<?php echo $val->api_vatamt; ?>" class="form-control text-right"></td>
 						<td><input type="text" name="crvat" id="crvat<?php echo $i;?>" class="form-control text-right" value="0"></td>
			</tr>
      <?php $i++; } 

      foreach ($taxgl as $val) {  
			 $n=$i++; 
            $this->db->select('*');
            $this->db->from('syscode');
            $queryy=$this->db->get()->result();
            

              foreach ($queryy as $mtt ) { 
              $vattt =$mtt->pac_taxvat_nodoc;
              }
            

            $this->db->select('*');
            $this->db->from('account_total');
            $this->db->where('act_code',$vattt);
            $aa=$this->db->get()->result();
            
              foreach ($aa as $st ) { 
              $act_name =$st->act_name;
              }
            ?>  
					<tr>
 			      <td><?php echo "VAT"; ?></td>
 			      <td><input type="text" class="form-control input-sm" name="" id="" ></td>
           <td id="yesvat1"><input type="text" class="form-control input-sm" name="ac_no[]" id="ac_no<?php echo $n; ?>" value="<?php echo $vattt; ?>"></td>
            <td id="yesvat2"><input type="text" class="form-control input-sm" readonly="true" name="act_name" value="<?php echo $act_name; ?>" ></td>
 						<td><input type="text" name="drvat" id="drvat<?php echo $n;?>" class="form-control text-right" value="0"></td>
 						<td><input type="text" name="crvat" id="crvat<?php echo $n;?>" value="<?php echo $val->api_vatamt; ?>" class="form-control text-right"></td>
			</tr>
      <?php $n++; } ?>
	</tbody>
</table>
