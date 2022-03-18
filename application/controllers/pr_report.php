<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pr_report extends CI_Controller {
      public function __construct() {
            parent::__construct();
            $this->load->model('office_m');
            $this->load->Model('auth_m');

           

        }
        public function pr_summary()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          // $data['getproj'] = $this->datastore_m->getproject();
          // $data['resmem'] = $this->datastore_m->getmember();
          // $data['getunit'] = $this->datastore_m->getunit();
          // $data['getdep'] = $this->datastore_m->department();
          // $data['allmaterial'] = $this->datastore_m->allmaterial();
          // $data['allcostcode'] = $this->datastore_m->allcostcode();
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          // $data['compimg'] = $this->datastore_m->companyimg();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/report_all_v');
          $this->load->view('base/footer_v');
        }
         public function pr_report_status()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          // $data['getproj'] = $this->datastore_m->getproject();
          // $data['resmem'] = $this->datastore_m->getmember();
          // $data['getunit'] = $this->datastore_m->getunit();
          // $data['getdep'] = $this->datastore_m->department();
          // $data['allmaterial'] = $this->datastore_m->allmaterial();
          // $data['allcostcode'] = $this->datastore_m->allcostcode();
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          // $data['compimg'] = $this->datastore_m->companyimg();
          $this->load->model('pr_m');
          $data['res'] = $this->pr_m->getallprwait();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/pr_report_status');
          $this->load->view('base/footer_v');
        }
        public function loadprstatuspending()
       {
        $chk = $this->uri->segment(3);
        $this->load->model('pr_m');
        if ($chk=="pending") {
          $data['res'] = $this->pr_m->getallprwait();
        }elseif($chk=="all"){
           $data['res'] = $this->pr_m->getallprt();
        }elseif($chk=="approve"){
          $data['res'] = $this->pr_m->getallprapprove();
        }elseif($chk=="disapp"){
          $data['res'] = $this->pr_m->getallprwait();
        }elseif($chk=="wap") {
          $data['res'] = $this->pr_m->getwait_approve();
        }

        $this->load->view('office/pr/report_summary/load_pr_pending_v',$data);

       }
       public function load_pr_status_detail()
       {
        $prid = $this->uri->segment(3);
        $data['prdate'] = $this->uri->segment(4);
        $this->load->model('pr_m');
        $data['res'] = $this->pr_m->getpr_item($prid);
        $this->load->view('office/pr/report_summary/load_pr_status_detail_v',$data);
       }
        public function report_summary(){

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          // $data['getproj'] = $this->datastore_m->getproject();
          // $data['resmem'] = $this->datastore_m->getmember();
          // $data['getunit'] = $this->datastore_m->getunit();
          // $data['getdep'] = $this->datastore_m->department();
          // $data['allmaterial'] = $this->datastore_m->allmaterial();
          // $data['allcostcode'] = $this->datastore_m->allcostcode();
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $data['getproj'] = $this->datastore_m->getprojectpr();
          $data['member'] = $this->datastore_m->getmemberr();
          $data['compimg'] = $this->datastore_m->companyimg();
          $company = $this->datastore_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/pr_report_sum_v');
          $this->load->view('base/footer_v');
        }

        public function report_prrent(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
         
          $data['apbd'] = $this->datastore_m->getap_bill_delete();
          $data['compimg'] = $this->datastore_m->companyimg();
          $company = $this->datastore_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/report_prrent_v');
          $this->load->view('base/footer_v');
        }
        public function report_purchase_requisition(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
        
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
       $data['getvd'] = $this->datastore_m->getvenders();
          $data['getpt'] = $this->datastore_m->getpt();
          // 
          $data['compimg'] = $this->datastore_m->companyimg();
          $company = $this->datastore_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/report_purchase_requisition_v');
          $this->load->view('base/footer_v');
        }
        public function report_pcandnopr(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $data['getproj'] = $this->datastore_m->getprojectpr();
          $data['getvd'] = $this->datastore_m->getvenders();
          $data['getpr'] = $this->datastore_m->getpr();
          $data['member'] = $this->datastore_m->getmemberr();
          $data['compimg'] = $this->datastore_m->companyimg();
          $company = $this->datastore_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/report_pcandnopr_v');
          $this->load->view('base/footer_v');
        }

        public function delete_page()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
               
            
          if ($username=="") {
            redirect('/');
          }

          try {
                $this->load->view('navtail/base_master/header_v');
                $add = $this->input->post();

                $proid =  $add['pro'];
                $memid = $add['mm'];
                $chk = $add['eq'];
                // $a = $add['a'][$i];
                $and = $add['and'];
                $where = $add['chk'];
                $empty = $add['empty'];
                $t1 = $add['daton'];
                $t2 = $add['dattwo'];
                $an = $add['da'];
                $companyname = $add['companyname'];
                  // $eqir = $add['eqir'][$i];
                        // $dat = $add['dat'][$i];
                        if ($t1!="" and $t2!="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender  $where $proid and pr_status='delete' and $memid and $t1 and $t2 group by pr_vender");
                        }
                          else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender $where $proid and pr_status='delete' and $t1 and $t2 group by pr_vender");
                        }
                          else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender  $where $memid and pr_status='delete' and $t1 and $t2 group by pr_vender");
                        }
                          else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender $where $t1 and $t2 group by pr_vender");
                        }
                          else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender $where $proid and $memid and pr_status='delete' and $t1 group by pr_vender");
                        }
                          else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender $where $proid and $memid and pr_status='delete' group by pr_vender");
                        }
                          else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender $where $proid and pr_status='delete' group by pr_vender");
                        }
                          else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender  $where $memid and pr_status='delete' group by pr_vender");
                        }
                        else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender  group by pr_vender");
                        }

                        if ($qm) {
                          $rm = $qm->result();
                        }else{
                          redirect('pr_report/report_pcandnopr');
                        }

                        $n=1;
                        

                        echo
                        '<style>
        .navbar-default{background:#1a1e58; color:#fff;}
        body{background: #ddd;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;;
        }
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
        }
        .pdf-header {
            position: absolute;
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 8.3in; height: 11.6929in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }


        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
