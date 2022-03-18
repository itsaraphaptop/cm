<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lo_report extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }

        public function getdepartment()
        {
        $this->load->model('datastore_m');
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $projectid = $session_data['projectid'];
          $data['id'] = $this->uri->segment(3);
          $data['depart'] = $this->datastore_m->getdepartment();
          $this->load->view('office/purchase/main/report/load_department',$data);
        }
		public function lo_report_v()
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
                 
                 // echo $proid;
                        if ($t1!="" and $t2!="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from 1project join lo on lo.projectcode=project.project_id $where $proid and $memid and $t1 and $t2 group by projectcode");
                        }else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from 2project join lo on lo.projectcode=project.project_id $where $proid and $t1 and $t2 group by projectcode");
                        }else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from 3project join lo on lo.projectcode=project.project_id $where $memid and $t1 and $t2 group by projectcode");
                        }else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from project join lo on lo.projectcode=project.project_id $where $t1 and $t2 group by projectcode");
                        }else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from 5project join lo on lo.projectcode=project.project_id $where $proid and $memid and $t1 group by projectcode");
                        }else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from project join lo on lo.projectcode=project.project_id $where $proid and $memid group by projectcode");
                        }else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from project join lo on lo.projectcode=project.project_id $where $proid group by projectcode");
                        }else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from project join lo on lo.projectcode=project.project_id $where $memid group by projectcode");
                        }else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from project join lo on lo.projectcode=project.project_id group by projectcode");
                        }

                        if ($qm) {
                          $rm = $qm->result();
                        }else{
                          redirect('management/pettycash_report');
                        }

                        $n=1;
                        foreach ($rm as $e) {

                        echo
  '<style>
      .navbar-default{background:#28343A; color:#fff;}
            </style>

        </head>
        <style>

        body{background: #ddd;}
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

        .size-a4 { width: 8.3in; height: 11.7in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }
       .pdf-footer {
            position: relative;
            bottom: .2in;


            padding-top: 20px;


        }

        #example{margin-top: 80px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
    </style>

  <style>
p.double {border-style: double; padding: 6px 16px;}
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
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a href="../purchase_report/report_ol" type="button" class="btn btn-warning navbar-btn" ><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onClick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>
 
        </div><!--/.nav-collapse -->
      </div>
    </nav>'.		
    // '<div id="example" >'.
    //                 '<div class="page-container">'.
    //                 '<div class="pdf-page size-a4">'.
    //                 '<div class="pdf-header">'.
                        '<br><br>'.
                        '<h1 style="text-align: center;">Summay Contract and Billing by Project/Department  Report</h1> '.
                        '<h1 style="text-align: center;">'.$e->project_name.'</h1>'.
                        '<table class="table table-bordered table-xxs" style=" font-size: 13px;">'.
                          '<thead>'.
                            '<tr class="alpha-slate">'.
                              '<th>Date</th>'.
                              '<th>Doc No.</th>'.
                              '<th>job</th>'.
                              '<th>Vender</th>'.
                              '<th>Amount</th>'.
                              '<th>Contract Amt.</th>'.
                            '</tr>'.
                          '</thead>'.

                          '<tbody >';

                          if ($t1!="" and $proid!="" and $memid!="" and $t2!=""){
                            $qmm = $this->db->query("select * from lo join project on project.project_id=lo.projectcode where projectcode='$e->project_id' and $memid and $t1 and $t2");
                          }else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from lo join project on project.project_id=lo.projectcode where projectcode='$e->project_id' and $t1 and $t2");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from lo join project on project.project_id=lo.projectcode where projectcode='$e->project_id' and $memid and $t1 and $t2");
                          }else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from lo join project on project.project_id=lo.projectcode where projectcode='$e->project_id' and $t1 and $t2");
                          }else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from lo join project on project.project_id=lo.projectcode where projectcode='$e->project_id' and $memid and $t1");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                            $qmm = $this->db->query("select * from lo join project on project.project_id=lo.project where project='$e->project_id' and $memid");
                          }else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                            $qmm = $this->db->query("select * from lo join project on project.project_id=lo.projectcode where projectcode='$e->project_id'");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                            $qmm = $this->db->query("select * from lo join project on project.project_id=lo.projectcode where projectcode='$e->project_id' and $memid");
                          }else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                            $qmm = $this->db->query("select * from lo join project on project.project_id=lo.projectcode where projectcode='$e->project_id'");
                          }
                          $rmm = $qmm->result();
                          $tot=0;  foreach ($rmm as $ee) {
                            $de = $this->db->query("select * from lo_detail where lo_ref='$ee->lo_lono'");
                            $rd = $de->result();

                            $ven = $this->db->query("select * from vender where vender_id='$ee->subcontact'")->result();
                            foreach ($ven as $vvv) {
                            	$name_ven = $vvv->vender_name;
                            }
                        echo  '<tr >'.
                               '<td>'.$ee->lodate.'</td>'.
                               '<td>'.$ee->lo_lono.'</td>'.
                               '<td>'.$ee->jobtype.'</td>'.
                               '<td>'.$name_ven.'</td>'.
                               '<td>'.$ee->contactamount.'</td>'.
                               '<td>'.$ee->contactamount.'</td>';
                               foreach ($rd as $v) {
                          // echo '<td>'.number_format($v->netamt,2).'</td>';
                             }
                        echo  '</tr>';
                         }$tot=$tot+$ee->contactamount;
                        echo  '<tr>'.
                                '<td colspan="5" class="text-center">รวม</td>'.
                                '<td>'.number_format($tot,2).'</td>'.
                              '<tr>'.
                             '</tbody>'.

                          '</table>';
                        
                          // '<script>$("#dathone").html("<label>'.$dat.'</label>");</script>';
                        }
                        
                        $this->load->view('base/footer_v');
              } catch (Exception $e) {
                echo $e;
                // redirect('management/pettycash_report');
              }
        }
}