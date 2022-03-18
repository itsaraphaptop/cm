<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class datastore_active extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('datastore_m');
            $this->load->helper('date');
            $this->load->model('master_m');
            $this->load->library( 'image_lib' );

        }
        public function addocontract()
        {
          $data = array(
            'subcon_project' => $this->input->post('projid'),
            'subcon_code' => $this->input->post('code'),
            'subcon_name' => $this->input->post('name'),
            'createuser' => $username,
            'createdate' => date('Y-m-d H:i:s',now()),
            );
          if($this->db->insert('master_contractor',$data)){
            return true;
          }
        }
  public function addvender()
    {
    	$data = array(
    	'vender_code' => $this->input->post('vcode'),
    	'vender_name' => $this->input->post('vname'),
    	'vender_address' => $this->input->post('vaddr'),
    	'vender_tel' => $this->input->post('vtel'),
    	'vender_tax' => $this->input->post('vfax'),
    	'vender_credit' => $this->input->post('vcr'),
    	'vender_sale' => $this->input->post('vsale'),
    	'vender_worktype' => $this->input->post('vbusiness')

    	);
    	if($this->db->insert('vender',$data))
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    public function addcosttype()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $data = array(
        'ctype_code' => $this->input->post('typecode'),
        'ctype_name' => $this->input->post('typename'),
        'user' => $username,
        'compcode' => $compcode
      );
      if($this->db->insert('cost_type',$data))
      {
        redirect('index.php/data_master/setupcostcode');
      }else {
        return false;
      }

    }
    public function addcosttype_new()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $res = array();
      $data = array(
        'ctype_code' => $this->input->post('type_code'),
        'ctype_name' => $this->input->post('type_name'),
        'user' => $username,
        'compcode' => $compcode
      );
      if($this->db->insert('cost_type',$data))
      {
        $res['status'] = true;
        // redirect('index.php/data_master/setupcostcode');
      }else {
        $res['status'] = false;
        $res['message'] = 'sql insert error';
      }

      echo json_encode($res);
    }

    public function addcosttype_new_costsub()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $res = array();
      $data = array(
        'ctype_code' => $this->input->post('type_code'),
        'ctype_name' => $this->input->post('type_name'),
        'user' => $username,
        'compcode' => $compcode
      );
     $this->db->insert('cost_type',$data);
    }

    public function editcosttype()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $id = $this->input->post('typecode');
      $data = array(
        'ctype_name' => $this->input->post('typename'),
        'user' => $username
      );
      $this->db->where('ctype_code',$id);
      if($this->db->update('cost_type',$data))
      {
        redirect('index.php/data_master/setupcostcode');
      }else {
        return false;
      }
    }
    public function del_costtypecode()
    {
      $id = $this->uri->segment(3);
        if($this->db->delete('cost_type', array('ctype_id' => $id)))
        {
          redirect('index.php/data_master/setupcostcode');
        }else {
          return false;
        }

    }
    public function addcostgroup()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $typecode = $this->input->post('typecode');
      $data = array(
        'cgroup_code' => $this->input->post('groupcode'),
        'cgroup_name' => $this->input->post('groupname'),
        'ctype_code' => $this->input->post('typecode'),
        'user' => $username,
        'compcode' => $compcode
      );
      if($this->db->insert('cost_group',$data))
      {
        redirect('/index.php/data_master/setupcostgroupcode/'.$typecode);
      }else {
        return false;
      }

    }
    public function editcostgroup()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $id = $this->input->post('groupcode');
      $data = array(
        'cgroup_name' => $this->input->post('groupname'),
        'user' => $username
      );
      $this->db->where('cgroup_code',$id);
      if($this->db->update('cost_group',$data))
      {
        redirect('index.php/data_master/setupcostcode');
      }else {
        return false;
      }
    }
    public function del_costgroupcode()
    {
      $id = $this->uri->segment(3);
      $code =  $this->uri->segment(4);
        if($this->db->delete('cost_group', array('cgroup_id' => $id)))
        {
          $this->db->delete('cost_subgroup',array('cgroup_code' => $code));
          redirect('index.php/data_master/setupcostcode');
        }else {
          return false;
        }

    }
    public function addcostsubgroup()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $typecode = $this->input->post('typecode');
      $groupcode = $this->input->post('groupcode');
      $data = array(
        'cgroup_code' => $this->input->post('groupcode'),
        'csubgroup_code' => $this->input->post('subgroupcode'),
        'csubgroup_name' => $this->input->post('subgroupname'),
        'ctype_code' => $this->input->post('typecode'),
        'accno' => $this->input->post('accno'),
        'accname' => $this->input->post('accountname'),
        'user' => $username,
        'compcode' => $compcode
      );
      if($this->db->insert('cost_subgroup',$data))
      {
        redirect('/index.php/data_master/setupcostsubgroupcode/'.$typecode.'/'.$groupcode);
      }else {
        return false;
      }

    }
    public function editcostsubgroup()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $id = $this->input->post('subgroupcode');
      $typecode = $this->uri->segment(4);
      $groupcode = $this->uri->segment(3);
      $data = array(
        'csubgroup_name' => $this->input->post('subgroupname'),
        'accno' => $this->input->post('eaccno'),
        'accname' => $this->input->post('eaccountname'),
        'user' => $username
      );
      $this->db->where('csubgroup_code',$id);
      if($this->db->update('cost_subgroup',$data))
      {
        redirect('index.php/data_master/setupcostsubgroupcode/'.$typecode.'/'.$groupcode);
      }else {
        return false;
      }
    }
    public function del_costsubgroupcode()
    {
      $id = $this->uri->segment(3);
      $typecode = $this->uri->segment(5);
      $groupcode = $this->uri->segment(4);
        if($this->db->delete('cost_subgroup', array('csubgroup_id' => $id)))
        {
          redirect('index.php/data_master/setupcostsubgroupcode/'.$typecode.'/'.$groupcode);
        }else {
          return false;
        }

    }
    public function addnewdebtor()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];

      try {
        $datestring = "Y";
         $mm = "m";
         $dd = "d";

         $this->db->select('*');
         $qu = $this->db->get('debtor');
         $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

         if ($res==0) {
           $debtorccode = "DEB"."000"."1";
         }else{
           $this->db->select('*');
           $this->db->order_by('debtor_id','desc');
           $this->db->limit('1');
           $q = $this->db->get('debtor');
           $run = $q->result();
           foreach ($run as $valx)
           {
             $x1 = $valx->debtor_id+1;
           }
           if ($x1<=9) {
              $debtorccode = "DEB"."000".$x1;
           }
           elseif ($x1<=99) {
             $debtorccode = "DEB"."00".$x1;
           }
           elseif ($x1<=999) {
             $debtorccode = "DEB"."0".$x1;
           }

         }
         $data = array(
         'debtor_code' => $debtorccode,
         'debtor_size' => $this->input->post('bizsize'),
         'debtor_status' => $this->input->post('bizstatus'),
         'debtor_worktype' => $this->input->post('vbusiness'),
         'debtor_tax' => $this->input->post('vtexid'),
         'debtor_taxtype' => $this->input->post('vtextype'),
         'debtor_name' => $this->input->post('vname'),
         'debtor_address' => $this->input->post('vaddr'),
         'debtor_tel' => $this->input->post('vtel'),
         'debtor_fax' => $this->input->post('vfax'),
         'debtor_credit' => $this->input->post('vcr'),
         'debtor_sale' => $this->input->post('vsale'),
         'compcode' => $compcode
         );
         if($this->db->insert('debtor',$data))
         {
           redirect('data_master/edit_debtor/'.$debtorccode);
         }else {
           return false;
         }

      } catch (Exception $e) {
        echo $e;
      }
    }
    public function editnewdebtor()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $username = $session_data['username'];
      $debcode = $this->input->post('debcode');
      try {
        $data = array(
        'debtor_size' => $this->input->post('bizsize'),
        'debtor_status' => $this->input->post('bizstatus'),
        'debtor_worktype' => $this->input->post('vbusiness'),
        'debtor_tax' => $this->input->post('vtexid'),
        'debtor_taxtype' => $this->input->post('vtextype'),
        'debtor_name' => $this->input->post('vname'),
        'debtor_address' => $this->input->post('vaddr'),
        'debtor_tel' => $this->input->post('vtel'),
        'debtor_fax' => $this->input->post('vfax'),
        'debtor_credit' => $this->input->post('vcr'),
        'debtor_sale' => $this->input->post('vsale'),
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s',now()),
        );
        $this->db->where('debtor_code',$debcode);
        $this->db->where('compcode',$compcode);
        if ($this->db->update('debtor',$data)) {
          redirect('data_master/setup_debtor');
        }else{
          return false;
        }
      } catch (Exception $e) {
        echo $e;
      }
    }
    public function del_debtor()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $debcode = $this->uri->segment(3);
      if($this->db->delete('debtor', array('debtor_code' => $debcode)))
      {
        redirect('data_master/setup_debtor');
      }else{
        return false;
      }

    }
    public function del_accchart()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $username = $session_data['username'];
      $debcode = $this->uri->segment(3);
      $data = array(
        'act_status' => "del",
        'deldate' => date('Y-m-d H:i:s',now()),
        'userdel' => $username,
      );
      $this->db->where('act_id',$debcode);
      if($this->db->update('account_total',$data))
      {
        redirect('data_master/accchart_list');
      }else{
        return false;
      }

    }
    public function addnewacc()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $username = $session_data['username'];
      $data = array(
        'act_code' => $this->input->post('acccode'),
        'act_name' => $this->input->post('acc_name'),
        'act_header' => $this->input->post('act_header'),
        'act_status' => $this->input->post('accstatus'),
        'act_acc_h' => $this->input->post('actcode'),
        'act_clost' => $this->input->post('act_closcose'),
        'useradd' => $username,
        'createdate' => date('Y-m-d H:i:s',now()),
        'compcode' => $compcode,
      );
      if($this->db->insert('account_total',$data))
      {
        redirect('data_master/accchart_list');
      }else{
        return false;
      }

    }
 public function editacc()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $username = $session_data['username'];
      $id = $this->uri->segment(3);
      $data = array(
        'act_code' => $this->input->post('acccode'),
        'act_name' => $this->input->post('act_name'),
        'act_header' => $this->input->post('act_header'),
        'act_status' => $this->input->post('accstatus'),
        'act_acc_h' => $this->input->post('actcode'),
        'act_clost' => $this->input->post('act_closcose'),
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s',now()),
      );
      $this->db->where('act_id',$id);
      if($this->db->update('account_total',$data))
      {
        redirect('data_master/accchart_list');
      }else{
        return false;
      }

    }
    public function addnewvender()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];

      try {
        $datestring = "Y";
         $mm = "m";
         $dd = "d";

         $this->db->select('*');
         $qu = $this->db->get('vender');
         $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

         if ($res==0) {
           $vendercode = "V"."000"."1";
         }else{
           $this->db->select('*');
           $this->db->order_by('vender_id','desc');
           $this->db->limit('1');
           $q = $this->db->get('vender');
           $run = $q->result();
           foreach ($run as $valx)
           {
             $x1 = $valx->vender_id+1;
           }
           if ($x1<=9) {
              $vendercode = "V"."000".$x1;
           }
           elseif ($x1<=99) {
             $vendercode = "V"."00".$x1;
           }
           elseif ($x1<=999) {
             $vendercode = "V"."0".$x1;
           }

         }
$cut = array("\n", "\r","\"","'");
$place = array(" "," "," "," ");
        if ($this->input->post('vender_type') == "external") {
          $data = array(
         'vender_code' => $vendercode,
         'vender_size' => $this->input->post('bizsize'),
         'vender_status' => $this->input->post('bizstatus'),
         'vender_worktype' => $this->input->post('vbusiness'),
         'vender_tax' => $this->input->post('vtexid'),
         'vender_taxtype' => $this->input->post('vtextype'),
         'vender_name' => str_ireplace($cut, $place,$this->input->post('vname')),
         'vender_address' => str_ireplace($cut, $place,$this->input->post('vaddr')),
         'vender_mobile' => $this->input->post('mobile'),
         'vender_tel' => $this->input->post('vtel'),
         'vender_fax' => $this->input->post('vfax'),
         'vender_credit' => $this->input->post('vcr'),
         'vender_sale' => $this->input->post('vsale'),
         'accno' => $this->input->post('accno'),
         'accname' => $this->input->post('accountname'),
         'vender_type' => $this->input->post('vender_type'),
         'vat' => $this->input->post('vat'),
         'branch_type' => $this->input->post('branch'),
         'branch_name' => $this->input->post('txt_branch'),
         'vender_remark' => $this->input->post('remark'),
         'compcode' => $compcode,
         'useradd' => $username,
         'createdate' => date('Y-m-d H:i:s',now())
         );
         if($this->db->insert('vender',$data))
         {
           redirect('data_master/edit_vender/'.$vendercode);
         }else {
           return false;
         }
        }else{
           $datam = array(
          'm_vender' => 'Y'
        );
         $this->db->where('m_id',$this->input->post('memid'));
          $this->db->update('member',$datam);
          $data = array(
         'vender_code' => $vendercode,
         'vender_size' => $this->input->post('bizsize'),
         'vender_status' => $this->input->post('bizstatus'),
         'vender_worktype' => $this->input->post('vbusiness'),
         'vender_tax' => $this->input->post('vtexid'),
         'vender_taxtype' => $this->input->post('vtextype'),
         'vender_name' => $this->input->post('mname'),
         'vender_address' => $this->input->post('vaddr'),
         'vender_tel' => $this->input->post('vtel'),
         'vender_fax' => $this->input->post('vfax'),
         'vender_credit' => $this->input->post('vcr'),
         'vender_sale' => $this->input->post('vsale'),
         'accno' => $this->input->post('accno'),
         'accname' => $this->input->post('accountname'),
         'vender_type' => $this->input->post('vender_type'),
         'vat' => $this->input->post('vat'),
         'compcode' => $compcode,
         'useradd' => $username,
         'createdate' => date('Y-m-d H:i:s',now())
         );
         if($this->db->insert('vender',$data))
         {
           redirect('data_master/edit_vender/'.$vendercode);
         }else {
           return false;
         }
        }


      } catch (Exception $e) {
        echo $e;
      }
    }
    public function editnewvender()
    {

      $cut = array("\n", "\r","\"","'");
      $place = array(" "," "," "," ");
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $username = $session_data['username'];
      $vencode = $this->input->post('vencode');
      $input = $this->input->post();
      // echo '<pre>';
      // print_r($input);die();
      try {
        $data = array(
        'vender_size' => $this->input->post('bizsize'),
        'vender_status' => $this->input->post('bizstatus'),
        'vender_worktype' => $this->input->post('vbusiness'),
        'vender_tax' => $this->input->post('vtexid'),
        'vender_taxtype' => $this->input->post('vtextype'),
        'vender_type' => $this->input->post('vender_type'),
        'vender_name' => str_ireplace($cut, $place,$this->input->post('vname')),
        'vender_address' => str_ireplace($cut, $place,$this->input->post('vaddr')),
        'vender_mobile' => $this->input->post('mobile'),
        'vender_tel' => $this->input->post('vtel'),
        'vender_fax' => $this->input->post('vfax'),
        'vender_credit' => $this->input->post('vcr'),
        'vender_sale' => $this->input->post('vsale'),
        'accno' => $this->input->post('accno'),
        'accname' => $this->input->post('accountname'),
        'vat' => $this->input->post('vat'),
         'branch_type' => $this->input->post('branch'),
         'branch_name' => $this->input->post('txt_branch'),
         'vender_remark' => $this->input->post('remark'),
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s',now()),
        );

        // echo '<pre>';
        // print_r($data);die();
        $this->db->where('vender_code',$vencode);
        $this->db->where('compcode',$compcode);
        if ($this->db->update('vender',$data)) {
          redirect('data_master/vender_list');
        }else{
          return false;
        }
      } catch (Exception $e) {
        echo $e;
      }
    }
    public function del_vender()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $vencode = $this->uri->segment(3);
      if($this->db->delete('vender', array('vender_code' => $vencode)))
      {
        redirect('data_master/vender_list');
      }else{
        return false;
      }

    }
    public function addbank()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $data = array(
        'bank_code'=> $this->input->post('bankcode'),
        'bank_name'=> $this->input->post('bankname'),
        'bank_addr'=> $this->input->post('bankaddr'),
        'user_add' => $username,
        'createdate' => date('Y-m-d H:i:s',now()),
        'compcode' => $compcode
      );
      $q = $this->db->insert('bank',$data);
      if ($q) {
        return true;
      }else {
        return false;
      }
    }

        public function editbank()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $id = $this->uri->segment(3);
      $data = array(
        'bank_code'=> $this->input->post('bankcode'),
        'bank_name'=> $this->input->post('bankname'),
        'bank_addr'=> $this->input->post('bankaddr'),
        'user_edit' => $username,
        'editdate' => date('Y-m-d H:i:s',now()),
        'compcode' => $compcode
      );
      $this->db->where('bank_code',$id);
      $q = $this->db->update('bank',$data);
      if ($q) {
        return true;
      }else {
        return false;
      }
    }
    public function addbranch()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $bankcode = $this->uri->segment(3);
      $data = array(
        'bank_code'=> $bankcode,
        'branch_code'=> $this->input->post('branchcode'),
        'branch_name'=> $this->input->post('branchname'),
        'branch_addr'=> $this->input->post('branchaddr'),
        'branch_status' => "open",
        'user_add' => $username,
        'createdate' => date('Y-m-d H:i:s',now()),
        'compcode' => $compcode
      );
      $q = $this->db->insert('bank_branch',$data);
      if ($q) {
        return true;
      }else {
        return false;
      }
    }

     public function editbranch()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $bankcode = $this->uri->segment(3);
      $branch = $this->uri->segment(4);
      $data = array(
        'branch_code'=> $this->input->post('branchcode'),
        'branch_name'=> $this->input->post('branchname'),
        'branch_addr'=> $this->input->post('branchaddr'),
        'user_edit' => $username,
        'editdate' => date('Y-m-d H:i:s',now()),
      );
      $this->db->where('bank_code',$bankcode);
      $this->db->where('branch_code',$branch);
      $q = $this->db->update('bank_branch',$data);
      if ($q) {
        return true;
      }else {
        return false;
      }
    }
    public function addaccount()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $bankcode = $this->uri->segment(3);
      $bankbranch = $this->uri->segment(4);
      $data = array(
        'bank_code'=> $bankcode,
        'branch_code' => $bankbranch,
        'acc_code'=> $this->input->post('accnor'),
        'acc_name'=> $this->input->post('accname'),
        'acc_type'=> $this->input->post('acctype'),
        'acc_no' => $this->input->post('accno'),
        'user_add' => $username,
        'createdate' => date('Y-m-d H:i:s',now()),
        'compcode' => $compcode
      );
      $q = $this->db->insert('bank_account',$data);
      if ($q) {
        return true;
      }else {
        return false;
      }
    }

     public function editaccount()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $bankcode = $this->uri->segment(3);
      $bankbranch = $this->uri->segment(4);
      $bankacc =  $this->uri->segment(5);
      $data = array(
        'acc_code'=> $this->input->post('accnor'),
        'acc_name'=> $this->input->post('accname'),
        'acc_type'=> $this->input->post('acctype'),
        'acc_no' => $this->input->post('accno'),
        'user_edit' => $username,
        'edit_date' => date('Y-m-d H:i:s',now()),
      );
      $this->db->where('bank_code',$bankcode);
      $this->db->where('branch_code',$bankbranch);
      $this->db->where('acc_code',$bankacc);
      $q = $this->db->update('bank_account',$data);
      if ($q) {
        return true;
      }else {
        return false;
      }
    }

    public function add_employee()
    {
      try {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $flag = $this->input->post('flag');
        $config['upload_path']   = './profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = '204800';
        $config['max_width']     = '9999';
        $config['max_height']    = '9999';
        $rand                    = rand( 1111, 9999 );
        $date                    = date( "Y-m-d " );
        $config['file_name']     = $date . $rand;
        $this->load->library( 'upload', $config );
        $error   = array();
        $success = array();
        foreach ( $_FILES as $field_name => $file ) {
        if ( !$this->upload->do_upload( $field_name ) ) {
          $error['upload'][] = $this->upload->display_errors();
          $name_file = "blank.png";
        } else {
          $upload_data = $this->upload->data();
          if ( !$this->image_lib->resize() ) {
          $error['resize'][] = $this->image_lib->display_errors();
          echo "error";
          } else {
          $data['success'] = $upload_data;
            $name_file = $upload_data['file_name'];
          }
          }
        }
        // new employee
        $datestring = "Y";
            $m = "m";
          $this->db->select('*');
          $this->db->order_by('m_id','desc');
          $this->db->limit('1');
          $this->db->where('m_type','employee');
          $q = $this->db->get('member');
          $run = $q->result();
          foreach ($run as $valx)
          {
              $x1 = $valx->m_id+1;

          }
            $no = "M".date($datestring).date($m).$x1;
        $data = array(
          'm_code' => $no,
          'm_name' => $this->input->post('cname'),
          'm_user' => $this->input->post('cuser'),
          'm_pass' => sha1(sha1(md5($this->input->post('cpass',TRUE)))),
          'pass' => $this->input->post('cpass'),
          'm_position' => $this->input->post('ctype'),
          'm_status' => "o",
          'm_email' => $this->input->post('cmail'),
          'm_project' => $this->input->post('project1'),
          'm_department' => $this->input->post('project'),
          'm_tel' => $this->input->post('ctel'),
          'uimg' => $name_file,
          'lineid' => $this->input->post('lineid'),
          'dashboard' => $this->input->post('mdash'),
          'm_status' => $this->input->post('m_status'),
          'createuser' => $username,
          'createdate' => date('Y-m-d H:i:s',now()),
          // 'useradd' => $username,
          'compcode' => $compcode
          );
        $q = $this->db->insert('member',$data);

        $data_com = array(
          'emp_member' => $no,
          // 'emp_position' => $this->input->post('ctype'),
          'emp_stat' => "1",
          'emp_project' => $this->input->post('project1'),
          'emp_department' => $this->input->post('project'),
          'emp_status' => "1",
          'emp_stat' => "1"
          );
        $com = $this->db->insert('emp_company_tb',$data_com);

        $data_pro = array(
          'emp_member' => $no,
          'emp_name_e' => $this->input->post('cname'),
          'emp_email' => $this->input->post('cmail'),
          'emp_tele' => $this->input->post('ctel')
        );
        $pro = $this->db->insert('emp_profile_tb',$data_pro);

        $data_ganttresources = array(
          'name' => $this->input->post('cname'),
          'm_code' => $no
        );
        $this->db->insert('ganttresources',$data_ganttresources);



        $data_be = array(
          'emp_member' => $no
        );
        $behave = $this->db->insert('emp_behave_tb',$data_be);

        $data_con = array(
          'emp_member' => $no
        );
        $con = $this->db->insert('emp_contact_tb',$data_con);

        $data_oth = array(
          'emp_member' => $no
        );
        $oth = $this->db->insert('emp_otherskill_tb',$data_oth);

        $data_ski = array(
          'emp_member' => $no
        );
        $ski = $this->db->insert('emp_skill_tb',$data_ski);



        if ($q) {
          $userright = array(
            'm_user' => $this->input->post('cuser'),
            'm_name' => $this->input->post('cname'),
            'm_office' => 'true',
            'user_add' => $username,
            'compcode' => $compcode
            );
          $this->db->insert('menu_right',$userright);
          $getproj = $this->datastore_m->getproject();
          $this->load->model('count_m');
          $gmem = $this->count_m->getemp();
          foreach ($gmem as $key => $vae) {
            $mid = $vae->m_id;
          }
          foreach ($getproj as $key => $value) {
            $data = array(
              'project_id'=> $value->project_id,
              'proj_user'=> $mid
            );
            $this->db->insert('project_ic',$data);
          }
            redirect('datastore/editemployee/'.$x1.'/'.$no);
            // 		$res['status'] = true;
            // 		$res['m_id'] = $x1;
            //     $res['m_code'] = $no;
            // 		$res['message'] = "บันทึกสำเร็จ !!";
          }else{
          redirect('datastore/addemployee');
          // $res['status'] = false;
          // $res['message'] = "บันทึกไม่สำเร็จ !!";
        }
        // echo json_encode($res);
      } catch (Exception $e) {
        echo $e;
        return true;
      }
    }
    public function udp_employee(){
      try {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $flag = $this->input->post('flag');
        $id = $this->input->post('cid');
        $pass = $this->input->post('cpass');
        $config['upload_path']   = './profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = '204800';
        $config['max_width']     = '9999';
        $config['max_height']    = '9999';
        $rand                    = rand( 1111, 9999 );
        $date                    = date( "Y-m-d " );
        $config['file_name']     = $date . $rand;
        $this->load->library( 'upload', $config );
        $error   = array();
        $success = array();
        foreach ( $_FILES as $field_name => $file ) {
          if ( !$this->upload->do_upload( $field_name ) ) {
            $error['upload'][] = $this->upload->display_errors();
            $udp = array(
              'm_code' => $this->input->post('ccode'),
              'm_name' => $this->input->post('cname'),
              'm_user' => $this->input->post('cuser'),
              'm_pass' => sha1(sha1(md5($this->input->post('cpass',TRUE)))),
              'pass' => $this->input->post('cpass'),
              'm_position' => $this->input->post('ctype'),
              'm_email' => $this->input->post('cmail'),
              'm_project' => $this->input->post('project1'),
              'm_department' => $this->input->post('project'),
              'm_tel' => $this->input->post('ctel'),
              'dashboard' => $this->input->post('mdash'),
              'm_type' => $this->input->post('mtype'),
              'lineid' => $this->input->post('lineid'),
              'm_status' => $this->input->post('m_status'),
              'edituser' => $username,
              'editdate' => date('Y-m-d H:i:s',now()),
              // 'sign' => $name_file
            );
            $this->db->where('m_id',$id);
            if($this->db->update('member',$udp))
            {
              echo "Complete";
            }else {
              echo "error Update";
            }
            return true;
          } else {
            $upload_data = $this->upload->data();
            if ( !$this->image_lib->resize() ) {
              $error['resize'][] = $this->image_lib->display_errors();
              echo "error";
              return true;
            } else {
              $data['success'] = $upload_data;
              // echo "OK Good";
              // var_dump( $_FILES );
              $name_file = $upload_data['file_name'];
              // echo $name_file;
              $udp = array(
                'm_code' => $this->input->post('ccode'),
                'm_name' => $this->input->post('cname'),
                'm_user' => $this->input->post('cuser'),
                'm_pass' => sha1(sha1(md5($this->input->post('cpass',TRUE)))),
                'pass' => $this->input->post('cpass'),
                'm_position' => $this->input->post('ctype'),
                'm_email' => $this->input->post('cmail'),
                'm_project' => $this->input->post('project1'),
                'm_department' => $this->input->post('project'),
                'm_tel' => $this->input->post('ctel'),
                'dashboard' => $this->input->post('mdash'),
                'm_type' => $this->input->post('mtype'),
                'lineid' => $this->input->post('lineid'),
                'uimg' => $name_file
                // 'sign' => $name_file
              );
              $this->db->where('m_id',$id);
              if($this->db->update('member',$udp))
              {
                echo "Complete";
              }else {
                echo "error Update";
              }
              return true;
            }
          }
        } 
         
     
      } catch (Exception $th) {
        echo $th;
      }
    }
    public function del_employee()
    {
      $id = $this->input->post('id');
      $code = $this->input->post('code');
      $user = $this->input->post('user');
        if($this->db->delete('member', array('m_id' => $id)))
        {
          $this->db->delete('menu_right', array('m_user' => $user));
          $getproj = $this->datastore_m->getproject();

          $this->db->where('m_code', $code);
          $this->db->delete('ganttresources');

          foreach ($getproj as $key => $value) {
            $this->db->delete('project_ic', array('proj_user' => $id));
          }
          echo $id;
          return true;
        }else {
          return false;
        }

    }
    public function newunit()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $countid = $this->datastore_m->getunit_numrows()+1;
        $data = array(
          'unit_code' => $add['id'],
          'unit_name' => $add['name'],
          'status' => "yes",
          'compcode' => $compcode,
          'user' => ''
        );
        $q = $this->db->insert('unit',$data);
      if($q){
        redirect('data_master/setupunit');
      }else{
        echo "insert false";
      }
    }
    public function newunit_nv()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $countid = $this->datastore_m->getunit_numrows()+1;
        $data = array(
          'unit_code' => $add['code'],
          'unit_name' => $add['uomname'],
          'status' => $add['status'],
          'compcode' => $compcode,
          'user' => $username,
          'createdate' => date('Y-m-d H:i:s',now()),
        );
        $q = $this->db->insert('unit',$data);
      if($q){
        redirect('datastore/setupunit');
      }else{
        echo "insert false";
      }
    }

    public function editunit()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $id = $this->uri->segment(3);
      $countid = $this->datastore_m->getunit_numrows()+1;
      $data = array(
          'unit_code' => $add['code'],
          'unit_name' => $add['name']
        );
        $this->db->where('unit_id',$id);
        $q = $this->db->update('unit',$data);
      if($q){
        redirect('data_master/setupunit');
      }else{
        echo "insert false";
      }
    }
    public function editunit_nv()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $id = $this->uri->segment(3);
      $countid = $this->datastore_m->getunit_numrows()+1;
      $data = array(
          'unit_code' => $add['code'],
          'unit_name' => $add['uomname'],
          'status' => $add['status'],
          'updatedate' => date('Y-m-d H:i:s',now()),
          'user' => $username,
        );
        $this->db->where('unit_id',$id);
        $q = $this->db->update('unit',$data);
      if($q){
        redirect('datastore/setupunit');
      }else{
        echo "insert false";
      }
    }
    public function getunit()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $result = $this->db->get('unit')->result();
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }
    public function delunit()
    {
      $id = $this->uri->segment(3);
        if($this->db->delete('unit', array('unit_id' => $id)))
        {
          redirect('data_master/setupunit');
        }else {
          return false;
        }
    }
    public function load_datamascosttype(){
      $result = $this->db->get('master_costtype')->result();
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }
    public function newcosttype()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $countid = $this->datastore_m->getcosttype_numrows()+1;
      if ($add['flag']!="udp") {
        $data = array(
          'costype_name' => $add['name'],
          'costtype_status' => "active",
          'compcode' => $compcode
        );
        $q = $this->db->insert('master_costtype',$data);
      }else{
        $data = array(
          'costype_name' => $add['name']
        );
        $this->db->where('costtype_id',$add['id']);
        $q = $this->db->update('master_costtype',$data);
      }
      if($q){
        // redirect('data_master/cost_type');
        return true;
      }else{
        echo "insert false";
      }
    }
    public function delcosttype()
    {
      $id = $this->uri->segment(3);
        if($this->db->delete('master_costtype', array('costtype_id' => $id)))
        {
          redirect('data_master/cost_type');
        }else {
          return false;
        }

    }
    public function update()
    {
      $json = $this->input->post('models');
      $json = stripslashes($json);
      $json = json_decode($json);
      foreach ($json as $value) {
        $data = array(
          'costype_name' => $value->costype_name,
          'costtype_code' => $value->costtype_code
        );
        $this->db->where('costtype_id',$value->costtype_id);
        $this->db->update('master_costtype',$data);
      }


      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
    }

    public function costtypeCreate()
    {
      $json = $this->input->post('models');
      $json = stripslashes($json);
      $json = json_decode($json);
      foreach ($json as $value) {
        $data = array(
          'costtype_code' => $value->costtype_code,
          'costype_name' => $value->costype_name
        );
        $this->db->insert('master_costtype',$data);
      }


      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
    }
    public function costtypeDestroy()
    {
      $json = $this->input->post('models');
      $json = stripslashes($json);
      $json = json_decode($json);
      foreach ($json as $value) {
        $this->db->delete('master_costtype', array('costtype_id' => $value->costtype_id));
      }
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
    }
    // department

    public function dpt_ins()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $input = $this->input->post();
          $res = $this->master_m->insdpt($input, $compcode);
          if ($res) {
            redirect('data_master/department');
          }

        }
        public function dpt_edit()
        {

          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $input = $this->input->post();
          $res = $this->master_m->editdpt($input, $compcode);
          if ($res) {
            redirect('data_master/department');
          }
          // $dpt_id = $this->input->post('li_id');
          // $dpt_name = $this->input->post('li_dpt');
          // $code = $this->input->post('li_dptcode');
          // if ($this->master_m->editdpt($dpt_id,$code,$dpt_name)) {
          //   redirect('data_master/department');
          // }

        }
        public function deldpt()
        {
            $id = $this->uri->segment(3);
            if ($this->db->delete('department', array('department_id' => $id))) {
                redirect('data_master/department');
            }else{
                return false;
            }

        }

        public function addoption()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $data = array(
        'op_code'=> $this->input->post('op_code'),
        'op_name'=> $this->input->post('op_name')
      );
      $q = $this->db->insert('option_type',$data);
      redirect('data_master/ar_option');
    }

    public function upd_option(){
      $id = $this->uri->segment(3);
      $add = $this->input->post();
      $ins = array(
          'op_code' => $add['op_code'],
          'op_name' => $add['op_name'],
      );
            $this->db->where('op_id',$id);
            $this->db->update('option_type',$ins);
      redirect('data_master/ar_option');
    }

    public function del_op() {

    $id = $this->uri->segment(3);
    $this->db->delete('option_type', array('op_id' => $id));
      redirect('data_master/ar_option');
    }

    public function del_back() {

    $id = $this->uri->segment(3);
    $this->db->delete('bank', array('bank_code' => $id));
    $this->db->delete('bank_account', array('bank_code' => $id));
    $this->db->delete('bank_branch', array('bank_code' => $id));
      redirect('data_master/new_bank');
    }

     public function del_bank_branch() {

    $id = $this->uri->segment(3);
    $id1 = $this->uri->segment(4);
    $id2 = $this->uri->segment(5);

    $this->db->where('bank_code',$id);
    $this->db->where('branch_code',$id1);
    $this->db->delete('bank_branch');

    $this->db->where('bank_code',$id);
    $this->db->where('branch_code',$id1);
    $this->db->where('acc_code', $id2);
    $this->db->delete('bank_account');

      redirect('data_master/new_bank');
    }

     public function del_acc() {

    $id = $this->uri->segment(3);
    $id1 = $this->uri->segment(4);
    $id2 = $this->uri->segment(5);

    $this->db->where('bank_code',$id);
    $this->db->where('branch_code',$id1);
    $this->db->where('acc_code', $id2);
    $this->db->delete('bank_account');
redirect('data_master/new_bank');
     }

    public function add_business() {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $com = $this->uri->segment(3);
      $data = array(
        'business_code'=> $this->input->post('business_code'),
        'business_name'=> $this->input->post('business_name'),
        // 'vat_type' => $this->input->post('vattype'),
        'useradd' => $username,
        'createdate' => date('Y-m-d H:i:s',now()),
        'compcode' => $com,
        'status' => $this->input->post('status'),
        'compcode' => $compcode,
      );
      $this->db->where('compcode',$com);
      $this->db->insert('master_business',$data);
      redirect('data_master/bussiness_unit'.$com);
     }

    public function edit_business() {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $code = $this->uri->segment(3);
      $com = $this->uri->segment(4);
      $emarkcomp = $this->input->post('emarkcompcode');
      $data = array(
        'business_code'=> $this->input->post('business_code'),
        'business_name'=> $this->input->post('business_name'),
        'status' => $this->input->post('status'),
        // 'vat_type' => $this->input->post('evattype'),
        'useredit' => $username,
        'updatetime' => date('Y-m-d H:i:s',now()),
        'compcode' => $compcode,
      );
      $this->db->where('business_code',$code);
      $q = $this->db->update('master_business',$data);
      redirect('data_master/bussiness_unit'.$com);
    }

    public function del_business() {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $code = $this->uri->segment(3);
      $data = array(
        'userdel' => $username,
        'deldate' =>date('Y-m-d H:i:s',now()),
        'status' => "2",
      );
      $this->db->where('business_code',$code);
      $q = $this->db->delete('master_business');
      redirect('data_master/bussiness_unit');
    }



    public function bankforward(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
        $data = array(
        'userdel' => $username
      );
        $this->db->insert('master_business',$data);

    }

     public function bankacct(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
        $data = array(
        'branch_type' => $add['accounttype'],
        'branch_acc' => $add['account'],
        'branch_date' => $add['date'],
        'branch_remark' => $add['remark'],
      );

        $this->db->where('acc_code',$add['accountno']);
        $this->db->update('bank_account',$data);

          for ($i=0; $i < count($add['pj']); $i++) {
                if($add['chki'][$i]=="Y"){
                 $data_d = array(
                   'bank_no' => $add['accountno'],
                   'pj_bk' => $add['pj'][$i],
                   'dm_bk' => $add['dp'][$i],
                   'pjdm_bank' => $add['namedp'][$i],
                   'amt_bank' => $add['amt'][$i],
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('bankforward',$data_d);
         }
      }
     redirect('data_master/new_bank');
  }

public function mark_delcomp(){
  $this->db->delete('company', array('company_id' => $this->uri->segment(3)));
    redirect('datastore/archive_company');
}


  public function approve_pr(){
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $pj = $this->uri->segment(3);

    for ($i=0; $i < count($add['approve_sequence']); $i++) { 
    if($add['chkpr'][$i]=="X"){     
                 $data_d = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
                   'approve_cost' => $add['approve_cost'][$i],
                   'approve_lock' => $add['lock1'][$i],
                   'type' => "PR",
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('approve',$data_d);
         }else if($add['chkpr'][$i]=="Y"){
           $data_c = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
                   'approve_cost' => $add['approve_cost'][$i],
                   'approve_lock' => $add['lock1'][$i],
                   'type' => "PR",
                   'edituser' => $username,
                   'editdate' => date('Y-m-d H:i:s'),
                 );

            $this->db->where('id',$add['idpr'][$i]);
            $this->db->update('approve',$data_c);
            $data_e = array(
              'app_sequence' => $add['approve_sequence'][$i],
              'app_midid' => $add['approve_mid'][$i],
              'app_midname' => $add['approve_mname'][$i]
            );
            $this->db->where('app_project',$pj);
            $this->db->where('status','no');
            $this->db->update('approve_pr',$data_e);
         }
      }

      $data = array(
        'c_pr' => $add['chkpj_pr'],
        'a_pr' => $add['pr1'],
      );

      $this->db->where('project_code',$pj);
      $this->db->update('project',$data);

     echo $pj;
     return true;
  }
  public function approve_td(){
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $pj = $this->uri->segment(3);
      $tdcode = $this->uri->segment(4);

    for ($i=0; $i < count($add['approve_sequence']); $i++) { 
    if($add['chktd'][$i]=="X"){     
                 $data_d = array(
                   'approve_project' => $tdcode,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
                   'approve_cost' => $add['approve_cost'][$i],
                   'approve_lock' => $add['lock1'][$i],
                   'type' => "TD",
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('approve',$data_d);
         }else if($add['chktd'][$i]=="Y"){
           $data_c = array(
                   'approve_project' => $tdcode,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
                   'approve_cost' => $add['approve_cost'][$i],
                   'approve_lock' => $add['lock8'][$i],
                   'type' => "TD",
                   'edituser' => $username,
                   'editdate' => date('Y-m-d H:i:s'),
                 );

            $this->db->where('id',$add['idtd'][$i]);
            $this->db->update('approve',$data_c);
            $data_e = array(
              'app_sequence' => $add['approve_sequence'][$i],
              'app_midid' => $add['approve_mid'][$i],
              'app_midname' => $add['approve_mname'][$i]
            );
            $this->db->where('app_project',$pj);
            $this->db->where('status','no');
            $this->db->update('approve_td',$data_e);
         }
      }

      $data = array(
        'c_td' => $add['chkpj_tdtx'],
        'a_td' => $add['td1'],
      );

      // $this->db->where('project_code',$pj);
      // $this->db->update('project',$data);

     echo $tdcode;
     return true;
  }


 public function approve_po(){
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $pj = $this->uri->segment(3);
    for ($i=0; $i < count($add['approve_sequencepo']); $i++) {      
    if($add['chkpo'][$i]=="X"){ 
                 $data_d = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequencepo'][$i],
                   'approve_mid' => $add['approve_midpo'][$i],
                   'approve_mname' => $add['approve_mnamepo'][$i],
                   'approve_position' => $add['approve_positionpo'][$i],
                   'approve_cost' => $add['approve_costpo'][$i],
                   'approve_lock' => $add['lock2po'][$i],
                   'type' => "PO",
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('approve',$data_d);
         }else if($add['chkpo'][$i]=="Y"){
           $data_c = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequencepo'][$i],
                   'approve_mid' => $add['approve_midpo'][$i],
                   'approve_mname' => $add['approve_mnamepo'][$i],
                   'approve_position' => $add['approve_positionpo'][$i],
                   'approve_cost' => $add['approve_costpo'][$i],
                   'approve_lock' => $add['lock2po'][$i],
                   'type' => "PO",
                   'edituser' => $username,
                   'editdate' => date('Y-m-d H:i:s'),
                 );

            $this->db->where('id',$add['idpo'][$i]);
            $this->db->update('approve',$data_c);

          $data_e = array(
            'app_sequence' => $add['approve_sequencepo'][$i],
            'app_midid' => $add['approve_midpo'][$i],
            'app_midname' => $add['approve_mnamepo'][$i]
          );
          $this->db->where('app_project',$pj);
          $this->db->where('app_sequence',$add['approve_sequencepo'][$i]);
          $this->db->where('status','no');
          $this->db->update('approve_po',$data_e);
         }
      }

      $data = array(
        'c_po' => $add['chkpj_po'],
        'a_po' => $add['po1'],
      );

      $this->db->where('project_code',$pj);
      $this->db->update('project',$data);

     echo $pj;
     return true;
  }

 public function approve_wo(){
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $pj = $this->uri->segment(3);
    for ($i=0; $i < count($add['approve_sequencewo']); $i++) { 
    if($add['chkwo'][$i]=="X"){      
                 $data_d = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequencewo'][$i],
                   'approve_mid' => $add['approve_midwo'][$i],
                   'approve_mname' => $add['approve_mnamewo'][$i],
                   'approve_position' => $add['approve_positionwo'][$i],
                   'approve_cost' => $add['approve_costwo'][$i],
                   'approve_lock' => $add['lock3wo'][$i],
                   'type' => "WO",
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('approve',$data_d);
         }else if($add['chkwo'][$i]=="Y"){
           $data_c = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequencewo'][$i],
                   'approve_mid' => $add['approve_midwo'][$i],
                   'approve_mname' => $add['approve_mnamewo'][$i],
                   'approve_position' => $add['approve_positionwo'][$i],
                   'approve_cost' => $add['approve_costwo'][$i],
                   'approve_lock' => $add['lock3wo'][$i],
                   'type' => "WO",
                   'edituser' => $username,
                   'editdate' => date('Y-m-d H:i:s'),
                 );

            $this->db->where('id',$add['idwo'][$i]);
            $this->db->update('approve',$data_c);

            $data_e = array(
              'app_sequence' => $add['approve_sequencewo'][$i],
              'app_midid' => $add['approve_midwo'][$i],
              'app_midname' => $add['approve_mnamewo'][$i]
            );
            $this->db->where('app_project',$pj);
            $this->db->where('status','no');
            $this->db->update('approve_wo',$data_e);
         }
      }

       $data = array(
        'c_wo' => $add['chkpj_wo'],
        'a_wo' => $add['wo1'],
      );

      $this->db->where('project_code',$pj);
      $this->db->update('project',$data);

     echo $pj;
     return true;
  }

   public function approve_pc(){
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $pj = $this->uri->segment(3);
      $proid = $this->master_m->findproid($pj)[0]['project_id'];
    for ($i=0; $i < count($add['approve_sequencepc']); $i++) {
    if($add['chkpc'][$i]=="X"){       
                 $data_d = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequencepc'][$i],
                   'approve_mid' => $add['approve_midpc'][$i],
                   'approve_mname' => $add['approve_mnamepc'][$i],
                   'approve_position' => $add['approve_positionpc'][$i],
                   'approve_cost' => $add['approve_costpc'][$i],
                   'approve_lock' => $add['lock4pc'][$i],
                   'type' => "PC",
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('approve',$data_d);
         }else if($add['chkpc'][$i]=="Y"){
           $data_c = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequencepc'][$i],
                   'approve_mid' => $add['approve_midpc'][$i],
                   'approve_mname' => $add['approve_mnamepc'][$i],
                   'approve_position' => $add['approve_positionpc'][$i],
                   'approve_cost' => $add['approve_costpc'][$i],
                   'approve_lock' => $add['lock4pc'][$i],
                   'type' => "PC",
                   'edituser' => $username,
                   'editdate' => date('Y-m-d H:i:s'),
                 );

            $this->db->where('id',$add['idpc'][$i]);
            $this->db->update('approve',$data_c);

            $data_e = array(
              'app_sequence' => $add['approve_sequencepc'][$i],
              'app_midid' => $add['approve_midpc'][$i],
              'app_midname' => $add['approve_mnamepc'][$i]
            );
            $this->db->where('app_project',$pj);
            $this->db->where('status','no');
            $this->db->update('approve_wo',$data_e);
         }
      }

      $data = array(
        'c_pt' => $add['chkpj_pc'],
        'a_pt' => $add['pc1'],
      );

      $this->db->where('project_code',$pj);
      $this->db->update('project',$data);


     echo $proid.'/'.$pj;
     return true;
  }

   public function delpr_po_pc_wo(){
    $id = $this->uri->segment(3);
    $pj = $this->uri->segment(4);
    $sq = $this->uri->segment(5);
    
    $this->db->where('id', $id);
    $this->db->delete('approve');

    $this->db->where('app_project',$pj);
    $this->db->where('app_sequence',$sq);
    $this->db->delete('approve_pr');

    redirect('data_master/approve_prpo/'.$pj);
   }

   public function delpr_bk(){
    $id = $this->uri->segment(3);
    $pj = $this->uri->segment(4);
    $type = $this->uri->segment(5);
    $this->db->where('id', $id);
    $this->db->delete('approve');
    redirect('ddata_master/approve_prpo/'.$pj.'/'.$type);
   }

   public function delfa(){
    $id = $this->uri->segment(3);
    $pj = $this->uri->segment(4);
    $this->db->where('id', $id);
    $this->db->delete('approve');
    redirect('add_asset/repair_asset');
   }
  

  public function update_showheader()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $data = array(
        'cost_status' => $this->input->post('chkvat'),
      );
      $this->db->where('costhead',"H");
      if($this->db->update('cost_subgroup',$data))
      {
        redirect('data_master/setupcostcode_main');
      }else {
        return false;
      }

    }

    public function add_jobdesc()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
      'job_code' => $add['job_code'],
      'job_name' => $add['job_name'],
      'compcode' => $compcode,
      'job_active' => "Y",
      'useradd' => $username,
      'createdate' => date('Y-m-d H:i:s'),
      );
      if($this->db->insert('master_jobdesc',$data))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    public function edit_jobdesc()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
        'job_code' => $add['jobe_code'],
        'job_name' => $add['jobe_name'],
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s'),
      );
      $this->db->where('job_code',$add['jobe_code']);
      if($this->db->update('master_jobdesc',$data))
      {
        redirect('data_master/master_job_desc');
      }else {
        return false;
      }
    } 

    public function del_jobdesc(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $code = $this->uri->segment(3);
    $data = array(
        'job_active' => "del",
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s'),
      );
    $this->db->where('job_code', $code);
    $this->db->update('master_jobdesc',$data);
    redirect('data_master/master_job_desc');
   }  

   public function add_jobtype()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
      'type_code' => $add['type_code'],
      'type_name' => $add['type_name'],
      'compcode' => $compcode,
      'type_active' => "Y",
      'useradd' => $username,
      'createdate' => date('Y-m-d H:i:s'),
      );
      if($this->db->insert('master_jobtype',$data))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
   public function add_jobtype_nv()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
      'type_code' => $add['type_code'],
      'type_name' => $add['type_name'],
      'compcode' => $compcode,
      'type_active' => $add['status'],
      'useradd' => $username,
      'createdate' => date('Y-m-d H:i:s'),
      );
      if($this->db->insert('master_jobtype',$data))
      {
        redirect('datastore/master_job_type');
      }
      else
      {
        redirect('datastore/master_job_type');
      }
    }

  public function edit_jobtype()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
        'type_code' => $add['typee_code'],
        'type_name' => $add['typee_name'],
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s'),
      );
      $this->db->where('type_code',$add['typee_code']);
      if($this->db->update('master_jobtype',$data))
      {
        redirect('data_master/master_job_type');
      }else {
        return false;
      }
  }
  public function edit_jobtype_nv()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
        'type_code' => $add['typee_code'],
        'type_name' => $add['typee_name'],
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s'),
      );
      $this->db->where('type_code',$add['typee_code']);
      if($this->db->update('master_jobtype',$data))
      {
        redirect('datastore/master_job_type');
      }else {
        return false;
      }
  }
  public function del_type(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $code = $this->uri->segment(3);
    $data = array(
        'type_active' => "del",
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s'),
      );
    $this->db->where('type_code', $code);
    $this->db->update('master_jobtype',$data);
    redirect('data_master/master_job_type');
   } 
  public function add_sysytem()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
      'systemcode' => $add['systemcode'],
      'systemname' => $add['systemname'],
      'compcode' => $compcode,
      'sys_active' => "1",
      'useradd' => $username,
      'createdate' => date('Y-m-d H:i:s'),
      );
      if($this->db->insert('system',$data))
      {
        return true;
      }
      else
      {
        return false;
      }
    } 

    public function add_project_job(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
      'systemcode' => $add['systemcode'],
      'systemname' => $add['systemname'],
      'compcode' => $compcode,
      'sys_active' => $add['status'],
      'useradd' => $username,
      'createdate' => date('Y-m-d H:i:s'),
      );
      if($this->db->insert('system',$data))
      {
        redirect('datastore/setprojectjob');
      }
      else
      {
        return false;
      }
    }

    public function edit_system()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $data = array(
        // 'systemcode' => $add['systemcodee'],
        'systemname' => $add['systemnamee'],
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s'),
      );
      $this->db->where('systemcode',$add['systemcodee']);
      $this->db->where('compcode',$compcode);
      if($this->db->update('system',$data))
      {
        redirect('data_master/setupsystem');
      }else {
        return false;
      }
  }
  public function edit_system_nv(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $data = array(
      // 'systemcode' => $add['systemcodee'],
      'systemname' => $add['systemnamee'],
      'useredit' => $username,
      'sys_active' => $add['status'],
      'editdate' => date('Y-m-d H:i:s'),
    );
    $this->db->where('systemid',$add['id']);
    $this->db->where('compcode',$compcode);
    if($this->db->update('system',$data))
    {
      redirect('datastore/setprojectjob');
    }else {
      return false;
    }
  }

  public function del_system(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $code = $this->uri->segment(3);
    $data = array(
        'sys_active' => "del",
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s'),
      );
    $this->db->where('systemcode', $code);
    $this->db->update('system',$data);
    redirect('data_master/setupsystem');
   }

   public function update_sign(){
      $input = $this->input->post();
      //ลำดับ
      $no = $input["array"][0];
      // project_code 
      $project_code = $input["array"][1];
      // type 
      $type = $input["array"][2];
      // member id
      $m_id = $input["array"][3];
      // status sign
      $status = $input["status"];

      //check dulp
      $this->db->select("*");
      $this->db->where("type",$type);
      $this->db->where("ref_m_id",$m_id);
      $this->db->where("ref_project_code",$project_code);
      $query = $this->db->get("sign_table");
      $row = $query->num_rows();

      //var_dump($row);
          if($row == 0){
            // insert
            $data = array(
              "type"     => $type,
              "ref_m_id" => $m_id,
              "ref_project_code" => $project_code,
              "status_sign" => $status
            );

            if($this->db->insert("sign_table" , $data)){
                echo "insert true";
            }else{
                echo "insert false";
            }

          }else{
            // update
           
             $this->db->where("type",$type);
             $this->db->where("ref_m_id",$m_id);
             $this->db->where("ref_project_code",$project_code);

             $data = array(
              "status_sign" => $status
            );

               if($this->db->update("sign_table" , $data)){
                  echo "update true";
               }else{
                  echo "update false";
               }


          }

    }

  

       public function approve_fa(){
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
    for ($i=0; $i < count($add['approve_sequence']); $i++) {
    if($add['chkfa'][$i]=="X"){       
                 $data_d = array(
                  'approve_project' => 'Repair',
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                  
                   'type' => "FA",
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('approve',$data_d);
         }else if($add['chkfa'][$i]=="Y"){
           $data_c = array(
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   
                   'type' => "FA",
                   'edituser' => $username,
                   'editdate' => date('Y-m-d H:i:s'),
                 );

            $this->db->where('id',$add['idpc'][$i]);
            $this->db->update('approve',$data_c);
         }
      }

     return true;
  }

  public function addcostcode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $res = array();
    if ($add['create'] == "Y") {
      $type_code = $add['type_code'];
      $type_name = $add['type_name'];
    }else{
      $type_code = $add['type_code2'];
      $type_name = $add['type_name2'];
    }

    if ($add['group'] == "Y") {
      $group_code = $add['group_code'];
      $group_name = $add['group_name'];
    }else{
      $group_code = $add['group_code2'];
      $group_name = $add['group_name2'];
    }  
    if ($add['subgroup'] == "Y") {
      $subgroup_code = $add['subgroup_code'];
      $subgroup_name = $add['subgroup_name'];
    }else{
      $subgroup_code = $add['subgroup_code2'];
      $subgroup_name = $add['subgroup_name2'];
    } 

    if ($add['spec'] == "Y") { 
      $spec_code = $add['spec_code'];
      $spec_name = $add['spec_name'];
    }else{
      $spec_code = $add['spec_code2'];
      $spec_name = $add['spec_name2'];
    }
            $data = array(
              'ctype_code' => $type_code,
              'ctype_name' => $type_name,
              'cgroup_code' => $group_code,
              'cgroup_name' => $group_name,
              'ctype_code' => $type_code,
              'ctype_name' => $type_name,
              'csubgroup_code' => $subgroup_code,
              'csubgroup_name' => $subgroup_name,
              'cgroup_code4' => $spec_code,
              'cgroup_name4' => $spec_name,
              'cgroup_code5' => $add['brand_code'],
              'cgroup_name5' => $add['brand_name'],
              'user' => $username,
              'updatedate' => date('Y-m-d H:i:s'),
              'compcode' => $compcode,
              'cost_status' => "N",
              'csubgroup_status' =>"yes",
              'costhead' => $add['typecost'],
              'acc_code' => $add['accno'],
              'acc_name' => $add['codename'],
              'acc_code2' => $add['accno2'],
              'acc_name2' => $add['codename2'],
              'costcode'  => $add['costcode'],
            );
     
      if($this->db->insert('cost_subgroup',$data))
      {
        $res['status'] = true;
      }else {
        $res['status'] = false;
        $res['message'] = 'sql insert error';
      }
      echo json_encode($res);
   }
   public function updcostcode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $lv1 = $add['ctype_old'];
    $lv2 = $add['cgroup_old'];
    $lv3 = $add['csubgroup_old'];
    $lv4 = $add['cgroup4_old'];
    $lv5 = $add['cgroup5_old'];
    $idcode = $this->master_m->find_costcode($lv1,$lv2,$lv3,$lv4,$lv5);
    // var_dump($add);
    // var_dump($idcode);die();
    
    if ($add['create'] == "Y") {
      $type_code = $add['type_code'];
      $type_name = $add['type_name'];
    }else{
      $type_code = $add['type_code2'];
      $type_name = $add['type_name2'];
    }

    if ($add['group'] == "Y") {
      $group_code = $add['group_code'];
      $group_name = $add['group_name'];
    }else{
      $group_code = $add['group_code2'];
      $group_name = $add['group_name2'];
    }  
    if ($add['subgroup'] == "Y") {
      $subgroup_code = $add['subgroup_code'];
      $subgroup_name = $add['subgroup_name'];
    }else{
      $subgroup_code = $add['subgroup_code2'];
      $subgroup_name = $add['subgroup_name2'];
    } 

    if ($add['spec'] == "Y") { 
      $spec_code = $add['spec_code'];
      $spec_name = $add['spec_name'];
    }else{
      $spec_code = $add['spec_code2'];
      $spec_name = $add['spec_name2'];
    }
            $data = array(
              'ctype_code' => $type_code,
              'ctype_name' => $type_name,
              'cgroup_code' => $group_code,
              'cgroup_name' => $group_name,
              'ctype_code' => $type_code,
              'ctype_name' => $type_name,
              'csubgroup_code' => $subgroup_code,
              'csubgroup_name' => $subgroup_name,
              'cgroup_code4' => $spec_code,
              'cgroup_name4' => $spec_name,
              'cgroup_code5' => $add['brand_code'],
              'cgroup_name5' => $add['brand_name'],
              'costcode_d' => $add['type_code'].$add['group_code'].$add['subgroup_code'].$add['spec_code'].$add['brand_code'],
              'cosrcode_h' => $add['type_code'].$add['group_code'].$add['subgroup_code'].$add['spec_code'].$add['brand_code'],
              'user' => $username,
              'updatedate' => date('Y-m-d H:i:s'),
              'compcode' => $compcode,
              'cost_status' => "N",
              'costhead' => $add['typecost'],
              'csubgroup_status' =>"yes",
              'acc_code' => $add['accno'],
              'acc_name' => $add['codename'],
              'acc_code2' => $add['accno2'],
              'acc_name2' => $add['codename2']
              // 'costcode'  => $add['costcode']
            );
            // var_dump($data);die();
            $this->db->where('csubgroup_id',$idcode[0]['csubgroup_id']);
            $boolen = $this->db->update('cost_subgroup',$data);
            // var_dump($boolen);die();
            // $boolen = true;
            $res = array();
            if($boolen)
            {
              $res['status'] = true;
              // var_dump($boolen);
            }else {
              $res['status'] = false;
              $res['message'] = 'sql update error';
            }
            echo json_encode($res);
   }


     public function approve_prbooking(){
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $pj = $this->uri->segment(3);
      $type = $this->uri->segment(4);
      $pjid = $this->uri->segment(5);

    for ($i=0; $i < count($add['approve_sequence']); $i++) { 
    if($add['chkpr'][$i]=="X"){     
                 $data_d = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
               
                   'approve_lock' => $add['lock1'][$i],
                   'type' => "BK",
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('approve',$data_d);
         }else if($add['chkpr'][$i]=="Y"){
           $data_c = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
                  
                   'approve_lock' => $add['lock1'][$i],
                   'type' => "BK",
                   'edituser' => $username,
                   'editdate' => date('Y-m-d H:i:s'),
                 );

            $this->db->where('id',$add['idpr'][$i]);
            $this->db->update('approve',$data_c);
         }
      }

      $data = array(
        'c_bk' => $add['chkpj_bk'],
        
      );

      $this->db->where('project_code',$pj);
      $this->db->update('project',$data);

     echo $pj;
     return true;
  }

    public function approve_ap(){
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $pj = $this->uri->segment(3);

    for ($i=0; $i < count($add['approve_sequence']); $i++) { 
    if($add['chkpr'][$i]=="X"){     
                 $data_d = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
                   // 'approve_cost' => $add['approve_cost'][$i],
                   'approve_lock' => $add['lock1'][$i],
                   'type' => "AP",
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('approve',$data_d);
         }else if($add['chkpr'][$i]=="Y"){
           $data_c = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
                   // 'approve_cost' => $add['approve_cost'][$i],
                   'approve_lock' => $add['lock1'][$i],
                   'type' => "AP",
                   'edituser' => $username,
                   'editdate' => date('Y-m-d H:i:s'),
                 );

            $this->db->where('id',$add['idpr'][$i]);
            $this->db->update('approve',$data_c);
         }
      }

      $data = array(
        'c_ap' => $add['chkpj_ap'],
        
      );

      $this->db->where('project_code',$pj);
      $this->db->update('project',$data);

     echo $pj;
     return true;
  }


  public function approve_ic(){
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $pj = $this->uri->segment(3);

    for ($i=0; $i < count($add['approve_sequence']); $i++) { 
    if($add['chkpr'][$i]=="X"){     
                 $data_d = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
                   // 'approve_cost' => $add['approve_cost'][$i],
                   'approve_lock' => $add['lock1'][$i],
                   'type' => "IC",
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('approve',$data_d);
         }else if($add['chkpr'][$i]=="Y"){
           $data_c = array(
                   'approve_project' => $pj,
                   'approve_sequence' => $add['approve_sequence'][$i],
                   'approve_mid' => $add['approve_mid'][$i],
                   'approve_mname' => $add['approve_mname'][$i],
                   'approve_position' => $add['approve_position'][$i],
                   // 'approve_cost' => $add['approve_cost'][$i],
                   'approve_lock' => $add['lock1'][$i],
                   'type' => "IC",
                   'edituser' => $username,
                   'editdate' => date('Y-m-d H:i:s'),
                 );

            $this->db->where('id',$add['idpr'][$i]);
            $this->db->update('approve',$data_c);
         }
      }

      $data = array(
        'c_ic' => $add['chkpj_ic'],
        
      );

      $this->db->where('project_code',$pj);
      $this->db->update('project',$data);

     echo $pj;
     return true;
  }

  public function addoptional()
  {
     $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $data = array(
        'op_code' => $this->input->post('op_code'),
        'op_name' => $this->input->post('op_name'),
      );
      if ($this->db->insert('option_type',$data)) {
       redirect('data_master/ar_option');
      }else{
        return false;
      }

  }

  public function addctypecode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $data = array(
      'ctype_code' => $add['typecode'],
      'ctype_name' => $add['typename'],
      'cost_status' => 'Y',
      'compcode' => $compcode,
    );
    if($this->db->insert('cost_subgroup',$data)){
      return true;
    }else{
      return false;
    }
  }
  public function editctypecode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $data = array(
      'ctype_name' => $add['typename'],
      'cost_status' => 'Y',
      'compcode' => $compcode,
    );
    $this->db->where('ctype_code',$add['typecode']);
    if($this->db->update('cost_subgroup',$data)){
      return true;
    }else{
      return false;
    }
  }
  public function deletecosttype(){
    $add = $this->input->post();
    if($this->db->delete('cost_subgroup', array('ctype_code' => $add['typecode']))){
      return true;
    }else{
      return false;
    }
  }
  public function addcgroupcode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $this->db->select('cgroup_code');
    $this->db->where('ctype_code',$add['typecode']);
    $res = $this->db->get('cost_subgroup')->result_array();
    if ($res[0]['cgroup_code']==null) {
      $data = array(
        'cgroup_code' => $add['groupcode'],
        'cgroup_name' => $add['groupname'],
      );
      $this->db->where('ctype_code',$add['typecode']);
      if ($this->db->update('cost_subgroup',$data)) {
        echo "Update";
        return true;
      }else{
        echo "error";
        return false;
      }
    }else{
      $data = array(
        'ctype_code' => $add['typecode'],
        'ctype_name' => $add['typename'],
        'cgroup_code' => $add['groupcode'],
        'cgroup_name' => $add['groupname'],
        'cost_status' => 'N',
        'compcode' => $compcode
       );
       if($this->db->insert('cost_subgroup',$data)){
         echo "insert";
         return true;
       }else{
         echo "error insert";
         return false;
       }

    }
  }
  public function editcgroupcode(){
    $add = $this->input->post();
    $data = array(
      'cgroup_name' => $add['groupname'],
      'cost_status' => 'Y',
      'compcode' => $compcode,
    );
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    if($this->db->update('cost_subgroup',$data)){
      echo "update";
      return true;
    }else{
      echo "error";
      return false;
    }
  }
  public function deletecostgroup(){
    $add = $this->input->post();
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    if($this->db->delete('cost_subgroup')){
      echo "delete";
      return true;
    }else{
      echo "error";
      return false;
    }
  }
  public function addcsubgroupcode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $this->db->select('csubgroup_code');
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    $res = $this->db->get('cost_subgroup')->result_array();
    if ($res[0]['csubgroup_code']==null) {
      $data = array(
        'csubgroup_code' => $add['subgroupcode'],
        'csubgroup_name' => $add['subgroupname'],
        'cost_status' => 'N',
        'csubgroup_status' => 'yes'

      );
      $this->db->where('ctype_code',$add['typecode']);
      $this->db->where('cgroup_code',$add['groupcode']);
      if ($this->db->update('cost_subgroup',$data)) {
        echo "Update";
        return true;
      }else{
        echo "error";
        return false;
      }
    }else{
      $data = array(
        'ctype_code' => $add['typecode'],
        'ctype_name' => $add['typename'],
        'cgroup_code' => $add['groupcode'],
        'cgroup_name' => $add['groupname'],
        'csubgroup_code' => $add['subgroupcode'],
        'csubgroup_name' => $add['subgroupname'],
        'cost_status' => 'N',
        'costhead' => "D",
        'csubgroup_status' => 'yes',
        'compcode' => $compcode 
       );
       if($this->db->insert('cost_subgroup',$data)){
         echo "insert";
         return true;
       }else{
         echo "error insert";
         return false;
       }

    }
  }
  public function editcsubgroupcode(){
    $add = $this->input->post();
    $data = array(
      'csubgroup_name' => $add['subgroupname'],
      'cost_status' => 'N',
      'csubgroup_status' => 'yes',
      'compcode' => $compcode,
    );
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    $this->db->where('csubgroup_code',$add['subgroupcode']);
    if($this->db->update('cost_subgroup',$data)){
      echo "update";
      return true;
    }else{
      echo "error";
      return false;
    }
  }
  public function deletecostsubgroup(){
    $add = $this->input->post();
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    $this->db->where('csubgroup_code',$add['subgroupcode']);
    if($this->db->delete('cost_subgroup')){
      echo "delete";
      return true;
    }else{
      echo "error";
      return false;
    }
  }
  public function addcspeccode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $this->db->select('cgroup_code4');
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    $this->db->where('csubgroup_code',$add['subgroupcode']);
    $res = $this->db->get('cost_subgroup')->result_array();
    if ($res[0]['cgroup_code4']==null) {
      $data = array(
        'cgroup_code4' => $add['speccode'],
        'cgroup_name4' => $add['specname'],
        'cost_status' => 'N',
        'csubgroup_status' => 'yes'

      );
      $this->db->where('ctype_code',$add['typecode']);
      $this->db->where('cgroup_code',$add['groupcode']);
      $this->db->where('csubgroup_code',$add['subgroupcode']);
      if ($this->db->update('cost_subgroup',$data)) {
        echo "Update";
        return true;
      }else{
        echo "error";
        return false;
      }
    }else{
      $data = array(
        'ctype_code' => $add['typecode'],
        'ctype_name' => $add['typename'],
        'cgroup_code' => $add['groupcode'],
        'cgroup_name' => $add['groupname'],
        'csubgroup_code' => $add['subgroupcode'],
        'csubgroup_name' => $add['subgroupname'],
        'cgroup_code4' => $add['speccode'],
        'cgroup_name4' => $add['specname'],
        'cost_status' => 'N',
        'costhead' => "D",
        'csubgroup_status' => 'yes',
        'compcode' => $compcode 
       );
       if($this->db->insert('cost_subgroup',$data)){
         echo "insert";
         return true;
       }else{
         echo "error insert";
         return false;
       }

    }
  }
  public function editcspeccode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $data = array(
      'cgroup_name4' => $add['specname'],
      'cost_status' => 'N',
      'csubgroup_status' => 'yes',
      'compcode' => $compcode,
    );
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    $this->db->where('csubgroup_code',$add['subgroupcode']);
    $this->db->where('cgroup_code4',$add['speccode']);
    if($this->db->update('cost_subgroup',$data)){
      echo "update";
      return true;
    }else{
      echo "error";
      return false;
    }
  }
  public function deletecostspec(){
    $add = $this->input->post();
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    $this->db->where('csubgroup_code',$add['subgroupcode']);
    $this->db->where('cgroup_code4',$add['speccode']);
    if($this->db->delete('cost_subgroup')){
      echo "delete";
      return true;
    }else{
      echo "error";
      return false;
    }
  }
  public function addcbrandcode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $this->db->select('cgroup_code5');
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    $this->db->where('csubgroup_code',$add['subgroupcode']);
    $this->db->where('cgroup_code4',$add['speccode']);
    $res = $this->db->get('cost_subgroup')->result_array();
    if ($res[0]['cgroup_code5']==null) {
      $data = array(
        'cgroup_code5' => $add['brandcode'],
        'cgroup_name5' => $add['brandname'],
        'cost_status' => 'N',
        'csubgroup_status' => 'yes'

      );
      $this->db->where('ctype_code',$add['typecode']);
      $this->db->where('cgroup_code',$add['groupcode']);
      $this->db->where('csubgroup_code',$add['subgroupcode']);
      $this->db->where('cgroup_code4',$add['speccode']);
      if ($this->db->update('cost_subgroup',$data)) {
        echo "Update";
        return true;
      }else{
        echo "error";
        return false;
      }
    }else{
      $data = array(
        'ctype_code' => $add['typecode'],
        'ctype_name' => $add['typename'],
        'cgroup_code' => $add['groupcode'],
        'cgroup_name' => $add['groupname'],
        'csubgroup_code' => $add['subgroupcode'],
        'csubgroup_name' => $add['subgroupname'],
        'cgroup_code4' => $add['speccode'],
        'cgroup_name4' => $add['specname'],
        'cgroup_code5' => $add['brandcode'],
        'cgroup_name5' => $add['brandname'],
        'cost_status' => 'N',
        'costhead' => "D",
        'csubgroup_status' => 'yes',
        'compcode' => $compcode 
       );
       if($this->db->insert('cost_subgroup',$data)){
         echo "insert";
         return true;
       }else{
         echo "error insert";
         return false;
       }

    }
  }
  public function editcbrandcode(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $data = array(
      'cgroup_name5' => $add['brandname'],
      'cost_status' => 'N',
      'csubgroup_status' => 'yes',
      'compcode' => $compcode,
    );
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    $this->db->where('csubgroup_code',$add['subgroupcode']);
    $this->db->where('cgroup_code4',$add['speccode']);
    $this->db->where('cgroup_code5',$add['brandcode']);
    if($this->db->update('cost_subgroup',$data)){
      echo "update";
      return true;
    }else{
      echo "error";
      return false;
    }
  }
  public function deletecostbrand(){
    $add = $this->input->post();
    $this->db->where('ctype_code',$add['typecode']);
    $this->db->where('cgroup_code',$add['groupcode']);
    $this->db->where('csubgroup_code',$add['subgroupcode']);
    $this->db->where('cgroup_code4',$add['speccode']);
    $this->db->where('cgroup_code5',$add['brandcode']);
    if($this->db->delete('cost_subgroup')){
      echo "delete";
      return true;
    }else{
      echo "error";
      return false;
    }
  }
  public function testchk(){
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $username = $session_data['username'];
    $dataarr = $this->input->post('data');
    $usrid = $this->input->post('userid');
    // print_r($dataarr);
    // $status  = 'Y';
    foreach ($dataarr as $key => $value) {
      $data = array(
        'project_status' => "Y",
        'user_edit' => $username
      );
      $this->db->where('proj_user',$usrid);
      $this->db->where('project_id',$value);
      $this->db->where('compcode',$compcode);
      $this->db->update('project_ic',$data);
    }
  }
  public function testunchk(){
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $username = $session_data['username'];
    $dataarr = $this->input->post('data');
    $usrid = $this->input->post('userid');
    // print_r($data);
    $data = array(
      'project_status' => "N",
      'user_edit' => $username
    );
    $this->db->where('proj_user',$usrid);
    $this->db->where('compcode',$compcode);
    $this->db->update('project_ic',$data);
    if ($dataarr) {
      foreach ($dataarr as $key => $value) {
            echo $value;
            $data = array(
              'project_status' => "Y",
              'user_edit' => $username
            );
            $this->db->where('proj_user',$usrid);
            $this->db->where('project_id',$value);
            $this->db->where('compcode',$compcode);
            $this->db->update('project_ic',$data);
        
        
      }
    }else{
        $data = array(
          'project_status' => "N",
          'user_edit' => $username
        );
        $this->db->where('proj_user',$usrid);
        $this->db->where('compcode',$compcode);
        $this->db->update('project_ic',$data);
    }
  }
  public function permisallchk(){
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $username = $session_data['username'];
    $usrid = $this->input->post('userid');
    $data = array(
      'project_status' => "Y",
      'user_edit' => $username
    );
    $this->db->where('proj_user',$usrid);
    $this->db->where('compcode',$compcode);
    $this->db->update('project_ic',$data);
  }
  public function permisallunchk(){
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $username = $session_data['username'];
    $usrid = $this->input->post('userid');
    $data = array(
      'project_status' => "N",
      'user_edit' => $username
    );
    $this->db->where('proj_user',$usrid);
    $this->db->where('compcode',$compcode);
    $this->db->update('project_ic',$data);
  }

}