.legend_custom {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 19.5px;
    line-height: inherit;
    color: #333333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px 15px;
    line-height: 1.5384616;
    vertical-align: top;
    border-top: 0px solid 
  }
    </style>'.
                        '<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:40px;">
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a href="report_prrent" type="button" class="btn btn-warning navbar-btn"><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>
 
        </div><!--/.nav-collapse -->
      </div>
    </nav>'.
                          '<br><br>'.
                          '<h5 style="text-align: center;">'.'บริษัท : '.$companyname.'</h5>'.
                          '<h5 style="text-align: center;">'.'รายงานการลบเอกสาร'.'</h5>'.
                         
                        '<table class="table table-bordered table-xxs" style="font-size: 12px; text-align: center;">'.
                          '<thead>'.
                            '<tr class="alpha-slate">'.
                              '<th style="text-align: center;">PR No.</th>'.
                              '<th style="text-align: center;">PR Date</th>'.
                              '<th style="text-align: center;">Vendor</th>'.
                              '<th style="text-align: center;">Delete By</th>'.
                              '<th style="text-align: center;">Delete Date</th>'.
                              '<th style="text-align: center;">Descripton</th>'.
                              
                            '</tr>'.
                          '</thead>'.

                          '<tbody >';
                          foreach ($rm as $e) {

                          if ($t1!="" and $proid!="" and $memid!="" and $t2!=""){
                            $qmm = $this->db->query("select * from pr where pr_vender='$e->pr_vender' and $memid and $t1 and $t2 and pr_status='delete'");
                          }else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from pr where pr_vender='$e->pr_vender' and $t1 and $t2 and pr_status='delete'");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from pr where pr_vender='$e->pr_vender' and $memid and $t1 and $t2 and pr_status='delete'");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from pr where pr_vender='$e->pr_vender' and $t1 and $t2 and pr_status='delete'");
                          }else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from pr where pr_vender='$e->pr_vender' and $memid and $t1 and pr_status='delete'");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from pr where pr_vender='$e->pr_vender' and $memid and pr_status='delete'");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from pr where pr_vender='$e->pr_vender' and pr_status='delete'");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from pr  where pr_vender='$e->pr_vender' and $memid and pr_status='delete'");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from pr  where pr_vender='$e->pr_vender'");
                          }
                          // if ($t1=="") {
                          //   $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $memid");
                          // }
                            // else{
                          //   $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $memid and $t1");
                          // }
                          // if ($t1!="" and $t2=="") {
                          //   $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $memid and $t1");
                          // }else if ($t1!="" && $t2!=""){
                          //   $qmm = $this->db->query("select * from pr join vender on vender.vender_id=pr.pr_vender where pr_project='$e->project_id' and $memid and $t1 and $t2");
                          // }
                          $rmm = $qmm->result();
                         
                            $de = $this->db->query("select pr_prno,pr_prdate,vender_name,deluser,pr.deldate as delldate,description from pr join vender on vender.vender_id=pr.pr_vender where pr_status='delete' and pr_vender='$e->pr_vender'");
                            $rd = $de->result();
                             
                               foreach ($rd as $v) {
                            echo 
                                '<tr >'.
                                '<td>'.$v->pr_prno.'</td>'.
                                '<td>'.$v->pr_prdate.'</td>'.
                                '<td>'.$v->vender_name.'</td>'.
                                '<td>'.$v->deluser.'</td>'.
                                '<td>'.$v->delldate.'</td>'.
                                '<td>'.$v->description.'</td>';
                             }
                          }
                        echo  '</tr>'.
                  
                        
                             '</tbody>'.

                          '</table>';
                          
                       
                        
                        $this->load->view('base/footer_v');
                        // $this->load->view('base/footer_v');
              } catch (Exception $e) {
                echo $e;
                // redirect('pr_report/report_summary');
              }
        }
         public function delete_page_ap()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
               
            
          if ($username=="") {
            redirect('/');
          }

          try {
                $this->load->view('navtail/base_master/header_v');
                $add = $this->input->post();

                $proid =  $add['pro'];
                $memid = $add['mm'];
                $chk = $add['eq'];
                // $a = $add['a'][$i];
                $and = $add['and'];
                $where = $add['chk'];
                $empty = $add['empty'];
                $t1 = $add['daton'];
                $t2 = $add['dattwo'];
                $an = $add['da'];
                $companyname = $add['companyname'];
                  // $eqir = $add['eqir'][$i];
                        // $dat = $add['dat'][$i];
                        if ($t1!="" and $t2!="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from ap_billsuc_header $where $proid and deluser!='null' and $memid and $t1 and $t2 group by ap_bill_id");  
                        }
                          else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from ap_billsuc_header  $where $proid and deluser!='null' and $t1 and $t2 group by ap_bill_id");
                        }
                          else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from ap_billsuc_header $where $memid and deluser!='null' and $t1 and $t2 group by by ap_bill_id");
                        }
                          else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from ap_billsuc_header  $where $t1 and  $t2 and deluser!='null' group by ap_bill_id");
                        }
                          else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from ap_billsuc_header  $where $proid and $memid and deluser!='null' and $t1 group by ap_bill_id");
                        }
                          else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from ap_billsuc_header  $where $proid and $memid and deluser!='null' group by ap_bill_id");
                        }
                          else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from ap_billsuc_header $where $proid and deluser!='null' group by ap_bill_id");
                        }
                          else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from ap_billsuc_header $where $memid and deluser!='null' group by ap_bill_id");
                        }
                        else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from ap_billsuc_header group by ap_bill_id");
                        }

                        if ($qm) {
                          $rm = $qm->result();
                        }else{
                          redirect('pr_report/report_prrent');
                        }

                        $n=1;
                        

                        echo
                        '<style>
        .navbar-default{background:#1a1e58; color:#fff;}
        body{background: #ddd;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;;
        }
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
        }
        .pdf-header {
            position: absolute;
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 8.3in; height: 11.6929in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }


        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
