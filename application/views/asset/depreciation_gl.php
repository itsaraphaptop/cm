 <?php $n=1; $de_ass=0; $de_resi=0;  foreach ($res as $key) { 

$this->db->select('*');
$this->db->from('depreciation_item');
$this->db->where('de_ass',$key->fa_assetcode);
$item=$this->db->get();
$query1 = $item->num_rows()/12;
$total = ceil($query1); 
$qtotal = $query1 ;

if($total=="0"){
      $totall=1;
}else{
      $totall= ceil($query1);

}

$this->db->select('*');
$this->db->from('depreciation_detail');
$this->db->where('depreciation_codeh',$key->fa_depreciationcode);
$this->db->where('depreciation_y',$totall);
$query=$this->db->get()->result();

$this->db->select('*');
$this->db->from('depreciation_item');
$this->db->where('de_ass',$key->fa_assetcode);
$amout=$this->db->get()->result();

// $this->db->select('*');
// $this->db->from('depreciation_header');
// $this->db->where('depreciation_code',$key->fa_depreciationcode);
// $aaaa=$this->db->get()->result();

// $this->db->select('*');
// $this->db->from('depreciation_item');
// $amoutdee=$this->db->get()->result();

$this->db->select('*');
$this->db->from('depreciation_item');
$dt=$this->db->get();
$que = $dt->num_rows();
  foreach ($query as $e) {
 $depbf=$key->fa_bf; $d_day=0;  foreach ($amout as $k ) {

 // foreach ($aaaa as $b) { 

//  // $dep=0; foreach ($amoutdee as $mo) { 

//  //   $dep = $dep+$mo->de_periond;     

//  // } 


//  $depreallyear = $b->depreciation_year*365;
//  $allyear = number_format(($b->depreciation_year*365)-$d_day);
//  $alldayall = $d_day; 



  }

$de_resi = $de_resi + $key->fa_residual; 

 ?>
<table border="1" >
  <tr>
  <td><input type="text" value="<?php echo $key->at_acdid; ?>" name="act_code[]"> </td>
  <td><input type="text" value="<?php echo $de_ass + $key->fa_amount;?>" name="dr[]"></td>
  <td><input type="text" value="0" name="cr[]"></td>
</tr>
<tr>
  <td><input type="text" value="<?php echo $key->at_acaccid;  ?>" name="act_code[]"></td>
  <td><input type="text" value="0" name="dr[]"></td>
  <td><input type="text" value="<?php echo  $de_ass + $key->fa_amount; ?>" name="cr[]"></td>
</tr>
</table>
<?php } $n++; }  ?>