<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class testpo extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('office_m');
            $this->load->model('datastore_m');
        }

         public function po()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $data['res'] = $this->datastore_m->getvender();
            $data['getpr'] = $this->office_m->getprapprove();
            $data['resmem'] = $this->datastore_m->getmember();
            $data['getproj'] = $this->datastore_m->getproject();
            $data['getdep'] = $this->datastore_m->department();
          $data['getunit'] = $this->datastore_m->getunit();
            $this->load->view('navtail/base_master/header_v');
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('base/office_menu_v',$data);
            $this->load->view('office/testpo/po_header_v',$data);
            $this->load->view('base/footer_v');
        }
        public function addpo()
        {
          $id = $this->input->post('project');
          $dptcode = $this->input->post('department');
          $datestring = "Y";

                            $this->db->select('*');
                            $this->db->where('project_id',$id);
                            $this->db->order_by('project_id','desc');
                            $this->db->limit('1');
                            $qp = $this->db->get('project');
                            $runp= $qp->result();
                            foreach ($runp as $valc)
                            {
                                $p1 =  $valc->project_id;
                            }
                            $this->db->select('*');
                            $this->db->where('department_code',$dptcode);
                            $this->db->order_by('department_code','desc');
                            $this->db->limit('1');
                            $qp = $this->db->get('department');
                            $runa= $qp->result();
                            foreach ($runa as $vald)
                            {
                                $d1 =  $vald->department_code;
                            }


                              $this->db->select('*');
                              $qu = $this->db->get('po');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
                                if ($res==0) {
                                         if($id == "")
                                          {
                                            $pono = date($datestring)."-".$d1."-"."1";
                                            $popoid = "1";
                                          }
                                          elseif ($dptcode == "")
                                          {
                                            $pono = date($datestring)."-".$p1."-"."1";
                                            $popoid = "1";
                                          }
                                }
                                else
                                {
                                            $this->db->select('*');
                                            $this->db->order_by('po_poid','desc');
                                            $this->db->limit('1');
                                            $q = $this->db->get('po');
                                            $run = $q->result();
                                            foreach ($run as $valx)
                                            {
                                                $x1 = $valx->po_poid+1;

                                            }
                                            if($id == "")
                                            {
                                              
                                              $pono = date($datestring)."-".$d1."-".$x1;
                                              $popoid = $x1;
                                            }
                                            elseif ($dptcode == "")
                                            {
                                              $pono = date($datestring)."-".$p1."-".$x1;
                                              $popoid = $x1;
                                            }
                                }


                         
                            
          $data = array(
            'po_pono' => $pono,
            'po_poid' => $popoid,
            'po_project' => $this->input->post('project'),
            'po_system' => $this->input->post('system'),
            'po_podate' => $this->input->post('podate'),
            'po_department' => $this->input->post('department'),
            'po_prname' => $this->input->post('memname'),
            'po_vender' => $this->input->post('vender'),
            'po_trem' => $this->input->post('team'),
            'po_contact' => $this->input->post('contact'),
            'po_prno' => $this->input->post('prno'),
            'po_contactno' => $this->input->post('contactno'),
            'po_quono' => $this->input->post('quono'),
            'po_deliverydate' => $this->input->post('deliverydate'),
            'po_place' => $this->input->post('place'),
            'po_remark' => $this->input->post('remark')
          );
          $q = $this->db->insert('po',$data);
      $prno = $this->input->post('prno');
           if($prno != "")
           {
            //////////////////////////////////////////////////
            $this->db->select('*');
            $this->db->where('pri_ref',$prno);
            $this->db->where('pri_status','open');
            $query = $this->db->get('pr_item');
            $count = $query->num_rows();
            ////////////////////////////////////////////////
            $this->db->select('*');
            $this->db->where('pri_ref',$prno);
            $quer = $this->db->get('pr_item');
            $countall = $quer->num_rows();
            if ($count==$countall) {
              $upt = array(
               'po_open' => "open",
             );
             $this->db->where('pr_prno',$prno);
             $this->db->update('pr',$upt);
            }
           }
          if($q)
          {
            echo $pono;
            return true;
          }
          else
          {
            return false;
          }
         
        }
        public function addpoautodetail()
        {
          $pr = $this->input->post('pr');
          $po = $this->input->post('po');
          $res = $this->office_m->retrive_pri($pr);
          foreach ($res as $value) {
            $pri_matname = $value->pri_matname;
            $pri_matcode = $value->pri_matcode;
            $pri_costcode = $value->pri_costcode;
            $pri_costname = $value->pri_costname;
            $pri_qty = $value->pri_qty;
            $pri_unit = $value->pri_unit;
            
          }
          $inspoi = array(
            'poi_matname' => $pri_matname,
            'poi_matcode' =>  $pri_matcode,
            'poi_ref' => $po,
            'poi_costname' => $pri_costname,
            'poi_costcode' => $pri_costcode,
            'poi_qty' => $pri_qty,
            'poi_unit' => $pri_unit,
            );
          $q = $this->db->insert('po_item',$inspoi);
          if ($q) {
            echo $po;
            return true;
          }else{
            return false;
          }
        }

         

// sample
        // public function strlen()
        // {
        //   $ar = "M011001";
        //   $id = substr($ar, 0,-6);
        //         $group = substr($ar, 1,-4);
        //         $subgroup = substr($ar, 3,-2);
        //         $unit = substr($ar, 5);
        //         echo $unit;
        // }

        public function run(){
          $module = 'Tender';
          $module_type = 'TD-';
          $project = '';
          $input = "04";
          $count_row = 0;

          $datestring = "Y";
          $m = "m";
          $d = "d";
          $this->db->select('*');
          $qu = $this->db->get('bdtender_h');
          $count_row = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
          if ($count_row==0) {
            //  $bd = "BD".date($datestring).date($m).date($d)."1";
            $count_row = 1;
            $res = $this->datastore_m->RunningNumber($module_type,$count_row,$input,$project,$module);
           
          }else{
              $this->db->select('*');
              $this->db->where('bd_month',$input);
              $this->db->order_by('bd_no','desc');
              $this->db->limit('1');
              $q = $this->db->get('bdtender_h');
              $run = $q->result();
              $count = $q->num_rows();
                foreach ($run as $valx)
                {
                  $bd_month = $valx->bd_month;
                }
                // $bd = "BD".date($datestring).date($m).date($d).$x1;
                if (isset($bd_month)==$input) {
                  $month = $bd_month;
                  $x1 = $count+1;
                  $res = $this->datastore_m->RunningNumber($module_type,$x1,$bd_month,$project,$module);
                }else{
                  $x1 = 1;
                  $dd = $input;
                  $res = $this->datastore_m->RunningNumber($module_type,$x1,$dd,$project,$module);
                }
                
              }
              return $res;


         
        }

        public function updatepo_to_poitem_project_id(){
          $po = $this->db->query("select po_pono,po_project from po")->result();
          foreach ($po as $key => $value) {
            $data = array(
              'poi_project' => $value->po_project, 
            );
            $this->db->where('poi_ref',$value->po_pono);
            $this->db->update('po_item',$data);
          }
        }
}