.legend_custom {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 19.5px;
    line-height: inherit;
    color: #333333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px 15px;
    line-height: 1.5384616;
    vertical-align: top;
    border-top: 0px solid 
  }
    </style>'.
                        '<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:40px;">
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a href="report_prrent" type="button" class="btn btn-warning navbar-btn"><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>
 
        </div><!--/.nav-collapse -->
      </div>
    </nav>'.
                          '<br><br>'.
                          '<h5 style="text-align: center;">'.'บริษัท : '.$companyname.'</h5>'.
                          '<h5 style="text-align: center;">'.'รายงานการลบเอกสาร'.'</h5>'.
                         
                        '<table class="table table-bordered table-xxs" style="font-size: 12px; text-align: center;">'.
                          '<thead>'.
                            '<tr class="alpha-slate">'.
                              '<th style="text-align: center;">Doc No</th>'.
                              '<th style="text-align: center;">Date</th>'.
                              '<th style="text-align: center;">Ref Ap No</th>'.
                              '<th style="text-align: center;">Vendor</th>'.
                              '<th style="text-align: center;">Delete By</th>'.
                              '<th style="text-align: center;">Delete Date</th>'.
                              '<th style="text-align: center;">Descripton</th>'.
                              
                            '</tr>'.
                          '</thead>'.

                          '<tbody >';
                          foreach ($rm as $e) {

                          if ($t1!="" and $proid!="" and $memid!="" and $t2!=""){
                            $qmm = $this->db->query("select * from ap_billsuc_header where ap_bill_id='$e->ap_bill_id' and $memid and $t1 and $t2 and deluser!='null'");
                          }else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from ap_billsuc_header where ap_bill_id='$e->ap_bill_id' and $t1 and $t2 and deluser!='null'");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from ap_billsuc_header where ap_bill_id='$e->ap_bill_id' and $memid and $t1 and $t2 and deluser!='null'");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from ap_billsuc_header where ap_bill_id='$e->ap_bill_id' and $t1 and $t2 and deluser!='null'");
                          }else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from ap_billsuc_header where ap_bill_id='$e->ap_bill_id' and $memid and $t1 and deluser!='null'");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from ap_billsuc_header where ap_bill_id='$e->ap_bill_id' and $memid and deluser!='null'");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from ap_billsuc_header where ap_bill_id='$e->ap_bill_id' and deluser!='null'");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from ap_billsuc_header  where ap_bill_id='$e->ap_bill_id' and $memid and deluser!='null'");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from ap_billsuc_header  where ap_bill_id='$e->ap_bill_id' and deluser!='null'");
                          }
                         
                          $rmm = $qmm->result();
                         
                            // $de = $this->db->query("select pr_prno,pr_prdate,vender_name,deluser,pr.deldate as delldate,description from pr join vender on vender.vender_id=pr.pr_vender where pr_status='delete' and pr_vender='$e->pr_vender'");
                             $de = $this->db->query("select * from ap_billsuc_header  where deluser!='null' and ap_bill_id='$e->ap_bill_id'");
                            $rd = $de->result();
                             
                               foreach ($rd as $v) {
                            echo 
                                '<tr >'.
                                '<td>'.$v->ap_bill_code.'</td>'.
                                '<td>'.$v->ap_bill_date.'</td>'.
                                '<td>'.$v->ap_bill_id.'</td>'.
                                '<td>'.$v->ap_bill_vender.'</td>'.
                                '<td>'.$v->deluser.'</td>'.
                                '<td>'.$v->deldate.'</td>'.
                                '<td>'.$v->description.'</td>';
                             }
                              }
                        echo  '</tr>'.
                  
                        
                             '</tbody>'.

                          '</table>';
                          
                       
                        
                        $this->load->view('base/footer_v');
                        // $this->load->view('base/footer_v');
              } catch (Exception $e) {
                echo $e;
                // redirect('pr_report/report_summary');
              }


        }
         
        public function delete_page_pt()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
               
            
          if ($username=="") {
            redirect('/');
          }

          try {
                $this->load->view('navtail/base_master/header_v');
                $add = $this->input->post();

                $proid =  $add['pro'];
                $memid = $add['mm'];
                $chk = $add['eq'];
                // $a = $add['a'][$i];
                $and = $add['and'];
                $where = $add['chk'];
                $empty = $add['empty'];
                $t1 = $add['daton'];
                $t2 = $add['dattwo'];
                $an = $add['da'];
                $companyname = $add['companyname'];
                  // $eqir = $add['eqir'][$i];
                        // $dat = $add['dat'][$i];
                        if ($t1!="" and $t2!="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("1select * from pettycash
                           $where $proid and status='delete' and $memid and $t1 and $t2 group by doc_id");  
                        }
                          else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from pettycash  $where $proid and status='delete' and $t1 and $t2 group by doc_id");
                        }
                          else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from pettycash $where $memid and status='delete' and $t1 and $t2 group by by doc_id");
                        }
                          else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from pettycash  $where $t1 and  $t2 and status='delete' group by doc_id");
                        }
                          else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from pettycash  $where $proid and $memid and status='delete' and $t1 group by doc_id");
                        }
                          else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from pettycash  $where $proid and $memid and status='delete' group by doc_id");
                        }
                          else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from pettycash $where $proid and status='delete' group by doc_id");
                        }
                          else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from pettycash $where $memid and status='delete' group by doc_id");
                        }
                        else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from pettycash join vender on vender.vender_id=pettycash.ven_id and status='delete' group by doc_id");
                        }

                        if ($qm) {
                          $rm = $qm->result();
                        }else{
                          redirect('pr_report/report_prrent');
                        }

                        $n=1;
                        

                        echo
                        '<style>
        .navbar-default{background:#1a1e58; color:#fff;}
        body{background: #ddd;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;;
        }
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
        }
        .pdf-header {
            position: absolute;
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 8.3in; height: 11.6929in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }


        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
