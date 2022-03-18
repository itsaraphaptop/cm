<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pettycash extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('office_m');
            $this->load->model('datastore_m');
            $this->load->model('count_m');
        }
        public function view_appr_pettycash()
        {
          $session_data = $this->session->userdata('logged_in');
          $data['username'] = $session_data['username'];
          $data['res'] = $this->office_m->getallpettycash();
          $this->load->view('office/officeservice/approve_pettycash_v',$data);
        }
        ///////////////////////////////////
        //////  petty cash
        /////////////////////////////////////
        public function add_pettymaster()
        {
          
            $datestring = "Y";
              $mm = "m";
              $dd = "d";
                              $this->db->select('*');
                              $qu = $this->db->get('pettycash');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                                if ($res==0) {
                                  $docno = "PC".date($datestring).date($mm).date($dd)."1";
                                }else{
                                    $this->db->select('*');
                                    $this->db->order_by('doc_id','desc');
                                    $this->db->limit('1');
                                    $q = $this->db->get('pettycash');
                                    $run = $q->result();
                                    foreach ($run as $valx)
                                    {
                                        $x1 = $valx->doc_id+1;
                                    }
                                  $docno = "PC".date($datestring).date($mm).date($dd).$x1;
                                }
                                if ($this->input->post('memname')=="") {
                                  $vender = $this->input->post('venname');
                                }else{
                                  $vender = $this->input->post('memname');
                                }
          $data = array(
              'docno' => $docno,
              'docdate' => $this->input->post('docdate'),
              'vender_type' => $this->input->post('vender_type'),
              'vender' => $vender,
              'department' => $this->input->post('putdpt'),
              'project' => $this->input->post('putproject'),
              'remark' => $this->input->post('remark'),
              'system' => $this->input->post('system')
            );
          $q = $this->db->insert('pettycash',$data);
          if($q)
          {
            echo $docno;
            return true;
          }
          else
          {
            return false;
          }
        }
        public function add_pettydetail()
        {
          $docno = $this->input->post('docno');

            $data = array(
              'pettycashi_ref' => $docno,
              'pettycashi_expenscode' => $this->input->post('matcode'),
              'pettycashi_expens' => $this->input->post('matname'),
              'pettycashi_costname' => $this->input->post('list'),
              'pettycashi_costcode' => $this->input->post('costcode'),
              'pettycashi_vender' => $this->input->post('vander'),
              'pettycashi_addrvender' => $this->input->post('addrvender'),
              'pettycashi_amount' => $this->input->post('amount'),
              'pettycashi_unitprice' => $this->input->post('unitprice'),
              'pettycashi_unit' => $this->input->post('unit'),
              'pettycashi_netamt' => $this->input->post('netamt'),
              'pettycashi_disc' => $this->input->post('disc'),
              'pettycashi_taxno' => $this->input->post('taxno'),
              'pettycashi_taxdate' => $this->input->post('taxdate'),
              'pettycashi_vat' => $this->input->post('taxv'),
              'pettycashi_wh' => $this->input->post('whtax'),
              'pettycashi_amounttot' => $this->input->post('amttot'),
              'pattycashi_totvat' => $this->input->post('totvat'),
              'pettycashi_totwh' => $this->input->post('totwh')
            );
            if($this->db->insert('pettycash_item',$data))
            {
              return true;
            }
            else
            {
              return false;
            }
        }
        public function edititem()
        {
          $docno = $this->input->post('doccode');
          $id = $this->input->post('item');
            $data = array(
              'pettycashi_ref' => $docno,
              'pettycashi_expenscode' => $this->input->post('matcode'),
              'pettycashi_expens' => $this->input->post('matname'),
              'pettycashi_expens' => $this->input->post('list'),
              'pettycashi_vender' => $this->input->post('vender'),
              'pettycashi_addrvender' => $this->input->post('addrvender'),
              'pettycashi_amount' => $this->input->post('amount'),
              'pettycashi_unitprice' => $this->input->post('unitprice'),
              'pettycashi_unit' => $this->input->post('unit'),
              'pettycashi_netamt' => $this->input->post('netamt'),
              'pettycashi_disc' => $this->input->post('disc')
            );
            $this->db->where('pettycashi_id',$id);
            if($this->db->update('pettycash_item',$data))
            {
            	echo $docno;
              return true;
            }
            else
            {
              return false;
            }
        }
        public function edit_pettymaster()
        {
          $id = $this->input->post('doccode');
         $data = array(
              'docdate' => $this->input->post('docdate'),
              'vender_type' => $this->input->post('vender_type'),
              'vender' => $this->input->post('memname'),
              'department' => $this->input->post('putdpt'),
              'project' => $this->input->post('putproject'),
              'remark' => $this->input->post('remark'),
          );
         $this->db->where('docno',$id);
         if($this->db->update('pettycash',$data))
         {
          echo $id;
          return true;
         }else{
          return false;
         }

        }

        public function delitempettycash()
        {
        	$doccode = $this->input->post('doccode');
        	$id = $this->input->post('item');
        	 if($this->db->delete('pettycash_item', array('pettycashi_id' => $id)))
        	 {
        	 	echo $doccode;
        	 	return true;
        	 }
        	 else
        	 {
        	 	return false;
        	 }
        }
        public function service_pettycash_detail()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->getpettycash_d($id);
            $data['resv'] = $this->datastore_m->getvender();
          $data['getunit'] = $this->datastore_m->getunit();
            $this->load->view('office/officeservice/service_pettycash_detail_v',$data);
        }
        public function service_allpettycash()
        {
            $session_data = $this->session->userdata('logged_id');
            $data['res'] = $this->office_m->getallpettycash();
            $this->load->view('office/officeservice/service_allpettycash_v',$data);
        }
        public function editpettycash_h()
        {
          $item = $this->uri->segment(3);
          $doccode = $this->uri->segment(4);
          $session_data = $this->session->userdata('logged_in');
          $data['res'] = $this->datastore_m->getmember();
          $data['getproj'] = $this->datastore_m->getproject();
          $data['getdep'] = $this->datastore_m->department();
          $data['resv'] = $this->datastore_m->getvender();
          $data['getunit'] = $this->datastore_m->getunit();
          $data['data_h'] = $this->office_m->getpetty_h($doccode);
          $this->load->view('office/officeservice/editpettycash_h',$data);
        }

         public function approvepettycash()
        {
          $code = $this->input->post('code');
          $data = array(
              'approve' => "approve"
            );
          $this->db->where('docno',$code);
          $q = $this->db->update('pettycash',$data);
          if($q)
          {
            echo $code;
            return true;
          }
          else
          {
            return false;
          }

        }


        
        public function boq_pc()
        {
            $data['id'] = $this->uri->segment(3);
            $data['n'] = $this->uri->segment(4);
            $this->load->view('office/pr/boq/model_pc_gl',$data);
        }

        public function return_price_old($price_old, $boq_id_re)
        {
          $sql_update_pettycashi_unitprice = "update boq_item SET boq_item.boq_balance = boq_item.boq_balance-{$price_old} WHERE boq_item.boq_id = {$boq_id_re}";
          $query = $this->db->query($sql_update_pettycashi_unitprice);
          if($query){
            $res = true;
          }else{
            $res = false;
          }

          return $res;
        }
}