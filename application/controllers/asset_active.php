<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class asset_active extends CI_Controller {

         public function __construct() {
       date_default_timezone_set( 'Asia/Bangkok' );
        parent::__construct();
        $this->load->helper(array('form', 'url','file'));
        $this->load->library('image_lib');
        $this->load->helper('date');
    }

public function insert(){
          // $session_data = $this->session->userdata('sessed_in');
          // $user = $session_data['username'];
         $config['upload_path'] = './imgasset/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = '20480';
          $config['max_width']  = '9999';
          $config['max_height']  = '9999';
          $rand = rand(1111,9999);
          $date= date("Y-m-d ");
          $config['file_name']  = $date.$rand;
          $this->load->library('upload', $config);


        // Change $_FILES to new vars and loop them


        // Put each errors and upload data to an array
        $error = array();
        $success = array();

        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {
            if ( ! $this->upload->do_upload($field_name))
            {
                // if upload fail, grab error
                $error['upload'][] = $this->upload->display_errors();
            }
            else
            {
                // otherwise, put the upload datas here.
                // if you want to use database, put insert query in this loop
                $upload_data = $this->upload->data();

                // set the resize config


                // initializing
                $this->image_lib->initialize($resize_conf);

                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                    echo "error";
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $data['success'] = $upload_data;
                    echo "OK Good";
                    var_dump($_FILES);

         $ins1 = array('img' => $upload_data['file_name'],

                'assetcode'=>$this->input->post('assetcode')
            );
                $q1=$this->db->insert('imgrecords',$ins1);





                }
            }
        }

               $ins = array(
            'asset'=>$this->input->post('asset'),
            'assetcode'=>$this->input->post('assetcode'),
            'prodoct'=>$this->input->post('prodoct'),
            'generation'=>$this->input->post('generation'),
            'serialn'=>$this->input->post('serialn'),
            'value'=>$this->input->post('value'),
            'guarantee'=>$this->input->post('guarantee'),
            'eguarantee'=>$this->input->post('eguarantee'),
            'ap'=>$this->input->post('ap'),
            'apdate'=>$this->input->post('apdate'),
            'po'=>$this->input->post('po'),
            'invoice'=>$this->input->post('invoice'),
            'dateinvoice'=>$this->input->post('dateinvoice'),
            'seller'=>$this->input->post('seller'),
            'other'=>$this->input->post('other'),
            'location'=>$this->input->post('location'),


          );



           $this->db->insert('records',$ins);
 redirect('add_asset/index');



}



public function updateimg(){
          $config['upload_path'] = './imgasset/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = '20480';
          $config['max_width']  = '9999';
          $config['max_height']  = '9999';
          $rand = rand(1111,9999);
          $date= date("Y-m-d ");
          $config['file_name']  = $date.$rand;
          $this->load->library('upload', $config);


        // Change $_FILES to new vars and loop them


        // Put each errors and upload data to an array
        $error = array();
        $success = array();

        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {
            if ( ! $this->upload->do_upload($field_name))
            {
                // if upload fail, grab error
                $error['upload'][] = $this->upload->display_errors();
            }
            else
            {
                // otherwise, put the upload datas here.
                // if you want to use database, put insert query in this loop
                $upload_data = $this->upload->data();

                // set the resize config


                // initializing
                $this->image_lib->initialize($resize_conf);

                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                    echo "error";
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $data['success'] = $upload_data;
                    echo "OK Good";
                    var_dump($_FILES);

               $add = $this->input->post();
         $ins1 = array('img' => $upload_data['file_name'],

                'assetcode'=>$this->input->post('assetcode')
            );
                $q1=$this->db->insert('imgrecords',$ins1);
        }
            }
        }

 $add1 = $this->input->post();
         $ins2 = array(
        'asset' => $add1['asset'],
        'assetcode' => $add1['assetcode'],
        'prodoct' => $add1['prodoct'],
        'generation' => $add1['generation'],
        'serialn' => $add1['serialn'],
        'value' => $add1['value'],
        'guarantee' => $add1['guarantee'],
        'eguarantee' => $add1['eguarantee'],
        'ap' => $add1['ap'],
        'apdate' => $add1['apdate'],
        'po' => $add1['po'],
        'invoice' => $add1['invoice'],
        'dateinvoice' => $add1['dateinvoice'],
        'seller' => $add1['seller'],
        'other' => $add1['other'],
        'location' => $add1['location']
    );

            $this->load->model('manage_m');
            $this->manage_m->ud1($add1['assetcode'],$ins2);

 redirect('add_asset/index');



}



 public function del()
  {

    $query = $this->db->query("SELECT img FROM imgrecords where assetcode");
    foreach ($query->result() as $row)
{
    unlink("imgasset/$row->img");
}

    $assetcode = $this->uri->segment(3);
    $this->db->delete('records', array('assetcode' => $assetcode));
    $this->db->delete('imgrecords', array('assetcode' => $assetcode));
      redirect('add_asset/index');
  }



   public function delimg($idimg)
  {
$query = $this->db->query('SELECT img FROM imgrecords where idimg');
$row = $query->row();
$file = "imgasset/$row->img";
if (!unlink($file))
  {
   $this->db->where('idimg',$idimg);
                die;
  }
else
  {
   $this->db->where('idimg',$idimg);
                $this->db->delete('imgrecords');
                die;
  }
  }


public function insertmasterlocation(){
  $add = $this->input->post();
  // var_dump($add);die();
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
         $ins = array(
        'location_code' => $add['location_code'],
        'location_name' => $add['location_name'],
        'location_remark' => $add['location_remark'],
        'location' => $add['location'],
        'status' => "Y",
        'useradd' => $username,
        'createdate' => date('Y-m-d H:i:s'),
    );
          $this->db->insert('ass_location',$ins);
         redirect('inventory_area/assetlocation');

}
public function edit_location(){
  $id=$this->uri->segment(3);
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
  $add = $this->input->post();
         $ins = array(
        'location_code' => $add['location_code'],
        'location_name' => $add['location_name'],
        'location_remark' => $add['location_remark'],
        // 'location' => $add['location'],
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s'),
    );
          $this->db->where('id_location', $id);
          $this->db->update('ass_location', $ins);
         redirect('inventory_area/assetlocation');

}
public function delinsertmasterlocation(){
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
  $id=$this->uri->segment(3);
   $add = $this->input->post();
         $ins = array(
        'status' => "D",
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s'),
    );
  $this->db->where('id_location', $id);
          $this->db->update('ass_location', $ins);
 redirect('inventory_area/assetlocation');
}

public function insertassettype(){
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
  $add = $this->input->post();
         $ins = array(
        'at_code' => $add['at_code'],
        'at_typet' => $add['at_typet'],
        'at_typee' => $add['at_typee'],
        'at_aca' => $add['at_aca'],
        'at_acd' => $add['at_acd'],
        'at_cost' => $add['at_cost'],
        'at_acacc' => $add['at_acacc'],
        'at_acaid' => $add['at_acaid'],
        'at_acdid' => $add['at_acdid'],
        'at_costid' => $add['at_costid'],
        'at_acaccid' => $add['at_acaccid'],
        'at_idcost' => $add['costcode'],
        'at_namecost' => $add['costname'],
        'useradd' => $username,
        'createdate' => date('Y-m-d H:i:s'),

    );
 $this->db->insert('asset_type',$ins);
 redirect('inventory_area/assettype');
}
public function edit_assettype(){
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
  $add = $this->input->post();
  $id=$this->uri->segment(3);
  $add = $this->input->post();
         $edit = array(
        'at_code' => $add['at_code'],
        'at_typet' => $add['at_typet'],
        'at_typee' => $add['at_typee'],
        'at_aca' => $add['at_aca'],
        'at_acd' => $add['at_acd'],
        'at_cost' => $add['at_cost'],
        'at_acacc' => $add['at_acacc'],
        'at_acaid' => $add['at_acaid'],
        'at_acdid' => $add['at_acdid'],
        'at_costid' => $add['at_costid'],
        'at_acaccid' => $add['at_acaccid'],
        'at_idcost' => $add['costcode'],
        'at_namecost' => $add['costname'],
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s'),
    );
         $this->db->where('at_code', $id);
        $this->db->update('asset_type', $edit);
 redirect('inventory_area/assettype');
}