.legend_custom {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 19.5px;
    line-height: inherit;
    color: #333333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px 15px;
    line-height: 1.5384616;
    vertical-align: top;
    border-top: 0px solid 
  }
    </style>'.
                        '<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:40px;">
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a href="report_purchase_requisition" type="button" class="btn btn-warning navbar-btn"><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>
 
        </div><!--/.nav-collapse -->
      </div>
    </nav>'.
                          '<br><br>'.
                          '<h5 style="text-align: center;">'.'บริษัท : '.$companyname.'</h5>'.
                          '<h5 style="text-align: center;">'.'รายงานการลบเอกสาร'.'</h5>'.
                         
                        '<table class="table table-bordered table-xxs" style="font-size: 12px; text-align: center;">'.
                          '<thead>'.
                            '<tr class="alpha-slate">'.
                              '<th style="text-align: center;">Doc No</th>'.
                              '<th style="text-align: center;">Date</th>'.
                              '<th style="text-align: center;">Ref Ap No</th>'.
                              '<th style="text-align: center;">Vendor</th>'.
                              '<th style="text-align: center;">Delete By</th>'.
                              '<th style="text-align: center;">Delete Date</th>'.
                              '<th style="text-align: center;">Descripton</th>'.
                              
                            '</tr>'.
                          '</thead>'.

                          '<tbody >';
                          foreach ($rm as $e) {

                          if ($t1!="" and $proid!="" and $memid!="" and $t2!=""){
                            $qmm = $this->db->query("select * from pettycash where docno='$e->docno' and $memid and $t1 and $t2 and status='delete'");
                          }else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from pettycash where docno='$e->docno' and $t1 and $t2 and status='delete'");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from pettycash where docno='$e->docno' and $memid and $t1 and $t2 and status='delete'");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from pettycash where docno='$e->docno' and $t1 and $t2 and status='delete'");
                          }else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from pettycash where docno='$e->docno' and $memid and $t1 and status='delete'");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from pettycash where docno='$e->docno' and $memid and status='delete'");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from pettycash where docno='$e->docno' and status='delete'");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from pettycash  where docno='$e->docno' and $memid and status='delete'");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from pettycash  where docno='$e->docno' and status='delete'");
                          }
                         
                          $rmm = $qmm->result();
                             $de = $this->db->query("select docno,docdate,vender_type,vender_name,pettycash.userdel as userrdel, pettycash.deldate as delldate,description from pettycash join vender on vender.vender_id = pettycash.ven_id  where status='delete' and doc_id='$e->doc_id'");
                            $rd = $de->result();
                             
                               foreach ($rd as $v) {
                            echo 
                                '<tr >'.
                                '<td>'.$v->docno.'</td>'.
                                '<td>'.$v->docdate.'</td>'.
                                '<td>'.$v->vender_type.'</td>'.
                                '<td>'.$v->vender_name.'</td>'.
                                '<td>'.$v->userrdel.'</td>'.
                                '<td>'.$v->delldate.'</td>'.
                                '<td>'.$v->description.'</td>';
                             }
                              }
                        echo  '</tr>'.
                  
                        
                             '</tbody>'.

                          '</table>';
                          
                       
                        
                        $this->load->view('base/footer_v');
                        // $this->load->view('base/footer_v');
              } catch (Exception $e) {
                echo $e;
                // redirect('pr_report/report_summary');
              }


        }
          
        public function s_pett_crit()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
               
            
          if ($username=="") {
            redirect('/');
          }

         

          try {
           // $data['username'] = $session_data['username'];
           //      $data['name'] = $session_data['m_name'];
           //      $data['depid'] = $session_data['m_depid'];
           //      $data['dep'] = $session_data['m_dep'];
           //      $data['projid'] = $session_data['projectid'];
           //      $projectid = $session_data['projectid'];
           //      $data['project'] = $session_data['m_project'];
           //      $data['imgu'] = $session_data['img'];
                $this->load->view('navtail/base_master/header_v');
                // $this->load->view('navtail/base_master/tail_v',$data);

                $add = $this->input->post();

                $proid =  $add['pro'];
                $memid = $add['mm'];
                $chk = $add['eq'];
                // $a = $add['a'][$i];
                $and = $add['and'];
                $where = $add['chk'];
                $empty = $add['empty'];
                $t1 = $add['daton'];
                $t2 = $add['dattwo'];
                $an = $add['da'];
                  // $eqir = $add['eqir'][$i];
                        // $dat = $add['dat'][$i];
                        if ($t1!="" and $t2!="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid and $memid and $t1 and $t2 group by project_id");
                        }else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid and $t1 and $t2 group by project_id");
                        }else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $memid and $t1 and $t2 group by project_id");
                        }else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $t1 and $t2 group by project_id");
                        }else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid and $memid and $t1 group by project_id");
                        }else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid and $memid group by project_id");
                        }else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid group by project_id");
                        }else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $memid group by project_id");
                        }else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id ");
                        }

                        if ($qm) {
                          $rm = $qm->result();
                        }else{
                          redirect('management/pettycash_report');
                        }

                        $n=1;
                        foreach ($rm as $e) {

                        echo
                        '<br><br>'.
                        '<h1>'.$e->project_name.'</h1>'.
                        '<table class="table table-bordered table-xxs">'.
                          '<thead>'.
                            '<tr class="alpha-slate">'.
                              '<th>ลำดับ</th>'.
                              '<th>วันที่เบิก</th>'.
                              '<th>ผู้เบิก</th>'.
                              '<th>เลขที่</th>'.
                              '<th>รายการ</th>'.
                              '<th>จำนวนเงิน</th>'.
                            '</tr>'.
                          '</thead>'.

                          '<tbody >';

                          if ($t1!="" and $proid!="" and $memid!="" and $t2!=""){
                            $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $memid and $t1 and $t2");
                          }else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $t1 and $t2");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $memid and $t1 and $t2");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $t1 and $t2");
                          }else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $memid and $t1");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $memid");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id'");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $memid");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id'");
                          }
                          // if ($t1=="") {
                          //   $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $memid");
                          // }else{
                          //   $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $memid and $t1");
                          // }
                          // if ($t1!="" and $t2=="") {
                          //   $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $memid and $t1");
                          // }else if ($t1!="" && $t2!=""){
                          //   $qmm = $this->db->query("select * from pettycash join project on project.project_id=pettycash.project where project='$e->project_id' and $memid and $t1 and $t2");
                          // }
                          $rmm = $qmm->result();
                          $n=1;$tot=0;  foreach ($rmm as $ee) {
                            $de = $this->db->query("select sum(pettycashi_netamt) as netamt from pettycash_item where pettycashi_ref='$ee->docno'");
                            $rd = $de->result();
                        echo  '<tr >'.
                               '<td>'.$n.'</td>'.
                               '<td>'.$ee->docdate.'</td>'.
                               '<td>'.$ee->member.'</td>'.
                               '<td>'.$ee->docno.'</td>'.
                               '<td>'.$ee->remark.'</td>';
                               foreach ($rd as $v) {
                          echo '<td>'.number_format($v->netamt,2).'</td>';
                             }
                        echo  '</tr>';
                      $n++;  $tot=$tot+$v->netamt; $dat=$ee->docdate; }
                        echo  '<tr>'.
                                '<td colspan="6" class="text-center">รวม</td>'.
                                '<td>'.number_format($tot,2).'</td>'.
                              '<tr>'.
                             '</tbody>'.

                          '</table>'.
                          '<script>$("#dathone").html("<label>'.$dat.'</label>");</script>';
                        }
                        
                        $this->load->view('base/footer_v');
              } catch (Exception $e) {
                echo $e;
                // redirect('management/pettycash_report');
              }
        }


        public function om_pett_crit()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
               
            
          if ($username=="") {
            redirect('/');
          }

          try {
                $this->load->view('navtail/base_master/header_v');
                $add = $this->input->post();

                $proid =  $add['pro'];
                $memid = $add['mm'];
                $chk = $add['eq'];
                // $a = $add['a'][$i];
                $and = $add['and'];
                $where = $add['chk'];
                $empty = $add['empty'];
                $t1 = $add['daton'];
                $t2 = $add['dattwo'];
                $an = $add['da'];
                $companyname = $add['companyname'];
                  // $eqir = $add['eqir'][$i];
                        // $dat = $add['dat'][$i];
                        if ($t1!="" and $t2!="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pr on pr.pr_project=project.project_id $where $proid and $memid and $t1 and $t2 group by pr_project");
                        }
                          else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from project join pr on pr.pr_project=project.project_id $where $proid and $t1 and $t2 group by pr_project");
                        }
                          else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pr on pr.pr_project=project.project_id $where $memid and $t1 and $t2 group by pr_project");
                        }
                          else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from project join pr on pr.pr_project=project.project_id $where $t1 and $t2 group by pr_project");
                        }
                          else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pr on pr.pr_project=project.project_id $where $proid and $memid and $t1 group by pr_project");
                        }
                          else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pr on pr.pr_project=project.project_id $where $proid and $memid group by pr_project");
                        }
                          else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from project join pr on pr.pr_project=project.project_id $where $proid group by pr_project");
                        }
                          else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pr on pr.pr_project=project.project_id $where $memid group by pr_project");
                        }
                        else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from project join pr on pr.pr_project=project.project_id group by pr_project");
                        }

                        if ($qm) {
                          $rm = $qm->result();
                        }else{
                          redirect('pr_report/report_summary');
                        }

                        $n=1;
                        foreach ($rm as $e) {

                        echo
                        '<style>
        .navbar-default{background:#1a1e58; color:#fff;}
        body{background: #ddd;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;;
        }
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
        }
        .pdf-header {
            position: absolute;
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 8.3in; height: 11.6929in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }


        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
.legend_custom {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 19.5px;
    line-height: inherit;
    color: #333333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px 15px;
    line-height: 1.5384616;
    vertical-align: top;
    border-top: 0px solid 
  }
    </style>'.
                        '<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:40px;">
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a href="report_summary" type="button" class="btn btn-warning navbar-btn"><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>
 
        </div><!--/.nav-collapse -->
      </div>
    </nav>'.
                        '<br><br>'.
                        '<h5 style="text-align: center;">'.'บริษัท : '.$companyname.'</h5>'.
                        '<h5 style="text-align: center;">'.'รายงานการขอซื้อ'.'</h5>'.
                        '<h5 style="text-align: center;">'.$e->project_name.'</h5>'.
                        '<table class="table table-bordered table-xxs" style="font-size: 12px; text-align: center;">'.
                          '<thead>'.
                            '<tr class="alpha-slate">'.
                              '<th style="text-align: center;">PR No.</th>'.
                              '<th style="text-align: center;">PR Date</th>'.
                              '<th style="text-align: center;">project</th>'.
                              '<th style="text-align: center;">type</th>'.
                              '<th style="text-align: center;">Material Code</th>'.
                              '<th style="text-align: center;">Material Name</th>'.
                              '<th style="text-align: center;">Cost Code</th>'.
                              '<th style="text-align: center;">Cost Name</th>'.
                              '<th style="text-align: center;">QTY</th>'.
                              '<th style="text-align: center;">QTY Cancel</th>'.
                              '<th style="text-align: center;">Unit Price</th>'.
                              '<th style="text-align: center;">Total Amount</th>'.
                            '</tr>'.
                          '</thead>'.

                          '<tbody >';

                          if ($t1!="" and $proid!="" and $memid!="" and $t2!=""){
                            $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $memid and $t1 and $t2");
                          }else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $t1 and $t2");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $memid and $t1 and $t2");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $t1 and $t2");
                          }else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $memid and $t1");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $memid");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id'");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id' and $memid");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from pr join project on project.project_id=pr.pr_project where pr_project='$e->project_id'");
                          }
                        
                          $rmm = $qmm->result();
                          $tot=0;  foreach ($rmm as $ee) {
                            $de = $this->db->query("select * from pr_item where pri_ref='$ee->pr_prno'");
                            $rd = $de->result();
                               foreach ($rd as $v) {
                            echo 
                                '<tr >'.
                                '<td>'.$v->pri_ref.'</td>'.
                                '<td>'.$ee->pr_prdate.'</td>'.
                                '<td>'.$ee->pr_project.'</td>'.
                                '<td>'.$ee->purchase_type.'</td>'.
                                '<td>'.$v->pri_matcode.'</td>'.
                                '<td>'.$v->pri_matname.'</td>'.
                                '<td>'.$v->pri_costcode.'</td>'.
                                '<td>'.$v->pri_costname.'</td>'.
                                '<td>'.$v->pri_qty.'</td>'.
                                '<td>'.' '.'</td>'.
                                '<td>'.$v->pri_priceunit.'</td>'.
                                '<td>'.$v->pri_amount.'</td>';
                             }
                        echo  '</tr>';
                      $n++; $tot=$tot+$v->pri_amount; $dat=$ee->pr_prdate;  }
                        echo  '<tr>'.
                                '<td colspan="9" class="text-center">รวม</td>'.
                                '<td>'.number_format($tot,2).'</td>'.
                              '<tr>'.
                             '</tbody>'.

                          '</table>'.
                          '<script>$("#dathone").html("<label>'.$dat.'</label>");</script>';
                        }
                        
                        $this->load->view('base/footer_v');
                        // $this->load->view('base/footer_v');
              } catch (Exception $e) {
                echo $e;
                // redirect('pr_report/report_summary');
              }


        }

         public function pr_request_r()
          {
          $date = $this->session->userdata('sessed_in');
          $sess_name = $date['m_name'];
          $compcode = $date['compcode'];
          $docstr = $this->input->get('docstr');
          $docend = $this->input->get('docend');
          $datestr = $this->input->get('datestr');
          $dateend = $this->input->get('dateend');
          $pr_projectid = $this->input->get('proid');
          $buyname = $this->input->get('buyname');
          $status = $this->input->get('status');
          $doct = $this->input->get('doct');
          $a = $add['docstr'];
          $b = $add['docend'];
          $chk_docstr = substr($add['docstr'], 0,2);
          $chk_docend = substr($add['docend'], 0,2);
          $add = $this->input->get();
          if($b==""){
            $b=$a;
          }
          if($docend==""){
            $docend = $docstr;
          }
          $where_doc = "and pr.pr_prno BETWEEN '$docstr' and '$docend'";
          $where_date = "and pr.pr_prdate BETWEEN '$datestr' and '$dateend'";

          if($add['doct']=="1"){
          
          if ($docstr=="") {
            $where_doc = "";
          }
          if ($datestr=="") {
            $where_date = "";
          }
          $get_doc = "&get_doc={$where_doc}";
          $get_date = "&get_date={$where_date}";
          $flie = "pr_request_r.mrt";

            if($status=="approve" || $status==""){
              $flie = "pr_request_po.mrt";
            }else{
              $flie = "pr_request_r.mrt";
            }
          // if($status=="approve" || $status==""){
          //     $flie = "pr_request_po_rev1.mrt";
          //   }else{
          //     $flie = "pr_request_r.mrt";
          //   }
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $urls = "report/viewerloadpr?module=pr&typ=report&reportname=";
          $send = "{$urls}{$flie}&status={$status}&session={$sess_name}&proid={$pr_projectid}&buyn={$buyname}&date2={$dateend}&compcode={$compcode}";
          $base_url = $this->config->item("url_report");
          redirect($send); 
           
          }else if($add['doct']=="2"){
          $where_doc = "and pettycash.docno BETWEEN '$docstr' and '$docend'";
          $where_date = "and pettycash.docdate BETWEEN '$datestr' and '$dateend'";
          if ($docstr=="") {
            $where_doc = "";
          }
          if ($datestr=="") {
            $where_date = "";
          }
          $get_doc = "&get_doc={$where_doc}";
          $get_date = "&get_date={$where_date}";  
          $flie = "pr_request_r2.mrt";
          $urls = "report/viewerloadpr?module=pr&typ=report&reportname=";
          $send = "{$urls}{$flie}&st={$status}{$get_doc}{$get_date}&proid={$pr_projectid}&buyn={$buyname}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}";
          $base_url = $this->config->item("url_report");
          redirect($send); 
          
          }else if($add['doct']=="0"){
            $chk_docstr = substr($docstr, 0,2);
            $chk_docend = substr($docend, 0,2);
            $docpr = "and pr.pr_prno >= '$docstr'";
            $docpc = "and pettycash.docno <= '$docend'";
            if($chk_docstr == "PR" && $chk_docend == "PR" || $chk_docstr == "PC" && $chk_docend == "PC"){
              $docpr = "and pr.pr_prno >= '$docstr' and pr.pr_prno <='$docend'";
              $docpc = "and pettycash.docno >= '$docstr' and pettycash.docno <='$docend'";
            }else if ($chk_docstr == "PC" && $chk_docend == "PR") {
              $docpr = "and pr.pr_prno >= '$docend'";
              $docpc = "and pettycash.docno <= '$docstr'";
            }else if($chk_docstr != "" && $chk_docend == ""){
              $docpr = "and pr.pr_prno = '$docstr'";
              $docpc = "and pettycash.docno = '$docstr'";
            }else if($docstr==""){
              $docpr = "";
              $docpc = "";
            }
            $where_date = "and pr.pr_prdate BETWEEN '$datestr' and '$dateend'";
            $where_date2 = "and pettycash.docdate BETWEEN '$datestr' and '$dateend'";
            if($datestr==""){
              $where_date = "";
              $where_date2 = "";
            }
            $urls = "report/viewerloadpr?module=pr&typ=report";
            $file_report ="pr_request_r3.mrt";
            if($status=="approve" || $status==""){
              $file_report ="pr_request_po2.mrt";
              // $file_report ="pr_request_po2_rev1.mrt";
            }
            $send= "{$urls}&reportname={$file_report}&docs={$docpr}&doce={$docpc}&get_date={$where_date}&proid={$add['pr_projectid']}&buyn={$add['buyname']}&st={$add['status']}&type={$add['doct']}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}";
            $base_url = $this->config->item("url_report");
            redirect($send);
           
          } else{
            // redirect("stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_request_r4.mrt&docs=".$add['docstr']."&doce=".$add['docend']."&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&st=".$add['status']."&type=".$add['doct']);
          }
        }
        public function pr_delete_report_v()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $data['compcode'] = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/pr_delete_report_v');
          $this->load->view('base/footer_v');
        }
         public function pr_delete_r()
      {
          $date = $this->session->userdata('sessed_in');
          $sess_name = $date['m_name'];
          $add = $this->input->get();
          $datestr = $this->input->get('datestr');
          $dateend = $this->input->get('dateend');
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];
          $compcode = $data['compcode'];
          if($add['doct']=="0"){
            $datepr ="and pr.pr_delidate BETWEEN '$datestr' and '$dateend' ";
            $datepc ="and docdate BETWEEN '$datestr' and '$dateend'";
            if ($datestr=="") {
              $datepr ="";
            }
            if ($datestr=="") {
              $datepc ="";
            }
            
            $base_url = $this->config->item('url_report');

            // redirect("stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_delete_r3.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&type=".$add['doct'].$add['doct']."&session=".$sess_name."&wherepr=".$datepr."&wherepc=".$datepc."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
            redirect("report/viewerloadpr?module=pr&typ=report&reportname=pr_delete_r3.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&type=".$add['doct'].$add['doct']."&session=".$sess_name."&wherepr=".$datepr."&wherepc=".$datepc."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
          }else if($add['doct']=="1" ){
            // redirect("stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_delete_r6.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&type=".$add['doct'].$add['doct']."&session=".$sess_name."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
            redirect("report/viewerloadpr?module=pr&typ=report&reportname=pr_delete_r6.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&type=".$add['doct'].$add['doct']."&session=".$sess_name."&wherepr=".$datepr."&wherepc=".$datepc."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
          }else if($add['doct']=="2" ){
            // redirect("stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_delete_r7.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&type=".$add['doct'].$add['doct']."&session=".$sess_name."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
            redirect("report/viewerloadpr?module=pr&typ=report&reportname=pr_delete_r7.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&type=".$add['doct'].$add['doct']."&session=".$sess_name."&wherepr=".$datepr."&wherepc=".$datepc."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
          }else{
            // redirect("stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=po_delete_r6.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&type=".$add['doct']);
          }
        }
       
        public function pr_tracking_r()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('office/pr/report_summary/tracking_report');
          $this->load->view('navtail/base_master/footer_v');
        }
        public function pr_request_v()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->pr_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/request_view',$ser);
          $this->load->view('base/footer_v');
        }
    public function pr_search(){
        $this->load->model('datastore_m');
        $data = $this->input->post('data');
        // echo $data;
        $search = $this->datastore_m->pr_search($data);
         $this->load->view('office/pr/report_summary/request_view',$search);
//            echo print_r($search);
        //echo json_encode([$search]);
    }
    public function stock_card()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->po_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/stock_card',$ser);
          $this->load->view('base/footer_v');
        }        
      
        public function stock_balance_view()
        {
          
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->mat_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/stock_balance_view',$ser);
          $this->load->view('base/footer_v');
        }
        public function stock_balance_r(){

        $date_start =  $this->input->get('datestr');
        $date_stop =  $this->input->get('dateend');
        $project_name =  $this->input->get('matname');
        $amount =  $this->input->get('amount');
     
        //query
        $where_date ="and stock_date between '{$date_start}' and '{$date_stop}'";       
        $where_name="{$project_name}";      
        $datestart = "{$date_start}";

        //session name
        $data = $this->session->userdata('sessed_in');
        $sess_name = $data['m_name'];

        //if
        if($date_start == "")$where_date ="and stock_date between '' and '{$date_stop}'";
        if($project_name == "")$where_name ="";   
        if($datestart == "")$datestart = date("Y-m-d");     

        //url
        $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
        $report_file = "stock_balance.mrt";
        $report_file_noamt = "stock_balance_noamt.mrt";

        $get_date ="&date_={$where_date}";
        $get_name ="&name_={$where_name}";      
        $get_session ="&session_={$sess_name}"; 
        $datestart ="&datestart={$datestart}";      

        //send data
        if($amount == 'Y') $send= "{$urls}{$report_file}{$get_date}{$get_name}{$get_session}{$datestart}";        
        if($amount == 'N') $send= "{$urls}{$report_file_noamt}{$get_date}{$get_name}{$get_session}{$datestart}";
          
        $base_url = $this->config->item("url_report");
        redirect($send);
       
        }

        public function depreciate_view()
        {
          
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->mat_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/depreciate_view',$ser);
          $this->load->view('base/footer_v');
        }
         public function depreciate_r(){
          //input
          $mat_year =  $this->input->get('year');
          //query
          $where_year = "{$mat_year}";
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          //if
          if($mat_year == "")$where_year =date("Y");   
          //url
          $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $depreciate_file = "depreciate_report2.mrt";
          //getdata
          $year ="&year={$where_year}";
          $get_session ="&get_session={$sess_name}";  
          //send data
          $send= "{$urls}{$depreciate_file}{$year}{$get_session}";
          $base_url = $this->config->item("url_report");
          redirect($send);         
        }
        
         public function view_vender_re()
        {
       $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $ser['search'] = $this->datastore_m->vender_name($data,$compcode);
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/pr/report_summary/view_vender_re',$ser);
          $this->load->view('base/footer_v');
    }
    public function vender_report_pr()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
            //input
            $vender =  $this->input->get('vender');
            //gen query
            $query = "select * from vender";
            $where = $vender;
            
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            if($vender==""){
              $where="";
              $file_report ="vender_report_pr.mrt";
            }else{
              $file_report ="vender_report_pr_where.mrt";
            }
            //gen url
            $urls = "report/viewerloadpr?module=pr&typ=report";
            
 
            $send= "{$urls}&reportname={$file_report}&query={$query}&where={$where}&session={$sess_name}&compcode={$compcode}";
               $base_url = $this->config->item("url_report");
               redirect($send);
        }

