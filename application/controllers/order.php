<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class order extends CI_Controller {

     public function __construct() {
            parent::__construct();
            $this->load->Model('office_m');
            $this->load->model('datastore_m');
            $this->load->model('count_m');
        }

	public function newloi()
    {
    	  $session_data = $this->session->userdata('logged_in');
          $data['res'] = $this->datastore_m->getvender();
          //$data['getpr'] = $this->office_m->getprapprove();
          $data['getproj'] = $this->datastore_m->getproject();
          $data['getdep'] = $this->datastore_m->department();
          $this->load->view('office/po/creat_order_v',$data);

     }
     public function addloi()
    {
        $datestring = "Y";
          $m = "m";
          $d = "d";

                              $this->db->select('*');
                              $qu = $this->db->get('lo');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                                if ($res==0) {
                                  $lono = "LO".date($datestring).date($m).date($d)."1";
                                }else{
                                    $this->db->select('*');
                                    $this->db->order_by('lo_id','desc');
                                    $this->db->limit('1');
                                    $q = $this->db->get('lo');
                                    $run = $q->result();
                                    foreach ($run as $valx)
                                    {
                                        $x1 = $valx->lo_id+1;
                                    }
                                  $lono = "LO".date($datestring).date($m).date($d).$x1;
                                }
          $data = array(
            'lo_id' => $this->input->post('iloid'),
          	'lo_lono' => $lono,
          	'prno' => $this->input->post('iloprno'),
            'lodate' => $this->input->post('ilodate'),
            'refquono' => $this->input->post('irefquono'),
            'quodate' => $this->input->post('iquodate'),
            'projectcode' => $this->input->post('iprojectnam'),
            'department' => $this->input->post('iputdpt'),
            'contact' => $this->input->post('ivendid'),
            'contacttype' => $this->input->post('icontacttype'),
            'jobtype' => $this->input->post('ijobtype'),
            'contactdesc' => $this->input->post('icontactdesc'),
            'contactamount' => $this->input->post('icontactamount'),
            'disamount' => $this->input->post('idisamount'),
            'amtbal' => $this->input->post('iamtbal'),
            'discount' => $this->input->post('idiscount'),
            'netamount' => $this->input->post('inetamount'),
            'vatper' => $this->input->post('ivatper'),
            'tax' => $this->input->post('itax'),
            'amountre' => $this->input->post('iamountre'),
            'paypermonth' => $this->input->post('ipaypermonth'),
            'paycon' => $this->input->post('ipaycon'),
            'after' => $this->input->post('iafter'),
            'advance' => $this->input->post('iadvance'),
            'contractperiod' => $this->input->post('icontractperiod'),
            'annuity_contracts' => $this->input->post('iannuitycontracts'),
            'pay_progess' => $this->input->post('ipayprogess'),
            'empsub' => $this->input->post('iempsub'),
            'less_ret' => $this->input->post('ilessret'),
            'less_adv_pay' => $this->input->post('ilesspay'),
            'less_other' => $this->input->post('ilessother'),
            'start_contact' => $this->input->post('istartcontact'),
            'stop_contact' => $this->input->post('istopcontact'),
            'perday' => $this->input->post('iperday'),
            'amount' => $this->input->post('iamount'),
            'retention' => $this->input->post('iretention'),
            'deliverydate' => $this->input->post('ideliverydate'),
            'location' => $this->input->post('ilocation'),
            'put' => $this->input->post('iput'),
            'accord_contact' => $this->input->post('iaccordcontact'),
            'accord_type' => $this->input->post('iaccordtype'),
            'other' => $this->input->post('iother'),
            'createdate' => $this->input->post('icreatedate'),
            'updatedate' => $this->input->post('iupdatedate'),
            'status' => $this->input->post('istatus'),
            'user' => $this->input->post('iuser')

          );
            if($this->db->insert('lo',$data))
            {
              echo $lono;
              return true;
            }
            else
            {
              return false;
            }
     }
     public function receive_loi()
        {
          $session_data = $this->session->userdata('logged_id');
          $data['res'] = $this->office_m->receive_loi();
          $data['resi'] = $this->office_m->receive_loi();
         $this->load->view('office/po/order_v',$data);
        }
}