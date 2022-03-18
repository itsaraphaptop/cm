<?php if ( !defined( 'BASEPATH' ) ) {
 exit( 'No direct script access allowed' );
}

class purchase_active2 extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();
  $this->load->model( 'office_m' );
  $this->load->model( 'datastore_m' );
  $this->load->model( 'count_m' );
  $this->load->helper( 'date' );

 }

 public function editpo()
 {
  $session_data = $this->session->userdata( 'sessed_in' );
  $username     = $session_data['username'];
  $compcode     = $session_data['compcode'];
  $prno         = $this->input->post( "pr_prno" );
  $pono         = $this->input->post( "pono" );
  $priid        =  $this->input->post('pri_id');
  $data_d = array(
   'poi_ref'          => $pono,
   'pri_id'           => $priid,
   'poi_matcode'      => $this->input->post( 'matcode' ),
   'poi_matname'      => $this->input->post( 'poi_matname' ),
   'poi_costcode'     => $this->input->post( 'poi_costcode' ),
   'poi_costname'     => $this->input->post( 'poi_costname' ),
   'poi_qty'          => $this->input->post( 'poi_qty' ),
   'poi_unit'         => $this->input->post( 'poi_unit' ),
   'poi_priceunit'    => $this->input->post( 'poi_priceunit' ),
   'poi_amount'       => 0,
   'poi_discountper1' => 0,
   'poi_discountper2' => 0,
   'poi_discountper3' => 0,
   'poi_discountper4' => 0,
   'poi_disce'        => 0,
   'poi_disamt'       => 0,
   'poi_netamt'       => 0,
   'poi_vat'          => 0,
   'poi_chk'          => 'Y',
   'compcode'         => $compcode,
   'type_cost'        => $add['type_cost'],
  );
  if ( $this->db->insert( 'po_item', $data_d ) ) {
   return true;
  }
 }

 public function update_po_detail()
 {

  //var_dump($this->input->post());
  $revise_status = $this->uri->segment( 3 );
  $boq_id        = $this->input->post( "boq_id" );
  $boq_id_last   = $this->input->post( "boq_id_last" );
  $session_data  = $this->session->userdata( 'sessed_in' );
  $username      = $session_data['username'];
  $compcode      = $session_data['compcode'];
  $old_pdisamt   = $this->input->post( "old_pdisamt" );

  if ( $revise_status == "revise" ) {

   $data_c = array(
    'poi_ref'                 => $this->input->post( 'pono' ),
    'poi_matcode'             => $this->input->post( 'matcode' ),
    'poi_matname'             => $this->input->post( 'matname' ),
    'poi_costcode'            => $this->input->post( 'costcode' ),
    'poi_costname'            => $this->input->post( 'costname' ),
    'poi_qty'                 => $this->input->post( 'qty' ),
    'poi_unit'                => $this->input->post( 'unit' ),
    'poi_priceunit'           => $this->input->post( 'priceunit' ),
    'poi_amount'              => $this->input->post( 'amount' ),
    'poi_discountper1'        => $this->input->post( 'pdiscper1' ),
    'poi_discountper2'        => $this->input->post( 'pdiscper2' ),
    'poi_discountper3'        => $this->input->post( 'pdiscper3' ),
    'poi_discountper4'        => $this->input->post( 'pdiscper4' ),
    'poi_disce'               => $this->input->post( 'pdiscex' ),
    'poi_disamt'              => $this->input->post( 'pdisamt' ),
    'poi_netamt'              => $this->input->post( 'pnetamt' ),
    'poi_vat'                 => $this->input->post( 'to_vat' ),
    'poi_chk'                 => 'Y',
    'compcode'                => $compcode,

    'poi_ref_revise'          => $this->input->post( 'pono_revise' ),
    'poi_matcode_revise'      => $this->input->post( 'matcode_revise' ),
    'poi_matname_revise'      => $this->input->post( 'matname_revise' ),
    'poi_costcode_revise'     => $this->input->post( 'costcode_revise' ),
    'poi_costname_revise'     => $this->input->post( 'costname_revise' ),
    'poi_qty_revise'          => $this->input->post( 'qty_revise' ),
    'poi_unit_revise'         => $this->input->post( 'unit_revise' ),
    'poi_priceunit_revise'    => $this->input->post( 'priceunit_revise' ),
    'poi_amount_revise'       => $this->input->post( 'amount_revise' ),
    'poi_discountper1_revise' => $this->input->post( 'pdiscper1_revise' ),
    'poi_discountper2_revise' => $this->input->post( 'pdiscper2_revise' ),
    'poi_discountper3_revise' => $this->input->post( 'pdiscper3_revise' ),
    'poi_discountper4_revise' => $this->input->post( 'pdiscper4_revise' ),
    'poi_disce_revise'        => $this->input->post( 'pdiscex_revise' ),
    'poi_disamt_revise'       => $this->input->post( 'pdisamt_revise' ),
    'poi_netamt_revise'       => $this->input->post( 'pnetamt_revise' ),
    'poi_vat_revise'          => $this->input->post( 'to_vat_revise' ),
    'poi_chk_revise'          => 'Y',
    'compcode_revise'         => $compcode,
    'user_revise'             => $username,
    'ddate_revise'            => date( 'Y-m-d H:i:s', now() ),
   );
   $this->db->insert( 'po_item_revise', $data_c );

  }

  $data_d = array(
   'poi_ref'          => $this->input->post( 'pono' ),
   'poi_matcode'      => $this->input->post( 'matcode' ),
   'poi_matname'      => $this->input->post( 'matname' ),
   'poi_costcode'     => $this->input->post( 'costcode' ),
   'poi_costname'     => $this->input->post( 'costname' ),
   'poi_qty'          => $this->input->post( 'qty' ),
   'poi_unit'         => $this->input->post( 'unit' ),
   'poi_priceunit'    => $this->input->post( 'priceunit' ),
   'poi_amount'       => $this->input->post( 'amount' ),
   'poi_discountper1' => $this->input->post( 'pdiscper1' ),
   'poi_discountper2' => $this->input->post( 'pdiscper2' ),
   'poi_discountper3' => $this->input->post( 'pdiscper3' ),
   'poi_discountper4' => $this->input->post( 'pdiscper4' ),
   'poi_disce'        => $this->input->post( 'pdiscex' ),
   'poi_disamt'       => $this->input->post( 'pdisamt' ),
   'poi_netamt'       => $this->input->post( 'pnetamt' ),
   'poi_vat'          => $this->input->post( 'to_vat' ),
   'remark_mat'          => $this->input->post( 'remark_mat' ),
   'poi_chk'          => 'Y',
   'compcode'         => $compcode,
   'type_cost'        => $this->input->post( 'type_cost' ),
   'poi_project'      => $this->input->post('projectid'),
  );

  //var_dump($data_d);
  $this->db->where( 'poi_id', $this->input->post( 'poi_id' ) );

  $this->office_m->del_pucost( $this->input->post( 'poi_id' ) );
  $this->office_m->pucost( $this->input->post( 'costcode' ), $this->input->post( 'costname' ), $this->input->post( 'pdisamt' ), $this->input->post( 'type_cost' ), $this->input->post( 'poi_id' ) );

  if ( $this->db->update( 'po_item', $data_d ) ) {
   echo "true";
   return true;
  }

 }

 public function add_po_item()
 {
  $add          = $this->input->post();
  $pono         = $this->uri->segment( 3 );
  $session_data = $this->session->userdata( 'sessed_in' );
  $compcode     = $session_data['compcode'];

  $data_d = array(
   'poi_ref'          => $pono,
   'poi_qtyic'        => parse_num( $add['cqtyic'] ),
   'poi_totqtyic'     => parse_num( $add['pqtyic'] ),
   'poi_matcode'      => parse_num( $add['matcode'] ),
   'poi_matname'      => $add['matname'],
   'poi_costcode'     => $add['costcode'],
   'poi_costname'     => $add['costname'],
   'poi_qty'          => parse_num( $add['qty'] ),
   'poi_unit'         => parse_num( $add['punit'] ),
   'poi_unitic'       => parse_num( $add['punitic'] ),
   'poi_priceunit'    => parse_num( $add['price_unit'] ),
   'poi_amount'       => parse_num( $add['amount'] ),
   'poi_discountper1' => parse_num( $add['discountper1'] ),
   'poi_discountper2' => parse_num( $add['discountper2'] ),
   'poi_discountper3' => parse_num( $add['discountper3'] ),
   'poi_discountper4' => parse_num( $add['discountper4'] ),
   'poi_disce'        => "",
   'poi_disamt'       => parse_num( $add['disamt'] ),
   'poi_vat'          => parse_num( $add['to_vat'] ),
   'poi_vatper'       => parse_num( $add['vatper'] ),
   'poi_netamt'       => parse_num( $add['netamt'] ),
   'poi_remark'       => parse_num( $add['remark'] ),

   'po_assetid'       => parse_num( $add['accode'] ),
   'po_assetname'     => parse_num( $add['acname'] ),
   'po_asset'         => parse_num( $add['statusass'] ),

   'poi_chk'          => 'Y',
   'po_boq'           => $add['boq_id'],
   'compcode'         => $compcode,
   'cost_type'        => $add['costcode'][0],
   'type_cost'        => $add['type_cost'],
   'datesend'         => $add['datesend'],
  );

  $bool_status_insert = $this->db->insert( 'po_item', $data_d );
  echo $pono;
  return true;
  // redirect('purchase/editpo/'.$pono);

  // $temp_boq_id= $add['boq_id'];
  // if($bool_status_insert){

  //     if($add['boq_id'] =! "undefined" || $add['boq_id'] != ""){
  //         // update budget

  //         $sql_update_budget = "update boq_item SET boq_item.boq_balance = boq_item.boq_balance+{$add['disamt']} WHERE boq_item.boq_id = {$temp_boq_id} ";
  //          $bool_update_boq_balance = $this->db->query($sql_update_budget);

  //             if($bool_update_boq_balance){
  //                 redirect(base_url()."purchase/editpo/{$pono}");
  //             }
  //     }else{

  //     }
  // }
  echo $pono;
  echo "<pre>";
  // var_dump($add);

  // var_dump($data_d);
 }
}
