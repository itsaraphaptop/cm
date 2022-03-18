<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class emp_profile extends CI_Controller {
public function __construct() {
            parent::__construct();
            $this->load->helper('date');
        }

public function edit_emp()
      {
        $add = $this->input->post();
        $ccode = $this->input->post('ccode');

        $data = array(
          'emp_name_t' => $add['emp_name_t'],
          'emp_name_e' => $add['emp_name_e'],
          'emp_nickname'=>$add['emp_nickname'],
          'emp_idcityzen'=>$add['emp_idcityzen'],
          'emp_tele' =>$add['emp_tele'],
          'emp_email'=>$add['emp_email'],
          'emp_h' =>$add['emp_h'],
          'emp_w' =>$add['emp_w'],
          'emp_bdate'=>$add['emp_bdate'],
          'emp_age'=>$add['emp_age'],
          'emp_child'=>$add['emp_child'],
          'emp_race'=>$add['emp_race'],
          'emp_nation'=>$add['emp_nation'],
          'emp_religion'=>$add['emp_religion'],
          'emp_brosis'=>$add['emp_brosis'],
          'emp_cno'=>$add['emp_brosis'],
          'emp_title' =>$add['emp_title'],
          'emp_title_e' =>$add['emp_title_e'],
          'emp_statuss'=>$add['emp_statuss'],
          'emp_code'=>$add['emp_code'],
          'emp_sex'=>$add['emp_sex'],

          );

        $this->db->where('emp_member',$add['ccode']);
        $this->db->update('emp_profile_tb',$data);
        //redirect('userprofile/selemp');


        $data_add = array(
          'emp_address_now'=>$add['emp_address_now'],
          'emp_address_book'=>$add['emp_address_book'],
          'emp_cflname'=>$add['emp_cflname'],
          'emp_cjob'=>$add['emp_cjob'],
          'emp_crela'=>$add['emp_crela'],
          'emp_cplace'=>$add['emp_cplace'],
          'emp_ctele'=>$add['emp_ctele'],
          'emp_code'=>$add['emp_code'],


          );
          $this->db->where('emp_member',$add['ccode']);
          $this->db->update('emp_contact_tb',$data_add);

             $datalang = array(
               'skill_lang'=>$add['skill_lang'],
               'skill_speak'=>$add['skill_speak'],
               'skill_read'=>$add['skill_read'],
               'skill_write'=>$add['skill_write'],
               'e_toelf'=>$add['e_toelf'],
               'e_toeic'=>$add['e_toeic'],
               'e_ielts'=>$add['e_ielts'],
               'e_tuget'=>$add['e_tuget'],
               'e_cutep'=>$add['e_cutep'],
               'emp_code'=>$add['emp_code'],
             );
             $this->db->where('emp_member',$add['ccode']);
            $this->db->update('emp_skill_tb',$datalang);


        $dataskill = array(
          's_car'=>$add['chkcar'],
          's_motor' =>$add['chkmotor'],
          's_truck' =>$add['ctruck'],
          's_cab' =>$add['ccab'],
          's_folk' =>$add['cfolk'],
          's_vehicle_car'=>$add['chkhcar'],
          's_vehicle_motor'=>$add['cchkhmotor'],
          's_vehicle_truck' =>$add['chkhtruck'],
           's_skill1'=> $add['skill1'],
           's_skill2'=> $add['skill2'],
           's_skill3'=> $add['skill3'],
           's_skill4'=> $add['skill4'],
           's_skill5'=> $add['skill5'],
           'lccar'=>$this->input->post("lccar"),
           'lcmotor'=>$this->input->post("lcmotor"),
           'lctruck'=>$this->input->post("lctruck"),
           'emp_code'=>$this->input->post("emp_code"),
          );

         $this->db->where('emp_member',$add['ccode']);
        $this->db->update('emp_otherskill_tb',$dataskill);


        $databehave = array(
          'emp_province' =>$add['rdbgo'],
          'emp_travel' =>$add['rdbgonation'],
          'emp_law'=>$add['rdblaw'],
          'emp_drink'=>$add['rdbdrink'],
          'emp_smoke'=>$add['rdbsmoke'],
          'emp_code'=>$add['emp_code'],

          );

        $this->db->where('emp_member',$add['ccode']);
        $this->db->update('emp_behave_tb',$databehave);


        $editcompany = array(
          
          'emp_position'=>$this->input->post("emp_position"),
          'emp_degree'=>$this->input->post("emp_degree"),
          'emp_department'=>$this->input->post("emp_department"),
          'emp_project'=>$this->input->post("emp_project"),
          'emp_bank'=>$this->input->post("emp_bank"),
          'emp_backmajor'=>$this->input->post("emp_backmajor"),
          'emp_insuid'=>$this->input->post("emp_insuid"),
          'emp_insuhos'=>$this->input->post("emp_insuhos"),
          'emp_lead'=>$this->input->post("emp_lead"),
          'emp_lead2'=>$this->input->post("emp_lead2"),
          'emp_bookbank'=>$this->input->post("emp_bookbank"),
          'emp_stat'=>$this->input->post("emp_stat"),
          'emp_start'=>$this->input->post("job_datestart"),
          'emp_insuhos'=>$this->input->post("emp_hos"),
          'emp_status'=>$this->input->post("emp_status"),
          'emp_code'=>$this->input->post("emp_code"),
          'emp_agework'=>$this->input->post("age_work"),
          'emp_pro'=>$this->input->post("age_pro"),
        );

        $this->db->where('emp_member',$add['ccode']);
        $this->db->update('emp_company_tb',$editcompany);

        if ($add['emp_status']==2) {
            $dleave = array(
            'leave_type'=> 2
            );
          $this->db->where('emp_member',$add['ccode']);
          $this->db->update('emp_leave',$dleave);
          }else{
            $dleave2 = array(
            'leave_type'=> 1
            );
          $this->db->where('emp_member',$add['ccode']);
          $this->db->update('emp_leave',$dleave2);
          }
        redirect('userprofile/edit_empp/'.$ccode);

      }

      public function edit_profile()
      {
        $add = $this->input->post();
        $id = $this->uri->segment(3);

        $data = array(
          'emp_name_t' => $add['emp_name_t'],
          'emp_name_e' => $add['emp_name_e'],
          'emp_nickname'=>$add['emp_nickname'],
          'emp_idcityzen'=>$add['emp_idcityzen'],
          'emp_tele' =>$add['emp_tele'],
          'emp_email'=>$add['emp_email'],
          'emp_h' =>$add['emp_h'],
          'emp_w' =>$add['emp_w'],
          'emp_bdate'=>$add['emp_bdate'],
          'emp_age'=>$add['emp_age'],
          'emp_child'=>$add['emp_child'],
          'emp_race'=>$add['emp_race'],
          'emp_nation'=>$add['emp_nation'],
          'emp_religion'=>$add['emp_religion'],
          'emp_brosis'=>$add['emp_brosis'],
          'emp_cno'=>$add['emp_brosis'],
          'emp_title' =>$add['emp_title'],
          'emp_title_e' =>$add['emp_title_e'],
          'emp_status'=>$add['emp_statuss'],
          'emp_code'=>$add['emp_code'],
          'emp_sex'=>$add['emp_sex'],
          );

        $this->db->where('emp_member',$id);
        $this->db->update('emp_profile_tb',$data);


        $data_add = array(
          'emp_address_now'=>$add['emp_address_now'],
          'emp_address_book'=>$add['emp_address_book'],
          'emp_cflname'=>$add['emp_cflname'],
          'emp_cjob'=>$add['emp_cjob'],
          'emp_crela'=>$add['emp_crela'],
          'emp_cplace'=>$add['emp_cplace'],
          'emp_ctele'=>$add['emp_ctele'],
          'emp_code'=>$add['emp_code'],
          );
          $this->db->where('emp_member',$id);
          $this->db->update('emp_contact_tb',$data_add);

        redirect('userprofile/edit_profile/'.$id);
      }

  public function add_profile()
  {
    $ccode = $this->input->post('ccode');
    $add = $this->input->post();
      $datataba = array(
        'emp_code' => $ccode,
        'emp_title' => $this->input->post("emp_title"),
        'emp_name_t'=>$this->input->post("emp_name_t"),
        'emp_nickname'=>$this->input->post("emp_nickname"),
        'emp_title_e'=>$this->input->post("emp_title_e"),
        'emp_name_e'=>$this->input->post("emp_name_e"),
        'emp_idcityzen'=>$this->input->post("emp_idcityzen"),
        'emp_tele'=>$this->input->post("emp_tele"),
        'emp_email'=>$this->input->post("emp_email"),
        'emp_bdate'=>$this->input->post("emp_birthdate"),
        'emp_h'=>$this->input->post("emp_height"),
        'emp_w'=>$this->input->post("emp_weight"),
        'emp_status'=>$this->input->post("emp_status"),
        'emp_child'=>$this->input->post("emp_child"),
        'emp_race'=>$this->input->post("emp_race"),
        'emp_nation'=>$this->input->post("emp_nation"),
        'emp_religion'=>$this->input->post("emp_religion"),
        'emp_brosis'=>$this->input->post("emp_brosis"),
        'emp_cno'=>$this->input->post("emp_cno"),
        'emp_sex'=>$this->input->post("sex"),
        );
      $this->db->insert('emp_profile_tb',$datataba);
      $datatabb = array(
        'emp_code' => $ccode,
        'emp_address_now' =>$this->input->post("emp_address_now"),
        'emp_address_book'=>$this->input->post("emp_address_book"),
        'emp_cflname'=>$this->input->post("emp_cflname"),
        'emp_cjob'=>$this->input->post("emp_cjob"),
        'emp_crela'=>$this->input->post("emp_crela"),
        'emp_cplace'=>$this->input->post("emp_cplace"),
        'emp_ctele'=>$this->input->post("emp_ctele"),

        );
      $this->db->insert('emp_contact_tb',$datatabb);


      for ($i=0; $i < count($add['groedu_name']); $i++) {

            $data_d = array(
             'emp_code'=>$ccode,
             'edu_level' => $add['groedu_name'][$i],
              'edu_name' => $add['edu_name'][$i],
              'edu_major' => $add['edu_major'][$i],
              'edu_yend' => $add['edu_year'][$i],
          );
              $this->db->insert('emp_edu_tb',$data_d);
      }

      for($i=0; $i <count($add['job_name']); $i++){
           $data_j=array(
          'emp_code'=>$ccode,
          'job_name'=>$add['job_name'][$i],
          'job_address'=>$add['job_address'][$i],
          'job_position'=>$add['job_position'][$i],
          'job_start'=>$add['job_start'][$i],
          'job_end'=>$add['job_end'][$i],
          );
           $this->db->insert('emp_job_tb',$data_j);
           }



      for($i=0; $i < count($add['skill_start_month']); $i++){
            $data_t=array(
              'emp_code'=>$ccode,
              'skill_start_month'=>$add['skill_start_month'][$i],
              'skill_start_years'=>$add['skill_start_years'][$i],
              'skill_end_month'=>$add['skill_end_month'][$i],
              'skill_end_years'=>$add['skill_end_years'][$i],
              'skill_code'=>$add['train_name'][$i],
              'skill_tpos'=>$add['skill_tpos'][$i],
              );

      $this->db->insert('emp_train_tb',$data_t);
    }

        $datatab_4=array(
            'emp_code'=>$ccode,
            'skill_lang'=>$this->input->post("skill_lang"),
            'skill_speak'=>$this->input->post("skill_speak"),
            'skill_read'=>$this->input->post("skill_read"),
            'skill_write'=>$this->input->post("skill_write"),
            'e_toelf'=>$this->input->post("e_toelf"),
            'e_toeic'=>$this->input->post("e_toeic"),
            'e_ielts'=>$this->input->post("e_ielts"),
            'e_tuget'=>$this->input->post("e_tuget"),
            'e_cutep'=>$this->input->post("e_cutep"),
          );
$this->db->insert('emp_skill_tb',$datatab_4);


    $datatab42=array(
      'emp_code'=>$ccode,
      's_vehicle_car'=>$this->input->post("chkhcar"),
      's_vehicle_motor'=>$this->input->post("chkhmotor"),
      's_vehicle_truck'=>$this->input->post("chkhtruck"),
      's_cab'=>$this->input->post("chkcab"),
      's_folk'=>$this->input->post("chkfolk"),
      's_truck'=>$this->input->post("chktruck"),
      's_motor'=>$this->input->post("chkmotor"),
      's_car'=>$this->input->post("chkcar"),
      's_skill1'=>$this->input->post("skill1"),
      's_skill2'=>$this->input->post("skill2"),
      's_skill3'=>$this->input->post("skill3"),
      's_skill4'=>$this->input->post("skill4"),
      's_skill5'=>$this->input->post("skill5"),
      'lccar'=>$this->input->post("lccar"),
      'lcmotor'=>$this->input->post("lcmotor"),
      'lctruck'=>$this->input->post("lctruck"),
      );
$this->db->insert('emp_otherskill_tb',$datatab42);

  $databehave=array(
    'emp_code'=>$ccode,
    'emp_province'=>$this->input->post("rdbgo"),
    'emp_travel'=>$this->input->post("rdbgonation"),
    'emp_law'=>$this->input->post("rdblaw"),
    'emp_drink'=>$this->input->post("rdbdrink"),
    'emp_smoke'=>$this->input->post("rdbsmoke"),


    );
  $this->db->insert('emp_behave_tb',$databehave);


$datacompany = array(
'emp_code'=>$ccode,
'emp_position'=>$this->input->post("emp_position"),
'emp_department'=>$this->input->post("emp_department"),
'emp_project'=>$this->input->post("emp_project"),
'emp_bank'=>$this->input->post("emp_bank"),
'emp_backmajor'=>$this->input->post("emp_backmajor"),
'emp_insuid'=>$this->input->post("emp_insuid"),
'emp_insuhos'=>$this->input->post("emp_hos"),
'emp_lead'=>$this->input->post("emp_lead"),
'emp_stat'=>$this->input->post("emp_stat"),
'emp_bookbank'=>$this->input->post("emp_bookbank"),
'emp_start'=>$this->input->post("job_datestart"),
  );
$this->db->insert('emp_company_tb',$datacompany);
redirect('userprofile/gethr');
  }


public function InsertLeave() {
    $add = $this->input->post();
  $data = array
  (
  'from_day' => $add['dayfrom'],
  'from_month' => $add['monthfrom'],
  'from_year' => $add['yearfrom'],
  'to_day' => $add['dayto'],
  'to_month' => $add['monthto'],
  'to_year' => $add['yearto'],
  'nowtime' => $add['daynow'],
  'status'=>$add['status'],
  'leave_note'=>$add['rqtdes'],
  'leave_type'=>$add['rdbleave'],
  'emp_id'=>$add['empid'],
  'emp_lead'=>$add['emp_lead'],
 );
 $this->db->insert('emp_leave',$data);

 $id =  $add['id'];

 $dataup = array(
   'rqt_holiday' =>$add['upholiday'] ,
   'rqt_paid' =>$add['upsick'],
   'rqt_dayoff'=>$add['upkit'],
   'rqt_other'=>$add['upother'],
 );
 $this->db->where('emp_id',$id);
 $this->db->update('emp_leave_rule',$dataup);
 redirect('userprofile/rqtrule');
}

public function updateleave()
{
  $add = $this->input->post();
  $chkok=$add['btnok'];

if ($chkok=='1') {
  $da = array('status' =>'1', );
   $lvid=$add['idl'];
   $this->db->where('leave_id',$lvid);
   $this->db->update('emp_leave',$da);

}
elseif ($chkok=='2') {
        $da = array('status' =>'2', );
         $lvid=$add['idl'];
         $this->db->where('leave_id',$lvid);
         $this->db->update('emp_leave',$da);
         $lt=$add['leave_type'];
          //  print "<script>alert($lt);</script>";

         switch ($lt) {
          case '1':
            $id=$add['idrule'];
            $da = array('rqt_paid' =>$add['ans'],);
            $this->db->where('emp_id',$id);
            $this->db->update('emp_leave_rule',$da);

            break;

            case '3':

              $id=$add['idrule'];
              $da = array('rqt_holiday' =>$add['ans'] , );
              // echo $id;
              // echo $add['ans'];
               $this->db->where('emp_id',$id);
               $this->db->update('emp_leave_rule',$da);

              break;
              case '2':
                $id=$add['idrule'];
                $da = array(
                'rqt_dayoff' =>$add['ans'] ,   );
                $this->db->where('emp_id',$id);
                $this->db->update('emp_leave_rule',$da);
                break;
                case '4':
                  $id=$add['idrule'];
                  $da = array('rqt_other' =>$add['ans'] , );
                  $this->db->where('emp_id',$id);
                  $this->db->update('emp_leave_rule',$da);

                  break;
   }
}
   redirect('userprofile/rqtrule');
//  echo $lt ;
}

public function remove(){
$id = $this->uri->segment(3);
$this->db->where('leave_id',$id);
$this->db->delete('emp_leave');
redirect('userprofile/rqtrule');
}

  public function update_edu(){
    $id = $this->uri->segment(3);
    $add = $this->input->post();
    for ($i=0; $i < count($add['chki']); $i++) {
      if ($add['chki'][$i]=="Y") {
      $data_d = array(
        'emp_member'=>$id,
        'edu_level' => $add['edu_level'][$i],
        'edu_name' => $add['edu_name'][$i],
        'edu_major' => $add['edu_major'][$i],
        'edu_yend' => $add['edu_yend'][$i]
      );
      $this->db->where('emp_member',$id);
      $this->db->where('edu_id',$add['edu_id'][$i]);
      $this->db->update('emp_edu_tb',$data_d);
      }
    else if ($add['chki'][$i]=="i") {
      $data_dd = array(
        'emp_member'=>$id,
        'edu_level' => $add['edu_level'][$i],
        'edu_name' => $add['edu_name'][$i],
        'edu_major' => $add['edu_major'][$i],
        'edu_yend' => $add['edu_yend'][$i]
      );
      $this->db->insert('emp_edu_tb',$data_dd);
    }
    }
      redirect('userprofile/edit_empp/'.$id);
    }

    public function proupdate_edu(){
    $id = $this->uri->segment(3);
    $add = $this->input->post();
    for ($i=0; $i < count($add['chki']); $i++) {
      if ($add['chki'][$i]=="Y") {
      $data_d = array(
        'emp_member'=>$id,
        'edu_level' => $add['edu_level'][$i],
        'edu_name' => $add['edu_name'][$i],
        'edu_major' => $add['edu_major'][$i],
        'edu_yend' => $add['edu_yend'][$i]
      );
      $this->db->where('emp_member',$id);
      $this->db->where('edu_id',$add['edu_id'][$i]);
      $this->db->update('emp_edu_tb',$data_d);
      }
    else if ($add['chki'][$i]=="i") {
      $data_dd = array(
        'emp_member'=>$id,
        'edu_level' => $add['edu_level'][$i],
        'edu_name' => $add['edu_name'][$i],
        'edu_major' => $add['edu_major'][$i],
        'edu_yend' => $add['edu_yend'][$i]
      );
      $this->db->insert('emp_edu_tb',$data_dd);
    }
    }
      redirect('userprofile/edit_profile/'.$id);
    }

    public function update_job(){
    $id = $this->uri->segment(3);
    $add = $this->input->post();
    for ($i=0; $i < count($add['chki']); $i++) {
      if ($add['chki'][$i]=="Y") {
      $data_d = array(
        'emp_member'=>$id,
        'job_name' => $add['job_name'][$i],
        'job_address' => $add['job_address'][$i],
        'job_position' => $add['job_position'][$i],
        'job_start' => $add['job_start'][$i],
        'job_end' => $add['job_end'][$i]
      );
      $this->db->where('emp_member',$id);
      $this->db->where('job_id',$add['job_id'][$i]);
      $this->db->update('emp_job_tb',$data_d);
      }
    else if ($add['chki'][$i]=="i") {
      $data_dd = array(
        'emp_member'=>$id,
        'job_name' => $add['job_name'][$i],
        'job_address' => $add['job_address'][$i],
        'job_position' => $add['job_position'][$i],
        'job_start' => $add['job_start'][$i],
        'job_end' => $add['job_end'][$i]
      );
      $this->db->insert('emp_job_tb',$data_dd);
    }
    }
      redirect('userprofile/edit_empp/'.$id);
    }

    public function update_train(){
    $id = $this->uri->segment(3);
    $add = $this->input->post();
    for ($i=0; $i < count($add['chki']); $i++) {
      if ($add['chki'][$i]=="Y") {
      $data_d = array(
        'emp_member'=>$id,
        'skill_start_month' => $add['skill_start_month'][$i],
        'skill_start_years' => $add['skill_start_years'][$i],
        'skill_end_month' => $add['skill_end_month'][$i],
        'skill_end_years' => $add['skill_end_years'][$i],
        'skill_code' => $add['skill_code'][$i],
        'skill_tpos' => $add['skill_tpos'][$i]
      );
      $this->db->where('emp_member',$id);
      $this->db->where('train_id',$add['train_id'][$i]);
      $this->db->update('emp_train_tb',$data_d);
      }
    else if ($add['chki'][$i]=="i") {
      $data_dd = array(
        'emp_member'=>$id,
        'skill_start_month' => $add['skill_start_month'][$i],
        'skill_start_years' => $add['skill_start_years'][$i],
        'skill_end_month' => $add['skill_end_month'][$i],
        'skill_end_years' => $add['skill_end_years'][$i],
        'skill_code' => $add['skill_code'][$i],
        'skill_tpos' => $add['skill_tpos'][$i]
      );
      $this->db->insert('emp_train_tb',$data_dd);
    }
    }
      redirect('userprofile/edit_empp/'.$id);
    }

    public function proupdate_job(){
    $id = $this->uri->segment(3);
    $add = $this->input->post();
    for ($i=0; $i < count($add['chki']); $i++) {
      if ($add['chki'][$i]=="Y") {
      $data_d = array(
        'emp_member'=>$id,
        'job_name' => $add['job_name'][$i],
        'job_address' => $add['job_address'][$i],
        'job_position' => $add['job_position'][$i],
        'job_start' => $add['job_start'][$i],
        'job_end' => $add['job_end'][$i]
      );
      $this->db->where('emp_member',$id);
      $this->db->where('job_id',$add['job_id'][$i]);
      $this->db->update('emp_job_tb',$data_d);
      }
    else if ($add['chki'][$i]=="i") {
      $data_dd = array(
        'emp_member'=>$id,
        'job_name' => $add['job_name'][$i],
        'job_address' => $add['job_address'][$i],
        'job_position' => $add['job_position'][$i],
        'job_start' => $add['job_start'][$i],
        'job_end' => $add['job_end'][$i]
      );
      $this->db->insert('emp_job_tb',$data_dd);
    }
    }
      redirect('userprofile/edit_profile/'.$id);
    }

    public function proupdate_train(){
    $id = $this->uri->segment(3);
    $add = $this->input->post();
    for ($i=0; $i < count($add['chki']); $i++) {
      if ($add['chki'][$i]=="Y") {
      $data_d = array(
        'emp_member'=>$id,
        'skill_start_month' => $add['skill_start_month'][$i],
        'skill_start_years' => $add['skill_start_years'][$i],
        'skill_end_month' => $add['skill_end_month'][$i],
        'skill_end_years' => $add['skill_end_years'][$i],
        'skill_code' => $add['skill_code'][$i],
        'skill_tpos' => $add['skill_tpos'][$i]
      );
      $this->db->where('emp_member',$id);
      $this->db->where('train_id',$add['train_id'][$i]);
      $this->db->update('emp_train_tb',$data_d);
      }
    else if ($add['chki'][$i]=="i") {
      $data_dd = array(
        'emp_member'=>$id,
        'skill_start_month' => $add['skill_start_month'][$i],
        'skill_start_years' => $add['skill_start_years'][$i],
        'skill_end_month' => $add['skill_end_month'][$i],
        'skill_end_years' => $add['skill_end_years'][$i],
        'skill_code' => $add['skill_code'][$i],
        'skill_tpos' => $add['skill_tpos'][$i]
      );
      $this->db->insert('emp_train_tb',$data_dd);
    }
    }
      redirect('userprofile/edit_profile/'.$id);
    }

    public function leave_date() {
      $add = $this->input->post();
      $data = array(
        'emp_id'=> $add['m_id'],
        'emp_member'=> $add['emp_member'],
        'date_leave' => $add['date_leave'],
        'leave_dear' => $add['leave_dear'],
        'type_master' => $add['leave_master'],
        'leave_detail' => $add['leave_detail'],
        'start_date' => $add['start_date'],
        'end_date' => $add['end_date'],
        'leave_time' => $add['too'],
        'leave_work' => $add['leave_work'],
        'assign_leave' => $add['assign_leave'],
        'approve1' => $add['m_code'],
        'approve2' => $add['m_code2'],
        'status_approve' => 'W',
        'status_read' => 'N'
      );
      $this->db->insert('emp_leave',$data);
      redirect('userprofile/rqtrule');


      
    }

    public function save_approve(){
      $id = $this->uri->segment(3);
      $m_id = $this->uri->segment(4);
      $data =  array('status_approve' => 'Y','approve_leave' => $m_id );
      $this->db->where('leave_id',$id);
      $this->db->update('emp_leave',$data);
      redirect('userprofile/leaveapprove');
    } 

    public function save_noapprove(){
      $id = $this->uri->segment(3);
      $m_id = $this->uri->segment(4);
      $data =  array('status_approve' => 'N','approve_leave' => $m_id);
      $this->db->where('leave_id',$id);
      $this->db->update('emp_leave',$data);
      redirect('userprofile/leaveapprove');
    }

    public function upd_leave(){
      $id = $this->uri->segment(3);
     $add = $this->input->post();
      $data = array(
        'leave_dear' => $add['leave_dear'],
        'leave_detail' => $add['leave_detail'],
        'start_date' => $add['start_date'],
        'end_date' => $add['end_date'],
        'leave_time' => $add['too'],
        'leave_work' => $add['leave_work'],
        'assign_leave' => $add['assign_leave'],
        'approve_leave' => $add['m_code']
      );
      $this->db->where('leave_id',$id);
      $this->db->update('emp_leave',$data);
      redirect('userprofile/history');
    }

    public function del_leave(){
    $id = $this->uri->segment(3);
    $this->db->where('leave_id',$id);
    $this->db->delete('emp_leave');
    redirect('userprofile/history');
    }

    public function return_leave(){
      $id = $this->uri->segment(3);
      $data =  array('status_approve' => 'W');
      $this->db->where('leave_id',$id);
      $this->db->update('emp_leave',$data);
      redirect('userprofile/leaveapprove');
    } 
    public function leavedown(){
      $m_id = $this->uri->segment(3);
      $data =  array('status_read' => 'Y');
      $this->db->where('emp_id',$m_id);
      $this->db->update('emp_leave',$data);
      $base_url = $this->config->item("url_report");
      redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=leave_report_v.mrt&memid=".$m_id);
    }
  }
