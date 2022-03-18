<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class inventory_active extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('inventory_m');

  }
  public function insert_receive_po()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $pono = $this->input->post('pono');
    $taxno = $this->input->post('taxno');
    $projectid = $this->input->post('projectid');
    $porecdate = $this->input->post('porecdate');
    $datestring = "Y";
    $mm = "m";
    $dd = "d";
    // $json = json_encode($add);
    // echo $json;
    // die();
    $this->load->helper('date');
    $this->db->select('*');
    $qu = $this->db->get('receive_po');
    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

    if ($res == 0) {
      $poreccode = "R" . date($datestring) . date($mm) . date($dd) . "1";
    } else {
      $this->db->select('*');
      $this->db->order_by('po_recid', 'desc');
      $this->db->limit('1');
      $q = $this->db->get('receive_po');
      $run = $q->result();
      foreach ($run as $valx) {
        $x1 = $valx->po_recid + 1;
      }
      $poreccode = "R" . date($datestring) . date($mm) . date($dd) . $x1;
    }

    $data = array(
      'po_reccode' => $poreccode,
      'po_recdate' => $add['porecdate'],
      'po_pono' => $pono,
      'podate' => $add['podate'],
      'venderid' => $add['venderid'],
      'vendername' => $add['vendername'],
      'project' => $add['projectid'],
      'department' => $add['departid'],
      'system' => $add['systemcode'],
      'taxno' => $add['taxno'],
      'taxdate' => $add['taxdate'],
      'duedate' => $add['ducdate'],
      'dodate' => $add['duedate'],
      'docode' => $add['docode'],
      'term' => $add['term'],
      'flag_control' => $add['flag'],
      'createuser' => $username,
      'compcode' => $compcode,
      'ontime' => $add['txtontime'],
      'late' => $add['txtLate'],
      'good' => $add['txtGood'],
      'fail' => $add['txtFail'],
      'standdard' => $add['txtstanddard'],
      'not_standard' => $add['txtnotstanddard'],
      'complete' => $add['txtcomplete'],
      'incomplete' => $add['txtnotcomplete'],
      'ic_status' => "open",
      'ap_status' => "n",
      'status' => "no",
    );
    $this->db->insert('receive_po', $data);
    $id = $this->db->insert_id();
    for ($i = 0; $i < count($add['qty']); $i++) {
      if ($add['chki'][$i] != "") {
        $data_d = array(
          'poi_ref' => $poreccode,
          'poi_matcode' => $add['matcode'][$i],
          'poi_matname' => $add['matname'][$i],
          'poi_costcode' => $add['costcode'][$i],
          'poi_costname' => $add['costname'][$i],
          'poi_receivedate' => $porecdate,
          'poi_qty' => $add['inputreceipt'][$i],
          'poi_receive' => $add['inputreceipt'][$i],
          'poi_receivetot' => $add['balance'][$i],
          'poi_unit' => $add['unit'][$i],
          'poi_priceunit' => $add['priceunit'][$i],
          'poi_amount' => $add['amount'][$i],
                // 'ic_warehouse' => $add['warehouse'][$i],
          'poi_discountper1' => $add['dis1'][$i],
          'poi_discountper2' => $add['dis2'][$i],
          'poi_disamt' => ($add['priceunit'][$i] * $add['inputreceipt'][$i]),
          'poi_vat' => $add['vat'][$i],
          'poi_vatper' => $add['sss'][$i],
          'poi_netamt' => $add['netamt'][$i],
          'po_disex' => $add['disex'][$i],
          'compcode' => $compcode,
          'poi_item' => $add['poid'][$i],
          'poi_qtyic' => $add['cqtyi'][$i],
          'poi_totqtyic' => $add['pqtyi'][$i],
          'poi_unitic' => $add['unitici'][$i],
        );
        $this->db->insert('receive_poitem', $data_d);
              ////////////////////////////////////////////////////////
              ////////// update รายการรับของในใบ po /////////////////
              ///////////////////////////////////////////////////////
        $data_pod = array(
          'poi_receive' => $add['receive'][$i] + $add['inputreceipt'][$i],
          'poi_receivetot' => $add['balance'][$i] - $add['inputreceipt'][$i],
        );
        $this->db->where('poi_id', $add['poid'][$i]);
        $this->db->update('po_item', $data_pod);
              //////////จบ update รายการรับของในใบ po /////////////////////////////
              ////////////////////////////////////////////////////////////////////

        $res = $this->inventory_m->countpoiqty($pono);
        foreach ($res as $val) {
          $sum = $val->poi_qty;
        }
        $res = $this->inventory_m->countpoireceive($pono);
        foreach ($res as $val) {
          $sumreceive = $val->poi_receive;
        }

            
           ////////////////////////จบ เช็คว่า รับของครบทุรายการหรือยัง////////////////////////////////////////////
            // redirect('index.php/inventory/edit_receive_po_header/'.$poreccode.'/'.$pono);
        $this->load->helper('date');

        $ponoo = array(
          'ic_status' => "open"
        );
        $this->db->where('po_pono', $pono);
        $this->db->update('po', $ponoo);

        $data_ven = array(
          'po_code' => $add['pono'],
          'ic_code' => $poreccode,
          'pr_code' => $add['pr_code'],
          'vender_id' => $add['venderid'],
          'vender_name' => $add['vendername'],
          'mat_code' => $add['matcode'][$i],
          'mat_name' => $add['matname'][$i],
          'cost_code' => $add['costcode'][$i],
          'cost_name' => $add['costname'][$i],
          'qty' => $add['inputreceipt'][$i],
          'unit' => $add['unit'][$i],
          'price_unit' => $add['priceunit'][$i],
          'price_total' => $add['inputreceipt'][$i] * $add['priceunit'][$i],
          'cr' => $add['term'],
          'ontime' => $add['txtontime'],
          'late' => $add['txtLate'],
          'good' => $add['txtGood'],
          'fail' => $add['txtFail'],
          'standdard' => $add['txtstanddard'],
          'not_standard' => $add['txtnotstanddard'],
          'complete' => $add['txtcomplete'],
          'incomplete' => $add['txtnotcomplete'],
          'podate' => $add['podate'],
          'compcode' => $compcode,
          'project_id' => $add['projectid'],
          'createuser' => $username,
          'createdate' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('vender_rate', $data_ven);

      } else {
             // redirect('index.php/inventory/receive_po_header/'.$pono.'/'.$add['projectid']);
      }
    }
    if ($sum == $sumreceive) {
      $updateporeceive = array(
        'ic_status' => "full"
      );
      $this->db->where('po_pono', $add['pono']);
      $this->db->update('po', $updateporeceive);
    }
    echo $poreccode;
    return true;
  }
          //////////////////////////////////// ////////////////////////////////////
          ////////////////////////////////////  บันทึก รายก่ารขอเบิก      //////////
          ////////////////////////////////////////////////////////////////////////
  public function insert_po_receivenew()
  {
    try {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $pono = $this->input->post('pono');
      $taxno = $this->input->post('taxno');
      $projectid = $this->input->post('projectid');
      $porecdate = $this->input->post('porecdate');
      $datestring = "Y";
      $mm = "m";
      $dd = "d";

      $this->db->select('*');
      $qu = $this->db->get('po_receive');
      $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
      if ($res == 0) {
        $poreccode = "I" . date($datestring) . date($mm) . date($dd) . "1";
      } else {
        $this->db->select('*');
        $this->db->order_by('po_recid', 'desc');
        $this->db->limit('1');
        $q = $this->db->get('po_receive');
        $run = $q->result();
        foreach ($run as $valx) {
          $x1 = $valx->po_recid + 1;
        }
        $poreccode = "I" . date($datestring) . date($mm) . date($dd) . $x1;
      }
      $data = array(
        'po_reccode' => $poreccode,
        'po_recdate' => $add['docdate'],
        'po_pono' => $pono,
        'icdate' => $add['icdate'],
        'venderid' => $add['suppliername'],
        'project' => $add['projectid'],
        'system' => $add['systemcode'],
        'taxno' => $add['invco'],
        'taxdate' => $add['invdate'],
        'duedate' => $add['duedate'],
        'docode' => $add['dono'],
        'dodate' => $add['dodate'],
        'flag_control' => $add['flag'],
        'createuser' => $username,
        'compcode' => $compcode,
        'rccode' => $add['rcno'],
        'receive_type' => 'receive'
      );
      $this->db->insert('po_receive', $data);
      $id = $this->db->insert_id();
      for ($i = 0; $i < count($add['qty']); $i++) {
        if ($add['chki'][$i] != "") {
          $data_d = array(
            'poi_ref' => $poreccode,
            'poi_matcode' => $add['matcode'][$i],
            'poi_matname' => $add['matname'][$i],
            'poi_costcode' => $add['costcode'][$i],
            'poi_costname' => $add['costname'][$i],
            'poi_receivedate' => $add['poi_receivedate'][$i],
            'poi_qty' => $add['qty'][$i],
            'poi_receive' => $add['pqtyic'][$i],
            'poi_receivetot' => $add['pqtyic'][$i],
            'poi_unit' => $add['uniticii'][$i],
            'poi_priceunit' => $add['priceunit'][$i],
            'poi_amount' => $add['amount'][$i],
            'ic_warehouse' => $add['warehouse'][$i],
            'poi_discountper1' => $add['dis1'][$i],
            'poi_discountper2' => $add['dis2'][$i],
            'poi_disamt' => $add['disamt'][$i],
            'poi_vat' => $add['vat'][$i],
            'poi_netamt' => $add['netamt'][$i],
            'po_disex' => $add['disex'][$i],
            'compcode' => $compcode,
            'poi_qtyic' => $add['cqtyic'][$i],
            'poi_totqtyic' => $add['pqtyic'][$i],
            'poi_unitic' => $add['uniticii'][$i],
            'receive_type' => 'receive',
            'poi_status' => 'open'
          );
          $this->db->insert('po_recitem', $data_d);
        }
          
            //po_item
        $data_pod = array(
          'poi_receive' => $add['qty'][$i],
          'poi_receivetot' => $add['balance'][$i],
        );
        $this->db->where('poi_id', $add['poid'][$i]);
        $this->db->update('po_item', $data_pod);
            //po_item

        $this->load->helper('date');
              // if ($add['flag']!="Y") {
        $ic_type = $this->inventory_m->geticcost($compcode);

        $amt = $this->inventory_m->getmatavgavg($add['matcode'][$i], $projectid);
        foreach ($amt as $key => $val) {
          $avg = $val->avg;
          $netamt = @($val->stock_netamt);
          $af_amt = @($val->af_disamt);
        }
        if ($amt != "") {
          $amount = $add['priceunit'][$i] * $add['pqtyic'][$i];   //ป็นเงิน
          $netamtr = @($netamt + $amount); // รวมเป็นเงิน

          $qoo = $this->db->query("select * from store where store_matcode='" . $add['matcode'][$i] . "' and store_project='" . $projectid . "'")->result();
          foreach ($qoo as $key => $ve) {
            $store_total = @($ve->store_total);
          }

          $disamtaf = @($af_amt + $add['disamt'][$i]);
          $balancestore = @($store_total + $add['pqtyic'][$i]); //จำนวนคงเหลือ
                      //$totavg = @($add['priceunit'][$i]/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
                      //$totavg = @($amount/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
          $totavg = @($disamtaf / $balancestore);  // ราคาเฉลี่ยต่อหน่วย
        }
        if ($ic_type == 'avg') {
          $ins_stock_card = array(
            'stock_date' => date('Y-m-d'),
            'invoice' => $add['invco'],
            'ref_no' => $poreccode,
            'stock_type' => "receive",
            'stock_project' => $add['projectid'],
            'stock_matname' => $add['matname'][$i],
            'stock_matcode' => $add['matcode'][$i],
            'stock_ref' => $pono,
            'stock_qty' => $add['qty'][$i],
            'stock_receive' => $add['pqtyic'][$i],//////
            'stock_receivetot' => $add['pqtyic'][$i],//////
            'stock_costcode' => $add['costcode'][$i],
            'stock_costname' => $add['costname'][$i],
            'stock_unit' => $add['uniticii'][$i],
            'stock_priceunit' => $add['priceunit'][$i],
            'stock_amount' => $amount,
            'stock_discountper1' => $add['dis1'][$i],
            'stock_discountper2' => $add['dis2'][$i],
            'stock_disamt' => $add['disamt'][$i],
            'stock_vat' => $add['vat'][$i],
            'stock_netamt' => $add['disamt'][$i],
            'avg' => $totavg,
            'stock_disex' => $add['disex'][$i],
            'compcode' => $compcode,
            'stock_month' => date($mm),
            'stock_year' => date($datestring),
            'dodate' => $add['dodate'],
            'af_disamt' => $disamtaf,
            'createdate' => date('Y-m-d H:i:s'),
            'warehouse' => $add['warehouse'][$i],
            'useradd' => $username,
          );
          $this->db->insert('stockcard', $ins_stock_card);

          $this->db->select('*');
          $this->db->where('store_matcode', $add['matcode'][$i]);
          $this->db->where('wh', $add['warehouse'][$i]);
          $this->db->where('store_project', $projectid);
          $qur = $this->db->get('store');
          $nm = $qur->num_rows();

          $this->db->select('*');
          $this->db->where('store_matcode', $add['matcode'][$i]);
          $this->db->where('store_project', $projectid);
          $this->db->where('wh', $add['warehouse'][$i]);
          $qur = $this->db->get('store');
          $rs = $qur->result();
          foreach ($rs as $va) {
            $totstqty = $va->store_qty;
            $totstqtytot = $va->store_total;
            $getmatcode = $va->store_matcode;
            $totals = $va->store_totalqty;
            $getwh = $va->wh;
          }
          if ($nm == 0) {
            $datastore = array(
              'store_project' => $projectid,
              'store_matcode' => $add['matcode'][$i],
              'store_matname' => $add['matname'][$i],
              'store_costcode' => $add['costcode'][$i],
              'store_costname' => $add['costname'][$i],
              'store_qty' => $add['inputreceipt'][$i],
              'store_total' => $add['inputreceipt'][$i],
              'store_totalqty' => $add['inputreceipt'][$i],
              'compcode' => $compcode,
              'store_unit' => $add['uniticii'][$i],
              'unitprice' => $add['priceunit'][$i],
              'totalprice' => $add['netamt'][$i],
              'discountprice' => $add['dis1'][$i],
              'wh' => $add['warehouse'][$i],
              'store_totalqty' => $add['inputreceipt'][$i],
              'store_type' => "receive",
              'jobcode' => $add['systemcode'],
              'jobname' => $add['system'],
            );
            $this->db->insert('store', $datastore);
          } elseif ($getwh == $add['warehouse'][$i]) {
                        // if ($add['cqtyic'][$i]==1) {
            $datastore = array(
              'store_project' => $projectid,
              'store_matcode' => $add['matcode'][$i],
              'store_matname' => $add['matname'][$i],
              'store_costcode' => $add['costcode'][$i],
              'store_costname' => $add['costname'][$i],
              'store_qty' => $totstqtytot + $add['inputreceipt'][$i],
              'store_total' => $totstqtytot + $add['inputreceipt'][$i],
              'store_totalqty' => $totals + $add['inputreceipt'][$i],
              'compcode' => $compcode,
              'store_unit' => $add['unit'][$i],
              'unitprice' => $add['priceunit'][$i],
              'totalprice' => $add['netamt'][$i],
              'discountprice' => $add['dis1'][$i],
              'wh' => $add['warehouse'][$i],
              'store_type' => "receive"
            );
            $this->db->where('store_matcode', $add['matcode'][$i]);
            $this->db->where('wh', $add['warehouse'][$i]);
            $this->db->where('store_project', $projectid);
            $this->db->update('store', $datastore);
                        // }
          } else {
            $datastore = array(
              'store_project' => $projectid,
              'store_matcode' => $add['matcode'][$i],
              'store_matname' => $add['matname'][$i],
              'store_costcode' => $add['costcode'][$i],
              'store_costname' => $add['costname'][$i],
              'store_qty' => $add['pqtyic'][$i],
              'store_total' => $add['pqtyic'][$i],
              'store_totalqty' => $add['pqtyic'][$i],
              'compcode' => $compcode,
              'store_unit' => $add['uniticii'][$i],
              'unitprice' => $add['priceunit'][$i],
              'totalprice' => $add['netamt'][$i],
              'discountprice' => $add['dis1'][$i],
              'wh' => $add['warehouse'][$i],
              'store_totalqty' => $add['pqtyic'][$i],
              'store_type' => "receive",
              'jobcode' => $add['systemcode'],
              'jobname' => $add['system'],
            );
            $this->db->insert('store', $datastore);
          }
                    // }
                  
                  //fifo
        } else {
         
          $datastore = array(
            'store_project' => $projectid,
            'store_matcode' => $add['matcode'][$i],
            'store_matname' => $add['matname'][$i],
            'store_costcode' => $add['costcode'][$i],
            'store_costname' => $add['costname'][$i],
            'store_qty' => $add['inputreceipt'][$i],
            'store_total' => $add['inputreceipt'][$i],
            'store_totalqty' => $add['inputreceipt'][$i],
            'compcode' => $compcode,
            'store_unit' => $add['uniticii'][$i],
            'unitprice' => $add['priceunit'][$i],
            'totalprice' => $add['netamt'][$i],
            'discountprice' => $add['dis1'][$i],
            'wh' => $add['warehouse'][$i],
            'store_totalqty' => $add['inputreceipt'][$i],
            'store_type' => "receive",
            'jobcode' => $add['systemcode'],
            'jobname' => $add['system'],
          );
          $this->db->insert('store', $datastore);
           
                      // }else{
                      //     $datastore = array(
                      //    'store_project' => $projectid,
                      //    'store_matcode' => $add['matcode'][$i],
                      //    'store_matname' => $add['matname'][$i],
                      //    'store_costcode' => $add['costcode'][$i],
                      //    'store_costname' => $add['costname'][$i],
                      //    'store_qty' => $add['pqtyic'][$i],
                      //    'store_total' => $add['pqtyic'][$i],
                      //    'store_totalqty' => $add['pqtyic'][$i],
                      //    'compcode' => $compcode,
                      //    'store_unit' => $add['uniticii'][$i],
                      //    'unitprice' =>$add['priceunit'][$i],
                      //    'totalprice' =>$add['netamt'][$i],
                      //    'discountprice' => $add['dis1'][$i],
                      //    'wh' => $add['warehouse'][$i],
                      //    'store_totalqty' => $add['pqtyic'][$i],
                      //    'store_type' => "receive"
                      //   );
                      //   $this->db->insert('store',$datastore);
                      //  }

          if ($add['cqtyic'][$i] == 1) {
            $ins_stock_card = array(
              'stock_date' => date('Y-m-d', now()),
              'invoice' => $taxno,
              'ref_no' => $poreccode,
              'stock_type' => "receive",
              'stock_project' => $add['projectid'],
              'stock_matname' => $add['matname'][$i],
              'stock_matcode' => $add['matcode'][$i],
              'stock_ref' => $pono,
              'stock_qty' => $add['qty'][$i],
              'stock_receive' => $add['pqtyic'][$i],
              'stock_receivetot' => $add['pqtyic'][$i],
              'stock_costcode' => $add['costcode'][$i],
              'stock_costname' => $add['costname'][$i],
              'stock_unit' => $add['uniticii'][$i],
              'stock_priceunit' => $add['priceunit'][$i],
              'stock_amount' => $add['amount'][$i],
              'stock_discountper1' => $add['dis1'][$i],
              'stock_discountper2' => $add['dis2'][$i],
                        //  'stock_disamt'  => $add['disamt'][$i],
              'stock_vat' => $add['vat'][$i],
              'stock_netamt' => $add['disamt'][$i],
              'stock_disex' => $add['disex'][$i],
              'compcode' => $compcode,
              'stock_month' => date($mm),
              'stock_year' => date($datestring),
              'dodate' => $add['dodate'],
              'createdate' => date('Y-m-d H:i:s'),
              'warehouse' => $add['warehouse'][$i],
            );
            $this->db->insert('stockcard', $ins_stock_card);
          } else {
            $ins_stock_card = array(
              'stock_date' => date('Y-m-d', now()),
              'invoice' => $taxno,
              'ref_no' => $poreccode,
              'stock_type' => "receive",
              'stock_project' => $add['projectid'],
              'stock_matname' => $add['matname'][$i],
              'stock_matcode' => $add['matcode'][$i],
              'stock_ref' => $pono,
              'stock_qty' => $add['qty'][$i],
              'stock_receive' => $add['pqtyic'][$i],
              'stock_receivetot' => $add['pqtyic'][$i],
              'stock_costcode' => $add['costcode'][$i],
              'stock_costname' => $add['costname'][$i],
              'stock_unit' => $add['uniticii'][$i],
              'stock_priceunit' => $add['priceunit'][$i],
              'stock_amount' => $add['amount'][$i],
              'stock_discountper1' => $add['dis1'][$i],
              'stock_discountper2' => $add['dis2'][$i],
              'stock_disamt' => $add['disamt'][$i],
              'stock_vat' => $add['vat'][$i],
              'stock_netamt' => $add['disamt'][$i],
              'stock_disex' => $add['disex'][$i],
              'compcode' => $compcode,
              'stock_month' => date($mm),
              'stock_year' => date($datestring),
              'dodate' => $add['dodate'],
              'createdate' => date('Y-m-d H:i:s'),
              'warehouse' => $add['warehouse'][$i],
            );
            $this->db->insert('stockcard', $ins_stock_card);
          }
         
        }
      }
      $res = $this->inventory_m->countrecpoiqty($add['rcno']);
      foreach ($res as $val) {
        $sum = $val->poi_qty;
      }
      $res = $this->inventory_m->counticpoireceive($add['rcno']);
      foreach ($res as $val) {
        $sumreceive = $val->poi_receive;
      }

      if ($sum == $sumreceive) {
        $updateporeceive = array(
          'ic_status' => "full"
        );
        $this->db->where('po_reccode', $add['rcno']);
        $this->db->update('receive_po', $updateporeceive);
      }

      for ($i = 0; $i < count($add['qty']); $i++) {
        if ($add['chki'][$i] != "") {
          $upitem = array(
            'poi_status' => "open",
          );
          $this->db->where('poi_ref', $add['rcno']);
          $this->db->update('receive_poitem', $upitem);
        }
      }
      echo $poreccode;
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
  public function return_po()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $pono = $this->input->post('podate');
    $taxno = $this->input->post('taxno');
    $projectid = $this->input->post('projectid');
    $porecdate = $this->input->post('porecdate');
    $datestring = "Y";
    $mm = "m";
    $dd = "d";

    $this->db->select('*');
    $qu = $this->db->get('receive_po_return');
    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

    if ($res == 0) {
      $poreccode = "RT" . date($datestring) . date($mm) . date($dd) . "1";
    } else {
      $this->db->select('*');
      $this->db->order_by('po_recid', 'desc');
      $this->db->limit('1');
      $q = $this->db->get('receive_po_return');
      $run = $q->result();
      foreach ($run as $valx) {
        $x1 = $valx->po_recid + 1;
      }
      $poreccode = "RT" . date($datestring) . date($mm) . date($dd) . $x1;
    }



    $data = array(
      'po_reccode' => $poreccode,
      'reccode' => $add['poreccode'],
      'po_recdate' => $add['porecdate'],
      'po_pono' => $add['podate'],
                  // 'podate' => $add['podate'],
      'venderid' => $add['venderid'],
      'vendername' => $add['vendername'],
      'project' => $add['projectid'],
                  // 'department' => $add['departid'],
      'system' => $add['system'],
      'taxno' => $add['taxno'],
      'taxdate' => $add['taxdate'],
      'duedate' => $add['duedate'],
      'docode' => $add['docode'],
      'term' => $add['term'],
      'flag_control' => $add['flag'],
      'createuser' => $username,
    );

    $this->db->insert('receive_po_return', $data);
    $id = $this->db->insert_id();
    for ($i = 0; $i < count($add['returni']); $i++) {
      $data_d = array(
        'poi_ref' => $poreccode,
        'reccode' => $add['poreccode'],
        'poi_matcode' => $add['matcode'][$i],
        'poi_matname' => $add['matname'][$i],
        'poi_costcode' => $add['costcode'][$i],
        'poi_costname' => $add['costname'][$i],
        'poi_receivedate' => $porecdate,
        'poi_qty' => $add['qty'][$i],
        'return_qty' => $add['returni'][$i],
                // 'poi_receive' => $add['inputreceipt'][$i],
                // 'poi_receivetot' => $add['balance'][$i],
        'poi_unit' => $add['unit'][$i],
        'poi_priceunit' => $add['priceunit'][$i],
        'poi_amount' => $add['amount'][$i],
                // 'ic_warehouse' => $add['warehouse'][$i],
        'poi_discountper1' => $add['dis1'][$i],
        'poi_discountper2' => $add['dis2'][$i],
        'poi_disamt' => $add['disamt'][$i],
        'poi_vat' => $add['vat'][$i],
        'poi_netamt' => $add['netamt'][$i],
        'po_disex' => $add['disex'][$i],
        'compcode' => $compcode,

      );
      $this->db->insert('receive_poitem_return', $data_d);
              ////////////////////////////////////////////////////////
              ////////// update รายการรับของในใบ po /////////////////
              ///////////////////////////////////////////////////////
      $this->db->select('*');
      $this->db->where('po_pono', $add['podate']);
      $qu = $this->db->get('receive_po_return');
      $ree = $qu->num_rows();

      if ($ree == 0) {
        $data_pod = array(
          'poi_receive' => $add['qty'][$i] - $add['returni'][$i],
          'poi_receivetot' => $add['returni'][$i],
        );
        $this->db->where('poi_id', $add['revpoid'][$i]);
        $this->db->where('poi_ref', $add['podate']);
        $this->db->update('po_item', $data_pod);
                //////////จบ update รายการรับของในใบ po /////////////////////////////
        $upt_recpo = array(
          'poi_receive' => $add['qty'][$i] - $add['returni'][$i],
          'poi_receivetot' => $add['returni'][$i],
        );
        $this->db->where('poi_id', $add['poid'][$i]);
        $this->db->where('poi_ref', $add['poreccode']);
        $this->db->update('receive_poitem', $upt_recpo);
              
              ////////////////////////////////////////////////////////////////////

      } else {
        $data_pod = array(
          'poi_receive' => $add['receive'][$i] - $add['returni'][$i],
          'poi_receivetot' => ($add['qty'][$i] - $add['receive'][$i]) + $add['returni'][$i],
        );
        $this->db->where('poi_id', $add['revpoid'][$i]);
        $this->db->where('poi_ref', $add['podate']);
        $this->db->update('po_item', $data_pod);

                  //////////จบ update รายการรับของในใบ po /////////////////////////////

        $upt_recpo = array(
          'poi_receive' => $add['receive'][$i] - $add['returni'][$i],
          'poi_receivetot' => $add['returni'][$i],
        );
        $this->db->where('poi_id', $add['poid'][$i]);
        $this->db->where('poi_ref', $add['poreccode']);
        $this->db->update('receive_poitem', $upt_recpo);
      }

              /////////////////////////////////////////////////////////////////////////
    }


    $updateporeceive = array(
      'ic_status' => "wait"
    );
    $this->db->where('po_pono', $add['podate']);
    $this->db->update('po', $updateporeceive);

    $recccode = $this->input->post('poreccode');
    $queryi = $this->db->query("select sum(poi_receive) as receive from receive_poitem_return where reccode='$recccode'")->result();
    foreach ($queryi as $key => $queryii) {
      $sumq = $queryii->receive;
    }
    if ($sumq == "0") {
      $dataj = array(
        'return' => "Y"
      );
      $this->db->where('po_reccode', $recccode);
      $this->db->update('receive_po', $dataj);
    }

    echo "insert";


      
                        ////////////////////////จบ เช็คว่า รับของครบทุรายการหรือยัง////////////////////////////////////////////
            // redirect('index.php/inventory/edit_receive_po_header/'.$poreccode.'/'.$pono);
    echo $poreccode;
    return true;
  }
public function add_doc_issue() {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $projectid = $this->input->post('projectid');
    $add = $this->input->post();

    $datestring = "Y";
    $mm = "m";
    $dd = "d";
    $this->db->select('*');
    $qu = $this->db->get('ic_issue_h');
    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

    if ($res == 0) {
      $icdoccode = "O" . date($datestring) . date($mm) . date($dd) . "1";
    } else {
      $this->db->select('*');
      $this->db->order_by('is_id', 'desc');
      $this->db->limit('1');
      $q = $this->db->get('ic_issue_h');
      $run = $q->result();
      foreach ($run as $valx) {
        $x1 = $valx->is_id + 1;
      }
      $icdoccode = "O" . date($datestring) . date($mm) . date($dd) . $x1;
    }
    // $cut = array("\n", "\r", "\"", "'");
    // $place = array(" ", " ", " ", " ");
    $data = array(
      'is_doccode' => $icdoccode,
      'is_project' => $add['projectid'],
      'is_department' => $add['depid'],
      'is_docdate' => $add['docdate'],
      'is_system' => $add['system'],
      'is_type' => "issue",
      'is_reqname' => $add['name'],
      // 'is_remark' => str_ireplace($cut, $place, $add['remark']),
      'is_remark' => $add['remark'],
      // 'is_place' => str_ireplace($cut, $place, $add['place']),
      'is_place' => $add['place'],
      'is_bookcode' => $add['bookcode'],
      'is_bookdate' => $add['bookdate'],
      'is_user' => $username,
      'compcode' => $compcode,
      'status' => 'no',
    );
    $this->db->insert('ic_issue_h', $data);
    $id = $this->db->insert_id();


    for ($i = 0; $i < count($add['matcodei']); $i++) {
      $data_d = array(
        'isi_doccode' => $icdoccode,
        'isi_matcode' => $add['matcodei'][$i],
        'isi_matname' => $add['matnamei'][$i],
        'isi_costcode' => $add['costcodei'][$i],
        'isi_costname' => $add['costnamei'][$i],
        'isi_whcode' => $add['whcodei'][$i],
        'isi_wherehouse' => $add['whnamei'][$i],
                  // 'isi_area' => $add['areanamei'][$i],
        'isi_xqty' => $add['qtyi'][$i],
        'isi_unit' => $add['uniti'][$i],
        'isi_remark' => $add['remarki'][$i],
        'ic_assetid' => $add['accode'][$i],
        'ic_assetname' => $add['acname'][$i],
        'ic_asset' => $add['statusass'][$i],
        'isi_priceunit' => $add['unitpricei'][$i],
        'isi_user' => $username,
        'compcode' => $compcode
      );
      $this->db->insert('ic_issue_d', $data_d);

                /////////////////////////////////////////////////////////////////////
                ///////////////// เช็คว่าสินค้าไหนเข้ามาก่อน /////////////////////////////
      $this->db->select('*');
      $this->db->where('poi_matcode', $add['matcodei'][$i]);
      $this->db->order_by('poi_receivedate', 'asc');
      $this->db->limit(1);
      $query = $this->db->get('po_recitem');
      $get_fifo = $query->result();
      foreach ($get_fifo as $value) {

        $chkpriceunit = $value->poi_priceunit;
        $poi_amount = $value->poi_amount;
        $poi_discountper1 = $value->poi_discountper1;
        $poi_discountper2 = $value->poi_discountper2;
        $poi_disamt = $value->poi_disamt;
        $poi_vat = $value->poi_vat;
        $poi_netamt = $value->poi_netamt;
      }
                /////////////////  จบ เช็คว่าสินค้าไหนเข้ามาก่อน /////////////////////////
      $ic_type = $this->inventory_m->geticcost($compcode);
      if ($ic_type == 'avg') {
        $amt = $this->inventory_m->getmatavgavg($add['matcodei'][$i], $projectid);
        foreach ($amt as $key => $val) {
          $avg = $val->avg;
          $netamt = $val->stock_netamt;
          $af_amt = @($val->af_disamt);
        }
        if ($amt != "") {
          $xamt = $avg * $add['qtyi'][$i];

          $tnatamt = $netamt - $xamt;  //รวมเป็นเงิน
          $qoo = $this->db->query("SELECT * from store where store_matcode='" . $add['matcodei'][$i] . "' and store_project='" . $projectid . "' and wh='" . $add['whcodei'][$i] . "' ")->result();
          foreach ($qoo as $key => $ve) {
            $store_total = $ve->store_total;
          }


          $balancestore = $store_total - $add['qtyi'][$i]; //จำนวนคงเหลือ
          $disamtaf = @($avg * $store_total);
                     //$totavg = @($tnatamt/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
          if ($add['bookcode'] == "") {
            $totavg = @($netamt / $tnatamt);  // ราคาเฉลี่ยต่อหน่วย
          } else {
            $totavg = @($disamtaf / $store_total);  // ราคาเฉลี่ยต่อหน่วย
          }
        } else {
          $xamt = $add['tounitpricei'][$i];
        }

        $this->load->helper('date');
        $ins_stock_card = array(
          'stock_date' => date('Y-m-d', now()),
                        // 'invoice' => $taxno,
          'stock_type' => "issue",
          'ref_no' => $icdoccode,
          'stock_project' => $add['projectid'],
          'stock_matname' => $add['matnamei'][$i],
          'stock_matcode' => $add['matcodei'][$i],
          'stock_ref' => $icdoccode,
          'stock_qty' => $add['qtyi'][$i],
          'stock_receive' => $add['qtyi'][$i],//////
                      //  'stock_receivetot' =>  $add['balance'][$i],//////
          'stock_costcode' => $add['costcodei'][$i],
          'stock_costname' => $add['costnamei'][$i],
          'stock_unit' => $add['uniti'][$i],
          'stock_priceunit' => $avg,
          'stock_amount' => $xamt,
                      //  'stock_discountper1'  => $poi_discountper1,
                      //  'stock_discountper2'  => $poi_discountper2,
                      //  'stock_disamt'  => $poi_disamt,
                      //  'stock_vat'  => $poi_vat,
          'stock_netamt' => $tnatamt,
          'avg' => $totavg,
                      //  'stock_disex' => $poi_disex,
                      // 'stock_remark' => $add['remarki'][$i],
          'useradd' => $username,
          'compcode' => $compcode,
          'stock_month' => date($mm),
          'stock_year' => date($datestring),
          'af_disamt' => $disamtaf,
          'dodate' => $add['docdate'],
          'createdate' => date('Y-m-d H:i:s'),
          'warehouse' => $add['whcodei'][$i],
        );
        $this->db->insert('stockcard', $ins_stock_card);

      } else {
                ////////////////  fifo /////////////////////////////////
        $this->load->helper('date');
        $ins_stock_card = array(
          'stock_date' => date('Y-m-d', now()),
                      // 'invoice' => $taxno,
          'stock_type' => "issue",
          'ref_no' => $icdoccode,
          'stock_project' => $add['projectid'],
          'stock_matname' => $add['matnamei'][$i],
          'stock_matcode' => $add['matcodei'][$i],
          'stock_ref' => $icdoccode,
          'stock_qty' => $add['qtyi'][$i],
          'stock_receive' => $add['qtyi'][$i],//////
                    //  'stock_receivetot' =>  $add['balance'][$i],//////
          'stock_costcode' => $add['costcodei'][$i],
          'stock_costname' => $add['costnamei'][$i],
          'stock_unit' => $add['uniti'][$i],
          'stock_priceunit' => $add['unitpricei'][$i],
          'stock_amount' => $add['tounitpricei'][$i],
                    //  'stock_discountper1'  => $poi_discountper1,
                    //  'stock_discountper2'  => $poi_discountper2,
                    //  'stock_disamt'  => $poi_disamt,
                    //  'stock_vat'  => $poi_vat,
          'stock_netamt' => $add['tounitpricei'][$i],
                    //  'stock_disex' => $poi_disex,
          'stock_remark' => $add['remarki'][$i],
          'useradd' => $username,
          'compcode' => $compcode,
          'stock_month' => date($mm),
          'stock_year' => date($datestring),
          'dodate' => $add['docdate'],
          'createdate' => date('Y-m-d H:i:s'),
          'warehouse' => $add['whcodei'][$i],

        );
        $this->db->insert('stockcard', $ins_stock_card);
                 ////////////////End stock card //////////////////////////////////////
      }
           ////////////////////////////////////////////////////////////////////
           //////////////// Insert and update Store ///////////////////////////
      if ($ic_type == 'avg') {
        $this->db->select('*');
        $this->db->where('wh', $add['whcodei'][$i]);
        $this->db->where('store_matcode', $add['matcodei'][$i]);
        $this->db->where('store_project', $projectid);
        $this->db->order_by('store_id', 'asc');
        $qur = $this->db->get('store');
        $rs = $qur->result();
        foreach ($rs as $va) {
          $unbooking = $va->unbooking;
          $totstqty = $va->store_total;
          $getmatcode = $va->store_matcode;
          $booking = $va->booking;
          $id = $va->store_id;
        }
        if ($getmatcode == "") {

        } else {
          if ($add['flag'] != "") {
            $udpbook = array(
              'status' => "issue",
              'issuecode' => $icdoccode,
            );
            $this->db->where('book_code', $add['bookcode']);
            $this->db->update('ic_booking', $udpbook);

            $stored = array(
              'booking' => $booking + $add['qtyi'][$i],
              'unbooking' => $unbooking - $add['qtyi'][$i]

            );
            $this->db->where('store_project', $projectid);
            $this->db->where('store_matcode', $add['matcodei'][$i]);
            $this->db->where('wh', $add['whcodei'][$i]);
            $this->db->update('store', $stored);
          } else {
            $datastore = array(
              'store_project' => $projectid,
              'store_matcode' => $add['matcodei'][$i],
              'store_matname' => $add['matnamei'][$i],
              'store_costcode' => $add['costcodei'][$i],
              'store_costname' => $add['costnamei'][$i],
              'store_qty' => $totstqty - $add['qtyi'][$i],
              'store_total' => $totstqty - $add['qtyi'][$i],
              'booking' => $add['qtyi'][$i],
              'unbooking' => $unbooking - $add['qtyi'][$i],
              'compcode' => $compcode,
            );
            $this->db->where('store_project', $projectid);
            $this->db->where('store_matcode', $add['matcodei'][$i]);
            $this->db->where('wh', $add['whcodei'][$i]);
            $this->db->update('store', $datastore);
          }
        }
      } else {
        $this->db->select('*');
        $this->db->where('store_id', $add['id'][$i]);
                 // $this->db->where('store_matcode',$add['matcodei'][$i]);
                 // $this->db->where('store_project',$projectid);
        $qur = $this->db->get('store');
        $rs = $qur->result();
        foreach ($rs as $va) {
          $unbooking = $va->unbooking;
          $totstqty = $va->store_total;
          $getmatcode = $va->store_matcode;
          $booking = $va->booking;
          $id = $va->store_id;
        }
        if ($add['flag'] != "") {
          $udpbook = array(
            'status' => "issue",
            'issuecode' => $icdoccode,
          );
          $this->db->where('book_code', $add['bookcode']);
          $this->db->update('ic_booking', $udpbook);

          $stored = array(
            'booking' => $booking + $add['qtyi'][$i],
            'unbooking' => $unbooking - $add['qtyi'][$i]

          );
          $this->db->where('store_project', $projectid);
          $this->db->where('store_matcode', $add['matcodei'][$i]);
          $this->db->where('store_id', $add['id'][$i]);
          $this->db->update('store', $stored);
        } else {
          $datastore = array(
            'store_project' => $projectid,
            'store_matcode' => $add['matcodei'][$i],
            'store_matname' => $add['matnamei'][$i],
            'store_costcode' => $add['costcodei'][$i],
            'store_costname' => $add['costnamei'][$i],
            'store_qty' => $totstqty - $add['qtyi'][$i],
            'store_total' => $totstqty - $add['qtyi'][$i],
            'booking' => $add['qtyi'][$i],
            'unbooking' => $unbooking - $add['qtyi'][$i],
            'compcode' => $compcode,
          );
          $this->db->where('store_project', $projectid);
          $this->db->where('store_matcode', $add['matcodei'][$i]);
          $this->db->where('store_id', $add['id'][$i]);
          $this->db->update('store', $datastore);
        }
      }
    }
    for ($ii = 0; $ii < count($add['dr']); $ii++) {
      $datagl = array(
        'gl_refcode' => $icdoccode,
                // 'gl_actcode' => $add['acc_no'][$ii],
        'gl_type' => 'booking',
        'gl_project' => $projectid,
        'gl_job' => $add['system'],
        'gl_dr' => $add['dr'][$ii],
        'gl_cr' => $add['cr'][$ii],
        'useradd' => $username,
        'adddate' => date('Y-m-d H:i:s', now()),
        'compcode' => $compcode,
        'gl_year' => date('Y', now()),
        'gl_period' => date('m', now()),
        'status' => "N",
      );
      $this->db->insert('gl_post_system', $datagl);
    }
           /////////////// End Insert and Update Store ////////////////////////
    echo $icdoccode;
    return true;

  }

  public function add_doc_trading()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $projectid = $this->input->post('projectid');
    $add = $this->input->post();
    $datestring = "Y";
    $mm = "m";
    $dd = "d";
    $this->db->select('*');
    $qu = $this->db->get('ic_trading_h');
    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

    if ($res == 0) {
      $icdoccode = "O" . date($datestring) . date($mm) . date($dd) . "1";
    } else {
      $this->db->select('*');
      $this->db->order_by('trading_id', 'desc');
      $this->db->limit('1');
      $q = $this->db->get('ic_trading_h');
      $run = $q->result();
      foreach ($run as $valx) {
        $x1 = $valx->trading_id + 1;
      }
      $icdoccode = "O" . date($datestring) . date($mm) . date($dd) . $x1;
    }
    // $cut = array("\n", "\r", "\"", "'");
    // $place = array(" ", " ", " ", " ");
    $data = array(
      'trading_doccode' => $icdoccode,
      'trading_project' => $add['projectid'],
      'trading_department' => $add['depid'],
      'trading_docdate' => $add['docdate'],
      'trading_system' => $add['system'],
      'trading_type' => "trading",
      'trading_reqname' => $add['name'],
      // 'trading_remark' => str_ireplace($cut, $place, $add['remark']),
      // 'trading_place' => str_ireplace($cut, $place, $add['place']),
      'trading_remark' => $add['remark'],
      'trading_place' =>$add['place'],
      'trading_bookcode' => $add['bookcode'],
      'trading_bookdate' => $add['bookdate'],
      'trading_user' => $username,
      'compcode' => $compcode,
      'status' => 'no',
    );
    $this->db->insert('ic_trading_h', $data);
    $id = $this->db->insert_id();


    for ($i = 0; $i < count($add['matcodei']); $i++) {
      $data_d = array(
        'trading_doccode' => $icdoccode,
        'trading_matcode' => $add['matcodei'][$i],
        'trading_matname' => $add['matnamei'][$i],
        'trading_costcode' => $add['costcodei'][$i],
        'trading_costname' => $add['costnamei'][$i],
        'trading_whcode' => $add['whcodei'][$i],
        'trading_wherehouse' => $add['whnamei'][$i],
        'trading_system' => $add['system'],
                  // 'trading_area' => $add['areanamei'][$i],
        'trading_xqty' => $add['qtyi'][$i],
        'trading_unit' => $add['uniti'][$i],
        'trading_remark' => $add['remarki'][$i],
        'ic_assetid' => $add['accode'][$i],
        'ic_assetname' => $add['acname'][$i],
        'ic_asset' => $add['statusass'][$i],
        'trading_priceunit' => $add['unitpricei'][$i],
        'trading_user' => $username,
        'compcode' => $compcode
      );
      $this->db->insert('ic_trading_d', $data_d);

                /////////////////////////////////////////////////////////////////////
                ///////////////// เช็คว่าสินค้าไหนเข้ามาก่อน /////////////////////////////
      $this->db->select('*');
      $this->db->where('poi_matcode', $add['matcodei'][$i]);
      $this->db->order_by('poi_receivedate', 'asc');
      $this->db->limit(1);
      $query = $this->db->get('po_recitem');
      $get_fifo = $query->result();
      foreach ($get_fifo as $value) {

        $chkpriceunit = $value->poi_priceunit;
        $poi_amount = $value->poi_amount;
        $poi_discountper1 = $value->poi_discountper1;
        $poi_discountper2 = $value->poi_discountper2;
        $poi_disamt = $value->poi_disamt;
        $poi_vat = $value->poi_vat;
        $poi_netamt = $value->poi_netamt;
                  // $poi_disex = $value->poi_disex;
      }
                /////////////////  จบ เช็คว่าสินค้าไหนเข้ามาก่อน /////////////////////////
      $ic_type = $this->inventory_m->geticcost($compcode);
      if ($ic_type == 'avg') {
        $amt = $this->inventory_m->getmatavgavg($add['matcodei'][$i], $projectid);
        foreach ($amt as $key => $val) {
          $avg = $val->avg;
          $netamt = $val->stock_netamt;
          $af_amt = @($val->af_disamt);
        }
        if ($amt != "") {
          $xamt = $avg * $add['qtyi'][$i];

          $tnatamt = $netamt - $xamt;  //รวมเป็นเงิน
          $qoo = $this->db->query("SELECT * from store where store_matcode='" . $add['matcodei'][$i] . "' and store_project='" . $projectid . "' and wh='" . $add['whcodei'][$i] . "' ")->result();
          foreach ($qoo as $key => $ve) {
            $store_total = $ve->store_total;
          }


          $balancestore = $store_total - $add['qtyi'][$i]; //จำนวนคงเหลือ
          $disamtaf = @($avg * $store_total);
                     //$totavg = @($tnatamt/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
          if ($add['bookcode'] == "") {
            $totavg = @($netamt / $tnatamt);  // ราคาเฉลี่ยต่อหน่วย
          } else {
            $totavg = @($disamtaf / $store_total);  // ราคาเฉลี่ยต่อหน่วย
          }
        } else {
          $xamt = $add['tounitpricei'][$i];
        }

        $this->load->helper('date');
        $ins_stock_card = array(
          'stock_date' => date('Y-m-d', now()),
                        // 'invoice' => $taxno,
          'stock_type' => "issue",
          'ref_no' => $icdoccode,
          'stock_project' => $add['projectid'],
          'stock_matname' => $add['matnamei'][$i],
          'stock_matcode' => $add['matcodei'][$i],
          'stock_ref' => $icdoccode,
          'stock_qty' => $add['qtyi'][$i],
          'stock_receive' => $add['qtyi'][$i],//////
                      //  'stock_receivetot' =>  $add['balance'][$i],//////
          'stock_costcode' => $add['costcodei'][$i],
          'stock_costname' => $add['costnamei'][$i],
          'stock_unit' => $add['uniti'][$i],
          'stock_priceunit' => $avg,
          'stock_amount' => $xamt,
                      //  'stock_discountper1'  => $poi_discountper1,
                      //  'stock_discountper2'  => $poi_discountper2,
                      //  'stock_disamt'  => $poi_disamt,
                      //  'stock_vat'  => $poi_vat,
          'stock_netamt' => $tnatamt,
          'avg' => $totavg,
                      //  'stock_disex' => $poi_disex,
                      // 'stock_remark' => $add['remarki'][$i],
          'useradd' => $username,
          'compcode' => $compcode,
          'stock_month' => date($mm),
          'stock_year' => date($datestring),
          'af_disamt' => $disamtaf,
          'dodate' => $add['docdate'],
          'createdate' => date('Y-m-d H:i:s'),
          'warehouse' => $add['whcodei'][$i],
        );
        $this->db->insert('stockcard', $ins_stock_card);

      } else {
                ////////////////  fifo /////////////////////////////////
        $this->load->helper('date');
        $ins_stock_card = array(
          'stock_date' => date('Y-m-d', now()),
                      // 'invoice' => $taxno,
          'stock_type' => "issue",
          'ref_no' => $icdoccode,
          'stock_project' => $add['projectid'],
          'stock_matname' => $add['matnamei'][$i],
          'stock_matcode' => $add['matcodei'][$i],
          'stock_ref' => $icdoccode,
          'stock_qty' => $add['qtyi'][$i],
          'stock_receive' => $add['qtyi'][$i],//////
                    //  'stock_receivetot' =>  $add['balance'][$i],//////
          'stock_costcode' => $add['costcodei'][$i],
          'stock_costname' => $add['costnamei'][$i],
          'stock_unit' => $add['uniti'][$i],
          'stock_priceunit' => $add['unitpricei'][$i],
          'stock_amount' => $add['tounitpricei'][$i],
                    //  'stock_discountper1'  => $poi_discountper1,
                    //  'stock_discountper2'  => $poi_discountper2,
                    //  'stock_disamt'  => $poi_disamt,
                    //  'stock_vat'  => $poi_vat,
          'stock_netamt' => $add['tounitpricei'][$i],
                    //  'stock_disex' => $poi_disex,
          'stock_remark' => $add['remarki'][$i],
          'useradd' => $username,
          'compcode' => $compcode,
          'stock_month' => date($mm),
          'stock_year' => date($datestring),
          'dodate' => $add['docdate'],
          'createdate' => date('Y-m-d H:i:s'),
          'warehouse' => $add['whcodei'][$i],

        );
        $this->db->insert('stockcard', $ins_stock_card);
                 ////////////////End stock card //////////////////////////////////////
      }
           ////////////////////////////////////////////////////////////////////
           //////////////// Insert and update Store ///////////////////////////
      if ($ic_type == 'avg') {
        $this->db->select('*');
        $this->db->where('wh', $add['whcodei'][$i]);
        $this->db->where('store_matcode', $add['matcodei'][$i]);
        $this->db->where('store_project', $projectid);
        $this->db->order_by('store_id', 'asc');
        $qur = $this->db->get('store');
        $rs = $qur->result();
        foreach ($rs as $va) {
          $unbooking = $va->unbooking;
          $totstqty = $va->store_total;
          $getmatcode = $va->store_matcode;
          $booking = $va->booking;
          $id = $va->store_id;
        }
        if ($getmatcode == "") {

        } else {
          if ($add['flag'] != "") {
            $udpbook = array(
              'status' => "trading",
              'issuecode' => $icdoccode,
            );
            $this->db->where('book_code', $add['bookcode']);
            $this->db->update('ic_booking', $udpbook);

            $stored = array(
              'booking' => $booking + $add['qtyi'][$i],
              'unbooking' => $unbooking - $add['qtyi'][$i]

            );
            $this->db->where('store_project', $projectid);
            $this->db->where('store_matcode', $add['matcodei'][$i]);
            $this->db->where('wh', $add['whcodei'][$i]);
            $this->db->update('store', $stored);
          } else {
            $datastore = array(
              'store_project' => $projectid,
              'store_matcode' => $add['matcodei'][$i],
              'store_matname' => $add['matnamei'][$i],
              'store_costcode' => $add['costcodei'][$i],
              'store_costname' => $add['costnamei'][$i],
              'store_qty' => $totstqty - $add['qtyi'][$i],
              'store_total' => $totstqty - $add['qtyi'][$i],
              'booking' => $add['qtyi'][$i],
              'unbooking' => $unbooking - $add['qtyi'][$i],
              'compcode' => $compcode,
            );
            $this->db->where('store_project', $projectid);
            $this->db->where('store_matcode', $add['matcodei'][$i]);
            $this->db->where('wh', $add['whcodei'][$i]);
            $this->db->update('store', $datastore);
          }
        }
      } else {
        $this->db->select('*');
        $this->db->where('store_id', $add['id'][$i]);
                 // $this->db->where('store_matcode',$add['matcodei'][$i]);
                 // $this->db->where('store_project',$projectid);
        $qur = $this->db->get('store');
        $rs = $qur->result();
        foreach ($rs as $va) {
          $unbooking = $va->unbooking;
          $totstqty = $va->store_total;
          $getmatcode = $va->store_matcode;
          $booking = $va->booking;
          $id = $va->store_id;
        }
        if ($add['flag'] != "") {
          $udpbook = array(
            'status' => "trading",
            'issuecode' => $icdoccode,
          );
          $this->db->where('book_code', $add['bookcode']);
          $this->db->update('ic_booking', $udpbook);

          $stored = array(
            'booking' => $booking + $add['qtyi'][$i],
            'unbooking' => $unbooking - $add['qtyi'][$i]

          );
          $this->db->where('store_project', $projectid);
          $this->db->where('store_matcode', $add['matcodei'][$i]);
          $this->db->where('store_id', $add['id'][$i]);
          $this->db->update('store', $stored);
        } else {
          $datastore = array(
            'store_project' => $projectid,
            'store_matcode' => $add['matcodei'][$i],
            'store_matname' => $add['matnamei'][$i],
            'store_costcode' => $add['costcodei'][$i],
            'store_costname' => $add['costnamei'][$i],
            'store_qty' => $totstqty - $add['qtyi'][$i],
            'store_total' => $totstqty - $add['qtyi'][$i],
            'booking' => $add['qtyi'][$i],
            'unbooking' => $unbooking - $add['qtyi'][$i],
            'compcode' => $compcode,
          );
          $this->db->where('store_project', $projectid);
          $this->db->where('store_matcode', $add['matcodei'][$i]);
          $this->db->where('store_id', $add['id'][$i]);
          $this->db->update('store', $datastore);
        }
      }
    }
    for ($ii = 0; $ii < count($add['dr']); $ii++) {
      $datagl = array(
        'gl_refcode' => $icdoccode,
                // 'gl_actcode' => $add['acc_no'][$ii],
        'gl_type' => 'booking',
        'gl_project' => $projectid,
        'gl_job' => $add['system'],
        'gl_dr' => $add['dr'][$ii],
        'gl_cr' => $add['cr'][$ii],
        'useradd' => $username,
        'adddate' => date('Y-m-d H:i:s', now()),
        'compcode' => $compcode,
        'gl_year' => date('Y', now()),
        'gl_period' => date('m', now()),
        'status' => "N",
      );
      $this->db->insert('gl_post_system', $datagl);
    }
           /////////////// End Insert and Update Store ////////////////////////
    echo $icdoccode;
    return true;

  }