public function delassettype(){
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
  $id=$this->uri->segment(3);
  $edit = array(
        'status' => "D",
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s'),
    );
  $this->db->where('at_code', $id);
  $this->db->update('asset_type', $edit);
 redirect('inventory_area/assettype');
}

public function depreciation(){

   $input = $this->input->post();
  // echo "<pre>";
  //  var_dump($input);die();    
        $header = array(
        'depreciation_code' => $input['depreciation_code'],
        'depreciation_method' => $input['depreciation_method'],
        'depreciation_year' => $input['depreciation_year'],
        );
        $this->db->insert('depreciation_header', $header);
        
    for ($key=0; $key < count($input['depreciation_y']); $key++) {
      if ($input['chk'][$key]=='insert') {
        if($input['depreciation_y'][$key]!=""){
        $ins = array(
              'depreciation_codeh' => $input['depreciation_code'],
              'depreciation_y' => $input['depreciation_y'][$key],
              'depreciation_operation' => $input['depreciation_operation'][$key],
              'depreciation_per' => $input['depreciation_per'][$key],
              'depreciation_remark' => $input['depreciation_remark'][$key]
        );
        $this->db->insert('depreciation_detail', $ins);
        }
      }
    }
  redirect('inventory_area/depreciation');
}
        
    public function depreciation_edit(){
      $input = $this->input->post();
          $header = array(
          'depreciation_code' => $input['depreciation_code_update'],
          'depreciation_method' => $input['depreciation_method_update'],
          'depreciation_year' => $input['depreciation_year_update'],
          );
        $this->db->where('depreciation_header.depreciation_id', $input['id_row']);
        $this->db->update('depreciation_header', $header);
          
          for ($key=0; $key < count($input['depreciation_y']); $key++) {
            if ($input['chkup'][$key]=='update') {
              if($input['depreciation_y'][$key]!=""){
              $upd = array(
                    'depreciation_y' => $input['depreciation_y'][$key],
                    'depreciation_operation' => $input['depreciation_operation'][$key],
                    'depreciation_per' => $input['depreciation_per'][$key],
                    'depreciation_remark' => $input['depreciation_remark'][$key]
              );
              $this->db->where('depreciation_detail.depreciation_id', $input['id_detail'][$key]);
              $this->db->update('depreciation_detail', $upd);
              }
            }
          }
          for ($key=0; $key < count($input['depreciation_y_edit']); $key++) {
            if ($input['chkedit'][$key]=='insertedit') {
              if($input['depreciation_y_edit'][$key]!=""){
              $insedit = array(
                    'depreciation_codeh' => $input['depreciation_codeh_edit'][$key],
                    'depreciation_y' => $input['depreciation_y_edit'][$key],
                    'depreciation_operation' => $input['depreciation_operation_edit'][$key],
                    'depreciation_per' => $input['depreciation_per_edit'][$key],
                    'depreciation_remark' => $input['depreciation_remark_edit'][$key]
              );
              $this->db->insert('depreciation_detail', $insedit);
              // echo "<pre>";
              // var_dump($input['depreciation_codeh_edit']);die();
              }
            }
          } 
      redirect('inventory_area/depreciation');
    }

public function depremethod(){
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
 $add = $this->input->post();
         $ins = array(
        'de_costid' => $add['de_costid'],
        'de_costname' => $add['de_costname'],
        'de_maintenance' => $add['de_maintenance'],
        'de_due' => $add['de_due'],
        'de_before' => $add['de_before'],
        'de_mile' => $add['de_mile'],
        'de_lock' => $add['de_lock'],
        'useradd' => $username,
        'createdate' => date('Y-m-d H:i:s'),
    );
 $this->db->insert('depre_method',$ins);
 redirect('inventory_area/assetexpensetype');
}

public function depremethod_edit(){
  $id = $this->uri->segment(3) ;
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
  $add = $this->input->post();
  $edit = array(
        'de_costid' => $add['de_costid'],
        'de_costname' => $add['de_costname'],
        'de_maintenance' => $add['de_maintenance'],
        'de_due' => $add['de_due'],
        'de_before' => $add['de_before'],
        'de_mile' => $add['de_mile'],
        'de_lock' => $add['de_lock'],
        'useredit' => $username,
        'editdate' => date('Y-m-d H:i:s'),
    );

  $this->db->where('de_id', $id);
  $this->db->update('depre_method', $edit);
  redirect('inventory_area/assetexpensetype');

}
public function ediasset(){
  $id = $this->uri->segment(3) ;
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
  $add = $this->input->post();
  $edit = array(
        'status' => "D",
        'userdel' => $username,
        'deldate' => date('Y-m-d H:i:s'),
    );

  $this->db->where('de_id',$id);
  $this->db->update('depre_method', $edit);
  redirect('inventory_area/assetexpensetype');

}


