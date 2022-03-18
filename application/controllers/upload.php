<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class upload extends CI_Controller {

	public function __construct() {
		date_default_timezone_set('Asia/Bangkok');
		parent::__construct();
		$this->load->helper(array('form', 'url', 'file'));
		$this->load->library('image_lib');
		$this->load->helper('date');
	}

	public function uploadprofile() {
		$session_data = $this->session->userdata('sessed_in');
		$user = $session_data['username'];
		$config['upload_path'] = './profile/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '20480';
		$config['max_width'] = '9999';
		$config['max_height'] = '9999';
		$rand = rand(1111, 9999);
		$date = date("Y-m-d ");
		$config['file_name'] = $date . $rand;
		$this->load->library('upload', $config);

		// Change $_FILES to new vars and loop them

		// Put each errors and upload data to an array
		$error = array();
		$success = array();

		// main action to upload each file
		foreach ($_FILES as $field_name => $file) {
			if (!$this->upload->do_upload($field_name)) {
				// if upload fail, grab error
				$error['upload'][] = $this->upload->display_errors();
			} else {
				// otherwise, put the upload datas here.
				// if you want to use database, put insert query in this loop
				$upload_data = $this->upload->data();

				// set the resize config
				$resize_conf = array(
					// it's something like "/full/path/to/the/image.jpg" maybe
					'source_image' => $upload_data['full_path'],
					// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
					// or you can use 'create_thumbs' => true option instead
					'new_image' => $upload_data['file_path'] . 'thumb_' . $upload_data['file_name'],
					'width' => 600,
					'height' => 400,
				);

				// initializing
				$this->image_lib->initialize($resize_conf);

				// do it!
				if (!$this->image_lib->resize()) {
					// if got fail.
					$error['resize'][] = $this->image_lib->display_errors();
				} else {
					// otherwise, put each upload data to an array.
					$data['success'] = $upload_data;
					$this->db->select('*');
					$this->db->where('m_user', $user);
					$qe = $this->db->get('member');
					$re = $qe->result();
					foreach ($re as $ke) {
						$uim = $ke->uimg;
					}
					unlink($upload_data['file_path'] . $uim);
					$add = array(
						'uimg' => 'thumb_' . $upload_data['file_name'],
					);
					$this->db->where('m_user', $user);
					$q = $this->db->update('member', $add);
					unlink($upload_data['file_path'] . $upload_data['file_name']);

					if ($q) {
						redirect('index.php/panel/office');
						break;
					} else {
						echo $error = array('error' => $this->upload->display_errors());

					}
				}
			}
		}
	}
	public function uploadcomp() {
		$session_data = $this->session->userdata('sessed_in');
		$user = $session_data['username'];
		$compcode = $session_data['compcode'];
		$comp_code = $this->input->post('imgcompcode');
		$config['upload_path'] = './comp/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '20480';
		$config['max_width'] = '9999';
		$config['max_height'] = '9999';
		$rand = rand(1111, 9999);
		$date = date("Y-m-d ");
		$config['file_name'] = $date . $rand;
		$this->load->library('upload', $config);

		// Change $_FILES to new vars and loop them

		// Put each errors and upload data to an array
		$error = array();
		$success = array();

		// main action to upload each file
		foreach ($_FILES as $field_name => $file) {
			if (!$this->upload->do_upload($field_name)) {
				// if upload fail, grab error
				$error['upload'][] = $this->upload->display_errors();
			} else {
				// otherwise, put the upload datas here.
				// if you want to use database, put insert query in this loop
				$upload_data = $this->upload->data();

				// set the resize config
				$resize_conf = array(
					// it's something like "/full/path/to/the/image.jpg" maybe
					'source_image' => $upload_data['full_path'],
					// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
					// or you can use 'create_thumbs' => true option instead
					'new_image' => $upload_data['file_path'] . 'comp_' . $upload_data['file_name'],
					'width' => 600,
					'height' => 400,
				);

				// initializing
				$this->image_lib->initialize($resize_conf);

				// do it!
				if (!$this->image_lib->resize()) {
					// if got fail.
					$error['resize'][] = $this->image_lib->display_errors();
				} else {
					// otherwise, put each upload data to an array.
					$data['success'] = $upload_data;
					$this->db->select('*');
					$qe = $this->db->get('company');
					$re = $qe->result();
					foreach ($re as $ke) {
						$uim = $ke->comp_img;
					}
					unlink($upload_data['file_path'] . $uim);
					$add = array(
						'comp_img' => 'comp_' . $upload_data['file_name'],
					);
					$this->db->where('compcode', $this->input->post('imgcompcode'));
					$q = $this->db->update('company', $add);
					unlink($upload_data['file_path'] . $upload_data['file_name']);

					if ($q) {
						redirect('datastore/editcompany/'.$comp_code);
						break;
					} else {
						$error = array('error' => $this->upload->display_errors());

					}
				}
			}
		}
	}

	public function projectprofile() {
		$session_data = $this->session->userdata('sessed_in');
		$procode = $this->uri->segment(3);
		$user = $session_data['username'];
		$config['upload_path'] = './project/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '20480';
		$config['max_width'] = '9999';
		$config['max_height'] = '9999';
		$rand = rand(1111, 9999);
		$date = date("Y-m-d ");
		$config['file_name'] = $date . $rand;
		$this->load->library('upload', $config);

		// Change $_FILES to new vars and loop them

		// Put each errors and upload data to an array
		$error = array();
		$success = array();

		// main action to upload each file
		foreach ($_FILES as $field_name => $file) {
			if (!$this->upload->do_upload($field_name)) {
				// if upload fail, grab error
				$error['upload'][] = $this->upload->display_errors();
			} else {
				// otherwise, put the upload datas here.
				// if you want to use database, put insert query in this loop
				$upload_data = $this->upload->data();

				// set the resize config
				$resize_conf = array(
					// it's something like "/full/path/to/the/image.jpg" maybe
					'source_image' => $upload_data['full_path'],
					// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
					// or you can use 'create_thumbs' => true option instead
					'new_image' => $upload_data['file_path'] . 'proj_' . $upload_data['file_name'],
					'width' => 600,
					'height' => 400,
				);

				// initializing
				$this->image_lib->initialize($resize_conf);

				// do it!
				if (!$this->image_lib->resize()) {
					// if got fail.
					$error['resize'][] = $this->image_lib->display_errors();
				} else {
					// otherwise, put each upload data to an array.
					$data['success'] = $upload_data;
					$this->db->select('*');
					$this->db->where('project_code', $procode);
					$qe = $this->db->get('project');
					$re = $qe->result();
					foreach ($re as $ke) {
						$uim = $ke->project_img;
					}
					unlink($upload_data['file_path'] . $uim);
					$add = array(
						'project_img' => 'proj_' . $upload_data['file_name'],
					);
					$this->db->where('project_code', $procode);
					$q = $this->db->update('project', $add);
					// unlink($upload_data['file_path'].$upload_data['file_name']);

					if ($q) {
						redirect('data_master/setup_project_main');
						break;
					} else {
						$error = array('error' => $this->upload->display_errors());

					}
				}
			}
		}
	}
	
	public function addcompany() {
		$session_data = $this->session->userdata('sessed_in');
		$user = $session_data["username"];
		//var_dump($session_data);
		
		if ($_FILES["userfile"]["name"] == "") {
			//echo "no file";

			$add = array(
				'compcode' => $this->input->post('maincode'),
				'company_taxnum' => $this->input->post('taxno'),
				'company_taxnumen' => $this->input->post('taxnoen'),
				'company_nameth' => $this->input->post('name'),
				'comp_img' => 'comp_' . $upload_data['file_name'],
				'company_tel' => $this->input->post('tel'),
				'wt_tax' => $this->input->post('company_wt'),
				'company_fax' => $this->input->post('fax'),
				'company_email' => $this->input->post('email'),
				'company_contact' => $this->input->post('contact'),
				'company_address' => $this->input->post('address'),
				'company_address2' => $this->input->post('address2'),
				'company_address3' => $this->input->post('address3'),

				'company_name' => $this->input->post('company_nameEN'),
				'company_telen' => $this->input->post('telen'),
				'company_faxen' => $this->input->post('faxen'),
				'company_emailen' => $this->input->post('emailen'),
				'company_contacten' => $this->input->post('contacten'),
				'company_add_en' => $this->input->post('address_en'),
				'company_add_en2' => $this->input->post('address_en2'),
				'company_add_en3' => $this->input->post('address_en3'),

				'useradd' => $user,
				'createdate' => date('Y-m-d H:i:s', now()),
			);

			$q = $this->db->insert('company', $add);
			if ($q) {
				$syscode = array(
					'sys_code' => $this->input->post('maincode'),
				);
				$this->db->insert('syscode',$syscode);
				redirect('index.php/datastore/company/' . $this->input->post('maincode'));
				//break;
			} else {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			}

		} else {
			$user = $session_data['username'];
			$config['upload_path'] = './comp/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '20480';
			$config['max_width'] = '9999';
			$config['max_height'] = '9999';
			$rand = rand(1111, 9999);
			$date = date("Y-m-d ");
			$config['file_name'] = $date . $rand;
			$this->load->library('upload', $config);

			// Change $_FILES to new vars and loop them

			// Put each errors and upload data to an array
			$error = array();
			$success = array();

			// main action to upload each file
			foreach ($_FILES as $field_name => $file) {
				if (!$this->upload->do_upload($field_name)) {
					// if upload fail, grab error
					$error['upload'][] = $this->upload->display_errors();
					echo $this->upload->display_errors();
					//var_dump($error);
				} else {
					// otherwise, put the upload datas here.
					// if you want to use database, put insert query in this loop
					$upload_data = $this->upload->data();

					// set the resize config
					$resize_conf = array(
						// it's something like "/full/path/to/the/image.jpg" maybe
						'source_image' => $upload_data['full_path'],
						// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
						// or you can use 'create_thumbs' => true option instead
						'new_image' => $upload_data['file_path'] . 'comp_' . $upload_data['file_name'],
						'width' => 600,
						'height' => 400,
					);

					// initializing
					$this->image_lib->initialize($resize_conf);

					// do it!
					if (!$this->image_lib->resize()) {
						// if got fail.
						$error['resize'][] = $this->image_lib->display_errors();
					} else {
						// otherwise, put each upload data to an array.
						$data['success'] = $upload_data;
						$this->db->select('*');
						$qe = $this->db->get('company');
						$re = $qe->result();
						foreach ($re as $ke) {
							$uim = $ke->comp_img;
						}
						// unlink($upload_data['file_path'].$uim);
						$add = array(
							'compcode' => $this->input->post('maincode'),
							'company_nameth' => $this->input->post('name'),
							'company_taxnum' => $this->input->post('taxno'),
							'comp_img' => 'comp_' . $upload_data['file_name'],
							'company_address' => $this->input->post('address'),
							'company_add_en' => $this->input->post('address_en'),
							'company_name' => $this->input->post('company_nameEN'),
							'company_tel' => $this->input->post('tel'),
							'company_fax' => $this->input->post('fax'),
							'company_email' => $this->input->post('email'),
							'company_contact' => $this->input->post('contact'),
							'useradd' => $user,
							'createdate' => date('Y-m-d H:i:s', now()),
						);
						$q = $this->db->insert('company', $add);
						
						// unlink($upload_data['file_path'].$upload_data['file_name']);

						if ($q) {
							$syscode = array(
								'sys_code' => $this->input->post('maincode'),
							);
							$this->db->insert('syscode',$syscode);
							redirect('index.php/datastore/company/' . $this->input->post('maincode'));
							//break;
						} else {
							$error = array('error' => $this->upload->display_errors());
							var_dump($error);
						}
					}
				}
			}
		}
	}
	public function addnewcompany() {
		$session_data = $this->session->userdata('sessed_in');
		$user = $session_data["username"];
		//var_dump($session_data);
		
		if ($_FILES["userfile"]["name"] == "") {
			//echo "no file";

			$add = array(
				'compcode' => $this->input->post('maincode'),
				'company_taxnum' => $this->input->post('taxno'),
				'company_taxnumen' => $this->input->post('taxnoen'),
				'company_nameth' => $this->input->post('name'),
				'comp_img' => 'comp_' . $upload_data['file_name'],
				'company_tel' => $this->input->post('tel'),
				'wt_tax' => $this->input->post('company_wt'),
				'company_fax' => $this->input->post('fax'),
				'company_email' => $this->input->post('email'),
				'company_contact' => $this->input->post('contact'),
				'company_address' => $this->input->post('address'),
				'company_address2' => $this->input->post('address2'),
				'company_address3' => $this->input->post('address3'),

				'company_name' => $this->input->post('company_nameEN'),
				'company_telen' => $this->input->post('telen'),
				'company_faxen' => $this->input->post('faxen'),
				'company_emailen' => $this->input->post('emailen'),
				'company_contacten' => $this->input->post('contacten'),
				'company_add_en' => $this->input->post('address_en'),
				'company_add_en2' => $this->input->post('address_en2'),
				'company_add_en3' => $this->input->post('address_en3'),

				'useradd' => $user,
				'createdate' => date('Y-m-d H:i:s', now()),
			);

			$q = $this->db->insert('company', $add);
			if ($q) {
				$syscode = array(
					'sys_code' => $this->input->post('maincode'),
				);
				$this->db->insert('syscode',$syscode);
				redirect('index.php/datastore/setcompany/' . $this->input->post('maincode'));
				//break;
			} else {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			}

		} else {
			$user = $session_data['username'];
			$config['upload_path'] = './comp/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '20480';
			$config['max_width'] = '9999';
			$config['max_height'] = '9999';
			$rand = rand(1111, 9999);
			$date = date("Y-m-d ");
			$config['file_name'] = $date . $rand;
			$this->load->library('upload', $config);

			// Change $_FILES to new vars and loop them

			// Put each errors and upload data to an array
			$error = array();
			$success = array();

			// main action to upload each file
			foreach ($_FILES as $field_name => $file) {
				if (!$this->upload->do_upload($field_name)) {
					// if upload fail, grab error
					$error['upload'][] = $this->upload->display_errors();
					echo $this->upload->display_errors();
					//var_dump($error);
				} else {
					// otherwise, put the upload datas here.
					// if you want to use database, put insert query in this loop
					$upload_data = $this->upload->data();

					// set the resize config
					$resize_conf = array(
						// it's something like "/full/path/to/the/image.jpg" maybe
						'source_image' => $upload_data['full_path'],
						// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
						// or you can use 'create_thumbs' => true option instead
						'new_image' => $upload_data['file_path'] . 'comp_' . $upload_data['file_name'],
						'width' => 600,
						'height' => 400,
					);

					// initializing
					$this->image_lib->initialize($resize_conf);

					// do it!
					if (!$this->image_lib->resize()) {
						// if got fail.
						$error['resize'][] = $this->image_lib->display_errors();
					} else {
						// otherwise, put each upload data to an array.
						$data['success'] = $upload_data;
						$this->db->select('*');
						$qe = $this->db->get('company');
						$re = $qe->result();
						foreach ($re as $ke) {
							$uim = $ke->comp_img;
						}
						// unlink($upload_data['file_path'].$uim);
						$add = array(
							'compcode' => $this->input->post('maincode'),
							'company_nameth' => $this->input->post('name'),
							'company_taxnum' => $this->input->post('taxno'),
							'comp_img' => 'comp_' . $upload_data['file_name'],
							'company_address' => $this->input->post('address'),
							'company_add_en' => $this->input->post('address_en'),
							'company_name' => $this->input->post('company_nameEN'),
							'company_tel' => $this->input->post('tel'),
							'company_fax' => $this->input->post('fax'),
							'company_email' => $this->input->post('email'),
							'company_contact' => $this->input->post('contact'),
							'useradd' => $user,
							'createdate' => date('Y-m-d H:i:s', now()),
						);
						$q = $this->db->insert('company', $add);
						
						// unlink($upload_data['file_path'].$upload_data['file_name']);

						if ($q) {
							$syscode = array(
								'sys_code' => $this->input->post('maincode'),
							);
							$this->db->insert('syscode',$syscode);
							redirect('index.php/datastore/company/' . $this->input->post('maincode'));
							//break;
						} else {
							$error = array('error' => $this->upload->display_errors());
							var_dump($error);
						}
					}
				}
			}
		}
	}
	
	public function summernote()
	{
		$image = nettoie($_FILES['image']['name']);
		$uploaddir = 'photos/';
		      // that's the directory in the document_root where I put pics
		$uploadfile = $uploaddir . basename($image);
		if( move_uploaded_file($_FILES['image']['tmp_name'],$uploadfile)) {
		    echo$uploadfile;
		} else {
		    echo "Lo kol kakh tov..."; // <= nobody is perfect :)
		}
	}
	public function backgroundupload(){
		
		$session_data = $this->session->userdata('sessed_in');
		$user = $session_data['username'];
		$config['upload_path'] = './profile/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '20480';
		$config['max_width'] = '9999';
		$config['max_height'] = '9999';
		$rand = rand(1111, 9999);
		$date = date("Y-m-d ");
		$config['file_name'] = $date . $rand;
		$this->load->library('upload', $config);

		// Change $_FILES to new vars and loop them

		// Put each errors and upload data to an array
		$error = array();
		$success = array();

		// main action to upload each file
		foreach ($_FILES as $field_name => $file) {
			if (!$this->upload->do_upload($field_name)) {
				// if upload fail, grab error
				$error['upload'][] = $this->upload->display_errors();
			} else {
				// otherwise, put the upload datas here.
				// if you want to use database, put insert query in this loop
				$upload_data = $this->upload->data();

				// set the resize config
				$resize_conf = array(
					// it's something like "/full/path/to/the/image.jpg" maybe
					'source_image' => $upload_data['full_path'],
					// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
					// or you can use 'create_thumbs' => true option instead
					'new_image' => $upload_data['file_path'] . 'thumb_' . $upload_data['file_name'],
					// 'width' => 600,
					// 'height' => 400,
				);

				// initializing
				$this->image_lib->initialize($resize_conf);

				// do it!
				if (!$this->image_lib->resize()) {
					// if got fail.
					$error['resize'][] = $this->image_lib->display_errors();
				} else {
					// otherwise, put each upload data to an array.
					$data['success'] = $upload_data;
				
					$add = array(
						'background_login' => 'thumb_' . $upload_data['file_name'],
					);
					$q = $this->db->update('setup_default', $add);
					unlink($upload_data['file_path'] . $upload_data['file_name']);
					// echo 'thumb_' . $upload_data['file_name'];
					// return true;
					redirect('data_structure/forprogrammer');
				}
			}
		}
	}
}