// function for report

////////////////////////////////////////////////////////////////////stck card
        function get_stock_no($wh = null,$project_id=null){

              $this->db->select('stockcard.stock_matcode,stock_matname,stockcard.createdate');             
              $this->db->join('project','stockcard.stock_project = project.project_id'); 
              $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = stockcard.warehouse and ic_proj_warehouse.project_id = stockcard.stock_project'); 
              
              $this->db->group_by('stockcard.stock_matcode');              
              $this->db->where(array('whcode' => $wh,
                                    'project.project_id' => $project_id
                                    ));     
              $this->db->order_by('stockcard.stock_matname');         
             $query3 = $this->db->get('stockcard');
             $res = $query3->result_array();
             echo json_encode($res);

        }
        function get_mat_code_by_stock_on($matname = null){
             $this->db->select('stockcard.stock_matname,stockcard.stock_matcode');            
              $this->db->join('project','stockcard.stock_project = project.project_id'); 
              $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = stockcard.warehouse and ic_proj_warehouse.project_id = stockcard.stock_project'); 
             $this->db->group_by('stockcard.stock_matcode');  
             $this->db->order_by('stockcard.stock_matname');              
             $this->db->where("stockcard.stock_matcode",$matname);
             $query1 = $this->db->get('stockcard'); 
             $res = $query1->result_array();
             echo json_encode($res);
        }
        function get_wh($project_id){
           $this->db->select('whcode,whname');           
           $this->db->join('project','stockcard.stock_project = project.project_id'); 
              $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = stockcard.warehouse and ic_proj_warehouse.project_id = stockcard.stock_project'); 
           $this->db->group_by('whcode');   
           $this->db->order_by('whcode');           
           $this->db->where("project.project_id",$project_id);
           $query2 = $this->db->get('stockcard');
            $res = $query2->result_array();
            echo json_encode($res);
        }