public function insertasset(){
  $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];

   $config['upload_path'] = './imgasset/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = '20480';
          $config['max_width']  = '9999';
          $config['max_height']  = '9999';
          $rand = rand(1111,9999);
          $date= date("Y-m-d ");
          $config['file_name']  = $date.$rand;
          $this->load->library('upload', $config);
          $error = array();
          $success = array();
          $num = 1;
  
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
                    echo "OK Good";
                    var_dump($_FILES);
        $add1 = $this->input->post();
                  $ins1 = array(
                 'ass_imgg' => $upload_data['file_name'],
                 'ass_code' => $add1['fa_assetcode'],
                 'ass_num' => $num,
            );
                $q1=$this->db->insert('ass_img',$ins1);

                }
                $num++;
            }
        }

   $add = $this->input->post();
   if($add['chk']==1){
         $ins = array(
        'fa_status' => $add['fa_status'],
        'fa_assetcode' => $add['fa_assetcode'],
        'fa_ref' => $add['fa_ref'],
        'fa_dtype' => $add['fa_dtype'],
        'woffdate' => $add['woffdate'],
        'fa_asset' => $add['fa_asset'],
        'fa_rent' => $add['fa_rent'],
        'fa_refap' => $add['fa_refap'],
        'fa_assdate' => $add['fa_assdate'],
        'fa_refpo' => $add['fa_refpo'],
        'fa_atype' => $add['fa_atype'],
        'fa_atypename' => $add['fa_atypename'],
        'fa_tax' => $add['fa_tax'],
        'fa_gldate' => $add['fa_gldate'],
        'fa_year' => $add['fa_year'],
        'fa_month' => $add['fa_month'],
        'fa_vender' => $add['fa_vender'],
        'fa_vendername' => $add['fa_vendername'],
        'fa_sr' => $add['fa_sr'],
        'fa_warantee' => $add['fa_warantee'],
        'fa_waranty' => $add['fa_waranty'],
        'fa_warantydate' => $add['fa_warantydate'],
        'fa_amount' => $add['fa_amount'],
        'fa_quantity' => $add['fa_quantity'],
        'fa_unit' => $add['fa_unit'],
        'fa_state' => $add['fa_state'],
        'fa_depreciation' => $add['fa_depreciation'],
        'fa_depreciationcode' => $add['fa_depreciationcode'],
        'fa_depreciationname' => $add['fa_depreciationname'],
        'fa_bf' => $add['fa_bf'],
        'fa_asdate' => $add['fa_asdate'],      
        'fa_yearbf' => $add['fa_yearbf'],
        'fa_monthbf' => $add['fa_monthbf'],
        'fa_prev' => $add['fa_prev'],
        'fa_this' => $add['fa_this'],
        'fa_thisdate' => $add['fa_thisdate'],
        'fa_yearprev' => $add['fa_yearprev'],
        'fa_monthprev' => $add['fa_monthprev'],
        'fa_total' => $add['fa_total'],
        'fa_group' => $add['fa_group'],
        'fa_residual' => $add['fa_residual'],
        'fa_amountbal' => $add['fa_amountbal'],
        'fa_location' => $add['fa_location'],
        'fa_locationid' => $add['fa_locationid'],
        'fa_locationname' => $add['fa_locationname'],
        'fa_projectid' => $add['fa_projectid'],
        'fa_projectname' => $add['fa_projectname'],
        'fa_job' => $add['fa_job'],
        // 'fa_departmentid' => $add['fa_departmentid'],
        // 'fa_departmentname' => $add['fa_departmentname'],
        'fa_issue' => $add['fa_issue'],
        'fa_liseid' => $add['fa_liseid'],
        'fa_lisename' => $add['fa_lisename'],
        'fa_all1' => $add['fa_all1'],
        'fa_all2' => $add['fa_all2'],
        'fa_all3' => $add['fa_all3'],
        'fa_all4' => $add['fa_all4'],
        'fa_all5' => $add['fa_all5'],
        'at_acaid' => $add['at_acaid'],
        'at_aca' => $add['at_aca'],
        'at_acdid' => $add['at_acdid'],
        'at_acd' => $add['at_acd'],
        'at_costid' => $add['at_costid'],
        'at_cost' => $add['at_cost'],
        'at_acaccid' => $add['at_acaccid'],
        'at_acacc' => $add['at_acacc'],
        'status' =>'1',
        'useradd' => $username,
        'adddate' => date('Y-m-d H:i:s'),
        'compcode' => $compcode,

    );

  $this->db->insert('asset',$ins);

         for ($i=0; $i < count($add['matidi']); $i++) {
                if($add['matidi'][$i]!=""){
                 $data_d = array(
                   'assetcode' => $add['fa_assetcode'],    
                   'matidi' => $add['matidi'][$i],
                   'matnamei' => $add['matnamei'][$i],
                   'remark' => $add['remark'][$i],            
                   'price_unit' => $add['price_unit'][$i],
                   'uniti' => $add['uniti'][$i],
                   'amounti' => $add['amounti'][$i],
                   'qtyi' => $add['qtyi'][$i],      
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('asset_item',$data_d);
         }
        }
     }

        if($add['chk']==2){
         $ins = array(
        'fa_status' => $add['fa_status'],
        'fa_assetcode' => $add['fa_assetcode'],
        'fa_ref' => $add['fa_ref'],
        'fa_dtype' => $add['fa_dtype'],
        'woffdate' => $add['woffdate'],
        'fa_asset' => $add['fa_asset'],
        'fa_rent' => $add['fa_rent'],
        'fa_refap' => $add['fa_refap'],
        'fa_assdate' => $add['fa_assdate'],
        'fa_refpo' => $add['fa_refpo'],
        'fa_atype' => $add['fa_atype'],
        'fa_atypename' => $add['fa_atypename'],
        'fa_tax' => $add['fa_tax'],
        'fa_gldate' => $add['fa_gldate'],
        'fa_year' => $add['fa_year'],
        'fa_month' => $add['fa_month'],
        'fa_vender' => $add['fa_vender'],
        'fa_vendername' => $add['fa_vendername'],
        'fa_sr' => $add['fa_sr'],
        'fa_warantee' => $add['fa_warantee'],
        'fa_waranty' => $add['fa_waranty'],
        'fa_warantydate' => $add['fa_warantydate'],
        'fa_amount' => $add['fa_amount'],
        'fa_quantity' => $add['fa_quantity'],
        'fa_unit' => $add['fa_unit'],
        'fa_state' => $add['fa_state'],
        'fa_depreciation' => $add['fa_depreciation'],
        'fa_depreciationcode' => $add['fa_depreciationcode'],
        'fa_depreciationname' => $add['fa_depreciationname'],
        'fa_bf' => $add['fa_bf'],
        'fa_asdate' => $add['fa_asdate'],      
        'fa_yearbf' => $add['fa_yearbf'],
        'fa_monthbf' => $add['fa_monthbf'],
        'fa_prev' => $add['fa_prev'],
        'fa_this' => $add['fa_this'],
        'fa_thisdate' => $add['fa_thisdate'],
        'fa_yearprev' => $add['fa_yearprev'],
        'fa_monthprev' => $add['fa_monthprev'],
        'fa_total' => $add['fa_total'],
        'fa_residual' => $add['fa_residual'],
        'fa_amountbal' => $add['fa_amountbal'],
        'fa_location' => $add['fa_location'],
        'fa_locationid' => $add['fa_locationid'],
        'fa_locationname' => $add['fa_locationname'],
        'fa_projectid' => $add['fa_projectid'],
        'fa_projectname' => $add['fa_projectname'],
        'fa_job' => $add['fa_job'],
        'fa_departmentid' => $add['fa_departmentid'],
        'fa_departmentname' => $add['fa_departmentname'],
        'fa_issue' => $add['fa_issue'],
        'fa_liseid' => $add['fa_liseid'],
        'fa_lisename' => $add['fa_lisename'],
        'fa_all1' => $add['fa_all1'],
        'fa_all2' => $add['fa_all2'],
        'fa_all3' => $add['fa_all3'],
        'fa_all4' => $add['fa_all4'],
        'fa_all5' => $add['fa_all5'],
        'at_acaid' => $add['at_acaid'],
        'at_aca' => $add['at_aca'],
        'at_acdid' => $add['at_acdid'],
        'at_acd' => $add['at_acd'],
        'at_costid' => $add['at_costid'],
        'at_cost' => $add['at_cost'],
        'at_acaccid' => $add['at_acaccid'],
        'at_acacc' => $add['at_acacc'],
        'useradd' => $username,
        'adddate' => date('Y-m-d H:i:s'),
        'compcode' => $compcode,

    );

$this->db->where('fa_assetcode',$add['fa_assetcode']);
$q = $this->db->update('asset',$ins);

         for ($i=0; $i < count($add['matidi']); $i++) {
                if($add['matidi'][$i]!=""){
                 $data_d = array(
                   'assetcode' => $add['fa_assetcode'],    
                   'matidi' => $add['matidi'][$i],
                   'matnamei' => $add['matnamei'][$i],
                   'remark' => $add['remark'][$i],            
                   'price_unit' => $add['price_unit'][$i],
                   'uniti' => $add['uniti'][$i],
                   'amounti' => $add['amounti'][$i],
                   'qtyi' => $add['qtyi'][$i],      
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );
$this->db->where('assetcode',$add['fa_assetcode']);
$a = $this->db->update('asset_item',$data_d);
         }
     }

     for ($i=0; $i < count($add['chki']); $i++) {
                if($add['chki'][$i]=="Y"){
                 $data_d = array(
                   'assetcode' => $add['fa_assetcode'],    
                   'matidi' => $add['matidi'][$i],
                   'matnamei' => $add['matnamei'][$i],
                   'remark' => $add['remark'][$i],            
                   'price_unit' => $add['price_unit'][$i],
                   'uniti' => $add['uniti'][$i],
                   'amounti' => $add['amounti'][$i],
                   'qtyi' => $add['qtyi'][$i],      
                   'creatuser' => $username,
                   'creatudate' => date('Y-m-d H:i:s'),
                   'compcode' => $compcode,
                 );

           $this->db->insert('asset_item',$data_d);
         }
     }

     }
     redirect('add_asset');
}

