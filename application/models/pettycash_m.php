<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pettycash_m extends CI_Controller {
      public function __construct() {
            parent::__construct();
        }
        public function pc_count_row()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
            $this->db->select('*');
            $this->db->where('compcode',$compcode);
            $qu = $this->db->get('pettycash');
            $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
            return $res;
        }
        function get_pc_num()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->order_by('doc_id','desc');
          $this->db->limit('1');
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('pettycash');
          $run = $q->result();

            return $run;
        }
        public function getedit_pc($pcno)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->from('pettycash');
          $this->db->join('project','project.project_id = pettycash.project','left outer');
          // $this->db->join('department','department.department_id = pettycash.department','left outer');
          $this->db->where('docno',$pcno);
          $this->db->where('pettycash.compcode',$compcode);
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }
        public function getpc_itemi($pcno,$id)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->where('pettycashi_ref',$pcno);
          $this->db->where('pettycashi_project',$id);
          $this->db->where('compcode',$compcode);
          $query = $this->db->get('pettycash_item');
          $res = $query->result();
          return $res;
        }
        public function archive_pettycash($proidd)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->from('pettycash');
          $this->db->join('project','project.project_id = pettycash.project','left outer');
          $this->db->join('department','department.department_id = pettycash.department','left outer');
          $this->db->where('pettycash.status',"paid");
          $this->db->or_where('pettycash.status',null);
          $this->db->where('project',$proidd);
          $this->db->where('pettycash.compcode',$compcode);
          $q = $this->db->get();
          $run = $q->result();

            return $run;
        }
        public function archive_pettycash_active($proidd,$useradd,$type)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          if ($type == "p") {
            $this->db->select('*');
            $this->db->from('pettycash');
            $this->db->join('project','project.project_id = pettycash.project','left outer');
            $this->db->where('pettycash.status !=',"delete");
            $this->db->where('project',$proidd);
            $this->db->where('pettycash.compcode',$compcode);
            // $this->db->where('pettycash.useradd',$useradd);
            $q = $this->db->get();
            $run = $q->result();
            return $run;
          }else{
            $this->db->select('*');
            $this->db->from('pettycash');
            $this->db->join('department','department.department_id = pettycash.department','left outer');
            $this->db->where('pettycash.status !=',"delete");
            $this->db->where('project',$proidd);
            $this->db->where('pettycash.compcode',$compcode);
            // $this->db->where('pettycash.useradd',$useradd);
            $q = $this->db->get();
            $run = $q->result();
            return $run;
          }
          
        }

        public function pc_report($id)
        {
          $this->db->select('*');
          $this->db->from('pettycash');
          $this->db->join('project', 'project.project_id = pettycash.project','left outer');
          $this->db->join('department','department.department_id = pettycash.department',"left outer");
          $this->db->join('system','system.systemcode = pettycash.system','left outer');
          $this->db->join('vender','vender.vender_name = pettycash.vender','left outer');
          $this->db->where('docno',$id);
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function pc_report_item ($id)
        {
          $this->db->select('*');
          $this->db->where('pettycashi_ref',$id);
          $query = $this->db->get('pettycash_item');
          $res =  $query->result();
          return $res;
        }
        public function companyimgbycompcode($compcode)
        {
            $this->db->select('*');
            $this->db->where('compcode',$compcode);
            $query = $this->db->get('company');
            $res = $query->result();
            foreach ($res as $value) {
                $img = $value->comp_img;

            }
            return $img;
        }
        public function waitapprove()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->from('pettycash');
          $this->db->join('project','project.project_id = pettycash.project','left outer');
          $this->db->join('department','department.department_id = pettycash.department','left outer');
          $this->db->where('pettycash.approve',"wait");
          $this->db->where('pettycash.status',null);
          $this->db->limit('5');
          $this->db->where('pettycash.compcode',$compcode);
          $q = $this->db->get();
          $run = $q->result();

            return $run;
        }
        public function approve()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->from('pettycash');
          $this->db->join('project','project.project_id = pettycash.project','left outer');
          $this->db->join('department','department.department_id = pettycash.department','left outer');
          $this->db->where('pettycash.approve !=',"wait");
          $this->db->where('pettycash.status',null);
          $this->db->order_by('docno','desc');
          $this->db->limit('5');
          $this->db->where('pettycash.compcode',$compcode);
          $q = $this->db->get();
          $run = $q->result();

            return $run;
        }
        public function allwaitapprove()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->from('pettycash');
          $this->db->join('project','project.project_id = pettycash.project','left outer');
          $this->db->join('department','department.department_id = pettycash.department','left outer');
          $this->db->where('pettycash.status',null);
          $this->db->order_by('docno','desc');
          $this->db->where('pettycash.compcode',$compcode);
          $q = $this->db->get();
          $run = $q->result();

            return $run;
        }
}