////////////////////////////////////////////////////////////////////stck card
////////////////////////////////////////////////////////////////////stck card IN
        function get_stock_no_in($wh = null){

             $this->db->select('stockcard.stock_matcode,stock_matname,store.wh,stockcard.stock_type');
             $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
             $this->db->join('project','stockcard.stock_project = project.project_id'); 
             $this->db->group_by('stockcard.stock_matcode');
             $this->db->where('(stockcard.stock_type = "keyin" or stockcard.stock_type = "receive")');  
             $this->db->where("stockcard.createdate !=","");           
             $this->db->where("store.wh",$wh);             
             $query3 = $this->db->get('stockcard');
             $res = $query3->result_array();
             echo json_encode($res);

        }
        function get_mat_code_by_stock_on_in($matname = null){
             $this->db->select('stockcard.stock_matname,stockcard.stock_matcode');
             $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
             $this->db->join('project','stockcard.stock_project = project.project_id');
             $this->db->group_by('stockcard.stock_matname');
             $this->db->where('(stockcard.stock_type = "keyin" or stockcard.stock_type = "receive")');  
             $this->db->where("stockcard.createdate !=","");
             $this->db->where("stockcard.stock_matcode",$matname);
             $query1 = $this->db->get('stockcard'); 
             $res = $query1->result_array();
             echo json_encode($res);
        }
        function get_wh_in($project_id){
           $this->db->select('store.wh');
           $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
           $this->db->join('project','stockcard.stock_project = project.project_id'); 
           $this->db->group_by('store.wh');
           $this->db->where('(stockcard.stock_type = "keyin" or stockcard.stock_type = "receive")');  
           $this->db->where("stockcard.createdate !=","");
           $this->db->where("project.project_id",$project_id);
           $query2 = $this->db->get('stockcard');
            $res = $query2->result_array();
            echo json_encode($res);
        }
