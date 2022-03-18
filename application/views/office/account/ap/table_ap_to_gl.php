<?php 
$samtdr = 0;
$samtcr = 0;
foreach ($ap2 as $k3) { 
$samtdr = $samtdr+$k3->amtdr;
$samtcr = $samtcr+$k3->amtcr;
}
?>

<?php 
foreach ($ap as $k) { 
?>



<?php 
if($datatype=="all"){
$this->db->select('*');
$this->db->where('ap_gl.vchdate >=', $start);
$this->db->where('ap_gl.vchdate <=', $stop);
$this->db->where('ap_gl.acct_no', $k->acct_no);
$this->db->where('ap_gl.costcode', $k->costcode);
$this->db->where('ap_gl.projectid',$k->projectid);
$this->db->where('ap_gl.systemcode',$k->systemcode);
$this->db->where('ap_gl.status',NULL); 
$query = $this->db->get('ap_gl');
$res = $query->result();
$amtdr = 0; 
$amtcr = 0;
foreach ($res as $k2) {
	$amtdr = $amtdr+$k2->amtdr;
	$amtcr = $amtcr+$k2->amtcr; 
}
}else{
$this->db->select('*');
$this->db->where('ap_gl.vchdate >=', $start);
$this->db->where('ap_gl.vchdate <=', $stop);
$this->db->where('ap_gl.doctype', $datatype);
$this->db->where('ap_gl.acct_no', $k->acct_no);
$this->db->where('ap_gl.costcode', $k->costcode);
$this->db->where('ap_gl.projectid',$k->projectid);
$this->db->where('ap_gl.systemcode',$k->systemcode);
$this->db->where('ap_gl.status',NULL); 
$query = $this->db->get('ap_gl');
$res = $query->result();
$amtdr = 0; 
$amtcr = 0;
foreach ($res as $k2) {
	$amtdr = $amtdr+$k2->amtdr;
	$amtcr = $amtcr+$k2->amtcr; 
}
}
?>

<?php 
$this->db->select('*');
$this->db->where('costcode_d',$k->costcode);
$cost_sub = $this->db->get('cost_subgroup')->result();
$costname = "";
foreach ($cost_sub as $s) {
	$costname = $s->cgroup_name5;
}
?>


<tr>
	<td><?php echo $k->acct_no; ?> || <?php echo $k->act_name; ?> 
	<input type="hidden" name="acct_no[]" value="<?php echo $k->acct_no; ?>">
	<input type="hidden" name="act_name[]" value="<?php echo $k->act_name; ?>">	
	</td>
	<td><?php echo $k->projectid; ?> || <?php echo $k->project_name; ?>
	<input type="hidden" name="projectid[]" value="<?php echo $k->projectid; ?>">
	<input type="hidden" name="project_name[]" value="<?php echo $k->project_name; ?>">		
	</td>
	<td><?php echo $k->systemcode; ?> || <?php echo $k->systemname; ?>
	<input type="hidden" name="systemcode[]" value="<?php echo $k->systemcode; ?>">
	<input type="hidden" name="systemname[]" value="<?php echo $k->systemname; ?>">	
	</td>
	<td class="text-left"><?php echo $k->costcode; ?> || <?php echo $costname; ?>
	<input type="hidden" name="costcode[]" value="<?php echo $k->costcode; ?>">
	<input type="hidden" name="costname[]" value="<?php echo $costname; ?>">
	</td>
	<td class="text-right"><?php echo number_format($amtdr,2); ?>
	<input type="text" name="dr[]" value="<?php echo $amtdr; ?>">	
	</td>
	<td class="text-right"><?php echo number_format($amtcr,2); ?>
	<input type="text" name="cr[]" value="<?php echo $amtcr; ?>">

	<!-- <input type="text" name="cr[]" value="<?php echo $amtcr; ?>"> -->
	<input type="text" name="varchar[]" value="<?php echo $k->vender_code; ?>">
	<input type="text" name="namevendor[]" value="<?php echo $k->vender_name; ?>">
	</td>
</tr>



<?php } ?>



<tr>
	<td colspan="4" class="text-center">TOTAL</td>
	<td class="text-right"><?php echo number_format($samtdr,2); ?>
		<input type="hidden" name="samtdr[]" id="samtdr" value="<?php echo $samtdr; ?>">
	</td>
	<td class="text-right"><?php echo number_format($samtcr,2); ?>
		<input type="hidden" name="samtcr[]" id="samtcr" value="<?php echo $samtcr; ?>">
	</td>
</tr>