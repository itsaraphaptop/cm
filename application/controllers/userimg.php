<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class userimg extends CI_Controller {

    public function __construct() {
    	 date_default_timezone_set( 'Asia/Bangkok' );
        parent::__construct();
        $this->load->helper(array('form', 'url','file'));
        $this->load->library('image_lib');
    }

    public function uploadprofile()
    {
			$session_data = $this->session->userdata('sessed_in');
	        $user = $session_data['username'];
	        $config['upload_path'] = './profile/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '20480';
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
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['full_path'],
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
                    'width'         => 600,
                    'height'        => 400
                    );

                // initializing
                $this->image_lib->initialize($resize_conf);

                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $emp_id=$this->uri->segment(3);
                    $data['success'] = $upload_data;
                    $this->db->select('*');
                    $this->db->where('emp_id',$emp_id);
                    $qe = $this->db->get('emp_profile_tb');
                    $re = $qe->result();
                    foreach ($re as $ke) {
                    	$uim = $ke->emp_pic;
                    }
                    unlink($upload_data['file_path'].$uim);
                     $add = array(
								'emp_pic' =>'thumb_'.$upload_data['file_name']
								);
							$this->db->where('emp_member',$emp_id);
							$q = $this->db->update('emp_profile_tb',$add);
							unlink($upload_data['file_path'].$upload_data['file_name']);

					if ($q) {
		                redirect('userprofile/selemp');
		                break;
					}else
					{
					 echo $error = array('error' => $this->upload->display_errors());

					}
                }
            }
        }
    }
    public function uploadcomp()
    {
			$session_data = $this->session->userdata('sessed_in');
	        $user = $session_data['username'];
	        $config['upload_path'] = './comp/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '20480';
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
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['full_path'],
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $upload_data['file_path'].'comp_'.$upload_data['file_name'],
                    'width'         => 600,
                    'height'        => 400
                    );

                // initializing
                $this->image_lib->initialize($resize_conf);

                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $data['success'] = $upload_data;
                    $this->db->select('*');
                    $qe = $this->db->get('company');
                    $re = $qe->result();
                    foreach ($re as $ke) {
                    	$uim = $ke->comp_img;
                    }
                    unlink($upload_data['file_path'].$uim);
                     $add = array(
								'comp_img' =>'comp_'.$upload_data['file_name']
								);
							$q = $this->db->update('company',$add);
							unlink($upload_data['file_path'].$upload_data['file_name']);

					if ($q) {
		                redirect('index.php/datastore/company');
		                break;
					}else
					{
						$error = array('error' => $this->upload->display_errors());

					}
                }
            }
        }
    }

    public function projectprofile()
    {
      $session_data = $this->session->userdata('sessed_in');
      $procode = $this->uri->segment(3);
          $user = $session_data['username'];
          $config['upload_path'] = './project/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']	= '20480';
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
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['full_path'],
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $upload_data['file_path'].'proj_'.$upload_data['file_name'],
                    'width'         => 600,
                    'height'        => 400
                    );

                // initializing
                $this->image_lib->initialize($resize_conf);

                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $data['success'] = $upload_data;
                    $this->db->select('*');
                    $this->db->where('project_code',$procode);
                    $qe = $this->db->get('project');
                    $re = $qe->result();
                    foreach ($re as $ke) {
                      $uim = $ke->project_img;
                    }
                    unlink($upload_data['file_path'].$uim);
                     $add = array(
                'project_img' =>'proj_'.$upload_data['file_name']
                );
                $this->db->where('project_code',$procode);
              $q = $this->db->update('project',$add);
              // unlink($upload_data['file_path'].$upload_data['file_name']);

          if ($q) {
                    redirect('data_master/setup_project_main');
                    break;
          }else
          {
            $error = array('error' => $this->upload->display_errors());

          }
                }
            }
        }
    }

}
