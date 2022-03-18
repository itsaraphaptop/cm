<?php 
$this->db->select('*');
$this->db->from('pettycash_item');
$this->db->where('petty_assetid',$id);
$this->db->join('pettycash', 'pettycash.docno = pettycash_item.pettycashi_ref');
$query=$this->db->get()->result();
?>

 <?php $n=1; $allpc=0; foreach ($query as $e) {  $allpc=$allpc+$e->pettycashi_amounttot;?>

<?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$e->project);
$project=$this->db->get()->result();
foreach ($project as $key) {
$project_name = $key->project_name;
}
?>

<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$e->department);
$dpt=$this->db->get()->result();
foreach ($dpt as $key1) {
$department_title = $key1->department_title;
}
?>
 <tr>
<td style="text-align: center;"><?php echo $n; ?></td>
<td style="text-align: center;"><?php echo $e->pettycashi_costcode;?><br><?php echo $e->pettycashi_costname;?></td>
<td style="text-align: center;"><?php echo $e->pettycashi_expenscode;?></td>
<td style="text-align: center;"><div style="width: 100px;"><?php echo $e->docdate;?></div></td>
<td style="text-align: center;">PC</td>
<td style="text-align: center;"><div style="width: 100px;"><?php if($e->project==""){
echo $department_title;	
}else{
echo $project_name;
	}
?>
</div></td>
<td style="text-align: center;"><?php echo $e->docno ;?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;">-</td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $e->pettycashi_amounttot ;?></td>
<td style="text-align: center;"><?php echo $e->pettycashi_expens ;?></td>
<td style="text-align: center;"><?php echo $e->remark ;?></td>
</tr>
 <?php $n++;  } ?>


<?php 
$this->db->select('*');
$this->db->from('po_item');
$this->db->where('po_assetid',$id);
$this->db->join('po', 'po.po_pono = po_item.poi_ref');
$q=$this->db->get()->result();

?>
 <?php $n1=$n; $allpo=0; foreach ($q as $a) { $allpo=$allpo+$a->poi_netamt; ?>

 <?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$a->po_project);
$project1=$this->db->get()->result();
foreach ($project1 as $key111) {
$project_name1 = $key111->project_name;
}
?>

<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$a->po_department);
$dpt1=$this->db->get()->result();
foreach ($dpt1 as $key11) {
$department_title1 = $key11->department_title;
}
?>
<tr>
	<td style="text-align: center;"><?php echo $n1; ?></td>
<td style="text-align: center;"><?php echo $a->poi_costcode; ?><br><?php echo $a->poi_costname; ?></td> 
<td style="text-align: center;"><?php echo $a->poi_matcode; ?></td>
<td style="text-align: center;"><div style="width: 100px;"><?php echo $a->po_podate; ?></div></td>
<td style="text-align: center;">PO</td>
<td style="text-align: center;">
<?php if($a->po_project==""){
echo $department_title1;	
}else{
echo $project_name1;
	}
?>
</td>
<td style="text-align: center;"><?php echo $a->poi_ref; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo number_format($a->poi_qty); ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $a->poi_netamt; ?></td>
<td style="text-align: center;"><?php echo $a->poi_matname; ?></td>
<td style="text-align: center;"><?php echo $a->poi_remark; ?></td>
</tr>

 <?php  $n1++; } ?>


<?php 
$this->db->select('*');
$this->db->from('pr_item');
$this->db->where('pr_assetid',$id);
$this->db->join('pr', 'pr.pr_prno = pr_item.pri_ref');
$ee=$this->db->get()->result();
?>
 <?php $n2=$n1;  foreach ($ee as $aa) { ?>


 <?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$aa->pr_project);
$project11=$this->db->get()->result();
foreach ($project11 as $key1111) {
$project_name11111111 = $key1111->project_name;
}
?>

<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$aa->pr_department);
$dpt11=$this->db->get()->result();
foreach ($dpt11 as $ke11) {
$department_title1111111 = $ke11->department_title;
}
?>
 <tr>
<td style="text-align: center;"><?php echo $n2; ?></td>
<td style="text-align: center;"><?php echo $aa->pri_costcode; ?><br><?php echo $aa->pri_costname; ?></td> 
<td style="text-align: center;"><?php echo $aa->pri_matcode; ?></td>
<td style="text-align: center;"><div style="width: 100px;"><?php echo $aa->pr_prdate; ?></div></td>
<td style="text-align: center;">PR</td>
<td style="text-align: center;">
<?php if($aa->pr_project==""){
echo $department_title1111111;	
}else{
echo $project_name11111111;
	}
?>
	
</td>
<td style="text-align: center;"><?php echo $aa->pri_ref; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo number_format($aa->pri_qty); ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $aa->pri_matname; ?></td>
<td style="text-align: center;"><?php echo $aa->pri_remark; ?></td>
</tr>
 <?php $n2++;  } ?>

 <?php 
