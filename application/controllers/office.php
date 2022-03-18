<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class office extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('office_m');
            $this->load->Model('auth_m');
            $this->load->model('datastore_m');
            $this->load->model('global_m');
            $this->load->model('count_m');
            $this->load->helper("my_parse_num");
            $this->load->helper(array('form', 'url','file','line_alert','notify_message','line_oa_api'));

          
        }
        public function test_line(){
          $pushID = "U55ebca7c282122cff90fec9bb3062f5a";
          $message = "เอกสาร PR ใหม่ รออนุมัติ \n";
          line_alert($pushID,$message);
        }
        public function index()
        {
            $this->load->view('auth/login_v');
        }

        public function main_index(){
          $session_data = $this->session->userdata('sessed_in');
          
           $compcode = $session_data['compcode'];
           $username = $session_data['username'];
           if ($username=="") {
             redirect('/');
           }
           $da['name'] = $session_data['m_name'];
          
           $da['depid'] = $session_data['m_depid'];
           $da['dep'] = $session_data['m_dep']; 
           $data['projid'] = $session_data['projectid'];
           $da['project'] = $session_data['m_project'];
           $projid = $session_data['projectid'];
           $userid = $session_data['m_id'];
           $projectid = $session_data['projectid'];
           // $this->load->model('datastore_m');
           $da['imgu'] = $session_data['img'];
           $data['pr_count'] = $this->datastore_m->getpr_count($compcode);
            // $data['pr_chart'] = $this->datastore_m->chart_pr();
            // $data['pr_wait'] = $this->datastore_m->getview_pr();
            // $data['years'] = $this->datastore_m->get_year();
            // $data['order'] = $this->datastore_m->get_orderproject();
            // $data['deparment'] = $this->datastore_m->get_deparmentview();
           // var_dump( $data['pr_chart']);
           // exit();

          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/main_index',$data);
          $this->load->view('base/footer_v');
        }
        public function main_index_pc(){
          $session_data = $this->session->userdata('sessed_in');
          
           $compcode = $session_data['compcode'];
           $username = $session_data['username'];
           if ($username=="") {
             redirect('/');
           }
           $da['name'] = $session_data['m_name'];
          
           $da['depid'] = $session_data['m_depid'];
           $da['dep'] = $session_data['m_dep']; 
           $data['projid'] = $session_data['projectid'];
           $da['project'] = $session_data['m_project'];
           $projid = $session_data['projectid'];
           $userid = $session_data['m_id'];
           $projectid = $session_data['projectid'];
           // $this->load->model('datastore_m');
           $da['imgu'] = $session_data['img'];
           $data['pr_count'] = $this->datastore_m->getpr_count($compcode);
            // $data['pr_chart'] = $this->datastore_m->chart_pr();
            // $data['pr_wait'] = $this->datastore_m->getview_pr();
            // $data['years'] = $this->datastore_m->get_year();
            // $data['order'] = $this->datastore_m->get_orderproject();
            // $data['deparment'] = $this->datastore_m->get_deparmentview();
           // var_dump( $data['pr_chart']);
           // exit();

          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pc_v');
          $this->load->view('office/pettycash/main_index',$data);
          $this->load->view('base/footer_v');
        }

        public function getprmonth()
        { 
          $q = $this->office_m->get_pr_line_chart();
           $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
        }

        public function getpcmonth()
        {
          $q = $this->office_m->get_pc_line_chart();
           $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
        }
        public function getpronut(){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $q = $this->office_m->get_pr_donut_chart($compcode);
          foreach ($q as $key => $value) {
            
            $data[$key]['value'] = $value->countpr;
            switch ($value->pr_approve) {
              case 'wait':
              $data[$key]['status'] = "Pending";
                $data[$key]['color'] = "#29B6F6";
                break;
              case 'approve':
              $data[$key]['status'] = "Approve";
                $data[$key]['color'] = "#66BB6A";
                break;
              case 'reject':
              $data[$key]['status'] = "Reject";
                $data[$key]['color'] = "#FF5722";
                break;
              
              default:
              $data[$key]['status'] = "Delete";
                 $data[$key]['color'] = "#EF5350";
                break;
            }
          }
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
        }
        public function getpcdonut(){
          $q = $this->office_m->get_pc_donut_chart();
          foreach ($q as $key => $value) {
            // $approve = $value->approve;
            $data[$key]['value'] = $value->countpc;
            switch ($value->approve) {
              case 'wait':
                $data[$key]['status'] = "Pending";
                $data[$key]['icon'] = "<i class='status-mark border-blue-300 position-left'></i>";
                $data[$key]['color'] = "#29B6F6";
                break;
              case 'approve':
                $data[$key]['status'] = "Approve";
                $data[$key]['icon'] = "<i class='status-mark border-success-300 position-left'></i>";
                $data[$key]['color'] = "#66BB6A";
                break;
            }
          }
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
        }
        public function officeservice()
        {

        }
        /////////////////////////////////
        /////////  add PO
        //////////////////////////////////
        ///// add po header อยู่ testpo

        public function add_podetail()
        {
          $data = array(
            'poi_ref' => $this->input->post('pono'),
            'poi_matcode' => $this->input->post('matcode'),
            'poi_matname' => $this->input->post('matname'),
            'poi_costcode' => $this->input->post('codecostcode'),
            'poi_costname' => $this->input->post('costname'),
            'poi_qty' => $this->input->post('pqty'),
            'poi_unit' => $this->input->post('punit'),
            'poi_priceunit' => $this->input->post('pprice_unit'),
            'poi_amount' => $this->input->post('pamount'),
            'poi_discountper1' => $this->input->post('pdiscper1'),
            'poi_discountper2' => $this->input->post('pdiscper2'),
            'po_disex' => $this->input->post('pdiscex'),
            'poi_disamt' => $this->input->post('pdisamt'),
            'poi_vat' => $this->input->post('pvat'),
            'poi_netamt' => $this->input->post('pnetamt'),
            'poi_remark' => $this->input->post('premark'),
          );
          if ( $this->db->insert('po_item',$data))
          {
            return true;
          }
          else
          {
            return false;
          }
        }

        public function  getpo_detail()
        {
          $this->db->select('*');
          $this->db->get('po_item');
          $res = $query->result();
          return $res;
        }
        public function edit()
        {
              $id = $this->input->post('poid');
              $code = $this->input->post('pocode');
              $data = array(
                'poi_matcode' => $this->input->post('matcodee'),
                'poi_matname' => $this->input->post('matnamee'),
                'poi_costcode' => $this->input->post('codecostcodee'),
                'poi_costname' => $this->input->post('costnamee'),
                'poi_qty' => $this->input->post('pqtye'),
                'poi_unit' => $this->input->post('punite'),
                'poi_priceunit' => $this->input->post('pprice_unite'),
                'poi_amount' => $this->input->post('pamounte'),
                'poi_discountper1' => $this->input->post('pdiscper1e'),
                'poi_discountper2' => $this->input->post('pdiscper2e'),
                'po_disex' => $this->input->post('pdiscexe'),
                'poi_disamt' => $this->input->post('pdisamte'),
                'poi_vat' => $this->input->post('pvate'),
                'poi_netamt' => $this->input->post('pnetamte'),
                'poi_remark' => $this->input->post('premarke'),
              );
              $this->db->where('poi_id',$id);
              $query = $this->db->update('po_item',$data);
              if ($query)
              {
                redirect('office/po_detail/'.$code);
              }
              else
              {
                echo "error";
              }
        }
        public function editpo_d()
        {
              $id = $this->input->post('ponoi');
              $poid = $this->input->post('poid');
              $data = array(
                'poi_matcode' => $this->input->post('matcodeb6'),
                'poi_matname' => $this->input->post('matname'),
                'poi_costcode' => $this->input->post('codecostcode'),
                'poi_costname' => $this->input->post('costname'),
                'poi_qty' => $this->input->post('pqty'),
                'poi_unit' => $this->input->post('punit'),
                'poi_priceunit' => $this->input->post('pprice_unit'),
                'poi_amount' => $this->input->post('pamount'),
                'poi_discountper1' => $this->input->post('pdiscper1'),
                'poi_discountper2' => $this->input->post('pdiscper2'),
                'po_disex' => $this->input->post('pdiscex'),
                'pri_disamt' => $this->input->post('pdisamt'),
                'poi_vat' => $this->input->post('pvat'),
                'poi_netamt' => $this->input->post('pnetamt'),
                'poi_remark' => $this->input->post('premark'),
              );
              $this->db->where('poi_ref',$id);
              $this->db->where('poi_id',$poid);
              $query = $this->db->update('po_item',$data);
              if ($query)
              {
               echo $id;
               return true;
              }
              else
              {
                return false;
              }
        }
        public function editprd()
        {
          $id = $this->input->post('ponoi');
          $prno = $this->input->post('prno');

          $data = array(
              'poi_ref' => $this->input->post('ponoi'),
              'poi_qty' => $this->input->post('pqty'),
              'poi_unit' => $this->input->post('punit'),
              'poi_priceunit' =>$this->input->post('pprice_unit'),
              'poi_amount' => $this->input->post('pamount'),
              'poi_discountper1' => $this->input->post('pdiscper1'),
              'poi_discountper2' => $this->input->post('pdiscper2'),
              'po_disex' => $this->input->post('pdiscex'),
              'poi_disamt' => $this->input->post('pdisamt'),
              'poi_vat' => $this->input->post('pvat'),
              'poi_netamt' => $this->input->post('pnetamt'),
              'poi_remark' => $this->input->post('premark'),
              'poi_costcode' => $this->input->post('codecostcode'),
              'poi_costname' => $this->input->post('costname'),
              'poi_matcode' => $this->input->post('matcodeb6'),
              'poi_matname' => $this->input->post('matname')
            );
          $q = $this->db->insert('po_item',$data);
          $prid = $this->input->post('prid');
          $datapr = array(
              'pri_qty' => $this->input->post('pqty'),
              'pri_amount' => $this->input->post('pamount'),
              'pri_priceunit' =>$this->input->post('pprice_unit'),
              'pri_discountper1' => $this->input->post('pdiscper1'),
              'pri_discountper2' => $this->input->post('pdiscper2'),
              'pri_disamt' => $this->input->post('pdisamt'),
              'pri_vat' => $this->input->post('pvat'),
              'pri_netamt' => $this->input->post('pnetamt'),
              'pri_status' => "open",
              'pri_pono' => $this->input->post('ponoi'),
              'pri_remark' => $this->input->post('premark'),
              'pri_costcode' => $this->input->post('codecostcode'),
              'pri_costname' => $this->input->post('costname'),
              'pri_matcode' => $this->input->post('matcodeb6'),
              'pri_matname' => $this->input->post('matname')
            );
          $this->db->where('pri_ref',$prno);
          $this->db->where('pri_id',$prid);
          $this->db->update('pr_item',$datapr);


          if ($q) {

            $this->db->select('*');
            $this->db->where('pri_ref',$prno);
            $this->db->where('pri_status','open');
            $tt = $this->db->get('pr_item');
            $rr = $tt->num_rows();

            $this->db->select('*');
            $this->db->where('pr_prno',$prno);
            $tr = $this->db->get('pr');
            $rt = $tr->result();
            foreach ($rt as $ue) {
              $cc = $ue->po_count;
            }
            if ($rr==$cc) {
              $uptppr = array(
                'po_open' => "open"
                );
              $this->db->where('pr_prno',$prno);
              $this->db->update('pr',$uptppr);

              $this->db->select('*');
              $this->db->where('pri_id',$prid);
              $this->db->where('pri_ref',$prno);
              $qq =$this->db->get('pr_item');
              $rest = $qq->result();
              foreach ($rest as $vv) {
                $pri_status = $vv->pri_status;
                $pri_pono = $vv->pri_pono;
              }
              // echo $pri_status;
              // echo $pri_pono;
              echo $prno;
            }
            else{

              echo  $prno;
            }


            // echo $pocount;
           return true;
          }
          else
          {
            return false;
          }
        }


        public function newprettycash()
        {
          $session_data = $this->session->userdata('logged_in');
          $data['uname'] = $session_data['m_name'];
            $data['projid'] = $session_data['projectid'];
            $data['name'] = $session_data['m_name'];
            $data['projname'] = $session_data['m_project'];
            $data['depid'] = $session_data['m_depid'];
            $data['dep'] = $session_data['m_dep'];
          $data['res'] = $this->datastore_m->getmember();
          $data['getproj'] = $this->datastore_m->getproject();
          $data['getdep'] = $this->datastore_m->department();
          $data['resv'] = $this->datastore_m->getvender();
          $data['getunit'] = $this->datastore_m->getunit();

            $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
          $this->load->view('office/officeservice/creat_prettycash_v',$data);
        }
        public function openblank()
        {
          $session_data = $this->session->userdata('sessed_in');
          
           $username = $session_data['username'];
           if ($username=="") {
             redirect('/');
           }
           $da['name'] = $session_data['m_name'];
           // $data['getproj'] = $this->datastore_m->getproject();
           // $data['resmem'] = $this->datastore_m->getmember();
           // $data['getunit'] = $this->datastore_m->getunit();
           // $data['getdep'] = $this->datastore_m->department();
           // $data['allmaterial'] = $this->datastore_m->allmaterial();
           // $data['allcostcode'] = $this->datastore_m->allcostcode();
           $da['depid'] = $session_data['m_depid'];
           $da['dep'] = $session_data['m_dep']; 
           $data['projid'] = $session_data['projectid'];
           $da['project'] = $session_data['m_project'];
           $projid = $session_data['projectid'];
           $userid = $session_data['m_id'];
          $projectid = $session_data['projectid'];
           // $this->load->model('datastore_m');
         $da['imgu'] = $session_data['img'];
         $dd['approve'] = $session_data['approve'];
         $dd['pr_project_right'] = $session_data['pr_project_right'];
          // $data['compimg'] = $this->datastore_m->companyimg();
          $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
          
          if($dd['pr_project_right'] =='true'){
          $res['getdep'] = $this->datastore_m->getdepartment();
          }else{

            $res['getdep'] = $this->datastore_m->getdepart_user($userid,$da['depid']);
          }

          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v',$dd);
          $this->load->view('office/pr/blank_v',$res);
          $this->load->view('base/footer_v');
          
        }
        public function openproject()
        {
          $session_data = $this->session->userdata('sessed_in');
           $username = $session_data['username'];
           $compcode = $session_data['compcode'];
           if ($username=="") {
             redirect('/');
           }
           $da['name'] = $session_data['m_name'];
           $da['depid'] = $session_data['m_depid'];
           $da['dep'] = $session_data['m_dep']; 
           $data['projid'] = $session_data['projectid'];
           $da['project'] = $session_data['m_project'];
           $projid = $session_data['projectid'];
           $userid = $session_data['m_id'];
          $projectid = $session_data['projectid'];
           // $this->load->model('datastore_m');
         $da['imgu'] = $session_data['img'];
         $dd['approve'] = $session_data['approve'];
         $dd['pr_project_right'] = $session_data['pr_project_right'];
          // $data['compimg'] = $this->datastore_m->companyimg();
          $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid,$compcode );
          if($dd['pr_project_right'] =='true'){
          $res['getdep'] = $this->datastore_m->getdepartment();
          }else{

            $res['getdep'] = $this->datastore_m->getdepart_user($userid,$compcode);
          }

          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v',$dd);
          $this->load->view('office/pr/open_project_v',$res);
            $this->load->view('base/footer_v');
        }
        public function newpr()
        {
          $pid = $this->uri->segment(3);
          $flagd = $this->uri->segment(4);
          if ($flagd=="p") {
                $res = $this->datastore_m->getproject_proj($pid);
            foreach ($res as $key => $value) {
              $data['projectnamea'] = $value->project_name;
              $data['projectida'] = $value->project_id;
              $data['project_co'] = $value->project_code;
              $data['depid'] = "";
              $da['dep'] ="";
              $data['item'] =  $this->db->query("select * from project_item where project_code='$value->project_code'")->result();
            }
          }else{
            $q = $this->db->query("select * from department where department_id='$pid'")->result();
            foreach ($q as $key => $value) {
              $data['depid'] = $value->department_id;
              $da['dep'] = $value->department_title;
            }
          }
          

          $session_data = $this->session->userdata('sessed_in');
          
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['mid'] = $session_data['m_id'];
          // $data['getproj'] = $this->datastore_m->getproject();
          // $data['resmem'] = $this->datastore_m->getmember();
          $data['getunit'] = $this->datastore_m->getunit();
          // $data['getdep'] = $this->datastore_m->department();
            // $data['allmaterial'] = $this->datastore_m->allmaterial();
            // $data['allcostcode'] = $this->datastore_m->allcostcode();
             //$data['depid'] = $session_data['m_depid'];
             // $da['dep'] = $session_data['m_dep'];
         $data['projid'] = $session_data['projectid'];
         $da['project'] = $session_data['m_project'];
         $this->load->model('datastore_m');
         $da['imgu'] = $session_data['img'];
         $dd['approve'] = $session_data['approve'];
         $dd['pr_project_right'] = $session_data['pr_project_right'];
         // $da['compimg'] = $this->datastore_m->companyimg();
         // $dd['countallpr'] = $this->count_m->countpr();
         // $dd['countapprovepr'] = $this->count_m->countprapprove();
         // $dd['countprdisapprove'] = $this->count_m->countprdisapprove();
         $data["array_system"] = $this->global_m->get_system_project("id",$pid,false,$session_data["compcode"]);
         $data['costtype'] = $this->datastore_m->costtype();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v',$dd);
          $this->load->view('office/officeservice/pr_v',$data);
          $this->load->view('base/footer_v');

        }
        public function editpr()
        {
          $id = $this->uri->segment(3);
          $session_data = $this->session->userdata('logged_in');
          $data['compcode'] = $session_data['compcode'];
          $data['getproj'] = $this->datastore_m->getproject();
          $data['resmem'] = $this->datastore_m->getmember();
          $data['getunit'] = $this->datastore_m->getunit();
          $data['getdep'] = $this->datastore_m->department();
          $data['getdep'] = $this->datastore_m->department();
          $data['all'] = $this->office_m->getshowpr($id);
          $data['allmaterial'] = $this->datastore_m->allmaterial();
          $data['allcostcode'] = $this->datastore_m->allcostcode();
          $this->load->view('office/officeservice/editpr_v',$data);

        }
        public function po_detail()
        {
          $session_data = $this->session->userdata('logged_id');
          $data['name'] = $session_data['m_name'];
          $this->load->model('office_m');
          $data['allpo'] = $this->office_m->countpo();
          $id = $this->uri->segment(3);

          $data['res'] = $this->office_m->retrive_po($id);
          $data['resi'] = $this->office_m->retrive_poi($id);
          $data['getunit'] = $this->datastore_m->getunit();
          $data['resmem'] = $this->datastore_m->getmember();
          $data['getproj'] = $this->datastore_m->getproject();
          $data['getdep'] = $this->datastore_m->department();
          $data['resv'] = $this->datastore_m->getvender();

          $data['allmaterial'] = $this->datastore_m->allmaterial();
          $data['allcostcode'] = $this->datastore_m->allcostcode();
          $this->load->view('navtail/base_master/header_v');
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('base/office_menu_v',$data);
          $this->load->view('office/po/po_detail_v',$data);
          $this->load->view('base/footer_v');
        }
        public function service_office_tail()
        {
          $session_data = $this->session->userdata('logged_id');
          $this->load->view('base/office_tail_v');
        }
        public function service_po_detail()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->retrive_poi($id);
             $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $this->load->view('office/po/service_po_detail_v',$data);
        }
         public function service_openpr_detail()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->retrive_openpri($id);

             $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $data['getunit'] = $this->datastore_m->getunit();
            $this->load->view('office/po/service_openpr_detail_v',$data);
        }
        public function service_openpr_detail_po()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $po = $this->uri->segment(4);
            $data['resi'] = $this->office_m->retrive_openpri_po($id,$po);

          $data['allmaterial'] = $this->datastore_m->allmaterial();
          $data['allcostcode'] = $this->datastore_m->allcostcode();
            $this->load->view('office/po/service_openpr_detail_v',$data);
        }
        public function service_openpr_detail_null()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->retrive_openprinull($id);

          $data['allmaterial'] = $this->datastore_m->allmaterial();
          $data['allcostcode'] = $this->datastore_m->allcostcode();
          $data['getunit'] = $this->datastore_m->getunit();
            $this->load->view('office/po/service_openpr_detail_v',$data);
        }
         public function service_openpr_detail_hh()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->retrive_openprihh($id);
             $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $data['getunit'] = $this->datastore_m->getunit();
            $this->load->view('office/po/service_openpr_detail_v',$data);
        }
        public function po()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['res'] = $this->datastore_m->getvender();
            $data['getpr'] = $this->office_m->getprapprove();
            $data['resmem'] = $this->datastore_m->getmember();
            $data['getproj'] = $this->datastore_m->getproject();
            $data['getdep'] = $this->datastore_m->department();
            $data['getunit'] = $this->datastore_m->getunit();
             $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $this->load->view('office/po/creat_po_v',$data);
        }
        public function editpo()
        {
            $id = $this->uri->segment(3);
            $session_data = $this->session->userdata('logged_in');
            $data['res'] = $this->datastore_m->getvender();
            $data['getpr'] = $this->office_m->getprapprove();
            $data['resmem'] = $this->datastore_m->getmember();
            $data['getproj'] = $this->datastore_m->getproject();
            $data['getdep'] = $this->datastore_m->department();
            $data['all'] = $this->office_m->retrive_po($id);
            $datai['poitem'] = $this->office_m->retrive_poi($id);
            $data['getunit'] = $this->datastore_m->getunit();
            $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $this->load->view('office/po/editpo_v',$data);
        }
        public function editpod()
        {
             $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->retrive_poi($id);
            $this->load->view('office/po/editpodetail_v',$data);
        }
        public function updatepo()
        {
            $pono = $this->input->post('pono');
          $data = array(
              'po_project' =>$this->input->post('project'),
              'po_system' =>$this->input->post('system'),
              'po_podate' =>$this->input->post('podate'),
              'po_department' =>$this->input->post('department'),
              'po_podate' =>$this->input->post('project'),
              'po_prname' =>$this->input->post('memname'),
              'po_vender' =>$this->input->post('vender'),
              'po_trem' =>$this->input->post('team'),
              'po_contact' =>$this->input->post('contact'),
              'po_prno' =>$this->input->post('prno'),
              'po_contactno' =>$this->input->post('contactno'),
              'po_quono' =>$this->input->post('quono'),
              'po_deliverydate' =>$this->input->post('deliverydate'),
              'po_place' =>$this->input->post('place'),
              'po_remark' =>$this->input->post('remark'),
            );
          $this->db->where('po_pono',$pono);
          $up = $this->db->update('po',$data);
          if($up)
          {
            echo $pono;
            return true;
          }
          else
          {
            return false;
          }

        }
        public function receive_po()
        {
          $session_data = $this->session->userdata('logged_id');
          $data['res'] = $this->office_m->receive_po();
          $this->load->view('office/po/po_v',$data);
        }
        public function delete_poall()
        {
          $id = $this->input->post('id');
          $this->db->delete('po', array('po_pono' => $id));
          $this->db->delete('po_item', array('poi_ref' => $id));
           $session_data = $this->session->userdata('logged_in');
          $username = $session_data['username'];
          $data = array(
            'user'=> $username,
            'menu'=> "Delete PO.No.".$id,
            'logindate' => date('Y-m-d H:i:s',now()),
            'ipaddress' => $this->input->ip_address()
            );
          $this->db->insert('userlog',$data);
          echo $id;
          return true;
        }
        public function  delpoitem_d()
        {
          $id = $this->input->post('poid');
          $ref = $this->input->post('ponoi');
          if ($this->db->delete('po_item', array('poi_id' => $id))) {
            echo $ref;
            return true;
          }
          else
          {
            return false;
          }
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
        public function receive_loi()
        {
          $session_data = $this->session->userdata('logged_id');
          $data['res'] = $this->office_m->receive_loi();
          $this->load->view('office/po/order_v',$data);
        }

        function get_projectname()
        {
          $id = $this->uri->segment(3);
            $q = $this->office_m->get_projectname($id);
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
        }
        public function service_approve_po()
        {
            $session_data = $this->session->userdata('logged_id');
            $data['res'] = $this->office_m->getwaitpoapprove();
            $this->load->view('office/po/complete_v',$data);
        }
        public function approvepo()
        {
          $pono = $this->input->post('pono');
          $data = array(
              'po_approve' => "approve"
            );
          $this->db->where('po_pono',$pono);
          $q = $this->db->update('po',$data);
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
        public function disapprovepo()
        {
          $pono = $this->input->post('pono');
          $data = array(
              'po_approve' => "disapprove",
              'po_disremark' => $this->input->post('po_disremark')
            );
          $this->db->where('po_pono',$prno);
          $q = $this->db->update('po',$data);
          if($q)
          {
            echo $prno;
            return true;
          }
          else
          {
            return false;
          }

        }

        ///////////////////////////////
        ///  PR
        ////////////////////////////////
        public function add_prmaster()
        {
          $datestring = "Y";
          $m = "m";
          $d = "d";

                              $this->db->select('*');
                              $qu = $this->db->get('pr');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                                if ($res==0) {
                                  $prno = "PR".date($datestring).date($m).date($d)."1";
                                }else{
                                    $this->db->select('*');
                                    $this->db->order_by('pr_prid','desc');
                                    $this->db->limit('1');
                                    $q = $this->db->get('pr');
                                    $run = $q->result();
                                    foreach ($run as $valx)
                                    {
                                        $x1 = $valx->pr_prid+1;
                                    }
                                  $prno = "PR".date($datestring).date($m).date($d).$x1;
                                }

                            // $this->db->select('*');
                            // $this->db->order_by('pr_prid','desc');
                            // $this->db->limit('1');
                            // $q = $this->db->get('pr');
                            // $run = $q->result();
                            // foreach ($run as $valx)
                            // {
                            //     $x1 = $valx->pr_prid+1;

                            // }
                            // $prno = "PR".date($datestring).date($m).date($d).$x1;
          $data = array(
            'pr_prno' => $prno,
            'pr_prdate' => $this->input->post('prdate'),
            'pr_reqname' => $this->input->post('memname'),
            'pr_department' => $this->input->post('putproject'),
            'pr_project' => $this->input->post('putprojectt'),
            'pr_deliplace' => $this->input->post('place'),
            'pr_delidate' => $this->input->post('deliverydate'),
            'pr_remark' => $this->input->post('remark'),
            'pr_system' => $this->input->post('sys'),
            'pr_approve' => "no"
            );
         $q = $this->db->insert('pr',$data);

          if($q)
          {
            echo $prno;
              return true;
          }
          else
          {
              return false;
          }
        }

        public function add_prdetail()
        {
          $add = $this->input->post();
          $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $id = $this->uri->segment(3);
       
            $prcode = $this->input->post('prcode');
            $data = array(
              'pri_ref' => $prcode,
              'pri_matname' => $this->input->post('matname'),
              'pri_matcode' => $this->input->post('matcode'),
              'pri_costcode' =>$this->input->post('codecostcode'),
              'pri_costname' =>$this->input->post('costname'),
              'pri_qty' => $this->input->post('qty'),
              'pri_unit' => $this->input->post('unit'),
              'datesend' => $this->input->post('datesend'),
              'pri_remark' => $this->input->post('remark'),

              'pri_cpqtyic' => $this->input->post('cpqtyic'),
              'pri_pqtyic' => $this->input->post('pqtyic'),
              'pri_punitic' => $this->input->post('punitic'),
              'pri_priceunit' => $this->input->post('pprice_unit'),
              'pri_amount' => $this->input->post('pamount'),
              'pri_discountper1' => $this->input->post('pdiscper1'),
              'pri_discountper2' => $this->input->post('pdiscper2'),
              'pri_discountper3' => $this->input->post('pdiscper3'),
              'pri_discountper4' => $this->input->post('pdiscper4'),
              'pri_pdiscex' => $this->input->post('pdiscex'),
              'pri_disamt' => $this->input->post('pdisamt'),
              'pri_vat' => $this->input->post('vatper'),
              'pri_tovat' => $this->input->post('to_vat'),
              'pri_netamt' => $this->input->post('pnetamt'),
              'pri_boqid' => $id,
              'pri_boqrow' => $this->input->post('whereboq'),            


              'pr_asset' => $this->input->post('statusass'),
              'pr_assetid' => $this->input->post('accode'),
              'pr_assetname' => $this->input->post('acname'),
              'compcode'=> $compcode,
              'cost_type' => $this->input->post('typejob'),
              'boq_type' => $this->input->post('typejob'),
              'pri_project' => $this->input->post('projectid'),
            );



            if($this->db->insert('pr_item',$data))
            {
            $this->db->select('*');
            $this->db->where('pr_prno',$prcode);
            $this->db->where('pr_project',$this->input->post('projectid'));
            $tr = $this->db->get('pr');
            $rt = $tr->result();
            foreach ($rt as $ue) {
              $cc = $ue->po_count;
            }
            if ($cc=="") {
             $pocount = 1;
            }
            else{
              $pocount = $cc+1;
            }
            $po = array(
              'po_count' => $pocount
              );
            $this->db->where('pr_prno',$prcode);
            $this->db->where('pr_project',$this->input->post('projectid'));
            $this->db->update('pr',$po);
            echo $prcode;
              return true;
            }
            else
            {
              return false;
            }
        }

        public function add_prdetail2()
        {
          $add = $this->input->post();
          $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $tenid = $this->uri->segment(3);
            $id = $this->uri->segment(4);
      
            $prcode = $this->input->post('prcode');



            $data = array(
              'pri_ref' => $prcode,
              'pri_matname' => $this->input->post('matname'),
              'pri_matcode' => $this->input->post('matcode'),
              'pri_costcode' =>$this->input->post('codecostcode'),
              'pri_costname' =>$this->input->post('costname'),
              'pri_qty' => $this->input->post('qty'),
              'pri_unit' => $this->input->post('unit'),
              'datesend' => $this->input->post('datesend'),
              'pri_remark' => $this->input->post('remark'),

               'pri_cpqtyic' => $this->input->post('cpqtyic'),
             'pri_pqtyic' => $this->input->post('pqtyic'),
             'pri_punitic' => $this->input->post('punitic'),
              'pri_priceunit' => $this->input->post('pprice_unit'),
             'pri_amount' => $this->input->post('pamount'),
             'pri_discountper1' => $this->input->post('pdiscper1'),
              'pri_discountper2' => $this->input->post('pdiscper2'),
             'pri_discountper3' => $this->input->post('pdiscper3'),
             'pri_discountper4' => $this->input->post('pdiscper4'),
              'pri_pdiscex' => $this->input->post('pdiscex'),
             'pri_disamt' => $this->input->post('pdisamt'),
             'pri_vat' => $this->input->post('vatper'),
               'pri_tovat' => $this->input->post('to_vat'),
              'pri_netamt' => $this->input->post('pnetamt'),
              'pri_boqid' => $id,
              'pri_boqrow' => $this->input->post('whereboq'),            


             'pr_asset' => $this->input->post('statusass'),
             'pr_assetid' => $this->input->post('accode'),
             'pr_assetname' => $this->input->post('acname'),
             'remark_mat' => $this->input->post('remark_mat'),
              'pri_boqid' => $this->input->post('hiddencost'),
             'pri_status' => "no",
             'compcode'=> $compcode,
             'boq_type' => '0',
             'pri_project' => $this->input->post('projecid'),
            );



            if($this->db->insert('pr_item',$data))
            {
                $this->db->select('*');
            $this->db->where('pr_prno',$prcode);
            $this->db->where('pr_project',$this->input->post('projecid'));
            $tr = $this->db->get('pr');
            $rt = $tr->result();
            foreach ($rt as $ue) {
              $cc = $ue->po_count;
            }
            if ($cc=="") {
             $pocount = 1;
            }
            else{
              $pocount = $cc+1;
            }
            $po = array(
              'po_count' => $pocount
              );
            $this->db->where('pr_prno',$prcode);
            $this->db->where('pr_project',$this->input->post('projecid'));
            $this->db->update('pr',$po);
            echo $prcode;
              return true;
            }
            else
            {
              return false;
            }
        }
        public function edit_prmaster()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $id = $this->input->post('prcode');
          $res = $this->office_m->getuserapprovepr($id);
          $pushID = $this->office_m->getlineid($res[0]['app_midid'],$compcode);
          // echo $pushID[0]['lineid'];
          // die();
          $remark = $this->input->post('remarkedit');
          $message = "แก้ไขเอกสาร PR : ".$id." \n";
          $message .= "หมายเหตุ : ".$remark."\n";

          $res = notify_message($message,$pushID[0]['lineid']);
          $data = array(
              'pr_prdate' => $this->input->post('pridate'),
              'pr_reqname' => $this->input->post('memname'),
              'pr_memid' => $this->input->post('memid'),
              'pr_project' => $this->input->post('putproject'),
              'pr_department' => $this->input->post('depart'),
              'pr_deliplace' => $this->input->post('place'),
              'pr_delidate' => $this->input->post('deliverydate'),
              'pr_remark' => $this->input->post('remarkedit'),
              'pr_costtype' => $this->input->post('costtype'),
              'pr_vender' => $this->input->post('vender'),
              'pr_system' => $this->input->post('system'),
              'purchase_type' => $this->input->post('purchase_type'),
              'pr_approve' => "wait",
              'express' => $this->input->post('express'),
              'subname' => $this->input->post('subname'),
              'subid' => $this->input->post('subid'),
              'wo' => $this->input->post('wo'),              
            );

          $this->db->where('pr_prno',$id);
          $this->db->where('pr_project',$this->input->post('putproject'));
          if($this->db->update('pr',$data))
          {
            $data_approve = array(
              'status' => "no"
            );
            $this->db->where('app_pr',$id);
            $this->db->where('app_project',$this->input->post('putproject'));
            $this->db->update('approve_pr',$data_approve);
            echo $id;
            return true;
          }
          else
          {
            return false;
          }
        }
         public function edt_prdetail()
        {
          $pr_ref = $this->input->post('pri_ref');
          $id = $this->input->post('pri_id');
            $data = array(
              'pri_matname' => $this->input->post('matname'),
              'pri_matcode' => $this->input->post('matcode'),
              'pri_costname' => $this->input->post('costname'),
              'pri_costcode' => $this->input->post('costcode'),
              'pri_qty' => $this->input->post('qty'),
              'pri_unit' => $this->input->post('unit'),
              'pri_remark' => $this->input->post('remark')
            );
            $this->db->where('pri_ref',$pr_ref);
            $this->db->where('pri_id',$id);
            if($this->db->update('pr_item',$data))
            {
              echo $pr_ref;
              return true;
            }
            else
            {
              echo "error";
              return false;
            }
        }
        public function delprdetail()
        {
          $id = $this->input->post('id');
          $prref = $this->uri->segment(3);
          $project = $this->uri->segment(4);
          $this->db->delete('pr_item', array(
            'pri_id' => $id,
            'pri_project' => $project,
          ));

         
    
          echo $prref;
          return true;
        }

        public function service_pr_detail()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->retrive_pri($id);
            $data['getunit'] = $this->datastore_m->getunit();
            $this->load->view('office/officeservice/service_pr_detail_v',$data);
        }
        public function service_approve_pr()
        {
            $session_data = $this->session->userdata('logged_id');
            $data['res'] = $this->office_m->getwaitprapprove();
            $this->load->view('office/officeservice/approve_pr_v',$data);
        }
        public function receice_allpr()
        {
            $session_data = $this->session->userdata('logged_id');
            $data['res'] = $this->office_m->getallpr();
            $data['cwaitapp'] = $this->count_m->countprapprove();
            $data['all'] = $this->office_m->countpr();
            $data['wait'] = $this->count_m->countprdisapprove();
            $this->load->view('office/officeservice/receive_allpr_v',$data);
        }
         public function delete_prall()
        {
          $id = $this->input->post('id');
          $this->db->delete('pr', array('pr_prno' => $id));
          $this->db->delete('pr_item', array('pri_ref' => $id));
          echo $id;
          return true;
        }
        public function service_showprdetail()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['res'] = $this->office_m->getshowpr($id);
            $data['resi'] =  $this->office_m->retrive_pri($id);
            $this->load->view('office/officeservice/sevice_showprdetail_v',$data);
        }
        public function approvepr()
        {
          $prno = $this->input->post('prno');
          $data = array(
              'pr_approve' => "approve"
            );
          $this->db->where('pr_prno',$prno);
          $q = $this->db->update('pr',$data);
          if($q)
          {
            echo $prno;
            return true;
          }
          else
          {
            return false;
          }

        }
        public function disapprovepr()
        {
          $prno = $this->input->post('prno');
          $data = array(
              'pr_approve' => "disapprove",
              'pr_disremark' => $this->input->post('pr_disremark')
            );
          $this->db->where('pr_prno',$prno);
          $q = $this->db->update('pr',$data);
          if($q)
          {
            echo $prno;
            return true;
          }
          else
          {
            return false;
          }

        }



        //////////////////////////
        ////////// Stock
        /////////////////////////
        public function main_projpo_receive_h()
        {
           $session_data = $this->session->userdata('logged_in');
          // $data['res'] = $this->datastore_m->getmember();
           $data['getproj'] = $this->datastore_m->getproject();
           $data['getdep'] = $this->datastore_m->department();
           $this->load->view('office/stock/receive_po/main_po_receive_v',$data);
        }

        public function service_po_receive_h()
        {
           $session_data = $this->session->userdata('logged_in');
          // $data['res'] = $this->datastore_m->getmember();
          // $data['getproj'] = $this->datastore_m->getproject();
          // $data['getdep'] = $this->datastore_m->department();
           $id = $this->uri->segment(3);
           $data['res'] = $this->office_m->getporece($id);
           $data['resi'] = $this->office_m->retrive_poi($id);
           $this->load->view('office/stock/po_receive_h_v',$data);
           //$this->load->view('office/stock/receive_po/po_receive_d_v',$data);
        }
        public function receive_po_list()
        {
          $session_data = $this->session->userdata('logged_in');
          // $data['res'] = $this->datastore_m->getmember();
          // $data['getproj'] = $this->datastore_m->getproject();
          // $data['getdep'] = $this->datastore_m->department();
             $id = $this->uri->segment(3);
             // echo $id;
             $data['res'] = $this->office_m->getpolist($id);
             $this->load->view('office/stock/receive_po/receive_po_list_v',$data);
        }

        public function add_po_receive_h()
        {
          $id = $this->input->post('podate');

          $datestring = "Y";
          $mm = "m";
          $dd = "d";

                              $this->db->select('*');
                              $qu = $this->db->get('po_receive');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                                if ($res==0) {
                                  $poreccode = "R".date($datestring).date($mm).date($dd)."1";
                                }else{
                                    $this->db->select('*');
                                    $this->db->order_by('po_recid','desc');
                                    $this->db->limit('1');
                                    $q = $this->db->get('po_receive');
                                    $run = $q->result();
                                    foreach ($run as $valx)
                                    {
                                        $x1 = $valx->po_recid+1;
                                    }
                                  $poreccode = "R".date($datestring).date($mm).date($dd).$x1;
                                }

                            // $this->db->select('*');
                            // $this->db->order_by('po_recid','desc');
                            // $this->db->limit('1');
                            // $q = $this->db->get('po_receive');
                            // $run = $q->result();
                            // foreach ($run as $valx)
                            // {
                            //     $x1 = $valx->po_recid+1;

                            // }

                            //   $poreccode = date($datestring)."-".date($mm)."-".date($dd)."-".$x1;

          $data = array(
            'po_reccode' => $poreccode,
            'po_recdate' => $this->input->post('porecdate'),
            'podate' => $this->input->post('podate'),
            'venderid' => $this->input->post('vendername'),
            'project' => $this->input->post('projectid'),
            'department' => $this->input->post('deparid'),
            'system' => $this->input->post('system'),
            'taxno' => $this->input->post('taxno'),
            'taxdate' => $this->input->post('taxdate'),
            'duedate' => $this->input->post('duedate'),
            'docode' => $this->input->post('docode'),
            'term' => $this->input->post('term'),
            'dodate' => $this->input->post('dodate')
            );
          $q = $this->db->insert('po_receive',$data);
          if($q)
          {
            echo $poreccode;
            return true;
          }else{
            return false;
          }
        }
        public function service_po_receive_d()
        {
          $id = $this->uri->segment(3);
          $data['resi'] = $this->office_m->retrive_poi($id);
          $this->load->view('office/stock/receive_po/po_receive_d_v',$data);
        }
        public function ins_recevice_poitem()
        {
          $id = $this->input->post('id');
          $ref = $this->input->post('ref');
          $rece = $this->input->post('remark');
          $this->db->select('*');
          $this->db->where('poi_id',$id);
          $q = $this->db->get('po_item');
          $res = $q->result();
          foreach ($res as $val) {
           $receive = $val->poi_receive;
           $qty = $val->poi_qty;
           $tot = $val->poi_receivetot;
           $ponetamt = $val->poi_netamt;



           /////insert poi_recitem////
           $poi_matname = $val->poi_matname;
           $poi_matcode = $val->poi_matcode;
           $poi_ref = $val->poi_ref;

           //
           $poi_costcode = $val->poi_costcode;
           $poi_costname = $val->poi_costname;
           $poi_unit = $val->poi_unit;
           $poi_priceunit = $val->poi_priceunit;
           $poi_amount = $val->poi_amount;
           $poi_discountper1 = $val->poi_discountper1;
           $poi_discountper2 = $val->poi_discountper2;
           $poi_disamt = $val->poi_disamt;
           $poi_vat = $val->poi_vat;
           $poi_remark = $val->poi_remark;
           $poi_netamt = $val->poi_netamt;

          }
          ////////////update total po
          $this->db->select('*');
          $this->db->where('podate',$ref);
          $qr = $this->db->get('po_receive');
          $rt = $qr->result();
          foreach ($rt as $ototamt) {
            $qtotamy = $ototamt->po_recamttot;
          }
          $uptpotot = array(
              'po_recamttot' => $ponetamt+$qtotamy
            );
          $this->db->where('podate',$ref);
          $this->db->update('po_receive',$uptpotot);

          $preceive = $receive+$rece;

          if($receive!=$qty)
          {
            ///// update po ///
            $data = array(
              'poi_receive' => $preceive,
              'poi_receivetot' =>  $rece
            );
            $this->db->where('poi_id',$id);
             $this->db->update('po_item',$data);

            /////// end update po /////////////
             ///////////////////////////////////////////////////////////////////////////////////////////////////////////
               ///////////////////////////////////////////////////////////
            $this->db->select_sum('poi_qty');
            $this->db->where('poi_ref',$ref);
            $query = $this->db->get('po_item');
            $resl = $query->result();
            foreach ($resl as $vale) {
              $r = $vale->poi_qty;
            }
            /////////////////////////////////////////////////////////
          ////////////////////// Update sum qty po///////////////////
          $this->db->select('*');
          $this->db->where('po_pono',$ref);
          $qo = $this->db->get('po');
          $res = $qo->result();
          foreach ($res as $value) {
            $totqty = $value->po_qty;
          }
          if ($r==$totqty) {
            $recfull = array(
              'ic_status' => "full"
              );
            $this->db->where('po_pono',$ref);
            $this->db->update('po',$recfull);
             $recicfull = array(
              'ic_status' => "full"
              );
            $this->db->where('podate',$ref);
            $this->db->update('po_receive',$recicfull);
          }else{
            echo "งง";
          // $uptpo_h = array(
          //     'po_qty' => $qty+$totqty
          //   );
          // $this->db->where('po_pono',$ref);
          // $this->db->update('po',$uptpo_h);
          //   $this->db->select('*');
          //   $this->db->where('po_pono',$ref);
          //   $qou = $this->db->get('po');
          //   $resr = $qou->result();
          //   foreach ($resr as $vae) {
          //     $tqty = $vae->po_qty;
          //   }
          //   if ($r==$tqty) {
          //     $recfull = array(
          //       'ic_status' => "full"
          //       );
          //     $this->db->where('po_pono',$ref);
          //     $this->db->update('po',$recfull);
          //     $recicfull = array(
          //     'ic_status' => "full"
          //     );
          //   $this->db->where('podate',$ref);
          //   $this->db->update('po_receive',$recicfull);
          //   }
          }
          ///////////////////// end update po ////////////////////


             /////////////////////////////////////////////////////////////////////////////////////////////
            /////// insert poi_recitm /////
            $dataporec = array(
              'poi_matname' => $poi_matname,
              'poi_matcode' => $poi_matcode,
              'poi_ref' => $poi_ref,
              'poi_qty' => $qty,
              'poi_receive' => $preceive,
              'poi_receivetot' =>  $rece,
              'poitem_id'=> $id,
              'poi_costcode'  => $poi_costcode,
              'poi_costname'  => $poi_costname,
              'poi_unit'  => $poi_unit,
              'poi_priceunit'  => $poi_priceunit,
              'poi_amount'  => $poi_amount,
              'poi_discountper1'  => $poi_discountper1,
              'poi_discountper2'  => $poi_discountper2,
              'poi_disamt'  => $poi_disamt,
              'poi_vat'  => $poi_vat,
              'poi_remark'  => $poi_remark,
              'poi_netamt'  => $poi_netamt
              );
            $q = $this->db->insert('po_recitem',$dataporec);
            //////end insert poi_recitem///////
            /////////insert Store //////////////
                        $this->db->select('*');
                          $this->db->where('store_matcode',$poi_matcode);
                          $qur = $this->db->get('store');
                          $ree = $qur->result();
                          foreach ($ree as $mat) {
                              $totstqty =  $mat->store_qty;
                              $getmatcode = $mat->store_matcode;
                          }

                          if ($getmatcode=="") {

                              $datastore = array(
                                //'store_project' => $this->input->post('sproj'),
                                'store_matcode' => $poi_matcode,
                                'store_matname' => $poi_matname,
                                'store_qty' => $rece,
                                'store_total' =>$rece
                                );
                              $this->db->insert('store',$datastore);
                          }
                          else
                          {

                             $datastore = array(
                                //'store_project' => $this->input->post('sproj'),
                                'store_matcode' => $poi_matcode,
                                'store_matname' => $poi_matname,
                                'store_qty' => $totstqty+$rece,
                                'store_total' => $totstqty+$rece
                            );
                             $this->db->where('store_matcode',$getmatcode);
                            $this->db->update('store',$datastore);
                          }
            /////////end insert store //////////

            $this->db->select('*');
            $this->db->where('podate',$poi_ref);
            $ee = $this->db->get('po_receive');
            $rr = $ee->result();
            foreach ($rr as $kk) {
              $porr = $kk->po_reccode;
            }
            if ($q)
            {
              echo $porr;
              return true;
            }
            else
            {
              return false;
            }
          }
          else
          {
            print "<script type=\"text/javascript\">alert('รับสินค้าครบแล้ว');</script>";
          }
        }

        public function del_prpodetail()
        {
          $pr_id = $this->input->post('prid');
          $pr_code = $this->input->post('prcode');
         $data = array(
          'pri_status' => null,
          'pri_pono' => "no"
          );
         $this->db->where('pri_id',$pr_id);
         $this->db->where('pri_ref',$pr_code);
         $this->db->update('pr_item',$data);
         echo $pr_code;
          return true;

        }
         public function insertpodetail()
        {
          $id = $this->input->post('ponoi');
          $prno = $this->input->post('prno');

          $data = array(
              'poi_ref' => $this->input->post('ponoi'),
              'poi_qty' => $this->input->post('pqty'),
              'poi_unit' => $this->input->post('punit'),
              'poi_priceunit' =>$this->input->post('pprice_unit'),
              'poi_amount' => $this->input->post('pamount'),
              'poi_discountper1' => $this->input->post('pdiscper1'),
              'poi_discountper2' => $this->input->post('pdiscper2'),
              'po_disex' => $this->input->post('pdiscex'),
              'poi_disamt' => $this->input->post('pdisamt'),
              'poi_vat' => $this->input->post('pvat'),
              'poi_netamt' => $this->input->post('pnetamt'),
              'poi_remark' => $this->input->post('premark'),
              'poi_costcode' => $this->input->post('codecostcode'),
              'poi_costname' => $this->input->post('costname'),
              'poi_matcode' => $this->input->post('matcodeb6'),
              'poi_matname' => $this->input->post('matname')
            );
          $q = $this->db->insert('po_item',$data);
          $prid = $this->input->post('prid');
          $datapr = array(
              'pri_qty' => $this->input->post('pqty'),
              'pri_amount' => $this->input->post('pamount'),
              'pri_priceunit' =>$this->input->post('pprice_unit'),
              'pri_discountper1' => $this->input->post('pdiscper1'),
              'pri_discountper2' => $this->input->post('pdiscper2'),
              'pri_disamt' => $this->input->post('pdisamt'),
              'pri_vat' => $this->input->post('pvat'),
              'pri_netamt' => $this->input->post('pnetamt'),
              'pri_status' => "open",
              'pri_pono' => $this->input->post('ponoi')
            );
          $this->db->where('pri_ref',$prno);
          $this->db->where('pri_id',$prid);
          $this->db->update('pr_item',$datapr);


          if ($q) {

            $this->db->select('*');
            $this->db->where('pri_ref',$prno);
            $this->db->where('pri_status','open');
            $tt = $this->db->get('pr_item');
            $rr = $tt->num_rows();

            $this->db->select('*');
            $this->db->where('pr_prno',$prno);
            $tr = $this->db->get('pr');
            $rt = $tr->result();
            foreach ($rt as $ue) {
              $cc = $ue->po_count;
            }
            if ($rr==$cc) {
              $uptppr = array(
                'po_open' => "open"
                );
              $this->db->where('pr_prno',$prno);
              $this->db->update('pr',$uptppr);

              $this->db->select('*');
              $this->db->where('pri_id',$prid);
              $this->db->where('pri_ref',$prno);
              $qq =$this->db->get('pr_item');
              $rest = $qq->result();
              foreach ($rest as $vv) {
                $pri_status = $vv->pri_status;
                $pri_pono = $vv->pri_pono;
              }
              // echo $pri_status;
              // echo $pri_pono;
              echo $prno;
            }
            else{

              echo  $prno;
            }


            // echo $pocount;
           return true;
          }
          else
          {
            return false;
          }
        }


        public function approve_pj_pr(){
              $session_data = $this->session->userdata('sessed_in');
              $username = $session_data['username'];
              $compcode = $session_data['compcode'];
              $id = $this->uri->segment(3);
              $pr = $this->uri->segment(4);
              $pj = $this->uri->segment(5);
              $sequence = $this->uri->segment(6);
              $pjid = $this->uri->segment(7);
              $pdcode = $this->uri->segment(8);
            
              // Get line id
              if ($sequence >= 1) {
                $pushID = $this->datastore_m->getprseq($pr,$compcode,$sequence);
              }else{
                $pushID = $this->datastore_m->getapproveid($id,$compcode);
              }
              // Get line id
              // var_dump($app_middid);
              // var_dump($pushID);
              // echo $sequence;
              //   die();
              $data = array(
                  'status' => "yes",
                  'app_date' =>date('Y-m-d'),
                  'app_time' => date('H:i:s'),
                );
              $this->db->where('app_id',$id);
              $this->db->update('approve_pr',$data);

              $this->db->select('app_midid');
              $this->db->from('approve_pr');
              $this->db->where('app_project',$pj);
              $this->db->where('app_pr',$pr);
              $this->db->where('app_sequence',$sequence);
              $numz=$this->db->get()->num_rows(); 
              if($numz>=1){
                // echo $numz;
                // die();
                $dataz = array(
                  'status' => "yes",
                  'app_date' =>date('Y-m-d'),
                  'app_time' => date('H:i:s'),
                );
                $this->db->where('app_pr',$pr);
                $this->db->where('app_sequence',$sequence);
                $this->db->update('approve_pr',$dataz);
                //  line alert
                  // $approvename = $this->datastore_m->getname($pushID,$compcode);
                  
                  $message = "อนุมัติ ลำดับที่ {$sequence} \n";
                  $message .= "Doc type : PR\n";
                  $message .= "Doc No : {$pr}\n";
                  $message .= "status : Approve\n";
                  
                  // $message .= "-----------------------------------------\n";
                  $n=1;
                  $resd = $this->datastore_m->getprdetail($pr,$compcode);
                  foreach ($resd as $key => $value) {
                    $message .= $key+$n.". ".$value->pri_matname." จำนวน ".$value->pri_qty." ".$value->pri_unit."\n";
                    // $message .= "-----------------------------------------\n";
                  }
                  $message .= "Approve by : ". $username."\n";
                  $message .= base_url('office/approve_pj_pr/'.($id+1).'/'.$pr.'/'.$pj.'/'.$sequence.'/'.$pjid);
                  // notify_message($message,$pushID);
                  $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
                  $line = $line_api_service[0]['line_api'];
                  $data = array( 
                    "id" => $pushID,
                    "type" =>"message",
                    "text" => "Doc No. : ".$pr,
                    "price" => $message,
                    "pay" =>"3",
                    "unit" =>"4",
                    "doc" =>"5",
                    "compcode_line" => "6",
                    "user" =>"7",
                    "link" => $line,
                    "base_url" => base_url('pr/pr_approve/'.$pdcode.'/'.$pj.'/'.$username.'/'.$pr)
            
                );
                  line_oa_api($data,$line);
                  // line alert
                }

                
          

              $datap = array(
                  'status' => "approve",
                  'app_date' =>date('Y-m-d'),
                  'app_time' => date('H:i:s'),
                );
              $this->db->where('app_pr',$pr);
              $this->db->where('app_sequence <',$sequence);
              $this->db->update('approve_pr',$datap);

              

            

              $this->db->select('*');
              $this->db->from('approve_pr');
              $this->db->where('app_project',$pj);
              $this->db->where('app_pr',$pr);
              $this->db->where('status =','no'); 
              $numx=$this->db->get()->num_rows(); 
                
              $year = date('Y');
              $mount = date('m');
              $modal="pr";
                
              if($numx=="0"){
                $datax = array(
                  'pr_approve' => "approve",
                
                );
                $this->db->where('pr_prno',$pr);
                $this->db->update('pr',$datax);
                // //  line alert
              
                $messagef = "อนุมัติ ลำดับที่ k {$sequence} สุดท้าย \n";
                $messagef .= "Doc type : PR\n";
                $messagef .= "Doc No : {$pr}\n";
                $messagef .= "status : Approve\n";
                // $messagef .= "Number of items : ".count($add['qtyi'])."\n";
                $messagef .= "-----------------------------------------\n";
                $resd = $this->datastore_m->getprdetail($pr,$compcode);
                $n=1;
                  foreach ($resd as $key => $value) {
                    $messagef .= $key+$n.". ".$value->pri_matname." จำนวน ".$value->pri_qty." ".$value->pri_unit."\n";
                    // $message .= "-----------------------------------------\n";
                  }
                  $messagef .= "-----------------------------------------\n";
                $messagef .= "Approve by : ". $username."\n";
                // $messagef .= "Approve : ".$approvename;
                $pushID_t = $this->db->query("select useradd from pr where pr_prno='$pr';")->result_array();
                $fff = $pushID_t[0]['useradd'];
                $lineid_t = $this->db->query("select lineid from member where m_user='$fff';")->result_array();
               echo $lineid_t[0]['lineid'];
                // notify_message($messagef,$lineid_t[0]['lineid']);
                $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
                  $line = $line_api_service[0]['line_api'];
                $data = array( 
                  "id" => $pushID[0]['lineid'],
                  "type" =>"message",
                  "text" => "Doc No. : ".$pr,
                  "price" => $username,
                  "pay" =>"3",
                  "unit" =>"4",
                  "doc" =>"5",
                  "compcode_line" => "6",
                  "user" =>"7",
                  "link" => $line,
                  "base_url" => base_url('pr/pr_approve/'.$pdcode.'/'.$pj.'/'.$username.'/'.$pr)
          
              );
                line_oa_api($data,$line);
                // // line alert



                $count = $this->datastore_m->countappove_project($year,$mount,$compcode,$modal,$pjid);
                foreach ($count as $key => $value) {
                  $bi_approve = $value->bi_approve;
                  $approve = $value->approve;
                  $bi_wait = $value->bi_wait;
                }
                // var_dump($count);
                // die();
               
            
            }
              redirect('pr/pr_approve/'.$pj.'/'.$pjid);
            

        }
        public function approve_pj_pr_line(){
              $session_data = $this->session->userdata('sessed_in');
              $username = $session_data['username'];
              $compcode = $session_data['compcode'];
              $id = $this->uri->segment(3);
              $pr = $this->uri->segment(4);
              $pj = $this->uri->segment(5);
              $sequence = $this->uri->segment(6);
              $pjid = $this->uri->segment(7);
              $res = $this->db->query("select `app_midid`,`app_midname`, COUNT(app_midid) as count FROM (`approve_pr`) WHERE `app_pr` = '".$pr."' AND `status` = 'no' AND `compcode` = '".$compcode."' AND `app_sequence` = '".$sequence."';")->result_array();
            
              // Get line id
              if ($sequence > 1) {
                $pushID = $this->datastore_m->getprseq_line($pr,$compcode,$sequence);
              }else{
                $pushID = $this->datastore_m->getapproveid($id,$compcode);
              }
              // Get line id
              // var_dump($res[0]['app_midname']);
              // var_dump($pushID);
              //   die();
              $data = array(
                  'status' => "yes",
                  'app_date' =>date('Y-m-d'),
                  'app_time' => date('H:i:s'),
                );
              $this->db->where('app_id',$id);
              $this->db->update('approve_pr',$data);

              $this->db->select('app_midid');
              $this->db->from('approve_pr');
              $this->db->where('app_project',$pj);
              $this->db->where('app_pr',$pr);
              $this->db->where('app_sequence',$sequence);
              $numz=$this->db->get()->num_rows(); 
              if($numz>=1){
                // echo $numz;
                // die();
                $dataz = array(
                  'status' => "yes",
                  'app_date' =>date('Y-m-d'),
                  'app_time' => date('H:i:s'),
                );
                $this->db->where('app_pr',$pr);
                $this->db->where('app_sequence',$sequence);
                $this->db->update('approve_pr',$dataz);
                //  line alert
                  // $approvename = $this->datastore_m->getname($pushID,$compcode);
                  
                  $message = "อนุมัติ ลำดับที่ {$sequence} \n";
                  $message .= "Doc type : PR\n";
                  $message .= "Doc No : {$pr}\n";
                  $message .= "status : Approve\n";
                  
                  // $message .= "-----------------------------------------\n";
                  $n=1;
                  $resd = $this->datastore_m->getprdetail($pr,$compcode);
                  foreach ($resd as $key => $value) {
                    $message .= $key+$n.". ".$value->pri_matname." จำนวน ".$value->pri_qty." ".$value->pri_unit."\n";
                    // $message .= "-----------------------------------------\n";
                  }
                  $message .= "Approve by : ". $username."\n";
                  $message .= base_url('office/approve_pj_pr/'.($id+1).'/'.$pr.'/'.$pj.'/'.$sequence.'/'.$pjid);
                  // notify_message($message,$pushID);
                  $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
                  $line = $line_api_service[0]['line_api'];
                  $data = array( 
                    "id" => $pushID,
                    "type" =>"message",
                    "text" => "Doc No. : ".$pr,
                    "price" => $res[0]['app_midname'],
                    "pay" =>"3",
                    "unit" =>"4",
                    "doc" =>"5",
                    "compcode_line" => "6",
                    "user" =>"7",
                    "link" => $line,
                    "base_url" => base_url('pr/pr_approve_line/'.$pj.'/'.$pjid.'/'.$res[0]['app_midname'].'/'.$pr)
            
                );
                  line_oa_api($data,$line);
                  // line alert
                }

                
          

              $datap = array(
                  'status' => "approve",
                  'app_date' =>date('Y-m-d'),
                  'app_time' => date('H:i:s'),
                );
              $this->db->where('app_pr',$pr);
              $this->db->where('app_sequence <',$sequence);
              $this->db->update('approve_pr',$datap);

              

            

              $this->db->select('*');
              $this->db->from('approve_pr');
              $this->db->where('app_project',$pj);
              $this->db->where('app_pr',$pr);
              $this->db->where('status =','no'); 
              $numx=$this->db->get()->num_rows(); 
                
              $year = date('Y');
              $mount = date('m');
              $modal="pr";
                
              if($numx=="0"){
                $datax = array(
                  'pr_approve' => "approve",
                
                );
                $this->db->where('pr_prno',$pr);
                $this->db->update('pr',$datax);
                // //  line alert
              
                $messagef = "อนุมัติ ลำดับที่ k {$sequence} สุดท้าย \n";
                $messagef .= "Doc type : PR\n";
                $messagef .= "Doc No : {$pr}\n";
                $messagef .= "status : Approve\n";
                // $messagef .= "Number of items : ".count($add['qtyi'])."\n";
                $messagef .= "-----------------------------------------\n";
                $resd = $this->datastore_m->getprdetail($pr,$compcode);
                $n=1;
                  foreach ($resd as $key => $value) {
                    $messagef .= $key+$n.". ".$value->pri_matname." จำนวน ".$value->pri_qty." ".$value->pri_unit."\n";
                    // $message .= "-----------------------------------------\n";
                  }
                  $messagef .= "-----------------------------------------\n";
                $messagef .= "Approve by : ". $username."\n";
                // $messagef .= "Approve : ".$approvename;
                $pushID_t = $this->db->query("select useradd from pr where pr_prno='$pr';")->result_array();
                $fff = $pushID_t[0]['useradd'];
                $lineid_t = $this->db->query("select lineid from member where m_user='$fff';")->result_array();
               echo $lineid_t[0]['lineid'];
                // notify_message($messagef,$lineid_t[0]['lineid']);
                $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
                  $line = $line_api_service[0]['line_api'];
                $data = array( 
                  "id" => $lineid_t[0]['lineid'],
                  "type" =>"message",
                  "text" => "Doc No. : ".$pr,
                  "price" => $res[0]['app_midname'],
                  "pay" =>"3",
                  "unit" =>"4",
                  "doc" =>"5",
                  "compcode_line" => "6",
                  "user" =>"7",
                  "link" => $line,
                  "base_url" => base_url('pr/pr_approve_line/'.$pj.'/'.$pjid.'/'.$res[0]['app_midname'].'/'.$pr)
          
              );
                line_oa_api($data,$line);
                // // line alert



                $count = $this->datastore_m->countappove_project($year,$mount,$compcode,$modal,$pjid);
                foreach ($count as $key => $value) {
                  $bi_approve = $value->bi_approve;
                  $approve = $value->approve;
                  $bi_wait = $value->bi_wait;
                }
                // var_dump($count);
                // die();
               
            
            }
              // redirect('pr/pr_approve/'.$pj.'/'.$pjid);
            

        }

        public function approve_pj_po(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $fullname = $session_data['m_name'];
            $compcode = $session_data['compcode'];
            $id = $this->uri->segment(3);
            $pr = $this->uri->segment(4);
            $pj = $this->uri->segment(5);
            $sequence = $this->uri->segment(6);
            $pjid = $this->uri->segment(7);
             // Get line id
             if ($sequence >= 1) {
              $pushID = $this->datastore_m->getposeq($pr,$compcode,$sequence);
            }else{
              $pushID = $this->datastore_m->getpoapproveid($id,$compcode);
            }
            // Get line id
            $data = array(
                'status' => "yes",
                'app_date' =>date('Y-m-d'),
                'app_time' => date('H:i:s'),
              );
            $this->db->where('app_id',$id);
            $this->db->update('approve_po',$data);

            
            $this->db->select('*');
            $this->db->from('approve_po');
            $this->db->where('app_project',$pj);
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $numz=$this->db->get()->num_rows(); 

            if($numz>=1){
              $dataz = array(
                'status' => "yes",
                'app_date' =>date('Y-m-d'),
                'app_time' => date('H:i:s'),
              );
              $this->db->where('app_pr',$pr);
              $this->db->where('app_sequence',$sequence);
              $this->db->update('approve_po',$dataz);
               //  line alert
                  // $approvename = $this->datastore_m->getname($pushID,$compcode);
                  
                  $message = "อนุมัติ ลำดับที่ {$sequence} \n";
                  $message .= "Doc type : PO\n";
                  $message .= "Doc No : {$pr}\n";
                  $message .= "status : Approve\n";
                  
                  // $message .= "-----------------------------------------\n";
                  $n=1;
                  $resd = $this->datastore_m->getpodetail($pr,$compcode);
                  foreach ($resd as $key => $value) {
                    $message .= $key+$n.". ".$value->poi_matname." จำนวน ".$value->poi_qty." ".$value->poi_unit."\n";
                    // $message .= "-----------------------------------------\n";
                  }
                  $message .= "Approve by : ". $username."\n";
                  $message .= base_url('purchase/purchase_approve/'.$pj.'/p'.'/'.$pjid);
                  // notify_message($message,$pushID);
                  $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
                  $line = $line_api_service[0]['line_api'];
                    $data = array( 
                      "id" => $pushID,
                      "type" =>"message",
                      "text" => "Doc No. : ".$pr,
                      "price" => $fullname,
                      "pay" =>"3",
                      "unit" =>"4",
                      "doc" =>"5",
                      "compcode_line" => "6",
                      "user" =>"7",
                      "link" => $line,
                      "base_url" => base_url('purchase/purchase_approve/'.$pj.'/p'.'/'.$pjid)
              
                    );
                  line_oa_api($data,$line);
                  // line alert
            }

            $datap = array(
                'status' => "approve",
                'app_date' =>date('Y-m-d'),
                'app_time' => date('H:i:s'),
              );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence <',$sequence);
            $this->db->update('approve_po',$datap);


            

            $this->db->select('*');
            $this->db->from('approve_po');
            $this->db->where('app_project',$pj);
            $this->db->where('app_pr',$pr);
            $this->db->where('status =','no'); 
            $numx=$this->db->get()->num_rows(); 
            
            $year = date('Y');
            $mount = date('m');
            $modal="po";

            if($numx=="0"){
              $datax = array(
                'po_approve' => "approve",
              
              );
              $this->db->where('po_pono',$pr);
              $this->db->update('po',$datax);
              // //  line alert
                            
              $messagef = "อนุมัติ ลำดับที่ P {$sequence} สุดท้าย \n";
              $messagef .= "Doc type : PO\n";
              $messagef .= "Doc No : {$pr}\n";
              $messagef .= "status : Approve\n";
              // $messagef .= "Number of items : ".count($add['qtyi'])."\n";
              $messagef .= "-----------------------------------------\n";
              $resd = $this->datastore_m->getpodetail($pr,$compcode);
              $n=1;
              foreach ($resd as $key => $value) {
                $messagef .= $key+$n.". ".$value->poi_matname." จำนวน ".$value->poi_qty." ".$value->poi_unit."\n";
                // $message .= "-----------------------------------------\n";
              }
                $messagef .= "-----------------------------------------\n";
              $messagef .= "Approve by : ". $username."\n";
              // $messagef .= "Approve : ".$approvename;
              $pushID_t = $this->db->query("select po_memid from po where po_pono='$pr';")->result_array();
              $fff = $pushID_t[0]['po_memid'];
              $lineid_t = $this->db->query("select lineid from member where m_id='$fff';")->result_array();
              echo $lineid_t[0]['lineid'];
              // notify_message($messagef,$lineid_t[0]['lineid']);
              $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
              $line = $line_api_service[0]['line_api'];
                    $data = array( 
                      "id" => $pushID,
                      "type" =>"message",
                      "text" => "Doc No. : ".$pr,
                      "price" => $fullname,
                      "pay" =>"3",
                      "unit" =>"4",
                      "doc" =>"5",
                      "compcode_line" => "6",
                      "user" =>"7",
                      "link" => $line,
                      "base_url" => base_url('purchase/purchase_approve/'.$pj.'/p'.'/'.$pjid)
              
                    );
                  line_oa_api($data,$line);
              // // line alert

              $count = $this->datastore_m->countappove_project($year,$mount,$compcode,$modal,$pjid);
              foreach ($count as $key => $value) {
                $bi_approve = $value->bi_approve;
                $approve = $value->approve;
                $bi_wait = $value->bi_wait;
              }
              // var_dump($count);
              // die();
              if ($approve == 0) {
                $view = array(
                    'bi_modal'    => "po",
                    'bi_year'     => $year,
                    'bi_month'    => $mount,
                    'bi_approve'     => 1,
                    'compcode'  => $compcode,
                    'bi_project'  => $pjid,
                  );
                $this->db->insert('bi_views_project',$view);
              }else{
              $view = array(
                    'bi_wait'     => @$bi_wait-1,
                    'bi_approve'     => @$bi_approve+1,
                  );
                $this->db->where('bi_project',$pjid);
                $this->db->where('bi_modal',$modal);
                $this->db->where('bi_month',$mount);
                $this->db->where('bi_year',$year);
                $this->db->update('bi_views_project',$view);
            }
          }
              

            redirect('purchase/purchase_approve/'.$pjid.'/'.'p'.'/'.$pj);
          

        }

        public function approve_pj_wo(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $fullname = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
           // Get line id
           if ($sequence > 1) {
            $pushID = $this->datastore_m->getwoseq($pr,$compcode,$sequence);
          }else{
            $pushID = $this->datastore_m->getwoapproveid($id,$compcode);
          }
          // Get line id
          // var_dump($pushID);
          // die();
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_wo',$data);

          $this->db->select('*');
          $this->db->from('approve_wo');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          if($numz >=1){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_wo',$dataz);
             //  line alert
                  // $approvename = $this->datastore_m->getname($pushID,$compcode);
                  
                  $message = "อนุมัติ ลำดับที่ {$sequence} \n";
                  $message .= "Doc type : WO\n";
                  $message .= "Doc No : {$pr}\n";
                  $message .= "status : Approve\n";
                  
                  // $message .= "-----------------------------------------\n";
                  $n=1;
                  $resd = $this->datastore_m->getlodetail($pr,$compcode);
                  foreach ($resd as $key => $value) {
                    $message .= $key+$n.". ".$value->lo_matname." จำนวน ".$value->lo_qty." ".$value->lo_unit."\n";
                    // $message .= "-----------------------------------------\n";
                  }
                  $message .= "Approve by : ". $username."\n";
                  $message .= base_url('office/approve_pj_pr/'.($id+1).'/'.$pr.'/'.$pj.'/'.$sequence.'/'.$pjid);
                  // notify_message($message,$pushID);
                  $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
                  $line = $line_api_service[0]['line_api'];
                  $data = array( 
                    "id" => $pushID,
                    "type" =>"message",
                    "text" => "Doc No. : ".$pr,
                    "price" => $fullname,
                    "pay" =>"3",
                    "unit" =>"4",
                    "doc" =>"5",
                    "compcode_line" => "6",
                    "user" =>"7",
                    "link" => $line,
                    "base_url" => base_url('contract/newapprovecontract_p/'.$pjid.'/'.'p'.'/'.$pj)
                    // "base_url" => base_url('contract/newapprovecontract_p/'.($id+1).'/'.$pr.'/'.$pj.'/'.$sequence.'/'.$pjid)
                    // "base_url" => base_url('purchase/purchase_approve/'.$pjid.'/'.'p'.'/'.$pj)
            
                  );
                line_oa_api($data,$line);
                  // line alert
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_wo',$datap);

          $this->db->select('*');
          $this->db->from('approve_wo');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
          
          $year = date('Y');
          $month = date('m');
          $modal="wo";

          if($numx=="0"){
            $datax = array(
              'status' => "approve",
             
            );
            $this->db->where('lo_lono',$pr);
            $this->db->update('lo',$datax);
            // //  line alert
                          
            $messagef = "อนุมัติ ลำดับที่ k {$sequence} สุดท้าย \n";
            $messagef .= "Doc type : PR\n";
            $messagef .= "Doc No : {$pr}\n";
            $messagef .= "status : Approve\n";
            // $messagef .= "Number of items : ".count($add['qtyi'])."\n";
            $messagef .= "-----------------------------------------\n";
            $resd = $this->datastore_m->getlodetail($pr,$compcode);
            $n=1;
              foreach ($resd as $key => $value) {
                $messagef .= $key+$n.". ".$value->lo_matname." จำนวน ".$value->lo_qty." ".$value->lo_unit."\n";
                // $message .= "-----------------------------------------\n";
              }
              $messagef .= "-----------------------------------------\n";
            $messagef .= "Approve by : ". $username."\n";
            // $messagef .= "Approve : ".$approvename;
            $pushID_t = $this->db->query("select user from lo where lo_lono='$pr';")->result_array();
            $fff = $pushID_t[0]['user'];
            $lineid_t = $this->db->query("select lineid from member where m_user='$fff';")->result_array();
            echo $lineid_t[0]['lineid'];
            // notify_message($messagef,$lineid_t[0]['lineid']);
            $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
            $line = $line_api_service[0]['line_api'];
                  $data = array( 
                    "id" => $pushID,
                    "type" =>"message",
                    "text" => "Doc No. : ".$pr,
                    "price" => $fullname,
                    "pay" =>"3",
                    "unit" =>"4",
                    "doc" =>"5",
                    "compcode_line" => "6",
                    "user" =>"7",
                    "link" => $line,
                    "base_url" => base_url('office/approve_pj_pr/'.($id+1).'/'.$pr.'/'.$pj.'/'.$sequence.'/'.$pjid)
                    // "base_url" => base_url('purchase/purchase_approve/'.$pjid.'/'.'p'.'/'.$pj)
            
                  );
                line_oa_api($data,$line);
            // // line alert

            $count = $this->datastore_m->countappove_project($year,$month,$compcode,$modal,$pjid);
            foreach ($count as $key => $value) {
              $bi_approve = $value->bi_approve;
              $approve = $value->approve;
              $bi_wait = $value->bi_wait;
            }
            // var_dump($count);
            // die();
            if ($approve == 0) {
              $view = array(
                  'bi_modal'    => $modal,
                  'bi_year'     => $year,
                  'bi_month'    => $month,
                  'bi_approve'     => 1,
                  'compcode'  => $compcode,
                  'bi_project'  => $pjid,
                );
              $this->db->insert('bi_views_project',$view);
            }else{
            $view = array(
                  'bi_wait'     => @$bi_wait-1,
                  'bi_approve'     => @$bi_approve+1,
                );
              $this->db->where('bi_project',$pjid);
              $this->db->where('bi_modal',$modal);
              $this->db->where('bi_month',$month);
              $this->db->where('bi_year',$year);
              $this->db->update('bi_views_project',$view);
          }
          }
          redirect('contract/newapprovecontract_p/'.$pjid.'/'.'p'.'/'.$pj);
         

        }



        public function disapprove_pj_pr()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];

          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $pjid = $this->uri->segment(6);
          $data = array(
              'status' => "no",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $username,
            );
          $this->db->where('app_pr',$pr);
          $q = $this->db->update('approve_pr',$data);

          redirect('pr/pr_approve/'.$pj.'/'.$pjid);
         

        }


        public function disapprove_pj_ap()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];

          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $pjid = $this->uri->segment(6);
          $data = array(
              'status' => "wait",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $username,
            );
          $this->db->where('app_pr',$pr);
          $q = $this->db->update('approve_ap',$data);

          redirect('ap/ap_approve_apv_o_s/'.$pj.'/'.$pjid.'/p');
         

        }

        public function disapprove_td()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];

          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $pjid = $this->uri->segment(6);
          $data = array(
              'status' => "no",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $username,
            );
          $this->db->where('app_pr',$pr);
          $q = $this->db->update('approve_td',$data);

          redirect('bd/approve_billof/'.$pj.'/'.$pjid);
         

        }

        public function disapprove_revise()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];

          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $pjid = $this->uri->segment(6);
          $data = array(
              'status' => "no",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $username,
            );
          $this->db->where('app_pr',$pr);
          $q = $this->db->update('approve_revise',$data);

          redirect('bd/approve_billof_revise/'.$pj.'/'.$pjid);
         

        }

         public function disapprove_book()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];

          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $pjid = $this->uri->segment(6);
          $data = array(
              'status' => "no",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $username,
            );
          $this->db->where('app_pr',$pr);
          $q = $this->db->update('approve_bk',$data);

          redirect('pr/pr_approve_bk/'.$pj.'/'.$pjid);
         

        }

        public function disapprove_pj_po()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];

          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $pjid = $this->uri->segment(6);
          $data = array(
              'status' => "no",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $username,
            );
          $this->db->where('app_pr',$pr);
          $q = $this->db->update('approve_po',$data);

          redirect('purchase/purchase_approve/'.$pjid.'/'.'p'.'/'.$pj);
         

        }

         public function disapprove_pj_wo()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];

          $id = $this->uri->segment(4);
          $code = $this->uri->segment(5);
          $lo = $this->uri->segment(6);

           $dataq = array(
              'status' => "wait",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $username,
            );
          $this->db->where('lo_lono',$lo);
          $qq = $this->db->update('lo',$dataq);


          $data = array(
              'status' => "no"
            );
          $this->db->where('app_pr',$lo);
          $q = $this->db->update('approve_wo',$data);

          redirect('contract/newapprovecontract_p/'.$id.'/'.'p'.'/'.$code);
         

        }


        public function approve_pj_pc()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $fullname = $session_data['m_name'];
          $compcode = $session_data['compcode'];
        
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          if ($sequence >= 1) {
            $pushID = $this->datastore_m->getpcseq($pr,$compcode,$sequence);
          }else{
            $pushID = $this->datastore_m->getpcapproveid($id,$compcode);
          }
          // echo $pushID;
          // die();
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_pc',$data);

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_pc',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_pc',$datap);

          $this->db->select('*');
          $this->db->from('approve_pc');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          

          $this->db->select('*');
          $this->db->from('approve_pc');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
          
          $year = date('Y');
          $mount = date('m');
          $modal="pc";

          if($numx=="0"){
            $datax = array(
              'approve' => "approve",
              
            );
            $this->db->where('docno',$pr);
            $this->db->update('pettycash',$datax);

          $count = $this->datastore_m->countappove_project($year,$mount,$compcode,$modal,$pjid);
            foreach ($count as $key => $value) {
              $bi_approve = $value->bi_approve;
              $approve = $value->approve;
              $bi_wait = $value->bi_wait;
            }

            $view = array(
                  'bi_modal'    => "pc",
                  'bi_year'     => $year,
                  'bi_month'    => $mount,
                  'bi_wait'     => @$bi_wait-1,
                  'bi_approve'     => @$bi_approve+1,
                );
              $this->db->where('bi_project',$pjid);
              $this->db->where('bi_modal',$modal);
              $this->db->where('bi_month',$mount);
              $this->db->where('bi_year',$year);
              $this->db->update('bi_views_project',$view);
          }

          $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
          $line = $line_api_service[0]['line_api'];
          $data = array( 
            "id" => $pushID,
            "type" =>"message",
            "text" => "Doc No. : ".$pr,
            "price" => $fullname,
            "pay" =>"3",
            "unit" =>"4",
            "doc" =>"5",
            "compcode_line" => "6",
            "user" =>"7",
            "link" => $line,
            "base_url" => base_url('contract/newapprovecontract_r/'.($id+1).'/'.$pr.'/'.$pj.'/'.$sequence.'/'.$pjid)
            // "base_url" => base_url('purchase/purchase_approve/'.$pjid.'/'.'p'.'/'.$pj)
    
          );
        line_oa_api($data,$line);

          redirect('petty_cash/approve_pc_v/'.$pjid.'/'.'p'.'/'.$pj);
         

        }

       public function disapprove_pj_pc()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];

          $id = $this->uri->segment(4);
          $code = $this->uri->segment(5);
          $lo = $this->uri->segment(6);

           $dataq = array(
              'approve' => "wait"
            );
          $this->db->where('docno',$lo);
          $qq = $this->db->update('pettycash',$dataq);


          $data = array(
              'status' => "no",
              'del_time' => date('Y-m-d : H:i:s'),
              'del_user' => $username,
            );
          $this->db->where('app_pr',$lo);
          $q = $this->db->update('approve_pc',$data);

          redirect('petty_cash/approve_pc_v/'.$id.'/'.'p'.'/'.$code);
         

        }


        public function reject_pj_pr(){
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          $res = $this->office_m->getpr_view($pr);
          foreach ($res as $value) {
            $userreq = $value->pr_memid;
          }
          $pushID = $this->office_m->getlineid($userreq,$compcode);
          // echo $pushID[0]['lineid'];
          // die();
          $message = "เอกสาร PR : ".$pr." Reject \n";
          $message .= "หมายเหตุ : ".$add['rejectap_prove']."\n";

          $res = notify_message($message,$pushID[0]['lineid']);
          $data = array(
              'pr_approve' => "reject",
              'reject_remark' => $add['rejectap_prove'],
              'reject_date' => date('Y-m-d'),
              'reject_user' => $username,
             
            );
          $this->db->where('pr_prno',$pr);
          $q = $this->db->update('pr',$data);


           $data_reject = array(
              'status' => "reject",
              'reject_remark' => $add['rejectap_prove'],
              'reject_date' => date('Y-m-d'),
             
            );
          $this->db->where('app_pr',$pr);
          $this->db->update('approve_pr', $data_reject);
          

          redirect('pr/pr_approve/'.$pj.'/'.$pjid);
        }
        public function reject_pj_boq(){
          $id = $this->uri->segment(3);
          $boq_version = $this->uri->segment(4);
          $td = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $add = $this->input->post();
          $data = array(
              'status' => "N",
              'reject_remark' => $add['rejectap_prove'],
              'reject_date' => date('Y-m-d'),
              'reject_user' => $username,
             
            );
          $this->db->where('heading_ref',$boq_version);
          $q = $this->db->update('boq_item',$data);


           $data_reject = array(
              'status' => "reject",
              'reject_remark' => $add['rejectap_prove'],
              'reject_date' => date('Y-m-d'),
             
            );
          $this->db->where('app_pr',$boq_version);
          $this->db->update('approve_td', $data_reject);

          redirect('bd/approve_billof/BD2019031823/25/'.$td.'/'.$pjid);
        }

        public function reject_pj_pc(){
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $add = $this->input->post();
          $data = array(
              'approve' => "reject",
              'reject_remark' => $add['rejectap_prove'],
              'reject_user' => $username,
             
            );
          $this->db->where('docno',$pr);
          $q = $this->db->update('pettycash',$data);


           $data_reject = array(
              'status' => "reject",
             
            );
          $this->db->where('app_pr',$pr);
          $this->db->update('approve_pc', $data_reject);

          redirect('petty_cash/approve_pc_v/'.$pj.'/'.$pjid);
        }

        public function reject_pj_po(){
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          $res = $this->office_m->getpo_view($pr);
          foreach ($res as $value) {
            $userreq = $value->po_memid;
          }
          $pushID = $this->office_m->getlineid($userreq,$compcode);
          // echo $pushID[0]['lineid'];
          // die();
          $message = "เอกสาร PO : ".$pr." Reject \n";
          $message .= "หมายเหตุ : ".$add['rejectap_prove']."\n";

          $res = notify_message($message,$pushID[0]['lineid']);
          $data = array(
              'po_approve' => "reject",
              'reject_remark' => $add['rejectap_prove'],
              'reject_user' => $username,
             
            );
          $this->db->where('po_pono',$pr);
          $q = $this->db->update('po',$data);


           $data_reject = array(
              'status' => "reject",
              'reject_remark' => $add['rejectap_prove'],
              'reject_user' => $username,
              'reject_date' => date('Y-m-d H:i:s', now()),
            );
          $this->db->where('app_pr',$pr);
          $this->db->update('approve_po', $data_reject);

          redirect('purchase/purchase_approve/'.$pj.'/'.$pjid);
        }
        
        public function reject_pj_wo(){
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $add = $this->input->post();
          $data = array(
              'status' => "reject",
              'reject_remark' => $add['rejectap_prove'],
              'reject_user' => $username,
             
            );
          $this->db->where('lo_lono',$pr);
          $q = $this->db->update('lo',$data);


           $data_reject = array(
              'status' => "reject",
             
            );
          $this->db->where('app_pr',$pr);
          $this->db->update('approve_wo', $data_reject);

          redirect('contract/newapprovecontract');
        }

       public function approve_fa()
        {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();

        for ($i=0; $i < count($add['fa_code_old']); $i++) {
        if($add['type'][$i]=="1"){

            $data = array(
                'status' =>'approve',
            );
          $this->db->where('id',$add['id'][$i]);
          $this->db->update('repair_detail', $data);

            $data2 = array(
                'approve' =>'approve'
            );
          $this->db->where('code_doc',$add['code_doc'][$i]);
          $this->db->update('repair', $data2);


           $data5 = array(
                'fa_status' =>'2'
            );
          $this->db->where('fa_assetcode',$add['fa_code_old'][$i]);
          $this->db->update('asset', $data5);

          
        }else if($add['type'][$i]=="2"){

            $data1 = array(
                'status' =>'writeoff'
            );
          $this->db->where('id',$add['id'][$i]);
          $this->db->update('repair_detail', $data1);

             $data3 = array(
                'approve' =>'approve'
            );
          $this->db->where('code_doc',$add['code_doc'][$i]);
          $this->db->update('repair', $data3);

           $data6 = array(
                'fa_status' =>'3'
            );
          $this->db->where('fa_assetcode',$add['fa_code_old'][$i]);
          $this->db->update('asset', $data6);
        }

     

          $data4 = array(
                'status' =>'approve'
            );
          $this->db->where('app_pr',$add['code_doc'][$i]);
          $this->db->update('approve_fa', $data4);
      }

          

      redirect('add_asset/approve_fa');

        }

        public function approve_facaribate()
        {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $caribate = $this->uri->segment(3);
         $add = $this->input->post();

        $data = array(
                'status' =>'approve',
            );
          $this->db->where('app_pr',$caribate);
          $this->db->update('approve_fa', $data);

        $data1 = array(
                'approve' =>'approve',
            );
          $this->db->where('cb_code',$caribate);
          $this->db->update('calibration_head', $data1);

          for ($i=0; $i < count($add['asset_id']); $i++) {

             $data6 = array(
                'fa_status' =>'4'
            );
          $this->db->where('fa_assetcode',$add['asset_id'][$i]);
          $this->db->update('asset', $data6);
          }

          redirect('add_asset/approve_fa');
      }

      public function office_schedule(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $m_id = $session_data['m_id'];
        $add = $this->input->post();

        $datestring = "Y";
        $mm = "m";
        $dd = "d";
        $this->db->select('*');
        $qu = $this->db->get('schedule');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
        if ($res==0) {
        $apscode = "C".date($datestring).date($mm)."000"."1";
        $schedule ="1";
        }else{
        $this->db->select('*');
        $this->db->order_by('id','desc');
        $this->db->limit('1');
        $q = $this->db->get('schedule');
        $run = $q->result();
        foreach ($run as $valx)
        {
        $x1 = $valx->id+1;
        }
        if ($x1<=9) {
        $apscode = "C".date($datestring).date($mm)."000".$x1;
        $schedule = $x1;
        }
        elseif ($x1<=99) {
        $apscode = "C".date($datestring).date($mm)."00".$x1;
        $schedule = $x1;
        }
        elseif ($x1<=999) {
        $apscode = "C".date($datestring).date($mm)."0".$x1;
        $schedule = $x1;
        }
        }


        $config['upload_path'] = './select_file_pr/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|rar|docx|xls|pdf|zip|xlsx';
        $config['max_size'] = '204800';
        $config['max_width']  = '9999';
        $config['max_height']  = '9999';
        $rand = rand(1111,9999);
        $date= date("Y-m-d ");
        $config['file_name']  = $date.$rand;
        $this->load->library('upload', $config);
        $error = array();
        $success = array();
        foreach($_FILES as $field_name => $file)
        {
        if ( ! $this->upload->do_upload($field_name))
        {
        $error['upload'][] = $this->upload->display_errors();
        }
        else
        {
        $upload_data = $this->upload->data();
        if ( ! $this->image_lib->resize())
        {
        $error['resize'][] = $this->image_lib->display_errors();
        echo "error";
        }
        else
        {
        $data['success'] = $upload_data;
        }
        }
        }

        $data = array(
          'rights' => $m_id,
          'datestart' => $add['datestart'],
          'datestop' => $add['datestop'],
          'datestopp' => date('Y-m-d', strtotime("+1 day", strtotime($add['datestop']))) ,
          'time' => $add['time'],
          'heading' => $add['heading'],
          'remarktime' => $add['remarktime'],
          'color' => $add['color'],
          'useradd' => $username,
          'ref' => $apscode,
          'status' => $add['status'],
          'adddate' => date('Y-m-d H:i:s'),
          'file' => $upload_data,
          'chk' => $add['chkk'], 
          'notice' => $add['notice'],
          'timenotice' => $add['timenotice'],
        );
        $this->db->insert('schedule',$data);
        redirect('calender/index');
      }

      public function editoffice_schedule(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $m_id = $session_data['m_id'];
        $add = $this->input->post();
        $data = array(
          'rights' => $m_id,
          'datestart' => $add['datestart'],
          'datestop' => $add['datestop'],
          'datestopp' => date('Y-m-d', strtotime("+1 day", strtotime($add['datestop']))) ,
          'time' => $add['time'],
          'heading' => $add['heading'],
          'remarktime' => $add['remarktime'],
          'color' => $add['color'],
          'status' => $add['status'],
          'chk' => $add['chkk'], 
          'notice' => $add['notice'],
          'timenotice' => $add['timenotice'],
          'useredit' =>$username,
          'usereditdate' =>date('Y-m-d H:i:s'),
          
        );
        $this->db->where('id',$add['id']);
        $this->db->update('schedule',$data);

        redirect('calender/index');
      }


      public function schedule_del(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $m_id = $session_data['m_id'];
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('schedule');
        redirect('calender/index');
      }


      public function udate_nonti(){
        $id = $this->uri->segment(3);
        $data = array(
          'chk' => "r",
        );
        $this->db->where('id', $id);
        $this->db->update('schedule',$data);
      }

      public function tasklist(){
         $session_data = $this->session->userdata('sessed_in');
         $m_id = $session_data['m_id'];
         $username = $session_data['username'];
         $add = $this->input->post();

        $datestring = "Y";
        $mm = "m";
        $dd = "d";
        $this->db->select('*');
        $qu = $this->db->get('task_h');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
        if ($res==0) {
        $apscode = "TASK".date($datestring).date($mm)."000"."1";
        $task_h ="1";
        }else{
        $this->db->select('*');
        $this->db->order_by('id','desc');
        $this->db->limit('1');
        $q = $this->db->get('task_h');
        $run = $q->result();
        foreach ($run as $valx)
        {
        $x1 = $valx->id+1;
        }
        if ($x1<=9) {
        $apscode = "TASK".date($datestring).date($mm)."000".$x1;
        $task_h = $x1;
        }
        elseif ($x1<=99) {
        $apscode = "TASK".date($datestring).date($mm)."00".$x1;
        $task_h = $x1;
        }
        elseif ($x1<=999) {
        $apscode = "TASK".date($datestring).date($mm)."0".$x1;
        $task_h = $x1;
        }
        }

          $data = array(
          'ref_task' => $apscode,
          'name_task' => $add['task'],
          'member_task' => $m_id,
          'useradd' => $username,
          'adddate' => date('Y-m-d H:i:s'),
          'status' => "0",
          );
          $this->db->insert('task_h',$data);
          redirect('tasklist/index');
      }

       public function edit_tasklist(){
        $add = $this->input->post();
        $id = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $data1 = array(
          'name_task' => $add['task'],
          'useredit' => $username,
          'usereditdate' => date('Y-m-d H:i:s'),

          );
          $this->db->where('id',$id);
          $this->db->update('task_h',$data1);
          
          redirect('tasklist/index');
      }

      public function deltasklist(){
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('task_h');
        redirect('tasklist/index');
      }

      public function tasklist_detail(){
        $add = $this->input->post();
        $id = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $data = array(
          'refd_task' => $id,
          'categorie' => $add['categorie'],
          'date_task' => $add['date_task'],
          'sub_task' =>  $add['sub_task'],
          'status_task' => "0",
          'chk' => "0",
          'useradd' => $username,
          'adddate' => date('Y-m-d H:i:s'),
          );
          $this->db->insert('task_d',$data);
          redirect('tasklist/index');
      }

      public function status_task(){
        $id = $this->uri->segment(3);
         $data = array(
          'status_task' => "1",
          );
         $this->db->where('id',$id);
         $this->db->update('task_d',$data);
         redirect('tasklist/index');

      }

      public function status_chk(){
        $id = $this->uri->segment(3);
         $data = array(
          'status_task' => "2",
          );
         $this->db->where('id',$id);
         $this->db->update('task_d',$data);
         redirect('tasklist/index');

      }

      public function tasklist_detail_edit(){
        $add = $this->input->post();
        $id = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $data = array(
          'categorie' => $add['categorie'],
          'date_task' => $add['date_task'],
          'sub_task' =>  $add['sub_task'],
          'useredit' => $username,
          'usereditdate' => date('Y-m-d'),
          );
           $this->db->where('id',$id);
           $this->db->update('task_d',$data);
          redirect('tasklist/index');
      }
      
      public function deltasklist_detail(){
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('task_d');
        redirect('tasklist/index');
      }


      public function udate_task(){
        $id = $this->uri->segment(3);
        $data = array(
          'chk' => "1",
        );
        $this->db->where('id',$id);
        $this->db->update('task_d',$data);
      }

          public function editbk()
        {
          $id = $this->uri->segment(3);
          $session_data = $this->session->userdata('logged_in');
          $data['getproj'] = $this->datastore_m->getproject();
          $data['resmem'] = $this->datastore_m->getmember();
          $data['getunit'] = $this->datastore_m->getunit();
          $data['getdep'] = $this->datastore_m->department();
          $data['getdep'] = $this->datastore_m->department();
          $data['all'] = $this->office_m->getshowbk($id);
          $data['allmaterial'] = $this->datastore_m->allmaterial();
          $data['allcostcode'] = $this->datastore_m->allcostcode();
          $this->load->view('office/officeservice/editbk_v',$data);
        }


        public function load_project()
    {
        $pro = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $da['pro'] = $pro;
        $da['det'] = $this->datastore_m->detail_viewpro_m($pro);
        $da['detpc'] = $this->datastore_m->detail_viewpro_m2($pro);
        $this->load->view('office/pr/load_project_v',$da);
    }


    public function insert_DB_by_tae()
    {

      $command = "INSERT INTO mat_group  (`matgroup_code`, `matgroup_name`, `matgroup_status`, `mattype_code`, `compcode`) VALUES ";
      $array = array();
    
      for ($i=0; $i < 57; $i++) { 
        $data = array(
                     '',
                     '',
                     '',
                     'yes',
                     'P',
                     '001'
      );

        $array[] = " ( '".implode("','" ,$data)."' )";

      }

      $last_command =  $command.implode(",", $array);
//echo $last_command;
       $this->db->query($last_command);
        //$this->db->insert('mat_subgroup', $data);
    }




    public function mat_show(){
     
        $this->db->select('*');
        $this->db->from('mat_subgroup');
        $this->db->group_by('matsubgroup_code');
        $query = $this->db->get();
        $res['mat'] = $query->result();
        // return $res;
        $this->load->view('office/pr/mat_test',$res);
    }

    public function openproject_book(){

      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
             redirect('/');
      }
      $da['name'] = $session_data['m_name'];
      $da['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep']; 
      $data['projid'] = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $projid = $session_data['projectid'];
      $userid = $session_data['m_id'];
      $projectid = $session_data['projectid'];
      $da['imgu'] = $session_data['img'];
      $dd['approve'] = $session_data['approve'];
      $dd['pr_project_right'] = $session_data['pr_project_right'];
      $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
        if($dd['pr_project_right'] =='true'){
          $res['getdep'] = $this->datastore_m->getdepartment();
        }else{
          $res['getdep'] = $this->datastore_m->getdepart_user($userid,$da['depid']);
        }

      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_pr_v',$dd);
      $this->load->view('office/pr/open_project_booking',$res);
      $this->load->view('base/footer_v');
      

    }

    public function pr_booking(){

      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
             redirect('/');
      }

      $username = $session_data['username'];
      $data['mid'] = $session_data['m_id'];;
      $data['getunit'] = $this->datastore_m->getunit();

      $projec_id = $this->uri->segment(3);
      $da['name'] = $session_data['m_name'];
      $da['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep']; 
      $data['projid'] = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $projid = $session_data['projectid'];
      $userid = $session_data['m_id'];
      $projectid = $session_data['projectid'];
      $da['imgu'] = $session_data['img'];
      $dd['approve'] = $session_data['approve'];
      $dd['pr_project_right'] = $session_data['pr_project_right'];
      $data['data_project'] = $this->datastore_m->get_project($projec_id);
      // var_dump($project);

     $datestring = "Y";
       $mm = "m";
       $dd = "d";
 
       $this->db->select('*');
       $qu = $this->db->get('pb_booking');
       $bk = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

       if ($bk==0) {
         $bkno = "PB".date($datestring).date($mm)."000"."1";
          $bk_item ="1";
       }else{
         $this->db->select('*');
         $this->db->order_by('pb_id','desc');
         $this->db->limit('1');
         $q = $this->db->get('pb_booking');
         $bkr = $q->result();

         foreach ($bkr as $bkx)
          {
          $bkn1 = $bkx->pb_id+1;
          }
        $bkno = "PB".date($datestring).date($mm).date($dd).$bkn1;
        $bk_item = $bkn1;
       }


      $data['pb_code'] = $bkno;



      $data["array_system"] = $this->global_m->get_system_project("id",$projec_id,false,$session_data["compcode"]);

      // var_dump($data['code']);

      // exit();
      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_pr_v',$dd);
      $this->load->view('office/pr/pr_booking',$data);
      $this->load->view('base/footer_v');
    }


    public function modal_store_center(){
      
      $data['data_project'] = $this->datastore_m->get_project_store();
      $this->load->view('office/pr/modal_store_center',$data);
    }

    public function modal_store($project_id){
      $data['data_project'] = $this->datastore_m->get_project_store_byid($project_id);
      // var_dump($data['data_project']);
      $this->load->view('office/pr/modal_store_center_data',$data);
    }

    public function show_list(){
      $mat = $this->uri->segment(3);
      $qty = $this->uri->segment(4);
      if ($qty != "") {
          $data['mat'] = $mat;
          $data['data_project'] = $this->datastore_m->get_project_store_pr($mat);
          $this->load->view('office/pr/show_lits_store',$data);
      }
     
    }

    public function qty_store(){
      $pj_id = $this->input->post('pj_id');
      $mat_code = $this->input->post('mat_code');
      $this->db->select('store_qty,whname,whcode');
      $this->db->from("store");
      $this->db->where("store_matcode",$mat_code);
      $this->db->where("store_project",$pj_id);
      $this->db->join('project', 'project.project_id = store.store_project');
      $this->db->join('ic_proj_warehouse', 'ic_proj_warehouse.whcode = store.wh');
      $this->db->group_by('store_matcode');
      $this->db->group_by('wh');
      $query = $this->db->get();
      $res = $query->result();
      // $res[0]->store_qty;
      // $res[0]->whname;

      $return = array();
      if ($query) {
        $return['status']   = true;
        $return['qty']   = $res[0]->store_qty;
        $return['whname']   = $res[0]->whname;
        $return['whcode']   = $res[0]->whcode;
      }else{
        $return['status']   = false;
        $return['message']  = 'error';
      }

      echo json_encode($return);

    }

    public function save_booking(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];

      $booking_h = $this->input->post('booking_h');
      $booking = $this->input->post('booking');

      $datestring = "Y";
        $mm = "m";
        $dd = "d";

        $this->db->select('*');
        $qu = $this->db->get('pb_booking');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

       $datestring = "Y";
       $mm = "m";
       $dd = "d";
 
       $this->db->select('*');
       $qu = $this->db->get('pb_booking');
       $bk = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

       if ($bk==0) {
         $bkno = "PB".date($datestring).date($mm)."000"."1";
          $bk_item ="1";
       }else{
         $this->db->select('*');
         $this->db->order_by('pb_id','desc');
         $this->db->limit('1');
         $q = $this->db->get('pb_booking');
         $bkr = $q->result();

         foreach ($bkr as $bkx)
          {
          $bkn1 = $bkx->pb_id+1;
          }
        $bkno = "PB".date($datestring).date($mm).date($dd).$bkn1;
        $bk_item = $bkn1;
       }



      // $pb_no = $this->global_m->gen_code('PB', 'pb_booking', 'pb_id');

      $data_header = [];
      foreach ($booking_h as $key_booking_h => $data_booking_h) {
        $pjid = $data_booking_h['project_id'];
        $data_header = array(

            "pb_no"  => $bkno,
            "to_project" => $data_booking_h['project_id'],
            "pb_date" => $data_booking_h['pb_date'],
            "pb_delivery" => $data_booking_h['deliverydate'],
            "pb_system" => $data_booking_h['system'],
            "pb_member" => $data_booking_h['member_id'],
            "pb_remark" => $data_booking_h['remark'],
            "pb_approve" => "wait",
            "pb_status"  => "enable",
            "address"  => $data_booking_h['place'],
            "pb_compcode" => $compcode,
            "pb_useradd" => $username,
            "createdate" => $data_booking_h['pb_date']

        );
        
      }

      $query_header = $this->db->insert('pb_booking',$data_header);



  
        $data_detail = [];
        $data_store = [];
        foreach ($booking as $key => $data) {

          // var_dump($data);
          $data_detail = array(
            "ref_no" => $bkno,
            "mat_code" => $data['matcode'],
            "mat_name" => $data['matname'],
            "costcode" => $data['cost_code'],
            "costname" => $data['cost_name'],
            "qty" => $data['qty'],
            "unit" => $data['unit'],
            "compcode" => $compcode,
            "wh" => $data['whcode'],
            "qty_total" => $data['qty'],
            "priceunit" => $data['price_unit'],
            "store_id" => $data['pj']
          );

          $data_store = array(
            "store_qty" => ($data['qty_max']-$data['qty'])*1,
            "store_total" => ($data['qty_max']-$data['qty'])*1,
            "unbooking" => $data['qty']
          );
          
            $this->db->where("store_matcode",$data['matcode']);
            $this->db->where("store_project",$data['pj']);
            $this->db->where("wh",$data['whcode']);
            $res_query = $this->db->update("store",$data_store);

          $data_update_pb = array(
            "from_project" => $data['pj']
          );
          $this->db->where("pb_no",$bkno);
          $res_update_pb = $this->db->update("pb_booking",$data_update_pb);

          $query = $this->db->insert('pb_booking_item',$data_detail);
        }

        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('project_id',$pjid);
        $boq = $this->db->get()->result();
        $project_code = 0;
        foreach ($boq as $key) {
        $project_code = $key->project_code;
        }

        $this->db->select('*');
        $this->db->from('approve');
        $this->db->where('approve_project',$project_code);
        $this->db->where('type', "BK");
        $this->db->order_by("approve_sequence", "asc");
        $app_pj = $this->db->get()->result();
        foreach ($app_pj as $app) {
           $databk = array(
          'app_pr' => $bkno,
          'app_project' => $project_code,
          'app_midid' => $app->approve_mid,
          'app_midname' => $app->approve_mname,
          'lock' => $app->approve_lock,
          'status' => "wait",
          'type' => "P",
          'app_sequence' => $app->approve_sequence,
        );
           $this->db->insert('approve_bk',$databk);
        }

      
      $return = array();
      if ($query) {
        $return['status']   = true;
        $return['pb_no']  = $bkno;
        $return['message']  = 'บันทึกสำเร็จ';
       
      }else{
        $return['status']   = false;
        $return['message']  = 'error';
      }

      echo json_encode($return);

      
    }

    public function archive_booking(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
             redirect('/');
      }
      $da['name'] = $session_data['m_name'];
      $da['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep']; 
      $data['projid'] = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $projid = $session_data['projectid'];
      $userid = $session_data['m_id'];
      $projectid = $session_data['projectid'];
      $da['imgu'] = $session_data['img'];
      $dd['approve'] = $session_data['approve'];
      $dd['pr_project_right'] = $session_data['pr_project_right'];
      $project_id = $this->uri->segment(3);

      $data['archive'] = $this->datastore_m->get_pb_archive($project_id);


      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_pr_v',$dd);
      $this->load->view('office/pr/booking_archive',$data);
      $this->load->view('base/footer_v');

    }

    public function booking_view(){
      $pb_no = $this->uri->segment(3);
      $data['data'] = $this->datastore_m->get_pb_view($pb_no);
      $data['data_item'] = $this->datastore_m->get_pb_item($pb_no);
      $this->load->view('office/pr/booking_view',$data);
    }


       public function approve_bk()
        {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_bk',$data);

          $this->db->select('*');
          $this->db->from('approve_pr');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 


          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_pr',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_pr',$datap);


          

          $this->db->select('*');
          $this->db->from('approve_pr');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
            

          if($numx=="0"){
            $datax = array(
              'pb_approve' => "approve",
             
            );
            $this->db->where('pb_no',$pr);
            $this->db->update('pb_booking',$datax);

            $datestring = "Y";
            $mm = "m";
            $dd = "d";

          $this->db->select('*');
          $qu = $this->db->get('ic_booking');
          $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

            if ($res==0) {
              $transfercode = "B".date($datestring).date($mm)."000"."1";
            }else{
                $this->db->select('*');
                $this->db->order_by('id','desc');
                $this->db->limit('1');
                $q = $this->db->get('ic_booking');
                $run = $q->result();
                foreach ($run as $valx)
                {
                    $x1 = $valx->id+1;
                }
                if ($x1<=9) {
                   $transfercode = "B".date($datestring).date($mm)."000".$x1;
                }
                elseif ($x1<=99) {
                  $transfercode = "B".date($datestring).date($mm)."00".$x1;
                }
                elseif ($x1<=999) {
                  $transfercode = "B".date($datestring).date($mm)."0".$x1;
                }
                elseif ($x1<=9999) {
                  $transfercode = "B".date($datestring).date($mm).$x1;
                }

               }


             $this->db->select('*');
             $this->db->from('pb_booking');
             $this->db->where('pb_no',$pr);
             $this->db->join('member','pb_booking.pb_member = member.m_id');
             $pb_bk = $this->db->get()->result();
             foreach ($pb_bk as $bkh) {
                 $databk_h = array(
              'book_code' => $transfercode,
              'from_project' => $bkh->from_project,
              'to_project' => $bkh->to_project,
              'duedate' => $bkh->pb_date,
              'date_book' => $bkh->pb_delivery,
              'name_book' => $bkh->m_name,
              'address_book' => $bkh->address,
              'remark' => $bkh->pb_remark,
              'message' => $bkh->pb_message,
              'approve' => "wait",
              'status' => "tranfer_pr",
              'compcode' => $compcode,
              'issuecode' => "",
              'useradd' => $username,
              'adddate' => date('Y-m-d'),
              'userapprove' => "",
              'userdisapprove' => "",
              'approveedate' => "",
              'disapprovedate' => "",
              'type_ic' => "tranfer_pr",
                );
               $this->db->insert('ic_booking',$databk_h);
             }

             $this->db->select('*');
             $this->db->from('pb_booking_item');
             $this->db->where('ref_no',$pr);
             $pb_bki = $this->db->get()->result();
             foreach ($pb_bki as $bkhi) {
                 $databk_d = array(
              'ref_codetransfer' => $transfercode,
              'mat_code' => $bkhi->mat_code,
              'mat_name' => $bkhi->mat_name,
              'costcode' => $bkhi->costcode,
              'costname' => $bkhi->costname,
              'qty' => $bkhi->qty,
              'unit' => $bkhi->unit,
              'compcode' => $compcode,
              'remark' => "",
              'wh' => $bkhi->wh,
              'priceunit' => $bkhi->priceunit,
              'qty_total' => $bkhi->qty_total,
              'store_id' => $bkhi->store_id,
             
                );
               $this->db->insert('ic_bookingitem',$databk_d);
             }
        }

        redirect('pr/pr_approve_bk/'.$pj.'/'.$pjid);

      }
        public function approve_td_boq_revise()
        {
          $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $projectid = $session_data['projectcode'];
        $m_id = $session_data['m_id'];

          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          $ref_heading =  $this->uri->segment(7);
          $revise =  $this->uri->segment(8);
          $projectcodei = $this->uri->segment(9);

            

          $this->db->where('status',"Y");
          $this->db->where('heading_ref', $ref_heading);
          $this->db->delete('boq_item');


          $this->db->where('ref_revise', $pr);
          $this->db->delete('boq_cost');

         

          $re = array(
              'revise' => $revise,
          );
          $this->db->where('ref_bd',$ref_heading);
          $this->db->update('heading_bd',$re);


          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_revise',$data);


          $this->db->select('*');
          $this->db->from('approve_revise');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_revise',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_revise',$datap);

          
          $this->db->select('*');
          $this->db->from('approve_revise');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
            
          $year = date('Y');
          $mount = date('m');
          $modal="pr";

          if($numx=="0"){
            $datax = array(
              'status' => "Y",
             
            );
            $this->db->where('revise',$pr);
            $this->db->update('boq_item',$datax);

            $datap = array(
              'status' => "R", 
            );
            $this->db->where('boq_bd',$pj);
            $this->db->where('revise !=',$pr);
            $this->db->update('boq_item',$datap);


          $this->db->select('*');
          $this->db->from('boq_item');
          $this->db->where('boq_bd',$pj);
          $this->db->where('revise',$pr);
          // $this->db->where('status',"W");

          $boq_i=$this->db->get()->result();

          
          foreach ($boq_i as $i) {

          if($i->matamtbg!="0"){
            $mqty_bg = $i->qty_bg;
          }else{
            $mqty_bg = 0;
          }          

          $boq_cost1 = array(
          "boq_code" => $pj,
          "boq_mcode" => $i->newmatcode,
          "boq_mname" => $i->newmatnamee,
          "costcode" => $i->subcostcode,
          "costname" => $i->subcostcodename,
          "qty" => $mqty_bg,
          "unitcode" => $i->unitcode,
          "unitname" =>  $i->unitname,
          "price_qty" => $i->matpricebg,
          "cost" => $i->matamtbg,
          "boq" => $i->matamtboq,
          "type" => "1",
          "compcode" => $compcode,
          "pimary" => $i->boq_id,
          "control_qty" => "1",
          "control" => "1",
          "controlper" => "100",
          "forecast" => "0",
          "system" => $i->boq_job,
          "heading_ref" => $i->heading_ref,
          "ref_revise" => $i->revise,
          "project_code" => $projectcodei,
          );
          $this->db->insert('boq_cost',$boq_cost1);
          
          if($i->labamtbg!="0"){
            $lqty_bg = $i->qty_bg;
          }else{
            $lqty_bg = 0;
          }

          $boq_cost2 = array(
          "boq_code" => $pj,
          "boq_mcode" => $i->matcodelabor,
          "boq_mname" => $i->matnamelabor,
          "costcode" => $i->subcostcode,
          "costname" => $i->subcostcodename,
          "qty" => $lqty_bg,
          "unitcode" => $i->unitcode,
          "unitname" =>  $i->unitname,
          "price_qty" => $i->labpricebg,
          "cost" => $i->labamtbg,
          "boq" => $i->labamtboq,
          "type" => "2",
          "compcode" => $compcode,
          "pimary" => $i->boq_id,
          "control_qty" => "1",
          "control" => "1",
          "controlper" => "100",
          "forecast" => "0",
          "system" => $i->boq_job,
          "heading_ref" => $i->heading_ref,
          "ref_revise" => $i->revise,
          "project_code" => $projectcodei,
          );
          $this->db->insert('boq_cost',$boq_cost2);
            ////////////

          if($i->subamtbg!="0"){
            $sqty_bg = $i->qty_bg;
          }else{
            $sqty_bg = 0;
          }

          $boq_cost3 = array(
          "boq_code" => $pj,
          "boq_mcode" => $i->newmatcode,
          "boq_mname" => $i->newmatnamee,
          "costcode" => $i->subcostcode,
          "costname" => $i->subcostcodename,
          "qty" => $sqty_bg,
          "unitcode" => $i->unitcode,
          "unitname" =>  $i->unitname,
          "price_qty" => $i->subpricebg,
          "cost" => $i->subamtbg,
          "boq" => $i->subamtboq,
          "type" => "3",
          "compcode" => $compcode,
          "pimary" => $i->boq_id,
          "control_qty" => "1",
          "control" => "1",
          "controlper" => "100",
          "forecast" => "0",
          "system" => $i->boq_job,
          "heading_ref" => $i->heading_ref,
          "ref_revise" => $i->revise,
          "project_code" => $projectcodei,
          );
          $this->db->insert('boq_cost',$boq_cost3);
            ////////////


          $datarevise = array
          (
          "boq_bd" => $pj,
          "boq_id" => $i->boq_id,
          "boq_job" => $i->boq_job, 
          "subcostcode" => $i->subcostcode, 
          "subcostcodename" => $i->subcostcodename,
          "newmatnamee" => $i->newmatnamee, 
          "newmatcode" => $i->newmatcode, 
          "matcodelabor" => $i->matcodelabor,
          "matnamelabor" => $i->matnamelabor,
          "boqcode" => $i->boqcode, 
          "matboq" => $i->matboq, 
          "unitcode" => $i->unitcode,
          "unitname" => $i->unitname,
          "qty_bg" => parse_num($i->qty_bg),
          "qtyboq" => parse_num($i->qtyboq),
          "matpricebg" => parse_num($i->matpricebg),
          "matamtbg" => parse_num($i->matamtbg),
          "labpricebg" => parse_num($i->labpricebg),
          "labamtbg" => parse_num($i->labamtbg),
          "subpricebg" => parse_num($i->subpricebg),
          "subamtbg" => parse_num($i->subamtbg),
          "totalamt" => parse_num($i->totalamt),
          "matpriceboq" => parse_num($i->matpriceboq),
          "matamtboq" => parse_num($i->matamtboq),
          "labpriceboq" => parse_num($i->labpriceboq),
          "labamtboq" => parse_num($i->labamtboq),
          "subpriceboq" => parse_num($i->subpriceboq),
          "subamtboq" => parse_num($i->subamtboq),
          "totalamtboq" => parse_num($i->totalamtboq),
          "status" => "Y",
          "compcode" => $compcode,
          "adduser" => $username,
          "revise" => $revise,
          "heading_ref" => $i->heading_ref,
          "adddate" => date('y-m-d'),
          "project_code" => $projectcodei,
           );
           $this->db->insert('boq_item_revise',$datarevise);   

        }

        }

 


        redirect('bd/approve_billof_revise/'.$pj);
      }

      
        public function approve_td_boq()
        {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $m_id = $session_data['m_id'];

          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_td',$data);

          $this->db->select('*');
          $this->db->from('approve_td');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_td',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_td',$datap);

          $this->db->select('*');
          $this->db->from('approve_td');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
            
          $year = date('Y');
          $mount = date('m');
          $modal="pr";

          if($numx=="0"){
           
            // var_dump($count);
            // die();


           

          $this->db->select('*');
          $this->db->from('boq_item');
          $this->db->where('boq_bd',$pj);
          $this->db->where('status',"W");

          $boq_i=$this->db->get()->result();
          $k=0;
          foreach ($boq_i as $i) {
     $dataar = array(                   
         array(
          "boq_code" => $pj,
          "boq_mcode" => $i->newmatcode,
          "boq_mname" => $i->newmatnamee,
          "costcode" =>  $i->subcostcode,
          "costname" => $i->subcostcodename,
          "qty" => $i->qty_bg,
          "unitcode" => $i->unitcode,
          "unitname" =>  $i->unitname,
          "price_qty" => $i->matpricebg,
          "cost" => $i->matamtbg,
          "boq" => $i->matamtboq,
          "type" => "1",
          "compcode" => $compcode,
          "pimary" => $i->boq_id,
          "control_qty" => "1",
          "control" => "1",
          "controlper" => "100",
          "forecast" => "0",
          "system" => $i->boq_job,
          "heading_ref" => $i->heading_ref,
          "project_code" => $pjid,
          "ref_revise" => "0",
          ),
          // $this->db->insert('boq_cost',$boq_cost1);
  
          array(
          "boq_code" => $pj,
          "boq_mcode" => $i->matcodelabor,
          "boq_mname" => $i->matnamelabor,
          "costcode" => $i->subcostcodelabor,
          "costname" => $i->subcostnamelabor,
          "qty" => $i->qty_bg,
          "unitcode" => $i->unitcode,
          "unitname" =>  $i->unitname,
          "price_qty" => $i->labpricebg,
          "cost" => $i->labamtbg,
          "boq" => $i->labamtboq,
          "type" => "2",
          "compcode" => $compcode,
          "pimary" => $i->boq_id,
          "control_qty" => "1",
          "control" => "1",
          "controlper" => "100",
          "forecast" => "0",
          "system" => $i->boq_job,
          "heading_ref" => $i->heading_ref,
          "project_code" => $pjid,
          "ref_revise" => "0",
          ),
          // $this->db->insert('boq_cost',$boq_cost2);
            ////////////

           array(
          "boq_code" => $pj,
          "boq_mcode" => $i->matcodelabor,
          "boq_mname" => $i->matnamelabor,
          "costcode" =>  $i->subcostcodelabor,
          // "costcode" => SUBSTR($i->newmatcode,0,11),
          "costname" => $i->subcostnamelabor,
          "qty" => $i->qty_bg,
          "unitcode" => $i->unitcode,
          "unitname" =>  $i->unitname,
          "price_qty" => $i->subpricebg,
          "cost" => $i->subamtbg,
          "boq" => $i->subamtboq,
          "type" => "3",
          "compcode" => $compcode,
          "pimary" => $i->boq_id,
          "control_qty" => "1",
          "control" => "1",
          "controlper" => "100",
          "forecast" => "0",
          "system" => $i->boq_job,
          "heading_ref" => $i->heading_ref,
          "project_code" => $pjid,
          "ref_revise" => "0",
           ),
          // $this->db->insert('boq_cost',$boq_cost3);
            ////////////
          );
          $this->db->insert_batch('boq_cost',$dataar);
          $datarevise = array(
            array(
              "boq_bd" => $pj,
              "project_code" => $pjid,
              "boq_id" => $i->boq_id,
              "boq_job" => $i->boq_job,
              "subcostcode" =>  $i->subcostcodelabor,
              "subcostcodename" => $i->subcostcodename,
              "subcostcodelabor" => $i->subcostcodelabor,
              "subcostnamelabor" => $i->subcostnamelabor,
              "newmatnamee" => $i->newmatnamee,
              "newmatcode" => $i->newmatcode,
              "matcodelabor" => $i->matcodelabor,
              "matnamelabor" => $i->matnamelabor,
              "boqcode" => $i->boqcode,
              "matboq" => $i->matboq,
              "unitcode" => $i->unitcode,
              "unitname" => $i->unitname,
              "qty_bg" => parse_num($i->qty_bg),
              "qtyboq" => parse_num($i->qtyboq),
              "matpricebg" => parse_num($i->matpricebg),
              "matamtbg" => parse_num($i->matamtbg),
              "labpricebg" => parse_num($i->labpricebg),
              "labamtbg" => parse_num($i->labamtbg),
              "subpricebg" => parse_num($i->subpricebg),
              "subamtbg" => parse_num($i->subamtbg),
              "totalamt" => parse_num($i->totalamt),
              "matpriceboq" => parse_num($i->matpriceboq),
              "matamtboq" => parse_num($i->matamtboq),
              "labpriceboq" => parse_num($i->labpriceboq),
              "labamtboq" => parse_num($i->labamtboq),
              "subpriceboq" => parse_num($i->subpriceboq),
              "subamtboq" => parse_num($i->subamtboq),
              "totalamtboq" => parse_num($i->totalamtboq),
              "status" => "Y",
              "compcode" => $compcode,
              "adduser" => $username,
              "revise" => "0",
              "heading_ref" => $i->heading_ref,
              "adddate" => date('y-m-d'),
            )
          );
          $this->db->insert_batch('boq_item_revise',$datarevise);


          

        }
           $datax = array(
              'status' => "Y",
              'revise_boq' => "0"
             
            );
            $this->db->where('heading_ref',$pr);
            $this->db->update('boq_item',$datax);

             $count = $this->datastore_m->countappove_project($year,$mount,$compcode,$modal,$pjid);
            foreach ($count as $key => $value) {
              $bi_approve = $value->bi_approve;
              $approve = $value->approve;
              $bi_wait = $value->bi_wait;
            }
            if ($approve == 0) {
              $view = array(
                  'bi_modal'    => "pr",
                  'bi_year'     => $year,
                  'bi_month'    => $mount,
                  'bi_approve'     => 1,
                  'compcode'  => $compcode,
                  'bi_project'  => $pjid,
                );
              $this->db->insert('bi_views_project',$view);
            }else{
            $view = array(
                  'bi_wait'     => @$bi_wait-1,
                  'bi_approve'     => @$bi_approve+1,
                );
              $this->db->where('bi_project',$pjid);
              $this->db->where('bi_modal',$modal);
              $this->db->where('bi_month',$mount);
              $this->db->where('bi_year',$year);
              $this->db->update('bi_views_project',$view);
          }

          $heading = array(
              "status" => "Y" 
            );
            $this->db->where('ref_bd',$pr);
            $this->db->update('heading_bd',$heading);
         }


          redirect('bd/approve_billof/'.$pj.'/'.$pjid);
         

        }


        public function approve_td_boq2()
        {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $m_id = $session_data['m_id'];

          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_td',$data);

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_td',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_td',$datap);

          $this->db->select('*');
          $this->db->from('approve_td');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          

          $this->db->select('*');
          $this->db->from('approve_td');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
            
          $year = date('Y');
          $mount = date('m');
          $modal="pr";

          if($numx=="0"){
            
            // var_dump($count);
            // die();


            if ($approve == 0) {
              $view = array(
                  'bi_modal'    => "pr",
                  'bi_year'     => $year,
                  'bi_month'    => $mount,
                  'bi_approve'     => 1,
                  'compcode'  => $compcode,
                  'bi_project'  => $pjid,
                );
              $this->db->insert('bi_views_project',$view);
            }else{
            $view = array(
                  'bi_wait'     => @$bi_wait-1,
                  'bi_approve'     => @$bi_approve+1,
                );
              $this->db->where('bi_project',$pjid);
              $this->db->where('bi_modal',$modal);
              $this->db->where('bi_month',$mount);
              $this->db->where('bi_year',$year);
              $this->db->update('bi_views_project',$view);
          }


          $this->db->select('*');
          $this->db->from('boq_item');
          $this->db->where('boq_bd',$pj);
          $this->db->where('status',"W");

          $boq_i=$this->db->get()->result();

          foreach ($boq_i as $i) {
                        
          $boq_cost1 = array(
          "boq_code" => $pj,
          "boq_mcode" => $i->newmatcode,
          "boq_mname" => $i->newmatnamee,
          "costcode" => $i->subcostcode,
          "costname" => $i->subcostcodename,
          "qty" => $i->qty_bg,
          "unitcode" => $i->unitcode,
          "unitname" =>  $i->unitname,
          "price_qty" => $i->matpricebg,
          "cost" => $i->matamtbg,
          "boq" => $i->matamtboq,
          "type" => "1",
          "compcode" => $compcode,
          "pimary" => $i->boq_id,
          "control_qty" => "1",
          "control" => "1",
          "controlper" => "100",
          "forecast" => "0",
          "system" => $i->boq_job,
          "heading_ref" => $i->heading_ref,
          );
          $this->db->insert('boq_cost',$boq_cost1);
  
          $boq_cost2 = array(
          "boq_code" => $pj,
          "boq_mcode" => $i->newmatcode,
          "boq_mname" => $i->newmatnamee,
          "costcode" => $i->subcostcode,
          "costname" => $i->subcostcodename,
          "qty" => $i->qty_bg,
          "unitcode" => $i->unitcode,
          "unitname" =>  $i->unitname,
          "price_qty" => $i->labpricebg,
          "cost" => $i->labamtbg,
          "boq" => $i->labamtboq,
          "type" => "2",
          "compcode" => $compcode,
          "pimary" => $i->boq_id,
          "control_qty" => "1",
          "control" => "1",
          "controlper" => "100",
          "forecast" => "0",
          "system" => $i->boq_job,
          "heading_ref" => $i->heading_ref,
          );
          $this->db->insert('boq_cost',$boq_cost2);
            ////////////

          $boq_cost3 = array(
          "boq_code" => $pj,
          "boq_mcode" => $i->newmatcode,
          "boq_mname" => $i->newmatnamee,
          "costcode" => $i->subcostcode,
          "costname" => $i->subcostcodename,
          "qty" => $i->qty_bg,
          "unitcode" => $i->unitcode,
          "unitname" =>  $i->unitname,
          "price_qty" => $i->subpricebg,
          "cost" => $i->subamtbg,
          "boq" => $i->subamtboq,
          "type" => "3",
          "compcode" => $compcode,
          "pimary" => $i->boq_id,
          "control_qty" => "1",
          "control" => "1",
          "controlper" => "100",
          "forecast" => "0",
          "system" => $i->boq_job,
          "heading_ref" => $i->heading_ref,
          );
          $this->db->insert('boq_cost',$boq_cost3);
            ////////////


          $datarevise = array
          (
          "boq_bd" => $pj,
          "boq_id" => $i->boq_id,
          "boq_job" => $i->boq_job, 
          "subcostcode" => $i->subcostcode, 
          "subcostcodename" => $i->subcostcodename,
          "newmatnamee" => $i->newmatnamee, 
          "newmatcode" => $i->newmatcode, 
          "matcodelabor" => $i->matcodelabor,
          "matnamelabor" => $i->matnamelabor,
          "boqcode" => $i->boqcode, 
          "matboq" => $i->matboq, 
          "unitcode" => $i->unitcode,
          "unitname" => $i->unitname,
          "qty_bg" => parse_num($i->qty_bg),
          "qtyboq" => parse_num($i->qtyboq),
          "matpricebg" => parse_num($i->matpricebg),
          "matamtbg" => parse_num($i->matamtbg),
          "labpricebg" => parse_num($i->labpricebg),
          "labamtbg" => parse_num($i->labamtbg),
          "subpricebg" => parse_num($i->subpricebg),
          "subamtbg" => parse_num($i->subamtbg),
          "totalamt" => parse_num($i->totalamt),
          "matpriceboq" => parse_num($i->matpriceboq),
          "matamtboq" => parse_num($i->matamtboq),
          "labpriceboq" => parse_num($i->labpriceboq),
          "labamtboq" => parse_num($i->labamtboq),
          "subpriceboq" => parse_num($i->subpriceboq),
          "subamtboq" => parse_num($i->subamtboq),
          "totalamtboq" => parse_num($i->totalamtboq),
          "status" => "Y",
          "compcode" => $compcode,
          "adduser" => $username,
          "revise" => "0",
          "heading_ref" => $i->heading_ref,
          "adddate" => date('y-m-d'),
           );
           $this->db->insert('boq_item_revise',$datarevise);


          

        }
          $datax = array(
              'status_boq' => "Y",
             
            );
            $this->db->where('heading_ref_boq',$pr);
            $this->db->update('boq_item',$datax);

             $count = $this->datastore_m->countappove_project($year,$mount,$compcode,$modal,$pjid);
            foreach ($count as $key => $value) {
              $bi_approve = $value->bi_approve;
              $approve = $value->approve;
              $bi_wait = $value->bi_wait;
            }

         $heading = array(
            "status" => "Y" 
           );
           $this->db->where('ref_bd',$pr);
           $this->db->update('heading_bd',$heading);
         }


          redirect('bd/approve_billof/'.$pj.'/'.$pjid);
         

        }

        public function approve_apv_d(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_ap',$data);

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_ap',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_ap',$datap);

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
            
          $year = date('Y');
          $mount = date('m');
          $modal="pr";

          if($numx=="0"){
            $datax = array(
              'status' => "approve",
             
            );
            $this->db->where('apd_code',$pr);
            $this->db->update('ap_down_header',$datax);
          }

          redirect('ap/ap_approve_apv_o_s/'.$pj.'/'.$pjid);
        }


        public function approve_apv_r(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_ap',$data);

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_ap',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_ap',$datap);

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
            
          $year = date('Y');
          $mount = date('m');
          $modal="pr";

          if($numx=="0"){
            $datax = array(
              'status' => "approve",
             
            );
            $this->db->where('apr_code',$pr);
            $this->db->update('ap_ret_header',$datax);
          }

          redirect('ap/ap_approve_apv_o_s/'.$pj.'/'.$pjid);
        }

        public function approve_apv(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_ap',$data);

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_ap',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_ap',$datap);

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
            
          $year = date('Y');
          $mount = date('m');
          $modal="pr";

          if($numx=="0"){
            $datax = array(
              'status' => "approve",
             
            );
            $this->db->where('apv_code',$pr);
            $this->db->update('apv_header',$datax);
          }

          redirect('ap/ap_approve_apv_o_s/'.$pj.'/'.$pjid);
        }

        public function approve_apo(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_ap',$data);

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_ap',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_ap',$datap);

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
            
          $year = date('Y');
          $mount = date('m');
          $modal="pr";

          if($numx=="0"){
            $datax = array(
              'status' => "approve",
             
            );
            $this->db->where('ap_no',$pr);
            $this->db->update('ap_pettycash_header',$datax);
          }

          redirect('ap/ap_approve_apv_o_s/'.$pj.'/'.$pjid);
        }

        public function approve_aps(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
          $id = $this->uri->segment(3);
          $pr = $this->uri->segment(4);
          $pj = $this->uri->segment(5);
          $sequence = $this->uri->segment(6);
          $pjid = $this->uri->segment(7);
          $data = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_id',$id);
          $this->db->update('approve_ap',$data);

          if($numz<"1"){
            $dataz = array(
              'status' => "yes",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
            $this->db->where('app_pr',$pr);
            $this->db->where('app_sequence',$sequence);
            $this->db->update('approve_ap',$dataz);
          }

          $datap = array(
              'status' => "approve",
              'app_date' =>date('Y-m-d'),
              'app_time' => date('H:i:s'),
            );
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence <',$sequence);
          $this->db->update('approve_ap',$datap);

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('app_sequence',$sequence);
          $numz=$this->db->get()->num_rows(); 

          

          $this->db->select('*');
          $this->db->from('approve_ap');
          $this->db->where('app_project',$pj);
          $this->db->where('app_pr',$pr);
          $this->db->where('status =','no'); 
          $numx=$this->db->get()->num_rows(); 
            
          $year = date('Y');
          $mount = date('m');
          $modal="pr";

          if($numx=="0"){
            $datax = array(
              'status' => "approve",
             
            );
            $this->db->where('aps_code',$pr);
            $this->db->update('aps_header',$datax);
          }

          redirect('ap/ap_approve_apv_o_s/'.$pj.'/'.$pjid);
        }




}