public function transferasset(){
   $datestring = "Y";
          $m = "m";
          $d = "d";

                              $this->db->select('*');
                              $qu = $this->db->get('transfer');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                                if ($res==0) {
                                  $tf = "TF".date($datestring).date($m).date($d)."1";
                                }else{
                                    $this->db->select('*');
                                    $this->db->order_by('tra_id','desc');
                                    $this->db->limit('1');
                                    $q = $this->db->get('transfer');
                                    $run = $q->result();
                                    foreach ($run as $valx)
                                    {
                                        $x1 = $valx->tra_id+1;
                                    }
                                  $tf = "TF".date($datestring).date($m).date($d).$x1;
                                }
$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];
$compcode = $session_data['compcode'];
$add = $this->input->post();
         $ins = array(
        'transfer_code' => $tf,
        'transfer_date' => $add['transfer_date'],
        'transfer_time' => $add['transfer_time'],
        'transfer_document' => $add['transfer_document'],
        'fa_departmentid' => $add['fa_departmentid'],
        'fa_departmentname' => $add['fa_departmentname'],
        'fa_projectid' => $add['fa_projectid'],
        'fa_projectname' => $add['fa_projectname'],
        'transfer_de' => $add['transfer_de'],
        'transfer_assdate' => $add['transfer_assdate'],
        'transfer_driver' => $add['transfer_driver'],
        'transfer_registration' => $add['transfer_registration'],
        'transfer_carrier' => $add['transfer_carrier'],
        'useradd' => $username,
        'timeadd' => date('Y-m-d H:i:s'),
        'compcode' => $compcode,
    );
 $this->db->insert('transfer',$ins);

for ($i=0; $i < count($add['chki']); $i++) {
 if($add['chki'][$i]=="Y"){
 $inss = array(
        'transfer_code' => $tf,
        'transfer_assetcode' => $add['transfer_assetcode'][$i],
        'transfer_assetname' => $add['transfer_assetname'][$i],
        'transfer_sr' => $add['transfer_sr'][$i],
        'transfer_projectname' => $add['transfer_projectname'][$i],
        'transfer_projectid' => $add['transfer_projectid'][$i],
        'transfer_job' => $add['transfer_job'][$i],
        'transfer_departmentid' => $add['transfer_departmentid'][$i],
        'transfer_departmentname' => $add['transfer_departmentname'][$i],
        'transfer_liseid' => $add['transfer_liseid'][$i],
        'transfer_lisename' => $add['transfer_lisename'][$i],
        'transfer_availablity' => $add['transfer_availablity'][$i],
        'transfer_id' => $add['transfer_id'][$i],
        'transfer_name' => $add['transfer_name'][$i],
        'transfer_locode' => $add['transfer_locode'][$i],
        'transfer_loname' => $add['transfer_loname'][$i],
        'transfer_remark' => $add['transfer_remark'][$i],
        'proto' => $add['fa_projectname'],
        'departto' => $add['fa_departmentname'],
        'useradd' => $username,
        'timeadd' => date('Y-m-d H:i:s'),
        'compcode' => $compcode,
    );
  $this->db->insert('transfer_item',$inss);
}
}
for ($i=0; $i < count($add['chki']); $i++) {
 if($add['chki'][$i]=="Y"){
 $insss = array(
      'fa_liseid' => $add['transfer_id'][$i],
      'fa_lisename' => $add['transfer_name'][$i],
      'fa_locationid' => $add['transfer_locode'][$i],
      'fa_locationname' => $add['transfer_loname'][$i],
      'fa_projectid' => $add['fa_projectid'],
      'fa_projectname' => $add['fa_projectname'],
      'fa_departmentid' => $add['fa_departmentid'],
      'fa_departmentname' => $add['fa_departmentname'],
      'fa_location' => $add['fa_location']
);
$this->db->where('fa_assetcode',$add['transfer_assetcode'][$i]);
$q = $this->db->update('asset',$insss);
}
}
 $base_url = $this->config->item("url_report");
 redirect($base_url.'stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=famata.mrt&docno='.$tf);
}


public function insertdepreciation(){
     $datestring = "Y";
          $m = "m";
          $d = "d";
          $this->db->select('*');
          $qu = $this->db->get('depreciation');
          $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
          if ($res==0) {
           $DEPT = "DEPT".date($datestring).date($m).date($d)."1";
           }else{
               $this->db->select('*');
               $this->db->order_by('de_id','desc');
              $this->db->limit('1');
               $q = $this->db->get('depreciation');
              $run = $q->result();
               foreach ($run as $valx)
               {
                  $x1 = $valx->de_id+1;
               }
             $DEPT = "DEPT".date($datestring).date($m).date($d).$x1;
              }
$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];
$compcode = $session_data['compcode'];
 $add = $this->input->post();
         $ins = array(
        'de_code' => $DEPT,
        'de_date' => $add['de_date'],
        'de_glno' => $add['de_glno'],
        'de_gldate' => $add['de_gldate'],
        'de_glyear' => $add['de_glyear'],
        'de_period' => $add['de_period'],
        'de_yearr' => $add['de_yearr'],
        'de_month' => $add['de_month'],
        'de_datefrom' => $add['de_datefrom'],
        'de_dateto' => $add['de_dateto'],
        'de_total' => $add['de_total'],
        'de_remark' => $add['de_remark'],

        'useradd' => $username,
        'timeadd' => date('Y-m-d H:i:s'),
        'compcode' => $compcode,
        'status' => "no",
    );
 $this->db->insert('depreciation',$ins);

 for ($i=0; $i < count($add['chki']); $i++) {
 if($add['chki'][$i]=="Y"){
 $insss = array(
      'de_code' => $DEPT,
      'de_ass' => $add['de_ass'][$i],
      'de_assname' => $add['de_assname'][$i],
      'de_assdate' => $add['de_assdate'][$i],
      'de_assamout' => $add['de_assamout'][$i],
      'de_residual' => $add['de_residual'][$i],
      'de_assper' => $add['de_assper'][$i],
      'de_assbf' => $add['de_assbf'][$i],
      'de_fr' => $add['de_fr'][$i],
      'de_to' => $add['de_to'][$i],
      'de_day' => $add['de_day'][$i],
      'de_periond' => $add['de_periond'][$i],
      'de_pjname' => $add['de_pjname'][$i],
      'de_pjid' => $add['de_pjid'][$i],
      'de_job' => $add['de_job'][$i],
      // 'de_dpmname' => $add['de_dpmname'][$i],
      // 'de_dpmid' => $add['de_dpmid'][$i],
      'de_at_acaid' => $add['de_at_acaid'][$i],
      'de_ataca' => $add['de_ataca'][$i],
      'de_acdid' => $add['de_acdid'][$i],
      'de_acd' => $add['de_acd'][$i],
      'de_costid' => $add['de_costid'][$i],
      'de_cost' => $add['de_cost'][$i],
      'de_acaccid' => $add['de_acaccid'][$i],
      'de_acacc' => $add['de_acacc'][$i],
      'de_met' => $add['de_met'][$i],
      'de_year' => $add['de_year'][$i],
      'de_datefig' => $add['de_date'],
      'useradd' => $username,
      'timeadd' => date('Y-m-d H:i:s'),
      'compcode' => $compcode,
);
 $this->db->insert('depreciation_item',$insss);
}

$uddd = array(
  'status' => $add['de_ud'][$i],
  );
$this->db->where('fa_assetcode',$add['de_ass'][$i]);
$q = $this->db->update('asset',$uddd);


}
for ($gl=0; $gl < count($add['dr']); $gl++) {
// add gl_post_system
  $datag = array(
    'gl_refcode' => $DEPT,
    'gl_actcode' => $add['act_code'][$gl],
    'gl_dr' => $add['dr'][$gl],
    'gl_cr' => $add['cr'][$gl],
    'useradd' => $username,
    'adddate' => date('Y-m-d H:i:s'),
    'gl_date' => date('Y-m-d'),
    'gl_year' => $add['de_glyear'],
    'gl_period' => $add['de_period'],
    'compcode' => $compcode,
    // 'gl_job' => $add['systemcode'][$gl],
    'gl_project' => $add['de_pjid'][$gl],
    'gl_type' => "FA",
    'status' => "N",
  );
  $this->db->insert('gl_post_system',$datag);
// add gl_post_system
}
 redirect('add_depreciation');
}