$this->db->select('*');
$this->db->from('lo_detail');
$this->db->where('lo_assetid',$id);
$this->db->join('lo', 'lo.lo_lono = lo_detail.lo_ref');
$ww=$this->db->get()->result();
?>
 <?php $n3=$n2; $allwo=0; foreach ($ww as $w) { $allwo=$allwo+$w->lo_priceunit;
 	?>
<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$w->department);
$dpa=$this->db->get()->result();
foreach ($dpa as $dpa11) {
$dep = $dpa11->department_title;
}
?>

 <tr>
	<td style="text-align: center;"><?php echo $n3; ?></td>
<td style="text-align: center;"><?php echo $w->lo_costcode; ?><br><?php echo $w->lo_costname; ?></td> 
<td style="text-align: center;"><?php echo $w->lo_matcode; ?></td>
<td style="text-align: center;"><div style="width: 100px;"><?php echo $w->lodate; ?></div></td>
<td style="text-align: center;">WO</td>
<td style="text-align: center;">
	<?php if($w->projectcode==""){
echo $dep;	
}else{
echo $w->projownername;
	}
?>
</td>
<td style="text-align: center;"><?php echo $w->lo_ref; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo number_format($w->lo_qty); ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $w->lo_priceunit; ?></td>
<td style="text-align: center;"><?php echo $w->lo_matname; ?></td>
<td style="text-align: center;"></td>
</tr>
 <?php $n3++; } ?>

 <?php 
$this->db->select('*');
$this->db->from('ic_issue_d');
$this->db->where('ic_assetid',$id);
$this->db->join('ic_issue_h', 'ic_issue_h.is_doccode = ic_issue_d.isi_doccode');
$ic=$this->db->get()->result();
?>
 <?php $n4=$n3; foreach ($ic as $c) { ?>

  <?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$c->is_project);
$pjic=$this->db->get()->result();
foreach ($pjic as $icpj) {
$icpjjj = $icpj->project_name;
}
?>

<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$c->is_department);
$icc=$this->db->get()->result();
foreach ($icc as $dpticc) {
$icdpt = $dpticc->department_title;
}
?>

 <tr>
<td style="text-align: center;"><?php echo $n4; ?></td>
<td style="text-align: center;"><?php echo $c->isi_costcode; ?><br><?php echo $c->isi_costname; ?></td> 
<td style="text-align: center;"><?php echo $c->isi_matcode; ?></td>
<td style="text-align: center; "><div style="width: 100px;"><?php echo $c->is_bookdate; ?></div></td>
<td style="text-align: center;">IC</td>
<td style="text-align: center;">	
	<?php if($c->is_project==""){
echo $icdpt;	
}else{
echo $icpjjj;
	}
?>
</td>
<td style="text-align: center;"><?php echo $c->isi_doccode; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $c->isi_xqty; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $c->isi_matname; ?></td>
<td style="text-align: center;"><?php echo $c->isi_remark; ?></td>
</tr>

 <?php  $n4++;  } ?>

 <?php 
$this->db->select('*');
$this->db->from('fa_maintenanceasset');
$this->db->where('asfa_asscode',$id);
$famtn=$this->db->get()->result();
?>
 <?php $n5=$n4; $allfa=0; foreach ($famtn as $th) { 
 	$allfa=$allfa+$th->asfa_netam;

 	?>
<tr>
<td style="text-align: center;"><?php echo $n5; ?></td>
<td style="text-align: center;"><div style="width: 200px;"><?php echo $th->asfa_cost; ?><br><?php echo $th->asfa_name; ?></div></td> 
<td style="text-align: center;">-</td>
<td style="text-align: center; "><div style="width: 100px;"><?php echo $th->asfa_docdate; ?></div></td>
<td style="text-align: center;">FA</td>
<td style="text-align: center;"><?php echo $th->fa_projectname; ?><?php echo $th->fa_departmentname; ?></td>
<td style="text-align: center;"><?php echo $th->asfa_old; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $th->asfa_qty; ?></td>
<td style="text-align: center;"><?php echo $th->asfa_milk; ?></td>
<td style="text-align: center;"><?php echo $th->asfa_netam; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $th->asfa_des1; ?><br><?php echo $th->asfa_des2; ?><br><?php echo $th->asfa_des3; ?><br><?php echo $th->asfa_des4; ?><br><?php echo $th->asfa_des5; ?></td>
</tr>

  <?php  $n5++;  } ?>

  <tr>
<td colspan="10" style="text-align: center;">รวม</td>
<td style="text-align: center;"><?php echo number_format($allfa+$allwo+$allpo+$allpc,4); ?></td>
<td colspan="2"></td>
</tr>