////////////////////////////////////////////////////////////////////stck card IN
////////////////////////////////////////////////////////////////////stck card OUT
        function get_stock_no_out($wh = null){

             $this->db->select('stockcard.stock_matcode,stock_matname,store.wh,stockcard.stock_type');
             $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
             $this->db->join('project','stockcard.stock_project = project.project_id'); 
             $this->db->group_by('stockcard.stock_matcode');
             $this->db->where('(stockcard.stock_type = "issue" or stockcard.stock_type = "transfer")');  
             $this->db->where("stockcard.createdate !=","");           
             $this->db->where("store.wh",$wh);             
             $query3 = $this->db->get('stockcard');
             $res = $query3->result_array();
             echo json_encode($res);

        }
        function get_mat_code_by_stock_on_out($matname = null){
             $this->db->select('stockcard.stock_matname,stockcard.stock_matcode');
             $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
             $this->db->join('project','stockcard.stock_project = project.project_id');
             $this->db->group_by('stockcard.stock_matname');
             $this->db->where('(stockcard.stock_type = "issue" or stockcard.stock_type = "transfer")');  
             $this->db->where("stockcard.createdate !=",""); 
             $this->db->where("stockcard.stock_matcode",$matname);
             $query1 = $this->db->get('stockcard'); 
             $res = $query1->result_array();
             echo json_encode($res);
        }
        function get_wh_out($project_id){
           $this->db->select('store.wh');
           $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
           $this->db->join('project','stockcard.stock_project = project.project_id'); 
           $this->db->group_by('store.wh');
           $this->db->where('(stockcard.stock_type = "issue" or stockcard.stock_type = "transfer")');   
           $this->db->where("stockcard.createdate !=","");
           $this->db->where("project.project_id",$project_id);
           $query2 = $this->db->get('stockcard');
            $res = $query2->result_array();
            echo json_encode($res);
        }