public function delindexaccode(){
  $id = $this->uri->segment(3);
  $this->db->where('de_code', $id);
  $this->db->delete('depreciation');

  $this->db->where('de_code', $id);
  $this->db->delete('depreciation_item');

  
 redirect('add_depreciation');
}


public function del_dep()
{
    $code = $this->input->post('code');
    
    $this->db->where('depreciation_code', $code);
    $this->db->delete('depreciation_header');

    $this->db->where('depreciation_codeh', $code);
    $this->db->delete('depreciation_detail');

}

public function maintenanceass(){
  $datestring = "Y";
          $m = "m";
          $d = "d";
          $this->db->select('*');
        $qu = $this->db->get('fa_maintenanceasset');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
          if ($res==0) {
           $MTN = "MTN".date($datestring).date($m).date($d)."1";
           }else{
               $this->db->select('*');
               $this->db->order_by('fam_id','desc');
              $this->db->limit('1');
               $q = $this->db->get('fa_maintenanceasset');
              $run = $q->result();
               foreach ($run as $valx)
               {
                  $x1 = $valx->fam_id+1;
               }
             $MTN = "MTN".date($datestring).date($m).date($d).$x1;
              }
$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];
$compcode = $session_data['compcode'];
 $add = $this->input->post();
         $ins = array(
        'asfa_dec' => $MTN,
        'asfa_old' => $add['asfa_old'],
        'asfa_docdate' => $add['asfa_docdate'],
        'asfa_refno' => $add['asfa_refno'],
        'asfa_refdate' => $add['asfa_refdate'],
        'asfa_asscode' => $add['asfa_asscode'],
        'asfa_assname' => $add['asfa_assname'],
        'fa_projectid' => $add['fa_projectid'],
        'fa_projectname' => $add['fa_projectname'],
        'fa_departmentid' => $add['fa_departmentid'],
        'fa_departmentname' => $add['fa_departmentname'],
        'asfa_cost' => $add['asfa_cost'],
        'asfa_name' => $add['asfa_name'],
        'fa_vender' => $add['fa_vender'],
        'subcontact' => $add['subcontact'],
        'venderid' => $add['venderid'],
        'asfa_qty' => $add['asfa_qty'],
        'asfa_nextdate' => $add['asfa_nextdate'],
        'asfa_milk' => $add['asfa_milk'],
        'asfa_nextm' => $add['asfa_nextm'],
        'asfa_amount' => $add['asfa_amount'],
        'asfa_vat' => $add['asfa_vat'],
        'asfa_vatb' => $add['asfa_vatb'],
        'asfa_wh' => $add['asfa_wh'],
        'asfa_whb' => $add['asfa_whb'],
        'asfa_netam' => $add['asfa_netam'],
        'asfa_des1' => $add['asfa_des1'],
        'asfa_des2' => $add['asfa_des2'],
        'asfa_des3' => $add['asfa_des3'],
        'asfa_des4' => $add['asfa_des4'],
        'asfa_des5' => $add['asfa_des5'],

        'useradd' => $username,
        'timeadd' => date('Y-m-d H:i:s'),
        'compcode' => $compcode,
    );
 $this->db->insert('fa_maintenanceasset',$ins);
 redirect('add_asset/maintenance');
}
public function insert_writeoff(){
 $datestring = "Y";
          $m = "m";
          $d = "d";
          $this->db->select('*');
        $qu = $this->db->get('fa_writeoff');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
          if ($res==0) {
           $of = "OFF".date($datestring).date($m).date($d)."1";
           }else{
               $this->db->select('*');
               $this->db->order_by('off_no','desc');
              $this->db->limit('1');
               $q = $this->db->get('fa_writeoff');
              $run = $q->result();
               foreach ($run as $valx)
               {
                  $x1 = $valx->off_no+1;
               }
             $of = "OFF".date($datestring).date($m).date($d).$x1;
              }
$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];
$compcode = $session_data['compcode'];
$add = $this->input->post();
         $ins = array(
          'off_code' => $of, 
          'off_asscode' => $add['off_asscode'],
          'off_assname' => $add['off_assname'],
          'off_chkmodule' => $add['off_chkmodule'],
          'off_depid' => $add['off_depid'],
          'off_depname' => $add['off_depname'],
          'off_vch' => $add['off_vch'],
          'off_pjno' => $add['off_pjno'],
          'off_pjname' => $add['off_pjname'],
          'off_chkdepra' => $add['off_chkdepra'],
          'off_buyam' => $add['off_buyam'],
          'off_depre' => $add['off_depre'],
          'off_depas' => $add['off_depas'],
          'off_buyd' => $add['off_buyd'],
          'off_buycode' => $add['off_buycode'],
          'off_date' => $add['off_date'],
          'off_depday' => $add['off_depdays'],
          'off_depdayper' => $add['off_depdayper'],
          'off_thiam' => $add['off_thiam'],
          'off_type' => $add['off_type'],
          'off_amt' => $add['off_amt'],
          'off_vatper' => $add['off_vatper'],   
          'off_vat' => $add['off_vat'],
          'off_netam' => $add['off_netam'],
          'off_loss' => $add['off_loss'],
          'off_remark' => $add['off_remark'],
          'useradd' => $username,
          'addtime' => date('Y-m-d H:i:s'),
          'compcode' => $compcode,
          'status' => "no",
          );
 $this->db->insert('fa_writeoff',$ins);
 

 for ($i=0; $i < count($add['off_apcode']); $i++) {
   if($add['chki'][$i]=="Y"){
  $insss = array(
      'de_code' => $of,
      'off_apcode' => $add['off_apcode'][$i],
      'off_apname' => $add['off_apname'][$i],
      'off_costcode' => $add['off_costcode'][$i],
      'off_costname' => $add['off_costname'][$i],
      'off_dr' => $add['off_dr'][$i],
      'off_cr' => $add['off_cr'][$i],

      'useradd' => $username,
      'timeadd' => date('Y-m-d H:i:s'),
      'compcode' => $compcode,
);
 $this->db->insert('fa_writeoffitem',$insss);
 }
}

