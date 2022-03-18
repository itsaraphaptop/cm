<?php

        class testtb extends CI_Controller {

               public function __construct()
               {
                parent::__construct();
                    //$this->load->library('database');
                    $this->load->helper(array('url'));
                     //   $this->load->model('test_model');
              }
             public function index()
              {
                //echo "hello";die;
                $this->db->select('emp_job_tb.*');
                $this->db->from('emp_job_tb');
                $q = $this->db->get();
              //  return $query->result();
                $datata['res'] = $q->result();
                $this->load->view('userprofile/emp_list_v',$datata);


              }
            public function deleteDomain($job_id)
              {
                //echo $job_id;die;
                $this->db->where('job_id',$job_id);
                $this->db->delete('emp_job_tb');
                die;

              }
            public function updateDomain($job_id)
            {
                    $data = array(
                    'job_name'=>$this->input->post('job_name'),
                    'job_address'=>$this->input->post('job_address'),
                    'job_position'=>$this->input->post('job_position'),
                    'job_years'=>$this->input->post('job_years'),
                    // 'price'=>$this->input->post('price'),
                    );
                    //echo "<pre>";
                    //print_r($data);die;
                    $this->db->where('job_id',$job_id);
                    $this->db->update('emp_job_tb',$data);

                    $this->db->select('*');
                    $this->db->where('job_id',$job_id);
                    $this->db->from('emp_job_tb');
                    $query = $this->db->get();
                    $result = $query->result();
                    //print_r($result );
                    //echo $result[0]->id;die;
                    echo $html = "<tr id='domain".$job_id."'>
                    <td style='width:360px'>".$result[0]->job_name."</td>
                    <td style='width:360px'>".$result[0]->job_address."</td>
                    <td style='width:360px'>".$result[0]->job_position."</td>
                    <td style='width:360px'>".$result[0]->job_years."</td>
                    <td style='width:360px'>
                    <a href='javascript:void(0)' title='Edit' onclick='editDomain(".$job_id.")' class='label label-success'>Edit</a>
                    <a href='javascript:void(0)' onclick='deleteDomain(".$job_id.")'  title='Delete' class='label label-danger'>Delete</a>
                <a href='javascript:void(0) class='hide' id='".$job_id."'></a>
                </td>
                </tr>";
        }
    public function editDomain($job_id)
      {
            $this->db->select('*');
            $this->db->from('emp_job_tb');
            $this->db->where('job_id',$job_id);
            $query = $this->db->get();
            $result = $query->result();
            //print_r($result );die;
            echo $html = '
            <td colspan="10" class="updatedData'.$job_id.'">
            <form method="POST" role="form" id="myForm'.$result[0]->job_id.'">
            <input type="text" name="job_name" class="inp-form" value="'.$result[0]->job_name.'">
            <input type="text" name="job_address" class="inp-form" value="'.$result[0]->job_address.'">
            <input type="text" name="job_position" class="inp-form" value="'.$result[0]->job_position.'">
            <input type="text" name="job_years" class="inp-form" value="'.$result[0]->job_start.'">
            <input type="button" value="Update" onclick="updateDomain('.$result[0]->job_id.')" class="form-submit" />
            <a href=""   title="Cancel" >Cancel</a>
            <a href="javascript:void(0)" class="hide" id="hide'.$result[0]->job_id.'">Please wait...</a>
</form>
    </td>
                ';
        die;

      }
      public function insertDomain($job_id)
      {
        $add = $this->input->post();
        $ccode = $this->input->post('ccode');

             $data_j1=array(
            'emp_id'=>$add['emp_id'],
            'job_name'=>$add['job_no'],
            'job_address'=>$add['job_company'],
            'job_position'=>$add['job_position'],
            'job_years'=>$add['job_endy'],
            );

             $this->db->insert('emp_job_tb',$data_j1);


           }

           public function test_oo()
           {
                $queryi = $this->db->query("select sum(poi_receive) as receive from receive_poitem_return where reccode='R201703313'")->result();
              
                 
              foreach ($queryi as  $queryii) {
                $sumq = $queryii->receive;
              }
              if ($sumq=="0") {
                $dataj = array(
                  'return' => "Y"
                  );
                $this->db->where('po_reccode','R201703313');
                if ($this->db->update('receive_po',$dataj)) {
                    echo "update";
                }

              }else{
                echo "insert";
              }
           }
    }
