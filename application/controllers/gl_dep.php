<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gl_dep extends CI_Controller {
        public function __construct() {
            parent::__construct();
            // $this->load->model('gl_m');

        }
    public function InsertDep(){
      $add = $this->input->post();
      $data = array(
        'dep_code' =>$add['dep_code'] ,
        'dep_name' =>$add['dep_name'],
        'dep_type' =>$add['dep_type'],
     );
     $this->db->insert('gl_department',$data);

     redirect('gl/Create_Department');

    }
    public function updet(){
      $add = $this->input->post();
      $id_dep = $this->uri->segment(3);
      $upreg = array(
      'dep_code' =>$add['e_code'] ,
      'dep_name' =>$add['e_name'],
      'dep_type' =>$add['e_type'],
      );
      $this->load->model('gl_m');
      $this->gl_m->editshow($id_dep,$upreg);
      redirect('gl/Create_Department');

            }

      public function delete(){
      $id_dep = $this->uri->segment(3);
      $this->db->delete('gl_department',array('id_dep'=> $id_dep));
      redirect('gl/Create_Department');


      }

      public function InsertBookACC(){
        $add = $this->input->post();
        $data = array(
          'bookcode' =>$add['e_code'] ,
          'booknamz'=>$add['e_name'],
          'gl_type' =>$add['e_type'],
       );
       $this->db->insert('gl_book',$data);

       redirect('gl/BookAccountDATA');

      }

      public function EditBookACC(){
        $code = $this->uri->segment(3);
        $add = $this->input->post();
        $data = array(
          'bookcode' =>$add['e_code'] ,
          'booknamz'=>$add['e_name'],
          'gl_type' =>$add['e_type'],
       );
       $this->db->where('bookcode',$code);
       $this->db->update('gl_book',$data);
       redirect('gl/BookAccountDATA');
      //  $this->db->insert('ac_bookac',$data);



      }
}