redirect('add_asset/write_off');
}

public function reportfa_p(){
  $add = $this->input->post();
if($add['atc']!=""){
  $base_url = $this->config->item("url_report");
  redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportfa_patc.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['project_code']."&atc=".$add['atc']);
}else if($add['att']!=""){
$base_url = $this->config->item("url_report");
redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportfa_patt.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['project_code']."&att=".$add['att']);
}else if($add['atc']=="" && $add['atc']==""){
$base_url = $this->config->item("url_report");
redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportfa_pall.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['project_code']);
}  

}


public function reportfa_d(){
  $add = $this->input->post();
if($add['atc']!=""){
  $base_url = $this->config->item("url_report");
  redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportfa_datc.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['departmentid']."&atc=".$add['atc']);
}else if($add['att']!=""){
$base_url = $this->config->item("url_report");
redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportfa_datt.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['departmentid']."&att=".$add['att']);
}else if($add['atc']=="" && $add['atc']==""){
$base_url = $this->config->item("url_report");
redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportfa_dall.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['departmentid']);
} 


}
public function reportfa_departall(){
$id = $this->uri->segment(3);
$base_url = $this->config->item("url_report");
redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportfa_departall.mrt&code=".$id);
}

public function reportfa_projectall(){
$id = $this->uri->segment(3);
$base_url = $this->config->item("url_report");
redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportfa_projectall.mrt&code=".$id);
}
public function reportfa(){
    $add = $this->input->post();
  $base_url = $this->config->item("url_report");
  redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportatc.mrt&start=".$add['startdate']."&end=".$add['enddate']."&atc=".$add['atc']);
}

public function reportatt(){
    $add = $this->input->post();
  $base_url = $this->config->item("url_report");
  redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reportatt.mrt&start=".$add['startdate']."&end=".$add['enddate']."&att=".$add['att']);
}


public function report_tfpro(){
  $add = $this->input->post();
  if($add['assc']!=""){
     $base_url = $this->config->item("url_report");
     redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_ass.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['project_code']."&assc=".$add['assc']);
   }else if($add['tfc']!=""){
     $base_url = $this->config->item("url_report");
     redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_tfc.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['project_code']."&tfc=".$add['tfc']);
   }else if($add['loid']!=""){
     $base_url = $this->config->item("url_report");
     redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_lo.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['project_code']."&loid=".$add['loid']);
   }else if($add['assc']=="" && $add['tfc']=="" && $add['loid']==""){
     $base_url = $this->config->item("url_report");
     redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_all.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['project_code']);
   }
}

public function report_tfde(){
  $add = $this->input->post();
  if($add['assc']!=""){
     $base_url = $this->config->item("url_report");
     redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_assde.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['departmentid']."&assc=".$add['assc']);
   }else if($add['tfc']!=""){
     $base_url = $this->config->item("url_report");
     redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_tfcde.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['departmentid']."&tfc=".$add['tfc']);
   }else if($add['loid']!=""){
     $base_url = $this->config->item("url_report");
     redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_lode.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['departmentid']."&loid=".$add['loid']);
   }else if($add['assc']=="" && $add['tfc']=="" && $add['loid']==""){
     $base_url = $this->config->item("url_report");
     redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_allde.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['departmentid']);
   }
}

public function fatf_report(){
  $add = $this->input->post();
   $base_url = $this->config->item("url_report");
   redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_fatf_report.mrt&start=".$add['startdate']."&end=".$add['enddate']);
}

public function fafa_report(){
  $add = $this->input->post();
   $base_url = $this->config->item("url_report");
   redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Reporttf_fafa_report.mrt&start=".$add['startdate']."&end=".$add['enddate']."&assc=".$add['assc']);
}

public function Report_woffassetall(){
      $id = $this->uri->segment(3);
$base_url = $this->config->item("url_report");
redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Report_woffassetall.mrt&code=".$id);
   
}

public function Report_woffassetpj(){
  $add = $this->input->post();
     $base_url = $this->config->item("url_report");
     redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Report_woffassetpj.mrt&start=".$add['startdate']."&end=".$add['enddate']."&code=".$add['project_code']);
   
}

public function Report_woffassetpjall(){
      $id = $this->uri->segment(3);
$base_url = $this->config->item("url_report");
redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Report_woffassetpjall.mrt&code=".$id);
   
}
public function wfassdate(){
  $add = $this->input->post();
   $base_url = $this->config->item("url_report");
   redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=Report_woffdate.mrt&start=".$add['startdate']."&end=".$add['enddate']);
}
public function countassetsave(){
 $datestring = "Y";
          $m = "m";
          $d = "d";
          $this->db->select('*');
        $qu = $this->db->get('count_h');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
          if ($res==0) {
           $co = "CO".date($datestring).date($m).date($d)."1";
           }else{
               $this->db->select('*');
               $this->db->order_by('co_no','desc');
              $this->db->limit('1');
               $q = $this->db->get('count_h');
              $run = $q->result();
               foreach ($run as $valx)
               {
                  $x1 = $valx->co_no+1;
               }
             $co = "CO".date($datestring).date($m).date($d).$x1;
              }

$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];
$compcode = $session_data['compcode'];
$add = $this->input->post();

if($add['chkstatus']=="Y"){
  $ins = array(
          'co_code' => $co, 
          'co_departmentid' => $add['co_departmentid'],
          'co_departmentname' => $add['co_departmentname'],
          'co_projectid' => $add['co_projectid'],
          'co_projectname' => $add['co_projectname'],
          'co_all1' => $add['co_all1'],
          'co_all2' => $add['co_all2'],
          'co_all3' => $add['co_all3'],
          'co_chk1' => $add['co_chk1'],
          'co_chk2' => $add['co_chk2'],
          'co_chk3' => $add['co_chk3'],

          'useradd' => $username,
          'timeadd' => date('Y-m-d H:i:s'),
          'compcode' => $compcode,
          );
  $this->db->insert('count_h',$ins);
}


   for ($i=0; $i < count($add['chki']); $i++) {
   if($add['chki'][$i]=="Y"){
  $insss = array(
      'cod_code' => $co,
      'transfer_assetcode' => $add['transfer_assetcode'][$i],
      'transfer_assetname' => $add['transfer_assetname'][$i],
      'transfer_sr' => $add['transfer_sr'][$i],
      'transfer_quantity' => $add['transfer_quantity'][$i],
      'transfer_liseid' => $add['transfer_liseid'][$i],
      'transfer_lisename' => $add['transfer_lisename'][$i],
      'transfer_residual' => $add['transfer_residual'][$i],
      'checktranfer' => $add['checktranfer'][$i],
      'transfer_remark' => $add['transfer_remark'][$i],

      'useradd' => $username,
      'timeadd' => date('Y-m-d H:i:s'),
      'compcode' => $compcode,
);
 $this->db->insert('count_d',$insss);
 }
}