////////////////////////////////////////////////////////////////////stck card OUT
        function get_wh_store($project_id){
           $this->db->select('store.wh');
           $this->db->join('ic_proj_warehouse','store.store_project = ic_proj_warehouse.project_id');
           $this->db->join('project','project.project_id = store.store_project'); 
           $this->db->group_by('store.wh');
           $this->db->where("project.project_id",$project_id);
           $query2 = $this->db->get('store');

            $res = $query2->result_array();

            echo json_encode($res);

        }
        // function for report PO
        function get_po_vender($matname = null){
             $this->db->select('po_item.poi_matname,po_item.poi_matcode');
             $this->db->join('vender','po.po_venderid = vender.vender_id');
             $this->db->join('po_item','po.po_pono = po_item.poi_ref');
             $this->db->order_by('po.po_podate ASC');
             $this->db->where("vender.vender_name",$matname);
             $query4 = $this->db->get('po'); 
             $res = $query4->result_array();
             echo json_encode($res);
        }
         function get_po_vender_name($matname = null){
             $this->db->select('po_item.poi_matname,po_item.poi_matcode');
             $this->db->join('vender','po.po_venderid = vender.vender_id');
             $this->db->join('po_item','po.po_pono = po_item.poi_ref');
             $this->db->order_by('po.po_podate ASC');
             $this->db->where("po_item.poi_matcode",$matname);
             $query4 = $this->db->get('po'); 
             $res = $query4->result_array();
             echo json_encode($res);
        }
        function get_po_project($matname = null){
             $this->db->select('po_item.poi_matname,po_item.poi_matcode');
             $this->db->join('project','po.po_project = project.project_id');
             $this->db->join('po_item','po.po_pono = po_item.poi_ref');
             $this->db->order_by('po.po_podate ASC');
             $this->db->where("project.project_id",$matname);
             $query5 = $this->db->get('po'); 
             $res = $query5->result_array();
             echo json_encode($res);
        }
         function get_po_project_name($matname = null){
             $this->db->select('po_item.poi_matname,po_item.poi_matcode');
             $this->db->join('project','po.po_project = project.project_id');
             $this->db->join('po_item','po.po_pono = po_item.poi_ref');
             $this->db->order_by('po.po_podate ASC');
             $this->db->where("po_item.poi_matcode",$matname);
             $query5 = $this->db->get('po'); 
             $res = $query5->result_array();
             echo json_encode($res);
        }
// function for report
}
