<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bd_active extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('datastore_m');
        		$this->load->library('pagination');
            $this->load->helper(array('form', 'url','file'));
            $this->load->library('image_lib');
        }

 public function material_id_alone()
        {
          $id = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $input = $this->input->post('name');
          $allmaterial = $this->datastore_m->allmatbb_concat($input);

         // $this->load->view('datastore/share/mmmm_v',$data);
         
       foreach ($allmaterial as $vali){ 
        $this->db->select('matsubgroup_name,matsubgroup_code');
        $this->db->where('mattype_code',$vali->mattype_code);
        $this->db->where('matgroup_code',$vali->matgroup_code);
        $this->db->where('matsubgroup_code',$vali->matsubgroup_code);
        $q = $this->db->get('mat_subgroup')->result();
        foreach ($q as $key => $value) {
          $mname = $value->matsubgroup_name;
          $mcode = $value->matsubgroup_code;
        }  
        echo "<tr>".
          "<td>".$vali->materialcode."</td>".
          "<td>".$mname."</td>".
          "<td class='text-left'>".$vali->mater." ".$vali->matunit_name."</td>".
          "<td><button type='button' class='label label-primary' data-dismiss='modal' id='sell".$vali->materialcode."' onclick='render_mat".$vali->materialcode."()'> Select</button></td>".
          "</tr>".
          "<script>".
           "function render_mat".$vali->materialcode."(){ ".

            "$('#laborcode').val('".$vali->materialcode."');".
            "$('#laborname').val('".$vali->mater."');".
            "if($('#newmatcode').val()==''){".
              "$('#unitname').val('".$vali->matunit_name."');".
              "$('#unitcode').val('".$mcode."');".
              "$('#matboq').val('".$vali->mater."');".
            "}".
            "$('#laborcode".$id."').val('".$vali->materialcode."');".
            "$('#laborname".$id."').val('".$vali->mater."');".

            "if($('#newmatcode".$id."').val()==''){".
             "$('#unitname".$id."').val('".$vali->matunit_name."');".
             // "$('#newmatnamee".$id."').val('".$vali->matunit_name."');".
              "$('#unitcode".$id."').val('".$mcode."');".
              "$('#matboq".$id."').val('".$vali->mater."');".
            "}".

            "$('#lmc".$id."').val('".$vali->materialcode."');".
            "$('#lmn".$id."').val('".$vali->mater."');".
            


          "}".

          "</script>";

 } 
          return true;
        }
    
      public function material_id_alonee()
      {
          $id = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $input = $this->input->post('name');
          $allmaterial = $this->datastore_m->allmatbb_concat($input);

         // $this->load->view('datastore/share/mmmm_v',$data);

           foreach ($allmaterial as $vali){ 
            $this->db->select('matsubgroup_name,matsubgroup_code');
            $this->db->where('mattype_code',$vali->mattype_code);
            $this->db->where('matgroup_code',$vali->matgroup_code);
            $this->db->where('matsubgroup_code',$vali->matsubgroup_code);
            $q = $this->db->get('mat_subgroup')->result();
            foreach ($q as $key => $value) {
              $mname = $value->matsubgroup_name;
              $mcode = $value->matsubgroup_code;
            }  
            echo "<tr>".
            "<td>".$vali->materialcode."</td>".
            "<td>".$mname."</td>".
            "<td class='text-left'>".$vali->mater." ".$vali->matunit_name."</td>".
            "<td><button type='button' class='label label-primary'  data-dismiss='modal' id='sel".$vali->materialcode."' onclick='render".$vali->materialcode."()'> Select</button></td>".
            "</tr>".
            "<script>".
          
            "function render".$vali->materialcode."(){ ".
              "$('#newmatcode').val('".$vali->materialcode."');".       
              "$('#newmatnamee').val('".$vali->mater."');".
                "$('#unitname').val('".$vali->matunit_name."');".
                "$('#unitcode').val('".$mcode."');".
                "$('#matboq').val('".$vali->mater."');".

                "$('#newmatcode".$id."').val('".$vali->materialcode."');".
                "$('#newmatnamee".$id."').val('".$vali->mater."');".
                "$('#unitname".$id."').val('".$vali->matunit_name."');".
                "$('#unitcode".$id."').val('".$mcode."');".
                "$('#matboq".$id."').val('".$vali->mater."');".


                "$('#boq_newmatcode".$id."').val('".$vali->materialcode."');".
                "$('#boq_newmatnamee".$id."').val('".$vali->mater."');".
                "$('#boq_unitname".$id."').val('".$vali->matunit_name."');".
                "$('#boq_unitcode".$id."').val('".$mcode."');".


                "$('#mc".$id."').val('".$vali->materialcode."');".
                "$('#mn".$id."').val('".$vali->mater."');".

                "$('#unn".$id."').val('".$vali->matunit_name."');".
                "$('#unc".$id."').val('".$mcode."');".
            "}".

            "</script>";
          } 
          return true;
        }
        public function matinvenmodal(){
          $id = $this->uri->segment(3);
          $input = $this->input->post('name');
          $allmaterial = $this->datastore_m->allmatboq($input);
          foreach ($allmaterial as $key => $value) {
            echo "<tr>".
            "<td>".$value->newmatcode."</td>".
            "<td class='text-left'>".$value->mater." ".$value->unitname."</td>".
            "<td><button type='button' class='label label-primary'  data-dismiss='modal' id='sel".$value->newmatcode."' onclick='render".$value->newmatcode."()'> Select</button></td>".
            "</tr>".  
            "<script>".
          
            "function render".$value->newmatcode."(){ ".
              // "$('#newmatcode').val('".$vali->materialcode."');".       
              // "$('#newmatnamee').val('".$vali->mater."');".
              //   "$('#unitname').val('".$vali->matunit_name."');".
              //   "$('#unitcode').val('".$mcode."');".
              //   "$('#matboq').val('".$vali->mater."');".

                "$('#newmatcode".$id."').val('".$value->newmatcode."');".
                // "$('#newmatnamee".$id."').val('".$vali->mater."');".
                // "$('#unitname".$id."').val('".$vali->matunit_name."');".
                // "$('#unitcode".$id."').val('".$mcode."');".
                // "$('#matboq".$id."').val('".$vali->mater."');".


                // "$('#boq_newmatcode".$id."').val('".$vali->materialcode."');".
                // "$('#boq_newmatnamee".$id."').val('".$vali->mater."');".
                // "$('#boq_unitname".$id."').val('".$vali->matunit_name."');".
                // "$('#boq_unitcode".$id."').val('".$mcode."');".


                // "$('#mc".$id."').val('".$vali->materialcode."');".
                // "$('#mn".$id."').val('".$vali->mater."');".

                // "$('#unn".$id."').val('".$vali->matunit_name."');".
                // "$('#unc".$id."').val('".$mcode."');".
            "}".

            "</script>";

          }

        }


          public function insert_bd()
          {

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $m_id = $session_data['m_id'];
          $compcode = $session_data['compcode'];
          // $pjid =  $session_data['m_project'];
          $td = $this->uri->segment(3);
          $pj = $this->uri->segment(4);

          $type = $this->uri->segment(5);
          $add = $this->input->post();

       
         for ($i=0; $i < count($add['subcostcode']); $i++) {
          if($add['substatus'][$i]=="I"){
          $data = array
          (
          "boq_bd" => $td,
          "boq_job" => $add['job'][$i], 
          "subcostcode" => $add['subcostcode'][$i], 
          "subcostcodename" => $add['subcostcodename'][$i],
          "newmatnamee" => $add['newmatnamee'][$i],
          "newmatcode" => $add['newmatcode'][$i],
          "boqcode" => $add['boqcode'][$i],
          "matboq" => $add['matboq'][$i],
          "unitcode" => $add['unitcode'][$i],
          "unitname" => $add['unitname'][$i],
          "qty_bg" => parse_num($add['qty_bg'][$i]),
          "qtyboq" => parse_num($add['qtyboq'][$i]),
          "matpricebg" => parse_num($add['matpricebg'][$i]),
          "matamtbg" => parse_num($add['matamtbg'][$i]),
          "labpricebg" => parse_num($add['labpricebg'][$i]),
          "labamtbg" => parse_num($add['labamtbg'][$i]),

          "subpricebg" => parse_num($add['subpricebg'][$i]),
          "subamtbg" => parse_num($add['subamtbg'][$i]),

          "totalamt" => parse_num($add['totalamt'][$i]),
          "matpriceboq" => parse_num($add['matpriceboq'][$i]),
          "matamtboq" => parse_num($add['matamtboq'][$i]),
          "labpriceboq" => parse_num($add['labpriceboq'][$i]),
          "labamtboq" => parse_num($add['labamtboq'][$i]),

          "subpriceboq" => parse_num($add['subpriceboq'][$i]),
          "subamtboq" => parse_num($add['subamtboq'][$i]),

          "totalamtboq" => parse_num($add['totalamtboq'][$i]),
          "status" => "N",
          "status_boq" => "N",
          "compcode" => $compcode,
          "adduser" => $username,
          "adduser_id" => $m_id,
          "adddate" => date('y-m-d'),
           );
           $this->db->insert('boq_item',$data);
           // $pimary = $this->db->insert_id();
         
        }else if($add['substatus'][$i]=="E"){
           $data_e = array
          (
          "subcostcode" => $add['subcostcode'][$i], 
          "subcostcodename" => $add['subcostcodename'][$i],
          "newmatnamee" => $add['newmatnamee'][$i],
          "newmatcode" => $add['newmatcode'][$i],
          "boqcode" => $add['boqcode'][$i],
          "matboq" => $add['matboq'][$i],
          "unitcode" => $add['unitcode'][$i],
          "unitname" => $add['unitname'][$i],
          "qty_bg" => parse_num($add['qty_bg'][$i]),
          "qtyboq" => parse_num($add['qtyboq'][$i]),
          "matpricebg" => parse_num($add['matpricebg'][$i]),
          "matamtbg" => parse_num($add['matamtbg'][$i]),
          "labpricebg" => parse_num($add['labpricebg'][$i]),
          "labamtbg" => parse_num($add['labamtbg'][$i]),

          "subpricebg" => parse_num($add['subpricebg'][$i]),
          "subamtbg" => parse_num($add['subamtbg'][$i]),

          "totalamt" => parse_num($add['totalamt'][$i]),
          "matpriceboq" => parse_num($add['matpriceboq'][$i]),
          "matamtboq" => parse_num($add['matamtboq'][$i]),
          "labpriceboq" => parse_num($add['labpriceboq'][$i]),
          "labamtboq" => parse_num($add['labamtboq'][$i]),

          "subpriceboq" => parse_num($add['subpriceboq'][$i]),
          "subamtboq" => parse_num($add['subamtboq'][$i]),

          "totalamtboq" => parse_num($add['totalamtboq'][$i]),
          "editdate" => date('y-m-d'),
          );
           $this->db->where('boq_id',$add['boq_id'][$i]);
           $this->db->update('boq_item',$data_e);

        }
      }

          redirect('bd/add_boq/'.$td."/".$pj."/".$type);
          }



          public function submit_boq(){

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $m_id = $session_data['m_id'];
          $compcode = $session_data['compcode'];

          $add = $this->input->post();
          $td = $this->uri->segment(3);
          $pj = $this->uri->segment(4);


           $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('aps_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $bqno = "TD-BUDGET".date($datestring).date($mm)."000"."1";
                $aps_item ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('id','desc');
               $this->db->limit('1');
               $q = $this->db->get('heading_bd');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->id+1;
               }

               if ($x1<=9) {
                  $bqno = "TD-BUDGET".date($datestring).date($mm)."000".$x1;
                  $aps_item = $x1;
               }
               elseif ($x1<=99) {
                 $bqno = "TD-BUDGET".date($datestring).date($mm)."00".$x1;
                 $aps_item = $x1;
               }
               elseif ($x1<=999) {
                 $bqno = "TD-BUDGET".date($datestring).date($mm)."0".$x1;
                 $aps_item = $x1;
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
          foreach($_FILES as $field_name => $file) {
            if ( ! $this->upload->do_upload($field_name)) {
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
                'pr_ref' => $bqno,
                'date' => date('y-m-d'),
                'time' => date('H:i:s'),
                'user' => $compcode,
                );
                $this->db->insert('select_file_boq',$select_file_pr);
             
              }
            }
          } 


          if($add['status']=="W"){
          $data_h = array(
            'heading' => "Budget (".$add['heading'].")",
            'remark' => $add['remark'],
            'ref_bd' => $bqno,
            'status' => $add['status'],
            'useradd' => $username,
            'userid' => $m_id,
            'adddate' => date('y-m-d'),
            'revise' => "0",
            'compcode' => $compcode,
            'boq_bd' =>$td,
          );
          $this->db->insert('heading_bd',$data_h);

          $code = $bqno;
          }else{
          $code = "";
          }



          for ($i=0; $i < count($add['qty_bg']); $i++) {
          $data = array(
          
          "boq_job" => $add['job'][$i], 
          "subcostcode" => $add['subcostcode'][$i], 
          "subcostcodename" => $add['subcostcodename'][$i],
          "newmatnamee" => $add['newmatnamee'][$i],
          "newmatcode" => $add['newmatcode'][$i],
          "boqcode" => $add['boqcode'][$i],
          "matboq" => $add['matboq'][$i],
          "unitcode" => $add['unitcode'][$i],
          "unitname" => $add['unitname'][$i],
          "qty_bg" =>parse_num( $add['qty_bg'][$i]),
          "matpricebg" =>parse_num( $add['matpricebg'][$i]),
          "matamtbg" =>parse_num( $add['matamtbg'][$i]),
          "labpricebg" =>parse_num( $add['labpricebg'][$i]),
          "labamtbg" =>parse_num( $add['labamtbg'][$i]),
          "subpricebg" =>parse_num( $add['subpricebg'][$i]),
          "subamtbg" =>parse_num( $add['subamtbg'][$i]),

          "totalamt" =>parse_num( $add['totalamt'][$i]),
          "status" => $add['status'],
          "heading_ref" => $code,
          "compcode" => $compcode,
           );
           $this->db->where('boq_id',$add['boq_id'][$i]);
           $this->db->update('boq_item',$data);
          //  echo $i;
          }

          $this->db->select('*');
          $this->db->where('type',"TD");
          $this->db->where('approve_project',$td);
          $ma = $this->db->get('approve')->result();
          foreach ($ma as $qq) {
            $data_approve = array(
                'app_pr' => $code,
                'app_project' => $qq->approve_project,
                'app_sequence' => $qq->approve_sequence,
                'app_midid' => $qq->approve_mid,
                'app_midname' => strtolower($qq->approve_mname),
                'lock' => $qq->approve_lock,
                'status' => "no",
                'cost' => $qq->approve_cost,
                'creatuser' => $username,
                'creatudate' => date('y-m-d'),
                'compcode' => $compcode,
                'status_td' => "1",
          );
            $this->db->insert('approve_td',$data_approve);
          }



          redirect('bd/add_boq/'.$td."/".$pj);
        }



        public function submit_boq2(){

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $m_id = $session_data['m_id'];
          $compcode = $session_data['compcode'];

          $add = $this->input->post();
          $td = $this->uri->segment(3);
          $pj = $this->uri->segment(4);


           $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('aps_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $bqno = "TD-BOQ".date($datestring).date($mm)."000"."1";
                $aps_item ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('id','desc');
               $this->db->limit('1');
               $q = $this->db->get('heading_bd');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->id+1;
               }

               if ($x1<=9) {
                  $bqno = "TD-BOQ".date($datestring).date($mm)."000".$x1;
                  $aps_item = $x1;
               }
               elseif ($x1<=99) {
                 $bqno = "TD-BOQ".date($datestring).date($mm)."00".$x1;
                 $aps_item = $x1;
               }
               elseif ($x1<=999) {
                 $bqno = "TD-BOQ".date($datestring).date($mm)."0".$x1;
                 $aps_item = $x1;
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
          foreach($_FILES as $field_name => $file) {
            if ( ! $this->upload->do_upload($field_name)) {
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
                'pr_ref' => $bqno,
                'date' => date('y-m-d'),
                'time' => date('H:i:s'),
                'user' => $compcode,
                );
                $this->db->insert('select_file_boq',$select_file_pr);
             
              }
            }
          } 


          if($add['status']=="W"){
          $data_h = array(
            'heading' => "BOQ (".$add['heading'].")",
            'remark' => $add['remark'],
            'ref_bd' => $bqno,
            'status' => $add['status'],
            'useradd' => $username,
            'userid' => $m_id,
            'adddate' => date('y-m-d'),
            'revise' => "0",
            'compcode' => $compcode,
            'boq_bd' =>$td,
          );
          $this->db->insert('heading_bd',$data_h);

          $code = $bqno;
          }else{
          $code = "";
          }



          for ($i=0; $i < count($add['boq_id']); $i++) {
          $data = array(
          
          "boq_job" => $add['job'][$i], 
          "subcostcode" => $add['subcostcode'][$i], 
          "subcostcodename" => $add['subcostcodename'][$i],
          "newmatnamee" => $add['newmatnamee'][$i],
          "newmatcode" => $add['newmatcode'][$i],
          "boqcode" => $add['boqcode'][$i],
          "matboq" => $add['matboq'][$i],
          "unitcode" => $add['unitcode'][$i],
          "unitname" => $add['unitname'][$i],
          // "qty_bg" => parse_num($add['qty_bg'][$i]),
          "qtyboq" => parse_num($add['qtyboq'][$i]),
          // "matpricebg" => parse_num($add['matpricebg'][$i]),
          // "matamtbg" => parse_num($add['matamtbg'][$i]),
          // "labpricebg" => parse_num($add['labpricebg'][$i]),
          // "labamtbg" => parse_num($add['labamtbg'][$i]),
          // "subpricebg" => parse_num($add['subpricebg'][$i]),
          // "subamtbg" => parse_num($add['subamtbg'][$i]),

          // "totalamt" => parse_num($add['totalamt'][$i]),
          "matpriceboq" => parse_num($add['matpriceboq'][$i]),
          "matamtboq" => parse_num($add['matamtboq'][$i]),
          "labpriceboq" => parse_num($add['labpriceboq'][$i]),
          "labamtboq" => parse_num($add['labamtboq'][$i]),
          "subpriceboq" => parse_num($add['subpriceboq'][$i]),
          "subamtboq" => parse_num($add['subamtboq'][$i]),
          "totalamtboq" => parse_num($add['totalamtboq'][$i]),
          "status_boq" => $add['status'],
          "heading_ref_boq" => $code,
          "compcode" => $compcode,
           );
           $this->db->where('boq_id',$add['boq_id'][$i]);
           $this->db->update('boq_item',$data);


           
          }

          $this->db->select('*');
          $this->db->where('type',"TD");
          $this->db->where('approve_project',$td);
          $ma = $this->db->get('approve')->result();
          foreach ($ma as $qq) {
            $data_approve = array(
                'app_pr' => $code,
                'app_project' => $qq->approve_project,
                'app_sequence' => $qq->approve_sequence,
                'app_midid' => $qq->approve_mid,
                'app_midname' => strtolower($qq->approve_mname),
                'lock' => $qq->approve_lock,
                'status' => "no",
                'cost' => $qq->approve_cost,
                'creatuser' => $username,
                'creatudate' => date('y-m-d'),
                'compcode' => $compcode,
                'status_td' => "2",
          );
            $this->db->insert('approve_td',$data_approve);
          }



          redirect('bd/add_boq/'.$td."/".$pj);
        }


          public function deleteboq()
              {
               $session_data = $this->session->userdata('sessed_in');
               $username = $session_data['username'];
               $compcode = $session_data['compcode'];
               $id = $this->uri->segment(3);
            	$this->db-> where('boq_id',$id);
           	$this->db-> delete('boq_item');
              }


          public function insert_boqapp()
          {
          $session_data = $this->session->userdata('sessed_in');
           $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            // $pjid =  $session_data['m_project'];
            $pj = $this->uri->segment(3);
             $rv = $this->uri->segment(4);
             $idd = $this->uri->segment(5);
            $add = $this->input->post();
            $data = array
            (
             'cos_control'=>$add['ct'.$idd],
             'cos_code'=>$add['cosmat'.$idd],
            'cos_control'=>$add['percent'.$idd],
            'adddate' => date('y-m-d'),
            'adduser'=>$username,
            'compcode'=>$compcode,
           );
           $this->db->insert('boq_control',$data);
           redirect('bd/boq_approve/'.$pj.'/'.$rv);
          } 

    public function bd_pjtender() {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
             $tenderid = $this->uri->segment(3);
             $add = $this->input->post();
            //  print_r($add);
            //  die();
             $module = 'Tender';
             $module_type = '';
             $project = '';
             $input = $add['bd_month'];
            //  $count_row = 0;
   
             $datestring = "Y";
             $m = "m";
             $d = "d";
             $this->db->select('*');
             $this->db->where('compcode',$compcode);
             $qu = $this->db->get('bdtender_h');
             $count_row = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
             if ($count_row==0) {
               //  $bd = "BD".date($datestring).date($m).date($d)."1";
               $count_row = 1;
               $bd = $this->datastore_m->RunningNumber($module_type,$count_row,$input,$project,$module);
              
             }else{
                 $this->db->select('*');
                 $this->db->where('bd_month',$input);
                 $this->db->where('compcode',$compcode);
                 $this->db->order_by('bd_no','desc');
                 $this->db->limit('1');
                 $q = $this->db->get('bdtender_h');
                 $run = $q->result();
                 
                   foreach ($run as $valx)
                   {
                     $bd_month = $valx->bd_month;
                   }
                   // $bd = "BD".date($datestring).date($m).date($d).$x1;
                   if (isset($bd_month)==$input) {
                     $month = $bd_month;
                     $this->db->select('*');
                     $this->db->where('bd_month',$input);
                     $this->db->where('compcode',$compcode);
                     $count = $this->db->get('bdtender_h')->num_rows();
                     $x1 = $count+1;
                     $bd = $this->datastore_m->RunningNumber($module_type,$x1,$bd_month,$project,$module);
                    }else{
                      // echo "dd";
                      // die();
                      $x1 = 1;
                      $dd = $input;
                      $bd = $this->datastore_m->RunningNumber($module_type,$x1,$dd,$project,$module);
                    }
                    
                  }

      if($add['bd_chk']=="I"){
      
              $ins = array(
                      'bd_tenid' => $bd, 
                      'bd_type' => $add['bd_type'],
                      'bd_status' => $add['bd_bdstatus'],
                      'bd_pno' => $add['bd_pno'],
                      'bd_pname' => $add['bd_pname'],
                      'bd_date' => $add['bd_date'],
                      'bd_year' => $add['bd_year'],
                      'bd_month' => $add['bd_month'],
                      'bd_bdstats' => $add['bd_bdstats'],
                      'bd_cus' => $add['bd_cus'],
                      'bd_cusn' => $add['bd_cusn'],
                      'bd_conno' => $add['bd_conno'],
                      'bd_conname' => $add['bd_conname'],
                      'bd_unit' => $add['bd_unit'],
                      'bd_unitname' => $add['bd_unitname'],
                      'bd_unitno' => $add['bd_unitno'],
                      'bd_gtype' => $add['bd_gtype'],
                      'bd_besiness' => $add['bd_besiness'],
                      'bd_produce' => $add['bd_produce'],
                      'type_in' => $add['type_in'],
                      'compcode' => $compcode,
                      'useradd' => $username,
                      'createdate' => date('y-m-d'),
                      'bidbond' => $add['bidbond'],
                      'bonddate' => $add['bidbonddate'],
                      'bondamount' => $add['bondprice'],
                            
              );
             $this->db->insert('bdtender_h',$ins);

            //head insert

             // detail
              for ($i=0; $i < count($add['chki']); $i++) {
               if($add['chki'][$i]=="Y"){
              $insss = array(
                      'bdd_tenid' => $bd, 
                      'bdd_jobno' => $add['bd_jobno'][$i],
                      'bdd_jobname' => $add['bd_jobname'][$i],
                      'bdd_amount' => parse_num($add['bd_amount'][$i]),
                      'compcode' => $compcode,
                      'useradd' => $username,
                      'createdate' => date('y-m-d'),
              );

               $this->db->insert('bdtender_d',$insss);
             }



            }

     
              redirect('bd/page_bd_tender_edit/'.$ins['bd_tenid']);


      }else if($add['bd_chk']=="E"){
         switch ($add['bd_bdstats']) {

             case '0':
               $staus = "win";
               break;
             case '1':
               $staus = "Wait";
               break;
             case '2':
                $staus = "Wait";
               break;
             case '3':
                $staus = "loss";
               break;
           }
                $ins1 = array(
                      // 'bd_type' => $add['bd_type'],
                      'bidbond' => $add['bidbond'],
                      'bonddate' => $add['bidbonddate'],
                      'bondamount' => $add['bondprice'],
                      'bd_status' => $staus,
                      // 'bd_pno' => $add['bd_pno'],
                      'bd_pname' => $add['bd_pname'],
                      'bd_date' => $add['bd_date'],
                      'bd_year' => $add['bd_year'],
                      'bd_month' => $add['bd_month'],
                      'bd_bdstats' => $add['bd_bdstats'],
                      'bd_cus' => $add['bd_cus'],
                      'bd_cusn' => $add['bd_cusn'],      
                      'useredit' => $username,
                      'editdate' => date('y-m-d'),
                            
              );

              $this->db->where('bd_tenid',$add['bd_tenid']);
              $q = $this->db->update('bdtender_h',$ins1);

              for ($i=0; $i < count($add['chki']); $i++) {
               if($add['chki'][$i]=="X"){
                $insss1 = array(
                        'bdd_jobno' => $add['bd_jobno'][$i],
                        'bdd_jobname' => $add['bd_jobname'][$i],
                        'bdd_amount' => parse_num($add['bd_amount'][$i]),
                        'useredit' => $username,
                        'editdate' => date('y-m-d'),
                );
              $this->db->where('bdd_no',$add['bdd_no'][$i]);
              $a = $this->db->update('bdtender_d',$insss1);
             }

            if($add['chki'][$i]=="Z"){
              $aat = array(
                      'bdd_tenid' => $tenderid, 
                      'bdd_jobno' => $add['bd_jobno'][$i],
                      'bdd_jobname' => $add['bd_jobname'][$i],
                      'bdd_amount' => parse_num($add['bd_amount'][$i]),
                      'compcode' => $compcode,
                      'useradd' => $username,
                      'createdate' => date('y-m-d'),
              );

               $this->db->insert('bdtender_d',$aat);
             }

             // detail
            }

          //   for ($i=0; $i < count($add['approve_sequence']); $i++) {
          //   if($add['chkpr'][$i]=="X"){     
          //        $data_d = array(
          //          'approve_project' => $tenderid,
          //          'approve_sequence' => $add['approve_sequence'][$i],
          //          'approve_mid' => $add['approve_mid'][$i],
          //          'approve_mname' => $add['approve_mname'][$i],
          //          'approve_position' => $add['approve_position'][$i],
          //          'type' => "TD",
          //          'creatuser' => $username,
          //          'creatudate' => date('Y-m-d H:i:s'),
          //          'compcode' => $compcode,
          //        );

          //  $this->db->insert('approve',$data_d);
          //         }else if($add['chkpr'][$i]=="Y"){
          //        $data_c = array(
          //                'approve_project' => $tenderid,
          //                'approve_sequence' => $add['approve_sequence'][$i],
          //                'approve_mid' => $add['approve_mid'][$i],
          //                'approve_mname' => $add['approve_mname'][$i],
          //                'approve_position' => $add['approve_position'][$i],
          //                'type' => "TD",
          //                'approve_lock' => $add['lock1'][$i],
          //                'edituser' => $username,
          //                'editdate' => date('Y-m-d H:i:s'),
          //              );

          //         $this->db->where('id',$add['idpr'][$i]);
          //         $this->db->update('approve',$data_c);
          //      }
          //   }
            
            redirect("bd/page_bd_tender_edit/".$tenderid);
            }else {
              echo "ไม่มี status ";
            }
            // redirect('bd/bd_tender');
    }

            public function del_bd(){
            $id = $this->uri->segment(3);
              $this->db->where('bd_tenid',$id);
              $this->db->delete('bdtender_h');
              
             $this->db->where('bdd_tenid',$id);
            $this->db->delete('bdtender_d');
             redirect('bd/bd_tender');
            }

            public function bd_controlBOQ(){
              $boq_control = $this->uri->segment(3);
              $boq_id = $this->uri->segment(4);
              $ins = array(
                'boq_control' => $boq_control,
                );
              $this->db->where('boq_id',$boq_id);
              $q = $this->db->update('boq_item',$ins);
            }

            public function bd_controlBOQQ(){
              $boq_controll = $this->uri->segment(3);
              $boq_idd = $this->uri->segment(4);
              $ins = array(
                'boq_controll' => $boq_controll,
                );
              $this->db->where('boq_id',$boq_idd);
              $q = $this->db->update('boq_item',$ins);
            }

            public function bd_delboqcost(){
              $id = $this->uri->segment(3);
              $bd = $this->uri->segment(4);
              $this->db->where('boq_id',$id);
              $this->db->delete('boq_item');

              $this->db->where('pimary',$id);
              $this->db->delete('boq_cost');


              redirect("bd/boq_main/".$bd);
            }

          public function del_boq_all(){
            $tdn = $this->input->post('boq_tenid');
            if (isset($tdn)) {

              $this->db->where('boq_project', $tdn);
              $boq_item = $this->db->delete('boq_item');

              $this->db->where('sub_boq', $tdn);
              $detail_boq = $this->db->delete('detail_boq');

              $this->db->where('tender', $tdn);
              $non_boq_costcode = $this->db->delete('non_boq_costcode');

              $this->db->where('boq_project', $tdn);
              $xboq_item = $this->db->delete('xboq_item');

                if ($boq_item AND $detail_boq AND $non_boq_costcode AND $xboq_item) {

                  $return['status'] = true; 

                }else{

                  $return['status'] = false;

                }

                echo json_encode($return);
            }
          }

            public function department_post()
            {
              $tenderid = $this->uri->segment(3);
             $datestring = "Y";
                      $m = "m";
                      $d = "d";
                      $this->db->select('*');
                    $qu = $this->db->get('bdtender_h');
                    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
                      if ($res==0) {
                       $bd = "BD".date($datestring).date($m).date($d)."1";
                       }else{
                           $this->db->select('*');
                           $this->db->order_by('bd_no','desc');
                          $this->db->limit('1');
                           $q = $this->db->get('bdtender_h');
                          $run = $q->result();
                           foreach ($run as $valx)
                           {
                              $x1 = $valx->bd_no+1;
                           }
                         $bd = "BD".date($datestring).date($m).date($d).$x1;
                          }

            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            //head insert
            $add = $this->input->post();
            // echo "<pre>";
            // var_dump($username);
            // var_dump($compcode);
            // echo $add['type_in'];
            // print_r($add);
            // die();

            if($add['bd_chk']=="I"){
              $ins = array(
                      'bd_tenid' => $bd, 
                      
                      'bd_pno' => $add['bd_pno'],
                      'bd_pname' => $add['bd_pname'],
                      'bd_date' => $add['bd_date'],
                      'bd_year' => $add['bd_year'],
                      'bd_month' => $add['bd_month'],
                      'bd_bdstats' => $add['bd_bdstats'],
                      // 'bd_cusn' => $add['bd_cusn'],
                      // 'bd_conno' => $add['bd_conno'],
                      // 'bd_conname' => $add['bd_conname'],
                      // 'bd_unit' => $add['bd_unit'],
                      // 'bd_unitname' => $add['bd_unitname'],
                      // 'bd_unitno' => $add['bd_unitno'],
                      // 'bd_gtype' => $add['bd_gtype'],
                      // 'bd_besiness' => $add['bd_besiness'],
                      // 'bd_produce' => $add['bd_produce'],
                      'type_in' => $add['type_in'],
                      'compcode' => $compcode,
                      'useradd' => $username,
                      'createdate' => date('y-m-d'),
                            
              );
             $this->db->insert('bdtender_h',$ins);

            //head insert

             // detail
              for ($i=0; $i < count($add['chki']); $i++) {
               if($add['chki'][$i]=="Y"){
              $insss = array(
                      'bdd_tenid' => $bd, 
                      'bdd_jobno' => $add['bd_jobno'][$i],
                      'bdd_jobname' => $add['bd_jobname'][$i],
                      'bdd_amount' => parse_num($add['bd_amount'][$i]),
                      'compcode' => $compcode,
                      'useradd' => $username,
                      'createdate' => date('y-m-d'),
              );

               $this->db->insert('bdtender_d',$insss);
             }
            }
            // echo $add['type_in'];
            if ($add['type_in'] == "department") {
              # code...
              redirect('bd/department_tender_edit/'.$ins['bd_tenid']);
            }

            }else if($add['bd_chk']=="E"){
                $ins1 = array(
                      'bd_type' => $add['bd_type'],
                      
                      'bd_pno' => $add['bd_pno'],
                      'bd_pname' => $add['bd_pname'],
                      'bd_date' => $add['bd_date'],
                      'bd_year' => $add['bd_year'],
                      'bd_month' => $add['bd_month'],
                      'bd_bdstats' => $add['bd_bdstats'],
                      'bd_cus' => $add['bd_cus'],
                      'bd_cusn' => $add['bd_cusn'],      
                      'useredit' => $username,
                      'editdate' => date('y-m-d'),
                            
              );

              $this->db->where('bd_tenid',$add['bd_tenid']);
              $q = $this->db->update('bdtender_h',$ins1);

              for ($i=0; $i < count($add['chki']); $i++) {
               if($add['chki'][$i]=="X"){
                $insss1 = array(
                        'bdd_jobno' => $add['bd_jobno'][$i],
                        'bdd_jobname' => $add['bd_jobname'][$i],
                        'bdd_amount' => $add['bd_amount'][$i],

                        'useredit' => $username,
                        'editdate' => date('y-m-d'),
                );
              $this->db->where('bdd_no',$add['bdd_no'][$i]);
              $a = $this->db->update('bdtender_d',$insss1);
             }

            if($add['chki'][$i]=="Z"){
              $aat = array(
                      'bdd_tenid' => $tenderid, 
                      'bdd_jobno' => $add['bd_jobno'][$i],
                      'bdd_jobname' => $add['bd_jobname'][$i],
                      'bdd_amount' => $add['bd_amount'][$i],
                      'compcode' => $compcode,
                      'useradd' => $username,
                      'createdate' => date('y-m-d'),
              );

               $this->db->insert('bdtender_d',$aat);
             }

             // detail
            }

            redirect("bd/department_tender_edit/".$tenderid);
            }else {
              echo "ไม่มี status ";
            }
            }

  public function department_tender_edit()
  {
    echo "Page Edit Department";
  }

   public function boq_edit(){
      $id = $this->uri->segment(3);
      $tdn = $this->uri->segment(4);
      $pj = $this->uri->segment(5);
      $add = $this->input->post();

        if($add['newmatcode']!=""){
          $this->db->select_sum('pri_qty');
          $this->db->where('pr_project',$pj);
          $this->db->where('pri_matcode',$add['newmatcode']);
          $this->db->join('pr','pr.pr_prno = pr_item.pri_ref');
          $q = $this->db->get('pr_item')->result();
          $nummat = 0;
          foreach ($q as $key) {
            $nummat = $key->pri_qty;
          }
        }

        if($add['laborcode']!=""){
          $this->db->select_sum('pri_qty');
          $this->db->where('pr_project',$pj);
          $this->db->where('pri_matcode',$add['laborcode']);
          $this->db->join('pr','pr.pr_prno = pr_item.pri_ref');
          $qs = $this->db->get('pr_item')->result();
          $nummats = 0;
          foreach ($qs as $keys) {
            $nummats = $keys->pri_qty;
          }
        }


      $boq = array(
      'boq_job' => $add['systeme'],
      'boq_mcode' => $add['newmatcode'],
      'boq_mname' => $add['newmatnamee'],
      'boq_subcode' => $add['laborcode'],
      'boq_subname' => $add['laborname'],
      'controlcost' => '100',
      'boq_costmat' => $add['codecostcode'],
      'boq_costmatname' => $add['codecostname'],
      'boq_costsub' => $add['subcostcode'],
      'boq_costsubname' => $add['subcostcodename'],
      'boq_boqcode' => $add['boqcode'],
      'boq_boqmat' => $add['matboq'],  
      'boq_ucode' => $add['unitcode'],
      'boq_uname' => $add['unitname'],
      'boq_budget_qty'=>parse_num($add['qty_bg']),
      'boq_budget_price' => parse_num($add['matpricebg']),
      'boq_budget_amt' => parse_num($add['matamtbg']),
      'boq_lab_price' => parse_num($add['labpricebg']),
      'boq_lab_amt' => parse_num($add['labamtbg']),
      'boq_budget_total' => parse_num($add['totalamt']),
      'boq_qty' => parse_num($add['qtyboq']),
      'boq_price' => parse_num($add['matpriceboq']),
      'boq_amt'=> parse_num($add['matamtboq']),
      'boq_lab_boqprice'=> parse_num($add['labpriceboq']),
      'boq_lab_boqamt'=> parse_num($add['labamtboq']),
      'boq_total_amt'=> parse_num($add['totalamtboq']),
      'edituser'=>$username,
      'editdate' => date('y-m-d'),

      "boq_prbudget_qty" => $nummat,
      "boq_prqty" => $nummats,
       );
      $this->db->where('boq_id',$id);
      $this->db->update('boq_item',$boq);


      $boqcost = array(
      'system' => $add['systeme'], 
      'costcode' => $add['codecostcode'],
      'costname' =>  $add['codecostname'],
      'cost' => parse_num($add['matamtbg']),        
      );
      $this->db->where('pimary',$id);
      $this->db->where('type',"1");
      $this->db->update('boq_cost',$boqcost);

      $boqcosts = array(
      'system' => $add['systeme'],
      'costcode' => $add['subcostcode'],
      'costname' => $add['subcostcodename'],
      'cost' => parse_num($add['labamtbg']),             
      );
      $this->db->where('pimary',$id);
      $this->db->where('type',"2");
      $this->db->update('boq_cost',$boqcosts);


      redirect('bd/boq_main/'.$tdn);
   }


   public function control_qty(){
    $id = $this->uri->segment(3);
    $mat = $this->uri->segment(4);
    $click = $this->uri->segment(5);

    $boqcontrol = array(
      'control_qty' => $click,
    );
      $this->db->where('boq_code',$id);
      $this->db->where('boq_mcode',$mat);
      $this->db->update('boq_cost',$boqcontrol);
   }

   public function save_heading_boq()
   {
     
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $m_id = $session_data['m_id'];
      $td = $this->uri->segment(3);
      $add = $this->input->post();
      $datestring = "Y";
		$mm = "m";
		$dd = "d";

		$this->db->select('*');
		$qu = $this->db->get('heading_bd');
		$res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

		if ($res==0) {
			$bqno = "TD-BUDGET".date($datestring).date($mm)."000"."1";
			$aps_item ="1";
		}else{
			$this->db->select('*');
			$this->db->order_by('id','desc');
			$this->db->limit('1');
			$q = $this->db->get('heading_bd');
			$run = $q->result();
			foreach ($run as $valx)
			{
				$x1 = $valx->id+1;
			}

			if ($x1<=9) {
				$bqno = "TD-BUDGET".date($datestring).date($mm)."000".$x1;
				$aps_item = $x1;
			}
			elseif ($x1<=99) {
				$bqno = "TD-BUDGET".date($datestring).date($mm)."00".$x1;
				$aps_item = $x1;
			}
			elseif ($x1<=999) {
				$bqno = "TD-BUDGET".date($datestring).date($mm)."0".$x1;
				$aps_item = $x1;
			}
		}
      $data_h = array(
        'heading' => "BOQ (".$add['heading'].")",
        'remark' => $add['remark'],
        'ref_bd' => $bqno,
        'status' => "W",
        'useradd' => $username,
        'userid' => $m_id,
        'adddate' => date('y-m-d'),
        'revise' => "0",
        'compcode' => $compcode,
        'boq_bd' =>$td,
      );
      if($this->db->insert('heading_bd',$data_h)){
        return true;
      }else{
        return false;
      }
   }
   public function saverevise(){
     $session_data = $this->session->userdata('sessed_in');
     $username = $session_data['username'];
     $compcode = $session_data['compcode'];
     $add = $this->input->post();
     $td = $this->uri->segment(3);
     $res = $this->db->query("select revise from boq_item_revise where boq_bd = '".$td."' order by `id` desc limit 1")->result_array();
     $revise = $res[0]['revise']+1;

     for ($i=0; $i < count($add['boqid']) ; $i++) {
       $data = array(
         'boq_id' => $add['boqid'][$i], 
         'boq_bd' => $add['boqbd'][$i], 
         'boq_job' => $add['boqjob'][$i], 
         'subcostcode' => $add['costcode'][$i], 
         'subcostcodename' => $add['costname'][$i], 
         'newmatcode' => $add['matcode'][$i], 
         'newmatnamee' => $add['matname'][$i], 
         'boqcode' => $add['boqcode'][$i], 
         'matboq' => $add['matboq'][$i], 
         'unitcode' => $add['unitcode'][$i], 
         'unitname' => $add['unitname'][$i], 
         'qty_bg' => $add['qty_bg'][$i], 
         'qtyboq' => $add['qty_boq'][$i], 
         'matpricebg' => $add['matpricebg'][$i], 
         'matamtbg' => $add['matamtbg'][$i], 
         'labpricebg' => $add['labpricebg'][$i], 
         'labamtbg' => $add['labamtbg'][$i], 
         'subpricebg' => $add['subpricebg'][$i], 
         'subamtbg' => $add['subamtbg'][$i], 
         'totalamt' => $add['totalamt'][$i], 
         'status' => "W", 
         'revise' => $revise,
         'adduser' => $username,
         'adddate' => date('y-m-d'),
         'compcode' => $compcode,
        );
        $this->db->insert('boq_item_revise',$data);
     }
    // echo json_encode($add['boqid']);
    echo $revise;
     return  true;
   }
   public function saveapprovejson(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $m_id = $session_data['m_id'];
      $data['compcode'] = $session_data['compcode'];
      $add = $this->input->post('data');
      $aad = $this->input->post('title');
      $remarkaa = $this->input->post('remark');
      $revises = $this->input->post('revises');
      $ref_revise = $this->input->post('ref_revise');
      $bdcode = $this->uri->segment(3);
    
      //line
      // $res = $this->office_m->getapprovebd($pono);
          //   $pushID = $this->office_m->getlineid($res[0]['app_midid'],$compcode);
      // $line_message = "Doc type : {$pono}\n";
    
      // notify_message($line_message,$pushID[0]['lineid']);

      // end line
      $datestring = "Y";
      $mm = "m";
      $dd = "d";

      $this->db->select('*');
      $qu = $this->db->get('heading_bd');
      $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

      if ($res==0) {
        $bqno = "TD-BUDGET".date($datestring).date($mm)."000"."1";
        $aps_item ="1";
      }else{
        $this->db->select('*');
        $this->db->order_by('id','desc');
        $this->db->limit('1');
        $q = $this->db->get('heading_bd');
        $run = $q->result();
        foreach ($run as $valx)
        {
          $x1 = $valx->id+1;
          $x2 = $valx->ref_bd;
        }

        if ($x1<=9) {
          $bqno = "TD-BUDGET".date($datestring).date($mm)."000".$x1;
          $aps_item = $x1;
        }
        elseif ($x1<=99) {
          $bqno = "TD-BUDGET".date($datestring).date($mm)."00".$x1;
          $aps_item = $x1;
        }
        elseif ($x1<=999) {
          $bqno = "TD-BUDGET".date($datestring).date($mm)."0".$x1;
          $aps_item = $x1;
        }
      }
      
      // $data_h = array(
      //     'heading' => "BOQ (".$aad.")",
      //     'remark' => $remarkaa,
      //     'ref_bd' => $bqno,
      //     'status' => "W",
      //     'useradd' => $username,
      //     'userid' => $m_id,
      //     'adddate' => date('y-m-d'),
      //     'revise' => $revises,
      //     'compcode' => $data['compcode'],
      //     'boq_bd' =>$bdcode,
      //   );
      //   if($this->db->insert('heading_bd',$data_h)){
          $code = $bqno;
        // }else{
        //   return false;
        // }
        $this->load->model('manag_m');
        $refrev = $this->manag_m->get_heading_bdreivse($x2);
        
        $data_bstatus = array(
        'status' => "W",
        'heading_ref' => $x2,
        );
        $this->db->where('boq_bd',$bdcode);
        $this->db->where('revise',$refrev);
        $this->db->update('boq_item',$data_bstatus);
      
        $datap = array(
          'ref_heading' => $x2, 
        );
        $this->db->where('ref_bd',$ref_revise);
        $this->db->update('heading_bdrevise',$datap);

      // $this->db->select('*');
      // $this->db->where('type',"TD");
      // $this->db->where('approve_project',$bdcode);
      // $ma = $this->db->get('approve')->result();
      // foreach ($ma as $qq) {
      // $data_approve = array(
      //   'app_pr' => $bqno,
      //   'app_project' => $qq->approve_project,
      //   'app_sequence' => $qq->approve_sequence,
      //   'app_midid' => $qq->approve_mid,
      //   'app_midname' => strtolower($qq->approve_mname),
      //   'lock' => $qq->approve_lock,
      //   'status' => "no",
      //   'cost' => $qq->approve_cost,
      //   'creatuser' => $username,
      //   'creatudate' => date('y-m-d'),
      //   'compcode' => $data['compcode'],
      //   'status_td' => "1",
      // );
      // $this->db->insert('approve_td',$data_approve);
      // }

      $out = array(
        'result' => 'ok'
      );
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($out));
    }

    public function save_revise_new($type,$tender_id){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $m_id = $session_data['m_id'];
      $compcode = $session_data['compcode'];
      $projectcodesession = $session_data['projectcode'];
      $add = $this->input->post();
      // $aad = $this->input->post('title');
      // $remarkaa = $this->input->post('remark');
      // $revises = $this->input->post('revises');
      $bdcode = $this->uri->segment(3);

////////////////////////////////////////////////////////////////////////////////////////////////////////////

      $datestring = "Y";
      $mm = "m";
      $dd = "d";

      $this->db->select('*');
      $qu = $this->db->get('heading_bd');
      $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

      if ($res==0) {
        $bqno = "TD-BUDGET".date($datestring).date($mm)."000"."1";
        $aps_item ="1";
      }else{
        $this->db->select('*');
        $this->db->order_by('id','desc');
        $this->db->limit('1');
        $q = $this->db->get('heading_bd');
        $run = $q->result();
        foreach ($run as $valx)
        {
          $x1 = $valx->id+1;
        }

        if ($x1<=9) {
          $bqno = "TD-BUDGET".date($datestring).date($mm)."000".$x1;
          $aps_item = $x1;
        }
        elseif ($x1<=99) {
          $bqno = "TD-BUDGET".date($datestring).date($mm)."00".$x1;
          $aps_item = $x1;
        }
        elseif ($x1<=999) {
          $bqno = "TD-BUDGET".date($datestring).date($mm)."0".$x1;
          $aps_item = $x1;
        }
      }
    

////////////////////////////////////////////////////////////////////////////////////////////////////////////




      // $type = project or Department
      $head_id = $this->uri->segment(4);
      $size_array = count($add["boqjob"]);

      // get tender
      $this->db->select("ref_bd,revise");
      $this->db->from('heading_bd');
      // $this->db->where('ref_bd',$head_id);
      $this->db->where('boq_bd',$bdcode);
      $this->db->order_by('id','desc');
      $this->db->limit(1);
      $res = $this->db->get()->result_array();
      if($res){
        $ref = $res[0]['ref_bd'];
        $revise = $res[0]['revise'];
      }else{
        $ref = $res[0]['ref_bd'];
        $revise = 0;
      }
      // get tender
      $number_revise = "REV".date("YmdHis");

      $data_heading_revise = array(
        'ref_bd'=>$number_revise,
        'status'=>"W",
        'useradd' =>$username,
        'userid'=> $m_id,
        'compcode' => $compcode,
        'adddate' => date('Y-m-d H:i:s'),
        'revise'=>$revise+1,
        'ref_heading'=>$bqno
      );

      $this->db->insert('heading_bdrevise',$data_heading_revise);
      $data_h = array(
        'heading' => "Revise",
        'remark' => $revise+1,
        'ref_bd' => $bqno,
        'status' => "W",
        'useradd' => $username,
        'adddate' => date('y-m-d'),
        'revise' =>  $revise+1,
        'compcode' =>  $compcode,
        'boq_bd' =>$bdcode,
      );
      $this->db->insert('heading_bd',$data_h);

      $this->db->trans_begin();
      for ($i=0; $i < count($add['boqid']) ; $i++) {
        $data = array(
          // 'boq_id' => $add['boqid'][$i], 
          'boq_bd' => $add['boqbd'][$i], 
          'boq_job' => $add['boqjob'][$i], 
          'subcostcode' => $add['costcode'][$i], 
          'subcostcodename' => $add['costname'][$i], 
          'subcostcodelabor' => $add['costcodelabor'][$i], 
          'subcostnamelabor' => $add['costnamelabor'][$i], 
          'newmatcode' => $add['matcode'][$i], 
          'newmatnamee' => $add['matname'][$i], 
          'matcodelabor' => $add['matlaborcode'][$i],
          'matnamelabor' => $add['matlaborname'][$i],
          // 'boqcode' => $add['boqcode'][$i], 
          // 'matboq' => $add['matboq'][$i], 
          'unitcode' => $add['unitcode'][$i], 
          'unitname' => $add['unitname'][$i], 
          'qty_bg' => parse_num($add['qty_bg'][$i]), 
          'qtyboq' => parse_num($add['qty_boq'][$i]), 
          'matpricebg' => parse_num($add['matpricebg'][$i]), 
          'matamtbg' => parse_num($add['matamtbg'][$i]), 
          'labpricebg' => parse_num($add['labpricebg'][$i]), 
          'labamtbg' => parse_num($add['labamtbg'][$i]), 
          'subpricebg' => parse_num($add['subpricebg'][$i]), 
          'subamtbg' => parse_num($add['subamtbg'][$i]), 
          'totalamt' => parse_num($add['totalamt'][$i]), 
          'heading_ref' => $bqno,
          'status' => "N", 
          'revise' => $number_revise,
          'revise_boq' => $revise+1,
          'adduser' => $username,
          'adduser_id' => $m_id,
          'adddate' => date('y-m-d'),
          'compcode' => $compcode,
          'project_code' => $add['projectcode'][$i],
         );
         $this->db->insert('boq_item',$data);
      // for ($index=0; $index <$size_array ; $index++) { 
      //   $data_insert = array(
      //     'boq_bd'=>$data["tender_id"],
      //     "boq_job" => $data['job'][$index], 
      //     "subcostcode" => $data['subcostcode'][$index], 
      //     "subcostcodename" => $data['subcostcodename'][$index],
      //     "newmatnamee" => $data['newmatnamee'][$index],
      //     "newmatcode" => $data['newmatcode'][$index],
      //     "boqcode" => $data['boqcode'][$index],
      //     "matboq" => $data['matboq'][$index],
      //     "unitcode" => $data['unitcode'][$index],
      //     "unitname" => $data['unitname'][$index],
      //     "qty_bg" => parse_num($data['qty_bg'][$index]),
      //     "qtyboq" => parse_num($data['qtyboq'][$index]),
      //     "matpricebg" => parse_num($data['matpricebg'][$index]),
      //     "matamtbg" => parse_num($data['matamtbg'][$index]),
      //     "labpricebg" => parse_num($data['labpricebg'][$index]),
      //     "labamtbg" => parse_num($data['labamtbg'][$index]),
      //     "subpricebg" => parse_num($data['subpricebg'][$index]),
      //     "subamtbg" => parse_num($data['subamtbg'][$index]),
      //     "totalamt" => parse_num($data['totalamt'][$index]),
      //     "matpriceboq" => parse_num($data['matpriceboq'][$index]),
      //     "matamtboq" => parse_num($data['matamtboq'][$index]),
      //     "labpriceboq" => parse_num($data['labpriceboq'][$index]),
      //     "labamtboq" => parse_num($data['labamtboq'][$index]),
      //     "subpriceboq" => parse_num($data['subpriceboq'][$index]),
      //     "subamtboq" => parse_num($data['subamtboq'][$index]),
      //     "heading_ref"=> $head_id, 
      //     "totalamtboq" => parse_num($data['totalamtboq'][$index]),
      //     "status" => "N",
      //     "compcode" => $compcode,
      //     "adduser" => $username,
      //     "adduser_id" => $m_id,
      //     "adddate" => date('y-m-d'),
      //     "revise"=> $number_revise


      //   );
      //     $this->db->insert("boq_item",$data_insert);





          $data_update = array(
            'ref_revise'=>$number_revise
          );
          $this->db->where('pimary',$add['boqid'][$i]);
          $this->db->where('heading_ref',$head_id);

          $this->db->update("boq_cost",$data_update);
    # code...
      }
     
          $this->db->select('*');
          $this->db->where('type',"TD");
          $this->db->where('approve_project',$bdcode);
          $ma = $this->db->get('approve')->result();
          foreach ($ma as $qq) {
            $data_approve = array(
                'app_pr' => $number_revise,
                'app_project' => $qq->approve_project,
                'app_sequence' => $qq->approve_sequence,
                'app_midid' => $qq->approve_mid,
                'app_midname' => strtolower($qq->approve_mname),
                'lock' => $qq->approve_lock,
                'status' => "no",
                'cost' => $qq->approve_cost,
                'creatuser' => $username,
                'creatudate' => date('y-m-d'),
                'compcode' => $compcode,
          );
            $this->db->insert('approve_revise',$data_approve);
          }







      if ($this->db->trans_status() === FALSE)
      {
              $this->db->trans_rollback();
              // echo "rollback";
      }
      else
      {
              $this->db->trans_commit();
              echo $revise+1;
              // redirect("management/vrpb/{$data['tender_id']}/{$type}");
      }

      
    // echo $size;
  }
}