if($add['chkstatus']=="X"){
  $ins1 = array(
          'co_departmentid' => $add['co_departmentid'],
          'co_departmentname' => $add['co_departmentname'],
          'co_projectid' => $add['co_projectid'],
          'co_projectname' => $add['co_projectname'],
          'co_all1' => $add['co_all1'],
          'co_all2' => $add['co_all2'],
          'co_all3' => $add['co_all3'],
          'co_chk1' => $add['co_chk1'],
          'co_chk2' => $add['co_chk2'],
          'co_chk3' => $add['co_chk3'],

          'useredit' => $username,
          'timeedit' => date('Y-m-d H:i:s'),
          );
  $this->db->where('co_code',$add['co_accode']);
  $q = $this->db->update('count_h',$ins1);
}

for ($i=0; $i < count($add['chki']); $i++) {
   if($add['chki'][$i]=="X"){
  $insss = array(
      'checktranfer' => $add['checktranfer1'][$i],
      'transfer_remark' => $add['transfer_remark'][$i],

      'useredit' => $username,
      'timeedit' => date('Y-m-d H:i:s'),
);
      $this->db->where('cod_no',$add['transfer_no'][$i]);
      $q = $this->db->update('count_d',$insss);
 }
}

if($add['chkstatus']=="Y"){
  $base_url = $this->config->item("url_report");
  redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=countasset.mrt&docno=".$co);
}else if($add['chkstatus']=="X"){
  $base_url = $this->config->item("url_report");
  redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=countasset.mrt&docno=".$add['co_accode']);
}

}

public function delcount(){
$id = $this->uri->segment(3);
  $this->db->where('co_code', $id);
  $this->db->delete('count_h');
  
 $this->db->where('cod_code', $id);
  $this->db->delete('count_d');
 redirect('add_asset/count');
}

public function del_assetcode(){
  $id = $this->uri->segment(3);
 $this->db->where('fa_no',$id);
 $this->db->delete('asset');

 redirect('add_asset');
}


public function inslessother(){
$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];
$compcode = $session_data['compcode'];
$add = $this->input->post();
         $ins = array(
        'less_name' => $add['lessname'],
        'less_ac' => $add['accountcode'],
        'less_costcode' => $add['costcode'],
        'less_costname' => $add['costname'],
        'less_tax' => $add['chkvat'],  
        'less_taxtype' => $add['taxtype'],  
        'addby' => $username,
        'adddate' => date('Y-m-d H:i:s'),
        'compcode' => $compcode, 
        'status'  =>"Y" 
        );
      $this->db->insert('less_other',$ins);        
  redirect('ap/lessother');
}

public function editlessother()
        {
          $id = $this->uri->segment(3) ;
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode']; 
            $add = $this->input->post();    
               $ins = array(
              'less_name' => $add['lessname'],
              'less_ac' => $add['accountcode'],
              'less_costcode' => $add['costcode'],
              'less_costname' => $add['costname'],
              'less_tax' => $add['chkvat'],  
              'less_taxtype' => $add['taxtype'], 
              'editby' => $username, 
              'editdate' => date('Y-m-d H:i:s') ,
              'compcode' => $compcode,
              'status'  =>"Y"
            );
                    
            $this->db->where('id_lessother',$id);
            $this->db->update('less_other',$ins);
            redirect('ap/lessother');
        } 

        public function delectlessother()
        {
          $id = $this->uri->segment(3) ;
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode']; 
               $ins = array(
              'status'  =>"D",
              'delby' => $username, 
              'deldate' => date('Y-m-d H:i:s') ,
            );
                    
            $this->db->where('id_lessother',$id);
            $this->db->update('less_other',$ins);
            redirect('ap/lessother');
        }

