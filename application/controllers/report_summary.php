<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report_summary extends CI_Controller {
        public function __construct() {
            parent::__construct();
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
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid and $memid and $t1 and $t2 group by project");
                        }else if ($t1!="" and $t2!="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid and $t1 and $t2 group by project");
                        }else if ($t1!="" and $t2!="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $memid and $t1 and $t2 group by project");
                        }else if ($t1!="" and $t2!="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $t1 and $t2 group by project");
                        }else if ($t1!="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid and $memid and $t1 group by project");
                        }else if ($t1=="" and $t2=="" and $proid!="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid and $memid group by project");
                        }else if ($t1=="" and $t2=="" and $proid!="" and $memid==""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $proid group by project");
                        }else if ($t1=="" and $t2=="" and $proid=="" and $memid!=""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id $where $memid group by project");
                        }else if ($t1=="" and $t2=="" and $proid=="" and $memid==""){
                          $qm = $this->db->query("select * from project join pettycash on pettycash.project=project.project_id group by project");
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

        function DateThai($strDate)
        {
          $strYear = date("Y",strtotime($strDate))+543;
          $strMonth= date("n",strtotime($strDate));
          $strDay= date("j",strtotime($strDate));
          $strHour= date("H",strtotime($strDate));
          $strMinute= date("i",strtotime($strDate));
          $strSeconds= date("s",strtotime($strDate));
          $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
          $strMonthThai=$strMonthCut[$strMonth];
          return "$strDay $strMonthThai $strYear";
        }
        public function _summary_fifo()
        {

          $matcode = $this->uri->segment(3);
          $matcodeend = $this->uri->segment(4);
          $this->db->select('*');
          $this->db->order_by('stock_date','asc');
          $this->db->where('stock_matcode >=',$matcode);
          $this->db->where('stock_matcode <=',$matcodeend);
          $this->db->group_by('stock_matcode');
          $query = $this->db->get('stockcard');
          $get_fifo = $query->result();
          $this->load->view('navtail/base_master/header_v');
          foreach ($get_fifo as $k=> $ke) {
            // $matname = $value->stock_matname;
            // if ($k==1) {
            echo "<h2>".$ke->stock_matcode."-".$ke->stock_matname."</h2>";
            echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td>Stock Type</td><td>Stock Name</td><td>stock Date</td><td>QTY</td><td>Unit Price</td><td>Price</td><td>Total Qty</td><td>Total Price</td></tr></thead>";


          $tot = 0;
          $qty = 0;




$qq = $this->db->query("select * from stockcard where stock_matcode='$ke->stock_matcode'");
$fifo = $qq->result();
          foreach ($fifo as $value) {

            if ($value->stock_type=="issue") {
              $qty = $qty-$value->stock_qty;
              $tot = $tot-$value->stock_netamt;
                echo "<tbody><tr><td><span class='label label-primary'>".$value->stock_type."</span></td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".DateThai($value->stock_date)."</td><td>-".$value->stock_qty."</td><td>".$value->stock_priceunit."</td><td>-".$value->stock_netamt."</td><td>".$qty."</td><td>".$tot."</td></tr></tbody>";

            }else{
            $qty = $qty+$value->stock_qty;
            $tot = $tot+$value->stock_netamt;
              echo "<tr><td><span class='label label-primary'>".$value->stock_type."</span></td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".DateThai($value->stock_date)."</td><td>".$value->stock_qty."</td><td>".$value->stock_priceunit."</td><td>".$value->stock_netamt."</td><td>".$qty."</td><td>".$tot."</td></tr>";

            }

          }
echo "</table>";
          // }

}
        }

}
