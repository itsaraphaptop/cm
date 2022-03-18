<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gl_active extends CI_Controller {
       public function __construct() {
       date_default_timezone_set( 'Asia/Bangkok' );
        parent::__construct();
        $this->load->helper(array('form', 'url','file'));
        $this->load->library('image_lib');
        $this->load->helper('date');
    }

    public function glposttest()
    {
      echo "testpost";
      return true;
    }
        public function addjournal(){

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          // echo '<pre>';
          // print_r($add);die();

            $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('gl_batch_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
                $jvcode = "JV".date($datestring).date($mm)."000"."1";
                $id_vocher ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('id_vocher','desc');
               $this->db->limit('1');
               $q = $this->db->get('gl_batch_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->id_vocher+1;
               }

               if ($x1<=9) {
                  $jvcode = "JV".date($datestring).date($mm)."000".$x1;
                  $id_vocher = $x1;
               }
               elseif ($x1<=99) {
                 $jvcode = "JV".date($datestring).date($mm)."00".$x1;
                 $id_vocher = $x1;
               }
               elseif ($x1<=999) {
                 $jvcode = "JV".date($datestring).date($mm)."0".$x1;
                 $id_vocher = $x1;
               }
             }
             
            // $add = $this->input->post();

            if($add['chk_i_u']=="I"){
                 $data = array(
                   'vchno' => $jvcode,
                   'id_vocher' => $id_vocher,
                   'vchdate' => $add['vchdate'],
                   'glyear' => $add['glyear'],
                   'glperiod' => $add['glperiod'],
                   'bookcode' => $add['bookcode'],
                   'refno' => $add['refnoo'],
                   'refdate' => $add['refdate'],
                   'sffumdr' => $add['sffumdr'],
                   'sffumcr' => $add['sffumcr'],  
                   'datatype' => $add['datatype'], 
                   'dpt_code' => $add['dpt_code'],  
                   'pucost' => $add['pucost'], 
                  //  'printform' => $add['printform'],  
                  //  'auto' => $add['auto'], 
                   'pre_event' => $add['pre_event'],
                   'tax' => $add['hites'],
                   'depre' => $add['deprec'],
                   'woff' => $add['woff'],
                   'module' => $add['module'],
                   'gl_type' => $add['type'],          
                   'adduser' => $username,
                   'adddate' => date('Y-m-d'),
                   'addtime' => date('H:i:s'),
                   'compcode' => $compcode,
                 );

                 $this->db->insert('gl_batch_header',$data);

            $data_deprec = array(
              'status' => "open",
              'vchno' => $jvcode,
            );
            $this->db->where('de_code',$add['deprec']);
            $this->db->update('depreciation',$data_deprec);

            $data_write = array(
              'status' => "open",
              'vchno' => $jvcode,
            );
            $this->db->where('off_code',$add['woff']);
            $this->db->update('fa_writeoff',$data_deprec);


                 // var_dump(count($add['chki']));
                 // die();
           for ($i=0; $i < count($add['chki']); $i++) {
            if($add['chki'][$i]!=""){ 
                  $data_d = array(
                   'vchno' => $jvcode,
                   'ac_code' => $add['acc_code'][$i],
                   'ac_name' => $add['acc_name'][$i],
                   'costcode' => $add['costcode'][$i],
                   'costname' => $add['costname'][$i],
                   
                   'amtdr' => parse_num($add['dr'][$i]),
                   'amtcr' => parse_num($add['cr'][$i]),


                   'varchar' => $add['ven_code'][$i],
                   'namevendor' => $add['ven_name'][$i],
                   'cust_code' => $add['cus_code'][$i],
                   'namecus' => $add['cus_name'][$i],


                   'jobcode' => $add['sys_code'][$i],
                   'systemname' => $add['sys_name'][$i],
                   'gldesc' => $add['description'][$i],
                   // 'dpt_title' => $add['dep_name'][$i],
                   // 'dpt_code' => $add['dep_code'][$i],
                   'project_name' => $add['pro_name'][$i],
                   'project_id' => $add['pro_code'][$i],
                   'refdocdate' => $add['refdates'][$i],
                   'amount' => $add['amt'][$i],
                   'taxper' => $add['vat'][$i],
                   'refno' => $add['refno'][$i],
                   // 'tax' => $add['tax'][$i],
                   'paid' => $add['paid'][$i],
                   'taxamount' => $add['taxamt'][$i],
                   'taxtype' => $add['taxtype'][$i],
                   'taxno' => $add['taxnos'][$i],
                   'taxdate' => $add['taxdates'][$i],
                   'taxdes' => $add['taxdesc'][$i],
                   'taxid' => $add['taxid'][$i],
                   'address' => $add['address'][$i],
                   'wtno' => $add['wt'][$i],
                   'adduser' => $username,
                   'maincode' => $compcode,
                   'adddate' => date('Y-m-d'),
                   'addtime' => date('H:i:s'),
                   // 'boq_id' => $add['boq_id'][$i],
                   // 'bd_tender' =>$add["bd_tenid"][$i]

                  ); 
                  $this->db->insert('gl_batch_details',$data_d);
                  $data = null;

              }

              if($add['chkitype'][$i]=="I"){
                $data_i = array(
                  'status' => "open",
                  'vchno' => $jvcode,
                );
                $this->db->where('is_doccode',$add['ref'][$i]);
                $this->db->update('ic_issue_h',$data_i);
              }else if($add['chkitype'][$i]=="O"){
                $data_o = array(
                  'status' => "open",
                  'vchno' => $jvcode,
                );
                $this->db->where('po_reccode',$add['ref'][$i]);
                $this->db->update('receive_po',$data_o);
              }else if($add['chkitype'][$i]=="T"){
                $data_t = array(
                  'status' => "open",
                  'vchno' => $jvcode,
                );
                $this->db->where('transfer_code',$add['ref'][$i]);
                $this->db->update('ic_transfer',$data_t);
              }
            }
          }else if($add['chk_i_u']=="U"){

            $datau = array(
                   // 'vchno' => $jvcode,
                   'id_vocher' => $id_vocher,
                   'vchdate' => $add['vchdate'],
                   'glyear' => $add['glyear'],
                   'glperiod' => $add['glperiod'],
                   'bookcode' => $add['bookcode'],
                   'refno' => $add['refnoo'],
                   'refdate' => $add['refdate'],
                   'sffumdr' => $add['sffumdr'],
                   'sffumcr' => $add['sffumcr'],  
                   'datatype' => $add['datatype'], 
                   'dpt_code' => $add['dpt_code'],  
                   'pucost' => $add['pucost'], 
                  //  'printform' => $add['printform'],  
                  //  'auto' => $add['auto'], 
                   'pre_event' => $add['pre_event'],
                   'tax' => $add['hites'],
                   'depre' => $add['deprec'],
                   'woff' => $add['woff'],
                   'module' => $add['module'],
                   'gl_type' => $add['type'],          
                   'adduser' => $username,
                   'adddate' => date('Y-m-d'),
                   'addtime' => date('H:i:s'),
                   'compcode' => $compcode,
                 );
                 $this->db->where('vchno',$add['vchno']);
                 $this->db->update('gl_batch_header',$datau);


           for ($i=0; $i < count($add['chki']); $i++) {
            if($add['chki'][$i]!=""){ 
                  $data_du = array(
                   // 'vchno' => $jvcode,
                   'ac_code' => $add['acc_code'][$i],
                   'ac_name' => $add['acc_name'][$i],
                   'costcode' => $add['costcode'][$i],
                   'costname' => $add['costname'][$i],
                   'cust_code' => $add['cus_code'][$i],
                   'namecus' => $add['cus_name'][$i],
                   'amtdr' => parse_num($add['dr'][$i]),
                   'amtcr' => parse_num($add['cr'][$i]),
                   'varchar' => $add['ven_code'][$i],
                   'namevendor' => $add['ven_name'][$i],
                   'jobcode' => $add['sys_code'][$i],
                   'systemname' => $add['sys_name'][$i],
                   'gldesc' => $add['description'][$i],
                   // 'dpt_title' => $add['dep_name'][$i],
                   // 'dpt_code' => $add['dep_code'][$i],
                   'project_name' => $add['pro_name'][$i],
                   'project_id' => $add['pro_code'][$i],
                   'refdocdate' => $add['refdates'][$i],
                   'amount' => $add['amt'][$i],
                   'taxper' => $add['vat'][$i],
                   'refno' => $add['refno'][$i],
                   // 'tax' => $add['tax'][$i],
                   'paid' => $add['paid'][$i],
                   'taxamount' => $add['taxamt'][$i],
                   'taxtype' => $add['taxtype'][$i],
                   'taxno' => $add['taxnos'][$i],
                   'taxdate' => $add['taxdates'][$i],
                   'taxdes' => $add['taxdesc'][$i],
                   'taxid' => $add['taxid'][$i],
                   'address' => $add['address'][$i],
                   'wtno' => $add['wt'][$i],
                   'adduser' => $username,
                   'maincode' => $compcode,
                   'adddate' => date('Y-m-d'),
                   'addtime' => date('H:i:s'),
                   // 'boq_id' => $add['boq_id'][$i],
                   // 'bd_tender' =>$add["bd_tenid"][$i]

                  );
                  $this->db->where('vchid',$add['vchid'][$i]); 
                  $this->db->update('gl_batch_details',$data_du);
                  $data = null;

              }
 }
          }

echo $jvcode;
return true;
         // redirect('gl_tran/edit_journalvocher/'.$jvcode);
           }

          public function edit_jounal()
          {
            $input = $this->input->post();
          }

          public function load_journal()
            {
            $this->load->model('datastore_m');
            $data['loadj'] = $this->datastore_m->journal();
            $this->load->view('office/account/gl/gl_transaction/load_journal_v',$data);
            }
          public function load_journaltable()
            {
             $ref = $this->uri->segment(3);
            $this->load->model('datastore_m');
            $data['prd'] = $this->datastore_m->table_journal($ref);
             $this->load->view('office/account/gl/gl_transaction/load_journal_table_v',$data);
            }

            public function save_vocher()
            {
              $add = $this->input->post();
              $ins = array(
                'vchno' => $add['vchno'],
                'vchdate' => $add['vchdate'],
                'glyear' => $add['glyear'],
                'datatype' => $add['datatype'],
                'bookcode' => $add['bookcode'],
                'bookname' => $add['bookname'],
                'refno' => $add['refno'],
                'refdate' => $add['refdate'],
                'remark' => $add['remark'],
                'pucost' => $add['pucost'],
                'printform' => $add['printform'],
                'auto' => $add['auto'],
                'sffumdr' => $add['sffumdr'],
                'sffumcr' => $add['sffumcr'],

                
              );
              $this->db->insert('gl_batch_header',$ins);
              redirect('/');
            }
    public function addaccountperod()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $ins = array(
        'glyear' => $add['gl_year'],
        'glperiod' => $add['gl_period'],
        'begdate' => $add['s_dates'],
        'enddate' => $add['e_dates'],
        'active' => "Y",
       'adduser' => $username,
       'adddate' => date('Y-m-d H:i:s'),
       'compcode' => $compcode        
      );
      $this->db->insert('gl_period',$ins);
      redirect('gl/gl_accountperiod');
    }

     public function editaccperiod()
    {
      $id = $this->uri->segment(3);
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $ins = array(
        'glyear' => $add['gl_year'],
        'glperiod' => $add['gl_period'],
        'begdate' => $add['s_date'],
        'enddate' => $add['e_date'],
        'active' => $add['act_status'],
        // 'adduser' => $username,
        // 'adddate' => date('Y-m-d H:i:s'),
        'compcode' => $compcode        
      );
      $this->db->where('gl_id',$id);
      $this->db->update('gl_period',$ins);
      redirect('gl/gl_accountperiod');
    }

    public function gl_accperiod_de()
    {
      $id = $this->uri->segment(3);
      $this->db->where('gl_id',$id);
      $this->db->delete('gl_period');
      redirect('gl/gl_accountperiod');
    }

    public function autoaccountperod()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();

      $this->db->where("compcode",$compcode); 
      $this->db->where("glyear",$add['act_year']); 
      $this->db->delete("gl_period");
      
      for ($i=0; $i < count($add['act_period']); $i++) {
        if($add['act_period'][$i]!=""){  
          $ins = array(
            'glyear' => $add['act_year'],
            'glperiod' => $add['act_period'][$i],
            'begdate' => $add['s_date'][$i],
            'enddate' => $add['e_date'][$i],
            'active' => "Y",
            'adduser' => $username,
            'adddate' => date('Y-m-d H:i:s'),
            'compcode' => $compcode        
          );
          $this->db->insert('gl_period',$ins);
          
        }
      }
      redirect('gl/gl_accountperiod');
    }

     public function editbookaccount(){
        $id = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        $data = array(
          'bookcode' =>$add['e_code'] ,
          'booknamz'=>$add['e_name'],
          'gl_type' =>$add['e_type'],
          'edituser' => $username,
          'active' =>$add['act_status'],
          'editdate' => date('Y-m-d H:i:s'),
          'compcode' => $compcode  
       );
        $this->db->where('bookcode',$id);
       $this->db->update('gl_book',$data);

       redirect('gl/gl_bookaccount');

      }

       public function addbookaccount(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        $data = array(
          'bookcode' =>$add['e_code'] ,
          'booknamz'=>$add['e_name'],
          'gl_type' =>$add['e_type'],
          'adduser' => $username,
          'active' => "Y",
          'adddate' => date('Y-m-d H:i:s'),
          'compcode' => $compcode  
       );
       $this->db->insert('gl_book',$data);

       redirect('gl/gl_bookaccount');

      }
      

      public function deletebook()
    {
      $id = $this->uri->segment(3);
      $this->db->where('bookcode',$id);
      $this->db->delete('gl_book');
      redirect('gl/gl_bookaccount');
    }
    public function upglstatus(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        
        for ($i=0; $i < count($add['glid']) ; $i++) { 

         echo $add['glid'][$i]."<br/>";
         $data = array(
            'status' => "Y",
          );
         $this->db->where('gl_id',$add['glid'][$i]);
         $this->db->update('gl_post_system',$data);
        }            

       redirect('gl_tran/gl_ledger');

      }
      public function ar_clearremore()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $aa =$this->input->post('dataid');
          $bb = array('status' => "N" );
          $this->db->where("gl_id",$this->input->post('dataid'));
          $this->db->update('ar_receiving_header',$dd);
          $data = array(
              'ar_comment' => $this->input->post('comment'),
              'userdel' => $username,
              'deldate' => date('Y-m-d H:i:s',now()),
              'cl_status' => "D"
          );
          $this->db->where("cl_no",$clno);
           if($this->db->update('ar_clear_header',$data))
          {
            echo $clno;
          }else{
            echo "error";
            return false;
          }
    }

      public function selectdate()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $y = $this->input->post('y');
      $m = $this->input->post('m');
      $d = $this->input->post('d');
      file_put_contents("output.txt", "{$y} {$m} {$d}");

      $ps=$this->db->query("select count(gl_id) as countact from gl_period where active='Y' and glperiod='$m' and glyear='$y' and compcode = '$compcode'")->result();
      foreach ($ps as $key => $value) {
        if ($value->countact==0) {
        echo "N";
        return true;
        }else{
        echo "Y";
        return true;
        }
      }
    }
  
    public function gl_ledger_post()
    {

      $year = $this->uri->segment(3);
      $month = $this->uri->segment(4);
      $session_data = $this->session->userdata('sessed_in');
       $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        $data_ar = array(
          'status' => "Y",
          'userclose' => $username,
          'dateclose' => date('Y-m-d H:i:s',now()),
       );
        $this->db->where('compcode',$compcode);
        $this->db->where('gl_year',$year);
        $this->db->where('gl_period',$month);
        $this->db->update('gl_post_ar',$data_ar);

        $data_ap = array(
          'status' => "Y",
          'userclose' => $username,
          'dateclose' => date('Y-m-d H:i:s',now()),
       );
        $this->db->where('compcode',$compcode);
        $this->db->where('gl_year',$year);
        $this->db->where('gl_period',$month);
        $this->db->update('gl_post_ap',$data_ap);

       redirect('gl_tran/gl_ledger');
  }

  public function ap_post_gl(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
       $data = array(
        'vchno' => $add['vchno'],
        'id_vocher' => $add['id_vocher'],
        'vchdate' => $add['gldate'],
        'glyear' => $add['glyear'],
        'glperiod' => $add['glperiod'],
        'bookcode' => $add['bookcode'],
        'remark' => "Data Transfer from AP System",
        'module' => "GL",
        'gl_type' => "AP",
        'adduser' => $username,
        'adddate' => date('Y-m-d'),
        'addtime' => date('H:i:s'),
        'compcode' => $compcode,
        'post' => 'wait',
       );

      $this->db->insert('gl_batch_header',$data);

      for ($i=0; $i < count($add['acct_no']); $i++) {
            $data_d = array(
                   'vchno' => $add['vchno'],
                   'ac_code' => $add['acct_no'][$i],
                   'ac_name' => $add['act_name'][$i],
                   'costcode' => $add['costcode'][$i],
                   'costname' => $add['costname'][$i],
                   
                   'amtdr' => parse_num($add['dr'][$i]),
                   'amtcr' => parse_num($add['cr'][$i]),
                   'varchar' => $add['varchar'][$i],
                   'namevendor' => $add['namevendor'][$i],
                   'jobcode' => $add['systemcode'][$i],
                   'systemname' => $add['systemname'][$i],
                   
                   'project_name' => $add['project_name'][$i],
                   'project_id' => $add['projectid'][$i],
                   
                   'adduser' => $username,
                   'maincode' => $compcode,
                   'adddate' => date('Y-m-d'),
                   'addtime' => date('H:i:s'),
                   
                  ); 
               $this->db->insert('gl_batch_details',$data_d);
                  
          }


          if($add['datatype']=="all"){
            $data_apgl = array(
              'vchno_gl' => $add['vchno'],
              'status' => 'open',
            );
          $this->db->where('ap_gl.vchdate >=',$add['start']);
          $this->db->where('ap_gl.vchdate <=',$add['stop']);
          $this->db->update('ap_gl',$data_apgl);
          }else{
            $data_apgl2 = array(
              'vchno_gl' => $add['vchno'],
              'status' => 'open',
            );
          $this->db->where('ap_gl.doctype',$add['datatype']);
          $this->db->where('ap_gl.vchdate >=',$add['start']);
          $this->db->where('ap_gl.vchdate <=',$add['stop']);
          $this->db->update('ap_gl',$data_apgl2);
          }

      redirect('ap/post_ap_to_gl');
  }

  public function unpost_ap(){
    $id = $this->uri->segment(3);
    $type = $this->uri->segment(4);

    if($type=="AP"){
    $data_gl = array(
      'vchno_gl' => NULL,
      'status' => NULL,
    );
    $this->db->where('ap_gl.vchno_gl',$id);
    $this->db->update('ap_gl',$data_gl);

    $this->db->where('gl_batch_header.vchno', $id);
    $this->db->delete('gl_batch_header');

    $this->db->where('gl_batch_details.vchno', $id);
    $this->db->delete('gl_batch_details');
      
    $return['status'] = true;
    echo json_encode($return);
    }else if($type=="AR"){
      $data_gl = array(
      'vchno_gl' => NULL,
      'status' => NULL,
    );
    $this->db->where('ar_gl.vchno_gl',$id);
    $this->db->update('ar_gl',$data_gl);

    $this->db->where('gl_batch_header.vchno', $id);
    $this->db->delete('gl_batch_header');

    $this->db->where('gl_batch_details.vchno', $id);
    $this->db->delete('gl_batch_details');
      
    $return['status'] = true;
    echo json_encode($return);
    }
   
  }


    public function ar_post_gl(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
       $data = array(
        'vchno' => $add['vchno'],
        'id_vocher' => $add['id_vocher'],
        'vchdate' => $add['gldate'],
        'glyear' => $add['glyear'],
        'glperiod' => $add['glperiod'],
        'bookcode' => $add['bookcode'],
        'remark' => "Data Transfer from AR System",
        'module' => "GL",
        'gl_type' => "AR",
        'adduser' => $username,
        'adddate' => date('Y-m-d'),
        'addtime' => date('H:i:s'),
        'compcode' => $compcode,
        'post' => 'wait',
       );

      $this->db->insert('gl_batch_header',$data);

      for ($i=0; $i < count($add['acct_no']); $i++) {
            $data_d = array(
                   'vchno' => $add['vchno'],
                   'ac_code' => $add['acct_no'][$i],
                   'ac_name' => $add['act_name'][$i],
                   'costcode' => $add['costcode'][$i],
                   'costname' => $add['costname'][$i],
                   
                   'amtdr' => parse_num($add['dr'][$i]),
                   'amtcr' => parse_num($add['cr'][$i]),

                   'jobcode' => $add['systemcode'][$i],
                   'systemname' => $add['systemname'][$i],
                   'cust_code' => $add['cust_code'][$i],
                   'namecus' => $add['namecus'][$i],
                   'project_id' => $add['projectid'][$i],
                   'project_name' => $add['project_name'][$i],
                    
                   'adduser' => $username,
                   'maincode' => $compcode,
                   'adddate' => date('Y-m-d'),
                   'addtime' => date('H:i:s'),
                  ); 
               $this->db->insert('gl_batch_details',$data_d);
                  
          }

          if($add['datatype']=="all"){
            $data_argl = array(
              'vchno_gl' => $add['vchno'],
              'status' => 'open',
            );
          $this->db->where('ar_gl.vchdate >=',$add['start']);
          $this->db->where('ar_gl.vchdate <=',$add['stop']);
          $this->db->update('ar_gl',$data_argl);
          }else{
            $data_argl2 = array(
              'vchno_gl' => $add['vchno'],
              'status' => 'open',
            );
          $this->db->where('ar_gl.doctype',$add['datatype']);
          $this->db->where('ar_gl.vchdate >=',$add['start']);
          $this->db->where('ar_gl.vchdate <=',$add['stop']);
          $this->db->update('ar_gl',$data_argl2);
          }

      redirect('ar/ar_post_gl');
  }

  public function post_gl_h(){
    $add = $this->input->post();
    for ($i=0; $i < count($add['vchno_post']); $i++) {
     $data_argl = array(
              'post' => "P", 
            );
     $this->db->where('vchno',$add['vchno_post'][$i]);
     $this->db->update('gl_batch_header',$data_argl);
     }
     redirect('gl_tran/gl_ledger');
     
  }
}