public function getlesssetup()
        {
      
            $this->db->select('*');
            $query = $this->db->get('less_other');
            $get_less = $query->result();

         echo "<table class='table table-hover table-bordered table-xxs'>";
         echo "<thead><tr>
                               <th width='10%' style='text-align: center;'>Code</th>
                               <th class='text-center'>Less Name</th>
                               <th width='10%'  style='text-align: center;'>A/C </th>
                               <th width='10%'  style='text-align: center;'>Cost Code</th>                   
                               <th style='text-align: center;'>Tax</th>
                               <th style='text-align: center;'>Tax Type</th>
                               <th style='text-align: center;'>Add by</th>
                               <th style='text-align: center;'>Add Date</th>
                               <th style='text-align: center;'>Edit by</th>
                               <th style='text-align: center;'>Edit Date</th>
                               <th style='text-align: center;' width='10%'>Action</th>
                      </tr></thead>";
         echo '<tbody>';
         $n = 1;
          foreach ($get_less as $getless) {
            echo "<tr>";
          echo "<td class='text-center'>".$n."</td>";
          echo "<td>".$getless->less_name."</td>";
          echo "<td>".$getless->less_ac."</td>";
          echo "<td>".$getless->less_costcode."</td>";
          echo "<td class='text-center'><input type='checkbox' name='etax$getless->id_lessother'";
              if($getless->less_tax==1){ echo "checked " ;}
          echo "class='form-control input-sm' value='$getless->less_tax' readonly></td>";
          echo "<td>";
                      if($getless->less_taxtype==15){echo "ดอกเบี้ยจ่าย"; }
                      elseif($getless->less_taxtype==0){echo "ไม่มีหัก"; }
                      elseif($getless->less_taxtype==3){echo "ค่าบริการ 3%"; } 
                      elseif($getless->less_taxtype==1){echo "ค่าขนส่ง 1%"; }
                      elseif($getless->less_taxtype==5){echo "ค่าเช่า 5%"; }
                      elseif($getless->less_taxtype==2){echo "ค่าโฆษณา 2%"; }
                      elseif($getless->less_taxtype==7){echo "ค่าจ้างเหมา 3%"; }
                      elseif($getless->less_taxtype==8){echo "เงินชดเชย 3%"; } 
                      elseif($getless->less_taxtype==9){echo "ค่าจ้างแรงงาน 3%"; }
          echo "</td>";


          echo "<td>".$getless->addby."</td>";
          echo "<td>".$getless->adddate."</td>";
          echo "<td>".$getless->editby."</td>";
          // echo "<td>";
          // echo base_url();
          // echo "</td>";
          echo "<td>".$getless->editdate."</td>";

          echo "<td><a id='editslo".$getless->id_lessother."' class='label label-info' data-toggle='modal' data-target='#modal_large".$getless->id_lessother."'><i class='icon-pencil7'></i> แก้ไข</a>
            <a id='remove".$getless->id_lessother."' class='label label-danger'><i class='icon-trash'></i> ลบ</a>
          </td>";
          // echo "<button type='button' class='btn btn-default btn-sm' >Launch <i class='icon-play3 position-right'></i></button>"
         echo "</tr>"; 
          
        $n=$n+1;}

  
         echo "</tbody>";
         echo "</table>";



$l=1;
foreach ($get_less as $getless) {
if($getless->less_tax==1){
  $chktax = "true" ;
}else{
  $chktax = "false" ;
}
   echo"<div id='modal_large".$getless->id_lessother."' class='modal fade in' >
            <div class='modal-dialog modal-lg'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'>×</button>
                  <h5 class='modal-title'>Edit Less Other</h5>
                </div>

                <div class='modal-body'>
                   <div class='row'>
                     <div class='col-sm-3'>
                          <label for='elntext".$getless->id_lessother."'>Less Name</label>           
                          <input type='text' id='elntext".$getless->id_lessother."' name='elntext".$getless->id_lessother."' class='form-control input-sm' value='".$getless->less_name."'>
                      </div>
                      <div class='col-sm-3'>
                  <label for='eactext".$getless->id_lessother."'>A/C</label>
                   <div class='input-group'>
                  <input type='text' id='eactext".$getless->id_lessother."' name='eactext".$getless->id_lessother."' class='form-control input-xs' value='".$getless->less_ac."'>
                  <span class='input-group-btn' >
                  <button type='button' class='btn btn-info btn-xs' id='acmdbtn".$getless->id_lessother."'  data-toggle='modal' data-target='#openunit".$l."'><i class='icon-search4'></i></button>
                  </span>
                 </div>
                      </div>
                       <div class='col-sm-3'>
                        <label for=''>CostCode</label>
                   <div class='input-group'>
                  <input type='text' readonly id='ecostcode".$getless->id_lessother."' name='ecostcode".$getless->id_lessother."' class='form-control input-sm' value='".$getless->less_costcode."'>
                  <span class='input-group-btn' >
                  <button type='button' class='btn btn-info btn-xs' id='ecostcodebtn".$getless->id_lessother."'  data-toggle='modal' data-target='#costcode".$l."'><i class='icon-search4'></i></button>
                  </span>
                 </div>
                </div>
                        <div class=col-sm-3>
                        <label for='tax'>TAX</label>";

              echo "<input type='checkbox' id='etaxx".$getless->id_lessother."' name='etax".$getless->id_lessother."'";
                     if($getless->less_tax==1){ echo "checked " ;}
              echo "class='form-control input-sm' value='".$getless->less_tax."'>";

              echo "<input type='hidden' id='etaxc".$getless->id_lessother."' name='etaxc".$getless->id_lessother."' class='form-control input-sm' value='".$chktax."'>";
              echo "<input type='hidden' id='wa".$getless->id_lessother."' name='wa".$getless->id_lessother."' class='form-control input-sm' value='".$chktax."'>";

              echo "</div>
                    </div>  
                    <div class='row'>     
                      <div class ='col-sm-3'>
                      <label for=''>TAX TYPE</label>
                      <select class='form-control' id='eap_wt".$getless->id_lessother."' name='eap_wt".$getless->id_lessother."'>";
              

                echo "<option value='".$getless->less_taxtype."'>";
                      if($getless->less_taxtype==15){echo "ดอกเบี้ยจ่าย"; }
                      elseif($getless->less_taxtype==0){echo "ไม่มีหัก"; }
                      elseif($getless->less_taxtype==3){echo "ค่าบริการ 3%"; } 
                      elseif($getless->less_taxtype==1){echo "ค่าขนส่ง 1%"; }
                      elseif($getless->less_taxtype==5){echo "ค่าเช่า 5%"; }
                      elseif($getless->less_taxtype==2){echo "ค่าโฆษณา 2%"; }
                      elseif($getless->less_taxtype==7){echo "ค่าจ้างเหมา 3%"; }
                      elseif($getless->less_taxtype==8){echo "เงินชดเชย 3%"; } 
                      elseif($getless->less_taxtype==9){echo "ค่าจ้างแรงงาน 3%"; }


                echo "</option>";
                echo "<option value='0'>ไม่มีหัก</option>
                      <option value='3'>ค่าบริการ 3%</option>
                      <option value='1'>ค่าขนส่ง 1%</option>
                      <option value='5'>ค่าเช่า 5%</option>
                      <option value='2'>ค่าโฆษณา 2%</option>
                      <option value='15'>ดอกเบี้ยจ่าย 15%</option>
                      <option value='7'>ค่าจ้างเหมา 3%</option>
                      <option value='8'>เงินชดเชย 3%</option>
                      <option value='9'>ค่าจ้างแรงงาน 3%</option></select>
                      </div>
                    </div>
                  </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-link' data-dismiss='modal'>Close</button>
                  <button type='button' id='editsave".$getless->id_lessother."' class='btn btn-primary' >บันทึกการแก้ไข</button>
                </div>
              </div>
            </div>
          </div>";
echo "<div class='modal fade' id='openunit".$l."' data-backdrop='false'>
          <div class='modal-dialog'>
          <div class='modal-content'>
          <div class='modal-header bg-info'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          <h4 class='modal-title' id='myModalLabel'>AC</h4>
          </div>
          <div class='modal-body'>
          <div id='modal_unitic".$l."'></div>
          </div>
          </div>
        </div>
      </div>";

  echo "<div class='modal fade' id='costcode".$l."' data-backdrop='false'>
          <div class='modal-dialog'>
          <div class='modal-content'>
          <div class='modal-header bg-info'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          <h4 class='modal-title' id='myModalLabel'>AC</h4>
          </div>
          <div class='modal-body'>
          <div id='modal_costcode".$l."'></div>
          </div>
          </div>
        </div>
      </div>";

echo "<script>";
echo "





    $('#etaxx".$getless->id_lessother."').change(function() {
        if(this.checked) {
           
            $(this).prop('checked');
        
        }
        $('#etaxc".$getless->id_lessother."').val(this.checked);        
    });





";
echo  "$('#remove".$getless->id_lessother."').click(function()
    {  
    
    var a = ".$getless->id_lessother."
    

     $.ajax({
         type: 'POST',
         url: 'removlessother/".$getless->id_lessother."', 
         data: {'a': a},
         dataType: 'json',  
         cache:false,
         success: 
              function(data){
                alert(d); 
               
              }
          });

         
          
          delayedAlert();
        
          }); ";


echo  "$('#editsave".$getless->id_lessother."').click(function()
    {  
    
    var a = $('#elntext".$getless->id_lessother."').val();
    var b = $('#eactext".$getless->id_lessother."').val();
    var c = $('#ecostcode".$getless->id_lessother."').val();
    var d = $('#etaxc".$getless->id_lessother."').val();
    var e = $('#eap_wt".$getless->id_lessother."').val();

     $.ajax({
         type: 'POST',
         url: 'editlessother/".$getless->id_lessother."', 
         data: {'a': a ,'b': b ,'c': c ,'d': d ,'e': e},
         dataType: 'json',  
         cache:false,
         success: 
              function(data){
                alert(d); 
               
              }
          });

          $('#modal_large".$getless->id_lessother."').modal('hide');
          
          delayedAlert();
        
          }); ";



echo "
$('#acmdbtn".$l."').click(function(){
   $('#modal_unitic".$l."').load('".base_url()."index.php/share/modalac/".$l."')";
echo "});";

echo "
$('#ecostcodebtn".$l."').click(function(){
   $('#modal_costcode".$l."').load('".base_url()."index.php/share/aceditlot/".$l."')";
echo "});";
   echo "</script>";



$l=$l+1;

}

              
        }
//   var txt1 = $('input[name=elntext".$getless->id_lessother."']').val();
// url: '".base_url()."safety_archive/editlessother/".$getless->id_lessother."', 
// $('#elntext".$getless->id_lessother."').val(data.#elntext".$getless->id_lessother.");



public function del_png(){
  $id = $this->uri->segment(3);
  $img = $this->uri->segment(4);

  unlink("imgasset/$img");

  $this->db->where('id', $id);
  $this->db->delete('ass_img');
}

  public function del_depre(){
  $id = $this->uri->segment(3);
  $de = $this->uri->segment(4);
  $this->db->where('depreciation_id', $id);
  $this->db->delete('depreciation_detail');

  redirect('inventory_area/open_depre/'.$de);
}
}