public function save_booking(){
    $this->load->helper('date');
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();

    try {
      $datestring = "Y";
      $mm = "m";
      $dd = "d";

      $this->db->select('*');
      $qu = $this->db->get('ic_booking');
      $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

      if ($res == 0) {
        $transfercode = "B" . date($datestring) . date($mm) . "000" . "1";
      } else {
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->limit('1');
        $q = $this->db->get('ic_booking');
        $run = $q->result();
        foreach ($run as $valx) {
          $x1 = $valx->id + 1;
        }
        if ($x1 <= 9) {
          $transfercode = "B" . date($datestring) . date($mm) . "000" . $x1;
        } elseif ($x1 <= 99) {
          $transfercode = "B" . date($datestring) . date($mm) . "00" . $x1;
        } elseif ($x1 <= 999) {
          $transfercode = "B" . date($datestring) . date($mm) . "0" . $x1;
        } elseif ($x1 <= 9999) {
          $transfercode = "B" . date($datestring) . date($mm) . $x1;
        }

      }

      // $cut = array("\n", "\r", "\"", "'");
      // $place = array(" ", " ", " ", " ");
      $ic_type = $this->inventory_m->geticcost($compcode);
      $data_h = array(
        'book_code' => $transfercode,
        'from_project' => $add['fromproject'],
        'to_project' => $add['toproject'],
        'date_book' => $add['trdate'],
        'duedate' => $add['duedate'],
        'name_book' => $add['name'],
        'system_book' => $add['system'],
        'address_book' => $add['place'],
        'remark' => $add['remark'],
        'message' => $add['placeother'],
        // 'address_book' => str_ireplace($cut, $place, $add['place']),
        // 'remark' => str_ireplace($cut, $place, $add['remark']),
        // 'message' => str_ireplace($cut, $place, $add['placeother']),
        'status' => "wait",
        'useradd' => $username,
        'adddate' => date('Y-m-d H:i:s', now()),
        'type_ic' => $add['type_ic'],
        'compcode' => $compcode
      );
      $this->db->insert('ic_booking', $data_h);



      for ($i = 0; $i < count($add['qtyi']); $i++) {
                              
                              
        $sum_qty = 0;
                          
        $this->db->select("store_id,store_qty,unitprice,unbooking,sum(store_qty) as sumstoreqty");
        $this->db->where("store_matcode", $add['matcodei'][$i]);
        $this->db->where("store_total !=", 0);
        $this->db->where("store_project", $add['fromproject']);
        $this->db->where("wh", $add['whi'][$i]);
        $res_array = $this->db->get("store")->result();

        foreach ($res_array as $index => $row) {
          $sum_qty += $row->sumstoreqty;
          if ($sum_qty >= $add['qtyi'][$i]) {
            $data = array(
              "store_qty" => ($sum_qty - $add['qtyi'][$i] < 0) ? 0 : $sum_qty - $add['qtyi'][$i],
              "store_total" => ($sum_qty - $add['qtyi'][$i] < 0) ? 0 : $sum_qty - $add['qtyi'][$i],
              "unbooking" => ($row->store_qty - ($sum_qty - $add['qtyi'][$i] < 0) ? 0 : $sum_qty - $add['qtyi'][$i])
            );

            $this->db->where("store_matcode", $add['matcodei'][$i]);
            $this->db->where("store_project", $add['fromproject']);
            $this->db->where("store_id", $row->store_id);
            $res_query = $this->db->update("store", $data);

            $data_d = array(
              'ref_codetransfer' => $transfercode,
              'mat_code' => $add['matcodei'][$i],
              'mat_name' => $add['matnamei'][$i],
              'costcode' => $add['costcodei'][$i],
              'costname' => $add['costnamei'][$i],
              'remark' => $add['remarki'][$i],
              'qty' => $add['qtyi'][$i],
              'unit' => $add['uniti'][$i],
              'wh' => $add['whi'][$i],
              'compcode' => $compcode,
              'priceunit' => $row->unitprice,
              'qty_total' => $add['qtyistore'][$i],
              'store_id' => $row->store_id
            );
            $this->db->insert('ic_bookingitem', $data_d);  

            $pcode = $this->inventory_m->getprojeactid($add['fromproject']);
            $appbk = $this->inventory_m->saveapprovebk($pcode);
            foreach ($appbk as $key => $value) {
              $appbkdata = array(
                'app_pr' =>  $transfercode,
                'app_sequence' => $value->approve_sequence,
                'app_midid' => $value->approve_mid,
                'app_midname' => $value->approve_mname,
                'lock' => $value->approve_lock,
                'app_project' => $value->approve_project,
                'status' => "no",
                'type' => "P",
                'creatuser' => $username,
                'creatudate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode,
              );
              $this->db->insert('approve_bk',$appbkdata);
            }
          } else {
            var_dump('22');
            die();
          }
        }                  
      }
      echo $transfercode;
      return true;
    } catch (Exception $e) {
      return false;
    }

  }
  public function approve_transfer()
  {
    $input = $this->input->post('code');
    $idpro = $this->uri->segment(3);
          // var_dump($idpro);die();
    $update = array('approve' => 'approve');
    $this->db->where('transfer_code', $input);
    $this->db->update('ic_transfer', $update);
    redirect('inventory/receive_transfer_approve/' . $idpro);
  }
  public function save_transfer()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();


          // $json = json_encode($add);

          // file_put_contents("text.txt", $json);

    $insert = $this->input->post('chk_insert');

    $datestring = "Y";
    $mm = "m";
    $dd = "d";

    $this->db->select('*');
    $qu = $this->db->get('ic_transfer');
    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

    if ($res == 0) {
      $transfercode = "T" . date($datestring) . date($mm) . "000" . "1";
    } else {
      $this->db->select('*');
      $this->db->order_by('id_trans', 'desc');
      $this->db->limit('1');
      $q = $this->db->get('ic_transfer');
      $run = $q->result();
      foreach ($run as $valx) {
        $x1 = $valx->id_trans + 1;
      }
      if ($x1 <= 9) {
        $transfercode = "T" . date($datestring) . date($mm) . "000" . $x1;
      } elseif ($x1 <= 99) {
        $transfercode = "T" . date($datestring) . date($mm) . "00" . $x1;
      } elseif ($x1 <= 999) {
        $transfercode = "T" . date($datestring) . date($mm) . "0" . $x1;
      } elseif ($x1 <= 9999) {
        $transfercode = "T" . date($datestring) . date($mm) . $x1;
      }
    }


    if ($insert == "save") {

      $data_update_ic = array(
        'status' => 'complete'
      );
      $this->db->where("book_code", $add['b_no']);
      $this->db->update("ic_booking", $data_update_ic);

      $data_h = array(
        'transfer_code' => $transfercode,
        'from_project' => $add['fromproject'],
        'to_project' => $add['toproject'],
        'date_transfer' => $add['trdate'],
        'name_transfer' => $add['name'],
        'address_transfer' => $add['place'],
        'remark' => $add['remark'],
        'message' => $add['placeother'],
        'status' => "no",
        'compcode' => $compcode,
        'username' => $username,
        'ac_cr_code' => $add['ac_cr_code'],
        'ac_cr_name' => $add['ac_cr_name'],
        'ac_dr_code' => $add['ac_dr_code'],
        'ac_dr_name' => $add['ac_dr_name'],
      );
      $this->db->insert('ic_transfer', $data_h);

      foreach ($add["matcodei"] as $key => $value) {

        $data_tt = array(
          'ref_codetransfer' => $transfercode,
          'mat_code' => $add["matcodei"][$key],
          'mat_name' => $add["matnamei"][$key],
          'costcode' => $add["costcodei"][$key],
          'costname' => $add["costnamei"][$key],
          'remark' => $add['remark'],
          'qty' => $add["qtyi"][$key],
          'unit' => $add["uniti"][$key],
          'unitprice' => $add["unitprincei"][$key],
          'disc' => $add["tot"][$key],
          'total' => $add["tot"][$key],
          'compcode' => $compcode,
          'fromwh' => $add["whformi"][$key],
          'jobcode' => $add["jobcode"][$key],
          'jobname' => $add["jobname"][$key],
        );
        $res_t = $this->db->insert("ic_transferitem", $data_tt);


        $this->db->select('*');
        $this->db->where('store.compcode', $compcode);
        $this->db->where('store_id', $add["store_id"][$key]);
        $q_store = $this->db->get('store')->result();
        $store_total = "";
        $unbooking = "";
        foreach ($q_store as $key_store) {
          $store_total = $key_store->store_total - $add["qtyi"][$key];
          $unbooking = $key_store->unbooking + $add["qtyi"][$key];


          $data_s = array(
            "store_qty" => $store_total,
            "store_total" => $store_total,
            "unbooking" => $unbooking,
          );

          $this->db->where("store_id", $add["store_id"][$key]);
          $this->db->update("store", $data_s);

        }

      } 
              // var_dump($data_tt);
      echo $transfercode;

    }




  }

  public function receive_transfer()
  {

    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    try {
      $add = $this->input->post();

      for ($i = 0; $i < count($add['qtyi']); $i++) {
        $datastore = array(
          'store_project' => $add['to_project'],
          'store_matcode' => $add['matcodei'][$i],
          'store_matname' => $add['matnamei'][$i],
          'store_costcode' => $add['costcodei'][$i],
          'store_costname' => $add['costnamei'][$i],
          'store_qty' => $add['qtyi'][$i],
          'store_total' => $add['qtyi'][$i],
          'store_totalqty' => @$totals + $add['qtyi'][$i],
          'compcode' => $compcode,
          'store_unit' => $add['uniti'][$i],
          'unitprice' => $add['unitprice'][$i],
          'totalprice' => $add['qtyi'][$i] * $add['unitprice'][$i],
          'discountprice' => $add['qtyi'][$i] * $add['unitprice'][$i],
          'wh' => $add['whi'][$i],
          'store_type' => "receive"
        );
        $this->db->insert('store', $datastore);
                       
              // $store = $this->inventory_m->getstoreprojtranfer_m($add['toproject'],$add['matcodei'][$i],$add['whi'][$i]);
              // $this->db->select('*');
              // $this->db->where('store_project',$add['toproject']);
              // $qu = $this->db->get('store');
              // $countstore = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

              // $this->db->select('*');
              // $this->db->where('wh',$add['whi'][$i]);
              // $this->db->where('store_project',$add['toproject']);
              // $this->db->where('store_matcode',$add['matcodei'][$i]);
              // $que = $this->db->get('store');
              // $storemat = $que->result();
              // foreach ($storemat as $key) {
              //   $matstore = $key->store_matcode;
              //   $project_store = $key->store_project;
              // }

              //   if($project_store!="0" && $matstore=="0"){
              //     $update_to_store = array(
              //       'store_project' => $add['toproject'],
              //       'store_matcode' => $add['matcodei'][$i],
              //       'store_matname' => $add['matnamei'][$i],
              //       'store_costcode' => $add['costcodei'][$i],
              //       'store_costname'=> $add['costnamei'][$i],
              //       'store_qty' =>  $add['qtyi'][$i],
              //       'store_total' => $add['qtyi'][$i],
              //       'store_unit' => $add['uniti'][$i],
              //       'store_type' => "transfer",
              //       'compcode' => $compcode,
              //       // 'store_totalqty' => $add['qtyi'][$i],
              //       'wh' => $add['whi'][$i],
              //     );
              //     $this->db->insert('store',$update_to_store);
              //       echo  "2";
              //   }elseif ($project_store!="" && $matstore!="") {
              //     foreach ($store as $key => $value) {
              //       $update_to_store = array(
              //         'store_qty' =>  $value->store_qty+$add['qtyi'][$i],
              //         'store_total' => $value->store_qty+$add['qtyi'][$i],
              //       );
              //       $this->db->where('wh',$add['whi'][$i]);
              //       $this->db->where('store_matcode',$add['matcodei'][$i]);
              //       $this->db->where('store_project',$add['toproject']);
              //       $this->db->where('compcode',$compcode);
              //       $this->db->update('store',$update_to_store);
              //     }
              //       echo  "1";
              // }else{
              //   $update_to_store = array(
              //     'store_project' => $add['toproject'],
              //     'store_matcode' => $add['matcodei'][$i],
              //     'store_matname' => $add['matnamei'][$i],
              //     'store_costcode' => $add['costcodei'][$i],
              //     'store_costname'=> $add['costnamei'][$i],
              //     'store_qty' =>  $add['qtyi'][$i],
              //     'store_total' => $add['qtyi'][$i],
              //     'store_unit' => $add['uniti'][$i],
              //     'store_type' => "transfer",
              //     'compcode' => $compcode,
              //     // 'store_totalqty' => $add['qtyi'][$i],
              //     'wh' => $add['whi'][$i],
              //   );
              //   $this->db->insert('store',$update_to_store);
              //   echo "3";
              // }

        $this->load->helper('date');
        $ins_stock_card = array(
          'stock_date' => $add['date_transfer'],
          'stock_type' => "transfer",
          'ref_no' => $add['code'],
          'stock_project' => $add['toproject'],
          'stock_bookfrom' => $add['fromproject'],
          'stock_matname' => $add['matnamei'][$i],
          'stock_matcode' => $add['matcodei'][$i],
          'stock_ref' => $add['code'],
          'stock_qty' => $add['qtyi'][$i],
          'stock_receive' => $add['qtyi'][$i],
          'stock_costcode' => $add['costcodei'][$i],
          'stock_costname' => $add['costnamei'][$i],
          'stock_unit' => $add['uniti'][$i],
          'stock_priceunit' => $add['unitprice'][$i],
          'stock_amount' => $add['total'][$i],
          'stock_discountper1' => $add['total'][$i],
          'stock_netamt' => $add['total'][$i],
          'useradd' => $username,
          'compcode' => $compcode,
          'stock_month' => date("m"),
          'stock_year' => date("Y"),
          'createdate' => date('Y-m-d H:i:s'),
          'warehouse' => $add['whi'][$i],
        );
        $this->db->insert('stockcard', $ins_stock_card);
      }
              // receive transfer
      $data = array(
        'approve' => "receive",
        'action_date' => date("Y-m-d"),
      );
      $this->db->where('transfer_code', $add['code']);
      $this->db->update('ic_transfer', $data);
              // echo $add['toproject'];
              // return true;



      redirect('inventory/receive_transfer_store/' . $add['toproject']);
    } catch (Exception $e) {
      echo $e;
    }


  }
  public function revese_booking()
  {
    $this->load->helper('date');
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $this->load->helper('date');
    $add = $this->input->post();
    for ($i = 0; $i < count($add['qtyi']); $i++) {
      $store = $this->inventory_m->getstoreprojtranfer($add['projeid'], $add['matcodei'][$i]);
      foreach ($store as $key => $value) {
        $update_to_store = array(
          'store_qty' => $value->store_qty + $add['qtyi'][$i],
          'store_total' => $value->store_qty + $add['qtyi'][$i],
        );
        $this->db->where('store_matcode', $add['matcodei'][$i]);
        $this->db->where('store_project', $add['projeid']);
        $this->db->where('compcode', $compcode);
        $this->db->update('store', $update_to_store);
      }
      $updatebook = array(
        'status' => "reverse",
      );
      $this->db->where('book_code', $add['bookno']);
      $this->db->update('ic_booking', $updatebook);
    }

    for ($i = 0; $i < count($add['acc_code']); $i++) {
      $datagl = array(
        'gl_refcode' => $add['bookno'],
        'gl_actcode' => $add['acc_code'][$i],

        'gl_type' => 'reverse',
        'gl_project' => $add['projeid'],
                // 'gl_job' => $add['system'],
        'gl_dr' => $add['dr'][$i],
        'gl_cr' => $add['cr'][$i],
        'useradd' => $username,
        'adddate' => date('Y-m-d', now()),
        'compcode' => $compcode,
        'gl_year' => date('Y', now()),
        'gl_period' => date('m', now()),
        'status' => "N",
      );
      $this->db->insert('gl_post_system', $datagl);
    }
    redirect('inventory/archive_booking_list/' . $add['projeid']);
  }


  public function ins_receive_other()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $pono = $this->input->post('pono');
    $taxno = $this->input->post('taxno');
    $projectid = $this->input->post('projectid');
    $porecdate = $this->input->post('porecdate');
    $datestring = "Y";
    $mm = "m";
    $dd = "d";
    $this->db->select('*');
    $qu = $this->db->get('po_receive');
    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

    if ($res == 0) {
      $poreccode = "I" . date($datestring) . date($mm) . date($dd) . "1";
    } else {
      $this->db->select('*');
      $this->db->order_by('po_recid', 'desc');
      $this->db->limit('1');
      $q = $this->db->get('po_receive');
      $run = $q->result();
      foreach ($run as $valx) {
        $x1 = $valx->po_recid + 1;
      }
      $poreccode = "I" . date($datestring) . date($mm) . date($dd) . $x1;
    }

    $data = array(
      'po_reccode' => $poreccode,
      'po_recdate' => $add['porecdate'],
      'po_pono' => $pono,
      'venderid' => $add['venname'],
      'project' => $add['projectid'],
      'department' => $add['departid'],
      'system' => $add['system'],
      'taxno' => $add['taxno'],
      'taxdate' => $add['taxdate'],
      'duedate' => $add['duedate'],
      'docode' => $add['docode'],
      'createuser' => $username,
      'compcode' => $compcode,
      'receive_type' => "keyin",
      'approve' => "wait",
      'ic_read' => "no",
    );
    $this->db->insert('po_receive', $data);
    $id = $this->db->insert_id();
    for ($i = 0; $i < count($add['inputreceipt']); $i++) {
              // if ($add['chki'][$i]!="") {
      $data_d = array(
        'poi_ref' => $poreccode,
        'poi_matcode' => $add['matcode'][$i],
        'poi_matname' => $add['matname'][$i],
        'poi_costcode' => $add['costcode'][$i],
        'poi_costname' => $add['costname'][$i],
        'poi_receivedate' => $porecdate,
        'poi_qty' => $add['inputreceipt'][$i],
        'poi_receive' => $add['inputreceipt'][$i],
        'poi_receivetot' => $add['balance'][$i],
        'poi_unit' => $add['unit'][$i],
        'poi_priceunit' => $add['priceunit'][$i],
        'poi_amount' => $add['amount'][$i],
        'ic_warehouse' => $add['warehouse'][$i],
        'poi_discountper1' => $add['dis1'][$i],
        'poi_discountper2' => $add['dis2'][$i],
        'poi_disamt' => $add['disamt'][$i],
        'poi_vat' => $add['vat'][$i],
        'poi_netamt' => $add['netamt'][$i],
        'po_disex' => $add['disex'][$i],
        'compcode' => $compcode,
        'receive_type' => "keyin"
      );
      $this->db->insert('po_recitem', $data_d);
              ////////////////////////////////////////////////////////
              ////////// update รายการรับของในใบ po /////////////////
              ///////////////////////////////////////////////////////
    }
            ///////////// เช็คว่า รับของครบทุรายการหรือยัง ///////////////////////
           ////////////////////////จบ เช็คว่า รับของครบทุรายการหรือยัง////////////////////////////////////////////
            // redirect('index.php/inventory/edit_receive_po_other/'.$poreccode);
    echo $poreccode;
    return true;
  }

  public function update_store_d()
  {
    $tot = $this->input->post('tot');
    $storeid = $this->input->post('storeid');
    $matcode = $this->input->post('matcode');
    $project = $this->input->post('project');
    $data = array(
      'store_total' => $tot,
    );
    $this->db->where('store_id', $storeid);
    if ($this->db->update('store', $data)) {
      echo $tot;
      return true;
    }
  }

  public function revese_transfer()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];

    $trcode = $this->uri->segment(3);


    try {
      $q = $this->db->query("select * from ic_transfer where transfer_code='$trcode'")->result();
      foreach ($q as $v) {
        $toproject = $v->to_project;
        $tri = $this->db->query("select * from ic_transferitem where ref_codetransfer='$trcode'")->result();

        foreach ($tri as $ii) {
          $store = $this->inventory_m->getstoreprojtranfer($v->from_project, $ii->mat_code);
          foreach ($store as $dd) {
            $update_to_store = array(
              'store_qty' => $dd->store_qty + $ii->qty,
              'store_total' => $dd->store_qty + $ii->qty,
            );
            $this->db->where('store_matcode', $ii->mat_code);
            $this->db->where('store_project', $v->from_project);
            $this->db->where('compcode', $compcode);
            $this->db->update('store', $update_to_store);

            $update_to_store = array(
              'store_qty' => $dd->store_qty - $ii->qty,
              'store_total' => $dd->store_qty - $ii->qty,
            );
            $this->db->where('store_matcode', $ii->mat_code);
            $this->db->where('store_project', $v->to_project);
            $this->db->where('compcode', $compcode);
            $this->db->update('store', $update_to_store);

          }
          $datt = array(
            'approve' => "return",
            'action_date' => date("Y-m-d"),
          );
          $this->db->where('transfer_code', $trcode);
          $this->db->update('ic_transfer', $datt);
          redirect('inventory/receive_transfer_store/' . $toproject);
        }
      }

    } catch (Exception $e) {

    }

  }

  public function editdetail_transfer()
  {
    $data = array(
      'qty' => $this->input->post('qtyinput'),
      'remark' => $this->input->post('remark'),
    );
    $this->db->where('ref_codetransfer', $this->input->post('id'));
    $this->db->where('id_transitem', $this->input->post('item'));
    $q = $this->db->update('ic_transferitem', $data);
    if ($q) {
      echo $this->input->post('matname');
      return true;
    }
  }


  public function edit_transfer()
  {

    try {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
        'date_transfer' => $add['trdate'],
        'address_transfer' => $add['place'],
        'remark' => $add['remark'],
        'message' => $add['placeother'],
      );
      $this->db->where('transfer_code', $add['trcode']);
      $this->db->update('ic_transfer', $data);
      for ($i = 0; $i < count($add['qtyi']); $i++) {
        if ($add['flagi'][$i] == "add") {
          $data_d = array(
            'ref_codetransfer' => $add['trcode'],
            'mat_code' => $add['matcodei'][$i],
            'mat_name' => $add['matnamei'][$i],
            'costcode' => $add['costcodei'][$i],
            'costname' => $add['costnamei'][$i],
            'remark' => $add['remarki'][$i],
            'qty' => $add['qtyi'][$i],
            'unit' => $add['uniti'][$i],
            'unitprice' => $add['unitprincei'][$i],
            'disc' => $add['discprincei'][$i],
            'total' => $add['totpricei'][$i],
            'compcode' => $compcode,
            'fromwh' => $add['whformi'][$i],
            'towh' => $add['towhi'][$i],
          );
          $this->db->insert('ic_transferitem', $data_d);

          $store = $this->inventory_m->getstoreprojtranfer($add['fromproject'], $add['matcodei'][$i]);
          foreach ($store as $key => $value) {


            $update_store = array(
              'store_qty' => $value->store_qty - $add['qtyi'][$i],
              'store_total' => $value->store_qty - $add['qtyi'][$i],
            );
            $this->db->where('store_matcode', $add['matcodei'][$i]);
            $this->db->where('compcode', $compcode);
            $this->db->update('store', $update_store);
          }

        } else {
          $data_d = array(
            'mat_code' => $add['matcodei'][$i],
            'mat_name' => $add['matnamei'][$i],
            'costcode' => $add['costcodei'][$i],
            'costname' => $add['costnamei'][$i],
            'remark' => $add['remarki'][$i],
            'qty' => $add['qtyi'][$i],
            'unit' => $add['uniti'][$i],
            'unitprice' => $add['unitprincei'][$i],
            'disc' => $add['discprincei'][$i],
            'total' => $add['totpricei'][$i],
            'compcode' => $compcode,
            'fromwh' => $add['whformi'][$i],
            'towh' => $add['towhi'][$i],
          );
          $this->db->where('ref_codetransfer', $add['trcode']);
          $this->db->update('ic_transferitem', $data_d);


        }
      }

      redirect('inventory/edit_transfer_store/' . $add['trcode']);


    } catch (Exception $e) {
      return $e;
    }

  }
  public function ic_clear()
  {
    $data = array(
      'status' => null
    );
    $this->db->where('status', "W");
    $this->db->update('store', $data);
    return true;
  }

  public function update_store()
  {
    $mat = $this->input->post('code');
    $pro = $this->input->post('pro');
    $wh = $this->input->post('wh');
    $data = array(
      'status' => "W"
    );
    $this->db->where('status', null);
    $this->db->where('wh', $wh);
    $this->db->where('store_project', $pro);
    $this->db->where('store_matcode', $mat);
    $this->db->update('store', $data);
    return true;
  }

  public function save_return_ic()
  {
    $this->load->helper('date');
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();

    $dataa = array(
      'status' => "Y"
    );
    $this->db->where('is_doccode', $add['is_doccode']);
    $this->db->update('ic_issue_h', $dataa);
    $data = array(
      'is_coderef' => $add['is_coderef'],
      'is_doccode' => $add['is_doccode'],
      'is_docdate' => $add['is_bookdate'],
      'is_project' => $add['project_id'],
      'is_reqname' => $add['is_reqname'],
      'is_remark' => $add['is_remark'],
      'is_place' => $add['is_place'],
    );
    $this->db->insert('ic_return_h', $data);

    for ($i = 0; $i < count($add['isi_matcode']); $i++) {
      $datagl = array(
        'is_coderef' => $add['is_coderef'],
        'isi_doccode' => $add['is_doccode'],
        'isi_matcode' => $add['isi_matcode'][$i],
        'isi_matname' => $add['isi_matname'][$i],
        'isi_xqty' => $add['isi_xqty'][$i],
        'isi_unit' => $add['isi_unit'][$i],
        'isi_wherehouse' => $add['isi_whcode'][$i],
        'isi_user' => $username,
        'isi_credate' => date('Y-m-d', now()),
        'compcode' => $compcode,
      );
      $this->db->insert('ic_return_d', $datagl);

      $ic_type = $this->inventory_m->geticcost($compcode);
      if ($ic_type == 'avg') {
        $projectid = $this->input->post('project_id');
        $is_doccode = $this->input->post('is_doccode');
        $amt = $this->inventory_m->getmatavgavg_return($add['isi_matcode'][$i], $projectid, $is_doccode);
        foreach ($amt as $key => $val) {
          $avg = $val->avg;
          $dodate = $val->dodate;
          $netamt = @($val->stock_netamt);
          $af_amt = @($val->af_disamt);
          $stock_amount = $val->stock_amount;
        }
                  // if ($amt!="") {

                  //   $amount = $add['isi_priceunit'][$i]*$add['isi_xqty'][$i];   //ป็นเงิน
                  //   $netamtr = @($netamt+$amount); // รวมเป็นเงิน

                  //  $qoo =  $this->db->query("select * from store where store_matcode='".$add['isi_matcode'][$i]."' and store_project='".$projectid."'")->result();
                  //  foreach ($qoo as $key => $ve) {
                  //    $store_total = @($ve->store_total);
                  //  }

                   
                  //  $disamtaf = @($af_amt+$add['disamt'][$i]);
                  //  $balancestore = @($store_total+$add['isi_xqty'][$i]); //จำนวนคงเหลือ

                  //  //$totavg = @($add['priceunit'][$i]/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
                  //  //$totavg = @($amount/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
                  //  $totavg = @($disamtaf/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
                  // }else{
                  //   // $xamt =  $add['totpricei'][$i];
                  // }


        $ins_stock_card = array(
          'stock_date' => date('Y-m-d', now()),
           // 'invoice' => $taxno,
          'ref_no' => $add['is_coderef'],
          'stock_type' => "returnic",
          'stock_project' => $add['project_id'],
          'stock_matname' => $add['isi_matname'][$i],
          'stock_matcode' => $add['isi_matcode'][$i],
          'stock_ref' => $add['is_doccode'],
          'stock_qty' => $add['isi_xqty'][$i],
          'stock_receive' => $add['isi_xqty'][$i],
          'stock_receivetot' => $add['isi_xqty'][$i],
          'stock_unit' => $add['isi_unit'][$i],
          'stock_priceunit' => $add['isi_priceunit'][$i],
           // 'stock_amount'  => $add['isi_priceunit'][$i]*$add['isi_xqty'][$i],
           // 'stock_netamt'  => $add['isi_priceunit'][$i]*$add['isi_xqty'][$i],
          'stock_amount' => $stock_amount,
          'stock_netamt' => $af_disamt,
          'compcode' => $compcode,
          'avg' => $avg,
          'dodate' => $dodate,
          'af_disamt' => $af_amt,
          'createdate' => date('Y-m-d H:i:s'),
          'warehouse' => $add['isi_whcode'][$i],
        );
        $this->db->insert('stockcard', $ins_stock_card);
      } else {
        $ins_stock_card = array(
          'stock_date' => date('Y-m-d', now()),
           // 'invoice' => $taxno,
          'ref_no' => $add['is_doccode'],
          'stock_type' => "receive",
          'stock_project' => $add['project_id'],
          'stock_matname' => $add['isi_matname'][$i],
          'stock_matcode' => $add['isi_matcode'][$i],
          'stock_ref' => $add['is_doccode'],
          'stock_qty' => $add['isi_xqty'][$i],
          'stock_receive' => $add['isi_xqty'][$i],
          'stock_receivetot' => $add['isi_xqty'][$i],
          'stock_unit' => $add['isi_unit'][$i],
          'stock_priceunit' => $add['isi_priceunit'][$i],
          'stock_amount' => $add['isi_priceunit'][$i] * $add['isi_xqty'][$i],
          'stock_netamt' => $add['isi_priceunit'][$i] * $add['isi_xqty'][$i],
          'compcode' => $compcode,
          'createdate' => date('Y-m-d H:i:s'),
          'warehouse' => $add['isi_whcode'][$i],
        );
        $this->db->insert('stockcard', $ins_stock_card);
      }


      $qoo = $this->db->query("SELECT * from store where store_matcode='" . $add['isi_matcode'][$i] . "' and store_project='" . $add['project_id'] . "' ")->result();
      foreach ($qoo as $key => $va) {
        $totstqtytot = $va->store_total;
        $totals = $va->store_totalqty;
        $totalprice = $va->totalprice;
      }
      $data = array(
        'store_project' => $add['project_id'],
        'store_matcode' => $add['isi_matcode'][$i],
        'store_matname' => $add['isi_matname'][$i],
        'store_qty' => $totstqtytot + $add['isi_xqty'][$i],
        'store_total' => $totstqtytot + $add['isi_xqty'][$i],
        'store_totalqty' => $totals + $add['isi_xqty'][$i],
        'compcode' => $compcode,
        'store_unit' => $add['unit'][$i],
         // 'unitprice' =>$add['isi_priceunit'][$i],
        'totalprice' => $totalprice + ($add['isi_priceunit'][$i] * $add['isi_xqty'][$i]),
        'wh' => $add['isi_whcode'][$i],
      );
      $this->db->where('wh', $add['isi_whcode'][$i]);
      $this->db->where('store_project', $add['project_id']);
      $this->db->where('store_matcode', $add['isi_matcode'][$i]);
      $this->db->update('store', $data);

    }
    redirect('inventory/return_ic_v/' . $add['project_id']);
  }

  public function ic_receive_delect()
  {

    $this->load->helper('date');
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $matcode = $add['matcode'];
    $project = $add['project'];
    $warehouse = $add['ic_warehouse'];
    $q = $this->db->query("SELECT * from store where store_project='$project' and store_matcode ='$matcode' and wh = '$warehouse' ")->result();
    foreach ($q as $value) {
      $store_total = $value->store_total;
    }

    $data = array(
      'poi_comment' => $add['comment'],
      'poi_status' => "del",
    );
    $this->db->where('poi_matcode', $add['matcode']);
    $this->db->where('poi_ref', $add['code']);
    $this->db->update('po_recitem', $data);

    $data_s = array(
      'store_total' => $store_total - $add['qty'],
      'store_qty' => $store_total - $add['qty'],
    );
    $this->db->where('store_matcode', $matcode);
    $this->db->where('wh', $warehouse);
    $this->db->where('store_project', $project);
    $this->db->update('store', $data_s);


    $data_st = array(
      'stock_comment' => $add['comment'],
      'stock_status' => "del",
    );
    $this->db->where('ref_no', $add['code']);
    $this->db->where('stock_matcode', $matcode);
    $this->db->where('stock_project', $project);
    $this->db->update('stockcard', $data_st);


    $data_po = array(
          // 'stock_comment' => $add['comment'],
      'ic_status' => "open",
    );
    $this->db->where('po_reccode', $add['rccode']);
    $this->db->where('project', $project);
    $this->db->update('receive_po', $data_po);

    $data_por = array(
          // 'stock_comment' => $add['comment'],
      'poi_status' => "",
    );
    $this->db->where('poi_matcode', $matcode);
    $this->db->where('poi_ref', $add['rccode']);
    $this->db->update('receive_poitem', $data_por);
    redirect('inventory/ic_adjust_v/' . $add['project']);
  }

  public function update_delmat()
  {
    $mat = $this->input->post('storetotol');
    $pro = $this->input->post('pro');
    $id = $this->input->post('id');
    $data = array(
      'status' => null,

    );
    $this->db->where('store_id', $id);
    $this->db->where('store_project', $pro);
    $this->db->where('store_matcode', $mat);
    if ($this->db->update('store', $data)) {
      echo "true";
    } else {
      echo "false";
    }

  }

  public function ic_receive_edit()
  {
    $this->load->helper('date');
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $newprice = $this->input->post('newprice');
    $matcode = $this->input->post('matcode');
    $useredit = $this->input->post('useredit');
    $id = $this->input->post('id');
    $data = array(
      'poi_priceunit' => $newprice,
      'useredit' => $username,
      'editdate' => date('Y-m-d H:i:s', now())
    );
    $this->db->where('poi_id', $id);
    $this->db->where('poi_matcode', $matcode);
    if ($this->db->update('po_recitem', $data)) {
      echo "true";
    } else {
      echo "false";
    }

  }

  public function app_receive_other()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $this->load->helper('date');
    $add = $this->input->post();
    $code = $this->input->post('po_reccode');
    $project = $this->input->post('project');
    $datestring = "Y";
    $mm = "m";
    $dd = "d";
    $data = array(
      'approve' => "approve",
      'approve_user' => $username,
      'approvedate' => date('Y-m-d H:i:s', now())
    );
    $this->db->where('po_reccode', $code);
    $this->db->update('po_receive', $data);
    for ($i = 0; $i < count($add['matcode']); $i++) {
      $ic_type = $this->inventory_m->geticcost($compcode);
      if ($ic_type == 'avg') {
        $amt = $this->inventory_m->getmatavgavg($add['matcode'][$i], $project);
        foreach ($amt as $key => $val) {
          $avg = $val->avg;
          $netamt = @($val->stock_netamt);
          $af_amt = @($val->af_disamt);
        }
        if ($amt != "") {

          $amount = $add['qty'][$i] * $add['priceunit'][$i];   //ป็นเงิน
          $netamtr = @($netamt + $amount); // รวมเป็นเงิน

          $qoo = $this->db->query("select * from store where store_matcode='" . $add['matcode'][$i] . "' and store_project='" . $project . "'")->result();
          foreach ($qoo as $key => $ve) {
            $store_total = @($ve->store_total);
          }


          $disamtaf = @($af_amt + $add['amount'][$i]);
          $balancestore = @($store_total + $add['priceunit'][$i]); //จำนวนคงเหลือ

                   //$totavg = @($add['priceunit'][$i]/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
                   //$totavg = @($amount/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
          $totavg = @($disamtaf / $balancestore);  // ราคาเฉลี่ยต่อหน่วย
        }
        $ins_stock_card = array(
          'stock_date' => date('Y-m-d', now()),
          'ref_no' => $code,
          'stock_type' => "keyin",
          'stock_project' => $add['project'],
          'stock_matname' => $add['matname'][$i],
          'stock_matcode' => $add['matcode'][$i],
          'stock_qty' => $add['qty'][$i],
          'stock_receive' => $add['qty'][$i],//////
          'stock_receivetot' => $add['qty'][$i],//////
          'stock_costcode' => $add['costcode'][$i],
                         // 'stock_costname'  => $add['costname'][$i],
          'stock_unit' => $add['unit'][$i],
          'stock_priceunit' => $add['priceunit'][$i],
          'stock_amount' => $add['amount'][$i],
          'stock_disamt' => $add['amount'][$i],
          'stock_netamt' => $add['amount'][$i],
          'avg' => $totavg,
          'compcode' => $compcode,
          'stock_month' => date($mm),
          'stock_year' => date($datestring),
          'warehouse' => $add['wh'][$i],
          'af_disamt' => $disamtaf,
          'createdate' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('stockcard', $ins_stock_card);
      }
      $this->db->select('*');
      $this->db->where('store_matcode', $add['matcode'][$i]);
      $this->db->where('store_project', $project);
      $this->db->where('wh', $add['wh'][$i]);
      $qur = $this->db->get('store');
      $rs = $qur->result();
      foreach ($rs as $va) {
        $totstqty = $va->store_qty;
        $totstqtytot = $va->store_total;
        $store_totalqty = $va->store_totalqty;
        $getmatcode = $va->store_matcode;
        $getwh = $va->wh;
      }
      if ($va->wh == $add['wh'][$i]) {
        $datastore = array(
          'store_project' => $project,
          'store_matcode' => $add['matcode'][$i],
          'store_matname' => $add['matname'][$i],
          'store_costcode' => $add['costcode'][$i],
               // 'store_costname' => $add['costname'][$i],
          'store_qty' => $totstqtytot + $add['qty'][$i],
          'store_total' => $totstqtytot + $add['qty'][$i],
          'store_totalqty' => $store_totalqty + $add['qty'][$i],
          'compcode' => $compcode,
          'store_unit' => $add['unit'][$i],
          'unitprice' => $add['priceunit'][$i],
          'totalprice' => $add['amount'][$i],
          'wh' => $add['wh'][$i],
               // 'store_type' => "other"
        );
        $this->db->where('store_matcode', $add['matcode'][$i]);
        $this->db->where('wh', $add['wh'][$i]);
        $this->db->where('store_project', $project);
        $this->db->update('store', $datastore);

      } elseif ($getmatcode == "") {
        $datastore = array(
          'store_project' => $project,
          'store_matcode' => $add['matcode'][$i],
          'store_matname' => $add['matname'][$i],
          'store_costcode' => $add['costcode'][$i],
               // 'store_costname' => $add['costname'][$i],
          'store_qty' => $add['qty'][$i],
          'store_total' => $add['qty'][$i],
          'compcode' => $compcode,
          'store_unit' => $add['unit'][$i],
          'unitprice' => $add['priceunit'][$i],
          'totalprice' => $add['amount'][$i],
               // 'discountprice' => $add['dis1'][$i],
          'wh' => $add['wh'][$i],
          'store_totalqty' => $add['qty'][$i],
          'store_type' => "other"
        );
        $this->db->insert('store', $datastore);
      } elseif ($getwh != $add['wh'][$i]) {
        $datastore = array(
          'store_project' => $project,
          'store_matcode' => $add['matcode'][$i],
          'store_matname' => $add['matname'][$i],
          'store_costcode' => $add['costcode'][$i],
               // 'store_costname' => $add['costname'][$i],
          'store_qty' => $add['qty'][$i],
          'store_total' => $add['qty'][$i],
          'compcode' => $compcode,
          'store_unit' => $add['unit'][$i],
          'unitprice' => $add['priceunit'][$i],
          'totalprice' => $add['amount'][$i],
               // 'discountprice' => $add['dis1'][$i],
          'wh' => $add['wh'][$i],
          'store_totalqty' => $add['qty'][$i],
          'store_type' => "fff"
        );
        $this->db->insert('store', $datastore);

      }

    }
    redirect('index.php/inventory/archive_receive_ohter/' . $project);
  }

  public function dis_receive_other()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $this->load->helper('date');
    $code = $this->uri->segment(3);
    $pro = $this->uri->segment(4);
    $data = array(
      'approve' => "disappove",
      'approve_user' => $username,
      'approvedate' => date('Y-m-d H:i:s', now())
    );
    $this->db->where('po_reccode', $code);
    $q = $this->db->update('po_receive', $data);

    $id = $this->db->insert_id();
    for ($i = 0; $i < count($add['matcode']); $i++) {
      $ic_type = $this->inventory_m->geticcost($compcode);
      if ($ic_type == 'avg') {
        $amt = $this->inventory_m->getmatavgavg($add['matcode'][$i], $project);
        foreach ($amt as $key => $val) {
          $avg = $val->avg;
          $netamt = @($val->stock_netamt);
          $af_amt = @($val->af_disamt);
        }

        if ($amt != "") {
          $amount = $add['amount'][$i];   //ป็นเงิน
          $netamtr = @($netamt + $amount); // รวมเป็นเงิน
          $qoo = $this->db->query("SELECT * from store where store_matcode='" . $add['matcode'][$i] . "' and store_project='" . $project . "'")->result();
          foreach ($qoo as $key => $ve) {
            $store_total = @($ve->store_total);
          }
          $disamtaf = @($af_amt + $add['amount'][$i]);
          $balancestore = @($store_total + $add['qty'][$i]); //จำนวนคงเหลือ
                     //$totavg = @($add['priceunit'][$i]/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
                     //$totavg = @($amount/$balancestore);  // ราคาเฉลี่ยต่อหน่วย
          $totavg = @($disamtaf / $balancestore);  // ราคาเฉลี่ยต่อหน่วย
        } else {
                      // $xamt =  $add['totpricei'][$i];
        }
        $ins_stock_card = array(
          'stock_date' => date('Y-m-d', now()),
          'invoice' => $add['taxno'],
          'ref_no' => $code,
          'stock_type' => "keyin",
          'stock_project' => $add['project'],
          'stock_matname' => $add['matname'][$i],
          'stock_matcode' => $add['matcode'][$i],
                         // 'stock_ref' => $pono,
          'stock_qty' => $add['qty'][$i],
          'stock_receive' => $add['qty'][$i],//////
          'stock_receivetot' => $add['balance'][$i],//////
          'stock_costcode' => $add['costcode'][$i],
          'stock_costname' => $add['costname'][$i],
          'stock_unit' => $add['unit'][$i],
          'stock_priceunit' => $add['priceunit'][$i],
          'stock_amount' => $add['amount'][$i],
          'stock_discountper1' => $add['dis1'][$i],
          'stock_discountper2' => $add['dis2'][$i],
          'stock_disamt' => $add['disamt'][$i],
          'stock_vat' => $add['vat'][$i],
          'stock_netamt' => $add['amount'][$i],
          'avg' => $totavg,
          'stock_disex' => $add['disex'][$i],
          'compcode' => $compcode,
          'stock_month' => date($mm),
          'stock_year' => date($datestring),
          'dodate' => $add['duedate'],
          'af_disamt' => $disamtaf,
          'createdate' => date('Y-m-d H:i:s'),
          'warehouse' => $add['wh'][$i],
        );
        $this->db->insert('stockcard', $ins_stock_card);
      } else {
                                //////////////// insert stock card /////////////////////////////////
                    //fifo
        $ins_stock_cards = array(
          'stock_date' => date('Y-m-d', now()),
          'invoice' => $add['taxno'],
          'ref_no' => $code,
          'stock_type' => "keyin",
          'stock_project' => $add['project'],
          'stock_matname' => $add['matname'][$i],
          'stock_matcode' => $add['matcode'][$i],
          'stock_ref' => $pono,
          'stock_qty' => $add['qty'][$i],
          'stock_receive' => $add['qty'][$i],//////
          'stock_receivetot' => $add['balance'][$i],//////
          'stock_costcode' => $add['costcode'][$i],
          'stock_costname' => $add['costname'][$i],
          'stock_unit' => $add['unit'][$i],
          'stock_priceunit' => $add['priceunit'][$i],
          'stock_amount' => $add['amount'][$i],
          'stock_discountper1' => $add['dis1'][$i],
          'stock_discountper2' => $add['dis2'][$i],
          'stock_disamt' => $add['disamt'][$i],
          'stock_vat' => $add['vat'][$i],
          'stock_netamt' => $add['amount'][$i],
          'stock_disex' => $add['disex'][$i],
          'compcode' => $compcode,
          'stock_month' => date($mm),
          'stock_year' => date($datestring),
          'createdate' => date('Y-m-d H:i:s'),
          'warehouse' => $add['wh'][$i],
        );
        $this->db->insert('stockcard', $ins_stock_cards);
      }
            ////////////////End stock card //////////////////////////////////////
      $this->db->select('*');
      $this->db->where('store_matcode', $add['matcode'][$i]);
      $this->db->where('store_project', $project);
      $qur = $this->db->get('store');
      $rs = $qur->result();
      foreach ($rs as $va) {
        $totstqty = $va->store_qty;
        $totstqtytot = $va->store_total;
        $getmatcode = $va->store_matcode;
        $store_totalqty = $va->store_totalqty;
        $getwh = $va->wh;

        if ($va->wh == $add['wh'][$i]) {
          $datastore = array(
            'store_project' => $project,
            'store_matcode' => $add['matcode'][$i],
            'store_matname' => $add['matname'][$i],
            'store_costcode' => $add['costcode'][$i],
            'store_costname' => $add['costname'][$i],
            'store_qty' => $totstqtytot + $add['qty'][$i],
            'store_total' => $totstqtytot + $add['qty'][$i],
            'store_totalqty' => $store_totalqty + $add['qty'][$i],
            'compcode' => $compcode,
            'store_unit' => $add['unit'][$i],
            'unitprice' => $add['priceunit'][$i],
            'totalprice' => $add['amount'][$i],
            'discountprice' => $add['dis1'][$i],
            'wh' => $add['wh'][$i],
            'store_type' => "other"
          );
          $this->db->where('store_matcode', $add['matcode'][$i]);
          $this->db->where('wh', $add['wh'][$i]);
          $this->db->where('store_project', $project);
          $this->db->update('store', $datastore);

        }
      }
      if ($getmatcode == "") {
        $datastore = array(
          'store_project' => $project,
          'store_matcode' => $add['matcode'][$i],
          'store_matname' => $add['matname'][$i],
          'store_costcode' => $add['costcode'][$i],
          'store_costname' => $add['costname'][$i],
          'store_qty' => $add['qty'][$i],
          'store_total' => $add['qty'][$i],
          'compcode' => $compcode,
          'store_unit' => $add['unit'][$i],
          'unitprice' => $add['priceunit'][$i],
          'totalprice' => $add['amount'][$i],
          'discountprice' => $add['dis1'][$i],
          'wh' => $add['wh'][$i],
          'store_totalqty' => $store_totalqty + $add['qty'][$i],
          'store_type' => "other"
        );
        $this->db->insert('store', $datastore);
      } elseif ($getwh != $add['wh'][$i]) {
        $datastore = array(
          'store_project' => $wh,
          'store_matcode' => $add['matcode'][$i],
          'store_matname' => $add['matname'][$i],
          'store_costcode' => $add['costcode'][$i],
          'store_costname' => $add['costname'][$i],
          'store_qty' => $add['qty'][$i],
          'store_total' => $add['qty'][$i],
          'compcode' => $compcode,
          'store_unit' => $add['unit'][$i],
          'unitprice' => $add['priceunit'][$i],
          'totalprice' => $add['amount'][$i],
          'discountprice' => $add['dis1'][$i],
          'wh' => $add['wh'][$i],
          'store_totalqty' => $store_totalqty + $add['qty'][$i],
          'store_type' => "other"
        );
        $this->db->insert('store', $datastore);

      } elseif ($getwh != $add['wh'][$i]) {
        $datastore = array(
          'store_project' => $project,
          'store_matcode' => $add['matcode'][$i],
          'store_matname' => $add['matname'][$i],
          'store_costcode' => $add['costcode'][$i],
          'store_costname' => $add['costname'][$i],
          'store_qty' => $totstqtytot + $add['qty'][$i],
          'store_total' => $totstqtytot + $add['qty'][$i],
          'compcode' => $compcode,
          'store_unit' => $add['unit'][$i],
          'unitprice' => $add['priceunit'][$i],
          'totalprice' => $add['amount'][$i],
          'discountprice' => $add['dis1'][$i],
          'wh' => $add['wh'][$i],
          'store_totalqty' => $store_totalqty + $add['qty'][$i],
          'store_type' => "other"
        );
        $this->db->where('store_matcode', $add['matcode'][$i]);
        $this->db->where('wh', $add['wh'][$i]);
        $this->db->where('store_project', $project);
        $this->db->update('store', $datastore);
      }
    }
    redirect('index.php/inventory/archive_receive_ohter/' . $pro);
  }
  public function approve_ic_v()
  {
    $pro = $this->uri->segment(3);
    $code = $this->uri->segment(4);
    $data = array(
      'ic_read' => "yes"
    );
    $this->db->where('po_reccode', $code);
    $this->db->where('project', $pro);
    $q = $this->db->update('po_receive', $data);
    redirect('index.php/inventory/archive_receive_ohter_all/' . $pro);
  }
  public function approve_booking()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $this->load->helper('date');
    $code = $this->uri->segment(3);
    $pro = $this->uri->segment(4);
    $data = array(
      'approve' => "approve",
      'userapprove' => $username,
      'approveedate' => date('Y-m-d H:i:s'),
    );
    $this->db->where('from_project', $pro);
    $this->db->where('book_code', $code);
    $q = $this->db->update('ic_booking', $data);
    redirect('inventory/approve_booking_v/' . $pro);
  }
  public function cancel_booking()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $this->load->helper('date');
    $add = $this->input->post();
    $pro = $this->uri->segment(3);
    $data = array(
      'approve' => "disappove",
      'userdisapprove' => $username,
      'disapprovedate' => date('Y-m-d H:i:s'),
    );
    $this->db->where('from_project', $pro);
    $this->db->where('book_code', $add['code']);
    $this->db->update('ic_booking', $data);

    $ic_type = $this->inventory_m->geticcost($compcode);
    if ($ic_type == 'avg') {
      for ($i = 0; $i < count($add['mat_code']); $i++) {

        $this->db->select('*');
        $this->db->where('store_matcode', $add['mat_code'][$i]);
        $this->db->where('store_project', $pro);
        $this->db->where('wh', $add['wh'][$i]);
        $qur = $this->db->get('store');
        $rs = $qur->result();
        foreach ($rs as $va) {
          $totstqty = $va->store_qty;
          $totstqtytot = $va->store_qty;
          $store_totalqty = $va->store_totalqty;
          $unbooking = $va->unbooking;
          $getwh = $va->wh;
        }

        $stores = array(
          'unbooking' => $unbooking - $add["qty"][$i],
          'store_qty' => $totstqty + $add["qty"][$i],
          'store_total' => $totstqty + $add["qty"][$i],
        );
        $this->db->where('store_matcode', $add["mat_code"][$i]);
        $this->db->where('store_project', $pro);
        $this->db->where('wh', $add["wh"][$i]);
        $this->db->update('store', $stores);
      }
    } else {

    }

    redirect('inventory/approve_booking_v/' . $pro);
  }


}
