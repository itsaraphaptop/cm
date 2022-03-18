<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class permission_m extends CI_Controller {
          public function __construct() {
            parent::__construct();
        }
         public function read()
        {
        	$this->db->select('*');
            $this->db->from('menu_right');
            $this->db->join('member','member.m_user = menu_right.m_user');
            $this->db->where('m_type','employee');
        	$query = $this->db->get();
        	$res = $query->result();
        	return $res;
        }
        public function module_permission($username)
        {
            $this->db->select('*');
            $this->db->where('ref_username',$username);
            $this->db->group_by('ref_module_id');
            $q = $this->db->get('member_permission')->result();
            return $q;
        }
        public function get_module_h_panel() {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            // $this->db->select('group_code');
            // $this->db->like('member',$username);
            // $getgroup = $this->db->get('permission_group_d')->result();
            
                    $query = $this->db->query("select
                    ref_username,
                    ref_module_id,
                    ref_sub_module,
                    `read`,
                    `write`,
                    sub_module_id,
                    ref_module,
                    sub_module_name,
                    href_control,
                    module_id,
                    module_name,
                    t.img 
                FROM
                    (
                    SELECT
                        ref_username,
                        ref_module_id,
                        ref_sub_module,
                        `read`,
                        `write`,
                        sub_module_id,
                        ref_module,
                        sub_module_name,
                        module_header.href_control,
                        module_id,
                        module_name,
                        module_header.img 
                    FROM
                        member_permission
                        RIGHT JOIN module_detail ON member_permission.ref_module_id = module_detail.ref_module
                        RIGHT JOIN module_header ON member_permission.ref_module_id = module_header.module_id 
                    WHERE
                        ref_username = '$username' 
                        AND `read` = '1' 
                    GROUP BY
                        ref_module_id UNION
                    SELECT
                        ref_username,
                        ref_module_id,
                        ref_sub_module,
                        `read`,
                        `write`,
                        sub_module_id,
                        ref_module,
                        sub_module_name,
                        module_header.href_control,
                        module_id,
                        module_name,
                        module_header.img 
                    FROM
                        member_permission
                        RIGHT JOIN module_detail ON member_permission.ref_module_id = module_detail.ref_module
                        RIGHT JOIN module_header ON member_permission.ref_module_id = module_header.module_id 
                    WHERE
                        ref_username = '$username' AND
                        `read` = '1' 
                    GROUP BY
                        ref_module_id 
                    ) AS t 
                GROUP BY
                    ref_module_id");
                $res_mem = $query->result();
                return $res_mem;
                // }
    
            
        }
    public function getmodolename($id){
        $res = $this->db->query("select module_name from module_header where module_id = '$id'")->result_array();
        return $res[0]['module_name'];
    }

}