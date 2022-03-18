<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'controllers/email.php';
class pr_active extends email {
public function __construct() {
parent::__construct();
$this->load->model('datastore_m');
// $this->load->Model('office_m');
$this->load->helper("my_parse_num");
$this->load->model('pr_m');
$this->load->helper('date');
$this->load->helper(array('form', 'url','file','line_alert','notify_message','line_oa_api'));
$this->load->library('image_lib');
}
public function newpr() {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $flag = $this->uri->segment(3);
    $tenid = $this->uri->segment(4);
    
    $add = $this->input->post();

      $module = 'PR';
      $module_type = '';
      $project = $add['projcode'];
      $input = date('m', strtotime($add['prdate']));
      

      $datestring = "Y";
      $m = "m";
      $d = "d";
      
      $count_row = $this->pr_m->npr_count_row($compcode,$add['projectid']);//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
      if ($count_row==0) {
        $count_row = 1;
        $pr_item = 1;
        $prno = $this->datastore_m->RunningNumber($module_type,$count_row,$input,$project,$module);
      }else{
        $run = $this->pr_m->ngetpr_num($input,$compcode,$add['projectid']);
       
            if (isset($run[0]['pr_prdate'])==$input) {
              if($run[0]['pr_prdate']<=10){
                $month = "0".$run[0]['pr_prdate'];
              }else{
                $month = $run[0]['pr_prdate'];

              }
              $count = $this->pr_m->cgetpr_num($input,$compcode,$add['projectid']);
              $x1 = $count+1;
              $pr_item = $count+1;
              $prno = $this->datastore_m->RunningNumber($module_type,$x1,$month,$project,$module);
            }else{
              $x1 = 1;
              $pr_item = 1;
              $dd = $input;
              $prno = $this->datastore_m->RunningNumber($module_type,$x1,$dd,$project,$module);
            }
        }
        // echo $prno;
        // die();
      $datestring = "Y";
       $mm = "m";
       $dd = "d";


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
      foreach($_FILES as $field_name => $file) {
        if (!$this->upload->do_upload($field_name)) {
          $error['upload'][] = $this->upload->display_errors();
        }else{
          $upload_data = $this->upload->data();
          if ( ! $this->image_lib->resize()) {
            $error['resize'][] = $this->image_lib->display_errors();
            echo "error";
          }else{
            $data['success'] = $upload_data;
            echo "OK Good";
            var_dump($_FILES);
            $select_file_pr = array(
            'name_file' => $upload_data['file_name'],
            'pr_ref' => $prno,
            'date' => date('y-m-d'),
            'time' => date('H:i:s'),
            'user' => $compcode,
            );
            $this->db->insert('select_file_pr',$select_file_pr);
          }
        }
      }         

   
    
      // if($add['chkbo'][$i] == "PR"){
      // if($add['chkprdetail']!=0){
      	// if($add['deliverydate'] == "" || $add['deliverydate'] == null){
      	// 	$add['deliverydate'] = "0000-00-00";
      	// }


        $data = array(
          'pr_prno' => $prno,
          'pr_item' => $pr_item,
          'pr_prdate' => $add['prdate'],
          'pr_project' => $add['projectid'],
          'pr_system' => $add['system'],
          'compcode' => $compcode,
          // 'pr_department' => $add['depid'],
          'pr_reqname' => $add['memname'],
          'pr_memid' => $add['memid'],
          'pr_costtype' => $add['costtype'],
          'pr_vender' => $add['venderidd'],
          'pr_delidate' =>  $add['deliverydate'],
          'pr_deliplace' => $add['place'],
          'pr_remark' => $add['remark'],
          'purchase_type'=>$add['pr_type'],
          'pr_approve' => $add['c_pr'],
          'express' => (isset($add['express'])) ? $add['express'] : 0,
          'useradd' => $username,
          'compcode' => $compcode,
          'usercreate' =>  date('Y-m-d H:i:s',now()),
          'subid' => $add['subid'],
          'subname' => $add['subname'],
          'wo' => $add['wo'],
        );
        $this->db->insert('pr',$data);
        $id  = $this->db->insert_id();
        
        for ($i=0; $i < count($add['qtyi']); $i++) {
          $data_d = array(
            'pri_matname' => $add['matnamei'][$i],
            'pri_matcode' => $add['matcodei'][$i],
            'pri_ref' => $prno,
            'pri_costcode' => $add['costcodei'][$i],
            'pri_costname' => $add['costnamei'][$i],
            'pri_qty' => parse_num($add['qtyi'][$i]),
            'pri_unit' => parse_num($add['uniti'][$i]),
            'pri_unitcode' => parse_num($add['unitiunitcode'][$i]),
            'datesend' => parse_num($add['datesend'][$i]),
            'pri_remark' => parse_num($add['remarki'][$i]),
            'pr_asset' => parse_num($add['statusass'][$i]),
            'pr_assetid' => parse_num($add['accode'][$i]),
            'pr_assetname' => parse_num($add['acname'][$i]),
            'pri_cpqtyic' => parse_num($add['cpqtyic'][$i]),
            'pri_pqtyic' => parse_num($add['pqtyic'][$i]),
            'pri_punitic' => parse_num($add['punitic'][$i]),
            'pri_uniticcode' => parse_num($add['unitiuniticcode'][$i]),
            'pri_amount' => parse_num($add['pamount'][$i]),
            'pri_priceunit' => parse_num(isset($add['pprice_unit'][$i])),
            'pri_discountper1' => parse_num($add['pdiscper1'][$i]),
            'pri_discountper2' => parse_num($add['pdiscper2'][$i]),
            'pri_discountper3' => parse_num($add['pdiscper3'][$i]),
            'pri_discountper4' => parse_num($add['pdiscper4'][$i]),
            'pri_pdiscex' => parse_num($add['pdiscex'][$i]),
            'pri_tovat' => parse_num($add['to_vat'][$i]),
            'pri_disamt' => parse_num($add['pdisamt'][$i]),
            'pri_vat' => parse_num($add['vatper'][$i]),
            'pri_netamt' => parse_num($add['pnetamt'][$i]),
            'compcode' => $compcode,
            'remark_mat' => $add['remark_mat'][$i],
            'pri_boqid' => $add['chkbowhere'][$i],
            'pri_boqrow' => $add['pri_boqrow'][$i],
            'cost_type' => $add['type'][$i],
            'boq_type' => $add['boq_type'][$i],
            'pri_status' => "no",
            'pri_project' => $add['projectid'],
          );
          // echo $data_d["pri_amount"];
          $this->db->insert('pr_item',$data_d);
          $this->db->select('po_count');
          $this->db->where('pr_prno',$prno);
          $tr = $this->db->get('pr');
          $rt = $tr->result();
          foreach ($rt as $ue) {
            $cc = $ue->po_count;
          }
          if ($cc=="") {
            $pocount = 1;
          }else{
            $pocount = $cc+1;
          }
          $po = array(
            'po_count' => $pocount
          );
          $this->db->where('pr_prno',$prno);
          $this->db->update('pr',$po);

          // $ct = array(
          //   'status_open' => "open"
          // );
          // $this->db->where('costtype_id',$add['costtype']);
          // $this->db->update('master_costtype',$ct);
        }
      // }
    
      if($add['a_pr']=="1"){
        for ($i=0; $i < count($add['approve_sequence']); $i++) {
          if($add['c_pr']=="wait"){
            $aprrove = array(
            'app_pr' => $prno,
            'app_project' => $add['projectid'],
            'app_sequence' => $add['approve_sequence'][$i],
            'app_midid' => $add['approve_mid'][$i],
            'app_midname' => strtolower($add['approve_mname'][$i]),
            'lock' => $add['approve_lock'][$i],
            'status' => "no",
            'type' => "P",
            'cost' => $add['approve_cost'][$i],
            'creatuser' => $username,
            'creatudate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode,
            );
            $this->db->insert('approve_pr',$aprrove);
          }
        }
      }else if($add['a_pr']=="2"){
        $this->db->select('*');
        $this->db->from('approve');
        $this->db->where('approve_project',$add['pjcode']);
        $this->db->where('type', "PR");
        $this->db->where('approve_cost >=',$add['sumpr']);
        $q = $this->db->get()->result();
        foreach ($q as $qq) {
          $aprrove = array(
          'app_pr' => $prno,
          'app_project' => $qq->approve_project,
          'app_sequence' => $qq->approve_sequence,
          'app_midid' => $qq->approve_mid,
          'app_midname' => strtolower($qq->approve_mname),
          'lock' => $qq->approve_lock,
          'status' => "no",
          'type' => "C",
          'cost' => $qq->approve_cost,
          'creatuser' => $username,
          'creatudate' => date('y-m-d'),
          'compcode' => $compcode,
          );
          $this->db->insert('approve_pr',$aprrove);
        }
      }
    
      
      // if ($flag=='d'){

      // }else{
        //if($add['chkprdetail']!=0){
          // if($add['a_pr']=="1"){
          for ($i=0; $i < count($add['approve_sequence']); $i++) {
            // if($add['c_pr']=="wait"){
              if($add['approve_sequence'][$i]=="1"){
                $pushID = $this->pr_m->getlineid($add['approve_mid'][$i],$compcode);
                // $approvename = $this->pr_m->getname($add['approve_mid'][$i],$compcode);
                // var_dump($add['approve_sequence'][$i]." ".$add['approve_mid'][$i]);
                // die();
                // $sequence = $add['approve_sequence'][$i];
              // }
             
            }
          }
        // }
         
          $message = "เอกสาร PR ใหม่ รออนุมัติ \n";
          $message .= "Doc No : {$prno} \n";
          $message .= "Remark : ".$add['remark']." \n";
          $message .= "Number of items : ".count($add['qtyi'])." \n";
          $message .= "----------------------------------------- \n";
          $n=1;
          for ($i=0; $i < count($add['qtyi']); $i++) {
            $message .= $i+$n.". ".$add['matnamei'][$i]." จำนวน ".parse_num($add['qtyi'][$i])." ". parse_num($add['uniti'][$i])." \n";
            $message .= "----------------------------------------- \n";
          }
         
          // $message .= "----------------------------------------- \n";
          $message .= "Created by : ". $username." \n";
          $message .= "Print Preview \n";
          $message .= base_url('report/viewerload?type=pr&typ=form&var1='.$x1.'&var2='.$prno.'&var3='.$compcode ) . " \n";
            if (isset($upload_data['file_name'])=="") {
              
            }else{
              $message .= "ไฟล์แนบ \n";
              $message .= base_url( 'select_file_pr/' . $upload_data['file_name'] ) . " \n";
              $message .= "----------------------------------------- \n";
            }
              // $message .= "-----------------------------------------\n";

          for ($j=0; $j < count($add['approve_sequence']); $j++) {

            $message .= "Approve คนที่: ".($j+1).". ".$this->pr_m->getname($add['approve_mid'][$j],$compcode)." \n";
          }
          // // $numapp = $this->pr_m->numpr();
         

          // // var_dump($numapp);
          // // die();
          // $message .= base_url('office/approve_pj_pr/'.$numapp.'/'.$prno.'/'.$add['pjcode'].'/'.$sequence.'/'.$add['projectid']);
          $message .= base_url('pr/pr_approve/'.$add['pjcode'].'/'.$add['projectid']);
          $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
          $line = $line_api_service[0]['line_api'];
          // echo $pushID[0]['m_name'];
          // die();
          $data = array( 
            "id" => $pushID[0]['lineid'],
            "type" =>"message",
            "text" => "Doc No. : ".$prno,
            "price" => $pushID[0]['m_name'],
            // "price" => $add['remark'],
            "pay" =>"3",
            "unit" =>"4",
            "doc" =>"5",
            "compcode_line" => "6",
            "user" =>"7",
            "link" => $line,
            "base_url" => base_url('pr/pr_approve/'.$add['pjcode'].'/'.$add['projectid'].'/'.$username.'/'.$prno)
    
        );
          line_oa_api($data,$line);
          // $res = notify_message($message,$pushID[0]['lineid']);

          
          $title_email = "{$prno} ใหม่ รออนุมัติ";
          $emailmassage = "เอกสาร PR ใหม่ รออนุมัติ <br/><br/> \n";
          $emailmassage .= "Doc No : {$prno} <br/><br/> \n";
          $emailmassage .= "Remark : ".$add['remark']." <br/><br/> \n";
          $emailmassage .= "Number of items : ".count($add['qtyi'])." <br/><br/> \n";
          $emailmassage .= "----------------------------------------- <br/><br/> \n";
          $n=1;
          for ($i=0; $i < count($add['qtyi']); $i++) {
            $emailmassage .= $i+$n.". ".$add['matnamei'][$i]." จำนวน ".parse_num($add['qtyi'][$i])." ". parse_num($add['uniti'][$i])." <br/><br/> \n";
            $emailmassage .= "----------------------------------------- <br/><br/> \n";
          }
         
          // $emailmassage .= "----------------------------------------- <br/><br/> \n";
          $emailmassage .= "Created by : ". $username." <br/><br/> \n";
          $emailmassage .= "Print Preview <br/><br/> \n";
          $emailmassage .= base_url('report/viewerload?type=pr&typ=form&var1='.$x1.'&var2='.$prno.'&var3='.$compcode ) . " <br/><br/> \n";
            if (isset($upload_data['file_name'])=="") {
              
            }else{
              $emailmassage .= "ไฟล์แนบ <br/><br/> \n";
              $emailmassage .= base_url( 'select_file_pr/' . $upload_data['file_name'] ) . " <br/><br/> \n";
              $emailmassage .= "----------------------------------------- <br/><br/> \n";
            }
              // $emailmassage .= "-----------------------------------------\n";

          for ($j=0; $j < count($add['approve_sequence']); $j++) {

            $emailmassage .= "Approve คนที่: ".($j+1).". ".$this->pr_m->getname($add['approve_mid'][$j],$compcode)." <br/><br/> \n";
          }
          // // $numapp = $this->pr_m->numpr();
         

          // // var_dump($numapp);
          // // die();
          // $emailmassage .= base_url('office/approve_pj_pr/'.$numapp.'/'.$prno.'/'.$add['pjcode'].'/'.$sequence.'/'.$add['projectid']);
          $emailmassage .= base_url('pr/pr_approve/'.$add['pjcode'].'/'.$add['projectid']);


          // $this->_sendmail($pushID[0]['m_email'],$title_email,$emailmassage);
          // line_alert($pushID[0]['lineid'],$message);
          // $token = "Fl2zcvq93jag1UwxlGX0OH0RWH3tltxqtjMpGkJsQI3"; //ใส่Token ที่copy เอาไว้
          // $str = "Sourcework Test Line Notify API Itsaraphap"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
          
        
          // echo $pushID[0]['lineid'];
          redirect('pr/editpr/'.$prno.'/p'.'/'.$add['projectid']);

        //}else{
          
        //redirect('office/newpr/'.$add['projectid'].'/p');
        //}
      // }      


    // } catch (Exception $e) {
    //   return $e;
    // }
}

public function edt_prdetail()
{
// edit vvbvb
  $id = $this->uri->segment(3);
  $pr_ref = $this->input->post('ref');
$add = $this->input->post();


$data = array(
'pri_matname' => $this->input->post('matname'),
'pri_matcode' => $this->input->post('matcode'),
'pri_costname' => $this->input->post('cname'),
'pri_costcode' => $this->input->post('ccode'),
'pri_qty' => parse_num($this->input->post('qty')),
'pri_unit' => $this->input->post('unit'),
'pri_unitcode' => $this->input->post('unitcode'),
'datesend' => $this->input->post('datesend'),
'pri_remark' => $this->input->post('remark'),
'pr_asset' => $this->input->post('statusass'),
'pr_assetid' => $this->input->post('accode'),
'pr_assetname' => $this->input->post('acname'),
'pri_cpqtyic' => parse_num($this->input->post('cpqtyic')),
'pri_pqtyic' => parse_num($this->input->post('pqtyic')),
'pri_punitic' => parse_num($this->input->post('punitic')),
'pri_uniticcode' => $this->input->post('uniticcode'),
'pri_priceunit' => parse_num($this->input->post('pprice_unit')),
'pri_amount' => parse_num($this->input->post('pamount')),
'pri_discountper1' => parse_num($this->input->post('pdiscper1')),
'pri_discountper2' => parse_num($this->input->post('pdiscper2')),
'pri_discountper3' => parse_num($this->input->post('pdiscper3')),
'pri_discountper4' => parse_num($this->input->post('pdiscper4')),
'pri_pdiscex' => parse_num($this->input->post('pdiscex')),
'pri_disamt' => parse_num($this->input->post('pdisamt')),
'pri_vat' => parse_num($this->input->post('vatper')),
'pri_tovat' => parse_num($this->input->post('to_vat')),
'pri_netamt' => parse_num($this->input->post('pnetamt')),
'pri_netamt' => parse_num($this->input->post('pnetamt')),
'remark_mat' => parse_num($this->input->post('remark_mat')),
);
$this->db->where('pri_id',$id);
$this->db->where('pri_project',$this->input->post('pjid'));
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
public function approve_pr()
{
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
$compcode = $session_data['compcode'];
$position = $session_data['m_position'];
$prno = $this->input->post('prno');
switch ($position) {
case '1':
$data = array(
'pr_approve' => "approve",
'approve_date' => date('Y-m-d',now()),
'director_approve' => $username,
'compcode' => $compcode
);
$this->db->where('pr_prno',$prno);
  if ($this->pr_m->approve($data)) {
    echo $prno;
    return true;
  }else{
    return false;
  }
break;
case '2':
$data = array(
'pr_approve' => "approve",
'approve_date' => date('Y-m-d',now()),
'pe_approve' => $username,
'compcode' => $compcode
);
$this->db->where('pr_prno',$prno);
if ($this->pr_m->approve($data)) {
echo $prno;
return true;
}else{
return false;
}
break;
case '5':
$data = array(
'pr_approve' => "pmapprove",
'approve_date' => date('Y-m-d',now()),
'pe_approve' => $username,
'compcode' => $compcode
);
$this->db->where('pr_prno',$prno);
if ($this->pr_m->approve($data)) {
echo $prno;
return true;
}else{
return false;
}
break;
}
}
public function cancel_pr()
{
  // $session_data = $this->session->userdata('sessed_in');
  //  $username = $session_data['username'];
//   $compcode = $session_data['compcode'];
  // $prno = $this->input->post('prno');
  //  $data = array(
//       'pr_approve' => "wait",
//       'approve_date' => date('Y-m-d',now()),
//       'pe_approve' => $username,
//       'compcode' => $compcode
//       );
//   $this->db->where('pr_prno',$prno);
  // if ($this->pr_m->approve($data)) {
    //  echo $prno;
    //  return true;
  // }else{
    //  return false;
  // }
$session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
$compcode = $session_data['compcode'];
$position = $session_data['m_position'];
$prno = $this->input->post('prno');
$pr = $this->uri->segment(3);
switch ($position) {
case '1':
$data = array(
'pr_approve' => "no",
'approve_date' => date('Y-m-d',now()),
'director_approve' => $username,
'compcode' => $compcode
);
$this->db->where('pr_prno',$prno);
$this->db->update('pr',$data);
$datad = array(
'status' => "no"
);
$this->db->where('app_pr',$pr);
$this->db->update('approve_pr',$datad);
break;
case '2':
$data = array(
'pr_approve' => "no",
'approve_date' => date('Y-m-d',now()),
'pe_approve' => $username,
'compcode' => $compcode
);
$this->db->where('pr_prno',$prno);
$this->db->update('pr',$data);
$datad = array(
'status' => "no"
);
$this->db->where('app_pr',$pr);
$this->db->update('approve_pr',$datad);
break;
case '5':
$data = array(
'pr_approve' => "no",
'approve_date' => date('Y-m-d',now()),
'pe_approve' => $username,
'compcode' => $compcode
);
$this->db->where('pr_prno',$prno);
$this->db->update('pr',$data);
$datad = array(
'status' => "no"
);
$this->db->where('app_pr',$pr);
$this->db->update('approve_pr',$datad);
break;
}
}
public function disapprove_pr()
{
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
$compcode = $session_data['compcode'];
  $prno = $this->input->post('prno');
  $data = array(
'pr_approve' => "disapprove",
'pr_disremark' => $this->input->post('remark'),
'approve_date' => date('Y-m-d',now()),
'pe_approve' => $username,
'compcode' => $compcode
);
$this->db->where('pr_prno',$prno);
  if ($this->pr_m->approve($data)) {
    echo $prno;
    return true;
  }else{
    return false;
  }
  return true;
}
  public function ajax_upload()
  {
    $datestring = "Y";
    $m = "m";
    $d = "d";
    $res = $this->pr_m->pr_count_row();
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $pr = './select_file_pr';
		mkdir($pr, 0700, true);
    if (isset($_FILES['styled_file']['name'])) {
    $config['upload_path'] = './select_file_pr/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|rar|docx|xls|pdf|zip|xlsx';
    $config['max_size'] = '204800';
    $config['max_width']  = '9999';
    $config['max_height']  = '9999';
    $rand = rand(1111,9999);
    $date= date("Y-m-d ");
    $config['file_name']  = $date.$rand;
    $error = array();
    $success = array();
    $this->load->library('upload', $config);
    $prno = $this->input->post('pr_ref');
    foreach($_FILES as $field_name => $file)
    {
    if ( ! $this->upload->do_upload($field_name))
    {
    $error['upload'][] = $this->upload->display_errors();
    }else{
    $upload_data = $this->upload->data();
    if ( ! $this->image_lib->resize())
    {
    $error['resize'][] = $this->image_lib->display_errors();
    }else{
    $data['success'] = $upload_data;
    $select_file_pr = array(
    'name_file' => $upload_data['file_name'],
    'pr_ref' => $prno,
    'date' => date('y-m-d'),
    'time' => date('H:i:s'),
    'user' => $compcode,
    );
    $query = $this->db->insert('select_file_pr',$select_file_pr);
    }
    }
    }
    }else{
    echo "ไม่มีไฟล์";
    }
  }
  

    public function query_job()
      {
        $decode = $this->input->post('decode');
        $procode = $this->input->post('procode');
        $jj = $this->db->query("SELECT * from project_item join system on system.systemcode = project_item.projectd_job where project_code = '$procode'")->result();

        if ($decode == "") {
            if ($procode) {
            // echo $procode;
            echo '<select class="form-control" id="jobcode" name="jobcode">';

            foreach ($jj as $job) {
            echo '<option value="'.$job->projectd_job.'">'.$job->systemname.'</option>';
            }
            echo '</select>';
            return true;
           }else{
            echo '<select class="form-control" id="jobcode" name="jobcode">'.
                '<option value="1">Overhead</option>'.
          '</select>';
           }       
          return true;
        }       
        else
        {
          return false;
        }
          return true;
      }

        public function testpr() {
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $username = $session_data['username'];
    $year = date('Y');
        $mount = date('m');
        $modal="pr";
    $count = $this->pr_m->countpr_waitpro($year,$mount,$compcode,$modal);
    foreach ($count as $key => $value) {
      $bi_wait = $value->bi_wait;
      $wait = $value->wait;
    }
    if ($wait == 0) {
    $view = array(
          'bi_modal'    => "pr",
          'compcode'    => $compcode,
          'bi_year'     => $year,
          'bi_month'    => $mount,
          'bi_wait'     => 1,
          'bi_status'     => "wait",
        );
        $this->db->insert('bi_views_project',$view);
    }else{
    $view = array(
          'bi_modal'    => "pr",
          'compcode'    => $compcode,
          'bi_year'     => $year,
          'bi_month'    => $mount,
          'bi_wait'     => @$bi_wait+1,
        );
    $this->db->where('bi_status',"wait");
        $this->db->where('bi_modal',$modal);
        $this->db->where('bi_month',$mount);
        $this->db->where('bi_year',$year);
    $this->db->update('bi_views_project',$view);
    }
  }

  public function save_booking(){
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $username = $session_data['username'];
    $booking = $this->input->post();
    
    $data_header = [];
    $data_header = array(
            "pb_no"  => $booking["pb_no"],
            "to_project" => $booking["project_id"],
            "pb_date" => $booking['pbdate'],
            "pb_delivery" => $booking['deliverydate'],
            "pb_system" => $booking['system'],
            "pb_member" => $booking['memid'],
            "pb_remark" => $booking['remark'],
            "pb_approve" => $booking['c_bk'],
            "pb_status"  => "enable",
            "pb_compcode" => $compcode,
            "pb_useradd" => $username,
            "address"  => $booking['place'],
            "createdate" => $booking['pbdate']
      );

    // var_dump($data_header);

    $this->db->insert('pb_booking',$data_header);
    $data_detail = [];
    foreach ($booking['mat_code'] as $key => $data) {

          var_dump($data);
          $data_detail = array(
            "ref_no" => $booking["pb_no"],
            "mat_code" => $booking['mat_code'][$key],
            "mat_name" => $booking['mat_name'][$key],
            "costcode" => $booking['cost_code'][$key],
            "costname" => $booking['cost_name'][$key],
            "qty" => $booking['qty'][$key],
            "unit" => $booking['unit'][$key],
            "compcode" => $compcode,
            "wh" => $booking['wh'][$key],
            "qty_total" => $booking['qty'][$key],
            "unit" => $booking['unit'][$key],
            "priceunit" => $booking['unitprice'][$key],
            "store_id" => $booking['pj_id'][$key]
          );


          $data_store = array(
            "store_qty" => ($booking['qty_max'][$key]-$booking['qty'][$key])*1,
            "store_total" => ($booking['qty_max'][$key]-$booking['qty'][$key])*1,
            "unbooking" => $booking['qty'][$key]
          );
          
          $this->db->where("store_matcode",$booking['mat_code'][$key]);
          $this->db->where("store_project",$booking['pj_id'][$key]);
          $this->db->where("wh",$booking['wh'][$key]);
          $res_query = $this->db->update("store",$data_store);


            
          $data_update_pb = array(
            "from_project" => $booking['pj_id'][$key]
          );

          $this->db->where("pb_no",$booking["pb_no"]);
          $res_update_pb = $this->db->update("pb_booking",$data_update_pb);

          $query = $this->db->insert('pb_booking_item',$data_detail);
        }

        for ($i=0; $i < count($booking['approve_sequence']); $i++) {
          if($booking['c_bk']=="wait"){
            $aprrove = array(
            'app_pr' => $booking["pb_no"],
            'app_project' => $booking['pjcode'],
            'app_sequence' => $booking['approve_sequence'][$i],
            'app_midid' => $booking['approve_mid'][$i],
            'app_midname' => strtolower($booking['approve_mname'][$i]),
            'lock' => $booking['approve_lock'][$i],
            'status' => "no",
            'type' => "P",
            'creatuser' => $username,
            'creatudate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode,
            );
            $this->db->insert('approve_bk',$aprrove);
          }
        }
        redirect('index.php/pr/openproject');
  }
  public function sentmail(){
    $e = "itsaraphap@outlook.com";
    $this->_sendmail($e);
  } 
  public function cancel_pr_new(){
		$id = $this->uri->segment(3);
		$id1 = $this->uri->segment(4);
		$id2 = $this->uri->segment(5);
		$id3 = $this->uri->segment(6);
    $pochk = $this->pr_m->chkpoopen($id3);
		$data = array(
			'pr_approve' => "wait",
		);
		$this->db->where('pr_prid', $id);
		$q = $this->db->update('pr', $data);
		$datad = array(
			'status' => "no",
		);
		$this->db->where('app_pr', $id3);
		$this->db->update('approve_pr', $datad);
		if ($q) {
			redirect('pr/pr_approve/' . $id2 . "/" . $id1);
		}
	}
}



// array(18) {
//   ["pb_no"]=>
//   string(12) "PB2017120001"
//   ["memname"]=>
//   string(13) "Administrator"
//   ["memid"]=>
//   string(3) "241"
//   ["project_name"]=>
//   string(12) "Store Center"
//   ["project_id"]=>
//   string(1) "6"
//   ["depname"]=>
//   string(0) ""
//   ["remark"]=>
//   string(15) "ๆไำๆห"
//   ["pbdate"]=>
//   string(10) "2017-12-04"
//   ["deliverydate"]=>
//   string(10) "2018-04-28"
//   ["system"]=>
//   string(1) "1"
//   ["place"]=>
//   string(12) "Store Center"
//   ["wh"]=>
//   array(1) {
//     [0]=>
//     string(3) "001"
//   }
//   ["mat_code"]=>
//   array(1) {
//     [0]=>
//     string(14) "P0100100401001"
//   }
//   ["mat_name"]=>
//   array(1) {
//     [0]=>
//     string(44) "ดินลูกรัง   P0100100401001"
//   }
//   ["cost_code"]=>
//   array(1) {
//     [0]=>
//     string(9) "201201002"
//   }
//   ["cost_name"]=>
//   array(1) {
//     [0]=>
//     string(21) "Block work and Lintel"
//   }
//   ["qty"]=>
//   array(1) {
//     [0]=>
//     string(2) "12"
//   }
//   ["unit"]=>
//   array(1) {
//     [0]=>
//     string(11) "ลบ.ม."
//   }
// }